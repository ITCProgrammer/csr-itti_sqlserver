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
	
function hitung(){
	var rcott=document.forms['form1']['rfc_cott'].value;
	var rpoly=document.forms['form1']['rfc_poly'].value;
	var relastane=document.forms['form1']['rfc_ela'].value;
	var rtotal;
	    if(rcott>0){rcott=document.forms['form1']['rfc_cott'].value;}else{ rcott=0;}
		if(rpoly>0){rpoly=document.forms['form1']['rfc_poly'].value;}else{ rpoly=0;}
		if(relastane>0){relastane=document.forms['form1']['rfc_ela'].value;}else{relastane=0;}
		rtotal=roundToTwo((parseFloat(rcott)+parseFloat(rpoly)+parseFloat(relastane))).toFixed(2);
		document.forms['form1']['rfc_total'].value=rtotal;
}

</script>
<script>
	function tampil(){
	if(document.forms['form1']['jns_test'].value=="FLAMMABILITY"){
		$("#fla1").css("display", "");  // To unhide
		$("#stat_fla").css("display", "");  // To unhide
	}else{
		$("#fla1").css("display", "none");  // To hide
		$("#stat_fla").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="FIBER CONTENT"){
		$("#fib2").css("display", "");  // To unhide
		$("#stat_fib").css("display", "");  // To unhide
	}else{
		$("#fib2").css("display", "none");  // To hide
		$("#stat_fib").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="FABRIC COUNT"){
		$("#fc3").css("display", "");  // To unhide
		$("#fc3w").css("display", "");  // To unhide
		$("#stat_fc").css("display", "");  // To unhide
	}else{
		$("#fc3").css("display", "none");  // To hide
		$("#fc3w").css("display", "none");  // To hide
		$("#stat_fc").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="FABRIC WEIGHT & SHRINKAGE & SPIRALITY"){
		$("#fc4").css("display", "");  // To unhide 
		$("#stat_fwss").css("display", "");  // To unhide 
	}else{
		$("#fc4").css("display", "none");  // To hide
		$("#stat_fwss").css("display", "none");  // To hide
	}	
	if(document.forms['form1']['jns_test'].value=="FABRIC WEIGHT & SHRINKAGE & SPIRALITY"){
		$("#fc5").css("display", "");  // To unhide 
		$("#stat_fwss").css("display", "");  // To unhide 
	}else{
		$("#fc5").css("display", "none");  // To hide
		$("#stat_fwss").css("display", "none");  // To hide
	}	
	if(document.forms['form1']['jns_test'].value=="BOW & SKEW"){
		$("#fc6").css("display", "");  // To unhide
		$("#fc6w").css("display", "");  // To unhide
		$("#stat_bsk").css("display", "");  // To unhide
	}else{
		$("#fc6").css("display", "none");  // To hide
		$("#fc6w").css("display", "none");  // To hide
		$("#stat_bsk").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="FABRIC WEIGHT & SHRINKAGE & SPIRALITY"){
		$("#fc7").css("display", "");  // To unhide
		$("#stat_fwss").css("display", "");  // To unhide 
	}else{
		$("#fc7").css("display", "none");  // To hide
		$("#stat_fwss").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="FABRIC WEIGHT & SHRINKAGE & SPIRALITY"){
		$("#fc24").css("display", "");  // To unhide
		$("#stat_fwss").css("display", "");  // To unhide 
	}else{
		$("#fc24").css("display", "none");  // To hide
		$("#stat_fwss").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="PILLING MARTINDLE"){
		$("#fc8").css("display", "");  // To unhide
		$("#stat_pm").css("display", "");  // To unhide 
	}else{
		$("#fc8").css("display", "none");  // To hide
		$("#stat_pm").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="PILLING BOX"){
		$("#fc9").css("display", "");  // To unhide
		$("#stat_pb").css("display", "");  // To unhide
	}else{
		$("#fc9").css("display", "none");  // To hide
		$("#stat_pb").css("display", "none");  // To hide
	}	
	if(document.forms['form1']['jns_test'].value=="PILLING RANDOM TUMBLER"){
		$("#fc10").css("display", "");  // To unhide
		$("#stat_prt").css("display", "");  // To unhide
	}else{
		$("#fc10").css("display", "none");  // To hide
		$("#stat_prt").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="ABRATION"){
		$("#fc11").css("display", "");  // To unhide
		$("#stat_abr").css("display", "");  // To unhide
	}else{
		$("#fc11").css("display", "none");  // To hide
		$("#stat_abr").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="SNAGGING MACE"){
		$("#fc12").css("display", "");  // To unhide
		$("#stat_sm").css("display", "");  // To unhide
	}else{
		$("#fc12").css("display", "none");  // To hide
		$("#stat_sm").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="SNAGGING POD"){
		$("#fc13").css("display", "");  // To unhide
		$("#stat_sp").css("display", "");  // To unhide
	}else{
		$("#fc13").css("display", "none");  // To hide
		$("#stat_sp").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="BEAN BAG"){
		$("#fc14").css("display", "");  // To unhide
		$("#stat_sb").css("display", "");  // To unhide
	}else{
		$("#fc14").css("display", "none");  // To hide
		$("#stat_sb").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="BURSTING STRENGTH"){
		$("#fc15").css("display", "");  // To unhide
		$("#fc15a").css("display", "");  // To unhide
		$("#stat_bs").css("display", "");  // To unhide
	}else{
		$("#fc15").css("display", "none");  // To hide
		$("#fc15a").css("display", "none");  // To hide
		$("#stat_bs").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="THICKNESS"){
		$("#fc16").css("display", "");  // To unhide
		$("#fc16w").css("display", "");  // To unhide
		$("#stat_th").css("display", "");  // To unhide
	}else{
		$("#fc16").css("display", "none");  // To hide
		$("#fc16w").css("display", "none");  // To hide
		$("#stat_th").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="STRETCH & RECOVERY"){
		$("#fc17").css("display", "");  // To unhide
		$("#stat_sr").css("display", "");  // To unhide
	}else{
		$("#fc17").css("display", "none");  // To hide
		$("#stat_sr").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="STRETCH & RECOVERY"){
		$("#fc18").css("display", "");  // To unhide 18
		$("#stat_sr").css("display", "");  // To unhide
	}else{
		$("#fc18").css("display", "none");  // To hide
		$("#stat_sr").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="GROWTH"){
		$("#fc19").css("display", "");  // To unhide
		$("#fc25").css("display", "");  // To unhide
		$("#stat_gr").css("display", "");  // To unhide
	}else{
		$("#fc19").css("display", "none");  // To hide
		$("#fc25").css("display", "none");  // To hide
		$("#stat_gr").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="APPEARANCE"){
		$("#fc20").css("display", "");  // To unhide
		$("#stat_ap").css("display", "");  // To unhide
	}else{
		$("#fc20").css("display", "none");  // To hide
		$("#stat_ap").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="HEAT SHRINKAGE"){
		$("#fc21").css("display", "");  // To unhide
		$("#stat_hs").css("display", "");  // To unhide
	}else{
		$("#fc21").css("display", "none");  // To hide
		$("#stat_hs").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="FIBRE/FUZZ"){
		$("#fc22").css("display", "");  // To unhide
		$("#stat_ff").css("display", "");  // To unhide
	}else{
		$("#fc22").css("display", "none");  // To hide
		$("#stat_ff").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="PILLING LOCUS"){
		$("#fc23").css("display", "");  // To unhide
		$("#stat_pl").css("display", "");  // To unhide 
	}else{
		$("#fc23").css("display", "none");  // To hide
		$("#stat_pl").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="ODOUR"){
		$("#fc26").css("display", "");  // To unhide
		$("#stat_odour").css("display", "");  // To unhide 
	}else{
		$("#fc26").css("display", "none");  // To hide
		$("#stat_odour").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="CURLING"){
		$("#fc27").css("display", "");  // To unhide
		$("#stat_curling").css("display", "");  // To unhide 
	}else{
		$("#fc27").css("display", "none");  // To hide
		$("#stat_curling").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="NEDLE"){
		$("#fc28").css("display", "");  // To unhide
		$("#stat_nedle").css("display", "");  // To unhide 
	}else{
		$("#fc28").css("display", "none");  // To hide
		$("#stat_nedle").css("display", "none");  // To hide
	}
}
function tampil1(){
	if(document.forms['form3']['jns_test1'].value=="WICKING"){
		$("#f1").css("display", "");  // To unhide
		$("#stat_wic").css("display", "");  // To unhide
	}else{
		$("#f1").css("display", "none");  // To hide
		$("#stat_wic").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="WICKING"){
		$("#f27").css("display", "");  // To unhide
		$("#stat_wic").css("display", "");  // To unhide
	}else{
		$("#f27").css("display", "none");  // To hide
		$("#stat_wic").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="ABSORBENCY"){
		$("#f2").css("display", "");  // To unhide
		$("#stat_abs").css("display", "");  // To unhide
	}else{
		$("#f2").css("display", "none");  // To hide
		$("#stat_abs").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="ABSORBENCY"){
		$("#f25").css("display", "");  // To unhide
		$("#stat_abs").css("display", "");  // To unhide
	}else{
		$("#f25").css("display", "none");  // To hide
		$("#stat_abs").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="DRYING TIME"){
		$("#f3").css("display", "");  // To unhide
		$("#stat_dry").css("display", "");  // To unhide
	}else{
		$("#f3").css("display", "none");  // To hide
		$("#stat_dry").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="DRYING TIME"){
		$("#f26").css("display", "");  // To unhide
		$("#stat_dry").css("display", "");  // To unhide
	}else{
		$("#f26").css("display", "none");  // To hide
		$("#stat_dry").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="WATER REPPELENT"){
		$("#f4").css("display", "");  // To unhide
		$("#stat_wp").css("display", "");  // To unhide
	}else{
		$("#f4").css("display", "none");  // To hide
		$("#stat_wp").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="WATER REPPELENT"){
		$("#f6").css("display", "");  // To unhide
		$("#stat_wp1").css("display", "");  // To unhide
	}else{
		$("#f6").css("display", "none");  // To hide
		$("#stat_wp1").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="PH"){
		$("#f5").css("display", "");  // To unhide
		$("#stat_ph").css("display", "");  // To unhide
	}else{
		$("#f5").css("display", "none");  // To hide
		$("#stat_ph").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="SOIL RELEASE"){
		$("#f24").css("display", "");  // To unhide
		$("#stat_sor").css("display", "");  // To unhide
	}else{
		$("#f24").css("display", "none");  // To hide
		$("#stat_sor").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="HUMIDITY"){
		$("#f28").css("display", "");  // To unhide
		$("#stat_hum").css("display", "");  // To unhide
	}else{
		$("#f28").css("display", "none");  // To hide
		$("#stat_hum").css("display", "none");  // To hide
	}
}
function tampil2(){
	if(document.forms['form2']['jns_test2'].value=="WASHING"){
		$("#c1").css("display", "");  // To unhide
		$("#c1w").css("display", "");  // To unhide
		$("#stat_wf").css("display", "");  // To unhide
	}else{
		$("#c1").css("display", "none");  // To hide
		$("#c1w").css("display", "none");  // To hide
		$("#stat_wf").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="WATER"){
		$("#c2").css("display", "");  // To unhide
		$("#c2w").css("display", "");  // To unhide
		$("#stat_wtr").css("display", "");  // To unhide
	}else{
		$("#c2").css("display", "none");  // To hide
		$("#c2w").css("display", "none");  // To hide
		$("#stat_wtr").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="PERSPIRATION ACID"){
		$("#c3").css("display", "");  // To unhide
		$("#c3w").css("display", "");  // To unhide
		$("#stat_pac").css("display", "");  // To unhide
	}else{
		$("#c3").css("display", "none");  // To hide
		$("#c3w").css("display", "none");  // To hide
		$("#stat_pac").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="PERSPIRATION ALKALINE"){
		$("#c4").css("display", "");  // To unhide
		$("#c4w").css("display", "");  // To unhide
		$("#stat_pal").css("display", "");  // To unhide
	}else{
		$("#c4").css("display", "none");  // To hide
		$("#c4w").css("display", "none");  // To hide
		$("#stat_pal").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="CROCKING"){
		$("#c5").css("display", "");  // To unhide
		$("#stat_cr").css("display", "");  // To unhide
	}else{
		$("#c5").css("display", "none");  // To hide
		$("#stat_cr").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="PHENOLIC YELLOWING"){
		$("#c6").css("display", "");  // To unhide
		$("#stat_py").css("display", "");  // To unhide
	}else{
		$("#c6").css("display", "none");  // To hide
		$("#stat_py").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="COLOR MIGRATION-OVEN TEST"){
		$("#c7").css("display", "");  // To unhide
		$("#stat_cmo").css("display", "");  // To unhide
	}else{
		$("#c7").css("display", "none");  // To hide
		$("#stat_cmo").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="COLOR MIGRATION"){
		$("#c8").css("display", "");  // To unhide
		$("#stat_cm").css("display", "");  // To unhide
	}else{
		$("#c8").css("display", "none");  // To hide
		$("#stat_cm").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="LIGHT"){
		$("#c9").css("display", "");  // To unhide
		$("#stat_lg").css("display", "");  // To unhide
	}else{
		$("#c9").css("display", "none");  // To hide
		$("#stat_lg").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="LIGHT PERSPIRATION"){
		$("#c10").css("display", "");  // To unhide
		$("#stat_lp").css("display", "");  // To unhide
	}else{
		$("#c10").css("display", "none");  // To hide
		$("#stat_lp").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="SALIVA"){
		$("#c11").css("display", "");  // To unhide
		$("#stat_slv").css("display", "");  // To unhide
	}else{
		$("#c11").css("display", "none");  // To hide
		$("#stat_slv").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="BLEEDING"){
		$("#c12").css("display", "");  // To unhide
		$("#stat_bld").css("display", "");  // To unhide
	}else{
		$("#c12").css("display", "none");  // To hide
		$("#stat_bld").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="CHLORIN & NON-CHLORIN"){
		$("#c13").css("display", "");  // To unhide
		$("#stat_chl").css("display", "");  // To unhide
	}else{
		$("#c13").css("display", "none");  // To hide
		$("#stat_chl").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="CHLORIN & NON-CHLORIN"){
		$("#c14").css("display", "");  // To unhide
		$("#stat_nchl").css("display", "");  // To unhide
	}else{
		$("#c14").css("display", "none");  // To hide
		$("#stat_nchl").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="DYE TRANSFER"){
		$("#c15").css("display", "");  // To unhide
		$("#c15w").css("display", "");  // To unhide
		$("#stat_dye").css("display", "");  // To unhide
	}else{
		$("#c15").css("display", "none");  // To hide
		$("#c15w").css("display", "none");  // To hide
		$("#stat_dye").css("display", "none");  // To hide
	}
}
</script>
<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
$nodemand=$_GET['nodemand'];
$nohanger=$_GET['no_hanger'];
$noitem=$_GET['no_item'];
$sqlCekR=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',rfc_note,rph_note, rabr_note, rbas_note, rdry_note, rfla_note, rfwe_note, rfwi_note, rburs_note, rrepp_note, rwick_note, rabsor_note, rapper_note, rfiber_note, rpillb_note, rpillm_note, rpillr_note, rthick_note, rgrowth_note, rrecover_note, rstretch_note, rsns_note, rsnab_note, rsnam_note, rsnap_note, rwash_note, rwater_note, racid_note, ralkaline_note, rcrock_note, rphenolic_note, rcm_printing_note, rcm_dye_note, rlight_note, rlight_pers_note, rsaliva_note, rh_shrinkage_note, rfibre_note,rpilll_note,rsoil_note,rapperss_note,rbleeding_note,rchlorin_note,rdye_tf_note,rhumidity_note,rodour_note,rnedle_note) AS rnote_g FROM tbl_tq_randomtest WHERE no_hanger='$nohanger' ORDER BY id DESC LIMIT 1");
$cekR=mysqli_num_rows($sqlCekR);
$rcekR=mysqli_fetch_array($sqlCekR);
$sqlCek2=mysqli_query($con,"SELECT * FROM tbl_tq_nokk WHERE no_hanger='$nohanger' LIMIT 1");
$cek2=mysqli_num_rows($sqlCek2);
$rcek2=mysqli_fetch_array($sqlCek2);
$sqlTR=mysqli_query($con,"SELECT * FROM tbl_tq_temp_random WHERE no_hanger='$nohanger' LIMIT 1");
$cekTR=mysqli_num_rows($sqlTR);
$rcekTR=mysqli_fetch_array($sqlTR);

$sqlTR2=mysqli_query($con,"SELECT * FROM tbl_tq_temp_random2 WHERE no_hanger='$nohanger' LIMIT 1");
$cekTR2=mysqli_num_rows($sqlTR2);
$rcekTR2=mysqli_fetch_array($sqlTR2);

$sqlRW=mysqli_query($con,"SELECT * FROM tbl_tq_random_warna WHERE no_hanger='$nohanger' ORDER BY id DESC LIMIT 1");
$cekRW=mysqli_num_rows($sqlRW);
$rcekRW=mysqli_fetch_array($sqlRW);
?>	
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
 	<div class="box box-info">
   		<div class="box-header with-border">
    		<h3 class="box-title">Random Testing Kartu Kerja</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
  		</div>
		<div class="box-body"> 
			<div class="col-md-6">
				<div class="form-group">
					<label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
					<div class="col-sm-4">
						<input name="no_hanger" type="text" class="form-control" id="no_hanger" placeholder="No Hanger" onchange="window.location='RandomhNew-'+this.value"
							value="<?php echo $_GET['no_hanger'];?>" required>  
					</div>
					<div class="col-sm-4">
						<input name="no_item" type="text" class="form-control" id="no_item" placeholder="No Item" onchange="window.location='RandomNew-'+this.value"
							value="<?php if($cek2>0){echo $rcek2['no_item'];}else {echo $_GET['no_item'];}?>" required>
					</div>	
				</div>
				<?php
				if($nohanger!=""){
				?>
				<div class="form-group">
					<label for="jenis_kain" class="col-sm-3 control-label">Jenis Kain</label>
					<div class="col-sm-8">
						<textarea name="jenis_kain" class="form-control" readonly row="3"><?php if($cek2>0){echo $rcek2['jenis_kain'];}?></textarea>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>	 
		<div class="box-footer"> 
				<!-- <a href="pages/cetak/excel_random.php" target="_blank" class="btn btn-danger pull-left">Cetak</a> -->
		</div>
		<!-- /.box-footer -->
	</div>
</form>
<?php
if($nohanger!=""){	
?>
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
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_1" data-toggle="tab">PHYSICAL</a></li>
					<li><a href="#tab_3" data-toggle="tab">FUNCTIONAL &amp; PH</a></li>
					<li ><a href="#tab_2" data-toggle="tab">COLORFASTNESS</a></li>				
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_1">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
							<div class="form-group">
								<label for="jnstest" class="col-sm-2 control-label">JENIS TES</label>
								<div class="col-sm-4">
									<select name="jns_test" class="form-control select2" id="jns_test" onChange="tampil();" style="width: 100%;">
									<option selected="selected" value="">Pilih</option>
									<option value="FLAMMABILITY">FLAMMABILITY</option>
									<option value="FIBER CONTENT">FIBER CONTENT</option>
									<option value="FABRIC COUNT">FABRIC COUNT</option>
									<option value="BOW & SKEW">BOW &amp; SKEW</option>
									<option value="FABRIC WEIGHT & SHRINKAGE & SPIRALITY">FABRIC WEIGHT &amp; SHRINKAGE &amp; SPIRALITY</option>
									<option value="PILLING MARTINDLE">PILLING MARTINDLE</option>
									<option value="PILLING LOCUS">PILLING LOCUS</option>
									<option value="PILLING BOX">PILLING BOX</option>
									<option value="PILLING RANDOM TUMBLER">PILLING RANDOM TUMBLER</option>
									<option value="ABRATION">ABRATION</option>
									<option value="SNAGGING MACE">SNAGGING MACE</option>
									<option value="SNAGGING POD">SNAGGING POD</option>
									<option value="BEAN BAG">BEAN BAG</option>	  
									<option value="BURSTING STRENGTH">BURSTING STRENGTH</option>
									<option value="THICKNESS">THICKNESS</option>
									<option value="STRETCH & RECOVERY">STRETCH &amp; RECOVERY</option>
									<option value="GROWTH">GROWTH</option>
									<option value="APPEARANCE">APPEARANCE</option>
									<option value="HEAT SHRINKAGE">HEAT SHRINKAGE</option>
									<option value="FIBRE/FUZZ">FIBRE/FUZZ</option>
									<option value="ODOUR">ODOUR</option>
									<option value="CURLING">CURLING</option>
									<option value="NEDLE">NEDLE HOLES & CRACKING</option>
									</select>
								</div>
							</div>
							<!-- FLAMMABILITY BEGIN-->	
							<div class="form-group" id="fla1" style="display:none;">
								<label for="rflamability" class="col-sm-2 control-label">FLAMMABILITY</label>
								<div class="col-sm-2">
									<input name="sts_random" type="hidden" class="form-control" id="sts_random" value="<?php echo $rcekTR['sts'];?>" placeholder="">
									<input name="sts_random2" type="hidden" class="form-control" id="sts_random2" value="<?php echo $rcekTR2['sts'];?>" placeholder="">
									<input name="rflamability" type="text" class="form-control" id="rflamability" value="<?php echo $rcekR['rflamability'];?>" placeholder="FLAMMABILITY">
								</div>
								<div class="col-sm-2">
									<select name="rflamabilityw" class="form-control select2" id="rflamabilityw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rflamabilityw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rflamabilityw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rflamabilityw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rfla_note" maxlength="50" rows="1"><?php echo $rcekR['rfla_note'];?></textarea>
								</div>
							</div>
							<!-- FLAMMABILITY END-->
							<!--<div class="form-group" id="fib2" style="display:none;">
								<label for="rfibercontent" class="col-sm-2 control-label">FIBER CONTENT</label>
								<div class="col-sm-6">
									<input name="rfibercontent" type="text" class="form-control" id="rfibercontent" value="<?php echo $rcekR['rfibercontent'];?>" placeholder="COTT/MODAL/RAYON %, POLYESTER %, ELASTANE %">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rfiber_note" maxlength="50" rows="1"><?php echo $rcekR['rfiber_note'];?></textarea>
								</div>
							</div>-->
							<!-- FIBER CONTENT BEGIN-->	
							<div class="form-group" id="fib2" style="display:none;">
								<label for="rfibercontent" class="col-sm-2 control-label">FIBER CONTENT</label>
								<div class="col-sm-2">
									<div class="input-group"> 
									<input name="rfc_cott" type="text" class="form-control" id="rfc_cott" value="<?php echo $rcekR['rfc_cott'];?>" onChange="hitung();" onBlur="hitung();" placeholder="COTT/MODAL/RAYON" style="text-align: right;" >
									<span class="input-group-addon">&#37;</span>	
									</div>
									<div class="input-group">
									<input name="rfc_poly" type="text" class="form-control" id="rfc_poly" value="<?php echo $rcekR['rfc_poly'];?>" onChange="hitung();" onBlur="hitung();" placeholder="POLYESTER" style="text-align: right;">
									<span class="input-group-addon">&#37;</span>	
									</div>
									<div class="input-group">
									<input name="rfc_ela" type="text" class="form-control" id="rfc_ela" value="<?php echo $rcekR['rfc_elastane'];?>" onChange="hitung();" onBlur="hitung();" placeholder="ELASTANE" style="text-align: right;">
									<span class="input-group-addon">&#37;</span>	
									</div>
									<div class="input-group">
									<input name="rfc_total" class="form-control" id="rfc_total" value="" placeholder="TOTAL" style="text-align: right;" type="number" min="100" max="100">
									<span class="input-group-addon">&#37;</span>	
									</div>
								</div>
								<div class="col-sm-2">
									<input name="std_rfc_cott1" type="text" class="form-control" id="std_rfc_cott1" value="<?php echo $rcek1['std_rfc_cott1'];?>" placeholder="Standard">
									<input name="std_rfc_poly1" type="text" class="form-control" id="std_rfc_poly1" value="<?php echo $rcek1['std_rfc_poly1'];?>" placeholder="Standard">
									<input name="std_rfc_elastane1" type="text" class="form-control" id="std_rfc_elastane1" value="<?php echo $rcek1['std_rfc_elastane1'];?>" placeholder="Standard">
								</div>
								<div class="col-sm-2">
									<select name="rfc_cott1" class="form-control select2" id="rfc_cott1" style="width: 100%;">
										<option <?php if($rcekR['rfc_cott1']==""){?> selected=selected <?php };?>value="">Pilih</option>
										<option <?php if($rcekR['rfc_cott1']=="COTTON"){?> selected=selected <?php };?>value="COTTON">COTTON</option>
										<option <?php if($rcekR['rfc_cott1']=="POLYESTER"){?> selected=selected <?php };?>value="POLYESTER">POLYESTER</option>
										<option <?php if($rcekR['rfc_cott1']=="SPANDEX"){?> selected=selected <?php };?>value="SPANDEX">SPANDEX</option>
										<option <?php if($rcekR['rfc_cott1']=="RAYON"){?> selected=selected <?php };?>value="RAYON">RAYON</option>
										<option <?php if($rcekR['rfc_cott1']=="NYLON"){?> selected=selected <?php };?>value="NYLON">NYLON</option>
										<option <?php if($rcekR['rfc_cott1']=="ELASTANE"){?> selected=selected <?php };?>value="ELASTANE">ELASTANE</option>
										<option <?php if($rcekR['rfc_cott1']=="TENCEL"){?> selected=selected <?php };?>value="TENCEL">TENCEL</option>
										<option <?php if($rcekR['rfc_cott1']=="LYCRA"){?> selected=selected <?php };?>value="LYCRA">LYCRA</option>
										<option <?php if($rcekR['rfc_cott1']=="rPOLYESTER"){?> selected=selected <?php };?>value="rPOLYESTER">rPOLYESTER</option>
										<option <?php if($rcekR['rfc_cott1']=="MODAL"){?> selected=selected <?php };?>value="MODAL">MODAL</option>
										<option <?php if($rcekR['rfc_cott1']=="ACRYLIC"){?> selected=selected <?php };?>value="ACRYLIC">ACRYLIC</option>
										<option <?php if($rcekR['rfc_cott1']=="VISCOSE"){?> selected=selected <?php };?>value="VISCOSE">VISCOSE</option>
									</select>
									<select name="rfc_poly1" class="form-control select2" id="rfc_poly1" style="width: 100%;">
										<option <?php if($rcekR['rfc_poly1']==""){?> selected=selected <?php };?>value="">Pilih</option>
										<option <?php if($rcekR['rfc_poly1']=="COTTON"){?> selected=selected <?php };?>value="COTTON">COTTON</option>
										<option <?php if($rcekR['rfc_poly1']=="POLYESTER"){?> selected=selected <?php };?>value="POLYESTER">POLYESTER</option>
										<option <?php if($rcekR['rfc_poly1']=="SPANDEX"){?> selected=selected <?php };?>value="SPANDEX">SPANDEX</option>
										<option <?php if($rcekR['rfc_poly1']=="RAYON"){?> selected=selected <?php };?>value="RAYON">RAYON</option>
										<option <?php if($rcekR['rfc_poly1']=="NYLON"){?> selected=selected <?php };?>value="NYLON">NYLON</option>
										<option <?php if($rcekR['rfc_poly1']=="ELASTANE"){?> selected=selected <?php };?>value="ELASTANE">ELASTANE</option>
										<option <?php if($rcekR['rfc_poly1']=="TENCEL"){?> selected=selected <?php };?>value="TENCEL">TENCEL</option>
										<option <?php if($rcekR['rfc_poly1']=="LYCRA"){?> selected=selected <?php };?>value="LYCRA">LYCRA</option>
										<option <?php if($rcekR['rfc_poly1']=="rPOLYESTER"){?> selected=selected <?php };?>value="rPOLYESTER">rPOLYESTER</option>
										<option <?php if($rcekR['rfc_poly1']=="MODAL"){?> selected=selected <?php };?>value="MODAL">MODAL</option>
										<option <?php if($rcekR['rfc_poly1']=="ACRYLIC"){?> selected=selected <?php };?>value="ACRYLIC">ACRYLIC</option>
										<option <?php if($rcekR['rfc_poly1']=="VISCOSE"){?> selected=selected <?php };?>value="VISCOSE">VISCOSE</option>
									</select>
									<select name="rfc_ela1" class="form-control select2" id="rfc_ela1" style="width: 100%;">
										<option <?php if($rcekR['rfc_elastane1']==""){?> selected=selected <?php };?>value="">Pilih</option>
										<option <?php if($rcekR['rfc_elastane1']=="COTTON"){?> selected=selected <?php };?>value="COTTON">COTTON</option>
										<option <?php if($rcekR['rfc_elastane1']=="POLYESTER"){?> selected=selected <?php };?>value="POLYESTER">POLYESTER</option>
										<option <?php if($rcekR['rfc_elastane1']=="SPANDEX"){?> selected=selected <?php };?>value="SPANDEX">SPANDEX</option>
										<option <?php if($rcekR['rfc_elastane1']=="RAYON"){?> selected=selected <?php };?>value="RAYON">RAYON</option>
										<option <?php if($rcekR['rfc_elastane1']=="NYLON"){?> selected=selected <?php };?>value="NYLON">NYLON</option>
										<option <?php if($rcekR['rfc_elastane1']=="ELASTANE"){?> selected=selected <?php };?>value="ELASTANE">ELASTANE</option>
										<option <?php if($rcekR['rfc_elastane1']=="TENCEL"){?> selected=selected <?php };?>value="TENCEL">TENCEL</option>
										<option <?php if($rcekR['rfc_elastane1']=="LYCRA"){?> selected=selected <?php };?>value="LYCRA">LYCRA</option>
										<option <?php if($rcekR['rfc_elastane1']=="rPOLYESTER"){?> selected=selected <?php };?>value="rPOLYESTER">rPOLYESTER</option>
										<option <?php if($rcekR['rfc_elastane1']=="MODAL"){?> selected=selected <?php };?>value="MODAL">MODAL</option>
										<option <?php if($rcekR['rfc_elastane1']=="ACRYLIC"){?> selected=selected <?php };?>value="ACRYLIC">ACRYLIC</option>
										<option <?php if($rcekR['rfc_elastane1']=="VISCOSE"){?> selected=selected <?php };?>value="VISCOSE">VISCOSE</option>
									</select>
								</div>
								<div class="col-sm-2">
									<select name="rfc_cott1w" class="form-control select2" id="rfc_cott1w" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rfc_cott1w']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rfc_cott1w']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rfc_cott1w']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
									<select name="rfc_poly1w" class="form-control select2" id="rfc_poly1w" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rfc_poly1w']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rfc_poly1w']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rfc_poly1w']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
									<select name="rfc_ela1w" class="form-control select2" id="rfc_ela1w" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rfc_ela1w']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rfc_ela1w']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rfc_ela1w']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rfiber_note" maxlength="50" rows="1" ><?php echo $rcekR['rfiber_note'];?></textarea>
								</div>
							</div>
							<!-- FIBER CONTENT END-->
							<!-- FABRIC COUNT BEGIN-->
							<div class="form-group" id="fc3" style="display:none;">
								<label for="rfabric_count" class="col-sm-2 control-label">FABRIC COUNT</label>
								<div class="col-sm-2">
									<input name="rwpi" type="text" class="form-control" id="rwpi" value="<?php echo $rcekR['rfc_wpi'];?>" placeholder="WPI">
								</div>
								<div class="col-sm-2">
									<input name="rcpi" type="text" class="form-control" id="rcpi" value="<?php echo $rcekR['rfc_cpi'];?>" placeholder="CPI">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rfc_note" maxlength="50" rows="1"><?php echo $rcekR['rfc_note'];?></textarea>
								</div>
							</div>
							<div class="form-group" id="fc3w" style="display:none;">
								<label for="rfabric_countw" class="col-sm-2 control-label">WARNA</label>
								<div class="col-sm-2">
									<select name="rwpiw" class="form-control select2" id="rwpiw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rwpiw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rwpiw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rwpiw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<select name="rcpiw" class="form-control select2" id="rcpiw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rcpiw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rcpiw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rcpiw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- FABRIC COUNT END-->
							<!-- FABRIC WEIGHT BEGIN-->
							<div class="form-group" id="fc4" style="display:none;">
								<label for="rrfabric_weight" class="col-sm-2 control-label">FABRIC WEIGHT</label>
								<div class="col-sm-2">
									<input name="rfabric_weight" type="text" class="form-control" id="rfabric_weight" value="<?php echo $rcekR['rf_weight'];?>" placeholder="FABRIC WEIGHT">
								</div>
								<div class="col-sm-2">
									<select name="rf_weightw" class="form-control select2" id="rf_weightw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rf_weightw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rf_weightw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rf_weightw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rfwe_note" maxlength="50" rows="1"><?php echo $rcekR['rfwe_note'];?></textarea>
								</div>
							</div>
							<!-- FABRIC WEIGHT END-->
							<!-- FABRIC WIDTH BEGIN-->
							<div class="form-group" id="fc5" style="display:none;">
								<label for="rfabric_width" class="col-sm-2 control-label">FABRIC WIDTH</label>
								<div class="col-sm-2">
									<input name="rfabric_width" type="text" class="form-control" id="rfabric_width" value="<?php echo $rcekR['rf_width'];?>" placeholder="FABRIC WIDTH">
								</div>
								<div class="col-sm-2">
									<select name="rf_widthw" class="form-control select2" id="rf_widthw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rf_widthw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rf_widthw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rf_widthw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rfwi_note" maxlength="50" rows="1"><?php echo $rcekR['rfwi_note'];?></textarea>
								</div>
							</div>
							<!-- FABRIC WIDTH END-->
							<!-- BOW & SKEW BEGIN-->
							<div class="form-group" id="fc6" style="display:none;">
								<label for="rbow_skew" class="col-sm-2 control-label">BOW &amp; SKEW</label>
								<div class="col-sm-2">
									<input name="rbow" type="text" class="form-control" id="rbow" value="<?php echo $rcekR['rbow'];?>" placeholder="BOW">
								</div>
								<div class="col-sm-2">
									<input name="rskew" type="text" class="form-control" id="rskew" value="<?php echo $rcekR['rskew'];?>" placeholder="SKEW">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rbas_note" maxlength="50" rows="1"><?php echo $rcekR['rbas_note'];?></textarea>
								</div>
							</div>
							<div class="form-group" id="fc6w" style="display:none;">
								<label for="rbow_skeww" class="col-sm-2 control-label">WARNA</label>
								<div class="col-sm-2">
									<select name="rboww" class="form-control select2" id="rboww" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rboww']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rboww']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rboww']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<select name="rskeww" class="form-control select2" id="rskeww" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rskeww']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rskeww']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rskeww']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- BOW & SKEW END-->
							<!-- SHRINKAGE & SPIRALITY & APPEARANCE BEGIN-->
							<div class="form-group" id="fc7" style="display:none;">
								<label for="rshrinkage_len" class="col-sm-2 control-label">SHRINKAGE &amp; SPIRALITY</label>
								<div class="col-sm-1">
									<label><input type="checkbox" name="rss_temp" id="rss_temp" class="minimal" value="30" <?php if($rcekR['rss_temp']=='30'){echo "checked";}?>> 30&deg;C &nbsp; &nbsp; &nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="rss_temp" id="rss_temp" class="minimal" value="40" <?php if($rcekR['rss_temp']=='40'){echo "checked";}?>> 40&deg;C
									</label>
									<label><input type="checkbox" name="rss_temp" id="rss_temp" class="minimal" value="60" <?php if($rcekR['rss_temp']=='60'){echo "checked";}?>> 60&deg;C
									</label>
								</div>
								<div class="col-sm-1">
									<label><input type="checkbox" name="rss_washes3" id="rss_washes3" class="minimal" value="3" <?php if($rcekR['rss_washes3']=='3'){echo "checked";}?>> X3 &nbsp; &nbsp; &nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="rss_washes10" id="rss_washes10" class="minimal" value="10" <?php if($rcekR['rss_washes10']=='10'){echo "checked";}?>> X10
									</label>
									<label><input type="checkbox" name="rss_washes15" id="rss_washes15" class="minimal" value="15" <?php if($rcekR['rss_washes15']=='15'){echo "checked";}?>> X15
									</label>
								</div>
								<div class="col-sm-1">
									<label><input type="checkbox" name="rss_linedry" id="rss_linedry" class="minimal" value="1" <?php if($rcekR['rss_linedry']=='1'){echo "checked";}?>> Line Dry
									</label>
									<label><input type="checkbox" name="rss_tumbledry" id="mss_tumbledry" class="minimal" value="1" <?php if($rcekR['rss_tumbledry']=='1'){echo "checked";}?>> Tumble Dry
									</label>
								</div>
								<div class="col-sm-1">
									<input name="rshrinkage_len1" type="text" class="form-control" id="rshrinkage_len1" value="<?php echo $rcekR['rshrinkage_l1'];?>" placeholder="LEN 1">
									<input name="rshrinkage_wid1" type="text" class="form-control" id="rshrinkage_wid1" value="<?php echo $rcekR['rshrinkage_w1'];?>" placeholder="WID 1">
									<input name="rspirality1" type="text" class="form-control" id="rspirality1" value="<?php echo $rcekR['rspirality1'];?>" placeholder="SPI 1">
								</div>
								<div class="col-sm-1">
									<input name="rshrinkage_len2" type="text" class="form-control" id="rshrinkage_len2" value="<?php echo $rcekR['rshrinkage_l2'];?>" placeholder="LEN 2">
									<input name="rshrinkage_wid2" type="text" class="form-control" id="rshrinkage_wid2" value="<?php echo $rcekR['rshrinkage_w2'];?>" placeholder="WID 2">
									<input name="rspirality2" type="text" class="form-control" id="rspirality2" value="<?php echo $rcekR['rspirality2'];?>" placeholder="SPI 2">
								</div>
								<div class="col-sm-1">
									<input name="rshrinkage_len3" type="text" class="form-control" id="rshrinkage_len3" value="<?php echo $rcekR['rshrinkage_l3'];?>" placeholder="LEN 3">
									<input name="rshrinkage_wid3" type="text" class="form-control" id="rshrinkage_wid3" value="<?php echo $rcekR['rshrinkage_w3'];?>" placeholder="WID 3">
									<input name="rspirality3" type="text" class="form-control" id="rspirality3" value="<?php echo $rcekR['rspirality3'];?>" placeholder="SPI 3">
								</div>
								<div class="col-sm-1">
									<input name="rshrinkage_len4" type="text" class="form-control" id="rshrinkage_len4" value="<?php echo $rcekR['rshrinkage_l4'];?>" placeholder="LEN 4">
									<input name="rshrinkage_wid4" type="text" class="form-control" id="rshrinkage_wid4" value="<?php echo $rcekR['rshrinkage_w4'];?>" placeholder="WID 4">
									<input name="rspirality4" type="text" class="form-control" id="rspirality4" value="<?php echo $rcekR['rspirality4'];?>" placeholder="SPI 4">
								</div>
								<div class="col-sm-1">
									<input name="rshrinkage_len5" type="text" class="form-control" id="rshrinkage_len5" value="<?php echo $rcekR['rshrinkage_l5'];?>" placeholder="LEN 5">
									<input name="rshrinkage_wid5" type="text" class="form-control" id="rshrinkage_wid5" value="<?php echo $rcekR['rshrinkage_w5'];?>" placeholder="WID 5">
									<input name="rspirality5" type="text" class="form-control" id="rspirality5" value="<?php echo $rcekR['rspirality5'];?>" placeholder="SPI 5">
								</div>
								<div class="col-sm-1">
									<input name="rshrinkage_len6" type="text" class="form-control" id="rshrinkage_len6" value="<?php echo $rcekR['rshrinkage_l6'];?>" placeholder="LEN 6">
									<input name="rshrinkage_wid6" type="text" class="form-control" id="rshrinkage_wid6" value="<?php echo $rcekR['rshrinkage_w6'];?>" placeholder="WID 6">
									<input name="rspirality6" type="text" class="form-control" id="rspirality6" value="<?php echo $rcekR['rspirality6'];?>" placeholder="SPI 6">
								</div>
								<div class="col-sm-1">
									<select name="rssw" class="form-control select2" id="rssw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rssw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rssw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rssw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-1">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rsns_note" maxlength="50" rows="3"><?php echo $rcekR['rsns_note'];?></textarea>
								</div>
							</div>
							<div class="form-group" id="fc24" style="display:none;">
								<label for="ranapss" class="col-sm-2 control-label">APPEARANCE </label>
								<div class="col-sm-1">
									<input name="rapperss_pf1" type="text" class="form-control" id="rapperss_pf1" value="<?php echo $rcekR['rapperss_pf1'];?>" placeholder="PILLING FACE 1">
									<input name="rapperss_pb1" type="text" class="form-control" id="rapperss_pb1" value="<?php echo $rcekR['rapperss_pb1'];?>" placeholder="PILLING BACK 1">
									<input name="rapperss_ch1" type="text" class="form-control" id="rapperss_ch1" value="<?php echo $rcekR['rapperss_ch1'];?>" placeholder="PASS/FAIL 1">
									<input name="rapperss_cc1" type="text" class="form-control" id="rapperss_cc1" value="<?php echo $rcekR['rapperss_cc1'];?>" placeholder="C.CHANGE 1">
									<input name="rapperss_sf1" type="text" class="form-control" id="rapperss_sf1" value="<?php echo $rcekR['rapperss_sf1'];?>" placeholder="SNAGGING FACE 1">
									<input name="rapperss_sb1" type="text" class="form-control" id="rapperss_sb1" value="<?php echo $rcekR['rapperss_sb1'];?>" placeholder="SNAGGING BACK 1">
									<input name="rapperss_st" type="text" class="form-control" id="rapperss_st" value="<?php echo $rcekR['rapperss_st'];?>" placeholder="C.STAINING">
								</div>
								<div class="col-sm-1">
									<input name="rapperss_pf2" type="text" class="form-control" id="rapperss_pf2" value="<?php echo $rcekR['rapperss_pf2'];?>" placeholder="PILLING FACE 2">
									<input name="rapperss_pb2" type="text" class="form-control" id="rapperss_pb2" value="<?php echo $rcekR['rapperss_pb2'];?>" placeholder="PILLING BACK 2">
									<input name="rapperss_ch2" type="text" class="form-control" id="rapperss_ch2" value="<?php echo $rcekR['rapperss_ch2'];?>" placeholder="PASS/FAIL 2">
									<input name="rapperss_cc2" type="text" class="form-control" id="rapperss_cc2" value="<?php echo $rcekR['rapperss_cc2'];?>" placeholder="C.CHANGE 2">
									<input name="rapperss_sf2" type="text" class="form-control" id="rapperss_sf2" value="<?php echo $rcekR['rapperss_sf2'];?>" placeholder="SNAGGING FACE 2">
									<input name="rapperss_sb2" type="text" class="form-control" id="rapperss_sb2" value="<?php echo $rcekR['rapperss_sb2'];?>" placeholder="SNAGGING BACK 2">
								</div>
								<div class="col-sm-1">
									<input name="rapperss_pf3" type="text" class="form-control" id="rapperss_pf3" value="<?php echo $rcekR['rapperss_pf3'];?>" placeholder="PILLING FACE 3" > 
									<input name="rapperss_pb3" type="text" class="form-control" id="rapperss_pb3" value="<?php echo $rcekR['rapperss_pb3'];?>" placeholder="PILLING BACK 3" >
									<input name="rapperss_ch3" type="text" class="form-control" id="rapperss_ch3" value="<?php echo $rcekR['rapperss_ch3'];?>" placeholder="PASS/FAIL 3" >
									<input name="rapperss_cc3" type="text" class="form-control" id="rapperss_cc3" value="<?php echo $rcekR['rapperss_cc3'];?>" placeholder="C.CHANGE 3" >
									<input name="rapperss_sf3" type="text" class="form-control" id="rapperss_sf3" value="<?php echo $rcekR['rapperss_sf3'];?>" placeholder="SNAGGING FACE 3">
									<input name="rapperss_sb3" type="text" class="form-control" id="rapperss_sb3" value="<?php echo $rcekR['rapperss_sb3'];?>" placeholder="SNAGGING BACK 3">
								</div>
								<div class="col-sm-1">
									<input name="rapperss_pf4" type="text" class="form-control" id="rapperss_pf4" value="<?php echo $rcekR['rapperss_pf4'];?>" placeholder="PILLING FACE 4" >
									<input name="rapperss_pb4" type="text" class="form-control" id="rapperss_pb4" value="<?php echo $rcekR['rapperss_pb4'];?>" placeholder="PILLING BACK 4" >
									<input name="rapperss_ch4" type="text" class="form-control" id="rapperss_ch4" value="<?php echo $rcekR['rapperss_ch4'];?>" placeholder="PASS/FAIL 4" >
									<input name="rapperss_cc4" type="text" class="form-control" id="rapperss_cc4" value="<?php echo $rcekR['rapperss_cc4'];?>" placeholder="C.CHANGE 4" >
									<input name="rapperss_sf4" type="text" class="form-control" id="rapperss_sf4" value="<?php echo $rcekR['rapperss_sf4'];?>" placeholder="SNAGGING FACE 4">
									<input name="rapperss_sb4" type="text" class="form-control" id="rapperss_sb4" value="<?php echo $rcekR['rapperss_sb4'];?>" placeholder="SNAGGING BACK 4">
								</div>
								<div class="col-sm-2">
									<select name="rapperssw" class="form-control select2" id="rapperssw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rapperssw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rapperssw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rapperssw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rapperss_note" maxlength="1000">PHX-AP0701 slight color change, no obvious pilling (face=<?php echo $rcekR['rapperss_pf2'];?>, back=<?php echo $rcekR['rapperss_pb2'];?>), snagging (face=<?php echo $rcekR['rapperss_sf2'];?>, back=<?php echo $rcekR['rapperss_sb2'];?>), overall satisfactory</textarea>
								</div>
								<div class="col-sm-1">
									<label><input type="checkbox" name="rss_cmt" id="rss_cmt" class="minimal" value="1" <?php if($rcekR['rss_cmt']=='1'){echo "checked";}?>> &#10003;
									</label>
								</div>
							</div>
							<!-- SHRINKAGE & SPIRALITY & APPEARANCE END-->
							<!-- PILLING MARTINDLE BEGIN-->
							<div class="form-group" id="fc8" style="display:none;">
								<label for="rpillingm" class="col-sm-2 control-label">PILLING MARTINDLE</label>
								<div class="col-sm-1">
									<input name="rpillingm_f1" type="text" class="form-control" id="rpillingm_f1" value="<?php echo $rcekR['rpm_f1'];?>" placeholder="FACE 1">
									<input name="rpillingm_b1" type="text" class="form-control" id="rpillingm_b1" value="<?php echo $rcekR['rpm_b1'];?>" placeholder="BACK 1">
								</div>
								<div class="col-sm-1">
									<input name="rpillingm_f2" type="text" class="form-control" id="rpillingm_f2" value="<?php echo $rcekR['rpm_f2'];?>" placeholder="FACE 2">
									<input name="rpillingm_b2" type="text" class="form-control" id="rpillingm_b2" value="<?php echo $rcekR['rpm_b2'];?>" placeholder="BACK 2">
								</div>
								<div class="col-sm-1">
									<input name="rpillingm_f3" type="text" class="form-control" id="rpillingm_f3" value="<?php echo $rcekR['rpm_f3'];?>" placeholder="FACE 3">
									<input name="rpillingm_b3" type="text" class="form-control" id="rpillingm_b3" value="<?php echo $rcekR['rpm_b3'];?>" placeholder="BACK 3">
								</div>
								<div class="col-sm-1">
									<input name="rpillingm_f4" type="text" class="form-control" id="rpillingm_f4" value="<?php echo $rcekR['rpm_f4'];?>" placeholder="FACE 4">
									<input name="rpillingm_b4" type="text" class="form-control" id="rpillingm_b4" value="<?php echo $rcekR['rpm_b4'];?>" placeholder="BACK 4">
								</div>
								<div class="col-sm-1">
									<input name="rpillingm_f5" type="text" class="form-control" id="rpillingm_f5" value="<?php echo $rcekR['rpm_f5'];?>" placeholder="FACE 5">
									<input name="rpillingm_b5" type="text" class="form-control" id="rpillingm_b5" value="<?php echo $rcekR['rpm_b5'];?>" placeholder="BACK 5">
								</div>
								<div class="col-sm-2">
									<select name="rpmw" class="form-control select2" id="rpmw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rpmw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rpmw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rpmw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>	
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rpillm_note" maxlength="50"><?php echo $rcekR['rpillm_note'];?></textarea>
								</div>	
							</div>
							<!-- PILLING MARTINDLE END-->
							<!-- PILLING LOCUS BEGIN-->
							<div class="form-group" id="fc23" style="display:none;">
								<label for="rpillingl" class="col-sm-2 control-label">PILLING LOCUS</label>
								<div class="col-sm-1">
									<input name="rpillingl_f1" type="text" class="form-control" id="rpillingl_f1" value="<?php echo $rcekR['rpl_f1'];?>" placeholder="FACE 1">
									<input name="rpillingl_b1" type="text" class="form-control" id="rpillingl_b1" value="<?php echo $rcekR['rpl_b1'];?>" placeholder="BACK 1">
								</div>
								<div class="col-sm-1">
									<input name="rpillingl_f2" type="text" class="form-control" id="rpillingl_f2" value="<?php echo $rcekR['rpl_f2'];?>" placeholder="FACE 2">
									<input name="rpillingl_b2" type="text" class="form-control" id="rpillingl_b2" value="<?php echo $rcekR['rpl_b2'];?>" placeholder="BACK 2">
								</div>
								<div class="col-sm-1">
									<input name="rpillingl_f3" type="text" class="form-control" id="rpillingl_f3" value="<?php echo $rcekR['rpl_f3'];?>" placeholder="FACE 3">
									<input name="rpillingl_b3" type="text" class="form-control" id="rpillingl_b3" value="<?php echo $rcekR['rpl_b3'];?>" placeholder="BACK 3">
								</div>
								<div class="col-sm-1">
									<input name="rpillingl_f4" type="text" class="form-control" id="rpillingl_f4" value="<?php echo $rcekR['rpl_f4'];?>" placeholder="FACE 4">
									<input name="rpillingl_b4" type="text" class="form-control" id="rpillingl_b4" value="<?php echo $rcekR['rpl_b4'];?>" placeholder="BACK 4">
								</div>
								<div class="col-sm-1">
									<input name="rpillingl_f5" type="text" class="form-control" id="rpillingl_f5" value="<?php echo $rcekR['rpl_f5'];?>" placeholder="FACE 5">
									<input name="rpillingl_b5" type="text" class="form-control" id="rpillingl_b5" value="<?php echo $rcekR['rpl_b5'];?>" placeholder="BACK 5">
								</div>
								<div class="col-sm-2">
									<select name="rplw" class="form-control select2" id="rplw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rplw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rplw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rplw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>	
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rpilll_note" maxlength="50"><?php echo $rcekR['rpilll_note'];?></textarea>
								</div>	
							</div>
							<!-- PILLING LOCUS END-->
							<!-- PILLING BOX BEGIN-->
							<div class="form-group" id="fc9" style="display:none;">
								<label for="rpillingb" class="col-sm-2 control-label">PILLING BOX</label>
								<div class="col-sm-1">
									<input name="rpillingb_f1" type="text" class="form-control" id="rpillingb_f1" value="<?php echo $rcekR['rpb_f1'];?>" placeholder="FACE 1">
									<input name="rpillingb_b1" type="text" class="form-control" id="rpillingb_b1" value="<?php echo $rcekR['rpb_b1'];?>" placeholder="BACK 1">
								</div>
								<!--
								<div class="col-sm-1">
									<input name="pillingb_f2" type="text" class="form-control" id="pillingb_f2" value="<?php echo $rcekR['pb_f2'];?>" placeholder="FACE 2">
									<input name="pillingb_b2" type="text" class="form-control" id="pillingb_b2" value="<?php echo $rcekR['pb_b2'];?>" placeholder="BACK 2">
								</div>
								<div class="col-sm-1">
									<input name="pillingb_f3" type="text" class="form-control" id="pillingb_f3" value="<?php echo $rcekR['pb_f3'];?>" placeholder="FACE 3">
									<input name="pillingb_b3" type="text" class="form-control" id="pillingb_b3" value="<?php echo $rcekR['pb_b3'];?>" placeholder="BACK 3">
								</div>
								<div class="col-sm-1">
									<input name="pillingb_f4" type="text" class="form-control" id="pillingb_f4" value="<?php echo $rcekR['pb_f4'];?>" placeholder="FACE 4">
									<input name="pillingb_b4" type="text" class="form-control" id="pillingb_b4" value="<?php echo $rcekR['pb_b4'];?>" placeholder="BACK 4">
								</div>
								<div class="col-sm-1">
									<input name="pillingb_f5" type="text" class="form-control" id="pillingb_f5" value="<?php echo $rcekR['pb_f5'];?>" placeholder="FACE 5">
									<input name="pillingb_b5" type="text" class="form-control" id="pillingb_b5" value="<?php echo $rcekR['pb_b5'];?>" placeholder="BACK 5">
								</div>
								--> 
								<div class="col-sm-2">
									<select name="rpbw" class="form-control select2" id="rpbw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rpbw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rpbw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rpbw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>	
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rpillb_note" maxlength="50"><?php echo $rcekR['rpillb_note'];?></textarea>
								</div>
							</div>
							<!-- PILLING BOX END-->
							<!-- PILLING RANDOM TUMBLER BEGIN-->
							<div class="form-group" id="fc10" style="display:none;">
								<label for="rpillingrt" class="col-sm-2 control-label">PILLING RANDOM TUMBLER</label>
								<div class="col-sm-1">
									<input name="rpillingrt_f1" type="text" class="form-control" id="rpillingrt_f1" value="<?php echo $rcekR['rprt_f1'];?>" placeholder="FACE 1">
									<input name="rpillingrt_b1" type="text" class="form-control" id="rpillingrt_b1" value="<?php echo $rcekR['rprt_b1'];?>" placeholder="BACK 1">
								</div>
								<div class="col-sm-1">
									<input name="rpillingrt_f2" type="text" class="form-control" id="rpillingrt_f2" value="<?php echo $rcekR['rprt_f2'];?>" placeholder="FACE 2">
									<input name="rpillingrt_b2" type="text" class="form-control" id="rpillingrt_b2" value="<?php echo $rcekR['rprt_b2'];?>" placeholder="BACK 2">
								</div>
								<div class="col-sm-1">
									<input name="rpillingrt_f3" type="text" class="form-control" id="rpillingrt_f3" value="<?php echo $rcekR['rprt_f3'];?>" placeholder="FACE 3">
									<input name="rpillingrt_b3" type="text" class="form-control" id="rpillingrt_b3" value="<?php echo $rcekR['rprt_b3'];?>" placeholder="BACK 3">
								</div>
								<div class="col-sm-1">
									<input name="rpillingrt_f4" type="text" class="form-control" id="rpillingrt_f4" value="<?php echo $rcekR['rprt_f4'];?>" placeholder="FACE 4">
									<input name="rpillingrt_b4" type="text" class="form-control" id="rpillingrt_b4" value="<?php echo $rcekR['rprt_b4'];?>" placeholder="BACK 4">
								</div>
								<div class="col-sm-1">
									<input name="rpillingrt_f5" type="text" class="form-control" id="rpillingrt_f5" value="<?php echo $rcekR['rprt_f5'];?>" placeholder="FACE 5">
									<input name="rpillingrt_b5" type="text" class="form-control" id="rpillingrt_b5" value="<?php echo $rcekR['rprt_b5'];?>" placeholder="BACK 5">
								</div>
								<div class="col-sm-2">
									<select name="rprtw" class="form-control select2" id="rprtw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rprtw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rprtw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rprtw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>	
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rpillr_note" maxlength="50"><?php echo $rcekR['rpillr_note'];?></textarea>
								</div>
							</div>
							<!-- PILLING RANDOM TUMBLER END-->
							<!-- ABRATION BEGIN-->
							<div class="form-group" id="fc11" style="display:none;">
								<label for="rabr" class="col-sm-2 control-label">ABRATION</label>
								<div class="col-sm-2">
									<input name="rabr" type="text" class="form-control" id="rabr" value="<?php echo $rcekR['rabration'];?>" placeholder="ABRATION">
								</div>
								<div class="col-sm-2">
									<select name="rabrationw" class="form-control select2" id="rabrationw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rabrationw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rabrationw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rabrationw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>	
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rabr_note" maxlength="50" rows="1"><?php echo $rcekR['rabr_note'];?></textarea>
								</div>
							</div>
							<!-- ABRATION END-->
							<!-- SNAGGING MACE BEGIN-->
							<div class="form-group" id="fc12" style="display:none;">
								<label for="rsnaggingm" class="col-sm-2 control-label">SNAGGING MACE</label>
								<div class="col-sm-1">
									<input name="rsnaggingm_l1" type="text" class="form-control" id="rsnaggingm_l1" value="<?php echo $rcekR['rsm_l1'];?>" placeholder="LEN 1">
									<input name="rsnaggingm_w1" type="text" class="form-control" id="rsnaggingm_w1" value="<?php echo $rcekR['rsm_w1'];?>" placeholder="WID 1">
								</div>
								<div class="col-sm-1">
									<input name="rsnaggingm_l2" type="text" class="form-control" id="rsnaggingm_l2" value="<?php echo $rcekR['rsm_l2'];?>" placeholder="LEN 2">
									<input name="rsnaggingm_w2" type="text" class="form-control" id="rsnaggingm_w2" value="<?php echo $rcekR['rsm_w2'];?>" placeholder="WID 2">
								</div>
								<div class="col-sm-1">
									<input name="rsnaggingm_l3" type="text" class="form-control" id="rsnaggingm_l3" value="<?php echo $rcekR['rsm_l3'];?>" placeholder="LEN 3">
									<input name="rsnaggingm_w3" type="text" class="form-control" id="rsnaggingm_w3" value="<?php echo $rcekR['rsm_w3'];?>" placeholder="WID 3">
								</div>
								<div class="col-sm-1">
									<input name="rsnaggingm_l4" type="text" class="form-control" id="rsnaggingm_l4" value="<?php echo $rcekR['rsm_l4'];?>" placeholder="LEN 4">
									<input name="rsnaggingm_w4" type="text" class="form-control" id="rsnaggingm_w4" value="<?php echo $rcekR['rsm_w4'];?>" placeholder="WID 4">
								</div>
								<div class="col-sm-2">
									<select name="rsmw" class="form-control select2" id="rsmw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rsmw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rsmw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rsmw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>	
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rsnam_note" maxlength="50"><?php echo $rcekR['rsnam_note'];?></textarea>
								</div>
							</div>
							<!-- SNAGGING MACE END-->
							<!-- SNAGGING POD BEGIN-->
							<div class="form-group" id="fc13" style="display:none;">
								<label for="rsnaggingp" class="col-sm-2 control-label">SNAGGING POD</label>
								<div class="col-sm-1">LEN(Face) 1
									<input name="rsp_grdl1" type="text" class="form-control" id="rsp_grdl1" value="<?php echo $rcekR['rsp_grdl1'];?>" placeholder="GRAD 1">
									<input name="rsp_clsl1" type="text" class="form-control" id="rsp_clsl1" value="<?php echo $rcekR['rsp_clsl1'];?>" placeholder="CLAS 1">
									<input name="rsp_shol1" type="text" class="form-control" id="rsp_shol1" value="<?php echo $rcekR['rsp_shol1'];?>" placeholder="SHO 1">
									<input name="rsp_medl1" type="text" class="form-control" id="rsp_medl1" value="<?php echo $rcekR['rsp_medl1'];?>" placeholder="MED 1">
									<input name="rsp_lonl1" type="text" class="form-control" id="rsp_lonl1" value="<?php echo $rcekR['rsp_lonl1'];?>" placeholder="LONG 1">
								</div>
								<div class="col-sm-1">WID(Face) 1
									<input name="rsp_grdw1" type="text" class="form-control" id="rsp_grdw1" value="<?php echo $rcekR['rsp_grdw1'];?>" placeholder="GRAD 1">
									<input name="rsp_clsw1" type="text" class="form-control" id="rsp_clsw1" value="<?php echo $rcekR['rsp_clsw1'];?>" placeholder="CLAS 1">
									<input name="rsp_show1" type="text" class="form-control" id="rsp_show1" value="<?php echo $rcekR['rsp_show1'];?>" placeholder="SHO 1">
									<input name="rsp_medw1" type="text" class="form-control" id="rsp_medw1" value="<?php echo $rcekR['rsp_medw1'];?>" placeholder="MED 1">
									<input name="rsp_lonw1" type="text" class="form-control" id="rsp_lonw1" value="<?php echo $rcekR['rsp_lonw1'];?>" placeholder="LONG 1">
								</div>
								<div class="col-sm-1">LEN(Back) 2
									<input name="rsp_grdl2" type="text" class="form-control" id="rsp_grdl2" value="<?php echo $rcekR['rsp_grdl2'];?>" placeholder="GRAD 2">
									<input name="rsp_clsl2" type="text" class="form-control" id="rsp_clsl2" value="<?php echo $rcekR['rsp_clsl2'];?>" placeholder="CLAS 2">
									<input name="rsp_shol2" type="text" class="form-control" id="rsp_shol2" value="<?php echo $rcekR['rsp_shol2'];?>" placeholder="SHO 2">
									<input name="rsp_medl2" type="text" class="form-control" id="rsp_medl2" value="<?php echo $rcekR['rsp_medl2'];?>" placeholder="MED 2">
									<input name="rsp_lonl2" type="text" class="form-control" id="rsp_lonl2" value="<?php echo $rcekR['rsp_lonl2'];?>" placeholder="LONG 2">
								</div>
								<div class="col-sm-1">WID(Back) 2
									<input name="rsp_grdw2" type="text" class="form-control" id="rsp_grdw2" value="<?php echo $rcekR['rsp_grdw2'];?>" placeholder="GRAD 2">
									<input name="rsp_clsw2" type="text" class="form-control" id="rsp_clsw2" value="<?php echo $rcekR['rsp_clsw2'];?>" placeholder="CLAS 2">
									<input name="rsp_show2" type="text" class="form-control" id="rsp_show2" value="<?php echo $rcekR['rsp_show2'];?>" placeholder="SHO 2">
									<input name="rsp_medw2" type="text" class="form-control" id="rsp_medw2" value="<?php echo $rcekR['rsp_medw2'];?>" placeholder="MED 2">
									<input name="rsp_lonw2" type="text" class="form-control" id="rsp_lonw2" value="<?php echo $rcekR['rsp_lonw2'];?>" placeholder="LONG 2">
								</div>
								<div class="col-sm-2">
									<select name="rspw" class="form-control select2" id="rspw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rspw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rspw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rspw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rsnap_note" maxlength="50"><?php echo $rcekR['rsnap_note'];?></textarea>
								</div>
							</div>
							<!-- SNAGGING POD END-->
							<!-- BEAN BAG BEGIN-->
							<div class="form-group" id="fc14" style="display:none;">
								<label for="rsnaggingb" class="col-sm-2 control-label">BEAN BAG</label>
								<div class="col-sm-1">
									<input name="rsnaggingb_l1" type="text" class="form-control" id="rsnaggingb_l1" value="<?php echo $rcekR['rsb_l1'];?>" placeholder="LEN 1">
									<input name="rsnaggingb_w1" type="text" class="form-control" id="rsnaggingb_w1" value="<?php echo $rcekR['rsb_w1'];?>" placeholder="WID 1">
								</div>
								<!--
								<div class="col-sm-1">
									<input name="snaggingb_l2" type="text" class="form-control" id="snaggingb_l2" value="<?php echo $rcekR['sb_l2'];?>" placeholder="LEN 2">
									<input name="snaggingb_w2" type="text" class="form-control" id="snaggingb_w2" value="<?php echo $rcekR['sb_w2'];?>" placeholder="WID 2">
								</div>
								<div class="col-sm-1">
									<input name="snaggingb_l3" type="text" class="form-control" id="snaggingb_l3" value="<?php echo $rcekR['sb_l3'];?>" placeholder="LEN 3">
									<input name="snaggingb_w3" type="text" class="form-control" id="snaggingb_w3" value="<?php echo $rcekR['sb_w3'];?>" placeholder="WID 3">
								</div>
								<div class="col-sm-1">
									<input name="snaggingb_l4" type="text" class="form-control" id="snaggingb_l4" value="<?php echo $rcekR['sb_l4'];?>" placeholder="LEN 4">
									<input name="snaggingb_w4" type="text" class="form-control" id="snaggingb_w4" value="<?php echo $rcekR['sb_w4'];?>" placeholder="WID 4">
								</div>
								-->
								<div class="col-sm-2">
									<select name="rsbw" class="form-control select2" id="rsbw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rsbw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rsbw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rsbw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rsnab_note" maxlength="50"><?php echo $rcekR['rsnab_note'];?></textarea>
								</div>
							</div>
							<!-- BEAN BAG END-->
							<!-- BURSTING STRENGTH BEGIN-->
							<div class="form-group" id="fc15" style="display:none;">
								<label for="rburs_str" class="col-sm-2 control-label">BURSTING STRENGTH</label>
								<div class="col-sm-2">
									<input name="rinstron" type="text" class="form-control" id="rinstron" value="<?php echo $rcekR['rbs_instron'];?>" placeholder="INSTRON">
								</div>
								<div class="col-sm-2">
									<input name="rmullen" type="text" class="form-control" id="rmullen" value="<?php echo $rcekR['rbs_mullen'];?>" placeholder="MULLEN">
								</div>
								<div class="col-sm-2">
									<input name="rtru_burst" type="text" class="form-control" id="rtru_burst" value="<?php echo $rcekR['rbs_tru'];?>" placeholder="TRU BURST">
								</div>
								<div class="col-sm-2">
									<input name="rtru_burst2" type="text" class="form-control" id="rtru_burst2" value="<?php echo $rcekR['rbs_tru2'];?>" placeholder="TRU BURST 2">
								</div>
								<div class="col-sm-2">
									<select name="rbsw" class="form-control select2" id="rbsw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rbsw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rbsw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rbsw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="fc15a" style="display:none;">
								<label for="rburs_str" class="col-sm-2 control-label">&nbsp;</label>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rburs_note" maxlength="50" rows="1"><?php echo $rcekR['rburs_note'];?></textarea>
								</div>
							</div>
							<!-- BURSTING STRENGTH END-->
							<!-- THICKNESS BEGIN-->
							<div class="form-group" id="fc16" style="display:none;">
								<label for="rthickn" class="col-sm-2 control-label">THICKNESS</label>
								<div class="col-sm-2">
									<input name="rthick1" type="text" class="form-control" id="rthick1" value="<?php echo $rcekR['rthick1'];?>" placeholder="1">
								</div>
								<div class="col-sm-2">
									<input name="rthick2" type="text" class="form-control" id="rthick2" value="<?php echo $rcekR['rthick2'];?>" placeholder="2">
								</div>
								<div class="col-sm-2">
									<input name="rthick3" type="text" class="form-control" id="rthick3" value="<?php echo $rcekR['rthick3'];?>" placeholder="3">
								</div>
								<div class="col-sm-2">
									<input name="rthickav" type="text" class="form-control" id="rthickav" value="<?php echo $rcekR['rthickav'];?>" placeholder="AV">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rthick_note" maxlength="50" rows="1"><?php echo $rcekR['rthick_note'];?></textarea>
								</div>	  
							</div>
							<div class="form-group" id="fc16w" style="display:none;">
								<label for="rthickn" class="col-sm-2 control-label">WARNA</label>
								<div class="col-sm-2">
									<select name="rthickw" class="form-control select2" id="rthickw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rthickw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rthickw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rthickw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- THICKNESS END-->
							<!-- STRECTH & RECOVERY BEGIN-->
							<div class="form-group" id="fc17" style="display:none;">
								<label for="rstretch" class="col-sm-2 control-label">STRETCH</label>
								<div class="col-sm-1">
									<label><input type="checkbox" name="rload_stretch" id="rload_stretch" class="minimal" value="60" <?php if($rcekR['rload_stretch']=='60'){echo "checked";}?>> 60N &nbsp; &nbsp; &nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="rload_stretch" id="rload_stretch" class="minimal" value="22" <?php if($rcekR['rload_stretch']=='22'){echo "checked";}?>> 22N 
									</label>
								</div>
								<div class="col-sm-1">
									<input name="rstretch_l1" type="text" class="form-control" id="rstretch_l1" value="<?php echo $rcekR['rstretch_l1'];?>" placeholder="LEN 1">
									<input name="rstretch_w1" type="text" class="form-control" id="rstretch_w1" value="<?php echo $rcekR['rstretch_w1'];?>" placeholder="WID 1">
								</div>
								<div class="col-sm-1">
									<input name="rstretch_l2" type="text" class="form-control" id="rstretch_l2" value="<?php echo $rcekR['rstretch_l2'];?>" placeholder="LEN 2">
									<input name="rstretch_w2" type="text" class="form-control" id="rstretch_w2" value="<?php echo $rcekR['rstretch_w2'];?>" placeholder="WID 2">
								</div>
								<div class="col-sm-1">
									<input name="rstretch_l3" type="text" class="form-control" id="rstretch_l3" value="<?php echo $rcekR['rstretch_l3'];?>" placeholder="LEN 3">
									<input name="rstretch_w3" type="text" class="form-control" id="rstretch_w3" value="<?php echo $rcekR['rstretch_w3'];?>" placeholder="WID 3">
								</div>
								<div class="col-sm-1">
									<input name="rstretch_l4" type="text" class="form-control" id="rstretch_l4" value="<?php echo $rcekR['rstretch_l4'];?>" placeholder="LEN 4">
									<input name="rstretch_w4" type="text" class="form-control" id="rstretch_w4" value="<?php echo $rcekR['rstretch_w4'];?>" placeholder="WID 4">
								</div>
								<div class="col-sm-1">
									<input name="rstretch_l5" type="text" class="form-control" id="rstretch_l5" value="<?php echo $rcekR['rstretch_l5'];?>" placeholder="LEN 5">
									<input name="rstretch_w5" type="text" class="form-control" id="rstretch_w5" value="<?php echo $rcekR['rstretch_w5'];?>" placeholder="WID 5">
								</div>
								<div class="col-sm-2">
									<select name="rstretchw" class="form-control select2" id="rstretchw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rstretchw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rstretchw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rstretchw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rstretch_note" maxlength="50"><?php echo $rcekR['rstretch_note'];?></textarea>
								</div>
							</div>
							<div class="form-group" id="fc18" style="display:none;">
								<label for="rrecover" class="col-sm-2 control-label">RECOVERY</label>
								<div class="col-sm-1">
									<input name="rrecover_l1" type="text" class="form-control" id="rrecover_l1" value="<?php echo $rcekR['rrecover_l1'];?>" placeholder="LEN1 1">
									<input name="rrecover_l2" type="text" class="form-control" id="rrecover_l2" value="<?php echo $rcekR['rrecover_l2'];?>" placeholder="LEN30 1">
									<input name="rrecover_w1" type="text" class="form-control" id="rrecover_w1" value="<?php echo $rcekR['rrecover_w1'];?>" placeholder="WID1 1">
									<input name="rrecover_w2" type="text" class="form-control" id="rrecover_w2" value="<?php echo $rcekR['rrecover_w2'];?>" placeholder="WID30 1">
								</div>
								<div class="col-sm-1">
									<input name="rrecover_l11" type="text" class="form-control" id="rrecover_l11" value="<?php echo $rcekR['rrecover_l11'];?>" placeholder="LEN1 2">
									<input name="rrecover_l21" type="text" class="form-control" id="rrecover_l21" value="<?php echo $rcekR['rrecover_l21'];?>" placeholder="LEN30 2">
									<input name="rrecover_w11" type="text" class="form-control" id="rrecover_w11" value="<?php echo $rcekR['rrecover_w11'];?>" placeholder="WID1 2">
									<input name="rrecover_w21" type="text" class="form-control" id="rrecover_w21" value="<?php echo $rcekR['rrecover_w21'];?>" placeholder="WID30 2">
								</div>
								<div class="col-sm-1">
									<input name="rrecover_l3" type="text" class="form-control" id="rrecover_l3" value="<?php echo $rcekR['rrecover_l3'];?>" placeholder="LEN1 3">
									<input name="rrecover_l31" type="text" class="form-control" id="rrecover_l31" value="<?php echo $rcekR['rrecover_l31'];?>" placeholder="LEN30 3">
									<input name="rrecover_w3" type="text" class="form-control" id="rrecover_w3" value="<?php echo $rcekR['rrecover_w3'];?>" placeholder="WID1 3">
									<input name="rrecover_w31" type="text" class="form-control" id="rrecover_w31" value="<?php echo $rcekR['rrecover_w31'];?>" placeholder="WID30 3">
								</div>
								<div class="col-sm-1">
									<input name="rrecover_l4" type="text" class="form-control" id="rrecover_l4" value="<?php echo $rcekR['rrecover_l4'];?>" placeholder="LEN1 4">
									<input name="rrecover_l41" type="text" class="form-control" id="rrecover_l41" value="<?php echo $rcekR['rrecover_l41'];?>" placeholder="LEN30 4">
									<input name="rrecover_w4" type="text" class="form-control" id="rrecover_w4" value="<?php echo $rcekR['rrecover_w4'];?>" placeholder="WID1 4">
									<input name="rrecover_w41" type="text" class="form-control" id="rrecover_w41" value="<?php echo $rcekR['rrecover_w41'];?>" placeholder="WID30 4">
								</div>
								<div class="col-sm-1">
									<input name="rrecover_l5" type="text" class="form-control" id="rrecover_l5" value="<?php echo $rcekR['rrecover_l5'];?>" placeholder="LEN1 5">
									<input name="rrecover_l51" type="text" class="form-control" id="rrecover_l51" value="<?php echo $rcekR['rrecover_l51'];?>" placeholder="LEN30 5">
									<input name="rrecover_w5" type="text" class="form-control" id="rrecover_w5" value="<?php echo $rcekR['rrecover_w5'];?>" placeholder="WID1 5">
									<input name="rrecover_w51" type="text" class="form-control" id="rrecover_w51" value="<?php echo $rcekR['rrecover_w51'];?>" placeholder="WID30 5">
								</div>
								<div class="col-sm-2">
									<select name="rrecoverw" class="form-control select2" id="rrecoverw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rrecoverw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rrecoverw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rrecoverw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rrecover_note" maxlength="50"><?php echo $rcekR['rrecover_note'];?></textarea>
								</div>
							</div>
							<!-- STRECTH & RECOVERY END-->
							<!-- GROWTH BEGIN-->
							<div class="form-group" id="fc19" style="display:none;">
								<label for="rgrowth" class="col-sm-2 control-label">GROWTH</label>
								<div class="col-sm-2">
									<input name="rgrowth_l1" type="text" class="form-control" id="rgrowth_l1" value="<?php echo $rcekR['rgrowth_l1'];?>" placeholder="LENGTH 1">
									<input name="rgrowth_w1" type="text" class="form-control" id="rgrowth_w1" value="<?php echo $rcekR['rgrowth_w1'];?>" placeholder="WIDTH 1">
								</div>
								<div class="col-sm-2">
									<input name="rgrowth_l2" type="text" class="form-control" id="rgrowth_l2" value="<?php echo $rcekR['rgrowth_l2'];?>" placeholder="LENGTH 2">
									<input name="rgrowth_w2" type="text" class="form-control" id="rgrowth_w2" value="<?php echo $rcekR['rgrowth_w2'];?>" placeholder="WIDTH 2">
								</div>
								<div class="col-sm-2">
									<select name="rgrowthw" class="form-control select2" id="rgrowthw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rgrowthw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rgrowthw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rgrowthw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rgrowth_note" maxlength="50"><?php echo $rcekR['rgrowth_note'];?></textarea>
								</div>
							</div>
							<div class="form-group" id="fc25" style="display:none;">
								<label for="rrec_growth" class="col-sm-2 control-label">RECOVERY</label>
								<div class="col-sm-2">
									<input name="rrec_growth_l1" type="text" class="form-control" id="rrec_growth_l1" value="<?php echo $rcekR['rrec_growth_l1'];?>" placeholder="LENGTH 1">
									<input name="rrec_growth_w1" type="text" class="form-control" id="rrec_growth_w1" value="<?php echo $rcekR['rrec_growth_w1'];?>" placeholder="WIDTH 1">
								</div>
								<div class="col-sm-2">
									<input name="rrec_growth_l2" type="text" class="form-control" id="rrec_growth_l2" value="<?php echo $rcekR['rrec_growth_l2'];?>" placeholder="LENGTH 2">
									<input name="rrec_growth_w2" type="text" class="form-control" id="rrec_growth_w2" value="<?php echo $rcekR['rrec_growth_w2'];?>" placeholder="WIDTH 2">
								</div>
								<div class="col-sm-2">
									<select name="rrec_growthw" class="form-control select2" id="rrec_growthw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rrec_growthw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rrec_growthw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rrec_growthw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- GROWTH END-->
							<!-- APPEARANCE BEGIN-->
							<div class="form-group" id="fc20" style="display:none;">
								<label for="rrapper" class="col-sm-2 control-label">APPEARANCE</label>
								<div class="col-sm-2">
									<input name="rapper_pf1" type="text" class="form-control" id="rapper_pf1" value="<?php echo $rcekR['rapper_pf1'];?>" placeholder="PILLING FACE 1">
									<input name="rapper_pb1" type="text" class="form-control" id="rapper_pb1" value="<?php echo $rcekR['rapper_pb1'];?>" placeholder="PILLING BACK 1">
									<input name="rapper_ch1" type="text" class="form-control" id="rapper_ch1" value="<?php echo $rcekR['rapper_ch1'];?>" placeholder="NO CHANGE 1">
									<input name="rapper_cc1" type="text" class="form-control" id="rapper_cc1" value="<?php echo $rcekR['rapper_cc1'];?>" placeholder="C.CHANGE 1">
									<input name="rapper_st" type="text" class="form-control" id="rapper_st" value="<?php echo $rcekR['rapper_st'];?>" placeholder="S.STAINING 1">
									<input name="rapper_acetate" type="text" class="form-control" id="rapper_acetate" value="<?php echo $rcekR['rapper_acetate'];?>" placeholder="ACETATE">
									<input name="rapper_cotton" type="text" class="form-control" id="rapper_cotton" value="<?php echo $rcekR['rapper_cotton'];?>" placeholder="COTTON">
									<input name="rapper_nylon" type="text" class="form-control" id="rapper_nylon" value="<?php echo $rcekR['rapper_nylon'];?>" placeholder="NYLON">
									<input name="rapper_poly" type="text" class="form-control" id="rapper_poly" value="<?php echo $rcekR['rapper_poly'];?>" placeholder="POLYESTER">
									<input name="rapper_acrylic" type="text" class="form-control" id="rapper_acrylic" value="<?php echo $rcekR['rapper_acrylic'];?>" placeholder="ACRYLIC">
									<input name="rapper_wool" type="text" class="form-control" id="rapper_wool" value="<?php echo $rcekR['rapper_wool'];?>" placeholder="WOOL">
								</div>
								<div class="col-sm-2">
									<input name="rapper_pf2" type="text" class="form-control" id="rapper_pf2" value="<?php echo $rcekR['rapper_pf2'];?>" placeholder="PILLING FACE 2">
									<input name="rapper_pb2" type="text" class="form-control" id="rapper_pb2" value="<?php echo $rcekR['rapper_pb2'];?>" placeholder="PILLING BACK 2">
									<input name="rapper_ch2" type="text" class="form-control" id="rapper_ch2" value="<?php echo $rcekR['rapper_ch2'];?>" placeholder="NO CHANGE 2">
									<input name="rapper_cc2" type="text" class="form-control" id="rapper_cc2" value="<?php echo $rcekR['rapper_cc2'];?>" placeholder="C.CHANGE 2">
									<input name="rapper_st2" type="text" class="form-control" id="rapper_st2" value="<?php echo $rcekR['rapper_st2'];?>" placeholder="S.STAINING 2">
								</div>
								<div class="col-sm-2">
									<input name="rapper_pf3" type="text" class="form-control" id="rapper_pf3" value="<?php echo $rcekR['rapper_pf3'];?>" placeholder="PILLING FACE 3">
									<input name="rapper_pb3" type="text" class="form-control" id="rapper_pb3" value="<?php echo $rcekR['rapper_pb3'];?>" placeholder="PILLING BACK 3">
									<input name="rapper_ch3" type="text" class="form-control" id="rapper_ch3" value="<?php echo $rcekR['rapper_ch3'];?>" placeholder="NO CHANGE 3">
									<input name="rapper_cc3" type="text" class="form-control" id="rapper_cc3" value="<?php echo $rcekR['rapper_cc3'];?>" placeholder="C.CHANGE 3">
									<input name="rapper_st3" type="text" class="form-control" id="rapper_st3" value="<?php echo $rcekR['rapper_st3'];?>" placeholder="S.STAINING 3">
								</div>
								<div class="col-sm-2">
									<select name="rapperw" class="form-control select2" id="rapperw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rapperw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rapperw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rapperw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rapper_note" maxlength="50"><?php echo $rcekR['rapper_note'];?></textarea>
								</div>
							</div>
							<!-- APPEARANCE END-->
							<!-- HEAT SHRINKAGE BEGIN-->
							<div class="form-group" id="fc21" style="display:none;">
								<label for="rh_shrinkage" class="col-sm-2 control-label">HEAT SHRINKAGE</label>
								<div class="col-sm-1">
									<label><input type="checkbox" name="rh_shrinkage_temp" id="rh_shrinkage_temp" class="minimal" value="170" <?php if($rcekR['rh_shrinkage_temp']=='170'){echo "checked";}?>> 170&deg;C &nbsp; &nbsp; &nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="rh_shrinkage_temp" id="rh_shrinkage_temp" class="minimal" value="180" <?php if($rcekR['rh_shrinkage_temp']=='180'){echo "checked";}?>> 180&deg;C
									</label>
									<label><input type="checkbox" name="rh_shrinkage_temp" id="rh_shrinkage_temp" class="minimal" value="200" <?php if($rcekR['rh_shrinkage_temp']=='200'){echo "checked";}?>> 200&deg;C
									</label>
								</div>
								<div class="col-sm-1">
									<input name="rh_shrinkage_l1" type="text" class="form-control" id="rh_shrinkage_l1" value="<?php echo $rcekR['rh_shrinkage_l1'];?>" placeholder="LEN 1">
									<input name="rh_shrinkage_w1" type="text" class="form-control" id="rh_shrinkage_w1" value="<?php echo $rcekR['rh_shrinkage_w1'];?>" placeholder="WID 1">
								</div>
								<div class="col-sm-1">
									<input name="rh_shrinkage_grd" type="text" class="form-control" id="rh_shrinkage_grd" value="<?php echo $rcekR['rh_shrinkage_grd'];?>" placeholder="GRADE">
								</div>
								<div class="col-sm-2">
									<select name="rh_shrinkagew" class="form-control select2" id="rh_shrinkagew" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rh_shrinkagew']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rh_shrinkagew']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rh_shrinkagew']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rh_shrinkage_note" maxlength="50"><?php echo $rcekR['rh_shrinkage_note'];?></textarea>
								</div>
							</div>
							<!-- HEAT SHRINKAGE END-->
							<!-- FIBRE/FUZZ BEGIN-->
							<div class="form-group" id="fc22" style="display:none;">
								<label for="rfibre" class="col-sm-2 control-label">FIBRE/FUZZ</label>
								<div class="col-sm-2">
									<input name="rfibre_transfer" type="text" class="form-control" id="rfibre_transfer" value="<?php echo $rcekR['rfibre_transfer'];?>" placeholder="FIBRE TRANSFER">
								</div>
								<div class="col-sm-1">
									<input name="rfibre_grade" type="text" class="form-control" id="rfibre_grade" value="<?php echo $rcekR['rfibre_grade'];?>" placeholder="GRADE">
								</div>
								<div class="col-sm-2">
									<select name="rfibrew" class="form-control select2" id="rfibrew" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rfibrew']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rfibrew']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rfibrew']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rfibre_note" maxlength="50"><?php echo $rcekR['rfibre_note'];?></textarea>
								</div>
							</div>
							<!-- FIBRE/FUZZ END-->
							<!-- ODOUR BEGIN-->
							<div class="form-group" id="fc26" style="display:none;">
								<label for="rodour" class="col-sm-2 control-label">ODOUR</label>
								<div class="col-sm-2">
									<input name="rodour" type="text" class="form-control" id="rodour" value="<?php echo $rcekR['rodour'];?>" placeholder="ODOUR">
								</div>
								<div class="col-sm-2">
									<select name="rodourw" class="form-control select2" id="rodourw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rodourw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rodourw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rodourw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rodour_note" maxlength="50"><?php echo $rcekR['rodour_note'];?></textarea>
								</div>
							</div>
							<!-- ODOUR END-->
							<!-- CURLING BEGIN-->
							<div class="form-group" id="fc27" style="display:none;">
								<label for="rcurling" class="col-sm-2 control-label">CURLING</label>
								<div class="col-sm-2">
									<input name="rcurling" type="text" class="form-control" id="rcurling" value="<?php echo $rcekR['rcurling'];?>" placeholder="CURLING">
								</div>
								<div class="col-sm-2">
									<select name="rcurlingw" class="form-control select2" id="rcurlingw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rcurlingw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rcurlingw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rcurlingw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rcurling_note" maxlength="50"><?php echo $rcekR['rcurling_note'];?></textarea>
								</div>
							</div>
							<!-- CURLING END-->
							<!-- NEDLE BEGIN-->
							<div class="form-group" id="fc28" style="display:none;">
								<label for="rnedle" class="col-sm-2 control-label">CURLING</label>
								<div class="col-sm-2">
									<input name="rnedle" type="text" class="form-control" id="rnedle" value="<?php echo $rcekR['rnedle'];?>" placeholder="NEDLE">
								</div>
								<div class="col-sm-2">
									<select name="rnedlew" class="form-control select2" id="rnedlew" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rnedlew']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rnedlew']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rnedlew']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rnedle_note" maxlength="50"><?php echo $rcekR['rnedle_note'];?></textarea>
								</div>
							</div>
							<!-- NEDLE END-->
							<div class="form-group">
								<?php if($noitem!="" or $nohanger!=""){ ?>
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
										<option value="WASHING">WASHING</option>
										<option value="WATER">WATER</option>
										<option value="PERSPIRATION ACID">PERSPIRATION ACID</option>
										<option value="PERSPIRATION ALKALINE">PERSPIRATION ALKALINE</option> 
										<option value="CROCKING">CROCKING</option>
										<option value="PHENOLIC YELLOWING">PHENOLIC YELLOWING</option>
										<option value="COLOR MIGRATION-OVEN TEST">COLOR MIGRATION-OVEN TEST</option>
										<option value="COLOR MIGRATION">COLOR MIGRATION</option>
										<option value="LIGHT">LIGHT</option> 
										<option value="LIGHT PERSPIRATION">LIGHT PERSPIRATION</option>
										<option value="SALIVA">SALIVA</option> 
										<option value="BLEEDING">BLEEDING</option>
										<option value="CHLORIN & NON-CHLORIN">CHLORIN & NON-CHLORIN</option>
										<option value="DYE TRANSFER">DYE TRANSFER</option>   
										</select>
									</div>
							</div>
							<!-- WASHING BEGIN-->
							<div class="form-group" id="c1" style="display:none;">
								<label for="rwashing" class="col-sm-2 control-label">WASHING FASTNESS</label>
									<input name="sts_random" type="hidden" class="form-control" id="sts_random" value="<?php echo $rcekTR['sts'];?>" placeholder="">
									<input name="sts_random2" type="hidden" class="form-control" id="sts_random2" value="<?php echo $rcekTR2['sts'];?>" placeholder="">
								<div class="col-sm-1">
									<label><input type="checkbox" name="rwash_temp" id="rwash_temp" class="minimal" value="30" <?php if($rcekR['rwash_temp']=='30'){echo "checked";}?>> 30&deg;C &nbsp; &nbsp; &nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="rwash_temp" id="rwash_temp" class="minimal" value="40" <?php if($rcekR['rwash_temp']=='40'){echo "checked";}?>> 40&deg;C
									</label>
								</div>
								<div class="col-sm-1">
									<input name="rwash_colorchange" type="text" class="form-control" id="rwash_colorchange" value="<?php echo $rcekR['rwash_colorchange'];?>" placeholder="4-5 CC">
									<input name="rwash_acetate" type="text" class="form-control" id="rwash_acetate" value="<?php echo $rcekR['rwash_acetate'];?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-1">
									<input name="rwash_cotton" type="text" class="form-control" id="rwash_cotton" value="<?php echo $rcekR['rwash_cotton'];?>" placeholder="4 Cotton">
									<input name="rwash_nylon" type="text" class="form-control" id="rwash_nylon" value="<?php echo $rcekR['rwash_nylon'];?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-1">
									<input name="rwash_poly" type="text" class="form-control" id="rwash_poly" value="<?php echo $rcekR['rwash_poly'];?>" placeholder="4 Polyester">
									<input name="rwash_acrylic" type="text" class="form-control" id="rwash_acrylic" value="<?php echo $rcekR['rwash_acrylic'];?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-1">
									<input name="rwash_wool" type="text" class="form-control" id="rwash_wool" value="<?php echo $rcekR['rwash_wool'];?>" placeholder="4 Wool">
									<input name="rwash_staining" type="text" class="form-control" id="rwash_staining" value="<?php echo $rcekR['rwash_staining'];?>" placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rwash_note" maxlength="50" rows="1"><?php echo $rcekR['rwash_note'];?></textarea>
								</div>
							</div>
							<div class="form-group" id="c1w" style="display:none;">
								<label for="rthickn" class="col-sm-2 control-label">WARNA</label>
								<div class="col-sm-2">
									<select name="rwashw" class="form-control select2" id="rwashw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rwashw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rwashw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rwashw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- WASHING END-->
							<!-- WATER BEGIN-->
							<div class="form-group" id="c2" style="display:none;">
								<label for="rwater" class="col-sm-2 control-label">WATER</label>
								<div class="col-sm-2">
									<input name="rwater_colorchange" type="text" class="form-control" id="rwater_colorchange" value="<?php echo $rcekR['rwater_colorchange'];?>" placeholder="4-5 Color Change">
									<input name="rwater_acetate" type="text" class="form-control" id="rwater_acetate" value="<?php echo $rcekR['rwater_acetate'];?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="rwater_cotton" type="text" class="form-control" id="rwater_cotton" value="<?php echo $rcekR['rwater_cotton'];?>" placeholder="4 Cotton">
									<input name="rwater_nylon" type="text" class="form-control" id="rwater_nylon" value="<?php echo $rcekR['rwater_nylon'];?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="rwater_poly" type="text" class="form-control" id="rwater_poly" value="<?php echo $rcekR['rwater_poly'];?>" placeholder="4 Polyester">
									<input name="rwater_acrylic" type="text" class="form-control" id="rwater_acrylic" value="<?php echo $rcekR['rwater_acrylic'];?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="rwater_wool" type="text" class="form-control" id="rwater_wool" value="<?php echo $rcekR['rwater_wool'];?>" placeholder="4 Wool">
									<input name="rwater_staining" type="text" class="form-control" id="rwater_staining" value="<?php echo $rcekR['rwater_staining'];?>" placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rwater_note" maxlength="50" rows="1"><?php echo $rcekR['rwater_note'];?></textarea>
								</div>
							</div>
							<div class="form-group" id="c2w" style="display:none;">
								<label for="rthickn" class="col-sm-2 control-label">WARNA</label>
								<div class="col-sm-2">
									<select name="rwaterw" class="form-control select2" id="rwaterw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rwaterw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rwaterw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rwaterw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- WATER END-->
							<!-- PERSPIRATION ACID BEGIN-->
							<div class="form-group" id="c3" style="display:none;">
								<label for="racid" class="col-sm-2 control-label">PERSPIRATION ACID</label>
								<div class="col-sm-2">
									<input name="racid_colorchange" type="text" class="form-control" id="racid_colorchange" value="<?php echo $rcekR['racid_colorchange'];?>" placeholder="4-5 Color Change">
									<input name="racid_acetate" type="text" class="form-control" id="racid_acetate" value="<?php echo $rcekR['racid_acetate'];?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="racid_cotton" type="text" class="form-control" id="racid_cotton" value="<?php echo $rcekR['racid_cotton'];?>" placeholder="4 Cotton">
									<input name="racid_nylon" type="text" class="form-control" id="racid_nylon" value="<?php echo $rcekR['racid_nylon'];?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="racid_poly" type="text" class="form-control" id="racid_poly" value="<?php echo $rcekR['racid_poly'];?>" placeholder="4 Polyester">
									<input name="racid_acrylic" type="text" class="form-control" id="racid_acrylic" value="<?php echo $rcekR['racid_acrylic'];?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="racid_wool" type="text" class="form-control" id="racid_wool" value="<?php echo $rcekR['racid_wool'];?>" placeholder="4 Wool">
									<input name="racid_staining" type="text" class="form-control" id="racid_staining" value="<?php echo $rcekR['racid_staining'];?>" placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="racid_note" maxlength="50" rows="1"><?php echo $rcekR['racid_note'];?></textarea>
								</div>
							</div>
							<div class="form-group" id="c3w" style="display:none;">
								<label for="rthickn" class="col-sm-2 control-label">WARNA</label>
								<div class="col-sm-2">
									<select name="racidw" class="form-control select2" id="racidw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['racidw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['racidw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['racidw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- PERSPIRATION ACID END-->
							<!-- PERSPIRATION ALKALINE BEGIN-->	
							<div class="form-group" id="c4" style="display:none;">
								<label for="ralkaline" class="col-sm-2 control-label">PERSPIRATION ALKALINE</label>
								<div class="col-sm-2">
									<input name="ralkaline_colorchange" type="text" class="form-control" id="ralkaline_colorchange" value="<?php echo $rcekR['ralkaline_colorchange'];?>" placeholder="4-5 Color Change">
									<input name="ralkaline_acetate" type="text" class="form-control" id="ralkaline_acetate" value="<?php echo $rcekR['ralkaline_acetate'];?>" placeholder="4 Acetate">
								</div>
								<div class="col-sm-2">
									<input name="ralkaline_cotton" type="text" class="form-control" id="ralkaline_cotton" value="<?php echo $rcekR['ralkaline_cotton'];?>" placeholder="4 Cotton">
									<input name="ralkaline_nylon" type="text" class="form-control" id="ralkaline_nylon" value="<?php echo $rcekR['ralkaline_nylon'];?>" placeholder="4 Nylon">
								</div>
								<div class="col-sm-2">
									<input name="ralkaline_poly" type="text" class="form-control" id="ralkaline_poly" value="<?php echo $rcekR['ralkaline_poly'];?>" placeholder="4 Polyester">
									<input name="ralkaline_acrylic" type="text" class="form-control" id="ralkaline_acrylic" value="<?php echo $rcekR['ralkaline_acrylic'];?>" placeholder="4 Acrylic">
								</div>
								<div class="col-sm-2">
									<input name="ralkaline_wool" type="text" class="form-control" id="ralkaline_wool" value="<?php echo $rcekR['ralkaline_wool'];?>" placeholder="4 Wool">
									<input name="ralkaline_staining" type="text" class="form-control" id="ralkaline_staining" value="<?php echo $rcekR['ralkaline_staining'];?>" placeholder="S.Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="ralkaline_note" maxlength="50" rows="1"><?php echo $rcekR['ralkaline_note'];?></textarea>
								</div>
							</div>
							<div class="form-group" id="c4w" style="display:none;">
								<label for="rthickn" class="col-sm-2 control-label">WARNA</label>
								<div class="col-sm-2">
									<select name="ralkalinew" class="form-control select2" id="ralkalinew" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['ralkalinew']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['ralkalinew']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['ralkalinew']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- PERSPIRATION ALKALINE END-->	
							<!-- CROCKING BEGIN-->
							<div class="form-group" id="c5" style="display:none;">
								<label for="rcrocking" class="col-sm-2 control-label">CROCKING</label>
								<div class="col-sm-1">LEN 1
									<input name="rcrock_len1" type="text" class="form-control" id="rcrock_len1" value="<?php echo $rcekR['rcrock_len1'];?>" placeholder="4 Dry">
								</div>
								<div class="col-sm-1">WID 1
									<input name="rcrock_wid1" type="text" class="form-control" id="rcrock_wid1" value="<?php echo $rcekR['rcrock_wid1'];?>" placeholder="4 Dry">
								</div>
								<div class="col-sm-1">LEN 2
									<input name="rcrock_len2" type="text" class="form-control" id="rcrock_len2" value="<?php echo $rcekR['rcrock_len2'];?>" placeholder="3 Wet">
								</div>
								<div class="col-sm-1">WID 2
									<input name="rcrock_wid2" type="text" class="form-control" id="rcrock_wid2" value="<?php echo $rcekR['rcrock_wid2'];?>" placeholder="3 Wet">
								</div>
								<div class="col-sm-2">
									<select name="rcrockw" class="form-control select2" id="rcrockw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rcrockw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rcrockw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rcrockw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rcrock_note" maxlength="50"><?php echo $rcekR['rcrock_note'];?></textarea>
								</div>
							</div>
							<!-- CROCKING END-->
							<!-- PHENOLIC YELLOWING BEGIN-->
							<div class="form-group" id="c6" style="display:none;">
								<label for="rphenolic" class="col-sm-2 control-label">PHENOLIC YELLOWING</label>
								<div class="col-sm-2">
									<input name="rphenolic_colorchange" type="text" class="form-control" id="rphenolic_colorchange" value="<?php echo $rcekR['rphenolic_colorchange'];?>" placeholder="4-5 Color Change">
								</div>
								<div class="col-sm-2">
									<select name="rphenolicw" class="form-control select2" id="rphenolicw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rphenolicw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rphenolicw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rphenolicw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rphenolic_note" maxlength="50" rows="1"><?php echo $rcekR['rphenolic_note'];?></textarea>
								</div>
							</div>
							<!-- PHENOLIC YELLOWING END-->
							<!-- COLOR MIGRATION - OVEN TEST BEGIN-->
							<div class="form-group" id="c7" style="display:none;">
								<label for="rcm_printing" class="col-sm-2 control-label">COLOR MIGRATION - OVEN TEST</label>
								<div class="col-sm-2">
									<input name="rcm_printing_colorchange" type="text" class="form-control" id="rcm_printing_colorchange" value="<?php echo $rcekR['rcm_printing_colorchange'];?>" placeholder="Grade">
								</div>
								<div class="col-sm-2">
									<select name="rcm_printingw" class="form-control select2" id="rcm_printingw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rcm_printingw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rcm_printingw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rcm_printingw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rcm_printing_note" maxlength="50" rows="1"><?php echo $rcekR['rcm_printing_note'];?></textarea>
								</div>
							</div>
							<!-- COLOR MIGRATION - OVEN TEST END-->
							<!-- COLOR MIGRATION BEGIN-->
							<div class="form-group" id="c8" style="display:none;">
								<label for="rcm_dye" class="col-sm-2 control-label">COLOR MIGRATION FASTNESS</label>
								<div class="col-sm-2">
									<label><input type="checkbox" name="rcm_dye_temp" id="rcm_dye_temp" class="minimal" value="90" <?php if($rcekR['rcm_dye_temp']=='90'){echo "checked";}?>> 90&deg;C x 24h &nbsp; &nbsp; &nbsp; &nbsp;
									</label>
									<label><input type="checkbox" name="rcm_dye_temp" id="rcm_dye_temp" class="minimal" value="70" <?php if($rcekR['rcm_dye_temp']=='70'){echo "checked";}?>> 70&deg;C x 48h 
									</label>
								</div>
								<div class="col-sm-1">
									<input name="rcm_dye_colorchange" type="text" class="form-control" id="rcm_dye_colorchange" value="<?php echo $rcekR['rcm_dye_colorchange'];?>" placeholder="4-5 CC">
								</div>
								<div class="col-sm-1">
									<input name="rcm_dye_stainingface" type="text" class="form-control" id="rcm_dye_stainingface" value="<?php echo $rcekR['rcm_dye_stainingface'];?>" placeholder="4 C. Staining">
								</div>
								<div class="col-sm-1">
									<input name="rcm_dye_stainingback" type="text" class="form-control" id="rcm_dye_stainingback" value="<?php echo $rcekR['rcm_dye_stainingback'];?>" placeholder="4 C. Staining">
								</div>
								<div class="col-sm-2">
									<select name="rcm_dyew" class="form-control select2" id="rcm_dyew" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rcm_dyew']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rcm_dyew']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rcm_dyew']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rcm_dye_note" maxlength="50"><?php echo $rcekR['rcm_dye_note'];?></textarea>
								</div>
							</div>
							<!-- COLOR MIGRATION END-->
							<!-- LIGHT FASTNESS BEGIN-->
							<div class="form-group" id="c9" style="display:none;">
								<label for="rlight" class="col-sm-2 control-label">LIGHT FASTNESS</label>
								<div class="col-sm-2">
									<input name="rlight_rating1" type="text" class="form-control" id="rlight_rating1" value="<?php echo $rcekR['rlight_rating1'];?>" placeholder="3 Color Change (rating1)">
								</div>
								<div class="col-sm-2">
									<input name="rlight_rating2" type="text" class="form-control" id="rlight_rating2" value="<?php echo $rcekR['rlight_rating2'];?>" placeholder="4 Color Change (rating2)">
								</div>
								<div class="col-sm-2">
									<select name="rlightw" class="form-control select2" id="rlightw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rlightw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rlightw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rlightw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rlight_note" maxlength="50" rows="1"><?php echo $rcekR['rlight_note'];?></textarea>
								</div>
							</div>
							<!-- LIGHT FASTNESS END-->
							<!-- LIGHT PERSPIRATION BEGIN-->
							<div class="form-group" id="c10" style="display:none;">
								<label for="rlight_pers" class="col-sm-2 control-label">LIGHT PERSPIRATION FASTNESS</label>
								<div class="col-sm-2">
									<input name="rlight_pers_colorchange" type="text" class="form-control" id="rlight_pers_colorchange" value="<?php echo $rcekR['rlight_pers_colorchange'];?>" placeholder="3-4 Color Change">
								</div>
								<div class="col-sm-2">
									<select name="rlight_persw" class="form-control select2" id="rlight_persw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rlight_persw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rlight_persw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rlight_persw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rlight_pers_note" maxlength="50" rows="1"><?php echo $rcekR['rlight_pers_note'];?></textarea>
								</div>
							</div>
							<!-- LIGHT PERSPIRATION END-->
							<!-- SALIVA BEGIN-->
							<div class="form-group" id="c11" style="display:none;">
								<label for="rsaliva" class="col-sm-2 control-label">SALIVA FASTNESS</label>
								<div class="col-sm-2">
									<input name="rsaliva_staining" type="text" class="form-control" id="rsaliva_staining" value="<?php echo $rcekR['rsaliva_staining'];?>" placeholder="4-5 Color Staining">
								</div>
								<div class="col-sm-2">
									<select name="rsalivaw" class="form-control select2" id="rsalivaw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rsalivaw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rsalivaw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rsalivaw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rsaliva_note" maxlength="50" rows="1"><?php echo $rcekR['rsaliva_note'];?></textarea>
								</div>
							</div>
							<!-- SALIVA END-->
							<!-- BLEEDING BEGIN-->			
							<div class="form-group" id="c12" style="display:none;">
								<label for="rbleeding" class="col-sm-2 control-label">BLEEDING</label>
								<div class="col-sm-2">
									<input name="rbleeding" type="text" class="form-control" id="rbleeding" value="<?php echo $rcekR['rbleeding'];?>" placeholder="Color Staining">
								</div>
								<div class="col-sm-2">
									<select name="rbleedingw" class="form-control select2" id="rbleedingw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rbleedingw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rbleedingw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rbleedingw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rbleeding_note" maxlength="50" rows="1"><?php echo $rcekR['rbleeding_note'];?></textarea>
								</div>
							</div>
							<!-- BLEEDING END-->
							<!-- CHLORIN BEGIN-->
							<div class="form-group" id="c13" style="display:none;">
								<label for="rchlorin" class="col-sm-2 control-label">CHLORIN</label>
								<div class="col-sm-2">
									<input name="rchlorin" type="text" class="form-control" id="rchlorin" value="<?php echo $rcekR['rchlorin'];?>" placeholder="">
								</div>
								<div class="col-sm-2">
									<select name="rchlorinw" class="form-control select2" id="rchlorinw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rchlorinw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rchlorinw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rchlorinw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rchlorin_note" maxlength="50" rows="1"><?php echo $rcekR['rchlorin_note'];?></textarea>
								</div>
							</div>
							<!-- CHLORIN END-->	
							<!-- NON CHLORIN BEGIN-->
							<div class="form-group" id="c14" style="display:none;">
								<label for="rnchlorin" class="col-sm-2 control-label">NON-CHLORIN</label>
								<div class="col-sm-2">
									<input name="rnchlorin1" type="text" class="form-control" id="rnchlorin1" value="<?php echo $rcekR['rnchlorin1'];?>" placeholder="">
									<input name="rnchlorin2" type="text" class="form-control" id="rnchlorin2" value="<?php echo $rcekR['rnchlorin2'];?>" placeholder="">
								</div>
								<div class="col-sm-2">
									<select name="rnchlorinw" class="form-control select2" id="rnchlorinw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rnchlorinw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rnchlorinw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rnchlorinw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- NON CHLORIN END-->
							<!-- DYE TRANSFER BEGIN-->
							<div class="form-group" id="c15" style="display:none;">
								<label for="rdye_tf" class="col-sm-2 control-label">DYE TRANSFER</label>
								<div class="col-sm-2">
									<input name="rdye_tf_acetate" type="text" class="form-control" id="rdye_tf_acetate" value="<?php echo $rcekR['rdye_tf_acetate'];?>" placeholder="Acetate">
									<input name="rdye_tf_cotton" type="text" class="form-control" id="rdye_tf_cotton" value="<?php echo $rcekR['rdye_tf_cotton'];?>" placeholder="Cotton">
								</div>
								<div class="col-sm-2">
									<input name="rdye_tf_nylon" type="text" class="form-control" id="rdye_tf_nylon" value="<?php echo $rcekR['rdye_tf_nylon'];?>" placeholder="Nylon">
									<input name="rdye_tf_poly" type="text" class="form-control" id="rdye_tf_poly" value="<?php echo $rcekR['rdye_tf_poly'];?>" placeholder="Polyester">
								</div>
								<div class="col-sm-2">
									<input name="rdye_tf_acrylic" type="text" class="form-control" id="rdye_tf_acrylic" value="<?php echo $rcekR['rdye_tf_acrylic'];?>" placeholder="Acrylic">
									<input name="rdye_tf_wool" type="text" class="form-control" id="rdye_tf_wool" value="<?php echo $rcekR['rdye_tf_wool'];?>" placeholder="Wool">
								</div>
								<div class="col-sm-2">
									<input name="rdye_tf_sstaining" type="text" class="form-control" id="rdye_tf_sstaining" value="<?php echo $rcekR['rdye_tf_sstaining'];?>" placeholder="Self Staining">
									<input name="rdye_tf_cstaining" type="text" class="form-control" id="rdye_tf_cstaining" value="<?php echo $rcekR['rdye_tf_cstaining'];?>" placeholder="Color Staining">
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rdye_tf_note" maxlength="50" rows="1"><?php echo $rcekR['rdye_tf_note'];?></textarea>
								</div>
							</div>
							<div class="form-group" id="c15w" style="display:none;">
								<label for="rthickn" class="col-sm-2 control-label">WARNA</label>
								<div class="col-sm-2">
									<select name="rdye_tfw" class="form-control select2" id="rdye_tfw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rdye_tfw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rdye_tfw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rdye_tfw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- DYE TRANSFER END-->
							<div class="form-group">					
								<?php if($noitem!="" or $nohanger!=""){ ?>
								<button type="submit" class="btn btn-primary pull-right" name="colorfastness_save" value="save"><i class="fa fa-save"></i> Simpan</button>
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
									<option value="WICKING">WICKING</option>
									<option value="ABSORBENCY">ABSORBENCY</option>
									<option value="DRYING TIME">DRYING TIME</option>
									<option value="WATER REPPELENT">WATER REPPELENT</option> 
									<option value="PH">PH</option> 
									<option value="SOIL RELEASE">SOIL RELEASE</option>  
									<option value="HUMIDITY">HUMIDITY</option> 
									</select>
								</div>
							</div>
							<!-- WICKING BEGIN-->
							<div class="form-group" id="f1" style="display:none;">
								<label for="rwicking" class="col-sm-2 control-label">WICKING ORIGINAL</label>
								<input name="sts_random" type="hidden" class="form-control" id="sts_random" value="<?php echo $rcekTR['sts'];?>" placeholder="">
								<input name="sts_random2" type="hidden" class="form-control" id="sts_random2" value="<?php echo $rcekTR2['sts'];?>" placeholder="">
								<div class="col-sm-2">
									<input name="rwick_l1" type="text" class="form-control" id="rwick_l1" value="<?php echo $rcekR['rwick_l1'];?>" placeholder="Beforewash ">
									<input name="rwick_w1" type="text" class="form-control" id="rwick_w1" value="<?php echo $rcekR['rwick_w1'];?>" placeholder="Afterwash ">
								</div>
								<div class="col-sm-2">
									<input name="rwick_l3" type="text" class="form-control" id="rwick_l3" value="<?php echo $rcekR['rwick_l3'];?>" placeholder="Beforewash">
									<input name="rwick_w3" type="text" class="form-control" id="rwick_w3" value="<?php echo $rcekR['rwick_w3'];?>" placeholder="Afterwash">
								</div>
								<!--<div class="col-sm-1">
									<input name="rwick_l3" type="text" class="form-control" id="rwick_l3" value="<?php echo $rcekR['rwick_l3'];?>" placeholder="LEN 3">
									<input name="rwick_w3" type="text" class="form-control" id="rwick_w3" value="<?php echo $rcekR['rwick_w3'];?>" placeholder="WID 3">
								</div>-->
								<div class="col-sm-2">
									<select name="rwickw_ori" class="form-control select2" id="rwickw_ori" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rwickw_ori']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rwickw_ori']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rwickw_ori']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rwick_note" maxlength="50"><?php echo $rcekR['rwick_note'];?></textarea>
								</div>
							</div>
							<div class="form-group" id="f27" style="display:none;">
								<label for="rwicking" class="col-sm-2 control-label">WICKING AFTERWASH</label>
								<!--<div class="col-sm-1">
									<input name="rwick_l1" type="text" class="form-control" id="rwick_l1" value="<?php echo $rcekR['rwick_l1'];?>" placeholder="LEN 1">
									<input name="rwick_w1" type="text" class="form-control" id="rwick_w1" value="<?php echo $rcekR['rwick_w1'];?>" placeholder="WID 1">
								</div>-->
								<div class="col-sm-2">
									<input name="rwick_l2" type="text" class="form-control" id="rwick_l2" value="<?php echo $rcekR['rwick_l2'];?>" placeholder="Beforewash ">
									<input name="rwick_w2" type="text" class="form-control" id="rwick_w2" value="<?php echo $rcekR['rwick_w2'];?>" placeholder="Afterwash ">
								</div>
								<div class="col-sm-2">
									<input name="rwick_l4" type="text" class="form-control" id="rwick_l4" value="<?php echo $rcekR['rwick_l4'];?>" placeholder="Beforewash">
									<input name="rwick_w4" type="text" class="form-control" id="rwick_w4" value="<?php echo $rcekR['rwick_w4'];?>" placeholder="Afterwash">
								</div>
								<!--<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rwick_note" maxlength="50"><?php echo $rcekR['rwick_note'];?></textarea>
								</div>-->
								<div class="col-sm-2">
									<select name="rwickw_af" class="form-control select2" id="rwickw_af" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rwickw_af']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rwickw_af']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rwickw_af']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- WICKING END-->
							<!-- ABSORBENCY BEGIN-->
							<div class="form-group" id="f2" style="display:none;">
								<label for="rabsor" class="col-sm-2 control-label">ABSORBENCY ORIGINAL</label>
								<div class="col-sm-1">
									<input name="rabsor_f2" type="text" class="form-control" id="rabsor_f2" value="<?php echo $rcekR['rabsor_f2'];?>" placeholder="ORIGINAL 1">
								</div>
								<div class="col-sm-1">
									<input name="rabsor_f1" type="text" class="form-control" id="rabsor_f1" value="<?php echo $rcekR['rabsor_f1'];?>" placeholder="ORIGINAL 2">
								</div>
								<!--<div class="col-sm-1">
									<input name="rabsor_f3" type="text" class="form-control" id="rabsor_f3" value="<?php echo $rcekR['rabsor_f3'];?>" placeholder="ORIGINAL 3">
								</div>-->
								<div class="col-sm-2">
									<select name="rabsorw_ori" class="form-control select2" id="rabsorw_ori" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rabsorw_ori']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rabsorw_ori']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rabsorw_ori']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rabsor_note" maxlength="50"><?php echo $rcekR['rabsor_note'];?></textarea>
								</div>
							</div>
							<div class="form-group" id="f25" style="display:none;">
								<label for="rabsor" class="col-sm-2 control-label">ABSORBENCY AFTERWASH</label>
								<div class="col-sm-1">
									<input name="rabsor_b2" type="text" class="form-control" id="rabsor_b2" value="<?php echo $rcekR['rabsor_b2'];?>" placeholder="AFTERWASH 1">
								</div>
								<div class="col-sm-1">
									<input name="rabsor_b1" type="text" class="form-control" id="rabsor_b1" value="<?php echo $rcekR['rabsor_b1'];?>" placeholder="AFTERWASH 2">
								</div>
								<div class="col-sm-2">
									<select name="rabsorw_af" class="form-control select2" id="rabsorw_af" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rabsorw_af']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rabsorw_af']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rabsorw_af']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<!--<div class="col-sm-1">
									<input name="rabsor_b3" type="text" class="form-control" id="rabsor_b3" value="<?php echo $rcekR['rabsor_b3'];?>" placeholder="AFTERWASH 3">
								</div>-->
							</div>
							<!-- ABSORBENCY END-->
							<!-- DRYING TIME BEGIN-->
							<div class="form-group" id="f3" style="display:none;">
								<label for="rdryingt" class="col-sm-2 control-label">DRYING TIME ORIGINAL</label>
								<div class="col-sm-2">
									<input name="rdry1" type="text" class="form-control" id="rdry1" value="<?php echo $rcekR['rdry1'];?>" placeholder="1">
								</div>
								<!--<div class="col-sm-2">
									<input name="rdry2" type="text" class="form-control" id="rdry2" value="<?php echo $rcekR['rdry2'];?>" placeholder="2">
								</div>
								<div class="col-sm-2">
									<input name="rdry3" type="text" class="form-control" id="rdry3" value="<?php echo $rcekR['rdry3'];?>" placeholder="3">
								</div>-->
								<div class="col-sm-2">
									<select name="rdryw_ori" class="form-control select2" id="rdryw_ori" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rdryw_ori']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rdryw_ori']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rdryw_ori']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rdry_note" maxlength="50" rows="1"><?php echo $rcekR['rdry_note'];?></textarea>
								</div>	  
							</div>
							<div class="form-group" id="f26" style="display:none;">
								<label for="rdryingt" class="col-sm-2 control-label">DRYING TIME AFTERWASH</label>
								<div class="col-sm-2">
									<input name="rdryaf1" type="text" class="form-control" id="rdryaf1" value="<?php echo $rcekR['rdryaf1'];?>" placeholder="1">
								</div>
								<!--<div class="col-sm-2">
									<input name="rdryaf2" type="text" class="form-control" id="rdryaf2" value="<?php echo $rcekR['rdryaf2'];?>" placeholder="2">
								</div>
								<div class="col-sm-2">
									<input name="rdryaf3" type="text" class="form-control" id="rdryaf3" value="<?php echo $rcekR['rdryaf3'];?>" placeholder="3">
								</div>-->
								<div class="col-sm-2">
									<select name="rdryw_af" class="form-control select2" id="rdryw_af" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rdryw_af']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rdryw_af']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rdryw_af']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- DRYING TIME END-->
							<!-- WATER REPPELENT BEGIN-->
							<div class="form-group" id="f4" style="display:none;">
								<label for="rwaterr" class="col-sm-2 control-label">WATER REPPELENT ORIGINAL</label>
								<div class="col-sm-2">
									<input name="rrepp1" type="text" class="form-control" id="rrepp1" value="<?php echo $rcekR['rrepp1'];?>" placeholder="Before Wash">
								</div>
								<!--<div class="col-sm-2">
									<input name="rrepp2" type="text" class="form-control" id="rrepp2" value="<?php echo $rcekR['rrepp2'];?>" placeholder="2">
								</div>
								<div class="col-sm-2">
									<input name="rrepp3" type="text" class="form-control" id="rrepp3" value="<?php echo $rcekR['rrepp3'];?>" placeholder="3">
								</div>
								<div class="col-sm-2">
									<input name="rrepp4" type="text" class="form-control" id="rrepp4" value="<?php echo $rcekR['rrepp4'];?>" placeholder="4">
								</div>-->
								<div class="col-sm-2">
									<select name="rreppw_ori" class="form-control select2" id="rreppw_ori" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rreppw_ori']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rreppw_ori']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rreppw_ori']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rrepp_note" maxlength="50" rows="1"><?php echo $rcekR['rrepp_note'];?></textarea>
								</div>	  
							</div>
							<div class="form-group" id="f6" style="display:none;">
								<label for="rwaterr" class="col-sm-2 control-label">WATER REPPELENT AFTERWASH</label>
								<div class="col-sm-2">
									<input name="rrepp2" type="text" class="form-control" id="rrepp2" value="<?php echo $rcekR['rrepp2'];?>" placeholder="After Wash">
								</div>
								<div class="col-sm-2">
									<select name="rreppw_af" class="form-control select2" id="rreppw_af" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rreppw_af']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rreppw_af']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rreppw_af']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
							</div>
							<!-- WATER REPPELENT END-->
							<!-- PH BEGIN-->
							<div class="form-group" id="f5" style="display:none;">
								<label for="rph" class="col-sm-2 control-label">PH</label>
								<div class="col-sm-2">
									<input name="rph" type="text" class="form-control" id="rph" value="<?php echo $rcekR['rph'];?>" placeholder="Ph">
								</div>
								<div class="col-sm-2">
									<select name="rphw" class="form-control select2" id="rphw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rphw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rphw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rphw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rph_note" maxlength="50" rows="1"><?php echo $rcekR['rph_note'];?></textarea>
								</div>
							</div>
							<!-- PH END-->
							<!-- SOIL RELEASE BEGIN-->
							<div class="form-group" id="f24" style="display:none;">
								<label for="rsoil" class="col-sm-2 control-label">SOIL RELEASE</label>
								<div class="col-sm-2">
									<input name="rsoil" type="text" class="form-control" id="rsoil" value="<?php echo $rcekR['rsoil'];?>" placeholder="Soil">
								</div>
								<div class="col-sm-2">
									<select name="rsoilw" class="form-control select2" id="rsoilw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rsoilw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rsoilw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rsoilw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rsoil_note" maxlength="50" rows="1"><?php echo $rcekR['rsoil_note'];?></textarea>
								</div>
							</div>
							<!-- SOIL RELEASE END-->
							<!-- HUMIDITY BEGIN-->
							<div class="form-group" id="f28" style="display:none;">
								<label for="rhumidity" class="col-sm-2 control-label">HUMIDITY</label>
								<div class="col-sm-2">
									<input name="rhumidity" type="text" class="form-control" id="rhumidity" value="<?php echo $rcekR['rhumidity'];?>" placeholder="Humidity">
								</div>
								<div class="col-sm-2">
									<select name="rhumidityw" class="form-control select2" id="rhumidityw" style="width: 100%;">
										<option selected="selected" value="">Pilih Warna</option>
 										<option <?php if($rcekRW['rhumidityw']=="#FFE54E"){?>selected="selected" <?php }?> value="#FFE54E">Kuning</option>
										<option <?php if($rcekRW['rhumidityw']=="#FF6F30"){?>selected="selected" <?php }?> value="#FF6F30">Orange</option>
										<option <?php if($rcekRW['rhumidityw']=="#FFFFFF"){?>selected="selected" <?php }?> value="#FFFFFF">Putih</option>
									</select>
								</div>
								<div class="col-sm-2">
									<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rhumidity_note" maxlength="50" rows="1"><?php echo $rcekR['rhumidity_note'];?></textarea>
								</div>
							</div>
							<!-- HUMIDITY END-->
							<div class="form-group">					
									<?php if($noitem!="" or $nohanger!=""){ ?>
								<button type="submit" class="btn btn-primary pull-right" name="functional_save" value="save"><i class="fa fa-save"></i> Simpan</button>
								<?php } ?>
							</div>
						</form>	
					</div>
				</div>
				<!-- /.tab-content -->
			</div>
			<!-- nav-tabs-custom -->
		</div>
		<!-- /.col -->
	</div>	 
		<div class="box-footer">
			<!--<?php if($rcek['buyer']=="ADIDAS"){ ?>
			<a href="pages/cetak/cetak_report_adidas.php?idkk=<?php echo $rcek['id'];?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print Report Physical</a>
			<a href="pages/cetak/cetak_reportfunc_adidas.php?idkk=<?php echo $rcek['id'];?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print Report Functional</a>
			<?php }?>-->
		</div>
			<!-- /.box-footer -->
</div>
<?php }?>

<?php if($_GET['no_hanger']!=""){ ?>
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Result Random
            <small class="pull-right">Date: <?php echo $rcekR['tgl_buat'];?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <strong>PHYSICAL</strong>
			<hr>			
          <div class="table-responsive">
		  <table class="table">
			  <?php if($rcekR['rflamability']!=""){?>	
              <tr>
                <th colspan="2" style="width:50%">Flamability</th>
                <td colspan="6">
				<?php echo $rcekR['rflamability'];?>
				</td>
              </tr>
			  <?php } ?>
			  <!--<?php if($rcekR['rfibercontent']!=""){?>	
              <tr>
                <th colspan="2">Fiber Content</th>
                <td colspan="6">
				<?php if($rcekR['stat_fib']=="RANDOM"){echo $rcekR['rfibercontent'];}else if($rcekR['stat_fib']=="DISPOSISI"){echo $rcekD['dfibercontent'];}else{echo $rcekR['fibercontent'];}?>
				</td>
              </tr>
			  <?php } ?>-->
			  <?php if($rcekR['rfc_cott']!="" or $rcekR['rfc_poly']!="" or $rcekR['rfc_elastane']!=""){?>	
              <tr>
                <th colspan="2">Fiber Content</th>
                <td colspan="6">
				<?php if($rcekR['rfc_cott']!=""){echo $rcekR['rfc_cott']."% ".$rcekR['rfc_cott1'];}?> <?php if($rcekR['rfc_poly']!=""){echo $rcekR['rfc_poly']."% ".$rcekR['rfc_poly1'];}?> <?php if($rcekR['rfc_elastane']!=""){echo $rcekR['rfc_elastane']."% ".$rcekR['rfc_elastane1'];}
				?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rfc_wpi']!="" or $rcekR['rfc_cpi']!=""){?>	
              <tr>
                <th colspan="2">Fabric Count</th>
                <td colspan="6">
				W: <?php echo $rcekR['rfc_wpi'];?>
				C: <?php echo $rcekR['rfc_cpi'];?>
				</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rf_weight']!=""){?>	
              <tr>
                <th colspan="2">Fabric Weight</th>
                <td colspan="6">
				<?php echo $rcekR['rf_weight'];?>
				</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcekR['rf_width']!=""){?>	
              <tr>
                <th colspan="2">Fabric Width</th>
                <td colspan="6">
				<?php echo $rcekR['rf_width'];?>
				</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rbow']!="" or $rcekR['rskew']!=""){?>	
              <tr>
                <th colspan="2">Bow &amp; Skew</th>
                <td colspan="6">
				<?php echo $rcekR['rbow'];?> &amp;
				<?php echo $rcekR['rskew'];?>
				</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rss_temp']!=""){?>	
              <tr>
                <th colspan="2">Suhu Shrinkage Spirality</th>
                <td colspan="6"><?php echo $rcekR['rss_temp'];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rss_washes']!=""){?>	
              <tr>
                <th colspan="2">Washes Shrinkage Spirality</th>
                <td colspan="6"><?php echo $rcekR['rss_washes'];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rshrinkage_l1']!="" or $rcekR['rshrinkage_l2']!="" or $rcekR['rshrinkage_l3']!="" or $rcekR['rshrinkage_l4']!=""){?>	
              <tr>
                <th colspan="2">Shrinkage Length</th>
                <td><?php echo $rcekR['rshrinkage_l1'];?></td>
                <td><?php echo $rcekR['rshrinkage_l2'];?></td>
                <td><?php echo $rcekR['rshrinkage_l3'];?></td>
                <td><?php echo $rcekR['rshrinkage_l4'];?></td>
                <td><?php echo $rcekR['rshrinkage_l5'];?></td>
                <td><?php echo $rcekR['rshrinkage_l6'];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rshrinkage_w1']!="" or $rcekR['rshrinkage_w2']!="" or $rcekR['rshrinkage_w3']!="" or $rcekR['rshrinkage_w4']!=""){?>	
              <tr>
                <th colspan="2">Shrinkage Width</th>
                <td><?php echo $rcekR['rshrinkage_w1'];?></td>
                <td><?php echo $rcekR['rshrinkage_w2'];?></td>
                <td><?php echo $rcekR['rshrinkage_w3'];?></td>
                <td><?php echo $rcekR['rshrinkage_w4'];?></td>
                <td><?php echo $rcekR['rshrinkage_w5'];?></td>
                <td><?php echo $rcekR['rshrinkage_w6'];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rspirality1']!="" or $rcekR['rspirality2']!="" or $rcekR['rspirality3']!="" or $rcekR['rspirality4']!=""){?>		
              <tr>
                <th colspan="2">Spirality</th>
                <td><?php echo $rcekR['rspirality1'];?></td>
                <td><?php echo $rcekR['rspirality2'];?></td>
                <td><?php echo $rcekR['rspirality3'];?></td>
                <td><?php echo $rcekR['rspirality4'];?></td>
                <td><?php echo $rcekR['rspirality5'];?></td>
                <td><?php echo $rcekR['rspirality6'];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rapperss_ch1']!="" or $rcekR['rapperss_ch2']!="" or $rcekR['rapperss_ch3']!="" or $rcekR['rapperss_ch4']!=""){?>	
              <tr>
			  <th>Apperance</th>
                <th>&nbsp;</th>
                <td><?php echo $rcekR['rapperss_ch1'];?>
				</td>
                <td><?php echo $rcekR['rapperss_ch2'];?>
				</td>
				<td><?php echo $rcekR['rapperss_ch3'];?>
				</td>
                <td colspan="3"><?php echo $rcekR['rapperss_ch4'];?>
				</td>
              </tr>
			  <tr>
			  	<th>Colorchange</th>
				  <th>&nbsp;</th>
                <td><?php echo $rcekR['rapperss_cc1'];?>
				</td>
                <td><?php echo $rcekR['rapperss_cc2'];?>
				</td>
				<td><?php echo $rcekR['rapperss_cc3'];?>
				</td>
                <td colspan="3"><?php echo $rcekR['rapperss_cc4'];?>
				</td>
			  </tr>
			  <?php } ?>
			  <?php if($rcekR['rpm_f1']!="" or $rcekR['rpm_f2']!="" or $rcekR['rpm_f3']!="" or $rcekR['rpm_f4']!="" or $rcekR['rpm_f5']!=""){?>	
              <tr>
                <th rowspan="2">Pilling Martindle</th>
                <th>Face</th>
                <td><?php echo $rcekR['rpm_f1'];?></td>
                <td><?php echo $rcekR['rpm_f2'];?></td>
                <td><?php echo $rcekR['rpm_f3'];?></td>
                <td><?php echo $rcekR['rpm_f4'];?></td>
                <td><?php echo $rcekR['rpm_f5'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rpm_b1']!="" or $rcekR['rpm_b2']!="" or $rcekR['rpm_b3']!="" or $rcekR['rpm_b4']!="" or $rcekR['rpm_b5']!="" or $rcekR['rpm_f1']!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php echo $rcekR['rpm_b1'];?></td>
                <td><?php echo $rcekR['rpm_b2'];?></td>
                <td><?php echo $rcekR['rpm_b3'];?></td>
                <td><?php echo $rcekR['rpm_b4'];?></td>
                <td><?php echo $rcekR['rpm_b5'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rpl_f1']!="" or $rcekR['rpl_f2']!="" or $rcekR['rpl_f3']!="" or $rcekR['rpl_f4']!="" or $rcekR['rpl_f5']!="" or $rcekR['rpl_b1']!=""){?>	
              <tr>
                <th rowspan="2">Pilling Locus</th>
                <th>Face</th>
                <td><?php echo $rcekR['rpl_f1'];?></td>
                <td><?php echo $rcekR['rpl_f2'];?></td>
                <td><?php echo $rcekR['rpl_f3'];?></td>
                <td><?php echo $rcekR['rpl_f4'];?></td>
                <td><?php echo $rcekR['rpl_f5'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rpl_b1']!="" or $rcekR['rpl_b2']!="" or $rcekR['rpl_b3']!="" or $rcekR['rpl_b4']!="" or $rcekR['rpl_b5']!="" or $rcekR['rpl_f1']!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php echo $rcekR['rpl_b1'];?></td>
                <td><?php echo $rcekR['rpl_b2'];?></td>
                <td><?php echo $rcekR['rpl_b3'];?></td>
                <td><?php echo $rcekR['rpl_b4'];?></td>
                <td><?php echo $rcekR['rpl_b5'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcekR['rpb_f1']!="" or $rcekR['rpb_f2']!="" or $rcekR['rpb_f3']!="" or $rcekR['rpb_f4']!="" or $rcekR['rpb_f5']!=""){?>	
              <tr>
                <th rowspan="2">Pilling Box</th>
                <th>Face</th>
                <td><?php echo $rcekR['rpb_f1'];?></td>
                <td><?php echo $rcekR['rpb_f2'];?></td>
                <td><?php echo $rcekR['rpb_f3'];?></td>
                <td><?php echo $rcekR['rpb_f4'];?></td>
                <td><?php echo $rcekR['rpb_f5'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rpb_b1']!="" or $rcekR['rpb_b2']!="" or $rcekR['rpb_b3']!="" or $rcekR['rpb_b4']!="" or $rcekR['rpb_b5']!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php echo $rcekR['rpb_b1'];?></td>
                <td><?php echo $rcekR['rpb_b2'];?></td>
                <td><?php echo $rcekR['rpb_b3'];?></td>
                <td><?php echo $rcekR['rpb_b4'];?></td>
                <td><?php echo $rcekR['rpb_b5'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rprt_f1']!="" or $rcekR['rprt_f2']!="" or $rcekR['rprt_f3']!="" or $rcekR['rprt_f4']!="" or $rcekR['rprt_f5']!="" or $rcekR['rprt_b1']!=""){?>	
              <tr>
                <th rowspan="2">Pilling Random Tumbler</th>
                <th>Face</th>
                <td><?php echo $rcekR['rprt_f1'];?></td>
                <td><?php echo $rcekR['rprt_f2'];?></td>
                <td><?php echo $rcekR['rprt_f3'];?></td>
                <td><?php echo $rcekR['rprt_f4'];?></td>
                <td><?php echo $rcekR['rprt_f5'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rprt_f1']!="" or $rcekR['rprt_b1']!="" or $rcekR['rprt_b2']!="" or $rcekR['rprt_b3']!="" or $rcekR['rprt_b4']!="" or $rcekR['rprt_b5']!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php echo $rcekR['rprt_b1'];?></td>
                <td><?php echo $rcekR['rprt_b2'];?></td>
                <td><?php echo $rcekR['rprt_b3'];?></td>
                <td><?php echo $rcekR['rprt_b4'];?></td>
                <td><?php echo $rcekR['rprt_b5'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rabration']!=""){?>	
              <tr>
                <th colspan="2">Abration</th>
                <td colspan="6">
				<?php echo $rcekR['rabration'];?>
				</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rsm_l1']!="" or $rcekR['rsm_l2']!="" or $rcekR['rsm_l3']!="" or $rcekR['rsm_l4']!=""){?>	
              <tr>
                <th rowspan="2">Snagging Mace</th>
                <th>Len</th>
                <td><?php echo $rcekR['rsm_l1'];?></td>
                <td><?php echo $rcekR['rsm_l2'];?></td>
                <td><?php echo $rcekR['rsm_l3'];?></td>
                <td><?php echo $rcekR['rsm_l4'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rsm_w1']!="" or $rcekR['rsm_w2']!="" or $rcekR['rsm_w3']!="" or $rcekR['rsm_w4']!=""){?>	
              <tr>
                <th>Wid</th>
                <td><?php echo $rcekR['rsm_w1'];?></td>
                <td><?php echo $rcekR['rsm_w2'];?></td>
                <td><?php echo $rcekR['rsm_w3'];?></td>
                <td><?php echo $rcekR['rsm_w4'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rsp_grdl1']!="" or $rcekR['rsp_clsl1']!="" or $rcekR['rsp_shol1']!="" or $rcekR['rsp_medl1']!="" or $rcekR['rsp_lonl1']!="" or $rcekR['rsp_grdl2']!="" or $rcekR['rsp_clsl2']!="" or $rcekR['rsp_shol2']!="" or $rcekR['rsp_medl2']!="" or $rcekR['rsp_lonl2']!="" or $rcekR['rsp_grdw1']!="" or $rcekR['rsp_clsw1']!="" or $rcekR['rsp_show1']!="" or $rcekR['rsp_medw1']!="" or $rcekR['rsp_lonw1']!="" or $rcekR['rsp_grdw2']!="" or $rcekR['rsp_clsw2']!="" or $rcekR['rsp_show2']!="" or $rcekR['rsp_medw2']!="" or $rcekR['rsp_lonw2']!=""){
				if($rcekR['rsp_grdl1']!="" or $rcekR['rsp_clsl1']!="" or $rcekR['rsp_shol1']!="" or $rcekR['rsp_medl1']!="" or $rcekR['rsp_lonl1']!=""){$rp1="1";}else{$rp1="0";}
				if($rcekR['rsp_grdl2']!="" or $rcekR['rsp_clsl2']!="" or $rcekR['rsp_shol2']!="" or $rcekR['rsp_medl2']!="" or $rcekR['rsp_lonl2']!=""){$rp2="1";}else{$rp2="0";}
				if($rcekR['rsp_grdw1']!="" or $rcekR['rsp_clsw1']!="" or $rcekR['rsp_show1']!="" or $rcekR['rsp_medw1']!="" or $rcekR['rsp_lonw1']!=""){$rp3="1";}else{$rp3="0";}
				if($rcekR['rsp_grdw2']!="" or $rcekR['rsp_clsw2']!="" or $rcekR['rsp_show2']!="" or $rcekR['rsp_medw2']!="" or $rcekR['rsp_lonw2']!=""){$rp4="1";}else{$rp4="0";}
				$rowspan=$rp1+$rp2+$rp3+$rp4+1;
			  ?>	
              <tr>
                <th rowspan="<?php echo $rowspan;?>">Snagging POD</th>
                <th>Srt</th>
                <th>Grd</th>
                <th>Cls</th>
                <th>Sho</th>
                <th>Med</th>
                <th>Long</th>
                <th>&nbsp;</th>
			  </tr>
			  <?php } ?>	
			  <?php if($rcekR['rsp_grdl1']!="" or $rcekR['rsp_clsl1']!="" or $rcekR['rsp_shol1']!="" or $rcekR['rsp_medl1']!="" or $rcekR['rsp_lonl1']!=""){?>	
              <tr>
                <th>L1</th>
                <td><?php echo $rcekR['rsp_grdl1'];?></td>
                <td><?php echo $rcekR['rsp_clsl1'];?></td>
                <td><?php echo $rcekR['rsp_shol1'];?></td>
                <td><?php echo $rcekR['rsp_medl1'];?></td>
                <td><?php echo $rcekR['rsp_lonl1'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcekR['rsp_grdl2']!="" or $rcekR['rsp_clsl2']!="" or $rcekR['rsp_shol2']!="" or $rcekR['rsp_medl2']!="" or $rcekR['rsp_lonl2']!=""){?>		
              <tr>
                <th>L2</th>
                <td><?php echo $rcekR['rsp_grdl2'];?></td>
                <td><?php echo $rcekR['rsp_clsl2'];?></td>
                <td><?php echo $rcekR['rsp_shol2'];?></td>
                <td><?php echo $rcekR['rsp_medl2'];?></td>
                <td><?php echo $rcekR['rsp_lonl2'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcekR['rsp_grdw1']!="" or $rcekR['rsp_clsw1']!="" or $rcekR['rsp_show1']!="" or $rcekR['rsp_medw1']!="" or $rcekR['rsp_lonw1']!=""){?>		
              <tr>
                <th>W1</th>
                <td><?php echo $rcekR['rsp_grdw1'];?></td>
                <td><?php echo $rcekR['rsp_clsw1'];?></td>
                <td><?php echo $rcekR['rsp_show1'];?></td>
                <td><?php echo $rcekR['rsp_medw1'];?></td>
                <td><?php echo $rcekR['rsp_lonw1'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcekR['rsp_grdw2']!="" or $rcekR['rsp_clsw2']!="" or $rcekR['rsp_show2']!="" or $rcekR['rsp_medw2']!="" or $rcekR['rsp_lonw2']!=""){?>	
              <tr>
                <th>W2</th>
                <td><?php echo $rcekR['rsp_grdw2'];?></td>
                <td><?php echo $rcekR['rsp_clsw2'];?></td>
                <td><?php echo $rcekR['rsp_show2'];?></td>
                <td><?php echo $rcekR['rsp_medw2'];?></td>
                <td><?php echo $rcekR['rsp_lonw2'];?></td>
                <td>&nbsp;</td>
              </tr>
              <?php } ?>
			  <?php if($rcekR['rsb_l1']!="" or $rcekR['rsb_l2']!="" or $rcekR['rsb_l3']!="" or $rcekR['rsb_l4']!=""){?>	
              <tr>
                <th rowspan="2">Bean Bag</th>
                <th>Len</th>
                <td><?php echo $rcekR['rsb_l1'];?></td>
                <td><?php echo $rcekR['rsb_l2'];?></td>
                <td><?php echo $rcekR['rsb_l3'];?></td>
                <td><?php echo $rcekR['rsb_l4'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rsb_w1']!="" or $rcekR['rsb_w2']!="" or $rcekR['rsb_w3']!="" or $rcekR['rsb_w4']!=""){?>	
              <tr>
                <th>Wid</th>
                <td><?php echo $rcekR['rsb_w1'];?></td>
                <td><?php echo $rcekR['rsb_w2'];?></td>
                <td><?php echo $rcekR['rsb_w3'];?></td>
                <td><?php echo $rcekR['rsb_w4'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rbs_instron']!="" or $rcekR['rbs_mullen']!="" or $rcekR['rbs_tru']!=""){?>	
              <tr>
                <th colspan="2">Bursting Strength</th>
                <td><?php echo $rcekR['rbs_instron'];?></td>
                <td><?php echo $rcekR['rbs_mullen'];?></td>
                <td colspan="4"><?php echo $rcekR['rbs_tru'];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rthick1']!="" or $rcekR['rthick2']!="" or $rcekR['rthick3']!="" or $rcekR['rthickav']!=""){?>	
              <tr>
                <th colspan="2">Thickness</th>
                <td><?php echo $rcekR['rthick1'];?></td>
                <td><?php echo $rcekR['rthick2'];?></td>
                <td><?php echo $rcekR['rthick3'];?></td>
                <td><?php echo $rcekR['rthickav'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rstretch_l1']!="" or $rcekR['rstretch_l2']!="" or $rcekR['rstretch_l3']!="" or $rcekR['rstretch_l4']!="" or $rcekR['rstretch_l5']!=""){?>	
				<tr>
                <th rowspan="3">Stretch</th>
                <th>Load</th>
                <td><?php echo $rcekR['rload_stretch'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <th>Len</th>
                <td><?php echo $rcekR['rstretch_l1'];?></td>
                <td><?php echo $rcekR['rstretch_l2'];?></td>
                <td><?php echo $rcekR['rstretch_l3'];?></td>
                <td><?php echo $rcekR['rstretch_l4'];?></td>
                <td><?php echo $rcekR['rstretch_l5'];?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php echo $rcekR['rstretch_w1'];?></td>
                <td><?php echo $rcekR['rstretch_w2'];?></td>
                <td><?php echo $rcekR['rstretch_w3'];?></td>
                <td><?php echo $rcekR['rstretch_w4'];?></td>
                <td><?php echo $rcekR['rstretch_w5'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rrecover_l1']!="" or $rcekR['rrecover_l2']!="" or $rcekR['rrecover_l3']!="" or $rcekR['rrecover_l4']!="" or $rcekR['rrecover_l5']!=""){?>	
              <tr>
                <th rowspan="2">Recovery</th>
                <th>Len</th>
                <td><?php echo $rcekR['rrecover_l1'];?></td>
                <td><?php echo $rcekR['rrecover_l2'];?></td>
                <td><?php echo $rcekR['rrecover_l3'];?></td>
                <td><?php echo $rcekR['rrecover_l4'];?></td>
                <td><?php echo $rcekR['rrecover_l5'];?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php echo $rcekR['rrecover_w1'];?></td>
                <td><?php echo $rcekR['rrecover_w2'];?></td>
                <td><?php echo $rcekR['rrecover_w3'];?></td>
                <td><?php echo $rcekR['rrecover_w4'];?></td>
                <td><?php echo $rcekR['rrecover_w5'];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rgrowth_l1']!="" or $rcekR['rgrowth_l2']!=""){?>	
              <tr>
                <th rowspan="2">Growth</th>
                <th>Len</th>
                <td><?php echo $rcekR['rgrowth_l1'];?></td>
                <td><?php echo $rcekR['rgrowth_l2'];?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php echo $rcekR['rgrowth_w1'];?></td>
                <td><?php echo $rcekR['rgrowth_w2'];?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rrec_growth_l1']!="" or $rcekR['rrec_growth_l2']!=""){?>	
              <tr>
                <th rowspan="2">Recovery Growth</th>
                <th>Len</th>
                <td><?php echo $rcekR['rrec_growth_l1'];?></td>
                <td><?php echo $rcekR['rrec_growth_l2'];?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php echo $rcekR['rrec_growth_w1'];?></td>
                <td><?php echo $rcekR['rrec_growth_w2'];?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rapper_ch1']!="" or $rcekR['rapper_ch2']!="" or $rcekR['rapper_ch3']!=""){?>	
              <tr>
			  <th rowspan="7">Appearance</th>
                <th>&nbsp;</th>
                <td><?php echo $rcekR['rapper_ch1'];?>
				</td>
                <td><?php echo $rcekR['rapper_ch2'];?>
				</td>
                <td colspan="4"><?php echo $rcekR['rapper_ch3'];?>
				</td>
              </tr>
			  <tr>
			  	<th>&nbsp;</th>
                <td><?php echo $rcekR['rapper_cc1'];?>
				</td>
                <td><?php echo $rcekR['rapper_cc2'];?>
				</td>
                <td colspan="4"><?php echo $rcekR['rapper_cc3'];?>
				</td>
			  </tr>
              <tr>
                <th>&nbsp;</th>
				<td><?php echo $rcekR['rapper_st'];?>
				</td>
                <td><?php echo $rcekR['rapper_st2'];?>
				</td>
                <td colspan="4"><?php echo $rcekR['rapper_st3'];?></td>
              </tr>
              <tr>
                <th>Face</th>
                <td><?php echo $rcekR['rapper_pf1'];?></td>
                <td><?php echo $rcekR['rapper_pf2'];?></td>
                <td colspan="4"><?php echo $rcekR['rapper_pf3'];?></td>
              </tr>
              <tr>
                <th>Back</th>
                <td><?php echo $rcekR['rapper_pb1'];?></td>
                <td><?php echo $rcekR['rapper_pb2'];?></td>
                <td colspan="4"><?php echo $rcekR['rapper_pb3'];?></td>
              </tr>
			  <tr>
				<th>&nbsp;</th>
				<td><strong>Ace</strong></td>
				<td><strong>Cot</strong></td>
				<td><strong>Nyl</strong></td>
				<td><strong>Poly</strong></td>
				<td><strong>Acr</strong></td>
				<td><strong>Wool</strong></td>
			  </tr>
			  <tr>
				<th>&nbsp;</th>
				<td><?php echo $rcekR['rapper_acetate'];?></td>
				<td><?php echo $rcekR['rapper_cotton'];?></td>
				<td><?php echo $rcekR['rapper_nylon'];?></td>
				<td><?php echo $rcekR['rapper_poly'];?></td>
				<td><?php echo $rcekR['rapper_acrylic'];?></td>
				<td><?php echo $rcekR['rapper_wool'];?></td>
			  </tr>
			  <?php } ?>
			  <?php if($rcekR['rh_shrinkage_l1']!="" or $rcekR['rh_shrinkage_w1']!="" or $rcekR['rh_shrinkage_grd']!="" or $rcekR['rh_shrinkage_app']!=""){?>	
			  <tr>
                <th rowspan="5">Heat Shrinkage</th>
                <th>Suhu</th>
                <td><?php echo $rcekR['rh_shrinkage_temp'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <th>Len</th>
                <td><?php echo $rcekR['rh_shrinkage_l1'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php echo $rcekR['rh_shrinkage_w1'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <th>Grade</th>
                <td><?php echo $rcekR['rh_shrinkage_grd'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <th>Appearance</th>
                <td><?php echo $rcekR['rh_shrinkage_app'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcekR['rfibre_transfer']!="" or $rcekR['rfibre_grade']!=""){?>	
              <tr>
                <th colspan="2">Fibre/Fuzz</th>
                <td><?php echo $rcekR['rfibre_transfer'];?></td>
                <td><?php echo $rcekR['rfibre_grade'];?></td>
                <td>&nbsp;</td>
				<td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  	<?php if($rcekR['rodour']!=""){?>  
				<tr>
					<th colspan="2">Odour</th>
					<td colspan="4"><?php echo $rcekR['rodour'];?></td>
					<td>&nbsp;</td>
          		</tr>
				<?php } ?>
				<?php if($rcekR['rcurling']!=""){?>  
				<tr>
					<th colspan="2">Curling</th>
					<td colspan="4"><?php echo $rcekR['rcurling'];?></td>
					<td>&nbsp;</td>
          		</tr>
				<?php } ?>		
				<?php if($rcekR['rnedle']!=""){?>  
				<tr>
					<th colspan="2">Nedle</th>
					<td colspan="4"><?php echo $rcekR['rnedle'];?></td>
					<td>&nbsp;</td>
          		</tr>
				<?php } ?>	
            </table>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong>FUNCTIONAL</strong>
		  <hr>
		  <table class="table">
		    <?php if($rcekR['rwick_l1']!="" or $rcekR['rwick_l2']!="" or $rcekR['rwick_l3']!="" or $rcekR['rwick_w1']!="" or $rcekR['rwick_w2']!="" or $rcekR['rwick_w3']!=""){?>
		    <tr>
		      <th rowspan="4" style="width:50%">Wicking</th>
			  <th>Original</th>
		      <th>Len</th>
		      <td><?php echo $rcekR['rwick_l1'];?></td>
		      <!--<td><?php if($rcekR['stat_wic']=="RANDOM"){echo $rcekR['rwick_l2'];}else if($rcekR['stat_wic']=="DISPOSISI"){echo $rcekD['dwick_l2'];}else{echo $rcekR['wick_l2'];}?></td>
		      <td><?php if($rcekR['stat_wic']=="RANDOM"){echo $rcekR['rwick_l3'];}else if($rcekR['stat_wic']=="DISPOSISI"){echo $rcekD['dwick_l3'];}else{echo $rcekR['wick_l3'];}?></td>-->
	        <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
		    <tr>
			  <th>&nbsp;</th>
		      <th >Wid</th>
		      <td><?php echo $rcekR['rwick_w1'];?></td>
		      <!--<td><?php if($rcekR['stat_wic']=="RANDOM"){echo $rcekR['rwick_w2'];}else if($rcekR['stat_wic']=="DISPOSISI"){echo $rcekD['dwick_w2'];}else{echo $rcekR['wick_w2'];}?></td>
		      <td><?php if($rcekR['stat_wic']=="RANDOM"){echo $rcekR['rwick_w3'];}else if($rcekR['stat_wic']=="DISPOSISI"){echo $rcekD['dwick_w3'];}else{echo $rcekR['wick_w3'];}?></td>-->
	        <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
		  <tr>
			  <th>Afterwash</th>
		      <th>Len</th>
		      <!--<td><?php if($rcekR['stat_wic']=="RANDOM"){echo $rcekR['rwick_l1'];}else if($rcekR['stat_wic']=="DISPOSISI"){echo $rcekD['dwick_l1'];}else{echo $rcekR['wick_l1'];}?></td>-->
		      <td><?php echo $rcekR['rwick_l2'];?></td>
		      <!--<td><?php if($rcekR['stat_wic']=="RANDOM"){echo $rcekR['rwick_l3'];}else if($rcekR['stat_wic']=="DISPOSISI"){echo $rcekD['dwick_l3'];}else{echo $rcekR['wick_l3'];}?></td>-->
	        <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
		    <tr>
			  <th>&nbsp;</th>
		      <th >Wid</th>
		      <!--<td><?php if($rcekR['stat_wic']=="RANDOM"){echo $rcekR['rwick_w1'];}else if($rcekR['stat_wic']=="DISPOSISI"){echo $rcekD['dwick_w1'];}else{echo $rcekR['wick_w1'];}?></td>-->
		      <td><?php echo $rcekR['rwick_w2'];?></td>
		      <!--<td><?php if($rcekR['stat_wic']=="RANDOM"){echo $rcekR['rwick_w3'];}else if($rcekR['stat_wic']=="DISPOSISI"){echo $rcekD['dwick_w3'];}else{echo $rcekR['wick_w3'];}?></td>-->
	        <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
		    <?php } ?>
		    <?php if($rcekR['rabsor_f1']!="" or $rcekR['rabsor_f2']!="" or $rcekR['rabsor_f3']!="" or $rcekR['rabsor_b1']!="" or $rcekR['rabsor_b2']!="" or $rcekR['rabsor_b3']!=""){?>
		    <tr>
		      <th rowspan="4">Absorbency</th>
		      <th>Original</th>
			  <th>Face</th>
		      <td><?php echo $rcekR['rabsor_f2'];?></td>
		      <!--<td><?php if($rcekR['stat_abs']=="RANDOM"){echo $rcekR['rabsor_f3'];}else if($rcekR['stat_abs']=="DISPOSISI"){echo $rcekD['dabsor_f3'];}else{echo $rcekR['absor_f3'];}?></td>-->
	        <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
		  <tr>
			  <th>&nbsp;</th>
		      <th >Back</th>
			  <td><?php echo $rcekR['rabsor_f1'];?></td>
	        <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
		    <tr>
		      <th>Afterwash</th>
			  <th>Face</th>
		      <td><?php echo $rcekR['rabsor_b2'];?></td>
		      <!--<td><?php if($rcekR['stat_abs1']=="RANDOM"){echo $rcekR['rabsor_b3'];}else if($rcekR['stat_abs1']=="DISPOSISI"){echo $rcekD['dabsor_b3'];}else{echo $rcekR['absor_b3'];}?></td>-->
	        <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
		  <tr>
			  <th>&nbsp;</th>
		      <th >Back</th>
			  <td><?php echo $rcekR['rabsor_b1'];?></td>
	        <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
		    <?php } ?>
			<?php if($rcekR['rdry1']!="" or $rcekR['rdry2']!="" or $rcekR['rdry3']!="" or $rcekR['rdryaf1']!="" or $rcekR['rdryaf2']!="" or $rcekR['rdryaf3']!=""){?>  
		    <tr>
		      <th rowspan="2">Drying Time</th>
			  <th>Original</th>
		      <td><?php echo $rcekR['rdry1'];?></td>
		      <td><?php echo $rcekR['rdry2'];?></td>
		      <td><?php echo $rcekR['rdry3'];?></td>
	        <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
		  <tr>
		      <th>Afterwash</th>
		      <td><?php echo $rcekR['rdryaf1'];?></td>
		      <td><?php echo $rcekR['rdryaf2'];?></td>
		      <td><?php echo $rcekR['rdryaf3'];?></td>
	        <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
			<?php } ?>
			<?php if($rcekR['rrepp1']!="" or $rcekR['rrepp2']!="" or $rcekR['rrepp3']!="" or $rcekR['rrepp4']!=""){?> 
		    <tr>
		      <th colspan="2">Water Reppelent</th>
		      <td><?php echo $rcekR['rrepp1'];?></td>
		      <td><?php echo $rcekR['rrepp2'];?></td>
		      <td><?php echo $rcekR['rrepp3'];?></td>
		      <td><?php echo $rcekR['rrepp4'];?></td>
	        <td>&nbsp;</td>
          </tr>
			<?php } ?>
			<?php if($rcekR['rph']!=""){?>  
		    <tr>
		      <th colspan="2">Ph</th>
		      <td colspan="4"><?php echo $rcekR['rph'];?></td>
	        <td>&nbsp;</td>
          </tr>
			<?php } ?>
			<?php if($rcekR['rsoil']!=""){?>  
		    <tr>
		      <th colspan="2">Soil</th>
		      <td colspan="4"><?php echo $rcekR['rsoil'];?></td>
	        <td>&nbsp;</td>
          </tr>
			<?php } ?>
			<?php if($rcekR['rhumidity']!=""){?>  
		    <tr>
		      <th colspan="2">Humidity</th>
		      <td colspan="4"><?php echo $rcekR['rhumidity'];?></td>
	        <td>&nbsp;</td>
          	</tr>
			<?php } ?>  
	      </table>	
          <address>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
		  <strong>COLORFASTNESS</strong>
		  <hr>
		  <table class="table">
		  <?php if($rcekR['rwash_temp']!="" or $rcekR['rwash_colorchange']!="" or $rcekR['rwash_acetate']!="" or $rcekR['rwash_cotton']!="" or $rcekR['rwash_nylon']!="" or $rcekR['rwash_poly']!="" or $rcekR['rwash_acrylic']!="" or $rcekR['rwash_wool']!="" or $rcekR['rwash_staining']!=""){
      ?>	
      <tr>
		      <th rowspan="5">Washing</th>
			    <th>Suhu</th>
		      <td colspan="4"><?php echo $rcekR['rwash_temp'];?>&deg;</td>
          <td>&nbsp;</td>
      </tr>
      <tr>
			    <th>&nbsp;</th>
			    <td><strong>CC</strong></td>
		      <td colspan="2"><strong>Ace</strong></td>
			    <td><strong>Cot</strong></td>
		      <td colspan="2"><strong>Nyl</strong></td>
          <td>&nbsp;</td>
      </tr>
			<tr>
			    <th>&nbsp;</th>
			    <td><?php echo $rcekR['rwash_colorchange'];?></td>
		      	<td colspan="2"><?php echo $rcekR['rwash_acetate'];?></td>
			    <td><?php echo $rcekR['rwash_cotton'];?></td>
		      	<td colspan="2"><?php echo $rcekR['rwash_nylon'];?></td>
          <td>&nbsp;</td>
      </tr>
      <tr>
			    <th>&nbsp;</th>
			    <td><strong>Poly</strong></td>
		      	<td colspan="2"><strong>Acr</strong></td>
			    <td><strong>Wool</strong></td>
		      	<td colspan="2"><strong>Sta</strong></td>
          <td>&nbsp;</td>
      </tr>
			<tr>
			    <th>&nbsp;</th>
		      	<td><?php echo $rcekR['rwash_poly'];?></td>
		      	<td colspan="2"><?php echo $rcekR['rwash_acrylic'];?></td>
			    <td><?php echo $rcekR['rwash_wool'];?></td>
		      	<td colspan="2"><?php echo $rcekR['rwash_staining'];?></td>
          <td>&nbsp;</td>
          </tr>
			<?php } ?>
			<?php if($rcekR['racid_colorchange']!="" or $rcekR['racid_acetate']!="" or $rcekR['racid_cotton']!="" or $rcekR['racid_nylon']!="" or $rcekR['racid_poly']!="" or $rcekR['racid_acrylic']!="" or $rcekR['racid_wool']!="" or $rcekR['racid_staining']!=""){?>
			<tr>
			    <th rowspan="4" colspan="2">Perspiration Acid</th>
			    <td><strong>CC</strong></td>
		      	<td colspan="2"><strong>Ace</strong></td>
			    <td><strong>Cot</strong></td>
		      	<td colspan="2"><strong>Nyl</strong></td>
          <td>&nbsp;</td>
      </tr>
      <tr>
		      	<td ><?php echo $rcekR['racid_colorchange'];?></td>
		      	<td colspan="2"><?php echo $rcekR['racid_acetate'];?></td>
			    <td><?php echo $rcekR['racid_cotton'];?></td>
		      	<td colspan="2"><?php echo $rcekR['racid_nylon'];?></td>
          <td>&nbsp;</td>
      </tr>
	  <tr>
			    <td><strong>Poly</strong></td>
		      	<td colspan="2"><strong>Acr</strong></td>
			    <td><strong>Wool</strong></td>
				<td colspan="2"><strong>Sta</strong></td>
          <td>&nbsp;</td>
      </tr>
			<tr>
		      	<td><?php echo $rcekR['racid_poly'];?></td>
		      	<td colspan="2"><?php echo $rcekR['racid_acrylic'];?></td>
			    <td><?php echo $rcekR['racid_wool'];?></td>
				<td colspan="2"><?php echo $rcekR['racid_staining'];?></td>
          <td>&nbsp;</td>
		      <!--<td colspan="2"><?php echo $rcekR['acid_staining'];?></td>-->
	    </tr>
			<?php } ?>
			<?php if($rcekR['ralkaline_colorchange']!="" or $rcekR['ralkaline_acetate']!="" or $rcekR['ralkaline_cotton']!="" or $rcekR['ralkaline_nylon']!="" or $rcekR['ralkaline_poly']!="" or $rcekR['ralkaline_acrylic']!="" or $rcekR['ralkaline_wool']!="" or $rcekR['ralkaline_staining']!=""){?>
			<tr>
		      <th rowspan="4" colspan="2">Perspiration Alkaline</th>
          		<td><strong>CC</strong></td>
		      	<td colspan="2"><strong>Ace</strong></td>
			    <td><strong>Cot</strong></td>
		      	<td colspan="2"><strong>Nyl</strong></td>
			    <td>&nbsp;</td>
      </tr>
      <tr>
		      <td><?php echo $rcekR['ralkaline_colorchange'];?></td>
		      <td colspan="2"><?php echo $rcekR['ralkaline_acetate'];?></td>
			    <td><?php echo $rcekR['ralkaline_cotton'];?></td>
		      <td colspan="2"><?php echo $rcekR['ralkaline_nylon'];?></td>
          <td>&nbsp;</td>
      </tr>
      <tr>
			    <td><strong>Poly</strong></td>
		      <td colspan="2"><strong>Acr</strong></td>
			    <td><strong>Wool</strong></td>
				<td colspan="2"><strong>Sta</strong></td>
          <td>&nbsp;</td>
      </tr>
			<tr>
		      <td><?php echo $rcekR['ralkaline_poly'];?></td>
		      <td colspan="2"><?php echo $rcekR['ralkaline_acrylic'];?></td>
			    <td><?php echo $rcekR['ralkaline_wool'];?></td>
				<td colspan="2"><?php echo $rcekR['ralkaline_staining'];?></td>
          <td>&nbsp;</td>
		      <!--<td colspan="2"><?php echo $rcekR['alkaline_staining'];?></td>-->
	    </tr>
			<?php } ?>
			<?php if($rcekR['rwater_colorchange']!="" or $rcekR['rwater_acetate']!="" or $rcekR['rwater_cotton']!="" or $rcekR['rwater_nylon']!="" or $rcekR['rwater_poly']!="" or $rcekR['rwater_acrylic']!="" or $rcekR['rwater_wool']!="" or $rcekR['rwater_staining']!=""){?>
			<tr>
		      <th rowspan="4" colspan="2">Water</th>
          <td><strong>CC</strong></td>
		      <td colspan="2"><strong>Ace</strong></td>
			    <td><strong>Cot</strong></td>
		      <td colspan="2"><strong>Nyl</strong></td>
			    <td>&nbsp;</td>
      </tr>
      <tr>
		      <td><?php echo $rcekR['rwater_colorchange'];?></td>
		      <td colspan="2"><?php echo $rcekR['rwater_acetate'];?></td>
			    <td><?php echo $rcekR['rwater_cotton'];?></td>
		      <td colspan="2"><?php echo $rcekR['rwater_nylon'];?></td>
          <td>&nbsp;</td>
      </tr>
	  <tr>
			    <td><strong>Poly</strong></td>
		      <td colspan="2"><strong>Acr</strong></td>
			    <td><strong>Wool</strong></td>
				<td colspan="2"><strong>Sta</strong></td>
          <td>&nbsp;</td>
      </tr>
			<tr>
		      <td><?php echo $rcekR['rwater_poly'];?></td>
		      <td colspan="2"><?php echo $rcekR['rwater_acrylic'];?></td>
			    <td><?php echo $rcekR['rwater_wool'];?></td>
				<td colspan="2"><?php echo $rcekR['rwater_staining'];?></td>
          <td>&nbsp;</td>
		      <!--<td><?php echo $rcekR['water_staining'];?></td>-->
	    </tr>
			<?php } ?>
			<?php if($rcekR['rcrock_len1']!="" or $rcekR['rcrock_wid1']!="" or $rcekR['rcrock_len2']!="" or $rcekR['rcrock_wid2']!=""){
      ?>
		    <tr>
		      <th rowspan="3">Crocking</th>
          <th>Srt</th>
          <th>Dry</th>
          <th>Wet</th>
        </tr>
        <tr>
		      <th>Len</th>
		      <td><?php echo $rcekR['rcrock_len1'];?></td>
		      <td colspan="2"><?php echo $rcekR['rcrock_len2'];?></td>
	        </tr>
		    <tr>
		      <th >Wid</th>
		      <td><?php echo $rcekR['rcrock_wid1'];?></td>
		      <td colspan="3"><?php echo $rcekR['rcrock_wid2'];?></td>
	        </tr>
		    <?php } ?>
			<?php if($rcekR['rphenolic_colorchange']!=""){?>
		    <tr>
		      <th>Phenolic Yellowing</th>
			    <th><strong>CC</strong></th>
		      <td colspan="4"><?php echo $rcekR['rphenolic_colorchange'];?></td>
	        </tr>
		    <?php } ?>
			<?php if($rcekR['rlight_rating1']!="" or $rcekR['rlight_rating2']!=""){?>
		    <tr>
		      <th>Light</th>
			    <th>&nbsp;</th>
			    <td><?php echo $rcekR['rlight_rating1'];?></td>
		      <td colspan="2"><?php echo $rcekR['rlight_rating2'];?></td>
	        </tr>
		    <?php } ?>
			<?php if($rcekR['rcm_printing_colorchange']!="" or $rcekR['rcm_printing_staining']!=""){?>
		    <tr>
		      <th>Color Migration Oven</th>
			    <th>&nbsp;</th>
			    <td colspan="3"><?php echo $rcekR['rcm_printing_colorchange'];?></td>
		      <td><?php echo $rcekR['rcm_printing_staining'];?></td>
	      </tr>
		    <?php } ?>
			<?php if($rcekR['rcm_dye_temp']!="" or $rcekR['rcm_dye_colorchange']!="" or $rcekR['rcm_dye_stainingface']!="" or $rcekR['rcm_dye_stainingback']!=""){?>
			<tr>
		      <th rowspan="3">Color Migration</th>
			    <th>Suhu</th>
		      <td colspan="4"><?php echo $rcekR['rcm_dye_temp'];?>&deg;</td>
	    </tr>
      <tr>
          <th>&nbsp;</th>
          <td><strong>CC</strong></td>
          <td><strong>Sta</strong></td>
      </tr>
			<tr>
          <th>&nbsp;</th>
			    <td><?php echo $rcekR['rcm_dye_colorchange'];?></td>
		      <td colspan="4"><?php echo $rcekR['rcm_dye_stainingface'];?></td>
			  <!--<td><?php echo $rcekR['cm_dye_stainingback'];?></td>-->
			</tr>
			<?php } ?>
			<?php if($rcekR['rlight_pers_colorchange']!=""){?>
		    <tr>
		      <th>Light Perspiration</th>
			    <th><strong>CC</strong></th>
		      <td colspan="4"><?php echo $rcekR['rlight_pers_colorchange'];?></td>
	      </tr>
		    <?php } ?>
			<?php if($rcekR['rsaliva_staining']!=""){?>
		    <tr>
		      <th>Saliva</th>
			    <th>&nbsp;</th>
		      <td colspan="2"><?php echo $rcekR['rsaliva_staining'];?></td>
	      </tr>
		    <?php } ?>
			<?php if($rcekR['rbleeding']!=""){?>
		    <tr>
		      <th>Bleeding</th>
			  <th>&nbsp;</th>
		      <td colspan="2"><?php echo $rcekR['rbleeding'];?></td>
	      </tr>
		    <?php } ?>
			<?php if($rcekR['rchlorin']!="" or $rcekR['rnchlorin1']!="" or $rcekR['rnchlorin2']!=""){?>
			<tr>
				<th>Chlorin</th>
				<th>&nbsp;</th>
				<td colspan="2"><?php echo $rcekR['rchlorin'];?></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<th>Non-Chlorin</th>
				<th>&nbsp;</th>
				<td colspan="2"><?php echo $rcekR['rnchlorin1'];?></td>
				<td colspan="2"><?php echo $rcekR['rnchlorin2'];?></td>
			</tr>
			<?php } ?>
			<?php if($rcekR['rdye_tf_cstaining']!="" or $rcekR['rdye_tf_acetate']!="" or $rcekR['rdye_tf_cotton']!="" or $rcekR['rdye_tf_nylon']!="" or $rcekR['rdye_tf_poly']!="" or $rcekR['rdye_tf_acrylic']!="" or $rcekR['rdye_tf_wool']!="" or $rcekR['rdye_tf_sstaining']!=""){
      		?>	
      	<tr>
		    <th rowspan="4" colspan="2">Dye Transfer</th>
			<td><strong>Ace</strong></td>
		    <td colspan="2"><strong>Cot</strong></td>
			<td><strong>Nyl</strong></td>
		    <td colspan="2"><strong>Poly</strong></td>
			<td>&nbsp;</td>
      	</tr>
		<tr>
			<th>&nbsp;</th>
			<td><?php echo $rcekR['rdye_tf_acetate'];?></td>
		    <td colspan="2"><?php echo $rcekR['rdye_tf_cotton'];?></td>
			<td><?php echo $rcekR['rdye_tf_nylon'];?></td>
		    <td colspan="2"><?php echo $rcekR['rdye_tf_poly'];?></td>
          	<td>&nbsp;</td>
      	</tr>
      	<tr>
			<th>&nbsp;</th>
			<td><strong>Acr</strong></td>
		    <td colspan="2"><strong>Wool</strong></td>
			<td><strong>C.Sta</strong></td>
		    <td colspan="2"><strong>S.Sta</strong></td>
          	<td>&nbsp;</td>
      	</tr>
		<tr>
			<th>&nbsp;</th>
		    <td><?php echo $rcekR['rdye_tf_acrylic'];?></td>
		    <td colspan="2"><?php echo $rcekR['rdye_tf_wool'];?></td>
			<td><?php echo $rcekR['rdye_tf_cstaining'];?></td>
		    <td colspan="2"><?php echo $rcekR['rdye_tf_sstaining'];?></td>
          	<td>&nbsp;</td>
        </tr>
		<?php } ?>
		  </table>
		  <address>
            
          </address> 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
  <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
          <p class="lead">Note: </p>    
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <?php echo trim($rcekR['rnote_g']);?>
          </p>
        </div>  
        <!-- /.col -->
      </div>
      <!-- /.row --><!-- /.row -->

      <!-- this row will not appear when printing -->
  </div>
</section>						
       <?php } ?>
          
				  </div>
                </div>
            </div>
        </div>
<?php
if($_POST['physical_save']=="save" and $cekR>0 and $cekRW>0 and $cekTR>0 and $cekTR2>0){
	$sqlPHY=mysqli_query($con,"UPDATE tbl_tq_randomtest SET
		  `rflamability`='$_POST[rflamability]',
		  `rfla_note`='$_POST[rfla_note]',
		  `rfc_cott`='$_POST[rfc_cott]',
		  `rfc_poly`='$_POST[rfc_poly]',
		  `rfc_elastane`='$_POST[rfc_ela]',
		  `rfc_cott1`='$_POST[rfc_cott1]',
		  `rfc_poly1`='$_POST[rfc_poly1]',
		  `rfc_elastane1`='$_POST[rfc_ela1]',
		  `std_rfc_cott1`='$_POST[std_rfc_cott1]',
		  `std_rfc_poly1`='$_POST[std_rfc_poly1]',
		  `std_rfc_elastane1`='$_POST[std_rfc_elastane1]',
		  `rfibercontent`='$_POST[rfibercontent]',
		  `rfiber_note`='$_POST[rfiber_note]',
		  `rfc_wpi`='$_POST[rwpi]',
		  `rfc_cpi`='$_POST[rcpi]',
		  `rfc_note`='$_POST[rfc_note]',
		  `rf_weight`='$_POST[rfabric_weight]',
		  `rfwe_note`='$_POST[rfwe_note]',
		  `rf_width`='$_POST[rfabric_width]',
		  `rfwi_note`='$_POST[rfwi_note]',
		  `rbow`='$_POST[rbow]',
		  `rskew`='$_POST[rskew]',
		  `rbas_note`='$_POST[rbas_note]',
		  `rh_shrinkage_l1`='$_POST[rh_shrinkage_l1]',
		  `rh_shrinkage_w1`='$_POST[rh_shrinkage_w1]',
		  `rh_shrinkage_grd`='$_POST[rh_shrinkage_grd]',
		  `rh_shrinkage_note`='$_POST[rh_shrinkage_note]',
		  `rss_temp`='$_POST[rss_temp]',
		  `rss_washes3`='$_POST[rss_washes3]',
		  `rss_washes10`='$_POST[rss_washes10]',
		  `rss_washes15`='$_POST[rss_washes15]',
		  `rss_cmt`='$_POST[rss_cmt]',
		  `rshrinkage_l1`='$_POST[rshrinkage_len1]',
		  `rshrinkage_l2`='$_POST[rshrinkage_len2]',
		  `rshrinkage_l3`='$_POST[rshrinkage_len3]',
		  `rshrinkage_l4`='$_POST[rshrinkage_len4]',
		  `rshrinkage_l5`='$_POST[rshrinkage_len5]',
		  `rshrinkage_l6`='$_POST[rshrinkage_len6]',
		  `rshrinkage_w1`='$_POST[rshrinkage_wid1]',
		  `rshrinkage_w2`='$_POST[rshrinkage_wid2]',
		  `rshrinkage_w3`='$_POST[rshrinkage_wid3]',
		  `rshrinkage_w4`='$_POST[rshrinkage_wid4]',
		  `rshrinkage_w5`='$_POST[rshrinkage_wid5]',
		  `rshrinkage_w6`='$_POST[rshrinkage_wid6]',
		  `rspirality1`='$_POST[rspirality1]',
		  `rspirality2`='$_POST[rspirality2]',
		  `rspirality3`='$_POST[rspirality3]',
		  `rspirality4`='$_POST[rspirality4]',
		  `rspirality5`='$_POST[rspirality5]',
		  `rspirality6`='$_POST[rspirality6]',
		  `rss_linedry`='$_POST[rss_linedry]',
		  `rss_tumbledry`='$_POST[rss_tumbledry]',
		  `rsns_note`='$_POST[rsns_note]',
		  `rapperss_ch1`='$_POST[rapperss_ch1]',
		  `rapperss_ch2`='$_POST[rapperss_ch2]',
		  `rapperss_ch3`='$_POST[rapperss_ch3]',
		  `rapperss_ch4`='$_POST[rapperss_ch4]',
		  `rapperss_cc1`='$_POST[rapperss_cc1]',
		  `rapperss_cc2`='$_POST[rapperss_cc2]',
		  `rapperss_cc3`='$_POST[rapperss_cc3]',
		  `rapperss_cc4`='$_POST[rapperss_cc4]',
		  `rapperss_st`='$_POST[rapperss_st]',
		  `rapperss_pf1`='$_POST[rapperss_pf1]',
		  `rapperss_pf2`='$_POST[rapperss_pf2]',
		  `rapperss_pf3`='$_POST[rapperss_pf3]',
		  `rapperss_pf4`='$_POST[rapperss_pf4]',
		  `rapperss_pb1`='$_POST[rapperss_pb1]',
		  `rapperss_pb2`='$_POST[rapperss_pb2]',
		  `rapperss_pb3`='$_POST[rapperss_pb3]',
		  `rapperss_pb4`='$_POST[rapperss_pb4]',
		  `rapperss_sf1`='$_POST[rapperss_sf1]',
			`rapperss_sf2`='$_POST[rapperss_sf2]',
			`rapperss_sf3`='$_POST[rapperss_sf3]',
			`rapperss_sf4`='$_POST[rapperss_sf4]',
			`rapperss_sb1`='$_POST[rapperss_sb1]',
			`rapperss_sb2`='$_POST[rapperss_sb2]',
			`rapperss_sb3`='$_POST[rapperss_sb3]',
			`rapperss_sb4`='$_POST[rapperss_sb4]',
	 	  `rapperss_note`='$_POST[rapperss_note]',
		  `rpm_f1`='$_POST[rpillingm_f1]',
		  `rpm_b1`='$_POST[rpillingm_b1]',
		  `rpm_f2`='$_POST[rpillingm_f2]',
		  `rpm_b2`='$_POST[rpillingm_b2]',
		  `rpm_f3`='$_POST[rpillingm_f3]',
		  `rpm_b3`='$_POST[rpillingm_b3]',
		  `rpm_f4`='$_POST[rpillingm_f4]',
		  `rpm_b4`='$_POST[rpillingm_b4]',
		  `rpm_f5`='$_POST[rpillingm_f5]',
		  `rpm_b5`='$_POST[rpillingm_b5]',
		  `rpillm_note`='$_POST[rpillm_note]',
		  `rpl_f1`='$_POST[rpillingl_f1]',
		  `rpl_b1`='$_POST[rpillingl_b1]',
		  `rpl_f2`='$_POST[rpillingl_f2]',
		  `rpl_b2`='$_POST[rpillingl_b2]',
		  `rpl_f3`='$_POST[rpillingl_f3]',
		  `rpl_b3`='$_POST[rpillingl_b3]',
		  `rpl_f4`='$_POST[rpillingl_f4]',
		  `rpl_b4`='$_POST[rpillingl_b4]',
		  `rpl_f5`='$_POST[rpillingl_f5]',
		  `rpl_b5`='$_POST[rpillingl_b5]',
		  `rpilll_note`='$_POST[rpilll_note]',
		  `rpb_f1`='$_POST[rpillingb_f1]',
		  `rpb_b1`='$_POST[rpillingb_b1]',
		  `rpb_f2`='$_POST[rpillingb_f2]',
		  `rpb_b2`='$_POST[rpillingb_b2]',
		  `rpb_f3`='$_POST[rpillingb_f3]',
		  `rpb_b3`='$_POST[rpillingb_b3]',
		  `rpb_f4`='$_POST[rpillingb_f4]',
		  `rpb_b4`='$_POST[rpillingb_b4]',
		  `rpb_f5`='$_POST[rpillingb_f5]',
		  `rpb_b5`='$_POST[rpillingb_b5]',
		  `rpillb_note`='$_POST[rpillb_note]',
		  `rprt_f1`='$_POST[rpillingrt_f1]',
		  `rprt_b1`='$_POST[rpillingrt_b1]',
		  `rprt_f2`='$_POST[rpillingrt_f2]',
		  `rprt_b2`='$_POST[rpillingrt_b2]',
		  `rprt_f3`='$_POST[rpillingrt_f3]',
		  `rprt_b3`='$_POST[rpillingrt_b3]',
		  `rprt_f4`='$_POST[rpillingrt_f4]',
		  `rprt_b4`='$_POST[rpillingrt_b4]',
		  `rprt_f5`='$_POST[rpillingrt_f5]',
		  `rprt_b5`='$_POST[rpillingrt_b5]',
		  `rpillr_note`='$_POST[rpillr_note]',
		  `rabration`='$_POST[rabr]',
		  `rabr_note`='$_POST[rabr_note]',
		  `rsm_l1`='$_POST[rsnaggingm_l1]',
		  `rsm_w1`='$_POST[rsnaggingm_w1]',
		  `rsm_l2`='$_POST[rsnaggingm_l2]',
		  `rsm_w2`='$_POST[rsnaggingm_w2]',
		  `rsm_l3`='$_POST[rsnaggingm_l3]',
		  `rsm_w3`='$_POST[rsnaggingm_w3]',
		  `rsm_l4`='$_POST[rsnaggingm_l4]',
		  `rsm_w4`='$_POST[rsnaggingm_w4]',
		  `rsnam_note`='$_POST[rsnam_note]',
		  `rsp_grdl1` ='$_POST[rsp_grdl1]',
		  `rsp_clsl1` ='$_POST[rsp_clsl1]',
		  `rsp_shol1` ='$_POST[rsp_shol1]',
		  `rsp_medl1` ='$_POST[rsp_medl1]',
		  `rsp_lonl1` ='$_POST[rsp_lonl1]',
		  `rsp_grdw1` ='$_POST[rsp_grdw1]',
		  `rsp_clsw1` ='$_POST[rsp_clsw1]',
		  `rsp_show1` ='$_POST[rsp_show1]',
		  `rsp_medw1` ='$_POST[rsp_medw1]',
		  `rsp_lonw1` ='$_POST[rsp_lonw1]',
		  `rsp_grdl2` ='$_POST[rsp_grdl2]',
		  `rsp_clsl2` ='$_POST[rsp_clsl2]',
		  `rsp_shol2` ='$_POST[rsp_shol2]',
		  `rsp_medl2` ='$_POST[rsp_medl2]',
		  `rsp_lonl2` ='$_POST[rsp_lonl2]',
		  `rsp_grdw2` ='$_POST[rsp_grdw2]',
		  `rsp_clsw2` ='$_POST[rsp_clsw2]',
		  `rsp_show2` ='$_POST[rsp_show2]',
		  `rsp_medw2` ='$_POST[rsp_medw2]',
		  `rsp_lonw2` ='$_POST[rsp_lonw2]',
		  `rsnap_note`='$_POST[rsnap_note]',
		  `rsb_l1`='$_POST[rsnaggingb_l1]',
		  `rsb_w1`='$_POST[rsnaggingb_w1]',
		  `rsb_l2`='$_POST[rsnaggingb_l2]',
		  `rsb_w2`='$_POST[rsnaggingb_w2]',
		  `rsb_l3`='$_POST[rsnaggingb_l3]',
		  `rsb_w3`='$_POST[rsnaggingb_w3]',
		  `rsb_l4`='$_POST[rsnaggingb_l4]',
		  `rsb_w4`='$_POST[rsnaggingb_w4]',
		  `rsnab_note`='$_POST[rsnab_note]',
		  `rbs_instron`='$_POST[rinstron]',
		  `rbs_mullen`='$_POST[rmullen]',
		  `rbs_tru`='$_POST[rtru_burst]',
		  `rbs_tru2`='$_POST[rtru_burst2]',
		  `rburs_note`='$_POST[rburs_note]',
		  `rthick1`='$_POST[rthick1]',
		  `rthick2`='$_POST[rthick2]',
		  `rthick3`='$_POST[rthick3]',
		  `rthickav`='$_POST[rthickav]',
		  `rthick_note`='$_POST[rthick_note]',
		  `rstretch_l1`='$_POST[rstretch_l1]',
		  `rstretch_w1`='$_POST[rstretch_w1]',
		  `rstretch_l2`='$_POST[rstretch_l2]',
		  `rstretch_w2`='$_POST[rstretch_w2]',
		  `rstretch_l3`='$_POST[rstretch_l3]',
		  `rstretch_w3`='$_POST[rstretch_w3]',
		  `rstretch_l4`='$_POST[rstretch_l4]',
		  `rstretch_w4`='$_POST[rstretch_w4]',
		  `rstretch_l5`='$_POST[rstretch_l5]',
		  `rstretch_w5`='$_POST[rstretch_w5]',
		  `rload_stretch`='$_POST[rload_stretch]',
		  `rstretch_note`='$_POST[rstretch_note]',
		  `rrecover_l1`='$_POST[rrecover_l1]',
		  `rrecover_w1`='$_POST[rrecover_w1]',
		  `rrecover_l2`='$_POST[rrecover_l2]',
		  `rrecover_w2`='$_POST[rrecover_w2]',
		  `rrecover_l3`='$_POST[rrecover_l3]',
		  `rrecover_w3`='$_POST[rrecover_w3]',
		  `rrecover_l4`='$_POST[rrecover_l4]',
		  `rrecover_w4`='$_POST[rrecover_w4]',
		  `rrecover_l5`='$_POST[rrecover_l5]',
		  `rrecover_w5`='$_POST[rrecover_w5]',
		  `rrecover_note`='$_POST[rrecover_note]',
		  `rgrowth_l1`='$_POST[rgrowth_l1]',
		  `rgrowth_w1`='$_POST[rgrowth_w1]',
		  `rgrowth_l2`='$_POST[rgrowth_l2]',
		  `rgrowth_w2`='$_POST[rgrowth_w2]',
		  `rrec_growth_l1`='$_POST[rrec_growth_l1]',
		  `rrec_growth_w1`='$_POST[rrec_growth_w1]',
		  `rrec_growth_l2`='$_POST[rrec_growth_l2]',
		  `rrec_growth_w2`='$_POST[rrec_growth_w2]',
		  `rgrowth_note`='$_POST[rgrowth_note]',
		  `rapper_ch1`='$_POST[rapper_ch1]',
		  `rapper_ch2`='$_POST[rapper_ch2]',
		  `rapper_ch3`='$_POST[rapper_ch3]',
		  `rapper_cc1`='$_POST[rapper_cc1]',
		  `rapper_cc2`='$_POST[rapper_cc2]',
		  `rapper_cc3`='$_POST[rapper_cc3]',
		  `rapper_st`='$_POST[rapper_st]',
		  `rapper_st2`='$_POST[rapper_st2]',
		  `rapper_st3`='$_POST[rapper_st3]',
		  `rapper_pf1`='$_POST[rapper_pf1]',
		  `rapper_pf2`='$_POST[rapper_pf2]',
		  `rapper_pf3`='$_POST[rapper_pf3]',
		  `rapper_pb1`='$_POST[rapper_pb1]',
		  `rapper_pb2`='$_POST[rapper_pb2]',
		  `rapper_pb3`='$_POST[rapper_pb3]',
		  `rapper_acetate`='$_POST[rapper_acetate]',
		  `rapper_cotton`='$_POST[rapper_cotton]',
		  `rapper_nylon`='$_POST[rapper_nylon]',
		  `rapper_poly`='$_POST[rapper_poly]',
		  `rapper_acrylic`='$_POST[rapper_acrylic]',
		  `rapper_wool`='$_POST[rapper_wool]',
	 	  `rapper_note`='$_POST[rapper_note]',
		  `rfibre_transfer`='$_POST[rfibre_transfer]',
		  `rfibre_grade`='$_POST[rfibre_grade]',
		  `rfibre_note`='$_POST[rfibre_note]',
		  `rodour`='$_POST[rodour]',
		  `rodour_note`='$_POST[rodour_note]',
		  `rcurling`='$_POST[rcurling]',
		  `rcurling_note`='$_POST[rcurling_note]',
		  `rnedle`='$_POST[rnedle]',
		  `rnedle_note`='$_POST[rnedle_note]',
		  `tgl_update`=now()
		  WHERE no_hanger='$nohanger'");
	 if($sqlPHY){
		$sql_PHYWarna=mysqli_query($con,"UPDATE tbl_tq_random_warna SET
			`rflamabilityw`='$_POST[rflamabilityw]',
			`rfc_cott1w`='$_POST[rfc_cott1w]',
			`rfc_poly1w`='$_POST[rfc_poly1w]',
			`rfc_ela1w`='$_POST[rfc_ela1w]',
			`rwpiw`='$_POST[rwpiw]',
			`rcpiw`='$_POST[rcpiw]',
			`rf_weightw`='$_POST[rf_weightw]',
			`rf_widthw`='$_POST[rf_widthw]',
			`rboww`='$_POST[rboww]',
			`rskeww`='$_POST[rskeww]',
			`rssw`='$_POST[rssw]',
			`rapperssw`='$_POST[rapperssw]',
			`rpmw`='$_POST[rpmw]',
			`rplw`='$_POST[rplw]',
			`rpbw`='$_POST[rpbw]',
			`rprtw`='$_POST[rprtw]',
			`rsmw`='$_POST[rsmw]',
			`rspw`='$_POST[rspw]',
			`rsbw`='$_POST[rsbw]',
			`rbsw`='$_POST[rbsw]',
			`rthickw`='$_POST[rthickw]',
			`rstretchw`='$_POST[rstretchw]',
			`rrecoverw`='$_POST[rrecoverw]',
			`rgrowthw`='$_POST[rgrowthw]',
			`rrec_growthw`='$_POST[rrec_growthw]',
			`rapperw`='$_POST[rapperw]',
			`rh_shrinkagew`='$_POST[rh_shrinkagew]',
			`rfibrew`='$_POST[rfibrew]',
			`rodourw`='$_POST[rodourw]',
			`rcurlingw`='$_POST[rcurlingw]',
			`rnedlew`='$_POST[rnedlew]',
			`tgl_update`=now()
			WHERE no_hanger='$nohanger'");
		if($_POST['sts_random']=="2"){
			$sql_tempPHY=mysqli_query($con,"UPDATE tbl_tq_temp_random SET
			`temp_rprt_f1`='$_POST[rpillingrt_f1]',
			`temp_rprt_b1`='$_POST[rpillingrt_b1]',
			`temp_rpb_f1`='$_POST[rpillingb_f1]',
			`temp_rsp_grdl1`='$_POST[rsp_grdl1]',
			`temp_rsp_clsl1`='$_POST[rsp_clsl1]',
			`temp_rsp_shol1`='$_POST[rsp_shol1]',
			`temp_rsp_medl1`='$_POST[rsp_medl1]',
			`temp_rsp_lonl1`='$_POST[rsp_lonl1]',
			`temp_rsp_grdw1`='$_POST[rsp_grdw1]',
			`temp_rsp_clsw1`='$_POST[rsp_clsw1]',
			`temp_rsp_show1`='$_POST[rsp_show1]',
			`temp_rsp_medw1`='$_POST[rsp_medw1]',
			`temp_rsp_lonw1`='$_POST[rsp_lonw1]',
			`temp_rsp_grdl2`='$_POST[rsp_grdl2]',
			`temp_rsp_grdw2`='$_POST[rsp_grdw2]',
			`temp_rsm_l1`='$_POST[rsnaggingm_l1]',
			`temp_rsm_w1`='$_POST[rsnaggingm_w1]',
			`temp_rbs_instron`='$_POST[rinstron]',
			`temp_rbs_tru`='$_POST[rtru_burst]',
			`temp_rbs_mullen`='$_POST[rmullen]',
			`temp_rpm_f1`='$_POST[rpillingm_f1]',
			`temp_rpm_f2`='$_POST[rpillingm_f2]',
			`temp_rstretch_l1`='$_POST[rstretch_l1]',
			`temp_rstretch_w1`='$_POST[rstretch_w1]',
			`temp_rrecover_l1`='$_POST[rrecover_l1]',
			`temp_rrecover_w1`='$_POST[rrecover_w1]',
			`temp_rwick_l2`='$_POST[rwick_l2]',
			`temp_rwick_w2`='$_POST[rwick_w2]',
			`temp_rabsor_b1`='$_POST[rabsor_b1]',
			`temp_rdryaf1`='$_POST[rdryaf1]',
			`sts`='1'
			WHERE no_hanger='$nohanger'");

			$sql_tempPHY1=mysqli_query($con,"UPDATE tbl_tq_temp_random2 SET
			`sts`='2'
			WHERE no_hanger='$nohanger'");
		 }else if($_POST['sts_random2']=="2"){
			$sql_tempPHY=mysqli_query($con,"UPDATE tbl_tq_temp_random2 SET
			`temp_rprt_f1`='$_POST[rpillingrt_f1]',
			`temp_rprt_b1`='$_POST[rpillingrt_b1]',
			`temp_rpb_f1`='$_POST[rpillingb_f1]',
			`temp_rsp_grdl1`='$_POST[rsp_grdl1]',
			`temp_rsp_clsl1`='$_POST[rsp_clsl1]',
			`temp_rsp_shol1`='$_POST[rsp_shol1]',
			`temp_rsp_medl1`='$_POST[rsp_medl1]',
			`temp_rsp_lonl1`='$_POST[rsp_lonl1]',
			`temp_rsp_grdw1`='$_POST[rsp_grdw1]',
			`temp_rsp_clsw1`='$_POST[rsp_clsw1]',
			`temp_rsp_show1`='$_POST[rsp_show1]',
			`temp_rsp_medw1`='$_POST[rsp_medw1]',
			`temp_rsp_lonw1`='$_POST[rsp_lonw1]',
			`temp_rsp_grdl2`='$_POST[rsp_grdl2]',
			`temp_rsp_grdw2`='$_POST[rsp_grdw2]',
			`temp_rsm_l1`='$_POST[rsnaggingm_l1]',
			`temp_rsm_w1`='$_POST[rsnaggingm_w1]',
			`temp_rbs_instron`='$_POST[rinstron]',
			`temp_rbs_tru`='$_POST[rtru_burst]',
			`temp_rbs_mullen`='$_POST[rmullen]',
			`temp_rpm_f1`='$_POST[rpillingm_f1]',
			`temp_rpm_f2`='$_POST[rpillingm_f2]',
			`temp_rstretch_l1`='$_POST[rstretch_l1]',
			`temp_rstretch_w1`='$_POST[rstretch_w1]',
			`temp_rrecover_l1`='$_POST[rrecover_l1]',
			`temp_rrecover_w1`='$_POST[rrecover_w1]',
			`temp_rwick_l2`='$_POST[rwick_l2]',
			`temp_rwick_w2`='$_POST[rwick_w2]',
			`temp_rabsor_b1`='$_POST[rabsor_b1]',
			`temp_rdryaf1`='$_POST[rdryaf1]',
			`sts`='1'
			WHERE no_hanger='$nohanger'");

			$sql_tempPHY1=mysqli_query($con,"UPDATE tbl_tq_temp_random SET
			`sts`='2'
			WHERE no_hanger='$nohanger'");
		 }
		 echo "<script>swal({
  title: 'Data Physical Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='RandomhNew-$nohanger'; 
  }
});</script>";
	 }
	}elseif($_POST['physical_save']=="save" and $cekR>0 and $cekTR>0 and $cekTR2>0 and $cekRW==0){
		$sqlPHY=mysqli_query($con,"UPDATE tbl_tq_randomtest SET
			  `rflamability`='$_POST[rflamability]',
			  `rfla_note`='$_POST[rfla_note]',
			  `rfc_cott`='$_POST[rfc_cott]',
			  `rfc_poly`='$_POST[rfc_poly]',
			  `rfc_elastane`='$_POST[rfc_ela]',
			  `rfc_cott1`='$_POST[rfc_cott1]',
			  `rfc_poly1`='$_POST[rfc_poly1]',
			  `rfc_elastane1`='$_POST[rfc_ela1]',
			  `std_rfc_cott1`='$_POST[std_rfc_cott1]',
		  	  `std_rfc_poly1`='$_POST[std_rfc_poly1]',
		  	  `std_rfc_elastane1`='$_POST[std_rfc_elastane1]',
			  `rfibercontent`='$_POST[rfibercontent]',
			  `rfiber_note`='$_POST[rfiber_note]',
			  `rfc_wpi`='$_POST[rwpi]',
			  `rfc_cpi`='$_POST[rcpi]',
			  `rfc_note`='$_POST[rfc_note]',
			  `rf_weight`='$_POST[rfabric_weight]',
			  `rfwe_note`='$_POST[rfwe_note]',
			  `rf_width`='$_POST[rfabric_width]',
			  `rfwi_note`='$_POST[rfwi_note]',
			  `rbow`='$_POST[rbow]',
			  `rskew`='$_POST[rskew]',
			  `rbas_note`='$_POST[rbas_note]',
			  `rh_shrinkage_l1`='$_POST[rh_shrinkage_l1]',
			  `rh_shrinkage_w1`='$_POST[rh_shrinkage_w1]',
			  `rh_shrinkage_grd`='$_POST[rh_shrinkage_grd]',
			  `rh_shrinkage_note`='$_POST[rh_shrinkage_note]',
			  `rss_temp`='$_POST[rss_temp]',
			  `rss_washes3`='$_POST[rss_washes3]',
		  `rss_washes10`='$_POST[rss_washes10]',
		  `rss_washes15`='$_POST[rss_washes15]',
				`rss_cmt`='$_POST[rss_cmt]',
			  `rshrinkage_l1`='$_POST[rshrinkage_len1]',
			  `rshrinkage_l2`='$_POST[rshrinkage_len2]',
			  `rshrinkage_l3`='$_POST[rshrinkage_len3]',
			  `rshrinkage_l4`='$_POST[rshrinkage_len4]',
			  `rshrinkage_l5`='$_POST[rshrinkage_len5]',
			  `rshrinkage_l6`='$_POST[rshrinkage_len6]',
			  `rshrinkage_w1`='$_POST[rshrinkage_wid1]',
			  `rshrinkage_w2`='$_POST[rshrinkage_wid2]',
			  `rshrinkage_w3`='$_POST[rshrinkage_wid3]',
			  `rshrinkage_w4`='$_POST[rshrinkage_wid4]',
			  `rshrinkage_w5`='$_POST[rshrinkage_wid5]',
			  `rshrinkage_w6`='$_POST[rshrinkage_wid6]',
			  `rspirality1`='$_POST[rspirality1]',
			  `rspirality2`='$_POST[rspirality2]',
			  `rspirality3`='$_POST[rspirality3]',
			  `rspirality4`='$_POST[rspirality4]',
			  `rspirality5`='$_POST[rspirality5]',
			  `rspirality6`='$_POST[rspirality6]',
			  `rss_linedry`='$_POST[rss_linedry]',
		  	  `rss_tumbledry`='$_POST[rss_tumbledry]',
			  `rsns_note`='$_POST[rsns_note]',
			  `rapperss_ch1`='$_POST[rapperss_ch1]',
				`rapperss_ch2`='$_POST[rapperss_ch2]',
				`rapperss_ch3`='$_POST[rapperss_ch3]',
				`rapperss_ch4`='$_POST[rapperss_ch4]',
				`rapperss_cc1`='$_POST[rapperss_cc1]',
				`rapperss_cc2`='$_POST[rapperss_cc2]',
				`rapperss_cc3`='$_POST[rapperss_cc3]',
				`rapperss_cc4`='$_POST[rapperss_cc4]',
				`rapperss_st`='$_POST[rapperss_st]',
				`rapperss_pf1`='$_POST[rapperss_pf1]',
				`rapperss_pf2`='$_POST[rapperss_pf2]',
				`rapperss_pf3`='$_POST[rapperss_pf3]',
				`rapperss_pf4`='$_POST[rapperss_pf4]',
				`rapperss_pb1`='$_POST[rapperss_pb1]',
				`rapperss_pb2`='$_POST[rapperss_pb2]',
				`rapperss_pb3`='$_POST[rapperss_pb3]',
				`rapperss_pb4`='$_POST[rapperss_pb4]',
				`rapperss_sf1`='$_POST[rapperss_sf1]',
				`rapperss_sf2`='$_POST[rapperss_sf2]',
				`rapperss_sf3`='$_POST[rapperss_sf3]',
				`rapperss_sf4`='$_POST[rapperss_sf4]',
				`rapperss_sb1`='$_POST[rapperss_sb1]',
				`rapperss_sb2`='$_POST[rapperss_sb2]',
				`rapperss_sb3`='$_POST[rapperss_sb3]',
				`rapperss_sb4`='$_POST[rapperss_sb4]',
				`rapperss_note`='$_POST[rapperss_note]',
			  `rpm_f1`='$_POST[rpillingm_f1]',
			  `rpm_b1`='$_POST[rpillingm_b1]',
			  `rpm_f2`='$_POST[rpillingm_f2]',
			  `rpm_b2`='$_POST[rpillingm_b2]',
			  `rpm_f3`='$_POST[rpillingm_f3]',
			  `rpm_b3`='$_POST[rpillingm_b3]',
			  `rpm_f4`='$_POST[rpillingm_f4]',
			  `rpm_b4`='$_POST[rpillingm_b4]',
			  `rpm_f5`='$_POST[rpillingm_f5]',
			  `rpm_b5`='$_POST[rpillingm_b5]',
			  `rpillm_note`='$_POST[rpillm_note]',
			  `rpl_f1`='$_POST[rpillingl_f1]',
			  `rpl_b1`='$_POST[rpillingl_b1]',
			  `rpl_f2`='$_POST[rpillingl_f2]',
			  `rpl_b2`='$_POST[rpillingl_b2]',
			  `rpl_f3`='$_POST[rpillingl_f3]',
			  `rpl_b3`='$_POST[rpillingl_b3]',
			  `rpl_f4`='$_POST[rpillingl_f4]',
			  `rpl_b4`='$_POST[rpillingl_b4]',
			  `rpl_f5`='$_POST[rpillingl_f5]',
			  `rpl_b5`='$_POST[rpillingl_b5]',
			  `rpilll_note`='$_POST[rpilll_note]',
			  `rpb_f1`='$_POST[rpillingb_f1]',
			  `rpb_b1`='$_POST[rpillingb_b1]',
			  `rpb_f2`='$_POST[rpillingb_f2]',
			  `rpb_b2`='$_POST[rpillingb_b2]',
			  `rpb_f3`='$_POST[rpillingb_f3]',
			  `rpb_b3`='$_POST[rpillingb_b3]',
			  `rpb_f4`='$_POST[rpillingb_f4]',
			  `rpb_b4`='$_POST[rpillingb_b4]',
			  `rpb_f5`='$_POST[rpillingb_f5]',
			  `rpb_b5`='$_POST[rpillingb_b5]',
			  `rpillb_note`='$_POST[rpillb_note]',
			  `rprt_f1`='$_POST[rpillingrt_f1]',
			  `rprt_b1`='$_POST[rpillingrt_b1]',
			  `rprt_f2`='$_POST[rpillingrt_f2]',
			  `rprt_b2`='$_POST[rpillingrt_b2]',
			  `rprt_f3`='$_POST[rpillingrt_f3]',
			  `rprt_b3`='$_POST[rpillingrt_b3]',
			  `rprt_f4`='$_POST[rpillingrt_f4]',
			  `rprt_b4`='$_POST[rpillingrt_b4]',
			  `rprt_f5`='$_POST[rpillingrt_f5]',
			  `rprt_b5`='$_POST[rpillingrt_b5]',
			  `rpillr_note`='$_POST[rpillr_note]',
			  `rabration`='$_POST[rabr]',
			  `rabr_note`='$_POST[rabr_note]',
			  `rsm_l1`='$_POST[rsnaggingm_l1]',
			  `rsm_w1`='$_POST[rsnaggingm_w1]',
			  `rsm_l2`='$_POST[rsnaggingm_l2]',
			  `rsm_w2`='$_POST[rsnaggingm_w2]',
			  `rsm_l3`='$_POST[rsnaggingm_l3]',
			  `rsm_w3`='$_POST[rsnaggingm_w3]',
			  `rsm_l4`='$_POST[rsnaggingm_l4]',
			  `rsm_w4`='$_POST[rsnaggingm_w4]',
			  `rsnam_note`='$_POST[rsnam_note]',
			  `rsp_grdl1` ='$_POST[rsp_grdl1]',
			  `rsp_clsl1` ='$_POST[rsp_clsl1]',
			  `rsp_shol1` ='$_POST[rsp_shol1]',
			  `rsp_medl1` ='$_POST[rsp_medl1]',
			  `rsp_lonl1` ='$_POST[rsp_lonl1]',
			  `rsp_grdw1` ='$_POST[rsp_grdw1]',
			  `rsp_clsw1` ='$_POST[rsp_clsw1]',
			  `rsp_show1` ='$_POST[rsp_show1]',
			  `rsp_medw1` ='$_POST[rsp_medw1]',
			  `rsp_lonw1` ='$_POST[rsp_lonw1]',
			  `rsp_grdl2` ='$_POST[rsp_grdl2]',
			  `rsp_clsl2` ='$_POST[rsp_clsl2]',
			  `rsp_shol2` ='$_POST[rsp_shol2]',
			  `rsp_medl2` ='$_POST[rsp_medl2]',
			  `rsp_lonl2` ='$_POST[rsp_lonl2]',
			  `rsp_grdw2` ='$_POST[rsp_grdw2]',
			  `rsp_clsw2` ='$_POST[rsp_clsw2]',
			  `rsp_show2` ='$_POST[rsp_show2]',
			  `rsp_medw2` ='$_POST[rsp_medw2]',
			  `rsp_lonw2` ='$_POST[rsp_lonw2]',
			  `rsnap_note`='$_POST[rsnap_note]',
			  `rsb_l1`='$_POST[rsnaggingb_l1]',
			  `rsb_w1`='$_POST[rsnaggingb_w1]',
			  `rsb_l2`='$_POST[rsnaggingb_l2]',
			  `rsb_w2`='$_POST[rsnaggingb_w2]',
			  `rsb_l3`='$_POST[rsnaggingb_l3]',
			  `rsb_w3`='$_POST[rsnaggingb_w3]',
			  `rsb_l4`='$_POST[rsnaggingb_l4]',
			  `rsb_w4`='$_POST[rsnaggingb_w4]',
			  `rsnab_note`='$_POST[rsnab_note]',
			  `rbs_instron`='$_POST[rinstron]',
			  `rbs_mullen`='$_POST[rmullen]',
			  `rbs_tru`='$_POST[rtru_burst]',
			  `rbs_tru2`='$_POST[rtru_burst2]',
			  `rburs_note`='$_POST[rburs_note]',
			  `rthick1`='$_POST[rthick1]',
			  `rthick2`='$_POST[rthick2]',
			  `rthick3`='$_POST[rthick3]',
			  `rthickav`='$_POST[rthickav]',
			  `rthick_note`='$_POST[rthick_note]',
			  `rstretch_l1`='$_POST[rstretch_l1]',
			  `rstretch_w1`='$_POST[rstretch_w1]',
			  `rstretch_l2`='$_POST[rstretch_l2]',
			  `rstretch_w2`='$_POST[rstretch_w2]',
			  `rstretch_l3`='$_POST[rstretch_l3]',
			  `rstretch_w3`='$_POST[rstretch_w3]',
			  `rstretch_l4`='$_POST[rstretch_l4]',
			  `rstretch_w4`='$_POST[rstretch_w4]',
			  `rstretch_l5`='$_POST[rstretch_l5]',
			  `rstretch_w5`='$_POST[rstretch_w5]',
			  `rload_stretch`='$_POST[rload_stretch]',
			  `rstretch_note`='$_POST[rstretch_note]',
			  `rrecover_l1`='$_POST[rrecover_l1]',
			  `rrecover_w1`='$_POST[rrecover_w1]',
			  `rrecover_l2`='$_POST[rrecover_l2]',
			  `rrecover_w2`='$_POST[rrecover_w2]',
			  `rrecover_l3`='$_POST[rrecover_l3]',
			  `rrecover_w3`='$_POST[rrecover_w3]',
			  `rrecover_l4`='$_POST[rrecover_l4]',
			  `rrecover_w4`='$_POST[rrecover_w4]',
			  `rrecover_l5`='$_POST[rrecover_l5]',
			  `rrecover_w5`='$_POST[rrecover_w5]',
			  `rrecover_note`='$_POST[rrecover_note]',
			  `rgrowth_l1`='$_POST[rgrowth_l1]',
			  `rgrowth_w1`='$_POST[rgrowth_w1]',
			  `rgrowth_l2`='$_POST[rgrowth_l2]',
			  `rgrowth_w2`='$_POST[rgrowth_w2]',
			  `rrec_growth_l1`='$_POST[rrec_growth_l1]',
			  `rrec_growth_w1`='$_POST[rrec_growth_w1]',
			  `rrec_growth_l2`='$_POST[rrec_growth_l2]',
			  `rrec_growth_w2`='$_POST[rrec_growth_w2]',
			  `rgrowth_note`='$_POST[rgrowth_note]',
			  `rapper_ch1`='$_POST[rapper_ch1]',
			  `rapper_ch2`='$_POST[rapper_ch2]',
			  `rapper_ch3`='$_POST[rapper_ch3]',
			  `rapper_cc1`='$_POST[rapper_cc1]',
			  `rapper_cc2`='$_POST[rapper_cc2]',
			  `rapper_cc3`='$_POST[rapper_cc3]',
			  `rapper_st`='$_POST[rapper_st]',
			  `rapper_st2`='$_POST[rapper_st2]',
			  `rapper_st3`='$_POST[rapper_st3]',
			  `rapper_pf1`='$_POST[rapper_pf1]',
			  `rapper_pf2`='$_POST[rapper_pf2]',
			  `rapper_pf3`='$_POST[rapper_pf3]',
			  `rapper_pb1`='$_POST[rapper_pb1]',
			  `rapper_pb2`='$_POST[rapper_pb2]',
			  `rapper_pb3`='$_POST[rapper_pb3]',
			  `rapper_acetate`='$_POST[rapper_acetate]',
			  `rapper_cotton`='$_POST[rapper_cotton]',
			  `rapper_nylon`='$_POST[rapper_nylon]',
			  `rapper_poly`='$_POST[rapper_poly]',
			  `rapper_acrylic`='$_POST[rapper_acrylic]',
			  `rapper_wool`='$_POST[rapper_wool]',
			   `rapper_note`='$_POST[rapper_note]',
			  `rfibre_transfer`='$_POST[rfibre_transfer]',
			  `rfibre_grade`='$_POST[rfibre_grade]',
			  `rfibre_note`='$_POST[rfibre_note]',
			  `rodour`='$_POST[rodour]',
			  `rodour_note`='$_POST[rodour_note]',
			  `rcurling`='$_POST[rcurling]',
		  	  `rcurling_note`='$_POST[rcurling_note]',
			  `rnedle`='$_POST[rnedle]',
		  	  `rnedle_note`='$_POST[rnedle_note]',
			  `tgl_update`=now()
			  WHERE no_hanger='$nohanger'");
		 if($sqlPHY){
			$sql_PHYWarna=mysqli_query($con,"INSERT INTO tbl_tq_random_warna SET
				`no_item`='$rcek2[no_item]',
				`no_hanger`='$_GET[no_hanger]',
				`rflamabilityw`='$_POST[rflamabilityw]',
				`rfc_cott1w`='$_POST[rfc_cott1w]',
				`rfc_poly1w`='$_POST[rfc_poly1w]',
				`rfc_ela1w`='$_POST[rfc_ela1w]',
				`rwpiw`='$_POST[rwpiw]',
				`rcpiw`='$_POST[rcpiw]',
				`rf_weightw`='$_POST[rf_weightw]',
				`rf_widthw`='$_POST[rf_widthw]',
				`rboww`='$_POST[rboww]',
				`rskeww`='$_POST[rskeww]',
				`rssw`='$_POST[rssw]',
				`rapperssw`='$_POST[rapperssw]',
				`rpmw`='$_POST[rpmw]',
				`rplw`='$_POST[rplw]',
				`rpbw`='$_POST[rpbw]',
				`rprtw`='$_POST[rprtw]',
				`rsmw`='$_POST[rsmw]',
				`rspw`='$_POST[rspw]',
				`rsbw`='$_POST[rsbw]',
				`rbsw`='$_POST[rbsw]',
				`rthickw`='$_POST[rthickw]',
				`rstretchw`='$_POST[rstretchw]',
				`rrecoverw`='$_POST[rrecoverw]',
				`rgrowthw`='$_POST[rgrowthw]',
				`rrec_growthw`='$_POST[rrec_growthw]',
				`rapperw`='$_POST[rapperw]',
				`rh_shrinkagew`='$_POST[rh_shrinkagew]',
				`rfibrew`='$_POST[rfibrew]',
				`rodourw`='$_POST[rodourw]',
				`rcurlingw`='$_POST[rcurlingw]',
				`rnedlew`='$_POST[rnedlew]',
				`tgl_buat`=now(),
				`tgl_update`=now()
				");
			if($_POST['sts_random']=="2"){
				$sql_tempPHY=mysqli_query($con,"UPDATE tbl_tq_temp_random SET
				`temp_rprt_f1`='$_POST[rpillingrt_f1]',
				`temp_rprt_b1`='$_POST[rpillingrt_b1]',
				`temp_rpb_f1`='$_POST[rpillingb_f1]',
				`temp_rsp_grdl1`='$_POST[rsp_grdl1]',
				`temp_rsp_clsl1`='$_POST[rsp_clsl1]',
				`temp_rsp_shol1`='$_POST[rsp_shol1]',
				`temp_rsp_medl1`='$_POST[rsp_medl1]',
				`temp_rsp_lonl1`='$_POST[rsp_lonl1]',
				`temp_rsp_grdw1`='$_POST[rsp_grdw1]',
				`temp_rsp_clsw1`='$_POST[rsp_clsw1]',
				`temp_rsp_show1`='$_POST[rsp_show1]',
				`temp_rsp_medw1`='$_POST[rsp_medw1]',
				`temp_rsp_lonw1`='$_POST[rsp_lonw1]',
				`temp_rsp_grdl2`='$_POST[rsp_grdl2]',
				`temp_rsp_grdw2`='$_POST[rsp_grdw2]',
				`temp_rsm_l1`='$_POST[rsnaggingm_l1]',
				`temp_rsm_w1`='$_POST[rsnaggingm_w1]',
				`temp_rbs_instron`='$_POST[rinstron]',
				`temp_rbs_tru`='$_POST[rtru_burst]',
				`temp_rbs_mullen`='$_POST[rmullen]',
				`temp_rpm_f1`='$_POST[rpillingm_f1]',
				`temp_rpm_f2`='$_POST[rpillingm_f2]',
				`temp_rstretch_l1`='$_POST[rstretch_l1]',
				`temp_rstretch_w1`='$_POST[rstretch_w1]',
				`temp_rrecover_l1`='$_POST[rrecover_l1]',
				`temp_rrecover_w1`='$_POST[rrecover_w1]',
				`temp_rwick_l2`='$_POST[rwick_l2]',
				`temp_rwick_w2`='$_POST[rwick_w2]',
				`temp_rabsor_b1`='$_POST[rabsor_b1]',
				`temp_rdryaf1`='$_POST[rdryaf1]',
				`sts`='1'
				WHERE no_hanger='$nohanger'");
	
				$sql_tempPHY1=mysqli_query($con,"UPDATE tbl_tq_temp_random2 SET
				`sts`='2'
				WHERE no_hanger='$nohanger'");
			 }else if($_POST['sts_random2']=="2"){
				$sql_tempPHY=mysqli_query($con,"UPDATE tbl_tq_temp_random2 SET
				`temp_rprt_f1`='$_POST[rpillingrt_f1]',
				`temp_rprt_b1`='$_POST[rpillingrt_b1]',
				`temp_rpb_f1`='$_POST[rpillingb_f1]',
				`temp_rsp_grdl1`='$_POST[rsp_grdl1]',
				`temp_rsp_clsl1`='$_POST[rsp_clsl1]',
				`temp_rsp_shol1`='$_POST[rsp_shol1]',
				`temp_rsp_medl1`='$_POST[rsp_medl1]',
				`temp_rsp_lonl1`='$_POST[rsp_lonl1]',
				`temp_rsp_grdw1`='$_POST[rsp_grdw1]',
				`temp_rsp_clsw1`='$_POST[rsp_clsw1]',
				`temp_rsp_show1`='$_POST[rsp_show1]',
				`temp_rsp_medw1`='$_POST[rsp_medw1]',
				`temp_rsp_lonw1`='$_POST[rsp_lonw1]',
				`temp_rsp_grdl2`='$_POST[rsp_grdl2]',
				`temp_rsp_grdw2`='$_POST[rsp_grdw2]',
				`temp_rsm_l1`='$_POST[rsnaggingm_l1]',
				`temp_rsm_w1`='$_POST[rsnaggingm_w1]',
				`temp_rbs_instron`='$_POST[rinstron]',
				`temp_rbs_tru`='$_POST[rtru_burst]',
				`temp_rbs_mullen`='$_POST[rmullen]',
				`temp_rpm_f1`='$_POST[rpillingm_f1]',
				`temp_rpm_f2`='$_POST[rpillingm_f2]',
				`temp_rstretch_l1`='$_POST[rstretch_l1]',
				`temp_rstretch_w1`='$_POST[rstretch_w1]',
				`temp_rrecover_l1`='$_POST[rrecover_l1]',
				`temp_rrecover_w1`='$_POST[rrecover_w1]',
				`temp_rwick_l2`='$_POST[rwick_l2]',
				`temp_rwick_w2`='$_POST[rwick_w2]',
				`temp_rabsor_b1`='$_POST[rabsor_b1]',
				`temp_rdryaf1`='$_POST[rdryaf1]',
				`sts`='1'
				WHERE no_hanger='$nohanger'");
	
				$sql_tempPHY1=mysqli_query($con,"UPDATE tbl_tq_temp_random SET
				`sts`='2'
				WHERE no_hanger='$nohanger'");
			 }
			 echo "<script>swal({
	  title: 'Data Physical Telah Tersimpan',   
	  text: 'Klik Ok untuk input data kembali',
	  type: 'success',
	  }).then((result) => {
	  if (result.value) {
		
		 window.location.href='RandomhNew-$nohanger'; 
	  }
	});</script>";
	} 
	}else if($_POST['physical_save']=="save" and $cekR>0 and $cekRW==0 and $cekTR==0 and $cekTR2==0){
		$sqlPHY=mysqli_query($con,"UPDATE tbl_tq_randomtest SET
		  `rflamability`='$_POST[rflamability]',
		  `rfla_note`='$_POST[rfla_note]',
		  `rfc_cott`='$_POST[rfc_cott]',
		  `rfc_poly`='$_POST[rfc_poly]',
		  `rfc_elastane`='$_POST[rfc_ela]',
		  `rfc_cott1`='$_POST[rfc_cott1]',
		  `rfc_poly1`='$_POST[rfc_poly1]',
		  `rfc_elastane1`='$_POST[rfc_ela1]',
		  `std_rfc_cott1`='$_POST[std_rfc_cott1]',
		  `std_rfc_poly1`='$_POST[std_rfc_poly1]',
		  `std_rfc_elastane1`='$_POST[std_rfc_elastane1]',
		  `rfibercontent`='$_POST[rfibercontent]',
		  `rfiber_note`='$_POST[rfiber_note]',
		  `rfc_wpi`='$_POST[rwpi]',
		  `rfc_cpi`='$_POST[rcpi]',
		  `rfc_note`='$_POST[rfc_note]',
		  `rf_weight`='$_POST[rfabric_weight]',
		  `rfwe_note`='$_POST[rfwe_note]',
		  `rf_width`='$_POST[rfabric_width]',
		  `rfwi_note`='$_POST[rfwi_note]',
		  `rbow`='$_POST[rbow]',
		  `rskew`='$_POST[rskew]',
		  `rbas_note`='$_POST[rbas_note]',
		  `rh_shrinkage_l1`='$_POST[rh_shrinkage_l1]',
		  `rh_shrinkage_w1`='$_POST[rh_shrinkage_w1]',
		  `rh_shrinkage_grd`='$_POST[rh_shrinkage_grd]',
		  `rh_shrinkage_note`='$_POST[rh_shrinkage_note]',
		  `rss_temp`='$_POST[rss_temp]',
		  `rss_washes3`='$_POST[rss_washes3]',
		  `rss_washes10`='$_POST[rss_washes10]',
		  `rss_washes15`='$_POST[rss_washes15]',
		  `rss_cmt`='$_POST[rss_cmt]',
		  `rshrinkage_l1`='$_POST[rshrinkage_len1]',
		  `rshrinkage_l2`='$_POST[rshrinkage_len2]',
		  `rshrinkage_l3`='$_POST[rshrinkage_len3]',
		  `rshrinkage_l4`='$_POST[rshrinkage_len4]',
		  `rshrinkage_l5`='$_POST[rshrinkage_len5]',
		  `rshrinkage_l6`='$_POST[rshrinkage_len6]',
		  `rshrinkage_w1`='$_POST[rshrinkage_wid1]',
		  `rshrinkage_w2`='$_POST[rshrinkage_wid2]',
		  `rshrinkage_w3`='$_POST[rshrinkage_wid3]',
		  `rshrinkage_w4`='$_POST[rshrinkage_wid4]',
		  `rshrinkage_w5`='$_POST[rshrinkage_wid5]',
		  `rshrinkage_w6`='$_POST[rshrinkage_wid6]',
		  `rspirality1`='$_POST[rspirality1]',
		  `rspirality2`='$_POST[rspirality2]',
		  `rspirality3`='$_POST[rspirality3]',
		  `rspirality4`='$_POST[rspirality4]',
		  `rspirality5`='$_POST[rspirality5]',
		  `rspirality6`='$_POST[rspirality6]',
		  `rss_linedry`='$_POST[rss_linedry]',
		  `rss_tumbledry`='$_POST[rss_tumbledry]',
		  `rsns_note`='$_POST[rsns_note]',
		  `rapperss_ch1`='$_POST[rapperss_ch1]',
		  `rapperss_ch2`='$_POST[rapperss_ch2]',
		  `rapperss_ch3`='$_POST[rapperss_ch3]',
		  `rapperss_ch4`='$_POST[rapperss_ch4]',
		  `rapperss_cc1`='$_POST[rapperss_cc1]',
		  `rapperss_cc2`='$_POST[rapperss_cc2]',
		  `rapperss_cc3`='$_POST[rapperss_cc3]',
		  `rapperss_cc4`='$_POST[rapperss_cc4]',
		  `rapperss_st`='$_POST[rapperss_st]',
		  `rapperss_pf1`='$_POST[rapperss_pf1]',
		  `rapperss_pf2`='$_POST[rapperss_pf2]',
		  `rapperss_pf3`='$_POST[rapperss_pf3]',
		  `rapperss_pf4`='$_POST[rapperss_pf4]',
		  `rapperss_pb1`='$_POST[rapperss_pb1]',
		  `rapperss_pb2`='$_POST[rapperss_pb2]',
		  `rapperss_pb3`='$_POST[rapperss_pb3]',
		  `rapperss_pb4`='$_POST[rapperss_pb4]',
		  `rapperss_sf1`='$_POST[rapperss_sf1]',
			`rapperss_sf2`='$_POST[rapperss_sf2]',
			`rapperss_sf3`='$_POST[rapperss_sf3]',
			`rapperss_sf4`='$_POST[rapperss_sf4]',
			`rapperss_sb1`='$_POST[rapperss_sb1]',
			`rapperss_sb2`='$_POST[rapperss_sb2]',
			`rapperss_sb3`='$_POST[rapperss_sb3]',
			`rapperss_sb4`='$_POST[rapperss_sb4]',
	 	  `rapperss_note`='$_POST[rapperss_note]',
		  `rpm_f1`='$_POST[rpillingm_f1]',
		  `rpm_b1`='$_POST[rpillingm_b1]',
		  `rpm_f2`='$_POST[rpillingm_f2]',
		  `rpm_b2`='$_POST[rpillingm_b2]',
		  `rpm_f3`='$_POST[rpillingm_f3]',
		  `rpm_b3`='$_POST[rpillingm_b3]',
		  `rpm_f4`='$_POST[rpillingm_f4]',
		  `rpm_b4`='$_POST[rpillingm_b4]',
		  `rpm_f5`='$_POST[rpillingm_f5]',
		  `rpm_b5`='$_POST[rpillingm_b5]',
		  `rpillm_note`='$_POST[rpillm_note]',
		  `rpl_f1`='$_POST[rpillingl_f1]',
		  `rpl_b1`='$_POST[rpillingl_b1]',
		  `rpl_f2`='$_POST[rpillingl_f2]',
		  `rpl_b2`='$_POST[rpillingl_b2]',
		  `rpl_f3`='$_POST[rpillingl_f3]',
		  `rpl_b3`='$_POST[rpillingl_b3]',
		  `rpl_f4`='$_POST[rpillingl_f4]',
		  `rpl_b4`='$_POST[rpillingl_b4]',
		  `rpl_f5`='$_POST[rpillingl_f5]',
		  `rpl_b5`='$_POST[rpillingl_b5]',
		  `rpilll_note`='$_POST[rpilll_note]',
		  `rpb_f1`='$_POST[rpillingb_f1]',
		  `rpb_b1`='$_POST[rpillingb_b1]',
		  `rpb_f2`='$_POST[rpillingb_f2]',
		  `rpb_b2`='$_POST[rpillingb_b2]',
		  `rpb_f3`='$_POST[rpillingb_f3]',
		  `rpb_b3`='$_POST[rpillingb_b3]',
		  `rpb_f4`='$_POST[rpillingb_f4]',
		  `rpb_b4`='$_POST[rpillingb_b4]',
		  `rpb_f5`='$_POST[rpillingb_f5]',
		  `rpb_b5`='$_POST[rpillingb_b5]',
		  `rpillb_note`='$_POST[rpillb_note]',
		  `rprt_f1`='$_POST[rpillingrt_f1]',
		  `rprt_b1`='$_POST[rpillingrt_b1]',
		  `rprt_f2`='$_POST[rpillingrt_f2]',
		  `rprt_b2`='$_POST[rpillingrt_b2]',
		  `rprt_f3`='$_POST[rpillingrt_f3]',
		  `rprt_b3`='$_POST[rpillingrt_b3]',
		  `rprt_f4`='$_POST[rpillingrt_f4]',
		  `rprt_b4`='$_POST[rpillingrt_b4]',
		  `rprt_f5`='$_POST[rpillingrt_f5]',
		  `rprt_b5`='$_POST[rpillingrt_b5]',
		  `rpillr_note`='$_POST[rpillr_note]',
		  `rabration`='$_POST[rabr]',
		  `rabr_note`='$_POST[rabr_note]',
		  `rsm_l1`='$_POST[rsnaggingm_l1]',
		  `rsm_w1`='$_POST[rsnaggingm_w1]',
		  `rsm_l2`='$_POST[rsnaggingm_l2]',
		  `rsm_w2`='$_POST[rsnaggingm_w2]',
		  `rsm_l3`='$_POST[rsnaggingm_l3]',
		  `rsm_w3`='$_POST[rsnaggingm_w3]',
		  `rsm_l4`='$_POST[rsnaggingm_l4]',
		  `rsm_w4`='$_POST[rsnaggingm_w4]',
		  `rsnam_note`='$_POST[rsnam_note]',
		  `rsp_grdl1` ='$_POST[rsp_grdl1]',
		  `rsp_clsl1` ='$_POST[rsp_clsl1]',
		  `rsp_shol1` ='$_POST[rsp_shol1]',
		  `rsp_medl1` ='$_POST[rsp_medl1]',
		  `rsp_lonl1` ='$_POST[rsp_lonl1]',
		  `rsp_grdw1` ='$_POST[rsp_grdw1]',
		  `rsp_clsw1` ='$_POST[rsp_clsw1]',
		  `rsp_show1` ='$_POST[rsp_show1]',
		  `rsp_medw1` ='$_POST[rsp_medw1]',
		  `rsp_lonw1` ='$_POST[rsp_lonw1]',
		  `rsp_grdl2` ='$_POST[rsp_grdl2]',
		  `rsp_clsl2` ='$_POST[rsp_clsl2]',
		  `rsp_shol2` ='$_POST[rsp_shol2]',
		  `rsp_medl2` ='$_POST[rsp_medl2]',
		  `rsp_lonl2` ='$_POST[rsp_lonl2]',
		  `rsp_grdw2` ='$_POST[rsp_grdw2]',
		  `rsp_clsw2` ='$_POST[rsp_clsw2]',
		  `rsp_show2` ='$_POST[rsp_show2]',
		  `rsp_medw2` ='$_POST[rsp_medw2]',
		  `rsp_lonw2` ='$_POST[rsp_lonw2]',
		  `rsnap_note`='$_POST[rsnap_note]',
		  `rsb_l1`='$_POST[rsnaggingb_l1]',
		  `rsb_w1`='$_POST[rsnaggingb_w1]',
		  `rsb_l2`='$_POST[rsnaggingb_l2]',
		  `rsb_w2`='$_POST[rsnaggingb_w2]',
		  `rsb_l3`='$_POST[rsnaggingb_l3]',
		  `rsb_w3`='$_POST[rsnaggingb_w3]',
		  `rsb_l4`='$_POST[rsnaggingb_l4]',
		  `rsb_w4`='$_POST[rsnaggingb_w4]',
		  `rsnab_note`='$_POST[rsnab_note]',
		  `rbs_instron`='$_POST[rinstron]',
		  `rbs_mullen`='$_POST[rmullen]',
		  `rbs_tru`='$_POST[rtru_burst]',
		  `rbs_tru2`='$_POST[rtru_burst2]',
		  `rburs_note`='$_POST[rburs_note]',
		  `rthick1`='$_POST[rthick1]',
		  `rthick2`='$_POST[rthick2]',
		  `rthick3`='$_POST[rthick3]',
		  `rthickav`='$_POST[rthickav]',
		  `rthick_note`='$_POST[rthick_note]',
		  `rstretch_l1`='$_POST[rstretch_l1]',
		  `rstretch_w1`='$_POST[rstretch_w1]',
		  `rstretch_l2`='$_POST[rstretch_l2]',
		  `rstretch_w2`='$_POST[rstretch_w2]',
		  `rstretch_l3`='$_POST[rstretch_l3]',
		  `rstretch_w3`='$_POST[rstretch_w3]',
		  `rstretch_l4`='$_POST[rstretch_l4]',
		  `rstretch_w4`='$_POST[rstretch_w4]',
		  `rstretch_l5`='$_POST[rstretch_l5]',
		  `rstretch_w5`='$_POST[rstretch_w5]',
		  `rload_stretch`='$_POST[rload_stretch]',
		  `rstretch_note`='$_POST[rstretch_note]',
		  `rrecover_l1`='$_POST[rrecover_l1]',
		  `rrecover_w1`='$_POST[rrecover_w1]',
		  `rrecover_l2`='$_POST[rrecover_l2]',
		  `rrecover_w2`='$_POST[rrecover_w2]',
		  `rrecover_l3`='$_POST[rrecover_l3]',
		  `rrecover_w3`='$_POST[rrecover_w3]',
		  `rrecover_l4`='$_POST[rrecover_l4]',
		  `rrecover_w4`='$_POST[rrecover_w4]',
		  `rrecover_l5`='$_POST[rrecover_l5]',
		  `rrecover_w5`='$_POST[rrecover_w5]',
		  `rrecover_note`='$_POST[rrecover_note]',
		  `rgrowth_l1`='$_POST[rgrowth_l1]',
		  `rgrowth_w1`='$_POST[rgrowth_w1]',
		  `rgrowth_l2`='$_POST[rgrowth_l2]',
		  `rgrowth_w2`='$_POST[rgrowth_w2]',
		  `rrec_growth_l1`='$_POST[rrec_growth_l1]',
		  `rrec_growth_w1`='$_POST[rrec_growth_w1]',
		  `rrec_growth_l2`='$_POST[rrec_growth_l2]',
		  `rrec_growth_w2`='$_POST[rrec_growth_w2]',
		  `rgrowth_note`='$_POST[rgrowth_note]',
		  `rapper_ch1`='$_POST[rapper_ch1]',
		  `rapper_ch2`='$_POST[rapper_ch2]',
		  `rapper_ch3`='$_POST[rapper_ch3]',
		  `rapper_cc1`='$_POST[rapper_cc1]',
		  `rapper_cc2`='$_POST[rapper_cc2]',
		  `rapper_cc3`='$_POST[rapper_cc3]',
		  `rapper_st`='$_POST[rapper_st]',
		  `rapper_st2`='$_POST[rapper_st2]',
		  `rapper_st3`='$_POST[rapper_st3]',
		  `rapper_pf1`='$_POST[rapper_pf1]',
		  `rapper_pf2`='$_POST[rapper_pf2]',
		  `rapper_pf3`='$_POST[rapper_pf3]',
		  `rapper_pb1`='$_POST[rapper_pb1]',
		  `rapper_pb2`='$_POST[rapper_pb2]',
		  `rapper_pb3`='$_POST[rapper_pb3]',
		  `rapper_acetate`='$_POST[rapper_acetate]',
		  `rapper_cotton`='$_POST[rapper_cotton]',
		  `rapper_nylon`='$_POST[rapper_nylon]',
		  `rapper_poly`='$_POST[rapper_poly]',
		  `rapper_acrylic`='$_POST[rapper_acrylic]',
		  `rapper_wool`='$_POST[rapper_wool]',
	 	  `rapper_note`='$_POST[rapper_note]',
		  `rfibre_transfer`='$_POST[rfibre_transfer]',
		  `rfibre_grade`='$_POST[rfibre_grade]',
		  `rfibre_note`='$_POST[rfibre_note]',
		  `rodour`='$_POST[rodour]',
		  `rodour_note`='$_POST[rodour_note]',
		  `rcurling`='$_POST[rcurling]',
		  `rcurling_note`='$_POST[rcurling_note]',
		  `rnedle`='$_POST[rnedle]',
		  `rnedle_note`='$_POST[rnedle_note]',
		  `tgl_update`=now()
		  WHERE no_hanger='$nohanger'");
	 if($sqlPHY){
		$sql_tempPHY=mysqli_query($con,"INSERT INTO tbl_tq_temp_random SET
				`no_item`='$rcek2[no_item]',
				`no_hanger`='$_GET[no_hanger]',
				`temp_rprt_f1`='$_POST[rpillingrt_f1]',
				`temp_rprt_b1`='$_POST[rpillingrt_b1]',
				`temp_rpb_f1`='$_POST[rpillingb_f1]',
				`temp_rsp_grdl1`='$_POST[rsp_grdl1]',
				`temp_rsp_clsl1`='$_POST[rsp_clsl1]',
				`temp_rsp_shol1`='$_POST[rsp_shol1]',
				`temp_rsp_medl1`='$_POST[rsp_medl1]',
				`temp_rsp_lonl1`='$_POST[rsp_lonl1]',
				`temp_rsp_grdw1`='$_POST[rsp_grdw1]',
				`temp_rsp_clsw1`='$_POST[rsp_clsw1]',
				`temp_rsp_show1`='$_POST[rsp_show1]',
				`temp_rsp_medw1`='$_POST[rsp_medw1]',
				`temp_rsp_lonw1`='$_POST[rsp_lonw1]',
				`temp_rsp_grdl2`='$_POST[rsp_grdl2]',
				`temp_rsp_grdw2`='$_POST[rsp_grdw2]',
				`temp_rsm_l1`='$_POST[rsnaggingm_l1]',
				`temp_rsm_w1`='$_POST[rsnaggingm_w1]',
				`temp_rbs_instron`='$_POST[rinstron]',
				`temp_rbs_tru`='$_POST[rtru_burst]',
				`temp_rbs_mullen`='$_POST[rmullen]',
				`temp_rpm_f1`='$_POST[rpillingm_f1]',
				`temp_rpm_f2`='$_POST[rpillingm_f2]',
				`temp_rstretch_l1`='$_POST[rstretch_l1]',
				`temp_rstretch_w1`='$_POST[rstretch_w1]',
				`temp_rrecover_l1`='$_POST[rrecover_l1]',
				`temp_rrecover_w1`='$_POST[rrecover_w1]',
				`temp_rwick_l2`='$_POST[rwick_l2]',
				`temp_rwick_w2`='$_POST[rwick_w2]',
				`temp_rabsor_b1`='$_POST[rabsor_b1]',
				`temp_rdryaf1`='$_POST[rdryaf1]',
				`sts`='1',
				`tgl_buat`=now(),
				`tgl_update`=now()
				");
			
			$sql_tempPHY1=mysqli_query($con,"INSERT INTO tbl_tq_temp_random2 SET
				`no_item`='$rcek2[no_item]',
				`no_hanger`='$_GET[no_hanger]',
				`temp_rprt_f1`='$_POST[rpillingrt_f1]',
				`temp_rprt_b1`='$_POST[rpillingrt_b1]',
				`temp_rpb_f1`='$_POST[rpillingb_f1]',
				`temp_rsp_grdl1`='$_POST[rsp_grdl1]',
				`temp_rsp_clsl1`='$_POST[rsp_clsl1]',
				`temp_rsp_shol1`='$_POST[rsp_shol1]',
				`temp_rsp_medl1`='$_POST[rsp_medl1]',
				`temp_rsp_lonl1`='$_POST[rsp_lonl1]',
				`temp_rsp_grdw1`='$_POST[rsp_grdw1]',
				`temp_rsp_clsw1`='$_POST[rsp_clsw1]',
				`temp_rsp_show1`='$_POST[rsp_show1]',
				`temp_rsp_medw1`='$_POST[rsp_medw1]',
				`temp_rsp_lonw1`='$_POST[rsp_lonw1]',
				`temp_rsp_grdl2`='$_POST[rsp_grdl2]',
				`temp_rsp_grdw2`='$_POST[rsp_grdw2]',
				`temp_rsm_l1`='$_POST[rsnaggingm_l1]',
				`temp_rsm_w1`='$_POST[rsnaggingm_w1]',
				`temp_rbs_instron`='$_POST[rinstron]',
				`temp_rbs_tru`='$_POST[rtru_burst]',
				`temp_rbs_mullen`='$_POST[rmullen]',
				`temp_rpm_f1`='$_POST[rpillingm_f1]',
				`temp_rpm_f2`='$_POST[rpillingm_f2]',
				`temp_rstretch_l1`='$_POST[rstretch_l1]',
				`temp_rstretch_w1`='$_POST[rstretch_w1]',
				`temp_rrecover_l1`='$_POST[rrecover_l1]',
				`temp_rrecover_w1`='$_POST[rrecover_w1]',
				`temp_rwick_l2`='$_POST[rwick_l2]',
				`temp_rwick_w2`='$_POST[rwick_w2]',
				`temp_rabsor_b1`='$_POST[rabsor_b1]',
				`temp_rdryaf1`='$_POST[rdryaf1]',
				`sts`='2',
				`tgl_buat`=now(),
				`tgl_update`=now()
				");
			$sql_PHYWarna=mysqli_query($con,"INSERT INTO tbl_tq_random_warna SET
				`no_item`='$rcek2[no_item]',
				`no_hanger`='$_GET[no_hanger]',
				`rflamabilityw`='$_POST[rflamabilityw]',
				`rfc_cott1w`='$_POST[rfc_cott1w]',
				`rfc_poly1w`='$_POST[rfc_poly1w]',
				`rfc_ela1w`='$_POST[rfc_ela1w]',
				`rwpiw`='$_POST[rwpiw]',
				`rcpiw`='$_POST[rcpiw]',
				`rf_weightw`='$_POST[rf_weightw]',
				`rf_widthw`='$_POST[rf_widthw]',
				`rboww`='$_POST[rboww]',
				`rskeww`='$_POST[rskeww]',
				`rssw`='$_POST[rssw]',
				`rapperssw`='$_POST[rapperssw]',
				`rpmw`='$_POST[rpmw]',
				`rplw`='$_POST[rplw]',
				`rpbw`='$_POST[rpbw]',
				`rprtw`='$_POST[rprtw]',
				`rsmw`='$_POST[rsmw]',
				`rspw`='$_POST[rspw]',
				`rsbw`='$_POST[rsbw]',
				`rbsw`='$_POST[rbsw]',
				`rthickw`='$_POST[rthickw]',
				`rstretchw`='$_POST[rstretchw]',
				`rrecoverw`='$_POST[rrecoverw]',
				`rgrowthw`='$_POST[rgrowthw]',
				`rrec_growthw`='$_POST[rrec_growthw]',
				`rapperw`='$_POST[rapperw]',
				`rh_shrinkagew`='$_POST[rh_shrinkagew]',
				`rfibrew`='$_POST[rfibrew]',
				`rodourw`='$_POST[rodourw]',
				`rcurlingw`='$_POST[rcurlingw]',
				`rnedlew`='$_POST[rnedlew]',
				`tgl_buat`=now(),
				`tgl_update`=now()
				");

		 echo "<script>swal({
  title: 'Data Physical Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='RandomhNew-$nohanger'; 
  }
});</script>";
	 }
	 }else if($_POST['physical_save']=="save"){
	$sqlPHY=mysqli_query($con,"INSERT INTO tbl_tq_randomtest SET
		  `no_item`='$rcek2[no_item]',
		  `no_hanger`='$_GET[no_hanger]', 
		  `rflamability`='$_POST[rflamability]',
		  `rfla_note`='$_POST[rfla_note]',
		  `rfc_cott`='$_POST[rfc_cott]',
		  `rfc_poly`='$_POST[rfc_poly]',
		  `rfc_elastane`='$_POST[rfc_ela]',
		  `rfc_cott1`='$_POST[rfc_cott1]',
		  `rfc_poly1`='$_POST[rfc_poly1]',
		  `rfc_elastane1`='$_POST[rfc_ela1]',
		  `std_rfc_cott1`='$_POST[std_rfc_cott1]',
		  `std_rfc_poly1`='$_POST[std_rfc_poly1]',
		  `std_rfc_elastane1`='$_POST[std_rfc_elastane1]',
		  `rfibercontent`='$_POST[rfibercontent]',
		  `rfiber_note`='$_POST[rfiber_note]',
		  `rfc_wpi`='$_POST[rwpi]',
		  `rfc_cpi`='$_POST[rcpi]',
		  `rfc_note`='$_POST[rfc_note]',
		  `rf_weight`='$_POST[rfabric_weight]',
		  `rfwe_note`='$_POST[rfwe_note]',
		  `rf_width`='$_POST[rfabric_width]',
		  `rfwi_note`='$_POST[rfwi_note]',
		  `rbow`='$_POST[rbow]',
		  `rskew`='$_POST[rskew]',
		  `rbas_note`='$_POST[rbas_note]',
		  `rh_shrinkage_l1`='$_POST[rh_shrinkage_l1]',
		  `rh_shrinkage_w1`='$_POST[rh_shrinkage_w1]',
		  `rh_shrinkage_grd`='$_POST[rh_shrinkage_grd]',
		  `rh_shrinkage_note`='$_POST[rh_shrinkage_note]',
		  `rss_temp`='$_POST[rss_temp]',
		  `rss_washes3`='$_POST[rss_washes3]',
		  `rss_washes10`='$_POST[rss_washes10]',
		  `rss_washes15`='$_POST[rss_washes15]',
		  `rss_cmt`='$_POST[rss_cmt]',
		  `rshrinkage_l1`='$_POST[rshrinkage_len1]',
		  `rshrinkage_l2`='$_POST[rshrinkage_len2]',
		  `rshrinkage_l3`='$_POST[rshrinkage_len3]',
		  `rshrinkage_l4`='$_POST[rshrinkage_len4]',
		  `rshrinkage_l5`='$_POST[rshrinkage_len5]',
		  `rshrinkage_l6`='$_POST[rshrinkage_len6]',
		  `rshrinkage_w1`='$_POST[rshrinkage_wid1]',
		  `rshrinkage_w2`='$_POST[rshrinkage_wid2]',
		  `rshrinkage_w3`='$_POST[rshrinkage_wid3]',
		  `rshrinkage_w4`='$_POST[rshrinkage_wid4]',
		  `rshrinkage_w5`='$_POST[rshrinkage_wid5]',
		  `rshrinkage_w6`='$_POST[rshrinkage_wid6]',
		  `rspirality1`='$_POST[rspirality1]',
		  `rspirality2`='$_POST[rspirality2]',
		  `rspirality3`='$_POST[rspirality3]',
		  `rspirality4`='$_POST[rspirality4]',
		  `rspirality5`='$_POST[rspirality5]',
		  `rspirality6`='$_POST[rspirality6]',
		  `rss_linedry`='$_POST[rss_linedry]',
		  `rss_tumbledry`='$_POST[rss_tumbledry]',
		  `rsns_note`='$_POST[rsns_note]',
		  `rapperss_ch1`='$_POST[rapperss_ch1]',
		  `rapperss_ch2`='$_POST[rapperss_ch2]',
		  `rapperss_ch3`='$_POST[rapperss_ch3]',
		  `rapperss_ch4`='$_POST[rapperss_ch4]',
		  `rapperss_cc1`='$_POST[rapperss_cc1]',
		  `rapperss_cc2`='$_POST[rapperss_cc2]',
		  `rapperss_cc3`='$_POST[rapperss_cc3]',
		  `rapperss_cc4`='$_POST[rapperss_cc4]',
		  `rapperss_st`='$_POST[rapperss_st]',
		  `rapperss_pf1`='$_POST[rapperss_pf1]',
		  `rapperss_pf2`='$_POST[rapperss_pf2]',
		  `rapperss_pf3`='$_POST[rapperss_pf3]',
		  `rapperss_pf4`='$_POST[rapperss_pf4]',
		  `rapperss_pb1`='$_POST[rapperss_pb1]',
		  `rapperss_pb2`='$_POST[rapperss_pb2]',
		  `rapperss_pb3`='$_POST[rapperss_pb3]',
		  `rapperss_pb4`='$_POST[rapperss_pb4]',
		  `rapperss_sf1`='$_POST[rapperss_sf1]',
			`rapperss_sf2`='$_POST[rapperss_sf2]',
			`rapperss_sf3`='$_POST[rapperss_sf3]',
			`rapperss_sf4`='$_POST[rapperss_sf4]',
			`rapperss_sb1`='$_POST[rapperss_sb1]',
			`rapperss_sb2`='$_POST[rapperss_sb2]',
			`rapperss_sb3`='$_POST[rapperss_sb3]',
			`rapperss_sb4`='$_POST[rapperss_sb4]',
	 	  `rapperss_note`='$_POST[rapperss_note]',
		  `rpm_f1`='$_POST[rpillingm_f1]',
		  `rpm_b1`='$_POST[rpillingm_b1]',
		  `rpm_f2`='$_POST[rpillingm_f2]',
		  `rpm_b2`='$_POST[rpillingm_b2]',
		  `rpm_f3`='$_POST[rpillingm_f3]',
		  `rpm_b3`='$_POST[rpillingm_b3]',
		  `rpm_f4`='$_POST[rpillingm_f4]',
		  `rpm_b4`='$_POST[rpillingm_b4]',
		  `rpm_f5`='$_POST[rpillingm_f5]',
		  `rpm_b5`='$_POST[rpillingm_b5]',
		  `rpillm_note`='$_POST[rpillm_note]',
		  `rpl_f1`='$_POST[rpillingl_f1]',
		  `rpl_b1`='$_POST[rpillingl_b1]',
		  `rpl_f2`='$_POST[rpillingl_f2]',
		  `rpl_b2`='$_POST[rpillingl_b2]',
		  `rpl_f3`='$_POST[rpillingl_f3]',
		  `rpl_b3`='$_POST[rpillingl_b3]',
		  `rpl_f4`='$_POST[rpillingl_f4]',
		  `rpl_b4`='$_POST[rpillingl_b4]',
		  `rpl_f5`='$_POST[rpillingl_f5]',
		  `rpl_b5`='$_POST[rpillingl_b5]',
		  `rpilll_note`='$_POST[rpilll_note]',
		  `rpb_f1`='$_POST[rpillingb_f1]',
		  `rpb_b1`='$_POST[rpillingb_b1]',
		  `rpb_f2`='$_POST[rpillingb_f2]',
		  `rpb_b2`='$_POST[rpillingb_b2]',
		  `rpb_f3`='$_POST[rpillingb_f3]',
		  `rpb_b3`='$_POST[rpillingb_b3]',
		  `rpb_f4`='$_POST[rpillingb_f4]',
		  `rpb_b4`='$_POST[rpillingb_b4]',
		  `rpb_f5`='$_POST[rpillingb_f5]',
		  `rpb_b5`='$_POST[rpillingb_b5]',
		  `rpillb_note`='$_POST[rpillb_note]',
		  `rprt_f1`='$_POST[rpillingrt_f1]',
		  `rprt_b1`='$_POST[rpillingrt_b1]',
		  `rprt_f2`='$_POST[rpillingrt_f2]',
		  `rprt_b2`='$_POST[rpillingrt_b2]',
		  `rprt_f3`='$_POST[rpillingrt_f3]',
		  `rprt_b3`='$_POST[rpillingrt_b3]',
		  `rprt_f4`='$_POST[rpillingrt_f4]',
		  `rprt_b4`='$_POST[rpillingrt_b4]',
		  `rprt_f5`='$_POST[rpillingrt_f5]',
		  `rprt_b5`='$_POST[rpillingrt_b5]',
		  `rpillr_note`='$_POST[rpillr_note]',
		  `rabration`='$_POST[rabr]',
		  `rabr_note`='$_POST[rabr_note]',
		  `rsm_l1`='$_POST[rsnaggingm_l1]',
		  `rsm_w1`='$_POST[rsnaggingm_w1]',
		  `rsm_l2`='$_POST[rsnaggingm_l2]',
		  `rsm_w2`='$_POST[rsnaggingm_w2]',
		  `rsm_l3`='$_POST[rsnaggingm_l3]',
		  `rsm_w3`='$_POST[rsnaggingm_w3]',
		  `rsm_l4`='$_POST[rsnaggingm_l4]',
		  `rsm_w4`='$_POST[rsnaggingm_w4]',
		  `rsnam_note`='$_POST[rsnam_note]',
		  `rsp_grdl1` ='$_POST[rsp_grdl1]',
		  `rsp_clsl1` ='$_POST[rsp_clsl1]',
		  `rsp_shol1` ='$_POST[rsp_shol1]',
		  `rsp_medl1` ='$_POST[rsp_medl1]',
		  `rsp_lonl1` ='$_POST[rsp_lonl1]',
		  `rsp_grdw1` ='$_POST[rsp_grdw1]',
		  `rsp_clsw1` ='$_POST[rsp_clsw1]',
		  `rsp_show1` ='$_POST[rsp_show1]',
		  `rsp_medw1` ='$_POST[rsp_medw1]',
		  `rsp_lonw1` ='$_POST[rsp_lonw1]',
		  `rsp_grdl2` ='$_POST[rsp_grdl2]',
		  `rsp_clsl2` ='$_POST[rsp_clsl2]',
		  `rsp_shol2` ='$_POST[rsp_shol2]',
		  `rsp_medl2` ='$_POST[rsp_medl2]',
		  `rsp_lonl2` ='$_POST[rsp_lonl2]',
		  `rsp_grdw2` ='$_POST[rsp_grdw2]',
		  `rsp_clsw2` ='$_POST[rsp_clsw2]',
		  `rsp_show2` ='$_POST[rsp_show2]',
		  `rsp_medw2` ='$_POST[rsp_medw2]',
		  `rsp_lonw2` ='$_POST[rsp_lonw2]',
		  `rsnap_note`='$_POST[rsnap_note]',
		  `rsb_l1`='$_POST[rsnaggingb_l1]',
		  `rsb_w1`='$_POST[rsnaggingb_w1]',
		  `rsb_l2`='$_POST[rsnaggingb_l2]',
		  `rsb_w2`='$_POST[rsnaggingb_w2]',
		  `rsb_l3`='$_POST[rsnaggingb_l3]',
		  `rsb_w3`='$_POST[rsnaggingb_w3]',
		  `rsb_l4`='$_POST[rsnaggingb_l4]',
		  `rsb_w4`='$_POST[rsnaggingb_w4]',
		  `rsnab_note`='$_POST[rsnab_note]',
		  `rbs_instron`='$_POST[rinstron]',
		  `rbs_mullen`='$_POST[rmullen]',
		  `rbs_tru`='$_POST[rtru_burst]',
		  `rbs_tru2`='$_POST[rtru_burst2]',
		  `rburs_note`='$_POST[rburs_note]',
		  `rthick1`='$_POST[rthick1]',
		  `rthick2`='$_POST[rthick2]',
		  `rthick3`='$_POST[rthick3]',
		  `rthickav`='$_POST[rthickav]',
		  `rthick_note`='$_POST[rthick_note]',
		  `rstretch_l1`='$_POST[rstretch_l1]',
		  `rstretch_w1`='$_POST[rstretch_w1]',
		  `rstretch_l2`='$_POST[rstretch_l2]',
		  `rstretch_w2`='$_POST[rstretch_w2]',
		  `rstretch_l3`='$_POST[rstretch_l3]',
		  `rstretch_w3`='$_POST[rstretch_w3]',
		  `rstretch_l4`='$_POST[rstretch_l4]',
		  `rstretch_w4`='$_POST[rstretch_w4]',
		  `rstretch_l5`='$_POST[rstretch_l5]',
		  `rstretch_w5`='$_POST[rstretch_w5]',
		  `rload_stretch`='$_POST[rload_stretch]',
		  `rstretch_note`='$_POST[rstretch_note]',
		  `rrecover_l1`='$_POST[rrecover_l1]',
		  `rrecover_w1`='$_POST[rrecover_w1]',
		  `rrecover_l2`='$_POST[rrecover_l2]',
		  `rrecover_w2`='$_POST[rrecover_w2]',
		  `rrecover_l3`='$_POST[rrecover_l3]',
		  `rrecover_w3`='$_POST[rrecover_w3]',
		  `rrecover_l4`='$_POST[rrecover_l4]',
		  `rrecover_w4`='$_POST[rrecover_w4]',
		  `rrecover_l5`='$_POST[rrecover_l5]',
		  `rrecover_w5`='$_POST[rrecover_w5]',
		  `rrecover_note`='$_POST[rrecover_note]',
		  `rgrowth_l1`='$_POST[rgrowth_l1]',
		  `rgrowth_w1`='$_POST[rgrowth_w1]',
		  `rgrowth_l2`='$_POST[rgrowth_l2]',
		  `rgrowth_w2`='$_POST[rgrowth_w2]',
		  `rrec_growth_l1`='$_POST[rrec_growth_l1]',
		  `rrec_growth_w1`='$_POST[rrec_growth_w1]',
		  `rrec_growth_l2`='$_POST[rrec_growth_l2]',
		  `rrec_growth_w2`='$_POST[rrec_growth_w2]',
		  `rgrowth_note`='$_POST[rgrowth_note]',
		  `rapper_ch1`='$_POST[rapper_ch1]',
		  `rapper_ch2`='$_POST[rapper_ch2]',
		  `rapper_ch3`='$_POST[rapper_ch3]',
		  `rapper_cc1`='$_POST[rapper_cc1]',
		  `rapper_cc2`='$_POST[rapper_cc2]',
		  `rapper_cc3`='$_POST[rapper_cc3]',
		  `rapper_st`='$_POST[rapper_st]',
		  `rapper_st2`='$_POST[rapper_st2]',
		  `rapper_st3`='$_POST[rapper_st3]',
		  `rapper_pf1`='$_POST[rapper_pf1]',
		  `rapper_pf2`='$_POST[rapper_pf2]',
		  `rapper_pf3`='$_POST[rapper_pf3]',
		  `rapper_pb1`='$_POST[rapper_pb1]',
		  `rapper_pb2`='$_POST[rapper_pb2]',
		  `rapper_pb3`='$_POST[rapper_pb3]',
		  `rapper_acetate`='$_POST[rapper_acetate]',
		  `rapper_cotton`='$_POST[rapper_cotton]',
		  `rapper_nylon`='$_POST[rapper_nylon]',
		  `rapper_poly`='$_POST[rapper_poly]',
		  `rapper_acrylic`='$_POST[rapper_acrylic]',
		  `rapper_wool`='$_POST[rapper_wool]',
	 	  `rapper_note`='$_POST[rapper_note]',
		  `rfibre_transfer`='$_POST[rfibre_transfer]',
		  `rfibre_grade`='$_POST[rfibre_grade]',
		  `rfibre_note`='$_POST[rfibre_note]',
		  `rodour`='$_POST[rodour]',
		  `rodour_note`='$_POST[rodour_note]',
		  `rcurling`='$_POST[rcurling]',
		  `rcurling_note`='$_POST[rcurling_note]',
		  `rwick_l1`='$_POST[rwick_l1]',
		  `rwick_w1`='$_POST[rwick_w1]',
		  `rwick_l2`='$_POST[rwick_l2]',
		  `rwick_w2`='$_POST[rwick_w2]',
		  `rwick_l3`='$_POST[rwick_l3]',
		  `rwick_w3`='$_POST[rwick_w3]',
		  `rwick_note`='$_POST[rwick_note]',
		  `rabsor_f1`='$_POST[rabsor_f1]',
		  `rabsor_f2`='$_POST[rabsor_f2]',
		  `rabsor_f3`='$_POST[rabsor_f3]',
		  `rabsor_b1`='$_POST[rabsor_b1]',
		  `rabsor_b2`='$_POST[rabsor_b2]',
		  `rabsor_b3`='$_POST[rabsor_b3]',
		  `rabsor_note`='$_POST[rabsor_note]',
		  `rdry1`='$_POST[rdry1]',
		  `rdry2`='$_POST[rdry2]',
		  `rdry3`='$_POST[rdry3]',
		  `rdry_note`='$_POST[rdry_note]',
		  `rrepp1`='$_POST[rrepp1]',
		  `rrepp2`='$_POST[rrepp3]',
		  `rrepp3`='$_POST[rrepp3]',
		  `rrepp4`='$_POST[rrepp4]',
		  `rrepp_note`='$_POST[rrepp_note]',
		  `rph`='$_POST[rph]',
		  `rph_note`='$_POST[rph_note]',
		  `rsoil` = '$_POST[rsoil]',
		  `rsoil_note` = '$_POST[rsoil_note]',
		  `tgl_buat`=now(),
		  `tgl_update`=now()");
	 if($sqlPHY){
		$sql_tempPHY=mysqli_query($con,"INSERT INTO tbl_tq_temp_random SET
				`no_item`='$rcek2[no_item]',
				`no_hanger`='$_GET[no_hanger]',
				`temp_rprt_f1`='$_POST[rpillingrt_f1]',
				`temp_rprt_b1`='$_POST[rpillingrt_b1]',
				`temp_rpb_f1`='$_POST[rpillingb_f1]',
				`temp_rsp_grdl1`='$_POST[rsp_grdl1]',
				`temp_rsp_clsl1`='$_POST[rsp_clsl1]',
				`temp_rsp_shol1`='$_POST[rsp_shol1]',
				`temp_rsp_medl1`='$_POST[rsp_medl1]',
				`temp_rsp_lonl1`='$_POST[rsp_lonl1]',
				`temp_rsp_grdw1`='$_POST[rsp_grdw1]',
				`temp_rsp_clsw1`='$_POST[rsp_clsw1]',
				`temp_rsp_show1`='$_POST[rsp_show1]',
				`temp_rsp_medw1`='$_POST[rsp_medw1]',
				`temp_rsp_lonw1`='$_POST[rsp_lonw1]',
				`temp_rsp_grdl2`='$_POST[rsp_grdl2]',
				`temp_rsp_grdw2`='$_POST[rsp_grdw2]',
				`temp_rsm_l1`='$_POST[rsnaggingm_l1]',
				`temp_rsm_w1`='$_POST[rsnaggingm_w1]',
				`temp_rbs_instron`='$_POST[rinstron]',
				`temp_rbs_tru`='$_POST[rtru_burst]',
				`temp_rbs_mullen`='$_POST[rmullen]',
				`temp_rpm_f1`='$_POST[rpillingm_f1]',
				`temp_rpm_f2`='$_POST[rpillingm_f2]',
				`temp_rstretch_l1`='$_POST[rstretch_l1]',
				`temp_rstretch_w1`='$_POST[rstretch_w1]',
				`temp_rrecover_l1`='$_POST[rrecover_l1]',
				`temp_rrecover_w1`='$_POST[rrecover_w1]',
				`temp_rwick_l2`='$_POST[rwick_l2]',
				`temp_rwick_w2`='$_POST[rwick_w2]',
				`temp_rabsor_b1`='$_POST[rabsor_b1]',
				`temp_rdryaf1`='$_POST[rdryaf1]',
				`sts`='1',
				`tgl_buat`=now(),
				`tgl_update`=now()
				");
			
			$sql_tempPHY1=mysqli_query($con,"INSERT INTO tbl_tq_temp_random2 SET
				`no_item`='$rcek2[no_item]',
				`no_hanger`='$_GET[no_hanger]',
				`temp_rprt_f1`='$_POST[rpillingrt_f1]',
				`temp_rprt_b1`='$_POST[rpillingrt_b1]',
				`temp_rpb_f1`='$_POST[rpillingb_f1]',
				`temp_rsp_grdl1`='$_POST[rsp_grdl1]',
				`temp_rsp_clsl1`='$_POST[rsp_clsl1]',
				`temp_rsp_shol1`='$_POST[rsp_shol1]',
				`temp_rsp_medl1`='$_POST[rsp_medl1]',
				`temp_rsp_lonl1`='$_POST[rsp_lonl1]',
				`temp_rsp_grdw1`='$_POST[rsp_grdw1]',
				`temp_rsp_clsw1`='$_POST[rsp_clsw1]',
				`temp_rsp_show1`='$_POST[rsp_show1]',
				`temp_rsp_medw1`='$_POST[rsp_medw1]',
				`temp_rsp_lonw1`='$_POST[rsp_lonw1]',
				`temp_rsp_grdl2`='$_POST[rsp_grdl2]',
				`temp_rsp_grdw2`='$_POST[rsp_grdw2]',
				`temp_rsm_l1`='$_POST[rsnaggingm_l1]',
				`temp_rsm_w1`='$_POST[rsnaggingm_w1]',
				`temp_rbs_instron`='$_POST[rinstron]',
				`temp_rbs_tru`='$_POST[rtru_burst]',
				`temp_rbs_mullen`='$_POST[rmullen]',
				`temp_rpm_f1`='$_POST[rpillingm_f1]',
				`temp_rpm_f2`='$_POST[rpillingm_f2]',
				`temp_rstretch_l1`='$_POST[rstretch_l1]',
				`temp_rstretch_w1`='$_POST[rstretch_w1]',
				`temp_rrecover_l1`='$_POST[rrecover_l1]',
				`temp_rrecover_w1`='$_POST[rrecover_w1]',
				`temp_rwick_l2`='$_POST[rwick_l2]',
				`temp_rwick_w2`='$_POST[rwick_w2]',
				`temp_rabsor_b1`='$_POST[rabsor_b1]',
				`temp_rdryaf1`='$_POST[rdryaf1]',
				`sts`='2',
				`tgl_buat`=now(),
				`tgl_update`=now()
				");
			$sql_PHYWarna=mysqli_query($con,"INSERT INTO tbl_tq_random_warna SET
				`no_item`='$rcek2[no_item]',
				`no_hanger`='$_GET[no_hanger]',
				`rflamabilityw`='$_POST[rflamabilityw]',
				`rfc_cott1w`='$_POST[rfc_cott1w]',
				`rfc_poly1w`='$_POST[rfc_poly1w]',
				`rfc_ela1w`='$_POST[rfc_ela1w]',
				`rwpiw`='$_POST[rwpiw]',
				`rcpiw`='$_POST[rcpiw]',
				`rf_weightw`='$_POST[rf_weightw]',
				`rf_widthw`='$_POST[rf_widthw]',
				`rboww`='$_POST[rboww]',
				`rskeww`='$_POST[rskeww]',
				`rssw`='$_POST[rssw]',
				`rapperssw`='$_POST[rapperssw]',
				`rpmw`='$_POST[rpmw]',
				`rplw`='$_POST[rplw]',
				`rpbw`='$_POST[rpbw]',
				`rprtw`='$_POST[rprtw]',
				`rsmw`='$_POST[rsmw]',
				`rspw`='$_POST[rspw]',
				`rsbw`='$_POST[rsbw]',
				`rbsw`='$_POST[rbsw]',
				`rthickw`='$_POST[rthickw]',
				`rstretchw`='$_POST[rstretchw]',
				`rrecoverw`='$_POST[rrecoverw]',
				`rgrowthw`='$_POST[rgrowthw]',
				`rrec_growthw`='$_POST[rrec_growthw]',
				`rapperw`='$_POST[rapperw]',
				`rh_shrinkagew`='$_POST[rh_shrinkagew]',
				`rfibrew`='$_POST[rfibrew]',
				`rodourw`='$_POST[rodourw]',
				`rcurlingw`='$_POST[rcurlingw]',
				`rnedlew`='$_POST[rnedlew]',
				`tgl_buat`=now(),
				`tgl_update`=now()
				");

		 echo "<script>swal({
  title: 'Data Physical Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='RandomhNew-$nohanger'; 
  }
});</script>";
	 }else{
		echo "<script>swal({
  title: 'Data Physical Gagal Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'error',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='RandomhNew-$nohanger'; 
  }
});</script>"; 
	 }
	
}
if($_POST['colorfastness_save']=="save" and $cekR>0){
	$sqlCLR=mysqli_query($con,"UPDATE tbl_tq_randomtest SET
	`rwash_temp`='$_POST[rwash_temp]',
	`rwash_colorchange`='$_POST[rwash_colorchange]',
	`rwash_acetate`='$_POST[rwash_acetate]',
	`rwash_cotton`='$_POST[rwash_cotton]',
	`rwash_nylon`='$_POST[rwash_nylon]',
	`rwash_poly`='$_POST[rwash_poly]',
	`rwash_acrylic`='$_POST[rwash_acrylic]',
	`rwash_wool`='$_POST[rwash_wool]',
	`rwash_staining`='$_POST[rwash_staining]',
	`rwash_note`='$_POST[rwash_note]',
	`rwater_colorchange`='$_POST[rwater_colorchange]',
	`rwater_acetate`='$_POST[rwater_acetate]',
	`rwater_cotton`='$_POST[rwater_cotton]',
	`rwater_nylon`='$_POST[rwater_nylon]',
	`rwater_poly`='$_POST[rwater_poly]',
	`rwater_acrylic`='$_POST[rwater_acrylic]',
	`rwater_wool`='$_POST[rwater_wool]',
	`rwater_staining`='$_POST[rwater_staining]',
	`rwater_note`='$_POST[rwater_note]',
	`racid_colorchange`='$_POST[racid_colorchange]',
	`racid_acetate`='$_POST[racid_acetate]',
	`racid_cotton`='$_POST[racid_cotton]',
	`racid_nylon`='$_POST[racid_nylon]',
	`racid_poly`='$_POST[racid_poly]',
	`racid_acrylic`='$_POST[racid_acrylic]',
	`racid_wool`='$_POST[racid_wool]',
	`racid_staining`='$_POST[racid_staining]',
	`racid_note`='$_POST[racid_note]',
	`ralkaline_colorchange`='$_POST[ralkaline_colorchange]',
	`ralkaline_acetate`='$_POST[ralkaline_acetate]',
	`ralkaline_cotton`='$_POST[ralkaline_cotton]',
	`ralkaline_nylon`='$_POST[ralkaline_nylon]',
	`ralkaline_poly`='$_POST[ralkaline_poly]',
	`ralkaline_acrylic`='$_POST[ralkaline_acrylic]',
	`ralkaline_wool`='$_POST[ralkaline_wool]',
	`ralkaline_staining`='$_POST[ralkaline_staining]',
	`ralkaline_note`='$_POST[ralkaline_note]',
	`rcrock_len1`='$_POST[rcrock_len1]',
	`rcrock_wid1`='$_POST[rcrock_wid1]',
	`rcrock_len2`='$_POST[rcrock_len2]',
	`rcrock_wid2`='$_POST[rcrock_wid2]',
	`rcrock_note`='$_POST[rcrock_note]',
	`rphenolic_colorchange`='$_POST[rphenolic_colorchange]',
	`rphenolic_note`='$_POST[rphenolic_note]',
	`rcm_printing_colorchange`='$_POST[rcm_printing_colorchange]',
	`rcm_printing_staining`='$_POST[rcm_printing_staining]',
	`rcm_printing_note`='$_POST[rcm_printing_note]',
	`rcm_dye_temp`='$_POST[rcm_dye_temp]',
	`rcm_dye_colorchange`='$_POST[rcm_dye_colorchange]',
	`rcm_dye_stainingface`='$_POST[rcm_dye_stainingface]',
	`rcm_dye_stainingback`='$_POST[rcm_dye_stainingback]',
	`rcm_dye_note`='$_POST[rcm_dye_note]',
	`rlight_rating1`='$_POST[rlight_rating1]',
	`rlight_rating2`='$_POST[rlight_rating2]',
	`rlight_note`='$_POST[rlight_note]',
	`rlight_pers_colorchange`='$_POST[rlight_pers_colorchange]',
	`rlight_pers_note`='$_POST[rlight_pers_note]',
	`rsaliva_staining`='$_POST[rsaliva_staining]',
	`rsaliva_note`='$_POST[rsaliva_note]',
	`rbleeding`='$_POST[rbleeding]',
	`rbleeding_note`='$_POST[rbleeding_note]',
	`rchlorin`='$_POST[rchlorin]',
	`rnchlorin1`='$_POST[rnchlorin1]',
	`rnchlorin2`='$_POST[rnchlorin2]',
	`rchlorin_note`='$_POST[rchlorin_note]',
	`rdye_tf_sstaining`='$_POST[rdye_tf_sstaining]',
	`rdye_tf_cstaining`='$_POST[rdye_tf_cstaining]',
	`rdye_tf_acetate`='$_POST[rdye_tf_acetate]',
	`rdye_tf_cotton`='$_POST[rdye_tf_cotton]',
	`rdye_tf_nylon`='$_POST[rdye_tf_nylon]',
	`rdye_tf_poly`='$_POST[rdye_tf_poly]',
	`rdye_tf_acrylic`='$_POST[rdye_tf_acrylic]',
	`rdye_tf_wool`='$_POST[rdye_tf_wool]',
	`rdye_tf_note`='$_POST[rdye_tf_note]',
	`tgl_update`=now()
	WHERE no_hanger='$nohanger'
	");
	if($sqlCLR){
	echo "<script>swal({
  title: 'colorfastness save',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='RandomhNew-$nohanger'; 
  }
});</script>";
	}
}else if($_POST['colorfastness_save']=="save"){
	$sqlCLR=mysqli_query($con,"INSERT INTO tbl_tq_randomtest SET
	`no_item`='$rcek2[no_item]',
	`no_hanger`='$_GET[no_hanger]',
	`rwash_temp`='$_POST[rwash_temp]',
	`rwash_colorchange`='$_POST[rwash_colorchange]',
	`rwash_acetate`='$_POST[rwash_acetate]',
	`rwash_cotton`='$_POST[rwash_cotton]',
	`rwash_nylon`='$_POST[rwash_nylon]',
	`rwash_poly`='$_POST[rwash_poly]',
	`rwash_acrylic`='$_POST[rwash_acrylic]',
	`rwash_wool`='$_POST[rwash_wool]',
	`rwash_staining`='$_POST[rwash_staining]',
	`rwash_note`='$_POST[rwash_note]',
	`rwater_colorchange`='$_POST[rwater_colorchange]',
	`rwater_acetate`='$_POST[rwater_acetate]',
	`rwater_cotton`='$_POST[rwater_cotton]',
	`rwater_nylon`='$_POST[rwater_nylon]',
	`rwater_poly`='$_POST[rwater_poly]',
	`rwater_acrylic`='$_POST[rwater_acrylic]',
	`rwater_wool`='$_POST[rwater_wool]',
	`rwater_staining`='$_POST[rwater_staining]',
	`rwater_note`='$_POST[rwater_note]',
	`racid_colorchange`='$_POST[racid_colorchange]',
	`racid_acetate`='$_POST[racid_acetate]',
	`racid_cotton`='$_POST[racid_cotton]',
	`racid_nylon`='$_POST[racid_nylon]',
	`racid_poly`='$_POST[racid_poly]',
	`racid_acrylic`='$_POST[racid_acrylic]',
	`racid_wool`='$_POST[racid_wool]',
	`racid_staining`='$_POST[racid_staining]',
	`racid_note`='$_POST[racid_note]',
	`ralkaline_colorchange`='$_POST[ralkaline_colorchange]',
	`ralkaline_acetate`='$_POST[ralkaline_acetate]',
	`ralkaline_cotton`='$_POST[ralkaline_cotton]',
	`ralkaline_nylon`='$_POST[ralkaline_nylon]',
	`ralkaline_poly`='$_POST[ralkaline_poly]',
	`ralkaline_acrylic`='$_POST[ralkaline_acrylic]',
	`ralkaline_wool`='$_POST[ralkaline_wool]',
	`ralkaline_staining`='$_POST[ralkaline_staining]',
	`ralkaline_note`='$_POST[ralkaline_note]',
	`rcrock_len1`='$_POST[rcrock_len1]',
	`rcrock_wid1`='$_POST[rcrock_wid1]',
	`rcrock_len2`='$_POST[rcrock_len2]',
	`rcrock_wid2`='$_POST[rcrock_wid2]',
	`rcrock_note`='$_POST[rcrock_note]',
	`rphenolic_colorchange`='$_POST[rphenolic_colorchange]',
	`rphenolic_note`='$_POST[rphenolic_note]',
	`rcm_printing_colorchange`='$_POST[rcm_printing_colorchange]',
	`rcm_printing_staining`='$_POST[rcm_printing_staining]',
	`rcm_printing_note`='$_POST[rcm_printing_note]',
	`rcm_dye_temp`='$_POST[rcm_dye_temp]',
	`rcm_dye_colorchange`='$_POST[rcm_dye_colorchange]',
	`rcm_dye_stainingface`='$_POST[rcm_dye_stainingface]',
	`rcm_dye_stainingback`='$_POST[rcm_dye_stainingback]',
	`rcm_dye_note`='$_POST[rcm_dye_note]',
	`rlight_rating1`='$_POST[rlight_rating1]',
	`rlight_rating2`='$_POST[rlight_rating2]',
	`rlight_note`='$_POST[rlight_note]',
	`rlight_pers_colorchange`='$_POST[rlight_pers_colorchange]',
	`rlight_pers_note`='$_POST[rlight_pers_note]',
	`rsaliva_staining`='$_POST[rsaliva_staining]',
	`rsaliva_note`='$_POST[rsaliva_note]',
	`rbleeding`='$_POST[rbleeding]',
	`rbleeding_note`='$_POST[rbleeding_note]',
	`rchlorin`='$_POST[rchlorin]',
	`rnchlorin1`='$_POST[rnchlorin1]',
	`rnchlorin2`='$_POST[rnchlorin2]',
	`rchlorin_note`='$_POST[rchlorin_note]',
	`rdye_tf_sstaining`='$_POST[rdye_tf_sstaining]',
	`rdye_tf_cstaining`='$_POST[rdye_tf_cstaining]',
	`rdye_tf_acetate`='$_POST[rdye_tf_acetate]',
	`rdye_tf_cotton`='$_POST[rdye_tf_cotton]',
	`rdye_tf_nylon`='$_POST[rdye_tf_nylon]',
	`rdye_tf_poly`='$_POST[rdye_tf_poly]',
	`rdye_tf_acrylic`='$_POST[rdye_tf_acrylic]',
	`rdye_tf_wool`='$_POST[rdye_tf_wool]',
	`rdye_tf_note`='$_POST[rdye_tf_note]',
	`tgl_buat`=now(),
	`tgl_update`=now()
	");
	if($sqlCLR){
		echo "<script>swal({
	  title: 'colorfastness save',   
	  text: 'Klik Ok untuk input data kembali',
	  type: 'success',
	  }).then((result) => {
	  if (result.value) {
		
		 window.location.href='RandomhNew-$nohanger'; 
	  }
	});</script>";
		}
}
if($_POST['functional_save']=="save" and $cekR>0 and $cekTR>0 and $cekTR2>0 and $cekRW>0){
	$sqlFPH=mysqli_query($con,"UPDATE tbl_tq_randomtest SET
	`rwick_l1` = '$_POST[rwick_l1]',
	`rwick_w1` = '$_POST[rwick_w1]',
	`rwick_l2` = '$_POST[rwick_l2]',
	`rwick_w2` = '$_POST[rwick_w2]',
	`rwick_l3` = '$_POST[rwick_l3]',
	`rwick_w3` = '$_POST[rwick_w3]',
	`rwick_l4` = '$_POST[rwick_l4]',
	`rwick_w4` = '$_POST[rwick_w4]',
	`rwick_note` = '$_POST[rwick_note]',
	`rabsor_f1` = '$_POST[rabsor_f1]',
	`rabsor_f2` = '$_POST[rabsor_f2]',
	`rabsor_f3` = '$_POST[rabsor_f3]',
	`rabsor_b1` = '$_POST[rabsor_b1]',
	`rabsor_b2` = '$_POST[rabsor_b2]',
	`rabsor_b3` = '$_POST[rabsor_b3]',
	`rabsor_note` = '$_POST[rabsor_note]',
	`rdry1` = '$_POST[rdry1]',
	`rdry2` = '$_POST[rdry2]',
	`rdry3` = '$_POST[rdry3]',
	`rdryaf1` = '$_POST[rdryaf1]',
	`rdryaf2` = '$_POST[rdryaf2]',
	`rdryaf3` = '$_POST[rdryaf3]',
	`rdry_note` = '$_POST[rdry_note]',
	`rrepp1` = '$_POST[rrepp1]',
	`rrepp2` = '$_POST[rrepp2]',
	`rrepp3` = '$_POST[rrepp3]',
	`rrepp4` = '$_POST[rrepp4]',
	`rrepp_note` = '$_POST[rrepp_note]',
	`rph` = '$_POST[rph]',
	`rph_note` = '$_POST[rph_note]',
	`rsoil` = '$_POST[rsoil]',
	`rsoil_note` = '$_POST[rsoil_note]',
	`tgl_update`=now()
    WHERE no_hanger='$nohanger'
	");
	if($sqlFPH){
		$sql_FPHWarna=mysqli_query($con,"UPDATE tbl_tq_random_warna SET
			`rwickw_ori` = '$_POST[rwickw_ori]',
			`rwickw_af` = '$_POST[rwickw_af]',
			`rabsorw_ori` = '$_POST[rabsorw_ori]',
			`rabsorw_af` = '$_POST[rabsorw_af]',
			`rdryw_ori` = '$_POST[rdryw_ori]',
			`rdryw_af` = '$_POST[rdryw_af]',
			`rreppw_ori` = '$_POST[rreppw_ori]',
			`rreppw_af` = '$_POST[rreppw_af]',
			`rphw` = '$_POST[rphw]',
			`rsoilw` = '$_POST[rsoilw]',
			`rhumidityw` = '$_POST[rhumidityw]',
			`tgl_update`=now()
			WHERE no_hanger='$nohanger'
			");
		if($_POST['sts_random']=="2"){
			$sql_tempFPH=mysqli_query($con,"UPDATE tbl_tq_temp_random SET
			 `temp_rwick_l2`='$_POST[rwick_l2]',
			 `temp_rwick_w2`='$_POST[rwick_w2]',
			 `temp_rabsor_b1`='$_POST[rabsor_b1]',
			 `temp_rdryaf1`='$_POST[rdryaf1]',
			 `sts`='1'
			 WHERE no_hanger='$nohanger'
			 ");

			$sql_tempFPH1=mysqli_query($con,"UPDATE tbl_tq_temp_random2 SET
			`sts`='2'
			WHERE no_hanger='$nohanger'");
			}else if($_POST['sts_random2']=="2"){
			$sql_tempFPH=mysqli_query($con,"UPDATE tbl_tq_temp_random2 SET
			 `temp_rwick_l2`='$_POST[rwick_l2]',
			 `temp_rwick_w2`='$_POST[rwick_w2]',
			 `temp_rabsor_b1`='$_POST[rabsor_b1]',
			 `temp_rdryaf1`='$_POST[rdryaf1]',
			 `sts`='1'
			 WHERE no_hanger='$nohanger'
			 ");

			$sql_tempFPH1=mysqli_query($con,"UPDATE tbl_tq_temp_random SET
			`sts`='2'
			WHERE no_hanger='$nohanger'");
			}
	echo "<script>swal({
  title: 'functional save',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='RandomhNew-$nohanger'; 
  }
});</script>";
	}
}else if($_POST['functional_save']=="save" and $cekR>0 and $cekTR>0 and $cekTR2>0 and $cekRW==0){
	$sqlFPH=mysqli_query($con,"UPDATE tbl_tq_randomtest SET
	`rwick_l1` = '$_POST[rwick_l1]',
	`rwick_w1` = '$_POST[rwick_w1]',
	`rwick_l2` = '$_POST[rwick_l2]',
	`rwick_w2` = '$_POST[rwick_w2]',
	`rwick_l3` = '$_POST[rwick_l3]',
	`rwick_w3` = '$_POST[rwick_w3]',
	`rwick_l4` = '$_POST[rwick_l4]',
	`rwick_w4` = '$_POST[rwick_w4]',
	`rwick_note` = '$_POST[rwick_note]',
	`rabsor_f1` = '$_POST[rabsor_f1]',
	`rabsor_f2` = '$_POST[rabsor_f2]',
	`rabsor_f3` = '$_POST[rabsor_f3]',
	`rabsor_b1` = '$_POST[rabsor_b1]',
	`rabsor_b2` = '$_POST[rabsor_b2]',
	`rabsor_b3` = '$_POST[rabsor_b3]',
	`rabsor_note` = '$_POST[rabsor_note]',
	`rdry1` = '$_POST[rdry1]',
	`rdry2` = '$_POST[rdry2]',
	`rdry3` = '$_POST[rdry3]',
	`rdryaf1` = '$_POST[rdryaf1]',
	`rdryaf2` = '$_POST[rdryaf2]',
	`rdryaf3` = '$_POST[rdryaf3]',
	`rdry_note` = '$_POST[rdry_note]',
	`rrepp1` = '$_POST[rrepp1]',
	`rrepp2` = '$_POST[rrepp2]',
	`rrepp3` = '$_POST[rrepp3]',
	`rrepp4` = '$_POST[rrepp4]',
	`rrepp_note` = '$_POST[rrepp_note]',
	`rph` = '$_POST[rph]',
	`rph_note` = '$_POST[rph_note]',
	`rsoil` = '$_POST[rsoil]',
	`rsoil_note` = '$_POST[rsoil_note]',
	`tgl_update`=now()
    WHERE no_hanger='$nohanger'
	");
	if($sqlFPH){
		$sql_FPHWarna=mysqli_query($con,"INSERT INTO tbl_tq_random_warna SET
			`no_item`='$rcek2[no_item]',
			`no_hanger`='$_GET[no_hanger]',
			`rwickw_ori` = '$_POST[rwickw_ori]',
			`rwickw_af` = '$_POST[rwickw_af]',
			`rabsorw_ori` = '$_POST[rabsorw_ori]',
			`rabsorw_af` = '$_POST[rabsorw_af]',
			`rdryw_ori` = '$_POST[rdryw_ori]',
			`rdryw_af` = '$_POST[rdryw_af]',
			`rreppw_ori` = '$_POST[rreppw_ori]',
			`rreppw_af` = '$_POST[rreppw_af]',
			`rphw` = '$_POST[rphw]',
			`rsoilw` = '$_POST[rsoilw]',
			`rhumidityw` = '$_POST[rhumidityw]',
			`tgl_buat`=now(),
			`tgl_update`=now()
			");
		if($_POST['sts_random']=="2"){
			$sql_tempFPH=mysqli_query($con,"UPDATE tbl_tq_temp_random SET
			 `temp_rwick_l2`='$_POST[rwick_l2]',
			 `temp_rwick_w2`='$_POST[rwick_w2]',
			 `temp_rabsor_b1`='$_POST[rabsor_b1]',
			 `temp_rdryaf1`='$_POST[rdryaf1]',
			 `sts`='1'
			 WHERE no_hanger='$nohanger'
			 ");

			$sql_tempFPH1=mysqli_query($con,"UPDATE tbl_tq_temp_random2 SET
			`sts`='2'
			WHERE no_hanger='$nohanger'");
			}else if($_POST['sts_random2	']=="2"){
			$sql_tempFPH=mysqli_query($con,"UPDATE tbl_tq_temp_random2 SET
			 `temp_rwick_l2`='$_POST[rwick_l2]',
			 `temp_rwick_w2`='$_POST[rwick_w2]',
			 `temp_rabsor_b1`='$_POST[rabsor_b1]',
			 `temp_rdryaf1`='$_POST[rdryaf1]',
			 `sts`='1'
			 WHERE no_hanger='$nohanger'
			 ");

			$sql_tempFPH1=mysqli_query($con,"UPDATE tbl_tq_temp_random SET
			`sts`='2'
			WHERE no_hanger='$nohanger'");
			}
	echo "<script>swal({
  title: 'functional save',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='RandomhNew-$nohanger'; 
  }
});</script>";
}
}else if($_POST['functional_save']=="save" and $cekR>0 and $cekTR==0 and $cekTR2==0 and $cekRW==0){
	$sqlFPH=mysqli_query($con,"UPDATE tbl_tq_randomtest SET
	`rwick_l1` = '$_POST[rwick_l1]',
	`rwick_w1` = '$_POST[rwick_w1]',
	`rwick_l2` = '$_POST[rwick_l2]',
	`rwick_w2` = '$_POST[rwick_w2]',
	`rwick_l3` = '$_POST[rwick_l3]',
	`rwick_w3` = '$_POST[rwick_w3]',
	`rwick_l4` = '$_POST[rwick_l4]',
	`rwick_w4` = '$_POST[rwick_w4]',
	`rwick_note` = '$_POST[rwick_note]',
	`rabsor_f1` = '$_POST[rabsor_f1]',
	`rabsor_f2` = '$_POST[rabsor_f2]',
	`rabsor_f3` = '$_POST[rabsor_f3]',
	`rabsor_b1` = '$_POST[rabsor_b1]',
	`rabsor_b2` = '$_POST[rabsor_b2]',
	`rabsor_b3` = '$_POST[rabsor_b3]',
	`rabsor_note` = '$_POST[rabsor_note]',
	`rdry1` = '$_POST[rdry1]',
	`rdry2` = '$_POST[rdry2]',
	`rdry3` = '$_POST[rdry3]',
	`rdryaf1` = '$_POST[rdryaf1]',
	`rdryaf2` = '$_POST[rdryaf2]',
	`rdryaf3` = '$_POST[rdryaf3]',
	`rdry_note` = '$_POST[rdry_note]',
	`rrepp1` = '$_POST[rrepp1]',
	`rrepp2` = '$_POST[rrepp2]',
	`rrepp3` = '$_POST[rrepp3]',
	`rrepp4` = '$_POST[rrepp4]',
	`rrepp_note` = '$_POST[rrepp_note]',
	`rph` = '$_POST[rph]',
	`rph_note` = '$_POST[rph_note]',
	`rsoil` = '$_POST[rsoil]',
	`rsoil_note` = '$_POST[rsoil_note]',
	`rhumidity` = '$_POST[rhumidity]',
	`rhumidity_note` = '$_POST[rhumidity_note]',
	`tgl_update`=now()
    WHERE no_hanger='$nohanger'
	");
	if($sqlFPH){
		$sql_FPHWarna=mysqli_query($con,"INSERT INTO tbl_tq_random_warna SET
		`no_item`='$rcek2[no_item]',
		`no_hanger`='$_GET[no_hanger]',
		`rwickw_ori` = '$_POST[rwickw_ori]',
		`rwickw_af` = '$_POST[rwickw_af]',
		`rabsorw_ori` = '$_POST[rabsorw_ori]',
		`rabsorw_af` = '$_POST[rabsorw_af]',
		`rdryw_ori` = '$_POST[rdryw_ori]',
		`rdryw_af` = '$_POST[rdryw_af]',
		`rreppw_ori` = '$_POST[rreppw_ori]',
		`rreppw_af` = '$_POST[rreppw_af]',
		`rphw` = '$_POST[rphw]',
		`rsoilw` = '$_POST[rsoilw]',
		`rhumidityw` = '$_POST[rhumidityw]',
		`tgl_buat`=now(),
		`tgl_update`=now()
		");
		$sql_tempFPH=mysqli_query($con,"INSERT INTO tbl_tq_temp_random SET
		 `no_item`='$rcek2[no_item]',
		 `no_hanger`='$_GET[no_hanger]',
		 `temp_rwick_l2`='$_POST[rwick_l2]',
		 `temp_rwick_w2`='$_POST[rwick_w2]',
		 `temp_rabsor_b1`='$_POST[rabsor_b1]',
		 `temp_rdryaf1`='$_POST[rdryaf1]',
		 `sts`='1',
		 `tgl_buat`=now(),
		 `tgl_update`=now()
		 ");
		$sql_tempFPH1=mysqli_query($con,"INSERT INTO tbl_tq_temp_random2 SET
		`no_item`='$rcek2[no_item]',
		`no_hanger`='$_GET[no_hanger]',
		`temp_rwick_l2`='$_POST[rwick_l2]',
		`temp_rwick_w2`='$_POST[rwick_w2]',
		`temp_rabsor_b1`='$_POST[rabsor_b1]',
		`temp_rdryaf1`='$_POST[rdryaf1]',
		`sts`='2',
		`tgl_buat`=now(),
		`tgl_update`=now()
		");
	echo "<script>swal({
  title: 'functional save',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='RandomhNew-$nohanger'; 
  }
});</script>";
	}
}else if($_POST['functional_save']=="save"){
	$sqlFPH=mysqli_query($con,"INSERT tbl_tq_randomtest SET
	`no_item`='$rcek2[no_item]',
	`no_hanger`='$_GET[no_hanger]',
	`rwick_l1` = '$_POST[rwick_l1]',
	`rwick_w1` = '$_POST[rwick_w1]',
	`rwick_l2` = '$_POST[rwick_l2]',
	`rwick_w2` = '$_POST[rwick_w2]',
	`rwick_l3` = '$_POST[rwick_l3]',
	`rwick_w3` = '$_POST[rwick_w3]',
	`rwick_l4` = '$_POST[rwick_l4]',
	`rwick_w4` = '$_POST[rwick_w4]',
	`rwick_note` = '$_POST[rwick_note]',
	`rabsor_f1` = '$_POST[rabsor_f1]',
	`rabsor_f2` = '$_POST[rabsor_f2]',
	`rabsor_f3` = '$_POST[rabsor_f3]',
	`rabsor_b1` = '$_POST[rabsor_b1]',
	`rabsor_b2` = '$_POST[rabsor_b2]',
	`rabsor_b3` = '$_POST[rabsor_b3]',
	`rabsor_note` = '$_POST[rabsor_note]',
	`rdry1` = '$_POST[rdry1]',
	`rdry2` = '$_POST[rdry2]',
	`rdry3` = '$_POST[rdry3]',
	`rdryaf1` = '$_POST[rdryaf1]',
	`rdryaf2` = '$_POST[rdryaf2]',
	`rdryaf3` = '$_POST[rdryaf3]',
	`rdry_note` = '$_POST[rdry_note]',
	`rrepp1` = '$_POST[rrepp1]',
	`rrepp2` = '$_POST[rrepp2]',
	`rrepp3` = '$_POST[rrepp3]',
	`rrepp4` = '$_POST[rrepp4]',
	`rrepp_note` = '$_POST[rrepp_note]',
	`rph` = '$_POST[rph]',
	`rph_note` = '$_POST[rph_note]',
	`rsoil` = '$_POST[rsoil]',
	`rsoil_note` = '$_POST[rsoil_note]',
	`rhumidity` = '$_POST[rhumidity]',
	`rhumidity_note` = '$_POST[rhumidity_note]',
	`tgl_buat`=now(),
	`tgl_update`=now()    
	");
	if($sqlFPH){
		$sql_FPHWarna=mysqli_query($con,"INSERT INTO tbl_tq_random_warna SET
		`no_item`='$rcek2[no_item]',
		`no_hanger`='$_GET[no_hanger]',
		`rwickw_ori` = '$_POST[rwickw_ori]',
		`rwickw_af` = '$_POST[rwickw_af]',
		`rabsorw_ori` = '$_POST[rabsorw_ori]',
		`rabsorw_af` = '$_POST[rabsorw_af]',
		`rdryw_ori` = '$_POST[rdryw_ori]',
		`rdryw_af` = '$_POST[rdryw_af]',
		`rreppw_ori` = '$_POST[rreppw_ori]',
		`rreppw_af` = '$_POST[rreppw_af]',
		`rphw` = '$_POST[rphw]',
		`rsoilw` = '$_POST[rsoilw]',
		`rhumidityw` = '$_POST[rhumidityw]',
		`tgl_buat`=now(),
		`tgl_update`=now()
		");
		$sql_tempFPH=mysqli_query($con,"INSERT INTO tbl_tq_temp_random SET
		 `no_item`='$rcek2[no_item]',
		 `no_hanger`='$_GET[no_hanger]',
		 `temp_rwick_l2`='$_POST[rwick_l2]',
		 `temp_rwick_w2`='$_POST[rwick_w2]',
		 `temp_rabsor_b1`='$_POST[rabsor_b1]',
		 `temp_rdryaf1`='$_POST[rdryaf1]',
		 `sts`='1',
		 `tgl_buat`=now(),
		 `tgl_update`=now()
		 ");
		$sql_tempFPH1=mysqli_query($con,"INSERT INTO tbl_tq_temp_random2 SET
		`no_item`='$rcek2[no_item]',
		`no_hanger`='$_GET[no_hanger]',
		`temp_rwick_l2`='$_POST[rwick_l2]',
		`temp_rwick_w2`='$_POST[rwick_w2]',
		`temp_rabsor_b1`='$_POST[rabsor_b1]',
		`temp_rdryaf1`='$_POST[rdryaf1]',
		`sts`='2',
		`tgl_buat`=now(),
		`tgl_update`=now()
		");
	echo "<script>swal({
  title: 'functional save',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='RandomhNew-$nohanger'; 
  }
});</script>";
	}
}
if($nodemand!="" and $cek2==0){
	 echo "<script>swal({
  title: 'No Item Tidak Ditemukan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'info',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='RandomhNew'; 
  }
});</script>";
}
?>
