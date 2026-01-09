<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM `tbl_schedule_krah` WHERE id='$modal_id' ");
while($r=mysqli_fetch_array($modal)){
?>
         
<div class="modal-dialog modal1 ">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditKrahBerhenti" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">QC Final</h4>
              </div>
              	<div class="modal-body">
                  <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
				  	<div class="form-group">
						<label for="qty_netto" class="col-sm-2 control-label">Qty Netto</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input name="rol_netto" type="text" class="form-control" id="rol_netto" value="" placeholder="0" required>
								<span class="input-group-addon">Bales</span>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="input-group">
								<input name="qty_netto" type="text" class="form-control" id="qty_netto" value="" placeholder="0.00" required>
								<span class="input-group-addon">KGs</span>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="input-group">
								<input name="pcs_netto" type="text" class="form-control" id="pcs_netto" value="" placeholder="0.00" required>
								<span class="input-group-addon">PCS</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="qty_sisa" class="col-sm-2 control-label">Qty Sisa</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input name="rol_sisa" type="text" class="form-control" id="rol_sisa" value="" placeholder="0" >
								<span class="input-group-addon">Bales</span>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="input-group">
								<input name="qty_sisa" type="text" class="form-control" id="qty_sisa" value="" placeholder="0.00" >
								<span class="input-group-addon">KGs</span>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="input-group">
								<input name="pcs_sisa" type="text" class="form-control" id="pcs_sisa" value="" placeholder="0.00" >
								<span class="input-group-addon">PCS</span>
							</div>
						</div>
					</div>
				  	<div class="form-group">
						<label for="catatan" class="col-md-2 control-label">Catatan</label>
						<div class="col-sm-8">		  
						<textarea name="catatan" class="form-control" id="catatan" placeholder="catatan..."></textarea>
						<span class="help-block with-errors"></span>	  
						</div>			  
					</div>
              	</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary" >OK</button>
				</div>
            </form>
        </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
          <?php } ?>
