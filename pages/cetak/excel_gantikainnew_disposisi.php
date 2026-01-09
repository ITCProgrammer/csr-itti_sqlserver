  <?php
//updated 23 Oktober 2023
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
<style>
body, table {
	font-family: arial;
	font-size: 11px;
	color:#000
}

.table-report {
	 border-collapse: collapse;
     width: 100%;
}
.table-report td, .table-report th {
    border: thin  solid #414a4c;
    padding: 2px;
	
}
.table-report td {
	text-align:left
}

.table-report th {
	text-align:center
}

.centered-text {
        /* text-align: center; Mengatur teks secara horizontal di tengah */
        vertical-align: middle; /* Mengatur teks secara vertikal di tengah */
        /* height: 100%; Memberikan tinggi 100% untuk memastikan vertikal tengah */
}

</style>
<body>
<!-- <center><b>PRESALE REPLACEMENT REPORT</b> </center> -->
<center><b>LAPORAN GANTI KAIN (BON PENGHUBUNG)</b> </center>
<br>														

<table class="table-report">
    <tr>
      <th>No</th>
      <th width=70px>Date</th>
      <th>Customer</th>
      <th>PO</th>
      <th>Order</th>
	  <th>Hanger/Item</th>
	  <!-- <th>Description</th> -->
      <th>Width & Weight</th>
      <th>Color</th>
	  <th  style="text-align:center">Order Qty</th>
	   <th  style="text-align:center">Delivery Qty</th>
      <th>Replacement Qty</th>
	  <th>%</th>
      <th>Defect</th>
	  <th>Responsible Dept</th>
    </tr>
	<?php 
	$no=1;
	$sum_order_qty = 0 ; 
	$sum_kirim_qty = 0 ;
	$sum_replacement = 0 ; 
	$sum_replacement_persen = 0 ; 
	$query=mysqli_query($con,"SELECT a.*, b.article_group, b.article_code FROM tbl_ganti_kain_now a
	join tbl_disposisi_now b on (a.id_disposisi = b.id)
	WHERE a.id_disposisi is not null and  DATE_FORMAT( a.tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ORDER BY a.tgl_buat ASC");
	while($r=mysqli_fetch_array($query)){
	?>
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $r['tgl_buat'];?></td>
      <td><?php echo $r['langganan'];?></td>
      <td><?php echo $r['no_po'];?></td>
      <td><?php echo $r['no_order'];?></td>
      <td>
		<?php 
			if($r['no_item']) { echo $r['no_item']; } else if($r['no_hanger']) {echo $r['no_hanger']; }else  {echo $r['article_group'].$r['article_code'];}
		?>
	  </td>
	  <!-- <td><?php echo $r['jenis_kain'];?></td> -->
      <td><?php echo $r['lebar']."x".$r['gramasi'];?></td>
      <td><?php echo $r['warna'];?></td>
	  <td style="text-align:right">
			<?php echo $r['qty_order']; // qty order
				  $sum_order_qty+=$r['qty_order'];
			?>
	 </td>
	 <td style="text-align:right"><?=$r['qty_kirim'];$sum_kirim_qty+=$r['qty_kirim'];?></td>
      <td style="text-align:right">
		<?php $explode = explode("/",$r['qty_permintaan']);
			  echo $explode[0];
		      $sum_replacement+= $explode[0] ; 
		?>
	 </td>
	  <td style="text-align:right"> 
	  <?php 
		$fv = $explode[0]/$r['qty_order']*100;
		echo $persen_ =  number_format($fv, 2, '.', '') ;
		$sum_replacement_persen+=$persen_;?></td>
      <td><?=$r['sub_defect']?></td>
	  <td>
		<?php echo $r['t_jawab'] ; if ($r['t_jawab1']) { echo ',';} ?>
		<?php echo $r['t_jawab1']; if ($r['t_jawab2']) { echo ',';} ?>
		<?php echo $r['t_jawab2']; ?>
	  
	  </td>
  </tr>
    <?php $no++;} ?>
	<tr>
		<td colspan=8 style="text-align:center">Total</td>
		<td style="text-align:right" ><?= $x = number_format($sum_order_qty, 2, '.', '');?></td>
		<td style="text-align:right"><?=number_format($sum_kirim_qty, 2, '.', '');?></td>
		<td style="text-align:right"><?= $y = number_format($sum_replacement, 2, '.', '') ?></td>
		<td style="text-align:right"><?= number_format(($y/$x)*100, 2, '.', '')?></td>
		<td colspan=2></td>
		
	</tr>
	<tr style="height:25px">
		<td colspan=14></td>
	</tr>

	<tr>
		<td colspan= 2></td>
		<td colspan= 4 style="text-align:center">Dibuat Oleh</td>
		<td colspan= 4 style="text-align:center">Diperiksa Oleh</td>
		<td colspan= 4 style="text-align:center">Diketahui Oleh</td>
	</tr>
	<tr>
	<td colspan= 2 height="30" valign="top" style="text-align:center;" class="centered-text">Nama</td>
		<td colspan= 4 ></td>
		<td colspan= 4 ></td>
		<td colspan= 4 ></td>
	</tr>
	<tr>
	<td colspan= 2 height="30" valign="top" style="text-align:center;" class="centered-text">Jabatan</td>
		<td colspan= 4 ></td>
		<td colspan= 4 ></td>
		<td colspan= 4 ></td>
	</tr>
	<tr>
		<td colspan= 2 height="30"  style="text-align:center;"  valign="top" class="centered-text">Tanggal</td>
		<td colspan= 4 ></td>
		<td colspan= 4 ></td>
		<td colspan= 4 ></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:center" height="60" valign="top">Tanda Tangan</td>
		<td colspan= 4 ></td>
		<td colspan= 4 style="text-align:center"></td>
		<td colspan= 4 style="text-align:center"></td>
	</tr>

	
</table>
</body>