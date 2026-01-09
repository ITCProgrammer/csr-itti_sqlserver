<script>
function aktif(){
		if(document.forms['form1']['sjreturplg'].value == ""){
		document.form1.datepicker.setAttribute("disabled",true);
		document.form1.datepicker.removeAttribute("required");	
		}
		else{
		document.form1.datepicker.removeAttribute("disabled");
		document.form1.datepicker.setAttribute("required",true);
		}
	}
function aktif1(){
		if(document.forms['form1']['sj_itti'].value == ""){
		document.form1.datepicker2.setAttribute("disabled",true);
		document.form1.datepicker2.removeAttribute("required");	
		}
		else{
		document.form1.datepicker2.removeAttribute("disabled");
		document.form1.datepicker2.setAttribute("required",true);
		}
	}
</script>
<?php
include "koneksi.php";
ini_set("error_reporting", 1);
// Email support (reuse PHPMailer like input-bon-kain-new.php)
include_once("classes/class.phpmailer.php");
if (!function_exists('sendEmailApproved')) {
    function sendEmailApproved($to, $subject, $bodyHtml, $fromEmail = 'dept.it@indotaichen.com', $fromName = 'DEPT IT', $cc = [], $bcc = [], $attachments = []) {
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
    function getLastMailerError() {
        global $GLOBAL_LAST_MAILER_ERROR;
        return $GLOBAL_LAST_MAILER_ERROR;
    }
}
	$qryCek=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE `id`='$_GET[id]'");
	$rCek=mysqli_fetch_array($qryCek);
	 ?>
<?php
date_default_timezone_set("Asia/Jakarta");
//Baca Tanggal Hari ini
$bln = date("Y-m");
$today = date("Y-m-d");
//Cari noretur terakhir pada hari ini
$sql = "SELECT max(no_retur) FROM tbl_detail_retur_now WHERE tgl_buat LIKE '$bln%'";
$query = mysqli_query($con,$sql) or die (mysqli_error($con));

$rno = mysqli_fetch_array($query);

if($rno){
  $nilai = substr($rno[0], 8);
  $kode = (int) $nilai;

  //tambahkan sebanyak + 1
  //$tahun = substr(date("y/"),2,2);
  $tgl = date("y/m/"); 
  $kode = $kode + 1;
  $auto_kode = "RT".$tgl.str_pad($kode, 3, "0",  STR_PAD_LEFT);
} else {
  $auto_kode = "RT20/01/000";
}
$qryb=mysqli_query($con,"SELECT no_retur FROM tbl_detail_retur_now WHERE id_nsp='$_GET[id]' AND tgl_buat LIKE '$today%' LIMIT 1");
$cekb=mysqli_num_rows($qryb);
$rb=mysqli_fetch_array($qryb);
$id_bon = isset($rCek['id']) ? $rCek['id'] : '';
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
// Kumpulkan ID terpilih dari POST; dukung dua cara: cek[] (Pilih Cetak) dan selected_ids (Kirim Email)
$idsSelected = [];
if (isset($_POST['cek']) && is_array($_POST['cek'])) {
    foreach ($_POST['cek'] as $v) { if (ctype_digit((string)$v)) { $idsSelected[] = $v; } }
} elseif (!empty($_POST['selected_ids'])) {
    $tmp = array_filter(array_map('trim', explode(',', $_POST['selected_ids'])));
    foreach ($tmp as $v) { if (ctype_digit((string)$v)) { $idsSelected[] = $v; } }
}
$id_cek0 = isset($idsSelected[0]) ? $idsSelected[0] : '';
$id_cek1 = isset($idsSelected[1]) ? $idsSelected[1] : '';
$id_cek2 = isset($idsSelected[2]) ? $idsSelected[2] : '';
// Susun link sesuai format yang diinginkan
	$qryCek=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE `id`='$_GET[id]'");
	$rCek=mysqli_fetch_array($qryCek);
$linkInputStok = $baseUrl . "/csr-itti/pages/input_approved_gkj_retur.php?no_order=" . urlencode($rCek['no_order'])
    . "&po=" . urlencode($rCek['po'])
    . "&id_nsp=" . urlencode($rCek['id'])
    . "&id_cek=" . urlencode($id_cek0)
    . "&id_cek1=" . urlencode($id_cek1)
    . "&id_cek2=" . urlencode($id_cek2);
// Handle Kirim Email / Arsip Notifikasi untuk data terpilih (multi-select)
if (isset($_POST['kirim_retur']) && $_POST['kirim_retur'] === '1') {
    // Dukungan kirim ke banyak email: gunakan email_retur_multi[] jika ada, jika tidak pakai single email
    $emailTargets = [];
    if (!empty($_POST['email_retur_multi']) && is_array($_POST['email_retur_multi'])) {
        foreach ($_POST['email_retur_multi'] as $em) {
            $em = trim($em);
            if ($em !== '' && filter_var($em, FILTER_VALIDATE_EMAIL)) {
                $emailTargets[] = $em;
            }
        }
    } else {
        $single = isset($_POST['email']) ? trim($_POST['email']) : '';
        if ($single !== '' && filter_var($single, FILTER_VALIDATE_EMAIL)) {
            $emailTargets[] = $single;
        }
    }

    $idsStr = isset($_POST['selected_ids']) ? trim($_POST['selected_ids']) : '';
    $modeKirim = isset($_POST['kirim_mode']) ? trim($_POST['kirim_mode']) : ''; // '' | 'notif' | 'arsip'
    if ($idsStr === '' || empty($emailTargets)) {
        echo "<script>alert('Pilih minimal 1 data dan email penerima.');</script>";
    } else {
        // Sanitasi daftar ID
        $idsArrRaw = array_filter(array_map('trim', explode(',', $idsStr)));
        $idsArr = [];
        foreach ($idsArrRaw as $idv) { if (ctype_digit($idv)) { $idsArr[] = $idv; } }
        if (count($idsArr) === 0) {
            echo "<script>alert('Daftar data tidak valid.');</script>";
        } else {
            $idsSql = implode(',', array_map('intval', $idsArr));
            // Update tgl_buat_retur (DATE) untuk data terpilih pada NSP ini dengan NOW()
            $idNspUpdate = isset($_GET['id']) ? intval($_GET['id']) : 0;
            if ($idsSql !== '') {
                $sqlUpdateTglBuat = "UPDATE tbl_detail_retur_now SET tgl_buat_retur = NOW() " .
                    "WHERE id IN ($idsSql)" . ($idNspUpdate>0 ? " AND id_nsp=".$idNspUpdate : "");
                @mysqli_query($con, $sqlUpdateTglBuat);
            }
            // Ambil header/aftersales info
            $pelanggan = '';
            $buyer = '';
            if (!empty($rCek['langganan'])) {
                $pos = strpos($rCek['langganan'], '/');
                if ($pos !== false) { $pelanggan = substr($rCek['langganan'], 0, $pos); $buyer = substr($rCek['langganan'], $pos + 1); }
                else { $pelanggan = $rCek['langganan']; }
            }
            $noOrder = isset($rCek['no_order']) ? $rCek['no_order'] : '';
            $noPo = isset($rCek['po']) ? $rCek['po'] : '';
            $jenisKain = isset($rCek['jenis_kain']) ? $rCek['jenis_kain'] : '';
            $lebar = isset($rCek['lebar']) ? $rCek['lebar'] : '';
            $gramasi = isset($rCek['gramasi']) ? $rCek['gramasi'] : '';
            $warna = isset($rCek['warna']) ? $rCek['warna'] : '';
            // $qtyO = isset($rCek['qty_order']) ? $rCek['qty_order'] : '';
            // $qtyK = isset($rCek['qty_kirim']) ? $rCek['qty_kirim'] : '';
            // $qtyE = isset($rCek['qty_foc']) ? $rCek['qty_foc'] : '';

            // Ambil baris retur terpilih, dibatasi pada NSP dan PO/Order yang sama
            $qRows = mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id IN ($idsSql) AND id_nsp='".$_GET['id']."'");
            $rows = [];
            while ($rw = mysqli_fetch_assoc($qRows)) { $rows[] = $rw; }

            if (count($rows) === 0) {
                echo "<script>alert('Data terpilih tidak ditemukan.');</script>";
            } else {
                // Ambil no_retur (diasumsikan sama untuk semua baris yang dipilih)
                $noRetur = isset($rows[0]['no_retur']) ? $rows[0]['no_retur'] : '';
                $subject = "Notifikasi Retur Kain - Order ".$noOrder." / No Bon ".$noRetur;

                // Proses optional upload dokumen dan siapkan link unduhan
                $uploadedFileUrl = '';
                if (!empty($_FILES['dokumen_retur']) && isset($_FILES['dokumen_retur']['name']) && $_FILES['dokumen_retur']['error'] !== UPLOAD_ERR_NO_FILE) {
                    $err = $_FILES['dokumen_retur']['error'];
                    if ($err === UPLOAD_ERR_OK) {
                        $allowedExt = ['pdf','xls','xlsx','doc','docx','jpg','jpeg','png','zip'];
                        $origName = $_FILES['dokumen_retur']['name'];
                        $tmpPath  = $_FILES['dokumen_retur']['tmp_name'];
                        $size     = (int)$_FILES['dokumen_retur']['size'];
                        $ext      = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
                        if (!in_array($ext, $allowedExt, true)) {
                            echo "<script>alert('Tipe file tidak diizinkan. Hanya: PDF, Office, JPG/PNG.');</script>";
                        } elseif ($size > 15 * 1024 * 1024) { // 15 MB limit
                            echo "<script>alert('Ukuran file melebihi 15MB.');</script>";
                        } else {
                            $safeBase = preg_replace('/[^A-Za-z0-9_.-]/', '_', pathinfo($origName, PATHINFO_FILENAME));
                            // Prefix filename dengan NSP id agar mudah dipetakan di halaman approval
                            $nspIdPrefix = isset($rCek['id']) ? intval($rCek['id']) : (isset($_GET['id']) ? intval($_GET['id']) : 0);
                            $prefix = $nspIdPrefix > 0 ? ('NSP' . $nspIdPrefix . '_') : '';
                            $newName  = $prefix . date('Ymd_His') . '_' . $safeBase . '.' . $ext;
                            $projectRoot = dirname(__DIR__);
                            $uploadDir   = $projectRoot . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'retur' . DIRECTORY_SEPARATOR;
                            if (!is_dir($uploadDir)) {
                                @mkdir($uploadDir, 0777, true);
                            }
                            $destPath = $uploadDir . $newName;
                            if (@move_uploaded_file($tmpPath, $destPath)) {
                                $uploadedFileUrl = $baseUrl . "/csr-itti/uploads/retur/" . rawurlencode($newName);
                            } else {
                                echo "<script>alert('Gagal menyimpan file upload.');</script>";
                            }
                        }
                    } else {
                        echo "<script>alert('Upload gagal (error kode: ".$err.").');</script>";
                    }
                }

                // Header gaya mirip input-bon-kain-new.php
                // Siapkan link cetak bon retur (untuk mode arsip)
                $linkCetakBon = $baseUrl . "/csr-itti/pages/cetak/cetak_suratretur.php?"
                    . "no_order=" . urlencode($noOrder)
                    . "&po=" . urlencode($noPo)
                    . "&id_nsp=" . urlencode($_GET['id'])
                    . "&id_cek=" . urlencode($idsArr[0])
                    . (isset($idsArr[1]) ? "&id_cek1=" . urlencode($idsArr[1]) : '')
                    . (isset($idsArr[2]) ? "&id_cek2=" . urlencode($idsArr[2]) : '');

                // Tentukan link utama di email: approval (notif) atau cetak (arsip)
                if ($modeKirim === 'arsip') {
                    $linkUtamaHtml = "<a href='".$linkCetakBon."' target='_blank' style='color: #337ab7; text-decoration: underline;'>Cetak Bon Retur</a>";
                } else {
                    $linkUtamaHtml = "<a href='".$linkInputStok."' target='_blank' style='color: #337ab7; text-decoration: underline;'>Input Approval</a>";
                }

                $bodyHtml = "<div style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#333;'>".
                    "<div style='padding:10px;border:1px solid #e5e5e5;background:#f7f7f7;margin-bottom:10px;'>".
                    "<div><b>Pelanggan:</b> ".htmlspecialchars($pelanggan)." &nbsp;&nbsp; <b>Buyer:</b> ".htmlspecialchars($buyer)."</div>".
                    "<div><b>No Order:</b> ".htmlspecialchars($noOrder)." &nbsp;&nbsp; <b>PO:</b> ".htmlspecialchars($noPo)."</div>".
                    "<div><b>Item/Kain:</b> ".htmlspecialchars($jenisKain)." &nbsp;&nbsp; <b>Lebar/Gramasi:</b> ".htmlspecialchars($lebar)." / ".htmlspecialchars($gramasi)."</div>".
                    "<div><b>Warna:</b> ".htmlspecialchars($warna)."</div>".
                    $linkUtamaHtml.
                    ($uploadedFileUrl !== '' ? "<div style='margin-top:6px;'><b>Dokumen Retur:</b> <a href='".$uploadedFileUrl."' target='_blank'>Download</a></div>" : "") .
                    "</div>";

                // Tabel QTY ringkas (mengikuti template bon)
                // $bodyHtml .= "<div style='margin:8px 0;font-weight:bold;'>Qty Ringkasan</div>".
                //     "<table cellpadding='6' cellspacing='0' style='border-collapse:collapse;font-size:13px;color:#333;border:1px solid #e5e5e5;'>".
                //     "<tr style='background:#f7f7f7;'><td style='border:1px solid #e5e5e5;'>Order</td><td style='border:1px solid #e5e5e5;'>Kirim</td></tr>".
                //     "<tr><td style='border:1px solid #e5e5e5;text-align:right;'>".htmlspecialchars($qtyO)."</td>".
                //     "<td style='border:1px solid #e5e5e5;text-align:right;'>".htmlspecialchars($qtyK)."</td>".
                //     "</tr></table>";

                // Tabel detail retur terpilih
                $bodyHtml .= "<div style='margin:12px 0 6px;font-weight:bold;'>Detail Barang Retur Dipilih</div>".
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
                    $bodyHtml .= "<tr>".
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
                $bodyHtml .= "</table>";

                $bodyHtml .= "<div style='margin-top:12px;color:#555;'>Email ini otomatis dikirim dari sistem CSR.</div>".
                    "</div>"; // wrap

                $send = sendEmailApproved($emailTargets, $subject, $bodyHtml);
                if (!$send) {
                    echo "<script>alert('Gagal mengirim notifikasi email: ".addslashes(getLastMailerError())."');</script>";
                } else {
                    // Jika mode kirim arsip dan email sukses, update tgl_notifikasi_retur
                    if ($modeKirim === 'arsip' && !empty($idsSql)) {
                        $idNspUpdate = isset($_GET['id']) ? intval($_GET['id']) : 0;
                        $sqlNotif = "UPDATE tbl_detail_retur_now SET tgl_notifikasi_retur = NOW() "
                                  . "WHERE id IN ($idsSql)" . ($idNspUpdate > 0 ? " AND id_nsp=".$idNspUpdate : "");
                        @mysqli_query($con, $sqlNotif);
                    }
                    echo "<script>swal({title:'Notifikasi terkirim', text:'Email telah dikirim ke ".addslashes(implode(', ', $emailTargets))."', type:'success'}).then(()=>{ window.location.href='index1.php?p=input-retur-kain-detailrev&id=".$_GET['id']."'; });</script>";
                }
            }
        }
    }
}
	if($_POST['save']=="save"){	
		if($cekb>0){
			$kdbon=$rb['no_retur'];
		}else{
		$kdbon=$auto_kode;}
		$order=$rCek['no_order'];
		$po=$rCek['po'];
		$langganan=$rCek['langganan'];
		$no_hanger=$rCek['no_hanger'];
		$no_item=$rCek['no_item'];
		$t_jawab=$rCek['t_jawab'];
		$t_jawab1=$rCek['t_jawab1'];
		$t_jawab2=$rCek['t_jawab2'];
		$qty_order=$rCek['qty_order'];
		$qty_kirim=$rCek['qty_kirim'];
		$qty_claim=$rCek['qty_claim'];
		$qty_foc=$rCek['qty_foc'];
		//$langganan=$rCek[langganan];
		$pos=strpos($rCek['langganan'], "/");
		$posbuyer=substr($rCek['langganan'],$pos+1,50);
		$buyer=str_replace("'","''",$posbuyer);
		$pmas= strpos($_POST['warna'], ':');
		$pwar= strpos($_POST['warna'], ';');
		$posmas=substr($_POST['warna'],$pmas+1,100);
		$jenis_kain=str_replace("'","''",$posmas);
		$potW=substr($_POST['warna'],0,$pwar);
		$potKK=substr($_POST['warna'],$pwar+1,15);
		$kk=str_replace("'","''",$potKK);
		$warna=str_replace("'","''",$potW);
		$masalah=str_replace("'","''",$_POST['masalah']);
		$lot=str_replace("'","''",$_POST['lot']);
		$kg=str_replace("'","''",$_POST['kg']);
		$pjg=str_replace("'","''",$_POST['pjg']);
		$satuan=str_replace("'","''",$_POST['satuan']);
		$roll=str_replace("'","''",$_POST['roll']);
		$ket=str_replace("'","''",$_POST['ket']);
		$sjreturplg=str_replace("'","''",$_POST['sjreturplg']);
		$tgl_sjretur=$_POST['tgl_sjretur'];
		$tgltrm_sjretur=$_POST['tgltrm_sjretur'];
		$sj_itti=str_replace("'","''",$_POST['sj_itti']);
		$tgl_sjitti=$_POST['tgl_sjitti'];
		$qty_tu=str_replace("'","''",$_POST['qty_tu']);
		$t_jawab=$_POST['t_jawab'];
		//$valjawab= array_values($t_jawab);
		$qry1=mysqli_query($con,"INSERT INTO tbl_detail_retur_now SET
		`id_nsp`='$_GET[id]',
		`no_retur`='$kdbon',
		`po`='$po',
		`no_order`='$order',
		`langganan`='$langganan',
		`no_hanger`='$no_hanger',
		`no_item`='$no_item',
		`buyer`='$buyer',
		`masalah`='$masalah',
		`jenis_kain`='$jenis_kain',
		`warna`='$warna',
		`lot`='$lot',
		`kg`='$kg',
		`pjg`='$pjg',
		`satuan`='$satuan',
		`roll`='$roll',
		`nodemand`='$kk',
		`nodemand_ncp`='$_POST[nodemand_ncp]',
		`t_jawab`='$_POST[t_jawab]',
		`t_jawab1`='$_POST[t_jawab1]',
		`t_jawab2`='$_POST[t_jawab2]',
		`qty_order`='$_POST[qty_order]',
		`qty_kirim`='$_POST[qty_kirim]',
		`qty_claim`='$_POST[qty_claim]',
		`qty_foc`='$_POST[qty_foc]',
		`masalah_dominan`='$_POST[masalah_dominan]',
		`nodemand_akj`='$_POST[nodemand_akj]',
		`tgl_buat`=now(),
		`tgl_update`=now()
		");	
		if($qry1){	
	echo "<script>swal({
  title: 'Data Telah diSimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {

      window.location.href='TambahDetailRetur-$_GET[id]';
	 
  }
});</script>";
		}
	}
//window.open('pages/cetak/cetak_retur.php?no_retur=$retur','_blank');//Above Line TambahRetur
?>	

<div class="box box-info">
 	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
		<div class="box-header with-border">
			<h3 class="box-title">Formulir Retur</h3> <br>
			<div class="box-tools pull-right">
      			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
  		</div>
  		<div class="box-body">
	  		<div class="form-group">
                <label for="warna" class="col-sm-2 control-label">Warna / Jenis Kain </label>
                  	<div class="col-sm-3">
                    	<select class="form-control select2" name="warna" required>
							<option value="">Pilih</option>
							<?php $sqlw1=mysqli_query($con,"SELECT warna,nodemand,jenis_kain FROM tbl_aftersales_now WHERE po='$rCek[po]' and no_order='$rCek[no_order]' ORDER BY warna");
							while ($rwarna=mysqli_fetch_array($sqlw1)){ ?>
							<option value="<?php echo $rwarna['warna'].";".$rwarna['nodemand'].":".$rwarna['jenis_kain'];?>"><?php echo $rwarna['warna']." ; ".$rwarna['jenis_kain'];?></option>
							<?php } ?>
						</select>
                  	</div>
            </div>
			<div class="form-group">
                <label for="nodemand_ncp" class="col-sm-2 control-label">No Demand NCP</label>
                  	<div class="col-sm-2">
                    	<select class="form-control select2" name="nodemand_ncp" required>
							<option value="">Pilih</option>
							<?php $sqlkkncp=mysqli_query($con,"SELECT nodemand FROM tbl_aftersales_now WHERE po='$rCek[po]' and no_order='$rCek[no_order]' ORDER BY nodemand");
							while ($rkkncp=mysqli_fetch_array($sqlkkncp)){ ?>
							<option value="<?php echo $rkkncp['nodemand'];?>"><?php echo $rkkncp['nodemand'];?></option>
							<?php } ?>
						</select>
                  	</div>
            </div>
			<div class="form-group">
				<label for="nodemand_akj" class="col-sm-2 control-label">No Demand AKJ</label>
					<div class="col-sm-2">
						<input name="nodemand_akj" type="text" class="form-control" id="nodemand_akj" value="" placeholder="No Demand AKJ">
                  	</div>
			</div>
			<div class="form-group">
				<label for="lot" class="col-sm-2 control-label">Lot</label>
					<div class="col-sm-2">
						<input name="lot" type="text" class="form-control" id="lot" value="" placeholder="Lot">
                  	</div>
			</div>
			<div class="form-group">
				<label for="roll" class="col-sm-2 control-label">Quantity</label>
					<div class="col-sm-2">
						<input name="roll" type="text" class="form-control" id="roll" value="" placeholder="Roll">
                  	</div>
					<div class="col-sm-2">
                    	<div class="input-group"> 
							<input name="kg" type="text" class="form-control" id="kg" value="" placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">Kg</span>	
						</div>
                  	</div>
				  	<div class="col-sm-2">
                    	<div class="input-group">  
							<input name="pjg" type="text" class="form-control" id="pjg" value="" placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">
								<select name="satuan" style="font-size: 12px;" id="satuan">
									<option value="Yard" <?php if($rcek['satuan']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
								  	<option value="Meter" <?php if($rcek['satuan']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
								  	<option value="PCS" <?php if($rcek['satuan']=="PCS"){ echo "SELECTED"; }?>>PCS</option>
							  	</select>
							</span>	
						</div>
                  	</div>
			</div>
			<div class="form-group">
		  		<label for="masalah" class="col-sm-2 control-label">Masalah</label>
		  			<div class="col-sm-4">
						<textarea name="masalah" rows="3" class="form-control" id="masalah" placeholder="Masalah"></textarea>
		  			</div>				   
			</div>
			<div class="form-group">
		  		<label for="masalah_dominan" class="col-sm-2 control-label">Sub Defect</label>
		 			<div class="col-sm-3">
						<div class="input-group">
						<select class="form-control select2" name="masalah_dominan" id="masalah_dominan">
							<option value="">Pilih</option>
							<?php 
							$qrym=mysqli_query($con,"SELECT masalah FROM tbl_masalah_aftersales ORDER BY masalah ASC");
							while($rm=mysqli_fetch_array($qrym)){
							?>
							<option value="<?php echo $rm['masalah'];?>" <?php if($rcek['masalah_dominan']==$rm['masalah']){echo "SELECTED";}?>><?php echo $rm['masalah'];?></option>	
							<?php }?>
						</select>
						<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataMasalah"> ...</button></span>
						</div>
		 	 		</div>
		  	</div> 
			<div class="form-group">
					<label for="t_jawab" class="col-sm-2 control-label">Dept. Tanggung Jawab 1</label>
					<div class="col-sm-2">
						<select class="form-control select2" name="t_jawab">
							<option value="">Pilih</option>
							<?php 
							$sqlDept = mysqli_query($con, "SELECT * FROM filter_dept");
							while ($rDept = mysqli_fetch_array($sqlDept)) { ?>
								<option value="<?php echo $rDept['nama']; ?>" <?php if($rcek['t_jawab'] == $rDept['nama']) { echo "SELECTED"; } ?>><?php echo $rDept['nama']; ?></option>
							<?php } ?>
						</select>
					</div>
			</div>
			<div class="form-group">
					<label for="t_jawab1" class="col-sm-2 control-label">Dept. Tanggung Jawab 2</label>
					<div class="col-sm-2">
						<select class="form-control select2" name="t_jawab1">
							<option value="">Pilih</option>
							<?php 
							$sqlDept1 = mysqli_query($con, "SELECT * FROM filter_dept");
							while ($rDept1 = mysqli_fetch_array($sqlDept1)) { ?>
								<option value="<?php echo $rDept1['nama']; ?>" <?php if($rcek['t_jawab1'] == $rDept1['nama']) { echo "SELECTED"; } ?>><?php echo $rDept1['nama']; ?></option>
							<?php } ?>
						</select>
					</div>
			</div>
			<div class="form-group">
					<label for="t_jawab2" class="col-sm-2 control-label">Dept. Tanggung Jawab 3</label>
					<div class="col-sm-2">
						<select class="form-control select2" name="t_jawab2">
							<option value="">Pilih</option>
							<?php 
							$sqlDept2 = mysqli_query($con, "SELECT * FROM filter_dept");
							while ($rDept2 = mysqli_fetch_array($sqlDept2)) { ?>
								<option value="<?php echo $rDept2['nama']; ?>" <?php if($rcek['t_jawab2'] == $rDept2['nama']) { echo "SELECTED"; } ?>><?php echo $rDept2['nama']; ?></option>
							<?php } ?>
						</select>
					</div>
			</div>
		</div>
<!-- /.box-footer -->
<div class="box-footer">
	<?php 
	$qrycek1=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now WHERE no_order='$rCek[no_order]' AND po='$rCek[po]' AND id_nsp='$_GET[id]'");
	$cek1=mysqli_num_rows($qrycek1);
	?>
	<button type="submit" class="btn btn-primary pull-right" <?php if($cek1>=10){echo "disabled";} ?> name="save" value="save">Simpan <i class="fa fa-save"></i></button> 
	<!--<input type="submit" value="Simpan" name="save" id="save" class="btn btn-primary pull-right" >
	<button type="submit" class="btn btn-success pull-right" <?php if($cek1<1 OR $cek>5){echo "disabled";} ?> name="selesai" value="selesai">Selesai <i class="fa fa-check-square"></i></button>-->
</div>	
</form>	 
</div>
<div class="row">
  	<div class="col-xs-12">
    	<div class="box">
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
            <div class="box-header with-border">
					<div class="pull-right">
						<input type="submit" value="Pilih Cetak" name="save" id="save" class="btn btn-primary pull-left"/>
						<button type="button" id="btnEmailRetur" class="btn btn-warning" style="margin-left:8px;">Kirim Email</button>
            <button type="button" id="btnArsipRetur" class="btn btn-info" style="margin-left:8px;">Kirim Arsip</button>
						<a href="pages/cetak/cetak_suratretur.php?no_order=<?php echo $rCek['no_order'];?>&po=<?php echo urlencode($rCek['po']);?>&id_nsp=<?php echo $_GET['id'];?>&id_cek=<?php echo $_POST['cek'][0];?>&id_cek1=<?php echo $_POST['cek'][1];?>&id_cek2=<?php echo $_POST['cek'][2];?>" class="btn btn-danger  
						<?php if($_POST['cek'][0]=="") { echo "disabled"; }?>" target="_blank" >Cetak Surat Barang Retur</a>
						
						<!--<a href="pages/cetak/cetak_suratretur_pdf.php?no_order=<?php echo $rCek['no_order'];?>&po=<?php echo $rCek['po'];?>&id_nsp=<?php echo $_GET['id'];?>" class="btn btn-danger" target="_blank">Cetak Surat Barang Retur PDF</a>-->
					</div>
	                </div>    
			<div class="box-body">
				<table id="example3" class="table table-bordered table-hover table-striped nowrap" width="100%">
					<thead class="bg-green">
					<tr>
						<th width="48"><div align="center">No</div></th>
						<th width="60"><div align="center">Tgl Keputusan</div></th>
						<th width="301"><div align="center">Masalah</div></th>
						<th width="343"><div align="center">Jenis Kain</div></th>
						<th width="331"><div align="center">Warna</div></th>
						<th width="331"><div align="center">Lot</div></th>
						<th width="331"><div align="center">SJ Retur Pelanggan</div></th>
						<th width="331"><div align="center">Tgl Terima SJ Retur</div></th>
						<th width="331"><div align="center">SJ ITTI</div></th>
						<th width="331"><div align="center">Qty</div></th>
						<th width="331"><div align="center">Keterangan</div></th>
						<th width="48"><div align="center">Aksi</div></th>
					</tr>
					</thead>
				<tbody>
					<?php 
					$sql=mysqli_query($con," SELECT * FROM tbl_detail_retur_now WHERE id_nsp='$rCek[id]' AND po='$rCek[po]' AND no_order='$rCek[no_order]' ORDER BY tgl_buat ASC");
					while($r=mysqli_fetch_array($sql)){
			
					$no++;
					$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';	  
				
					?>
						<tr bgcolor="<?php echo $bgcolor; ?>">
							<td align="center"><a href="#" class="edit_retur" id="<?php echo $r['id'] ?>"><?php echo $no; ?></a><br><input type="checkbox" name="cek[]" value="<?php echo $r['id']; ?>" 
                                <?php if (isset($_POST['cek']) && in_array($r['id'], $_POST['cek'])): ?>
                                checked="checked"
                                <?php endif; ?>/></td>
							<td align="left" valign="top"><?php echo $r['tgl_keputusan'];?></td>
							<td align="left" valign="top"><?php echo $r['masalah'];?></td>
							<td align="left" valign="top"><?php echo $r['jenis_kain'];?></td>
							<td align="left" valign="top"><?php echo $r['warna'];?></td>
							<td align="left" valign="top"><?php echo $r['lot'];?></td>
							<td align="left"><?php echo $r['sjreturplg']."/".$r['tgl_sjretur']; ?></td>
							<td align="left" valign="top"><?php echo $r['tgltrm_sjretur'];?></td>
							<td align="left"><?php echo $r['sj_itti']."/".$r['tgl_sjitti'];?></td>
							<td align="right"><?php echo $r['roll']." Roll ".$r['kg']." Kg "; ?></td>
							<td align="left" valign="top"><?php echo $r['ket']; ?></td>
							<td align="center"><div><a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataDetailRetur-<?php echo $r['id'] ?>');"><i class="fa fa-trash"></i> </a></div></td>
						</tr>   
					<?php 
						} 
					?>
				</tbody>   
				</table> 
					<div id="EditRetur" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
					</div>
</div>
			</form>
		</div>
	</div>
<!-- Modal: Kirim Email Retur -->
<div class="modal fade" id="kirimEmailRetur" tabindex="-1" role="dialog" aria-labelledby="kirimEmailReturLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top:100px;">
      <form id="kirimEmailForm" method="post" action="" enctype="multipart/form-data">
        <div class="modal-header bg-primary text-white">
          <h4 class="modal-title" id="kirimEmailReturLabel">Kirim Notifikasi Retur</h4>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Pilih Email Penerima:</label>
            <div style="max-height:180px; overflow:auto; padding:6px; border:1px solid #ddd; border-radius:4px;">
              <?php
                $queryEmail = mysqli_query($con, "SELECT * FROM master_email WHERE departemen IN ('PPC', 'GKJ') ORDER BY nama ASC");
              while ($rowEmail = mysqli_fetch_assoc($queryEmail)) {
                  $nm = htmlspecialchars($rowEmail['nama']);
                  $em = htmlspecialchars($rowEmail['email']);
                  echo '<div class="checkbox" style="margin:0;"><label>';
                  echo '<input type="checkbox" name="email_retur_multi[]" value="' . $em . '"> ' . $nm . ' (' . $em . ')';
                  echo '</label></div>';
              }
              ?>
            </div>
            <small class="text-muted">Anda dapat memilih lebih dari satu email.</small>
          </div>
          <div class="form-group">
            <label for="dokumen_retur">Unggah Dokumen (opsional):</label>
            <input type="file" class="form-control" name="dokumen_retur" id="dokumen_retur" accept=".pdf,.xls,.xlsx,.doc,.docx,.jpg,.jpeg,.png,.zip">
            <small class="text-muted">Maks 15MB. Tipe yang diizinkan: PDF, Office, JPG/PNG, ZIP.</small>
          </div>
          <input type="hidden" name="selected_ids" id="selected_ids" value="">
          <input type="hidden" name="kirim_retur" value="1">
          <input type="hidden" name="kirim_mode" id="kirim_mode" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Kirim</button>
        </div>
      </form>
    </div>
  </div>
  </div>
<div class="modal fade" id="modal_del" tabindex="-1" >
  	<div class="modal-dialog modal-sm" >
    	<div class="modal-content" style="margin-top:100px;">
      		<div class="modal-header">
				<button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="text-align:center;">Are you sure to delete all data ?</h4>
      		</div>

      		<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        		<a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        		<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      		</div>
    	</div>
  	</div>
</div>
         <script type="text/javascript">
    function confirm_delete(delete_url)
    {
      $('#modal_del').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
<div class="modal fade" id="DataMasalah">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sub Defect</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="masalah_dominan" class="col-md-3 control-label">Jenis Masalah</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="masalah_dominan" name="masalah_dominan" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_masalah" id="simpan_masalah" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_masalah']=="Simpan"){
	$masalah=strtoupper($_POST['masalah_dominan']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_masalah_aftersales SET 
		  masalah='$masalah'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='KPENew-$nodemand';
	 
  }
});</script>";
		}
}
?>
<script>
// Kumpulkan ID terpilih dan buka modal email
document.addEventListener('DOMContentLoaded', function(){
  function openEmailModal(mode) {
    var ids = [];
    var cbs = document.querySelectorAll('input[name="cek[]"]:checked');
    cbs.forEach(function(cb){ ids.push(cb.value); });
    if(ids.length === 0){
      alert('Silakan pilih minimal 1 data retur.');
      return;
    }
    document.getElementById('selected_ids').value = ids.join(',');
    document.getElementById('kirim_mode').value = mode || '';
    $('#kirimEmailRetur').modal('show', {backdrop:'static'});
  }

  var btn = document.getElementById('btnEmailRetur');
  if(btn){
    btn.addEventListener('click', function(){ openEmailModal('notif'); });
  }
  var btnArsip = document.getElementById('btnArsipRetur');
  if(btnArsip){
    btnArsip.addEventListener('click', function(){ openEmailModal('arsip'); });
  }
});
</script>
