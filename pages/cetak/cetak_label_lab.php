<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";

$nocounter = $_GET['nocounter'];
$data = mysqli_query($conlab, "SELECT * FROM tbl_test_qc WHERE no_counter = '$nocounter' ");
$r = mysqli_fetch_array($data);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="styles_cetak.css" rel="stylesheet" type="text/css">
  <title>Cetak Label</title>
  <style>
    td {
      border-top: 0px #000000 solid;
      border-bottom: 0px #000000 solid;
      border-left: 0px #000000 solid;
      border-right: 0px #000000 solid;
    }
  </style>
</head>


<body>
  <table width="100%" border="0" style="width: 7in;">
    <tbody>
      <tr>

        <!-- end of pertama -->
        <td align="left" valign="top" style="height: 1.6in;">
          <table width="100%" border="0" class="table-list1" style="width: 2.3in;">
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size: 8px;">
                  <?php echo $r['no_counter']; ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:9px;">
                  <?php echo $r['buyer']; ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:9px;"><?php echo '' ?></div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:9px;">
                  <strong><?php echo $r['no_order']; ?></strong><?php echo " (" . $r['no_item'] . ")"; ?> <?= "- " . $r['treatment'] ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:6px;"><?php echo substr($r['jenis_kain'], 0, 100); ?></div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:9px;"><span style="font-size:7px;"><?php echo "<strong><span style='font-size:9px;'>" . substr($r['warna'], 0, 60) . "</span></strong>/" . substr($r['no_warna'], 0, 15); ?></span>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:7px;">
                  <?php echo $r['permintaan_testing'] != "" ? $r['permintaan_testing'] : 'FULL TEST' ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:20px solid grey;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:7px;">
                  <?php echo $r['tgl_terimakain'] ?>
                </div>
              </td>
            </tr>
          </table>
        </td> <!-- end of pertama -->

        <!-- end of kedua -->
        <td align="left" valign="top" style="height: 1.6in;">
          <table width="100%" border="0" class="table-list1" style="width: 2.3in;">
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size: 8px;">
                  <?php echo $r['no_counter']; ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:9px;">
                  <?php echo $r['buyer']; ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:9px;"><?php echo '' ?></div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:9px;">
                  <strong><?php echo $r['no_order']; ?></strong><?php echo " (" . $r['no_item'] . ")"; ?> <?= "- " . $r['treatment'] ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:6px;"><?php echo substr($r['jenis_kain'], 0, 100); ?></div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:9px;"><span style="font-size:7px;"><?php echo "<strong><span style='font-size:9px;'>" . substr($r['warna'], 0, 60) . "</span></strong>/" . substr($r['no_warna'], 0, 15); ?></span>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:7px;">
                  <?php echo $r['permintaan_testing'] != "" ? $r['permintaan_testing'] : 'FULL TEST' ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:20px solid grey;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:7px;">
                  <?php echo $r['tgl_terimakain'] ?>
                </div>
              </td>
            </tr>
          </table>
        </td> <!-- end of kedua -->

        <!-- end of ketiga -->
        <td align="left" valign="top" style="height: 1.6in;">
          <table width="100%" border="0" class="table-list1" style="width: 2.3in;">
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size: 8px;">
                  <?php echo $r['no_counter']; ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:9px;">
                  <?php echo $r['buyer']; ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:9px;"><?php echo '' ?></div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:9px;">
                  <strong><?php echo $r['no_order']; ?></strong><?php echo " (" . $r['no_item'] . ")"; ?> <?= "- " . $r['treatment'] ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:6px;"><?php echo substr($r['jenis_kain'], 0, 100); ?></div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:9px;"><span style="font-size:7px;"><?php echo "<strong><span style='font-size:9px;'>" . substr($r['warna'], 0, 60) . "</span></strong>/" . substr($r['no_warna'], 0, 15); ?></span>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:7px;">
                  <?php echo $r['permintaan_testing'] != "" ? $r['permintaan_testing'] : 'FULL TEST' ?>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:0px #000000 solid; border-bottom:20px solid grey;
  border-left:0px #000000 solid; border-right:0px #000000 solid;">
                <div style="font-size:7px;">
                  <?php echo $r['tgl_terimakain'] ?>
                </div>
              </td>
            </tr>
          </table>
        </td> <!-- end of ketiga -->

      </tr>
    </tbody>
  </table>
</body>

</html>