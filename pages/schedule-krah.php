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
<title>Schedule Krah</title>
</head>

<body>
<?php
   $data=mysqli_query($con,"SELECT
   	id,
	buyer,
	langganan,
	no_order,
	nokk,
  nodemand,
	jenis_kain,
	warna,
	lot,
  target,
	sum(rol) as rol,
	sum(bruto) as bruto,
  sum(pcs_bruto) as pcs_bruto,
	proses,
	catatan,
  `status`,
  TIMESTAMPDIFF(HOUR, tgl_update, now()) as diff
FROM
	tbl_schedule_krah 
WHERE
	NOT STATUS = 'selesai' 
GROUP BY
	id
ORDER BY no_urut ASC");
	$no=1;
	$n=1;
	$c=0;
	$tglNow = date("Ymd");
	 ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
<div class="box-header">
  <a href="FormScheduleKrah" class="btn btn-success <?php if($_SESSION['akses']=="biasa" or $_SESSION['lvl_id']!="PACKING"){ echo "disabled";} ?>"><i class="fa fa-plus-circle"></i> Tambah</a>
  <!--	
  <a href="?p=Form-Schedule-Manual" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Tambah Manual</a>-->
  <div class="btn-group pull-right">	
  <!-- <a href="pages/cetak/cetak_schedule_excel.php?tgl=<?php echo $tglNow; ?>" class="btn btn-info" target="_blank"><i class="fa fa-file-excel-o"></i> </a>	 -->
  <!-- <a href="pages/cetak/cetak_schedule.php" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> </a> -->
  </div>	  
  <!--<a href="#" data-toggle="modal" data-target="#PrintHalaman" class="btn btn-danger pull-right"><i class="fa fa-print"></i> Cetak</a>-->	
      <div class="box-body">
<table id="example1" class="table table-bordered table-hover table-striped" width="100%">
          <thead class="bg-blue">
            <tr>
              <th width="115"><div align="center">Action_</div></th>
              <th width="24"><div align="center">No.</div></th>
			        <th width="162"><div align="center">Pelanggan</div></th>
              <th width="118"><div align="center">No. Order</div></th>
              <th width="122"><div align="center">Jenis Kain</div></th>
              <th width="86"><div align="center">Warna</div></th>
              <th width="38"><div align="center">Lot</div></th>
              <th width="38"><div align="center">Order Legacy</div></th>
              <th width="38"><div align="center">Tgl Target</div></th>
              <th width="79"><div align="center">Keterangan</div></th>
              <th width="46"><div align="center">Rol</div></th>
              <th width="48"><div align="center">Kg</div></th>
              <th width="48"><div align="center">PCS</div></th>
              <th width="59"><div align="center">Proses</div></th>
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
			$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
      //$qLate=mysqli_query("SELECT TIMESTAMPDIFF(HOUR, '$rowd[tgl_update]', now()) as diff FROM tbl_schedule WHERE nokk='$rowd[nokk]' AND NOT STATUS = 'selesai'");
      //$rLate=mysqli_fetch_array($qLate);
      //$tglupdate = new DateTime($rowd['tgl_update']);
      //$now=new DateTime();
      //$selisih = $tglupdate->diff($now);
      //$difference = ($selisih->days * 24)+$selisih->h;
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
				<a href="pages/cetak/iden_produk1.php?idkk=<?php echo $rowd['id']; ?>&nm=<?php echo $_SESSION['usrid']; ?>" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Gerobak ke-1</a>
				<a href="pages/cetak/iden_produk2.php?idkk=<?php echo $rowd['id']; ?>&nm=<?php echo $_SESSION['usrid']; ?>" class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Gerobak ke-2</a><br><br>
				<a href="pages/cetak/iden_produk3.php?idkk=<?php echo $rowd['id']; ?>&nm=<?php echo $_SESSION['usrid']; ?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Gerobak ke-3</a>
				<a href="pages/cetak/iden_produk4.php?idkk=<?php echo $rowd['id']; ?>&nm=<?php echo $_SESSION['usrid']; ?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Gerobak ke-4</a><br><br>
				<a href="pages/cetak/iden_produk5.php?idkk=<?php echo $rowd['id']; ?>&nm=<?php echo $_SESSION['usrid']; ?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Gerobak ke-5</a>
				<a href="pages/cetak/iden_produk6.php?idkk=<?php echo $rowd['id']; ?>&nm=<?php echo $_SESSION['usrid']; ?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Gerobak ke-6</a>  
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
              <td align="center"><div class="btn-group">
                <a href="#" id='<?php echo $rowd['id']; ?>' class="btn btn-xs btn-info schedule_krah_edit <?php if($_SESSION['akses']=="biasa" or $rowd['status']=="sedang jalan" or $_SESSION['lvl_id']!="PACKING"){echo "disabled"; } ?>"><i class="fa fa-edit"></i></a>
                <a href="#" onclick="confirm_del('HapusSchKrah-<?php echo $rowd['id'] ?>');" class="btn btn-xs btn-danger <?php if($_SESSION['akses']=="biasa" or $rowd['status']=="sedang jalan" or $_SESSION['lvl_id']!="PACKING"){echo "disabled"; } ?>"><i class="fa fa-trash"></i></a>
                </div>
              </td>
              <td align="center"><?php echo $no;?><br />
                <a href="#" id='<?php echo $rowd['id']; ?>' class="btn btn-xs <?php if($_SESSION['akses']=="biasa" or $_SESSION['akses']=="superadmin"){echo "enabled"; }else{ echo " disabled "; } if($rowd['status']=="sedang jalan"){ echo " btn-danger krah_berhenti_edit "; }else{ echo " btn-warning krah_mulai_edit "; } ?>"><?php if($rowd['status']=="sedang jalan"){ echo "stop"; }else{ echo "mulai";} ?></a><br />
                <?php if($tgltarget>$now){ ?>
                  <span class='badge bg-blue'><?php echo $target->d+1; echo " Hari lagi";?></span>
                  <?php }elseif($delay->d>0){ ?>
                  <span class='badge bg-red blink_me'><?php echo "Delay "; echo $delay->d; echo " Hari";?></span> 
                  <?php }elseif($delay->d==0){?>
                  <span class='badge bg-yellow blink_me'><?php echo "Hari ini Terakhir";?></span>
                  <?php } ?>
              </td>
              <td><?php echo $rowd['langganan']."/".$rowd['buyer'];?></td>
              <td align="center"><?php echo $rowd['no_order'];?></td>
              <td><?php echo $rowd['jenis_kain'];?></td>
              <td align="center"><?php echo $rowd['warna'];?></td>
              <td align="center"><?php echo $rowd['lot'];?></td>
              <td align="center"><?php echo $rowd['order_legacy'];?></td>
              <td align="center"><?php echo date("Y-m-d", strtotime($rowd['target']));?></td>
              <td align="center"><?php echo $rowd['catatan'];?></td>
              <td align="center"><?php echo $rowd['rol'];?></td>
              <td align="center"><?php echo $rowd['bruto'];?></td>
              <td align="center"><?php if($rowd['pcs_bruto']!=0){echo $rowd['pcs_bruto'];}else{}?></td>
              <td><?php echo $rowd['proses'];?></td>
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
	<div class="modal fade" id="delScheduleKrah" tabindex="-1">
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
                $('#delScheduleKrah').modal('show', {
                  backdrop: 'static'
                });
                document.getElementById('del_link').setAttribute('href', delete_url);
              }

            </script>