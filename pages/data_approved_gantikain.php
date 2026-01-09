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
$bon        = isset($_GET['bon']) ? mysqli_real_escape_string($con, $_GET['bon']) : '';
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
if ($bon !== "") {
    $Where .= " AND `no_bon` LIKE '%$bon%' ";
}

// Query utama
$sql_qry1 = "SELECT *, 
                    SUBSTR(no_hanger,1,3) AS prefix, 
                    SUBSTR(no_hanger,4) AS subprefix 
             FROM tbl_ganti_kain_now 
             WHERE id_disposisi IS NULL $Where 
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
  <title>Proses Serah Terima Bon Ganti Kain Eksternal</title>
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
      <th class="title" colspan="12">PROSES SERAH TERIMA BON GANTI KAIN EKSTERNAL</th>
    </tr>
    <tr>
      <th rowspan="2">NO BON</th>
      <th>ADM CSR</th>
      <th>APPROVED PPC</th>
      <th>APPROVED CSR MGR</th>
      <th rowspan="2">APPROVED MKT MGR</th>
      <th rowspan="2"> SALES SEND TO RMP MGR</th>
      <th rowspan="2">APPROVED RMP MGR</th>
      <th>ADM CSR</th>
      <th rowspan="2">OTHER DEPT (1)</th>
      <th rowspan="2">OTHER DEPT (2)</th>
      <th rowspan="2">OTHER DEPT (3)</th>
      <th rowspan="2">APPROVED DMF</th>
    </tr>
    <tr>
      <th>INPUT DATA &amp; SEND TO PPC</th>
      <th>SEND TO CSR MGR</th>
      <th>SEND TO SALES & MKT MGR</th>
      <th>SEND TO ANALIZE &amp; PREVENTION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['no_bon']); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_buat'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_approve_ppc'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_approve_csr'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_approve_mkt'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_send_mkt_to_rmp'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_approve_rmp'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['tgl_kirim_notif_gantikain'] ?? ''); ?></td>
                <?php
                // Lebih sederhana: ambil waktu terakhir per do_by untuk no_bon ini
                $noBonEsc = mysqli_real_escape_string($conadm, $row['no_bon']);
                $qLogs = "
                  SELECT 
                    TRIM(do_by) AS do_by_raw,
                    LOWER(REPLACE(REPLACE(TRIM(do_by),'-',''),' ','')) AS do_by_key,
                    MAX(do_at) AS do_at
                  FROM tbl_log
                  WHERE project LIKE '%".$noBonEsc."/CSR%'
                  GROUP BY TRIM(do_by), LOWER(REPLACE(REPLACE(TRIM(do_by),'-',''),' ',''))
                  ORDER BY MAX(do_at) DESC
                ";
                $rsLogs = mysqli_query($conadm, $qLogs);
                $logs = [];
                if ($rsLogs) {
                  while ($lr = mysqli_fetch_assoc($rsLogs)) {
                    // Canonical key: hilangkan spasi dan '-' agar varian tersaring
                    $key = isset($lr['do_by_key']) ? $lr['do_by_key'] : strtolower(preg_replace('/[^a-z0-9]+/','',$lr['do_by_raw']));
                    // Tampilkan semua, termasuk ADM-CSR
                    $logs[] = $lr; // simpan berurutan dari terbaru
                  }
                }
                // Tampilkan 1 kolom <td> per do_by, isi dengan label dan do_at
                $maxCols = 3; // sesuaikan dengan header OTHER DEPT (1..3)
                for ($i = 0; $i < $maxCols; $i++) {
                  echo '<td>'; 
                  if (isset($logs[$i])) {
                    $label = strtoupper(str_replace(' ', '-', $logs[$i]['do_by_raw']));
                    echo htmlspecialchars($label) . '<br>' . htmlspecialchars($logs[$i]['do_at']);
                  } else {
                    echo '&nbsp;';
                  }
                  echo '</td>';
                }
                ?>
                <td><?php echo htmlspecialchars(isset($row['tgl_approved_dmf']) ? $row['tgl_approved_dmf'] : ''); ?></td>
            </tr>
            <?php
        }
    } else {
        echo '<tr><td colspan="11">Tidak ada data ditemukan.</td></tr>';
    }
    ?>
  </tbody>
</table>

</body>
</html>
