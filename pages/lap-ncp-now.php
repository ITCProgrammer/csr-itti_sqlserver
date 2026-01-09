<?PHP
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Laporan NCP</title>

</head>

<body>
  <?php
  $Awal = isset($_POST['awal']) ? $_POST['awal'] : '';
  $Akhir = isset($_POST['akhir']) ? $_POST['akhir'] : '';
  $Dept = isset($_POST['dept']) ? $_POST['dept'] : '';
  $Kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
  $Cancel = isset($_POST['chkcancel']) ? $_POST['chkcancel'] : '';
  $Rev2A = isset($_POST['chkrev']) ? $_POST['chkrev'] : '';
  $jamA = isset($_POST['jam_awal']) ? $_POST['jam_awal'] : '';
  $jamAr = isset($_POST['jam_akhir']) ? $_POST['jam_akhir'] : '';
  if ($_POST['gshift'] == "ALL") {
    $shft = " ";
  } else {
    $shft = " AND b.g_shift = '$GShift' ";
  }
  if (strlen($jamA) == 5) {
    $start_date = $Awal . " " . $jamA;
  } else {
    $start_date = $Awal . " 0" . $jamA;
  }
  if (strlen($jamAr) == 5) {
    $stop_date = $Akhir . " " . $jamAr;
  } else {
    $stop_date = $Akhir . " 0" . $jamAr;
  }
  ?>
  <div class="row">
    <div class="col-xs-2">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"> Filter Laporan NCP </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
          <div class="box-body">
            <div class="form-group">
              <div class="col-sm-8">
                <div class="input-group date">
                  <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                  <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off" />
                </div>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control timepicker" name="jam_awal" placeholder="00:00" value="<?php echo $jamA; ?>" autocomplete="off">
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <div class="col-sm-8">
                <div class="input-group date">
                  <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                  <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" autocomplete="off" 1 />
                </div>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control timepicker" name="jam_akhir" placeholder="00:00" value="<?php echo $jamAr; ?>" autocomplete="off">
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
                  <?php 
                 $fil_dept = mysqli_query($con, "SELECT * FROM filter_dept");
                 $dfil = mysqli_fetch_all($fil_dept, MYSQLI_ASSOC);?>
              <div class="col-sm-10">
                <select class="form-control select2" name="dept" id="dept" required>
                    <option value="">Pilih</option>
                    <?php foreach ($dfil as $dept_filter): ?>
                        <option value="<?php echo $dept_filter['nama']; ?>" <?php if ($Dept == $dept_filter['nama']) { echo "SELECTED"; } ?>>
                            <?php echo $dept_filter['nama']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <div class="col-sm-10">
                <select class="form-control select2" name="kategori" id="kategori" required>
                  <option value="">Pilih</option>
                  <option value="ALL" <?php if ($Kategori == "ALL") {
                                        echo "SELECTED";
                                      } ?>>ALL</option>
                  <option value="hitung" <?php if ($Kategori == "hitung") {
                                            echo "SELECTED";
                                          } ?>>Hitung NCP</option>
                  <option value="tidakhitung" <?php if ($Kategori == "tidakhitung") {
                                                echo "SELECTED";
                                              } ?>>Tidak Hitung NCP</option>
                  <option value="gerobak" <?php if ($Kategori == "gerobak") {
                                            echo "SELECTED";
                                          } ?>>Kain diGerobak</option>
                </select>
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <div class="col-sm-10">
                <label>
                  <input type="checkbox" value="1" name="chkcancel" class="minimal-red" <?php if ($Cancel == "1") {
                                                                                          echo "checked";
                                                                                        } ?>>
                  Tampil Status Cancel
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10">
                <label>
                  <input type="checkbox" value="1" name="chkrev" class="minimal-red" <?php if ($Rev2A == "1") {
                                                                                        echo "checked";
                                                                                      } ?>>
                  Tampil Revisi > 1
                </label>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-sm-2">
              <button type="submit" class="btn btn-social btn-linkedin btn-sm" name="save">Search <i class="fa fa-search"></i></button>
            </div>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    </div>
    <div class="col-xs-5">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"> TOP 5 NCP Berdasarkan Masalah</h3>
          <?php if ($Awal != "") { ?><br><b>Periode:
            <?php echo tanggal_indo($Awal) . " - " . tanggal_indo($Akhir);
          } ?> Ket:
            <?php if ($Kategori == "ALL") {
              echo "ALL";
            } elseif ($Kategori == "hitung") {
              echo "NCP dihitung";
            } elseif ($Kategori == "tidakhitung") {
              echo "NCP tidak dihitung";
            } elseif ($Kategori == "gerobak") {
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
                  <div align="center">Masalah</div>
                </th>
                <th width="10%">
                  <div align="center">KG</div>
                </th>
                <th width="5%">
                  <div align="center">%</div>
                </th>
                <th width="10%">
                  <div align="center">Disposisi</div>
                </th>
                <th width="5%">
                  <div align="center">% Disp.</div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($Dept == "ALL") {
                $Wdept = " ";
              } else {
                $Wdept = " dept='$Dept' AND ";
              }
              if ($Kategori == "ALL") {
                $WKategori = " ";
              } else if ($Kategori == "hitung") {
                $WKategori = " ncp_hitung='ya' AND ";
              } else if ($Kategori == "tidakhitung") {
                $WKategori = " ncp_hitung='tidak' AND ";
              } else if ($Kategori == "gerobak") {
                $WKategori = " kain_gerobak='ya' AND ";
              }
              if ($Cancel != "1") {
                $sts = " AND NOT status='Cancel' ";
              } else {
                $sts = "  ";
              }
              if ($Rev2A == "1") {
                $WR2A = " and revisi > 1 and status='belum ok' ";
                //$FR2A= " , MAX(revisi) as rec ";
                $FR2A = " ";
                $GR2A = " ORDER BY revisi DESC ";
                //$GR2A= " GROUP BY revisi, no_ncp ORDER BY revisi DESC";
              } else {
                $WR2A = " ";
                $FR2A = " ";
                $GR2A = " ORDER BY id ASC ";
              }
              $totald = 0;
              $totaldll = 0;
              $totaldDis = 0;
              $totaldllDis = 0;
              $qryAll = mysqli_query($con, "SELECT COUNT(*) AS jml_all, SUM(berat) AS berat_all FROM tbl_ncp_qcf_now WHERE $WKategori DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND (masalah_dominan!='' OR masalah_dominan!=NULL) $sts ");
              $rAll = mysqli_fetch_array($qryAll);
              $qryAllDis = mysqli_query($con, "SELECT COUNT(*) AS jml_all, SUM(berat) AS berat_all FROM tbl_ncp_qcf_now WHERE $WKategori DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND `status`='Disposisi' $sts ");
              $rAllDis = mysqli_fetch_array($qryAllDis);
              $qrydef = mysqli_query($con, "SELECT 
                                                SUM(berat) AS berat, 
                                                ROUND(COUNT(masalah_dominan)/(SELECT COUNT(*) 
                                              FROM tbl_ncp_qcf_now 
                                              WHERE $WKategori 
                                              DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' $sts
                                              AND (masalah_dominan!='' OR masalah_dominan!=NULL))*100,1) AS persen,
                                              masalah_dominan
                                              FROM
                                              `tbl_ncp_qcf_now`
                                              WHERE $WKategori DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND (masalah_dominan!='' OR masalah_dominan!=NULL) $sts  
                                              GROUP BY masalah_dominan
                                      ORDER BY berat DESC LIMIT 5");
              $qryBDominan = mysqli_query($con, "SELECT COUNT(*) AS jml_all, SUM(berat) AS berat_all FROM tbl_ncp_qcf_now WHERE $WKategori DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND (masalah_dominan='' OR masalah_dominan=NULL) $sts ");
              $rBD = mysqli_fetch_array($qryBDominan);
              $qryAllDisBD = mysqli_query($con, "SELECT COUNT(*) AS jml_all, SUM(berat) AS berat_all FROM tbl_ncp_qcf_now WHERE $WKategori DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND (masalah_dominan='' OR masalah_dominan=NULL) AND `status`='Disposisi' $sts ");
              $rAllDisBD = mysqli_fetch_array($qryAllDisBD);
              while ($rd = mysqli_fetch_array($qrydef)) {
                $qrydefDis = mysqli_query($con, "SELECT SUM(berat) AS berat, ROUND(COUNT(masalah_dominan)/(SELECT COUNT(*) FROM tbl_ncp_qcf_now WHERE $WKategori DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND `status`='Disposisi' AND masalah_dominan='$rd[masalah_dominan]' $sts
              AND (masalah_dominan!='' OR masalah_dominan!=NULL))*100,1) AS persen,
              masalah_dominan
              FROM
              `tbl_ncp_qcf_now`
              WHERE $WKategori DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND `status`='Disposisi' AND masalah_dominan='$rd[masalah_dominan]' AND (masalah_dominan!='' OR masalah_dominan!=NULL) $sts ");
                $rdDis = mysqli_fetch_array($qrydefDis);
              ?>
                <tr valign="top">
                  <td align="center">
                    <?php echo $rd['masalah_dominan']; ?>
                  </td>
                  <td align="right">
                    <?php echo $rd['berat']; ?>
                  </td>
                  <td align="right">
                    <?php echo number_format(($rd['berat'] / $rAll['berat_all']) * 100, 2) . " %"; ?>
                  </td>
                  <td align="right">
                    <?php echo $rdDis['berat']; ?>
                  </td>
                  <td align="right">
                    <?php echo number_format(($rdDis['berat'] / $rAll['berat_all']) * 100, 2) . " %"; ?>
                  </td>
                </tr>
              <?php
                $totald = $totald + $rd['berat'];
                $totaldDis = $totaldDis + $rdDis['berat'];
              }
              $totaldll = $rAll['berat_all'] - $totald;
              $totaldllDis = $rAllDis['berat_all'] - $totaldDis; ?>
            </tbody>
            <tfoot>
              <tr valign="top">
                <td align="center"><strong>DLL</strong></td>
                <td align="right"><strong>
                    <?php echo number_format($totaldll, 2); ?>
                  </strong></td>
                <td align="right"><strong>
                    <?php if ($rAll['berat_all'] > 0) {
                      echo number_format(($totaldll / $rAll['berat_all']) * 100, 2) . " %";
                    } else {
                      echo "0.00 %";
                    } ?>
                  </strong></td>
                <td align="right"><strong>
                    <?php echo number_format($totaldllDis, 2); ?>
                  </strong></td>
                <td align="right"><strong>
                    <?php if ($rAllDis['berat_all'] > 0) {
                      echo number_format(($totaldllDis / $rAll['berat_all']) * 100, 2) . " %";
                    } else {
                      echo "0.00 %";
                    } ?>
                  </strong></td>
              </tr>
              <tr valign="top">
                <td align="center"><strong>Bukan Masalah Dominan</strong></td>
                <td align="right"><strong>
                    <?php echo number_format($rBD['berat_all'], 2); ?>
                  </strong></td>
                <td align="right"><strong>
                    <?php if ($rBD['berat_all'] > 0) {
                      echo number_format(($rBD['berat_all'] / $rAll['berat_all']) * 100, 2) . " %";
                    } else {
                      echo "0.00 %";
                    } ?>
                  </strong></td>
                <td align="right"><strong>
                    <?php echo number_format($rAllDisBD['berat_all'], 2); ?>
                  </strong></td>
                <td align="right"><strong>
                    <?php if ($rAllDisBD['berat_all'] > 0) {
                      echo number_format(($rAllDisBD['berat_all'] / $rAll['berat_all']) * 100, 2) . " %";
                    } else {
                      echo "0.00 %";
                    } ?>
                  </strong></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xs-5">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"> TOP 5 NCP Berdasarkan Dept Penyebab</h3>
          <?php if ($Awal != "") { ?><br><b>Periode:
            <?php echo tanggal_indo($Awal) . " - " . tanggal_indo($Akhir);
          } ?> Ket:
            <?php if ($Kategori == "ALL") {
              echo "ALL";
            } elseif ($Kategori == "hitung") {
              echo "NCP dihitung";
            } elseif ($Kategori == "tidakhitung") {
              echo "NCP tidak dihitung";
            } elseif ($Kategori == "gerobak") {
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
                  <div align="center">Dept</div>
                </th>
                <th width="10%">
                  <div align="center">KG</div>
                </th>
                <th width="5%">
                  <div align="center">%</div>
                </th>
                <th width="10%">
                  <div align="center">Disposisi</div>
                </th>
                <th width="5%">
                  <div align="center">% Disp.</div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $totaldpt = 0;
              $totaldlldpt = 0;
              $totaldptDis = 0;
              $totaldlldptDis = 0;
              $qryAllDpt = mysqli_query($con, "SELECT COUNT(*) AS jml_all, SUM(berat) AS berat_all FROM tbl_ncp_qcf_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND (dept!='' OR dept!=NULL) AND NOT status='Cancel' AND ncp_hitung='ya' ");
              $rAllDpt = mysqli_fetch_array($qryAllDpt);
              $qryAllDptDis = mysqli_query($con, "SELECT COUNT(*) AS jml_all, SUM(berat) AS berat_all FROM tbl_ncp_qcf_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND (dept!='' OR dept!=NULL) AND `status`='Disposisi' AND NOT status='Cancel' AND ncp_hitung='ya' ");
              $rAllDptDis = mysqli_fetch_array($qryAllDptDis);
              $qrydpt = mysqli_query($con, "SELECT SUM(berat) AS berat, ROUND(COUNT(dept)/(SELECT COUNT(*) FROM tbl_ncp_qcf_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND NOT status='Cancel'
            AND (dept!='' OR dept!=NULL))*100,1) AS persen,
            dept
            FROM
            `tbl_ncp_qcf_now`
            WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND (dept!='' OR dept!=NULL) AND $WKategori NOT status='Cancel'  
            GROUP BY dept
            ORDER BY berat DESC LIMIT 5");
              while ($rdpt = mysqli_fetch_array($qrydpt)) {
                $qrydptDis = mysqli_query($con, "SELECT SUM(berat) AS berat, ROUND(COUNT(dept)/(SELECT COUNT(*) FROM tbl_ncp_qcf_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND `status`='Disposisi' AND dept='$rdpt[dept]' AND NOT status='Cancel'
              AND (dept!='' OR dept!=NULL))*100,1) AS persen,
              dept
              FROM
              `tbl_ncp_qcf_now`
              WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' AND `status`='Disposisi' AND dept='$rdpt[dept]' AND (dept!='' OR dept!=NULL) AND NOT status='Cancel' AND ncp_hitung='ya'");
                $rdptDis = mysqli_fetch_array($qrydptDis);
              ?>
                <tr valign="top">
                  <td align="center">
                    <?php echo $rdpt['dept']; ?>
                  </td>
                  <td align="right">
                    <?php echo $rdpt['berat']; ?>
                  </td>
                  <td align="right">
                    <?php echo number_format(($rdpt['berat'] / $rAllDpt['berat_all']) * 100, 2) . " %"; ?>
                  </td>
                  <td align="right">
                    <?php echo $rdptDis['berat']; ?>
                  </td>
                  <td align="right">
                    <?php echo number_format(($rdptDis['berat'] / $rAllDpt['berat_all']) * 100, 2) . " %"; ?>
                  </td>
                </tr>
              <?php
                $totaldpt = $totaldpt + $rdpt['berat'];
                $totaldptDis = $totaldptDis + $rdptDis['berat'];
              }
              $totaldlldpt = $rAllDpt['berat_all'] - $totaldpt;
              $totaldlldptDis = $rAllDptDis['berat_all'] - $totaldptDis; ?>
            </tbody>
            <tfoot>
              <tr valign="top">
                <td align="center"><strong>DLL</strong></td>
                <td align="right"><strong>
                    <?php echo number_format($totaldlldpt, 2); ?>
                  </strong></td>
                <td align="right"><strong>
                    <?php if ($rAllDpt['berat_all'] > 0) {
                      echo number_format(($totaldlldpt / $rAllDpt['berat_all']) * 100, 2) . " %";
                    } else {
                      echo "0";
                    } ?>
                  </strong></td>
                <td align="right"><strong>
                    <?php echo number_format($totaldlldptDis, 2); ?>
                  </strong></td>
                <td align="right"><strong>
                    <?php if ($rAllDptDis['berat_all'] > 0) {
                      echo number_format(($totaldlldptDis / $rAllDpt['berat_all']) * 100, 2) . " %";
                    } else {
                      echo "0.00 %";
                    } ?>
                  </strong></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php
  $qry1 = mysqli_query($con, "SELECT * $FR2A FROM tbl_ncp_qcf_now WHERE $Wdept $WKategori DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' $sts $WR2A 
	$GR2A");
  $qrySUM = mysqli_query($con, "SELECT COUNT(*) as Lot, SUM(rol) as Rol,SUM(berat) as Berat FROM tbl_ncp_qcf_now WHERE $Wdept $WKategori DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' $sts ");
  $rSUM = mysqli_fetch_array($qrySUM);
  ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data NCP
            <?php echo $Dept; ?> Kategori
            <?php echo $Kategori; ?> <span class="pull-right-container">
              <small class="label pull-right bg-green blink_me">new</small>
            </span>
          </h3>
          <?php if ($Awal != "") { ?>
            <div class="pull-right">
              <a href="./index1.php?p=lappenyelesaian&awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&kategori=<?php echo $Kategori; ?>" class="btn btn-primary " target="_blank" data-toggle="tooltip" data-html="true" title="Laporan Penyelesaian"><i class="fa fa-file"></i> Detail Penyelesaian</a>
              <a href="pages/cetak/cetak_harianncp_new.php?&awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&dept=<?php echo $Dept; ?>&kategori=<?php echo $Kategori; ?>&cancel=<?php echo $Cancel; ?>&chkrev=<?php echo $Rev2A; ?>" class="btn btn-danger " target="_blank" data-toggle="tooltip" data-html="true" title="Laporan NCP"><i class="fa fa-print"></i> Cetak</a>
              <a href="pages/cetak/cetak_harianncpwrn_new.php?&awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&dept=<?php echo $Dept; ?>&kategori=<?php echo $Kategori; ?>&cancel=<?php echo $Cancel; ?>&chkrev=<?php echo $Rev2A; ?>" class="btn btn-danger " target="_blank" data-toggle="tooltip" data-html="true" title="Laporan NCP"><i class="fa fa-print"></i> Cetak Per Warna</a>
              <a href="pages/cetak/cetak_harianncp_excel_new.php?&awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&dept=<?php echo $Dept; ?>&kategori=<?php echo $Kategori; ?>&cancel=<?php echo $Cancel; ?>&chkrev=<?php echo $Rev2A; ?>" class="btn btn-danger " target="_blank" data-toggle="tooltip" data-html="true" title="Laporan NCP ke Excel"><i class="fa fa-file"></i> Cetak ke Excel</a>
              <a href="pages/cetak/cetak_rangkumanncp_new.php?&awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&dept=<?php echo $Dept; ?>&kategori=<?php echo $Kategori; ?>&cancel=<?php echo $Cancel; ?>" class="btn btn-success " target="_blank" data-toggle="tooltip" data-html="true" title="Laporan NCP Rakuman"><i class="fa fa-print"></i> Cetak Rangkuman</a>
              <a href="pages/cetak/cetak_ncp_report.php?&awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&jam_awal=<?php echo $jamA ?>&jam_akhir=<?php echo $jamAr ?>&dept=<?php echo $Dept; ?>&kategori=<?php echo $Kategori; ?>&cancel=<?php echo $Cancel; ?>" class="btn btn-success " target="_blank" data-toggle="tooltip" data-html="true" title="Laporan Baru NCP"><i class="fa fa-file"></i> Excel Laporan TOP 5 Defect</a>
            </div>
          <?php } ?>
          <?php if ($Awal != "") { ?><br><b>Periode:
              <?php echo tanggal_indo($Awal) . " - " . tanggal_indo($Akhir); ?>
            </b>
            <div style="font-size:20px; ">Total Lot: <span class="label label-info">
                <?php echo $rSUM['Lot']; ?>
              </span> || Total Rol: <span class="label label-warning">
                <?php echo number_format($rSUM['Rol']); ?>
              </span> || Total Qty : <span class="label label-danger">
                <?php echo number_format($rSUM['Berat'], "2") . " Kg"; ?>
              </span></div>

          <?php } ?>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
            <thead class="bg-green">
              <tr>
                <th>
                  <div align="center">No</div>
                </th>
                <th>
                  <div align="center">Tgl</div>
                </th>
                <th>
                  <div align="center">Status</div>
                </th>

                <th align="center" class="table-list1">No Registrasi</th>
                <th align="center" class="table-list1">Production Order</th>
                <th align="center" class="table-list1">Production Demand</th>
                <th align="center" class="table-list1">Original PD Code</th>

                <th>
                  <div align="center">Langganan</div>
                </th>
                <th>
                  <div align="center">Buyer</div>
                </th>
                <th>
                  <div align="center">PO</div>
                </th>
                <th>
                  <div align="center">No NCP</div>
                </th>
                <th>
                  <div align="center">Order</div>
                </th>
                <th>
                  <div align="center">Hanger</div>
                </th>
                <th>
                  <div align="center">Jenis Kain</div>
                </th>
                <th>
                  <div align="center">Lebar &amp; Gramasi</div>
                </th>
                <th>
                  <div align="center">Lot</div>
                </th>
				<th>
				  <div align="center">Lot Legacy</div>
				</th>  
                <th>
                  <div align="center">Lot Salinan</div>
                </th>
                <th>
                  <div align="center">Warna</div>
                </th>
                <th>
                  <div align="center">No Warna</div>
                </th>
                <th>
                  <div align="center">Rol</div>
                </th>
                <th>
                  <div align="center">Berat</div>
                </th>
                <th>
                  <div align="center">Dept</div>
                </th>
                <th>
                  <div align="center">Masalah</div>
                </th>
                <th>
                  <div align="center">Masalah Utama</div>
                </th>
                <th>
                  <div align="center">Proses</div>
                </th>
                <th>
                  <div align="center">Ket</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Rincian</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Penyelesaian</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Penyebab</div>
                </th>
                <th align="center" class="table-list1">Akar Masalah</th>
                <th align="center" class="table-list1">Solusi Jangka Panjang</th>
                <th align="center" class="table-list1">
                  <div align="center">Colorist DYE</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Perbaikan</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Catatan Verifikator</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Peninjau Akhir</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">NSP</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Rencana</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Aktual</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Tgl Delivery</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Nokk</div>
                </th>
                <th align="center" class="table-list1">NCP diHitung</th>
                <th align="center" class="table-list1">
                  <div align="center">Tempat Kain</div>
                </th>
                <?php if (strtoupper($_SESSION['usrid']) == "ADM-FIN") { ?>
                  <th align="center" class="table-list1">
                    <div align="center"> FIN</div>
                  </th>
                  <th align="center" class="table-list1">
                    <div align="center"> Recommendasi</div>
                  </th>
                  <th align="center" class="table-list1">
                    <div align="center"> Penyebab</div>
                  </th>
                <?php } ?>
                <th align="center" class="table-list1">
                  <div align="center">Shift FIN Penyebab</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Mesin FINPenyebab</div>
                </th>
                <th align="center" class="table-list1">Perbaikan</th>
                <th align="center" class="table-list1">
                  <div align="center">Mesin FIN Perbaikan</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Jml Perbaikan FIN</div>
                </th>
                <th align="center" class="table-list1">
                  <div align="center">Kategori FIN</div>
                </th>
                <th align="center" class="table-list1">Mesin Dye</th>
                <th align="center" class="table-list1">Ke-</th>
                <th align="center" class="table-list1">ACC Perbaikan</th>
                <th align="center" class="table-list1">Status Warna</th>
                <th align="center" class="table-list1">Disposisi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              while ($row1 = mysqli_fetch_array($qry1)) {
                if ($row1['nokk_salinan'] != "") {
                  $nokk1 = $row1['nokk_salinan'];
                } else {
                  $nokk1 = $row1['nokk'];
                }
                $qryckw = mysqli_query($con, "SELECT * FROM tbl_cocok_warna_dye WHERE `dept`='QCF' AND nodemand='$row1[nodemand]' ORDER BY id DESC");
                $rowckw = mysqli_fetch_array($qryckw);
				$sqlDB2="SELECT
					p.DESCRIPTION
				FROM
					PRODUCTIONDEMAND p
				WHERE
					p.CODE = '$row1[nodemand]'";
				$stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
				$rowdb2 = db2_fetch_assoc($stmt);  
              ?>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                  <td height="39" align="center">
                    <?php echo $no; ?>
                  </td>
                  <td align="center">
                    <?php echo $row1['tgl_buat']; ?><br>
                    <div class="btn-group"><a href="pages/cetak/cetak_ncp_now.php?id=<?php echo $row1['id']; ?>" class="btn btn-xs btn-danger" target="_blank"><i class="fa fa-print"></i></a><a href="pages/cetak/cetak_ncp_now_pdf.php?id=<?php echo $row1['id']; ?>" class="btn btn-xs btn-info" target="_blank"><i class="fa fa-file-pdf-o"></i></a></div>
                  </td>
                  <td>
                    <a href="#" class="btn sts_new_edit <?php if ($_SESSION['dept'] == "QC" or strtoupper($_SESSION['usrid']) == "TENNY" or strtoupper($_SESSION['usrid']) == "AISYAH" or strtoupper($_SESSION['usrid']) == "CRISTIN") {
                                                          echo "enabled";
                                                        } else {
                                                          echo "disabled";
                                                        } ?>" id="<?php echo $row1['id']; ?>"><span class="label <?php if ($row1['status'] == "OK") {
                                                                                                                      echo "label-success";
                                                                                                                    } else if ($row1['status'] == "Cancel") {
                                                                                                                      echo "label-danger";
                                                                                                                    } else {
                                                                                                                      echo "label-warning";
                                                                                                                    } ?> ">
                        <?php echo $row1['status']; ?>
                      </span></a>
                  </td>
                  <td>
                    <?php echo $row1['reg_no']; ?>
                  </td>
                  <td>
                    <?php echo $row1['prod_order']; ?>
                  </td>
                  <td>
                    <?php echo $row1['nodemand']; ?>
                  </td>
                  <td>
                    <?php
                    $sql_ori_pd_code = db2_exec($conn1, "SELECT p.CODE, SUBSTRING(a.VALUESTRING, 5) AS VALUESTRING 
                                                            FROM
                                                              PRODUCTIONDEMAND p
                                                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                            WHERE p.CODE = '$row1[nodemand]'");
                    $dt_ori_pd_code = db2_fetch_assoc($sql_ori_pd_code);
                    echo $dt_ori_pd_code['VALUESTRING'];
                    ?>
                  </td>
                  <td>
                    <?php echo $row1['langganan']; ?>
                  </td>
                  <td>
                    <?php echo $row1['buyer']; ?>
                  </td>
                  <td align="center">
                    <?php echo $row1['po']; ?>
                  </td>
                  <td align="center"><a href="PenyelesaianNew-<?php echo $row1['id']; ?>" class="btn <?php if (strtoupper($_SESSION['usrid']) != "ARIF") {
                                                                                                        echo "disabled";} ?>"><span class="label label-danger">
                        <?php echo $row1['no_ncp_gabungan']; ?>
                      </span></a></td>
                  <td align="center">
                    <?php echo $row1['no_order']; ?>
                  </td>
                  <td align="center">
                    <?php echo $row1['no_hanger']; ?>
                  </td>
                  <td>
                    <?php echo $row1['jenis_kain']; ?>
                  </td>
                  <td align="center">
                    <?php echo $row1['lebar'] . "x" . $row1['gramasi']; ?>
                  </td>
                  <td align="center">
                    <?php echo $row1['lot']; ?>
                  </td>
				  <td align="center">
					<?php echo trim($rowdb2['DESCRIPTION']);?>  
                  </td>	
                  <td align="center">
                    <?php echo $row1['lot_salinan']; ?>
                  </td>
                  <td align="center">
                    <?php echo $row1['warna']; ?>
                  </td>
                  <td align="center">
                    <?php echo $row1['no_warna']; ?>
                  </td>
                  <td align="right">
                    <?php echo $row1['rol']; ?>
                  </td>
                  <td align="right">
                    <?php echo $row1['berat']; ?>
                  </td>
                  <td align="center">
                    <?php echo $row1['dept']; ?>
                  </td>
                  <td>
                    <?php echo $row1['masalah']; ?>
                  </td>
                  <td>
                    <?php echo $row1['masalah_dominan']; ?>
                  </td>
                  <td>
                    <?php echo $row1['m_proses']; ?>
                  </td>
                  <td>
                    <?php echo $row1['ket']; ?>
                  </td>
                  <td>
                    <?php echo $row1['penyelesaian']; ?>
                  </td>
                  <td>
                    <?php echo $row1['rincian']; ?>
                  </td>
                  <td>
                    <?php echo $row1['penyebab']; ?>
                  </td>
                  <td>
                    <?php echo $row1['akar_masalah']; ?>
                  </td>
                  <td>
                    <?php echo $row1['solusi_panjang']; ?>
                  </td>
                  <td>
                    <?php echo $rowckw['colorist_dye']; ?>
                  </td>
                  <td>
                    <?php echo $row1['perbaikan']; ?>
                  </td>
                  <td>
                    <?php echo $row1['catat_verify']; ?>
                  </td>
                  <td>
                    <?php echo $row1['peninjau_akhir']; ?>
                  </td>
                  <td>
                    <?php echo $row1['nsp']; ?>
                  </td>
                  <td align="center">
                    <?php if ($row1['tgl_rencana'] != "") {
                      echo date("d/m/y", strtotime($row1['tgl_rencana']));
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($row1['tgl_selesai'] != "") {
                      echo date("d/m/y", strtotime($row1['tgl_selesai']));
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($row1['tgl_delivery'] != "") {
                      echo date("d/m/y", strtotime($row1['tgl_delivery']));
                    } ?>
                  </td>
                  <td align="center">'
                    <?php if ($row1['nokk_salinan'] != "") {
                      echo $row1['nokk_salinan'];
                    } else {
                      echo $row1['nokk'];
                    } ?>
                  </td>
                  <td>
                    <?php echo $row1['ncp_hitung']; ?>
                  </td>
                  <td>
                    <?php echo $row1['tempat']; ?>
                  </td>
                  <?php if (strtoupper($_SESSION['usrid']) == "ADM-FIN") { ?>
                    <td>
                      <a href="#" class="btn fin_data_edit <?php if ($_SESSION['dept'] == "FIN" or strtoupper($_SESSION['usrid']) == "ADM-FIN") {
                                                              echo "enabled";
                                                            } else {
                                                              echo "disabled";
                                                            } ?>" id="<?php echo $row1['id']; ?>">
                        <span class="label label-info"> <i class="fa fa-edit"></i> </span>
                      </a>
                    </td>
                    <td>
                      <?php echo $row1['rekomendasi']; ?>
                    </td>
                    <td>
                      <?php echo $row1['penyebab']; ?>
                    </td>
                  <?php } ?>
                  <td>
                    <?php echo $row1['shift']; ?>
                  </td>
                  <td>
                    <?php echo $row1['mesin']; ?>
                  </td>
                  <td>
                    <?php echo $row1['perbaikan']; ?>
                  </td>
                  <td>
                    <?php echo $row1['mesin_perbaikan']; ?>
                  </td>
                  <td>
                    <?php echo $row1['jml_perbaikan']; ?>
                  </td>
                  <td>
                    <?php echo $row1['kategori']; ?>
                  </td>
                  <td>
                    <?php echo $rowckw['no_mesin']; ?>
                  </td>
                  <td>
                    <?php echo $row1['data_ke']; ?>
                  </td>
                  <td>
                    <?php echo $row1['nama_colorist']; ?>
                  </td>
                  <td>
                    <?php echo $row1['status_warna']; ?>
                  </td>
                  <td>
                    <?php echo $row1['disposisi']; ?>
                  </td>
                </tr>
              <?php $no++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div id="StsNewEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
  <div id="DataFinEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>

</html>