<?php
ini_set("error_reporting", 1);
session_start();
?>
<?php
include "koneksi.php";
$id=$_GET['id'];
$sql="SELECT * FROM tbl_disposisi_now WHERE id='$id'";
$sqldata=mysqli_query($con,$sql);
$row1=mysqli_fetch_array($sqldata);
							  
if($_POST['update']=="update"){
	$keputusan=str_replace("'","''",$_POST['keputusan']);
	$file_foto = $_FILES['file_foto']['name'];
	$file_foto2 = $_FILES['file_foto2']['name'];
	// ambil data file
	$namaFile_foto = $_FILES['file_foto']['name'];
	$namaSementara_foto = $_FILES['file_foto']['tmp_name'];
	$namaFile_foto2 = $_FILES['file_foto2']['name'];
	$namaSementara_foto2 = $_FILES['file_foto2']['tmp_name'];
	// tentukan lokasi file akan dipindahkan
	$dirUpload = "dist/img-disposisinow/";
	// pindahkan file
	$terupload_foto = move_uploaded_file($namaSementara_foto, $dirUpload.$namaFile_foto);
	$terupload_foto2 = move_uploaded_file($namaSementara_foto2, $dirUpload.$namaFile_foto2);
		$qry1=mysqli_query($con,"UPDATE tbl_disposisi_now SET
		`masalah`='$_POST[masalah]',
		`keputusan`='$keputusan',
		`pejabat1`='$_POST[pejabat1]',
		`pejabat2`='$_POST[pejabat2]',
		`pejabat3`='$_POST[pejabat3]',
		`produksi`='$_POST[produksi]',
		`marketing`='$_POST[marketing]',
		`file_foto`='$file_foto',
		`file_foto2`='$file_foto2',
		`tgl_update`=now()
    WHERE id='$id'");	
		if($qry1){	
			echo "<script>swal({
			title: 'Data Telah terupdate',   
			text: 'Klik Ok untuk kembali',
			type: 'success',
			}).then((result) => {
			if (result.value) {
				window.location.href='EditDisposisi-$_GET[id]';
			}
			});</script>";
		}
	}
?>	

<div class="box box-info">
 	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Detail Disposisi</h3>
			<div class="box-tools pull-right">
      			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
  		</div>
  		<div class="box-body">
		  	<div class="col-md-6"> 
				<div class="form-group">
					<label for="no_demand" class="col-sm-2 control-label">No Demand</label>
					<div class="col-sm-6">
						<input name="no_demand" type="text" class="form-control" id="no_demand" readonly value="<?php echo $row1['no_demand'];?>" placeholder="No Demand" >
					</div> 
				</div>
				<div class="form-group">
					<label for="masalah" class="col-sm-2 control-label">Masalah</label>
					<div class="col-sm-6">
						<div class="input-group">
							<select class="form-control select2" name="masalah" id="masalah">
								<option value="">Pilih</option>
								<?php 
								$qrym=mysqli_query($con,"SELECT masalah FROM tbl_masalah_aftersales ORDER BY masalah ASC");
								while($rm=mysqli_fetch_array($qrym)){
								?>
								<option value="<?php echo $rm['masalah'];?>" <?php if($row1['masalah']==$rm['masalah']){echo "SELECTED";}?>><?php echo $rm['masalah'];?></option>	
								<?php }?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataMasalah"> ...</button></span>
						</div>				
					</div>
				</div>	
				<div class="form-group">
					<label for="keputusan" class="col-sm-2 control-label">Keputusan</label>
					<div class="col-sm-6">
						<textarea name="keputusan" required rows="3" class="form-control" id="keputusan" placeholder="Keputusan"><?php echo $row1['keputusan'];?></textarea>
					</div>				   
				</div>
				<div class="form-group">
					<label for="pejabat1" class="col-sm-2 control-label">Pejabat QC 1</label>
					<div class="col-sm-6">
						<div class="input-group">
							<select class="form-control select2" name="pejabat1" id="pejabat1">
								<option value="">Pilih</option>
								<?php 
								$qryp=mysqli_query($con,"SELECT nama FROM tbl_pejabat_disp_qc ORDER BY nama ASC");
								while($rp=mysqli_fetch_array($qryp)){
								?>
								<option value="<?php echo $rp['nama'];?>" <?php if($row1['pejabat1']==$rp['nama']){echo "SELECTED";}?>><?php echo $rp['nama'];?></option>	
								<?php }?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataPejabat"> ...</button></span>
						</div>
					</div>
				</div>	  
				<div class="form-group">
					<label for="pejabat2" class="col-sm-2 control-label">Pejabat QC 2</label>
					<div class="col-sm-6">
						<div class="input-group">
							<select class="form-control select2" name="pejabat2" id="pejabat2">
								<option value="">Pilih</option>
								<?php 
								$qryp=mysqli_query($con,"SELECT nama FROM tbl_pejabat_disp_qc ORDER BY nama ASC");
								while($rp=mysqli_fetch_array($qryp)){
								?>
								<option value="<?php echo $rp['nama'];?>" <?php if($row1['pejabat2']==$rp['nama']){echo "SELECTED";}?>><?php echo $rp['nama'];?></option>	
								<?php }?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataPejabat"> ...</button></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="pejabat3" class="col-sm-2 control-label">Pejabat QC 3</label>
					<div class="col-sm-6">
						<div class="input-group">
							<select class="form-control select2" name="pejabat3" id="pejabat3">
								<option value="">Pilih</option>
								<?php 
								$qryp=mysqli_query($con,"SELECT nama FROM tbl_pejabat_disp_qc ORDER BY nama ASC");
								while($rp=mysqli_fetch_array($qryp)){
								?>
								<option value="<?php echo $rp['nama'];?>" <?php if($row1['pejabat3']==$rp['nama']){echo "SELECTED";}?>><?php echo $rp['nama'];?></option>	
								<?php }?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataPejabat"> ...</button></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="produksi" class="col-sm-2 control-label">Produksi</label>
					<div class="col-sm-6">
						<div class="input-group">
							<select class="form-control select2" name="produksi" id="produksi">
								<option value="">Pilih</option>
								<?php 
								$qrypr=mysqli_query($con,"SELECT nama FROM tbl_personil_produksi ORDER BY nama ASC");
								while($rpr=mysqli_fetch_array($qrypr)){
								?>
								<option value="<?php echo $rpr['nama'];?>" <?php if($row1['produksi']==$rpr['nama']){echo "SELECTED";}?>><?php echo $rpr['nama'];?></option>	
								<?php }?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataProduksi"> ...</button></span>
						</div>
					</div>
				</div> 
				<div class="form-group">
					<label for="marketing" class="col-sm-2 control-label">Marketing</label>
					<div class="col-sm-6">
						<div class="input-group">
							<select class="form-control select2" name="marketing" id="marketing">
								<option value="">Pilih</option>
								<?php 
								$qrypm=mysqli_query($con,"SELECT nama FROM tbl_personil_mkt ORDER BY nama ASC");
								while($rpm=mysqli_fetch_array($qrypm)){
								?>
								<option value="<?php echo $rpm['nama'];?>" <?php if($row1['marketing']==$rpm['nama']){echo "SELECTED";}?> ><?php echo $rpm['nama'];?></option>	
								<?php }?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataMKT"> ...</button></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="file_foto" class="col-md-2 control-label">Upload Foto 1</label>
					<div class="col-sm-6">	  
						<input type="file" id="file_foto" name="file_foto"><span style="color:red;"><?php if($row1['file_foto']!=""){echo $row1['file_foto'];} ?></span>
						<span><a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa' or $row1['file_foto']==NULL or $row1['file_foto']==""){ echo "disabled"; } ?>" onclick="confirm_delete1('./HapusDataFoto1-<?php echo $row1['id'] ?>-<?php echo $row1['file_foto'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus File Foto 1"></i></a></span>
						<span class="help-block with-errors"></span>
					</div>	  
				</div>
				<div class="form-group">
					<label for="file_foto2" class="col-md-2 control-label">Upload Foto 2</label>
					<div class="col-sm-6">	  
						<input type="file" id="file_foto2" name="file_foto2"><span style="color:red;"><?php if($row1['file_foto2']!=""){echo $row1['file_foto2'];} ?></span>
						<span><a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa' or $row1['file_foto2']==NULL or $row1['file_foto2']==""){ echo "disabled"; } ?>" onclick="confirm_delete2('./HapusDataFoto2-<?php echo $row1['id'] ?>-<?php echo $row1['file_foto2'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus File Foto 2"></i></a></span>
						<span class="help-block with-errors"></span>
					</div>	  
				</div>
			</div>
			<div class="col-md-6"> 
        <div class="form-group">
            <label for="text1" class="col-sm-2 control-label">Langganan</label>
            <div class="col-sm-6">
              <input name="langganan1" type="text" readonly class="form-control" id="langganan1" value="<?php echo $row1['langganan']."/".$row1['buyer'];?>" >
            </div>
        </div>
        <div class="form-group">
            <label for="text2" class="col-sm-2 control-label">Prod. Order</label>
            <div class="col-sm-6">
              <input name="prodorder1" type="text" readonly class="form-control" id="prodorder1" value="<?php echo $row1['prod_order'];?>" >
            </div>
        </div>
        <div class="form-group">
            <label for="text3" class="col-sm-2 control-label">No Order</label>
            <div class="col-sm-6">
              <input name="noorder1" type="text" readonly class="form-control" id="noorder1" value="<?php echo $row1['no_order'];?>" >
            </div>
        </div>
        <div class="form-group">
            <label for="text4" class="col-sm-2 control-label">PO</label>
            <div class="col-sm-6">
              <input name="po1" type="text" readonly class="form-control" id="po1" value="<?php echo $row1['no_po'];?>" >
            </div>
        </div>
        <div class="form-group">
          <label for="text5" class="col-sm-2 control-label">Jenis Kain</label>
          <div class="col-sm-6">
            <textarea name="jnskain1" readonly rows="3" class="form-control" id="jnskain1" placeholder=""><?php echo $row1['jenis_kain'];?></textarea>
          </div>				   
        </div>
        <div class="form-group">
            <label for="text6" class="col-sm-2 control-label">Warna</label>
            <div class="col-sm-6">
              <input name="warna1" type="text" readonly class="form-control" id="warna1" value="<?php echo $row1['warna'];?>" >
            </div>
        </div>
      </div>
		</div>
<!-- /.box-footer -->
<div class="box-footer">
	<?php if($_GET['id']!=""){ ?> 	
		<button type="submit" class="btn btn-primary pull-right" name="update" value="update"><i class="fa fa-edit"></i> Update</button> 
	<?php } ?>	   
</div>
</form>	 
</div>
<?php if($no_demand!=''){?>
<div class="row">
  	<div class="col-xs-12">
    	<div class="box">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form2">
			<div class="box-header with-border">
			</div>    
			<div class="box-body">		
				<table id="example3" class="table table-bordered table-hover table-striped nowrap" width="100%">
					<thead class="bg-green">
					<tr>
						<th width="48" rowspan="2"><div align="center">No</div></th>
						<th width="60" rowspan="2"><div align="center">Masalah</div></th>
						<th width="301" rowspan="2"><div align="center">Keputusan</div></th>
						<th width="343" colspan="3"><div align="center">Pejabat QC</div></th>
						<th width="331" rowspan="2"><div align="center">Produksi</div></th>
						<th width="331" rowspan="2"><div align="center">Marketing</div></th>
						<th width="331" rowspan="2"><div align="center">File Foto</div></th>
						<th width="331" rowspan="2"><div align="center">Tgl Buat</div></th>
						<th width="331" rowspan="2"><div align="center">Tgl Update</div></th>
					</tr>
					<tr>
						<th width="50" ><div align="center">Pejabat 1</div></th>
						<th width="50"><div align="center">Pejabat 2</div></th>
						<th width="50"><div align="center">Pejabat 3</div></th>
					</tr>
					</thead>
				<tbody>
					<?php 
					include "koneksi.php";
					$sql=mysqli_query($con," SELECT * FROM tbl_disposisi_now WHERE no_demand='$no_demand' ORDER BY tgl_buat ASC");
					$no=1;
					while($r=mysqli_fetch_array($sql)){
					$no++;
					$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';	  
					?>
						<tr bgcolor="<?php echo $bgcolor; ?>">
							<td align="center"><a href="#" class="edit_disposisinow" id="<?php echo $r['id'] ?>"><?php echo $no; ?></a></td>
							<td align="center"><?php echo $r['masalah']; ?></td>
							<td align="center"><?php echo $r['keputusan']; ?></td>
							<td align="left"><?php echo $r['pejabat1']; ?></td>
							<td align="left"><?php echo $r['pejabat2']; ?></td>
							<td align="left"><?php echo $r['pejabat3']; ?></td>
							<td align="left"><?php echo $r['produksi']; ?></td>
							<td align="left"><?php echo $r['marketing']; ?></td>
							<td align="left"><?php echo $r['file_foto']; ?></td>
							<td align="left"><?php echo $r['tgl_buat']; ?></td>
							<td align="left"><?php echo $r['tgl_update']; ?></td>
						</tr>   
					<?php 
						}
					?>
				</tbody>   
				</table> 
					<div id="EditDisposisiNow" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
					</div>
    		</div>
            </form>
		</div>
	</div>
	<?php }?>
<div class="modal fade" id="modal_del1" tabindex="-1" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete foto 1?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link1">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_del2" tabindex="-1" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete foto 2?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link2">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="DataPejabat">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pejabat</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="nama" class="col-md-3 control-label">Nama Pejabat</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="nama" name="nama" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_pejabat" id="simpan_pejabat" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_pejabat']=="Simpan"){
	$nama=strtoupper($_POST['nama']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_pejabat_disp_qc SET 
		  nama='$nama'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='InputDisposisiDetail-$no_demand';
	 
  }
});</script>";
		}
}
?>

<div class="modal fade" id="DataProduksi">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Personil Produksi</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="nama" class="col-md-3 control-label">Nama Personil</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="nama" name="nama" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_personil" id="simpan_personil" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_personil']=="Simpan"){
	$nama=strtoupper($_POST['nama']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_personil_produksi SET 
		  nama='$nama'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='InputDisposisiDetail-$no_demand';
	 
  }
});</script>";
		}
}
?>

<div class="modal fade" id="DataMKT">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Personil Marketing</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="nama" class="col-md-3 control-label">Nama Personil</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="nama" name="nama" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_mkt" id="simpan_mkt" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_mkt']=="Simpan"){
	$nama=strtoupper($_POST['nama']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_personil_mkt SET 
		  nama='$nama'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='InputDisposisiDetail-$no_demand';
	 
  }
});</script>";
		}
}
?>
<div class="modal fade" id="DataMasalah">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Masalah Dominan</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="masalah_dominan" class="col-md-3 control-label">Jenis Masalah</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="masalah_dominan" name="masalah_dominan" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_masalah" id="simpan_masalah" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_masalah']=="Simpan"){
	$masalah=strtoupper($_POST['masalah_dominan']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_masalah_aftersales SET 
		  masalah='$masalah'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='InputDisposisiDetail-$no_demand';
	 
  }
});</script>";
		}
}
?>
<script type="text/javascript">
    function confirm_delete1(delete_url1)
    {
      $('#modal_del1').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link1').setAttribute('href' , delete_url1);
    }
	function confirm_delete2(delete_url2)
    {
      $('#modal_del2').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link2').setAttribute('href' , delete_url2);
    }
</script>
