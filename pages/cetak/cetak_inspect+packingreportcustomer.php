<?php
ini_set("error_reporting", 1);
session_start();
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../koneksi.php";
include "../../tgl_indo.php";
include_once "../bar128.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Demand=$_GET['demand'];
$IsInspectpacking=$_GET['isinspectpacking'];
//$Operator=$_GET['operator'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}

$sqldes="SELECT 
ITXVIEW_INS_DESKRIPSI.DEMANDNO,
ITXVIEW_INS_DESKRIPSI.PRODUCTIONORDERCODE,
ITXVIEW_INS_DESKRIPSI.LEGALNAME1,
ITXVIEW_INS_DESKRIPSI.BUYER,
ITXVIEW_INS_DESKRIPSI.NO_ITEM,
ITXVIEW_INS_DESKRIPSI.SALESORDERCODE,
ITXVIEW_INS_DESKRIPSI.ITEMDESCRIPTION,
ITXVIEW_INS_DESKRIPSI.SEASON,
ITXVIEW_INS_DESKRIPSI.NO_WARNA,
ITXVIEW_INS_DESKRIPSI.WARNA,
ITXVIEW_INS_DESKRIPSI.SUBCODE02,
ITXVIEW_INS_DESKRIPSI.SUBCODE03,
ITXVIEW_INS_DESKRIPSI.PO_NUMBER,
ITXVIEW_INS_DESKRIPSI.STYL,
ITXVIEW_INS_DESKRIPSI.NAMENAME,
ITXVIEW_INS_DESKRIPSI.VALUEDECIMAL
FROM ITXVIEW_INS_DESKRIPSI ITXVIEW_INS_DESKRIPSI
WHERE ITXVIEW_INS_DESKRIPSI.DEMANDNO = '$Demand'";
$stmt=db2_exec($conn1,$sqldes, array('cursor'=>DB2_SCROLLABLE));
$rd = db2_fetch_assoc($stmt);
$ww=explode(",",$rd['NAMENAME']);
$valueww=explode(",",$rd['VALUEDECIMAL']);
//GRAMASI
if($ww[0]=="GSM"){ $gramasi=$valueww[0];}
else if($ww[1]=="GSM"){ $gramasi=$valueww[1];}
else if($ww[2]=="GSM"){ $gramasi=$valueww[2];}
else if($ww[3]=="GSM"){ $gramasi=$valueww[3];}
$posg=strpos($gramasi,".");
$valgramasi=substr($gramasi,0,$posg);
//WIDTH
if($ww[0]=="Width"){ $lebar=$valueww[0];}
else if($ww[1]=="Width"){ $lebar=$valueww[1];}
else if($ww[2]=="Width"){ $lebar=$valueww[2];}
else if($ww[3]=="Width"){ $lebar=$valueww[3];}
$posl=strpos($lebar,".");
$vallebar=substr($lebar,0,$posl);

//EXPLOC
if(substr($rd['SALESORDERCODE'],3)=='DOM'){$exploc='LOCAL';}
else if(substr($rd['SALESORDERCODE'],3)=='CAP'){$exploc='LOCAL';}
else if(substr($rd['SALESORDERCODE'],3)=='CWD'){$exploc='LOCAL';}
else if(substr($rd['SALESORDERCODE'],3)=='CWE'){$exploc='EXPORT';}
else if(substr($rd['SALESORDERCODE'],3)=='EXP'){$exploc='EXPORT';}
else if(substr($rd['SALESORDERCODE'],3)=='REP'){$exploc='LOCAL';}
else if(substr($rd['SALESORDERCODE'],3)=='RFD'){$exploc='LOCAL';}
else if(substr($rd['SALESORDERCODE'],3)=='RPE'){$exploc='EXPORT';}
else if(substr($rd['SALESORDERCODE'],3)=='RFE'){$exploc='EXPORT';}
else if(substr($rd['SALESORDERCODE'],3)=='SAM'){$exploc='LOCAL';}
else if(substr($rd['SALESORDERCODE'],3)=='SME'){$exploc='EXPORT';}
else if(substr($rd['SALESORDERCODE'],3)=='STO'){$exploc='LOCAL';}
else{$exploc='LOCAL';}

//RIB
if(strpos($rd['ITEMDESCRIPTION'],'RIB') !== false){
$rib='1';
}else{$rib='0';}

//POLY100
if(strpos($rd['ITEMDESCRIPTION'],'100% POLY') !== false){
$poly100='1';
}else if(strpos($rd['ITEMDESCRIPTION'],'100% RECYCLED POLY') !== false){
$poly100='1';
}else{$poly100='0';}

//EXTRA
if($rd['BUYER']=="ADIDAS"){$extra=0.125;}
else if($rd['BUYER']!="ADIDAS" AND ($exploc=="EXPORT" OR $exploc=="LOCAL") AND $rib=="1"){$extra=0.20;}
else if(($rd['BUYER']!="ADIDAS" OR $rd['BUYER']=="CHARTER LINK LTD") AND $exploc=="LOCAL" AND $rib=="0"){$extra=0.25;}
else if(($rd['BUYER']!="ADIDAS" OR $rd['BUYER']!="CHARTER LINK LTD") AND $exploc=="EXPORT" AND $rib=="0"){$extra=0.35;}

//KET. GRADE
if($rd['BUYER']=="UNDER ARMOUR" OR $rd['BUYER']=="UA-DOME"){$ketgrade=15;}
else if($rd['BUYER']=="ADIDAS" AND $poly100=="1"){$ketgrade=15;}
else{$ketgrade=20;}

$sqlDB2="SELECT 
              ELEMENTSINSPECTION.DEMANDCODE,
              ELEMENTSINSPECTION.OPERATORCODE,
              LEFT(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,19) AS DATE_INS 
              FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
              WHERE ELEMENTSINSPECTION.DEMANDCODE='$Demand'";
$stmt1=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
$rdate = db2_fetch_assoc($stmt1);
              
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Inspection Report Packing QC For Customer</title>
<script>

// set portrait orientation

jsPrintSetup.setOption('orientation', jsPrintSetup.kPortraitOrientation);

// set top margins in millimeters
jsPrintSetup.setOption('marginTop', 0);
jsPrintSetup.setOption('marginBottom', 0);
jsPrintSetup.setOption('marginLeft', 0);
jsPrintSetup.setOption('marginRight', 0);

// set page header
jsPrintSetup.setOption('headerStrLeft', '');
jsPrintSetup.setOption('headerStrCenter', '');
jsPrintSetup.setOption('headerStrRight', '');

// set empty page footer
jsPrintSetup.setOption('footerStrLeft', '');
jsPrintSetup.setOption('footerStrCenter', '');
jsPrintSetup.setOption('footerStrRight', '');

// clears user preferences always silent print value
// to enable using 'printSilent' option
jsPrintSetup.clearSilentPrint();

// Suppress print dialog (for this context only)
jsPrintSetup.setOption('printSilent', 1);

// Do Print 
// When print is submitted it is executed asynchronous and
// script flow continues after print independently of completetion of print process! 
jsPrintSetup.print();

window.addEventListener('load', function () {
    var rotates = document.getElementsByClassName('rotate');
    for (var i = 0; i < rotates.length; i++) {
        rotates[i].style.height = rotates[i].offsetWidth + 'px';
    }
});
// next commands

</script>
<style>
.hurufvertical {
     writing-mode:tb-rl;
    -webkit-transform:rotate(-90deg);
    -moz-transform:rotate(-90deg);
    -o-transform: rotate(-90deg);
    -ms-transform:rotate(-90deg);
    transform: rotate(180deg);
    white-space:nowrap;
    float:left;
}
p {
    writing-mode:tb-rl;
    -webkit-transform:rotate(-90deg);
    -moz-transform:rotate(-90deg);
    -o-transform: rotate(-90deg);
    -ms-transform:rotate(-90deg);
    transform: rotate(180deg);
    white-space:nowrap;
    float:center;
}	

input{
text-align:center;
border:hidden;
}
@media print {
  ::-webkit-input-placeholder { /* WebKit browsers */
      color: transparent;
  }
  :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
      color: transparent;
  }
  ::-moz-placeholder { /* Mozilla Firefox 19+ */
      color: transparent;
  }
  :-ms-input-placeholder { /* Internet Explorer 10+ */
      color: transparent;
  }
  .pagebreak { page-break-before:always; }
  .header {display:block}
  table thead 
   {
    display: table-header-group;
   }
}	
</style>	
</head>
<body>
<table width="100%" border="0">
    <tr>
      <td><table width="100%" border="0" class="table-list1"> 
        <tr>
          <td align="center" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><strong><font size="+1">PT. INDO TAICHEN PRODUCTION INSPECTION REPORT</font></strong></td>
        </tr>
        </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" class="table-list1">
        <thead>
          <tr>
	        <td width="10%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">Card No</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="12%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rd['PRODUCTIONORDERCODE'];?></font></td>
            <td width="10%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">Color No</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="18%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rd['NO_WARNA'];?></font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">IM No</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="12%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rd['SUBCODE02']."-".$rd['SUBCODE03'];?></font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">Width</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $vallebar." inch";?></font></td>
          </tr>
          <tr>
	        <td width="10%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">Customer</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="12%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rd['LEGALNAME1'];?></font></td>
            <td width="10%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">Date</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="18%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rdate['DATE_INS'];?></font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">Style No</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="12%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rd['STYL'];?></font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">Gramasi</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $valgramasi." gr/m2";?></font></td>
          </tr>
          <tr>
	        <td width="10%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">Order</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="12%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rd['SALESORDERCODE'];?></font></td>
            <td width="10%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">No Demand</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="18%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rd['DEMANDNO'];?></font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">Color</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="12%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rd['WARNA'];?></font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
          </tr>
          <tr>
		<td width="10%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">PO</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="12%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rd['PO_NUMBER'];?></font></td>
            <td width="10%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">Description</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="18%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rd['ITEMDESCRIPTION'];?></font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">No Item</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="12%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rd['NO_ITEM'];?></font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
          </tr>
          <tr>
		<td width="10%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">Buyer</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">:</font></td>
            <td width="12%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2"><?php echo $rd['BUYER'];?></font></td>
            <td width="10%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
            <td width="18%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
            <td width="12%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
            <td width="3%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
            <td width="4%" align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;" ><font size="-2">&nbsp;</font></td>
          </tr>
        </thead>
      </table></td>
    </tr>
        <!-- <?php if(strlen($rd['ITEMDESCRIPTION']) <= 40){?>
        <tr>
                <td style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;">&nbsp;</td>
        </tr>
        <?php }?>
        <?php if(strlen($rd['ITEMDESCRIPTION']) > 40){?>
        <tr>
                <td style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid;">&nbsp;</td>
        </tr>
        <?php }?> -->
    <tr>
      <td><table width="100%" border="1" class="table-list1">
        <thead>
        <tr>
                <td width="10%" rowspan="6" colspan="2" align="center" valign="center"><font size="-1">Roll No</font></td>
                <td width="8%" rowspan="11" align="center" valign="center"><font size="-1">DEFECT CODE NAME</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><font size="-2">Y YARN</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; "><font size="-2">T CONSTRUCTION</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-left:0px #000000 solid;"><font size="-2">D DYE & FINISHING</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-left:0px #000000 solid;"><font size="-2">C CLEAN LINNES</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-left:0px #000000 solid;"><font size="-2">P PRINT</font></td>
                <td width="6%" align="left" colspan="3" style="border-right:0px #000000 solid;"><font size="-2">Color</font></td>
                <td width="2%" align="center" style="border-right:0px #000000 solid; 
                border-left:0px #000000 solid;" ><font size="-2">: </td>
                <td width="12%" align="left" colspan="3" style="border-left:0px #000000 solid;"><font size="-2">OK/Reject</font></td>
        </tr>
        <tr>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><font size="-2">Y01 SLUB</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">T01 MISSING LINE</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">D01 HAIRLINES</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">C01 UNEVEN SHEARING</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">P01 PRINT</font></td>
                <td width="6%" align="left" colspan="3" style="border-right:0px #000000 solid;"><font size="-2">Handfeel</font></td>
                <td width="2%" align="center" style="border-right:0px #000000 solid; 
                border-left:0px #000000 solid;" ><font size="-2">: </font></td>
                <td width="12%" align="left" colspan="3" style="border-left:0px #000000 solid;"><font size="-2">OK/Reject</font></td>
        </tr> 
        <tr>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">Y02 BARRE</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">T02 HOLES</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">D02 HOLES</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">C02 STAINS</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;">&nbsp;</td>
                <td width="6%" align="left" colspan="3" style="border-right:0px #000000 solid;"><font size="-2">Shading</font></td>
                <td width="2%" align="center" style="border-right:0px #000000 solid; 
                border-left:0px #000000 solid;" ><font size="-2">: </font></td>
                <td width="12%" align="left" colspan="3" style="border-left:0px #000000 solid;"><font size="-2">OK/Reject</font></td>
        </tr> 
        <tr>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">Y03 UNEVEN YARN</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">T03 STREAKS</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">D03 COLOR TONE</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">C03 OIL/GREASE SPOT</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;">&nbsp;</td>
                <td width="6%" align="left" colspan="3" style="border-right:0px #000000 solid;"><font size="-2">Aesthetics</font></td>
                <td width="2%" align="center" style="border-right:0px #000000 solid; 
                border-left:0px #000000 solid;" ><font size="-2">: </font></td>
                <td width="12%" align="left" colspan="3" style="border-left:0px #000000 solid;"><font size="-2">OK/Reject</font></td>
        </tr>  
        <tr>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">Y04 YARN CONTAMINATION</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">T04 MISSKNIT</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">D04 ABRASION</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">C04 DIRT/SOIL</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;">&nbsp;</td>
                <td width="6%" align="left" colspan="3" style="border-right:0px #000000 solid;"><font size="-2">Smell</font></td>
                <td width="2%" align="center" style="border-right:0px #000000 solid; 
                border-left:0px #000000 solid;" ><font size="-2">: </font></td>
                <td width="12%" align="left" colspan="3" style="border-left:0px #000000 solid;"><font size="-2">OK/Reject</font></td>
        </tr>  
        <tr>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">Y05 NEPS/DEAD COTTON</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">T05 KNOT</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">D05 DYESPOT & STREAK</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">C05 WATER MARKS</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;">&nbsp;</td>
                <td width="1%" align="left" rowspan="6"><font size="-2"><p>Extra</p></font></td>
                <td width="1%" align="left" rowspan="6"><font size="-2"><p>Grand Total</p></font></td>
                <td width="1%" align="left" rowspan="6"><font size="-2"><p>Grade</p></font></td>
                <td width="1%" align="left" rowspan="6"><font size="-2"><p>Poin Per 100 Yard</p></font></td>
                <td width="1%" align="left" rowspan="6"><font size="-2"><p>Width</p></font></td>
                <td width="1%" align="left" rowspan="6"><font size="-2"><p>Gramasi</p></font></td>
                <td width="12%" align="center" rowspan="6"><font size="-2">Comment</font></td>
        </tr> 
        <tr>    
                <td width="6%" align="center" valign="center" rowspan="5"><font size="-1">Yard</font></td>
                <td width="6%" align="center" valign="center" rowspan="5"><font size="-1">KG</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">T06 OIL MARK</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">D06 WRINKLES/FOLD MARK</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;">&nbsp;</td>
        </tr>  
        <tr>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">T07 FLY WASTE</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">D07 BOWING AND SKEWING</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" >NIHIL</td>
        </tr> 
        <tr>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">D08 PIN HOLES</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;">- NO DEFECT</td>
        </tr> 
        <tr>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">D09 PICK/SNAG</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;">&nbsp;</td>
        </tr> 
        <tr>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">D10 KNOT</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;"><font size="-2">&nbsp;</font></td>
                <td width="12%" align="left" colspan="6" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;">&nbsp;</td>
        </tr> 
        </thead>
        <tbody>
        <?php 
        $totalpoin=0;
        $totalcredit=0;
        $poin100=0;
        if($IsInspectpacking=="true"){ $pack =" AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13 "; }else{$pack = " AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 ";}
        //if($Operator!=""){ $opt =" AND ELEMENTSINSPECTION.OPERATORCODE ='$Operator' "; }else{$opt = " ";}
        $sqldtl="SELECT
        ELEMENTSINSPECTION.DEMANDCODE,
        ELEMENTSINSPECTION.OPERATORCODE,
        ELEMENTSINSPECTION.ABSUNIQUEID,
        ITXVIEWINSPECTPACKING.ELEMENTSINSPECTIONELEMENTCODE,
        ITXVIEWINSPECTPACKING.VALUEDECIMAL,
        ITXVIEWINSPECTPACKING.LENGTHGROSS,
        ITXVIEWINSPECTPACKING.WEIGHTNET,
        ITXVIEWINSPECTPACKING.WIDTHNET,
        ITXVIEWINSPECTPACKING.QUALITYCODE,
        ITXVIEWINSPECTPACKING.DEFECT,
        ITXVIEWINSPECTPACKING.POSITIONL,
        ITXVIEWINSPECTPACKING.POSITIONW,
        ITXVIEWINSPECTPACKING.POINT,
        ITXVIEWINSPECTPACKING.CREDIT 
        FROM ITXVIEWINSPECTPACKING ITXVIEWINSPECTPACKING
        LEFT JOIN ELEMENTSINSPECTION ELEMENTSINSPECTION
        ON ITXVIEWINSPECTPACKING.ELEMENTSINSPECTIONELEMENTCODE = ELEMENTSINSPECTION.ELEMENTCODE 
        WHERE ELEMENTSINSPECTION.DEMANDCODE='$Demand' $pack ORDER BY ITXVIEWINSPECTPACKING.ELEMENTSINSPECTIONELEMENTCODE ASC";
        $stmt2=db2_exec($conn1,$sqldtl, array('cursor'=>DB2_SCROLLABLE));
        while($rowdtl = db2_fetch_assoc($stmt2)){
                //DEFECT
                $def=explode(",",$rowdtl['DEFECT']);
                $valdef1=explode(":",$def[0]);
                $valdef2=explode(":",$def[1]);
                $valdef3=explode(":",$def[2]);
                $valdef4=explode(":",$def[3]);
                $valdef5=explode(":",$def[4]);
                $valdef6=explode(":",$def[5]);
                $valdef7=explode(":",$def[6]);
                $valdef8=explode(":",$def[7]);
                $valdef9=explode(":",$def[8]);
                $valdef10=explode(":",$def[9]);
                $valdef11=explode(":",$def[10]);
                $valdef12=explode(":",$def[11]);
                $valdef13=explode(":",$def[12]);
                $valdef14=explode(":",$def[13]);
                $valdef15=explode(":",$def[14]);
                if($valdef1[0]=="1"){ $def1=$valdef1[1];}else{$def1="";}
                if($valdef2[0]=="2"){ $def2=$valdef2[1];}else{$def2="";}
                if($valdef3[0]=="3"){ $def3=$valdef3[1];}else{$def3="";}
                if($valdef4[0]=="4"){ $def4=$valdef4[1];}else{$def4="";}
                if($valdef5[0]=="5"){ $def5=$valdef5[1];}else{$def5="";}
                if($valdef6[0]=="6"){ $def6=$valdef6[1];}else{$def6="";}
                if($valdef7[0]=="7"){ $def7=$valdef7[1];}else{$def7="";}
                if($valdef8[0]=="8"){ $def8=$valdef8[1];}else{$def8="";}
                if($valdef9[0]=="9"){ $def9=$valdef9[1];}else{$def9="";}
                if($valdef10[0]=="10"){ $def10=$valdef10[1];}else{$def10="";}
                if($valdef11[0]=="11"){ $def11=$valdef11[1];}else{$def11="";}
                if($valdef12[0]=="12"){ $def12=$valdef12[1];}else{$def12="";}
                if($valdef13[0]=="13"){ $def13=$valdef13[1];}else{$def13="";}
                if($valdef14[0]=="14"){ $def14=$valdef14[1];}else{$def14="";}
                if($valdef15[0]=="15"){ $def15=$valdef15[1];}else{$def15="";}
                //POSITIONL
                $posnl=explode(",",$rowdtl['POSITIONL']);
                $valposnl1=explode(":",$posnl[0]);
                $valposnl2=explode(":",$posnl[1]);
                $valposnl3=explode(":",$posnl[2]);
                $valposnl4=explode(":",$posnl[3]);
                $valposnl5=explode(":",$posnl[4]);
                $valposnl6=explode(":",$posnl[5]);
                $valposnl7=explode(":",$posnl[6]);
                $valposnl8=explode(":",$posnl[7]);
                $valposnl9=explode(":",$posnl[8]);
                $valposnl10=explode(":",$posnl[9]);
                $valposnl11=explode(":",$posnl[10]);
                $valposnl12=explode(":",$posnl[11]);
                $valposnl13=explode(":",$posnl[12]);
                $valposnl14=explode(":",$posnl[13]);
                $valposnl15=explode(":",$posnl[14]);
                if($valposnl1[0]=="1"){ $posnl1=$valposnl1[1];}else{$posnl1="";}
                if($valposnl2[0]=="2"){ $posnl2=$valposnl2[1];}else{$posnl2="";}
                if($valposnl3[0]=="3"){ $posnl3=$valposnl3[1];}else{$posnl3="";}
                if($valposnl4[0]=="4"){ $posnl4=$valposnl4[1];}else{$posnl4="";}
                if($valposnl5[0]=="5"){ $posnl5=$valposnl5[1];}else{$posnl5="";}
                if($valposnl6[0]=="6"){ $posnl6=$valposnl6[1];}else{$posnl6="";}
                if($valposnl7[0]=="7"){ $posnl7=$valposnl7[1];}else{$posnl7="";}
                if($valposnl8[0]=="8"){ $posnl8=$valposnl8[1];}else{$posnl8="";}
                if($valposnl9[0]=="9"){ $posnl9=$valposnl9[1];}else{$posnl9="";}
                if($valposnl10[0]=="10"){ $posnl10=$valposnl10[1];}else{$posnl10="";}
                if($valposnl11[0]=="11"){ $posnl11=$valposnl11[1];}else{$posnl11="";}
                if($valposnl12[0]=="12"){ $posnl12=$valposnl12[1];}else{$posnl12="";}
                if($valposnl13[0]=="13"){ $posnl13=$valposnl13[1];}else{$posnl13="";}
                if($valposnl14[0]=="14"){ $posnl14=$valposnl14[1];}else{$posnl14="";}
                if($valposnl15[0]=="15"){ $posnl15=$valposnl15[1];}else{$posnl15="";}
                //POSITIONW
                $posnw=explode(",",$rowdtl['POSITIONW']);
                $valposnw1=explode(":",$posnw[0]);
                $valposnw2=explode(":",$posnw[1]);
                $valposnw3=explode(":",$posnw[2]);
                $valposnw4=explode(":",$posnw[3]);
                $valposnw5=explode(":",$posnw[4]);
                $valposnw6=explode(":",$posnw[5]);
                $valposnw7=explode(":",$posnw[6]);
                $valposnw8=explode(":",$posnw[7]);
                $valposnw9=explode(":",$posnw[8]);
                $valposnw10=explode(":",$posnw[9]);
                $valposnw11=explode(":",$posnw[10]);
                $valposnw12=explode(":",$posnw[11]);
                $valposnw13=explode(":",$posnw[12]);
                $valposnw14=explode(":",$posnw[13]);
                $valposnw15=explode(":",$posnw[14]);
                if($valposnw1[0]=="1"){ $posnw1=$valposnw1[1];}else{$posnw1="";}
                if($valposnw2[0]=="2"){ $posnw2=$valposnw2[1];}else{$posnw2="";}
                if($valposnw3[0]=="3"){ $posnw3=$valposnw3[1];}else{$posnw3="";}
                if($valposnw4[0]=="4"){ $posnw4=$valposnw4[1];}else{$posnw4="";}
                if($valposnw5[0]=="5"){ $posnw5=$valposnw5[1];}else{$posnw5="";}
                if($valposnw6[0]=="6"){ $posnw6=$valposnw6[1];}else{$posnw6="";}
                if($valposnw7[0]=="7"){ $posnw7=$valposnw7[1];}else{$posnw7="";}
                if($valposnw8[0]=="8"){ $posnw8=$valposnw8[1];}else{$posnw8="";}
                if($valposnw9[0]=="9"){ $posnw9=$valposnw9[1];}else{$posnw9="";}
                if($valposnw10[0]=="10"){ $posnw10=$valposnw10[1];}else{$posnw10="";}
                if($valposnw11[0]=="11"){ $posnw11=$valposnw11[1];}else{$posnw11="";}
                if($valposnw12[0]=="12"){ $posnw12=$valposnw12[1];}else{$posnw12="";}
                if($valposnw13[0]=="13"){ $posnw13=$valposnw13[1];}else{$posnw13="";}
                if($valposnw14[0]=="14"){ $posnw14=$valposnw14[1];}else{$posnw14="";}
                if($valposnw15[0]=="15"){ $posnw15=$valposnw15[1];}else{$posnw15="";}
                //POINT
                $poin=explode(",",$rowdtl['POINT']);
                $valpoin1=explode(":",$poin[0]);
                $valpoin2=explode(":",$poin[1]);
                $valpoin3=explode(":",$poin[2]);
                $valpoin4=explode(":",$poin[3]);
                $valpoin5=explode(":",$poin[4]);
                $valpoin6=explode(":",$poin[5]);
                $valpoin7=explode(":",$poin[6]);
                $valpoin8=explode(":",$poin[7]);
                $valpoin9=explode(":",$poin[8]);
                $valpoin10=explode(":",$poin[9]);
                $valpoin11=explode(":",$poin[10]);
                $valpoin12=explode(":",$poin[11]);
                $valpoin13=explode(":",$poin[12]);
                $valpoin14=explode(":",$poin[13]);
                $valpoin15=explode(":",$poin[14]);
                if($valpoin1[0]=="1"){ $poin1=$valpoin1[1];}else{$poin1=0;}
                if($valpoin2[0]=="2"){ $poin2=$valpoin2[1];}else{$poin2=0;}
                if($valpoin3[0]=="3"){ $poin3=$valpoin3[1];}else{$poin3=0;}
                if($valpoin4[0]=="4"){ $poin4=$valpoin4[1];}else{$poin4=0;}
                if($valpoin5[0]=="5"){ $poin5=$valpoin5[1];}else{$poin5=0;}
                if($valpoin6[0]=="6"){ $poin6=$valpoin6[1];}else{$poin6=0;}
                if($valpoin7[0]=="7"){ $poin7=$valpoin7[1];}else{$poin7=0;}
                if($valpoin8[0]=="8"){ $poin8=$valpoin8[1];}else{$poin8=0;}
                if($valpoin9[0]=="9"){ $poin9=$valpoin9[1];}else{$poin9=0;}
                if($valpoin10[0]=="10"){ $poin10=$valpoin10[1];}else{$poin10=0;}
                if($valpoin11[0]=="11"){ $poin11=$valpoin11[1];}else{$poin11=0;}
                if($valpoin12[0]=="12"){ $poin12=$valpoin12[1];}else{$poin12=0;}
                if($valpoin13[0]=="13"){ $poin13=$valpoin13[1];}else{$poin13=0;}
                if($valpoin14[0]=="14"){ $poin14=$valpoin14[1];}else{$poin14=0;}
                if($valpoin15[0]=="15"){ $poin15=$valpoin15[1];}else{$poin15=0;}
                //TOTAL POINT
                $totalpoin=(int)$poin1+(int)$poin2+(int)$poin3+(int)$poin4+(int)$poin5+(int)$poin6+(int)$poin7+(int)$poin8+(int)$poin9+(int)$poin10+(int)$poin11+(int)$poin12+(int)$poin13+(int)$poin14+(int)$poin15;
                //POIN 100
                if($rowdtl['VALUEDECIMAL']!=0){$poin100=$totalpoin/$rowdtl['VALUEDECIMAL'] * 100;}else{$poin100=0;}
                //GRADING
                if($poin100 <= $ketgrade){$grading="A";}
                else if(($poin100 > $ketgrade) AND $poin100 <= 30){$grading="B";}
                else if($poin100 > 30){$grading="C";}
                //TOTAL CREDIT
                $totalcredit=$totalpoin * $extra;

                //COMMENT
                $sqlcmt="SELECT 
                ADSTORAGE.UNIQUEID,
                ADSTORAGE.VALUESTRING 
                FROM ADSTORAGE ADSTORAGE
                WHERE ADSTORAGE.NAMENAME ='Note' AND ADSTORAGE.UNIQUEID ='$rowdtl[ABSUNIQUEID]'";
                $stmt3=db2_exec($conn1,$sqlcmt, array('cursor'=>DB2_SCROLLABLE));
                $rowcmt = db2_fetch_assoc($stmt3);

                //GSM
                $sqlgsm="SELECT 
                ADSTORAGE.UNIQUEID,
                ADSTORAGE.VALUEDECIMAL 
                FROM ADSTORAGE ADSTORAGE
                WHERE ADSTORAGE.NAMENAME ='GSM' AND ADSTORAGE.UNIQUEID ='$rowdtl[ABSUNIQUEID]'";
                $stmt4=db2_exec($conn1,$sqlgsm, array('cursor'=>DB2_SCROLLABLE));
                $rowgsm = db2_fetch_assoc($stmt4);
        ?>
        <tr>
                <td width ="10%" colspan="2" align="center"><font size="-1"><?php echo substr($rowdtl['ELEMENTSINSPECTIONELEMENTCODE'],10,3);?></font></td>
                <td width ="8%" align="left"><font size="-2">Defect</font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def1=="001"){echo "-";}else{echo $def1;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def2=="001"){echo "-";}else{echo $def2;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def3=="001"){echo "-";}else{echo $def3;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def4=="001"){echo "-";}else{echo $def4;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def5=="001"){echo "-";}else{echo $def5;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def6=="001"){echo "-";}else{echo $def6;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def7=="001"){echo "-";}else{echo $def7;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def8=="001"){echo "-";}else{echo $def8;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def9=="001"){echo "-";}else{echo $def9;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def10=="001"){echo "-";}else{echo $def10;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def11=="001"){echo "-";}else{echo $def11;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def12=="001"){echo "-";}else{echo $def12;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def13=="001"){echo "-";}else{echo $def13;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def14=="001"){echo "-";}else{echo $def14;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def15=="001"){echo "-";}else{echo $def15;}?></font></td>
                <td width ="3%" colspan ="2" align="center"><font size="-2"><?php if($extra==0.125 AND ($grading=="A" OR $grading=="B" OR $grading=="C")){echo $tcredit=number_format($totalcredit,3);}
                                                                                                else if($extra==0.20 AND ($grading=="B" OR $grading=="C")){echo $tcredit=number_format($totalcredit,3);}
                                                                                                else if($extra==0.25 AND ($grading=="B" OR $grading=="C")){echo $tcredit=number_format($totalcredit,3);}
                                                                                                else if($extra==0.35 AND ($grading=="B" OR $grading=="C")){echo $tcredit=number_format($totalcredit,3);}
                                                                                                else{echo $tcredit=number_format(0,3);}?></font></td>
                <td width ="3%" colspan ="2" align="center"><font size="-2"><?php echo $grading;?></font></td>
                <td width ="3%" colspan ="2" align="center"><font size="-2"><?php echo number_format($rowdtl['WIDTHNET'],2);?></font></td>
                <td width ="12%" rowspan="2" align="center" style="font-size:7px;">&nbsp;</td>
        </tr>
        <tr>
                <td width ="5%" align="center"><font size="-1"><?php if($rowdtl['VALUEDECIMAL']!=""){echo number_format($rowdtl['VALUEDECIMAL'],2);}else{}?></font></td>
                <td width ="5%" align="center"><font size="-1"><?php if($rowdtl['WEIGHTNET']!=""){echo number_format($rowdtl['WEIGHTNET'],2);}else{}?></font></td>
                <td width ="8%" align="left"><font size="-2">Point</font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def1=="001" OR $poin1==".0000"){echo "-";}else{echo $poin1;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def2=="001" OR $poin2==".0000"){echo "-";}else{echo $poin2;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def3=="001" OR $poin3==".0000"){echo "-";}else{echo $poin3;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def4=="001" OR $poin4==".0000"){echo "-";}else{echo $poin4;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def5=="001" OR $poin5==".0000"){echo "-";}else{echo $poin5;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def6=="001" OR $poin6==".0000"){echo "-";}else{echo $poin6;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def7=="001" OR $poin7==".0000"){echo "-";}else{echo $poin7;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def8=="001" OR $poin8==".0000"){echo "-";}else{echo $poin8;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def9=="001" OR $poin9==".0000"){echo "-";}else{echo $poin9;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def10=="001" OR $poin10==".0000"){echo "-";}else{echo $poin10;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def11=="001" OR $poin11==".0000"){echo "-";}else{echo $poin11;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def12=="001" OR $poin12==".0000"){echo "-";}else{echo $poin12;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def13=="001" OR $poin13==".0000"){echo "-";}else{echo $poin13;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def14=="001" OR $poin14==".0000"){echo "-";}else{echo $poin14;}?></font></td>
                <td width ="2%" colspan="2" align="center"><font size="-2"><?php if($def15=="001" OR $poin15==".0000"){echo "-";}else{echo $poin15;}?></font></td>
                <td width ="3%" colspan ="2" align="center"><font size="-2"><?php echo $totalpoin;?></font></td>
                <td width ="3%" colspan ="2" align="center"><font size="-2"><?php echo number_format($poin100,2);?></font></td>
                <td width ="3%" colspan ="2" align="center"><font size="-2"><?php echo number_format($rowgsm['VALUEDECIMAL'],2);?></font></td>
        </tr>
        <tr>
                <td colspan="39" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
        </tr>
        <?php $sumpoin =$sumpoin+(int)$poin1+(int)$poin2+(int)$poin3+(int)$poin4+(int)$poin5+(int)$poin6+(int)$poin7+(int)$poin8+(int)$poin9+(int)$poin10+(int)$poin11+(int)$poin12+(int)$poin13+(int)$poin14+(int)$poin15;
               $sumlength = $sumlength+$rowdtl['VALUEDECIMAL'];
               $sumcredit = $sumcredit + $tcredit;
               } ?>
        </tbody>
        <br>
        <tr>
                <td align="center" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php echo number_format($sumlength,2);?></td>
                <td colspan="34" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td align="center" colspan="2" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php echo $sumpoin;?></td>
                <td colspan="2" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
        </tr>
        <tr>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td colspan="34" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td align="center" colspan="2" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php echo number_format($sumcredit,3);?></td>
                <td colspan="2" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
        <td><table width="100%" border="0" class="table-list1">
        <?php 
        //NOTE 1
        $sqln1="SELECT 
        PRODUCTIONDEMANDSTEPCOMMENT.PRODEMANDSTEPPRODEMANDCODE, 
        PRODUCTIONDEMANDSTEPCOMMENT.COMMENTTEXT 
        FROM PRODUCTIONDEMANDSTEPCOMMENT PRODUCTIONDEMANDSTEPCOMMENT WHERE 
        PRODUCTIONDEMANDSTEPCOMMENT.CODE ='PD001' AND PRODUCTIONDEMANDSTEPCOMMENT.PRODEMANDSTEPPRODEMANDCODE='$Demand'";
        $stmt5=db2_exec($conn1,$sqln1, array('cursor'=>DB2_SCROLLABLE));
        $rown1 = db2_fetch_assoc($stmt5);

        //NOTE 2
        $sqln2="SELECT 
        PRODUCTIONDEMANDSTEPCOMMENT.PRODEMANDSTEPPRODEMANDCODE, 
        PRODUCTIONDEMANDSTEPCOMMENT.COMMENTTEXT 
        FROM PRODUCTIONDEMANDSTEPCOMMENT PRODUCTIONDEMANDSTEPCOMMENT WHERE 
        PRODUCTIONDEMANDSTEPCOMMENT.CODE ='PD002' AND PRODUCTIONDEMANDSTEPCOMMENT.PRODEMANDSTEPPRODEMANDCODE='$Demand'";
        $stmt6=db2_exec($conn1,$sqln2, array('cursor'=>DB2_SCROLLABLE));
        $rown2 = db2_fetch_assoc($stmt6);
        ?>
        <tr>
                <td align="left" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">NOTE :</td>
        </tr>
        <tr>
                <td align="left" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php echo $rown1['COMMENTTEXT'];?></td>
        </tr>
        <br>
        <tr>
                <td align="left" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php echo $rown2['COMMENTTEXT'];?></td>
        </tr>
        </table></td>
    </tr>
    
</table>
<hr size="5px">
<table width="100%" border="0" class="table-list1">
        <?php 
        $sqlop="SELECT 
        LISTAGG(DISTINCT(TRIM(ELEMENTSINSPECTION.OPERATORCODE)),'+') AS OPERATORCODE,
        LISTAGG(DISTINCT(TRIM(INITIALS.LONGDESCRIPTION)),'+') AS LONGDESCRIPTION
        FROM 
        ELEMENTSINSPECTION ELEMENTSINSPECTION
        LEFT JOIN INITIALS INITIALS ON ELEMENTSINSPECTION.OPERATORCODE = INITIALS.CODE
        WHERE ELEMENTSINSPECTION.DEMANDCODE ='$Demand' AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13";
        $stmt7=db2_exec($conn1,$sqlop, array('cursor'=>DB2_SCROLLABLE));
        $rowop = db2_fetch_assoc($stmt7);
        ?>
        <tr>
                <td width="10%" align="right" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">SPV/ASST</td>
                <td width="3%" align="center" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">:</td>
                <td width="15%" align="center" style="border-top:0px #000000 solid; 
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"></td>
                <td width="10%" align="center" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                 <td width="10%" align="right" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">INSPECTOR</td>
                <td width="3%" align="center" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">:</td>
                <td width="15%" align="center" style="border-top:0px #000000 solid; 
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php echo $rowop['LONGDESCRIPTION'];?></td>
        </tr>
        <tr>
                <td width="10%" align="right" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">MANAGER/ASST</td>
                <td width="3%" align="center" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">:</td>
                <td width="15%" align="center" style="border-top:0px #000000 solid; 
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"></td>
                <td width="10%" align="center" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                 <td width="10%" align="right" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">LEAD</td>
                <td width="3%" align="center" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">:</td>
                <td width="15%" align="center" style="border-top:0px #000000 solid; 
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
        </tr>
</table>

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>