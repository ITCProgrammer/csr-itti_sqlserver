<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
		
?>
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">DATA NCP</h4>
              </div>
              <div class="modal-body">
<em><strong>No Registrasi= <?php echo $modal_id; ?>	</strong></em>			  
	  <table class="table table-bordered table-hover table-striped nowrap" id="example1" style="width: 100%; text-align: center;" border="1">
  <tbody >
    <tr class="label-danger">
      <th style="text-align: center" scope="col">Tgl Buat</th>
      <th style="text-align: center" scope="col">No NCP</th>
      <th style="text-align: center" scope="col">Masalah</th>
      <th style="text-align: center" scope="col">Masalah Utama</th>
      <th style="text-align: center" scope="col">DemandNo</th>
      </tr>
	<?php $qCek=mysqli_query($con,"SELECT tgl_buat,no_ncp_gabungan,masalah,masalah_dominan,nodemand FROM tbl_ncp_qcf_now WHERE reg_no='$modal_id'");
					while($dCek=mysqli_fetch_array($qCek)){ ?>  
    <tr>
      <td><?php echo $dCek['tgl_buat']; ?></td>
      <td><?php echo $dCek['no_ncp_gabungan']; ?></td>
      <td style="text-align: left"><?php echo $dCek['masalah']; ?></td>
      <td style="text-align: left"><?php echo $dCek['masalah_dominan']; ?></td>
      <td><?php echo $dCek['nodemand']; ?></td>
      </tr>
	  <?php } ?>
  </tbody>
</table>

	  
		  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
          <?php // } ?>
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
	    $('#example4').DataTable({
	    'paging': false,
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
