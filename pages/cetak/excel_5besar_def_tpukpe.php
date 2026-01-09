<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Summary-5Besar-Defect-TPUKPE-Qty-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
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
      <th bgcolor="#12C9F0">MASALAH</th>
      <th bgcolor="#12C9F0">QTY</th>
      <th bgcolor="#12C9F0">%</th>
    </tr>
	<?php 
    $no2=1;
    $total1=0;
    $totaldll1=0;
    $qryAll=mysqli_query($con,"SELECT SUM(qty) AS qty_all FROM tbl_tpukpe WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL)");
    $rAll=mysqli_fetch_array($qryAll);
    $qrydef=mysqli_query($con,"SELECT SUM(qty) AS qty_lgn, ROUND(COUNT(masalah_dominan)/(SELECT COUNT(*) FROM tbl_tpukpe WHERE tgl_buat BETWEEN '$Awal' AND '$Akhir' 
    AND (masalah_dominan!='' OR masalah_dominan!=NULL))*100,1) AS persen,
    masalah_dominan
    FROM
    `tbl_tpukpe`
    WHERE tgl_buat BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL)
    GROUP BY masalah_dominan
    ORDER BY qty_lgn DESC LIMIT 5");
    while($rd=mysqli_fetch_array($qrydef)){
    ?>
    <tr valign="top">
        <td align="center"><?php echo $no2; ?></td>
        <td align="left"><?php echo $rd['masalah_dominan'];?></td>
        <td align="right"><?php echo $rd['qty_lgn']; ?></td>
        <td align="right"><?php echo number_format(($rd['qty_lgn']/$rAll['qty_all'])*100,2)." %";?></td>
    </tr>
    <?php	$no2++; 
    $total1=$total1+$rd['qty_lgn']; 
    } 
    $totaldll1=$rAll['qty_all']-$total1; ?>
    <tr valign="top">
        <td align="center" colspan="2">LAIN LAIN</td>
        <td align="right"><?php echo $totaldll1; ?></td>
        <td align="right"><?php echo number_format(($totaldll1/$rAll['qty_all'])*100,2)." %"; ?></td>
    </tr>
    <tr valign="top">
        <td align="center" colspan="2"><strong>TOTAL</td>
        <td align="right"><strong><?php echo number_format($rAll['qty_all'],2); ?></strong></td>
        <td align="right"><?php echo number_format(($rAll['qty_all']/$rAll['qty_all'])*100,2)." %";?></td>
    </tr>
</table>
</body>