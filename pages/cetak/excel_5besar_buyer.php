<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Summary-5-Buyer-Terbesar-KPE-TotalKirim-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
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
                <th bgcolor="#12C9F0">BRAND/BUYER</th>
                <th bgcolor="#12C9F0">JUMLAH KASUS</th>
                <th bgcolor="#12C9F0">QTY KELUHAN (KG)</th>
                <th bgcolor="#12C9F0">% DIBANDINGKAN TOTAL KELUHAN</th>
                <th bgcolor="#12C9F0">% DIBANDINGKAN TOTAL KIRIM</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $qry8Total = mysqli_query($con, "SELECT
                                                sum(temp2.qty_claim_gabung) as total_qty_claim
                                            from
                                                (
                                                select
                                                    temp.buyer,
                                                    count(*) as jml_kasus,
                                                    SUM(temp.qty_claim_gabung) as qty_claim_gabung
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
                                                    substring_index(temp.buyer, ' ', 1)
                                                order by
                                                    jml_kasus desc
                                                limit 5) temp2");
            $ri8Total=mysqli_fetch_array($qry8Total);
            $qry8=mysqli_query($con,"SELECT
                                        temp.buyer,
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
                                        substring_index(temp.buyer, ' ', 1)
                                    order by
                                        jml_kasus desc
                                    limit 5");
            $no=1;
            while($ri8=mysqli_fetch_array($qry8)){
            ?>
            <tr valign="top">
                <td align="center"><?= $no++ ?></td>  
                <td align="right"><?= $ri8['buyer'] ?></td>
                <td align="right"><?= $ri8['jml_kasus'] ?></td>
                <td align="right"><?= $ri8['qty_claim_lgn'] ?></td>
                <td align="right"><?php if($TotalKirim!=''){echo number_format(($ri8['qty_claim_lgn'] / $ri8Total['total_qty_claim']) * 100, 2). " %";}else{echo "0";} ?></td>
                <td align="right"><?php if($TotalKirim!=''){echo number_format(($ri8['qty_claim_lgn']/$TotalKirim)*100,2)." %";}else{echo "0";} ?></td>
            </tr>
            <?php
            } ?>
        </tbody>
        <tfoot>
            <tr valign="top">
                <td align="right" colspan="2"><strong>TOTAL KIRIM</strong></td>
                <td align="right" colspan="1"><strong><?php if($TotalKirim!=""){echo number_format($TotalKirim,2);}else{echo "0";} ?></strong></td>
            </tr>
        </tfoot>
    </table>
</body>