<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=lap-conform-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
include "../../koneksi.php";
//--
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
// $Nokk=$_GET['nokk'];
$Order=$_GET['order'];
$Langganan=$_GET['langganan'];
$Item=$_GET['item'];
$Warna=$_GET['warna'];
?>
<body>

<strong><h3>LAPORAN CONFORM</h3></strong><br>
<strong>PERIODE: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong>

<table width="100%" border="1">
    <tr>
      <th bgcolor="#12C9F0" width="5%">NO.</th>
      <th bgcolor="#12C9F0">LANGGANAN</th>
      <th bgcolor="#12C9F0">BUYER</th>
      <th bgcolor="#12C9F0">NO PO</th>
      <th bgcolor="#12C9F0">ORDER</th>
      <th bgcolor="#12C9F0">HANGER</th>
      <!-- <th bgcolor="#12C9F0">JENIS KAIN</th> -->
      <th bgcolor="#12C9F0">NO WARNA</th>
      <th bgcolor="#12C9F0">WARNA</th>
      <th bgcolor="#12C9F0">LOT</th>
      <th bgcolor="#12C9F0">TGL KIRIM</th>
      <th bgcolor="#12C9F0">OK</th>
      <th bgcolor="#12C9F0">CMT INTERNAL</th>
      <th bgcolor="#12C9F0">CMT BUYER</th>
    </tr>
	<?php 
    $no=1;
    if($Awal!=""){ $Where =" AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
    if($Awal!="" or $Order!="" or $Item!="" or $Warna!="" or $Langganan!=""){
        $query=mysqli_query($con,"SELECT 
                                                    * 
                                                FROM tbl_firstlot 
                                                WHERE 
                                                    no_order LIKE '%$Order%' AND 
                                                    no_item LIKE '%$Item%' AND 
                                                    langganan LIKE '%$Langganan%' AND 
                                                    warna LIKE '%$Warna%' $Where 
                                                ORDER BY id ASC ");
    }else{
        $query=mysqli_query($con,"SELECT 
                                                    * 
                                                FROM tbl_firstlot 
                                                WHERE 
                                                    no_order LIKE '$Order' AND 
                                                    no_item LIKE '$Item' AND 
                                                    langganan LIKE '$Langganan' AND 
                                                    warna LIKE '$Warna' $Where 
                                                ORDER BY id ASC");
    }
	while($r=mysqli_fetch_array($query)){
        $pos=strpos($r['langganan'], "/");
	    $poscust=substr($r['langganan'],0,$pos);
        $cust=str_replace("'","''",$poscust);
        $posbuyer=substr($r['langganan'],$pos+1,50);
        $buyer=str_replace("'","''",$posbuyer);
	?>
    <tr>
      <td align="center"><?php echo $no;?></td>
      <td><?php echo $cust;?></td>
      <td><?php echo $buyer;?></td>
      <td><?php echo $r['po'];?></td>
      <td><?php echo $r['no_order'];?></td>
      <td><?php echo $r['no_hanger'];?></td>
      <!-- <td><?php //echo $r['jenis_kain'];?></td> -->
      <td><?php echo $r['no_warna'];?></td>
      <td><?php echo $r['warna'];?></td>
      <td>'<?php echo $r['lot'];?></td>
      <td><?php if($r['tgl_kirim']!="0000-00-00"){echo date("j M Y", strtotime($r['tgl_kirim']));}else{echo "&nbsp;";}?></td>
      <td><?php if($r['tgl_approve']!="0000-00-00"){echo date("j M Y", strtotime($r['tgl_approve']));}else{echo "&nbsp;";}?></td>
      <td><?php echo $r['cmt_internal'];?></td>
      <td><?php echo $r['cmt_buyer'];?></td>
  </tr>
    <?php $no++;} ?>
</table>
</body>