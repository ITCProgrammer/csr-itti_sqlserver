<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=5Besar-Masalah-PerHanger-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
include "../../koneksi.php";
//--
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$Langganan = $_GET['langganan'];
$Kirim=$_GET['kirim'];
?>
<body>

<strong>Periode: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong><br>
<table width="100%" border="1">
    <thead>
        <tr>
        <th bgcolor="#12C9F0">Hanger</th>
        <th bgcolor="#12C9F0">Masalah</th>
        <th bgcolor="#12C9F0">Jumlah Kasus</th>
        <th bgcolor="#12C9F0">KG</th>
        <th bgcolor="#12C9F0">% Dibandingan Total Keluhan</th>
        <th bgcolor="#12C9F0">% Dibandingkan Total Kirim</th>
        <th bgcolor="#12C9F0">% Masalah Per Hanger</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    if($Langganan!=''){$lgn=" AND langganan LIKE '%$Langganan%' ";}else{$lgn="";}
    $qry7Total5 = mysqli_query($con, "SELECT
                                            temp.no_hanger,
                                            count(*) as jml_kasus
                                        from
                                            (
                                            select
                                                *
                                            from
                                                tbl_aftersales_now
                                            where
                                                tgl_buat between '$Awal' AND '$Akhir' $lgn AND (bprc IS NULL OR bprc = '')
                                            group by
                                                po,
                                                no_hanger,
                                                warna,
                                                masalah_dominan,
                                                qty_order
                                            order by
                                                tgl_buat asc) temp
                                        group by 
                                            temp.no_hanger
                                        order by
                                            jml_kasus desc
                                        limit 5");
    $ri7Total = 0;
    while($ri7Total5 = mysqli_fetch_array($qry7Total5)) {
        $qry7Total3 = mysqli_query($con, "SELECT
                                                sum(temp2.qty_keluhan) as total_qty_keluhan
                                            from (
                                            select
                                                temp.masalah_dominan,
                                                sum(temp.qty_claim_gabung) as qty_keluhan
                                            from
                                                (
                                                select
                                                    *,
                                                    sum(qty_claim) as qty_claim_gabung
                                                from
                                                    tbl_aftersales_now
                                                where
                                                    no_hanger = '$ri7Total5[no_hanger]'
                                                    and tgl_buat between '$Awal' AND '$Akhir' $lgn AND (bprc IS NULL OR bprc = '')
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
                                                qty_keluhan desc
                                            limit 3) temp2");
        $ri7Total3 = mysqli_fetch_array($qry7Total3);
        $ri7Total += $ri7Total3['total_qty_keluhan'];
    }

    $qry7=mysqli_query($con,"SELECT
                                temp.no_hanger,
                                count(*) as jml_kasus
                            from
                                (
                                select
                                    *
                                from
                                    tbl_aftersales_now
                                where
                                    tgl_buat between '$Awal' AND '$Akhir' $lgn AND (bprc IS NULL OR bprc = '')
                                group by
                                    po,
                                    no_hanger,
                                    warna,
                                    masalah_dominan,
                                    qty_order
                                order by
                                    tgl_buat asc) temp
                            group by 
                                temp.no_hanger
                            order by
                                jml_kasus desc
                            limit 5");
    while($ri7=mysqli_fetch_array($qry7)){
        $qryd7=mysqli_query($con,"SELECT
                                        temp.masalah_dominan,
                                        sum(temp.qty_claim_gabung) as qty_keluhan,
                                        count(*) as jml_kasus 
                                    from
                                        (
                                        select
                                            *,
                                            sum(qty_claim) as qty_claim_gabung
                                        from
                                            tbl_aftersales_now
                                        where
                                            no_hanger = '$ri7[no_hanger]'
                                            and tgl_buat between '$Awal' AND '$Akhir' $lgn AND (bprc IS NULL OR bprc = '')
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
                                        qty_keluhan desc
                                    limit 3");
        $qrytitem=mysqli_query($con,"SELECT
                                        sum(temp2.qty_keluhan) as total_qty_keluhan
                                    from (
                                    SELECT
                                        temp.masalah_dominan,
                                        sum(temp.qty_claim_gabung) as qty_keluhan
                                    from
                                        (
                                        SELECT
                                            *,
                                            sum(qty_claim) as qty_claim_gabung
                                        from
                                            tbl_aftersales_now
                                        where
                                            no_hanger = '$ri7[no_hanger]'
                                            and tgl_buat between '$Awal' AND '$Akhir' $lgn AND (bprc IS NULL OR bprc = '')
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
                                        qty_keluhan desc
                                    limit 3) temp2");
        $ritem=mysqli_fetch_array($qrytitem);
        while($rdi7=mysqli_fetch_array($qryd7)){
    ?>
    <tr valign="top">
        <td align="center"><?php echo $ri7['no_hanger'];?></td>  
        <td align="right"><?php echo $rdi7['masalah_dominan'];?></td>
        <td align="right"><?php echo $rdi7['jml_kasus'];?></td>
        <td align="right"><?php echo $rdi7['qty_keluhan'];?></td>
        <td align="right"><?php if($_GET['totalk']!=''){echo number_format(($rdi7['qty_keluhan']/$_GET['totalk'])*100,2)." %";}else{echo "0";}?></td>
        <td align="right"><?php if($_GET['kirim']!=''){echo number_format(($rdi7['qty_keluhan']/$_GET['kirim'])*100,2)." %";}else{echo "0";}?></td>
        <td align="right"><?php if($_GET['kirim']!=''){echo number_format(($rdi7['qty_keluhan']/$ritem['total_qty_keluhan'])*100,2)." %";}else{echo "0";}?></td>
        </tr>
    <?php  
    $tkirim=$tkirim+$_GET['kirim'];} } 
    ?>
    </tbody>
    <tfoot>
        <tr valign="top">
            <td align="center" colspan="1"><strong>TOTAL KIRIM</strong></td>
            <td align="right" colspan="1"><strong><?php if($_GET['kirim']!=''){echo number_format($_GET['kirim'],2);} ?></strong></td>
        </tr>
    </tfoot>
</table>
</body>