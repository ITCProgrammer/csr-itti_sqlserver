<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=gantikain-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
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
      <th bgcolor="#12C9F0">NO. ORDER</th>
      <th bgcolor="#12C9F0">NO. G</th>
      <th bgcolor="#12C9F0">JENIS KAIN</th>
      <th bgcolor="#12C9F0">LEBAR &amp; GRAMASI</th>
      <th bgcolor="#12C9F0">WARNA</th>
      <th bgcolor="#12C9F0">QTY ORDER</th>
      <th bgcolor="#12C9F0">QTY KIRIM</th>
      <th bgcolor="#12C9F0">QTY EXTRA</th>
      <th bgcolor="#12C9F0">QTY REPLACEMENT</th>
      <th bgcolor="#12C9F0">MASALAH</th>
      <th bgcolor="#12C9F0">TANGGUNG JAWAB</th>
    </tr>
	<?php 
	$no=1;
	$query=mysqli_query($con,"SELECT a.tgl_buat as tgl_gk,a.kd_ganti,b.* 
    FROM tbl_ganti_kain a LEFT JOIN tbl_aftersales b ON a.id_nsp=b.id
    WHERE DATE_FORMAT( a.tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ORDER BY a.tgl_buat ASC");
	while($r=mysqli_fetch_array($query)){
        if($r['t_jawab']!="" and $r['t_jawab1']!="" and $r['t_jawab2']!=""){ $tjawab=$r['t_jawab']."+".$r['t_jawab1']."+".$r['t_jawab2'];
        }else if($r['t_jawab']!="" and $r['t_jawab1']!="" and $r['t_jawab2']==""){
        $tjawab=$r['t_jawab']."+".$r['t_jawab1'];	
        }else if($r['t_jawab']!="" and $r['t_jawab1']=="" and $r['t_jawab2']!=""){
        $tjawab=$r['t_jawab']."+".$r['t_jawab2'];	
        }else if($r['t_jawab']=="" and $r['t_jawab1']!="" and $r['t_jawab2']!=""){
        $tjawab=$r['t_jawab1']."+".$r['t_jawab2'];	
        }else if($r['t_jawab']!="" and $r['t_jawab1']=="" and $r['t_jawab2']==""){
        $tjawab=$r['t_jawab'];
        }else if($r['t_jawab']=="" and $r['t_jawab1']!="" and $r['t_jawab2']==""){
        $tjawab=$r['t_jawab1'];
        }else if($r['t_jawab']=="" and $r['t_jawab1']=="" and $r['t_jawab2']!=""){
        $tjawab=$r['t_jawab2'];	
        }else if($r['t_jawab']=="" and $r['t_jawab1']=="" and $r['t_jawab2']==""){
        $tjawab="";	
        }
	?>
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $r['tgl_gk'];?></td>
      <td><?php echo $r['langganan'];?></td>
      <td><?php echo $r['po'];?></td>
      <td><?php echo $r['no_order'];?></td>
      <td><?php echo $r['kd_ganti'];?></td>
      <td><?php echo $r['jenis_kain'];?></td>
      <td><?php echo $r['lebar']."x".$r['gramasi'];?></td>
      <td><?php echo $r['warna'];?></td>
      <td><?php echo $r['qty_order'];?></td>
      <td><?php echo $r['qty_kirim'];?></td>
      <td><?php echo $r['qty_foc'];?></td>
      <td><?php echo $r['qty_claim'];?></td>
      <td><?php echo $r['masalah'];?></td>
      <td><?php echo $tjawab;?></td>
  </tr>
    <?php $no++;} ?>
</table>
</body>