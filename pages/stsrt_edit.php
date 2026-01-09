<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM tbl_detail_retur WHERE id='$modal_id' ");
while($r=mysqli_fetch_array($modal)){	
?>
          <div class="modal-dialog">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditSTSRT" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Status Retur</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
                    <div class="form-group"> 
                        <label for="status" class="col-sm-3 control-label">Status</label>  
                        <div class="col-sm-3">
                            <select name="status" class="form-control">
                                <option value="">Pilih</option>
                                <option value="OK" <?php if($r['status']=="OK"){echo "SELECTED";}?>>OK</option>
                                <option value="BELUM OK" <?php if($r['status']=="BELUM OK"){echo "SELECTED";}?>>BELUM OK</option>
                            </select>
                        </div>	
                    </div>		  
                    <div class="form-group">
                            <label for="order_returbaru" class="col-sm-3 control-label">Order Retur Baru</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="order_returbaru" value="<?php echo $r['order_returbaru']; ?>">
                        </div> 
                    </div>
                    <div class="form-group">
                            <label for="status1" class="col-sm-3 control-label">Status 1</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="status1" value="<?php echo $r['status1']; ?>">
                        </div> 
                    </div>
                    <div class="form-group">
                            <label for="status2" class="col-sm-3 control-label">Status 2</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="status2" value="<?php echo $r['status2']; ?>">
                        </div> 
                    </div>
                    <div class="form-group">
                            <label for="status3" class="col-sm-3 control-label">Status 3</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="status3" value="<?php echo $r['status3']; ?>">
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
