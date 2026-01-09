<?php 
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
  $Awal=$_GET['awal'];
  $Akhir=$_GET['akhir'];
  $jamA	= $_GET['jam_awal'];
  $jamAr	= $_GET['jam_akhir'];
  $qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
  $rTgl=mysqli_fetch_array($qTgl);
  if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
  if(strlen($jamA)==5){
    $start_date = $Awal.' '.$jamA;
  }else{ 
    $start_date = $Awal.' 0'.$jamA;
  }	
  if(strlen($jamAr)==5){
    $stop_date  = $Akhir.' '.$jamAr;
  }else{ 
    $stop_date  = $Akhir.' 0'.$jamAr;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Laporan Jahit Shading</title>
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
              border-right:0px #000000 solid;"><strong><font size="+1">LAPORAN JAHIT SHADING DEPARTEMEN QCF</font><br />
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="1" class="table-list1"> 
          <tr>
            <td align="left" valign="bottom"><strong><font size="-1">Tanggal : <?php echo date("d F Y",strtotime($_GET['awal']));?></font><br />
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
            <td rowspan="2"><font size="-2"><strong>Shift</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Group Shift</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>No KK</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Langganan</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>PO</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Order</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Jenis Kain</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Warna</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>No Warna</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Lot</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Lebar</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Gramasi</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Item</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Hanger</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Roll</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Qty Bruto</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Roll Cek Shading</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Oke</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>%</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Reject</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>%</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Roll Oke</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Roll Reject</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Operator</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Comment</strong></font></td>
          </tr>
		    </thead>
		    <tbody>  
          <?php
            $no=1;
            if($Langganan!=""){ $lgn=" AND `pelanggan` LIKE '%$Langganan%' ";}else{$lgn=" ";}
            if($Item!=""){ $noitem=" AND `no_item` LIKE '%$Item%' ";}else{$noitem=" ";}
            if($Hanger!=""){ $nohanger=" AND `no_hanger` LIKE '%$Hanger%' ";}else{$nohanger=" ";}
            if($Warna!=""){ $wn=" AND `warna` LIKE '%$Warna%' ";}else{$wn=" ";}
            if($PO!=""){ $nopo=" AND `no_po` LIKE '%$PO%' ";}else{$nopo=" ";}
            if($Order!=""){ $noorder=" AND `no_order` LIKE '%$Order%' ";}else{$noorder=" ";}
            if($Awal!="" or $Langganan!="" or $Item!="" or $Hanger!="" or $Warna!="" or $PO!="" or $Order!=""){
              $qry1=mysqli_query($con,"SELECT * FROM tbl_lap_jahit_shading WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' $lgn $noitem $nohanger $wn $nopo $noorder ORDER BY id ASC");
            }else{
              $qry1=mysqli_query($con,"SELECT * FROM tbl_lap_jahit_shading WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' $lgn $noitem $nohanger $wn $nopo $noorder ORDER BY id ASC");
            }
            while($row1=mysqli_fetch_array($qry1)){
          ?>
          <tr valign="top">
            <td align="center"><font size="-2"><?php echo $no; ?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['shift'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['groupshift'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['nokk'];?></font></td>
            <td><font size="-2"><?php echo $row1['pelanggan'];?></font></td>
            <td><font size="-2"><?php echo $row1['no_po'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['no_order'];?></font></td>
            <td><font size="-2"><?php echo substr($row1['jenis_kain'],0,15)."...";?></font></td>
            <td align="left"><font size="-2"><?php echo substr($row1['warna'],0,10)."...";?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['no_warna'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['lot'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['lebar'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['gramasi'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['no_item'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['no_hanger'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['roll_bruto'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['bruto'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['roll_inspek'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['roll_ok'];?></font></td>
            <td align="center"><font size="-2"><?php if($row1['roll_inspek']!=0){echo number_format(($row1['roll_ok']/$row1['roll_inspek'])*100,2);}else{echo "0.00";}?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['roll_reject'];?></font></td>
            <td align="center"><font size="-2"><?php if($row1['roll_inspek']!=0){echo number_format(($row1['roll_reject']/$row1['roll_inspek'])*100,2);}else{echo "0.00";}?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['ket_roll_ok']; ?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['ket_roll_reject']; ?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['operator']; ?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['comment']; ?></font></td>
          </tr>
          <?php 
          if($row1['groupshift']=="A"){
            $rollA += $row1['roll_inspek'];
            $brutoA += $row1['bruto'];
            $lotA +=1;
              }
              if($row1['groupshift']=="B"){
            $rollB += $row1['roll_inspek'];
            $brutoB += $row1['bruto'];
            $lotB +=1;
              }
            if($row1['groupshift']=="C"){
              $rollC += $row1['roll_inspek'];
              $brutoC += $row1['bruto'];
              $lotC +=1;
              }
            $roll += $row1['roll_inspek'];
            $bruto += $row1['bruto'];
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
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td align="right" bgcolor="#FFFFFF"><strong>A</strong></td>
        <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotA);?></strong></td>
        <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollA);?></strong></td>
        <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoA,'2');?></strong></td>
        <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
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
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td align="right" bgcolor="#FFFFFF"><strong>B</strong></td>
        <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotB);?></strong></td>
        <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollB);?></strong></td>
        <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoB,'2');?></strong></td>
        <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
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
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td align="right" bgcolor="#FFFFFF"><strong>C</strong></td>
        <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotC);?></strong></td>
        <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollC);?></strong></td>
        <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoC,'2');?></strong></td>
        <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
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
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td align="right" bgcolor="#FFFFFF"><strong>Total</strong></td>
        <td align="right" bgcolor="#FFFFFF"><strong><?php echo $lot;?></strong></td>
        <td align="center" bgcolor="#FFFFFF"><strong><?php echo $roll;?></strong></td>
        <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($bruto,'2');?></strong></td>
        <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  </table> <br>
   <table width="100%" border="0" class="table-list1"> 
  <tr align="center">
    <td colspan="3">&nbsp;</td>
    <td colspan="17">Departemen QCF</td>
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
                            
                            
      