<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE id='$modal_id' ");
while($r=mysqli_fetch_array($modal)){	
?>
          <div class="modal-dialog">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditSTS" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Status NCP</h4>
              </div>
              <div class="modal-body">
              <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">		  
		    
		<div class="form-group">
        <label for="tgl_kembali" class="col-sm-3 control-label">Tgl. Kembali</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tgl_kembali" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php echo $r['tgl_kembali']; ?>"/>
          </div>
        </div>
	  </div>		  
		<div class="form-group">
        <label for="tgl_serah" class="col-sm-3 control-label">Tgl. Serah Terima</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tgl_serah" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php echo $r['tgl_serah']; ?>"/>
          </div>
        </div>
	  </div>

	<div class="form-group">
        <label for="tgl_serah" class="col-sm-3 control-label">Tgl. Selesai/Aktual </label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tgl_selesai" type="text" class="form-control pull-right" id="datepicker2" placeholder="0000-00-00" value="<?php echo $r['tgl_selesai']; ?>"/>
          </div>
        </div>
	  </div>
		<div class="form-group">
				<label for="disposisi" class="col-sm-3 control-label">Verifikasi Mutu</label>
				<div class="col-sm-5">
				<label>
                <input type="checkbox" name="ck1" value="President Director" <?php if($r['ck1']!=""){echo "Checked";}?>>
			    President Director
				</label>
                <label>
                  <input type="checkbox" name="ck2" value="Marketing" <?php if($r['ck2']!=""){echo "Checked";}?>>
				Marketing	
                </label>
                <label>
                  <input type="checkbox" name="ck3" value="Manufacturing Director" <?php if($r['ck3']!=""){echo "Checked";}?>>
				Manufacturing Director	
                </label>
				<label>
                  <input type="checkbox" name="ck4" value="Q.C." onClick="aktif();" <?php if($r['ck4']=="Q.C."){echo "Checked";}?>>
				Q.C.	
                </label>	
				</div>	
              </div>	
		<div class="form-group">
                  <label for="disposisi" class="col-sm-3 control-label">Disposisi/Peninjau</label>
			      <div class="col-sm-5">
                    <input type="text" class="form-control" name="disposisi" value="<?php echo $r['peninjau_akhir']; ?>" placeholder="Kecuali Pejabat QC">
			</div> 
			<div class="col-sm-3">
				  <select name="sts" class="form-control" onChange="aktif();">
					  <option value="Belum OK" <?php if($r['status']=="Belum OK"){echo "SELECTED";}?>>Belum OK</option>
					  <option value="OK" <?php if($r['status']=="OK"){echo "SELECTED";}?>>OK</option>
					  <option value="Cancel" <?php if($r['status']=="Cancel"){echo "SELECTED";}?>>Cancel</option>
            <option value="Disposisi" <?php if($r['status']=="Disposisi"){echo "SELECTED";}?>>Disposisi</option>
				  </select>
			</div>	
		</div>
    <div class="form-group">	
      <label for="disposisiqc" class="col-sm-3 control-label">Disposisi/Peninjau QC</label>
			  <div class="col-sm-6">
					<select name="disposisiqc" class="form-control select2" <?php if($r['ck4']!="Q.C." AND ($r['status']!="Cancel" OR $r['status']!="Disposisi")){ echo "disabled";}else{ echo "enabled"; } ?>>
						<option value="">Pilih</option>
						<option value="Agung C" <?php if($r['disposisiqc']=="Agung C"){echo "SELECTED";}?>>Agung C</option>
						<option value="Agus S" <?php if($r['disposisiqc']=="Agus S"){echo "SELECTED";}?>>Agus S</option>
						<option value="Alimulhakim" <?php if($r['disposisiqc']=="Alimulhakim"){echo "SELECTED";}?>>Alimulhakim</option>
						<option value="Andi W" <?php if($r['disposisiqc']=="Andi W"){echo "SELECTED";}?>>Andi W</option>
						<option value="Arif" <?php if($r['disposisiqc']=="Arif"){echo "SELECTED";}?>>Arif</option>
						<option value="Dewi S" <?php if($r['disposisiqc']=="Dewi S"){echo "SELECTED";}?>>Dewi S</option>
						<option value="Edwin" <?php if($r['disposisiqc']=="Edwin"){echo "SELECTED";}?>>Edwin</option>
						<option value="Ely" <?php if($r['disposisiqc']=="Ely"){echo "SELECTED";}?>>Ely</option>
						<option value="Ferry W" <?php if($r['disposisiqc']=="Ferry W"){echo "SELECTED";}?>>Ferry W</option>
						<option value="Heryanto" <?php if($r['disposisiqc']=="Heryanto"){echo "SELECTED";}?>>Heryanto</option>
						<option value="Janu" <?php if($r['disposisiqc']=="Janu"){echo "SELECTED";}?>>Janu</option>
						<option value="Rudi P" <?php if($r['disposisiqc']=="Rudi P"){echo "SELECTED";}?>>Rudi P</option>
						<option value="Sopian" <?php if($r['disposisiqc']=="Sopian"){echo "SELECTED";}?>>Sopian</option>
						<option value="Taufik R" <?php if($r['disposisiqc']=="Taufik R"){echo "SELECTED";}?>>Taufik R</option>
						<option value="Tri S" <?php if($r['disposisiqc']=="Tri S"){echo "SELECTED";}?>>Tri S</option>
						<option value="Vivik" <?php if($r['disposisiqc']=="Vivik"){echo "SELECTED";}?>>Vivik</option>
					</select>
			  </div> 
		</div>
		<div class="form-group">
                  <label for="catat" class="col-sm-3 control-label">Catatan Verifikator</label>
			      <div class="col-sm-6">
                    <textarea name="catat" class="form-control"><?php echo $r['catat_verify']; ?></textarea>
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
<script>
function aktif(){		
		if(document.forms['modal_popup']['ck4'].checked == true && (document.forms['modal_popup']['sts'].value=="Cancel" || document.forms['modal_popup']['sts'].value=="Disposisi")){
			document.modal_popup.disposisiqc.removeAttribute("disabled");
			document.modal_popup.disposisiqc.setAttribute("required",true);
			document.modal_popup.catat.setAttribute("required",true);
		}else{
			document.modal_popup.disposisiqc.setAttribute("disabled",true);
			document.modal_popup.disposisiqc.removeAttribute("required");
			document.modal_popup.catat.removeAttribute("required");
			
		}
}
</script>
