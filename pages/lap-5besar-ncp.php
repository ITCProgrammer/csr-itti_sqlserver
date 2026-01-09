<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan 5 Besar NCP</title>
</head>
<body>
<?php
$Periode1Awal	= isset($_POST['awalp1']) ? $_POST['awalp1'] : '';
$Periode1Akhir	= isset($_POST['akhirp1']) ? $_POST['akhirp1'] : '';
$Periode2Awal	= isset($_POST['awalp2']) ? $_POST['awalp2'] : '';
$Periode2Akhir	= isset($_POST['akhirp2']) ? $_POST['akhirp2'] : '';
$ProDye	= isset($_POST['prodye']) ? $_POST['prodye'] : '';
$ProBrs	= isset($_POST['probrs']) ? $_POST['probrs'] : '';
$ProPrt	= isset($_POST['proprt']) ? $_POST['proprt'] : '';
$ProDye1	= isset($_POST['prodye1']) ? $_POST['prodye1'] : '';
$ProBrs1	= isset($_POST['probrs1']) ? $_POST['probrs1'] : '';
$ProPrt1	= isset($_POST['proprt1']) ? $_POST['proprt1'] : '';
$TotalKirim	= isset($_POST['total']) ? $_POST['total'] : '';	
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan 5 Besar NCP</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
    <div class="box-body">
    <div class="form-group">
      <label for="p1" class="col-sm-1 control-label">Periode I</label>
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="awalp1" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal Periode I" value="<?php echo $Periode1Awal; ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhirp1" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir Periode I" value="<?php echo $Periode1Akhir;  ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <label for="p2" class="col-sm-1 control-label">Periode II</label>
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="awalp2" type="text" class="form-control pull-right" id="datepicker2" placeholder="Tanggal Awal Periode II" value="<?php echo $Periode2Awal; ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhirp2" type="text" class="form-control pull-right" id="datepicker3" placeholder="Tanggal Akhir Periode II" value="<?php echo $Periode2Akhir;  ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> Total Produksi Dyeing Periode I</div>
              <input name="prodye" type="text" class="form-control" placeholder="0" value="<?php echo $ProDye; ?>"/>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> Total Produksi Dyeing Periode II</div>
              <input name="prodye1" type="text" class="form-control pull-right" placeholder="0" value="<?php echo $ProDye1; ?>" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> Total Produksi Brushing Periode I</div>
              <input name="probrs" type="text" class="form-control pull-right" placeholder="0" value="<?php echo $ProBrs; ?>" />
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> Total Produksi Brushing Periode II</div>
              <input name="probrs1" type="text" class="form-control pull-right" placeholder="0" value="<?php echo $ProBrs1; ?>"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> Total Produksi Printing Periode I</div>
              <input name="proprt" type="text" class="form-control pull-right" placeholder="0" value="<?php echo $ProPrt; ?>" />
          </div>
        </div>
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> Total Produksi Printing Periode II</div>
              <input name="proprt1" type="text" class="form-control pull-right" placeholder="0" value="<?php echo $ProPrt1; ?>"/>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2">
            <div class="input-group date">
              <div class="input-group-addon"> Total Kirim Perbulan</div>
                <input name="total" type="text" class="form-control pull-right" placeholder="0" value="<?php echo $TotalKirim; ?>"/>
            </div>
          </div>
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
            <h3 class="box-title">Data Laporan 5 Besar NCP</h3><br>
            <?php if($_POST['awalp1']!="") { ?><b>Periode I: <?php echo date("d F Y", strtotime($_POST['awalp1']))." - ".date("d F Y", strtotime($_POST['akhirp1'])); ?></b></br>
            <?php } ?>
            <?php if($_POST['awalp2']!="") { ?><b>Periode II: <?php echo date("d F Y", strtotime($_POST['awalp2']))." - ".date("d F Y", strtotime($_POST['akhirp2'])); ?></b>
            <?php } ?>
            <div class="pull-right">
                <a href="pages/cetak/cetak_6bulan_ncp_new.php?awalp1=<?php echo $_POST['awalp1']; ?>&akhirp1=<?php echo $_POST['akhirp1']; ?>&awalp2=<?php echo $_POST['awalp2']; ?>&akhirp2=<?php echo $_POST['akhirp2']; ?>&prodye=<?php echo $_POST['prodye']; ?>&probrs=<?php echo $_POST['probrs']; ?>&proprt=<?php echo $_POST['proprt']; ?>&prodye1=<?php echo $_POST['prodye1']; ?>&probrs1=<?php echo $_POST['probrs1']; ?>&proprt1=<?php echo $_POST['proprt1']; ?>" class="btn btn-success <?php if($_POST['awalp1']=="" OR $_POST['awalp2']=="") { echo "disabled"; }?>" target="_blank">Cetak Laporan 6 Bulanan NCP</a> 
                <a href="pages/cetak/cetak_bulanan_ncp.php?awalp1=<?php echo $_POST['awalp1']; ?>&akhirp1=<?php echo $_POST['akhirp1']; ?>&prodye=<?php echo $_POST['prodye']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-success <?php if(($_POST['awalp2']!="" AND $_POST['akhirp2']!="") OR $_POST['awalp1']=="") { echo "disabled"; }?>" target="_blank">Cetak Laporan 5 Besar Bulanan NCP</a> 
                <a href="pages/cetak/cetak_lampiran_ncp1.php?awalp1=<?php echo $_POST['awalp1']; ?>&akhirp1=<?php echo $_POST['akhirp1']; ?>&prodye=<?php echo $_POST['prodye']; ?>" class="btn btn-success <?php if(($_POST['awalp2']!="" AND $_POST['akhirp2']!="") OR $_POST['awalp1']=="") { echo "disabled"; }?>" target="_blank">Lampiran 1 Laporan 5 Besar Bulanan NCP</a> 
                <a href="pages/cetak/cetak_lampiran_ncp2.php?awalp1=<?php echo $_POST['awalp1']; ?>&akhirp1=<?php echo $_POST['akhirp1']; ?>&prodye=<?php echo $_POST['prodye']; ?>" class="btn btn-success <?php if(($_POST['awalp2']!="" AND $_POST['akhirp2']!="") OR $_POST['awalp1']=="") { echo "disabled"; }?>" target="_blank">Lampiran 2 Laporan 5 Besar Bulanan NCP</a> 
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
