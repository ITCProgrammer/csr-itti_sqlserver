<?php 
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
  $Awal=$_GET['awal'];
  $Akhir=$_GET['akhir'];
  $qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
  $rTgl=mysqli_fetch_array($qTgl);
  if($Awal!=""){
	  $tgl=substr($Awal,0,10); 
	  $jam=$Awal;
  }else{
	  $tgl=$rTgl['tgl_skrg']; 
	  $jam=$rTgl['jam_skrg'];
  }
  $jamA = isset($_GET['jam_awal']) ? $_GET['jam_awal'] : '';
  $jamAr = isset($_GET['jam_akhir']) ? $_GET['jam_akhir'] : '';
  if (strlen($jamA) == 5) {
    $start_date = $Awal . " " . $jamA;
  } else {
    $start_date = $Awal . " 0" . $jamA;
  }
  if (strlen($jamAr) == 5) {
    $stop_date = $Akhir . " " . $jamAr;
  } else {
    $stop_date = $Akhir . " 0" . $jamAr;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Reports Cocok Warna Fin</title>
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
<table width="100%" border="0" class="table-list1">
  <thead>
      <tr>
        <td style="border-top:0px #000000 solid; 
        border-bottom:0px #000000 solid;
        border-left:0px #000000 solid; 
        border-right:0px #000000 solid;"><table width="100%" border="0" class="table-list1"> 
          <tr>
            <td align="center" style="border-top:0px #000000 solid; 
              border-bottom:0px #000000 solid;
              border-left:0px #000000 solid; 
              border-right:0px #000000 solid;"><strong><font size="+1">LAPORAN HARIAN COCOK WARNA DEPARTEMEN QCF</font><br />
            <font size="-1">FW-12-QCF-17 / 01</font>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="1" class="table-list1"> 
          <tr>
            <td align="left" valign="bottom"><strong><font size="-1">Tanggal : <?php echo date("d F Y",strtotime($_GET['awal']))." ".$jamA ;?></font><br />
            <font size="-1">Shift : <?php echo $_GET['shift'];?></font>
          </tr>
        </table></td>
      </tr>
  </thead>
  <tr>
    <td><table width="100%" border="1" class="table-list1">
        <thead>
          <tr align="center">
			      <td rowspan="2"><font size="-2"><strong>No.</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Tgl Fin</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>No Demand</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Langganan</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>PO</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Order</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Item</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Jenis Kain</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Warna</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>No Warna</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Lot</strong></font></td>
            <td colspan="2"><font size="-2"><strong>Bruto</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Shift</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Status Warna</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Code Proses</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Colorist</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Tgl Celup</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Keterangan</strong></font></td>
          </tr>
          <tr align="center">
            <td><font size="-2"><strong>Jml Rol</strong></font></td>
            <td><font size="-2"><strong>Qty (Kgs)</strong></font></td>
          </tr>
		</thead>
		<tbody>  
		<?php
      $no=1;
      $Awal=$_GET['awal'];
      $Akhir=$_GET['akhir'];
      if($_GET['shift']!="ALL"){$shft=" AND `shift`='$_GET[shift]' "; }else{$shft=" ";}		
      $qry1=mysqli_query($con,"SELECT * FROM tbl_lap_inspeksi WHERE DATE_FORMAT( CONCAT(tgl_update,' ',jam_update), '%Y-%m-%d %H:%i') BETWEEN '$start_date' AND '$stop_date' AND `dept`='QCF' $shft ORDER BY id ASC");
      $lotOK=0;$lotBWA=0;$lotBWB=0;$lotBWC=0;$lotTBD=0;$lot=0;
      $lotFin=0;$lotFin1x=0;$lotPdr=0;$lotOven=0;$lotComp=0;
      $lotSt=0;$lotAP=0;$lotPB=0;
      $rollOK=0;$rollBWA=0;$rollBWB=0;$rollBWC=0;$rollTBD=0;$roll=0;
      $rollFin=0;$rollFin1x=0;$rollPdr=0;$rollOven=0;$rollComp=0;
      $rollSt=0;$rollAP=0;$rollPB=0;$roll=0;
      $brutoOK=0;$brutoBWA=0;$brutoBWB=0;$brutoBWC=0;$brutoTBD=0;$bruto=0;
      $brutoFin=0;$brutoFin1x=0;$brutoPdr=0;$brutoOven=0;$brutoComp=0;
      $brutoSt=0;$brutoAP=0;$brutoPB=0;$bruto=0;
          while($row=mysqli_fetch_array($qry1)){
        ?>
          <tr valign="top">
          <td align="center"><font size="-2"><?php echo $no;?></font></td>
          <td align="center"><font size="-2"><?php echo $row['tgl_update'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['nodemand'];?></font></td>
          <td><font size="-2"><?php echo substr($row['pelanggan'],0,7)." ".substr($row['pelanggan'],7,40);?></font></td>
          <td><font size="-2"><?php echo substr($row['no_po'],0,10)." ".substr($row['no_po'],10,20)." ".substr($row['no_po'],20,40);?></font></td>
          <td><font size="-2"><?php echo $row['no_order'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['no_item'];?></font></td>
          <td><font size="-2"><?php echo $row['jenis_kain'];?></font></td>
          <td><font size="-2"><?php echo substr($row['warna'],0,15)." ".substr($row['warna'],15,50);?></font></td>
          <td align="center"><font size="-2"><?php echo substr($row['no_warna'],0,10)." ".substr($row['no_warna'],10,50);?></font></td>
          <td align="center"><font size="-2"><?php echo $row['lot'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['jml_roll'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['bruto'];?><font size="-2"></td>
          <td align="center"><font size="-2"><?php echo $row['shift'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['status'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['proses'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['colorist_qcf'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['tgl_pengiriman'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['catatan'];?></font></td>
          </tr>
        <?php 
        if($row['proses']=="Fin"){
          $rollFin += $row['jml_roll'];
          $brutoFin += $row['bruto'];
          $lotFin +=1;
            }
          if($row['proses']=="Fin 1X"){
          $rollFin1x += $row['jml_roll'];
          $brutoFin1x += $row['bruto'];
          $lotFin1x += 1;
            }
            if($row['proses']=="Pdr"){
          $rollPdr += $row['jml_roll'];
          $brutoPdr += $row['bruto'];
          $lotPdr +=1;
            }
             if($row['proses']=="Oven"){
          $rollOven += $row['jml_roll'];
          $brutoOven += $row['bruto'];
          $lotOven +=1;
            }
             if($row['proses']=="Comp"){
          $rollComp += $row['jml_roll'];
          $brutoComp += $row['bruto'];
          $lotComp +=1;
            }
             if($row['proses']=="Setting"){
          $rollSt += $row['jml_roll'];
          $brutoSt += $row['bruto'];
          $lotSt +=1;
            }
             if($row['proses']=="AP"){
          $rollAP += $row['jml_roll'];
          $brutoAP += $row['bruto'];
          $lotAP +=1;
            }
             if($row['proses']=="PB"){
          $rollPB += $row['jml_roll'];
          $brutoPB += $row['bruto'];
          $lotPB +=1;
            }
            if($row['status']=="OK"){
          $rollOK += $row['jml_roll'];
          $brutoOK += $row['bruto'];
          $lotOK +=1;
            }
            if($row['status']=="BW"){
          $rollBWA += $row['jml_roll'];
          $brutoBWA += $row['bruto'];
          $lotBWA +=1;
            }
             if($row['status']=="TBD"){
          $rollTBD += $row['jml_roll'];
          $brutoTBD += $row['bruto'];
          $lotTBD +=1;
            }
          if($row['colorist_qcf']=="AGUNG"){
            $rollAgung += $row['jml_roll'];
            $brutoAgung += $row['bruto'];
            $lotAgung +=1;
          }
          if($row['colorist_qcf']=="AGUS"){
            $rollAgus += $row['jml_roll'];
            $brutoAgus += $row['bruto'];
            $lotAgus +=1;
          }
          if($row['colorist_qcf']=="DEWI"){
            $rollDewi += $row['jml_roll'];
            $brutoDewi += $row['bruto'];
            $lotDewi +=1;
          }
          if($row['colorist_qcf']=="ANDI"){
            $rollAndi += $row['jml_roll'];
            $brutoAndi += $row['bruto'];
            $lotAndi +=1;
          }
          if($row['colorist_qcf']=="RUDI"){
            $rollRudi += $row['jml_roll'];
            $brutoRudi += $row['bruto'];
            $lotRudi +=1;
          }
          if($row['colorist_qcf']=="FERRY"){
            $rollFerry += $row['jml_roll'];
            $brutoFerry += $row['bruto'];
            $lotFerry +=1;
          }
		  if($row['colorist_qcf']=="UJUK"){
            $rollUjuk += $row['jml_roll'];
            $brutoUjuk += $row['bruto'];
            $lotUjuk +=1;
          }	
		  if($row['colorist_qcf']=="TRI"){
            $rollTri += $row['jml_roll'];
            $brutoTri += $row['bruto'];
            $lotTri +=1;
          }	  
          if($row['colorist_qcf']=="WAWAN"){
            $rollWawan += $row['jml_roll'];
            $brutoWawan += $row['bruto'];
            $lotWawan +=1;
          }	
			  
          $roll += $row['jml_roll'];
          $bruto += $row['bruto'];
          $lot +=1;
        $no++;
        } 
        ?>
        </tbody>
        <tr>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
  </tr>
  <tr bgcolor="#99FFFF">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><strong>Agung</strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($lotAgung);?></strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($brutoAgung,'2');?></strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF"><strong>OK</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotOK);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollOK);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoOK,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong>Fin</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotFin);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollFin);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoFin,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr bgcolor="#99FFFF">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><strong>Agus</strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($lotAgus);?></strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($brutoAgus,'2');?></strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF"><strong>TBD</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotTBD);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollTBD);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoTBD,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong>Fin 1X</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotFin1x);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollFin1x);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoFin1x,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr bgcolor="#99FFFF">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><strong>Andi</strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($lotAndi);?></strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($brutoAndi,'2');?></strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF"><strong>BW</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotBWA);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollBWA);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoBWA,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong>Pdr</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotPdr);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollPdr);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoPdr,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr bgcolor="#99FFFF">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><strong>Dewi</strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($lotDewi);?></strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($brutoDewi,'2');?></strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF"><strong>Oven</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotOven);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollOven);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoOven,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr bgcolor="#99FFFF">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><strong>Ferry</strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($lotFerry);?></strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($brutoFerry,'2');?></strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF"><strong>Comp</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotComp);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollComp);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoComp,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr bgcolor="#99FFFF">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><strong>Rudi</strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($lotRudi);?></strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($brutoRudi,'2');?></strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF"><strong>Setting</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotSt);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollSt);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoSt,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr bgcolor="#99FFFF">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><strong>Ujuk</strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($lotUjuk);?></strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($brutoUjuk,'2');?></strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF"><strong>AP</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotAP);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollAP);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoAP,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr bgcolor="#99FFFF">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><strong>Tri</strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($lotTri);?></strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($brutoTri,'2');?></strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF"><strong>PB</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotPB);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollPB);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoPB,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr bgcolor="#99FFFF">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><strong>Wawan</strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($lotWawan);?></strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($brutoWawan,'2');?></strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr bgcolor="#99FFFF">
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" bgcolor="#FFFFFF"><b>Total</b></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo $lot;?></strong></td>
     <td align="center" bgcolor="#FFFFFF"><strong><?php echo $roll;?></strong></td>
    <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($bruto,'2');?></strong></td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
     <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
  </tr> 
      </table></td>
    </tr>
 
  </table> <br>
   <table width="100%" border="0" class="table-list1"> 
  <tr align="center">
    <td colspan="3">&nbsp;</td>
    <td colspan="15">Departemen QCF</td>
    </tr>
  <tr align="center">
    <td colspan="3">&nbsp;</td>
    <td>Diserahkan Oleh :</td>
    <td colspan="3">Diketahui Oleh :</td>
    <td colspan="4">Mengetahui Oleh :</td>
  </tr>
  <tr>
    <td colspan="3">Nama</td>
    <td align="center"><input type=text name=nama placeholder="Ketik disini"></td>
    <td colspan="3" align="center"><input type=text name=nama1 placeholder="Ketik disini"></td>
    <td colspan="4" align="center"><input type=text name=nama4 placeholder="Ketik disini"></td>
  </tr>
  <tr>
    <td colspan="3">Jabatan</td>
    <td align="center"><input type=text name=nama2 placeholder="Ketik disini"></td>
    <td colspan="3" align="center"><input type=text name=nama3 placeholder="Ketik disini"></td>
    <td colspan="4" align="center"><input type=text name=nama5 placeholder="Ketik disini"></td>
  </tr>
  <tr>
    <td colspan="3">Tanggal</td>
    <td align="center"><b><?php echo date("d-m-Y",strtotime($_GET['awal']));?></b></td>
    <td colspan="3" align="center"><b><?php echo date("d-m-Y",strtotime($_GET['awal']));?></b></td>
    <td colspan="4" align="center"><b><?php echo date("d-m-Y",strtotime($_GET['awal']));?></b></td>
  </tr>
  <tr>
    <td colspan="3" height="60" valign="top">Tanda Tangan</td>
    <td><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
    <td colspan="3">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
<script>
//alert('cetak');window.print();
</script>                          

</body>
                            
                            
      