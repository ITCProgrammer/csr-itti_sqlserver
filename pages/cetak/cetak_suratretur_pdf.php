<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
require_once('dompdf/dompdf_config.inc.php');
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Awal=$_GET['Awal'];
$Akhir=$_GET['akhir'];
//$Dept=$_GET['dept'];
//$Cancel=$_GET['cancel'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
//$tgl=$rTgl['tgl_skrg'];//tambahan 
//$jam=$rTgl['jam_skrg'];//tambahan
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
$qry=mysqli_query($con,"SELECT a.langganan, b.* FROM tbl_aftersales a
INNER JOIN tbl_detail_retur b ON a.id=b.id_nsp
WHERE b.id_nsp='$_GET[id_nsp]' AND b.po='$_GET[po]' AND b.no_order='$_GET[no_order]'");
$r=mysqli_fetch_array($qry);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$html ='
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Retur</title>	
</head>
<body>
<table>
  <thead>
    <tr>
      <td><table border="1" class="table-list1" style="width:7.9in;"> 
  <tr>
    <td width="10%" align="center"><img src="Indo.jpg" width="50" height="50
		" alt=""/></td>
    <td width="58%" align="center"><font size="+1"><strong>SURAT PENGAMBILAN BARANG RETUR<br />PT. INDO TAICHEN TEXTILE INDUSTRY<br /></font>
    </strong></td>
    <td width="32%" align="center"><table width="100%">
      <tbody>
        <tr>
          <td width="36%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">No Form</td>
          <td width="5%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">:</td>
          <td width="59%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">06-07</td>
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
	border-right:0px #000000 solid;">01</td>
        </tr>
        <tr>
          <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Tgl Revisi</td>
          <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">:</td>
          <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"></td>
        </tr>
      </tbody>
    </table></td>
    </tr>
  </table>

		</td>
    </tr>
	</thead>
	
    <tr>
      <td><table border="0" class="table-list1" style="width:7.9in; height:0.7in;">
        <tbody>
            <tr>
                <td width="100%" align="left" valign="top">No. PO : <span style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">'.$r['po'].'</span></td>
            </tr>
            <tr>
                <td width="100%" align="left" valign="top">No. Order : <span style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">'.$r['no_order'].'.</span></td>
            </tr>
            <tr>
                <td width="100%" align="left" valign="top">Nama Langganan : <span style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">'.$r['langganan'].'</span></td>
            </tr>
           
                <table style="width:7.9in; height:2.5in;" border="0" class="table-list1">
                    <tr>
                        <td width="14%" rowspan="2" align="center">Masalah</td>
                        <td width="20%" rowspan="2" align="center">Jenis Kain</td>
                        <td width="10%" rowspan="2" align="center">Warna</td>
                        <td width="5%" rowspan="2" align="center">Lot</td>
                        <td width="10%" colspan="2" align="center">SJ Retur Pelanggan</td>
                        <td width="10%" rowspan="2" align="center">Tgl Terima SJ Retur</td>
                        <td width="10%" colspan="2" align="center">Surat Jalan ITTI</td>
                        <td width="20%" colspan="3" align="center">Quantity</td>
                    </tr>
                    <tr>
                        <td width="5%" align="center">No</td>
                        <td width="5%"  align="center">Tanggal</td>
                        <td width="5%"  align="center">No</td>
                        <td width="5%"  align="center">Tanggal</td>
                        <td width="5%"  align="center">Roll</td>
                        <td width="5%"  align="center">Kg</td>
                        <td width="5%"  align="center">'.$r['satuan'].'</td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="12" align="left" valign="top">Keterangan : <br />
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="14%" align="left" valign="top" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table></td>
                    </tr>
                </table>
            
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table style="width:7.9in" border="0" class="table-list1">
        <tr align="center">
          <td width="14%" >&nbsp;</td>
          <td width="17%" >Dibuat :</td>
          <td width="17%" >Diterima :</td>
          <td width="17%" >Diperiksa :</td>
          <td colspan="3" >Mengetahui :</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td align="center"><input name="nama5" type="text" placeholder="Ketik" size="12" /></td>
          <td align="center"><input name="nama13" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama3" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama6" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama8" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama10" type="text" placeholder="Ketik" size="10" /></td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td align="center"><input name="nama15" type="text" placeholder="dd-mm-yy" size="10" maxlength="8"/></td>
          <td align="center"><input name="nama1" type="text" placeholder="dd-mm-yy" size="10" maxlength="8"/></td>
          <td align="center"><input name="nama2" type="text" placeholder="dd-mm-yy" size="10" maxlength="8" /></td>
          <td align="center"><input name="nama4" type="text" placeholder="dd-mm-yy" size="10" maxlength="8" /></td>
          <td align="center"><input name="nama7" type="text" placeholder="dd-mm-yy" size="10" maxlength="8" /></td>
          <td align="center"><input name="nama9" type="text" placeholder="dd-mm-yy" size="10" maxlength="8" /></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td align="center"><input name="nama" type="text" placeholder="Ketik" size="12" /></td>
          <td align="center">GKJ</td>
          <td align="center">QCF Asst. Manager</td>
          <td align="center">Sales Assistant</td>
          <td align="center">MKT/PPC Manager</td>
          <td align="center">DMF</td>
        </tr>
        <tr>
          <td valign="top" style="height: 0.5in;" >Tanda Tangan</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table style="width:7.9in" border="0" >
          <tr align="left">
            <td style="font-size: 10px;"><span style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php echo "Keterangan: <br> Putih : Arsip QCF; Merah : MKT ; Hijau : PPC ; Kuning : GKJ";?></td>
          </tr>
        </table></td>
    </tr>
</table>


<script>
</script> 
</body>
</html>';
$dompdf = new dompdf();
$dompdf->load_html($html); //biar bisa terbaca htmlnya
$dompdf->set_Paper(array(0, 0, 750, 500),'portrait'); //portrait, landscape
$dompdf->render();
$dompdf->stream('form-Retur'.'.pdf', array("Attachment"=>0)); //untuk pemberian nama
?>