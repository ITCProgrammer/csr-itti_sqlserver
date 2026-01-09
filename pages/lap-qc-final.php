<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>
<?php
$Order		= isset($_POST['no_order']) ? $_POST['no_order'] : '';
$PO			= isset($_POST['no_po']) ? $_POST['no_po'] : '';
$Item		= isset($_POST['item']) ? $_POST['item'] : '';
$Warna		= isset($_POST['warna']) ? $_POST['warna'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';
$Awal		= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir		= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$jamA		= isset($_POST['jam_awal']) ? $_POST['jam_awal'] : '';
$jamAr		= isset($_POST['jam_akhir']) ? $_POST['jam_akhir'] : '';
if(strlen($jamA)==5){
	$start_date = $Awal.' '.$jamA;
}else{ 
	$start_date = $Awal.' 0'.$jamA;
}	
if(strlen($jamAr)==5){
	$stop_date  = $Akhir.' '.$jamAr;
}else{ 
	$stop_date  = $Akhir.' 0'.$jamAr;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

</head>
<body>
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Filter  Data Kartu Kerja</h3>
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
				  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="jam_awal" placeholder="00:00" value="<?php echo $jamA;?>" autocomplete="off">
					 
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                   </div>
                  </div>
			<div>
  </div>
			</div>   
        <!-- /.input group -->		  
		<div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" />
          </div>
        </div>  
		<div class="col-sm-2">
				  <div class="input-group">
                    <input type="text" class="form-control timepicker" name="jam_akhir" placeholder="00:00" value="<?php echo $jamAr;?>" autocomplete="off">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                   </div>
                  </div>
			</div>  
		 <button type="submit" class="btn btn-success " name="cari" ><i class="fa fa-search"></i> Cari Data</button>
      </div>         
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer -->

</div>
</form>
	</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data Kartu Kerja</h3><br>
        <?php if($_POST['awal']!="") { ?><b>Periode: <?php echo $start_date." to ".$stop_date; }?></b>
		<a href="pages/cetak/rekap-data-qcf.php?awal=<?php echo $start_date; ?>&akhir=<?php echo $stop_date; ?>" target="_blank"><span class="btn btn-primary pull-right"><i class="fa fa-file-pdf-o"></i> Cetak</span></a>
      </div>
<div class="box-body">
<table id="example3" class="table table-bordered table-hover table-striped display nowrap" width="100%">
<thead class="bg-red">
   <tr>
      <th width="24" rowspan="2"><div align="center">No</div></th>
      <th width="78" rowspan="2"><div align="center">Nokk</div></th>
      <th width="78" rowspan="2"><div align="center">Buyer</div></th>
      <th width="78" rowspan="2"><div align="center">Order</div></th>
      <th width="78" rowspan="2"><div align="center">PO</div></th>
      <th width="78" rowspan="2"><div align="center">Qty Order</div></th>
      <th width="88" rowspan="2"><div align="center">Jml Bruto</div></th>
      <th width="111" rowspan="2"><div align="center">Hanger</div></th>
      <th width="142" rowspan="2"><div align="center">Item</div></th>
      <th width="142" rowspan="2"><div align="center">No Warna</div></th>
      <th width="142" rowspan="2"><div align="center">Warna</div></th>
      <th width="155" rowspan="2"><div align="center">Lot</div></th>
      <th width="155" rowspan="2"><div align="center">L</div></th>
      <th width="155" rowspan="2"><div align="center">Grms</div></th>
      <th width="155" rowspan="2"><div align="center">Tgl Fin</div></th>
      <th width="80" rowspan="2"><div align="center">Tgl Insp</div></th>
      <th width="94" rowspan="2"><div align="center">Tgl Pack</div></th>
      <th width="70" rowspan="2"><div align="center">Tgl Msk</div></th>
      <th width="70" rowspan="2"><div align="center">Roll</div></th>
      <th width="60" rowspan="2"><div align="center">Netto</div></th>
      <th width="102" rowspan="2"><div align="center">Panjang</div></th>
      <th width="70" rowspan="2"><div align="center">Sisa</div></th>
      <th colspan="2"><div align="center"> Fin</div></th>
      <th colspan="2"><div align="center"> Ins</div></th>
      <th colspan="3"><div align="center"> Penyusutan</div></th>
      <th width="70" rowspan="2"><div align="center">Cek Warna</div></th>
      <th width="70" rowspan="2"><div align="center">Masalah</div></th>
      <th colspan="2"><div align="center">Extra</div></th>
      <th width="70" rowspan="2"><div align="center">Ket</div></th>
      </tr>
   <tr>
     <th width="70"><div align="center">L</div></th>
     <th width="70"><div align="center">Grms</div></th>
     <th width="70"><div align="center">L</div></th>
     <th width="70"><div align="center">Grms</div></th>
     <th width="70">P</th>
     <th width="70"><div align="center">L</div></th>
     <th width="70"><div align="center">S</div></th>
     <th width="70"><div align="center">KG</div></th>
     <th width="70"><div align="center">Panjang</div></th>
     </tr>
</thead>
<tbody>
  <?php
	$no=1;
	$sql=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' AND '$stop_date' ");
	$col=0;
	while($r=mysqli_fetch_array($sql)){
		$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
	?>
   <tr bgcolor="<?php echo $bgcolor; ?>">
     <td align="center"><?php echo $no; ?></td>
     <td align="center"><?php echo $r['nokk'];?></td>
     <td><?php echo $r['pelanggan'];?></td>
     <td><?php echo $r['no_order'];?></td>
     <td><?php echo $r['no_po'];?></td>
     <td align="right"><?php echo $r['berat_order']."x".$r['panjang_order']." ".$r['satuan_order'];?></td>
     <td align="center"><?php echo $r['rol_bruto']."x".$r['berat_bruto'];?></td>
     <td align="center"><?php echo $r['no_hanger'];?></td>
     <td align="center"><?php echo $r['no_item'];?></td>
     <td align="center"><?php echo $r['no_warna'];?></td>
     <td align="center"><?php echo $r['warna'];?></td>
     <td align="center"><?php echo $r['lot'];?></td>
     <td align="center"><?php echo $r['lebar'];?></td>
     <td align="center"><?php echo $r['gramasi'];?></td>
     <td align="center"><?php echo $r['tgl_fin'];?></td>
     <td align="center"><?php echo $r['tgl_ins'];?></td>
     <td align="center"><?php echo $r['tgl_pack'];?></td>
     <td align="center"><?php echo $r['tgl_masuk'];?></td>
     <td align="right"><?php echo $r['rol'];?></td>
     <td align="right"><?php echo $r['netto'];?></td>
     <td align="center"><?php echo $r['panjang']." ".$r['satuan'];?></td>
     <td align="right"><?php echo $r['sisa'];?></td>
     <td align="center"><?php echo $r['lebar_fin'];?></td>
     <td align="center"><?php echo $r['gramasi_fin'];?></td>
     <td align="center"><?php echo $r['lebar_ins'];?></td>
     <td align="center"><?php echo $r['gramasi_ins'];?></td>
     <td align="center"><?php echo $r['susut_p'];?></td>
     <td align="center"><?php echo $r['susut_l'];?></td>
     <td align="center"><?php echo $r['susut_s'];?></td>
     <td><?php echo $r['cek_warna'];?></td>
     <td align="left"><?php echo $r['masalah'];?></td>
     <td align="right"><?php echo $r['berat_extra'];?></td>
     <td align="right"><?php echo $r['panjang_extra'];?></td>
     <td><?php echo $r['ket'];?></td>
     </tr>
   <?php $no++; } ?>
   </tbody>
   <tfoot class="bg-red">
   <tr>
     <td align="center"><div align="center">No</div></td>
     <td align="center"><div align="center">Nokk</div></td>
     <td align="center"><div align="center">Buyer</div></td>
     <td align="center"><div align="center">Order</div></td>
     <td align="center"><div align="center">PO</div></td>
     <td align="center"><div align="center">Qty Order</div></td>
     <td align="center"><div align="center">Jml Bruto</div></td>
     <td><div align="center">Hanger</div></td>
     <td align="right"><div align="center">Item</div></td>
     <td align="right"><div align="center">No Warna</div></td>
     <td align="right"><div align="center">Warna</div></td>
     <td align="right"><div align="center">Lot</div></td>
     <td align="right"><div align="center">L</div></td>
     <td align="right"><div align="center">Grms</div></td>
     <td align="right"><div align="center">Tgl Fin</div></td>
     <td align="right"><div align="center">Tgl Insp</div></td>
     <td align="right"><div align="center">Tgl Pack</div></td>
     <td align="right"><div align="center">Tgl Msk</div></td>
     <td align="right"><div align="center">Roll</div></td>
     <td align="right"><div align="center">Netto</div></td>
     <td align="right"><div align="center">Panjang</div></td>
     <td align="right"><div align="center">Sisa</div></td>
     <th><div align="center">L</div></th>
     <th><div align="center">Grms</div></th>
     <th><div align="center">L</div></th>
     <th><div align="center">Grms</div></th>
     <th>P</th>
     <th><div align="center">L</div></th>
     <th><div align="center">S</div></th>
     <td align="right"><div align="center">Cek Warna</div></td>
     <td align="right"><div align="center">Masalah</div></td>
     <th><div align="center">KG</div></th>
     <th><div align="center">Panjang</div></th>
	   <td align="right"><div align="center">Ket</div></td>
     </tr>
   </tfoot>
</table>
</form>

      </div>
    </div>
  </div>
</div>
<div id="Detail" class="modal fade modal-rotate-from-bottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
  <!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete" tabindex="-1" >
    <div class="modal-dialog modal-sm" >
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
          <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
        </div>

        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
          <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Popup untuk Edit-->
  <div id="DataEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  </div>
</div>
</body>
<script type="text/javascript">
    function confirm_delete(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }

</script>
</html>
