<?php
ini_set("error_reporting", 1);
include("../koneksi.php");
    $modal_id=$_GET['id'];
    $modal=mysqli_query($con,"SELECT * FROM `tbl_posisi_operator` WHERE id='$modal_id' ");
while ($r=mysqli_fetch_array($modal)) {
    ?>
<div class="modal-dialog ">
  <div class="modal-content">
    <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditPosisi" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Posisi</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id" name="id" value="<?php echo $r['id']; ?>">
        <div class="form-group">
          <label for="nama" class="col-md-2 control-label">Operator</label>
          <div class="col-md-10">
         <select name="nama" class="form-control select2" style="width: 100%;">
		<option value="">Pilih</option>
		<?php $sqlPr=mysqli_query($con,"SELECT nama FROM user_login WHERE level='INSPEKSI' AND dept='QC' AND akses='biasa'");
		while($rP=mysqli_fetch_array($sqlPr)){ ?>
		<option value="<?php echo $rP['nama'];?>" <?php if($r['nama']== strtoupper($rP['nama'])){ echo "SELECTED";}?>><?php echo $rP['nama'];?></option>	
			<?php } ?>
		</select>
            <span class="help-block with-errors"></span>
          </div>
        </div>		  
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
<?php
} ?>
