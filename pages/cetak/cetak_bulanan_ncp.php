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
$AwalP1=$_GET['awalp1'];
$AkhirP1=$_GET['akhirp1'];
$ProDye=$_GET['prodye'];
$TotalKirim=$_GET['total'];
//$Dept=$_GET['dept'];
//$Cancel=$_GET['cancel'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%d-%b-%y') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($AwalP1!=""){$tgl=substr($AwalP1,0,10); $jam=$AwalP1;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Laporan Bulanan QC</title>
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
//$nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");	
?>
<body>
<table width="100%">
  <thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1"> 
  <tr>
        <td align="center"><strong><font size="+1">LAPORAN BULANAN QC TAHUN <?php echo date("Y", strtotime($AkhirP1));?></font><br />
		<font size="-1">FW-12-QCF-18 / 10</font></strong>
    </tr>
  </table>

		</td>
    </tr>
	</thead>
    <tr>
        <td><table width="100%" border="1" class="table-list1">
            <thead>
                <tr align="center">
                    <?php 
                    $qryCDept=mysqli_query($con,"SELECT COUNT(DISTINCT dept) AS jml FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                    $rCDept=mysqli_fetch_array($qryCDept);
                    ?>
                    <td rowspan="2"><font size="-2"><strong>BULAN</strong></font></td>
                    <td colspan="<?php echo $rCDept['jml'];?>"><font size="-2"><strong>NCP</strong></font></td>
                    <td colspan="2"><font size="-2"><strong>KAIN RETUR</strong></font></td>
                    <td rowspan="2"><font size="-2"><strong>EXTRA QTY YANG DIKIRIM</strong></font></td>
                    <td rowspan="2"><font size="-2"><strong>PACKING</strong></font></td>
                    <td colspan="2"><font size="-2"><strong>LOSS POTONG PACKING</strong></font></td>
                </tr>
                <tr align="center">
                <?php 
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                ?>
                <td><font size="-2"><strong><?php echo $rDept['dept'];?></strong></font></td>
                <?php } ?>
                <td><font size="-2"><strong>QUANTITY</strong></font></td>
                <td><font size="-2"><strong>%</strong></font></td>
                <td><font size="-2"><strong>QUANTITY</strong></font></td>
                <td><font size="-2"><strong>%</strong></font></td>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td align="center" valign="middle"><font size="-2">Total <?php echo date("Y", strtotime($AwalP1));?></font></td>
                <?php 
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                  $thn=date("Y", strtotime($AwalP1));
                  $qtyRtr=mysqli_query($con,"SELECT SUM(kg) AS qty_retur FROM tbl_detail_retur 
                  WHERE DATE_FORMAT( tgltrm_sjretur, '%Y' )='$thn' AND tgl_sjretur!='0000-00-00'");
                  $rRtr=mysqli_fetch_array($qtyRtr);
                  $qtyPack=mysqli_query($con,"SELECT SUM(netto) AS qty_packing FROM tbl_lap_inspeksi 
                  WHERE DATE_FORMAT( tgl_update, '%Y' )='$thn'
                  AND (dept='PACKING' OR dept='INSPEK MEJA' OR dept='KRAH') AND `status`='OK'");
                  $rPack=mysqli_fetch_array($qtyPack);
                  $qryTotal=mysqli_query($con,"SELECT SUM(berat) AS berat FROM tbl_ncp_qcf 
                  WHERE DATE_FORMAT( tgl_buat, '%Y' )='$thn' AND dept='$rDept[dept]' AND `status`!='Cancel'");
                  while($rTotal=mysqli_fetch_array($qryTotal)){
                ?>
                <td align="right" valign="middle"><font size="-2"><?php if($rTotal['berat']=='' OR $rTotal['berat']==NULL){echo "0.00";}else{echo number_format($rTotal['berat'],2);}?></font></td>
                <?php } 
                } ?>
                <td align="right" valign="middle"><font size="-2"><?php if($rRtr['qty_retur']=='' OR $rRtr['qty_retur']==NULL){echo "0.00";}else{echo number_format($rRtr['qty_retur'],2);}?></font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2"><input name="nama1" type="text" placeholder="Ketik" size="10" style="font-size:10px;" /></font></td>
                <td align="center" valign="middle"><font size="-2"><?php if($rPack['qty_packing']=='' OR $rPack['qty_packing']==NULL){echo "0.00";}else{echo number_format($rPack['qty_packing'],2);}?></font></td>
                <td align="right" valign="middle"><font size="-2"><input name="nama1" type="text" placeholder="Ketik" size="10" style="font-size:10px;" /></font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
            </tr>  
		<?php  
            $qryBln=mysqli_query($con,"SELECT CONCAT(MONTHNAME(tgl_buat),' ',YEAR(tgl_buat)) AS bulan FROM tbl_ncp_qcf 
            WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' 
            GROUP BY YEAR(tgl_buat), MONTH(tgl_buat)");
            while($rBln=mysqli_fetch_array($qryBln)){
                $qtyRtr=mysqli_query($con,"SELECT SUM(kg) AS qty_retur FROM tbl_detail_retur 
                WHERE DATE_FORMAT( tgltrm_sjretur, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' AND tgl_sjretur!='0000-00-00'
                AND CONCAT(MONTHNAME(tgltrm_sjretur),' ',YEAR(tgltrm_sjretur))='$rBln[bulan]' 
                GROUP BY YEAR(tgltrm_sjretur), MONTH(tgltrm_sjretur)");
                $rRtr=mysqli_fetch_array($qtyRtr);
                $qtyPack=mysqli_query($con,"SELECT SUM(netto) AS qty_packing FROM tbl_lap_inspeksi 
                WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'
                AND CONCAT(MONTHNAME(tgl_update),' ',YEAR(tgl_update))='$rBln[bulan]' AND (dept='PACKING' OR dept='INSPEK MEJA' OR dept='KRAH') AND `status`='OK'
                GROUP BY YEAR(tgl_update), MONTH(tgl_update)");
                $rPack=mysqli_fetch_array($qtyPack);
		 ?>
            <tr valign="top">
                <td align="center" valign="middle"><font size="-2"><?php echo $rBln['bulan'];?></font></td>
                <?php 
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                $qryBrt=mysqli_query($con,"SELECT SUM(berat) AS berat FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'
                AND CONCAT(MONTHNAME(tgl_buat),' ',YEAR(tgl_buat))='$rBln[bulan]' AND dept='$rDept[dept]' AND `status`!='Cancel'");
                while($rBrt=mysqli_fetch_array($qryBrt)){
                ?>
                <td align="right" valign="middle"><font size="-2"><?php if($rBrt['berat']=='' OR $rBrt['berat']==NULL){echo "0.00";}else{echo number_format($rBrt['berat'],2);}?></font></td>
                <?php } 
                } ?>
                <td align="right" valign="middle"><font size="-2"><?php if($rRtr['qty_retur']=='' OR $rRtr['qty_retur']==NULL){echo "0.00";}else{echo number_format($rRtr['qty_retur'],2);}?></font></td>
                <td align="center" valign="middle"><font size="-2"><?php echo number_format(($rRtr['qty_retur']/$TotalKirim)*100,2);?></font></td>
                <td align="center" valign="middle"><font size="-2"><input name="nama1" type="text" placeholder="Ketik" size="10" style="font-size:10px;" /></font></td>
                <td align="center" valign="middle"><font size="-2"><?php if($rPack['qty_packing']=='' OR $rPack['qty_packing']==NULL){echo "0.00";}else{echo number_format($rPack['qty_packing'],2);}?></font></td>
                <td align="right" valign="middle"><font size="-2"><input name="nama1" type="text" placeholder="Ketik" size="10" style="font-size:10px;" /></font></td>
                <td align="center" valign="middle"><font size="-2"><input name="nama1" type="text" placeholder="Ketik" size="10" style="font-size:10px;" /></font></td>
            </tr>
        <?php 
        } 
        ?>
            <tr>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php 
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php } ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
            </tr>
            <?php 
            $qryBln1=mysqli_query($con,"SELECT CONCAT(MONTHNAME(tgl_buat),' ',YEAR(tgl_buat)) AS bulan FROM tbl_ncp_qcf 
            WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' 
            GROUP BY YEAR(tgl_buat), MONTH(tgl_buat)");
            while($rBln1[]=mysqli_fetch_assoc($qryBln1));{
                //echo "<pre>";
                //print_r($rBln1);
                //echo "</pre>";
                $qryJml=mysqli_query($con,"SELECT TIMESTAMPDIFF(MONTH, '$AwalP1', '$AkhirP1') AS jml_bulan");
                $rJml=mysqli_fetch_array($qryJml);
                $indexBln=$rJml['jml_bulan'];
                $bln1=$rBln1[$indexBln-1]['bulan'];
                $bln2=$rBln1[$indexBln]['bulan'];
                $qtyRtr1=mysqli_query($con,"SELECT * FROM 
                (SELECT IFNULL(
                  (SELECT SUM(kg) AS qty_retur FROM tbl_detail_retur 
                WHERE DATE_FORMAT( tgltrm_sjretur, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' AND tgl_sjretur!='0000-00-00'
                AND CONCAT(MONTHNAME(tgltrm_sjretur),' ',YEAR(tgltrm_sjretur))='$bln1' 
                GROUP BY YEAR(tgltrm_sjretur), MONTH(tgltrm_sjretur)),0) AS berat_sebelum) AS A,
                (SELECT IFNULL(
                  (SELECT SUM(kg) AS qty_retur FROM tbl_detail_retur 
                WHERE DATE_FORMAT( tgltrm_sjretur, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' AND tgl_sjretur!='0000-00-00'
                AND CONCAT(MONTHNAME(tgltrm_sjretur),' ',YEAR(tgltrm_sjretur))='$bln2' 
                GROUP BY YEAR(tgltrm_sjretur), MONTH(tgltrm_sjretur)),0) AS berat_setelah) AS B");
                $rRtr1=mysqli_fetch_array($qtyRtr1);
                $qtyPack1=mysqli_query($con,"SELECT * FROM 
                (SELECT IFNULL(
                  (SELECT SUM(netto) AS qty_packing FROM tbl_lap_inspeksi 
                WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'
                AND CONCAT(MONTHNAME(tgl_update),' ',YEAR(tgl_update))='$bln1' AND (dept='PACKING' OR dept='INSPEK MEJA' OR dept='KRAH') AND `status`='OK'
                GROUP BY YEAR(tgl_update), MONTH(tgl_update)),0) AS berat_sebelum) AS A,
                (SELECT IFNULL(
                  (SELECT SUM(netto) AS qty_packing FROM tbl_lap_inspeksi 
                WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'
                AND CONCAT(MONTHNAME(tgl_update),' ',YEAR(tgl_update))='$bln2' AND (dept='PACKING' OR dept='INSPEK MEJA' OR dept='KRAH') AND `status`='OK'
                GROUP BY YEAR(tgl_update), MONTH(tgl_update)),0) AS berat_setelah) AS B");
                $rPack1=mysqli_fetch_array($qtyPack1);
            ?>
            <tr>
                <td align="center" valign="middle"><font size="-2"><strong>%</strong></font></td>
                <?php 
                $qryDept1=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept1=mysqli_fetch_array($qryDept1)){
                $qryBrt1=mysqli_query($con,"SELECT * FROM 
                (SELECT IFNULL(
                  (SELECT SUM(berat) FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' 
                AND dept='$rDept1[dept]' AND CONCAT(MONTHNAME(tgl_buat),' ',YEAR(tgl_buat))='$bln1' AND `status`!='Cancel'
                GROUP BY YEAR(tgl_buat), MONTH(tgl_buat)),0) AS berat_sebelum) AS A,
                (SELECT IFNULL(
                  (SELECT SUM(berat) FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' 
                AND dept='$rDept1[dept]' AND CONCAT(MONTHNAME(tgl_buat),' ',YEAR(tgl_buat))='$bln2' AND `status`!='Cancel'
                GROUP BY YEAR(tgl_buat), MONTH(tgl_buat)),0) AS berat_setelah) AS B");
                while($rBrt1=mysqli_fetch_array($qryBrt1)){
                //echo "<pre>";
                //print_r($rBrt1);
                //echo "</pre>";
                ?>
                <td align="right" valign="middle"><font size="-2"><?php if($rBrt1['berat_sebelum']=='0.00' AND $rBrt1['berat_setelah']=='0.00'){echo "";}else if($rBrt1['berat_sebelum']=='0.00'){echo "100.00%";}else{echo number_format((($rBrt1['berat_setelah']-$rBrt1['berat_sebelum'])/$rBrt1['berat_sebelum'])*100,2)."%";}?></font></td>
                <?php } 
                } ?>
                <td align="right" valign="middle"><font size="-2"><?php if($rRtr1['berat_sebelum']=='0.00' AND $rRtr1['berat_setelah']=='0.00'){echo "";}else if($rRtr1['berat_sebelum']=='0.00'){echo "100.00%";}else{echo number_format((($rRtr1['berat_setelah']-$rRtr1['berat_sebelum'])/$rRtr1['berat_sebelum'])*100,2)."%";}?></font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2"><input name="nama1" type="text" placeholder="Ketik" size="10" style="font-size:10px;" /></font></td>
                <td align="right" valign="middle"><font size="-2"><?php if($rPack1['berat_sebelum']=='0.00' AND $rPack1['berat_setelah']=='0.00'){echo "";}else if($rPack1['berat_sebelum']=='0.00'){echo "100.00%";}else{echo number_format((($rPack1['berat_setelah']-$rPack1['berat_sebelum'])/$rPack1['berat_sebelum'])*100,2)."%";}?></font></td>
                <td align="center" valign="middle"><font size="-2"><input name="nama1" type="text" placeholder="Ketik" size="10" style="font-size:10px;" /></font></td>
                <td align="center" valign="middle"><font size="-2"><input name="nama1" type="text" placeholder="Ketik" size="10" style="font-size:10px;" /></font></td>
            </tr>
            <?php } ?>
            <tr>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php 
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php } ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
            </tr>
            <tr>
                <td align="center" valign="middle"><font size="-2"><strong>KETERANGAN</strong></font></td>
                <?php 
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php } ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
            </tr>
            <?php 
            $qryBln1=mysqli_query($con,"SELECT CONCAT(MONTHNAME(tgl_buat),' ',YEAR(tgl_buat)) AS bulan FROM tbl_ncp_qcf 
            WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' 
            GROUP BY YEAR(tgl_buat), MONTH(tgl_buat)");
            while($rBln1[]=mysqli_fetch_assoc($qryBln1));{
              $qryJml=mysqli_query($con,"SELECT TIMESTAMPDIFF(MONTH, '$AwalP1', '$AkhirP1') AS jml_bulan");
              $rJml=mysqli_fetch_array($qryJml);
              $indexBln=$rJml['jml_bulan'];
              $bln2=$rBln1[$indexBln]['bulan'];
            ?>
            <tr>
                <td align="center" valign="middle"><font size="-2">% NCP / Total Produksi</font></td>
                <?php 
                $qryDept1=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept1=mysqli_fetch_array($qryDept1)){
                $qryBrt1=mysqli_query($con,"SELECT IFNULL((SELECT SUM(berat) FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' 
                AND dept='$rDept1[dept]' AND CONCAT(MONTHNAME(tgl_buat),' ',YEAR(tgl_buat))='$bln2' AND `status`!='Cancel'
                GROUP BY YEAR(tgl_buat), MONTH(tgl_buat)),0) AS berat_setelah");
                while($rBrt1=mysqli_fetch_array($qryBrt1)){
                ?>
                <td align="right" valign="middle"><font size="-2"><?php if($rBrt1['berat_setelah']=='0.00'){echo "0.00%";}else{echo number_format(($rBrt1['berat_setelah']/$ProDye)*100,2)."%";}?></font></td>
                <?php } 
                } ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">EXTRA EXPORT</font></td>
                <td align="center" valign="middle"><font size="-2">PACKING</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
            </tr>
            <?php } ?>
            <tr>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php 
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php } ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2"><input name="nama1" type="text" placeholder="Ketik" size="10" style="font-size:10px;" /></font></td>
                <?php
                $qryBln1=mysqli_query($con,"SELECT CONCAT(MONTHNAME(tgl_buat),' ',YEAR(tgl_buat)) AS bulan FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' 
                GROUP BY YEAR(tgl_buat), MONTH(tgl_buat)");
                while($rBln1[]=mysqli_fetch_assoc($qryBln1));{
                $qryJml=mysqli_query($con,"SELECT TIMESTAMPDIFF(MONTH, '$AwalP1', '$AkhirP1') AS jml_bulan");
                $rJml=mysqli_fetch_array($qryJml);
                $indexBln=$rJml['jml_bulan'];
                $bln2=$rBln1[$indexBln]['bulan']; 
                $qryD=mysqli_query($con,"SELECT * FROM 
                (SELECT SUM(netto) AS qty_inspek FROM tbl_lap_inspeksi 
                WHERE CONCAT(MONTHNAME(tgl_update),' ',YEAR(tgl_update))='$bln2' AND dept='INSPEK MEJA' AND `status`='OK'
                GROUP BY YEAR(tgl_update), MONTH(tgl_update)) AS A,
                (SELECT SUM(netto) AS qty_packing FROM tbl_lap_inspeksi 
                WHERE CONCAT(MONTHNAME(tgl_update),' ',YEAR(tgl_update))='$bln2' AND dept='PACKING' AND `status`='OK'
                GROUP BY YEAR(tgl_update), MONTH(tgl_update)) AS B,
                (SELECT SUM(netto) AS qty_krah FROM tbl_lap_inspeksi 
                WHERE CONCAT(MONTHNAME(tgl_update),' ',YEAR(tgl_update))='$bln2' AND dept='KRAH' AND `status`='OK'
                GROUP BY YEAR(tgl_update), MONTH(tgl_update)) AS C");
                $rD=mysqli_fetch_array($qryD);
                }
                ?>
                <td align="right" valign="middle"><font size="-2"><strong><?php echo number_format($rD['qty_packing'],2);?></strong></font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
            </tr>
            <tr>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php 
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php } ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">GANTI KAIN</font></td>
                <td align="center" valign="middle"><font size="-2">INSPECT MEJA</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
            </tr>
            <tr>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php 
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php } ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2"><input name="nama1" type="text" placeholder="Ketik" size="10" style="font-size:10px;" /></font></td>
                <td align="right" valign="middle"><font size="-2"><strong><?php echo number_format($rD['qty_inspek'],2);?></strong></font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
            </tr>
            <tr>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php 
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php } ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">EXTRA LOKAL</font></td>
                <td align="center" valign="middle"><font size="-2">KRAGH</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
            </tr>
            <tr>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php 
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <?php } ?>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2"><input name="nama1" type="text" placeholder="Ketik" size="10" style="font-size:10px;" /></font></td>
                <td align="right" valign="middle"><font size="-2"><strong><?php echo number_format($rD['qty_krah'],2);?></strong></font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
                <td align="center" valign="middle"><font size="-2">&nbsp;</font></td>
            </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table border="1" class="table-list1" width="100%">
            <?php 
            $qryBln1=mysqli_query($con,"SELECT CONCAT(MONTHNAME(tgl_buat),' ',YEAR(tgl_buat)) AS bulan FROM tbl_ncp_qcf 
            WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' 
            GROUP BY YEAR(tgl_buat), MONTH(tgl_buat)");
            while($rBln1[]=mysqli_fetch_assoc($qryBln1));{
              $qryJml=mysqli_query($con,"SELECT TIMESTAMPDIFF(MONTH, '$AwalP1', '$AkhirP1') AS jml_bulan");
              $rJml=mysqli_fetch_array($qryJml);
              $indexBln=$rJml['jml_bulan'];
              $bln2=$rBln1[$indexBln]['bulan'];
              $qryTNCP=mysqli_query($con,"SELECT SUM(berat) AS total_berat FROM tbl_ncp_qcf 
              WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' 
              AND CONCAT(MONTHNAME(tgl_buat),' ',YEAR(tgl_buat))='$bln2' AND `status`!='Cancel'
              GROUP BY YEAR(tgl_buat), MONTH(tgl_buat)");
              $rTNCP=mysqli_fetch_array($qryTNCP);
            ?>
        <tr>
          <td align="left" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;" width="10%">Total NCP <?php echo date("F Y", strtotime($AkhirP1));?></td>
          <td align="left" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;" width="10%"><?php echo number_format($rTNCP['total_berat'],2);?></td>
          <td align="left" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;" width="80%"><?php echo number_format(($rTNCP['total_berat']/$ProDye)*100,2)."%";?></td>
        </tr>
        <?php } ?>
        <tr>
          <td align="left" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;" width="10%">Total Produksi Dyeing <?php echo date("F Y", strtotime($AkhirP1));?></td>
          <td align="left" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;" width="90%" colspan="2"><?php echo number_format($ProDye,2);?></td>
        </tr>
      </table></td>    
    </tr>
    <tr>
      <td><table border="0" class="table-list1" width="100%">
        <tr align="center">
          <td width="14%">&nbsp;</td>
          <td width="17%"><strong>Dibuat Oleh</strong> </td>
          <td width="17%"><strong>Diperiksa Oleh</strong> </td>
          <td width="14%"><strong>Disetujui Oleh</strong> </td>
        </tr>
        <tr>
          <td>Nama</td>
          <td align="center">Nur Tusilatun</td>
          <td align="center">Agung Cahyono</td>
          <td align="center">Amy</td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td align="center">Operator</td>
          <td align="center">QCF Manager</td>
          <td align="center">APD</td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td align="center"><?php echo date("d F Y", strtotime($rTgl['tgl_skrg']));?></td>
          <td align="center"><?php echo date("d F Y", strtotime($rTgl['tgl_skrg']));?></td>
          <td align="center"><?php echo date("d F Y", strtotime($rTgl['tgl_skrg']));?></td>
        </tr>
        <tr>
          <td valign="top" style="height: 0.6in;" >Tanda Tangan</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  
</table>

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>