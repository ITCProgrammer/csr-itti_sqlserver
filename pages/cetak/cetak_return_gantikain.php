<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$AwalGK=$_GET['awalgk'];
$AkhirGK=$_GET['akhirgk'];
$AwalRT=$_GET['awalrt'];
$AkhirRT=$_GET['akhirrt'];
//$Dept=$_GET['dept'];
//$Cancel=$_GET['cancel'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak Laporan ME</title>
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
        -webkit-print-color-adjust: exact !important;
        margin-top: 3mm; 
        margin-bottom: 0mm; 
        margin-left: 10mm; 
        margin-right: 5mm
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
        <td><table border="1" class="table-list1" style="width:7.9in;"> 
        <tr>
            <td align="center"><strong><font size="+1">LAPORAN RETURN & GANTI KAIN PERTANGGAL</font>
            </strong></td>
        </tr>
        <tr>
            <td align="left"><strong><font size="+1">RETURN</font><br />
            <font size="-1">Periode: <?php echo date("d/m/Y", strtotime($AwalRT));?> s/d <?php echo date("d/m/Y", strtotime($AkhirRT));?></font></strong></td>
        </tr>
        <tr>
            <td width="32%" align="center"><table class="table-list1" width="100%">
                <tbody>
                    <tr>
                        <td width="10%" align="center"><strong>TGL</strong></td>
                        <td width="35%" align="center"><strong>LANGGANAN</strong></td>
                        <td width="10%" align="center"><strong>QTY RETURN</strong></td>
                        <td width="30%" align="center"><strong>MASALAH</strong></td>
                    </tr>
                    <?php
                        $AwalRT=$_GET['awalrt'];
                        $AkhirRT=$_GET['akhirrt'];
                        $qry1=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgltrm_sjretur, '%Y-%m-%d' ) BETWEEN '$AwalRT' AND '$AkhirRT' ORDER BY langganan ASC");
                        $cek=mysqli_num_rows($qry1);
                        $tqty=0;
                        $tad=0; 
                        $tll=0; 
                        while($row=mysqli_fetch_array($qry1)){
                    ?>
                    <tr>
                        <td align="center" valign="middle" style="font-size: 9px;"><?php echo date("d/m/y", strtotime($row['tgltrm_sjretur']));?></td>
                        <?php 
                        $AwalRT=$_GET['awalrt'];
                        $AkhirRT=$_GET['akhirrt']; 
                        //query total adidas
                        $qryad=mysqli_query($con,"SELECT SUM(kg) as kgad FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgltrm_sjretur, '%Y-%m-%d' ) BETWEEN '$AwalRT' AND '$AkhirRT' AND buyer='ADIDAS'");
                        $rowad=mysqli_fetch_array($qryad);
                        //query total Lululemon
                        $qryll=mysqli_query($con,"SELECT SUM(kg) as kgll FROM tbl_detail_retur_now 
                        WHERE DATE_FORMAT( tgltrm_sjretur, '%Y-%m-%d' ) BETWEEN '$AwalRT' AND '$AkhirRT' AND buyer LIKE 'LULULEMON%'");
                        $rowll=mysqli_fetch_array($qryll);
                        ?>
                        <td align="left" valign="middle" style="font-size: 9px;"><?php echo $row['langganan'];?></td>
                        <td align="right" valign="middle" style="font-size: 9px;"><?php echo $row['kg'];?></td>
                        <td align="left" valign="middle" style="font-size: 9px;"><?php echo $row['masalah'];?></td>
                    </tr>
                    <?php 
                    $tqty=$tqty+$row['kg'];
                    $tad=$rowad['kgad'];
                    $tll=$rowll['kgll'];
                    } ?>
                    <tr>
                        <td align="right" colspan="2"><strong>GRAND TOTAL</strong></td>
                        <td align="right" ><strong><?php echo number_format($tqty,2);?></strong></td>
                    </tr>
                    <tr>
                        <td align="right" colspan="2" style="background-color:#F4EC26;"><strong>ADIDAS</strong></td>
                        <td align="right" ><strong><?php echo number_format($tad,2);?></strong></td>
                    </tr>
                    <tr>
                        <td align="right" colspan="2" style="background-color:#F4EC26;"><strong>LULU LEMON</strong></td>
                        <td align="right" ><strong><?php echo number_format($tll,2);?></strong></td>
                    </tr>
                </tbody>
            </table></td>
        </tr>
    </table></td>
    </tr>
    <tr>
        <td><table border="1" class="table-list1" style="width:7.9in;">
            <tr>
                <td align="left" colspan="4"><strong><font size="+1">GANTI KAIN</font><br />
            <font size="-1">Periode: <?php echo date("d/m/Y", strtotime($AwalGK));?> s/d <?php echo date("d/m/Y", strtotime($AkhirGK));?></font></strong></td>
            </tr>
            <tr>
                <td width="10%" align="center"><strong>TGL</strong></td>
                <td width="35%" align="center"><strong>LANGGANAN</strong></td>
                <td width="12%" align="center"><strong>QTY GANTI KAIN</strong></td>
                <td width="30%" align="center"><strong>MASALAH</strong></td>
            </tr>
            <?php
                $AwalGK=$_GET['awalgk'];
                $AkhirGK=$_GET['akhirgk'];
                $qry2=mysqli_query($con,"SELECT *, SUM(qty_claim) as qty_claim_lgn, SUM(kg1) as kg1_lgn FROM tbl_ganti_kain_now 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalGK' AND '$AkhirGK' GROUP BY langganan, id");
                $tqty1=0;
                $tad1=0; 
                $tll1=0; 
                while($row2=mysqli_fetch_array($qry2)){
            ?>
            <tr>
                <td align="center" valign="middle" style="font-size: 9px;"><?php echo date("d/m/y", strtotime($row2['tgl_buat']));?></td>
                <td align="left" valign="middle" style="font-size: 9px;"><?php echo $row2['langganan'];?></td>
                <td align="right" valign="middle" style="font-size: 9px;"><?php echo $row2['kg1_lgn'];?></td>
                <td align="left" valign="middle" style="font-size: 9px;"><?php echo $row2['masalah'];?></td>
            </tr>
            <?php 
            $tqty1=$tqty1+$row2['kg1_lgn'];
            //$tad1=$tad1+$rowad1['qty_claim'];
            //$tad1=$rowad1['qty_claim_ad'];
            //$tll1=$tll1+$rowll1['qty_claim'];
            } ?>
            <?php 
                $AwalGK=$_GET['awalgk'];
                $AkhirGK=$_GET['akhirgk']; 
                //query total adidas
                $qryad1=mysqli_query($con,"SELECT SUM(qty_claim) AS qty_claim_ad, SUM(kg1) as kg1_lgn_ad FROM tbl_ganti_kain_now 
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalGK' AND '$AkhirGK' AND langganan LIKE '%ADIDAS%' ");
                $rowad1=mysqli_fetch_array($qryad1);
                //query total Lululemon
                $qryll1=mysqli_query($con,"SELECT SUM(qty_claim) AS qty_claim_ll, SUM(kg1) as kg1_lgn_ll FROM tbl_ganti_kain_now
                WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$AwalGK' AND '$AkhirGK' AND langganan LIKE '%LULU%' ");
                $rowll1=mysqli_fetch_array($qryll1);
                ?>
            <tr>
                <td align="right" colspan="2"><strong>GRAND TOTAL</strong></td>
                <td align="right" ><strong><?php echo number_format($tqty1,2);?></strong></td>
            </tr>
            <tr>
                <td align="right" colspan="2" style="background-color:#F4EC26;"><strong>ADIDAS</strong></td>
                <td align="right" ><strong><?php echo number_format($rowad1['kg1_lgn_ad'],2);?></strong></td>
            </tr>
            <tr>
                <td align="right" colspan="2" style="background-color:#F4EC26;"><strong>LULU LEMON</strong></td>
                <td align="right" ><strong><?php echo number_format($rowll1['kg1_lgn_ll'],2);?></strong></td>
            </tr>
        </table></td>
    </tr>
	</thead>
</table>


<script>
//alert('cetak');window.print();
</script> 
</body>
</html>