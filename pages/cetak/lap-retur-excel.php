<?php
// Jika ekspor ke Excel
// Gunakan parameter awal dari GET untuk nama file agar tidak undefined
$awalParam = isset($_GET['awal']) ? $_GET['awal'] : date('Y-m-d');
$fnameDate  = date('Ymd', strtotime($awalParam));
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=lap-retur-{$fnameDate}.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF"; // UTF-8 BOM

ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";

// Ambil parameter
$Awal           = $_GET['awal']           ?? '';
$Akhir          = $_GET['akhir']          ?? '';
$Order          = $_GET['order']          ?? '';
$Langganan      = $_GET['langganan']      ?? '';
$PO             = $_GET['po']             ?? '';
$Status         = $_GET['status']         ?? '';
$Bon            = $_GET['bon']            ?? '';
$OrderReplacement = (int)($_GET['order_replacement'] ?? 0);
$Warna          = $_GET['warna']          ?? '';
$Hanger         = $_GET['hanger']         ?? '';
$StatusOnProgress = (int)($_GET['status_is_on_progress'] ?? 0);
$StatusClosed = (int)($_GET['status_is_closed'] ?? 0);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Retur</title>
    <style>
      table { border-collapse: collapse; table-layout: fixed; width: 100%; font: 12px Arial, sans-serif; }
      th, td { border: 1px solid #999; padding: 4px; vertical-align: middle; }
      thead th { background: #e8f0fe; text-align: center; }
      tbody tr:nth-child(even) { background: #fafafa; }
      .text-center{ text-align:center; vertical-align: middle; }
      .text-right{ text-align:right; }
      .wrap{ white-space: normal; word-wrap: break-word; }
      .text{ mso-number-format:"\@"; }   /* paksa text (PO, order, hanger) */
      .num { mso-number-format:"0"; }    /* angka bulat */
      .num2{ mso-number-format:"0.00"; } /* angka 2 desimal */
    </style>
  </head>
<body>

<table>
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <!-- <th rowspan="2">Aksi</th> -->
            <th rowspan="2">Tgl Dari GKJ</th>
            <th rowspan="2">Tgl Surat Jalan</th>
            <th rowspan="2">No Surat Jalan Langganan</th>
            <th rowspan="2">No Bon Retur</th>
            <th rowspan="2">No Demand</th>
            <th rowspan="2">Langganan</th>
            <th rowspan="2">PO</th>
            <th rowspan="2">Order</th>
            <th rowspan="2">Order Retur Baru</th>
            <th rowspan="2">Detail</th>
            <th rowspan="2">Jenis Kain</th>
            <th rowspan="2">Warna</th>
            <th rowspan="2">Lot</th>
            <th rowspan="2">Roll</th>
            <th colspan="2">Qty Surat Jalan</th>
            <th rowspan="2">Qty Timbang Ulang</th>
            <th rowspan="2">Masalah</th>
            <th rowspan="2">T Jawab</th>
            <th rowspan="2">Analisa Kerusakan</th>
            <th rowspan="2">No NCP</th>
            <th rowspan="2">Keterangan</th>
            <th rowspan="2">No Demand AKJ</th>
        </tr>
        <tr>
            <th>Kg</th>
            <th>Satuan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $tKG = 0;
        $tRoll = 0;
        $tPJG = 0;

        $filters = [];
        if (!empty($Awal)) $filters[] = "DATE_FORMAT(a.tgl_buat, '%Y-%m-%d') >= '$Awal'";
        if (!empty($Akhir)) $filters[] = "DATE_FORMAT(a.tgl_buat, '%Y-%m-%d') <= '$Akhir'";
        if (!empty($Order)) $filters[] = "a.no_order LIKE '$Order%'";
        if (!empty($Langganan)) $filters[] = "a.langganan LIKE '%$Langganan%'";
        if (!empty($PO)) $filters[] = "a.po LIKE '$PO%'";
        if (!empty($Status)) $filters[] = "a.status = '$Status'";
        if (!empty($Bon)) $filters[] = "a.no_retur LIKE '%$Bon%'";
        if ($StatusOnProgress == 1 && $StatusClosed == 1) {
          $filters[] = "(a.status = 'On Progress' OR a.status = 'Closed') ";
        } elseif ($StatusOnProgress == 1) {
          $filters[] = " a.status = 'On Progress' ";
        } elseif ($StatusClosed == 1) {
          $filters[] = " a.status = 'Closed' ";
        }
        $whereClause = !empty($filters) ? 'WHERE ' . implode(' AND ', $filters) : '';

        $qry1 = mysqli_query(
            $con,
            "SELECT 
                a.*,
                SUBSTRING(a.no_hanger, 1, 3) AS prefix,
                SUBSTRING(a.no_hanger, 4) AS subprefix,
                GROUP_CONCAT(DISTINCT b.no_ncp SEPARATOR ', ') AS no_ncp,
                GROUP_CONCAT(DISTINCT b.masalah SEPARATOR ', ') AS masalah_ncp 
             FROM 
                tbl_detail_retur_now a 
             LEFT JOIN 
                tbl_ncp_qcf_new b 
             ON 
                a.nodemand_ncp = b.nodemand 
             $whereClause 
             GROUP BY 
                a.id 
             ORDER BY 
                a.tgl_buat ASC"
        );

        if (!$qry1) {
            echo "<tr><td colspan='25'>Query gagal: " . mysqli_error($con) . "</td></tr>";
        } else {
            while ($row1 = mysqli_fetch_array($qry1)) {
                $tjawab = implode(", ", array_filter([$row1['t_jawab'], $row1['t_jawab1'], $row1['t_jawab2']]));

                echo "<tr>";
                echo "<td align='center'>$no</td>";
                // echo "<td align='center'>
                //         <a href='Updateretur-{$row1['id']}' class='btn btn-warning btn-xs' target='_blank'>Update</a>
                //         <a href='#' class='btn btn-danger btn-xs' onclick=\"confirm_delete('Hapus-retur-{$row1['id']}');\"><i class='fa fa-trash'></i> Hapus</a>
                //       </td>";
                echo "<td align='center'>{$row1['tgltrm_sjretur']}</td>";
                echo "<td align='center'>{$row1['tgl_sjretur']}</td>";
                echo "<td align='center'>{$row1['sjreturplg']}</td>";
                echo "<td align='center'>{$row1['no_retur']}</td>";
                echo "<td align='center'>{$row1['nodemand']}</td>";
                echo "<td>{$row1['langganan']}</td>";
                echo "<td align='center'>{$row1['po']}</td>";
                echo "<td align='center'>{$row1['no_order']}</td>";

                // Order Replacement
                $order_new_html = '';
                if ($OrderReplacement > 0) {
                    $query = "
                        SELECT DISTINCT NO_ORDER
                        FROM ITXVIEW_MEMOPENTINGPPC
                        WHERE NO_PO LIKE '%{$row1['po']}%' 
                          AND SUBCODE02 = '{$row1['prefix']}'
                          AND SUBCODE03 = '{$row1['subprefix']}' 
                          AND WARNA LIKE '%{$row1['warna']}%'
                          AND (
                            SUBSTR(NO_ORDER, 1, 3) IN ('RFD', 'RFE', 'RPE', 'REP')
                          )
                    ";
                    $q_order_new = db2_exec($conn1, $query);
                    while ($d_order_new = db2_fetch_assoc($q_order_new)) {
                        $order_new_html .= "<a href='https://online.indotaichen.com/laporan/aftersales_memopenting_order.php?bonorder={$d_order_new['NO_ORDER']}' target='_blank'>{$d_order_new['NO_ORDER']}</a><br>";
                    }
                }
                echo "<td align='center'>$order_new_html</td>";

                // Detail Order
                $detail_html = '';
                if ($OrderReplacement > 0) {
                    $query = "
                        SELECT DISTINCT NO_ORDER
                        FROM ITXVIEW_MEMOPENTINGPPC
                        WHERE NO_PO LIKE '%{$row1['po']}%' 
                          AND SUBCODE02 = '{$row1['prefix']}'
                          AND SUBCODE03 = '{$row1['subprefix']}' 
                          AND WARNA LIKE '%{$row1['warna']}%'
                          AND (
                            SUBSTR(NO_ORDER, 1, 3) IN ('RFD', 'RFE', 'RPE', 'REP')
                          )
                    ";
                    $q_order_new = db2_exec($conn1, $query);
                    while ($d_order_new = db2_fetch_assoc($q_order_new)) {
                        $q_sum_po_selesai = db2_exec($conn1, "
                            SELECT
                              isqd.ORDERLINE,
                              isqd.PELANGGAN,
                              TRIM(isqd.NO_ORDER) AS NO_ORDER,
                              isqd.NO_PO,
                              isqd.KET_PRODUCT,
                              isqd.STYLE,
                              isqd.LEBAR,
                              isqd.GRAMASI,
                              isqd.WARNA,
                              isqd.NO_WARNA,
                              isqd.PRICEUNITOFMEASURECODE,
                              isqd.NETTO,
                              isqd.NETTO_2,
                              isqd.NETTO_M,
                              isqd.KONVERSI,
                              isqd.ACTUAL_DELIVERY,
                              SUM(isqd.QTY_SUDAH_KIRIM) AS QTY_SUDAH_KIRIM,
                              SUM(isqd.QTY_SUDAH_KIRIM_2) AS QTY_SUDAH_KIRIM_2,
                              CASE
                                WHEN DAYS(now()) - DAYS(Timestamp_Format(isqd.ACTUAL_DELIVERY, 'YYYY-MM-DD')) < 0 THEN 0
                                ELSE DAYS(now()) - DAYS(Timestamp_Format(isqd.ACTUAL_DELIVERY, 'YYYY-MM-DD'))
                              END AS DELAY,
                              isqd.SUBCODE01,
                              isqd.SUBCODE02,
                              isqd.SUBCODE03,
                              isqd.SUBCODE04,
                              isqd.SUBCODE05,
                              isqd.SUBCODE06,
                              isqd.SUBCODE07,
                              isqd.SUBCODE08,
                              s.STATISTICALGROUPCODE,
                              ip.BUYER 
                            FROM
                              ITXVIEW_SUMMARY_QTY_DELIVERY isqd
                            LEFT JOIN SALESORDER s ON s.CODE = isqd.NO_ORDER 
                            LEFT JOIN ITXVIEW_PELANGGAN ip ON ip.ORDPRNCUSTOMERSUPPLIERCODE = s.ORDPRNCUSTOMERSUPPLIERCODE AND ip.CODE = s.CODE 
                            WHERE
                              isqd.NO_ORDER = '{$d_order_new['NO_ORDER']}'
                            GROUP BY
                              isqd.ORDERLINE,
                              isqd.PELANGGAN,
                              isqd.NO_ORDER,
                              isqd.NO_PO,
                              isqd.KET_PRODUCT,
                              isqd.STYLE,
                              isqd.LEBAR,
                              isqd.GRAMASI,
                              isqd.WARNA,
                              isqd.NO_WARNA,
                              isqd.PRICEUNITOFMEASURECODE,
                              isqd.NETTO,
                              isqd.NETTO_2,
                              isqd.NETTO_M,
                              isqd.KONVERSI,
                              isqd.ACTUAL_DELIVERY,
                              isqd.SUBCODE01,
                              isqd.SUBCODE02,
                              isqd.SUBCODE03,
                              isqd.SUBCODE04,
                              isqd.SUBCODE05,
                              isqd.SUBCODE06,
                              isqd.SUBCODE07,
                              isqd.SUBCODE08,
                              s.STATISTICALGROUPCODE,
                              ip.BUYER  
                            ORDER BY
                              isqd.ORDERLINE ASC
                        ");
                        $dt_sum = db2_fetch_assoc($q_sum_po_selesai);

                        $ResultLotCode = "
                            SELECT 
                              LISTAGG('''' || TRIM(PRODUCTIONORDERCODE) || '''', ', ') AS PRODUCTIONORDERCODE,
                              LISTAGG('''' || TRIM(PRODUCTIONDEMANDCODE) || '''', ', ') AS PRODUCTIONDEMANDCODE
                            FROM 
                              ITXVIEWKK
                            WHERE 
                              PROJECTCODE = '{$d_order_new['NO_ORDER']}'
                              AND ITEMTYPEAFICODE = 'KFF'
                              AND ORIGDLVSALORDERLINEORDERLINE = '{$dt_sum['ORDERLINE']}'
                        ";
                        $exec_lotcode = db2_exec($conn1, $ResultLotCode);
                        $fetch_lotcode = db2_fetch_assoc($exec_lotcode);

                        $detail_html .= "<a target='_blank'
                          href='/laporan-itti/ppc_filter_poselesai_summary_detail.php?no_order=".TRIM($d_order_new['NO_ORDER'])."&orderline={$dt_sum['ORDERLINE']}&PRODUCTIONORDERCODE={$fetch_lotcode['PRODUCTIONORDERCODE']}&PRODUCTIONDEMANDCODE={$fetch_lotcode['PRODUCTIONDEMANDCODE']}'>
                          Detail
                        </a><br>";
                    }
                }
                echo "<td align='center'>$detail_html</td>";

                echo "<td>{$row1['jenis_kain']}</td>";
                echo "<td>{$row1['warna']}</td>";
                echo "<td>{$row1['lot']}</td>";
                echo "<td>{$row1['roll']} Roll</td>";
                echo "<td>{$row1['kg']}</td>";
                echo "<td>{$row1['pjg']} {$row1['satuan']}</td>";
                echo "<td>{$row1['qty_tu']} KG</td>";
                echo "<td>{$row1['masalah']}</td>";
                echo "<td>$tjawab</td>";
                echo "<td>{$row1['masalah_ncp']}</td>";
                echo "<td>{$row1['no_ncp']}</td>";
                echo "<td>{$row1['ket']}</td>";
                echo "<td>{$row1['nodemand_akj']}</td>";
                echo "</tr>";

                $tKG += $row1['kg'];
                $tRoll += $row1['roll'];
                $tPJG += $row1['pjg'];
                $no++;
            }
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="14" align="right"><strong>Total</strong></td>
            <td align="center"><?= number_format($tRoll, 0); ?></td>
            <td align="center"><?= number_format($tKG, 2); ?></td>
            <td align="center"><?= number_format($tPJG, 2); ?></td>
            <td colspan="7">&nbsp;</td>
        </tr>
    </tfoot>
</table>

</body>
</html>
