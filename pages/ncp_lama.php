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
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditNCPLama" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah NCP Lama</h4>
              </div>
              <div class="modal-body">
              <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">	
		<div class="form-group">
        <label for="tgl_buat" class="col-sm-4 control-label">Tgl. Buat</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tgl_buat" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value=""/>
          </div>
        </div>
	  </div>				  
		<div class="form-group">
        <label for="tgl_buat" class="col-sm-4 control-label">Tempat Kain Diletakkan</label>
        <div class="col-sm-4">
          <input name="tempat" type="text" class="form-control pull-right" id="tempat" placeholder="Tempat" value=""/>
        </div>
	  </div>		  
              </div>
		<?php 
		$sql=mysqli_query($con,"SELECT COUNT(*) jml,tgl_terima FROM `tbl_qcf_ncp_tolak` WHERE id_qcf_ncp='$modal_id' ORDER BY id DESC");
		$r1=mysqli_fetch_array($sql);
		if($r1['tgl_terima']=="" and $r1['jml']>0){							
		?>		
		<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Perhatian</h4>
                No NCP <?php echo $r['no_ncp']; ?> Belum Selesai Proses.
        </div>	
		<?php } ?>		
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
