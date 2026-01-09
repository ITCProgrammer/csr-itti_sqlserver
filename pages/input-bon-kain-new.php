<?php
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";
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
    function getLastMailerError() {
        global $GLOBAL_LAST_MAILER_ERROR;
        return $GLOBAL_LAST_MAILER_ERROR;
    }
}
	$qryCek=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE `id`='$_GET[id]'");
	$rCek=mysqli_fetch_array($qryCek);
	$po_esc = isset($rCek['po']) ? mysqli_real_escape_string($con, $rCek['po']) : '';
?>
<?php
function no_urut($x){
include "koneksi.php";
	date_default_timezone_set("Asia/Jakarta");
if($x=="Reject Buyer"){$fk="RB";}else if($x=="Kurang Qty"){$fk="GK";}	
$format = $fk.date("y/m/");
$sql=mysqli_query($con,"SELECT no_bon FROM tbl_ganti_kain_now WHERE substr(no_bon,1,10) like '".$format."%' ORDER BY no_bon DESC LIMIT 1 ") or die (mysqli_error($con));
$d=mysqli_num_rows($sql);
if($d>0){
	$r=mysqli_fetch_array($sql);
	$d=$r['no_bon'];
	$str=substr($d,8,3);
		$Urut = (int)$str;
}else{
		$Urut = 0;
	}
	$Urut = $Urut + 1;
$Nol="";
$nilai=3-strlen($Urut);
for ($i=1;$i<=$nilai;$i++){
	$Nol= $Nol."0";
	}
$nipbr =$format.$Nol.$Urut;
	return $nipbr;
}

date_default_timezone_set("Asia/Jakarta");
//Baca Tanggal Hari ini
$today = date("Y-m-d");
$sql = "SELECT max(kd_ganti) AS kd_ganti FROM tbl_ganti_kain_now WHERE no_order='$rCek[no_order]'";
$query = mysqli_query($con,$sql) or die (mysqli_error($con));

$cno = mysqli_num_rows($query);
if($cno>0){
	$gno = mysqli_fetch_array($query);
  	$text=$gno['kd_ganti'];
  	if(strpos($text, 'GR') !== false){
		$nilai = substr($text,2,2);
  	}else{
		$nilai = substr($text,1,2);
	}
	$kode = (int)$nilai;
}else{
	$kode= 0;
}
//tambahkan sebanyak + 1
  $kode = $kode+1;
  if($_POST['alasan']=="Reject Buyer"){
	$auto_kode = "GR".$kode;
	}else if($_POST['alasan']=="Kurang Qty"){
	$auto_kode = "G".$kode;
	}else {
	$auto_kode = "G1";
}
$alsn= isset($_POST['alasan']) ? $_POST['alasan'] : '';
$W1= isset($_POST['warna1']) ? $_POST['warna1'] : '';
$W2= isset($_POST['warna2']) ? $_POST['warna2'] : '';
$W3= isset($_POST['warna3']) ? $_POST['warna3'] : '';
$posW1=strpos($_POST['warna1'], ',');
$WRN1=substr($_POST['warna1'],0,$posW1);
$WN1=str_replace("'","''",$WRN1);
$posW2=strpos($_POST['warna2'], ',');
$WRN2=substr($_POST['warna2'],0,$posW2);
$WN2=str_replace("'","''",$WRN2);
$posW3=strpos($_POST['warna3'], ',');
$WRN3=substr($_POST['warna3'],0,$posW3);
$WN3=str_replace("'","''",$WRN3);
//$posKK1=substr($_POST[warna1],$posW1+1,15);
//$posKK2=substr($_POST[warna2],$posW2+1,15);
//$posKK3=substr($_POST[warna3],$posW3+1,15);
//$kker1=str_replace("'","''",$posKK1);
//$kker2=str_replace("'","''",$posKK2);
//$kker3=str_replace("'","''",$posKK3);
$yard1= isset($_POST['pjg1']) ? $_POST['pjg1'] : '';
$yard2= isset($_POST['pjg2']) ? $_POST['pjg2'] : '';
$yard3= isset($_POST['pjg3']) ? $_POST['pjg3'] : '';
$qty_email= isset($_POST['qty_email']) ? $_POST['qty_email'] : '';
$pjg_email= isset($_POST['pjg_email']) ? $_POST['pjg_email'] : '';
//$posL1=strpos($_POST[warna1], ',');
$posLot1=substr($_POST['warna1'],$posW1+1,20);
$L1=str_replace("'","''",$posLot1);
//$L1= isset($_POST[lot1]) ? $_POST[lot1] : '';
//$posL2=strpos($_POST[warna2], ',');
$posLot2=substr($_POST['warna2'],$posW2+1,20);
$L2=str_replace("'","''",$posLot2);
//$L2= isset($_POST[lot2]) ? $_POST[lot2] : '';
//$posL3=strpos($_POST[warna3], ',');
$posLot3=substr($_POST['warna3'],$posW3+1,20);
$L3=str_replace("'","''",$posLot3);
$sat1= isset($_POST['satuan1']) ? $_POST['satuan1'] : '';
$sat2= isset($_POST['satuan2']) ? $_POST['satuan2'] : '';
$sat3= isset($_POST['satuan3']) ? $_POST['satuan3'] : '';
$sat_email= isset($_POST['satuan_email']) ? $_POST['satuan_email'] : '';
//$L3= isset($_POST[lot3]) ? $_POST[lot3] : '';

$qryg=mysqli_query($con,"SELECT kd_ganti FROM tbl_ganti_kain_now WHERE no_order='$rCek[no_order]' AND alasan='$_POST[alasan]' AND tgl_buat LIKE '$today%' LIMIT 1");
$cekg=mysqli_num_rows($qryg);
$rg=mysqli_fetch_array($qryg);
$qryb=mysqli_query($con,"SELECT no_bon FROM tbl_ganti_kain_now WHERE id_nsp='$_GET[id]' AND alasan='$_POST[alasan]' AND tgl_buat LIKE '$today%' LIMIT 1");
$cekb=mysqli_num_rows($qryb);
$rb=mysqli_fetch_array($qryb);
$qryd1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE warna='$WN1' and lot='$L1' and no_order='$rCek[no_order]' and no_hanger='$rCek[no_hanger]' AND po='$po_esc' ORDER BY id DESC LIMIT 1");
$rowd1=mysqli_fetch_array($qryd1);
$rowd1_po_esc = isset($rowd1['po']) ? mysqli_real_escape_string($con, $rowd1['po']) : '';
$qryr1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE id='$_GET[id]'");
$r1=mysqli_fetch_array($qryr1);

	if(isset($_POST['save'])){
	/*echo '<pre>';
			print_r($rowd1);
		echo '</pre>';
		exit;
		*/

		$bon=no_urut($_POST['alasan']);
	//if($_POST[analisa]=="Reject Buyer"){$order=$rCek[no_order]." GR1";}else if($_POST[analisa]=="Kurang Qty"){$fk= $rCek[no_order]." G1";}
		$order=$r1['no_order'];
		$noorder1=str_replace("/","&",$r1['no_order']);
		if($cekg>0){
			$kdganti=$rg['kd_ganti'];
		}else{
		$kdganti=$auto_kode;}
		if($cekb>0){
			$kdbon=$rb['no_bon'];
		}else{
		$kdbon=$bon;}
		$pos=strpos($r1['langganan'], "/");
		$posbuyer=substr($r1['langganan'],$pos+1,50);
		$buyer=str_replace("'","''",$posbuyer);
		$analisa=str_replace("'","''",$_POST['analisa']);	
		$pencegahan=str_replace("'","''",$_POST['pencegahan']);	
		$alasan=str_replace("'","''",$_POST['alasan']);
		$pwar1= strpos($_POST['warna1'], ',');
		$pwar2= strpos($_POST['warna2'], ',');
		$pwar3= strpos($_POST['warna3'], ',');
		$potW1=substr($_POST['warna1'],0,$pwar1);
		$potW2=substr($_POST['warna2'],0,$pwar2);
		$potW3=substr($_POST['warna3'],0,$pwar3);
	//$potKK1=substr($_POST[warna1],$pwar1+1,15);
	//$potKK2=substr($_POST[warna2],$pwar2+1,15);
	//$potKK3=substr($_POST[warna3],$pwar3+1,15);
		$demand1=str_replace("'","''",$_POST['nodemand1']);
		$demand2=str_replace("'","''",$_POST['nodemand2']);
		$demand3=str_replace("'","''",$_POST['nodemand3']);
		$warna1=str_replace("'","''",$potW1);
		$warna2=str_replace("'","''",$potW2);		
		$warna3=str_replace("'","''",$potW3);
		$kg1=str_replace("'","''",$_POST['kg1']);
		$kg2=str_replace("'","''",$_POST['kg2']);		
		$kg3=str_replace("'","''",$_POST['kg3']);
		$pjg1=str_replace("'","''",$_POST['pjg1']);
		$pjg2=str_replace("'","''",$_POST['pjg2']);		
		$pjg3=str_replace("'","''",$_POST['pjg3']);
		$satuan1=str_replace("'","''",$_POST['satuan1']);
		$satuan2=str_replace("'","''",$_POST['satuan2']);		
		$satuan3=str_replace("'","''",$_POST['satuan3']);
	//$plot1= strpos($_POST[warna1], ',');
	//$plot2= strpos($_POST[warna2], ',');
	//$plot3= strpos($_POST[warna3], ',');
		$potL1=substr($_POST['warna1'],$pwar1+1,20);
		$potL2=substr($_POST['warna2'],$pwar2+1,20);
		$potL3=substr($_POST['warna3'],$pwar3+1,20);
		$lot1=str_replace("'","''",$potL1);
		$lot2=str_replace("'","''",$potL2);
		$lot3=str_replace("'","''",$potL3);
		$langganan=str_replace("'","''",$r1['langganan']);
		$masalah=str_replace("'","''",$r1['masalah']);
		$no_po=str_replace("'","''",$rowd1['po']);
		$no_item=str_replace("'","''",$rowd1['no_item']);
		$no_hanger=str_replace("'","''",$rowd1['no_hanger']);
		$jenis_kain=str_replace("'","''",$rowd1['jenis_kain']);
		$lebar=str_replace("'","''",$rowd1['lebar']);
		$gramasi=str_replace("'","''",$rowd1['gramasi']);
		$warna=str_replace("'","''",$rowd1['warna']);
		$no_warna=str_replace("'","''",$rowd1['no_warna']);
		$qty_order=str_replace("'","''",$rowd1['qty_order']);
		$qty_kirim=str_replace("'","''",$rowd1['qty_kirim']);
		$qty_foc=str_replace("'","''",$rowd1['qty_foc']);
		$qty_claim=str_replace("'","''",$rowd1['qty_claim']);
		$t_jawab=str_replace("'","''",$rowd1['t_jawab']);
		$t_jawab1=str_replace("'","''",$rowd1['t_jawab1']);
		$t_jawab2=str_replace("'","''",$rowd1['t_jawab2']);
		$persen=str_replace("'","''",$rowd1['persen']);
		$persen1=str_replace("'","''",$rowd1['persen1']);
		$persen2=str_replace("'","''",$rowd1['persen2']);
		$styl=str_replace("'","''",$r1['styl']);
		$satuan_o=str_replace("'","''",$r1['satuan_o']);
		$satuan_k=str_replace("'","''",$r1['satuan_k']);
		$satuan_f=str_replace("'","''",$r1['satuan_f']);
		$satuan_c=str_replace("'","''",$r1['satuan_c']);
		$qty_email=str_replace("'","''",$_POST['qty_email']);
		$pjg_email=str_replace("'","''",$_POST['pjg_email']);		
		$satuan_email=str_replace("'","''",$_POST['satuan_email']);
		$sub_defect=str_replace("'","''",$_POST['sub_defect']);
		$solusi=str_replace("'","''",$_POST['solusi']);
		$qry1=mysqli_query($con,"INSERT INTO tbl_ganti_kain_now SET
		`id_nsp`='$_GET[id]',
		`buyer`='$buyer',
		`kd_ganti`='$kdganti',
		`no_bon`='$kdbon',
		`no_order`='$order',
		`alasan`='$alasan',
		`analisa`='$analisa',
		`pencegahan`='$pencegahan',
		`nodemand1`='$demand1',
		`nodemand2`='$demand2',
		`nodemand3`='$demand3',
		`warna1`='$warna1',
		`warna2`='$warna2',
		`warna3`='$warna3',
		`kg1`='$kg1',
		`kg2`='$kg2',
		`kg3`='$kg3',
		`pjg1`='$pjg1',
		`pjg2`='$pjg2',
		`pjg3`='$pjg3',
		`satuan1`='$satuan1',
		`satuan2`='$satuan2',
		`satuan3`='$satuan3',
		`lot1`='$lot1',
		`lot2`='$lot2',
		`lot3`='$lot3',
		`langganan`='$langganan',
		`masalah`='$masalah',
		`no_po`='$no_po',
		`no_item`='$no_item',
		`no_hanger`='$no_hanger',
		`jenis_kain`='$jenis_kain',
		`lebar`='$lebar',
		`gramasi`='$gramasi',
		`warna`='$warna',
		`no_warna`='$no_warna',
		`qty_order`='$qty_order',
		`qty_foc`='$qty_foc',
		`qty_kirim`='$qty_kirim',
		`qty_claim`='$qty_claim',
		`t_jawab`='$t_jawab',
		`t_jawab1`='$t_jawab1',
		`t_jawab2`='$t_jawab2',
		`persen`='$persen',
		`persen1`='$persen1',
		`persen2`='$persen2',
		`styl`='$styl',
		`satuan_o`='$satuan_o',
		`satuan_k`='$satuan_k',
		`satuan_f`='$satuan_f',
		`satuan_c`='$satuan_c',
		`qty_email`='$qty_email',
		`pjg_email`='$pjg_email',
		`satuan_email`='$satuan_email',
		`sub_defect`='$sub_defect',
		`solusi`='$solusi',
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
				window.location.href='TambahBon-$_GET[id]-$noorder1';
			}
			});</script>";
	}
}

// Handle Approve Bon Ganti Kain
if(isset($_POST['approve_bon']) && $_POST['approve_bon'] == '1') {
  include "koneksi.php";
  $id_bon = mysqli_real_escape_string($con, $_POST['id_bon']);
  // Update status bon menjadi Approved
  $now = date("Y-m-d H:i:s");
  $emailTambahan = isset($_POST['email']) ? mysqli_real_escape_string($con, $_POST['email']) : '';
  $namaTambahan = '';
  if ($emailTambahan != '') {
    $qEmail = mysqli_query($con, "SELECT nama FROM master_email WHERE email='$emailTambahan' LIMIT 1");
    if ($rowEmail = mysqli_fetch_assoc($qEmail)) {
      $namaTambahan = $rowEmail['nama'];
    }
  }
  $qry = mysqli_query($con, "UPDATE tbl_ganti_kain_now SET approved_buat='$now', personil_buat='".$_SESSION['dept']."', personil_ppc='$namaTambahan' WHERE id='$id_bon'");
  if($qry){
    // Ambil data bon untuk isi email
    $bon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_ganti_kain_now WHERE id='$id_bon'"));
    // Default penerima
    // $to = ['deden.kurnia@indotaichen.com', 'tobias.sulistiyo@indotaichen.com', 'usman.as@indotaichen.com'];
    // Jika user memilih email di modal, tambahkan ke penerima
    if (!empty($emailTambahan)) {
      $to[] = $emailTambahan;
    }
	$subject = "Bon Ganti Kain #".$bon['no_bon']." Telah Di Ajukan - Approve ";
    // Link ke halaman input_stok_ppc (di folder pages)
    $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
    $linkInputStok = $baseUrl . "/csr-itti/pages/input_stok_ppc.php?id=" . urlencode($id_bon);
    $bodyHtml = "Bon dengan No: <b>".$bon['no_bon']."</b> telah di-buat oleh ". $_SESSION['dept'] ." pada ".$now.".<br>"
      . "Silakan Beri Tanggapan Konfirmasi.<br>"
      . "<a href='".$linkInputStok."' target='_blank' style='color: #337ab7; text-decoration: underline;'>Input Stok PPC</a>";

    // Tambahkan detail seperti halaman cetak
    $af = null;
    if (!empty($bon['id_nsp'])) {
      $idNsp = mysqli_real_escape_string($con, $bon['id_nsp']);
      $af = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_aftersales_now WHERE id='".$idNsp."' LIMIT 1"));
    }
    // Siapkan data pendukung
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
    $noPo = $af && isset($af['po']) && $af['po'] !== '' ? $af['po'] : (isset($bon['no_po']) ? $bon['no_po'] : '');
    $noOrder = $af && isset($af['no_order']) ? $af['no_order'] : '';
    $kdGanti = isset($bon['kd_ganti']) ? $bon['kd_ganti'] : '';
    $jenisKain = $af && isset($af['jenis_kain']) ? $af['jenis_kain'] : '';
    $noItem = $af && isset($af['no_item']) ? $af['no_item'] : '';
    $lebar = $af && isset($af['lebar']) ? $af['lebar'] : '';
    $gramasi = $af && isset($af['gramasi']) ? $af['gramasi'] : '';
    $lotGlobal = $af && isset($af['lot']) ? $af['lot'] : '';
	$no_hanger = $af && isset($af['no_hanger']) ? $af['no_hanger'] : '';

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

    $detailHtml = "<hr style='margin:10px 0;border:0;border-top:1px solid #ddd;'>"
      . "<div style='font-weight:bold;margin-bottom:6px;'>Detail Bon</div>"
      . "<table cellpadding='4' cellspacing='0' style='border-collapse:collapse;font-size:13px;color:#333;'>"
      .   "<tr><td style='padding:2px 8px 2px 0;white-space:nowrap;'>No. Bon</td><td>: ".$bon['no_bon']."</td></tr>"
      .   ( $noOrder!=='' ? "<tr><td style='padding:2px 8px 2px 0;'>No. Order / Kode</td><td>: ".$noOrder.( $kdGanti?" / ".$kdGanti:"" )."</td></tr>" : '' )
      .   ( ($pelanggan!=='' || $buyer!=='') ? "<tr><td style='padding:2px 8px 2px 0;'>Langganan/Buyer</td><td>: ".htmlspecialchars($pelanggan).( $buyer!==''?" / ".htmlspecialchars($buyer):'' )."</td></tr>" : '' )
      .   ( $noPo!=='' ? "<tr><td style='padding:2px 8px 2px 0;'>No. PO</td><td>: ".$noPo."</td></tr>" : '' )
      .   ( ($lebar!==''||$gramasi!=='') ? "<tr><td style='padding:2px 8px 2px 0;'>Lebar x Gramasi</td><td>: ".$lebar.( ($lebar!==''&&$gramasi!=='')?" x ":'' ).$gramasi."</td></tr>" : '' )
      .   ( $lotGlobal!=='' ? "<tr><td style='padding:2px 8px 2px 0;'>Lot</td><td>: ".$lotGlobal."</td></tr>" : '' )
	  .   (	$no_warna!=='' ? "<tr><td style='padding:2px 8px 2px 0;'>No. Warna</td><td>: ".htmlspecialchars($no_warna)."</td></tr>" : '' )
	  .   ( $warna!=='' ? "<tr><td style='padding:2px 8px 2px 0;'>Warna</td><td>: ".htmlspecialchars($warna)."</td></tr>" : '' )
	  .   ( $no_hanger!=='' ? "<tr><td style='padding:2px 8px 2px 0;'>No. Hanger</td><td>: ".htmlspecialchars($no_hanger)."</td></tr>" : '' )
      .   ( ($noItem!==''||$jenisKain!=='') ? "<tr><td style='padding:2px 8px 2px 0;'>Jenis Kain</td><td>: ".$noItem.( ($noItem!==''&&$jenisKain!=='')?" / ":'' ).htmlspecialchars($jenisKain)."</td></tr>" : '' )
      .   ( $masalah!=='' ? "<tr><td style='padding:2px 8px 2px 0;'>Masalah</td><td>: ".nl2br(htmlspecialchars($masalah))."</td></tr>" : '' )
      .   ( $alasan!=='' ? "<tr><td style='padding:2px 8px 2px 0;'>Alasan</td><td>: ".htmlspecialchars($alasan)."</td></tr>" : '' )
      .   ( $sebab!=='' ? "<tr><td style='padding:2px 8px 2px 0;'>Penyebab</td><td>: ".htmlspecialchars($sebab)."</td></tr>" : '' )
      . "</table>";

    // Detail Warna/Qty seperti di cetak
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
      .   "<td style='border:1px solid #e5e5e5; text-align:right;'>".htmlspecialchars($qtyO)."</td>"
      .   "<td style='border:1px solid #e5e5e5; text-align:right;'>".htmlspecialchars($qtyK)."</td>"
      .   "<td style='border:1px solid #e5e5e5; text-align:right;'>".htmlspecialchars($qtyE)."</td>"
      .   "<td style='border:1px solid #e5e5e5; text-align:right;'>".htmlspecialchars($kg)."</td>"
      .   "<td style='border:1px solid #e5e5e5;'>".htmlspecialchars($pjg).' '.htmlspecialchars($satuan)."</td>"
      . "</tr>"
      . "</table>";

    if ($analisa!=='' || $pencegahan!=='') {
      $detailHtml .= "<div style='margin-top:8px;'><b>Analisa dan Pencegahan:</b><br>".
        nl2br(htmlspecialchars(trim($analisa.( ($analisa&&$pencegahan)?"\n":"" ).$pencegahan)) )."</div>";
    }

    $bodyHtml .= $detailHtml;
    $sendMailResult = sendEmailApproved($to, $subject, $bodyHtml);
    if(!$sendMailResult){
      echo "<script>alert('Gagal mengirim email notifikasi! Pesan: ".getLastMailerError()."');</script>";
    }
    echo "<script>swal({
      title: 'Bon Telah di Ajukan Approve',
      text: 'Status bon sudah di proses',
      type: 'success',
    }).then((result) => {
      if (result.value) {
        window.location.href='index1.php?p=input-bon-kain-new&id=".$_GET['id']."';
      }
    });</script>";
  }
}
// --- Pindahkan function ke atas sebelum blok approve ---
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
    function getLastMailerError() {
        global $GLOBAL_LAST_MAILER_ERROR;
        return $GLOBAL_LAST_MAILER_ERROR;
    }
}
?>
<!-- <p>Ini adalah WARNA : <?php echo $rCek['warna']?></p>
					<p>Ini adalah LOT : <?php echo $rCek['lot']?></p>
					<p>Ini adalah NO ORDER : <?php echo $rCek['no_order']?></p>
					<p>Ini adalah NO HANGER : <?php echo $rCek['no_hanger']?></p>
					<p>Ini adalah NO PO : <?php echo $rCek['po']?></p> -->
<div class="box box-info">
	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
		<div class="box-header with-border">
			<h3 class="box-title">Formulir Ganti Kain </h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="form-group">
				<label for="alasan" class="col-sm-2 control-label">Alasan</label>
				<div class="col-sm-3">
					<select class="form-control select2" name="alasan" required>
						<option value="">Pilih</option>
							<option <?php if($_POST['alasan']=="Reject Buyer"){?> selected=selected <?php };?>value="Reject Buyer">Reject Buyer</option>	
							<option <?php if($_POST['alasan']=="Kurang Qty"){?> selected=selected <?php };?>value="Kurang Qty">Kurang Qty</option>
					</select>
				</div>
				<label for="qty_email" class="col-sm-2 control-label">Qty Permintaan Sesuai Email </label>
				<div class="col-sm-2">
					<div class="input-group">
								<?php $qryw1=mysqli_query($con,"SELECT qty_claim,nodemand FROM tbl_aftersales_now WHERE no_order='$rCek[no_order]' and no_hanger='$rCek[no_hanger]' and po='$po_esc'");
									$rowW1=mysqli_fetch_array($qryw1);
						?>
						<input name="qty_email" type="text" class="form-control" id="qty_email" value="<?php echo $rowW1['qty_claim']; ?>" placeholder="0.00" style="text-align: right;">
						<span class="input-group-addon">Kg</span>
							<!-- <input name="qty_email" type="text" class="form-control" id="qty_email" value="<?php if($qty_email!=""){echo $qty_email;}else{echo $rcek['qty_email'];} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">Kg</span> -->

					</div>
				</div>
				<div class="col-sm-2">
					<div class="input-group">
							<input name="pjg_email" type="text" class="form-control" id="pjg_email" value="<?php if($pjg_email!=""){echo $pjg_email;}else{echo $rcek['pjg_email'];} ?>" placeholder="0.00" style="text-align: right;" required>
						<span class="input-group-addon">
							<select name="satuan_email" style="font-size: 12px;" id="satuan_email">
										<option value="Yard" <?php if($rcek['satuan_email']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
										<option value="Meter" <?php if($rcek['satuan_email']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
										<option value="PCS" <?php if($rcek['satuan_email']=="PCS"){ echo "SELECTED"; }?>>PCS</option>
										<option value="<?php echo $sat_email;?>" <?php if($sat_email!=""){ echo "SELECTED"; }?>><?php echo $sat_email;?></option>
							</select>
						</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="warna1" class="col-sm-2 control-label">Warna / Lot </label>
				<div class="col-sm-3">
					<select class="form-control select2" name="warna1" required>
						<option value="">Pilih</option>
							<?php $sqlw1=mysqli_query($con,"SELECT warna,lot FROM tbl_aftersales_now WHERE no_order='$rCek[no_order]' and no_hanger='$rCek[no_hanger]' and po='$po_esc' GROUP by po, no_order, no_hanger, warna ORDER BY warna");
							while ($rwarna=mysqli_fetch_array($sqlw1)){ ?>
							<option value="<?php echo $rwarna['warna'].",".$rwarna['lot'];?>"><?php echo $rwarna['warna']." / ".$rwarna['lot'];?></option>
						<?php } ?>
							<option <?php if($WN1!=""){?> selected=selected <?php };?>value="<?php echo $WN1.",".$L1;?>"><?php echo $WN1." / ".$L1;?></option>
					</select>
				</div>
				<label for="warna1" class="col-sm-2 control-label">Qty Setelah Negosiasi </label>
				<div class="col-sm-2">


					<div class="input-group">
							<!-- <?php $qryw1=mysqli_query($con,"SELECT qty_claim,nodemand FROM tbl_aftersales_now WHERE warna='$WN1' and lot='$L1' and no_order='$rCek[no_order]' and no_hanger='$rCek[no_hanger]' and po='$po_esc'");
							$rowW1=mysqli_fetch_array($qryw1);
								?>   -->

						<!-- <input name="kg1" type="text" class="form-control" id="kg1" value="<?php echo $rowW1['qty_claim']; ?>" placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">Kg</span> -->

						<input name="kg1" type="text" class="form-control" id="kg1" value="" placeholder="0.00" style="text-align: right;" required>
						<span class="input-group-addon">Kg</span>

					</div>
				</div>
				<div class="col-sm-2">
					<div class="input-group">
							<input name="pjg1" type="text" class="form-control" id="pjg1" value="<?php if($yard1!=""){echo $yard1;}else{echo $rcek['pjg1'];} ?>" placeholder="0.00" style="text-align: right;" required>
						<span class="input-group-addon">
							<select name="satuan1" style="font-size: 12px;" id="satuan1">
										<option value="Yard" <?php if($rcek['satuan1']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
										<option value="Meter" <?php if($rcek['satuan1']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
										<option value="PCS" <?php if($rcek['satuan1']=="PCS"){ echo "SELECTED"; }?>>PCS</option>
										<option value="<?php echo $sat1;?>" <?php if($sat1!=""){ echo "SELECTED"; }?>><?php echo $sat1;?></option>
							</select>
						</span>
					</div>
				</div>
				<div class="col-sm-2">
					<input name="nodemand1" type="hidden" class="form-control" id="nodemand1" value="<?php echo $rowW1['nodemand']; ?>" placeholder="" readonly>
				</div>
			</div>
			<div class="form-group">
				<label for="sub_defect" class="col-sm-2 control-label">Sub Defect</label>
				<div class="col-sm-3">
					<select class="form-control select2" name="sub_defect" id="sub_defect">
						<option value="">Pilih</option>
						<?php
							$qrym=mysqli_query($con,"SELECT masalah FROM tbl_masalah_aftersales ORDER BY masalah ASC");
							while($rm=mysqli_fetch_array($qrym)){
						?>
							<option value="<?php echo $rm['masalah'];?>" <?php if($rcek['sub_defect']==$rm['masalah']){echo "SELECTED";}?>><?php echo $rm['masalah'];?></option>	
							<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="sub_defect" class="col-sm-2 control-label">Solusi</label>
				<div class="col-sm-3">
					<select class="form-control select2" name="solusi" id="solusi">
						<option value="">Pilih</option>
						<?php
						$qrys = mysqli_query($con, "SELECT solusi FROM tbl_solusi ORDER BY solusi ASC");
						while ($rs = mysqli_fetch_array($qrys)) {
						?>
							<option value="<?php echo $rs['solusi']; ?>" <?php if ($rCek['solusi'] == $rs['solusi']) {
																				echo "SELECTED";
																			} ?>>
								<?php echo $rs['solusi']; ?>
							</option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		<!-- /.box-footer -->
		<div class="box-footer">
			<input type="submit" value="Simpan" name="save" id="save" class="btn btn-primary pull-right">
			<button type="submit" value="cari" class="btn btn-danger">Cari Data</button>
		</div>
	</form>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form2">
                <div class="box-header with-border">
                    <div class="pull-right">
                        <input type="submit" value="Pilih Cetak" name="cari" id="cari" class="btn btn-primary pull-left"/>
                        <a href="pages/cetak/cetak_bon_ganti.php?no_bon=<?php echo $r['no_bon'] ?>&id_nsp=<?php echo $_GET['id']; ?>&no_order=<?php echo $rCek['no_order'];?>&po=<?php echo urlencode($po_esc);?>&id_cek=<?php echo $_POST['cek'][0];?>&id_cek1=<?php echo $_POST['cek'][1];?>&id_cek2=<?php echo $_POST['cek'][2];?>" class="btn btn-info cetak <?php if($_POST['cek'][0]=="") { echo "disabled"; }?>" target="_blank">Cetak Bon</a>
                    </div>
                </div>
                
                <div class="box-body">
                    <table id="example3" class="table table-bordered table-hover table-striped nowrap" width="100%">
                        <thead class="bg-green">
                            <tr>
                                <th width="48"><div align="center">No</div></th>
                                <!-- <th width="48"><div align="center">id</div></th> -->
                                <th width="60"><div align="center">Tgl Buat</div></th>
                                <th width="301"><div align="center">Alasan</div></th>
                                <th width="343"><div align="center">Analisa</div></th>
                                <th width="331"><div align="center">Pencegahan</div></th>
                                <th width="331"><div align="center">Sub Defect</div></th>
                                <th width="331"><div align="center">Warna</div></th>
                                <th width="331"><div align="center">Qty Email</div></th>
                                <th width="331"><div align="center">Qty Nego</div></th>
                                <th width="331"><div align="center">Aksi</div></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            $sql = mysqli_query($con, "SELECT * FROM tbl_ganti_kain_now WHERE id_nsp='$_GET[id]' ORDER BY tgl_buat ASC");
                            while($r = mysqli_fetch_array($sql)) {
                                $no++;
                                $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
                                $sqladm = mysqli_query($con, "SELECT * FROM tbl_ganti_kain_now WHERE id='$r[id]' ORDER BY no_bon ASC");
                                $cekstatus = mysqli_fetch_array($sqladm);
                            ?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td align="center">
                                    <a href="#" class="edit_bon" id="<?php echo $r['id'] ?>"><?php echo $no; ?></a><br>
                                    <input type="checkbox" name="cek[]" value="<?php echo $r['id']; ?>"
                                        <?php if (isset($_POST['cek']) && in_array($r['id'], $_POST['cek'])): ?>
                                        checked="checked"
                                        <?php endif; ?>/>
                                </td>
								<!-- <td align="center"><?php echo $r['id']; ?></td> -->
                                <td align="center"><?php echo $r['tgl_buat']; ?></td>
                                <td align="center"><?php echo $r['alasan']; ?></td>
                                <td align="left"><?php echo $r['analisa']; ?></td>
                                <td align="left"><?php echo $r['pencegahan']; ?></td>
                                <td align="left"><?php echo $r['sub_defect']; ?></td>
                                <td align="left" valign="top"><?php if($r['warna1']!=""){echo $r['warna1'];} ?></td>
                                <td align="right"><?php if($r['qty_email']>0){echo $r['qty_email']." Kg ".$r['pjg_email']." ".$r['satuan_email'];} ?></td>
                                <td align="right"><?php if($r['kg1']>0){echo $r['kg1']." Kg ".$r['pjg1']." ".$r['satuan1'];} ?></td>
                                <td align="center">
                                    <div class="btn-group">
                                        <?php 
                                        // Cek jika sudah di-approve, disable tombol approve
                                        if (empty($cekstatus['approved_buat']) && empty($cekstatus['personil_buat'])) { ?>
                                            <a href="#" class="btn btn-success btn-xs" onclick="confirm_terima('ApprovedBon-<?php echo $r['id']; ?>-<?php echo htmlspecialchars($r['no_bon'], ENT_QUOTES); ?>-<?php echo $_SESSION['dept']; ?>-<?php echo $_SESSION['dept']; ?>-<?php echo $_SESSION['jabatanGKJ1']; ?>');">
                                                <i class="fa fa-check-circle" data-toggle="tooltip" data-placement="top" title="Approved"></i>
                                            </a>
                                        <?php } else { ?>
                                            <button class="btn btn-success btn-xs" disabled><i class="fa fa-check-circle"></i></button>
                                        <?php } ?>
                                        
                                        <a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataBON-<?php echo $r['id'] ?>');">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $tpersen += $r['persen'];
                            }
                            ?>
                        </tbody>
                    </table>
                    
                    <!-- Modal Windows -->
                    <div id="KodeEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                    <div id="PersenEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                    <div id="EditBon" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
                </div> <!-- /.box-body -->
            </form>
        </div> <!-- /.box -->
    </div> <!-- /.col-xs-12 -->
</div> <!-- /.row -->
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
<!-- Modal Popup untuk terima bon-->
<div class="modal fade" id="terimaBon" tabindex="-1" role="dialog" aria-labelledby="terimaBonLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="margin-top:100px;">
			<form id="approveForm" method="post" action="">
				<div class="modal-header bg-primary text-white">
					<h4 class="modal-title" id="terimaBonLabel">APPROVAL BON KAIN</h4>
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
						<label for="approve_email">Pilih Email Penerima:</label>
						<select class="form-control" name="email" id="approve_email" required>
							<option value="">-- Pilih Email --</option>
							<?php
							$queryEmail = mysqli_query($con, "SELECT * FROM master_email WHERE departemen = 'PPC' ORDER BY nama ASC");
							while ($rowEmail = mysqli_fetch_assoc($queryEmail)) {
								echo "<option value='" . htmlspecialchars($rowEmail['email']) . "'>" . htmlspecialchars($rowEmail['nama']) . " (" . htmlspecialchars($rowEmail['email']) . ")</option>";
							}
							?>
						</select>
					</div>

					<input type="hidden" name="approve_bon" value="1">
					<input type="hidden" name="id_bon" id="id_bon_approve" value="">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="fa fa-times"></i> Batal
					</button>
					<button type="submit" class="btn btn-success">
						<i class="fa fa-check"></i> Approve
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
	<script>
		function confirm_terima(terima_url) {
			$('#terimaBon').modal('show', {
				backdrop: 'static'
			});
			// terima_url format: ApprovedBon-ID-NOBON-Dept-Nama-Jabatan
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
	</script>
	<script type="text/javascript">
		function confirm_delete(delete_url) {
			$('#modal_del').modal('show', {
				backdrop: 'static'
			});
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}
	</script>
