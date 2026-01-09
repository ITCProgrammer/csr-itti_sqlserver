<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$no_po = isset($_GET['no_po']) ? $_GET['no_po'] : '';
$no_hanger = isset($_GET['no_hanger']) ? $_GET['no_hanger'] : '';
$no_warna = isset($_GET['no_warna']) ? $_GET['no_warna'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title >Detail Bon Penghubung</title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css"> -->
</head>
<body>

    
    <!-- <h5><strong>No Order : <?php echo htmlspecialchars($no_order); ?></strong></h5>
    <h5><strong>No Item : <?php echo htmlspecialchars($no_item); ?></strong></h5>
    <h5><strong>No Warna : <?php echo htmlspecialchars($no_warna); ?></strong></h5> -->
    <hr>
    <div align="center" style="border: 2px solid black; font-size: 25px;"><strong>Detail Bon Penghubung</strong></div>
    <br>
    <table style="width: 100%; table-layout: fixed;">
        <thead>
            <tr >
                <th style="border: 2px solid black; text-align: center;" rowspan="2">No</th>
                <th style="border: 2px solid black; text-align: center;" rowspan="2">Status</th>
                <th style="border: 2px solid black; text-align: center;" colspan="2">Qty FOC</th>
                <th style="border: 2px solid black; text-align: center;" colspan="2">Estimasi FOC</th>
                <th style="border: 2px solid black; text-align: center;" rowspan="2">Lot-Legacy</th>
                <th style="border: 2px solid black; text-align: center;" rowspan="2">Lot</th>
                <th style="border: 2px solid black; text-align: center;" rowspan="2">Demand</th>
                <th style="border: 2px solid black; text-align: center;" rowspan="2">Issue</th>
                <th style="border: 2px solid black; text-align: center;" rowspan="2">Notes</th>
                <th style="border: 2px solid black; text-align: center;" rowspan="2">Responsibility</th>
                <th style="border: 2px solid black; text-align: center;" rowspan="2">Inspection Report</th>
            </tr>
            <tr>
                <th style="border: 2px solid black; text-align: center;">Kg</th>
                <th style="border: 2px solid black; text-align: center;">Yard</th>
                <th style="border: 2px solid black; text-align: center;">Kg</th>
                <th style="border: 2px solid black; text-align: center;">Yard</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total_berat_order = 0;
            $total_panjang_order = 0;
            $total_estimasi = 0;
            $total_panjang_estimasi = 0;
            $sqldtl = "SELECT
                tq.*,
                GROUP_CONCAT(DISTINCT b.no_ncp_gabungan SEPARATOR ', ') AS no_ncp,
                GROUP_CONCAT(DISTINCT b.masalah_dominan SEPARATOR ', ') AS masalah_utama,
                GROUP_CONCAT(DISTINCT b.akar_masalah SEPARATOR ', ') AS akar_masalah,
                GROUP_CONCAT(DISTINCT b.solusi_panjang SEPARATOR ', ') AS solusi_panjang,
                tli.qty_loss AS qty_sisa,
                tli.satuan AS satuan_sisa,
                c.masalah_dominan,
                c.ket
            FROM
                tbl_qcf tq
                LEFT JOIN tbl_lap_inspeksi tli ON tq.nodemand = tli.nodemand AND tq.no_order = tli.no_order
                LEFT JOIN tbl_ncp_qcf_now b ON tq.nodemand = b.nodemand
                LEFT JOIN tbl_aftersales_now c ON c.nodemand = tq.nodemand AND c.nokk = tq.nokk
            WHERE
                tq.sts_pbon != '10'
                AND (
                    tq.penghubung_masalah != ''
                    OR tq.penghubung_keterangan != ''
                    OR tq.penghubung_roll1 != ''
                    OR tq.penghubung_roll2 != ''
                    OR tq.penghubung_roll3 != ''
                    OR tq.penghubung_dep != ''
                    OR tq.penghubung_dep_persen != ''
                )
                AND tq.no_po = '" . mysqli_real_escape_string($con, $no_po) . "'
                AND tq.no_hanger = '" . mysqli_real_escape_string($con, $no_hanger) . "'
                AND tq.no_warna = '" . mysqli_real_escape_string($con, $no_warna) . "'
            GROUP BY
                tq.no_order,
                tq.no_po,
                tq.no_hanger,
                tq.no_item,
                tq.warna,
                tq.pelanggan,
                tq.tgl_masuk,
                tq.nodemand
            ";
            $stmt = mysqli_query($con, $sqldtl);
            while($r = mysqli_fetch_array($stmt)){
                $total_berat_order += (float)$r['berat_order'];
                $total_panjang_order += (float)$r['panjang_order'];
                $total_estimasi += (float)$r['estimasi'];
                $total_panjang_estimasi += (float)$r['panjang_estimasi'];
            ?>
            <tr>
                <td style="border: 2px solid black;" align="center"><?php echo $no;?></td>
                <td style="border: 2px solid black;" align="center"><?php $rsts= mysqli_query($con,"SELECT * FROM tbl_bonpenghubung_mail WHERE nodemand='$r[nodemand]' ");
                    $dtsts = mysqli_fetch_assoc($rsts);
                    if($dtsts['status_approve']==1){
                    echo 'APPROVE OLEH : '.$dtsts['approve_mkt'];
                    }else if($dtsts['status_approve']==99){
                    echo 'REJECT OLEH : '.$dtsts['approve_mkt'];
                    }else if($dtsts['status_approve']==2){
                    echo 'CLOSED OLEH : '.$dtsts['closed_ppc'];
                    } else {
                    echo '';
                    }?></td>
                <td style="border: 2px solid black;" align="center"><?php echo $r['berat_order'];?></td>
                <td style="border: 2px solid black;" align="center"><?php echo $r['panjang_order'];?></td>
                <td style="border: 2px solid black;" align="center"><?php echo $r['estimasi'];?></td>
                <td style="border: 2px solid black;" align="center"><?php echo $r['panjang_estimasi'];?></td>
                <td style="border: 2px solid black;" align="center"><?php echo $r['lot_legacy']; // Lot-Legacy ?></td>
                <td style="border: 2px solid black;" align="center"><?php echo $r['lot']; // Lot ?></td>
                <td style="border: 2px solid black;" align="center"><?php echo $r['nodemand']; // Demand ?></td>
                <td style="border: 2px solid black;" align="center"><?php echo $r['penghubung_masalah']; // Issue ?></td>
                <td style="border: 2px solid black;" align="center"><?php echo $r['penghubung_keterangan']; // Notes ?></td>
                <td style="border: 2px solid black;" align="center"><?php echo $r['penghubung_dep'].$r['penghubung_dep_persen']; // Responsibility ?></td>
                <td style="border: 2px solid black;">
                     <a style="color: #E95D4E; font-size:10px; font-family: Microsoft Sans Serif;" href="cetak/cetak_inspectpackingreport.php?demand=<?= $r['nodemand']; ?>&ispacking=true" target="_blank">Inspect Report <i class="fa fa-link"></i></a>
                </td>
            </tr>
            <?php $no++;}?>
        </tbody>
        <tfoot>
            <tr style="background:#f5f5f5; font-weight:bold;">
                <td colspan="2" style="border:2px solid black; text-align:right;">Total</td>
                <td style="border:2px solid black; text-align:center;"><?php echo number_format($total_berat_order,2); ?></td>
                <td style="border:2px solid black; text-align:center;"><?php echo number_format($total_panjang_order,2); ?></td>
                <td style="border:2px solid black; text-align:center;"><?php echo number_format($total_estimasi,2); ?></td>
                <td style="border:2px solid black; text-align:center;"><?php echo number_format($total_panjang_estimasi,2); ?></td>
                <td colspan="7" style="border:2px solid black;"></td>
            </tr>
        </tfoot>
    </table>
    </div>
</div>
</body>
</html>
