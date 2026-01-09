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
  <title>Laporan Harian QCF</title>
</head>

<body>
  <?php
      $Awal = isset($_POST['awal']) ? $_POST['awal'] : '';
      $Akhir = isset($_POST['akhir']) ? $_POST['akhir'] : '';
      $GShift = isset($_POST['gshift']) ? $_POST['gshift'] : '';
      $Awal1 = isset($_GET['awal']) ? $_GET['awal'] : '';
      $Akhir1 = isset($_GET['akhir']) ? $_GET['akhir'] : '';
      $GShift1 = isset($_GET['shift']) ? $_GET['shift'] : '';
      $Order = isset($_POST['no_order']) ? $_POST['no_order'] : '';
      $PO = isset($_POST['po']) ? $_POST['po'] : '';
      $Nokk	= isset($_POST['nokk']) ? $_POST['nokk'] : '';
      $NoDemand	= isset($_POST['nodemand']) ? $_POST['nodemand'] : '';
      $Hanger	= isset($_POST['no_hanger']) ? $_POST['no_hanger'] : '';
      $Warna	= isset($_POST['warna']) ? $_POST['warna'] : '';
      $Langganan	= isset($_POST['pelanggan']) ? $_POST['pelanggan'] : '';
    $jamA = isset($_POST['jam_awal']) ? $_POST['jam_awal'] : '';
      $jamAr = isset($_POST['jam_akhir']) ? $_POST['jam_akhir'] : '';
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
    <div class="col-xs-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"> Filter Laporan Cocok Warna Finishing</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
          <div class="box-body">
            <div class="form-group">
              <label for="awal" class="col-sm-1 control-label">Tanggal Awal</label>
              <div class="col-sm-2">
                <div class="input-group date">
                  <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                  <input name="awal" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php if ($Awal1 != "") {
                    echo $Awal1;
                  } else {
                    echo $Awal;
                  } ?>" autocomplete="off" />
                </div>
              </div>
                  <!-- <div class="col-sm-2">
                    <input type="text" class="form-control timepicker" name="jam_awal" placeholder="00:00" value="<?php echo $jamA; ?>" autocomplete="off">
                  </div> -->
              <!-- /.input group -->
            </div>
            <div class="form-group">
            <label for="akhir" class="col-sm-1 control-label">Tanggal Akhir</label>
              <div class="col-sm-2">
                <div class="input-group date">
                  <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                  <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php if ($Akhir1 != "") {
                    echo $Akhir1;
                  } else {
                    echo $Akhir;
                  } ?>" autocomplete="off" />
                </div>
              <!-- </div>
			        <div class="col-sm-4">
                <input type="text" class="form-control timepicker" name="jam_akhir" placeholder="00:00" value="<?php echo $jamAr; ?>" autocomplete="off">
              </div>	 -->
              <!-- /.input group -->
            </div>
            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label"></label>
              <div class="col-sm-2">
              <input name="no_order" type="text" class="form-control pull-right" id="no_order" placeholder="No Order"
                value="<?php echo $Order; ?>" autocomplete="off" />
              </div>
              <div class="col-sm-2">
              <input name="po" type="text" class="form-control pull-right" id="po" placeholder="No PO"
                value="<?php echo $PO; ?>" autocomplete="off" />
              </div>
              <div class="col-sm-2">
              <input name="no_hanger" type="text" class="form-control pull-right" placeholder="No Hanger"
                value="<?php echo $Hanger; ?>" />
              </div>
              <div class="col-sm-2">
              <input name="warna" type="text" class="form-control pull-right" placeholder="Warna"
                value="<?php echo $Warna; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label"></label>
              <div class="col-sm-2">
              <input name="pelanggan" type="text" class="form-control pull-right" placeholder="Langganan"
                value="<?php echo $Langganan; ?>" />
              </div>
              <div class="col-sm-2">
              <input name="nodemand" type="text" class="form-control pull-right" placeholder="No Demand"
                value="<?php echo $NoDemand; ?>" />
              </div>
              <div class="col-sm-2">
              <input name="nokk" type="text" class="form-control pull-right" placeholder="Prod. Order"
                value="<?php echo $Nokk; ?>" />
              </div>
            </div>
            <!-- <div class="form-group">
              <div class="col-sm-2">
                <select name="gshift" class="form-control select2">
                  <option value="ALL" <?php if ($GShift == "ALL" or $GShift1 == "ALL") {
                    echo "SELECTED";
                  } ?>>ALL</option>
                  <option value="A" <?php if ($GShift == "A" or $GShift1 == "A") {
                    echo "SELECTED";
                  } ?>>A</option>
                  <option value="B" <?php if ($GShift == "B" or $GShift1 == "B") {
                    echo "SELECTED";
                  } ?>>B</option>
                  <option value="C" <?php if ($GShift == "C" or $GShift1 == "C") {
                    echo "SELECTED";
                  } ?>>C</option>
                </select>
              </div>
            </div> -->
          <!-- </div> -->
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-2">
                <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i
                    class="fa fa-search"></i></button>
              </div>
              <div class="pull-right">
                <button type="button" class="btn btn-block btn-social btn-linkedin btn-sm btn-default" <?php if ($_SESSION['lvl_id'] == "AFTERSALES") {
                  echo "disabled";
                } ?> name="lihat"
                  onClick="window.location.href='CWarnaFinNew'">Back <i class="fa fa-chevron-left"
                    aria-hidden="true"></i></button>
              </div>
            </div>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    </div>

    
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- <div class="box-header with-border">
          <h3 class="box-title">Data Cocok Warna Finishing</h3><br>
          <?php if ($_GET['awal'] != "") { ?><b>Periode:
              <?php echo $_GET['awal'] . " to " . $_GET['akhir']; ?>
            </b>
          <?php } else if ($_POST['awal'] != "") { ?><b>Periode:
              <?php echo $_POST['awal'] . " to " . $_POST['akhir']; ?>
              </b>
          <?php } ?><br>
          <?php if ($_GET['shift'] != "") { ?><b>Shift:
              <?php echo $_GET['shift']; ?>
            </b>
          <?php } else if ($_POST['gshift'] != "") { ?><b>Shift:
              <?php echo $_POST['gshift']; ?>
              </b>
          <?php } ?>
          <div class="pull-right">
            <a href="pages/cetak/lap-grouping-cocok-warna-excel.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>"
              class="btn btn-primary <?php if ($_POST['awal'] == "") {
                echo "disabled";
              } ?>" target="_blank">Cetak Grouping</a>
            <a href="pages/cetak/cetak-reports-cocok-warna.php?awal=<?php echo $_POST['awal']; ?>&jam_awal=<?php echo $_POST['jam_awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&jam_akhir=<?php echo $_POST['jam_akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>"
              class="btn btn-primary <?php if ($_POST['awal'] == "") {
                echo "disabled";
              } ?>" target="_blank">Cetak</a>
            <a href="pages/cetak/lap-cocok-warna-excel.php?awal=<?php echo $_POST['awal']; ?>&jam_awal=<?php echo $_POST['jam_awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&jam_akhir=<?php echo $_POST['jam_akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>"
              class="btn btn-primary <?php if ($_POST['awal'] == "") {
                echo "disabled";
              } ?>" target="_blank">Cetak
              Excel</a>
          </div>
        </div> -->
        <div class="box-body">
          <table class="table table-bordered table-hover table-striped nowrap" id="example1" style="width:100%">
            <thead class="bg-blue">
              <tr>
                <th>
                  <div align="center">No</div>
                </th>
                <th>
                  <div align="center">Shift</div>
                </th>
                <!-- <th>
                  <div align="center">Aksi</div>
                </th> -->
                <th>
                  <div align="center">Tgl Fin</div>
                </th>
                <th>
                  <div align="center">No KK</div>
                </th>
                <th>
                  <div align="center">No Demand</div>
                </th>
                <th>
                  <div align="center">Pelanggan</div>
                </th>
                <th>
                  <div align="center">Buyer</div>
                </th>
                <th>
                  <div align="center">PO</div>
                </th>
                <th>
                  <div align="center">Order</div>
                </th>
                <th>
                  <div align="center">Item</div>
                </th>
                <th>
                  <div align="center">Jenis Kain</div>
                </th>
                <th>
                  <div align="center">Warna</div>
                </th>
                <th>
                  <div align="center">No Warna</div>
                </th>
                <th>
                  <div align="center">Lot</div>
                </th>
                <th>
                  <div align="center">Roll</div>
                </th>
                <th>
                  <div align="center">Bruto</div>
                </th>
                <th>
                  <div align="center">Status Warna</div>
                </th>
                <th>
                  <div align="center">Grouping</div>
                </th>
                <th>
                  <div align="center">Hue</div>
                </th>
                <th>
                  <div align="center">Disposisi</div>
                </th>
                <th>
                  <div align="center">Colorist Qcf</div>
                </th>
                <th>
                  <div align="center">Code Proses</div>
                </th>
                <th>
                  <div align="center">Tgl Celup</div>
                </th>
                <th>
                  <div align="center">Review</div>
                </th>
                <th>
                  <div align="center">Remark</div>
                </th>
                <th>
                  <div align="center">No KK Legacy</div>
                </th>
                <th>
                  <div align="center">Lot Legacy</div>
                </th>
                <th>
                  <div align="center">Keterangan</div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
                $no = 1;
                // if ($GShift != "ALL") {
                //   $shft = " AND `shift`='$GShift' ";
                // } else {
                //   $shft = " ";
                // }
                  if ($Awal != "") {
                  $Where = " AND DATE_FORMAT( CONCAT(tgl_update,' ',jam_update), '%Y-%m-%d %H:%i') between '$start_date' AND '$stop_date' ";
                  }
                  if ($Order != "") { $noorder = " AND `no_order` LIKE '%$Order%' "; } else { $noorder = " "; }
                  if ($Nokk != "") { $nokk = " AND `nokk` LIKE '%$Nokk%' "; } else { $nokk = " "; }
                  if ($NoDemand != "") { $nodemand = " AND `nodemand` LIKE '%$NoDemand%' "; } else { $nodemand = " "; }
                  if ($Hanger != "") { $hanger = " AND `no_hanger` LIKE '%$Hanger%' "; } else { $hanger = " "; }
                  if ($Warna != "") { $warna = " AND `warna` LIKE '%$Warna%' "; } else { $warna = " "; }
                  if ($Langganan != "") { $langganan = " AND `pelanggan` LIKE '%$Langganan%' "; } else { $langganan = " "; }

                  if ($Awal != "" or $Akhir != "" or $Order or $PO or $Nokk or $NoDemand or $Hanger or $Warna or $Langganan) {
                  $qry1 = mysqli_query($con, "SELECT * FROM tbl_lap_inspeksi WHERE `dept`='QCF' AND no_order LIKE '%$Order%' AND no_po LIKE '%$PO%' $langganan $nokk $noorder $nodemand $hanger $warna $shft $Where ORDER BY id ASC");
                  } 
                  else {
                  $qry1 = mysqli_query($con, "SELECT * FROM tbl_lap_inspeksi WHERE `dept`='QCF' AND no_order LIKE '$Order' AND no_po LIKE '$PO' $langganan $nokk $noorder $nodemand $hanger $warna $shft $Where ORDER BY id ASC");
                  }
                while ($row1 = mysqli_fetch_array($qry1)) {
                  $pos = strpos($row1['pelanggan'], "/");
                  if ($pos > 0) {
                    $lgg1 = substr($row1['pelanggan'], 0, $pos);
                    $byr1 = substr($row1['pelanggan'], $pos + 1, 100);
                  } else {
                    $lgg1 = $row1['pelanggan'];
                    $byr1 = substr($row1['pelanggan'], $pos, 100);
                  }
                  ?>
                  <tr bgcolor="<?php echo $bgcolor; ?>">
                    <td align="center">
                      <?php echo $no; ?>
                    </td>
                    <td align="center">
                      <?php echo $row1['shift']; ?>
                    </td>
                    <!-- <td align="center"> -->
                      <!-- <div class="btn-group"> -->
                        <!--<a href="#" class="btn btn-info btn-xs cwarnafin_edit <?php if ($_SESSION['akses'] == 'biasa' and ($_SESSION['lvl_id'] != 'PACKING' or $_SESSION['lvl_id'] != 'NCP')) {
                          echo "disabled";
                        } ?>" id="<?php echo $row1['id']; ?>"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> </a>-->
                        <!--<a href="#" class="btn btn-danger btn-xs <?php if ($_SESSION['akses'] == 'biasa' and ($_SESSION['lvl_id'] != 'PACKING' or $_SESSION['lvl_id'] != 'NCP')) {
                          echo "disabled";
                        } ?>" onclick="confirm_delete('./HapusDataCWarnaFin-<?php echo $row1['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a>-->
                        <!-- <button id="<?php echo $row1['id']; ?>" class="btn btn-danger btn-xs delcwarnafin" <?php if ($_SESSION['akses'] == 'biasa' and ($_SESSION['lvl_id'] != 'PACKING' or $_SESSION['lvl_id'] != 'NCP')) {
                             echo "disabled";
                           } ?>><i class="fa fa-trash" data-toggle="tooltip" data-placement="top"
                            title="Hapus"></i></button> -->
                      <!-- </div> -->
                    <!-- </td> -->
                    <td align="center">
                      <?php echo $row1['tgl_update']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row1['nokk']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row1['nodemand']; ?>
                    </td>
                    <td>
                      <?php echo $lgg1; ?>
                    </td>
                    <td align="center">
                      <?php echo $byr1; ?>
                    </td>
                    <td align="center">
                      <?php echo $row1['no_po']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row1['no_order']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row1['no_item']; ?>
                    </td>
                    <td>
                      <?php echo substr($row1['jenis_kain'], 0, 15) . "..."; ?>
                    </td>
                    <td align="left">
                      <?php echo substr($row1['warna'], 0, 10) . "..."; ?>
                    </td>
                    <td align="left">
                      <?php echo $row1['no_warna']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row1['lot']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row1['jml_roll']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row1['bruto']; ?>
                    </td>
                    <!-- <td><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['status'] ?>" class="sts_fin"
                        href="javascipt:void(0)">
                        <?php echo $row1['status'] ?>
                      </a>
                    </td> -->
                    <td>
                        <?php echo $row1['status'] ?>
                     
                    </td>
                    <td><?php echo $row1['grouping']; ?></td>
                    <td><?php echo $row1['hue']; ?></td>
                    <td align="center"><?php echo $row1['disposisi']; ?></td>
                    <td align="center"><?php echo $row1['colorist_qcf']; ?></td>
                    <td align="center"><?php echo $row1['proses']; ?></td>
                    <td align="center"><?php echo $row1['tgl_pengiriman']; ?></td>
                    <td align="center"><?php echo $row1['review_qcf']; ?></td>
                    <td align="center"><?php echo $row1['remark_qcf']; ?></td>
                    <td align="center"><?php echo $row1['kk_lgcy']; ?></td>
                    <td align="center"><?php echo $row1['lot_lgcy']; ?></td>
                    <td align="center"><?php echo $row1['catatan']; ?></td>
                    </tr>
                  <?php $no++; } } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_del" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Are you sure to delete all data ?</h4>
        </div>

        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
          <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <div id="CWarnaFinEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true"></div>
  <script type="text/javascript">
    function confirm_delete(delete_url) {
      $('#modal_del').modal('show', { backdrop: 'static' });
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }
  </script>
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });

  </script>
</body>

</html>