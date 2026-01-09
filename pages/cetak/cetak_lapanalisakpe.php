<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
//$idkk=$_REQUEST['idkk'];
//$act=$_GET['g'];
//-
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
//$Dept=$_GET[dept];
//$Cancel=$_GET[cancel];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Analisa KPE</title>
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
        margin-top: 5mm; 
        margin-bottom: 0mm; 
        margin-left: 3mm; 
        margin-right: 0mm
        }
}	
</style>	
</head>
<body>
<table width="100%">
    <tr>
      <td><table width="100%" border="1" class="table-list1">
        <thead>
          <tr align="center">
			      <td><strong><font size="-2">NO TPUKPE</font></strong></td>
            <td><strong><font size="-2">BULAN</font></strong></td>
            <td><strong><font size="-2">KASUS</font></strong></td>
            <td><strong><font size="-2">QTY (KG)</font></strong></td>
            <td><strong><font size="-2">DEPT PENYEBAB</font></strong></td>
          </tr>
		</thead>
		<tbody>  
		<?php
            $Awal=$_GET['awal'];
            $Akhir=$_GET['akhir'];		
            $qry1=mysqli_query($con,"SELECT * FROM tbl_tpukpe_now 
            WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (`t_jawab`='QCF' OR `t_jawab1`='QCF' OR `t_jawab2`='QCF')");
            $tot1=0;
            $cekqry1=mysqli_num_rows($qry1);
			while($row1=mysqli_fetch_array($qry1)){
				if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){ $tjawab=$row1['t_jawab']."+".$row1['t_jawab1']."+".$row1['t_jawab2'];
				}else if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']==""){
				$tjawab=$row1['t_jawab']."+".$row1['t_jawab1'];	
				}else if($row1['t_jawab']!="" and $row1['t_jawab1']=="" and $row1['t_jawab2']!=""){
				$tjawab=$row1['t_jawab']."+".$row1['t_jawab2'];	
				}else if($row1['t_jawab']=="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){
				$tjawab=$row1['t_jawab1']."+".$row1['t_jawab2'];	
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
            <td align="center"><font size="-2"><?php echo $row1['no_tpukpe']; ?></font></td>
            <?php 
            $nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");
            $bulan= $nmBln[date('n',strtotime($row1['tgl_buat']))];	
            ?>
            <td align="center"><font size="-2"><?php echo $bulan;?></font></td>
            <td><font size="-2"><?php echo strtoupper($row1['masalah']);?></font></td>
            <td align="right"><font size="-2"><?php echo strtoupper($row1['qty']);?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo $tjawab; ?></font></td>
          </tr>
		<?php
            $tot1=$tot1+$row1['qty'];
            } ?>	
        </tbody>
        <?php if($cekqry1>0){?>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
        <?php }?>
        <tbody>  
		<?php
            $Awal=$_GET['awal'];
            $Akhir=$_GET['akhir'];
            $tot2=0;		
            $qry2=mysqli_query($con,"SELECT * FROM tbl_tpukpe_now 
            WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (`t_jawab`!='QCF' AND `t_jawab1`!='QCF' AND `t_jawab2`!='QCF')");
			while($row2=mysqli_fetch_array($qry2)){
				if($row2['t_jawab']!="" and $row2['t_jawab1']!="" and $row2['t_jawab2']!=""){ $tjawab1=$row2['t_jawab']."+".$row2['t_jawab1']."+".$row2['t_jawab2'];
				}else if($row2['t_jawab']!="" and $row2['t_jawab1']!="" and $row2['t_jawab2']==""){
				$tjawab1=$row2['t_jawab']."+".$row2['t_jawab1'];	
				}else if($row2['t_jawab']!="" and $row2['t_jawab1']=="" and $row2['t_jawab2']!=""){
				$tjawab1=$row2['t_jawab']."+".$row2['t_jawab2'];	
				}else if($row2['t_jawab']=="" and $row2['t_jawab1']!="" and $row2['t_jawab2']!=""){
				$tjawab1=$row2['t_jawab1']."+".$row2['t_jawab2'];	
				}else if($row2['t_jawab']!="" and $row2['t_jawab1']=="" and $row2['t_jawab2']==""){
				$tjawab1=$row2['t_jawab'];
				}else if($row2['t_jawab']=="" and $row2['t_jawab1']!="" and $row2['t_jawab2']==""){
				$tjawab1=$row2['t_jawab1'];
				}else if($row2['t_jawab']=="" and $row2['t_jawab1']=="" and $row2['t_jawab2']!=""){
				$tjawab1=$row2['t_jawab2'];	
				}else if($row2['t_jawab']=="" and $row2['t_jawab1']=="" and $row2['t_jawab2']==""){
				$tjawab1="";	
				}
		 ?>
          <tr valign="top">
            <td align="center"><font size="-2"><?php echo $row2['no_tpukpe']; ?></font></td>
            <?php 
            $nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");
            $bulan= $nmBln[date('n',strtotime($row2['tgl_buat']))];	
            ?>
            <td align="center"><font size="-2"><?php echo $bulan;?></font></td>
            <td><font size="-2"><?php echo strtoupper($row2['masalah']);?></font></td>
            <td align="right"><font size="-2"><?php echo strtoupper($row2['qty']);?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo $tjawab1; ?></font></td>
          </tr>
		<?php
            $tot2=$tot2+$row2['qty'];} 
            $total=$tot1+$tot2;?>	
        </tbody>
        <tr>
        <td align="center"><strong><font size="-1">TOTAL</font></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center"><strong><?php echo number_format($total,2);?></strong></td>
        <td>&nbsp;</td>
    </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" class="table-list1">
      <tr align="center">
        <td>&nbsp;</td>
        <td>Dibuat Oleh :</td>
        <td>Diketahui Oleh :</td>
      </tr>
      <tr>
        <td>Nama</td>
        <td align="center">Arif Efendi</td>
        <td align="center">Agung Cahyono</td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td align="center">Asst. SPV</td>
        <td align="center">Manager</td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td align="center">
        <!-- <input type=text name=nama placeholder="Ketik disini" style="font-size: 11px;"> -->
          <?php echo date("d F Y", strtotime($rTgl['tgl_skrg']));?> 
        </td>
        <td align="center">
        <!-- <input type=text name=nama placeholder="Ketik disini" style="font-size: 11px;"> -->
          <?php echo date("d F Y", strtotime($rTgl['tgl_skrg']));?> 
        </td>
      </tr>
      <tr>
        <td valign="top" style="height: 0.7in;">Tanda Tangan</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
    </table></td>
    </tr>
  
</table>
<script type="text/javascript" src="../bower_components/chartjs/Chart.js"></script>
<script>
//alert('cetak');window.print();
</script> 
</body>
</html>