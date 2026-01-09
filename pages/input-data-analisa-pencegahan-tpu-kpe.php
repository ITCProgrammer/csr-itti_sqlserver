<?php
include "koneksi.php";
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Silahkan pilih nomor TPUKPE yang akan di input datanya</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
								class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label for="sno_tpukpe" class="col-sm-3 control-label">No. TPUKPE</label>
							<div class="col-sm-6">
								<select class="form-control select2" name="sno_tpukpe" onchange="this.form.submit()">
									<option value="">Pilih</option>
									<?php
									$query = mysqli_query($con, "SELECT id, no_tpukpe FROM tbl_tpukpe_now");
									while ($row = mysqli_fetch_array($query)) {
										?>
										<option value="<?= $row['no_tpukpe'] ?>" <?= @$_POST['sno_tpukpe'] == $row['no_tpukpe'] ? 'selected' : '' ?>>
											<?= $row['no_tpukpe'] ?>
										</option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer"></div>
			</div>
		</div>
	</div>
</form>

<?php
if(isset($_POST['sno_tpukpe'])) {
@$query2 = mysqli_query($con, "SELECT * FROM tbl_analisa_penanganan_tpukpe WHERE no_tpukpe = '$_POST[sno_tpukpe]'");
$row2 = mysqli_fetch_array($query2);
?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<input type="hidden" name="no_tpukpe" value="<?= @$_POST['sno_tpukpe'] ?>">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Form Input Penyelidikan dan Pencegahan TPUKPE</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
								class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label for="penyelidikan_dept_qcf" class="col-sm-3 control-label">Penyelidikan Dept.
								QCF</label>
							<div class="col-sm-9">
								<textarea name="penyelidikan_dept_qcf" class="form-control" id="penyelidikan_dept_qcf"
									rows="2" placeholder="" <?= @strtoupper($_SESSION['usrid']) == "KPE" ? 'readonly':'' ?>><?= @$row2['penyelidikan_dept_qcf'] ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="tindakan_pencegahan_dept_qcf" class="col-sm-3 control-label">Tindakan Pencegahan
								Dept.
								QCF</label>
							<div class="col-sm-9">
								<textarea name="tindakan_pencegahan_dept_qcf" class="form-control"
									id="tindakan_pencegahan_dept_qcf" rows="2"
									placeholder="" <?= @strtoupper($_SESSION['usrid']) == "KPE" ? 'readonly':'' ?>><?= @$row2['tindakan_pencegahan_dept_qcf'] ?></textarea>
							</div>
						</div>
						<?php for ($i = 1; $i <= 3; $i++) { ?>
							<div class="form-group">
								<label for="tgl_terima_tpukpe_<?= $i ?>" class="col-sm-3 control-label">Tgl Terima
									TPUKPE</label>
								<div class="col-sm-3">
									<input type="date" name="tgl_terima_tpukpe_<?= $i ?>" class="form-control"
										id="tgl_terima_tpukpe_<?= $i ?>"
										value="<?= $row2["tgl_terima_tpukpe_$i"] ?? '' ?>" />
								</div>
								<label for="tgl_kembali_tpukpe_<?= $i ?>" class="col-sm-3 control-label">Tgl Kembali
									TPUKPE</label>
								<div class="col-sm-3">
									<input type="date" name="tgl_kembali_tpukpe_<?= $i ?>" class="form-control"
										id="tgl_kembali_tpukpe_<?= $i ?>"
										value="<?= $row2["tgl_kembali_tpukpe_$i"] ?? '' ?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="dept_terkait_<?= $i ?>" class="col-sm-3 control-label">Dept Terkait
									<?= $i ?>
								</label>
								<div class="col-sm-3">
									<input type="hidden" name="hidden_dept_terkait_<?= $i ?>"
										id="hidden_dept_terkait_<?= $i ?>" value="<?= $row2["dept_terkait_$i"] ?>">
									<select name="dept_terkait_<?= $i ?>" id="dept_terkait_<?= $i ?>"
										class="form-control select2">
										<option value="">Pilih</option>
										<?php
										$departments = [
											"MKT",
											"FIN",
											"DYE",
											"KNT",
											"LAB",
											"PPC",
											"QCF",
											"RMP",
											"KNK",
											"GKG",
											"GKJ",
											"BRS",
											"PRT",
											"TAS",
											"YND",
											"PRO",
											"GAS",
										];
										sort($departments);
										foreach ($departments as $department):
											?>
											<option value="<?= $department ?>" <?= @$row2["dept_terkait_$i"] == $department ? "selected" : "" ?>>
												<?= $department ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="penyelidikan_dept_terkait_<?= $i ?>" class="col-sm-3 control-label">Penyelidikan
									dept. Terkait
									<?= $i ?>
								</label>
								<div class="col-sm-9">
									<textarea name="penyelidikan_dept_terkait_<?= $i ?>" class="form-control"
										id="penyelidikan_dept_terkait_<?= $i ?>" rows="2"
										placeholder=""><?= $row2["penyelidikan_dept_terkait_$i"] ?? '' ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="tindakan_pencegahan_dept_terkait_<?= $i ?>"
									class="col-sm-3 control-label">Tindakan Pencegahan dept.
									Terkait
									<?= $i ?>
								</label>
								<div class="col-sm-9">
									<textarea name="tindakan_pencegahan_dept_terkait_<?= $i ?>" class="form-control"
										id="tindakan_pencegahan_dept_terkait_<?= $i ?>" rows="2"
										placeholder=""><?= $row2["tindakan_pencegahan_dept_terkait_$i"] ?? '' ?></textarea>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary pull-right" id="btn-save" name="save" value="save"><i
							class="fa fa-save"></i> Simpan</button>
				</div>
			</div>
		</div>
</form>
<?php } ?>
<script>
	let penyelidikan_dept_qcf = document.getElementById('penyelidikan_dept_qcf')
	let tindakan_pencegahan_dept_qcf = document.getElementById('tindakan_pencegahan_dept_qcf')
	let tgl_terima_tpukpe_1 = document.getElementById('tgl_terima_tpukpe_1')
	let tgl_kembali_tpukpe_1 = document.getElementById('tgl_kembali_tpukpe_1')
	let dept_terkait_1 = document.getElementById('dept_terkait_1')
	let penyelidikan_dept_terkait_1 = document.getElementById('penyelidikan_dept_terkait_1')
	let tindakan_pencegahan_dept_terkait_1 = document.getElementById('tindakan_pencegahan_dept_terkait_1')

	let tgl_terima_tpukpe_2 = document.getElementById('tgl_terima_tpukpe_2')
	let tgl_kembali_tpukpe_2 = document.getElementById('tgl_kembali_tpukpe_2')
	let dept_terkait_2 = document.getElementById('dept_terkait_2')
	let penyelidikan_dept_terkait_2 = document.getElementById('penyelidikan_dept_terkait_2')
	let tindakan_pencegahan_dept_terkait_2 = document.getElementById('tindakan_pencegahan_dept_terkait_2')

	let tgl_terima_tpukpe_3 = document.getElementById('tgl_terima_tpukpe_3')
	let tgl_kembali_tpukpe_3 = document.getElementById('tgl_kembali_tpukpe_3')
	let dept_terkait_3 = document.getElementById('dept_terkait_3')
	let penyelidikan_dept_terkait_3 = document.getElementById('penyelidikan_dept_terkait_3')
	let tindakan_pencegahan_dept_terkait_3 = document.getElementById('tindakan_pencegahan_dept_terkait_3')

	function checkFill() {
		if ((tgl_terima_tpukpe_1.value == "" || tgl_kembali_tpukpe_1.value == "" || dept_terkait_1.value == "" || penyelidikan_dept_terkait_1.value == "" || tindakan_pencegahan_dept_terkait_1.value == "") &&
			(tgl_terima_tpukpe_2.value == "" || tgl_kembali_tpukpe_2.value == "" || dept_terkait_2.value == "" || penyelidikan_dept_terkait_2.value == "" || tindakan_pencegahan_dept_terkait_2.value == "") &&
			(tgl_terima_tpukpe_3.value == "" || tgl_kembali_tpukpe_3.value == "" || dept_terkait_3.value == "" || penyelidikan_dept_terkait_3.value == "" || tindakan_pencegahan_dept_terkait_3.value == "")) {

			tgl_terima_tpukpe_1.readOnly = false;
			tgl_kembali_tpukpe_1.readOnly = false;
			dept_terkait_1.disabled = false;
			penyelidikan_dept_terkait_1.readOnly = false;
			tindakan_pencegahan_dept_terkait_1.readOnly = false;

			tgl_terima_tpukpe_2.readOnly = true;
			tgl_kembali_tpukpe_2.readOnly = true;
			dept_terkait_2.disabled = true;
			penyelidikan_dept_terkait_2.readOnly = true;
			tindakan_pencegahan_dept_terkait_2.readOnly = true;

			tgl_terima_tpukpe_3.readOnly = true;
			tgl_kembali_tpukpe_3.readOnly = true;
			dept_terkait_3.disabled = true;
			penyelidikan_dept_terkait_3.readOnly = true;
			tindakan_pencegahan_dept_terkait_3.readOnly = true;
		} else if ((tgl_terima_tpukpe_1.value != "" || tgl_kembali_tpukpe_1.value != "" || dept_terkait_1.value != "" || penyelidikan_dept_terkait_1.value != "" || tindakan_pencegahan_dept_terkait_1.value != "") &&
			(tgl_terima_tpukpe_2.value == "" || tgl_kembali_tpukpe_2.value == "" || dept_terkait_2.value == "" || penyelidikan_dept_terkait_2.value == "" || tindakan_pencegahan_dept_terkait_2.value == "") &&
			(tgl_terima_tpukpe_3.value == "" || tgl_kembali_tpukpe_3.value == "" || dept_terkait_3.value == "" || penyelidikan_dept_terkait_3.value == "" || tindakan_pencegahan_dept_terkait_3.value == "")) {

			tgl_terima_tpukpe_1.readOnly = true;
			tgl_kembali_tpukpe_1.readOnly = true;
			dept_terkait_1.disabled = true;
			penyelidikan_dept_terkait_1.readOnly = true;
			tindakan_pencegahan_dept_terkait_1.readOnly = true;

			tgl_terima_tpukpe_2.readOnly = false;
			tgl_kembali_tpukpe_2.readOnly = false;
			dept_terkait_2.disabled = false;
			penyelidikan_dept_terkait_2.readOnly = false;
			tindakan_pencegahan_dept_terkait_2.readOnly = false;

			tgl_terima_tpukpe_3.readOnly = true;
			tgl_kembali_tpukpe_3.readOnly = true;
			dept_terkait_3.disabled = true;
			penyelidikan_dept_terkait_3.readOnly = true;
			tindakan_pencegahan_dept_terkait_3.readOnly = true;
		} else if ((tgl_terima_tpukpe_1.value != "" || tgl_kembali_tpukpe_1.value != "" || dept_terkait_1.value != "" || penyelidikan_dept_terkait_1.value != "" || tindakan_pencegahan_dept_terkait_1.value != "") &&
			(tgl_terima_tpukpe_2.value != "" || tgl_kembali_tpukpe_2.value != "" || dept_terkait_2.value != "" || penyelidikan_dept_terkait_2.value != "" || tindakan_pencegahan_dept_terkait_2.value != "") &&
			(tgl_terima_tpukpe_3.value == "" || tgl_kembali_tpukpe_3.value == "" || dept_terkait_3.value == "" || penyelidikan_dept_terkait_3.value == "" || tindakan_pencegahan_dept_terkait_3.value == "")) {

			tgl_terima_tpukpe_1.readOnly = true;
			tgl_kembali_tpukpe_1.readOnly = true;
			dept_terkait_1.disabled = true;
			penyelidikan_dept_terkait_1.readOnly = true;
			tindakan_pencegahan_dept_terkait_1.readOnly = true;

			tgl_terima_tpukpe_2.readOnly = true;
			tgl_kembali_tpukpe_2.readOnly = true;
			dept_terkait_2.disabled = true;
			penyelidikan_dept_terkait_2.readOnly = true;
			tindakan_pencegahan_dept_terkait_2.readOnly = true;

			tgl_terima_tpukpe_3.readOnly = false;
			tgl_kembali_tpukpe_3.readOnly = false;
			dept_terkait_3.disabled = false;
			penyelidikan_dept_terkait_3.readOnly = false;
			tindakan_pencegahan_dept_terkait_3.readOnly = false;
		} else {
			penyelidikan_dept_qcf.readOnly = true;
			tindakan_pencegahan_dept_qcf.readOnly = true;

			tgl_terima_tpukpe_1.readOnly = true;
			tgl_kembali_tpukpe_1.readOnly = true;
			dept_terkait_1.disabled = true;
			penyelidikan_dept_terkait_1.readOnly = true;
			tindakan_pencegahan_dept_terkait_1.readOnly = true;

			tgl_terima_tpukpe_2.readOnly = true;
			tgl_kembali_tpukpe_2.readOnly = true;
			dept_terkait_2.disabled = true;
			penyelidikan_dept_terkait_2.readOnly = true;
			tindakan_pencegahan_dept_terkait_2.readOnly = true;

			tgl_terima_tpukpe_3.readOnly = true;
			tgl_kembali_tpukpe_3.readOnly = true;
			dept_terkait_3.disabled = true;
			penyelidikan_dept_terkait_3.readOnly = true;
			tindakan_pencegahan_dept_terkait_3.readOnly = true;

			document.getElementById('btn-save').style.display = 'none';
		}
	}

	checkFill()
</script>

<?php

if (@$_POST['save'] == "save") {
	$queryChek = mysqli_query($con, "SELECT * FROM tbl_analisa_penanganan_tpukpe WHERE no_tpukpe = '$_POST[no_tpukpe]'");
	$rowCheck = mysqli_num_rows($queryChek);

	$dept_terkait_1 = $_POST['dept_terkait_1'] ?? $_POST['hidden_dept_terkait_1'];
	$dept_terkait_2 = $_POST['dept_terkait_2'] ?? $_POST['hidden_dept_terkait_2'];
	$dept_terkait_3 = $_POST['dept_terkait_3'] ?? $_POST['hidden_dept_terkait_3'];

	if ($rowCheck > 0) {
		$query3 = mysqli_query($con, "UPDATE tbl_analisa_penanganan_tpukpe SET 
									penyelidikan_dept_qcf = '$_POST[penyelidikan_dept_qcf]',
									tindakan_pencegahan_dept_qcf = '$_POST[tindakan_pencegahan_dept_qcf]',
									tgl_terima_tpukpe_1 = '$_POST[tgl_terima_tpukpe_1]',
									tgl_kembali_tpukpe_1 = '$_POST[tgl_kembali_tpukpe_1]',
									dept_terkait_1 = '$dept_terkait_1',
									penyelidikan_dept_terkait_1 = '$_POST[penyelidikan_dept_terkait_1]',
									tindakan_pencegahan_dept_terkait_1 = '$_POST[tindakan_pencegahan_dept_terkait_1]',
									tgl_terima_tpukpe_2 = '$_POST[tgl_terima_tpukpe_2]',
									tgl_kembali_tpukpe_2 = '$_POST[tgl_kembali_tpukpe_2]',
									dept_terkait_2 = '$dept_terkait_2',
									penyelidikan_dept_terkait_2 = '$_POST[penyelidikan_dept_terkait_2]',
									tindakan_pencegahan_dept_terkait_2 = '$_POST[tindakan_pencegahan_dept_terkait_2]',
									tgl_terima_tpukpe_3 = '$_POST[tgl_terima_tpukpe_3]',
									tgl_kembali_tpukpe_3 = '$_POST[tgl_kembali_tpukpe_3]',
									dept_terkait_3 = '$dept_terkait_3',
									penyelidikan_dept_terkait_3 = '$_POST[penyelidikan_dept_terkait_3]',
									tindakan_pencegahan_dept_terkait_3 = '$_POST[tindakan_pencegahan_dept_terkait_3]' 
								WHERE 
									no_tpukpe = '$_POST[no_tpukpe]';
								");
	} else {
		$query4 = mysqli_query($con, "INSERT INTO tbl_analisa_penanganan_tpukpe (
									no_tpukpe,
									penyelidikan_dept_qcf, 
									tindakan_pencegahan_dept_qcf, 
									tgl_terima_tpukpe_1, 
									tgl_kembali_tpukpe_1, 
									dept_terkait_1, 
									penyelidikan_dept_terkait_1, 
									tindakan_pencegahan_dept_terkait_1, 
									tgl_terima_tpukpe_2, 
									tgl_kembali_tpukpe_2, 
									dept_terkait_2, 
									penyelidikan_dept_terkait_2, 
									tindakan_pencegahan_dept_terkait_2, 
									tgl_terima_tpukpe_3, 
									tgl_kembali_tpukpe_3, 
									dept_terkait_3, 
									penyelidikan_dept_terkait_3, 
									tindakan_pencegahan_dept_terkait_3) 
								VALUES(
									'$_POST[no_tpukpe]',
									'$_POST[penyelidikan_dept_qcf]', 
									'$_POST[tindakan_pencegahan_dept_qcf]', 
									'$_POST[tgl_terima_tpukpe_1]', 
									'$_POST[tgl_kembali_tpukpe_1]', 
									'$_POST[dept_terkait_1]', 
									'$_POST[penyelidikan_dept_terkait_1]', 
									'$_POST[tindakan_pencegahan_dept_terkait_1]', 
									'$_POST[tgl_terima_tpukpe_2]', 
									'$_POST[tgl_kembali_tpukpe_2]', 
									'$_POST[dept_terkait_2]', 
									'$_POST[penyelidikan_dept_terkait_2]', 
									'$_POST[tindakan_pencegahan_dept_terkait_2]', 
									'$_POST[tgl_terima_tpukpe_3]', 
									'$_POST[tgl_kembali_tpukpe_3]', 
									'$_POST[dept_terkait_3]', 
									'$_POST[penyelidikan_dept_terkait_3]', 
									'$_POST[tindakan_pencegahan_dept_terkait_3]'
								);
							");
	}
}
?>