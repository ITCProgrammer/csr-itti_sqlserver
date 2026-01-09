<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM `tbl_tq_nokk` WHERE id='$modal_id'");
while($r=mysqli_fetch_array($modal)){
?>
         
<div class="modal-dialog modal1">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="JnsKain_Update" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Data Jenis Kain</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
                        <div class="form-group">
                            <label for="jns_kain" class="col-md-2 control-label">Jenis Kain</label>
                                <div class="col-md-8">
                                    <textarea name="jns_kain" style="text-transform:uppercase" class="form-control" id="jns_kain" placeholder="" required><?php echo $r['jenis_kain'];?></textarea>
                                </div>
                        </div>
		        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" <?php if($_SESSION['lvl_id']!="LEADERTQ"){echo "disabled"; } ?> >Save Changes</button>
                    <!--<?php if($_SESSION['lvl_id']!="ADMIN"){echo "disabled"; } ?>-->
                </div>
            </form>
        </div>
            <!-- /.modal-content -->
</div>
          <!-- /.modal-dialog -->
          <?php } ?>