<?php 
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
  $Awal=$_GET['awal'];
  $Akhir=$_GET['akhir'];
  $qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
  $rTgl=mysqli_fetch_array($qTgl);
  if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Reports Cocok Warna Dye</title>
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
              border-right:0px #000000 solid;"><strong><font size="+1">LAPORAN HARIAN COCOK WARNA DYE DEPARTEMEN QCF</font><br />
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
</table>
<tr>
    <td><table width="100%" border="1" class="table-list1">
        <thead>
          <tr align="center">
			      <td rowspan="2"><font size="-2"><strong>No.</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Tgl Celup</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>No Demand</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Langganan</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>PO</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Order</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Item</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Jenis Kain</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Warna</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>No Warna</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>No Mesin</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Colorist Dye</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Lot</strong></font></td>
            <td colspan="2"><font size="-2"><strong>Bruto</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Shift</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Status Warna</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Disposisi</strong></font></td>
            <td rowspan="2"><font size="-2"><strong>Colorist Qcf</strong></font></td>
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
      $rollOK=0;$brutoOK=0;$lotOK=0;$rollTBA=0;$brutoTBA=0;$lotTBA=0;
      $roll=0;$bruto=0;$lot=0;
      $Awal=$_GET['awal'];
      $Akhir=$_GET['akhir'];
      if($_GET['shift']!="ALL"){$shft=" AND `shift`='$_GET[shift]' "; }else{$shft=" ";}		
      $qry1=mysqli_query($con,"SELECT * FROM tbl_cocok_warna_dye
      WHERE tgl_celup BETWEEN '$Awal' AND '$Akhir' $shft AND `dept`='QCF' ORDER BY id ASC");
      $lotOK=0;$lotTBA=0;$lotTBB=0;$lotTBC=0;$lot=0;     
          while($row=mysqli_fetch_array($qry1)){
        ?>
          <tr valign="top">
          <td align="center"><font size="-2"><?php echo $no;?></font></td>
          <td align="center"><font size="-2"><?php echo $row['tgl_celup'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['nodemand'];?></font></td>
          <td><font size="-2"><?php echo substr($row['pelanggan'],0,7)." ".substr($row['pelanggan'],7,40);?></font></td>
          <td><font size="-2"><?php echo substr($row['no_po'],0,10)." ".substr($row['no_po'],10,20)." ".substr($row['no_po'],20,40);?></font></td>
          <td><font size="-2"><?php echo $row['no_order'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['no_item'];?></font></td>
          <td><font size="-2"><?php echo $row['jenis_kain'];?></font></td>
          <td><font size="-2"><?php echo substr($row['warna'],0,15)." ".substr($row['warna'],15,50);?></font></td>
          <td align="center"><font size="-2"><?php echo substr($row['no_warna'],0,10)." ".substr($row['no_warna'],10,50);?></font></td>
          <td align="center"><font size="-2"><?php echo $row['no_mesin'];?></font></td>
          <td align="center"><font size="-2"><?php echo substr($row['colorist_dye'],0,6)." ".substr($row['colorist_dye'],6,50);?></font></td>
          <td align="center"><font size="-2"><?php echo $row['lot'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['jml_roll'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['bruto'];?><font size="-2"></td>
          <td align="center"><font size="-2"><?php echo $row['shift'];?></font></td>
          <td align="center"><font size="-2"><?php echo $row['status_warna'];?></font></td>
          <td align="center"><font size="-2"><?php echo substr($row['disposisi'],0,6)." ".substr($row['disposisi'],6,50);?></font></td>
          <td align="center"><font size="-2"><?php echo substr($row['colorist_qcf'],0,6)." ".substr($row['colorist_qcf'],6,50);?></font></td>
          <td align="center"><font size="-2"><?php echo $row['ket'];?></font></td>
          </tr>
        <?php 
        if($row['status_warna']=="OK"){
          $rollOK += $row['jml_roll'];
          $brutoOK += $row['bruto'];
          $lotOK +=1;
            }
            if($row['status_warna']=="TOLAK BASAH"){
          $rollTBA += $row['jml_roll'];
          $brutoTBA += $row['bruto'];
          $lotTBA +=1;
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
 <tr >
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
    <td bgcolor="#FFFFFF"><strong>Agung</strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($lotAgung);?></strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($brutoAgung,'2');?></strong></td>
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
    <td align="right" bgcolor="#FFFFFF"><strong>OK</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotOK);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollOK);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoOK,'2');?></strong></td>
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
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td align="right" bgcolor="#FFFFFF"><strong>TOLAK BASAH</strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($lotTBA);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollTBA);?></strong></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoTBA,'2');?></strong></td>
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
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" bgcolor="#FFFFFF"><b>Total</b></td>
    <td align="right" bgcolor="#FFFFFF"><strong><?php echo $lot;?></strong></td>
     <td align="center" bgcolor="#FFFFFF"><strong><?php echo $roll;?></strong></td>
    <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($bruto,'2');?></strong></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
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
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
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
    <td bgcolor="#FFFFFF"><strong>Ujuk</strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($lotUjuk);?></strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($brutoUjuk,'2');?></strong></td>
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
    <td bgcolor="#FFFFFF">&nbsp;</td>
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
    <td bgcolor="#FFFFFF"><strong>Wawan</strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($lotWawan);?></strong></td>
    <td bgcolor="#FFFFFF"><strong><?php echo number_format($brutoWawan,'2');?></strong></td>
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
  </tr>  
    </table> 
      <br>
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
                            
                            
      