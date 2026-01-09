<?php
ini_set("error_reporting", 1);
session_start();
$id = $_GET['id'];
$sqlCek = mysqli_query($con, "SELECT * FROM tbl_ncp_qcf_now WHERE id='$id' ORDER BY id DESC LIMIT 1");
$cek = mysqli_num_rows($sqlCek);
$rcek = mysqli_fetch_array($sqlCek);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Input Tindakan Penyelesaian</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<!-- col -->
			<div class="col-md-12">
				<?php if (strtoupper($_SESSION['usrid']) == "ADM-DYE" or strtoupper($_SESSION['usrid']) == "NCP") { ?>
					<div class="form-group">
						<label for="no_ncp" class="col-sm-2 control-label">No NCP</label>
						<div class="col-sm-2">
							<input name="no_ncp" type="text" class="form-control" id="no_ncp" value="<?= $rcek['no_ncp_gabungan']; ?>" placeholder="No NCP">
						</div>
					</div>
					<?php
						//Ambil data dari db_dying
						//$nokk=$_GET[nokk];
						$con1 = mysqli_connect("10.0.0.10", "dit", "4dm1n", "db_dying");
						$qry1 = mysqli_query($con1, "SELECT 
														a.no_mesin, 
														b.g_shift, 
														b.colorist 
													FROM 
														tbl_schedule a 
													LEFT JOIN tbl_montemp b ON a.id=b.id_schedule 
													WHERE a.nokk='$_POST[nokk]' and a.proses='Celup Greige'
													ORDER BY a.id DESC LIMIT 1");
						if ($qry1 === FALSE) {
							die(mysqli_error()); // TODO: better error handling
						}
						$dtDye = mysqli_fetch_array($qry1);
						$cDye = mysqli_num_rows($qry1);

						$qryHC = mysqli_query($con1, "SELECT * FROM tbl_hasilcelup WHERE nokk='" . $_POST['nokk'] . "' and proses='Celup Greige' ORDER BY id DESC LIMIT 1");
						$dtHC = mysqli_fetch_array($qryHC);
						$cHC = mysqli_num_rows($qryHC);
					?>
					<div class="form-group">
						<label for="nokk" class="col-sm-2 control-label">No KK</label>
						<div class="col-sm-2">
							<div class="input-group">
								<input name="nokk" type="text" class="form-control" id="nokk" value="<?= $_POST['nokk']; ?>" placeholder="No KK">
								<span class="input-group-btn"><button type="submit" class="btn btn-default" name="cek" id="cek" value="cek"> <span class="fa fa-search"></span></button></span>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="form-group">
					<label for="tgl_rencana" class="col-sm-2 control-label">Tgl. Rencana Penyelesaian</label>
					<div class="col-sm-2">
						<div class="input-group date">
							<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
							<input name="tgl_rencana" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php echo $rcek['tgl_rencana']; ?>" autocomplete="off" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="tgl_kembali_qcf" class="col-sm-2 control-label">Tgl. Kembali Ke QCF</label>
					<div class="col-sm-2">
						<div class="input-group date">
							<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
							<input name="tgl_kembali_qcf" type="text" class="form-control pull-right" id="datepicker2" placeholder="0000-00-00" value="<?php echo $rcek['tgl_kembali_qcf']; ?>" autocomplete="off" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="ket" class="col-sm-2 control-label">Keterangan</label>
					<div class="col-sm-4">
						<textarea name="ket" rows="3" class="form-control" id="ket" placeholder="Keterangan"><?php if ($cek > 0) {
																													echo $rcek['ket_penyelesaian'];
																												} ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="akar_masalah" class="col-sm-2 control-label">Akar Masalah</label>
					<div class="col-sm-3">
						<input name="akar_masalah" type="text" class="form-control" id="akar_masalah" value="<?php echo $rcek['akar_masalah']; ?>" placeholder="Akar Masalah" required>
					</div>
				</div>
				<div class="form-group">
					<label for="solusi_panjang" class="col-sm-2 control-label">Solusi Jangka Panjang</label>
					<div class="col-sm-3">
						<input name="solusi_panjang" type="text" class="form-control" id="solusi_panjang" value="<?php echo $rcek['solusi_panjang']; ?>" placeholder="Solusi Jangka Panjang" required>
					</div>
				</div>
				<div class="form-group">
					<label for="rincian" class="col-sm-2 control-label">Penyelesaian</label>
					<div class="col-sm-3">
						<select class="form-control select2" name="rincian">
							<option value="">Pilih</option>
							<option value="Celup Ulang" <?php if ($rcek['rincian'] == "Celup Ulang") {
															echo "SELECTED";
														} ?>>Celup Ulang</option>
							<option value="Tidak Celup Ulang" <?php if ($rcek['rincian'] == "Tidak Celup Ulang") {
																	echo "SELECTED";
																} ?>>Tidak Celup Ulang</option>
							<option value="Upgrade" <?php if ($rcek['rincian'] == "Upgrade") {
														echo "SELECTED";
													} ?>>Upgrade</option>
							<option value="Disposisi" <?php if ($rcek['rincian'] == "Disposisi") {
															echo "SELECTED";
														} ?>>Disposisi</option>
							<option value="BS" <?php if ($rcek['rincian'] == "BS") {
													echo "SELECTED";
												} ?>>BS</option>
							<option value="Tunggu Conform" <?php if ($rcek['rincian'] == "Tunggu Conform") {
																echo "SELECTED";
															} ?>>Tunggu Conform</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="multi" class="col-sm-2 control-label">Rincian</label>
					<div class="col-sm-4">
						<div class="input-group">
							<select class="form-control select2" multiple="multiple" data-placeholder="Jenis Masalah" name="rmp_benang[]" id="kerusakan">
								<?php
								//$conn=mysqli_connect("10.0.0.10","dit","4dm1n");
								//$db2=mysqli_select_db("db_qc",$conn)or die("Gagal Koneksi ke db qc");
								$conn = mysqli_connect("10.0.0.10", "dit", "4dm1n", "db_qc");
								$dtArr = trim($rcek['penyelesaian']);
								$data = explode(",", $dtArr);
								$qCek1 = mysqli_query($conn, "SELECT nama FROM tbl_masalah_ncp WHERE jenis='Penyelesaian' ORDER BY nama ASC");
								$i = 0;
								while ($dCek1 = mysqli_fetch_array($qCek1)) { ?>
									<option value="<?php echo $dCek1['nama']; ?>" <?php if ($dCek1['nama'] == $data[0] or $dCek1['nama'] == $data[1] or $dCek1['nama'] == $data[2] or $dCek1['nama'] == $data[3] or $dCek1['nama'] == $data[4] or $dCek1['nama'] == $data[5]) {
																						echo "SELECTED";
																					} ?>><?php echo $dCek1['nama']; ?></option>
								<?php $i++;
								} ?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataPenyelesaian"> ...</button></span>
						</div>
					</div>
					<?php if (strtoupper($_SESSION['usrid']) == "ADM-DYE" or strtoupper($_SESSION['usrid']) == "NCP") { ?>
						<label for="multi" class="col-sm-1 control-label">Ke-</label>
						<div class="col-sm-2">
							<div class="input-group">
								<select class="form-control" name="ke" id="ke">
									<?php $q_data_ke			= mysqli_query($condye, "SELECT * FROM tbl_ke ORDER BY id ASC"); ?>
									<?php while ($row_data_ke	= mysqli_fetch_array($q_data_ke)) { ?>
										<option value="<?= $row_data_ke['ke']; ?>" <?php if($rcek['data_ke'] == $row_data_ke['ke']){ echo "SELECTED"; } ?>><?= $row_data_ke['ke']; ?></option>
									<?php } ?>
								</select>
								<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#Datake"> ...</button></span>
							</div>
						</div>
						<label for="multi" class="col-sm-1 control-label">ACC Perbaikan</label>
						<div class="col-sm-2">
							<div class="input-group">
								<select class="form-control" name="acc_perbaikan" id="acc_perbaikan">
								<?php $q_namacolorist			= mysqli_query($condye, "SELECT * FROM tbl_nama_colorist ORDER BY id ASC"); ?>
									<?php while ($row_namacolorist	= mysqli_fetch_array($q_namacolorist)) { ?>
										<option value="<?= $row_namacolorist['nama_colorist']; ?>" <?php if($rcek['nama_colorist'] == $row_namacolorist['nama_colorist']){ echo 'SELECTED'; } ?>><?= $row_namacolorist['nama_colorist']; ?></option>
									<?php } ?>
								</select>
								<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataColorist"> ...</button></span>
							</div>
						</div>
					<?php } ?>
				</div>
				<?php if (strtoupper($_SESSION['usrid']) == "ADM-FIN") { ?>
					<div class="form-group">
						<label for="shift" class="col-sm-2 control-label">Shift</label>
						<div class="col-sm-2">
							<select class="form-control" name="shift">
								<option value="">Pilih</option>
								<option value="A" <?php if ($rcek['shift'] == "A") {
														echo "SELECTED";
													} ?>>A</option>
								<option value="B" <?php if ($rcek['shift'] == "B") {
														echo "SELECTED";
													} ?>>B</option>
								<option value="C" <?php if ($rcek['shift'] == "C") {
														echo "SELECTED";
													} ?>>C</option>
								<option value="A+B" <?php if ($rcek['shift'] == "A+B") {
														echo "SELECTED";
													} ?>>A+B</option>
								<option value="B+C" <?php if ($rcek['shift'] == "B+C") {
														echo "SELECTED";
													} ?>>B+C</option>
								<option value="C+A" <?php if ($rcek['shift'] == "C+A") {
														echo "SELECTED";
													} ?>>C+A</option>
								<option value="A+B+C" <?php if ($rcek['shift'] == "A+B+C") {
														echo "SELECTED";
													} ?>>A+B+C</option>
								<option value="Non-Shift" <?php if ($rcek['shift'] == "Non-Shift") {
																echo "SELECTED";
															} ?>>Non-Shift</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="mesin" class="col-sm-2 control-label">Mesin</label>
						<div class="col-sm-3">
							<select class="form-control" name="mesin">
								<option value="">Pilih</option>
								<option value="BELAH-CUCI 01" <?php if ($rcek['mesin'] == "BELAH-CUCI 01") {
																	echo "SELECTED";
																} ?>>BELAH-CUCI 01</option>
								<option value="BELAH-CUCI 02" <?php if ($rcek['mesin'] == "BELAH-CUCI 02") {
																	echo "SELECTED";
																} ?>>BELAH-CUCI 02</option>
								<option value="BELAH-CUCI 03" <?php if ($rcek['mesin'] == "BELAH-CUCI 03") {
																	echo "SELECTED";
																} ?>>BELAH-CUCI 03</option>
								<option value="BELAH-CUCI 04" <?php if ($rcek['mesin'] == "BELAH-CUCI 04") {
																	echo "SELECTED";
																} ?>>BELAH-CUCI 04</option>
								<option value="COMPACT 01" <?php if ($rcek['mesin'] == "COMPACT" or $rcek['mesin'] == "COMPACT 01") {
																echo "SELECTED";
															} ?>>COMPACT 01</option>
								<option value="COMPACT 02" <?php if ($rcek['mesin'] == "COMPACT 02") {
																echo "SELECTED";
															} ?>>COMPACT 02</option>
								<option value="COMPACT 03" <?php if ($rcek['mesin'] == "COMPACT 03") {
																echo "SELECTED";
															} ?>>COMPACT 03</option>
								<option value="OVEN-01" <?php if ($rcek['mesin'] == "OVEN-01") {
															echo "SELECTED";
														} ?>>OVEN-01</option>
								<option value="ST-01" <?php if ($rcek['mesin'] == "STENTER LK 01" or $rcek['mesin'] == "ST-01") {
															echo "SELECTED";
														} ?>>ST-01</option>
								<option value="ST-02" <?php if ($rcek['mesin'] == "STENTER FONG 2" or $rcek['mesin'] == "ST-02") {
															echo "SELECTED";
														} ?>>ST-02</option>
								<option value="ST-03" <?php if ($rcek['mesin'] == "STENTER LK 03" or $rcek['mesin'] == "ST-03") {
															echo "SELECTED";
														} ?>>ST-03</option>
								<option value="ST-04" <?php if ($rcek['mesin'] == "STENTER LK 04" or $rcek['mesin'] == "ST-04") {
															echo "SELECTED";
														} ?>>ST-04</option>
								<option value="ST-05" <?php if ($rcek['mesin'] == "STENTER LK 05" or $rcek['mesin'] == "ST-05") {
															echo "SELECTED";
														} ?>>ST-05</option>
								<option value="ST-06" <?php if ($rcek['mesin'] == "STENTER LK 06" or $rcek['mesin'] == "ST-06") {
															echo "SELECTED";
														} ?>>ST-06</option>
								<option value="ST-07" <?php if ($rcek['mesin'] == "STENTER LK 07" or $rcek['mesin'] == "ST-07") {
															echo "SELECTED";
														} ?>>ST-07</option>
								<option value="ST-08" <?php if ($rcek['mesin'] == "STENTER FONG 8" or $rcek['mesin'] == "ST-08") {
															echo "SELECTED";
														} ?>>ST-08</option>
								<option value="ST-09" <?php if ($rcek['mesin'] == "STENTER YT 09" or $rcek['mesin'] == "ST-09") {
															echo "SELECTED";
														} ?>>ST-09</option>
								<option value="ST-10" <?php if ($rcek['mesin'] == "STENTER YT 10" or $rcek['mesin'] == "ST-10") {
															echo "SELECTED";
														} ?>>ST-10</option>
								<option value="INSPEK" <?php if ($rcek['mesin'] == "INSPEK" or $rcek['mesin'] == "INSPEK") {
															echo "SELECTED";
														} ?>>INSPEK</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="acc" class="col-sm-2 control-label">ACC</label>
						<div class="col-sm-3">
							<input name="acc" type="text" class="form-control" id="acc" value="<?php echo $rcek['acc']; ?>" placeholder="Nama Staff">
						</div>
					</div>
					<div class="form-group">
						<label for="rekomendasi" class="col-sm-2 control-label">Rekomendasi</label>
						<div class="col-sm-3">
							<input name="rekomendasi" type="text" class="form-control" id="rekomendasi" value="<?php echo $rcek['rekomendasi']; ?>" placeholder="Nama Staff">
						</div>
					</div>
				<?php } ?>
				<?php if (strtoupper($_SESSION['usrid']) == "ADM-DYE" or strtoupper($_SESSION['usrid']) == "NCP") { ?>
					<div class="form-group">
						<label for="shift" class="col-sm-2 control-label">Shift</label>
						<div class="col-sm-1">
							<select class="form-control" name="shift">
								<option value="">Pilih</option>
								<option value="A" <?php if ($dtDye['g_shift'] == "A" or $rcek['shift'] == "A") {
														echo "SELECTED";
													} ?>>A</option>
								<option value="B" <?php if ($dtDye['g_shift'] == "B" or $rcek['shift'] == "B") {
														echo "SELECTED";
													} ?>>B</option>
								<option value="C" <?php if ($dtDye['g_shift'] == "C" or $rcek['shift'] == "C") {
														echo "SELECTED";
													} ?>>C</option>
								<option value="Non-Shift" <?php if ($dtDye['g_shift'] == "Non-Shift" or $rcek['shift'] == "Non-Shift") {
																echo "SELECTED";
															} ?>>Non-Shift</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="mesin" class="col-sm-2 control-label">Mesin</label>
						<div class="col-sm-2">
							<input name="mesin" type="text" class="form-control" id="mesin" value="<?php if ($cDye > 0) {
																										echo $dtDye['no_mesin'];
																									} else {
																										echo $rcek['mesin'];
																									} ?>" placeholder="No Mesin">
						</div>
					</div>
					<div class="form-group">
						<label for="acc" class="col-sm-2 control-label">Colorist</label>
						<div class="col-sm-3">
							<div class="input-group">
								<select class="form-control select2" name="acc" id="acc">
									<option value="">Pilih</option>
									<?php
									$qrytj = mysqli_query($conn, "SELECT nama FROM tbl_tjawab_ncp ORDER BY nama ASC");
									while ($rtj = mysqli_fetch_array($qrytj)) {
									?>
										<option value="<?php echo $rtj['nama']; ?>" <?php if ($rcek['penanggung_jawab'] == $rtj['nama']) {
																						echo "SELECTED";
																					} ?>><?php echo $rtj['nama']; ?></option>
									<?php } ?>
								</select>
								<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataPenanggungJawab"> ...</button></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="penanggung_jawab" class="col-sm-2 control-label">Penanggung Jawab</label>
						<div class="col-sm-3">
							<div class="input-group">
								<select class="form-control select2" name="penanggung_jawab" id="penanggung_jawab">
									<option value="">Pilih</option>
									<?php
									$qrytj = mysqli_query($conn, "SELECT nama FROM tbl_tjawab_ncp ORDER BY nama ASC");
									while ($rtj = mysqli_fetch_array($qrytj)) {
									?>
										<option value="<?php echo $rtj['nama']; ?>" <?php if ($rcek['penanggung_jawab'] == $rtj['nama']) {
																						echo "SELECTED";
																					} ?>><?php echo $rtj['nama']; ?></option>
									<?php } ?>
								</select>
								<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataPenanggungJawab"> ...</button></span>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="form-group">
					<label for="penyebab" class="col-sm-2 control-label">Penyebab</label>
					<div class="col-sm-3">
						<input name="penyebab" type="text" class="form-control" id="penyebab" value="<?php if ($_SESSION['dept'] == "DYE") {
																											echo $_SESSION['dept'];
																										} else {
																											echo $rcek['penyebab'];
																										} ?>" placeholder="Nama Staff">
					</div>
				</div>
				<div class="form-group">
					<label for="perbaikan" class="col-sm-2 control-label">Perbaikan</label>
					<div class="col-sm-3">
						<input name="perbaikan" type="text" class="form-control" id="perbaikan" value="<?php echo $rcek['perbaikan']; ?>" placeholder="Nama Staff">
					</div>
				</div>
				<?php if (strtoupper($_SESSION['usrid']) == "ADM-FIN") { ?>
					<div class="form-group">
						<label for="mesin_perbaikan" class="col-sm-2 control-label">Mesin</label>
						<div class="col-sm-3">
							<select class="form-control" name="mesin_perbaikan">
								<option value="">Pilih</option>
								<option value="BELAH-CUCI 01" <?php if ($rcek['mesin_perbaikan'] == "BELAH-CUCI 01") {
																	echo "SELECTED";
																} ?>>BELAH-CUCI 01</option>
								<option value="BELAH-CUCI 02" <?php if ($rcek['mesin_perbaikan'] == "BELAH-CUCI 02") {
																	echo "SELECTED";
																} ?>>BELAH-CUCI 02</option>
								<option value="BELAH-CUCI 03" <?php if ($rcek['mesin_perbaikan'] == "BELAH-CUCI 03") {
																	echo "SELECTED";
																} ?>>BELAH-CUCI 03</option>
								<option value="BELAH-CUCI 04" <?php if ($rcek['mesin_perbaikan'] == "BELAH-CUCI 04") {
																	echo "SELECTED";
																} ?>>BELAH-CUCI 04</option>
								<option value="COMPACT 01" <?php if ($rcek['mesin_perbaikan'] == "COMPACT" or $rcek['mesin_perbaikan'] == "COMPACT 01") {
																echo "SELECTED";
															} ?>>COMPACT 01</option>
								<option value="COMPACT 02" <?php if ($rcek['mesin_perbaikan'] == "COMPACT 02") {
																echo "SELECTED";
															} ?>>COMPACT 02</option>
								<option value="COMPACT 03" <?php if ($rcek['mesin_perbaikan'] == "COMPACT 03") {
																echo "SELECTED";
															} ?>>COMPACT 03</option>
								<option value="OVEN-01" <?php if ($rcek['mesin_perbaikan'] == "OVEN-01") {
															echo "SELECTED";
														} ?>>OVEN-01</option>
								<option value="ST-01" <?php if ($rcek['mesin_perbaikan'] == "STENTER LK 01" or $rcek['mesin_perbaikan'] == "ST-01") {
															echo "SELECTED";
														} ?>>ST-01</option>
								<option value="ST-02" <?php if ($rcek['mesin_perbaikan'] == "STENTER FONG 2" or $rcek['mesin_perbaikan'] == "ST-02") {
															echo "SELECTED";
														} ?>>ST-02</option>
								<option value="ST-03" <?php if ($rcek['mesin_perbaikan'] == "STENTER LK 03" or $rcek['mesin_perbaikan'] == "ST-03") {
															echo "SELECTED";
														} ?>>ST-03</option>
								<option value="ST-04" <?php if ($rcek['mesin_perbaikan'] == "STENTER LK 04" or $rcek['mesin_perbaikan'] == "ST-04") {
															echo "SELECTED";
														} ?>>ST-04</option>
								<option value="ST-05" <?php if ($rcek['mesin_perbaikan'] == "STENTER LK 05" or $rcek['mesin_perbaikan'] == "ST-05") {
															echo "SELECTED";
														} ?>>ST-05</option>
								<option value="ST-06" <?php if ($rcek['mesin_perbaikan'] == "STENTER LK 06" or $rcek['mesin_perbaikan'] == "ST-06") {
															echo "SELECTED";
														} ?>>ST-06</option>
								<option value="ST-07" <?php if ($rcek['mesin_perbaikan'] == "STENTER LK 07" or $rcek['mesin_perbaikan'] == "ST-07") {
															echo "SELECTED";
														} ?>>ST-07</option>
								<option value="ST-08" <?php if ($rcek['mesin_perbaikan'] == "STENTER FONG 8" or $rcek['mesin_perbaikan'] == "ST-08") {
															echo "SELECTED";
														} ?>>ST-08</option>
								<option value="ST-09" <?php if ($rcek['mesin_perbaikan'] == "STENTER YT 09" or $rcek['mesin_perbaikan'] == "ST-09") {
															echo "SELECTED";
														} ?>>ST-09</option>
								<option value="ST-10" <?php if ($rcek['mesin_perbaikan'] == "STENTER YT 10" or $rcek['mesin_perbaikan'] == "ST-10") {
															echo "SELECTED";
														} ?>>ST-10</option>
								<option value="INSPEK" <?php if ($rcek['mesin_perbaikan'] == "INSPEK" or $rcek['mesin_perbaikan'] == "INSPEK") {
															echo "SELECTED";
														} ?>>INSPEK</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="jmlperbaikan" class="col-sm-2 control-label">Jumlah Perbaikan</label>
						<div class="col-sm-1">
							<input name="jmlperbaikan" type="text" class="form-control" id="jmlperbaikan" value="<?php echo $rcek['jml_perbaikan']; ?>" placeholder="0">
						</div>
					</div>
					<div class="form-group">
						<label for="kategori" class="col-sm-2 control-label">Kategori</label>
						<div class="col-sm-3">
							<input name="kategori" type="text" class="form-control" id="kategori" value="<?php echo $rcek['kategori']; ?>" placeholder="Kategori">
						</div>
					</div>
				<?php } ?>
				
			</div>
		</div>
		<div class="box-footer">
			<button type="button" class="btn btn-default pull-left" name="save" Onclick="window.location='StatusNCPNew'">Kembali <i class="fa fa-cycle"></i></button>
			<input type="submit" value="Simpan" name="save" id="save" class="btn btn-primary pull-right">
		</div>
		<!-- /.box-footer -->
	</div>
</form>
</div>
</div>
</div>
</div>
<?php
if ($_POST['save'] == "Simpan") {
	$ket = str_replace("'", "''", $_POST['ket']);
	if (isset($_POST["rmp_benang"])) {
		// Retrieving each selected option 
		foreach ($_POST['rmp_benang'] as $index => $subject1) {
			if ($index > 0) {
				$kt1 = $kt1 . "," . $subject1;
			} else {
				$kt1 = $subject1;
			}
		}
	}
	if ($_POST['tgl_rencana'] != "") {
		$tglRC = " tgl_rencana='" . $_POST['tgl_rencana'] . "', ";
	} else {
		$tglRC = " tgl_rencana=null, ";
	}
	if ($_POST['tgl_kembali_qcf'] != "") {
		$tglKQC = " tgl_kembali_qcf='" . $_POST['tgl_kembali_qcf'] . "', ";
	} else {
		$tglKQC = " tgl_kembali_qcf=null, ";
	}
	if ($rcek['tgl_terima'] != "") {
		$tglTrima = " ";
	} else {
		$tglTrima = " tgl_terima=now(), ";
	}
	$sqlData = mysqli_query($conn, "UPDATE tbl_ncp_qcf_now SET 
									$tglRC
									$tglKQC
									$tglTrima
									penyelesaian='$kt1',
									acc='" . $_POST['acc'] . "',
									rekomendasi='" . $_POST['rekomendasi'] . "',
									mesin='" . $_POST['mesin'] . "',
									shift='" . $_POST['shift'] . "',
									penyebab='" . $_POST['penyebab'] . "',
									perbaikan='" . $_POST['perbaikan'] . "',
									penanggung_jawab='" . $_POST['penanggung_jawab'] . "',
									rincian='" . $_POST['rincian'] . "',
									akar_masalah='" . $_POST['akar_masalah'] . "',
									solusi_pendek='" . $_POST['solusi_pendek'] . "',
									solusi_panjang='" . $_POST['solusi_panjang'] . "',
									mesin_perbaikan='" . $_POST['mesin_perbaikan'] . "',
									jml_perbaikan='" . $_POST['jmlperbaikan'] . "',
									kategori='" . $_POST['kategori'] . "',
									ket_penyelesaian='$ket',
									data_ke='$_POST[ke]',
									nama_colorist='$_POST[acc_perbaikan]'
									WHERE id='$id'");

	if ($sqlData) {
		echo "<script>swal({
				title: 'Data Telah Tersimpan',   
				text: 'Klik Ok untuk input data kembali',
				type: 'success',
				}).then((result) => {
				if (result.value) {
						window.location.href='PenyelesaianNew-$id';
					
				}
				});</script>";
	}
}
?>
<div class="modal fade" id="DataPenyelesaian">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tindakan Penyelesaian</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
						<label for="penyelesaian" class="col-md-3 control-label">Jenis Penyelesaian</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="penyelesaian" name="penyelesaian" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<input type="submit" value="Simpan" name="simpan_penyelesaian" id="simpan_penyelesaian" class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<div class="modal fade" id="Datake">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Data ke</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
						<label for="penyelesaian" class="col-md-3 control-label">Tambah Data Ke-</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="data_ke" name="data_ke" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<input type="submit" value="Simpan" name="simpan_data_ke" id="simpan_data_ke" class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<div class="modal fade" id="DataColorist">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Data ke</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
						<label for="penyelesaian" class="col-md-3 control-label">Tambah Nama Colorist-</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="nama_colorist" name="nama_colorist" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<input type="submit" value="Simpan" name="simpan_nama_colorist" id="simpan_nama_colorist" class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php
if ($_POST['simpan_penyelesaian'] == "Simpan") {
	$sqlData1 = mysqli_query($conn, "INSERT INTO tbl_masalah_ncp SET 
		  nama='" . $_POST['penyelesaian'] . "',jenis='Penyelesaian'");
	if ($sqlData1) {
		echo "<script>swal({
				title: 'Data Telah Tersimpan',   
				text: 'Klik Ok untuk input data kembali',
				type: 'success',
				}).then((result) => {
				if (result.value) {
						window.location.href='Penyelesaian-$id';
					
				}
				});</script>";
	}
}elseif($_POST['simpan_data_ke'] == 'Simpan'){
	$sqlData1 = mysqli_query($condye, "INSERT INTO tbl_ke SET ke='$_POST[data_ke]'");
	if ($sqlData1) {
	echo "<script>swal({
			title: 'Data Telah Tersimpan',   
			text: 'Klik Ok untuk input data kembali',
			type: 'success',
			}).then((result) => {
			if (result.value) {
					window.location.href='Penyelesaian-$id';
				
			}
			});</script>";
	}
}elseif($_POST['simpan_nama_colorist'] == 'Simpan'){
	$sqlData1 = mysqli_query($condye, "INSERT INTO tbl_nama_colorist SET nama_colorist='$_POST[nama_colorist]'");
	if ($sqlData1) {
	echo "<script>swal({
			title: 'Data Telah Tersimpan',   
			text: 'Klik Ok untuk input data kembali',
			type: 'success',
			}).then((result) => {
			if (result.value) {
					window.location.href='Penyelesaian-$id';
				
			}
			});</script>";
	}
}
?>
<div class="modal fade" id="DataPenanggungJawab">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Penanggung Jawab</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
						<label for="penanggung_jawab" class="col-md-3 control-label">Nama</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<input type="submit" value="Simpan" name="simpan_penanggung_jawab" id="simpan_penanggung_jawab" class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php
if ($_POST['simpan_penanggung_jawab'] == "Simpan") {
	$sqlData2 = mysqli_query($conn, "INSERT INTO tbl_tjawab_ncp SET 
		  nama='" . $_POST['penanggung_jawab'] . "',dept='DYE'");
	if ($sqlData2) {
		echo "<script>swal({
				title: 'Data Telah Tersimpan',   
				text: 'Klik Ok untuk input data kembali',
				type: 'success',
				}).then((result) => {
				if (result.value) {
						window.location.href='Penyelesaian-$id';
					
				}
				});</script>";
	}
}
?>