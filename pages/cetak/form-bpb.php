<?php
ini_set("error_reporting", 1);
session_start();
$con=mysqli_connect("10.0.1.91","dit","4dm1n","dbknitt");
require_once('dompdf/dompdf_config.inc.php');
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
?>
<?php 
$qry=mysqli_query($con,"SELECT a.*,b.kd_benang,b.jns_benang,b.merek,c.no_po,now() as tgl FROM tbl_bon a
INNER JOIN tbl_permohonan_detail b ON a.id_mohon_detail=b.id
INNER JOIN tbl_permohonan c ON b.id_mohon=c.id
WHERE a.id='$_GET[id]'");
$r=mysqli_fetch_array($qry);	

$qry1=mysqli_query($con,"SELECT * FROM tbl_realisasi_benang WHERE id_bon='$_GET[id]'");
$i=0;
while($r1=mysqli_fetch_array($qry1)){
	$lokasi[$i]=$r1['lokasi'];
	$qty[$i]=$r1['qty']."".$r1['satuan'];
	$kg[$i]=$r1['kg'];
	$produksi[$i]=$r1['tgl_produksi'];
	$masuk[$i]=$r1['tgl_masuk'];
	$i++;
}
if($produksi[0]!="0000-00-00"){$tglPro=$produksi[0];}else{$tglPro="-";}
$qry2=mysqli_query($con,"SELECT * FROM tbl_realisasi WHERE id_bon='$_GET[id]'");
$r2=mysqli_fetch_array($qry2);
?>
<?php
  $html ='<html>
<head>
<title>:: Form BPB</title>
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<style>
html{margin:2px auto 2px;}
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
<table width="100%" border="0" class="table-list2">
          <thead>
            <tr>
              <td width="8%" rowspan="3" align="center" style="padding: 0px 1px;"><img src="../../dist/img/Indo.jpg" alt="" width="40" height="40"></td>
              <td width="72%" rowspan="3" align="center" valign="top" style="padding: 0px 1px;"><strong>BON PERMOHONAN BENANG<br>
              Dept : '.$r2['tujuan'].'<br>
              No. : '.$r['no_bon'].'</strong></td>
              <td width="8%" style="font-size: 9px; padding: 0px 1px; border-right:0px #000000 solid; border-bottom:0px #000000 solid;">No. Form</td>
              <td width="12%" style="font-size: 9px; padding: 0px 1px; border-bottom:0px #000000 solid; border-left:0px #000000 solid;">: 19-17</td>
            </tr>
            <tr>
              <td style="font-size: 9px; padding: 0px 1px; border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-right:0px #000000 solid;">No. Revisi</td>
              <td style="font-size: 9px; padding: 0px 1px; border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid;">: 01</td>
            </tr>
            <tr>
              <td style="font-size: 9px; padding: 0px 1px; border-top:0px #000000 solid; border-right:0px #000000 solid;">Tgl. Terbit</td>
              <td style="font-size: 9px; padding: 0px 1px;border-top:0px #000000 solid; border-left:0px #000000 solid;">: 10 Juli 2018</td>
            </tr>
          <thead>
</table>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="16%" style="font-size: 11px; padding: 0px 0px;">Tanggal</td>
      <td width="34%" style="font-size: 11px; padding: 0px 0pxx;">: '.date('d F Y', strtotime($r['tgl_terima_gdb'])).'</td>
      <td width="18%" style="font-size: 11px; padding: 0px 0px;">Jam Terima Bon</td>
      <td width="32%" style="font-size: 11px; padding: 0px 0px;">: '.date('H:i:s', strtotime($r['tgl_terima_gdb'])).'</td>
    </tr>
    <tr>
      <td style="font-size: 11px; padding: 0px 0px;">PO</td>
      <td style="font-size: 11px; padding: 0px 0px;">: '.$r['no_po'].'</td>
      <td style="font-size: 11px; padding: 0px 0px;">Permintaan Tgl. Kirim</td>
      <td style="font-size: 11px; padding: 0px 0px;">: '.date('d M Y', strtotime($r['tgl_delivery_awal'])).' s/d '.date('d M Y', strtotime($r['tgl_delivery_akhir'])).'</td>
    </tr>
  </tbody>
</table>

<table width="100%" border="0" class="table-list2">
  <tbody>
    <tr>
      <td width="8%" align="center">Code Benang</td>
      <td width="17%" align="center">Jenis Benang</td>
      <td width="15%" align="center">Supplier</td>
      <td width="10%" align="center">Lot</td>
      <td width="6%" align="center">D/K/P/C</td>
      <td width="8%" align="center">KG</td>
      <td width="7%" align="center">Lokasi</td>
      <td width="7%" align="center">D/K/P/C</td>
      <td width="8%" align="center">KG</td>
      <td width="7%" align="center">Tgl. Produksi</td>
      <td width="7%" align="center">Tgl. Masuk</td>
    </tr>
    <tr>
      <td align="center" style="font-size: 9px;">'.$r['kd_benang'].'&nbsp;</td>
      <td style="font-size: 9px;">'.$r['jns_benang'].'</td>
      <td style="font-size: 9px;">'.$r['merek'].'</td>
      <td style="font-size: 9px;">'.$r['lot'].'</td>
      <td align="center" style="font-size: 9px;">'.$r['cns'].' '.$r['satuan'].'</td>
      <td align="center" style="font-size: 9px;">'.$r['qty'].'</td>
      <td align="center" style="font-size: 9px;">'.$lokasi[0].'</td>
      <td align="center" style="font-size: 9px;">'.$qty[0].'</td>
      <td align="center" style="font-size: 9px;">'.$kg[0].'</td>
      <td align="center" style="font-size: 9px;">'.$tglPro.'</td>
      <td align="center" style="font-size: 9px;">'.$masuk[0].'</td>
    </tr>';
	$qry31=mysqli_query($con,"SELECT a.* FROM tbl_realisasi_benang a
INNER JOIN (SELECT @num:=@num+1 AS urut,id FROM tbl_realisasi_benang,
(SELECT @num := 0) T WHERE id_bon='$_GET[id]') b ON a.id=b.id
WHERE b.urut> 1");
	$jrow1=mysqli_num_rows($qry1);
while($r31=mysqli_fetch_array($qry31)){
	if($r31['tgl_produksi']=="0000-00-00"){$tglPro1="-";}else{$tglPro1=$r31['tgl_produksi'];}
    $html .='<tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center" style="font-size: 9px;">'.$r31['lokasi'].'</td>
      <td align="center" style="font-size: 9px;">'.$r31['qty'].''.$r31['satuan'].'</td>
      <td align="center" style="font-size: 9px;">'.$r31['kg'].'</td>
      <td align="center" style="font-size: 9px;">'.$tglPro1.'</td>
      <td align="center" style="font-size: 9px;">'.$r31['tgl_masuk'].'</td>
    </tr>';
	  }
if($jrow1==3){$list1=1;} if($jrow1==2){$list1=2;} if($jrow1==1){$list1=3;}if($jrow1==0){$list1=3;}
  for($i=0;$i<$list1;$i++){
	  $html .='<tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center" style="font-size: 9px;">&nbsp;</td>
      <td align="center" style="font-size: 9px;">&nbsp;</td>
      <td align="center" style="font-size: 9px;">&nbsp;</td>
      <td align="center" style="font-size: 9px;">&nbsp;</td>
      <td align="center" style="font-size: 9px;">&nbsp;</td>
    </tr>';
  }
    $html .='
    <tr>
      <td colspan="11" valign="top" style="height: 0.2in;">Keterangan : '.$r['ket'].'</td>
    </tr>
  </tbody>
</table>

<table width="100%" border="0" class="table-list2">
  <tbody>
    <tr>
      <td colspan="2" align="center" valign="middle" style="padding: 0px 1px;">Permintaan</td>
      <td width="7%" rowspan="2" align="center" valign="middle">Lot</td>
      <td width="9%" rowspan="2" align="center" valign="middle">D/K/P/C</td>
      <td width="9%" rowspan="2" align="center" valign="middle">KG</td>
      <td width="11%" rowspan="2" align="center" valign="middle">Lokasi</td>
      <td width="16%" rowspan="2" align="center" valign="middle">Tgl. Masuk</td>
      <td width="18%" rowspan="2" align="center" valign="middle">Tgl. Produksi</td>
      <td width="13%" rowspan="2" align="center" valign="middle">Petugas</td>
    </tr>
    <tr valign="middle">
      <td width="9%" align="center" style="padding: 0px 1px;">Tgl.</td>
      <td width="8%" align="center" style="padding: 0px 1px;">Ke-</td>
  </tr>';
	$qry3=mysqli_query($con,"SELECT * FROM tbl_realisasi WHERE id_bon='$_GET[id]'");
	$jrow=mysqli_num_rows($qry3);
while($r3=mysqli_fetch_array($qry3)){
	if($r3['tgl_produksi']=="0000-00-00" or $r3['tgl_produksi']=="1970-01-01"){$tglPro2="-"; }else{$tglPro2=$r3['tgl_produksi'];}
    $html .='<tr>
      <td align="center" style="font-size: 9px;">'.$r3['tgl_kirim'].'</td>
      <td align="center" style="font-size: 9px;">'.$r3['ke'].'</td>
      <td align="center" style="font-size: 9px;">'.$r3['lot'].'</td>
      <td align="center" style="font-size: 9px;">'.$r3['qty1'].' '.$r3['satuan'].'</td>
      <td align="center" style="font-size: 9px;">'.$r3['qty'].'</td>
      <td align="center" style="font-size: 9px;">'.$r3['lokasi'].'</td>
      <td align="center" style="font-size: 9px;">'.$r3['tgl_masuk'].'</td>
      <td align="center" style="font-size: 9px;">'.$tglPro2.'</td>
      <td align="center" style="font-size: 9px;">'.$r3['petugas'].'</td>
    </tr>';
	$totP=number_format($totP+$r3['qty'],'2','.',''); $totPQ=$totPQ+$r3['qty1'];
	$satuan=$r3['satuan'];
}
if($jrow==4){$list=1;} if($jrow==3){$list=2;} if($jrow==2){$list=3;} if($jrow==1){$list=4;}if($jrow==0){$list=5;}
  for($i=0;$i<$list;$i++){
    $html .='<tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>';
	}
    $html .='<tr>
      <td colspan="3">Total Pengiriman</td>
      <td align="center" style="font-size: 9px;">'.$totPQ.' '.$satuan.'</td>
      <td align="center" style="font-size: 9px;">'.$totP.'</td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9" valign="top" style="height: 0.2in; font-size: 9px;">Keterangan : '.$r2['ket'].'</td>
    </tr>
  </tbody>
</table>

<table width="100%" border="0" class="table-list2">
  <tbody>
    <tr>
      <td width="20%" style="padding: 0px 1px;">&nbsp;</td>
      <td width="16%" align="center" style="padding: 0px 1px;">Dibuat Oleh :</td>
      <td width="16%" align="center" style="padding: 0px 1px;">Diketahui Oleh :</td>
      <td width="16%" align="center" style="padding: 0px 1px;">Dikirim Oleh :</td>
      <td width="16%" align="center" style="padding: 0px 1px;">Diterima Oleh :</td>
      <td width="16%" align="center" style="padding: 0px 1px;">Diketahui Oleh :</td>
    </tr>
    <tr>
      <td style="padding: 0px 1px;">Nama</td>
      <td style="padding: 0px 1px; font-size: 10px;" align="center">'.ucwords($r['userid']).'</td>
      <td style="padding: 0px 1px; font-size: 10px;" align="center">'.ucwords($r['userid_rmp']).'</td>
      <td style="padding: 0px 1px;">&nbsp;</td>
      <td style="padding: 0px 1px;">&nbsp;</td>
      <td style="padding: 0px 1px;">&nbsp;</td>
    </tr>
    <tr>
      <td style="padding: 0px 1px;">Departemen</td>
      <td align="center" style="padding: 0px 1px;"><strong>'.$r2['tujuan'].'</strong></td>
      <td align="center" style="padding: 0px 1px;"><strong>RMP</strong></td>
      <td align="center" style="padding: 0px 1px;"><strong>GDB</strong></td>
      <td style="padding: 0px 1px;">&nbsp;</td>
      <td align="center" style="padding: 0px 1px;"><strong>GDB</strong></td>
    </tr>
    <tr>
      <td style="height: 0.4in;">Tanda Tangan</td>
      <td align="center">';
	  if($r['userid']!=""){
	  $html .= '<img src="ttd/'.strtolower($r['userid']).'.jpg" width="40" height="40" alt=""/>';
  }else { $html .='&nbsp;';}
  $html .='</td>
      <td align="center">';
  if($r['userid_rmp']!=""){
	  $html .= '<img src="ttd/'.strtolower($r['userid_rmp']).'.jpg" width="40" height="40" alt=""/>';
  }else { $html .='&nbsp;';}
  $html .='</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
Keterangan :
<br>
*) D/K/P/C = Dus/Karung/Palet/Cones<br>
**) Kolom keterangan pada bagian atas diisi oleh departemen user apabila ada permintaan, contoh: steam, ambil return, dll.
</body>
</html>';


  $dompdf = new dompdf();
  $dompdf->load_html($html); //biar bisa terbaca htmlnya
  $dompdf->set_Paper('letter','portrait'); //portrait, landscape
  $dompdf->render();
  $dompdf->stream('FormBPB'.$r['no_bon'].'.pdf', array("Attachment"=>0)); //untuk pemberian nama
?>
<!--<table width="200" border="0" align="right">
         <tr>
            <td style="font-size: 9px;">No. Form</td>
            <td style="font-size: 9px;">:</td>
            <td style="font-size: 9px;">FW-14-KNT-26</td>
  </tr > 
          <tr>
            <td style="font-size: 9px;">No. Revisi</td>
            <td style="font-size: 9px;">:</td>
            <td style="font-size: 9px;">01</td>
          </tr>
          <tr>
            <td style="font-size: 9px;">Tgl. Terbit</td>
            <td style="font-size: 9px;">:</td>
            <td style="font-size: 9px;">&nbsp;</td>
          </tr>
</table>
<br>
<br>
<br>
<br>
<br>-->
