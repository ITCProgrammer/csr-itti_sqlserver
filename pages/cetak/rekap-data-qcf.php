<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
require_once('dompdf/dompdf_config.inc.php');
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
?>
<?php
  $html ='<html>
<head>
<title>:: Rekap-Data</title>
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
<center><h2>REKAP DATA KARTU KERJA</h2></center>
<table border="0" class="table-list1">
  <thead>
    <tr>
      <td width="0" rowspan="2"><div align="center">No</div></td>
	  <td width="0" rowspan="2"><div align="center">Nokk</div></td>
	  <td width="0" rowspan="2"><div align="center">Qty Order</div></td>
      <td width="0" rowspan="2"><div align="center">Jml Bruto</div></td>
      <td width="0" rowspan="2"><div align="center">IM</div></td>
      <td width="0" rowspan="2"><div align="center">Warna</div></td>
      <td width="0" rowspan="2"><div align="center">Lot</div></td>
      <td width="0" rowspan="2"><div align="center">Tgl Fin</div></td>
      <td width="0" rowspan="2"><div align="center">Tgl Insp</div></td>
      <td width="0" rowspan="2"><div align="center">Tgl Pack</div></td>
      <td width="0" rowspan="2"><div align="center">Tgl Msk</div></td>
      <td width="0" rowspan="2"><div align="center">Roll</div></td>
      <td width="0" rowspan="2"><div align="center">Netto</div></td>
      <td width="0" rowspan="2"><div align="center">Panjang</div></td>
      <td width="0" rowspan="2"><div align="center">Sisa</div></td>
      <td colspan="2"><div align="center"> Fin</div></td>
      <td colspan="2"><div align="center"> Ins</div></td>
      <td colspan="3"><div align="center"> Penyusutan</div></td>
      <td width="0" rowspan="2"><div align="center">Cek Warna</div></td>
      <td width="0" rowspan="2"><div align="center">Masalah</div></td>
      <td colspan="2"><div align="center">Extra</div></td>
      <td width="0" rowspan="2"><div align="center">Ket</div></td>
    </tr>
    <tr>
      <td width="0"><div align="center">L</div></td>
      <td width="0"><div align="center">Grms</div></td>
      <td width="0"><div align="center">L</div></td>
      <td width="0"><div align="center">Grms</div></td>
      <td width="0">P</td>
      <td width="0"><div align="center">L</div></td>
      <td width="0"><div align="center">S</div></td>
      <td width="0"><div align="center">KG</div></td>
      <td width="0"><div align="center">Panjang</div></td>
    </tr>
  </thead>
  <tbody>';
	$no=1; $tyard=0;$tmeter=0;$tpcs=0;$kgmeter=0;$kgyard=0;$kgpcs=0;$smeter=0;$syard=0;$spcs=0;$tnetto=0;$snetto=0;
	$brtmeter=0;$brtyard=0;$brtpcs=0;$xmeter=0;$xyard=0;$xpcs=0;$xnetto=0;
  	$sql=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]'");
	while($r=mysqli_fetch_array($sql)){
	$html .='<tr>
      <td align="center">'.$no.'</td>
	  <td align="center">'.$r['nokk'].'</td>
	  <td align="center">'.$r['berat_order'].'x'.$r['panjang_order'].' '.$r['satuan_order'].'</td>
      <td align="center">'.$r['rol_bruto'].'x'.$r['berat_bruto'].'</td>
      <td align="center">'.$r['no_hanger'].'</td>
      <td align="center">'.$r['warna'].'</td>
      <td align="center">'.$r['lot'].'</td>
      <td align="center">'.$r['tgl_fin'].'</td>
      <td align="center">'.$r['tgl_ins'].'</td>
      <td align="center">'.$r['tgl_pack'].'</td>
      <td align="center">'.$r['tgl_masuk'].'</td>
      <td align="right">'.$r['rol'].'</td>
      <td align="right">'.$r['netto'].'</td>
      <td align="center">'.$r['panjang'].' '.$r['satuan'].'</td>
      <td align="right">'.$r['sisa'].'</td>
      <td align="center">'.$r['lebar_fin'].'</td>
      <td align="center">'.$r['gramasi_fin'].'</td>
      <td align="center">'.$r['lebar_ins'].'</td>
      <td align="center">'.$r['gramasi_ins'].'</td>
      <td align="center">'.$r['susut_p'].'</td>
      <td align="center">'.$r['susut_l'].'</td>
      <td align="center">'.$r['susut_s'].'</td>
      <td>'.$r['cek_warna'].'</td>
      <td>'.$r['masalah'].'</td>
      <td align="right">'.$r['berat_extra'].'</td>
      <td align="right">'.$r['panjang_extra'].'</td>
      <td align="right">'.$r['ket'].'</td>
    </tr>';
    $no++; 
	if($r['satuan']=="Meter"){$tmeter=$tmeter+$r['panjang'];$kgmeter=$kgmeter+$r['netto'];$smeter=$smeter+$r['sisa'];
						   $xmeter=$xmeter+$r['panjang_extra'];$brtmeter=$brtmeter+$r['berat_extra'];}
	if($r['satuan']=="Yard"){$tyard=$tyard+$r['panjang'];$kgyard=$kgyard+$r['netto'];$syard=$syard+$r['sisa'];
						  $xyard=$xyard+$r['panjang_extra'];$brtyard=$brtyard+$r['berat_extra'];}
	if($r['satuan']=="PCS"){$tpcs=$tpcs+$r['panjang'];$kgpcs=$kgpcs+$r['netto'];$spcs=$spcs+$r['sisa'];
						 $xpcs=$xpcs+$r['panjang_extra'];$brtpcs=$brtpcs+$r['berat_extra'];}	
	$tnetto=$kgpcs+$kgyard+$kgmeter;
	$snetto=$spcs+$syard+$smeter;
	$xnetto=$brtpcs+$brtyard+$brtmeter;	
	}
  $html .='</tbody>
  <tfoot>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
	  <td align="right">&nbsp;</td>	
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">Yard</td>
      <td align="right">&nbsp;</td>
      <td align="right">'.$kgyard.'</td>
      <td align="right">'.$tyard.'</td>
      <td align="right">'.$syard.'</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">'.$brtyard.'</td>
      <td align="right">'.$xyard.'</td>
      <td align="right">&nbsp;</td>
	  <td align="right">&nbsp;</td>	
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">Meter</td>
      <td align="right">&nbsp;</td>
      <td align="right">'.$kgmeter.'</td>
      <td align="right">'.$tmeter.'</td>
      <td align="right">'.$smeter.'</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">'.$brtmeter.'</td>
      <td align="right">'.$xmeter.'</td>
      <td align="right">&nbsp;</td>
	  <td align="right">&nbsp;</td>	
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">PCS</td>
      <td align="right">&nbsp;</td>
      <td align="right">'.$kgpcs.'</td>
      <td align="right">'.$tpcs.'</td>
      <td align="right">'.$spcs.'</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">'.$brtpcs.'</td>
      <td align="right">'.$xpcs.'</td>
      <td align="right">&nbsp;</td>
	  <td align="right">&nbsp;</td>	
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">Total</td>
      <td align="right">&nbsp;</td>
      <td align="right">'.$tnetto.'</td>
      <td align="right">&nbsp;</td>
      <td align="right">'.$snetto.'</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">'.$xnetto.'</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
	  <td align="right">&nbsp;</td>
    </tr>
  </tfoot>
</table>
</body>
</html>';


  $dompdf = new dompdf();
  $dompdf->load_html($html); //biar bisa terbaca htmlnya
  $dompdf->set_Paper(array(0, 0, 850, 1300),'landscape'); //portrait, landscape
  $dompdf->render();
  $dompdf->stream('Rekap-Data'.'.pdf', array("Attachment"=>0)); //untuk pemberian nama
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
