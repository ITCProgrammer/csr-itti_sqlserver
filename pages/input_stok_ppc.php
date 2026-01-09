<?php
ini_set("error_reporting", 1);
session_start();
include_once '../koneksi.php';
include_once '../classes/class.phpmailer.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$message = '';

// Ambil data bon
$bon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_ganti_kain_now WHERE id=$id"));
// Link halaman cetak untuk bon ini
$linkCetak = 'cetak/cetak_bon_ganti.php?id_cek=' . urlencode($id);
if (!empty($bon['id_nsp'])) {
    $linkCetak .= '&id_nsp=' . urlencode($bon['id_nsp']);
}

// Simpan pilihan stok
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cek apakah sudah pernah diisi
    $cek = mysqli_fetch_assoc(mysqli_query($con, "SELECT ket_ppc, personil_ppc FROM tbl_ganti_kain_now WHERE id=$id"));
    if (!empty($cek['ket_ppc']) && !empty($cek['personil_ppc'])) {
        $message = '<div class="alert alert-warning">Status stok sudah pernah diinput dan tidak bisa diubah lagi.</div>';
    } else {
        $pilihan = mysqli_real_escape_string($con, $_POST['stok']);
        $tgl_delivery_kain_jadi = mysqli_real_escape_string($con, $_POST['tgl_delivery_kain_jadi']);
        $sql = "UPDATE tbl_ganti_kain_now SET ket_ppc='$pilihan', tgl_delivery_kain_jadi='$tgl_delivery_kain_jadi', tgl_approve_ppc=NOW() WHERE id=$id";
        if (mysqli_query($con, $sql)) {
            $message = '<div class="alert alert-success">Pilihan berhasil disimpan!</div>';
            // Kirim email ke ms emley
            $to = ['aftersales.adm@indotaichen.com', 'arif.efendi@indotaichen.com','emily.lai@indotaichen.com'];  //emily.lai@indotaichen.com aftersales.adm@indotaichen.com
            $subject = 'Status Stok Bon Ganti Kain #' . htmlspecialchars($bon['no_bon']) . '';
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $linkApproveCSR = $baseUrl . "/csr-itti/pages/input_approve_csr.php?id=" . urlencode($id);
            $bodyHtml = 'Status stok untuk Bon <b>#' . htmlspecialchars($bon['no_bon']) . '</b> telah diinput:<br>';
            $bodyHtml .= '<b>Keterangan:</b> ' . htmlspecialchars($pilihan) . '<br>';
            $bodyHtml .= 'Lihat detail atau input status di: <a href="' . $linkApproveCSR . '" target="_blank">Input Approve CSR</a>';
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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Input Status Stok PPC</title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="margin-top:30px; max-width:1100px;">
        <div class="row">
            <div class="col-md-4">
                <h3 style="margin-top:0;">Status Stok Bon: <span style="color:blue;">#<?php echo htmlspecialchars($bon['no_bon']); ?></span></h3>
                <?php echo $message; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="stok">Pilih Status Stok</label>
                        <select class="form-control" id="stok" name="stok" required>
                            <option value="">-- Pilih --</option>
                            <option value="Ada stok">Ada stok</option>
                            <option value="Tidak Ada Stok">Tidak Ada Stok</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal Delivery Kain Jadi</label>
                        <input type="date" class="form-control" name="tgl_delivery_kain_jadi" value="<?php echo date('d-m-y'); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="col-md-8">
                <div class="clearfix" style="margin-bottom:10px;">
                    <h4 class="pull-left" style="margin-top:0;">Halaman Cetak Bon</h4>
                    <a class="btn btn-default btn-sm pull-right" href="<?php echo htmlspecialchars($linkCetak); ?>" target="_blank">Buka Halaman Cetak</a>
                </div>
                <iframe style="width:100%; height:1100px; border:1px solid #ddd;" src="<?php echo htmlspecialchars($linkCetak); ?>"></iframe>
            </div>
        </div>
    </div>
</body>
</html>