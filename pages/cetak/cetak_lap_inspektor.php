<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=lap-inspektor.xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
?>
<div align="center"> <h1>LAPORAN HARIAN INSPEKTOR DEPT. QCF</h1></div>
<!--script disini -->
<h3>Tanggal : <?php echo $_GET['awal']." s/d ".$_GET['akhir'];?></h3>
<table width="100%" border="1" class="table-list1">
  <tr>
    <td width="5%"><h4>No</h4></td>
    <td width="34%"><h4>Inspektor</h4></td>
    <td width="34%"><h4>Proses</h4></td>
    <td width="34%"><h4>Warna</h4></td>
    <td width="17%"><h4>Roll</h4></td>
    <td width="23%"><h4>Qty Bruto</h4></td>
    <td width="21%"><h4>Panjang</h4></td>
    <td width="21%"><h4>Total Waktu</h4></td>
    <td width="21%"><h4>Yard/Menit</h4></td>
  </tr>
  <?php
   	
  $no=1;
  if($_GET['shift']=="ALL"){		
    $Wshift=" ";	
  }else{	
    $Wshift=" AND b.shift='$_GET[shift]' ";	
  }
  if($_GET['gshift']=="ALL"){		
    $WGshift=" ";	
  }else{	
    $WGshift=" AND b.g_shift='$_GET[gshift]' ";	
  }
  if($_GET['personil']=="ALL"){		
    $Wnama=" ";	
  }else{	
    $Wnama=" AND a.personil='$_GET[personil]'  ";	
  }
  $sql=mysqli_query($con,"SELECT
	b.shift,
	b.g_shift,
  b.proses,
  b.warna,
	a.personil,
	sum( a.jml_rol ) AS rol,
	sum( a.qty ) AS bruto,
	sum( a.yard ) AS panjang,
  TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktu,
  IF(a.yard>0,a.yard,b.pjng_order) AS yard,
	IF(b.istirahat='',0,b.istirahat) AS istirahat  
FROM
  tbl_inspection a
LEFT JOIN 
	tbl_schedule b 
ON 
	a.id_schedule=b.id  
WHERE
	DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
	AND '$_GET[akhir]' $Wnama $Wshift $WGshift
GROUP BY b.warna,b.proses,a.personil
ORDER BY
	a.personil ASC");
  while($row=mysqli_fetch_array($sql)){
    $hourdiff  = (int)$row['waktu']-(int)$row['istirahat'];
	    ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $row['personil'];?></td>
    <td><?php echo $row['proses'];?></td>
    <td><?php echo $row['warna'];?></td>
    <td><?php echo $row['rol'];?></td>
    <td><?php echo $row['bruto'];?></td>
    <td><?php echo $row['panjang'];?></td>
    <td><?php echo $hourdiff;?></td>
    <td><?php if($hourdiff!=0){echo round($row['yard']/$hourdiff,2);}else{echo '0.00';} ?></td>
  </tr>
  <?php
	  $roll += $row['rol'];
	  $bruto += $row['bruto'];
	  $yds += $row['panjang'];
	  $no++;
	  }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF" class="table-list1">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong>Total</strong></td>
    <td align="center" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo $roll;?></strong></td>
    <td align="center" bgcolor="#FFFFFF" class="table-list1"><strong><?php echo number_format($bruto,'2');?></strong></td>
    <td><strong><?php echo number_format($yds,'2');?></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
