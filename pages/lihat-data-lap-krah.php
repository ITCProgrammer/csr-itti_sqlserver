<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan KRAH</title>
</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$GShift	= isset($_POST['gshift']) ? $_POST['gshift'] : '';	
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan KRAH</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
    <div class="box-body">
    <div class="form-group">
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
	  <div class="form-group">
            <div class="col-sm-2">
                <select name="gshift" class="form-control select2"> 
                	<option value="ALL" <?php if($GShift=="ALL"){ echo "SELECTED";}?>>ALL</option>
                	<option value="1" <?php if($GShift=="1"){ echo "SELECTED";}?>>1</option>
                	<option value="2" <?php if($GShift=="2"){ echo "SELECTED";}?>>2</option>
					<option value="3" <?php if($GShift=="3"){ echo "SELECTED";}?>>3</option>
                </select>
            </div>			 
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2">
        <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
      </div>
      <div class="pull-right">
        <input type="button" class="btn btn-block btn-social btn-linkedin btn-sm" <?php if($_SESSION['lvl_id']=="AFTERSALES"){echo "disabled";}?> name="lihat" value="Kembali" onClick="window.location.href='LapKrah'">	   
      </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
            <h3 class="box-title">Data Lap KRAH</h3><br>
            <?php if($_POST['awal']!="") { ?><b>Periode: <?php echo $_POST['awal']." to ".$_POST['akhir']; ?></b>
            <?php } ?><br>
            <?php if($_POST['gshift']!="") { ?><b>Shift: <?php echo $_POST['gshift']; ?></b>
            <?php } ?>
            <div class="pull-right">
                <a href="pages/cetak/cetak-reports-krah.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak</a> 
                <a href="pages/cetak/lap-krah-excel.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak Excel</a> 
            </div>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
                <th rowspan="2"><div align="center">No</div></th>
                <th rowspan="2"><div align="center">Aksi</div></th>
                <th rowspan="2"><div align="center">No KK</div></th>
                <th rowspan="2"><div align="center">Pelanggan</div></th>
                <th rowspan="2"><div align="center">Order</div></th>
                <th rowspan="2"><div align="center">Jenis Kain</div></th>
                <th rowspan="2"><div align="center">Warna</div></th>
                <th rowspan="2"><div align="center">Lot</div></th>
                <th colspan="3"><div align="center">Bruto</div></th>
                <th colspan="3"><div align="center">Netto</div></th>
                <th colspan="3"><div align="center">Sisa</div></th>
                <th rowspan="2"><div align="center">Total BS</div></th>
                <th colspan="2"><div align="center">BS(%)</div></th>
                <th rowspan="2"><div align="center">No Mutasi</div></th>
                <th rowspan="2"><div align="center">Proses</div></th>
                <th rowspan="2"><div align="center">Status</div></th>
                <th rowspan="2"><div align="center">Catatan</div></th>
            </tr>
            <tr>
                <th><strong>Rol</strong></th>
                <th><strong>PCS</strong></th>
                <th><strong>KGs</strong></th>
                <th><strong>Rol</strong></th>
                <th><strong>PCS</strong></th>
                <th><strong>KGs</strong></th>
                <th><strong>Rol</strong></th>
                <th><strong>PCS</strong></th>
                <th><strong>KGs</strong></th>
                <th>Bruto</th>
                <th>Netto</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($GShift=="ALL"){$shft=" ";}else{ $shft=" AND `shift`='$GShift' ";}
            if($Awal!=""){
              $qry1=mysqli_query($con,"SELECT * FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND `dept`='KRAH' $shft ORDER BY id ASC");
            }else{
              $qry1=mysqli_query($con,"SELECT * FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND `dept`='KRAH' $shft ORDER BY id ASC");
            }
                while($row1=mysqli_fetch_array($qry1)){
              ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><div class="btn-group">
            <a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa' AND ($_SESSION['lvl_id']!='PACKING' OR $_SESSION['lvl_id']!='NCP')){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataLapKrah-<?php echo $row1['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a>
            </div></td>
            <td align="center"><?php echo $row1['nokk'];?></td>
            <td><?php echo $row1['pelanggan'];?></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td><?php echo substr($row1['jenis_kain'],0,15)."...";?></td>
            <td align="left"><?php echo substr($row1['warna'],0,10)."...";?></td>
            <td align="center"><?php echo $row1['lot'];?></td>
            <td align="center"><?php echo $row1['jml_roll'];?></td>
            <td align="center"><?php echo $row1['pcs_bruto'];?></td>
            <td align="center"><?php echo $row1['bruto'];?></td>
            <td align="center"><?php echo $row1['jml_netto'];?></td>
            <td align="center"><?php echo number_format($row1['panjang'],"0");?></td>
            <td align="center"><?php echo $row1['netto'];?></td>
            <td align="center"><?php echo $row1['rol_sisa'];?></td>
            <td align="center"><?php echo $row1['jml_sisa'];?></td>
            <td align="center"><?php echo $row1['sisa'];?></td>
            <td align="center"><?php echo $row1['tot_bs'];?></td>
            <td align="center"><?php if($row['tot_bs']!=""){echo round(($row['tot_bs']/$row['pcs_bruto'])*100,'2');}else{echo "0.00";}?></td>
            <td align="center"><?php if($row['tot_bs']!=""){echo round((($row['tot_bs']/$row['pcs_bruto'])/$row['netto'])*100,'2');}else{echo "0.00";}?></td>
            <td align="center"><?php echo $row1['no_mutasi'];?></td>
            <td align="center"><?php echo $row1['proses'];?></td>
            <td align="center"><?php echo $row1['status'];?></td>
            <td align="left"><?php echo $row1['catatan'];?></td>
            </tr>
          <?php	$no++;  } ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_del" tabindex="-1" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete all data ?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    function confirm_delete(delete_url)
    {
      $('#modal_del').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>	
<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});

	</script>
</body>
</html>
