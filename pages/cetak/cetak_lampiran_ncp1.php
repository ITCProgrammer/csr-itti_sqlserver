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
            <td><table width="100%" border="1" class="table-list1"> 
                <tr>
                    <td align="center"><strong>LAMPIRAN DATA NCP</strong></td>
                </tr>
            </table></td>
        </tr>
    </thead>
    <tr>
        <td><table width="100%" border="1" class="table-list1">
            <thead>
                <tr align="left">
                    <td colspan="3"><font size="-2"><strong>NCP <?php echo strtoupper(date("F Y", strtotime($AkhirP1)));?></strong></font></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalP1=0;
                $totalP2=0;
                $qryDept=mysqli_query("SELECT DISTINCT dept FROM tbl_ncp_qcf 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalP1' AND '$AkhirP1'");
                while($rDept=mysqli_fetch_array($qryDept)){
                ?>
                <tr>
                    <td align="left" colspan="3"><strong><?php echo $rDept['dept'];?></strong></td>
                </tr>
                <tr>
                    <td align="center"><strong>Quality Issue</strong></td>
                    <td align="center"><strong>Qty</strong></td>
                    <td align="center"><strong>%</strong></td>
                </tr>
                <tr>
                    <td><table border="0" class="table-list1" width="100%">
                        <?php
                            $qryAll=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='$rDept[dept]' AND `status`!='Cancel'");
                            $rAll=mysqli_fetch_array($qryAll);
                            $qry=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='$rDept[dept]' AND `status`!='Cancel'
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
                    </table></td>
                    <td><table border="0" class="table-list1" width="100%">
                        <?php
                            $t=0; 
                            $t1=0;
                            $qry=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='$rDept[dept]' AND `status`!='Cancel'
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($r2=mysqli_fetch_array($qry)){
                        ?>
                         <tr>
                            <td align="right"><?php echo number_format($r2['berat'],2); ?></td>
                        </tr>
                        <?php 
                        $t=$t+$r2['berat'];
                        } 
                        $t1=number_format($rAll['berat_all']-$t,2);?>
                        <tr>
                            <td align="right" width="10%"><?php echo $t1; ?></td>
                        </tr>
                        <tr>
                            <td align="right" width="10%"><?php echo number_format($rAll['berat_all'],2); ?></td>
                        </tr>
                    </table></td>
                    <td><table border="0" class="table-list1" width="100%">
                        <?php
                            $qry=mysqli_query($con,"SELECT DISTINCT masalah_dominan, SUM(berat) AS berat FROM tbl_ncp_qcf
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1'
                            AND `dept`='$rDept[dept]' AND `status`!='Cancel'
                            GROUP BY masalah_dominan
                            ORDER BY berat DESC LIMIT 5");
                            while($r3=mysqli_fetch_array($qry)){
                        ?>
                         <tr>
                            <td align="right">&nbsp;</td>
                        </tr>
                        <?php 
                        } 
                        ?>
                        <tr>
                            <td align="right" width="10%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="right" width="10%"><?php echo number_format(($rAll['berat_all']/$ProDye)*100,2); ?></td>
                        </tr>
                    </table></td>
                </tr>
                <?php } ?>
            </tbody>
        </table></td>
    </tr>
    <tr>
        <td><table border="0" class="table-list1" width="100%">
            <?php 
                $qryAll1=mysqli_query($con,"SELECT SUM(berat) AS berat_all FROM tbl_ncp_qcf
                WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d') BETWEEN '$AwalP1' AND '$AkhirP1' AND `status`!='Cancel'
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
                                            border-right:0px #000000 solid;" width="10%"><?php echo number_format($rAll1['berat_all'],2);?></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="30%">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="20%">Total Produksi Dyeing <?php echo date("F Y", strtotime($AkhirP1));?></td>
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
                                            border-right:0px #000000 solid;" width="30%">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="20%">%</td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="3%">:</td>
                    <td align="right" style="border-top:0px #000000 solid; 
                                            border-bottom:0px #000000 solid;
                                            border-left:0px #000000 solid; 
                                            border-right:0px #000000 solid;" width="10%"><?php echo number_format(($rAll1['berat_all']/$ProDye)*100,2)."%";?></td>
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