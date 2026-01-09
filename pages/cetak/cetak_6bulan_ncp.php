<?php
ini_set("error_reporting", 1);
session_start(); 
include "../../koneksi.php";
//--
$AwalP1=$_GET['awalp1'];
$AkhirP1=$_GET['akhirp1'];
$AwalP2=$_GET['awalp2'];
$AkhirP2=$_GET['akhirp2'];
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
<title>Cetak 6 Bulanan NCP</title>
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
                <td align="center"><strong><font size="+1">LAPORAN 6 BULANAN NCP</font><br />
                <font size="-1">BULAN: <?php echo strtoupper(date("F", strtotime($AwalP1)));?> s/d <?php echo strtoupper(date("F", strtotime($AkhirP1)));?> TAHUN <?php echo date("Y", strtotime($AwalP1));?></font>
                <br />
                </strong></td>
            </tr>
        </table></td>
    </tr>
</thead>
    <tr>
        <td><table width="100%" border="1" class="table-list1">
            <!--<thead>
                <tr align="center">
                    <td colspan="2"><font size="-2"><strong>&nbsp;</strong></font></td>
                    <td colspan="2"><font size="-2"><strong><?php echo date("F", strtotime($AwalP1));?>-<?php echo date("F Y", strtotime($AkhirP1));?></strong></font></td>
                    <td colspan="2"><font size="-2"><strong><?php echo date("F", strtotime($AwalP2));?>-<?php echo date("F Y", strtotime($AkhirP2));?></strong></font></td>
                </tr>
            </thead>-->
            <tbody>
                <?php
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                ?>
                    <!-- KNT BEGIN -->
                    <?php if($rDept['dept']=="KNT"){?>
                    <tr>
                        <td align="left" ><strong>1. KNT</strong></td>
                        <td align="center" ><font size="-2"><strong><?php echo date("F", strtotime($AwalP1));?>-<?php echo date("F Y", strtotime($AkhirP1));?></strong></font></td>
                        <td align="center" ><font size="-2"><strong><?php echo date("F", strtotime($AwalP2));?>-<?php echo date("F Y", strtotime($AkhirP2));?></strong></font></td>
                    </tr>
                    <tr>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $qryAllKnt=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='KNT' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllKnt=mysqli_fetch_array($qryAllKnt);
                            $qryAllKnt1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                            AND `dept`='KNT' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllKnt1=mysqli_fetch_array($qryAllKnt1);
                            $qryKnt=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='KNT' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($rKnt=mysqli_fetch_array($qryKnt)){
                            ?>
                            <tr>
                                <td align="left"><?php echo $rKnt['masalah_dominan']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">LAIN LAIN</td>
                            </tr>
                            <tr>
                                <td align="left">TOTAL</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tKnt=0; 
                            $tKnt1=0;
                            $qryKnt=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='KNT' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rKnt2=mysqli_fetch_array($qryKnt)){
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rKnt2['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rKnt2['berat']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tKnt=$tKnt+$rKnt2['berat'];
                            } 
                            $tKnt1=number_format($rAllKnt['berat_all']-$tKnt,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tKnt1,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tKnt1/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllKnt['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllKnt['berat_all']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tKnt2=0; 
                            $tKnt3=0; 
                            $qryKnt=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='KNT' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rKnt3=mysqli_fetch_array($qryKnt)){
                                $qryKnt3=mysqli_query($con,"SELECT SUM(berat) AS berat
                                FROM tbl_ncp_qcf
                                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                                AND `dept`='KNT' AND masalah_dominan='$rKnt3[masalah_dominan]'");
                                $rKnt4=mysqli_fetch_array($qryKnt3);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rKnt4['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rKnt4['berat']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tKnt2=$tKnt2+$rKnt4['berat'];
                            } 
                            $tKnt3=number_format($rAllKnt1['berat_all']-$tKnt2,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tKnt3,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tKnt3/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllKnt1['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllKnt1['berat_all']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                    </tr>
                    <?php } ?>
                    <!-- KNT END -->
                    <!-- DYE BEGIN --->
                    <?php if($rDept['dept']=="DYE"){?>
                    <tr>
                        <td align="left" colspan="3"><strong>2. DYE</strong></td>
                    </tr>
                    <tr>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $qryAllDye=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='DYE' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllDye=mysqli_fetch_array($qryAllDye);
                            $qryAllDye1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                            AND `dept`='DYE' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllDye1=mysqli_fetch_array($qryAllDye1);
                            $qryDye=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='DYE' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($rDye=mysqli_fetch_array($qryDye)){
                            ?>
                            <tr>
                                <td align="left"><?php echo $rDye['masalah_dominan']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">LAIN LAIN</td>
                            </tr>
                            <tr>
                                <td align="left">TOTAL</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tDye=0; 
                            $tDye1=0;
                            $qryDye=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='DYE' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rDye2=mysqli_fetch_array($qryDye)){
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rDye2['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rDye2['berat']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tDye=$tDye+$rDye2['berat'];
                            } 
                            $tDye1=number_format($rAllDye['berat_all']-$tDye,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tDye1,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tDye1/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllDye['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllDye['berat_all']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tDye2=0; 
                            $tDye3=0; 
                            $qryDye=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='DYE' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rDye3=mysqli_fetch_array($qryDye)){
                                $qryDye3=mysqli_query($con,"SELECT SUM(berat) AS berat
                                FROM tbl_ncp_qcf
                                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                                AND `dept`='DYE' AND masalah_dominan='$rDye3[masalah_dominan]'");
                                $rDye4=mysqli_fetch_array($qryDye3);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rDye4['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rDye4['berat']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tDye2=$tDye2+$rDye4['berat'];
                            } 
                            $tDye3=number_format($rAllDye1['berat_all']-$tDye2,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tDye3,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tDye3/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllDye1['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllDye1['berat_all']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                    </tr>
                    <?php } ?>
                    <!-- DYE END -->
                    <!-- LAB BEGIN --->
                    <?php if($rDept['dept']=="LAB"){?>
                    <tr>
                        <td align="left" colspan="3"><strong>3. LAB</strong></td>
                    </tr>
                    <tr>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $qryAllLab=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='LAB' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllLab=mysqli_fetch_array($qryAllLab);
                            $qryAllLab1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                            AND `dept`='LAB' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllLab1=mysqli_fetch_array($qryAllLab1);
                            $qryLab=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='LAB' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($rLab=mysqli_fetch_array($qryLab)){
                            ?>
                            <tr>
                                <td align="left"><?php echo $rLab['masalah_dominan']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">LAIN LAIN</td>
                            </tr>
                            <tr>
                                <td align="left">TOTAL</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tLab=0; 
                            $tLab1=0;
                            $qryLab=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='LAB' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rLab2=mysqli_fetch_array($qryLab)){
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rLab2['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rLab2['berat']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tLab=$tLab+$rLab2['berat'];
                            } 
                            $tLab1=number_format($rAllLab['berat_all']-$tLab,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tLab1,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tLab/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllLab['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllLab['berat_all']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tLab2=0; 
                            $tLab3=0; 
                            $qryLab=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='LAB' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rLab3=mysqli_fetch_array($qryLab)){
                                $qryLab3=mysqli_query($con,"SELECT SUM(berat) AS berat
                                FROM tbl_ncp_qcf
                                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                                AND `dept`='LAB' AND masalah_dominan='$rLab3[masalah_dominan]'");
                                $rLab4=mysqli_fetch_array($qryLab3);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rLab4['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rLab4['berat']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tLab2=$tLab2+$rLab4['berat'];
                            } 
                            $tLab3=number_format($rAllLab1['berat_all']-$tLab2,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tLab3,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tLab3/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllLab1['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllDye1['berat_all']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                    </tr>
                    <?php } ?>
                    <!-- LAB END -->
                    <!-- FIN BEGIN -->
                    <?php if($rDept['dept']=="FIN"){?>
                    <tr>
                        <td align="left" colspan="3"><strong>4. FIN</strong></td>
                    </tr>
                    <tr>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $qryAllFin=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='FIN' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllFin=mysqli_fetch_array($qryAllFin);
                            $qryAllFin1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                            AND `dept`='FIN' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllFin1=mysqli_fetch_array($qryAllFin1);
                            $qryFin=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='FIN' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($rFin=mysqli_fetch_array($qryFin)){
                            ?>
                            <tr>
                                <td align="left"><?php echo $rFin['masalah_dominan']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">LAIN LAIN</td>
                            </tr>
                            <tr>
                                <td align="left">TOTAL</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tFin=0; 
                            $tFin1=0;
                            $qryFin=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='FIN' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rFin2=mysqli_fetch_array($qryFin)){
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rFin2['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rFin2['berat']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tFin=$tFin+$rFin2['berat'];
                            } 
                            $tFin1=number_format($rAllFin['berat_all']-$tFin,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tFin1,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tFin1/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllFin['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllFin['berat_all']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tFin2=0; 
                            $tFin3=0; 
                            $qryFin=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='FIN' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rFin3=mysqli_fetch_array($qryFin)){
                                $qryFin3=mysqli_query($con,"SELECT SUM(berat) AS berat
                                FROM tbl_ncp_qcf
                                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                                AND `dept`='FIN' AND masalah_dominan='$rFin3[masalah_dominan]'");
                                $rFin4=mysqli_fetch_array($qryFin3);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rFin4['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rFin4['berat']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tFin2=$tFin2+$rFin4['berat'];
                            } 
                            $tFin3=number_format($rAllFin1['berat_all']-$tFin2,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tFin3,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tFin3/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllFin1['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllFin1['berat_all']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                    </tr>
                    <?php } ?>
                    <!-- FIN END -->
                    <!-- MKT BEGIN -->
                    <?php if($rDept['dept']=="MKT"){?>
                    <tr>
                        <td align="left" colspan="3"><strong>5. MKT</strong></td>
                    </tr>
                    <tr>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $qryAllMkt=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='MKT' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllMkt=mysqli_fetch_array($qryAllMkt);
                            $qryAllMkt1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                            AND `dept`='MKT' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllMkt1=mysqli_fetch_array($qryAllMkt1);
                            $qryMkt=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='MKT' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($rMkt=mysqli_fetch_array($qryMkt)){
                            ?>
                            <tr>
                                <td align="left"><?php echo $rMkt['masalah_dominan']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">LAIN LAIN</td>
                            </tr>
                            <tr>
                                <td align="left">TOTAL</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tMkt=0; 
                            $tMkt1=0;
                            $qryMkt=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='MKT' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rMkt2=mysqli_fetch_array($qryMkt)){
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rMkt2['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rMkt2['berat']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tMkt=$tMkt+$rMkt2['berat'];
                            } 
                            $tMkt1=number_format($rAllMkt['berat_all']-$tMkt,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tMkt1,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tMkt1/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllMkt['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllMkt['berat_all']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tMkt2=0; 
                            $tMkt3=0; 
                            $qryMkt=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='MKT' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rMkt3=mysqli_fetch_array($qryMkt)){
                                $qryMkt3=mysqli_query($con,"SELECT SUM(berat) AS berat
                                FROM tbl_ncp_qcf
                                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                                AND `dept`='MKT' AND masalah_dominan='$rMkt3[masalah_dominan]'");
                                $rMkt4=mysqli_fetch_array($qryMkt3);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rMkt4['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rMkt4['berat']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tMkt2=$tMkt2+$rMkt4['berat'];
                            } 
                            $tMkt3=number_format($rAllMkt1['berat_all']-$tMkt2,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tMkt3,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tMkt3/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllMkt1['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllMkt1['berat_all']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                    </tr>
                    <?php } ?>
                    <!-- MKT END -->
                    <!-- KNK BEGIN -->
                    <?php if($rDept['dept']=="KNK"){?>
                    <tr>
                        <td align="left" colspan="3"><strong>6. KNK</strong></td>
                    </tr>
                    <tr>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $qryAllKnk=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='KNK' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllKnk=mysqli_fetch_array($qryAllKnk);
                            $qryAllKnk1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                            AND `dept`='KNK' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllKnk1=mysqli_fetch_array($qryAllKnk1);
                            $qryKnk=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='KNK' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($rKnk=mysqli_fetch_array($qryKnk)){
                            ?>
                            <tr>
                                <td align="left"><?php echo $rKnk['masalah_dominan']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">LAIN LAIN</td>
                            </tr>
                            <tr>
                                <td align="left">TOTAL</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tKnk=0; 
                            $tKnk1=0;
                            $qryKnk=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='KNK' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rKnk2=mysqli_fetch_array($qryKnk)){
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rKnk2['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rKnk2['berat']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tKnk=$tKnk+$rKnk2['berat'];
                            } 
                            $tKnk1=number_format($rAllKnk['berat_all']-$tKnk,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tKnk1,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tKnk1/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllKnk['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllKnk['berat_all']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tKnk2=0; 
                            $tKnk3=0; 
                            $qryKnk=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='KNK' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rKnk3=mysqli_fetch_array($qryKnk)){
                                $qryKnk3=mysqli_query($con,"SELECT SUM(berat) AS berat
                                FROM tbl_ncp_qcf
                                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                                AND `dept`='KNK' AND masalah_dominan='$rKnk3[masalah_dominan]'");
                                $rKnk4=mysqli_fetch_array($qryKnk3);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rKnk4['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rKnk4['berat']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tKnk2=$tKnk2+$rKnk4['berat'];
                            } 
                            $tKnk3=number_format($rAllKnk1['berat_all']-$tKnk2,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tKnk3,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tKnk3/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllKnk1['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllKnk1['berat_all']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                    </tr>
                    <?php } ?>
                    <!-- KNK END -->
                    <!-- RMP BEGIN -->
                    <?php if($rDept['dept']=="RMP"){?>
                    <tr>
                        <td align="left" colspan="3"><strong>7. RMP</strong></td>
                    </tr>
                    <tr>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $qryAllRmp=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='RMP' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllRmp=mysqli_fetch_array($qryAllRmp);
                            $qryAllRmp1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                            AND `dept`='RMP' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllRmp1=mysqli_fetch_array($qryAllRmp1);
                            $qryRmp=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='RMP' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($rRmp=mysqli_fetch_array($qryRmp)){
                            ?>
                            <tr>
                                <td align="left"><?php echo $rRmp['masalah_dominan']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">LAIN LAIN</td>
                            </tr>
                            <tr>
                                <td align="left">TOTAL</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tRmp=0; 
                            $tRmp1=0;
                            $qryRmp=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='RMP' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rRmp2=mysqli_fetch_array($qryRmp)){
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rRmp2['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rRmp2['berat']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tRmp=$tRmp+$rRmp2['berat'];
                            }
                            $tRmp1=number_format($rAllRmp['berat_all']-$tRmp,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tRmp1,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tRmp1/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllRmp['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllRmp['berat_all']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tRmp2=0; 
                            $tRmp3=0; 
                            $qryRmp=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='RMP' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rRmp3=mysqli_fetch_array($qryRmp)){
                                $qryRmp3=mysqli_query($con,"SELECT SUM(berat) AS berat
                                FROM tbl_ncp_qcf
                                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                                AND `dept`='RMP' AND masalah_dominan='$rRmp3[masalah_dominan]'");
                                $rRmp4=mysqli_fetch_array($qryRmp3);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rRmp4['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rRmp4['berat']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tRmp2=$tRmp2+$rRmp4['berat'];
                            } 
                            $tRmp3=number_format($rAllRmp1['berat_all']-$tRmp2,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tRmp3,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tRmp3/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllRmp1['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllRmp1['berat_all']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                    </tr>
                    <?php } ?>
                    <!-- RMP END -->
                    <!-- PPC BEGIN -->
                    <?php if($rDept['dept']=="PPC"){?>
                    <tr>
                        <td align="left" colspan="3"><strong>8. PPC</strong></td>
                    </tr>
                    <tr>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $qryAllPpc=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='PPC' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllPpc=mysqli_fetch_array($qryAllPpc);
                            $qryAllPpc1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                            AND `dept`='PPC' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllPpc1=mysqli_fetch_array($qryAllPpc1);
                            $qryPpc=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='PPC' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($rPpc=mysqli_fetch_array($qryPpc)){
                            ?>
                            <tr>
                                <td align="left"><?php echo $rPpc['masalah_dominan']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">LAIN LAIN</td>
                            </tr>
                            <tr>
                                <td align="left">TOTAL</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tPpc=0; 
                            $tPpc1=0;
                            $qryPpc=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='PPC' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rPpc2=mysqli_fetch_array($qryPpc)){
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rPpc2['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rPpc2['berat']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tPpc=$tPpc+$rPpc2['berat'];
                            }
                            $tPpc1=number_format($rAllPpc['berat_all']-$tPpc,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tPpc1,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tPpc1/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllPpc['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllPpc['berat_all']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tPpc2=0; 
                            $tPpc3=0; 
                            $qryPpc=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='PPC' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rPpc3=mysqli_fetch_array($qryPpc)){
                                $qryPpc3=mysqli_query($con,"SELECT SUM(berat) AS berat
                                FROM tbl_ncp_qcf
                                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                                AND `dept`='RMP' AND masalah_dominan='$rPpc3[masalah_dominan]'");
                                $rPpc4=mysqli_fetch_array($qryPpc3);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rPpc4['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rPpc4['berat']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tPpc2=$tPpc2+$rPpc4['berat'];
                            } 
                            $tPpc3=number_format($rAllPpc1['berat_all']-$tPpc2,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tPpc3,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tPpc3/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllPpc1['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllPpc1['berat_all']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                    </tr>
                    <?php } ?>
                    <!-- PPC END -->
                    <!-- BRS BEGIN -->
                    <?php if($rDept['dept']=="BRS"){?>
                    <tr>
                        <td align="left" colspan="3"><strong><?php if($rDept['dept']=="PPC"){echo "9. BRS"; }else{echo "8. BRS";}?></strong></td>
                    </tr>
                    <tr>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $qryAllBrs=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='BRS' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllBrs=mysqli_fetch_array($qryAllBrs);
                            $qryAllBrs1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                            AND `dept`='BRS' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllBrs1=mysqli_fetch_array($qryAllBrs1);
                            $qryBrs=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='BRS' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($rBrs=mysqli_fetch_array($qryBrs)){
                            ?>
                            <tr>
                                <td align="left"><?php echo $rBrs['masalah_dominan']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">LAIN LAIN</td>
                            </tr>
                            <tr>
                                <td align="left">TOTAL</td>
                            </tr>
                            <tr>
                                <td align="left">% NCP Dibandingkan total produksi Brushing</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tBrs=0; 
                            $tBrs1=0;
                            $qryBrs=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='BRS' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rBrs2=mysqli_fetch_array($qryBrs)){
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rBrs2['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rBrs2['berat']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tBrs=$tBrs+$rBrs2['berat'];
                            } 
                            $tBrs1=number_format($rAllBrs['berat_all']-$tBrs,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tBrs1,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tBrs1/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllBrs['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllBrs['berat_all']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%">&nbsp;</td>
                                <td align="left" width="5%">&nbsp;</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllBrs['berat_all']/$ProBrs)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tBrs2=0; 
                            $tBrs3=0; 
                            $qryBrs=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='BRS' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rBrs3=mysqli_fetch_array($qryBrs)){
                                $qryBrs3=mysqli_query($con,"SELECT SUM(berat) AS berat
                                FROM tbl_ncp_qcf
                                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                                AND `dept`='FIN' AND masalah_dominan='$rBrs3[masalah_dominan]'");
                                $rBrs4=mysqli_fetch_array($qryBrs3);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rBrs4['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rBrs4['berat']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tBrs2=$tBrs2+$rBrs4['berat'];
                            } 
                            $tBrs3=number_format($rAllBrs1['berat_all']-$tBrs2,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tBrs3,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tBrs3/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllBrs1['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllBrs1['berat_all']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="left" width="10%">&nbsp;</td>
                                <td align="left" width="5%">&nbsp;</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllBrs1['berat_all']/$ProBrs1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                    </tr>
                    <?php } ?>
                    <!-- BRS END -->
                    <!-- GKG BEGIN -->
                    <?php if($rDept['dept']=="GKG"){?>
                    <tr>
                        <td align="left" colspan="3"><strong><?php if($rDept['dept']=="PPC"){echo "10. GKG"; }else{echo "9. GKG";}?></strong></td>
                    </tr>
                    <tr>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $qryAllGkg=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='GKG' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllGkg=mysqli_fetch_array($qryAllGkg);
                            $qryAllGkg1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                            AND `dept`='GKG' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllGkg1=mysqli_fetch_array($qryAllGkg1);
                            $qryGkg=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='GKG' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($rGkg=mysqli_fetch_array($qryGkg)){
                            ?>
                            <tr>
                                <td align="left"><?php echo $rGkg['masalah_dominan']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">LAIN LAIN</td>
                            </tr>
                            <tr>
                                <td align="left">TOTAL</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tGkg=0; 
                            $tGkg1=0;
                            $qryGkg=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='GKG' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rGkg2=mysqli_fetch_array($qryGkg)){
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rGkg2['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rGkg2['berat']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tGkg=$tGkg+$rGkg2['berat'];
                            }
                            $tGkg1=number_format($rAllGkg['berat_all']-$tGkg,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tGkg1,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tGkg1/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllGkg['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllGkg['berat_all']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tGkg2=0; 
                            $tGkg3=0; 
                            $qryGkg=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='GKG' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rGkg3=mysqli_fetch_array($qryGkg)){
                                $qryGkg3=mysqli_query($con,"SELECT SUM(berat) AS berat
                                FROM tbl_ncp_qcf
                                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                                AND `dept`='GKG' AND masalah_dominan='$rGkg3[masalah_dominan]'");
                                $rGkg4=mysqli_fetch_array($qryGkg3);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rGkg4['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rGkg4['berat']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tGkg2=$tGkg2+$rGkg4['berat'];
                            } 
                            $tGkg3=number_format($rAllGkg1['berat_all']-$tGkg2,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tGkg3,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tGkg3/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllGkg1['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllGkg1['berat_all']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                    </tr>
                    <?php } ?>
                    <!-- GKG END -->
                    <!-- GKJ BEGIN -->
                    <?php if($rDept['dept']=="GKJ"){?>
                    <tr>
                        <td align="left" colspan="3"><strong><?php if($rDept['dept']=="PPC"){echo "11. GKJ"; }else{echo "10. GKJ";}?></strong></td>
                    </tr>
                    <tr>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $qryAllGkj=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='GKJ' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllGkj=mysqli_fetch_array($qryAllGkj);
                            $qryAllGkj1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                            AND `dept`='GKJ' AND (masalah_dominan!=NULL OR masalah_dominan!='')");
                            $rAllGkj1=mysqli_fetch_array($qryAllGkj1);
                            $qryGkj=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='GKJ' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($rGkj=mysqli_fetch_array($qryGkj)){
                            ?>
                            <tr>
                                <td align="left"><?php echo $rGkj['masalah_dominan']; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">LAIN LAIN</td>
                            </tr>
                            <tr>
                                <td align="left">TOTAL</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tGkj=0; 
                            $tGkj1=0;
                            $qryGkj=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='GKJ' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rGkj2=mysqli_fetch_array($qryGkj)){
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rGkj2['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rGkj2['berat']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tGkj=$tGkj+$rGkj2['berat'];
                            }
                            $tGkj1=number_format($rAllGkj['berat_all']-$tGkj,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tGkj1,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tGkj1/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllGkj['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllGkj['berat_all']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $tGkj2=0; 
                            $tGkj3=0; 
                            $qryGkj=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='GKJ' AND (masalah_dominan!=NULL OR masalah_dominan!='')
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($rGkj3=mysqli_fetch_array($qryGkj)){
                                $qryGkj3=mysqli_query($con,"SELECT SUM(berat) AS berat
                                FROM tbl_ncp_qcf
                                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                                AND `dept`='GKJ' AND masalah_dominan='$rGkj3[masalah_dominan]'");
                                $rGkj4=mysqli_fetch_array($qryGkj3);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rGkj4['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rGkj4['berat']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $tGkj2=$tGkj2+$rGkj4['berat'];
                            } 
                            $tGkj3=number_format($rAllGkj1['berat_all']-$tGkj2,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($tGkj3,2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($tGkj3/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAllGkj1['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAllGkj1['berat_all']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                        </table></td>
                    </tr>
                    <?php } ?>
                    <!-- GKJ END -->
                <?php } ?>
            </tbody>
        </table></td>
    </tr>
</table>
</body>
</html>