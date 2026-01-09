<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Final Status Test Quality</title>
<script type="text/javascript" src="bower_components/chartjs/Chart.js"></script>
<script src="plugins/highcharts/code/highcharts.js"></script>
<script src="plugins/highcharts/code/highcharts-3d.js"></script>
<script src="plugins/highcharts/code/modules/exporting.js"></script>
<script src="plugins/highcharts/code/modules/export-data.js"></script>
<style type="text/css">
#container {
    height: 300px; 
    min-width: 310px; 
    max-width: 500px;
    margin: 0 auto;
}
	</style>
</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Leader	= isset($_POST['leader']) ? $_POST['leader'] : '';
$Status	= isset($_POST['sts']) ? $_POST['sts'] : '';
?>
<div class="row">
<div class="col-md-12">
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Final Test Quality</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
    <div class="box-body">
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
            <div class="col-sm-3">
                <select name="leader" class="form-control select2"> 
                  <option value="ALL" <?php if($Leader=="ALL"){ echo "SELECTED";}?>>ALL</option>
                	<option value="Edwin Ismunandar" <?php if($Leader=="Edwin Ismunandar"){ echo "SELECTED";}?>>Edwin Ismunandar</option>
                  <option value="Ferry Wibowo" <?php if($Leader=="Ferry Wibowo"){ echo "SELECTED";}?>>Ferry Wibowo</option>
                	<option value="Janu Dwi Laksono" <?php if($Leader=="Janu Dwi Laksono"){ echo "SELECTED";}?>>Janu Dwi Laksono</option>
					        <option value="Taufik Restiardi" <?php if($Leader=="Taufik Restiardi"){ echo "SELECTED";}?>>Taufik Restiardi</option>
                  <!-- <option value="Tri Setiawan" <?php //if($Leader=="Tri Setiawan"){ echo "SELECTED";}?>>Tri Setiawan</option> -->
                  <option value="Dixih Wahyudin" <?php if($Leader=="Dixih Wahyudin"){ echo "SELECTED";}?>>Dixih Wahyudin</option>
                  <option value="Vivik Kurniawati" <?php if($Leader=="Vivik Kurniawati"){ echo "SELECTED";}?>>Vivik Kurniawati</option>
                </select>
            </div>			 
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <select name="sts" class="form-control select2"> 
                  <option value="ALL" <?php if($Status=="ALL"){ echo "SELECTED";}?>>ALL</option>
                	<option value="Approve" <?php if($Status=="Approve"){ echo "SELECTED";}?>>Approve</option>
                  <option value="Conditional Approve" <?php if($Status=="Conditional Approve"){ echo "SELECTED";}?>>Conditional Approve</option>
                	<option value="Limit Approve" <?php if($Status=="Limit Approve"){ echo "SELECTED";}?>>Limit Approve</option>
					        <option value="Reject" <?php if($Status=="Reject"){ echo "SELECTED";}?>>Reject</option>
                </select>
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
</div>
</div>
<?php if($_POST['awal']!=""){
  if($Awal!="" and $Akhir!=""){  
	$tglAwal=date('d F Y', strtotime($Awal));
	$tglAkhir=date('d F Y', strtotime($Akhir));
	}else{
	$tglAwal=" - ";
	$tglAkhir=" - ";	
	}
?>
<div class="row">
<div class="col-md-6">
  <!--<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"> Grafik Final Test Quality</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div style="width: 500px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>-->
  <!-- BAR CHART -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Grafik Final Test Quality</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body chart-responsive">
      <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"> Rangkuman Final Test Quality</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
    <table class="table table-bordered table-striped" style="width: 100%;">
          <thead class="bg-blue">
            <tr>
              <th width="5%"><div align="center">Leader</div></th>
              <th width="14%"><div align="center">Approve</div></th>
              <th width="14%"><div align="center">Persentase</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
          //Edwin  
					    $jumlah_edwin1 = mysqli_query($con,"SELECT COUNT(*) as jml_edwin FROM tbl_tq_nokk a
              LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
              WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Edwin%' AND `status`!=''");
              $edwin1=mysqli_fetch_array($jumlah_edwin1);
          //Ferry
					    $jumlah_ferry1 = mysqli_query($con,"SELECT COUNT(*) as jml_ferry FROM tbl_tq_nokk a
              LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
              WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Ferry%' AND `status`!=''");
              $ferry1=mysqli_fetch_array($jumlah_ferry1);
          //Janu
              $jumlah_janu1 = mysqli_query($con,"SELECT COUNT(*) as jml_janu FROM tbl_tq_nokk a
              LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
              WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Janu%' AND `status`!=''");
              $janu1=mysqli_fetch_array($jumlah_janu1);
          //Taufik
              $jumlah_taufik1 = mysqli_query($con,"SELECT COUNT(*) as jml_taufik FROM tbl_tq_nokk a
              LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
              WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Taufik%' AND `status`!=''");
              $taufik1=mysqli_fetch_array($jumlah_taufik1);
          //Tri
              // $jumlah_tri1 = mysqli_query($con,"SELECT COUNT(*) as jml_tri FROM tbl_tq_nokk a
              // LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
              // WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Tri%' AND `status`!=''");
              // $tri1=mysqli_fetch_array($jumlah_tri1);
          //Dix
              $jumlah_dix1 = mysqli_query($con,"SELECT COUNT(*) as jml_dix FROM tbl_tq_nokk a
              LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
              WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Dix%' AND `status`!=''");
              $dix1=mysqli_fetch_array($jumlah_dix1);
          //Vivik
              $jumlah_vivik1 = mysqli_query($con,"SELECT COUNT(*) as jml_vivik FROM tbl_tq_nokk a
              LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
              WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Vivik%' AND `status`!=''");
              $vivik1=mysqli_fetch_array($jumlah_vivik1);
          //Total
              $qrytotal = mysqli_query($con,"SELECT COUNT(*) as jml FROM tbl_tq_nokk a
              LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
              WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve!='' AND `status`!=''");
              $total=mysqli_fetch_array($qrytotal);
					?>
          <tr valign="top">
            <td align="center">Edwin Ismunandar</td>
            <td align="center"><?php echo $edwin1['jml_edwin'];?></td>
            <td align="center"><?php if($total['jml']!=0){echo number_format(($edwin1['jml_edwin']/$total['jml'])*100,0)." %";}else{echo "0 %";}?></td>
          </tr>
          <tr valign="top">
            <td align="center">Ferry Wibowo</td>
            <td align="center"><?php echo $ferry1['jml_ferry'];?></td>
            <td align="center"><?php if($total['jml']!=0){echo number_format(($ferry1['jml_ferry']/$total['jml'])*100,0)." %";}else{echo "0 %";}?></td>
          </tr>
          <tr valign="top">
            <td align="center">Janu Dwi Laksono</td>
            <td align="center"><?php echo $janu1['jml_janu'];?></td>
            <td align="center"><?php if($total['jml']!=0){echo number_format(($janu1['jml_janu']/$total['jml'])*100,0)." %";}else{echo "0 %";}?></td>
          </tr>
          <tr valign="top">
            <td align="center">Taufik Restiardi</td>
            <td align="center"><?php echo $taufik1['jml_taufik'];?></td>
            <td align="center"><?php if($total['jml']!=0){echo number_format(($taufik1['jml_taufik']/$total['jml'])*100,0)." %";}else{echo "0 %";}?></td>
          </tr>
          <!-- <tr valign="top">
            <td align="center">Tri Setiawan</td>
            <td align="center"><?php //echo $tri1['jml_tri'];?></td>
            <td align="center"><?php //if($total['jml']!=0){echo number_format(($tri1['jml_tri']/$total['jml'])*100,0)." %";}else{echo "0 %";}?></td>
          </tr> -->
          <tr valign="top">
            <td align="center">Dixih Wahyudin</td>
            <td align="center"><?php echo $dix1['jml_dix'];?></td>
            <td align="center"><?php if($total['jml']!=0){echo number_format(($dix1['jml_dix']/$total['jml'])*100,0)." %";}else{echo "0 %";}?></td>
          </tr>
          <tr valign="top">
            <td align="center">Vivik Kurniawati</td>
            <td align="center"><?php echo $vivik1['jml_vivik'];?></td>
            <td align="center"><?php if($total['jml']!=0){echo number_format(($vivik1['jml_vivik']/$total['jml'])*100,0)." %";}else{echo "0 %";}?></td>
          </tr>
          </tbody>
          <tfoot>
          <tr valign="top">
            <td align="center"><strong>Total</strong></td>
            <td align="center"><strong><?php echo $total['jml']; ?></strong></td>
            <td align="center"><strong><?php if($total['jml']!=0){echo number_format(($total['jml']/$total['jml'])*100,0)." %";}else{echo "0 %";} ?></strong></td>
          </tr>
          </tfoot>
    </table>
    </div>
</div>
</div>
<?php }?>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
<div class="box-header">
  <!--<a href="FormKK" class="btn btn-success <?php if($_SESSION['levelPpc']=="biasa"){ echo "disabled";} ?>"><i class="fa fa-plus-circle"></i> Tambah</a>-->
      <div class="box-body">
      <table id="example1" class="table table-bordered table-hover table-striped" width="100%"> 
          <thead class="bg-blue">
            <tr>
              <th width="24"><div align="center">#</div></th>
              <th width="24"><div align="center">No. Test</div></th>
              <th width="90"><div align="center">No. Demand</div></th>
              <th width="90"><div align="center">No. KK</div></th>
              <th width="90"><div align="center">No. KK Legacy</div></th>
              <th width="50"><div align="center">Tgl Masuk</div></th>
              <th width="50"><div align="center">Tgl Target</div></th>
              <th width="50"><div align="center">Tgl Approve</div></th>
			        <th width="130"><div align="center">Pelanggan</div></th>
              <th width="50"><div align="center">No. PO</div></th>
              <th width="100"><div align="center">No. Order</div></th>
              <th width="100"><div align="center">No. Item</div></th>
              <th width="100"><div align="center">Jenis Kain</div></th>
              <th width="50"><div align="center">Prod Order/ Lot</div></th>
              <th width="50"><div align="center">No. Lot Legacy</div></th>
              <th width="100"><div align="center">Warna</div></th>
              <th width="40"><div align="center">Status Test</div></th>
            </tr>
          </thead>
          <tbody>
            <?php
      include('koneksi.php');
      if($Awal!=""){ $Where =" AND DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
      if($Leader=="ALL"){ $ldr=" ";}else{$ldr=" AND approve LIKE '$Leader' ";}
      if($Status=="ALL"){ $sts=" ";}else{$sts=" AND `status` LIKE '$Status' ";}
        $sqldt=mysqli_query($con,"SELECT a.*, a.id AS idkk, b.* FROM tbl_tq_nokk a
        LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk
        WHERE (`status`='Approve' or `status`='Conditional Approve' or `status`='Limit Approve' or `status`='Reject') $ldr $sts $Where
        ORDER BY tgl_approve ASC");

      //$sqldt=mysqli_query("SELECT a.*, a.id AS idkk, b.* FROM tbl_tq_nokk a
      //LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk
      //WHERE (`status`='Approve' or `status`='Conditional Approve' or `status`='Limit Approve' or `status`='Reject') and tgl_masuk between date_sub(now(),INTERVAL 30 DAY) and now()
      //ORDER BY tgl_masuk ASC");
      $no="1";
      while($rowd=mysqli_fetch_array($sqldt)){
		 ?>
         <tr>
                  <td align="center" ><?php echo $no;?></td>
                  <td align="center" >
                  <?php if($_SESSION['lvl_id']=='LEADERTQ'){?>
                  <a href="SummaryTQNew-<?php echo $rowd['no_test'];?>" class="btn btn-primary btn-xs"><?php echo $rowd['no_test'];?></a>
                  <?php } ?>
                  <?php if($_SESSION['lvl_id']=='AFTERSALES'){?>
                    <a href="index1.php?p=summarytq-aftersalesnotest&no_test=<?php echo $rowd['no_test'];?>" class="btn btn-primary btn-xs"><?php echo $rowd['no_test'];?></a>
                  <?php } ?>
                  </td>
                  <td align="center" ><?php echo $rowd['nodemand']; ?></td>
                  <td align="center" ><?php echo $rowd['nokk']; ?></td>
                  <td align="center" ><?php echo $rowd['kk_legacy']; ?></td>
                  <td align="center" ><?php echo $rowd['tgl_masuk'];?></td>
                  <td align="center" ><?php echo $rowd['tgl_target'];?></td>
                  <td align="center" ><?php echo $rowd['tgl_approve'];?></td>
                  <td align="left" ><font size="-1"><?php echo $rowd['pelanggan'];?></font></td>
                  <td align="center" ><?php echo $rowd['no_po'];?></td>
                  <td align="center" ><?php echo $rowd['no_order'];?></td>
                  <td align="center" ><?php echo $rowd['no_item'];?></td>
                  <td align="center" >
                  <a href="#" id='<?php echo $rowd['idkk']; ?>' class="update_jeniskain <?php if($_SESSION['lvl_id']!='LEADERTQ'){ echo "disabled";} ?>"><?php echo $rowd['jenis_kain'];?></a>
                  </td>
                  <td align="center" ><?php echo $rowd['lot'];?></td>
                  <td align="center" ><?php echo $rowd['lot_legacy'];?></td>
                  <td align="center" ><?php echo $rowd['warna'];?></td>
                  <td align="center" >
                  <?php if($rowd['status']=="Approve"){?> <span class='badge bg-green'><?php echo $rowd['status'];?></span>  <?php }?>
                  <?php if($rowd['status']=="Conditional Approve"){?> <span class='badge bg-blue'><?php echo $rowd['status'];?></span>  <?php }?>
                  <?php if($rowd['status']=="Limit Approve"){?> <span class='badge bg-orange'><?php echo $rowd['status'];?></span>  <?php }?>
                  <?php if($rowd['status']=="Reject"){?> <span class='badge bg-red'><?php echo $rowd['status'];?></span>  <?php }?>
                  <?php if($rowd['approve']!=""){?> <br><span class='badge bg-maroon'><?php echo $rowd['approve'];?></span>  <?php }?>
                  </td>
                </tr>
                <?php $no++;
  } ?>
              </tbody>
            </table>
            </div>
	  </div>
	</div>
</div>
	</div>
<div id="UpdateJenisKain" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="PosisiKKTQ" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'column',        
    },
    title: {
        text: 'Leader Up'
    },
    subtitle: {
        text: '<?php echo $tglAwal." s/d ".$tglAkhir;?>'
    },
    plotOptions: {
        column: {
            depth: 25,
			color: 'maroon',
        }
    },
    xAxis: {
		categories: [
      "Edwin I.", 
      "Ferry W.", 
      "Janu D.L.", 
      "Taufik R.", 
      // "Tri S.", 
      "Dixih W.", 
      "Vivik K."
    ],
        labels: {
            skew3d: true,
            style: {
                fontSize: '10px',
            }
        }
    },
    yAxis: {
        title: {
            text: 'Approve'
        }
    },
    series: [{
        name: 'Leader Up',
        data: [<?php 
					$jumlah_edwin = mysqli_query($con,"SELECT COUNT(*) as jml_edwin FROM tbl_tq_nokk a
                    LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
                    WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Edwin%' AND `status`!=''");
                    $edwin=mysqli_fetch_array($jumlah_edwin);
					echo $edwin['jml_edwin'];
					?>, 
					<?php 
					$jumlah_ferry = mysqli_query($con,"SELECT COUNT(*) as jml_ferry FROM tbl_tq_nokk a
                    LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
                    WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Ferry%' AND `status`!=''");
                    $ferry=mysqli_fetch_array($jumlah_ferry);
					echo $ferry['jml_ferry'];
					?>, 
					<?php 
					$jumlah_janu = mysqli_query($con,"SELECT COUNT(*) as jml_janu FROM tbl_tq_nokk a
                    LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
                    WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Janu%' AND `status`!=''");
                    $janu=mysqli_fetch_array($jumlah_janu);
					echo $janu['jml_janu'];
					?>, 
					<?php 
					$jumlah_taufik = mysqli_query($con,"SELECT COUNT(*) as jml_taufik FROM tbl_tq_nokk a
                    LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
                    WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Taufik%' AND `status`!=''");
                    $taufik=mysqli_fetch_array($jumlah_taufik);
					echo $taufik['jml_taufik'];
					?>,
          //           <?php 
					// $jumlah_tri = mysqli_query($con,"SELECT COUNT(*) as jml_tri FROM tbl_tq_nokk a
          //           LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
          //           WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Tri%' AND `status`!=''");
          //           $tri=mysqli_fetch_array($jumlah_tri);
					// echo $tri['jml_tri'];
					// ?>,
                    <?php 
					$jumlah_dix = mysqli_query($con,"SELECT COUNT(*) as jml_dix FROM tbl_tq_nokk a
                    LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
                    WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Dix%' AND `status`!=''");
                    $dix=mysqli_fetch_array($jumlah_dix);
					echo $dix['jml_dix'];
					?>,
          <?php 
					$jumlah_vivik = mysqli_query($con,"SELECT COUNT(*) as jml_vivik FROM tbl_tq_nokk a
                    LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk 
                    WHERE DATE_FORMAT( tgl_approve, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Vivik%' AND `status`!=''");
                    $vivik=mysqli_fetch_array($jumlah_vivik);
					echo $vivik['jml_vivik'];
					?>],
		dataLabels: {
                enabled: true,
                format: '{point.y}',
				style: {
                fontSize: '10px',
                fontFamily: 'Arial, sans-serif'
            }
            }
    }]
});

		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [
          "Edwin I.", 
          "Ferry W.", 
          "Janu D.L.", 
          "Taufik R.", 
          // "Tri S.", 
          "Dixih W.", 
          "Vivik K."
        ],
				datasets: [
                    {
					label: '',
					data: [<?php 
					$jumlah_edwin = mysqli_query($con,"SELECT COUNT(*) as jml_edwin FROM tbl_tq_test 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Edwin%'");
                    $edwin=mysqli_fetch_array($jumlah_edwin);
					echo $edwin['jml_edwin'];
					?>, 
					<?php 
					$jumlah_ferry = mysqli_query($con,"SELECT COUNT(*) as jml_ferry FROM tbl_tq_test 
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Ferry%'");
                    $ferry=mysqli_fetch_array($jumlah_ferry);
					echo $ferry['jml_ferry'];
					?>, 
					<?php 
					$jumlah_janu = mysqli_query($con,"SELECT COUNT(*) as jml_janu FROM tbl_tq_test 
          WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Janu%'");
                    $janu=mysqli_fetch_array($jumlah_janu);
					echo $janu['jml_janu'];
					?>, 
					<?php 
					$jumlah_taufik = mysqli_query($con,"SELECT COUNT(*) as jml_taufik FROM tbl_tq_test 
          WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Taufik%'");
                    $taufik=mysqli_fetch_array($jumlah_taufik);
					echo $taufik['jml_taufik'];
					?>,
          //           <?php 
					// $jumlah_tri = mysqli_query($con,"SELECT COUNT(*) as jml_tri FROM tbl_tq_test 
          // WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Tri%'");
          //           $tri=mysqli_fetch_array($jumlah_tri);
					// echo $tri['jml_tri'];
					// ?>,
                    <?php 
					$jumlah_dix = mysqli_query($con,"SELECT COUNT(*) as jml_dix FROM tbl_tq_test 
          WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Dix%'");
                    $dix=mysqli_fetch_array($jumlah_dix);
					echo $dix['jml_dix'];
					?>,
          <?php 
					$jumlah_vivik = mysqli_query($con,"SELECT COUNT(*) as jml_vivik FROM tbl_tq_test 
          WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND approve LIKE '%Vivik%'");
                    $vivik=mysqli_fetch_array($jumlah_vivik);
					echo $vivik['jml_vivik'];
					?>
                    ],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
          'rgba(90, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
          'rgba(150, 169, 222, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
          'rgba(90, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
          'rgba(150, 169, 222, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>
