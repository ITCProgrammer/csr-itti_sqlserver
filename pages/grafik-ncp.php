<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>
<?php
$Awal		= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir		= isset($_POST['akhir']) ? $_POST['akhir'] : '';
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
		#container1 {
    height: 400px; 
    min-width: 310px; 
    max-width: 1200px;
    margin: 0 auto;
}
		</style>
  </head>

  <body>
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Filter Grafik Per Periode</h3>
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
                <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" />
              </div>
            </div>
            <div class="col-sm-2">
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" />
              </div>
            </div>
            <button type="submit" class="btn btn-success " name="cari"><i class="fa fa-search"></i> Cari Data</button>
            <!-- /.input group -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer">

          </div>
          <!-- /.box-footer -->

        </div>
      </form>
    </div>
<?php $qry=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.nama,'''') dept,GROUP_CONCAT(IFNULL(b.jml,0)) as jml, DATE_FORMAT(now(),'%M %Y') as bln FROM tbl_dept a
LEFT JOIN(select dept,count(no_ncp) as jml from tbl_ncp_qcf where date_format(tgl_buat,'%Y-%m-%d') between '$Awal' AND '$Akhir'  group by dept 
) b ON a.nama=b.dept");
	$r=mysqli_fetch_array($qry);
	$qry1=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.masalah_dominan,'''') masalah,GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM 
(select * from (
select masalah_dominan,count(masalah_dominan) as jml  from tbl_ncp_qcf where date_format(tgl_buat,'%Y-%m-%d') between '$Awal' AND '$Akhir'  group by masalah_dominan) a
where jml>10) a
LEFT JOIN(select * from (
select masalah_dominan,count(masalah_dominan) as jml  from tbl_ncp_qcf where date_format(tgl_buat,'%Y-%m-%d') between '$Awal' AND '$Akhir'  group by masalah_dominan) a
where jml>10) b ON a.masalah_dominan=b.masalah_dominan");
	$r1=mysqli_fetch_array($qry1);
	if($Awal!="" and $Akhir!=""){  
	$tglAwal=date('d F Y', strtotime($Awal));
	$tglAkhir=date('d F Y', strtotime($Akhir));
	}else{
	$tglAwal=" - ";
	$tglAkhir=" - ";	
	}
	?>		  
<!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Column Chart Dept. NCP </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Column Chart Masalah DOMINAN</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
            <!-- /.box-body -->
          </div>

    </div>
    </div>
  </body>

</html>
<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'column',
		
        
    },
    title: {
        text: 'Dept NCP'
    },
    subtitle: {
        text: '<?php echo $tglAwal." s/d ".$tglAkhir;?>'
    },
    plotOptions: {
        column: {
            depth: 25,
			color: 'coral',
        }
    },
    xAxis: {
		categories: [<?php echo $r['dept'];?>],
        labels: {
            skew3d: true,
			style: {
                fontSize: '10px',
            }
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah'
        }
    },
    series: [{
        name: 'Departement',
        data: [<?php echo $r['jml'];?>],
		dataLabels: {
                enabled: true,
                format: '{point.y:.0f}',
				
            }
    }]
});
Highcharts.chart('container1', {
    chart: {
        type: 'column',        
    },
    title: {
        text: 'Masalah Dominan Lebih Dari 10 Kasus'
    },
    subtitle: {
        text: '<?php echo $tglAwal." s/d ".$tglAkhir;?>'
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    xAxis: {
		categories: [<?php echo $r1['masalah'];?>],
        labels: {
            skew3d: true,
            style: {
                fontSize: '8px',
            }
        }
    },
    yAxis: {
        title: {
            text: 'Jumlah'
        }
    },
    series: [{
        name: 'Masalah Dominan',
        data: [<?php echo $r1['jml']; ?>],
		dataLabels: {
                enabled: true,
                format: '{point.y:.0f}',
				style: {
                fontSize: '8px',
                fontFamily: 'Arial, sans-serif'
            }
            }
    }]
});		
		</script>