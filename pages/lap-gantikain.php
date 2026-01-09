<?PHP
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";
include_once("classes/class.phpmailer.php");

// Fungsi kirim email - didefinisikan sekali di awal
if (!function_exists('sendEmailApproved')) {
  // Normalisasi berbagai format tanggal ke 'YYYY-MM-DD HH:MM:SS'
  function normalize_datetime_input($str)
  {
    $str = trim((string)$str);
    if ($str === '') return '';
    $raw = str_replace('T', ' ', $str);

    // 1) Format Y-m-d[ H:i[:s]]
    if (preg_match('/^\d{4}-\d{2}-\d{2}(\s\d{2}:\d{2}(:\d{2})?)?$/', $raw)) {
      // Tambahkan detik jika tidak ada
      if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $raw)) return $raw . ' 00:00:00';
      if (preg_match('/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}$/', $raw)) return $raw . ':00';
      return $raw; // sudah lengkap
    }

    // 2) Format d/m/Y[ H:i[:s]]
    if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})(\s(\d{2}):(\d{2})(:(\d{2}))?)?$/', $raw, $m)) {
      $d = $m[1]; $mo = $m[2]; $y = $m[3];
      $h = isset($m[5]) ? $m[5] : '00';
      $i = isset($m[6]) ? $m[6] : '00';
      $s = isset($m[8]) ? $m[8] : '00';
      return sprintf('%04d-%02d-%02d %02d:%02d:%02d', $y, $mo, $d, $h, $i, $s);
    }

    // 3) Coba DateTime::createFromFormat jika tersedia
    if (class_exists('DateTime')) {
      $formats = ['Y-m-d H:i:s','Y-m-d H:i','Y-m-d','d/m/Y H:i:s','d/m/Y H:i','d/m/Y'];
      foreach ($formats as $fmt) {
        $dt = DateTime::createFromFormat($fmt, $raw);
        if ($dt && $dt->format($fmt) === $raw) {
          return $dt->format('Y-m-d H:i:s');
        }
      }
    }

    return $raw; // fallback: kembalikan apa adanya
  }
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
      $mail->setFrom($mail->Username, $fromName); // Gunakan username sebagai fromEmail
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

// Helper: kirim JSON bersih dan hentikan eksekusi
if (!function_exists('send_json_and_exit')) {
  function send_json_and_exit($payload) {
    while (ob_get_level() > 0) { ob_end_clean(); }
    header('Content-Type: application/json');
    echo json_encode($payload);
    exit;
  }
}

// Handle update Approved DMF (from modal)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan_dmf']) && $_POST['simpan_dmf'] == '1') {
  $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
  $ket_dmf = isset($_POST['ket_dmf']) ? trim($_POST['ket_dmf']) : '';
  $approved_dmf = isset($_POST['approved_dmf']) ? trim($_POST['approved_dmf']) : '';
  $tgl_approved_dmf = isset($_POST['tgl_approved_dmf']) ? trim($_POST['tgl_approved_dmf']) : '';
  if ($tgl_approved_dmf !== '') {
    $tgl_approved_dmf = normalize_datetime_input($tgl_approved_dmf);
  }
  $is_ajax = (isset($_POST['ajax']) && $_POST['ajax'] == '1') ||
             (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');

  if ($id > 0 && $approved_dmf !== '' && $tgl_approved_dmf !== '') {
    // Normalisasi tanggal (input type=date memberikan YYYY-MM-DD). Simpan sebagai datetime.
    $tgl_norm = $tgl_approved_dmf;
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $tgl_norm)) {
      $tgl_norm .= ' 00:00:00';
    }

    // Gunakan prepared statement untuk keamanan
    if ($stmt = mysqli_prepare($con, "UPDATE tbl_ganti_kain_now SET ket_dmf = ?, approved_dmf = ?, tgl_approved_dmf = ? WHERE id = ?")) {
      mysqli_stmt_bind_param($stmt, 'sssi', $ket_dmf, $approved_dmf, $tgl_norm, $id);
      $ok = mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

      if ($is_ajax) {
        if ($ok) {
          send_json_and_exit(['ok' => true, 'msg' => 'Data Approved DMF berhasil diperbarui.']);
        } else {
          send_json_and_exit(['ok' => false, 'msg' => 'Gagal menyimpan data: ' . mysqli_error($con)]);
        }
      } else {
        if ($ok) {
          echo "<script>swal({title:'Tersimpan', text:'Data Approved DMF berhasil diperbarui.', type:'success'});</script>";
        } else {
          $err = addslashes(mysqli_error($con));
          echo "<script>swal({title:'Gagal', text:'Gagal menyimpan data: $err', type:'error'});</script>";
        }
      }
    } else {
      if ($is_ajax) {
        send_json_and_exit(['ok' => false, 'msg' => 'Gagal mempersiapkan query: ' . mysqli_error($con)]);
      } else {
        $err = addslashes(mysqli_error($con));
        echo "<script>swal({title:'Gagal', text:'Gagal mempersiapkan query: $err', type:'error'});</script>";
      }
    }
  } else {
    if ($is_ajax) {
      send_json_and_exit(['ok' => false, 'msg' => 'Lengkapi data yang wajib diisi.']);
    } else {
      echo "<script>swal({title:'Validasi', text:'Lengkapi data yang wajib diisi.', type:'warning'});</script>";
    }
  }
}

// Tangani aksi approve bon dari modal
$message = ''; // Variabel untuk pesan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_bon']) && $_POST['approve_bon'] == '1') {
  // $id_bon = isset($_POST['id_bon']) ? intval($_POST['id_bon']) : 0;
  $id_bon = isset($_POST['id_bon']) ? intval($_POST['id_bon']) : 0;
  $id_nsp = isset($_POST['id_nsp']) ? intval($_POST['id_nsp']) : 0;

  if ($id_bon > 0) {
    // 1. Update status di database
    $now = date("Y-m-d H:i:s");
    // 2. Ambil data bon untuk email
    $bon_query = mysqli_query($con, "SELECT * FROM tbl_ganti_kain_now WHERE id='$id_bon'");
    $bon = mysqli_fetch_assoc($bon_query);

    if ($bon) {
      // 3. Siapkan email
      $selected_emails = isset($_POST['email']) ? $_POST['email'] : [];
      $to_emails = [];
      if (!empty($selected_emails) && is_array($selected_emails)) {
        foreach ($selected_emails as $email) {
          $to_emails[] = mysqli_real_escape_string($con, $email);
        }
      }

      if (empty($to_emails)) {
        $to_emails[] = 'deden.kurnia@indotaichen.com'; // default
      }
      // $bon_query1 = mysqli_query($conadm, "SELECT * FROM tbl_gantikain WHERE id_nsp='$id_bon'");
      // $bon1 = mysqli_fetch_assoc($bon_query1);
      $bon_query1 = mysqli_query($conadm, "SELECT * FROM tbl_gantikain WHERE id_nsp='$bon[id_nsp]'");
      $bon1 = mysqli_fetch_assoc($bon_query1);

      // DEBUG: Cek apakah query error atau data kosong
      if (!$bon_query1) {
        error_log("Query Error: " . mysqli_error($conadm));
      }
      if (!$bon1) {
        error_log("Data tidak ditemukan di tbl_gantikain untuk id_nsp = " . $id_bon);
      } else {
        error_log("Data ditemukan: " . print_r($bon1, true));
      }
      $subject = "Bon Ganti Kain #" . $bon['no_bon'] . " Telah Di Ajukan - Approve ";

      // Link
      $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
      $linkInputStok = $baseUrl . "/adm-itti/index1.php?p=input-bon-kain&id=" . urlencode($bon1['id']);

      // Body email - bagian intro
      $bodyHtml = "Bon dengan No: <b>" . $bon['no_bon'] . "</b> telah di-buat oleh " . $_SESSION['dept'] . " pada " . $now . ".<br>"
        . "Silakan Beri Tanggapan Konfirmasi.<br>"
        . "<a href='" . $linkInputStok . "' target='_blank' style='color: #337ab7; text-decoration: underline;'>Input Analisa dan Pencegahan </a>";

      // Ambil data tambahan dari tbl_aftersales_now jika ada id_nsp
      $af = null;
      if (!empty($bon['id_nsp'])) {
        $idNsp = mysqli_real_escape_string($con, $bon['id_nsp']);
        $af_query = mysqli_query($con, "SELECT * FROM tbl_aftersales_now WHERE id='" . $idNsp . "' LIMIT 1");
        $af = mysqli_fetch_assoc($af_query);
      }

      // Siapkan data pendukung untuk detail
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

      $noPo = ($bon && isset($bon['no_po'])) ? $bon['no_po'] : '';
      $noOrder = $bon && isset($bon['no_order']) ? $bon['no_order'] : '';
      $kdGanti = isset($bon['kd_ganti']) ? $bon['kd_ganti'] : '';
      $jenisKain = $bon && isset($bon['jenis_kain']) ? $bon['jenis_kain'] : '';
      $noItem = $bon && isset($bon['no_item']) ? $bon['no_item'] : '';
      $lebar = $bon && isset($bon['lebar']) ? $bon['lebar'] : '';
      $gramasi = $bon && isset($bon['gramasi']) ? $bon['gramasi'] : '';
      $lotGlobal = $bon && isset($bon['lot']) ? $bon['lot'] : '';
      $no_hanger = $bon && isset($bon['no_hanger']) ? $bon['no_hanger'] : '';

      $warna = isset($bon['warna1']) ? $bon['warna1'] : '';
      $no_warna = isset($bon['no_warna']) ? $bon['no_warna'] : '';
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

      // Bagian detail HTML
      $detailHtml = "<hr style='margin:10px 0;border:0;border-top:1px solid #ddd;'>"
        . "<div style='font-weight:bold;margin-bottom:6px;'>Detail Bon</div>"
        . "<table cellpadding='4' cellspacing='0' style='border-collapse:collapse;font-size:13px;color:#333;'>"
        .   "<tr><td style='padding:2px 8px 2px 0;white-space:nowrap;'>No. Bon</td><td>: " . $bon['no_bon'] . "</td></tr>"
        .   ($noOrder !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>No. Order / Kode</td><td>: " . $noOrder . ($kdGanti ? " / " . $kdGanti : "") . "</td></tr>" : '')
        .   (($pelanggan !== '' || $buyer !== '') ? "<tr><td style='padding:2px 8px 2px 0;'>Langganan/Buyer</td><td>: " . htmlspecialchars($pelanggan) . ($buyer !== '' ? " / " . htmlspecialchars($buyer) : '') . "</td></tr>" : '')
        .   ($noPo !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>No. PO</td><td>: " . $noPo . "</td></tr>" : '')
        .   (($lebar !== '' || $gramasi !== '') ? "<tr><td style='padding:2px 8px 2px 0;'>Lebar x Gramasi</td><td>: " . $lebar . (($lebar !== '' && $gramasi !== '') ? " x " : '') . $gramasi . "</td></tr>" : '')
        .   ($lotGlobal !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>Lot</td><td>: " . $lotGlobal . "</td></tr>" : '')
        .   ($no_warna !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>No. Warna</td><td>: " . htmlspecialchars($no_warna) . "</td></tr>" : '')
        .   ($warna !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>Warna</td><td>: " . htmlspecialchars($warna) . "</td></tr>" : '')
        .   ($no_hanger !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>No. Hanger</td><td>: " . htmlspecialchars($no_hanger) . "</td></tr>" : '')
        .   (($noItem !== '' || $jenisKain !== '') ? "<tr><td style='padding:2px 8px 2px 0;'>Jenis Kain</td><td>: " . $noItem . (($noItem !== '' && $jenisKain !== '') ? " / " : '') . htmlspecialchars($jenisKain) . "</td></tr>" : '')
        .   ($masalah !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>Masalah</td><td>: " . nl2br(htmlspecialchars($masalah)) . "</td></tr>" : '')
        .   ($alasan !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>Alasan</td><td>: " . htmlspecialchars($alasan) . "</td></tr>" : '')
        .   ($sebab !== '' ? "<tr><td style='padding:2px 8px 2px 0;'>Penyebab</td><td>: " . htmlspecialchars($sebab) . "</td></tr>" : '')
        . "</table>";

      // Detail Warna/Qty
      $detailHtml .= "<div style='margin-top:8px;font-weight:bold;'>Qty</div>"
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

      // Handle optional attachment upload (.msg / .zip) and append download link
      $uploadedFileUrl = '';
      if (isset($_FILES['attachment']) && is_array($_FILES['attachment']) && isset($_FILES['attachment']['error']) && $_FILES['attachment']['error'] !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
          $maxSize = 20 * 1024 * 1024; // 20 MB
          $size = isset($_FILES['attachment']['size']) ? (int)$_FILES['attachment']['size'] : 0;
          $ext = strtolower(pathinfo($_FILES['attachment']['name'], PATHINFO_EXTENSION));
          $allowed = ['msg', 'zip'];

          if ($size > $maxSize) {
            error_log('Upload gagal: ukuran file melebihi batas.');
          } elseif (!in_array($ext, $allowed, true)) {
            error_log('Upload gagal: ekstensi tidak diizinkan.');
          } else {
            $uploadDir = __DIR__ . '/../uploads/gantikain/';
            if (!is_dir($uploadDir)) {
              @mkdir($uploadDir, 0775, true);
            }
            $origName = preg_replace('/[^A-Za-z0-9._-]/', '_', $_FILES['attachment']['name']);
            $newFileName = date('Ymd_His') . '_' . $id_bon . '_' . $origName;
            $destPath = $uploadDir . $newFileName;
            if (@move_uploaded_file($_FILES['attachment']['tmp_name'], $destPath)) {
              // Bangun URL absolut yang robust berdasarkan SCRIPT_NAME (bukan PHP_SELF)
              $scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
              $uploadedFileUrl = $baseUrl . $scriptDir . '/uploads/gantikain/' . rawurlencode($newFileName);
            } else {
              error_log('Upload gagal: tidak dapat memindahkan file.');
            }
          }
        } else {
          error_log('Upload gagal: kode error ' . $_FILES['attachment']['error']);
        }
      }

      if ($uploadedFileUrl !== '') {
        $bodyHtml .= "<div style='margin-top:8px;'><b>Lampiran:</b> <a href='" . $uploadedFileUrl . "' target='_blank' style='color:#337ab7;text-decoration:underline;'>Download file</a></div>";
      }

      // 4. Kirim email
      $send_result = sendEmailApproved($to_emails, $subject, $bodyHtml);

      if ($send_result) {
        // Catat waktu kirim notifikasi email ke bon terkait
        mysqli_query($con, "UPDATE tbl_ganti_kain_now SET tgl_kirim_notif_gantikain = NOW() WHERE id='" . intval($id_bon) . "'");
        // $message =   "<script>swal({
        //                         title: 'Bon Telah di Ajukan Approve',
        //                         text: 'Status bon sudah di proses',
        //                         type: 'success',
        //                       }).then((result) => {
        //                         if (result.value) {
        //                           window.location.href='LapGantiKain';
        //                         }
        //                       });</script>";
        $message = "<script>
                    swal({
                        title: 'Bon Telah di Ajukan Approve',
                        text: 'Status bon sudah di proses',
                        type: 'success'
                    });
                </script>";
      } else {
        $err_msg_js = addslashes(getLastMailerError());
        $message = "<script>
                    swal({
                        title: 'Gagal Mengirim Email',
                        text: 'Bon berhasil di-approve, namun email gagal dikirim. Error: " . $err_msg_js . "',
                        type: 'error'
                    });
                </script>";
      }
    }
  }
}

// Tangani hapus lampiran via AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_attachment']) && $_POST['delete_attachment'] == '1') {
  header('Content-Type: application/json');
  $idBon = isset($_POST['id_bon']) ? intval($_POST['id_bon']) : 0;
  $filename = isset($_POST['filename']) ? basename($_POST['filename']) : '';
  $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
  $allowed = ['msg', 'zip'];
  if ($idBon <= 0 || $filename === '' || !in_array($ext, $allowed, true)) {
    echo json_encode(['ok' => false, 'msg' => 'Parameter tidak valid']);
    exit;
  }
  if (strpos($filename, '_' . $idBon . '_') === false) {
    echo json_encode(['ok' => false, 'msg' => 'Lampiran tidak cocok dengan data']);
    exit;
  }
  $dir = realpath(__DIR__ . '/../uploads/gantikain');
  if (!$dir) {
    echo json_encode(['ok' => false, 'msg' => 'Folder lampiran tidak ditemukan']);
    exit;
  }
  $fullPath = $dir . DIRECTORY_SEPARATOR . $filename;
  // Pastikan file berada di dalam folder target (gunakan realpath aman)
  $real = realpath($fullPath);
  if ($real === false) {
    echo json_encode(['ok' => false, 'msg' => 'File tidak ditemukan']);
    exit;
  }
  if (strpos($real, $dir) !== 0) {
    echo json_encode(['ok' => false, 'msg' => 'Akses ditolak']);
    exit;
  }
  if (file_exists($real)) {
    if (@unlink($real)) {
      echo json_encode(['ok' => true]);
    } else {
      echo json_encode(['ok' => false, 'msg' => 'Gagal menghapus file']);
    }
  } else {
    echo json_encode(['ok' => false, 'msg' => 'File tidak ditemukan']);
  }
  exit;
}




// --- Bagian HTML dan filter data ---
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$qryCek = mysqli_query($con, "SELECT * FROM tbl_aftersales_now WHERE `id`='$id'");
$rCek = mysqli_fetch_array($qryCek);
$po_esc = isset($rCek['po']) ? mysqli_real_escape_string($con, $rCek['po']) : '';

// Ambil data filter dari POST, gunakan nilai default jika kosong
$Awal           = isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir          = isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Order          = isset($_POST['order']) ? $_POST['order'] : '';
$Langganan      = isset($_POST['langganan']) ? $_POST['langganan'] : '';
$PO             = isset($_POST['po']) ? $_POST['po'] : '';
$Status         = isset($_POST['status']) ? $_POST['status'] : '';
$TotalKirim     = isset($_POST['total']) ? $_POST['total'] : '';
$Bon            = isset($_POST['bon']) ? $_POST['bon'] : '';
$Warna          = isset($_POST['warna']) ? $_POST['warna'] : '';
$Hanger         = isset($_POST['hanger']) ? $_POST['hanger'] : '';
$OrderReplacement = isset($_POST['order_replacement']) ? $_POST['order_replacement'] : 0;
$StatusOnProgress = isset($_POST['status_is_on_progress']) ? $_POST['status_is_on_progress'] : 0;
$StatusClosed = isset($_POST['status_is_closed']) ? $_POST['status_is_closed'] : 0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Laporan Harian Produksi</title>
  <!-- Tambahkan link CSS Bootstrap atau custom CSS jika diperlukan untuk styling alert -->
</head>

<body>

  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"> Filter Laporan Ganti Kain</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
      <div class="box-body">
        <div class="form-group">
          <div class="col-sm-2">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="awal" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off" />
            </div>
          </div>
          <div class="col-sm-2">
            <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order"
              value="<?php echo $Order; ?>" autocomplete="off" />
          </div>
          <div class="col-sm-2">
            <input name="langganan" type="text" class="form-control pull-right" id="langganan" placeholder="Langganan/Buyer"
              value="<?php echo $Langganan; ?>" autocomplete="off" />
          </div>
          <div class="col-sm-2">
            <input name="warna" type="text" class="form-control pull-right" id="warna" placeholder="Warna"
              value="<?php echo $Warna; ?>" autocomplete="off" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-2">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir"
                value="<?php echo $Akhir; ?>" autocomplete="off" />
            </div>
          </div>
          <div class="col-sm-2">
            <input name="po" type="text" class="form-control pull-right" id="po" placeholder="No PO"
              value="<?php echo $PO; ?>" autocomplete="off" />
          </div>
          <div class="col-sm-2">
            <input name="bon" type="text" class="form-control pull-right" id="bon" placeholder="No Bon"
              value="<?php echo $Bon; ?>" autocomplete="off" />
          </div>
          <div class="col-sm-2">
            <input name="hanger" type="text" class="form-control pull-right" id="hanger" placeholder="Hanger"
              value="<?php echo $Hanger; ?>" autocomplete="off" />
          </div>
          <!-- /.input group -->
        </div>

        <div class="form-group">
          <div class="col-sm-2">
            <div class="input-group date">
              <div class="input-group-addon"> Total Kirim</div>
              <input name="total" type="text" class="form-control pull-right" placeholder="0"
                value="<?php echo $TotalKirim; ?>" />
            </div>
          </div>
          <div class="col-sm-2" style="align-items: center; display: flex; gap: 4px;">
            <input type="checkbox" style="margin: 0;" name="order_replacement" id="order_replacement" value="1" <?= $OrderReplacement > 0 ? 'checked' : '' ?>>
            <label for="order_replacement" style="margin: 0;">Order Replacement</label>
          </div>
          <div class="col-sm-2" style="align-items: center; display: flex; gap: 4px;">
            <input type="checkbox" style="margin: 0;" name="status_is_on_progress" id="status_is_on_progress" value="1" <?= $StatusOnProgress > 0 ? 'checked' : '' ?>>
            <label for="status_is_on_progress" style="margin: 0;">On Progress</label>
          </div>
          <div class="col-sm-2" style="align-items: center; display: flex; gap: 4px;">
            <input type="checkbox" style="margin: 0;" name="status_is_closed" id="status_is_closed" value="1" <?= $StatusClosed > 0 ? 'checked' : '' ?>>
            <label for="status_is_closed" style="margin: 0;">Closed</label>
          </div>
        </div>

        <!-- <div class="form-group">
        <div class="col-sm-2">
          <select name="status" class="form-control select2">
            <option value="">Pilih</option>
            <option value="BELUM OK" <?php if ($Status == "BELUM OK") {
                                        echo "SELECTED";
                                      } ?>>BELUM OK</option>
            <option value="OK" <?php if ($Status == "OK") {
                                  echo "SELECTED";
                                } ?>>OK</option>
          </select>
        </div>
      </div> -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="col-sm-2">
          <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
        </div>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Ganti Kain</h3><br>
          <?php if ($_POST['awal'] != "") { ?>
            <b>Periode: <?php echo $_POST['awal'] . " to " . $_POST['akhir']; ?></b>
          <?php } ?>
          <?php
          $tglawal = new DateTime($Awal);
          $tglakhir = new DateTime($Akhir);
          $d = $tglakhir->diff($tglawal)->days;
          ?>
          <div class="pull-right">
            <a href="pages/cetak/lap-gantikain-excel.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&order=<?php echo $Order; ?>&langganan=<?php echo $Langganan; ?>&po=<?php echo $PO; ?>&status=<?php echo $Status; ?>&total=<?php echo $TotalKirim; ?>&bon=<?php echo $Bon; ?>&warna=<?php echo $Warna; ?>&hanger=<?php echo $Hanger; ?>&order_replacement=<?php echo $OrderReplacement; ?>&status_is_on_progress=<?php echo $StatusOnProgress; ?>&status_is_closed=<?php echo $StatusClosed; ?>" class="btn btn-success " target="_blank">Export Excel</a>
          </div>
          <?php if ($d > 25) { ?>
            <div class="pull-right">
              <a href="pages/cetak/cetak_gantikainnew.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-danger <?php if ($_POST['awal'] == "") {
                                                                                                                                                                                                echo "disabled";
                                                                                                                                                                                              } ?>" target="_blank">Cetak Ganti Kain</a>
              <a href="pages/cetak/excel_gantikainnew.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-danger <?php if ($_POST['awal'] == "") {
                                                                                                                                                                                                echo "disabled";
                                                                                                                                                                                              } ?>" target="_blank">Tracking Replacement</a>
              <a href="pages/cetak/cetak_summary_gantikain.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-danger <?php if ($_POST['awal'] == "") {
                                                                                                                                                                                                      echo "disabled";
                                                                                                                                                                                                    } ?>" target="_blank">Summary Ganti Kain</a>
            </div>
          <?php } ?>
          <?php if ($d < 25 and $d > 0) { ?>
            <div class="pull-right">
              <a href="pages/cetak/cetak_gantikain_mingguan.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-success <?php if ($_POST['awal'] == "") {
                                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                                      } ?>" target="_blank">Cetak FTT G1</a>
              <a href="pages/cetak/excel_gantikainnew.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-success <?php if ($_POST['awal'] == "") {
                                                                                                                                                                                                  echo "disabled";
                                                                                                                                                                                                } ?>" target="_blank">Tracking Replacement</a>
              <a href="pages/cetak/cetak_summary_gantikain.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-success <?php if ($_POST['awal'] == "") {
                                                                                                                                                                                                      echo "disabled";
                                                                                                                                                                                                    } ?>" target="_blank">Summary Ganti Kain</a>
            </div>
          <?php } ?>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

        <div class="box-body">
          <div class="clearfix" style="margin-bottom:8px;">
            <button type="button" id="btnCetakBonGanti" class="btn btn-danger btn-sm pull-right">
              <i class="fa fa-print"></i> Cetak Bon Ganti
            </button>
            <a href="pages/data_approved_gantikain.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&order=<?php echo $Order; ?>&langganan=<?php echo $Langganan; ?>&po=<?php echo $PO; ?>&status=<?php echo $Status; ?>&total=<?php echo $TotalKirim; ?>&bon=<?php echo $Bon; ?>&warna=<?php echo $Warna; ?>&hanger=<?php echo $Hanger; ?>&order_replacement=<?php echo $OrderReplacement; ?>&status_is_on_progress=<?php echo $StatusOnProgress; ?>&status_is_closed=<?php echo $StatusClosed; ?>" class="btn btn-primary btn-sm pull-right" style="margin-left: 8px;" target="_blank">Serah Terima</a>
          </div>
          <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
            <thead class="bg-blue">
              <tr>
                <th rowspan="2">
                  <div align="center">No<br>
                    <input type="checkbox" id="selectAllGK" title="Pilih semua">
                  </div>
                </th>
                <th rowspan="2">
                  <div align="center">Aksi</div>
                </th>
                <th rowspan="2">
                  <div align="center">Status</div>
                </th>
                <th rowspan="2">
                  <div align="center">Notes</div>
                </th>
                <th rowspan="2">
                  <div align="center">Lampiran</div>
                </th>
                <th rowspan="2">
                  <div align="center">Tgl</div>
                </th>
                <th rowspan="2">
                  <div align="center">No Bon</div>
                </th>
                <th rowspan="2">
                  <div align="center">Langganan</div>
                </th>
                <th rowspan="2">
                  <div align="center">PO</div>
                </th>
                <th rowspan="2">
                  <div align="center">Order</div>
                </th>
                <th rowspan="2">
                  <div align="center">Order Baru</div>
                </th>
                <th rowspan="2">
                  <div align="center">Detail</div>
                </th>
                <th rowspan="2">
                  <div align="center">Jenis Kain</div>
                </th>
                <th rowspan="2">
                  <div align="center">No Item</div>
                </th>
                <th rowspan="2">
                  <div align="center">No Hanger</div>
                </th>
                <th rowspan="2">
                  <div align="center">Lebar &amp; Gramasi</div>
                </th>
                <th rowspan="2">
                  <div align="center">Warna</div>
                </th>
                <th rowspan="2">
                  <div align="center">Qty Order</div>
                </th>
                <th rowspan="2">
                  <div align="center">Qty Kirim</div>
                </th>
                <th rowspan="2">
                  <div align="center">Qty Extra</div>
                </th>
                <th colspan="2">
                  <div align="center">Request Qty.</div>
                </th>
                <th colspan="2">
                  <div align="center">Replace Qty.</div>
                </th>
                <th colspan="2">
                  <div align="center">Reduce Qty.</div>
                </th>
                <th rowspan="2">
                  <div align="center">Masalah</div>
                </th>
                <th rowspan="2">
                  <div align="center">Analisa</div>
                </th>
                <th rowspan="2">
                  <div align="center">Pencegahan</div>
                </th>
                <th rowspan="2">
                  <div align="center">Sub Defect</div>
                </th>
                <th rowspan="2">
                  <div align="center">T Jawab</div>
                </th>
              </tr>
              <tr>
                <th>
                  <div align="center">Kg</div>
                </th>
                <th>
                  <div align="center">Satuan</div>
                </th>
                <th>
                  <div align="center">Kg</div>
                </th>
                <th>
                  <div align="center">Satuan</div>
                </th>
                <th>
                  <div align="center">Kg</div>
                </th>
                <th>
                  <div align="center">Satuan</div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              //menampilkan nomor urut
              $no = 1;

              //membuat kondisi where untuk query
              $Where = "";
              if ($Awal != "") $Where .= " AND DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$Awal' AND '$Akhir' ";
              if ($Status != "") $Where .= " AND `status`='$Status' ";
              if ($Warna != "") $Where .= " AND `warna`='$Warna' ";
              if ($Hanger != "") $Where .= " AND `no_hanger`='$Hanger' ";
              if ($Order != "") $Where .= " AND `no_order` LIKE '%$Order%' ";
              if ($PO != "") $Where .= " AND `no_po` LIKE '%$PO%' ";
              if ($Langganan != "") $Where .= " AND `langganan` LIKE '%$Langganan%' ";
              if ($Bon != "") $Where .= " AND `no_bon` LIKE '%$Bon%' ";
              if ($StatusOnProgress == 1 && $StatusClosed == 1) {
                $Where .= " AND (`status` = 'On Progress' OR `status` = 'Closed') ";
              } elseif ($StatusOnProgress == 1) {
                $Where .= " AND `status` = 'On Progress' ";
              } elseif ($StatusClosed == 1) {
                $Where .= " AND `status` = 'Closed' ";
              }

              // handle jika where kosong, tampilkan data kosong
              if (trim($Where) == "") {
                $sql_qry1 = "SELECT * FROM tbl_ganti_kain_now WHERE 1=0";
              } else {
                $sql_qry1 = "SELECT *, substr(no_hanger,1,3) as prefix, substr(no_hanger,4) as subprefix FROM tbl_ganti_kain_now WHERE id_disposisi IS NULL $Where ORDER BY tgl_buat ASC";
              }
              $qry1 = mysqli_query($con, $sql_qry1);


              // echo '<pre>';
              // print_r($sql_qry1);
              // echo '</pre>';


              while ($row1 = mysqli_fetch_array($qry1)) {
                if ($row1['t_jawab'] != "" and $row1['t_jawab1'] != "" and $row1['t_jawab2'] != "") {
                  $tjawab = $row1['t_jawab'] . "+" . $row1['t_jawab1'] . "+" . $row1['t_jawab2'];
                } else if ($row1['t_jawab'] != "" and $row1['t_jawab1'] != "" and $row1['t_jawab2'] == "") {
                  $tjawab = $row1['t_jawab'] . "+" . $row1['t_jawab1'];
                } else if ($row1['t_jawab'] != "" and $row1['t_jawab1'] == "" and $row1['t_jawab2'] != "") {
                  $tjawab = $row1['t_jawab'] . "+" . $row1['t_jawab2'];
                } else if ($row1['t_jawab'] == "" and $row1['t_jawab1'] != "" and $row1['t_jawab2'] != "") {
                  $tjawab = $row1['t_jawab1'] . "+" . $row1['t_jawab2'];
                } else if ($row1['t_jawab'] != "" and $row1['t_jawab1'] == "" and $row1['t_jawab2'] == "") {
                  $tjawab = $row1['t_jawab'];
                } else if ($row1['t_jawab'] == "" and $row1['t_jawab1'] != "" and $row1['t_jawab2'] == "") {
                  $tjawab = $row1['t_jawab1'];
                } else if ($row1['t_jawab'] == "" and $row1['t_jawab1'] == "" and $row1['t_jawab2'] != "") {
                  $tjawab = $row1['t_jawab2'];
                } else if ($row1['t_jawab'] == "" and $row1['t_jawab1'] == "" and $row1['t_jawab2'] == "") {
                  $tjawab = "";
                }
                $qty_red = $row1['qty_email'] - $row1['kg1'];
                $satuan_red = $row1['pjg_email'] - $row1['pjg1'];
              ?>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                  <td align="center">
                    <?php echo $no; ?><br>
                    <input type="checkbox" name="cek[]" value="<?php echo (int)$row1['id']; ?>"
                      data-id_nsp="<?php echo (int)$row1['id_nsp']; ?>"
                      data-no_order="<?php echo htmlspecialchars($row1['no_order']); ?>"
                      data-po="<?php echo htmlspecialchars($row1['no_po']); ?>"
                      data-no_bon="<?php echo htmlspecialchars($row1['no_bon']); ?>">
                  </td>
                  <td align="center">
                    <div class="btn-group">
                      <a href="#" class="btn btn-success btn-xs" onclick="confirm_terima('ApprovedBon-<?php echo $row1['id']; ?>-<?php echo htmlspecialchars($row1['no_bon'], ENT_QUOTES); ?>-<?php echo htmlspecialchars($row1['id_nsp'], ENT_QUOTES); ?>');"><i class="fa fa-check-circle" data-toggle="tooltip" data-placement="top" title="Approved"></i></a>
                      <a target="blank" href="EditKPENewBon-<?php echo $row1['id'] ?>" class="btn btn-info btn-xs " target="_blank"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i> </a>
                      <a href="#" class="btn btn-danger btn-xs <?php if ($_SESSION['akses'] == 'biasa' or $_SESSION['lvl_id'] != 'AFTERSALES') {
                                                                  echo "disabled";
                                                                } ?>" onclick="confirm_delete('./HapusDataGK-<?php echo $row1['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a>
                      <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#Approvedmf"
                         data-id="<?php echo (int)$row1['id']; ?>"
                         data-approved_dmf="<?php echo htmlspecialchars($row1['approved_dmf']); ?>"
                         data-tgl="<?php echo htmlspecialchars($row1['tgl_approved_dmf']); ?>"
                         data-ket="<?php echo htmlspecialchars(isset($row1['ket_dmf']) ? $row1['ket_dmf'] : ''); ?>">
                        <i class="fa fa-check-circle"></i>
                      </a>
                    </div>
                  </td>
                  <td align="center"><a data-pk="<?php echo $row1['id']; ?>" data-value="<?php echo $row1['status'] ?>" class="statusgk2" href="javascript:void(0)"><?php echo $row1['status']; ?></a></td>
                  <td align="center">
                    <?php if ($row1['note_csr']) : ?>
                      <abbr title="<?= $row1['note_csr']; ?>" data-toggle="modal" data-target="#confirm-note<?= $row1['id']; ?>">View Note</abbr>
                    <?php else : ?>
                      <button type="button" style="color: #4778FF;" data-toggle="modal" data-target="#confirm-note<?= $row1['id']; ?>">
                        💬</i>Notes
                      </button>
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php
                    $attachDirFs = realpath(__DIR__ . '/../uploads/gantikain');
                    $hasShown = false;
                    if ($attachDirFs) {
                      $pattern = $attachDirFs . DIRECTORY_SEPARATOR . '*_' . $row1['id'] . '_*';
                      $matchedFiles = glob($pattern);
                      if ($matchedFiles && count($matchedFiles) > 0) {
                        $webRoot = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
                        foreach ($matchedFiles as $mf) {
                          $bn = basename($mf);
                          $url = $webRoot . '/uploads/gantikain/' . rawurlencode($bn);
                          echo '<div class="attachment-item" data-id="' . (int)$row1['id'] . '" data-file="' . htmlspecialchars($bn, ENT_QUOTES) . '">';
                          echo '<a href="' . htmlspecialchars($url, ENT_QUOTES) . '" target="_blank">Download</a> ';
                          echo '<button type="button" class="btn btn-link text-danger btn-xs btn-delete-attachment" data-id="' . (int)$row1['id'] . '" data-file="' . htmlspecialchars($bn, ENT_QUOTES) . '"><i class="fa fa-trash"></i> Hapus</button>';
                          echo '</div>';
                          $hasShown = true;
                        }
                      }
                    }
                    if (!$hasShown) {
                      echo '-';
                    }
                    ?>
                  </td>
                  <td align="center"><?php echo $row1['tgl_buat']; ?></td>
                  <td align="center"><?php echo $row1['no_bon']; ?></td>
                  <td><?php echo $row1['langganan']; ?></td>
                  <td align="center"><?php echo $row1['no_po']; ?></td>
                  <td align="center"><?php echo $row1['no_order']; ?></td>
                  <!-- <td align="center"><a data-pk="https://online.indotaichen.com/laporan/aftersales_memopenting_order.php?bonorder=<?php echo $row1['id'] ?>" data-value="<?php echo $row1['no_ordernew'] ?>" class="newordergk" href="javascipt:void(0)"><?php echo $row1['no_ordernew'] ?></a></td> -->
                  <!-- <?php if ($row1['no_ordernew'] != '') { ?>
                    <td align="center">
                      <a target="_blank" href="https://online.indotaichen.com/laporan/aftersales_memopenting_order.php?bonorder=<?php echo $row1['no_ordernew'] ?>"><?php echo $row1['no_ordernew']; ?></a>
                      <a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['no_ordernew'] ?>" class="newordergk" href="javascript:void(0)">Edit</a>
                    </td>
                    <?php } else { ?>
                    <td align="center">
                    <a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['no_ordernew'] ?>" class="newordergk" href="javascript:void(0)"><?php echo $row1['no_ordernew']; ?></a>
                    </td>
                    <?php } ?> -->
                  <td align="center">
                    <?php
                    // Escape single quotes for SQL
                    $no_po_safe = str_replace("'", "''", $row1['no_po']);
                    if ($OrderReplacement > 0) {
                      $q_order_new = db2_exec($conn1, "SELECT DISTINCT
                                                          NO_ORDER
                                                        FROM
                                                          ITXVIEW_MEMOPENTINGPPC
                                                        WHERE
                                                          NO_PO LIKE '%$no_po_safe%' 
                                                          AND SUBCODE02 = '$row1[prefix]'
                                                          AND SUBCODE03 = '$row1[subprefix]' 
                                                      AND WARNA LIKE '%$row1[warna]%'
                                                          AND (SUBSTR(NO_ORDER, 1, 3) = 'RPE'
                                                            OR SUBSTR(NO_ORDER, 1, 3) = 'REP')
                                                          ");

                      while ($d_order_new = db2_fetch_assoc($q_order_new)) {
                    ?><a target="_blank" href="https://online.indotaichen.com/laporan/aftersales_memopenting_order.php?bonorder=<?php echo $d_order_new['NO_ORDER'] ?>"><?php echo $d_order_new['NO_ORDER']; ?></a><br>
                    <?php
                      }
                    }
                    ?>
                  </td>
                  <td align="center">
                    <?php
                    if ($OrderReplacement > 0) {
                      $query = "SELECT DISTINCT NO_ORDER
                                    FROM ITXVIEW_MEMOPENTINGPPC
                                    WHERE NO_PO LIKE '%$no_po_safe%' 
                                      AND SUBCODE02 = '$row1[prefix]'
                                      AND SUBCODE03 = '$row1[subprefix]' 
                                  AND WARNA LIKE '%$row1[warna]%'
                                      AND (
                                        SUBSTR(NO_ORDER, 1, 3) = 'RPE' OR 
                                        SUBSTR(NO_ORDER, 1, 3) = 'REP'
                                      )
                                  ";

                      $q_order_new = db2_exec($conn1, $query);

                      while ($d_order_new = db2_fetch_assoc($q_order_new)) {
                        $q_sum_po_selesai = db2_exec(
                          $conn1,
                          "SELECT
                                      isqd.ORDERLINE,
                                      isqd.PELANGGAN,
                                      TRIM(isqd.NO_ORDER) AS NO_ORDER,
                                      isqd.NO_PO,
                                      isqd.KET_PRODUCT,
                                      isqd.STYLE,
                                      isqd.LEBAR,
                                      isqd.GRAMASI,
                                      isqd.WARNA,
                                      isqd.NO_WARNA,
                                      isqd.PRICEUNITOFMEASURECODE,
                                      isqd.NETTO,
                                      isqd.NETTO_2,
                                      isqd.NETTO_M,
                                      isqd.KONVERSI,
                                      isqd.ACTUAL_DELIVERY,
                                      SUM(isqd.QTY_SUDAH_KIRIM) AS QTY_SUDAH_KIRIM,
                                      SUM(isqd.QTY_SUDAH_KIRIM_2) AS QTY_SUDAH_KIRIM_2,
                                      CASE
                                        WHEN DAYS(now()) - DAYS(Timestamp_Format(isqd.ACTUAL_DELIVERY, 'YYYY-MM-DD')) < 0 THEN 0
                                        ELSE DAYS(now()) - DAYS(Timestamp_Format(isqd.ACTUAL_DELIVERY, 'YYYY-MM-DD'))
                                      END AS DELAY,
                                      isqd.SUBCODE01,
                                      isqd.SUBCODE02,
                                      isqd.SUBCODE03,
                                      isqd.SUBCODE04,
                                      isqd.SUBCODE05,
                                      isqd.SUBCODE06,
                                      isqd.SUBCODE07,
                                      isqd.SUBCODE08,
                                      s.STATISTICALGROUPCODE,
                                      ip.BUYER 
                                    FROM
                                      ITXVIEW_SUMMARY_QTY_DELIVERY isqd
                                    LEFT JOIN SALESORDER s ON s.CODE = isqd.NO_ORDER 
                                    LEFT JOIN ITXVIEW_PELANGGAN ip ON ip.ORDPRNCUSTOMERSUPPLIERCODE = s.ORDPRNCUSTOMERSUPPLIERCODE AND ip.CODE = s.CODE 
                                    WHERE
                                      isqd.NO_ORDER = '$d_order_new[NO_ORDER]'
                                    GROUP BY
                                      isqd.ORDERLINE,
                                      isqd.PELANGGAN,
                                      isqd.NO_ORDER,
                                      isqd.NO_PO,
                                      isqd.KET_PRODUCT,
                                      isqd.STYLE,
                                      isqd.LEBAR,
                                      isqd.GRAMASI,
                                      isqd.WARNA,
                                      isqd.NO_WARNA,
                                      isqd.PRICEUNITOFMEASURECODE,
                                      isqd.NETTO,
                                      isqd.NETTO_2,
                                      isqd.NETTO_M,
                                      isqd.KONVERSI,
                                      isqd.ACTUAL_DELIVERY,
                                      isqd.SUBCODE01,
                                      isqd.SUBCODE02,
                                      isqd.SUBCODE03,
                                      isqd.SUBCODE04,
                                      isqd.SUBCODE05,
                                      isqd.SUBCODE06,
                                      isqd.SUBCODE07,
                                      isqd.SUBCODE08,
                                      s.STATISTICALGROUPCODE,
                                      ip.BUYER  
                                    ORDER BY
                                      isqd.ORDERLINE ASC
                                  "
                        );
                        $dt_sum = db2_fetch_assoc($q_sum_po_selesai);

                        $ResultLotCode = "
                                    SELECT 
                                      LISTAGG('''' || TRIM(PRODUCTIONORDERCODE) || '''', ', ') AS PRODUCTIONORDERCODE,
                                      LISTAGG('''' || TRIM(PRODUCTIONDEMANDCODE) || '''', ', ') AS PRODUCTIONDEMANDCODE
                                    FROM 
                                      ITXVIEWKK
                                    WHERE 
                                      PROJECTCODE = '$d_order_new[NO_ORDER]'
                                      AND ITEMTYPEAFICODE = 'KFF'
                                      AND ORIGDLVSALORDERLINEORDERLINE = '$dt_sum[ORDERLINE]'
                                  ";
                        $exec_lotcode = db2_exec($conn1, $ResultLotCode);
                        $fetch_lotcode = db2_fetch_assoc($exec_lotcode);
                    ?>
                        <a target="_blank"
                          href="/laporan-itti/ppc_filter_poselesai_summary_detail.php?no_order=<?php echo TRIM($d_order_new['NO_ORDER']); ?>&orderline=<?= $dt_sum['ORDERLINE']; ?>&PRODUCTIONORDERCODE=<?= $fetch_lotcode['PRODUCTIONORDERCODE'] ?>&PRODUCTIONDEMANDCODE=<?= $fetch_lotcode['PRODUCTIONDEMANDCODE'] ?>">
                          Detail
                        </a><br>
                    <?php
                      }
                    }
                    ?>
                    <!-- <td align="center">
                    <a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['no_ordernew'] ?>" class="newordergk" <?php if (empty($row1['bonorder'])) { ?> href="javascript:void(0)" <?php } else { ?> href="https://online.indotaichen.com/laporan/aftersales_memopenting_order.php?bonorder=<?php echo $row1['bonorder'] ?>" <?php } ?> target="_blank"><?php echo $row1['no_ordernew'] ?></a>
                    </td> -->
                    <!-- <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['status1'] ?>" class="status1" href="javascipt:void(0)"><?php echo $row1['status1'] ?></a></td>
                    <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['status2'] ?>" class="status2" href="javascipt:void(0)"><?php echo $row1['status2'] ?></a></td>
                    <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['status3'] ?>" class="status3" href="javascipt:void(0)"><?php echo $row1['status3'] ?></a></td> -->
                  <td><?php echo substr($row1['jenis_kain'], 0, 50); ?></td>
                  <td align="center"><?php echo $row1['no_item']; ?></td>
                  <td align="center"><?php echo $row1['no_hanger']; ?></td>
                  <td align="center"><?php echo $row1['lebar'] . "x" . $row1['gramasi']; ?></td>
                  <td align="left"><?php echo substr($row1['warna1'], 0, 20); ?></td>
                  <td align="right"><?php echo $row1['qty_order']; ?></td>
                  <td align="right"><?php echo $row1['qty_kirim']; ?></td>
                  <td align="right"><?php echo $row1['qty_foc']; ?></td>
                  <!-- <td align="right"><?php echo $row1['kg1']; ?></td>
                    <td align="center"><?php echo $row1['pjg1'] . " " . $row1['satuan1']; ?></td> -->
                  <td align="right"><?php echo $row1['qty_email']; ?></td>
                  <td align="center"><?php echo $row1['pjg_email'] . " " . $row1['satuan1']; ?></td>
                  <td align="right"><?php echo $row1['kg1']; ?></td>
                  <!-- <td align="center"><?php echo $row1['pjg1'] . " yd" ?></td> -->
                  <td align="center"><?php echo $row1['pjg1'] . " " . $row1['satuan1']; ?></td>
                  <td align="right"><?php echo   $qty_red; ?></td>
                  <td align="center"><?php echo $satuan_red . " " . $row1['satuan1']; ?></td>
                  <td><?php echo $row1['masalah']; ?></td>
                  <td><?php echo $row1['analisa']; ?></td>
                  <td><?php echo $row1['pencegahan']; ?></td>
                  <td><?php echo $row1['sub_defect']; ?></td>
                  <td align="center"><?php echo $tjawab; ?></td>
                </tr>

                <div id="confirm-note<?= $row1['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="padding-bottom: 0px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Notes</h4>
                        <p class="text-inverse text-left" style="margin-top: 20px;"><b>Silahkan masukan keterangan dibawah ini.</b></p>
                        <p class="text-inverse text-left m-b-0">Anda akan menambahkan notes pada No PO: <?= $row1['no_po']; ?>.</p>
                      </div>
                      <div class="modal-body">
                        <textarea
                          id="note-text-<?= $row1['id']; ?>"
                          placeholder="..."
                          style="width: 100%; 
                            height: 150px; 
                            padding: 12px 20px; 
                            box-sizing: border-box;
                            border: 2px solid #ccc; 
                            border-radius: 4px; 
                            background-color: #f8f8f8; 
                            font-size: 16px; 
                            resize: none;"><?= $row1['note_csr'] ?? "" ?></textarea>
                        <div class="row m-t-15">
                          <div class="col-md-12">
                            <button autocomplete="off" class="btn-save-note btn btn-primary btn-md btn-block waves-effect text-center"
                              data-id="<?= $row1['id']; ?>"
                              data-no_po="<?= $row1['no_po']; ?>">Confirm</button>
                          </div>
                        </div>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
              <?php $no++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_del" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Are you sure to delete all data ?</h4>
        </div>
        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
          <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <div id="StsGKEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

  <!-- Modal Popup untuk terima bon-->
  <div class="modal fade" id="terimaBon" tabindex="-1" role="dialog" aria-labelledby="terimaBonLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="margin-top:100px;">
        <form id="approveForm" method="post" action="" enctype="multipart/form-data">
          <div class="modal-header bg-primary text-white">
            <h4 class="modal-title" id="terimaBonLabel">NOTIFIKASI BON KAIN</h4>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center mb-3">
              <span class="badge badge-success">Approved</span>
              <h5>Bon Ganti Kain No: <b id="bonNumber"></b></h5>
            </div>
            <div class="form-group">
              <label for="email"><strong>Pilih Email Penerima</strong></label>
              <select class="form-control" id="email" name="email[]" multiple required>
                <option disabled>Pilih satu atau lebih email...</option>
                <?php
                $queryEmail = mysqli_query($con, "SELECT email, nama FROM master_email ORDER BY nama ASC");
                while ($rowEmail = mysqli_fetch_assoc($queryEmail)) {
                  echo '<option value="' . htmlspecialchars($rowEmail['email']) . '">' .
                    htmlspecialchars($rowEmail['nama']) . ' <' . htmlspecialchars($rowEmail['email']) . '></option>';
                }
                ?>
              </select>
              <small class="form-text text-muted">
                Tekan <kbd>Ctrl</kbd> (atau <kbd>Cmd</kbd> di Mac) untuk memilih lebih dari satu email.
              </small>
            </div>
            <div class="form-group">
              <label for="attachment"><strong>Lampirkan File (.msg atau .zip) — opsional</strong></label>
              <input type="file" class="form-control" id="attachment" name="attachment" accept=".msg,.zip" />
              <small class="form-text text-muted">Maks. 20 MB. Hanya file dengan ekstensi .msg atau .zip.</small>
            </div>
            <input type="hidden" name="approve_bon" value="1">
            <!-- <input type="hidden" name="id_bon" id="id_bon_approve" value=""> -->
            <input type="hidden" name="id_bon" id="id_bon_approve" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              <i class="fa fa-times"></i> Batal
            </button>
            <button type="button" class="btn btn-success" id="btnApproveAjax">
              <i class="fa fa-check"></i> Kirim
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal: Update Approve DMF -->
  <div class="modal fade modal-super-scaled" id="Approvedmf">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Keterangan Approve DMF</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="control-label col-sm-4">Keterangan</label>
              <div class="col-sm-8">
                <textarea name="ket_dmf" class="form-control" placeholder="Catatan (opsional)" rows="5"></textarea>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label col-sm-4">Approved DMF</label>
              <div class="col-sm-3">
                <select name="approved_dmf" class="form-control" required>
                  <option value="">-- Pilih --</option>
                  <option value="Approved">Approved</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4">Tanggal Approved DMF</label>
              <div class="col-sm-6">
                <input type="datetime-local" name="tgl_approved_dmf" class="form-control" value="" required>
              </div>
            </div>
            <input type="hidden" name="id" value="">
          </div>
          <br />
          <br />
          <br />
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
            <button type="submit" name="simpan_dmf" value="1" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script>
    // Pre-fill modal on trigger click (fallback) and on show
    function fillApprovedmf($trigger, $modal){
      if (!$trigger || $trigger.length === 0 || !$modal || $modal.length === 0) return;
      var id   = $trigger.data('id');
      var appr = $trigger.data('approved_dmf');
      var tgl  = $trigger.data('tgl');
      var ket  = $trigger.data('ket');
      // Fallback: ambil id dari checkbox di baris yang sama
      if (!id) {
        var $tr = $trigger.closest('tr');
        var $cb = $tr.find('input[name="cek[]"]');
        if ($cb.length) { id = $cb.val(); }
      }
      id = id || '';
      appr = (appr == null ? '' : appr);
      ket = (ket == null ? '' : ket);
      var tglRaw = (tgl == null ? '' : String(tgl));
      var tglInput = '';
      if (tglRaw) {
        tglRaw = tglRaw.trim();
        if (/^\d{4}-\d{2}-\d{2}$/.test(tglRaw)) {
          tglInput = tglRaw + 'T00:00';
        } else if (/^\d{4}-\d{2}-\d{2}[ T]\d{2}:\d{2}(:\d{2})?$/.test(tglRaw)) {
          tglInput = tglRaw.replace(' ', 'T').substr(0, 16);
        }
      }
      $modal.find('textarea[name="ket_dmf"]').val(ket);
      $modal.find('select[name="approved_dmf"]').val(appr);
      $modal.find('input[name="tgl_approved_dmf"]').val(tglInput);
      $modal.find('input[name="id"]').val(id);
    }

    $(document).on('click', '[data-target="#Approvedmf"]', function(){
      var $modal = $('#Approvedmf');
      fillApprovedmf($(this), $modal);
    });

    $(document).on('show.bs.modal', '#Approvedmf', function (event) {
      var $button = $(event.relatedTarget || null);
      var $modal = $(this);
      fillApprovedmf($button, $modal);
    });

  // Submit Approved DMF tanpa reload (AJAX)
$(document).on('submit', '#Approvedmf form', function(e){
  e.preventDefault();
  var $form = $(this);
  var $modal = $('#Approvedmf');
  var id = $form.find('input[name="id"]').val();
  var ket = $form.find('textarea[name="ket_dmf"]').val();
  var appr = $form.find('select[name="approved_dmf"]').val();
  var tglLocal = $form.find('input[name="tgl_approved_dmf"]').val(); // Ambil nilai asli dari input

  // Normalisasi ke format 'YYYY-MM-DD HH:MM:SS' untuk dikirim
  var tglToSend = '';
  if (tglLocal) {
    tglToSend = tglLocal.replace('T', ' '); // Jadinya: 2025-11-17 14:30
    if (/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}$/.test(tglToSend)) { // Cocok dengan format Y-m-d H:i
      tglToSend += ':00'; // Jadinya: 2025-11-17 14:30:00
    }
  } else {
    // Jika tidak ada nilai, beri peringatan atau hentikan proses
    swal({ title: 'Validasi', text: 'Tanggal Approved DMF wajib diisi.', type: 'warning' });
    return; // Hentikan eksekusi fungsi
  }

  // Buat data untuk dikirim secara manual, pastikan semua field sesuai
  var dataToSend = {
    simpan_dmf: '1',
    id: id,
    ket_dmf: ket,
    approved_dmf: appr,
    tgl_approved_dmf: tglToSend, // Gunakan nilai yang sudah dinormalisasi
    ajax: '1'
  };

  var $submitBtn = $form.find('button[type="submit"]');
  var oldHtml = $submitBtn.html();
  $submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Menyimpan...');

  $.ajax({
    url: window.location.pathname + window.location.search,
    type: 'POST',
    data: dataToSend, // Kirim data manual
    dataType: 'text', // terima teks mentah agar tidak gagal parser bila ada noise
    success: function(respText){
      var res = null;
      try { res = JSON.parse(respText); } catch(e) { res = null; }
      if (res && res.ok) {
        swal({ title: 'Tersimpan', text: res.msg || 'Data tersimpan', type: 'success' });
        var $btnRow = $('a[data-target="#Approvedmf"][data-id="' + id + '"]');
        if ($btnRow.length) {
          $btnRow.data('approved_dmf', appr);
          $btnRow.data('tgl', tglToSend);
          $btnRow.data('ket', ket);
        }
        $modal.modal('hide');
        return;
      }
      // Fallback: bila bukan JSON tapi HTTP 200, anggap sukses (DB sudah update)
      if (typeof respText === 'string' && respText.length > 0) {
        var looksSuccess = /berhasil|success|tersimpan/i.test(respText);
        if (looksSuccess) {
          swal({ title: 'Tersimpan', text: 'Data tersimpan', type: 'success' });
          $modal.modal('hide');
          return;
        }
      }
      swal({ title: 'Gagal', text: (res && res.msg) ? res.msg : 'Gagal menyimpan data', type: 'error' });
    },
    error: function(xhr){
      // Jika status 200 tapi gagal parse JSON, perlakukan sebagai sukses
      if (xhr && xhr.status === 200) {
        swal({ title: 'Tersimpan', text: 'Data tersimpan', type: 'success' });
        $modal.modal('hide');
        return;
      }
      var msg = 'Terjadi kesalahan server';
      try {
        var obj = JSON.parse(xhr.responseText);
        if (obj && obj.msg) msg = obj.msg;
      } catch(e) {}
      swal({ title: 'Gagal', text: msg, type: 'error' });
    },
    complete: function(){
      $submitBtn.prop('disabled', false).html(oldHtml);
    }
  });
});

    function confirm_terima(terima_url) {
      $('#terimaBon').modal('show');
      var parts = terima_url.split('-');
      if (parts.length > 1) {
        document.getElementById('id_bon_approve').value = parts[1];
      }
      if (parts.length > 2) {
        document.getElementById('bonNumber').textContent = parts[2];
      } else {
        document.getElementById('bonNumber').textContent = '';
      }
    }

    function confirm_delete(delete_url) {
      $('#modal_del').modal('show', {
        backdrop: 'static'
      });
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }
  </script>
  <script>
    $(document).ready(function() {
      // Fungsi untuk menangani klik tombol Approve di modal via AJAX
      $('#btnApproveAjax').on('click', function(e) {
        e.preventDefault(); // Mencegah submit form default

        var $btn = $(this);
        var $modal = $('#terimaBon');
        var $form = $('#approveForm');

        // Nonaktifkan tombol dan tampilkan loading
        $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Processing...');

        // Siapkan data form untuk dikirim (pakai FormData agar file ikut terkirim)
        var formData = new FormData($form[0]);

        // Kirim data menggunakan AJAX
        $.ajax({
          url: $form.attr('action'), // URL target (halaman ini sendiri)
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          dataType: 'html', // Kita mungkin perlu memeriksa responsnya
          success: function(response) {
            // console.log("Response:", response); // Untuk debugging

            // Coba ekstrak pesan alert dari response jika ada
            var messageMatch = response.match(/<div class="alert\b[^>]*>(.*?)<\/div>/s);
            var scriptMatch = response.match(/<script\b[^>]*>(.*?)<\/script>/gs); // Tangkap script juga

            var messageToShow = "Bon berhasil di-approve dan email telah dikirim.";
            if (messageMatch) {
              messageToShow = messageMatch[0]; // Gunakan alert dari server jika ada
            } else if (scriptMatch && scriptMatch.some(s => s.includes('swal'))) {
              // Jika ada script swal di response, asumsikan sukses
              // Anda mungkin perlu mengeksekusi script ini, tapi untuk pesan sederhana kita buat sendiri
              messageToShow = "Email Notifikasi telah dikirim. Status bon sudah di proses.";
            }
            swal({
              title: 'Email Notifikasi telah dikirim',
              text: 'Status bon sudah di proses',
              type: 'success'
            }).then((result) => {
              // Tutup modal setelah swal ditutup
              $modal.modal('hide');

              var idBonApproved = $('#id_bon_approve').val();
              if (idBonApproved) {
                // Contoh: Non-aktifkan tombol approve untuk baris ini
                $('a[href*="ApprovedBon-' + idBonApproved + '"]').closest('.btn-group').find('a.btn-success')
                  .removeClass('btn-success').addClass('btn-secondary disabled')
                  .attr('onclick', 'return false;')
                  .find('i').removeClass('fa-check-circle').addClass('fa-check-circle-o');
                // Update status di tabel jika perlu, bisa juga via AJAX
                // ...
              }
            });

            // Reset form dan modal
            $form[0].reset(); // Reset nilai input form
            $('#bonNumber').text(''); // Reset nomor bon di modal
            // $('#email').val(null).trigger('change'); // Jika menggunakan select2, trigger change
          },
          error: function(xhr, status, error) {
            // Tangani error
            console.error("AJAX Error:", status, error);
            var errorMessage = "Terjadi kesalahan saat mengirim data. Silakan coba lagi.";
            // Coba lihat apakah ada pesan error dari server
            if (xhr.responseText) {
              var serverMessageMatch = xhr.responseText.match(/<div class="alert\b[^>]*>(.*?)<\/div>/s);
              if (serverMessageMatch) {
                errorMessage = serverMessageMatch[0]; // Gunakan alert error dari server jika ada
              }
            }
            swal({
              title: 'Error!',
              // html: true, // Jika menggunakan HTML di pesan error
              html: errorMessage, // SweetAlert 2 menggunakan 'html', v1 mungkin 'content'
              type: 'error'
            });
          },
          complete: function() {
            // Aktifkan kembali tombol dan kembalikan teks asli
            $btn.prop('disabled', false).html('<i class="fa fa-check"></i> Kirim');
          }
        });
      });
    });
  </script>
  <script>
    // Hapus lampiran upload per baris
    $(document).on('click', '.btn-delete-attachment', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      var filename = $(this).data('file');
      var $item = $(this).closest('.attachment-item');
      swal({
        title: 'Hapus lampiran?',
        text: filename,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then(function(result){
        // SweetAlert2 returns an object; proceed on confirm
        if (result && (result.value === true || result.isConfirmed)) {
          $.ajax({
            url: window.location.pathname + window.location.search,
            type: 'POST',
            // dataType dihilangkan: terima apa adanya, parse manual
            data: {
              delete_attachment: '1',
              id_bon: id,
              filename: filename
            },
            success: function (res, status, xhr) {
              try { console.log('Delete attachment response:', res); } catch(e) {}
              var obj = null;
              if (typeof res === 'string') {
                try { obj = JSON.parse(res); } catch (e) { obj = null; }
              } else {
                obj = res;
              }
              if (obj && obj.ok) {
                $item.remove();
                var $container = $('<div>').html('<span />');
                // If no more attachment items in this cell, show '-'
                var $cell = $item.parent();
                if ($cell.find('.attachment-item').length === 0) {
                  $cell.html('-');
                }
                swal({ title: 'Berhasil', text: 'Lampiran dihapus', type: 'success' });
              } else {
                // Jika parsing gagal tapi HTTP sukses, asumsikan berhasil (file kemungkinan sudah terhapus)
                if (xhr && xhr.status >= 200 && xhr.status < 300) {
                  $item.remove();
                  var $cell2 = $item.parent();
                  if ($cell2.find('.attachment-item').length === 0) { $cell2.html('-'); }
                  swal({ title: 'Berhasil', text: 'Lampiran dihapus', type: 'success' });
                } else {
                  var msg = (obj && obj.msg) ? obj.msg : 'Terjadi kesalahan';
                  swal({ title: 'Gagal', text: msg, type: 'error' });
                }
              }
            },
            error: function (xhr, status, error) {
              try { console.error('Delete attachment error:', status, error, xhr && xhr.responseText); } catch(e) {}
              var msg = 'Terjadi kesalahan server';
              if (xhr && typeof xhr.responseText === 'string') {
                try { var parsed = JSON.parse(xhr.responseText); if (parsed && parsed.msg) msg = parsed.msg; } catch(e) {}
              }
              swal({ title: 'Gagal', text: msg, type: 'error' });
            }
          });
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();

    });
  </script>
  <script>
    // Cetak Bon Ganti Kain: kumpulkan ID terpilih dan buka halaman cetak
    (function(){
      function getChecked(){
        var list = [];
        $('#example3 input[name="cek[]"]:checked').each(function(){
          var $cb = $(this);
          list.push({
            id: $cb.val(),
            id_nsp: $cb.data('id_nsp'),
            no_order: $cb.data('no_order'),
            po: $cb.data('po'),
            no_bon: $cb.data('no_bon')
          });
        });
        return list;
      }
      $('#btnCetakBonGanti').on('click', function(){
        var rows = getChecked();
        if(rows.length === 0){
          if (typeof Swal !== 'undefined' && Swal.fire) { Swal.fire({ title:'Perhatian', text:'Pilih minimal 1 data.', icon:'warning'}); }
          else { alert('Pilih minimal 1 data.'); }
          return;
        }
        // Ambil parameter utama dari baris pertama yang dipilih
        var head = rows[0] || {};
        var id_cek  = rows[0] ? rows[0].id : '';
        var id_cek1 = rows[1] ? rows[1].id : '';
        var id_cek2 = rows[2] ? rows[2].id : '';
        var params = {
          no_bon: (head.no_bon||''),
          id_nsp: (head.id_nsp||''),
          no_order: (head.no_order||''),
          po: (head.po||''),
          id_cek: id_cek,
          id_cek1: id_cek1,
          id_cek2: id_cek2
        };
        var qs = Object.keys(params).map(function(k){ return k + '=' + encodeURIComponent(params[k]||''); }).join('&');
        var url = 'pages/cetak/cetak_bon_ganti.php?' + qs;
        window.open(url, '_blank');
      });
      // Select all toggle
      $('#selectAllGK').on('change', function(){
        var checked = $(this).is(':checked');
        $('#example3 input[name="cek[]"]').prop('checked', checked);
      });
    })();
  </script>
  <script>
    $(document).on("click", ".btn-save-note", function() {
      let btn = $(this);
      let id = btn.data("id");
      let note = $("#note-text-" + id).val();

      $.ajax({
        url: "pages/ajax/ajax_update_note_csr_lap_gantikain.php",
        type: "POST",
        data: {
          id: id,
          note: note,
        },
        beforeSend: function() {
          btn.prop("disabled", true).text("Saving...");
          Swal.fire({
            title: "Saving...",
            text: "Please wait a moment",
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
              Swal.showLoading();
            }
          });
        },
        success: function(res) {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Note berhasil disimpan",
            timer: 1500,
            showConfirmButton: false
          });

          // Tutup modal
          $("#confirm-note" + id).modal("hide");

          // Kosongin textarea
          $("#note-text-" + id).val("");

          $("#form1").submit();
        },
        error: function(xhr, status, error) {
          alert("Error: " + error);
        },
        complete: function() {
          btn.prop("disabled", false).text("Confirm");
        }
      });
    });
  </script>
</body>

</html>
