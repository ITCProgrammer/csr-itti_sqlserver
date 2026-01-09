<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$modal=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now WHERE id='$modal_id' ");
while($r=mysqli_fetch_array($modal)){	
?>
          <div class="modal-dialog">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditRetur" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Retur</h4>
              </div>
              <script>
                $(document).on("click", ".modal-body", function () {
                $("#datepicker").datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,                                    
                    });
                $("#datepicker1").datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,                                    
                    });
                $("#datepicker2").datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,                                    
                    });
                $("#datepicker3").datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,                                    
                    });
                    });  
            </script>
              <div class="modal-body">
              <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
              <input type="hidden" idnsp="idnsp" name="idnsp" value="<?php echo $r['id_nsp'];?>">
                <div class="form-group">
                    <label for="sjreturplg" class="col-sm-2 control-label">No SJ Retur</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input name="sjreturplg" type="text" class="form-control" id="sjreturplg" value="<?php echo $r['sjreturplg'];?>" placeholder="" style="text-align: right;" >
                            </div>
                        </div>
                        <div class="col-sm-4">					  
                            <div class="input-group date">
                                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                    <input name="tgl_sjretur" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php echo $r['tgl_sjretur'];?>" />
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <label for="tgltrm_sjretur" class="col-sm-2 control-label">Tgl Terima SJ Retur</label>
                        <div class="col-sm-4">					  
                            <div class="input-group date">
                                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                    <input name="tgltrm_sjretur" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php echo $r['tgltrm_sjretur'];?>" />
                            </div>
                        </div>	
                </div>
                <div class="form-group">
                    <label for="sj_itti" class="col-sm-2 control-label">SJ ITTI</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input name="sj_itti" type="text" class="form-control" id="sj_itti" value="<?php echo $r['sj_itti'];?>" placeholder="" style="text-align: right;" >
                            </div>
                        </div>
                        <div class="col-sm-4">					  
                            <div class="input-group date">
                                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                    <input name="tgl_sjitti" type="text" class="form-control pull-right" id="datepicker2" placeholder="0000-00-00" value="<?php echo $r['tgl_sjitti'];?>" />
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <!-- Roll & KG-->
                    <label for="qty" class="col-sm-2 control-label">Quantity</label>
				  	<div class="col-sm-3">
                    	<div class="input-group">
							<input name="roll" type="text" class="form-control" id="roll" value="<?php echo $r['roll'];?>" placeholder="0" style="text-align: right;" >
							<span class="input-group-addon">Roll</span>
						</div>
                  	</div>
					<div class="col-sm-3">
                    	<div class="input-group">
							<input name="kg" type="text" class="form-control" id="kg" value="<?php echo $r['kg'];?>" placeholder="0.00" style="text-align: right;" >
							<span class="input-group-addon">Kg</span> 
						</div>
                  	</div>
					<!-- End Roll & KG -->
					<div class="col-sm-4">
                    	<div class="input-group">  
							<input name="pjg" type="text" class="form-control" id="pjg" value="<?php echo $r['pjg'];?>" placeholder="0.00" style="text-align: right;" >
								<span class="input-group-addon">
									<select name="satuan" style="font-size: 12px;" id="satuan">
										<option value="Yard" <?php if($r['satuan']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
										<option value="Meter" <?php if($r['satuan']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
										<option value="PCS" <?php if($r['satuan']=="PCS"){ echo "SELECTED"; }?>>PCS</option>
							  		</select>
								</span>	
						</div>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="lot" class="col-sm-2 control-label">Qty Timbang Ulang</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input name="qty_tu" type="text" class="form-control" id="qty_tu" value="<?php echo $r['qty_tu'];?>" placeholder="0.00" style="text-align: right;">
                                <span class="input-group-addon">Kg</span>
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <label for="masalah_dominan" class="col-sm-2 control-label">Sub Defect</label>
                        <div class="col-sm-5">
                            <select class="form-control select2" name="masalah_dominan" id="masalah_dominan">
                                <option value="">Pilih</option>
                                <?php 
                                $qrym=mysqli_query($con,"SELECT masalah FROM tbl_masalah_aftersales ORDER BY masalah ASC");
                                while($rm=mysqli_fetch_array($qrym)){
                                ?>
                                <option value="<?php echo $rm['masalah'];?>" <?php if($r['masalah_dominan']==$rm['masalah']){echo "SELECTED";}?>><?php echo $rm['masalah'];?></option>	
                                <?php }?>
                            </select>
                        </div>
		  	    </div>
            <div class="form-group">
                <label for="nodemand_ncp" class="col-sm-2 control-label">No Demand NCP</label>
                  	<div class="col-sm-5">
                    	<select class="form-control select2" name="nodemand_ncp">
							<option value="">Pilih</option>
							<?php $sqlkkncp=mysqli_query($con,"SELECT nodemand FROM tbl_aftersales_now WHERE po='$r[po]' and no_order='$r[no_order]' ORDER BY nodemand");
							while ($rkkncp=mysqli_fetch_array($sqlkkncp)){ ?>
							<option value="<?php echo $rkkncp['nodemand'];?>" <?php if($r['nodemand_ncp']==$rkkncp['nodemand']){echo "SELECTED";}?>><?php echo $rkkncp['nodemand'];?></option>
							<?php } ?>
						</select>
                  	</div>
            </div>
			<div class="form-group">
				<label for="nodemand_akj" class="col-sm-2 control-label">No Demand AKJ</label>
					<div class="col-sm-5">
						<input name="nodemand_akj" type="text" class="form-control" id="nodemand_akj" value="<?php echo $r['nodemand_akj'];?>" placeholder="No Demand AKJ">
                  	</div>
			</div>
                <div class="form-group">
                    <label for="masalah" class="col-sm-2 control-label">Masalah</label>
                        <div class="col-sm-8">
                            <textarea name="masalah" rows="2" class="form-control" id="masalah" placeholder="Masalah"><?php echo $r['masalah']; ?></textarea>
                        </div>				   
			    </div>
                <div class="form-group">
                    <label for="ket" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea name="ket" rows="3" class="form-control" id="ket" placeholder="Keterangan"><?php echo $r['ket']; ?></textarea>
                        </div>				   
			    </div>
                <div class="form-group">
                    <label for="tgl_keputusan" class="col-sm-2 control-label">Tgl Keputusan</label>
                        <div class="col-sm-4">					  
                            <div class="input-group date">
                                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                    <input name="tgl_keputusan" type="text" class="form-control pull-right" id="datepicker3" placeholder="0000-00-00" value="<?php echo $r['tgl_keputusan'];?>" />
                            </div>
                        </div>
                </div>		  
                <div class="form-group">
					<label for="t_jawab" class="col-sm-2 control-label">Dept. Tanggung Jawab 1</label>
                    <div class="col-sm-5">
                        <select class="form-control select2" name="t_jawab">
                        <option value="">Pilih</option>
                            <?php 
                            // Ambil data dept dari filter_dept
                            $qryDept = mysqli_query($con, "SELECT * FROM filter_dept");
                            while($dept = mysqli_fetch_array($qryDept)){
                                // Ambil value t_jawab dari tbl_detail_retur_now (sudah ada di $r)
                                $selected = ($r['t_jawab'] == $dept['nama']) ? "SELECTED" : "";
                            ?>
                            <option value="<?php echo $dept['nama'];?>" <?php echo $selected; ?>><?php echo $dept['nama'];?></option>
                            <?php } ?>
                        </select>
                    </div>
			    </div>
                <div class="form-group">
                    <label for="t_jawab1" class="col-sm-2 control-label">Dept. Tanggung Jawab 2</label>
                    <div class="col-sm-5">
                        <select class="form-control select2" name="t_jawab1">
                        <option value="">Pilih</option>
                            <?php 
                            // Ambil data dept dari filter_dept
                            $qryDept1 = mysqli_query($con, "SELECT * FROM filter_dept");
                            while($dept1 = mysqli_fetch_array($qryDept1)){
                                // Ambil value t_jawab1 dari tbl_detail_retur_now (sudah ada di $r)
                                $selected = ($r['t_jawab1'] == $dept1['nama']) ? "SELECTED" : "";
                            ?>
                            <option value="<?php echo $dept1['nama'];?>" <?php echo $selected; ?>><?php echo $dept1['nama'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="t_jawab2" class="col-sm-2 control-label">Dept. Tanggung Jawab 3</label>
                    <div class="col-sm-5">
                        <select class="form-control select2" name="t_jawab2">
                        <option value="">Pilih</option>
                            <?php 
                            // Ambil data dept dari filter_dept
                            $qryDept2 = mysqli_query($con, "SELECT * FROM filter_dept");
                            while($dept2 = mysqli_fetch_array($qryDept2)){
                                // Ambil value t_jawab2 dari tbl_detail_retur_now (sudah ada di $r)
                                $selected = ($r['t_jawab2'] == $dept2['nama']) ? "SELECTED" : "";
                            ?>
                            <option value="<?php echo $dept2['nama'];?>" <?php echo $selected; ?>><?php echo $dept2['nama'];?></option>
                            <?php } ?>
                        </select>
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