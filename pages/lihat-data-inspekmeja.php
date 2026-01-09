<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Harian QCF</title>
</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$GShift	= isset($_POST['gshift']) ? $_POST['gshift'] : '';
$Group	= isset($_POST['group']) ? $_POST['group'] : '';
$MC	= isset($_POST['nomc']) ? $_POST['nomc'] : '';	
?>
<div class="row">
  <div class="col-xs-4">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> Filter Laporan Inspek Meja </h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
        <div class="box-body">
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
            <label for="akhir" class="col-sm-3 control-label">Tanggal Akhir</label>
            <div class="col-sm-2">
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
              </div>
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group">
            <label for="gshift" class="col-sm-3 control-label">Shift</label>
            <div class="col-sm-3">
              <select name="gshift" class="form-control select2"> 
                <option value="ALL" <?php if($GShift=="ALL"){ echo "SELECTED";}?>>ALL</option>
                <option value="1" <?php if($GShift=="1"){ echo "SELECTED";}?>>1</option>
                <option value="2" <?php if($GShift=="2"){ echo "SELECTED";}?>>2</option>
                <option value="3" <?php if($GShift=="3"){ echo "SELECTED";}?>>3</option>
              </select>
            </div>			 
          </div>
          <div class="form-group">
            <label for="group" class="col-sm-3 control-label">Group</label>
            <div class="col-sm-3">
              <select name="group" class="form-control select2"> 
                <option value="ALL" <?php if($Group=="ALL"){ echo "SELECTED";}?>>ALL</option>
                <option value="INSPEK MEJA A" <?php if($Group=="INSPEK MEJA A"){ echo "SELECTED";}?>>INSPEK MEJA A</option>
                <option value="INSPEK MEJA B" <?php if($Group=="INSPEK MEJA B"){ echo "SELECTED";}?>>INSPEK MEJA B</option>
			    <option value="INSPEK MEJA C" <?php if($Group=="INSPEK MEJA C"){ echo "SELECTED";}?>>INSPEK MEJA C</option>
              </select>
            </div>			 
          </div>
          <!-- <div class="form-group">
            <label for="nomc" class="col-sm-3 control-label">No MC</label>
            <div class="col-sm-3">
              <select name="nomc" class="form-control select2"> 
                <option value="ALL" <?php if($MC=="ALL"){ echo "SELECTED";}?>>ALL</option>
                <option value="01" <?php if($MC=="01"){ echo "SELECTED";}?>>01</option>
                <option value="02" <?php if($MC=="02"){ echo "SELECTED";}?>>02</option>
					      <option value="03" <?php if($MC=="03"){ echo "SELECTED";}?>>03</option>
                <option value="04" <?php if($MC=="04"){ echo "SELECTED";}?>>04</option>
              </select>
            </div>			 
          </div> -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="col-sm-5">
            <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
          </div>
          <div class="pull-right">
            <input type="button" class="btn btn-block btn-social btn-linkedin btn-sm" <?php if($_SESSION['lvl_id']=="AFTERSALES"){echo "disabled";}?> name="lihat" value="Kembali" onClick="window.location.href='LapPacking'">	   
          </div>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
  <div class="col-xs-8">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> Rekapan Laporan Inspek Meja</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-striped" style="width: 100%;">
          <thead class="bg-blue">
            <tr>
              <th width="5%" rowspan="2"><div align="center">SHIFT</div></th>
              <th width="23%" colspan="3"><div align="center">ADIDAS</div></th>
              <th width="23%" colspan="3"><div align="center">LULULEMON</div></th>
              <th width="23%" colspan="3"><div align="center">DLL</div></th>
              <th width="23%" colspan="3"><div align="center">TOTAL</div></th>
            </tr>
            <tr>
              <th width="7%"><div align="center">ROLL</div></th>
              <th width="7%"><div align="center">KG</div></th>
              <th width="7%"><div align="center">YARD</div></th>
              <th width="7%"><div align="center">ROLL</div></th>
              <th width="7%"><div align="center">KG</div></th>
              <th width="7%"><div align="center">YARD</div></th>
              <th width="7%"><div align="center">ROLL</div></th>
              <th width="7%"><div align="center">KG</div></th>
              <th width="7%"><div align="center">YARD</div></th>
              <th width="7%"><div align="center">ROLL</div></th>
              <th width="7%"><div align="center">KG</div></th>
              <th width="7%"><div align="center">YARD</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
          $t_roll=0;
          $t_kg=0;
          $t_yard=0;
          $total_rlulu=$total_kglulu=$total_ylulu=$total_radi=$total_kgadi=$total_yadi=$total_rdll=$total_kgdll=$total_ydll=0;
          $persen_kglulu=$persen_ylulu=$persen_kgadi=$persen_yadi=$persen_kgdll=$persen_ydll=0;
          $qry=mysqli_query($con,"select
	abc.inspektor,
	a.roll as roll_adidas,
	a.kg as kg_adidas,
	a.yard as yard_adidas,
	b.roll as roll_lulu,
	b.kg as kg_lulu,
	b.yard as yard_lulu,
	c.roll as roll_dll,
	c.kg as kg_dll,
	c.yard as yard_dll
from
( select
		inspektor
	from
		tbl_lap_inspeksi
	where
		DATE_FORMAT( tgl_update, '%Y-%m-%d' ) between '$Awal' and '$Akhir'
		and `dept` = 'INSPEK MEJA'
	group by
		inspektor ) ABC	
left join 
	(
	select
		inspektor,
		SUM(jml_netto) as roll,
		SUM(netto) as kg,
		SUM(panjang) as yard
	from
		tbl_lap_inspeksi
	where
		DATE_FORMAT( tgl_update, '%Y-%m-%d' ) between '$Awal' and '$Akhir'
		and `dept` = 'INSPEK MEJA'
		and (pelanggan like '%ADIDAS%')
	group by
		inspektor) A
on ABC.inspektor = A.inspektor		
left join
          (
	select
		inspektor,
		SUM(jml_netto) as roll,
		SUM(netto) as kg,
		SUM(panjang) as yard
	from
		tbl_lap_inspeksi
	where
		DATE_FORMAT( tgl_update, '%Y-%m-%d' ) between '$Awal' and '$Akhir'
			and `dept` = 'INSPEK MEJA'
			and (pelanggan like '%LULU%')
		group by
			inspektor) B
          on
	ABC.inspektor = b.inspektor
 left join
          (
	select
		inspektor,
		SUM(jml_netto) as roll,
		SUM(netto) as kg,
		SUM(panjang) as yard
	from
		tbl_lap_inspeksi
	where
		DATE_FORMAT( tgl_update, '%Y-%m-%d' ) between '$Awal' and '$Akhir'
			and `dept` = 'INSPEK MEJA'
			and (pelanggan not like '%ADIDAS%')
			and (pelanggan not like '%LULU%')
		group by
			inspektor) C
          on
	ABC.inspektor = C.inspektor");
          while($row=mysqli_fetch_array($qry)){
          ?>
          <tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $row['inspektor']; ?></td>
            <td align="center"><?php echo round($row['roll_adidas'],0); ?></td>
            <td align="center"><?php echo round($row['kg_adidas'],2); ?></td>
            <td align="center"><?php echo round($row['yard_adidas'],2); ?></td>
            <td align="center"><?php echo round($row['roll_lulu'],0); ?></td>
            <td align="center"><?php echo round($row['kg_lulu'],2); ?></td>
            <td align="center"><?php echo round($row['yard_lulu'],2); ?></td>
            <td align="center"><?php echo round($row['roll_dll'],0); ?></td>
            <td align="center"><?php echo round($row['kg_dll'],2); ?></td>
            <td align="center"><?php echo round($row['yard_dll'],2); ?></td>
            <td align="center"><?php echo round($row['roll_lulu'],0)+round($row['roll_adidas'],0)+round($row['roll_dll'],0); ?></td>
            <td align="center"><?php echo round($row['kg_lulu'],2)+round($row['kg_adidas'],2)+round($row['kg_dll'],2); ?></td>
            <td align="center"><?php echo round($row['yard_lulu'],2)+round($row['yard_adidas'],2)+round($row['yard_dll'],2); ?></td>
          </tr>
          <?php 
          $total_radi=$total_radi+$row['roll_adidas'];
          $total_kgadi=$total_kgadi+$row['kg_adidas'];
          $total_yadi=$total_yadi+$row['yard_adidas'];
          $total_rlulu=$total_rlulu+$row['roll_lulu'];
          $total_kglulu=$total_kglulu+$row['kg_lulu'];
          $total_ylulu=$total_ylulu+$row['yard_lulu'];
          $total_rdll=$total_rdll+$row['roll_dll'];
          $total_kgdll=$total_kgdll+$row['kg_dll'];
          $total_ydll=$total_ydll+$row['yard_dll'];
          } 
          $t_roll=$total_rlulu+$total_radi+$total_rdll;
          $t_kg=$total_kglulu+$total_kgadi+$total_kgdll;
          $t_yard=$total_ylulu+$total_yadi+$total_ydll;

          if($Awal!=""){
            if($total_kglulu!=0 and $total_kgadi!=0 and $total_kgdll!=0){$persen_kglulu=number_format(($total_kglulu/($total_kglulu+$total_kgadi+$total_kgdll))*100,2);}else{$persen_kglulu=0;}
            if($total_ylulu!=0 and $total_yadi!=0 and $total_ydll!=0){$persen_ylulu=number_format(($total_ylulu/($total_ylulu+$total_yadi+$total_ydll))*100,2);}else{$persen_ylulu=0;}
            if($total_kglulu!=0 and $total_kgadi!=0 and $total_kgdll!=0){$persen_kgadi=number_format(($total_kgadi/($total_kglulu+$total_kgadi+$total_kgdll))*100,2);}else{$persen_kgadi=0;}
            if($total_ylulu!=0 and $total_yadi!=0 and $total_ydll!=0){$persen_yadi=number_format(($total_yadi/($total_ylulu+$total_yadi+$total_ydll))*100,2);}else{$persen_yadi=0;}
            if($total_kglulu!=0 and $total_kgadi!=0 and $total_kgdll!=0){$persen_kgdll=number_format(($total_kgdll/($total_kglulu+$total_kgadi+$total_kgdll))*100,2);}else{$persen_kgdll=0;}
            if($total_ylulu!=0 and $total_yadi!=0 and $total_ydll!=0){$persen_ydll=number_format(($total_ydll/($total_ylulu+$total_yadi+$total_ydll))*100,2);}else{$persen_ydll=0;}
          }
          ?>
          <tr>
            <td align="center">TOTAL</td>
            <td align="center"><?php echo $total_radi; ?></td>
            <td align="center"><?php echo $total_kgadi; ?></td>
            <td align="center"><?php echo $total_yadi; ?></td>
            <td align="center"><?php echo $total_rlulu; ?></td>
            <td align="center"><?php echo $total_kglulu; ?></td>
            <td align="center"><?php echo $total_ylulu; ?></td>
            <td align="center"><?php echo $total_rdll; ?></td>
            <td align="center"><?php echo $total_kgdll; ?></td>
            <td align="center"><?php echo $total_ydll; ?></td>
            <td align="center"><?php echo $t_roll; ?></td>
            <td align="center"><?php echo $t_kg; ?></td>
            <td align="center"><?php echo $t_yard; ?></td>
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
          $qrysisa=mysqli_query($con,"SELECT * FROM tbl_sisa_packing WHERE tgl_sisa='$Awal'");
          $rowsisa=mysqli_fetch_array($qrysisa);
          ?>
          <!-- <tr>
            <td colspan="2" align="center" valign="middle">SISA SIAP PACKING</td>
            <td colspan="4" align="left"><?php if($rowsisa['sisa_packing']!=""){echo $rowsisa['sisa_packing'];}else{echo "0";}?></td>
            <td colspan="7" align="center">&nbsp;</td>
          </tr>  -->
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
        <h3 class="box-title">Data Laporan Inspek Meja</h3><br>
        <?php if($_POST['awal']!="") { ?><b>Periode: <?php echo $_POST['awal']." to ".$_POST['akhir']; ?></b>
        <?php } ?><br>
        <?php if($_POST['gshift']!="") { ?><b>Shift: <?php echo $_POST['gshift']; ?></b>
        <?php } ?><br>
        <?php if($_POST['group']!="") { ?><b>Group: <?php echo $_POST['group']; ?></b>
        <?php } ?><br>
        <!-- <div class="pull-right">
          <a href="pages/cetak/cetak-hasil-packing.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak Hasil Packing</a> 
          <a href="pages/cetak/cetak-reports-packing.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak</a> 
          <a href="pages/cetak/lap-packing-excel.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak Excel</a>
          <a href="pages/cetak/cetak_excel_lap_packing.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Lap Packing Harian</a> 
          <a href="pages/cetak/cetak_excel_stock_paper_tube.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&shift=<?php echo $_POST['gshift']; ?>&nomc=<?php echo $_POST['nomc']; ?>&group=<?php echo $_POST['group']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Stock Paper Tube</a> 
        </div> -->
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th><div align="center">No</div></th>
              <th><div align="center">Aksi</div></th>
              <th><div align="center">No Demand</div></th>
              <th><div align="center">No KK</div></th>
              <th><div align="center">Pelanggan</div></th>
              <th><div align="center">Order</div></th>
              <th><div align="center">No Order Legacy</div></th>
              <th><div align="center">Jenis Kain</div></th>
              <th><div align="center">Warna</div></th>
              <th><div align="center">Tgl Pengiriman</div></th>
              <th><div align="center">Lot</div></th>
              <th><div align="center">Nama</div></th>
              <th><div align="center">No MC</div></th>
              <th><div align="center">Qty Bruto</div></th>
              <th><div align="center">Netto</div></th>
              <th><div align="center">Yard / Meter</div></th>
              <th><div align="center">Proses</div></th>
              <th><div align="center">Status</div></th>
              <th><div align="center">Keterangan</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($GShift!="ALL"){ $shft=" AND `shift`='$GShift' ";}else{$shft=" ";}
            if($Group!="ALL"){ $grp=" AND `inspektor`='$Group' ";}else{$grp=" ";}
            if($Awal!="" and $Akhir!=""){
              $qry1=mysqli_query($con,"SELECT * FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND `dept`='INSPEK MEJA' $shft $grp ORDER BY id ASC");
            }else{
              $qry1=mysqli_query($con,"SELECT * FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND `dept`='INSPEK MEJA' $shft $grp ORDER BY id ASC");
            }
            while($row1=mysqli_fetch_array($qry1)){
          ?>
            <tr bgcolor="<?php echo $bgcolor; ?>">
              <td align="center"><?php echo $no; ?></td>
              <td align="center"><div class="btn-group">
              <a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa' AND ($_SESSION['lvl_id']!='PACKING' OR $_SESSION['lvl_id']!='NCP')){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataPacking-<?php echo $row1['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a>
              </div></td>
              <td align="center"><?php echo $row1['nodemand'];?></td>
              <td align="center"><?php echo $row1['nokk'];?></td>
              <td><?php echo $row1['pelanggan'];?></td>
              <td align="center"><?php echo $row1['no_order'];?></td>
              <td align="center"><?php echo $row1['no_order_legacy'];?></td>
              <td><?php echo substr($row1['jenis_kain'],0,15)."...";?></td>
              <td align="left"><?php echo substr($row1['warna'],0,10)."...";?></td>
              <td align="center"><?php echo $row1['tgl_pengiriman'];?></td>
              <td align="center"><?php echo $row1['lot'];?></td>
              <td align="center"><?php echo $row1['inspektor'];?></td>
              <td align="center"><?php echo $row1['no_mc'];?></td>
              <td align="center"><?php echo $row1['jml_roll']."x".$row1['bruto'];?></td>
              <td align="center"><?php echo $row1['netto'];?></td>
              <td align="center"><?php echo $row1['panjang']." ".$row1['satuan'];?></td>
              <td align="center"><?php echo $row1['proses'] ?></td>
              <td align="center"><?php echo $row1['status'] ?></td>
              <td align="center"><?php echo $row1['catatan'] ?></td>
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
