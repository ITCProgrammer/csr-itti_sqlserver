<?php
ini_set("error_reporting", 1);

session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];


	

	$modal=mysqli_query($con,"SELECT * FROM tbl_ganti_kain_now WHERE id='$modal_id' ");
while($r=mysqli_fetch_array($modal)){	
?>
          <div class="modal-dialogxxx">
            <div class="modal-content">
            <form class="form-horizontal"  data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Bon</h4>
              </div>
              <div class="modal-body">
              <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
              <input type="hidden" idnsp="idnsp" name="idnsp" value="<?php echo $r['id_nsp'];?>">
		<div class="form-group">
            <label for="penyebab" class="col-sm-3 control-label">Penyebab</label>
                <?php 
                  $dtArr=$r['sebab'];
                  $data = explode(",",$dtArr);
                ?>
			      <div class="col-sm-8">
            <div class="form-group">
              <label><input type="checkbox" class="minimal" name="penyebab[]" value="Man" <?php if(in_array("Man",$data)){echo "checked";} ?>> Man &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
              </label>
              <label><input type="checkbox" class="minimal" name="penyebab[]" value="Methode" <?php if(in_array("Methode",$data)){echo "checked";} ?>> Methode &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
              </label>
              <label><input type="checkbox" class="minimal" name="penyebab[]" value="Machine" <?php if(in_array("Machine",$data)){echo "checked";} ?>> Machine 
              </label>
            </div>
            <div class="form-group">
              <label><input type="checkbox" class="minimal" name="penyebab[]" value="Material" <?php if(in_array("Material",$data)){echo "checked";} ?>> Material &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              </label>
              <label><input type="checkbox" class="minimal" name="penyebab[]" value="Environment" <?php if(in_array("Environment",$data)){echo "checked";} ?>> Environment
              </label>
              </label>
            </div>
            <!--<div class="input-group">
              <select class="form-control select2" multiple="multiple" data-placeholder=" Masalah" name="penyebab[]" style="width: 100%;">
                  <?php 
                  $dtArr=$r['sebab'];
                  $data = explode(",",$dtArr);
                  ?>
                <option value="Man" <?php if(in_array("Man",$data)){echo "SELECTED";} ?>>Man</option>
                <option value="Methode" <?php if(in_array("Methode",$data)){echo "SELECTED";} ?>>Methode</option>
                <option value="Machine" <?php if(in_array("Machine",$data)){echo "SELECTED";} ?>>Machine</option>
                <option value="Material" <?php if(in_array("Material",$data)){echo "SELECTED";} ?>>Material</option>
                <option value="Environment" <?php if(in_array("Environment",$data)){echo "SELECTED";} ?>>Environment</option>	  
              </select>
            </div>-->
			</div>  
		</div>		  
		<div class="form-group">
                  <label for="analisa" class="col-sm-3 control-label">Analisa</label>
			      <div class="col-sm-6">
                    <textarea name="analisa" class="form-control"><?php echo $r['analisa']; ?></textarea>
			</div>  
		</div>		  
		<div class="form-group">
                  <label for="pencegahan" class="col-sm-3 control-label">Pencegahan</label>
			      <div class="col-sm-6">
                    <textarea name="pencegahan" class="form-control"><?php echo $r['pencegahan']; ?></textarea>
			</div>		  
              </div>
      <div class="form-group">
        <label for="kg1" class="col-sm-3 control-label">Qty Nego</label>
        <div class="col-sm-4">
          <div class="input-group">
							<input name="kg1" type="text" class="form-control" id="kg1" value="<?php echo $r['kg1']; ?>" placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">Kg</span>	
					</div>
        </div>  
        <div class="col-sm-4">
          <div class="input-group">  
							<input name="pjg1" type="text" class="form-control" id="pjg1" value="<?php echo $r['pjg1']; ?>" placeholder="0.00" style="text-align: right;">
								<span class="input-group-addon">
									<select name="satuan1" style="font-size: 12px;" id="satuan1">
										<option value="Yard" <?php if($r['satuan1']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
										<option value="Meter" <?php if($r['satuan1']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
										<option value="PCS" <?php if($r['satuan1']=="PCS"){ echo "SELECTED"; }?>>PCS</option>
                    <option value="<?php echo $r['satuan1'];?>" <?php if($r['satuan1']!=""){ echo "SELECTED"; }?>><?php echo $r['satuan1'];?></option>
							  		</select>
								</span>	
					</div>
        </div>
		  </div>
      <div class="form-group">
        <label for="qty_email" class="col-sm-3 control-label">Qty Email</label>
        <div class="col-sm-4">
          <div class="input-group">
							<input name="qty_email" type="text" class="form-control" id="qty_email" value="<?php echo $r['qty_email']; ?>" placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">Kg</span>	
					</div>
        </div>  
        <div class="col-sm-4">
          <div class="input-group">  
							<input name="pjg_email" type="text" class="form-control" id="pjg_email" value="<?php echo $r['pjg_email']; ?>" placeholder="0.00" style="text-align: right;">
								<span class="input-group-addon">
									<select name="satuan_email" style="font-size: 12px;" id="satuan_email">
										<option value="Yard" <?php if($r['satuan_email']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
										<option value="Meter" <?php if($r['satuan_email']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
										<option value="PCS" <?php if($r['satuan_email']=="PCS"){ echo "SELECTED"; }?>>PCS</option>
                    <option value="<?php echo $r['satuan_email'];?>" <?php if($r['satuan_email']!=""){ echo "SELECTED"; }?>><?php echo $r['satuan_email'];?></option>
							  		</select>
								</span>	
					</div>
        </div>
		  </div>
      <div class="form-group">
        <label for="masalah" class="col-sm-3 control-label">Masalah</label>
        <div class="col-sm-8">
						<input name="masalah" type="text" class="form-control" id="masalah" value="<?php echo $r['masalah']; ?>" placeholder="">
        </div>  
      </div>
      <div class="form-group">
		  		<label for="sub_defect" class="col-sm-3 control-label">Sub Defect</label>
		 			<div class="col-sm-5">
						<select class="form-control select2" name="sub_defect" id="sub_defect">
							<option value="">Pilih</option>
							<?php 
							$qrym=mysqli_query($con,"SELECT masalah FROM tbl_masalah_aftersales ORDER BY masalah ASC");
							while($rm=mysqli_fetch_array($qrym)){
							?>
							<option value="<?php echo $rm['masalah'];?>" <?php if($r['sub_defect']==$rm['masalah']){echo "SELECTED";}?>><?php echo $rm['masalah'];?></option>	
							<?php }?>
						</select>
		 	 		</div>
		  	</div>
        <div class="form-group">
		  		<label for="sub_defect" class="col-sm-3 control-label">Solusi</label>
		 			<div class="col-sm-5">
						<select class="form-control select2" name="solusi" id="solusi">
							<option value="">Pilih</option>
							<?php
							$qrys = mysqli_query($con, "SELECT solusi FROM tbl_solusi ORDER BY solusi ASC");
							while ($rs = mysqli_fetch_array($qrys)) {
								?>
								<option value="<?php echo $rs['solusi']; ?>" <?php if ($r['solusi'] == $rs['solusi']) {
										echo "SELECTED";
									} ?>>
									<?php echo $rs['solusi']; ?>
								</option>
							<?php } ?>
						</select>
		 	 		</div>
		  	</div>
      <div class="form-group">
		  <label for="tangggung_jawab" class="col-sm-3 control-label">Tanggung Jawab 1</label>
        <div class="col-sm-4">
        <select class="form-control select2" name="t_jawab">
          <option value="">Pilih</option>
          <?php 
          $qryDept = mysqli_query($con, "SELECT * FROM filter_dept");
          while($dept = mysqli_fetch_array($qryDept)){
          ?>
          <option value="<?php echo $dept['nama'];?>" <?php if($r['t_jawab'] == $dept['nama']){echo "SELECTED";}?>><?php echo $dept['nama'];?></option>
          <?php } ?>
        </select>
        </div>
		  <div class="col-sm-3">
                    <div class="input-group">  
					<input name="persen" type="text" class="form-control" id="persen" value="<?php echo $r['persen']; ?>" placeholder="0" style="text-align: right;">
					<span class="input-group-addon">%</span>	
					</div>
                  </div>	
		  </div>
		<div class="form-group">
		  <label for="tangggung_jawab" class="col-sm-3 control-label">Tanggung Jawab 2</label>		  
        <div class="col-sm-4">
        <select class="form-control select2" name="t_jawab1">
          <option value="">Pilih</option>
          <?php 
          $qryDept1 = mysqli_query($con, "SELECT * FROM filter_dept");
          while($dept1 = mysqli_fetch_array($qryDept1)){
          ?>
          <option value="<?php echo $dept1['nama'];?>" <?php if($r['t_jawab1'] == $dept1['nama']){echo "SELECTED";}?>><?php echo $dept1['nama'];?></option>
          <?php } ?>
        </select>
        </div>
		  <div class="col-sm-3">
                    <div class="input-group">  
					<input name="persen1" type="text" class="form-control" id="persen1" value="<?php echo $r['persen1']; ?>" placeholder="0" style="text-align: right;">
					<span class="input-group-addon">%</span>	
					</div>
                  </div>	
		  </div>  
		<div class="form-group">
		  <label for="tangggung_jawab" class="col-sm-3 control-label">Tanggung Jawab 3</label>		  
        <div class="col-sm-4">
        <select class="form-control select2" name="t_jawab2">
          <option value="">Pilih</option>
          <?php 
          $qryDept2 = mysqli_query($con, "SELECT * FROM filter_dept");
          while($dept2 = mysqli_fetch_array($qryDept2)){
          ?>
          <option value="<?php echo $dept2['nama'];?>" <?php if($r['t_jawab2'] == $dept2['nama']){echo "SELECTED";}?>><?php echo $dept2['nama'];?></option>
          <?php } ?>
        </select>
        </div>
		  		<div class="col-sm-3">
                    <div class="input-group">  
					<input name="persen2" type="text" class="form-control" id="persen2" value="<?php echo $r['persen2']; ?>" placeholder="0" style="text-align: right;">
					<span class="input-group-addon">%</span>	
					</div>
                  </div>	
		  </div>
      <!--<div class="form-group">
        <label for="kg2" class="col-sm-3 control-label">KG 2</label>
        <div class="col-sm-4">
          <div class="input-group">
							<input name="kg2" type="text" class="form-control" id="kg2" value="<?php echo $r['kg2']; ?>" placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">Kg</span>	
					</div>
        </div>
        <div class="col-sm-4">
          <div class="input-group">  
							<input name="pjg2" type="text" class="form-control" id="pjg2" value="<?php echo $r['pjg2']; ?>" placeholder="0.00" style="text-align: right;">
								<span class="input-group-addon">
									<select name="satuan2" style="font-size: 12px;" id="satuan2">
										<option value="Yard" <?php if($r['satuan2']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
										<option value="Meter" <?php if($r['satuan2']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
										<option value="PCS" <?php if($r['satuan2']=="PCS"){ echo "SELECTED"; }?>>PCS</option>
                    <option value="<?php echo $r['satuan2'];?>" <?php if($r['satuan2']!=""){ echo "SELECTED"; }?>><?php echo $r['satuan2'];?></option>
							  		</select>
								</span>	
					</div>
        </div>  
		  </div>
      <div class="form-group">
        <label for="kg3" class="col-sm-3 control-label">KG 3</label>
        <div class="col-sm-4">
          <div class="input-group">
							<input name="kg3" type="text" class="form-control" id="kg3" value="<?php echo $r['kg3']; ?>" placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">Kg</span>	
					</div>
        </div>
        <div class="col-sm-4">
          <div class="input-group">  
							<input name="pjg3" type="text" class="form-control" id="pjg3" value="<?php echo $r['pjg3']; ?>" placeholder="0.00" style="text-align: right;">
								<span class="input-group-addon">
									<select name="satuan3" style="font-size: 12px;" id="satuan3">
										<option value="Yard" <?php if($r['satuan3']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
										<option value="Meter" <?php if($r['satuan3']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
										<option value="PCS" <?php if($r['satuan3']=="PCS"){ echo "SELECTED"; }?>>PCS</option>
                    <option value="<?php echo $r['satuan3'];?>" <?php if($r['satuan3']!=""){ echo "SELECTED"; }?>><?php echo $r['satuan3'];?></option>
							  		</select>
								</span>	
					</div>
        </div>  
		  </div>-->
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="save"  value="Save">
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
          <?php } ?>

<?php 
if ($_POST) {

extract($_POST);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $analisa =mysqli_real_escape_string($con,$_POST['analisa']);
  $pencegahan =mysqli_real_escape_string($con,$_POST['pencegahan']);
  $kg1 =mysqli_real_escape_string($con,$_POST['kg1']);
  $kg2 =mysqli_real_escape_string($con,$_POST['kg2']);
  $kg3 =mysqli_real_escape_string($con,$_POST['kg3']);
  $pjg1 =mysqli_real_escape_string($con,$_POST['pjg1']);
  $pjg2 =mysqli_real_escape_string($con,$_POST['pjg2']);
  $pjg3 =mysqli_real_escape_string($con,$_POST['pjg3']);
  $satuan1 =mysqli_real_escape_string($con,$_POST['satuan1']);
  $satuan2 =mysqli_real_escape_string($con,$_POST['satuan2']);
  $satuan3 =mysqli_real_escape_string($con,$_POST['satuan3']);
  $tjawab =mysqli_real_escape_string($con,$_POST['t_jawab']);
  $tjawab1 =mysqli_real_escape_string($con,$_POST['t_jawab1']);
  $tjawab2 =mysqli_real_escape_string($con,$_POST['t_jawab2']);
  $persen =mysqli_real_escape_string($con,$_POST['persen']);
  $persen1 =mysqli_real_escape_string($con,$_POST['persen1']);
  $persen2 =mysqli_real_escape_string($con,$_POST['persen2']);
  $qty_email =mysqli_real_escape_string($con,$_POST['qty_email']);
  $pjg_email =mysqli_real_escape_string($con,$_POST['pjg_email']);
  $satuan_email =mysqli_real_escape_string($con,$_POST['satuan_email']);
  $masalah= mysqli_real_escape_string($con,$_POST['masalah']);
  $sub_defect= mysqli_real_escape_string($con,$_POST['sub_defect']);
  $solusi= mysqli_real_escape_string($con,$_POST['solusi']);
  $checkbox1=$_POST['penyebab'];
  $chkp="";
    foreach($checkbox1 as $chk1)  
   		  {  
      		$chkp .= $chk1.",";  
        }
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_ganti_kain_now` SET
		    `analisa`='$analisa',
        `pencegahan`='$pencegahan',
        `kg1`='$kg1',
        `kg2`='$kg2',
        `kg3`='$kg3',
        `pjg1`='$pjg1',
        `pjg2`='$pjg2',
        `pjg3`='$pjg3',
        `satuan1`='$satuan1',
        `satuan2`='$satuan2',
        `satuan3`='$satuan3',
        `t_jawab`='$tjawab',
        `t_jawab1`='$tjawab1',
        `t_jawab2`='$tjawab2',
        `persen`='$persen',
        `persen1`='$persen1',
        `persen2`='$persen2',
        `qty_email`='$qty_email',
        `pjg_email`='$pjg_email',
        `satuan_email`='$satuan_email',
        `masalah`='$masalah',
        `sub_defect`='$sub_defect',
        solusi = '$solusi',
        `sebab`='$chkp'
				WHERE `id`='$id' LIMIT 1");	


echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Berhasil diupdate',
  type: 'success',
  }).then((result) => {
  if (result.value) {
	 window.location.href='TambahBon-$_POST[idnsp]';
	 
  }
});</script>";
}
 ?>
