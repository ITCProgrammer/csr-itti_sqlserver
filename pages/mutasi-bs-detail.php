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
<title>Mutasi BS Detail</title>
</head>

<body>
<?php
   $data=mysqli_query($con,"SELECT md.*,m.no_mutasi,m.jns_limbah FROM mutasi_bs_krah_detail md
   INNER JOIN mutasi_bs_krah m ON md.id_mutasi=m.id 
   WHERE m.id='$_GET[idm]' 
   ORDER BY md.id ASC");
	$no=1;
	$n=1;
	$c=0;
	$tglNow = date("Ymd");
	 ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
<div class="box-header">
  <a href="AddMutasiBSDetail-<?php echo $_GET['idm']; ?>" class="btn btn-success <?php if($_SESSION['akses']=="biasa" or $_SESSION['lvl_id']!="PACKING"){ echo "disabled";} ?>"><i class="fa fa-plus-circle"></i> Tambah Detail</a>
  <!--	
  <a href="?p=Form-Schedule-Manual" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Tambah Manual</a>-->
  <div class="btn-group pull-right">	
  <a href="MutasiBSDetail-<?php echo $_GET['idm']; ?>" class="btn btn-info"><i class="fa fa-refresh"></i> Refesh</a>
  <a href="pages/cetak/cetak_mutasi_bs_detail.php?idm=<?php echo $_GET['idm']; ?>" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> </a>
  </div>	  
  <!--<a href="#" data-toggle="modal" data-target="#PrintHalaman" class="btn btn-danger pull-right"><i class="fa fa-print"></i> Cetak</a>--></div>	
      <div class="box-body">
<table id="example1" class="table table-bordered table-hover table-striped nowrap" width="100%">
          <thead class="bg-yellow">
            <tr>
			  <th width="79"><div align="center">No</div></th>
              <th width="256"><div align="center">Action</div></th>
              <th width="526"><div align="center">No Mutasi</div></th>
              <th width="260"><div align="center">Jenis Limbah</div></th>
              <th width="104"><div align="center">Rol</div></th>
              <th width="111"><div align="center">Kg</div></th>
            </tr>
          </thead>
          <tbody>
            <?php
	  $col=0;
			  $no=1;
  while($rowd=mysqli_fetch_array($data)){
      date_default_timezone_set('Asia/Jakarta');
      $tgltarget = new DateTime($rowd['target']);
      $now=new DateTime();
      $target = $now->diff($tgltarget);
      $delay = $tgltarget->diff($now);
			$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
      ?>			 
            <tr bgcolor="<?php echo $bgcolor; ?>">
              <td align="center"><?php echo $no; ?></td>
              <td align="center"><div class="btn-group">
                <a href="#" onclick="confirm_del('HapusMutasiBSKrahDetail-<?php echo $rowd['id'] ?>');" class="btn btn-xs btn-danger <?php if($_SESSION['akses']=="biasa" or $rowd['status']=="sedang jalan" or $_SESSION['lvl_id']!="PACKING"){echo "disabled"; } ?>"><i class="fa fa-trash"></i></a>
                </div>
              </td>
              <td align="center"><?php echo $rowd['no_mutasi'];?></td>
              <td align="center"><?php echo $rowd['jns_limbah'] ?></td>
              <td align="center"><?php echo $rowd['rol'] ?></td>
              <td align="right"><a data-pk="<?php echo $rowd['id'] ?>" data-value="<?php echo $rowd['qty'] ?>" class="kg_bs" href="javascipt:void(0)"><?php echo $rowd['qty'] ?></a></td>
            </tr>
            <?php
						$no++;
	  	$Trol+=$rowd['rol'];
	  	$Tqty+=$rowd['qty'];
  } ?>
	</tbody>
	<tfoot>
	<tr>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="right"><strong>Total</strong></td>
              <td align="center"><strong><?php echo $Trol; ?></strong></td>
              <td align="right"><strong><?php echo $Tqty; ?></strong></td>
            </tr>
	</tfoot>
</table>
		</div>
	  
	  <div class="box-footer">
		<a href="MutasiBS" class="btn btn-warning"><i class="fa fa-back"></i> Kembali</a>
	</div>	
	</div>
</div>
	
<!-- Modal Popup untuk delete-->
	<div class="modal fade" id="delMutasiBSKrahDetail" tabindex="-1">
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
	
</body>
</html>
<script type="text/javascript">
              function confirm_del(delete_url) {
                $('#delMutasiBSKrahDetail').modal('show', {
                  backdrop: 'static'
                });
                document.getElementById('del_link').setAttribute('href', delete_url);
              }

            </script>