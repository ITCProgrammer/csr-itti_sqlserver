<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$nocounter	= isset($_GET['no_counter']) ? $_GET['no_counter'] : '';


$sqlCek = mysqli_query($conlab, "SELECT * FROM tbl_test_qc WHERE no_counter='$nocounter' ORDER BY id DESC LIMIT 1");
$cek = mysqli_num_rows($sqlCek);
$rcek = mysqli_fetch_array($sqlCek);
?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Testing Counter</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
						class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="col-md-6">
				<div class="form-group">
					<label for="no_counter" class="col-sm-3 control-label">No Counter</label>
					<div class="col-sm-5">
						<input style="font-size:13px" name="no_counter" type="text" class="form-control" id="no_counter"
							placeholder="No Counter" onchange="window.location='EditTQLab-'+this.value"
							value="<?php echo $_GET['no_counter']; ?>">
					</div>
				</div>


				<?php if ($nocounter != "") { ?>

					<div class="form-group">
						<label for="no_hanger" class="col-sm-3 control-label">No Item</label>
						<div class="col-sm-5">
							<input name="no_item" type="text" class="form-control" id="no_item" placeholder="No Item" value="<?php if ($cek > 0) {
								echo $rcek['no_item'];
							} ?>" <?php if ($_SESSION['akses'] == 'biasa' or $_SESSION['nama1'] != 'Janu Dwi Laksono') {
								 echo "readonly";
							 } ?>>
						</div>
					</div>

					<div class="form-group">
						<label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
						<div class="col-sm-9">
							<textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if ($cek > 0) {
								echo $rcek['jenis_kain'];
							} else {
								echo $r['ProductDesc'];
							} ?></textarea>
						</div>
					</div>

				</div>
				<!-- col -->
				<div class="col-md-6">
					<div class="form-group">
						<label for="warna" class="col-sm-3 control-label">Warna</label>
						<div class="col-sm-8">
							<textarea name="warna" <?php if ($_SESSION['akses'] == 'biasa' or $_SESSION['nama1'] != 'Janu Dwi Laksono') {
								echo "readonly";
							} ?> class="form-control" id="warna" placeholder="Warna"><?php if ($cek > 0) {
								  echo $rcek['warna'];
							  } else {
								  echo $r['Color'];
							  } ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="no_warna" class="col-sm-3 control-label">No Warna</label>
						<div class="col-sm-8">
							<textarea name="no_warna" readonly="readonly" class="form-control" id="no_warna"
								placeholder="No Warna"><?php if ($cek > 0) {
									echo $rcek['no_warna'];
								} else {
									echo $r['ColorNo'];
								} ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="buyer" class="col-sm-3 control-label">Buyer</label>
						<div class="col-sm-5">
							<input name="buyer" type="text" class="form-control" id="buyer" placeholder="Buyer" value="<?php if ($cek > 0) {
								echo $rcek['buyer'];
							} else {
							} ?>" readonly="readonly">
						</div>
					</div>


				<?php } ?>
			</div>

		</div>
		<!-- /.box-footer -->
	</div>

	<?php if ($nocounter != "") { ?>
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Detail Testing</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
							class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-12">

					<?php

					$permintaan_testing = $rcek['permintaan_testing'];

					if (!empty($permintaan_testing) && $permintaan_testing != null) {
						$detail2 = explode(",", $permintaan_testing);

						$id_test_qc_ = $rcek['id'];
						?>

						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1"
							id="form1">
							<input type="hidden" name="id_test_qc" value="<?= $id_test_qc_ ?>">

							<div class="form-group">
								<span class='badge bg-blue'><label for="colorfastness"
										class="col-sm-2">COLORFASTNESS</label></span>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WASHING" <?php if (in_array("WASHING", $detail2)) {
									echo "checked";
								} ?>> Washing Fastness &nbsp; &nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ACID"
										<?php if (in_array("PERSPIRATION ACID", $detail2)) {
											echo "checked";
										} ?>> Perpiration
									Fastness Acid &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]"
										value="PERSPIRATION ALKALINE" <?php if (in_array("PERSPIRATION ALKALINE", $detail2)) {
											echo "checked";
										} ?>> Perpiration Fastness Alkaline
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WATER" <?php if (in_array("WATER", $detail2)) {
									echo "checked";
								} ?>> Water Fastness &nbsp; &nbsp;
									&nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="CROCKING" <?php if (in_array("CROCKING", $detail2)) {
									echo "checked";
								} ?>> Crocking Fastness &nbsp; &nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
									&nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PHENOLIC YELLOWING"
										<?php if (in_array("PHENOLIC YELLOWING", $detail2)) {
											echo "checked";
										} ?>> Phenolic
									Yellowing
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT" <?php if (in_array("LIGHT", $detail2)) {
									echo "checked";
								} ?>> Light Fastness &nbsp; &nbsp;
									&nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]"
										value="COLOR MIGRATION-OVEN TEST" <?php if (in_array("COLOR MIGRATION-OVEN TEST", $detail2)) {
											echo "checked";
										} ?>> Color Migration - Oven Test &nbsp; &nbsp; &nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION"
										<?php if (in_array("COLOR MIGRATION", $detail2)) {
											echo "checked";
										} ?>> Color Migration
									Fastness
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT PERSPIRATION"
										<?php if (in_array("LIGHT PERSPIRATION", $detail2)) {
											echo "checked";
										} ?>> Light
									Perspiration &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SALIVA" <?php if (in_array("SALIVA", $detail2)) {
									echo "checked";
								} ?>> Saliva Fastness &nbsp; &nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="BLEEDING" <?php if (in_array("BLEEDING", $detail2)) {
									echo "checked";
								} ?>> Bleeding
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]"
										value="CHLORIN & NON-CHLORIN" <?php if (in_array("CHLORIN & NON-CHLORIN", $detail2)) {
											echo "checked";
										} ?>> Chlorin &amp; Non-Chlorin &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="DYE TRANSFER" <?php if (in_array("DYE TRANSFER", $detail2)) {
									echo "checked";
								} ?>> Dye Transfer &nbsp;
									&nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
									&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
								</label>

								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SWEAT CONCEAL" <?php if (in_array("SWEAT CONCEAL", $detail2)) {
									echo "checked";
								} ?>> Sweat Conceal &nbsp;
									&nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>

						</form>

						<?php
					} else { ?>
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1"
							id="form1">
							<input type="hidden" name="id_test_qc" value="<?= $id_test_qc_ ?>">

							<div class="form-group">
								<span class='badge bg-blue'><label for="colorfastness"
										class="col-sm-2">COLORFASTNESS</label></span>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WASHING"> Washing
									Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ACID">
									Perpiration Fastness Acid &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
									&nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]"
										value="PERSPIRATION ALKALINE"> Perpiration Fastness Alkaline
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WATER"> Water
									Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="CROCKING"> Crocking
									Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PHENOLIC YELLOWING">
									Phenolic Yellowing
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT"> Light
									Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]"
										value="COLOR MIGRATION-OVEN TEST"> Color Migration - Oven Test &nbsp; &nbsp; &nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION">
									Color Migration Fastness
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT PERSPIRATION">
									Light Perspiration &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SALIVA"> Saliva
									Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="BLEEDING"> Bleeding
								</label>
							</div>
							<div class="form-group">
								<label><input type="checkbox" class="minimal" name="colorfastness[]"
										value="CHLORIN & NON-CHLORIN"> Chlorin &amp; Non-Chlorin &nbsp; &nbsp; &nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="DYE TRANSFER"> Dye
									Transfer &nbsp;
									&nbsp;
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
									&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
								</label>
								<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SWEAT CONCEAL"> Sweat Conceal
								</label>
							</div>
						</form>
					<?php } ?>
				</div>
			</div>
			<?php if ($nocounter != "") { ?>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary pull-left" name="save" value="save"><i class="fa fa-save"></i>
						Simpan
					</button>
				</div>
			<?php } ?>

		</div>
	<?php } ?>
</form>

</div>
</div>
</div>

<?php
if ($_POST['save'] == "save") {

	$id_test_qc = $_POST['id_test_qc'];

	$checkbox3 = $_POST['colorfastness'];

	$buyer = strtoupper($_POST['buyer']);
	$nohanger = strtoupper($_POST['no_hanger']);
	$noitem = strtoupper($_POST['no_item']);
	$jns_kain = $_POST['jns_kain'];
	$no_warna = $_POST['no_warna'];
	$warna = $_POST['warna'];

	$chkc = "";
	foreach ($checkbox3 as $chk3) {
		$chkc .= $chk3 . ",";
	}

	$sqlData = mysqli_query($conlab, "UPDATE tbl_test_qc SET 
														buyer = '$buyer', 
														no_warna = '$no_warna', 
														warna = '$warna', 
														jenis_kain = '$jns_kain', 
														no_item = '$noitem', 
														permintaan_testing = '$chkc', 
														tgl_update = now()
													WHERE no_counter='$nocounter' ;
	");
	
	if ($sqlData) {
		echo "<script>
				swal({
						title: 'Data Tersimpan',   
						text: 'Klik Ok untuk input data kembali',
						type: 'success',
					}).then((result) => {
						if (result.value) {
							window.location.href='EditTQLab-$nocounter';
						}
					});
			</script>";
	}
}
if ($notest != "" and $cek == 0) {
	echo "<script>swal({
		title: 'No Counter Tidak Ditemukan',   
		text: 'Klik Ok untuk input data kembali',
		type: 'info',
		}).then((result) => {
		if (result.value) {
		
			window.location.href='EditTQLab'; 
		}
		});</script>";
}
?>
<script>
	function aktif() {
		if (document.forms['form0']['is_demand_new'].checked == true) {
			$("#newdemand").css("display", "");  // To unhide
			$("#newlot").css("display", "");  // To unhide
			document.form0.nodemand_new.setAttribute("required", true);
			document.form0.lot_new.setAttribute("required", true);
		} else {
			$("#newdemand").css("display", "none");  // To hide
			$("#newlot").css("display", "none");  // To hide
			document.form0.nodemand_new.removeAttribute("required");
			document.form0.lot_new.removeAttribute("required");
		}
	}
</script>