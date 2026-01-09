<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$modal_id = $_GET['id'];
$modal = mysqli_query($con, "SELECT * FROM `tbl_schedule` WHERE id='$modal_id' ");
while ($r = mysqli_fetch_array($modal)) {
	?>

	<div class="modal-dialog modal1 ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post"
				action="EditMesinBerhenti" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">QC Final</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id" value="<?php echo $r['id']; ?>">
					<input type="hidden" id="personil" name="personil" value="<?php echo $_SESSION['usrid']; ?>">
					<div class="form-group">
						<label for="shift" class="col-md-4 control-label">Group Shift</label>
						<div class="col-md-2">
							<select name="shift" class="form-control" id="shift" required>
								<option value="">Pilih</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="Non-Shift">Non-Shift</option>

							</select>
							<span class="help-block with-errors"></span>
						</div>
						<div class="col-md-2">
							<select name="g_shift" class="form-control" id="g_shift" required>
								<option value="">Pilih</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="Non-Shift">Non-Shift</option>

							</select>
							<span class="help-block with-errors"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="shift" class="col-md-4 control-label">Tanggung Jawab</label>
						<div class="col-md-4">
							<select name="t_jawab" class="form-control" id="t_jawab" required>
							<option value="">Pilih</option>
							<option value="Leader 1">Leader 1</option>
							<option value="Leader 2">Leader 2</option>
							<option value="Leader 3">Leader 3</option>
							<option value="Leader Packing">Leader Packing</option>
							<option value="Leader Kragh">Leader Kragh</option>	
						</select>
							<span class="help-block with-errors"></span>
						</div>
						<div class="col-md-4">
							<select name="t_jawab_buyer" class="form-control" id="t_jawab_buyer" required>
							<option value="">Pilih</option>
							<option value="Lululemon">Lululemon</option>
							<option value="Adidas atau Lain-Lain">Adidas atau Lain-Lain</option>
						</select>
							<span class="help-block with-errors"></span>
						</div>
						
					</div>
					<div class="form-group">
						<label for="istirahat" class="col-md-4 control-label">Lama Istirahat</label>
						<div class="col-md-5">
							<select name="istirahat" class="form-control" id="istirahat">
								<option value="">Pilih</option>
								<option value="30">30 Menit</option>
								<option value="60">60 Menit</option>
								<option value="90">90 Menit</option>

							</select>
							<span class="help-block with-errors"></span>
						</div>
						<div class="col-md-3">
							<select name="shading" class="form-control" id="shading" required>
								<option value="">Pilih Shading</option>
								<option value="Tidak">Tidak</option>
								<option value="OK">OK</option>
							</select>
							<span class="help-block with-errors"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="operator" class="col-md-4 control-label">Operators</label>
						<div class="col-md-5">
							<select name="operator" class="form-control operator_x" id="operator" demand="<?=$r['nodemand']?>" onchange="proses_operator()">
								<option value="">Pilih</option>
								<?php
								$sqlop = "SELECT
												DISTINCT(INITIALS.LONGDESCRIPTION) AS NAMA,
												ELEMENTSINSPECTION.OPERATORCODE 
											FROM INITIALS INITIALS 
											LEFT JOIN ELEMENTSINSPECTION ELEMENTSINSPECTION
												ON INITIALS.CODE = ELEMENTSINSPECTION.OPERATORCODE 
											WHERE ELEMENTSINSPECTION.DEMANDCODE ='$r[nodemand]' ";
												// AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13";
								$stmt1 = db2_exec($conn1, $sqlop, array('cursor' => DB2_SCROLLABLE));
								while ($rowop = db2_fetch_assoc($stmt1)) {
									?>
									<option value="<?php echo trim($rowop['OPERATORCODE']); ?>" <?php
									if ($r['operator'] == $rowop['OPERATORCODE']) {
										echo "SELECTED";
									} ?>>
										<?php echo $rowop['NAMA']; ?>
									</option>
								<?php } ?>
							</select>
							<span class="help-block with-errors"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="jml_rol" class="col-md-4 control-label">Jml Roll Aktual</label>
						<div class="col-sm-2">
							<input name="jml_rol" class="form-control" id="jml_rol_x" placeholder="0" required>
							<span class="help-block with-errors"></span>
						</div>
						<!-- <label for="demand_lgcy" class="col-md-2 control-label">No Demand x</label>
						<div class="col-sm-3">
							<input name="demand_lgcy" class="form-control" id="demand_lgcy" placeholder="Demand"
								minlength="6" required>
						</div> -->

					</div>
					<div class="form-group">
						<label for="qty" class="col-md-4 control-label">Qty Aktual</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input name="qty" id="qty_x" type="text" class="form-control" placeholder="0.00"
									style="text-align: right;" required>
								<span class="input-group-addon">KGs</span>
							</div>
							<span class="help-block with-errors"></span>
						</div>
						<div class="col-sm-4">
							<div class="input-group">
								<input name="yard" class="form-control" id="yard_x" placeholder="0.00"
									style="text-align: right;" required>
								<span class="input-group-addon">Yards</span>
							</div>
							<span class="help-block with-errors"></span>
						</div>

					</div>
					<div class="form-group">
						<label for="lost" class="col-md-4 control-label">Loss</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input name="qty_loss" id="qty_loss" type="text" class="form-control" placeholder="0.00"
									style="text-align: right;">
								<span class="input-group-addon">KGs</span>
							</div>
							<span class="help-block with-errors"></span>
						</div>
						<div class="col-sm-5">							
								<input name="note_loss" class="form-control" id="note_loss" placeholder="Note Loss" >								
							<span class="help-block with-errors"></span>
						</div>

					</div>
					<div class="form-group">
						<label for="lembap_fin" class="col-md-4 control-label">Cek Lembap</label>
						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon">FIN</span>
								<input name="lembap_fin" class="form-control" id="lembap_fin" placeholder="">
							</div>
							<span class="help-block with-errors"></span>
						</div>
						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon">QCF</span>
								<input name="lembap_qcf" class="form-control" id="lembap_qcf" placeholder="">
							</div>
							<span class="help-block with-errors"></span>
						</div>

					</div>
					<div class="form-group">
						<label for="catatan" class="col-md-4 control-label">Catatan</label>
						<div class="col-sm-8">
							<textarea name="catatan" class="form-control" id="catatan" placeholder="catatan..."></textarea>
							<span class="help-block with-errors"></span>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">OK</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
<?php } ?>

<script>
	function proses_operator() {
		
	}
</script>