<?php
// Jika ekspor ke Excel
// Gunakan parameter awal dari GET untuk nama file agar tidak undefined
$awalParam = isset($_GET['awal']) ? $_GET['awal'] : date('Y-m-d');
$fnameDate  = date('Ymd', strtotime($awalParam));
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=Rekap-Data-{$fnameDate}.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF"; // UTF-8 BOM

ini_set("error_reporting", 1);
set_time_limit(0);
session_start();
include "../../koneksi.php";

// Pindahkan fungsi ke sini, di luar loop
function getStatusText($nodemand, $con) {
    $rsts = mysqli_query($con,"SELECT * FROM tbl_bonpenghubung_mail WHERE nodemand='$nodemand'");
    $dtsts = mysqli_fetch_assoc($rsts);
    if (!$dtsts) {
        return '';
    }
    if($dtsts['status_approve']==1){
        return 'APPROVE OLEH : '.$dtsts['approve_mkt'];
    }else if($dtsts['status_approve']==99){
        return 'REJECT OLEH : '.$dtsts['approve_mkt'];
    }else if($dtsts['status_approve']==2){
        return 'CLOSED OLEH : '.$dtsts['closed_ppc'];
    } else {
        return '';
    }
}

function getActualDelivery($nodemand, $conn1) {
    $qDemand = db2_exec($conn1, "SELECT 
        CASE 
            WHEN p.DLVSALORDERLINESALESORDERCODE IS NULL THEN p.ORIGDLVSALORDLINESALORDERCODE
            ELSE p.DLVSALORDERLINESALESORDERCODE
        END AS SALESORDERCODE,
        CASE 
            WHEN p.DLVSALESORDERLINEORDERLINE IS NULL THEN p.ORIGDLVSALORDERLINEORDERLINE 
            ELSE p.DLVSALESORDERLINEORDERLINE
        END AS ORDERLINE
        FROM PRODUCTIONDEMAND p 
        WHERE p.CODE ='$nodemand'");
    $rowdb2 = db2_fetch_assoc($qDemand);
    if ($rowdb2) {
        $q_actual_delivery = db2_exec($conn1, "SELECT
            COALESCE(s2.CONFIRMEDDELIVERYDATE, s.CONFIRMEDDUEDATE) AS ACTUAL_DELIVERY
        FROM
            SALESORDER s 
        LEFT JOIN SALESORDERDELIVERY s2 ON s2.SALESORDERLINESALESORDERCODE = s.CODE AND s2.SALORDLINESALORDERCOMPANYCODE = s.COMPANYCODE AND s2.SALORDLINESALORDERCOUNTERCODE = s.COUNTERCODE 
        WHERE
            s2.SALESORDERLINESALESORDERCODE = '".$rowdb2['SALESORDERCODE']."'
            AND s2.SALESORDERLINEORDERLINE = '".$rowdb2['ORDERLINE']."'");
        $row_actual_delivery = db2_fetch_assoc($q_actual_delivery);
        return $row_actual_delivery['ACTUAL_DELIVERY'] ?? '';
    }
    return '';
}

function formatResponsibility($dep, $persen_array) {
    if ($dep != '') {
        $arrayA = explode(',', $dep);
        $result = $dep.' ';
        $no_depp = 1;
        foreach ($arrayA as $key=>$element) {			
            if (array_key_exists($key, $persen_array)) {
                if ($no_depp >= 2) {
                    $result .= ',';
                }
                $result .= $persen_array[$key].' ';
            }
            $no_depp++;
        }
        return $result;
    }
    return '';
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Rekap Bon Penghubung</title>
  <style>
    table { border-collapse: collapse; table-layout: fixed; width: 100%; font: 12px Arial, sans-serif; }
    th, td { border: 1px solid #999; padding: 4px; vertical-align: middle; }
    thead th { background: #e8f0fe; text-align: center; }
    tbody tr:nth-child(even) { background: #fafafa; }
    .text-center{ text-align:center; vertical-align: middle; }
    .text-right{ text-align:right; }
    .wrap{ white-space: normal; word-wrap: break-word; }
    .text{ mso-number-format:"\@"; }
    .num { mso-number-format:"0"; }
    .num2{ mso-number-format:"0.00"; }
  </style>
</head>
<body>
<?php
  $Awal          = isset($_GET['awal'])         ? mysqli_real_escape_string($con, $_GET['awal'])         : '';
  $Akhir         = isset($_GET['akhir'])        ? mysqli_real_escape_string($con, $_GET['akhir'])        : '';
  $Order         = isset($_GET['order'])        ? mysqli_real_escape_string($con, $_GET['order'])        : '';
  $Hanger        = isset($_GET['hanger'])       ? mysqli_real_escape_string($con, $_GET['hanger'])       : '';
  $PO            = isset($_GET['po'])           ? mysqli_real_escape_string($con, $_GET['po'])           : '';
  $Warna         = isset($_GET['warna'])        ? mysqli_real_escape_string($con, $_GET['warna'])        : '';
  $Item          = isset($_GET['item'])         ? mysqli_real_escape_string($con, $_GET['item'])         : '';
  $Langganan     = isset($_GET['langganan'])    ? mysqli_real_escape_string($con, $_GET['langganan'])    : '';
  $Pelanggan     = isset($_GET['pelanggan'])    ? mysqli_real_escape_string($con, $_GET['pelanggan'])    : '';
  $Proses        = isset($_GET['prosesmkt'])    ? mysqli_real_escape_string($con, $_GET['prosesmkt'])    : '';
  $sts_tembakdok = isset($_GET['sts_tembakdok'])? mysqli_real_escape_string($con, $_GET['sts_tembakdok']): '';
  $ProdOrder     = isset($_GET['prod_order'])   ? mysqli_real_escape_string($con, $_GET['prod_order'])   : '';
  $Demand        = isset($_GET['demand'])       ? mysqli_real_escape_string($con, $_GET['demand'])       : '';

  // Hapus variabel tidak terpakai dan mencegah notice pada $_POST untuk file export GET

?>
<table>
  <thead>
    <tr>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">DATE</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">STATUS</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">CUSTOMER</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">BUYER</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">PO</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">ORDER</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">HANGER</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">ITEM</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">COLOR</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">LOT-LEGACY</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">LOT</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">DEMAND</th>
      <th style="border: 1px solid #000; padding: 6px;" colspan="2">QTY-ORDER</th>
      <th style="border: 1px solid #000; padding: 6px;" colspan="3">QTY-PACKING</th>
      <th style="border: 1px solid #000; padding: 6px;" colspan="2">QTY-FOC</th>
      <th style="border: 1px solid #000; padding: 6px;" colspan="2">ESTIMASI FOC</th>
      <th style="border: 1px solid #000; padding: 6px;" colspan="3">QTY-BERMASALAH</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">ISSUE</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">NOTES</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">MASALAH DOMINAN</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">KET</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">ADVICE FROM PRODUCTION/QC</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">RESPONSIBILITY</th>
      <th style="border: 1px solid #000; padding: 6px;" colspan="4">NCP</th>
      <th style="border: 1px solid #000; padding: 6px;" rowspan="2">ACTUAL DELIVERY</th>
    </tr>
    <tr>
      <th style="border: 1px solid #000; padding: 6px;">KG</th>
      <th style="border: 1px solid #000; padding: 6px;">YARD</th>
      <th style="border: 1px solid #000; padding: 6px;">ROLL</th>
      <th style="border: 1px solid #000; padding: 6px;">KG</th>
      <th style="border: 1px solid #000; padding: 6px;">YARD</th>
      <th style="border: 1px solid #000; padding: 6px;">KG</th>
      <th style="border: 1px solid #000; padding: 6px;">YARD</th>
      <th style="border: 1px solid #000; padding: 6px;">KG</th>
      <th style="border: 1px solid #000; padding: 6px;">YARD</th>
      <th style="border: 1px solid #000; padding: 6px;">ROLL</th>
      <th style="border: 1px solid #000; padding: 6px;">KG</th>
      <th style="border: 1px solid #000; padding: 6px;">YARD</th>
      <th style="border: 1px solid #000; padding: 6px;">NO. NCP</th>
      <th style="border: 1px solid #000; padding: 6px;">MASALAH UTAMA</th>
      <th style="border: 1px solid #000; padding: 6px;">AKAR MASALAH</th>
      <th style="border: 1px solid #000; padding: 6px;">SOLUSI JANGKA PANJANG</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(($Awal != "" && $Akhir != "") || $Order != "" || $PO != "" || $Hanger != "" || $Item != "" || $Warna != "" || $Pelanggan != "" || $ProdOrder != "" || $Demand != "" || $Proses != ""){
    $no=1;

    $fields = [];

    if($Awal != "" && $Akhir != ""){ 
      $fields[] = " DATE_FORMAT( tgl_masuk, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; 
    }
    if($Order != ""){ 
      $fields[] = " tq.no_order LIKE '%$Order%' "; 
    }
    if($PO != ""){ 
      $fields[] = " tq.no_po LIKE '%$PO%' "; 
    }
    if($Hanger != ""){ 
      $fields[] = " tq.no_hanger LIKE '%$Hanger%' "; 
    }
    if($Item != ""){ 
      $fields[] = " tq.no_item LIKE '%$Item%' "; 
    }
    if($Warna != ""){ 
      $fields[] = " tq.warna LIKE '%$Warna%' "; 
    }
    if($Pelanggan != ""){ 
      $fields[] = " tq.pelanggan LIKE '%$Pelanggan%' "; 
    }
    if($ProdOrder != ""){ 
      $fields[] = " tq.nokk LIKE '%$ProdOrder%' "; 
    }
    if($Demand != ""){ 
      $fields[] = " tq.nodemand LIKE '%$Demand%' "; 
    }
    if($Proses != ""){ 
      $fields[] = " tq.sts_aksi='$Proses' "; 
    }
    if($sts_tembakdok=="1"){ 
      $fields[] = " tq.sts_tembakdok='1' "; 
    }
    
    $default_fields = " AND tq.sts_pbon!='10' AND (tq.penghubung_masalah !='' or tq.penghubung_keterangan !='' or tq.penghubung_roll1 !='' or tq.penghubung_roll2 !='' or tq.penghubung_roll3 !=''  or tq.penghubung_dep !='' or tq.penghubung_dep_persen !='') ";
    $group_by_fields = " GROUP BY tq.no_order, tq.no_po, tq.no_hanger, tq.no_item, tq.warna, tq.pelanggan, tq.tgl_masuk, tq.nodemand; ";

     $sql_code = "SELECT
                  tq.*,
                  GROUP_CONCAT( DISTINCT b.no_ncp_gabungan SEPARATOR ', ' ) AS no_ncp,
                  GROUP_CONCAT( DISTINCT b.masalah_dominan SEPARATOR ', ' ) AS masalah_utama,
                  GROUP_CONCAT( DISTINCT b.akar_masalah SEPARATOR ', ' ) AS akar_masalah,
                  GROUP_CONCAT( DISTINCT b.solusi_panjang SEPARATOR ', ' ) AS solusi_panjang,
                  tli.qty_loss AS qty_sisa,
                  tli.satuan AS satuan_sisa,
                  c.masalah_dominan,
                  c.ket
                FROM
                  tbl_qcf tq
                  LEFT JOIN tbl_lap_inspeksi tli ON tq.nodemand = tli.nodemand 
                  AND tq.no_order = tli.no_order
                  LEFT JOIN tbl_ncp_qcf_now b ON tq.nodemand = b.nodemand 
                  LEFT JOIN tbl_aftersales_now c ON c.nodemand = tq.nodemand
                  AND c.nokk = tq.nokk
                  ";

    if(count($fields) > 0) {
      $sql_code .= "WHERE " . implode("AND", $fields) . $default_fields . $group_by_fields;
    } 
    $sql=mysqli_query($con,$sql_code);
    
    // Style definitions
    // $headerStyle = "border: 1px solid #000; padding: 4px; text-align: center; font-weight: bold;";
    // $dataStyle = "border: 1px solid #000; padding: 3px; text-align: center; font-size: 9px;";
    // $dataStyleLeft = "border: 1px solid #000; padding: 3px; text-align: left; font-size: 9px;";
    // $dataStyleRight = "border: 1px solid #000; padding: 3px; text-align: right; font-size: 9px;";
    // $evenRowStyle = "background-color: #f2f2f2;";
    // $oddRowStyle = "background-color: #ffffff;";
    
    while($row1=mysqli_fetch_array($sql)){
      // Aman pecah pelanggan/buyer
      $pelParts = explode('/', (string)$row1['pelanggan'], 2);
      $pelangganOnly = $pelParts[0] ?? '';
      $buyerOnly = $pelParts[1] ?? '';
      
      $dtArr=$row1['t_jawab'];
      $data = explode(",",$dtArr);
      $dtArr1=$row1['persen'];
      $data1 = explode(",",$dtArr1);
      
      if ($row1['penghubung_dep_persen'] !='') {
        $array_persen = array();
        $arrayA = explode(',', $row1['penghubung_dep_persen']);
        foreach ($arrayA as $element) {
          $array_persen[] = $element ;
        }
      }
  ?>
    <tr>
      <td class="date"><?php echo $row1['tgl_masuk']; ?></td>
      <td class="text-center text"><?php echo getStatusText($row1['nodemand'], $con); ?></td>
      <td class="wrap text"><?php echo $pelangganOnly; ?></td>
      <td class="wrap text"><?php echo $buyerOnly; ?></td>
      <td class="text-center text"><?php echo $row1['no_po']; ?></td>
      <td class="text-center text"><?php echo $row1['no_order']; ?></td>
      <td class="text-center text"><?php echo $row1['no_hanger']; ?></td>
      <td class="text-center text"><?php echo $row1['no_item']; ?></td>
      <td class="wrap text"><?php echo $row1['warna']; ?></td>
    <td class="wrap text"><?php echo "'".htmlspecialchars($row1['lot_legacy']); ?></td>
      <td class="text-center text"><?php echo $row1['lot']; ?></td>
      <td class="text-center text"><?php echo $row1['nodemand']; ?></td>
      <td class="text-right num2"><?php echo (float)$row1['berat_order']; ?></td>
      <td class="text-right num2"><?php echo (float)$row1['panjang_order']; ?></td>
      <td class="text-right num"><?php echo (float)$row1['rol']; ?></td>
      <td class="text-right num2"><?php echo (float)$row1['netto']; ?></td>
      <td class="text-right num2"><?php echo (float)$row1['panjang']; ?></td>
      <td class="text-right num2"><?php echo (float)$row1['berat_extra']; ?></td>
      <td class="text-right num2"><?php echo (float)$row1['panjang_extra']; ?></td>
      <td class="text-right num2"><?php echo (float)$row1['estimasi']; ?></td>
      <td class="text-right num2"><?php echo (float)$row1['panjang_estimasi']; ?></td>
      <td class="text-right num"><?php echo (float)$row1['penghubung_roll1']; ?></td>
      <td class="text-right num"><?php echo (float)$row1['penghubung_roll2']; ?></td>
      <td class="text-right num"><?php echo (float)$row1['penghubung_roll3']; ?></td>
      <td class="wrap text"><?php echo $row1['penghubung_masalah']; ?></td>
      <td class="wrap text"><?php echo $row1['penghubung_keterangan']; ?></td>
      <td class="wrap text"><?php echo $row1['masalah_dominan']; ?></td>
      <td class="wrap text"><?php echo $row1['ket']; ?></td>
      <td class="wrap text"><?php echo $row1['advice1']; ?></td>
      <td class="wrap text"><?php echo formatResponsibility($row1['penghubung_dep'], $array_persen ?? []); ?></td>
      <td class="wrap text"><?php echo $row1['no_ncp']; ?></td>
      <td class="wrap text"><?php echo $row1['masalah_utama']; ?></td>
      <td class="wrap text"><?php echo $row1['akar_masalah']; ?></td>
      <td class="wrap text"><?php echo $row1['solusi_panjang']; ?></td>
      <td class="text-center text"><?php echo getActualDelivery($row1['nodemand'], $conn1); ?></td>
    </tr>
    
    <?php if($row1['penghubung2_roll1'] and  $row1['penghubung2_roll1'] !='') { ?>
    <tr>
      <td class="date"><?php echo $row1['tgl_masuk']; ?></td>
      <td class="text-center text"><?php echo getStatusText($row1['nodemand'], $con); ?></td>
      <td class="wrap text"><?php echo $pelangganOnly; ?></td>
      <td class="wrap text"><?php echo $buyerOnly; ?></td>
      <td class="text-center text"><?php echo $row1['no_po']; ?></td>
      <td class="text-center text"><?php echo $row1['no_order']; ?></td>
      <td class="text-center text"><?php echo $row1['no_hanger']; ?></td>
      <td class="text-center text"><?php echo $row1['no_item']; ?></td>
      <td class="wrap text"><?php echo $row1['warna']; ?></td>
      <td class="wrap text"><?php echo  "'".htmlspecialchars($row1['lot_legacy']); ?></td>
      <td class="text-center text"><?php echo $row1['lot']; ?></td>
      <td class="text-center text"><?php echo $row1['nodemand']; ?></td>
      <td class="text-right num2"><?php echo (float)$row1['berat_order']; ?></td>
      <td class="text-right num2"><?php echo (float)$row1['panjang_order']; ?></td>
      <td class="text-right num"><?php echo (float)$row1['rol']; ?></td>
      <td class="text-right num2"><?php echo (float)$row1['netto']; ?></td>
      <td class="text-right num2"><?php echo (float)$row1['panjang']; ?></td>
      <td class="text-right num2"></td>
      <td class="text-right num2"></td>
      <td class="text-right num2"></td>
      <td class="text-right num2"></td>
      <td class="text-right num"><?php echo (float)$row1['penghubung2_roll1']; ?></td>
      <td class="text-right num"><?php echo (float)$row1['penghubung2_roll2']; ?></td>
      <td class="text-right num"><?php echo (float)$row1['penghubung2_roll3']; ?></td>
      <td class="wrap text"><?php echo $row1['penghubung2_masalah']; ?></td>
      <td class="wrap text"><?php echo $row1['penghubung2_keterangan']; ?></td>
      <td class="wrap text"><?php echo $row1['masalah_dominan']; ?></td>
      <td class="wrap text"><?php echo $row1['ket']; ?></td>
      <td class="wrap text"><?php echo $row1['advice2']; ?></td>
      <td class="wrap text"><?php echo formatResponsibility($row1['penghubung2_dep'], $array_persen ?? []); ?></td>
      <td class="wrap text"><?php echo $row1['no_ncp']; ?></td>
      <td class="wrap text"><?php echo $row1['masalah_utama']; ?></td>
      <td class="wrap text"><?php echo $row1['akar_masalah']; ?></td>
      <td class="wrap text"><?php echo $row1['solusi_panjang']; ?></td>
      <td class="text-center text"><?php echo getActualDelivery($row1['nodemand'], $conn1); ?></td>
    </tr>
    <?php } ?>
    
    <?php if($row1['penghubung3_roll1'] and  $row1['penghubung3_roll1'] !='') { ?>
    <tr style="<?= $bgcolor ?> <?= $dataStyle ?>">
      <td><?= $row1['tgl_masuk'];?></td>
      <td><?= getStatusText($row1['nodemand'], $con);?></td>
      <td><?= $pelangganOnly; ?></td>
      <td><?= $buyerOnly; ?></td>
      <td><?= $row1['no_po'];?></td>
      <td><?= $row1['no_order'];?></td>
      <td><?= $row1['no_hanger'];?></td>
      <td><?= $row1['no_item'];?></td>
      <td><?= $row1['warna'];?></td>
      <td class="wrap text"><?php echo  "'".htmlspecialchars($row1['lot_legacy']); ?></td>
      <td><?= $row1['lot'];?></td>
      <td><?= $row1['nodemand'];?></td>
      <td><?= $row1['berat_order'];?></td>
      <td><?= $row1['panjang_order'];?></td>
      <td><?= $row1['rol'];?></td>
      <td><?= $row1['netto'];?></td>
      <td><?= $row1['panjang'];?></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $row1['penghubung3_roll1'];?></td>
      <td><?= $row1['penghubung3_roll2'];?></td>
      <td><?= $row1['penghubung3_roll3'];?></td>
      <td><?= $row1['penghubung3_masalah'];?></td>
      <td><?= $row1['penghubung3_keterangan'];?></td>
      <td><?= $row1['masalah_dominan'];?></td>
      <td><?= $row1['ket'];?></td>
      <td><?= $row1['advice3'];?></td>
      <td><?= formatResponsibility($row1['penghubung3_dep'], $array_persen ?? []);?></td>
      <td><?= $row1['no_ncp'];?></td>
      <td><?= $row1['masalah_utama'];?></td>
      <td><?= $row1['akar_masalah'];?></td>
      <td><?= $row1['solusi_panjang'];?></td>
      <td><?= getActualDelivery($row1['nodemand'], $conn1);?></td>
    </tr>
    <?php } ?>
    
  <?php $no++; } } ?>
  </tbody>
</table>

</body>
</html>
