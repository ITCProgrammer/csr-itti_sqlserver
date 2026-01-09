<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-

$qry=mysqli_query($con,"SELECT * FROM tbl_gerobak WHERE id_schedule=$idkk");
$row=mysqli_fetch_array($qry);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak IDENTIFIKASI PRODUK</title>
<script>

</script>
	<style>
	.table-list td {
	color: #333;
	font-size:12px;
	border-color: #fff;
	border-collapse: collapse;
	vertical-align: center;
	padding: 3px 5px;
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid;
	border-right:1px #000000 solid;

	
}
.table-list1 {
	clear: both;
	text-align: left;
	border-collapse: collapse;
	margin: 0px 0px 5px 0px;
	background:#fff;	
}
.table-list1 td {
	color: #333;
	font-size:14px;
	border-color: #fff;
	border-collapse: collapse;
	vertical-align: center;
	padding: 1px 3px;
	border-bottom:0px #000000 solid;
	border-top:0px #000000 solid;
	border-left:0px #000000 solid;
	border-right:0px #000000 solid;
	
	
}

	</style>
</head>

<body>
<table width="100%" border="" class="table-list1" style="border-bottom:1px #000000 solid;
	border-top:1px #000000 solid;
	border-left:1px #000000 solid;
	border-right:1px #000000 solid;">
  <tr>
    <td width="10%" align="center"><img src="Indo.jpg" width="50" height="50
		" alt=""/></td>
    <td width="58%" align="center" style="border-bottom:0px #000000 solid;
	border-top:0px #000000 solid;
	border-left:1px #000000 solid;
	border-right:1px #000000 solid;"><strong><font size="+2">IDENTIFIKASI PRODUK</font></strong></td>
    <td width="32%" align="center"><table width="100%">
      <tbody>
        <tr>
          <td width="36%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">No. Form</td>
          <td width="5%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">:</td>
          <td width="59%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">20-03</td>
        </tr>
        <tr>
          <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">No Revisi</td>
          <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">:</td>
          <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">02</td>
        </tr>
        <tr>
          <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Tgl. Terbit</td>
          <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">:</td>
          <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">15 April 2020</td>
        </tr>
      </tbody>
    </table></td>
  </tr>
</table>
<table width="100%" border="" class="table-list1" >
  <tbody>
    <tr>
      <td scope="col" style="border-bottom:0px #000000 solid;
	border-top:0px #000000 solid;
	border-left:0px #000000 solid;
	border-right:0px #000000 solid;"><table width="83" border="" class="table-list1">
        <tbody>
          <tr>
            <td align="center" valign="middle"><strong>FORM B</strong></td>
          </tr>
        </tbody>
      </table></td>
      <td scope="col" style="border-bottom:0px #000000 solid;
	border-top:0px #000000 solid;
	border-left:0px #000000 solid;
	border-right:0px #000000 solid;">&nbsp;</td>
      <td scope="col" style="border-bottom:0px #000000 solid;
	border-top:0px #000000 solid;
	border-left:0px #000000 solid;
	border-right:0px #000000 solid;"><?php if($_GET['nm']!=""){echo $_GET['nm']; }?></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="top"><h2>DEPARTEMEN QCF</h2></td>
    </tr>
    <tr>
      <td width="15%" style="height: 0.3in;">&nbsp;</td>
      <td width="48%">&nbsp;</td>
      <td width="37%" rowspan="6" valign="top"><table width="100%">
        <tbody>
          <tr align="center">
            <td colspan="2" scope="col">STATUS PRODUK :</td>
            </tr>
          <tr>
            <td width="7%" align="center" valign="middle" style="border-bottom:1px #000000 solid;
	border-top:1px #000000 solid;
	border-left:1px #000000 solid;
	border-right:1px #000000 solid;"><?php if($row['status_produk']=="1"){ echo "X";}else{ echo "&nbsp;"; }?></td>
            <td width="93%">SIAP TEST QUALITY</td>
            </tr>
          <tr>
            <td align="center" valign="middle" style="border-bottom:1px #000000 solid;
	border-top:1px #000000 solid;
	border-left:1px #000000 solid;
	border-right:1px #000000 solid;"><?php if($row['status_produk']=="2"){ echo "X";}else{ echo "&nbsp;"; } ?></td>
            <td>TAHAN KARTU KERJA</td>
            </tr>
          <tr>
            <td colspan="2" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="left" valign="top"><?php echo $row['catatan']; ?></td>
          </tr>
          </tbody>
      </table></td>
    </tr>
    <tr>
      <td valign="top" style="height: 0.3in;">TANGGAL OUT</td>
      <td valign="top">: <?php echo $row['tgl_out6']; ?></td>
    </tr>
    <tr valign="top">
      <td style="height: 0.3in;">NO. ORDER</td>
      <td>: <?php echo $row['no_order']; ?></td>
    </tr>
    <tr valign="top">
      <td style="height: 0.3in;">JENIS KAIN</td>
      <td>: <?php echo $row['jenis_kain']; ?></td>
    </tr>
    <tr valign="top">
      <td style="height: 0.3in;">WARNA</td>
      <td>: <?php echo $row['warna']; ?></td>
    </tr>
    <tr valign="top">
      <td style="height: 0.3in;">LOT</td>
      <td>: <?php echo $row['lot']; ?></td>
    </tr>
    <tr>
      <td valign="top" style="height: 0.3in;">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" valign="top" style="height: 0.4in;">KODE STATUS : <?php echo $row['kd_status']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td valign="top" style="height: 0.4in;">NO GEROBAK :</td>
      <td valign="top">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><table width="100%" border="0">
        <tbody>
          <tr>
            <td width="20%" valign="top" style="height: 0.4in;" scope="col">1. <span style="height: 0.4in;"><?php echo $row['no_gerobak1']; ?></span></td>
            <td width="20%" valign="top" scope="col">2. <span style="height: 0.4in;"><?php echo $row['no_gerobak2']; ?></span></td>
            <td width="20%" valign="top" scope="col">3. <span style="height: 0.4in;"><?php echo $row['no_gerobak3']; ?></span></td>
            <td width="20%" valign="top" scope="col">4. <span style="height: 0.4in;"><?php echo $row['no_gerobak4']; ?></span></td>
            <td width="20%" valign="top" scope="col">5. <span style="height: 0.4in;"><?php echo $row['no_gerobak5']; ?></span></td>
            <td width="20%" valign="top" scope="col">6. <span style="height: 0.4in;"><?php echo $row['no_gerobak6']; ?></span></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="3" align="right">&nbsp;</td>
    </tr>
  </tbody>
</table>
<br />


</body>
</html>