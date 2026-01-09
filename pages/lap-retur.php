<?php
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";
?>
<?php
// Handle hapus file upload retur (aman berdasarkan prefix NSP)
if (isset($_GET['del_file'])) {
  $bn = basename($_GET['del_file']);
  $nsp = isset($_GET['nsp']) ? intval($_GET['nsp']) : 0;
  $uploadsDir = realpath(__DIR__ . '/../uploads/retur');
  if ($nsp > 0 && $uploadsDir && is_dir($uploadsDir) && strpos($bn, 'NSP' . $nsp . '_') === 0) {
    $path = $uploadsDir . DIRECTORY_SEPARATOR . $bn;
    if (is_file($path)) {
      @unlink($path);
    }
  }
  // Redirect balik ke halaman tanpa parameter del_file
  $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : (isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : 'index1.php?p=Lap-Retur');
  header('Location: ' . $redirect);
  exit;
}
?>
<?php
// Hapus file via AJAX (POST) seperti pola lap-gantikain.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_retur_file']) && $_POST['delete_retur_file'] == '1') {
  header('Content-Type: application/json');
  $nsp = isset($_POST['nsp']) ? intval($_POST['nsp']) : 0;
  $filename = isset($_POST['filename']) ? basename($_POST['filename']) : '';
  if ($nsp <= 0 || $filename === '') {
    echo json_encode(['ok' => false, 'msg' => 'Parameter tidak valid']);
    exit;
  }
  if (strpos($filename, 'NSP' . $nsp . '_') !== 0) {
    echo json_encode(['ok' => false, 'msg' => 'File tidak cocok dengan NSP']);
    exit;
  }
  $dir = realpath(__DIR__ . '/../uploads/retur');
  if (!$dir) {
    echo json_encode(['ok' => false, 'msg' => 'Folder tidak ditemukan']);
    exit;
  }
  $full = $dir . DIRECTORY_SEPARATOR . $filename;
  $real = realpath($full);
  if ($real === false || strpos($real, $dir) !== 0) {
    echo json_encode(['ok' => false, 'msg' => 'File tidak valid']);
    exit;
  }
  if (is_file($real)) {
    @unlink($real);
  }
  echo json_encode(['ok' => true]);
  exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Laporan Return</title>
  <link href="bower_components/xeditable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

</head>

<body>
  <?php
  $Awal  = isset($_POST['awal']) ? $_POST['awal'] : '';
  $Akhir  = isset($_POST['akhir']) ? $_POST['akhir'] : '';
  $Order  = isset($_POST['order']) ? $_POST['order'] : '';
  $Langganan  = isset($_POST['langganan']) ? $_POST['langganan'] : '';
  $PO  = isset($_POST['po']) ? $_POST['po'] : '';
  $Status  = isset($_POST['status']) ? $_POST['status'] : '';
  $TotalKirim  = isset($_POST['total']) ? $_POST['total'] : '';
  $Bon  = isset($_POST['bon']) ? $_POST['bon'] : '';
  $OrderReplacement  = isset($_POST['order_replacement']) ? $_POST['order_replacement'] : 0;
  $Warna  = isset($_POST['warna']) ? $_POST['warna'] : '';
  $Hanger  = isset($_POST['hanger']) ? $_POST['hanger'] : '';
  $StatusOnProgress = isset($_POST['status_is_on_progress']) ? $_POST['status_is_on_progress'] : 0;
  $StatusClosed = isset($_POST['status_is_closed']) ? $_POST['status_is_closed'] : 0;

  ?>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"> Filter Laporan Return</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1" action="LapRetur">
      <div class="box-body">
        <div class="form-group">
          <div class="col-sm-2">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="awal" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off" />
            </div>
          </div>
          <div class="col-sm-2">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off" />
            </div>
          </div>
          <div class="col-sm-2">
            <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order" value="<?php echo $Order;  ?>" autocomplete="off" />
          </div>
          <div class="col-sm-2">
            <input name="po" type="text" class="form-control pull-right" id="po" placeholder="No PO" value="<?php echo $PO;  ?>" autocomplete="off" />
          </div>
          <div class="col-sm-2">
            <input name="langganan" type="text" class="form-control pull-right" id="langganan" placeholder="Langganan/Buyer" value="<?php echo $Langganan;  ?>" autocomplete="off" />
          </div>
          <div class="col-sm-2">
            <input name="bon" type="text" class="form-control pull-right" id="bon" placeholder="No Retur" value="<?php echo $Bon;  ?>" autocomplete="off" />
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <div class="input-group date">
              <div class="input-group-addon"> Total Kirim</div>
              <input name="total" type="text" class="form-control pull-right" placeholder="0" value="<?php echo $TotalKirim; ?>" />
            </div>
          </div>
          <div class="col-sm-2" style="align-items: center; display: flex; gap: 4px;">
            <input type="checkbox" style="margin: 0;" name="order_replacement" id="order_replacement" value="1" <?= $OrderReplacement > 0 ? 'checked' : '' ?>>
            <label for="order_replacement" style="margin: 0;">Order Retur</label>
          </div>
          <div class="col-sm-2" style="align-items: center; display: flex; gap: 4px;">
            <input type="checkbox" style="margin: 0;" name="status_is_on_progress" id="status_is_on_progress" value="1" <?= $StatusOnProgress > 0 ? 'checked' : '' ?>>
            <label for="status_is_on_progress" style="margin: 0;">On Progress</label>
          </div>
          <div class="col-sm-2" style="align-items: center; display: flex; gap: 4px;">
            <input type="checkbox" style="margin: 0;" name="status_is_closed" id="status_is_closed" value="1" <?= $StatusClosed > 0 ? 'checked' : '' ?>>
            <label for="status_is_closed" style="margin: 0;">Closed</label>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="col-sm-2">
          <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
        </div>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Return</h3><br>
          <?php if ($_POST['awal'] != "") { ?><b>Periode: <?php echo $_POST['awal'] . " to " . $_POST['akhir']; ?></b>
          <?php } ?>
          <?php
          $tglawal = new DateTime($Awal);
          $tglakhir = new DateTime($Akhir);
          $d = $tglakhir->diff($tglawal)->days;
          ?>
          <div class="pull-right">
            <a href="pages/cetak/lap-retur-excel.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&order=<?php echo $Order; ?>&langganan=<?php echo $Langganan; ?>&po=<?php echo $PO; ?>&status=<?php echo $Status; ?>&total=<?php echo $TotalKirim; ?>&bon=<?php echo $Bon; ?>&order_replacement=<?php echo $OrderReplacement; ?>&warna=<?php echo $Warna; ?>&hanger=<?php echo $Hanger; ?>&status_is_on_progress=<?php echo $StatusOnProgress; ?>&status_is_closed=<?php echo $StatusClosed; ?>" class="btn btn-success" target="_blank">Export Excel</a>
            <a href="pages/cetak/cetak_lapdetailretur.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>" class="btn btn-danger <?php if ($_POST['awal'] == "") {echo "disabled";} ?>" target="_blank">Cetak Lap Retur</a>
            <a href="pages/cetak/cetak_rincianlapretur.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-danger <?php if ($_POST['awal'] == "") {echo "disabled";} ?>" target="_blank">Cetak Retur Detail</a>
            <a href="pages/cetak/cetak_leadtimeretur.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>" class="btn btn-danger <?php if ($_POST['awal'] == "") {echo "disabled";} ?>" target="_blank">Cetak Leadtime Retur</a>
            <a href="pages/cetak/excel_retur.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&status=<?php echo $_POST['status']; ?>&order=<?php echo $_POST['order']; ?>&po=<?php echo $_POST['po']; ?>&langganan=<?php echo $_POST['langganan']; ?>" class="btn btn-danger <?php if ($_POST['awal'] == "") {echo "disabled";} ?>" target="_blank">Tracking Retur</a>
            <a href="pages/cetak/cetak_lapdetailretur_mingguan.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-success <?php if ($_POST['awal'] == "") {echo "disabled";} ?>" target="_blank">Cetak FTT Return</a>
          </div>
          <!-- <?php if ($d > 25) { ?> -->
          <!-- <div class="pull-right">
                <a href="pages/cetak/cetak_lapdetailretur.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>" class="btn btn-danger <?php if ($_POST['awal'] == "") {echo "disabled";} ?>" target="_blank">Cetak Lap Retur</a> 
                <a href="pages/cetak/cetak_rincianlapretur.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-danger <?php if ($_POST['awal'] == "") {echo "disabled";} ?>" target="_blank">Cetak Retur Detail</a> 
                <a href="pages/cetak/cetak_leadtimeretur.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>" class="btn btn-danger <?php if ($_POST['awal'] == "") {echo "disabled";} ?>" target="_blank">Cetak Leadtime Retur</a> 
                <a href="pages/cetak/excel_retur.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&status=<?php echo $_POST['status']; ?>&order=<?php echo $_POST['order']; ?>&po=<?php echo $_POST['po']; ?>&langganan=<?php echo $_POST['langganan']; ?>" class="btn btn-danger <?php if ($_POST['awal'] == "") {echo "disabled";} ?>" target="_blank">Tracking Retur</a> 
            </div> -->
          <!-- <?php } ?> -->
          <!-- <?php if ($d < 25 and $d > 0) { ?> -->
          <!-- <div class="pull-right">
                <a href="pages/cetak/cetak_lapdetailretur_mingguan.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-success <?php if ($_POST['awal'] == "") {echo "disabled";} ?>" target="_blank">Cetak FTT Return</a>
            </div> -->
          <!-- <?php } ?> -->
        </div>
        <div class="box-header with-border">
          <a href="pages/data_approved_retur.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&order=<?php echo $Order; ?>&langganan=<?php echo $Langganan; ?>&po=<?php echo $PO; ?>&no_retur=<?php echo $Bon; ?>&warna=<?php echo $Warna; ?>&no_hanger=<?php echo $Hanger; ?>" class="btn btn-primary btn-sm pull-right" style="margin-left: 8px;" target="_blank">Serah Terima</a>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-hover table-striped nowrap" id="example8" style="width:100%">
            <thead class="bg-blue">
              <tr>
                <th rowspan="2">
                  <div align="center">No</div>
                </th>
                <th rowspan="2">
                  <div align="center">Aksi</div>
                </th>
                <th rowspan="2">
                  <div align="center">Status</div>
                </th>
                <th rowspan="2">
                  <div align="center">Notes</div>
                </th>
                <th rowspan="2">
                  <div align="center">No.TPUKPE</div>
                </th>
                <th rowspan="2">
                  <div align="center">Tgl Dari GKJ</div>
                </th>
                <th rowspan="2">
                  <div align="center">Tgl Surat Jalan</div>
                </th>
                <th rowspan="2">
                  <div align="center">No Surat Jalan Langganan</div>
                </th>
                <th rowspan="2">
                  <div align="center">No Bon Retur</div>
                </th>
                <th rowspan="2">
                  <div align="center">No Demand</div>
                </th>
                <th rowspan="2">
                  <div align="center">Langganan</div>
                </th>
                <th rowspan="2">
                  <div align="center">PO</div>
                </th>
                <th rowspan="2">
                  <div align="center">Order</div>
                </th>
                <th rowspan="2">
                  <div align="center">No Hanger</div>
                </th>
                <th rowspan="2">
                  <div align="center">Order Retur Baru</div>
                </th>
                <th rowspan="2">
                  <div align="center">Detail</div>
                </th>
                <!-- <th rowspan="2"><div align="center">Status 1</div></th>
              <th rowspan="2"><div align="center">Status 2</div></th>
              <th rowspan="2"><div align="center">Status 3</div></th> -->
                <th rowspan="2">
                  <div align="center">Jenis Kain</div>
                </th>
                <th rowspan="2">
                  <div align="center">Warna</div>
                </th>
                <th rowspan="2">
                  <div align="center">Lot</div>
                </th>
                <th rowspan="2">
                  <div align="center">Roll</div>
                </th>
                <th colspan="2">
                  <div align="center">Qty Surat Jalan</div>
                </th>
                <th rowspan="2">
                  <div align="center">Qty Timbang Ulang</div>
                </th>
                <th rowspan="2">
                  <div align="center">Masalah</div>
                </th>
                <th rowspan="2">
                  <div align="center">Sub Defect</div>
                </th>
                <th rowspan="2">
                  <div>
                    <div align="center">T Jawab</div>
                  </div>
                </th>
                <th rowspan="2">
                  <div align="center">Analisa Kerusakan</div>
                </th>
                <th rowspan="2">
                  <div align="center">No NCP</div>
                </th>
                <th rowspan="2">
                  <div align="center">Keterangan</div>
                </th>
                <th rowspan="2">
                  <div align="center">Dokumen</div>
                </th>
                <th rowspan="2">
                  <div align="center">Data Arsip</div>
                </th>
                <th rowspan="2">
                  <div align="center">No Demand AKJ</div>
                </th>
              </tr>
              <tr>
                <th>
                  <div align="center">Kg</div>
                </th>
                <th>
                  <div align="center">Satuan</div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php

              $no = 1;
              $filters = [];
              if (!empty($Awal)) {
                $filters[] = "DATE_FORMAT(a.tgl_buat, '%Y-%m-%d') >= '$Awal'";
              }
              if (!empty($Akhir)) {
                $filters[] = "DATE_FORMAT(a.tgl_buat, '%Y-%m-%d') <= '$Akhir'";
              }
              if (!empty($Order)) {
                $filters[] = "a.no_order LIKE '$Order%'";
              }
              if (!empty($Langganan)) {
                $filters[] = "a.langganan LIKE '%$Langganan%'";
              }
              if (!empty($PO)) {
                $filters[] = "a.po LIKE '$PO%'";
              }
              if (!empty($Status)) {
                $filters[] = "a.status = '$Status'";
              }
              if (!empty($Bon)) {
                $filters[] = "a.no_retur LIKE '%$Bon%'";
              }
              if ($StatusOnProgress == 1 && $StatusClosed == 1) {
                $filters[] = "(a.status = 'On Progress' OR a.status = 'Closed') ";
              } elseif ($StatusOnProgress == 1) {
                $filters[] = " a.status = 'On Progress' ";
              } elseif ($StatusClosed == 1) {
                $filters[] = " a.status = 'Closed' ";
              }

              $whereClause = !empty($filters) ? 'WHERE ' . implode(' AND ', $filters) : '';

              if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($filters)) {
                $whereClause = 'WHERE ' . implode(' AND ', $filters);

                $qry1 = mysqli_query(
                  $con,
                  "SELECT 
                        a.*,
                        SUBSTRING(a.no_hanger, 1, 3) AS prefix,
                        SUBSTRING(a.no_hanger, 4) AS subprefix,
                        GROUP_CONCAT(DISTINCT b.no_ncp SEPARATOR ', ') AS no_ncp,
                        GROUP_CONCAT(DISTINCT b.masalah SEPARATOR ', ') AS masalah_ncp 
                     FROM 
                        tbl_detail_retur_now a 
                     LEFT JOIN 
                        tbl_ncp_qcf_new b 
                     ON 
                        a.nodemand_ncp = b.nodemand 
                     $whereClause 
                     GROUP BY 
                        a.id 
                     ORDER BY 
                        a.tgl_buat ASC"
                );

                if (!$qry1) {
                  echo "<p>Query gagal dijalankan: " . mysqli_error($con) . "</p>";
                } else {
                  while ($row1 = mysqli_fetch_array($qry1)) {
                    if ($row1['t_jawab'] != "" and $row1['t_jawab1'] != "" and $row1['t_jawab2'] != "") {
                      $tjawab = $row1['t_jawab'] . "," . $row1['t_jawab1'] . "," . $row1['t_jawab2'];
                    } else if ($row1['t_jawab'] != "" and $row1['t_jawab1'] != "" and $row1['t_jawab2'] == "") {
                      $tjawab = $row1['t_jawab'] . "," . $row1['t_jawab1'];
                    } else if ($row1['t_jawab'] != "" and $row1['t_jawab1'] == "" and $row1['t_jawab2'] != "") {
                      $tjawab = $row1['t_jawab'] . "," . $row1['t_jawab2'];
                    } else if ($row1['t_jawab'] == "" and $row1['t_jawab1'] != "" and $row1['t_jawab2'] != "") {
                      $tjawab = $row1['t_jawab1'] . "," . $row1['t_jawab2'];
                    } else if ($row1['t_jawab'] != "" and $row1['t_jawab1'] == "" and $row1['t_jawab2'] == "") {
                      $tjawab = $row1['t_jawab'];
                    } else if ($row1['t_jawab'] == "" and $row1['t_jawab1'] != "" and $row1['t_jawab2'] == "") {
                      $tjawab = $row1['t_jawab1'];
                    } else if ($row1['t_jawab'] == "" and $row1['t_jawab1'] == "" and $row1['t_jawab2'] != "") {
                      $tjawab = $row1['t_jawab2'];
                    } else if ($row1['t_jawab'] == "" and $row1['t_jawab1'] == "" and $row1['t_jawab2'] == "") {
                      $tjawab = "";
                    }
              ?>

                    <tr bgcolor="<?php echo $bgcolor; ?>">
                      <td align="center"><?php echo $no; ?></td>
                      <td align="center">
                        <a href="Updateretur-<?php echo $row1['id']; ?>" class="btn btn-warning btn-xs" target="_blank">Update</a>
                        <a href="#" class="btn btn-danger btn-xs <?php if ($_SESSION['akses'] == 'biasa') {
                                                                    echo 'disabled';
                                                                  } ?>" onclick="confirm_delete('Hapus-retur-<?php echo $row1['id']; ?>');"><i class="fa fa-trash"></i> Hapus</a>
                      </td>
                      <td align="center"><a data-pk="<?php echo $row1['id']; ?>" data-value="<?php echo $row1['status'] ?>" class="statusrt2" href="javascript:void(0)"><?php echo $row1['status']; ?></a></td>
                      <td align="center">
                        <?php if ($row1['note_csr']) : ?>
                          <abbr title="<?= $row1['note_csr']; ?>" data-toggle="modal" data-target="#confirm-note<?= $row1['id']; ?>">View Note</abbr>
                        <?php else : ?>
                          <button type="button" style="color: #4778FF;" data-toggle="modal" data-target="#confirm-note<?= $row1['id']; ?>">
                            💬</i>Notes
                          </button>
                        <?php endif; ?>
                      </td>
                      <td align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['notpukpe']; ?>" class="notpukpe" data-name="notpukpe" data-title="Masukkan No TPUKPE" data-type="text" data-emptytext="Empty" href="javascript:void(0)"><?php echo $row1['notpukpe']; ?></a></td>
                      <td align="center"><?php echo $row1['tgltrm_sjretur']; ?></td>
                      <td align="center"><?php echo $row1['tgl_sjretur']; ?></td>
                      <td align="center"><?php echo $row1['sjreturplg']; ?></td>
                      <td align="center"><?php echo $row1['no_retur']; ?></td>
                      <td align="center"><?php echo $row1['nodemand']; ?></td>
                      <td><?php echo $row1['langganan']; ?></td>
                      <td align="center"><?php echo $row1['po']; ?></td>
                      <td align="center"><?php echo $row1['no_order']; ?></td>
                      <td align="center"><?php echo $row1['no_hanger']; ?></td>
                      <td align="center">
                        <?php
                        if ($OrderReplacement > 0) {
                          $query = "
                  SELECT DISTINCT NO_ORDER
                  FROM ITXVIEW_MEMOPENTINGPPC
                  WHERE NO_PO LIKE '%$row1[po]%' 
                    AND SUBCODE02 = '$row1[prefix]'
                    AND SUBCODE03 = '$row1[subprefix]' 
                    AND WARNA LIKE '%$row1[warna]%'
                    AND (
                    SUBSTR(NO_ORDER, 1, 3) = 'RFD' OR 
                    SUBSTR(NO_ORDER, 1, 3) = 'RFE' OR 
                    SUBSTR(NO_ORDER, 1, 3) = 'RPE' OR 
                    SUBSTR(NO_ORDER, 1, 3) = 'REP'
                    )
                ";

                          $q_order_new = db2_exec($conn1, $query);

                          while ($d_order_new = db2_fetch_assoc($q_order_new)) {
                            echo '<a target="_blank" href="https://online.indotaichen.com/laporan/aftersales_memopenting_order.php?bonorder=' . $d_order_new['NO_ORDER'] . '">' . $d_order_new['NO_ORDER'] . '</a><br>';
                          }
                        }
                        ?>
                      </td>
                      <td align="center">
                        <?php
                        if ($OrderReplacement > 0) {
                          $query = "
                  SELECT DISTINCT NO_ORDER
                  FROM ITXVIEW_MEMOPENTINGPPC
                  WHERE NO_PO LIKE '%$row1[po]%' 
                    AND SUBCODE02 = '$row1[prefix]'
                    AND SUBCODE03 = '$row1[subprefix]' 
                    AND WARNA LIKE '%$row1[warna]%'
                    AND (
                    SUBSTR(NO_ORDER, 1, 3) = 'RFD' OR 
                    SUBSTR(NO_ORDER, 1, 3) = 'RFE' OR 
                    SUBSTR(NO_ORDER, 1, 3) = 'RPE' OR 
                    SUBSTR(NO_ORDER, 1, 3) = 'REP'
                    )
                ";

                          $q_order_new = db2_exec($conn1, $query);

                          while ($d_order_new = db2_fetch_assoc($q_order_new)) {
                            $q_sum_po_selesai = db2_exec($conn1, "
                    SELECT
                      isqd.ORDERLINE,
                      isqd.PELANGGAN,
                      TRIM(isqd.NO_ORDER) AS NO_ORDER,
                      isqd.NO_PO,
                      isqd.KET_PRODUCT,
                      isqd.STYLE,
                      isqd.LEBAR,
                      isqd.GRAMASI,
                      isqd.WARNA,
                      isqd.NO_WARNA,
                      isqd.PRICEUNITOFMEASURECODE,
                      isqd.NETTO,
                      isqd.NETTO_2,
                      isqd.NETTO_M,
                      isqd.KONVERSI,
                      isqd.ACTUAL_DELIVERY,
                      SUM(isqd.QTY_SUDAH_KIRIM) AS QTY_SUDAH_KIRIM,
                      SUM(isqd.QTY_SUDAH_KIRIM_2) AS QTY_SUDAH_KIRIM_2,
                      CASE
                        WHEN DAYS(now()) - DAYS(Timestamp_Format(isqd.ACTUAL_DELIVERY, 'YYYY-MM-DD')) < 0 THEN 0
                        ELSE DAYS(now()) - DAYS(Timestamp_Format(isqd.ACTUAL_DELIVERY, 'YYYY-MM-DD'))
                      END AS DELAY,
                      isqd.SUBCODE01,
                      isqd.SUBCODE02,
                      isqd.SUBCODE03,
                      isqd.SUBCODE04,
                      isqd.SUBCODE05,
                      isqd.SUBCODE06,
                      isqd.SUBCODE07,
                      isqd.SUBCODE08,
                      s.STATISTICALGROUPCODE,
                      ip.BUYER 
                    FROM
                      ITXVIEW_SUMMARY_QTY_DELIVERY isqd
                    LEFT JOIN SALESORDER s ON s.CODE = isqd.NO_ORDER 
                    LEFT JOIN ITXVIEW_PELANGGAN ip ON ip.ORDPRNCUSTOMERSUPPLIERCODE = s.ORDPRNCUSTOMERSUPPLIERCODE AND ip.CODE = s.CODE 
                    WHERE
                      isqd.NO_ORDER = '$d_order_new[NO_ORDER]'
                    GROUP BY
                      isqd.ORDERLINE,
                      isqd.PELANGGAN,
                      isqd.NO_ORDER,
                      isqd.NO_PO,
                      isqd.KET_PRODUCT,
                      isqd.STYLE,
                      isqd.LEBAR,
                      isqd.GRAMASI,
                      isqd.WARNA,
                      isqd.NO_WARNA,
                      isqd.PRICEUNITOFMEASURECODE,
                      isqd.NETTO,
                      isqd.NETTO_2,
                      isqd.NETTO_M,
                      isqd.KONVERSI,
                      isqd.ACTUAL_DELIVERY,
                      isqd.SUBCODE01,
                      isqd.SUBCODE02,
                      isqd.SUBCODE03,
                      isqd.SUBCODE04,
                      isqd.SUBCODE05,
                      isqd.SUBCODE06,
                      isqd.SUBCODE07,
                      isqd.SUBCODE08,
                      s.STATISTICALGROUPCODE,
                      ip.BUYER  
                    ORDER BY
                      isqd.ORDERLINE ASC
                  ");
                            $dt_sum = db2_fetch_assoc($q_sum_po_selesai);

                            $ResultLotCode = "
                    SELECT 
                      LISTAGG('''' || TRIM(PRODUCTIONORDERCODE) || '''', ', ') AS PRODUCTIONORDERCODE,
                      LISTAGG('''' || TRIM(PRODUCTIONDEMANDCODE) || '''', ', ') AS PRODUCTIONDEMANDCODE
                    FROM 
                      ITXVIEWKK
                    WHERE 
                      PROJECTCODE = '$d_order_new[NO_ORDER]'
                      AND ITEMTYPEAFICODE = 'KFF'
                      AND ORIGDLVSALORDERLINEORDERLINE = '$dt_sum[ORDERLINE]'
                  ";
                            $exec_lotcode = db2_exec($conn1, $ResultLotCode);
                            $fetch_lotcode = db2_fetch_assoc($exec_lotcode);
                        ?>
                            <a target="_blank"
                              href="/laporan-itti/ppc_filter_poselesai_summary_detail.php?no_order=<?php echo TRIM($d_order_new['NO_ORDER']); ?>&orderline=<?= $dt_sum['ORDERLINE']; ?>&PRODUCTIONORDERCODE=<?= $fetch_lotcode['PRODUCTIONORDERCODE'] ?>&PRODUCTIONDEMANDCODE=<?= $fetch_lotcode['PRODUCTIONDEMANDCODE'] ?>">
                              Detail
                            </a><br>
                        <?php
                          }
                        }
                        ?>
                      </td>
                      <!-- <td align="center"><a data-pk="<?php echo $row1['id']; ?>" data-value="<?php echo $row1['order_returbaru'] ?>" class="neworderrt" href="javascript:void(0)"><?php echo $row1['order_returbaru']; ?></td> -->
                      <!-- <td align="center"><a data-pk="<?php echo $row1['id']; ?>" data-value="<?php echo $row1['status1'] ?>" class="status1rt" href="javascript:void(0)"><?php echo $row1['status1']; ?></td>
                      <td align="center"><a data-pk="<?php echo $row1['id']; ?>" data-value="<?php echo $row1['status2'] ?>" class="status2rt" href="javascript:void(0)"><?php echo $row1['status2']; ?></td>
                      <td align="center"><a data-pk="<?php echo $row1['id']; ?>" data-value="<?php echo $row1['status3'] ?>" class="status3rt" href="javascript:void(0)"><?php echo $row1['status3']; ?></td> -->
                      <td><?php echo substr($row1['jenis_kain'], 0, 50); ?></td>
                      <td align="left"><?php echo $row1['warna']; ?></td>
                      <td align="center"><?php echo $row1['lot']; ?></td>
                      <td align="center"><?php echo $row1['roll'] . " Roll"; ?></td>
                      <td align="center"><?php echo $row1['kg']; ?></td>
                      <td align="center"><?php echo $row1['pjg'] . " " . $row1['satuan']; ?></td>
                      <td align="center"><?php echo $row1['qty_tu'] . " KG"; ?></td>
                      <td><?php echo $row1['masalah']; ?></td>
                      <td><?php echo $row1['masalah_dominan']; ?></td>
                      <td align="center"><?php echo $tjawab; ?></td>
                      <td><?php echo $row1['masalah_ncp']; ?></td>
                      <td><?php echo $row1['no_ncp']; ?></td>
                      <td><?php echo $row1['ket']; ?></td>
                      <td>
                        <?php
                          // Daftar dokumen untuk NSP terkait (prefiks NSP{id_nsp}_)
                          $docsHtml = '';
                          $uploadsDirRow = realpath(__DIR__ . '/../uploads/retur');
                          if ($uploadsDirRow && is_dir($uploadsDirRow)) {
                            $files = glob($uploadsDirRow . DIRECTORY_SEPARATOR . 'NSP' . intval($row1['id_nsp']) . '_*');
                            if ($files && count($files) > 0) {
                              // Urutkan terbaru dulu
                              usort($files, function($a,$b){ return filemtime($b) <=> filemtime($a); });
                              $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
                              $shown = 0;
                              foreach ($files as $f) {
                                $bn = basename($f);
                                $url = $baseUrl . '/csr-itti/uploads/retur/' . rawurlencode($bn);
                                $sz = @filesize($f);
                                $szTxt = ($sz !== false) ? ('(' . number_format($sz/1024, 1) . ' KB)') : '';
                                $docsHtml .= '<div class="attachment-item" style="display:flex;align-items:center;gap:6px;white-space:nowrap;">'
                                  . '<i class="fa fa-paperclip text-muted" aria-hidden="true"></i>'
                                  . '<a href="' . htmlspecialchars($url) . '" target="_blank"'
                                  . ' class="label label-default"'
                                  . ' title="' . htmlspecialchars($bn) . '"'
                                  . ' style="display:inline-block;max-width:260px;overflow:hidden;text-overflow:ellipsis;">'
                                  . htmlspecialchars($bn) . '</a>'
                                  . ($szTxt ? ' <span class="text-muted" style="font-size:11px;">' . htmlspecialchars($szTxt) . '</span>' : '');
                                if (!isset($_SESSION['akses']) || $_SESSION['akses'] !== 'biasa') {
                                  $docsHtml .= ' <button type="button" class="btn btn-xs btn-danger btn-delete-retur-file"'
                                    . ' data-nsp="' . intval($row1['id_nsp']) . '" data-file="' . htmlspecialchars($bn) . '"'
                                    . ' data-toggle="tooltip" title="Hapus">
                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>';
                                }
                                $docsHtml .= '</div>';
                                if (++$shown >= 3) { break; }
                              }
                              if (count($files) > 3) {
                                $docsHtml .= '<div><em>+' . (count($files) - 3) . ' lainnya</em></div>';
                              }
                            }
                          }
                          echo $docsHtml !== '' ? $docsHtml : '<span class="text-muted">-</span>';
                        ?>
                      </td>
                      <td align="center">
                        <?php
                        if (!empty($row1['tgl_notifikasi_retur']) && $row1['tgl_notifikasi_retur'] !== '0000-00-00 00:00:00') {
                          echo htmlspecialchars($row1['tgl_notifikasi_retur']);
                        } else {
                          echo '-';
                        }
                        ?>
                      </td>
                      <td><?php echo $row1['nodemand_akj']; ?></td>
                    </tr>
                    <div id="confirm-note<?= $row1['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="padding-bottom: 0px;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center">Notes</h4>
                            <p class="text-inverse text-left" style="margin-top: 20px;"><b>Silahkan masukan keterangan dibawah ini.</b></p>
                            <p class="text-inverse text-left m-b-0">Anda akan menambahkan notes pada No Bon Return: <?= $row1['no_retur']; ?>.</p>
                          </div>
                          <div class="modal-body">
                            <textarea
                              id="note-text-<?= $row1['id']; ?>"
                              placeholder="..."
                              style="width: 100%; 
                            height: 150px; 
                            padding: 12px 20px; 
                            box-sizing: border-box;
                            border: 2px solid #ccc; 
                            border-radius: 4px; 
                            background-color: #f8f8f8; 
                            font-size: 16px; 
                            resize: none;"><?= $row1['note_csr'] ?? "" ?></textarea>
                            <div class="row m-t-15">
                              <div class="col-md-12">
                                <button autocomplete="off" class="btn-save-note btn btn-primary btn-md btn-block waves-effect text-center"
                                  data-id="<?= $row1['id']; ?>"
                                  data-no_po="<?= $row1['no_po']; ?>">Confirm</button>
                              </div>
                            </div>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
              <?php
                    $tKG += $row1['kg'];
                    $tRoll += $row1['roll'];
                    $tPJG += $row1['pjg'];
                    $no++;
                  }
                }
              } else {
                echo "<p>Silakan isi filter terlebih dahulu dan klik cari untuk menampilkan data.</p>";
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <td align="center">&nbsp;</td>
                <td align="center">Total</td>
                <td align="center" colspan="14">&nbsp;</td>
                <td align="center"><?php echo number_format($tRoll, 0); ?></td>
                <td align="center"><?php echo number_format($tKG, 2); ?></td>
                <td align="center"><?php echo number_format($tPJG, 2); ?></td>
                <td align="center" colspan="4">&nbsp;</td>
              </tr>
            </tfoot>
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
  <div id="StsRTEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
  <?php

  ?>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  
  <script type="text/javascript">
    function confirm_delete(delete_url) {
      $('#modal_del').modal('show', {
        backdrop: 'static'
      });
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }
  </script>
  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
  <script>
    $(document).on("click", ".btn-save-note", function() {
      let btn = $(this);
      let id = btn.data("id");
      let note = $("#note-text-" + id).val();

      $.ajax({
        url: "pages/ajax/ajax_update_note_csr_lap_retur.php",
        type: "POST",
        data: {
          id: id,
          note: note,
        },
        beforeSend: function() {
          btn.prop("disabled", true).text("Saving...");
          Swal.fire({
            title: "Saving...",
            text: "Please wait a moment",
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
              Swal.showLoading();
            }
          });
        },
        success: function(res) {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Note berhasil disimpan",
            timer: 1500,
            showConfirmButton: false
          });

          // Tutup modal
          $("#confirm-note" + id).modal("hide");

          // Kosongin textarea
          $("#note-text-" + id).val("");

          $("#form1").submit();
        },
        error: function(xhr, status, error) {
          alert("Error: " + error);
        },
        complete: function() {
          btn.prop("disabled", false).text("Confirm");
        }
      });
    });
  </script>
  <!-- X-editable manual init khusus halaman ini -->
  <script>
    (function () {
      function bindEditable() {
        try {
          $.fn.editable.defaults.mode = 'inline';
          $.fn.editable.defaults.showbuttons = true;
          $.fn.editable.defaults.emptytext = 'Empty';

          $('.notpukpe').editable({
            type: 'text',
            url: 'pages/editable/edittabel_notpukpe.php',
            name: 'notpukpe',
            emptytext: 'Empty',
            validate: function(value) {
              if ($.trim(value).length > 21) {
                return 'Maksimal 21 karakter';
              }
            }
          });

          if (window.jQuery && $('#example8').length) {
            $('#example8').on('draw.dt', function () {
              $('.notpukpe').editable({
                type: 'text',
                url: 'pages/editable/edittabel_notpukpe.php',
                name: 'notpukpe',
                emptytext: 'Empty',
                validate: function(value) {
                  if ($.trim(value).length > 21) {
                    return 'Maksimal 21 karakter';
                  }
                }
              });
            });
          }
        } catch (e) {
          console.error('Gagal inisialisasi x-editable:', e);
        }
      }

      function ensureEditableLoaded(cb) {
        if (typeof window.jQuery === 'undefined') {
          var jq = document.createElement('script');
          jq.src = 'bower_components/jquery/dist/jquery.min.js';
          jq.onload = function () { ensurePlugin(cb); };
          document.body.appendChild(jq);
        } else {
          ensurePlugin(cb);
        }
      }

      function ensurePlugin(cb) {
        if (typeof $.fn.editable === 'undefined') {
          var sc = document.createElement('script');
          sc.src = 'bower_components/xeditable/bootstrap3-editable/js/bootstrap-editable.min.js';
          sc.onload = cb;
          document.body.appendChild(sc);
        } else {
          cb();
        }
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function(){ ensureEditableLoaded(bindEditable); });
      } else {
        ensureEditableLoaded(bindEditable);
      }
    })();
  </script>
  <script>
    // Hapus file retur via AJAX, mirip lap-gantikain.php
    (function(){
      if (!window.jQuery) return;
      $(document).on('click', '.btn-delete-retur-file', function(e){
        e.preventDefault();
        var $a = $(this);
        var nsp = $a.data('nsp');
        var file = $a.data('file');
        var $item = $a.closest('.attachment-item');
        if (!nsp || !file) return;
        if (!confirm('Hapus file: ' + file + ' ?')) return;
        $.ajax({
          url: window.location.pathname + window.location.search,
          type: 'POST',
          data: { delete_retur_file: '1', nsp: nsp, filename: file },
          success: function(res, status, xhr){
            var ok=false; try{ if(typeof res==='string'){res=JSON.parse(res);} ok= !!(res && res.ok);}catch(e){}
            if (!ok) { try { if (xhr && xhr.status >= 200 && xhr.status < 300) { ok = true } } catch(e) {} } if (ok){
              $item.remove();
              var $cell = $item.parent();
              if ($cell.find('.attachment-item').length===0){ $cell.html('<span class="text-muted">-</span>'); }
              if (typeof Swal !== 'undefined' && Swal.fire) { Swal.fire({ title: 'Berhasil', text: 'Lampiran dihapus', icon: 'success', timer: 1200, showConfirmButton: false }); } else { alert('File dihapus'); }
            } else {
              if (typeof Swal !== 'undefined' && Swal.fire) { Swal.fire({ title: 'Gagal', text: 'Gagal menghapus file.', icon: 'error' }); } else { alert('Gagal menghapus file.'); }
            }
          },
          error: function(){ if (typeof Swal !== 'undefined' && Swal.fire) { Swal.fire({ title: 'Gagal', text: 'Gagal menghapus file (server error).', icon: 'error' }); } else { alert('Gagal menghapus file (server error).'); } }
        });
      });
    })();
  </script></body>

</html>

