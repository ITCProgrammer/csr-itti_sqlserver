<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
//--
//$con=mysqli_connect("localhost","root","");
//$db=mysqli_select_db("db_qc",$con)or die("Gagal Koneksi");
//$idkk=$_GET['idkk'];
$idkk = $_REQUEST['idkk'];
$act = $_GET['g'];
$data = mysqli_query($con, "SELECT * FROM tbl_tq_nokk WHERE nodemand='$idkk' ORDER BY id DESC LIMIT 1");
$r = mysqli_fetch_array($data);


$id_nokk = $r['id'];
$nokk_demand_sql = mysqli_query($con, "select nodemand, sort_by from tbl_tq_nokk_demand where id_nokk = '$id_nokk' order by sort_by  ");

$array_demand_2_3 = [];
$array_demand_4_5_6 = [];
while ($datas = mysqli_fetch_assoc($nokk_demand_sql)) {
  if ($datas['sort_by'] <= 3) {
    $array_demand_2_3[] = ' / ' . $datas['nodemand'];
  } else {
    if ($datas['sort_by'] == 4) {
      $pemisah = '';
    } else {
      $pemisah = ' / ';
    }
    $array_demand_4_5_6[] = $pemisah . $datas['nodemand'];
  }
}

$sqlDB2Season = "SELECT 
                    TRIM(INTERNALREFERENCE) AS INTERNALREFERENCE
                  FROM SALESORDER
                  WHERE CODE = '$r[no_order]'
                  LIMIT 1";
$stmtSeason = db2_exec($conn1, $sqlDB2Season, array('cursor' => DB2_SCROLLABLE));
$rowDB2Season = db2_fetch_assoc($stmtSeason);


include "../../phpqrcode/qrlib.php";
$tempdir1 = "../../temp/"; //Nama folder tempat menyimpan file qrcode
if (!file_exists($tempdir1)) //Buat folder bername temp
  mkdir($tempdir1);

//isi qrcode jika di scan
$codeContents1 = $r['no_test'];
//nama file qrcode yang akan disimpan
$namaFile1 = $r['no_test'] . ".png";
//ECC Level
$level1 = QR_ECLEVEL_H;
//Ukuran pixel
$UkuranPixel1 = 1; //10
//Ukuran frame
$UkuranFrame1 = 1; //4

QRcode::png($codeContents1, $tempdir1 . $namaFile1, $level1, $UkuranPixel1, $UkuranFrame1);
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="styles_cetak.css" rel="stylesheet" type="text/css">
  <title>Cetak Label</title>
  <style>
    td {
      border: none !important;
    }
  </style>
</head>


<body>
  <table width="100%" border="0" style="width: 7in;">
    <tbody>
      <tr>

        <!-- Stiker 1 -->
        <td align="left" valign="top" style="height: 1.6in;">
          <table width="100%" border="0" class="table-list1" style="width: 2.3in;">
            <tr>
              <td colspan="3">
                <div style="font-size: 8px; position: relative">
                  <?php echo $r['nodemand']; ?>
                  <?php
                  foreach ($array_demand_2_3 as $data) {
                    echo $data;
                  }
                  if (count($array_demand_4_5_6) > 0) {
                    echo '<br>';
                  }
                  foreach ($array_demand_4_5_6 as $data) {
                    echo $data;
                  }
                  ?>
                  <br>
                  <?php echo "Test-" . $r['no_test']; ?>&nbsp;&nbsp;<?= $r['area'] ?>
                </div>
              </td>
              <td align="center" valign="top"><span style="font-size: 8px; position: relative"><?php echo '<img src="' . $tempdir1 . $namaFile1 . '" style="position:absolute; top:0; right:0" />'; ?></span></td>
            </tr>
            <tr>
              <td colspan="4">
                <div style="font-size:9px;">
                  <?php
                  $pos = strpos($r['pelanggan'], "/");
                  if ($pos > 0) {
                    $pos1 = $pos;
                    $result = substr($r['pelanggan'], 0, $pos1);
                    $pos2 = $pos + 1;
                    $result1 = substr($r['pelanggan'], $pos2);
                  }
                  ?>
                  <?php echo substr($result, 0, 13) . "/" . substr($result1, 0, 13); ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="4">
                <div style="font-size:9px;">
                  <?php echo substr($r['no_po'], 0, 31); ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="4">
                <div style="font-size:9px;">
                  <strong><?php echo $r['no_order']; ?></strong>
                  <?php echo " (" . $r['no_item'] . ")"; ?>
                  <?= $rowDB2Season['INTERNALREFERENCE'] ?? '' ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="4" valign="top">
                <div style="font-size:5px;">
                  <?php echo substr($r['jenis_kain'], 0); ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="1">
                <div style="font-size:9px;">
                  <span style="font-size:7px;">
                    <?php echo "<strong><span style='font-size:8px;'>" . substr($r['warna'], 0, 60) . "</span></strong>/" . substr($r['no_warna'], 0, 15); ?>
                  </span>
                </div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">L</div>
              </td>
              <td colspan="1" style="padding: 0;">
                <div style="font-size:9px;">:</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
            </tr>
            <tr>
              <td colspan="1">
                <div style="font-size:8px;">
                  <?php echo $r['nokk']; ?>&nbsp;<?php echo ($r['lot_legacy'] != '-') ? $r['lot_legacy'] : ''; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  L&amp;G: &nbsp;&nbsp;
                  <?php echo $r['lebar'] . " x " . $r['gramasi']; ?></div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">W</div>
              </td>
              <td colspan="1" style="padding: 0">
                <div style="font-size:9px;">:</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
            </tr>
            <tr>
              <td colspan="1">
                <div style="font-size:9px;">
                  <?php echo date('d-m-Y H:i', strtotime(substr($r['tgl_masuk'], 0, 18))) . "/" . substr($r['proses_fin'], 0, 14); ?>
                  <?php echo ($r['suhu'] != '' and $r['suhu'] != '-') ? '/' . $r['suhu'] : '/0'; ?>
                </div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">SP</div>
              </td>
              <td colspan="1" style="padding: 0">
                <div style="font-size:9px;">:</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
            </tr>
            <?php
            if ($r['development'] == 'Additional') {
              $color = 'green';
            } else if ($r['development'] == '1st Bulk') {
              $color = 'yellow';
            } else if ($r['development'] == 'Development') {
              $color = 'red';
            } else if ($r['development'] == 'Labdip') {
              $color = 'gray';
            } else if ($r['development'] == 'Mini Bulk') {
              $color = 'blue';
            } else if ($r['development'] == 'Request') {
              $color = 'purple';
            } else {
              $color = '';
            }
            ?>

            <?php
            if (strpos($r['pelanggan'], 'UNDER A') !== false) {
              ?>
              <tr>
                <td colspan="4">
                  <div style="font-size: 8px;">
                    Waktu Shrinkage <br>
                    Waktu Testing :
                    <?php
                    // echo date('d-m-Y H:i', strtotime($r['tgl_update'] . '+ 4 hour'));
                    echo $waktu_testing = date('d-m-Y H:i', strtotime($r['tgl_masuk'] . '+ 4 hour'));
                    ?>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <div style="font-size: 8px;">Waktu Selesai Test :
                    <?php echo $waktu_selesai = date('d-m-Y H:i', strtotime($waktu_testing . '+ 6 hour')); ?>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <div style="font-size: 8px;">Waktu Ukur :
                    <?php echo $waktu_ukur = date('d-m-Y H:i', strtotime($waktu_selesai . '+ 4 hour')); ?>
                  </div>
                </td>
              </tr>
            <?php } ?>

            <tr>
              <td colspan="4" style="background-color:<?= $color ?>">&nbsp;
                
              </td>
            </tr>
          </table>
        </td>
        <!-- End of Stiker 1 -->

        <!-- Stiker 2 -->
        <td align="left" valign="top" style="height: 1.6in;">
          <table width="100%" border="0" class="table-list1" style="width: 2.3in;">
            <tr>
              <td colspan="3">
                <div style="font-size: 8px; position: relative">
                  <?php echo $r['nodemand']; ?>
                  <?php
                  foreach ($array_demand_2_3 as $data) {
                    echo $data;
                  }
                  if (count($array_demand_4_5_6) > 0) {
                    echo '<br>';
                  }
                  foreach ($array_demand_4_5_6 as $data) {
                    echo $data;
                  }
                  ?>
                  <br>
                  <?php echo "Test-" . $r['no_test']; ?>&nbsp;&nbsp;<?= $r['area'] ?>
                </div>
              </td>
              <td align="center" valign="top"><span style="font-size: 8px; position: relative"><?php echo '<img src="' . $tempdir1 . $namaFile1 . '" style="position:absolute; top:0; right:0" />'; ?></span></td>
            </tr>
            <tr>
              <td colspan="4">
                <div style="font-size:9px;">
                  <?php
                  $pos = strpos($r['pelanggan'], "/");
                  if ($pos > 0) {
                    $pos1 = $pos;
                    $result = substr($r['pelanggan'], 0, $pos1);
                    $pos2 = $pos + 1;
                    $result1 = substr($r['pelanggan'], $pos2);
                  }
                  ?>
                  <?php echo substr($result, 0, 13) . "/" . substr($result1, 0, 13); ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="4">
                <div style="font-size:9px;">
                  <?php echo substr($r['no_po'], 0, 31); ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="4">
                <div style="font-size:9px;">
                  <strong><?php echo $r['no_order']; ?></strong>
                  <?php echo " (" . $r['no_item'] . ")"; ?>
                  <?= $rowDB2Season['INTERNALREFERENCE'] ?? '' ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="4" valign="top">
                <div style="font-size:5px;">
                  <?php echo substr($r['jenis_kain'], 0); ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="1">
                <div style="font-size:9px;">
                  <span style="font-size:7px;">
                    <?php echo "<strong><span style='font-size:9px;'>" . substr($r['warna'], 0, 60) . "</span></strong>/" . substr($r['no_warna'], 0, 15); ?>
                  </span>
                </div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
            </tr>
            <tr>
              <td colspan="1">
                <div style="font-size:9px;">
                  <?php echo $r['nokk']; ?>&nbsp;<?php echo ($r['lot_legacy'] != '-') ? $r['lot_legacy'] : ''; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  L&amp;G: &nbsp;&nbsp;
                  <?php echo $r['lebar'] . " x " . $r['gramasi']; ?></div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
            </tr>
            <tr>
              <td colspan="1">
                <div style="font-size:9px;">
                  <?php echo date('d-m-Y H:i', strtotime(substr($r['tgl_masuk'], 0, 18))) . "/" . substr($r['proses_fin'], 0, 14); ?>
                  <?php echo ($r['suhu'] != '' and $r['suhu'] != '-') ? '/' . $r['suhu'] : '/0'; ?>
                </div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
            </tr>
            <?php
            if ($r['development'] == 'Additional') {
              $color = 'green';
            } else if ($r['development'] == '1st Bulk') {
              $color = 'yellow';
            } else if ($r['development'] == 'Development') {
              $color = 'red';
            } else if ($r['development'] == 'Labdip') {
              $color = 'gray';
            } else if ($r['development'] == 'Mini Bulk') {
              $color = 'blue';
            } else if ($r['development'] == 'Request') {
              $color = 'purple';
            } else {
              $color = '';
            }
            ?>

            <?php
            if (strpos($r['pelanggan'], 'UNDER A') !== false) {
              ?>
              <tr>
                <td colspan="4">
                  <div style="font-size: 8px;">
                    Waktu Shrinkage <br>
                    Waktu Testing :
                    <?php
                    // echo date('d-m-Y H:i', strtotime($r['tgl_update'] . '+ 4 hour'));
                    echo $waktu_testing = date('d-m-Y H:i', strtotime($r['tgl_masuk'] . '+ 4 hour'));
                    ?>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <div style="font-size: 8px;">Waktu Selesai Test :
                    <?php echo $waktu_selesai = date('d-m-Y H:i', strtotime($waktu_testing . '+ 6 hour')); ?>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <div style="font-size: 8px;">Waktu Ukur :
                    <?php echo $waktu_ukur = date('d-m-Y H:i', strtotime($waktu_selesai . '+ 4 hour')); ?>
                  </div>
                </td>
              </tr>
            <?php } ?>

            <tr>
              <td colspan="4" style="background-color:<?= $color ?>">&nbsp;
                
              </td>
            </tr>
          </table>
        </td>
        <!-- End of Stiker 2 -->

        <!-- Stiker 3 -->
        <td align="left" valign="top" style="height: 1.6in;">
          <table width="100%" border="0" class="table-list1" style="width: 2.3in;">
            <tr>
              <td colspan="3">
                <div style="font-size: 8px; position: relative">
                  <?php echo $r['nodemand']; ?>
                  <?php
                  foreach ($array_demand_2_3 as $data) {
                    echo $data;
                  }
                  if (count($array_demand_4_5_6) > 0) {
                    echo '<br>';
                  }
                  foreach ($array_demand_4_5_6 as $data) {
                    echo $data;
                  }
                  ?>
                  <br>
                  <?php echo "Test-" . $r['no_test']; ?>&nbsp;&nbsp;<?= $r['area'] ?>
                </div>
              </td>
              <td align="center" valign="top"><span style="font-size: 8px; position: relative"><?php echo '<img src="' . $tempdir1 . $namaFile1 . '" style="position:absolute; top:0; right:0" />'; ?></span></td>
            </tr>
            <tr>
              <td colspan="4">
                <div style="font-size:9px;">
                  <?php
                  $pos = strpos($r['pelanggan'], "/");
                  if ($pos > 0) {
                    $pos1 = $pos;
                    $result = substr($r['pelanggan'], 0, $pos1);
                    $pos2 = $pos + 1;
                    $result1 = substr($r['pelanggan'], $pos2);
                  }
                  ?>
                  <?php echo substr($result, 0, 13) . "/" . substr($result1, 0, 13); ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="4">
                <div style="font-size:9px;">
                  <?php echo substr($r['no_po'], 0, 31); ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="4">
                <div style="font-size:9px;">
                  <strong><?php echo $r['no_order']; ?></strong>
                  <?php echo " (" . $r['no_item'] . ")"; ?>
                  <?= $rowDB2Season['INTERNALREFERENCE'] ?? '' ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="4" valign="top">
                <div style="font-size:5px;">
                  <?php echo substr($r['jenis_kain'], 0); ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="1">
                <div style="font-size:9px;">
                  <span style="font-size:7px;">
                    <?php echo "<strong><span style='font-size:9px;'>" . substr($r['warna'], 0, 60) . "</span></strong>/" . substr($r['no_warna'], 0, 15); ?>
                  </span>
                </div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
            </tr>
            <tr>
              <td colspan="1">
                <div style="font-size:9px;">
                  <?php echo $r['nokk']; ?>&nbsp;<?php echo ($r['lot_legacy'] != '-') ? $r['lot_legacy'] : ''; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  L&amp;G: &nbsp;&nbsp;
                  <?php echo $r['lebar'] . " x " . $r['gramasi']; ?></div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
            </tr>
            <tr>
              <td colspan="1">
                <div style="font-size:9px;">
                  <?php echo date('d-m-Y H:i', strtotime(substr($r['tgl_masuk'], 0, 18))) . "/" . substr($r['proses_fin'], 0, 14); ?>
                  <?php echo ($r['suhu'] != '' and $r['suhu'] != '-') ? '/' . $r['suhu'] : '/0'; ?>
                </div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
              <td colspan="1">
                <div style="font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
              </td>
            </tr>
            <?php
            if ($r['development'] == 'Additional') {
              $color = 'green';
            } else if ($r['development'] == '1st Bulk') {
              $color = 'yellow';
            } else if ($r['development'] == 'Development') {
              $color = 'red';
            } else if ($r['development'] == 'Labdip') {
              $color = 'gray';
            } else if ($r['development'] == 'Mini Bulk') {
              $color = 'blue';
            } else if ($r['development'] == 'Request') {
              $color = 'purple';
            } else {
              $color = '';
            }
            ?>

            <?php
            if (strpos($r['pelanggan'], 'UNDER A') !== false) {
              ?>
              <tr>
                <td colspan="4">
                  <div style="font-size: 8px;">
                    Waktu Shrinkage <br>
                    Waktu Testing :
                    <?php
                    // echo date('d-m-Y H:i', strtotime($r['tgl_update'] . '+ 4 hour'));
                    echo $waktu_testing = date('d-m-Y H:i', strtotime($r['tgl_masuk'] . '+ 4 hour'));
                    ?>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <div style="font-size: 8px;">Waktu Selesai Test :
                    <?php echo $waktu_selesai = date('d-m-Y H:i', strtotime($waktu_testing . '+ 6 hour')); ?>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <div style="font-size: 8px;">Waktu Ukur :
                    <?php echo $waktu_ukur = date('d-m-Y H:i', strtotime($waktu_selesai . '+ 4 hour')); ?>
                  </div>
                </td>
              </tr>
            <?php } ?>

            <tr>
              <td colspan="4" style="background-color:<?= $color ?>">&nbsp;
                
              </td>
            </tr>
          </table>
        </td>
        <!-- End of Stiker 3 -->

      </tr>
    </tbody>
  </table>
</body>

</html>