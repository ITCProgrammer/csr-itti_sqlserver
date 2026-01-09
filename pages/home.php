<?php
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";
// if (mysqli_connect_errno()) {
// printf("Connect failed: %s\n", mysqli_connect_error());
//    header("Refresh:3");
// exit();
// ?>
<?php
//set base constant 
if (!isset($_SESSION['usrid']) || !isset($_SESSION['pasid'])) {
  ?>
  <script>setTimeout("location.href='login.php'", 500);</script>
  <?php
  die('Illegal Acces');
}

//request page
$page = isset($_GET['p']) ? $_GET['p'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$page = strtolower($page);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="180">
  <title>Home</title>
  <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
  <script src="plugins/highcharts/code/highcharts.js"></script>
  <script src="plugins/highcharts/code/highcharts-3d.js"></script>
  <script src="plugins/highcharts/code/modules/exporting.js"></script>
  <script src="plugins/highcharts/code/modules/export-data.js"></script>
  <style type="text/css">
    #container {
      height: 400px;
      min-width: 310px;
      max-width: 800px;
      margin: 0 auto;
    }

    #container1 {
      height: 400px;
      min-width: 310px;
      max-width: 1200px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <div class="callout callout-info">
    <h4>Welcome
      <?php echo strtoupper($_SESSION['usrid']); ?> at Indo Taichen Textile Industry
    </h4>
    This is a web-based Indo Taichen system
  </div>
  <!-- Main content -->
  <section class="content">
    
    <div class="row">
      <?php if ($_SESSION['lvl_id'] != "SPVQC" && $_SESSION['lvl_id'] != "AFTERSALES") { ?>
        <?php if ($_SESSION['usrid'] != "marketing") { ?>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="RekapData">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-pencil-square-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Rekap Data</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
        <?php } ?>
      <?php } ?>

      <?php if ($_SESSION['lvl_id'] == "AFTERSALES") { ?>
        <?php if (strtoupper($_SESSION['usrid']) != "KPE") { ?>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="KPENew">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-pencil-square-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Input KPE</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="LapKPE">
              <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fa fa-adjust"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Laporan KPE</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="LapKPEStatus">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-info-circle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">STATUS KPE</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="RekapData">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-bar-chart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Rekap Data</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="Newbonpenghubung">
              <div class="info-box">
                <span class="info-box-icon bg-pink"><i class="fa fa-truck"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">New Bon Penghubung</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="LapGantiKain">
              <div class="info-box">
                <span class="info-box-icon bg-teal"><i class="fa fa-exchange"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Laporan Ganti Kain</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="LapRetur">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-arrows"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Laporan Retur</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="LapTPUKPE">
              <div class="info-box">
                <span class="info-box-icon bg-light-blue"><i class="fa fa-file-text-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">LAPORAN TPUKPE</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="ResultKKNew">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-bar-chart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">REPORT TEST QUALITY</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="DataPengirimanNOW">
              <div class="info-box">
                <span class="info-box-icon bg-pink"><i class="fa fa-truck"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Pengiriman NOW</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="PersediaanNOW">
              <div class="info-box">
                <span class="info-box-icon bg-lime"><i class="fa fa-database"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Persediaan Stok NOW</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
          
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="LihatDataShading">
            <div class="info-box">
              <span class="info-box-icon bg-orange"><i class="fa fa-eye"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Laporan Shading</span>
                <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="LihatDataBedaRoll">
            <div class="info-box">
              <span class="info-box-icon bg-teal"><i class="fa fa-columns"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Laporan Beda Roll</span>
                <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="InputDisposisiDetail">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-pencil-square-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Input Disposisi NOW</span>
                <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="DisposisiNOW">
            <div class="info-box">
              <span class="info-box-icon bg-purple"><i class="fa fa-signal"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Disposisi NOW</span>
                <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        <!-- Aftersales NOW Section -->
        <!--
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="AftersalesNOW">
            <div class="info-box">
              <span class="info-box-icon bg-navy"><i class="fa fa-clock-o"></i></span>
              <div class="info-box-content">
          <span class="info-box-text">Aftersales NOW</span>
          <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        -->

        <!-- Summary Order Section -->
        <!--
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="SummaryOrder">
            <div class="info-box">
              <span class="info-box-icon bg-teal"><i class="fa fa-check"></i></span>
              <?php
              include('koneksi.php');
              // Fetch data for Team A
              $sqldt = mysqli_query($con, "SELECT COUNT(*) AS jml_a FROM tbl_qcf WHERE sts_pbon='1' AND sts_aksi IS NULL AND 
            (sales='Darien' OR sales='Gilang Kurnia' OR sales='Vany Leany' OR sales='Thania' OR sales='Viviani' OR sales='Heri' OR sales='Bunbun' OR sales='Frans' OR sales='Fransiska') AND 
            DATE_FORMAT( tgl_masuk, '%Y-%m-%d' ) BETWEEN '2021-01-01' AND NOW()
            ");
              $row = mysqli_fetch_array($sqldt);
              // Fetch data for Team B
              $sqldt1 = mysqli_query($con, "SELECT COUNT(*) AS jml_b FROM tbl_qcf WHERE sts_pbon='1' AND sts_aksi IS NULL AND 
            (sales='Roni' OR sales='Deden' OR sales='Rangga Aditya' OR sales='Nia') AND 
            DATE_FORMAT( tgl_masuk, '%Y-%m-%d' ) BETWEEN '2021-01-01' AND NOW()
            ");
              $row1 = mysqli_fetch_array($sqldt1);
              // Fetch data for Team C
              $sqldt2 = mysqli_query($con, "SELECT COUNT(*) AS jml_c FROM tbl_qcf WHERE sts_pbon='1' AND sts_aksi IS NULL AND 
            (sales='Ridwan' OR sales='Ikhsan Ikhwana' OR sales='Bambang' OR sales='Budiman' OR sales='Dennis' OR sales='Levia Zhuang' OR sales=' Kevin Noventin' OR sales='Fahrurrozi' OR sales='Richard' OR sales='Yohanes') AND 
            DATE_FORMAT( tgl_masuk, '%Y-%m-%d' ) BETWEEN '2021-01-01' AND NOW()
            ");
              $row2 = mysqli_fetch_array($sqldt2);
              ?>
              <div class="info-box-content">
          <span class="info-box-text">Bon Penghubung</span>
          <span class="label bg-red blink_me">Team A =
            <?php echo $row['jml_a']; ?>
          </span><br>
          <span class="label bg-red blink_me">Team B =
            <?php echo $row1['jml_b']; ?>
          </span><br>
          <span class="label bg-red blink_me">Team C =
            <?php echo $row2['jml_c']; ?>
          </span>
              </div>
            </div>
          </a>
        </div>
        -->

        <!-- Input Disposisi QC Section -->
        <!--
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="InputDisposisiDetail">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-pencil-square-o"></i></span>
              <div class="info-box-content">
          <span class="info-box-text">Input Disposisi QC</span>
          <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        -->

        <!-- Library Disposisi QC Section -->
        <!--
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="DisposisiNOW">
            <div class="info-box">
              <span class="info-box-icon bg-purple"><i class="fa fa-signal"></i></span>
              <div class="info-box-content">
          <span class="info-box-text">Library Disposisi QC</span>
          <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        -->

        <!-- Inspection Report NOW Section -->
        <!--
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="InspectionReportNOW">
            <div class="info-box">
              <span class="info-box-icon bg-maroon"><i class="fa fa-search-plus"></i></span>
              <div class="info-box-content">
          <span class="info-box-text">Inspection Report NOW</span>
          <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        -->

        <!-- Data Pengiriman NOW Section -->
        <!--
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="DataPengirimanNOW">
            <div class="info-box">
              <span class="info-box-icon bg-pink"><i class="fa fa-truck"></i></span>
              <div class="info-box-content">
          <span class="info-box-text">Data Pengiriman NOW</span>
          <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        -->

        <!-- Persediaan NOW Section -->
        <!--
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="PersediaanNOW">
            <div class="info-box">
              <span class="info-box-icon bg-lime"><i class="fa fa-database"></i></span>
              <div class="info-box-content">
          <span class="info-box-text">Persediaan NOW</span>
          <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        -->

        <!-- Input Data TPU KPE Section -->
        <!--
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="InputDataAPTPUKPE">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-pencil-square-o"></i></span>
              <div class="info-box-content">
          <span class="info-box-text">INPUT DATA TPU KPE</span>
          <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        -->
      <?php  }} ?>

        <?php if($_SESSION['usrid'] == 'ppc' ||$_SESSION['dept'] == 'MKT'){ ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="Newbonpenghubung">
            <div class="info-box">
              <span class="info-box-icon bg-pink"><i class="fa fa-truck"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">New Bon Penghubung</span>
                <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="ApproveBonPenghubung">
            <div class="info-box">
              <span class="info-box-icon bg-teal"><i class="fa fa-check"></i></span>
              <div class="info-box-content">
                  <span class="info-box-text">Approve Bon Penghubung</span>
                  <span class="label bg-red blink_me">MARKETING =
                    <?php echo $row['jml_a']; ?>
                  </span><br>
                  <span class="label bg-red blink_me">PPC =
                    <?php echo $row1['jml_b']; ?>
                  </span><br>
                </div>
            </div>
          </a>
        </div>
        <?php } ?>
        
      <?php if ($_SESSION['lvl_id'] != "DMF" and $_SESSION['lvl_id'] != "TQ" and $_SESSION['lvl_id'] != "SPVQC" and $_SESSION['lvl_id'] != "AFTERSALES") { ?>


        <!-- jika username marketing hidden -->
        <?php if ($_SESSION['dept'] != "MKT" && $_SESSION['usrid'] != "ppc") { ?>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="SummaryOrder">
              <div class="info-box">
                <span class="info-box-icon bg-teal"><i class="fa fa-check"></i></span>
                <?php
                include('koneksi.php');

                // TIM A
                $sqldt = mysqli_query($con, "
                  SELECT COUNT(*) AS jml_a 
                  FROM tbl_qcf 
                  WHERE sts_pbon='1' 
                    AND sts_aksi IS NULL 
                    AND (sales IN ('Darien', 'Gilang Kurnia', 'Vany Leany', 'Thania', 'Viviani', 'Heri', 'Bunbun', 'Frans', 'Fransiska')) 
                    AND DATE_FORMAT(tgl_masuk, '%Y-%m-%d') BETWEEN '2021-01-01' AND NOW()
                ");
                $row = mysqli_fetch_array($sqldt);

                // TIM B
                $sqldt1 = mysqli_query($con, "
                  SELECT COUNT(*) AS jml_b 
                  FROM tbl_qcf 
                  WHERE sts_pbon='1' 
                    AND sts_aksi IS NULL 
                    AND (sales IN ('Roni', 'Deden', 'Rangga Aditya', 'Nia')) 
                    AND DATE_FORMAT(tgl_masuk, '%Y-%m-%d') BETWEEN '2021-01-01' AND NOW()
                ");
                $row1 = mysqli_fetch_array($sqldt1);

                // TIM C
                $sqldt2 = mysqli_query($con, "
                  SELECT COUNT(*) AS jml_c 
                  FROM tbl_qcf 
                  WHERE sts_pbon='1' 
                    AND sts_aksi IS NULL 
                    AND (sales IN ('Ridwan', 'Ikhsan Ikhwana', 'Bambang', 'Budiman', 'Dennis', 'Levia Zhuang', 'Kevin Noventin', 'Fahrurrozi', 'Richard', 'Yohanes')) 
                    AND DATE_FORMAT(tgl_masuk, '%Y-%m-%d') BETWEEN '2021-01-01' AND NOW()
                ");
                $row2 = mysqli_fetch_array($sqldt2);
                ?>
                <div class="info-box-content">
                  <span class="info-box-text">Bon Penghubung</span>
                  <span class="label bg-red blink_me">Team A = <?php echo $row['jml_a']; ?></span><br>
                  <span class="label bg-red blink_me">Team B = <?php echo $row1['jml_b']; ?></span><br>
                  <span class="label bg-red blink_me">Team C = <?php echo $row2['jml_c']; ?></span>
                </div>
              </div>
            </a>
          </div>
        <?php } ?>

      <?php } ?>
      <?php if ($_SESSION['lvl_id'] == "PACKING" or $_SESSION['lvl_id'] == "LEADERTQ" or $_SESSION['lvl_id'] == "NCP" or $_SESSION['lvl_id'] == "INSPEKSI" or $_SESSION['lvl_id'] == "TQ") { ?>


        <!-- jika username marketing hidden -->
        <?php if ($_SESSION['usrid'] != "marketing") { ?>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="Schedule">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-calendar-check-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Schedule Inspeksi</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>
          <!-- end jika username marketing hidden -->
        <?php } ?>
      <?php } ?>
      <?php if ($_SESSION['lvl_id'] == "PACKING" || $_SESSION['lvl_id'] == "LEADERTQ" || $_SESSION['lvl_id'] == "NCP" || $_SESSION['lvl_id'] == "INSPEKSI") { ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="FinalStatusTQNew">
            <div class="info-box">
              <span class="info-box-icon bg-purple"><i class="fa fa-file-text"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Final Test Quality</span>
                <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        <div class="clearfix visible-sm-block"></div>

        <?php if ($_SESSION['usrid'] != "marketing") { ?>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="LapNCP">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-bar-chart-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Laporan NCP</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="LapDisposisi">
              <div class="info-box">
                <span class="info-box-icon bg-maroon"><i class="fa fa-cube"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Laporan KPE Disposisi QC</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="LapQCF">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-credit-card"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Laporan Harian QCF</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="AftersalesNOW">
              <div class="info-box">
                <span class="info-box-icon bg-navy"><i class="fa fa-clock-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Aftersales NOW</span>
                  <span class="info-box-number">&nbsp;</span>
                </div>
              </div>
            </a>
          </div>

          <?php if (strtoupper($_SESSION['usrid']) != "KPE") { ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="StikerCustomNew">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class="fa fa-file-text"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Stiker Custom New</span>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>

          <?php if (strtoupper($_SESSION['usrid']) == "INSPEKSI") { ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="InputDisposisiDetail">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class="fa fa-pencil-square-o"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Input Disposisi QC</span>
                    <span class="info-box-number">&nbsp;</span>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="DisposisiNOW">
                <div class="info-box">
                  <span class="info-box-icon bg-purple"><i class="fa fa-signal"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Library Disposisi QC</span>
                    <span class="info-box-number">&nbsp;</span>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>
        <?php } ?>
      <?php } ?>
      <?php if ($_SESSION['lvl_id'] == "SPVQC") { ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="InputDisposisiDetail">
            <div class="info-box">
              <span class="info-box-icon bg-lime"><i class="fa fa-pencil"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Input Disposisi QC</span>
                <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="DisposisiNOW">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fa fa-file"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Library Disposisi QC</span>
                <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="InspectionReportNOW">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-gear"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Inspection Report NOW</span>
                <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        
      <?php } ?>
      <?php if ($_SESSION['lvl_id'] == "DMF") { ?>
        <div class="col-md-3 col-sm-6 col-xs-12"><a href="FinalStatusTQNew">
            <div class="info-box">
              <span class="info-box-icon bg-purple"><i class="fa fa-file-text"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Final Test Quality</span>
                <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="LapDisposisi">
            <div class="info-box">
              <span class="info-box-icon bg-maroon"><i class="fa fa-cube"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Laporan KPE Disposisi QC</span>
                <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>

        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="LapNCP">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-bar-chart-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Laporan NCP</span>
                <span class="info-box-number">&nbsp;</span>
              </div>
            </div>
          </a>
        </div>
        
      <?php } ?>

      <?php if ($_SESSION['lvl_id'] == "LEADERTQ" or $_SESSION['lvl_id'] == "DMF") { ?>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="StatusTQNew">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-check-square-o"></i></span>
              <?php
              include('koneksi.php');
              $delay = date('Y-m-d');
              $sqldt = mysqli_query($con, "SELECT COUNT(*) as cnt FROM tbl_tq_nokk a
            LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk
            WHERE (`status`='' or `status` IS NULL) AND DATE_FORMAT( tgl_masuk, '%Y-%m-%d' ) BETWEEN DATE_SUB(NOW(),INTERVAL 30 DAY) AND NOW() AND tgl_target < '$delay'
            ");
              $row = mysqli_fetch_array($sqldt);
              ?>
              <div class="info-box-content">
                <span class="info-box-text">Status Test Quality</span>
                <span class="label bg-red blink_me">Delay Test Quality =
                  <?php echo $row['cnt']; ?>
                </span>
              </div>
            </div>
          </a>
        <?php } ?>
      </div>
    </div>
  </section>
</body>
</html>
<?php mysqli_close($con); ?>