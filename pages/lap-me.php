<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Harian Produksi</title>
</head>
<body>
<?php
$AwalGK	= isset($_POST['awalgk']) ? $_POST['awalgk'] : '';
$AkhirGK	= isset($_POST['akhirgk']) ? $_POST['akhirgk'] : '';
$AwalRT	= isset($_POST['awalrt']) ? $_POST['awalrt'] : '';
$AkhirRT	= isset($_POST['akhirrt']) ? $_POST['akhirrt'] : '';
$Order	= isset($_POST['order']) ? $_POST['order'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';
$PO	= isset($_POST['po']) ? $_POST['po'] : '';	
$Status	= isset($_POST['status']) ? $_POST['status'] : '';	
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan ME</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
    <div class="box-body">
    <div class="form-group">
      <label for="gk" class="col-sm-2 control-label">Tanggal Ganti Kain</label>
      </div>
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="awalgk" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal Ganti Kain" value="<?php echo $AwalGK; ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhirgk" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir Ganti Kain" value="<?php echo $AkhirGK;  ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <label for="gk" class="col-sm-2 control-label">Tanggal Retur</label>
      </div>
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="awalrt" type="text" class="form-control pull-right" id="datepicker2" placeholder="Tanggal Awal Retur" value="<?php echo $AwalRT; ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhirrt" type="text" class="form-control pull-right" id="datepicker3" placeholder="Tanggal Akhir Retur" value="<?php echo $AkhirRT;  ?>" autocomplete="off"/>
          </div>
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
            <h3 class="box-title">Data Laporan ME</h3><br>
            <?php if($_POST['awalgk']!="") { ?><b>Periode Ganti Kain: <?php echo $_POST['awalgk']." to ".$_POST['akhirgk']; ?></b></br>
            <?php } ?>
            <?php if($_POST['awalrt']!="") { ?><b>Periode Retur: <?php echo $_POST['awalrt']." to ".$_POST['akhirrt']; ?></b>
            <?php } ?>
            <div class="pull-right">
                <a href="pages/cetak/cetak_return_gantikain.php?awalgk=<?php echo $_POST['awalgk']; ?>&akhirgk=<?php echo $_POST['akhirgk']; ?>&awalrt=<?php echo $_POST['awalrt']; ?>&akhirrt=<?php echo $_POST['akhirrt']; ?>" class="btn btn-success <?php if($_POST['awalgk']=="") { echo "disabled"; }?>" target="_blank">Cetak Laporan ME</a> 
            </div>
      </div>
      <div class="box-body">
        
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
