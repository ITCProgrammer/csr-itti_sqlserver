<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=lap_pencapaian_".substr($_GET['awal'],0,10)."_".substr($_GET['akhir'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php
//$lReg_username=$_SESSION['labReg_username'];


include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$Dept=$_GET['dept'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Lap Pencapaian</title>
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
  <tr>
    <td><table width="100%" border="1" class="table-list1">
        <tr>
          <td colspan="10" align="center" scope="col"><h2>Laporan Pencapaian NCP</h2></td>
        </tr>
        <tr>
          <td colspan="2" scope="col"><font size="-1">Hari/Tanggal : <?php echo tanggal_indo ($tgl, true);?></font></td>
          <td scope="col">&nbsp;</td>
          <td scope="col">&nbsp;</td>
          <td scope="col">&nbsp;</td>
          <td scope="col">&nbsp;</td>
          <td scope="col">&nbsp;</td>
          <td scope="col">&nbsp;</td>
          <td scope="col">&nbsp;</td>
          <td scope="col"><font size="-1">Jam: <?php echo date('H:i:s', strtotime($jam));?></font></td>
        </tr>
				
        <tr>
          <td scope="col"><div align="center">No</div></td>
          <td scope="col"><div align="center">Buyer</div></td>
          <td scope="col"><div align="center">No. Order + No NCP</div></td>
          <td scope="col"><div align="center">Jenis Kain</div></td>
          <td scope="col"><div align="center">Tgl Kirim</div></td>
          <td scope="col"><div align="center">Warna</div></td>
          <td scope="col"><div align="center">Lot</div></td>
          <td scope="col"><div align="center">Qty</div></td>
          <td scope="col"><div align="center">Tgl Target</div></td>
          <td scope="col"><div align="center">Masalah</div></td>
        </tr>        
	<?php
		$no=1;	
	$pos=0;		
	if($Dept!=""){$where1=" AND dept='$Dept' ";}else{ $where1=" ";}	
	$qry1=mysqli_query($con,"SELECT *,DATEDIFF(tgl_rencana,DATE_FORMAT(now(),'%Y-%m-%d')) as lama, DATEDIFF(DATE_FORMAT(now(),'%Y-%m-%d'),tgl_rencana) as delay,DATEDIFF(tgl_selesai,tgl_rencana) as delay_ok 
	FROM tbl_ncp_qcf WHERE date_format(tgl_rencana,'%Y-%m-%d') between '$Awal' and '$Akhir' ".$where.$where1." ORDER BY date_format(tgl_rencana,'%Y-%m-%d') ASC");
			while($row1=mysqli_fetch_array($qry1)){
		$sql=mysqli_query($con,"SELECT COUNT(*) jml,tgl_terima,id FROM `tbl_qcf_ncp_tolak` WHERE id_qcf_ncp='$row1[id]' ORDER BY id DESC");
		$r1=mysqli_fetch_array($sql);
									
		 ?>
	<tr>
          <td scope="col"><?php echo $no;?></td>
          <td scope="col"><font size="-2"><?php echo $row1['buyer'];?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['no_order'];?></font>
            <span class="label label-danger"><?php echo $row1['no_ncp'];?></span>
            <?php if($r1['tgl_terima']=="" and $r1['jml']>0){ ?>
            <a href="#" class="btn terima_ncp_lama" id="<?php echo $r1['id']; ?>"><span class="label label-success">NCP Lama</span></a>
          <?php } ?></td>
          <td scope="col"><font size="-2"><?php echo $row1['jenis_kain'];?></font></td>
          <td scope="col"><font size="-2"><?php echo $row1['tgl_delivery'];?></font></td>
          <td scope="col"><font size="-2"><?php echo $row1['warna'];?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['lot'];?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['berat'];?></font></td>
          <td scope="col"><font size="-2"><?php echo $row1['tgl_rencana'];?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['masalah'];?></font></td>
        </tr>
		<?php	
				$no++;  } ?>
		
		  
  
		  	  
</table></td>
  </tr>
  
</table>
</body>
</html>