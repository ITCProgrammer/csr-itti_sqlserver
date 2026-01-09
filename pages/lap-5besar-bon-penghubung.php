<?php
// ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

?>
<?php
$Awal = isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir = isset($_POST['akhir']) ? $_POST['akhir'] : '';
$TotalKirim = isset($_POST['total']) ? $_POST['total'] : '';
$Langganan = isset($_POST['langganan']) ? $_POST['langganan'] : '';
$TotalLot = isset($_POST['totallot']) ? $_POST['totallot'] : '';
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Grafik</title>
    <script src="plugins/highcharts/code/highcharts.js"></script>
    <script src="plugins/highcharts/code/highcharts-3d.js"></script>
    <script src="plugins/highcharts/code/modules/exporting.js"></script>
    <script src="plugins/highcharts/code/modules/export-data.js"></script>
    <style type="text/css">
        #container {
            height: 400px;
            min-width: 310px;
            max-width: 800px;
            margin: 0 auto;
        }

        #container1 {
            height: 400px;
            min-width: 310px;
            max-width: 800px;
            margin: 0 auto;
        }

        #container2 {
            height: 400px;
            min-width: 310px;
            max-width: 800px;
            margin: 0 auto;
        }

        #container3 {
            height: 400px;
            min-width: 310px;
            max-width: 800px;
            margin: 0 auto;
        }

        #container4 {
            height: 400px;
            min-width: 310px;
            max-width: 800px;
            margin: 0 auto;
        }

        #container5 {
            height: 400px;
            min-width: 310px;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Filter Grafik Per Periode</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
            <div class="box-body">
                <div class="form-group">
                    <div class="col-sm-2">
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                            <input name="awal" type="text" class="form-control pull-right" id="datepicker"
                                placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" />
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                            <input name="akhir" type="text" class="form-control pull-right" id="datepicker1"
                                placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" />
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group date">
                            <div class="input-group-addon"> Total Kirim</div>
                            <input name="total" type="text" class="form-control pull-right" placeholder="0"
                                value="<?php echo $TotalKirim; ?>" />
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group date">
                            <div class="input-group-addon"> Langganan</div>
                            <input name="langganan" type="text" class="form-control pull-right" placeholder="Langganan"
                                value="<?php echo $Langganan; ?>" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success " name="cari"><i class="fa fa-search"></i> Cari
                        Data</button>
                    <!-- /.input group -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
                <!-- /.box-footer -->

            </div>
        </form>
    </div>
    <!-- Section 3 -->
    <div class="row">
        <div class="col-xs-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> 5 Terbesar Masalah Per Hanger : <?php echo $Awal . " s/d " . $Akhir; ?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
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

                    $groupHanger = [];
                    $sumQtyHanger = [];
                    foreach ($data as $key => $value) {
                        $hanger = $value['no_hanger'];
                        if (!isset($groupHanger[$hanger])) {
                            $groupHanger[$hanger] = [];
                            $sumQtyHanger[$hanger] = 0;
                        }
                        $groupHanger[$hanger][$key] = $value;
                        $sumQtyHanger[$hanger] += $value['qty_kg'] ?: 0;
                    }
                    arsort($sumQtyHanger);
                    $top5Hanger = array_slice($sumQtyHanger, 0, 5);

                    $penghubungMasalah = [];
                    foreach ($top5Hanger as $key => $value) {
                        $tempPenghubungMasalah = [];
                        foreach ($data as $key2 => $value2) {
                            $penghubung = $value2['penghubung_masalah_x'];
                            if ($key == $value2['no_hanger']) {
                                if (!isset($tempPenghubungMasalah[$penghubung])) {
                                    $tempPenghubungMasalah[$penghubung]['qty_kg'] = 0;
                                    $tempPenghubungMasalah[$penghubung]['jumlah_masalah'] = 0;
                                }
                                $tempPenghubungMasalah[$penghubung]['qty_kg'] += $value2['qty_kg'] ?: 0;
                                $tempPenghubungMasalah[$penghubung]['jumlah_masalah'] += 1;
                            }
                        }
                        arsort($tempPenghubungMasalah);
                        $penghubungMasalah[$key] = array_slice($tempPenghubungMasalah, 0, 3);
                    }

                    // 5 hanger terbesar
                    $HangerTerbesar = [];
                    foreach ($penghubungMasalah as $key => $value) {
                        $tempTotalQtyKg = 0;
                        $tempTotalJumlahMasalah = 0;
                        foreach ($value as $key2 => $value2) {
                            $tempTotalQtyKg += $value2['qty_kg'];
                            $tempTotalJumlahMasalah += $value2['jumlah_masalah'];
                        }
                        $HangerTerbesar[$key]['total_kg'] = $tempTotalQtyKg;
                        $HangerTerbesar[$key]['total_jumlah_masalah'] = $tempTotalJumlahMasalah;
                    }

                    $totalKeluhanKG = 0;
                    foreach ($HangerTerbesar as $key => $value) {
                        $totalKeluhanKG += $value['total_kg'];
                    }

                    ?>
                    <table class="table table-bordered table-striped x" style="width: 100%;">
                        <thead class="bg-blue">
                            <tr>
                                <th width="15%">
                                    <div align="center">Hanger</div>
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
                                <th width="15%">
                                    <div align="center">% Masalah Per Hanger</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($top5Hanger as $key => $value) {
                                $satu = 1;
                                foreach ($penghubungMasalah[$key] as $key2 => $value2) {
                                    ?>
                                    <tr valign="top" <?= $satu > 0 ? 'style="border-top:2px solid #aaa;"' : ''; ?>>
                                        <td align="center"><?= $satu > 0 ? $key : '' ?></td>
                                        <td align="right"><?= $key2 ?></td>
                                        <td align="right"><?= $value2['jumlah_masalah'] ?></td>
                                        <td align="right"><?= $value2['qty_kg'] ?></td>
                                        <td align="right">
                                            <?= ($TotalKirim != '') ? number_format(($value2['qty_kg'] / $totalKeluhanKG) * 100, 2) . " %" : "0"; ?>
                                        </td>
                                        <td align="right">
                                            <?= ($TotalKirim != '') ? number_format(($value2['qty_kg'] / $TotalKirim) * 100, 2) . " %" : "0"; ?>
                                        </td>
                                        <td align="right">
                                            <?= ($TotalKirim != '') ? number_format(($value2['qty_kg'] / $value) * 100, 2) . " %" : "0"; ?>
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
                            </tr>
                        </tfoot>
                    </table>
                    <div class="box-footer">
                        <a href="pages/cetak/excel_5besar_masalah_item_bon_penghubung.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&langganan=<?php echo $_POST['langganan']; ?>&kirim=<?php echo $TotalKirim; ?>&totalk=<?= $ri7Total ?>"
                            class="btn btn-success <?= ($Awal == "") ? "disabled" : "" ?>"
                            target="_blank"><i class="fa fa-file-excel-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="col-xs-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> 5 Terbesar Masalah Per Langganan : <?php echo $Awal . " s/d " . $Akhir; ?>
                    </h3>
                    <!-- disini 2 -->
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
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
                    <table class="table table-bordered table-striped" style="width: 100%;">
                        <thead class="bg-blue">
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
                                <!-- <th width="15%">
                                    <div align="center">% Masalah Per Hanger</div>
                                </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($LanggananTerbesar as $key => $value) {
                                $satu = 1;
                                foreach ($penghubungMasalah[$key] as $key2 => $value2) {
                                    ?>
                                    <tr valign="top" <?= $satu > 0 ? 'style="border-top:2px solid #aaa;"' : ''; ?>>
                                        <td align="center"><?= $satu > 0 ? $key : '' ?></td>
                                        <td align="right"><?= $key2 ?></td>
                                        <td align="right"><?= $value2['jumlah_masalah'] ?></td>
                                        <td align="right"><?= $value2['qty_kg'] ?></td>
                                        <td align="right">
                                            <?= ($TotalKirim != '') ? number_format(($value2['qty_kg'] / $totalKeluhanKG) * 100, 2) . " %" : "0"; ?>
                                        </td>
                                        <td align="right">
                                            <?= ($TotalKirim != '') ? number_format(($value2['qty_kg'] / $TotalKirim) * 100, 2) . " %" : "0"; ?>
                                        </td>
                                        <!-- <td align="right">
                                        </td> -->
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
                            </tr>
                        </tfoot>
                    </table>
                    <div class="box-footer">
                        <a href="pages/cetak/excel_5_terbesar_masalah_per_langganan_bon_penghubung.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&langganan=<?php echo $_POST['langganan']; ?>&kirim=<?php echo $TotalKirim; ?>"
                            class="btn btn-success <?= ($Awal == "") ? "disabled" : "" ?>"
                            target="_blank"><i class="fa fa-file-excel-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>