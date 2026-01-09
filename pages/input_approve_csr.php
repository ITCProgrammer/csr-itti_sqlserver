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
    $cek = mysqli_fetch_assoc(mysqli_query($con, "SELECT approved_csr FROM tbl_ganti_kain_now WHERE id=$id"));
    if (!empty($cek['approved_csr'])) {
        $message = '<div class="alert alert-warning">Status stok sudah pernah diinput dan tidak bisa diubah lagi.</div>';
    } else {
        $pilihan = mysqli_real_escape_string($con, $_POST['stok']);
        // $personil = isset($_SESSION['nama10']) ? mysqli_real_escape_string($con, $_SESSION['nama10']) : 'PPC';
        $sql = "UPDATE tbl_ganti_kain_now SET approved_csr='$pilihan', tgl_approve_csr=NOW() WHERE id=$id";
        if (mysqli_query($con, $sql)) {
            $message = '<div class="alert alert-success">Pilihan berhasil disimpan!</div>';
            // Ambil daftar email penerima dari form
            $to = [];
            if (isset($_POST['email']) && is_array($_POST['email'])) {
                foreach ($_POST['email'] as $email) {
                    $to[] = mysqli_real_escape_string($con, $email);
                }
            } else {
                $to[] = 'deden.kurnia@indotaichen.com'; // default jika tidak dipilih
            }

            // Email Kepala Departemen (yang menerima link approve)
            $kepalaEmail = isset($_POST['kepala_email']) ? trim($_POST['kepala_email']) : '';
            $kepalaEmail = $kepalaEmail !== '' ? mysqli_real_escape_string($con, $kepalaEmail) : '';

            // Siapkan subject dan link
            $subject = 'Status Stok Bon Ganti Kain #' . htmlspecialchars($bon['no_bon']) . '';
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
            $linkInputStok = $baseUrl . "/csr-itti/pages/input_approve_mkt.php?id=" . urlencode($id);
            $linkCetakAbs = $baseUrl . "/csr-itti/pages/" . $linkCetak ;
            $linkemail = $baseUrl . "/csr-itti/pages/email_sales_mkt.php?id=" . urlencode($id);

            // Bagian pembuka email (dipakai untuk semua penerima)
            $bodyIntro = 'Status stok untuk Bon <b>#' . htmlspecialchars($bon['no_bon']) . '</b> telah diinput Dept CSR:<br>';
            $bodyIntro .= '<b>Keterangan:</b> ' . htmlspecialchars($pilihan) . '<br>';

            // Tambahkan detail bon (seperti halaman cetak)
            $af = null;
            if (!empty($bon['id_nsp'])) {
                $idNsp = mysqli_real_escape_string($con, $bon['id_nsp']);
                $af = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_aftersales_now WHERE id='" . $idNsp . "' LIMIT 1"));
            }
            $pelanggan = '';
            $buyer = '';
            if ($af && !empty($af['langganan'])) {
                $pos = strpos($af['langganan'], '/');
                if ($pos !== false) {
                    $pelanggan = substr($af['langganan'], 0, $pos);
                    $buyer = substr($af['langganan'], $pos + 1);
                } else {
                    $pelanggan = $af['langganan'];
                }
            }
            $noPo = $af && !empty($af['po']) ? $af['po'] : (isset($bon['no_po']) ? $bon['no_po'] : '');
            $noOrder = $af && isset($af['no_order']) ? $af['no_order'] : '';
            $kdGanti = isset($bon['kd_ganti']) ? $bon['kd_ganti'] : '';
            $jenisKain = $af && isset($af['jenis_kain']) ? $af['jenis_kain'] : '';
            $noItem = $af && isset($af['no_item']) ? $af['no_item'] : '';
            $lebar = $af && isset($af['lebar']) ? $af['lebar'] : '';
            $gramasi = $af && isset($af['gramasi']) ? $af['gramasi'] : '';
            $lotGlobal = $af && isset($af['lot']) ? $af['lot'] : '';
            $no_warna = isset($bon['no_warna']) ? $bon['no_warna'] : '';
            $no_hanger = $af && isset($af['no_hanger']) ? $af['no_hanger'] : '';

            $warna = isset($bon['warna1']) ? $bon['warna1'] : '';
            $lot = isset($bon['lot1']) ? $bon['lot1'] : '';
            $qtyO = isset($bon['qty_order']) ? $bon['qty_order'] : '';
            $qtyK = isset($bon['qty_kirim']) ? $bon['qty_kirim'] : '';
            $qtyE = isset($bon['qty_foc']) ? $bon['qty_foc'] : '';
            $kg = isset($bon['kg1']) ? $bon['kg1'] : '';
            $pjg = isset($bon['pjg1']) ? $bon['pjg1'] : '';
            $satuan = isset($bon['satuan1']) ? $bon['satuan1'] : '';
            $alasan = isset($bon['alasan']) ? $bon['alasan'] : '';
            $masalah = isset($bon['masalah']) ? $bon['masalah'] : '';
            $analisa = isset($bon['analisa']) ? $bon['analisa'] : '';
            $pencegahan = isset($bon['pencegahan']) ? $bon['pencegahan'] : '';
            $sebab = isset($bon['sebab']) ? $bon['sebab'] : '';

            $detailHtml = "<hr style='margin:10px 0;border:0;border-top:1px solid #ddd;'>"
                . "<div style='font-weight:bold;margin-bottom:6px;'>Detail Bon</div>"
                . "<table cellpadding='4' cellspacing='0' style='border-collapse:collapse;font-size:13px;color:#333;'>"
                .   "<tr><td style='padding:2px 8px 2px 0;white-space:nowrap;'>No. Bon</td><td>: " . $bon['no_bon'] . "</td></tr>"
                .   ($noOrder !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>No. Order / Kode</td><td>: " . $noOrder . ($kdGanti ? " / " . $kdGanti : "") . "</td></tr>" : '')
                .   (($pelanggan !== '' || $buyer !== '') ? "<tr><td style='padding:2px 8px 2px 0;'>Langganan/Buyer</td><td>: " . htmlspecialchars($pelanggan) . ($buyer !== '' ? " / " . htmlspecialchars($buyer) : '') . "</td></tr>" : '')
                .   ($noPo !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>No. PO</td><td>: " . $noPo . "</td></tr>" : '')
                .   (($lebar !== '' || $gramasi !== '') ? "<tr><td style='padding:2px 8px 2px 0;'>Lebar x Gramasi</td><td>: " . $lebar . (($lebar !== '' && $gramasi !== '') ? " x " : '') . $gramasi . "</td></tr>" : '')
                .   ($lotGlobal !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>Lot</td><td>: " . $lotGlobal . "</td></tr>" : '')
                .   ($no_warna!=='' ? "<tr><td style='padding:2px 8px 2px 0;'>No. Warna</td><td>: ".htmlspecialchars($no_warna)."</td></tr>" : '' )
                .   ($warna!=='' ? "<tr><td style='padding:2px 8px 2px 0;'>Warna</td><td>: ".htmlspecialchars($warna)."</td></tr>" : '' )
                .   ($no_hanger!=='' ? "<tr><td style='padding:2px 8px 2px 0;'>No. Hanger</td><td>: ".htmlspecialchars($no_hanger)."</td></tr>" : '' )
                .   (($noItem !== '' || $jenisKain !== '') ? "<tr><td style='padding:2px 8px 2px 0;'>Jenis Kain</td><td>: " . $noItem . (($noItem !== '' && $jenisKain !== '') ? " / " : '') . htmlspecialchars($jenisKain) . "</td></tr>" : '')
                .   ($masalah !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>Masalah</td><td>: " . nl2br(htmlspecialchars($masalah)) . "</td></tr>" : '')
                .   ($alasan !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>Alasan</td><td>: " . htmlspecialchars($alasan) . "</td></tr>" : '')
                .   ($sebab !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>Penyebab</td><td>: " . htmlspecialchars($sebab) . "</td></tr>" : '')
                . "</table>";

            $detailHtml .= "<div style='margin-top:8px;font-weight:bold;'>Warna / Lot / Qty</div>"
                . "<table cellpadding='6' cellspacing='0' style='border-collapse:collapse;font-size:13px;color:#333;border:1px solid #e5e5e5;'>"
                . "<tr>"
                .   "<td colspan='5' style='border:1px solid #e5e5e5; text-align:center;'>QTY</td>"
                . "</tr>"
                . "<tr style='background:#f7f7f7;'>"
                .   "<td style='border:1px solid #e5e5e5;'>Order</td>"
                .   "<td style='border:1px solid #e5e5e5;'>Kirim</td>"
                .   "<td style='border:1px solid #e5e5e5;'>FOC</td>"
                .   "<td style='border:1px solid #e5e5e5;'>Replace(Kg)</td>"
                .   "<td style='border:1px solid #e5e5e5;'>Replace(Yd)</td>"
                . "</tr>"
                . "<tr>"
                .   "<td style='border:1px solid #e5e5e5; text-align:right;'>" . htmlspecialchars($qtyO) . "</td>"
                .   "<td style='border:1px solid #e5e5e5; text-align:right;'>" . htmlspecialchars($qtyK) . "</td>"
                .   "<td style='border:1px solid #e5e5e5; text-align:right;'>" . htmlspecialchars($qtyE) . "</td>"
                .   "<td style='border:1px solid #e5e5e5; text-align:right;'>" . htmlspecialchars($kg) . "</td>"
                .   "<td style='border:1px solid #e5e5e5;'>" . htmlspecialchars($pjg) . ' ' . htmlspecialchars($satuan) . "</td>"
                . "</tr>"
                . "</table>";

            if ($analisa !== '' || $pencegahan !== '') {
                $detailHtml .= "<div style='margin-top:8px;'><b>Analisa dan Pencegahan:</b><br>" .
                    nl2br(htmlspecialchars(trim($analisa . (($analisa && $pencegahan) ? "\n" : "") . $pencegahan))) . "</div>";
            }

            $bodyHtml .= $detailHtml;
            // $bodyHtml .= 'Lihat detail atau input status di: <a href="' . $linkInputStok . '" target="_blank">Input Approve CSR</a>';
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
            // Susun body untuk kepala (ada link approve) dan penerima lain (tanpa link approve)
            $bodyForHead = $bodyIntro
                . 'Lihat detail atau input status di: '
                . "<a href='" . $linkInputStok . "' target='_blank' style='color: #337ab7; text-decoration: underline;'>Input Approve MKT</a><br>"
                . $detailHtml;

            $bodyForOthers = $bodyIntro
             . 'Lihat detail bon di: '
                . "<a href='" . $linkCetakAbs . "' target='_blank' style='color: #337ab7; text-decoration: underline;'>Halaman Cetak</a><br>"
                . 'Notifikasi Email RMP: '
                . "<a href='" . $linkemail. "' target='_blank' style='color: #337ab7; text-decoration: underline;'>Notifikasi Email RMP</a><br>"
                . "<span style='color:#888;font-size:12px;'>Link approve hanya dikirim ke Kepala Departemen.</span><br>"
                . $detailHtml;

            // Pisahkan penerima: kepala vs lainnya
            $toUnique = array_values(array_unique($to));
            $toOthers = [];
            foreach ($toUnique as $addr) {
                if (strcasecmp($addr, $kepalaEmail) !== 0) { $toOthers[] = $addr; }
            }

            // Kirim ke penerima lain (tanpa link approve)
            $okOthers = true; $okHead = true;
            if (!empty($toOthers)) {
                $okOthers = sendEmailApproved($toOthers, $subject, $bodyForOthers) === true;
            }
            // Kirim ke kepala (dengan link approve)
            $okHead = sendEmailApproved([$kepalaEmail], $subject, $bodyForHead) === true;

            if ($okOthers && $okHead) {
                $sentList = $toOthers; $sentList[] = $kepalaEmail;
                $message .= '<div class="alert alert-info">Email notifikasi berhasil dikirim ke ' . htmlspecialchars(implode(', ', $sentList)) . '.</div>';
            } else {
                $err = htmlspecialchars(getLastMailerError());
                $message .= '<div class="alert alert-danger">Sebagian/semua email notifikasi gagal dikirim.<br>Error: ' . $err . '</div>';
            }
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
    <title>Approve CSR - Bon Ganti Kain</title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="margin-top:30px; max-width:1100px;">
        <div class="row">
            <div class="col-md-4">
                <h3 style="margin-top:0;">Approve CSR: <span style="color:blue;">#<?php echo htmlspecialchars($bon['no_bon']); ?></span></h3>
                <?php echo $message; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="stok">Pilih Status</label>
                        <select class="form-control" id="stok" name="stok" required>
                            <option value="">-- Pilih --</option>
                            <option value="Approved">Approved</option>
                            <option value="Tidak Approve">Tidak Approve</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email"><strong>Pilih Email Penerima</strong></label>
                        <select class="form-control" id="email" name="email[]" multiple required>
                            <option disabled>Pilih satu atau lebih email...</option>
                            <?php
                            $queryEmail = mysqli_query($con, "SELECT email, nama FROM master_email WHERE departemen = 'MKT' ORDER BY nama ASC");
                            while ($rowEmail = mysqli_fetch_assoc($queryEmail)) {
                                echo '<option value="' . htmlspecialchars($rowEmail['email']) . '">' .
                                    htmlspecialchars($rowEmail['nama']) . ' &lt;' . htmlspecialchars($rowEmail['email']) . '&gt;</option>';
                            }
                            ?>
                        </select>
                        <small class="form-text text-muted">
                            Tekan <kbd>Ctrl</kbd> (atau <kbd>Cmd</kbd> di Mac) untuk memilih lebih dari satu email.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="kepala_email"><strong>Pilih Kepala Departemen (penerima link approve)</strong></label>
                        <select class="form-control" id="kepala_email" name="kepala_email" required>
                            <option value="" disabled selected>-- Pilih --</option>
                            <?php
                            $qKep = mysqli_query($con, "SELECT email, nama FROM master_email WHERE departemen = 'MKT' ORDER BY nama ASC");
                            while ($rk = mysqli_fetch_assoc($qKep)) {
                                echo '<option value="' . htmlspecialchars($rk['email']) . '">' .
                                     htmlspecialchars($rk['nama']) . ' &lt;' . htmlspecialchars($rk['email']) . '&gt;</option>';
                            }
                            ?>
                        </select>
                        <small class="form-text text-muted">Hanya email ini yang menerima link approve MKT.</small>
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
