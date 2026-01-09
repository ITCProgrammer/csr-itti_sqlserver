<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Summary-Solusi-KPE-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php
include "../../koneksi.php";
//--
$Awal = $_GET['awal'];
$Akhir = $_GET['akhir'];
$TotalKirim = $_GET['total'];
?>

<body>

    <strong>Periode:
        <?php echo $Awal; ?> s/d
        <?php echo $Akhir; ?>
    </strong><br>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th bgcolor="#12C9F0">NO.</th>
                <th bgcolor="#12C9F0">SOLUSI</th>
                <th bgcolor="#12C9F0">JUMLAH KASUS</th>
                <th bgcolor="#12C9F0">QTY KELUHAN (KG)</th>
                <th bgcolor="#12C9F0">QTY KELUHAN (YARD)</th>
                <th bgcolor="#12C9F0">QTY REPLACEMENT (KG)</th>
                <th bgcolor="#12C9F0">QTY REPLACEMENT (YARD)</th>
                <th bgcolor="#12C9F0">% DIBANDINGKAN TOTAL KELUHAN</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    if($Awal!=""){ 
                    $Where2 =" WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ";
                    $Where21 =" AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; 

                    $qry2Total = mysqli_query($con, "SELECT 
                                                        sum(a.qty_claim) as total_qty_claim
                                                    from (
                                                        select 
                                                        sum(qty_claim) as qty_claim
                                                        from tbl_aftersales_now
                                                        $Where2 AND (bprc IS NULL OR bprc = '')
                                                        group by solusi ) a");
                    $row2Total = mysqli_fetch_array($qry2Total);
                    
                    $query2 = mysqli_query($con, "SELECT
                                                        temp.solusi,
                                                        count(*) as jml_kasus
                                                    from
                                                        (
                                                        select
                                                            *,
                                                            sum(qty_claim) as qty_claim_gabung
                                                        from
                                                            tbl_aftersales_now
                                                        $Where2 AND (bprc IS NULL OR bprc = '')
                                                        group by
                                                            po,
                                                            no_hanger,
                                                            warna,
                                                            masalah_dominan,
                                                            qty_order
                                                        order by
                                                            tgl_buat asc) temp
                                                    group by 
                                                        temp.solusi
                                                    order by
                                                        jml_kasus desc");
                    $no = 1;
                    $total_jumlah_kasus = 0;
                    $total_qty_claim_kg = 0;
                    $total_qty_claim_yd = 0;
                    $total_qty_replacement_kg = 0;
                    $total_qty_replacement_yd = 0;
                    while($row2 = mysqli_fetch_array($query2)){

                    $query2KG = mysqli_query($con, "SELECT 
                                                        sum(qty_claim) as qty_claim
                                                    from tbl_aftersales_now
                                                    where solusi = '$row2[solusi]' and satuan_c = 'KG' $Where21 AND (bprc IS NULL OR bprc = '')
                                                    group by solusi");
                    $row2KG = mysqli_fetch_array($query2KG);

                    $query2YD = mysqli_query($con, "SELECT 
                                                        sum(qty_claim2) as qty_claim2
                                                    from tbl_aftersales_now
                                                    where solusi = '$row2[solusi]' and satuan_c2 in ('YD', 'MTR') $Where21 AND (bprc IS NULL OR bprc = '')
                                                    group by solusi");
                    $row2YD = mysqli_fetch_array($query2YD);

                    $query2ReplacementKG = mysqli_query($con, "SELECT
                                                                    sum(kg1) as qty_kg
                                                                from
                                                                    tbl_ganti_kain_now tgkn 
                                                                where
                                                                    solusi = '$row2[solusi]'
                                                                    $Where21 
                                                                group by
                                                                    solusi");
                    $row2ReplacementKG = mysqli_fetch_array($query2ReplacementKG);

                    $query2ReplacementYD = mysqli_query($con, "SELECT
                                                                    sum(pjg1) as qty_yard
                                                                from
                                                                    tbl_ganti_kain_now tgkn 
                                                                where
                                                                    solusi = '$row2[solusi]'
                                                                    and satuan1 in ('yard', 'meter')
                                                                    $Where21
                                                                group by
                                                                    solusi");
                    $row2ReplacementYD = mysqli_fetch_array($query2ReplacementYD);
                ?>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                    <td align="center"><?= $no; ?></td>
                    <td align="left"><?= $row2['solusi'] != "" ? $row2['solusi'] : "PENDING" ?></td>
                    <td align="center"><?= $row2['jml_kasus'] ?></td>
                    <td align="center"><?= number_format($row2KG['qty_claim'], 2) ?></td>
                    <td align="center"><?= number_format($row2YD['qty_claim2'], 2) ?></td>
                    <td align="center"><?= number_format($row2ReplacementKG['qty_kg'], 2) ?></td>
                    <td align="center"><?= number_format($row2ReplacementYD['qty_yard'], 2) ?></td>
                    <td align="center">
                    <?php
                        // if($row2KG['qty_claim'] != "") {
                        //   echo number_format(($row2KG['qty_claim'] / $row2Total['total_qty_claim']) * 100, 2) . ' %';
                        // } else if($row2YD['qty_claim'] != "") {
                        //   echo number_format(($row2YD['qty_claim'] / $row2Total['total_qty_claim']) * 100, 2) . ' %';
                        // }
                        echo number_format(($row2KG['qty_claim'] / $row2Total['total_qty_claim']) * 100, 2) . ' %';
                    ?>
                    </td>
                </tr>
                <?php
                    $no++;
                    $total_jumlah_kasus += $row2['jml_kasus'];
                    $total_qty_claim_kg += $row2KG['qty_claim'];
                    $total_qty_claim_yd += $row2YD['qty_claim2'];
                    $total_qty_replacement_kg += $row2ReplacementKG['qty_kg'];
                    $total_qty_replacement_yd += $row2ReplacementYD['qty_yard'];
                    }
                }
                ?>
                </tbody>
                <tfoot>
                <tr valign="top">
                    <td align="right" colspan="2"><strong>Total</strong></td>
                    <td align="center"><strong><?= !empty($Awal) ? number_format($total_jumlah_kasus, 2) : '' ?></strong></td>
                    <td align="center"><strong><?= !empty($Awal) ? number_format($total_qty_claim_kg, 2) : '' ?></strong></td>
                    <td align="center"><strong><?= !empty($Awal) ? number_format($total_qty_claim_yd, 2) : '' ?></strong></td>
                    <td align="center"><strong><?= !empty($Awal) ? number_format($total_qty_replacement_kg, 2) : '' ?></strong></td>
                    <td align="center"><strong><?= !empty($Awal) ? number_format($total_qty_replacement_yd, 2) : '' ?></strong></td>
                    <td align="center"></td>
                </tr>
                </tfoot>
    </table>
</body>