<?php
ini_set("error_reporting", 1);
session_start();
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$GShift=$_GET['shft'];
$Subdept=$_GET['subdept'];
$TotalKirim=$_GET['total'];
$TotalLot=$_GET['total_lot'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Laporan Lolos/Disposisi</title>
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
$nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");	
?>
<body>
<table width="100%">
  <thead>
    <tr>
        <td><table width="100%" border="1" class="table-list1"> 
            <tr>
                <td align="center"><strong><font size="+1">LAPORAN LOLOS/DISPOSISI</font><br />
                    <font size="-1">Periode: <?php echo date("d/m/Y", strtotime($Awal));?> s/d <?php echo date("d/m/Y", strtotime($Akhir));?></font>
                    <br />
                </strong></td>
            </tr>
        </table></td>
    </tr>
	</thead>
    <tr>
        <td><table width="100%" border="1" class="table-list1">
            <thead>
                <tr align="center">
                    <td><font size="-2"><strong>NO</strong></font></td>
                    <td><font size="-2"><strong>LANGGANAN</strong></font></td>
                    <td><font size="-2"><strong>ORDER</strong></font></td>
                    <td><font size="-2"><strong>JENIS KAIN</strong></font></td>
                    <td><font size="-2"><strong>LEBAR &amp; GRAMASI</strong></font></td>
                    <td><font size="-2"><strong>LOT</strong></font></td>
                    <td><font size="-2"><strong>WARNA</strong></font></td>
                    <td><font size="-2"><strong>QTY KIRIM</strong></font></td>
                    <td><font size="-2"><strong>QTY KELUHAN</strong></font></td>
                    <td><font size="-2"><strong>MASALAH</strong></font></td>
                    <td><font size="-2"><strong>SOLUSI</strong></font></td>
                    <td><font size="-2"><strong>PENYEBAB</strong></font></td>
                    <td><font size="-2"><strong>PEJABAT</strong></font></td>
                    <td><font size="-2"><strong>SHIFT</strong></font></td>
                    <td><font size="-2"><strong>KETERANGAN</strong></font></td>
                    <td><font size="-2"><strong>&nbsp;</strong></font></td>
                </tr>
            </thead>
		    <tbody>
            <?php
                $no=1;
                if($Awal!=""){
                    $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]'
                            AND (sts='1' OR sts_disposisiqc='1' OR kategori!='' OR (pejabat!='' AND sts_disposisipro='1')) ORDER BY pejabat ASC");
                    }else{
                    $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]'
                            AND (sts='1' OR sts_disposisiqc='1' OR kategori!='' OR (pejabat!='' AND sts_disposisipro='1')) ORDER BY pejabat ASC");
                    }
                $tkirim=0;
                $tclaim=0;
                while($row1=mysqli_fetch_array($qry1)){
                    if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){ $tjawab=$row1['t_jawab'].",".$row1['t_jawab1'].", ".$row1['t_jawab2'];
                    }else if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']==""){
                    $tjawab=$row1['t_jawab'].",".$row1['t_jawab1'];	
                    }else if($row1['t_jawab']!="" and $row1['t_jawab1']=="" and $row1['t_jawab2']!=""){
                    $tjawab=$row1['t_jawab'].",".$row1['t_jawab2'];	
                    }else if($row1['t_jawab']=="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!=""){
                    $tjawab=$row1['t_jawab1'].",".$row1['t_jawab2'];	
                    }else if($row1['t_jawab']!="" and $row1['t_jawab1']=="" and $row1['t_jawab2']==""){
                    $tjawab=$row1['t_jawab'];
                    }else if($row1['t_jawab']=="" and $row1['t_jawab1']!="" and $row1['t_jawab2']==""){
                    $tjawab=$row1['t_jawab1'];
                    }else if($row1['t_jawab']=="" and $row1['t_jawab1']=="" and $row1['t_jawab2']!=""){
                    $tjawab=$row1['t_jawab2'];	
                    }else if($row1['t_jawab']=="" and $row1['t_jawab1']=="" and $row1['t_jawab2']==""){
                    $tjawab="";	
                    }
            ?>
            <tr valign="top">
                <td align="center"><font size="-2"><?php echo $no; ?></font></td>
                <td><font size="-2"><?php echo strtoupper($row1['langganan']);?></font></td>
                <td align="center"><font size="-2"><?php echo strtoupper($row1['no_order']);?></font></td>
                <td><font size="-2"><?php echo strtoupper($row1['jenis_kain']);?></font></td>
                <td align="center"><font size="-2"><?php echo $row1['lebar']."x".$row1['gramasi'];?></font></td>
                <td align="center"><font size="-2"><?php echo strtoupper($row1['lot']);?></font></td>
                <td align="center"><font size="-2"><?php echo strtoupper($row1['warna']);?></font></td>
                <td align="right"><font size="-2"><?php echo strtoupper($row1['qty_kirim']);?></font></td>
                <td align="right"><font size="-2"><?php echo strtoupper($row1['qty_claim']);?></font></td>
                <td valign="top"><font size="-2"><?php echo $row1['masalah'];?></font></td>
                <td valign="top"><font size="-2"><?php echo $row1['solusi'];?></font></td>
                <td valign="top"><font size="-2"><?php echo $row1['penyebab'];?></font></td>
                <td valign="top"><font size="-2"><?php echo $row1['pejabat'];?></font></td>
                <td valign="top"><font size="-2"><?php if($row1['shift2']!=""){echo $row1['shift'].",".$row1['shift2'];}else{echo $row1['shift'];}?></font></td>
                <td valign="top"><font size="-2"><?php echo $row1['ket'];?></font></td>
                <td valign="top"><font size="-2"><?php if($row1['sts_check']=="Ceklis"){echo "&#10004";}else{echo "X";}?></font></td>
            </tr>
            <?php	
                $no++; 
				$tkirim=$tkirim+$row1['qty_kirim'];
				$tclaim=$tclaim+$row1['qty_claim'];
			} ?>	
            <tr valign="top">
                <td colspan="7" align="right"><strong>TOTAL</strong></td>
                <td align="right"><strong><?php echo $tkirim;?></strong></td>
                <td align="right"><strong><?php echo $tclaim;?></strong></td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>
            </tbody>
        </table></td>
    </tr>
    <tr>
        <td><table width="100%" border="1" class="table-list1">
            <thead>
                <tr align="center">
                    <td rowspan="2" colspan="2"><font size="-2"><strong>PENYEBAB KELUHAN PELANGGAN</strong></font></td>
                    <td rowspan="2"><font size="-2"><strong>QTY KELUHAN (KG)</strong></font></td>
                    <td rowspan="2"><font size="-2"><strong>% DIBANDINGKAN TOTAL KIRIM</strong></font></td>
                    <td rowspan="2"><font size="-2"><strong>RETUR</strong></font></td>
                    <td rowspan="2"><font size="-2"><strong>% DIBANDINGKAN TOTAL KIRIM</strong></font></td>
                    <td rowspan="2"><font size="-2"><strong>GANTI KAIN EKSTERNAL</strong></font></td>
                    <td rowspan="2"><font size="-2"><strong>% DIBANDINGKAN TOTAL KIRIM</strong></font></td>
                    <td rowspan="2"><font size="-2"><strong>PERBAIKAN GARMENT</strong></font></td>
                    <td rowspan="2"><font size="-2"><strong>% DIBANDINGKAN TOTAL KIRIM</strong></font></td>
                    <td rowspan="2"><font size="-2"><strong>LETTER OF GUARANTEE (LG)</strong></font></td>
                    <td rowspan="2"><font size="-2"><strong>% DIBANDINGKAN TOTAL KIRIM</strong></font></td>
                </tr>
            </thead>
            <tbody>
            <?php 
            $qryjml= mysqli_query($con,"SELECT a.jml_dispro, b.jml_disqc FROM
            (SELECT COUNT(DISTINCT(pejabat)) AS jml_dispro FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisipro = '1' AND pejabat!='') AS A,
            (SELECT COUNT(DISTINCT(pejabat)) AS jml_disqc FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND sts_disposisiqc = '1' AND pejabat!='') AS B");
            $rjml = mysqli_fetch_array($qryjml);
            ?>
            <tr>
                <td align="center" rowspan="<?php echo $rjml['jml_dispro']+1;?>" >DISPOSISI PRODUKSI</td>
            </tr>
            <?php
            $pjbpro=mysqli_query($con,"SELECT DISTINCT pejabat AS pejabat, SUM(qty_claim) AS qty_claim FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
            AND sts_disposisipro = '1' AND pejabat!='' 
            GROUP BY pejabat 
            ORDER BY qty_claim DESC");
            while($rpjbpro=mysqli_fetch_array($pjbpro)){
            $dpro=mysqli_query($con,"SELECT a.pejabat, SUM(a.qty_claim) AS qty_claim, b.qty_retur, c.qty_gantikain, d.qty_pg, e.qty_lg FROM tbl_aftersales_now a
                    LEFT JOIN 
                    (SELECT
                    pejabat, SUM(qty_claim) AS qty_retur FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
                    AND pejabat='$rpjbpro[pejabat]' AND sts_disposisipro='1' AND solusi='RETUR') b
                    ON a.pejabat = b.pejabat
                    LEFT JOIN 
                    (SELECT
                    pejabat, SUM(qty_claim) AS qty_gantikain FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
                    AND pejabat='$rpjbpro[pejabat]' AND sts_disposisipro='1' AND solusi='CUTTING LOSS (GANTI KAIN)') c
                    ON a.pejabat = c.pejabat
                    LEFT JOIN 
                    (SELECT
                    pejabat, SUM(qty_claim) AS qty_pg FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
                    AND pejabat='$rpjbpro[pejabat]' AND sts_disposisipro='1' AND solusi='PERBAIKAN GARMENT') d
                    ON a.pejabat = d.pejabat
                    LEFT JOIN 
                    (SELECT
                    pejabat, SUM(qty_claim) AS qty_lg FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
                    AND pejabat='$rpjbpro[pejabat]' AND sts_disposisipro='1' AND solusi='LETTER OF GUARANTEE (LG)') e
                    ON a.pejabat = e.pejabat
                    WHERE DATE_FORMAT(a.tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND a.sts_disposisipro='1' AND a.pejabat='$rpjbpro[pejabat]'");
            $rpro=mysqli_fetch_array($dpro);
            ?>
            <tr>
                <td align="center"><?php echo $rpjbpro['pejabat'];?></td>
                <td align="center"><?php echo $rpro['qty_claim'];?></td>
                <td align="center"><?php echo number_format(($rpro['qty_claim']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rpro['qty_retur'];?></td>
                <td align="center"><?php echo number_format(($rpro['qty_retur']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rpro['qty_gantikain'];?></td>
                <td align="center"><?php echo number_format(($rpro['qty_gantikain']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rpro['qty_pg'];?></td>
                <td align="center"><?php echo number_format(($rpro['qty_pg']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rpro['qty_lg'];?></td>
                <td align="center"><?php echo number_format(($rpro['qty_lg']/$TotalKirim)*100,2)." %";?></td>
            </tr>
            <?php } ?>
            <tr>
                <td align="center" rowspan="<?php echo $rjml['jml_disqc']+1;?>" >DISPOSISI QC</td>
            </tr>
            <?php 
            $pjbqc=mysqli_query($con,"SELECT DISTINCT pejabat AS pejabat, SUM(qty_claim) AS qty_claim FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
            AND sts_disposisiqc = '1' AND pejabat!='' 
            GROUP BY pejabat 
            ORDER BY qty_claim DESC");
            while($rpjbqc=mysqli_fetch_array($pjbqc)){
            $dqc=mysqli_query($con,"SELECT a.pejabat, SUM(a.qty_claim) AS qty_claim, b.qty_retur, c.qty_gantikain, d.qty_pg, e.qty_lg FROM tbl_aftersales_now a
            LEFT JOIN 
            (SELECT
            pejabat, SUM(qty_claim) AS qty_retur FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
            AND pejabat='$rpjbqc[pejabat]' AND sts_disposisiqc='1' AND solusi='RETUR') b
            ON a.pejabat = b.pejabat
            LEFT JOIN 
            (SELECT
            pejabat, SUM(qty_claim) AS qty_gantikain FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
            AND pejabat='$rpjbqc[pejabat]' AND sts_disposisiqc='1' AND solusi='CUTTING LOSS (GANTI KAIN)') c
            ON a.pejabat = c.pejabat
            LEFT JOIN 
            (SELECT
            pejabat, SUM(qty_claim) AS qty_pg FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
            AND pejabat='$rpjbqc[pejabat]' AND sts_disposisiqc='1' AND solusi='PERBAIKAN GARMENT') d
            ON a.pejabat = d.pejabat
            LEFT JOIN 
            (SELECT
            pejabat, SUM(qty_claim) AS qty_lg FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
            AND pejabat='$rpjbqc[pejabat]' AND sts_disposisiqc='1' AND solusi='LETTER OF GUARANTEE (LG)') e
            ON a.pejabat = e.pejabat
            WHERE DATE_FORMAT(a.tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND a.sts_disposisiqc='1' AND a.pejabat='$rpjbqc[pejabat]'");
            $rqc=mysqli_fetch_array($dqc);
            ?>
            <tr>
                <td align="center"><?php echo $rpjbqc['pejabat'];?></td>
                <td align="center"><?php echo $rqc['qty_claim'];?></td>
                <td align="center"><?php echo number_format(($rqc['qty_claim']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rqc['qty_retur'];?></td>
                <td align="center"><?php echo number_format(($rqc['qty_retur']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rqc['qty_gantikain'];?></td>
                <td align="center"><?php echo number_format(($rqc['qty_gantikain']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rqc['qty_pg'];?></td>
                <td align="center"><?php echo number_format(($rqc['qty_pg']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rqc['qty_lg'];?></td>
                <td align="center"><?php echo number_format(($rqc['qty_lg']/$TotalKirim)*100,2)." %";?></td>
            </tr>
            <?php } ?>
            <?php
            $dlolos=mysqli_query($con,"SELECT a.sts, SUM(a.qty_claim) AS qty_claim, b.qty_retur, c.qty_gantikain, d.qty_pg, e.qty_lg FROM tbl_aftersales_now a
            LEFT JOIN 
            (SELECT
            sts, SUM(qty_claim) AS qty_retur FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
            AND sts='1' AND solusi='RETUR') b
            ON a.sts = b.sts
            LEFT JOIN 
            (SELECT
            sts, SUM(qty_claim) AS qty_gantikain FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
            AND sts='1' AND solusi='CUTTING LOSS (GANTI KAIN)') c
            ON a.sts = c.sts
            LEFT JOIN 
            (SELECT
            sts, SUM(qty_claim) AS qty_pg FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
            AND sts='1' AND solusi='PERBAIKAN GARMENT') d
            ON a.sts = d.sts
            LEFT JOIN 
            (SELECT
            sts, SUM(qty_claim) AS qty_lg FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
            AND sts='1' AND solusi='LETTER OF GUARANTEE (LG)') e
            ON a.sts = e.sts
            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND a.sts='1'");
            $rlolos=mysqli_fetch_array($dlolos);
            ?>
            <tr>
                <td align="center" colspan="2">LOLOS QC</td>
                <td align="center"><?php echo $rlolos['qty_claim'];?></td>
                <td align="center"><?php echo number_format(($rlolos['qty_claim']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rlolos['qty_retur'];?></td>
                <td align="center"><?php echo number_format(($rlolos['qty_retur']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rlolos['qty_gantikain'];?></td>
                <td align="center"><?php echo number_format(($rlolos['qty_gantikain']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rlolos['qty_pg'];?></td>
                <td align="center"><?php echo number_format(($rlolos['qty_pg']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rlolos['qty_lg'];?></td>
                <td align="center"><?php echo number_format(($rlolos['qty_lg']/$TotalKirim)*100,2)." %";?></td>
            </tr>
            <?php 
            $ktgr = mysqli_query($con,"SELECT kategori,keterangan FROM tbl_kategori_aftersales ORDER BY id ASC");
            while($rktgr=mysqli_fetch_array($ktgr)){
                $dkt=mysqli_query($con,"SELECT a.kategori, SUM(a.qty_claim) AS qty_claim, b.qty_retur, c.qty_gantikain, d.qty_pg, e.qty_lg FROM tbl_aftersales_now a
                LEFT JOIN 
                (SELECT
                kategori, SUM(qty_claim) AS qty_retur FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
                AND kategori='$rktgr[kategori]' AND solusi='RETUR') b
                ON a.kategori = b.kategori
                LEFT JOIN 
                (SELECT
                kategori, SUM(qty_claim) AS qty_gantikain FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
                AND kategori='$rktgr[kategori]' AND solusi='CUTTING LOSS (GANTI KAIN)') c
                ON a.kategori = c.kategori
                LEFT JOIN 
                (SELECT
                kategori, SUM(qty_claim) AS qty_pg FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
                AND kategori='$rktgr[kategori]' AND solusi='PERBAIKAN GARMENT') d
                ON a.kategori = d.kategori
                LEFT JOIN 
                (SELECT
                kategori, SUM(qty_claim) AS qty_lg FROM tbl_aftersales_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
                AND kategori='$rktgr[kategori]' AND solusi='LETTER OF GUARANTEE (LG)') e
                ON a.kategori = e.kategori
                WHERE DATE_FORMAT(a.tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND a.kategori='$rktgr[kategori]'");
                $rkt=mysqli_fetch_array($dkt);
            ?>
            <tr>
                <td align="center" colspan="2"><?php echo $rktgr['keterangan'];?></td>
                <td align="center"><?php echo $rkt['qty_claim'];?></td>
                <td align="center"><?php echo number_format(($rkt['qty_claim']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rkt['qty_retur'];?></td>
                <td align="center"><?php echo number_format(($rkt['qty_retur']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rkt['qty_gantikain'];?></td>
                <td align="center"><?php echo number_format(($rkt['qty_gantikain']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rkt['qty_pg'];?></td>
                <td align="center"><?php echo number_format(($rkt['qty_pg']/$TotalKirim)*100,2)." %";?></td>
                <td align="center"><?php echo $rkt['qty_lg'];?></td>
                <td align="center"><?php echo number_format(($rkt['qty_lg']/$TotalKirim)*100,2)." %";?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table></td>
    </tr>
</table>
</body>
</html>