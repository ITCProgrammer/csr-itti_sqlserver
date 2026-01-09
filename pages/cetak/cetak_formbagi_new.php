<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$Shift=$_GET['shift'];
$MC=$_GET['nomc'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%d-%b-%y') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}

$sqlCek=mysqli_query($con,"SELECT a.*,b.hangtag FROM tbl_tq_nokk a LEFT JOIN tbl_master_hangtag b ON a.no_item = b.no_item WHERE nodemand='$idkk' ORDER BY id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$rcek=mysqli_fetch_array($sqlCek);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Pembagian Kain</title>
<script>

// set portrait orientation

jsPrintSetup.setOption('orientation', jsPrintSetup.kPortraitOrientation);

// set top margins in millimeters
jsPrintSetup.setOption('marginTop', 0);
jsPrintSetup.setOption('marginBottom', 0);
jsPrintSetup.setOption('marginLeft', 0);
jsPrintSetup.setOption('marginRight', 0);

// set page header
jsPrintSetup.setOption('headerStrLeft', '');
jsPrintSetup.setOption('headerStrCenter', '');
jsPrintSetup.setOption('headerStrRight', '');

// set empty page footer
jsPrintSetup.setOption('footerStrLeft', '');
jsPrintSetup.setOption('footerStrCenter', '');
jsPrintSetup.setOption('footerStrRight', '');

// clears user preferences always silent print value
// to enable using 'printSilent' option
jsPrintSetup.clearSilentPrint();

// Suppress print dialog (for this context only)
jsPrintSetup.setOption('printSilent', 1);

// Do Print 
// When print is submitted it is executed asynchronous and
// script flow continues after print independently of completetion of print process! 
jsPrintSetup.print();

window.addEventListener('load', function () {
    var rotates = document.getElementsByClassName('rotate');
    for (var i = 0; i < rotates.length; i++) {
        rotates[i].style.height = rotates[i].offsetWidth + 'px';
    }
});
// next commands

</script>
<style>
.hurufvertical {
 writing-mode:tb-rl;
    -webkit-transform:rotate(-90deg);
    -moz-transform:rotate(-90deg);
    -o-transform: rotate(-90deg);
    -ms-transform:rotate(-90deg);
    transform: rotate(180deg);
    white-space:nowrap;
    float:left;
}	

input{
text-align:center;
border:hidden;
}
@media print {
  ::-webkit-input-placeholder { /* WebKit browsers */
      color: transparent;
  }
  :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
      color: transparent;
  }
  ::-moz-placeholder { /* Mozilla Firefox 19+ */
      color: transparent;
  }
  :-ms-input-placeholder { /* Internet Explorer 10+ */
      color: transparent;
  }
  .pagebreak { page-break-before:always; }
  .header {display:block}
  table thead 
   {
    display: table-header-group;
   }
}	
</style>	
</head>
<?php 
//$nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");	
?>
<body>
	
	<table width="100%" border="0" class="table-list1">
  <tbody>
    <tr>
      <td colspan="2" align="center" scope="col"><strong>Stiker<br><?php echo $rcek['buyer'];?></strong></td>
      <td colspan="4" scope="col"><div align="center" style="font-size: 18px;"><strong>FORM PEMBAGIAN KAIN</strong></div><br>
      <strong>Tanggal:<br>Shift</strong></td>
    </tr>
    <tr align="center">
      <td>NO.</td>
      <td>Jenis Testing</td>
      <td>Telah Mengambil Kain</td>
      <td>Target Testing</td>
      <td>Selesai Testing</td>
      <td>Tinjauan Ulang PIC</td>
    </tr>
<?php $no=1;
$qMB=mysqli_query($con,"SELECT * FROM tbl_masterbuyer_test WHERE buyer='$rcek[buyer]'");
$dMB=mysqli_fetch_array($qMB);
                    $detail=explode(",",$dMB['physical']);
                    $detail1=explode(",",$dMB['functional']);
                    $detail2=explode(",",$dMB['colorfastness']);	  
	  ?>
	
     <?php foreach ($detail as $output ) {  if($output!=""){?> 
    <tr>
      <td align="center"><?php echo $no; ?></td>
      <td><?php echo $output; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	 <?php $no++;}} ?> 
	<?php foreach ($detail1 as $output1 ) { if($output1!=""){?> 
    <tr>
      <td align="center"><?php echo $no; ?></td>
      <td><?php echo $output1; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	 <?php $no++;}} ?>  
	<?php foreach ($detail2 as $output2 ) { if($output2!=""){?> 
    <tr>
      <td align="center"><?php echo $no; ?></td>
      <td><?php echo $output2; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	 <?php $no++;} }?> 
  </tbody>
</table>

	
</body>
	
</html>

  