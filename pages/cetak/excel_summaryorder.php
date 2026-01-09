<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Bon-Penghubung-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
include "../../koneksi.php";
//--
$Awal=$_GET['awal'];
$Langganan=$_GET['langganan'];
$Akhir=$_GET['akhir'];
$Order=$_GET['order'];
$Hanger=$_GET['hanger'];
$PO=$_GET['po'];
$Warna=$_GET['warna'];
$Item=$_GET['item'];
$Proses=$_GET['proses'];
?>
<body>

<strong>Periode: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong><br>
<table width="100%" border="1">
    <tr>
      <th bgcolor="#12C9F0" rowspan="2">NO.</th>
      <th bgcolor="#12C9F0" colspan="2">VERIFIKATOR MKT</th>
      <th bgcolor="#12C9F0" rowspan="2">TGL</th>
      <th bgcolor="#12C9F0" rowspan="2">NO BPP</th>
      <th bgcolor="#12C9F0" rowspan="2">NAMA SALES</th>
      <th bgcolor="#12C9F0" rowspan="2">TEMBAK DOKUMEN</th>
      <th bgcolor="#12C9F0" rowspan="2">NO KK</th>
      <th bgcolor="#12C9F0" rowspan="2">LANGGANAN</th>
      <th bgcolor="#12C9F0" rowspan="2">PO</th>
      <th bgcolor="#12C9F0" rowspan="2">NO. ORDER</th>
      <th bgcolor="#12C9F0" rowspan="2">NO. ITEM</th>
      <th bgcolor="#12C9F0" rowspan="2">NO. HANGER</th>
      <th bgcolor="#12C9F0" rowspan="2">WARNA</th>
      <th bgcolor="#12C9F0" rowspan="2">LOT</th>
      <th bgcolor="#12C9F0" rowspan="2">QTY ORDER</th>
      <th bgcolor="#12C9F0" rowspan="2">QTY PACKING</th>
      <th bgcolor="#12C9F0" rowspan="2">QTY SISA</th>
      <th bgcolor="#12C9F0" rowspan="2">QTY FOC</th>
      <th bgcolor="#12C9F0" rowspan="2">EST. FOC</th>
      <th bgcolor="#12C9F0" rowspan="2">MASALAH</th>
      <th bgcolor="#12C9F0" rowspan="2">TANGGUNG JAWAB</th>
    </tr>
    <tr>
      <th bgcolor="#12C9F0">PROSES MKT</th>
      <th bgcolor="#12C9F0">EDITOR</th>
    </tr>
	<?php 
	$no=1;
    if($Awal!=""){ $Where =" AND DATE_FORMAT( tgl_masuk, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
    if($Proses!=""){ $prs=" AND sts_aksi='$Proses' ";}else{$prs=" ";}
    if($Awal!="" or $Order!="" or $Warna!="" or $Hanger!="" or $Item!="" or $PO!="" or $Langganan!=""){
        $query=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE sts_pbon='1' AND no_order LIKE '%$Order%' AND no_po LIKE '%$PO%' AND no_hanger LIKE '%$Hanger%' AND no_item LIKE '%$Item%' AND warna LIKE '%$Warna%' AND pelanggan LIKE '%$Langganan%' $Where $prs ORDER BY id ASC ");
    }else{
        $query=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE sts_pbon='1' AND no_order LIKE '$Order' AND no_po LIKE '$PO' AND no_hanger LIKE '$Hanger%' AND no_item LIKE '$Item' AND warna LIKE '$Warna' AND pelanggan LIKE '$Langganan' $Where $prs ORDER BY id ASC");
    }
    $troll=0;
    $tnetto=0;
    $tpanjang=0;
    $tsisa=0;
    $tbextra=0;
    $tpextra=0;
    $t_est=0;
    $tpest=0;
	while($r=mysqli_fetch_array($query)){
        $dtArr=$r['t_jawab'];
        $data = explode(",",$dtArr);
        $dtArr1=$r['persen'];
        $data1 = explode(",",$dtArr1);
	?>
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $r['sts_aksi'];?></td>
      <td><?php echo $r['editor'];?></td>
      <td><?php echo $r['tgl_masuk'];?></td>
      <td><?php echo $r['bpp'];?></td>
      <td><?php echo $r['sales'];?></td>
      <td><?php if($r['sts_tembakdok']!='0'){echo "Tembak Dokumen";}else{echo " ";}?></td>
      <td>'<?php echo $r['nokk'];?></td>
      <td><?php echo $r['pelanggan'];?></td>
      <td><?php echo $r['no_po'];?></td>
      <td><?php echo $r['no_order'];?></td>
      <td><?php echo $r['no_item'];?></td>
      <td><?php echo $r['no_hanger'];?></td>
      <td><?php echo $r['warna'];?></td>
      <td>'<?php echo $r['lot'];?></td>
      <td><?php echo $r['berat_order']." KGs, ".$r['panjang_order']." ".$r['satuan_order'];?></td>
      <td><?php echo $r['rol']." Rol, ".$r['netto']." KG, ".$r['panjang']." ".$r['satuan'];?></td>
      <td><?php echo $r['sisa']." KG";?></td>
      <td><?php echo $r['berat_extra']." KG, ".$r['panjang_extra']." ".$r['satuan'];?></td>
      <td><?php echo $r['estimasi']." KG, ".$r['panjang_estimasi']." ".$r['satuan'];?></td>
      <td><?php echo $r['masalah'];?></td>
      <td>
        <?php if($r['t_jawab']!="" or $r['t_jawab']!=NULL){?>
        <?php if($data[0]!="" or $data[0]!=NULL){echo $data[0]." ".$data1[0]."%";}?>&nbsp; 
        <?php if($data[1]!="" or $data[1]!=NULL){echo $data[1]." ".$data1[1]."%";}?>&nbsp;
        <?php if($data[2]!="" or $data[2]!=NULL){echo $data[2]." ".$data1[2]."%";}?>
        <?php } ?></td>
    </tr>
    <?php $no++;
    $troll=$troll+$r['rol'];
    $tnetto=$tnetto+$r['netto'];
    $tpanjang=$tpanjang+$r['panjang'];
    $tsisa=$tsisa+$r['sisa'];
    $tbextra=$tbextra+$r['berat_extra'];
    $tpextra=$tpextra+$r['panjang_extra'];
    $t_est=$t_est+$r['estimasi'];
    $tpest=$tpest+$r['panjang_estimasi'];
    $satuan=$r['satuan'];
    } ?>
    <tr>
        <td align="center" colspan="16"><strong>TOTAL</strong></td>
        <td align="left"><strong><?php echo $troll." Rol, ".$tnetto." KG, ".$tpanjang." ".$satuan;?></strong></td>
        <td align="left"><strong><?php echo $tsisa." KG";?></strong></td>
        <td align="left"><strong><?php echo $tbextra." KG, ".$tpextra." ".$satuan;?></strong></td>
        <td align="left"><strong><?php echo $t_est." KG, ".$tpest." ".$satuan;?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
</body>