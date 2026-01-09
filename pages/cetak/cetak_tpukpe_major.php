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
//$Dept=$_GET['dept'];
//$Cancel=$_GET['cancel'];
//$id=$_GET['id'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
//$tgl=$rTgl['tgl_skrg'];//tambahan 
//$jam=$rTgl['jam_skrg'];//tambahan
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
$qry=mysqli_query($con,"SELECT * FROM tbl_tpukpe_now WHERE no_tpukpe='$_GET[no_tpukpe]'");
$r=mysqli_fetch_array($qry);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Tindakan Perbaikan Untuk Keluhan Pelanggan Eksternal</title>
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
<?php 
$bln=array(1 => "I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
$rmw_bln = $bln[date('n')];	
?>
<body>
<table>
    <thead>
    <tr>
        <td><table border="1" class="table-list1" Width="100%"> 
            <tr>
                <td width="10%" align="center"><img src="Indo.jpg" width="50" height="50
                " alt=""/></td>
                <td width="65%" align="center"><strong><font size="+1">TINDAKAN PERBAIKAN UNTUK KELUHAN PELANGGAN EKSTERNAL 
                <br>(MAJOR & REPEAT CASE)</font>
                </strong></td>
                <td width="25%" align="center">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="36%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">No. Form</td>
                                <td width="5%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">:</td>
                                <td width="59%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">06-08</td>
                            </tr>
                            <tr>
                                <td style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">No Revisi</td>
                                <td style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">:</td>
                                <td style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">00</td>
                            </tr>
                            <tr>
                                <td style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">Tgl. Terbit</td>
                                <td style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">:</td>
                                <td style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">14 Agustus 2025</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table></td>
    </tr>
	</thead>

    <td><table border="1" class="table-list1" width="100%">
        <tr>
            <td width="50%" style="border-top:0px #000000 solid;
                border-bottom:0px #000000 solid; 
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;" colspan="3"><font size="-1">TPUKPE No. :  <?php echo str_replace('QCF', 'CSR', $_GET['no_tpukpe']);?></font>
            </td>
        </tr>
    </table></td>
    <tr>
        <td><table border="1" class="table-list1" width="100%" style="height:8in">
            <tr>
                <td width="50%" align="left" style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid; font-size: 12px;"><strong>Masalah :</strong> <?php echo $r['masalah'];?></td>
            </tr>
            <tr><td style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;">&nbsp;</td></tr>
            <tr>
                <td width="50%" align="left" style="
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid; font-size: 12px;"><strong>Penyelidikan :</strong></td>
            </tr>
            <tr>
                <td width="50%" align="left" style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid; font-size: 12px;">Departemen CSR : <br><br></td>
                    <tr>
                        <td align="left" valign="middle" style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1"><?php echo $r['penyelidik_qcf'];?></font> <br><br><br></td>
                    </tr>
                    <tr>
                        <td align="left" valign="middle" style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1">TTD Penyelidik Departemen CSR : </font></td>
                    </tr>
            </tr>
            <tr>
                <td width="50%" align="left" style="
                    border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid; font-size: 12px;">Departemen terkait : <br><br></td>
                    <tr>
                        <td align="left" valign="middle" style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1"><?php echo $r['penyelidik_terkait'];?></font> <br><br><br></td>
                    </tr>
                    <tr>
                        <td align="left" valign="middle" style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1">TTD Penyelidik Departemen terkait : </font></td>
                    </tr>
            </tr>
            <!-- <tr>
                <td width="50%" align="left" style=" 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid; font-size: 12px;"><strong>Tindakan Perbaikan :</strong> <?php echo $r['tindakan_perbaikan'];?><br><br><br>
                <table width="100%" border="0" class="table-list1">
                    <tr>
                        <td align="left" valign="middle" style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1">TTD Departemen Penanggung Jawab Perbaikan : </font></td>
                    </tr>
                </table></td>
            </tr> -->
            <tr>
                <td width="50%" align="left" style="
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid; font-size: 12px;"><strong>Tindakan Pencegahan :</strong></td>
            </tr>
            <tr>
                <td width="50%" align="left" style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid; font-size: 12px;">Departemen CSR : <br><br></td>
                    <tr>
                        <td align="left" valign="middle" style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1"><?php echo $r['cegah_qcf'];?></font> <br><br><br></td>
                    </tr>
                    <tr>
                        <td align="left" valign="middle" style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1">TTD Departemen CSR : </font></td>
                    </tr>
            </tr>
            <tr>
                <td width="50%" align="left" style=" 
                    border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid; font-size: 12px;">Departemen terkait : <br><br></td>
                    <tr>
                        <td align="left" valign="middle" style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1"><?php echo $r['cegah_terkait'];?></font><br><br><br></td>
                    </tr>
                    <tr>
                        <td align="left" valign="middle" style="border-top:0px #000000 solid;
                    border-bottom:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1">TTD Departemen terkait : </font></td>
                    </tr>
            </tr>
            <tr>
                <td width="50%" align="right" style="
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid; font-size: 12px;">Halaman : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
            </tr>
        </table></td>
    </tr>
    <tr>
      <td><table border="0" class="table-list1" width="100%">
        <tr align="center">
          <td width="10%">&nbsp;</td>
          <td width="12%">Diketahui Oleh :</td>
          <td width="25%" rowspan="5">Status Masalah : <br/>
            <table width="100%">
                <tbody>
                    <tr>
                        <td width="100%" align="left" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if($r['status']=="Selesai"){ echo "&#9745;";}else{ echo "&#9744;";}?> Selesai</td>
                    </tr>
                    <tr>
                        <td width="100%" align="left" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if($r['status']=="Belum Selesai : Rapat Tinjauan Manajemen"){ echo "&#9745;";}else{ echo "&#9744;";}?>
                        Belum Selesai : akan diajukan ke Rapat Tinjauan Manajemen
                        </td>
                    </tr>
                    <tr>
                        <td width="100%" align="left" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if($r['status']=="Belum Selesai : Dibukakan KPI"){ echo "&#9745;";}else{ echo "&#9744;";}?> 
                        Belum Selesai : Dibukakan KPI No. <?php if($r['no_kpi']!="" or $r['no_kpi']!=NULL){echo "<u>".$r['no_kpi']."</u>";}else{echo "________________";}?></td>
                    </tr>
                    <tr>
                        <td width="100%" align="left" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if($r['status']=="Belum Selesai : Dibukakan FT"){ echo "&#9745;";}else{ echo "&#9744;";}?>
                        Belum Selesai : Dibukakan FT No. <?php if($r['no_ft']!="" or $r['no_ft']!=NULL){echo "<u>".$r['no_ft']."</u>";}else{echo "_________________";}?></td>
                    </tr>
                    <tr>
                        <td width="100" align="left" valign="top" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid;
                        border-left:0px #000000 solid; 
                        border-right:0px #000000 solid;"><?php if($r['status']=="Belum Selesai : Lihat FT/KPI/KPE"){ echo "&#9745;";}else{ echo "&#9744;";}?>
                        Belum Selesai : Lihat FT/KPI/KPE No. <?php if($r['no_kpe']!="" or $r['no_kpe']!=NULL){echo "<u>".$r['no_kpe']."</u>";}else{echo "______________";}?></td>
                    </tr>
                </tbody>
            </table></td>
          </td>
        </tr>
        <tr>
          <td>Nama</td>
          <td align="center"><input name="nama" type="text" placeholder="Ketik" size="10" /></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td align="center"><input name="nama1" type="text" placeholder="Ketik" size="10" /></td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <!-- <td align="center"><?php echo date("d F Y", strtotime($rTgl['tgl_skrg']));?></td> -->
          <td align="center"><input type=text name=nama placeholder="Ketik disini" style="font-size: 11px;"></td>
        </tr>
        <tr>
          <td valign="top" style="height: 0.6in;" >Tanda Tangan</td>
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