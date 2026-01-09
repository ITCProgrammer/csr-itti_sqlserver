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
$qry=mysqli_query($con,"SELECT * FROM tbl_lkpp 
WHERE no_lkpp='$_GET[no_lkpp]'");
$r=mysqli_fetch_array($qry);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Laporan Kunjungan Pelayanan Pelanggan</title>
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
                <td width="10%" align="center"><img src="ITTI_Logo New.png" width="50" height="50
                " alt=""/></td>
                <td width="65%" align="center"><strong><font size="+1">LAPORAN KUNJUNGAN PELAYANAN PELANGGAN</font><br /> No.<?php echo $_GET['no_lkpp'];?>
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
                                border-right:0px #000000 solid;">08-01</td>
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
                                border-right:0px #000000 solid;">03</td>
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
                                border-right:0px #000000 solid;">22 Mei 2014</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table></td>
    </tr>
	</thead>

    <tr>
        <td><table border="1" class="table-list1" width="100%">
            <tr>
                <td width="50%" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;" colspan="3"><font size="-1">Nama Perusahaan : <?php echo $r['nm_prshn'];?></font>
                    <br/> <br/><br/><br/><br/><br/><font size="-1">Alamat Perusahaan : <?php echo $r['alamat'];?></font>
                </td>
                <td width="50%" align="center" colspan="2">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="46%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;"><font size="-1">Pejabat yang ditemui</font></td>
                                <td width="5%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;"><font size="-1">:</font></td>
                                <td width="59%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;"><font size="-1">
                                    <?php
                                    $sql = "SELECT pejabat FROM tbl_lkpp WHERE no_lkpp='$_GET[no_lkpp]'";
                                    $result=mysqli_query($con,$sql);
                                    while($row=mysqli_fetch_array($result)){ 
                                    $detail=explode(",",$row['pejabat']);?>
                                    <?php 
                                        echo $detail[0];
                                    ?></font></td>
                            </tr>
                            <tr>
                                <td width="36%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">&nbsp;</td>
                                <td width="5%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">&nbsp;</td>
                                <td width="59%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;"><font size="-1"><?php if($detail[1]!=""){echo $detail[1];}else{echo "";}?></font></td>
                            </tr>
                            <tr>
                                <td width="36%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">&nbsp;</td>
                                <td width="5%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">&nbsp;</td>
                                <td width="59%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;"><font size="-1"><?php if($detail[2]!=""){echo $detail[2];}else{echo "";}?></font></td>
                            </tr>
                            <tr>
                                <td width="36%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">&nbsp;</td>
                                <td width="5%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">&nbsp;</td>
                                <td width="59%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;"><font size="-1"><?php if($detail[3]!=""){echo $detail[3];}else{echo "";}?></font></td>
                            </tr>
                            <tr>
                                <td width="36%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">&nbsp;</td>
                                <td width="5%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">&nbsp;</td>
                                <td width="59%" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;"><font size="-1"><?php if($detail[4]!=""){echo $detail[4];}else{echo "";}?></font></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table></td>
            </tr>
            <tr>
                <td width="15%" align="left" valign="middle" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1">Jenis Kunjungan</font>
                </td>
                <td width="15%" align="left" valign="middle" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1"><?php if($r['jenis_kunjungan']=="Rutin"){ echo "&#9745;";}else{ echo "&#9744;";}?> Rutin</font>
                </td>
                <td width="15%" align="left" valign="middle" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1"><?php if($r['jenis_kunjungan']=="Calon Pelanggan Baru"){ echo "&#9745;";}else{ echo "&#9744;";}?> Calon Pelanggan Baru</font>
                </td>
                <td width="15%" align="left" valign="middle" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1"><?php if($r['jenis_kunjungan']=="Keluhan Pelanggan"){ echo "&#9745;";}else{ echo "&#9744;";}?> Keluhan Pelanggan</font>
                </td>
                <td width="15%" align="left" valign="middle" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1"><?php if($r['jenis_kunjungan']=="Permintaan Pelanggan"){ echo "&#9745;";}else{ echo "&#9744;";}?> Permintaan Pelanggan</font>
                </td>
            </tr>
                <tr>
                    <td width="15%" align="left" valign="middle" style="border-top:0px #000000 solid; 
                    border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1">Petugas</font>
                    </td>
                    <td width="15%" align="left" valign="middle" style="border-top:0px #000000 solid; 
                    border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1">1.
                    <?php
                        $sql1 = "SELECT petugas FROM tbl_lkpp WHERE no_lkpp='$_GET[no_lkpp]'";
                        $result1=mysqli_query($con,$sql1); 
                        while($dt1=mysqli_fetch_array($result1)){ 
                        $data=explode(",",$dt1['petugas']);
                    ?>
                    <?php echo $data[0];}?></font>
                    </td>
                    <td width="15%" align="left" valign="middle" style="border-top:0px #000000 solid; 
                    border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1">2.
                    <?php
                        $sql2 = "SELECT petugas FROM tbl_lkpp WHERE no_lkpp='$_GET[no_lkpp]'";
                        $result2=mysqli_query($con,$sql2); 
                        while($dt2=mysqli_fetch_array($result2)){ 
                        $data2=explode(",",$dt2['petugas']);
                    ?>
                    <?php if($data2[1]!=""){echo $data2[1];}else{echo "";}}?></font>
                    </td>
                    <td width="15%" colspan="2" align="left" valign="middle" style="border-top:0px #000000 solid; 
                    border-bottom:0px #000000 solid;
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;"><font size="-1">3.
                    <?php 
                        $sql3 = "SELECT petugas FROM tbl_lkpp WHERE no_lkpp='$_GET[no_lkpp]'";
                        $result3=mysqli_query($con,$sql3); 
                        while($dt3=mysqli_fetch_array($result3)){ 
                        $data3=explode(",",$dt3['petugas']);
                    ?>
                    <?php if($data3[2]!=""){echo $data3[2];}else{echo "";}}?></font>
                   </td>
                   
                </tr>
        </table></td>
    </tr>
    <tr>
        <td><table border="1" class="table-list1" width="100%" style="height:6.5in">
            <tr>
                <?php
                    $date1 = date("d F Y", strtotime($r['tgl_kunjungan']));
                    $date2 = date("d F Y", strtotime($r['tgl_kunjungan2']));
                    
                    if($r['tgl_kunjungan'] != "" && $r['tgl_kunjungan'] != "0000-00-00" && $r['tgl_kunjungan2'] != "" && $r['tgl_kunjungan2'] != "0000-00-00") {
                        $lama_kunjungan = $date1 . " - " . $date2;
                    } else if($r['tgl_kunjungan'] != "" && $r['tgl_kunjungan'] != "0000-00-00") {
                        $lama_kunjungan = $date1;
                    } else {
                        $lama_kunjungan = "";
                    }

                ?>
                <td width="50%" align="left" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid; height:0.3in"><strong>TANGGAL KUNJUNGAN : <?php echo $lama_kunjungan ?></strong></td>
            </tr>
            <tr>
                <td width="50%" align="left" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid; height:0.3in;"><strong>TUJUAN KUNJUNGAN : <?php echo $r['tujuan_kunjungan'];?></strong></td>
            </tr>
            <tr>
                <td width="50%" align="left" style="border-top:0px #000000 solid; 
                        border-bottom:0px #000000 solid; height:0.3in;"><strong>HASIL DISKUSI DAN KESIMPULAN : </strong>
                </td>
            </tr>
            <tr>
                <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;" valign="top"><table width="100%" border="0" class="table-list1">
                    <thead>
                        <tr align="center">
                            <td><font size="-2"><strong>PO</strong></font></td>
                            <td><font size="-2"><strong>ORDER</strong></font></td>
                            <td><font size="-2"><strong>HANGER</strong></font></td>
                            <td><font size="-2"><strong>LEBAR/GRAMASI</strong></font></td>
                            <td><font size="-2"><strong>LOT</strong></font></td>
                            <td><font size="-2"><strong>COLOR</strong></font></td>
                            <td><font size="-2"><strong>QTY KIRIM</strong></font></td>
                            <td><font size="-2"><strong>MASALAH</strong></font></td>
                            <td><font size="-2"><strong>KETERANGAN</strong></font></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $Array1=$r['id_nsp'];
                    $data1 = explode(",",$Array1);
                    if($data1[0]!=""){$Where0=" id='$data1[0]' ";}
                    if($data1[0]!=""){
                    $qry0=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where0 ");
                    $row0=mysqli_fetch_array($qry0);
                    }
                    ?>
                    <?php if($data1[0]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row0['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row0['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row0['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row0['lebar']."/".$row0['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row0['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row0['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row0['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row0['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row0['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[1]!=""){$Where1=" id='$data1[1]' ";}
                    if($data1[1]!=""){
                    $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where1 ");
                    $row1=mysqli_fetch_array($qry1);
                    }
                    ?>
                    <?php if($data1[1]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['lebar']."/".$row1['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row1['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row1['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row1['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row1['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row1['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[2]!=""){$Where2=" id='$data1[2]' ";}
                    if($data1[2]!=""){
                    $qry2=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where2 ");
                    $row2=mysqli_fetch_array($qry2); 
                    }
                    ?>
                    <?php if($data1[2]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row2['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row2['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row2['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row2['lebar']."/".$row2['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row2['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row2['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row2['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row2['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row2['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[3]!=""){$Where3=" id='$data1[3]' ";}
                    if($data1[3]!=""){
                    $qry3=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where3 ");
                    $row3=mysqli_fetch_array($qry3); 
                    }
                    ?>
                    <?php if($data1[3]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row3['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row3['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row3['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row3['lebar']."/".$row3['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row3['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row3['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row3['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row3['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row3['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[4]!=""){$Where4=" id='$data1[4]' ";}
                    if($data1[4]!=""){
                    $qry4=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where4 ");
                    $row4=mysqli_fetch_array($qry4); 
                    }
                    ?>
                    <?php if($data1[4]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row4['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row4['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row4['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row4['lebar']."/".$row4['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row4['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row4['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row4['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row4['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row4['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[5]!=""){$Where5=" id='$data1[5]' ";}
                    if($data1[5]!=""){
                    $qry5=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where5 ");
                    $row5=mysqli_fetch_array($qry5); 
                    }
                    ?>
                    <?php if($data1[5]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row5['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row5['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row5['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row5['lebar']."/".$row5['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row5['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row5['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row5['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row5['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row5['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[6]!=""){$Where6=" id='$data1[6]' ";}
                    if($data1[6]!=""){
                    $qry6=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where6 ");
                    $row6=mysqli_fetch_array($qry6); 
                    }
                    ?>
                    <?php if($data1[6]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row6['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row6['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row6['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row6['lebar']."/".$row6['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row6['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row6['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row6['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row6['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row6['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[7]!=""){$Where7=" id='$data1[7]' ";}
                    if($data1[7]!=""){
                    $qry7=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where7 ");
                    $row7=mysqli_fetch_array($qry7);
                    } 
                    ?>
                    <?php if($data1[7]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row7['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row7['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row7['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row7['lebar']."/".$row7['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row7['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row7['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row7['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row7['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row7['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[8]!=""){$Where8=" id='$data1[8]' ";}else{}
                    if($data1[8]!=""){
                    $qry8=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where8 ");
                    $row8=mysqli_fetch_array($qry8); 
                    }
                    ?>
                    <?php if($data1[8]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row8['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row8['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row8['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row8['lebar']."/".$row8['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row8['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row8['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row8['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row8['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row8['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[9]!=""){$Where9=" id='$data1[9]' ";}
                    if($data1[9]!=""){
                    $qry9=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where9 ");
                    $row9=mysqli_fetch_array($qry9); 
                    }
                    ?>
                    <?php if($data1[9]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row9['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row9['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row9['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row9['lebar']."/".$row9['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row9['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row9['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row9['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row9['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row9['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[10]!=""){$Where10=" id='$data1[10]' ";}
                    if($data1[10]!=""){
                    $qry10=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where10 ");
                    $row10=mysqli_fetch_array($qry10); 
                    }
                    ?>
                    <?php if($data1[10]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row10['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row10['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row10['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row10['lebar']."/".$row10['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row10['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row10['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row10['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row10['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row10['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[11]!=""){$Where11=" id='$data1[11]' ";}
                    if($data1[11]!=""){
                    $qry11=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where11 ");
                    $row11=mysqli_fetch_array($qry11); 
                    }
                    ?>
                    <?php if($data1[11]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row11['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row11['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row11['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row11['lebar']."/".$row11['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row11['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row11['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row11['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row11['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row11['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[12]!=""){$Where12=" id='$data1[12]' ";}
                    if($data1[12]!=""){
                    $qry12=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where12 ");
                    $row12=mysqli_fetch_array($qry12); 
                    }
                    ?>
                    <?php if($data1[12]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row12['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row12['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row12['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row12['lebar']."/".$row12['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row12['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row12['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row12['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row12['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row12['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[13]!=""){$Where13=" id='$data1[13]' ";}
                    if($data1[13]!=""){
                    $qry13=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where13 ");
                    $row13=mysqli_fetch_array($qry13); 
                    }
                    ?>
                    <?php if($data1[13]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row13['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row13['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row13['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row13['lebar']."/".$row13['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row13['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row13['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row13['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row13['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row13['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[14]!=""){$Where14=" id='$data1[14]' ";}
                    if($data1[14]!=""){
                    $qry14=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where14 ");
                    $row14=mysqli_fetch_array($qry14); 
                    }
                    ?>
                    <?php if($data1[14]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row14['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row14['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row14['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row14['lebar']."/".$row14['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row14['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row14['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row14['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row14['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row14['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <?php
                    if($data1[15]!=""){$Where15=" id='$data1[15]' ";}
                    if($data1[15]!=""){
                    $qry15=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE $Where15 ");
                    $row15=mysqli_fetch_array($qry15); 
                    }
                    ?>
                    <?php if($data1[15]!=""){?>
                        <tr>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row15['po']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row15['no_order']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row15['no_hanger']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row15['lebar']."/".$row15['gramasi']);?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row15['lot'];?></font></td>
                            <td align="center" valign="middle" style="font-size:7px;"><?php echo $row15['warna'];?></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row15['qty_kirim'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row15['masalah'];?></font></td>
                            <td align="center" valign="middle"><font size="-2"><?php echo $row15['ket'];?></font></td>
                        </tr>
                    <?php }?>
                    <tr>
                        <td colspan="9" width="50%" align="left" style="border-top:0px #000000 solid; 
                            border-left:0px #000000 solid; 
                            border-right:0px #000000 solid; 
                            border-bottom:0px #000000 solid; height:0.3in;"><strong>KETERANGAN : </strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="9" width="50%" align="left" style="border-top:0px #000000 solid; 
                            border-left:0px #000000 solid; 
                            border-right:0px #000000 solid; 
                            border-bottom:0px #000000 solid; height:0.3in;"><strong><?php echo $r['ket'];?> </strong>
                        </td>
                    </tr>
                    </tbody>
                </table></td>
            </tr>
            
        </table></td>
    </tr>
    <tr>
      <td><table border="0" class="table-list1" width="100%">
        <tr align="center">
          <td width="14%">&nbsp;</td>
          <td width="17%" colspan="2">Dibuat Oleh :</td>
          <td width="14%">Mengetahui :</td>
          <td width="14%">Menyetujui :</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td align="center"><input name="nama" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama1" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama2" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama3" type="text" placeholder="Ketik" size="10" /></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td align="center"><input name="nama" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama1" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama2" type="text" placeholder="Ketik" size="10" /></td>
          <td align="center"><input name="nama3" type="text" placeholder="Ketik" size="10" /></td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td align="center"><?php echo date("d F Y", strtotime($rTgl['tgl_skrg']));?></td>
          <td align="center"><?php echo date("F Y", strtotime($rTgl['tgl_skrg']));?></td>
          <td align="center"><?php echo date("F Y", strtotime($rTgl['tgl_skrg']));?></td>
          <td align="center"><?php echo date("F Y", strtotime($rTgl['tgl_skrg']));?></td>
        </tr>
        <tr>
          <td valign="top" style="height: 0.6in;" >Tanda Tangan</td>
          <td align="center">&nbsp;</td>
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