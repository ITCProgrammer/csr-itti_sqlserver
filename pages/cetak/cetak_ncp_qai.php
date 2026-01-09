<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
if($_GET['id']!=""){
$qry=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE id='$_GET[id]'");
}else{
$qry=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE no_ncp='$_GET[no_ncp]'");
}
$d=mysqli_fetch_array($qry);
//RMP Benang
if(strpos($d['rmp_benang'],"Horizontal")>-1){
	$rmpBng1="x";
}else{
	$rmpBng1="";
}
if(strpos($d['rmp_benang'],"Benang Kasar Halus")>-1){
	$rmpBng2="x";
}else{
	$rmpBng2="";
}
if(strpos($d['rmp_benang'],"Bintik bintik Kapas")>-1){
	$rmpBng3="x";
}else{
	$rmpBng3="";
}
if(strpos($d['rmp_benang'],"Gumpalan Kapas/Kapas Mati")>-1){
	$rmpBng4="x";
}else{
	$rmpBng4="";
}
if(strpos($d['rmp_benang'],"Benang Lain Lot")>-1){
	$rmpBng5="x";
}else{
	$rmpBng5="";
}
//RMP Rajut Knitting
if(strpos($d['rmp_rajut'],"Horizontal")>-1){
	$rmpRjt1="x";
}else{
	$rmpRjt1="";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Form NCP</title>
<link href="styles_cetak_ncp.css" rel="stylesheet" type="text/css">	
</head>

<body>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td colspan="5" align="center"><font size="+1"><strong>FORMULIR PRODUK TIDAK SESUAI</strong></font></td>
      <td rowspan="2" align="center"><table width="100%" border="0">
        <tbody>
          <tr>
            <td width="39%">No. Form</td>
            <td width="61%">: 04-01</td>
            </tr>
          <tr>
            <td>No. Revisi</td>
            <td>: 06</td>
            </tr>
          <tr>
            <td>Tgl. Terbit</td>
            <td>: 23-10-2019</td>
            </tr>
          </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="5" align="center"><font size="-1"><strong>No. NCP: </strong></font></td>
    </tr>
    <tr>
      <td colspan="2" align="left">TANGGAL: </td>
		<td colspan="4" align="right">&nbsp;</td>
    </tr>
    <tr>
      <td width="8%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">PELANGGAN</td>
      <td width="46%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td width="8%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">ROLL</td>
      <td width="13%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td width="8%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">WEIGHT</td>
      <td width="17%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; kg</td>
    </tr>
    <tr>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">PO</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">LOT NO.</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">BATCH NO</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
    </tr>
    <tr>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;height:">ORDER</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">PO RAJUT</td>
      <td colspan="3" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
    </tr>
    <tr>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;height: 0.3in;">JENIS KAIN</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">NO. WARNA / WARNA</td>
      <td colspan="3" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
    </tr>
    <tr>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid; height: 0.4in;">KERUSAKAN YANG TERJADI</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">TTD Peninjau Awal</td>
      <td colspan="3" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="8%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;height: 0.3in;">Tempat Kain Diletakan </td>
      <td width="13%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td width="20%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Tgl Kembali NCP ke QCF:</td>
      <td width="21%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Tgl Serah terima ke Follow Up:</td>
      <td width="38%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Ket.</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td colspan="2" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Tindakan Penyelesaian</td>
      <td colspan="2" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">TTD Dept.<br>
Penanggung Jawab</td>
      <td width="11%" rowspan="2" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Non Standar Proses</td>
      <td colspan="2" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Tanggal Penyelesaian</td>
      <td colspan="2" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Verifikasi Mutu / Quality :</td>
      <td width="16%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Catatan Verifikator (Jika Ada) </td>
      <td width="9%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">TTD Peninjau Akhir</td>
    </tr>
    <tr>
      <td width="2%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td width="17%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Celup Ulang</td>
      <td width="7%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Penyebab</td>
      <td width="7%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Perbaikan</td>
      <td width="7%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Rencana</td>
      <td width="7%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Actual</td>
      <td width="2%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td width="15%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">President Director</td>
      <td rowspan="6" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td rowspan="6" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Cutting Loss</td>
      <td rowspan="5" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td rowspan="5" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td rowspan="4" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td rowspan="5" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td rowspan="5" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Marketing</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Masuk Gudang BB/BS</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Manufacturing Director</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Finishing Ulang / Tarik Lebar</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Q.C.</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Test Laboratorium</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Dept.: </td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="10%" rowspan="4" valign="top">Lembar Warna :</td>
      <td width="10%" height="12">1. Putih/ Asli</td>
      <td width="32%">: Untuk QC</td>
      <td width="10%" rowspan="3" valign="top">Perhatian:</td>
      <td width="38%">1. Bon ini hanya berlaku / dipakai dalam pabrik saja.</td>
    </tr>
    <tr>
      <td>2. Merah</td>
      <td>: Untuk Follow Up</td>
      <td>2. Setiap kerusakan kain harus gunting contoh.</td>
    </tr>
    <tr>
      <td>3. Kuning</td>
      <td>: Untuk Dept. Penyebab NCP</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>4. Hijau </td>
      <td colspan="2"> : Terlampir Pada Kartu Kerja, Untuk Arsip QC Setelah Tinjauan Akhir</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<br>

</body>
</html>
