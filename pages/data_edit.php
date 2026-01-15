<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
    $qryData=sqlsrv_query($con,"SELECT * FROM db_qc.tbl_qcf WHERE id='$modal_id'");
    $rData=sqlsrv_fetch_array($qryData, SQLSRV_FETCH_ASSOC);
    $tgl_fin = $rData['tgl_masuk'];
    if ($tgl_fin instanceof DateTime) {
      $tgl_fin = $tgl_fin->format('Y-m-d');
    }
    $tgl_ins = $rData['tgl_ins'];
    if ($tgl_ins instanceof DateTime) {
      $tgl_ins = $tgl_ins->format('Y-m-d');
    }
    $tgl_pack = $rData['tgl_pack'];
    if ($tgl_pack instanceof DateTime) {
      $tgl_pack = $tgl_pack->format('Y-m-d');
    }
    $tgl_masuk = $rData['tgl_masuk'];
    if ($tgl_masuk instanceof DateTime) {
      $tgl_masuk = $tgl_masuk->format('Y-m-d');
    }
    function format_decimal_2($value) {
      if ($value === null || $value === '') {
        return '0.00';
      }
      if (is_numeric($value)) {
        return number_format((float)$value, 2, '.', '');
      }
      return $value;
    }
?>
<div class="modal-dialog">
  <div class="modal-content">
    <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditData" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Data</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="rol" class="col-sm-3 control-label">Rol</label>
            <div class="col-sm-2">
              <input name="rol" type="text" class="form-control" id="rpl" value="<?php echo $rData['rol'];?>">
            </div>
          </div>
        <div class="form-group">
          <label for="netto" class="col-sm-3 control-label">Netto</label>
          <div class="col-sm-3">
            <div class="input-group">
              <input name="netto" type="text" class="form-control" id="netto" value="<?php echo format_decimal_2($rData['netto']);?>" placeholder="0.00" required style="text-align: right;"><span class="input-group-addon">KG</span></div>
          </div>
        </div>
        <div class="form-group">
          <label for="panjang" class="col-sm-3 control-label">Panjang</label>
          <div class="col-sm-4">
            <div class="input-group">
              <input name="panjang" type="text" class="form-control" id="cns" value="<?php echo $rData['panjang'];?>" placeholder="0" style="text-align: right;">
              <span class="input-group-addon">
                <select name="satuan" style="font-size: 12px;">
                  <option value="Yard" <?php if ($rData['satuan']=="Yard" ) { echo "SELECTED" ; }?>>Yard</option>
                  <option value="Meter" <?php if ($rData['satuan']=="Meter" ) { echo "SELECTED" ; }?>>Meter</option>
                  <option value="PCS" <?php if ($rData['satuan']=="PCS" ) { echo "SELECTED" ; }?>>PCS</option>
                </select>
              </span></div>
          </div>
        </div>
        <div class="form-group">
          <label for="sisa" class="col-sm-3 control-label">Sisa</label>
          <div class="col-sm-3">
            <div class="input-group">
            <input name="sisa" type="text" class="form-control" id="sisa" value="<?php echo format_decimal_2($rData['sisa']);?>" placeholder="0.00" required style="text-align: right;"><span class="input-group-addon">KG</span>
           </div>
          </div>
        </div>
        <div class="form-group">
          <label for="tgl_fin" class="col-sm-3 control-label">Tgl Fin/Tgl Inspek</label>
          <div class="col-sm-4">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="tgl_fin" type="text" class="form-control pull-right" id="datepicker3" placeholder="0000-00-00" value="<?php echo $tgl_fin;?>" />
            </div>
          </div>
          <div class="col-sm-4">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="tgl_inspek" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php echo $tgl_ins;?>" />
            </div>
          </div>
        </div>
        <!--<div class="form-group">
          <label for="tgl_inspek" class="col-sm-3 control-label">Tgl Inspek</label>
         
        </div>-->
        <div class="form-group">
          <label for="tgl_packing" class="col-sm-3 control-label">Tgl Packing/Tgl Masuk</label>
          <div class="col-sm-4">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="tgl_packing" type="text" class="form-control pull-right" id="datepicker2" placeholder="0000-00-00" value="<?php echo $tgl_pack;?>" />
            </div>
          </div>
          <div class="col-sm-4">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="tgl_masuk" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php echo $tgl_masuk;?>" />
            </div>
          </div>
        </div>
        <!--<div class="form-group">
          <label for="tgl_masuk" class="col-sm-3 control-label">Tgl Masuk</label>
          
        </div>-->
        <div class="form-group">
          <label for="masalah" class="col-sm-3 control-label">Masalah</label>
          <div class="col-sm-6">
            <textarea name="masalah" rows="3" class="form-control" id="masalah" placeholder="Masalah"><?php echo $rData['masalah'];?></textarea>
          </div>
        </div>
        <div class="form-group">
            <label for="ket" class="col-sm-3 control-label">Ket</label>
            <div class="col-sm-6">
              <input name="ket" type="text" class="form-control" id="ket" value="<?php echo $rData['ket'];?>">
            </div>
          </div>
        <div class="form-group">
          <label for="sts_nodelay" class="col-sm-3 control-label"></label>		  
            <div class="col-sm-4">
              <input type="checkbox" name="sts_nodelay" id="sts_nodelay" value="1" <?php  if($rData['sts_nodelay']=="1"){ echo "checked";} ?>>  
                <label> Tidak Delay</label>
            </div>
        </div>
        <input type="hidden" id="id" name="id" value="<?php echo $modal_id;?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
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
