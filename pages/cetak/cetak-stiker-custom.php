<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
include_once "../bar128.php";
//--
$lotcode=$_GET['lotcode'];
//-
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
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
	margin:15px 0px 25px 0px;
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
    transform: rotate(180deg);
    white-space:nowrap;
    float:left;
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
  .pagebreak { page-break-before:always; }
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
A.LOTCODE, 
C.PRODUCTIONDEMANDCODE AS DEMAND,
B.CODE AS NO_ORDER,
CASE
	WHEN B.PO_HEADER IS NULL THEN B.PO_LINE
	ELSE B.PO_HEADER
END AS PO_NUMBER,
B.ORDPRNCUSTOMERSUPPLIERCODE,
B.ORDERPARTNERBRANDCODE, 
B.LONGDESCRIPTION AS BUYER, 
B.LEGALNAME1 AS LANGGANAN, 
B.ITEMDESCRIPTION AS JENIS_KAIN,
G.NO_ITEM,
TRIM(A.DECOSUBCODE02) AS DECOSUBCODE02,
TRIM(A.DECOSUBCODE03) AS DECOSUBCODE03,
CASE
	WHEN B.STYLE_HEADER IS NULL THEN B.STYLE_LINE
	ELSE B.STYLE_HEADER
END AS STYL,
CASE
	WHEN A.DECOSUBCODE07 = '-' THEN D.COLOR
	WHEN A.DECOSUBCODE07 <> '-' OR A.DECOSUBCODE07 <> '' THEN E.COLOR_PRT
	WHEN A.ITEMTYPECODE = 'FKF' THEN F.COLOR_FKF
	ELSE ''
END AS WARNA,
TRIM(A.DECOSUBCODE05) AS NO_WARNA,
J.VALUEDECIMAL AS LEBAR,
I.VALUEDECIMAL AS GRAMASI
FROM BALANCE A 
LEFT JOIN 
(SELECT SALESORDER.CODE,SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE,SALESORDER.ORDERPARTNERBRANDCODE,ORDERPARTNERBRAND.LONGDESCRIPTION,BUSINESSPARTNER.LEGALNAME1,
SALESORDER.EXTERNALREFERENCE AS PO_HEADER,SALESORDERLINE.EXTERNALREFERENCE AS PO_LINE, 
SALESORDER.INTERNALREFERENCE AS STYLE_HEADER,SALESORDERLINE.INTERNALREFERENCE AS STYLE_LINE,
SALESORDERLINE.ITEMDESCRIPTION, 
SALESORDERLINE.ITEMTYPEAFICODE, SALESORDERLINE.SUBCODE01, SALESORDERLINE.SUBCODE02, SALESORDERLINE.SUBCODE03,
SALESORDERLINE.SUBCODE04, SALESORDERLINE.SUBCODE05, SALESORDERLINE.SUBCODE06, SALESORDERLINE.SUBCODE07,
SALESORDERLINE.SUBCODE08, SALESORDERLINE.SUBCODE09, SALESORDERLINE.SUBCODE10
FROM SALESORDER SALESORDER
LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESORDER.CODE = SALESORDERLINE.SALESORDERCODE
LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE AND SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE
LEFT JOIN ORDERPARTNER ORDERPARTNER ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNER.CUSTOMERSUPPLIERCODE
LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER ON ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID = BUSINESSPARTNER.NUMBERID
GROUP BY SALESORDER.CODE,SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE,SALESORDER.ORDERPARTNERBRANDCODE,ORDERPARTNERBRAND.LONGDESCRIPTION,
SALESORDER.EXTERNALREFERENCE,SALESORDER.INTERNALREFERENCE,SALESORDERLINE.EXTERNALREFERENCE,SALESORDERLINE.INTERNALREFERENCE,SALESORDERLINE.ITEMDESCRIPTION,BUSINESSPARTNER.LEGALNAME1,
SALESORDERLINE.ITEMTYPEAFICODE, SALESORDERLINE.SUBCODE01, SALESORDERLINE.SUBCODE02, SALESORDERLINE.SUBCODE03,
SALESORDERLINE.SUBCODE04, SALESORDERLINE.SUBCODE05, SALESORDERLINE.SUBCODE06, SALESORDERLINE.SUBCODE07,
SALESORDERLINE.SUBCODE08, SALESORDERLINE.SUBCODE09, SALESORDERLINE.SUBCODE10) B
ON A.PROJECTCODE = B.CODE AND 
A.ITEMTYPECODE = B.ITEMTYPEAFICODE AND 
A.DECOSUBCODE01 = B.SUBCODE01 AND
A.DECOSUBCODE02 = B.SUBCODE02 AND
A.DECOSUBCODE03 = B.SUBCODE03 AND
A.DECOSUBCODE04 = B.SUBCODE04 AND
A.DECOSUBCODE05 = B.SUBCODE05 AND
A.DECOSUBCODE06 = B.SUBCODE06 AND
A.DECOSUBCODE07 = B.SUBCODE07 AND
A.DECOSUBCODE08 = B.SUBCODE08 AND
A.DECOSUBCODE09 = B.SUBCODE09 AND
A.DECOSUBCODE10 = B.SUBCODE10
LEFT JOIN 
(SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE, PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE FROM 
PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) C
ON A.LOTCODE=C.PRODUCTIONORDERCODE
LEFT JOIN (
SELECT
	USERGENERICGROUP.CODE,
	USERGENERICGROUP.LONGDESCRIPTION AS COLOR
FROM
	USERGENERICGROUP USERGENERICGROUP
WHERE USERGENERICGROUP.USERGENERICGROUPTYPECODE='CL1') D ON
A.DECOSUBCODE05 = D.CODE
LEFT JOIN 
(SELECT DESIGN.SUBCODE01, DESIGNCOMPONENT.VARIANTCODE, DESIGNCOMPONENT.SHORTDESCRIPTION AS COLOR_PRT
FROM DESIGN DESIGN LEFT JOIN DESIGNCOMPONENT DESIGNCOMPONENT ON DESIGN.NUMBERID = DESIGNCOMPONENT.DESIGNNUMBERID AND 
DESIGN.SUBCODE01 = DESIGNCOMPONENT.DESIGNSUBCODE01) E
ON A.DECOSUBCODE07 = E.SUBCODE01 AND A.DECOSUBCODE08 = E.VARIANTCODE 
LEFT JOIN 
(SELECT PRODUCT.ITEMTYPECODE, PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
CASE 
	WHEN LOCATE('-', PRODUCT.SHORTDESCRIPTION) = 0 THEN ''
	WHEN LOCATE('-', PRODUCT.SHORTDESCRIPTION) > 0 THEN SUBSTR(PRODUCT.SHORTDESCRIPTION , 1, LOCATE('-', PRODUCT.SHORTDESCRIPTION)-1)
	ELSE ''
END AS COLOR_FKF
FROM PRODUCT PRODUCT WHERE PRODUCT.ITEMTYPECODE='FKF') F
ON A.ITEMTYPECODE = F.ITEMTYPECODE AND A.DECOSUBCODE01 = F.SUBCODE01 AND A.DECOSUBCODE02 = F.SUBCODE02 AND 
A.DECOSUBCODE03 = F.SUBCODE03 AND A.DECOSUBCODE04 = F.SUBCODE04 AND A.DECOSUBCODE05 = F.SUBCODE05
LEFT JOIN 
(SELECT 
ORDERITEMORDERPARTNERLINK.ORDPRNCUSTOMERSUPPLIERCODE,
ORDERITEMORDERPARTNERLINK.ITEMTYPEAFICODE,
ORDERITEMORDERPARTNERLINK.SUBCODE01,
ORDERITEMORDERPARTNERLINK.SUBCODE02,
ORDERITEMORDERPARTNERLINK.SUBCODE03,
ORDERITEMORDERPARTNERLINK.SUBCODE04,
ORDERITEMORDERPARTNERLINK.SUBCODE05,
ORDERITEMORDERPARTNERLINK.SUBCODE06,
ORDERITEMORDERPARTNERLINK.SUBCODE07,
ORDERITEMORDERPARTNERLINK.SUBCODE08,
ORDERITEMORDERPARTNERLINK.SUBCODE09,
ORDERITEMORDERPARTNERLINK.SUBCODE10,
ORDERITEMORDERPARTNERLINK.LONGDESCRIPTION AS NO_ITEM FROM ORDERITEMORDERPARTNERLINK ORDERITEMORDERPARTNERLINK) G 
ON B.ORDPRNCUSTOMERSUPPLIERCODE = G.ORDPRNCUSTOMERSUPPLIERCODE AND 
A.ITEMTYPECODE = G.ITEMTYPEAFICODE AND 
A.DECOSUBCODE01 = G.SUBCODE01 AND 
A.DECOSUBCODE02 = G.SUBCODE02 AND 
A.DECOSUBCODE03 = G.SUBCODE03 AND 
A.DECOSUBCODE04 = G.SUBCODE04 AND 
A.DECOSUBCODE05 = G.SUBCODE05 AND 
A.DECOSUBCODE06 = G.SUBCODE06 AND 
A.DECOSUBCODE07 = G.SUBCODE07 AND 
A.DECOSUBCODE08 = G.SUBCODE08 AND 
A.DECOSUBCODE09 = G.SUBCODE09 AND 
A.DECOSUBCODE10 = G.SUBCODE10
LEFT JOIN (
SELECT
	PRODUCT.SUBCODE01,
	PRODUCT.SUBCODE02,
	PRODUCT.SUBCODE03,
	PRODUCT.SUBCODE04,
	PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06,
	PRODUCT.SUBCODE07,
	PRODUCT.SUBCODE08,
	PRODUCT.SUBCODE09,
	PRODUCT.SUBCODE10,
	ADSTORAGE.VALUEDECIMAL
FROM
	PRODUCT PRODUCT
LEFT JOIN ADSTORAGE ADSTORAGE ON
	PRODUCT.ABSUNIQUEID = ADSTORAGE.UNIQUEID
WHERE
	ADSTORAGE.NAMENAME = 'GSM'
GROUP BY
	PRODUCT.SUBCODE01,
	PRODUCT.SUBCODE02,
	PRODUCT.SUBCODE03,
	PRODUCT.SUBCODE04,
	PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06,
	PRODUCT.SUBCODE07,
	PRODUCT.SUBCODE08,
	PRODUCT.SUBCODE09,
	PRODUCT.SUBCODE10,
	ADSTORAGE.VALUEDECIMAL) I 
ON A.DECOSUBCODE01 = I.SUBCODE01 AND 
A.DECOSUBCODE02 = I.SUBCODE02 AND 
A.DECOSUBCODE03 = I.SUBCODE03 AND 
A.DECOSUBCODE04 = I.SUBCODE04 AND 
A.DECOSUBCODE05 = I.SUBCODE05 AND 
A.DECOSUBCODE06 = I.SUBCODE06 AND 
A.DECOSUBCODE07 = I.SUBCODE07 AND 
A.DECOSUBCODE08 = I.SUBCODE08 AND 
A.DECOSUBCODE09 = I.SUBCODE09 AND 
A.DECOSUBCODE10 = I.SUBCODE10
LEFT JOIN (
SELECT
	PRODUCT.SUBCODE01,
	PRODUCT.SUBCODE02,
	PRODUCT.SUBCODE03,
	PRODUCT.SUBCODE04,
	PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06,
	PRODUCT.SUBCODE07,
	PRODUCT.SUBCODE08,
	PRODUCT.SUBCODE09,
	PRODUCT.SUBCODE10,
	ADSTORAGE.VALUEDECIMAL
FROM
	PRODUCT PRODUCT
LEFT JOIN ADSTORAGE ADSTORAGE ON
	PRODUCT.ABSUNIQUEID = ADSTORAGE.UNIQUEID
WHERE
	ADSTORAGE.NAMENAME = 'Width'
GROUP BY
	PRODUCT.SUBCODE01,
	PRODUCT.SUBCODE02,
	PRODUCT.SUBCODE03,
	PRODUCT.SUBCODE04,
	PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06,
	PRODUCT.SUBCODE07,
	PRODUCT.SUBCODE08,
	PRODUCT.SUBCODE09,
	PRODUCT.SUBCODE10,
	ADSTORAGE.VALUEDECIMAL) J ON 
A.DECOSUBCODE01 = J.SUBCODE01 AND 
A.DECOSUBCODE02 = J.SUBCODE02 AND 
A.DECOSUBCODE03 = J.SUBCODE03 AND 
A.DECOSUBCODE04 = J.SUBCODE04 AND 
A.DECOSUBCODE05 = J.SUBCODE05 AND 
A.DECOSUBCODE06 = J.SUBCODE06 AND 
A.DECOSUBCODE07 = J.SUBCODE07 AND 
A.DECOSUBCODE08 = J.SUBCODE08 AND 
A.DECOSUBCODE09 = J.SUBCODE09 AND 
A.DECOSUBCODE10 = J.SUBCODE10
WHERE TRIM(A.LOTCODE)='$lotcode' LIMIT 1";
$stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
$cekdb2= db2_num_rows($stmt);
$rowdb2 = db2_fetch_assoc($stmt);
$posg=strpos($rowdb2['GRAMASI'],".");
$valgramasi=substr($rowdb2['GRAMASI'],0,$posg);
$posl=strpos($rowdb2['LEBAR'],".");
$vallebar=substr($rowdb2['LEBAR'],0,$posl);
?>
<?php
					$sqlBL 	= "SELECT 
							STOCKTRANSACTION.ITEMELEMENTCODE,
							STOCKTRANSACTION.BASEPRIMARYQUANTITY,
							STOCKTRANSACTION.BASEPRIMARYUOMCODE,
							STOCKTRANSACTION.BASESECONDARYQUANTITY,
							STOCKTRANSACTION.BASESECONDARYUOMCODE,
							STOCKTRANSACTION.WHSLOCATIONWAREHOUSEZONECODE,
							STOCKTRANSACTION.WAREHOUSELOCATIONCODE,
              VARCHAR_FORMAT(STOCKTRANSACTION.CREATIONDATETIME, 'DD-MM-YYYY') AS TGL,
              STOCKTRANSACTION.QUALITYLEVELCODE
						FROM STOCKTRANSACTION STOCKTRANSACTION 
						WHERE STOCKTRANSACTION.ITEMELEMENTCODE  ='$_GET[elements]' AND STOCKTRANSACTION.DETAILTYPE ='0' AND STOCKTRANSACTION.LOGICALWAREHOUSECODE = 'M031'";
					$stmt2=db2_exec($conn1,$sqlBL, array('cursor'=>DB2_SCROLLABLE));
          $rowBL = db2_fetch_assoc($stmt2);
          $posyard=strpos($rowBL['BASESECONDARYQUANTITY'],".");
          $awalyard=substr($rowBL['BASESECONDARYQUANTITY'],0,$posyard);
          $akhiryard=substr($rowBL['BASESECONDARYQUANTITY'],$posyard+1,2);
          $poskg=strpos($rowBL['BASEPRIMARYQUANTITY'],".");
          $awalkg=substr($rowBL['BASEPRIMARYQUANTITY'],0,$poskg);
          $akhirkg=substr($rowBL['BASEPRIMARYQUANTITY'],$poskg+1,2);
							?>
<body>
<table border="0" style="width:4.39in; height:3.20in">
  <thead>
    <tr>
      <td><table border="1" class="table-list1" style="width:4.39in" > 
      <tr>
        <td width="13%" align="center" style="border-top:0px #000000 solid; 
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
        <td width="10%" align="right" style="border-top:0px #000000 solid; 
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
    <!-- <td >
        <table>
          <tr>
            <td colspan="2" width="10%" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php if($_GET['elements']!='') echo '<img class="hurufvertical" src="data:image/png;base64,' . base64_encode($output_img) . '" />'; ?></td>
          </tr>
        </table>
      </td> -->
    <tr class="hurufvertical">
        <td rowspan="4" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php if($_GET['elements']!='') echo '<img src="data:image/png;base64,' . base64_encode($output_img) . '" />'; ?></td>
    </tr>
    <tr>
      <td> 
        <table border="1" style="width:4.39in;">
            <tr>
                <td width="40%" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><strong><?php echo $rowdb2['LANGGANAN']."/".$rowdb2['BUYER'];?></strong> <br> <strong><?php echo $rowdb2['PO_NUMBER'];?></strong></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td align="right" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><strong><?php echo $rowdb2['NO_ORDER'];?></strong><br> <strong><?php if($rowdb2['NO_ITEM']!=""){echo $rowdb2['NO_ITEM'];}else{echo $rowdb2['DECOSUBCODE02'].''.$rowdb2['DECOSUBCODE03'];}?></strong></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td width="13%" align="center" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">
                <?php
                  echo '<img src="'.$tempdir1.$namaFile1.'" />';  

              ?></td>
            </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td> 
        <table border="1"  style="width:4.39in;">
            <tr>
                <!-- <td width="15%" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td> -->
                <td width="40%" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><?php echo $rowdb2['JENIS_KAIN'];?></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td align="right" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><?php echo $rowdb2['WARNA'];?></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td width="13%" align="center" rowspan="2" valign="bottom" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">
                <?php
                    echo '<img src="'.$tempdir1.$namaFile1.'" />'; 
                ?></td>
            </tr>
            <tr>
                <!-- <td width="15%" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td> -->
                <td width="40%" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><?php echo $rowdb2['STYL'];?></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td align="right" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:11px;"><?php echo $rowdb2['NO_WARNA'];?></td> 
                 <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
            </tr>
            <tr>
                 <td align="right" colspan="5" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><input style="text-align:right; font-size: 12px; font-weight:bold;" name="ket" type="text" placeholder="ketik" size="15" /></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
            </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td> 
        <table border="1" style="width:4.39in;">
            <tr>
                <!-- <td width="15%" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td> -->
                <td width="40%" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><?php echo $vallebar.'" X '.$valgramasi." gr/m2";?> <br> <strong><font size="+1"><?php echo $_GET['lotcode'];?></strong><font> <br> <strong><font size="+1"><?php echo substr($rowBL['ITEMELEMENTCODE'],8,5);?></strong><font></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td align="right" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:18px;"><input style="font-size: 18px; font-weight:bold;" value="<?php echo $awalyard.".".$akhiryard;?>" name="qtyyard" type="text" placeholder="" size="3" /> <strong><?php if($rowBL['BASESECONDARYUOMCODE']='yd'){echo " yard";}else if($rowBL['BASESECONDARYUOMCODE']='m'){echo " meter";}?></strong><br> <input style="text-align:center; font-size: 18px; font-weight:bold;" value="<?php echo $awalkg.".".$akhirkg;?>" name="qtykg" type="text" placeholder="" size="5" /><strong><?php echo $rowBL['BASEPRIMARYUOMCODE'];?></strong></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td width="13%" colspan="2" align="center" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">
                <?php
                    echo '<img src="'.$tempdir1.$namaFile1.'" />';   
                ?></td>
            </tr>
            <tr>
                <!-- <td width="15%" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td> -->
                <td width="40%" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><?php echo $rowBL['TGL'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GRADE <?php if($rowBL['QUALITYLEVELCODE']=='1'){echo "A";}else if($rowBL['QUALITYLEVELCODE']=='2'){echo "B";}else if($rowBL['QUALITYLEVELCODE']=='3'){echo "C";}else if($rowBL['QUALITYLEVELCODE']=='4'){echo "D";}?></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <!-- <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td> -->
                <td align="right" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:8px;"><strong><?php echo $rTgl['tgl_skrg']." ".$rTgl['jam_skrg'];?></strong></td> 
            </tr>
            <tr >
              <td width="100%" colspan="7" align="center" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:7px;">AVOID MIXING-UP DIFFERENT LOTS. ON QUALITY CONCERNS, PLS. INFORM <br> ITTI BEFORE CUTTING, OTHERWISE ITTI WILL NOT TAKE RESPONSIBILITY</td>
            </tr>
        </table>
      </td>
    </tr>
  </tbody>
</table>

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>