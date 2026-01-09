<?php
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";



?>
<?php

$Awal = isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir = isset($_POST['akhir']) ? $_POST['akhir'] : '';

$no_counter = isset($_POST['no_counter']) ? $_POST['no_counter'] : '';

?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>

</head>

<body>
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Filter Data Test Quality</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
      <div class="box-body">
        <div class="form-group">
          <div class="col-sm-2">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal"
                value="<?php echo $Awal; ?>" />
            </div>
          </div>
          <div class="col-sm-2">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="akhir" type="text" class="form-control pull-right" id="datepicker1"
                placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" />
            </div>
          </div>
          <!-- /.input group -->
        </div>

        <div class="form-group">
          <div class="col-sm-2">
            <input name="no_counter" type="text" class="form-control pull-right" placeholder="No Counter"
              value="<?= $no_counter ?>">
          </div>

        </div>

        <div class="form-group">

        </div>

        <div class="form-group">

          <div class="col-sm-2">
            <button type="submit" class="btn btn-success " name="cari"><i class="fa fa-search"></i> Cari Data</button>
          </div>

        </div>





        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer -->

      </div>


    </form>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Test Quality</h3>
          <?php if (($_POST['awal'] != "" and $_POST['akhir'] != "") || $no_counter != "") {


            ?>
            <br><b>Periode:
              <?php echo date('d F Y', strtotime($_POST['awal'])) . " s/d " . date('d F Y', strtotime($_POST['akhir'])); ?>
            </b>
            <a href="pages/cetak/masterdata_excel_lab.php?awal=<?php echo $Awal; ?>
&akhir=<?php echo $Akhir; ?>
&no_counter=<?php echo $no_counter; ?>
" target="_blank" class="btn btn-danger pull-right">Cetak</a>
            <?php
          } ?>

        </div>
        <div class="box-body">
          <table id="example3" class="table table-bordered table-hover table-striped display" width="100%">
            <thead class="bg-red">
              <tr>
                <th width="41">
                  <div align="center">No</div>
                </th>
                <th width="41">
                  <div align="center">Suffix</div>
                </th>
                <th>
                  <div align="center">No Counter</div>
                </th>
                <th>
                  <div align="center">Jenis Testing</div>
                </th>
                <th>
                  <div align="center">Treatment</div>
                </th>
                <th>
                  <div align="center">Buyer</div>
                </th>
                <th width="41">
                  <div align="center">No Warna</div>
                </th>
                <th width="41">
                  <div align="center">Nama Warna</div>
                </th>
                <th width="41">
                  <div align="center">Item</div>
                </th>
                <th width="41">
                  <div align="center">Jenis Kain</div>
                </th>
                <th width="41">
                  <div align="center">Personil Testing</div>
                </th>
                <th width="41">
                  <div align="center">Permintaan Testing</div>
                </th>
                <th width="41">
                  <div align="center">Created By</div>
                </th>
                <th width="41">
                  <div align="center">Status</div>
                </th>
                <th width="41">
                  <div align="center">Status QC</div>
                </th>
              </tr>
            </thead>
            <tbody>
            <?php
            if ($no_counter != "" || $Awal != "" || $Akhir != "") {
              $sql = "SELECT * FROM tbl_test_qc";

              if ($no_counter != "" && ($Awal == "" || $Akhir == "")) {
                $sql .= " WHERE no_counter = '$no_counter'";
              } else if ($no_counter == "" && ($Awal != "" || $Akhir != "")) {
                $sql .= " WHERE tgl_buat BETWEEN '$Awal' AND '$Akhir' ";
              } else if ($no_counter != "" && $Awal != "" && $Akhir != "") {
                $sql .= " WHERE  no_counter = '$no_counter' AND tgl_buat BETWEEN '$Awal' AND '$Akhir' ";
              }


              $results = mysqli_query($conlab, $sql);

              while ($r = mysqli_fetch_array($results)) {
                $no++;
                $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
                ?>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                  <td align="center">
                    <?php echo $no; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['suffix']; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['no_counter']; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['jenis_testing']; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['treatment']; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['buyer']; ?>
                  </td>
                  <td>
                    <?php echo $r['no_warna']; ?>
                  </td>
                  <td>
                    <?php echo $r['warna']; ?>
                  </td>
                  <td>
                    <?php echo $r['no_item']; ?>
                  </td>
                  <td>
                    <?php echo $r['jenis_kain']; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['nama_personil_test']; ?>
                  </td>
                  <td align="center">
                  <?php
                    if ($r['permintaan_testing'] != "") {
                      echo $r['permintaan_testing'];
                    } else {
                      echo "<span class='label label-danger blink_me'>FULL TEST</span>";
                    }
                  ?>
                  </td>
                  <td align="center">
                    <?php echo $r['created_by']; ?>
                  </td>
                  <td align="center">
                    <span
                      class="label <?php if ($r['sts_laborat'] == "Open") {
                        echo "label-info";
                      } else {
                        echo "label-primary";
                      } ?>"><?php echo $r['sts_laborat']; ?></span>
                    <hr class="divider"><span
                      class="label <?php if ($r['sts'] == "normal") {
                        echo "label-warning";
                      } else {
                        echo "label-danger blink_me";
                      } ?>"><?php echo $r['sts']; ?></span>
                  </td>
                  <td align="center">
                    <span
                      class="label <?php if ($r['sts_qc'] == "Tunggu Kain") {
                        echo "label-primary";
                      } else {
                        echo "label-warning";
                      } ?>"><?php echo $r['sts_qc']; ?></span>
                  </td>
                </tr>
              <?php } } ?>
            </tbody>
            <tfoot class="bg-red">
            </tfoot>
          </table>
          </form>

        </div>
      </div>
    </div>
  </div>
  <div id="DtMail" class="modal fade modal-rotate-from-bottom" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">

  </div>
  </div>
</body>

</html>