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
  <meta http-equiv="refresh" content="180">
  <title>Schedule</title>
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
  $tglNow = date("Ymd");
  ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">

          <a href="FormSchedulePacking" class="btn btn-success <?php if ($_SESSION['lvl_id'] != "PACKING") {
                                                                  echo "disabled";
                                                                } ?>"><i class="fa fa-plus-circle"></i> Tambah</a>&nbsp;

          <a href="pages/cetak/cetak-laporan-schedulepacking.php"
            class="btn btn-primary"
            target="_blank">
            <i class="fa fa-print" aria-hidden="true"></i> Cetak
          </a>

          <!--	
  <a href="?p=Form-Schedule-Manual" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Tambah Manual</a>-->
          <div class="btn-group pull-right">
            <!-- <a href="pages/cetak/cetak_schedule_excel.php?tgl=<?php echo $tglNow; ?>" class="btn btn-info"
              target="_blank"><i class="fa fa-file-excel-o"></i> </a>
            <a href="pages/cetak/cetak_schedule.php" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i>
            </a>
            <a href="pages/cetak/cetak_summary_buyer.php" class="btn btn-success" target="_blank"><i
                class="fa fa-print"></i> Summary Buyer</a> -->
          </div>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-hover table-striped" width="100%">
              <thead class="bg-blue">
                <tr>
                  <th width="115">
                    <div align="center">Action_</div>
                  </th>
                  <th width="24">
                    <div align="center">No.</div>
                  </th>
                  <th width="162">
                    <div align="center">Pelanggan</div>
                  </th>
                  <th width="118">
                    <div align="center">No. Order</div>
                  </th>
                  <th width="122">
                    <div align="center">Jenis Kain</div>
                  </th>
                  <th width="86">
                    <div align="center">Warna</div>
                  </th>
                  <th width="83">
                    <div align="center">No Warna</div>
                  </th>
                  <th width="38">
                    <div align="center">Lot</div>
                  </th>
                  <th width="79">
                    <div align="center">Keterangan</div>
                  </th>
                  <th width="46">
                    <div align="center">Rol</div>
                  </th>
                  <th width="48">
                    <div align="center">Kg</div>
                  </th>
                  <th width="48">
                    <div align="center">Gerobak</div>
                  </th>
                  <th width="59">
                    <div align="center">Proses</div>
                  </th>
                  <th>
                    <div align="center">Delivery</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $col = 0;
                $no = 1;
                while ($rowd = mysqli_fetch_array($data)) {
                  date_default_timezone_set('Asia/Jakarta');
                  $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
                  $qCek = mysqli_query($con, "SELECT `status`,`personil` FROM tbl_inspection WHERE id_schedule='$rowd[id]' LIMIT 1");
                  $rCEk = mysqli_fetch_array($qCek);
                  //$qLate=mysqli_query("SELECT TIMESTAMPDIFF(HOUR, '$rowd[tgl_update]', now()) as diff FROM tbl_schedule_packing WHERE nokk='$rowd[nokk]' AND NOT STATUS = 'selesai'");
                  //$rLate=mysqli_fetch_array($qLate);
                  //$tglupdate = new DateTime($rowd['tgl_update']);
                  //$now=new DateTime();
                  //$selisih = $tglupdate->diff($now);
                  //$difference = ($selisih->days * 24)+$selisih->h;
                ?>
                  <div class="modal fade modal-super-scaled" id="PrintHalaman<?php echo $rowd['id']; ?>">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action=""
                          enctype="multipart/form-data">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Cetak Identifikasi Produk</h4>
                          </div>
                          <div class="modal-body" align="center">
                            <a href="pages/cetak/iden_produk1.php?idkk=<?php echo $rowd['id']; ?>&nm=<?php echo $_SESSION['usrid']; ?>"
                              class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Gerobak ke-1</a>
                            <a href="pages/cetak/iden_produk2.php?idkk=<?php echo $rowd['id']; ?>&nm=<?php echo $_SESSION['usrid']; ?>"
                              class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Gerobak ke-2</a><br><br>
                            <a href="pages/cetak/iden_produk3.php?idkk=<?php echo $rowd['id']; ?>&nm=<?php echo $_SESSION['usrid']; ?>"
                              class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Gerobak ke-3</a>
                            <a href="pages/cetak/iden_produk4.php?idkk=<?php echo $rowd['id']; ?>&nm=<?php echo $_SESSION['usrid']; ?>"
                              class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Gerobak ke-4</a><br><br>
                            <a href="pages/cetak/iden_produk5.php?idkk=<?php echo $rowd['id']; ?>&nm=<?php echo $_SESSION['usrid']; ?>"
                              class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Gerobak ke-5</a>
                            <a href="pages/cetak/iden_produk6.php?idkk=<?php echo $rowd['id']; ?>&nm=<?php echo $_SESSION['usrid']; ?>"
                              class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Gerobak ke-6</a>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>

                  <tr bgcolor="<?php echo $bgcolor; ?>">
                    <td align="center">
                      <div class="btn-group">
                        <!-- <a href="#" id='<?php echo $rowd['id']; ?>' class="btn btn-xs btn-warning gerobak_tambah <?php if ($_SESSION['akses'] != "biasa") {
                                                                                                                        echo "disabled";
                                                                                                                      } ?>"><i class="fa fa-plus"></i></a> -->
                        <!-- <a href="#" id='<?php echo $rowd['id']; ?>' class="btn btn-xs btn-info schedule_edit <?php if ($_SESSION['akses'] == "biasa" or $rCEk['status'] == "sedang jalan" or $_SESSION['lvl_id'] != "INSPEKSI") {
                                                                                                                    echo "disabled";
                                                                                                                  } ?>"><i class="fa fa-edit"></i></a> -->
                        <a href="#" onclick="confirm_del('HapusPack-<?php echo $rowd['id'] ?>');" class="btn btn-xs btn-danger 
                           "><i class="fa fa-trash"></i></a>
                      </div>
                    </td>
                    <?php //echo $_SESSION['lvl_id10'];
                    ?>
                    <td align="center">
                      <?php echo $no;
                      // echo $rowd['no_urut']; 
                      ?>
                      <br />
                      <a href="javascript:void(0);"
                        id="stop-<?php echo $rowd['id']; ?>" class="btn btn-xs btn-danger"
                        data-id="<?php echo $rowd['id']; ?>" data-nodemand="<?php echo $rowd['nodemand']; ?>"
                        onclick="stopPacking('<?php echo $rowd['id']; ?>', '<?php echo $rowd['nodemand']; ?>')">
                        Stop
                      </a>


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
                    <td align="center"><a href="#">
                        <?php echo $rowd['lot']; ?>
                      </a></td>
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
                      <!-- <a href="#" id='<?php //echo $rowd['id']; 
                                            ?>' class="detail_kartu"><span class="label label-danger">
                          <?php //echo $rowd['ket_kartu']; 
                          ?>
                        </span></a> -->
                    </td>
                    <td align="center">
                      <?php echo $rowd['rol'] . $rowd['kk']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowd['bruto']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowd['total_gerobak']; ?>
                    </td>
                    <td>
                      <?php echo $rowd['proses']; ?>
                    </td>
                    <td align="center">
                      <?php echo $rowd['tgl_delivery']; ?>
                    </td>
                  </tr>
                <?php
                  $no++;
                } ?>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Popup untuk delete-->
    <div class="modal fade" id="delSchedule" tabindex="-1">
      <div class="modal-dialog modal-sm">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
          </div>

          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
            <a href="#" class="btn btn-danger" id="del_link">Delete</a>
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <div id="ScheduleEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
    </div>
    <div id="MesinMulaiEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
    </div>
    <div id="MesinBerhentiEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog"
      aria-labelledby="myModalLabel" aria-hidden="true">
    </div>
    <div id="EditStatusMesin" class="modal fade modal-3d-slit" tabindex="-1" role="dialog"
      aria-labelledby="myModalLabel" aria-hidden="true">
    </div>
    <div id="GerobakTambah" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
    </div>
    <div id="DetailKartu" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
    </div>
</body>

</html>
<script type="text/javascript">
  function confirm_del(delete_url) {
    $('#delSchedule').modal('show', {
      backdrop: 'static'
    });
    document.getElementById('del_link').setAttribute('href', delete_url);
  }
</script>
<script>
  function stopPacking(id, nodemand) {
    // Buat URL untuk mengupdate status secara langsung
    var url = 'UpdateStsPack-' + id + '-' + nodemand;

    // Redirect ke URL yang telah dibentuk untuk melakukan update status
    window.location.href = url;

    // Jika perlu, Anda bisa menambahkan query string, contoh:
    // var url = 'UpdateStsPack-' + id + '-' + nodemand + '?status=selesai';
    // window.location.href = url;
  }
</script>