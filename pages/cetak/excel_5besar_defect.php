<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Summary-5Besar-Defect-TotalKasus-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
include "../../koneksi.php";
//--
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$TotalLot=$_GET['totallot'];
?>
<body>

<strong>Periode: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong><br>
<table width="100%" border="1">
    <tr>
      <th bgcolor="#12C9F0">NO.</th>
      <th bgcolor="#12C9F0">DEFECT</th>
      <th bgcolor="#12C9F0">JUMLAH KASUS</th>
      <th bgcolor="#12C9F0">% DIBANDINGKAN TOTAL KASUS</th>
    </tr>
	<?php 
	$no2=1;
    $totalcased=0;
    $totaldll=0;
    $qryAll=mysqli_query($con,"SELECT COUNT(*) AS jml_all FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL)");
    $rAll=mysqli_fetch_array($qryAll);
    $qrydef=mysqli_query($con,"SELECT COUNT(*) AS jml, ROUND(COUNT(masalah_dominan)/(SELECT COUNT(*) FROM tbl_aftersales_now WHERE tgl_buat BETWEEN '$Awal' AND '$Akhir' 
    AND (masalah_dominan!='' OR masalah_dominan!=NULL))*100,1) AS persen,
    masalah_dominan
    FROM
    `tbl_aftersales_now`
    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL)
    GROUP BY masalah_dominan
    ORDER BY jml DESC LIMIT 5");
    while($rd=mysqli_fetch_array($qrydef)){
    ?>
    <tr valign="top">
        <td align="center"><?php echo $no2; ?></td>
        <td align="left"><?php echo $rd['masalah_dominan'];?></td>
        <td align="right"><?php echo $rd['jml']; ?></td>
        <td align="right"><?php echo number_format(($rd['jml']/$TotalLot)*100,2)." %";?></td>
    </tr>
    <?php	$no2++;  
    $totalcased=$totalcased+$rd['jml'];
    } 
    $totaldll=$rAll['jml_all']-$totalcased;?>
    <tr valign="top">
        <td align="center" colspan="2"><strong>DLL</strong></td>
        <td align="right"><strong><?php echo $totaldll; ?></strong></td>
        <td align="right"><strong><?php echo number_format(($totaldll/$TotalLot)*100,2)." %"; ?></strong></td>
    </tr>
    <tr valign="top">
        <td align="center" colspan="2"><strong>TOTAL LOT KIRIM</td>
        <td align="right"><strong><?php echo $TotalLot; ?></strong></td>
        <td align="right">&nbsp;</strong></td>
    </tr>
</table>
</body>