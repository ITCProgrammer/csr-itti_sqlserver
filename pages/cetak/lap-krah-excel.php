<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=lap-krah-".date($_GET['awal']).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
include "../../koneksi.php";
?>

           <div align="center"> <h1>LAPORAN HARIAN KRAH DEPT. QCF</h1></div>
<!--script disini -->
<?php 
if($_GET['awal']!="" and $_GET['akhir']!=""){$tgl=$_GET['awal']; $tgl1=$_GET['akhir']; $shift=$_GET['shift'];}
else{$tgl=$_GET['awal']; $tgl1=$_GET['akhir']; $shift=$_GET['shift'];}
?>
Tanggal : <?php echo $tgl;?> s/d <?php echo $tgl1;?><br>
Shift 	: <?php echo $shift;?>
<table width="100%" border="1">
  <tr>
    <th rowspan="2" valign="middle" bgcolor="#006699"><font color="#FFFFFF" ><strong>No</strong></font></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><font color="#FFFFFF" ><strong>No Demand</strong></font></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong><font color="#FFFFFF" >Pelanggan</font></strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong><font color="#FFFFFF" >No Order</font></strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong><font color="#FFFFFF" >No PO</font></strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong><font color="#FFFFFF" >Jenis Kain</font></strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong><font color="#FFFFFF" >Warna</font></strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong><font color="#FFFFFF" >Lot</font></strong></th>
    <th colspan="3" bgcolor="#006699"><strong><font color="#FFFFFF" >Bruto</font></strong></th>
    <th colspan="3" bgcolor="#006699"><strong><font color="#FFFFFF" >Netto</font></strong></th>
    <th colspan="3" bgcolor="#006699"><strong><font color="#FFFFFF" >Sisa</font></strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><font color="#FFFFFF" ><strong>Total BS</strong></font></th>
    <th colspan="2" valign="middle" bgcolor="#006699"><font color="#FFFFFF" >BS(%)</font></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong><font color="#FFFFFF" >No Mutasi</font></strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong><font color="#FFFFFF" >Proses</font></strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong><font color="#FFFFFF" >Status</font></strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong><font color="#FFFFFF" >Catatan</font></strong></th>
  </tr>
  <tr>
    <th bgcolor="#006699"><strong><font color="#FFFFFF" >Rol</font></strong></th>
    <th bgcolor="#006699"><strong><font color="#FFFFFF" >PCS</font></strong></th>
    <th bgcolor="#006699"><strong><font color="#FFFFFF" >KGs</font></strong></th>
    <th bgcolor="#006699"><strong><font color="#FFFFFF" >Rol</font></strong></th>
    <th bgcolor="#006699"><strong><font color="#FFFFFF" >PCS</font></strong></th>
    <th bgcolor="#006699"><strong><font color="#FFFFFF" >KGs</font></strong></th>
    <th bgcolor="#006699"><strong><font color="#FFFFFF" >Rol</font></strong></th>
    <th bgcolor="#006699"><strong><font color="#FFFFFF" >PCS</font></strong></th>
    <th bgcolor="#006699"><strong><font color="#FFFFFF" >KGs</font></strong></th>
    <th valign="middle" bgcolor="#006699"><font color="#FFFFFF" >Bruto</font></th>
    <th valign="middle" bgcolor="#006699"><font color="#FFFFFF" >Netto</font></th>
  </tr>
  <?php
  if($shift!="ALL"){$shft=" AND `shift`='$shift' ";}else{$shft=" ";}
  $no=1;
  $c=0;
  $sql=mysqli_query($con,"SELECT * FROM tbl_lap_inspeksi WHERE `tgl_update` BETWEEN '$tgl' and '$tgl1' ".$shft." AND `dept`='KRAH' ORDER BY id ASC");
  while($row=mysqli_fetch_array($sql)){
	  $bgcolor = ($c++ & 1) ? '#33CCFF' : '#FFCC99';
  ?>
  <tr bgcolor="<?php echo $bgcolor;?>">
    <th><?php echo $no;?></th>
    <th>'<?php echo $row['nodemand'];?></th>
    <th><?php echo $row['pelanggan'];?></th>
    <th><?php echo $row['no_order'];?></th>
    <th><?php echo $row['no_po'];?></th>
    <th><?php echo $row['jenis_kain'];?></th>
    <th><?php echo $row['warna'];?></th>
    <th>'<?php echo $row['lot'];?></th>
    <th><?php echo $row['jml_roll'];?></th>
    <th><?php echo $row['pcs_bruto'];?></th>
    <th><?php echo $row['bruto'];?></th>
    <th><?php echo $row['jml_netto'];?></th>
    <th><?php echo number_format($row['panjang'],"0");?></th>
    <th><?php echo $row['netto'];?></th>
    <th><?php echo $row['rol_sisa'];?></th>
    <th><?php echo $row['jml_sisa'];?></th>
    <th><?php echo $row['sisa'];?></th>
    <th><?php echo $row['tot_bs'];?></th>
    <th><?php if($row['tot_bs']!="" AND $row['pcs_bruto']!=0){echo round(($row['tot_bs']/$row['pcs_bruto'])*100,'2');}else{echo "0.00";}?></th>
    <th><?php if($row['tot_bs']!="" AND $row['pcs_bruto']!=0){echo round((($row['tot_bs']/$row['pcs_bruto'])/$row['netto'])*100,'2');}else{echo "0.00";}?></th>
    <th>'<?php echo $row['no_mutasi'];?></th>
    <th><?php echo $row['proses'];?></th>
    <th><?php echo $row['status'];?></th>
    <th><?php echo $row['catatan'];?></th>
  </tr>
  <?php $no++;} ?>
</table>
