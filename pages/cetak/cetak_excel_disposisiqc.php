<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Diposisi-QC-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
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
    <th colspan="16" align="center">LAPORAN KELUHAN PELANGGAN EKSTERNAL &quot;DISPOSISI QC&quot;</th>
  </tr>
  <tr>
    <th colspan="16" align="center">PERIODE: <?php echo date("d/m/Y", strtotime($Awal));?> S/D <?php echo date("d/m/Y", strtotime($Akhir));?></th>
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
		<td><font size="-2"><strong>QTY DISPOSISI QC</strong></font></td>
        <td><font size="-2"><strong>MASALAH</strong></font></td>
        <td><font size="-2"><strong>MASALAH DOMINAN</strong></font></td>
        <td><font size="-2"><strong>SOLUSI</strong></font></td>
        <td><font size="-2"><strong>PENYEBAB</strong></font></td>
        <td><font size="-2"><strong>PEJABAT</strong></font></td>
        <td><font size="-2"><strong>SHIFT</strong></font></td>
        <td><font size="-2"><strong>KETERANGAN</strong></font></td>
        <td><font size="-2"><strong>&nbsp;</strong></font></td>
    </tr>
  </thead>
	<tbody>  
		<?php
	$no=1;
    if($_GET['awal']!=""){ $Where =" AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]' AND sts_revdis='0' "; }
    if($_GET['shft']=="ALL" or $_GET['shft']==""){ $shft=" ";}else{$shft=" AND shift LIKE '$_GET[shft]' OR shift2 LIKE '$_GET[shft]' ";}
    if($_GET['subdept']!=""){ $subdpt=" AND subdept='$_GET[subdept]' "; }
    if($_GET['disposisi']=="1"){ $disposisi =" AND sts_disposisiqc='1' "; }else{$disposisi = " ";}
    if($Awal!="" or $GShift!="" or $Subdept!="" or $Disposisi=="1" or $Langganan!=""){
      $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE langganan LIKE '%$_GET[langganan]%' $Where $disposisi $shft $subdpt ORDER BY pejabat,personil ASC");
      }else{
      $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE langganan LIKE '$_GET[langganan]' $Where $disposisi $shft $subdpt ORDER BY pejabat,personil ASC");
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
			<td align="right"><font size="-2"><?php if($row1['sts_disposisiqc']=="1"){ echo $lolos=$row1['qty_lolos']; }else{ echo $lolos="0"; } ?></font></td> 
            <td valign="top"><font size="-2"><?php echo $row1['masalah'];?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['masalah_dominan'];?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['solusi'];?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['penyebab'];?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['pejabat'];?></font></td>
            <td valign="top"><font size="-2"><?php if($row1['shift2']!=""){echo $row1['shift'].",".$row1['shift2'];}else{echo $row1['shift'];}?></font></td>
            <td valign="top"><font size="-2"><?php echo $row1['ket'];?></font></td>
            <td valign="top"><font size="-2"><?php if($row1['sts_check']=="Ceklis"){echo "&#10004";}else{echo "X";}?></font></td>
          </tr>
          <?php	$no++; 
				$tkirim=$tkirim+$row1['qty_kirim'];
				$tclaim=$tclaim+$row1['qty_claim'];
				$tlolos=$tlolos+$lolos;
			} ?>	
          <tr valign="top">
            <td colspan="7" align="right"><strong>TOTAL</strong></td>
            <td align="right"><strong><?php echo $tkirim;?></strong></td>
            <td align="right"><strong><?php echo $tclaim;?></strong></td>
			<td align="right"><strong><?php echo $tlolos;?></strong></td>  
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
<table width="100%" border="0">
  <tr>
      <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="45%"><strong>DISPOSISI QC</strong>
      </td>
    </tr>
</table>
<table width="100%" border="1">
<tr>
      <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;"><table width="100%">
        <tr>
          <td style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;"><table width="50%" border="1">
            <?php
            if($_GET['langganan']!=""){ $lgn =" AND langganan LIKE '%$_GET[langganan]%' "; }else{$lgn = " ";}
            //Shift A
            $qryjml1=mysqli_query($con,"SELECT COUNT(*) as jml_a FROM tbl_aftersales_now WHERE
            DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
            AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='A' OR shift2='A') $lgn");
            $rowjml1=mysqli_fetch_array($qryjml1);
            //Shift B
            $qryjml2=mysqli_query($con,"SELECT COUNT(*) as jml_b FROM tbl_aftersales_now WHERE
            DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
            AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='B' OR shift2='B') $lgn");
            $rowjml2=mysqli_fetch_array($qryjml2);
            //Shift C
            $qryjml3=mysqli_query($con,"SELECT COUNT(*) as jml_c FROM tbl_aftersales_now WHERE
            DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
            AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='C' OR shift2='C') $lgn");
            $rowjml3=mysqli_fetch_array($qryjml3);
            //Shift Non Shift
            $qryjml4=mysqli_query($con,"SELECT COUNT(*) as jml_non FROM tbl_aftersales_now WHERE
            DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
            AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='Non-Shift' OR shift2='Non-Shift') $lgn");
            $rowjml4=mysqli_fetch_array($qryjml4);
            //QC2
            $qryjml5=mysqli_query($con,"SELECT COUNT(*) as jml_qc2 FROM tbl_aftersales_now WHERE
            DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
            AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='QC2' OR shift2='QC2') $lgn");
            $rowjml5=mysqli_fetch_array($qryjml5);
            //TQ
            $qryjml6=mysqli_query($con,"SELECT COUNT(*) as jml_tq FROM tbl_aftersales_now WHERE
            DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
            AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='Test Quality' OR shift2='Test Quality') $lgn");
            $rowjml6=mysqli_fetch_array($qryjml6);
            ?>
            <tr>
                <td align="center" rowspan ="3" width="25%"><strong>Shift</strong></td>
                <td align="center" rowspan ="3" width="25%"><strong>Qty Keluhan</strong></td>
                <td align="center" rowspan ="3" width="10%"><strong>% (Qty Keluhan)</strong></td>
                <td align="center" rowspan ="3" width="25%"><strong>Total Kasus</strong></td>
                <td align="center" rowspan ="3" width="10%"><strong>% (Total Kasus)</strong></td>
                <td align="center" colspan="4" width="25%"><strong>Lolos QC (Kasus)</strong></td>
            </tr>
            <tr>
                <td align="center" width="25%" colspan="2"><strong>Defect</strong></td>
                <td align="center" width="10%" colspan="2"><strong>BW</strong></td>
            </tr>
            <tr>
                <td align="center" width="25%"><strong>Kasus</strong></td>
                <td align="center" width="10%"><strong>Qty</strong></td>
                <td align="center" width="25%"><strong>Kasus</strong></td>
                <td align="center" width="10%"><strong>Qty</strong></td>
            </tr>
            <tr>
              <?php
              if($_GET['langganan']!=""){ $lgn =" AND langganan LIKE '%$_GET[langganan]%' "; }else{$lgn = " ";}
              $qry1=mysqli_query($con,"SELECT shift, shift2, if(shift2!='',qty_claim/2,qty_claim) as qty_claim_a FROM tbl_aftersales_now WHERE
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
              AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='A' OR shift2='A') $lgn"); 
              //DEFECT LOLOS QC
              $qrylqcdefa=mysqli_query($con,"SELECT count(*) as jml_def, SUM(qty_claim) as qty_kg from tbl_aftersales_now where sts_check ='Ceklis' and masalah_dominan != 'Beda Warna' and 
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='A' OR shift2='A')");
              $rlqcdefa=mysqli_fetch_array($qrylqcdefa);
              //BEDA WARNA LOLOS QC
              $qrylqcbwa=mysqli_query($con,"SELECT count(*) as jml_bw, SUM(qty_claim) as qty_kg from tbl_aftersales_now where sts_check ='Ceklis' and masalah_dominan = 'Beda Warna' and 
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='A' OR shift2='A')");
              $rlqcbwa=mysqli_fetch_array($qrylqcbwa);
              $tot_a=0;
              while($row1=mysqli_fetch_array($qry1)){
              $tot_a=$tot_a+$row1['qty_claim_a']; }?>
                <td align="left">A</td>
                <td align="right"><?php echo number_format($tot_a,2)." Kg";?></td>
                <td align="center"><?php if($TotalKirim>0){echo number_format(($tot_a/$TotalKirim)*100,2)." %";}?></td>
                <td align="center"><?php echo $rowjml1['jml_a']." Kasus"; ?></td>
                <td align="center"><?php if($TotalLot>0){echo number_format(($rowjml1['jml_a']/$TotalLot)*100,2)." %";}?></td>
                <td align="center"><?php echo $rlqcdefa['jml_def'];?></td>
                <td align="center"><?php echo number_format($rlqcdefa['qty_kg'],2)." Kg";?></td>
                <td align="center"><?php echo $rlqcbwa['jml_bw'];?></td>
                <td align="center"><?php echo number_format($rlqcbwa['qty_kg'],2)." Kg";?></td>
            </tr>
            <tr>
            <?php
              $qry2=mysqli_query($con,"SELECT shift, shift2, if(shift2!='',qty_claim/2,qty_claim) as qty_claim_b FROM tbl_aftersales_now WHERE
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
              AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='B' OR shift2='B')  $lgn"); 
              //DEFECT LOLOS QC
              $qrylqcdefb=mysqli_query($con,"SELECT count(*) as jml_def, SUM(qty_claim) as qty_kg from tbl_aftersales_now where sts_check ='Ceklis' and masalah_dominan != 'Beda Warna' and 
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='B' OR shift2='B')");
              $rlqcdefb=mysqli_fetch_array($qrylqcdefb);
              //BEDA WARNA LOLOS QC
              $qrylqcbwb=mysqli_query($con,"SELECT count(*) as jml_bw, SUM(qty_claim) as qty_kg from tbl_aftersales_now where sts_check ='Ceklis' and masalah_dominan = 'Beda Warna' and 
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='B' OR shift2='B')");
              $rlqcbwb=mysqli_fetch_array($qrylqcbwb);
              $tot_b=0;
              while($row2=mysqli_fetch_array($qry2)){
              $tot_b=$tot_b+$row2['qty_claim_b']; }?>
                <td align="left">B</td>
                <td align="right"><?php echo number_format($tot_b,2)." Kg";?></td>
                <td align="center"><?php if($TotalKirim>0){echo number_format(($tot_b/$TotalKirim)*100,2)." %";}?></td>
                <td align="center"><?php echo $rowjml2['jml_b']." Kasus"; ?></td>
                <td align="center"><?php if($TotalLot>0){echo number_format(($rowjml2['jml_b']/$TotalLot)*100,2)." %";}?></td>
                <td align="center"><?php echo $rlqcdefb['jml_def'];?></td>
                <td align="center"><?php echo number_format($rlqcdefb['qty_kg'],2)." Kg";?></td>
                <td align="center"><?php echo $rlqcbwb['jml_bw'];?></td>
                <td align="center"><?php echo number_format($rlqcbwb['qty_kg'],2)." Kg";?></td>
            </tr>
            <tr>
            <?php
              $qry3=mysqli_query($con,"SELECT shift, shift2, if(shift2!='',qty_claim/2,qty_claim) as qty_claim_c FROM tbl_aftersales_now WHERE
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
              AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='C' OR shift2='C') $lgn "); 
              //DEFECT LOLOS QC
              $qrylqcdefc=mysqli_query($con,"SELECT count(*) as jml_def, SUM(qty_claim) as qty_kg from tbl_aftersales_now where sts_check ='Ceklis' and masalah_dominan != 'Beda Warna' and 
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='C' OR shift2='C')");
              $rlqcdefc=mysqli_fetch_array($qrylqcdefc);
              //BEDA WARNA LOLOS QC
              $qrylqcbwc=mysqli_query($con,"SELECT count(*) as jml_bw, SUM(qty_claim) as qty_kg from tbl_aftersales_now where sts_check ='Ceklis' and masalah_dominan = 'Beda Warna' and 
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='C' OR shift2='C')");
              $rlqcbwc=mysqli_fetch_array($qrylqcbwc);
              $tot_c=0;
              while($row3=mysqli_fetch_array($qry3)){
              $tot_c=$tot_c+$row3['qty_claim_c']; }?>
                <td align="left">C</td>
                <td align="right"><?php echo number_format($tot_c,2)." Kg";?></td>
                <td align="center"><?php if($TotalKirim>0){echo number_format(($tot_c/$TotalKirim)*100,2)." %";}?></td>
                <td align="center"><?php echo $rowjml3['jml_c']." Kasus"; ?></td>
                <td align="center"><?php if($TotalLot>0){echo number_format(($rowjml3['jml_c']/$TotalLot)*100,2)." %";}?></td>
                <td align="center"><?php echo $rlqcdefc['jml_def'];?></td>
                <td align="center"><?php echo number_format($rlqcdefc['qty_kg'],2)." Kg";?></td>
                <td align="center"><?php echo $rlqcbwc['jml_bw'];?></td>
                <td align="center"><?php echo number_format($rlqcbwc['qty_kg'],2)." Kg";?></td>
            </tr>
            <tr>
            <?php
              $qry4=mysqli_query($con,"SELECT shift, shift2, if(shift2!='',qty_claim/2,qty_claim) as qty_claim_non FROM tbl_aftersales_now WHERE
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
              AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='Non-Shift' OR shift2='Non-Shift') $lgn "); 
              //DEFECT LOLOS QC
              $qrylqcdefn=mysqli_query($con,"SELECT count(*) as jml_def, SUM(qty_claim) as qty_kg from tbl_aftersales_now where sts_check ='Ceklis' and masalah_dominan != 'Beda Warna' and 
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='Non-Shift' OR shift2='Non-Shift')");
              $rlqcdefn=mysqli_fetch_array($qrylqcdefn);
              //BEDA WARNA LOLOS QC
              $qrylqcbwn=mysqli_query($con,"SELECT count(*) as jml_bw, SUM(qty_claim) as qty_kg from tbl_aftersales_now where sts_check ='Ceklis' and masalah_dominan = 'Beda Warna' and 
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='Non-Shift' OR shift2='Non-Shift')");
              $rlqcbwn=mysqli_fetch_array($qrylqcbwn);
              $tot_non=0;
              while($row4=mysqli_fetch_array($qry4)){
              $tot_non=$tot_non+$row4['qty_claim_non']; }?>
                <td align="left">Non-Shift</td>
                <td align="right"><?php echo number_format($tot_non,2)." Kg";?></td>
                <td align="center"><?php if($TotalKirim>0){echo number_format(($tot_non/$TotalKirim)*100,2)." %";}?></td>
                <td align="center"><?php echo $rowjml4['jml_non']." Kasus"; ?></td>
                <td align="center"><?php if($TotalLot>0){echo number_format(($rowjml4['jml_non']/$TotalLot)*100,2)." %";}?></td>
                <td align="center"><?php echo $rlqcdefn['jml_def'];?></td>
                <td align="center"><?php echo number_format($rlqcdefn['qty_kg'],2)." Kg";?></td>
                <td align="center"><?php echo $rlqcbwn['jml_bw'];?></td>
                <td align="center"><?php echo number_format($rlqcbwn['qty_kg'],2)." Kg";?></td>
            </tr>
            <tr>
              <?php
              $qry5=mysqli_query($con,"SELECT shift, shift2, if(shift2!='',qty_claim/2,qty_claim) as qty_claim_qc2 FROM tbl_aftersales_now WHERE
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
              AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='QC2' OR shift2='QC2') $lgn"); 
              //DEFECT LOLOS QC
              $qrylqcdefqc2=mysqli_query($con,"SELECT count(*) as jml_def, SUM(qty_claim) as qty_kg from tbl_aftersales_now where sts_check ='Ceklis' and masalah_dominan != 'Beda Warna' and 
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='QC2' OR shift2='QC2')");
              $rlqcdefqc2=mysqli_fetch_array($qrylqcdefqc2);
              //BEDA WARNA LOLOS QC
              $qrylqcbwqc2=mysqli_query($con,"SELECT count(*) as jml_bw, SUM(qty_claim) as qty_kg from tbl_aftersales_now where sts_check ='Ceklis' and masalah_dominan = 'Beda Warna' and 
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='QC2' OR shift2='QC2')");
              $rlqcbwqc2=mysqli_fetch_array($qrylqcbwqc2);
              $tot_qc2=0;
              while($row5=mysqli_fetch_array($qry5)){
              $tot_qc2=$tot_qc2+$row5['qty_claim_qc2']; }?>
                <td align="left">QC2</td>
                <td align="right"><?php echo number_format($tot_qc2,2)." Kg";?></td>
                <td align="center"><?php if($TotalKirim>0){echo number_format(($tot_qc2/$TotalKirim)*100,2)." %";}?></td>
                <td align="center"><?php echo $rowjml5['jml_qc2']." Kasus"; ?></td>
                <td align="center"><?php if($TotalLot>0){echo number_format(($rowjml5['jml_qc2']/$TotalLot)*100,2)." %";}?></td>
                <td align="center"><?php echo $rlqcdefqc2['jml_def'];?></td>
                <td align="center"><?php echo number_format($rlqcdefqc2['qty_kg'],2)." Kg";?></td>
                <td align="center"><?php echo $rlqcbwqc2['jml_bw'];?></td>
                <td align="center"><?php echo number_format($rlqcbwqc2['qty_kg'],2)." Kg";?></td>
              </tr>
              <tr>
              <?php
              $qry6=mysqli_query($con,"SELECT shift, shift2, if(shift2!='',qty_claim/2,qty_claim) as qty_claim_tq FROM tbl_aftersales_now WHERE
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
              AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='Test Quality' OR shift2='Test Quality') $lgn"); 
               //DEFECT LOLOS QC
               $qrylqcdeftq=mysqli_query($con,"SELECT count(*) as jml_def, SUM(qty_claim) as qty_kg from tbl_aftersales_now where sts_check ='Ceklis' and masalah_dominan != 'Beda Warna' and 
               DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='Test Quality' OR shift2='Test Quality')");
               $rlqcdeftq=mysqli_fetch_array($qrylqcdeftq);
               //BEDA WARNA LOLOS QC
               $qrylqcbwtq=mysqli_query($con,"SELECT count(*) as jml_bw, SUM(qty_claim) as qty_kg from tbl_aftersales_now where sts_check ='Ceklis' and masalah_dominan = 'Beda Warna' and 
               DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND (shift='Test Quality' OR shift2='Test Quality')");
               $rlqcbwtq=mysqli_fetch_array($qrylqcbwtq);
              $tot_tq=0;
              while($row6=mysqli_fetch_array($qry6)){
              $tot_tq=$tot_tq+$row6['qty_claim_tq']; }?>
                <td align="left">Test Quality</td>
                <td align="right"><?php echo number_format($tot_tq,2)." Kg";?></td>
                <td align="center"><?php if($TotalKirim>0){echo number_format(($tot_tq/$TotalKirim)*100,2)." %";}?></td>
                <td align="center"><?php echo $rowjml6['jml_tq']." Kasus"; ?></td>
                <td align="center"><?php if($TotalLot>0){echo number_format(($rowjml6['jml_tq']/$TotalLot)*100,2)." %";}?></td>
                <td align="center"><?php echo $rlqcdeftq['jml_def'];?></td>
                <td align="center"><?php echo number_format($rlqcdeftq['qty_kg'],2)." Kg";?></td>
                <td align="center"><?php echo $rlqcbwtq['jml_bw'];?></td>
                <td align="center"><?php echo number_format($rlqcbwtq['qty_kg'],2)." Kg";?></td>
              </tr>
            <?php 
            $total=$tot_a+$tot_b+$tot_c+$tot_non+$tot_qc2+$tot_tq; 
            $totalkasus=$rowjml1['jml_a']+$rowjml2['jml_b']+$rowjml3['jml_c']+$rowjml4['jml_non']+$rowjml5['jml_qc2']+$rowjml6['jml_tq'];
            $totallqcdef=$rlqcdefa['jml_def']+$rlqcdefb['jml_def']+$rlqcdefc['jml_def']+$rlqcdefn['jml_def']+$rlqcdefqc2['jml_def']+$rlqcdeftq['jml_def'];
            $totalqtylqcdef=$rlqcdefa['qty_kg']+$rlqcdefb['qty_kg']+$rlqcdefc['qty_kg']+$rlqcdefn['qty_kg']+$rlqcdefqc2['qty_kg']+$rlqcdeftq['qty_kg'];
            $totallqcbw=$rlqcbwa['jml_bw']+$rlqcbwb['jml_bw']+$rlqcbwc['jml_bw']+$rlqcbwn['jml_bw']+$rlqcbwqc2['jml_bw']+$rlqcbwtq['jml_bw'];
            $totalqtylqcbw=$rlqcbwa['qty_kg']+$rlqcbwb['qty_kg']+$rlqcbwc['qty_kg']+$rlqcbwn['qty_kg']+$rlqcbwqc2['qty_kg']+$rlqcbwtq['qty_kg'];
            ?>
            <tr>
                <td align="left"><strong>Total</strong></td>
                <td align="right"><strong><?php echo number_format($total,2)." Kg"; ?></strong></td>
                <td align="center"><strong><?php if($TotalKirim>0){echo number_format(($total/$TotalKirim)*100,2)." %";}?></strong></td>
                <td align="center"><strong><?php echo $totalkasus." Kasus"; ?></strong></td>
                <td align="center"><strong><?php if($TotalLot>0){echo number_format(($totalkasus/$TotalLot)*100,2)." %";}?></strong></td>
                <td align="center"><strong><?php echo $totallqcdef." Kasus"; ?></strong></td>
                <td align="center"><strong><?php echo number_format($totalqtylqcdef,2)." Kg";?></strong></td>
                <td align="center"><strong><?php echo $totallqcbw." Kasus"; ?></strong></td>
                <td align="center"><strong><?php echo number_format($totalqtylqcbw,2)." Kg";?></strong></td>
            </tr>
            
            <tr>
                <td align="left"><strong>Total Kirim</strong></td>
                <td align="right"><strong><?php echo !empty($TotalKirim) ? number_format($TotalKirim, 2) . " Kg" : "0.00 Kg"; ?></strong></td>
            </tr>
            <tr>
                <td align="left"><strong>Total Lot Kain</strong></td>
                <td align="right"><strong><?php echo $TotalLot; ?></strong></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
</table>
<br>
<!-- <table width="100%" border="0">
  <tr>
      <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="45%"><strong>DETAIL DISPOSISI QC</strong>
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
              $qry1=mysqli_query($con,"SELECT pejabat FROM tbl_aftersales_now WHERE
              DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
              AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' $lgn GROUP BY pejabat"); 
              $tot_a=0;
              while($row1=mysqli_fetch_array($qry1)){
                $qryDQ=mysqli_query($con,"SELECT SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND pejabat='$row1[pejabat]' $lgn");
                $rDQ=mysqli_fetch_array($qryDQ);
                $qryjml=mysqli_query($con,"SELECT COUNT(*) as jml FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND pejabat='$row1[pejabat]' $lgn");
                $rowjml=mysqli_fetch_array($qryjml);
                $qryOK=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND pejabat='$row1[pejabat]' AND solusi='OK (NEGOSIASI)' $lgn");
                $rowOK=mysqli_fetch_array($qryOK);
                $qryR=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND pejabat='$row1[pejabat]' AND solusi='RETUR' $lgn");
                $rowR=mysqli_fetch_array($qryR);
                $qryCut=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND pejabat='$row1[pejabat]' AND solusi='CUTTING LOSS (GANTI KAIN)' $lgn");
                $rowCut=mysqli_fetch_array($qryCut);
                $qryPG=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND pejabat='$row1[pejabat]' AND solusi='PERBAIKAN GARMENT' $lgn");
                $rowPG=mysqli_fetch_array($qryPG);
                $qryLG=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND pejabat='$row1[pejabat]' AND solusi='LETTER OF GUARANTEE (LG)' $lgn");
                $rowLG=mysqli_fetch_array($qryLG);
                $qryDN=mysqli_query($con,"SELECT COUNT(*) as jml, SUM(qty_claim) as qty_claim FROM tbl_aftersales_now WHERE
                DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
                AND '$Akhir' AND sts_disposisiqc='1' AND sts_revdis='0' AND pejabat='$row1[pejabat]' AND solusi='DEBIT NOTE' $lgn");
                $rowDN=mysqli_fetch_array($qryDN);
              ?>
                <td align="left"><?php echo $row1['pejabat']?></td>
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