<?php
//$buyer=$_GET[buyer];
$buyer= isset($_POST['buyer']) ? $_POST['buyer'] : '';
$qMB=mysql_query("SELECT * FROM tbl_masterbuyer_test WHERE buyer='$_POST[buyer]'");
$cekMB=mysql_num_rows($qMB);
?>
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" name="form0" id="form0">
    <div class="box box-success">
        <div class="box-header with-border">
                <h3 class="box-title">Master Test Buyer</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
        </div>
        <div class="box-body"> 
            <div class="col-md-12">
                <div class="form-group">
                    <label for="buyer" class="col-sm-2 control-label">Buyer</label>
                    <div class="col-sm-3">
                        <input name="buyer" type="text" style="text-transform:uppercase" class="form-control" id="buyer" placeholder="Buyer"
                        value="<?php echo $_POST[buyer]; ?>" required>
                    </div>
                </div>
            <div class="box-footer">
                <button type="submit" value="cari" class="btn btn-info">Cari Data</button>
            </div>
        </div>
    </div>
</form>
<?php if($_POST['buyer']!=""){ ?>
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" name="form1" id="form1">
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Detail Testing</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body"> 
        <div class="col-md-12">
            <!-- Custom Tabs -->
				<?php
                if($cekMB>0){
                    while($dMB=mysql_fetch_array($qMB)){
                    $detail=explode(",",$dMB['physical']);
                    $detail1=explode(",",$dMB['functional']);
                    $detail2=explode(",",$dMB['colorfastness']);
				?>
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
                     <div class="form-group">
                        <span class='badge bg-blue'><label for="physical" class="col-sm-2">PHYSICAL</label></span>
                     </div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="FLAMMABILITY" <?php if(in_array("FLAMMABILITY",$detail)){echo "checked";} ?>> Flammability &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FIBER CONTENT" <?php if(in_array("FIBER CONTENT",$detail)){echo "checked";} ?>> Fiber Content  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FABRIC COUNT" <?php if(in_array("FABRIC COUNT",$detail)){echo "checked";} ?>> Fabric Count
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="BOW & SKEW" <?php if(in_array("BOW & SKEW",$detail)){echo "checked";} ?>> Bow &amp; Skew &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING MARTINDLE" <?php if(in_array("PILLING MARTINDLE",$detail)){echo "checked";} ?>> Pilling Martindale &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FABRIC WEIGHT & SHRINKAGE & SPIRALITY" <?php if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail)){echo "checked";} ?>> Fabric Weight &amp; Shrinkage &amp; Spirality 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING BOX" <?php if(in_array("PILLING BOX",$detail)){echo "checked";} ?>> Pilling Box &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING RANDOM TUMBLER" <?php if(in_array("PILLING RANDOM TUMBLER",$detail)){echo "checked";} ?>> Pilling Random Tumbler  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="ABRATION" <?php if(in_array("ABRATION",$detail)){echo "checked";} ?>> Abration
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="SNAGGING MACE" <?php if(in_array("SNAGGING MACE",$detail)){echo "checked";} ?>> Snagging Mace &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="SNAGGING POD" <?php if(in_array("SNAGGING POD",$detail)){echo "checked";} ?>> Snagging Pod &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="BEAN BAG" <?php if(in_array("BEAN BAG",$detail)){echo "checked";} ?>> Bean Bag
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="BURSTING STRENGTH" <?php if(in_array("BURSTING STRENGTH",$detail)){echo "checked";} ?>> Bursting Strength &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="THICKNESS" <?php if(in_array("THICKNESS",$detail)){echo "checked";} ?>> Thickness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="STRETCH & RECOVERY" <?php if(in_array("STRETCH & RECOVERY",$detail)){echo "checked";} ?>> Stretch &amp; Recovery 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="GROWTH" <?php if(in_array("GROWTH",$detail)){echo "checked";} ?>> Growth &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="APPEARANCE" <?php if(in_array("APPEARANCE",$detail)){echo "checked";} ?>> Appearance &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="HEAT SHRINKAGE" <?php if(in_array("HEAT SHRINKAGE",$detail)){echo "checked";} ?>> Heat Shrinkage 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="FIBRE/FUZZ" <?php if(in_array("FIBRE/FUZZ",$detail)){echo "checked";} ?>> Fibre/Fuzz &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING LOCUS" <?php if(in_array("PILLING LOCUS",$detail)){echo "checked";} ?>> Pilling Locus
						</label>
					</div>
                    <div class="form-group">
                        <span class='badge bg-blue'><label for="functional" class="col-sm-2">FUNCTIONAL &amp; PH</label></span>
                     </div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="functional[]" value="WICKING" <?php if(in_array("WICKING",$detail1)){echo "checked";} ?>> Wicking &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="ABSORBENCY" <?php if(in_array("ABSORBENCY",$detail1)){echo "checked";} ?>> Absorbency &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="DRYING TIME" <?php if(in_array("DRYING TIME",$detail1)){echo "checked";} ?>> Drying Time
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="functional[]" value="WATER REPPELENT" <?php if(in_array("WATER REPPELENT",$detail1)){echo "checked";} ?>> Water Reppelent &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="PH" <?php if(in_array("PH",$detail1)){echo "checked";} ?>> PH &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="SOIL RELEASE" <?php if(in_array("SOIL RELEASE",$detail1)){echo "checked";} ?>> Soil Release 
						</label>
					</div>
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
                    <?php } ?>
				</form>
                
                <?php }else{ ?>
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
                     <div class="form-group">
                        <span class='badge bg-blue'><label for="physical" class="col-sm-2">PHYSICAL</label></span>
                     </div>
					 <div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="FLAMMABILITY"> Flammability &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FIBER CONTENT"> Fiber Content  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FABRIC COUNT"> Fabric Count
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="BOW & SKEW"> Bow &amp; Skew &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING MARTINDLE"> Pilling Martindale &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FABRIC WEIGHT & SHRINKAGE & SPIRALITY"> Fabric Weight &amp; Shrinkage &amp; Spirality 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING BOX"> Pilling Box &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING RANDOM TUMBLER"> Pilling Random Tumbler  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="ABRATION"> Abration
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="SNAGGING MACE"> Snagging Mace &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="SNAGGING POD"> Snagging Pod &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="BEAN BAG"> Bean Bag
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="BURSTING STRENGTH"> Bursting Strength &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="THICKNESS"> Thickness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="STRETCH & RECOVERY"> Stretch &amp; Recovery 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="GROWTH"> Growth &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="APPEARANCE"> Appearance &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="HEAT SHRINKAGE"> Heat Shrinkage 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="FIBRE/FUZZ"> Fibre/Fuzz &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING LOCUS"> Pilling Locus
						</label>
					</div>
                    <div class="form-group">
                        <span class='badge bg-blue'><label for="functional" class="col-sm-2">FUNCTIONAL &amp; PH</label></span>
                     </div>
					<div class="form-group">
					<label><input type="checkbox" class="minimal" name="functional[]" value="WICKING"> Wicking &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="ABSORBENCY"> Absorbency &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="DRYING TIME"> Drying Time
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="functional[]" value="WATER REPPELENT"> Water Reppelent &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="PH"> PH &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="SOIL RELEASE"> Soil Release 
						</label>
					</div>
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
				</form>
                <?php } ?>
        </div>
        <div class="box-footer">
            <?php if($_POST['buyer']!=""){ ?> 	
            <button type="submit" class="btn btn-primary pull-left" <?php if($_POST[buyer]==""){echo "disabled";}?> name="save" value="save"><i class="fa fa-save"></i> Simpan</button> 
            <?php } ?>
        </div>
        <!-- /.box-footer -->
    </div>
</div>
<?php } ?>
</form>
						
<?php
if($_POST[save]=="save" and $cekMB>0){
	$con=mysql_connect("10.0.0.10","dit","4dm1n");
    $db=mysql_select_db("db_qc",$con)or die("Gagal Koneksi");
      $checkbox1=$_POST['physical'];
      $checkbox2=$_POST['functional'];
      $checkbox3=$_POST['colorfastness'];
	  $buyer=strtoupper($_POST['buyer']);
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
		$sqlData=mysql_query("UPDATE tbl_masterbuyer_test SET
			buyer='$buyer',
			physical='$chkp',
			functional='$chkf',
			colorfastness='$chkc',
			tgl_update=now()
			WHERE buyer='$buyer'");	 	  
	  
		if($sqlData3){
			
			echo "<script>swal({
  title: 'Data Berhasil di Update',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
	 window.location.href='MasterTestNew';
	 
  }
});</script>";
		}
				
}else if($_POST[save]=="save" AND $_POST[physical]=="" AND $_POST[functional]=="" AND $_POST[colorfastness]==""){
	echo "<script>swal({
		title: 'Data Testing Tidak Boleh Kosong!',   
		text: 'Klik Ok untuk input data kembali',
		type: 'info',
		}).then((result) => {
		if (result.value) {
		   window.location.href='MasterTestNew';
		   
		}
	  });</script>";
 }else if($_POST[save]=="save"){
	  $checkbox1=$_POST['physical'];
      $checkbox2=$_POST['functional'];
      $checkbox3=$_POST['colorfastness'];
	  $buyer=strtoupper($_POST['buyer']);
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
		$sqlData=mysql_query("INSERT INTO tbl_masterbuyer_test SET
			buyer='$buyer',
			physical='$chkp',
            functional='$chkf',
            colorfastness='$chkc',
			tgl_update=now()
		");
		if($sqlData){
			
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
	 window.location.href='MasterTestNew';
	 
  }
});</script>";
		}
	}

?>
