<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=tracking-gantikain-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
include "../../koneksi.php";
//--
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
?>
<body>
	
<strong>Periode: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong><br>
<table width="100%" border="1">
    <tr>
      <th bgcolor="#12C9F0">NO.</th>
      <th bgcolor="#12C9F0">TANGGAL</th>
      <th bgcolor="#12C9F0">LANGGANAN</th>
      <th bgcolor="#12C9F0">PO</th>
      <th bgcolor="#12C9F0">EX ORDER</th>
      <th bgcolor="#12C9F0">NEW ORDER</th>
      <th bgcolor="#12C9F0">LEBAR &amp; GRAMASI</th>
      <th bgcolor="#12C9F0">WARNA</th>
      <th bgcolor="#12C9F0">QTY REPLACEMENT</th>
      <th bgcolor="#12C9F0">STATUS</th>
    </tr>
	<?php 
	$no=1;
	$query=mysqli_query($con,"SELECT * FROM tbl_ganti_kain_now WHERE id_disposisi is null and  DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ORDER BY tgl_buat ASC");
	while($r=mysqli_fetch_array($query)){
	?>
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $r['tgl_buat'];?></td>
      <td><?php echo $r['langganan'];?></td>
      <td><?php echo $r['no_po'];?></td>
      <td><?php echo $r['no_order'];?></td>
      <td><?php echo $r['no_ordernew'];?></td>
      <td><?php echo $r['lebar']."x".$r['gramasi'];?></td>
      <td><?php echo $r['warna'];?></td>
      <td><?php echo number_format($r['kg1'],2);?></td>
      <td><?php echo $r['status'];?></td>
  </tr>
    <?php $no++;} ?>
</table>
</body>