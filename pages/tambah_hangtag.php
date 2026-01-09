<?php
session_start();
include("../koneksi.php");    
?>
         
<div class="modal-dialog modal1">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="Hangtag_Tambah" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Data Hangtag</h4>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="no_item" class="col-md-2 control-label">No Item</label>
                                <div class="col-md-8">
                                    <input name="no_item" type="text" class="form-control" id="no_item" placeholder="No Item" required>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="hangtag" class="col-md-2 control-label">Hangtag</label>
                                <div class="col-md-8">
			                        <textarea name="hangtag" class="form-control" id="hangtag" placeholder="Hangtag" required></textarea>
			                    </div>
                        </div>
		        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" <?php if($_SESSION['lvl_id']!="LEADERTQ"){echo "disabled"; } ?> >Save</button>
                </div>
            </form>
        </div>
            <!-- /.modal-content -->
</div>
          <!-- /.modal-dialog -->