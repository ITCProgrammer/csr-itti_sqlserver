<!--12 Febuari 2024 15:05-->  

<style>
input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
 
input[type="number"] {
    -moz-appearance: textfield;
}
</style>
<style>
		.sc {
		border-collapse: collapse;
			width: 100%;
		}
		.sc, .sc th, .sc td {
		border: 1px solid #fff;
		text-align: left;
		padding:2px
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

function hitungdis(){
	var dcott=document.forms['form1']['dfc_cott'].value;
	var dpoly=document.forms['form1']['dfc_poly'].value;
	var delastane=document.forms['form1']['dfc_ela'].value;
	var dtotal;
	    if(dcott>0){dcott=document.forms['form1']['dfc_cott'].value;}else{ dcott=0;}
		if(dpoly>0){dpoly=document.forms['form1']['dfc_poly'].value;}else{ dpoly=0;}
		if(delastane>0){delastane=document.forms['form1']['dfc_ela'].value;}else{delastane=0;}
		dtotal=roundToTwo((parseFloat(dcott)+parseFloat(dpoly)+parseFloat(delastane))).toFixed(2);
		document.forms['form1']['dfc_total'].value=dtotal;
}

</script>
<script>
	function tampil(){
	if(document.forms['form1']['jns_test'].value=="FLAMMABILITY"){
		if(document.forms['form1']['stat_fla'].value=="RANDOM"){
		$("#ranfla").css("display", "");  // To unhide
		}else{
			$("#ranfla").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fla'].value=="DISPOSISI"){
		$("#disfla").css("display", "");  // To unhide
		}else{
			$("#disfla").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fla'].value=="MARGINAL PASS"){
		$("#marfla").css("display", "");  // To unhide
		}else{
			$("#marfla").css("display", "none");  // To hide
		}
		$("#fla1").css("display", "");  // To unhide
		$("#stat_fla").css("display", "");  // To unhide
	}else{
		$("#fla1").css("display", "none");  // To hide
		$("#stat_fla").css("display", "none");  // To hide
		$("#disfla").css("display", "none");  // To hide
		$("#ranfla").css("display", "none");  // To hide
		$("#marfla").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="FIBER CONTENT"){
		if(document.forms['form1']['stat_fib'].value=="RANDOM"){
		$("#ranfib").css("display", "");  // To unhide
		$("#ranfib1").css("display", "");  // To unhide
		}else{
			$("#ranfib").css("display", "none");  // To hide
			$("#ranfib1").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fib'].value=="DISPOSISI"){
		$("#disfib").css("display", "");  // To unhide
		$("#disfib1").css("display", "");  // To unhide
		}else{
			$("#disfib").css("display", "none");  // To hide
			$("#disfib1").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fib'].value=="MARGINAL PASS"){
		$("#marfib").css("display", "");  // To unhide
		$("#marfib1").css("display", "");  // To unhide
		}else{
			$("#marfib").css("display", "none");  // To hide
			$("#marfib1").css("display", "none");  // To hide
		}
		$("#fib1").css("display", "");  // To unhide
		$("#fib2").css("display", "");  // To unhide
		$("#stat_fib").css("display", "");  // To unhide
	}else{
		$("#fib1").css("display", "none");  // To hide
		$("#fib2").css("display", "none");  // To hide
		$("#stat_fib").css("display", "none");  // To hide
		$("#disfib").css("display", "none");  // To hide
		$("#disfib1").css("display", "none");  // To hide
		$("#ranfib").css("display", "none");  // To hide
		$("#ranfib1").css("display", "none");  // To hide
		$("#marfib").css("display", "none");  // To hide
		$("#marfib1").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="FABRIC COUNT"){
		if(document.forms['form1']['stat_fc'].value=="RANDOM"){
		$("#ranfc").css("display", "");  // To unhide
		}else{
			$("#ranfc").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fc'].value=="DISPOSISI"){
		$("#disfc").css("display", "");  // To unhide
		}else{
			$("#disfc").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fc'].value=="MARGINAL PASS"){
		$("#marfc").css("display", "");  // To unhide
		}else{
			$("#marfc").css("display", "none");  // To hide
		}
		$("#fc3").css("display", "");  // To unhide
		$("#stat_fc").css("display", "");  // To unhide
	}else{
		$("#fc3").css("display", "none");  // To hide
		$("#stat_fc").css("display", "none");  // To hide
		$("#disfc").css("display", "none");  // To hide
		$("#ranfc").css("display", "none");  // To hide
		$("#marfc").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="FABRIC WEIGHT & SHRINKAGE & SPIRALITY"){
		if(document.forms['form1']['stat_fwss2'].value=="RANDOM"){
		$("#ranfw").css("display", "");  // To unhide
		}else{
			$("#ranfw").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fwss2'].value=="DISPOSISI"){
		$("#disfw").css("display", "");  // To unhide
		}else{
			$("#disfw").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fwss2'].value=="MARGINAL PASS"){
		$("#marfw").css("display", "");  // To unhide
		}else{
			$("#marfw").css("display", "none");  // To hide
		}
		$("#fc4").css("display", "");  // To unhide 
		$("#stat_fwss2").css("display", "");  // To unhide 
	}else{
		$("#fc4").css("display", "none");  // To hide
		$("#stat_fwss2").css("display", "none");  // To hide
		$("#disfw").css("display", "none");  // To hide
		$("#ranfw").css("display", "none");  // To hide
		$("#marfw").css("display", "none");  // To hide
		$("#dis_spirality_status").css("display", "none");  // To hide	
	}	
	if(document.forms['form1']['jns_test'].value=="FABRIC WEIGHT & SHRINKAGE & SPIRALITY"){
		if(document.forms['form1']['stat_fwss3'].value=="RANDOM"){
		$("#ranfwi").css("display", "");  // To unhide
		}else{
			$("#ranfwi").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fwss3'].value=="DISPOSISI"){
		$("#disfwi").css("display", "");  // To unhide
		}else{
			$("#disfwi").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fwss3'].value=="MARGINAL PASS"){
		$("#marfwi").css("display", "");  // To unhide
		}else{
			$("#marfwi").css("display", "none");  // To hide
		}
		$("#fc5").css("display", "");  // To unhide 
		$("#stat_fwss3").css("display", "");  // To unhide 
	}else{
		$("#fc5").css("display", "none");  // To hide
		$("#stat_fwss3").css("display", "none");  // To hide
		$("#disfwi").css("display", "none");  // To hide
		$("#ranfwi").css("display", "none");  // To hide
		$("#marfwi").css("display", "none");  // To hide
	}	
	if(document.forms['form1']['jns_test'].value=="BOW & SKEW"){
		if(document.forms['form1']['stat_bsk'].value=="RANDOM"){
		$("#ranbsk").css("display", "");  // To unhide
		}else{
			$("#ranbsk").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_bsk'].value=="DISPOSISI"){
		$("#disbsk").css("display", "");  // To unhide
		}else{
			$("#disbsk").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_bsk'].value=="MARGINAL PASS"){
		$("#marbsk").css("display", "");  // To unhide
		}else{
			$("#marbsk").css("display", "none");  // To hide
		}
		$("#fc6").css("display", "");  // To unhide
		$("#stat_bsk").css("display", "");  // To unhide
	}else{
		$("#fc6").css("display", "none");  // To hide
		$("#stat_bsk").css("display", "none");  // To hide
		$("#disbsk").css("display", "none");  // To hide
		$("#ranbsk").css("display", "none");  // To hide
		$("#marbsk").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="FABRIC WEIGHT & SHRINKAGE & SPIRALITY"){
		if(document.forms['form1']['stat_fwss'].value=="RANDOM"){
		$("#ranss").css("display", "");  // To unhide
		$("#ranapss").css("display", "");  // To unhide
		}else{
			$("#ranss").css("display", "none");  // To hide
			$("#ranapss").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fwss'].value=="DISPOSISI"){
		$("#dis_ss").css("display", "");  // To unhide
		$("#disapss").css("display", "");  // To unhide
		}else{
			$("#dis_ss").css("display", "none");  // To hide
			$("#disapss").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fwss'].value=="MARGINAL PASS"){
		$("#mar_ss").css("display", "");  // To unhide
		$("#marapss").css("display", "");  // To unhide
		}else{
			$("#mar_ss").css("display", "none");  // To hide
			$("#marapss").css("display", "none");  // To hide
		}
		$("#fc7").css("display", "");  // To unhide
		$("#stat_fwss").css("display", "");  // To unhide 
	}else{
		$("#fc7").css("display", "none");  // To hide
		$("#stat_fwss").css("display", "none");  // To hide
		$("#dis_ss").css("display", "none");  // To hide
		$("#disapss").css("display", "none");  // To hide
		$("#ranss").css("display", "none");  // To hide
		$("#ranapss").css("display", "none");  // To hide
		$("#mar_ss").css("display", "none");  // To hide
		$("#marapss").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="FABRIC WEIGHT & SHRINKAGE & SPIRALITY"){
		if(document.forms['form1']['stat_fwss'].value=="RANDOM"){
		$("#ranss").css("display", "");  // To unhide
		$("#ranapss").css("display", "");  // To unhide
		}else{
			$("#ranss").css("display", "none");  // To hide
			$("#ranapss").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fwss'].value=="DISPOSISI"){
		$("#dis_ss").css("display", "");  // To unhide
		$("#disapss").css("display", "");  // To unhide
		}else{
			$("#dis_ss").css("display", "none");  // To hide
			$("#disapss").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_fwss'].value=="MARGINAL PASS"){
		$("#mar_ss").css("display", "");  // To unhide
		$("#marapss").css("display", "");  // To unhide
		}else{
			$("#mar_ss").css("display", "none");  // To hide
			$("#marapss").css("display", "none");  // To hide
		}
		$("#fc24").css("display", "");  // To unhide
		$("#stat_fwss").css("display", "");  // To unhide 
	}else{
		$("#fc24").css("display", "none");  // To hide
		$("#stat_fwss").css("display", "none");  // To hide
		$("#dis_ss").css("display", "none");  // To hide
		$("#disapss").css("display", "none");  // To hide
		$("#ranss").css("display", "none");  // To hide
		$("#ranapss").css("display", "none");  // To hide
		$("#mar_ss").css("display", "none");  // To hide
		$("#marapss").css("display", "none");  // To hide
	}
	
	<!--spirality-->
		if(document.forms['form1']['jns_test'].value=="FABRIC WEIGHT & SHRINKAGE & SPIRALITY"){
	
		if(document.forms['form1']['stat_sparility'].value=="DISPOSISI"){
		$("#dis_spirality_status").css("display", "");  // To unhide
		
		}else{
			$("#dis_spirality_status").css("display", "none");  // To hide	
		}
	
			//$("#fc24").css("display", "");  // To unhide
			//$("#stat_fwss").css("display", "");  // To unhide
		}else{
			//$("#fc24").css("display", "none");  // To hide
			//$("#stat_fwss").css("display", "none");  // To hide
		}
		
		
	if(document.forms['form1']['jns_test'].value=="PILLING MARTINDLE"){
		if(document.forms['form1']['stat_pm'].value=="RANDOM"){
		$("#ranpm").css("display", "");  // To unhide
		}else{
			$("#ranpm").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_pm'].value=="DISPOSISI"){
		$("#dispm").css("display", "");  // To unhide
		}else{
			$("#dispm").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_pm'].value=="MARGINAL PASS"){
		$("#marpm").css("display", "");  // To unhide
		}else{
			$("#marpm").css("display", "none");  // To hide
		}
		$("#fc8").css("display", "");  // To unhide
		$("#stat_pm").css("display", "");  // To unhide 
	}else{
		$("#fc8").css("display", "none");  // To hide
		$("#stat_pm").css("display", "none");  // To hide
		$("#dispm").css("display", "none");  // To hide
		$("#ranpm").css("display", "none");  // To hide
		$("#marpm").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="PILLING BOX"){
		if(document.forms['form1']['stat_pb'].value=="RANDOM"){
		$("#ranpb").css("display", "");  // To unhide
		}else{
			$("#ranpb").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_pb'].value=="DISPOSISI"){
		$("#dispb").css("display", "");  // To unhide
		}else{
			$("#dispb").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_pb'].value=="MARGINAL PASS"){
		$("#marpb").css("display", "");  // To unhide
		}else{
			$("#marpb").css("display", "none");  // To hide
		}
		$("#fc9").css("display", "");  // To unhide
		$("#stat_pb").css("display", "");  // To unhide
	}else{
		$("#fc9").css("display", "none");  // To hide
		$("#stat_pb").css("display", "none");  // To hide
		$("#dispb").css("display", "none");  // To hide
		$("#ranpb").css("display", "none");  // To hide
		$("#marpb").css("display", "none");  // To hide
	}	
	if(document.forms['form1']['jns_test'].value=="PILLING RANDOM TUMBLER"){
		if(document.forms['form1']['stat_prt'].value=="RANDOM"){
		$("#ranprt").css("display", "");  // To unhide
		}else{
			$("#ranprt").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_prt'].value=="DISPOSISI"){
		$("#disprt").css("display", "");  // To unhide
		}else{
			$("#disprt").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_prt'].value=="MARGINAL PASS"){
		$("#marprt").css("display", "");  // To unhide
		}else{
			$("#marprt").css("display", "none");  // To hide
		}
		$("#fc10").css("display", "");  // To unhide
		$("#stat_prt").css("display", "");  // To unhide
	}else{
		$("#fc10").css("display", "none");  // To hide
		$("#stat_prt").css("display", "none");  // To hide
		$("#disprt").css("display", "none");  // To hide
		$("#ranprt").css("display", "none");  // To hide
		$("#marprt").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="ABRATION"){
		if(document.forms['form1']['stat_abr'].value=="RANDOM"){
		$("#ranabr").css("display", "");  // To unhide
		}else{
			$("#ranabr").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_abr'].value=="DISPOSISI"){
		$("#disabr").css("display", "");  // To unhide
		}else{
			$("#disabr").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_abr'].value=="MARGINAL PASS"){
		$("#marabr").css("display", "");  // To unhide
		}else{
			$("#marabr").css("display", "none");  // To hide
		}
		$("#fc11").css("display", "");  // To unhide
		$("#stat_abr").css("display", "");  // To unhide
	}else{
		$("#fc11").css("display", "none");  // To hide
		$("#stat_abr").css("display", "none");  // To hide
		$("#disabr").css("display", "none");  // To hide
		$("#ranabr").css("display", "none");  // To hide
		$("#marabr").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="SNAGGING MACE"){
		if(document.forms['form1']['stat_sm'].value=="RANDOM"){
		$("#ransm").css("display", "");  // To unhide
		}else{
			$("#ransm").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_sm'].value=="DISPOSISI"){
		$("#dissm").css("display", "");  // To unhide
		}else{
			$("#dissm").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_sm'].value=="MARGINAL PASS"){
		$("#marsm").css("display", "");  // To unhide
		}else{
			$("#marsm").css("display", "none");  // To hide
		}
		$("#fc12").css("display", "");  // To unhide
		$("#stat_sm").css("display", "");  // To unhide
	}else{
		$("#fc12").css("display", "none");  // To hide
		$("#stat_sm").css("display", "none");  // To hide
		$("#dissm").css("display", "none");  // To hide
		$("#ransm").css("display", "none");  // To hide
		$("#marsm").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="SNAGGING POD"){
		if(document.forms['form1']['stat_sp'].value=="RANDOM"){
		$("#ransp").css("display", "");  // To unhide
		}else{
			$("#ransp").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_sp'].value=="DISPOSISI"){
		$("#dissp").css("display", "");  // To unhide
		}else{
			$("#dissp").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_sp'].value=="MARGINAL PASS"){
		$("#marsp").css("display", "");  // To unhide
		}else{
			$("#marsp").css("display", "none");  // To hide
		}
		$("#fc13").css("display", "");  // To unhide
		$("#stat_sp").css("display", "");  // To unhide
	}else{
		$("#fc13").css("display", "none");  // To hide
		$("#stat_sp").css("display", "none");  // To hide
		$("#dissp").css("display", "none");  // To hide
		$("#ransp").css("display", "none");  // To hide
		$("#marsp").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="BEAN BAG"){
		if(document.forms['form1']['stat_sb'].value=="RANDOM"){
		$("#ransb").css("display", "");  // To unhide
		}else{
			$("#ransb").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_sb'].value=="DISPOSISI"){
		$("#dissb").css("display", "");  // To unhide
		}else{
			$("#dissb").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_sb'].value=="MARGINAL PASS"){
		$("#marsb").css("display", "");  // To unhide
		}else{
			$("#marsb").css("display", "none");  // To hide
		}
		$("#fc14").css("display", "");  // To unhide
		$("#stat_sb").css("display", "");  // To unhide
	}else{
		$("#fc14").css("display", "none");  // To hide
		$("#stat_sb").css("display", "none");  // To hide
		$("#dissb").css("display", "none");  // To hide
		$("#ransb").css("display", "none");  // To hide
		$("#marsb").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="BURSTING STRENGTH"){
		if(document.forms['form1']['stat_bs2'].value=="RANDOM"){
		$("#ranbs2").css("display", "");  // To unhide
		}else{
			$("#ranbs2").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_bs2'].value=="DISPOSISI"){
		$("#disbs2").css("display", "");  // To unhide
		}else{
			$("#disbs2").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_bs2'].value=="MARGINAL PASS"){
		$("#marbs2").css("display", "");  // To unhide
		}else{
			$("#marbs2").css("display", "none");  // To hide
		}
		$("#fc15").css("display", "");  // To unhide
		$("#stat_bs2").css("display", "");  // To unhide
	}else{
		$("#fc15").css("display", "none");  // To hide
		$("#stat_bs2").css("display", "none");  // To hide
		$("#disbs2").css("display", "none");  // To hide
		$("#ranbs2").css("display", "none");  // To hide
		$("#marbs2").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="BURSTING STRENGTH"){
		if(document.forms['form1']['stat_bs'].value=="RANDOM"){
		$("#ranbs").css("display", "");  // To unhide
		}else{
			$("#ranbs").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_bs'].value=="DISPOSISI"){
		$("#disbs").css("display", "");  // To unhide
		}else{
			$("#disbs").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_bs'].value=="MARGINAL PASS"){
		$("#marbs").css("display", "");  // To unhide
		}else{
			$("#marbs").css("display", "none");  // To hide
		}
		$("#fc25").css("display", "");  // To unhide
		$("#stat_bs").css("display", "");  // To unhide
	}else{
		$("#fc25").css("display", "none");  // To hide
		$("#stat_bs").css("display", "none");  // To hide
		$("#disbs").css("display", "none");  // To hide
		$("#ranbs").css("display", "none");  // To hide
		$("#marbs").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="BURSTING STRENGTH"){
		if(document.forms['form1']['stat_bs3'].value=="RANDOM"){
		$("#ranbs3").css("display", "");  // To unhide
		}else{
			$("#ranbs3").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_bs3'].value=="DISPOSISI"){
		$("#disbs3").css("display", "");  // To unhide
		}else{
			$("#disbs3").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_bs3'].value=="MARGINAL PASS"){
		$("#marbs3").css("display", "");  // To unhide
		}else{
			$("#marbs3").css("display", "none");  // To hide
		}
		$("#fc26").css("display", "");  // To unhide
		$("#stat_bs3").css("display", "");  // To unhide
	}else{
		$("#fc26").css("display", "none");  // To hide
		$("#stat_bs3").css("display", "none");  // To hide
		$("#disbs3").css("display", "none");  // To hide
		$("#ranbs3").css("display", "none");  // To hide
		$("#marbs3").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="THICKNESS"){
		if(document.forms['form1']['stat_th'].value=="RANDOM"){
		$("#ranth").css("display", "");  // To unhide
		}else{
			$("#ranth").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_th'].value=="DISPOSISI"){
		$("#disth").css("display", "");  // To unhide
		}else{
			$("#disth").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_th'].value=="MARGINAL PASS"){
		$("#marth").css("display", "");  // To unhide
		}else{
			$("#marth").css("display", "none");  // To hide
		}
		$("#fc16").css("display", "");  // To unhide
		$("#stat_th").css("display", "");  // To unhide
	}else{
		$("#fc16").css("display", "none");  // To hide
		$("#stat_th").css("display", "none");  // To hide
		$("#disth").css("display", "none");  // To hide
		$("#ranth").css("display", "none");  // To hide
		$("#marth").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="STRETCH & RECOVERY"){
		if(document.forms['form1']['stat_sr'].value=="RANDOM"){
		$("#ranst").css("display", "");  // To unhide
		$("#ranrc").css("display", "");  // To unhide
		}else{
			$("#ranst").css("display", "none");  // To hide
			$("#ranrc").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_sr'].value=="DISPOSISI"){
		$("#disst").css("display", "");  // To unhide
		$("#disrc").css("display", "");  // To unhide
		}else{
			$("#disst").css("display", "none");  // To hide
			$("#disrc").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_sr'].value=="MARGINAL PASS"){
		$("#marst").css("display", "");  // To unhide
		$("#marrc").css("display", "");  // To unhide
		}else{
			$("#marst").css("display", "none");  // To hide
			$("#marrc").css("display", "none");  // To hide
		}
		$("#fc17").css("display", "");  // To unhide
		$("#stat_sr").css("display", "");  // To unhide
	}else{
		$("#fc17").css("display", "none");  // To hide
		$("#stat_sr").css("display", "none");  // To hide
		$("#disst").css("display", "none");  // To hide
		$("#disrc").css("display", "none");  // To hide
		$("#ranst").css("display", "none");  // To hide
		$("#ranrc").css("display", "none");  // To hide
		$("#marst").css("display", "none");  // To hide
		$("#marrc").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="STRETCH & RECOVERY"){
		if(document.forms['form1']['stat_sr'].value=="RANDOM"){
		$("#ranst").css("display", "");  // To unhide
		$("#ranrc").css("display", "");  // To unhide
		}else{
			$("#ranst").css("display", "none");  // To hide
			$("#ranrc").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_sr'].value=="DISPOSISI"){
		$("#disst").css("display", "");  // To unhide
		$("#disrc").css("display", "");  // To unhide
		}else{
			$("#disst").css("display", "none");  // To hide
			$("#disrc").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_sr'].value=="MARGINAL PASS"){
		$("#marst").css("display", "");  // To unhide
		$("#marrc").css("display", "");  // To unhide
		}else{
			$("#marst").css("display", "none");  // To hide
			$("#marrc").css("display", "none");  // To hide
		}
		$("#fc18").css("display", "");  // To unhide 18
		$("#stat_sr").css("display", "");  // To unhide
	}else{
		$("#fc18").css("display", "none");  // To hide
		$("#stat_sr").css("display", "none");  // To hide
		$("#disst").css("display", "none");  // To hide
		$("#disrc").css("display", "none");  // To hide
		$("#ranst").css("display", "none");  // To hide
		$("#ranrc").css("display", "none");  // To hide
		$("#marst").css("display", "none");  // To hide
		$("#marrc").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="GROWTH"){
		if(document.forms['form1']['stat_gr'].value=="RANDOM"){
		$("#rangr").css("display", "");  // To unhide
		$("#rangr1").css("display", "");  // To unhide
		}else{
			$("#rangr").css("display", "none");  // To hide
			$("#rangr1").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_gr'].value=="DISPOSISI"){
		$("#disgr").css("display", "");  // To unhide
		$("#disgr1").css("display", "");  // To unhide
		}else{
			$("#disgr").css("display", "none");  // To hide
			$("#disgr1").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_gr'].value=="MARGINAL PASS"){
		$("#margr").css("display", "");  // To unhide
		$("#margr1").css("display", "");  // To unhide
		}else{
			$("#margr").css("display", "none");  // To hide
			$("#margr1").css("display", "none");  // To hide
		}
		$("#fc19").css("display", "");  // To unhide
		$("#fc27").css("display", "");  // To unhide
		$("#stat_gr").css("display", "");  // To unhide
	}else{
		$("#fc19").css("display", "none");  // To hide
		$("#fc27").css("display", "none");  // To hide
		$("#stat_gr").css("display", "none");  // To hide
		$("#disgr").css("display", "none");  // To hide
		$("#rangr").css("display", "none");  // To hide
		$("#disgr1").css("display", "none");  // To hide
		$("#rangr1").css("display", "none");  // To hide
		$("#margr").css("display", "none");  // To hide
		$("#margr1").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="APPEARANCE"){
		if(document.forms['form1']['stat_ap'].value=="RANDOM"){
		$("#ranap").css("display", "");  // To unhide
		}else{
			$("#ranap").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_ap'].value=="DISPOSISI"){
		$("#disap").css("display", "");  // To unhide
		}else{
			$("#disap").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_ap'].value=="MARGINAL PASS"){
		$("#marap").css("display", "");  // To unhide
		}else{
			$("#marap").css("display", "none");  // To hide
		}
		$("#fc20").css("display", "");  // To unhide
		$("#stat_ap").css("display", "");  // To unhide
	}else{
		$("#fc20").css("display", "none");  // To hide
		$("#stat_ap").css("display", "none");  // To hide
		$("#disap").css("display", "none");  // To hide
		$("#ranap").css("display", "none");  // To hide
		$("#marap").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="HEAT SHRINKAGE"){
		if(document.forms['form1']['stat_hs'].value=="RANDOM"){
		$("#ranhs").css("display", "");  // To unhide
		}else{
			$("#ranhs").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_hs'].value=="DISPOSISI"){
		$("#dishs").css("display", "");  // To unhide
		}else{
			$("#dishs").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_hs'].value=="MARGINAL PASS"){
		$("#marhs").css("display", "");  // To unhide
		}else{
			$("#marhs").css("display", "none");  // To hide
		}
		$("#fc21").css("display", "");  // To unhide
		$("#stat_hs").css("display", "");  // To unhide
	}else{
		$("#fc21").css("display", "none");  // To hide
		$("#stat_hs").css("display", "none");  // To hide
		$("#dishs").css("display", "none");  // To hide
		$("#ranhs").css("display", "none");  // To hide
		$("#marhs").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="FIBRE/FUZZ"){
		if(document.forms['form1']['stat_ff'].value=="RANDOM"){
		$("#ranff").css("display", "");  // To unhide
		}else{
			$("#ranff").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_ff'].value=="DISPOSISI"){
		$("#disff").css("display", "");  // To unhide
		}else{
			$("#disff").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_ff'].value=="MARGINAL PASS"){
		$("#marff").css("display", "");  // To unhide
		}else{
			$("#marff").css("display", "none");  // To hide
		}
		$("#fc22").css("display", "");  // To unhide
		$("#stat_ff").css("display", "");  // To unhide
	}else{
		$("#fc22").css("display", "none");  // To hide
		$("#stat_ff").css("display", "none");  // To hide
		$("#disff").css("display", "none");  // To hide
		$("#ranff").css("display", "none");  // To hide
		$("#marff").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="PILLING LOCUS"){
		if(document.forms['form1']['stat_pl'].value=="RANDOM"){
		$("#ranpl").css("display", "");  // To unhide
		}else{
			$("#ranpl").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_pl'].value=="DISPOSISI"){
		$("#displ").css("display", "");  // To unhide
		}else{
			$("#displ").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_pl'].value=="MARGINAL PASS"){
		$("#marpl").css("display", "");  // To unhide
		}else{
			$("#marpl").css("display", "none");  // To hide
		}
		$("#fc23").css("display", "");  // To unhide
		$("#stat_pl").css("display", "");  // To unhide 
	}else{
		$("#fc23").css("display", "none");  // To hide
		$("#stat_pl").css("display", "none");  // To hide
		$("#displ").css("display", "none");  // To hide
		$("#ranpl").css("display", "none");  // To hide
		$("#marpl").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="ODOUR"){
		if(document.forms['form1']['stat_odour'].value=="RANDOM"){
		$("#ranod").css("display", "");  // To unhide
		}else{
			$("#ranod").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_odour'].value=="DISPOSISI"){
		$("#disod").css("display", "");  // To unhide
		}else{
			$("#disod").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_odour'].value=="MARGINAL PASS"){
		$("#marod").css("display", "");  // To unhide
		}else{
			$("#marod").css("display", "none");  // To hide
		}
		$("#fc28").css("display", "");  // To unhide
		$("#stat_odour").css("display", "");  // To unhide 
	}else{
		$("#fc28").css("display", "none");  // To hide
		$("#stat_odour").css("display", "none");  // To hide
		$("#disod").css("display", "none");  // To hide
		$("#ranod").css("display", "none");  // To hide
		$("#marod").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="CURLING"){
		if(document.forms['form1']['stat_curling'].value=="RANDOM"){
		$("#rancur").css("display", "");  // To unhide
		}else{
			$("#rancur").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_curling'].value=="DISPOSISI"){
		$("#discur").css("display", "");  // To unhide
		}else{
			$("#discur").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_curling'].value=="MARGINAL PASS"){
		$("#marcur").css("display", "");  // To unhide
		}else{
			$("#marcur").css("display", "none");  // To hide
		}
		$("#fc29").css("display", "");  // To unhide
		$("#stat_curling").css("display", "");  // To unhide 
	}else{
		$("#fc29").css("display", "none");  // To hide
		$("#stat_curling").css("display", "none");  // To hide
		$("#discur").css("display", "none");  // To hide
		$("#rancur").css("display", "none");  // To hide
		$("#marcur").css("display", "none");  // To hide
	}
	if(document.forms['form1']['jns_test'].value=="NEDLE"){
		if(document.forms['form1']['stat_nedle'].value=="RANDOM"){
		$("#ranned").css("display", "");  // To unhide
		}else{
			$("#ranned").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_nedle'].value=="DISPOSISI"){
		$("#disned").css("display", "");  // To unhide
		}else{
			$("#disned").css("display", "none");  // To hide
		}
		if(document.forms['form1']['stat_nedle'].value=="MARGINAL PASS"){
		$("#marned").css("display", "");  // To unhide
		}else{
			$("#marned").css("display", "none");  // To hide
		}
		$("#fc30").css("display", "");  // To unhide
		$("#stat_nedle").css("display", "");  // To unhide
	}else{
		$("#fc30").css("display", "none");  // To hide
		$("#stat_nedle").css("display", "none");  // To hide
		$("#disned").css("display", "none");  // To hide
		$("#ranned").css("display", "none");  // To hide
		$("#marned").css("display", "none");  // To hide
	}
}
function tampil1(){
	if(document.forms['form3']['jns_test1'].value=="WICKING"){
		if(document.forms['form3']['stat_wic'].value=="RANDOM"){
		$("#ranwic").css("display", "");  // To unhide
		}else{
			$("#ranwic").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_wic'].value=="DISPOSISI"){
		$("#diswic").css("display", "");  // To unhide
		}else{
			$("#diswic").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_wic'].value=="MARGINAL PASS"){
		$("#marwic").css("display", "");  // To unhide
		}else{
			$("#marwic").css("display", "none");  // To hide
		}
		$("#f1").css("display", "");  // To unhide
		$("#stat_wic").css("display", "");  // To unhide
	}else{
		$("#f1").css("display", "none");  // To hide
		$("#stat_wic").css("display", "none");  // To hide
		$("#diswic").css("display", "none");  // To hide
		$("#ranwic").css("display", "none");  // To hide
		$("#marwic").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="WICKING"){
		if(document.forms['form3']['stat_wic1'].value=="RANDOM"){
		$("#ranwic1").css("display", "");  // To unhide
		}else{
			$("#ranwic1").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_wic1'].value=="DISPOSISI"){
		$("#diswic1").css("display", "");  // To unhide
		}else{
			$("#diswic1").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_wic1'].value=="MARGINAL PASS"){
		$("#marwic1").css("display", "");  // To unhide
		}else{
			$("#marwic1").css("display", "none");  // To hide
		}
		$("#f8").css("display", "");  // To unhide
		$("#stat_wic1").css("display", "");  // To unhide
	}else{
		$("#f8").css("display", "none");  // To hide
		$("#stat_wic1").css("display", "none");  // To hide
		$("#diswic1").css("display", "none");  // To hide
		$("#ranwic1").css("display", "none");  // To hide
		$("#marwic1").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="WICKING"){
		if(document.forms['form3']['stat_wic2'].value=="RANDOM"){
		$("#ranwic2").css("display", "");  // To unhide
		}else{
			$("#ranwic2").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_wic2'].value=="DISPOSISI"){
		$("#diswic2").css("display", "");  // To unhide
		}else{
			$("#diswic2").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_wic2'].value=="MARGINAL PASS"){
		$("#marwic2").css("display", "");  // To unhide
		}else{
			$("#marwic2").css("display", "none");  // To hide
		}
		$("#f9").css("display", "");  // To unhide
		$("#stat_wic2").css("display", "");  // To unhide
	}else{
		$("#f9").css("display", "none");  // To hide
		$("#stat_wic2").css("display", "none");  // To hide
		$("#diswic2").css("display", "none");  // To hide
		$("#ranwic2").css("display", "none");  // To hide
		$("#marwic2").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="WICKING"){
		if(document.forms['form3']['stat_wic3'].value=="RANDOM"){
		$("#ranwic3").css("display", "");  // To unhide
		}else{
			$("#ranwic3").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_wic3'].value=="DISPOSISI"){
		$("#diswic3").css("display", "");  // To unhide
		}else{
			$("#diswic3").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_wic3'].value=="MARGINAL PASS"){
		$("#marwic3").css("display", "");  // To unhide
		}else{
			$("#marwic3").css("display", "none");  // To hide
		}
		$("#f10").css("display", "");  // To unhide
		$("#stat_wic3").css("display", "");  // To unhide
	}else{
		$("#f10").css("display", "none");  // To hide
		$("#stat_wic3").css("display", "none");  // To hide
		$("#diswic3").css("display", "none");  // To hide
		$("#ranwic3").css("display", "none");  // To hide
		$("#marwic3").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="ABSORBENCY"){
		if(document.forms['form3']['stat_abs'].value=="RANDOM"){
		$("#ranabs").css("display", "");  // To unhide
		}else{
			$("#ranabs").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_abs'].value=="DISPOSISI"){
		$("#disabs").css("display", "");  // To unhide
		}else{
			$("#disabs").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_abs'].value=="MARGINAL PASS"){
		$("#marabs").css("display", "");  // To unhide
		}else{
			$("#marabs").css("display", "none");  // To hide
		}
		$("#f2").css("display", "");  // To unhide
		$("#stat_abs").css("display", "");  // To unhide
	}else{
		$("#f2").css("display", "none");  // To hide
		$("#stat_abs").css("display", "none");  // To hide
		$("#disabs").css("display", "none");  // To hide
		$("#ranabs").css("display", "none");  // To hide
		$("#marabs").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="ABSORBENCY"){
		if(document.forms['form3']['stat_abs1'].value=="RANDOM"){
		$("#ranabs1").css("display", "");  // To unhide
		}else{
			$("#ranabs1").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_abs1'].value=="DISPOSISI"){
		$("#disabs1").css("display", "");  // To unhide
		}else{
			$("#disabs1").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_abs1'].value=="MARGINAL PASS"){
		$("#marabs1").css("display", "");  // To unhide
		}else{
			$("#marabs1").css("display", "none");  // To hide
		}
		$("#f6").css("display", "");  // To unhide
		$("#stat_abs1").css("display", "");  // To unhide
	}else{
		$("#f6").css("display", "none");  // To hide
		$("#stat_abs1").css("display", "none");  // To hide
		$("#disabs1").css("display", "none");  // To hide
		$("#ranabs1").css("display", "none");  // To hide
		$("#marabs1").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="DRYING TIME"){
		if(document.forms['form3']['stat_dry'].value=="RANDOM"){
		$("#randry").css("display", "");  // To unhide
		}else{
			$("#randry").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_dry'].value=="DISPOSISI"){
		$("#disdry").css("display", "");  // To unhide
		}else{
			$("#disdry").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_dry'].value=="MARGINAL PASS"){
		$("#mardry").css("display", "");  // To unhide
		}else{
			$("#mardry").css("display", "none");  // To hide
		}
		$("#f3").css("display", "");  // To unhide
		$("#stat_dry").css("display", "");  // To unhide
	}else{
		$("#f3").css("display", "none");  // To hide
		$("#stat_dry").css("display", "none");  // To hide
		$("#disdry").css("display", "none");  // To hide
		$("#randry").css("display", "none");  // To hide
		$("#mardry").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="DRYING TIME"){
		if(document.forms['form3']['stat_dry1'].value=="RANDOM"){
		$("#randry1").css("display", "");  // To unhide
		}else{
			$("#randry1").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_dry1'].value=="DISPOSISI"){
		$("#disdry1").css("display", "");  // To unhide
		}else{
			$("#disdry1").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_dry1'].value=="MARGINAL PASS"){
		$("#mardry1").css("display", "");  // To unhide
		}else{
			$("#mardry1").css("display", "none");  // To hide
		}
		$("#f7").css("display", "");  // To unhide
		$("#stat_dry1").css("display", "");  // To unhide
	}else{
		$("#f7").css("display", "none");  // To hide
		$("#stat_dry1").css("display", "none");  // To hide
		$("#disdry1").css("display", "none");  // To hide
		$("#randry1").css("display", "none");  // To hide
		$("#mardry1").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="WATER REPPELENT"){
		if(document.forms['form3']['stat_wp'].value=="RANDOM"){
		$("#ranwp").css("display", "");  // To unhide
		}else{
			$("#ranwp").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_wp'].value=="DISPOSISI"){
		$("#diswp").css("display", "");  // To unhide
		}else{
			$("#diswp").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_wp'].value=="MARGINAL PASS"){
		$("#marwp").css("display", "");  // To unhide
		}else{
			$("#marwp").css("display", "none");  // To hide
		}
		$("#f4").css("display", "");  // To unhide
		$("#stat_wp").css("display", "");  // To unhide
	}else{
		$("#f4").css("display", "none");  // To hide
		$("#stat_wp").css("display", "none");  // To hide
		$("#diswp").css("display", "none");  // To hide
		$("#ranwp").css("display", "none");  // To hide
		$("#marwp").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="WATER REPPELENT"){
		if(document.forms['form3']['stat_wp1'].value=="RANDOM"){
		$("#ranwp1").css("display", "");  // To unhide
		}else{
			$("#ranwp1").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_wp1'].value=="DISPOSISI"){
		$("#diswp1").css("display", "");  // To unhide
		}else{
			$("#diswp1").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_wp1'].value=="MARGINAL PASS"){
		$("#marwp1").css("display", "");  // To unhide
		}else{
			$("#marwp1").css("display", "none");  // To hide
		}
		$("#f11").css("display", "");  // To unhide
		$("#stat_wp1").css("display", "");  // To unhide
	}else{
		$("#f11").css("display", "none");  // To hide
		$("#stat_wp1").css("display", "none");  // To hide
		$("#diswp1").css("display", "none");  // To hide
		$("#ranwp1").css("display", "none");  // To hide
		$("#marwp1").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="PH"){
		if(document.forms['form3']['stat_ph'].value=="RANDOM"){
		$("#ranph").css("display", "");  // To unhide
		}else{
			$("#ranph").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_ph'].value=="DISPOSISI"){
		$("#disph").css("display", "");  // To unhide
		}else{
			$("#disph").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_ph'].value=="MARGINAL PASS"){
		$("#marph").css("display", "");  // To unhide
		}else{
			$("#marph").css("display", "none");  // To hide
		}
		$("#f5").css("display", "");  // To unhide
		$("#stat_ph").css("display", "");  // To unhide
	}else{
		$("#f5").css("display", "none");  // To hide
		$("#stat_ph").css("display", "none");  // To hide
		$("#disph").css("display", "none");  // To hide
		$("#ranph").css("display", "none");  // To hide
		$("#marph").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="SOIL RELEASE"){
		if(document.forms['form3']['stat_sor'].value=="RANDOM"){
		$("#ransor").css("display", "");  // To unhide
		}else{
			$("#ransor").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_sor'].value=="DISPOSISI"){
		$("#dissor").css("display", "");  // To unhide
		}else{
			$("#dissor").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_sor'].value=="MARGINAL PASS"){
		$("#marsor").css("display", "");  // To unhide
		}else{
			$("#marsor").css("display", "none");  // To hide
		}
		$("#f24").css("display", "");  // To unhide
		$("#stat_sor").css("display", "");  // To unhide
	}else{
		$("#f24").css("display", "none");  // To hide
		$("#stat_sor").css("display", "none");  // To hide
		$("#dissor").css("display", "none");  // To hide
		$("#ransor").css("display", "none");  // To hide
		$("#marsor").css("display", "none");  // To hide
	}
	if(document.forms['form3']['jns_test1'].value=="HUMIDITY"){
		if(document.forms['form3']['stat_hum'].value=="RANDOM"){
		$("#ranhum").css("display", "");  // To unhide
		}else{
			$("#ranhum").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_hum'].value=="DISPOSISI"){
		$("#dishum").css("display", "");  // To unhide
		}else{
			$("#dishum").css("display", "none");  // To hide
		}
		if(document.forms['form3']['stat_hum'].value=="MARGINAL PASS"){
		$("#marhum").css("display", "");  // To unhide
		}else{
			$("#marhum").css("display", "none");  // To hide
		}
		$("#f25").css("display", "");  // To unhide
		$("#stat_hum").css("display", "");  // To unhide
	}else{
		$("#f25").css("display", "none");  // To hide
		$("#stat_hum").css("display", "none");  // To hide
		$("#dishum").css("display", "none");  // To hide
		$("#ranhum").css("display", "none");  // To hide
		$("#marhum").css("display", "none");  // To hide
	}
}
function tampil2(){
	if(document.forms['form2']['jns_test2'].value=="WASHING"){
		if(document.forms['form2']['stat_wf'].value=="RANDOM"){
		$("#ranwf").css("display", "");  // To unhide
		}else{
			$("#ranwf").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_wf'].value=="DISPOSISI"){
		$("#diswf").css("display", "");  // To unhide
		}else{
			$("#diswf").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_wf'].value=="MARGINAL PASS"){
		$("#marwf").css("display", "");  // To unhide
		}else{
			$("#marwf").css("display", "none");  // To hide
		}
		$("#c1").css("display", "");  // To unhide
		$("#stat_wf").css("display", "");  // To unhide
	}else{
		$("#c1").css("display", "none");  // To hide
		$("#stat_wf").css("display", "none");  // To hide
		$("#diswf").css("display", "none");  // To hide
		$("#ranwf").css("display", "none");  // To hide
		$("#marwf").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="WATER"){
		if(document.forms['form2']['stat_wtr'].value=="RANDOM"){
		$("#ranwtr").css("display", "");  // To unhide
		}else{
			$("#ranwtr").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_wtr'].value=="DISPOSISI"){
		$("#diswtr").css("display", "");  // To unhide
		}else{
			$("#diswtr").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_wtr'].value=="MARGINAL PASS"){
		$("#marwtr").css("display", "");  // To unhide
		}else{
			$("#marwtr").css("display", "none");  // To hide
		}
		$("#c2").css("display", "");  // To unhide
		$("#stat_wtr").css("display", "");  // To unhide
	}else{
		$("#c2").css("display", "none");  // To hide
		$("#stat_wtr").css("display", "none");  // To hide
		$("#diswtr").css("display", "none");  // To hide
		$("#ranwtr").css("display", "none");  // To hide
		$("#marwtr").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="PERSPIRATION ACID"){
		if(document.forms['form2']['stat_pac'].value=="RANDOM"){
		$("#ranpac").css("display", "");  // To unhide
		}else{
			$("#ranpac").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_pac'].value=="DISPOSISI"){
		$("#dispac").css("display", "");  // To unhide
		}else{
			$("#dispac").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_pac'].value=="MARGINAL PASS"){
		$("#marpac").css("display", "");  // To unhide
		}else{
			$("#marpac").css("display", "none");  // To hide
		}
		$("#c3").css("display", "");  // To unhide
		$("#stat_pac").css("display", "");  // To unhide
	}else{
		$("#c3").css("display", "none");  // To hide
		$("#stat_pac").css("display", "none");  // To hide
		$("#dispac").css("display", "none");  // To hide
		$("#ranpac").css("display", "none");  // To hide
		$("#marpac").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="PERSPIRATION ALKALINE"){
		if(document.forms['form2']['stat_pal'].value=="RANDOM"){
		$("#ranpal").css("display", "");  // To unhide
		}else{
			$("#ranpal").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_pal'].value=="DISPOSISI"){
		$("#dispal").css("display", "");  // To unhide
		}else{
			$("#dispal").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_pal'].value=="MARGINAL PASS"){
		$("#marpal").css("display", "");  // To unhide
		}else{
			$("#marpal").css("display", "none");  // To hide
		}
		$("#c4").css("display", "");  // To unhide
		$("#stat_pal").css("display", "");  // To unhide
	}else{
		$("#c4").css("display", "none");  // To hide
		$("#stat_pal").css("display", "none");  // To hide
		$("#dispal").css("display", "none");  // To hide
		$("#ranpal").css("display", "none");  // To hide
		$("#marpal").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="CROCKING"){
		if(document.forms['form2']['stat_cr'].value=="RANDOM"){
		$("#rancr").css("display", "");  // To unhide
		}else{
			$("#rancr").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_cr'].value=="DISPOSISI"){
		$("#discr").css("display", "");  // To unhide
		}else{
			$("#discr").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_cr'].value=="MARGINAL PASS"){
		$("#marcr").css("display", "");  // To unhide
		}else{
			$("#marcr").css("display", "none");  // To hide
		}
		$("#c5").css("display", "");  // To unhide
		$("#stat_cr").css("display", "");  // To unhide
	}else{
		$("#c5").css("display", "none");  // To hide
		$("#stat_cr").css("display", "none");  // To hide
		$("#discr").css("display", "none");  // To hide
		$("#rancr").css("display", "none");  // To hide
		$("#marcr").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="PHENOLIC YELLOWING"){
		if(document.forms['form2']['stat_py'].value=="RANDOM"){
		$("#ranpy").css("display", "");  // To unhide
		}else{
			$("#ranpy").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_py'].value=="DISPOSISI"){
		$("#dispy").css("display", "");  // To unhide
		}else{
			$("#dispy").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_py'].value=="MARGINAL PASS"){
		$("#marpy").css("display", "");  // To unhide
		}else{
			$("#marpy").css("display", "none");  // To hide
		}
		$("#c6").css("display", "");  // To unhide
		$("#stat_py").css("display", "");  // To unhide
	}else{
		$("#c6").css("display", "none");  // To hide
		$("#stat_py").css("display", "none");  // To hide
		$("#dispy").css("display", "none");  // To hide
		$("#ranpy").css("display", "none");  // To hide
		$("#marpy").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="COLOR MIGRATION-OVEN TEST"){
		if(document.forms['form2']['stat_cmo'].value=="RANDOM"){
		$("#rancmo").css("display", "");  // To unhide
		}else{
			$("#rancmo").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_cmo'].value=="DISPOSISI"){
		$("#discmo").css("display", "");  // To unhide
		}else{
			$("#discmo").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_cmo'].value=="MARGINAL PASS"){
		$("#marcmo").css("display", "");  // To unhide
		}else{
			$("#marcmo").css("display", "none");  // To hide
		}
		$("#c7").css("display", "");  // To unhide
		$("#stat_cmo").css("display", "");  // To unhide
	}else{
		$("#c7").css("display", "none");  // To hide
		$("#stat_cmo").css("display", "none");  // To hide
		$("#discmo").css("display", "none");  // To hid
		$("#rancmo").css("display", "none");  // To hidee
		$("#marcmo").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="COLOR MIGRATION"){
		if(document.forms['form2']['stat_cm'].value=="RANDOM"){
		$("#rancm").css("display", "");  // To unhide
		}else{
			$("#rancm").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_cm'].value=="DISPOSISI"){
		$("#discm").css("display", "");  // To unhide
		}else{
			$("#discm").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_cm'].value=="MARGINAL PASS"){
		$("#marcm").css("display", "");  // To unhide
		}else{
			$("#marcm").css("display", "none");  // To hide
		}
		$("#c8").css("display", "");  // To unhide
		$("#stat_cm").css("display", "");  // To unhide
	}else{
		$("#c8").css("display", "none");  // To hide
		$("#stat_cm").css("display", "none");  // To hide
		$("#discm").css("display", "none");  // To hide
		$("#rancm").css("display", "none");  // To hide
		$("#marcm").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="SWEAT CONCEAL"){	
		$("#conceal").css("display", "");  // To unhide	
	}else{		
		$("#conceal").css("display", "none");  // To hide		
	}
	if(document.forms['form2']['jns_test2'].value=="LIGHT"){
		if(document.forms['form2']['stat_lg'].value=="RANDOM"){
		$("#ranlg").css("display", "");  // To unhide
		}else{
			$("#ranlg").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_lg'].value=="DISPOSISI"){
		$("#dislg").css("display", "");  // To unhide
		}else{
			$("#dislg").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_lg'].value=="MARGINAL PASS"){
		$("#marlg").css("display", "");  // To unhide
		}else{
			$("#marlg").css("display", "none");  // To hide
		}
		$("#c9").css("display", "");  // To unhide
		$("#stat_lg").css("display", "");  // To unhide
	}else{
		$("#c9").css("display", "none");  // To hide
		$("#stat_lg").css("display", "none");  // To hide
		$("#dislg").css("display", "none");  // To hide
		$("#ranlg").css("display", "none");  // To hide
		$("#marlg").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="LIGHT PERSPIRATION"){
		if(document.forms['form2']['stat_lp'].value=="RANDOM"){
		$("#ranlp").css("display", "");  // To unhide
		}else{
			$("#ranlp").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_lp'].value=="DISPOSISI"){
		$("#dislp").css("display", "");  // To unhide
		}else{
			$("#dislp").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_lp'].value=="MARGINAL PASS"){
		$("#marlp").css("display", "");  // To unhide
		}else{
			$("#marlp").css("display", "none");  // To hide
		}
		$("#c10").css("display", "");  // To unhide
		$("#stat_lp").css("display", "");  // To unhide
	}else{
		$("#c10").css("display", "none");  // To hide
		$("#stat_lp").css("display", "none");  // To hide
		$("#dislp").css("display", "none");  // To hide
		$("#ranlp").css("display", "none");  // To hide
		$("#marlp").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="SALIVA"){
		if(document.forms['form2']['stat_slv'].value=="RANDOM"){
		$("#ranslv").css("display", "");  // To unhide
		}else{
			$("#ranslv").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_slv'].value=="DISPOSISI"){
		$("#disslv").css("display", "");  // To unhide
		}else{
			$("#disslv").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_slv'].value=="MARGINAL PASS"){
		$("#marslv").css("display", "");  // To unhide
		}else{
			$("#marslv").css("display", "none");  // To hide
		}
		$("#c11").css("display", "");  // To unhide
		$("#stat_slv").css("display", "");  // To unhide
	}else{
		$("#c11").css("display", "none");  // To hide
		$("#stat_slv").css("display", "none");  // To hide
		$("#disslv").css("display", "none");  // To hide
		$("#ranslv").css("display", "none");  // To hide
		$("#marslv").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="BLEEDING"){
		if(document.forms['form2']['stat_bld'].value=="RANDOM"){
		$("#ranbld").css("display", "");  // To unhide
		}else{
			$("#ranbld").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_bld'].value=="DISPOSISI"){
		$("#disbld").css("display", "");  // To unhide
		}else{
			$("#disbld").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_bld'].value=="MARGINAL PASS"){
		$("#marbld").css("display", "");  // To unhide
		}else{
			$("#marbld").css("display", "none");  // To hide
		}
		$("#c12").css("display", "");  // To unhide
		$("#stat_bld").css("display", "");  // To unhide
	}else{
		$("#c12").css("display", "none");  // To hide
		$("#stat_bld").css("display", "none");  // To hide
		$("#disbld").css("display", "none");  // To hide
		$("#ranbld").css("display", "none");  // To hide
		$("#marbld").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="CHLORIN & NON-CHLORIN"){
		if(document.forms['form2']['stat_chl'].value=="RANDOM"){
		$("#ranchl").css("display", "");  // To unhide
		}else{
			$("#ranchl").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_chl'].value=="DISPOSISI"){
		$("#dischl").css("display", "");  // To unhide
		}else{
			$("#dischl").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_chl'].value=="MARGINAL PASS"){
		$("#marchl").css("display", "");  // To unhide
		}else{
			$("#marchl").css("display", "none");  // To hide
		}
		$("#c13").css("display", "");  // To unhide
		$("#stat_chl").css("display", "");  // To unhide
	}else{
		$("#c13").css("display", "none");  // To hide
		$("#stat_chl").css("display", "none");  // To hide
		$("#dischl").css("display", "none");  // To hide
		$("#ranchl").css("display", "none");  // To hide
		$("#marchl").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="CHLORIN & NON-CHLORIN"){
		if(document.forms['form2']['stat_nchl'].value=="RANDOM"){
		$("#rannchl").css("display", "");  // To unhide
		}else{
			$("#rannchl").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_nchl'].value=="DISPOSISI"){
		$("#disnchl").css("display", "");  // To unhide
		}else{
			$("#disnchl").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_nchl'].value=="MARGINAL PASS"){
		$("#marnchl").css("display", "");  // To unhide
		}else{
			$("#marnchl").css("display", "none");  // To hide
		}
		$("#c14").css("display", "");  // To unhide
		$("#stat_nchl").css("display", "");  // To unhide
	}else{
		$("#c14").css("display", "none");  // To hide
		$("#stat_nchl").css("display", "none");  // To hide
		$("#disnchl").css("display", "none");  // To hide
		$("#rannchl").css("display", "none");  // To hide
		$("#marnchl").css("display", "none");  // To hide
	}
	if(document.forms['form2']['jns_test2'].value=="DYE TRANSFER"){
		if(document.forms['form2']['stat_dye'].value=="RANDOM"){
		$("#randye").css("display", "");  // To unhide
		}else{
			$("#randye").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_dye'].value=="DISPOSISI"){
		$("#disdye").css("display", "");  // To unhide
		}else{
			$("#disdye").css("display", "none");  // To hide
		}
		if(document.forms['form2']['stat_dye'].value=="MARGINAL PASS"){
		$("#mardye").css("display", "");  // To unhide
		}else{
			$("#mardye").css("display", "none");  // To hide
		}
		$("#c15").css("display", "");  // To unhide
		$("#stat_dye").css("display", "");  // To unhide
	}else{
		$("#c15").css("display", "none");  // To hide
		$("#stat_dye").css("display", "none");  // To hide
		$("#disdye").css("display", "none");  // To hide
		$("#randye").css("display", "none");  // To hide
		$("#mardye").css("display", "none");  // To hide
	}
}
</script>
<?php
ini_set("error_reporting", 1);
session_start();
//include"koneksi.php";

$nocounter=$_GET['nocount'];

if (!isset($nocounter)) { ?>


<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
<div class="box box-info">
   	<div class="box-header with-border">
    	<h3 class="box-title">Testing Counter1</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
  	</div>
  	<div class="box-body"> 
	 	<div class="col-md-6">
     		<div class="form-group">
	  			<input name="no_id" type="hidden" class="form-control" id="no_id"  placeholder="No ID">
                  <label for="nocount" class="col-sm-3 control-label">No Counter</label>
                  	<div class="col-sm-4">
						<div class="input-group">	  
							<input name="nocount" type="text" class="form-control" id="nocount" value="<?php echo $_GET['nocount']; ?>"
							onchange="window.location='TestingLab-'+this.value"  placeholder="No Counter" required <?php if($_SESSION['lvl_id']=="TQ"){echo "readonly";}?>>
						</div>	  
					</div>
            </div>
				<input name="nokk" type="hidden" class="form-control" id="nokk" placeholder="No Prod Order"
				value="<?php if($cek>0){echo $rcek['nokk'];} ?>" readonly="readonly" >	
		 	<div class="form-group">
                <label for="buyer" class="col-sm-3 control-label">Buyer</label>
                <div class="col-sm-8">
                    <input name="buyer" type="text" class="form-control" id="buyer" placeholder="Buyer" 
                   readonly="readonly" >
                </div>				   
            </div>
	        <div class="form-group">
                <label for="item" class="col-sm-3 control-label">Item</label>
                <div class="col-sm-5">
                    <input name="item" type="text" class="form-control" id="item" placeholder="Item" 
                    readonly="readonly" >
                </div>				   
            </div>
		 	<div class="form-group">
                <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
                <div class="col-sm-8">
					<textarea name="jns_kain" readonly="readonly" class="form-control" id="jns_kain" placeholder="Jenis Kain"></textarea>
				</div>
            </div>
				 		
	  	</div>
	  		<!-- col --> 
	  	<div class="col-md-6">
	  				  
		 	<div class="form-group">
                <label for="warna" class="col-sm-3 control-label">Warna</label>
                <div class="col-sm-8">
                	<textarea name="warna" readonly="readonly" class="form-control" id="warna" placeholder="Warna">
					
					</textarea>
                </div>				   
            </div>
		 	<div class="form-group">
                <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
                <div class="col-sm-8">
                    <textarea name="no_warna" readonly="readonly" class="form-control" id="no_warna" placeholder="No Warna"></textarea>
                </div>				   
            </div>
		 	
	 	</div>
	</div>	 
   <div class="box-footer"> 
						<?php if($nocounter!=""){ ?>
	   <!-- <a href="#" class="btn btn-info kain_approved_parsial" id="<?php echo $r['id']; ?>"> Approved Parsial</a>						
	   <a href="#" class="btn btn-danger kain_approved_full" id="<?php echo $r['id']; ?>"> Approved Full</a> -->
						<?php } ?>
	   <!-- <a href="#" class="btn btn-info kain_approved_parsial" id="<?php echo $r['id']; ?>"> Approved Parsial</a>						
	   <a href="#" class="btn btn-danger kain_approved_full" id="<?php echo $r['id']; ?>"> Approved Full</a> -->
   </div>
    <!-- /.box-footer -->
</div>
</form>
	
	

<?php exit ; } 





// exit ; 

$sqlCek=mysqli_query($conlab,"SELECT * FROM tbl_test_qc WHERE sts_laborat <> 'Cancel' and sts_qc <> 'Belum Terima Kain' and no_counter='$nocounter' ");
$cek=mysqli_num_rows($sqlCek);



$rcek=mysqli_fetch_array($sqlCek);
$buyer=$rcek['buyer'];

//penambahan pengecekan ketabel nokk demand 
$id_nokk 	= $rcek['id'];
$nocounter 	= $rcek['no_counter'];


?>	
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
<div class="box box-info">
   	<div class="box-header with-border">
    	<h3 class="box-title">Testing Counter</h3>
		<div class="box-tools pull-right">
		  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
  	</div>
  	<div class="box-body"> 
	 	<div class="col-md-6">
     		<div class="form-group">
	  			<input name="no_id" type="hidden" class="form-control" id="no_id" value="<?php echo $rcek['no_id'];?>" placeholder="No ID">
                  <label for="no_po" class="col-sm-3 control-label">No Counter</label>
                  	<div class="col-sm-4">
						<div class="input-group">	  
							<input name="nocount" type="text" class="form-control" id="nocount" 
							onchange="window.location='TestingLab-'+this.value" value="<?php echo $_GET['nocount'];?>" placeholder="No Counter" required <?php if($_SESSION['lvl_id']=="TQ"){echo "readonly";}?>>
						</div>	  
					</div>
					
					<div class="col-sm-5">
						<?php foreach ($array_no_demand_other2 as $key=>$data_other)  { 
							if ($key=='main') { $border_color = '#000';} else {$border_color = '#ddd';}
						?>
							<div style="border:solid thin <?=$border_color?>; float:left; margin-left:10px;padding:5px "><?=$data_other?></div>
						<?php }?>	 		
					</div>					
          </div>				
		  <div class="form-group">
					<label for="buyer" class="col-sm-3 control-label">Buyer</label>
					<div class="col-sm-8">
						<input name="buyer" type="text" class="form-control" id="buyer" placeholder="Buyer"
						value="<?php if($cek>0){echo $rcek['buyer'];} ?>" readonly="readonly" >
					</div>
					
                </div>
			
	        <div class="form-group">
                <label for="item" class="col-sm-3 control-label">Item</label>
                <div class="col-sm-4">
                	<input name="item" type="text" class="form-control" id="item" placeholder="Item" 
                    value="<?php if($cek>0){echo $rcek['no_item'];} ?>" readonly="readonly">
                </div>		
            </div>
		 	<div class="form-group">
                <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
                <div class="col-sm-8">
					<textarea name="jns_kain" readonly="readonly" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cek>0){echo $rcek['jenis_kain'];}?></textarea>
			  </div>
          </div> 
			 		
  	  </div>
	  		<!-- col --> 
	  	<div class="col-md-6">	  				  
	 	  <div class="form-group">
                <label for="warna" class="col-sm-3 control-label">Warna</label>
                <div class="col-sm-8">
                	<textarea name="warna" readonly="readonly" class="form-control" id="warna" placeholder="Warna"><?php if($cek>0){echo $rcek['warna'];}?></textarea>
                </div>				   
            </div>
		 	<div class="form-group">
                <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
                <div class="col-sm-8">
                    <textarea name="no_warna" readonly="readonly" class="form-control" id="no_warna" placeholder="No Warna"><?php if($cek>0){echo $rcek['no_warna'];}?></textarea>
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

$sqlCek1=mysqli_query($conlab,"SELECT *,
	CONCAT_WS(' ',fc_note,ph_note, abr_note, bas_note, dry_note, fla_note, fwe_note, fwi_note, burs_note,repp_note,wick_note,wick_note,absor_note,apper_note,fiber_note,pillb_note,pillm_note,pillr_note,thick_note,growth_note,recover_note,stretch_note,sns_note,snab_note,snam_note,snap_note,wash_note,water_note,acid_note,alkaline_note,crock_note,phenolic_note,cm_printing_note,cm_dye_note,light_note,light_pers_note,saliva_note,h_shrinkage_note,fibre_note,pilll_note,soil_note,bleeding_note,chlorin_note,dye_tf_note,humidity_note,odour_note,curling_note,nedle_note) AS note_g FROM tbl_tq_test WHERE id_nokk='$rcek[id]' ORDER BY id DESC LIMIT 1");
$cek1=mysqli_num_rows($sqlCek1);
$rcek1=mysqli_fetch_array($sqlCek1);
$sqlCekR=mysqli_query($conlab,"SELECT *,
	CONCAT_WS(' ',rfc_note,rph_note, rabr_note, rbas_note, rdry_note, rfla_note, rfwe_note, rfwi_note, rburs_note,rrepp_note,rwick_note,rabsor_note,rapper_note,rfiber_note,rpillb_note,rpillm_note,rpillr_note,rthick_note,rgrowth_note,rrecover_note,rstretch_note,rsns_note,rsnab_note,rsnam_note,rsnap_note,rwash_note,rwater_note,racid_note,ralkaline_note,rcrock_note,rphenolic_note,rcm_printing_note,rcm_dye_note,rlight_note,rlight_pers_note,rsaliva_note,rh_shrinkage_note,rfibre_note,rpilll_note,rsoil_note,rapperss_note,rbleeding_note,rchlorin_note,rdye_tf_note,rhumidity_note,rodour_note,rcurling_note,rnedle_note) AS rnote_g FROM tbl_tq_randomtest WHERE no_item='$rcek[no_item]' OR no_hanger='$rcek[no_item]'");
$cekR=mysqli_num_rows($sqlCekR);
$rcekR=mysqli_fetch_array($sqlCekR);
$sqlCekD=mysqli_query($conlab,"SELECT b.dbleeding_root, a.*,
	CONCAT_WS(' ',a.dfc_note,a.dph_note, a.dabr_note, a.dbas_note, a.ddry_note, a.dfla_note, a.dfwe_note, a.dfwi_note, a.dburs_note,a.drepp_note,a.dwick_note,a.dabsor_note,a.dapper_note,a.dfiber_note,a.dpillb_note,a.dpillm_note,a.dpillr_note,a.dthick_note,a.dgrowth_note,a.drecover_note,a.dstretch_note,a.dsns_note,a.dsnab_note,a.dsnam_note,a.dsnap_note,a.dwash_note,a.dwater_note,a.dacid_note,a.dalkaline_note,a.dcrock_note,a.dphenolic_note,a.dcm_printing_note,a.dcm_dye_note,a.dlight_note,a.dlight_pers_note,a.dsaliva_note,a.dh_shrinkage_note,a.dfibre_note,a.dpilll_note,a.dsoil_note,a.dapperss_note,a.dbleeding_note,a.dchlorin_note,a.ddye_tf_note,a.dhumidity_note,a.dodour_note,a.dcurling_note,a.dnedle_note) AS dnote_g 
	FROM tbl_tq_disptest a 
	LEFT JOIN tbl_tq_disptest_2 b on (a.id_nokk = b.id_nokk)
	WHERE a.id_nokk='$rcek[id]' ORDER BY a.id DESC LIMIT 1");
$cekD=mysqli_num_rows($sqlCekD);
$rcekD=mysqli_fetch_array($sqlCekD);
$sqlCekM=mysqli_query($conlab,"SELECT *,
	CONCAT_WS(' ',mfc_note,mph_note, mabr_note, mbas_note, mdry_note, mfla_note, mfwe_note, mfwi_note, mburs_note,mrepp_note,mwick_note,mabsor_note,mapper_note,mfiber_note,mpillb_note,mpillm_note,mpillr_note,mthick_note,mgrowth_note,mrecover_note,mstretch_note,msns_note,msnab_note,msnam_note,msnap_note,mwash_note,mwater_note,macid_note,malkaline_note,mcrock_note,mphenolic_note,mcm_printing_note,mcm_dye_note,mlight_note,mlight_pers_note,msaliva_note,mh_shrinkage_note,mfibre_note,mpilll_note,msoil_note,mapperss_note,mbleeding_note,mchlorin_note,mdye_tf_note,mhumidity_note,modour_note,mnedle_note) AS mnote_g FROM tbl_tq_marginal WHERE id_nokk='$rcek[id]' ORDER BY id DESC LIMIT 1");
$cekM=mysqli_num_rows($sqlCekM);
$rcekM=mysqli_fetch_array($sqlCekM);
$sqlCmt=mysqli_query($conlab,"SELECT *,
	CONCAT_WS(' ',apperss_note) AS note_apperss FROM tbl_tq_test WHERE id_nokk='$rcek[id]' ORDER BY id DESC LIMIT 1");
$rcekcmt=mysqli_fetch_array($sqlCmt);


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
					<li class="active"><a href="#tab_2" data-toggle="tab">COLORFASTNESS</a></li>				
				</ul>
				<div class="tab-content">				
				<div class="tab-pane active" id="tab_2">
					<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
						<div class="form-group">
							<label for="jns_test2" class="col-sm-2 control-label">JENIS TES</label>
								<div class="col-sm-3">
									<select name="jns_test2" class="form-control select2" id="jns_test2" onChange="tampil2();" style="width: 100%;">
									<option value="">Pilih</option>	  
									<?php
										$sql = "SELECT * FROM tbl_test_qc WHERE sts_laborat <> 'Cancel' and no_counter='$nocounter'";
										$result=mysqli_query($conlab,$sql);
										while($row=mysqli_fetch_array($result)){ 
										$detail=explode(",",$row['permintaan_testing']);

										$mastertest=mysqli_query($con,"SELECT colorfastness FROM tbl_masterbuyerlab_test WHERE buyer='$row[buyer]'");	
										$rmastertest=mysqli_fetch_assoc($mastertest);
										$detail_mastertest=explode(",",$rmastertest['colorfastness']);

										$detail = count($detail) - 1 > 0 ? $detail : $detail_mastertest;
									?>
										<?php foreach($detail as $key => $value):
											echo '<option value="'.$value.'">'.$value.'</option>';
										endforeach;
										?>
									<?php }?>   
									</select>
								</div>
						</div>
						<!-- WASHING BEGIN-->
						<div class="form-group" id="c1" style="display:none;">
							<label for="washing" class="col-sm-2 control-label">WASHING FASTNESS</label>
							<div class="col-sm-1">
								<label><input type="checkbox" name="wash_temp" id="wash_temp" class="minimal" value="30" <?php if($rcek1['wash_temp']=='30'){echo "checked";}?>> 30&deg;C &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="wash_temp" id="wash_temp" class="minimal" value="40" <?php if($rcek1['wash_temp']=='40'){echo "checked";}?>> 40&deg;C
								</label>
								<label><input type="checkbox" name="wash_temp" id="wash_temp" class="minimal" value="60" <?php if($rcek1['wash_temp']=='60'){echo "checked";}?>> 60&deg;C
								</label>
							</div>
							<div class="col-sm-2">
								<input name="wash_colorchange" type="text" class="form-control" id="wash_colorchange" value="<?php echo $rcek1['wash_colorchange'];?>" placeholder="4-5 Color Change">
								<input name="wash_acetate" type="text" class="form-control" id="wash_acetate" value="<?php echo $rcek1['wash_acetate'];?>" placeholder="4 Acetate">
							</div>
							<div class="col-sm-2">
								<input name="wash_cotton" type="text" class="form-control" id="wash_cotton" value="<?php echo $rcek1['wash_cotton'];?>" placeholder="4 Cotton">
								<input name="wash_nylon" type="text" class="form-control" id="wash_nylon" value="<?php echo $rcek1['wash_nylon'];?>" placeholder="4 Nylon">
							</div>
							<div class="col-sm-2">
								<input name="wash_poly" type="text" class="form-control" id="wash_poly" value="<?php echo $rcek1['wash_poly'];?>" placeholder="4 Polyester">
								<input name="wash_acrylic" type="text" class="form-control" id="wash_acrylic" value="<?php echo $rcek1['wash_acrylic'];?>" placeholder="4 Acrylic">
							</div>
							<div class="col-sm-2">
								<input name="wash_wool" type="text" class="form-control" id="wash_wool" value="<?php echo $rcek1['wash_wool'];?>" placeholder="4 Wool">
								<input name="wash_staining" type="text" class="form-control" id="wash_staining" value="<?php echo $rcek1['wash_staining'];?>" placeholder="4-5 Cross Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="wash_note" maxlength="50" rows="1"><?php echo $rcek1['wash_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_wf" style="display:none;">
							<label for="stat_wf" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_wf" class="form-control select2" id="stat_wf" onChange="tampil2();" style="width: 100%;">
									<option <?php if($rcek1['stat_wf']==""){?> selected=selected <?php };?>value="">Pilih</option>
									<option <?php if($rcek1['stat_wf']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if($rcek1['stat_wf']=="A"){?> selected=selected <?php };?>value="A">A</option>
									<option <?php if($rcek1['stat_wf']=="R"){?> selected=selected <?php };?>value="R">R</option>
									<option <?php if($rcek1['stat_wf']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
									<option <?php if($rcek1['stat_wf']=="MARGINAL PASS"){?> selected=selected <?php };?>value="MARGINAL PASS">MARGINAL PASS</option>
									<option <?php if($rcek1['stat_wf']=="DATA"){?> selected=selected <?php };?>value="DATA">DATA</option>
									<option <?php if($rcek1['stat_wf']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
									<option <?php if($rcek1['stat_wf']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="diswf" style="display:none;">
							<label for="diswf" class="col-sm-2 control-label">WASHING FASTNESS (DIS)</label>
							<div class="col-sm-1">
								<label><input type="checkbox" name="dwash_temp" id="dwash_temp" class="minimal" value="30" <?php if($rcekD['dwash_temp']=='30'){echo "checked";}?>> 30&deg;C &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="dwash_temp" id="dwash_temp" class="minimal" value="40" <?php if($rcekD['dwash_temp']=='40'){echo "checked";}?>> 40&deg;C
								</label>
							</div>
							<div class="col-sm-2">
								<input name="dwash_colorchange" type="text" class="form-control" id="dwash_colorchange" value="<?php echo $rcekD['dwash_colorchange'];?>" placeholder="4-5 Color Change">
								<input name="dwash_acetate" type="text" class="form-control" id="dwash_acetate" value="<?php echo $rcekD['dwash_acetate'];?>" placeholder="4 Acetate">
							</div>
							<div class="col-sm-2">
								<input name="dwash_cotton" type="text" class="form-control" id="dwash_cotton" value="<?php echo $rcekD['dwash_cotton'];?>" placeholder="4 Cotton">
								<input name="dwash_nylon" type="text" class="form-control" id="dwash_nylon" value="<?php echo $rcekD['dwash_nylon'];?>" placeholder="4 Nylon">
							</div>
							<div class="col-sm-2">
								<input name="dwash_poly" type="text" class="form-control" id="dwash_poly" value="<?php echo $rcekD['dwash_poly'];?>" placeholder="4 Polyester">
								<input name="dwash_acrylic" type="text" class="form-control" id="dwash_acrylic" value="<?php echo $rcekD['dwash_acrylic'];?>" placeholder="4 Acrylic">
							</div>
							<div class="col-sm-2">
								<input name="dwash_wool" type="text" class="form-control" id="dwash_wool" value="<?php echo $rcekD['dwash_wool'];?>" placeholder="4 Wool">
								<input name="dwash_staining" type="text" class="form-control" id="dwash_staining" value="<?php echo $rcekD['dwash_staining'];?>" placeholder="4-5 Cross Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dwash_note" maxlength="50" rows="1"><?php echo $rcekD['dwash_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="marwf" style="display:none;">
							<label for="marwf" class="col-sm-2 control-label">WASHING FASTNESS (MARGINAL)</label>
							<div class="col-sm-1">
								<label><input type="checkbox" name="mwash_temp" id="mwash_temp" class="minimal" value="30" <?php if($rcekM['mwash_temp']=='30'){echo "checked";}?>> 30&deg;C &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="mwash_temp" id="mwash_temp" class="minimal" value="40" <?php if($rcekM['mwash_temp']=='40'){echo "checked";}?>> 40&deg;C
								</label>
							</div>
							<div class="col-sm-2">
								<input name="mwash_colorchange" type="text" class="form-control" id="mwash_colorchange" value="<?php echo $rcekM['mwash_colorchange'];?>" placeholder="4-5 Color Change">
								<input name="mwash_acetate" type="text" class="form-control" id="mwash_acetate" value="<?php echo $rcekM['mwash_acetate'];?>" placeholder="4 Acetate">
							</div>
							<div class="col-sm-2">
								<input name="mwash_cotton" type="text" class="form-control" id="mwash_cotton" value="<?php echo $rcekM['mwash_cotton'];?>" placeholder="4 Cotton">
								<input name="mwash_nylon" type="text" class="form-control" id="mwash_nylon" value="<?php echo $rcekM['mwash_nylon'];?>" placeholder="4 Nylon">
							</div>
							<div class="col-sm-2">
								<input name="mwash_poly" type="text" class="form-control" id="mwash_poly" value="<?php echo $rcekM['mwash_poly'];?>" placeholder="4 Polyester">
								<input name="mwash_acrylic" type="text" class="form-control" id="mwash_acrylic" value="<?php echo $rcekM['mwash_acrylic'];?>" placeholder="4 Acrylic">
							</div>
							<div class="col-sm-2">
								<input name="mwash_wool" type="text" class="form-control" id="mwash_wool" value="<?php echo $rcekM['mwash_wool'];?>" placeholder="4 Wool">
								<input name="mwash_staining" type="text" class="form-control" id="mwash_staining" value="<?php echo $rcekM['mwash_staining'];?>" placeholder="4-5 Cross Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="mwash_note" maxlength="50" rows="1"><?php echo $rcekM['mwash_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranwf" style="display:none;">
							<label for="ranwf" class="col-sm-2 control-label">WASHING FASTNESS (RAN)</label>
							<div class="col-sm-1">
								<label><input type="checkbox" name="rwash_temp" id="rwash_temp" class="minimal" value="30" <?php if($rcekR['rwash_temp']=='30'){echo "checked";}?> readonly> 30&deg;C &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="rwash_temp" id="rwash_temp" class="minimal" value="40" <?php if($rcekR['rwash_temp']=='40'){echo "checked";}?> readonly> 40&deg;C
								</label>
							</div>
							<div class="col-sm-2">
								<input name="rwash_colorchange" type="text" class="form-control" id="rwash_colorchange" value="<?php echo $rcekR['rwash_colorchange'];?>" placeholder="4-5 Color Change" readonly>
								<input name="rwash_acetate" type="text" class="form-control" id="rwash_acetate" value="<?php echo $rcekR['rwash_acetate'];?>" placeholder="4 Acetate" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rwash_cotton" type="text" class="form-control" id="rwash_cotton" value="<?php echo $rcekR['rwash_cotton'];?>" placeholder="4 Cotton" readonly>
								<input name="rwash_nylon" type="text" class="form-control" id="rwash_nylon" value="<?php echo $rcekR['rwash_nylon'];?>" placeholder="4 Nylon" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rwash_poly" type="text" class="form-control" id="rwash_poly" value="<?php echo $rcekR['rwash_poly'];?>" placeholder="4 Polyester" readonly>
								<input name="rwash_acrylic" type="text" class="form-control" id="rwash_acrylic" value="<?php echo $rcekR['rwash_acrylic'];?>" placeholder="4 Acrylic" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rwash_wool" type="text" class="form-control" id="rwash_wool" value="<?php echo $rcekR['rwash_wool'];?>" placeholder="4 Wool" readonly>
								<input name="rwash_staining" type="text" class="form-control" id="rwash_staining" value="<?php echo $rcekR['rwash_staining'];?>" placeholder="4-5 Cross Staining" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rwash_note" maxlength="50" rows="1" readonly><?php echo $rcekR['rwash_note'];?></textarea>
							</div>
						</div>
						<!-- WASHING END-->
						<!-- WATER BEGIN-->
						<div class="form-group" id="c2" style="display:none;">
							<label for="water" class="col-sm-2 control-label">WATER</label>
							<div class="col-sm-2">
								<input name="water_colorchange" type="text" class="form-control" id="water_colorchange" value="<?php echo $rcek1['water_colorchange'];?>" placeholder="4-5 Color Change">
								<input name="water_acetate" type="text" class="form-control" id="water_acetate" value="<?php echo $rcek1['water_acetate'];?>" placeholder="4 Acetate">
							</div>
							<div class="col-sm-2">
								<input name="water_cotton" type="text" class="form-control" id="water_cotton" value="<?php echo $rcek1['water_cotton'];?>" placeholder="4 Cotton">
								<input name="water_nylon" type="text" class="form-control" id="water_nylon" value="<?php echo $rcek1['water_nylon'];?>" placeholder="4 Nylon">
							</div>
							<div class="col-sm-2">
								<input name="water_poly" type="text" class="form-control" id="water_poly" value="<?php echo $rcek1['water_poly'];?>" placeholder="4 Polyester">
								<input name="water_acrylic" type="text" class="form-control" id="water_acrylic" value="<?php echo $rcek1['water_acrylic'];?>" placeholder="4 Acrylic">
							</div>
							<div class="col-sm-2">
								<input name="water_wool" type="text" class="form-control" id="water_wool" value="<?php echo $rcek1['water_wool'];?>" placeholder="4 Wool">
								<input name="water_staining" type="text" class="form-control" id="water_staining" value="<?php echo $rcek1['water_staining'];?>" placeholder="S.Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="water_note" maxlength="50" rows="1"><?php echo $rcek1['water_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_wtr" style="display:none;">
						<label for="stat_wtr" class="col-sm-2 control-label">STATUS</label>
						<div class="col-sm-2">
							<select name="stat_wtr" class="form-control select2" id="stat_wtr" onChange="tampil2();" style="width: 100%;">
								<option <?php if($rcek1['stat_wtr']==""){?> selected=selected <?php };?>value="">Pilih</option>
								<option <?php if($rcek1['stat_wtr']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
								<option <?php if($rcek1['stat_wtr']=="A"){?> selected=selected <?php };?>value="A">A</option>
								<option <?php if($rcek1['stat_wtr']=="R"){?> selected=selected <?php };?>value="R">R</option>
								<option <?php if($rcek1['stat_wtr']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
								<option <?php if($rcek1['stat_wtr']=="MARGINAL PASS"){?> selected=selected <?php };?>value="MARGINAL PASS">MARGINAL PASS</option>
								<option <?php if($rcek1['stat_wtr']=="DATA"){?> selected=selected <?php };?>value="DATA">DATA</option>
								<option <?php if($rcek1['stat_wtr']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
								<option <?php if($rcek1['stat_wtr']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
							</select>
						</div>
						</div>
						<div class="form-group" id="diswtr" style="display:none;">
							<label for="diswtr" class="col-sm-2 control-label">WATER (DIS)</label>
							<div class="col-sm-2">
								<input name="dwater_colorchange" type="text" class="form-control" id="dwater_colorchange" value="<?php echo $rcekD['dwater_colorchange'];?>" placeholder="4-5 Color Change">
								<input name="dwater_acetate" type="text" class="form-control" id="dwater_acetate" value="<?php echo $rcekD['dwater_acetate'];?>" placeholder="4 Acetate">
							</div>
							<div class="col-sm-2">
								<input name="dwater_cotton" type="text" class="form-control" id="dwater_cotton" value="<?php echo $rcekD['dwater_cotton'];?>" placeholder="4 Cotton">
								<input name="dwater_nylon" type="text" class="form-control" id="dwater_nylon" value="<?php echo $rcekD['dwater_nylon'];?>" placeholder="4 Nylon">
							</div>
							<div class="col-sm-2">
								<input name="dwater_poly" type="text" class="form-control" id="dwater_poly" value="<?php echo $rcekD['dwater_poly'];?>" placeholder="4 Polyester">
								<input name="dwater_acrylic" type="text" class="form-control" id="dwater_acrylic" value="<?php echo $rcekD['dwater_acrylic'];?>" placeholder="4 Acrylic">
							</div>
							<div class="col-sm-2">
								<input name="dwater_wool" type="text" class="form-control" id="dwater_wool" value="<?php echo $rcekD['dwater_wool'];?>" placeholder="4 Wool">
								<input name="dwater_staining" type="text" class="form-control" id="dwater_staining" value="<?php echo $rcekD['dwater_staining'];?>" placeholder="S.Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dwater_note" maxlength="50" rows="1"><?php echo $rcekD['dwater_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="marwtr" style="display:none;">
							<label for="marwtr" class="col-sm-2 control-label">WATER (MARGINAL)</label>
							<div class="col-sm-2">
								<input name="mwater_colorchange" type="text" class="form-control" id="mwater_colorchange" value="<?php echo $rcekM['mwater_colorchange'];?>" placeholder="4-5 Color Change">
								<input name="mwater_acetate" type="text" class="form-control" id="mwater_acetate" value="<?php echo $rcekM['mwater_acetate'];?>" placeholder="4 Acetate">
							</div>
							<div class="col-sm-2">
								<input name="mwater_cotton" type="text" class="form-control" id="mwater_cotton" value="<?php echo $rcekM['mwater_cotton'];?>" placeholder="4 Cotton">
								<input name="mwater_nylon" type="text" class="form-control" id="mwater_nylon" value="<?php echo $rcekM['mwater_nylon'];?>" placeholder="4 Nylon">
							</div>
							<div class="col-sm-2">
								<input name="mwater_poly" type="text" class="form-control" id="mwater_poly" value="<?php echo $rcekM['mwater_poly'];?>" placeholder="4 Polyester">
								<input name="mwater_acrylic" type="text" class="form-control" id="mwater_acrylic" value="<?php echo $rcekM['mwater_acrylic'];?>" placeholder="4 Acrylic">
							</div>
							<div class="col-sm-2">
								<input name="mwater_wool" type="text" class="form-control" id="mwater_wool" value="<?php echo $rcekM['mwater_wool'];?>" placeholder="4 Wool">
								<input name="mwater_staining" type="text" class="form-control" id="mwater_staining" value="<?php echo $rcekM['mwater_staining'];?>" placeholder="S.Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="mwater_note" maxlength="50" rows="1"><?php echo $rcekM['mwater_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranwtr" style="display:none;">
							<label for="ranwtr" class="col-sm-2 control-label">WATER (RAN)</label>
							<div class="col-sm-2">
								<input name="rwater_colorchange" type="text" class="form-control" id="rwater_colorchange" value="<?php echo $rcekR['rwater_colorchange'];?>" placeholder="4-5 Color Change" readonly>
								<input name="rwater_acetate" type="text" class="form-control" id="rwater_acetate" value="<?php echo $rcekR['rwater_acetate'];?>" placeholder="4 Acetate" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rwater_cotton" type="text" class="form-control" id="rwater_cotton" value="<?php echo $rcekR['rwater_cotton'];?>" placeholder="4 Cotton" readonly>
								<input name="rwater_nylon" type="text" class="form-control" id="rwater_nylon" value="<?php echo $rcekR['rwater_nylon'];?>" placeholder="4 Nylon" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rwater_poly" type="text" class="form-control" id="rwater_poly" value="<?php echo $rcekR['rwater_poly'];?>" placeholder="4 Polyester" readonly>
								<input name="rwater_acrylic" type="text" class="form-control" id="rwater_acrylic" value="<?php echo $rcekR['rwater_acrylic'];?>" placeholder="4 Acrylic" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rwater_wool" type="text" class="form-control" id="rwater_wool" value="<?php echo $rcekR['rwater_wool'];?>" placeholder="4 Wool" readonly>
								<input name="rwater_staining" type="text" class="form-control" id="rwater_staining" value="<?php echo $rcekR['rwater_staining'];?>" placeholder="S.Staining" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rwater_note" maxlength="50" rows="1" readonly><?php echo $rcekR['rwater_note'];?></textarea>
							</div>
						</div>
						<!-- WATER END-->
						<!-- PERSPIRATION ACID BEGIN-->
						<div class="form-group" id="c3" style="display:none;">
							<label for="acid" class="col-sm-2 control-label">PERSPIRATION ACID</label>
							<div class="col-sm-2">
								<input name="acid_colorchange" type="text" class="form-control" id="acid_colorchange" value="<?php echo $rcek1['acid_colorchange'];?>" placeholder="4-5 Color Change">
								<input name="acid_acetate" type="text" class="form-control" id="acid_acetate" value="<?php echo $rcek1['acid_acetate'];?>" placeholder="4 Acetate">
							</div>
							<div class="col-sm-2">
								<input name="acid_cotton" type="text" class="form-control" id="acid_cotton" value="<?php echo $rcek1['acid_cotton'];?>" placeholder="4 Cotton">
								<input name="acid_nylon" type="text" class="form-control" id="acid_nylon" value="<?php echo $rcek1['acid_nylon'];?>" placeholder="4 Nylon">
							</div>
							<div class="col-sm-2">
								<input name="acid_poly" type="text" class="form-control" id="acid_poly" value="<?php echo $rcek1['acid_poly'];?>" placeholder="4 Polyester">
								<input name="acid_acrylic" type="text" class="form-control" id="acid_acrylic" value="<?php echo $rcek1['acid_acrylic'];?>" placeholder="4 Acrylic">
							</div>
							<div class="col-sm-2">
								<input name="acid_wool" type="text" class="form-control" id="acid_wool" value="<?php echo $rcek1['acid_wool'];?>" placeholder="4 Wool">
								<input name="acid_staining" type="text" class="form-control" id="acid_staining" value="<?php echo $rcek1['acid_staining'];?>" placeholder="S.Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="acid_note" maxlength="50" rows="1"><?php echo $rcek1['acid_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_pac" style="display:none;">
							<label for="stat_pac" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_pac" class="form-control select2" id="stat_pac" onChange="tampil2();" style="width: 100%;">
									<option <?php if($rcek1['stat_pac']==""){?> selected=selected <?php };?>value="">Pilih</option>
									<option <?php if($rcek1['stat_pac']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if($rcek1['stat_pac']=="A"){?> selected=selected <?php };?>value="A">A</option>
									<option <?php if($rcek1['stat_pac']=="R"){?> selected=selected <?php };?>value="R">R</option>
									<option <?php if($rcek1['stat_pac']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
									<option <?php if($rcek1['stat_pac']=="MARGINAL PASS"){?> selected=selected <?php };?>value="MARGINAL PASS">MARGINAL PASS</option>
									<option <?php if($rcek1['stat_pac']=="DATA"){?> selected=selected <?php };?>value="DATA">DATA</option>
									<option <?php if($rcek1['stat_pac']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
									<option <?php if($rcek1['stat_pac']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="dispac" style="display:none;">
							<label for="dispac" class="col-sm-2 control-label">PERSPIRATION ACID (DIS)</label>
							<div class="col-sm-2">
								<input name="dacid_colorchange" type="text" class="form-control" id="dacid_colorchange" value="<?php echo $rcekD['dacid_colorchange'];?>" placeholder="4-5 Color Change">
								<input name="dacid_acetate" type="text" class="form-control" id="dacid_acetate" value="<?php echo $rcekD['dacid_acetate'];?>" placeholder="4 Acetate">
							</div>
							<div class="col-sm-2">
								<input name="dacid_cotton" type="text" class="form-control" id="dacid_cotton" value="<?php echo $rcekD['dacid_cotton'];?>" placeholder="4 Cotton">
								<input name="dacid_nylon" type="text" class="form-control" id="dacid_nylon" value="<?php echo $rcekD['dacid_nylon'];?>" placeholder="4 Nylon">
							</div>
							<div class="col-sm-2">
								<input name="dacid_poly" type="text" class="form-control" id="dacid_poly" value="<?php echo $rcekD['dacid_poly'];?>" placeholder="4 Polyester">
								<input name="dacid_acrylic" type="text" class="form-control" id="dacid_acrylic" value="<?php echo $rcekD['dacid_acrylic'];?>" placeholder="4 Acrylic">
							</div>
							<div class="col-sm-2">
								<input name="dacid_wool" type="text" class="form-control" id="dacid_wool" value="<?php echo $rcekD['dacid_wool'];?>" placeholder="4 Wool">
								<input name="dacid_staining" type="text" class="form-control" id="dacid_staining" value="<?php echo $rcekD['dacid_staining'];?>" placeholder="S.Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dacid_note" maxlength="50" rows="1"><?php echo $rcekD['dacid_note'];?></textarea>
							</div>
						</div>	
						<div class="form-group" id="marpac" style="display:none;">
							<label for="marpac" class="col-sm-2 control-label">PERSPIRATION ACID (MARGINAL)</label>
							<div class="col-sm-2">
								<input name="macid_colorchange" type="text" class="form-control" id="macid_colorchange" value="<?php echo $rcekM['macid_colorchange'];?>" placeholder="4-5 Color Change">
								<input name="macid_acetate" type="text" class="form-control" id="macid_acetate" value="<?php echo $rcekM['macid_acetate'];?>" placeholder="4 Acetate">
							</div>
							<div class="col-sm-2">
								<input name="macid_cotton" type="text" class="form-control" id="macid_cotton" value="<?php echo $rcekM['macid_cotton'];?>" placeholder="4 Cotton">
								<input name="macid_nylon" type="text" class="form-control" id="macid_nylon" value="<?php echo $rcekM['macid_nylon'];?>" placeholder="4 Nylon">
							</div>
							<div class="col-sm-2">
								<input name="macid_poly" type="text" class="form-control" id="macid_poly" value="<?php echo $rcekM['macid_poly'];?>" placeholder="4 Polyester">
								<input name="macid_acrylic" type="text" class="form-control" id="macid_acrylic" value="<?php echo $rcekM['macid_acrylic'];?>" placeholder="4 Acrylic">
							</div>
							<div class="col-sm-2">
								<input name="macid_wool" type="text" class="form-control" id="macid_wool" value="<?php echo $rcekM['macid_wool'];?>" placeholder="4 Wool">
								<input name="macid_staining" type="text" class="form-control" id="macid_staining" value="<?php echo $rcekM['macid_staining'];?>" placeholder="S.Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="macid_note" maxlength="50" rows="1"><?php echo $rcekM['macid_note'];?></textarea>
							</div>
						</div>	
						<div class="form-group" id="ranpac" style="display:none;">
							<label for="ranpac" class="col-sm-2 control-label">PERSPIRATION ACID (RAN)</label>
							<div class="col-sm-2">
								<input name="racid_colorchange" type="text" class="form-control" id="racid_colorchange" value="<?php echo $rcekR['racid_colorchange'];?>" placeholder="4-5 Color Change" readonly>
								<input name="racid_acetate" type="text" class="form-control" id="racid_acetate" value="<?php echo $rcekR['racid_acetate'];?>" placeholder="4 Acetate" readonly>
							</div>
							<div class="col-sm-2">
								<input name="racid_cotton" type="text" class="form-control" id="racid_cotton" value="<?php echo $rcekR['racid_cotton'];?>" placeholder="4 Cotton" readonly>
								<input name="racid_nylon" type="text" class="form-control" id="racid_nylon" value="<?php echo $rcekR['racid_nylon'];?>" placeholder="4 Nylon" readonly>
							</div>
							<div class="col-sm-2">
								<input name="racid_poly" type="text" class="form-control" id="racid_poly" value="<?php echo $rcekR['racid_poly'];?>" placeholder="4 Polyester" readonly>
								<input name="racid_acrylic" type="text" class="form-control" id="racid_acrylic" value="<?php echo $rcekR['racid_acrylic'];?>" placeholder="4 Acrylic" readonly>
							</div>
							<div class="col-sm-2">
								<input name="racid_wool" type="text" class="form-control" id="racid_wool" value="<?php echo $rcekR['racid_wool'];?>" placeholder="4 Wool" readonly>
								<input name="racid_staining" type="text" class="form-control" id="racid_staining" value="<?php echo $rcekR['racid_staining'];?>" placeholder="S.Staining" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="racid_note" maxlength="50" rows="1" readonly><?php echo $rcekR['racid_note'];?></textarea>
							</div>
						</div>
						<!-- PERSPIRATION ACID END-->
						<!-- PERSPIRATION ALKALINE BEGIN-->	
						<div class="form-group" id="c4" style="display:none;">
							<label for="alkaline" class="col-sm-2 control-label">PERSPIRATION ALKALINE</label>
							<div class="col-sm-2">
								<input name="alkaline_colorchange" type="text" class="form-control" id="alkaline_colorchange" value="<?php echo $rcek1['alkaline_colorchange'];?>" placeholder="4-5 Color Change">
								<input name="alkaline_acetate" type="text" class="form-control" id="alkaline_acetate" value="<?php echo $rcek1['alkaline_acetate'];?>" placeholder="4 Acetate">
							</div>
							<div class="col-sm-2">
								<input name="alkaline_cotton" type="text" class="form-control" id="alkaline_cotton" value="<?php echo $rcek1['alkaline_cotton'];?>" placeholder="4 Cotton">
								<input name="alkaline_nylon" type="text" class="form-control" id="alkaline_nylon" value="<?php echo $rcek1['alkaline_nylon'];?>" placeholder="4 Nylon">
							</div>
							<div class="col-sm-2">
								<input name="alkaline_poly" type="text" class="form-control" id="alkaline_poly" value="<?php echo $rcek1['alkaline_poly'];?>" placeholder="4 Polyester">
								<input name="alkaline_acrylic" type="text" class="form-control" id="alkaline_acrylic" value="<?php echo $rcek1['alkaline_acrylic'];?>" placeholder="4 Acrylic">
							</div>
							<div class="col-sm-2">
								<input name="alkaline_wool" type="text" class="form-control" id="alkaline_wool" value="<?php echo $rcek1['alkaline_wool'];?>" placeholder="4 Wool">
								<input name="alkaline_staining" type="text" class="form-control" id="alkaline_staining" value="<?php echo $rcek1['alkaline_staining'];?>" placeholder="S.Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="alkaline_note" maxlength="50" rows="1"><?php echo $rcek1['alkaline_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_pal" style="display:none;">
							<label for="stat_pal" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_pal" class="form-control select2" id="stat_pal" onChange="tampil2();" style="width: 100%;">
									<option <?php if($rcek1['stat_pal']==""){?> selected=selected <?php };?>value="">Pilih</option>
									<option <?php if($rcek1['stat_pal']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if($rcek1['stat_pal']=="A"){?> selected=selected <?php };?>value="A">A</option>
									<option <?php if($rcek1['stat_pal']=="R"){?> selected=selected <?php };?>value="R">R</option>
									<option <?php if($rcek1['stat_pal']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
									<option <?php if($rcek1['stat_pal']=="MARGINAL PASS"){?> selected=selected <?php };?>value="MARGINAL PASS">MARGINAL PASS</option>
									<option <?php if($rcek1['stat_pal']=="DATA"){?> selected=selected <?php };?>value="DATA">DATA</option>
									<option <?php if($rcek1['stat_pal']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
									<option <?php if($rcek1['stat_pal']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="dispal" style="display:none;">
							<label for="dispal" class="col-sm-2 control-label">PERSPIRATION ALKALINE (DIS)</label>
							<div class="col-sm-2">
								<input name="dalkaline_colorchange" type="text" class="form-control" id="dalkaline_colorchange" value="<?php echo $rcekD['dalkaline_colorchange'];?>" placeholder="4-5 Color Change">
								<input name="dalkaline_acetate" type="text" class="form-control" id="dalkaline_acetate" value="<?php echo $rcekD['dalkaline_acetate'];?>" placeholder="4 Acetate">
							</div>
							<div class="col-sm-2">
								<input name="dalkaline_cotton" type="text" class="form-control" id="dalkaline_cotton" value="<?php echo $rcekD['dalkaline_cotton'];?>" placeholder="4 Cotton">
								<input name="dalkaline_nylon" type="text" class="form-control" id="dalkaline_nylon" value="<?php echo $rcekD['dalkaline_nylon'];?>" placeholder="4 Nylon">
							</div>
							<div class="col-sm-2">
								<input name="dalkaline_poly" type="text" class="form-control" id="dalkaline_poly" value="<?php echo $rcekD['dalkaline_poly'];?>" placeholder="4 Polyester">
								<input name="dalkaline_acrylic" type="text" class="form-control" id="dalkaline_acrylic" value="<?php echo $rcekD['dalkaline_acrylic'];?>" placeholder="4 Acrylic">
							</div>
							<div class="col-sm-2">
								<input name="dalkaline_wool" type="text" class="form-control" id="dalkaline_wool" value="<?php echo $rcekD['dalkaline_wool'];?>" placeholder="4 Wool">
								<input name="dalkaline_staining" type="text" class="form-control" id="dalkaline_staining" value="<?php echo $rcekD['dalkaline_staining'];?>" placeholder="S.Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dalkaline_note" maxlength="50" rows="1"><?php echo $rcekD['dalkaline_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="marpal" style="display:none;">
							<label for="marpal" class="col-sm-2 control-label">PERSPIRATION ALKALINE (MARGINAL)</label>
							<div class="col-sm-2">
								<input name="malkaline_colorchange" type="text" class="form-control" id="malkaline_colorchange" value="<?php echo $rcekM['malkaline_colorchange'];?>" placeholder="4-5 Color Change">
								<input name="malkaline_acetate" type="text" class="form-control" id="malkaline_acetate" value="<?php echo $rcekM['malkaline_acetate'];?>" placeholder="4 Acetate">
							</div>
							<div class="col-sm-2">
								<input name="malkaline_cotton" type="text" class="form-control" id="malkaline_cotton" value="<?php echo $rcekM['malkaline_cotton'];?>" placeholder="4 Cotton">
								<input name="malkaline_nylon" type="text" class="form-control" id="malkaline_nylon" value="<?php echo $rcekM['malkaline_nylon'];?>" placeholder="4 Nylon">
							</div>
							<div class="col-sm-2">
								<input name="malkaline_poly" type="text" class="form-control" id="malkaline_poly" value="<?php echo $rcekM['malkaline_poly'];?>" placeholder="4 Polyester">
								<input name="malkaline_acrylic" type="text" class="form-control" id="malkaline_acrylic" value="<?php echo $rcekM['malkaline_acrylic'];?>" placeholder="4 Acrylic">
							</div>
							<div class="col-sm-2">
								<input name="malkaline_wool" type="text" class="form-control" id="malkaline_wool" value="<?php echo $rcekM['malkaline_wool'];?>" placeholder="4 Wool">
								<input name="malkaline_staining" type="text" class="form-control" id="malkaline_staining" value="<?php echo $rcekM['malkaline_staining'];?>" placeholder="S.Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="malkaline_note" maxlength="50" rows="1"><?php echo $rcekM['malkaline_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranpal" style="display:none;">
							<label for="ranpal" class="col-sm-2 control-label">PERSPIRATION ALKALINE (RAN)</label>
							<div class="col-sm-2">
								<input name="ralkaline_colorchange" type="text" class="form-control" id="ralkaline_colorchange" value="<?php echo $rcekR['ralkaline_colorchange'];?>" placeholder="4-5 Color Change" readonly>
								<input name="ralkaline_acetate" type="text" class="form-control" id="ralkaline_acetate" value="<?php echo $rcekR['ralkaline_acetate'];?>" placeholder="4 Acetate" readonly>
							</div>
							<div class="col-sm-2">
								<input name="ralkaline_cotton" type="text" class="form-control" id="ralkaline_cotton" value="<?php echo $rcekR['ralkaline_cotton'];?>" placeholder="4 Cotton" readonly>
								<input name="ralkaline_nylon" type="text" class="form-control" id="ralkaline_nylon" value="<?php echo $rcekR['ralkaline_nylon'];?>" placeholder="4 Nylon" readonly>
							</div>
							<div class="col-sm-2">
								<input name="ralkaline_poly" type="text" class="form-control" id="ralkaline_poly" value="<?php echo $rcekR['ralkaline_poly'];?>" placeholder="4 Polyester" readonly>
								<input name="ralkaline_acrylic" type="text" class="form-control" id="ralkaline_acrylic" value="<?php echo $rcekR['ralkaline_acrylic'];?>" placeholder="4 Acrylic" readonly>
							</div>
							<div class="col-sm-2">
								<input name="ralkaline_wool" type="text" class="form-control" id="ralkaline_wool" value="<?php echo $rcekR['ralkaline_wool'];?>" placeholder="4 Wool" readonly>
								<input name="ralkaline_staining" type="text" class="form-control" id="ralkaline_staining" value="<?php echo $rcekR['ralkaline_staining'];?>" placeholder="S.Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="ralkaline_note" maxlength="50" rows="1" readonly><?php echo $rcekR['ralkaline_note'];?></textarea>
							</div>
						</div>
						<!-- PERSPIRATION ALKALINE END-->	
						<!-- CROCKING BEGIN-->	
						<div class="form-group" id="c5" style="display:none;">
							<label for="crocking" class="col-sm-2 control-label">CROCKING</label>
							<div class="col-sm-1">LEN 1
								<input name="crock_len1" type="text" class="form-control" id="crock_len1" value="<?php echo $rcek1['crock_len1'];?>" placeholder="4 Dry">
							</div>
							<div class="col-sm-1">WID 1
								<input name="crock_wid1" type="text" class="form-control" id="crock_wid1" value="<?php echo $rcek1['crock_wid1'];?>" placeholder="4 Dry">
							</div>
							<div class="col-sm-1">LEN 2
								<input name="crock_len2" type="text" class="form-control" id="crock_len2" value="<?php echo $rcek1['crock_len2'];?>" placeholder="3 Wet">
							</div>
							<div class="col-sm-1">WID 2
								<input name="crock_wid2" type="text" class="form-control" id="crock_wid2" value="<?php echo $rcek1['crock_wid2'];?>" placeholder="3 Wet">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="crock_note" maxlength="50"><?php echo $rcek1['crock_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_cr" style="display:none;">
						<label for="stat_cr" class="col-sm-2 control-label">STATUS</label>
						<div class="col-sm-2">
							<select name="stat_cr" class="form-control select2" id="stat_cr" onChange="tampil2();" style="width: 100%;">
								<option <?php if($rcek1['stat_cr']==""){?> selected=selected <?php };?>value="">Pilih</option>
								<option <?php if($rcek1['stat_cr']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
								<option <?php if($rcek1['stat_cr']=="A"){?> selected=selected <?php };?>value="A">A</option>
								<option <?php if($rcek1['stat_cr']=="R"){?> selected=selected <?php };?>value="R">R</option>
								<option <?php if($rcek1['stat_cr']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
								<option <?php if($rcek1['stat_cr']=="MARGINAL PASS"){?> selected=selected <?php };?>value="MARGINAL PASS">MARGINAL PASS</option>
								<option <?php if($rcek1['stat_cr']=="DATA"){?> selected=selected <?php };?>value="DATA">DATA</option>
								<option <?php if($rcek1['stat_cr']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
								<option <?php if($rcek1['stat_cr']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
							</select>
						</div>
						</div>
						<div class="form-group" id="discr" style="display:none;">
							<label for="discr" class="col-sm-2 control-label">CROCKING (DIS)</label>
							<div class="col-sm-1">LEN 1
								<input name="dcrock_len1" type="text" class="form-control" id="dcrock_len1" value="<?php echo $rcekD['dcrock_len1'];?>" placeholder="4 Dry">
							</div>
							<div class="col-sm-1">WID 1
								<input name="dcrock_wid1" type="text" class="form-control" id="dcrock_wid1" value="<?php echo $rcekD['dcrock_wid1'];?>" placeholder="4 Dry">
							</div>
							<div class="col-sm-1">LEN 2
								<input name="dcrock_len2" type="text" class="form-control" id="dcrock_len2" value="<?php echo $rcekD['dcrock_len2'];?>" placeholder="3 Wet">
							</div>
							<div class="col-sm-1">WID 2
								<input name="dcrock_wid2" type="text" class="form-control" id="dcrock_wid2" value="<?php echo $rcekD['dcrock_wid2'];?>" placeholder="3 Wet">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dcrock_note" maxlength="50"><?php echo $rcekD['dcrock_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="marcr" style="display:none;">
							<label for="marcr" class="col-sm-2 control-label">CROCKING (MARGINAL)</label>
							<div class="col-sm-1">LEN 1
								<input name="mcrock_len1" type="text" class="form-control" id="mcrock_len1" value="<?php echo $rcekM['mcrock_len1'];?>" placeholder="4 Dry">
							</div>
							<div class="col-sm-1">WID 1
								<input name="mcrock_wid1" type="text" class="form-control" id="mcrock_wid1" value="<?php echo $rcekM['mcrock_wid1'];?>" placeholder="4 Dry">
							</div>
							<div class="col-sm-1">LEN 2
								<input name="mcrock_len2" type="text" class="form-control" id="mcrock_len2" value="<?php echo $rcekM['mcrock_len2'];?>" placeholder="3 Wet">
							</div>
							<div class="col-sm-1">WID 2
								<input name="mcrock_wid2" type="text" class="form-control" id="mcrock_wid2" value="<?php echo $rcekM['mcrock_wid2'];?>" placeholder="3 Wet">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="mcrock_note" maxlength="50"><?php echo $rcekM['mcrock_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="rancr" style="display:none;">
							<label for="rancr" class="col-sm-2 control-label">CROCKING (RAN)</label>
							<div class="col-sm-1">LEN 1
								<input name="rcrock_len1" type="text" class="form-control" id="rcrock_len1" value="<?php echo $rcekR['rcrock_len1'];?>" placeholder="4 Dry" readonly>
							</div>
							<div class="col-sm-1">WID 1
								<input name="rcrock_wid1" type="text" class="form-control" id="rcrock_wid1" value="<?php echo $rcekR['rcrock_wid1'];?>" placeholder="4 Dry" readonly>
							</div>
							<div class="col-sm-1">LEN 2
								<input name="rcrock_len2" type="text" class="form-control" id="rcrock_len2" value="<?php echo $rcekR['rcrock_len2'];?>" placeholder="3 Wet" readonly>
							</div>
							<div class="col-sm-1">WID 2
								<input name="rcrock_wid2" type="text" class="form-control" id="rcrock_wid2" value="<?php echo $rcekR['rcrock_wid2'];?>" placeholder="3 Wet" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rcrock_note" maxlength="50" readonly><?php echo $rcekR['rcrock_note'];?></textarea>
							</div>
						</div>
						<!-- CROCKING END-->
						<!-- PHENOLIC YELLOWING BEGIN-->
						<div class="form-group" id="c6" style="display:none;">
							<label for="phenolic" class="col-sm-2 control-label">PHENOLIC YELLOWING</label>
							<div class="col-sm-2">
								<input name="phenolic_colorchange" type="text" class="form-control" id="phenolic_colorchange" value="<?php echo $rcek1['phenolic_colorchange'];?>" placeholder="4-5 Color Change">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="phenolic_note" maxlength="50" rows="1"><?php echo $rcek1['phenolic_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_py" style="display:none;">
							<label for="stat_py" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_py" class="form-control select2" id="stat_py" onChange="tampil2();" style="width: 100%;">
									<option <?php if($rcek1['stat_py']==""){?> selected=selected <?php };?>value="">Pilih</option>
									<option <?php if($rcek1['stat_py']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if($rcek1['stat_py']=="A"){?> selected=selected <?php };?>value="A">A</option>
									<option <?php if($rcek1['stat_py']=="R"){?> selected=selected <?php };?>value="R">R</option>
									<option <?php if($rcek1['stat_py']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
									<option <?php if($rcek1['stat_py']=="MARGINAL PASS"){?> selected=selected <?php };?>value="MARGINAL PASS">MARGINAL PASS</option>
									<option <?php if($rcek1['stat_py']=="DATA"){?> selected=selected <?php };?>value="DATA">DATA</option>
									<option <?php if($rcek1['stat_py']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
									<option <?php if($rcek1['stat_py']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="dispy" style="display:none;">
							<label for="dispy" class="col-sm-2 control-label">PHENOLIC YELLOWING (DIS)</label>
							<div class="col-sm-2">
								<input name="dphenolic_colorchange" type="text" class="form-control" id="dphenolic_colorchange" value="<?php echo $rcekD['dphenolic_colorchange'];?>" placeholder="4-5 Color Change">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dphenolic_note" maxlength="50" rows="1"><?php echo $rcekD['dphenolic_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="marpy" style="display:none;">
							<label for="marpy" class="col-sm-2 control-label">PHENOLIC YELLOWING (MARGINAL)</label>
							<div class="col-sm-2">
								<input name="mphenolic_colorchange" type="text" class="form-control" id="mphenolic_colorchange" value="<?php echo $rcekM['mphenolic_colorchange'];?>" placeholder="4-5 Color Change">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="mphenolic_note" maxlength="50" rows="1"><?php echo $rcekM['mphenolic_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranpy" style="display:none;">
							<label for="ranpy" class="col-sm-2 control-label">PHENOLIC YELLOWING (RAN)</label>
							<div class="col-sm-2">
								<input name="rphenolic_colorchange" type="text" class="form-control" id="rphenolic_colorchange" value="<?php echo $rcekR['rphenolic_colorchange'];?>" placeholder="4-5 Color Change" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rphenolic_note" maxlength="50" rows="1" readonly><?php echo $rcekR['rphenolic_note'];?></textarea>
							</div>
						</div>
						<!-- PHENOLIC YELLOWING END-->
						<!-- COLOR MIGRATION - OVEN TEST BEGIN-->
						<div class="form-group" id="c7" style="display:none;">
							<label for="cm_printing" class="col-sm-2 control-label">COLOR MIGRATION - OVEN TEST</label>
							<div class="col-sm-2">
								<input name="cm_printing_colorchange" type="text" class="form-control" id="cm_printing_colorchange" value="<?php echo $rcek1['cm_printing_colorchange'];?>" placeholder="Grade">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="cm_printing_note" maxlength="50" rows="1"><?php echo $rcek1['cm_printing_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_cmo" style="display:none;">
							<label for="stat_cmo" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_cmo" class="form-control select2" id="stat_cmo" onChange="tampil2();" style="width: 100%;">
									<option <?php if($rcek1['stat_cmo']==""){?> selected=selected <?php };?>value="">Pilih</option>
									<option <?php if($rcek1['stat_cmo']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if($rcek1['stat_cmo']=="A"){?> selected=selected <?php };?>value="A">A</option>
									<option <?php if($rcek1['stat_cmo']=="R"){?> selected=selected <?php };?>value="R">R</option>
									<option <?php if($rcek1['stat_cmo']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
									<option <?php if($rcek1['stat_cmo']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
									<option <?php if($rcek1['stat_cmo']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="discmo" style="display:none;">
							<label for="discmo" class="col-sm-2 control-label">COLOR MIGRATION - OVEN TEST (DIS)</label>
							<div class="col-sm-2">
								<input name="dcm_printing_colorchange" type="text" class="form-control" id="dcm_printing_colorchange" value="<?php echo $rcekD['dcm_printing_colorchange'];?>" placeholder="Grade">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dcm_printing_note" maxlength="50" rows="1"><?php echo $rcekD['dcm_printing_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="rancmo" style="display:none;">
							<label for="rancmo" class="col-sm-2 control-label">COLOR MIGRATION - OVEN TEST (RAN)</label>
							<div class="col-sm-2">
								<input name="rcm_printing_colorchange" type="text" class="form-control" id="rcm_printing_colorchange" value="<?php echo $rcekR['rcm_printing_colorchange'];?>" placeholder="Grade" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rcm_printing_note" maxlength="50" rows="1" readonly><?php echo $rcekR['rcm_printing_note'];?></textarea>
							</div>
						</div>
						<!-- COLOR MIGRATION - OVEN TEST END-->

						<div class="form-group" id="conceal" style="display:none;">

					
						<label for="cm_dye" class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
							<?php 
									$sco_acid_original =  explode("/", $rcek1['sco_acid_original']);
									$sca_acid_original =  explode("/", $rcek1['sca_acid_original']);
									$sco_alkaline_afterwash =  explode("/", $rcek1['sco_alkaline_afterwash']);
									$sca_alkaline_afterwash =  explode("/", $rcek1['sca_alkaline_afterwash']);									
									?>															
									
								
										
									<?php 
										$status_scs = ['DISPOSISI','A','R','PASS','FAIL','RANDOM'];
									?>

									<table width=100%  class="sc">
										<tr>
											<td width=210px><b>Jenis Test</b></td>
											<td><b>Sweat Conceal</b></td>
											<td colspan=4></td>
										</tr>
										<tr>
											<td>Sweat Conceal Original Acid</td>
											<td><input class="form-control" type="text" name="sco_acid_original1" value="<?=$sco_acid_original[0];?>" placeholder = "Original 1 Min" ></td>
											<td><input class="form-control" type="text" name="sco_acid_original2" value="<?=$sco_acid_original[1];?>" placeholder = "Original 2 Min"></td>
											<td><input class="form-control"  type="text" name="sco_acid_original3" value="<?=$sco_acid_original[2];?>" placeholder = "Original 3 Min" ></td>

											<td width=110px>													
												<select name="sco_acid_status"  class="form-control">
													<option value="">Pilih</option>
													
													<?php  foreach ($status_scs as $status_sc) {
														if ($status_sc == $rcek1['sco_acid_status'] ) {
															echo '<option selected value="'.$status_sc.'">'.$status_sc.'</option>';
														} else {
															echo '<option value="'.$status_sc.'">'.$status_sc.'</option>';
														}
													}
													?>																								
												</select>

											</td>
											<td rowspan=4 valign="top">
											<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="sc_note" maxlength="50" rows="7"><?php echo $rcek1['sc_note'];?></textarea>
							
											
							
											</td>
										</tr>
										<tr><td>Sweat Conceal Afterwash Acid</td>
											<td><input class="form-control" type="text" name="sca_acid_original1" value="<?=$sca_acid_original[0]?>"  placeholder = "Original 1 min" ></td>
											<td><input class="form-control"  type="text" name="sca_acid_original2" value="<?=$sca_acid_original[1]?>" placeholder = "Original 2 min" ></td>
											<td><input class="form-control"  type="text" name="sca_acid_original3" value="<?=$sca_acid_original[2]?>"  placeholder = "Original 3 min"></td>
											<td>
											<select name="sca_acid_status"  class="form-control">
													<option value="">Pilih</option>
													
													<?php  foreach ($status_scs as $status_sc) {
														if ($status_sc == $rcek1['sca_acid_status'] ) {
															echo '<option selected value="'.$status_sc.'">'.$status_sc.'</option>';
														} else {
															echo '<option value="'.$status_sc.'">'.$status_sc.'</option>';
														}
													}
													?>																								
												</select>
											</td>
										
										</tr>
										<tr><td>Sweat Conceal Original Alkaline</td>
											<td><input  class="form-control" type="text" name="sco_alkaline_afterwash1" value="<?=$sco_alkaline_afterwash[0]?>" placeholder = "Afterwash 1 min"  ></td>
											<td><input class="form-control"  type="text" name="sco_alkaline_afterwash2" value="<?=$sco_alkaline_afterwash[1]?>" placeholder = "Afterwash 2 min" ></td>
											<td><input class="form-control" type="text" name="sco_alkaline_afterwash3" value="<?=$sco_alkaline_afterwash[2]?>" placeholder = "Afterwash 3 min" ></td>
											<td>
												
												<select name="sco_alkaline_status"  class="form-control">
													<option value="">Pilih</option>
													
													<?php  foreach ($status_scs as $status_sc) {
														if ($status_sc == $rcek1['sco_alkaline_status'] ) {
															echo '<option selected value="'.$status_sc.'">'.$status_sc.'</option>';
														} else {
															echo '<option value="'.$status_sc.'">'.$status_sc.'</option>';
														}
													}
													?>																								
												</select>
											</td>
											
										</tr>
										<tr><td>Sweat Conceal Afterwash Alkaline</td>
											<td><input class="form-control"  type="text" name="sca_alkaline_afterwash1" value="<?=$sca_alkaline_afterwash[0]?>" placeholder = "Afterwash 1 min"  ></td>
											<td><input class="form-control"  type="text" name="sca_alkaline_afterwash2" value="<?=$sca_alkaline_afterwash[1]?>"  placeholder = "Afterwash 2 min" ></td>
											<td><input class="form-control"  type="text" name="sca_alkaline_afterwash3" value="<?=$sca_alkaline_afterwash[2]?>" placeholder = "Afterwash 3 min"  ></td>
											<td>
												
										
											<select name="sca_alkaline_status"  class="form-control">
													<option value="">Pilih</option>
													
													<?php  foreach ($status_scs as $status_sc) {
														if ($status_sc == $rcek1['sca_alkaline_status'] ) {
															echo '<option selected value="'.$status_sc.'">'.$status_sc.'</option>';
														} else {
															echo '<option value="'.$status_sc.'">'.$status_sc.'</option>';
														}
													}
													?>																								
												</select>
										</td>
										</tr>

									</table>

									
							</div>
																																													
							
						</div>
						<!-- COLOR MIGRATION BEGIN-->
						<div class="form-group" id="c8" style="display:none;">
							<label for="cm_dye" class="col-sm-2 control-label">COLOR MIGRATION FASTNESS</label>
							<div class="col-sm-2">
								<label><input type="checkbox" name="cm_dye_temp" id="cm_dye_temp" class="minimal" value="90" <?php if($rcek1['cm_dye_temp']=='90'){echo "checked";}?>> 90&deg;C x 24h &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="cm_dye_temp" id="cm_dye_temp" class="minimal" value="70" <?php if($rcek1['cm_dye_temp']=='70'){echo "checked";}?>> 70&deg;C x 48h 
								</label>
							</div>
							<div class="col-sm-2">
								<input name="cm_dye_colorchange" type="text" class="form-control" id="cm_dye_colorchange" value="<?php echo $rcek1['cm_dye_colorchange'];?>" placeholder="4-5 Color Change">
							</div>
							<div class="col-sm-2">
								<input name="cm_dye_stainingface" type="text" class="form-control" id="cm_dye_stainingface" value="<?php echo $rcek1['cm_dye_stainingface'];?>" placeholder="4 Color Staining">
							</div>
							<div class="col-sm-2">
								<input name="cm_dye_stainingback" type="text" class="form-control" id="cm_dye_stainingback" value="<?php echo $rcek1['cm_dye_stainingback'];?>" placeholder="4 Color Staining With Paper">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="cm_dye_note" maxlength="50"><?php echo $rcek1['cm_dye_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_cm" style="display:none;">
							<label for="stat_cm" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_cm" class="form-control select2" id="stat_cm" onChange="tampil2();" style="width: 100%;">
									<option <?php if($rcek1['stat_cm']==""){?> selected=selected <?php };?>value="">Pilih</option>
									<option <?php if($rcek1['stat_cm']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if($rcek1['stat_cm']=="A"){?> selected=selected <?php };?>value="A">A</option>
									<option <?php if($rcek1['stat_cm']=="R"){?> selected=selected <?php };?>value="R">R</option>
									<option <?php if($rcek1['stat_cm']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
									<option <?php if($rcek1['stat_cm']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
									<option <?php if($rcek1['stat_cm']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="discm" style="display:none;">
							<label for="discm" class="col-sm-2 control-label">COLOR MIGRATION FASTNESS (DIS)</label>
							<div class="col-sm-2">
								<label><input type="checkbox" name="dcm_dye_temp" id="dcm_dye_temp" class="minimal" value="90" <?php if($rcekD['dcm_dye_temp']=='90'){echo "checked";}?>> 90&deg;C x 24h &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="dcm_dye_temp" id="dcm_dye_temp" class="minimal" value="70" <?php if($rcekD['dcm_dye_temp']=='70'){echo "checked";}?>> 70&deg;C x 48h 
								</label>
							</div>
							<div class="col-sm-2">
								<input name="dcm_dye_colorchange" type="text" class="form-control" id="dcm_dye_colorchange" value="<?php echo $rcekD['dcm_dye_colorchange'];?>" placeholder="4-5 Color Change">
							</div>
							<div class="col-sm-2">
								<input name="dcm_dye_stainingface" type="text" class="form-control" id="dcm_dye_stainingface" value="<?php echo $rcekD['dcm_dye_stainingface'];?>" placeholder="4 Color Staining">
							</div>
							<div class="col-sm-2">
								<input name="dcm_dye_stainingback" type="text" class="form-control" id="dcm_dye_stainingback" value="<?php echo $rcekD['dcm_dye_stainingback'];?>" placeholder="4 Color Staining With Paper">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dcm_dye_note" maxlength="50"><?php echo $rcekD['dcm_dye_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="rancm" style="display:none;">
							<label for="rancm" class="col-sm-2 control-label">COLOR MIGRATION FASTNESS (RAN)</label>
							<div class="col-sm-2">
								<label><input type="checkbox" name="rcm_dye_temp" id="rcm_dye_temp" class="minimal" value="90" <?php if($rcekR['rcm_dye_temp']=='90'){echo "checked";}?> readonly> 90&deg;C x 24h &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" name="rcm_dye_temp" id="rcm_dye_temp" class="minimal" value="70" <?php if($rcekR['rcm_dye_temp']=='70'){echo "checked";}?> readonly> 70&deg;C x 48h 
								</label>
							</div>
							<div class="col-sm-2">
								<input name="rcm_dye_colorchange" type="text" class="form-control" id="rcm_dye_colorchange" value="<?php echo $rcekR['rcm_dye_colorchange'];?>" placeholder="4-5 Color Change" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rcm_dye_stainingface" type="text" class="form-control" id="rcm_dye_stainingface" value="<?php echo $rcekR['rcm_dye_stainingface'];?>" placeholder="4 Color Staining" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rcm_dye_stainingback" type="text" class="form-control" id="rcm_dye_stainingback" value="<?php echo $rcekR['rcm_dye_stainingback'];?>" placeholder="4 Color Staining With Paper" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rcm_dye_note" maxlength="50" readonly><?php echo $rcekR['rcm_dye_note'];?></textarea>
							</div>
						</div>
						<!-- COLOR MIGRATION END-->
						<!-- LIGHT FASTNESS BEGIN-->
						<div class="form-group" id="c9" style="display:none;">
							<label for="light" class="col-sm-2 control-label">LIGHT FASTNESS</label>
							<div class="col-sm-2">
								<input name="light_rating1" type="text" class="form-control" id="light_rating1" value="<?php echo $rcek1['light_rating1'];?>" placeholder="3 Color Change (rating1)">
							</div>
							<div class="col-sm-2">
								<input name="light_rating2" type="text" class="form-control" id="light_rating2" value="<?php echo $rcek1['light_rating2'];?>" placeholder="4 Color Change (rating2)">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="light_note" maxlength="50" rows="1"><?php echo $rcek1['light_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_lg" style="display:none;">
						<label for="stat_lg" class="col-sm-2 control-label">STATUS</label>
						<div class="col-sm-2">
							<select name="stat_lg" class="form-control select2" id="stat_lg" onChange="tampil2();" style="width: 100%;">
								<option <?php if($rcek1['stat_lg']==""){?> selected=selected <?php };?>value="">Pilih</option>
								<option <?php if($rcek1['stat_lg']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
								<option <?php if($rcek1['stat_lg']=="A"){?> selected=selected <?php };?>value="A">A</option>
								<option <?php if($rcek1['stat_lg']=="R"){?> selected=selected <?php };?>value="R">R</option>
								<option <?php if($rcek1['stat_lg']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
								<option <?php if($rcek1['stat_lg']=="MARGINAL PASS"){?> selected=selected <?php };?>value="MARGINAL PASS">MARGINAL PASS</option>
								<option <?php if($rcek1['stat_lg']=="DATA"){?> selected=selected <?php };?>value="DATA">DATA</option>
								<option <?php if($rcek1['stat_lg']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
								<option <?php if($rcek1['stat_lg']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
							</select>
						</div>
						</div>
						<div class="form-group" id="dislg" style="display:none;">
							<label for="dislg" class="col-sm-2 control-label">LIGHT FASTNESS (DIS)</label>
							<div class="col-sm-2">
								<input name="dlight_rating1" type="text" class="form-control" id="rlight_rating1" value="<?php echo $rcekD['dlight_rating1'];?>" placeholder="3 Color Change (rating1)">
							</div>
							<div class="col-sm-2">
								<input name="dlight_rating2" type="text" class="form-control" id="rlight_rating2" value="<?php echo $rcekD['dlight_rating2'];?>" placeholder="4 Color Change (rating2)">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dlight_note" maxlength="50" rows="1"><?php echo $rcekD['dlight_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="marlg" style="display:none;">
							<label for="marlg" class="col-sm-2 control-label">LIGHT FASTNESS (MARGINAL)</label>
							<div class="col-sm-2">
								<input name="mlight_rating1" type="text" class="form-control" id="mlight_rating1" value="<?php echo $rcekM['mlight_rating1'];?>" placeholder="3 Color Change (rating1)">
							</div>
							<div class="col-sm-2">
								<input name="mlight_rating2" type="text" class="form-control" id="mlight_rating2" value="<?php echo $rcekM['mlight_rating2'];?>" placeholder="4 Color Change (rating2)">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="mlight_note" maxlength="50" rows="1"><?php echo $rcekM['mlight_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranlg" style="display:none;">
							<label for="ranlg" class="col-sm-2 control-label">LIGHT FASTNESS (RAN)</label>
							<div class="col-sm-2">
								<input name="rlight_rating1" type="text" class="form-control" id="rlight_rating1" value="<?php echo $rcekR['rlight_rating1'];?>" placeholder="3 Color Change (rating1)" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rlight_rating2" type="text" class="form-control" id="rlight_rating2" value="<?php echo $rcekR['rlight_rating2'];?>" placeholder="4 Color Change (rating2)" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rlight_note" maxlength="50" rows="1" readonly><?php echo $rcekR['rlight_note'];?></textarea>
							</div>
						</div>
						<!-- LIGHT FASTNESS END-->
						<!-- LIGHT PERSPIRATION BEGIN-->
						<div class="form-group" id="c10" style="display:none;">
							<label for="light_pers" class="col-sm-2 control-label">LIGHT PERSPIRATION FASTNESS</label>
							<div class="col-sm-2">
								<input name="light_pers_colorchange" type="text" class="form-control" id="light_pers_colorchange" value="<?php echo $rcek1['light_pers_colorchange'];?>" placeholder="3-4 Color Change">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="light_pers_note" maxlength="50" rows="1"><?php echo $rcek1['light_pers_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_lp" style="display:none;">
						<label for="stat_lp" class="col-sm-2 control-label">STATUS</label>
						<div class="col-sm-2">
							<select name="stat_lp" class="form-control select2" id="stat_lp" onChange="tampil2();" style="width: 100%;">
								<option <?php if($rcek1['stat_lp']==""){?> selected=selected <?php };?>value="">Pilih</option>
								<option <?php if($rcek1['stat_lp']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
								<option <?php if($rcek1['stat_lp']=="A"){?> selected=selected <?php };?>value="A">A</option>
								<option <?php if($rcek1['stat_lp']=="R"){?> selected=selected <?php };?>value="R">R</option>
								<option <?php if($rcek1['stat_lp']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
								<option <?php if($rcek1['stat_lp']=="MARGINAL PASS"){?> selected=selected <?php };?>value="MARGINAL PASS">MARGINAL PASS</option>
								<option <?php if($rcek1['stat_lp']=="DATA"){?> selected=selected <?php };?>value="DATA">DATA</option>
								<option <?php if($rcek1['stat_lp']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
								<option <?php if($rcek1['stat_lp']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
							</select>
						</div>
						</div>
						<div class="form-group" id="dislp" style="display:none;">
							<label for="dislp" class="col-sm-2 control-label">LIGHT PERSPIRATION FASTNESS (DIS)</label>
							<div class="col-sm-2">
								<input name="dlight_pers_colorchange" type="text" class="form-control" id="dlight_pers_colorchange" value="<?php echo $rcekD['dlight_pers_colorchange'];?>" placeholder="3-4 Color Change">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dlight_pers_note" maxlength="50" rows="1"><?php echo $rcekD['dlight_pers_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="marlp" style="display:none;">
							<label for="marlp" class="col-sm-2 control-label">LIGHT PERSPIRATION FASTNESS (MARGINAL)</label>
							<div class="col-sm-2">
								<input name="mlight_pers_colorchange" type="text" class="form-control" id="mlight_pers_colorchange" value="<?php echo $rcekM['mlight_pers_colorchange'];?>" placeholder="3-4 Color Change">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="mlight_pers_note" maxlength="50" rows="1"><?php echo $rcekM['mlight_pers_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="ranlp" style="display:none;">
							<label for="ranlp" class="col-sm-2 control-label">LIGHT PERSPIRATION FASTNESS (RAN)</label>
							<div class="col-sm-2">
								<input name="rlight_pers_colorchange" type="text" class="form-control" id="rlight_pers_colorchange" value="<?php echo $rcekR['rlight_pers_colorchange'];?>" placeholder="3-4 Color Change" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rlight_pers_note" maxlength="50" rows="1" readonly><?php echo $rcekR['rlight_pers_note'];?></textarea>
							</div>
						</div>
						<!-- LIGHT PERSPIRATION END-->
						<!-- SALIVA BEGIN-->
						<div class="form-group" id="c11" style="display:none;">
							<label for="saliva" class="col-sm-2 control-label">SALIVA FASTNESS</label>
							<div class="col-sm-2">
								<input name="saliva_staining" type="text" class="form-control" id="saliva_staining" value="<?php echo $rcek1['saliva_staining'];?>" placeholder="4-5 Color Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="saliva_note" maxlength="50" rows="1"><?php echo $rcek1['saliva_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_slv" style="display:none;">
						<label for="stat_slv" class="col-sm-2 control-label">STATUS</label>
						<div class="col-sm-2">
							<select name="stat_slv" class="form-control select2" id="stat_slv" onChange="tampil2();" style="width: 100%;">
								<option <?php if($rcek1['stat_slv']==""){?> selected=selected <?php };?>value="">Pilih</option>
								<option <?php if($rcek1['stat_slv']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
								<option <?php if($rcek1['stat_slv']=="A"){?> selected=selected <?php };?>value="A">A</option>
								<option <?php if($rcek1['stat_slv']=="R"){?> selected=selected <?php };?>value="R">R</option>
								<option <?php if($rcek1['stat_slv']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
								<option <?php if($rcek1['stat_slv']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
								<option <?php if($rcek1['stat_slv']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
							</select>
						</div>
						</div>
						<div class="form-group" id="disslv" style="display:none;">
							<label for="disslv" class="col-sm-2 control-label">SALIVA FASTNESS (DIS)</label>
							<div class="col-sm-2">
								<input name="dsaliva_staining" type="text" class="form-control" id="dsaliva_staining" value="<?php echo $rcekD['dsaliva_staining'];?>" placeholder="4-5 Color Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dsaliva_note" maxlength="50" rows="1"><?php echo $rcekD['dsaliva_note'];?></textarea>
							</div>
						</div>	
						<div class="form-group" id="ranslv" style="display:none;">
							<label for="ranslv" class="col-sm-2 control-label">SALIVA FASTNESS (RAN)</label>
							<div class="col-sm-2">
								<input name="rsaliva_staining" type="text" class="form-control" id="rsaliva_staining" value="<?php echo $rcekR['rsaliva_staining'];?>" placeholder="4-5 Color Staining" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rsaliva_note" maxlength="50" rows="1" readonly><?php echo $rcekR['rsaliva_note'];?></textarea>
							</div>
						</div>
						<!-- SALIVA END-->
						<!-- BLEEDING BEGIN-->
						<div class="form-group" id="c12" style="display:none;">
							<label for="bleeding" class="col-sm-2 control-label">BLEEDING</label>
							<div class="col-sm-2">
								<input name="bleeding" type="text" class="form-control" id="bleeding" value="<?php echo $rcek1['bleeding'];?>" placeholder="Watermark">
							</div>
							<div class="col-sm-2">
								<input name="bleeding_root" type="text" class="form-control"  value="<?php echo $tq_test_2_array['bleeding_root'];?>" placeholder="Root">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="bleeding_note" maxlength="50" rows="1"><?php echo $rcek1['bleeding_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_bld" style="display:none;">
						<label for="stat_bld" class="col-sm-2 control-label">STATUS</label>
						<div class="col-sm-2">
							<select name="stat_bld" class="form-control select2" id="stat_bld" onChange="tampil2();" style="width: 100%;">
								<option <?php if($rcek1['stat_bld']==""){?> selected=selected <?php };?>value="">Pilih</option>
								<option <?php if($rcek1['stat_bld']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
								<option <?php if($rcek1['stat_bld']=="A"){?> selected=selected <?php };?>value="A">A</option>
								<option <?php if($rcek1['stat_bld']=="R"){?> selected=selected <?php };?>value="R">R</option>
								<option <?php if($rcek1['stat_bld']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
								<option <?php if($rcek1['stat_bld']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
								<option <?php if($rcek1['stat_bld']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
							</select>
						</div>
						</div>
						<div class="form-group" id="disbld" style="display:none;">
						<label for="disbld" class="col-sm-2 control-label">BLEEDING (DIS)</label>
						<div class="col-sm-2">
							<input name="dbleeding" type="text" class="form-control" id="dbleeding" value="<?php echo $rcekD['dbleeding'];?>" placeholder="Watermark">
						</div>
						<div class="col-sm-2">
									<input name="dbleeding_root" type="text" class="form-control"  value="<?php echo $rcekD['dbleeding_root'];?>" placeholder="Root">
								</div>
						<div class="col-sm-2">
							<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dbleeding_note" maxlength="50" rows="1"><?php echo $rcekD['dbleeding_note'];?></textarea>
						</div>
						</div>	
						<div class="form-group" id="ranbld" style="display:none;">
						<label for="ranbld" class="col-sm-2 control-label">BLEEDING (RAN)</label>
						<div class="col-sm-2">
							<input name="rbleeding" type="text" class="form-control" id="rbleeding" value="<?php echo $rcekR['rbleeding'];?>" placeholder="Color Staining" readonly>
						</div>
						<div class="col-sm-2">
							<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rbleeding_note" maxlength="50" rows="1" readonly><?php echo $rcekR['rbleeding_note'];?></textarea>
						</div>
						</div>	
						<!-- BLEEDING END-->
						<!-- CHLORIN BEGIN-->
						<div class="form-group" id="c13" style="display:none;">
							<label for="chlorin" class="col-sm-2 control-label">CHLORIN</label>
							<div class="col-sm-2">
								<input name="chlorin" type="text" class="form-control" id="chlorin" value="<?php echo $rcek1['chlorin'];?>" placeholder="">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="chlorin_note" maxlength="50" rows="1"><?php echo $rcek1['chlorin_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_chl" style="display:none;">
						<label for="stat_chl" class="col-sm-2 control-label">STATUS</label>
						<div class="col-sm-2">
							<select name="stat_chl" class="form-control select2" id="stat_chl" onChange="tampil2();" style="width: 100%;">
								<option <?php if($rcek1['stat_chl']==""){?> selected=selected <?php };?>value="">Pilih</option>
								<option <?php if($rcek1['stat_chl']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
								<option <?php if($rcek1['stat_chl']=="A"){?> selected=selected <?php };?>value="A">A</option>
								<option <?php if($rcek1['stat_chl']=="R"){?> selected=selected <?php };?>value="R">R</option>
								<option <?php if($rcek1['stat_chl']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
								<option <?php if($rcek1['stat_chl']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
								<option <?php if($rcek1['stat_chl']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
							</select>
						</div>
						</div>
						<div class="form-group" id="dischl" style="display:none;">
						<label for="dischl" class="col-sm-2 control-label">CHLORIN (DIS)</label>
						<div class="col-sm-2">
							<input name="dchlorin" type="text" class="form-control" id="dchlorin" value="<?php echo $rcekD['dchlorin'];?>" placeholder="">
						</div>
						<div class="col-sm-2">
							<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dchlorin_note" maxlength="50" rows="1"><?php echo $rcekD['dchlorin_note'];?></textarea>
						</div>
						</div>	
						<div class="form-group" id="ranchl" style="display:none;">
						<label for="ranchl" class="col-sm-2 control-label">CHLORIN (RAN)</label>
						<div class="col-sm-2">
							<input name="rchlorin" type="text" class="form-control" id="rchlorin" value="<?php echo $rcekR['rchlorin'];?>" placeholder="" readonly>
						</div>
						<div class="col-sm-2">
							<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rchlorin_note" maxlength="50" rows="1" readonly><?php echo $rcekR['rchlorin_note'];?></textarea>
						</div>
						</div>
						<!-- CHLORIN END-->	
						<!-- NON CHLORIN BEGIN-->
						<div class="form-group" id="c14" style="display:none;">
							<label for="nchlorin" class="col-sm-2 control-label">NON-CHLORIN</label>
							<div class="col-sm-2">
								<input name="nchlorin1" type="text" class="form-control" id="nchlorin1" value="<?php echo $rcek1['nchlorin1'];?>" placeholder="">
								<input name="nchlorin2" type="text" class="form-control" id="nchlorin2" value="<?php echo $rcek1['nchlorin2'];?>" placeholder="">
							</div>
						</div>
						<div class="form-group" id="stat_nchl" style="display:none;">
						<label for="stat_nchl" class="col-sm-2 control-label">STATUS</label>
						<div class="col-sm-2">
							<select name="stat_nchl" class="form-control select2" id="stat_nchl" onChange="tampil2();" style="width: 100%;">
								<option <?php if($rcek1['stat_nchl']==""){?> selected=selected <?php };?>value="">Pilih</option>
								<option <?php if($rcek1['stat_nchl']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
								<option <?php if($rcek1['stat_nchl']=="A"){?> selected=selected <?php };?>value="A">A</option>
								<option <?php if($rcek1['stat_nchl']=="R"){?> selected=selected <?php };?>value="R">R</option>
								<option <?php if($rcek1['stat_nchl']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
								<option <?php if($rcek1['stat_nchl']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
								<option <?php if($rcek1['stat_nchl']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
							</select>
						</div>
						</div>
						<div class="form-group" id="disnchl" style="display:none;">
						<label for="disnchl" class="col-sm-2 control-label">NON CHLORIN (DIS)</label>
						<div class="col-sm-2">
							<input name="dnchlorin1" type="text" class="form-control" id="dnchlorin1" value="<?php echo $rcekD['dnchlorin1'];?>" placeholder="">
							<input name="dnchlorin2" type="text" class="form-control" id="dnchlorin2" value="<?php echo $rcekD['dnchlorin2'];?>" placeholder="">
						</div>
						</div>	
						<div class="form-group" id="rannchl" style="display:none;">
						<label for="rannchl" class="col-sm-2 control-label">NON CHLORIN (RAN)</label>
						<div class="col-sm-2">
							<input name="rnchlorin1" type="text" class="form-control" id="rnchlorin1" value="<?php echo $rcekR['rnchlorin1'];?>" placeholder="" readonly>
							<input name="rnchlorin2" type="text" class="form-control" id="rnchlorin2" value="<?php echo $rcekR['rnchlorin2'];?>" placeholder="" readonly>
						</div>
						</div>		
						<!-- NON CHLORIN END-->
						<!-- DYE TRANSFER BEGIN-->
						<div class="form-group" id="c15" style="display:none;">
							<label for="dye_tf" class="col-sm-2 control-label">DYE TRANSFER</label>
							<div class="col-sm-2">
								<input name="dye_tf_acetate" type="text" class="form-control" id="dye_tf_acetate" value="<?php echo $rcek1['dye_tf_acetate'];?>" placeholder="Acetate">
								<input name="dye_tf_cotton" type="text" class="form-control" id="dye_tf_cotton" value="<?php echo $rcek1['dye_tf_cotton'];?>" placeholder="Cotton">
							</div>
							<div class="col-sm-2">
								<input name="dye_tf_nylon" type="text" class="form-control" id="dye_tf_nylon" value="<?php echo $rcek1['dye_tf_nylon'];?>" placeholder="Nylon">
								<input name="dye_tf_poly" type="text" class="form-control" id="dye_tf_poly" value="<?php echo $rcek1['dye_tf_poly'];?>" placeholder="Polyester">
							</div>
							<div class="col-sm-2">
								<input name="dye_tf_acrylic" type="text" class="form-control" id="dye_tf_acrylic" value="<?php echo $rcek1['dye_tf_acrylic'];?>" placeholder="Acrylic">
								<input name="dye_tf_wool" type="text" class="form-control" id="dye_tf_wool" value="<?php echo $rcek1['dye_tf_wool'];?>" placeholder="Wool">
							</div>
							<div class="col-sm-2">
								<input name="dye_tf_sstaining" type="text" class="form-control" id="dye_tf_sstaining" value="<?php echo $rcek1['dye_tf_sstaining'];?>" placeholder="Self Staining">
								<input name="dye_tf_cstaining" type="text" class="form-control" id="dye_tf_cstaining" value="<?php echo $rcek1['dye_tf_cstaining'];?>" placeholder="Color Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="dye_tf_note" maxlength="50" rows="1"><?php echo $rcek1['dye_tf_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="stat_dye" style="display:none;">
							<label for="stat_dye" class="col-sm-2 control-label">STATUS</label>
							<div class="col-sm-2">
								<select name="stat_dye" class="form-control select2" id="stat_dye" onChange="tampil2();" style="width: 100%;">
									<option <?php if($rcek1['stat_dye']==""){?> selected=selected <?php };?>value="">Pilih</option>
									<option <?php if($rcek1['stat_dye']=="DISPOSISI"){?> selected=selected <?php };?>value="DISPOSISI">DISPOSISI</option>
									<option <?php if($rcek1['stat_dye']=="A"){?> selected=selected <?php };?>value="A">A</option>
									<option <?php if($rcek1['stat_dye']=="R"){?> selected=selected <?php };?>value="R">R</option>
									<option <?php if($rcek1['stat_dye']=="PASS"){?> selected=selected <?php };?>value="PASS">PASS</option>
									<option <?php if($rcek1['stat_dye']=="MARGINAL PASS"){?> selected=selected <?php };?>value="MARGINAL PASS">MARGINAL PASS</option>
									<option <?php if($rcek1['stat_dye']=="DATA"){?> selected=selected <?php };?>value="DATA">DATA</option>
									<option <?php if($rcek1['stat_dye']=="FAIL"){?> selected=selected <?php };?>value="FAIL">FAIL</option>
									<option <?php if($rcek1['stat_dye']=="RANDOM"){?> selected=selected <?php };?>value="RANDOM">RANDOM</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="disdye" style="display:none;">
							<label for="disdye" class="col-sm-2 control-label">DYE TRANSFER (DIS)</label>
							<div class="col-sm-2">
								<input name="ddye_tf_acetate" type="text" class="form-control" id="ddye_tf_acetate" value="<?php echo $rcekD['ddye_tf_acetate'];?>" placeholder="Acetate">
								<input name="ddye_tf_cotton" type="text" class="form-control" id="ddye_tf_cotton" value="<?php echo $rcekD['ddye_tf_cotton'];?>" placeholder="Cotton">
							</div>
							<div class="col-sm-2">
								<input name="ddye_tf_nylon" type="text" class="form-control" id="ddye_tf_nylon" value="<?php echo $rcekD['ddye_tf_nylon'];?>" placeholder="Nylon">
								<input name="ddye_tf_poly" type="text" class="form-control" id="ddye_tf_poly" value="<?php echo $rcekD['ddye_tf_poly'];?>" placeholder="Polyester">
							</div>
							<div class="col-sm-2">
								<input name="ddye_tf_acrylic" type="text" class="form-control" id="ddye_tf_acrylic" value="<?php echo $rcekD['ddye_tf_acrylic'];?>" placeholder="Acrylic">
								<input name="ddye_tf_wool" type="text" class="form-control" id="ddye_tf_wool" value="<?php echo $rcekD['ddye_tf_wool'];?>" placeholder="Wool">
							</div>
							<div class="col-sm-2">
								<input name="ddye_tf_cstaining" type="text" class="form-control" id="ddye_tf_cstaining" value="<?php echo $rcekD['ddye_tf_cstaining'];?>" placeholder="Color Staining">
								<input name="ddye_tf_sstaining" type="text" class="form-control" id="ddye_tf_sstaining" value="<?php echo $rcekD['ddye_tf_sstaining'];?>" placeholder="Self Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="ddye_tf_note" maxlength="50" rows="1"><?php echo $rcekD['ddye_tf_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="mardye" style="display:none;">
							<label for="mardye" class="col-sm-2 control-label">DYE TRANSFER (MARGINAL)</label>
							<div class="col-sm-2">
								<input name="mdye_tf_acetate" type="text" class="form-control" id="mdye_tf_acetate" value="<?php echo $rcekM['mdye_tf_acetate'];?>" placeholder="Acetate">
								<input name="mdye_tf_cotton" type="text" class="form-control" id="mdye_tf_cotton" value="<?php echo $rcekM['mdye_tf_cotton'];?>" placeholder="Cotton">
							</div>
							<div class="col-sm-2">
								<input name="mdye_tf_nylon" type="text" class="form-control" id="mdye_tf_nylon" value="<?php echo $rcekM['mdye_tf_nylon'];?>" placeholder="Nylon">
								<input name="mdye_tf_poly" type="text" class="form-control" id="mdye_tf_poly" value="<?php echo $rcekM['mdye_tf_poly'];?>" placeholder="Polyester">
							</div>
							<div class="col-sm-2">
								<input name="mdye_tf_acrylic" type="text" class="form-control" id="mdye_tf_acrylic" value="<?php echo $rcekM['mdye_tf_acrylic'];?>" placeholder="Acrylic">
								<input name="mdye_tf_wool" type="text" class="form-control" id="mdye_tf_wool" value="<?php echo $rcekM['mdye_tf_wool'];?>" placeholder="Wool">
							</div>
							<div class="col-sm-2">
								<input name="mdye_tf_cstaining" type="text" class="form-control" id="mdye_tf_cstaining" value="<?php echo $rcekM['mdye_tf_cstaining'];?>" placeholder="Color Staining">
								<input name="mdye_tf_sstaining" type="text" class="form-control" id="mdye_tf_sstaining" value="<?php echo $rcekM['mdye_tf_sstaining'];?>" placeholder="Self Staining">
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="mdye_tf_note" maxlength="50" rows="1"><?php echo $rcekM['mdye_tf_note'];?></textarea>
							</div>
						</div>
						<div class="form-group" id="randye" style="display:none;">
							<label for="randye" class="col-sm-2 control-label">DYE TRANSFER (RAN)</label>
							<div class="col-sm-2">
								<input name="rdye_tf_acetate" type="text" class="form-control" id="rdye_tf_acetate" value="<?php echo $rcekR['rdye_tf_acetate'];?>" placeholder="Acetate" readonly>  
								<input name="rdye_tf_cotton" type="text" class="form-control" id="rdye_tf_cotton" value="<?php echo $rcekR['rdye_tf_cotton'];?>" placeholder="Cotton" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rdye_tf_nylon" type="text" class="form-control" id="rdye_tf_nylon" value="<?php echo $rcekR['rdye_tf_nylon'];?>" placeholder="Nylon" readonly>
								<input name="rdye_tf_poly" type="text" class="form-control" id="rdye_tf_poly" value="<?php echo $rcekR['rdye_tf_poly'];?>" placeholder="Polyester" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rdye_tf_acrylic" type="text" class="form-control" id="rdye_tf_acrylic" value="<?php echo $rcekR['rdye_tf_acrylic'];?>" placeholder="Acrylic" readonly>
								<input name="rdye_tf_wool" type="text" class="form-control" id="rdye_tf_wool" value="<?php echo $rcekR['rdye_tf_wool'];?>" placeholder="Wool" readonly>
							</div>
							<div class="col-sm-2">
								<input name="rdye_tf_cstaining" type="text" class="form-control" id="rdye_tf_cstaining" value="<?php echo $rcekR['rdye_tf_cstaining'];?>" placeholder="Color Staining" readonly>
								<input name="rdye_tf_sstaining" type="text" class="form-control" id="rdye_tf_sstaining" value="<?php echo $rcekR['rdye_tf_sstaining'];?>" placeholder="Self Staining" readonly>
							</div>
							<div class="col-sm-2">
								<textarea class="form-control" placeholder="Note harus diakhir tanda titik" name="rdye_tf_note" maxlength="50" rows="1" readonly><?php echo $rcekR['rdye_tf_note'];?></textarea>
							</div>
						</div>
						<!-- DYE TRANSFER END-->		
						<div class="form-group">					
							<?php if($nocounter!=""){ ?>
						<button type="submit" class="btn btn-primary pull-right" name="colorfastness_save" value="save"><i class="fa fa-save"></i> Simpan</button>
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

<?php if($cek1>0 and isset($nocounter)){ ?>
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Result.
            <small class="pull-right">Date: <?php echo $rcek1['tgl_buat'];?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <!-- /.col -->
        <div class="col-sm-12 invoice-col">
		  <strong>COLORFASTNESS</strong>
		  <hr>
		  <table class="table">
		  	<?php if($rcek1['wash_temp']!="" or $rcek1['wash_colorchange']!="" or $rcek1['wash_acetate']!="" or $rcek1['wash_cotton']!="" or $rcek1['wash_nylon']!="" or $rcek1['wash_poly']!="" or $rcek1['wash_acrylic']!="" or $rcek1['wash_wool']!="" or $rcek1['wash_staining']!=""){
      		?>	
      	<tr>
		    <th rowspan="5">Washing</th>
			<th>Suhu</th>
		    <td colspan="4"><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_temp'];}else{echo $rcek1['wash_temp'];}?>&deg;</td>
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
			<td><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_colorchange'];}else{echo $rcek1['wash_colorchange'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_acetate'];}else{echo $rcek1['wash_acetate'];}?></td>
			<td><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_cotton'];}else{echo $rcek1['wash_cotton'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_nylon'];}else{echo $rcek1['wash_nylon'];}?></td>
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
		    <td><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_poly'];}else{echo $rcek1['wash_poly'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_acrylic'];}else{echo $rcek1['wash_acrylic'];}?></td>
			<td><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_wool'];}else{echo $rcek1['wash_wool'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_staining'];}else{echo $rcek1['wash_staining'];}?></td>
          	<td>&nbsp;</td>
        </tr>
		<?php } ?>
		<?php if($rcek1['acid_colorchange']!="" or $rcek1['acid_acetate']!="" or $rcek1['acid_cotton']!="" or $rcek1['acid_nylon']!="" or $rcek1['acid_poly']!="" or $rcek1['acid_acrylic']!="" or $rcek1['acid_wool']!="" or $rcek1['acid_staining']!=""){?>
		<tr>
			<th rowspan="4" colspan="2">Perspiration Acid</th>
			<td><strong>CC</strong></td>
		    <td colspan="2"><strong>Ace</strong></td>
			<td><strong>Cot</strong></td>
		    <td colspan="2"><strong>Nyl</strong></td>
          	<td>&nbsp;</td>
      	</tr>
      	<tr>
		    <td ><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_colorchange'];}else{echo $rcek1['acid_colorchange'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_acetate'];}else{echo $rcek1['acid_acetate'];}?></td>
			<td><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_cotton'];}else{echo $rcek1['acid_cotton'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_nylon'];}else{echo $rcek1['acid_nylon'];}?></td>
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
		    <td><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_poly'];}else{echo $rcek1['acid_poly'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_acrylic'];}else{echo $rcek1['acid_acrylic'];}?></td>
			<td><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_wool'];}else{echo $rcek1['acid_wool'];}?></td>
			<td colspan="2"><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_staining'];}else{echo $rcek1['acid_staining'];}?></td>
          	<td>&nbsp;</td>
		    <!--<td colspan="2"><?php echo $rcek1['acid_staining'];?></td>-->
	    </tr>
		<?php } ?>
		<?php if($rcek1['alkaline_colorchange']!="" or $rcek1['alkaline_acetate']!="" or $rcek1['alkaline_cotton']!="" or $rcek1['alkaline_nylon']!="" or $rcek1['alkaline_poly']!="" or $rcek1['alkaline_acrylic']!="" or $rcek1['alkaline_wool']!="" or $rcek1['alkaline_staining']!=""){?>
		<tr>
		    <th rowspan="4" colspan="2">Perspiration Alkaline</th>
          	<td><strong>CC</strong></td>
		    <td colspan="2"><strong>Ace</strong></td>
			<td><strong>Cot</strong></td>
		    <td colspan="2"><strong>Nyl</strong></td>
			<td>&nbsp;</td>
      	</tr>
      	<tr>
		    <td><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_colorchange'];}else{echo $rcek1['alkaline_colorchange'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_acetate'];}else{echo $rcek1['alkaline_acetate'];}?></td>
			<td><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_cotton'];}else{echo $rcek1['alkaline_cotton'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_nylon'];}else{echo $rcek1['alkaline_nylon'];}?></td>
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
		    <td><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_poly'];}else{echo $rcek1['alkaline_poly'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_acrylic'];}else{echo $rcek1['alkaline_acrylic'];}?></td>
			<td><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_wool'];}else{echo $rcek1['alkaline_wool'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_staining'];}else{echo $rcek1['alkaline_staining'];}?></td>
          	<td>&nbsp;</td>
			<!--<td colspan="2"><?php echo $rcek1['alkaline_staining'];?></td>-->
	    </tr>
		<?php } ?>
		<?php if($rcek1['water_colorchange']!="" or $rcek1['water_acetate']!="" or $rcek1['water_cotton']!="" or $rcek1['water_nylon']!="" or $rcek1['water_poly']!="" or $rcek1['water_acrylic']!="" or $rcek1['water_wool']!="" or $rcek1['water_staining']!=""){?>
		<tr>
		    <th rowspan="4" colspan="2">Water</th>
          	<td><strong>CC</strong></td>
		    <td colspan="2"><strong>Ace</strong></td>
			<td><strong>Cot</strong></td>
		    <td colspan="2"><strong>Nyl</strong></td>
			<td>&nbsp;</td>
      	</tr>
      	<tr>
		    <td><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_colorchange'];}else{echo $rcek1['water_colorchange'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_acetate'];}else{echo $rcek1['water_acetate'];}?></td>
			<td><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_cotton'];}else{echo $rcek1['water_cotton'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_nylon'];}else{echo $rcek1['water_nylon'];}?></td>
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
		    <td><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_poly'];}else{echo $rcek1['water_poly'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_acrylic'];}else{echo $rcek1['water_acrylic'];}?></td>
			<td><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_wool'];}else{echo $rcek1['water_wool'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_staining'];}else{echo $rcek1['water_staining'];}?></td>
          	<td>&nbsp;</td>
			<!--<td><?php echo $rcek1['water_staining'];?></td>-->
	    </tr>
		<?php } ?>
		<?php if($rcek1['crock_len1']!="" or $rcek1['crock_wid1']!="" or $rcek1['crock_len2']!="" or $rcek1['crock_wid2']!=""){?>
		<tr>
		    <th rowspan="3">Crocking</th>
			<th>Srt</th>
			<th>Dry</th>
			<th>Wet</th>
        </tr>
        <tr>
		    <th>Len</th>
		    <td><?php if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_len1'];}else{echo $rcek1['crock_len1'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_len2'];}else{echo $rcek1['crock_len2'];}?></td>
	    </tr>
		<tr>
		    <th >Wid</th>
		    <td><?php if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_wid1'];}else{echo $rcek1['crock_wid1'];}?></td>
		    <td colspan="3"><?php if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_wid2'];}else{echo $rcek1['crock_wid2'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['phenolic_colorchange']!=""){?>
		<tr>
		    <th>Phenolic Yellowing</th>
			<th><strong>CC</strong></th>
		    <td colspan="4"><?php if($rcek1['stat_py']=="RANDOM"){echo $rcekR['rphenolic_colorchange'];}else{echo $rcek1['phenolic_colorchange'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['light_rating1']!="" or $rcek1['light_rating2']!=""){?>
		<tr>
		    <th>Light</th>
			<th>&nbsp;</th>
			<td><?php if($rcek1['stat_lg']=="RANDOM"){echo $rcekR['rlight_rating1'];}else{echo $rcek1['light_rating1'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_lg']=="RANDOM"){echo $rcekR['rlight_rating2'];}else{echo $rcek1['light_rating2'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['cm_printing_colorchange']!="" or $rcek1['cm_printing_staining']!=""){?>
		<tr>
		    <th>Color Migration Oven</th>
			<th>&nbsp;</th>
			<td colspan="3"><?php if($rcek1['stat_cmo']=="RANDOM"){echo $rcekR['rcm_printing_colorchange'];}else{echo $rcek1['cm_printing_colorchange'];}?></td>
		    <td><?php if($rcek1['stat_cmo']=="RANDOM"){echo $rcekR['rcm_printing_staining'];}else{echo $rcek1['cm_printing_staining'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['cm_dye_temp']!="" or $rcek1['cm_dye_colorchange']!="" or $rcek1['cm_dye_stainingface']!="" or $rcek1['cm_dye_stainingback']!=""){?>
		<tr>
		    <th rowspan="3">Color Migration</th>
			<th>Suhu</th>
		    <td colspan="4"><?php if($rcek1['stat_cm']=="RANDOM"){echo $rcekR['rcm_dye_temp'];}else{echo $rcek1['cm_dye_temp'];}?>&deg;</td>
	    </tr>
		<tr>
			<th>&nbsp;</th>
			<td><strong>CC</strong></td>
			<td><strong>Sta</strong></td>
		</tr>
		<tr>
        	<th>&nbsp;</th>
			<td><?php if($rcek1['stat_cm']=="RANDOM"){echo $rcekR['rcm_dye_colorchange'];}else{echo $rcek1['cm_dye_colorchange'];}?></td>
		    <td colspan="4"><?php if($rcek1['stat_cm']=="RANDOM"){echo $rcekR['rcm_dye_stainingface'];}else{echo $rcek1['cm_dye_stainingface'];}?></td>
			<!--<td><?php echo $rcek1['cm_dye_stainingback'];?></td>-->
		</tr>
		<?php } ?>
		<?php if($rcek1['light_pers_colorchange']!=""){?>
		<tr>
		    <th>Light Perspiration</th>
			<th><strong>CC</strong></th>
		    <td colspan="4"><?php if($rcek1['stat_lp']=="RANDOM"){echo $rcekR['rlight_pers_colorchange'];}else{echo $rcek1['light_pers_colorchange'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['saliva_staining']!=""){?>
		<tr>
		    <th>Saliva</th>
			<th>&nbsp;</th>
		    <td colspan="2"><?php if($rcek1['stat_slv']=="RANDOM"){echo $rcekR['rsaliva_staining'];}else{echo $rcek1['saliva_staining'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['bleeding']!=""){?>
		<tr>
		    <th>Bleeding</th>
			<th>&nbsp;</th>
		    <td colspan="2"><?php if($rcek1['stat_bld']=="RANDOM"){echo $rcekR['rbleeding'];}else{echo $rcek1['bleeding'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['chlorin']!="" or $rcek1['nchlorin1']!="" or $rcek1['nchlorin2']!=""){?>
		<tr>
		    <th>Chlorin</th>
			<th>&nbsp;</th>
		    <td colspan="2"><?php if($rcek1['stat_chl']=="RANDOM"){echo $rcekR['rchlorin'];}else{echo $rcek1['chlorin'];}?></td>
			<td>&nbsp;</td>
	    </tr>
		<tr>
		    <th>Non-Chlorin</th>
			<th>&nbsp;</th>
		    <td colspan="2"><?php if($rcek1['stat_nchl']=="RANDOM"){echo $rcekR['rnchlorin1'];}else{echo $rcek1['nchlorin1'];}?></td>
			<td colspan="2"><?php if($rcek1['stat_nchl']=="RANDOM"){echo $rcekR['rnchlorin2'];}else{echo $rcek1['nchlorin2'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['dye_tf_cstaining']!="" or $rcek1['dye_tf_acetate']!="" or $rcek1['dye_tf_cotton']!="" or $rcek1['dye_tf_nylon']!="" or $rcek1['dye_tf_poly']!="" or $rcek1['dye_tf_acrylic']!="" or $rcek1['dye_tf_wool']!="" or $rcek1['dye_tf_sstaining']!=""){
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
			<td><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_acetate'];}else{echo $rcek1['dye_tf_acetate'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_cotton'];}else{echo $rcek1['dye_tf_cotton'];}?></td>
			<td><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_nylon'];}else{echo $rcek1['dye_tf_nylon'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_poly'];}else{echo $rcek1['dye_tf_poly'];}?></td>
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
		    <td><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_acrylic'];}else{echo $rcek1['dye_tf_acrylic'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_wool'];}else{echo $rcek1['dye_tf_wool'];}?></td>
			<td><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_cstaining'];}else{echo $rcek1['dye_tf_cstaining'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_sstaining'];}else{echo $rcek1['dye_tf_sstaining'];}?></td>
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
            <?php echo trim($rcek1['note_g']);?><br>
			<?php if(strpos($buyer,'ADIDAS') !== false AND $rcekcmt['note_apperss']!=""){echo "PHX-AP0701 slight color change, no obvious pilling (face=".$rcek1['apperss_pf2'].", back=".$rcek1['apperss_pb2']."), snagging (face=".$rcek1['apperss_sf2'].", back=".$rcek1['apperss_sb2']."), overall satisfactory";}?>
          </p>
        </div>  
        <!-- /.col -->
      </div>
      <!-- /.row --><!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="pages/cetak/cetak_result_lab.php?idkk=<?php echo $rcek['id'];?>&noitem=<?php echo $rcek['no_item'];?>&nohanger=<?php echo $rcek['no_item'];?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>
  </div>
</section>						
       <?php } ?>             
				  </div>
                </div>
            </div>
        </div>
<?php
$array_insert = [];

if($_POST['colorfastness_save']=="save") {  // bleeding_root save
	$bleeding_root = $_POST['bleeding_root'];
	$dbleeding_root = $_POST['dbleeding_root'];
	if ($tq_test_2_array or count($array_insert) >  0) {
		if ($bleeding_root=='') {
			$sqlPHY=mysqli_query($conlab,"UPDATE tbl_tq_test_2 SET bleeding_root = null  WHERE id_nokk='$id_tq_test_2'");
		} else {
			$sqlPHY=mysqli_query($conlab,"UPDATE tbl_tq_test_2 SET bleeding_root = '$bleeding_root'  WHERE id_nokk='$id_tq_test_2'");
		}
	} else {
		if ($_POST['bleeding_root']!='0'  ) { //insert 
		$sql_no_demand =mysqli_query($conlab,"INSERT INTO tbl_tq_test_2 (id_nokk,bleeding_root) VALUES ('$id_tq_test_2','$bleeding_root')");				
		}
	}
	
	if ($dbleeding_root !='') {
			$sqlPHY=mysqli_query($conlab,"UPDATE tbl_tq_disptest_2 SET dbleeding_root = '$dbleeding_root'  WHERE id_nokk='$id_tq_test_2'");
			 $sql_no_demand =mysqli_query($conlab,"INSERT INTO tbl_tq_disptest_2 (id_nokk,dbleeding_root) VALUES ('$id_tq_test_2','$dbleeding_root')");			
	
		} else {
			$sqlPHY=mysqli_query($conlab,"UPDATE tbl_tq_disptest_2 SET dbleeding_root = null  WHERE id_nokk='$id_tq_test_2'");
		    $sql_no_demand =mysqli_query($conlab,"INSERT INTO tbl_tq_disptest_2 (id_nokk,dbleeding_root) VALUES ('$id_tq_test_2','$dbleeding_root')");			
	
		}
}

?>
	
<?php  

if($_POST['colorfastness_save']=="save" and $cek1>0){
	$sqlCLR=mysqli_query($conlab,"UPDATE tbl_tq_test SET
	`wash_temp`='$_POST[wash_temp]',
	`wash_colorchange`='$_POST[wash_colorchange]',
	`wash_acetate`='$_POST[wash_acetate]',
	`wash_cotton`='$_POST[wash_cotton]',
	`wash_nylon`='$_POST[wash_nylon]',
	`wash_poly`='$_POST[wash_poly]',
	`wash_acrylic`='$_POST[wash_acrylic]',
	`wash_wool`='$_POST[wash_wool]',
	`wash_staining`='$_POST[wash_staining]',
	`wash_note`='$_POST[wash_note]',
	`water_colorchange`='$_POST[water_colorchange]',
	`water_acetate`='$_POST[water_acetate]',
	`water_cotton`='$_POST[water_cotton]',
	`water_nylon`='$_POST[water_nylon]',
	`water_poly`='$_POST[water_poly]',
	`water_acrylic`='$_POST[water_acrylic]',
	`water_wool`='$_POST[water_wool]',
	`water_staining`='$_POST[water_staining]',
	`water_note`='$_POST[water_note]',
	`acid_colorchange`='$_POST[acid_colorchange]',
	`acid_acetate`='$_POST[acid_acetate]',
	`acid_cotton`='$_POST[acid_cotton]',
	`acid_nylon`='$_POST[acid_nylon]',
	`acid_poly`='$_POST[acid_poly]',
	`acid_acrylic`='$_POST[acid_acrylic]',
	`acid_wool`='$_POST[acid_wool]',
	`acid_staining`='$_POST[acid_staining]',
	`acid_note`='$_POST[acid_note]',
	`alkaline_colorchange`='$_POST[alkaline_colorchange]',
	`alkaline_acetate`='$_POST[alkaline_acetate]',
	`alkaline_cotton`='$_POST[alkaline_cotton]',
	`alkaline_nylon`='$_POST[alkaline_nylon]',
	`alkaline_poly`='$_POST[alkaline_poly]',
	`alkaline_acrylic`='$_POST[alkaline_acrylic]',
	`alkaline_wool`='$_POST[alkaline_wool]',
	`alkaline_staining`='$_POST[alkaline_staining]',
	`alkaline_note`='$_POST[alkaline_note]',
	`crock_len1`='$_POST[crock_len1]',
	`crock_wid1`='$_POST[crock_wid1]',
	`crock_len2`='$_POST[crock_len2]',
	`crock_wid2`='$_POST[crock_wid2]',
	`crock_note`='$_POST[crock_note]',
	`phenolic_colorchange`='$_POST[phenolic_colorchange]',
	`phenolic_note`='$_POST[phenolic_note]',
	`cm_printing_colorchange`='$_POST[cm_printing_colorchange]',
	`cm_printing_staining`='$_POST[cm_printing_staining]',
	`cm_printing_note`='$_POST[cm_printing_note]',
	`cm_dye_temp`='$_POST[cm_dye_temp]',
	`cm_dye_colorchange`='$_POST[cm_dye_colorchange]',
	`cm_dye_stainingface`='$_POST[cm_dye_stainingface]',
	`cm_dye_stainingback`='$_POST[cm_dye_stainingback]',
	`cm_dye_note`='$_POST[cm_dye_note]',
	`light_rating1`='$_POST[light_rating1]',
	`light_rating2`='$_POST[light_rating2]',
	`light_note`='$_POST[light_note]',
	`light_pers_colorchange`='$_POST[light_pers_colorchange]',
	`light_pers_note`='$_POST[light_pers_note]',
	`saliva_staining`='$_POST[saliva_staining]',
	`saliva_note`='$_POST[saliva_note]',
	`bleeding`='$_POST[bleeding]',
	`bleeding_note`='$_POST[bleeding_note]',
	`chlorin`='$_POST[chlorin]',
	`nchlorin1`='$_POST[nchlorin1]',
	`nchlorin2`='$_POST[nchlorin2]',
	`chlorin_note`='$_POST[chlorin_note]',
	`dye_tf_sstaining`='$_POST[dye_tf_sstaining]',
	`dye_tf_cstaining`='$_POST[dye_tf_cstaining]',
	`dye_tf_acetate`='$_POST[dye_tf_acetate]',
	`dye_tf_cotton`='$_POST[dye_tf_cotton]',
	`dye_tf_nylon`='$_POST[dye_tf_nylon]',
	`dye_tf_poly`='$_POST[dye_tf_poly]',
	`dye_tf_acrylic`='$_POST[dye_tf_acrylic]',
	`dye_tf_wool`='$_POST[dye_tf_wool]',
	`dye_tf_note`='$_POST[dye_tf_note]',
	`stat_wf`='$_POST[stat_wf]',
	`stat_wtr`='$_POST[stat_wtr]',
	`stat_pac`='$_POST[stat_pac]',
	`stat_pal`='$_POST[stat_pal]',
	`stat_cr`='$_POST[stat_cr]',
	`stat_py`='$_POST[stat_py]',
	`stat_cmo`='$_POST[stat_cmo]',
	`stat_cm`='$_POST[stat_cm]',
	`stat_lg`='$_POST[stat_lg]',
	`stat_lp`='$_POST[stat_lp]',
	`stat_slv`='$_POST[stat_slv]',
	`stat_bld`='$_POST[stat_bld]',
	`stat_chl`='$_POST[stat_chl]',
	`stat_nchl`='$_POST[stat_nchl]',
	`stat_dye`='$_POST[stat_dye]',
	`tgl_update`=now(),
	`sco_acid_original`= '$sco_original',
	`sco_acid_status`= '$_POST[sco_acid_status]',
	`sca_acid_original`= '$sca_acid',
	`sca_acid_status`= '$_POST[sca_acid_status]',
	`sco_alkaline_afterwash` = '$sco_alkaline_afterwash',
	`sco_alkaline_status` = '$_POST[sco_alkaline_status]',
	`sca_alkaline_afterwash` = '$sca_alkaline_afterwash',
	`sca_alkaline_status` = '$_POST[sca_alkaline_status]',
	`sc_note` =  '$_POST[sc_note]'
	WHERE `id_nokk`='$rcek[id]'
	");
	if($sqlCLR){
		$sqlCLRD=mysqli_query($conlab,"UPDATE tbl_tq_disptest SET
	`dwash_temp`='$_POST[dwash_temp]',
	`dwash_colorchange`='$_POST[dwash_colorchange]',
	`dwash_acetate`='$_POST[dwash_acetate]',
	`dwash_cotton`='$_POST[dwash_cotton]',
	`dwash_nylon`='$_POST[dwash_nylon]',
	`dwash_poly`='$_POST[dwash_poly]',
	`dwash_acrylic`='$_POST[dwash_acrylic]',
	`dwash_wool`='$_POST[dwash_wool]',
	`dwash_staining`='$_POST[dwash_staining]',
	`dwash_note`='$_POST[dwash_note]',
	`dwater_colorchange`='$_POST[dwater_colorchange]',
	`dwater_acetate`='$_POST[dwater_acetate]',
	`dwater_cotton`='$_POST[dwater_cotton]',
	`dwater_nylon`='$_POST[dwater_nylon]',
	`dwater_poly`='$_POST[dwater_poly]',
	`dwater_acrylic`='$_POST[dwater_acrylic]',
	`dwater_wool`='$_POST[dwater_wool]',
	`dwater_staining`='$_POST[dwater_staining]',
	`dwater_note`='$_POST[dwater_note]',
	`dacid_colorchange`='$_POST[dacid_colorchange]',
	`dacid_acetate`='$_POST[dacid_acetate]',
	`dacid_cotton`='$_POST[dacid_cotton]',
	`dacid_nylon`='$_POST[dacid_nylon]',
	`dacid_poly`='$_POST[dacid_poly]',
	`dacid_acrylic`='$_POST[dacid_acrylic]',
	`dacid_wool`='$_POST[dacid_wool]',
	`dacid_staining`='$_POST[dacid_staining]',
	`dacid_note`='$_POST[dacid_note]',
	`dalkaline_colorchange`='$_POST[dalkaline_colorchange]',
	`dalkaline_acetate`='$_POST[dalkaline_acetate]',
	`dalkaline_cotton`='$_POST[dalkaline_cotton]',
	`dalkaline_nylon`='$_POST[dalkaline_nylon]',
	`dalkaline_poly`='$_POST[dalkaline_poly]',
	`dalkaline_acrylic`='$_POST[dalkaline_acrylic]',
	`dalkaline_wool`='$_POST[dalkaline_wool]',
	`dalkaline_staining`='$_POST[dalkaline_staining]',
	`dalkaline_note`='$_POST[dalkaline_note]',
	`dcrock_len1`='$_POST[dcrock_len1]',
	`dcrock_wid1`='$_POST[dcrock_wid1]',
	`dcrock_len2`='$_POST[dcrock_len2]',
	`dcrock_wid2`='$_POST[dcrock_wid2]',
	`dcrock_note`='$_POST[dcrock_note]',
	`dphenolic_colorchange`='$_POST[dphenolic_colorchange]',
	`dphenolic_note`='$_POST[dphenolic_note]',
	`dcm_printing_colorchange`='$_POST[dcm_printing_colorchange]',
	`dcm_printing_staining`='$_POST[dcm_printing_staining]',
	`dcm_printing_note`='$_POST[dcm_printing_note]',
	`dcm_dye_temp`='$_POST[dcm_dye_temp]',
	`dcm_dye_colorchange`='$_POST[dcm_dye_colorchange]',
	`dcm_dye_stainingface`='$_POST[dcm_dye_stainingface]',
	`dcm_dye_stainingback`='$_POST[dcm_dye_stainingback]',
	`dcm_dye_note`='$_POST[dcm_dye_note]',
	`dlight_rating1`='$_POST[dlight_rating1]',
	`dlight_rating2`='$_POST[dlight_rating2]',
	`dlight_note`='$_POST[dlight_note]',
	`dlight_pers_colorchange`='$_POST[dlight_pers_colorchange]',
	`dlight_pers_note`='$_POST[dlight_pers_note]',
	`dsaliva_staining`='$_POST[dsaliva_staining]',
	`dsaliva_note`='$_POST[dsaliva_note]',
	`dbleeding`='$_POST[dbleeding]',
	`dbleeding_note`='$_POST[dbleeding_note]',
	`dchlorin`='$_POST[dchlorin]',
	`dnchlorin1`='$_POST[dnchlorin1]',
	`dnchlorin2`='$_POST[dnchlorin2]',
	`dchlorin_note`='$_POST[dchlorin_note]',
	`ddye_tf_sstaining`='$_POST[ddye_tf_sstaining]',
	`ddye_tf_cstaining`='$_POST[ddye_tf_cstaining]',
	`ddye_tf_acetate`='$_POST[ddye_tf_acetate]',
	`ddye_tf_cotton`='$_POST[ddye_tf_cotton]',
	`ddye_tf_nylon`='$_POST[ddye_tf_nylon]',
	`ddye_tf_poly`='$_POST[ddye_tf_poly]',
	`ddye_tf_acrylic`='$_POST[ddye_tf_acrylic]',
	`ddye_tf_wool`='$_POST[ddye_tf_wool]',
	`ddye_tf_note`='$_POST[ddye_tf_note]',
	`tgl_update`=now()
	WHERE `id_nokk`='$rcek[id]'
	");

$sqlCLRDI=mysqli_query($conlab,"INSERT INTO tbl_tq_disptest SET
`id_nokk`='$rcek[id]',
`dwash_temp`='$_POST[dwash_temp]',
`dwash_colorchange`='$_POST[dwash_colorchange]',
`dwash_acetate`='$_POST[dwash_acetate]',
`dwash_cotton`='$_POST[dwash_cotton]',
`dwash_nylon`='$_POST[dwash_nylon]',
`dwash_poly`='$_POST[dwash_poly]',
`dwash_acrylic`='$_POST[dwash_acrylic]',
`dwash_wool`='$_POST[dwash_wool]',
`dwash_staining`='$_POST[dwash_staining]',
`dwash_note`='$_POST[dwash_note]',
`dwater_colorchange`='$_POST[dwater_colorchange]',
`dwater_acetate`='$_POST[dwater_acetate]',
`dwater_cotton`='$_POST[dwater_cotton]',
`dwater_nylon`='$_POST[dwater_nylon]',
`dwater_poly`='$_POST[dwater_poly]',
`dwater_acrylic`='$_POST[dwater_acrylic]',
`dwater_wool`='$_POST[dwater_wool]',
`dwater_staining`='$_POST[dwater_staining]',
`dwater_note`='$_POST[dwater_note]',
`dacid_colorchange`='$_POST[dacid_colorchange]',
`dacid_acetate`='$_POST[dacid_acetate]',
`dacid_cotton`='$_POST[dacid_cotton]',
`dacid_nylon`='$_POST[dacid_nylon]',
`dacid_poly`='$_POST[dacid_poly]',
`dacid_acrylic`='$_POST[dacid_acrylic]',
`dacid_wool`='$_POST[dacid_wool]',
`dacid_staining`='$_POST[dacid_staining]',
`dacid_note`='$_POST[dacid_note]',
`dalkaline_colorchange`='$_POST[dalkaline_colorchange]',
`dalkaline_acetate`='$_POST[dalkaline_acetate]',
`dalkaline_cotton`='$_POST[dalkaline_cotton]',
`dalkaline_nylon`='$_POST[dalkaline_nylon]',
`dalkaline_poly`='$_POST[dalkaline_poly]',
`dalkaline_acrylic`='$_POST[dalkaline_acrylic]',
`dalkaline_wool`='$_POST[dalkaline_wool]',
`dalkaline_staining`='$_POST[dalkaline_staining]',
`dalkaline_note`='$_POST[dalkaline_note]',
`dcrock_len1`='$_POST[dcrock_len1]',
`dcrock_wid1`='$_POST[dcrock_wid1]',
`dcrock_len2`='$_POST[dcrock_len2]',
`dcrock_wid2`='$_POST[dcrock_wid2]',
`dcrock_note`='$_POST[dcrock_note]',
`dphenolic_colorchange`='$_POST[dphenolic_colorchange]',
`dphenolic_note`='$_POST[dphenolic_note]',
`dcm_printing_colorchange`='$_POST[dcm_printing_colorchange]',
`dcm_printing_staining`='$_POST[dcm_printing_staining]',
`dcm_printing_note`='$_POST[dcm_printing_note]',
`dcm_dye_temp`='$_POST[dcm_dye_temp]',
`dcm_dye_colorchange`='$_POST[dcm_dye_colorchange]',
`dcm_dye_stainingface`='$_POST[dcm_dye_stainingface]',
`dcm_dye_stainingback`='$_POST[dcm_dye_stainingback]',
`dcm_dye_note`='$_POST[dcm_dye_note]',
`dlight_rating1`='$_POST[dlight_rating1]',
`dlight_rating2`='$_POST[dlight_rating2]',
`dlight_note`='$_POST[dlight_note]',
`dlight_pers_colorchange`='$_POST[dlight_pers_colorchange]',
`dlight_pers_note`='$_POST[dlight_pers_note]',
`dsaliva_staining`='$_POST[dsaliva_staining]',
`dsaliva_note`='$_POST[dsaliva_note]',
`dbleeding`='$_POST[dbleeding]',
`dbleeding_note`='$_POST[dbleeding_note]',
`dchlorin`='$_POST[dchlorin]',
`dnchlorin1`='$_POST[dnchlorin1]',
`dnchlorin2`='$_POST[dnchlorin2]',
`dchlorin_note`='$_POST[dchlorin_note]',
`ddye_tf_sstaining`='$_POST[ddye_tf_sstaining]',
`ddye_tf_cstaining`='$_POST[ddye_tf_cstaining]',
`ddye_tf_acetate`='$_POST[ddye_tf_acetate]',
`ddye_tf_cotton`='$_POST[ddye_tf_cotton]',
`ddye_tf_nylon`='$_POST[ddye_tf_nylon]',
`ddye_tf_poly`='$_POST[ddye_tf_poly]',
`ddye_tf_acrylic`='$_POST[ddye_tf_acrylic]',
`ddye_tf_wool`='$_POST[ddye_tf_wool]',
`ddye_tf_note`='$_POST[ddye_tf_note]',
`tgl_buat`=now(),
`tgl_update`=now()
");

$sqlCLRM=mysqli_query($conlab,"UPDATE tbl_tq_marginal SET
	`mwash_temp`='$_POST[mwash_temp]',
	`mwash_colorchange`='$_POST[mwash_colorchange]',
	`mwash_acetate`='$_POST[mwash_acetate]',
	`mwash_cotton`='$_POST[mwash_cotton]',
	`mwash_nylon`='$_POST[mwash_nylon]',
	`mwash_poly`='$_POST[mwash_poly]',
	`mwash_acrylic`='$_POST[mwash_acrylic]',
	`mwash_wool`='$_POST[mwash_wool]',
	`mwash_staining`='$_POST[mwash_staining]',
	`mwash_note`='$_POST[mwash_note]',
	`mwater_colorchange`='$_POST[mwater_colorchange]',
	`mwater_acetate`='$_POST[mwater_acetate]',
	`mwater_cotton`='$_POST[mwater_cotton]',
	`mwater_nylon`='$_POST[mwater_nylon]',
	`mwater_poly`='$_POST[mwater_poly]',
	`mwater_acrylic`='$_POST[mwater_acrylic]',
	`mwater_wool`='$_POST[mwater_wool]',
	`mwater_staining`='$_POST[mwater_staining]',
	`mwater_note`='$_POST[mwater_note]',
	`macid_colorchange`='$_POST[macid_colorchange]',
	`macid_acetate`='$_POST[macid_acetate]',
	`macid_cotton`='$_POST[macid_cotton]',
	`macid_nylon`='$_POST[macid_nylon]',
	`macid_poly`='$_POST[macid_poly]',
	`macid_acrylic`='$_POST[macid_acrylic]',
	`macid_wool`='$_POST[macid_wool]',
	`macid_staining`='$_POST[macid_staining]',
	`macid_note`='$_POST[macid_note]',
	`malkaline_colorchange`='$_POST[malkaline_colorchange]',
	`malkaline_acetate`='$_POST[malkaline_acetate]',
	`malkaline_cotton`='$_POST[malkaline_cotton]',
	`malkaline_nylon`='$_POST[malkaline_nylon]',
	`malkaline_poly`='$_POST[malkaline_poly]',
	`malkaline_acrylic`='$_POST[malkaline_acrylic]',
	`malkaline_wool`='$_POST[malkaline_wool]',
	`malkaline_staining`='$_POST[malkaline_staining]',
	`malkaline_note`='$_POST[malkaline_note]',
	`mcrock_len1`='$_POST[mcrock_len1]',
	`mcrock_wid1`='$_POST[mcrock_wid1]',
	`mcrock_len2`='$_POST[mcrock_len2]',
	`mcrock_wid2`='$_POST[mcrock_wid2]',
	`mcrock_note`='$_POST[mcrock_note]',
	`mphenolic_colorchange`='$_POST[mphenolic_colorchange]',
	`mphenolic_note`='$_POST[mphenolic_note]',
	`mcm_printing_colorchange`='$_POST[mcm_printing_colorchange]',
	`mcm_printing_staining`='$_POST[mcm_printing_staining]',
	`mcm_printing_note`='$_POST[mcm_printing_note]',
	`mcm_dye_temp`='$_POST[mcm_dye_temp]',
	`mcm_dye_colorchange`='$_POST[mcm_dye_colorchange]',
	`mcm_dye_stainingface`='$_POST[mcm_dye_stainingface]',
	`mcm_dye_stainingback`='$_POST[mcm_dye_stainingback]',
	`mcm_dye_note`='$_POST[mcm_dye_note]',
	`mlight_rating1`='$_POST[mlight_rating1]',
	`mlight_rating2`='$_POST[mlight_rating2]',
	`mlight_note`='$_POST[mlight_note]',
	`mlight_pers_colorchange`='$_POST[mlight_pers_colorchange]',
	`mlight_pers_note`='$_POST[mlight_pers_note]',
	`msaliva_staining`='$_POST[msaliva_staining]',
	`msaliva_note`='$_POST[msaliva_note]',
	`mbleeding`='$_POST[mbleeding]',
	`mbleeding_note`='$_POST[mbleeding_note]',
	`mchlorin`='$_POST[mchlorin]',
	`mnchlorin1`='$_POST[mnchlorin1]',
	`mnchlorin2`='$_POST[mnchlorin2]',
	`mchlorin_note`='$_POST[mchlorin_note]',
	`mdye_tf_sstaining`='$_POST[mdye_tf_sstaining]',
	`mdye_tf_cstaining`='$_POST[mdye_tf_cstaining]',
	`mdye_tf_acetate`='$_POST[mdye_tf_acetate]',
	`mdye_tf_cotton`='$_POST[mdye_tf_cotton]',
	`mdye_tf_nylon`='$_POST[mdye_tf_nylon]',
	`mdye_tf_poly`='$_POST[mdye_tf_poly]',
	`mdye_tf_acrylic`='$_POST[mdye_tf_acrylic]',
	`mdye_tf_wool`='$_POST[mdye_tf_wool]',
	`mdye_tf_note`='$_POST[mdye_tf_note]',
	`tgl_update`=now()
	WHERE `id_nokk`='$rcek[id]'
	");

$sqlCLRMI=mysqli_query($conlab,"INSERT INTO tbl_tq_marginal SET
`id_nokk`='$rcek[id]',
`mwash_temp`='$_POST[mwash_temp]',
`mwash_colorchange`='$_POST[mwash_colorchange]',
`mwash_acetate`='$_POST[mwash_acetate]',
`mwash_cotton`='$_POST[mwash_cotton]',
`mwash_nylon`='$_POST[mwash_nylon]',
`mwash_poly`='$_POST[mwash_poly]',
`mwash_acrylic`='$_POST[mwash_acrylic]',
`mwash_wool`='$_POST[mwash_wool]',
`mwash_staining`='$_POST[mwash_staining]',
`mwash_note`='$_POST[mwash_note]',
`mwater_colorchange`='$_POST[mwater_colorchange]',
`mwater_acetate`='$_POST[mwater_acetate]',
`mwater_cotton`='$_POST[mwater_cotton]',
`mwater_nylon`='$_POST[mwater_nylon]',
`mwater_poly`='$_POST[mwater_poly]',
`mwater_acrylic`='$_POST[mwater_acrylic]',
`mwater_wool`='$_POST[mwater_wool]',
`mwater_staining`='$_POST[mwater_staining]',
`mwater_note`='$_POST[mwater_note]',
`macid_colorchange`='$_POST[macid_colorchange]',
`macid_acetate`='$_POST[macid_acetate]',
`macid_cotton`='$_POST[macid_cotton]',
`macid_nylon`='$_POST[macid_nylon]',
`macid_poly`='$_POST[macid_poly]',
`macid_acrylic`='$_POST[macid_acrylic]',
`macid_wool`='$_POST[macid_wool]',
`macid_staining`='$_POST[macid_staining]',
`macid_note`='$_POST[macid_note]',
`malkaline_colorchange`='$_POST[malkaline_colorchange]',
`malkaline_acetate`='$_POST[malkaline_acetate]',
`malkaline_cotton`='$_POST[malkaline_cotton]',
`malkaline_nylon`='$_POST[malkaline_nylon]',
`malkaline_poly`='$_POST[malkaline_poly]',
`malkaline_acrylic`='$_POST[malkaline_acrylic]',
`malkaline_wool`='$_POST[malkaline_wool]',
`malkaline_staining`='$_POST[malkaline_staining]',
`malkaline_note`='$_POST[malkaline_note]',
`mcrock_len1`='$_POST[mcrock_len1]',
`mcrock_wid1`='$_POST[mcrock_wid1]',
`mcrock_len2`='$_POST[mcrock_len2]',
`mcrock_wid2`='$_POST[mcrock_wid2]',
`mcrock_note`='$_POST[mcrock_note]',
`mphenolic_colorchange`='$_POST[mphenolic_colorchange]',
`mphenolic_note`='$_POST[mphenolic_note]',
`mcm_printing_colorchange`='$_POST[mcm_printing_colorchange]',
`mcm_printing_staining`='$_POST[mcm_printing_staining]',
`mcm_printing_note`='$_POST[mcm_printing_note]',
`mcm_dye_temp`='$_POST[mcm_dye_temp]',
`mcm_dye_colorchange`='$_POST[mcm_dye_colorchange]',
`mcm_dye_stainingface`='$_POST[mcm_dye_stainingface]',
`mcm_dye_stainingback`='$_POST[mcm_dye_stainingback]',
`mcm_dye_note`='$_POST[mcm_dye_note]',
`mlight_rating1`='$_POST[mlight_rating1]',
`mlight_rating2`='$_POST[mlight_rating2]',
`mlight_note`='$_POST[mlight_note]',
`mlight_pers_colorchange`='$_POST[mlight_pers_colorchange]',
`mlight_pers_note`='$_POST[mlight_pers_note]',
`msaliva_staining`='$_POST[msaliva_staining]',
`msaliva_note`='$_POST[msaliva_note]',
`mbleeding`='$_POST[mbleeding]',
`mbleeding_note`='$_POST[mbleeding_note]',
`mchlorin`='$_POST[mchlorin]',
`mnchlorin1`='$_POST[mnchlorin1]',
`mnchlorin2`='$_POST[mnchlorin2]',
`mchlorin_note`='$_POST[mchlorin_note]',
`mdye_tf_sstaining`='$_POST[mdye_tf_sstaining]',
`mdye_tf_cstaining`='$_POST[mdye_tf_cstaining]',
`mdye_tf_acetate`='$_POST[mdye_tf_acetate]',
`mdye_tf_cotton`='$_POST[mdye_tf_cotton]',
`mdye_tf_nylon`='$_POST[mdye_tf_nylon]',
`mdye_tf_poly`='$_POST[mdye_tf_poly]',
`mdye_tf_acrylic`='$_POST[mdye_tf_acrylic]',
`mdye_tf_wool`='$_POST[mdye_tf_wool]',
`mdye_tf_note`='$_POST[mdye_tf_note]',
`tgl_update`=now()");
		
//$sqlSts=mysqli_query($conlab,"UPDATE tbl_test_qc SET sts_qc='Kain Sudah diTes', sts_laborat='In Progress' WHERE no_counter = '$nocounter'");
		
		echo "<script>swal({
	title: 'Colorfastness save',   
	text: 'Klik Ok untuk input data kembali',
	type: 'success',
	}).then((result) => {
	if (result.value) {
		
		window.location.href='TestingLab-$nocounter'; 
	}
	});</script>";
	}
}else if($_POST['colorfastness_save']=="save"){
	$sqlCLR=mysqli_query($conlab,"INSERT INTO tbl_tq_test SET
	`id_nokk`='$rcek[id]',
	`wash_temp`='$_POST[wash_temp]',
	`wash_colorchange`='$_POST[wash_colorchange]',
	`wash_acetate`='$_POST[wash_acetate]',
	`wash_cotton`='$_POST[wash_cotton]',
	`wash_nylon`='$_POST[wash_nylon]',
	`wash_poly`='$_POST[wash_poly]',
	`wash_acrylic`='$_POST[wash_acrylic]',
	`wash_wool`='$_POST[wash_wool]',
	`wash_staining`='$_POST[wash_staining]',
	`wash_note`='$_POST[wash_note]',
	`water_colorchange`='$_POST[water_colorchange]',
	`water_acetate`='$_POST[water_acetate]',
	`water_cotton`='$_POST[water_cotton]',
	`water_nylon`='$_POST[water_nylon]',
	`water_poly`='$_POST[water_poly]',
	`water_acrylic`='$_POST[water_acrylic]',
	`water_wool`='$_POST[water_wool]',
	`water_staining`='$_POST[water_staining]',
	`water_note`='$_POST[water_note]',
	`acid_colorchange`='$_POST[acid_colorchange]',
	`acid_acetate`='$_POST[acid_acetate]',
	`acid_cotton`='$_POST[acid_cotton]',
	`acid_nylon`='$_POST[acid_nylon]',
	`acid_poly`='$_POST[acid_poly]',
	`acid_acrylic`='$_POST[acid_acrylic]',
	`acid_wool`='$_POST[acid_wool]',
	`acid_staining`='$_POST[acid_staining]',
	`acid_note`='$_POST[acid_note]',
	`alkaline_colorchange`='$_POST[alkaline_colorchange]',
	`alkaline_acetate`='$_POST[alkaline_acetate]',
	`alkaline_cotton`='$_POST[alkaline_cotton]',
	`alkaline_nylon`='$_POST[alkaline_nylon]',
	`alkaline_poly`='$_POST[alkaline_poly]',
	`alkaline_acrylic`='$_POST[alkaline_acrylic]',
	`alkaline_wool`='$_POST[alkaline_wool]',
	`alkaline_staining`='$_POST[alkaline_staining]',
	`alkaline_note`='$_POST[alkaline_note]',
	`crock_len1`='$_POST[crock_len1]',
	`crock_wid1`='$_POST[crock_wid1]',
	`crock_len2`='$_POST[crock_len2]',
	`crock_wid2`='$_POST[crock_wid2]',
	`crock_note`='$_POST[crock_note]',
	`phenolic_colorchange`='$_POST[phenolic_colorchange]',
	`phenolic_note`='$_POST[phenolic_note]',
	`cm_printing_colorchange`='$_POST[cm_printing_colorchange]',
	`cm_printing_staining`='$_POST[cm_printing_staining]',
	`cm_printing_note`='$_POST[cm_printing_note]',
	`cm_dye_temp`='$_POST[cm_dye_temp]',
	`cm_dye_colorchange`='$_POST[cm_dye_colorchange]',
	`cm_dye_stainingface`='$_POST[cm_dye_stainingface]',
	`cm_dye_stainingback`='$_POST[cm_dye_stainingback]',
	`cm_dye_note`='$_POST[cm_dye_note]',
	`light_rating1`='$_POST[light_rating1]',
	`light_rating2`='$_POST[light_rating2]',
	`light_note`='$_POST[light_note]',
	`light_pers_colorchange`='$_POST[light_pers_colorchange]',
	`light_pers_note`='$_POST[light_pers_note]',
	`saliva_staining`='$_POST[saliva_staining]',
	`saliva_note`='$_POST[saliva_note]',
	`bleeding`='$_POST[bleeding]',
	`bleeding_note`='$_POST[bleeding_note]',
	`chlorin`='$_POST[chlorin]',
	`nchlorin1`='$_POST[nchlorin1]',
	`nchlorin2`='$_POST[nchlorin2]',
	`chlorin_note`='$_POST[chlorin_note]',
	`dye_tf_sstaining`='$_POST[dye_tf_sstaining]',
	`dye_tf_cstaining`='$_POST[dye_tf_cstaining]',
	`dye_tf_acetate`='$_POST[dye_tf_acetate]',
	`dye_tf_cotton`='$_POST[dye_tf_cotton]',
	`dye_tf_nylon`='$_POST[dye_tf_nylon]',
	`dye_tf_poly`='$_POST[dye_tf_poly]',
	`dye_tf_acrylic`='$_POST[dye_tf_acrylic]',
	`dye_tf_wool`='$_POST[dye_tf_wool]',
	`dye_tf_note`='$_POST[dye_tf_note]',
	`stat_wf`='$_POST[stat_wf]',
	`stat_wtr`='$_POST[stat_wtr]',
	`stat_pac`='$_POST[stat_pac]',
	`stat_pal`='$_POST[stat_pal]',
	`stat_cr`='$_POST[stat_cr]',
	`stat_py`='$_POST[stat_py]',
	`stat_cmo`='$_POST[stat_cmo]',
	`stat_cm`='$_POST[stat_cm]',
	`stat_lg`='$_POST[stat_lg]',
	`stat_lp`='$_POST[stat_lp]',
	`stat_slv`='$_POST[stat_slv]',
	`stat_bld`='$_POST[stat_bld]',
	`stat_chl`='$_POST[stat_chl]',
	`stat_nchl`='$_POST[stat_nchl]',
	`stat_dye`='$_POST[stat_dye]',
	`tgl_buat`=now(),
	`tgl_update`=now(),
	`sco_acid_original`= '$sco_original',
	`sco_acid_status`= '$_POST[sco_acid_status]',
	`sca_acid_original`= '$sca_acid',
	`sca_acid_status`= '$_POST[sca_acid_status]',
	`sco_alkaline_afterwash` = '$sco_alkaline_afterwash',
	`sco_alkaline_status` = '$_POST[sco_alkaline_status]',
	`sca_alkaline_afterwash` = '$sca_alkaline_afterwash',
	`sca_alkaline_status` = '$_POST[sca_alkaline_status]',
	`sc_note` =  '$_POST[sc_note]'
	");
	
//	$sqlSts=mysqli_query($conlab,"UPDATE tbl_test_qc SET sts_qc='Kain Sudah diTes', sts_laborat='In Progress' WHERE no_counter = '$nocounter'");
	
		if($sqlCLR){
			echo "<script>swal({
		  title: 'Colorfastness Save',   
		  text: 'Klik Ok untuk input data kembali',
		  type: 'success',
		  }).then((result) => {
		  if (result.value) {
			
			 window.location.href='TestingLab-$nocounter'; 
		  }
		});</script>";
			}
}

if($_GET['nocouter']!="" and $cek==0){
	 echo "<script>swal({
  title: 'No Kartu Tidak Ditemukan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'info',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='TestingLab'; 
  }
});</script>";
}
?>
<div id="PosisiKKTQ" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
