<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Summary-5Besar-Dept-Penyebab-TotalKirim-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
include "../../koneksi.php";
//--
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$TotalKirim=$_GET['total'];
?>
<body>

<strong>Periode: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong><br>
<table width="100%" border="1">
    <tr>
      <th bgcolor="#12C9F0">NO.</th>
      <th bgcolor="#12C9F0">DEPT</th>
      <th bgcolor="#12C9F0">JUMLAH KASUS</th>
      <th bgcolor="#12C9F0">QTY KELUHAN (KG)</th>
      <th bgcolor="#12C9F0">% DIBANDINGKAN TOTAL KELUHAN</th>
      <th bgcolor="#12C9F0">% DIBANDINGKAN TOTAL KIRIM</th>
    </tr>
	<?php 
	$no2=1;
    $total=0;
    $totaldll=0;
    $qryAll=mysqli_query($con,"SELECT COUNT(*) AS jml_all, SUM(qty_claim) AS qty_claim_all FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (t_jawab!='' OR t_jawab!=NULL) AND (bprc IS NULL OR bprc = '')");
    $rAll=mysqli_fetch_array($qryAll);
    $qrydef=mysqli_query($con,"SELECT a.t_jawab, SUM(a.qty_claim_dept) as qty_claim_dept, SUM(a.jml_tjawab) as jml_tjawab
    from
    (SELECT 
    t_jawab,
    SUM(IF(t_jawab2!='',qty_claim/3,IF(t_jawab1!='',qty_claim/2,qty_claim))) AS qty_claim_dept,
    COUNT(*) as jml_tjawab
    FROM
    db_qc.`tbl_aftersales_now`
    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (t_jawab!='' OR t_jawab!=NULL) AND (bprc IS NULL OR bprc = '')
    GROUP BY t_jawab
    union distinct 
    select t_jawab1, 
    SUM(IF(t_jawab2!='',qty_claim/3,IF(t_jawab1!='',qty_claim/2,qty_claim))) AS qty_claim_dept,
    COUNT(*) as jml_tjawab1
    FROM
    db_qc.`tbl_aftersales_now`
    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (t_jawab1!='' OR t_jawab1!=NULL) AND (bprc IS NULL OR bprc = '')
    GROUP BY t_jawab1
    union distinct
    select t_jawab2, 
    SUM(IF(t_jawab2!='',qty_claim/3,IF(t_jawab1!='',qty_claim/2,qty_claim))) AS qty_claim_dept,
    COUNT(*) as jml_tjawab2
    FROM
    db_qc.`tbl_aftersales_now`
    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (t_jawab2!='' OR t_jawab2!=NULL) AND (bprc IS NULL OR bprc = '')
    GROUP BY t_jawab2) a
    group by a.t_jawab
    ORDER BY qty_claim_dept DESC");
    while($rd=mysqli_fetch_array($qrydef)){
    ?>
    <tr valign="top">
        <td align="center"><?php echo $no2; ?></td>
        <td align="left"><?php echo $rd['t_jawab'];?></td>
        <td align="right"><?php echo $rd['jml_tjawab']; ?></td>
        <td align="right"><?php echo number_format($rd['qty_claim_dept'], 2); ?></td>
        <td align="right"><?php echo number_format(($rd['qty_claim_dept']/$rAll['qty_claim_all'])*100,2)." %";?></td>
        <td align="right"><?php echo number_format(($rd['qty_claim_dept']/$TotalKirim)*100,2)." %";?></td>
    </tr>
    <?php	$no2++;  
    $total=$total+$rd['qty_claim_dept'];
    } 
    $totaldll=$rAll['qty_claim_all']-$total;?>
    <!-- <tr valign="top">
        <td align="center" colspan="2"><strong>DLL</strong></td>
        <td align="right"><strong><?php //echo number_format($totaldll,2); ?></strong></td>
        <td align="right"><strong><?php //echo number_format(($totaldll/$TotalKirim)*100,2)." %"; ?></strong></td>
    </tr> -->
    <tr valign="top">
        <td align="center" colspan="2"><strong>TOTAL KIRIM</td>
        <td></td>
        <td align="right"><strong><?php echo number_format($TotalKirim,2); ?></strong></td>
        <td align="right">&nbsp;</td>
    </tr>
</table>
</body>