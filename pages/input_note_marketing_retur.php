<?php
ini_set("error_reporting", 1);
session_start();
include_once '../koneksi.php';
include_once '../classes/class.phpmailer.php';

// Helper email (gunakan definisi yang sama agar konsisten)
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
            $fromEmail = $mail->Username;
            $mail->setFrom($fromEmail, $fromName);
            if (is_array($to)) { foreach ($to as $addr) { $mail->addAddress($addr); } }
            else if (!empty($to)) { $mail->addAddress($to); }
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

// Parameter
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$no_order = isset($_GET['no_order']) ? $_GET['no_order'] : '';
$po = isset($_GET['po']) ? $_GET['po'] : '';
$id_nps = isset($_GET['id_nsp']) ? intval($_GET['id_nsp']) : 0;
$id_cek  = (isset($_GET['id_cek'])  && $_GET['id_cek']  !== '') ? intval($_GET['id_cek'])  : null;
$id_cek1 = (isset($_GET['id_cek1']) && $_GET['id_cek1'] !== '') ? intval($_GET['id_cek1']) : null;
$id_cek2 = (isset($_GET['id_cek2']) && $_GET['id_cek2'] !== '') ? intval($_GET['id_cek2']) : null;

// Ambil salah satu bon untuk header
if ($id > 0) {
    $bon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id=$id"));
} elseif (!is_null($id_cek) && $id_cek > 0) {
    $bon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id=$id_cek"));
} else {
    $bon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id_nsp=$id_nps ORDER BY id DESC LIMIT 1"));
}

// Link cetak
$linkCetak = 'cetak/cetak_suratretur.php?no_order=' . urlencode($no_order)
    . '&po=' . urlencode($po)
    . '&id_nsp=' . urlencode($id_nps);
if (!is_null($id_cek))  { $linkCetak .= '&id_cek='  . urlencode($id_cek); }
if (!is_null($id_cek1)) { $linkCetak .= '&id_cek1=' . urlencode($id_cek1); }
if (!is_null($id_cek2)) { $linkCetak .= '&id_cek2=' . urlencode($id_cek2); }

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kumpulkan ID terpilih
    $selectedIds = [];
    foreach ([$id_cek, $id_cek1, $id_cek2, $id] as $vid) { if (!is_null($vid) && intval($vid) > 0) { $selectedIds[] = intval($vid); } }
    $selectedIds = array_values(array_unique($selectedIds));
    $catatan_marketing = isset($_POST['catatan_marketing']) ? trim($_POST['catatan_marketing']) : '';
    $to = [];
    if (!empty($_POST['email_to']) && is_array($_POST['email_to'])) {
        foreach ($_POST['email_to'] as $em) { $em = trim($em); if ($em !== '' && filter_var($em, FILTER_VALIDATE_EMAIL)) { $to[] = $em; } }
    }

    if (count($selectedIds) === 0) {
        $message = '<div class="alert alert-warning">Tidak ada data retur yang dipilih.</div>';
    } elseif (count($to) === 0) {
        $message = '<div class="alert alert-warning">Pilih minimal satu email penerima.</div>';
    } else {
        $idsSql = implode(',', $selectedIds);
        // Update catatan_mkt pada data yang dipilih
        $catatanSql = mysqli_real_escape_string($con, $catatan_marketing);
        $sqlUpdateCatatan = "UPDATE tbl_detail_retur_now SET catatan_mkt='".$catatanSql."' WHERE id IN (".$idsSql.") AND id_nsp=".intval($id_nps);
        $okUpdate = mysqli_query($con, $sqlUpdateCatatan);
        if (!$okUpdate) {
            // Tidak gagal total, tetap lanjut kirim email namun tampilkan peringatan
            $message .= '<div class="alert alert-warning">Catatan tersimpan sebagian: ' . htmlspecialchars(mysqli_error($con)) . '</div>';
        }
        // Header info dari aftersales
        $rCek = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_aftersales_now WHERE id=" . intval($id_nps)));
        $pelanggan = '';
        $buyer = '';
        if (!empty($rCek['langganan'])) {
            $pos = strpos($rCek['langganan'], '/');
            if ($pos !== false) { $pelanggan = substr($rCek['langganan'], 0, $pos); $buyer = substr($rCek['langganan'], $pos + 1); }
            else { $pelanggan = $rCek['langganan']; }
        }
        $jenisKain = isset($rCek['jenis_kain']) ? $rCek['jenis_kain'] : '';
        $lebar = isset($rCek['lebar']) ? $rCek['lebar'] : '';
        $gramasi = isset($rCek['gramasi']) ? $rCek['gramasi'] : '';
        $warna = isset($rCek['warna']) ? $rCek['warna'] : '';

        // Detail retur terpilih
        $qRows = mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id IN ($idsSql) AND id_nsp=".intval($id_nps));
        $rows = [];
        while ($rw = mysqli_fetch_assoc($qRows)) { $rows[] = $rw; }

        // Link dasar
        $subject = 'Catatan Marketing Retur #' . htmlspecialchars($bon['no_retur']);
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
        $linkCetakFull = $baseUrl . "/csr-itti/pages/" . $linkCetak;

        // Lampiran link file upload NSP terkait
        $fileLinksHtml = '';
        $uploadsDir = realpath(__DIR__ . '/../uploads/retur');
        if ($uploadsDir && is_dir($uploadsDir)) {
            $files = glob($uploadsDir . DIRECTORY_SEPARATOR . 'NSP' . intval($id_nps) . '_*');
            if ($files && count($files) > 0) {
                usort($files, function($a,$b){ return filemtime($b) <=> filemtime($a); });
                $fileLinksHtml .= "<div style='margin-top:6px;'><b>Dokumen Retur:</b><ul>";
                foreach ($files as $f) {
                    $bn = basename($f);
                    $url = $baseUrl . '/csr-itti/uploads/retur/' . rawurlencode($bn);
                    $fileLinksHtml .= "<li><a href='".$url."' target='_blank'>".htmlspecialchars($bn)."</a></li>";
                }
                $fileLinksHtml .= "</ul></div>";
            }
        }

        // Body: header + catatan + dokumen + tabel + link cetak
        $bodyHeader = "<div style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#333;'>".
            "<div style='padding:10px;border:1px solid #e5e5e5;background:#f7f7f7;margin-bottom:10px;'>".
            "<div><b>Pelanggan:</b> ".htmlspecialchars($pelanggan)." &nbsp;&nbsp; <b>Buyer:</b> ".htmlspecialchars($buyer)."</div>".
            "<div><b>No Order:</b> ".htmlspecialchars($no_order)." &nbsp;&nbsp; <b>PO:</b> ".htmlspecialchars($po)."</div>".
            "<div><b>Item/Kain:</b> ".htmlspecialchars($jenisKain)." &nbsp;&nbsp; <b>Lebar/Gramasi:</b> ".htmlspecialchars($lebar)." / ".htmlspecialchars($gramasi)."</div>".
            "<div><b>Warna:</b> ".htmlspecialchars($warna)."</div>".
            "<div style='margin-top:6px;'><b>Catatan Marketing:</b> ".nl2br(htmlspecialchars($catatan_marketing))."</div>".
            $fileLinksHtml.
            "</div>";

        $bodyTable = "<div style='margin:12px 0 6px;font-weight:bold;'>Detail Barang Retur Dipilih</div>".
            "<table cellpadding='6' cellspacing='0' style='border-collapse:collapse;font-size:12px;color:#333;border:1px solid #e5e5e5;width:100%'>".
            "<tr style='background:#f7f7f7;'>".
            "<th style='border:1px solid #e5e5e5;text-align:left;'>Masalah</th>".
            "<th style='border:1px solid #e5e5e5;text-align:left;'>Jenis Kain</th>".
            "<th style='border:1px solid #e5e5e5;'>Warna</th>".
            "<th style='border:1px solid #e5e5e5;'>Lot</th>".
            "<th style='border:1px solid #e5e5e5;'>SJ Retur/Tgl</th>".
            "<th style='border:1px solid #e5e5e5;'>SJ ITTI/Tgl</th>".
            "<th style='border:1px solid #e5e5e5;'>Roll</th>".
            "<th style='border:1px solid #e5e5e5;'>Kg</th>".
            "<th style='border:1px solid #e5e5e5;'>Panjang</th>".
            "<th style='border:1px solid #e5e5e5;text-align:left;'>Keterangan</th>".
            "</tr>";
        foreach ($rows as $rw) {
            $bodyTable .= "<tr>".
                "<td style='border:1px solid #e5e5e5;'>".htmlspecialchars($rw['masalah'])."</td>".
                "<td style='border:1px solid #e5e5e5;'>".htmlspecialchars($rw['jenis_kain'])."</td>".
                "<td style='border:1px solid #e5e5e5;text-align:center;'>".htmlspecialchars($rw['warna'])."</td>".
                "<td style='border:1px solid #e5e5e5;text-align:center;'>".htmlspecialchars($rw['lot'])."</td>".
                "<td style='border:1px solid #e5e5e5;text-align:center;'>".htmlspecialchars($rw['sjreturplg'])." / ".htmlspecialchars($rw['tgl_sjretur'])."</td>".
                "<td style='border:1px solid #e5e5e5;text-align:center;'>".htmlspecialchars($rw['sj_itti'])." / ".htmlspecialchars($rw['tgl_sjitti'])."</td>".
                "<td style='border:1px solid #e5e5e5;text-align:right;'>".htmlspecialchars($rw['roll'])."</td>".
                "<td style='border:1px solid #e5e5e5;text-align:right;'>".htmlspecialchars($rw['kg'])."</td>".
                "<td style='border:1px solid #e5e5e5;text-align:right;'>".htmlspecialchars($rw['pjg'])." ".htmlspecialchars($rw['satuan'])."</td>".
                "<td style='border:1px solid #e5e5e5;'>".htmlspecialchars($rw['ket'])."</td>".
                "</tr>";
        }
        $bodyTable .= "</table>";

        $bodyFooter = '<div style="margin:12px 0 6px;">Tautan terkait:</div>'
            . '<ul>'
            . '<li><a href="' . $linkCetakFull . '" target="_blank">Halaman Cetak Bon Retur</a></li>'
            . '</ul>'
            . "<div style='margin-top:12px;color:#555;'>Email ini otomatis dikirim dari sistem CSR.</div>";

        $bodyWrap = $bodyHeader . $bodyTable . $bodyFooter . '</div>';

        $ok = sendEmailApproved($to, $subject, $bodyWrap);
        if ($ok) {
            $message = '<div class="alert alert-success">Catatan berhasil dikirim RMP'.'</div>';
        } else {
            $message = '<div class="alert alert-danger">Email gagal dikirim. ' . htmlspecialchars(getLastMailerError()) . '</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Catatan Marketing Retur</title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>body{padding-bottom:30px}</style>
    </head>
<body>
    <div class="container" style="margin-top:30px; max-width:1100px;">
        <div class="row">
            <div class="col-md-4">
                <h3 style="margin-top:0;">Catatan Marketing: <span style="color:blue;">#<?php echo htmlspecialchars($bon['no_retur']); ?></span></h3>
                <?php echo $message; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="catatan_marketing">Catatan</label>
                        <textarea class="form-control" id="catatan_marketing" name="catatan_marketing" rows="5" required placeholder="Tulis catatan marketing..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Pilih Penerima Email</label>
                        <div style="max-height:220px; overflow:auto; padding:6px; border:1px solid #ddd; border-radius:4px;">
                            <?php
                            $qMail = mysqli_query($con, "SELECT nama, email FROM master_email ORDER BY nama ASC");
                            while ($rm = mysqli_fetch_assoc($qMail)) {
                                $nm = htmlspecialchars($rm['nama']);
                                $em = htmlspecialchars($rm['email']);
                                echo '<div class="checkbox" style="margin:0;">'
                                    . '<label>'
                                    . '<input type="checkbox" name="email_to[]" value="' . $em . '"> '
                                    . $nm . ' (' . $em . ')'
                                    . '</label>'
                                    . '</div>';
                            }
                            ?>
                        </div>
                        <small class="text-muted">Centang email yang ingin dikirimi catatan.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Catatan</button>
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
