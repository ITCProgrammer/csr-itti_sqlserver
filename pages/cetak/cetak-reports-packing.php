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
<title>Cetak Reports Packing</title>
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
              border-right:0px #000000 solid;"><strong><font size="+1">LAPORAN PACKING QC</font><br />
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="1" class="table-list1"> 
          <tr>
            <td align="left" valign="bottom" width="79%"><strong><font size="-1">Tanggal : <?php echo date("d F Y",strtotime($_GET['awal']));?> s/d <?php echo date("d F Y",strtotime($_GET['akhir']));?></font><br />
            <font size="-1">Shift : <?php echo $_GET['shift'];?></font><br />
            <font size="-1">No MC : <?php echo $_GET['nomc'];?>
            <td width="21%"><table width="100%" border="0" class="table-list1">
                <tr>
                    <td width="43%" scope="col">No Form</td>
                    <td width="10%" scope="col">:</td>
                    <td width="47%" scope="col">&nbsp;</td>
                </tr>
                <tr>
                    <td>No. Revisi</td>
                    <td>:</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Tgl. Terbit</td>
                    <td>:</td>
                    <td>&nbsp;</td>
                </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
  </thead>
  <tr>
    <td><table width="100%" border="1" class="table-list1">
        <thead>
        <tr align="center" bgcolor="#CCCCCC">
            <td rowspan="2" bgcolor="#F5F5F5">No</td>
            <td rowspan="2" bgcolor="#F5F5F5">Langganan</td>
            <td rowspan="2" bgcolor="#F5F5F5">No Order</td>
            <td rowspan="2" bgcolor="#F5F5F5" style="width:1in;">Jenis Kain</td>
            <td rowspan="2" bgcolor="#F5F5F5">Warna</td>
            <td rowspan="2" bgcolor="#F5F5F5">Tgl Pengiriman</td>
            <td rowspan="2" bgcolor="#F5F5F5">Lot</td>
            <td rowspan="2" bgcolor="#F5F5F5">Group</td>
            <td rowspan="2" bgcolor="#F5F5F5">No MC</td>
            <td colspan="2" bgcolor="#F5F5F5"style="width:0.05in;">Bruto</td>
            <td colspan="2" bgcolor="#F5F5F5">Netto</td>
            <td rowspan="2" bgcolor="#F5F5F5">Yard/Meter</td>
            <td rowspan="2" bgcolor="#F5F5F5">Proses</td>
            <td rowspan="2" bgcolor="#F5F5F5">Status</td>
            <td rowspan="2" bgcolor="#F5F5F5">Jam Mutasi</td>
            <td rowspan="2" bgcolor="#F5F5F5">Catatan</td>
        </tr>
        <tr align="center" bgcolor="#CCCCCC">
            <td bgcolor="#F5F5F5">Jml Rol</td>
            <td bgcolor="#F5F5F5">Qty (KGs)</td>
            <td bgcolor="#F5F5F5">Jml Rol</td>
            <td bgcolor="#F5F5F5">Qty (KGs)</td>
        </tr>
		</thead>
		<tbody>  
		<?php
      $no=1;
      $rollO=0;$brutoO=0;$nettoO=0;$rollF=0;$brutoF=0;$nettoF=0;
      $rollL=0;$brutoL=0;$nettoL=0;$rollOK=0;$brutoOK=0;$nettoOK=0;
      $rollBW=0;$brutoBW=0;$nettoBW=0;$rollTCW=0;$brutoTCW=0;$nettoTCW=0;
      $roll=0;$bruto=0;$netto=0;
      $Awal=$_GET['awal'];
      $Akhir=$_GET['akhir'];
      if($_GET['shift']!="ALL"){$shft=" AND `shift`='$_GET[shift]' "; }else{$shft=" ";}
      if($_GET['nomc']!="ALL"){ $nomc=" AND `no_mc` LIKE '%$_GET[nomc]' ";}else{$nomc=" ";}
      if($_GET['group']!="ALL"){ $grp=" AND `inspektor` LIKE '%$_GET[group]' ";}else{$grp=" ";}		
      $qry1=mysqli_query($con,"SELECT * FROM tbl_lap_inspeksi
      WHERE tgl_update BETWEEN '$Awal' AND '$Akhir' $shft $nomc $grp AND `dept`='PACKING' ORDER BY id ASC");
          while($row=mysqli_fetch_array($qry1)){
        ?>
          <tr>
                <td align="center"><?php echo $no;?></td>
                <td><?php echo $row['pelanggan'];?></td>
                <td><?php echo substr($row['no_order'],0,6)." ".substr($row['no_order'],6,10);?></td>
                <td><?php echo $row['jenis_kain'];?></td>
                <td><?php echo substr($row['warna'],0,7)." ".substr($row['warna'],7,20);?></td>
                <td align="center"><?php echo $row['tgl_pengiriman'];?></td>
                <td align="center"><?php echo $row['lot'];?></td>
                <td align="center"><?php echo $row['inspektor'];?></td>
                <td align="center"><?php echo $row['no_mc'];?></td>
                <td align="center"><?php echo $row['jml_roll'];?></td>
                <td align="center"><?php echo $row['bruto'];?></td>
                <td align="center"><?php echo $row['jml_netto'];?></td>
                <td align="center"><?php echo $row['netto'];?></td>
                <td align="right" valign="top"><?php echo $row['panjang']." ".$row['satuan'];?></td>
                <td align="center"><?php echo $row['proses'];?></td>
                <td align="center"><?php echo $row['status'];?></td>
                <td align="center"><?php echo $row['jam_mutasi'];?></td>
                <td><?php echo $row['catatan'];?></td>
            </tr>
 
      <?php
	  if($row['proses']=="O"){
        $rollO += $row['jml_roll'];
        $brutoO += $row['bruto'];
        $nettoO += $row['netto'];
          if($row['satuan']=="Yard"){
          $panjangYO +=$row['panjang'];  
          }else if($row['satuan']=="Meter"){
          $panjangMO +=$row['panjang'];	
          }		  
              
        }
        if($row['proses']=="F"){
        $rollF += $row['jml_roll'];
        $brutoF += $row['bruto'];
        $nettoF += $row['netto'];
          if($row['satuan']=="Yard"){
          $panjangYF +=$row['panjang'];  
          }else if($row['satuan']=="Meter"){
          $panjangMF +=$row['panjang'];	
          }  
            }
            if($row['proses']=="L"){
        $rollL += $row['jml_roll'];
        $brutoL += $row['bruto'];
        $nettoL += $row['netto'];
          if($row['satuan']=="Yard"){
          $panjangYL +=$row['panjang'];  
          }else if($row['satuan']=="Meter"){
          $panjangML +=$row['panjang'];	
          }		  
            }
            if($row['status']=="OK"){
        $rollOK += $row['jml_roll'];
        $brutoOK += $row['bruto'];
        $nettoOK += $row['netto'];
            }
            if($row['status']=="BW"){
        $rollBW += $row['jml_roll'];
        $brutoBW += $row['bruto'];
        $nettoBW += $row['netto'];
            }
            if($row['status']=="TCW"){
        $rollTCW += $row['jml_roll'];
        $brutoTCW += $row['bruto'];
        $nettoTCW += $row['netto'];
            }
            
        $roll += $row['jml_roll'];
        $bruto += $row['bruto'];
        $netto += $row['netto'];
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
        </tr>
        <tr bgcolor="#99FFFF">
            <td bgcolor="#FFFFFF">&nbsp;</td>
            
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF"><strong>OK=</strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollOK);?></strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoOK,'2');?></strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($nettoOK,'2');?></strong></td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF"><strong>F=</strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($rollF);?></strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoF,'2');?></strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($rollnF);?></strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($nettoF,'2');?></strong></td>
            <td colspan="2" align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($panjangYF,'2');?> Yard</strong></td>
            <td colspan="2" align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($panjangMF,'2');?> Meter</strong></td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr bgcolor="#99FFFF">
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF"><strong>BW=</strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollBW);?></strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoBW,'2');?></strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($nettoBW,'2');?></strong></td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF"><strong>O=</strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($rollO);?></strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoO,'2');?></strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($rollnO);?></strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($nettoO,'2');?></strong></td>
            <td colspan="2" align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($panjangYO,'2');?> Yard</strong></td>
            <td colspan="2" align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($panjangMO,'2');?> Meter</strong></td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr bgcolor="#99FFFF">
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF"><strong>TCW=</strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollTCW);?></strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoTCW,'2');?></strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($nettoTCW,'2');?></strong></td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF"><strong>L=</strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($rollL);?></strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoL,'2');?></strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($rollnL);?></strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($nettoL,'2');?></strong></td>
            <td colspan="2" align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($panjangYL,'2');?> Yard</strong></td>
            <td colspan="2" align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($panjangML,'2');?> Meter</strong></td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr bgcolor="#99FFFF">
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF"><strong>BS=</strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollBS);?></strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoBS,'2');?></strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($nettoBS,'2');?></strong></td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr bgcolor="#99FFFF">
            <td bgcolor="#FFFFFF">&nbsp;</td>
            
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="5" align="right" bgcolor="#FFFFFF"><b>Total</b></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo $roll;?></strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($bruto,'2');?></strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo $rolln;?></strong></td>
            <td align="center" bgcolor="#FFFFFF"><strong><?php echo number_format($netto,'2');?></strong></td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
            
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>  
  
  <tr>
    <td colspan="31">&nbsp;</td>
  </tr>
 
  </table>
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
                            
                            
      