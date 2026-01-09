<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=KPE-Disposisi-".$_GET['pejabat']."-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
//--
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$Order=$_GET['order'];
$PO=$_GET['po'];
$Hanger=$_GET['hanger'];
$Langganan=$_GET['langganan'];
$Demand=$_GET['demand'];
$Prodorder=$_GET['prodorder'];
$Pejabat=$_GET['pejabat'];
?>
<body>
<strong>LAPORAN KELUHAN PELANGGAN</strong><br>	
<strong>Periode: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong><br>
<strong>DISPOSISI <?php echo $_GET['pejabat'];?></strong><br>
<table width="100%" border="1">
  <tr align="center">
    <th bgcolor="#12C9F0">NO.</th>
    <th bgcolor="#12C9F0">TGL</th>
    <th bgcolor="#12C9F0">LANGGANAN</th>
    <th bgcolor="#12C9F0">PO</th>
    <th bgcolor="#12C9F0">ORDER</th>
    <th bgcolor="#12C9F0">JENIS KAIN</th>
    <th bgcolor="#12C9F0">LEBAR & GRAMASI</th>
    <th bgcolor="#12C9F0">LOT</th>
    <th bgcolor="#12C9F0">WARNA</th>
    <th bgcolor="#12C9F0">QTY KIRIM</th>
    <th bgcolor="#12C9F0">QTY CLAIM</th>
    <th bgcolor="#12C9F0">T JAWAB</th>
    <th bgcolor="#12C9F0">MASALAH</th>
    <th bgcolor="#12C9F0">KETERANGAN</th>
  </tr>
	<?php 
	$no=1;
	if($Awal!=""){ $Where =" AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
  if($Awal!="" or $Order!="" or $Hanger!="" or $PO!="" or $Langganan!="" or $Demand!="" or $Prodorder!="" or $Pejabat!=""){
  $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE no_order LIKE '%$Order%' AND po LIKE '%$PO%' AND no_hanger LIKE '%$Hanger%' AND langganan LIKE '%$Langganan%' AND nodemand LIKE '%$Demand%' AND nokk LIKE '%$Prodorder%' AND pejabat='$Pejabat' $Where AND bprc = '1' ORDER BY masalah_dominan ASC");
  }else{
  $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE no_order LIKE '$Order' AND po LIKE '$PO' AND no_hanger LIKE '$Hanger' AND langganan LIKE '$Langganan' AND nodemand LIKE '$Demand' AND nokk LIKE '$Prodorder' AND pejabat='$Pejabat' $Where AND bprc = '1' ORDER BY masalah_dominan ASC");
  }
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
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo date("d/m/y", strtotime($row1['tgl_buat']));?></td>
      <td><?php echo $row1['langganan'];?></td>
      <td><?php echo $row1['po'];?></td>
      <td><?php echo $row1['no_order'];?></td>
      <td><?php echo $row1['jenis_kain'];?></td>
      <td><?php echo $row1['lebar']."x".$row1['gramasi'];?></td>
      <td><?php echo $row1['lot'];?></td>
      <td><?php echo $row1['warna'];?></td>
      <td><?php echo $row1['qty_kirim'];?></td>
      <td><?php echo $row1['qty_claim'];?></td>
      <td><?php echo $tjawab;?></td>
      <td><?php echo $row1['masalah'];?></td>
      <td><?php echo $row1['ket'];?></td>
  </tr>
    <?php $no++;
    $tkirim=$tkirim+$row1['qty_kirim'];
    $tclaim=$tclaim+$row1['qty_claim'];
	} ?>
  <tr valign="top">
    <td colspan="8" align="right">TOTAL</td>
    <td align="right">&nbsp;</td>
    <td align="right"><?php echo $tkirim;?></td>
    <td align="center"><?php echo $tclaim;?></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
	<td align="center">&nbsp;</td>
  </tr>
</table>
</body>