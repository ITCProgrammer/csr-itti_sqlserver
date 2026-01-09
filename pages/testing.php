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
	var cott=document.forms['form1']['fc_cott'].value;
	var poly=document.forms['form1']['fc_poly'].value;
	var elastane=document.forms['form1']['fc_ela'].value;
	var total;
	    if(cott>0){cott=document.forms['form1']['fc_cott'].value;}else{ cott=0;}
		if(poly>0){poly=document.forms['form1']['fc_poly'].value;}else{ poly=0;}
		if(elastane>0){elastane=document.forms['form1']['fc_ela'].value;}else{elastane=0;}
		total=roundToTwo((parseFloat(cott)+parseFloat(poly)+parseFloat(elastane))).toFixed(2);
		document.forms['form1']['fc_total'].value=total;
}

</script>
<script>
	function tampil(){
	if(document.forms['form1']['jns_test'].value=="1"){
		$("#fla1").css("display", "");  // To unhide
	}else{
		$("#fla1").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="2"){
		$("#fib2").css("display", "");  // To unhide
	}else{
		$("#fib2").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="3"){
		$("#fc3").css("display", "");  // To unhide
	}else{
		$("#fc3").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="7"){
		$("#fc4").css("display", "");  // To unhide 4
	}else{
		$("#fc4").css("display", "none");  // To hide
	}	
	if(document.forms['form1']['jns_test'].value=="7"){
		$("#fc5").css("display", "");  // To unhide 5
	}else{
		$("#fc5").css("display", "none");  // To hide
	}	
	if(document.forms['form1']['jns_test'].value=="6"){
		$("#fc6").css("display", "");  // To unhide
	}else{
		$("#fc6").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="7"){
		$("#fc7").css("display", "");  // To unhide
	}else{
		$("#fc7").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="8"){
		$("#fc8").css("display", "");  // To unhide
	}else{
		$("#fc8").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="9"){
		$("#fc9").css("display", "");  // To unhide
	}else{
		$("#fc9").css("display", "none");  // To hide
	}	
	if(document.forms['form1']['jns_test'].value=="10"){
		$("#fc10").css("display", "");  // To unhide
	}else{
		$("#fc10").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="11"){
		$("#fc11").css("display", "");  // To unhide
	}else{
		$("#fc11").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="12"){
		$("#fc12").css("display", "");  // To unhide
	}else{
		$("#fc12").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="13"){
		$("#fc13").css("display", "");  // To unhide
	}else{
		$("#fc13").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="14"){
		$("#fc14").css("display", "");  // To unhide
	}else{
		$("#fc14").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="15"){
		$("#fc15").css("display", "");  // To unhide
	}else{
		$("#fc15").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="16"){
		$("#fc16").css("display", "");  // To unhide
	}else{
		$("#fc16").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="17"){
		$("#fc17").css("display", "");  // To unhide
	}else{
		$("#fc17").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="17"){
		$("#fc18").css("display", "");  // To unhide 18
	}else{
		$("#fc18").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="19"){
		$("#fc19").css("display", "");  // To unhide
	}else{
		$("#fc19").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="20"){
		$("#fc20").css("display", "");  // To unhide
	}else{
		$("#fc20").css("display", "none");  // To hide
	}	
}
function tampil1(){
	if(document.forms['form3']['jns_test1'].value=="1"){
		$("#f1").css("display", "");  // To unhide
	}else{
		$("#f1").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="2"){
		$("#f2").css("display", "");  // To unhide
	}else{
		$("#f2").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="3"){
		$("#f3").css("display", "");  // To unhide
	}else{
		$("#f3").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="4"){
		$("#f4").css("display", "");  // To unhide
	}else{
		$("#f4").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="5"){
		$("#f5").css("display", "");  // To unhide
	}else{
		$("#f5").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="6"){
		$("#f6").css("display", "");  // To unhide
	}else{
		$("#f6").css("display", "none");  // To hide
	}
}
</script>
<?php
$nokk=$_GET[nokk];

$sqlCek=mysql_query("SELECT * FROM tbl_tq_nokk WHERE nokk='$nokk' ORDER BY id DESC LIMIT 1");
$cek=mysql_num_rows($sqlCek);
$rcek=mysql_fetch_array($sqlCek);
?>	
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
 <div class="box box-info">
   <div class="box-header with-border">
    <h3 class="box-title">Testing Kartu Kerja</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body"> 
	 <div class="col-md-6"> 
      <div class="form-group">
                  <label for="no_po" class="col-sm-3 control-label">No KK</label>
                  <div class="col-sm-4">
				  <input name="nokk" type="text" class="form-control" id="nokk" 
                     onchange="window.location='Testing-'+this.value" value="<?php echo $_GET[nokk];?>" placeholder="No KK" required >
		  </div>
                </div>
	           <div class="form-group">
                  <label for="no_order" class="col-sm-3 control-label">No Order</label>
                  <div class="col-sm-4">
                    <input name="no_order" type="text" class="form-control" id="no_order" placeholder="No Order" 
                    value="<?php if($cek>0){echo $rcek[no_order];}else{echo $r[NoOrder];} ?>" readonly="readonly">
                  </div>				   
                </div>
		 	   <div class="form-group">
                  <label for="no_po" class="col-sm-3 control-label">Pelanggan</label>
                  <div class="col-sm-8">
                    <input name="pelanggan" type="text" class="form-control" id="no_po" placeholder="Pelanggan" 
                    value="<?php if($cek>0){echo $rcek[pelanggan];}else if($r1[partnername]!=""){echo $pelanggan;}else{}?>" readonly="readonly" >
                  </div>				   
                </div>
	           <div class="form-group">
                  <label for="no_po" class="col-sm-3 control-label">PO</label>
                  <div class="col-sm-5">
                    <input name="no_po" type="text" class="form-control" id="no_po" placeholder="PO" 
                    value="<?php if($cek>0){echo $rcek[no_po];}else{echo $r[PONumber];} ?>" readonly="readonly" >
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
                  <div class="col-sm-3">
                    <input name="no_hanger" type="text" class="form-control" id="no_hanger" placeholder="No Hanger" 
                    value="<?php if($cek>0){echo $rcek[no_hanger];}else{echo $r[HangerNo];}?>" readonly="readonly">  
                  </div>
				  <div class="col-sm-3">
				  <input name="no_item" type="text" class="form-control" id="no_item" placeholder="No Item" 
                    value="<?php if($rcek[no_item]!=""){echo $rcek[no_item];}else{echo $r[ProductCode];}?>" readonly="readonly">
				  </div>	
                </div>
	            <div class="form-group">
                  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
                  <div class="col-sm-8">
					  <textarea name="jns_kain" readonly="readonly" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cek>0){echo $rcek[jenis_kain];}else{echo $r[ProductDesc];}?></textarea>
					  </div>
                  </div>	 		
		 		
	  </div>
	  		<!-- col --> 
	  <div class="col-md-6">		  
		 		<div class="form-group">
                  <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
                  <div class="col-sm-2">
                    <input name="lebar" type="text" required class="form-control" id="lebar" placeholder="0" 
                    value="<?php if($cek>0){echo $rcek[lebar];}else{echo round($r[Lebar]);} ?>" readonly="readonly">
                  </div>
				  <div class="col-sm-2">
                    <input name="grms" type="text" required class="form-control" id="grms" placeholder="0" 
                    value="<?php if($cek>0){echo $rcek[gramasi];}else{echo round($r[Gramasi]);} ?>" readonly="readonly">
                  </div>		
                </div>
		 		<div class="form-group">
                  <label for="warna" class="col-sm-3 control-label">Warna</label>
                  <div class="col-sm-8">
                    <textarea name="warna" readonly="readonly" class="form-control" id="warna" placeholder="Warna"><?php if($cek>0){echo $rcek[warna];}else{echo $r[Color];}?></textarea>
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
                  <div class="col-sm-8">
                    <textarea name="no_warna" readonly="readonly" class="form-control" id="no_warna" placeholder="No Warna"><?php if($cek>0){echo $rcek[no_warna];}else{echo $r[ColorNo];}?></textarea>
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="lot" class="col-sm-3 control-label">Lot</label>
                  <div class="col-sm-2">
                    <input name="lot" type="text" class="form-control" id="lot" placeholder="Lot" 
                    value="<?php if($cek>0){echo $rcek[lot];}else{echo $lotno;} ?>" readonly="readonly" >
                  </div>				   
                </div>
		  		<div class="form-group">
                  <label for="suhu" class="col-sm-3 control-label">Suhu</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="suhu" type="text" class="form-control" id="suhu" placeholder="Suhu" 
                    value="<?php if($cek>0){echo $rcek[suhu];}else{} ?>" readonly="readonly" >
					<span class="input-group-addon">&deg;C</span>	
					</div>  
                  </div>				   
                </div>
		  		<div class="form-group">
		  <label for="no_test" class="col-sm-3 control-label">No Test</label>
		  <div class="col-sm-2">
			<input name="no_test" type="text" class="form-control" id="no_test" placeholder="No Test" autocomplete="off" 
			value="<?php if($cek>0){echo $rcek[no_test];} ?>" readonly="readonly" >
		  </div>				   
		</div>
	 </div>
	
</div>	 
   <div class="box-footer"> 

   </div>
    <!-- /.box-footer -->
  




</div>
</form>
<?php 
$sqlCek1=mysql_query("SELECT *,
	CONCAT_WS(' ',fc_note,ph_note, abr_note, bas_note, dry_note, fla_note, fwe_note, fwi_note, burs_note,repp_note,wick_note,wick_note,absor_note,apper_note,fiber_note,pillb_note,pillm_note,pillr_note,thick_note,growth_note,recover_note,stretch_note,sns_note,snab_note,snam_note,snap_note,phenolic_note) AS note_g FROM tbl_tq_test WHERE id_nokk='$rcek[id]' ORDER BY id DESC LIMIT 1");
$cek1=mysql_num_rows($sqlCek1);
$rcek1=mysql_fetch_array($sqlCek1);
?>
<?php if($cek>0){ ?>
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
			  <option value="">Pilih</option>	  
			  <option value="1">FLAMABILITY</option>
			  <option value="2">FIBER CONTENT</option>
			  <option value="3">FABRIC COUNT</option>
			  <!--	  
			  <option value="4">FABRIC WEIGHT</option>
			  <option value="5">FABRIC WIDTH</option>
              -->
			  <option value="6">BOW &amp; SKEW</option>
			  <option value="7">FABRIC WEIGHT &amp; SHRINKAGE &amp; SPIRALITY</option>
			  <option value="8">PILLING MARTINDLE</option>
			  <option value="9">PILLING BOX</option>
			  <option value="10">PILLING RANDOM TUMBLER</option>
			  <option value="11">ABRATION</option>
			  <option value="12">SNAGGING MACE</option>
			  <option value="13">SNAGGING POD</option>
			  <option value="14">SNAGGING BOX</option>	  
			  <option value="15">BURSTING STRENGTH</option>
			  <option value="16">THICKNESS</option>
			  <option value="17">STRETCH &amp; RECOVERY</option>
			  <!--<option value="18">RECOVERY</option>-->
			  <option value="19">GROWTH</option>
			  <option value="20">APPERANCE</option>	  
			  </select>
		  </div>
    </div>	
	<div class="form-group" id="fla1" style="display:none;">
          <label for="flamability" class="col-sm-2 control-label">FLAMABILITY</label>
          <div class="col-sm-2">
			  <input name="flamability" type="text" class="form-control" id="flamability" value="<?php echo $rcek1[flamability];?>" placeholder="FLAMABILITY">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="fla_note" maxlength="50" rows="1"><?php echo $rcek1[fla_note];?></textarea>
		  </div>
		
    </div>
	<div class="form-group" id="fib2" style="display:none;">
          <label for="fibercontent" class="col-sm-2 control-label">FIBER CONTENT</label>
          <div class="col-sm-2">
			 <div class="input-group"> 
			  <input name="fc_cott" type="text" class="form-control" id="fc_cott" value="<?php echo $rcek1[fc_cott];?>" placeholder="COTT/MODAL/RAYON" onChange="hitung();" onBlur="hitung();" style="text-align: right;">
			  <span class="input-group-addon">&#37;</span>	
			</div>	
		  </div>
		  <div class="col-sm-2">
			  <div class="input-group">
			  <input name="fc_poly" type="text" class="form-control" id="fc_poly" value="<?php echo $rcek1[fc_poly];?>" placeholder="POLYESTER" onChange="hitung();" onBlur="hitung();" style="text-align: right;">
			  <span class="input-group-addon">&#37;</span>	
			</div>
		  </div>
		  <div class="col-sm-2">
			  <div class="input-group">
			  <input name="fc_ela" type="text" class="form-control" id="fc_ela" value="<?php echo $rcek1[fc_elastane];?>" placeholder="ELASTANE" onChange="hitung();" onBlur="hitung();" style="text-align: right;">
			  <span class="input-group-addon">&#37;</span>	
			</div>
		  </div>
		  <div class="col-sm-2">
			  <div class="input-group">
			  <input name="fc_total" class="form-control" id="fc_total" value="" placeholder="TOTAL" style="text-align: right;" type="number" min="100" max="100">
			  <span class="input-group-addon">&#37;</span>	
			</div>
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="fiber_note" maxlength="50" rows="1"><?php echo $rcek1[fiber_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc3" style="display:none;">
          <label for="fabric_count" class="col-sm-2 control-label">FABRIC COUNT</label>
          <div class="col-sm-2">
			  <input name="wpi" type="text" class="form-control" id="wpi" value="<?php echo $rcek1[fc_wpi];?>" placeholder="WPI">
		  </div>
		  <div class="col-sm-2">
			  <input name="cpi" type="text" class="form-control" id="cpi" value="<?php echo $rcek1[fc_cpi];?>" placeholder="CPI">
		  </div>
		 <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="fc_note" maxlength="50" rows="1"><?php echo $rcek1[fc_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc4" style="display:none;">
          <label for="fabric_weight" class="col-sm-2 control-label">FABRIC WEIGHT</label>
          <div class="col-sm-2">
			  <input name="fabric_weight" type="text" class="form-control" id="fabric_weight" value="<?php echo $rcek1[f_weight];?>" placeholder="FABRIC WEIGHT">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="fwe_note" maxlength="50" rows="1"><?php echo $rcek1[fwe_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc5" style="display:none;">
          <label for="fabric_width" class="col-sm-2 control-label">FABRIC WIDTH</label>
          <div class="col-sm-2">
			  <input name="fabric_width" type="text" class="form-control" id="fabric_width" value="<?php echo $rcek1[f_width];?>" placeholder="FABRIC WIDTH">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="fwi_note" maxlength="50" rows="1"><?php echo $rcek1[fwi_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc6" style="display:none;">
          <label for="bow_skew" class="col-sm-2 control-label">BOW &amp; SKEW</label>
          <div class="col-sm-2">
			  <input name="bow" type="text" class="form-control" id="bow" value="<?php echo $rcek1[bow];?>" placeholder="BOW">
		  </div>
		  <div class="col-sm-2">
			  <input name="skew" type="text" class="form-control" id="skew" value="<?php echo $rcek1[skew];?>" placeholder="SKEW">
		  </div>
		<div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="bas_note" maxlength="50" rows="1"><?php echo $rcek1[bas_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc7" style="display:none;">
          <label for="shrinkage_len" class="col-sm-2 control-label">SHRINKAGE &amp; SPIRALITY</label>
          <div class="col-sm-1">
			  <input name="shrinkage_len1" type="text" class="form-control" id="shrinkage_len1" value="<?php echo $rcek1[shrinkage_l1];?>" placeholder="LEN 1">
			  <input name="shrinkage_wid1" type="text" class="form-control" id="shrinkage_wid1" value="<?php echo $rcek1[shrinkage_w1];?>" placeholder="WID 1">
			  <input name="spirality1" type="text" class="form-control" id="spirality1" value="<?php echo $rcek1[spirality1];?>" placeholder="SPI 1">
		  </div>
		  <div class="col-sm-1">
			  <input name="shrinkage_len2" type="text" class="form-control" id="shrinkage_len2" value="<?php echo $rcek1[shrinkage_l2];?>" placeholder="LEN 2">
			  <input name="shrinkage_wid2" type="text" class="form-control" id="shrinkage_wid2" value="<?php echo $rcek1[shrinkage_w2];?>" placeholder="WID 2">
			  <input name="spirality2" type="text" class="form-control" id="spirality2" value="<?php echo $rcek1[spirality2];?>" placeholder="SPI 2">
		  </div>
		  <div class="col-sm-1">
			  <input name="shrinkage_len3" type="text" class="form-control" id="shrinkage_len3" value="<?php echo $rcek1[shrinkage_l3];?>" placeholder="LEN 3">
			  <input name="shrinkage_wid3" type="text" class="form-control" id="shrinkage_wid3" value="<?php echo $rcek1[shrinkage_w3];?>" placeholder="WID 3">
			  <input name="spirality3" type="text" class="form-control" id="spirality3" value="<?php echo $rcek1[spirality3];?>" placeholder="SPI 3">
		  </div>
		  <div class="col-sm-1">
			  <input name="shrinkage_len4" type="text" class="form-control" id="shrinkage_len4" value="<?php echo $rcek1[shrinkage_l4];?>" placeholder="LEN 4">
			  <input name="shrinkage_wid4" type="text" class="form-control" id="shrinkage_wid4" value="<?php echo $rcek1[shrinkage_w4];?>" placeholder="WID 4">
			  <input name="spirality4" type="text" class="form-control" id="spirality4" value="<?php echo $rcek1[spirality4];?>" placeholder="SPI 4">
		  </div>
		  <div class="col-sm-1">
			  <input name="shrinkage_len5" type="text" class="form-control" id="shrinkage_len5" value="<?php echo $rcek1[shrinkage_l5];?>" placeholder="LEN 5">
			  <input name="shrinkage_wid5" type="text" class="form-control" id="shrinkage_wid5" value="<?php echo $rcek1[shrinkage_w5];?>" placeholder="WID 5">
			  <input name="spirality5" type="text" class="form-control" id="spirality5" value="<?php echo $rcek1[spirality5];?>" placeholder="SPI 5">
		  </div>
		  <div class="col-sm-1">
			  <input name="shrinkage_len6" type="text" class="form-control" id="shrinkage_len6" value="<?php echo $rcek1[shrinkage_l6];?>" placeholder="LEN 6">
			  <input name="shrinkage_wid6" type="text" class="form-control" id="shrinkage_wid6" value="<?php echo $rcek1[shrinkage_w6];?>" placeholder="WID 6">
			  <input name="spirality6" type="text" class="form-control" id="spirality6" value="<?php echo $rcek1[spirality6];?>" placeholder="SPI 6">
		  </div>
		  
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="sns_note" maxlength="50" rows="3"><?php echo $rcek1[sns_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc8" style="display:none;">
          <label for="pillingm" class="col-sm-2 control-label">PILLING MARTINDLE</label>
          <div class="col-sm-1">
			  <input name="pillingm_f1" type="text" class="form-control" id="pillingm_f1" value="<?php echo $rcek1[pm_f1];?>" placeholder="FACE 1">
			  <input name="pillingm_b1" type="text" class="form-control" id="pillingm_b1" value="<?php echo $rcek1[pm_b1];?>" placeholder="BACK 1">
		  </div>
		  <div class="col-sm-1">
			  <input name="pillingm_f2" type="text" class="form-control" id="pillingm_f2" value="<?php echo $rcek1[pm_f2];?>" placeholder="FACE 2">
			  <input name="pillingm_b2" type="text" class="form-control" id="pillingm_b2" value="<?php echo $rcek1[pm_b2];?>" placeholder="BACK 2">
		  </div>
		  <div class="col-sm-1">
			  <input name="pillingm_f3" type="text" class="form-control" id="pillingm_f3" value="<?php echo $rcek1[pm_f3];?>" placeholder="FACE 3">
			  <input name="pillingm_b3" type="text" class="form-control" id="pillingm_b3" value="<?php echo $rcek1[pm_b3];?>" placeholder="BACK 3">
		  </div>
		  <div class="col-sm-1">
			  <input name="pillingm_f4" type="text" class="form-control" id="pillingm_f4" value="<?php echo $rcek1[pm_f4];?>" placeholder="FACE 4">
			  <input name="pillingm_b4" type="text" class="form-control" id="pillingm_b4" value="<?php echo $rcek1[pm_b4];?>" placeholder="BACK 4">
		  </div>
		  <div class="col-sm-1">
			  <input name="pillingm_f5" type="text" class="form-control" id="pillingm_f5" value="<?php echo $rcek1[pm_f5];?>" placeholder="FACE 5">
			  <input name="pillingm_b5" type="text" class="form-control" id="pillingm_b5" value="<?php echo $rcek1[pm_b5];?>" placeholder="BACK 5">
		  </div>	
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="pillm_note" maxlength="50"><?php echo $rcek1[pillm_note];?></textarea>
		  </div>	
	</div>
	<div class="form-group" id="fc9" style="display:none;">
          <label for="pillingb" class="col-sm-2 control-label">PILLING BOX</label>
          <div class="col-sm-1">
			  <input name="pillingb_f1" type="text" class="form-control" id="pillingb_f1" value="<?php echo $rcek1[pb_f1];?>" placeholder="FACE 1">
			  <input name="pillingb_b1" type="text" class="form-control" id="pillingb_b1" value="<?php echo $rcek1[pb_b1];?>" placeholder="BACK 1">
		  </div>
		<!--
		  <div class="col-sm-1">
			  <input name="pillingb_f2" type="text" class="form-control" id="pillingb_f2" value="<?php echo $rcek1[pb_f2];?>" placeholder="FACE 2">
			  <input name="pillingb_b2" type="text" class="form-control" id="pillingb_b2" value="<?php echo $rcek1[pb_b2];?>" placeholder="BACK 2">
		  </div>
		  <div class="col-sm-1">
			  <input name="pillingb_f3" type="text" class="form-control" id="pillingb_f3" value="<?php echo $rcek1[pb_f3];?>" placeholder="FACE 3">
			  <input name="pillingb_b3" type="text" class="form-control" id="pillingb_b3" value="<?php echo $rcek1[pb_b3];?>" placeholder="BACK 3">
		  </div>
		  <div class="col-sm-1">
			  <input name="pillingb_f4" type="text" class="form-control" id="pillingb_f4" value="<?php echo $rcek1[pb_f4];?>" placeholder="FACE 4">
			  <input name="pillingb_b4" type="text" class="form-control" id="pillingb_b4" value="<?php echo $rcek1[pb_b4];?>" placeholder="BACK 4">
		  </div>
		  <div class="col-sm-1">
			  <input name="pillingb_f5" type="text" class="form-control" id="pillingb_f5" value="<?php echo $rcek1[pb_f5];?>" placeholder="FACE 5">
			  <input name="pillingb_b5" type="text" class="form-control" id="pillingb_b5" value="<?php echo $rcek1[pb_b5];?>" placeholder="BACK 5">
		  </div>
          --> 
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="pillb_note" maxlength="50"><?php echo $rcek1[pillb_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc10" style="display:none;">
          <label for="pillingrt" class="col-sm-2 control-label">PILLING RANDOM TUMBLER</label>
          <div class="col-sm-1">
			  <input name="pillingrt_f1" type="text" class="form-control" id="pillingrt_f1" value="<?php echo $rcek1[prt_f1];?>" placeholder="FACE 1">
			  <input name="pillingrt_b1" type="text" class="form-control" id="pillingrt_b1" value="<?php echo $rcek1[prt_b1];?>" placeholder="BACK 1">
		  </div>
		  <div class="col-sm-1">
			  <input name="pillingrt_f2" type="text" class="form-control" id="pillingrt_f2" value="<?php echo $rcek1[prt_f2];?>" placeholder="FACE 2">
			  <input name="pillingrt_b2" type="text" class="form-control" id="pillingrt_b2" value="<?php echo $rcek1[prt_b2];?>" placeholder="BACK 2">
		  </div>
		  <div class="col-sm-1">
			  <input name="pillingrt_f3" type="text" class="form-control" id="pillingrt_f3" value="<?php echo $rcek1[prt_f3];?>" placeholder="FACE 3">
			  <input name="pillingrt_b3" type="text" class="form-control" id="pillingrt_b3" value="<?php echo $rcek1[prt_b3];?>" placeholder="BACK 3">
		  </div>
		  <div class="col-sm-1">
			  <input name="pillingrt_f4" type="text" class="form-control" id="pillingrt_f4" value="<?php echo $rcek1[prt_f4];?>" placeholder="FACE 4">
			  <input name="pillingrt_b4" type="text" class="form-control" id="pillingrt_b4" value="<?php echo $rcek1[prt_b4];?>" placeholder="BACK 4">
		  </div>
		  <div class="col-sm-1">
			  <input name="pillingrt_f5" type="text" class="form-control" id="pillingrt_f5" value="<?php echo $rcek1[prt_f5];?>" placeholder="FACE 5">
			  <input name="pillingrt_b5" type="text" class="form-control" id="pillingrt_b5" value="<?php echo $rcek1[prt_b5];?>" placeholder="BACK 5">
		  </div>
		<div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="pillr_note" maxlength="50"><?php echo $rcek1[pillr_note];?></textarea>
		  </div>
    </div>	
	<div class="form-group" id="fc11" style="display:none;">
          <label for="abr" class="col-sm-2 control-label">ABRATION</label>
          <div class="col-sm-2">
			  <input name="abr" type="text" class="form-control" id="abr" value="<?php echo $rcek1[abration];?>" placeholder="ABRATION">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="abr_note" maxlength="50" rows="1"><?php echo $rcek1[abr_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc12" style="display:none;">
          <label for="snaggingm" class="col-sm-2 control-label">SNAGGING MACE</label>
          <div class="col-sm-1">
			  <input name="snaggingm_l1" type="text" class="form-control" id="snaggingm_l1" value="<?php echo $rcek1[sm_l1];?>" placeholder="LEN 1">
			  <input name="snaggingm_w1" type="text" class="form-control" id="snaggingm_w1" value="<?php echo $rcek1[sm_w1];?>" placeholder="WID 1">
		  </div>
		  <div class="col-sm-1">
			  <input name="snaggingm_l2" type="text" class="form-control" id="snaggingm_l2" value="<?php echo $rcek1[sm_l2];?>" placeholder="LEN 2">
			  <input name="snaggingm_w2" type="text" class="form-control" id="snaggingm_w2" value="<?php echo $rcek1[sm_w2];?>" placeholder="WID 2">
		  </div>
		  <div class="col-sm-1">
			  <input name="snaggingm_l3" type="text" class="form-control" id="snaggingm_l3" value="<?php echo $rcek1[sm_l3];?>" placeholder="LEN 3">
			  <input name="snaggingm_w3" type="text" class="form-control" id="snaggingm_w3" value="<?php echo $rcek1[sm_w3];?>" placeholder="WID 3">
		  </div>
		  <div class="col-sm-1">
			  <input name="snaggingm_l4" type="text" class="form-control" id="snaggingm_l4" value="<?php echo $rcek1[sm_l4];?>" placeholder="LEN 4">
			  <input name="snaggingm_w4" type="text" class="form-control" id="snaggingm_w4" value="<?php echo $rcek1[sm_w4];?>" placeholder="WID 4">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="snam_note" maxlength="50"><?php echo $rcek1[snam_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc13" style="display:none;">
          <label for="snaggingp" class="col-sm-2 control-label">SNAGGING POD</label>
          <div class="col-sm-1">LEN(Face) 1
			  <input name="sp_grdl1" type="text" class="form-control" id="sp_grdl1" value="<?php echo $rcek1[sp_grdl1];?>" placeholder="GRAD 1">
			  <input name="sp_clsl1" type="text" class="form-control" id="sp_clsl1" value="<?php echo $rcek1[sp_clsl1];?>" placeholder="CLAS 1">
			  <input name="sp_shol1" type="text" class="form-control" id="sp_shol1" value="<?php echo $rcek1[sp_shol1];?>" placeholder="SHO 1">
			  <input name="sp_medl1" type="text" class="form-control" id="sp_medl1" value="<?php echo $rcek1[sp_medl1];?>" placeholder="MED 1">
			  <input name="sp_lonl1" type="text" class="form-control" id="snaggingp_w1" value="<?php echo $rcek1[sp_lonl1];?>" placeholder="LONG 1">
		  </div>
		  <div class="col-sm-1">WID(Face) 1
			  <input name="sp_grdw1" type="text" class="form-control" id="sp_grdw1" value="<?php echo $rcek1[sp_grdw1];?>" placeholder="GRAD 1">
			  <input name="sp_clsw1" type="text" class="form-control" id="sp_clsw1" value="<?php echo $rcek1[sp_clsw1];?>" placeholder="CLAS 1">
			  <input name="sp_show1" type="text" class="form-control" id="sp_show1" value="<?php echo $rcek1[sp_show1];?>" placeholder="SHO 1">
			  <input name="sp_medw1" type="text" class="form-control" id="sp_medw1" value="<?php echo $rcek1[sp_medw1];?>" placeholder="MED 1">
			  <input name="sp_lonw1" type="text" class="form-control" id="sp_lonw1" value="<?php echo $rcek1[sp_lonw1];?>" placeholder="LONG 1">
		  </div>
		  <div class="col-sm-1">LEN(Back) 2
			  <input name="sp_grdl2" type="text" class="form-control" id="sp_grdl2" value="<?php echo $rcek1[sp_grdl2];?>" placeholder="GRAD 2">
			  <input name="sp_clsl2" type="text" class="form-control" id="sp_clsl2" value="<?php echo $rcek1[sp_clsl2];?>" placeholder="CLAS 2">
			  <input name="sp_shol2" type="text" class="form-control" id="sp_shol2" value="<?php echo $rcek1[sp_shol2];?>" placeholder="SHO 2">
			  <input name="sp_medl2" type="text" class="form-control" id="sp_medl2" value="<?php echo $rcek1[sp_medl2];?>" placeholder="MED 2">
			  <input name="sp_lonl2" type="text" class="form-control" id="sp_lonl2" value="<?php echo $rcek1[sp_lonl2];?>" placeholder="LONG 2">
		  </div>
		  <div class="col-sm-1">WID(Back) 2
			  <input name="sp_grdw2" type="text" class="form-control" id="sp_grdw2" value="<?php echo $rcek1[sp_grdw2];?>" placeholder="GRAD 2">
			  <input name="sp_clsw2" type="text" class="form-control" id="sp_clsw2" value="<?php echo $rcek1[sp_clsw2];?>" placeholder="CLAS 2">
			  <input name="sp_show2" type="text" class="form-control" id="sp_show2" value="<?php echo $rcek1[sp_show2];?>" placeholder="SHO 2">
			  <input name="sp_medw2" type="text" class="form-control" id="sp_medw2" value="<?php echo $rcek1[sp_medw2];?>" placeholder="MED 2">
			  <input name="sp_lonw2" type="text" class="form-control" id="sp_lonw2" value="<?php echo $rcek1[sp_lonw2];?>" placeholder="LONG 2">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="snap_note" maxlength="50"><?php echo $rcek1[snap_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc14" style="display:none;">
          <label for="snaggingb" class="col-sm-2 control-label">SNAGGING BOX</label>
          <div class="col-sm-1">
			  <input name="snaggingb_l1" type="text" class="form-control" id="snaggingb_l1" value="<?php echo $rcek1[sb_l1];?>" placeholder="LEN 1">
			  <input name="snaggingb_w1" type="text" class="form-control" id="snaggingb_w1" value="<?php echo $rcek1[sb_w1];?>" placeholder="WID 1">
		  </div>
		  <!--
		  <div class="col-sm-1">
			  <input name="snaggingb_l2" type="text" class="form-control" id="snaggingb_l2" value="<?php echo $rcek1[sb_l2];?>" placeholder="LEN 2">
			  <input name="snaggingb_w2" type="text" class="form-control" id="snaggingb_w2" value="<?php echo $rcek1[sb_w2];?>" placeholder="WID 2">
		  </div>
		  <div class="col-sm-1">
			  <input name="snaggingb_l3" type="text" class="form-control" id="snaggingb_l3" value="<?php echo $rcek1[sb_l3];?>" placeholder="LEN 3">
			  <input name="snaggingb_w3" type="text" class="form-control" id="snaggingb_w3" value="<?php echo $rcek1[sb_w3];?>" placeholder="WID 3">
		  </div>
		  <div class="col-sm-1">
			  <input name="snaggingb_l4" type="text" class="form-control" id="snaggingb_l4" value="<?php echo $rcek1[sb_l4];?>" placeholder="LEN 4">
			  <input name="snaggingb_w4" type="text" class="form-control" id="snaggingb_w4" value="<?php echo $rcek1[sb_w4];?>" placeholder="WID 4">
		  </div>
          -->
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="snab_note" maxlength="50"><?php echo $rcek1[snab_note];?></textarea>
		  </div>
    </div>	
	<div class="form-group" id="fc15" style="display:none;">
          <label for="fibercontent" class="col-sm-2 control-label">BURSTING STRENGTH</label>
          <div class="col-sm-2">
			  <input name="instron" type="text" class="form-control" id="instron" value="<?php echo $rcek1[bs_instron];?>" placeholder="INSTRON">
		  </div>
		  <div class="col-sm-2">
			  <input name="mullen" type="text" class="form-control" id="mullen" value="<?php echo $rcek1[bs_mullen];?>" placeholder="MULLEN">
		  </div>
		  <div class="col-sm-2">
			  <input name="tru_burst" type="text" class="form-control" id="tru_burst" value="<?php echo $rcek1[bs_tru];?>" placeholder="TRU BURST">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="burs_note" maxlength="50" rows="1"><?php echo $rcek1[burs_note];?></textarea>
		  </div>	  
    </div>
	<div class="form-group" id="fc16" style="display:none;">
          <label for="thickn" class="col-sm-2 control-label">THICKNESS</label>
          <div class="col-sm-2">
			  <input name="thick1" type="text" class="form-control" id="thick1" value="<?php echo $rcek1[thick1];?>" placeholder="1">
		  </div>
		  <div class="col-sm-2">
			  <input name="thick2" type="text" class="form-control" id="thick2" value="<?php echo $rcek1[thick2];?>" placeholder="2">
		  </div>
		  <div class="col-sm-2">
			  <input name="thick3" type="text" class="form-control" id="thick3" value="<?php echo $rcek1[thick3];?>" placeholder="3">
		  </div>
		  <div class="col-sm-2">
			  <input name="thickav" type="text" class="form-control" id="thickav" value="<?php echo $rcek1[thickav];?>" placeholder="AV">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="thick_note" maxlength="50" rows="1"><?php echo $rcek1[thick_note];?></textarea>
		  </div>	  
    </div>
	<div class="form-group" id="fc17" style="display:none;">
          <label for="stretch" class="col-sm-2 control-label">STRETCH</label>
          <div class="col-sm-1">
			  <input name="stretch_l1" type="text" class="form-control" id="stretch_l1" value="<?php echo $rcek1[stretch_l1];?>" placeholder="LEN 1">
			  <input name="stretch_w1" type="text" class="form-control" id="stretch_w1" value="<?php echo $rcek1[stretch_w1];?>" placeholder="WID 1">
		  </div>
		  <div class="col-sm-1">
			  <input name="stretch_l2" type="text" class="form-control" id="stretch_l2" value="<?php echo $rcek1[stretch_l2];?>" placeholder="LEN 2">
			  <input name="stretch_w2" type="text" class="form-control" id="stretch_w2" value="<?php echo $rcek1[stretch_w2];?>" placeholder="WID 2">
		  </div>
		  <div class="col-sm-1">
			  <input name="stretch_l3" type="text" class="form-control" id="stretch_l3" value="<?php echo $rcek1[stretch_l3];?>" placeholder="LEN 3">
			  <input name="stretch_w3" type="text" class="form-control" id="stretch_w3" value="<?php echo $rcek1[stretch_w3];?>" placeholder="WID 3">
		  </div>
		  <div class="col-sm-1">
			  <input name="stretch_l4" type="text" class="form-control" id="stretch_l4" value="<?php echo $rcek1[stretch_l4];?>" placeholder="LEN 4">
			  <input name="stretch_w4" type="text" class="form-control" id="stretch_w4" value="<?php echo $rcek1[stretch_w4];?>" placeholder="WID 4">
		  </div>
		  <div class="col-sm-1">
			  <input name="stretch_l5" type="text" class="form-control" id="stretch_l5" value="<?php echo $rcek1[stretch_l5];?>" placeholder="LEN 5">
			  <input name="stretch_w5" type="text" class="form-control" id="stretch_w5" value="<?php echo $rcek1[stretch_w5];?>" placeholder="WID 5">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="stretch_note" maxlength="50"><?php echo $rcek1[stretch_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc18" style="display:none;">
          <label for="recover" class="col-sm-2 control-label">RECOVERY</label>
          <div class="col-sm-1">
			  <input name="recover_l1" type="text" class="form-control" id="recover_l1" value="<?php echo $rcek1[recover_l1];?>" placeholder="LEN1 1">
			  <input name="recover_l11" type="text" class="form-control" id="recover_l11" value="<?php echo $rcek1[recover_l11];?>" placeholder="LEN30 1">
			  <input name="recover_w1" type="text" class="form-control" id="recover_w1" value="<?php echo $rcek1[recover_w1];?>" placeholder="WID1 1">
			  <input name="recover_w11" type="text" class="form-control" id="recover_w11" value="<?php echo $rcek1[recover_w11];?>" placeholder="WID30 1">
		  </div>
		  <div class="col-sm-1">
			  <input name="recover_l2" type="text" class="form-control" id="recover_l2" value="<?php echo $rcek1[recover_l2];?>" placeholder="LEN1 2">
			  <input name="recover_l21" type="text" class="form-control" id="recover_l21" value="<?php echo $rcek1[recover_l21];?>" placeholder="LEN30 2">
			  <input name="recover_w2" type="text" class="form-control" id="recover_w2" value="<?php echo $rcek1[recover_w2];?>" placeholder="WID1 2">
			  <input name="recover_w21" type="text" class="form-control" id="recover_w21" value="<?php echo $rcek1[recover_w21];?>" placeholder="WID30 2">
		  </div>
		  <div class="col-sm-1">
			  <input name="recover_l3" type="text" class="form-control" id="recover_l3" value="<?php echo $rcek1[recover_l3];?>" placeholder="LEN1 3">
			  <input name="recover_l31" type="text" class="form-control" id="recover_l31" value="<?php echo $rcek1[recover_l31];?>" placeholder="LEN30 3">
			  <input name="recover_w3" type="text" class="form-control" id="recover_w3" value="<?php echo $rcek1[recover_w3];?>" placeholder="WID1 3">
			  <input name="recover_w31" type="text" class="form-control" id="recover_w31" value="<?php echo $rcek1[recover_w31];?>" placeholder="WID30 3">
		  </div>
		  <div class="col-sm-1">
			  <input name="recover_l4" type="text" class="form-control" id="recover_l4" value="<?php echo $rcek1[recover_l4];?>" placeholder="LEN1 4">
			  <input name="recover_l41" type="text" class="form-control" id="recover_l41" value="<?php echo $rcek1[recover_l41];?>" placeholder="LEN30 4">
			  <input name="recover_w4" type="text" class="form-control" id="recover_w4" value="<?php echo $rcek1[recover_w4];?>" placeholder="WID1 4">
			  <input name="recover_w41" type="text" class="form-control" id="recover_w41" value="<?php echo $rcek1[recover_w41];?>" placeholder="WID30 4">
		  </div>
		  <div class="col-sm-1">
			  <input name="recover_l5" type="text" class="form-control" id="recover_l5" value="<?php echo $rcek1[recover_l5];?>" placeholder="LEN1 5">
			  <input name="recover_l51" type="text" class="form-control" id="recover_l51" value="<?php echo $rcek1[recover_l51];?>" placeholder="LEN30 5">
			  <input name="recover_w5" type="text" class="form-control" id="recover_w5" value="<?php echo $rcek1[recover_w5];?>" placeholder="WID1 5">
			  <input name="recover_w51" type="text" class="form-control" id="recover_w51" value="<?php echo $rcek1[recover_w51];?>" placeholder="WID30 5">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="recover_note" maxlength="50"><?php echo $rcek1[recover_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc19" style="display:none;">
          <label for="growth" class="col-sm-2 control-label">GROWTH</label>
          <div class="col-sm-2">
			  <input name="growth_l1" type="text" class="form-control" id="growth_l1" value="<?php echo $rcek1[growth_l1];?>" placeholder="LENGTH 1">
			  <input name="growth_w1" type="text" class="form-control" id="growth_w1" value="<?php echo $rcek1[growth_w1];?>" placeholder="WIDTH 1">
		  </div>
		  <div class="col-sm-2">
			  <input name="growth_l2" type="text" class="form-control" id="growth_l2" value="<?php echo $rcek1[growth_l2];?>" placeholder="LENGTH 2">
			  <input name="growth_w2" type="text" class="form-control" id="growth_w2" value="<?php echo $rcek1[growth_w2];?>" placeholder="WIDTH 2">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="growth_note" maxlength="50"><?php echo $rcek1[growth_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="fc20" style="display:none;">
          <label for="apper" class="col-sm-2 control-label">APPERANCE</label>
          <div class="col-sm-2">
			  <input name="apper_pf1" type="text" class="form-control" id="apper_pf1" value="<?php echo $rcek1[apper_pf1];?>" placeholder="PILLING FACE 1">
			  <input name="apper_pb1" type="text" class="form-control" id="apper_pb1" value="<?php echo $rcek1[apper_pb1];?>" placeholder="PILLING BACK 1">
			  <input name="apper_ch1" type="text" class="form-control" id="apper_ch1" value="<?php echo $rcek1[apper_ch1];?>" placeholder="C.CHANGE 1">
			  <input name="apper_st" type="text" class="form-control" id="apper_st" value="<?php echo $rcek1[apper_st];?>" placeholder="C.STAINING">
		  </div>
		  <div class="col-sm-2">
			  <input name="apper_pf2" type="text" class="form-control" id="apper_pf2" value="<?php echo $rcek1[apper_pf2];?>" placeholder="PILLING FACE 2">
			  <input name="apper_pb2" type="text" class="form-control" id="apper_pb2" value="<?php echo $rcek1[apper_pb2];?>" placeholder="PILLING BACK 2">
			  <input name="apper_ch2" type="text" class="form-control" id="apper_ch2" value="<?php echo $rcek1[apper_ch2];?>" placeholder="C.CHANGE 2">
		  </div>
		  <div class="col-sm-2">
			  <input name="apper_pf3" type="text" class="form-control" id="apper_pf3" value="<?php echo $rcek1[apper_pf3];?>" placeholder="PILLING FACE 3">
			  <input name="apper_pb3" type="text" class="form-control" id="apper_pb3" value="<?php echo $rcek1[apper_pb3];?>" placeholder="PILLING BACK 3">
			  <input name="apper_ch3" type="text" class="form-control" id="apper_ch3" value="<?php echo $rcek1[apper_ch3];?>" placeholder="C.CHANGE 3">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="apper_note" maxlength="50"><?php echo $rcek1[apper_note];?></textarea>
		  </div>
    </div>	
	<div class="form-group">
		<?php if($nokk!=""){ ?>
		  <button type="submit" class="btn btn-primary pull-right" name="physical_save" value="save"><i class="fa fa-save"></i> Simpan</button>
		<?php } ?>
    </div>
	</form>						
						</div>
						<div class="tab-pane" id="tab_2">
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form2" id="form2">		
		<div class="form-group">					
			  <?php if($nokk!=""){ ?>
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
			  <option value="1">VERTICAL WICKING</option>
			  <option value="2">ABSORBENCY</option>
			  <option value="3">DRYING TIME</option>
			  <option value="4">WATER REPPELENT</option>
			  <option value="5">PH</option> 
			  <option value="6">PHENOLIC YELLOWING</option> 
			  </select>
		  </div>
    </div>
	<div class="form-group" id="f1" style="display:none;">
          <label for="vwicking" class="col-sm-2 control-label">VERTICAL WICKING</label>
          <div class="col-sm-1">
			  <input name="wick_l1" type="text" class="form-control" id="wick_l1" value="<?php echo $rcek1[wick_l1];?>" placeholder="LEN 1">
			  <input name="wick_w1" type="text" class="form-control" id="wick_w1" value="<?php echo $rcek1[wick_w1];?>" placeholder="WID 1">
		  </div>
		  <div class="col-sm-1">
			  <input name="wick_l2" type="text" class="form-control" id="wick_l2" value="<?php echo $rcek1[wick_l2];?>" placeholder="LEN 2">
			  <input name="wick_w2" type="text" class="form-control" id="wick_w2" value="<?php echo $rcek1[wick_w2];?>" placeholder="WID 2">
		  </div>
		  <div class="col-sm-1">
			  <input name="wick_l3" type="text" class="form-control" id="wick_l3" value="<?php echo $rcek1[wick_l3];?>" placeholder="LEN 3">
			  <input name="wick_w3" type="text" class="form-control" id="wick_w3" value="<?php echo $rcek1[wick_w3];?>" placeholder="WID 3">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="wick_note" maxlength="50"><?php echo $rcek1[wick_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="f2" style="display:none;">
          <label for="absor" class="col-sm-2 control-label">ABSORBENCY</label>
          <div class="col-sm-1">
			  <input name="absor_f1" type="text" class="form-control" id="absor_f1" value="<?php echo $rcek1[absor_f1];?>" placeholder="FACE 1">
			  <input name="absor_b1" type="text" class="form-control" id="absor_b1" value="<?php echo $rcek1[absor_b1];?>" placeholder="BACK 1">
		  </div>
		  <div class="col-sm-1">
			  <input name="absor_f2" type="text" class="form-control" id="absor_f2" value="<?php echo $rcek1[absor_f2];?>" placeholder="FACE 2">
			  <input name="absor_b2" type="text" class="form-control" id="absor_b2" value="<?php echo $rcek1[absor_b2];?>" placeholder="BACK 2">
		  </div>
		  <div class="col-sm-1">
			  <input name="absor_f3" type="text" class="form-control" id="absor_f3" value="<?php echo $rcek1[absor_f3];?>" placeholder="FACE 3">
			  <input name="absor_b3" type="text" class="form-control" id="absor_b3" value="<?php echo $rcek1[absor_b3];?>" placeholder="BACK 3">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="absor_note" maxlength="50"><?php echo $rcek1[absor_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="f3" style="display:none;">
          <label for="dryingt" class="col-sm-2 control-label">DRYING TIME</label>
          <div class="col-sm-2">
			  <input name="dry1" type="text" class="form-control" id="dry1" value="<?php echo $rcek1[dry1];?>" placeholder="1">
		  </div>
		  <div class="col-sm-2">
			  <input name="dry2" type="text" class="form-control" id="dry2" value="<?php echo $rcek1[dry2];?>" placeholder="2">
		  </div>
		  <div class="col-sm-2">
			  <input name="dry3" type="text" class="form-control" id="dry3" value="<?php echo $rcek1[dry3];?>" placeholder="3">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dry_note" maxlength="50" rows="1"><?php echo $rcek1[dry_note];?></textarea>
		  </div>	  
    </div>
	<div class="form-group" id="f4" style="display:none;">
          <label for="waterr" class="col-sm-2 control-label">WATER REPPELENT</label>
          <div class="col-sm-2">
			  <input name="repp1" type="text" class="form-control" id="repp1" value="<?php echo $rcek1[repp1];?>" placeholder="1">
		  </div>
		  <div class="col-sm-2">
			  <input name="repp2" type="text" class="form-control" id="repp2" value="<?php echo $rcek1[repp2];?>" placeholder="2">
		  </div>
		  <div class="col-sm-2">
			  <input name="repp3" type="text" class="form-control" id="repp3" value="<?php echo $rcek1[repp3];?>" placeholder="3">
		  </div>
		  <div class="col-sm-2">
			  <input name="repp4" type="text" class="form-control" id="repp4" value="<?php echo $rcek1[repp4];?>" placeholder="4">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="repp_note" maxlength="50" rows="1"><?php echo $rcek1[repp_note];?></textarea>
		  </div>	  
    </div>
	<div class="form-group" id="f5" style="display:none;">
          <label for="ph" class="col-sm-2 control-label">Ph</label>
          <div class="col-sm-2">
			  <input name="ph" type="text" class="form-control" id="ph" value="<?php echo $rcek1[ph];?>" placeholder="Ph">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="ph_note" maxlength="50" rows="1"><?php echo $rcek1[ph_note];?></textarea>
		  </div>
    </div>
	<div class="form-group" id="f6" style="display:none;">
          <label for="phenolic" class="col-sm-2 control-label">PHENOLIC YELLOWING</label>
          <div class="col-sm-2">
			  <input name="phenolic_colorchange" type="text" class="form-control" id="phenolic_colorchange" value="<?php echo $rcek1[phenolic_colorchange];?>" placeholder="4-5 Color Change">
		  </div>
		  <div class="col-sm-2">
			  <textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="phenolic_note" maxlength="50" rows="1"><?php echo $rcek1[phenolic_note];?></textarea>
		  </div>
    </div>		
		<div class="form-group">					
			  <?php if($nokk!=""){ ?>
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
   
   </div>
    <!-- /.box-footer -->
</div>
<?php } ?>

<?php if($cek1>0){ ?>
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Result.
            <small class="pull-right">Date: <?php echo $rcek1[tgl_buat];?></small>
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
			  <?php if($rcek1[flamability]!=""){?>	
              <tr>
                <th colspan="2" style="width:50%">Flamability</th>
                <td colspan="6"><?php echo $rcek1[flamability];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[fc_cott]!="" or $rcek1[fc_poly]!="" or $rcek1[fc_elastane]!=""){?>	
              <tr>
                <th colspan="2">Fiber Content</th>
                <td colspan="6"><?php echo $rcek1[fc_cott];?> % Cott <?php echo $rcek1[fc_poly];?> % Poly  <?php echo $rcek1[fc_elastane];?> % Ela</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[fc_wpi]!="" or $rcek1[fc_cpi]!=""){?>	
              <tr>
                <th colspan="2">Fabric Count</th>
                <td colspan="6">W: <?php echo $rcek1[fc_wpi];?> C: <?php echo $rcek1[fc_cpi];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[f_weight]!=""){?>	
              <tr>
                <th colspan="2">Fabric Weight</th>
                <td colspan="6"><?php echo $rcek1[f_weight];?></td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1[f_width]!=""){?>	
              <tr>
                <th colspan="2">Fabric Width</th>
                <td colspan="6"><?php echo $rcek1[f_width];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[bow]!="" or $rcek1[skew]!=""){?>	
              <tr>
                <th colspan="2">Bow &amp; Skew</th>
                <td colspan="6"><?php echo $rcek1[bow];?> &amp; <?php echo $rcek1[skew];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[shrinkage_l1]!="" or $rcek1[shrinkage_l2]!="" or $rcek1[shrinkage_l3]!="" or $rcek1[shrinkage_l4]!=""){?>	
              <tr>
                <th colspan="2">Shrinkage Length</th>
                <td><?php echo $rcek1[shrinkage_l1];?></td>
                <td><?php echo $rcek1[shrinkage_l2];?></td>
                <td><?php echo $rcek1[shrinkage_l3];?></td>
                <td><?php echo $rcek1[shrinkage_l4];?></td>
                <td><?php echo $rcek1[shrinkage_l5];?></td>
                <td><?php echo $rcek1[shrinkage_l6];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[shrinkage_w1]!="" or $rcek1[shrinkage_w2]!="" or $rcek1[shrinkage_w3]!="" or $rcek1[shrinkage_w4]!=""){?>	
              <tr>
                <th colspan="2">Shrinkage Width</th>
                <td><?php echo $rcek1[shrinkage_w1];?></td>
                <td><?php echo $rcek1[shrinkage_w2];?></td>
                <td><?php echo $rcek1[shrinkage_w3];?></td>
                <td><?php echo $rcek1[shrinkage_w4];?></td>
                <td><?php echo $rcek1[shrinkage_w5];?></td>
                <td><?php echo $rcek1[shrinkage_w6];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[spirality1]!="" or $rcek1[spirality2]!="" or $rcek1[spirality3]!="" or $rcek1[spirality4]!=""){?>		
              <tr>
                <th colspan="2">Spirality</th>
                <td><?php echo $rcek1[spirality1];?></td>
                <td><?php echo $rcek1[spirality2];?></td>
                <td><?php echo $rcek1[spirality3];?></td>
                <td><?php echo $rcek1[spirality4];?></td>
                <td><?php echo $rcek1[spirality5];?></td>
                <td><?php echo $rcek1[spirality6];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[pm_f1]!="" or $rcek1[pm_f2]!="" or $rcek1[pm_f3]!="" or $rcek1[pm_f4]!="" or $rcek1[pm_f5]!=""){?>	
              <tr>
                <th rowspan="2">Pilling Martindle</th>
                <th>Face</th>
                <td><?php echo $rcek1[pm_f1];?></td>
                <td><?php echo $rcek1[pm_f2];?></td>
                <td><?php echo $rcek1[pm_f3];?></td>
                <td><?php echo $rcek1[pm_f4];?></td>
                <td><?php echo $rcek1[pm_f5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[pm_b1]!="" or $rcek1[pm_b2]!="" or $rcek1[pm_b3]!="" or $rcek1[pm_b4]!="" or $rcek1[pm_b5]!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php echo $rcek1[pm_b1];?></td>
                <td><?php echo $rcek1[pm_b2];?></td>
                <td><?php echo $rcek1[pm_b3];?></td>
                <td><?php echo $rcek1[pm_b4];?></td>
                <td><?php echo $rcek1[pm_b5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1[pb_f1]!="" or $rcek1[pb_f2]!="" or $rcek1[pb_f3]!="" or $rcek1[pb_f4]!="" or $rcek1[pb_f5]!=""){?>	
              <tr>
                <th rowspan="2">Pilling Box</th>
                <th>Face</th>
                <td><?php echo $rcek1[pb_f1];?></td>
                <td><?php echo $rcek1[pb_f2];?></td>
                <td><?php echo $rcek1[pb_f3];?></td>
                <td><?php echo $rcek1[pb_f4];?></td>
                <td><?php echo $rcek1[pb_f5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[pb_b1]!="" or $rcek1[pb_b2]!="" or $rcek1[pb_b3]!="" or $rcek1[pb_b4]!="" or $rcek1[pb_b5]!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php echo $rcek1[pb_b1];?></td>
                <td><?php echo $rcek1[pb_b2];?></td>
                <td><?php echo $rcek1[pb_b3];?></td>
                <td><?php echo $rcek1[pb_b4];?></td>
                <td><?php echo $rcek1[pb_b5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[prt_f1]!="" or $rcek1[prt_f2]!="" or $rcek1[prt_f3]!="" or $rcek1[prt_f4]!="" or $rcek1[prt_f5]!=""){?>	
              <tr>
                <th rowspan="2">Pilling Random Tumbler</th>
                <th>Face</th>
                <td><?php echo $rcek1[prt_f1];?></td>
                <td><?php echo $rcek1[prt_f2];?></td>
                <td><?php echo $rcek1[prt_f3];?></td>
                <td><?php echo $rcek1[prt_f4];?></td>
                <td><?php echo $rcek1[prt_f5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[prt_b1]!="" or $rcek1[prt_b2]!="" or $rcek1[prt_b3]!="" or $rcek1[prt_b4]!="" or $rcek1[prt_b5]!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php echo $rcek1[prt_b1];?></td>
                <td><?php echo $rcek1[prt_b2];?></td>
                <td><?php echo $rcek1[prt_b3];?></td>
                <td><?php echo $rcek1[prt_b4];?></td>
                <td><?php echo $rcek1[prt_b5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[abration]!=""){?>	
              <tr>
                <th colspan="2">Abration</th>
                <td colspan="6"><?php echo $rcek1[abration];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[sm_l1]!="" or $rcek1[sm_l2]!="" or $rcek1[sm_l3]!="" or $rcek1[sm_l4]!=""){?>	
              <tr>
                <th rowspan="2">Snagging Mace</th>
                <th>Len</th>
                <td><?php echo $rcek1[sm_l1];?></td>
                <td><?php echo $rcek1[sm_l2];?></td>
                <td><?php echo $rcek1[sm_l3];?></td>
                <td><?php echo $rcek1[sm_l4];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[sm_w1]!="" or $rcek1[sm_w2]!="" or $rcek1[sm_w3]!="" or $rcek1[sm_w4]!=""){?>	
              <tr>
                <th>Wid</th>
                <td><?php echo $rcek1[sm_w1];?></td>
                <td><?php echo $rcek1[sm_w2];?></td>
                <td><?php echo $rcek1[sm_w3];?></td>
                <td><?php echo $rcek1[sm_w4];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[sp_grdl1]!="" or $rcek1[sp_clsl1]!="" or $rcek1[sp_shol1]!="" or $rcek1[sp_medl1]!="" or $rcek1[sp_lonl1]!="" or $rcek1[sp_grdl2]!="" or $rcek1[sp_clsl2]!="" or $rcek1[sp_shol2]!="" or $rcek1[sp_medl2]!="" or $rcek1[sp_lonl2]!="" or $rcek1[sp_grdw1]!="" or $rcek1[sp_clsw1]!="" or $rcek1[sp_show1]!="" or $rcek1[sp_medw1]!="" or $rcek1[sp_lonw1]!="" or $rcek1[sp_grdw2]!="" or $rcek1[sp_clsw2]!="" or $rcek1[sp_show2]!="" or $rcek1[sp_medw2]!="" or $rcek1[sp_lonw2]!=""){
				if($rcek1[sp_grdl1]!="" or $rcek1[sp_clsl1]!="" or $rcek1[sp_shol1]!="" or $rcek1[sp_medl1]!="" or $rcek1[sp_lonl1]!=""){$rp1="1";}else{$rp1="0";}
				if($rcek1[sp_grdl2]!="" or $rcek1[sp_clsl2]!="" or $rcek1[sp_shol2]!="" or $rcek1[sp_medl2]!="" or $rcek1[sp_lonl2]!=""){$rp2="1";}else{$rp2="0";}
				if($rcek1[sp_grdw1]!="" or $rcek1[sp_clsw1]!="" or $rcek1[sp_show1]!="" or $rcek1[sp_medw1]!="" or $rcek1[sp_lonw1]!=""){$rp3="1";}else{$rp3="0";}
				if($rcek1[sp_grdw2]!="" or $rcek1[sp_clsw2]!="" or $rcek1[sp_show2]!="" or $rcek1[sp_medw2]!="" or $rcek1[sp_lonw2]!=""){$rp4="1";}else{$rp4="0";}
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
			  <?php if($rcek1[sp_grdl1]!="" or $rcek1[sp_clsl1]!="" or $rcek1[sp_shol1]!="" or $rcek1[sp_medl1]!="" or $rcek1[sp_lonl1]!=""){?>	
              <tr>
                <th>L1</th>
                <td><?php echo $rcek1[sp_grdl1];?></td>
                <td><?php echo $rcek1[sp_clsl1];?></td>
                <td><?php echo $rcek1[sp_shol1];?></td>
                <td><?php echo $rcek1[sp_medl1];?></td>
                <td><?php echo $rcek1[sp_lonl1];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1[sp_grdl2]!="" or $rcek1[sp_clsl2]!="" or $rcek1[sp_shol2]!="" or $rcek1[sp_medl2]!="" or $rcek1[sp_lonl2]!=""){?>		
              <tr>
                <th>L2</th>
                <td><?php echo $rcek1[sp_grdl2];?></td>
                <td><?php echo $rcek1[sp_clsl2];?></td>
                <td><?php echo $rcek1[sp_shol2];?></td>
                <td><?php echo $rcek1[sp_medl2];?></td>
                <td><?php echo $rcek1[sp_lonl2];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1[sp_grdw1]!="" or $rcek1[sp_clsw1]!="" or $rcek1[sp_show1]!="" or $rcek1[sp_medw1]!="" or $rcek1[sp_lonw1]!=""){?>		
              <tr>
                <th>W1</th>
                <td><?php echo $rcek1[sp_grdw1];?></td>
                <td><?php echo $rcek1[sp_clsw1];?></td>
                <td><?php echo $rcek1[sp_show1];?></td>
                <td><?php echo $rcek1[sp_medw1];?></td>
                <td><?php echo $rcek1[sp_lonw1];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1[sp_grdw2]!="" or $rcek1[sp_clsw2]!="" or $rcek1[sp_show2]!="" or $rcek1[sp_medw2]!="" or $rcek1[sp_lonw2]!=""){?>	
              <tr>
                <th>W2</th>
                <td><?php echo $rcek1[sp_grdw2];?></td>
                <td><?php echo $rcek1[sp_clsw2];?></td>
                <td><?php echo $rcek1[sp_show2];?></td>
                <td><?php echo $rcek1[sp_medw2];?></td>
                <td><?php echo $rcek1[sp_lonw2];?></td>
                <td>&nbsp;</td>
              </tr>
              <?php } ?>
			  <?php if($rcek1[sb_l1]!="" or $rcek1[sb_l1]!="" or $rcek1[sb_l1]!="" or $rcek1[sb_l1]!=""){?>	
              <tr>
                <th rowspan="2">Snagging Box</th>
                <th>Len</th>
                <td><?php echo $rcek1[sb_l1];?></td>
                <td><?php echo $rcek1[sb_l2];?></td>
                <td><?php echo $rcek1[sb_l3];?></td>
                <td><?php echo $rcek1[sb_l4];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[sb_w1]!="" or $rcek1[sb_w1]!="" or $rcek1[sb_w1]!="" or $rcek1[sb_w1]!=""){?>	
              <tr>
                <th>Wid</th>
                <td><?php echo $rcek1[sb_w1];?></td>
                <td><?php echo $rcek1[sb_w2];?></td>
                <td><?php echo $rcek1[sb_w3];?></td>
                <td><?php echo $rcek1[sb_w4];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[bs_instron]!="" or $rcek1[bs_mullen]!="" or $rcek1[bs_tru]!=""){?>	
              <tr>
                <th colspan="2">Bursting Strength</th>
                <td><?php echo $rcek1[bs_instron];?></td>
                <td><?php echo $rcek1[bs_mullen];?></td>
                <td colspan="4"><?php echo $rcek1[bs_tru];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[thick1]!="" or $rcek1[thick2]!="" or $rcek1[thick3]!="" or $rcek1[thickav]!=""){?>	
              <tr>
                <th colspan="2">Thickness</th>
                <td><?php echo $rcek1[thick1];?></td>
                <td><?php echo $rcek1[thick2];?></td>
                <td><?php echo $rcek1[thick3];?></td>
                <td><?php echo $rcek1[thickav];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[stretch_l1]!="" or $rcek1[stretch_l2]!="" or $rcek1[stretch_l3]!="" or $rcek1[stretch_l4]!="" or $rcek1[stretch_l5]!=""){?>	
              <tr>
                <th rowspan="2">Stretch</th>
                <th>Len</th>
                <td><?php echo $rcek1[stretch_l1];?></td>
                <td><?php echo $rcek1[stretch_l2];?></td>
                <td><?php echo $rcek1[stretch_l3];?></td>
                <td><?php echo $rcek1[stretch_l4];?></td>
                <td><?php echo $rcek1[stretch_l5];?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php echo $rcek1[stretch_w1];?></td>
                <td><?php echo $rcek1[stretch_w2];?></td>
                <td><?php echo $rcek1[stretch_w3];?></td>
                <td><?php echo $rcek1[stretch_w4];?></td>
                <td><?php echo $rcek1[stretch_w5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[recover_l1]!="" or $rcek1[recover_l2]!="" or $rcek1[recover_l3]!="" or $rcek1[recover_l4]!="" or $rcek1[recover_l5]!=""){?>	
              <tr>
                <th rowspan="2">Recovery</th>
                <th>Len</th>
                <td><?php echo $rcek1[recover_l1];?></td>
                <td><?php echo $rcek1[recover_l2];?></td>
                <td><?php echo $rcek1[recover_l3];?></td>
                <td><?php echo $rcek1[recover_l4];?></td>
                <td><?php echo $rcek1[recover_l5];?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php echo $rcek1[recover_w1];?></td>
                <td><?php echo $rcek1[recover_w2];?></td>
                <td><?php echo $rcek1[recover_w3];?></td>
                <td><?php echo $rcek1[recover_w4];?></td>
                <td><?php echo $rcek1[recover_w5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[growth_l1]!="" or $rcek1[growth_l2]!=""){?>	
              <tr>
                <th rowspan="2">Growth</th>
                <th>Len</th>
                <td><?php echo $rcek1[growth_l1];?></td>
                <td><?php echo $rcek1[growth_l2];?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php echo $rcek1[growth_w1];?></td>
                <td><?php echo $rcek1[growth_w2];?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[apper_ch1]!="" or $rcek1[apper_ch2]!="" or $rcek1[apper_ch3]!=""){?>	
              <tr>
                <th rowspan="4">Apperance</th>
                <th>&nbsp;</th>
                <td><?php echo $rcek1[apper_ch1];?></td>
                <td><?php echo $rcek1[apper_ch2];?></td>
                <td colspan="4"><?php echo $rcek1[apper_ch3];?></td>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td colspan="6"><?php echo $rcek1[apper_st];?></td>
              </tr>
              <tr>
                <th>Face</th>
                <td><?php echo $rcek1[apper_pf1];?></td>
                <td><?php echo $rcek1[apper_pf2];?></td>
                <td colspan="4"><?php echo $rcek1[apper_pf3];?></td>
              </tr>
              <tr>
                <th>Back</th>
                <td><?php echo $rcek1[apper_pb1];?></td>
                <td><?php echo $rcek1[apper_pb2];?></td>
                <td colspan="4"><?php echo $rcek1[apper_pb3];?></td>
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
		    <?php if($rcek1[wick_l1]!="" or $rcek1[wick_l2]!="" or $rcek1[wick_l3]!="" or $rcek1[wick_w1]!="" or $rcek1[wick_w2]!="" or $rcek1[wick_w3]!=""){?>
		    <tr>
		      <th rowspan="2" style="width:50%">Vertical Wicking</th>
		      <th>Len</th>
		      <td><?php echo $rcek1[wick_l1];?></td>
		      <td><?php echo $rcek1[wick_l2];?></td>
		      <td colspan="2"><?php echo $rcek1[wick_l3];?></td>
	        </tr>
		    <tr>
		      <th >Wid</th>
		      <td><?php echo $rcek1[wick_w1];?></td>
		      <td><?php echo $rcek1[wick_w2];?></td>
		      <td colspan="2"><?php echo $rcek1[wick_w3];?></td>
	        </tr>
		    <?php } ?>
		    <?php if($rcek1[absor_f1]!="" or $rcek1[absor_f2]!="" or $rcek1[absor_f3]!="" or $rcek1[absor_b1]!="" or $rcek1[absor_b2]!="" or $rcek1[absor_b3]!=""){?>
		    <tr>
		      <th rowspan="2">Absorbency</th>
		      <th>Face</th>
		      <td><?php echo $rcek1[absor_f1];?></td>
		      <td><?php echo $rcek1[absor_f2];?></td>
		      <td colspan="2"><?php echo $rcek1[absor_f3];?></td>
	        </tr>
		    <tr>
		      <th>Back</th>
		      <td><?php echo $rcek1[absor_b1];?></td>
		      <td><?php echo $rcek1[absor_b2];?></td>
		      <td colspan="2"><?php echo $rcek1[absor_b3];?></td>
	        </tr>
		    <?php } ?>
			<?php if($rcek1[dry1]!="" or $rcek1[dry2]!="" or $rcek1[dry3]!=""){?>  
		    <tr>
		      <th colspan="2">Drying Time</th>
		      <td><?php echo $rcek1[dry1];?></td>
		      <td><?php echo $rcek1[dry2];?></td>
		      <td colspan="2"><?php echo $rcek1[dry3];?></td>
	        </tr>
			<?php } ?>
			<?php if($rcek1[repp1]!="" or $rcek1[repp2]!="" or $rcek1[repp3]!="" or $rcek1[repp4]!=""){?> 
		    <tr>
		      <th colspan="2">Water Reppelent</th>
		      <td><?php echo $rcek1[repp1];?></td>
		      <td><?php echo $rcek1[repp2];?></td>
		      <td><?php echo $rcek1[repp3];?></td>
		      <td><?php echo $rcek1[repp4];?></td>
	        </tr>
			<?php } ?>
			<?php if($rcek1[ph]!=""){?>  
		    <tr>
		      <th colspan="2">Ph</th>
		      <td colspan="4"><?php echo $rcek1[ph];?></td>
	        </tr>
			<?php } ?>
			<?php if($rcek1[phenolic_colorchange]!=""){?>
		    <tr>
		      <th>Phenolic Yellowing</th>
			    <th><strong>CC</strong></th>
		      <td colspan="4"><?php echo $rcek1[phenolic_colorchange];?></td>
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
            <?php echo trim($rcek1[note_g]);?>
          </p>
        </div>  
        <!-- /.col -->
      </div>
      <!-- /.row --><!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="pages/cetak/cetak_result.php?idkk=<?php echo $rcek[id];?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>
  </div>
</section>						
       <?php } ?>             
				  </div>
                </div>
            </div>
        </div>
<?php
if($_POST[physical_save]=="save" and $cek1>0){
	$sqlPHY=mysql_query("UPDATE tbl_tq_test SET 
		  `flamability`='$_POST[flamability]',
		  `fla_note`='$_POST[fla_note]',
		  `fc_cott`='$_POST[fc_cott]',
		  `fc_poly`='$_POST[fc_poly]',
		  `fc_elastane`='$_POST[fc_ela]',
		  `fiber_note`='$_POST[fiber_note]',
		  `fc_wpi`='$_POST[wpi]',
		  `fc_cpi`='$_POST[cpi]',
		  `fc_note`='$_POST[fc_note]',
		  `f_weight`='$_POST[fabric_weight]',
		  `fwe_note`='$_POST[fwe_note]',
		  `f_width`='$_POST[fabric_width]',
		  `fwi_note`='$_POST[fwi_note]',
		  `bow`='$_POST[bow]',
		  `skew`='$_POST[skew]',
		  `bas_note`='$_POST[bas_note]',
		  `shrinkage_l1`='$_POST[shrinkage_len1]',
		  `shrinkage_l2`='$_POST[shrinkage_len2]',
		  `shrinkage_l3`='$_POST[shrinkage_len3]',
		  `shrinkage_l4`='$_POST[shrinkage_len4]',
		  `shrinkage_l5`='$_POST[shrinkage_len5]',
		  `shrinkage_l6`='$_POST[shrinkage_len6]',
		  `shrinkage_w1`='$_POST[shrinkage_wid1]',
		  `shrinkage_w2`='$_POST[shrinkage_wid2]',
		  `shrinkage_w3`='$_POST[shrinkage_wid3]',
		  `shrinkage_w4`='$_POST[shrinkage_wid4]',
		  `shrinkage_w5`='$_POST[shrinkage_wid5]',
		  `shrinkage_w6`='$_POST[shrinkage_wid6]',
		  `spirality1`='$_POST[spirality1]',
		  `spirality2`='$_POST[spirality2]',
		  `spirality3`='$_POST[spirality3]',
		  `spirality4`='$_POST[spirality4]',
		  `spirality5`='$_POST[spirality5]',
		  `spirality6`='$_POST[spirality6]',
		  `sns_note`='$_POST[sns_note]',
		  `pm_f1`='$_POST[pillingm_f1]',
		  `pm_b1`='$_POST[pillingm_b1]',
		  `pm_f2`='$_POST[pillingm_f2]',
		  `pm_b2`='$_POST[pillingm_b2]',
		  `pm_f3`='$_POST[pillingm_f3]',
		  `pm_b3`='$_POST[pillingm_b3]',
		  `pm_f4`='$_POST[pillingm_f4]',
		  `pm_b4`='$_POST[pillingm_b4]',
		  `pm_f5`='$_POST[pillingm_f5]',
		  `pm_b5`='$_POST[pillingm_b5]',
		  `pillm_note`='$_POST[pillm_note]',
		  `pb_f1`='$_POST[pillingb_f1]',
		  `pb_b1`='$_POST[pillingb_b1]',
		  `pb_f2`='$_POST[pillingb_f2]',
		  `pb_b2`='$_POST[pillingb_b2]',
		  `pb_f3`='$_POST[pillingb_f3]',
		  `pb_b3`='$_POST[pillingb_b3]',
		  `pb_f4`='$_POST[pillingb_f4]',
		  `pb_b4`='$_POST[pillingb_b4]',
		  `pb_f5`='$_POST[pillingb_f5]',
		  `pb_b5`='$_POST[pillingb_b5]',
		  `pillb_note`='$_POST[pillb_note]',
		  `prt_f1`='$_POST[pillingrt_f1]',
		  `prt_b1`='$_POST[pillingrt_b1]',
		  `prt_f2`='$_POST[pillingrt_f2]',
		  `prt_b2`='$_POST[pillingrt_b2]',
		  `prt_f3`='$_POST[pillingrt_f3]',
		  `prt_b3`='$_POST[pillingrt_b3]',
		  `prt_f4`='$_POST[pillingrt_f4]',
		  `prt_b4`='$_POST[pillingrt_b4]',
		  `prt_f5`='$_POST[pillingrt_f5]',
		  `prt_b5`='$_POST[pillingrt_b5]',
		  `pillr_note`='$_POST[pillr_note]',
		  `abration`='$_POST[abr]',
		  `abr_note`='$_POST[abr_note]',
		  `sm_l1`='$_POST[snaggingm_l1]',
		  `sm_w1`='$_POST[snaggingm_w1]',
		  `sm_l2`='$_POST[snaggingm_l2]',
		  `sm_w2`='$_POST[snaggingm_w2]',
		  `sm_l3`='$_POST[snaggingm_l3]',
		  `sm_w3`='$_POST[snaggingm_w3]',
		  `sm_l4`='$_POST[snaggingm_l4]',
		  `sm_w4`='$_POST[snaggingm_w4]',
		  `snam_note`='$_POST[snam_note]',
		  `sp_grdl1` ='$_POST[sp_grdl1]',
		  `sp_clsl1` ='$_POST[sp_clsl1]',
		  `sp_shol1` ='$_POST[sp_shol1]',
		  `sp_medl1` ='$_POST[sp_medl1]',
		  `sp_lonl1` ='$_POST[sp_lonl1]',
		  `sp_grdw1` ='$_POST[sp_grdw1]',
		  `sp_clsw1` ='$_POST[sp_clsw1]',
		  `sp_show1` ='$_POST[sp_show1]',
		  `sp_medw1` ='$_POST[sp_medw1]',
		  `sp_lonw1` ='$_POST[sp_lonw1]',
		  `sp_grdl2` ='$_POST[sp_grdl2]',
		  `sp_clsl2` ='$_POST[sp_clsl2]',
		  `sp_shol2` ='$_POST[sp_shol2]',
		  `sp_medl2` ='$_POST[sp_medl2]',
		  `sp_lonl2` ='$_POST[sp_lonl2]',
		  `sp_grdw2` ='$_POST[sp_grdw2]',
		  `sp_clsw2` ='$_POST[sp_clsw2]',
		  `sp_show2` ='$_POST[sp_show2]',
		  `sp_medw2` ='$_POST[sp_medw2]',
		  `sp_lonw2` ='$_POST[sp_lonw2]',
		  `snap_note`='$_POST[snap_note]',
		  `sb_l1`='$_POST[snaggingb_l1]',
		  `sb_w1`='$_POST[snaggingb_w1]',
		  `sb_l2`='$_POST[snaggingb_l2]',
		  `sb_w2`='$_POST[snaggingb_w2]',
		  `sb_l3`='$_POST[snaggingb_l3]',
		  `sb_w3`='$_POST[snaggingb_w3]',
		  `sb_l4`='$_POST[snaggingb_l4]',
		  `sb_w4`='$_POST[snaggingb_w4]',
		  `snab_note`='$_POST[snab_note]',
		  `bs_instron`='$_POST[instron]',
		  `bs_mullen`='$_POST[mullen]',
		  `bs_tru`='$_POST[tru_burst]',
		  `burs_note`='$_POST[burs_note]',
		  `thick1`='$_POST[thick1]',
		  `thick2`='$_POST[thick2]',
		  `thick3`='$_POST[thick3]',
		  `thickav`='$_POST[thickav]',
		  `thick_note`='$_POST[thick_note]',
		  `stretch_l1`='$_POST[stretch_l1]',
		  `stretch_w1`='$_POST[stretch_w1]',
		  `stretch_l2`='$_POST[stretch_l2]',
		  `stretch_w2`='$_POST[stretch_w2]',
		  `stretch_l3`='$_POST[stretch_l3]',
		  `stretch_w3`='$_POST[stretch_w3]',
		  `stretch_l4`='$_POST[stretch_l4]',
		  `stretch_w4`='$_POST[stretch_w4]',
		  `stretch_l5`='$_POST[stretch_l5]',
		  `stretch_w5`='$_POST[stretch_w5]',
		  `stretch_note`='$_POST[stretch_note]',
		  `recover_l1`='$_POST[recover_l1]',
		  `recover_w1`='$_POST[recover_w1]',
		  `recover_l2`='$_POST[recover_l2]',
		  `recover_w2`='$_POST[recover_w2]',
		  `recover_l3`='$_POST[recover_l3]',
		  `recover_w3`='$_POST[recover_w3]',
		  `recover_l4`='$_POST[recover_l4]',
		  `recover_w4`='$_POST[recover_w4]',
		  `recover_l5`='$_POST[recover_l5]',
		  `recover_w5`='$_POST[recover_w5]',
		  `recover_note`='$_POST[recover_note]',
		  `growth_l1`='$_POST[growth_l1]',
		  `growth_w1`='$_POST[growth_w1]',
		  `growth_l2`='$_POST[growth_l2]',
		  `growth_w2`='$_POST[growth_w2]',
		  `growth_note`='$_POST[growth_note]',
		  `apper_ch1`='$_POST[apper_ch1]',
		  `apper_ch2`='$_POST[apper_ch2]',
		  `apper_ch3`='$_POST[apper_ch3]',
		  `apper_st`='$_POST[apper_st]',
		  `apper_pf1`='$_POST[apper_pf1]',
		  `apper_pf2`='$_POST[apper_pf2]',
		  `apper_pf3`='$_POST[apper_pf3]',
		  `apper_pb1`='$_POST[apper_pb1]',
		  `apper_pb2`='$_POST[apper_pb2]',
		  `apper_pb3`='$_POST[apper_pb3]',
	 	  `apper_note`='$_POST[apper_note]',		  
		  `tgl_update`=now()
		  WHERE `id_nokk`='$rcek[id]'");
	 if($sqlPHY){
		 echo "<script>swal({
  title: 'Data Physical Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='Testing-$nokk'; 
  }
});</script>";
	 }
	 }else if($_POST[physical_save]=="save"){
	$sqlPHY=mysql_query("INSERT INTO tbl_tq_test SET 
		  `id_nokk`='$rcek[id]',
		  `flamability`='$_POST[flamability]',
		  `fla_note`='$_POST[fla_note]',
		  `fc_cott`='$_POST[fc_cott]',
		  `fc_poly`='$_POST[fc_poly]',
		  `fc_elastane`='$_POST[fc_ela]',
		  `fiber_note`='$_POST[fiber_note]',
		  `fc_wpi`='$_POST[wpi]',
		  `fc_cpi`='$_POST[cpi]',
		  `fc_note`='$_POST[fc_note]',
		  `f_weight`='$_POST[fabric_weight]',
		  `fwe_note`='$_POST[fwe_note]',
		  `f_width`='$_POST[fabric_width]',
		  `fwi_note`='$_POST[fwi_note]',
		  `bow`='$_POST[bow]',
		  `skew`='$_POST[skew]',
		  `bas_note`='$_POST[bas_note]',
		  `shrinkage_l1`='$_POST[shrinkage_len1]',
		  `shrinkage_l2`='$_POST[shrinkage_len2]',
		  `shrinkage_l3`='$_POST[shrinkage_len3]',
		  `shrinkage_l4`='$_POST[shrinkage_len4]',
		  `shrinkage_l5`='$_POST[shrinkage_len5]',
		  `shrinkage_l6`='$_POST[shrinkage_len6]',
		  `shrinkage_w1`='$_POST[shrinkage_wid1]',
		  `shrinkage_w2`='$_POST[shrinkage_wid2]',
		  `shrinkage_w3`='$_POST[shrinkage_wid3]',
		  `shrinkage_w4`='$_POST[shrinkage_wid4]',
		  `shrinkage_w5`='$_POST[shrinkage_wid5]',
		  `shrinkage_w6`='$_POST[shrinkage_wid6]',
		  `spirality1`='$_POST[spirality1]',
		  `spirality2`='$_POST[spirality2]',
		  `spirality3`='$_POST[spirality3]',
		  `spirality4`='$_POST[spirality4]',
		  `spirality5`='$_POST[spirality5]',
		  `spirality6`='$_POST[spirality6]',
		  `sns_note`='$_POST[sns_note]',
		  `pm_f1`='$_POST[pillingm_f1]',
		  `pm_b1`='$_POST[pillingm_b1]',
		  `pm_f2`='$_POST[pillingm_f2]',
		  `pm_b2`='$_POST[pillingm_b2]',
		  `pm_f3`='$_POST[pillingm_f3]',
		  `pm_b3`='$_POST[pillingm_b3]',
		  `pm_f4`='$_POST[pillingm_f4]',
		  `pm_b4`='$_POST[pillingm_b4]',
		  `pm_f5`='$_POST[pillingm_f5]',
		  `pm_b5`='$_POST[pillingm_b5]',
		  `pillm_note`='$_POST[pillm_note]',
		  `pb_f1`='$_POST[pillingb_f1]',
		  `pb_b1`='$_POST[pillingb_b1]',
		  `pb_f2`='$_POST[pillingb_f2]',
		  `pb_b2`='$_POST[pillingb_b2]',
		  `pb_f3`='$_POST[pillingb_f3]',
		  `pb_b3`='$_POST[pillingb_b3]',
		  `pb_f4`='$_POST[pillingb_f4]',
		  `pb_b4`='$_POST[pillingb_b4]',
		  `pb_f5`='$_POST[pillingb_f5]',
		  `pb_b5`='$_POST[pillingb_b5]',
		  `pillb_note`='$_POST[pillb_note]',
		  `prt_f1`='$_POST[pillingrt_f1]',
		  `prt_b1`='$_POST[pillingrt_b1]',
		  `prt_f2`='$_POST[pillingrt_f2]',
		  `prt_b2`='$_POST[pillingrt_b2]',
		  `prt_f3`='$_POST[pillingrt_f3]',
		  `prt_b3`='$_POST[pillingrt_b3]',
		  `prt_f4`='$_POST[pillingrt_f4]',
		  `prt_b4`='$_POST[pillingrt_b4]',
		  `prt_f5`='$_POST[pillingrt_f5]',
		  `prt_b5`='$_POST[pillingrt_b5]',
		  `pillr_note`='$_POST[pillr_note]',
		  `abration`='$_POST[abr]',
		  `abr_note`='$_POST[abr_note]',
		  `sm_l1`='$_POST[snaggingm_l1]',
		  `sm_w1`='$_POST[snaggingm_w1]',
		  `sm_l2`='$_POST[snaggingm_l2]',
		  `sm_w2`='$_POST[snaggingm_w2]',
		  `sm_l3`='$_POST[snaggingm_l3]',
		  `sm_w3`='$_POST[snaggingm_w3]',
		  `sm_l4`='$_POST[snaggingm_l4]',
		  `sm_w4`='$_POST[snaggingm_w4]',
		  `snam_note`='$_POST[snam_note]',
		  `sp_grdl1` ='$_POST[sp_grdl1]',
		  `sp_clsl1` ='$_POST[sp_clsl1]',
		  `sp_shol1` ='$_POST[sp_shol1]',
		  `sp_medl1` ='$_POST[sp_medl1]',
		  `sp_lonl1` ='$_POST[sp_lonl1]',
		  `sp_grdw1` ='$_POST[sp_grdw1]',
		  `sp_clsw1` ='$_POST[sp_clsw1]',
		  `sp_show1` ='$_POST[sp_show1]',
		  `sp_medw1` ='$_POST[sp_medw1]',
		  `sp_lonw1` ='$_POST[sp_lonw1]',
		  `sp_grdl2` ='$_POST[sp_grdl2]',
		  `sp_clsl2` ='$_POST[sp_clsl2]',
		  `sp_shol2` ='$_POST[sp_shol2]',
		  `sp_medl2` ='$_POST[sp_medl2]',
		  `sp_lonl2` ='$_POST[sp_lonl2]',
		  `sp_grdw2` ='$_POST[sp_grdw2]',
		  `sp_clsw2` ='$_POST[sp_clsw2]',
		  `sp_show2` ='$_POST[sp_show2]',
		  `sp_medw2` ='$_POST[sp_medw2]',
		  `sp_lonw2` ='$_POST[sp_lonw2]',
		  `snap_note`='$_POST[snap_note]',
		  `sb_l1`='$_POST[snaggingb_l1]',
		  `sb_w1`='$_POST[snaggingb_w1]',
		  `sb_l2`='$_POST[snaggingb_l2]',
		  `sb_w2`='$_POST[snaggingb_w2]',
		  `sb_l3`='$_POST[snaggingb_l3]',
		  `sb_w3`='$_POST[snaggingb_w3]',
		  `sb_l4`='$_POST[snaggingb_l4]',
		  `sb_w4`='$_POST[snaggingb_w4]',
		  `snab_note`='$_POST[snab_note]',
		  `bs_instron`='$_POST[instron]',
		  `bs_mullen`='$_POST[mullen]',
		  `bs_tru`='$_POST[tru_burst]',
		  `burs_note`='$_POST[burs_note]',
		  `thick1`='$_POST[thick1]',
		  `thick2`='$_POST[thick2]',
		  `thick3`='$_POST[thick3]',
		  `thickav`='$_POST[thickav]',
		  `thick_note`='$_POST[thick_note]',
		  `stretch_l1`='$_POST[stretch_l1]',
		  `stretch_w1`='$_POST[stretch_w1]',
		  `stretch_l2`='$_POST[stretch_l2]',
		  `stretch_w2`='$_POST[stretch_w2]',
		  `stretch_l3`='$_POST[stretch_l3]',
		  `stretch_w3`='$_POST[stretch_w3]',
		  `stretch_l4`='$_POST[stretch_l4]',
		  `stretch_w4`='$_POST[stretch_w4]',
		  `stretch_l5`='$_POST[stretch_l5]',
		  `stretch_w5`='$_POST[stretch_w5]',
		  `stretch_note`='$_POST[stretch_note]',
		  `recover_l1`='$_POST[recover_l1]',
		  `recover_w1`='$_POST[recover_w1]',
		  `recover_l2`='$_POST[recover_l2]',
		  `recover_w2`='$_POST[recover_w2]',
		  `recover_l3`='$_POST[recover_l3]',
		  `recover_w3`='$_POST[recover_w3]',
		  `recover_l4`='$_POST[recover_l4]',
		  `recover_w4`='$_POST[recover_w4]',
		  `recover_l5`='$_POST[recover_l5]',
		  `recover_w5`='$_POST[recover_w5]',
		  `recover_note`='$_POST[recover_note]',
		  `growth_l1`='$_POST[growth_l1]',
		  `growth_w1`='$_POST[growth_w1]',
		  `growth_l2`='$_POST[growth_l2]',
		  `growth_w2`='$_POST[growth_w2]',
		  `growth_note`='$_POST[growth_note]',
		  `apper_ch1`='$_POST[apper_ch1]',
		  `apper_ch2`='$_POST[apper_ch2]',
		  `apper_ch3`='$_POST[apper_ch3]',
		  `apper_st`='$_POST[apper_st]',
		  `apper_pf1`='$_POST[apper_pf1]',
		  `apper_pf2`='$_POST[apper_pf2]',
		  `apper_pf3`='$_POST[apper_pf3]',
		  `apper_pb1`='$_POST[apper_pb1]',
		  `apper_pb2`='$_POST[apper_pb2]',
		  `apper_pb3`='$_POST[apper_pb3]',
	 	  `apper_note`='$_POST[apper_note]',
		  `wick_l1`='$_POST[wick_l1]',
		  `wick_w1`='$_POST[wick_w1]',
		  `wick_l2`='$_POST[wick_l2]',
		  `wick_w2`='$_POST[wick_w2]',
		  `wick_l3`='$_POST[wick_l3]',
		  `wick_w3`='$_POST[wick_w3]',
		  `wick_note`='$_POST[wick_note]',
		  `absor_f1`='$_POST[absor_f1]',
		  `absor_f2`='$_POST[absor_f2]',
		  `absor_f3`='$_POST[absor_f3]',
		  `absor_b1`='$_POST[absor_b1]',
		  `absor_b2`='$_POST[absor_b2]',
		  `absor_b3`='$_POST[absor_b3]',
		  `absor_note`='$_POST[absor_note]',
		  `dry1`='$_POST[dry1]',
		  `dry2`='$_POST[dry2]',
		  `dry3`='$_POST[dry3]',
		  `dry_note`='$_POST[dry_note]',
		  `repp1`='$_POST[repp1]',
		  `repp2`='$_POST[repp3]',
		  `repp3`='$_POST[repp3]',
		  `repp4`='$_POST[repp4]',
		  `repp_note`='$_POST[repp_note]',
		  `ph`='$_POST[ph]',
		  `ph_note`='$_POST[ph_note]',
		  `phenolic_colorchange`='$_POST[phenolic_colorchange]',
		  `phenolic_note`='$_POST[phenolic_note]',
		  `tgl_buat`=now(),
		  `tgl_update`=now()");
	 if($sqlPHY){
		 echo "<script>swal({
  title: 'Data Physical Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='Testing-$nokk'; 
  }
});</script>";
	 }else{
		echo "<script>swal({
  title: 'Data Physical Gagal Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'error',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='Testing-$nokk'; 
  }
});</script>"; 
	 }
	
}
if($_POST[colorfastness_save]=="save"){
	echo "<script>swal({
  title: 'colorfastness save',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='Testing-$nokk'; 
  }
});</script>";
}
if($_POST[functional_save]=="save" and $cek1>0){
	$sqlFPH=mysql_query("UPDATE tbl_tq_test SET
	`wick_l1` = '$_POST[wick_l1]',
	`wick_w1` = '$_POST[wick_w1]',
	`wick_l2` = '$_POST[wick_l2]',
	`wick_w2` = '$_POST[wick_w2]',
	`wick_l3` = '$_POST[wick_l3]',
	`wick_w3` = '$_POST[wick_w3]',
	`wick_note` = '$_POST[wick_note]',
	`absor_f1` = '$_POST[absor_f1]',
	`absor_f2` = '$_POST[absor_f2]',
	`absor_f3` = '$_POST[absor_f3]',
	`absor_b1` = '$_POST[absor_b1]',
	`absor_b2` = '$_POST[absor_b2]',
	`absor_b3` = '$_POST[absor_b3]',
	`absor_note` = '$_POST[absor_note]',
	`dry1` = '$_POST[dry1]',
	`dry2` = '$_POST[dry2]',
	`dry3` = '$_POST[dry3]',
	`dry_note` = '$_POST[dry_note]',
	`repp1` = '$_POST[repp1]',
	`repp2` = '$_POST[repp2]',
	`repp3` = '$_POST[repp3]',
	`repp4` = '$_POST[repp4]',
	`repp_note` = '$_POST[repp_note]',
	`ph` = '$_POST[ph]',
	`ph_note` = '$_POST[ph_note]',
	`phenolic_colorchange`='$_POST[phenolic_colorchange]',
	`phenolic_note`='$_POST[phenolic_note]', 
	`tgl_update`=now()
    WHERE `id_nokk`='$rcek[id]'
	");
	if($sqlFPH){
	echo "<script>swal({
  title: 'functional save',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='Testing-$nokk'; 
  }
});</script>";
	}
}else if($_POST[functional_save]=="save"){
	$sqlFPH=mysql_query("INSERT tbl_tq_test SET
	`id_nokk`='$rcek[id]',
	`wick_l1` = '$_POST[wick_l1]',
	`wick_w1` = '$_POST[wick_w1]',
	`wick_l2` = '$_POST[wick_l2]',
	`wick_w2` = '$_POST[wick_w2]',
	`wick_l3` = '$_POST[wick_l3]',
	`wick_w3` = '$_POST[wick_w3]',
	`wick_note` = '$_POST[wick_note]',
	`absor_f1` = '$_POST[absor_f1]',
	`absor_f2` = '$_POST[absor_f2]',
	`absor_f3` = '$_POST[absor_f3]',
	`absor_b1` = '$_POST[absor_b1]',
	`absor_b2` = '$_POST[absor_b2]',
	`absor_b3` = '$_POST[absor_b3]',
	`absor_note` = '$_POST[absor_note]',
	`dry1` = '$_POST[dry1]',
	`dry2` = '$_POST[dry2]',
	`dry3` = '$_POST[dry3]',
	`dry_note` = '$_POST[dry_note]',
	`repp1` = '$_POST[repp1]',
	`repp2` = '$_POST[repp2]',
	`repp3` = '$_POST[repp3]',
	`repp4` = '$_POST[repp4]',
	`repp_note` = '$_POST[repp_note]',
	`ph` = '$_POST[ph]',
	`ph_note` = '$_POST[ph_note]',
	`phenolic_colorchange`='$_POST[phenolic_colorchange]',
	`phenolic_note`='$_POST[phenolic_note]',
	`tgl_buat`=now(),
	`tgl_update`=now()    
	");
	if($sqlFPH){
	echo "<script>swal({
  title: 'functional save',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='Testing-$nokk'; 
  }
});</script>";
	}
}
if($nokk!="" and $cek==0){
	 echo "<script>swal({
  title: 'No Kartu Tidak Ditemukan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'info',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='Testing'; 
  }
});</script>";
}
?>
