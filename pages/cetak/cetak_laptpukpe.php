<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
//$idkk=$_REQUEST['idkk'];
//$act=$_GET['g'];
//-
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
//$Dept=$_GET['dept'];
//$Cancel=$_GET['cancel'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%d-%b-%y') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Laporan TPUKPE</title>
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
   body {
        -webkit-print-color-adjust: exact !important;
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
        <td><table border="1" class="table-list1" width="100%"> 
        <tr>
            <td align="center"><strong><font size="+1">LAPORAN PENYERAHAN TINDAKAN PERBAIKAN UNTUK KELUHAN PELANGGAN EKSTERNAL</font><br />
            <font size="+1">BULAN <?php echo strtoupper(date("F Y", strtotime($Akhir)));?></font>
            </strong></td>
        </tr>
        </table></td>
    </tr>
	</thead>
        <tr>
            <td align="center"><table class="table-list1" width="100%">
                <thead>
                    <tr>
                        <td align="center" style="font-size: 11px;">No</td>
                        <td align="center" style="font-size: 11px;">No. TPUKPE</td>
                        <td align="center" style="font-size: 11px;">LANGGANAN</td>
                        <td align="center" style="font-size: 11px;">ORDER</td>
                        <td align="center" style="font-size: 11px;">JENIS KAIN</td>
                        <td align="center" style="font-size: 11px;">WARNA</td>
                        <td align="center" style="font-size: 11px;">LOT</td>
                        <td align="center" style="font-size: 11px;">MASALAH</td>
                        <td align="center" style="font-size: 11px;">TGL. PACKING</td>
                        <td align="center" style="font-size: 11px;">PENYERAHAN KE QAI</td>
                        <td align="center" style="font-size: 11px;">KETERANGAN</td>
                    </tr>
                </thead>
		        <tbody> 
            <!-- klo ada tgl conform pake tgl conform
            tgl packing duluan, tgl kpe belakangan pakenya tgl kpe
            kpe duluan, packing belakangan pakenya tgl packing -->  
                    <tr>
                      <td align="left" bgcolor="#FDDC18" colspan="11">BULAN <?php echo strtoupper(date("F", strtotime($Akhir)));?> (KURANG DARI 7 HARI)</td>
                    </tr>
                    <?php
                        $Awal=$_GET['awal'];
                        $Akhir=$_GET['akhir'];
                        $no=1;
                        $qry1=mysqli_query($con,"SELECT * FROM tbl_tpukpe_now WHERE DATE_FORMAT( if(tgl_conform!='0000-00-00',tgl_conform, if(tgl_packing>tgl_kpe,tgl_packing, tgl_kpe)), '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (ket LIKE '2 Hari%' OR ket LIKE '3 Hari%' OR ket LIKE '4 Hari%' OR ket LIKE '4 Hari%' OR ket LIKE '5 Hari%' OR ket LIKE '6 Hari%' OR ket LIKE '7 Hari%' OR if(tgl_conform!='0000-00-00',DATEDIFF(serah_qai, tgl_conform)<7, if(tgl_packing>tgl_kpe,DATEDIFF(serah_qai, tgl_packing)<7,DATEDIFF(serah_qai, tgl_kpe)<7)) ) ORDER BY id ASC");
                        $cek=mysqli_num_rows($qry1);
                        while($row=mysqli_fetch_array($qry1)){
                          $tgl_pack= new DateTime($row['tgl_packing']);
                          $serah_qai= new DateTime($row['serah_qai']);
                          $beda = $tgl_pack->diff($serah_qai);
                    ?>
                    <tr>
                        <td align="left" valign="middle"><font size="-2"><?php echo $no; ?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo $row['no_tpukpe'];?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row['langganan']);?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row['no_order']);?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row['jenis_kain']);?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row['warna']);?></font></td>
                        <td align="left"><font size="-2"><?php echo strtoupper($row['lot']);?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo $row['masalah'];?></font></td>
                        <td align="center" valign="middle"><font size="-2"><?php echo date("d/m/y", strtotime($row['tgl_packing']));?></font></td>
                        <td align="center" valign="middle"><font size="-2"><?php echo date("d/m/y", strtotime($row['serah_qai']));?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo $row['ket'];?></font></td>
                    </tr>
                    <?php $no++;} ?>
                    <tr>
                      <td align="left" colspan="11">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left" bgcolor="#FDDC18" colspan="11">BULAN <?php echo strtoupper(date("F", strtotime($Akhir)));?> (LEBIH DARI 7 HARI)</td>
                    </tr>
                    <?php
                        $Awal=$_GET['awal'];
                        $Akhir=$_GET['akhir'];
                        $no1=1;
                        $qry2=mysqli_query($con,"SELECT * FROM tbl_tpukpe_now WHERE DATE_FORMAT( if(tgl_conform!='0000-00-00',tgl_conform, if(tgl_packing>tgl_kpe,tgl_packing, tgl_kpe)), '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND ket NOT LIKE '7 Hari%' AND ket NOT LIKE '6 Hari%' AND ket NOT LIKE '5 Hari%' AND ket NOT LIKE '4 Hari%' AND ket NOT LIKE '3 Hari%' AND ket NOT LIKE '2 Hari%' AND (if(tgl_conform!='0000-00-00',DATEDIFF(serah_qai, tgl_conform)>=7, if(tgl_packing>tgl_kpe,DATEDIFF(serah_qai, tgl_packing)>=7,DATEDIFF(serah_qai, tgl_kpe)>=7)) ) ORDER BY id ASC");
                        $cek2=mysqli_num_rows($qry2);
                        while($row2=mysqli_fetch_array($qry2)){
                          $tgl_pack1= new DateTime($row2['tgl_packing']);
                          $serah_qai1= new DateTime($row2['serah_qai']);
                          $beda1 = $tgl_pack1->diff($serah_qai1);
                    ?>
                    <tr>
                        <td align="left" valign="middle"><font size="-2"><?php echo $no1; ?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo $row2['no_tpukpe'];?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row2['langganan']);?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row2['no_order']);?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row2['jenis_kain']);?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row2['warna']);?></font></td>
                        <td align="left"><font size="-2"><?php echo strtoupper($row2['lot']);?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo $row2['masalah'];?></font></td>
                        <td align="center" valign="middle"><font size="-2"><?php echo date("d/m/y", strtotime($row2['tgl_packing']));?></font></td>
                        <td align="center" valign="middle"><font size="-2"><?php echo date("d/m/y", strtotime($row2['serah_qai']));?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo $row2['ket'];?></font></td>
                    </tr>
                    <?php $no1++;} ?>
                    <tr>
                        <td align="left" colspan="11">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left" bgcolor="#FDDC18" colspan="11">BULAN <?php echo strtoupper(date("F", strtotime($Akhir)));?> (BELUM SELESAI PROSES)</td>
                    </tr>
                    <?php
                        $Awal=$_GET['awal'];
                        $Akhir=$_GET['akhir'];
                        $no2=1;
                        $qry3=mysqli_query($con,"SELECT * FROM tbl_tpukpe_now WHERE DATE_FORMAT( if(tgl_conform!='0000-00-00',tgl_conform, if(tgl_packing>tgl_kpe,tgl_packing, tgl_kpe)), '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND serah_qai='0000-00-00' ORDER BY id ASC");
                        $cek3=mysqli_num_rows($qry3);
                        while($row3=mysqli_fetch_array($qry3)){
                    ?>
                    <tr>
                        <td align="left" valign="middle"><font size="-2"><?php echo $no2; ?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo $row3['no_tpukpe'];?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row3['langganan']);?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row3['no_order']);?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row3['jenis_kain']);?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row3['warna']);?></font></td>
                        <td align="left"><font size="-2"><?php echo strtoupper($row3['lot']);?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo $row3['masalah'];?></font></td>
                        <td align="center" valign="middle"><font size="-2"><?php if($row3['tgl_packing']!='0000-00-00'){echo date("d/m/y", strtotime($row3['tgl_packing']));}else{echo "-";}?></font></td>
                        <td align="center" valign="middle"><font size="-2"><?php if($row3['serah_qai']!='0000-00-00'){echo date("d/m/y", strtotime($row3['serah_qai']));}else{echo "-";}?></font></td>
                        <td align="left" valign="middle"><font size="-2"><?php echo $row3['ket'];?></font></td>
                    </tr>
                    <?php $no2++;} ?>
                </tbody>
            </table></td>
        </tr>
        <tr>
      <td><table width="100%" border="0" class="table-list1">
      <tr align="center" >
        <td>&nbsp;</td>
        <td width="40%">Dibuat Oleh</td>
        <td width="40%">Diketahui Oleh</td>
      </tr>
      <tr>
        <td>Nama</td>
        <td align="center"><input type=text name=nama placeholder="Ketik disini" style="font-size: 11px;"></td>
        <td align="center">Agung Cahyono</td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td align="center"><input type=text name=nama2 placeholder="Ketik disini" style="font-size: 11px;"></td>
        <td align="center">Manager</td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td align="center">
        <!-- <input type=text name=nama placeholder="Ketik disini" style="font-size: 11px;"> -->
          <?php echo $rTgl['tgl_skrg'];?> 
        </td>
        <td align="center">
        <!-- <input type=text name=nama placeholder="Ketik disini" style="font-size: 11px;"> -->
          <?php echo $rTgl['tgl_skrg'];?> 
        </td>
      </tr>
      <tr>
        <td height="60" valign="top">Tanda Tangan</td>
        <td>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          
        </td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    </tr>
</table>


<script>
//alert('cetak');window.print();
</script> 
</body>
</html>