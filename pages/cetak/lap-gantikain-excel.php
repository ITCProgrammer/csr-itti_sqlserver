<?php
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
$awalParam = isset($_GET['awal']) ? $_GET['awal'] : date('Y-m-d');
$fnameDate  = date('Ymd', strtotime($awalParam));
header("Content-Disposition: attachment; filename=lap-ganti-kain-{$fnameDate}.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF"; // BOM UTF-8

ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";

// ===== Ambil filter =====
$Awal             = isset($_GET['awal']) ? $_GET['awal'] : '';
$Akhir            = isset($_GET['akhir']) ? $_GET['akhir'] : '';
$Order            = isset($_GET['order']) ? $_GET['order'] : '';
$Langganan        = isset($_GET['langganan']) ? $_GET['langganan'] : '';
$PO               = isset($_GET['po']) ? $_GET['po'] : '';
$Status           = isset($_GET['status']) ? $_GET['status'] : '';
$TotalKirim       = isset($_GET['total']) ? $_GET['total'] : '';
$Bon              = isset($_GET['bon']) ? $_GET['bon'] : '';
$Warna            = isset($_GET['warna']) ? $_GET['warna'] : '';
$Hanger           = isset($_GET['hanger']) ? $_GET['hanger'] : '';
$OrderReplacement = isset($_GET['order_replacement']) ? $_GET['order_replacement'] : 0;
$StatusOnProgress = isset($_GET['status_is_on_progress']) ? $_GET['status_is_on_progress'] : 0;
$StatusClosed     = isset($_GET['status_is_closed']) ? $_GET['status_is_closed'] : 0;

// Tanggal untuk judul
$periodeText = ($Awal && $Akhir) ? date('d M Y', strtotime($Awal))." s/d ".date('d M Y', strtotime($Akhir)) : "-";

// ===== Build WHERE =====
$Where = "";
if ($Awal != "" && $Akhir != "") $Where .= " AND DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$Awal' AND '$Akhir' ";
if ($Status != "")    $Where .= " AND `status`='$Status' ";
if ($Warna != "")     $Where .= " AND `warna`='$Warna' ";
if ($Hanger != "")    $Where .= " AND `no_hanger`='$Hanger' ";
if ($Order != "")     $Where .= " AND `no_order` LIKE '%$Order%' ";
if ($PO != "")        $Where .= " AND `no_po` LIKE '%$PO%' ";
if ($Langganan != "") $Where .= " AND `langganan` LIKE '%$Langganan%' ";
if ($Bon != "")       $Where .= " AND `no_bon` LIKE '%$Bon%' ";
if ($StatusOnProgress == 1 && $StatusClosed == 1) {
  $Where .= " AND (`status` = 'On Progress' OR `status` = 'Closed') ";
} elseif ($StatusOnProgress == 1) {
  $Where .= " AND `status` = 'On Progress' ";
} elseif ($StatusClosed == 1) {
  $Where .= " AND `status` = 'Closed' ";
}

if (trim($Where) == "") {
  $sql_qry1 = "SELECT * FROM tbl_ganti_kain_now WHERE 1=0";
} else {
  $sql_qry1 = "SELECT *,
                  substr(no_hanger,1,3) as prefix,
                  substr(no_hanger,4)  as subprefix
               FROM tbl_ganti_kain_now
               WHERE id_disposisi IS NULL $Where
               ORDER BY tgl_buat ASC";
}
$qry1 = mysqli_query($con, $sql_qry1);

// ===== Style helper =====
$border     = "border:1px solid #000000;";
$thBase     = $border." background:#E8F1FE; font-weight:bold; text-align:center; vertical-align:middle;";
$tdBase     = $border." text-align:center; vertical-align:middle;";
$tdLeft     = $border." text-align:left; vertical-align:middle;";
$tdRight    = $border." text-align:right; vertical-align:middle;";
$tdNum      = $tdRight." mso-number-format:'\\#\\,\\#\\#0';";            // 1.000 pemisah ribuan
$tdNum2     = $tdRight." mso-number-format:'\\#\\,\\#\\#0.00';";        // 2 desimal
$tdDate     = $tdBase." mso-number-format:'yyyy-mm-dd';";               // tanggal
$theadRowBg = "background:#D9E8FB;";                                    // baris header kedua
$zebra1     = "background:#FFFFFF;";
$zebra2     = "background:#F8FAFC;";                                    // zebra
$titleCell  = "font-weight:bold; font-size:16px; text-align:left; padding:6px 4px;";
$metaCell   = "font-size:12px; text-align:left; padding:4px;";

// ===== Hitung total =====
$total_qty_order = 0;
$total_qty_kirim = 0;
$total_qty_foc   = 0;
$total_qty_email = 0;
$total_kg1       = 0;
$total_pjg1      = 0; // satuan panjang (akan tetap ditampilkan dengan satuan)

?>
<html>
<head>
  <meta charset="utf-8">
  <style>
    table { border-collapse: collapse; table-layout: fixed; width: 100%; font: 12px Arial, sans-serif; }
    th, td { border: 1px solid #999; padding: 4px; vertical-align: middle; }
    thead th { background: #e8f0fe; text-align: center; }
    tbody tr:nth-child(even) { background: #fafafa; }
    .text-center{ text-align:center; vertical-align: middle; }
    .text-right{ text-align:right; }
    .wrap{ white-space: normal; word-wrap: break-word; }
    .text{ mso-number-format:"\\@"; }
    .num { mso-number-format:"0"; }
    .num2{ mso-number-format:"0.00"; }
  </style>
  <title>Laporan Ganti Kain</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
</head>
<body>

<!-- Tabel Data -->
<table>
  <thead>
    <tr>
      <th rowspan="2" style="<?php echo $thBase; ?>">No</th>
      <!-- <th rowspan="2" style="<?php echo $thBase; ?>">Aksi</th> -->
      <th rowspan="2" style="<?php echo $thBase; ?>">Tgl</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">No Bon</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Langganan</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">PO</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Order</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Order Baru</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Detail</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Jenis Kain</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">No Item</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">No Hanger</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Lebar &amp; Gramasi</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Warna</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Qty Order</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Qty Kirim</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Qty Extra</th>
      <th colspan="2" style="<?php echo $thBase; ?>">Request Qty.</th>
      <th colspan="2" style="<?php echo $thBase; ?>">Replace Qty.</th>
      <th colspan="2" style="<?php echo $thBase; ?>">Reduce Qty.</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Masalah</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Analisa</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Pencegahan</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">Sub Defect</th>
      <th rowspan="2" style="<?php echo $thBase; ?>">T Jawab</th>
    </tr>
    <tr>
      <th>Kg</th>
      <th>Satuan</th>
      <th>Kg</th>
      <th>Satuan</th>
      <th>Kg</th>
      <th>Satuan</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      while ($row1 = mysqli_fetch_array($qry1)) {

        // Gabungan T Jawab
        if ($row1['t_jawab'] != "" && $row1['t_jawab1'] != "" && $row1['t_jawab2'] != "") {
          $tjawab = $row1['t_jawab'] . "+" . $row1['t_jawab1'] . "+" . $row1['t_jawab2'];
        } else if ($row1['t_jawab'] != "" && $row1['t_jawab1'] != "" && $row1['t_jawab2'] == "") {
          $tjawab = $row1['t_jawab'] . "+" . $row1['t_jawab1'];
        } else if ($row1['t_jawab'] != "" && $row1['t_jawab1'] == "" && $row1['t_jawab2'] != "") {
          $tjawab = $row1['t_jawab'] . "+" . $row1['t_jawab2'];
        } else if ($row1['t_jawab'] == "" && $row1['t_jawab1'] != "" && $row1['t_jawab2'] != "") {
          $tjawab = $row1['t_jawab1'] . "+" . $row1['t_jawab2'];
        } else if ($row1['t_jawab'] != "" && $row1['t_jawab1'] == "" && $row1['t_jawab2'] == "") {
          $tjawab = $row1['t_jawab'];
        } else if ($row1['t_jawab'] == "" && $row1['t_jawab1'] != "" && $row1['t_jawab2'] == "") {
          $tjawab = $row1['t_jawab1'];
        } else if ($row1['t_jawab'] == "" && $row1['t_jawab1'] == "" && $row1['t_jawab2'] != "") {
          $tjawab = $row1['t_jawab2'];
        } else {
          $tjawab = "";
        }

        // Perhitungan reduce
        $qty_red    = (float)$row1['qty_email'] - (float)$row1['kg1'];
        $satuan_red = (float)$row1['pjg_email'] - (float)$row1['pjg1'];

        // Totals
        $total_qty_order += (float)$row1['qty_order'];
        $total_qty_kirim += (float)$row1['qty_kirim'];
        $total_qty_foc   += (float)$row1['qty_foc'];
        $total_qty_email += (float)$row1['qty_email'];
        $total_kg1       += (float)$row1['kg1'];
        $total_pjg1      += (float)$row1['pjg1'];

        // Zebra row
        $rowBg = ($no % 2 == 0) ? $zebra2 : $zebra1;

        // ===== Link Order Baru & Detail (opsional / sesuai original) =====
        // Agar aman di SQL DB2, escape single quote pada PO
        $orderBaruLinks = '';
        $detailLinks    = '';
        $no_po_safe = str_replace("'", "''", $row1['no_po']);

        if ($OrderReplacement > 0) {
          // Cari order REP/RPE
          if (function_exists('db2_exec')) {
            $q_order_new = @db2_exec($conn1,"SELECT DISTINCT NO_ORDER
                        FROM ITXVIEW_MEMOPENTINGPPC
                        WHERE NO_PO LIKE '%$no_po_safe%'
                          AND SUBCODE02 = '{$row1['prefix']}'
                          AND SUBCODE03 = '{$row1['subprefix']}'
                          AND WARNA LIKE '%{$row1['warna']}'
                          AND (SUBSTR(NO_ORDER,1,3)='RPE' OR SUBSTR(NO_ORDER,1,3)='REP')");
            if ($q_order_new) {
              while ($d_order_new = db2_fetch_assoc($q_order_new)) {
                $ord = trim($d_order_new['NO_ORDER']);
                $orderBaruLinks .= '<a href="https://online.indotaichen.com/laporan/aftersales_memopenting_order.php?bonorder='.$ord.'" target="_blank">'.$ord.'</a><br/>';

                // Detail link
                $q_sum_po_selesai = @db2_exec($conn1, "SELECT
                    isqd.ORDERLINE,
                    TRIM(isqd.NO_ORDER) AS NO_ORDER
                  FROM ITXVIEW_SUMMARY_QTY_DELIVERY isqd
                  LEFT JOIN SALESORDER s ON s.CODE = isqd.NO_ORDER
                  WHERE isqd.NO_ORDER = '$ord'
                  GROUP BY isqd.ORDERLINE, isqd.NO_ORDER
                  ORDER BY isqd.ORDERLINE ASC
                ");
                $dt_sum = $q_sum_po_selesai ? db2_fetch_assoc($q_sum_po_selesai) : null;

                $ResultLotCode = "
                  SELECT
                    LISTAGG('\\'' || TRIM(PRODUCTIONORDERCODE) || '\\'', ', ') AS PRODUCTIONORDERCODE,
                    LISTAGG('\\'' || TRIM(PRODUCTIONDEMANDCODE) || '\\'', ', ') AS PRODUCTIONDEMANDCODE
                  FROM ITXVIEWKK
                  WHERE PROJECTCODE = '$ord'
                    AND ITEMTYPEAFICODE = 'KFF'
                    AND ORIGDLVSALORDERLINEORDERLINE = '".($dt_sum ? $dt_sum['ORDERLINE'] : '')."'
                ";
                $exec_lotcode = @db2_exec($conn1, $ResultLotCode);
                $fetch_lotcode = $exec_lotcode ? db2_fetch_assoc($exec_lotcode) : ['PRODUCTIONORDERCODE'=>'','PRODUCTIONDEMANDCODE'=>''];

                $detailLinks .= '<a target="_blank" href="/laporan-itti/ppc_filter_poselesai_summary_detail.php?no_order='.urlencode($ord).
                                '&orderline='.urlencode($dt_sum ? $dt_sum['ORDERLINE'] : '').
                                '&PRODUCTIONORDERCODE='.urlencode($fetch_lotcode['PRODUCTIONORDERCODE']).
                                '&PRODUCTIONDEMANDCODE='.urlencode($fetch_lotcode['PRODUCTIONDEMANDCODE']).'">Detail</a><br/>';
              }
            }
          }
        }
    ?>
    <tr>
      <td class="text-center num" style="text-align:center;">&nbsp;<?php echo $no; ?></td>
      <!-- <td style="<?php echo $tdBase; ?>">
        <a href="EditKPENewBon-<?php echo $row1['id']; ?>" target="_blank">Edit</a>
        &nbsp;|&nbsp;
        <a href="./HapusDataGK-<?php echo $row1['id']; ?>">Hapus</a>
      </td> -->
      <td class="text-center text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($row1['tgl_buat']); ?></td>
      <td class="text-center text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($row1['no_bon']); ?></td>
      <td class="wrap text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($row1['langganan']); ?></td>
      <td class="text-center text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($row1['no_po']); ?></td>
      <td class="text-center text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($row1['no_order']); ?></td>
      <td class="text-center" style="text-align:center;">&nbsp;<?php echo $orderBaruLinks ?: "-"; ?></td>
      <td class="text-center" style="text-align:center;">&nbsp;<?php echo $detailLinks ?: "-"; ?></td>
      <td class="wrap" style="text-align:center;">&nbsp;<?php echo htmlspecialchars(substr($row1['jenis_kain'],0,50)); ?></td>
      <td class="text-center text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($row1['no_item']); ?></td>
      <td class="text-center text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($row1['no_hanger']); ?></td>
      <td class="text-center text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($row1['lebar']."x".$row1['gramasi']); ?></td>
      <td class="wrap text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars(substr($row1['warna1'],0,20)); ?></td>
      <td class="text-center" style="<?php echo $tdNum2; ?>"><?php echo (float)$row1['qty_order']; ?></td>
      <td class="text-center" style="<?php echo $tdNum2; ?>"><?php echo (float)$row1['qty_kirim']; ?></td>
      <td class="text-center" style="<?php echo $tdNum2; ?>"><?php echo (float)$row1['qty_foc']; ?></td>
      <td class="text-center" style="<?php echo $tdNum2; ?>"><?php echo (float)$row1['qty_email']; ?></td>
      <td class="text-center" style="<?php echo $tdNum2; ?>"><?php echo (float)$row1['pjg_email']; ?></td>
      <td class="text-center" style="<?php echo $tdNum2; ?>"><?php echo (float)$row1['kg1']; ?></td>
      <td class="text-center" style="<?php echo $tdNum2; ?>"><?php echo (float)$row1['pjg1']; ?></td>
      <td class="text-center" style="<?php echo $tdNum2; ?>"><?php echo (float)$qty_red; ?></td>
      <td class="text-center" style="<?php echo $tdNum2; ?>"><?php echo (float)$satuan_red; ?></td>
      <td class="wrap text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($row1['masalah']); ?></td>
      <td class="wrap text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($row1['analisa']); ?></td>
      <td class="wrap text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($row1['pencegahan']); ?></td>
      <td class="wrap text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($row1['sub_defect']); ?></td>
      <td class="text-center text" style="text-align:center;">&nbsp;<?php echo htmlspecialchars($tjawab); ?></td>
    </tr>
    <?php $no++; } ?>
  </tbody>

  <!-- Row Total -->
  <tfoot>
    <tr>
      <td colspan="13" style="<?php echo $tdRight; ?> font-weight:bold; background:#F1F5F9;">TOTAL</td>

  <td style="<?php echo $tdNum2; ?> font-weight:bold; background:#F1F5F9;"><?php echo $total_qty_order; ?></td>
  <td style="<?php echo $tdNum2; ?> font-weight:bold; background:#F1F5F9;"><?php echo $total_qty_kirim; ?></td>
  <td style="<?php echo $tdNum2; ?> font-weight:bold; background:#F1F5F9;"><?php echo $total_qty_foc; ?></td>

  <td style="<?php echo $tdNum2; ?> font-weight:bold; background:#F1F5F9;"><?php echo $total_qty_email; ?></td>
  <td style="<?php echo $tdNum2; ?> font-weight:bold; background:#F1F5F9;">&nbsp;</td>

  <td style="<?php echo $tdNum2; ?> font-weight:bold; background:#F1F5F9;"><?php echo $total_kg1; ?></td>
  <td style="<?php echo $tdNum2; ?> font-weight:bold; background:#F1F5F9;"><?php echo $total_pjg1; ?></td>

  <td style="<?php echo $tdBase; ?> font-weight:bold; background:#F1F5F9;" colspan="7">&nbsp;</td>
    </tr>
  </tfoot>
</table>

</body>
</html>
