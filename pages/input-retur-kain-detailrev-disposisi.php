<style>
	.icon-button {
	background-image: url('https://cdn-icons-png.flaticon.com/512/3687/3687412.png'); /* Replace with your image file path */
	background-size: 20px 20px; /* Adjust the size as needed */
	background-repeat: no-repeat;
	background-position: center;
	border: none; /* Remove button border */
	width: 20px; /* Adjust the width to fit your icon */
	height: 20px; /* Adjust the height to fit your icon */
	cursor: pointer; /* Add a pointer cursor to indicate it's clickable */
}
</style>
<script>
function aktif(){
		if(document.forms['form1']['sjreturplg'].value == ""){
		document.form1.datepicker.setAttribute("disabled",true);
		document.form1.datepicker.removeAttribute("required");	
		}
		else{
		document.form1.datepicker.removeAttribute("disabled");
		document.form1.datepicker.setAttribute("required",true);
		}
	}
function aktif1(){
		if(document.forms['form1']['sj_itti'].value == ""){
		document.form1.datepicker2.setAttribute("disabled",true);
		document.form1.datepicker2.removeAttribute("required");	
		}
		else{
		document.form1.datepicker2.removeAttribute("disabled");
		document.form1.datepicker2.setAttribute("required",true);
		}
	}
</script>
<?php

include"koneksi.php";
ini_set("error_reporting", 1);
	$qryCek=mysqli_query($con,"SELECT * FROM tbl_disposisi_now WHERE `id`='$_GET[id]'");
	$rCek=mysqli_fetch_array($qryCek);
	 ?>
<?php
date_default_timezone_set("Asia/Jakarta");
//Baca Tanggal Hari ini
$bln = date("Y-m");
$today = date("Y-m-d");
//Cari noretur terakhir pada hari ini
$sql = "SELECT max(no_retur) FROM tbl_detail_retur_now WHERE tgl_buat LIKE '$bln%' and id_disposisi is not null";
$query = mysqli_query($con,$sql) or die (mysqli_error());

$rno = mysqli_fetch_array($query);

if($rno){
  $nilai = substr($rno[0], 8);
  $kode = (int) $nilai;

  //tambahkan sebanyak + 1
  //$tahun = substr(date("y/"),2,2);
  $tgl = date("y/m/"); 
  $kode = $kode + 1;
  $auto_kode = "RT".$tgl.str_pad($kode, 3, "0",  STR_PAD_LEFT);
} else {
  $auto_kode = "RT20/01/000";
}
$qryb=mysqli_query($con,"SELECT no_retur FROM tbl_detail_retur_now WHERE id_disposisi='$_GET[id]' AND tgl_buat LIKE '$today%' LIMIT 1");
$cekb=mysqli_num_rows($qryb);
$rb=mysqli_fetch_array($qryb);
	if($_POST['save']=="save"){	
		if($cekb>0){
			$kdbon=$rb['no_retur'];
		}else{
		$kdbon=$auto_kode;}
		$order=$rCek['no_order'];
		$po=$rCek['po'];
		$langganan=$rCek['langganan'];
		$no_hanger=$rCek['no_hanger'];
		$no_item=$rCek['no_item'];
		$t_jawab=$rCek['t_jawab'];
		$t_jawab1=$rCek['t_jawab1'];
		$t_jawab2=$rCek['t_jawab2'];
		$qty_order=$rCek['qty_order'];
		$qty_kirim=$rCek['qty_kirim'];
		$qty_claim=$rCek['qty_claim'];
		$qty_foc=$rCek['qty_foc'];
		//$langganan=$rCek[langganan];
		$pos=strpos($rCek['langganan'], "/");
		$posbuyer=substr($rCek['langganan'],$pos+1,50);
		$buyer=str_replace("'","''",$posbuyer);
		$pmas= strpos($_POST['warna'], ':');
		$pwar= strpos($_POST['warna'], ';');
		$posmas=substr($_POST['warna'],$pmas+1,100);
		$jenis_kain=str_replace("'","''",$posmas);
		$potW=substr($_POST['warna'],0,$pwar);
		$potKK=substr($_POST['warna'],$pwar+1,15);
		$kk=str_replace("'","''",$potKK);
		$warna=str_replace("'","''",$potW);
		$masalah=str_replace("'","''",$_POST['masalah']);
		$lot=str_replace("'","''",$_POST['lot']);
		$kg=str_replace("'","''",$_POST['kg']);
		$pjg=str_replace("'","''",$_POST['pjg']);
		$satuan=str_replace("'","''",$_POST['satuan']);
		$roll=str_replace("'","''",$_POST['roll']);
		$ket=str_replace("'","''",$_POST['ket']);
		$sjreturplg=str_replace("'","''",$_POST['sjreturplg']);
		$tgl_sjretur=$_POST['tgl_sjretur'];
		$tgltrm_sjretur=$_POST['tgltrm_sjretur'];
		$sj_itti=str_replace("'","''",$_POST['sj_itti']);
		$tgl_sjitti=$_POST['tgl_sjitti'];
		$qty_tu=str_replace("'","''",$_POST['qty_tu']);
		$t_jawab=$_POST['t_jawab'];
		//$valjawab= array_values($t_jawab);
		$qry1=mysqli_query($con,"INSERT INTO tbl_detail_retur_now SET
		`id_disposisi`='$_GET[id]',
		`no_retur`='$kdbon',
		`po`='$po',
		`no_order`='$order',
		`langganan`='$langganan',
		`no_hanger`='$no_hanger',
		`no_item`='$no_item',
		`buyer`='$buyer',
		`masalah`='$masalah',
		`jenis_kain`='$jenis_kain',
		`warna`='$warna',
		`lot`='$lot',
		`kg`='$kg',
		`pjg`='$pjg',
		`satuan`='$satuan',
		`roll`='$roll',
		`nodemand`='$kk',
		`nodemand_ncp`='$_POST[nodemand_ncp]',
		`t_jawab`='$_POST[t_jawab]',
		`t_jawab1`='$_POST[t_jawab1]',
		`t_jawab2`='$_POST[t_jawab2]',
		`qty_order`='$_POST[qty_order]',
		`qty_kirim`='$_POST[qty_kirim]',
		`qty_claim`='$_POST[qty_claim]',
		`qty_foc`='$_POST[qty_foc]',
		`masalah_dominan`='$_POST[masalah_dominan]',
		`nodemand_akj`='$_POST[nodemand_akj]',
		`tgl_buat`=now(),
		`tgl_update`=now()
		");	
		if($qry1){	
	echo "<script>swal({
  title: 'Data Telah diSimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {

      window.location.href='TambahDetailReturDisposisi-$_GET[id]';
	 
  }
});</script>";
		}
	}
//window.open('pages/cetak/cetak_retur.php?no_retur=$retur','_blank');//Above Line TambahRetur
?>	

<div class="box box-info">
 	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
		<div class="box-header with-border">
			<h3 class="box-title">Formulir Retur</h3> <br>
			<div class="box-tools pull-right">
      			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
  		</div>
  		<div class="box-body">
	  		<div class="form-group">
                <label for="warna" class="col-sm-2 control-label">Warna / Jenis Kain </label>
                  	<div class="col-sm-3">
                    	<select class="form-control select2" name="warna" required>
							<option value="">Pilih</option>
							<?php $sqlw1=mysqli_query($con,"SELECT warna,no_demand as nodemand,jenis_kain FROM tbl_disposisi_now 
							WHERE 
							-- po='$rCek[po]' and 
							no_order='$rCek[no_order]' 
							ORDER BY warna");
							while ($rwarna=mysqli_fetch_array($sqlw1)){ ?>
							<option value="<?php echo $rwarna['warna'].";".$rwarna['nodemand'].":".$rwarna['jenis_kain'];?>"><?php echo $rwarna['warna']." ; ".$rwarna['jenis_kain'];?></option>
							<?php } ?>
						</select>
                  	</div>
            </div>
			<div class="form-group">
                <label for="nodemand_ncp" class="col-sm-2 control-label">No Demand NCP</label>
                  	<div class="col-sm-2">
                    	<select class="form-control select2" name="nodemand_ncp" required>
							<option value="">Pilih</option>
							<?php $sqlkkncp=mysqli_query($con,"SELECT no_demand as nodemand FROM tbl_disposisi_now WHERE 
							-- po='$rCek[po]' and 
							no_order='$rCek[no_order]' 
							ORDER BY nodemand");
							while ($rkkncp=mysqli_fetch_array($sqlkkncp)){ ?>
							<option value="<?php echo $rkkncp['nodemand'];?>"><?php echo $rkkncp['nodemand'];?></option>
							<?php } ?>
						</select>
                  	</div>
            </div>
			<div class="form-group">
				<label for="nodemand_akj" class="col-sm-2 control-label">No Demand AKJ</label>
					<div class="col-sm-2">
						<input name="nodemand_akj" type="text" class="form-control" id="nodemand_akj" value="" placeholder="No Demand AKJ">
                  	</div>
			</div>
			<div class="form-group">
				<label for="lot" class="col-sm-2 control-label">Lot</label>
					<div class="col-sm-2">
						<input name="lot" type="text" class="form-control" id="lot" value="" placeholder="Lot">
                  	</div>
			</div>
			<div class="form-group">
				<label for="roll" class="col-sm-2 control-label">Quantity</label>
					<div class="col-sm-2">
						<input name="roll" type="text" class="form-control" id="roll" value="" placeholder="Roll">
                  	</div>
					<div class="col-sm-2">
                    	<div class="input-group"> 
							<input name="kg" type="text" class="form-control" id="kg" value="" placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">Kg</span>	
						</div>
                  	</div>
				  	<div class="col-sm-2">
                    	<div class="input-group">  
							<input name="pjg" type="text" class="form-control" id="pjg" value="" placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">
								<select name="satuan" style="font-size: 12px;" id="satuan">
									<option value="Yard" <?php if($rcek['satuan']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
								  	<option value="Meter" <?php if($rcek['satuan']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
								  	<option value="PCS" <?php if($rcek['satuan']=="PCS"){ echo "SELECTED"; }?>>PCS</option>
							  	</select>
							</span>	
						</div>
                  	</div>
			</div>
			<div class="form-group">
		  		<label for="masalah" class="col-sm-2 control-label">Masalah</label>
		  			<div class="col-sm-4">
						<textarea name="masalah" rows="3" class="form-control" id="masalah" placeholder="Masalah"></textarea>
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
		</div>
<!-- /.box-footer -->
<div class="box-footer">
	<?php 
	$qrycek1=mysqli_query($con,"SELECT * FROM tbl_detail_retur_now WHERE no_order='$rCek[no_order]' AND po='$rCek[po]' AND id_disposisi='$_GET[id]'");
	$cek1=mysqli_num_rows($qrycek1);
	?>
	<button type="submit" class="btn btn-primary pull-right" <?php if($cek1>=10){echo "disabled";} ?> name="save" value="save">Simpan <i class="fa fa-save"></i></button> 
	<!--<input type="submit" value="Simpan" name="save" id="save" class="btn btn-primary pull-right" >
	<button type="submit" class="btn btn-success pull-right" <?php if($cek1<1 OR $cek>5){echo "disabled";} ?> name="selesai" value="selesai">Selesai <i class="fa fa-check-square"></i></button>-->
</div>	
</form>	 
</div>
<div class="row">
  	<div class="col-xs-12">
    	<div class="box">
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
            <div class="box-header with-border">
					<div class="pull-right">
						<input type="submit" value="Pilih Cetak" name="save" id="save" class="btn btn-primary pull-left"/>
						<a href="pages/cetak/cetak_suratretur_disposisi.php?no_order=<?php echo $rCek['no_order'];?>&po=<?php echo $rCek['po'];?>&id_nsp=<?php echo $_GET['id'];?>&id_cek=<?php echo $_POST['cek'][0];?>&id_cek1=<?php echo $_POST['cek'][1];?>&id_cek2=<?php echo $_POST['cek'][2];?>" class="btn btn-danger cetak <?php if($_POST['cek'][0]=="") { echo "disabled"; }?>" target="_blank" >Cetak Surat Barang Retur</a>
						<!--<a href="pages/cetak/cetak_suratretur_pdf.php?no_order=<?php echo $rCek['no_order'];?>&po=<?php echo $rCek['po'];?>&id_nsp=<?php echo $_GET['id'];?>" class="btn btn-danger" target="_blank">Cetak Surat Barang Retur PDF</a>-->
					</div>
	                </div>    
			<div class="box-body">
				<table id="example3" class="table table-bordered table-hover table-striped nowrap" width="100%">
					<thead class="bg-green">
					<tr>
						<th width="48"><div align="center">No</div></th>
						<th width="60"><div align="center">Tgl Keputusan</div></th>
						<th width="301"><div align="center">Masalah</div></th>
						<th width="343"><div align="center">Jenis Kain</div></th>
						<th width="331"><div align="center">Warna</div></th>
						<th width="331"><div align="center">Lot</div></th>
						<th width="331"><div align="center">SJ Retur Pelanggan</div></th>
						<th width="331"><div align="center">Tgl Terima SJ Retur</div></th>
						<th width="331"><div align="center">SJ ITTI</div></th>
						<th width="331"><div align="center">Qty</div></th>
						<th width="331"><div align="center">Keterangan</div></th>
						<th width="48"><div align="center">Aksi</div></th>
					</tr>
					</thead>
				<tbody>
					<?php 
					$sql=mysqli_query($con," SELECT * FROM tbl_detail_retur_now WHERE id_disposisi='$rCek[id]' AND po='$rCek[po]' AND no_order='$rCek[no_order]' ORDER BY tgl_buat ASC");
					while($r=mysqli_fetch_array($sql)){
			
					$no++;
					$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';	  
				
					?>
						<tr bgcolor="<?php echo $bgcolor; ?>">
							<td align="center"><a href="#" class="edit_retur" id="<?php echo $r['id'] ?>"><?php echo $no; ?></a><br><input type="checkbox" name="cek[]" value="<?php echo $r['id']; ?>" 
                                <?php if (isset($_POST['cek']) && in_array($r['id'], $_POST['cek'])): ?>
                                checked="checked"
                                <?php endif; ?>/></td>
							<td align="left" valign="top"><?php echo $r['tgl_keputusan'];?></td>
							<td align="left" valign="top"><?php echo $r['masalah'];?></td>
							<td align="left" valign="top"><?php echo $r['jenis_kain'];?></td>
							<td align="left" valign="top"><?php echo $r['warna'];?></td>
							<td align="left" valign="top"><?php echo $r['lot'];?></td>
							<td align="left"><?php echo $r['sjreturplg']."/".$r['tgl_sjretur']; ?></td>
							<td align="left" valign="top"><?php echo $r['tgltrm_sjretur'];?></td>
							<td align="left"><?php echo $r['sj_itti']."/".$r['tgl_sjitti'];?></td>
							<td align="right"><?php echo $r['roll']." Roll ".$r['kg']." Kg "; ?></td>
							<td align="left" valign="top"><?php echo $r['ket']; ?></td>
							<td align="center">
							<div>
							<!--
							<a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataDetailRetur-<?php echo $r['id'] ?>');">
								<i class="fa fa-trash"></i>
							</a>
							-->
							
							<form action="" method="post">
							<input type="hidden" name="id_delete" value="<?php echo $r['id'] ?>">
			
							<input type="hidden" name="id_redirect" value="<?php echo $_GET['id'] ?>">
							
						
							<?php if($_SESSION['akses']!='biasa'){ ?>
						
							<input onclick="return confirm('Are you sure you want to delete.')" type="submit" name="delete_post" value="`" class="icon-button" ></input>
							
							<?php } ?>
							
							
							
							
							
							</div>
							</td>
						</tr>   
					<?php 
						} 
					?>
				</tbody>   
				</table> 
				
				<?php 
				if ($_POST['delete_post']) {
					include"koneksi.php";
					$id =  $_POST['id_delete']; 
					
					$id_redirect = $_POST['id_redirect'];
					$modal=mysqli_query($con,"DELETE FROM tbl_detail_retur_now WHERE id='$id' ");
					//$modal = null ; 
					if ($modal) {
						echo "<script>window.location='TambahDetailReturDisposisi-$id_redirect';</script>";
					} else {
						echo "<script>alert('Gagal Hapus');window.location='TambahDetailReturDisposisi-$id_redirect';</script>";
					}
				}
				?>
				
					<div id="EditRetur" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
					</div>
    		</div>
			</form>
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
