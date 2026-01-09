<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=5Besar-Masalah-PerLangganan-BonPenghubung-" . substr($_GET['awal'], 0, 10) . ".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php
include "../../koneksi.php";

$Awal = $_GET['awal'];
$Akhir = $_GET['akhir'];
$Langganan = $_GET['langganan'];
$TotalKirim = $_GET['kirim'];
?>

<body>

    <strong>Periode: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong><br>
    <?php
    if ($Langganan != '') {
        $lgn = " AND tq.pelanggan LIKE '%$Langganan%' ";
    }

    $query = mysqli_query($con, "select
                                        tq.*
                                    from
                                        tbl_qcf tq
                                    where
                                        tq.sts_pbon != '10'
                                        AND DATE_FORMAT( tq.tgl_masuk, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir'
                                        and (tq.penghubung_masalah != ''
                                            or tq.penghubung_keterangan != ''
                                            or tq.penghubung_roll1 != ''
                                            or tq.penghubung_roll2 != ''
                                            or tq.penghubung_roll3 != ''
                                            or tq.penghubung_dep != ''
                                            or tq.penghubung_dep_persen != '') $lgn
                                    group by
                                        tq.no_order,
                                        tq.no_po,
                                        tq.no_hanger,
                                        tq.no_item,
                                        tq.warna,
                                        tq.pelanggan");

    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['penghubung2_roll1'] and $row['penghubung2_roll1'] != '') {
            $row['qty_kg'] = $row['penghubung2_roll2'];
            $row['penghubung_masalah_x'] = $row['penghubung2_masalah'];
            $data[] = $row;
        }
        if ($row['penghubung3_roll1'] and $row['penghubung3_roll1'] != '') {
            $row['qty_kg'] = $row['penghubung3_roll2'];
            $row['penghubung_masalah_x'] = $row['penghubung3_masalah'];
            $data[] = $row;
        }
        $row['qty_kg'] = $row['penghubung_roll2'];
        $row['penghubung_masalah_x'] = $row['penghubung_masalah'];
        $data[] = $row;
    }

    $groupPelanggan = [];
    $sumQtyPelanggan = [];
    foreach ($data as $key => $value) {
        $pelanggan = $value['pelanggan'];
        if (!isset($groupPelanggan[$pelanggan])) {
            $groupPelanggan[$pelanggan] = [];
            $sumQtyPelanggan[$pelanggan] = 0;
        }
        $groupPelanggan[$pelanggan][$key] = $value;
        $sumQtyPelanggan[$pelanggan] += (double) $value['qty_kg'];
    }
    arsort($sumQtyPelanggan);
    $top5Pelanggan = array_slice($sumQtyPelanggan, 0, 5);

    $penghubungMasalah = [];
    foreach ($top5Pelanggan as $key => $value) {
        $tempPenghubungMasalah = [];
        foreach ($data as $key2 => $value2) {
            $penghubung = $value2['penghubung_masalah_x'];
            if ($key == $value2['pelanggan']) {
                if (!isset($tempPenghubungMasalah[$penghubung])) {
                    $tempPenghubungMasalah[$penghubung]['qty_kg'] = 0;
                    $tempPenghubungMasalah[$penghubung]['jumlah_masalah'] = 0;
                    $tempPenghubungMasalah[$penghubung]['hanger'][$value2['no_hanger']] = 0;
                }
                $tempPenghubungMasalah[$penghubung]['qty_kg'] += (double) $value2['qty_kg'];
                $tempPenghubungMasalah[$penghubung]['jumlah_masalah'] += 1;
                $tempPenghubungMasalah[$penghubung]['hanger'][$value2['no_hanger']] += (double) $value2['qty_kg'];
            }
        }
        arsort($tempPenghubungMasalah);
        $penghubungMasalah[$key] = array_slice($tempPenghubungMasalah, 0, 3);
    }

    // 5 langganan terbesar
    $LanggananTerbesar = [];
    foreach ($penghubungMasalah as $key => $value) {
        $tempTotalQtyKg = 0;
        $tempTotalJumlahMasalah = 0;
        foreach ($value as $key2 => $value2) {
            $tempTotalQtyKg += $value2['qty_kg'];
            $tempTotalJumlahMasalah += $value2['jumlah_masalah'];
        }
        $LanggananTerbesar[$key]['total_kg'] = $tempTotalQtyKg;
        $LanggananTerbesar[$key]['total_jumlah_masalah'] = $tempTotalJumlahMasalah;
    }

    $totalKeluhanKG = 0;
    foreach ($LanggananTerbesar as $key => $value) {
        $totalKeluhanKG += $value['total_kg'];
    }
    ?>
    <table border="1">
        <thead>
            <tr>
                <th width="15%">
                    <div align="center">Pelanggan</div>
                </th>
                <th width="20%">
                    <div align="center">Masalah</div>
                </th>
                <th width="20%">
                    <div align="center">Jumlah Kasus</div>
                </th>
                <th width="14%">
                    <div align="center">KG</div>
                </th>
                <th width="15%">
                    <div align="center">% Dibandingkan Total Bon Penghubung</div>
                </th>
                <th width="15%">
                    <div align="center">% Dibandingkan Total Kirim</div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($LanggananTerbesar as $key => $value) {
                $satu = 1;
                foreach ($penghubungMasalah[$key] as $key2 => $value2) {
                    ?>
                    <tr valign="top" <?= $satu > 0 ? 'style="border-top:2px solid #aaa;"' : ''; ?>>
                        <td align="left"><?= $satu > 0 ? $key : '' ?></td>
                        <td align="right"><?= $key2 ?></td>
                        <td align="right"><?= $value2['jumlah_masalah'] ?></td>
                        <td align="right"><?= $value2['qty_kg'] ?></td>
                        <td align="right">
                            <?= ($TotalKirim != '') ? number_format(($value2['qty_kg'] / $totalKeluhanKG) * 100, 2) . " %" : "0"; ?>
                        </td>
                        <td align="right">
                            <?= ($TotalKirim != '') ? number_format(($value2['qty_kg'] / $TotalKirim) * 100, 2) . " %" : "0"; ?>
                        </td>
                    </tr>
                    <?php
                    $satu--;
                }
            }
            ?>
        </tbody>
        <tfoot>
            <tr valign="top">
                <td align="center" colspan="1"><strong>TOTAL KIRIM</strong></td>
                <td align="right" colspan="1">
                    <strong><?= ($TotalKirim != "") ? number_format($TotalKirim, 2) : "0"; ?></strong>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tfoot>
    </table>
</body>