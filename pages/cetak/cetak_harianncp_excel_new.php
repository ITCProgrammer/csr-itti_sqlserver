<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=lapncpharian-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$Dept=$_GET['dept'];
$Kategori=$_GET['kategori'];
$Cancel=$_GET['cancel'];
$Rev2A=$_GET['chkrev'];
	
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}



function posisi($nokk){
date_default_timezone_set('Asia/Jakarta');
$host="10.0.0.4";
$username="timdit";
$password="4dm1n";
$db_name="TM";
$connInfo = array( "Database"=>$db_name, "UID"=>$username, "PWD"=>$password);
$conn     = sqlsrv_connect( $host, $connInfo);
$sql=" select d.DepartmentName,p.CounterDepartmentID from PCCardPosition p left join
Departments d on d.ID=p.DepartmentID
left join ProcessControlBatches a on p.PCBID=a.ID
where a.DocumentNo='$nokk'  
order by p.ID DESC";
$qry=sqlsrv_query($conn,$sql);
$jmrow=sqlsrv_num_rows($qry);
$row=sqlsrv_fetch_array($qry);	
	return $row['DepartmentName'];
}	
?>


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Harian NCP</title>
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

<body>
<table width="100%">
  <thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1"> 
  <tr>
    <td width="3%" align="center">&nbsp;</td>
    <td width="3%" align="center">&nbsp;</td>
    <td width="94%" align="center" valign="middle"><strong><font size="+1" >LAPORAN NCP BULANAN</font></strong></td>
    </tr>
  </table>
<table width="100%" border="0">
    <tbody>
      <tr>
        <td width="90%">&nbsp;</td>
        <td width="10%">Dept : <?php echo $_GET['dept'];?><br />
Kategori :
  <?php if($_GET['kategori']=="gerobak"){echo "Kain diGerobak";}else if($_GET['kategori']=="hitung"){echo "NCP diHitung";}else if($_GET['kategori']=="tidakhitung"){echo "NCP Tidak Hitung";}else{echo "ALL";}?>
  <br />
Periode : <?php echo tanggal_indo($_GET['awal']);?> s/d <?php echo tanggal_indo($_GET['akhir']);?></td>
        </tr>
    </tbody>
  </table>
	  </td>
    </tr>
	</thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1">
        <tbody>
          <tr align="center">
            <td width="3%">No</td>
            <td>Tanggal</td>
            <td>No. NCP</td>
            <td>Posisi Terakhir</td>
            <td>Langganan</td>
            <td width="4%">Buyer</td>
            <td width="3%">PO</td>
            <td width="4%">Order</td>
            <td>Hanger</td>
            <td>Jenis Kain</td>
            <td width="4%">Warna</td>
            <td width="4%">No. Warna</td>
            <td width="3%">Lot</td>
            <td width="3%">Lot Salinan</td>
            <td width="3%">Rol</td>
            <td width="4%">Weight</td>
            <td width="4%">PO Rajut</td>
            <td>Masalah</td>
            <td>Penyelesaian</td>
            <td width="3%">NSP</td>
            <td>Tgl Rencana</td>
            <td>Tgl Aktual</td>
            <td>Akar Masalah</td>
            <td>Solusi Jangka Panjang</td>
            <td>Kartu Kerja</td>
            <td>Production Order</td>
            <td>Production Demand</td>
          </tr>
		<?php
	$no=1;
	if($Dept=="ALL"){		
	$Wdept=" ";	
	}else{	
	$Wdept=" dept='$Dept' AND ";	
	}
	if($Kategori=="ALL"){		
	$Wkategori=" ";	
	}
	else if($Kategori=="hitung"){	
	$Wkategori=" ncp_hitung='ya' AND ";	
	}else if($Kategori=="gerobak"){	
	$Wkategori=" kain_gerobak='ya' AND ";	
	}else if($Kategori=="tidakhitung"){	
	$Wkategori=" ncp_hitung='tidak' AND ";	
	}		
	if($Cancel !="1"){
		$sts=" AND NOT status='Cancel' "; 
	}else{
		$sts="  ";
  }
	if($Rev2A == "1"){
		$WR2A= " and revisi > 1 and status='belum ok' ";
		//$FR2A= " , MAX(revisi) as rec ";
		$FR2A= " ";
		$GR2A= " ORDER BY revisi DESC ";
		//$GR2A= " GROUP BY revisi, no_ncp ORDER BY revisi DESC";
	}	else{
		$WR2A= " ";
		$FR2A= " ";
		$GR2A= " ORDER BY id ASC ";
	}	  
			
	$qry1=mysqli_query($con,"SELECT * $FR2A FROM tbl_ncp_qcf_now WHERE $Wdept $Wkategori DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $sts $WR2A 
	$GR2A ");
			while($row1=mysqli_fetch_array($qry1)){
				
$sqlSVR="SELECT ID FROM ProcessControlBatches WHERE documentno='$row1[nokk]'";
$qrySVR=sqlsrv_query($conn,$sqlSVR);
$rowSVR=sqlsrv_fetch_array($qrySVR);
		 ?>
          <tr valign="top">
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><?php echo date("d/m/y", strtotime($row1['tgl_buat']));?></td>
            <td align="center"><?php echo strtoupper($row1['no_ncp_gabungan']);?></td>
            <td align="left"><?php echo posisi($row1['nokk']); ?></td>
            <td><?php echo strtoupper($row1['langganan']);?></td>
            <td><?php echo strtoupper($row1['buyer']);?></td>
            <td><?php echo strtoupper($row1['po']);?></td>
            <td align="center"><?php echo strtoupper($row1['no_order']);?></td>
            <td><?php echo strtoupper($row1['no_hanger']);?></td>
            <td><?php echo strtoupper($row1['jenis_kain']);?></td>
            <td><?php echo strtoupper($row1['warna']);?></td>
            <td><?php echo strtoupper($row1['no_warna']);?></td>
            <td align="center">'<?php echo strtoupper($row1['lot']);?></td>
            <td align="center"><?php echo strtoupper($row1['lot_salinan']);?></td>
            <td align="center"><?php echo strtoupper($row1['rol']);?></td>
            <td align="right"><?php echo strtoupper($row1['berat']);?></td>
            <td align="center"><?php echo strtoupper($row1['po_rajut']);?></td>
            <td align="left"><?php echo strtoupper($row1['masalah']);?></td>
            <td align="center"><?php echo strtoupper($row1['penyelesaian']);?></td>
            <td align="center"><?php echo strtoupper($row1['nsp']);?></td>
            <td align="center"><?php if($row1['tgl_rencana']!=""){ echo date("d/m/y", strtotime($row1['tgl_rencana'])); }?></td>
            <td align="center"><?php if($row1['tgl_selesai']!=""){echo date("d/m/y", strtotime($row1['tgl_selesai']));}?></td>
            <td align="left"><?php echo strtoupper($row1['akar_masalah']);?></td>
            <td align="left"><?php echo strtoupper($row1['solusi_panjang']);?></td>
            <td align="left"><a href="http://10.0.0.10/online/logscan.php?kk=<?php echo $rowSVR['ID']; ?>">'<?php echo $row1['nokk']; ?></a></td>
            <td align="left"><a target="_BLANK" href="http://10.0.0.10/laporan/ppc_filter_steps.php?prod_order=<?= $row1['prod_order']; ?>"><?= $row1['prod_order']; ?></a></td> <!-- NO KARTU KERJA -->
            <td align="left"><a target="_BLANK" href="http://10.0.0.10/laporan/ppc_filter_steps.php?demand=<?= $row1['nodemand']; ?>"><?= $row1['nodemand']; ?></a></td> <!-- NO DEMAND -->
          </tr>
		<?php	$no++;  
			if($row1['status']!="Cancel"){
				$rol   =$row1['rol'];
				$berat =$row1['berat'];
				$lot   ="1";
			}else{
				$rol   ="0";
				$berat ="0";
				$lot   ="0";
			}
				$trol=$trol+$rol;
				$tberat=$tberat+$berat;
				$tlot=$tlot+$lot;
			} ?>	
          <tr valign="top">
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="right">TOTAL</td>
            <td align="center"><?php echo $tlot;?></td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $trol;?></td>
            <td align="right"><?php echo $tberat;?></td>
            <td align="right">&nbsp;</td>
            <td align="center">&nbsp;</td>
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
  
</table>

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>