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
$qry1=mysqli_query($con,"SELECT * FROM tbl_lap_shading WHERE id='$id'");
$row1=mysqli_fetch_array($qry1);

$qryd=mysqli_query($con,"SELECT * FROM tbl_detail_roll_shading WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl'");
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
<title>Cetak Detail Roll Shading</title>
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
  $sqldtl= mysqli_query($con,"SELECT * FROM tbl_detail_roll_shading WHERE nodemand='$Demand'");
  $rdtl= mysqli_fetch_array($sqldtl);
  $jmldtl = mysqli_num_rows($sqldtl);
  $batas=ceil($jmldtl/2);
  $lawal=$batas*1-$batas;
  $lakhir=$batas*2-$batas;

  //KOLOM 1
  $sqldtl1=mysqli_query($con,"SELECT * FROM db_qc.tbl_detail_roll_shading WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' ORDER BY element ASC LIMIT 0,20");

  //KOLOM 2
  $sqldtl2=mysqli_query($con,"SELECT * FROM db_qc.tbl_detail_roll_shading WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' ORDER BY element ASC LIMIT 20,20");

  //KOLOM 3
  $sqldtl3=mysqli_query($con,"SELECT * FROM db_qc.tbl_detail_roll_shading WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' ORDER BY element ASC LIMIT 40,20");

  //KOLOM 4
  $sqldtl4=mysqli_query($con,"SELECT * FROM db_qc.tbl_detail_roll_shading WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' ORDER BY element ASC LIMIT 60,20");

  //KOLOM 5
  $sqldtl5=mysqli_query($con,"SELECT * FROM db_qc.tbl_detail_roll_shading WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' ORDER BY element ASC LIMIT 80,20");

  //KOLOM 6
  $sqldtl6=mysqli_query($con,"SELECT * FROM db_qc.tbl_detail_roll_shading WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' ORDER BY element ASC LIMIT 100,20");

  //GRADE 4_5
  $sql45=mysqli_query($con,"SELECT count(*) as jml_45 FROM db_qc.tbl_detail_roll_shading WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' AND grade_4_5 ='1'");
  $r45= mysqli_fetch_array($sql45);
  //GRADE 4
  $sql4=mysqli_query($con,"SELECT count(*) as jml_4 FROM db_qc.tbl_detail_roll_shading WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' AND grade_4 ='1'");
  $r4= mysqli_fetch_array($sql4);
  //GRADE 3_5
  $sql35=mysqli_query($con,"SELECT count(*) as jml_35 FROM db_qc.tbl_detail_roll_shading WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' AND grade_3_5 ='1'");
  $r35= mysqli_fetch_array($sql35);
  //Disposisi
  $sqldis=mysqli_query($con,"SELECT count(*) as jml_dis FROM db_qc.tbl_detail_roll_shading WHERE nodemand='$Demand' and DATE_FORMAT(tgl_buat,'%Y-%m-%d') ='$Tgl' AND disposisi ='1'");
  $rdis= mysqli_fetch_array($sqldis);
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
                border-right:1px #000000 solid; font-size:13px;" colspan="4"><strong>Grade</strong></td>
                </tr>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>4.5</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>4.0</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>3.5</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid; font-size:13px;"><strong>Disp.</strong></td>
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
                    border-right:1px #000000 solid;"><?php if($rdtl1['grade_4_5']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl1['grade_4']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl1['grade_3_5']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl1['disposisi']=="1"){echo "&#10004";}?></td>
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
                border-right:1px #000000 solid;font-size:13px;" rowspan="2"><strong>Roll</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;" colspan="4"><strong>Grade</strong></td>
                </tr>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>4.5</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>4.0</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>3.5</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>Disp.</strong></td>
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
                    border-right:1px #000000 solid;"><?php if($rdtl2['grade_4_5']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl2['grade_4']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl2['grade_3_5']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl2['disposisi']=="1"){echo "&#10004";}?></td>
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
                border-right:1px #000000 solid;font-size:13px;" rowspan="2"><strong>Roll</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;" colspan="4"><strong>Grade</strong></td>
                </tr>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>4.5</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>4.0</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>3.5</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>Disp.</strong></td>
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
                    border-right:1px #000000 solid;"><?php if($rdtl3['grade_4_5']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl3['grade_4']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl3['grade_3_5']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl3['disposisi']=="1"){echo "&#10004";}?></td>
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
                border-right:1px #000000 solid;font-size:13px;" rowspan="2"><strong>Roll</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;" colspan="4"><strong>Grade</strong></td>
                </tr>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>4.5</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>4.0</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>3.5</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>Disp.</strong></td>
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
                    border-right:1px #000000 solid;"><?php if($rdtl4['grade_4_5']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl4['grade_4']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl4['grade_3_5']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl4['disposisi']=="1"){echo "&#10004";}?></td>
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
                border-right:1px #000000 solid;font-size:13px;" rowspan="2"><strong>Roll</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;" colspan="4"><strong>Grade</strong></td>
                </tr>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>4.5</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>4.0</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>3.5</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>Disp.</strong></td>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    while($rdtl5= mysqli_fetch_array($sqldtl5)){
                    ?>
                    <tr>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php echo substr($rdtl5['element'],8,3);?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl5['grade_4_5']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl5['grade_4']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl5['grade_3_5']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl5['disposisi']=="1"){echo "&#10004";}?></td>
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
                border-right:1px #000000 solid;font-size:13px;" rowspan="2"><strong>Roll</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;" colspan="4"><strong>Grade</strong></td>
                </tr>
                <tr>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>4.5</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>4.0</strong></td>
                 <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>3.5</strong></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                border-top:1px #000000 solid;
                border-left:1px #000000 solid;
                border-right:1px #000000 solid;font-size:13px;"><strong>Disp.</strong></td>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    while($rdtl6= mysqli_fetch_array($sqldtl6)){
                    ?>
                    <tr>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php echo substr($rdtl6['element'],8,3);?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl6['grade_4_5']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl6['grade_4']=="1"){echo "&#10004";}?></td>
                        <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl6['grade_3_5']=="1"){echo "&#10004";}?></td>
                    <td align="center" style="border-bottom:1px #000000 solid;
                    border-top:1px #000000 solid;
                    border-left:1px #000000 solid;
                    border-right:1px #000000 solid;"><?php if($rdtl6['disposisi']=="1"){echo "&#10004";}?></td>
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
        <td align="left" style="font-size:13px;"> 4.5 = <?php echo $r45['jml_45']; ?> Roll</td>
        <td align="left" style="font-size:13px;"> 4.0 = <?php echo $r4['jml_4']; ?> Roll</td>
        <td align="left" style="font-size:13px;"> 3.5 = <?php echo $r35['jml_35']; ?> Roll</td>
        <td align="left" style="font-size:13px;"> Disposisi = <?php echo $rdis['jml_dis']; ?> Roll</td>
    </tr>
    <tr>
        <td align="left" style="font-size:13px;" colspan="5"> KETERANGAN : <?php echo $row1['comment']; ?></td>
    </tr>
</table>
</body>
</html>