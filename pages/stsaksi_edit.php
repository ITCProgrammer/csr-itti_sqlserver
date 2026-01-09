<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE id='$modal_id' ");
while($r=mysqli_fetch_array($modal)){	
?>
          <div class="modal-dialog">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditSTSAksi" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Status Bon Penghubung</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
                <input type="hidden" id="no_order" name="no_order" value="<?php echo $r['no_order'];?>">
                <input type="hidden" id="no_po" name="no_po" value="<?php echo $r['no_po'];?>">
                <input type="hidden" id="nokk" name="nokk" value="<?php echo $r['nokk'];?>">
                    <div class="form-group"> 
                        <label for="sts_aksi" class="col-sm-3 control-label">Aksi</label>  
                        <div class="col-sm-3">
                            <select name="sts_aksi" class="form-control">
                                <option value="">Pilih</option>
                                <option value="PROSES" <?php if($r['sts_aksi']=="Proses"){echo "SELECTED";}?>>PROSES</option>
                                <option value="HOLD" <?php if($r['sts_aksi']=="Hold"){echo "SELECTED";}?>>HOLD</option>
                                <option value="TIDAK PROSES" <?php if($r['sts_aksi']=="Tidak Proses"){echo "SELECTED";}?>>TIDAK PROSES</option>
                            </select>
                        </div>	
                    </div>		  
                    <div class="form-group">
                            <label for="editor" class="col-sm-3 control-label">Editor</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="editor" value="<?php echo $r['editor']; ?>" required>
                        </div> 
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
          <?php } ?>
<script>
	//Initialize Select2 Elements
    $('.select2').select2()
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
		//Date picker
        $('#datepicker').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd',
          todayHighlight: true,
        });
	    //Date picker
        $('#datepicker1').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd',
          todayHighlight: true,
        });
		//Date picker
        $('#datepicker2').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd',
          todayHighlight: true,
        });
		//Timepicker
    	$('#timepicker').timepicker({
      	showInputs: false,
    	});
	    
	$(function () {	
//Timepicker
    $('.timepicker').timepicker({
                minuteStep: 1,
                showInputs: true,
                showMeridian: false,
                defaultTime: false	
	  	
    })
})
		
</script>
