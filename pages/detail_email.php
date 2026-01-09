<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
    $qryData=mysqli_query($con,"SELECT * FROM tbl_email_bon WHERE id='$modal_id'");
    $rData=mysqli_fetch_array($qryData);

?>
<div class="modal-dialog" style="width: 80%">
  <div class="modal-content">
    <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditData" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail Email</h4>
      </div>
      <div class="modal-body">
                  
          <?php echo $rData['isi'];?>
        
      </div>
      
    </form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<script>
  //Date picker
  $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    }),
    //Date picker
    $('#datepicker1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    }),
    //Date picker
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    }),
    //Date picker
    $('#datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

</script>
