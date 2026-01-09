<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=lap-cocok-warna-dye-".date($_GET['awal']).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
ini_set("error_reporting", 1);
include "../../koneksi.php";
?>

           <div align="center"> <h1>LAPORAN HARIAN COCOK WARNA DYE DEPT. QCF</h1></div>
<!--script disini -->
<?php 
if($_GET['tgl']!=""){$tgl=$_GET['awal'];$tgl1=$_GET['akhir'];$shift=$_GET['shift'];}else{$tgl=$_GET['awal'];$tgl1=$_GET['akhir'];$shift=$_GET['shift'];}
?>
Tanggal : <?php echo $tgl." s/d ".$tgl1;?><br>
Shift 	: <?php echo $shift;?>
<table width="100%" border="1">
  <tr>
    <td><h4>No</h4></td>
    <td><h4>Tgl Celup</h4></td>
    <td><h4>No Demand</h4></td>
    <td><h4>Pelanggan</h4></td>
    <td><h4>Buyer</h4></td>
    <td><h4>PO</h4></td>
    <td><h4>Order</h4></td>
    <td><h4>Item</h4></td>
    <td><h4>Jenis Kain</h4></td>
    <td><h4>Warna</h4></td>
    <td><h4>No Warna</h4></td>
    <td><h4>No Mesin</h4></td>
    <td><h4>Colorist Dye</h4></td>
    <td><h4>Lot</h4></td>
    <td><h4>Roll</h4></td>
    <td><h4>Bruto</h4></td>
    <td><h4>Shift</h4></td>
    <td><h4>Status Warna</h4></td>
    <td><h4>Disposisi</h4></td>
    <td><h4>Colorist Qcf</h4></td>
    <td><h4>Keterangan</h4></td>
  </tr>
  <?php
  $no=1;
  $lotOK=0;$lotTB=0;$lotTBA=0;$lotTBB=0;$lotTBC=0;$lot=0;
  $rollOK=0;$brutoOK=0;$rollTB=0;$brutoTB=0;$rollTBA=0;$brutoTBA=0;
  $rollTBB=0;$brutoTBB=0;$rollTBC=0;$brutoTBC=0;$roll=0;$bruto=0;

 if($_GET['shift']!="ALL"){
 $shft=" AND `shift`='$_GET[shift]' "; }else{$shft=" ";}
 
  $sql=mysqli_query($con,"SELECT * FROM tbl_cocok_warna_dye WHERE `tgl_celup` BETWEEN '$tgl' AND '$tgl1' ".$shft." AND `dept`='QCF' ORDER BY id ASC");
  while($row=mysqli_fetch_array($sql)){
	  
  ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $row['tgl_celup'];?></td>
    <td>'<?php echo $row['nodemand'];?></td>
    <td><?php echo $row['pelanggan'];?></td>
    <td><?php echo $row['buyer'];?></td>
    <td><?php echo $row['no_po'];?></td>
    <td><?php echo $row['no_order'];?></td>
    <td><?php echo $row['no_item'];?></td>
    <td><?php echo $row['jenis_kain'];?></td>
    <td><?php echo $row['warna'];?></td>
    <td><?php echo $row['no_warna'];?></td>
    <td>'<?php echo $row['no_mesin'];?></td>
    <td><?php echo $row['colorist_dye'];?></td>
    <td><?php echo $row['lot'];?></td>
    <td><?php echo $row['jml_roll'];?></td>
    <td align="right"><?php echo $row['bruto'];?></td>
    <td align="center"><?php echo $row['shift'];?></td>
    <td><?php echo $row['status_warna'];?></td>
    <td><?php echo $row['disposisi'];?></td>
    <td><?php echo $row['colorist_qcf'];?></td>
    <td><?php echo $row['ket'];?></td>
  </tr>
  <?php 
		  if($row['status_warna']=="OK"){
	  $rollOK += $row['jml_roll'];
	  $brutoOK += $row['bruto'];
	  $lotOK +=1;
		  }
		  if($row['status_warna']=="TOLAK BASAH" and $row['shift']=="A" ){
	  $rollTBA += $row['jml_roll'];
	  $brutoTBA += $row['bruto'];
	  $lotTBA +=1;
		  }
		  if($row['status_warna']=="TOLAK BASAH" and $row['shift']=="B" ){
	  $rollTBB += $row['jml_roll'];
	  $brutoTBB += $row['bruto'];
	  $lotTBB +=1;
		  }
		  if($row['status_warna']=="TOLAK BASAH" and $row['shift']=="C" ){
	  $rollTBC += $row['jml_roll'];
	  $brutoTBC += $row['bruto'];
	  $lotTBC +=1;
      }
      if($row['status_warna']=="TOLAK BASAH"){
        $rollTB += $row['jml_roll'];
        $brutoTB += $row['bruto'];
        $lotTB +=1;
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">Team Dye A</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>TB</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotTBA);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollTBA);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoTBA,'2');?></strong></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">Team Dye B</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>TB</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotTBB);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollTBB);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoTBB,'2');?></strong></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">Team Dye C</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong>TB</strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($lotTBC);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($rollTBC);?></strong></td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($brutoTBC,'2');?></strong></td>
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
  </tr>
</table>
