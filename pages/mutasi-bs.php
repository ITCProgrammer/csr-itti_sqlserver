<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="180">	
<title>Mutasi BS</title>
</head>

<body>
<?php
   $data=mysqli_query($con,"
   select
	m.*,
	sum(mb.rol) as rol,
	sum(mb.qty) as qty
from
	mutasi_bs_krah m
left join mutasi_bs_krah_detail mb on
	mb.id_mutasi = m.id
group by
	m.no_mutasi
order by
	m.tgl_buat desc
   ");
	$no=1;
	$n=1;
	$c=0;
	$tglNow = date("Ymd");
	 ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
<div class="box-header">
  <a href="AddMutasiBS" class="btn btn-success <?php if($_SESSION['akses']=="biasa" or $_SESSION['lvl_id']!="PACKING"){ echo "disabled";} ?>"><i class="fa fa-plus-circle"></i> Tambah</a>
  <!--	
  <a href="?p=Form-Schedule-Manual" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Tambah Manual</a>-->
  <div class="btn-group pull-right">	
  <!-- <a href="pages/cetak/cetak_schedule_excel.php?tgl=<?php echo $tglNow; ?>" class="btn btn-info" target="_blank"><i class="fa fa-file-excel-o"></i> </a>	 -->
  <!-- <a href="pages/cetak/cetak_schedule.php" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> </a> -->
  </div>	  
  <!--<a href="#" data-toggle="modal" data-target="#PrintHalaman" class="btn btn-danger pull-right"><i class="fa fa-print"></i> Cetak</a>-->	
      <div class="box-body">
<table id="example1" class="table table-bordered table-hover table-striped nowrap" width="100%">
          <thead class="bg-blue">
            <tr>
              <th width="115"><div align="center">Action</div></th>
              <th width="162"><div align="center">No Mutasi</div></th>
              <th width="118"><div align="center">Jenis Limbah</div></th>
              <th width="118"><div align="center">Dept</div></th>
              <th width="122"><div align="center">Tgl Buat</div></th>
              <th width="86"><div align="center">Jam Penyerahan</div></th>
              <th width="38"><div align="center">Diserahkan</div></th>
              <th width="38"><div align="center">Diterima</div></th>
              <th width="46"><div align="center">Rol</div></th>
              <th width="48"><div align="center">Kg</div></th>
            </tr>
          </thead>
          <tbody>
            <?php
	  $col=0;
  while($rowd=mysqli_fetch_array($data)){
      date_default_timezone_set('Asia/Jakarta');
      $tgltarget = new DateTime($rowd['target']);
      $now=new DateTime();
      $target = $now->diff($tgltarget);
      $delay = $tgltarget->diff($now);
			$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';		 ?>
			
            <tr bgcolor="<?php echo $bgcolor; ?>">
              <td align="center"><div class="btn-group">
                <a href="MutasiBSDetail-<?php echo $rowd['id'] ?>" class="btn btn-xs btn-warning <?php if($_SESSION['akses']=="biasa" or $rowd['status']=="sedang jalan" or $_SESSION['lvl_id']!="PACKING"){echo "disabled"; } ?>" target="_blank"><i class="fa fa-plus"></i></a>
                <a href="#" onclick="confirm_del('HapusMutasiBSKrah-<?php echo $rowd['id'] ?>');" class="btn btn-xs btn-danger <?php if($_SESSION['akses']=="biasa" or $rowd['status']=="sedang jalan" or $_SESSION['lvl_id']!="PACKING"){echo "disabled"; } ?>"><i class="fa fa-trash"></i></a>
                </div>
              </td>
              <td align="center"><?php echo $rowd['no_mutasi'];?></td>
              <td align="center"><a data-pk="<?php echo $rowd['id'] ?>" data-value="<?php echo $rowd['jns_limbah'] ?>" class="jns_limbah" href="javascipt:void(0)"><?php echo $rowd['jns_limbah'] ?></a></td>
              <td align="center"><?php echo $rowd['dept'];?></td>
              <td align="center"><?php echo $rowd['tgl_buat'];?></td>
              <td align="center"><?php echo $rowd['jam_penyerahan'];?></td>
              <td align="center"><a data-pk="<?php echo $rowd['id'] ?>" data-value="<?php echo $rowd['serah'] ?>" class="diserah" href="javascipt:void(0)"><?php echo $rowd['serah'] ?></a></td>
              <td align="center"><a data-pk="<?php echo $rowd['id'] ?>" data-value="<?php echo $rowd['terima'] ?>" class="diterima" href="javascipt:void(0)"><?php echo $rowd['terima'] ?></a></td>
              <td align="center"><?php echo $rowd['rol'];?></td>
              <td align="right"><?php echo $rowd['qty'];?></td>
            </tr>
            <?php
						$no++;
  } ?>
</table>
		</div>
	  </div>		
	</div>
</div>
	
<!-- Modal Popup untuk delete-->
	<div class="modal fade" id="delMutasiBSKrah" tabindex="-1">
	  <div class="modal-dialog modal-sm">
		<div class="modal-content" style="margin-top:100px;">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
		  </div>

		  <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
			<a href="#" class="btn btn-danger" id="del_link">Delete</a>
			<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<div id="ScheduleKrahEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	</div>
	<div id="KrahMulaiEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	</div>
	<div id="KrahBerhentiEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	</div>
</body>
</html>
<script type="text/javascript">
              function confirm_del(delete_url) {
                $('#delMutasiBSKrah').modal('show', {
                  backdrop: 'static'
                });
                document.getElementById('del_link').setAttribute('href', delete_url);
              }

            </script>