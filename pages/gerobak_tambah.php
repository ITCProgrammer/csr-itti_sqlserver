<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM `tbl_schedule` WHERE id='$modal_id' ");
while($r=mysqli_fetch_array($modal)){
	$cek=mysqli_query($con,"SELECT * FROM `tbl_gerobak` WHERE id_schedule='$r[id]'");
	$rcek=mysqli_fetch_array($cek);
?>
         
<div class="modal-dialog modal1">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="TambahGerobak" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Identifikasi Produk</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
				  <input type="hidden" id="no_order" name="no_order" value="<?php echo $r['no_order'];?>">
				  <input type="hidden" id="jenis_kain" name="jenis_kain" value="<?php echo $r['jenis_kain'];?>">
				  <input type="hidden" id="warna" name="warna" value="<?php echo $r['warna'];?>">
				  <input type="hidden" id="lot" name="lot" value="<?php echo $r['lot'];?>">
				  <input type="hidden" id="id_schedule" name="id_schedule" value="<?php echo $rcek['id'];?>">
                  <div class="form-group">
                  <label for="kd_sts" class="col-md-4 control-label">Kode Status</label>					  
                  <div class="col-md-4">
                  <select name="kd_sts" class="form-control">
							  	<option value="">Pilih</option>
					  			<option value="DYEB 01" <?php if($rcek['kd_status']=="DYEB 01"){echo "SELECTED";}?>>DYEB 01</option>
							    <option value="QCFE 02" <?php if($rcek['kd_status']=="QCFE 02"){echo "SELECTED";}?>>QCFE 02</option>
					  			<option value="QCFE 03" <?php if($rcek['kd_status']=="QCFE 03"){echo "SELECTED";}?>>QCFE 03</option>
					  </select>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>
				  <div class="form-group">
                  <label for="sts_pro" class="col-md-4 control-label">Status Produk</label>					  
                  <div class="col-md-4">
                  <select name="sts_pro" class="form-control">
							  	<option value="">Pilih</option>
							    <option value="1" <?php if($rcek['status_produk']=="1"){echo "SELECTED";}?>>SIAP TEST QUALITY</option>
					  			<option value="2" <?php if($rcek['status_produk']=="2"){echo "SELECTED";}?>>TAHAN KARTU KERJA</option>
					  			<option value="3" <?php if($rcek['status_produk']=="3"){echo "SELECTED";}?>>PROSES INSPEK LANJUT</option>
					  </select>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>
				  <div class="form-group">
                  <label for="catatan" class="col-md-4 control-label">Catatan</label>
                  <div class="col-sm-8">		  
				  <textarea name="catatan" class="form-control" id="catatan" placeholder="catatan..."><?php echo $rcek['catatan'];?></textarea>
				  <span class="help-block with-errors"></span>	  
				  </div>			  
					  
		</div>
				  <div class="form-group">
                  <label for="mc_from" class="col-md-4 control-label">No Gerobak</label>
                  <div class="col-md-3">
                  <input class="form-control" name="gerobak1" value="<?php echo $rcek['no_gerobak1'];?>" placeholder="gerobak 1">
                  <span class="help-block with-errors"></span>
                  </div>
				  <div class="col-md-3">
                  <input class="form-control" name="gerobak2" value="<?php echo $rcek['no_gerobak2'];?>" placeholder="gerobak 2" <?php if($rcek['no_gerobak1']==""){ echo "readonly"; }?>>
                  <span class="help-block with-errors"></span>
                  </div>	  
                  </div>
				  <?php if($rcek['no_gerobak2']!=""){ ?>
				  <div class="form-group">
                  <label for="mc_from" class="col-md-4 control-label">No Gerobak</label>
                  <div class="col-md-3">
                  <input class="form-control" name="gerobak3" value="<?php echo $rcek['no_gerobak3'];?>" placeholder="gerobak 3">
                  <span class="help-block with-errors"></span>
                  </div>
				  <div class="col-md-3">
                  <input class="form-control" name="gerobak4" value="<?php echo $rcek['no_gerobak4'];?>" placeholder="gerobak 4" <?php if($rcek['no_gerobak3']==""){ echo "readonly"; }?>>
                  <span class="help-block with-errors"></span>
                  </div>	  
                  </div>
				  <?php } ?>
				  <?php if($rcek['no_gerobak4']!=""){ ?>
				  <div class="form-group">
                  <label for="mc_from" class="col-md-4 control-label">No Gerobak</label>
                  <div class="col-md-3">
                  <input class="form-control" name="gerobak5" value="<?php echo $rcek['no_gerobak5'];?>" placeholder="gerobak 5">
                  <span class="help-block with-errors"></span>
                  </div>
				  <div class="col-md-3">
                  <input class="form-control" name="gerobak6" value="<?php echo $rcek['no_gerobak6'];?>" placeholder="gerobak 6" <?php if($rcek['no_gerobak5']==""){ echo "readonly"; }?>>
                  <span class="help-block with-errors"></span>
                  </div>	  
                  </div>
				  <?php } ?>
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
