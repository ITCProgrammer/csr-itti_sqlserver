<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Schedule</title>
</head>

<body>
<?php
   $data=mysqli_query($con,"SELECT
   	id,
	no_mesin,
	no_sch,
	buyer,
	langganan,
	no_order,
	nokk,
	jenis_kain,
	warna,
	no_warna,
	lot,
	sum(rol) as rol,
	sum(bruto) as bruto,
	proses,
	catatan,
	ket_status,
	tgl_delivery
FROM
	tbl_schedule 
WHERE
	STATUS = 'selesai' 
GROUP BY
	no_mesin,
	no_urut 
ORDER BY
	no_mesin ASC,no_urut ASC");
	$no=1;
	$n=1;
	$c=0;
	 ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
<div class="box-header"> 
 
      <div class="box-body">
<table id="example1" class="table table-bordered table-hover table-striped" width="100%">
          <thead class="bg-blue">
            <tr>
              <th width="45"><div align="center">Mesin</div></th>
              <th width="24"><div align="center">No. Urut</div></th>
			  <th width="162"><div align="center">Pelanggan</div></th>
              <th width="118"><div align="center">No. Order</div></th>
              <th width="122"><div align="center">Jenis Kain</div></th>
              <th width="86"><div align="center">Warna</div></th>
              <th width="83"><div align="center">No Warna</div></th>
              <th width="38"><div align="center">Lot</div></th>
              <th width="79"><div align="center">Keterangan</div></th>
              <th width="46"><div align="center">Rol</div></th>
              <th width="48"><div align="center">Kg</div></th>
              <th width="59"><div align="center">Proses</div></th>
              <th><div align="center">Delivery</div></th>
            </tr>
          </thead>
          <tbody>
            <?php
	  $col=0;
  while($rowd=mysqli_fetch_array($data)){
			$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
	  	$qCek=mysqli_query($con,"SELECT `status` FROM tbl_inspection WHERE id_schedule='$rowd[id]' LIMIT 1");
	  	$rCEk=mysqli_fetch_array($qCek);
		 ?>
			<div class="modal fade modal-super-scaled" id="PrintHalaman<?php echo $rowd['id']; ?>">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cetak Identifikasi Produk</h4>
              </div>
              <div class="modal-body" align="center">				
				<a href="pages/cetak/iden_produk1.php?idkk=<?php echo $rowd['id']; ?>" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Gerobak ke-1</a>
				<a href="pages/cetak/iden_produk2.php?idkk=<?php echo $rowd['id']; ?>" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Gerobak ke-2</a><br><br>
				<a href="pages/cetak/iden_produk3.php?idkk=<?php echo $rowd['id']; ?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Gerobak ke-3</a>
				<a href="pages/cetak/iden_produk4.php?idkk=<?php echo $rowd['id']; ?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Gerobak ke-4</a><br><br>
				<a href="pages/cetak/iden_produk5.php?idkk=<?php echo $rowd['id']; ?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Gerobak ke-5</a>
				<a href="pages/cetak/iden_produk6.php?idkk=<?php echo $rowd['id']; ?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Gerobak ke-6</a>  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>  
            <tr bgcolor="<?php echo $bgcolor; ?>">
              <td align="center"><?php echo $rowd['no_mesin'];?></td>
              <td align="center"><?php echo $rowd['no_sch'];?></td>
              <td><?php echo $rowd['langganan']."/".$rowd['buyer'];?></td>
              <td align="center"><?php echo $rowd['no_order'];?></td>
              <td><?php echo $rowd['jenis_kain'];?></td>
              <td align="center"><?php echo $rowd['warna'];?></td>
              <td align="center"><?php echo $rowd['no_warna'];?></td>
              <td align="center"><a href="#"><?php echo $rowd['lot'];?></a></td>
              <td><?php echo $rowd['ket_status'];?><br />
                <i><?php echo $rowd['nokk'];?></i><br />
                <i style="color:red;"><strong><?php echo $rowd['catatan'];?></strong></i></td>
              <td align="center"><?php echo $rowd['rol'].$rowd['kk'];?></td>
              <td align="center"><?php echo $rowd['bruto'];?></td>
              <td><?php echo $rowd['proses'];?></td>
              <td align="center"><?php echo $rowd['tgl_delivery'];?></td>
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
	<div class="modal fade" id="delSchedule" tabindex="-1">
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
	
	<div id="ScheduleEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	</div>
	<div id="MesinMulaiEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	</div>
	<div id="MesinBerhentiEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	</div>
	<div id="EditStatusMesin" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	</div>
	<div id="GerobakTambah" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	</div>	
	<div id="DetailKartu" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
	</div>	
</body>
</html>
<script type="text/javascript">
              function confirm_del(delete_url) {
                $('#delSchedule').modal('show', {
                  backdrop: 'static'
                });
                document.getElementById('del_link').setAttribute('href', delete_url);
              }

            </script>