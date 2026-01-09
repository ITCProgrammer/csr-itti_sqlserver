<?php
ini_set("error_reporting", 1);
set_time_limit(0);
session_start();
include "koneksi.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bon Penghubung</title>

</head>
<style>
    .button-group-vertical {
        display: flex;
        flex-direction: column;
        gap: 5px;
        /* jarak antar tombol */
    }

    .button-group-vertical button {
        font-size: 10px;
    }
</style>

<body>
    <?php
    $Demand = isset($_POST['demand']) ? $_POST['demand'] : '';
    $filter_no_order = isset($_POST['filter_no_order']) ? $_POST['filter_no_order'] : '';
    $filter_warna = isset($_POST['filter_warna']) ? $_POST['filter_warna'] : '';
    $filter_no_hanger = isset($_POST['filter_no_hanger']) ? $_POST['filter_no_hanger'] : '';
    $filter_pelanggan = isset($_POST['filter_pelanggan']) ? $_POST['filter_pelanggan'] : '';
    $filter_tgl_awal = isset($_POST['tanggal_awal']) ? $_POST['tanggal_awal'] : '';
    $filter_tgl_akhir = isset($_POST['tanggal_akhir']) ? $_POST['tanggal_akhir'] : '';
    ?>
    <div class="row">
        <div class="col-xs-12">

            <form method="post" class="form-inline" style="margin-bottom:15px;">
                <div class="form-group">
                    <label for="tanggal_awal">Tanggal Awal:</label>
                    <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="<?php echo htmlspecialchars($filter_tgl_awal); ?>" />
                </div>
                <div class="form-group">
                    <label for="tanggal_akhir">Tanggal Akhir:</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="<?php echo htmlspecialchars($filter_tgl_akhir); ?>" />
                </div>
                <div class="form-group">
                    <label for="filter_no_order">No PO:</label>
                    <input type="text" name="filter_no_order" id="filter_no_order" class="form-control" value="<?php echo htmlspecialchars($filter_no_order); ?>" />
                </div>
                <div class="form-group" style="margin-left:10px;">
                    <label for="filter_warna">Warna:</label>
                    <input type="text" name="filter_warna" id="filter_warna" class="form-control" value="<?php echo htmlspecialchars($filter_warna); ?>" />
                </div>
                <div class="form-group" style="margin-left:10px;">
                    <label for="filter_no_hanger">Hanger:</label>
                    <input type="text" name="filter_no_hanger" id="filter_no_hanger" class="form-control" value="<?php echo htmlspecialchars($filter_no_hanger); ?>" />
                </div>
                <div class="form-group" style="margin-left:10px;">
                    <label for="filter_pelanggan">Pelanggan:</label>
                    <input type="text" name="filter_pelanggan" id="filter_pelanggan" class="form-control" value="<?php echo htmlspecialchars($filter_pelanggan); ?>" />
                </div>
                <button type="submit" class="btn btn-primary" style="margin-left:10px;">Filter</button>
                <a href="<?php echo strtok($_SERVER["REQUEST_URI"], '?'); ?>" class="btn btn-default" style="margin-left:5px;">Reset</a>
            </form>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Summary Bon Penghubung</h3> <?= $filter_no_order !== '' || $filter_warna !== '' || $filter_no_hanger !== '' || $filter_pelanggan !== '' ?><br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
                        <thead class="bg-blue">
                            <tr>
                                <th>No</th>
                                <!-- <th>Project</th> -->
                                <th>No PO</th>
                                <th>Pelanggan</th>
                                <th>Buyer</th>
                                <th>Hanger</th>
                                <!-- <th>Item</th> -->
                                <th>Color</th>
                                <th>Qty Order (kg)</th>
                                <th>Qty Order (yd)</th>
                                <th>Qty Kirim (kg)</th>
                                <th>Qty Kirim (yd)</th>
                                <th>Qty Kirim FOC(kg)</th>
                                <th>Qty Kirim FOC(yd)</th>
                                <th>Replace QTY (kg)</th>
                                <th>Replace Qty (yd)</th>
                                <th>No Replace QTY (kg)</th>
                                <th>No Replace Qty (yd)</th>
                                <th>Qty Pending (kg)</th>
                                <th>Qty Pending (yd)</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $no = 1;
                                    // Build WHERE clause
                                    $where = "";
                                        if ($filter_no_order) {
                                            $where .= " AND tq.no_po LIKE '%" . mysqli_real_escape_string($con, $filter_no_order) . "%' ";
                                        }
                                        if ($filter_warna) {
                                            $where .= " AND tq.warna LIKE '%" . mysqli_real_escape_string($con, $filter_warna) . "%' ";
                                        }
                                        if ($filter_no_hanger) {
                                            $where .= " AND tq.no_hanger LIKE '%" . mysqli_real_escape_string($con, $filter_no_hanger) . "%' ";
                                        }
                                        if ($filter_pelanggan) {
                                            $where .= " AND tq.pelanggan LIKE '%" . mysqli_real_escape_string($con, $filter_pelanggan) . "%' ";
                                        }
                                        if ($filter_tgl_awal && $filter_tgl_akhir) {
                                            $where .= " AND DATE(tq.tgl_masuk) BETWEEN '" . mysqli_real_escape_string($con, $filter_tgl_awal) . "' AND '" . mysqli_real_escape_string($con, $filter_tgl_akhir) . "' ";
                                        } elseif ($filter_tgl_awal) {
                                            $where .= " AND DATE(tq.tgl_masuk) = '" . mysqli_real_escape_string($con, $filter_tgl_awal) . "' ";
                                        } elseif ($filter_tgl_akhir) {
                                            $where .= " AND DATE(tq.tgl_masuk) = '" . mysqli_real_escape_string($con, $filter_tgl_akhir) . "' ";
                                        }

                                        if (empty($where)) {
                                            echo '<tr><td colspan="18" class="text-center text-info">Silakan isi minimal satu filter untuk menampilkan data.</td></tr>';
                                        } else {
                                    $queryMain = "SELECT
                                        tq.no_po,
                                        tq.no_hanger,
                                        tq.pelanggan,
                                        tq.warna,
                                        tq.no_warna,
                                        SUM(CASE WHEN m.status_approve = 2 THEN tq.estimasi ELSE 0 END) AS estimasi_approve,  
                                        SUM(CASE WHEN m.status_approve = 2 THEN tq.panjang_estimasi ELSE 0 END) AS estimasi_panjang_approve,    
                                        SUM(CASE WHEN m.status_approve = 99 THEN tq.estimasi ELSE 0 END) AS estimasi_reject,
                                        SUM(CASE WHEN m.status_approve = 99 THEN tq.panjang_estimasi ELSE 0 END) AS estimasi_panjang_reject,
                                        SUM(CASE WHEN m.status_approve = 0 THEN tq.estimasi ELSE 0 END) AS estimasi_pending,
                                        SUM(CASE WHEN m.status_approve = 0 THEN tq.panjang_estimasi ELSE 0 END) AS estimasi_panjang_pending
                                        FROM tbl_bonpenghubung_mail m
                                        LEFT JOIN tbl_qcf tq ON m.nodemand = tq.nodemand 
                                        WHERE tq.sts_pbon != '10'
                                            AND m.team <> ''
                                            AND (
                                                tq.penghubung_masalah != '' OR
                                                tq.penghubung_keterangan != '' OR
                                                tq.penghubung_roll1 != '' OR
                                                tq.penghubung_roll2 != '' OR
                                                tq.penghubung_roll3 != '' OR
                                                tq.penghubung_dep != '' OR
                                                tq.penghubung_dep_persen != ''
                                            )
                                            $where
                                        GROUP BY tq.no_po, tq.no_warna, tq.no_hanger
                                        ORDER BY tq.no_po";

                                    $resultMain = mysqli_query($con, $queryMain);

                                        if (!$resultMain) {
                                            die("Query Error (MySQL): " . mysqli_error($con));
                                        }

                                        while ($row = mysqli_fetch_assoc($resultMain)) {
                                            $nokk = $row['nokk'] ?? '';
                                            $no_order = $row['no_order'];
                                            $no_po = $row['no_po'];
                                            $no_warna = $row['no_warna'];
                                            $no_hanger = $row['no_hanger'];
                                            $warna = $row['warna'];
                                            $pelanggan = $row['pelanggan'];
                                            $estimasi_approve = $row['estimasi_approve'] ?? 0;
                                            $estimasi_panjang_approve = $row['estimasi_panjang_approve'] ?? 0;
                                            $estimasi_reject = $row['estimasi_reject'] ?? 0;
                                            $estimasi_panjang_reject = $row['estimasi_panjang_reject'] ?? 0;
                                            $estimasi_pending = $row['estimasi_pending'] ?? 0;
                                            $estimasi_panjang_pending = $row['estimasi_panjang_pending'] ?? 0;
                                            // Format hanger untuk DB2: 12345 -> 123-45
                                            $formatted_hanger = substr($no_hanger, 0, 3) . '-' . substr($no_hanger, 3);

                                            // Reset nilai default
                                            $qty_order = 0;
                                            $qty_order_yd = 0;
                                            $qty_kirim = 0;
                                            $qty_kirim_yd = 0;
                                            $qty_foc = 0;
                                            $qty_foc_yd = 0;

                                            // === Query DB2: QTY Order ===
                                            $queryDB2 =
                                                "SELECT
                                                HANGER,
                                                NO_WARNA,
                                                SUM(NETTO) AS QTY_ORDER ,
                                                SUM(QTY_ORDER_Y) AS QTY_ORDER_Y,
                                                WARNA
                                                FROM
                                                    (
                                                    SELECT
                                                        DISTINCT NO_PO,
                                                        NETTO,
                                                        NO_WARNA,
                                                        WARNA,
                                                        n.USERSECONDARYQUANTITY AS QTY_ORDER_Y,
                                                        (TRIM(SUBCODE02) || TRIM(SUBCODE03)) AS HANGER
                                                    FROM
                                                        ITXVIEW_MEMOPENTINGPPC i
                                                    LEFT JOIN ITXVIEW_NETTO n ON
                                                        n.CODE = i.DEMAND
                                                    WHERE
                                                        NO_WARNA = '$no_warna'
                                                        AND (TRIM(SUBCODE02) || TRIM(SUBCODE03)) = '$no_hanger'
                                                        AND NO_PO = '$no_po'
                                                        AND (SUBSTR(NO_ORDER, 1, 3) = 'DOM'
                                                            OR SUBSTR(NO_ORDER, 1, 3) = 'EXP')
                                                    GROUP BY
                                                        NO_PO ,
                                                        NO_WARNA ,
                                                        WARNA,
                                                        (TRIM(SUBCODE02) || TRIM(SUBCODE03)),
                                                        NETTO,
                                                        n.USERSECONDARYQUANTITY)
                                                GROUP BY
                                                    HANGER,
                                                    NO_WARNA,
                                                    WARNA";

                                            $stmt = db2_prepare($conn1, $queryDB2);
                                            if ($stmt) {
                                                $params = [$no_warna, $no_po, $no_hanger];
                                                if (db2_execute($stmt, $params)) {
                                                    $data = db2_fetch_assoc($stmt);
                                                    $qty_order = $data['QTY_ORDER'] ?? 0;
                                                    $qty_order_yd = $data['QTY_ORDER_Y'] ?? 0;
                                                } else {
                                                    error_log("DB2 Execute Error: " . db2_stmt_errormsg($stmt));
                                                }
                                                db2_free_stmt($stmt);
                                                } else {
                                                    error_log("DB2 Prepare Error: " . db2_stmt_errormsg());
                                                }

                                                // === Query DB2: QTY Kirim ===
                                                $queryQTYkirim =
                                                    "SELECT SUM(QTY_KG ) AS KG_KIRIM, SUM(QTY_YARDMETER) AS YARD_KIRIM 
                                                    FROM (
                                                            SELECT
                                                            *
                                                            FROM
                                                                ITXVIEW_SURATJALAN_EXIM2A
                                                            WHERE
                                                                EXTERNALREFERENCE ='$no_po' 
                                                                AND SUBCODE05 = '$no_warna' 
                                                                AND EXTERNALITEM = '$formatted_hanger'
                                                                AND SUBSTR(PROJECTCODE, 1, 3) IN ('DOM', 'EXP')
                                                    ) ";
                                            $stmtKirim = db2_prepare($conn1, $queryQTYkirim);

                                                if ($stmtKirim) {
                                                    $paramsKirim = [$no_po, $no_warna, $formatted_hanger];
                                                    if (db2_execute($stmtKirim, $paramsKirim)) {
                                                        $dataKirim = db2_fetch_assoc($stmtKirim);
                                                        $qty_kirim = $dataKirim['KG_KIRIM'] ?? 0;
                                                        $qty_kirim_yd = $dataKirim['YARD_KIRIM'] ?? 0;
                                                    }
                                                    db2_free_stmt($stmtKirim);
                                                }

                                            // Jika qty_kirim atau qty_kirim_yd kosong/0, gunakan query alternatif
                                            if (empty($qty_kirim) && empty($qty_kirim_yd)) {
                                                $queryQTYkirim2 = "
                                                    SELECT
                                                        SUM(QTY_KG_KIRIM) AS QTY_KG,
                                                        SUM(QTY_YD_KIRIM) AS QTY_YD
                                                    FROM
                                                        (
                                                        SELECT
                                                            DISTINCT 
                                                            CODE,
                                                            SUM(QTY_SUDAH_KIRIM) AS QTY_KG_KIRIM,
                                                            SUM(QTY_SUDAH_KIRIM_2) AS QTY_YD_KIRIM,
                                                            NO_PO
                                                        FROM
                                                            ITXVIEW_SUMMARY_QTY_DELIVERY
                                                        WHERE
                                                            NO_PO = '$no_po'
                                                            AND NO_WARNA = '$no_warna'
                                                            AND KET_PRODUCT = '$formatted_hanger'
                                                            AND (SUBSTR(NO_ORDER , 1, 3) IN ('DOM', 'EXP'))
                                                        GROUP BY
                                                            CODE,
                                                            NO_PO
                                                        )";
                                            $stmtKirim2 = db2_prepare($conn1, $queryQTYkirim2);
                                            if ($stmtKirim2) {
                                                $paramsKirim2 = [$no_po, $no_warna, $formatted_hanger];
                                                if (db2_execute($stmtKirim2, $paramsKirim2)) {
                                                    $dataKirim2 = db2_fetch_assoc($stmtKirim2);
                                                    $qty_kirim = $dataKirim2['QTY_KG'] ?? 0;
                                                    $qty_kirim_yd = $dataKirim2['QTY_YD'] ?? 0;
                                                }
                                                db2_free_stmt($stmtKirim2);
                                            }
                                        }

                                        
                                        // === Query DB2: QTY FOC ===
                                        $queryFOC =
                                            "SELECT
                                            i.FOC_KG_GUDANG,
                                            a.CODE,
                                            a.USERSECONDARYQUANTITY AS FOC_YD,
                                            a.USERPRIMARYQUANTITY AS FOC_KG_KG
                                            FROM
                                                ITXVIEW_SURATJALAN_EXIM2A i
                                            LEFT JOIN ITXVIEWALLOCATION0 a ON
                                                a.CODE = i.ALLOCATIONCODE
                                            WHERE
                                                EXTERNALREFERENCE = '$no_po'
                                                AND SUBCODE05 = '$no_warna'
                                                AND EXTERNALITEM = '$formatted_hanger'
                                                AND SUBSTR(i.PROJECTCODE, 1, 3) IN ('DOM', 'EXP')
                                                AND PAYMENTMETHODCODE = 'FOC'";

                                        $stmtFOC = db2_prepare($conn1, $queryFOC);
                                        if ($stmtFOC) {
                                            $paramsFOC = [$no_po, $no_warna, $formatted_hanger];
                                            if (db2_execute($stmtFOC, $paramsFOC)) {
                                                $dataFOC = db2_fetch_assoc($stmtFOC);
                                                $qty_foc = $dataFOC['FOC_KG_GUDANG'] ?? 0;
                                                $qty_foc_yd = $dataFOC['FOC_YD'] ?? 0;
                                            }
                                            db2_free_stmt($stmtFOC);
                                        }

                                        // Jika qty_foc atau qty_foc_yd kosong/0, ambil dari summary delivery FOC
                                        if (empty($qty_foc) && empty($qty_foc_yd)) {
                                            $queryFOC2 = "
                                                SELECT
                                                    SUM(QTY_KG_KIRIM) AS QTY_KG_FOC,
                                                    SUM(QTY_YD_KIRIM) AS QTY_YD_FOC
                                                FROM
                                                    (
                                                    SELECT
                                                        DISTINCT 
                                                        CODE,
                                                        SUM(QTY_SUDAH_KIRIM) AS QTY_KG_KIRIM,
                                                        SUM(QTY_SUDAH_KIRIM_2) AS QTY_YD_KIRIM,
                                                        NO_PO,
                                                        QUALITYREASONCODE
                                                    FROM
                                                        ITXVIEW_SUMMARY_QTY_DELIVERY
                                                    WHERE
                                                        NO_PO = '$no_po'
                                                        AND NO_WARNA = '$no_warna'
                                                        AND KET_PRODUCT = '$formatted_hanger'
                                                        AND (SUBSTR(NO_ORDER , 1, 3) IN ('DOM', 'EXP'))
                                                        AND QUALITYREASONCODE ='FOC'
                                                    GROUP BY
                                                        CODE,
                                                        NO_PO,
                                                        QUALITYREASONCODE
                                                    )
                                            ";
                                            $stmtFOC2 = db2_prepare($conn1, $queryFOC2);
                                            if ($stmtFOC2) {
                                                $paramsFOC2 = [$no_po, $no_warna, $formatted_hanger];
                                                if (db2_execute($stmtFOC2, $paramsFOC2)) {
                                                    $dataFOC2 = db2_fetch_assoc($stmtFOC2);
                                                    $qty_foc = $dataFOC2['QTY_KG_FOC'] ?? 0;
                                                    $qty_foc_yd = $dataFOC2['QTY_YD_FOC'] ?? 0;
                                                }
                                                db2_free_stmt($stmtFOC2);
                                            }
                                        }
                                ?>  
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>
                                            <button type="button"
                                                class="btn btn-link detail_bonpenghubung"
                                                id="<?php echo htmlspecialchars($row['nokk']); ?>"
                                                no_po="<?php echo htmlspecialchars($row['no_po']); ?>"
                                                no_hanger="<?php echo htmlspecialchars($row['no_hanger']); ?>"
                                                no_warna="<?php echo htmlspecialchars($row['no_warna']); ?>">
                                                <?php echo htmlspecialchars($no_po); ?>
                                            </button>
                                        </td>
                                        <td><?php echo htmlspecialchars(explode('/', $row['pelanggan'])[0] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars(explode('/', $row['pelanggan'])[1] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($no_hanger); ?></td>
                                        <td><?php echo htmlspecialchars($row['warna']); ?></td>
                                        <td class="text-right"><?php echo number_format($qty_order, 2); ?></td>
                                        <td class="text-right"><?php echo number_format($qty_order_yd, 2); ?></td>
                                        <td class="text-right"><?php echo number_format($qty_kirim, 2); ?></td>
                                        <td class="text-right"><?php echo number_format($qty_kirim_yd, 2); ?></td>
                                        <td class="text-right"><?php echo number_format($qty_foc, 2); ?></td>
                                        <td class="text-right"><?php echo number_format($qty_foc_yd, 2); ?></td>
                                        <td class="text-right"><?php echo number_format($row['estimasi_approve'], 2); ?></td>
                                        <td class="text-right"><?php echo number_format($row['estimasi_panjang_approve'], 2); ?></td>
                                        <td class="text-right"><?php echo number_format($row['estimasi_reject'], 2); ?></td>
                                        <td class="text-right"><?php echo number_format($row['estimasi_panjang_reject'], 2); ?></td>
                                        <td class="text-right"><?php echo number_format($row['estimasi_pending'], 2); ?></td>
                                        <td class="text-right"><?php echo number_format($row['estimasi_panjang_pending'], 2); ?></td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php } // end while 
                                ?>
                            <?php } // end else (where not empty) 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_del" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="margin-top:100px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete all data ?</h4>
                </div>

                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div id="StsAksiEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
    <div id="StsAksiPPCEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Reject Bon Penghubung QC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin Reject Bon Penghubung QC ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="confirmReject">REJECT</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="closeModal" tabindex="-1" role="dialog" aria-labelledby="closeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="closeModalLabel">Tutup Bon Penghubung QC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menutup Bon Penghubung QC ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="confirmClose">CLOSE</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approveModalLabel">Approve Bon Penghubung QC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin mengapprove Bon Penghubung QC ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="confirmApprove">APPROVE</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal AJAX target -->
    <div id="DetailBonPenghubung" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
    <script type="text/javascript">
        function confirm_delete(delete_url) {
            $('#modal_del').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
<script type="text/javascript">
    document.querySelectorAll("#approveButton, #rejectButton, #closeApproveButton").forEach(function(button) {
        button.addEventListener("click", function() {
            var nodemand = this.getAttribute("data-nodemand");
            var action = this.id.replace('Button', ''); // Mendapatkan action dari ID tombol (approve, reject, closeApprove)
            showModal(action, nodemand);
        });
    });


    function showModal(action, nodemand) {
        var modalId, confirmButtonId;

        // Tentukan modalId dan confirmButtonId berdasarkan action
        if (action === "approve") {
            modalId = "approveModal";
            confirmButtonId = "confirmApprove";
        } else if (action === "reject") {
            modalId = "rejectModal";
            confirmButtonId = "confirmReject";
        } else if (action == "closeApprove") {
            modalId = "closeModal";
            confirmButtonId = "confirmClose";
        }

        var apiUrl = "pages/approve_process_bon_penghubung.php";

        // Tampilkan modal sesuai action
        $('#' + modalId).modal('show');

        // Tambahkan event listener untuk tombol konfirmasi
        document.getElementById(confirmButtonId).addEventListener("click", function() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", apiUrl, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText); // Menampilkan respons dari server
                    alert("Bon Penghubung QC dengan nodemand " + nodemand + " berhasil " + action + "!");
                    $('#' + modalId).modal('hide'); // Menutup modal setelah berhasil
                    location.reload();
                } else {
                    // Menampilkan error jika status bukan 200
                    console.log(xhr.responseText); // Menampilkan error dari server
                    alert("Terjadi kesalahan dalam proses " + action + ": " + xhr.responseText);
                }
            };
            xhr.send("nodemand=" + nodemand + "&action=" + action); // Kirim data untuk approve/reject
        });
    }


    // Menambahkan event listener untuk tombol close (di header modal atau di footer)
    $('.close, .btn-secondary[data-dismiss="modal"]').on('click', function() {
        $('#closeModal').modal('hide'); // Menutup modal secara manual jika tombol close atau cancel diklik
    });
</script>

</html>