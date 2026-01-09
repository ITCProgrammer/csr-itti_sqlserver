<style>
	input[type="number"]::-webkit-outer-spin-button,
	input[type="number"]::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	input[type="number"] {
		-moz-appearance: textfield;
	}
</style>
<script>
	function roundToTwo(num) {
		return +(Math.round(num + "e+2") + "e-2");
	}
</script>
<?php
// ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

$no_counter = $_GET['no_counter'];

$qryNoKK = mysqli_query($conlab, "SELECT * FROM tbl_test_qc WHERE sts_laborat <> 'Cancel' AND sts_qc <> 'Belum Terima Kain' AND deleted_at IS NULL AND no_counter='$no_counter'");
$NoKKcek = mysqli_num_rows($qryNoKK);
$rNoKK = mysqli_fetch_array($qryNoKK);


$sqlCek1 = mysqli_query($conlab, "SELECT *,
	CONCAT_WS(' ',fc_note,ph_note, abr_note, bas_note, dry_note, fla_note, fwe_note, fwi_note, burs_note,repp_note,wick_note,absor_note,apper_note,fiber_note,pillb_note,pillm_note,pillr_note,thick_note,growth_note,recover_note,stretch_note,sns_note,snab_note,snam_note,snap_note,wash_note,water_note,acid_note,alkaline_note,crock_note,phenolic_note,cm_printing_note,cm_dye_note,light_note,light_pers_note,saliva_note,h_shrinkage_note,fibre_note,pilll_note,soil_note,apperss_note,bleeding_note,chlorin_note,dye_tf_note) AS note_g FROM tbl_tq_test WHERE id_nokk='$rNoKK[id]' ORDER BY id DESC LIMIT 1");
$cek1 = mysqli_num_rows($sqlCek1);
$rcek1 = mysqli_fetch_array($sqlCek1);
$sqlCekR = mysqli_query($conlab, "SELECT *,
	CONCAT_WS(' ',rfc_note,rph_note, rabr_note, rbas_note, rdry_note, rfla_note, rfwe_note, rfwi_note, rburs_note,rrepp_note,rwick_note,rabsor_note,rapper_note,rfiber_note,rpillb_note,rpillm_note,rpillr_note,rthick_note,rgrowth_note,rrecover_note,rstretch_note,rsns_note,rsnab_note,rsnam_note,rsnap_note,rwash_note,rwater_note,racid_note,ralkaline_note,rcrock_note,rphenolic_note,rcm_printing_note,rcm_dye_note,rlight_note,rlight_pers_note,rsaliva_note,rh_shrinkage_note,rfibre_note,rpilll_note,rsoil_note,rapperss_note,rbleeding_note,rchlorin_note,rdye_tf_note) AS rnote_g FROM tbl_tq_randomtest WHERE no_item='$rNoKK[no_item]' OR no_hanger='$rNoKK[no_hanger]'");
$cekR = mysqli_num_rows($sqlCekR);
$rcekR = mysqli_fetch_array($sqlCekR);
$sqlCekD = mysqli_query($conlab, "SELECT *,
	CONCAT_WS(' ',dfc_note,dph_note, dabr_note, dbas_note, ddry_note, dfla_note, dfwe_note, dfwi_note, dburs_note,drepp_note,dwick_note,dabsor_note,dapper_note,dfiber_note,dpillb_note,dpillm_note,dpillr_note,dthick_note,dgrowth_note,drecover_note,dstretch_note,dsns_note,dsnab_note,dsnam_note,dsnap_note,dwash_note,dwater_note,dacid_note,dalkaline_note,dcrock_note,dphenolic_note,dcm_printing_note,dcm_dye_note,dlight_note,dlight_pers_note,dsaliva_note,dh_shrinkage_note,dfibre_note,dpilll_note,dsoil_note,dapperss_note,dbleeding_note,dchlorin_note,ddye_tf_note) AS dnote_g FROM tbl_tq_disptest WHERE id_nokk='$rNoKK[id]' ORDER BY id DESC LIMIT 1");
$cekD = mysqli_num_rows($sqlCekD);
$rcekD = mysqli_fetch_array($sqlCekD);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
	<div class="box box-info" style="width: 98%;">
		<div class="box-header with-border">
			<h3 class="box-title">Testing Kartu Kerja</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="col-md-6">
				<div class="form-group">
					<label for="no_counter" class="col-sm-3 control-label">No Counter</label>
					<div class="col-sm-5">
						<div class="input-group">
							<input name="no_counter" type="text" class="form-control" id="no_counter" onchange="window.location='ResultNoCounter-'+this.value" onBlur="window.location='ResultNoCounter-'+this.value" value="<?php echo $_GET['no_counter']; ?>" placeholder="No Counter" required>
						</div>
					</div>
				</div>
				<?php if ($no_counter != "") { ?>
					<div class="form-group">
						<label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
						<div class="col-sm-3">
							<input name="no_hanger" type="text" class="form-control" id="no_hanger" placeholder="No Hanger" value="<?php if ($NoKKcek > 0) {
																																		echo $rNoKK['no_hanger'];
																																	} ?>" readonly="readonly">
						</div>
						<div class="col-sm-3">
							<input name="no_item" type="text" class="form-control" id="no_item" placeholder="No Item" value="<?php if ($NoKKcek > 0) {
																																	echo $rNoKK['no_item'];
																																} ?>" readonly="readonly">
						</div>
					</div>
					<div class="form-group">
						<label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
						<div class="col-sm-8">
							<textarea name="jns_kain" readonly="readonly" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if ($NoKKcek > 0) {
																																			echo $rNoKK['jenis_kain'];
																																		} ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="warna" class="col-sm-3 control-label">Warna</label>
						<div class="col-sm-8">
							<textarea name="warna" readonly="readonly" class="form-control" id="warna" placeholder="Warna"><?php if ($NoKKcek > 0) {
																																echo $rNoKK['warna'];
																															} ?></textarea>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</form>

<?php if ($cek1 > 0) { ?>
	<section class="invoice">
		<!-- title row -->
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header">
					<i class="fa fa-globe"></i> Result.
					<small class="pull-right">Date:
						<?php echo $rcek1['tgl_buat']; ?>
					</small>
				</h2>
			</div>
			<!-- /.col -->
		</div>
		<!-- info row -->
		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
			</div>
			<!-- /.col -->
			<div class="col-sm-4 invoice-col">
			</div>
			<!-- /.col -->
			<div class="col-sm-12 invoice-col">
				<strong>COLORFASTNESS</strong>
				<hr>
				<table class="table">
					<?php if ($rcek1['wash_temp'] != "" or $rcek1['wash_colorchange'] != "" or $rcek1['wash_acetate'] != "" or $rcek1['wash_cotton'] != "" or $rcek1['wash_nylon'] != "" or $rcek1['wash_poly'] != "" or $rcek1['wash_acrylic'] != "" or $rcek1['wash_wool'] != "" or $rcek1['wash_staining'] != "") {
					?>
						<tr>
							<th rowspan="5">Washing</th>
							<th>Suhu</th>
							<td colspan="4">
								<?php if ($rcek1['stat_wf'] == "RANDOM") {
									echo $rcekR['rwash_temp'];
								} else {
									echo $rcek1['wash_temp'];
								} ?>&deg;
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td><strong>CC</strong></td>
							<td colspan="2"><strong>Ace</strong></td>
							<td><strong>Cot</strong></td>
							<td colspan="2"><strong>Nyl</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td>
								<?php if ($rcek1['stat_wf'] == "RANDOM") {
									echo $rcekR['rwash_colorchange'];
								} else {
									echo $rcek1['wash_colorchange'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_wf'] == "RANDOM") {
									echo $rcekR['rwash_acetate'];
								} else {
									echo $rcek1['wash_acetate'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['stat_wf'] == "RANDOM") {
									echo $rcekR['rwash_cotton'];
								} else {
									echo $rcek1['wash_cotton'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_wf'] == "RANDOM") {
									echo $rcekR['rwash_nylon'];
								} else {
									echo $rcek1['wash_nylon'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td><strong>Poly</strong></td>
							<td colspan="2"><strong>Acr</strong></td>
							<td><strong>Wool</strong></td>
							<td colspan="2"><strong>Sta</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td>
								<?php if ($rcek1['stat_wf'] == "RANDOM") {
									echo $rcekR['rwash_poly'];
								} else {
									echo $rcek1['wash_poly'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_wf'] == "RANDOM") {
									echo $rcekR['rwash_acrylic'];
								} else {
									echo $rcek1['wash_acrylic'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['stat_wf'] == "RANDOM") {
									echo $rcekR['rwash_wool'];
								} else {
									echo $rcek1['wash_wool'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_wf'] == "RANDOM") {
									echo $rcekR['rwash_staining'];
								} else {
									echo $rcek1['wash_staining'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['acid_colorchange'] != "" or $rcek1['acid_acetate'] != "" or $rcek1['acid_cotton'] != "" or $rcek1['acid_nylon'] != "" or $rcek1['acid_poly'] != "" or $rcek1['acid_acrylic'] != "" or $rcek1['acid_wool'] != "" or $rcek1['acid_staining'] != "") { ?>
						<tr>
							<th rowspan="4" colspan="2">Perspiration Acid</th>
							<td><strong>CC</strong></td>
							<td colspan="2"><strong>Ace</strong></td>
							<td><strong>Cot</strong></td>
							<td colspan="2"><strong>Nyl</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>
								<?php if ($rcek1['stat_pac'] == "RANDOM") {
									echo $rcekR['racid_colorchange'];
								} else {
									echo $rcek1['acid_colorchange'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_pac'] == "RANDOM") {
									echo $rcekR['racid_acetate'];
								} else {
									echo $rcek1['acid_acetate'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['stat_pac'] == "RANDOM") {
									echo $rcekR['racid_cotton'];
								} else {
									echo $rcek1['acid_cotton'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_pac'] == "RANDOM") {
									echo $rcekR['racid_nylon'];
								} else {
									echo $rcek1['acid_nylon'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><strong>Poly</strong></td>
							<td colspan="2"><strong>Acr</strong></td>
							<td><strong>Wool</strong></td>
							<td colspan="2"><strong>Sta</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>
								<?php if ($rcek1['stat_pac'] == "RANDOM") {
									echo $rcekR['racid_poly'];
								} else {
									echo $rcek1['acid_poly'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_pac'] == "RANDOM") {
									echo $rcekR['racid_acrylic'];
								} else {
									echo $rcek1['acid_acrylic'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['stat_pac'] == "RANDOM") {
									echo $rcekR['racid_wool'];
								} else {
									echo $rcek1['acid_wool'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_pac'] == "RANDOM") {
									echo $rcekR['racid_staining'];
								} else {
									echo $rcek1['acid_staining'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<!--<td colspan="2"><?php echo $rcek1['acid_staining']; ?></td>-->
						</tr>
					<?php } ?>
					<?php if ($rcek1['alkaline_colorchange'] != "" or $rcek1['alkaline_acetate'] != "" or $rcek1['alkaline_cotton'] != "" or $rcek1['alkaline_nylon'] != "" or $rcek1['alkaline_poly'] != "" or $rcek1['alkaline_acrylic'] != "" or $rcek1['alkaline_wool'] != "" or $rcek1['alkaline_staining'] != "") { ?>
						<tr>
							<th rowspan="4" colspan="2">Perspiration Alkaline</th>
							<td><strong>CC</strong></td>
							<td colspan="2"><strong>Ace</strong></td>
							<td><strong>Cot</strong></td>
							<td colspan="2"><strong>Nyl</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>
								<?php if ($rcek1['stat_pal'] == "RANDOM") {
									echo $rcekR['ralkaline_colorchange'];
								} else {
									echo $rcek1['alkaline_colorchange'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_pal'] == "RANDOM") {
									echo $rcekR['ralkaline_acetate'];
								} else {
									echo $rcek1['alkaline_acetate'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['stat_pal'] == "RANDOM") {
									echo $rcekR['ralkaline_cotton'];
								} else {
									echo $rcek1['alkaline_cotton'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_pal'] == "RANDOM") {
									echo $rcekR['ralkaline_nylon'];
								} else {
									echo $rcek1['alkaline_nylon'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><strong>Poly</strong></td>
							<td colspan="2"><strong>Acr</strong></td>
							<td><strong>Wool</strong></td>
							<td colspan="2"><strong>Sta</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>
								<?php if ($rcek1['stat_pal'] == "RANDOM") {
									echo $rcekR['ralkaline_poly'];
								} else {
									echo $rcek1['alkaline_poly'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_pal'] == "RANDOM") {
									echo $rcekR['ralkaline_acrylic'];
								} else {
									echo $rcek1['alkaline_acrylic'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['stat_pal'] == "RANDOM") {
									echo $rcekR['ralkaline_wool'];
								} else {
									echo $rcek1['alkaline_wool'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_pal'] == "RANDOM") {
									echo $rcekR['ralkaline_staining'];
								} else {
									echo $rcek1['alkaline_staining'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<!--<td colspan="2"><?php echo $rcek1['alkaline_staining']; ?></td>-->
						</tr>
					<?php } ?>
					<?php if ($rcek1['water_colorchange'] != "" or $rcek1['water_acetate'] != "" or $rcek1['water_cotton'] != "" or $rcek1['water_nylon'] != "" or $rcek1['water_poly'] != "" or $rcek1['water_acrylic'] != "" or $rcek1['water_wool'] != "" or $rcek1['water_staining'] != "") { ?>
						<tr>
							<th rowspan="4" colspan="2">Water</th>
							<td><strong>CC</strong></td>
							<td colspan="2"><strong>Ace</strong></td>
							<td><strong>Cot</strong></td>
							<td colspan="2"><strong>Nyl</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>
								<?php if ($rcek1['stat_wtr'] == "RANDOM") {
									echo $rcekR['rwater_colorchange'];
								} else {
									echo $rcek1['water_colorchange'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_wtr'] == "RANDOM") {
									echo $rcekR['rwater_acetate'];
								} else {
									echo $rcek1['water_acetate'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['stat_wtr'] == "RANDOM") {
									echo $rcekR['rwater_cotton'];
								} else {
									echo $rcek1['water_cotton'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_wtr'] == "RANDOM") {
									echo $rcekR['rwater_nylon'];
								} else {
									echo $rcek1['water_nylon'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><strong>Poly</strong></td>
							<td colspan="2"><strong>Acr</strong></td>
							<td><strong>Wool</strong></td>
							<td colspan="2"><strong>Sta</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>
								<?php if ($rcek1['stat_wtr'] == "RANDOM") {
									echo $rcekR['rwater_poly'];
								} else {
									echo $rcek1['water_poly'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_wtr'] == "RANDOM") {
									echo $rcekR['rwater_acrylic'];
								} else {
									echo $rcek1['water_acrylic'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['stat_wtr'] == "RANDOM") {
									echo $rcekR['rwater_wool'];
								} else {
									echo $rcek1['water_wool'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_wtr'] == "RANDOM") {
									echo $rcekR['rwater_staining'];
								} else {
									echo $rcek1['water_staining'];
								} ?>
							</td>
							<td>&nbsp;</td>
							<!--<td><?php echo $rcek1['water_staining']; ?></td>-->
						</tr>
					<?php } ?>
					<?php if ($rcek1['crock_len1'] != "" or $rcek1['crock_wid1'] != "" or $rcek1['crock_len2'] != "" or $rcek1['crock_wid2'] != "") { ?>
						<tr>
							<th rowspan="3">Crocking</th>
							<th>Srt</th>
							<th>Dry</th>
							<th>Wet</th>
						</tr>
						<tr>
							<th>Len</th>
							<td>
								<?php if ($rcek1['stat_cr'] == "RANDOM") {
									echo $rcekR['rcrock_len1'];
								} else {
									echo $rcek1['crock_len1'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_cr'] == "RANDOM") {
									echo $rcekR['rcrock_len2'];
								} else {
									echo $rcek1['crock_len2'];
								} ?>
							</td>
						</tr>
						<tr>
							<th>Wid</th>
							<td>
								<?php if ($rcek1['stat_cr'] == "RANDOM") {
									echo $rcekR['rcrock_wid1'];
								} else {
									echo $rcek1['crock_wid1'];
								} ?>
							</td>
							<td colspan="3">
								<?php if ($rcek1['stat_cr'] == "RANDOM") {
									echo $rcekR['rcrock_wid2'];
								} else {
									echo $rcek1['crock_wid2'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['phenolic_colorchange'] != "") { ?>
						<tr>
							<th>Phenolic Yellowing</th>
							<th><strong>CC</strong></th>
							<td colspan="4">
								<?php if ($rcek1['stat_py'] == "RANDOM") {
									echo $rcekR['rphenolic_colorchange'];
								} else {
									echo $rcek1['phenolic_colorchange'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['light_rating1'] != "" or $rcek1['light_rating2'] != "") { ?>
						<tr>
							<th>Light</th>
							<th>&nbsp;</th>
							<td>
								<?php if ($rcek1['stat_lg'] == "RANDOM") {
									echo $rcekR['rlight_rating1'];
								} else {
									echo $rcek1['light_rating1'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_lg'] == "RANDOM") {
									echo $rcekR['rlight_rating2'];
								} else {
									echo $rcek1['light_rating2'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['cm_printing_colorchange'] != "" or $rcek1['cm_printing_staining'] != "") { ?>
						<tr>
							<th>Color Migration Oven</th>
							<th>&nbsp;</th>
							<td colspan="3">
								<?php if ($rcek1['stat_cmo'] == "RANDOM") {
									echo $rcekR['rcm_printing_colorchange'];
								} else {
									echo $rcek1['cm_printing_colorchange'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['stat_cmo'] == "RANDOM") {
									echo $rcekR['rcm_printing_staining'];
								} else {
									echo $rcek1['cm_printing_staining'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['cm_dye_temp'] != "" or $rcek1['cm_dye_colorchange'] != "" or $rcek1['cm_dye_stainingface'] != "" or $rcek1['cm_dye_stainingback'] != "") { ?>
						<tr>
							<th rowspan="3">Color Migration</th>
							<th>Suhu</th>
							<td colspan="4">
								<?php if ($rcek1['stat_cm'] == "RANDOM") {
									echo $rcekR['rcm_dye_temp'];
								} else {
									echo $rcek1['cm_dye_temp'];
								} ?>&deg;
							</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td><strong>CC</strong></td>
							<td><strong>Sta</strong></td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td>
								<?php if ($rcek1['stat_cm'] == "RANDOM") {
									echo $rcekR['rcm_dye_colorchange'];
								} else {
									echo $rcek1['cm_dye_colorchange'];
								} ?>
							</td>
							<td colspan="4">
								<?php if ($rcek1['stat_cm'] == "RANDOM") {
									echo $rcekR['rcm_dye_stainingface'];
								} else {
									echo $rcek1['cm_dye_stainingface'];
								} ?>
							</td>
							<!--<td><?php echo $rcek1['cm_dye_stainingback']; ?></td>-->
						</tr>
					<?php } ?>
					<?php if ($rcek1['light_pers_colorchange'] != "") { ?>
						<tr>
							<th>Light Perspiration</th>
							<th><strong>CC</strong></th>
							<td colspan="4">
								<?php if ($rcek1['stat_lp'] == "RANDOM") {
									echo $rcekR['rlight_pers_colorchange'];
								} else {
									echo $rcek1['light_pers_colorchange'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['saliva_staining'] != "") { ?>
						<tr>
							<th>Saliva</th>
							<th>&nbsp;</th>
							<td colspan="2">
								<?php if ($rcek1['stat_slv'] == "RANDOM") {
									echo $rcekR['rsaliva_staining'];
								} else {
									echo $rcek1['saliva_staining'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['bleeding'] != "") { ?>
						<tr>
							<th>Bleeding</th>
							<th>&nbsp;</th>
							<td colspan="2">
								<?php if ($rcek1['stat_bld'] == "RANDOM") {
									echo $rcekR['rbleeding'];
								} else {
									echo $rcek1['bleeding'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['chlorin'] != "" or $rcek1['nchlorin1'] != "" or $rcek1['nchlorin2'] != "") { ?>
						<tr>
							<th>Chlorin</th>
							<th>&nbsp;</th>
							<td colspan="2">
								<?php if ($rcek1['stat_chl'] == "RANDOM") {
									echo $rcekR['rchlorin'];
								} else {
									echo $rcek1['chlorin'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>Non-Chlorin</th>
							<th>&nbsp;</th>
							<td colspan="2">
								<?php if ($rcek1['stat_nchl'] == "RANDOM") {
									echo $rcekR['rnchlorin1'];
								} else {
									echo $rcek1['nchlorin1'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_nchl'] == "RANDOM") {
									echo $rcekR['rnchlorin2'];
								} else {
									echo $rcek1['nchlorin2'];
								} ?>
							</td>
						</tr>
					<?php } ?>
					<?php if ($rcek1['dye_tf_cstaining'] != "" or $rcek1['dye_tf_acetate'] != "" or $rcek1['dye_tf_cotton'] != "" or $rcek1['dye_tf_nylon'] != "" or $rcek1['dye_tf_poly'] != "" or $rcek1['dye_tf_acrylic'] != "" or $rcek1['dye_tf_wool'] != "" or $rcek1['dye_tf_sstaining'] != "") {
					?>
						<tr>
							<th rowspan="4" colspan="2">Dye Transfer</th>
							<td><strong>Ace</strong></td>
							<td colspan="2"><strong>Cot</strong></td>
							<td><strong>Nyl</strong></td>
							<td colspan="2"><strong>Poly</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td>
								<?php if ($rcek1['stat_dye'] == "RANDOM") {
									echo $rcekR['rdye_tf_acetate'];
								} else {
									echo $rcek1['dye_tf_acetate'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_dye'] == "RANDOM") {
									echo $rcekR['rdye_tf_cotton'];
								} else {
									echo $rcek1['dye_tf_cotton'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['stat_dye'] == "RANDOM") {
									echo $rcekR['rdye_tf_nylon'];
								} else {
									echo $rcek1['dye_tf_nylon'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_dye'] == "RANDOM") {
									echo $rcekR['rdye_tf_poly'];
								} else {
									echo $rcek1['dye_tf_poly'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td><strong>Acr</strong></td>
							<td colspan="2"><strong>Wool</strong></td>
							<td><strong>C.Sta</strong></td>
							<td colspan="2"><strong>S.Sta</strong></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td>
								<?php if ($rcek1['stat_dye'] == "RANDOM") {
									echo $rcekR['rdye_tf_acrylic'];
								} else {
									echo $rcek1['dye_tf_acrylic'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_dye'] == "RANDOM") {
									echo $rcekR['rdye_tf_wool'];
								} else {
									echo $rcek1['dye_tf_wool'];
								} ?>
							</td>
							<td>
								<?php if ($rcek1['stat_dye'] == "RANDOM") {
									echo $rcekR['rdye_tf_cstaining'];
								} else {
									echo $rcek1['dye_tf_cstaining'];
								} ?>
							</td>
							<td colspan="2">
								<?php if ($rcek1['stat_dye'] == "RANDOM") {
									echo $rcekR['rdye_tf_sstaining'];
								} else {
									echo $rcek1['dye_tf_sstaining'];
								} ?>
							</td>
							<td>&nbsp;</td>
						</tr>
					<?php } ?>
				</table>
				<address>

				</address>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

		<!-- Table row -->
		<div class="row">
			<!-- accepted payments column -->
			<div class="col-xs-12">
				<p class="lead">Note: </p>
				<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
					<?php echo trim($rcek1['note_g']); ?>
				</p>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row --><!-- /.row -->

		<!-- this row will not appear when printing -->
		<div class="row no-print">
			<div class="col-xs-12">
				<a href="pages/cetak/cetak_result_lab.php?idkk=<?php echo $rNoKK['id']; ?>&noitem=<?php echo $rNoKK['no_item']; ?>&nohanger=<?php echo $rNoKK['no_hanger']; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
				<div class="btn-group pull-right">
					<a href="#" class="btn btn-info kain_approved_parsial" id="<?php echo $rNoKK['id']; ?>"><i class="fa fa-check"></i> Approved Parsial</a>
					<a href="#" class="btn btn-danger kain_approved_full" id="<?php echo $rNoKK['id']; ?>"><i class="fa fa-check"></i> Approved Full</a>
				</div>

			</div>
		</div>
	</section>
<?php } ?>
</div>
</div>
</div>
</div>
<div id="KainApprovedParsial" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="KainApprovedFull" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>