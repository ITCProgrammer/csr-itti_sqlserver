<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Surat Jalan</title>
</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Nosj	= isset($_POST['sj']) ? $_POST['sj'] : '';
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan Surat Jalan</h3>
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
            <input name="awal" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-2">
            <input name="sj" type="text" class="form-control pull-right" id="sj" placeholder="No SJ" value="<?php echo $Nosj;  ?>" autocomplete="off"/>
          </div>
        <!-- /.input group -->
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2">
        <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
      </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
            <h3 class="box-title">Data Laporan Surat Jalan</h3><br>
            <?php if($_POST['awal']!="") { ?><b>Periode Kirim: <?php echo $_POST['awal']." to ".$_POST['akhir']; ?></b>
            <?php } ?>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example1" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th><div align="center">No</div></th>
              <th><div align="center">No Surat Jalan</div></th>
              <th><div align="center">Tgl Kirim</div></th>
              <th><div align="center">Tgl Buat</div></th>
              <th><div align="center">Aksi</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($Nosj!=""){$sj=" `no_sj` LIKE '%$Nosj%' "; }else{$sj=" ";}
            if($Awal!=""){ $Where=" DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ";}else{$Where=" ";}
            if($Awal!=""){
              $qry1=mysqli_query($con,"SELECT no_sj,id,tgl_update,tgl_buat,ket FROM packing_list WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' GROUP BY no_sj,tgl_update ORDER BY id DESC");
            }else if($Nosj!=""){
              $qry1=mysqli_query($con,"SELECT no_sj,id,tgl_update,tgl_buat,ket FROM packing_list WHERE `no_sj` LIKE '%$Nosj%' GROUP BY no_sj,tgl_update ORDER BY id DESC");
            }else if($Awal!="" and $Nosj!=""){
              $qry1=mysqli_query($con,"SELECT no_sj,id,tgl_update,tgl_buat,ket FROM packing_list WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND `no_sj` LIKE '%$Nosj%' GROUP BY no_sj,tgl_update ORDER BY id DESC");
            }else{
              $qry1=mysqli_query($con,"SELECT no_sj,id,tgl_update,tgl_buat,ket FROM packing_list WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND `no_sj` LIKE '$Nosj' GROUP BY no_sj,tgl_update ORDER BY id DESC");
            }
            while($row1=mysqli_fetch_array($qry1)){
              ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><?php echo $row1['no_sj']; ?></td>
            <td align="center"><?php echo date("Y-m-d", strtotime($row1['tgl_update']));?></td>
            <td align="center"><?php echo date("Y-m-d", strtotime($row1['tgl_buat']));?></td>
            <td align="center"><?php if($row1['ket']=="KAIN"){?><a href="pages/cetak/cetak_surat_jalan.php?no_sj=<?php echo $row1['no_sj']; ?>&tgl_kirim=<?php echo $row1['tgl_update'];?>" target="_blank" >Cetak</a>
            <?php }else if($row1['ket']=="KAIN-EXPORT"){?><a href="pages/cetak/cetak_surat_jalan_export.php?no_sj=<?php echo $row1['no_sj']; ?>&tgl_kirim=<?php echo $row1['tgl_update'];?>" target="_blank" >Cetak</a> 
	        <?php }else if($row1['ket']=="KRAH"){?> <a href="pages/cetak/cetak_surat_jalan_krah.php?no_sj=<?php echo $row1['no_sj']; ?>&tgl_kirim=<?php echo $row1['tgl_update'];?>" target="_blank" >Cetak</a><?php } ?></td>
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
<div id="CWarnaFinEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
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
