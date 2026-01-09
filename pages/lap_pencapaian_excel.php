<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=lap_pencapaian_".substr($_GET['awal'],0,10)."_".substr($_GET['akhir'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php
//$lReg_username=$_SESSION['labReg_username'];


$con=mysqli_connect("10.0.0.10","dit","4dm1n");
$db=mysqli_select_db("db_qc",$con)or die("Gagal Koneksi");
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$Dept=$_GET['dept'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Lap Pencapaian</title>
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

<body>
<table width="100%">
  <tr>
    <td><table width="100%" border="1" class="table-list1">
        <tr>
          <td colspan="10" align="center" scope="col"><h2>Laporan Pencapaian NCP</h2></td>
        </tr>
        <tr>
          <td colspan="2" scope="col"><font size="-1">Hari/Tanggal : <?php echo tanggal_indo ($tgl, true);?></font></td>
          <td scope="col">&nbsp;</td>
          <td scope="col">&nbsp;</td>
          <td scope="col">&nbsp;</td>
          <td scope="col">&nbsp;</td>
          <td scope="col">&nbsp;</td>
          <td scope="col">&nbsp;</td>
          <td scope="col">&nbsp;</td>
          <td scope="col"><font size="-1">Jam: <?php echo date('H:i:s', strtotime($jam));?></font></td>
        </tr>
        <tr>
          <td scope="col"><div align="center">No</div></td>
          <td scope="col"><div align="center">Buyer</div></td>
          <td scope="col"><div align="center">No. Order + No NCP</div></td>
          <td scope="col"><div align="center">Jenis Kain</div></td>
          <td scope="col"><div align="center">Tgl Kirim</div></td>
          <td scope="col"><div align="center">Warna</div></td>
          <td scope="col"><div align="center">Lot</div></td>
          <td scope="col"><div align="center">Qty</div></td>
          <td scope="col"><div align="center">Tgl Target</div></td>
          <td scope="col"><div align="center">Masalah</div></td>
        </tr>
	
	
		
		  
  
		  	  
</table></td>
    </tr>
  
</table>
</body>
</html>