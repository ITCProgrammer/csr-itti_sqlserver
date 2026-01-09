<script>
	function tampil(){
		if(document.forms['form1']['status'].value=="Belum Selesai : Dibukakan KPI"){
		$("#kpi").css("display", "");  // To unhide
		}else{
			$("#kpi").css("display", "none");  // To hide
		}
		if(document.forms['form1']['status'].value=="Belum Selesai : Dibukakan FT"){
		$("#ft").css("display", "");  // To unhide
		}else{
			$("#ft").css("display", "none");  // To hide
		}
		if(document.forms['form1']['status'].value=="Belum Selesai : Lihat FT/KPI/KPE"){
		$("#kpe").css("display", "");  // To unhide
		}else{
			$("#kpe").css("display", "none");  // To hide

		}
	}
</script>
<?php
ini_set("error_reporting", 1);
include"koneksi.php";
	$qryCek=mysqli_query($con,"SELECT * FROM tbl_disposisi_now WHERE `id`='$_GET[id]'");
	$rCek=mysqli_fetch_array($qryCek);
	 ?>
<?php
date_default_timezone_set("Asia/Jakarta");
$bln=array(1 => "I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
$romawi= $bln[date('n')];
//Baca Tanggal Hari ini
$tahun = date("y");
$thn=date("Y");
$nomor="/QCF/TPUKPE/".$romawi."/".$tahun;
//Cari nomor terakhir pada database
$sql = "SELECT no_tpukpe FROM tbl_tpukpe_now WHERE id_disposisi is not null and  SUBSTR(no_tpukpe,-2) like '%".$tahun."%' ORDER BY no_tpukpe DESC LIMIT 1";
$hasil = mysqli_query($con,$sql) or die (mysqli_error());
$data = mysqli_fetch_array($hasil);
$notpukpe= $data['no_tpukpe'];
$noUrut=$notpukpe + 1;
$kode =  sprintf("%03s", $noUrut);
$nomorbaru = $kode.$nomor;

	if(isset($_POST['save'])){
		$no_tpukpe=$nomorbaru;
		$order=$rCek['no_order'];
		$po=$rCek['po'];
		$langganan=$rCek['langganan'];
		$jenis_kain=$rCek['jenis_kain'];
		$warna=$rCek['warna'];
		$lot=$rCek['lot'];
		$masalah=str_replace("'","''",$_POST['masalah']);
        $penyelidik_qcf=str_replace("'","''",$_POST['penyelidik_qcf']);
        $penyelidik_terkait=str_replace("'","''",$_POST['penyelidik_terkait']);
        $tindakan_perbaikan=str_replace("'","''",$_POST['tindakan_perbaikan']);
        $cegah_qcf=str_replace("'","''",$_POST['cegah_qcf']);
        $cegah_terkait=str_replace("'","''",$_POST['cegah_terkait']);
		$kpi=str_replace("'","''",$_POST['no_kpi']);
		$ft=str_replace("'","''",$_POST['no_ft']);
		$kpe=str_replace("'","''",$_POST['no_kpe']);
		$qry1=mysqli_query($con,"INSERT INTO tbl_tpukpe_now SET
		`id_disposisi`='$_GET[id]',
		`no_tpukpe`='$no_tpukpe',
		`masalah`='$masalah',
		`penyelidik_qcf`='$penyelidik_qcf',
		`penyelidik_terkait`='$penyelidik_terkait',
		`tindakan_perbaikan`='$tindakan_perbaikan',
		`cegah_qcf`='$cegah_qcf',
		`cegah_terkait`='$cegah_terkait',
		`langganan`='$langganan',
		`no_order`='$order',
		`no_po`='$po',
		`jenis_kain`='$jenis_kain',
		`warna`='$warna',
		`lot`='$lot',
		`no_kpi`='$kpi',
        `no_ft`='$ft',
        `no_kpe`='$kpe',
		`masalah_dominan`='$_POST[masalah_dominan]',
		`t_jawab`='$_POST[t_jawab]',
		`t_jawab1`='$_POST[t_jawab1]',
		`t_jawab2`='$_POST[t_jawab2]',
		`tgl_buat`=now(),
		`tgl_update`=now()
		");	
		if($qry1){	
	echo "<script>swal({
  title: 'Data Telah disimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
      window.open('pages/cetak/cetak_tpukpe.php?no_tpukpe=$no_tpukpe','_blank');
      window.location.href='TambahTPUKPEDisposisi-$_GET[id]';
	 
  }
});</script>";
		}
	}
?>	

<div class="box box-info">
 	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
		<div class="box-header with-border">
			<h3 class="box-title">Formulir TPUKPE</h3>
			<div class="box-tools pull-right">
      			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
  		</div>
  		<div class="box-body">
		  	<div class="form-group">
                <label for="masalah" class="col-sm-2 control-label">Masalah</label>
                  	<div class="col-sm-4">
                    	<textarea name="masalah" class="form-control" id="masalah" placeholder="" rows="3"></textarea>
                  	</div>
            </div>
			<div class="form-group">
		  		<label for="masalah_dominan" class="col-sm-2 control-label">Sub Defect</label>
		 			<div class="col-sm-3">
						<div class="input-group">
						<select class="form-control select2" name="masalah_dominan" id="masalah_dominan">
							<option value="">Pilih</option>
							<?php 
							$qrym=mysqli_query($con,"SELECT masalah FROM tbl_masalah_aftersales ORDER BY masalah ASC");
							while($rm=mysqli_fetch_array($qrym)){
							?>
							<option value="<?php echo $rm['masalah'];?>" <?php if($rcek['masalah_dominan']==$rm['masalah']){echo "SELECTED";}?>><?php echo $rm['masalah'];?></option>	
							<?php }?>
						</select>
						<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataMasalah"> ...</button></span>
						</div>
		 	 		</div>
		  	</div>
			  <div class="form-group">
					<label for="t_jawab" class="col-sm-2 control-label">Dept. Tanggung Jawab 1</label>
					<div class="col-sm-2">
						<select class="form-control select2" name="t_jawab">
							<option value="">Pilih</option>
							<?php 
							$qryDept = mysqli_query($con, "SELECT * FROM filter_dept");
							while($dept = mysqli_fetch_array($qryDept)){
							?>
							<option value="<?php echo $dept['nama'];?>" <?php if($rcek['t_jawab'] == $dept['nama']){echo "SELECTED";}?>><?php echo $dept['nama'];?></option>
							<?php } ?>
						</select>
					</div>
			</div>
			<div class="form-group">
					<label for="t_jawab1" class="col-sm-2 control-label">Dept. Tanggung Jawab 2</label>
					<div class="col-sm-2">
						<select class="form-control select2" name="t_jawab1">
							<option value="">Pilih</option>
							<?php 
							$qryDept = mysqli_query($con, "SELECT * FROM filter_dept");
							while($dept1 = mysqli_fetch_array($qryDept)){
							?>
							<option value="<?php echo $dept1['nama'];?>" <?php if($rcek['t_jawab1'] == $dept1['nama']){echo "SELECTED";}?>><?php echo $dept1['nama'];?></option>
							<?php } ?>
						</select>
					</div>
			</div>
			<div class="form-group">
					<label for="t_jawab2" class="col-sm-2 control-label">Dept. Tanggung Jawab 3</label>
					<div class="col-sm-2">
						<select class="form-control select2" name="t_jawab2">
							<option value="">Pilih</option>
							<?php 
							$qryDept = mysqli_query($con, "SELECT * FROM filter_dept");
							while($dept2 = mysqli_fetch_array($qryDept)){
							?>
							<option value="<?php echo $dept2['nama'];?>" <?php if($rcek['t_jawab2'] == $dept2['nama']){echo "SELECTED";}?>><?php echo $dept2['nama'];?></option>
							<?php } ?>
						</select>
					</div>
			</div> 
            <div class="form-group">
                <label for="penyelidik_qcf" class="col-sm-2 control-label">Penyelidikan Dept. QCF</label>
                  	<div class="col-sm-4">
                    	<textarea name="penyelidik_qcf" class="form-control" id="penyelidik_qcf" placeholder="" rows="3"></textarea>
                  	</div>
            </div>
            <div class="form-group">
                <label for="penyelidik_terkait" class="col-sm-2 control-label">Penyelidikan Dept. Terkait</label>
                  	<div class="col-sm-4">
                    	<textarea name="penyelidik_terkait" class="form-control" id="penyelidik_terkait" placeholder="" rows="3"></textarea>
                  	</div>
            </div>
            <div class="form-group">
                <label for="tindakan_perbaikan" class="col-sm-2 control-label">Tindakan Perbaikan</label>
                  	<div class="col-sm-4">
                        <input name="tindakan_perbaikan" type="text" class="form-control" id="tindakan_perbaikan" value="" placeholder="">
                  	</div>
            </div>
            <div class="form-group">
                <label for="cegah_qcf" class="col-sm-2 control-label">Tindakan Pencegahan Dept. QCF</label>
                  	<div class="col-sm-4">
                        <textarea name="cegah_qcf" class="form-control" id="cegah_qcf" placeholder="" rows="3"></textarea>
                  	</div>
            </div>
            <div class="form-group">
                <label for="cegah_terkait" class="col-sm-2 control-label">Tindakan Pencegahan Dept. Terkait</label>
                  	<div class="col-sm-4">
                        <textarea name="cegah_terkait" class="form-control" id="cegah_terkait" placeholder="" rows="3"></textarea>
                  	</div>
            </div>
            <!--<div class="form-group">
                <label for="status" class="col-sm-2 control-label">Status Masalah</label>
                  	<div class="col-sm-4">
						<select name="status" class="form-control select2" id="status" onChange="tampil();">
                            <option value="">Pilih</option>
							<option value="Selesai" <?php if($rcek['status']=="Selesai"){ echo "SELECTED"; }?>>Selesai</option>
							<option value="Belum Selesai : Rapat Tinjauan Manajemen" <?php if($rcek['status']=="Belum Selesai : Rapat Tinjauan Manajemen"){ echo "SELECTED"; }?>>Belum Selesai : Rapat Tinjauan Manajemen</option>
							<option value="Belum Selesai : Dibukakan KPI" <?php if($rcek['status']=="Belum Selesai : Dibukakan KPI"){ echo "SELECTED"; }?>>Belum Selesai : Dibukakan KPI</option>
                            <option value="Belum Selesai : Dibukakan FT" <?php if($rcek['status']=="Belum Selesai : Dibukakan FT"){ echo "SELECTED"; }?>>Belum Selesai : Dibukakan FT</option>
                            <option value="Belum Selesai : Lihat FT/KPI/KPE" <?php if($rcek['status']=="Belum Selesai : Lihat FT/KPI/KPE"){ echo "SELECTED"; }?>>Belum Selesai : Lihat FT/KPI/KPE</option>
						</select>
                  	</div>
            </div>-->
			<div class="form-group" id="kpi" style="display:none;">
                <label for="no_kpi" class="col-sm-2 control-label">KPI No.</label>
                  	<div class="col-sm-2">
                        <input name="no_kpi" type="text" class="form-control" id="no_kpi" value="" placeholder="">
                  	</div>
            </div>
			<div class="form-group" id="ft" style="display:none;">
                <label for="no_ft" class="col-sm-2 control-label">FT No.</label>
                  	<div class="col-sm-2">
                        <input name="no_ft" type="text" class="form-control" id="no_ft" value="" placeholder="">
                  	</div>
            </div>
			<div class="form-group" id="kpe" style="display:none;">
                <label for="no_kpe" class="col-sm-2 control-label">KPE No.</label>
                  	<div class="col-sm-2">
                        <input name="no_kpe" type="text" class="form-control" id="no_kpe" value="" placeholder="">
                  	</div>
            </div>
		</div>
<!-- /.box-footer -->
<div class="box-footer">
	<input type="submit" value="Simpan" name="save" id="save" class="btn btn-primary pull-right">
</div>	
</form>	 
</div>
<div class="row">
  	<div class="col-xs-12">
    	<div class="box">
			<div class="box-header with-border">
			</div>    
			<div class="box-body">		
				<table id="example3" class="table table-bordered table-hover table-striped nowrap" width="100%">
					<thead class="bg-green">
					<tr>
						<th width="48"><div align="center">No</div></th>
						<th width="149"><div align="center">No TPUKPE</div></th>
						<th width="301"><div align="center">Masalah</div></th>
						<th width="343"><div align="center">Tindakan Perbaikan</div></th>
						<th width="331"><div align="center">Status</div></th>
						<th width="331"><div align="center">Tgl Packing</div></th>
						<th width="331"><div align="center">Penyerahan ke QAI</div></th>
						<th width="331"><div align="center">Aksi</div></th>
					</tr>
					</thead>
				<tbody>
					<?php 
					$sql=mysqli_query($con,"SELECT * FROM tbl_tpukpe_now WHERE id_disposisi='$_GET[id]' ORDER BY tgl_buat ASC");
					while($r=mysqli_fetch_array($sql)){
			
					$no++;
					$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';	  
				
					?>
						<tr bgcolor="<?php echo $bgcolor; ?>">
							<td align="center"><?php echo $no; ?></td>
							<td align="center"><a href="#" class="edit_tpukpe" id="<?php echo $r['id'] ?>"><?php echo $r['no_tpukpe']; ?></a></td>
							<td align="left"><?php echo $r['masalah']; ?></td>
							<td align="left"><?php echo $r['tindakan_perbaikan']; ?></td>
							<td align="left"><?php echo $r['status']; ?></td>
                            <td align="left"><?php echo $r['tgl_packing']; ?></td>
                            <td align="left"><?php echo $r['serah_qai']; ?></td>
							<td align="center"><div class="btn-group"><a href="pages/cetak/cetak_tpukpe.php?no_tpukpe=<?php echo $r['no_tpukpe'] ?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>" target="_blank"><i class="fa fa-print"></i> </a>
							<a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataTPUKPEDisposisi-<?php echo $r['id'] ?>');"><i class="fa fa-trash"></i> </a></div></td>
						</tr>   
					<?php 
						} 
					?>
				</tbody>   
				</table> 
					<div id="EditTPUKPE" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
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
         <script type="text/javascript">
    function confirm_delete(delete_url)
    {
      $('#modal_del').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
<div class="modal fade" id="DataMasalah">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sub Defect</h4>
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
         window.location.href='KPENew-$nodemand';
	 
  }
});</script>";
		}
}
?>
