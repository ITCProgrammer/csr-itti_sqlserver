   <?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Awal=$_GET['Awal'];
$Akhir=$_GET['akhir'];
$idnsp=$_GET['id_nsp'];
$order=$_GET['no_order'];
$po=$_GET['po'];
$cek1=$_GET['id_cek'];
$cek2=$_GET['id_cek1'];
$cek3=$_GET['id_cek2'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
//$tgl=$rTgl['tgl_skrg'];//tambahan 
//$jam=$rTgl['jam_skrg'];//tambahan
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
//$qry=mysqli_query("SELECT a.*,a.t_jawab,a.t_jawab1,a.t_jawab2,b.alasan,b.id_nsp,b.warna1,b.warna2,b.warna3,b.kg1,b.kg2,b.kg3,b.pjg1,b.pjg2,b.pjg3,b.satuan1,b.satuan2,b.satuan3,b.sebab,b.analisa,b.pencegahan,b.nokk1,b.nokk2,b.nokk3,b.lot1,b.lot2,b.lot3,b.qty_order,b.qty_kirim,b.qty_foc FROM tbl_aftersales a
//INNER JOIN tbl_ganti_kain b ON a.id=b.id_nsp
//WHERE b.no_bon='$_GET[no_bon]'");
//$r=mysqli_fetch_array($qry);
$qry1=mysqli_query($con,"SELECT * FROM tbl_disposisi_now WHERE id='$idnsp'");
$r1=mysqli_fetch_array($qry1);
$qry2=mysqli_query($con,"SELECT * FROM tbl_ganti_kain_now WHERE id_disposisi='$idnsp' LIMIT 1");
$r2=mysqli_fetch_array($qry2);
$qry3=mysqli_query($con,"SELECT * FROM tbl_ganti_kain_now WHERE id='$cek1' LIMIT 1");
$r3=mysqli_fetch_array($qry3);

/*
$pos=strpos($r1['langganan'], "/");
$posbuyer=substr($r1['langganan'],$pos+1,10);
$buyer=str_replace("'","''",$posbuyer);
$pelanggan=$r1['langganan'];
*/

$langgan_buyer = $r1['langganan'].'/'.$r1['buyer'];
$pos=strpos($langgan_buyer, "/");
$posbuyer=substr($langgan_buyer,$pos+1,10);
$buyer=str_replace("'","''",$posbuyer);
$pelanggan=substr($langgan_buyer,0,$pos);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Bon Ganti Kain</title>
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
}	
</style>	
</head>
<?php 
$nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");	
?>
<body>
<table>
  <thead>
    <tr>
      <td><table border="1" class="table-list1" style="width:6.4in"> 
      <tr>
        <td width="10%" align="center"><img src="Indo.jpg" width="50" height="50
		      " alt=""/></td>
        <td width="58%" align="center"><strong><font size="+1">BON GANTI  /TAMBAH KAIN GREIGE</font> <br>
        <?php
		$no_bon =  substr($r3['no_bon'],2);
		echo 'PR'.$no_bon;?>
        </strong></td>
        <td width="32%" align="center"><table width="100%">
          <tbody>
            <tr>
              <td width="36%" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">No. Form
              </td>
              <td width="5%" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">:
              </td>
              <td width="59%" style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">14-10
              </td>
            </tr>
            <tr>
              <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">No Revisi
              </td>
              <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">:
              </td>
              <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">04
              </td>
            </tr>
            <tr>
              <td style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;">Tgl. Terbit
              </td>
          <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">:</td>
          <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">17 Desember 2020</td>
        </tr>
      </tbody>
    </table></td>
    </tr>
  </table></td>
  </tr>
	</thead>
    <tr>
      <td><table border="0" class="table-list1" style="width:6.4in">
        <tbody>
          <tr>
            <td width="11%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">&nbsp;</td>
            <td width="39%" align="center" valign="top" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><table width="77%">
              <tbody>
                <tr>
                  <td width="11%" align="right" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">&#9744;</td>
                  <td width="89%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Internal</td>
                </tr>
              </tbody>
            </table></td>
            <td width="18%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><input name="nama5" type="text" placeholder="Tagih" size="12" style="font-size:12px;" /></td>
            <td width="13%" align="center" valign="top" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><table width="66%">
              <tbody>
                <tr>
                  <td width="22%" align="right" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">&#9745;</td>
                  <td width="78%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">External</td>
                </tr>
                <tr>
                  <td align="right" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">&#9744;</td>
                  <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">FOC</td>
                </tr>
              </tbody>
            </table></td>
            <td width="5%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">&nbsp;</td>
            <td width="14%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Langganan</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid; font-size:8.5px;">:  <?php echo substr($pelanggan,0,25)."/".$buyer."...";?></td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">No. Hanger</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">: <?php 
		if($r1['no_item']) { 
			echo $r1['no_item']; } 
		else if($r1['no_hanger']) {
			echo $r1['no_hanger']; }
		else  {
			echo $r1['article_group'].$r1['article_code'];
		}
		
		?></td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Style</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">:</td>
          </tr>
          <tr valign="top">
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">No. PO</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">: <?php echo $r1['no_po'];?></td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Lebar X Gramasi</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">: <?php echo $r1['lebar']." X ".$r1['gramasi'];?></td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Lot</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">: <!--1-1--><?=$r1['prod_order']?></td>
          </tr>
          <tr valign="top">
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">No. Order</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
  border-right:0px #000000 solid;">: <?php 
                                      $sqldt=mysqli_query($con,"SELECT kd_ganti FROM tbl_ganti_kain_now WHERE id_disposisi='$_GET[id_nsp]' ORDER BY id DESC LIMIT 1");
                                      $row = mysqli_fetch_array($sqldt);
                                      ?>
                                      <?php 
										echo $r1['no_order'];?> 
                                      </td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Delivery Kain Greige</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">:</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">&nbsp;</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">&nbsp;</td>
          </tr>
          <tr valign="top">
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Jenis Kain</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid; font-size:8.5px;">: <?php //echo $r1['no_item']."/".
	echo substr($r1['jenis_kain'],0,65);?></td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Delivery Kain Jadi</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">:</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">&nbsp;</td>
            <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">&nbsp;</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
	</tbody>
    <tr>
      <td><table border="0" class="table-list1" style="width:6.4in" width="100%">
        <tbody>
          <tr>
            <td width="11%" rowspan="2" align="left" valign="top">Departemen Penanggung Jawab: <span style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><?php if($r3['t_jawab']!=""){ echo "<br>".$r3['t_jawab']." ".$r3['persen']." %"; }if($r3['t_jawab1']!=""){ echo "<br>".$r3['t_jawab1']." ".$r3['persen1']." %"; }if($r3['t_jawab2']!=""){ echo "<br>".$r3['t_jawab2']." ".$r3['persen2']." %"; } ?></span></td>
            <td width="23%" height="60" colspan="3" valign="top" style="height: 0.7in;">Masalah: <span style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><?php echo $r3['masalah'];?></span></td>
            <td width="17%" rowspan="2" align="left" valign="top">Penyebab: <br />
              <table width="100%">
                <tbody>
                <?php 
                  $dtArr=$r2['sebab'];
                  $data = explode(",",$dtArr);
                ?>
                  <tr>
                    <td width="14%" align="right" valign="top" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><?php if(in_array("Man",$data)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td width="86%" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Man</td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><?php if(in_array("Methode",$data)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Methode</td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><?php if(in_array("Machine",$data)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Machine</td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><?php if(in_array("Material",$data)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Material</td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><?php if(in_array("Environment",$data)){ echo "&#9745;";}else{ echo "&#9744;";}?></td>
                    <td style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">Environment</td>
                  </tr>
                </tbody>
            </table></td>
            <td colspan="5" rowspan="2" align="left" valign="top">Analisa dan Pencegahan: <br><span style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><?php echo $r3['analisa'];?><br><?php echo $r3['pencegahan'];?></span></td>
          </tr>
          <tr>
            <td colspan="3" valign="top" style="height: 0.7in;">Alasan: <span style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><?php echo $r3['alasan'];?></span></td>
            <!--<td colspan="5" align="left" valign="top">Pencegahan: <span style="border-top:0px #000000 solid; 
	border-bottom:0px #000000 solid;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;"><?php echo $r2['pencegahan'];?></span></td>-->
          </tr>
          <tr>
<!-- Warna 1 Begin -->
<?php
$cek1=$_GET['id_cek'];
$qr1=mysqli_query($con,"SELECT * FROM tbl_ganti_kain_now WHERE id='$cek1'");
$c1=mysqli_num_rows($qr1);
$rk1=mysqli_fetch_array($qr1);

if($c1>0){?>
		<td width="11%" colspan="3" valign="top" style="height: 0.5in; border-right:0px #000000 solid;">
		1. Warna = <span style="font-size: 8px;"><?php echo $rk1['warna1'];?></span><br>
		<br />
		O: <?php if($rk1['qty_order']==0){echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}else{echo $rk1['qty_order'];}?>&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="" size="10" /><br>
		K: <?php if($rk1['qty_kirim']==0){echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}else{echo $rk1['qty_kirim'];}?>&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="" size="10" /><br>

		<!--E: <?php if($rk1['qty_foc']==0){echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;";}else{echo $rk1['qty_foc'];}?>&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="10" /><br>-->
		<!-- <input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="21" /> -->
		<!-- <br><input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="21" /> -->
		<!-- <textarea name="nama" rows="1" cols="20" style="font-size:10px;"></textarea> -->
		</td>
		<td width="11%" align="right" valign="top" style="height: 0.5in;border-left:0px #000000 solid; border-right:0px #000000 solid;" >
		<?php 
		$qty_permintaan = explode("/",$rk1['qty_permintaan']);
		echo $qty_permintaan[0];?> Kg<br><?php echo $qty_permintaan[1]."<br>".$qty_permintaan[2];?> <?php if($rk1['pjg1']!=""){ ?><br>(Netto)<?php } ?>
		</td>
<?php }else{ ?>

	<td colspan="3" valign="top" style="height: 0.5in; border-right:0px #000000 solid;">1. Warna = <span style="font-size: 8px;">&nbsp;</span><br>
	<br />
	O: &nbsp;&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="" size="13" /><br>
	K: &nbsp;&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="" size="13" /><br>
	<!--E: &nbsp;&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="13" /><br>-->
	<!-- <input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="21" /> -->
	<!-- <br><input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="21" /> -->
	</td>
	<td width="11%" align="right" valign="top" style="height: 0.5in;border-left:0px #000000 solid; border-right:0px #000000 solid;" >&nbsp;
	</td>
<?php } ?>
<!-- Warna 1 End -->







<!-- Warna 2 Begin -->
<?php
$cek1=$_GET['id_cek'];
$qr1=mysqli_query($con,"SELECT * FROM tbl_ganti_kain_now WHERE id='$cek2'");
$c1=mysqli_num_rows($qr1);
$rk1=mysqli_fetch_array($qr1);

if($c1>0){?>
		<td width="11%" colspan="3" valign="top" style="height: 0.5in; border-right:0px #000000 solid;">
		1. Warna = <span style="font-size: 8px;"><?php echo $rk1['warna1'];?></span><br>
		<br />
		O: <?php if($rk1['qty_order']==0){echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}else{echo $rk1['qty_order'];}?>&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="" size="10" /><br>
		K: <?php if($rk1['qty_kirim']==0){echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}else{echo $rk1['qty_kirim'];}?>&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="" size="10" /><br>

		<!--E: <?php if($rk1['qty_foc']==0){echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;";}else{echo $rk1['qty_foc'];}?>&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="10" /><br>-->
		<!-- <input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="21" /> -->
		<!-- <br><input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="21" /> -->
		<!-- <textarea name="nama" rows="1" cols="20" style="font-size:10px;"></textarea> -->
		</td>
		<td width="11%" align="right" valign="top" style="height: 0.5in;border-left:0px #000000 solid; border-right:0px #000000 solid;" >
		<?php 
		$qty_permintaan = explode("/",$rk1['qty_permintaan']);
		echo $qty_permintaan[0];?> Kg<br><?php echo $qty_permintaan[1]."<br>".$qty_permintaan[2];?> <?php if($rk1['pjg1']!=""){ ?><br>(Netto)<?php } ?>
		</td>
<?php }else{ ?>

	<td colspan="3" valign="top" style="height: 0.5in; border-right:0px #000000 solid;">1. Warna = <span style="font-size: 8px;">&nbsp;</span><br>
	<br />
	O: &nbsp;&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="" size="13" /><br>
	K: &nbsp;&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="" size="13" /><br>
	<!--E: &nbsp;&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="13" /><br>-->
	<!-- <input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="21" /> -->
	<!-- <br><input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="21" /> -->
	</td>
	<td width="11%" align="right" valign="top" style="height: 0.5in;border-left:0px #000000 solid; border-right:0px #000000 solid;" >&nbsp;
	</td>
<?php } ?>
<!-- Warna 2 End -->










<!-- Warna 3 Begin -->
<?php
$cek3=$_GET['id_cek2'];
$qr3=mysqli_query($con,"SELECT * FROM tbl_ganti_kain_now WHERE id='$cek3'");
$c3=mysqli_num_rows($qr3);
$rk3=mysqli_fetch_array($qr3);
?>
          <?php if($c3>0){?>
            <td width="20%" valign="top" style="border-right:0px #000000 solid;"><span style="height: 0.5in; border-right:0px #000000 solid;">3. Warna = <span style="font-size: 8px;"><?php echo $rk3['warna1'];?></span><br>
              <br />
              O: <?php if($rk3['qty_order']==0){echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}else{echo $rk3['qty_order'];}?>&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="" size="8" /><br>
              K: <?php if($rk3['qty_kirim']==0){echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}else{echo $rk3['qty_kirim'];}?>&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="" size="8" /><br>
				<!--      E: <?php if($rk3['qty_foc']==0){echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;";}else{echo $rk3['qty_foc'];}?>&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="8" />-->
              <!-- <br><input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="21" /> -->
              </td>
            <td width="11%" align="right" valign="top" style="border-left:0px #000000 solid;"><span style="height: 0.5in;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">
            
			
		
			
			
			
			
              <?php 
			  $qty_permintaan = explode("/",$rk3['qty_permintaan']);
			  echo $qty_permintaan[0];?></span> Kg<br />
              <?php echo $qty_permintaan[1];?> <?php echo$qty_permintaan[2];?><br />
              (Netto)
           
			
			</td>
            <?php }else{ ?>
              <td width="20%" valign="top" style="border-right:0px #000000 solid;"><span style="height: 0.5in; border-right:0px #000000 solid;">3. Warna = <span style="font-size: 8px;">&nbsp;</span><br>
              <br />
              O: &nbsp;&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="" size="13" /><br>
              K: &nbsp;&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="" size="13" /><br>
              <!--E: &nbsp;&nbsp;<input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="13" /><br>-->
              <!-- <input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="21" /> -->
              <!-- <br><input name="nama" type="text" style="text-align: left;" placeholder="BPP" size="21" /> -->
              </td>
              <td width="11%" align="right" valign="top" style="border-left:0px #000000 solid;"><span style="height: 0.5in;
	border-left:0px #000000 solid; 
	border-right:0px #000000 solid;">&nbsp;</td>
              <?php } ?>
            <!-- Warna 3 End -->
			
			
			
			
			
			
			
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table style="width:6.4in" border="0" class="table-list1">
        <tr align="center">
          <td width="14%" rowspan="2">&nbsp;</td>
          <td width="17%" rowspan="2">Dibuat Oleh :</td>
          <td colspan="6">Diketahui Oleh:</td>
        </tr>
        <tr align="center">
          <td width="14%">PPC</td>
          <td width="11%">RMP</td>
          <td width="11%">MKT</td>
          <td width="11%">DMF</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td align="center"><input name="nama5" type="text" placeholder="Ketik" size="12" /></td>
          <td align="center"><input name="nama13" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama3" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama6" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama8" type="text" placeholder="Ketik" size="10" /></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td align="center"><input name="nama" type="text" placeholder="Ketik" size="12" /></td>
          <td align="center"><input name="nama2" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama4" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama7" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama9" type="text" placeholder="Ketik" size="10" /></td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td align="center"><?php echo date("d F Y", strtotime($rTgl['tgl_skrg']));?></td>
          <td align="center"><?php echo date("F Y", strtotime($rTgl['tgl_skrg']));?></td>
          <td align="center"><?php echo date("F Y", strtotime($rTgl['tgl_skrg']));?></td>
          <td align="center"><?php echo date("F Y", strtotime($rTgl['tgl_skrg']));?></td>
          <td align="center"><?php echo date("F Y", strtotime($rTgl['tgl_skrg']));?></td>
        </tr>
        <tr>
          <td valign="top" style="height: 0.6in;" >TandaTangan</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table style="width:6.4in" border="0" >
          <tr align="left">
            <td style="font-size: 10px;"><span style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php echo "Lembaran Kuning Diberikan Ke Marketing Tanggal ...";?></td>
          </tr>
        </table></td>
    </tr>
  
</table>

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>