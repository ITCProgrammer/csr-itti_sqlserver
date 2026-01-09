<?php
ini_set("error_reporting", 1);
session_start();
include_once '../koneksi.php';
include_once '../classes/class.phpmailer.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$no_order = isset($_GET['no_order']) ? $_GET['no_order'] : '';
// PO adalah string (contoh: FS26-ITN-B111), jangan di-intval
$po = isset($_GET['po']) ? $_GET['po'] : '';
$id_nps = isset($_GET['id_nsp']) ? intval($_GET['id_nsp']) : 0;
$id_cek  = (isset($_GET['id_cek'])  && $_GET['id_cek']  !== '') ? intval($_GET['id_cek'])  : null;
$id_cek1 = (isset($_GET['id_cek1']) && $_GET['id_cek1'] !== '') ? intval($_GET['id_cek1']) : null;
$id_cek2 = (isset($_GET['id_cek2']) && $_GET['id_cek2'] !== '') ? intval($_GET['id_cek2']) : null;
$message = '';
$cekOrder = mysqli_fetch_assoc(mysqli_query($con, "SELECT no_order, po FROM tbl_detail_retur_now WHERE id_nsp=$id_nps"));
// Ambil data bon/retur untuk header kiri (status)
if ($id > 0) {
    $bon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id=$id"));
} elseif (!is_null($id_cek) && $id_cek > 0) {
    $bon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id=$id_cek"));
} else {
    $bon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id_nsp=$id_nps ORDER BY id DESC LIMIT 1"));
}
// Link halaman cetak (kirim hanya ID yang ada, hindari id=0)
$linkCetak = 'cetak/cetak_suratretur.php?no_order=' . urlencode($no_order)
    . '&po=' . urlencode($po)
    . '&id_nsp=' . urlencode($id_nps);
if (!is_null($id_cek)) {
    $linkCetak .= '&id_cek='  . urlencode($id_cek);
}
if (!is_null($id_cek1)) {
    $linkCetak .= '&id_cek1=' . urlencode($id_cek1);
}
if (!is_null($id_cek2)) {
    $linkCetak .= '&id_cek2=' . urlencode($id_cek2);
}
// Simpan pilihan stok
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kumpulkan semua ID terpilih (id_cek, id_cek1, id_cek2, dan id jika ada)
    $pilihan = mysqli_real_escape_string($con, $_POST['stok']);
    $personil_csr = mysqli_real_escape_string($con, $_POST['nama_lengkap']);
    $selectedIds = [];
    foreach ([$id_cek, $id_cek1, $id_cek2, $id] as $vid) {
        if (!is_null($vid) && intval($vid) > 0) {
            $selectedIds[] = intval($vid);
        }
    }
    $selectedIds = array_values(array_unique($selectedIds));

    if (count($selectedIds) === 0) {
        $message = '<div class="alert alert-warning">Tidak ada data yang dipilih untuk diupdate.</div>';
    } else {
        $idsSql = implode(',', $selectedIds);
        // Batasi pada NSP yang sama agar aman
        $whereExtra = ($id_nps > 0) ? (" AND id_nsp=" . intval($id_nps)) : '';
        $condApproved = "((approved_csr IS NOT NULL AND approved_csr <> '') OR (personil_csr IS NOT NULL AND personil_csr <> '') OR (tgl_approved_csr IS NOT NULL AND tgl_approved_csr <> '0000-00-00 00:00:00'))";
        $sqlCheck = "SELECT id FROM tbl_detail_retur_now WHERE id IN ($idsSql)$whereExtra AND $condApproved";
        $resCheck = mysqli_query($con, $sqlCheck);
        $already = [];
        if ($resCheck) {
            while ($rck = mysqli_fetch_assoc($resCheck)) {
                $already[] = $rck['id'];
            }
        }
        if (count($already) > 0) {
            $message = '<div class="alert alert-warning">Gagal: ' . count($already) . ' data sudah pernah diupdate (ID: ' . htmlspecialchars(implode(', ', $already)) . '). Tidak boleh diupdate ulang.</div>';
        } else {
            $sql = "UPDATE tbl_detail_retur_now SET approved_csr='$pilihan', personil_csr='$personil_csr', tgl_approved_csr=NOW() WHERE id IN ($idsSql)$whereExtra";
            if (mysqli_query($con, $sql)) {
                $affected = mysqli_affected_rows($con);
                $message = '<div class="alert alert-success">Berhasil update ' . intval($affected) . ' data.</div>';
                // Kirim email ke ms emley
                $to = ['aftersales.adm@indotaichen.com'];  // contoh penerima
                $subject = 'Status Bon Retur #' . htmlspecialchars($bon['no_retur']) . '';
                $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
                $linkApproveCSR = $baseUrl . "/csr-itti/pages/cetak/cetak_suratretur.php?no_order=" . urlencode($no_order)
                . "&po=" . urlencode($po)
                . "&id_nsp=" . urlencode($id_nps)
                . "&id_cek=" . urlencode($id_cek)
                . "&id_cek1=" . urlencode($id_cek1)
                . "&id_cek2=" . urlencode($id_cek2);
                $linkinputdmf = $baseUrl . "/csr-itti/pages/input_approved_dmf_retur.php?no_order=" . urlencode($no_order)
                . "&po=" . urlencode($po)
                . "&id_nsp=" . urlencode($id_nps)
                . "&id_cek=" . urlencode($id_cek)
                . "&id_cek1=" . urlencode($id_cek1)
                . "&id_cek2=" . urlencode($id_cek2);
                $bodyHtml = 'Status approve CSR untuk Retur <b>#' . htmlspecialchars($bon['no_retur']) . '</b> telah diinput untuk ' . count($selectedIds) . ' data:<br>';
                $bodyHtml .= '<b>Keterangan:</b> ' . htmlspecialchars($pilihan) . '<br>';
                $bodyHtml .= 'Lihat detail status di: <a href="' . $linkApproveCSR . '" target="_blank">Lihat Hasil Approve</a><br>';
                $bodyHtml .= 'Input DMF di: <a href="' . $linkinputdmf . '" target="_blank">Input DMF</a>';
                // PHPMailer
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
                            if (is_array($to)) {
                                foreach ($to as $addr) {
                                    $mail->addAddress($addr);
                                }
                            } else {
                                $mail->addAddress($to);
                            }
                            foreach ($cc as $addr) {
                                $mail->addCC($addr);
                            }
                            foreach ($bcc as $addr) {
                                $mail->addBCC($addr);
                            }
                            foreach ($attachments as $file) {
                                $mail->addAttachment($file);
                            }
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
                    function getLastMailerError()
                    {
                        global $GLOBAL_LAST_MAILER_ERROR;
                        return $GLOBAL_LAST_MAILER_ERROR;
                    }
                }
                $resultMail = sendEmailApproved($to, $subject, $bodyHtml);
                // if ($resultMail === true) {
                //     $message .= '<div class="alert alert-info">Email notifikasi berhasil dikirim ke ' . htmlspecialchars($to) . '.</div>';
                // } else {
                //     $message .= '<div class="alert alert-danger">Email notifikasi <b>TIDAK</b> terkirim.<br>Error: ' . htmlspecialchars(getLastMailerError()) . '</div>';
                // }
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
    <title>Input Approved Retur</title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="margin-top:30px; max-width:1100px;">
        <div class="row">
            <div class="col-md-4">
                <h3 style="margin-top:0;">Status Bon Retur CSR: <span style="color:blue;">#<?php echo htmlspecialchars($bon['no_retur']); ?></span></h3>
                <?php echo $message; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="stok">Status Approve CSR</label>
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
                            $qKep = mysqli_query($con, "SELECT nama, email FROM master_email WHERE departemen = 'CSR' ORDER BY nama ASC");
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