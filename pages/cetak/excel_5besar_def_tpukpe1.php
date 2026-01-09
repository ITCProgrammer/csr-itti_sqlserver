<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Summary-5Besar-Defect-TPUKPE-Kasus-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
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
    $no=1;
    $total=0;
    $totaldll=0;
    $qryAll=mysqli_query($con,"SELECT COUNT(*) AS jml_all FROM tbl_tpukpe WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL)");
    $rAll=mysqli_fetch_array($qryAll);
    $qrydef=mysqli_query($con,"SELECT COUNT(*) AS jml, ROUND(COUNT(masalah_dominan)/(SELECT COUNT(*) FROM tbl_tpukpe WHERE tgl_buat BETWEEN '$Awal' AND '$Akhir' 
    AND (masalah_dominan!='' OR masalah_dominan!=NULL))*100,1) AS persen,
    masalah_dominan
    FROM
    `tbl_tpukpe`
    WHERE tgl_buat BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL)
    GROUP BY masalah_dominan
    ORDER BY jml DESC, masalah_dominan ASC LIMIT 5");
    while($rd=mysqli_fetch_array($qrydef)){
    ?>
    <tr valign="top">
        <td align="center"><?php echo $no; ?></td>
        <td align="left"><?php echo $rd['masalah_dominan'];?></td>
        <td align="right"><?php echo $rd['jml']; ?></td>
        <td align="right"><?php echo number_format(($rd['jml']/$rAll['jml_all'])*100,2)." %";?></td>
    </tr>
    <?php	$no++; 
    $total=$total+$rd['jml']; 
    } 
    $totaldll=$rAll['jml_all']-$total; ?>
    <tr valign="top">
        <td align="center" colspan="2">LAIN LAIN</td>
        <td align="right"><?php echo $totaldll; ?></td>
        <td align="right"><?php echo number_format(($totaldll/$rAll['jml_all'])*100,2)." %"; ?></td>
    </tr>
    <tr valign="top">
        <td align="center" colspan="2"><strong>TOTAL</td>
        <td align="right"><strong><?php echo number_format($rAll['jml_all'],2); ?></strong></td>
        <td align="right"><?php echo number_format(($rAll['jml_all']/$rAll['jml_all'])*100,2)." %";?></td>
    </tr>
</table>
</body>