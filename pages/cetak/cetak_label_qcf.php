<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
$data=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE nokk='$idkk' ORDER BY id DESC LIMIT 1");
$cekr=mysqli_num_rows($data);
$r=mysqli_fetch_array($data);
$data1=mysqli_query($con,"SELECT * FROM tbl_lbl_availability WHERE nokk='$idkk' ORDER BY id DESC LIMIT 1");
$r1=mysqli_fetch_array($data1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Label</title>
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
      <td align="left" valign="top" style="height: 1.6in;"><table width="100%" border="0" class="table-list1" style="width: 2.3in;">
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 8px;"><?php if($cekr>0){echo $r['nokk'];}else{echo $r1['nokk'];}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><?php if($cekr>0){echo $r['pelanggan'];}else{echo $r1['pelanggan'];}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><?php if($cekr>0){echo substr($r['no_po'],0,31);}else{echo substr($r1['no_po'],0,31);}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><strong><?php if($cekr>0){echo $r['no_order'];}else{echo $r1['no_order'];}?></strong><?php if($cekr>0){echo " (".$r['no_item'].")";}else{echo " (".$r1['no_item'].")";}?></div></td>
        </tr>
        <tr>
          <td colspan="3" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:6px;"><?php if($cekr>0){echo substr($r['jenis_kain'],0,100);}else{echo substr($r1['jenis_kain'],0,100);}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><span style="font-size:9px;"><?php if($cekr>0){echo "<strong><span style='font-size:9px;'>".substr($r['warna'],0,60)."</span></strong>/".substr($r['no_warna'],0,15);}else{echo "<strong><span style='font-size:9px;'>".substr($r1['warna'],0,60)."</span></strong>/".substr($r1['no_warna'],0,15);}?></span></div></td>
        </tr>
        <tr>
          <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">LOT: <?php if($cekr>0){echo $r['lot'];}else{echo $r1['lot'];}?></div></td>
          <td width="14%" align="right" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">L&amp;G:</div></td>
          <td width="51%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><?php if($cekr>0){echo $r['lebar']." x ".$r['gramasi'];}else{echo $r1['lebar']." x ".$r1['gramasi'];}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><span style="font-size:9px;"><?php echo date('d-M-Y');?></span></td>
          </tr>
          <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><span style="font-size:9px;"><?php if($cekr>0){echo $r['availability'];}else{echo $r1['availability'];}?></span></td>
        </tr>
      </table></td>
      <td align="left" valign="top" style="height: 1.6in;"><table width="100%" border="0" class="table-list1" style="width: 2.3in;">
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 8px;"><?php if($cekr>0){echo $r['nokk'];}else{echo $r1['nokk'];}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><?php if($cekr>0){echo $r['pelanggan'];}else{echo $r1['pelanggan'];}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><?php if($cekr>0){echo substr($r['no_po'],0,31);}else{echo substr($r1['no_po'],0,31);}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><strong><?php if($cekr>0){echo $r['no_order'];}else{echo $r1['no_order'];}?></strong><?php if($cekr>0){echo " (".$r['no_item'].")";}else{echo " (".$r1['no_item'].")";}?></div></td>
        </tr>
        <tr>
          <td colspan="3" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:6px;"><?php if($cekr>0){echo substr($r['jenis_kain'],0,100);}else{echo substr($r1['jenis_kain'],0,100);}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><span style="font-size:9px;"><?php if($cekr>0){echo "<strong><span style='font-size:9px;'>".substr($r['warna'],0,60)."</span></strong>/".substr($r['no_warna'],0,15);}else{echo "<strong><span style='font-size:9px;'>".substr($r1['warna'],0,60)."</span></strong>/".substr($r1['no_warna'],0,15);}?></span></div></td>
        </tr>
        <tr>
          <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">LOT: <?php if($cekr>0){echo $r['lot'];}else{echo $r1['lot'];}?></div></td>
          <td align="right" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">L&amp;G:</div></td>
          <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><?php if($cekr>0){echo $r['lebar']." x ".$r['gramasi'];}else{echo $r1['lebar']." x ".$r1['gramasi'];}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><span style="font-size:9px;"><?php echo date('d-M-Y');?></span></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><span style="font-size:9px;"><?php if($cekr>0){echo $r['availability'];}else{echo $r1['availability'];}?></span></td>
        </tr>
      </table></td>
      <td align="left" valign="top" style="height: 1.6in;"><table width="100%" border="0" class="table-list1" style="width: 2.3in;">
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 8px;"><?php if($cekr>0){echo $r['nokk'];}else{echo $r1['nokk'];}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><?php if($cekr>0){echo $r['pelanggan'];}else{echo $r1['pelanggan'];}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><?php if($cekr>0){echo substr($r['no_po'],0,31);}else{echo substr($r1['no_po'],0,31);}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><strong><?php if($cekr>0){echo $r['no_order'];}else{echo $r1['no_order'];}?></strong><?php if($cekr>0){echo " (".$r['no_item'].")";}else{echo " (".$r1['no_item'].")";}?></div></td>
        </tr>
        <tr>
          <td colspan="3" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:6px;"><?php if($cekr>0){echo substr($r['jenis_kain'],0,100);}else{echo substr($r1['jenis_kain'],0,100);}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><span style="font-size:9px;"><?php if($cekr>0){echo "<strong><span style='font-size:9px;'>".substr($r['warna'],0,60)."</span></strong>/".substr($r['no_warna'],0,15);}else{echo "<strong><span style='font-size:9px;'>".substr($r1['warna'],0,60)."</span></strong>/".substr($r1['no_warna'],0,15);}?></span></div></td>
        </tr>
        <tr>
          <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">LOT: <?php if($cekr>0){echo $r['lot'];}else{echo $r1['lot'];}?></div></td>
          <td align="right" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;">L&amp;G:</div></td>
          <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:9px;"><?php if($cekr>0){echo $r['lebar']." x ".$r['gramasi'];}else{echo $r1['lebar']." x ".$r1['gramasi'];}?></div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><span style="font-size:9px;"><?php echo date('d-M-Y');?></span></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><span style="font-size:9px;"><?php if($cekr>0){echo $r['availability'];}else{echo $r1['availability'];}?></span></td>
        </tr>
      </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>