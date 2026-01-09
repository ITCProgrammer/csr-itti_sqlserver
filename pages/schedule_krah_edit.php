<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM `tbl_schedule_krah` WHERE id='$modal_id' ");
while($r=mysqli_fetch_array($modal)){
?>
         
<div class="modal-dialog modal1">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditScheduleKrah" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Schedule Krah</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
				  <input type="hidden" id="personil" name="personil" value="<?php echo $_SESSION['nama1'];?>">
				  <div class="form-group">
                  <label for="urutan" class="col-md-4 control-label">Urutan</label>
                  <div class="col-md-3">
                  <select name="no_urut" class="form-control">
						<option value="">Pilih</option>
						<?php 
						$sqlKap=mysqli_query($con,"SELECT no_urut FROM tbl_urut ORDER BY no_urut ASC");
						while($rK=mysqli_fetch_array($sqlKap)){
						?>
						<option value="<?php echo $rK['no_urut']; ?>" <?php if($rK['no_urut']==$r['no_urut']){ echo "SELECTED";}?>><?php echo $rK['no_urut']; ?></option>
						<?php } ?>	  
					  </select>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>
				  <div class="form-group">
                  	<label for="proses" class="col-md-4 control-label">Proses</label>
                  	<div class="col-md-5">
                  		<select class="form-control select2" name="proses" required>
							<option value="">Pilih</option>
                            <option value="Lipat" <?php if($r['proses']=="Lipat"){echo "SELECTED";}?>>Lipat</option>
                            <option value="Cabut" <?php if($r['proses']=="Cabut"){echo "SELECTED";}?>>Cabut</option>
                            <option value="Sulam" <?php if($r['proses']=="Sulam"){echo "SELECTED";}?>>Sulam</option>
                        </select>
                  	<span class="help-block with-errors"></span>
                  	</div>
                  </div>
                  <div class="form-group">
                  <label for="catatan" class="col-md-4 control-label">Catatan</label>
                  <div class="col-sm-8">		  
				  <textarea name="catatan" class="form-control" id="catatan" placeholder="catatan..."><?php echo $r['catatan'];?></textarea>
				  <span class="help-block with-errors"></span>	  
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
//Date picker
        $('#datepicker').datepicker({
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
	  	
    }),
		
});
	function aktifmesin(){
	
		if(document.forms['modal_popup']['ket_kain'].value == "Pindah Dari Mesin"){	
			
			document.modal_popup.mc_from.removeAttribute("disabled");
		}else{
			document.modal_popup.mc_from.setAttribute("disabled",true);
		}
	}

</script>
