<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM tbl_lkpp WHERE id='$modal_id' ");
while($r=mysqli_fetch_array($modal)){	
?>
          <div class="modal-dialog">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditLKPP" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit LKPP</h4>
              </div>
              <script>
                $(document).on("click", ".modal-body", function () {
                    $("#datepicker4").datepicker({
                        autoclose: true,
                        format: 'yyyy-mm-dd',
                        todayHighlight: true,                                    
                    });
                    $("#datepicker5").datepicker({
                        autoclose: true,
                        format: 'yyyy-mm-dd',
                        todayHighlight: true,                                    
                    });
                });  
            </script>
              <div class="modal-body">
              <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
                <div class="form-group">
                    <label for="nm_prshn" class="col-sm-3 control-label">Nama Perusahaan</label>
                        <div class="col-sm-6">
                            <input name="nm_prshn" type="text" class="form-control" id="nm_prshn" value="<?php echo $r['nm_prshn'];?>" placeholder="">
                        </div>
                </div>
                <div class="form-group">
                    <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-6">
                            <input name="alamat" type="text" class="form-control" id="alamat" value="<?php echo $r['alamat'];?>" placeholder="">
                        </div>
                </div>
                <div class="form-group">
                    <label for="pejabat" class="col-sm-3 control-label">Pejabat yang ditemui</label>
                        <div class="col-sm-6">
                            <input name="pejabat" type="text" class="form-control" id="pejabat" value="<?php echo $r['pejabat'];?>" placeholder="">
                        </div>
                </div>
                <div class="form-group">
                    <label for="petugas" class="col-sm-3 control-label">Petugas</label>
                        <div class="col-sm-6">
                            <input name="petugas" type="text" class="form-control" id="petugas" value="<?php echo $r['petugas'];?>" placeholder="">
                        </div>
                </div>
                <div class="form-group">
                    <label for="jenis_kunjungan" class="col-sm-3 control-label">Jenis Kunjungan</label>
                        <div class="col-sm-6">
                            <select class="form-control select2" name="jenis_kunjungan">
                                <option value="">Pilih</option>
                                <option <?php if($r['jenis_kunjungan']=="Rutin"){?> selected=selected <?php };?>value="Rutin">Rutin</option>	
                                <option <?php if($r['jenis_kunjungan']=="Calon Pelanggan Baru"){?> selected=selected <?php };?>value="Calon Pelanggan Baru">Calon Pelanggan Baru</option>
                                <option <?php if($r['jenis_kunjungan']=="Keluhan Pelanggan"){?> selected=selected <?php };?>value="Keluhan Pelanggan">Keluhan Pelanggan</option>
                                <option <?php if($r['jenis_kunjungan']=="Permintaan Pelanggan"){?> selected=selected <?php };?>value="Permintaan Pelanggan">Permintaan Pelanggan</option>
                            </select>
                        </div>
                </div>
                <div class="form-group">
                    <label for="tgl_kunjungan" class="col-sm-3 control-label">Tgl Kunjungan</label>
                        <div class="col-sm-4">					  
                            <div class="input-group date">
                                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                    <input name="tgl_kunjungan" type="text" class="form-control pull-right" id="datepicker4" placeholder="0000-00-00" value="<?php echo $r['tgl_kunjungan'];?>" />
                            </div>
                        </div>	
                        <div class="col-sm-4">					  
                            <div class="input-group date">
                                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                    <input name="tgl_kunjungan2" type="text" class="form-control pull-right" id="datepicker5" placeholder="0000-00-00" value="<?php echo $r['tgl_kunjungan2'];?>" />
                            </div>
                        </div>	
                </div>
                <div class="form-group">
                    <label for="tujuan_kunjungan" class="col-sm-3 control-label">Tujuan Kunjungan</label>
                        <div class="col-sm-6">
                            <input name="tujuan_kunjungan" type="text" class="form-control" id="tujuan_kunjungan" value="<?php echo $r['tujuan_kunjungan'];?>" placeholder="">
                        </div>
                </div>
                <div class="form-group">
                    <label for="ket" class="col-sm-3 control-label">Keterangan</label>
			            <div class="col-sm-6">
                            <textarea name="ket" class="form-control"><?php echo $r['ket']; ?></textarea>
			            </div>		  
                </div>
                <div class="form-group">
		            <label for="sts_korelasi" class="col-sm-3 control-label"></label>		  
                        <div class="col-sm-4">
                            <input type="checkbox" name="sts_korelasi" id="sts_korelasi" value="1" <?php  if($r['sts_korelasi']=="1"){ echo "checked";} ?>>  
                            <label> Korelasi</label>
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
	$(function () {
    //Initialize Select2 Elements
	$('.select2').select2();
	}
	?>