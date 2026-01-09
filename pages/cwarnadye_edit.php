<script>
	function tampil(){
	if(document.forms['modal_popup']['status_warna'].value=="TOLAK BASAH"){
		$("#disposisi").css("display", "");  // To unhide
	}else{
		$("#disposisi").css("display", "none");  // To hide
	}
    if(document.forms['modal_popup']['status_warna'].value==""){
		$("#disposisi").css("display", "none");  // To hide
	}
    if(document.forms['modal_popup']['status_warna'].value=="OK"){
		$("#disposisi").css("display", "none");  // To hide
	}
    }
</script>
<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM tbl_cocok_warna_dye WHERE id='$modal_id' ");
while($r=mysqli_fetch_array($modal)){	
?>
          <div class="modal-dialog">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditCWarnaDye" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
                    <div class="form-group">
                            <label for="no_po" class="col-sm-3 control-label">PO</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="no_po" value="<?php echo $r['no_po']; ?>">
                        </div> 
                    </div>
                    <div class="form-group">
                            <label for="no_order" class="col-sm-3 control-label">Order</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="no_order" value="<?php echo $r['no_order']; ?>">
                        </div> 
                    </div>
                    <div class="form-group"> 
                        <label for="status_warna" class="col-sm-3 control-label">Status Warna</label>  
                        <div class="col-sm-3">
                            <select name="status_warna" class="form-control" id="status_warna" onChange="tampil();">
                                <option value=""<?php if($r['status_warna']==""){echo"SELECTED";}?>></option>
                                <option value="OK" <?php if($r['status_warna']=="OK"){echo"SELECTED";}?> >OK</option>
                                <option value="TOLAK BASAH" <?php if($r['status_warna']=="TOLAK BASAH"){echo"SELECTED";}?>>TOLAK BASAH</option>
                            </select>
                        </div>	
                    </div>
                    <div class="form-group" id="disposisi" style="display:none;">
                        <label for="disposisi" class="col-sm-3 control-label">Disposisi</label>
                        <div class="col-sm-5">
                            <input name="disposisi" class="form-control" type="text" id="disposisi" value="<?php echo $r['disposisi'];?>" placeholder="Disposisi">
                        </div>
                    </div>	
                    <div class="form-group">
                            <label for="colorist_qcf" class="col-sm-3 control-label">Colorist QCF</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="colorist_qcf" value="<?php echo $r['colorist_qcf']; ?>">
                        </div> 
                    </div>	  
                    <div class="form-group">
                        <label for="ket" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-8">
                                <textarea name="ket" rows="3" class="form-control" id="ket" placeholder="Keterangan"><?php echo $r['ket']; ?></textarea>
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
