<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM tbl_lap_inspeksi WHERE id='$modal_id' ");
while($r=mysqli_fetch_array($modal)){	
?>
          <div class="modal-dialog">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditCWarnaFin" enctype="multipart/form-data">
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
                        <label for="proses" class="col-sm-3 control-label">Code Proses</label>  
                        <div class="col-sm-3">
                            <select name="proses" class="form-control">
                                <option value="">Pilih</option>
                                <option value="Fin" <?php if($r['proses']=="Fin"){echo "SELECTED";}?>>Fin</option>
                                <option value="Fin 1X" <?php if($r['proses']=="Fin 1X"){echo "SELECTED";}?>>Fin 1X</option>
                                <option value="Pdr" <?php if($r['proses']=="Pdr"){echo "SELECTED";}?>>Pdr</option>
                                <option value="Oven" <?php if($r['proses']=="Oven"){echo"SELECTED";}?>>Oven</option>
                                <option value="Comp" <?php if($r['proses']=="Comp"){echo"SELECTED";}?>>Comp</option>
                                <option value="Setting" <?php if($r['proses']=="Setting"){echo"SELECTED";}?>>Setting</option>
                                <option value="AP" <?php if($r['proses']=="AP"){echo"SELECTED";}?>>AP</option>
                                <option value="PB" <?php if($r['proses']=="PB"){echo"SELECTED";}?>>PB</option>
                            </select>
                        </div>	
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Status Warna</label>
                            <div class="col-sm-3">
                                <select class="form-control select2" name="status">
                                    <option value="">Pilih</option>
                                    <option value="OK" <?php if($r['status']=="OK"){echo"SELECTED";}?> >OK</option>
                                    <option value="BW" <?php if($r['status']=="BW"){echo"SELECTED";}?>>BW</option>
                                    <option value="TBD" <?php if($r['status']=="TBD"){echo"SELECTED";}?>>TBD</option>
                                </select>
                            </div>
                    </div>		  
                    <div class="form-group">
                        <label for="catatan" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-8">
                                <textarea name="catatan" rows="3" class="form-control" id="ket" placeholder="Keterangan"><?php echo $r['catatan']; ?></textarea>
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
