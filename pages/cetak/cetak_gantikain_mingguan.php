<?php
ini_set("error_reporting", 1);
session_start();
//include("../koneksi.php");
//$con=mysqli_connect("10.0.0.10","dit","4dm1n");
//$con=mysqli_connect("localhost","root","");
//$db=mysqli_select_db("db_qc",$con)or die("Gagal Koneksi");
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
if($_GET['total']!=""){
$TotalKirim = $_GET['total'];	
}else{
$TotalKirim = "0";	
}

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
<title>Cetak Ganti Kain Mingguan</title>
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
        margin-left: 0mm; 
        margin-right: 0mm
        }
}	
</style>	
</head>
<?php 
//$nmBln=array(1 => "JANUARI","FEBUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");	
?>
<body>
<table width="100%">
  <thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1"> 
  <tr>
        <td align="center"><strong><font size="+1">LAPORAN MINGGUAN GANTI KAIN EKSTERNAL</font><br />
		<font size="-1">Periode: <?php echo date("d/m/Y", strtotime($Awal));?> s/d <?php echo date("d/m/Y", strtotime($Akhir));?></font>
    </tr>
  </table>

		</td>
    </tr>
	</thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1">
        <thead>
          <tr align="center">
			<td><font size="-2"><strong>No</strong></font></td>
            <td><font size="-2"><strong>Date Replacement Open</strong></font></td>
            <td><font size="-2"><strong>Gmt Fcty</strong></font></td>
            <td><font size="-2"><strong>Factory Order Number</strong></font></td>
            <td><font size="-2"><strong>Vendor Order Number</strong></font></td>
            <td><font size="-2"><strong>G. No.</strong></font></td>
            <td><font size="-2"><strong>No Item</strong></font></td>
            <td><font size="-2"><strong>Description</strong></font></td>
            <td><font size="-2"><strong>Width & Weight</strong></font></td>
            <td><font size="-2"><strong>Color</strong></font></td>
            <td><font size="-2"><strong>Total Order Qty</strong></font></td>
            <td><font size="-2"><strong>Qty Ganti Kain</strong></font></td>
            <td><font size="-2"><strong>%</strong></font></td>
            <td><font size="-2"><strong>Defect</strong></font></td>
            <td><font size="-2"><strong>Tanggung Jawab</strong></font></td>
          </tr>
		</thead>
		<tbody>  
		<?php
        $no=1;
        $Awal=$_GET['awal'];
        $Akhir=$_GET['akhir'];		
        $qry1=mysqli_query($con,"SELECT *, SUM(qty_order) as qty_order_lgn, SUM(qty_claim) as qty_claim_lgn, SUM(kg1) as kg1_lgn 
        FROM tbl_ganti_kain_now WHERE id_disposisi is null and  DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' GROUP BY langganan, id");
        $torder=0;
        $tclaim=0;
        $tpersen=0;
            while($row1=mysqli_fetch_array($qry1)){
                if($row1['t_jawab']!="" and $row1['t_jawab1']!="" and $row1['t_jawab2']!="" and $row1['persen']!="0" and $row1['persen1']!="0" and $row1['persen2']!="0"){ $tjawab=$row1['t_jawab']." ".$row1['persen']."% ".$row1['t_jawab1']." ".$row1['persen1']."% ".$row1['t_jawab2']." ".$row1['persen2']."%";
                }else if($row1['t_jawab']!="" and $row1['persen']!="0" and $row1['t_jawab1']!="" and $row1['persen1']!="0" and $row1['t_jawab2']=="" and $row1['persen2']=="0"){
                $tjawab=$row1['t_jawab']." ".$row1['persen']."% ".$row1['t_jawab1']." ".$row1['persen1']."%";	
                }else if($row1['t_jawab']!="" and $row1['persen']!="0" and $row1['t_jawab1']=="" and $row1['persen1']=="0" and $row1['t_jawab2']!="" and $row1['persen2']!="0"){
                $tjawab=$row1['t_jawab']." ".$row1['persen']."% ".$row1['t_jawab2']." ".$row1['persen2']."%";	
                }else if($row1['t_jawab']=="" and $row1['persen']=="0" and $row1['t_jawab1']!="" and $row1['persen1']!="0" and $row1['t_jawab2']!="" and $row1['persen2']!="0"){
                $tjawab=$row1['t_jawab1']." ".$row1['persen1']."% ".$row1['t_jawab2']." ".$row1['persen2']."%";	
                }else if($row1['t_jawab']!="" and $row1['persen']!="0" and $row1['t_jawab1']=="" and $row1['persen1']=="0" and $row1['t_jawab2']=="" and $row1['persen2']=="0"){
                $tjawab=$row1['t_jawab']." ".$row1['persen']."%";
                }else if($row1['t_jawab']=="" and $row1['persen']=="0" and $row1['t_jawab1']!="" and $row1['persen1']!="0" and $row1['t_jawab2']=="" and $row1['persen2']=="0"){
                $tjawab=$row1['t_jawab1']." ".$row1['persen1']."%";
                }else if($row1['t_jawab']=="" and $row1['persen']=="0" and $row1['t_jawab1']=="" and $row1['persen1']=="0" and $row1['t_jawab2']!="" and $row1['persen2']!="0"){
                $tjawab=$row1['t_jawab2']." ".$row1['persen2']."%";	
                }else if($row1['t_jawab']=="" and $row1['persen']=="0" and $row1['t_jawab1']=="" and $row1['persen1']=="0" and $row1['t_jawab2']=="" and $row1['persen2']=="0"){
                $tjawab="";	
                }
		 ?>
          <tr valign="top">
            <td align="center" valign="middle"><font size="-2"><?php echo $no; ?></font></td>
            <td align="left" valign="middle"><font size="-2"><?php echo date("d/m/y", strtotime($row1['tgl_buat']));?></font></td>
            <td align="left" valign="middle"><font size="-2"><?php echo strtoupper($row1['langganan']);?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['no_po']);?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['no_order']);?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['kd_ganti']);?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo strtoupper($row1['no_item']);?></font></td>
            <td align="left" style="font-size: 8px;"><?php echo substr(strtoupper($row1['jenis_kain']),0,45);?></td>
            <td align="center" valign="middle"><font size="-2"><?php echo $row1['lebar']."X".$row1['gramasi'];?></font></td>
            <td align="left" valign="middle" style="font-size: 8px;"><?php echo substr($row1['warna1'],0,40);?></td>
            <td align="center" valign="middle"><font size="-2"><?php echo $row1['qty_order'];?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo $row1['kg1'];?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo round(($row1['kg1']/$row1['qty_order'])*100,2)."%";?></font></td>
            <td align="left" valign="middle"><font size="-2"><?php echo $row1['masalah'];?></font></td>
            <td align="center" valign="middle"><font size="-2"><?php echo $tjawab; ?></font></td>
          </tr>
        <?php $no++;
        $torder=$torder+$row1['qty_order_lgn'];
        $tclaim=$tclaim+$row1['kg1_lgn'];
        $tpersen=round(($tclaim/$torder)*100,2);
        } 
        ?>
          <tr valign="top">
            <td colspan="10" align="center"><strong>TOTAL</strong></td>
            <td align="right"><strong><?php echo number_format($torder,2);?></strong></td>
            <td align="right"><strong><?php echo number_format($tclaim,2);?></strong></td>
            <td align="right"><strong><?php echo $tpersen."%";?></strong></td>
            <td colspan="4" align="center">&nbsp;</td>
          </tr>
			
        </tbody>
      </table></td>
    </tr>
    <tr>
        <td><table width="30%" border="1" class="table-list1">
            <tr>
                <td colspan="2" align="center"><strong>Laporan pertanggal <?php echo date("d/m/Y", strtotime($Awal));?> s/d <?php echo date("d/m/Y", strtotime($Akhir));?></strong></td> 
            </tr>
            <tr>
                <td align="left" width="60%"><strong>Total Ganti Kain</strong></td>
                <td align="center" width="40%"><strong><?php echo number_format($tclaim,2);?></strong></td>
            </tr>
            <tr>
                <td align="left" width="60%"><strong>Total Qty Order Ganti Kain</strong></td>
                <td align="center" width="40%"><strong><?php echo number_format($torder,2);?></strong></td>
            </tr>
            <tr>
                <td align="left" width="60%"><strong>Persentase</strong></td>
                <td align="center" width="40%"><strong><?php if($torder != "0"){ echo number_format(($tclaim/$torder)*100,2)." %"; }else{ echo "0.00"; } ?></strong></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><table width="30%" border="1" class="table-list1">
            <tr>
                <td align="left" width="60%"><strong>Total Ganti Kain</strong></td>
                <td align="center" width="40%"><strong><?php echo number_format($tclaim,2);?></strong></td>
            </tr>
            <tr>
                <td align="left" width="60%"><strong>Total Qty Pengiriman</strong></td>
                <td align="center" width="40%"><strong><?php echo number_format($TotalKirim,2);?></strong></td>
            </tr>
            <tr>
                <td align="left" width="60%"><strong>Persentase</strong></td>
                <td align="center" width="40%"><strong><?php if($TotalKirim != "0"){ echo number_format(($tclaim/$TotalKirim)*100,2)." %";}else { echo "0.00 %";}?></strong></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><table width="30%" border="1" class="table-list1">
            <?php
            $Awal=$_GET['awal'];
            $Akhir=$_GET['akhir'];
            if($Awal !="" AND $Akhir !=""){ $Where=" DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ";} 
            $qryQC=mysqli_query($con,"SELECT SUM(qty_claim) AS qty_claim_qc FROM tbl_ganti_kain_now WHERE id_disposisi is null and $Where AND (`t_jawab`='QCF' OR `t_jawab1`='QCF' OR `t_jawab2`='QCF')");
            $rowQC=mysqli_fetch_array($qryQC);
            ?>
            <tr>
                <td align="left" width="60%"><strong>Ganti Kain Masalah QCF</strong></td>
                <td align="center" width="40%"><strong><?php echo number_format($rowQC['qty_claim_qc'],2);?></strong></td>
            </tr>
            <tr>
                <td align="left" width="60%"><strong>Total Qty Order Ganti Kain</strong></td>
                <td align="center" width="40%"><strong><?php echo number_format($torder,2);?></strong></td>
            </tr>
            <tr>
                <td align="left" width="60%"><strong>Persentase</strong></td>
                <td align="center" width="40%"><strong><?php if($torder != "0"){ echo number_format(($rowQC['qty_claim_qc']/$torder)*100,2)." %"; }else { echo "0.00 %"; }?></strong></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><table width="30%" border="1" class="table-list1">
            <?php
            $Awal=$_GET['awal'];
            $Akhir=$_GET['akhir'];
            if($Awal !="" AND $Akhir !=""){ $Where=" DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ";} 
            $qryQC=mysqli_query($con,"SELECT SUM(qty_claim) AS qty_claim_qc FROM tbl_ganti_kain_now WHERE id_disposisi is null and $Where AND (`t_jawab`='QCF' OR `t_jawab1`='QCF' OR `t_jawab2`='QCF')");
            $rowQC=mysqli_fetch_array($qryQC);
            ?>
            <tr>
                <td align="left"  width="60%"><strong>Ganti Kain Masalah QCF</strong></td>
                <td align="center" width="40%"><strong><?php echo number_format($rowQC['qty_claim_qc'],2);?></strong></td>
            </tr>
            <tr>
                <td align="left" width="60%"><strong>Total Qty Pengiriman</strong></td>
                <td align="center" width="40%"><strong><?php echo number_format($TotalKirim,2);?></strong></td>
            </tr>
            <tr>
                <td align="left" width="60%"><strong>Persentase</strong></td>
                <td align="center" width="40%">
					<strong><?php if($TotalKirim != "0"){ echo number_format(($rowQC['qty_claim_qc']/$TotalKirim)*100,4)." %"; } else{ echo " 0.00 %";}?></strong></td>
            </tr>
        </table></td>
    </tr>
</table>

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>