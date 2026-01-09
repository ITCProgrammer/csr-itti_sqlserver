<?PHP
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Laporan NCP</title>

</head>

<body>
  <?php
  $Tahun = isset($_GET['tahun']) ? $_GET['tahun'] : '';
  $Bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '';
  $Dept = isset($_POST['dept']) ? $_POST['dept'] : '';
  $Kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
  $Cancel = isset($_POST['chkcancel']) ? $_POST['chkcancel'] : '';

  if($_POST['gshift'] == "ALL") {
    $shft = " ";
  } else {
    $shft = " AND b.g_shift = '$GShift' ";
  }

  if($Kategori == "ALL") {
    $WKategori = " ";
  } else if($Kategori == "hitung") {
    $WKategori = " ncp_hitung='ya' AND ";
  } else if($Kategori == "tidakhitung") {
    $WKategori = " ncp_hitung='tidak' AND ";
  } else if($Kategori == "gerobak") {
    $WKategori = " kain_gerobak='ya' AND ";
  }
  ?>
  <div class="row">
    <div class="col-xs-6">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"> Penyelesaian</h3>
          <?php if($Tahun != "") { ?><br><b>Periode:
              <?php echo tanggal_indo($Tahun."-".$Bulan);
          } ?> Ket:
            <?php if($Kategori == "ALL") {
              echo "ALL";
            } elseif($Kategori == "hitung") {
              echo "NCP dihitung";
            } elseif($Kategori == "tidakhitung") {
              echo "NCP tidak dihitung";
            } elseif($Kategori == "gerobak") {
              echo "diGerobak";
            } ?>
          </b>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered table-striped" style="width: 100%;">
            <thead class="bg-blue">
              <tr>
                <th width="15%">
                  <div align="center">Penyelesaian</div>
                </th>
                <th width="10%">
                  <div align="center">KG</div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $qrydef = mysqli_query($con, " SELECT rincian,sum(berat) as kg from tbl_ncp_qcf_now 
			WHERE $WKategori no_ncp LIKE '".$Tahun."/".$Bulan."/%' GROUP BY rincian  ");
              while($rd = mysqli_fetch_array($qrydef)) {
                if($rd['rincian'] != "") {
                  $slsai = $rd['rincian'];
                } else {
                  $slsai = "Belum Ada Penyelesaian";
                }
                ?>
                <tr valign="top">
                  <td align="center">
                    <?php echo $slsai; ?>
                  </td>
                  <td align="right">
                    <?php echo $rd['kg']; ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xs-6">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"> Belum Ada Penyelesaian</h3>
          <?php if($Tahun != "") { ?><br><b>Periode:
              <?php echo tanggal_indo($Tahun."-".$Bulan);
          } ?> Ket:
            <?php if($Kategori == "ALL") {
              echo "ALL";
            } elseif($Kategori == "hitung") {
              echo "NCP dihitung";
            } elseif($Kategori == "tidakhitung") {
              echo "NCP tidak dihitung";
            } elseif($Kategori == "gerobak") {
              echo "diGerobak";
            } ?>
          </b>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered table-striped" style="width: 100%;">
            <thead class="bg-blue">
              <tr>
                <th width="15%">
                  <div align="center">Belum Ada Penyelesaian</div>
                </th>
                <th width="10%">
                  <div align="center">KG</div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $qryBASelesai = mysqli_query($con, "SELECT dept,sum(berat) as kg FROM tbl_ncp_qcf_now
			WHERE $WKategori no_ncp LIKE '".$Tahun."/".$Bulan."/%' and 
			(isnull(rincian) or rincian='') group by dept");
              while($rBAS = mysqli_fetch_array($qryBASelesai)) {
                ?>
                <tr valign="top">
                  <td align="center">
                    <?php echo $rBAS['dept']; ?>
                  </td>
                  <td align="right">
                    <?php echo $rBAS['kg']; ?>
                  </td>
                </tr>
                <?php

              }
              ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>

</html>