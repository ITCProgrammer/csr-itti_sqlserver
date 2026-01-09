<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=lap-cocok-warna-".date($_GET['awal']).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
include "../../koneksi.php";
?>

           <div align="center"> <h1>LAPORAN HARIAN COCOK WARNA DEPT. QCF</h1></div>
<!--script disini -->
<?php 
if($_GET['awal']!=""){
	$tgl=$_GET['awal'];
	$tgl1=$_GET['akhir'];
	$shift=$_GET['shift'];
	$jamA = isset($_GET['jam_awal']) ? $_GET['jam_awal'] : '';
    $jamAr = isset($_GET['jam_akhir']) ? $_GET['jam_akhir'] : '';
}else{
	$tgl=$_GET['awal'];
	$tgl1=$_GET['akhir'];
	$shift=$_GET['shift'];
	$jamA = isset($_GET['jam_awal']) ? $_GET['jam_awal'] : '';
    $jamAr = isset($_GET['jam_akhir']) ? $_GET['jam_akhir'] : '';
}
  if (strlen($jamA) == 5) {
    $start_date = $tgl . " " . $jamA;
  } else {
    $start_date = $tgl . " 0" . $jamA;
  }
  if (strlen($jamAr) == 5) {
    $stop_date = $tgl1 . " " . $jamAr;
  } else {
    $stop_date = $tgl1 . " 0" . $jamAr;
  }
?>
Tanggal : <?php echo $start_date." s/d ".$stop_date;?><br>
Shift 	: <?php echo $shift;?>
<table width="100%" border="1">
  <tr>
    <td><h4>No</h4></td>
    <td><h4>Tgl Fin</h4></td>
    <td><h4>No Demand</h4></td>
    <td><h4>Pelanggan</h4></td>
    <td><h4>Buyer</h4></td>
    <td><h4>PO</h4></td>
    <td><h4>Order</h4></td>
    <td><h4>Item</h4></td>
    <td><h4>Jenis Kain</h4></td>
    <td><h4>Warna</h4></td>
    <td><h4>No Warna</h4></td>
    <td><h4>Lot</h4></td>
    <td><h4>Roll</h4></td>
    <td><h4>Bruto</h4></td>
    <td><h4>Shift</h4></td>
    <td><h4>Status Warna</h4></td>
    <td><h4>Code Proses</h4></td>
    <td><h4>Tgl Celup</h4></td>
    <td><strong>Grouping</strong></td>
    <td><strong>Hue</strong></td>
    <td><h4>Keterangan</h4></td>
  </tr>
  <?php
  $no=1;
  $lotOK=0;$lotBWA=0;$lotBWB=0;$lotBWC=0;$lotTBD=0;$lot=0;
$lotFin=0;$lotFin1x=0;$lotPdr=0;$lotOven=0;$lotComp=0;
$lotSt=0;$lotAP=0;$lotPB=0;$rollFin=0;$brutoFin=0;$rollFin1x=0;
$brutoFin1x=0;$rollPdr=0;$brutoPdr=0;$rollOven=0;$brutoOven=0;
$rollComp=0;$brutoComp=0;$rollSt=0;$brutoSt=0;$rollAP=0;$brutoAP=0;
$rollPB=0;$brutoPB=0;$rollOK=0;$brutoOK=0;$rollBWA=0;$brutoBWA=0;
$rollBWB=0;$brutoBWB=0;$rollBWC=0;$brutoBWC=0;$rollTBD=0;$brutoTBD=0;
$roll=0;$bruto=0;

 if($_GET['shift']!="ALL"){
 $shft=" AND `shift`='$_GET[shift]' "; }else{$shft=" ";}
 
  $sql=mysqli_query($con,"SELECT * FROM tbl_lap_inspeksi WHERE DATE_FORMAT( CONCAT(tgl_update,' ',jam_update), '%Y-%m-%d %H:%i') between '$start_date' AND '$stop_date' ".$shft." AND `dept`='QCF' ORDER BY id ASC");
  while($row=mysqli_fetch_array($sql)){
	$pos = strpos($row['pelanggan'], "/");
                if ($pos > 0) {
                  $lgg1 = substr($row['pelanggan'], 0, $pos);
                  $byr1 = substr($row['pelanggan'], $pos + 1, 100);
                } else {
                  $lgg1 = $row['pelanggan'];
                  $byr1 = substr($row['pelanggan'], $pos, 100);
                }  
  ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $row['tgl_update'];?></td>
    <td>'<?php echo $row['nodemand'];?></td>
    <td><?php echo $lgg1;?></td>
    <td><?php echo $byr1;?></td>
    <td><?php echo $row['no_po'];?></td>
    <td><?php echo $row['no_order'];?></td>
    <td><?php echo $row['no_item'];?></td>
    <td><?php echo $row['jenis_kain'];?></td>
    <td><?php echo $row['warna'];?></td>
    <td><?php echo $row['no_warna'];?></td>
    <td>'<?php echo $row['lot'];?></td>
    <td><?php echo $row['jml_roll'];?></td>
    <td align="right"><?php echo $row['bruto'];?></td>
    <td align="center"><?php echo $row['shift'];?></td>
    <td><?php echo $row['status'];?></td>
    <td><?php echo $row['proses'];?></td>
    <td align="center"><?php echo $row['tgl_pengiriman'];?></td>
    <td><?php echo $row['grouping'];?></td>
    <td><?php echo $row['hue'];?></td>
    <td><?php echo $row['catatan'];?></td>
  </tr>
  <?php 
  
   	  if($row['proses']=="Fin"){
	  $rollFin += $row['jml_roll'];
	  $brutoFin += $row['bruto'];
	  $lotFin +=1;
		  }
	  if($row['proses']=="Fin 1X"){
	  $rollFin1x += $row['jml_roll'];
	  $brutoFin1x += $row['bruto'];
	  $lotFin1x += 1;
		  }
		  if($row['proses']=="Pdr"){
	  $rollPdr += $row['jml_roll'];
	  $brutoPdr += $row['bruto'];
	  $lotPdr +=1;
		  }
		   if($row['proses']=="Oven"){
	  $rollOven += $row['jml_roll'];
	  $brutoOven += $row['bruto'];
	  $lotOven +=1;
		  }
		   if($row['proses']=="Comp"){
	  $rollComp += $row['jml_roll'];
	  $brutoComp += $row['bruto'];
	  $lotComp +=1;
		  }
		   if($row['proses']=="Setting"){
	  $rollSt += $row['jml_roll'];
	  $brutoSt += $row['bruto'];
	  $lotSt +=1;
		  }
		   if($row['proses']=="AP"){
	  $rollAP += $row['jml_roll'];
	  $brutoAP += $row['bruto'];
	  $lotAP +=1;
		  }
		   if($row['proses']=="PB"){
	  $rollPB += $row['jml_roll'];
	  $brutoPB += $row['bruto'];
	  $lotPB +=1;
		  }
		  if($row['status']=="OK"){
	  $rollOK += $row['jml_roll'];
	  $brutoOK += $row['bruto'];
	  $lotOK +=1;
		  }
		  if($row['status']=="BW" and $row['no_inspeksi']=="A" ){
	  $rollBWA += $row['jml_roll'];
	  $brutoBWA += $row['bruto'];
	  $lotBWA +=1;
		  }
		  if($row['status']=="BW" and $row['no_inspeksi']=="B" ){
	  $rollBWB += $row['jml_roll'];
	  $brutoBWB += $row['bruto'];
	  $lotBWB +=1;
		  }
		  if($row['status']=="BW" and $row['no_inspeksi']=="C" ){
	  $rollBWC += $row['jml_roll'];
	  $brutoBWC += $row['bruto'];
	  $lotBWC +=1;
		  }
		  if($row['status']=="TBD"){
	  $rollTBD += $row['jml_roll'];
	  $brutoTBD += $row['bruto'];
	  $lotTBD +=1;
		  }
		  
	  $roll += $row['jml_roll'];
	  $bruto += $row['bruto'];
	  $lot +=1;
	  
  	  $no++;} 
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>OK</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotOK);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollOK);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoOK,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>Fin</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotFin);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollFin);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoFin,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>TBD</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotTBD);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollTBD);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoTBD,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>Fin 1X</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotFin1x);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollFin1x);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoFin1x,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">Team Dye A</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>BW</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotBWA);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollBWA);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoBWA,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>Pdr</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotPdr);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollPdr);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoPdr,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">Team Dye B</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>BW</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotBWB);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollBWB);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoBWB,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>Oven</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotOven);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollOven);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoOven,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">Team Dye C</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>BW</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotBWC);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollBWC);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoBWC,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>Comp</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotComp);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollComp);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoComp,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>Setting</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotSt);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollSt);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoSt,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>AP</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotAP);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollAP);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoAP,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>PB</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotPB);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollPB);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoPB,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><strong>Total</strong></td>
    <td align="right"><strong><?php echo $lot;?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo $roll;?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($bruto,'2');?></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
