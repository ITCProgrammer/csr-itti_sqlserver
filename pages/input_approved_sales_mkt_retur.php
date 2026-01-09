<?php
ini_set("error_reporting", 1);
session_start();
include_once '../koneksi.php';
include_once '../classes/class.phpmailer.php';

// Helper kirim email (samakan pola dengan halaman retur lain)
if (!function_exists('sendEmailApproved')) {
    function sendEmailApproved($to, $subject, $bodyHtml, $fromEmail = 'dept.it@indotaichen.com', $fromName = 'DEPT IT', $cc = [], $bcc = [], $attachments = [])
    {
        global $GLOBAL_LAST_MAILER_ERROR;
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'mail.indotaichen.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'dept.it@indotaichen.com';
            $mail->Password = 'Xr7PzUWoyPA';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom($mail->Username, $fromName);
            if (is_array($to)) { foreach ($to as $addr) { $mail->addAddress($addr); } } else { $mail->addAddress($to); }
            foreach ($cc as $addr) { $mail->addCC($addr); }
            foreach ($bcc as $addr) { $mail->addBCC($addr); }
            foreach ($attachments as $file) { $mail->addAttachment($file); }
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $bodyHtml;
            $mail->Hostname = 'mail.indotaichen.com';
            $mail->Helo = 'mail.indotaichen.com';
            $mail->send();
            $GLOBAL_LAST_MAILER_ERROR = '';
            return true;
        } catch (Exception $e) {
            $GLOBAL_LAST_MAILER_ERROR = $mail->ErrorInfo;
            error_log('Mailer Error: ' . $mail->ErrorInfo);
            return false;
        }
    }
    function getLastMailerError() { global $GLOBAL_LAST_MAILER_ERROR; return $GLOBAL_LAST_MAILER_ERROR; }
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$no_order = isset($_GET['no_order']) ? $_GET['no_order'] : '';
$po = isset($_GET['po']) ? $_GET['po'] : '';
$id_nps = isset($_GET['id_nsp']) ? intval($_GET['id_nsp']) : 0;
$id_cek  = (isset($_GET['id_cek'])  && $_GET['id_cek']  !== '') ? intval($_GET['id_cek'])  : null;
$id_cek1 = (isset($_GET['id_cek1']) && $_GET['id_cek1'] !== '') ? intval($_GET['id_cek1']) : null;
$id_cek2 = (isset($_GET['id_cek2']) && $_GET['id_cek2'] !== '') ? intval($_GET['id_cek2']) : null;
$message = '';

if ($id > 0) {
    $bon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id=$id"));
} elseif (!is_null($id_cek) && $id_cek > 0) {
    $bon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id=$id_cek"));
} else {
    $bon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id_nsp=$id_nps ORDER BY id DESC LIMIT 1"));
}

$linkCetak = 'cetak/cetak_suratretur.php?no_order=' . urlencode($no_order)
    . '&po=' . urlencode($po)
    . '&id_nsp=' . urlencode($id_nps);
if (!is_null($id_cek))  { $linkCetak .= '&id_cek='  . urlencode($id_cek); }
if (!is_null($id_cek1)) { $linkCetak .= '&id_cek1=' . urlencode($id_cek1); }
if (!is_null($id_cek2)) { $linkCetak .= '&id_cek2=' . urlencode($id_cek2); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pilihan = mysqli_real_escape_string($con, $_POST['stok']);
    $personil = mysqli_real_escape_string($con, $_POST['nama_lengkap']);
    $selectedIds = [];
    foreach ([$id_cek, $id_cek1, $id_cek2, $id] as $vid) {
        if (!is_null($vid) && intval($vid) > 0) { $selectedIds[] = intval($vid); }
    }
    $selectedIds = array_values(array_unique($selectedIds));

    if (count($selectedIds) === 0) {
        $message = '<div class="alert alert-warning">Tidak ada data yang dipilih untuk diupdate.</div>';
    } else {
        $idsSql = implode(',', $selectedIds);
        $whereExtra = ($id_nps > 0) ? (" AND id_nsp=".intval($id_nps)) : '';
        $condApproved = "((approved_sales_mkt IS NOT NULL AND approved_sales_mkt <> '') OR (personil_sales_mkt IS NOT NULL AND personil_sales_mkt <> '') OR (tgl_approved_sales_mkt IS NOT NULL AND tgl_approved_sales_mkt <> '0000-00-00 00:00:00'))";
        $sqlCheck = "SELECT id FROM tbl_detail_retur_now WHERE id IN ($idsSql)$whereExtra AND $condApproved";
        $resCheck = mysqli_query($con, $sqlCheck);
        $already = [];
        if ($resCheck) { while ($rck = mysqli_fetch_assoc($resCheck)) { $already[] = $rck['id']; } }
        if (count($already) > 0) {
            $message = '<div class="alert alert-warning">Gagal: ' . count($already) . ' data sudah pernah diupdate (ID: ' . htmlspecialchars(implode(', ', $already)) . '). Tidak boleh diupdate ulang.</div>';
        } else {
            $sql = "UPDATE tbl_detail_retur_now SET approved_sales_mkt='$pilihan', personil_sales_mkt='$personil', tgl_approved_sales_mkt=NOW() WHERE id IN ($idsSql)$whereExtra";
            if (mysqli_query($con, $sql)) {
                $affected = mysqli_affected_rows($con);
                $message = '<div class="alert alert-success">Berhasil update ' . intval($affected) . ' data.</div>';

                // Kirim email notifikasi hanya jika status Approved
                if (strtolower($pilihan) === 'approved') {
                    // Gunakan penerima email sama dengan MKT
                    $to = ['aftersales.adm@indotaichen.com'];

                    // Info dasar
                    $noRetur = isset($bon['no_retur']) ? $bon['no_retur'] : '';
                    $subject = 'Approved Sales MKT Retur #' . htmlspecialchars($noRetur);
                    $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
                    $linkPage = $baseUrl . '/csr-itti/pages/' . $linkCetak; // gunakan link cetak yang sudah dirangkai

                    // Rangkai body ringkas
                    $bodyHtml = 'Status Retur <b>#' . htmlspecialchars($noRetur) . '</b> telah di-<b>Approved</b> oleh Sales MKT.<br>';
                    $bodyHtml .= '<b>Approved By:</b> ' . htmlspecialchars($personil) . '<br>';
                    $bodyHtml .= '<b>Jumlah data diupdate:</b> ' . intval($affected) . '<br>';
                    if (!empty($no_order)) { $bodyHtml .= '<b>No. Order:</b> ' . htmlspecialchars($no_order) . '<br>'; }
                    if (!empty($po)) { $bodyHtml .= '<b>No. PO:</b> ' . htmlspecialchars($po) . '<br>'; }
                    $bodyHtml .= '<br><a href="' . htmlspecialchars($linkPage) . '" target="_blank">Buka halaman cetak</a>';

                    $okMail = sendEmailApproved($to, $subject, $bodyHtml);
                    if ($okMail) {
                        $message .= '<div class="alert alert-info">Email notifikasi terkirim ke ' . htmlspecialchars(implode(', ', $to)) . '.</div>';
                    } else {
                        $message .= '<div class="alert alert-danger">Email notifikasi <b>gagal</b> dikirim. ' . htmlspecialchars(getLastMailerError()) . '</div>';
                    }
                }
            } else {
                $message = '<div class="alert alert-danger">Gagal menyimpan: ' . mysqli_error($con) . '</div>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Approved Sales MKT Retur</title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>body{padding-bottom:30px}</style>
    </head>
<body>
    <div class="container" style="margin-top:30px; max-width:1100px;">
        <div class="row">
            <div class="col-md-4">
                <h3 style="margin-top:0;">Status Bon Retur Sales MKT: <span style="color:blue;">#<?php echo htmlspecialchars($bon['no_retur']); ?></span></h3>
                <?php echo $message; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="stok">Status Approve Sales MKT</label>
                        <select class="form-control" id="stok" name="stok" required>
                            <option value="">-- Pilih --</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Approve By</label>
                        <select class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                            <option value="" disabled selected>-- Pilih --</option>
                            <?php
                            $qKep = mysqli_query($con, "SELECT nama, email FROM master_email WHERE departemen = 'MKT' ORDER BY nama ASC");
                            while ($rk = mysqli_fetch_assoc($qKep)) {
                                echo '<option value="' . htmlspecialchars($rk['nama']) . '">' .
                                     htmlspecialchars($rk['nama']) . ' (' . htmlspecialchars($rk['email']) . ')</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="col-md-8">
                <div class="clearfix" style="margin-bottom:10px;">
                    <h4 class="pull-left" style="margin-top:0;">Halaman Cetak Bon Retur</h4>
                    <a class="btn btn-default btn-sm pull-right" href="<?php echo htmlspecialchars($linkCetak); ?>" target="_blank">Buka Halaman Cetak</a>
                </div>
                <iframe style="width:100%; height:1100px; border:1px solid #ddd;" src="<?php echo htmlspecialchars($linkCetak); ?>"></iframe>
            </div>
        </div>
    </div>
</body>
</html>
