<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Diposisi-Produksi-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
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
$Disposisipro=$_GET['disposisipro'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<?php 
$nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");	
?>
<body>
<table width="100%" border='1'>
  <tr>
    <th colspan="15" align="center">LAPORAN KELUHAN PELANGGAN EKSTERNAL &quot;DISPOSISI PRODUKSI&quot;</th>
  </tr>
  <tr>
    <th colspan="15" align="center">PERIODE: <?php echo date("d/m/Y", strtotime($Awal));?> S/D <?php echo date("d/m/Y", strtotime($Akhir));?></th>
  </tr>
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
      <td><font size="-2"><strong>PENYEBAB</strong></font></td>
      <td><font size="-2"><strong>PEJABAT</strong></font></td>
      <td><font size="-2"><strong>KETERANGAN</strong></font></td>
      <td><font size="-2"><strong>&nbsp;</strong></font></td>
    </tr>
  </thead>
	<tbody>  
		<?php
	$no=1;
  if($_GET['awal']!=""){ $Where =" AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]' AND pejabat!='' "; }
  if($_GET['shft']=="ALL" or $_GET['shft']==""){ $shft=" ";}else{$shft=" AND shift LIKE '$_GET[shft]' OR shift2 LIKE '$_GET[shft]' ";}
  if($_GET['subdept']!=""){ $subdpt=" AND subdept='$_GET[subdept]' "; }
  if($_GET['disposisipro']=="1"){ $disposisipro =" AND sts_disposisipro='1' "; }else{$disposisipro = " ";}
  if($_GET['langganan']!=""){ $lgn =" AND langganan LIKE '%$_GET[langganan]%' "; }else{$lgn = " ";}
  if($Awal!="" or $GShift!="" or $Subdept!="" or $Langganan!=""){
    $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE sts_disposisipro='1' $Where $disposisipro $shft $subdpt $lgn ORDER BY pejabat,personil ASC");
    }else{
    $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE sts_disposisipro='1' $Where $disposisipro $shft $subdpt $lgn ORDER BY pejabat,personil ASC");
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
            <td align="center"><font size="-2">'<?php echo strtoupper($row1['lot']);?></font></td>
            <td align="center"><font size="-2"><?php echo strtoupper($row1['warna']);?></font></td>
            <td align="right"><font size="-2"><?php echo strtoupper($row1['qty_kirim']);?></font></td>
            <td align="right"><font size="-2"><?php echo strtoupper($row1['qty_claim']);?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['masalah'];?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['solusi'];?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['penyebab'];?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['pejabat'];?></font></td>
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
          </tr>
			
        </tbody>
    </tr>
</table>
<br>
<!-- <table width="100%" border="0">
  <tr>
      <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="45%"><strong>DETAIL DISPOSISI PRODUKSI</strong>
      </td>
    </tr>
</table> -->
<!-- <table width="100%" border="1">
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
            <tr>
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
            </tr>
            <tr>
              <?php
              if($_GET['langganan']!=""){ $lgn =" AND langganan LIKE '%$_GET[langganan]%' "; }else{$lgn = " ";}
              $qry2=mysqli_query($con,"SELECT pejabat FROM tbl_aftersales_now WHERE
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
              AND '$Akhir' AND pejabat!='' AND sts_disposisipro='1' $lgn GROUP BY pejabat"); 
              $tot_a=0;
              while($row2=mysqli_fetch_array($qry2)){
                $qryDQ=mysqli_query($con,"SELECT SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisipro='1' AND pejabat='$row2[pejabat]' $lgn");
                $rDQ=mysqli_fetch_array($qryDQ);
                $qryjml=mysqli_query($con,"SELECT COUNT(*) as jml FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisipro='1' AND pejabat='$row2[pejabat]' $lgn");
                $rowjml=mysqli_fetch_array($qryjml);
                $qryOK=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisipro='1' AND pejabat='$row2[pejabat]' AND solusi='OK (NEGOSIASI)' $lgn");
                $rowOK=mysqli_fetch_array($qryOK);
                $qryR=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisipro='1' AND pejabat='$row2[pejabat]' AND solusi='RETUR' $lgn");
                $rowR=mysqli_fetch_array($qryR);
                $qryCut=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisipro='1' AND pejabat='$row2[pejabat]' AND solusi='CUTTING LOSS (GANTI KAIN)' $lgn");
                $rowCut=mysqli_fetch_array($qryCut);
                $qryPG=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisipro='1' AND pejabat='$row2[pejabat]' AND solusi='PERBAIKAN GARMENT' $lgn");
                $rowPG=mysqli_fetch_array($qryPG);
                $qryLG=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisipro='1' AND pejabat='$row2[pejabat]' AND solusi='LETTER OF GUARANTEE (LG)' $lgn");
                $rowLG=mysqli_fetch_array($qryLG);
                $qryDN=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisipro='1' AND pejabat='$row2[pejabat]' AND solusi='DEBIT NOTE' $lgn");
                $rowDN=mysqli_fetch_array($qryDN);
              ?>
                <td align="left"><?php echo $row2['pejabat']?></td>
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
          </table></td>
    </tr>
</table> -->

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>