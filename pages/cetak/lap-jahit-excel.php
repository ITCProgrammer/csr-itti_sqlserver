<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=lap-jahit-".date($_GET['awal']).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
ini_set("error_reporting", 1);
include "../../koneksi.php";
?>

           <div align="center"> <h1>LAPORAN JAHIT DEPT. QCF</h1></div>
<!--script disini -->
<?php 
if($_GET['awal']!=""){$tgl=$_GET['awal'];$tgl1=$_GET['akhir'];$shift=$_GET['shift'];}else{$tgl=$_GET['awal'];$tgl1=$_GET['akhir'];$shift=$_GET['shift'];}
?>
Tanggal : <?php echo $tgl." s/d ".$tgl1;?><br>
Shift 	: <?php echo $shift;?>
<table width="100%" border="1">
  <tr>
    <td><h4>No</h4></td>
    <td><h4>Tgl Buat</h4></td>
    <td><h4>No Demand</h4></td>
    <td><h4>Langganan</h4></td>
    <td><h4>PO</h4></td>
    <td><h4>Order</h4></td>
    <td><h4>Warna</h4></td>
    <td><h4>Jenis Kain Accs</h4></td>
    <td><h4>Jenis Kain Body</h4></td>
    <td><h4>Lot Accs</h4></td>
    <td><h4>Lot Body</h4></td>
    <td><h4>Roll</h4></td>
    <td><h4>Bruto</h4></td>
    <td><h4>Operator</h4></td>
    <td><h4>Status</h4></td>
    <td><h4>Tgl Fin</h4></td>
    <td><h4>Keterangan</h4></td>
  </tr>
  <?php
  $no=1;
  $lotOK=0;$lotBWA=0;$lotBWB=0;$lotBWC=0;$lotTBD=0;$lot=0;
$lotFin=0;$lotFin1x=0;$lotPdr=0;$lotOven=0;$lotComp=0;
$lotSt=0;$lotAP=0;$lotPB=0;$rollOK=0;$brutoOK=0;$rollBOK=0;
$brutoBOK=0;$rollBW=0;$brutoBW=0;$roll=0;$bruto=0;
  if($_GET['shift']!="ALL"){
  $shft=" AND `shift`='$_GET[shift]' "; }else{$shft=" ";}
  if($_GET['order']!=""){$ord=" AND `no_order` LIKE '%$Order%' "; }else{$ord=" ";}
 
  $sql=mysqli_query($con,"SELECT * FROM tbl_jahit WHERE DATE_FORMAT( tgl_jahit, '%Y-%m-%d' ) BETWEEN '$tgl' AND '$tgl1' ".$shft." ".$ord." ORDER BY id ASC");
  while($row=mysqli_fetch_array($sql)){
	  
  ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo date("Y-m-d", strtotime($row['tgl_jahit']));?></td>
    <td>'<?php echo $row['nodemand'];?></td>
    <td><?php echo $row['langganan'];?></td>
    <td><?php echo $row['no_po'];?></td>
    <td><?php echo $row['no_order'];?></td>
    <td><?php echo $row['warna'];?></td>
    <td><?php echo $row['jenis_kain'];?></td>
    <td><?php echo $row['jenis_kain_body'];?></td>
    <td>'<?php echo $row['lot'];?></td>
    <td>'<?php echo $row['lot_body'];?></td>
    <td><?php echo $row['roll'];?></td>
    <td align="right"><?php echo $row['bruto'];?></td>
    <td><?php echo $row['operator'];?></td>
    <td><?php echo $row['status'];?></td>
    <td align="center"><?php echo $row['tgl_fin'];?></td>
    <td><?php echo $row['ket'];?></td>
  </tr>
  <?php 
        if($row['status']=="OK"){
        $rollOK += $row['roll'];
        $brutoOK += $row['bruto'];
        }
        if($row['status']=="BELUM OK"){
        $rollBOK += $row['roll'];
        $brutoBOK += $row['bruto'];
        }
        if($row['status']=="BEDA WARNA"){
          $rollBW += $row['roll'];
          $brutoBW += $row['bruto'];
          }
                
        $roll += $row['roll'];
        $bruto += $row['bruto'];
        //$lot+=1;
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
        <td align="right"><strong>OK=</strong></td>
        <td align="right"><strong><?php echo number_format($rollOK);?></strong></td>
        <td align="right"><strong><?php echo number_format($brutoOK,'2');?></strong></td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
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
        <td align="right"><strong>BELUM OK=</strong></td>
        <td align="right"><strong><?php echo number_format($rollBOK);?></strong></td>
        <td align="right"><strong><?php echo number_format($brutoBOK,'2');?></strong></td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
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
        <td align="right"><strong>BEDA WARNA=</strong></td>
        <td align="right"><strong><?php echo number_format($rollBW);?></strong></td>
        <td align="right"><strong><?php echo number_format($brutoBW,'2');?></strong></td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
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
        <td align="right"><strong>TOTAL</strong></td>
        <td align="right"><strong><?php echo number_format($roll);?></strong></td>
        <td align="right"><strong><?php echo number_format($bruto,'2');?></strong></td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
