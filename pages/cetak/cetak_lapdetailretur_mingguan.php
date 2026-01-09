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
$TotalKirim=$_GET['total'];
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
<title>Cetak Returan Mingguan</title>
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
        <td align="center"><strong><font size="+1">LAPORAN MINGGUAN KAIN RETURN</font><br />
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
            <td><font size="-2"><strong>TANGGAL DARI GKJ</strong></font></td>
            <td><font size="-2"><strong>TGL SURAT JALAN</strong></font></td>
            <td><font size="-2"><strong>NO SURAT JALAN LANGGANAN</strong></font></td>
            <td><font size="-2"><strong>LANGGANAN</strong></font></td>
            <td><font size="-2"><strong>PO</strong></font></td>
            <td><font size="-2"><strong>ORDER</strong></font></td>
            <td><font size="-2"><strong>JENIS KAIN</strong></font></td>
            <td><font size="-2"><strong>WARNA</strong></font></td>
            <td><font size="-2"><strong>LOT</strong></font></td>
            <td><font size="-2"><strong>ROLL</strong></font></td>
            <td><font size="-2"><strong>QTY SURAT JALAN</strong></font></td>
            <td><font size="-2"><strong>QTY TIMBANG ULANG</strong></font></td>
            <td><font size="-2"><strong>MASALAH</strong></font></td>
            <td><font size="-2"><strong>TANGGUNG JAWAB</strong></font></td>
            <td><font size="-2"><strong>KETERANGAN</strong></font></td>
          </tr>
		</thead>
		<tbody>  
		<?php
	$no=1;
	$Awal=$_GET['awal'];
	$Akhir=$_GET['akhir'];		
  $qry1=mysqli_query($con,"SELECT *
  FROM tbl_detail_retur_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' ORDER BY tgltrm_sjretur ASC");
  //$qrygk=mysqli_query("");
  $troll=0;
  $tqty=0;
  $tqty_tu=0;
            while($row1=mysqli_fetch_array($qry1)){
        $qry2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2 FROM tbl_aftersales_now WHERE nodemand='$row1[nodemand]'");
        $r2=mysqli_fetch_array($qry2);
		 ?>
          <tr valign="top">
            <td align="center" valign="middle"><font size="-2"><?php echo $no; ?></font></td>
            <td align="left" valign="middle"><font size="-2"><?php echo date("d/m/y", strtotime($row1['tgltrm_sjretur']));?></font></td>
            <td align="left" valign="middle"><font size="-2"><?php echo date("d/m/y", strtotime($row1['tgl_sjretur']));?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo $row1['sjreturplg'];?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['langganan']);?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['po']);?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['no_order']);?></font></td>
            <td align="left" style="font-size: 8px;"><?php echo substr(strtoupper($row1['jenis_kain']),0,45);?></td>
            <td align="left" valign="middle" style="font-size: 8px;"><?php echo substr($row1['warna'],0,40);?></td>
            <td align="center" valign="middle"><font size="-2"><?php echo $row1['lot'];?></font></td>
            <td align="right" valign="middle"><font size="-2"><?php echo $row1['roll'];?></font></td>
            <td align="right" valign="middle"><font size="-2"><?php echo $row1['kg'];?></font></td>
            <td align="right" valign="middle"><font size="-2"><?php echo $row1['qty_tu'];?></font></td>
            <td align="left" valign="middle"><font size="-2"><?php echo $row1['masalah'];?></font></td>
            <td align="center" valign="middle"><font size="-2">
            <?php if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){echo $row1['t_jawab'].",".$row1['t_jawab1'].",".$row1['t_jawab2'];
                }else if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']==""){
                echo $row1['t_jawab'].",".$row1['t_jawab1'];	
				}else if($row1['t_jawab']!="" and $row1['t_jawab1']=="" and $row1['t_jawab2']!=""){
                echo $row1['t_jawab'].",".$row1['t_jawab2'];	
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){
                echo $row1['t_jawab1'].",".$row1['t_jawab2'];	
				}else if($row1['t_jawab']!="" and $row1['t_jawab1']=="" and $row1['t_jawab2']==""){
                echo $row1['t_jawab'];
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']!="" and $row1['t_jawab2']==""){
                echo $row1['t_jawab1'];
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']=="" and $row1['t_jawab2']!=""){
                echo $row1['t_jawab2'];	
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']=="" and $row1['t_jawab2']==""){
                echo "";	
				}  ?>
            </font></td>
            <td align="left" valign="middle"><font size="-2"><?php echo $row1['ket'];?></font></td>
          </tr>
        <?php $no++;
        $troll=$troll+$row1['roll'];
        $tqty=$tqty+$row1['kg'];
        $tqty_tu=$tqty_tu+$row1['qty_tu'];
        } 
        ?>
          <tr valign="top">
            <td colspan="10" align="center"><strong>TOTAL</strong></td>
            <td align="right"><strong><?php echo $troll;?></strong></td>
            <td align="right"><strong><?php echo number_format($tqty,2);?></strong></td>
            <td align="right"><strong><?php echo number_format($tqty_tu,2);?></strong></td>
            <td colspan="3" align="center">&nbsp;</td>
          </tr>
			
        </tbody>
      </table></td>
    </tr>
    <tr>
        <td><table width="35%" border="1" class="table-list1">
            <tr>
                <td colspan="2" align="center"><strong>Laporan pertanggal <?php echo date("d/m/Y", strtotime($Awal));?> s/d <?php echo date("d/m/Y", strtotime($Akhir));?></strong></td> 
            </tr>
            <tr>
                <td align="left" width="50%"><strong>Total Return</strong></td>
                <td align="center" width="50%"><strong><?php echo number_format($tqty,2);?></strong></td>
            </tr>
            <tr>
                <td align="left" width="50%"><strong>Total Kirim</strong></td>
                <td align="center" width="50%"><strong><?php echo number_format($TotalKirim,2);?></strong></td>
            </tr>
            <tr>
                <td align="left" width="50%"><strong>Persentase</strong></td>
                <td align="center" width="50%"><strong><?php echo number_format(($tqty/$TotalKirim)*100,2)." %";?></strong></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><table width="35%" border="1" class="table-list1">
            <?php
            $Awal=$_GET['awal'];
            $Akhir=$_GET['akhir'];
            if($Awal !="" AND $Akhir !=""){ $Where=" DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ";} 
            $qryQC=mysqli_query($con,"SELECT SUM(qty_tu) AS qty_claim_qc FROM tbl_detail_retur_now WHERE $Where AND (`t_jawab`='QCF' OR `t_jawab1`='QCF' OR `t_jawab2`='QCF')");
            $rowQC=mysqli_fetch_array($qryQC);
            ?>
            <tr>
                <td align="left" bgcolor="#FDDC18" width="50%"><strong>Total Return QCF</strong></td>
                <td align="center" width="50%"><strong><?php echo number_format($rowQC['qty_claim_qc'],2);?></strong></td>
            </tr>
            <tr>
                <td align="left" width="50%"><strong>Total Kirim</strong></td>
                <td align="center" width="50%"><strong><?php echo number_format($TotalKirim,2);?></strong></td>
            </tr>
            <tr>
                <td align="left" width="50%"><strong>Persentase</strong></td>
                <td align="center" width="50%"><strong><?php echo number_format(($rowQC['qty_claim_qc']/$TotalKirim)*100,4)." %";?></strong></td>
            </tr>
        </table></td>
    </tr>
</table>

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>