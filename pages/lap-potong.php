<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Potong</title>
</head>
<body>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
            <h3 class="box-title">Data Laporan Potong</h3><br>
            <!--<div class="pull-right">
                <a href="pages/cetak/cetak-reports-cocok-warna.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak</a> 
                <a href="pages/cetak/lap-cocok-warna-excel.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak Excel</a> 
            </div>-->
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th><div align="center">No</div></th>
              <th><div align="center">Sudah Potong</div></th>
              <th><div align="center">No KK</div></th>
              <th><div align="center">Langganan</div></th>
              <th><div align="center">Order</div></th>
              <th><div align="center">PO</div></th>
              <th><div align="center">Item</div></th>
              <th><div align="center">Jenis Kain</div></th>
              <th><div align="center">Lebar</div></th>
              <th><div align="center">Gramasi</div></th>
              <th><div align="center">Lot</div></th>
              <th><div align="center">Warna</div></th>
              <th><div align="center">Comment Internal</div></th>
              <th><div align="center">Aksi</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            $qry1=mysqli_query($con,"SELECT a.*, b.id as id_b, b.cmt_internal FROM tbl_potong a
            LEFT JOIN tbl_firstlot b ON a.nokk=b.nokk
            WHERE a.sts_potong='Y' ORDER BY id ASC");
                while($row1=mysqli_fetch_array($qry1)){
              ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><div class="btn-group">
            <a href="#" class="btn btn-success btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>" onclick="confirm_potong('./HapusDataPotong-<?php echo $row1['id'] ?>');"><i class="fa fa-check-circle" data-toggle="tooltip" data-placement="top" title="Sudah Potong?"></i> </a>
            </td>
            <td align="center"><?php echo $row1['nokk'];?></td>
            <td align="center"><?php echo $row1['langganan'];?></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td align="center"><?php echo $row1['po'];?></td>
            <td align="center"><?php echo $row1['no_item'];?></td>
            <td align="left"><?php echo $row1['jenis_kain'];?></td>
            <td align="center"><?php echo $row1['lebar'];?></td>
            <td align="center"><?php echo $row1['gramasi'];?></td>
            <td align="center"><?php echo $row1['lot'];?></td>
            <td align="left"><b title="<?php echo htmlentities($row1['warna'], ENT_QUOTES); ?>"><?php echo htmlentities(substr($row1['warna'], 0, 20) . "...", ENT_QUOTES); ?></b></td>
            <td align="center"><a data-pk="<?php echo $row1['id_b'] ?>" data-value="<?php echo $row1['cmt_internal'] ?>" class="cmtinternal" href="javascipt:void(0)"><?php echo $row1['cmt_internal'] ?></a></td>
            <td align="center"><a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa' AND $_SESSION['lvl_id']!='NCP'){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataPotong-<?php echo $row1['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a></td>
            </tr>
          <?php	$no++;  } ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_potong" tabindex="-1" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Apakah Data Sudah Potong ?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="potong_link">Ya</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_del" tabindex="-1" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete data ?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>	
<div id="UpdateSpectro" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
<script type="text/javascript">
    function confirm_potong(potong_url)
    {
      $('#modal_potong').modal('show', {backdrop: 'static'});
      document.getElementById('potong_link').setAttribute('href' , potong_url);
    }
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
