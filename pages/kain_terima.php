<?php
include("../koneksi.php");
$modal_id = $_GET['id'];
$qry = mysqli_query($conlab, "SELECT * FROM tbl_test_qc  WHERE id='$modal_id'");
$r = mysqli_fetch_array($qry);
?>
<div class="modal-dialog ">
  <div class="modal-content">
    <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="UbahKainTerima" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Terima Kain dari Dept. LAB</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="sts" class="col-sm-3 control-label">Status</label>
          <div class="col-sm-4">
            <select name="sts" class="form-control" id="sts" required>
              <?php if ($r['sts_qc'] == "Belum Terima Kain") { ?>
                <option value="Sudah Terima Kain" <?php if ($r['sts_qc'] == "Sudah Terima Kain") {
                                                    echo "SELECTED";
                                                  } ?>>Sudah Terima Kain</option>
              <?php } ?>
            </select>
          </div>
        </div>
        <?php if ($r['sts_qc'] == "Belum Terima Kain") { ?>
          <div class="form-group">
            <!-- Update by ilham 02/07/2024 -->
            <label for="diterima_oleh" class="col-sm-3 control-label">Pengirim</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" value="" name="diterima_oleh" maxlength="30" required>
            </div>
          </div>
          <div class="form-group">
            <label for="nama_penerima" class="col-sm-3 control-label">Penerima</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" value="" name="nama_penerima" maxlength="30" required>
            </div>
          </div>
        <?php } ?>
        <input type="hidden" id="id" name="id" value="<?php echo $modal_id; ?>">
        <input type="hidden" id="no_counter" name="no_counter" value="<?php echo $r['no_counter']; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<script>
  //Date picker
  $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    }),
    //Date picker
    $('#datepicker1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    }),
    //Date picker
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    }),
    //Date picker
    $('#datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
</script>