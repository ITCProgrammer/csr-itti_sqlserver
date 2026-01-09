<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
//--
//$con=mysqli_connect("localhost","root","");
//$db=mysqli_select_db("db_qc",$con)or die("Gagal Koneksi");
//$idkk=$_GET['idkk'];
//$idkk=$_REQUEST['idkk'];
//$act=$_GET['g'];
$buyer=$_GET['buyer'];
$data=mysqli_query($con,"SELECT * FROM tbl_masterbuyer_test WHERE buyer='$buyer' ORDER BY id DESC LIMIT 1");
$r=mysqli_fetch_array($data);
$detail=explode(",",$r['physical']);
$detail2=explode(",",$r['functional']);
$detail3=explode(",",$r['colorfastness']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Master Buyer</title>
<style>
	td{
	border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;
	}
	</style>
</head>
<body>
<table width="100%" border="0"style="width: 7in;">
    <tbody>    
        <tr>
            <td align="left" valign="top" style="height: 7in;"><table width="100%" border="0" class="table-list1" style="width: 8.6in;">
                <tr>
                    <td colspan="5" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 10px;"><strong>BUYER : <?php echo $r['buyer'];?></strong></div></td>
                    <td colspan="4" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 10px;"><strong>APPROVED BY : <?php echo $r['approve'];?></strong></div></td>
                </tr>
                <tr>
                    <td colspan="9" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 10px;">&nbsp;</div></td>
                </tr>
                <tr>
                    <td colspan="9" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 10px;"><strong>PHYSICAL</strong></div></td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("FLAMMABILITY",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">FLAMMABILITY</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("FIBER CONTENT",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">FIBER CONTENT</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("FABRIC COUNT",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="40%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">FABRIC COUNT</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("BOW & SKEW",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">BOW & SKEW</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("PILLING MARTINDLE",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">PILLING MARTINDLE</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="40%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">FABRIC WEIGHT & SHRINKAGE & SPIRALITY</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("PILLING BOX",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">PILLING BOX</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("PILLING RANDOM TUMBLER",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">PILLING RANDOM TUMBLER</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("ABRATION",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="40%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">ABRATION</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("SNAGGING MACE",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">SNAGGING MACE</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("SNAGGING POD",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">SNAGGING POD</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("BEAN BAG",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="40%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">BEAN BAG</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("BURSTING STRENGTH",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">BURSTING STRENGTH</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("THICKNESS",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">THICKNESS</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("STRETCH & RECOVERY",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="40%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">STRETCH & RECOVERY</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("GROWTH",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">GROWTH</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("APPEARANCE",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">APPEARANCE</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("HEAT SHRINKAGE",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="40%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">HEAT SHRINKAGE</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("FIBRE/FUZZ",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">FIBRE/FUZZ</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("PILLING LOCUS",$detail)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">PILLING LOCUS</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="40%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="9" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 10px;">&nbsp;</div></td>
                </tr>
                <tr>
                    <td colspan="9" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 10px;"><strong>FUNCTIONAL &amp; PH</strong></div></td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("WICKING",$detail2)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">WICKING</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("ABSORBENCY",$detail2)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">ABSORBENCY</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("DRYING TIME",$detail2)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">DRYING TIME</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("WATER REPPELENT",$detail2)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">WATER REPPELENT</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("PH",$detail2)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">PH</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("SOIL RELEASE",$detail2)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">SOIL RELEASE</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="9" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 10px;">&nbsp;</div></td>
                </tr>
                <tr>
                    <td colspan="9" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 10px;"><strong>COLORFASTNESS</strong></div></td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("WASHING",$detail3)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">WASHING</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("PERSPIRATION ACID",$detail3)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">PERSPIRATION ACID</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("PERSPIRATION ALKALINE",$detail3)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">PERSPIRATION ALKALINE</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("WATER",$detail3)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">WATER</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("CROCKING",$detail3)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">CROCKING</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("PHENOLIC YELLOWING",$detail3)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">PHENOLIC YELLOWING</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("LIGHT",$detail3)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">LIGHT</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("COLOR MIGRATION-OVEN TEST",$detail3)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">COLOR MIGRATION-OVEN TEST</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("COLOR MIGRATION",$detail3)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">COLOR MIGRATION</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("LIGHT PERSPIRATION",$detail3)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">LIGHT PERSPIRATION</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("SALIVA",$detail3)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">SALIVA</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                    <td width="5%" align="right" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if(in_array("BLEEDING",$detail3)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="20%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">BLEEDING</td>
                    <td width="5%" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;">&nbsp;</td>
                </tr>
            </table></td>
        </tr>
    </tbody>
</table>
</body>
</html>