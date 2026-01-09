<?PHP
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="styles_cetak.css" rel="stylesheet" type="text/css">
  <title>Schedule</title>
  <style>
    .hurufvertical {
      writing-mode: tb-rl;
      -webkit-transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -o-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
      transform: rotate(180deg);
      white-space: nowrap;
      float: left;
    }

    input {
      text-align: center;
      border: hidden;
    }

    @media print {
      ::-webkit-input-placeholder {
        color: transparent;
      }

      :-moz-placeholder {
        color: transparent;
      }

      ::-moz-placeholder {
        color: transparent;
      }

      :-ms-input-placeholder {
        color: transparent;
      }

      .pagebreak {
        page-break-before: always;
      }

      .header {
        display: block
      }

      table thead {
        display: table-header-group;
      }
    }
  </style>
</head>

<body>
  <?php
  $data = mysqli_query($con, "SELECT
   	id,
	no_mesin,
	buyer,
	langganan,
	no_order,
	nokk,
  nodemand,
	jenis_kain,
	warna,
	no_warna,
	lot,
	sum(rol) as rol,
	sum(bruto) as bruto,
	proses,
	catatan,
	ket_status,
  total_gerobak,
	tgl_delivery,
  TIMESTAMPDIFF(HOUR, tgl_update, now()) as diff
FROM
	tbl_schedule_packing 
WHERE
	NOT `STATUS` = 'selesai' 
GROUP BY
	id
ORDER BY
	tgl_masuk ASC");
  $no = 1;
  $n = 1;
  $c = 0;
  $tglNow = date("Y-m-d");

  $totalRol = 0;
  $totalBruto = 0;
  $totalGerobak = 0;
  ?>
  <table width="100%">
    <thead>
      <tr>
        <td>
          <table width="100%" border="1" class="table-list1">
            <tr>
              <td width="9%" align="center"><img src="indo.jpg" width="40" height="40" /></td>
              <td align="center" valign="middle"><strong>
                  <font size="+1">Schedule Packing</font>
                </strong></td>
            </tr>
          </table>
          <table width="100%" border="0">
            <tbody>
              <tr>
                <td width="78%">
                  <font size="-1">Hari/Tanggal :
                    <?php echo tanggal_indo($tglNow, true); ?>
                  </font>
                </td>
                <td width="22%" align="right">Jam:
                  <?php echo date('H:i:s'); ?>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </thead>
    <tr>
      <td>
        <table width="100%" border="1" class="table-list1">
          <thead>
            <tr>
              
              <td width="3%" rowspan="2" scope="col">
                <div align="center">No. Urut</div>
              </td>
              <td width="15%" rowspan="2" scope="col">
                <div align="center">Pelanggan</div>
              </td>
			        <td width="8%" rowspan="2" scope="col">
                <div align="center">No. Order</div>
              </td>	
              <td width="12%" rowspan="2" scope="col">
                <div align="center">Jenis Kain</div>
              </td>
              <td width="9%" rowspan="2" scope="col">
                <div align="center">Warna</div>
              </td>
              <td width="9%" rowspan="2" scope="col">
                <div align="center">No. Warna</div>
              </td>
              <td width="4%" rowspan="2" scope="col">
                <div align="center">Lot</div>
              </td>
              <td width="7%" rowspan="2" scope="col">
                <div align="center">Tanggal Delivery</div>
              </td>
              <td width="7%" rowspan="2" scope="col">
                <div align="center">Roll</div>
              </td>
              <td width="7%" rowspan="2" scope="col">
                <div align="center">KG</div>
              </td>
              <td width="7%" rowspan="2" scope="col">
                <div align="center">Gerobak</div>
              </td>
              <td width="14%" rowspan="2" scope="col">
                <div align="center">Keterangan</div>
              </td>
            </tr>
          </thead>
          <tbody>
            <?php
            // $col = 0;
            while ($rowd = mysqli_fetch_array($data)) {
              // $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
              ?>
              <!-- <tr bgcolor="<?php echo $bgcolor; ?>"> -->
              <tr>
                <!-- <td align="center">
                  <?php echo $rowd['no_mesin']; ?>
                </td> -->
                <td align="center">
                  <?php echo $no; ?>
                </td>
                <td>
                  <?php echo $rowd['langganan'] . "/" . $rowd['buyer']; ?>
                </td>
                <td align="center">
                  <?php echo $rowd['no_order']; ?>
                </td>
                <td>
                  <?php echo $rowd['jenis_kain']; ?>
                </td>
                <td align="center">
                  <?php echo $rowd['warna']; ?>
                </td>
                <td align="center">
                  <?php echo $rowd['no_warna']; ?>
                </td>
                <td align="center">
                  <?php echo $rowd['lot']; ?>
                </td>
                <td align="center">
                  <?php echo $rowd['tgl_delivery']; ?>
                </td>
                <td align="center">
                  <?php echo $rowd['rol']; ?>
                </td>
                <td align="center">
                  <?php echo $rowd['bruto']; ?>
                </td>
                <td align="center">
                  <?php echo $rowd['total_gerobak']; ?>
                </td>
                <td>
                  <i>
                    <?php echo 'KK: ' . $rowd['nokk']; ?>
                  </i><br />
                  <i>
                    <?php echo 'Demand: ' . $rowd['nodemand']; ?>
                  </i><br />
                  <i style="color:red;"><strong>
                      <?php echo $rowd['catatan']; ?>
                    </strong></i><br />
                </td>
              </tr>
              <?php
              $totalRol += $rowd['rol'];
              $totalBruto += $rowd['bruto'];
              $totalGerobak += $rowd['total_gerobak'];
              $no++;
            } ?>
            <tr>
              <td colspan="8" align="center"><strong>Total</strong></td>
              <td align="center"><strong><?php echo $totalRol; ?></strong></td>
              <td align="center"><strong><?php echo $totalBruto; ?></strong></td>
              <td align="center"><strong><?php echo $totalGerobak; ?></strong></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>
