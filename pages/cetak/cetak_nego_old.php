<?php
ini_set("error_reporting", 1);
session_start();
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$GShift=$_GET['shft'];
$Subdept=$_GET['subdept'];
$TotalKirim=$_GET['total'];
$TotalLot=$_GET['total_lot'];
$Langganan=$_GET['langganan'];
$Nego1=$_GET['nego'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Nego Aftersales</title>
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
<table width="100%">
  <thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1"> 
  <tr>
    <td align="center"><strong><font size="+1">LAPORAN KELUHAN PELANGGAN EKSTERNAL &quot;DISPOSISI NEGO AFTERSALES&quot;</font><br />
		<font size="-1">Periode: <?php echo date("d/m/Y", strtotime($Awal));?> s/d <?php echo date("d/m/Y", strtotime($Akhir));?></font>
          <br />
    </strong></td>
    </tr>
  </table>

		</td>
    </tr>
	</thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1">
        <thead>
          <tr align="center">
			      <td><font size="-2"><strong>NO</strong></font></td>
            <td><font size="-2"><strong>LANGGANAN</strong></font></td>
            <td><font size="-2"><strong>ORDER</strong></font></td>
            <td><font size="-2"><strong>JENIS KAIN</strong></font></td>
            <td><font size="-2"><strong>LEBAR &amp; GRAMASI</strong></font></td>
            <td><font size="-2"><strong>LOT</strong></font></td>
            <td><font size="-2"><strong>WARNA</strong></font></td>
            <td><font size="-2"><strong>QTY KIRIM</strong></font></td>
            <td><font size="-2"><strong>QTY KELUHAN</strong></font></td>
            <td><font size="-2"><strong>MASALAH</strong></font></td>
            <td><font size="-2"><strong>SOLUSI</strong></font></td>
            <td><font size="-2"><strong>NAMA PEJABAT</strong></font></td>
            <td><font size="-2"><strong>HASIL NEGOSIASI</strong></font></td>
            <td><font size="-2"><strong>KETERANGAN</strong></font></td>
            <td><font size="-2"><strong>&nbsp;</strong></font></td>
          </tr>
		</thead>
		<tbody>  
		<?php
	$no=1;
	//$Awal=$_GET['awal'];
  //$Akhir=$_GET['akhir'];
  //$GShift=$_GET['shft'];
  if($_GET['awal']!=""){ $Where =" AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]' AND nama_nego!='' "; }
  if($_GET['shft']=="ALL" or $_GET['shft']==""){ $shft=" ";}else{$shft=" AND shift LIKE '$_GET[shft]' OR shift2 LIKE '$_GET[shft]' ";}
  if($_GET['subdept']!=""){ $subdpt=" AND subdept='$_GET[subdept]' "; }
  if($_GET['nego']=="1"){ $nego =" AND sts_nego='1' "; }else{$nego = " ";}
  //if($_GET['langganan']!=""){ $lgn =" AND langganan LIKE '%$_GET[langganan]%' "; }else{$lgn = " ";}
  //$qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now $Where $shft $subdpt $nego $lgn ORDER BY nama_nego ASC");
  if($Awal!="" or $GShift!="" or $Subdept!="" or $Nego1=="1" or $Langganan!=""){
    $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE langganan LIKE '%$_GET[langganan]%' $Where $nego $shft $subdpt ORDER BY pejabat,personil ASC");
    }else{
    $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE langganan LIKE '$_GET[langganan]' $Where $nego $shft $subdpt ORDER BY pejabat,personil ASC");
    }
  $tkirim=0;
  $tclaim=0;
			while($row1=mysqli_fetch_array($qry1)){
				if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){ $tjawab=$row1['t_jawab'].",".$row1['t_jawab1'].", ".$row1['t_jawab2'];
				}else if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']==""){
				$tjawab=$row1['t_jawab'].",".$row1['t_jawab1'];	
				}else if($row1['t_jawab']!="" and $row1['t_jawab1']=="" and $row1['t_jawab2']!=""){
				$tjawab=$row1['t_jawab'].",".$row1['t_jawab2'];	
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){
				$tjawab=$row1['t_jawab1'].",".$row1['t_jawab2'];	
				}else if($row1['t_jawab']!="" and $row1['t_jawab1']=="" and $row1['t_jawab2']==""){
				$tjawab=$row1['t_jawab'];
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']!="" and $row1['t_jawab2']==""){
				$tjawab=$row1['t_jawab1'];
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']=="" and $row1['t_jawab2']!=""){
				$tjawab=$row1['t_jawab2'];	
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']=="" and $row1['t_jawab2']==""){
				$tjawab="";	
				}
		 ?>
          <tr valign="top">
            <td align="center"><font size="-2"><?php echo $no; ?></font></td>
            <td><font size="-2"><?php echo strtoupper($row1['langganan']);?></font></td>
            <td align="center"><font size="-2"><?php echo strtoupper($row1['no_order']);?></font></td>
            <td><font size="-2"><?php echo strtoupper($row1['jenis_kain']);?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['lebar']."x".$row1['gramasi'];?></font></td>
            <td align="center"><font size="-2"><?php echo strtoupper($row1['lot']);?></font></td>
            <td align="center"><font size="-2"><?php echo strtoupper($row1['warna']);?></font></td>
            <td align="right"><font size="-2"><?php echo strtoupper($row1['qty_kirim']);?></font></td>
            <td align="right"><font size="-2"><?php echo strtoupper($row1['qty_claim']);?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['masalah'];?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['solusi'];?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['nama_nego'];?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['hasil_nego'];?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['ket'];?></font></td>
            <td valign="top"><font size="-2"><?php if($row1['sts_check']=="Ceklis"){echo "&#10004";}else{echo "X";}?></font></td>
          </tr>
		<?php	$no++; 
				$tkirim=$tkirim+$row1['qty_kirim'];
				$tclaim=$tclaim+$row1['qty_claim'];
			} ?>	
          <tr valign="top">
            <td colspan="7" align="right"><strong>TOTAL</strong></td>
            <td align="right"><strong><?php echo $tkirim;?></strong></td>
            <td align="right"><strong><?php echo $tclaim;?></strong></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
			
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" class="table-list1">
        <tr>
          <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="45%"><strong>DETAIL HASIL NEGOSIASI</strong></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;"><table width="100%">
        <tr>
          <td style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" valign="top"><table width="100%" border="1" class="table-list1">
            <tr>
                <td align="center" width="15%" rowspan="3"><strong>Nama</strong></td>
                <td align="center" width="5%" rowspan="3"><strong>Qty Keluhan</strong></td>
                <td align="center" width="5%" rowspan="3"><strong>% (Qty Keluhan)</strong></td>
                <td align="center" width="10%" rowspan="3"><strong>Total Kasus</strong></td>
                <td align="center" width="5%" rowspan="3"><strong>% (Total Kasus)</strong></td>
                <td align="center" width="10%" colspan="12"><strong>SOLUSI</strong></td>
            </tr>
            <tr>
                <td align="center" width="10%" colspan="2"><strong>OK (NEGOSIASI)</strong></td>
                <td align="center" width="10%" colspan="2"><strong>RETUR</strong></td>
                <td align="center" width="10%" colspan="2"><strong>CUTTING LOSS (GANTI KAIN)</strong></td>
                <td align="center" width="10%" colspan="2"><strong>PERBAIKAN GARMENT</strong></td>
                <td align="center" width="10%" colspan="2"><strong>LETTER OF GUARANTEE (LG)</strong></td>
                <td align="center" width="10%" colspan="2"><strong>DEBIT NOTE</strong></td>
            </tr>
                <td align="center"><strong>LOT</strong></td>
                <td align="center"><strong>KG</strong></td>
                <td align="center"><strong>LOT</strong></td>
                <td align="center"><strong>KG</strong></td>
                <td align="center"><strong>LOT</strong></td>
                <td align="center"><strong>KG</strong></td>
                <td align="center"><strong>LOT</strong></td>
                <td align="center"><strong>KG</strong></td>
                <td align="center"><strong>LOT</strong></td>
                <td align="center"><strong>KG</strong></td>
                <td align="center"><strong>LOT</strong></td>
                <td align="center"><strong>KG</strong></td>
            <tr>
            </tr>
            <tr>
              <?php
              if($_GET['langganan']!=""){ $lgn =" AND langganan LIKE '%$_GET[langganan]%' "; }else{$lgn = " ";}
              $qry1=mysqli_query($con,"SELECT nama_nego FROM tbl_aftersales_now WHERE
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
              AND '$Akhir' AND sts_nego='1' $lgn GROUP BY nama_nego"); 
              $tot_a=0;
              while($row1=mysqli_fetch_array($qry1)){
                $qryDQ=mysqli_query($con,"SELECT SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_nego='1' AND nama_nego='$row1[nama_nego]' $lgn");
                $rDQ=mysqli_fetch_array($qryDQ);
                $qryjml=mysqli_query($con,"SELECT COUNT(*) as jml FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_nego='1' AND nama_nego='$row1[nama_nego]' $lgn");
                $rowjml=mysqli_fetch_array($qryjml);
                $qryOK=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_nego='1' AND nama_nego='$row1[nama_nego]' AND solusi='OK (NEGOSIASI)' $lgn");
                $rowOK=mysqli_fetch_array($qryOK);
                $qryR=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_nego='1' AND nama_nego='$row1[nama_nego]' AND solusi='RETUR' $lgn");
                $rowR=mysqli_fetch_array($qryR);
                $qryCut=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_nego='1' AND nama_nego='$row1[nama_nego]' AND solusi='CUTTING LOSS (GANTI KAIN)' $lgn");
                $rowCut=mysqli_fetch_array($qryCut);
                $qryPG=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_nego='1' AND nama_nego='$row1[nama_nego]' AND solusi='PERBAIKAN GARMENT' $lgn");
                $rowPG=mysqli_fetch_array($qryPG);
                $qryLG=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_nego='1' AND nama_nego='$row1[nama_nego]' AND solusi='LETTER OF GUARANTEE (LG)' $lgn");
                $rowLG=mysqli_fetch_array($qryLG);
                $qryDN=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_nego='1' AND nama_nego='$row1[nama_nego]' AND solusi='DEBIT NOTE' $lgn");
                $rowDN=mysqli_fetch_array($qryDN);
              ?>
                <td align="left"><?php echo $row1['nama_nego']?></td>
                <td align="right"><?php echo number_format($rDQ['qty_claim'],2)." Kg";?></td>
                <td align="center"><?php echo number_format(($rDQ['qty_claim']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rowjml['jml']." Kasus"; ?></td>
                <td align="center"><?php echo number_format(($rowjml['jml']/$TotalLot)*100,2)." %";?></td>
                <td align="center"><?php if($rowOK['jml']!='' OR $rowOK['jml']!=NULL){echo $rowOK['jml'];}else{echo "0";} ?></td>
                <td align="right"><?php if($rowOK['qty_claim']!='' OR $rowOK['qty_claim']!=NULL){echo number_format($rowOK['qty_claim'],2)." Kg";} else{echo "0.00 Kg";}?></td>
                <td align="center"><?php if($rowR['jml']!='' OR $rowR['jml']!=NULL){echo $rowR['jml'];}else{echo "0";} ?></td>
                <td align="right"><?php if($rowR['qty_claim']!='' OR $rowR['qty_claim']!=NULL){echo number_format($rowR['qty_claim'],2)." Kg";}else{echo "0.00 Kg";}?></td>
                <td align="center"><?php if($rowCut['jml']!='' OR $rowCut['jml']!=NULL){echo $rowCut['jml'];}else{echo "0";} ?></td>
                <td align="right"><?php if($rowCut['qty_claim']!='' OR $rowCut['qty_claim']!=NULL){echo number_format($rowCut['qty_claim'],2)." Kg";}else{echo "0.00 Kg";}?></td>
                <td align="center"><?php if($rowPG['jml']!='' OR $rowPG['jml']!=NULL){echo $rowPG['jml'];}else{echo "0";} ?></td>
                <td align="right"><?php if($rowPG['qty_claim']!='' OR $rowPG['qty_claim']!=NULL){echo number_format($rowPG['qty_claim'],2)." Kg";}else{echo "0.00 Kg";}?></td>
                <td align="center"><?php if($rowLG['jml']!='' OR $rowLG['jml']!=NULL){echo $rowLG['jml'];}else{echo "0";} ?></td>
                <td align="right"><?php if($rowLG['qty_claim']!='' OR $rowLG['qty_claim']!=NULL){echo number_format($rowLG['qty_claim'],2)." Kg";}else{echo "0.00 Kg";}?></td>
                <td align="center"><?php if($rowDN['jml']!='' OR $rowDN['jml']!=NULL){echo $rowDN['jml'];} ?></td>
                <td align="right"><?php if($rowDN['qty_claim']!='' OR $rowDN['qty_claim']!=NULL){echo number_format($rowDN['qty_claim'],2)." Kg";}else{echo "0.00 Kg";}?></td>
            </tr>
              <?php } ?>
            <tr>
                <td align="left"><strong>Total Kirim</strong></td>
                <td align="left" colspan="16"><strong><?php echo number_format($TotalKirim,2)." Kg"; ?></strong></td>
            </tr>
            <tr>
                <td align="left"><strong>Total Lot Kain</strong></td>
                <td align="left" colspan="16"><strong><?php echo $TotalLot; ?></strong></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>

    <tr>
      <td><table width="100%" border="0" class="table-list1">
      <tr align="center">
        <td>&nbsp;</td>
        <td>Diserahkan Oleh :</td>
        <td>Diketahui Oleh :</td>
        <td> Diketahui Oleh :</td>
      </tr>
      <tr>
        <td>Nama</td>
        <td align="center"><input type=text name=nama placeholder="Ketik disini"></td>
        <td align="center"><input type=text name=nama1 placeholder="Ketik disini"></td>
        <td align="center"><input type=text name=nama1 placeholder="Ketik disini"></td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td align="center"><input type=text name=nama2 placeholder="Ketik disini"></td>
        <td align="center"><input type=text name=nama3 placeholder="Ketik disini"></td>
        <td align="center"><input type=text name=nama1 placeholder="Ketik disini"></td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td align="center">
          <?php echo date("l, d F Y", strtotime($rTgl['tgl_skrg']));?>
        </td>
        <td align="center">
          <?php echo date("l, d F Y", strtotime($rTgl['tgl_skrg']));?>
        </td>
        <td align="center">
          <?php echo date("l, d F Y", strtotime($rTgl['tgl_skrg']));?>
        </td>
      </tr>
      <tr>
        <td height="60" valign="top">Tanda Tangan</td>
        <td>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    </tr>
  
</table>

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>