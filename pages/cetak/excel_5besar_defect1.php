<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Summary-5Besar-Defect-TotalKirim-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
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
      <th bgcolor="#12C9F0">DEFECT</th>
      <th bgcolor="#12C9F0">JUMLAH KASUS</th>
      <th bgcolor="#12C9F0">QTY KELUHAN (KG)</th>
      <th bgcolor="#12C9F0">% DIBANDINGKAN TOTAL KELUHAN</th>
      <th bgcolor="#12C9F0">% DIBANDINGKAN TOTAL KIRIM</th>
    </tr>
	<?php 
	$no2=1;
    $total=0;
    $totaldll=0;
    $qryAll=mysqli_query($con,"SELECT COUNT(*) AS jml_all, SUM(qty_claim) AS qty_claim_all FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND (bprc IS NULL OR bprc = '')");
    $rAll=mysqli_fetch_array($qryAll);
    $qrydef=mysqli_query($con,"SELECT
                                    temp.masalah_dominan,
                                    count(*) as jml_kasus,
                                    SUM(temp.qty_claim_gabung) as qty_claim_lgn
                                from
                                    (
                                    select
                                        *,
                                        sum(qty_claim) as qty_claim_gabung
                                    from
                                        tbl_aftersales_now
                                    where
                                        tgl_buat between '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '')
                                    group by
                                        po,
                                        no_hanger,
                                        warna,
                                        masalah_dominan,
                                        qty_order
                                    order by
                                        tgl_buat asc) temp
                                group by 
                                    temp.masalah_dominan
                                order by
                                    qty_claim_lgn desc
                                limit 5");
    while($rd=mysqli_fetch_array($qrydef)){
    ?>
    <tr valign="top">
        <td align="center"><?php echo $no2 ?></td>
        <td align="left"><?php echo $rd['masalah_dominan'];?></td>
        <td align="right"><?php echo $rd['jml_kasus'];?></td>
        <td align="right"><?php echo $rd['qty_claim_lgn'];?></td>
        <td align="right"><?php echo number_format(($rd['qty_claim_lgn']/$rAll['qty_claim_all'])*100,2)." %";?></td>
        <td align="right"><?php echo number_format(($rd['qty_claim_lgn']/$TotalKirim)*100,2)." %";?></td>
    </tr>
    <?php	$no2++;  
    $total=$total+$rd['qty_claim_lgn'];
    } 
    $totaldll=$rAll['qty_claim_all']-$total;?>
    <tr valign="top">
        <td align="center" colspan="2"><strong>DLL</strong></td>
        <td align="right"><strong></strong></td>
        <td align="right"><strong><?php echo number_format($totaldll,2); ?></strong></td>
        <td align="right"><strong><?php echo number_format(($totaldll/$rAll['qty_claim_all'])*100,2)." %"; ?></strong></td>
        <td align="right"><strong><?php echo number_format(($totaldll/$TotalKirim)*100,2)." %"; ?></strong></td>
    </tr>
    <tr valign="top">
        <td align="center" colspan="2"><strong>TOTAL KIRIM</td>
        <td align="right"><strong></strong></td>
        <td align="right"><strong><?php echo number_format($TotalKirim,2); ?></strong></td>
        <td align="right">&nbsp;</td>
    </tr>
</table>
</body>