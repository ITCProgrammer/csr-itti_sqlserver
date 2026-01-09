<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
    echo $modal_id;
?>
         
<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Debit Note</h4>
                </div>
                <div class="modal-body">
                <input type="hidden" id="no_item" name="no_item" value="<?php echo $modal_id?>">
                    <div class="form-group">
                        <label for="dn_kg" class="col-md-4 control-label">KG</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="dn_kg" placeholder="0.0" name="dn_kg" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dn_yd" class="col-md-4 control-label">YD</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="dn_satuan" name="dn_satuan" value="YARD" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dn_amount" class="col-md-4 control-label">AMOUNT</label>
                        <div class="col-md-3" >
                            <select name="currency" id="currency" class="form-control">
                              <option value="IDR">IDR</option>
                              <option value="USD">USD</option>
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="dn_amount" placeholder="Rp. 1.000" name="dn_amount" required onkeyup="formatRupiah(this)">
                            <span class="help-block with-errors"></span>
                        </div>
		        </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                   
                   <input type="submit" value="Simpan" name="simpan_solusi_db" id="simpan_solusi_db" class="btn btn-primary pull-right" >  
                   <!-- <input type="submit" value="cetak" name="simpan_solusi_db" id="simpan_solusi" class="btn btn-primary pull-right" >   -->
                </div>
            </form>
        </div>
            <!-- /.modal-content -->
</div>
          <!-- /.modal-dialog -->
<script>
  $(function () {
    $('#example9').DataTable({
	  'paging': true,
	})
  });
</script>
