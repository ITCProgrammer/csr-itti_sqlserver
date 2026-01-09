<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM `tbl_schedule` WHERE id='$modal_id' ");
while($r=mysqli_fetch_array($modal)){
?>
         
<div class="modal-dialog modal1">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditSchedule" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Schedule</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
				  <input type="hidden" id="personil" name="personil" value="<?php echo $_SESSION['nama1'];?>">
                  <div class="form-group">
                  <label for="no_mesin" class="col-md-4 control-label">No Mesin</label>
					  
                  <div class="col-md-3">
                  <select name="no_mesin" class="form-control">
							  	<option value="">Pilih</option>
							  <?php 
							  $sqlKap=mysqli_query($con,"SELECT no_mesin FROM tbl_mesin ORDER BY no_mesin ASC");
							  while($rK=mysqli_fetch_array($sqlKap)){
							  ?>
								  <option value="<?php echo $rK['no_mesin']; ?>" <?php if($rK['no_mesin']==$r['no_mesin']){ echo "SELECTED";}?>><?php echo $rK['no_mesin']; ?></option>
							 <?php } ?>	  
					  </select>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>
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
                  <select name="proses" class="form-control">
							  	<option value="">Pilih</option>
							  <?php 
							  $sqlKap=mysqli_query($con,"SELECT proses FROM tbl_proses ORDER BY proses ASC");
							  while($rK=mysqli_fetch_array($sqlKap)){
							  ?>
								  <option value="<?php echo $rK['proses']; ?>" <?php if($rK['proses']==$r['proses']){ echo "SELECTED";}?>><?php echo $rK['proses']; ?></option>
							 <?php } ?>  
					  </select>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>
				  <div class="form-group">
                  <label for="target" class="col-md-4 control-label">Std Target</label>
                  <div class="col-md-3">
				  <div class="input-group">	  
				  <input name="target" type="text" class="form-control" id="target" 
                    value="<?php echo $r['target'];?>" placeholder="0" style="text-align: right;">
				  <span class="input-group-addon">Jam</span>	  
                  <span class="help-block with-errors"></span>
				  </div>	  
                  </div>
                  </div>
				  <div class="form-group">
                  <label for="ket_kain" class="col-md-4 control-label">Ket Kain</label>
                  <div class="col-md-5">
                  <select name="ket_kain" class="form-control" onChange="aktifmesin();" id="ket_kain">
						<option value="">Pilih</option>
						<option value="Normal" <?php if($r['ket_kain']=="Normal"){echo "SELECTED";} ?>>Normal</option>	
				  		<option value="Sudah Dokumen" <?php if($r['ket_kain']=="Sudah Dokumen"){echo "SELECTED";} ?>>Sudah Dokumen</option>
				  		<option value="Urgent" <?php if($r['ket_kain']=="Urgent"){echo "SELECTED";} ?>>Urgent</option>
				  		<option value="Top Urgent" <?php if($r['ket_kain']=="Top Urgent"){echo "SELECTED";} ?>>Top Urgent</option>
				  </select>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>
				  <div class="form-group">
                  <label for="ket" class="col-sm-4 control-label">Keterangan</label>
                  <div class="col-sm-5">					  
						  <select name="ket" class="form-control" id="ket">
							  	<option value="">Pilih</option>
							    <option value="Inspect Biasa" <?php if($r['ket_status']=="Inspect Biasa"){echo "SELECTED";} ?>>Inspect Biasa</option>
							    <option value="Pisah Kain" <?php if($r['ket_status']=="Pisah Kain"){echo "SELECTED";} ?>>Pisah Kain</option>
							  	<option value="Cek Beda Rol + Obras Tailing" <?php if($r['ket_status']=="Cek Beda Rol + Obras Tailing"){echo "SELECTED";} ?>>Cek Beda Rol + Obras Tailing</option>
							  	<option value="Cek Gramasi Tiap Rol" <?php if($r['ket_status']=="Cek Gramasi Tiap Rol"){echo "SELECTED";} ?>>Cek Gramasi Tiap Rol</option>
							    <option value="Cek Bowing" <?php if($r['ket_status']=="Cek Bowing"){echo "SELECTED";} ?>>Cek Bowing</option>
							  	<option value="Perbaikan Grade/Potong Buang" <?php if($r['ket_status']=="Perbaikan Grade/Potong Buang"){echo "SELECTED";} ?>>Perbaikan Grade/Potong Buang</option>
							  	<option value="Tandain Defect" <?php if($r['ket_status']=="Tandain Defect"){echo "SELECTED";} ?>>Tandain Defect</option>
							  	<option value="Cabut/Totol" <?php if($r['ket_status']=="Cabut/Totol"){echo "SELECTED";} ?>>Cabut/Totol</option>
							    <option value="Ukur Repeat Printing" <?php if($r['ket_status']=="Ukur Repeat Printing"){echo "SELECTED";} ?>>Ukur Repeat Printing</option>
							  	<option value="Lukis" <?php if($r['ket_status']=="Lukis"){echo "SELECTED";} ?>>Lukis</option>
							    <option value="Lipat" <?php if($r['ket_status']=="Lipat"){echo "SELECTED";} ?>>Lipat</option>
							    <option value="Perbaikan grade" <?php if($r['ket_status']=="Perbaikan grade"){echo "SELECTED";} ?>>Perbaikan grade</option>
							  	<option value="Inspect Ulang" <?php if($r['ket_status']=="Inspect Ulang"){echo "SELECTED";} ?>>Inspect Ulang</option>					  	
							  	<option value="Packing + Mutasi" <?php if($r['ket_status']=="Packing + Mutasi"){echo "SELECTED";} ?>>Packing + Mutasi</option>
							  	<option value="Packing BS" <?php if($r['ket_status']=="Packing BS"){echo "SELECTED";} ?>>Packing BS</option>
			          </select>
				  </div>
		</div>
				  <div class="form-group">
                  <label for="mc_from" class="col-md-4 control-label">Dari Mesin</label>
                  <div class="col-md-3">
                  <select name="mc_from" class="form-control" id="mc_from">
							  	<option value="">Pilih</option>
							  <?php 
							  $sqlKap=mysqli_query($con,"SELECT no_mesin FROM tbl_mesin ORDER BY no_mesin ASC");
							  while($rK=mysqli_fetch_array($sqlKap)){
							  ?>
								  <option value="<?php echo $rK['no_mesin']; ?>" <?php if($rK['no_mesin']==$r['mc_from']){ echo "SELECTED";}?>><?php echo $rK['no_mesin']; ?></option>
							 <?php } ?>	  
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
