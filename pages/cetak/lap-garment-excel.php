<?php
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
$awalParam = isset($_GET['awal']) ? $_GET['awal'] : date('Y-m-d');
$fnameDate  = date('Ymd', strtotime($awalParam));
header("Content-Disposition: attachment; filename=lap-garment-{$fnameDate}.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF"; 
// BOM UTF-8

ini_set('error_reporting', 1);
session_start();
include "../../koneksi.php";

// ===== Ambil filter =====
$Awal       = isset($_GET['awal']) ? $_GET['awal'] : '';
$Akhir      = isset($_GET['akhir']) ? $_GET['akhir'] : '';
$Demand     = isset($_GET['demand']) ? $_GET['demand'] : '';
$Lot        = isset($_GET['prod_order']) ? $_GET['prod_order'] : '';
$Order      = isset($_GET['order']) ? $_GET['order'] : '';
$Langganan  = isset($_GET['langganan']) ? $_GET['langganan'] : '';
$PO         = isset($_GET['po']) ? $_GET['po'] : '';
$nama_cv    = isset($_GET['nama_cv']) ? $_GET['nama_cv'] : '';
$hanger     = isset($_GET['hanger']) ? $_GET['hanger'] : '';
$Warna      = isset($_GET['warna']) ? $_GET['warna'] : '';

// ===== Build WHERE sesuai Lap-Garment =====
$Where = "";
if ($Awal != "") {
  $AwalSql  = mysqli_real_escape_string($con, $Awal);
  $AkhirSql = mysqli_real_escape_string($con, $Akhir);
  $Where = " AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalSql' AND '$AkhirSql' ";
}

// Escape like values
$Demand_like    = mysqli_real_escape_string($con, $Demand);
$Lot_like       = mysqli_real_escape_string($con, $Lot);
$Order_like     = mysqli_real_escape_string($con, $Order);
$Langganan_like = mysqli_real_escape_string($con, $Langganan);
$PO_like        = mysqli_real_escape_string($con, $PO);
$hanger_like    = mysqli_real_escape_string($con, $hanger);
$Warna_like     = mysqli_real_escape_string($con, $Warna);
$nama_cv_like   = mysqli_real_escape_string($con, $nama_cv);

if ($Awal != "" || $Demand != "" || $Lot != "" || $Order != "" || $Langganan != "" || $PO != "" || $nama_cv != "" || $hanger != "" || $Warna != "") {
  $sql = "SELECT * FROM reports_claim 
          WHERE no_demand LIKE '%$Demand_like%'
            AND prod_order LIKE '%$Lot_like%'
            AND no_order LIKE '%$Order_like%'
            AND langganan LIKE '%$Langganan_like%'
            AND no_po LIKE '%$PO_like%'
            AND no_hanger LIKE '%$hanger_like%'
            AND warna LIKE '%$Warna_like%'
            AND nama_cv LIKE '%$nama_cv_like%'
            $Where
          ORDER BY no_demand ASC";
} else {
  // Mengikuti pola halaman: LIKE tanpa wildcard pada kondisi kosong → hasil 0
  $sql = "SELECT * FROM reports_claim 
          WHERE no_demand LIKE '$Demand_like'
            AND prod_order LIKE '$Lot_like'
            AND no_order LIKE '$Order_like'
            AND langganan LIKE '$Langganan_like'
            AND no_po LIKE '$PO_like'
            AND no_hanger LIKE '$hanger_like'
            AND warna LIKE '$Warna_like'
            AND nama_cv LIKE '$nama_cv_like'
            $Where
          ORDER BY no_demand ASC";
}

$qry = mysqli_query($con, $sql);
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
    .num { mso-number-format:"0"; }
    .num2{ mso-number-format:"0.00"; }
  </style>
  <title>Laporan Garment (Claim)</title>
</head>
<body>
  <h3>Laporan Garment (Claim)</h3>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama CV</th>
        <th>Langganan</th>
        <th>Invoice Date</th>
        <th>No PO</th>
        <th>No Order</th>
        <th>Hanger</th>
        <th>Warna</th>
        <th>Total (Pcs)</th>
        <th>Harga (Pcs)</th>
        <th>Total Harga</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      if ($qry) {
        while ($r = mysqli_fetch_assoc($qry)) {
          echo '<tr>';
          echo '<td class="text-center">'.$no++.'</td>';
          echo '<td class="text-center">'.htmlspecialchars($r['nama_cv']).'</td>';
          echo '<td class="text-center">'.htmlspecialchars($r['langganan']).'</td>';
          echo '<td class="text-center">'.htmlspecialchars($r['invoice_date']).'</td>';
          echo '<td class="text-center">'.htmlspecialchars($r['no_po']).'</td>';
          echo '<td class="text-center">'.htmlspecialchars($r['no_order']).'</td>';
          echo '<td class="text-center">'.htmlspecialchars($r['no_hanger']).'</td>';
          echo '<td class="text-center">'.htmlspecialchars($r['warna']).'</td>';
          echo '<td class="text-right num2">'.number_format((float)$r['total'],2,'.','').'</td>';
          echo '<td class="text-right num2">'.number_format((float)$r['harga'],2,'.','').'</td>';
          echo '<td class="text-right num2">'.number_format((float)$r['total_harga'],2,'.','').'</td>';
          echo '<td class="wrap">'.htmlspecialchars($r['ket']).'</td>';
          echo '</tr>';
        }
      }
      ?>
    </tbody>
  </table>
</body>
</html>

