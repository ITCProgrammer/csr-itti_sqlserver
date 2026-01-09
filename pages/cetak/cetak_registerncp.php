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
$Dept=$_GET['dept'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Register NCP</title>
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

<body>
<table width="100%">
  <thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1"> 
  <tr>
    <td width="9%" align="center"><img src="indo.jpg" width="60" height="60"  /></td>
    <td align="center" valign="middle"><strong><font size="+1" >REGISTER NCP</font></strong></td>
    </tr>
  </table>
<table width="100%" border="0">
    <tbody>
      <tr>
        <td width="78%">&nbsp;</td>
        <td width="22%" align="right">&nbsp;</td>
      </tr>
    </tbody>
  </table>
		</td>
    </tr>
	</thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1">
        <tbody>
          <tr align="center">
            <td width="4%" rowspan="2">No</td>
            <td width="8%" rowspan="2">Tanggal Masuk</td>
            <td width="9%" rowspan="2">Nomor NCP</td>
            <td width="8%" rowspan="2">PO Rajut</td>
            <td width="13%" rowspan="2">Jenis NCP</td>
            <td width="9%" rowspan="2">Peninjau</td>
            <td width="21%" rowspan="2">Tindakan Penyelesaian</td>
            <td colspan="2">Tanggal</td>
            <td width="14%" rowspan="2">Penanggung Jawab</td>
          </tr>
          <tr>
            <td width="7%" align="center">Rencana</td>
            <td width="7%" align="center">Aktual</td>
          </tr>
		<?php
	$no=1;	
	if($Dept=="ALL"){		
	$Wdept=" ";	
	}else{	
	$Wdept=" dept='$Dept' AND ";	
	}		
	$qry1=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE $Wdept DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ORDER BY id ASC");
			while($row1=mysqli_fetch_array($qry1)){
		 ?>
          <tr>
            <td align="center"><?php echo substr($row1['no_ncp'],10,3); ?></td>
            <td align="center"><?php echo date("d/m/y", strtotime($row1['tgl_buat']));?></td>
            <td align="center"><?php echo strtoupper($row1['no_ncp']);?></td>
            <td align="center"><?php echo strtoupper($row1['po_rajut']);?></td>
            <td align="center"><?php echo strtoupper($row1['masalah']);?></td>
            <td align="center"><?php echo strtoupper($row1['peninjau_awal']);?></td>
            <td align="center"><?php if($row1['catat_verify']==""){echo strtoupper($row1['penyelesaian']);}else{echo strtoupper($row1['catat_verify']);}?></td>
            <td align="center"><?php if($row1['tgl_rencana']!=""){echo date("d/m/y", strtotime($row1['tgl_rencana']));}?></td>
            <td align="center"><?php if($row1['tgl_selesai']!=""){echo date("d/m/y", strtotime($row1['tgl_selesai']));}?></td>
            <td align="center"><?php echo strtoupper($row1['penyebab']);?></td>
          </tr>
		<?php	$no++;  } ?>	
        </tbody>
      </table></td>
    </tr>
  
</table>

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>