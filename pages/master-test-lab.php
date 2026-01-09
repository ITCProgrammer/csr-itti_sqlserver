<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
$buyer	= isset($_POST['buyer']) ? $_POST['buyer'] : '';
$qcek=mysqli_query($con,"SELECT * FROM tbl_masterbuyerlab_test WHERE buyer='$buyer'");
$cek=mysqli_fetch_array($qcek);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
<div class="row">
    <div class="col-md-12">	
 			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Master Test Buyer</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body"> 
					<div class="col-md-10">
							<div class="form-group">
								<label for="buyer" class="col-sm-2 control-label">Buyer</label>
									<div class="col-sm-3">
										<input name="buyer" type="text" style="text-transform:uppercase" class="form-control" id="buyer" placeholder="Buyer" <?php if($buyer!=""){echo "readonly";} ?>
										value="<?php echo $buyer; ?>" required>
									</div>
								<?php if($_POST['buyer']!=""){?>
								<label for="approve" class="col-sm-2 control-label">Approved By</label>
									<!--<div class="col-sm-3">
										<input name="approve" type="text" class="form-control" id="approve" placeholder="" value="<?php echo $cek['approve'];?>" <?php if($cek['approve']!=""){echo "readonly";} ?>>
									</div>-->
									<div class="col-sm-3">
										<select name="approve" class="form-control select2"> 
											<option value="" <?php if($cek['approve']==""){ echo "SELECTED";}?>>Pilih</option>
											<option value="Edwin Ismunandar" <?php if($cek['approve']=="Edwin Ismunandar"){ echo "SELECTED";}?>>Edwin Ismunandar</option>
											<option value="Ferry Wibowo" <?php if($cek['approve']=="Ferry Wibowo"){ echo "SELECTED";}?>>Ferry Wibowo</option>
											<option value="Janu Dwi Laksono" <?php if($cek['approve']=="Janu Dwi Laksono"){ echo "SELECTED";}?>>Janu Dwi Laksono</option>
											<option value="Taufik Restiardi" <?php if($cek['approve']=="Taufik Restiardi"){ echo "SELECTED";}?>>Taufik Restiardi</option>
											<option value="Tri Setiawan" <?php if($cek['approve']=="Tri Setiawan"){ echo "SELECTED";}?>>Tri Setiawan</option>
											<option value="Vivik Kurniawati" <?php if($cek['approve']=="Vivik Kurniawati"){ echo "SELECTED";}?>>Vivik Kurniawati</option>
										</select>
            						</div>
								<?php }?>				   
							</div>
					</div>
					<?php if($_POST['buyer']!=""){?>
					<div class="col-md-12">
						<?php
						$qMB=mysqli_query($con,"SELECT * FROM tbl_masterbuyerlab_test WHERE buyer='$buyer'");
						$cekMB=mysqli_num_rows($qMB);
									
						if($cekMB>0){
							while($dMB=mysqli_fetch_array($qMB)){
							$detail=explode(",",$dMB['physical']);
							$detail1=explode(",",$dMB['functional']);
							$detail2=explode(",",$dMB['colorfastness']);
						?>
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
							<br>							
							<div class="form-group">
								<span class='badge bg-blue'><label for="colorfastness" class="col-sm-2">COLORFASTNESS</label></span>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WASHING" <?php if(in_array("WASHING",$detail2)){echo "checked";} ?>> Washing Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ACID" <?php if(in_array("PERSPIRATION ACID",$detail2)){echo "checked";} ?>> Perpiration Fastness Acid &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ALKALINE" <?php if(in_array("PERSPIRATION ALKALINE",$detail2)){echo "checked";} ?>> Perpiration Fastness Alkaline
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WATER" <?php if(in_array("WATER",$detail2)){echo "checked";} ?>> Water Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="CROCKING" <?php if(in_array("CROCKING",$detail2)){echo "checked";} ?>> Crocking Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PHENOLIC YELLOWING" <?php if(in_array("PHENOLIC YELLOWING",$detail2)){echo "checked";} ?>> Phenolic Yellowing 
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT" <?php if(in_array("LIGHT",$detail2)){echo "checked";} ?>> Light Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION-OVEN TEST" <?php if(in_array("COLOR MIGRATION-OVEN TEST",$detail2)){echo "checked";} ?>> Color Migration - Oven Test &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION" <?php if(in_array("COLOR MIGRATION",$detail2)){echo "checked";} ?>> Color Migration Fastness
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT PERSPIRATION" <?php if(in_array("LIGHT PERSPIRATION",$detail2)){echo "checked";} ?>> Light Perspiration &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SALIVA" <?php if(in_array("SALIVA",$detail2)){echo "checked";} ?>> Saliva Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="BLEEDING" <?php if(in_array("BLEEDING",$detail2)){echo "checked";} ?>> Bleeding 
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="CHLORIN & NON-CHLORIN" <?php if(in_array("CHLORIN & NON-CHLORIN",$detail2)){echo "checked";} ?>> Chlorin &amp; Non-Chlorin &nbsp; &nbsp; &nbsp; &nbsp; 
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="DYE TRANSFER" <?php if(in_array("DYE TRANSFER",$detail2)){echo "checked";} ?>> Dye Transfer &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SWEAT CONCEAL" <?php if(in_array("SWEAT CONCEAL",$detail2)){echo "checked";} ?>> Sweat Conceal &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
							</div>
							<?php } ?>
						</form>
								
							<?php }else{ ?>
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
							<div class="form-group">
								<span class='badge bg-blue'><label for="colorfastness" class="col-sm-2">COLORFASTNESS</label></span>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WASHING"> Washing Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ACID"> Perpiration Fastness Acid &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ALKALINE"> Perpiration Fastness Alkaline
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WATER"> Water Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="CROCKING"> Crocking Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PHENOLIC YELLOWING"> Phenolic Yellowing 
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT"> Light Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION-OVEN TEST"> Color Migration - Oven Test &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION"> Color Migration Fastness
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT PERSPIRATION"> Light Perspiration &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SALIVA"> Saliva Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="BLEEDING"> Bleeding
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="CHLORIN & NON-CHLORIN"> Chlorin &amp; Non-Chlorin &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="DYE TRANSFER"> Dye Transfer &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SWEAT CONCEAL"> Sweat Conceal &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
							</div>
						</form>
					
					<?php } ?>
				</div>
				<?php } ?>
				</div> 			 
				<div class="box-footer">
					<?php if($_POST['buyer']==""){?>
					<button type="submit" class="btn btn-primary" name="cari" value="cari"><i class="fa fa-search"></i> Cari Data</button>
					<?php } else { ?>
					<?php if($_POST['buyer']=="" OR $cek['approve']!="" OR $cek['approve']!=NULL) { ?>
					<button type="submit" class="btn btn-primary" name="save" value="save"><i class="fa fa-save"></i> Edit</button>
					<?php } else{ ?>
					<button type="submit" class="btn btn-primary" name="save" value="save"><i class="fa fa-save"></i> Simpan</button>	
					<?php } ?>
<!--				<a href="pages/cetak/cetak_masterlabtest.php?buyer=<?php echo $_POST['buyer']; ?>" target="_blank" class="btn btn-danger pull-right">Cetak</a> -->
					<a href="MasterTestLab" class="btn btn-default pull-right">Kembali</a>
					<?php }?>
				</div>
				<!-- /.box-footer -->
			</div>
	</div>

</div>			
                    
</form>
            <?php
if($_POST['save']=="save" and $cekMB>0){
	//$con=mysqli_connect("10.0.0.10","dit","4dm1n");
//$db=mysqli_select_db("db_qc",$con)or die("Gagal Koneksi");
      $checkbox1=$_POST['physical'];
      $checkbox2=$_POST['functional'];
      $checkbox3=$_POST['colorfastness'];
	  $buyer=strtoupper($_POST['buyer']);
	  $approve=str_replace("'","''",$_POST['approve']);
      $chkp="";
      $chkf="";
      $chkc="";   
		foreach($checkbox1 as $chk1)  
   		{  
      		$chkp .= $chk1.",";  
        }
        foreach($checkbox2 as $chk2)  
   		{  
      		$chkf .= $chk2.",";  
        } 
        foreach($checkbox3 as $chk3)  
   		{  
      		$chkc .= $chk3.",";  
   		}  
		$sqlData=mysqli_query($con,"UPDATE tbl_masterbuyerlab_test SET
			buyer='$buyer',
			physical='$chkp',
			functional='$chkf',
			colorfastness='$chkc',
			approve='$approve',
			tgl_update=now()
			WHERE buyer='$buyer'");	 	  
	  
		if($sqlData){
			
			echo "<script>swal({
  title: 'Data Berhasil di Update',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
	 window.location.href='MasterTestLab';
	 
  }
});</script>";
		}
				
}else if($_POST['save']=="save" AND $_POST['colorfastness']==""){
	echo "<script>swal({
		title: 'Data Testing Tidak Boleh Kosong!',   
		text: 'Klik Ok untuk input data kembali',
		type: 'info',
		}).then((result) => {
		if (result.value) {
		   window.location.href='MasterTestLab';
		   
		}
	  });</script>";
 }else if($_POST['save']=="save"){
	  $checkbox1=$_POST['physical'];
      $checkbox2=$_POST['functional'];
      $checkbox3=$_POST['colorfastness'];
	  $buyer=strtoupper($_POST['buyer']);
	  $approve=str_replace("'","''",$_POST['approve']);
      $chkp="";
      $chkf="";
      $chkc="";   
		foreach($checkbox1 as $chk1)  
   		{  
      		$chkp .= $chk1.",";  
        }
        foreach($checkbox2 as $chk2)  
   		{  
      		$chkf .= $chk2.",";  
        } 
        foreach($checkbox3 as $chk3)  
   		{  
      		$chkc .= $chk3.",";  
   		}   
		$sqlData=mysqli_query($con,"INSERT INTO tbl_masterbuyerlab_test SET
			buyer='$buyer',
			physical='$chkp',
            functional='$chkf',
            colorfastness='$chkc',
			approve='$approve',
			tgl_update=now()
		");
		if($sqlData){
			
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
	 window.location.href='MasterTestLab';	 
  }
});</script>";
		}
	}

?>
