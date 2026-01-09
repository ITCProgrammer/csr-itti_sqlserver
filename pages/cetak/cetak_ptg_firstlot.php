<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
//--
$id=$_REQUEST['id'];
$act=$_GET['g'];
$data=mysqli_query($con,"SELECT * FROM tbl_firstlot WHERE id='$id' ORDER BY id DESC LIMIT 1");
$cekr=mysqli_num_rows($data);
$r=mysqli_fetch_array($data);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Sampel</title>
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
      <td align="left" valign="top" style="height: 1.6in;"><table width="100%" border="0" class="table-list1" style="width: 7in;">
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size: 70px;">Potong <?php if($cekr>0){echo $r['sample'];}?> Yard</div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:70px;">Gramasi &amp; Lebar</div></td>
        </tr>
        <tr>
          <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; border-right:0px #000000 solid;"><div style="font-size:70px;">Harus OK</div></td>
        </tr>
      </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>