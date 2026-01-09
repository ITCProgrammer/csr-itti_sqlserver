<?PHP
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Harian QCF</title>
<script>
	function aktif() {
		if (document.forms['form1']['tampiltgl'].checked == false) {
			document.form1.jam_awal.setAttribute("disabled", true);
			document.form1.jam_awal.value = "";
			document.form1.jam_akhir.setAttribute("disabled", true);
			document.form1.jam_akhir.value = "";
		} else {
			document.form1.jam_awal.removeAttribute("disabled");
			document.form1.jam_akhir.removeAttribute("disabled");
		}
	}
	</script>	
</head>
<body>
<?php
$Awal = isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir = isset($_POST['akhir']) ? $_POST['akhir'] : '';
$jamA = isset($_POST['jam_awal']) ? $_POST['jam_awal'] : '';
$jamAr = isset($_POST['jam_akhir']) ? $_POST['jam_akhir'] : '';	
$GShift = isset($_POST['gshift']) ? $_POST['gshift'] : '';
$Group = isset($_POST['group']) ? $_POST['group'] : '';
$MC = isset($_POST['nomc']) ? $_POST['nomc'] : '';

	
if (strlen($jamA) == 5) {
    $start_date = $Awal . " " . $jamA;
  } else {
    $start_date = $Awal . " 0" . $jamA;
  }
  if (strlen($jamAr) == 5) {
    $stop_date = $Akhir . " " . $jamAr;
  } else {
    $stop_date = $Akhir . " 0" . $jamAr;
  }	
if ($jamA!="" or $jamAr!=""){ 
	$Where = " DATE_FORMAT( CONCAT(tgl_update,' ',jam_update), '%Y-%m-%d %H:%i') between '$start_date' and '$stop_date' and ";
}else{
	$start_date = $Awal;
	$stop_date = $Akhir;
	$Where = " DATE_FORMAT( tgl_update , '%Y-%m-%d') between '$start_date' and '$stop_date' and ";
}
//$start_date= $Awal." ".$jamA;
//$stop_date= $Akhir." ".$jamAr;	
?>
<div class="row">
  <div class="col-xs-4">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> Filter Laporan Packing</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
        <div class="box-body">
		  <div class="form-group">
            <label for="awal" class="col-sm-3 control-label"></label>
            <div class="col-sm-4">
              <label><input type="checkbox" name="tampiltgl" id="tampiltgl" onClick="aktif();"> Aktifkan Jam</label>		  	
            </div>
			   
            <!-- /.input group -->
          </div>	
          <div class="form-group">
            <label for="awal" class="col-sm-3 control-label">Tanggal Awal</label>
            <div class="col-sm-2">
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="awal" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
              </div>			  	
            </div>  			 
            <!-- /.input group -->
          </div>
		  <div class="form-group">
            <label for="awal" class="col-sm-3 control-label">Jam Awal</label>
            <div class="col-sm-2">
            <input name="jam_awal" type="text" class="form-control" placeholder="00:00" pattern="[0-9]{2}:[0-9]{2}$" title=" e.g 14:25 " onkeyup="
                                                var time = this.value;
                                                if (time.match(/^\d{2}$/) !== null) {
                                                this.value = time + ':';
                                                } else if (time.match(/^\d{2}\:\d{2}$/) !== null) {
                                                this.value = time + '';
                                                }" value="<?php echo $jamA; ?>" size="5" maxlength="5" autocomplete="off" disabled>
              <!-- <input type="text" class="form-control timepicker" name="jam_awal" id="jam_awal" placeholder="00:00" value="<?php echo $jamA; ?>" disabled> -->
            </div>
            <!-- /.input group -->
          </div>	
          <div class="form-group">
            <label for="akhir" class="col-sm-3 control-label">Tanggal Akhir</label>
            <div class="col-sm-2">
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" autocomplete="off"/>
              </div>
            </div>
			    
            <!-- /.input group -->
          </div>
	      <div class="form-group">
            <label for="akhir" class="col-sm-3 control-label">Jam Akhir</label>
            <div class="col-sm-2">
            <input name="jam_akhir" type="text" class="form-control" placeholder="00:00" pattern="[0-9]{2}:[0-9]{2}$" title=" e.g 14:25 " onkeyup="
                                                var time = this.value;
                                                if (time.match(/^\d{2}$/) !== null) {
                                                this.value = time + ':';
                                                } else if (time.match(/^\d{2}\:\d{2}$/) !== null) {
                                                this.value = time + '';
                                                }" value="<?php echo $jamAr; ?>" size="5" maxlength="5" autocomplete="off" disabled>
              <!-- <input type="text" class="form-control timepicker" name="jam_akhir" id="jam_akhir" placeholder="00:00" value="<?php echo $jamAr; ?>" autocomplete="off" disabled> -->
            </div>
			    
            <!-- /.input group -->
          </div>		
          <div class="form-group">
            <label for="gshift" class="col-sm-3 control-label">Shift</label>
            <div class="col-sm-3">
              <select name="gshift" class="form-control select2"> 
                <option value="ALL" <?php if ($GShift == "ALL") {
                  echo "SELECTED";
                } ?>>ALL</option>
                <option value="1" <?php if ($GShift == "1") {
                  echo "SELECTED";
                } ?>>1</option>
                <option value="2" <?php if ($GShift == "2") {
                  echo "SELECTED";
                } ?>>2</option>
                <option value="3" <?php if ($GShift == "3") {
                  echo "SELECTED";
                } ?>>3</option>
              </select>
            </div>			 
          </div>
          <div class="form-group">
            <label for="group" class="col-sm-3 control-label">Group</label>
            <div class="col-sm-3">
              <select name="group" class="form-control select2"> 
                <option value="ALL" <?php if ($Group == "ALL") {
                  echo "SELECTED";
                } ?>>ALL</option>
                <option value="PACKING A" <?php if ($Group == "PACKING A") {
                  echo "SELECTED";
                } ?>>PACKING A</option>
                <option value="PACKING B" <?php if ($Group == "PACKING B") {
                  echo "SELECTED";
                } ?>>PACKING B</option>
                <option value="PACKING C" <?php if ($Group == "PACKING C") {
                  echo "SELECTED";
                } ?>>PACKING C</option>
              </select>
            </div>			 
          </div>
          <div class="form-group">
            <label for="nomc" class="col-sm-3 control-label">No MC</label>
            <div class="col-sm-3">
              <select name="nomc" class="form-control select2"> 
                <option value="ALL" <?php if ($MC == "ALL") {
                  echo "SELECTED";
                } ?>>ALL</option>
                <option value="01" <?php if ($MC == "01") {
                  echo "SELECTED";
                } ?>>01</option>
                <option value="02" <?php if ($MC == "02") {
                  echo "SELECTED";
                } ?>>02</option>
                <option value="03" <?php if ($MC == "03") {
                  echo "SELECTED";
                } ?>>03</option>
                <option value="04" <?php if ($MC == "04") {
                  echo "SELECTED";
                } ?>>04</option>
              </select>
            </div>			 
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="col-sm-5">
            <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
          </div>
          <div class="pull-right">
            <input type="button" class="btn btn-block btn-social btn-linkedin btn-sm" <?php if ($_SESSION['lvl_id'] == "AFTERSALES") {
              echo "disabled";
            } ?> name="lihat" value="Kembali" onClick="window.location.href='LapPackingNew'">	   
          </div>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
  <div class="col-xs-8">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> Packing Netto</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-striped" style="width: 100%;">
          <thead class="bg-blue">
            <tr>
              <th width="7%" rowspan="2"><div align="center">SHIFT</div></th>
              <th colspan="3"><div align="center">ADIDAS</div></th>
              <th colspan="3"><div align="center">LULULEMON</div></th>
              <th colspan="3"><div align="center">DLL</div></th>
              <th colspan="3"><div align="center">TOTAL</div></th>
            </tr>
            <tr>
              <th width="6%"><div align="center">ROLL</div></th>
              <th width="9%"><div align="center">KG</div></th>
              <th width="7%"><div align="center">YARD</div></th>
              <th width="8%"><div align="center">ROLL</div></th>
              <th width="8%"><div align="center">KG</div></th>
              <th width="7%"><div align="center">YARD</div></th>
              <th width="9%"><div align="center">ROLL</div></th>
              <th width="7%"><div align="center">KG</div></th>
              <th width="7%"><div align="center">YARD</div></th>
              <th width="8%"><div align="center">ROLL</div></th>
              <th width="8%"><div align="center">KG</div></th>
              <th width="9%"><div align="center">YARD</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
          $t_rollR = 0;
          $t_kgR = 0;
          $t_yardR = 0;
          $total_rluluR = $total_kgluluR = $total_yluluR = $total_radiR = $total_kgadiR = $total_yadiR = $total_rdllR = $total_kgdllR = $total_ydllR = 0;
          $persen_kgluluR = $persen_yluluR = $persen_kgadiR = $persen_yadiR = $persen_kgdllR = $persen_ydllR = 0;
          ?>
      <?php
      $qryPAR = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',netto,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',panjang,0)) as adidas_yd,
	SUM(if(pelanggan like '%ADIDAS%',jml_netto,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',netto,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',panjang,0)) as lulu_yd,
	SUM(if(pelanggan like '%LULU%',jml_netto,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',netto,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',panjang,0)) as lain_yd,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_netto,0)) as lain_roll,
	SUM(netto) as tot_kg,
	SUM(panjang) as tot_yd,
	SUM(jml_netto) as tot_roll	
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING' and
	`sts_gkg` = '0' and
	inspektor = 'PACKING A'");
      $rowPAR = mysqli_fetch_array($qryPAR);
      ?>      
          <tr>
            <td align="center">PACKING A</td>
            <td align="center"><?php echo round($rowPAR['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAR['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPAR['adidas_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAR['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAR['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPAR['lulu_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAR['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAR['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPAR['lain_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAR['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAR['tot_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPAR['tot_yd'], 2), 2); ?></td>
          </tr>
    <?php
    $qryPBR = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',netto,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',panjang,0)) as adidas_yd,
	SUM(if(pelanggan like '%ADIDAS%',jml_netto,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',netto,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',panjang,0)) as lulu_yd,
	SUM(if(pelanggan like '%LULU%',jml_netto,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',netto,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',panjang,0)) as lain_yd,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_netto,0)) as lain_roll,
	SUM(netto) as tot_kg,
	SUM(panjang) as tot_yd,
	SUM(jml_netto) as tot_roll	
from
	tbl_lap_inspeksi
where
	$Where
   `dept` = 'PACKING'
	and `sts_gkg` = '0'
	and inspektor = 'PACKING B'");
    $rowPBR = mysqli_fetch_array($qryPBR);
    ?>    
          <tr>
            <td align="center">PACKING B</td>
            <td align="center"><?php echo round($rowPBR['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBR['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPBR['adidas_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBR['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBR['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPBR['lulu_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBR['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBR['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPBR['lain_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBR['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBR['tot_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPBR['tot_yd'], 2), 2); ?></td>
          </tr>
    <?php
    $qryPCR = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',netto,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',panjang,0)) as adidas_yd,
	SUM(if(pelanggan like '%ADIDAS%',jml_netto,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',netto,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',panjang,0)) as lulu_yd,
	SUM(if(pelanggan like '%LULU%',jml_netto,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',netto,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',panjang,0)) as lain_yd,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_netto,0)) as lain_roll,
	SUM(netto) as tot_kg,
	SUM(panjang) as tot_yd,
	SUM(jml_netto) as tot_roll	
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING'
	and `sts_gkg` = '0'
	and inspektor = 'PACKING C'");
    $rowPCR = mysqli_fetch_array($qryPCR);
    ?>    
          <tr>
            <td align="center">PACKING C</td>
            <td align="center"><?php echo round($rowPCR['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCR['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPCR['adidas_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCR['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCR['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPCR['lulu_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCR['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCR['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPCR['lain_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCR['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCR['tot_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPCR['tot_yd'], 2), 2); ?></td>
          </tr>
          <?php
          $total_radiR = round($rowPAR['adidas_roll']) + round($rowPBR['adidas_roll']) + round($rowPCR['adidas_roll']);
          $total_kgadiR = round($rowPAR['adidas_kg'], 2) + round($rowPBR['adidas_kg'], 2) + round($rowPCR['adidas_kg'], 2);
          $total_yadiR = round($rowPAR['adidas_yd'], 2) + round($rowPBR['adidas_yd'], 2) + round($rowPCR['adidas_yd'], 2);
          $total_rluluR = round($rowPAR['lulu_roll']) + round($rowPBR['lulu_roll']) + round($rowPCR['lulu_roll']);
          $total_kgluluR = round($rowPAR['lulu_kg'], 2) + round($rowPBR['lulu_kg'], 2) + round($rowPCR['lulu_kg'], 2);
          $total_yluluR = round($rowPAR['lulu_yd'], 2) + round($rowPBR['lulu_yd'], 2) + round($rowPCR['lulu_yd'], 2);
          $total_rdllR = round($rowPAR['lain_roll']) + round($rowPBR['lain_roll']) + round($rowPCR['lain_roll']);
          $total_kgdllR = round($rowPAR['lain_kg'], 2) + round($rowPBR['lain_kg'], 2) + round($rowPCR['lain_kg'], 2);
          $total_ydllR = round($rowPAR['lain_yd'], 2) + round($rowPBR['lain_yd'], 2) + round($rowPCR['lain_yd'], 2);
          $t_rollR = round($rowPAR['tot_roll']) + round($rowPBR['tot_roll']) + round($rowPCR['tot_roll']);
          $t_kgR = round($rowPAR['tot_kg'], 2) + round($rowPBR['tot_kg'], 2) + round($rowPCR['tot_kg'], 2);
          $t_yardR = round($rowPAR['tot_yd'], 2) + round($rowPBR['tot_yd'], 2) + round($rowPCR['tot_yd'], 2);

          if ($Awal != "") {
            if ($total_kgluluR != 0) {
              $persen_kgluluR = number_format(($total_kgluluR / ($total_kgluluR + $total_kgadiR + $total_kgdllR)) * 100, 2);
            } else {
              $persen_kgluluR = 0;
            }
            if ($total_yluluR != 0) {
              $persen_yluluR = number_format(($total_yluluR / ($total_yluluR + $total_yadiR + $total_ydllR)) * 100, 2);
            } else {
              $persen_yluluR = 0;
            }
            if ($total_kgadiR != 0) {
              $persen_kgadiR = number_format(($total_kgadiR / ($total_kgluluR + $total_kgadiR + $total_kgdllR)) * 100, 2);
            } else {
              $persen_kgadiR = 0;
            }
            if ($total_yadiR != 0) {
              $persen_yadiR = number_format(($total_yadiR / ($total_yluluR + $total_yadiR + $total_ydllR)) * 100, 2);
            } else {
              $persen_yadiR = 0;
            }
            if ($total_kgdllR != 0) {
              $persen_kgdllR = number_format(($total_kgdllR / ($total_kgluluR + $total_kgadiR + $total_kgdllR)) * 100, 2);
            } else {
              $persen_kgdllR = 0;
            }
            if ($total_ydllR != 0) {
              $persen_ydllR = number_format(($total_ydllR / ($total_yluluR + $total_yadiR + $total_ydllR)) * 100, 2);
            } else {
              $persen_ydllR = 0;
            }
          }
          ?>
          <tr>
            <td align="center"><strong>TOTAL</strong></td>
            <td align="center"><strong><?php echo $total_radiR; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgadiR; ?></strong></td>
            <td align="center"><strong><?php echo $total_yadiR; ?></strong></td>
            <td align="center"><strong><?php echo $total_rluluR; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgluluR; ?></strong></td>
            <td align="center"><strong><?php echo $total_yluluR; ?></strong></td>
            <td align="center"><strong><?php echo $total_rdllR; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgdllR; ?></strong></td>
            <td align="center"><strong><?php echo $total_ydllR; ?></strong></td>
            <td align="center"><strong><?php echo $t_rollR; ?></strong></td>
            <td align="center"><strong><?php echo $t_kgR; ?></strong></td>
            <td align="center"><strong><?php echo $t_yardR; ?></strong></td>
          </tr> 
          <tr>
            <td align="center">%</td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgadiR; ?></td>
            <td align="center"><?php echo $persen_yadiR; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgluluR; ?></td>
            <td align="center"><?php echo $persen_yluluR; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgdllR; ?></td>
            <td align="center"><?php echo $persen_ydllR; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <?php
          $qrysisa = mysqli_query($con, "SELECT * FROM tbl_sisa_packing WHERE tgl_sisa='$Awal'");
          $rowsisa = mysqli_fetch_array($qrysisa);
          ?>
          <tr>
            <td colspan="2" align="center" valign="middle">SISA SIAP PACKING</td>
            <td colspan="4" align="left"><?php if ($rowsisa['sisa_packing'] != "") {
              echo $rowsisa['sisa_packing'];
            } else {
              echo "0";
            } ?></td>
            <td colspan="7" align="center">&nbsp;</td>
          </tr> 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
<div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> Mutasi GKJ </h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-striped" style="width: 100%;">
          <thead class="bg-blue">
            <tr>
              <th width="7%" rowspan="2"><div align="center">SHIFT</div></th>
              <th colspan="2"><div align="center">ADIDAS</div></th>
              <th colspan="2"><div align="center">LULULEMON</div></th>
              <th colspan="2"><div align="center">DLL</div></th>
              <th colspan="2"><div align="center">TOTAL</div></th>
            </tr>
            <tr>
              <th width="6%"><div align="center">ROLL</div></th>
              <th width="9%"><div align="center">KG</div></th>
              <th width="8%"><div align="center">ROLL</div></th>
              <th width="8%"><div align="center">KG</div></th>
              <th width="9%"><div align="center">ROLL</div></th>
              <th width="7%"><div align="center">KG</div></th>
              <th width="8%"><div align="center">ROLL</div></th>
              <th width="8%"><div align="center">KG</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
          $t_rollR = 0;
          $t_kgR = 0;
          $t_yardR = 0;
          $total_rluluR = $total_kgluluR = $total_yluluR = $total_radiR = $total_kgadiR = $total_yadiR = $total_rdllR = $total_kgdllR = $total_ydllR = 0;
          $persen_kgluluR = $persen_yluluR = $persen_kgadiR = $persen_yadiR = $persen_kgdllR = $persen_ydllR = 0;
          ?>
      <?php
      $qryPAR1 = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',mutasi,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',jml_mutasi,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',mutasi,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',jml_mutasi,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',mutasi,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_mutasi,0)) as lain_roll,
	SUM(mutasi) as tot_kg,
	SUM(jml_mutasi) as tot_roll	
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING'
	and `sts_gkg` = '0'
	and inspektor = 'PACKING A'");
      $rowPAR1 = mysqli_fetch_array($qryPAR1);
      ?>      
          <tr>
            <td align="center">PACKING A</td>
            <td align="center"><?php echo round($rowPAR1['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAR1['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAR1['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAR1['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAR1['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAR1['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAR1['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAR1['tot_kg'], 2), 2); ?></td>
            </tr>
    <?php
    $qryPBR1 = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',mutasi,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',jml_mutasi,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',mutasi,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',jml_mutasi,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',mutasi,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_mutasi,0)) as lain_roll,
	SUM(mutasi) as tot_kg,
	SUM(jml_mutasi) as tot_roll	
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING'
	and `sts_gkg` = '0'
	and inspektor = 'PACKING B'");
    $rowPBR1 = mysqli_fetch_array($qryPBR1);
    ?>    
          <tr>
            <td align="center">PACKING B</td>
            <td align="center"><?php echo round($rowPBR1['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBR1['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBR1['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBR1['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBR1['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBR1['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBR1['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBR1['tot_kg'], 2), 2); ?></td>
            </tr>
    <?php
    $qryPCR1 = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',mutasi,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',jml_mutasi,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',mutasi,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',jml_mutasi,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',mutasi,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_mutasi,0)) as lain_roll,
	SUM(mutasi) as tot_kg,
	SUM(jml_mutasi) as tot_roll	
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING'
	and `sts_gkg` = '0'
	and inspektor = 'PACKING C'");
    $rowPCR1 = mysqli_fetch_array($qryPCR1);
    ?>    
          <tr>
            <td align="center">PACKING C</td>
            <td align="center"><?php echo round($rowPCR1['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCR1['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCR1['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCR1['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCR1['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCR1['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCR1['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCR1['tot_kg'], 2), 2); ?></td>
            </tr>
          <?php
          $total_radiR1 = round($rowPAR1['adidas_roll']) + round($rowPBR1['adidas_roll']) + round($rowPCR1['adidas_roll']);
          $total_kgadiR1 = round($rowPAR1['adidas_kg'], 2) + round($rowPBR1['adidas_kg'], 2) + round($rowPCR1['adidas_kg'], 2);
          $total_rluluR1 = round($rowPAR1['lulu_roll']) + round($rowPBR1['lulu_roll']) + round($rowPCR1['lulu_roll']);
          $total_kgluluR1 = round($rowPAR1['lulu_kg'], 2) + round($rowPBR1['lulu_kg'], 2) + round($rowPCR1['lulu_kg'], 2);
          $total_rdllR1 = round($rowPAR1['lain_roll']) + round($rowPBR1['lain_roll']) + round($rowPCR1['lain_roll']);
          $total_kgdllR1 = round($rowPAR1['lain_kg'], 2) + round($rowPBR1['lain_kg'], 2) + round($rowPCR1['lain_kg'], 2);
          $t_rollR1 = round($rowPAR1['tot_roll']) + round($rowPBR1['tot_roll']) + round($rowPCR1['tot_roll']);
          $t_kgR1 = round($rowPAR1['tot_kg'], 2) + round($rowPBR1['tot_kg'], 2) + round($rowPCR1['tot_kg'], 2);

          if ($Awal != "") {
            if ($total_kgluluR1 != 0) {
              $persen_kgluluR1 = number_format(($total_kgluluR1 / ($total_kgluluR1 + $total_kgadiR1 + $total_kgdllR1)) * 100, 2);
            } else {
              $persen_kgluluR1 = 0;
            }
            if ($total_yluluR1 != 0) {
              $persen_yluluR1 = number_format(($total_yluluR1 / ($total_yluluR1 + $total_yadiR1 + $total_ydllR1)) * 100, 2);
            } else {
              $persen_yluluR1 = 0;
            }
            if ($total_kgadiR1 != 0) {
              $persen_kgadiR1 = number_format(($total_kgadiR1 / ($total_kgluluR1 + $total_kgadiR1 + $total_kgdllR1)) * 100, 2);
            } else {
              $persen_kgadiR1 = 0;
            }
            if ($total_yadiR1 != 0) {
              $persen_yadiR1 = number_format(($total_yadiR1 / ($total_yluluR1 + $total_yadiR1 + $total_ydllR1)) * 100, 2);
            } else {
              $persen_yadiR1 = 0;
            }
            if ($total_kgdllR1 != 0) {
              $persen_kgdllR1 = number_format(($total_kgdllR1 / ($total_kgluluR1 + $total_kgadiR1 + $total_kgdllR1)) * 100, 2);
            } else {
              $persen_kgdllR1 = 0;
            }
          }
          ?>
          <tr>
            <td align="center"><strong>TOTAL</strong></td>
            <td align="center"><strong><?php echo $total_radiR1; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgadiR1; ?></strong></td>
            <td align="center"><strong><?php echo $total_rluluR1; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgluluR1; ?></strong></td>
            <td align="center"><strong><?php echo $total_rdllR1; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgdllR1; ?></strong></td>
            <td align="center"><strong><?php echo $t_rollR1; ?></strong></td>
            <td align="center"><strong><?php echo $t_kgR1; ?></strong></td>
            </tr> 
          <tr>
            <td align="center">%</td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgadiR1; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgluluR1; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgdllR1; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            </tr>
          <?php
          $qrysisa = mysqli_query($con, "SELECT * FROM tbl_sisa_packing WHERE tgl_sisa='$Awal'");
          $rowsisa = mysqli_fetch_array($qrysisa);
          ?>
          <tr>
            <td colspan="2" align="center" valign="middle">SISA SIAP PACKING</td>
            <td colspan="7" align="left"><?php if ($rowsisa['sisa_packing'] != "") {
              echo $rowsisa['sisa_packing'];
            } else {
              echo "0";
            } ?></td>
            </tr> 
          </tbody>
        </table>
      </div>
    </div>
  </div>	
	</div>	
<div class="row">
<div class="col-xs-6">
<div class="box">
  <div class="box-header with-border">
  <h3 class="box-title"> BSA/BSC/BB </h3>
  </div>
<div class="box-body">	
<table class="table table-bordered table-striped" style="width: 100%;">
          <thead class="bg-blue">
            <tr>
              <th width="5%" rowspan="2"><div align="center">SHIFT</div></th>
              <th colspan="2"><div align="center">ADIDAS</div></th>
              <th colspan="2"><div align="center">LULULEMON</div></th>
              <th colspan="2"><div align="center">DLL</div></th>
              <th colspan="2"><div align="center">TOTAL</div></th>
            </tr>
            <tr>
              <th width="9%"><div align="center">ROLL</div></th>
              <th width="7%"><div align="center">KG</div></th>
              <th width="9%"><div align="center">ROLL</div></th>
              <th width="7%"><div align="center">KG</div></th>
              <th width="9%"><div align="center">ROLL</div></th>
              <th width="7%"><div align="center">KG</div></th>
              <th width="9%"><div align="center">ROLL</div></th>
              <th width="7%"><div align="center">KG</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
          $t_rollB = 0;
          $t_kgB = 0;
          $t_yardB = 0;
          $total_rluluB = $total_kgluluB = $total_yluluB = $total_radiB = $total_kgadiB = $total_yadiB = $total_rdllB = $total_kgdllB = $total_ydllB = 0;
          $persen_kgluluB = $persen_yluluB = $persen_kgadiB = $persen_yadiB = $persen_kgdllB = $persen_ydllB = 0;
          ?>
    <?php
    $qryPAB = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',kg_bs,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',panjang,0)) as adidas_yd,
	SUM(if(pelanggan like '%ADIDAS%',jml_bs,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',kg_bs,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',panjang,0)) as lulu_yd,
	SUM(if(pelanggan like '%LULU%',jml_bs,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',kg_bs,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',panjang,0)) as lain_yd,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_bs,0)) as lain_roll,
	SUM(kg_bs) as tot_kg,
	SUM(panjang) as tot_yd,
	SUM(jml_bs) as tot_roll		
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING'
	and inspektor = 'PACKING A'");
    $rowPAB = mysqli_fetch_array($qryPAB);
    ?>      
          <tr>
            <td align="center">PACKING A</td>
            <td align="center"><?php echo round($rowPAB['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAB['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAB['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAB['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAB['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAB['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAB['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAB['tot_kg'], 2), 2); ?></td>
          </tr>
      <?php
      $qryPBB = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',kg_bs,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',panjang,0)) as adidas_yd,
	SUM(if(pelanggan like '%ADIDAS%',jml_bs,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',kg_bs,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',panjang,0)) as lulu_yd,
	SUM(if(pelanggan like '%LULU%',jml_bs,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',kg_bs,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',panjang,0)) as lain_yd,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_bs,0)) as lain_roll,
	SUM(kg_bs) as tot_kg,
	SUM(panjang) as tot_yd,
	SUM(jml_bs) as tot_roll		
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING'
	and inspektor = 'PACKING B'");
      $rowPBB = mysqli_fetch_array($qryPBB);
      ?>    
          <tr>
            <td align="center">PACKING B</td>
            <td align="center"><?php echo round($rowPBB['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBB['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBB['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBB['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBB['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBB['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBB['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBB['tot_kg'], 2), 2); ?></td>
          </tr>
    <?php
    $qryPCB = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',kg_bs,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',panjang,0)) as adidas_yd,
	SUM(if(pelanggan like '%ADIDAS%',jml_bs,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',kg_bs,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',panjang,0)) as lulu_yd,
	SUM(if(pelanggan like '%LULU%',jml_bs,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',kg_bs,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',panjang,0)) as lain_yd,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_bs,0)) as lain_roll,
	SUM(kg_bs) as tot_kg,
	SUM(panjang) as tot_yd,
	SUM(jml_bs) as tot_roll		
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING'
	and inspektor = 'PACKING C'");
    $rowPCB = mysqli_fetch_array($qryPCB);
    ?>      
          <tr>
            <td align="center">PACKING C</td>
            <td align="center"><?php echo round($rowPCB['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCB['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCB['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCB['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCB['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCB['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCB['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCB['tot_kg'], 2), 2); ?></td>
          </tr>
          <?php
          $total_radiB = round($rowPAB['adidas_roll']) + round($rowPBB['adidas_roll']) + round($rowPCB['adidas_roll']);
          $total_kgadiB = round($rowPAB['adidas_kg'], 2) + round($rowPBB['adidas_kg'], 2) + round($rowPCB['adidas_kg'], 2);
          $total_yadiB = round($rowPAB['adidas_yd'], 2) + round($rowPBB['adidas_yd'], 2) + round($rowPCB['adidas_yd'], 2);
          $total_rluluB = round($rowPAB['lulu_roll']) + round($rowPBB['lulu_roll']) + round($rowPCB['lulu_roll']);
          $total_kgluluB = round($rowPAB['lulu_kg'], 2) + round($rowPBB['lulu_kg'], 2) + round($rowPCB['lulu_kg'], 2);
          $total_yluluB = round($rowPAB['lulu_yd'], 2) + round($rowPBB['lulu_yd'], 2) + round($rowPCB['lulu_yd'], 2);
          $total_rdllB = round($rowPAB['lain_roll']) + round($rowPBB['lain_roll']) + round($rowPCB['lain_roll']);
          $total_kgdllB = round($rowPAB['lain_kg'], 2) + round($rowPBB['lain_kg'], 2) + round($rowPCB['lain_kg'], 2);
          $total_ydllB = round($rowPAB['lain_yd'], 2) + round($rowPBB['lain_yd'], 2) + round($rowPCB['lain_yd'], 2);
          $t_rollB = round($rowPAB['tot_roll']) + round($rowPBB['tot_roll']) + round($rowPCB['tot_roll']);
          $t_kgB = round($rowPAB['tot_kg'], 2) + round($rowPBB['tot_kg'], 2) + round($rowPCB['tot_kg'], 2);
          $t_yardB = round($rowPAB['tot_yd'], 2) + round($rowPBB['tot_yd'], 2) + round($rowPCB['tot_yd'], 2);

          if ($Awal != "") {
            if ($total_kgluluB != 0) {
              $persen_kgluluB = number_format(($total_kgluluB / ($total_kgluluB + $total_kgadiB + $total_kgdllB)) * 100, 2);
            } else {
              $persen_kgluluB = 0;
            }
            if ($total_yluluB != 0) {
              $persen_yluluB = number_format(($total_yluluB / ($total_yluluB + $total_yadiB + $total_ydllB)) * 100, 2);
            } else {
              $persen_yluluB = 0;
            }
            if ($total_kgadiB != 0) {
              $persen_kgadiB = number_format(($total_kgadiB / ($total_kgluluB + $total_kgadiB + $total_kgdllB)) * 100, 2);
            } else {
              $persen_kgadiB = 0;
            }
            if ($total_yadiB != 0) {
              $persen_yadiB = number_format(($total_yadiB / ($total_yluluB + $total_yadiB + $total_ydllB)) * 100, 2);
            } else {
              $persen_yadiB = 0;
            }
            if ($total_kgdllB != 0) {
              $persen_kgdllB = number_format(($total_kgdllB / ($total_kgluluB + $total_kgadiB + $total_kgdllB)) * 100, 2);
            } else {
              $persen_kgdllB = 0;
            }
            if ($total_ydllB != 0) {
              $persen_ydllB = number_format(($total_ydllB / ($total_yluluB + $total_yadiB + $total_ydllB)) * 100, 2);
            } else {
              $persen_ydllB = 0;
            }
          }
          ?>
          <tr>
            <td align="center"><strong>TOTAL</strong></td>
            <td align="center"><strong><?php echo $total_radiB; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgadiB; ?></strong></td>
            <td align="center"><strong><?php echo $total_rluluB; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgluluB; ?></strong></td>
            <td align="center"><strong><?php echo $total_rdllB; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgdllB; ?></strong></td>
            <td align="center"><strong><?php echo $t_rollB; ?></strong></td>
            <td align="center"><strong><?php echo $t_kgB; ?></strong></td>
            </tr> 
          <tr>
            <td align="center">%</td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgadiB; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgluluB; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgdllB; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            </tr>
          <?php
          $qrysisa = mysqli_query($con, "SELECT * FROM tbl_sisa_packing WHERE tgl_sisa='$Awal'");
          $rowsisa = mysqli_fetch_array($qrysisa);
          ?>
          <tr>
            <td colspan="2" align="center" valign="middle">SISA SIAP PACKING</td>
            <td colspan="7" align="left"><?php if ($rowsisa['sisa_packing'] != "") {
              echo $rowsisa['sisa_packing'];
            } else {
              echo "0";
            } ?></td>
            </tr> 
          </tbody>
        </table>
</div>
</div>	
</div>	
<div class="col-xs-6">
<div class="box">
  <div class="box-header with-border">
  <h3 class="box-title"> Tahanan </h3>
  </div>
<div class="box-body">	
<table class="table table-bordered table-striped" style="width: 100%;">
          <thead class="bg-blue">
            <tr>
              <th width="9%" rowspan="2"><div align="center">SHIFT</div></th>
              <th colspan="2"><div align="center">ADIDAS</div></th>
              <th colspan="2"><div align="center">LULULEMON</div></th>
              <th colspan="2"><div align="center">DLL</div></th>
              <th colspan="2"><div align="center">TOTAL</div></th>
            </tr>
            <tr>
              <th width="12%"><div align="center">ROLL</div></th>
              <th width="10%"><div align="center">KG</div></th>
              <th width="13%"><div align="center">ROLL</div></th>
              <th width="11%"><div align="center">KG</div></th>
              <th width="12%"><div align="center">ROLL</div></th>
              <th width="11%"><div align="center">KG</div></th>
              <th width="11%"><div align="center">ROLL</div></th>
              <th width="11%"><div align="center">KG</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
          $t_rollT = 0;
          $t_kgT = 0;
          $t_yardT = 0;
          $total_rluluT = $total_kgluluT = $total_yluluT = $total_radiT = $total_kgadiT = $total_yadiT = $total_rdllT = $total_kgdllT = $total_ydllT = 0;
          $persen_kgluluT = $persen_yluluT = $persen_kgadiT = $persen_yadiT = $persen_kgdllT = $persen_ydllT = 0;
          ?>
      <?php
      $qryPAT = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',kg_th,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',panjang,0)) as adidas_yd,
	SUM(if(pelanggan like '%ADIDAS%',jml_th,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',kg_th,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',panjang,0)) as lulu_yd,
	SUM(if(pelanggan like '%LULU%',jml_th,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',kg_th,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',panjang,0)) as lain_yd,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_th,0)) as lain_roll,
	SUM(kg_th) as tot_kg,
	SUM(panjang) as tot_yd,
	SUM(jml_th) as tot_roll		
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING'
	and inspektor = 'PACKING A'");
      $rowPAT = mysqli_fetch_array($qryPAT);
      ?>      
          <tr>
            <td align="center">PACKING A</td>
            <td align="center"><?php echo round($rowPAT['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAT['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAT['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAT['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAT['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAT['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAT['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAT['tot_kg'], 2), 2); ?></td>
          </tr>
    <?php
    $qryPBT = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',kg_th,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',panjang,0)) as adidas_yd,
	SUM(if(pelanggan like '%ADIDAS%',jml_th,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',kg_th,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',panjang,0)) as lulu_yd,
	SUM(if(pelanggan like '%LULU%',jml_th,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',kg_th,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',panjang,0)) as lain_yd,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_th,0)) as lain_roll,
	SUM(kg_th) as tot_kg,
	SUM(panjang) as tot_yd,
	SUM(jml_th) as tot_roll		
from
	tbl_lap_inspeksi
where
	DATE_FORMAT( CONCAT(tgl_update,' ',jam_update), '%Y-%m-%d %H:%i') between '$start_date' and '$stop_date'
	and `dept` = 'PACKING'
	and inspektor = 'PACKING B'");
    $rowPBT = mysqli_fetch_array($qryPBT);
    ?>    
          <tr>
            <td align="center">PACKING B</td>
            <td align="center"><?php echo round($rowPBT['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBT['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBT['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBT['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBT['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBT['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBT['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBT['tot_kg'], 2), 2); ?></td>
          </tr>
    <?php
    $qryPCT = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',kg_th,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',panjang,0)) as adidas_yd,
	SUM(if(pelanggan like '%ADIDAS%',jml_th,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',kg_th,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',panjang,0)) as lulu_yd,
	SUM(if(pelanggan like '%LULU%',jml_th,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',kg_th,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',panjang,0)) as lain_yd,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_th,0)) as lain_roll,
	SUM(kg_th) as tot_kg,
	SUM(panjang) as tot_yd,
	SUM(jml_th) as tot_roll		
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING'
	and inspektor = 'PACKING C'");
    $rowPCT = mysqli_fetch_array($qryPCT);
    ?>    
          <tr>
            <td align="center">PACKING C</td>
            <td align="center"><?php echo round($rowPCT['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCT['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCT['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCT['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCT['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCT['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCT['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCT['tot_kg'], 2), 2); ?></td>
          </tr>
          <?php
          $total_radiT = round($rowPAT['adidas_roll']) + round($rowPBT['adidas_roll']) + round($rowPCT['adidas_roll']);
          $total_kgadiT = round($rowPAT['adidas_kg'], 2) + round($rowPBT['adidas_kg'], 2) + round($rowPCT['adidas_kg'], 2);
          $total_yadiT = round($rowPAT['adidas_yd'], 2) + round($rowPBT['adidas_yd'], 2) + round($rowPCT['adidas_yd'], 2);
          $total_rluluT = round($rowPAT['lulu_roll']) + round($rowPBT['lulu_roll']) + round($rowPCT['lulu_roll']);
          $total_kgluluT = round($rowPAT['lulu_kg'], 2) + round($rowPBT['lulu_kg'], 2) + round($rowPCT['lulu_kg'], 2);
          $total_yluluT = round($rowPAT['lulu_yd'], 2) + round($rowPBT['lulu_yd'], 2) + round($rowPCT['lulu_yd'], 2);
          $total_rdllT = round($rowPAT['lain_roll']) + round($rowPBT['lain_roll']) + round($rowPCT['lain_roll']);
          $total_kgdllT = round($rowPAT['lain_kg'], 2) + round($rowPBT['lain_kg'], 2) + round($rowPCT['lain_kg'], 2);
          $total_ydllT = round($rowPAT['lain_yd'], 2) + round($rowPBT['lain_yd'], 2) + round($rowPCT['lain_yd'], 2);
          $t_rollT = round($rowPAT['tot_roll']) + round($rowPBT['tot_roll']) + round($rowPCT['tot_roll']);
          $t_kgT = round($rowPAT['tot_kg'], 2) + round($rowPBT['tot_kg'], 2) + round($rowPCT['tot_kg'], 2);
          $t_yardT = round($rowPAT['tot_yd'], 2) + round($rowPBT['tot_yd'], 2) + round($rowPCT['tot_yd'], 2);

          if ($Awal != "") {
            if ($total_kgluluT != 0) {
              $persen_kgluluT = number_format(($total_kgluluT / ($total_kgluluT + $total_kgadiT + $total_kgdllT)) * 100, 2);
            } else {
              $persen_kgluluT = 0;
            }
            if ($total_yluluT != 0) {
              $persen_yluluT = number_format(($total_yluluT / ($total_yluluT + $total_yadiT + $total_ydllT)) * 100, 2);
            } else {
              $persen_yluluT = 0;
            }
            if ($total_kgadiT != 0) {
              $persen_kgadiT = number_format(($total_kgadiT / ($total_kgluluT + $total_kgadiT + $total_kgdllT)) * 100, 2);
            } else {
              $persen_kgadiT = 0;
            }
            if ($total_yadiT != 0) {
              $persen_yadiT = number_format(($total_yadiT / ($total_yluluT + $total_yadiT + $total_ydllT)) * 100, 2);
            } else {
              $persen_yadiT = 0;
            }
            if ($total_kgdllT != 0) {
              $persen_kgdllT = number_format(($total_kgdllT / ($total_kgluluT + $total_kgadiT + $total_kgdllT)) * 100, 2);
            } else {
              $persen_kgdllT = 0;
            }
            if ($total_ydllT != 0) {
              $persen_ydllT = number_format(($total_ydllT / ($total_yluluT + $total_yadiT + $total_ydllT)) * 100, 2);
            } else {
              $persen_ydllT = 0;
            }
          }
          ?>
          <tr>
            <td align="center"><strong>TOTAL</strong></td>
            <td align="center"><strong><?php echo $total_radiT; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgadiT; ?></strong></td>
            <td align="center"><strong><?php echo $total_rluluT; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgluluT; ?></strong></td>
            <td align="center"><strong><?php echo $total_rdllT; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgdllT; ?></strong></td>
            <td align="center"><strong><?php echo $t_rollT; ?></strong></td>
            <td align="center"><strong><?php echo $t_kgT; ?></strong></td>
            </tr> 
          <tr>
            <td align="center">%</td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgadiT; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgluluT; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgdllT; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            </tr>
          <?php
          $qrysisa = mysqli_query($con, "SELECT * FROM tbl_sisa_packing WHERE tgl_sisa='$Awal'");
          $rowsisa = mysqli_fetch_array($qrysisa);
          ?>
          <tr>
            <td colspan="2" align="center" valign="middle">SISA SIAP PACKING</td>
            <td colspan="7" align="left"><?php if ($rowsisa['sisa_packing'] != "") {
              echo $rowsisa['sisa_packing'];
            } else {
              echo "0";
            } ?></td>
            </tr> 
          </tbody>
        </table>
</div>
</div>	
</div>
  </div>
<div class="row">	
<div class="col-xs-7">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> Mutasi GKG</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-striped" style="width: 100%;">
          <thead class="bg-blue">
            <tr>
              <th width="7%" rowspan="2"><div align="center">SHIFT_MUTASI</div></th>
              <th colspan="3"><div align="center">ADIDAS</div></th>
              <th colspan="3"><div align="center">LULULEMON</div></th>
              <th colspan="3"><div align="center">DLL</div></th>
              <th colspan="3"><div align="center">TOTAL</div></th>
            </tr>
            <tr>
              <th width="6%"><div align="center">ROLL</div></th>
              <th width="9%"><div align="center">KG</div></th>
              <th width="7%"><div align="center">YARD</div></th>
              <th width="8%"><div align="center">ROLL</div></th>
              <th width="8%"><div align="center">KG</div></th>
              <th width="7%"><div align="center">YARD</div></th>
              <th width="9%"><div align="center">ROLL</div></th>
              <th width="7%"><div align="center">KG</div></th>
              <th width="7%"><div align="center">YARD</div></th>
              <th width="8%"><div align="center">ROLL</div></th>
              <th width="8%"><div align="center">KG</div></th>
              <th width="9%"><div align="center">YARD</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
          $t_roll = 0;
          $t_kg = 0;
          $t_yard = 0;
          $total_rlulu = $total_kglulu = $total_ylulu = $total_radi = $total_kgadi = $total_yadi = $total_rdll = $total_kgdll = $total_ydll = 0;
          $persen_kglulu = $persen_ylulu = $persen_kgadi = $persen_yadi = $persen_kgdll = $persen_ydll = 0;
          ?>
      <?php
      $qryPAG = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',netto,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',panjang,0)) as adidas_yd,
	SUM(if(pelanggan like '%ADIDAS%',jml_netto,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',netto,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',panjang,0)) as lulu_yd,
	SUM(if(pelanggan like '%LULU%',jml_netto,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',netto,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',panjang,0)) as lain_yd,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_netto,0)) as lain_roll,
	SUM(netto) as tot_kg,
	SUM(panjang) as tot_yd,
	SUM(jml_netto) as tot_roll	
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING'
	and `sts_gkg` = '1'
	and inspektor = 'PACKING A'");
      $rowPAG = mysqli_fetch_array($qryPAG);
      ?>      
          <tr>
            <td align="center">PACKING A</td>
            <td align="center"><?php echo round($rowPAG['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAG['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPAG['adidas_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAG['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAG['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPAG['lulu_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAG['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAG['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPAG['lain_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPAG['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPAG['tot_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPAG['tot_yd'], 2), 2); ?></td>
          </tr>
    <?php
    $qryPBG = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',netto,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',panjang,0)) as adidas_yd,
	SUM(if(pelanggan like '%ADIDAS%',jml_netto,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',netto,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',panjang,0)) as lulu_yd,
	SUM(if(pelanggan like '%LULU%',jml_netto,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',netto,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',panjang,0)) as lain_yd,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_netto,0)) as lain_roll,
	SUM(netto) as tot_kg,
	SUM(panjang) as tot_yd,
	SUM(jml_netto) as tot_roll	
from
	tbl_lap_inspeksi
where
   $Where
   `dept` = 'PACKING'
	and `sts_gkg` = '1'
	and inspektor = 'PACKING B'");
    $rowPBG = mysqli_fetch_array($qryPBG);
    ?>    
          <tr>
            <td align="center">PACKING B</td>
            <td align="center"><?php echo round($rowPBG['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBG['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPBG['adidas_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBG['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBG['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPBG['lulu_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBG['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBG['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPBG['lain_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPBG['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPBG['tot_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPBG['tot_yd'], 2), 2); ?></td>
          </tr>
    <?php
    $qryPCG = mysqli_query($con, " 
select
	SUM(if(pelanggan like '%ADIDAS%',netto,0)) as adidas_kg,
	SUM(if(pelanggan like '%ADIDAS%',panjang,0)) as adidas_yd,
	SUM(if(pelanggan like '%ADIDAS%',jml_netto,0)) as adidas_roll,
	SUM(if(pelanggan like '%LULU%',netto,0)) as lulu_kg,
	SUM(if(pelanggan like '%LULU%',panjang,0)) as lulu_yd,
	SUM(if(pelanggan like '%LULU%',jml_netto,0)) as lulu_roll,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',netto,0)) as lain_kg,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',panjang,0)) as lain_yd,
	SUM(if(pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%',jml_netto,0)) as lain_roll,
	SUM(netto) as tot_kg,
	SUM(panjang) as tot_yd,
	SUM(jml_netto) as tot_roll	
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING'
	and `sts_gkg` = '1'
	and inspektor = 'PACKING C'");
    $rowPCG = mysqli_fetch_array($qryPCG);
    ?>    
          <tr>
            <td align="center">PACKING C</td>
            <td align="center"><?php echo round($rowPCG['adidas_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCG['adidas_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPCG['adidas_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCG['lulu_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCG['lulu_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPCG['lulu_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCG['lain_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCG['lain_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPCG['lain_yd'], 2), 2); ?></td>
            <td align="center"><?php echo round($rowPCG['tot_roll']); ?></td>
            <td align="center"><?php echo number_format(round($rowPCG['tot_kg'], 2), 2); ?></td>
            <td align="center"><?php echo number_format(round($rowPCG['tot_yd'], 2), 2); ?></td>
          </tr>
          <?php
          $total_radi = round($rowPAG['adidas_roll']) + round($rowPBG['adidas_roll']) + round($rowPCG['adidas_roll']);
          $total_kgadi = round($rowPAG['adidas_kg'], 2) + round($rowPBG['adidas_kg'], 2) + round($rowPCG['adidas_kg'], 2);
          $total_yadi = round($rowPAG['adidas_yd'], 2) + round($rowPBG['adidas_yd'], 2) + round($rowPCG['adidas_yd'], 2);
          $total_rlulu = round($rowPAG['lulu_roll']) + round($rowPBG['lulu_roll']) + round($rowPCG['lulu_roll']);
          $total_kglulu = round($rowPAG['lulu_kg'], 2) + round($rowPBG['lulu_kg'], 2) + round($rowPCG['lulu_kg'], 2);
          $total_ylulu = round($rowPAG['lulu_yd'], 2) + round($rowPBG['lulu_yd'], 2) + round($rowPCG['lulu_yd'], 2);
          $total_rdll = round($rowPAG['lain_roll']) + round($rowPBG['lain_roll']) + round($rowPCG['lain_roll']);
          $total_kgdll = round($rowPAG['lain_kg'], 2) + round($rowPBG['lain_kg'], 2) + round($rowPCG['lain_kg'], 2);
          $total_ydll = round($rowPAG['lain_yd'], 2) + round($rowPBG['lain_yd'], 2) + round($rowPCG['lain_yd'], 2);
          $t_roll = round($rowPAG['tot_roll']) + round($rowPBG['tot_roll']) + round($rowPCG['tot_roll']);
          $t_kg = round($rowPAG['tot_kg'], 2) + round($rowPBG['tot_kg'], 2) + round($rowPCG['tot_kg'], 2);
          $t_yard = round($rowPAG['tot_yd'], 2) + round($rowPBG['tot_yd'], 2) + round($rowPCG['tot_yd'], 2);

          if ($Awal != "") {
            if ($total_kglulu != 0) {
              $persen_kglulu = number_format(($total_kglulu / ($total_kglulu + $total_kgadi + $total_kgdll)) * 100, 2);
            } else {
              $persen_kglulu = 0;
            }
            if ($total_ylulu != 0) {
              $persen_ylulu = number_format(($total_ylulu / ($total_ylulu + $total_yadi + $total_ydll)) * 100, 2);
            } else {
              $persen_ylulu = 0;
            }
            if ($total_kgadi != 0) {
              $persen_kgadi = number_format(($total_kgadi / ($total_kglulu + $total_kgadi + $total_kgdll)) * 100, 2);
            } else {
              $persen_kgadi = 0;
            }
            if ($total_yadi != 0) {
              $persen_yadi = number_format(($total_yadi / ($total_ylulu + $total_yadi + $total_ydll)) * 100, 2);
            } else {
              $persen_yadi = 0;
            }
            if ($total_kgdll != 0) {
              $persen_kgdll = number_format(($total_kgdll / ($total_kglulu + $total_kgadi + $total_kgdll)) * 100, 2);
            } else {
              $persen_kgdll = 0;
            }
            if ($total_ydll != 0) {
              $persen_ydll = number_format(($total_ydll / ($total_ylulu + $total_yadi + $total_ydll)) * 100, 2);
            } else {
              $persen_ydll = 0;
            }
          }
          ?>
          <tr>
            <td align="center"><strong>TOTAL</strong></td>
            <td align="center"><strong><?php echo $total_radi; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgadi; ?></strong></td>
            <td align="center"><strong><?php echo $total_yadi; ?></strong></td>
            <td align="center"><strong><?php echo $total_rlulu; ?></strong></td>
            <td align="center"><strong><?php echo $total_kglulu; ?></strong></td>
            <td align="center"><strong><?php echo $total_ylulu; ?></strong></td>
            <td align="center"><strong><?php echo $total_rdll; ?></strong></td>
            <td align="center"><strong><?php echo $total_kgdll; ?></strong></td>
            <td align="center"><strong><?php echo $total_ydll; ?></strong></td>
            <td align="center"><strong><?php echo $t_roll; ?></strong></td>
            <td align="center"><strong><?php echo $t_kg; ?></strong></td>
            <td align="center"><strong><?php echo $t_yard; ?></strong></td>
          </tr> 
          <tr>
            <td align="center">%</td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgadi; ?></td>
            <td align="center"><?php echo $persen_yadi; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kglulu; ?></td>
            <td align="center"><?php echo $persen_ylulu; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $persen_kgdll; ?></td>
            <td align="center"><?php echo $persen_ydll; ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <?php
          $qrysisa = mysqli_query($con, "SELECT * FROM tbl_sisa_packing WHERE tgl_sisa='$Awal'");
          $rowsisa = mysqli_fetch_array($qrysisa);
          ?>
          <tr>
            <td colspan="2" align="center" valign="middle">SISA SIAP PACKING</td>
            <td colspan="4" align="left"><?php if ($rowsisa['sisa_packing'] != "") {
              echo $rowsisa['sisa_packing'];
            } else {
              echo "0";
            } ?></td>
            <td colspan="7" align="center">&nbsp;</td>
          </tr> 
          </tbody>
        </table>
      </div>
    </div>
  </div>
<div class="col-xs-5">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> Per Shift</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-striped" style="width: 100%;">
          <thead class="bg-blue">
            <tr>
              <th width="9%"><div align="center">KET</div></th>
              <th width="20%"><div align="center">SHIFT A</div></th>
              <th width="23%"><div align="center">SHIFT B</div></th>
              <th width="23%"><div align="center">SHIFT C</div></th>
              <th width="25%"><div align="center">TOTAL</div></th>
            </tr>
       </thead>	
          <tbody>
     <?php
     $qryOK = mysqli_query($con, " 
select round(sum(if(inspektor='PACKING A',netto,'0')),2) as PACKING_A,
round(sum(if(inspektor='PACKING B',netto,'0')),2) as PACKING_B,	
round(sum(if(inspektor='PACKING C',netto,'0')),2) as PACKING_C,
round(sum(netto),2) as TOTAL
from
	tbl_lap_inspeksi
where
	$Where
	`dept` = 'PACKING'
	and `sts_gkg` = '0'");
     $rowOK = mysqli_fetch_array($qryOK);
     ?>    
          <tr>
              <td>OK</td>
              <td align="right"><?php echo round($rowOK['PACKING_A'], 2); ?></td>
              <td align="right"><?php echo round($rowOK['PACKING_B'], 2); ?></td>
              <td align="right"><?php echo round($rowOK['PACKING_C'], 2); ?></td>
              <td align="right"><strong><?php echo round($rowOK['TOTAL'], 2); ?></strong></td>
            </tr>
      <?php
      $qryTH = mysqli_query($con, " 
select round(sum(if(inspektor='PACKING A',kg_th,'0')),2) as PACKING_A,
round(sum(if(inspektor='PACKING B',kg_th,'0')),2) as PACKING_B,	
round(sum(if(inspektor='PACKING C',kg_th,'0')),2) as PACKING_C,
round(sum(kg_th),2) as TOTAL
from
	tbl_lap_inspeksi
where
	$Where `dept` = 'PACKING'");
      $rowTH = mysqli_fetch_array($qryTH);
      ?>      
            <tr>
              <td>TH</td>
              <td align="right"><?php echo round($rowTH['PACKING_A'], 2); ?></td>
              <td align="right"><?php echo round($rowTH['PACKING_B'], 2); ?></td>
              <td align="right"><?php echo round($rowTH['PACKING_C'], 2); ?></td>
              <td align="right"><strong><?php echo round($rowTH['TOTAL'], 2); ?></strong></td>
            </tr>
      <?php
      $qryBS = mysqli_query($con, " 
select round(sum(if(inspektor='PACKING A',kg_bs,'0')),2) as PACKING_A,
round(sum(if(inspektor='PACKING B',kg_bs,'0')),2) as PACKING_B,	
round(sum(if(inspektor='PACKING C',kg_bs,'0')),2) as PACKING_C,
round(sum(kg_bs),2) as TOTAL
from
	tbl_lap_inspeksi
where
	$Where `dept` = 'PACKING'");
      $rowBS = mysqli_fetch_array($qryBS);
      ?>    
            <tr>
              <td>BS</td>
              <td align="right"><?php echo round($rowBS['PACKING_A'], 2); ?></td>
              <td align="right"><?php echo round($rowBS['PACKING_B'], 2); ?></td>
              <td align="right"><?php echo round($rowBS['PACKING_C'], 2); ?></td>
              <td align="right"><strong><?php echo round($rowBS['TOTAL'], 2); ?></strong></td>
            </tr>
<?php
$qryPST = mysqli_query($con, " 
select round(sum(if(inspektor='PACKING A',netto,'0')),2) as PACKING_A,
round(sum(if(inspektor='PACKING B',netto,'0')),2) as PACKING_B,	
round(sum(if(inspektor='PACKING C',netto,'0')),2) as PACKING_C,
round(sum(netto),2) as TOTAL
from
	tbl_lap_inspeksi
where
	$Where `dept` = 'PACKING'
	and `sts_gkg` = '1'");
$rowPST = mysqli_fetch_array($qryPST);
?>          
            <tr>
              <td>PRESET</td>
              <td align="right"><?php echo round($rowPST['PACKING_A'], 2); ?></td>
              <td align="right"><?php echo round($rowPST['PACKING_B'], 2); ?></td>
              <td align="right"><?php echo round($rowPST['PACKING_C'], 2); ?></td>
              <td align="right"><strong><?php echo round($rowPST['TOTAL'], 2); ?></strong></td>
            </tr>
            <tr>
              <td><strong>TOTAL</strong></td>
              <td align="right"><strong><?php echo round($rowOK['PACKING_A'], 2) + round($rowTH['PACKING_A'], 2) + round($rowBS['PACKING_A'], 2) + round($rowPST['PACKING_A'], 2); ?></strong></td>
              <td align="right"><strong><?php echo round($rowOK['PACKING_B'], 2) + round($rowTH['PACKING_B'], 2) + round($rowBS['PACKING_B'], 2) + round($rowPST['PACKING_B'], 2); ?></strong></td>
              <td align="right"><strong><?php echo round($rowOK['PACKING_C'], 2) + round($rowTH['PACKING_C'], 2) + round($rowBS['PACKING_C'], 2) + round($rowPST['PACKING_C'], 2); ?></strong></td>
              <td align="right">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="right"><strong>TOTAL</strong></td>
              <td align="right"><strong><?php echo $rowOK['TOTAL'] + $rowTH['TOTAL'] + $rowBS['TOTAL'] + $rowPST['TOTAL']; ?></strong></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>	
</div>	
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data Laporan Packing</h3><br>
        <?php if ($_POST['awal'] != "") { ?><b>Periode: <?php echo $_POST['awal']." ".$_POST['jam_awal'] . " to " . $_POST['akhir']." ".$_POST['jam_akhir']; ?></b>
        <?php } ?><br>
        <?php if ($_POST['gshift'] != "") { ?><b>Shift: <?php echo $_POST['gshift']; ?></b>
        <?php } ?><br>
        <?php if ($_POST['group'] != "") { ?><b>Group: <?php echo $_POST['group']; ?></b>
        <?php } ?><br>
        <?php if ($_POST['nomc'] != "") { ?><b>No MC: <?php echo $_POST['nomc']; ?></b>
        <?php } ?>
        <div class="pull-right">
		  <a href="pages/cetak/cetak-hasil-packing-shift-personil.php?awal=<?php echo $_POST['awal']; ?>&jam1=<?php echo $_POST['jam_awal'];?>&akhir=<?php echo $_POST['akhir']; ?>&jam2=<?php echo $_POST['jam_akhir'];?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if ($_POST['awal'] == "") {
                           echo "disabled";
                         } ?>" target="_blank">Cetak Hasil Packing Shift Personil</a>	
		  <a href="pages/cetak/cetak-hasil-packing-shift.php?awal=<?php echo $_POST['awal']; ?>&jam1=<?php echo $_POST['jam_awal'];?>&akhir=<?php echo $_POST['akhir']; ?>&jam2=<?php echo $_POST['jam_akhir'];?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if ($_POST['awal'] == "") {
                           echo "disabled";
                         } ?>" target="_blank">Cetak Hasil Packing Shift</a>
		  <a href="pages/cetak/cetak-hasil-packing-shift-excel.php?awal=<?php echo $_POST['awal']; ?>&jam1=<?php echo $_POST['jam_awal'];?>&akhir=<?php echo $_POST['akhir']; ?>&jam2=<?php echo $_POST['jam_akhir'];?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if ($_POST['awal'] == "") {
                           echo "disabled";
                         } ?>" target="_blank">Cetak Hasil Packing Shift xls</a>	
          <a href="pages/cetak/cetak-hasil-packing.php?awal=<?php echo $_POST['awal']; ?>&jam1=<?php echo $_POST['jam_awal'];?>&akhir=<?php echo $_POST['akhir']; ?>&jam2=<?php echo $_POST['jam_akhir'];?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if ($_POST['awal'] == "") {
                           echo "disabled";
                         } ?>" target="_blank">Cetak Hasil Packing</a> 
          <a href="pages/cetak/cetak-reports-packing.php?awal=<?php echo $_POST['awal']; ?>&jam1=<?php echo $_POST['jam_awal'];?>&akhir=<?php echo $_POST['akhir']; ?>&jam2=<?php echo $_POST['jam_akhir'];?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if ($_POST['awal'] == "") {
                           echo "disabled";
                         } ?>" target="_blank">Cetak</a> 
          <a href="pages/cetak/lap-packing-excel.php?awal=<?php echo $_POST['awal']; ?>&jam1=<?php echo $_POST['jam_awal'];?>&akhir=<?php echo $_POST['akhir']; ?>&jam2=<?php echo $_POST['jam_akhir'];?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if ($_POST['awal'] == "") {
                           echo "disabled";
                         } ?>" target="_blank">Cetak Excel</a>
          <a href="pages/cetak/cetak_excel_lap_packing.php?awal=<?php echo $_POST['awal']; ?>&jam1=<?php echo $_POST['jam_awal'];?>&akhir=<?php echo $_POST['akhir']; ?>&jam2=<?php echo $_POST['jam_akhir'];?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if ($_POST['awal'] == "") {
                           echo "disabled";
                         } ?>" target="_blank">Lap Packing Harian</a> 
          <a href="pages/cetak/cetak_excel_stock_paper_tube.php?awal=<?php echo $_POST['awal']; ?>&jam1=<?php echo $_POST['jam_awal'];?>&akhir=<?php echo $_POST['akhir']; ?>&jam2=<?php echo $_POST['jam_akhir'];?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if ($_POST['awal'] == "") {
                           echo "disabled";
                         } ?>" target="_blank">Stock Paper Tube</a> 
        </div>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example1" style="width:100%">
          <thead class="bg-blue">
            
            <tr>
              <th rowspan="2"><div align="center">No</div></th>
              <th rowspan="2"><div align="center">Aksi</div></th>
              <th rowspan="2"><div align="center">No KK</div></th>
              <th rowspan="2"><div align="center">Demand No</div></th>
              <th rowspan="2"><div align="center">Pelanggan</div></th>
              <th rowspan="2"><div align="center">Order</div></th>
              <th rowspan="2"><div align="center">Jenis Kain</div></th>
              <th rowspan="2">Item</th>
              <th rowspan="2">Hanger</th>
              <th rowspan="2"><div align="center">Warna</div></th>
              <th rowspan="2"><div align="center">Tgl Pengiriman</div></th>
              <th rowspan="2"><div align="center">Lot</div></th>
              <th rowspan="2"><div align="center">Nama</div></th>
              <th rowspan="2"><div align="center">No MC</div></th>
              <th colspan="2">
                <div align="center">Qty Bruto</div>
              </th>
              <th rowspan="2"><div align="center">Netto</div></th>
              <th rowspan="2"><div align="center">Yard / Meter</div></th>
              <th colspan="2">
                <div align="center">Qty BS</div>
              </th>
              <th colspan="2"> <div align="center">Loss</div>
              </th>
              <th rowspan="2"><div align="center">Proses</div></th>
              <th rowspan="2"><div align="center">Status</div></th>
              <th rowspan="2"><div align="center">Keterangan</div></th>
              <th rowspan="2">
                <div align="center">Kategori BS</div>
              </th>
              <th rowspan="2">
                <div align="center">Department Penyebab</div>
              </th>
              <th rowspan="2">
                <div align="center">Operator</div>
              </th>
              <th colspan="2"><div align="center">KQ</div></th>
              <th colspan="2"><div align="center">BQ</div></th>
              <th colspan="2"><div align="center">KF</div></th>
              <th colspan="2"><div align="center">BF</div></th>
            </tr>

            <tr>
              <th>Roll</th>
              <th>Kg</th>
              <th>Roll</th>
              <th>Kg</th>
              <th>Kg</th>
              <th>Note</th>

              <th>Kg</th>
              <th>Note</th>
              <th>Kg</th>
              <th>Note</th>
              <th>Kg</th>
              <th>Note</th>
              <th>Kg</th>
              <th>Note</th>
            </tr>
            
          </thead>
          <tbody>
          <?php
          $no = 1;
          if ($GShift != "ALL") {
            $shft = " AND `shift`='$GShift' ";
          } else {
            $shft = " ";
          }
          if ($MC != "ALL") {
            $nomc = " AND `no_mc` LIKE '%$MC' ";
          } else {
            $nomc = " ";
          }
          if ($Group != "ALL") {
            $grp = " AND `inspektor`='$Group' ";
          } else {
            $grp = " ";
          }
          if ($Awal != "" and $Akhir != "") {
            $qry1 = mysqli_query($con, "SELECT * FROM tbl_lap_inspeksi WHERE $Where `dept`='PACKING' $shft $nomc $grp ORDER BY id ASC");
          } else {
            $qry1 = mysqli_query($con, "SELECT * FROM tbl_lap_inspeksi WHERE $Where `dept`='PACKING' $shft $nomc $grp ORDER BY id ASC");
          }
          while ($row1 = mysqli_fetch_array($qry1)) {
            ?>
                                                    <tr bgcolor="<?php echo $bgcolor; ?>">
                                                      <td align="center"><?php echo $no; ?></td>
                                                      <td align="center"><div class="btn-group">
                                                      <a href="#" class="btn btn-danger btn-xs <?php if ($_SESSION['akses'] == 'biasa' and ($_SESSION['lvl_id'] != 'PACKING' or $_SESSION['lvl_id'] != 'NCP')) {
                                                        echo "disabled";
                                                      } ?>" onclick="confirm_delete('./HapusDataPacking-<?php echo $row1['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a>
                                                      </div></td>
                                                      <td align="center"><?php echo $row1['nokk']; ?></td>
                                                      <td><?php echo $row1['nodemand']; ?></td>
                                                      <td><?php echo $row1['pelanggan']; ?></td>
                                                      <td align="center"><?php echo $row1['no_order']; ?></td>
                                                      <td><?php echo substr($row1['jenis_kain'], 0, 15) . "..."; ?></td>
                                                      <td align="left"><?php echo $row1['no_item']; ?></td>
                                                      <td align="left"><?php echo $row1['no_hanger']; ?></td>
                                                      <td align="left"><?php echo substr($row1['warna'], 0, 10) . "..."; ?></td>
                                                      <td align="center"><?php echo $row1['tgl_pengiriman']; ?></td>
                                                      <td align="center"><?php echo $row1['lot']; ?></td>
                                                      <td align="center"><?php echo $row1['inspektor']; ?></td>
                                                      <td align="center"><?php echo $row1['no_mc']; ?></td>
                                                      <!-- <td align="center"><?php //echo $row1['jml_roll'] . "x" . $row1['bruto']; ?></td> -->
                                                      <td align="center"><?= $row1['jml_roll'] ?></td>
                                                      <td align="center"><?= $row1['bruto'] ?></td>
                                                      <td align="center"><?php echo $row1['netto']; ?></td>
                                                      <td align="center"><?php echo $row1['panjang'] . " " . $row1['satuan']; ?></td>
                                                      <td align="center"><?= $row1['jml_bs'] ?></td>
                                                      <td align="center"><?= $row1['kg_bs'] ?></td>
                                                      <td align="right"><?= $row1['qty_loss'] ?></td>
                                                      <td align="left"><?= $row1['note_loss'] ?></td>
                                                      <td align="center"><?php echo $row1['proses'] ?></td>
                                                      <td align="center"><?php echo $row1['status'] ?></td>
                                                      <td align="center"><?php echo $row1['catatan'] ?></td>
                                                      <td align="center">
                                                        <?php echo $row1['ket_bs'] ?>
                                                      </td>
                                                      <td align="center">
                                                        <?php echo $row1['ket_dept_penyebab'] ?>
                                                      </td>
                                                      <td align="center">
                                                      <?php
                                                      $sqlop = "SELECT 
                                                        DISTINCT(INITIALS.LONGDESCRIPTION) AS NAMA, ELEMENTSINSPECTION.OPERATORCODE FROM INITIALS INITIALS LEFT JOIN ELEMENTSINSPECTION ELEMENTSINSPECTION
                                                        ON INITIALS.CODE = ELEMENTSINSPECTION.OPERATORCODE 
                                                        WHERE ELEMENTSINSPECTION.DEMANDCODE ='$row1[nodemand]' AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13";
                                                      $stmt1 = db2_exec($conn1, $sqlop, array('cursor' => DB2_SCROLLABLE));

                                                      $ops_name = [];
                                                      while ($rowop = db2_fetch_assoc($stmt1)) {
                                                        if ($row1['operator'] == $rowop['OPERATORCODE']) {
                                                          $ops_name[] = $rowop['NAMA'];
                                                        }
                                                      }
                                                      echo implode(' & ', $ops_name);
                                                      ?>
                                                      </td>
                                                      <td><?= $row1['qty_kq']; ?></td>
                                                      <td><?= $row1['note_kq']; ?></td>
                                                      <td><?= $row1['qty_bq']; ?></td>
                                                      <td><?= $row1['note_bq']; ?></td>
                                                      <td><?= $row1['qty_kf']; ?></td>
                                                      <td><?= $row1['note_kf']; ?></td>
                                                      <td><?= $row1['qty_bf']; ?></td>
                                                      <td><?= $row1['note_bf']; ?></td>
                                                    </tr>
                                                  <?php $no++;
          } ?>
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
