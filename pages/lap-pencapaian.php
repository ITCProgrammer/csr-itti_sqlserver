<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan NCP</title>
</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$GShift	= isset($_POST['gshift']) ? $_POST['gshift'] : '';	
$Dept	= isset($_POST['dept']) ? $_POST['dept'] : '';
$NCP	= isset($_POST['no_ncp']) ? $_POST['no_ncp'] : '';	
	
if($_POST['gshift']=="ALL"){$shft=" ";}else{$shft=" AND b.g_shift = '$GShift' ";}	
	
function posisi($nokk){
$host="10.0.0.4";
//$host="DIT\MSSQLSERVER08";
$username="sa";
$password="ditbin";
$db_name="TM";
set_time_limit(600);
$conn=mssql_connect($host,$username,$password) or die ("Sorry our web is under maintenance. Please visit us later");
mssql_select_db($db_name) or die ("Under maintenance");
$sql=" select d.DepartmentName from PCCardPosition p left join
Departments d on d.ID=p.DepartmentID
left join ProcessControlBatches a on p.PCBID=a.ID
where a.DocumentNo='$nokk' and (d.DepartmentName='KK Oke' or p.CounterDepartmentID='60' or d.DepartmentName='KAIN JADI BS') order by p.Dated ";
$qry=mssql_query($sql);
$jmrow=mssql_num_rows($qry);
	return $jmrow;
	
}	
?>
	<!-- <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Informasi</h4>
                Klik No. NCP Pada Tabel -> Kolom Order untuk input data Tindakan Penyelesaian.
              </div> -->
<div class="box box-info collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title">Filter Tgl Target NCP</h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>	
    </div>

  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
    <div class="box-body">
    <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off" required/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off" required/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
	  <div class="form-group">
		    <div class="col-sm-2">
			<select class="form-control select2" name="dept" id="dept">
				<option value="">Pilih</option>
				<option value="MKT" <?php if($Dept=="MKT"){echo "SELECTED";}?>>MKT</option>
				<option value="FIN" <?php if($Dept=="FIN"){echo "SELECTED";}?>>FIN</option>
				<option value="DYE" <?php if($Dept=="DYE"){echo "SELECTED";}?>>DYE</option>
				<option value="KNT" <?php if($Dept=="KNT"){echo "SELECTED";}?>>KNT</option>
				<option value="LAB" <?php if($Dept=="LAB"){echo "SELECTED";}?>>LAB</option>
				<option value="PPC" <?php if($Dept=="PPC"){echo "SELECTED";}?>>PPC</option>
				<option value="QCF" <?php if($Dept=="QCF"){echo "SELECTED";}?>>QCF</option>
				<option value="RMP" <?php if($Dept=="RMP"){echo "SELECTED";}?>>RMP</option>
				<option value="KNK" <?php if($Dept=="KNK"){echo "SELECTED";}?>>KNK</option>
				<option value="GKG" <?php if($Dept=="GKG"){echo "SELECTED";}?>>GKG</option>
				<option value="GKJ" <?php if($Dept=="GKJ"){echo "SELECTED";}?>>GKJ</option>
        <option value="GAS" <?php if($Dept=="GAS"){echo "SELECTED";}?>>GAS</option>
				<option value="BRS" <?php if($Dept=="BRS"){echo "SELECTED";}?>>BRS</option>
				<option value="PRT" <?php if($Dept=="PRT"){echo "SELECTED";}?>>PRT</option>
				<option value="TAS" <?php if($Dept=="TAS"){echo "SELECTED";}?>>TAS</option>
				<option value="YND" <?php if($Dept=="YND"){echo "SELECTED";}?>>YND</option>
				<option value="PRO" <?php if($Dept=="PRO"){echo "SELECTED";}?>>PRO</option>
			</select>	
		  </div>
		  <!-- <div class="col-sm-2">
         <input name="no_ncp" type="text" class="form-control" id="no_ncp" placeholder="No NCP" value="<?php echo $NCP; ?>" />
		</div> -->
	    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    <button type="submit" class="btn btn-success pull-right" name="cari" ><i class="fa fa-search"></i> Cari Data</button>
    </div>
    <!-- /.box-footer -->

</div>
</form>
	</div>	
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Laporan Pencapaian NCP</h3>
		<a href="pages/cetak/lap_pencapaian_excel.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&dept=<?php echo $Dept; ?>" class="btn btn-danger pull-right" target="_blank"><i class="fa fa-file-excel-o"> </i> Cetak</a>  
    <a href="pages/cetak/lap_pencapaian_bs_excel.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&dept=<?php echo $Dept; ?>" class="btn btn-success pull-right" target="_blank"><i class="fa fa-file-excel-o"> </i> Excel</a>  
	  </div>
      <div class="box-body">
      <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
        <thead class="bg-purple">
          <tr>
            <th width="2%"><div align="center">No</div></th>
            <th width="4%"><div align="center">Nokk</div></th>
            <th width="5%"><div align="center">Lama Proses</div></th>
            <th width="8%"><div align="center">Status</div></th>
            <th width="8%"><div align="center">Ket Status</div></th>
            <th width="8%"><div align="center">Langganan</div></th>
			      <th width="4%"><div align="center">Buyer</div></th>  
            <th width="2%"><div align="center">PO</div></th>
            <th width="5%"><div align="center">Order</div></th>
            <th width="4%"><div align="center">Tgl Delivery</div></th>
            <th width="4%"><div align="center">Tgl Buat</div></th>
            <th width="5%"><div align="center">Tgl Terima</div></th>
            <th width="5%"><div align="center">Tgl Target</div></th>
            <th width="9%"><div align="center">Tgl Selesai</div></th>
            <th width="15%"><div align="center">Jenis_Kain</div></th>
            <th width="7%"><div align="center">Lebar &amp; Gramasi</div></th>
            <th width="3%"><div align="center">Lot</div></th>
            <th width="5%"><div align="center">Warna</div></th>
            <th width="3%"><div align="center">Rol</div></th>
            <th width="4%"><div align="center">Berat</div></th>
            <th width="4%"><div align="center">Dept</div></th>
            <th width="6%"><div align="center">Masalah</div></th>
            <th width="6%"><div align="center">Tempat Kain</div></th>
            <th width="3%"><div align="center">Ket</div></th>
            </tr>
        </thead>
        <tbody>
          <?php
	$no=1;	
	$pos=0;		
	if($Dept!=""){$where1=" AND dept='$Dept' ";}else{ $where1=" ";}	
	$qry1=mysqli_query($con,"SELECT *,DATEDIFF(tgl_rencana,DATE_FORMAT(now(),'%Y-%m-%d')) as lama, DATEDIFF(DATE_FORMAT(now(),'%Y-%m-%d'),tgl_rencana) as delay,DATEDIFF(tgl_selesai,tgl_rencana) as delay_ok 
	FROM tbl_ncp_qcf WHERE date_format(tgl_rencana,'%Y-%m-%d') between '$Awal' and '$Akhir' ".$where1." ORDER BY date_format(tgl_rencana,'%Y-%m-%d') ASC");
			while($row1=mysqli_fetch_array($qry1)){
		//$pos=posisi($row1[nokk]);		
		//if($pos>0){}
		//else{		
		$sql=mysqli_query($con,"SELECT COUNT(*) jml,tgl_terima,id FROM `tbl_qcf_ncp_tolak` WHERE id_qcf_ncp='$row1[id]' ORDER BY id DESC");
		$r1=mysqli_fetch_array($sql);

		 ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
			<td align="center"><font size="-1"><?php echo $no; ?></font></td>
			<td align="center"><font size="-2"><a href="#" class="posisi_kk" id="<?php echo $row1['nokk']; ?>"><?php echo $row1['nokk']; ?></a></font></td>
			<td align="center"><?php if($row1['status']=="OK" or $row1['status']=="Cancel"){if($row1['status']=="OK" and $row1['delay_ok']>0){echo "<span class='label label-danger'>Delay ".$row1['delay_ok']." Hari</span>";}elseif($row1['status']=="Cancel"){}else{echo "<span class='label label-info'>OnTime</span>";} }else{ if($row1['delay']>0){echo "<span class='label label-danger'>Delay ".$row1['delay']." Hari</span>";}else if($row1['delay']<=0 and $row1['delay']!=""){echo "<span class='label label-success'>".$row1['lama']." Hari Lagi</span>";}else {echo "<span class='label bg-fuchsia'>NCP belum-diterima</span>";}}?>
			  </td>
			<td align="center"><span class="label <?php if($row1['status']=="OK"){echo "label-success";}else{echo "label-warning";} ?> "><?php echo $row1['status'];?></span></td>
			<td align="center"><?php if($row1['tgl_rencana']!="" and $row1['penyelesaian']=="" and $row1['status']=="Belum OK"){ echo"<span class='label label-primary'>Sudah diterima ".$row1['dept']."</span>";}else if($row1['tgl_rencana']!="" and $row1['penyelesaian']!="" and $row1['status']=="Belum OK"){ echo"<span class='label label-danger'>Tunggu OK dari QCF</span>";}else{echo"<span class='label label-primary'>Sudah OK dari QCF</span>";}?></td>
            <td><font size="-2"><?php echo $row1['langganan'];?></font></td>
			<td><font size="-2"><?php echo $row1['buyer'];?></font></td>  
            <td align="left"><font size="-2"><?php echo $row1['po'];?></font></td>
			<td align="center"><font size="-1"><?php echo $row1['no_order'];?></font><br><span class="label label-danger"><?php echo $row1['no_ncp'];?></span><?php if($r1['tgl_terima']=="" and $r1['jml']>0){ ?><a href="#" class="btn terima_ncp_lama" id="<?php echo $r1['id']; ?>"><span class="label label-success">NCP Lama</span></a><?php } ?></td>
			<td align="center"><font size="-2"><?php echo $row1['tgl_delivery'];?></font></td>
			<td align="center"><font size="-2"><?php echo $row1['tgl_buat'];?></font></td>
			<td align="center"><font size="-2"><?php echo $row1['tgl_terima'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['tgl_rencana'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['tgl_selesai'];?></font></td>
            <td><font size="-2"><?php echo $row1['jenis_kain'];?></font></td>
            <td align="center"><font size="-1"><?php echo $row1['lebar']."x".$row1['gramasi'];?></font></td>
            <td align="center"><font size="-1"><?php echo $row1['lot'];?></font></td>
            <td align="center"><font size="-2"><?php echo $row1['warna'];?></font></td>
            <td align="right"><font size="-1"><?php echo $row1['rol'];?></font></td>
            <td align="right"><font size="-1"><?php echo $row1['berat'];?></font></td>
            <td align="center"><font size="-1"><?php echo $row1['dept'];?></font></td>
            <td><font size="-1"><?php echo $row1['masalah'];?></font></td>
            <td><font size="-1"><?php echo $row1['tempat'];?></font></td>
            <td><font size="-1"><?php echo $row1['ket'];?></font></td>
            </tr>
          <?php	//} 
				$no++;  } ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div id="StsEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="PosisiKK" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>		
<div id="SelesaiEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="NcpLama" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="NcpLamaTerima" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});

	</script>
</body>
</html>