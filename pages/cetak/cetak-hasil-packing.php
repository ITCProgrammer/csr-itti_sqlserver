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
$Shift=$_GET['shift'];
$MC=$_GET['nomc'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%d-%b-%y') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Hasil Packing</title>
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
        <td align="center"><strong><font size="+1">LAPORAN HASIL PACKING SHIFT <?php echo $Shift; ?></font><br />
		<font size="-1">TANGGAL: <?php echo strtoupper(date("d/m/Y", strtotime($Awal)));?> S/D <?php echo strtoupper(date("d/m/Y", strtotime($Akhir)));?></font>
    </tr>
  </table>

		</td>
    </tr>
	</thead>
    <tr>
        <td><table width="100%" border="1" class="table-list1">
            <thead>
            <tr align="center">
                <td rowspan="3"><font size="-2"><strong>OPERATOR</strong></font></td>
                <td rowspan="3"><font size="-2"><strong>NO MESIN</strong></font></td>
                <td colspan="8"><font size="-2"><strong>TOTAL</strong></font></td>
            </tr>
            <tr align="center">
                <td colspan="4"><font size="-2"><strong>QTY KECIL</strong></font></td>
                <td colspan="4"><font size="-2"><strong>QTY BESAR</strong></font></td>
            </tr>
            <tr align="center">    
                <td><font size="-2"><strong>ROLL</strong></font></td>
                <td><font size="-2"><strong>BRUTO (KGs)</strong></font></td>
                <td><font size="-2"><strong>NETTO (KGs)</strong></font></td>
                <td><font size="-2"><strong>YD</strong></font></td>
                <td><font size="-2"><strong>ROLL</strong></font></td>
                <td><font size="-2"><strong>BRUTO (KGs)</strong></font></td>
                <td><font size="-2"><strong>NETTO (KGs)</strong></font></td>
                <td><font size="-2"><strong>YD</strong></font></td>
            </tr>
            </thead>
            <tbody>
            <?php 
            $t_rollB=0;
            $t_brutoB=0;
            $t_nettoB=0;
            $t_panjangB=0;
            $t_rollK=0;
            $t_brutoK=0;
            $t_nettoK=0;
            $t_panjangK=0;
            $Awal=$_GET['awal'];
            $Akhir=$_GET['akhir'];
			$jam1=$_GET['jam1'];
		  	$jam2=$_GET['jam2'];
		    $start_date= $Awal." ".$jam1;
            $stop_date= $Akhir." ".$jam2;	
            if($_GET['shift']!="ALL"){$shft=" AND `shift`='$_GET[shift]' "; }else{$shft=" ";}
            if($_GET['nomc']!="ALL"){ $nomc=" AND `no_mc` LIKE '%$_GET[nomc]' ";}else{$nomc=" ";}	
            if($_GET['group']!="ALL"){ $grp=" AND `inspektor` LIKE '%$_GET[group]' ";}else{$grp=" ";}		
            $qry1=mysqli_query($con,"SELECT operator,no_mc FROM tbl_lap_inspeksi
            WHERE DATE_FORMAT( CONCAT(tgl_update,' ',jam_update), '%Y-%m-%d %H:%i') between '$start_date' and '$stop_date' $shft $nomc $grp AND `dept`='PACKING' GROUP BY operator,no_mc");
                while($row=mysqli_fetch_array($qry1)){
                    //QTY KECIL
                    $qryKecil=mysqli_query($con,"SELECT SUM(jml_roll) as roll, SUM(bruto) AS bruto, SUM(netto) AS netto, SUM(panjang) AS panjang FROM tbl_lap_inspeksi
                    WHERE tgl_update BETWEEN '$Awal' AND '$Akhir' $shft $grp AND `dept`='PACKING' AND operator='$row[operator]' AND no_mc='$row[no_mc]' AND ket_qty='Quantity Kecil'");
                    $rowKecil=mysqli_fetch_array($qryKecil);
                    //QTY BESAR
                    $qryBesar=mysqli_query($con,"SELECT SUM(jml_roll) as roll, SUM(bruto) AS bruto, SUM(netto) AS netto, SUM(panjang) AS panjang FROM tbl_lap_inspeksi
                    WHERE tgl_update BETWEEN '$Awal' AND '$Akhir' $shft $grp AND `dept`='PACKING' AND operator='$row[operator]' AND no_mc='$row[no_mc]' AND ket_qty='Quantity Besar'");
                    $rowBesar=mysqli_fetch_array($qryBesar);
					$sqlop="SELECT x.LONGDESCRIPTION FROM DB2ADMIN.INITIALS x
							WHERE CODE ='".$row['operator']."'"; 
                    $stmt1=db2_exec($conn1,$sqlop, array('cursor'=>DB2_SCROLLABLE));
                    $rowop = db2_fetch_assoc($stmt1);
            ?>
            <tr>
                <td align="center"><?php echo $rowop['LONGDESCRIPTION'];?></td>
                <td align="center"><?php echo $row['no_mc'];?></td>
                <td align="center"><?php echo $rowKecil['roll'];?></td>
                <td align="center"><?php echo $rowKecil['bruto'];?></td>
                <td align="center"><?php echo $rowKecil['netto'];?></td>
                <td align="center"><?php echo $rowKecil['panjang'];?></td>
                <td align="center"><?php echo $rowBesar['roll'];?></td>
                <td align="center"><?php echo $rowBesar['bruto'];?></td>
                <td align="center"><?php echo $rowBesar['netto'];?></td>
                <td align="center"><?php echo $rowBesar['panjang'];?></td>
            </tr>
                <?php
                $t_rollK=$t_rollK+$rowKecil['roll'];
                $t_brutoK=$t_brutoK+$rowKecil['bruto'];
                $t_nettoK=$t_nettoK+$rowKecil['netto'];
                $t_panjangK=$t_panjangK+$rowKecil['panjang']; 
                $t_rollB=$t_rollB+$rowBesar['roll'];
                $t_brutoB=$t_brutoB+$rowBesar['bruto'];
                $t_nettoB=$t_nettoB+$rowBesar['netto'];
                $t_panjangB=$t_panjangB+$rowBesar['panjang'];
                } ?>
            <tr>
                <td colspan="2" align="center"><font size="-2"><strong>TOTAL</strong></font></td>
                <td align="center"><font size="-2"><strong><?php echo $t_rollK;?></strong></font></td>
                <td align="center"><font size="-2"><strong><?php echo number_format($t_brutoK,2);?></strong></font></td>
                <td align="center"><font size="-2"><strong><?php echo number_format($t_nettoK,2);?></strong></font></td>
                <td align="center"><font size="-2"><strong><?php echo number_format($t_panjangK,2);?></strong></font></td>
                <td align="center"><font size="-2"><strong><?php echo $t_rollB;?></strong></font></td>
                <td align="center"><font size="-2"><strong><?php echo number_format($t_brutoB,2);?></strong></font></td>
                <td align="center"><font size="-2"><strong><?php echo number_format($t_nettoB,2);?></strong></font></td>
                <td align="center"><font size="-2"><strong><?php echo number_format($t_panjangB,2);?></strong></font></td>
            </tr>
            </tbody>
        </table></td>
    </tr>