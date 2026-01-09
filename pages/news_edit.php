<?php
//ini_set("error_reporting", 1);
include("../koneksi.php");
    $modal_id=$_GET['id'];
    $modal=mysqli_query($con,"SELECT * FROM `tbl_gambar` WHERE id='$modal_id'");
while ($r=mysqli_fetch_array($modal)) {
    ?>
<div class="modal-dialog " style="width: 90%;">
  <div class="modal-content">
    <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditNews" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Line News</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id" name="id" value="<?php echo $r['id']; ?>">
        <div class="form-group">
          <label for="line_news" class="col-md-2 control-label">Line News</label>
          <div class="col-md-10">
            <textarea name="line_news" rows="10" class="form-control" id="line_news"><?php echo $r['desc']; ?></textarea>
            <span class="help-block with-errors"></span>
          </div>
        </div>
		<div class="form-group">
          <label for="sts" class="col-md-2 control-label">Status</label>
          <div class="col-md-10">
            <select name="sts" class="form-control">
			<option value="Tampil" <?php if($r['tampil']=="ya"){echo "SELECTED";}?>>Tampil</option>
			<option value="Tidak Tampil" <?php if($r['tampil']=="tidak"){echo "SELECTED";}?>>Tidak Tampil</option>	
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
