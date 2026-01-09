<script>
	
function roundToTwo(num) {    
    return +(Math.round(num + "e+2")  + "e-2");
}
function roundToThree(num) {    
    return +(Math.round(num + "e+3")  + "e-3");
}
	
function hitung_len_stretch(){
	var len=document.forms['form1']['len_stretch'].value;
	var hasil_len;
	    if(len>0){len=document.forms['form1']['len_stretch'].value;}else{ len=0;}
		hasil_len=roundToTwo(((parseFloat(len)-12.5)/12.5)*100).toFixed(2);
        if(len==0){document.forms['form1']['hasil_len_stretch'].value=0;}else{
        document.forms['form1']['hasil_len_stretch'].value=hasil_len;}
}
function hitung_wid_stretch(){
	var wid=document.forms['form1']['wid_stretch'].value;
    var hasil_wid;
		if(wid>0){wid=document.forms['form1']['wid_stretch'].value;}else{ wid=0;}
        hasil_wid=roundToTwo(((parseFloat(wid)-12.5)/12.5)*100).toFixed(2);
        if(wid==0){document.forms['form1']['hasil_wid_stretch'].value=0;}else{
        document.forms['form1']['hasil_wid_stretch'].value=hasil_wid;}
}
function hitung_len15_gr(){
	var len15=document.forms['form1']['len15_gr'].value;
	var hasil_len15_growth;
    var hasil_len15_rec;
	    if(len15>0){len15=document.forms['form1']['len15_gr'].value;}else{ len15=0;}
		hasil_len15_growth=roundToTwo(((parseFloat(len15)-12.5)/12.5)*100).toFixed(2);
        hasil_len15_rec=roundToTwo(((14.4-parseFloat(len15))/(14.4-12.5))*100).toFixed(2);
        if(len15==0){document.forms['form1']['hasil_len15_growth'].value=0;}else{
        document.forms['form1']['hasil_len15_growth'].value=hasil_len15_growth;}
        if(len15==0){document.forms['form1']['hasil_len15_rec'].value=0;}else{
        document.forms['form1']['hasil_len15_rec'].value=hasil_len15_rec;}
}
function hitung_wid30_gr(){
	var wid30=document.forms['form1']['wid30_gr'].value;
	var hasil_wid30_growth;
    var hasil_wid30_rec;
	    if(wid30>0){wid30=document.forms['form1']['wid30_gr'].value;}else{ wid30=0;}
		hasil_wid30_growth=roundToTwo(((parseFloat(wid30)-12.5)/12.5)*100).toFixed(2);
        hasil_wid30_rec=roundToTwo(((16.2-parseFloat(wid30))/(16.2-12.5))*100).toFixed(2);
        if(wid30==0){document.forms['form1']['hasil_wid30_growth'].value=0;}else{
        document.forms['form1']['hasil_wid30_growth'].value=hasil_wid30_growth;}
        if(wid30==0){document.forms['form1']['hasil_wid30_rec'].value=0;}else{
        document.forms['form1']['hasil_wid30_rec'].value=hasil_wid30_rec;}
}
function hitung_len35_gr(){
	var len35=document.forms['form1']['len35_gr'].value;
	var hasil_len35_growth;
    var hasil_len35_rec;
	    if(len35>0){len35=document.forms['form1']['len35_gr'].value;}else{ len35=0;}
		hasil_len35_growth=roundToTwo(((parseFloat(len35)-12.5)/12.5)*100).toFixed(2);
        hasil_len35_rec=roundToTwo(((16.8-parseFloat(len35))/(16.8-12.5))*100).toFixed(2);
        if(len35==0){document.forms['form1']['hasil_len35_growth'].value=0;}else{
        document.forms['form1']['hasil_len35_growth'].value=hasil_len35_growth;}
        if(len35==0){document.forms['form1']['hasil_len35_rec'].value=0;}else{
        document.forms['form1']['hasil_len35_rec'].value=hasil_len35_rec;}
}
function hitung_wid60_gr(){
	var wid60=document.forms['form1']['wid60_gr'].value;
	var hasil_wid60_growth;
    var hasil_wid60_rec;
	    if(wid60>0){wid60=document.forms['form1']['wid60_gr'].value;}else{ wid60=0;}
		hasil_wid60_growth=roundToTwo(((parseFloat(wid60)-12.5)/12.5)*100).toFixed(2);
        hasil_wid60_rec=roundToTwo(((20-parseFloat(wid60))/(20-12.5))*100).toFixed(2);
        if(wid60==0){document.forms['form1']['hasil_wid60_growth'].value=0;}else{
        document.forms['form1']['hasil_wid60_growth'].value=hasil_wid60_growth;}
        if(wid60==0){document.forms['form1']['hasil_wid60_rec'].value=0;}else{
        document.forms['form1']['hasil_wid60_rec'].value=hasil_wid60_rec;}
}
function hitung_rec_lulu(){
	var max_lulu=document.forms['form1']['max_lulu'].value;
    var after1_lulu=document.forms['form1']['after1_lulu'].value;
    var after30_lulu=document.forms['form1']['after30_lulu'].value;
	var hasil_after1_lulu;
    var hasil_after30_lulu;
	    if(max_lulu>0){max_lulu=document.forms['form1']['max_lulu'].value;}else{ max_lulu=0;}
        if(after1_lulu>0){after1_lulu=document.forms['form1']['after1_lulu'].value;}else{ after1_lulu=0;}
        if(after30_lulu>0){after30_lulu=document.forms['form1']['after30_lulu'].value;}else{ after30_lulu=0;}
		hasil_after1_lulu=roundToTwo(((parseFloat(max_lulu)+10-parseFloat(after1_lulu))/parseFloat(max_lulu))*100).toFixed(2);
        hasil_after30_lulu=roundToTwo(((parseFloat(max_lulu)+10-parseFloat(after30_lulu))/parseFloat(max_lulu))*100).toFixed(2);
        if(after1_lulu==0){document.forms['form1']['hasil_after1_lulu'].value=0;}else{
        document.forms['form1']['hasil_after1_lulu'].value=hasil_after1_lulu;}
        if(after30_lulu==0){document.forms['form1']['hasil_after30_lulu'].value=0;}else{
        document.forms['form1']['hasil_after30_lulu'].value=hasil_after30_lulu;}
}
function hitung_rec_ua(){
	var max_ua=document.forms['form1']['max_ua'].value;
    var after1_ua=document.forms['form1']['after1_ua'].value;
	var hasil_after1_ua;
	    if(max_ua>0){max_ua=document.forms['form1']['max_ua'].value;}else{ max_ua=0;}
        if(after1_ua>0){after1_ua=document.forms['form1']['after1_ua'].value;}else{ after1_ua=0;}
		hasil_after1_ua=roundToTwo(((parseFloat(max_ua)+12.7-parseFloat(after1_ua))/parseFloat(max_ua))*100).toFixed(2);
        if(after1_ua==0){document.forms['form1']['hasil_after1_ua'].value=0;}else{
        document.forms['form1']['hasil_after1_ua'].value=hasil_after1_ua;}
}
function hitung_rec_adi(){
	var max_adi=document.forms['form1']['max_adi'].value;
    var after30_adi=document.forms['form1']['after30_adi'].value;
	var hasil_after30_adi;
	    if(max_adi>0){max_adi=document.forms['form1']['max_adi'].value;}else{ max_adi=0;}
        if(after30_adi>0){after30_adi=document.forms['form1']['after30_adi'].value;}else{ after30_adi=0;}
		hasil_after30_adi=roundToTwo(((parseFloat(max_adi)+12.7-parseFloat(after30_adi))/parseFloat(max_adi))*100).toFixed(2);
        if(after30_adi==0){document.forms['form1']['hasil_after30_adi'].value=0;}else{
        document.forms['form1']['hasil_after30_adi'].value=hasil_after30_adi;}
}
function hitung_sw(){
    var m0=document.forms['form1']['m0'].value;
    var jml_air;
    var sw_0=document.forms['form1']['sw_0'].value;
    var sw_5=document.forms['form1']['sw_5'].value;
    var sw_10=document.forms['form1']['sw_10'].value;
    var sw_15=document.forms['form1']['sw_15'].value;
    var sw_20=document.forms['form1']['sw_20'].value;
    var sw_25=document.forms['form1']['sw_25'].value;
    var sw_30=document.forms['form1']['sw_30'].value;
    var sw_35=document.forms['form1']['sw_35'].value;
    var sw_40=document.forms['form1']['sw_40'].value;
    var sw_45=document.forms['form1']['sw_45'].value;
    var sw_50=document.forms['form1']['sw_50'].value;
    var sw_55=document.forms['form1']['sw_55'].value;
    var sw_60=document.forms['form1']['sw_60'].value;
    var evap_0;
    var evap_5;
    var evap_10;
    var evap_15;
    var evap_20;
    var evap_25;
    var evap_30;
    var evap_35;
    var evap_40;
    var evap_45;
    var evap_50;
    var evap_55;
    var evap_60;
    var sisa_air_0;
    var sisa_air_5;
    var sisa_air_10;
    var sisa_air_15;
    var sisa_air_20;
    var sisa_air_25;
    var sisa_air_30;
    var sisa_air_35;
    var sisa_air_40;
    var sisa_air_45;
    var sisa_air_50;
    var sisa_air_55;
    var sisa_air_60;
    if(m0>0){m0=document.forms['form1']['m0'].value;}else{ m0=0;}
    //Jumlah Air
    jml_air=roundToThree(parseFloat(sw_0)-parseFloat(m0)).toFixed(3);
    if(sw_0==0){document.forms['form1']['jml_air'].value=0;}else{
    document.forms['form1']['jml_air'].value=jml_air;}
    //Evap 0
    evap_0= roundToThree(parseFloat(sw_0)-parseFloat(sw_0)).toFixed(3);
    if(sw_0==0){document.forms['form1']['evap_0'].value=0;}else{
    document.forms['form1']['evap_0'].value=evap_0;}
    //Evap 5
    evap_5= roundToThree(parseFloat(sw_0)-parseFloat(sw_5)).toFixed(3);
    if(sw_5==0){document.forms['form1']['evap_5'].value=0;}else{
    document.forms['form1']['evap_5'].value=evap_5;}
    //Evap 10
    evap_10= roundToThree(parseFloat(sw_0)-parseFloat(sw_10)).toFixed(3);
    if(sw_10==0){document.forms['form1']['evap_10'].value=0;}else{
    document.forms['form1']['evap_10'].value=evap_10;}
    //Evap 15
    evap_15= roundToThree(parseFloat(sw_0)-parseFloat(sw_15)).toFixed(3);
    if(sw_15==0){document.forms['form1']['evap_15'].value=0;}else{
    document.forms['form1']['evap_15'].value=evap_15;}
    //Evap 20
    evap_20= roundToThree(parseFloat(sw_0)-parseFloat(sw_20)).toFixed(3);
    if(sw_20==0){document.forms['form1']['evap_20'].value=0;}else{
    document.forms['form1']['evap_20'].value=evap_20;}
    //Evap 25
    evap_25= roundToThree(parseFloat(sw_0)-parseFloat(sw_25)).toFixed(3);
    if(sw_25==0){document.forms['form1']['evap_25'].value=0;}else{
    document.forms['form1']['evap_25'].value=evap_25;}
    //Evap 30
    evap_30= roundToThree(parseFloat(sw_0)-parseFloat(sw_30)).toFixed(3);
    if(sw_30==0){document.forms['form1']['evap_30'].value=0;}else{
    document.forms['form1']['evap_30'].value=evap_30;}
    //Evap 35
    evap_35= roundToThree(parseFloat(sw_0)-parseFloat(sw_35)).toFixed(3);
    if(sw_35==0){document.forms['form1']['evap_35'].value=0;}else{
    document.forms['form1']['evap_35'].value=evap_35;}
    //Evap 40
    evap_40= roundToThree(parseFloat(sw_0)-parseFloat(sw_40)).toFixed(3);
    if(sw_40==0){document.forms['form1']['evap_40'].value=0;}else{
    document.forms['form1']['evap_40'].value=evap_40;}
    //Evap 45
    evap_45= roundToThree(parseFloat(sw_0)-parseFloat(sw_45)).toFixed(3);
    if(sw_45==0){document.forms['form1']['evap_45'].value=0;}else{
    document.forms['form1']['evap_45'].value=evap_45;}
    //Evap 50
    evap_50= roundToThree(parseFloat(sw_0)-parseFloat(sw_50)).toFixed(3);
    if(sw_50==0){document.forms['form1']['evap_50'].value=0;}else{
    document.forms['form1']['evap_50'].value=evap_50;}
    //Evap 55
    evap_55= roundToThree(parseFloat(sw_0)-parseFloat(sw_55)).toFixed(3);
    if(sw_55==0){document.forms['form1']['evap_55'].value=0;}else{
    document.forms['form1']['evap_55'].value=evap_55;}
    //Evap 60
    evap_60= roundToThree(parseFloat(sw_0)-parseFloat(sw_60)).toFixed(3);
    if(sw_60==0){document.forms['form1']['evap_60'].value=0;}else{
    document.forms['form1']['evap_60'].value=evap_60;}
    //% Air 0 Menit
    sisa_air_0= roundToThree(((parseFloat(sw_0)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_0==0){document.forms['form1']['sisa_air_0'].value=0;}else{
    document.forms['form1']['sisa_air_0'].value=sisa_air_0;}
    //% Air 5 Menit
    sisa_air_5= roundToThree(((parseFloat(sw_5)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_5==0){document.forms['form1']['sisa_air_5'].value=0;}else{
    document.forms['form1']['sisa_air_5'].value=sisa_air_5;}
    //% Air 10 Menit
    sisa_air_10= roundToThree(((parseFloat(sw_10)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_10==0){document.forms['form1']['sisa_air_10'].value=0;}else{
    document.forms['form1']['sisa_air_10'].value=sisa_air_10;}
    //% Air 15 Menit
    sisa_air_15= roundToThree(((parseFloat(sw_15)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_15==0){document.forms['form1']['sisa_air_15'].value=0;}else{
    document.forms['form1']['sisa_air_15'].value=sisa_air_15;}
    //% Air 20 Menit
    sisa_air_20= roundToThree(((parseFloat(sw_20)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_20==0){document.forms['form1']['sisa_air_20'].value=0;}else{
    document.forms['form1']['sisa_air_20'].value=sisa_air_20;}
    //% Air 25 Menit
    sisa_air_25= roundToThree(((parseFloat(sw_25)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_25==0){document.forms['form1']['sisa_air_25'].value=0;}else{
    document.forms['form1']['sisa_air_25'].value=sisa_air_25;}
    //% Air 30 Menit
    sisa_air_30= roundToThree(((parseFloat(sw_30)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_30==0){document.forms['form1']['sisa_air_30'].value=0;}else{
    document.forms['form1']['sisa_air_30'].value=sisa_air_30;}
    //% Air 35 Menit
    sisa_air_35= roundToThree(((parseFloat(sw_35)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_35==0){document.forms['form1']['sisa_air_35'].value=0;}else{
    document.forms['form1']['sisa_air_35'].value=sisa_air_35;}
    //% Air 40 Menit
    sisa_air_40= roundToThree(((parseFloat(sw_40)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_40==0){document.forms['form1']['sisa_air_40'].value=0;}else{
    document.forms['form1']['sisa_air_40'].value=sisa_air_40;}
    //% Air 45 Menit
    sisa_air_45= roundToThree(((parseFloat(sw_45)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_45==0){document.forms['form1']['sisa_air_45'].value=0;}else{
    document.forms['form1']['sisa_air_45'].value=sisa_air_45;}
    //% Air 50 Menit
    sisa_air_50= roundToThree(((parseFloat(sw_50)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_50==0){document.forms['form1']['sisa_air_50'].value=0;}else{
    document.forms['form1']['sisa_air_50'].value=sisa_air_50;}
    //% Air 55 Menit
    sisa_air_55= roundToThree(((parseFloat(sw_55)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_55==0){document.forms['form1']['sisa_air_55'].value=0;}else{
    document.forms['form1']['sisa_air_55'].value=sisa_air_55;}
    //% Air 60 Menit
    sisa_air_60= roundToThree(((parseFloat(sw_60)-parseFloat(m0))/parseFloat(jml_air))*100).toFixed(1);
    if(sw_60==0){document.forms['form1']['sisa_air_60'].value=0;}else{
    document.forms['form1']['sisa_air_60'].value=sisa_air_60;}
    //Slope 1
    slope1= roundToThree((parseFloat(evap_15)-parseFloat(evap_0))/(15-0)*60).toFixed(3);
    if(evap_15==0){document.forms['form1']['slope1'].value=0;}else{
    document.forms['form1']['slope1'].value=slope1;}
    //Slope 2
    slope2= roundToThree((parseFloat(evap_20)-parseFloat(evap_5))/(20-5)*60).toFixed(3);
    if(evap_20==0){document.forms['form1']['slope2'].value=0;}else{
    document.forms['form1']['slope2'].value=slope2;}
    //Slope 3
    slope3= roundToThree((parseFloat(evap_25)-parseFloat(evap_10))/(25-10)*60).toFixed(3);
    if(evap_25==0){document.forms['form1']['slope3'].value=0;}else{
    document.forms['form1']['slope3'].value=slope3;}
    //Slope 4
    slope4= roundToThree((parseFloat(evap_30)-parseFloat(evap_15))/(30-15)*60).toFixed(3);
    if(evap_30==0){document.forms['form1']['slope4'].value=0;}else{
    document.forms['form1']['slope4'].value=slope4;}
    //Slope 5
    slope5= roundToThree((parseFloat(evap_35)-parseFloat(evap_20))/(35-20)*60).toFixed(3);
    if(evap_35==0){document.forms['form1']['slope5'].value=0;}else{
    document.forms['form1']['slope5'].value=slope5;}
    //Slope 6
    slope6= roundToThree((parseFloat(evap_40)-parseFloat(evap_25))/(40-25)*60).toFixed(3);
    if(evap_40==0){document.forms['form1']['slope6'].value=0;}else{
    document.forms['form1']['slope6'].value=slope6;}
    //Slope 7
    slope7= roundToThree((parseFloat(evap_45)-parseFloat(evap_30))/(45-30)*60).toFixed(3);
    if(evap_45==0){document.forms['form1']['slope7'].value=0;}else{
    document.forms['form1']['slope7'].value=slope7;}
    //Slope 8
    slope8= roundToThree((parseFloat(evap_50)-parseFloat(evap_35))/(50-35)*60).toFixed(3);
    if(evap_50==0){document.forms['form1']['slope8'].value=0;}else{
    document.forms['form1']['slope8'].value=slope8;}
    //Slope 9
    slope9= roundToThree((parseFloat(evap_55)-parseFloat(evap_40))/(55-40)*60).toFixed(3);
    if(evap_55==0){document.forms['form1']['slope9'].value=0;}else{
    document.forms['form1']['slope9'].value=slope9;}
    //Slope 10
    slope10= roundToThree((parseFloat(evap_60)-parseFloat(evap_45))/(60-45)*60).toFixed(3);
    if(evap_60==0){document.forms['form1']['slope10'].value=0;}else{
    document.forms['form1']['slope10'].value=slope10;}
}
function hitung_dm(){
    var m0=document.forms['form1']['m0'].value;
    var m=document.forms['form1']['m'].value;
    var m1_5=document.forms['form1']['m1_5'].value;
    var m1_10=document.forms['form1']['m1_10'].value;
    var m1_15=document.forms['form1']['m1_15'].value;
    var m1_20=document.forms['form1']['m1_20'].value;
    var m1_25=document.forms['form1']['m1_25'].value;
    var m1_30=document.forms['form1']['m1_30'].value;
    var jml_air;
    var dm_5;
    var dm_10;
    var dm_15;
    var dm_20;
    var dm_25;
    var dm_30;
    var sisa_air_5;
    var sisa_air_10;
    var sisa_air_15;
    var sisa_air_20;
    var sisa_air_25;
    var sisa_air_30;
    var evap_5;
    var evap_10;
    var evap_15;
    var evap_20;
    var evap_25;
    var evap_30;
    var slope_1;
    var slope_2;
    var slope_3;
    var slope_4;
    var slope_5;
    var slope_6;
    var ev;
    if(m0>0){m0=document.forms['form1']['m0'].value;}else{ m0=0;}
    if(m>0){m=document.forms['form1']['m'].value;}else{ m=0;}
    if(m1_5>0){m1_5=document.forms['form1']['m1_5'].value;}else{ m1_5=0;}
    if(m1_10>0){m1_10=document.forms['form1']['m1_10'].value;}else{ m1_10=0;}
    if(m1_15>0){m1_15=document.forms['form1']['m1_15'].value;}else{ m1_15=0;}
    if(m1_20>0){m1_20=document.forms['form1']['m1_20'].value;}else{ m1_20=0;}
    if(m1_25>0){m1_25=document.forms['form1']['m1_25'].value;}else{ m1_25=0;}
    if(m1_30>0){m1_30=document.forms['form1']['m1_30'].value;}else{ m1_30=0;}
    //DM5
    dm_5=roundToThree(parseFloat(m)-parseFloat(m1_5)).toFixed(3);
    if(m1_5==0){document.forms['form1']['dm_5'].value=0;}else{
    document.forms['form1']['dm_5'].value=dm_5;}
    //DM10
    dm_10=roundToThree(parseFloat(m)-parseFloat(m1_10)).toFixed(3);
    if(m1_10==0){document.forms['form1']['dm_10'].value=0;}else{
    document.forms['form1']['dm_10'].value=dm_10;}
    //DM15
    dm_15=roundToThree(parseFloat(m)-parseFloat(m1_15)).toFixed(3);
    if(m1_15==0){document.forms['form1']['dm_15'].value=0;}else{
    document.forms['form1']['dm_15'].value=dm_15;}
    //DM20
    dm_20=roundToThree(parseFloat(m)-parseFloat(m1_20)).toFixed(3);
    if(m1_20==0){document.forms['form1']['dm_20'].value=0;}else{
    document.forms['form1']['dm_20'].value=dm_20;}
    //DM25
    dm_25=roundToThree(parseFloat(m)-parseFloat(m1_25)).toFixed(3);
    if(m1_25==0){document.forms['form1']['dm_25'].value=0;}else{
    document.forms['form1']['dm_25'].value=dm_25;}
    //DM30
    dm_30=roundToThree(parseFloat(m)-parseFloat(m1_30)).toFixed(3);
    if(m1_30==0){document.forms['form1']['dm_30'].value=0;}else{
    document.forms['form1']['dm_30'].value=dm_30;}
    //Button Lihat Grafik
    if(m1_30==0){document.forms['form1']['lihat'].disabled=true;}else{
    document.forms['form1']['lihat'].disabled=false;}
    //Jumlah Air
    jml_air=roundToThree(parseFloat(m)-parseFloat(m0)).toFixed(3);
    if(m==0){document.forms['form1']['jml_air'].value=0;}else{
    document.forms['form1']['jml_air'].value=jml_air;}
    //% Air 5 Menit
    sisa_air_5= roundToThree(((parseFloat(jml_air)-(parseFloat(m)-parseFloat(m1_5)))/parseFloat(jml_air))*100).toFixed(3);
    if(m1_5==0){document.forms['form1']['sisa_air_5'].value=0;}else{
    document.forms['form1']['sisa_air_5'].value=sisa_air_5;}
    //% Air 10 Menit
    sisa_air_10= roundToThree(((parseFloat(jml_air)-(parseFloat(m)-parseFloat(m1_10)))/parseFloat(jml_air))*100).toFixed(3);
    if(m1_10==0){document.forms['form1']['sisa_air_10'].value=0;}else{
    document.forms['form1']['sisa_air_10'].value=sisa_air_10;}
    //% Air 15 Menit
    sisa_air_15= roundToThree(((parseFloat(jml_air)-(parseFloat(m)-parseFloat(m1_15)))/parseFloat(jml_air))*100).toFixed(3);
    if(m1_15==0){document.forms['form1']['sisa_air_15'].value=0;}else{
    document.forms['form1']['sisa_air_15'].value=sisa_air_15;}
    //% Air 20 Menit
    sisa_air_20= roundToThree(((parseFloat(jml_air)-(parseFloat(m)-parseFloat(m1_20)))/parseFloat(jml_air))*100).toFixed(3);
    if(m1_20==0){document.forms['form1']['sisa_air_20'].value=0;}else{
    document.forms['form1']['sisa_air_20'].value=sisa_air_20;}
    //% Air 25 Menit
    sisa_air_25= roundToThree(((parseFloat(jml_air)-(parseFloat(m)-parseFloat(m1_25)))/parseFloat(jml_air))*100).toFixed(3);
    if(m1_25==0){document.forms['form1']['sisa_air_25'].value=0;}else{
    document.forms['form1']['sisa_air_25'].value=sisa_air_25;}
    //% Air 30 Menit
    sisa_air_30= roundToThree(((parseFloat(jml_air)-(parseFloat(m)-parseFloat(m1_30)))/parseFloat(jml_air))*100).toFixed(3);
    if(m1_30==0){document.forms['form1']['sisa_air_30'].value=0;}else{
    document.forms['form1']['sisa_air_30'].value=sisa_air_30;}
    //Evaporasi 5 Menit
    evap_5= roundToThree((parseFloat(dm_5)/parseFloat(m0))*100).toFixed(3);
    if(m1_5==0){document.forms['form1']['evap_5'].value=0;}else{
    document.forms['form1']['evap_5'].value=evap_5;}
    //Evaporasi 10 Menit
    evap_10= roundToThree((parseFloat(dm_10)/parseFloat(m0))*100).toFixed(3);
    if(m1_10==0){document.forms['form1']['evap_10'].value=0;}else{
    document.forms['form1']['evap_10'].value=evap_10;}
    //Evaporasi 15 Menit
    evap_15= roundToThree((parseFloat(dm_15)/parseFloat(m0))*100).toFixed(3);
    if(m1_15==0){document.forms['form1']['evap_15'].value=0;}else{
    document.forms['form1']['evap_15'].value=evap_15;}
    //Evaporasi 20 Menit
    evap_20= roundToThree((parseFloat(dm_20)/parseFloat(m0))*100).toFixed(3);
    if(m1_20==0){document.forms['form1']['evap_20'].value=0;}else{
    document.forms['form1']['evap_20'].value=evap_20;}
    //Evaporasi 25 Menit
    evap_25= roundToThree((parseFloat(dm_25)/parseFloat(m0))*100).toFixed(3);
    if(m1_25==0){document.forms['form1']['evap_25'].value=0;}else{
    document.forms['form1']['evap_25'].value=evap_25;}
    //Evaporasi 30 Menit
    evap_30= roundToThree((parseFloat(dm_30)/parseFloat(m0))*100).toFixed(3);
    if(m1_30==0){document.forms['form1']['evap_30'].value=0;}else{
    document.forms['form1']['evap_30'].value=evap_30;}
    //Slope 1
    slope_1= roundToTwo((parseFloat(evap_5)-0)/(0.08-0)).toFixed(2);
    if(m1_5==0){document.forms['form1']['slope_1'].value=0;}else{
    document.forms['form1']['slope_1'].value=slope_1;}
    //Slope 2
    slope_2= roundToTwo((parseFloat(evap_10)-parseFloat(evap_5))/(0.17-0.08)).toFixed(2);
    if(m1_10==0){document.forms['form1']['slope_2'].value=0;}else{
    document.forms['form1']['slope_2'].value=slope_2;}
    //Slope 3
    slope_3= roundToTwo((parseFloat(evap_15)-parseFloat(evap_10))/(0.25-0.17)).toFixed(2);
    if(m1_15==0){document.forms['form1']['slope_3'].value=0;}else{
    document.forms['form1']['slope_3'].value=slope_3;}
    //Slope 4
    slope_4= roundToTwo((parseFloat(evap_20)-parseFloat(evap_15))/(0.33-0.25)).toFixed(2);
    if(m1_20==0){document.forms['form1']['slope_4'].value=0;}else{
    document.forms['form1']['slope_4'].value=slope_4;}
    //Slope 5
    slope_5= roundToTwo((parseFloat(evap_25)-parseFloat(evap_20))/(0.42-0.33)).toFixed(2);
    if(m1_25==0){document.forms['form1']['slope_5'].value=0;}else{
    document.forms['form1']['slope_5'].value=slope_5;}
    //Slope 6
    slope_6= roundToTwo((parseFloat(evap_30)-parseFloat(evap_25))/(0.50-0.42)).toFixed(2);
    if(m1_30==0){document.forms['form1']['slope_6'].value=0;}else{
    document.forms['form1']['slope_6'].value=slope_6;}
    //eV
    ev=roundToTwo((parseFloat(slope_1)+parseFloat(slope_2)+parseFloat(slope_3)+parseFloat(slope_4)+parseFloat(slope_5)+parseFloat(slope_6))/6).toFixed(2);
    if(m1_30==0){document.forms['form1']['rata_slope'].value=0;}else{
    document.forms['form1']['rata_slope'].value=ev;}
}
function hitung_fiber_cs(){
    var berat_asal_cs=document.forms['form1']['berat_asal_cs'].value;
    var berat_cotton_cs=document.forms['form1']['berat_cotton_cs'].value;
    var cotton_cs;
    var spandex_cs;
    var total_cs;
    var a;
    var b;
    if(berat_asal_cs>0){berat_asal_cs=document.forms['form1']['berat_asal_cs'].value;}else{ berat_asal_cs=0;}
    if(berat_cotton_cs>0){berat_cotton_cs=document.forms['form1']['berat_cotton_cs'].value;}else{ berat_cotton_cs=0;}
    a=roundToTwo((parseFloat(berat_cotton_cs)/parseFloat(berat_asal_cs))*100*1.085).toFixed(2);
    b=roundToTwo(((parseFloat(berat_asal_cs)-parseFloat(berat_cotton_cs))/parseFloat(berat_asal_cs))*100*1.015).toFixed(2);
    //% Cotton 
    cotton_cs=roundToTwo((parseFloat(a)/(parseFloat(a)+parseFloat(b)))*100).toFixed(2);
    if(berat_cotton_cs==0){document.forms['form1']['cotton_cs'].value=0;}else{
    document.forms['form1']['cotton_cs'].value=cotton_cs;}
    //% Spandex 
    spandex_cs=roundToTwo((parseFloat(b)/(parseFloat(a)+parseFloat(b)))*100).toFixed(2);
    if(berat_cotton_cs==0){document.forms['form1']['spandex_cs'].value=0;}else{
    document.forms['form1']['spandex_cs'].value=spandex_cs;}
    // % Total
    total_cs=roundToTwo(parseFloat(cotton_cs)+parseFloat(spandex_cs)).toFixed(2);
    if(berat_cotton_cs==0){document.forms['form1']['total_cs'].value=0;}else{
    document.forms['form1']['total_cs'].value=total_cs;}
}
function hitung_fiber_ps(){
    var berat_asal_ps=document.forms['form1']['berat_asal_ps'].value;
    var berat_poly_ps=document.forms['form1']['berat_poly_ps'].value;
    var poly_ps;
    var spandex_ps;
    var total_ps;
    var a;
    var b;
    if(berat_asal_ps>0){berat_asal_ps=document.forms['form1']['berat_asal_ps'].value;}else{ berat_asal_ps=0;}
    if(berat_poly_ps>0){berat_poly_ps=document.forms['form1']['berat_poly_ps'].value;}else{ berat_poly_ps=0;}
    a=roundToTwo((parseFloat(berat_poly_ps)/parseFloat(berat_asal_ps))*100*1.015).toFixed(2);
    b=roundToTwo(((parseFloat(berat_asal_ps)-parseFloat(berat_poly_ps))/parseFloat(berat_asal_ps))*100*1.015).toFixed(2);
    //% Poly 
    poly_ps=roundToTwo((parseFloat(a)/(parseFloat(a)+parseFloat(b)))*100).toFixed(2);
    if(berat_poly_ps==0){document.forms['form1']['poly_ps'].value=0;}else{
    document.forms['form1']['poly_ps'].value=poly_ps;}
    //% Spandex 
    spandex_ps=roundToTwo((parseFloat(b)/(parseFloat(a)+parseFloat(b)))*100).toFixed(2);
    if(berat_poly_ps==0){document.forms['form1']['spandex_ps'].value=0;}else{
    document.forms['form1']['spandex_ps'].value=spandex_ps;}
    // % Total
    total_ps=roundToTwo(parseFloat(poly_ps)+parseFloat(spandex_ps)).toFixed(2);
    if(berat_poly_ps==0){document.forms['form1']['total_ps'].value=0;}else{
    document.forms['form1']['total_ps'].value=total_ps;}
}
function hitung_fiber_ns(){
    var berat_asal_ns=document.forms['form1']['berat_asal_ns'].value;
    var berat_nylon_ns=document.forms['form1']['berat_nylon_ns'].value;
    var nylon_ns;
    var spandex_ns;
    var total_ns;
    var a;
    var b;
    if(berat_asal_ns>0){berat_asal_ns=document.forms['form1']['berat_asal_ns'].value;}else{ berat_asal_ns=0;}
    if(berat_nylon_ns>0){berat_nylon_ns=document.forms['form1']['berat_nylon_ns'].value;}else{ berat_nylon_ns=0;}
    a=roundToTwo((parseFloat(berat_nylon_ns)/parseFloat(berat_asal_ns))*100*1.045).toFixed(2);
    b=roundToTwo(((parseFloat(berat_asal_ns)-parseFloat(berat_nylon_ns))/parseFloat(berat_asal_ns))*100*1.015).toFixed(2);
    //% Nylon 
    nylon_ns=roundToTwo((parseFloat(a)/(parseFloat(a)+parseFloat(b)))*100).toFixed(2);
    if(berat_nylon_ns==0){document.forms['form1']['nylon_ns'].value=0;}else{
    document.forms['form1']['nylon_ns'].value=nylon_ns;}
    //% Spandex 
    spandex_ns=roundToTwo((parseFloat(b)/(parseFloat(a)+parseFloat(b)))*100).toFixed(2);
    if(berat_nylon_ns==0){document.forms['form1']['spandex_ns'].value=0;}else{
    document.forms['form1']['spandex_ns'].value=spandex_ns;}
    // % Total
    total_ns=roundToTwo(parseFloat(nylon_ns)+parseFloat(spandex_ns)).toFixed(2);
    if(berat_nylon_ns==0){document.forms['form1']['total_ns'].value=0;}else{
    document.forms['form1']['total_ns'].value=total_ns;}
}
function hitung_fiber_cp(){
    var berat_asal_cp=document.forms['form1']['berat_asal_cp'].value;
    var berat_cotpol_cp=document.forms['form1']['berat_cotpol_cp'].value;
    var cotton_cp;
    var poly_cp;
    var total_cp;
    var a;
    var b;
    if(berat_asal_cp>0){berat_asal_cp=document.forms['form1']['berat_asal_cp'].value;}else{ berat_asal_cp=0;}
    if(berat_cotpol_cp>0){berat_cotpol_cp=document.forms['form1']['berat_cotpol_cp'].value;}else{ berat_cotpol_cp=0;}
    a=roundToTwo((parseFloat(berat_cotpol_cp)/parseFloat(berat_asal_cp))*100*1.015).toFixed(2);
    b=roundToTwo(((parseFloat(berat_asal_cp)-parseFloat(berat_cotpol_cp))/parseFloat(berat_asal_cp))*100*1.085).toFixed(2);
    //% Cotton 
    cotton_cp=roundToTwo((parseFloat(b)/(parseFloat(b)+parseFloat(a)))*100).toFixed(2);
    if(berat_cotpol_cp==0){document.forms['form1']['cotton_cp'].value=0;}else{
    document.forms['form1']['cotton_cp'].value=cotton_cp;}
    //% Poly 
    poly_cp=roundToTwo((parseFloat(a)/(parseFloat(a)+parseFloat(b)))*100).toFixed(2);
    if(berat_cotpol_cp==0){document.forms['form1']['poly_cp'].value=0;}else{
    document.forms['form1']['poly_cp'].value=poly_cp;}
    // % Total
    total_cp=roundToTwo(parseFloat(cotton_cp)+parseFloat(poly_cp)).toFixed(2);
    if(berat_cotpol_cp==0){document.forms['form1']['total_cp'].value=0;}else{
    document.forms['form1']['total_cp'].value=total_cp;}
}
function hitung_fiber_cps(){
    var berat_asal_cps=document.forms['form1']['berat_asal_cps'].value;
    var berat_cotpol_cps=document.forms['form1']['berat_cotpol_cps'].value;
    var berat_poly_cps=document.forms['form1']['berat_poly_cps'].value;
    var cotton_cps;
    var poly_cps;
    var spandex_cps;
    var total_cps;
    var a;
    var b;
    var c;
    if(berat_asal_cps>0){berat_asal_cps=document.forms['form1']['berat_asal_cps'].value;}else{ berat_asal_cps=0;}
    if(berat_cotpol_cps>0){berat_cotpol_cps=document.forms['form1']['berat_cotpol_cps'].value;}else{ berat_cotpol_cps=0;}
    if(berat_poly_cps>0){berat_poly_cps=document.forms['form1']['berat_poly_cps'].value;}else{ berat_poly_cps=0;}
    a=roundToTwo(((parseFloat(berat_asal_cps)-parseFloat(berat_cotpol_cps))/parseFloat(berat_asal_cps))*100*1.015).toFixed(2);
    b=roundToTwo(((parseFloat(berat_cotpol_cps)-parseFloat(berat_poly_cps))/parseFloat(berat_asal_cps))*100*1.085).toFixed(2);
    c=roundToTwo((parseFloat(berat_poly_cps)/parseFloat(berat_asal_cps))*100*1.015).toFixed(2);
    //% Spandex 
    spandex_cps=roundToTwo((parseFloat(a)/(parseFloat(a)+parseFloat(b)+parseFloat(c)))*100).toFixed(2);
    if(berat_poly_cps==0){document.forms['form1']['spandex_cps'].value=0;}else{
    document.forms['form1']['spandex_cps'].value=spandex_cps;}
    //% Cotton 
    cotton_cps=roundToTwo((parseFloat(b)/(parseFloat(a)+parseFloat(b)+parseFloat(c)))*100).toFixed(2);
    if(berat_poly_cps==0){document.forms['form1']['cotton_cps'].value=0;}else{
    document.forms['form1']['cotton_cps'].value=cotton_cps;}
    //% Poly 
    poly_cps=roundToTwo((parseFloat(c)/(parseFloat(a)+parseFloat(b)+parseFloat(c)))*100).toFixed(2);
    if(berat_poly_cps==0){document.forms['form1']['poly_cps'].value=0;}else{
    document.forms['form1']['poly_cps'].value=poly_cps;}
    // % Total
    total_cps=roundToTwo(parseFloat(cotton_cps)+parseFloat(poly_cps)+parseFloat(spandex_cps)).toFixed(2);
    if(berat_poly_cps==0){document.forms['form1']['total_cps'].value=0;}else{
    document.forms['form1']['total_cps'].value=total_cps;}
}
function hitung_fwe(){
	var fwe_n=document.forms['form1']['fwe_n'].value;
    var fwe_d=document.forms['form1']['fwe_d'].value;
    var fwe_g=document.forms['form1']['fwe_g'].value;
	var hasil_a;
	    if(fwe_n>0){fwe_n=document.forms['form1']['fwe_n'].value;}else{ fwe_n=0;}
        if(fwe_d>0){fwe_d=document.forms['form1']['fwe_d'].value;}else{ fwe_d=0;}
		hasil_a=roundToTwo(parseFloat(fwe_n)*3.14*((parseFloat(fwe_d)/2)**2)).toFixed(0);
        if(fwe_d==0){document.forms['form1']['hasil_a'].value=0;}else{
        document.forms['form1']['hasil_a'].value=hasil_a;}
    var hasil_akhir;
        if(fwe_g>0){fwe_g=document.forms['form1']['fwe_g'].value;}else{ fwe_g=0;}
        hasil_akhir=roundToTwo((1000000*parseFloat(fwe_g))/parseFloat(hasil_a)).toFixed(0);
        hasil_akhir2=roundToTwo(parseFloat(hasil_akhir)/33.906).toFixed(2);
        if(fwe_g==0){document.forms['form1']['hasil_akhir'].value=0;}else{
        document.forms['form1']['hasil_akhir'].value=hasil_akhir;}
        if(hasil_akhir==0){document.forms['form1']['hasil_akhir2'].value=0;}else{
        document.forms['form1']['hasil_akhir2'].value=hasil_akhir2;}
    
}
function hitung_fd(){
    var fd_x=document.forms['form1']['fd_x'].value;
    var fd_y=document.forms['form1']['fd_y'].value;
    var hasil_b;
        if(fd_x>0){fd_x=document.forms['form1']['fd_x'].value;}else{ fd_x=0;}
        if(fd_y>0){fd_y=document.forms['form1']['fd_y'].value;}else{ fd_y=0;}
        hasil_b=roundToTwo(((parseFloat(fd_x)-parseFloat(fd_y))/parseFloat(fd_x))*100).toFixed(0);
        if(fd_y==0){document.forms['form1']['hasil_b'].value=0;}else{
        document.forms['form1']['hasil_b'].value=hasil_b;}
}
</script>
<script>
	function tampil(){
        if(document.forms['form1']['jenis_rumus'].value=="STRETCH, GROWTH AND RECOVERY ASTM D2594"){
            $("#stretch").css("display", "");  // To unhide
            $("#growth").css("display", "");  // To unhide
        }else{
            $("#stretch").css("display", "none");  // To hide
            $("#growth").css("display", "none");  // To hide
        }
        if(document.forms['form1']['jenis_rumus'].value=="RECOVERY ASTM D4964 (LULULEMON)"){
            $("#reclulu").css("display", "");  // To unhide
        }else{
            $("#reclulu").css("display", "none");  // To hide
        }
        if(document.forms['form1']['jenis_rumus'].value=="RECOVERY ASTM D4964 (UNDER ARMOUR)"){
            $("#recua").css("display", "");  // To unhide
        }else{
            $("#recua").css("display", "none");  // To hide
        }
        if(document.forms['form1']['jenis_rumus'].value=="RECOVERY ASTM D4964 (ADIDAS)"){
            $("#recadi").css("display", "");  // To unhide
        }else{
            $("#recadi").css("display", "none");  // To hide
        }
        if(document.forms['form1']['jenis_rumus'].value=="EVAPORATION RATE"){
            $("#evaprate").css("display", "");  // To unhide
            $("#evaprategrafik").css("display", "");  // To unhide
        }else{
            $("#evaprate").css("display", "none");  // To hide
            $("#evaprategrafik").css("display", "none");  // To hide
        }
        if(document.forms['form1']['jenis_rumus'].value=="FIBER CONTENT"){
            $("#fiber").css("display", "");  // To unhide
            $("#fiber1").css("display", "");  // To unhide
            $("#fiber2").css("display", "");  // To unhide
            $("#fiber3").css("display", "");  // To unhide
            $("#fiber4").css("display", "");  // To unhide
            $("#fiber5").css("display", "");  // To unhide
        }else{
            $("#fiber").css("display", "none");  // To hide
            $("#fiber1").css("display", "none");  // To hide
            $("#fiber2").css("display", "none");  // To hide
            $("#fiber3").css("display", "none");  // To hide
            $("#fiber4").css("display", "none");  // To hide
            $("#fiber5").css("display", "none");  // To hide
        }
        if(document.forms['form1']['jenis_rumus'].value=="FABRIC WEIGHT"){
            $("#fwe").css("display", "");  // To unhide
        }else{
            $("#fwe").css("display", "none");  // To hide
        }
        if(document.forms['form1']['jenis_rumus'].value=="FORCE DECAY"){
            $("#fdrumus").css("display", "");  // To unhide
            $("#fdket").css("display", "");  // To unhide
            $("#fdket2").css("display", "");  // To unhide
            $("#fd").css("display", "");  // To unhide
        }else{
            $("#fdrumus").css("display", "none");  // To hide
            $("#fdket").css("display", "none");  // To hide
            $("#fdket2").css("display", "none");  // To hide
            $("#fd").css("display", "none");  // To hide
        }
    }
</script>
<?php
$m0		            = isset($_POST['m0']) ? $_POST['m0'] : '';
$sw_0		        = isset($_POST['sw_0']) ? $_POST['sw_0'] : '';
$sw_5		        = isset($_POST['sw_5']) ? $_POST['sw_5'] : '';
$sw_10		        = isset($_POST['sw_10']) ? $_POST['sw_10'] : '';
$sw_15		        = isset($_POST['sw_15']) ? $_POST['sw_15'] : '';
$sw_20		        = isset($_POST['sw_20']) ? $_POST['sw_20'] : '';
$sw_25		        = isset($_POST['sw_25']) ? $_POST['sw_25'] : '';
$sw_30		        = isset($_POST['sw_30']) ? $_POST['sw_30'] : '';
$sw_35		        = isset($_POST['sw_35']) ? $_POST['sw_35'] : '';
$sw_40		        = isset($_POST['sw_40']) ? $_POST['sw_40'] : '';
$sw_45		        = isset($_POST['sw_45']) ? $_POST['sw_45'] : '';
$sw_50		        = isset($_POST['sw_50']) ? $_POST['sw_50'] : '';
$sw_55		        = isset($_POST['sw_55']) ? $_POST['sw_55'] : '';
$sw_60		        = isset($_POST['sw_60']) ? $_POST['sw_60'] : '';
$jml_air		    = isset($_POST['jml_air']) ? $_POST['jml_air'] : '';
$Evap_0		        = isset($_POST['evap_0']) ? $_POST['evap_0'] : '';
$Evap_5		        = isset($_POST['evap_5']) ? $_POST['evap_5'] : '';
$Evap_10		    = isset($_POST['evap_10']) ? $_POST['evap_10'] : '';
$Evap_15		    = isset($_POST['evap_15']) ? $_POST['evap_15'] : '';
$Evap_20		    = isset($_POST['evap_20']) ? $_POST['evap_20'] : '';
$Evap_25		    = isset($_POST['evap_25']) ? $_POST['evap_25'] : '';
$Evap_30		    = isset($_POST['evap_30']) ? $_POST['evap_30'] : '';
$Evap_35		    = isset($_POST['evap_35']) ? $_POST['evap_35'] : '';
$Evap_40		    = isset($_POST['evap_40']) ? $_POST['evap_40'] : '';
$Evap_45		    = isset($_POST['evap_45']) ? $_POST['evap_45'] : '';
$Evap_50		    = isset($_POST['evap_50']) ? $_POST['evap_50'] : '';
$Evap_55		    = isset($_POST['evap_55']) ? $_POST['evap_55'] : '';
$Evap_60		    = isset($_POST['evap_60']) ? $_POST['evap_60'] : '';
$sisa_air_0		    = isset($_POST['sisa_air_0']) ? $_POST['sisa_air_0'] : '';
$sisa_air_5		    = isset($_POST['sisa_air_5']) ? $_POST['sisa_air_5'] : '';
$sisa_air_10		    = isset($_POST['sisa_air_10']) ? $_POST['sisa_air_10'] : '';
$sisa_air_15		    = isset($_POST['sisa_air_15']) ? $_POST['sisa_air_15'] : '';
$sisa_air_20		    = isset($_POST['sisa_air_20']) ? $_POST['sisa_air_20'] : '';
$sisa_air_25		    = isset($_POST['sisa_air_25']) ? $_POST['sisa_air_25'] : '';
$sisa_air_30		    = isset($_POST['sisa_air_30']) ? $_POST['sisa_air_30'] : '';
$sisa_air_35		    = isset($_POST['sisa_air_35']) ? $_POST['sisa_air_35'] : '';
$sisa_air_40		    = isset($_POST['sisa_air_40']) ? $_POST['sisa_air_40'] : '';
$sisa_air_45		    = isset($_POST['sisa_air_45']) ? $_POST['sisa_air_45'] : '';
$sisa_air_50		    = isset($_POST['sisa_air_50']) ? $_POST['sisa_air_50'] : '';
$sisa_air_55		    = isset($_POST['sisa_air_55']) ? $_POST['sisa_air_55'] : '';
$sisa_air_60		    = isset($_POST['sisa_air_60']) ? $_POST['sisa_air_60'] : '';
$slope1		        = isset($_POST['slope1']) ? $_POST['slope1'] : '';
$slope2		        = isset($_POST['slope2']) ? $_POST['slope2'] : '';
$slope3		        = isset($_POST['slope3']) ? $_POST['slope3'] : '';
$slope4		        = isset($_POST['slope4']) ? $_POST['slope4'] : '';
$slope5		        = isset($_POST['slope5']) ? $_POST['slope5'] : '';
$slope6		        = isset($_POST['slope6']) ? $_POST['slope6'] : '';
$slope7		        = isset($_POST['slope7']) ? $_POST['slope7'] : '';
$slope8		        = isset($_POST['slope8']) ? $_POST['slope8'] : '';
$slope9		        = isset($_POST['slope9']) ? $_POST['slope9'] : '';
$slope10		        = isset($_POST['slope10']) ? $_POST['slope10'] : '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rumus Hitung</title>
    <script src="plugins/highcharts/code/highcharts.js"></script>
    <script src="plugins/highcharts/code/highcharts-3d.js"></script>
	<script src="plugins/highcharts/code/modules/exporting.js"></script>
    <script src="plugins/highcharts/code/modules/export-data.js"></script>
	<style type="text/css">
#container {
    height: 400px; 
    min-width: 310px; 
    max-width: 800px;
    margin: 0 auto;
}
	</style>
  </head>
  <body>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div class="box box-success" style="width: 98%;">
        <div class="box-header with-border">
            <h3 class="box-title">Rumus Hitung</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body"> 
	        <div class="col-md-10">
                <div class="form-group">
					<label for="rumus_hitung" class="col-sm-3 control-label">JENIS RUMUS</label>
					<div class="col-sm-4">
						<select name="jenis_rumus" class="form-control select2" id="jenis_rumus" onChange="tampil();" style="width: 100%;">
                            <option selected="selected" value="">Pilih</option>
							<option value="STRETCH, GROWTH AND RECOVERY ASTM D2594">STRETCH, GROWTH AND RECOVERY ASTM D2594</option>
                            <option value="RECOVERY ASTM D4964 (LULULEMON)">RECOVERY ASTM D4964 (LULULEMON)</option>
                            <option value="RECOVERY ASTM D4964 (UNDER ARMOUR)">RECOVERY ASTM D4964 (UNDER ARMOUR)</option>
                            <option value="RECOVERY ASTM D4964 (ADIDAS)">RECOVERY ASTM D4964 (ADIDAS)</option>
                            <option value="EVAPORATION RATE">EVAPORATION RATE</option>
                            <option value="FIBER CONTENT">FIBER CONTENT</option>
                            <option value="FABRIC WEIGHT">FABRIC WEIGHT</option>
                            <option value="FORCE DECAY">FORCE DECAY</option>
						</select>
					</div>
				</div>
                <!-- STRETCH BEGIN-->	
				<div class="form-group" id="stretch" style="display:none;">
					<label for="stretch" class="col-sm-3 control-label">STRETCH ASTM D2594</label>
					<div class="col-sm-3">
						<input name="len_stretch" type="text" class="form-control" id="len_stretch" value="" placeholder="After Test (CM) Length" onChange="hitung_len_stretch();" onBlur="hitung_len_stretch();" style="text-align: right;"> 
                        <input name="wid_stretch" type="text" class="form-control" id="wid_stretch" value="" placeholder="After Test (CM) Width" onChange="hitung_wid_stretch();" onBlur="hitung_wid_stretch();" style="text-align: right;">
					</div>
					<div class="col-sm-2">
                        <input name="hasil_len_stretch" class="form-control" id="hasil_len_stretch" value="0" placeholder="Length" style="text-align: right;">
                        <input name="hasil_wid_stretch" class="form-control" id="hasil_wid_stretch" value="0" placeholder="Width" style="text-align: right;">
					</div>
				</div>
                <!-- STRETCH END-->
                <!-- GROWTH AND RECOVERY BEGIN-->	
				<div class="form-group" id="growth" style="display:none;">
					<label for="growth" class="col-sm-3 control-label">GROWTH AND RECOVERY ASTM D2594</label>
					<div class="col-sm-3">
						<input name="len15_gr" type="text" class="form-control" id="len15_gr" value="" placeholder="After Test (CM) Length 15%" onChange="hitung_len15_gr();" onBlur="hitung_len15_gr();" style="text-align: right;"> 
                        <input name="wid30_gr" type="text" class="form-control" id="wid30_gr" value="" placeholder="After Test (CM) Width 30%" onChange="hitung_wid30_gr();" onBlur="hitung_wid30_gr();" style="text-align: right;">
                        <input name="len35_gr" type="text" class="form-control" id="len35_gr" value="" placeholder="After Test (CM) Length 35%" onChange="hitung_len35_gr();" onBlur="hitung_len35_gr();" style="text-align: right;"> 
                        <input name="wid60_gr" type="text" class="form-control" id="wid60_gr" value="" placeholder="After Test (CM) Width 60%" onChange="hitung_wid60_gr();" onBlur="hitung_wid60_gr();" style="text-align: right;">
					</div>
                    <label for="growth" class="col-sm-1 control-label">GROWTH</label>
					<div class="col-sm-2">
                        <input name="hasil_len15_growth" class="form-control" id="hasil_len15_growth" value="0" placeholder="Length 15%" style="text-align: right;">
                        <input name="hasil_wid30_growth" class="form-control" id="hasil_wid30_growth" value="0" placeholder="Width 30%" style="text-align: right;">
                        <input name="hasil_len35_growth" class="form-control" id="hasil_len65_growth" value="0" placeholder="Length 35%" style="text-align: right;">
                        <input name="hasil_wid60_growth" class="form-control" id="hasil_wid60_growth" value="0" placeholder="Width 60%" style="text-align: right;">
					</div>
                    <label for="rec" class="col-sm-1 control-label">RECOVERY</label>
                    <div class="col-sm-2">
                        <input name="hasil_len15_rec" class="form-control" id="hasil_len15_rec" value="0" placeholder="Length 15%" style="text-align: right;">
                        <input name="hasil_wid30_rec" class="form-control" id="hasil_wid30_rec" value="0" placeholder="Width 30%" style="text-align: right;">
                        <input name="hasil_len35_rec" class="form-control" id="hasil_len35_rec" value="0" placeholder="Length 35%" style="text-align: right;">
                        <input name="hasil_wid60_rec" class="form-control" id="hasil_wid60_rec" value="0" placeholder="Width 60%" style="text-align: right;">
					</div>
				</div>
                <!-- GROWTH AND RECOVERY END-->
                <!-- RECOVERY LULULELOM BEGIN-->	
				<div class="form-group" id="reclulu" style="display:none;">
					<label for="reclulu" class="col-sm-3 control-label">RECOVERY ASTM D4964 (LULULEMON)</label>
					<div class="col-sm-3">
						<input name="max_lulu" type="text" class="form-control" id="max_lulu" value="" placeholder="Max E (CM)" onChange="hitung_rec_lulu();" onBlur="hitung_rec_lulu();" style="text-align: right;"> 
					</div>
                    <div class="col-sm-3">
                        <input name="after1_lulu" type="text" class="form-control" id="after1_lulu" value="" placeholder="After Test 1' (CM)" onChange="hitung_rec_lulu();" onBlur="hitung_rec_lulu();" style="text-align: right;"> 
                        <input name="after30_lulu" type="text" class="form-control" id="after30_lulu" value="" placeholder="After Test 30' (CM)" onChange="hitung_rec_lulu();" onBlur="hitung_rec_lulu();" style="text-align: right;">
					</div>
					<div class="col-sm-2">
                        <input name="hasil_after1_lulu" class="form-control" id="hasil_after1_lulu" value="0" placeholder="" style="text-align: right;">
                        <input name="hasil_after30_lulu" class="form-control" id="hasil_after30_lulu" value="0" placeholder="" style="text-align: right;">
					</div>
				</div>
                <!-- RECOVERY LULULELOM END-->
                <!-- RECOVERY UA BEGIN-->	
				<div class="form-group" id="recua" style="display:none;">
					<label for="recua" class="col-sm-3 control-label">RECOVERY ASTM D4964 (UNDER ARMOUR)</label>
					<div class="col-sm-3">
						<input name="max_ua" type="text" class="form-control" id="max_ua" value="" placeholder="Max E (CM)" onChange="hitung_rec_ua();" onBlur="hitung_rec_ua();" style="text-align: right;">
                        <input name="after1_ua" type="text" class="form-control" id="after1_ua" value="" placeholder="After Test 1' (CM)" onChange="hitung_rec_ua();" onBlur="hitung_rec_ua();" style="text-align: right;">  
					</div>
					<div class="col-sm-2">
                        <input name="hasil_after1_ua" class="form-control" id="hasil_after1_ua" value="0" placeholder="" style="text-align: right;">
					</div>
				</div>
                <!-- RECOVERY UA END-->
                <!-- RECOVERY UA BEGIN-->	
				<div class="form-group" id="recadi" style="display:none;">
					<label for="recadi" class="col-sm-3 control-label">RECOVERY ASTM D4964 (ADIDAS)</label>
					<div class="col-sm-3">
						<input name="max_adi" type="text" class="form-control" id="max_adi" value="" placeholder="Max E (CM)" onChange="hitung_rec_adi();" onBlur="hitung_rec_adi();" style="text-align: right;">
                        <input name="after30_adi" type="text" class="form-control" id="after30_adi" value="" placeholder="After Test 30' (CM)" onChange="hitung_rec_adi();" onBlur="hitung_rec_adi();" style="text-align: right;">  
					</div>
					<div class="col-sm-2">
                        <input name="hasil_after30_adi" class="form-control" id="hasil_after30_adi" value="0" placeholder="" style="text-align: right;">
					</div>
				</div>
                <!-- RECOVERY UA END-->
                <!-- EVAPORATION RATE BEGIN-->	
				<div class="form-group" id="evaprate" style="display:none;">
                    <label for="evaprate" class="col-sm-2 control-label">EVAPORATION RATE</label>
                        <table class="table table-bordered table-hover table-striped" width="100%">
                            <thead class="bg-maroon">
                                <tr>
                                    <th width="8%" colspan="2"><div align="center">Original Sample Weight (g)</div></th>
                                    <th width="8%" colspan="2"><div align="center"><input name="m0" id="m0" class="form-control" type="text" placeholder="M0" value="<?php if($m0!=''){echo $m0;}?>" onChange="hitung_dm();" onBlur="hitung_dm();"/></div></th>
                                </tr>
                                <tr>
                                    <th width="8%" colspan="2"><div align="center">Water Applied (g)</div></th>
                                    <th width="8%" colspan="2"><div align="center"><input name="jml_air" type="text" id="jml_air" class="form-control" value="<?php if($jml_air!=''){echo $jml_air;}?>" placeholder="" readonly style="text-align: left;"></div></th>
                                </tr>
                                <tr>
                                    <th width="10%"><div align="center">Testing Time (min)</div></th>
                                    <th width="10%"><div align="center">Sample Weight (g)</div></th>
                                    <th width="10%"><div align="center">Evaporation (g)</div></th>
                                    <th width="10%"><div align="center">Water Remain (%)</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">0</td>
                                    <td align="center"><input name="sw_0" type="text" id="sw_0" class="form-control" value="<?php if($sw_0!=''){echo $sw_0;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_0" type="text" class="form-control" id="evap_0" value="<?php if($Evap_0!=''){echo $Evap_0;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_0" type="text"  class="form-control" id="sisa_air_0" value="<?php if($sisa_air_0!=''){echo $sisa_air_0;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                                <tr>
                                    <td align="center">5</td>
                                    <td align="center"><input name="sw_5" type="text" id="sw_5" class="form-control" value="<?php if($sw_5!=''){echo $sw_5;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_5" type="text" class="form-control" id="evap_5" value="<?php if($Evap_5!=''){echo $Evap_5;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_5" type="text"  class="form-control" id="sisa_air_5" value="<?php if($sisa_air_5!=''){echo $sisa_air_5;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                                <tr>
                                    <td align="center">10</td>
                                    <td align="center"><input name="sw_10" type="text" id="sw_10" class="form-control" value="<?php if($sw_10!=''){echo $sw_10;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_10" type="text" class="form-control" id="evap_10" value="<?php if($Evap_10!=''){echo $Evap_10;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_10" type="text"  class="form-control" id="sisa_air_10" value="<?php if($sisa_air_10!=''){echo $sisa_air_10;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                                <tr>
                                    <td align="center">15</td>
                                    <td align="center"><input name="sw_15" type="text" id="sw_15" class="form-control" value="<?php if($sw_15!=''){echo $sw_15;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_15" type="text" class="form-control" id="evap_15" value="<?php if($Evap_15!=''){echo $Evap_15;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_15" type="text"  class="form-control" id="sisa_air_15" value="<?php if($sisa_air_15!=''){echo $sisa_air_15;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                                <tr>
                                    <td align="center">20</td>
                                    <td align="center"><input name="sw_20" type="text" id="sw_20" class="form-control" value="<?php if($sw_20!=''){echo $sw_20;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_20" type="text" class="form-control" id="evap_20" value="<?php if($Evap_20!=''){echo $Evap_20;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_20" type="text"  class="form-control" id="sisa_air_20" value="<?php if($sisa_air_20!=''){echo $sisa_air_20;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                                <tr>
                                    <td align="center">25</td>
                                    <td align="center"><input name="sw_25" type="text" id="sw_25" class="form-control" value="<?php if($sw_25!=''){echo $sw_25;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_25" type="text" class="form-control" id="evap_25" value="<?php if($Evap_25!=''){echo $Evap_25;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_25" type="text"  class="form-control" id="sisa_air_25" value="<?php if($sisa_air_25!=''){echo $sisa_air_25;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                                <tr>
                                    <td align="center">30</td>
                                    <td align="center"><input name="sw_30" type="text" id="sw_30" class="form-control" value="<?php if($sw_30!=''){echo $sw_30;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_30" type="text" class="form-control" id="evap_30" value="<?php if($Evap_30!=''){echo $Evap_30;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_30" type="text"  class="form-control" id="sisa_air_30" value="<?php if($sisa_air_30!=''){echo $sisa_air_30;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                                <tr>
                                    <td align="center">35</td>
                                    <td align="center"><input name="sw_35" type="text" id="sw_35" class="form-control" value="<?php if($sw_35!=''){echo $sw_35;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_35" type="text" class="form-control" id="evap_35" value="<?php if($Evap_35!=''){echo $Evap_35;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_35" type="text"  class="form-control" id="sisa_air_35" value="<?php if($sisa_air_35!=''){echo $sisa_air_35;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                                <tr>
                                    <td align="center">40</td>
                                    <td align="center"><input name="sw_40" type="text" id="sw_40" class="form-control" value="<?php if($sw_40!=''){echo $sw_40;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_40" type="text" class="form-control" id="evap_40" value="<?php if($Evap_40!=''){echo $Evap_40;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_40" type="text"  class="form-control" id="sisa_air_40" value="<?php if($sisa_air_40!=''){echo $sisa_air_40;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                                <tr>
                                    <td align="center">45</td>
                                    <td align="center"><input name="sw_45" type="text" id="sw_45" class="form-control" value="<?php if($sw_45!=''){echo $sw_45;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_45" type="text" class="form-control" id="evap_45" value="<?php if($Evap_45!=''){echo $Evap_45;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_45" type="text"  class="form-control" id="sisa_air_45" value="<?php if($sisa_air_45!=''){echo $sisa_air_45;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                                <tr>
                                    <td align="center">50</td>
                                    <td align="center"><input name="sw_50" type="text" id="sw_50" class="form-control" value="<?php if($sw_50!=''){echo $sw_50;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_50" type="text" class="form-control" id="evap_50" value="<?php if($Evap_50!=''){echo $Evap_50;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_50" type="text"  class="form-control" id="sisa_air_50" value="<?php if($sisa_air_50!=''){echo $sisa_air_50;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                                <tr>
                                    <td align="center">55</td>
                                    <td align="center"><input name="sw_55" type="text" id="sw_55" class="form-control" value="<?php if($sw_55!=''){echo $sw_55;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_55" type="text" class="form-control" id="evap_55" value="<?php if($Evap_55!=''){echo $Evap_55;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_55" type="text"  class="form-control" id="sisa_air_55" value="<?php if($sisa_air_55!=''){echo $sisa_air_55;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                                <tr>
                                    <td align="center">60</td>
                                    <td align="center"><input name="sw_60" type="text" id="sw_60" class="form-control" value="<?php if($sw_60!=''){echo $sw_60;}?>" placeholder="" onChange="hitung_sw();" onBlur="hitung_sw();" style="text-align: center;"/></td>
                                    <td align="center"><input name="evap_60" type="text" class="form-control" id="evap_60" value="<?php if($Evap_60!=''){echo $Evap_60;}?>" placeholder="" style="text-align: center;"></td>
                                    <td align="center"><input name="sisa_air_60" type="text"  class="form-control" id="sisa_air_60" value="<?php if($sisa_air_60!=''){echo $sisa_air_60;}?>" placeholder="" style="text-align: center;"></td>
                                </tr>
                            </tbody>
                        </table>

                        <input class="btn btn-success pull-left" type="submit" <?php if($_POST['evap_0']!=''){ echo"style='display:none;'";}?> name="lihat" id="lihat" value="Submit Grafik" />
                        <?php if($_POST['evap_0']!=''){?>
                        <a href="#" ev0='<?php echo $_POST['evap_0']; ?>' ev1='<?php echo $_POST['evap_5']; ?>' ev2='<?php echo $_POST['evap_10']; ?>' ev3='<?php echo $_POST['evap_15']; ?>' ev4='<?php echo $_POST['evap_20']; ?>' ev5='<?php echo $_POST['evap_25']; ?>' ev6='<?php echo $_POST['evap_30']; ?>' ev7='<?php echo $_POST['evap_35']; ?>' ev8='<?php echo $_POST['evap_40']; ?>' ev9='<?php echo $_POST['evap_45']; ?>' ev10='<?php echo $_POST['evap_50']; ?>' ev11='<?php echo $_POST['evap_55']; ?>' ev12='<?php echo $_POST['evap_60']; ?>' class="btn btn-primary pull-left grafikevap">Grafik</a>
                        <?php }?>
                        <!-- <b>Jumlah Air</b> <input name="jml_air" type="text" id="jml_air" class="form-control" value="" placeholder="" style="text-align: left;"><br> -->
                        <!-- <a href="LihatGrafikDT&<?php echo $_POST['evap_0']; ?>&<?php echo $_POST['evap_5']; ?>&<?php echo $_POST['evap_10']; ?>&<?php echo $_POST['evap_15']; ?>&<?php echo $_POST['evap_20']; ?>&<?php echo $_POST['evap_25']; ?>&<?php echo $_POST['evap_30']; ?>&<?php echo $_POST['evap_35']; ?>&<?php echo $_POST['evap_40']; ?>&<?php echo $_POST['evap_45']; ?>&<?php echo $_POST['evap_50']; ?>&<?php echo $_POST['evap_55']; ?>&<?php echo $_POST['evap_60']; ?>" class="btn btn-primary pull-left" target="_blank">Lihat Grafik </a> -->
                        <!--<button type="button" class="btn btn-success pull-left" name="lihat" value="lihat" id="lihat"><i class="fa fa-search"></i> Lihat Grafik</button>-->
                        <br/>
                        <table class="table table-bordered table-hover table-striped" width="30%">
                            <thead class="bg-maroon">
                                <tr>
                                    <th width="10%"><div align="center">SLOPE (Between 0" - 15" minutes)</div></th>
                                    <th width="5%"><div align="center"><input name="slope1" type="text"  class="form-control" id="slope1" value="<?php if($slope1!=''){echo $slope1;}?>" placeholder="" readonly style="text-align: center;"></div></th>
                                    <th width="5%"><div align="center">g/H</div></th>
                                </tr>
                                <tr>
                                    <th width="10%"><div align="center">SLOPE (Between 5" - 20" minutes)</div></th>
                                    <th width="5%"><div align="center"><input name="slope2" type="text"  class="form-control" id="slope2" value="<?php if($slope2!=''){echo $slope2;}?>" placeholder="" readonly style="text-align: center;"></div></th>
                                    <th width="5%"><div align="center">g/H</div></th>
                                </tr>
                                <tr>
                                    <th width="10%"><div align="center">SLOPE (Between 10" - 25" minutes)</div></th>
                                    <th width="5%"><div align="center"><input name="slope3" type="text"  class="form-control" id="slope3" value="<?php if($slope3!=''){echo $slope3;}?>" placeholder="" readonly style="text-align: center;"></div></th>
                                    <th width="5%"><div align="center">g/H</div></th>
                                </tr>
                                <tr>
                                    <th width="10%"><div align="center">SLOPE (Between 15" - 30" minutes)</div></th>
                                    <th width="5%"><div align="center"><input name="slope4" type="text"  class="form-control" id="slope4" value="<?php if($slope4!=''){echo $slope4;}?>" placeholder="" readonly style="text-align: center;"></div></th>
                                    <th width="5%"><div align="center">g/H</div></th>
                                </tr>
                                <tr>
                                    <th width="10%"><div align="center">SLOPE (Between 20" - 35" minutes)</div></th>
                                    <th width="5%"><div align="center"><input name="slope5" type="text"  class="form-control" id="slope5" value="<?php if($slope5!=''){echo $slope5;}?>" placeholder="" readonly style="text-align: center;"></div></th>
                                    <th width="5%"><div align="center">g/H</div></th>
                                </tr>
                                <tr>
                                    <th width="10%"><div align="center">SLOPE (Between 25" - 40" minutes)</div></th>
                                    <th width="5%"><div align="center"><input name="slope6" type="text"  class="form-control" id="slope6" value="<?php if($slope6!=''){echo $slope6;}?>" placeholder="" readonly style="text-align: center;"></div></th>
                                    <th width="5%"><div align="center">g/H</div></th>
                                </tr>
                                <tr>
                                    <th width="10%"><div align="center">SLOPE (Between 30" - 45" minutes)</div></th>
                                    <th width="5%"><div align="center"><input name="slope7" type="text"  class="form-control" id="slope7" value="<?php if($slope7!=''){echo $slope7;}?>" placeholder="" readonly style="text-align: center;"></div></th>
                                    <th width="5%"><div align="center">g/H</div></th>
                                </tr>
                                <tr>
                                    <th width="10%"><div align="center">SLOPE (Between 35" - 50" minutes)</div></th>
                                    <th width="5%"><div align="center"><input name="slope8" type="text"  class="form-control" id="slope8" value="<?php if($slope8!=''){echo $slope8;}?>" placeholder="" readonly style="text-align: center;"></div></th>
                                    <th width="5%"><div align="center">g/H</div></th>
                                </tr>
                                <tr>
                                    <th width="10%"><div align="center">SLOPE (Between 40" - 55" minutes)</div></th>
                                    <th width="5%"><div align="center"><input name="slope9" type="text"  class="form-control" id="slope9" value="<?php if($slope9!=''){echo $slope9;}?>" placeholder="" readonly style="text-align: center;"></div></th>
                                    <th width="5%"><div align="center">g/H</div></th>
                                </tr>
                                <tr>
                                    <th width="10%"><div align="center">SLOPE (Between 45" - 60" minutes)</div></th>
                                    <th width="5%"><div align="center"><input name="slope10" type="text"  class="form-control" id="slope10" value="<?php if($slope10!=''){echo $slope10;}?>" placeholder="" readonly style="text-align: center;"></div></th>
                                    <th width="5%"><div align="center">g/H</div></th>
                                </tr>
                            </thead>
                            
                        </table>
                </div>
                <!-- DRYING TIME END-->	
                <!-- FIBER CONTENT BEGIN-->	
                <div class="form-group" id="fiber" style="display:none;">
                    <label for="fiber" class="col-sm-3 control-label">FIBER CONTENT</label>
                </div>
				<div class="form-group" id="fiber1" style="display:none;">
                    <label for="cs" class="col-sm-3 control-label">COTTON &amp; SPANDEX</label>
					<div class="col-sm-3">
						<input name="berat_asal_cs" type="text" class="form-control" id="berat_asal_cs" value="" placeholder="Berat Asal" onChange="hitung_fiber_cs();" onBlur="hitung_fiber_cs();" style="text-align: right;"> 
                        <input name="berat_cotton_cs" type="text" class="form-control" id="berat_cotton_cs" value="" placeholder="Berat Cotton" onChange="hitung_fiber_cs();" onBlur="hitung_fiber_cs();" style="text-align: right;">
					</div>
					<div class="col-sm-2">
                        <div class="input-group">
                            <input name="cotton_cs" class="form-control" id="cotton_cs" value="" placeholder="% Cotton" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
                        <div class="input-group">
                            <input name="spandex_cs" class="form-control" id="spandex_cs" value="" placeholder="% Spandex" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
                        <div class="input-group">
                            <input name="total_cs" class="form-control" id="total_cs" value="" placeholder="% Total" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
					</div>
				</div>
                <div class="form-group" id="fiber2" style="display:none;">
                    <label for="ps" class="col-sm-3 control-label">POLYESTER &amp; SPANDEX</label>
					<div class="col-sm-3">
						<input name="berat_asal_ps" type="text" class="form-control" id="berat_asal_ps" value="" placeholder="Berat Asal" onChange="hitung_fiber_ps();" onBlur="hitung_fiber_ps();" style="text-align: right;"> 
                        <input name="berat_poly_ps" type="text" class="form-control" id="berat_poly_ps" value="" placeholder="Berat Polyester" onChange="hitung_fiber_ps();" onBlur="hitung_fiber_ps();" style="text-align: right;">
					</div>
					<div class="col-sm-2">
                        <div class="input-group">
                            <input name="poly_ps" class="form-control" id="poly_ps" value="" placeholder="% Polyester" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
                        <div class="input-group">
                            <input name="spandex_ps" class="form-control" id="spandex_ps" value="" placeholder="% Spandex" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
                        <div class="input-group">
                            <input name="total_ps" class="form-control" id="total_ps" value="" placeholder="% Total" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
					</div>
				</div>
                <div class="form-group" id="fiber3" style="display:none;">
                    <label for="ns" class="col-sm-3 control-label">NYLON &amp; SPANDEX</label>
					<div class="col-sm-3">
						<input name="berat_asal_ns" type="text" class="form-control" id="berat_asal_ns" value="" placeholder="Berat Asal" onChange="hitung_fiber_ns();" onBlur="hitung_fiber_ns();" style="text-align: right;"> 
                        <input name="berat_nylon_ns" type="text" class="form-control" id="berat_nylon_ns" value="" placeholder="Berat Nylon" onChange="hitung_fiber_ns();" onBlur="hitung_fiber_ns();" style="text-align: right;">
					</div>
					<div class="col-sm-2">
                        <div class="input-group">
                            <input name="nylon_ns" class="form-control" id="nylon_ns" value="" placeholder="% Nylon" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
                        <div class="input-group">
                            <input name="spandex_ns" class="form-control" id="spandex_ns" value="" placeholder="% Spandex" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
                        <div class="input-group">
                            <input name="total_ns" class="form-control" id="total_ns" value="" placeholder="% Total" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
					</div>
				</div>
                <div class="form-group" id="fiber4" style="display:none;">
                    <label for="cp" class="col-sm-3 control-label">COTTON &amp; POLYESTER</label>
					<div class="col-sm-3">
						<input name="berat_asal_cp" type="text" class="form-control" id="berat_asal_cp" value="" placeholder="Berat Asal" onChange="hitung_fiber_cp();" onBlur="hitung_fiber_cp();" style="text-align: right;"> 
                        <input name="berat_cotpol_cp" type="text" class="form-control" id="berat_cotpol_cp" value="" placeholder="Berat Cotton Poly" onChange="hitung_fiber_cp();" onBlur="hitung_fiber_cp();" style="text-align: right;">
					</div>
					<div class="col-sm-2">
                        <div class="input-group">
                            <input name="cotton_cp" class="form-control" id="cotton_cp" value="" placeholder="% Cotton" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
                        <div class="input-group">
                            <input name="poly_cp" class="form-control" id="poly_cp" value="" placeholder="% Polyester" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
                        <div class="input-group">
                            <input name="total_cp" class="form-control" id="total_cp" value="" placeholder="% Total" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
					</div>
				</div>
                <div class="form-group" id="fiber5" style="display:none;">
                    <label for="cps" class="col-sm-3 control-label">COTTON, POLYESTER &amp; SPANDEX</label>
					<div class="col-sm-3">
						<input name="berat_asal_cps" type="text" class="form-control" id="berat_asal_cps" value="" placeholder="Berat Asal" onChange="hitung_fiber_cps();" onBlur="hitung_fiber_cps();" style="text-align: right;"> 
                        <input name="berat_cotpol_cps" type="text" class="form-control" id="berat_cotpol_cps" value="" placeholder="Berat Cotton + Poly" onChange="hitung_fiber_cps();" onBlur="hitung_fiber_cps();" style="text-align: right;">
                        <input name="berat_poly_cps" type="text" class="form-control" id="berat_poly_cps" value="" placeholder="Berat Polyester" onChange="hitung_fiber_cps();" onBlur="hitung_fiber_cps();" style="text-align: right;"> 
					</div>
					<div class="col-sm-2">
                        <div class="input-group">
                            <input name="cotton_cps" class="form-control" id="cotton_cps" value="" placeholder="% Cotton" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
                        <div class="input-group">
                            <input name="poly_cps" class="form-control" id="poly_cps" value="" placeholder="% Polyester" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
                        <div class="input-group">
                            <input name="spandex_cps" class="form-control" id="spandex_cps" value="" placeholder="% Spandex" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
                        <div class="input-group">
                            <input name="total_cps" class="form-control" id="total_cps" value="" placeholder="% Total" style="text-align: right;">
                            <span class="input-group-addon">&#37;</span>	
						</div>
					</div>
				</div>
                <!-- FIBER CONTENT END-->
                <!-- FABRIC WEIGHT BEGIN-->	
				<div class="form-group" id="fwe" style="display:none;">
					<label for="fwe" class="col-sm-3 control-label">FABRIC WEIGHT</label>
					<div class="col-sm-3">
						<input name="fwe_n" type="text" class="form-control" id="fwe_n" value="" placeholder="Jumlah Specimen (n)" onChange="hitung_fwe();" onBlur="hitung_fwe();" style="text-align: right;">
                        <input name="fwe_d" type="text" class="form-control" id="fwe_d" value="" placeholder="Diameter (d)" onChange="hitung_fwe();" onBlur="hitung_fwe();" style="text-align: right;">
                        <input name="fwe_g" type="text" class="form-control" id="fwe_g" value="" placeholder="Total Masa Specimen (G)" onChange="hitung_fwe();" onBlur="hitung_fwe();" style="text-align: right;">  
					</div>                                  
                    <div class="col-sm-1">
                        <input name="label_a" class="form-control" id="label_a" value="A =" placeholder="" style="text-align: left;" readonly>
                        <input name="label_akhir" class="form-control" id="label_akhir" value="g/m&sup2;=" placeholder="" style="text-align: left;" readonly>
                        <input name="label_akhir2" class="form-control" id="label_akhir2" value="oz/yd&sup2;=" placeholder="" style="text-align: left;" readonly>
					</div>
					<div class="col-sm-2">
                        <input name="hasil_a" class="form-control" id="hasil_a" value="0" placeholder="" style="text-align: right;">
                        <input name="hasil_akhir" class="form-control" id="hasil_akhir" value="0" placeholder="" style="text-align: right;">
                        <input name="hasil_akhir2" class="form-control" id="hasil_akhir2" value="0" placeholder="" style="text-align: right;">
					</div>
				</div>
                <!-- FABRIC WEIGHT END-->
                <!-- FORCE DECAY BEGIN-->
                <div class="form-group" id="fdrumus" style="display:none;">
                    <label for="fd" class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" style="text-align: left;" readonly>B = X - Y / X * 100 &#13;&#10;Keterangan : &#13;&#10;X is the maximum force at the specified elongation on an initial (specified) cycle; &#13;&#10;Y is the maximum force at the same specified elongation on an subsequent (specified) cycle.
                        </textarea>
					</div>
                </div>
				<div class="form-group" id="fd" style="display:none;">
					<label for="fd" class="col-sm-3 control-label">FORCE DECAY</label>
					<div class="col-sm-3">
						<input name="fd_x" type="text" class="form-control" id="fd_x" value="" placeholder="X" onChange="hitung_fd();" onBlur="hitung_fd();" style="text-align: right;">
                        <input name="fd_y" type="text" class="form-control" id="fd_y" value="" placeholder="Y" onChange="hitung_fd();" onBlur="hitung_fd();" style="text-align: right;">
					</div>                                  
                    <div class="col-sm-1">
                        <input name="label_b" class="form-control" id="label_b" value="B =" placeholder="" style="text-align: left;" readonly>
					</div>
					<div class="col-sm-2">
                        <input name="hasil_b" class="form-control" id="hasil_b" value="0" placeholder="" style="text-align: right;">
					</div>
				</div>
                <!-- FORCE DECAY END-->
            </div>
        </div>
    </div>
    <!--<?php if($Evap_5!=""){?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Drying Time</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body chart-responsive">
                <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
    <?php } ?>-->
</form>
</body>
</html>
<div id="GrafikEvap" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'line',        
    },
    credits: {
        enabled: false
    },
    tooltip: {
        shared: true,
        crosshairs: true,
        headerFormat: '<b>{point.key}</b><br/>'
    }
    title: {
        text: 'Evaporation'
    },
    subtitle: {
        text: '0 s/d 60 Menit'
    },
    plotOptions: {
        column: {
            depth: 25,
			color: 'brown',
        }
    },
    xAxis: {
		categories: [0 Min, 5 Min, 10 Min, 15 Min, 20 Min, 25 Min, 30 Min, 35 Min, 40 Min, 45 Min, 50 Min, 55 Min, 60 Min],
        labels: {
            rotation: 0,
            align: 'right',
            style: {
                fontSize: '10px',
            }
        }
    },
    legend: {
        enabled: true
    },
    yAxis: {
        title: {
            text: 'Evaporation Rate (g/h)'
        }
    },
    series: [{
        name: 'Waktu',
        data: [<?php echo $Evap_0; ?>, <?php echo $Evap_5; ?>, <?php echo $Evap_10; ?>, <?php echo $Evap_15; ?>, <?php echo $Evap_20; ?>, <?php echo $Evap_25; ?>, <?php echo $Evap_30; ?>, <?php echo $Evap_35; ?>, <?php echo $Evap_40; ?>, <?php echo $Evap_45; ?>, <?php echo $Evap_50; ?>, <?php echo $Evap_55; ?>, <?php echo $Evap_60; ?>],
		dataLabels: {
                enabled: true,
                format: '{point.y:.3f}',
				style: {
                fontSize: '10px',
                fontFamily: 'Arial, sans-serif'
            }
            }
    }]
});
</script>