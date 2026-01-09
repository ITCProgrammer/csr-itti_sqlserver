<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>
<?php
$Awal		= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir		= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$TotalKirim		= isset($_POST['total']) ? $_POST['total'] : '';
$Langganan		= isset($_POST['langganan']) ? $_POST['langganan'] : '';
$TotalLot		= isset($_POST['totallot']) ? $_POST['totallot'] : '';
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
    max-width: 800px;
    margin: 0 auto;
}
#container2 {
    height: 400px; 
    min-width: 310px; 
    max-width: 800px;
    margin: 0 auto;
}
#container3 {
    height: 400px; 
    min-width: 310px; 
    max-width: 800px;
    margin: 0 auto;
}
#container4 {
    height: 400px; 
    min-width: 310px; 
    max-width: 800px;
    margin: 0 auto;
}
#container5 {
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
                <div class="col-sm-2">
                <div class="input-group date">
                    <div class="input-group-addon"> Total Kirim</div>
                    <input name="total" type="text" class="form-control pull-right" placeholder="0" value="<?php echo $TotalKirim; ?>" />
                </div>
                </div>
                <div class="col-sm-2">
                <!-- <div class="input-group date">
                    <div class="input-group-addon"> Total Lot Kirim</div>
                    <input name="totallot" type="text" class="form-control pull-right" placeholder="0" value="<?php echo $TotalLot; ?>" />
                </div>
                </div>
                <div class="col-sm-2">
                    <div class="input-group date">
                        <div class="input-group-addon"> Langganan</div>
                        <input name="langganan" type="text" class="form-control pull-right" placeholder="Langganan" value="<?php echo $Langganan; ?>" />
                    </div>
                </div> -->
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
    <!-- Section 3 -->
    <div class="row">
       
        <div class="col-xs-6">	
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> 5 Terbesar Masalah Per Hanger : <?php echo $Awal." s/d ".$Akhir;?></h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                <table class="table table-bordered table-striped" style="width: 100%;">
                        <thead class="bg-blue">
                            <tr>
                            <th width="15%"><div align="center">Hanger</div></th>
                            <th width="20%"><div align="center">Masalah</div></th>
                            <th width="14%"><div align="center">KG</div></th>
                            <th width="14%"><div align="center">Total Kirim</div></th>
                            <th width="15%"><div align="center">% Dibandingkan Total Kirim</div></th>
                            <th width="15%"><div align="center">% Masalah Per Hanger</div></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $tkirim=0;
                        $totaldll=0;
                        $totalmasalah=0;
                        $total1=0;
                        $total2=0;
                        if($Langganan!=''){$lgn=" AND langganan LIKE '%$Langganan%' ";}else{$lgn="";}
                        
                        // $qryAll=mysqli_query($con, "SELECT COUNT(*) AS jml_all, SUM(qty_claim) AS qty_claim_all FROM tbl_ganti_kain_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $lgn
                        // GROUP BY no_hanger
                        // ORDER BY qty_claim DESC
                        // LIMIT 5");
                        // $rAll=mysqli_fetch_array($qryAll);
                       
                       $qry7=mysqli_query($con,"SELECT no_item, no_hanger, SUM(qty_claim) AS qty_claim FROM tbl_ganti_kain_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $lgn
                        GROUP BY no_hanger
                        ORDER BY qty_claim DESC
                        LIMIT 5");

               

                        $rAll=mysqli_fetch_array($qry7);

                        while($ri7=mysqli_fetch_array($qry7)){
                            // $no_hanger = $ri7['no_hanger'];
                            $qryd7=mysqli_query($con,"SELECT  sub_defect, SUM(qty_claim) AS qty_claim FROM tbl_ganti_kain_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $lgn
                            AND no_hanger='$ri7[no_hanger]' 
                            GROUP BY sub_defect
                            ORDER BY qty_claim DESC
                            LIMIT 3");
                            $qrykirim=mysqli_query($con,"SELECT SUM(qty) AS qty_kirim FROM tbl_pengiriman WHERE DATE_FORMAT(tgl_kirim, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND no_item='$ri7[no_item]' AND tmp_hapus='0'");
                            $rkirim=mysqli_fetch_array($qrykirim);
                            $qrytitem=mysqli_query($con,"SELECT SUM(a.qty_claim) AS total_claim FROM
                            (SELECT SUM(qty_claim) AS qty_claim FROM tbl_ganti_kain_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir'
                            AND no_hanger='$ri7[no_hanger]' 
                            GROUP BY sub_defect
                            ORDER BY qty_claim DESC
                            LIMIT 5) a");
                                    
                            $ritem=mysqli_fetch_array($qrytitem);
                            while($rdi7=mysqli_fetch_array($qryd7)){
                                
                        ?>
                        <tr valign="top">
                            <td align="center"><?php echo $ri7['no_hanger'];?></td>  
                            <td align="right"><?php echo $rdi7['sub_defect'];?></td>
                            <td align="right"><?php echo $rdi7['qty_claim'];?></td>
                            <td align="right"><?php echo $TotalKirim;?></td>
                            <td align="right"><?php if($TotalKirim!=''){echo number_format(($rdi7['qty_claim']/$TotalKirim)*100,2)." %";}else{echo "0";}?></td>
                            <td align="right"><?php if($TotalKirim!=''){echo number_format(($ritem['total_claim']/$TotalKirim)*100,2)." %";}else{echo "0";}?></td>
                        </tr>
                        <?php  
                        $no1++;
                        $total1 = $total1+$rdi7['qty_claim'];
                        $total2 = $total2+$ritem['total_claim'];
                        $tkirim=$tkirim+$TotalKirim;} 
                        
    
                        } 
                        $totaldll=$rAll['qty_claim'] - $total1;    
                        $totalmasalah=$total2;    
                        ?>
                        </tbody>
                        <tfoot>
                        <tr valign="top">
                            <td align="center" colspan="2"><strong>DLL</strong></td>
                            <td align="right"><strong><?php echo number_format($totaldll,2); ?></strong></td>
                            <td align="right"><strong><?php echo $TotalKirim ?></strong></td>
                            <td align="right"><strong><?php if($TotalKirim!=""){echo number_format(($totaldll/$TotalKirim)*100,2)." %";}else{echo "0 %";} ?></strong></td>
                            <td align="right"><strong><?php if($TotalKirim!=""){echo number_format(($totalmasalah/$TotalKirim)*100,2)." %";}else{echo "0 %";} ?></strong></td>
                            </tr>
                          
                        </tfoot>
                        <!-- <tfoot>
                            <tr valign="top">
                                <td align="center" colspan="2"><strong>TOTAL KIRIM</strong></td>
                                <td align="right" colspan="4"><strong><?php if($tkirim!=""){echo number_format($tkirim,2);}else{echo "0";} ?></strong></td>
                            </tr>
                        </tfoot> -->
                </table>
                <div class="box-footer">
                        <a href="pages/cetak/excel_5besar_masalah_ganti_kain.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&langganan=<?php echo $_POST['langganan']; ?>&kirim=<?php echo $TotalKirim; ?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">    
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> Breakdown Beda Warna di 3 Besar Ganti Kain</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" style="width: 100%;">
                <thead class="bg-blue">
                <thead class="bg-blue">
    <tr>
        <th width="15%"><div align="center">Hanger</div></th>
        <th width="20%"><div align="center">Warna</div></th>
        <th width="14%"><div align="center">KG</div></th>
        <th width="14%"><div align="center">Total Kirim</div></th>
        <th width="15%"><div align="center">% Dibandingkan Total Kirim</div></th>
    </tr>
</thead>
<tbody>
                        <?php 
                        $qry8=mysqli_query($con,"select
                                                    no_hanger
                                                from
                                                    tbl_ganti_kain_now
                                                where
                                                                        DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) between '$Awal' and '$Akhir' $lgn
                                                                    group by
                                                                        no_hanger
                                                                    order by
                                                                        SUM(qty_claim) desc
                                                                    limit 5");
                                                $hanger = [];
                                                while($ri8 = mysqli_fetch_array($qry8)) {
                                                $hanger[] = $ri8['no_hanger'];
                                                }
                                                $hanger = "'".implode("','", $hanger)."'";

                        $tkirim=0;
                        if($Langganan!=''){$lgn=" AND langganan LIKE '%$Langganan%' ";}else{$lgn="";}
                        $qry7=mysqli_query($con,"SELECT no_item, warna,no_hanger, SUM(qty_claim) AS qty_claim FROM tbl_ganti_kain_now WHERE 
                        DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND no_hanger in($hanger) $lgn
                        AND sub_defect = 'Beda Warna'                     
                        GROUP BY no_hanger
                        ORDER BY qty_claim DESC
                        LIMIT 3");
                        while($ri7=mysqli_fetch_array($qry7)){
                            $qryd7=mysqli_query($con,"SELECT sub_defect, warna,SUM(qty_claim) AS qty_claim FROM tbl_ganti_kain_now 
                            WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $lgn
                            -- AND sub_defect = 'Beda Warna'
                            AND no_hanger='$ri7[no_hanger]' 
                            GROUP BY sub_defect
                            ORDER BY qty_claim DESC
                            LIMIT 3");
                            $qrykirim=mysqli_query($con,"SELECT SUM(qty) AS qty_kirim FROM tbl_pengiriman 
                            WHERE DATE_FORMAT(tgl_kirim, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND no_item='$ri7[no_item]'AND tmp_hapus='0'");
                            $rkirim=mysqli_fetch_array($qrykirim);
                            $qrytitem=mysqli_query($con,"SELECT SUM(a.qty_claim) AS total_claim FROM
                            (SELECT SUM(qty_claim) AS qty_claim FROM tbl_ganti_kain_now WHERE DATE_FORMAT(tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir'
                            AND no_hanger='$ri7[no_hanger]' 
                            AND sub_defect = 'Beda Warna'
                            GROUP BY sub_defect
                            ORDER BY qty_claim DESC
                            LIMIT 3) a");
                            $ritem=mysqli_fetch_array($qrytitem);
                            while($rdi7=mysqli_fetch_array($qryd7)){
                        ?>
                        <tr valign="top">
                            <td align="center"><?php echo $ri7['no_hanger'];?></td>  
                            <td align="right"><?php echo $rdi7['warna'];?></td>
                            <td align="right"><?php echo $rdi7['qty_claim'];?></td>
                            <td align="right"><?php echo $TotalKirim;?></td>
                            <td align="right"><?php if($TotalKirim!=''){echo number_format(($rdi7['qty_claim']/$TotalKirim)*100,2)." %";}else{echo "0";}?></td>
                          
                        </tr>
                        <?php  
                        $tkirim=$tkirim+$TotalKirim;} } 
                        ?>
                        </tbody>

       
            </table>
        </div>
    </div>
</div>

    </div>
<?php
if($TotalLot!=""){ 
    //Grafik Langganan Dibandingkan Total Kasus
    $qry3=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.langganan,'''') buyer, GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM tbl_langganan_aftersales_now a
INNER JOIN(SELECT ROUND((COUNT(pelanggan)/$TotalLot)*100,2) AS jml, pelanggan 
FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' GROUP BY pelanggan ORDER BY jml DESC LIMIT 5) b ON a.langganan=b.pelanggan");
    $r3=mysqli_fetch_array($qry3);
    //Grafik Defect Dibandingkan Total Kasus 
    $qry1=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.sub_defect,'''') defect ,GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM tbl_masalah_aftersales a
INNER JOIN(SELECT ROUND((COUNT(masalah_dominan)/$TotalLot)*100,2) AS jml,masalah_dominan FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
AND (masalah_dominan!='' OR masalah_dominan!=NULL) GROUP BY masalah_dominan ORDER BY jml DESC LIMIT 5) b ON a.masalah=b.masalah_dominan");
    $r1=mysqli_fetch_array($qry1);
}
if($TotalKirim!=""){
    //Grafik Langganan Dibandingkan Total Kirim 
    $qry4=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.langganan,'''') buyer, GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM tbl_langganan_aftersales_now a
INNER JOIN(SELECT ROUND((SUM(qty_claim)/$TotalKirim)*100,2) AS jml, pelanggan 
FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' GROUP BY pelanggan ORDER BY jml DESC LIMIT 5) b ON a.langganan=b.pelanggan");
    $r4=mysqli_fetch_array($qry4);
    //Grafik Defect Dibandingkan Total Kirim  
    $qry5=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.masalah,'''') defect ,GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM tbl_masalah_aftersales a
INNER JOIN(SELECT ROUND((SUM(qty_claim)/$TotalKirim)*100,2) AS jml,masalah_dominan FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
AND (masalah_dominan!='' OR masalah_dominan!=NULL) GROUP BY masalah_dominan ORDER BY jml DESC LIMIT 5) b ON a.masalah=b.masalah_dominan");
    $r5=mysqli_fetch_array($qry5);
    //Grafik Defect Lululemon Dibandingkan Total Kirim  
    $qry6=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.masalah,'''') defect ,GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM tbl_masalah_aftersales a
INNER JOIN(SELECT ROUND((SUM(qty_claim)/$TotalKirim)*100,2) AS jml,masalah_dominan FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND langganan LIKE '%lululemon%' GROUP BY masalah_dominan ORDER BY jml DESC LIMIT 5) b ON a.masalah=b.masalah_dominan");
    $r6=mysqli_fetch_array($qry6);
    //Grafik Dept Dibandingkan Total Kirim  
    $qry7=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.nama,'''') dept ,GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM tbl_dept a
INNER JOIN(SELECT ROUND((SUM(qty_claim)/$TotalKirim)*100,2) AS jml,t_jawab FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
AND (t_jawab!='' OR t_jawab!=NULL) GROUP BY t_jawab ORDER BY jml DESC LIMIT 5) b ON a.nama=b.t_jawab");
    $r7=mysqli_fetch_array($qry7);
}

	if($Awal!="" and $Akhir!=""){  
	$tglAwal=date('d F Y', strtotime($Awal));
	$tglAkhir=date('d F Y', strtotime($Akhir));
	}else{
	$tglAwal=" - ";
	$tglAkhir=" - ";	
	}
	?>	   
            <!-- BAR CHART -->
            <!-- <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Langganan Dibandingkan Total Kirim</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div> -->
          <!-- BAR CHART -->
            <!-- <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Masalah Dominan Dibandingkan Total Kirim</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>  -->
    	  <!-- BAR CHART -->
            <!-- <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Langganan Dibandingkan Total Kasus</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div> -->
          <!-- BAR CHART -->
            <!-- <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Masalah Dominan Dibandingkan Total Kasus</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div> -->
            <!-- BAR CHART -->
            <!-- <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Masalah Lululemon Dibandingkan Total Kirim</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div id="container4" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div> -->
            <!-- BAR CHART -->
            <!-- <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Dept Penyebab Dibandingkan Total Kirim</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div id="container5" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div> -->

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
        text: 'Langganan'
    },
    subtitle: {
        text: '<?php echo $tglAwal." s/d ".$tglAkhir;?>'
    },
    plotOptions: {
        column: {
            depth: 25,
			color: 'brown',
        }
    },
    xAxis: {
		categories: [<?php echo $r3['buyer'];?>],
        labels: {
            skew3d: true,
            style: {
                fontSize: '10px',
            }
        }
    },
    yAxis: {
        title: {
            text: 'Persentase'
        }
    },
    series: [{
        name: 'Langganan',
        data: [<?php echo $r3['jml']; ?>],
		dataLabels: {
                enabled: true,
                format: '{point.y:.2f}%',
				style: {
                fontSize: '10px',
                fontFamily: 'Arial, sans-serif'
            }
            }
    }]
});

Highcharts.chart('container1', {
    chart: {
        type: 'column',        
    },
    title: {
        text: 'Masalah Dominan'
    },
    subtitle: {
        text: '<?php echo $tglAwal." s/d ".$tglAkhir;?>'
    },
    plotOptions: {
        column: {
            depth: 25,
			color: 'green',
        }
    },
    xAxis: {
		categories: [<?php echo $r1['defect'];?>],
        labels: {
            skew3d: true,
            style: {
                fontSize: '10px',
            }
        }
    },
    yAxis: {
        title: {
            text: 'Persentase'
        }
    },
    series: [{
        name: 'Masalah Dominan',
        data: [<?php echo $r1['jml']; ?>],
		dataLabels: {
                enabled: true,
                format: '{point.y:.2f}%',
				style: {
                fontSize: '10px',
                fontFamily: 'Arial, sans-serif'
            }
            }
    }]
});

Highcharts.chart('container2', {
    chart: {
        type: 'column',        
    },
    title: {
        text: 'Langganan'
    },
    subtitle: {
        text: '<?php echo $tglAwal." s/d ".$tglAkhir;?>'
    },
    plotOptions: {
        column: {
            depth: 25,
			color: 'brown',
        }
    },
    xAxis: {
		categories: [<?php echo $r4['buyer'];?>],
        labels: {
            skew3d: true,
            style: {
                fontSize: '10px',
            }
        }
    },
    yAxis: {
        title: {
            text: 'Persentase'
        }
    },
    series: [{
        name: 'Langganan',
        data: [<?php echo $r4['jml']; ?>],
		dataLabels: {
                enabled: true,
                format: '{point.y:.2f}%',
				style: {
                fontSize: '10px',
                fontFamily: 'Arial, sans-serif'
            }
            }
    }]
});

Highcharts.chart('container3', {
    chart: {
        type: 'column',        
    },
    title: {
        text: 'Masalah Dominan'
    },
    subtitle: {
        text: '<?php echo $tglAwal." s/d ".$tglAkhir;?>'
    },
    plotOptions: {
        column: {
            depth: 25,
			color: 'green',
        }
    },
    xAxis: {
		categories: [<?php echo $r5['defect'];?>],
        labels: {
            skew3d: true,
            style: {
                fontSize: '10px',
            }
        }
    },
    yAxis: {
        title: {
            text: 'Persentase'
        }
    },
    series: [{
        name: 'Masalah Dominan',
        data: [<?php echo $r5['jml']; ?>],
		dataLabels: {
                enabled: true,
                format: '{point.y:.2f}%',
				style: {
                fontSize: '10px',
                fontFamily: 'Arial, sans-serif'
            }
            }
    }]
});

Highcharts.chart('container4', {
    chart: {
        type: 'column',        
    },
    title: {
        text: 'Masalah Dominan'
    },
    subtitle: {
        text: '<?php echo $tglAwal." s/d ".$tglAkhir;?>'
    },
    plotOptions: {
        column: {
            depth: 25,
			color: 'blue',
        }
    },
    xAxis: {
		categories: [<?php echo $r6['defect'];?>],
        labels: {
            skew3d: true,
            style: {
                fontSize: '10px',
            }
        }
    },
    yAxis: {
        title: {
            text: 'Persentase'
        }
    },
    series: [{
        name: 'Masalah Dominan',
        data: [<?php echo $r6['jml']; ?>],
		dataLabels: {
                enabled: true,
                format: '{point.y:.2f}%',
				style: {
                fontSize: '10px',
                fontFamily: 'Arial, sans-serif'
            }
            }
    }]
});
Highcharts.chart('container5', {
    chart: {
        type: 'column',        
    },
    title: {
        text: 'Dept'
    },
    subtitle: {
        text: '<?php echo $tglAwal." s/d ".$tglAkhir;?>'
    },
    plotOptions: {
        column: {
            depth: 25,
			color: 'blue',
        }
    },
    xAxis: {
		categories: [<?php echo $r7['dept'];?>],
        labels: {
            skew3d: true,
            style: {
                fontSize: '10px',
            }
        }
    },
    yAxis: {
        title: {
            text: 'Persentase'
        }
    },
    series: [{
        name: 'Dept',
        data: [<?php echo $r7['jml']; ?>],
		dataLabels: {
                enabled: true,
                format: '{point.y:.2f}%',
				style: {
                fontSize: '10px',
                fontFamily: 'Arial, sans-serif'
            }
            }
    }]
});
		</script>