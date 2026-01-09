<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=tracking-retur-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
include "../../koneksi.php";
//--
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$Status=$_GET['status'];
$Order=$_GET['order'];
$Langganan=$_GET['langganan'];
$PO=$_GET['po'];
?>
<body>
	
<strong>Periode: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong><br>
<table width="100%" border="1">
    <tr>
      <th bgcolor="#12C9F0">NO.</th>
      <th bgcolor="#12C9F0">BARCODE</th>
      <th bgcolor="#12C9F0">TANGGAL DARI GKJ</th>
      <th bgcolor="#12C9F0">TANGGAL SURAT JALAN</th>
      <th bgcolor="#12C9F0">NO SURAT JALAN LANGGANAN</th>
      <th bgcolor="#12C9F0">LANGGANAN</th>
      <th bgcolor="#12C9F0">PO</th>
      <th bgcolor="#12C9F0">EX ORDER</th>
      <th bgcolor="#12C9F0">NEW ORDER RETUR</th>
      <th bgcolor="#12C9F0">WARNA</th>
      <th bgcolor="#12C9F0">LOT</th>
      <th bgcolor="#12C9F0">ROLL</th>
      <th bgcolor="#12C9F0">QTY SURAT JALAN</th>
      <th bgcolor="#12C9F0">MASALAH</th>
      <th bgcolor="#12C9F0">T JAWAB</th>
      <th bgcolor="#12C9F0">KETERANGAN</th>
      <th bgcolor="#12C9F0">STATUS</th>
    </tr>
	<?php 
    $no=1;
    if($Awal!=""){ $Where =" AND DATE_FORMAT( tgltrm_sjretur, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' "; }
    if($Status!=""){ $sts=" AND `status`='$Status' ";}else{$sts=" ";}
    if($Awal!="" or $Order!="" or $PO!="" or $Langganan!=""){
        $query=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now WHERE no_order LIKE '%$Order%' AND po LIKE '%$PO%' AND langganan LIKE '%$Langganan%' $Where $sts ORDER BY tgl_buat ASC ");
    }else{
        $query=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now WHERE no_order LIKE '$Order' AND po LIKE '$PO' AND langganan LIKE '$Langganan' $Where $sts ORDER BY tgl_buat ASC");
    }
    $troll=0;
    $tkg=0;
	while($r=mysqli_fetch_array($query)){
        if($r['t_jawab']!="" and $r['t_jawab1']!="" and $r['t_jawab2']!=""){ $tjawab=$r['t_jawab'].",".$r['t_jawab1'].",".$r['t_jawab2'];
        }else if($r['t_jawab']!="" and $r['t_jawab1']!="" and $r['t_jawab2']==""){
        $tjawab=$r['t_jawab'].",".$r['t_jawab1'];	
        }else if($r['t_jawab']!="" and $r['t_jawab1']=="" and $r['t_jawab2']!=""){
        $tjawab=$r['t_jawab'].",".$r['t_jawab2'];	
        }else if($r['t_jawab']=="" and $r['t_jawab1']!="" and $r['t_jawab2']!=""){
        $tjawab=$r['t_jawab1'].",".$r['t_jawab2'];	
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
      <td>'<?php echo $r['nodemand'];?></td>
      <td><?php echo $r['tgltrm_sjretur'];?></td>
      <td><?php echo $r['tgl_sjretur'];?></td>
      <td>'<?php echo $r['sjreturplg'];?></td>
      <td><?php echo $r['langganan'];?></td>
      <td><?php echo $r['no_po'];?></td>
      <td><?php echo $r['no_order'];?></td>
      <td><?php echo $r['order_returbaru'];?></td>
      <td><?php echo $r['warna'];?></td>
      <td>'<?php echo $r['lot'];?></td>
      <td><?php echo $r['roll']." Roll";?></td>
      <td><?php echo $r['kg']." KG";?></td>
      <td><?php echo $r['masalah'];?></td>
      <td><?php echo $tjawab;?></td>
      <td><?php echo $r['ket'];?></td>
      <td><?php echo $r['status'];?></td>
  </tr>
    <?php $no++;
    $troll=$troll+$r['roll'];
    $tkg=$tkg+$r['kg'];} ?>
    <tr>
        <td align="center" colspan="11"><strong>TOTAL</strong></td>
        <td align="left"><strong><?php echo $troll." Roll";?></strong></td>
        <td align="left"><strong><?php echo $tkg." KG";?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
</body>