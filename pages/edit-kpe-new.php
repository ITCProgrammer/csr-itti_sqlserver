
<?php

// Tentukan halaman redirect berdasarkan sumber kunjungan
$redirect = 'LapKPE';

$status_edit = isset($_GET['status_edit']) ? $_GET['status_edit'] : '';
if ($status_edit === 'bprc') {
    $redirect = 'LapBPRC';
} elseif ($from === 'bprc') {
    $redirect = 'LapBPRC';
} elseif (!empty($status_edit)) {
    $redirect = 'LapKPEStatus';
}

//echo $redirect;
//exit;
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$id=$_GET['id'];

$sqlCek=mysqli_query($con,"SELECT a.*,
GROUP_CONCAT( DISTINCT b.no_ncp SEPARATOR ', ' ) AS no_ncp,
GROUP_CONCAT( DISTINCT b.masalah SEPARATOR ', ' ) AS masalah_ncp 
FROM tbl_aftersales_now a LEFT JOIN tbl_ncp_qcf_new b ON a.nodemand=b.nodemand WHERE a.id='$id' 
GROUP BY a.nodemand
ORDER BY a.id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$rcek=mysqli_fetch_array($sqlCek);
$dt_penghubung = "SELECT 
					* 
						FROM tbl_qcf
					WHERE nodemand ='$rcek[nodemand]' ";
	$exec = mysqli_query($con,$dt_penghubung );
	$penghubung = mysqli_fetch_array($exec);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <div class="box box-info">
   <div class="box-header with-border">
    <h3 class="box-title">Edit Data Kartu Kerja</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div> 
  </div>
  <div class="box-body"> 
	 <div class="col-md-6"> 
		<div class="form-group">
			<label for="nodemand" class="col-sm-3 control-label">No Demand</label>
				<div class="col-sm-4">
					<input name="nodemand" type="text" required class="form-control" id="nodemand" placeholder="No Demand" 
					onchange="window.location='KPENew-'+this.value" value="<?php echo $rcek['nodemand'];?>" readonly="readonly" >
			  	</div> <font color="red"><?php if($cek>0){ echo "Sudah Input Pada Tgl: ".$rcek['tgl_buat']." | ";} ?> <?php if($rcek['no_ncp']!=""){echo $rcek['no_ncp'];}?></font>
					</div>
		<div class="form-group">
		  <label for="nokk" class="col-sm-3 control-label">No KK / Prod. Order</label>
		  <div class="col-sm-4">
			<input name="nokk" type="text" class="form-control" id="nokk" 
			value="<?php if($cek>0){echo $rcek['nokk'];} ?>" placeholder="No KK" readonly>
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_order" class="col-sm-3 control-label">No Order</label>
		  <div class="col-sm-4">
			<input name="no_order" type="text" required class="form-control" id="no_order" placeholder="No Order" 
			value="<?php if($cek>0){echo $rcek['no_order'];} ?>" readonly="readonly">
		  </div> <font color="red"><?php if($rcek['masalah_ncp']!=""){ echo "Analisa Kerusakan: ".$rcek['masalah_ncp'];} ?></font>				   
		</div>
		<?php if(!empty($penghubung['penghubung_masalah'])||!empty($penghubung['penghubung2_masalah'])||!empty($penghubung['penghubung3_masalah'])){?>
					<div class="form-group">
						<label for="pengubung" class="col-sm-3 control-label">Bon Penghubung</label>
						<div class="col-md-6">
						<?php if(!empty($penghubung['penghubung_masalah'])){?>
							<label for="penghubung" class="control-label">Issue 1 / Notes </label>
							<br><br><?php echo $penghubung['penghubung_masalah'] .' / '. $penghubung['penghubung_keterangan'];?>
						<?php }?>
						<?php if(!empty($penghubung['penghubung2_masalah'])){?>
							<br><br><label for="penghubung" class="control-label">Issue 2 / Notes</label>
							<br><br><?php echo $penghubung['penghubung2_masalah'] .' / '. $penghubung['penghubung2_keterangan'];?>
							<?php }?>
						<?php if(!empty($penghubung['penghubung3_masalah'])){?>
							<br><br><label for="penghubung" class="control-label">Issue 3 / Notes</label>
							<br><br><?php echo $penghubung['penghubung3_masalah'] .' / '. $penghubung['penghubung3_keterangan'];?>
							<?php }?>
							<br><br>
							<form id="myForm">
								<label>
									<input type="radio" name="status_penghubung" value="terima" required <?php if ($rcek['status_penghubung'] == 'terima') echo 'checked'; ?>> Yes
								</label>
								&nbsp;&nbsp;&nbsp;
								<label>
									<input type="radio" name="status_penghubung" value="tolak" required <?php if ($rcek['status_penghubung'] == 'tolak') echo 'checked'; ?>> No
								</label>
								<br><br>
							</form>

						</div>
					</div>
				<?php }?>
		<div class="form-group">
		  <label for="no_po" class="col-sm-3 control-label">Pelanggan</label>
		  <div class="col-sm-6">
			<input name="pelanggan" type="text" class="form-control" id="no_po" placeholder="Pelanggan" 
			value="<?php if($cek>0){echo $rcek['langganan'];}?>" >
			<input name="pelanggan1" type="hidden" class="form-control" id="pelanggan1" 
			value="<?php if($cek>0){echo $rcek['pelanggan'];}?>" placeholder="Pelanggan" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_po" class="col-sm-3 control-label">PO</label>
		  <div class="col-sm-5">
			<input name="no_po" type="text" class="form-control" id="no_po" 
			value="<?php if($cek>0){echo $rcek['po'];} ?>" placeholder="PO" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
		  <div class="col-sm-3">
			<input name="no_hanger" type="text" class="form-control" id="no_hanger" 
			value="<?php if($cek>0){echo $rcek['no_hanger'];}?>" placeholder="No Hanger">  
		  </div>
		  <div class="col-sm-3">
		  <input name="no_item" type="text" class="form-control" id="no_item" 
			value="<?php if($rcek['no_item']!=""){echo $rcek['no_item'];}?>" placeholder="No Item">
		  </div>	
		</div>
		<!-- <div class="form-group">
		  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
		  <div class="col-sm-8"> -->
		  		<input name="jns_kain" type="hidden" class="form-control" id="jns_kain" 
				value="<?php if($cek>0){echo $rcek['jenis_kain'];}?>" placeholder="Jenis Kain">
			  <!-- </div>
		  </div> -->
		<!-- <div class="form-group">
                  <label for="styl" class="col-sm-3 control-label">Style</label>
                  <div class="col-sm-8"> -->
                    <input name="styl" type="hidden" class="form-control" id="styl" 
                    value="<?php if($cek>0){echo $rcek['styl'];} ?>" placeholder="Style">
                  <!-- </div>				   
                </div>  -->
		<div class="form-group">
		  <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
		  <div class="col-sm-2">
			<input name="lebar" type="text" class="form-control" id="lebar" 
			value="<?php if($cek>0){echo $rcek['lebar'];} ?>" placeholder="0" required>
		  </div>
		  <div class="col-sm-2">
			<input name="grms" type="text" class="form-control" id="grms" 
			value="<?php if($cek>0){echo $rcek['gramasi'];} ?>" placeholder="0" required>
		  </div>		
		</div>
		<div class="form-group">
			<label for="warna" class="col-sm-3 control-label">Warna / No Warna</label>
				<div class="col-sm-4">
					<input name="warna" type="text" class="form-control" id="warna" 
					value="<?php if($cek>0){echo $rcek['warna'];}?>" placeholder="Warna">
				</div>				   
				<div class="col-sm-4">
					<input name="no_warna" type="text" class="form-control" id="no_warna" 
					value="<?php if($cek>0){echo $rcek['no_warna'];}?>" placeholder="No Warna">
				</div>				   
		</div>
		<div class="form-group">
		  <label for="lot" class="col-sm-3 control-label">Lot</label>
		  <div class="col-sm-3">
			<input name="lot" type="text" class="form-control" id="lot" 
			value="<?php if($cek>0){echo $rcek['lot'];} ?>" placeholder="Lot" >
		  </div>				   
		</div>

		<div class="form-group">
					<label for="proses" class="col-sm-3 control-label">Qty Order</label>
					<div class="col-sm-4">
						<div class="input-group">
							<input name="qty_order" type="text" class="form-control" id="qty_order" value="<?php if ($cek > 0) {
								echo number_format($rcek['qty_order'], 2);
							} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_o" style="font-size: 12px;" id="satuan1">
									<?php
									$units_o = ['KG', 'PCS']; // Define the units you want to check for
									
									foreach ($units_o as $unit_o) {
										$isSelected_o = $rcek['satuan_o'] == $unit_o;
										$selectedAttribute_o = $isSelected_o ? 'selected' : '';
										echo "<option value=\"$unit_o\" $selectedAttribute_o>$unit_o</option>";
									}
									?>
								</select>
							</span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
						<input name="qty_order2" type="text" class="form-control" id="qty_order2" value="<?php if ($cek > 0) {
								echo number_format($rcek['qty_order2'], 2);
							} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_o2" style="font-size: 12px;" id="satuan1">
									<?php
									$units_o = ['YD', 'MTR']; // Define the units you want to check for
									
									foreach ($units_o as $unit_o) {
										$isSelected_o = $rcek['satuan_o2'] == $unit_o;
										$selectedAttribute_o = $isSelected_o ? 'selected' : '';
										echo "<option value=\"$unit_o\" $selectedAttribute_o>$unit_o</option>";
									}
									?>
								</select>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="tgl_finishing" class="col-sm-3 control-label">Qty Kirim</label>
					<div class="col-sm-4">
						<div class="input-group">
						<input name="qty_kirim" type="text" class="form-control" id="qty_kirim" value="<?php if ($cek > 0) {
								echo $rcek['qty_kirim'];
							} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_k" style="font-size: 12px;" id="satuan_k">
									<?php
									$units_k = ['KG', 'PCS']; // Define the units you want to check for
									
									foreach ($units_k as $unit_k) {
										$isSelected_k = $rcek['satuan_k'] == $unit_k;
										$selectedAttribute_k = $isSelected_k ? 'selected' : '';
										echo "<option value=\"$unit_k\" $selectedAttribute_k>$unit_k</option>";
									}
									?>
								</select>
							</span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
						<input name="qty_kirim2" type="text" class="form-control" id="qty_kirim2" value="<?php if ($cek > 0) {
								echo $rcek['qty_kirim2'];
							} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_k2" style="font-size: 12px;" id="satuan_k2">
									<?php
									$units_k = ['YD', 'MTR']; // Define the units you want to check for
									
									foreach ($units_k as $unit_k) {
										$isSelected_k = $rcek['satuan_k2'] == $unit_k;
										$selectedAttribute_k = $isSelected_k ? 'selected' : '';
										echo "<option value=\"$unit_k\" $selectedAttribute_k>$unit_k</option>";
									}
									?>
								</select>
							</span>
						</div>
					</div>
				</div>

				<!-- YD -->
				<div class="form-group">
					<label for="proses" class="col-sm-3 control-label">Qty Claim</label>
					<div class="col-sm-4">
						<div class="input-group">
						<input name="qty_claim" type="text" class="form-control" id="qty_claim" value="<?php if ($cek > 0) {
								echo $rcek['qty_claim'];
							} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_c" style="font-size: 12px;" id="satuan_c">
									<?php
									$units_c = ['KG', 'PCS']; // Define the units you want to check for
									
									foreach ($units_c as $unit_c) {
										$isSelected_c = $rcek['satuan_c'] == $unit_c;
										$selectedAttribute_c = $isSelected_c ? 'selected' : '';
										echo "<option value=\"$unit_c\" $selectedAttribute_c>$unit_c</option>";
									}
									?>
								</select>
							</span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
						<input name="qty_claim2" type="text" class="form-control" id="qty_claim2" value="<?php if ($cek > 0) {
								echo $rcek['qty_claim2'];
							} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_c2" style="font-size: 12px;" id="satuan_c2">
									<?php
									$units_c = ['YD', 'MTR']; // Define the units you want to check for
									
									foreach ($units_c as $unit_c) {
										$isSelected_c = $rcek['satuan_c2'] == $unit_c;
										$selectedAttribute_c = $isSelected_c ? 'selected' : '';
										echo "<option value=\"$unit_c\" $selectedAttribute_c>$unit_c</option>";
									}
									?>
								</select>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="tgl_finishing" class="col-sm-3 control-label">Qty FOC</label>
					<div class="col-sm-4">
						<div class="input-group">
						<input name="qty_foc" type="text" class="form-control" id="qty_foc" value="<?php if ($cek > 0) {
								echo $rcek['qty_foc'];
							} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_f" style="font-size: 12px;" id="satuan_f">
									<?php
									$units_f = ['KG', 'PCS']; // Define the units you want to check for
									
									foreach ($units_f as $unit_f) {
										$isSelected_f = $rcek['satuan_f'] == $unit_f;
										$selectedAttribute_f = $isSelected_f ? 'selected' : '';
										echo "<option value=\"$unit_f\" $selectedAttribute_f>$unit_f</option>";
									}
									?>
								</select>
							</span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<input name="qty_foc2" type="text" class="form-control" id="qty_foc2" value="<?php if ($cek > 0) {
								echo $rcek['qty_foc2'];
							} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_f2" style="font-size: 12px;" id="satuan_f2">
									<?php
									$units_f = ['YD', 'MTR']; // Define the units you want to check for
									
									foreach ($units_f as $unit_f) {
										$isSelected_f = $rcek['satuan_f2'] == $unit_f;
										$selectedAttribute_f = $isSelected_f ? 'selected' : '';
										echo "<option value=\"$unit_f\" $selectedAttribute_f>$unit_f</option>";
									}
									?>
								</select>
							</span>
						</div>
					</div>
				</div>
				<!-- END OF YD -->
	  </div>
	  		<!-- col --> 
	  <div class="col-md-6">
		<div class="form-group">
		  <label for="tangggung_jawab" class="col-sm-3 control-label">Tanggung Jawab 1</label>
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
		  <div class="col-sm-3">
                    <div class="input-group">  
					<input name="persen" type="text" class="form-control" id="persen" value="<?php if($cek>0){echo $rcek['persen'];} ?>" placeholder="0.00" style="text-align: right;">
					<span class="input-group-addon">%</span>	
					</div>
                  </div>	
		  </div>
		<div class="form-group">
		  <label for="tangggung_jawab" class="col-sm-3 control-label">Tanggung Jawab 2</label>		  
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
		<div class="col-sm-3">
                    <div class="input-group">  
					<input name="persen1" type="text" class="form-control" id="persen1" value="<?php if($cek>0){echo $rcek['persen1'];} ?>" placeholder="0.00" style="text-align: right;">
					<span class="input-group-addon">%</span>	
					</div>
                  </div>	
		  </div>  
		<div class="form-group">
		  <label for="tangggung_jawab" class="col-sm-3 control-label">Tanggung Jawab 3</label>		  
		  <div class="col-sm-2">
			<select class="form-control select2" name="t_jawab2">
				<option value="">Pilih</option>
				<?php 
				$qryDept2 = mysqli_query($con, "SELECT * FROM filter_dept");
				while($dept2 = mysqli_fetch_array($qryDept2)){
				?>
				<option value="<?php echo $dept2['nama'];?>" <?php if($rcek['t_jawab2'] == $dept2['nama']){echo "SELECTED";}?>><?php echo $dept2['nama'];?></option>
				<?php } ?>
			</select>	
		  </div>
		  <div class="col-sm-3">
                    <div class="input-group">  
					<input name="persen2" type="text" class="form-control" id="persen2" value="<?php if($cek>0){echo $rcek['persen2'];} ?>" placeholder="0.00" style="text-align: right;">
					<span class="input-group-addon">%</span>	
					</div>
                  </div>	
		  </div>
		  	<div class="form-group">
		  		<label for="masalah_dominan" class="col-sm-3 control-label">Masalah Dominan / Solusi</label>
		 		<div class="col-sm-4">
					<select class="form-control select2" name="masalah_dominan" id="masalah_dominan">
						<option value="">Pilih</option>
						<?php 
						$qrym=mysqli_query($con,"SELECT masalah FROM tbl_masalah_aftersales ORDER BY masalah ASC");
						while($rm=mysqli_fetch_array($qrym)){
						?>
						<option value="<?php echo $rm['masalah'];?>" <?php if($rcek['masalah_dominan']==$rm['masalah']){echo "SELECTED";}?>><?php echo $rm['masalah'];?></option>	
						<?php }?>
					</select>
		 	 	</div>
				<div class="col-sm-4">
					<select class="form-control select2" name="solusi" id="solusi">
						<option value="">Pilih</option>
						<?php 
						$qrys=mysqli_query($con,"SELECT solusi FROM tbl_solusi ORDER BY solusi ASC");
						while($rs=mysqli_fetch_array($qrys)){
						?>
						<option value="<?php echo $rs['solusi'];?>" <?php if($rcek['solusi']==$rs['solusi']){echo "SELECTED";}?>><?php echo $rs['solusi'];?></option>	
						<?php }?>
					</select>
		 	 	</div>
		  	</div>
			<div class="form-group">
		  		<label for="masalah" class="col-sm-3 control-label">Masalah / Keterangan</label>
		  		<div class="col-sm-3">
		  			<input name="masalah" type="text" class="form-control" id="masalah" 
                	value="<?php if($cek>0){echo $rcek['masalah'];} ?>" placeholder="Masalah">
		  		</div>				   
				<div class="col-sm-3">
					<input name="ket" type="text" class="form-control" id="ket" 
					value="<?php if($cek>0){echo $rcek['ket'];} ?>" placeholder="Keterangan">
				</div>
				<div class="col-sm-2">
					<input type="checkbox" name="sts_claim" id="sts_claim" value="1" <?php  if($rcek['sts_claim']=="1"){ echo "checked";} ?>>  
					<label> Claim</label>
				</div>				   
			</div>
			<div class="form-group">
					<!-- <div class="col-sm-3">
						<input type="checkbox" name="sts_red" id="sts_red" value="1" onClick="aktif1();" <?php  if($rcek['sts_red']=="1"){ echo "checked";} ?>>  
						<label> Red Category Email</label>
					</div> -->
					<label for="leadtime_email" class="col-sm-3 control-label">Leadtime Email</label>		  
					<div class="col-sm-3">
						<!-- <select class="form-control select2" name="leadtime_email" required <?php  if($rcek['sts_red']!="1"){ echo "disabled";}else{ echo "enabled"; } ?>> -->
						<select class="form-control select2" name="leadtime_email" required>
							<option value="">Pilih</option>
							<option value="1 Hari Kerja" <?php if($rcek['leadtime_email']=="1 Hari Kerja"){echo "SELECTED";}?>>1 Hari Kerja</option>
							<option value="2 Hari Kerja" <?php if($rcek['leadtime_email']=="2 Hari Kerja"){echo "SELECTED";}?>>2 Hari Kerja</option>
							<option value="3 Hari Kerja" <?php if($rcek['leadtime_email']=="3 Hari Kerja"){echo "SELECTED";}?>>3 Hari Kerja</option>
							<option value="4 Hari Kerja" <?php if($rcek['leadtime_email']=="4 Hari Kerja"){echo "SELECTED";}?>>4 Hari Kerja</option>
							<option value="5 Hari Kerja" <?php if($rcek['leadtime_email']=="5 Hari Kerja"){echo "SELECTED";}?>>5 Hari Kerja</option>
							<option value="6 Hari Kerja" <?php if($rcek['leadtime_email']=="6 Hari Kerja"){echo "SELECTED";}?>>6 Hari Kerja</option>
						</select>	
					</div>

					<label for="klasifikasi" class="col-sm-2 control-label">Klasifikasi</label>
						<div class="col-sm-3">
							<?php 
							$fil_penyebab = mysqli_query($con, "SELECT * 
																FROM tbl_penyebab 
																WHERE field_name = 'penyebab' ");
							$dklasifikasi = mysqli_fetch_all($fil_penyebab, MYSQLI_ASSOC);
							?>
							<select class="form-control select2" name="klasifikasi">
								<option value="">Pilih</option>
								<?php foreach ($dklasifikasi as $penyebab): ?>
									<option value="<?php echo $penyebab['name']; ?>" <?php if($rcek['klasifikasi'] == $penyebab['name']){ echo "SELECTED"; } ?>>
										<?php echo $penyebab['name']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>


			<div class="form-group">
					<!-- <div class="col-sm-3"> -->
						<!-- <input type="checkbox" name="sts_red" id="sts_red" value="1" onClick="aktif1();" <?php if ($rcek['sts_red'] == "1") {
						//echo "checked";
					} ?>> -->
						<!-- <label> Red Category Email</label> -->
					<!-- </div> -->
					<label for="leadtime_update" class="col-sm-3 control-label">Leadtime Update</label>
					<div class="col-sm-3">
						<select class="form-control select2" name="leadtime_update" <?php if ($rcek['sts_red'] != "1") {
						//echo "disabled";
					} else {
						//echo "enabled";
					} ?>>
							<option value="">Pilih</option>
							<option value="1 Hari Kerja" <?php if ($rcek['leadtime_update'] == "1 Hari Kerja") {
							echo "SELECTED";
						} ?>>1 Hari Kerja</option>
							<option value="2 Hari Kerja" <?php if ($rcek['leadtime_update'] == "2 Hari Kerja") {
							echo "SELECTED";
						} ?>>2 Hari Kerja</option>
							<option value="3 Hari Kerja" <?php if ($rcek['leadtime_update'] == "3 Hari Kerja") {
							echo "SELECTED";
						} ?>>3 Hari Kerja</option>
							<option value="4 Hari Kerja" <?php if ($rcek['leadtime_update'] == "4 Hari Kerja") {
							echo "SELECTED";
						} ?>>4 Hari Kerja</option>
							<option value="5 Hari Kerja" <?php if ($rcek['leadtime_update'] == "5 Hari Kerja") {
							echo "SELECTED";
						} ?>>5 Hari Kerja</option>
							<option value="6 Hari Kerja" <?php if ($rcek['leadtime_update'] == "6 Hari Kerja") {
							echo "SELECTED";
						} ?>>6 Hari Kerja</option>
						</select>
					</div>
					<div class="col-sm-3">
						<input type="checkbox" name="sts_disposisipro" id="sts_disposisipro" onClick="aktif4();" value="1" <?php  if($rcek['sts_disposisipro']=="1"){ echo "checked";} ?>>  
						<label> Disposisi Produksi</label>
					</div>
				</div>
			<div class="form-group">
							  
					
					<label for="leadtime_email" class="col-sm-3 control-label">HOD / Tgl Solusi Akhir</label>
					<div class="col-sm-4">
							<div class="input-group date">
								<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
								<input  name="hod" type="text" class="form-control pull-right" id="datepicker4" placeholder="0000-00-00" value="<?php if($rcek['tgl_email']!='0000-00-00'){echo $rcek['hod'];} ?>" />
							</div>
					</div>
					<div class="col-sm-4">					  
						<div class="input-group date">
							<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
								<input  name="tgl_solusi_akhir" type="text" class="form-control pull-right" id="datepicker2" placeholder="0000-00-00" value="<?php if($rcek['tgl_solusi_akhir']!='0000-00-00'){echo $rcek['tgl_solusi_akhir'];} ?>" <?php  if($rcek['sts_red']!="1"){ echo "enabled";}else{ echo "enabled"; } ?>/>
						</div>
					</div>
			</div>
			
			<div class="form-group">
					<label for="tgl_leadtime_update" class="col-sm-3 control-label">Tgl Update</label>
					<div class="col-sm-4">
						<div class="input-group date">
							<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
							<input name="tgl_leadtime_update" type="text" class="form-control pull-right" id="datepicker5"
								placeholder="0000-00-00" value="<?php if ($cek > 0) {
								echo $rcek['tanggal_leadtime_update'];
							} ?>" />
						</div>
					</div>
				</div>
			
			<div class="form-group">		  	
				<label for="tgl_email" class="col-sm-3 control-label">Tgl Email / Tgl Jawab</label>
				<div class="col-sm-4">					  
					<div class="input-group date">
						<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
						<input name="tgl_email" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php if($rcek['tgl_email']!='0000-00-00'){echo $rcek['tgl_email'];} ?>" <?php  if($rcek['sts_red']!="1"){ echo "";}else{ echo "enabled"; } ?> required/>
					</div>
				</div>
				<div class="col-sm-4">					  
					<div class="input-group date">
						<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
						<input name="tgl_jawab" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php if($rcek['tgl_jawab']!='0000-00-00'){echo $rcek['tgl_jawab'];} ?>" <?php  if($rcek['sts_red']!="1"){ echo "";}else{ echo "enabled"; } ?>required/>
					</div>
				</div>
			
			</div>
			
			<div class="form-group">
				<!-- <div class="col-sm-3">
					<input type="checkbox" name="sts" id="sts" value="1" onClick="aktif();" <?php  if($rcek['sts']=="1"){ echo "checked";} ?>>  
					<label> Lolos QC</label>
				</div> -->
				<!-- <div class="col-sm-3">
					<input type="checkbox" name="sts_disposisiqc" id="sts_disposisiqc" onClick="aktif3();" value="1" <?php  if($rcek['sts_disposisiqc']=="1"){ echo "checked";} ?>>  
					<label> Disposisi QC</label>
				</div> -->
				<!-- <div class="col-sm-3">
					<input type="checkbox" name="sts_disposisipro" id="sts_disposisipro" onClick="aktif4();" value="1" <?php  if($rcek['sts_disposisipro']=="1"){ echo "checked";} ?>>  
					<label> Disposisi Produksi</label>
				</div>
				<div class="col-sm-3">
					<input type="checkbox" name="sts_nego" id="sts_nego" onClick="aktif6();" value="1" <?php  if($rcek['sts_nego']=="1"){ echo "checked";} ?>>  
					<label> Nego Aftersales</label>
				</div>		  	 -->
			</div>
			<div class="form-group">
		  			<label for="kategori" class="col-sm-3 control-label">Route Cause</label>
		 			<div class="col-sm-3">
						<div class="input-group">
						<select class="form-control select2" name="kategori" id="kategori">
							<option value="">Pilih</option>
							<?php 
							$qryk=mysqli_query($con,"SELECT kategori FROM tbl_kategori_aftersales ORDER BY kategori ASC");
							while($rk=mysqli_fetch_array($qryk)){
							?>
							<option value="<?php echo $rk['kategori'];?>" <?php if($rcek['kategori']==$rk['kategori']){echo "SELECTED";}?>><?php echo $rk['kategori'];?></option>	
							<?php }?>
						</select>
						<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataKategori"> ...</button></span>
						</div>
		 	 		</div>
					<div class="col-sm-3">
					<div class="input-group">
							<input name="qty_lolos" type="text" class="form-control" id="qty_lolos"
								value="<?= ($cek > 0 && !is_null($rcek['qty_lolos']) && !empty($rcek['qty_lolos'])) ? number_format($rcek['qty_lolos'], 2) : '' ?>"
								placeholder="0.00" style="text-align: right;">
								<span class="input-group-addon">
								<select name="satuan_l" style="font-size: 12px;" id="satuan1">
									<?php
									$units_l = ['KG']; // Define the units you want to check for
									
									foreach ($units_l as $unit_l) {
										echo "<option value=\"$unit_l\">$unit_l</option>";
									}
									?>
								</select> 
							</span>
						</div>
					</div>
					<!-- <div class="col-sm-3">
						<div class="input-group">
							<input name="qty_lolos" type="text" class="form-control" id="qty_lolos" value="<?= ($cek > 0 && !is_null($rcek['qty_lolos']) && !empty($rcek['qty_lolos'])) ? number_format($rcek['qty_lolos'], 2) : '' ?>" placeholder="0.00" style="text-align: right;" disabled>
							<span class="input-group-addon">
								<select name="satuan_l" style="font-size: 12px;" id="satuan1">
									<?php
									$units_l = ['KG']; // Define the units you want to check for
									
									foreach ($units_l as $unit_l) {
										$isSelected_o = $rcek['satuan_o'] == $unit_l;
										$selectedAttribute_o = $isSelected_o ? 'selected' : '';
										echo "<option value=\"$unit_l\" $selectedAttribute_o>$unit_l</option>";
									}
									?>
								</select>
							</span>
						</div>
					</div> -->
					  <!-- <div class="col-sm-3">
						<input type="checkbox" name="addpersonil" id="addpersonil" value="1" onClick="aktif7();" <?php  if($rcek['addpersonil']=="1"){ echo "checked";} ?>>  
						<label> > 2 Personil</label>
					</div> -->
			</div>
			<!-- <div class="form-group">
				<label for="personil" class="col-sm-3 control-label">Personil 1 / Personil 2</label>
					<div class="col-sm-4">
						<select class="form-control select2" name="personil" id="personil" <?php  if($rcek['sts']!="1"){ echo "disabled";}else{ echo "enabled"; } ?>>
							<option value="">Pilih</option>
							<?php 
							$qryp=mysqli_query($con,"SELECT nama FROM tbl_personil_aftersales WHERE jenis='personil' ORDER BY nama ASC");
							while($rp=mysqli_fetch_array($qryp)){
							?>
							<option value="<?php echo $rp['nama'];?>" <?php if($rcek['personil']==$rp['nama']){echo "SELECTED";}?>><?php echo $rp['nama'];?></option>	
							<?php }?>
						</select>
					</div>
					<div class="col-sm-4">
						<select class="form-control select2" name="personil2" id="personil2" <?php  if($rcek['sts']!="1"){ echo "disabled";}else{ echo "enabled"; } ?>>
							<option value="">Pilih</option>
							<?php 
							$qryp=mysqli_query($con,"SELECT nama FROM tbl_personil_aftersales WHERE jenis='personil' ORDER BY nama ASC");
							while($rp=mysqli_fetch_array($qryp)){
							?>
							<option value="<?php echo $rp['nama'];?>" <?php if($rcek['personil2']==$rp['nama']){echo "SELECTED";}?>><?php echo $rp['nama'];?></option>	
							<?php }?>
						</select>
					</div>				   				   
			</div> 
			<div class="form-group">
				<label for="shift" class="col-sm-3 control-label">Shift / Shift2</label>
				<div class="col-sm-3">
					<select class="form-control select2" name="shift" id="shift" <?php  if($rcek['sts']=="1" OR $rcek['sts_disposisiqc']=="1"){ echo "enabled";}else{ echo "disabled"; } ?>>
						<option value="">Pilih</option>
						<option value="A" <?php if($rcek['shift']=="A"){echo "SELECTED";}?>>A</option>	
						<option value="B" <?php if($rcek['shift']=="B"){echo "SELECTED";}?>>B</option>
						<option value="C" <?php if($rcek['shift']=="C"){echo "SELECTED";}?>>C</option>
						<option value="Non-Shift" <?php if($rcek['shift']=="Non-Shift"){echo "SELECTED";}?>>Non-Shift</option>
						<option value="QC2" <?php if($rcek['shift']=="QC2"){echo "SELECTED";}?>>QC2</option>
						<option value="Test Quality" <?php if($rcek['shift']=="Test Quality"){echo "SELECTED";}?>>Test Quality</option>		
					</select>
				</div>				   
				<div class="col-sm-3">
					<select class="form-control select2" name="shift2" id="shift2" <?php  if($rcek['sts']=="1" OR $rcek['sts_disposisiqc']=="1"){ echo "enabled";}else{ echo "disabled"; } ?>>
						<option value="">Pilih</option>
						<option value="A" <?php if($rcek['shift2']=="A"){echo "SELECTED";}?>>A</option>	
						<option value="B" <?php if($rcek['shift2']=="B"){echo "SELECTED";}?>>B</option>
						<option value="C" <?php if($rcek['shift2']=="C"){echo "SELECTED";}?>>C</option>
						<option value="Non-Shift" <?php if($rcek['shift2']=="Non-Shift"){echo "SELECTED";}?>>Non-Shift</option>
						<option value="QC2" <?php if($rcek['shift2']=="QC2"){echo "SELECTED";}?>>QC2</option>
						<option value="Test Quality" <?php if($rcek['shift2']=="Test Quality"){echo "SELECTED";}?>>Test Quality</option>		
					</select>
				</div>				   
			</div> -->
			<!-- <div class="form-group" id="personil34" style="display:none;">
					<label for="personil3" class="col-sm-3 control-label">Personil 3 / Personil 4</label>
					<div class="col-sm-4">
						<div class="input-group">
							<select class="form-control select2" name="personil3" id="personil3">
								<option value="">Pilih</option>
								<?php 
								$qryp=mysqli_query($con,"SELECT nama FROM tbl_personil_aftersales WHERE jenis='personil' ORDER BY nama ASC");
								while($rp=mysqli_fetch_array($qryp)){
								?>
								<option value="<?php echo $rp['nama'];?>" <?php if($rcek['personil3']==$rp['nama']){echo "SELECTED";}?>><?php echo $rp['nama'];?></option>	
								<?php }?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataPersonil"> ...</button></span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<select class="form-control select2" name="personil4" id="personil4" >
								<option value="">Pilih</option>
								<?php 
								$qryp=mysqli_query($con,"SELECT nama FROM tbl_personil_aftersales WHERE jenis='personil' ORDER BY nama ASC");
								while($rp=mysqli_fetch_array($qryp)){
								?>
								<option value="<?php echo $rp['nama'];?>" <?php if($rcek['personil4']==$rp['nama']){echo "SELECTED";}?>><?php echo $rp['nama'];?></option>	
								<?php }?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataPersonil"> ...</button></span>
						</div>
					</div>				   				   
				</div>  
				<div class="form-group" id="shift34" style="display:none;">
					<label for="shift3" class="col-sm-3 control-label">Shift3 / Shift4</label>
					<div class="col-sm-3">
						<select class="form-control select2" name="shift3" id="shift3">
							<option value="">Pilih</option>
							<option value="A" <?php if($rcek['shift3']=="A"){echo "SELECTED";}?>>A</option>	
							<option value="B" <?php if($rcek['shift3']=="B"){echo "SELECTED";}?>>B</option>
							<option value="C" <?php if($rcek['shift3']=="C"){echo "SELECTED";}?>>C</option>
							<option value="Non-Shift" <?php if($rcek['shift3']=="Non-Shift"){echo "SELECTED";}?>>Non-Shift</option>
							<option value="QC2" <?php if($rcek['shift3']=="QC2"){echo "SELECTED";}?>>QC2</option>
							<option value="Test Quality" <?php if($rcek['shift3']=="Test Quality"){echo "SELECTED";}?>>Test Quality</option>		
						</select>
					</div>			   
					<div class="col-sm-3">
						<select class="form-control select2" name="shift4" id="shift4" >
							<option value="">Pilih</option>
							<option value="A" <?php if($rcek['shift4']=="A"){echo "SELECTED";}?>>A</option>	
							<option value="B" <?php if($rcek['shift4']=="B"){echo "SELECTED";}?>>B</option>
							<option value="C" <?php if($rcek['shift4']=="C"){echo "SELECTED";}?>>C</option>
							<option value="Non-Shift" <?php if($rcek['shift4']=="Non-Shift"){echo "SELECTED";}?>>Non-Shift</option>
							<option value="QC2" <?php if($rcek['shift4']=="QC2"){echo "SELECTED";}?>>QC2</option>
							<option value="Test Quality" <?php if($rcek['shift4']=="Test Quality"){echo "SELECTED";}?>>Test Quality</option>		
						</select>
					</div>				   
				</div>
			<div class="form-group">
				<label for="subdept" class="col-sm-3 control-label">Sub Dept / Pejabat</label>
						<div class="col-sm-4">
							<select class="form-control select2" name="subdept" id="subdept" onChange="aktif5();" <?php  if($rcek['sts']=="1" OR $rcek['sts_disposisiqc']=="1"){ echo "enabled";}else{ echo "disabled"; } ?>>
							<option value="">Pilih</option>
							<option value="ADM" <?php if($rcek['subdept']=="ADM"){echo "SELECTED";}?>>ADM</option>	
							<option value="AFTERSALES" <?php if($rcek['subdept']=="AFTERSALES"){echo "SELECTED";}?>>AFTERSALES</option>
							<option value="COLORIST" <?php if($rcek['subdept']=="COLORIST"){echo "SELECTED";}?>>COLORIST</option>
							<option value="INSPECTION" <?php if($rcek['subdept']=="INSPECTION"){echo "SELECTED";}?>>INSPECTION</option>
							<option value="KRAGH" <?php if($rcek['subdept']=="KRAGH"){echo "SELECTED";}?>>KRAGH</option>
							<option value="LEADER" <?php if($rcek['subdept']=="LEADER"){echo "SELECTED";}?>>LEADER</option>
							<option value="MANAGER/ASST.MANAGER" <?php if($rcek['subdept']=="MANAGER/ASST.MANAGER"){echo "SELECTED";}?>>MANAGER/ASST.MANAGER</option>
							<option value="PACKING" <?php if($rcek['subdept']=="PACKING"){echo "SELECTED";}?>>PACKING</option>
							<option value="SPV" <?php if($rcek['subdept']=="SPV"){echo "SELECTED";}?>>SPV</option>
							<option value="TEST QUALITY" <?php if($rcek['subdept']=="TEST QUALITY"){echo "SELECTED";}?>>TEST QUALITY</option>		
							</select>
						</div>
						<div class="col-sm-4">
							<select class="form-control select2" name="pejabat" id="pejabat" <?php  if($rcek['sts']=="1" OR $rcek['sts_disposisiqc']=="1"){ echo "enabled";}else{ echo "disabled"; } ?>>
								<option value="">Pilih</option>
								<?php 
								$qrypjb=mysqli_query($con,"SELECT nama FROM tbl_personil_aftersales WHERE jenis='pejabat' ORDER BY nama ASC");
								while($rpjb=mysqli_fetch_array($qrypjb)){
								?>
								<option value="<?php echo $rpjb['nama'];?>" <?php if($rcek['pejabat']==$rpjb['nama']){echo "SELECTED";}?>><?php echo $rpjb['nama'];?></option>	
								<?php }?>
							</select>
						</div>	
			</div> -->
			<div class="form-group">
				<label for="penyebab" class="col-sm-3 control-label">Penyebab</label>
				<div class="col-sm-6">
					<input name="penyebab" type="text" class="form-control" id="penyebab" 
					value="<?php if($cek>0){echo $rcek['penyebab'];} ?>" placeholder="Penyebab" 
					<?php  // if($rcek['sts']=="1" OR $rcek['sts_disposisiqc']=="1" OR $rcek['sts_disposisipro']=="1"){ echo "enabled";}else{ echo "disabled"; } ?>
					>
				</div>
				<!-- <div class="col-sm-2">
					<select class="form-control select2" name="sts_check" <?php  if($rcek['sts']=="1" OR $rcek['sts_disposisiqc']=="1"){ echo "enabled";}else{ echo "disabled"; } ?>>
						<option value="">Pilih</option>
						<option value="Ceklis" <?php if($rcek['sts_check']=="Ceklis"){echo "SELECTED";}?>>&#10004;</option>
						<option value="Silang" <?php if($rcek['sts_check']=="Silang"){echo "SELECTED";}?>>X</option>
					</select>	
				</div>				    -->
			</div>
			<!-- Revisi lolos QC dan keterangan Revisi di form edit KPE minta di hapus tapi saya komentar saja -->
			<!-- <div class="form-group">
		  		<label for="sts_revdis" class="col-sm-3 control-label"></label>		  
				<div class="col-sm-3">
					<input type="checkbox" name="sts_revdis" id="sts_revdis" value="1" onClick="aktif2();" <?php  //if($rcek['sts_revdis']=="1"){ echo "checked";} ?>>  
					<label> Revisi Lolos QC</label>
				</div>		  	
		  	</div> 
		  	<div class="form-group">
				<label for="ket_revdis" class="col-sm-3 control-label">Keterangan Revisi</label>
				<div class="col-sm-8">
						<input name="ket_revdis" type="text" class="form-control" id="ket_revdis" 
						value="<?php //if($cek>0){echo $rcek['ket_revdis'];} ?>" placeholder="Keterangan Revisi" <?php  //if($rcek['sts_revdis']!="1"){ echo "disabled";}else{ echo "enabled"; } ?>>
				</div>				   
			</div> -->
			<div class="form-group" id="nego1" style="">
				<label for="nama_nego" class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-3">
						<select class="form-control select2" name="nama_nego" id="nama_nego">
							<option value="">Pilih</option>
							<?php 
							$qrynm=mysqli_query($con,"SELECT nama FROM tbl_nama_nego_aftersales ORDER BY nama ASC");
							while($rnm=mysqli_fetch_array($qrynm)){
							?>
							<option value="<?php echo $rnm['nama'];?>" <?php if($rcek['nama_nego']==$rnm['nama']){echo "SELECTED";}?>><?php echo $rnm['nama'];?></option>	
							<?php }?>
						</select>
					</div>
					<div class="col-sm-2">
						<select class="form-control select2" name="checknego" >
							<option value="">Pilih</option>
							<option value="Ceklis" <?php if($rcek['checknego']=="Ceklis"){echo "SELECTED";}?>>&#10004;</option>
							<option value="Silang" <?php if($rcek['checknego']=="Silang"){echo "SELECTED";}?>>X</option>
						</select>	
					</div>
					<div class="col-sm-2">
						<input type="checkbox" name="bprc" id="bprc" value="1" <?php if ($rcek['bprc'] == "1") {
						echo "checked";
					} ?>>
						<label>BPRC</label>
					</div>
            </div>
			<div class="form-group" id="nego2" style="">
				<label for="hasil_nego" class="col-sm-3 control-label">Hasil Negosiasi</label>
					<div class="col-sm-8">
						<input name="hasil_nego" type="text" class="form-control" id="hasil_nego" value="<?php if($cek>0){echo $rcek['hasil_nego'];} ?>" placeholder="Hasil Negosiasi">
					</div>
            </div> 
	 	</div>
	
</div>	 
   <div class="box-footer">
   <button type="submit" class="btn btn-primary pull-right" name="save" value="save"><i class="fa fa-save"></i> Ubah Data</button>   
   </div>
    <!-- /.box-footer -->
</div>
</form>
    
						
                    </div>
                </div>
            </div>
        </div>
<?php
if($_POST['save']=="save"){
	  $warna=str_replace("'","''",$_POST['warna']);
	  $nowarna=str_replace("'","''",$_POST['no_warna']);	
	  $jns=str_replace("'","''",$_POST['jns_kain']);
	  $po=str_replace("'","''",$_POST['no_po']);
	  $masalah=str_replace("'","''",$_POST['masalah']);
	  $ket=str_replace("'","''",$_POST['ket']);
	  $ket_revdis=str_replace("'","''",$_POST['ket_revdis']);
	  $lot=trim($_POST['lot']);
	  $styl=str_replace("'","''",$_POST['styl']);
	  $tgl_email=$_POST['tgl_email'];
	  $tgl_jawab=$_POST['tgl_jawab'];
	  $shift=$_POST['shift'];
	  $bprc = isset($_POST['bprc'] );
	  $qty_order=str_replace(",","",$_POST['qty_order']);
	  $qty_order2=str_replace(",","",$_POST['qty_order2']);
	  if($_POST['sts']=="1"){$sts="1";}else{ $sts="0";}
	  if($_POST['sts_red']=="1"){$sts_red="1";}else{ $sts_red="0";}
	  if($_POST['sts_revdis']=="1"){$sts_revdis="1";}else{ $sts_revdis="0";}
	  if($_POST['sts_claim']=="1"){$sts_claim="1";}else{ $sts_claim="0";}
	  if($_POST['sts_disposisiqc']=="1"){$sts_disposisiqc="1";}else{ $sts_disposisiqc="0";}
	  if($_POST['sts_disposisipro']=="1"){$sts_disposisipro="1";}else{ $sts_disposisipro="0";}
	  if($_POST['sts_nego']=="1"){$sts_nego="1";}else{ $sts_nego="0";}
	  if($_POST['addpersonil']=="1"){$addpersonil="1";}else{ $addpersonil="0";}
	  
  	  $sqlData=mysqli_query($con,"UPDATE tbl_aftersales_now SET 
	  	klasifikasi = '$_POST[klasifikasi]',
		leadtime_update='$_POST[leadtime_update]',
		tanggal_leadtime_update='$_POST[tgl_leadtime_update]',
		status_penghubung='$_POST[status_penghubung]',	  
		  nokk='$_POST[nokk]',
		  langganan='$_POST[pelanggan]',
		  pelanggan='$_POST[pelanggan1]',
		  no_order='$_POST[no_order]',
		  no_hanger='$_POST[no_hanger]',
		  no_item='$_POST[no_item]',
		  po='$po',
		  jenis_kain='$jns',
		  lebar='$_POST[lebar]',
		  gramasi='$_POST[grms]',
		  lot='$lot',
		  styl='$styl',
		  warna='$warna',
		  no_warna='$nowarna',
		  masalah='$masalah',
		  masalah_dominan='$_POST[masalah_dominan]',
		  qty_order='$qty_order',
		  qty_kirim='$_POST[qty_kirim]',
		  qty_claim='$_POST[qty_claim]',
		  bprc='$bprc',
		  qty_foc='$_POST[qty_foc]',
		  qty_lolos='$_POST[qty_lolos]',
		  t_jawab='$_POST[t_jawab]',
		  t_jawab1='$_POST[t_jawab1]',
		  t_jawab2='$_POST[t_jawab2]',
		  persen='$_POST[persen]',
		  persen1='$_POST[persen1]',
		  persen2='$_POST[persen2]',
		  satuan_o='$_POST[satuan_o]',
		  satuan_k='$_POST[satuan_k]',
		  satuan_c='$_POST[satuan_c]',
		  satuan_f='$_POST[satuan_f]',
		  satuan_l='$_POST[satuan_l]',
		  personil='$_POST[personil]',
		  shift='$shift',
		  shift2='$_POST[shift2]',
		  shift3='$_POST[shift3]',
		  shift4='$_POST[shift4]',
		  penyebab='$_POST[penyebab]',
		  subdept='$_POST[subdept]',
		  sts='$sts',
		  sts_red='$sts_red',
		  sts_claim='$sts_claim',
		  sts_revdis='$sts_revdis',
		  ket_revdis='$ket_revdis',
		  ket='$ket',
		  tgl_email='$tgl_email',
		  tgl_jawab='$tgl_jawab',
		  tgl_solusi_akhir='$_POST[tgl_solusi_akhir]',
		  leadtime_email='$_POST[leadtime_email]',
		  solusi='$_POST[solusi]',
		  sts_disposisiqc='$sts_disposisiqc',
		  sts_disposisipro='$sts_disposisipro',
		  sts_nego='$sts_nego',
		  sts_check='$_POST[sts_check]',
		  personil2='$_POST[personil2]',
		  personil3='$_POST[personil3]',
		  personil4='$_POST[personil4]',
		  pejabat='$_POST[pejabat]',
		  nama_nego='$_POST[nama_nego]',
		  hasil_nego='$_POST[hasil_nego]',
		  kategori='$_POST[kategori]',
		  addpersonil='$addpersonil',
		  checknego='$_POST[checknego]',
		  tgl_update=now(),
		  hod='$_POST[hod]',
		  qty_kirim2 = '$_POST[qty_kirim2]',
		qty_claim2 = '$_POST[qty_claim2]',
		qty_order2 = '$qty_order2',
		qty_foc2 = '$_POST[qty_foc2]',
		satuan_k2 = '$_POST[satuan_k2]',
		satuan_c2 = '$_POST[satuan_c2]',
		satuan_o2 = '$_POST[satuan_o2]',
		satuan_f2 = '$_POST[satuan_f2]'
		  WHERE id='$id'");	 
		
			
	  
		if($sqlData){
			
			echo "<script>swal({
  title: 'Data Tersimpan.',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
		window.location.href='$redirect';
	 
  }
});</script>";
		}
				
	}

?>
<script>
function aktif5(){		
		if(document.forms['form1']['sts'].checked == true && (document.forms['form1']['subdept'].value=="TEST QUALITY" || document.forms['form1']['subdept'].value=="COLORIST")){
			document.form1.personil.removeAttribute("disabled");
			document.form1.personil.removeAttribute("required");
			document.form1.personil2.removeAttribute("disabled");
			document.form1.shift.removeAttribute("disabled");
			document.form1.shift.setAttribute("required",true);
			document.form1.shift2.removeAttribute("disabled");
			document.form1.penyebab.removeAttribute("disabled");
			document.form1.penyebab.setAttribute("required",true);
			document.form1.subdept.removeAttribute("disabled");
			document.form1.subdept.setAttribute("required",true);
			document.form1.pejabat.removeAttribute("disabled");
			document.form1.pejabat.removeAttribute("required");
			document.form1.sts_disposisiqc.setAttribute("disabled",true);
			document.form1.sts_disposisipro.setAttribute("disabled",true);
			document.form1.sts_check.removeAttribute("disabled");
			document.form1.sts_check.setAttribute("required",true);
		}
}
function aktif(){		
		if(document.forms['form1']['sts'].checked == true){
			document.form1.personil.removeAttribute("disabled");
			document.form1.personil2.removeAttribute("disabled");
			document.form1.shift.removeAttribute("disabled");
			document.form1.shift2.removeAttribute("disabled");
			document.form1.penyebab.removeAttribute("disabled");
			document.form1.penyebab.setAttribute("required",true);
			document.form1.subdept.removeAttribute("disabled");
			document.form1.subdept.setAttribute("required",true);
			document.form1.pejabat.removeAttribute("disabled");
			document.form1.pejabat.removeAttribute("required");
			document.form1.sts_disposisiqc.setAttribute("disabled",true);
			document.form1.sts_disposisipro.setAttribute("disabled",true);
			document.form1.sts_check.removeAttribute("disabled");
			document.form1.sts_check.setAttribute("required",true);
			document.form1.qty_lolos.removeAttribute("disabled");
			document.form1.qty_lolos.setAttribute("required", true);
			document.form1.satuan_l.removeAttribute("disabled");
			document.form1.satuan_l.setAttribute("required", true);
		}else {
			document.form1.personil.setAttribute("disabled",true);
			document.form1.personil.removeAttribute("required");
			document.form1.personil2.setAttribute("disabled",true);
			document.form1.shift.setAttribute("disabled",true);
			document.form1.shift.removeAttribute("required");
			document.form1.shift2.setAttribute("disabled",true);
			document.form1.penyebab.setAttribute("disabled",true);
			document.form1.penyebab.removeAttribute("required");
			document.form1.subdept.setAttribute("disabled",true);
			document.form1.subdept.removeAttribute("required");	
			document.form1.pejabat.setAttribute("disabled",true);
			document.form1.pejabat.removeAttribute("required");
			document.form1.sts_disposisiqc.removeAttribute("disabled");
			document.form1.sts_disposisipro.removeAttribute("disabled");
			document.form1.sts_check.setAttribute("disabled",true);
			document.form1.sts_check.removeAttribute("required");
			document.form1.qty_lolos.removeAttribute("required");
			document.form1.qty_lolos.setAttribute("disabled", true);
			document.form1.satuan_l.removeAttribute("required");
			document.form1.satuan_l.setAttribute("disabled", true);
		}
}
function aktif1(){		
		if(document.forms['form1']['sts_red'].checked == true){
			//document.form1.tgl_email.removeAttribute("disabled");
			//document.form1.tgl_jawab.removeAttribute("disabled");
			document.form1.leadtime_email.removeAttribute("disabled");
			document.form1.tgl_email.setAttribute("required",true);
			document.form1.tgl_jawab.setAttribute("required",true);
			document.form1.leadtime_email.setAttribute("required",true);
		}else{
			//document.form1.tgl_email.setAttribute("disabled",true);
			//document.form1.tgl_jawab.setAttribute("disabled",true);
			document.form1.leadtime_email.setAttribute("disabled",true);
			document.form1.tgl_email.removeAttribute("required");
			document.form1.tgl_jawab.removeAttribute("required");
			document.form1.leadtime_email.removeAttribute("required");
		}
}
function aktif2(){		
		if(document.forms['form1']['sts_revdis'].checked == true){
			document.form1.ket_revdis.removeAttribute("disabled");
			document.form1.ket_revdis.setAttribute("required",true);
		}else{
			document.form1.ket_revdis.setAttribute("disabled",true);
			document.form1.ket_revdis.removeAttribute("required");
		}
}
function aktif3(){		
		if(document.forms['form1']['sts_disposisiqc'].checked == true){
			document.form1.shift.removeAttribute("disabled");
			document.form1.shift.setAttribute("required",true);
			document.form1.shift2.removeAttribute("disabled");
			document.form1.pejabat.removeAttribute("disabled");
			document.form1.penyebab.removeAttribute("disabled");
			document.form1.subdept.removeAttribute("disabled");
			document.form1.pejabat.setAttribute("required",true);
			document.form1.penyebab.setAttribute("required",true);
			document.form1.subdept.setAttribute("required",true);
			document.form1.sts.setAttribute("disabled",true);
			document.form1.sts_disposisipro.setAttribute("disabled",true);
			document.form1.sts_check.removeAttribute("disabled");
			document.form1.sts_check.setAttribute("required",true);
			document.form1.qty_lolos.removeAttribute("disabled");
			document.form1.qty_lolos.setAttribute("required", true);
			document.form1.satuan_l.removeAttribute("disabled");
			document.form1.satuan_l.setAttribute("required", true);
		}else{
			document.form1.shift.setAttribute("disabled",true);
			document.form1.shift.removeAttribute("required");
			document.form1.shift2.setAttribute("disabled",true);
			document.form1.pejabat.setAttribute("disabled",true);
			document.form1.penyebab.setAttribute("disabled",true);	
			document.form1.subdept.setAttribute("disabled",true);
			document.form1.pejabat.removeAttribute("required");
			document.form1.penyebab.removeAttribute("required");
			document.form1.subdept.removeAttribute("required");
			document.form1.sts.removeAttribute("disabled");
			document.form1.sts_disposisipro.removeAttribute("disabled");
			document.form1.sts_check.setAttribute("disabled",true);
			document.form1.sts_check.removeAttribute("required");
			document.form1.qty_lolos.removeAttribute("required");
			document.form1.qty_lolos.setAttribute("disabled", true);
			document.form1.satuan_l.removeAttribute("required");
			document.form1.satuan_l.setAttribute("disabled", true);
		}
}
// function aktif4(){		
// 		if(document.forms['form1']['sts_disposisipro'].checked == true){
// 			document.form1.penyebab.removeAttribute("disabled");
// 			document.form1.penyebab.setAttribute("required",true);
// 			document.form1.sts.setAttribute("disabled",true);
// 			document.form1.sts_disposisiqc.setAttribute("disabled",true);
// 			document.form1.pejabat.removeAttribute("disabled");
// 		}else{
// 			document.form1.penyebab.setAttribute("disabled",true);
// 			document.form1.penyebab.removeAttribute("required");
// 			document.form1.sts.removeAttribute("disabled");
// 			document.form1.sts_disposisiqc.removeAttribute("disabled");
// 			document.form1.pejabat.setAttribute("disabled",true);
// 		}
// }
function aktif6(){
		if(document.forms['form1']['sts_nego'].checked==true){
		$("#nego1").css("display", "");  // To unhide
		$("#nego2").css("display", "");  // To unhide
		document.form1.nama_nego.setAttribute("required",true);
		document.form1.hasil_nego.setAttribute("required",true);
		}else{
			$("#nego1").css("display", "none");  // To hide
			$("#nego2").css("display", "none");  // To hide
			document.form1.nama_nego.removeAttribute("required");
			document.form1.hasil_nego.removeAttribute("required");
		}
}
function aktif7(){
		if(document.forms['form1']['addpersonil'].checked== true){
		$("#personil34").css("display", "");  // To unhide
		$("#shift34").css("display", "");  // To unhide
		document.form1.personil3.setAttribute("required",true);
		document.form1.shift3.setAttribute("required",true);
		}else{
			$("#personil34").css("display", "none");  // To hide
			$("#shift34").css("display", "none");  // To hide
			document.form1.personil3.removeAttribute("required");
			document.form1.shift3.removeAttribute("required");
		}
}
</script>