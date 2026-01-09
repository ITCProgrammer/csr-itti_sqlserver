<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan NCP Cancel/Disposisi</title>

</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Dept	= isset($_POST['dept']) ? $_POST['dept'] : '';
$Disposisi	= isset($_POST['disposisi']) ? $_POST['disposisi'] : '';
$Candis	= isset($_POST['candis']) ? $_POST['candis'] : '';
$Cancel	= isset($_POST['cancel']) ? $_POST['cancel'] : '';
	
if($_POST['gshift']=="ALL"){$shft=" ";}else{$shft=" AND b.g_shift = '$GShift' ";}	
?>
	
<div class="box box-primary collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan NCP Cancel/Disposisi</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
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
            <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" />
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" />
          </div>
        </div>
        <!-- /.input group -->
      </div>
	  <div class="form-group">
                	<div class="col-sm-3">
		  <select class="form-control select2" name="dept" id="dept" required>
				<option value="">Pilih</option>
			    <option value="ALL" <?php if($Dept=="ALL"){echo "SELECTED";}?>>ALL</option>
				<option value="MKT" <?php if($Dept=="MKT"){echo "SELECTED";}?>>MKT</option>
				<option value="FIN" <?php if($Dept=="FIN"){echo "SELECTED";}?>>FIN</option>
				<option value="DYE" <?php if($Dept=="DYE"){echo "SELECTED";}?>>DYE</option>
				<option value="KNT" <?php if($Dept=="KNT"){echo "SELECTED";}?>>KNT</option>
				<option value="LAB" <?php if($Dept=="LAB"){echo "SELECTED";}?>>LAB</option>
				<option value="PPC" <?php if($Dept=="PPC"){echo "SELECTED";}?>>PPC</option>
				<option value="QCF" <?php if($Dept=="QCF"){echo "SELECTED";}?>>QCF</option>
				<option value="RMP" <?php if($Dept=="RMP"){echo "SELECTED";}?>>RMP</option>
				<option value="KNK" <?php if($Dept=="KNK"){echo "SELECTED";}?>>KNK</option>
				<option value="GKG" <?php if($Dept=="GKG"){echo "SELECTED";}?>>GKG</option>
				<option value="GKJ" <?php if($Dept=="GKJ"){echo "SELECTED";}?>>GKJ</option>
        <option value="GAS" <?php if($Dept=="GAS"){echo "SELECTED";}?>>GAS</option>
				<option value="BRS" <?php if($Dept=="BRS"){echo "SELECTED";}?>>BRS</option>
				<option value="PRT" <?php if($Dept=="PRT"){echo "SELECTED";}?>>PRT</option>
			    <option value="YND" <?php if($Dept=="YND"){echo "SELECTED";}?>>YND</option>
				<option value="PRO" <?php if($Dept=="PRO"){echo "SELECTED";}?>>PRO</option>
			    <option value="TAS" <?php if($Dept=="TAS"){echo "SELECTED";}?>>TAS</option>
			</select>
		  			</div>
        <div class="col-sm-2">
					<label>
                  <input type="checkbox" value="1" name="disposisi" class="minimal-red" onClick="aktif1();" <?php if($Disposisi=="1"){ echo "checked";}?>>
                  Disposisi
                </label>
		    </div>
        <div class="col-sm-2">
					<label>
                  <input type="checkbox" value="1" name="cancel" class="minimal-red" onClick="aktif2();" <?php if($Cancel=="1"){ echo "checked";}?>>
                  Cancel
                </label>
		    </div>		
        <div class="col-sm-2">
					<label>
                  <input type="checkbox" value="1" name="candis" class="minimal-red" onClick="aktif3();" <?php if($Candis=="1"){ echo "checked";}?>>
                  Cancel/Disposisi
                </label>
		    </div>
				 <!-- /.input group -->
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
	<?php
	if($Dept=="ALL"){		
	$Wdept=" ";	
	}else{	
	$Wdept=" dept='$Dept' AND ";	
  }
  if($Cancel !="1" AND $Candis !="1" AND $Disposisi !="1"){
		$sts=" AND NOT status='Cancel' ";
	}else{
		$sts="  ";
  }
  if($Disposisi=="1"){ $sts_dis=" AND `status`='Disposisi' "; }else{ $sts_dis=" ";}
  if($Cancel=="1"){ $sts_cancel=" AND `status`='Cancel' "; }else{ $sts_cancel=" ";}
  if($Candis=="1"){ $sts_candis=" AND (`status`='Cancel' OR `status`='Disposisi') "; }else{ $sts_candis=" ";}
	$qry1=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE $Wdept DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $sts $sts_dis $sts_cancel $sts_candis ORDER BY id ASC");
	$qrySUM=mysqli_query($con,"SELECT COUNT(*) as Lot, SUM(rol) as Rol,SUM(berat) as Berat FROM tbl_ncp_qcf WHERE $Wdept DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $sts $sts_dis $sts_cancel $sts_candis");
	$rSUM=mysqli_fetch_array($qrySUM);
	?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data NCP <?php echo $Dept ?></h3>
      <?php if($Candis=="1"){?>
      <a href="pages/cetak/excel_disposisiqc.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>" class="btn btn-danger pull-right">Cetak Disposisi/Cancel</a>
      <?php }?>
      <?php if($Cancel=="1"){?>
      <a href="pages/cetak/excel_cancelncp.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>" class="btn btn-danger pull-right">Cetak Cancel</a>
      <?php }?>
      <?php if($Disposisi=="1"){?>
      <a href="pages/cetak/excel_disposisincp.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>" class="btn btn-danger pull-right">Cetak Disposisi</a>
      <?php }?>
		<!--<?php if($Awal!="") { ?> 
		<div class="pull-right">
		  <a href="pages/cetak/cetak_harianncp_candis.php?&awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&dept=<?php echo $Dept; ?>&cancel=<?php echo $Cancel; ?>&candis=<?php echo $Candis; ?>&disposisi=<?php echo $Disposisi; ?>" class="btn btn-danger " target="_blank" data-toggle="tooltip" data-html="true" title="Laporan NCP Cancel/Disposisi"><i class="fa fa-print"></i> Cetak</a>			
		</div>  
		<?php } ?>-->
		<?php if($Awal!="") { ?><br><b>Periode: <?php echo tanggal_indo($Awal)." - ".tanggal_indo($Akhir); ?></b>
		<h4>Total Lot: <span class="label label-info"><?php echo $rSUM['Lot']; ?></span></h4>
		<h4>Total Rol: <span class="label label-warning"><?php echo number_format($rSUM['Rol']); ?></span></h4>
		<h4>Total Qty : <span class="label label-danger"><?php echo number_format($rSUM['Berat'],"2")." Kg"; ?></span></h4> 
		<?php } ?>
		  
      
	  </div>
      <div class="box-body">
      <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
        <thead class="bg-blue">
          <tr>
            <th><div align="center">No</div></th>
            <th><div align="center">Tgl</div></th>
            <th><div align="center">Status</div></th>
            <th><div align="center">Langganan</div></th>
			<th><div align="center">Buyer</div></th>  
            <th><div align="center">PO</div></th>
            <th><div align="center">No NCP</div></th>
            <th><div align="center">Order</div></th>
            <th><div align="center">Hanger</div></th>
            <th><div align="center">Jenis Kain</div></th>
            <th><div align="center">Lebar &amp; Gramasi</div></th>
            <th><div align="center">Lot</div></th>
            <th><div align="center">Warna</div></th>
            <th><div align="center">No Warna</div></th>
            <th><div align="center">Rol</div></th>
            <th><div align="center">Berat</div></th>
            <th><div align="center">Dept</div></th>
            <th><div align="center">Masalah</div></th>
            <th><div align="center">Masalah Utama</div></th>
            <th><div align="center">Ket</div></th>
            <th align="center" class="table-list1"><div align="center">Tindakan Penyelesaian</div></th>
            <th align="center" class="table-list1"><div align="center">Penyebab</div></th>
            <th align="center" class="table-list1"><div align="center">Perbaikan</div></th>
            <th align="center" class="table-list1"><div align="center">Catatan Verifikator</div></th>
            <th align="center" class="table-list1"><div align="center">Peninjau Akhir</div></th>
            <th align="center" class="table-list1"><div align="center">NSP</div></th>
            <th align="center" class="table-list1"><div align="center">Rencana</div></th>
            <th align="center" class="table-list1"><div align="center">Aktual</div></th>
            <th align="center" class="table-list1"><div align="center">Nokk</div></th>
            <th align="center" class="table-list1"><div align="center">Tempat Kain</div></th>
            </tr>
        </thead>
        <tbody>
          <?php
	$no=1;	
	while($row1=mysqli_fetch_array($qry1)){
		 ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><?php echo $row1['tgl_buat'];?><br><div class="btn-group"><a href="pages/cetak/cetak_ncp.php?id=<?php echo $row1['id'];?>" class="btn btn-xs btn-danger" target="_blank"><i class="fa fa-print"></i></a><a href="pages/cetak/cetak_ncp_pdf.php?id=<?php echo $row1['id'];?>" class="btn btn-xs btn-info" target="_blank"><i class="fa fa-file-pdf-o"></i></a></div></td>
            <td><a href="#" class="btn sts_edit <?php if($_SESSION['dept']=="QC" or strtoupper($_SESSION['usrid'])=="TENNY" or strtoupper($_SESSION['usrid'])=="AISYAH" or strtoupper($_SESSION['usrid'])=="CRISTIN"){echo "enabled";}else{ echo "disabled";}?>" id="<?php echo $row1['id']; ?>"><span class="label <?php if($row1['status']=="OK"){echo "label-success";}else if($row1['status']=="Cancel"){echo "label-danger";}else{echo "label-warning";} ?> "><?php echo $row1['status'];?></span></a></td>
            <td><?php echo $row1['langganan'];?></td>
			<td><?php echo $row1['buyer'];?></td>  
            <td align="center"><?php echo $row1['po'];?></td>
            <td align="center"><a href="Penyelesaian-<?php echo $row1['id']; ?>" class="btn <?php if(strtoupper($_SESSION['usrid'])!="ARIF"){ echo "disabled";}?>"><span class="label label-danger"><?php echo $row1['no_ncp'];?></span></a></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td align="center"><?php echo $row1['no_hanger'];?></td>
            <td><?php echo $row1['jenis_kain'];?></td>
            <td align="center"><?php echo $row1['lebar']."x".$row1['gramasi'];?></td>
            <td align="center"><?php echo $row1['lot'];?></td>
            <td align="center"><?php echo $row1['warna'];?></td>
            <td align="center"><?php echo $row1['no_warna'];?></td>
            <td align="right"><?php echo $row1['rol'];?></td>
            <td align="right"><?php echo $row1['berat'];?></td>
            <td align="center"><?php echo $row1['dept'];?></td>
            <td><?php echo $row1['masalah'];?></td>
            <td><?php echo $row1['masalah_dominan'];?></td>
            <td><?php echo $row1['ket'];?></td>
            <td><?php echo $row1['penyelesaian'];?></td>
            <td><?php echo $row1['penyebab'];?></td>
            <td><?php echo $row1['perbaikan'];?></td>
            <td><?php echo $row1['catat_verify'];?></td>
            <td><?php echo $row1['peninjau_akhir'];?></td>
            <td><?php echo $row1['nsp'];?></td>
            <td align="center"><?php if($row1['tgl_rencana']!=""){echo date("d/m/y", strtotime($row1['tgl_rencana']));}?></td>
            <td align="center"><?php if($row1['tgl_selesai']!=""){echo date("d/m/y", strtotime($row1['tgl_selesai']));}?></td>
            <td align="center">'<?php echo $row1['nokk'];?></td>
            <td><?php echo $row1['tempat'];?></td>
            </tr>
          <?php	$no++;  } ?>
        </tbody>
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

    function aktif1(){		
        if(document.forms['form1']['disposisi'].checked == true){
          document.form1.cancel.setAttribute("disabled",true);
          document.form1.candis.setAttribute("disabled",true);
        }else{
          document.form1.cancel.removeAttribute("disabled");
          document.form1.candis.removeAttribute("disabled");
        }
    }
    function aktif2(){		
        if(document.forms['form1']['cancel'].checked == true){
          document.form1.disposisi.setAttribute("disabled",true);
          document.form1.candis.setAttribute("disabled",true);
        }else{
          document.form1.disposisi.removeAttribute("disabled");
          document.form1.candis.removeAttribute("disabled");
        }
    }
    function aktif3(){		
        if(document.forms['form1']['candis'].checked == true){
          document.form1.disposisi.setAttribute("disabled",true);
          document.form1.cancel.setAttribute("disabled",true);
        }else{
          document.form1.disposisi.removeAttribute("disabled");
          document.form1.cancel.removeAttribute("disabled");
        }
    }
	</script>
</body>
</html>