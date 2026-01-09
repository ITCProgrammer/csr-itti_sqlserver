<?php
$Evap_5		        = isset($_POST['evap_5']) ? $_POST['evap_5'] : '';
$Evap_10		    = isset($_POST['evap_10']) ? $_POST['evap_10'] : '';
$Evap_15		    = isset($_POST['evap_15']) ? $_POST['evap_15'] : '';
$Evap_20		    = isset($_POST['evap_20']) ? $_POST['evap_20'] : '';
$Evap_25		    = isset($_POST['evap_25']) ? $_POST['evap_25'] : '';
$Evap_30		    = isset($_POST['evap_30']) ? $_POST['evap_30'] : '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Grafik</title>
	<script src="plugins/highcharts/code/highcharts.js"></script>
    <script src="plugins/highcharts/code/highcharts-3d.js"></script>
	<script src="plugins/highcharts/code/modules/exporting.js"></script>
    <script src="plugins/highcharts/code/modules/export-data.js"></script>
	<style type="text/css">
#container {
    height: 400px; 
    min-width: 310px; 
    max-width: 800px;
    margin: 0 auto;
}
	</style>
  </head>

  <body>

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Drying Time</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body chart-responsive">
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <div class="box-footer">
                    <div class="pull-right">
                        <input type="button" class="btn btn-block btn-social btn-linkedin btn-sm" name="kembali" value="Kembali" onClick="window.location.href='RumusHitung'">	   
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
</body>
</html>
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
        text: '5 s/d 30 Menit'
    },
    xAxis: {
		categories: ['5 Min', '10 Min', '15 Min', '20 Min', '25 Min', '30 Min'],
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
        data: [<?php echo $Evap_5; ?>, <?php echo $Evap_10; ?>, <?php echo $Evap_15; ?>, <?php echo $Evap_20; ?>, <?php echo $Evap_25; ?>, <?php echo $Evap_30; ?>],
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