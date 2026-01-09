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
$Cancel=$_GET['cancel'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak KPE</title>
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
    <td align="center"><strong><font size="+1">LAPORAN KELUHAN PELANGGAN</font><br />
		<font size="-1">Periode:   </font>
          <br />
		<font size="-1">FW-06-QCF-01/03</font></strong></td>
    </tr>
  </table>

		</td>
    </tr>
	</thead>
	<tbody>
    <tr>
      <td><table width="100%" border="1" class="table-list1">        
          <tr align="center">
            <td><font size="-2">NO</font></td>
            <td><font size="-2">TGL</font></td>
            <td><font size="-2">LANGGANAN</font></td>
            <td><font size="-2">PO</font></td>
            <td><font size="-2">ORDER</font></td>
            <td><font size="-2">JENIS KAIN</font></td>
            <td><font size="-2">LOT</font></td>
            <td><font size="-2">WARNA</td>
            <td><font size="-2">QTY KIRIM</font></td>
            <td><font size="-2">QTY CLAIM</font></td>
            <td><font size="-2">T JAWAB</font></td>
            <td><font size="-2">MASALAH</font></td>
            <td><font size="-2">KETERANGAN</font></td>
          </tr>
		<?php
	$no=1;
	$Awal=$_GET['awal'];
	$Akhir=$_GET['akhir'];		
	$qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ORDER BY id ASC");
			while($row1=mysqli_fetch_array($qry1)){
				if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){ $tjawab=$row1['t_jawab'].",".$row1['t_jawab1'].", ".$row1['t_jawab2'];
				}else if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']==""){
				$tjawab=$row1['t_jawab'].",".$row1['t_jawab1'];	
				}else if($row1['t_jawab']!="" and $row1['t_jawab1']=="" and $row1['t_jawab2']!=""){
				$tjawab=$row1['t_jawab'].",".$row1['t_jawab2'];	
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){
				$tjawab=$row1['t_jawab1'].",".$row1['t_jawab2'];	
				}else if($row1['t_jawab']!="" and $row1['t_jawab1']=="" and $row1['t_jawab2']==""){
				$tjawab=$row1['t_jawab'];
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']!="" and $row1['t_jawab2']==""){
				$tjawab=$row1['t_jawab1'];
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']=="" and $row1['t_jawab2']!=""){
				$tjawab=$row1['t_jawab2'];	
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']=="" and $row1['t_jawab2']==""){
				$tjawab="";	
				}
		 ?>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
		<?php	$no++;  
			if($row1['status']!="Cancel"){
				$rol   =$row1['rol'];
				$berat =$row1['berat'];
				$lot   ="1";
			}else{
				$rol   ="0";
				$berat ="0";
				$lot   ="0";
			}
				
				$tkirim=$tkirim+$row1['qty_kirim'];
				$tclaim=$tclaim+$row1['qty_claim'];
			} ?>	
          <tr valign="top">
            <td colspan="8" align="right">TOTAL</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
			
        
      </table></td>
    </tr>
	</tbody>
    <tr>
      <td><table width="100%" border="0" class="table-list1">
      <tr align="center">
        <td>&nbsp;</td>
        <td>Diserahkan Oleh :</td>
        <td>Diketahui Oleh :</td>
        <td> Diketahui Oleh :</td>
      </tr>
      <tr>
        <td>Nama</td>
        <td align="center"><input type=text name=nama placeholder="Ketik disini"></td>
        <td align="center"><input type=text name=nama1 placeholder="Ketik disini"></td>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td align="center"><input type=text name=nama2 placeholder="Ketik disini"></td>
        <td align="center"><input type=text name=nama3 placeholder="Ketik disini"></td>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="60" valign="top">Tanda Tangan</td>
        <td>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    </tr>
  
</table>

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>