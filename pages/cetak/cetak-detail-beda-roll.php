<?php
ini_set("error_reporting", 1);
session_start();
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Demand=$_GET['demand'];
$Tgl=$_GET['tgl'];
$id=$_GET['id'];
$qry1=mysqli_query($con,"SELECT * FROM tbl_lap_beda_roll WHERE id='$id'");
$row1=mysqli_fetch_array($qry1);

$qryd=mysqli_query($con,"SELECT * FROM tbl_detail_beda_roll WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl'");
$rowd=mysqli_fetch_array($qryd);

$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Detail Beda Roll</title>
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
$nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");	
?>
<body>
<table width="100%" border='0'>
  <thead>
    <tr>
        <td align="left" width="15%" style="font-size:13px;">Langganan</td>
        <td align="left" width="3%" style="font-size:13px;">:</td>
        <td align="left" width="18%" style="font-size:13px;"><?php if($row1['pelanggan']!=''){echo $row1['pelanggan'];}?></td>
        <td align="left" width="15%" style="font-size:13px;">Warna</td>
        <td align="left" width="3%" style="font-size:13px;">:</td>
        <td align="left" width="15%" style="font-size:13px;"><?php if($row1['warna']!=''){echo $row1['warna'];}?></td>
        <td align="left" width="10%" style="font-size:13px;">Lot</td>
        <td align="left" width="3%" style="font-size:13px;">:</td>
        <td align="left" width="10%" style="font-size:13px;">&nbsp;</td>
        <td align="left" width="15%" style="font-size:13px;">ERP</td>
        <td align="left" width="3%" style="font-size:13px;">:</td>
        <td align="left" width="10%" style="font-size:13px;"><?php if($row1['nokk']!=''){echo $row1['nokk'];}?></td>
    </tr>
    <tr>
        <td align="left" width="15%" style="font-size:13px;">Order</td>
        <td align="left" width="3%" style="font-size:13px;">:</td>
        <td align="left" width="18%" style="font-size:13px;"><?php if($row1['no_order']!=''){echo $row1['no_order'];}?></td>
        <td align="left" width="15%" style="font-size:13px;">Item</td>
        <td align="left" width="3%" style="font-size:13px;">:</td>
        <td align="left" width="15%" style="font-size:13px;"><?php if($row1['no_item']!=''){echo $row1['no_item'];}?></td>
        <td align="left" width="10%" style="font-size:13px;">Leader</td>
        <td align="left" width="3%" style="font-size:13px;">:</td>
        <td align="left" width="10%" style="font-size:13px;">&nbsp;</td>
        <td align="left" width="15%" style="font-size:13px;">Demand</td>
        <td align="left" width="3%" style="font-size:13px;">:</td>
        <td align="left" width="10%" style="font-size:13px;"><?php if($row1['nodemand']!=''){echo $row1['nodemand'];}?></td>
    </tr>
	</thead>
</table>
<?php 

  //KOLOM 1
  $sqldtl1=mysqli_query($con,"SELECT * FROM db_qc.tbl_detail_beda_roll WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' ORDER BY element ASC LIMIT 0,40");

  //KOLOM 2
  $sqldtl2=mysqli_query($con,"SELECT * FROM db_qc.tbl_detail_beda_roll WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' ORDER BY element ASC LIMIT 40,40");

  //KOLOM 3
  $sqldtl3=mysqli_query($con,"SELECT * FROM db_qc.tbl_detail_beda_roll WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' ORDER BY element ASC LIMIT 80,40");

  //KOLOM 4
  $sqldtl4=mysqli_query($con,"SELECT * FROM db_qc.tbl_detail_beda_roll WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' ORDER BY element ASC LIMIT 120,40");

  //Red
  $sqlred=mysqli_query($con,"SELECT count(*) as jml_red FROM db_qc.tbl_detail_beda_roll WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' AND red ='1'");
  $rred= mysqli_fetch_array($sqlred);
  //Green
  $sqlgreen=mysqli_query($con,"SELECT count(*) as jml_green FROM db_qc.tbl_detail_beda_roll WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' AND green ='1'");
  $rgreen= mysqli_fetch_array($sqlgreen);
  //Blue
  $sqlblue=mysqli_query($con,"SELECT count(*) as jml_blue FROM db_qc.tbl_detail_beda_roll WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' AND blue ='1'");
  $rblue= mysqli_fetch_array($sqlblue);
  //Yellow
  $sqlyellow=mysqli_query($con,"SELECT count(*) as jml_yellow FROM db_qc.tbl_detail_beda_roll WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' AND yellow ='1'");
  $ryellow= mysqli_fetch_array($sqlyellow);
  //Beda Roll
  $sqlbr=mysqli_query($con,"SELECT count(*) as jml_br FROM db_qc.tbl_detail_beda_roll WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' AND beda_roll ='1'");
  $rbr= mysqli_fetch_array($sqlbr);
  //Ujung Beda
  $sqlub=mysqli_query($con,"SELECT count(*) as jml_ub FROM db_qc.tbl_detail_beda_roll WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' AND ujung_beda ='1'");
  $rub= mysqli_fetch_array($sqlub);
  //Ok
  $sqlok=mysqli_query($con,"SELECT count(*) as jml_ok FROM db_qc.tbl_detail_beda_roll WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' AND ok ='1'");
  $rok= mysqli_fetch_array($sqlok);
?>
<table width="100%" border="0">
    <thead>
        <tr>
            <td valign="top"><table width="100%" border="1" class="table-list1">
                <thead>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;" rowspan="2"><strong>Roll</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;" colspan="7"><strong>Keterangan</strong></td>
                </tr>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Red</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Green</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Blue</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Yellow</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Beda Roll</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Ujung Beda</strong></td>
                <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>OK</strong></td>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    while($rdtl1= mysqli_fetch_array($sqldtl1)){
                    ?>
                    <tr>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php echo substr($rdtl1['element'],8,3);?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl1['red']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl1['green']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl1['blue']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl1['yellow']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl1['beda_roll']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl1['ujung_beda']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl1['ok']=="1"){echo "&#10004";}?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table></td>
            <td valign="top"><table width="100%" border="1" class="table-list1">
                <thead>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;" rowspan="2"><strong>Roll</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;" colspan="7"><strong>Keterangan</strong></td>
                </tr>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Red</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Green</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Blue</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Yellow</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Beda Roll</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Ujung Beda</strong></td>
                <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>OK</strong></td>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    while($rdtl2= mysqli_fetch_array($sqldtl2)){
                    ?>
                    <tr>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php echo substr($rdtl2['element'],8,3);?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl2['red']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl2['green']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl2['blue']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl2['yellow']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl2['beda_roll']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl2['ujung_beda']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl2['ok']=="1"){echo "&#10004";}?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table></td>
            <td valign="top"><table width="100%" border="1" class="table-list1">
                <thead>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;" rowspan="2"><strong>Roll</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;" colspan="7"><strong>Keterangan</strong></td>
                </tr>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Red</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Green</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Blue</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Yellow</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Beda Roll</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Ujung Beda</strong></td>
                <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>OK</strong></td>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    while($rdtl3= mysqli_fetch_array($sqldtl3)){
                    ?>
                    <tr>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php echo substr($rdtl3['element'],8,3);?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl3['red']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl3['green']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl3['blue']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl3['yellow']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl3['beda_roll']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl3['ujung_beda']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl3['ok']=="1"){echo "&#10004";}?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table></td>
            <td valign="top"><table width="100%" border="1" class="table-list1">
                <thead>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;" rowspan="2"><strong>Roll</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;" colspan="7"><strong>Keterangan</strong></td>
                </tr>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Red</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Green</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Blue</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Yellow</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Beda Roll</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Ujung Beda</strong></td>
                <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>OK</strong></td>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    while($rdtl4= mysqli_fetch_array($sqldtl4)){
                    ?>
                    <tr>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php echo substr($rdtl4['element'],8,3);?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl4['red']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl4['green']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl4['blue']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl4['yellow']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl4['beda_roll']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl4['ujung_beda']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl4['ok']=="1"){echo "&#10004";}?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table></td>
        </tr>
    </thead>
</table>
<table width="100%" border="1" class="table-list1">
    <tr>
        <td align="left" style="font-size:13px;"> TOTAL</td>
        <td align="left" style="font-size:13px;"> Red = <?php echo $rred['jml_red']; ?> Roll</td>
        <td align="left" style="font-size:13px;"> Green = <?php echo $rgreen['jml_green']; ?> Roll</td>
        <td align="left" style="font-size:13px;"> Blue = <?php echo $rblue['jml_blue']; ?> Roll</td>
        <td align="left" style="font-size:13px;"> Yellow = <?php echo $ryellow['jml_yellow']; ?> Roll</td>
        <td align="left" style="font-size:13px;"> Beda Roll = <?php echo $rbr['jml_br']; ?> Roll</td>
        <td align="left" style="font-size:13px;"> Ujung Beda = <?php echo $rub['jml_ub']; ?> Roll</td>
        <td align="left" style="font-size:13px;"> OK = <?php echo $rok['jml_ok']; ?> Roll</td>
    </tr>
    <tr>
        <td align="left" style="font-size:13px;" colspan="8"> KETERANGAN : <?php echo $row1['comment']; ?></td>
    </tr>
</table>
</body>
</html>