<?php 
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
  $Awal=$_GET['awal'];
  $Akhir=$_GET['akhir'];
  $Order=$_GET['order'];
  $GShift=$_GET['shift'];
  $qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
  $rTgl=mysqli_fetch_array($qTgl);
  if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Reports Jahit</title>
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
              border-right:0px #000000 solid;"><strong><font size="+1">LAPORAN JAHIT QC</font><br />
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="1" class="table-list1"> 
          <tr>
            <td align="left" valign="bottom" width="79%"><strong><font size="-1">Tanggal : <?php echo date("d F Y",strtotime($_GET['awal']));?> s/d <?php echo date("d F Y",strtotime($_GET['akhir']));?></font><br />
            <font size="-1">Shift : <?php echo $_GET['shift'];?></font></td>
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
            <td rowspan="2" bgcolor="#F5F5F5">No PO</td>
            <td rowspan="2" bgcolor="#F5F5F5">No Order</td>
            <td rowspan="2" bgcolor="#F5F5F5" style="width:1in;">Jenis Kain Accs</td>
            <td rowspan="2" bgcolor="#F5F5F5" style="width:1in;">Jenis Kain Body</td>
            <td rowspan="2" bgcolor="#F5F5F5">Warna</td>
            <td rowspan="2" bgcolor="#F5F5F5">Lot Accs</td>
            <td rowspan="2" bgcolor="#F5F5F5">Lot Body</td>
            <td colspan="2" bgcolor="#F5F5F5"style="width:0.05in;">Bruto</td>
            <td rowspan="2" bgcolor="#F5F5F5">Status</td>
            <td rowspan="2" bgcolor="#F5F5F5">Operator</td>
            <td rowspan="2" bgcolor="#F5F5F5">Tgl Fin</td>
            <td rowspan="2" bgcolor="#F5F5F5">Keterangan</td>
        </tr>
        <tr align="center" bgcolor="#CCCCCC">
            <td bgcolor="#F5F5F5">Jml Rol</td>
            <td bgcolor="#F5F5F5">Qty (KGs)</td>
        </tr>
		</thead>
		<tbody>  
		<?php
      $no=1;
      $rollOK=0;$brutoOK=0;$rollBOK=0;$brutoBOK=0;$rollBW=0;$brutoBW=0;
      $roll=0;$bruto=0;
      $Awal=$_GET['awal'];
      $Akhir=$_GET['akhir'];
      if($GShift!="ALL"){$shft=" AND `shift`='$_GET[shift]' "; }else{$shft=" ";}
      if($Order!=""){$ord=" AND `no_order` LIKE '%$Order%' "; }else{$ord=" ";}
      $qry1=mysqli_query($con,"SELECT * FROM tbl_jahit
      WHERE DATE_FORMAT( tgl_jahit, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $shft $ord ORDER BY id ASC");
          while($row=mysqli_fetch_array($qry1)){
        ?>
          <tr>
                <td align="center"><?php echo $no;?></td>
                <td><?php echo $row['langganan'];?></td>
                <td><?php echo $row['no_po'];?></td>
                <td><?php echo substr($row['no_order'],0,6)." ".substr($row['no_order'],6,10);?></td>
                <td><?php echo $row['jenis_kain'];?></td>
                <td><?php echo $row['jenis_kain_body'];?></td>
                <td><?php echo substr($row['warna'],0,7)." ".substr($row['warna'],7,20);?></td>
                <td align="center"><?php echo $row['lot'];?></td>
                <td align="center"><?php echo $row['lot_body'];?></td>
                <td align="center"><?php echo $row['roll'];?></td>
                <td align="center"><?php echo $row['bruto'];?></td>
                <td align="center"><?php echo $row['status'];?></td>
                <td align="center"><?php echo $row['operator'];?></td>
                <td align="center"><?php echo $row['tgl_fin'];?></td>
                <td><?php echo $row['ket'];?></td>
            </tr>
 
      <?php
            if($row['status']=="OK"){
        $rollOK += $row['roll'];
        $brutoOK += $row['bruto'];
            }
            if($row['status']=="BELUM OK"){
        $rollBOK += $row['roll'];
        $brutoBOK += $row['bruto'];
            }
            if($row['status']=="BEDA WARNA"){
              $rollBW += $row['roll'];
              $brutoBW += $row['bruto'];
              }
            
        $roll += $row['roll'];
        $bruto += $row['bruto'];
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
            <td align="right" bgcolor="#FFFFFF"><strong>OK=</strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollOK);?></strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoOK,'2');?></strong></td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
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
            <td align="right" bgcolor="#FFFFFF"><strong>BELUM OK=</strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollBOK);?></strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoBOK,'2');?></strong></td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
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
            <td align="right" bgcolor="#FFFFFF"><strong>BEDA WARNA=</strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($rollBW);?></strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($brutoBW,'2');?></strong></td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
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
            <td align="right" bgcolor="#FFFFFF"><strong>TOTAL</strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($roll);?></strong></td>
            <td align="right" bgcolor="#FFFFFF"><strong><?php echo number_format($bruto,'2');?></strong></td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr> 
  
  </table>
   <table width="100%" border="0" class="table-list1"> 
  <tr align="center">
    <td colspan="3">&nbsp;</td>
    <td colspan="12">Departemen QCF</td>
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
    <td align="center"><b><?php echo date("d F Y", strtotime($rTgl['tgl_skrg']));?></b></td>
    <td colspan="3" align="center"><b><?php echo date("d F Y", strtotime($rTgl['tgl_skrg']));?></b></td>
    <td colspan="4" align="center"><b><?php echo date("d F Y", strtotime($rTgl['tgl_skrg']));?></b></td>
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
                            
                            
      