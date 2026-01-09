<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data First Lot Expired</title>
</head>
<body>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
            <h3 class="box-title">Data First Lot Expired</h3><br>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th><div align="center">No</div></th>
              <th><div align="center">No KK</div></th>
              <th><div align="center">Buyer</div></th>
              <th><div align="center">Order</div></th>
              <th><div align="center">PO</div></th>
              <th><div align="center">Hanger</div></th>
              <th><div align="center">Item</div></th>
              <th><div align="center">No Warna</div></th>
              <th><div align="center">Warna</div></th>
              <th><div align="center">Lot</div></th>
              <th><div align="center">Lebar</div></th>
              <th><div align="center">Gramasi</div></th>
              <th><div align="center">Season</div></th>
              <th><div align="center">Validity/Expired</div></th>
              <th><div align="center">Comment Internal</div></th>
              <th><div align="center">Tgl Approve Buyer</div></th>
              <th><div align="center">Tgl Kirim</div></th>
              <th><div align="center">Tgl Expired</div></th>
              <th><div align="center">Comment Buyer</div></th>
              <th><div align="center">Spectro</div></th>
              <th><div align="center">Note</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            $today=date("Y-m-d");
              $qry1=mysqli_query($con,"SELECT * FROM tbl_firstlot WHERE tgl_expired < '$today' AND tgl_expired!='0000-00-00' ORDER BY id ASC");
                while($row1=mysqli_fetch_array($qry1)){
              ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><?php echo $row1['nokk'];?></td>
            <td align="center"><?php echo $row1['langganan'];?></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td align="center"><?php echo $row1['po'];?></td>
            <td align="center"><?php echo $row1['no_hanger'];?></td>
            <td align="center"><?php echo $row1['no_item'];?></td>
            <td align="left"><?php echo $row1['no_warna'];?></td>
            <td align="left"><b title="<?php echo htmlentities($row1['warna'], ENT_QUOTES); ?>"><?php echo htmlentities(substr($row1['warna'], 0, 20) . "...", ENT_QUOTES); ?></b></td>
            <td align="center"><?php echo $row1['lot'];?></td>
            <td align="center"><?php echo $row1['lebar'];?></td>
            <td align="center"><?php echo $row1['gramasi'];?></td>
            <td align="center"><?php echo $row1['season'];?></td>
            <td align="center"><?php echo $row1['validity'];?></td>
            <td align="center"><?php echo $row1['cmt_internal'];?></td>
            <td align="center"><?php echo $row1['tgl_approve'];?></td>
            <td align="center"><?php echo $row1['tgl_kirim'];?></td>
            <td align="center"><?php echo $row1['tgl_expired'];?></td>
            <td align="center"><?php echo $row1['cmt_buyer'];?></td>
            <td align="center"><?php echo $row1['spectro'];?></td>
            <td align="center"><?php echo $row1['ket'];?></td>
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
<div id="UpdateSpectro" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
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
