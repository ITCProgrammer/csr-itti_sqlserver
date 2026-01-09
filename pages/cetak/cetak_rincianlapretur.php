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
if(!empty($_GET['total'])){
    $TotalKirim= $_GET['total'];
} else {
    $TotalKirim = 0;
}
//$Dept=$_GET['dept'];
//$Cancel=$_GET['cancel'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Detail Retur</title>
<script>

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
font-size: 9px;	
font-family:sans-serif, Roman, serif;	
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
  <thead>
    <tr>
        <td><table border="0" class="table-list1" width="100%"> 
            <tr>
                <td align="center" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="+1">LAPORAN RETURN</font><br />
                <font size="-1">BULAN <input name="nama5" type="text" placeholder="Ketik" size="12" style="font-size: 13px; font-weight:bold;" /></font>
                <br />
                <font size="-1">FW-06-QCF-02/02</font></strong></td>
            </tr>
         </table></td>
    </tr>
	</thead>
    <tr><td><br><br><br></td></tr>
    <?php
        $qryCek=mysqli_query($con,"SELECT DISTINCT t_jawab FROM tbl_detail_retur_now 
        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir'
        UNION
        SELECT DISTINCT t_jawab1 AS t_jawab FROM tbl_detail_retur_now 
        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND t_jawab1!=''
		 UNION
        SELECT 'YND' t_jawab FROM tbl_detail_retur_now 
        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (t_jawab = 'YND' or t_jawab1 = 'YND' or t_jawab2 = 'YND' )
		");
       $tdye=$tfin=$tknt=$tqcf=$tlab=$trmp=$tprt=$tpro=$tgkj=$tcst=$tgkg=$tknk=$tbrs=$ttas=0;
	   $totynd = 0 ;
        while($rCek=mysqli_fetch_array($qryCek)){
    ?>
    <?php if($rCek['t_jawab']=="DYE"){?>
	
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qrydye=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='DYE' OR `t_jawab1`='DYE' OR `t_jawab2`='DYE')");
                $rowdye=mysqli_fetch_array($qrydye);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowdye['t_jawab']=="DYE"){echo $rowdye['t_jawab'];}else if($rowdye['t_jawab1']=="DYE"){echo $rowdye['t_jawab1'];}else if($rowdye['t_jawab2']=="DYE"){echo $rowdye['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qrydye1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='DYE' OR `t_jawab1`='DYE' OR `t_jawab2`='DYE')");
                    $tdye=0;
                    while($rowdye1=mysqli_fetch_array($qrydye1)){
                        $qrydye2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowdye1[masalah_dominan]' AND (`t_jawab`='DYE' OR `t_jawab1`='DYE' OR `t_jawab2`='DYE')");
                        $totdye=0;
                        while($rowdye2=mysqli_fetch_array($qrydye2)){
                            $totdye=$totdye+$rowdye2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowdye1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totdye,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tdye=$tdye+$totdye;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tdye,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="FIN"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qryfin=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='FIN' OR `t_jawab1`='FIN' OR `t_jawab2`='FIN')");
                $rowfin=mysqli_fetch_array($qryfin);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowfin['t_jawab']=="FIN"){echo $rowfin['t_jawab'];}else if($rowfin['t_jawab1']=="FIN"){echo $rowfin['t_jawab1'];}else if($rowfin['t_jawab2']=="FIN"){echo $rowfin['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qryfin1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='FIN' OR `t_jawab1`='FIN' OR `t_jawab2`='FIN')");
                    $tfin=0;
                    while($rowfin1=mysqli_fetch_array($qryfin1)){
                        $qryfin2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowfin1[masalah_dominan]' AND (`t_jawab`='FIN' OR `t_jawab1`='FIN' OR `t_jawab2`='FIN')");
                        $totfin=0;
                        while($rowfin2=mysqli_fetch_array($qryfin2)){
                            $totfin=$totfin+$rowfin2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowfin1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totfin,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                    </tr>
                    <?php 
                    $tfin=$tfin+$totfin;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tfin,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="KNT"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qryknt=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='KNT' OR `t_jawab1`='KNT' OR `t_jawab2`='KNT')");
                $rowknt=mysqli_fetch_array($qryknt);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowknt['t_jawab']=="KNT"){echo $rowknt['t_jawab'];}else if($rowknt['t_jawab1']=="KNT"){echo $rowknt['t_jawab1'];}else if($rowknt['t_jawab2']=="KNT"){echo $rowknt['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qryknt1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='KNT' OR `t_jawab1`='KNT' OR `t_jawab2`='KNT')");
                    $tknt=0;
                    while($rowknt1=mysqli_fetch_array($qryknt1)){
                        $qryknt2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowknt1[masalah_dominan]' AND (`t_jawab`='KNT' OR `t_jawab1`='KNT' OR `t_jawab2`='KNT')");
                        $totknt=0;
                        while($rowknt2=mysqli_fetch_array($qryknt2)){
                            $totknt=$totknt+$rowknt2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowknt1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totknt,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tknt=$tknt+$totknt;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tknt,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="QCF"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qryqcf=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='QCF' OR `t_jawab1`='QCF' OR `t_jawab2`='QCF')");
                $rowqcf=mysqli_fetch_array($qryqcf);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowqcf['t_jawab']=="QCF"){echo $rowqcf['t_jawab'];}else if($rowqcf['t_jawab1']=="QCF"){echo $rowqcf['t_jawab1'];}else if($rowqcf['t_jawab2']=="QCF"){echo $rowqcf['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qryqcf1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='QCF' OR `t_jawab1`='QCF' OR `t_jawab2`='QCF')");
                    $tqcf=0;
                    while($rowqcf1=mysqli_fetch_array($qryqcf1)){
                        $qryqcf2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowqcf1[masalah_dominan]' AND (`t_jawab`='QCF' OR `t_jawab1`='QCF' OR `t_jawab2`='QCF')");
                        $totqcf=0;
                        while($rowqcf2=mysqli_fetch_array($qryqcf2)){
                            $totqcf=$totqcf+$rowqcf2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowqcf1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totqcf,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tqcf=$tqcf+$totqcf;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tqcf,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="PPC"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qryppc=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='PPC' OR `t_jawab1`='PPC' OR `t_jawab2`='PPC')");
                $rowppc=mysqli_fetch_array($qryppc);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowppc['t_jawab']=="PPC"){echo $rowppc['t_jawab'];}else if($rowppc['t_jawab1']=="PPC"){echo $rowppc['t_jawab1'];}else if($rowppc['t_jawab2']=="PPC"){echo $rowppc['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qryppc1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='PPC' OR `t_jawab1`='PPC' OR `t_jawab2`='PPC')");
                    $tppc=0;
                    while($rowppc1=mysqli_fetch_array($qryppc1)){
                        $qryppc2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowppc1[masalah_dominan]' AND (`t_jawab`='PPC' OR `t_jawab1`='PPC' OR `t_jawab2`='PPC')");
                        $totppc=0;
                        while($rowppc2=mysqli_fetch_array($qryppc2)){
                            $totppc=$totppc+$rowppc2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowppc1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totppc,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tppc=$tppc+$totppc;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tppc,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="MKT"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qrymkt=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='MKT' OR `t_jawab1`='MKT' OR `t_jawab2`='MKT')");
                $rowmkt=mysqli_fetch_array($qrymkt);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowmkt['t_jawab']=="MKT"){echo $rowmkt['t_jawab'];}else if($rowmkt['t_jawab1']=="MKT"){echo $rowmkt['t_jawab1'];}else if($rowmkt['t_jawab2']=="MKT"){echo $rowmkt['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qrymkt1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='MKT' OR `t_jawab1`='MKT' OR `t_jawab2`='MKT')");
                    $tmkt=0;
                    while($rowmkt1=mysqli_fetch_array($qrymkt1)){
                        $qrymkt2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowmkt1[masalah_dominan]' AND (`t_jawab`='MKT' OR `t_jawab1`='MKT' OR `t_jawab2`='MKT')");
                        $totmkt=0;
                        while($rowmkt2=mysqli_fetch_array($qrymkt2)){
                            $totmkt=$totmkt+$rowmkt2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowmkt1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totmkt,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tmkt=$tmkt+$totmkt;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tmkt,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="LAB"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qrylab=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='LAB' OR `t_jawab1`='LAB' OR `t_jawab2`='LAB')");
                $rowlab=mysqli_fetch_array($qrylab);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowlab['t_jawab']=="LAB"){echo $rowlab['t_jawab'];}else if($rowlab['t_jawab1']=="LAB"){echo $rowlab['t_jawab1'];}else if($rowlab['t_jawab2']=="LAB"){echo $rowlab['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qrylab1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='LAB' OR `t_jawab1`='LAB' OR `t_jawab2`='LAB')");
                    $tlab=0;
                    while($rowlab1=mysqli_fetch_array($qrylab1)){
                        $qrylab2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowlab1[masalah_dominan]' AND (`t_jawab`='LAB' OR `t_jawab1`='LAB' OR `t_jawab2`='LAB')");
                        $totlab=0;
                        while($rowlab2=mysqli_fetch_array($qrylab2)){
                            $totlab=$totlab+$rowlab2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowlab1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totlab,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tlab=$tlab+$totlab;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tlab,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
		 <?php if($rCek['t_jawab']=="YND"){?>
		 
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qrylab=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='YND' OR `t_jawab1`='YND' OR `t_jawab2`='YND')");
                $rowlab=mysqli_fetch_array($qrylab);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowlab['t_jawab']=="YND"){echo $rowlab['t_jawab'];}else if($rowlab['t_jawab1']=="YND"){echo $rowlab['t_jawab1'];}else if($rowlab['t_jawab2']=="YND"){echo $rowlab['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qrylab1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='YND' OR `t_jawab1`='YND' OR `t_jawab2`='YND')");
                    $tynd=0;
                    while($rowlab1=mysqli_fetch_array($qrylab1)){
                        $qrylab2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowlab1[masalah_dominan]' AND (`t_jawab`='YND' OR `t_jawab1`='YND' OR `t_jawab2`='YND')");
                        $totynd=0;
                        while($rowlab2=mysqli_fetch_array($qrylab2)){
                            $totynd=$totlab+$rowlab2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowlab1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totlab,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tlab=$tlab+$totlab;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tlab,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
		
		
        <?php if($rCek['t_jawab']=="RMP"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qryrmp=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='RMP' OR `t_jawab1`='RMP' OR `t_jawab2`='RMP')");
                $rowrmp=mysqli_fetch_array($qryrmp);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowrmp['t_jawab']=="RMP"){echo $rowrmp['t_jawab'];}else if($rowrmp['t_jawab1']=="RMP"){echo $rowrmp['t_jawab1'];}else if($rowrmp['t_jawab2']=="RMP"){echo $rowrmp['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qryrmp1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='RMP' OR `t_jawab1`='RMP' OR `t_jawab2`='RMP')");
                    $trmp=0;
                    while($rowrmp1=mysqli_fetch_array($qryrmp1)){
                        $qryrmp2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowrmp1[masalah_dominan]' AND (`t_jawab`='RMP' OR `t_jawab1`='RMP' OR `t_jawab2`='RMP')");
                        $totrmp=0;
                        while($rowrmp2=mysqli_fetch_array($qryrmp2)){
                            $totrmp=$totrmp+$rowrmp2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowrmp1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totrmp,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $trmp=$trmp+$totrmp;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($trmp,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="PRT"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qryprt=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='PRT' OR `t_jawab1`='PRT' OR `t_jawab2`='PRT')");
                $rowprt=mysqli_fetch_array($qryprt);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowprt['t_jawab']=="PRT"){echo $rowprt['t_jawab'];}else if($rowprt['t_jawab1']=="PRT"){echo $rowprt['t_jawab1'];}else if($rowprt['t_jawab2']=="PRT"){echo $rowprt['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qryprt1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='PRT' OR `t_jawab1`='PRT' OR `t_jawab2`='PRT')");
                    $tprt=0;
                    while($rowprt1=mysqli_fetch_array($qryprt1)){
                        $qryprt2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowprt1[masalah_dominan]' AND (`t_jawab`='PRT' OR `t_jawab1`='PRT' OR `t_jawab2`='PRT')");
                        $totprt=0;
                        while($rowprt2=mysqli_fetch_array($qryprt2)){
                            $totprt=$totprt+$rowprt2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowprt1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totprt,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tprt=$tprt+$totprt;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tprt,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="PRO"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qrypro=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='PRO' OR `t_jawab1`='PRO' OR `t_jawab2`='PRO')");
                $rowpro=mysqli_fetch_array($qrypro);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowpro['t_jawab']=="PRO"){echo $rowpro['t_jawab'];}else if($rowpro['t_jawab1']=="PRO"){echo $rowpro['t_jawab1'];}else if($rowpro['t_jawab2']=="PRO"){echo $rowpro['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qrypro1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='PRO' OR `t_jawab1`='PRO' OR `t_jawab2`='PRO')");
                    $tpro=0;
                    while($rowpro1=mysqli_fetch_array($qrypro1)){
                        $qrypro2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowpro1[masalah_dominan]' AND (`t_jawab`='PRO' OR `t_jawab1`='PRO' OR `t_jawab2`='PRO')");
                        $totpro=0;
                        while($rowpro2=mysqli_fetch_array($qrypro2)){
                            $totpro=$totpro+$rowpro2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowpro1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totpro,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tpro=$tpro+$totpro;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tpro,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="GKJ"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qrygkj=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='GKJ' OR `t_jawab1`='GKJ' OR `t_jawab2`='GKJ')");
                $rowgkj=mysqli_fetch_array($qrygkj);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowgkj['t_jawab']=="GKJ"){echo $rowgkj['t_jawab'];}else if($rowgkj['t_jawab1']=="GKJ"){echo $rowgkj['t_jawab1'];}else if($rowgkj['t_jawab2']=="GKJ"){echo $rowgkj['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qrygkj1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='GKJ' OR `t_jawab1`='GKJ' OR `t_jawab2`='GKJ')");
                    $tgkj=0;
                    while($rowgkj1=mysqli_fetch_array($qrygkj1)){
                        $qrygkj2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowgkj1[masalah_dominan]' AND (`t_jawab`='GKJ' OR `t_jawab1`='GKJ' OR `t_jawab2`='GKJ')");
                        $totgkj=0;
                        while($rowgkj2=mysqli_fetch_array($qrygkj2)){
                            $totgkj=$totgkj+$rowgkj2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowgkj1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totgkj,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tgkj=$tgkj+$totgkj;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tgkj,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="CST"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qrycst=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='CST' OR `t_jawab1`='CST' OR `t_jawab2`='CST')");
                $rowcst=mysqli_fetch_array($qrycst);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowcst['t_jawab']=="CST"){echo $rowcst['t_jawab'];}else if($rowcst['t_jawab1']=="CST"){echo $rowcst['t_jawab1'];}else if($rowcst['t_jawab2']=="CST"){echo $rowcst['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qrycst1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='CST' OR `t_jawab1`='CST' OR `t_jawab2`='CST')");
                    $tcst=0;
                    while($rowcst1=mysqli_fetch_array($qrycst1)){
                        $qrycst2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowcst1[masalah_dominan]' AND (`t_jawab`='CST' OR `t_jawab1`='CST' OR `t_jawab2`='CST')");
                        $totcst=0;
                        while($rowcst2=mysqli_fetch_array($qrycst2)){
                            $totcst=$totcst+$rowcst2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowcst1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totcst,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tcst=$tcst+$totcst;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tcst,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="GKG"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qrygkg=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='GKG' OR `t_jawab1`='GKG' OR `t_jawab2`='GKG')");
                $rowgkg=mysqli_fetch_array($qrygkg);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowgkg['t_jawab']=="GKG"){echo $rowgkg['t_jawab'];}else if($rowgkg['t_jawab1']=="GKG"){echo $rowgkg['t_jawab1'];}else if($rowgkg['t_jawab2']=="GKG"){echo $rowgkg['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qrygkg1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='GKG' OR `t_jawab1`='GKG' OR `t_jawab2`='GKG')");
                    $tgkg=0;
                    while($rowgkg1=mysqli_fetch_array($qrygkg1)){
                        $qrygkg2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowgkg1[masalah_dominan]' AND (`t_jawab`='GKG' OR `t_jawab1`='GKG' OR `t_jawab2`='GKG')");
                        $totgkg=0;
                        while($rowgkg2=mysqli_fetch_array($qrygkg2)){
                            $totgkg=$totgkg+$rowgkg2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowgkg1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totgkg,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tgkg=$tgkg+$totgkg;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tgkg,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="KNK"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qryknk=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='KNK' OR `t_jawab1`='KNK' OR `t_jawab2`='KNK')");
                $rowknk=mysqli_fetch_array($qryknk);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowknk['t_jawab']=="KNK"){echo $rowknk['t_jawab'];}else if($rowknk['t_jawab1']=="KNK"){echo $rowknk['t_jawab1'];}else if($rowknk['t_jawab2']=="KNK"){echo $rowknk['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qryknk1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='KNK' OR `t_jawab1`='KNK' OR `t_jawab2`='KNK')");
                    $tknk=0;
                    while($rowknk1=mysqli_fetch_array($qryknk1)){
                        $qryknk2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowknk1[masalah_dominan]' AND (`t_jawab`='KNK' OR `t_jawab1`='KNK' OR `t_jawab2`='KNK')");
                        $totknk=0;
                        while($rowknk2=mysqli_fetch_array($qryknk2)){
                            $totknk=$totknk+$rowknk2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowknk1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totknk,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tknk=$tknk+$totknk;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tknk,2)." Kg"; ?></strong></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="BRS"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qrybrs=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='BRS' OR `t_jawab1`='BRS' OR `t_jawab2`='BRS')");
                $rowbrs=mysqli_fetch_array($qrybrs);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowbrs['t_jawab']=="BRS"){echo $rowbrs['t_jawab'];}else if($rowbrs['t_jawab1']=="BRS"){echo $rowbrs['t_jawab1'];}else if($rowbrs['t_jawab2']=="BRS"){echo $rowbrs['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qrybrs1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='BRS' OR `t_jawab1`='BRS' OR `t_jawab2`='BRS')");
                    $tbrs=0;
                    while($rowbrs1=mysqli_fetch_array($qrybrs1)){
                        $qrybrs2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowbrs1[masalah_dominan]' AND (`t_jawab`='BRS' OR `t_jawab1`='BRS' OR `t_jawab2`='BRS')");
                        $totbrs=0;
                        while($rowbrs2=mysqli_fetch_array($qrybrs2)){
                            $totbrs=$totbrs+$rowbrs2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowbrs1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totbrs,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tbrs=$tbrs+$totbrs;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tbrs,2)." Kg"; ?></strong></td
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="TAS"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qrytas=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='TAS' OR `t_jawab1`='TAS' OR `t_jawab2`='TAS')");
                $rowtas=mysqli_fetch_array($qrytas);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowtas['t_jawab']=="TAS"){echo $rowtas['t_jawab'];}else if($rowtas['t_jawab1']=="TAS"){echo $rowtas['t_jawab1'];}else if($rowtas['t_jawab2']=="TAS"){echo $rowtas['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qrytas1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='TAS' OR `t_jawab1`='TAS' OR `t_jawab2`='TAS')");
                    $ttas=0;
                    while($rowtas1=mysqli_fetch_array($qrytas1)){
                        $qrytas2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowtas1[masalah_dominan]' AND (`t_jawab`='TAS' OR `t_jawab1`='TAS' OR `t_jawab2`='TAS')");
                        $tottas=0;
                        while($rowtas2=mysqli_fetch_array($qrytas2)){
                            $tottas=$tottas+$rowtas2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowtas1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tottas,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $ttas=$ttas+$tottas;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($ttas,2)." Kg"; ?></strong></td
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="CQA"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qryCQA=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='CQA' OR `t_jawab1`='CQA' OR `t_jawab2`='CQA')");
                $rowCQA=mysqli_fetch_array($qryCQA);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowCQA['t_jawab']=="CQA"){echo $rowCQA['t_jawab'];}else if($rowCQA['t_jawab1']=="CQA"){echo $rowCQA['t_jawab1'];}else if($rowCQA['t_jawab2']=="CQA"){echo $rowCQA['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qryCQA1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='CQA' OR `t_jawab1`='CQA' OR `t_jawab2`='CQA')");
                    $tCQA=0;
                    while($rowCQA1=mysqli_fetch_array($qryCQA1)){
                        $qryCQA2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowCQA1[masalah_dominan]' AND (`t_jawab`='CQA' OR `t_jawab1`='CQA' OR `t_jawab2`='CQA')");
                        $totCQA=0;
                        while($rowCQA2=mysqli_fetch_array($qryCQA2)){
                            $totCQA=$totCQA+$rowCQA2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowCQA1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totCQA,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tCQA=$tCQA+$totCQA;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tCQA,2)." Kg"; ?></strong></td
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
        <?php if($rCek['t_jawab']=="CSR"){?>
    <tr>
        
        <td align="center"><table border="0" class="table-list1" width="65%">
            <?php
                $no=1;
                $Awal=$_GET['awal'];
                $Akhir=$_GET['akhir'];		
                $qryCSR=mysqli_query($con,"SELECT t_jawab,t_jawab1,t_jawab2 FROM tbl_detail_retur_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='CSR' OR `t_jawab1`='CSR' OR `t_jawab2`='CSR')");
                $rowCSR=mysqli_fetch_array($qryCSR);
            ?>
            <tr>
                <td align="left" valign="middle" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><strong><font size="-1">MASALAH <?php if($rowCSR['t_jawab']=="CSR"){echo $rowCSR['t_jawab'];}else if($rowCSR['t_jawab1']=="CSR"){echo $rowCSR['t_jawab1'];}else if($rowCSR['t_jawab2']=="CSR"){echo $rowCSR['t_jawab2'];} ?></font></strong></td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;"><table border="0" class="table-list1" width="100%">
                    <?php
                    $qryCSR1=mysqli_query($con,"SELECT DISTINCT masalah_dominan FROM tbl_detail_retur_now 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND (`t_jawab`='CSR' OR `t_jawab1`='CSR' OR `t_jawab2`='CSR')");
                    $tCSR=0;
                    while($rowCSR1=mysqli_fetch_array($qryCSR1)){
                        $qryCSR2=mysqli_query($con,"SELECT t_jawab, t_jawab1, t_jawab2, IF(t_jawab2!='',kg/3,IF(t_jawab1!='',kg/2,kg)) AS kg FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND masalah_dominan='$rowCSR1[masalah_dominan]' AND (`t_jawab`='CSR' OR `t_jawab1`='CSR' OR `t_jawab2`='CSR')");
                        $totCSR=0;
                        while($rowCSR2=mysqli_fetch_array($qryCSR2)){
                            $totCSR=$totCSR+$rowCSR2['kg'];
                        }
                    ?>
                    <tr>
                        <td width="55%" align="left" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo $rowCSR1['masalah_dominan']; ?></strong></td>
                        <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        <td width="20%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($totCSR,2)." Kg"; ?></strong></td>
                        <td width="10%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;">&nbsp;</td>
                        
                    </tr>
                    <?php 
                    $tCSR=$tCSR+$totCSR;
                    }?>
                    <tr>
                        <td width="75%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid;" colspan="3">===========</td>
                        <td width="25%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><strong><?php echo number_format($tCSR,2)." Kg"; ?></strong></td
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
        <?php }?>
    <?php }
    $total=$tdye+$tfin+$tknt+$tqcf+$tppc+$tmkt+$tlab+$trmp+$tprt+$tpro+$tgkj+$tcst+$tgkg+$tknk+$tbrs+$ttas+$tCQA+$tCSR;
    $totalreturn=$tdye+$tfin+$tknt+$tqcf+$tlab+$trmp+$tprt+$tpro+$tgkj+$tgkg+$tknk+$tbrs+$ttas+$tCQA+$tCSR+$totynd;
    ?>
    <tr><td><br><br><br><br><br><br></td></tr>
    <tr>
        <td align="center"><table border="0" class="table-list1" width="65%">
            <tr>
                <td width="20%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 13px;" align="right"><strong> TOTAL </strong></td>
                <td width="30%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="left"> &nbsp;</td>
                <td width="30%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 13px;" align="left">&nbsp;</td>
                <td width="20%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="right"> <strong><?php echo number_format($total,2)." Kg";?> </strong></td>
            </tr>
        </table></td>
    </tr>
    <tr><td><br><br><br><br><br><br></td></tr>
    <?php 
        $qrybss=mysqli_query($con,"SELECT SUM(kg) as kgbss, ket FROM tbl_detail_retur_now 
        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND ket LIKE '%BSS%'");
        $rowbss=mysqli_fetch_array($qrybss);
    ?>
    <tr>
        <td align="center"><table border="0" class="table-list1" width="65%">
            <tr>
                <td width="20%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 11px;" align="left"> KAIN BSS  (Sisa Cutting Loss)</td>
                <td width="8%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 11px;" align="left"> &nbsp;</td>
                <td width="10%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="right"><strong><?php if($rowbss['kgbss']!=0 OR $rowbss['kgbss']!=NULL){echo number_format($rowbss['kgbss'],2)." Kg";}else{echo "- &nbsp; &nbsp; Kg";}?> </strong></td>
                <td width="10%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="left"> &nbsp;</td>
            </tr>
            <?php 
                $qrybs=mysqli_query($con,"SELECT SUM(kg) as kgbs, ket FROM tbl_detail_retur_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND tgl_sjretur!='0000-00-00' AND ket LIKE '%BS'");
                $rowbs=mysqli_fetch_array($qrybs);
            ?>
            <tr>
                <td width="20%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 11px;" align="left"> KAIN BS</td>
                <td width="8%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 11px;" align="left"> &nbsp;</td>
                <td width="10%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="right"><strong><?php if($rowbs['kgbs']!=0 OR $rowbs['kgbs']!=NULL){echo number_format($rowbs['kgbs'],2)." Kg";}else{echo "- &nbsp; &nbsp; Kg";}?> </strong></td>
                <td width="10%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="left"> &nbsp;</td>
            </tr>
            <?php 
            $totbs=$rowbss['kgbss']+$rowbs['kgbs'];
            ?>
            <tr>
                <td width="20%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 11px;" align="left"> &nbsp;</td>
                <td width="8%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 11px;" align="left"> &nbsp;</td>
                <td width="10%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="right"><strong>===========</strong></td>
                <td width="10%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="right"><strong><?php if($totbs!=0 OR $totbs!=NULL){echo number_format($totbs,2)." Kg";}else{echo "- &nbsp; &nbsp; Kg";}?></strong></td>
            </tr>
        </table></td>
    </tr>
    <tr><td><br><br><br><br><br><br></td></tr>
    <tr><td><br><br><br><br><br><br></td></tr>
    <tr>
        <td align="center"><table border="0" class="table-list1" width="65%">
            <tr>
                <td width="5%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="left"> Total Return :</td>
                <td width="5%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="right"><?php echo number_format($totalreturn,2);?></td>
                <td width="15%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="left"><?php echo "KG";?></td>
            </tr>
            <tr>
                <td width="6%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="left"> Total Kirim :</td>
                <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><?php echo number_format($TotalKirim,2);?></td></td>
                <td width="15%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="left"><?php echo "KG";?></td>
            </tr>
            <tr>
                <td width="6%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="left"> Persentase :</td>
                <td width="5%" align="right" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;"><?php if(!empty($_GET['total'])){
                                                                                                    echo round((($TotalKirim-$totalreturn)/$TotalKirim)*100,2);
                                                                                                }else {echo number_format(0);}
                                                                                                ?></td>
                <td width="15%" style="border-top:0px #000000 solid; 
                                    border-bottom:0px #000000 solid;
                                    border-left:0px #000000 solid; 
                                    border-right:0px #000000 solid; font-size: 12px;" align="left">%</td>
            </tr>
        </table></td>
    </tr>
    <tr>
      <td align="center"><table border="0" class="table-list1" width="70%">
        <tr align="center">
          <td width="20%" >&nbsp;</td>
          <td width="20%" >Dibuat oleh:</td>
          <td width="20%" >Diperiksa oleh :</td>
          <td width="20%" >Diketahui oleh :</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td align="center"><input name="nama" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama1" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama2" type="text" placeholder="Ketik" size="10" /></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td align="center"><input name="nama" type="text" placeholder="Ketik" size="12" /></td>
          <td align="center"><input name="nama1" type="text" placeholder="Ketik" size="12" /></td>
          <td align="center"><input name="nama2" type="text" placeholder="Ketik" size="12" /></td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td align="center"><?php echo date("d-M-y", strtotime($rTgl['tgl_skrg']));?></td>
          <td align="center"><?php echo date("d-M-y", strtotime($rTgl['tgl_skrg']));?></td>
          <td align="center"><?php echo date("d-M-y", strtotime($rTgl['tgl_skrg']));?></td>
        </tr>
        <tr>
          <td valign="top" style="height: 0.5in;" >Tanda Tangan</td>
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