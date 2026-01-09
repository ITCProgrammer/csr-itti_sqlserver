<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Summary-5Besar-Langganan-TotalKirim-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
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
      <th bgcolor="#12C9F0">LANGGANAN</th>
      <th bgcolor="#12C9F0">Jumlah Kasus</th>
      <th bgcolor="#12C9F0">QTY KELUHAN (KG)</th>
      <th bgcolor="#12C9F0">% DIBANDINGKAN TOTAL KELUHAN</th>
      <th bgcolor="#12C9F0">% DIBANDINGKAN TOTAL KIRIM</th>
    </tr>
	<?php 
	$no1=1;
    $total=0;
    $totaldll=0;
    $qryAll=mysqli_query($con,"SELECT COUNT(*) AS jml_all, SUM(qty_claim) AS qty_claim_all FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '')");
    $rAll=mysqli_fetch_array($qryAll);
    $qrylgn=mysqli_query($con,"SELECT COUNT(*) AS jml, SUM(qty_claim) AS qty_claim_lgn, ROUND(COUNT(pelanggan)/(SELECT COUNT(*) FROM tbl_aftersales_now WHERE tgl_buat BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = ''))*100,1) AS persen,
    pelanggan,
    langganan
    FROM
    `tbl_aftersales_now`
    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '')
    GROUP BY langganan
    ORDER BY qty_claim_lgn DESC LIMIT 5");
    while($r=mysqli_fetch_array($qrylgn)){
        $qryJumlahKasus = mysqli_query($con, "SELECT
                                                    count(*) as jumlah_kasus
                                                from (
                                                    select
                                                    *
                                                    from
                                                    tbl_aftersales_now
                                                where
                                                    langganan like '%$r[langganan]%'
                                                        AND tgl_buat BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '')
                                                group by
                                                    po,
                                                    no_hanger,
                                                    warna,
                                                    masalah_dominan,
                                                    qty_order,
                                                    langganan
                                                order by
                                                    tgl_buat asc
                                                ) temp");
        $rowQryJumlahKasus = mysqli_fetch_array($qryJumlahKasus);
	?>
        <tr valign="top">
            <td align="center"><?php echo $no1; ?></td>
            <td align="left"><?php echo explode('/', $r['langganan'])[0];?></td>
            <td align="right"><?php echo $rowQryJumlahKasus['jumlah_kasus']; ?></td>
            <td align="right"><?php echo $r['qty_claim_lgn']; ?></td>
            <td align="right"><?php echo number_format(($r['qty_claim_lgn']/(int)$rAll['qty_claim_all'])*100,2)." %"; ?></td>
            <td align="right"><?php echo number_format(($r['qty_claim_lgn']/$TotalKirim)*100,2)." %";?></td>
        </tr>
    <?php	$no1++;  
    $total=$total+$r['qty_claim_lgn'];
    } 
    $totaldll=$rAll['qty_claim_all']-$total;?>
    <tr valign="top">
        <td align="center" colspan="2"><strong>DLL</strong></td>
        <td align="right"><strong><?= ''//$totalLot ?></strong></td>
        <td align="right"><strong><?php echo number_format($totaldll,2); ?></strong></td>
        <td align="right"><strong><?php echo number_format(($totaldll/(int)$rAll['qty_claim_all'])*100,2)." %"; ?></strong></td>
        <td align="right"><strong><?php echo number_format(($totaldll/$TotalKirim)*100,2)." %"; ?></strong></td>
    </tr>
    <tr valign="top">
        <td align="center" colspan="2"><strong>TOTAL KIRIM</td>
        <td align="center"></td>
        <td align="right"><strong><?php echo number_format($TotalKirim,2); ?></strong></td>
        <td align="right">&nbsp;</strong></td>
    </tr>
</table>
</body>