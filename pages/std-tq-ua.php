<style>
input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
 
input[type="number"] {
    -moz-appearance: textfield;
}
</style>
<script>
	
function roundToTwo(num) {    
    return +(Math.round(num + "e+2")  + "e-2");
}
</script>
<script>
	function tampil(){
	if(document.forms['form1']['jns_test'].value=="1"){
		$("#flam").css("display", "");  // To unhide
	}else{
		$("#flam").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="2"){
		$("#bowskew").css("display", "");  // To unhide
	}else{
		$("#bowskew").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="3"){
		$("#snagmace").css("display", "");  // To unhide
        $("#snagmace2").css("display", "");  // To unhide
        $("#snagmace3").css("display", "");  // To unhide
	}else{
		$("#snagmace").css("display", "none");  // To hide
        $("#snagmace2").css("display", "none");  // To hide
        $("#snagmace3").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="4"){
		$("#burststr").css("display", "");  // To unhide 4
	}else{
		$("#burststr").css("display", "none");  // To hide
	}	
	if(document.forms['form1']['jns_test'].value=="5"){
		$("#growth").css("display", "");  // To unhide 5
	}else{
		$("#growth").css("display", "none");  // To hide
	}	
	if(document.forms['form1']['jns_test'].value=="6"){
		$("#fibc").css("display", "");  // To unhide
	}else{
		$("#fibc").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="7"){
		$("#pillrt").css("display", "");  // To unhide
        $("#pillrt2").css("display", "");  // To unhide
	}else{
		$("#pillrt").css("display", "none");  // To hide
        $("#pillrt2").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="8"){
		$("#snagpod").css("display", "");  // To unhide
	}else{
		$("#snagpod").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="9"){
		$("#thick").css("display", "");  // To unhide
	}else{
		$("#thick").css("display", "none");  // To hide
	}	
	if(document.forms['form1']['jns_test'].value=="10"){
		$("#appr").css("display", "");  // To unhide
	}else{
		$("#appr").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="11"){
		$("#pilloc").css("display", "");  // To unhide
	}else{
		$("#pilloc").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="12"){
		$("#fcount").css("display", "");  // To unhide
	}else{
		$("#fcount").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="13"){
		$("#fwe").css("display", "");  // To unhide
	}else{
		$("#fwe").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="14"){
		$("#fwi").css("display", "");  // To unhide
	}else{
		$("#fwi").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="15"){
		$("#shrinkage").css("display", "");  // To unhide
	}else{
		$("#shrinkage").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="16"){
		$("#spirality").css("display", "");  // To unhide
	}else{
		$("#spirality").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="17"){
		$("#abra").css("display", "");  // To unhide
	}else{
		$("#abra").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="18"){
		$("#str").css("display", "");  // To unhide
        $("#rec").css("display", "");  // To unhide
        $("#str2").css("display", "");  // To unhide
        $("#rec2").css("display", "");  // To unhide
        $("#str3").css("display", "");  // To unhide
        $("#rec3").css("display", "");  // To unhide
	}else{
		$("#str").css("display", "none");  // To hide
        $("#rec").css("display", "none");  // To hide
        $("#str2").css("display", "none");  // To hide
        $("#rec2").css("display", "none");  // To hide
        $("#str3").css("display", "none");  // To hide
        $("#rec3").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="19"){
		$("#hshrink").css("display", "");  // To unhide
	}else{
		$("#hshrink").css("display", "none");  // To hide
	}
}
function tampil1(){
	if(document.forms['form3']['jns_test1'].value=="1"){
		$("#wf").css("display", "");  // To unhide
	}else{
		$("#wf").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="2"){
		$("#waterf").css("display", "");  // To unhide
	}else{
		$("#waterf").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="3"){
		$("#acid").css("display", "");  // To unhide
	}else{
		$("#acid").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="4"){
		$("#alkaline").css("display", "");  // To unhide
	}else{
		$("#alkaline").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="5"){
		$("#crock").css("display", "");  // To unhide
	}else{
		$("#crock").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="6"){
		$("#phenolic").css("display", "");  // To unhide
	}else{
		$("#phenolic").css("display", "none");  // To hide
	}
    if(document.forms['form3']['jns_test1'].value=="7"){
		$("#light").css("display", "");  // To unhide
	}else{
		$("#light").css("display", "none");  // To hide
	}
    if(document.forms['form3']['jns_test1'].value=="8"){
		$("#cmoven").css("display", "");  // To unhide
	}else{
		$("#cmoven").css("display", "none");  // To hide
	}
    if(document.forms['form3']['jns_test1'].value=="9"){
		$("#cmf").css("display", "");  // To unhide
	}else{
		$("#cmf").css("display", "none");  // To hide
	}
    if(document.forms['form3']['jns_test1'].value=="10"){
		$("#lightpers").css("display", "");  // To unhide
	}else{
		$("#lightpers").css("display", "none");  // To hide
	}
    if(document.forms['form3']['jns_test1'].value=="11"){
		$("#slv").css("display", "");  // To unhide
	}else{
		$("#slv").css("display", "none");  // To hide
	}
    if(document.forms['form3']['jns_test1'].value=="12"){
		$("#chlorin").css("display", "");  // To unhide
	}else{
		$("#chlorin").css("display", "none");  // To hide
	}
    if(document.forms['form3']['jns_test1'].value=="13"){
		$("#dyetf").css("display", "");  // To unhide
	}else{
		$("#dyetf").css("display", "none");  // To hide
	}
}
function tampil2(){
	if(document.forms['form2']['jns_test2'].value=="1"){
		$("#wic").css("display", "");  // To unhide
        $("#wic2").css("display", "");  // To unhide
	}else{
		$("#wic").css("display", "none");  // To hide
        $("#wic2").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="2"){
		$("#wrepp").css("display", "");  // To unhide
	}else{
		$("#wrepp").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="3"){
		$("#absor").css("display", "");  // To unhide
        $("#absor2").css("display", "");  // To unhide
	}else{
		$("#absor").css("display", "none");  // To hide
        $("#absor2").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="4"){
		$("#ph").css("display", "");  // To unhide
	}else{
		$("#ph").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="5"){
		$("#drytime").css("display", "");  // To unhide
	}else{
		$("#drytime").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="6"){
		$("#soil").css("display", "");  // To unhide
	}else{
		$("#soil").css("display", "none");  // To hide
	}
}
</script>
<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
$noitem=$_GET['no_item'];
$qry=mysqli_query($con,"SELECT * FROM tbl_std_tq_ua WHERE no_item='$noitem'");
$cek=mysqli_num_rows($qry); 
$r=mysqli_fetch_array($qry);
?>	
<?php 

if($_POST['save']=="save"){
    $file_vbg = $_FILES['pic_vbg']['name'];
    // ambil data file
	$namaFile_vbg = $_FILES['pic_vbg']['name'];
    $namaSementara_vbg = $_FILES['pic_vbg']['tmp_name'];
    // tentukan lokasi file akan dipindahkan
	$dirUpload = "dist/img-visualbrand/";
	// pindahkan file
    $terupload_cover = move_uploaded_file($namaSementara_vbg, $dirUpload.$namaFile_vbg);
    $sqlKK=mysqli_query($con,"UPDATE tbl_tq_nokk SET
	`pic_vbg`='$file_vbg',
    `season`='$_POST[season]',
    `style`='$_POST[style]'
	WHERE `id`='$rNoKK[id]'");

	if($sqlKK){
			echo "<script>swal({
		title: 'Data Standart Berhasil Disimpan',   
		text: 'Klik Ok untuk input data kembali',
		type: 'success',
		}).then((result) => {
		if (result.value) {
			
			window.location.href='StdUA-$r[no_item]'; 
		}
		});</script>";
	}
}
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
    <div class="box box-success" style="width: 98%;">
        <div class="box-header with-border">
            <h3 class="box-title">Standart TQ Under Armour</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body"> 
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_item" class="col-sm-3 control-label">No Item</label>
                        <div class="col-sm-5">
                            <input name="no_item" type="text" class="form-control" id="no_item" 
                            onchange="window.location='StdUA-'+this.value" onBlur="window.location='StdUA-'+this.value" value="<?php if($_GET['no_item']!=""){echo $_GET['no_item'];}?>" placeholder="No Item" required >
                        </div>
                </div>
            </div> 
        </div>
        <div class="box-footer">
        </div>
    </div>
</form>
    <?php if($noitem!=""){ ?> 
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Detail Standard Under Armour</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">PHYSICAL</a></li>
                            <li><a href="#tab_2" data-toggle="tab">FUNCTIONAL &amp; PH</a></li>
                            <li ><a href="#tab_3" data-toggle="tab">COLORFASTNESS</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                    <div class="form-group">
                                        <label for="jnstest" class="col-sm-2 control-label">JENIS TES</label>
                                            <div class="col-sm-4">
                                                <select name="jns_test" class="form-control select2" id="jns_test" onChange="tampil();" style="width: 100%;">
                                                    <option selected="selected" value="">Pilih</option>
                                                    <option value="1">FLAMABILITY</option>
                                                    <option value="2">BOW &amp; SKEW</option>
                                                    <option value="3">SNAGGING MACE</option>
                                                    <option value="4">BURSTING STRENGTH</option>
                                                    <option value="5">GROWTH</option>
                                                    <option value="6">FIBER CONTENT</option>
                                                    <option value="7">PILLING RANDOM TUMBLER</option>
                                                    <option value="8">SNAGGING POD</option>
                                                    <option value="9">THICKNESS</option>
                                                    <option value="10">APPEARANCE</option>
                                                    <option value="11">PILLING LOCUS</option>
                                                    <option value="12">FABRIC COUNT</option>
                                                    <option value="13">FABRIC WEIGHT</option>
                                                    <option value="14">FABRIC WIDTH</option>
                                                    <option value="15">SHRINKAGE</option>
                                                    <option value="16">SPIRALITY</option>
                                                    <option value="17">ABRATION</option>
                                                    <option value="18">STRETCH &amp; RECOVERY</option>
                                                    <option value="19">HEAT SHRINKAGE</option>
                                                </select>
                                            </div>
                                    </div>
                                    <!-- FLAMMABILITY BEGIN-->
                                    <div class="form-group" id="flam" style="display:none;">
                                        <label for="flamability" class="col-sm-2 control-label">FLAMMABILITY</label>
                                            <div class="col-sm-5">
                                                <input name="flamability" type="text" class="form-control" id="flamability" value="<?php echo $r['flamability'];?>" placeholder="FLAMMABILITY">
                                            </div>
                                    </div>
                                    <!-- FLAMMABILITY END-->
                                    <!-- BOW & SKEW BEGIN-->
                                    <div class="form-group" id="bowskew" style="display:none;">
                                        <label for="bow_skew" class="col-sm-2 control-label">BOW &amp; SKEW</label>
                                        <div class="col-sm-5">
                                            <input name="bow" type="text" class="form-control" id="bow" value="<?php echo $r['bow'];?>" placeholder="BOW">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="skew" type="text" class="form-control" id="skew" value="<?php echo $r['skew'];?>" placeholder="SKEW">
                                        </div>
                                    </div>
                                    <!-- BOW & SKEW END-->
                                    <!-- SNAGGING MACE BEGIN-->
                                    <div class="form-group" id="snagmace" style="display:none;">
                                        <label for="snagmace" class="col-sm-2 control-label">SNAGGING MACE</label>
                                        <div class="col-sm-5">
                                            <input name="snag_mace1" type="text" class="form-control" id="snag_mace1" value="<?php echo $r['snag_mace1'];?>" placeholder="100 CYCLES LENGTH">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="snag_mace2" type="text" class="form-control" id="snag_mace2" value="<?php echo $r['snag_mace2'];?>" placeholder="100 CYCLES WIDTH">
                                        </div>
                                    </div>
                                    <div class="form-group" id="snagmace2" style="display:none;">
                                        <label for="snagmace2" class="col-sm-2 control-label">&nbsp;</label>
                                        <div class="col-sm-5">
                                            <input name="snag_mace3" type="text" class="form-control" id="snag_mace3" value="<?php echo $r['snag_mace3'];?>" placeholder="300 CYCLES LENGTH">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="snag_mace4" type="text" class="form-control" id="snag_mace4" value="<?php echo $r['snag_mace4'];?>" placeholder="300 CYCLES WIDTH">
                                        </div>
                                    </div>
                                    <div class="form-group" id="snagmace3" style="display:none;">
                                        <label for="snagmace3" class="col-sm-2 control-label">&nbsp;</label>
                                        <div class="col-sm-5">
                                            <input name="snag_mace5" type="text" class="form-control" id="snag_mace5" value="<?php echo $r['snag_mace5'];?>" placeholder="600 CYCLES LENGTH">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="snag_mace6" type="text" class="form-control" id="snag_mace6" value="<?php echo $r['snag_mace6'];?>" placeholder="600 CYCLES WIDTH">
                                        </div>
                                    </div>
                                    <!-- SNAGGING MACE END-->
                                    <!-- BURSTING STRENGTH BEGIN-->
                                    <div class="form-group" id="burststr" style="display:none;">
                                        <label for="burststr" class="col-sm-2 control-label">BURSTING STRENGTH</label>
                                        <div class="col-sm-5">
                                            <input name="burst_str" type="text" class="form-control" id="burst_str" value="<?php echo $r['burst_str'];?>" placeholder="BURSTING STRENGTH">
                                        </div>
                                    </div>
                                    <!-- BURSTING STRENGTH END-->
                                    <!-- GROWTH BEGIN-->
                                    <div class="form-group" id="growth" style="display:none;">
                                        <label for="growth" class="col-sm-2 control-label">GROWTH</label>
                                        <div class="col-sm-5">
                                            <input name="growth1" type="text" class="form-control" id="growth1" value="<?php echo $r['growth1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="growth2" type="text" class="form-control" id="growth2" value="<?php echo $r['growth2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- GROWTH END-->
                                    <!-- FIBER CONTENT BEGIN-->
                                    <div class="form-group" id="fibc" style="display:none;">
                                        <label for="fibc" class="col-sm-2 control-label">FIBER CONTENT</label>
                                        <div class="col-sm-3">
                                            <input name="fibercontent1" type="text" class="form-control" id="fibercontent1" value="<?php echo $r['fibercontent1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-3">
                                            <input name="fibercontent2" type="text" class="form-control" id="fibercontent2" value="<?php echo $r['fibercontent2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-3">
                                            <input name="fibercontent3" type="text" class="form-control" id="fibercontent3" value="<?php echo $r['fibercontent3'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- FIBER CONTENT END-->
                                    <!-- PILLING RANDOM TUMBLE BEGIN-->
                                    <div class="form-group" id="pillrt" style="display:none;">
                                        <label for="pillrt" class="col-sm-2 control-label">PILLING RANDOM TUMBLE</label>
                                        <div class="col-sm-5">
                                            <input name="pillr_tumble1" type="text" class="form-control" id="pillr_tumble1" value="<?php echo $r['pillr_tumble1'];?>" placeholder="30 MIN FACE">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="pillr_tumble2" type="text" class="form-control" id="pillr_tumble2" value="<?php echo $r['pillr_tumble2'];?>" placeholder="30 MIN BACK">
                                        </div>
                                    </div>
                                    <div class="form-group" id="pillrt2" style="display:none;">
                                        <label for="pillrt2" class="col-sm-2 control-label">&nbsp;</label>
                                        <div class="col-sm-5">
                                            <input name="pillr_tumble3" type="text" class="form-control" id="pillr_tumble3" value="<?php echo $r['pillr_tumble3'];?>" placeholder="60 MIN FACE">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="pillr_tumble4" type="text" class="form-control" id="pillr_tumble4" value="<?php echo $r['pillr_tumble4'];?>" placeholder="60 MIN BACK">
                                        </div>
                                    </div>
                                    <!-- PILLING RANDOM TUMBLE END-->
                                    <!-- SNAGGING POD BEGIN-->
                                    <div class="form-group" id="snagpod" style="display:none;">
                                        <label for="snagpod" class="col-sm-2 control-label">SNAGGING POD</label>
                                        <div class="col-sm-5">
                                            <input name="snag_pod1" type="text" class="form-control" id="snag_pod1" value="<?php echo $r['snag_pod1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="snag_pod2" type="text" class="form-control" id="snag_pod2" value="<?php echo $r['snag_pod2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- SNAGGING POD END-->
                                    <!-- THICKNESS BEGIN-->
                                    <div class="form-group" id="thick" style="display:none;">
                                        <label for="thick" class="col-sm-2 control-label">THICKNESS</label>
                                        <div class="col-sm-5">
                                            <input name="thickness1" type="text" class="form-control" id="thickness1" value="<?php echo $r['thickness1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="thickness2" type="text" class="form-control" id="thickness2" value="<?php echo $r['thickness2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- THICKNESS END-->
                                    <!-- APPEARANCE BEGIN-->
                                    <div class="form-group" id="appr" style="display:none;">
                                        <label for="appr" class="col-sm-2 control-label">APPEARANCE</label>
                                        <div class="col-sm-5">
                                            <input name="appearance1" type="text" class="form-control" id="appearance1" value="<?php echo $r['appearance1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="appearance2" type="text" class="form-control" id="appearance2" value="<?php echo $r['appearance2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- APPEARANCE END-->
                                    <!-- PILLING LOCUS BEGIN-->
                                    <div class="form-group" id="pilloc" style="display:none;">
                                        <label for="pilloc" class="col-sm-2 control-label">PILLING LOCUS</label>
                                        <div class="col-sm-5">
                                            <input name="pill_locus1" type="text" class="form-control" id="pill_locus1" value="<?php echo $r['pill_locus1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="pill_locus2" type="text" class="form-control" id="pill_locus2" value="<?php echo $r['pill_locus2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- PILLING LOCUS END-->
                                    <!-- FABRIC COUNT BEGIN-->
                                    <div class="form-group" id="fcount" style="display:none;">
                                        <label for="fcount" class="col-sm-2 control-label">FABRIC COUNT</label>
                                        <div class="col-sm-5">
                                            <input name="f_count1" type="text" class="form-control" id="f_count1" value="<?php echo $r['f_count1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="f_count2" type="text" class="form-control" id="f_count2" value="<?php echo $r['f_count2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- FABRIC COUNT END-->
                                    <!-- FABRIC WEIGHT BEGIN-->
                                    <div class="form-group" id="fwe" style="display:none;">
                                        <label for="fwe" class="col-sm-2 control-label">FABRIC WEIGHT</label>
                                        <div class="col-sm-5">
                                            <input name="f_weight" type="text" class="form-control" id="f_weight" value="<?php echo $r['f_weight'];?>" placeholder="FABRIC WEIGHT">
                                        </div>
                                    </div>
                                    <!-- FABRIC WEIGHT END-->
                                    <!-- FABRIC WIDTH BEGIN-->
                                    <div class="form-group" id="fwi" style="display:none;">
                                        <label for="fwi" class="col-sm-2 control-label">FABRIC WIDTH</label>
                                        <div class="col-sm-5">
                                            <input name="f_width" type="text" class="form-control" id="f_width" value="<?php echo $r['f_width'];?>" placeholder="FABRIC WIDTH">
                                        </div>
                                    </div>
                                    <!-- FABRIC WIDTH END-->
                                    <!-- SHRINKAGE BEGIN-->
                                    <div class="form-group" id="shrinkage" style="display:none;">
                                        <label for="shrinkage" class="col-sm-2 control-label">SHRINKAGE</label>
                                        <div class="col-sm-5">
                                            <input name="shrinkage1" type="text" class="form-control" id="shrinkage1" value="<?php echo $r['shrinkage1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="shrinkage2" type="text" class="form-control" id="shrinkage2" value="<?php echo $r['shrinkage2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- SHRINKAGE END-->
                                    <!-- SPIRALITY BEGIN-->
                                    <div class="form-group" id="spirality" style="display:none;">
                                        <label for="shrinkage" class="col-sm-2 control-label">SPIRALITY</label>
                                        <div class="col-sm-5">
                                            <input name="spirality1" type="text" class="form-control" id="spirality1" value="<?php echo $r['spirality1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="spirality2" type="text" class="form-control" id="spirality2" value="<?php echo $r['spirality2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- SPIRALITY END-->
                                    <!-- ABRATION BEGIN-->
                                    <div class="form-group" id="abra" style="display:none;">
                                        <label for="abra" class="col-sm-2 control-label">ABRATION</label>
                                        <div class="col-sm-5">
                                            <input name="abration1" type="text" class="form-control" id="abration1" value="<?php echo $r['abration1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="abration2" type="text" class="form-control" id="abration2" value="<?php echo $r['abration2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- ABRATION END-->
                                    <!-- STRETCH & RECOVERY BEGIN-->
                                    <div class="form-group" id="str" style="display:none;">
                                        <label for="str" class="col-sm-2 control-label">STRETCH (5 LBF)</label>
                                        <div class="col-sm-5">
                                            <input name="stretch1" type="text" class="form-control" id="stretch1" value="<?php echo $r['stretch1'];?>" placeholder="STRETCH LENGTH 5 LBF">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="stretch2" type="text" class="form-control" id="stretch2" value="<?php echo $r['stretch2'];?>" placeholder="STRETCH WIDTH 5 LBF">
                                        </div>
                                    </div>
                                    <div class="form-group" id="rec" style="display:none;">
                                        <label for="rec" class="col-sm-2 control-label">RECOVERY (5 LBF)</label>
                                        <div class="col-sm-5">
                                            <input name="recovery1" type="text" class="form-control" id="recovery1" value="<?php echo $r['recovery1'];?>" placeholder="RECOVERY LENGTH 5 LBF">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="recovery2" type="text" class="form-control" id="recovery2" value="<?php echo $r['recovery2'];?>" placeholder="RECOVERY WIDTH 5 LBF">
                                        </div>
                                    </div>
                                    <div class="form-group" id="str2" style="display:none;">
                                        <label for="str2" class="col-sm-2 control-label">STRETCH (10 LBF)</label>
                                        <div class="col-sm-5">
                                            <input name="stretch3" type="text" class="form-control" id="stretch3" value="<?php echo $r['stretch3'];?>" placeholder="STRETCH LENGTH 10 LBF">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="stretch4" type="text" class="form-control" id="stretch4" value="<?php echo $r['stretch4'];?>" placeholder="STRETCH WIDTH 10 LBF">
                                        </div>
                                    </div>
                                    <div class="form-group" id="rec2" style="display:none;">
                                        <label for="rec2" class="col-sm-2 control-label">RECOVERY (10 LBF)</label>
                                        <div class="col-sm-5">
                                            <input name="recovery3" type="text" class="form-control" id="recovery3" value="<?php echo $r['recovery3'];?>" placeholder="RECOVERY LENGTH 10 LBF">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="recovery4" type="text" class="form-control" id="recovery4" value="<?php echo $r['recovery4'];?>" placeholder="RECOVERY WIDTH 10 LBF">
                                        </div>
                                    </div>
                                    <div class="form-group" id="str3" style="display:none;">
                                        <label for="str3" class="col-sm-2 control-label">STRETCH (15 LBF)</label>
                                        <div class="col-sm-5">
                                            <input name="stretch5" type="text" class="form-control" id="stretch5" value="<?php echo $r['stretch5'];?>" placeholder="STRETCH LENGTH 15 LBF">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="stretch6" type="text" class="form-control" id="stretch6" value="<?php echo $r['stretch6'];?>" placeholder="STRETCH WIDTH 15 LBF">
                                        </div>
                                    </div>
                                    <div class="form-group" id="rec3" style="display:none;">
                                        <label for="rec3" class="col-sm-2 control-label">RECOVERY (15 LBF)</label>
                                        <div class="col-sm-5">
                                            <input name="recovery5" type="text" class="form-control" id="recovery5" value="<?php echo $r['recovery5'];?>" placeholder="RECOVERY LENGTH 15 LBF">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="recovery6" type="text" class="form-control" id="recovery6" value="<?php echo $r['recovery6'];?>" placeholder="RECOVERY WIDTH 15 LBF">
                                        </div>
                                    </div>
                                    <!-- STRETCH & RECOVERY END-->
                                    <!-- HEAT SHRINKAGE BEGIN-->
                                    <div class="form-group" id="hshrink" style="display:none;">
                                        <label for="hshrink" class="col-sm-2 control-label">HEAT SHRINKAGE</label>
                                        <div class="col-sm-5">
                                            <input name="heat_shrinkage1" type="text" class="form-control" id="heat_shrinkage1" value="<?php echo $r['heat_shrinkage1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="heat_shrinkage2" type="text" class="form-control" id="heat_shrinkage2" value="<?php echo $r['heat_shrinkage2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- HEAT SHRINKAGE END-->
                                    <div class="form-group">
                                        <?php if($noitem!=""){ ?>
                                        <button type="submit" class="btn btn-primary pull-right" name="physical_save" value="save"><i class="fa fa-save"></i> Simpan</button>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
                                    <div class="form-group">
                                        <label for="jns_test2" class="col-sm-2 control-label">JENIS TES</label>
                                            <div class="col-sm-3">
                                                <select name="jns_test2" class="form-control select2" id="jns_test2" onChange="tampil2();" style="width: 100%;">
                                                    <option value="">Pilih</option>
                                                    <option selected="selected" value="">Pilih</option>
                                                    <option value="1">WICKING</option>
                                                    <option value="2">WATER REPPELENT</option>
                                                    <option value="3">ABSORBENCY</option>
                                                    <option value="4">PH</option>
                                                    <option value="5">DRYING TIME</option>
                                                    <option value="6">SOIL RELEASE</option>
                                                </select>
                                            </div>
                                    </div>
                                    <!-- WICKING BEGIN-->
                                    <div class="form-group" id="wic" style="display:none;">
                                        <label for="wic" class="col-sm-2 control-label">WICKING</label>
                                        <div class="col-sm-5">
                                            <input name="wick1" type="text" class="form-control" id="wick1" value="<?php echo $r['wick1'];?>" placeholder="ORIGINAL LENGTH">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="wick2" type="text" class="form-control" id="wick2" value="<?php echo $r['wick2'];?>" placeholder="ORIGINAL WIDTH">
                                        </div>
                                    </div>
                                    <div class="form-group" id="wic2" style="display:none;">
                                        <label for="wic2" class="col-sm-2 control-label">&nbsp;</label>
                                        <div class="col-sm-5">
                                            <input name="wick3" type="text" class="form-control" id="wick3" value="<?php echo $r['wick3'];?>" placeholder="AFTERWASH LENGTH">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="wick4" type="text" class="form-control" id="wick4" value="<?php echo $r['wick4'];?>" placeholder="AFTERWASH WIDTH">
                                        </div>
                                    </div>
                                    <!-- WICKING END-->
                                    <!-- WATER REPPELENT BEGIN-->
                                    <div class="form-group" id="wrepp" style="display:none;">
                                        <label for="wrepp" class="col-sm-2 control-label">WATER REPPELENT</label>
                                        <div class="col-sm-3">
                                            <input name="water_repp1" type="text" class="form-control" id="water_repp1" value="<?php echo $r['water_repp1'];?>" placeholder="ORIGINAL">
                                        </div>
                                        <div class="col-sm-3">
                                            <input name="water_repp2" type="text" class="form-control" id="water_repp2" value="<?php echo $r['water_repp2'];?>" placeholder="3X">
                                        </div>
                                        <div class="col-sm-3">
                                            <input name="water_repp3" type="text" class="form-control" id="water_repp3" value="<?php echo $r['water_repp3'];?>" placeholder="20X">
                                        </div>
                                    </div>
                                    <!-- WATER REPPELENT END-->
                                    <!-- ABSORBENCY BEGIN-->
                                    <div class="form-group" id="absor" style="display:none;">
                                        <label for="absor" class="col-sm-2 control-label">ABSORBENCY</label>
                                        <div class="col-sm-5">
                                            <input name="absorbency1" type="text" class="form-control" id="absorbency1" value="<?php echo $r['absorbency1'];?>" placeholder="ORIGINAL FACE">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="absorbency2" type="text" class="form-control" id="absorbency2" value="<?php echo $r['absorbency2'];?>" placeholder="ORIGINAL BACK">
                                        </div>
                                    </div>
                                    <div class="form-group" id="absor2" style="display:none;">
                                        <label for="absor2" class="col-sm-2 control-label">&nbsp;</label>
                                        <div class="col-sm-5">
                                            <input name="absorbency3" type="text" class="form-control" id="absorbency3" value="<?php echo $r['absorbency3'];?>" placeholder="AFTERWASH FACE">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="absorbency4" type="text" class="form-control" id="absorbency4" value="<?php echo $r['absorbency4'];?>" placeholder="AFTERWASH BACK">
                                        </div>
                                    </div>
                                    <!-- ABSORBENCY END-->
                                    <!-- PH BEGIN-->
                                    <div class="form-group" id="ph" style="display:none;">
                                        <label for="ph" class="col-sm-2 control-label">PH</label>
                                        <div class="col-sm-5">
                                            <input name="ph" type="text" class="form-control" id="ph" value="<?php echo $r['ph'];?>" placeholder="PH">
                                        </div>
                                    </div>
                                    <!-- PH END-->
                                    <!-- DRYING TIME BEGIN-->
                                    <div class="form-group" id="drytime" style="display:none;">
                                        <label for="drytime" class="col-sm-2 control-label">DRYING TIME</label>
                                        <div class="col-sm-5">
                                            <input name="dry_time1" type="text" class="form-control" id="dry_time1" value="<?php echo $r['dry_time1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="dry_time2" type="text" class="form-control" id="dry_time2" value="<?php echo $r['dry_time2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- DRYING TIME END-->
                                    <!-- SOIL RELEASE BEGIN-->
                                    <div class="form-group" id="soil" style="display:none;">
                                        <label for="soil" class="col-sm-2 control-label">SOIL RELEASE</label>
                                        <div class="col-sm-5">
                                            <input name="soil1" type="text" class="form-control" id="soil1" value="<?php echo $r['soil1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="soil2" type="text" class="form-control" id="soil2" value="<?php echo $r['soil2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- SOIL RELEASE END-->
                                    <div class="form-group">
                                        <?php if($noitem!=""){ ?>
                                        <button type="submit" class="btn btn-primary pull-right" name="functional_save" value="save"><i class="fa fa-save"></i> Simpan</button>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_3">
                                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form3" id="form3">
                                    <div class="form-group">
                                        <label for="jnstest1" class="col-sm-2 control-label">JENIS TES</label>
                                        <div class="col-sm-3">
                                            <select name="jns_test1" class="form-control select2" id="jns_test1" onChange="tampil1();" style="width: 100%;">
                                                <option value="">Pilih</option>
                                                <option selected="selected" value="">Pilih</option>
                                                <option value="1">WASHING FASTNESS</option>
                                                <option value="2">WATER FASTNESS</option>
                                                <option value="3">PERSPIRATION ACID</option>
                                                <option value="4">PERSPIRATION ALKALINE</option>
                                                <option value="5">CROCKING FASTNESS</option>
                                                <option value="6">PHENOLIC YELLOWING</option>
                                                <option value="7">LIGHT FASTNESS</option>
                                                <option value="8">COLOR MIGRATION - OVEN TEST</option>
                                                <option value="9">COLOR MIGRATION FASTNESS</option>
                                                <option value="10">LIGHT PERSPIRATION</option>
                                                <option value="11">SALIVA FASTNESS</option>
                                                <option value="12">CHLORIN &amp; NON-CHLORIN</option>
                                                <option value="13">DYE TRANSFER</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- WASHING BEGIN-->
                                    <div class="form-group" id="wf" style="display:none;">
                                        <label for="wf" class="col-sm-2 control-label">WASHING FASTNESS</label>
                                        <div class="col-sm-2">
                                            <input name="wash1" type="text" class="form-control" id="wash1" value="<?php echo $r['wash1'];?>" placeholder="4-5 Color Change">
                                            <input name="wash2" type="text" class="form-control" id="wash2" value="<?php echo $r['wash2'];?>" placeholder="4 Acetate">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="wash3" type="text" class="form-control" id="wash3" value="<?php echo $r['wash3'];?>" placeholder="4 Cotton">
                                            <input name="wash4" type="text" class="form-control" id="wash4" value="<?php echo $r['wash4'];?>" placeholder="4 Nylon">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="wash5" type="text" class="form-control" id="wash5" value="<?php echo $r['wash5'];?>" placeholder="4 Polyester">
                                            <input name="wash6" type="text" class="form-control" id="wash6" value="<?php echo $r['wash6'];?>" placeholder="4 Acrylic">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="wash7" type="text" class="form-control" id="wash7" value="<?php echo $r['wash7'];?>" placeholder="4 Wool">
                                            <input name="wash8" type="text" class="form-control" id="wash8" value="<?php echo $r['wash8'];?>" placeholder="4-5 Cross Staining">
                                        </div>
                                    </div>
                                    <!-- WASHING END-->
                                    <!-- WATER BEGIN-->
                                    <div class="form-group" id="waterf" style="display:none;">
                                        <label for="waterf" class="col-sm-2 control-label">WATER FASTNESS</label>
                                        <div class="col-sm-2">
                                            <input name="water1" type="text" class="form-control" id="water1" value="<?php echo $r['water1'];?>" placeholder="4-5 Color Change">
                                            <input name="water2" type="text" class="form-control" id="water2" value="<?php echo $r['water2'];?>" placeholder="4 Acetate">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="water3" type="text" class="form-control" id="water3" value="<?php echo $r['water3'];?>" placeholder="4 Cotton">
                                            <input name="water4" type="text" class="form-control" id="water4" value="<?php echo $r['water4'];?>" placeholder="4 Nylon">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="water5" type="text" class="form-control" id="water5" value="<?php echo $r['water5'];?>" placeholder="4 Polyester">
                                            <input name="water6" type="text" class="form-control" id="water6" value="<?php echo $r['water6'];?>" placeholder="4 Acrylic">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="water7" type="text" class="form-control" id="water7" value="<?php echo $r['water7'];?>" placeholder="4 Wool">
                                            <input name="water8" type="text" class="form-control" id="water8" value="<?php echo $r['water8'];?>" placeholder="4-5 Cross Staining">
                                        </div>
                                    </div>
                                    <!-- WATER END-->
                                    <!-- ACID BEGIN-->
                                    <div class="form-group" id="acid" style="display:none;">
                                        <label for="acid" class="col-sm-2 control-label">PERSPIRATION ACID</label>
                                        <div class="col-sm-2">
                                            <input name="acid1" type="text" class="form-control" id="acid1" value="<?php echo $r['acid1'];?>" placeholder="4-5 Color Change">
                                            <input name="acid2" type="text" class="form-control" id="acid2" value="<?php echo $r['acid2'];?>" placeholder="4 Acetate">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="acid3" type="text" class="form-control" id="acid3" value="<?php echo $r['acid3'];?>" placeholder="4 Cotton">
                                            <input name="acid4" type="text" class="form-control" id="acid4" value="<?php echo $r['acid4'];?>" placeholder="4 Nylon">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="acid5" type="text" class="form-control" id="acid5" value="<?php echo $r['acid5'];?>" placeholder="4 Polyester">
                                            <input name="acid6" type="text" class="form-control" id="acid6" value="<?php echo $r['acid6'];?>" placeholder="4 Acrylic">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="acid7" type="text" class="form-control" id="acid7" value="<?php echo $r['acid7'];?>" placeholder="4 Wool">
                                            <input name="acid8" type="text" class="form-control" id="acid8" value="<?php echo $r['acid8'];?>" placeholder="4-5 Cross Staining">
                                        </div>
                                    </div>
                                    <!-- ACID END-->
                                    <!-- ALKALINE BEGIN-->
                                    <div class="form-group" id="alkaline" style="display:none;">
                                        <label for="alkaline" class="col-sm-2 control-label">PERSPIRATION ALKALINE</label>
                                        <div class="col-sm-2">
                                            <input name="alkaline1" type="text" class="form-control" id="alkaline1" value="<?php echo $r['alkaline1'];?>" placeholder="4-5 Color Change">
                                            <input name="alkaline2" type="text" class="form-control" id="alkaline2" value="<?php echo $r['alkaline2'];?>" placeholder="4 Acetate">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="alkaline3" type="text" class="form-control" id="alkaline3" value="<?php echo $r['alkaline3'];?>" placeholder="4 Cotton">
                                            <input name="alkaline4" type="text" class="form-control" id="alkaline4" value="<?php echo $r['alkaline4'];?>" placeholder="4 Nylon">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="alkaline5" type="text" class="form-control" id="alkaline5" value="<?php echo $r['alkaline5'];?>" placeholder="4 Polyester">
                                            <input name="alkaline6" type="text" class="form-control" id="alkaline6" value="<?php echo $r['alkaline6'];?>" placeholder="4 Acrylic">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="alkaline7" type="text" class="form-control" id="alkaline7" value="<?php echo $r['alkaline7'];?>" placeholder="4 Wool">
                                            <input name="alkaline8" type="text" class="form-control" id="alkaline8" value="<?php echo $r['alkaline8'];?>" placeholder="4-5 Cross Staining">
                                        </div>
                                    </div>
                                    <!-- ALKALINE END-->
                                    <!-- CROCKING BEGIN-->
                                    <div class="form-group" id="crock" style="display:none;">
                                        <label for="crock" class="col-sm-2 control-label">CROCKING</label>
                                        <div class="col-sm-5">
                                            <input name="crock1" type="text" class="form-control" id="crock1" value="<?php echo $r['crock1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="crock2" type="text" class="form-control" id="crock2" value="<?php echo $r['crock2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- CROCKING END-->
                                    <!-- PHENOLIC BEGIN-->
                                    <div class="form-group" id="phenolic" style="display:none;">
                                        <label for="phenolic" class="col-sm-2 control-label">PHENOLIC YELLOWING</label>
                                        <div class="col-sm-5">
                                            <input name="phenolic" type="text" class="form-control" id="phenolic" value="<?php echo $r['phenolic'];?>" placeholder="PHENOLIC YELLOWING">
                                        </div>
                                    </div>
                                    <!-- PHENOLIC END-->
                                    <!-- LIGHT BEGIN-->
                                    <div class="form-group" id="light" style="display:none;">
                                        <label for="light" class="col-sm-2 control-label">LIGHT</label>
                                        <div class="col-sm-5">
                                            <input name="light" type="text" class="form-control" id="light" value="<?php echo $r['light'];?>" placeholder="LIGHT">
                                        </div>
                                    </div>
                                    <!-- LIGHT END-->
                                    <!-- COLOR MIGRATION OVEN TEST BEGIN-->
                                    <div class="form-group" id="cmoven" style="display:none;">
                                        <label for="cmoven" class="col-sm-2 control-label">COLOR MIGRATION OVEN TEST</label>
                                        <div class="col-sm-5">
                                            <input name="cm_oven1" type="text" class="form-control" id="cm_oven1" value="<?php echo $r['cm_oven1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="cm_oven2" type="text" class="form-control" id="cm_oven2" value="<?php echo $r['cm_oven2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- COLOR MIGRATION OVEN TEST END-->
                                    <!-- COLOR MIGRATION BEGIN-->
                                    <div class="form-group" id="cmf" style="display:none;">
                                        <label for="cmf" class="col-sm-2 control-label">COLOR MIGRATION</label>
                                        <div class="col-sm-5">
                                            <input name="cm1" type="text" class="form-control" id="cm1" value="<?php echo $r['cm1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="cm2" type="text" class="form-control" id="cm2" value="<?php echo $r['cm2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- COLOR MIGRATION END-->
                                    <!-- LIGHT PERSPIRATION BEGIN-->
                                    <div class="form-group" id="lightpers" style="display:none;">
                                        <label for="lightpers" class="col-sm-2 control-label">LIGHT PERSPIRATION</label>
                                        <div class="col-sm-5">
                                            <input name="light_pers1" type="text" class="form-control" id="light_pers1" value="<?php echo $r['light_pers1'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="light_pers2" type="text" class="form-control" id="light_pers2" value="<?php echo $r['light_pers2'];?>" placeholder="MASUKKAN STANDARD">
                                        </div>
                                    </div>
                                    <!-- LIGHT PERSPIRATION END-->
                                    <!-- SALIVA BEGIN-->
                                    <div class="form-group" id="slv" style="display:none;">
                                        <label for="slv" class="col-sm-2 control-label">SALIVA</label>
                                        <div class="col-sm-5">
                                            <input name="saliva" type="text" class="form-control" id="saliva" value="<?php echo $r['saliva'];?>" placeholder="SALIVA">
                                        </div>
                                    </div>
                                    <!-- SALIVA END-->
                                    <!-- CHLORIN & NON-CHLORIN BEGIN-->
                                    <div class="form-group" id="chlorin" style="display:none;">
                                        <label for="chlorin" class="col-sm-2 control-label">CHLORIN &amp; NON-CHLORIN</label>
                                        <div class="col-sm-5">
                                            <input name="chlorin" type="text" class="form-control" id="chlorin" value="<?php echo $r['chlorin'];?>" placeholder="CHLORIN">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="non_chlorin" type="text" class="form-control" id="non_chlorin" value="<?php echo $r['non_chlorin'];?>" placeholder="NON-CHLORIN">
                                        </div>
                                    </div>
                                    <!-- CHLORIN & NON-CHLORIN END-->
                                    <!-- DYE TRANSFER BEGIN-->
                                    <div class="form-group" id="dyetf" style="display:none;">
                                        <label for="dyetf" class="col-sm-2 control-label">DYE TRANSFER</label>
                                        <div class="col-sm-2">
                                            <input name="dye_tf1" type="text" class="form-control" id="dye_tf1" value="<?php echo $r['dye_tf1'];?>" placeholder="4-5 Color Change">
                                            <input name="dye_tf2" type="text" class="form-control" id="dye_tf2" value="<?php echo $r['dye_tf2'];?>" placeholder="4 Acetate">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="dye_tf3" type="text" class="form-control" id="dye_tf3" value="<?php echo $r['dye_tf3'];?>" placeholder="4 Cotton">
                                            <input name="dye_tf4" type="text" class="form-control" id="dye_tf4" value="<?php echo $r['dye_tf4'];?>" placeholder="4 Nylon">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="dye_tf5" type="text" class="form-control" id="dye_tf5" value="<?php echo $r['dye_tf5'];?>" placeholder="4 Polyester">
                                            <input name="dye_tf6" type="text" class="form-control" id="dye_tf6" value="<?php echo $r['dye_tf6'];?>" placeholder="4 Acrylic">
                                        </div>
                                        <div class="col-sm-2">
                                            <input name="dye_tf7" type="text" class="form-control" id="dye_tf7" value="<?php echo $r['dye_tf7'];?>" placeholder="4 Wool">
                                            <input name="dye_tf8" type="text" class="form-control" id="dye_tf8" value="<?php echo $r['dye_tf8'];?>" placeholder="4-5 Cross Staining">
                                        </div>
                                    </div>
                                    <!-- DYE TRANSFER END-->
                                    <div class="form-group">
                                        <?php if($noitem!=""){ ?>
                                        <button type="submit" class="btn btn-primary pull-right" name="colorfastness_save" value="save"><i class="fa fa-save"></i> Simpan</button>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
<?php
if($_POST['physical_save']=="save" and $cek>0){
	$sqlPHY=mysqli_query($con,"UPDATE tbl_std_tq_ua SET
		  `flamability`='$_POST[flamability]',
          `bow`='$_POST[bow]',
          `skew`='$_POST[skew]',
          `snag_mace1`='$_POST[snag_mace1]',
          `snag_mace2`='$_POST[snag_mace2]',
          `snag_mace3`='$_POST[snag_mace3]',
          `snag_mace4`='$_POST[snag_mace4]',
          `snag_mace5`='$_POST[snag_mace5]',
          `snag_mace6`='$_POST[snag_mace6]',
          `burst_str`='$_POST[burst_str]',
          `growth1`='$_POST[growth1]',
          `growth2`='$_POST[growth2]',
          `fibercontent1`='$_POST[fibercontent1]',
          `fibercontent2`='$_POST[fibercontent2]',
          `fibercontent3`='$_POST[fibercontent3]',
          `pillr_tumble1`='$_POST[pillr_tumble1]',
          `pillr_tumble2`='$_POST[pillr_tumble2]',
          `pillr_tumble3`='$_POST[pillr_tumble3]',
          `pillr_tumble4`='$_POST[pillr_tumble4]',
          `snag_pod1`='$_POST[snag_pod1]',
          `snag_pod2`='$_POST[snag_pod2]',
          `thickness1`='$_POST[thickness1]',
          `thickness2`='$_POST[thickness2]',
          `appearance1`='$_POST[appearance1]',
          `appearance2`='$_POST[appearance2]',
          `pill_locus1`='$_POST[pill_locus1]',
          `pill_locus2`='$_POST[pill_locus2]',
          `f_count1`='$_POST[f_count1]',
          `f_count2`='$_POST[f_count2]',
          `f_weight`='$_POST[f_weight]',
          `f_width`='$_POST[f_width]',
          `shrinkage1`='$_POST[shrinkage1]',
          `shrinkage2`='$_POST[shrinkage2]',
          `spirality1`='$_POST[spirality1]',
          `spirality2`='$_POST[spirality2]',
          `abration1`='$_POST[abration1]',
          `abration2`='$_POST[abration2]',
          `stretch1`='$_POST[stretch1]',
          `stretch2`='$_POST[stretch2]',
          `stretch3`='$_POST[stretch3]',
          `stretch4`='$_POST[stretch4]',
          `stretch5`='$_POST[stretch5]',
          `stretch6`='$_POST[stretch6]',
          `recovery1`='$_POST[recovery1]',
          `recovery2`='$_POST[recovery2]',
          `recovery3`='$_POST[recovery3]',
          `recovery4`='$_POST[recovery4]',
          `recovery5`='$_POST[recovery5]',
          `recovery6`='$_POST[recovery6]',
          `heat_shrinkage1`='$_POST[heat_shrinkage1]',
          `heat_shrinkage2`='$_POST[heat_shrinkage2]',
          `tgl_update`=now(),
          `ip`='$_SERVER[REMOTE_ADDR]'
        WHERE `no_item`='$_GET[no_item]'");
        if($sqlPHY){
            echo "<script>swal({
    title: 'Data Standart Physical Telah Tersimpan',
    text: 'Klik Ok untuk input data kembali',
    type: 'success',
    }).then((result) => {
    if (result.value) {

        window.location.href='StdUA-$noitem';
    }
    });</script>";
    }else{
            echo "<script>swal({
    title: 'Data Standart Physical Gagal Tersimpan',
    text: 'Klik Ok untuk input data kembali',
    type: 'error',
    }).then((result) => {
    if (result.value) {

        window.location.href='StdUA-$noitem';
    }
    });</script>";
    }
}else if($_POST['physical_save']=="save"){
    $sqlPHY=mysqli_query($con,"INSERT INTO tbl_std_tq_ua SET
            `no_item`='$_GET[no_item]',
            `flamability`='$_POST[flamability]',
          `bow`='$_POST[bow]',
          `skew`='$_POST[skew]',
          `snag_mace1`='$_POST[snag_mace1]',
          `snag_mace2`='$_POST[snag_mace2]',
          `snag_mace3`='$_POST[snag_mace3]',
          `snag_mace4`='$_POST[snag_mace4]',
          `snag_mace5`='$_POST[snag_mace5]',
          `snag_mace6`='$_POST[snag_mace6]',
          `burst_str`='$_POST[burst_str]',
          `growth1`='$_POST[growth1]',
          `growth2`='$_POST[growth2]',
          `fibercontent1`='$_POST[fibercontent1]',
          `fibercontent2`='$_POST[fibercontent2]',
          `fibercontent3`='$_POST[fibercontent3]',
          `pillr_tumble1`='$_POST[pillr_tumble1]',
          `pillr_tumble2`='$_POST[pillr_tumble2]',
          `pillr_tumble3`='$_POST[pillr_tumble3]',
          `pillr_tumble4`='$_POST[pillr_tumble4]',
          `snag_pod1`='$_POST[snag_pod1]',
          `snag_pod2`='$_POST[snag_pod2]',
          `thickness1`='$_POST[thickness1]',
          `thickness2`='$_POST[thickness2]',
          `appearance1`='$_POST[appearance1]',
          `appearance2`='$_POST[appearance2]',
          `pill_locus1`='$_POST[pill_locus1]',
          `pill_locus2`='$_POST[pill_locus2]',
          `f_count1`='$_POST[f_count1]',
          `f_count2`='$_POST[f_count2]',
          `f_weight`='$_POST[f_weight]',
          `f_width`='$_POST[f_width]',
          `shrinkage1`='$_POST[shrinkage1]',
          `shrinkage2`='$_POST[shrinkage2]',
          `spirality1`='$_POST[spirality1]',
          `spirality2`='$_POST[spirality2]',
          `abration1`='$_POST[abration1]',
          `abration2`='$_POST[abration2]',
          `stretch1`='$_POST[stretch1]',
          `stretch2`='$_POST[stretch2]',
          `stretch3`='$_POST[stretch3]',
          `stretch4`='$_POST[stretch4]',
          `stretch5`='$_POST[stretch5]',
          `stretch6`='$_POST[stretch6]',
          `recovery1`='$_POST[recovery1]',
          `recovery2`='$_POST[recovery2]',
          `recovery3`='$_POST[recovery3]',
          `recovery4`='$_POST[recovery4]',
          `recovery5`='$_POST[recovery5]',
          `recovery6`='$_POST[recovery6]',
          `heat_shrinkage1`='$_POST[heat_shrinkage1]',
          `heat_shrinkage2`='$_POST[heat_shrinkage2]',
          `tgl_buat`=now(),
          `tgl_update`=now(),
          `ip`='$_SERVER[REMOTE_ADDR]'");
    if($sqlPHY){
            echo "<script>swal({
    title: 'Data Standart Physical Telah Tersimpan',
    text: 'Klik Ok untuk input data kembali',
    type: 'success',
    }).then((result) => {
    if (result.value) {

        window.location.href='StdUA-$noitem';
    }
    });</script>";
    }else{
            echo "<script>swal({
    title: 'Data Standart Physical Gagal Tersimpan',
    text: 'Klik Ok untuk input data kembali',
    type: 'error',
    }).then((result) => {
    if (result.value) {

        window.location.href='StdUA-$noitem';
    }
    });</script>";
    }
}
if($_POST['functional_save']=="save" and $cek>0){
    $sqlFPH=mysqli_query($con,"UPDATE tbl_std_tq_ua SET
    `wick1`='$_POST[wick1]',
    `wick2`='$_POST[wick2]',
    `wick3`='$_POST[wick3]',
    `wick4`='$_POST[wick4]',
    `water_repp1`='$_POST[water_repp1]',
    `water_repp2`='$_POST[water_repp2]',
    `water_repp3`='$_POST[water_repp3]',
    `absorbency1`='$_POST[absorbency1]',
    `absorbency2`='$_POST[absorbency2]',
    `absorbency3`='$_POST[absorbency3]',
    `absorbency4`='$_POST[absorbency4]',
    `ph`='$_POST[ph]',
    `dry_time1`='$_POST[dry_time1]',
    `dry_time2`='$_POST[dry_time2]',
    `soil1`='$_POST[soil1]',
    `soil2`='$_POST[soil2]',
    `tgl_update`=now(),
    `ip`='$_SERVER[REMOTE_ADDR]'
    WHERE `no_item`='$_GET[no_item]'");
    if($sqlFPH){
        echo "<script>swal({
    title: 'Data Standart Functional Telah Tersimpan',
    text: 'Klik Ok untuk input data kembali',
    type: 'success',
    }).then((result) => {
    if (result.value) {

        window.location.href='StdUA-$noitem';
    }
    });</script>";
    }else{
            echo "<script>swal({
    title: 'Data Standart Functional Gagal Tersimpan',
    text: 'Klik Ok untuk input data kembali',
    type: 'error',
    }).then((result) => {
    if (result.value) {

        window.location.href='StdUA-$noitem';
    }
    });</script>";
    }
}else if($_POST['functional_save']=="save"){
    $sqlFPH=mysqli_query($con,"INSERT INTO tbl_std_tq_ua SET
    `no_item`='$_GET[no_item]',
    `wick1`='$_POST[wick1]',
    `wick2`='$_POST[wick2]',
    `wick3`='$_POST[wick3]',
    `wick4`='$_POST[wick4]',
    `water_repp1`='$_POST[water_repp1]',
    `water_repp2`='$_POST[water_repp2]',
    `water_repp3`='$_POST[water_repp3]',
    `absorbency1`='$_POST[absorbency1]',
    `absorbency2`='$_POST[absorbency2]',
    `absorbency3`='$_POST[absorbency3]',
    `absorbency4`='$_POST[absorbency4]',
    `ph`='$_POST[ph]',
    `dry_time1`='$_POST[dry_time1]',
    `dry_time2`='$_POST[dry_time2]',
    `soil1`='$_POST[soil1]',
    `soil2`='$_POST[soil2]',
    `tgl_buat`=now(),
    `tgl_update`=now(),
    `ip`='$_SERVER[REMOTE_ADDR]'");
    if($sqlFPH){
        echo "<script>swal({
    title: 'Data Standart Functional Telah Tersimpan',
    text: 'Klik Ok untuk input data kembali',
    type: 'success',
    }).then((result) => {
    if (result.value) {

        window.location.href='StdUA-$noitem';
    }
    });</script>";
    }else{
            echo "<script>swal({
    title: 'Data Standart Functional Gagal Tersimpan',
    text: 'Klik Ok untuk input data kembali',
    type: 'error',
    }).then((result) => {
    if (result.value) {

        window.location.href='StdUA-$noitem';
    }
    });</script>";
    }
}
if($_POST['colorfastness_save']=="save" and $cek>0){
    $sqlCLR=mysqli_query($con,"UPDATE tbl_std_tq_ua SET
    `wash1`='$_POST[wash1]',
    `wash2`='$_POST[wash2]',
    `wash3`='$_POST[wash3]',
    `wash4`='$_POST[wash4]',
    `wash5`='$_POST[wash5]',
    `wash6`='$_POST[wash6]',
    `wash7`='$_POST[wash7]',
    `wash8`='$_POST[wash8]',
    `water1`='$_POST[water1]',
    `water2`='$_POST[water2]',
    `water3`='$_POST[water3]',
    `water4`='$_POST[water4]',
    `water5`='$_POST[water5]',
    `water6`='$_POST[water6]',
    `water7`='$_POST[water7]',
    `water8`='$_POST[water8]',
    `acid1`='$_POST[acid1]',
    `acid2`='$_POST[acid2]',
    `acid3`='$_POST[acid3]',
    `acid4`='$_POST[acid4]',
    `acid5`='$_POST[acid5]',
    `acid6`='$_POST[acid6]',
    `acid7`='$_POST[acid7]',
    `acid8`='$_POST[acid8]',
    `alkaline1`='$_POST[alkaline1]',
    `alkaline2`='$_POST[alkaline2]',
    `alkaline3`='$_POST[alkaline3]',
    `alkaline4`='$_POST[alkaline4]',
    `alkaline5`='$_POST[alkaline5]',
    `alkaline6`='$_POST[alkaline6]',
    `alkaline7`='$_POST[alkaline7]',
    `alkaline8`='$_POST[alkaline8]',
    `crock1`='$_POST[crock1]',
    `crock2`='$_POST[crock2]',
    `phenolic`='$_POST[phenolic]',
    `light`='$_POST[light]',
    `cm_oven1`='$_POST[cm_oven1]',
    `cm_oven2`='$_POST[cm_oven2]',
    `cm1`='$_POST[cm1]',
    `cm2`='$_POST[cm2]',
    `light_pers1`='$_POST[light_pers1]',
    `light_pers2`='$_POST[light_pers2]',
    `saliva`='$_POST[saliva]',
    `chlorin`='$_POST[chlorin]',
    `non_chlorin`='$_POST[non_chlorin]',
    `dye_tf1`='$_POST[dye_tf1]',
    `dye_tf2`='$_POST[dye_tf2]',
    `dye_tf3`='$_POST[dye_tf3]',
    `dye_tf4`='$_POST[dye_tf4]',
    `dye_tf5`='$_POST[dye_tf5]',
    `dye_tf6`='$_POST[dye_tf6]',
    `dye_tf7`='$_POST[dye_tf7]',
    `dye_tf8`='$_POST[dye_tf8]',
    `tgl_update`=now(),
    `ip`='$_SERVER[REMOTE_ADDR]'
    WHERE `no_item`='$_GET[no_item]'");
    if($sqlCLR){
        echo "<script>swal({
    title: 'Data Standart Colorfastness Telah Tersimpan',
    text: 'Klik Ok untuk input data kembali',
    type: 'success',
    }).then((result) => {
    if (result.value) {

        window.location.href='StdUA-$noitem';
    }
    });</script>";
    }else{
            echo "<script>swal({
    title: 'Data Standart Colorfastness Gagal Tersimpan',
    text: 'Klik Ok untuk input data kembali',
    type: 'error',
    }).then((result) => {
    if (result.value) {

        window.location.href='StdUA-$noitem';
    }
    });</script>";
    }
    }else if($_POST['colorfastness_save']=="save"){
    $sqlCLR=mysqli_query($con,"INSERT INTO tbl_std_tq_ua SET
    `no_item`='$_GET[no_item]',
    `wash1`='$_POST[wash1]',
    `wash2`='$_POST[wash2]',
    `wash3`='$_POST[wash3]',
    `wash4`='$_POST[wash4]',
    `wash5`='$_POST[wash5]',
    `wash6`='$_POST[wash6]',
    `wash7`='$_POST[wash7]',
    `wash8`='$_POST[wash8]',
    `water1`='$_POST[water1]',
    `water2`='$_POST[water2]',
    `water3`='$_POST[water3]',
    `water4`='$_POST[water4]',
    `water5`='$_POST[water5]',
    `water6`='$_POST[water6]',
    `water7`='$_POST[water7]',
    `water8`='$_POST[water8]',
    `acid1`='$_POST[acid1]',
    `acid2`='$_POST[acid2]',
    `acid3`='$_POST[acid3]',
    `acid4`='$_POST[acid4]',
    `acid5`='$_POST[acid5]',
    `acid6`='$_POST[acid6]',
    `acid7`='$_POST[acid7]',
    `acid8`='$_POST[acid8]',
    `alkaline1`='$_POST[alkaline1]',
    `alkaline2`='$_POST[alkaline2]',
    `alkaline3`='$_POST[alkaline3]',
    `alkaline4`='$_POST[alkaline4]',
    `alkaline5`='$_POST[alkaline5]',
    `alkaline6`='$_POST[alkaline6]',
    `alkaline7`='$_POST[alkaline7]',
    `alkaline8`='$_POST[alkaline8]',
    `crock1`='$_POST[crock1]',
    `crock2`='$_POST[crock2]',
    `phenolic`='$_POST[phenolic]',
    `light`='$_POST[light]',
    `cm_oven1`='$_POST[cm_oven1]',
    `cm_oven2`='$_POST[cm_oven2]',
    `cm1`='$_POST[cm1]',
    `cm2`='$_POST[cm2]',
    `light_pers1`='$_POST[light_pers1]',
    `light_pers2`='$_POST[light_pers2]',
    `saliva`='$_POST[saliva]',
    `chlorin`='$_POST[chlorin]',
    `non_chlorin`='$_POST[non_chlorin]',
    `dye_tf1`='$_POST[dye_tf1]',
    `dye_tf2`='$_POST[dye_tf2]',
    `dye_tf3`='$_POST[dye_tf3]',
    `dye_tf4`='$_POST[dye_tf4]',
    `dye_tf5`='$_POST[dye_tf5]',
    `dye_tf6`='$_POST[dye_tf6]',
    `dye_tf7`='$_POST[dye_tf7]',
    `dye_tf8`='$_POST[dye_tf8]',
    `tgl_buat`=now(),
    `tgl_update`=now(),
    `ip`='$_SERVER[REMOTE_ADDR]'");
    if($sqlCLR){
        echo "<script>swal({
    title: 'Data Standart Colorfastness Telah Tersimpan',
    text: 'Klik Ok untuk input data kembali',
    type: 'success',
    }).then((result) => {
    if (result.value) {

        window.location.href='StdUA-$noitem';
    }
    });</script>";
    }else{
            echo "<script>swal({
    title: 'Data Standart Colorfastness Gagal Tersimpan',
    text: 'Klik Ok untuk input data kembali',
    type: 'error',
    }).then((result) => {
    if (result.value) {

        window.location.href='StdUA-$noitem';
    }
    });</script>";
    }
}
?>