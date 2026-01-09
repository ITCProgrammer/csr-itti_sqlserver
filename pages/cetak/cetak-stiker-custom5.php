<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
include_once "../bar128.php";
//--
$demand=$_GET['demand'];
//-
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <link href="styles_cetak.css" rel="stylesheet" type="text/css"> -->
<title>Cetak Stiker Custom</title>
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
body,td,th {
  /*font-family: Courier New, Courier, monospace; */
	font-family:sans-serif, Roman, serif;
}
body{
	margin:5px 15px 5px 15px;
	padding:2px;
	font-size:12px;
	color:#333;
	width:98%;
	background-position:top;
	background-color:#fff;
}
.table-list1 {
	clear: both;
	text-align: left;
  border-spacing:0;
	border-collapse: collapse;
	margin: 0px 0px 0px 0px;
	background:#fff;	
}
.table-list1 td {
	color: #333;
	font-size:12px;
	border-color: #fff;
	border-collapse: collapse;
	vertical-align: center;
	padding: 0px 2px;
	border-bottom:1px #000000 solid;
	border-top:1px #000000 solid;
	border-left:1px #000000 solid;
	border-right:1px #000000 solid;
}

.hurufvertical {
  writing-mode:tb-rl;
    -webkit-transform:rotate(-90deg);
    -moz-transform:rotate(-90deg);
    -o-transform: rotate(-90deg);
    -ms-transform:rotate(-90deg);
    transform: rotate(-90deg);
  padding: 0;
  margin: 0;
}	

input{
text-align:center;
border:hidden;
font-size: 9px;	
font-family:sans-serif, Roman, serif;	
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
  .header {display:block}
  table thead 
   {
    display: table-header-group;
   }
}	
</style>	
</head>
<?php 
$nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");	
?>
<?php
    $element=$_GET['elements'];
	if($element!='') {
        //Create the barcode
		$img	=	code128BarCode($element, 1);
        //Start output buffer to capture the image
        //Output PNG image
		ob_start();
		imagepng($img);
        //Get the image from the output buffer
		$output_img		=	ob_get_clean();
	}
?>
<?php 
$sqlDB2="SELECT 
A.CODE AS DEMANDNO, 
TRIM(B.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE,
TRIM(F.LEGALNAME1) AS LEGALNAME1, 
TRIM(C.BUYER) AS BUYER,
CASE
	WHEN C.PO_HEADER IS NULL THEN C.PO_LINE
	ELSE C.PO_HEADER
END AS PO_NUMBER,
CASE
	WHEN C.STYLE_HEADER IS NULL THEN C.STYLE_LINE
	ELSE C.STYLE_HEADER
END AS DATA_STYLE,
TRIM(C.SALESORDERCODE) AS SALESORDERCODE,
C.QTY_ORDER,
C.QTY_PANJANG_ORDER_UOM,
C.QTY_PANJANG_ORDER,
C.QTY_PANJANG_ORDER_SCND_UOM,
TRIM(C.NO_ITEM) AS NO_ITEM,
TRIM(A.SUBCODE02) AS SUBCODE02, 
TRIM(A.SUBCODE03) AS SUBCODE03,
TRIM(C.ITEMDESCRIPTION) AS ITEMDESCRIPTION, 
PRODUCT.LONGDESCRIPTION AS JENIS_KAIN,
D.VALUEDECIMAL AS GRAMASI,
E.VALUEDECIMAL AS LEBAR,
C.DELIVERYDATE, 
C.ABSUNIQUEID,
TRIM(A.SUBCODE05) AS NO_WARNA, 
ITXVIEWCOLOR.WARNA,
H.COLORPFD
FROM PRODUCTIONDEMAND A 
LEFT JOIN 
	(SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE, PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE FROM 
	PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
	GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) B
ON A.CODE=B.PRODUCTIONDEMANDCODE
LEFT JOIN 
	(SELECT SALESORDER.ORDERPARTNERBRANDCODE, SALESORDER.EXTERNALREFERENCE AS PO_HEADER, SALESORDER.INTERNALREFERENCE AS STYLE_HEADER, SALESORDERLINE.SALESORDERCODE, SALESORDERLINE.ORDERLINE, SALESORDERLINE.EXTERNALREFERENCE AS PO_LINE, SALESORDERLINE.INTERNALREFERENCE AS STYLE_LINE,
	SALESORDERLINE.ITEMDESCRIPTION, SALESORDERLINE.SUBCODE03, SALESORDERLINE.SUBCODE05, SUM(SALESORDERLINE.BASEPRIMARYQUANTITY) AS QTY_ORDER, SUM(SALESORDERLINE.BASESECONDARYQUANTITY) AS QTY_PANJANG_ORDER, SALESORDERLINE.BASEPRIMARYUOMCODE AS QTY_PANJANG_ORDER_UOM,
	SALESORDERLINE.BASESECONDARYUOMCODE AS QTY_PANJANG_ORDER_SCND_UOM, SALESORDERLINE.CREATIONUSER, SALESORDERDELIVERY.DELIVERYDATE, SALESORDERLINE.ABSUNIQUEID, ITXVIEWORDERITEMLINKACTIVE.LONGDESCRIPTION AS NO_ITEM, ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER
	FROM SALESORDER SALESORDER
	LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESORDER.CODE=SALESORDERLINE.SALESORDERCODE 
	LEFT JOIN SALESORDERDELIVERY SALESORDERDELIVERY ON SALESORDERLINE.SALESORDERCODE=SALESORDERDELIVERY.SALESORDERLINESALESORDERCODE AND SALESORDERLINE.ORDERLINE=SALESORDERDELIVERY.SALESORDERLINEORDERLINE
	LEFT JOIN ITXVIEWORDERITEMLINKACTIVE ITXVIEWORDERITEMLINKACTIVE ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ITXVIEWORDERITEMLINKACTIVE.ORDPRNCUSTOMERSUPPLIERCODE AND SALESORDERLINE.ITEMTYPEAFICODE= ITXVIEWORDERITEMLINKACTIVE.ITEMTYPEAFICODE AND 
	SALESORDERLINE.SUBCODE01 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE01 AND SALESORDERLINE.SUBCODE02 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE02 AND SALESORDERLINE.SUBCODE03 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE03 AND
	SALESORDERLINE.SUBCODE04 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE04 AND SALESORDERLINE.SUBCODE05 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE05 AND SALESORDERLINE.SUBCODE06 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE06 AND 
	SALESORDERLINE.SUBCODE07 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE07 AND SALESORDERLINE.SUBCODE08 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE08 AND SALESORDERLINE.SUBCODE09 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE09 AND 
	SALESORDERLINE.SUBCODE10 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE10
	LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND 
	ON SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE AND SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE 
	GROUP BY SALESORDER.ORDERPARTNERBRANDCODE, SALESORDER.EXTERNALREFERENCE, SALESORDER.INTERNALREFERENCE, SALESORDERLINE.SALESORDERCODE, SALESORDERLINE.ORDERLINE, SALESORDERLINE.EXTERNALREFERENCE, SALESORDERLINE.INTERNALREFERENCE, SALESORDERLINE.ITEMDESCRIPTION, SALESORDERLINE.SUBCODE03, SALESORDERLINE.SUBCODE05,
	SALESORDERLINE.BASEPRIMARYUOMCODE,SALESORDERLINE.BASESECONDARYUOMCODE, SALESORDERLINE.CREATIONUSER, SALESORDERDELIVERY.DELIVERYDATE, SALESORDERLINE.ABSUNIQUEID, ITXVIEWORDERITEMLINKACTIVE.LONGDESCRIPTION, ORDERPARTNERBRAND.LONGDESCRIPTION) C
ON A.ORIGDLVSALORDLINESALORDERCODE = C.SALESORDERCODE AND A.SUBCODE03 = C.SUBCODE03 AND A.ORIGDLVSALORDERLINEORDERLINE = C.ORDERLINE
LEFT JOIN
	(SELECT PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10,  
	ADSTORAGE.VALUEDECIMAL
	FROM PRODUCT PRODUCT LEFT JOIN ADSTORAGE ADSTORAGE ON PRODUCT.ABSUNIQUEID=ADSTORAGE.UNIQUEID
	WHERE ADSTORAGE.NAMENAME ='GSM'
	GROUP BY PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10, ADSTORAGE.VALUEDECIMAL) D
ON A.SUBCODE01=D.SUBCODE01 AND
A.SUBCODE02=D.SUBCODE02 AND
A.SUBCODE03=D.SUBCODE03 AND 
A.SUBCODE04=D.SUBCODE04 AND
A.SUBCODE05=D.SUBCODE05 AND 
A.SUBCODE06=D.SUBCODE06 AND 
A.SUBCODE07=D.SUBCODE07 AND 
A.SUBCODE08=D.SUBCODE08 AND 
A.SUBCODE09=D.SUBCODE09 AND 
A.SUBCODE10=D.SUBCODE10
LEFT JOIN
	(SELECT PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10,  
	ADSTORAGE.VALUEDECIMAL
	FROM PRODUCT PRODUCT LEFT JOIN ADSTORAGE ADSTORAGE ON PRODUCT.ABSUNIQUEID=ADSTORAGE.UNIQUEID
	WHERE ADSTORAGE.NAMENAME ='Width'
	GROUP BY PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10,ADSTORAGE.VALUEDECIMAL) E
ON A.SUBCODE01=E.SUBCODE01 AND
A.SUBCODE02=E.SUBCODE02 AND
A.SUBCODE03=E.SUBCODE03 AND 
A.SUBCODE04=E.SUBCODE04 AND
A.SUBCODE05=E.SUBCODE05 AND 
A.SUBCODE06=E.SUBCODE06 AND 
A.SUBCODE07=E.SUBCODE07 AND 
A.SUBCODE08=E.SUBCODE08 AND 
A.SUBCODE09=E.SUBCODE09 AND 
A.SUBCODE10=E.SUBCODE10
LEFT JOIN
	(SELECT BUSINESSPARTNER.LEGALNAME1,ORDERPARTNER.CUSTOMERSUPPLIERCODE FROM BUSINESSPARTNER BUSINESSPARTNER 
	LEFT JOIN ORDERPARTNER ORDERPARTNER ON BUSINESSPARTNER.NUMBERID=ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID) F
ON A.CUSTOMERCODE=F.CUSTOMERSUPPLIERCODE
LEFT JOIN ITXVIEWCOLOR ITXVIEWCOLOR ON 
A.ITEMTYPEAFICODE = ITXVIEWCOLOR.ITEMTYPECODE AND 
A.SUBCODE01=ITXVIEWCOLOR.SUBCODE01 AND
A.SUBCODE02=ITXVIEWCOLOR.SUBCODE02 AND
A.SUBCODE03=ITXVIEWCOLOR.SUBCODE03 AND 
A.SUBCODE04=ITXVIEWCOLOR.SUBCODE04 AND
A.SUBCODE05=ITXVIEWCOLOR.SUBCODE05 AND 
A.SUBCODE06=ITXVIEWCOLOR.SUBCODE06 AND 
A.SUBCODE07=ITXVIEWCOLOR.SUBCODE07 AND 
A.SUBCODE08=ITXVIEWCOLOR.SUBCODE08 AND 
A.SUBCODE09=ITXVIEWCOLOR.SUBCODE09 AND 
A.SUBCODE10=ITXVIEWCOLOR.SUBCODE10
LEFT JOIN 
	(SELECT ADSTORAGE.UNIQUEID, ADSTORAGE.VALUESTRING AS COLORPFD FROM ADSTORAGE ADSTORAGE WHERE TRIM(ADSTORAGE.NAMENAME)='ColorPFD') H 
ON C.ABSUNIQUEID=H.UNIQUEID
LEFT JOIN PRODUCT PRODUCT ON 
A.ITEMTYPEAFICODE = PRODUCT.ITEMTYPECODE AND 
A.SUBCODE01=PRODUCT.SUBCODE01 AND
A.SUBCODE02=PRODUCT.SUBCODE02 AND
A.SUBCODE03=PRODUCT.SUBCODE03 AND 
A.SUBCODE04=PRODUCT.SUBCODE04 AND
A.SUBCODE05=PRODUCT.SUBCODE05 AND 
A.SUBCODE06=PRODUCT.SUBCODE06 AND 
A.SUBCODE07=PRODUCT.SUBCODE07 AND 
A.SUBCODE08=PRODUCT.SUBCODE08 AND 
A.SUBCODE09=PRODUCT.SUBCODE09 AND 
A.SUBCODE10=PRODUCT.SUBCODE10
WHERE A.CODE='$demand'";
$stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
$cekdb2= db2_num_rows($stmt);
$rowdb2 = db2_fetch_assoc($stmt);
//GRAMASI
$posg=strpos($rowdb2['GRAMASI'],".");
$valgramasi=substr($rowdb2['GRAMASI'],0,$posg);
//LEBAR
$posl=strpos($rowdb2['LEBAR'],".");
$vallebar=substr($rowdb2['LEBAR'],0,$posl);
?>
<body>
<table border="0" style="width:4.39in; height:3.20in">
  <thead>
    <tr>
      <td><table border="0" class="table-list1" style="width:4.39in" > 
      <tr>
        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php
                  include "../../phpqrcode/qrlib.php"; 
                  $tempdir1 = "../../temp/"; //Nama folder tempat menyimpan file qrcode
                  if (!file_exists($tempdir1)) //Buat folder bername temp
                  mkdir($tempdir1);

                  //isi qrcode jika di scan
                  $codeContents1 = $_GET['elements']."+".$rowdb2['PO_NUMBER']."+134001+".$_GET['lotcode']."+".$awalkg.".".$akhirkg."+".$rowdb2['NO_ORDER'];
                  //nama file qrcode yang akan disimpan
                  $namaFile1=$_GET['elements'].".png";
                  //ECC Level
                  $level1=QR_ECLEVEL_H;
                  //Ukuran pixel
                  $UkuranPixel1=1; //10
                  //Ukuran frame
                  $UkuranFrame1=1; //4

                  QRcode::png($codeContents1, $tempdir1.$namaFile1, $level1, $UkuranPixel1, $UkuranFrame1); 

                  echo '<img src="'.$tempdir1.$namaFile1.'" />';  

              ?></td>
        
        <!-- <td width="13%" align="left" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td> -->
        <td colspan="2" width="10%" align="right" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><img src="logo1.jpg" width="30" height="30" alt=""/></td>
        <td width="40%" align="center" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><strong><font size="+1">PT INDO TAICHEN</font> <br> TEXTILE INDUSTRY
        </strong></td>
        <td width="15%" align="center" valign="bottom" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:8px;">NOWQCF</td>
    </tr>
  </table></td>
  </tr>
	</thead>
  <tbody>
    <tr>
      <td> 
        <table border="0" style="width:4.39in;">
            <tr>
              <td width="8%" rowspan="6" valign="middle" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;" ><?php if($_GET['elements']!='') echo '<img src="../../php-barcode-master/barcode.php?text='.$_GET['elements'].'&codetype=code128&orientation=vertical&size=40" />'; ?></td>
                <td colspan="2" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><strong><?php echo $rowdb2['LEGALNAME1']."/".$rowdb2['BUYER'];?></strong> <br> <strong><font size="+0.5"><?php echo $rowdb2['PO_NUMBER'];?></font></strong></td>
                <td colspan="4" align="right" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:13px;"><strong><?php echo $rowdb2['SALESORDERCODE'];?></strong><br> <strong><?php if($rowdb2['NO_ITEM']!=""){echo $rowdb2['NO_ITEM'];}else{echo $rowdb2['SUBCODE02'].''.$rowdb2['SUBCODE03'];}?></strong></td>
                
                <!-- <td width="13%" align="center" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">
                <?php
                  echo '<img src="'.$tempdir1.$namaFile1.'" />';  

              ?></td> -->
            </tr>
            <tr>
              <td colspan="2" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><?php echo $rowdb2['JENIS_KAIN'];?></td>
                <td colspan="4" align="right" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:13px;"><strong><?php echo $rowdb2['WARNA'];?></strong></td>
                
                <!-- <td width="13%" align="center" rowspan="2" valign="bottom" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">
                <?php
                    echo '<img src="'.$tempdir1.$namaFile1.'" />'; 
                ?></td> -->
            </tr>
            <tr>
              <td colspan="2" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><?php echo $rowdb2['DATA_STYLE'];?></td>
                <td colspan="4" align="right" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:11px;"><?php echo $rowdb2['NO_WARNA'];?></td> 
                 
            </tr>
            <!-- <tr>
                 <td align="right" colspan="4" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><input style="text-align:right; font-size: 12px; font-weight:bold;" name="ket" type="text" placeholder="ketik" size="15" /></td>
                <td  colspan="2" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
            </tr> -->
            <tr>
              <td colspan="2" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><?php echo $vallebar.'" X '.$valgramasi." gr/m2";?> <br> <strong><font size="+1"><?php echo $rowdb2['PRODUCTIONORDERCODE'];?></strong><font> <br> <strong><font size="+1"><input style="text-align:left; font-size: 18px; font-weight:bold;" name="element" type="text" placeholder="Roll" size="5" /></strong><font></td>
                <td colspan="4" align="right" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:18px;"><input style="font-size: 18px; font-weight:bold;" name="qtyyard" type="text" placeholder="Yard" size="3" /> <strong> Yard</strong><br> <input style="text-align:center; font-size: 18px; font-weight:bold;" name="qtykg" type="text" placeholder="Kg" size="5" /><strong> KGs</strong></td>
                <!-- <td width="13%" colspan="2" align="center" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">
                <?php
                    echo '<img src="'.$tempdir1.$namaFile1.'" />';   
                ?></td> -->
            </tr>
            <tr>
              <td colspan="2" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;">&nbsp;</td>
                <td colspan="3" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><input style="text-align:left; font-size: 15px; font-weight:bold;" name="ket" type="text" placeholder="ketik" size="25" /></td>
                <td width="9%" align="right" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:8px;"><strong><?php echo $rTgl['tgl_skrg']." ".$rTgl['jam_skrg'];?></strong></td> 

            </tr>
            <tr>
              <td colspan="2" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;">&nbsp;</td>
              <td colspan="3" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
              <td align="right" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:8px;">&nbsp;</td>
            </tr>
        </table>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>