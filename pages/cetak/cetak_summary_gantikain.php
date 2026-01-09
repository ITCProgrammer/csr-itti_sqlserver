<?php
ini_set("error_reporting", 1);
session_start();
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$GShift=$_GET['shft'];
$Subdept=$_GET['subdept'];
$TotalKirim=$_GET['total'];
$TotalLot=$_GET['total_lot'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Summary Ganti Kain Eksternal</title>
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
}	
</style>	
</head>
<?php 
$nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");	
?>
<body>
<table width="100%">
  <thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1"> 
  <tr>
    <td align="center"><strong><font size="+1">SUMMARY GANTI KAIN EKSTERNAL</font><br />
		<font size="-1">Periode: <?php echo date("d/m/Y", strtotime($Awal));?> s/d <?php echo date("d/m/Y", strtotime($Akhir));?></font>
          <br />
    </strong></td>
    </tr>
  </table></td>
    </tr>
	</thead>
    <tr>
        <td><table width="100%" border="1" class="table-list1">
            <thead>
                <tr align="center">
                    <td rowspan="2"><font size="-2"><strong>BUYER</strong></font></td>
                    <td colspan="2"><font size="-2"><strong>QTY PERMINTAAN</strong></font></td>
                    <td colspan="2"><font size="-2"><strong>QTY GANTI KAIN</strong></font></td>
                    <td colspan="2"><font size="-2"><strong>%</strong></font></td>
                </tr>
                <tr align="center">
                    <td><font size="-2"><strong>KG</strong></font></td>
                    <td><font size="-2"><strong>YARD</strong></font></td>
                    <td><font size="-2"><strong>KG</strong></font></td>
                    <td><font size="-2"><strong>YARD</strong></font></td>
                    <td><font size="-2"><strong>KG</strong></font></td>
                    <td><font size="-2"><strong>YARD</strong></font></td>
                </tr>
            </thead>
            <tbody>
            <tr>
              <?php
              $tqty_gk=0;
              $tqty_email=0;
              $tpjg_gk=0;
              $tpjg_email=0;
              $qry1=mysqli_query($con,"SELECT buyer, SUM(kg1) AS qty_gk, SUM(pjg1) AS pjg_gk, SUM(qty_email) AS qty_email, SUM(pjg_email) AS pjg_email FROM tbl_ganti_kain_now WHERE
              id_disposisi is null and 
			  DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' 
              AND '$Akhir' GROUP BY buyer ORDER BY buyer ASC"); 
              while($row1=mysqli_fetch_array($qry1)){
              ?>
                <td align="left"><?php echo $row1['buyer'];?></td>
                <td align="right"><?php echo number_format($row1['qty_email'],2);?></td>
                <td align="right"><?php echo number_format($row1['pjg_email'],2);?></td>
                <td align="right"><?php echo number_format($row1['qty_gk'],2);?></td>
                <td align="right"><?php echo number_format($row1['pjg_gk'],2);?></td>
                <td align="center"><?php if($row1['qty_email']=='0' OR $row1['qty_email']==NULL){echo "0.00%";}else{echo number_format((($row1['qty_email']-$row1['qty_gk'])/$row1['qty_email'])*100,2)." %";}?></td>
                <td align="center"><?php if($row1['pjg_email']=='0' OR $row1['pjg_email']==NULL){echo "0.00%";}else{echo number_format((($row1['pjg_email']-$row1['pjg_gk'])/$row1['pjg_email'])*100,2)." %";}?></td>
            </tr>
              <?php 
                $tqty_gk=$tqty_gk+$row1['qty_gk'];
                $tqty_email=$tqty_email+$row1['qty_email'];
                $tpjg_gk=$tpjg_gk+$row1['pjg_gk'];
                $tpjg_email=$tpjg_email+$row1['pjg_email'];} ?>
             <tr>
                <td align="left"><strong>TOTAL</strong></td>
                <td align="right"><strong><?php echo number_format($tqty_email,2); ?></strong></td>
                <td align="right"><strong><?php echo number_format($tpjg_email,2);?></strong></td>
                <td align="right"><strong><?php echo number_format($tqty_gk,2); ?></strong></td>
                <td align="right"><strong><?php echo number_format($tpjg_gk,2);?></strong></td>
                <td align="center"><strong><?php echo number_format((($tqty_email-$tqty_gk)/$tqty_email)*100,2)." %";?></strong></td>
                <td align="center"><strong><?php echo number_format((($tpjg_email-$tpjg_gk)/$tpjg_email)*100,2)." %";?></strong></td>
            </tr>
            </tbody>
        </table></td>
    </tr>
</table>
</body>
</html>