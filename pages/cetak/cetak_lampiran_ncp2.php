<?php 
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
//--
$AwalP1=$_GET['awalp1'];
$AkhirP1=$_GET['akhirp1'];
$ProDye=$_GET['prodye'];
$ProBrs=$_GET['probrs'];
$ProPrt=$_GET['proprt'];
$ProDye1=$_GET['prodye1'];
$ProBrs1=$_GET['probrs1'];
$ProPrt1=$_GET['proprt1'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Lampiran NCP</title>
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
            <td><table width="100%" border="0" class="table-list1"> 
                <tr>
                    <td align="center" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;"><strong>LAMPIRAN DATA NCP</strong></td>
                </tr>
            </table></td>
        </tr>
    </thead>
    <tr>
        <td><table width="100%" border="1" class="table-list1">
            <thead>
                <tr align="center">
                    <td align="center"><font size="-2"><strong>BULAN</strong></font></td>
                    <?php 
                    $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                    while($rDept=mysqli_fetch_array($qryDept)){
                    ?>
                    <td><font size="-2"><strong><?php echo $rDept['dept'];?></strong></font></td>
                    <?php } ?>
                    <td align="center"><font size="-2"><strong>TOTAL</strong></font></td>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td align="center"><?php echo date("F Y", strtotime($AwalP1));?></td>
                    <?php 
                    $total=0;
                    $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                    while($rDept=mysqli_fetch_array($qryDept)){
                    $qryBrt=mysqli_query($con,"SELECT SUM(berat) AS berat FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'
                    AND dept='$rDept[dept]' AND (peninjau_akhir='' OR peninjau_akhir IS NULL) AND `status`!='Cancel'");
                    while($rBrt=mysqli_fetch_array($qryBrt)){
                    ?>
                    <td align="right" valign="middle"><font size="-2"><?php if($rBrt['berat']=='' OR $rBrt['berat']==NULL){echo "0.00";}else{echo $rBrt['berat'];}?></font></td>
                    <?php $total=$total+$rBrt['berat'];} 
                    } ?>
                    <td align="right"><?php echo number_format($total,2);?></td>
                </tr>
                <tr align="center">
                    <td align="center">Disposisi</td>
                    <?php 
                    $total1=0;
                    $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                    while($rDept=mysqli_fetch_array($qryDept)){
                    $qryBrt=mysqli_query($con,"SELECT SUM(berat) AS berat FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'
                    AND dept='$rDept[dept]' AND (peninjau_akhir!='' OR peninjau_akhir!=NULL) AND `status`!='Cancel'");
                    while($rBrt=mysqli_fetch_array($qryBrt)){
                    ?>
                    <td align="right" valign="middle"><font size="-2"><?php if($rBrt['berat']=='' OR $rBrt['berat']==NULL){echo "0.00";}else{echo $rBrt['berat'];}?></font></td>
                    <?php $total1=$total1+$rBrt['berat'];} 
                    } ?>
                    <td align="right"><?php echo number_format($total1,2);?></td>
                </tr>
                <tr align="center">
                    <td align="center">% Disposisi</td>
                    <?php 
                    $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                    while($rDept=mysqli_fetch_array($qryDept)){
                    $qryBrt=mysqli_query($con,"SELECT * FROM 
                    (SELECT IFNULL(
                        (SELECT SUM(berat) FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'
                    AND dept='$rDept[dept]' AND `status`!='Cancel' AND (peninjau_akhir!='' OR peninjau_akhir!=NULL)),0) AS berat_dis) AS A,
                    (SELECT IFNULL(
                        (SELECT SUM(berat) FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'
                    AND dept='$rDept[dept]' AND `status`!='Cancel' AND (peninjau_akhir='' OR peninjau_akhir IS NULL)),0) AS berat) AS B");
                    while($rBrt=mysqli_fetch_array($qryBrt)){
                    ?>
                    <td align="right" valign="middle"><font size="-2"><?php if($rBrt['berat_dis']=='0.00' AND $rBrt['berat']=='0.00'){echo "0.00%";}else if($rBrt['berat_dis']=='0.00' OR $rBrt['berat']=='0.00'){echo "0.00%";}else{echo number_format(($rBrt['berat_dis']/$rBrt['berat'])*100,2)."%";}?></font></td>
                    <?php } 
                    } ?>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr align="center">
                    <td align="center">% NCP/ Total Produksi</td>
                    <?php 
                    $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                    while($rDept=mysqli_fetch_array($qryDept)){
                    $qryBrt=mysqli_query($con,"SELECT SUM(berat) AS berat FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'
                    AND dept='$rDept[dept]' AND (peninjau_akhir='' OR peninjau_akhir IS NULL) AND `status`!='Cancel'");
                    while($rBrt=mysqli_fetch_array($qryBrt)){
                    ?>
                    <td align="right" valign="middle"><font size="-2"><?php if($rBrt['berat']=='' OR $rBrt['berat']==NULL){echo "0.00%";}else{echo number_format(($rBrt['berat']/$ProDye)*100,2)."%";}?></font></td>
                    <?php } 
                    } ?>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr align="center">
                    <td align="center">&nbsp;</td>
                    <?php 
                    $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                    while($rDept=mysqli_fetch_array($qryDept)){
                    ?>
                    <td align="right" valign="middle"><font size="-2">&nbsp;</font></td>
                    <?php } 
                    ?>
                    <td align="right">&nbsp;</td>
                </tr>
                <?php 
                    $qry=mysqli_query($con,"SELECT DISTINCT masalah_dominan AS masalah_dominan FROM tbl_ncp_qcf
                    WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1' ");
                    while($r=mysqli_fetch_array($qry)){
                ?>
                <tr align="center">
                    <td align="left"><?php if($r['masalah_dominan']==NULL){echo "NULL";}else if($r['masalah_dominan']==''){echo "";}else{echo $r['masalah_dominan'];} ?></td>
                    <?php 
                    $total2=0;
                    $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                    while($rDept=mysqli_fetch_array($qryDept)){
                    $qryBrt=mysqli_query($con,"SELECT SUM(berat) AS berat FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'
                    AND dept='$rDept[dept]' AND masalah_dominan='$r[masalah_dominan]' AND (peninjau_akhir='' OR peninjau_akhir IS NULL) AND `status`!='Cancel'");
                    while($rBrt=mysqli_fetch_array($qryBrt)){
                    ?>
                    <td align="right" valign="middle"><font size="-2"><?php echo $rBrt['berat'];?></font></td>
                    <?php $total2=$total2+$rBrt['berat'];} 
                    } ?>
                    <td align="right"><?php echo number_format($total2,2);?></td>
                </tr>
                <?php } 
                ?>
                <tr align="center">
                    <td align="center">&nbsp;</td>
                    <?php 
                    $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                    while($rDept=mysqli_fetch_array($qryDept)){
                    ?>
                    <td align="right" valign="middle"><font size="-2">&nbsp;</font></td>
                    <?php } 
                    ?>
                    <td align="right">&nbsp;</td>
                </tr>
                <tr align="center">
                    <td align="left">BS</td>
                    <?php 
                    $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                    while($rDept=mysqli_fetch_array($qryDept)){
                        $qrybs=mysqli_query($con,"SELECT SUM(berat) AS berat FROM tbl_ncp_qcf 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'
                        AND dept='$rDept[dept]' AND `status`='BS'");
                        $rbs=mysqli_fetch_array($qrybs);
                    ?>
                    <td align="right" valign="middle"><font size="-2"><?php if($rbs['berat']=='' OR $rbs['berat']==NULL){echo "0.00";}else{echo $rbs['berat'];}?></font></td>
                    <?php } 
                    ?>
                    <td align="right">&nbsp;</td>
                </tr>
            </tbody>
        </table></td>
    </tr>
    <tr>
        <td><table border="0" class="table-list1" width="100%">
            <?php 
                $qryAll1=mysqli_query($con,"SELECT * FROM 
                (SELECT IFNULL(
                    (SELECT SUM(berat) FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' AND `status`!='Cancel'
                AND (peninjau_akhir!='' OR peninjau_akhir!=NULL)),0) AS berat_dis) AS A,
                (SELECT IFNULL(
                    (SELECT SUM(berat) FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1' AND `status`!='Cancel'
                AND (peninjau_akhir='' OR peninjau_akhir IS NULL)),0) AS berat) AS B
                ");
                $rAll1=mysqli_fetch_array($qryAll1);
                ?>
                <tr>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="20%">Total NCP <?php echo date("F Y", strtotime($AkhirP1));?></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="3%">:</td>
                    <td align="right" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="10%"><?php echo number_format($rAll1['berat'],2);?></td>
                    <td align="right" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="5%"><?php echo number_format(($rAll1['berat']/$ProDye)*100,2)."%";?></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="30%">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="20%">Total Disposisi</td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="3%">:</td>
                    <td align="right" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="10%"><?php echo number_format($rAll1['berat_dis'],2);?></td>
                    <td align="right" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="5%">&nbsp;</td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="30%">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="20%">Total Produksi</td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="3%">:</td>
                    <td align="right" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="10%"><?php echo number_format($ProDye,2);?></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="5%">&nbsp;</td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="30%">&nbsp;</td>
                </tr>
        </table></td>
    </tr>
</table>
</body>
</html>
        