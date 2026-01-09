<?php
include '../../koneksi.php';
//require_once('dompdf/dompdf_config.inc.php'); autoload.inc.php
require_once('dompdf/autoload.inc.php');

ini_set("error_reporting", 1);	
include "../../tgl_indo.php";
$qry=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf_now WHERE id='".$_GET['id']."'");
$d=mysqli_fetch_array($qry);
$nokk1 = $d['nodemand'];
?>
<?php
  $html ='
<html>
<head>
<title>Form NCP</title>
<style>
body,td,th {
	/* font-family: Courier New, Courier, monospace; */
	font-family: sans-serif, Roman, serif;
	
	font-size: 12px;
}
pre {
	font-family:sans-serif, Roman, serif;
	clear:both;
	margin: 0px auto 0px;
	padding: 0px;
	white-space: pre-wrap;       /* Since CSS 2.1 */
    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
    white-space: -pre-wrap;      /* Opera 4-6 */
    white-space: -o-pre-wrap;    /* Opera 7 */
    word-wrap: break-word; 
	
}
body{
	margin: 0px auto 0px;
	padding: 2px;
	font-size: 8px;
	color: #000;
	width: 98%;
	background-position: top;
	background-color: #fff;
}
</style>
<link href="styles_cetak.css" rel="stylesheet" type="text/css">	
</head>
<body>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td colspan="5" align="center"><font size="+1"><strong>FORMULIR PRODUK TIDAK SESUAI</strong></font></td>
      <td width="17%" rowspan="2" align="center"><table width="100%" border="0">
        <tbody>
          <tr>
            <td>No. Form</td>
            <td>: 04-01</td>
          </tr>
          <tr>
            <td>No. Revisi</td>
            <td>: 07</td>
          </tr>
          <tr>
            <td>Tgl. Terbit</td>
            <td>: 17 Juni 2021</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="5" align="center"><font size="-1"><strong>No. NCP: '.$d['no_ncp_gabungan'].'</strong></font></td>
    </tr>
    <tr>
      <td colspan="2" align="left">TANGGAL: '.tanggal_indo ($d['tgl_buat'],true).'</td>
      <td colspan="4" align="right">&nbsp;</td>
    </tr>
    <tr>
      <td width="14%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">PELANGGAN</td>
      <td width="35%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">'.$d['langganan']."/".$d['buyer'].'</td>
      <td width="10%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">ROLL</td>
      <td width="19%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">'.$d['rol'].'</td>
      <td width="5%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">WEIGHT</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">'.$d['berat'].' kg</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">PO</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">'.$d['po'].'</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">LOT NO.</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">'.$d['lot'].'</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">BATCH</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">'.$nokk1.'</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">ORDER</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">'.$d['no_order'].'</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">PO RAJUT</td>
      <td colspan="3" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">'.$d['po_rajut'].'</td>
    </tr>
    <tr>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">JENIS KAIN</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">'.$d['no_hanger'].'/'.$d['jenis_kain'].'</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">NO. WARNA/WARNA</td>
      <td colspan="3" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">'.$d['no_warna'].'/'.$d['warna'].'</td>
    </tr>
    <tr valign="top">
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;height: 0.4in;">KERUSAKAN YANG TERJADI</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">'.$d['masalah'].'</td>
      <td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">TTD Peninjau Awal</td>
      <td colspan="3" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
    </tr>
  </tbody>
</table>

<table width="100%" border="0">
  <tbody>
    <tr valign="top">
      <td width="11%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;height: 0.3in;">Tempat Kain Diletakan </td>
      <td width="8%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td width="21%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Tgl Kembali NCP ke QCF :</td>
      <td width="20%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Tgl Serah terima ke PPC :</td>
      <td width="40%" style="border-top:1px #000000 solid; 
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
      <td colspan="2" rowspan="2" align="center" style="border-top:1px #000000 solid; 
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
      <td width="18%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Catatan Verifikator (Jika Ada) </td>
      <td width="9%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">TTD Peninjau</td>
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
      <td width="6%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Penyebab</td>
      <td width="7%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Perbaikan</td>
      <td width="8%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Rencana</td>
      <td width="6%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Actual</td>
      <td width="2%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
      <td width="13%" style="border-top:1px #000000 solid; 
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
      <td colspan="2" rowspan="4" style="border-top:1px #000000 solid; 
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
      <td width="4%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Dept.</td>
      <td width="8%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">:'.$d['nsp'].'</td>
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
      <td width="8%" rowspan="4" valign="top">Lembar Warna :</td>
      <td width="7%">1. Putih/ Asli</td>
      <td width="37%">: Untuk QC</td>
      <td width="10%" rowspan="3" valign="top">Perhatian:</td>
      <td width="38%">1. Bon ini hanya berlaku / dipakai dalam pabrik saja.</td>
    </tr>
    <tr>
      <td>2. Kuning</td>
      <td>: Untuk Dept. Penyebab NCP</td>
      <td>2. Setiap kerusakan kain harus gunting contoh.</td>
    </tr>
    <tr>
      <td>3. Hijau</td>
      <td>: Terlampir Pada Kartu Kerja, Untuk Arsip QC Setelah Tinjauan Akhir</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<br>

</body>
</html>';

use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4','landscape'); //portrait, landscape
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream('form-NCP'.'.pdf', array("Attachment"=>0));
?>
