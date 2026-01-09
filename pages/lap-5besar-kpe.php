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
$Status		= isset($_POST['status']) ? $_POST['status'] : '';
$Sts_check		= isset($_POST['sts_check']) ? $_POST['sts_check'] : '';

switch ($Status) {
    case 'Lolos QC': $WStatus = " AND sts = '1' "; break;
    case 'Disposisi QC': $WStatus = " AND sts_disposisiqc = '1' "; break;
    case 'Disposisi Produksi': $WStatus = " AND sts_disposisipro = '1' "; break;
    default: $WStatus = ""; break;
}

$WCheck = $Sts_check != "" ? " AND sts_check = '$Sts_check' " : '';

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
                <!-- <div class="col-sm-2">
                <div class="input-group date">
                    <div class="input-group-addon"> Total Lot Kirim</div>
                    <input name="totallot" type="text" class="form-control pull-right" id="totallot" placeholder="0" value="<?php echo $TotalLot; ?>" />
                </div>
                </div> -->
                <div class="col-sm-2">
                    <div class="input-group date">
                        <div class="input-group-addon"> Langganan</div>
                        <input name="langganan" type="text" class="form-control pull-right" placeholder="Langganan" value="<?php echo $Langganan; ?>" />
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="input-group">
                        <div class="input-group-addon"> Status</div>
                        <select class="form-control select2" name="status" id="status">
                            <option value="">Pilih</option>
                            <?php
                            $status = ["Lolos QC", "Disposisi QC", "Disposisi Produksi"];
                            foreach ($status as $value) {
                                ?>
                                <option value="<?= $value ?>" <?= $Status == $value ? 'selected' : '' ?>><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="input-group">
                        <div class="input-group-addon"> Status Check</div>
                        <select class="form-control select2" name="sts_check" id="sts_check">
                            <option value="">Pilih</option>
                            <option value="Ceklis" <?= $Sts_check == "Ceklis" ? 'selected' : '' ?>>&#10004;</option>
                            <option value="Silang" <?= $Sts_check == "Silang" ? 'selected' : '' ?>>X</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-2" style="margin-top: 1rem">
                    <div class="input-group"></div>
                        <button type="submit" class="btn btn-success " name="cari"><i class="fa fa-search"></i> Cari Data</button>
                    </div>
                </div>
                
                <!-- /.input group -->
            <!-- /.box-body -->
            <div class="box-footer">
            </div>
            <!-- /.box-footer -->

            </div>
        </form>
        </div>
        <!--Section 2 -->
        <div class="row">
            <div class="col-xs-6">	
                <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> 5 Langganan Terbesar KPE</h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                <table class="table table-bordered table-striped" style="width: 100%;">
                        <thead class="bg-blue">
                            <tr>
                            <th width="5%"><div align="center">No</div></th>
                            <th width="25%"><div align="center">Langganan</div></th>
                            <th width="10%"><div align="center">Jumlah Kasus</div></th>
                            <th width="10%"><div align="center">Qty Keluhan (KG)</div></th>
                            <th width="10%"><div align="center">% Dibandingkan total keluhan</div></th>
                            <th width="15%"><div align="center">% Dibandingkan Total Kirim</div></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no1=1;
                        $total1=0;
                        $totaldll=0;
                        // $totalLot=0;
                        $qryAll=mysqli_query($con,"SELECT COUNT(*) AS jml_all, SUM(qty_claim) AS qty_claim_all FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $WCheck $WStatus AND (bprc IS NULL OR bprc = '')");
                        $rAll=mysqli_fetch_array($qryAll);
                        $qrylgn=mysqli_query($con,"SELECT COUNT(*) AS jml, SUM(qty_claim) AS qty_claim_lgn, SUM(qty_lolos) as qty_lolos_qc, ROUND(COUNT(pelanggan)/(SELECT COUNT(*) FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir')*100,1) AS persen,
                        pelanggan,
                        langganan
                        FROM
                        `tbl_aftersales_now`
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir'
                        $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                        GROUP BY langganan
                        ORDER BY qty_claim_lgn DESC LIMIT 5");
                        while($r=mysqli_fetch_array($qrylgn)){
                            $qryJumlahKasus = mysqli_query($con, "SELECT
                                                                        count(*) as jumlah_kasus
                                                                    from (
                                                                        select
                                                                        *
                                                                        from
                                                                        tbl_aftersales_now
                                                                    where
                                                                        langganan like '%$r[langganan]%'
                                                                            AND tgl_buat BETWEEN '$Awal' AND '$Akhir'
                                                                            $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                                    group by
                                                                        po,
                                                                        no_hanger,
                                                                        warna,
                                                                        masalah_dominan,
                                                                        qty_order,
                                                                        langganan
                                                                    order by
                                                                        tgl_buat asc
                                                                    ) temp");
                            $rowQryJumlahKasus = mysqli_fetch_array($qryJumlahKasus);
                        ?>
                        <tr valign="top">
                            <td align="center"><?php echo $no1; ?></td>
                            <td align="left"><?php echo explode('/', $r['langganan'])[0];?></td>
                            <td align="right"><?php echo $rowQryJumlahKasus['jumlah_kasus'] ; ?></td>
                            <td align="right"><?php echo $Status === 'Lolos QC' ? $r['qty_lolos_qc'] : $r['qty_claim_lgn']; ?></td>
                            <td align="right"><?php if($TotalKirim!=""){echo number_format(($r['qty_claim_lgn']/(int)$rAll['qty_claim_all'])*100,2)." %";}else{echo "0 %";}?></td>
                            <td align="right"><?php if($TotalKirim!=""){echo number_format(($r['qty_claim_lgn']/(int)$TotalKirim)*100,2)." %";}else{echo "0 %";}?></td>
                        </tr>
                        <?php	$no1++;  
                        $total1=$total1+$r['qty_claim_lgn'];
                        // $totalLot += $r['jml'];
                        }
                        $totaldll=$rAll['qty_claim_all']-$total1; ?>
                        </tbody>
                        <tfoot>
                            <tr valign="top">
                            <td align="center" colspan="2"><strong>DLL</strong></td>
                            <td align="right"><strong><?= ''//$totalLot ?></strong></td>
                            <td align="right"><strong><?php echo number_format($totaldll,2); ?></strong></td>
                            <td align="right"><strong><?php if($TotalKirim!="" && $rAll['qty_claim_all'] > 0){echo number_format(($totaldll/(int)$rAll['qty_claim_all'])*100,2)." %";}else{echo "0 %";} ?></strong></td>
                            <td align="right"><strong><?php if($TotalKirim!=""){echo number_format(($totaldll/(int)$TotalKirim)*100,2)." %";}else{echo "0 %";} ?></strong></td>
                            </tr>
                            <tr valign="top">
                            <td align="center" colspan="2"><strong>TOTAL KIRIM</strong></td>
                            <td align="center"></td>
                            <td align="right"><strong><?php if($TotalKirim!=""){echo number_format($TotalKirim,2);}else{echo "0";} ?></strong></td>
                            <td align="right">&nbsp;</td>
                            </tr>
                        </tfoot>
                </table>
                <div class="box-footer">
                        <a href="pages/cetak/excel_5besar_langganan1.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xs-6">	
                <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> 5 Masalah Terbesar KPE</h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                <table class="table table-bordered table-striped" style="width: 100%;">
                        <thead class="bg-blue">
                            <tr>
                            <th width="5%"><div align="center">No</div></th>
                            <th width="25%"><div align="center">Defect</div></th>
                            <th width="14%"><div align="center">Jumlah Kasus</div></th>
                            <th width="14%"><div align="center">Qty Keluhan (KG)</div></th>
                            <th width="15%"><div align="center">% Dibandingkan Total Keluhan</div></th>
                            <th width="15%"><div align="center">% Dibandingkan Total Kirim</div></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no2=1;
                        $totald=0;
                        $totaldll2=0;
                        $qryAll2=mysqli_query($con,"SELECT COUNT(*) AS jml_all, SUM(qty_claim) AS qty_claim_all FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $WCheck $WStatus AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND (bprc IS NULL OR bprc = '')");
                        $rAll2=mysqli_fetch_array($qryAll2);
                        $lgn = $Langganan != "" ? " and buyer like '%$Langganan%'" : "";
                        $qrydef=mysqli_query($con,"SELECT
                                                        temp.masalah_dominan,
                                                        count(*) as jml_kasus,
                                                        SUM(temp.qty_claim_gabung) as qty_claim_lgn,
                                                        SUM(qty_lolos) as qty_lolos_qc
                                                    from
                                                        (
                                                        select
                                                            *,
                                                            sum(qty_claim) as qty_claim_gabung
                                                        from
                                                            tbl_aftersales_now
                                                        where
                                                            tgl_buat between '$Awal' AND '$Akhir' $lgn
                                                            $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                        group by
                                                            po,
                                                            no_hanger,
                                                            warna,
                                                            masalah_dominan,
                                                            qty_order
                                                        order by
                                                            tgl_buat asc) temp
                                                    group by 
                                                        temp.masalah_dominan
                                                    order by
                                                        qty_claim_lgn desc
                                                    limit 5");
                        while($rd=mysqli_fetch_array($qrydef)){
                        ?>
                        <tr valign="top">
                            <td align="center"><?php echo $no2 ?></td>
                            <td align="left"><?php echo $rd['masalah_dominan'];?></td>
                            <td align="right"><?php echo $rd['jml_kasus'];?></td>
                            <td align="right"><?php echo $Status === 'Lolos QC' ? $rd['qty_lolos_qc'] : $rd['qty_claim_lgn']; ?></td>
                            <td align="right"><?php echo number_format(($rd['qty_claim_lgn']/$rAll2['qty_claim_all'])*100,2)." %";?></td>
                            <td align="right"><?php echo number_format(($rd['qty_claim_lgn']/$TotalKirim)*100,2)." %";?></td>
                        </tr>
                        <?php	$no2++;  
                        $totald=$totald+$rd['qty_claim_lgn'];
                        } 
                        $totaldll2=$rAll2['qty_claim_all']-$totald; ?>
                        </tbody>
                        <tfoot>
                            <tr valign="top">
                            <td align="center" colspan="2"><strong>DLL</strong></td>
                            <td align="center"></td>
                            <td align="right"><strong><?php echo number_format($totaldll2,2); ?></strong></td>
                            <td align="right"><strong><?php if($TotalKirim!="" && $rAll2['qty_claim_all'] > 0){echo number_format(($totaldll2/$rAll2['qty_claim_all'])*100,2)." %";}else{echo "0 %";} ?></strong></td>
                            <td align="right"><strong><?php if($TotalKirim!=""){echo number_format(($totaldll2/$TotalKirim)*100,2)." %";}else{echo "0 %";} ?></strong></td>
                            </tr>
                            <tr valign="top">
                            <td align="center" colspan="2"><strong>TOTAL KIRIM</strong></td>
                            <td align="center"></td>
                            <td align="right"><strong><?php if($TotalKirim!=""){echo number_format($TotalKirim,2);}else{echo "0";} ?></strong></td>
                            <td align="right">&nbsp;</td>
                            </tr>
                        </tfoot>
                </table>
                <div class="box-footer">
                        <a href="pages/cetak/excel_5besar_defect1.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                    </div>
                </div>
                </div>
            </div>
        </div>

    <!--Section 2 -->
    <!-- <div class="row">
        <div class="col-xs-6">	
            <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> 5 Langganan Terbesar KPE</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
            <table class="table table-bordered table-striped" style="width: 100%;">
                    <thead class="bg-blue">
                        <tr>
                        <th width="5%"><div align="center">No</div></th>
                        <th width="25%"><div align="center">Langganan</div></th>
                        <th width="10%"><div align="center">Jumlah Kasus</div></th>
                        <th width="15%"><div align="center">% Dibandingkan Total Kasus</div></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no3=1;
                    $totalcase=0;
                    $totaldll3=0;
                    $qryAll=mysqli_query($con,"SELECT COUNT(*) AS jml_all, SUM(qty_claim) AS qty_claim_all FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '')");
                    $rAll=mysqli_fetch_array($qryAll);
                    $qrylgn=mysqli_query($con,"SELECT COUNT(*) AS jml, ROUND(COUNT(pelanggan)/(SELECT COUNT(*) FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = ''))*100,1) AS persen,
                    pelanggan
                    FROM
                    `tbl_aftersales_now`
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '')
                    GROUP BY pelanggan
                    ORDER BY jml DESC LIMIT 5");
                    while($r=mysqli_fetch_array($qrylgn)){
                    //$qrycase=mysqli_query("SELECT SUM(qty_claim) AS qty_claim_lgn FROM tbl_aftersales_now WHERE tgl_buat BETWEEN '$Awal' AND '$Akhir' AND 
                    //langganan='$r[langganan]'");
                    //$r1=mysqli_fetch_array($qrycase);
                    ?>
                    <tr valign="top">
                        <td align="center"><?php echo $no3; ?></td>
                        <td align="left"><?php echo $r['pelanggan'];?></td>
                        <td align="right"><?php echo $r['jml']; ?></td>
                        <td align="right"><?php if($TotalLot!=""){echo number_format(($r['jml']/$TotalLot)*100,2)." %";}else{echo "0 %";}?></td>
                    </tr>
                    <?php	$no3++;  
                    $totalcase=$totalcase+$r['jml'];
                    } 
                    $totaldll3=$rAll['jml_all']-$totalcase;?>
                    </tbody>
                    <tfoot>
                        <tr valign="top">
                        <td align="center" colspan="2"><strong>DLL</strong></td>
                        <td align="right"><strong><?php echo $totaldll3; ?></strong></td>
                        <td align="right"><strong><?php if($TotalLot!=""){echo number_format(($totaldll3/$TotalLot)*100,2)." %";}else{echo "0 %";} ?></strong></td>
                        </tr>
                        <tr valign="top">
                        <td align="center" colspan="2"><strong>TOTAL LOT KIRIM</td>
                        <td align="right"><strong><?php if($TotalLot!=""){echo $TotalLot;}else{echo "0";} ?></strong></td>
                        <td align="right">&nbsp;</strong></td>
                        </tr>
                    </tfoot>
            </table>
            <div class="box-footer">
                    <a href="pages/cetak/excel_5besar_langganan.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&totallot=<?php echo $_POST['totallot']; ?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank" onclick="return cekLot();"><i class="fa fa-file-excel-o"></i></a>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xs-6">	
            <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> 5 Masalah Terbesar KPE</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
            <table class="table table-bordered table-striped" style="width: 100%;">
                    <thead class="bg-blue">
                        <tr>
                        <th width="5%"><div align="center">No</div></th>
                        <th width="25%"><div align="center">Defect</div></th>
                        <th width="10%"><div align="center">Jumlah Kasus</div></th>
                        <th width="15%"><div align="center">% Dibandingkan Total Kasus</div></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no4=1;
                    $totalcased=0;
                    $totaldll4=0;
                    $qryAll1=mysqli_query($con,"SELECT COUNT(*) AS jml_all FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND (bprc IS NULL OR bprc = '')");
                    $rAll1=mysqli_fetch_array($qryAll1);
                    $qrydef=mysqli_query($con,"SELECT COUNT(*) AS jml, ROUND(COUNT(masalah_dominan)/(SELECT COUNT(*) FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
                    AND (masalah_dominan!='' OR masalah_dominan!=NULL AND (bprc IS NULL OR bprc = '')))*100,1) AS persen,
                    masalah_dominan
                    FROM
                    `tbl_aftersales_now`
                    WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND (bprc IS NULL OR bprc = '')
                    GROUP BY masalah_dominan
                    ORDER BY jml DESC LIMIT 5");
                    while($rd=mysqli_fetch_array($qrydef)){
                    //$qrycased=mysqli_query("SELECT SUM(qty_claim) AS qty_claim_lgn FROM tbl_aftersales_now WHERE tgl_buat BETWEEN '$Awal' AND '$Akhir' AND 
                    //masalah_dominan='$rd[masalah_dominan]'");
                    //$r2=mysqli_fetch_array($qrycased);
                    ?>
                    <tr valign="top">
                        <td align="center"><?php echo $no4; ?></td>
                        <td align="left"><?php echo $rd['masalah_dominan'];?></td>
                        <td align="right"><?php echo $rd['jml']; ?></td>
                        <td align="right"><?php if($TotalLot!=""){echo number_format(($rd['jml']/$TotalLot)*100,2)." %";}else{echo "0 %";}?></td>
                    </tr>
                    <?php	$no4++;  
                    $totalcased=$totalcased+$rd['jml'];
                    } 
                    $totaldll4=$rAll1['jml_all']-$totalcased;?>
                    </tbody>
                    <tfoot>
                        <tr valign="top">
                        <td align="center" colspan="2"><strong>DLL</strong></td>
                        <td align="right"><strong><?php echo $totaldll4; ?></strong></td>
                        <td align="right"><strong><?php if($TotalLot!=""){echo number_format(($totaldll4/$TotalLot)*100,2)." %";}else{echo "0 %";} ?></strong></td>
                        </tr>
                        <tr valign="top">
                        <td align="center" colspan="2"><strong>TOTAL LOT KIRIM</td>
                        <td align="right"><strong><?php if($TotalLot!=""){echo $TotalLot;}else{echo "0";} ?></strong></td>
                        <td align="right">&nbsp;</strong></td>
                        </tr>
                    </tfoot>
            </table>
            <div class="box-footer">
                    <a href="pages/cetak/excel_5besar_defect.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&totallot=<?php echo $_POST['totallot']; ?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank" onclick="return cekLot();"><i class="fa fa-file-excel-o"></i></a>
                </div>
            </div>
            </div>
        </div>
    </div> -->

    <!-- Section 3 -->
    <div class="row">
        <div class="col-xs-6">	
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> 5 Masalah Terbesar Lululemon</h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                <table class="table table-bordered table-striped" style="width: 100%;">
                        <thead class="bg-blue">
                            <tr>
                            <th width="5%"><div align="center">No</div></th>
                            <th width="25%"><div align="center">Defect</div></th>
                            <th width="14%"><div align="center">Qty Keluhan (KG)</div></th>
                            <th width="15%"><div align="center">% Dibandingkan Total Kirim</div></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no5=1;
                        $totald5=0;
                        $totaldll5=0;
                        $qryAll5=mysqli_query($con,"SELECT COUNT(*) AS jml_all, SUM(qty_claim) AS qty_claim_all FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND langganan LIKE '%lululemon%' $WCheck $WStatus AND (bprc IS NULL OR bprc = '')");
                        $rAll5=mysqli_fetch_array($qryAll5);
                        $qrydef5=mysqli_query($con,"SELECT SUM(qty_claim) AS qty_claim_lgn, SUM(qty_lolos) as qty_lolos_qc, ROUND(COUNT(masalah_dominan)/(SELECT COUNT(*) FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '')
                        AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND langganan LIKE '%lululemon%')*100,1) AS persen,
                        masalah_dominan
                        FROM
                        `tbl_aftersales_now`
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND langganan LIKE '%lululemon%'
                        $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                        GROUP BY masalah_dominan
                        ORDER BY qty_claim_lgn DESC LIMIT 5");
                        while($rd5=mysqli_fetch_array($qrydef5)){
                        ?>
                        <tr valign="top">
                            <td align="center"><?php echo $no5; ?></td>
                            <td align="left"><?php echo $rd5['masalah_dominan'];?></td>
                            <td align="right"><?php echo $Status === 'Lolos QC' ? $rd5['qty_lolos_qc'] : $rd5['qty_claim_lgn']; ?></td>
                            <td align="right"><?php if($TotalKirim!=""){echo number_format(($rd5['qty_claim_lgn']/$TotalKirim)*100,2)." %";}else{echo "0 %";}?></td>
                        </tr>
                        <?php	$no5++;  
                        $totald5=$totald5+$rd5['qty_claim_lgn'];
                        } 
                        $totaldll5=$rAll5['qty_claim_all']-$totald5; ?>
                        </tbody>
                        <tfoot>
                            <tr valign="top">
                            <td align="center" colspan="2"><strong>DLL</strong></td>
                            <td align="right"><strong><?php echo number_format($totaldll5,2); ?></strong></td>
                            <td align="right"><strong><?php if($TotalKirim!=""){echo number_format(($totaldll5/$TotalKirim)*100,2)." %";}else{echo "0 %";} ?></strong></td>
                            </tr>
                            <tr valign="top">
                            <td align="center" colspan="2"><strong>TOTAL KIRIM</strong></td>
                            <td align="right"><strong><?php if($TotalKirim!=""){echo number_format($TotalKirim,2);}else{echo "0";} ?></strong></td>
                            <td align="right">&nbsp;</td>
                            </tr>
                        </tfoot>
                </table>
                <div class="box-footer">
                        <a href="pages/cetak/excel_5besar_defectlululemon.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">	
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> Dept Penyebab KPE</h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                <table class="table table-bordered table-striped" id="table-lap-5besar-kpe" style="width: 100%;">
                        <thead class="bg-blue">
                            <tr>
                            <th width="5%"><div align="center">No</div></th>
                            <th width="25%"><div align="center">Dept</div></th>
                            <!-- <th width="14%"><div align="center">Jumlah Kasus</div></th> -->
                            <th width="14%"><div align="center">Qty Keluhan (KG)</div></th>
                            <th width="15%"><div align="center">% Dibandingkan Total Keluhan</div></th>
                            <th width="15%"><div align="center">% Dibandingkan Total Kirim</div></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                         
                        $no6=1;
                        $totald6=0;
                        $totaldll6=0;
                        $qryAll6=mysqli_query($con,"SELECT COUNT(*) AS jml_all, SUM(qty_claim) AS qty_claim_all FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (t_jawab!='' OR t_jawab!=NULL) $WCheck $WStatus AND (bprc IS NULL OR bprc = '')");
                        $rAll6=mysqli_fetch_array($qryAll6);
                        $qrydef6=mysqli_query($con,"SELECT a.t_jawab, SUM(a.qty_claim_dept) as qty_claim_dept, SUM(a.qty_lolos_qc) as qty_lolos_qc, SUM(a.jml_tjawab) as jml_tjawab
                        from
                        (SELECT 
                        t_jawab,
                        SUM(IF(t_jawab2!='',qty_claim/3,IF(t_jawab1!='',qty_claim/2,qty_claim))) AS qty_claim_dept,
                        SUM(if(t_jawab2 != '', qty_lolos / 3, if(t_jawab1 != '', qty_lolos / 2, qty_lolos))) as qty_lolos_qc,
                        COUNT(*) as jml_tjawab
                        FROM
                        db_qc.`tbl_aftersales_now`
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (t_jawab!='' OR t_jawab!=NULL) $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                        GROUP BY t_jawab
                        union distinct 
                        select t_jawab1, 
                        SUM(IF(t_jawab2!='',qty_claim/3,IF(t_jawab1!='',qty_claim/2,qty_claim))) AS qty_claim_dept,
                        SUM(if(t_jawab2 != '', qty_lolos / 3, if(t_jawab1 != '', qty_lolos / 2, qty_lolos))) as qty_lolos_qc,
                        COUNT(*) as jml_tjawab1
                        FROM
                        db_qc.`tbl_aftersales_now`
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (t_jawab1!='' OR t_jawab1!=NULL) $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                        GROUP BY t_jawab1
                        union distinct
                        select t_jawab2, 
                        SUM(IF(t_jawab2!='',qty_claim/3,IF(t_jawab1!='',qty_claim/2,qty_claim))) AS qty_claim_dept,
                        SUM(if(t_jawab2 != '', qty_lolos / 3, if(t_jawab1 != '', qty_lolos / 2, qty_lolos))) as qty_lolos_qc,
                        COUNT(*) as jml_tjawab2
                        FROM
                        db_qc.`tbl_aftersales_now`
                        WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (t_jawab2!='' OR t_jawab2!=NULL) $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                        GROUP BY t_jawab2) a
                        group by a.t_jawab
                        ORDER BY qty_claim_dept DESC");
                        while($rd6=mysqli_fetch_array($qrydef6)){
                        ?>
                        <tr valign="top">
                            <td align="center"><?php echo $no6; ?></td>
                            <td align="left"><?php echo $rd6['t_jawab'];?></td>
                            <!-- <td align="right"><?php echo $rd6['jml_tjawab'];?></td> -->
                            <td align="right"><?php echo $Status === 'Lolos QC' ? number_format($rd6['qty_lolos_qc'], 2) : number_format($rd6['qty_claim_dept'], 2);?></td>
                            <td align="right"><?php if($TotalKirim!=""){echo number_format(($rd6['qty_claim_dept']/$rAll6['qty_claim_all'])*100,2)." %";}else{echo "0 %";}?></td>
                            <td align="right"><?php if($TotalKirim!=""){echo number_format(($rd6['qty_claim_dept']/$TotalKirim)*100,2)." %";}else{echo "0 %";}?></td>
                        </tr>
                        <?php	$no6++;  
                        $totald6=$totald6+$rd6['qty_claim_dept'];
                        } 
                        $totaldll6=$rAll6['qty_claim_all']-$totald6; ?>
                        </tbody>
                        <tfoot>
                            <!-- <tr valign="top">
                            <td align="center" colspan="2"><strong>DLL</strong></td>
                            <td align="right"><strong><?php echo number_format($totaldll6,2); ?></strong></td>
                            <td align="right"><strong><?php if($TotalKirim!=""){echo number_format(($totaldll6/$TotalKirim)*100,2)." %";}else{echo "0 %";} ?></strong></td>
                            </tr> -->
                            <tr valign="top">
                            <td align="center" colspan="2"><strong>TOTAL KIRIM</strong></td>
                            <td align="right"><strong><?php if($TotalKirim!=""){echo number_format($TotalKirim,2);}else{echo "0";} ?></strong></td>
                            <td align="right"><strong></strong></td>
                            <td align="right">&nbsp;</td>
                            </tr>
                        </tfoot>
                </table>
                <div class="box-footer">
                        <a href="pages/cetak/excel_5besar_deptpenyebab.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $_POST['total']; ?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
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
                            <th width="20%"><div align="center">Jumlah Kasus</div></th>
                            <th width="14%"><div align="center">KG</div></th>
                            <th width="15%"><div align="center">% Dibandingkan Total Keluhan</div></th>
                            <th width="15%"><div align="center">% Dibandingkan Total Kirim</div></th>
                            <th width="15%"><div align="center">% Masalah Per Hanger</div></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if($Langganan!=''){$lgn=" AND langganan LIKE '%$Langganan%' ";}else{$lgn="";}
                        $qry7Total5 = mysqli_query($con, "SELECT
                                                                temp.no_hanger,
                                                                count(*) as jml_kasus
                                                            from
                                                                (
                                                                select
                                                                    *
                                                                from
                                                                    tbl_aftersales_now
                                                                where
                                                                    tgl_buat between '$Awal' AND '$Akhir' $lgn
                                                                    $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                                group by
                                                                    po,
                                                                    no_hanger,
                                                                    warna,
                                                                    masalah_dominan,
                                                                    qty_order
                                                                order by
                                                                    tgl_buat asc) temp
                                                            group by 
                                                                temp.no_hanger
                                                            order by
                                                                jml_kasus desc
                                                            limit 5");
                        $ri7Total = 0;
                        while($ri7Total5 = mysqli_fetch_array($qry7Total5)) {
                            $qry7Total3 = mysqli_query($con, "SELECT
                                                                    sum(temp2.qty_keluhan) as total_qty_keluhan
                                                                from (
                                                                select
                                                                    temp.masalah_dominan,
                                                                    sum(temp.qty_claim_gabung) as qty_keluhan
                                                                from
                                                                    (
                                                                    select
                                                                        *,
                                                                        sum(qty_claim) as qty_claim_gabung
                                                                    from
                                                                        tbl_aftersales_now
                                                                    where
                                                                        no_hanger = '$ri7Total5[no_hanger]'
                                                                        and tgl_buat between '$Awal' AND '$Akhir' $lgn
                                                                        $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                                    group by
                                                                        po,
                                                                        no_hanger,
                                                                        warna,
                                                                        masalah_dominan,
                                                                        qty_order
                                                                    order by
                                                                        tgl_buat asc) temp
                                                                group by 
                                                                    temp.masalah_dominan
                                                                order by
                                                                    qty_keluhan desc
                                                                limit 3) temp2");
                            $ri7Total3 = mysqli_fetch_array($qry7Total3);
                            $ri7Total += $ri7Total3['total_qty_keluhan'];
                        }

                        $qry7=mysqli_query($con,"SELECT
                                                    temp.no_hanger,
                                                    count(*) as jml_kasus
                                                from
                                                    (
                                                    select
                                                        *
                                                    from
                                                        tbl_aftersales_now
                                                    where
                                                        tgl_buat between '$Awal' AND '$Akhir' $lgn
                                                        $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                    group by
                                                        po,
                                                        no_hanger,
                                                        warna,
                                                        masalah_dominan,
                                                        qty_order
                                                    order by
                                                        tgl_buat asc) temp
                                                group by 
                                                    temp.no_hanger
                                                order by
                                                    jml_kasus desc
                                                limit 5");
                        while($ri7=mysqli_fetch_array($qry7)){
                            $qryd7=mysqli_query($con,"SELECT
                                                            temp.masalah_dominan,
                                                            sum(temp.qty_claim_gabung) as qty_keluhan,
                                                            sum(temp.qty_lolos_qc) as qty_lolos,
                                                            count(*) as jml_kasus 
                                                        from
                                                            (
                                                            select
                                                                *,
                                                                sum(qty_claim) as qty_claim_gabung,
                                                                sum(qty_lolos) as qty_lolos_qc
                                                            from
                                                                tbl_aftersales_now
                                                            where
                                                                no_hanger = '$ri7[no_hanger]'
                                                                and tgl_buat between '$Awal' AND '$Akhir' $lgn
                                                                $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                            group by
                                                                po,
                                                                no_hanger,
                                                                warna,
                                                                masalah_dominan,
                                                                qty_order
                                                            order by
                                                                tgl_buat asc) temp
                                                        group by 
                                                            temp.masalah_dominan
                                                        order by
                                                            qty_keluhan desc
                                                        limit 3");
                            $qrytitem=mysqli_query($con,"SELECT
                                                            sum(temp2.qty_keluhan) as total_qty_keluhan
                                                        from (
                                                        select
                                                            temp.masalah_dominan,
                                                            sum(temp.qty_claim_gabung) as qty_keluhan
                                                        from
                                                            (
                                                            select
                                                                *,
                                                                sum(qty_claim) as qty_claim_gabung
                                                            from
                                                                tbl_aftersales_now
                                                            where
                                                                no_hanger = '$ri7[no_hanger]'
                                                                and tgl_buat between '$Awal' AND '$Akhir' $lgn
                                                                $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                            group by
                                                                po,
                                                                no_hanger,
                                                                warna,
                                                                masalah_dominan,
                                                                qty_order
                                                            order by
                                                                tgl_buat asc) temp
                                                        group by 
                                                            temp.masalah_dominan
                                                        order by
                                                            qty_keluhan desc
                                                        limit 3) temp2");
                            $ritem=mysqli_fetch_array($qrytitem);
                            while($rdi7=mysqli_fetch_array($qryd7)){
                        ?>
                        <tr valign="top">
                            <td align="center"><?php echo $ri7['no_hanger'];?></td>  
                            <td align="right"><?php echo $rdi7['masalah_dominan'];?></td>
                            <td align="right"><?php echo $rdi7['jml_kasus'];?></td>
                            <td align="right"><?php echo $Status === 'Lolos QC' ? $rdi7['qty_lolos'] : $rdi7['qty_keluhan'];?></td>
                            <td align="right"><?php if($TotalKirim!=''){echo number_format(($rdi7['qty_keluhan']/$ri7Total)*100,2)." %";}else{echo "0";}?></td>
                            <td align="right"><?php if($TotalKirim!=''){echo number_format(($rdi7['qty_keluhan']/$TotalKirim)*100,2)." %";}else{echo "0";}?></td>
                            <td align="right"><?php if($TotalKirim!=''){echo number_format(($rdi7['qty_keluhan']/$ritem['total_qty_keluhan'])*100,2)." %";}else{echo "0";}?></td>
                        </tr>
                        <?php  
                            }
                        } 
                        ?>
                        </tbody>
                        <tfoot>
                            <tr valign="top">
                                <td align="center" colspan="1"><strong>TOTAL KIRIM</strong></td>
                                <td align="right" colspan="1"><strong><?php if($TotalKirim!=""){echo number_format($TotalKirim,2);}else{echo "0";} ?></strong></td>
                            </tr>
                        </tfoot>
                </table>
                <div class="box-footer">
                        <a href="pages/cetak/excel_3besar_masalah_item.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&langganan=<?php echo $_POST['langganan']; ?>&kirim=<?php echo $TotalKirim; ?>&totalk=<?=$ri7Total?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">	
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> 5 Buyer Terbesar KPE : <?php echo $Awal." s/d ".$Akhir;?></h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                <table class="table table-bordered table-striped" style="width: 100%;">
                        <thead class="bg-blue">
                            <tr>
                            <th width="15%"><div align="center">No</div></th>
                            <th width="20%"><div align="center">Brand/Buyer</div></th>
                            <th width="14%"><div align="center">Jumlah Kasus</div></th>
                            <th width="14%"><div align="center">Qty Keluhan (KG)</div></th>
                            <th width="15%"><div align="center">% Dibandingkan Total Keluhan</div></th>
                            <th width="15%"><div align="center">% Dibandingkan Total Kirim</div></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $qry8Total = mysqli_query($con, "SELECT
                                                            sum(temp2.qty_claim_gabung) as total_qty_claim
                                                        from
                                                            (
                                                            select
                                                                temp.buyer,
                                                                count(*) as jml_kasus,
                                                                SUM(temp.qty_claim_gabung) as qty_claim_gabung
                                                            from
                                                                (
                                                                select
                                                                    *,
                                                                    sum(qty_claim) as qty_claim_gabung
                                                                from
                                                                    tbl_aftersales_now
                                                                where
                                                                    tgl_buat between '$Awal' AND '$Akhir'
                                                                    $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                                group by
                                                                    po,
                                                                    no_hanger,
                                                                    warna,
                                                                    masalah_dominan,
                                                                    qty_order
                                                                order by
                                                                    tgl_buat asc) temp
                                                            group by
                                                                substring_index(temp.buyer, ' ', 1)
                                                            order by
                                                                jml_kasus desc
                                                            limit 5) temp2");
                        $ri8Total=mysqli_fetch_array($qry8Total);
                        $qry8=mysqli_query($con,"SELECT
                                                    temp.buyer,
                                                    count(*) as jml_kasus,
                                                    SUM(temp.qty_claim_gabung) as qty_claim_lgn,
                                                    SUM(temp.qty_lolos_qc) as qty_lolos_qc
                                                from
                                                    (
                                                    select
                                                        *,
                                                        sum(qty_claim) as qty_claim_gabung,
                                                        sum(qty_lolos) as qty_lolos_qc
                                                    from
                                                        tbl_aftersales_now
                                                    where
                                                        tgl_buat between '$Awal' AND '$Akhir'
                                                        $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                    group by
                                                        po,
                                                        no_hanger,
                                                        warna,
                                                        masalah_dominan,
                                                        qty_order
                                                    order by
                                                        tgl_buat asc) temp
                                                group by 
                                                    substring_index(temp.buyer, ' ', 1)
                                                order by
                                                    qty_claim_lgn desc
                                                limit 5");
                        $no=1;
                        while($ri8=mysqli_fetch_array($qry8)){
                        ?>
                        <tr valign="top">
                            <td align="center"><?= $no++ ?></td>  
                            <td align="right"><?= $ri8['buyer'] ?></td>
                            <td align="right"><?= $ri8['jml_kasus'] ?></td>
                            <td align="right"><?= $Status === 'Lolos QC' ? $ri8['qty_lolos_qc'] : $ri8['qty_claim_lgn'] ?></td>
                            <td align="right"><?php if($TotalKirim!=''){echo number_format(($ri8['qty_claim_lgn'] / $ri8Total['total_qty_claim']) * 100, 2). " %";}else{echo "0";} ?></td>
                            <td align="right"><?php if($TotalKirim!=''){echo number_format(($ri8['qty_claim_lgn']/$TotalKirim)*100,2)." %";}else{echo "0";} ?></td>
                        </tr>
                        <?php  
                        } 
                        ?>
                        </tbody>
                        <tfoot>
                            <tr valign="top">
                                <td align="right" colspan="2"><strong>TOTAL KIRIM</strong></td>
                                <td align="right" colspan="1"><strong><?php if($TotalKirim!=""){echo number_format($TotalKirim,2);}else{echo "0";} ?></strong></td>
                            </tr>
                        </tfoot>
                </table>
                <div class="box-footer">
                        <a href="pages/cetak/excel_5besar_buyer.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $TotalKirim; ?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-xs-6">	
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> 4 Kategori KPE</h3>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                <table class="table table-bordered table-striped" style="width: 100%;">
                    <thead class="bg-blue">
                        <tr>
                        <th width="15%"><div align="center">No</div></th>
                        <th width="20%"><div align="center">Kategori</div></th>
                        <th width="14%"><div align="center">Jumlah Kasus</div></th>
                        <th width="14%"><div align="center">Qty Keluhan (KG)</div></th>
                        <th width="15%"><div align="center">% Dibandingkan Total Keluhan</div></th>
                        <th width="15%"><div align="center">% Dibandingkan Total Kirim</div></th>
                        </tr>
                    </thead>

                    <?php 
                    if($Awal!=""){
                        $query4Kategori = mysqli_query($con, "SELECT
                                                                    a.*,
                                                                    sum(a.qty_claim) as qty_claim_x,
                                                                    sum(a.qty_lolos) as qty_lolos_qc
                                                                FROM
                                                                    tbl_aftersales_now a
                                                                WHERE
                                                                    DATE_FORMAT(a.tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir'
                                                                    $WCheck $WStatus AND (a.bprc IS NULL OR a.bprc = '')
                                                                    GROUP BY
                                                                    a.po,
                                                                    a.no_hanger,
                                                                    a.warna,
                                                                    a.masalah_dominan,
                                                                    a.qty_order
                                                                ORDER BY
                                                                    a.tgl_buat ASC");

                        $majorTemp = [];
                        $sampleTemp = [];
                        $repeatTemp = [];
                        $generalTemp = [];

                        while($row = mysqli_fetch_assoc($query4Kategori)) {
                            $query4x = mysqli_query($con, "SELECT
                                                                b.pjg1
                                                            FROM tbl_ganti_kain_now b
                                                            WHERE b.id_nsp = '$row[id]' ");
                            $rowx = mysqli_fetch_assoc($query4x);
                            
                            $row['pjg1'] = $rowx['pjg1'];

                            if($row['pjg1'] >= 500) {
                                $majorTemp[] = $row;
                            } elseif(in_array(substr($row['no_order'], 0, 3), ['SAM', 'SME'])) {
                                $sampleTemp[] = $row;
                            } else {
                                $generalTemp[] = $row;
                            }
                        }

                        $hanger_masalah_dominan = array_map(function($value) {
                            return $value['no_hanger'].''.$value['masalah_dominan'];
                        }, $generalTemp);

                        $count_hanger_masalah_dominan = array_count_values($hanger_masalah_dominan);
                        $group_hanger_masalah_dominan = array_keys(array_filter($count_hanger_masalah_dominan, fn($value) => $value > 1 ));

                        foreach ($generalTemp as $key => $value) {
                            $hmd = $value['no_hanger'].''.$value['masalah_dominan'];
                            if(in_array($hmd, $group_hanger_masalah_dominan)){
                                $repeatTemp[] = $value;
                                unset($generalTemp[$key]);
                            }
                        }

                        // JUMLAH KG
                        $majorKG = 0;
                        $majorKGLolosQC = 0;
                        foreach ($majorTemp as $key => $value) {
                            if(strtoupper($value['satuan_c']) == 'KG') {
                                $majorKG += $value['qty_claim_x'];
                                $majorKGLolosQC += $value['qty_lolos_qc'];
                            }
                        }

                        $sampleKG = 0;
                        $sampleKGLolosQC = 0;
                        foreach ($sampleTemp as $key => $value) {
                            if(strtoupper($value['satuan_c']) == 'KG') {
                                $sampleKG += $value['qty_claim_x'];
                                $sampleKGLolosQC += $value['qty_lolos_qc'];
                            }
                        }

                        $repeatKG = 0;
                        $repeatKGLolosQC = 0;
                        foreach ($repeatTemp as $key => $value) {
                            if(strtoupper($value['satuan_c']) == 'KG') {
                                $repeatKG += $value['qty_claim_x'];
                                $repeatKGLolosQC += $value['qty_lolos_qc'];
                            }
                        }

                        $generalKG = 0;
                        $generalKGLolosQC = 0;
                        foreach ($generalTemp as $key => $value) {
                            if(strtoupper($value['satuan_c']) == 'KG') {
                                $generalKG += $value['qty_claim_x'];
                                $generalKGLolosQC += $value['qty_lolos_qc'];
                            }
                        }

                        // Total
                        $totalJumlahKasus = count($majorTemp) + count($sampleTemp) + count($repeatTemp) + count($generalTemp);
                        $totalKeluhan = $majorKG + $sampleKG + $repeatKG + $generalKG;
                        if($totalKeluhan > 0) {
                            $totalDibandingkanTotalKeluhan = number_format(($majorKG / $totalKeluhan) * 100, 2) + number_format(($sampleKG / $totalKeluhan) * 100, 2) + number_format(($repeatKG / $totalKeluhan) * 100, 2) + number_format(($generalKG / $totalKeluhan) * 100, 2);
                        }
                    ?>
                    <tbody>
                        <?php if($totalKeluhan > 0){ ?>
                        <tr valign="top">
                            <td align="center">1</td>  
                            <td align="left">MAJOR</td>
                            <td align="right"><?= count($majorTemp) ?></td>
                            <td align="right"><?= $Status === 'Lolos QC' ? $majorKGLolosQC : $majorKG ?></td>
                            <td align="right"><?= $TotalKirim!="" && $totalKeluhan > 0 ? number_format(($majorKG / $totalKeluhan) * 100, 2) . " %" : "0" ?></td>
                            <td align="right"><?= $TotalKirim!="" ? number_format(($majorKG / $TotalKirim) * 100, 2) . " %" : "0" ?></td>
                        </tr>
                        <tr valign="top">
                            <td align="center">2</td>  
                            <td align="left">SAMPLE</td>
                            <td align="right"><?= count($sampleTemp) ?></td>
                            <td align="right"><?= $Status === 'Lolos QC' ? $sampleKGLolosQC : $sampleKG ?></td>
                            <td align="right"><?= $TotalKirim!="" && $totalKeluhan > 0 ? number_format(($sampleKG / $totalKeluhan) * 100, 2) . " %" : "0" ?></td>
                            <td align="right"><?= $TotalKirim!="" ? number_format(($sampleKG / $TotalKirim) * 100, 2) . " %" : "0" ?></td>
                        </tr>
                        <tr valign="top">
                            <td align="center">3</td>  
                            <td align="left">REPEAT</td>
                            <td align="right"><?= count($repeatTemp) ?></td>
                            <td align="right"><?= $Status === 'Lolos QC' ? $repeatKGLolosQC : $repeatKG ?></td>
                            <td align="right"><?= $TotalKirim!="" && $totalKeluhan > 0 ? number_format(($repeatKG / $totalKeluhan) * 100, 2) . " %" : "0" ?></td>
                            <td align="right"><?= $TotalKirim!="" ? number_format(($repeatKG / $TotalKirim) * 100, 2) . " %" : "0" ?></td>
                        </tr>
                        <tr valign="top">
                            <td align="center">4</td>  
                            <td align="left">GENERAL</td>
                            <td align="right"><?= count($generalTemp) ?></td>
                            <td align="right"><?= $Status === 'Lolos QC' ? $generalKGLolosQC : $generalKG ?></td>
                            <td align="right"><?= $TotalKirim!="" && $totalKeluhan > 0 ? number_format(($generalKG / $totalKeluhan) * 100, 2) . " %" : "0" ?></td>
                            <td align="right"><?= $TotalKirim!="" ? number_format(($generalKG / $TotalKirim) * 100, 2) . " %" : "0" ?></td>
                        </tr>
                    <?php } } ?>
                    </tbody>
                    <tfoot>
                        <tr valign="top">
                            <td align="right" colspan="2"><strong>TOTAL</strong></td>
                            <td align="right" colspan="1"><strong><?php if($TotalKirim!=""){echo number_format($totalJumlahKasus,2);}else{echo "0";} ?></strong></td>
                            <td align="right" colspan="1"><strong><?php if($TotalKirim!=""){echo number_format($totalKeluhan,2);}else{echo "0";} ?></strong></td>
                            <td align="right" colspan="1"><strong><?php if($TotalKirim!=''){echo number_format($totalDibandingkanTotalKeluhan, 2)." %";}else{echo "0";} ?></strong></td>
                        </tr>
                        <tr valign="top">
                            <td align="right" colspan="2"><strong>TOTAL KIRIM</strong></td>
                            <td align="right" colspan="1"><strong><?php if($TotalKirim!=""){echo number_format($TotalKirim,2);}else{echo "0";} ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="box-footer">
                    <a href="pages/cetak/excel_4kategori.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&total=<?php echo $TotalKirim; ?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank"><i class="fa fa-file-excel-o"></i></a>
                </div>
                </div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Solusi KPE</h3><br>
                </div>
            <div class="box-body">
                <table class="table table-bordered table-striped nowrap" id="table-solusi-kpe" style="width:100%">
                <thead class="bg-blue">
                    <tr>
                    <th><div align="center">No</div></th>
                    <th><div align="center">Solusi</div></th>
                    <th><div align="center">Jumlah Kasus</div></th>
                    <th><div align="center">Qty Keluhan (Kg)</div></th>
                    <th><div align="center">Qty Keluhan (Yard)</div></th>
                    <th><div align="center">Qty Keluhan Replacement (Kg)</div></th>
                    <th><div align="center">Qty Replacement (Yard)</div></th>
                    <th><div align="center">% Dibandingkan Total Keluhan</div></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if($Awal!=""){ 
                    $Where2 =" WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ";
                    $Where21 =" AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; 

                    $qry2Total = mysqli_query($con, "SELECT 
                                                        sum(a.qty_claim) as total_qty_claim
                                                    from (
                                                        select 
                                                        sum(qty_claim) as qty_claim
                                                        from tbl_aftersales_now
                                                        $Where2 $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                        group by solusi ) a");
                    $row2Total = mysqli_fetch_array($qry2Total);
                    
                    $query2 = mysqli_query($con, "SELECT
                                                        temp.solusi,
                                                        count(*) as jml_kasus
                                                    from
                                                        (
                                                        select
                                                            *,
                                                            sum(qty_claim) as qty_claim_gabung
                                                        from
                                                            tbl_aftersales_now
                                                        $Where2 $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                        group by
                                                            po,
                                                            no_hanger,
                                                            warna,
                                                            masalah_dominan,
                                                            qty_order
                                                        order by
                                                            tgl_buat asc) temp
                                                    group by 
                                                        temp.solusi
                                                    order by
                                                        jml_kasus desc");
                    $no = 1;
                    $total_jumlah_kasus = 0;
                    $total_qty_claim_kg = 0;
                    $total_qty_claim_yd = 0;
                    $total_qty_replacement_kg = 0;
                    $total_qty_replacement_yd = 0;
                    while($row2 = mysqli_fetch_array($query2)){

                    $query2KG = mysqli_query($con, "SELECT 
                                                        sum(qty_claim) as qty_claim,
                                                        sum(qty_lolos) as qty_lolos
                                                    from tbl_aftersales_now
                                                    where solusi = '$row2[solusi]' and satuan_c = 'KG' $Where21 $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                    group by solusi");
                    $row2KG = mysqli_fetch_array($query2KG);

                    $query2YD = mysqli_query($con, "SELECT 
                                                        sum(qty_claim2) as qty_claim2
                                                    from tbl_aftersales_now
                                                    where solusi = '$row2[solusi]' and satuan_c2 in ('YD', 'MTR') $Where21 $WCheck $WStatus AND (bprc IS NULL OR bprc = '')
                                                    group by solusi");
                    $row2YD = mysqli_fetch_array($query2YD);

                    $query2ReplacementKG = mysqli_query($con, "SELECT
                                                                    sum(kg1) as qty_kg
                                                                from
                                                                    tbl_ganti_kain_now tgkn 
                                                                where
                                                                    solusi = '$row2[solusi]'
                                                                    $Where21
                                                                group by
                                                                    solusi");
                    $row2ReplacementKG = mysqli_fetch_array($query2ReplacementKG);

                    $query2ReplacementYD = mysqli_query($con, "select
                                                                    sum(pjg1) as qty_yard
                                                                from
                                                                    tbl_ganti_kain_now tgkn 
                                                                where
                                                                    solusi = '$row2[solusi]'
                                                                    and satuan1 in ('yard', 'meter')
                                                                    $Where21
                                                                group by
                                                                    solusi");
                    $row2ReplacementYD = mysqli_fetch_array($query2ReplacementYD);
                ?>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                    <td align="center"><?= $no; ?></td>
                    <td align="left"><?= $row2['solusi'] != "" ? $row2['solusi'] : "PENDING" ?></td>
                    <td align="center"><?= $row2['jml_kasus'] ?></td>
                    <td align="center"><?= $Status === 'Lolos QC' ? number_format($row2KG['qty_lolos'], 2) : number_format($row2KG['qty_claim'], 2) ?></td>
                    <td align="center"><?= number_format($row2YD['qty_claim2'], 2) ?></td>
                    <td align="center"><?= number_format($row2ReplacementKG['qty_kg'], 2) ?></td>
                    <td align="center"><?= number_format($row2ReplacementYD['qty_yard'], 2) ?></td>
                    <td align="center">
                    <?php
                        // if($row2KG['qty_claim'] != "") {
                        //   echo number_format(($row2KG['qty_claim'] / $row2Total['total_qty_claim']) * 100, 2) . ' %';
                        // } else if($row2YD['qty_claim'] != "") {
                        //   echo number_format(($row2YD['qty_claim'] / $row2Total['total_qty_claim']) * 100, 2) . ' %';
                        // }
                        echo number_format(($row2KG['qty_claim'] / $row2Total['total_qty_claim']) * 100, 2) . ' %';
                    ?>
                    </td>
                </tr>
                <?php
                    $no++;
                    $total_jumlah_kasus += $row2['jml_kasus'];
                    $total_qty_claim_kg += $row2KG['qty_claim'];
                    $total_qty_claim_yd += $row2YD['qty_claim2'];
                    $total_qty_replacement_kg += $row2ReplacementKG['qty_kg'];
                    $total_qty_replacement_yd += $row2ReplacementYD['qty_yard'];
                    }
                }
                ?>
                </tbody>
                <tfoot>
                <tr valign="top">
                    <td align="right" colspan="2"><strong>Total</strong></td>
                    <td align="center"><strong><?= !empty($Awal) ? number_format($total_jumlah_kasus, 2) : '' ?></strong></td>
                    <td align="center"><strong><?= !empty($Awal) ? number_format($total_qty_claim_kg, 2) : '' ?></strong></td>
                    <td align="center"><strong><?= !empty($Awal) ? number_format($total_qty_claim_yd, 2) : '' ?></strong></td>
                    <td align="center"><strong><?= !empty($Awal) ? number_format($total_qty_replacement_kg, 2) : '' ?></strong></td>
                    <td align="center"><strong><?= !empty($Awal) ? number_format($total_qty_replacement_yd, 2) : '' ?></strong></td>
                    <td align="center"></td>
                </tr>
                </tfoot>
            </table>
            </div>
            <div class="box-footer">
                <a href="pages/cetak/excel_solusi_kpe.php?awal=<?=$Awal?>&akhir=<?=$Akhir?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank"><i class="fa fa-file-excel-o"></i></a>
            </div>
            </div>
        </div>
        <!-- end of solusi kpe -->
    </div>
<?php
if($TotalLot!=""){ 
    //Grafik Langganan Dibandingkan Total Kasus
    $qry3=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.langganan,'''') buyer, GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM tbl_langganan_aftersales_now a
INNER JOIN(SELECT ROUND((COUNT(pelanggan)/$TotalLot)*100,2) AS jml, pelanggan 
FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '') GROUP BY pelanggan ORDER BY jml DESC LIMIT 5) b ON a.langganan=b.pelanggan");
    $r3=mysqli_fetch_array($qry3);
    //Grafik Defect Dibandingkan Total Kasus 
    $qry1=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.masalah,'''') defect ,GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM tbl_masalah_aftersales a
INNER JOIN(SELECT ROUND((COUNT(masalah_dominan)/$TotalLot)*100,2) AS jml,masalah_dominan FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '')
AND (masalah_dominan!='' OR masalah_dominan!=NULL) GROUP BY masalah_dominan ORDER BY jml DESC LIMIT 5) b ON a.masalah=b.masalah_dominan");
    $r1=mysqli_fetch_array($qry1);
}
if($TotalKirim!=""){
    //Grafik Langganan Dibandingkan Total Kirim 
    $qry4=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.langganan,'''') buyer, GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM tbl_langganan_aftersales_now a
INNER JOIN(SELECT ROUND((SUM(qty_claim)/$TotalKirim)*100,2) AS jml, pelanggan 
FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '') GROUP BY pelanggan ORDER BY jml DESC LIMIT 5) b ON a.langganan=b.pelanggan");
    $r4=mysqli_fetch_array($qry4);
    //Grafik Defect Dibandingkan Total Kirim  
    $qry5=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.masalah,'''') defect ,GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM tbl_masalah_aftersales a
INNER JOIN(SELECT ROUND((SUM(qty_claim)/$TotalKirim)*100,2) AS jml,masalah_dominan FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '')
AND (masalah_dominan!='' OR masalah_dominan!=NULL) GROUP BY masalah_dominan ORDER BY jml DESC LIMIT 5) b ON a.masalah=b.masalah_dominan");
    $r5=mysqli_fetch_array($qry5);
    //Grafik Defect Lululemon Dibandingkan Total Kirim  
    $qry6=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.masalah,'''') defect ,GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM tbl_masalah_aftersales a
INNER JOIN(SELECT ROUND((SUM(qty_claim)/$TotalKirim)*100,2) AS jml,masalah_dominan FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '')
AND (masalah_dominan!='' OR masalah_dominan!=NULL) AND langganan LIKE '%lululemon%' GROUP BY masalah_dominan ORDER BY jml DESC LIMIT 5) b ON a.masalah=b.masalah_dominan");
    $r6=mysqli_fetch_array($qry6);
    //Grafik Dept Dibandingkan Total Kirim  
    $qry7=mysqli_query($con,"SELECT GROUP_CONCAT('''',a.nama,'''') dept ,GROUP_CONCAT(IFNULL(b.jml,0)) as jml FROM tbl_dept a
INNER JOIN(SELECT ROUND((SUM(qty_claim)/$TotalKirim)*100,2) AS jml,t_jawab FROM tbl_aftersales_now WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '')
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
<script>
    function cekLot() {
        let lot = document.getElementById('totallot');
        if(lot.value == "" || lot.value < 0) {
            alert('Total LOT Kirim belum diisi');
            return false;
        } else {
            return true;
        }
    }
</script>