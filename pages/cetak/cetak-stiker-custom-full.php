<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
include_once "../bar128.php";

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
	margin:20px 0px 25px 0px;
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
    $element=$_POST['no_element'];
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
<body>
<table border="0" style="width:4.39in; height:3.20in">
  <thead>
    <tr>
      <td><table border="0" class="table-list1" style="width:4.39in" > 
      <tr>
        <td width="13%" align="left" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php
                  include "../../phpqrcode/qrlib.php"; 
                  $tempdir1 = "../../temp/"; //Nama folder tempat menyimpan file qrcode
                  if (!file_exists($tempdir1)) //Buat folder bername temp
                  mkdir($tempdir1);

                  //isi qrcode jika di scan
                  $codeContents1 = $element."+".$_POST['no_po']."+134001+".$_POST['lotcode']."+".$awalkg.".".$akhirkg."+".$_POST['no_order'];
                  //nama file qrcode yang akan disimpan
                  $namaFile1=$element.".png";
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
                border-right:0px #000000 solid; font-size:8px;">&nbsp;</td>
    </tr>
  </table></td>
  </tr>
	</thead>
  <tbody>
    <tr>
      <td> 
        <table border="0" style="width:4.39in;">
            <tr>
                <td rowspan="7" valign="middle"><?php if($element!='') echo '<img src="../../php-barcode-master/barcode.php?text='.$element.'&codetype=code128&orientation=vertical&size=40" />'; ?></td>
                <td width="40%" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><strong><?php echo $_POST['pelanggan'];?></strong> <br> <strong><?php echo $_POST['no_po'];?></strong></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td align="right" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><strong><?php echo $_POST['no_order'];?></strong><br> <strong><?php if($_POST['no_item']!=""){echo $_POST['no_item'];}else{echo $_POST['no_hanger'];}?></strong></td>
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
            <tr>
                <td width="40%" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><?php echo $_POST['jns_kain'];?></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td align="right" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><?php echo $_POST['warna'];?></td>
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
                border-right:0px #000000 solid; font-size:11px;"><?php echo $_POST['no_warna'];?></td> 
                 <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
            </tr>
            <tr>
                 <td align="left" colspan="4" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><input style="text-align:left; font-size: 12px; font-weight:bold;" name="ket" type="text" placeholder="ketik" size="25" /></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
            </tr>
            <tr>
                <td width="40%" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><?php echo $_POST['lebar'].'" X '.$_POST['grms']." gr/m2";?> <br> <strong><font size="+1"><?php echo $_POST['lotcode'];?></strong><font> <br> <strong><font size="+1"><?php echo substr($element,8,5);?></strong><font></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td align="right" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:18px;"><input style="text-align:right; font-size: 18px; font-weight:bold;" value="<?php echo $_POST['pjng'];?>" name="qtyyard" type="text" placeholder="" size="4" />
                <strong><?php if($rowBL['BASESECONDARYUOMCODE']='yd'){echo " yard";}else if($rowBL['BASESECONDARYUOMCODE']='m'){echo " meter";}?></strong><br> <input style="text-align:right; font-size: 18px; font-weight:bold;" value="<?php echo $_POST['kg'];?>" name="qtykg" type="text" placeholder="" size="7" /><strong><?php echo "Kgs";?></strong></td>
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
                <td width="40%" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:10px;"><?php echo $rowBL['TGL'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GRADE <?php echo $_POST['grade']; ?></td>
                <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">&nbsp;</td>
                <td align="right" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:8px;"><strong><?php echo $rTgl['tgl_skrg']." ".$rTgl['jam_skrg'];?></strong></td> 
            </tr>
            <tr >
              <td width="100%" colspan="7" align="center" valign="top" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid; font-size:6px;"><strong>AVOID MIXING-UP DIFFERENT LOTS. ON QUALITY CONCERNS, PLS. INFORM <br> ITTI BEFORE CUTTING, OTHERWISE ITTI WILL NOT TAKE RESPONSIBILITY</strong></td>
            </tr>
        </table>
      </td>
    </tr>
  </tbody>
</table>

<script>
</script> 
</body>
</html>