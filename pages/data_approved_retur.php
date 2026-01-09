<?php
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
session_start();

// Pastikan koneksi database tersedia
include "../koneksi.php";



// Ambil dan escape input dari GET
$Awal       = isset($_GET['awal']) ? mysqli_real_escape_string($con, $_GET['awal']) : '';
$Akhir      = isset($_GET['akhir']) ? mysqli_real_escape_string($con, $_GET['akhir']) : '';
$Order      = isset($_GET['order']) ? mysqli_real_escape_string($con, $_GET['order']) : '';
$Langganan  = isset($_GET['langganan']) ? mysqli_real_escape_string($con, $_GET['langganan']) : '';
$PO         = isset($_GET['po']) ? mysqli_real_escape_string($con, $_GET['po']) : '';
$Status     = isset($_GET['status']) ? mysqli_real_escape_string($con, $_GET['status']) : '';
$no_retur   = isset($_GET['no_retur']) ? mysqli_real_escape_string($con, $_GET['no_retur']) : '';
$warna      = isset($_GET['warna']) ? mysqli_real_escape_string($con, $_GET['warna']) : '';
$hanger     = isset($_GET['hanger']) ? mysqli_real_escape_string($con, $_GET['hanger']) : '';

// Bangun klausa WHERE
$Where = "";
if ($Awal !== "" && $Akhir !== "") {
    $Where .= " AND DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$Awal' AND '$Akhir' ";
}
if ($Status !== "") {
    $Where .= " AND `status` = '$Status' ";
}
if ($warna !== "") {
    $Where .= " AND `warna` = '$warna' ";
}
if ($hanger !== "") {
    $Where .= " AND `no_hanger` = '$hanger' ";
}
if ($Order !== "") {
    $Where .= " AND `no_order` LIKE '%$Order%' ";
}
if ($PO !== "") {
    $Where .= " AND `no_po` LIKE '%$PO%' ";
}
if ($Langganan !== "") {
    $Where .= " AND `langganan` LIKE '%$Langganan%' ";
}
if ($no_retur !== "") {
    $Where .= " AND `no_retur` LIKE '%$no_retur%' ";
}


// Query utama
$sql_qry1 = "SELECT *
             FROM tbl_detail_retur_now
             WHERE 1=1 $Where
             GROUP BY no_retur
             ORDER BY tgl_buat ASC";

$result = mysqli_query($con, $sql_qry1);

if (!$result) {
    die("Query error: " . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <title>Proses Serah Terima Bon Retur </title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #9aaa9a;
      padding: 6px 8px;
      text-align: center;
      vertical-align: middle;
    }
    thead th.title {
      background: #d8e4bc;
      color: #000;
      font-size: 14px;
      font-weight: bold;
    }
    thead th {
      background: #e6efd3;
      font-weight: bold;
    }
  </style>
</head>
<body>

<table>
  <thead>
    <tr>
      <th class="title" colspan="12">PROSES SERAH TERIMA BON TARIKAN RETUR</th>
    </tr>
    <tr>
      <th rowspan="2">NO BON</th>
      <th rowspan="2">TANGGAL SURAT JALAN</th>
      <th rowspan="2">TERIMA SJ DARI GKJ</th>
      <th rowspan="2">CSR BUKA TARIKAN RETUR</th>
      <th rowspan="2">ARSIP PPC</th>
      <th rowspan="2">APPROVED & ARSIP GKJ</th>
      <th rowspan="2">APPROVED CSR MGR</th>
      <th colspan="3">OPTIONAL</th>
      <th rowspan="2">APPROVED DMF</th>
      <th rowspan="2">SEND TO SALES MKT</th>
    </tr>
    <tr>
      <th>APPROVED PPC</th>
      <th>APPROVED SALES MKT</th>
      <th>APPROVED MKT MGR</th>
    </tr>
  </thead>
  <tbody>
    <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['no_retur']); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_sjretur'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgltrm_sjretur'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_buat_retur'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_notifikasi_retur'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_approved_gkj'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_approved_csr'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_approved_ppc'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_approved_sales_mkt'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_approved_mkt'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_approved_dmf'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_arsip_mkt'] ?? ''); ?></td>
        <?php } ?>
            </tr>
  </tbody>
</table>
</body>
</html>