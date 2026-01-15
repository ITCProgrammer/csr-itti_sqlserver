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
$qTgl = sqlsrv_query($con,"SELECT FORMAT(GETDATE(),'dd-MMM-yy') as tgl_skrg, CONVERT(varchar(8), GETDATE(), 108) as jam_skrg");
if ($qTgl === false) {
  die(print_r(sqlsrv_errors(), true));
}
$rTgl = sqlsrv_fetch_array($qTgl, SQLSRV_FETCH_ASSOC);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Leadtine Kartu Kerja >3 Hari Dept QC</title>
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
        -webkit-print-color-adjust: exact !important;
   }
}	
</style>	
</head>
<?php 
//$nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");	
?>
<body>
<table width="100%">
  <thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1"> 
  <tr>
        <td align="center"><strong><font size="+1">LAPORAN LEADTIME KARTU KERJA >3 HARI DEPT QC</font><br />
		<font size="-1">Periode: <?php echo date("d/m/Y", strtotime($Awal));?> s/d <?php echo date("d/m/Y", strtotime($Akhir));?></font>
    </tr>
  </table>

		</td>
    </tr>
	</thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1">
        <thead>
          <tr align="center">
			<td><font size="-2"><strong>NO</strong></font></td>
            <td><font size="-2"><strong>BARCODE</strong></font></td>
            <td><font size="-2"><strong>LANGGANAN</strong></font></td>
            <td><font size="-2"><strong>NO ITEM</strong></font></td>
            <td><font size="-2"><strong>HANGER</strong></font></td>
            <td><font size="-2"><strong>COLOR</strong></font></td>
            <td><font size="-2"><strong>LOT</strong></font></td>
          </tr>
		</thead>
		<tbody>  
		<?php
	$no=1;
	$Awal=$_GET['awal'];
	$Akhir=$_GET['akhir'];		
  $qry1=sqlsrv_query($con,"SELECT * FROM db_qc.tbl_qcf WHERE CONVERT(date, tgl_masuk) BETWEEN '$Awal' AND '$Akhir' AND DATEDIFF(day, tglcwarna, tgl_pack)>=3 AND sts_nodelay='0'");
  if ($qry1 === false) {
    die(print_r(sqlsrv_errors(), true));
  }
  //$qrygk=mysqli_query("");
        while($row1=sqlsrv_fetch_array($qry1, SQLSRV_FETCH_ASSOC)){
		 ?>
          <tr valign="top">
            <td align="center" valign="middle"><font size="-2"><?php echo $no; ?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo $row1['nokk'];?></font></td>
            <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row1['pelanggan']);?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['no_item']);?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['no_hanger']);?></font></td>
            <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row1['warna']);?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo $row1['lot'];?></font></td>
          </tr>
        <?php $no++;} 
        ?>
        </tbody>
      </table></td>
    </tr>
    <tr>
        <td><table width="35%" border="1" class="table-list1">
            <?php
            $tkk=0;
            $tdelay=0;
            $tpersen=0; 
            $Awal=$_GET['awal'];
            $Akhir=$_GET['akhir'];
            $qry2=sqlsrv_query($con,"SELECT COUNT(*) as jmlkk FROM db_qc.tbl_qcf WHERE CONVERT(date, tgl_masuk) BETWEEN '$Awal' AND '$Akhir'");
            if ($qry2 === false) {
              die(print_r(sqlsrv_errors(), true));
            }
            $row2=sqlsrv_fetch_array($qry2, SQLSRV_FETCH_ASSOC);
            $qry3=sqlsrv_query($con,"SELECT COUNT(*) as jmlkkdelay FROM db_qc.tbl_qcf WHERE CONVERT(date, tgl_masuk) BETWEEN '$Awal' AND '$Akhir' AND DATEDIFF(day, tglcwarna, tgl_pack)>=3 AND sts_nodelay='0'");
            if ($qry3 === false) {
              die(print_r(sqlsrv_errors(), true));
            }
            $row3=sqlsrv_fetch_array($qry3, SQLSRV_FETCH_ASSOC);
            ?>
            <tr>
                <td align="left" bgcolor="#FDDC18" width="50%"><strong>Total KK Bulan Berjalan</strong></td>
                <td align="center" width="50%"><strong><?php echo $row2['jmlkk']." KK";?></strong></td>
            </tr>
            <tr>
                <td align="left" bgcolor="#FDDC18" width="50%"><strong>Total KK Delay Akibat QC</strong></td>
                <td align="center" width="50%"><strong><?php echo $row3['jmlkkdelay']." KK";?></strong></td>
            </tr>
            <tr>
                <td align="left" bgcolor="#FDDC18" width="50%"><strong>Persentase</strong></td>
                <td align="center" width="50%"><strong><?php echo number_format(($row3['jmlkkdelay']/$row2['jmlkk'])*100,2)." %";?></strong></td>
            </tr>
        </table></td>
    </tr>
</table>

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>