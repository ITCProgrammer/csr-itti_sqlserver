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
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditSTSAksiPPC" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Status PPC</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
                <input type="hidden" id="no_order" name="no_order" value="<?php echo $r['no_order'];?>">
                <input type="hidden" id="no_po" name="no_po" value="<?php echo $r['no_po'];?>">
                <input type="hidden" id="nokk" name="nokk" value="<?php echo $r['nokk'];?>">
                <div class="form-group">
                    <label for="sts_aksippc" class="col-sm-3 control-label"></label>		  
                    <div class="col-sm-4">
                        <input type="checkbox" name="sts_aksippc" id="sts_aksippc" value="1" <?php  if($r['sts_aksippc']=="1"){ echo "checked";} ?>>  
                        <label> Verifikasi</label>
                    </div>
                    </div>		  
                    <div class="form-group">
                            <label for="verif_ppc" class="col-sm-3 control-label">Verifikator</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="verif_ppc" value="<?php if($r['verif_ppc']!=""){echo $r['verif_ppc'];}else{ echo "Yohana";} ?>" readonly>
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
