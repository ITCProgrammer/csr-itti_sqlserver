<?PHP
session_start();
ini_set("error_reporting", 1);
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Inspeksi</title>

</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Dept	= isset($_POST['dept']) ? $_POST['dept'] : '';
$Shift	= isset($_POST['shift']) ? $_POST['shift'] : '';
$GShift	= isset($_POST['gshift']) ? $_POST['gshift'] : '';	
$Nama	= isset($_POST['nama']) ? $_POST['nama'] : '';	
$jamA	= isset($_POST['jam_awal']) ? $_POST['jam_awal'] : '';
$jamAr	= isset($_POST['jam_akhir']) ? $_POST['jam_akhir'] : '';
if(strlen($jamA)==5){
	$start_date = $Awal." ".$jamA;
}else{ 
	$start_date = $Awal." 0".$jamA;
}	
if(strlen($jamAr)==5){
	$stop_date  = $Akhir." ".$jamAr;
}else{ 
	$stop_date  = $Akhir." 0".$jamAr;
}	
?>
	
<div class="box box-primary collapsed-box">
  	<div class="box-header with-border">
    	<h3 class="box-title"> Filter Tanggal Inspeksi</h3>
    	<div class="box-tools pull-right">
      		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
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
            		<input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
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
            			<input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>"  autocomplete="off"/>
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
      	</div>        
		<div class="form-group">
			<!--<div class="col-sm-2"><input name="nama" type="text" class="form-control" placeholder="Nama" value="<?php echo $Nama; ?>"></div> -->
			<div class="col-sm-2">
				<select name="nama" class="form-control select2" style="width: 100%;">
					<option value="">Pilih</option>
					<option value="ALL" <?php if($Nama=="ALL"){echo "SELECTED";}?>>ALL</option>
					<?php $sqlPr=mysqli_query($con,"SELECT nama FROM user_login WHERE level='INSPEKSI' AND dept='QC' AND akses='biasa'");
					while($rP=mysqli_fetch_array($sqlPr)){ ?>
					<option value="<?php echo $rP['nama'];?>" <?php if($Nama==$rP['nama']){ echo "SELECTED";}?>><?php echo $rP['nama'];?></option>	
						<?php } ?>
				</select>
			</div>
			<div class="col-sm-1">
				<select class="form-control select2" name="shift" id="shift">
					<option value="">Pilih</option>
					<option value="ALL" <?php if($Shift=="ALL"){echo "SELECTED";}?>>ALL</option>
					<option value="1" <?php if($Shift=="1"){echo "SELECTED";}?>>1</option>
					<option value="2" <?php if($Shift=="2"){echo "SELECTED";}?>>2</option>
					<option value="3" <?php if($Shift=="3"){echo "SELECTED";}?>>3</option>
					<option value="Non-Shift" <?php if($Shift=="Non-Shift"){echo "SELECTED";}?>>Non-Shift</option>
				</select>
		  	</div>	
			<div class="col-sm-1">
				<select class="form-control select2" name="gshift" id="gshift">
					<option value="">Pilih</option>
					<option value="ALL" <?php if($GShift=="ALL"){echo "SELECTED";}?>>ALL</option>
					<option value="A" <?php if($GShift=="A"){echo "SELECTED";}?>>A</option>
					<option value="B" <?php if($GShift=="B"){echo "SELECTED";}?>>B</option>
					<option value="C" <?php if($GShift=="C"){echo "SELECTED";}?>>C</option>
					<option value="Non-Shift" <?php if($GShift=="Non-Shift"){echo "SELECTED";}?>>Non-Shift</option>
				</select>
		  	</div>
		</div>	
	</div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2">
        <button type="submit" class="btn btn-social btn-linkedin btn-sm" name="save">Search <i class="fa fa-search"></i></button>
      </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data Inspeksi</h3><br><?php if($_POST['awal']!="") { ?><b>Periode: <?php echo $start_date." to ".$stop_date ?> Nama Inspektor: <?php echo $Nama; ?></b>
		<?php } ?>
        <?php if($_POST['awal']!="") { ?> 
		<div class="btn-group pull-right">
		  	
		  <a href="pages/cetak/cetak_lap_inspektor.php?&awal=<?php echo $start_date; ?>&akhir=<?php echo $stop_date; ?>&personil=<?php echo $Nama ?>&shift=<?php echo $Shift;?>&gshift=<?php echo $GShift;?>" class="btn btn-danger" target="_blank" data-toggle="tooltip" data-html="true" title="Laporan Inspektor"><i class="fa fa-print"></i> Cetak</a>
		  <a href="pages/cetak/inspektor-target-excel.php?&awal=<?php echo $start_date; ?>&akhir=<?php echo $stop_date;?>&personil=<?php echo $Nama;?>&shift=<?php echo $Shift;?>&gshift=<?php echo $GShift;?>" class="btn btn-success" target="_blank" data-toggle="tooltip" data-html="true" title="Laporan Target Inspektor"><i class="fa fa-file-excel-o"></i> Target Inspeksi</a>
		  <a href="pages/cetak/excel-lap-inspeksinew.php?&awal=<?php echo $start_date; ?>&akhir=<?php echo $stop_date;?>&personil=<?php echo $Nama;?>&shift=<?php echo $Shift;?>&gshift=<?php echo $GShift;?>" class="btn btn-primary" target="_blank" data-toggle="tooltip" data-html="true" title="Laporan Inspektor"><i class="fa fa-file-excel-o"></i> Lap Inspektor</a>
		  <a href="pages/cetak/excel-lap-inspeksinewnew.php?&awal=<?php echo $start_date; ?>&akhir=<?php echo $stop_date;?>&personil=<?php echo $Nama;?>&shift=<?php echo $Shift;?>&gshift=<?php echo $GShift;?>" class="btn btn-info" target="_blank" data-toggle="tooltip" data-html="true" title="Laporan Inspektor New"><i class="fa fa-file-excel-o"></i> Lap Inspektor New</a>	
		</div>  
		<?php } ?>
	  </div>
      <div class="box-body">
      <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
        <thead class="bg-blue">
          <tr>
            <th><div align="center">No</div></th>
            <th><div align="center">Pelanggan</div></th>
            <th><div align="center">No Order</div></th>
			<th><div align="center">Jenis Kain</div></th>  
            <th><div align="center">Warna</div></th>
            <th><div align="center">Tgl Pengiriman</div></th>
            <th><div align="center">Lot</div></th>
            <th><div align="center">Inspektor</div></th>
            <th><div align="center">No MC</div></th>
            <th><div align="center">Qty Bruto</div></th>
            <th><div align="center">Yard</div></th>
            <th><div align="center">Total Waktu</div></th>
            <th><div align="center">Yard/Menit</div></th>
            <th><div align="center">Proses</div></th>
            <th><div align="center">Status</div></th>
            <th><div align="center">No Grobak</div></th>
            <th><div align="center">Cek Lembap FIN</div></th>
            <th><div align="center">Cek Lembap QCF</div></th>
            <th><div align="center">Catatan</div></th>
            </tr>
        </thead>
        <tbody>
          <?php
	$no=1;		
	if($Shift=="ALL"){		
	$Wshift=" ";	
	}else{	
	$Wshift=" AND b.shift='$Shift' ";	
	}
	if($GShift=="ALL"){		
	$WGshift=" ";	
	}else{	
	$WGshift=" AND b.g_shift='$GShift' ";	
	}
	if($Nama=="ALL"){		
	$Wnama=" ";	
	}else{	
	$Wnama=" AND a.personil='$Nama' ";	
	}	
	/*if($Proses==""){		
	$WProses=" ";	
	}else{	
	$WProses=" b.proses='$Proses' AND ";	
	}*/
			
	$qry1=mysqli_query($con,"SELECT
	a.catatan,
	a.personil,
	b.langganan,
	b.buyer,
	CONCAT(b.langganan,'/',b.buyer) as pelanggan,
	b.po,
	b.no_order,
	b.jenis_kain,
	b.warna,
	b.lot,
	b.tgl_delivery,
	b.no_mesin,
	b.bruto,
	b.rol,
	a.jml_rol,
	a.qty,
	if(a.jml_rol>0,CONCAT(a.jml_rol,'x',a.qty),CONCAT(b.rol,'x',b.bruto)) as qty_bruto,
	if(a.yard>0,a.yard,b.pjng_order) as yard,
	b.tgl_mulai,
	b.tgl_stop,
	b.istirahat,
	b.lembap_fin,
	b.lembap_qcf,
	a.catatan,
	TIMESTAMPDIFF(
    MINUTE,
	b.tgl_mulai,b.tgl_stop) as waktu,
	b.proses,
	IF
	( c.status_produk = '1', 'OK', IF(c.status_produk = '2', 'TK','PR')) AS sts,
IF
	(
	NOT c.no_gerobak6 = '',
	CONCAT( no_gerobak1, '+', no_gerobak2, '+', no_gerobak3, '+', no_gerobak4, '+', no_gerobak5, '+', no_gerobak6 ),
IF
	(
	NOT c.no_gerobak5 = '',
	CONCAT( no_gerobak1, '+', no_gerobak2, '+', no_gerobak3, '+', no_gerobak4, '+', no_gerobak5 ),
IF
	(
	NOT c.no_gerobak4 = '',
	CONCAT( no_gerobak1, '+', no_gerobak2, '+', no_gerobak3, '+', no_gerobak4 ),
IF
	(
	NOT c.no_gerobak3 = '',
	CONCAT( no_gerobak1, '+', no_gerobak2, '+', no_gerobak3 ),
IF
	(
	NOT c.no_gerobak2 = '',
	CONCAT( no_gerobak1, '+', no_gerobak2 ),
IF
	( NOT c.no_gerobak1 = '', c.no_gerobak1, '' ) 
	) 
	) 
	) 
	) 
	) AS no_grobak 
FROM
	tbl_inspection a
	INNER JOIN tbl_schedule b ON a.id_schedule = b.id
	INNER JOIN tbl_gerobak c ON c.id_schedule = b.id
WHERE
	DATE_FORMAT( a.tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
	AND '$stop_date' $Wnama $Wshift $WGshift
ORDER BY
	a.id ASC");
		$totOk=0;$totTk=0;$totPr=0;$totOkQ=0;$totTkQ=0;$totPrQ=0;$totF=0;$totO=0;$totFQ=0;$totOQ=0;

			while($row1=mysqli_fetch_array($qry1)){
			$hourdiff  = (int)$row1['waktu']-(int)$row1['istirahat'];
		 ?>
          <tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $no; ?></td>
            <td align="left"><?php echo $row1['pelanggan']; ?></td>
            <td><?php echo $row1['no_order']; ?></td>
			<td><?php echo $row1['jenis_kain']; ?></td>  
            <td align="left"><?php echo $row1['warna']; ?></td>
            <td align="center"><?php echo $row1['tgl_delivery']; ?></td>
            <td align="center"><?php echo $row1['lot']; ?></td>
            <td align="center"><?php echo $row1['personil']; ?></td>
            <td align="center"><?php echo $row1['no_mesin']; ?></td>
            <td align="center"><?php echo $row1['qty_bruto']; ?></td>
            <td align="center"><?php echo $row1['yard']; ?></td>
            <td align="center"><?php echo $hourdiff;?></td>
            <td align="center"><?php if($hourdiff!=0){echo round($row1['yard']/$hourdiff,2);}else{echo '0.00';} ?></td>
            <td align="center"><?php echo $row1['proses']; ?></td>
            <td align="center"><?php echo $row1['sts']; ?></td>
            <td align="left"><?php echo $row1['no_grobak']; ?></td>
            <td align="center"><?php echo $row1['lembap_fin']; ?></td>
            <td align="center"><?php echo $row1['lembap_qcf']; ?></td>
            <td><?php echo $row1['catatan']; ?></td>
            </tr>          
          <?php	
				if($row1['sts']=="OK"){$okRol=$row1['jml_rol'];$okQty=$row1['qty'];}else{$okRol=0;$okQty=0;}
				if($row1['sts']=="TK"){$TkRol=$row1['jml_rol'];$TkQty=$row1['qty'];}else{$TkRol=0;$TkQty=0;}
				if($row1['sts']=="PR"){$PrRol=$row1['jml_rol'];$PrQty=$row1['qty'];}else{$PrRol=0;$PrQty=0;}
				if($row1['proses']=="Inspect Finish"){$FRol=$row1['jml_rol'];$FQty=$row1['qty'];}else{$FRol=0;$FQty=0;}
				if($row1['proses']=="Inspect Oven"){$ORol=$row1['jml_rol'];$OQty=$row1['qty'];}else{$ORol=0;$OQty=0;}
				$totOk=$totOk+(int)$okRol;
				$totTk=$totTk+(int)$TkRol;
				$totPr=$totPr+(int)$PrRol;
				$totOkQ=$totOkQ+$okQty;
				$totTkQ=$totTkQ+$TkQty;
				$totPrQ=$totPrQ+$PrQty;
				$totF=$totF+(int)$FRol;
				$totO=$totO+(int)$ORol;
				$totFQ=$totFQ+$FQty;
				$totOQ=$totOQ+$OQty;
				$no++;  } ?>
        </tbody>
		<tfoot>
	  		<tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
            <td align="center">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
	  		<tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
	  		  <td align="center">&nbsp;</td>
	  		  <td align="left"><strong>F</strong>=<?php echo $totF."x".$totFQ; ?></td>
	  		  <td>&nbsp;</td>
	  		  <td align="left"><strong>OK</strong>=<?php echo $totOk."x".$totOkQ; ?></td>
	  		  <td align="left"><strong>PR</strong>=<?php echo $totPr."x".$totPrQ; ?></td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="right">&nbsp;</td>
	  		  <td align="left">&nbsp;</td>
	  		  <td align="left">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td>&nbsp;</td>
  		    </tr>
	  		<tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
	  		  <td align="center">&nbsp;</td>
	  		  <td align="left"><strong>O</strong>=<?php echo $totO."x".$totOQ; ?></td>
	  		  <td>&nbsp;</td>
	  		  <td align="left"><strong>TK</strong>=<?php echo $totTk."x".$totTkQ; ?></td>
	  		  <td align="left">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="right">&nbsp;</td>
	  		  <td align="left">&nbsp;</td>
	  		  <td align="left">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td align="center">&nbsp;</td>
	  		  <td>&nbsp;</td>
  		    </tr>
	    </tfoot>  
      </table>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div id="StsEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});

	</script>
</body>
</html>