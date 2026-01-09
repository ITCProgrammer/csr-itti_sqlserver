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
            <thead>
                <tr align="center">
                    <td><font size="-2"><strong>&nbsp;</strong></font></td>
                    <td><font size="-2"><strong><?php echo date("F", strtotime($AwalP1));?>-<?php echo date("F Y", strtotime($AkhirP1));?></strong></font></td>
                    <td><font size="-2"><strong><?php echo date("F", strtotime($AwalP2));?>-<?php echo date("F Y", strtotime($AkhirP2));?></strong></font></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $totalP1=0;
                $totalP2=0;
                $qryDept=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                ?>
                    <!-- BEGIN -->
                    <tr>
                        <td align="left" colspan="3"><strong><?php echo $no.". ".$rDept['dept'];?></strong></td>
                    </tr>
                    <tr>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $qryAll=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='$rDept[dept]'");
                            $rAll=mysqli_fetch_array($qryAll);
                            $qryAll1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                            AND `dept`='$rDept[dept]'");
                            $rAll1=mysqli_fetch_array($qryAll1);
                            $qry=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='$rDept[dept]'
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($r=mysqli_fetch_array($qry)){
                            ?>
                            <tr>
                                <td align="left"><?php if($r['masalah_dominan']==NULL OR $r['masalah_dominan']==''){echo "NULL";}else{echo $r['masalah_dominan'];} ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">LAIN LAIN</td>
                            </tr>
                            <tr>
                                <td align="left">TOTAL</td>
                            </tr>
                            <?php if($rDept['dept']=="BRS"){?>
                            <tr>
                                <td align="left">% NCP Dibandingkan total produksi Brushing</td>
                            </tr>
                            <?php } ?>
                            <?php if($rDept['dept']=="PRT"){?>
                            <tr>
                                <td align="left">% NCP Dibandingkan total produksi Printing</td>
                            </tr>
                            <?php } ?>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $t=0; 
                            $t1=0;
                            $qry=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='$rDept[dept]'
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($r2=mysqli_fetch_array($qry)){
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($r2['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($r2['berat']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $t=$t+$r2['berat'];
                            } 
                            $t1=number_format($rAll['berat_all']-$t,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo $t1; ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($t1/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAll['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAll['berat_all']/$ProDye)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php if($rDept['dept']=="BRS"){?>
                            <tr>
                                <td align="right" width="10%">&nbsp;</td>
                                <td align="left" width="5%">&nbsp;</td>
                                <td align="right" width="10%"><?php echo number_format(($rAll['berat_all']/$ProBrs)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php } ?>
                            <?php if($rDept['dept']=="PRT"){?>
                            <tr>
                                <td align="right" width="10%">&nbsp;</td>
                                <td align="left" width="5%">&nbsp;</td>
                                <td align="right" width="10%"><?php echo number_format(($rAll['berat_all']/$ProPrt)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php } ?>
                        </table></td>
                        <td><table border="0" class="table-list1" width="100%">
                            <?php
                            $t2=0; 
                            $t3=0; 
                            $qry=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='$rDept[dept]'
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5"); 
                            while($r3=mysqli_fetch_array($qry)){
                                $qry3=mysqli_query($con,"SELECT SUM(berat) AS berat
                                FROM tbl_ncp_qcf
                                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP2' AND '$AkhirP2'
                                AND `dept`='$rDept[dept]' AND masalah_dominan='$r3[masalah_dominan]'");
                                $r4=mysqli_fetch_array($qry3);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($r4['berat'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($r4['berat']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php 
                            $t2=$t2+$r4['berat'];
                            } 
                            $t3=number_format($rAll1['berat_all']-$t2,2);
                            ?>
                            <tr>
                                <td align="right" width="10%"><?php echo $t3; ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($t3/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <tr>
                                <td align="right" width="10%"><?php echo number_format($rAll1['berat_all'],2); ?></td>
                                <td align="left" width="5%">Kg</td>
                                <td align="right" width="10%"><?php echo number_format(($rAll1['berat_all']/$ProDye1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php if($rDept['dept']=="BRS"){?>
                            <tr>
                                <td align="right" width="10%">&nbsp;</td>
                                <td align="left" width="5%">&nbsp;</td>
                                <td align="right" width="10%"><?php echo number_format(($rAll1['berat_all']/$ProBrs1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php } ?>
                            <?php if($rDept['dept']=="PRT"){?>
                            <tr>
                                <td align="right" width="10%">&nbsp;</td>
                                <td align="left" width="5%">&nbsp;</td>
                                <td align="right" width="10%"><?php echo number_format(($rAll1['berat_all']/$ProPrt1)*100,2); ?></td>
                                <td align="left" width="5%">%</td>
                            </tr>
                            <?php } ?>
                        </table></td>
                    </tr>
                    <!-- END -->
                <?php $no++;
                $totalP1=$totalP1+$rAll['berat_all'];
                $totalP2=$totalP2+$rAll1['berat_all'];
                } ?>
                <tr>
                    <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong>Grand Total NCP</strong></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><?php echo $totalP1." Kg";?> &nbsp; <?php echo number_format(($totalP1/$ProDye)*100,2)." %";?></strong></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><?php echo $totalP2." Kg";?> &nbsp; <?php echo number_format(($totalP2/$ProDye1)*100,2)." %";?></strong></td>
                </tr>
                <tr>
                    <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong>Total Produksi Dyeing</strong></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><?php echo $ProDye." Kg";?></strong></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><?php echo $ProDye1." Kg";?></strong></td>
                </tr>
                <tr>
                    <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong>Total Produksi Brushing</strong></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><?php echo $ProBrs." Kg";?></strong></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><?php echo $ProBrs1." Kg";?></strong></td>
                </tr>
                <tr>
                    <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong>Total Produksi Printing</strong></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><?php echo $ProPrt." Kg";?></strong></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><?php echo $ProPrt1." Kg";?></strong></td>
                </tr>
            </tbody>
        </table></td>
    </tr>
    <tr>
        <td><table border="0" class="table-list1" width="100%">
            <tr>
                <td align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong>% TOTAL NCP PER DEPARTEMEN PERIODE <?php echo strtoupper(date("F", strtotime($AwalP1)));?>-<?php echo strtoupper(date("F Y", strtotime($AkhirP1)));?> DIBANDINGKAN TOTAL PRODUKSI DYEING</strong></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><table border="0" class="table-list1" width="40%">
            <thead>
                <tr align="center">
                    <td><font size="-2"><strong>&nbsp;</strong></font></td>
                    <td><font size="-2"><strong>DEPARTEMEN NCP</strong></font></td>
                    <td><font size="-2"><strong>QTY</strong></font></td>
                    <td><font size="-2"><strong>%</strong></font></td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no1=1;
                    $total=0; 
                    $qryDept1=mysqli_query($con,"SELECT DISTINCT dept FROM tbl_ncp_qcf 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                    while($rDept1=mysqli_fetch_array($qryDept1)){
                        $qryAll2=mysqli_query($con,"SELECT SUM(berat) AS berat FROM tbl_ncp_qcf
                        WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                        AND `dept`='$rDept1[dept]'");
                        $rAll2=mysqli_fetch_array($qryAll2);
                ?>
                <tr>
                    <td align="center"><?php echo $no1;?></td>
                    <td align="left"><?php echo $rDept1['dept'];?></td>
                    <td align="right"><?php if($rAll2['berat']==NULL){echo "0";}else{echo $rAll2['berat'];}?></td>
                    <td align="center"><?php echo number_format(($rAll2['berat']/$ProDye)*100,2);?></td>
                </tr>
                    <?php $no1++;
                    $total=$total+$rAll2['berat'];
                    } ?>
                <tr>
                    <td align="center" colspan="2">TOTAL NCP</td>
                    <td align="right"><?php echo number_format($total,2);?></td>
                    <td align="center" rowspan="2"><?php echo number_format(($total/$ProDye)*100,2);?></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">TOTAL PRODUKSI DYEING <?php echo strtoupper(date("F", strtotime($AwalP1)));?>-<?php echo strtoupper(date("F Y", strtotime($AkhirP1)));?></td>
                    <td align="right"><?php echo number_format($ProDye,2);?></td>
                </tr>
            </tbody>
        </table></td>
    </tr>
</table>
</body>
</html>