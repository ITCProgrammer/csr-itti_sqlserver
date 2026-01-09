<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
//$Dept=$_GET['dept'];
//$Cancel=$_GET['cancel'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%d-%b-%y') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Pilling Box</title>
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
   body {
        -webkit-print-color-adjust: exact !important; /* Chrome, Safari */
        color-adjust: exact !important; /*Firefox*/
   }
}	
</style>	
</head>
<body>
    <?php date_default_timezone_set('Asia/Jakarta');
    // $today = date("Y-m-d") ;
    // echo "BULAN : ".date("F Y", strtotime($today));
    echo 'PERIODE ' . $Awal . ' S/D ' . $Akhir;
    ?>
    <table width="100%" border="1" class="table-list1">
        <thead>
            <tr>
                <th rowspan="2" colspan="5" align="center">PILLING BOX</th>
                <th colspan="5" align="center">SHIFT A</th>
                <th colspan="5" align="center">SHIFT B</th>
                <th colspan="5" align="center">SHIFT C</th>
                <th rowspan="3" align="center">SUM GRADE</th>
            </tr>
            <tr>
                <th rowspan="2" align="center">ORDER</th>
                <th rowspan="2" align="center">COLOR</th>
                <th rowspan="2" align="center">GRADE</th>
                <th colspan="2" align="center">OPERATOR</th>
                <th rowspan="2" align="center">ORDER</th>
                <th rowspan="2" align="center">COLOR</th>
                <th rowspan="2" align="center">GRADE</th>
                <th colspan="2" align="center">OPERATOR</th>
                <th rowspan="2" align="center">ORDER</th>
                <th rowspan="2" align="center">COLOR</th>
                <th rowspan="2" align="center">GRADE</th>
                <th colspan="2" align="center">OPERATOR</th>
            </tr>
            <tr>
                <th align="center">ITEM</th>
                <th align="center">DESCRIPTION</th>
                <th align="center">BUYER</th>
                <th align="center">WIDTH</th>
                <th align="center">GSM</th>
                <th align="center">PREPARE</th>
                <th align="center">PREPARE</th>
                <th align="center">PREPARE</th>
                <th align="center">TESTING</th>
                <th align="center">TESTING</th>
                <th align="center">TESTING</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query=mysqli_query($con,"SELECT * FROM tbl_tq_randomtest WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND rpb_f1!='' GROUP BY no_item ");
                while($r=mysqli_fetch_array($query)){
                $q1=mysqli_query($con,"SELECT * FROM tbl_tq_nokk WHERE no_item='$r[no_item]' OR no_hanger='$r[no_hanger]'");
                $r1=mysqli_fetch_array($q1);
                $pos=strpos($r1['pelanggan'], "/");
                $posbuyer=substr($r1['pelanggan'],$pos+1,50);
                $buyer=str_replace("'","''",$posbuyer);
            ?>
            <tr>
                <td align="left" style="font-size: 7px;"><?php echo $r['no_item'];?></td>
                <td align="left" style="font-size: 7px;"><?php echo substr($r1['jenis_kain'],0,30);?></td>
                <td align="center" style="font-size: 7px;"><?php echo $buyer;?></td>
                <td align="center" style="font-size: 7px;"><?php echo $r1['lebar'];?></td>
                <td align="center" style="font-size: 7px;"><?php echo $r1['gramasi'];?></td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
                <td align="center" style="font-size: 7px;">&nbsp;</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>