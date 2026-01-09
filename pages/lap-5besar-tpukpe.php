<?php
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

$Awal = isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir = isset($_POST['akhir']) ? $_POST['akhir'] : '';

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

        .top-5-besar tr,
        .top-5-besar th,
        .top-5-besar td {
            border: 1px solid #909090 !important;
        }

        .top-5-besar td {
            vertical-align: middle !important;
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
    <!--Section 2 -->
    <div class="row">

        <!-- 5 Item Terbesar TPUKPE -->
        <div class="col-xs-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> 5 ITEM TERBESAR TPUKPE PERIODE <?= $Awal ?> S/D <?= $Akhir ?>
                    </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped top-5-besar" style="width: 100%;">
                        <thead class="bg-blue">
                            <tr>
                                <th width="5%">
                                    <div align="center">Hanger</div>
                                </th>
                                <th width="25%">
                                    <div align="center">Masalah</div>
                                </th>
                                <th width="14%">
                                    <div align="center">KG</div>
                                </th>
                                <th width="15%">
                                    <div align="center">% Dibandingkan Total qty TPUKPE (kg)</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "select 
                                                            b.no_hanger
                                                        from tbl_tpukpe_now a
                                                        left join tbl_aftersales_now b
                                                        on a.id_nsp = b.id
                                                        where DATE_FORMAT( a.tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir'
                                                        group by b.no_hanger
                                                        order by sum(a.qty) desc 
                                                        limit 5");

                            $queryTotalTPUKPE = mysqli_query($con, "select
                                                                        sum(qty) as total_tpukpe
                                                                    from
                                                                        tbl_tpukpe_now
                                                                    where
                                                                        DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) between '$Awal' AND '$Akhir' ");
                            $rowTotalTPUKPE = mysqli_fetch_array($queryTotalTPUKPE);

                            while ($row = mysqli_fetch_array($query)) {
                                $query2 = mysqli_query($con, "select 
                                                                    b.no_hanger,
                                                                    a.masalah_dominan,
                                                                    sum(a.qty) as kg
                                                                from tbl_tpukpe_now a
                                                                left join tbl_aftersales_now b
                                                                on a.id_nsp = b.id
                                                                where 
                                                                DATE_FORMAT( a.tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir'
                                                                and b.no_hanger = '$row[no_hanger]'
                                                                group by b.no_hanger, a.masalah_dominan
                                                                order by kg desc
                                                                limit 3");

                                $rowspan = mysqli_num_rows($query2);
                                $count = 0;
                                while ($row2 = mysqli_fetch_array($query2)) {
                                    ?>
                                    <tr valign="top">
                                        <?php
                                        if ($count < 1) {
                                            ?>
                                            <td align="center" rowspan="<?= $rowspan ?>">
                                                <?= $row2['no_hanger'] ?>
                                            </td>
                                        <?php } ?>
                                        <td align="left">
                                            <?= $row2['masalah_dominan'] ?>
                                        </td>
                                        <td align="center">
                                            <?= $row2['kg'] ?>
                                        </td>
                                        <td align="center">
                                            <?= number_format(($row2['kg'] / $rowTotalTPUKPE['total_tpukpe']) * 100, 2, '.', '') . '%' ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $count = 1;
                                }
                            }
                            ?>
                        </tbody>

                    </table>
                    <div class="box-footer">
                        <!-- <a href="pages/cetak/excel_5besar_def_tpukpe1.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>"
                            class="btn btn-success <?php if ($_POST['awal'] == "") {
                                echo "disabled";
                            } ?>"
                            target="_blank"><i class="fa fa-file-excel-o"></i></a> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 Pelanggan Terbesar TPUKPE -->
        <div class="col-xs-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> 3 PELANGGAN TERBESAR TPUKPE PERIODE <?= $Awal ?> S/D <?= $Akhir ?>
                    </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped top-5-besar" style="width: 100%;">
                        <thead class="bg-blue">
                            <tr>
                                <th width="5%">
                                    <div align="center">Pelanggan</div>
                                </th>
                                <th width="25%">
                                    <div align="center">Masalah</div>
                                </th>
                                <th width="14%">
                                    <div align="center">KG</div>
                                </th>
                                <th width="15%">
                                    <div align="center">% Dibandingkan Total qty TPUKPE (kg)</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "select
                                                                substring_index(a.langganan, '/', 1) as buyer
                                                            from
                                                                tbl_tpukpe_now a
                                                            left join tbl_aftersales_now b on
                                                                a.id_nsp = b.id
                                                            where
                                                                DATE_FORMAT( a.tgl_buat, '%Y-%m-%d' ) between '$Awal' AND '$Akhir'
                                                            group by
                                                                substring_index(a.langganan, '/', 1)
                                                            order by
                                                                sum(a.qty) desc
                                                            limit 3");

                            while ($row = mysqli_fetch_array($query)) {
                                $query2 = mysqli_query($con, "select
                                                                    a.masalah_dominan,
                                                                    sum(a.qty) as kg
                                                                from
                                                                    tbl_tpukpe_now a
                                                                left join tbl_aftersales_now b on
                                                                    a.id_nsp = b.id
                                                                where
                                                                    DATE_FORMAT( a.tgl_buat, '%Y-%m-%d' ) between '$Awal' AND '$Akhir'
                                                                    and substring_index(a.langganan, '/', 1) = '$row[buyer]'
                                                                group by
                                                                    a.masalah_dominan
                                                                order by
                                                                    sum(a.qty) desc
                                                                limit 3");

                                $rowspan = mysqli_num_rows($query2);
                                $count = 0;
                                while ($row2 = mysqli_fetch_array($query2)) {
                                    ?>
                                    <tr valign="top">
                                        <?php
                                        if ($count < 1) {
                                            ?>
                                            <td align="center" rowspan="<?= $rowspan ?>">
                                                <?= $row['buyer'] ?>
                                            </td>
                                        <?php } ?>
                                        <td align="left">
                                            <?= $row2['masalah_dominan'] ?>
                                        </td>
                                        <td align="center">
                                            <?= $row2['kg'] ?>
                                        </td>
                                        <td align="center">
                                            <?= number_format(($row2['kg'] / $rowTotalTPUKPE['total_tpukpe']) * 100, 2, '.', '') . '%' ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $count = 1;
                                }
                            }
                            ?>
                        </tbody>

                    </table>
                    <div class="box-footer">
                        <!-- <a href="pages/cetak/excel_5besar_def_tpukpe1.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>"
                            class="btn btn-success <?php if ($_POST['awal'] == "") {
                                echo "disabled";
                            } ?>"
                            target="_blank"><i class="fa fa-file-excel-o"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Section 3 -->
    <div class="row"></div>

    <!-- 5 Masalah Qty terbesar TPUKPE (QC) -->
    <div class="col-xs-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> 5 Masalah Qty terbesar TPUKPE (QC) PERIODE <?= $Awal ?> S/D <?= $Akhir ?>
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped top-5-besar" style="width: 100%;">
                    <thead class="bg-blue">
                        <tr>
                            <th width="5%">
                                <div align="center">No</div>
                            </th>
                            <th width="25%">
                                <div align="center">Masalah</div>
                            </th>
                            <th width="14%">
                                <div align="center">Qty</div>
                            </th>
                            <th width="14%">
                                <div align="center">Total Kasus</div>
                            </th>
                            <th width="15%">
                                <div align="center">%</div>
                            </th>
                        </tr>
                    </thead>
                    <?php if ($Awal != "" && $Akhir != "") { ?>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "select
                                                            a.masalah_dominan,
                                                            sum(a.qty) as qty,
                                                            count(*) as total_kasus
                                                        from
                                                            tbl_tpukpe_now a
                                                        where
                                                            DATE_FORMAT( a.tgl_buat, '%Y-%m-%d' ) between '$Awal' and '$Akhir'
                                                            and (t_jawab = 'QCF' or t_jawab1 = 'QCF' or t_jawab2 = 'QCF')
                                                        group by
                                                            a.masalah_dominan 
                                                        order by
                                                            sum(a.qty) desc
                                                        limit 5");

                            $queryTotal = mysqli_query($con, "select 
                                                                sum(temp.qty) as total_qty ,
                                                                sum(temp.total_kasus) as total_kasus
                                                                from (
                                                                    select
                                                                        a.masalah_dominan,
                                                                        sum(a.qty) as qty,
                                                                        count(*) as total_kasus
                                                                    from
                                                                        tbl_tpukpe_now a
                                                                    where
                                                                        DATE_FORMAT( a.tgl_buat, '%Y-%m-%d' ) between '$Awal' and '$Akhir'
                                                                        and (t_jawab = 'QCF' or t_jawab1 = 'QCF' or t_jawab2 = 'QCF')
                                                                    group by
                                                                        a.masalah_dominan 
                                                                    order by
                                                                        sum(a.qty) desc) temp");
                            $rowTotal = mysqli_fetch_array($queryTotal);

                            $no = 1;
                            $persen = 0;
                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td align="center"><?= $no++ ?></td>
                                    <td align="left"><?= $row['masalah_dominan'] ?></td>
                                    <td align="center"><?= $row['qty'] ?></td>
                                    <td align="center"><?= $row['total_kasus'] ?></td>
                                    <td align="center">
                                        <?= number_format(($row['qty'] / $rowTotal['total_qty']) * 100, 2, ',', '.') . '%' ?>
                                    </td>
                                </tr>
                                <?php
                                $persen += ($row['qty'] / $rowTotal['total_qty']) * 100;
                            }

                            $queryDLL = mysqli_query($con, "SELECT
                                                                SUM(a.qty) AS qty,
                                                                COUNT(*) AS total_kasus
                                                            FROM
                                                                tbl_tpukpe_now a
                                                            WHERE
                                                                DATE_FORMAT(a.tgl_buat, '%Y-%m-%d') BETWEEN '$Awal' AND '$Akhir'
                                                                AND (t_jawab = 'QCF' OR t_jawab1 = 'QCF' OR t_jawab2 = 'QCF')
                                                                AND a.masalah_dominan NOT IN (
                                                                    SELECT
                                                                        masalah_dominan
                                                                    FROM
                                                                        (
                                                                            SELECT
                                                                                a.masalah_dominan,
                                                                                SUM(a.qty) AS qty,
                                                                                COUNT(*) AS total_kasus
                                                                            FROM
                                                                                tbl_tpukpe_now a
                                                                            WHERE
                                                                                DATE_FORMAT(a.tgl_buat, '%Y-%m-%d') BETWEEN '$Awal' AND '$Akhir'
                                                                                AND (t_jawab = 'QCF' OR t_jawab1 = 'QCF' OR t_jawab2 = 'QCF')
                                                                            GROUP BY
                                                                                a.masalah_dominan
                                                                            ORDER BY
                                                                                SUM(a.qty) DESC
                                                                            LIMIT 5
                                                                        ) top5
                                                                )
                                                            ORDER BY
                                                                SUM(a.qty) DESC;
                                                            ");
                            $rowDLL = mysqli_fetch_array($queryDLL);

                            $persen += ($rowDLL['qty'] / $rowTotal['total_qty']) * 100;
                            ?>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td align="left">Lain lain</td>
                                <td align="center"><?= $rowDLL['qty'] ?></td>
                                <td align="center"><?= $rowDLL['total_kasus'] ?></td>
                                <td align="center">
                                    <?= number_format(($rowDLL['qty'] / $rowTotal['total_qty']) * 100, 2, ',', '.') . '%' ?>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong>Total</strong></td>
                                <td align="center"><strong><?= $rowTotal['total_qty'] ?></strong></td>
                                <td align="center"><strong><?= $rowTotal['total_kasus'] ?></strong></td>
                                <td align="center"><strong><?= number_format($persen, 2, ',', '.') . '%' ?></strong></td>
                            </tr>
                        </tfoot>
                    <?php } ?>
                </table>
                <div class="box-footer">
                    <!-- <a href="pages/cetak/excel_5besar_def_tpukpe1.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>"
                            class="btn btn-success <?php if ($_POST['awal'] == "") {
                                echo "disabled";
                            } ?>"
                            target="_blank"><i class="fa fa-file-excel-o"></i></a> -->
                </div>
            </div>
        </div>
    </div>

    <!-- 5 Kasus terbesar TPUKPE (QC) -->
    <div class="col-xs-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> 5 Kasus terbesar TPUKPE (QC) <?= $Awal ?> S/D <?= $Akhir ?>
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped top-5-besar" style="width: 100%;">
                    <thead class="bg-blue">
                        <tr>
                            <th width="5%">
                                <div align="center">No</div>
                            </th>
                            <th width="25%">
                                <div align="center">Masalah</div>
                            </th>
                            <th width="14%">
                                <div align="center">Total Kasus</div>
                            </th>
                            <th width="15%">
                                <div align="center">%</div>
                            </th>
                        </tr>
                    </thead>
                    <?php if ($Awal != "" && $Akhir != "") { ?>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "select
                                                                a.masalah_dominan,
                                                                count(*) as total_kasus
                                                            from
                                                                tbl_tpukpe_now a
                                                            where
                                                                DATE_FORMAT( a.tgl_buat, '%Y-%m-%d' ) between '$Awal' and '$Akhir'
                                                                and (t_jawab = 'QCF' or t_jawab1 = 'QCF' or t_jawab2 = 'QCF')
                                                            group by
                                                                a.masalah_dominan 
                                                            order by
                                                                total_kasus desc
                                                            limit 5");

                            $queryTotal = mysqli_query($con, "select sum(temp.total_kasus) as total_kasus 
                                                                from (
                                                                    select
                                                                        a.masalah_dominan,
                                                                        count(*) as total_kasus
                                                                    from
                                                                        tbl_tpukpe_now a
                                                                    where
                                                                        DATE_FORMAT( a.tgl_buat, '%Y-%m-%d' ) between '$Awal' and '$Akhir'
                                                                        and (t_jawab = 'QCF' or t_jawab1 = 'QCF' or t_jawab2 = 'QCF')
                                                                    group by
                                                                        a.masalah_dominan 
                                                                    order by
                                                                        total_kasus desc) temp");
                            $rowTotal = mysqli_fetch_array($queryTotal);

                            $no = 1;
                            $persen = 0;
                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td align="center"><?= $no++ ?></td>
                                    <td align="left"><?= $row['masalah_dominan'] ?></td>
                                    <td align="center"><?= $row['total_kasus'] ?></td>
                                    <td align="center">
                                        <?= number_format(($row['total_kasus'] / $rowTotal['total_kasus']) * 100, 2, ',', '.') . '%' ?>
                                    </td>
                                </tr>
                                <?php
                                $persen += ($row['total_kasus'] / $rowTotal['total_kasus']) * 100;
                            }

                            $queryDLL = mysqli_query($con, "SELECT
                                                                COUNT(*) AS total_kasus
                                                            FROM
                                                                tbl_tpukpe_now a
                                                            WHERE
                                                                DATE_FORMAT(a.tgl_buat, '%Y-%m-%d') BETWEEN '$Awal' and '$Akhir'
                                                                AND (
                                                                    t_jawab = 'QCF'
                                                                    OR t_jawab1 = 'QCF'
                                                                    OR t_jawab2 = 'QCF'
                                                                )
                                                                AND a.masalah_dominan NOT IN (
                                                                    SELECT
                                                                        masalah_dominan
                                                                    FROM (
                                                                        SELECT
                                                                            a.masalah_dominan,
                                                                            COUNT(*) AS total_kasus
                                                                        FROM
                                                                            tbl_tpukpe_now a
                                                                        WHERE
                                                                            DATE_FORMAT(a.tgl_buat, '%Y-%m-%d') BETWEEN '$Awal' and '$Akhir'
                                                                            AND (
                                                                                t_jawab = 'QCF'
                                                                                OR t_jawab1 = 'QCF'
                                                                                OR t_jawab2 = 'QCF'
                                                                            )
                                                                        GROUP BY
                                                                            a.masalah_dominan
                                                                        ORDER BY
                                                                            total_kasus DESC
                                                                        LIMIT 5
                                                                    ) AS top5
                                                                )
                                                            ORDER BY
                                                                total_kasus DESC;
                                                            ");
                            $rowDLL = mysqli_fetch_array($queryDLL);

                            $persen += ($rowDLL['total_kasus'] / $rowTotal['total_kasus']) * 100;
                            ?>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td align="left">Lain lain</td>
                                <td align="center"><?= $rowDLL['total_kasus'] ?></td>
                                <td align="center">
                                    <?= number_format(($rowDLL['total_kasus'] / $rowTotal['total_kasus']) * 100, 2, ',', '.') . '%' ?>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong>Total</strong></td>
                                <td align="center"><strong><?= $rowTotal['total_kasus'] ?></strong></td>
                                <td align="center"><strong><?= number_format($persen, 2, ',', '.') . '%' ?></strong></td>
                            </tr>
                        </tfoot>
                    <?php } ?>
                </table>
                <div class="box-footer">
                    <!-- <a href="pages/cetak/excel_5besar_def_tpukpe1.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>"
                            class="btn btn-success <?php if ($_POST['awal'] == "") {
                                echo "disabled";
                            } ?>"
                            target="_blank"><i class="fa fa-file-excel-o"></i></a> -->
                </div>
            </div>
        </div>
    </div>

    </div>

</body>

</html>
<script type="text/javascript">


</script>