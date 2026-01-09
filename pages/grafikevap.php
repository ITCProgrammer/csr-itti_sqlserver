<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $ev0=$_GET['ev0'];
    $ev1=$_GET['ev1'];
    $ev2=$_GET['ev2'];
    $ev3=$_GET['ev3'];
    $ev4=$_GET['ev4'];
    $ev5=$_GET['ev5'];
    $ev6=$_GET['ev6'];
    $ev7=$_GET['ev7'];
    $ev8=$_GET['ev8'];
    $ev9=$_GET['ev9'];
    $ev10=$_GET['ev10'];
    $ev11=$_GET['ev11'];
    $ev12=$_GET['ev12'];
?>
    <script src="plugins/highcharts/code/highcharts.js"></script>
    <script src="plugins/highcharts/code/highcharts-3d.js"></script>
	<script src="plugins/highcharts/code/modules/exporting.js"></script>
    <script src="plugins/highcharts/code/modules/export-data.js"></script>
	<style type="text/css">
#container {
    height: 400px; 
    min-width: 350px; 
    max-width: 850px;
    margin: 0 auto;
}
	</style>
         
<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Grafik Evaporation Rate</h4>
                </div>
                <div class="modal-body">
                <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">&nbsp;</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div id="container" style="min-width: 350px; height: 450px; margin: 0 auto"></div>
                            <div class="box-footer">
                                <div class="pull-right">
                                    <!-- <input type="button" class="btn btn-block btn-social btn-linkedin btn-sm" name="kembali" value="Kembali" onClick="window.location.href='RumusHitung'">	    -->
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
		        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary" <?php if($_SESSION['lvl_id']!="LEADERTQ"){echo "disabled"; } ?> >Save Changes</button> -->
                    <!--<?php if($_SESSION['lvl_id']!="ADMIN"){echo "disabled"; } ?>-->
                </div>
            </form>
        </div>
            <!-- /.modal-content -->
</div>
          <!-- /.modal-dialog -->
          <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'line',        
    },
    credits: {
        enabled: false
    },
    tooltip: {
        shared: true,
        crosshairs: true,
        headerFormat: '<b>{point.key}</b><br/>'
    },
    title: {
        text: 'Evaporation'
    },
    subtitle: {
        text: '0 s/d 60 Menit'
    },
    xAxis: {
		categories: ['0 Min', '5 Min', '10 Min', '15 Min', '20 Min', '25 Min', '30 Min', '35 Min', '40 Min', '45 Min', '50 Min', '55 Min', '60 Min'],
        labels: {
            rotation: 0,
            align: 'right',
            style: {
                fontSize: '10px',
            }
        }
    },
    legend: {
        enabled: true
    },
    yAxis: {
        title: {
            text: 'Evaporation (g/h)'
        }
    },
    series: [{
        name: 'Evaporation (g/h)',
        data: [<?php echo $ev0; ?>, <?php echo $ev1; ?>, <?php echo $ev2; ?>, <?php echo $ev3; ?>, <?php echo $ev4; ?>, <?php echo $ev5; ?>, <?php echo $ev6; ?>, <?php echo $ev7; ?>, <?php echo $ev8; ?>, <?php echo $ev9; ?>, <?php echo $ev10; ?>, <?php echo $ev11; ?>, <?php echo $ev12; ?>],
		dataLabels: {
                enabled: true,
                format: '{point.y:.3f}',
				style: {
                fontSize: '10px',
                fontFamily: 'Arial, sans-serif'
            }
            }
    }]
});
</script>
<script>
  $(function () {
    $('#example9').DataTable({
	  'paging': true,
	})
  });
</script>