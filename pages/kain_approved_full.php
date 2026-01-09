<?php
include("../koneksi.php");
$modal_id = $_GET['id'];
$qry = mysqli_query($conlab, "SELECT * FROM tbl_test_qc  WHERE id='$modal_id'");
$r = mysqli_fetch_array($qry);
?>
<div class="modal-dialog ">
  <div class="modal-content">
    <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="UbahKainApprovedFull" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Approved Kain Test Dept. LAB Full</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="approved1" class="col-sm-3 control-label">Approved 1</label>
          <div class="col-sm-6">
            <!-- Update by ilham 21/06/2024 No Ticket BDIT240001517 -->
            <select name="approved1" class="form-control select2" <?php if ($r['approved_qc2'] != "" || $r['approved_qc1'] != "") {
                                                                    echo "disabled";
                                                                  } ?>>
              <option value="" <?php if ($r['approved_qc1'] == "") {
                                  echo "SELECTED";
                                } ?>>Pilih</option>
              <option value="Edwin Ismunandar" <?php if ($r['approved_qc1'] == "Edwin Ismunandar") {
                                                  echo "SELECTED";
                                                } ?>>Edwin Ismunandar</option>
              <option value="Ferry Wibowo" <?php if ($r['approved_qc1'] == "Ferry Wibowo") {
                                              echo "SELECTED";
                                            } ?>>Ferry Wibowo</option>
              <option value="Janu Dwi Laksono" <?php if ($r['approved_qc1'] == "Janu Dwi Laksono") {
                                                  echo "SELECTED";
                                                } ?>>Janu Dwi Laksono</option>
              <option value="Taufik Restiardi" <?php if ($r['approved_qc1'] == "Taufik Restiardi") {
                                                  echo "SELECTED";
                                                } ?>>Taufik Restiardi</option>
              <!-- Update by ilham 21/06/2024 No Ticket BDIT240001517 -->
              <option value="Dixih Wahyudin" <?php if ($r['approved_qc1'] == "Dixih Wahyudin") {
                                                echo "SELECTED";
                                              } ?>>Dixih Wahyudin</option>
              <option value="Vivik Kurniawati" <?php if ($r['approved_qc1'] == "Vivik Kurniawati") {
                                                  echo "SELECTED";
                                                } ?>>Vivik Kurniawati</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="approved2" class="col-sm-3 control-label">Approved 2</label>
          <div class="col-sm-6">
            <!-- Update by ilham 21/06/2024 No Ticket BDIT240001517 -->
            <select name="approved2" class="form-control select2" <?php if ($r['approved_qc2'] != "") {
                                                                    echo "disabled";
                                                                  } ?>>
              <option value="" <?php if ($r['approved_qc2'] == "") {
                                  echo "SELECTED";
                                } ?>>Pilih</option>
              <option value="Edwin Ismunandar" <?php if ($r['approved_qc2'] == "Edwin Ismunandar") {
                                                  echo "SELECTED";
                                                } ?>>Edwin Ismunandar</option>
              <option value="Ferry Wibowo" <?php if ($r['approved_qc2'] == "Ferry Wibowo") {
                                              echo "SELECTED";
                                            } ?>>Ferry Wibowo</option>
              <option value="Janu Dwi Laksono" <?php if ($r['approved_qc2'] == "Janu Dwi Laksono") {
                                                  echo "SELECTED";
                                                } ?>>Janu Dwi Laksono</option>
              <option value="Taufik Restiardi" <?php if ($r['approved_qc2'] == "Taufik Restiardi") {
                                                  echo "SELECTED";
                                                } ?>>Taufik Restiardi</option>
              <!-- Update by ilham 21/06/2024 No Ticket BDIT240001517 -->
              <option value="Dixih Wahyudin" <?php if ($r['approved_qc2'] == "Dixih Wahyudin") {
                                                echo "SELECTED";
                                              } ?>>Dixih Wahyudin</option>
              <option value="Vivik Kurniawati" <?php if ($r['approved_qc2'] == "Vivik Kurniawati") {
                                                  echo "SELECTED";
                                                } ?>>Vivik Kurniawati</option>
            </select>
          </div>
        </div>
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