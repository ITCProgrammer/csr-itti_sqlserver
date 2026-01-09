<?php
ini_set("error_reporting", 1);
session_start();
include_once '../koneksi.php';
include_once '../classes/class.phpmailer.php';

// Definisikan helper email lebih awal agar bisa dipanggil di manapun di file ini
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
                foreach ($to as $addr) { $mail->addAddress($addr); }
            } else if (!empty($to)) {
                $mail->addAddress($to);
            }
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
    function getLastMailerError()
    {
        global $GLOBAL_LAST_MAILER_ERROR;
        return $GLOBAL_LAST_MAILER_ERROR;
    }
}

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
    $personil_dmf = mysqli_real_escape_string($con, $_POST['nama_lengkap']);
    $catatan_dmf = mysqli_real_escape_string($con, $_POST['catatan_dmf']);
    // Tanggal & jam approved DMF (dipilih user, tidak lagi memakai NOW() langsung di SQL)
    $tgl_approved_dmf_input = isset($_POST['tgl_approved_dmf']) ? trim($_POST['tgl_approved_dmf']) : '';
    $tgl_approved_dmf_sql = '';
    if ($tgl_approved_dmf_input !== '') {
        // Format dari input datetime-local: YYYY-MM-DDTHH:MM atau YYYY-MM-DDTHH:MM:SS
        $tmp = str_replace('T', ' ', $tgl_approved_dmf_input);
        if (preg_match('/^\\d{4}-\\d{2}-\\d{2} \\d{2}:\\d{2}$/', $tmp)) {
            $tmp .= ':00';
        }
        $ts = strtotime($tmp);
        if ($ts !== false) {
            $tgl_approved_dmf_sql = date('Y-m-d H:i:s', $ts);
        }
    }
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
        $condApproved = "((approved_dmf IS NOT NULL AND approved_dmf <> '') OR (personil_dmf IS NOT NULL AND personil_dmf <> '')";
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
            // Hindari mengosongkan data saat hanya memilih checkbox email: update hanya jika ada nilai baru
            $setParts = [];
            $setParts[] = "approved_dmf=" . (strlen($pilihan) ? "'" . mysqli_real_escape_string($con,$pilihan) . "'" : "approved_dmf");
            $setParts[] = "personil_dmf=" . (strlen($personil_dmf) ? "'" . mysqli_real_escape_string($con,$personil_dmf) . "'" : "personil_dmf");
            $setParts[] = "catatan_dmf=" . (strlen($catatan_dmf) ? "'" . mysqli_real_escape_string($con,$catatan_dmf) . "'" : "catatan_dmf");
            // Set tanggal & jam approved berdasarkan input user (jika diisi)
            if ($tgl_approved_dmf_sql !== '') {
                $setParts[] = "tgl_approved_dmf='" . mysqli_real_escape_string($con, $tgl_approved_dmf_sql) . "'";
            }
            $sql = "UPDATE tbl_detail_retur_now SET " . implode(", ", $setParts) . " WHERE id IN ($idsSql)$whereExtra";
            if (mysqli_query($con, $sql)) {
                $affected = mysqli_affected_rows($con);
                $message = '<div class="alert alert-success">Berhasil update ' . intval($affected) . ' data.</div>';
                // Siapkan data header dan detail seperti email di input-retur-kain-detailrev.php
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

                // Ambil baris retur terpilih
                $qRows = mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id IN ($idsSql) AND id_nsp=".intval($id_nps));
                $rows = [];
                while ($rw = mysqli_fetch_assoc($qRows)) { $rows[] = $rw; }

                // Link terkait
                $subject = 'Status Bon Retur #' . htmlspecialchars($bon['no_retur']) . '';
                $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
                $linkCetakFull = $baseUrl . "/csr-itti/pages/" . $linkCetak;
                $qs = 'no_order=' . urlencode($no_order)
                    . '&po=' . urlencode($po)
                    . '&id_nsp=' . urlencode($id_nps)
                    . '&id_cek=' . urlencode($id_cek)
                    . '&id_cek1=' . urlencode($id_cek1)
                    . '&id_cek2=' . urlencode($id_cek2);
                $linkSalesMkt = $baseUrl . "/csr-itti/pages/input_approved_sales_mkt_retur.php?" . $qs;
                $linkAdmMkt   = $baseUrl . "/csr-itti/pages/input_approved_adm_mkt_retur.php?" . $qs;
                $linkAdmPpc   = $baseUrl . "/csr-itti/pages/input_approved_adm_ppc_retur.php?" . $qs;
                $linkmktnote   = $baseUrl . "/csr-itti/pages/input_note_marketing_retur.php?" . $qs;

                // Cari file upload terkait NSP ini dan buat link download
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
                
                $approvedmf = "SELECT * FROM tbl_detail_retur_now WHERE id_nsp='$id_nps' LIMIT 1";
                $resultdmf = mysqli_query($con, $approvedmf);
                $approvedmfs = mysqli_fetch_assoc($resultdmf);

                // Susun body email (header + link + tabel detail)
                $bodyHeader = "<div style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#333;'>".
                    "<div style='padding:10px;border:1px solid #e5e5e5;background:#f7f7f7;margin-bottom:10px;'>".
                    "<div><b>Pelanggan:</b> ".htmlspecialchars($pelanggan)." &nbsp;&nbsp; <b>Buyer:</b> ".htmlspecialchars($buyer)."</div>".
                    "<div><b>No Order:</b> ".htmlspecialchars($no_order)." &nbsp;&nbsp; <b>PO:</b> ".htmlspecialchars($po)."</div>".
                    "<div><b>Item/Kain:</b> ".htmlspecialchars($jenisKain)." &nbsp;&nbsp; <b>Lebar/Gramasi:</b> ".htmlspecialchars($lebar)." / ".htmlspecialchars($gramasi)."</div>".
                    "<div><b>Warna:</b> ".htmlspecialchars($warna)."</div>".
                    "<div style='margin-top:6px;'><b>Keterangan Approve DMF:</b> ".htmlspecialchars($approvedmfs['approved_dmf'])."</div>".
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

                // Builder link footer khusus per kelompok (hanya tampilkan link terkait + link cetak)
                $footerbiasa = '<div style="margin:12px 0 6px;">Link halaman terkait:</div>'
                    . '<ul>'
                    . '<li><a href="' . $linkmktnote . '" target="_blank">Catatan Marketing</a></li>'
                    . '<li><a href="' . $linkCetakFull . '" target="_blank">Halaman Cetak Bon Retur</a></li>'
                    . '</ul>';
                $footerSalesLinks = '<div style="margin:12px 0 6px;">Link halaman terkait:</div>'
                    . '<ul>'
                    . '<li><a href="' . $linkSalesMkt . '" target="_blank">Approved Sales MKT</a></li>'
                    . '<li><a href="' . $linkCetakFull . '" target="_blank">Halaman Cetak Bon Retur</a></li>'
                    . '</ul>';
                $footerAdmMktLinks = '<div style="margin:12px 0 6px;">Link halaman terkait:</div>'
                    . '<ul>'
                    . '<li><a href="' . $linkAdmMkt   . '" target="_blank">Approved Manager MKT</a></li>'
                    . '<li><a href="' . $linkCetakFull . '" target="_blank">Halaman Cetak Bon Retur</a></li>'
                    . '</ul>';
                $footerAdmPpcLinks = '<div style="margin:12px 0 6px;">Link halaman terkait:</div>'
                    . '<ul>'
                    . '<li><a href="' . $linkAdmPpc   . '" target="_blank">Approved PPC</a></li>'
                    . '<li><a href="' . $linkCetakFull . '" target="_blank">Halaman Cetak Bon Retur</a></li>'
                    . '</ul>';

                $bodyWrapClose = "<div style='margin-top:12px;color:#555;'>Email ini otomatis dikirim dari sistem CSR.</div></div>";

                // Kumpulkan email penerima per kelompok (Sales MKT, ADM MKT, ADM PPC)
                $toMktSales = [];
                if (!empty($_POST['email_sales_mkt']) && is_array($_POST['email_sales_mkt'])) {
                    foreach ($_POST['email_sales_mkt'] as $em) { $em = trim($em); if ($em !== '' && filter_var($em, FILTER_VALIDATE_EMAIL)) { $toMktSales[] = $em; } }
                }
                $toSales = [];
                if (!empty($_POST['email_sales']) && is_array($_POST['email_sales'])) {
                    foreach ($_POST['email_sales'] as $em) { $em = trim($em); if ($em !== '' && filter_var($em, FILTER_VALIDATE_EMAIL)) { $toSales[] = $em; } }
                }
                $toAdmMkt = [];
                if (!empty($_POST['email_adm_mkt']) && is_array($_POST['email_adm_mkt'])) {
                    foreach ($_POST['email_adm_mkt'] as $em) { $em = trim($em); if ($em !== '' && filter_var($em, FILTER_VALIDATE_EMAIL)) { $toAdmMkt[] = $em; } }
                }
                $toAdmPpc = [];
                if (!empty($_POST['email_adm_ppc']) && is_array($_POST['email_adm_ppc'])) {
                    foreach ($_POST['email_adm_ppc'] as $em) { $em = trim($em); if ($em !== '' && filter_var($em, FILTER_VALIDATE_EMAIL)) { $toAdmPpc[] = $em; } }
                }

                // Kirim email per kelompok (jika ada penerima)
                $anyMailSent = false;
                $mailMktSalesSent = false;
                if (count($toMktSales) > 0) {
                    $bodyMktSales = $bodyHeader . $bodyTable . $footerbiasa . $bodyWrapClose;
                    if (sendEmailApproved($toMktSales, $subject, $bodyMktSales)) {
                        $anyMailSent = true;
                        $mailMktSalesSent = true;
                    }
                }
                if (count($toSales) > 0) {
                    $bodySales = $bodyHeader . $bodyTable . $footerSalesLinks . $bodyWrapClose;
                    if (sendEmailApproved($toSales, $subject, $bodySales)) {
                        $anyMailSent = true;
                    }
                }
                if (count($toAdmMkt) > 0) {
                    $bodyAdmMkt = $bodyHeader . $bodyTable . $footerAdmMktLinks . $bodyWrapClose;
                    if (sendEmailApproved($toAdmMkt, $subject, $bodyAdmMkt)) {
                        $anyMailSent = true;
                    }
                }
                if (count($toAdmPpc) > 0) {
                    $bodyAdmPpc = $bodyHeader . $bodyTable . $footerAdmPpcLinks . $bodyWrapClose;
                    if (sendEmailApproved($toAdmPpc, $subject, $bodyAdmPpc)) {
                        $anyMailSent = true;
                    }
                }

                // Jika email Sales MKT terkirim, update tgl_arsip_mkt = NOW() untuk data yang dipilih
                if ($mailMktSalesSent && count($selectedIds) > 0) {
                    $sqlUpdateArsip = "UPDATE tbl_detail_retur_now SET tgl_arsip_mkt = NOW() WHERE id IN ($idsSql)$whereExtra";
                    mysqli_query($con, $sqlUpdateArsip);
                }

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
                <h3 style="margin-top:0;">Status Bon Retur DMF: <span style="color:blue;">#<?php echo htmlspecialchars($bon['no_retur']); ?></span></h3>
                <?php echo $message; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="stok">Status Approve DMF</label>
                        <select class="form-control" id="stok" name="stok">
                            <option value="">-- Pilih --</option>
                            <option value="Approved" <?php echo (isset($bon['approved_dmf']) && $bon['approved_dmf']==='Approved') ? 'selected' : ''; ?>>Approved</option>
                            <option value="Rejected" <?php echo (isset($bon['approved_dmf']) && $bon['approved_dmf']==='Rejected') ? 'selected' : ''; ?>>Rejected</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Approve By</label>
                        <select class="form-control" id="nama_lengkap" name="nama_lengkap">
                            <option value="" disabled <?php echo empty($bon['personil_dmf']) ? 'selected' : ''; ?>>-- Pilih --</option>
                            <?php
                            $qKep = mysqli_query($con, "SELECT nama, email FROM master_email WHERE departemen = 'MNF' ORDER BY nama ASC");
                            while ($rk = mysqli_fetch_assoc($qKep)) {
                                $nm = htmlspecialchars($rk['nama']);
                                $em = htmlspecialchars($rk['email']);
                                $sel = (isset($bon['personil_dmf']) && $bon['personil_dmf'] === $rk['nama']) ? ' selected' : '';
                                echo '<option value="' . $nm . '"' . $sel . '>' . $nm . ' (' . $em . ')</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="catatan_dmf">Catatan</label>
                        <textarea class="form-control" id="catatan_dmf" name="catatan_dmf"><?php echo isset($bon['catatan_dmf']) ? htmlspecialchars($bon['catatan_dmf']) : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tgl_approved_dmf">Tanggal &amp; Jam Approved DMF</label>
                        <input
                            type="datetime-local"
                            class="form-control"
                            id="tgl_approved_dmf"
                            name="tgl_approved_dmf"
                            value="<?php
                                $val = '';
                                if (!empty($bon['tgl_approved_dmf']) && $bon['tgl_approved_dmf'] !== '0000-00-00 00:00:00') {
                                    $ts = strtotime($bon['tgl_approved_dmf']);
                                    if ($ts) { $val = date('Y-m-d\\TH:i', $ts); }
                                }
                                echo htmlspecialchars($val);
                            ?>">
                    </div>
                    <div class="form-group">
                        <label>Pilih Email: Sales MKT</label>
                        <div style="max-height:120px; overflow:auto; padding:6px; border:1px solid #ddd; border-radius:4px;">
                            <?php
                            $qMail0 = mysqli_query($con, "SELECT nama, email FROM master_email WHERE departemen = 'MKT' ORDER BY nama ASC");
                            while ($rm = mysqli_fetch_assoc($qMail0)) {
                                $nm = htmlspecialchars($rm['nama']);
                                $em = htmlspecialchars($rm['email']);
                                echo '<div class="checkbox" style="margin:0;"><label>'
                                    . '<input type="checkbox" name="email_sales_mkt[]" value="' . $em . '"> '
                                    . $nm . ' (' . $em . ')</label></div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pilih Email: Sales MKT Approve</label>
                        <div style="max-height:120px; overflow:auto; padding:6px; border:1px solid #ddd; border-radius:4px;">
                            <?php
                            $qMail1 = mysqli_query($con, "SELECT nama, email FROM master_email WHERE departemen = 'MKT' ORDER BY nama ASC");
                            while ($rm = mysqli_fetch_assoc($qMail1)) {
                                $nm = htmlspecialchars($rm['nama']);
                                $em = htmlspecialchars($rm['email']);
                                echo '<div class="checkbox" style="margin:0;"><label>'
                                    . '<input type="checkbox" name="email_sales[]" value="' . $em . '"> '
                                    . $nm . ' (' . $em . ')</label></div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pilih Email: Kepala Departemen MKT</label>
                        <div style="max-height:120px; overflow:auto; padding:6px; border:1px solid #ddd; border-radius:4px;">
                            <?php
                            $qMail2 = mysqli_query($con, "SELECT nama, email FROM master_email ORDER BY nama ASC");
                            while ($rm = mysqli_fetch_assoc($qMail2)) {
                                $nm = htmlspecialchars($rm['nama']);
                                $em = htmlspecialchars($rm['email']);
                                echo '<div class="checkbox" style="margin:0;"><label>'
                                    . '<input type="checkbox" name="email_adm_mkt[]" value="' . $em . '"> '
                                    . $nm . ' (' . $em . ')</label></div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pilih Email: PPC</label>
                        <div style="max-height:120px; overflow:auto; padding:6px; border:1px solid #ddd; border-radius:4px;">
                            <?php
                            $qMail3 = mysqli_query($con, "SELECT nama, email FROM master_email WHERE departemen = 'PPC' ORDER BY nama ASC");
                            while ($rm = mysqli_fetch_assoc($qMail3)) {
                                $nm = htmlspecialchars($rm['nama']);
                                $em = htmlspecialchars($rm['email']);
                                echo '<div class="checkbox" style="margin:0;"><label>'
                                    . '<input type="checkbox" name="email_adm_ppc[]" value="' . $em . '"> '
                                    . $nm . ' (' . $em . ')</label></div>';
                            }
                            ?>
                        </div>
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengirim email.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <?php
                // Tampilkan dokumen retur yang telah diunggah untuk NSP ini (berdasarkan prefix nama file)
                $uploadsDir = realpath(__DIR__ . '/../uploads/retur');
                if ($id_nps > 0 && $uploadsDir && is_dir($uploadsDir)) {
                    $pattern = $uploadsDir . DIRECTORY_SEPARATOR . 'NSP' . intval($id_nps) . '_*';
                    $files = glob($pattern);
                    if ($files && count($files) > 0) {
                        // Urutkan terbaru dulu berdasarkan waktu modifikasi
                        usort($files, function($a, $b){ return filemtime($b) <=> filemtime($a); });
                        $baseUrlList = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
                        echo '<hr><h4>Dokumen Retur Terunggah</h4><ul class="list-unstyled">';
                        foreach ($files as $f) {
                            $bn = basename($f);
                            $url = $baseUrlList . '/csr-itti/uploads/retur/' . rawurlencode($bn);
                            $sz = @filesize($f);
                            $szTxt = $sz !== false ? (number_format($sz/1024, 1) . ' KB') : '';
                            echo '<li style="margin-bottom:6px;">'
                                . '<span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> '
                                . '<a target="_blank" href="' . htmlspecialchars($url) . '">' . htmlspecialchars($bn) . '</a>'
                                . ($szTxt ? ' <span class="text-muted">(' . htmlspecialchars($szTxt) . ')</span>' : '')
                                . '</li>';
                        }
                        echo '</ul>';
                    }
                }
                ?>
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
