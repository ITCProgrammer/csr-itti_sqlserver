<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
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
$qry=mysqli_query($con,"SELECT a.langganan, b.* FROM tbl_disposisi_now a
INNER JOIN tbl_detail_retur_now b ON a.id=b.id_nsp
WHERE b.id_disposisi='$_GET[id_nsp]' AND b.po='$_GET[po]' AND b.no_order='$_GET[no_order]'");
$r=mysqli_fetch_array($qry);
$qry1=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now WHERE id_disposisi='$_GET[id_nsp]' LIMIT 1");
$r1=mysqli_fetch_array($qry1);

$qrybon=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now WHERE id='$_GET[id_cek]' LIMIT 1");
$rbon=mysqli_fetch_array($qrybon);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Retur</title>
<script>
// set portrait orientation

jsPrintSetup.setOption('orientation', jsPrintSetup.kPortraitOrientation);

// set top margins in millimeters
jsPrintSetup.setOption('marginTop', 0);
jsPrintSetup.setOption('marginBottom', 0);
jsPrintSetup.setOption('marginLeft', 0);
jsPrintSetup.setOption('marginRight', 0);

// set page header
jsPrintSetup.setOption('headerStrLeft', '');
jsPrintSetup.setOption('headerStrCenter', '');
jsPrintSetup.setOption('headerStrRight', '');

// set empty page footer
jsPrintSetup.setOption('footerStrLeft', '');
jsPrintSetup.setOption('footerStrCenter', '');
jsPrintSetup.setOption('footerStrRight', '');

// clears user preferences always silent print value
// to enable using 'printSilent' option
jsPrintSetup.clearSilentPrint();

// Suppress print dialog (for this context only)
jsPrintSetup.setOption('printSilent', 1);

// Do Print 
// When print is submitted it is executed asynchronous and
// script flow continues after print independently of completetion of print process! 
jsPrintSetup.print();

window.addEventListener('load', function () {
    var rotates = document.getElementsByClassName('rotate');
    for (var i = 0; i < rotates.length; i++) {
        rotates[i].style.height = rotates[i].offsetWidth + 'px';
    }
});
// next commands
</script>
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
font-size: 9px;	
font-family:sans-serif, Roman, serif;	
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
<?php 
$nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");	
?>
<body>
<table>
  <thead>
    <tr>
      <td><table border="1" class="table-list1" style="width:7in;"> 
  <tr>
    <td width="10%" align="center"><img src="Indo.jpg" width="50" height="50
		" alt=""/></td>
    <td width="58%" align="center"><font size="+1"><strong>SURAT PENGAMBILAN BARANG RETUR<br />PT. INDO TAICHEN TEXTILE INDUSTRY<br /></font>
    <?php echo $rbon['no_retur'];?>
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
	border-right:0px #000000 solid;">20 November 2020</td>
        </tr>
      </tbody>
    </table></td>
    </tr>
  </table>

		</td>
    </tr>
	</thead>
	
    <tr>
      <td><table border="0" class="table-list1" style="width:7in; height:0.7in;">
        <tbody>
            <tr>
                <td width="100%" align="left" valign="top">No. PO : <span style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php echo $r['po']; ?></span></td>
            </tr>
            <tr>
                <td width="100%" align="left" valign="top">No. Order : <span style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php echo $r['no_order'];?></span></td>
            </tr>
            <tr>
                <td width="100%" align="left" valign="top">Nama Langganan : <span style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php echo $r['langganan'];?></span></td>
            </tr>
           
                <table style="width:7in; height:3.2in;" border="0" class="table-list1">
                    <tr>
                        <td width="14%" rowspan="2" align="center">Masalah</td>
                        <td width="40%" rowspan="2" align="center">Jenis Kain</td>
                        <td width="10%" rowspan="2" align="center">Warna</td>
                        <td width="5%" rowspan="2" align="center">Lot</td>
                        <td width="8%" colspan="2" align="center">SJ Retur Pelanggan</td>
                        <td width="10%" rowspan="2" align="center">Tgl Terima SJ Retur</td>
                        <td width="10%" colspan="2" align="center">Surat Jalan ITTI</td>
                        <td width="20%" colspan="3" align="center">Quantity</td>
                    </tr>
                    <tr>
                        <td width="3%" align="center">No</td>
                        <td width="3%"  align="center">Tanggal</td>
                        <td width="3%"  align="center">No</td>
                        <td width="3%"  align="center">Tanggal</td>
                        <td width="3%"  align="center">Roll</td>
                        <td width="3%"  align="center">Kg</td>
                        <td width="3%"  align="center"><?php echo $r['satuan']; ?></td>
                    </tr>
                    <?php
                    if($_GET['id_cek']!=""){
                    $qry1=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now
                    WHERE id='$_GET[id_cek]'");
                    $cek=mysqli_num_rows($qry1); 
                    $row=mysqli_fetch_array($qry1);
                    }
                    if($_GET['id_cek1']!=""){
                    $qry2=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now
                    WHERE id='$_GET[id_cek1]'");
                    $cek2=mysqli_num_rows($qry2); 
                    $row1=mysqli_fetch_array($qry2);
                    }
                    if($_GET['id_cek2']!=""){
                    $qry3=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now
                    WHERE id='$_GET[id_cek2]'");
                    $cek3=mysqli_num_rows($qry3); 
                    $row2=mysqli_fetch_array($qry3);
                    }
                    ?>
                    <?php if($cek!=0){?>
                    <tr>
                        <td align="left"><?php echo $row['masalah'];?> <?php if($row['t_jawab']!="" AND $row['t_jawab1']!="" AND $row['t_jawab2']!=""){echo "(".$row['t_jawab'].",".$row['t_jawab1'].",".$row['t_jawab2'].")";}else if($row['t_jawab']!="" AND $row['t_jawab1']!=""){echo "(".$row['t_jawab'].",".$row['t_jawab1'].")";}else if($row['t_jawab']!=""){echo "(".$row['t_jawab'].")";}?></td>
                        <td align="left" style="font-size:8px;"><?php echo substr($row['jenis_kain'],0,45);?></td>
                        <td align="center" style="font-size:8px;"><?php echo $row['warna'];?></td>
                        <td align="center"><?php echo $row['lot'];?></td>
                        <td align="center"><?php echo $row['sjreturplg'];?></td>
                        <td align="center"><?php echo $row['tgl_sjretur'];?></td>
                        <td align="center"><?php echo $row['tgltrm_sjretur'];?></td>
                        <td align="center"><?php echo $row['sj_itti'];?></td>
                        <td align="center"><?php echo $row['tgl_sjitti'];?></td>
                        <td align="center"><?php echo $row['roll'];?></td>
                        <td align="center"><?php echo $row['kg'];?></td>
                        <td align="center"><?php echo $row['pjg'];?></td>
                    </tr>
                    <?php }else{ ?>
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
                    <?php } ?>
                    <?php if($cek2!=0){?>
                    <tr>
                        <td align="left"><?php echo $row1['masalah'];?> <?php if($row1['t_jawab']!="" AND $row1['t_jawab1']!="" AND $row1['t_jawab2']!=""){echo "(".$row1['t_jawab'].",".$row1['t_jawab1'].",".$row1['t_jawab2'].")";}else if($row1['t_jawab']!="" AND $row1['t_jawab1']!=""){echo "(".$row1['t_jawab'].",".$row1['t_jawab1'].")";}else if($row1['t_jawab']!=""){echo "(".$row1['t_jawab'].")";}?></td>
                        <td align="left" style="font-size:8px;"><?php echo $row1['jenis_kain'];?></td>
                        <td align="center" style="font-size:8px;"><?php echo $row1['warna'];?></td>
                        <td align="center"><?php echo $row1['lot'];?></td>
                        <td align="center"><?php echo $row1['sjreturplg'];?></td>
                        <td align="center"><?php echo $row1['tgl_sjretur'];?></td>
                        <td align="center"><?php echo $row1['tgltrm_sjretur'];?></td>
                        <td align="center"><?php echo $row1['sj_itti'];?></td>
                        <td align="center"><?php echo $row1['tgl_sjitti'];?></td>
                        <td align="center"><?php echo $row1['roll'];?></td>
                        <td align="center"><?php echo $row1['kg'];?></td>
                        <td align="center"><?php echo $row1['pjg'];?></td>
                    </tr>
                    <?php }else{ ?>
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
                    <?php } ?>
                    <?php if($cek3!=0){?>
                    <tr>
                        <td align="left"><?php echo $row2['masalah'];?> <?php if($row2['t_jawab']!="" AND $row2['t_jawab1']!="" AND $row2['t_jawab2']!=""){echo "(".$row2['t_jawab'].",".$row2['t_jawab1'].",".$row2['t_jawab2'].")";}else if($row2['t_jawab']!="" AND $row2['t_jawab1']!=""){echo "(".$row2['t_jawab'].",".$row2['t_jawab1'].")";}else if($row2['t_jawab']!=""){echo "(".$row2['t_jawab'].")";}?></td>
                        <td align="left" style="font-size:8px;"><?php echo $row2['jenis_kain'];?></td>
                        <td align="center" style="font-size:8px;"><?php echo $row2['warna'];?></td>
                        <td align="center"><?php echo $row2['lot'];?></td>
                        <td align="center"><?php echo $row2['sjreturplg'];?></td>
                        <td align="center"><?php echo $row2['tgl_sjretur'];?></td>
                        <td align="center"><?php echo $row2['tgltrm_sjretur'];?></td>
                        <td align="center"><?php echo $row2['sj_itti'];?></td>
                        <td align="center"><?php echo $row2['tgl_sjitti'];?></td>
                        <td align="center"><?php echo $row2['roll'];?></td>
                        <td align="center"><?php echo $row2['kg'];?></td>
                        <td align="center"><?php echo $row2['pjg'];?></td>
                    </tr>
                    <?php }else{ ?>
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
                    <?php } ?>
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
                                <?php
                                $qry4=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now 
                                WHERE id='$_GET[id_cek]'");
                                $row4=mysqli_fetch_array($qry4);
                                $qry5=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now 
                                WHERE id='$_GET[id_cek1]'");
                                $row5=mysqli_fetch_array($qry5);
                                $qry6=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now 
                                WHERE id='$_GET[id_cek2]'");
                                $row6=mysqli_fetch_array($qry6);
                                ?>
                                <tr>
                                <td width="14%" align="left" valign="top" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><?php if($row4['ket']!=""){echo "1. ".$row4['ket']." ".$row4['tgl_keputusan'];} ?></td>
                                </tr>
                                <tr>
                                <td width="14%" align="left" valign="top" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><?php if($row5['ket']!=""){echo "2. ".$row5['ket']." ".$row5['tgl_keputusan'];} ?></td>
                                </tr>
                                <td width="14%" align="left" valign="top" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><?php if($row6['ket']!=""){echo "3. ".$row6['ket']." ".$row6['tgl_keputusan'];} ?></td>
                                </tr>
                            </tbody>
                        </table></td>
                    </tr>
                </table>
            
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table style="width:7in" border="0" class="table-list1">
        <tr align="center">
          <td width="14%" >&nbsp;</td>
          <td width="12%" >Dibuat :</td>
          <td width="12%" >Diterima :</td>
          <td width="17%" >Diperiksa :</td>
          <td width="40%" colspan="3" >Mengetahui :</td>
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
          <td align="center"><?php echo date("d-m-y", strtotime($rTgl['tgl_skrg']));?></td>
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
          <td align="center">QCF Manager</td>
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
      <td><table style="width:7in" border="0" >
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
//alert('cetak');window.print();
</script> 
</body>
</html>