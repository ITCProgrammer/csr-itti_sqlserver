<?php
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
$awalParam = isset($_GET['awal']) ? $_GET['awal'] : date('Y-m-d');
$fnameDate  = date('Ymd', strtotime($awalParam));
header("Content-Disposition: attachment; filename=lap-kpe-{$fnameDate}.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF"; // BOM UTF-8 agar karakter aman di Excel

ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";

// --- Ambil filter ---
$Awal    = $_GET['awal'] ?? '';
$Akhir   = $_GET['akhir'] ?? '';
$Order   = $_GET['order'] ?? '';
$Hanger  = $_GET['hanger'] ?? '';
$PO      = $_GET['po'] ?? '';
$GShift  = $_GET['gshift'] ?? '';
$Fs      = $_GET['fasilitas'] ?? '';
$sts_red = $_GET['sts_red'] ?? '';
$sts_claim = $_GET['sts_claim'] ?? '';
$Langganan = $_GET['langganan'] ?? '';
$Demand    = $_GET['demand'] ?? '';
$Prodorder = $_GET['prodorder'] ?? '';
$Pejabat   = $_GET['pejabat'] ?? '';
$Solusi    = $_GET['solusi'] ?? '';
$Kategori  = $_GET['kategori'] ?? '';
$MasalahDominan = $_GET['masalah_dominan'] ?? '';

$Where = "";
if (!empty($Awal) && !empty($Akhir))   $Where .= " AND DATE_FORMAT(a.tgl_buat, '%Y-%m-%d') BETWEEN '$Awal' AND '$Akhir' ";
if (!empty($Order))                    $Where .= " AND a.no_order LIKE '%$Order%' ";
if (!empty($PO))                       $Where .= " AND a.po LIKE '%$PO%' ";
if (!empty($Hanger))                   $Where .= " AND a.no_hanger LIKE '%$Hanger%' ";
if (!empty($Langganan))                $Where .= " AND a.langganan LIKE '%$Langganan%' ";
if (!empty($Demand))                   $Where .= " AND a.nodemand LIKE '%$Demand%' ";
if (!empty($Prodorder))                $Where .= " AND a.nokk LIKE '%$Prodorder%' ";
if (!empty($Pejabat))                  $Where .= " AND a.pejabat LIKE '%$Pejabat%' ";
if (!empty($Solusi))                   $Where .= " AND a.solusi LIKE '%$Solusi%' ";
if (!empty($MasalahDominan))          $Where .= " AND a.masalah_dominan = '$MasalahDominan' ";
$stsclaim = ($sts_claim=="1") ? " AND a.sts_claim='1' " : " ";

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
  table { border-collapse: collapse; table-layout: fixed; width: 100%; font: 12px Arial, sans-serif; }
  th, td { border: 1px solid #999; padding: 4px; vertical-align: middle; }
  thead th { background: #e8f0fe; text-align: center; }
  tbody tr:nth-child(even) { background: #fafafa; }
  .text-center{ text-align:center; vertical-align: middle; } .text-right{ text-align:right; }
  .wrap{ white-space: normal; word-wrap: break-word; }
  .text{ mso-number-format:"\@"; }   /* paksa text (PO, order, hanger) */
  .num { mso-number-format:"0"; }    /* angka bulat */
  .num2{ mso-number-format:"0.00"; } /* angka 2 desimal */
</style>
</head>
<body>

<?php
if (empty($Where)) {
  echo "<table><tr><td class='text-center'>Silakan isi filter pencarian.</td></tr></table>";
  exit;
}

$qry1 = mysqli_query($con,"
  SELECT a.*,
         GROUP_CONCAT(DISTINCT b.no_ncp_gabungan SEPARATOR ', ') AS no_ncp,
         GROUP_CONCAT(DISTINCT b.masalah_dominan  SEPARATOR ', ') AS masalah_utama,
         GROUP_CONCAT(DISTINCT b.akar_masalah     SEPARATOR ', ') AS akar_masalah,
         GROUP_CONCAT(DISTINCT b.solusi_panjang   SEPARATOR ', ') AS solusi_panjang
  FROM tbl_aftersales_now a
  LEFT JOIN tbl_ncp_qcf_now b ON a.nodemand=b.nodemand
  WHERE 1=1 $Where $stsclaim AND (a.bprc IS NULL OR a.bprc = '')
  GROUP BY a.nodemand, a.masalah_dominan
  ORDER BY a.id ASC
");
?>

<table>
  <colgroup>
    <col style="width:28px">
    <col style="width:90px">   <!-- Tgl -->
    <col style="width:220px">  <!-- Pelanggan -->
    <col style="width:160px">  <!-- Buyer -->
    <col style="width:90px">   <!-- No Demand -->
    <col style="width:100px">  <!-- No Prod Order -->
    <col style="width:110px">  <!-- PO -->
    <col style="width:110px">  <!-- Order -->
    <col style="width:110px">  <!-- Hanger -->
    <col style="width:320px">  <!-- Jenis Kain -->
    <col style="width:50px">   <!-- Lebar -->
    <col style="width:60px">   <!-- Gramasi -->
    <col style="width:80px">   <!-- Lot -->
    <col style="width:90px">   <!-- Warna -->
    <col style="width:95px">   <!-- Qty Order -->
    <col style="width:105px">  <!-- Qty Order (yd) -->
    <col style="width:95px">   <!-- Qty Kirim -->
    <col style="width:105px">  <!-- Qty Kirim (yd) -->
    <col style="width:95px">   <!-- Qty Claim -->
    <col style="width:105px">  <!-- Qty Claim (yd) -->
    <col style="width:110px">  <!-- Qty Lolos QC -->
    <col style="width:110px">  <!-- T Jawab -->
    <col style="width:130px">  <!-- Masalah Dominan -->
    <col style="width:220px">  <!-- Masalah -->
    <col style="width:220px">  <!-- Penyebab -->
    <col style="width:140px">  <!-- Route Cause (kategori) -->
    <col style="width:140px">  <!-- Solusi -->
    <col style="width:100px">  <!-- Klasifikasi -->
    <col style="width:160px">  <!-- Personil -->
    <col style="width:120px">  <!-- Pejabat -->
    <col style="width:160px">  <!-- Lolos/Disposisi -->
    <col style="width:60px">   <!-- BPP -->
    <col style="width:120px">  <!-- No NCP -->
    <col style="width:160px">  <!-- Masalah Utama -->
    <col style="width:160px">  <!-- Akar Masalah -->
    <col style="width:180px">  <!-- Solusi Panjang -->
    <col style="width:200px">  <!-- Ket -->
  </colgroup>
  <thead>
    <tr>
      <th rowspan="2">No</th>
      <th rowspan="2">Tgl</th>
      <th rowspan="2">Pelanggan</th>
      <th rowspan="2">Buyer</th>
      <th rowspan="2">No Demand</th>
      <th rowspan="2">No Prod Order</th>
      <th rowspan="2">PO</th>
      <th rowspan="2">Order</th>
      <th rowspan="2">Hanger</th>
      <th rowspan="2">Jenis Kain</th>
      <th rowspan="2">Lebar</th>
      <th rowspan="2">Gramasi</th>
      <th rowspan="2">Lot</th>
      <th rowspan="2">Warna</th>
      <th rowspan="2">Qty Order</th>
      <th rowspan="2">Qty Order (yd)</th>
      <th rowspan="2">Qty Kirim</th>
      <th rowspan="2">Qty Kirim (yd)</th>
      <th rowspan="2">Qty Claim</th>
      <th rowspan="2">Qty Claim (yd)</th>
      <th rowspan="2">Qty Lolos QC (kg)</th>
      <th rowspan="2">T Jawab</th>
      <th rowspan="2">Masalah Dominan</th>
      <th rowspan="2">Masalah</th>
      <th rowspan="2">Penyebab</th>
      <th rowspan="2">Route Cause</th>
      <th rowspan="2">Solusi</th>
      <th rowspan="2">Klasifikasi</th>
      <th rowspan="2">Personil</th>
      <th rowspan="2">Pejabat</th>
      <th rowspan="2">Lolos/Disposisi</th>
      <th rowspan="2">BPP</th>
      <th colspan="4">NCP</th>
      <th rowspan="2">Ket</th>
    </tr>
    <tr>
      <th>No NCP</th>
      <th>Masalah Utama</th>
      <th>Akar Masalah</th>
      <th>Solusi Jangka Panjang</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $no = 1;
    while($row1 = mysqli_fetch_array($qry1)){
      $pelanggan = '';
      $buyer = '';
      if (!empty($row1['langganan'])) {
        $parts = explode('/', $row1['langganan']);
        $pelanggan = $parts[0] ?? '';
        $buyer    = $parts[1] ?? '';
      }
      // gabung T Jawab
      $tj = array_filter([$row1['t_jawab'] ?? '', $row1['t_jawab1'] ?? '', $row1['t_jawab2'] ?? ''], function($v){ return $v!==''; });
      $tjawab = implode('+', $tj);
  ?>
    <tr>
      <td class="text-center num" style="text-align: center;"><?php echo $no; ?></td>
      <td class="text-center text" style="text-align: center;"><?php echo $row1['tgl_buat']; ?></td>
      <td class="wrap text" style="text-align: center;"><?php echo $pelanggan; ?></td>
      <td class="wrap text" style="text-align: center;"><?php echo $buyer; ?></td>
      <td class="text-center text" style="text-align: center;"><?php echo $row1['nodemand']; ?></td>
      <td class="text-center text" style="text-align: center;"><?php echo $row1['nokk']; ?></td>
      <td class="text-center text" style="text-align: center;"><?php echo $row1['po']; ?></td>
      <td class="text-center text" style="text-align: center;"><?php echo $row1['no_order']; ?></td>
      <td class="text-center text" style="text-align: center;"><?php echo $row1['no_hanger']; ?></td>
      <td class="wrap" style="text-align: center;"><?php echo $row1['jenis_kain']; ?></td>
      <td class="text-center num" style="text-align: center;"><?php echo (int)$row1['lebar']; ?></td>
      <td class="text-center num" style="text-align: center;"><?php echo (int)$row1['gramasi']; ?></td>
      <td class="text-center text" style="text-align: center;"><?php echo $row1['lot']; ?></td>
      <td class="text-center text" style="text-align: center;"><?php echo $row1['warna']; ?></td>
      <td class="text-center num2" style="text-align: center;"><?php echo (float)$row1['qty_order']; ?></td>
      <td class="text-center num2" style="text-align: center;"><?php echo (float)$row1['qty_order2']; ?></td>
      <td class="text-center num2" style="text-align: center;"><?php echo (float)$row1['qty_kirim']; ?></td>
      <td class="text-center num2" style="text-align: center;"><?php echo (float)$row1['qty_kirim2']; ?></td>
      <td class="text-center num2" style="text-align: center;"><?php echo (float)$row1['qty_claim']; ?></td>
      <td class="text-center num2" style="text-align: center;"><?php echo (float)$row1['qty_claim2']; ?></td>
      <td class="text-center num2" style="text-align: center;"><?php echo (float)$row1['qty_lolos']; ?></td>
      <td class="text-center text" style="text-align: center;"><?php echo $tjawab; ?></td>
      <td class="wrap text" style="text-align: center;"><?php echo $row1['masalah_dominan']; ?></td>
      <td class="wrap text" style="text-align: center;"><?php echo $row1['masalah']; ?></td>
      <td class="wrap text" style="text-align: center;"><?php echo $row1['penyebab']; ?></td>
      <td class="text-center" style="text-align: center;"><?php echo $row1['kategori']; ?></td> <!-- route cause -->
      <td class="wrap text" style="text-align: center;"><?php echo $row1['solusi']; ?></td>
      <td class="text text-center" style="text-align: center;"><?php echo $row1['klasifikasi']; ?></td>
      <td class="wrap text" style="text-align: center;"><?php echo ($row1['personil2']!="") ? $row1['personil'].", ".$row1['personil2'] : $row1['personil']; ?></td>
      <td class="text" style="text-align: center;"><?php echo $row1['pejabat']; ?></td>
      <td class="wrap text" style="text-align: center;">
        <?php
          $sts = [];
          if ($row1['sts']=="1") $sts[] = "Lolos QC";
          if ($row1['sts_disposisiqc']=="1") $sts[] = "Disposisi QC";
          if ($row1['sts_disposisipro']=="1") $sts[] = "Disposisi Produksi";
          if ($row1['sts_nego']=="1") $sts[] = "Negosiasi Aftersales";
          echo implode(", ", $sts);
        ?>
      </td>
      <td class="text-center text" style="text-align: center; vertical-align: middle;">
        <?php
          echo ($row1['status_penghubung']=='terima') ? '✓' :
               (($row1['status_penghubung']=='tolak') ? 'X' : '');
        ?>
      </td>
      <td class="wrap text" style="text-align: center;"><?php echo $row1['no_ncp']; ?></td>
      <td class="wrap text" style="text-align: center;"><?php echo $row1['masalah_utama']; ?></td>
      <td class="wrap text" style="text-align: center;"><?php echo $row1['akar_masalah']; ?></td>
      <td class="wrap text" style="text-align: center;"><?php echo $row1['solusi_panjang']; ?></td>
      <td class="wrap text" style="text-align: center;"><?php echo $row1['ket']; ?></td>
    </tr>
  <?php $no++; } ?>
  </tbody>
</table>

</body>
</html>
