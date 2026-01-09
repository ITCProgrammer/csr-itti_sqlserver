<?PHP
ini_set("error_reporting", 1);
set_time_limit(0);
session_start();
include "koneksi.php";

$physical = [
    "FLAMMABILITY" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_fla",
            "note" => "fla_note",
        ]
    ],
    "FIBER CONTENT" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_fib",
            "note" => "fiber_note",
        ]
    ],
    "FABRIC COUNT" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_fc",
            "note" => "fc_note",
        ]
    ],
    "BOW & SKEW" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_bsk",
            "note" => "bas_note",
        ]
    ],
    "PILLING MARTINDLE" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_pm",
            "note" => "pillm_note",
        ]
    ],
    "PILLING LOCUS" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_pl",
            "note" => "pilll_note",
        ]
    ],
    "FABRIC WEIGHT & SHRINKAGE & SPIRALITY" => [
        [
            "alias" => "FABRIC WEIGHT",
            "conditional" => "",
            "status" => "stat_fwss2",
            "note" => "fwe_note",
        ],
        [
            "alias" => "FABRIC WIDTH",
            "conditional" => "",
            "status" => "stat_fwss3",
            "note" => "fwi_note",
        ],
        [
            "alias" => "SHRINKAGE & SPIRALITY",
            "conditional" => "",
            "status" => "stat_fwss",
            "note" => "sns_note",
        ],
        [
            "alias" => "SPIRALITY",
            "conditional" => "",
            "status" => "spirality_status",
            "note" => "",
        ],
    ],
    "PILLING BOX" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_pb",
            "note" => "pillb_note",
        ]
    ],
    "PILLING RANDOM TUMBLER" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_prt",
            "note" => "pillr_note",
        ]
    ],
    "ABRATION" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_abr",
            "note" => "abr_note",
        ]
    ],
    "SNAGGING MACE" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_sm",
            "note" => "snam_note",
        ]
    ],
    "SNAGGING POD" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_sp",
            "note" => "snap_note",
        ]
    ],
    "BEAN BAG" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_sb",
            "note" => "snab_note",
        ]
    ],
    "BURSTING STRENGTH" => [
        [
            "alias" => "BURSTING STRENGTH (INSTRON)",
            "conditional" => "bs_instron",
            "status" => "stat_bs2",
            "note" => "burs_note",
        ],
        [
            "alias" => "BURSTING STRENGTH (MULLEN)",
            "conditional" => "bs_mullen",
            "status" => "stat_bs3",
            "note" => "burs_note",
        ],
        [
            "alias" => "BURSTING STRENGTH (TRU)",
            "conditional" => "bs_tru",
            "status" => "stat_bs",
            "note" => "burs_note",
        ],
    ],
    "THICKNESS" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_th",
            "note" => "thick_note",
        ]
    ],
    "STRETCH & RECOVERY" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_sr",
            "note" => "stretch_note",
        ]
    ],
    "GROWTH" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_gr",
            "note" => "growth_note",
        ]
    ],
    "APPEARANCE" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_ap",
            "note" => "apper_note",
        ]
    ],
    "HEAT SHRINKAGE" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_hs",
            "note" => "h_shrinkage_note",
        ]
    ],
    "FIBRE/FUZZ" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_ff",
            "note" => "fibre_note",
        ]
    ],
    "ODOUR" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_odour",
            "note" => "odour_note",
        ]
    ],
    "CURLING" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_curling",
            "note" => "curling_note",
        ]
    ],
];

$functional = [
    "WICKING" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_wic",
            "note" => "wick_note",
        ]
    ],
    "ABSORBENCY" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_abs",
            "note" => "absor_note",
        ]
    ],
    "DRYING TIME" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_dry",
            "note" => "dry_note",
        ]
    ],
    "WATER REPPELENT" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_wp",
            "note" => "repp_note",
        ]
    ],
    "PH" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_ph",
            "note" => "ph_note",
        ]
    ],
    "SOIL RELEASE" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_sor",
            "note" => "soil_note",
        ]
    ],
    "HUMIDITY" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_hum",
            "note" => "humidity_note",
        ]
    ],
];

$colorfastness = [
    "WASHING" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_wf",
            "note" => "wash_note",
        ]
    ],
    "PERSPIRATION ACID" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_pac",
            "note" => "acid_note",
        ]
    ],
    "PERSPIRATION ALKALINE" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_pal",
            "note" => "alkaline_note",
        ]
    ],
    "WATER" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_wtr",
            "note" => "water_note",
        ]
    ],
    "CROCKING" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_cr",
            "note" => "crock_note",
        ]
    ],
    "PHENOLIC YELLOWING" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_py",
            "note" => "phenolic_note",
        ]
    ],
    "LIGHT" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_lg",
            "note" => "light_note",
        ]
    ],
    "COLOR MIGRATION-OVEN TEST" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_cmo",
            "note" => "cm_printing_note",
        ]
    ],
    "COLOR MIGRATION" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_cm",
            "note" => "cm_dye_note",
        ]
    ],
    "LIGHT PERSPIRATION" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_lp",
            "note" => "light_pers_note",
        ]
    ],
    "SALIVA" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_slv",
            "note" => "saliva_note",
        ]
    ],
    "BLEEDING" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_bld",
            "note" => "bleeding_note",
        ]
    ],
    "CHLORIN & NON-CHLORIN" => [
        [
            "alias" => "CHLORIN",
            "conditional" => "",
            "status" => "stat_chl",
            "note" => "chlorin_note",
        ],
        [
            "alias" => "NON-CHLORIN",
            "conditional" => "",
            "status" => "stat_nchl",
            "note" => "chlorin_note",
        ],
    ],
    "DYE TRANSFER" => [
        [
            "alias" => "",
            "conditional" => "",
            "status" => "stat_dye",
            "note" => "dye_tf_note",
        ]
    ],
];

function renderRow($testName, $aliasTestName, $detailArray, $row, $statColumn, $conditionalColumn)
{
    // Check if $testName is in $detailArray and $statColumn in $row is null or empty
    if (in_array($testName, $detailArray) && (is_null($row[$statColumn]) || empty(trim($row[$statColumn])))) {
        // Check if $conditionalColumn in $row is not empty
        if (empty($conditionalColumn) || !empty($row[$conditionalColumn])) {
            // Return $aliasTestName if not null and not empty; otherwise, return $testName
            return (!is_null($aliasTestName) && !empty($aliasTestName)) ? $aliasTestName : $testName;
        }
    }
}

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="refresh" content="180" />
    <title>Status Test Quality</title>
</head>

<body>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <!--<a href="FormKK" class="btn btn-success <?php if ($_SESSION['levelPpc'] == "biasa") {
                        echo "disabled";
                    } ?>"><i class="fa fa-plus-circle"></i> Tambah</a>-->
                    <?php
                        $delay = date('Y-m-d');
                        $sqldt = mysqli_query($con, "SELECT COUNT(*) as cnt FROM tbl_tq_nokk a
        LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk
        WHERE (`status`='' or `status` IS NULL) AND DATE_FORMAT( tgl_masuk, '%Y-%m-%d' ) BETWEEN date_sub(now(),INTERVAL 30 DAY) and now() AND tgl_target < '$delay'");
                        $row = mysqli_fetch_array($sqldt);
                    ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Informasi</h4>

                        <p>Terdapat <?php echo $row['cnt'] ?> test Delay.</p>
                    </div>
                    <div class="box-body">
                        <div class="pull-right">
                            <a href="pages/cetak/excel_delay_tq.php" class="btn btn-success" target="_blank">Excel
                                Delay</a>
                        </div>
                        <table id="example1" class="table table-bordered table-hover table-striped" width="100%">
                            <thead class="bg-blue">
                                <tr>
                                    <th width="24">
                                        <div align="center">#</div>
                                    </th>
                                    <th width="24">
                                        <div align="center">No. Test</div>
                                    </th>
                                    <!-- <th width="24">
                                        <div align="center">Testing Belum Selesai</div>
                                    </th> -->
                                    <th width="90">
                                        <div align="center">No. Demand</div>
                                    </th>
                                    <th width="90">
                                        <div align="center">No. Demand Lama</div>
                                    </th>
                                    <th width="90">
                                        <div align="center">No. KK</div>
                                    </th>
                                    <th width="90">
                                        <div align="center">No. KK Legacy</div>
                                    </th>
                                    <th width="50">
                                        <div align="center">Tgl Masuk</div>
                                    </th>
                                    <th width="50">
                                        <div align="center">Tgl Target</div>
                                    </th>
                                    <th width="130">
                                        <div align="center">Pelanggan</div>
                                    </th>
                                    <th width="50">
                                        <div align="center">No. PO</div>
                                    </th>
                                    <th width="100">
                                        <div align="center">No. Order</div>
                                    </th>
                                    <th width="100">
                                        <div align="center">No. Item</div>
                                    </th>
                                    <th width="100">
                                        <div align="center">Jenis Kain</div>
                                    </th>
                                    <th width="50">
                                        <div align="center">No. Prod Order/ Lot</div>
                                    </th>
                                    <th width="50">
                                        <div align="center">No. Prod Order/ Lot Lama</div>
                                    </th>
                                    <th width="50">
                                        <div align="center">Lot Legacy</div>
                                    </th>
                                    <th width="100">
                                        <div align="center">Warna</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include ('koneksi.php');

                                    $sqldt = mysqli_query($con, "SELECT a.*, a.id AS idkk, b.* FROM tbl_tq_nokk a
                                                                LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk
                                                                WHERE (`status`='' or `status` IS NULL) and DATE_FORMAT( tgl_masuk, '%Y-%m-%d' ) between date_sub(now(),INTERVAL 30 DAY) and now()
                                                                ORDER BY tgl_target ASC");
                                    $no = "1";
                                    while ($rowd = mysqli_fetch_array($sqldt)) {
                                        $tgltarget = new DateTime($rowd['tgl_target']);
                                        $now = new DateTime();
                                        $target = $now->diff($tgltarget);
                                        $delay = $tgltarget->diff($now);
                                        //$nokk = $rowd['nokk'];
                                
                                        // $TDObjects = [];
                                        // $qryTest = mysqli_query($con, "select
                                        //                                     a.*,
                                        //                                     b.*,
                                        //                                     c.*,
                                        //                                     d.*
                                        //                                 from
                                        //                                     tbl_tq_nokk a
                                        //                                 inner join tbl_master_test b on
                                        //                                     a.no_test = b.no_testmaster
                                        //                                 inner join tbl_tq_test c on
                                        //                                     a.id = c.id_nokk
                                        //                                 left join tbl_tq_test_2 d on
                                        //                                     c.id_nokk = d.id_nokk
                                        //                                 where
                                        //                                     a.no_test = '$rowd[no_test]'
                                        //                                 order by
                                        //                                     a.id desc
                                        //                                 limit 1");
                                        // $rowt = mysqli_fetch_assoc($qryTest);

                                        // $detail = explode(",", $rowt['physical']);
                                        // $detail2 = explode(",", $rowt['functional']);
                                        // $detail3 = explode(",", $rowt['colorfastness']);

                                        // array_pop($detail);
                                        // array_pop($detail2);
                                        // array_pop($detail3);

                                        // foreach ($physical as $testName => $testDataArray) {
                                        //     // Check if $testName is in $detail3
                                        //     if (in_array($testName, $detail)) {
                                        //         foreach ($testDataArray as $testData) {
                                        //             $TDObjects[] = renderRow($testName, $testData['alias'], $detail, $rowt, $testData['status'], $testData['conditional']);
                                        //         }
                                        //     }
                                        // }
                                        // foreach ($functional as $testName => $testDataArray) {
                                        //     // Check if $testName is in $detail3
                                        //     if (in_array($testName, $detail2)) {
                                        //         foreach ($testDataArray as $testData) {
                                        //             $TDObjects[] = renderRow($testName, $testData['alias'], $detail2, $rowt, $testData['status'], $testData['conditional']);
                                        //         }
                                        //     }
                                        // }
                                        // foreach ($colorfastness as $testName => $testDataArray) {
                                        //     // Check if $testName is in $detail3
                                        //     if (in_array($testName, $detail3)) {
                                        //         foreach ($testDataArray as $testData) {
                                        //             $TDObjects[] = renderRow($testName, $testData['alias'], $detail3, $rowt, $testData['status'], $testData['conditional']);
                                        //         }
                                        //     }
                                        // }
                                        ?>
                                        <tr>
                                            <td align="center"><?php echo $no; ?></td>
                                            <td align="center">
                                                <a
                                                    href="SummaryTQNew-<?php echo $rowd['no_test']; ?>"><?php echo $rowd['no_test']; ?></a>
                                            </td>
                                            <!-- <td align="center">
                                                <?php
                                                // $testTemp = array_unique(array_filter($TDObjects));
                                                // foreach ($testTemp as $test) {
                                                //     echo "<span class='label bg-red'>$test</span><br>";
                                                // }
                                                ?>
                                            </td> -->
                                            <td align="center">
                                                <?php if ($rowd['nodemand_new'] != '') {
                                                    echo $rowd['nodemand_new'];
                                                } else if ($rowd['nodemand_new'] == '') {
                                                    echo $rowd['nodemand'];
                                                } ?>
                                            </td>
                                            <td align="center"><?php if ($rowd['nodemand_new'] != '') {
                                                echo $rowd['nodemand'];
                                            } ?>
                                            </td>
                                            <td align="center"><?php echo $rowd['nokk']; ?></td>
                                            <td align="center"><?php echo $rowd['kk_legacy']; ?></td>
                                            <td align="center"><?php echo $rowd['tgl_masuk']; ?></td>
                                            <td align="center"><?php echo $rowd['tgl_target']; ?><br>
                                                <?php if ($tgltarget > $now) { ?>
                                                    <span class='badge bg-blue'><?php echo $target->d + 1;
                                                    echo " Hari lagi"; ?></span>
                                                <?php } elseif ($delay->d > 0) { ?>
                                                    <span class='badge bg-red blink_me'><?php echo "Delay ";
                                                    echo $delay->d;
                                                    echo " Hari"; ?></span>
                                                <?php } elseif ($delay->d == 0) { ?>
                                                    <span class='badge bg-yellow blink_me'><?php echo "Hari ini Terakhir"; ?></span>
                                                <?php } ?>
                                            </td>
                                            <td align="left">
                                                <font size="-1"><?php echo $rowd['pelanggan']; ?></font>
                                            </td>
                                            <td align="center"><?php echo $rowd['no_po']; ?></td>
                                            <td align="center"><?php echo $rowd['no_order']; ?></td>
                                            <td align="center"><?php echo $rowd['no_item']; ?></td>
                                            <td align="center">
                                                <a href="#" id='<?php echo $rowd['idkk']; ?>'
                                                    class="update_jeniskain"><?php echo $rowd['jenis_kain']; ?></a>
                                            </td>
                                            <td align="center"><?php echo $rowd['lot']; ?></td>
                                            <td align="center"><?php if ($rowd['lot_new'] != '') {
                                                echo $rowd['lot_new'];
                                            } ?></td>
                                            <td align="center"><?php echo $rowd['lot_legacy']; ?></td>
                                            <td align="center"><?php echo $rowd['warna']; ?></td>
                                        </tr>
                                        <?php $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="UpdateJenisKain" class="modal fade modal-3d-slit" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true"></div>
    <div id="PosisiKKTQ" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true"></div>
</body>

</html>