<?php
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

$nodemand = $_GET['nodemand'];
$notest = isset($_POST['no_test']) ? $_POST['no_test'] : '';

$sqlCek = mysqli_query($con, "SELECT * FROM tbl_tq_nokk WHERE nodemand='$nodemand' AND no_test='$notest' ORDER BY id DESC LIMIT 1");
$cek = mysqli_num_rows($sqlCek);
$rcek = mysqli_fetch_array($sqlCek);

$sqlCek1 = mysqli_query($con, "SELECT *, CONCAT_WS(' ', fc_note, ph_note, abr_note, bas_note, dry_note, fla_note, fwe_note, fwi_note, burs_note, repp_note, wick_note, absor_note, apper_note, fiber_note, pillb_note, pillm_note, pillr_note, thick_note, growth_note, recover_note, stretch_note, sns_note, snab_note, snam_note, snap_note, wash_note, water_note, acid_note, alkaline_note, crock_note, phenolic_note, cm_printing_note, cm_dye_note, light_note, light_pers_note, saliva_note, h_shrinkage_note, fibre_note, pilll_note, soil_note, apperss_note, bleeding_note, chlorin_note, dye_tf_note) AS note_g FROM tbl_tq_test WHERE id_nokk='$rcek[id]' ORDER BY id DESC LIMIT 1");
$cek1 = mysqli_num_rows($sqlCek1);
$rcek1 = mysqli_fetch_array($sqlCek1);

$sqlCekR = mysqli_query($con, "SELECT *, CONCAT_WS(' ', rfc_note, rph_note, rabr_note, rbas_note, rdry_note, rfla_note, rfwe_note, rfwi_note, rburs_note, rrepp_note, rwick_note, rabsor_note, rapper_note, rfiber_note, rpillb_note, rpillm_note, rpillr_note, rthick_note, rgrowth_note, rrecover_note, rstretch_note, rsns_note, rsnab_note, rsnam_note, rsnap_note, rwash_note, rwater_note, racid_note, ralkaline_note, rcrock_note, rphenolic_note, rcm_printing_note, rcm_dye_note, rlight_note, rlight_pers_note, rsaliva_note, rh_shrinkage_note, rfibre_note, rpilll_note, rsoil_note, rapperss_note, rbleeding_note, rchlorin_note, rdye_tf_note) AS rnote_g FROM tbl_tq_randomtest WHERE no_item='$rcek[no_item]' OR no_hanger='$rcek[no_hanger]'");
$cekR = mysqli_num_rows($sqlCekR);
$rcekR = mysqli_fetch_array($sqlCekR);

$sqlCekD = mysqli_query($con, "SELECT *, CONCAT_WS(' ', dfc_note, dph_note, dabr_note, dbas_note, ddry_note, dfla_note, dfwe_note, dfwi_note, dburs_note, drepp_note, dwick_note, dabsor_note, dapper_note, dfiber_note, dpillb_note, dpillm_note, dpillr_note, dthick_note, dgrowth_note, drecover_note, dstretch_note, dsns_note, dsnab_note, dsnam_note, dsnap_note, dwash_note, dwater_note, dacid_note, dalkaline_note, dcrock_note, dphenolic_note, dcm_printing_note, dcm_dye_note, dlight_note, dlight_pers_note, dsaliva_note, dh_shrinkage_note, dfibre_note, dpilll_note, dsoil_note, dapperss_note, dbleeding_note, dchlorin_note, ddye_tf_note) AS dnote_g FROM tbl_tq_disptest WHERE id_nokk='$rcek[id]' ORDER BY id DESC LIMIT 1");
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
					<label for="no_po" class="col-sm-3 control-label">No Demand</label>
					<div class="col-sm-5">
						<div class="input-group">
							<input name="nodemand" type="text" class="form-control" id="nodemand" onchange="window.location='ResultKKNew-'+this.value" onBlur="window.location='ResultKKNew-'+this.value" value="<?php echo $_GET['nodemand']; ?>" placeholder="No Demand" required>
							<span class="input-group-addon"><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-circle-right"></i></a></span>
						</div>
					</div>
				</div>
				<?php if ($nodemand != "") { ?>
					<div class="form-group">
						<label for="no_test" class="col-sm-3 control-label">No Test</label>
						<div class="col-sm-4">
							<select name="no_test" id="no_test" class="form-control">
								<?php
								$qryNoTes = mysqli_query($con, "SELECT no_test FROM tbl_tq_nokk WHERE nodemand='$nodemand' ORDER BY no_test DESC");
								while ($r = mysqli_fetch_array($qryNoTes)) { ?>
									<option value="<?php echo $r['no_test']; ?>" <?php if ($notest == $r['no_test']) {
																						echo "SELECTED";
																					} ?>><?php echo $r['no_test']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="nokk" class="col-sm-3 control-label">No Prod Order</label>
						<div class="col-sm-2">
							<input name="nokk" type="text" class="form-control" id="nokk" placeholder="No Prod Order" value="<?php if ($cek > 0) {
																																	echo $rcek['nokk'];
																																} ?>" readonly="readonly">
						</div>
					</div>
					<div class="form-group">
						<label for="no_order" class="col-sm-3 control-label">No Order</label>
						<div class="col-sm-4">
							<input name="no_order" type="text" class="form-control" id="no_order" placeholder="No Order" value="<?php if ($cek > 0) {
																																	echo $rcek['no_order'];
																																} else {
																																	echo $r['NoOrder'];
																																} ?>" readonly="readonly">
						</div>
					</div>
					<div class="form-group">
						<label for="no_po" class="col-sm-3 control-label">Pelanggan</label>
						<div class="col-sm-8">
							<input name="pelanggan" type="text" class="form-control" id="no_po" placeholder="Pelanggan" value="<?php if ($cek > 0) {
																																	echo $rcek['pelanggan'];
																																} else if ($r1['partnername'] != "") {
																																	echo $pelanggan;
																																} ?>" readonly="readonly">
						</div>
					</div>
					<div class="form-group">
						<label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
						<div class="col-sm-3">
							<input name="no_hanger" type="text" class="form-control" id="no_hanger" placeholder="No Hanger" value="<?php if ($cek > 0) {
																																		echo $rcek['no_hanger'];
																																	} else {
																																		echo $r['HangerNo'];
																																	} ?>" readonly="readonly">
						</div>
						<div class="col-sm-3">
							<input name="no_item" type="text" class="form-control" id="no_item" placeholder="No Item" value="<?php if ($rcek['no_item'] != "") {
																																	echo $rcek['no_item'];
																																} else {
																																	echo $r['ProductCode'];
																																} ?>" readonly="readonly">
						</div>
					</div>
					<div class="form-group">
						<label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
						<div class="col-sm-8">
							<textarea name="jns_kain" readonly="readonly" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if ($cek > 0) {
																																			echo $rcek['jenis_kain'];
																																		} else {
																																			echo $r['ProductDesc'];
																																		} ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="warna" class="col-sm-3 control-label">Warna</label>
						<div class="col-sm-8">
							<textarea name="warna" readonly="readonly" class="form-control" id="warna" placeholder="Warna"><?php if ($cek > 0) {
																																echo $rcek['warna'];
																															} else {
																																echo $r['Color'];
																															} ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="lot" class="col-sm-3 control-label">Lot</label>
						<div class="col-sm-2">
							<input name="lot" type="text" class="form-control" id="lot" placeholder="Lot" value="<?php if ($cek > 0) {
																														echo $rcek['lot'];
																													} else {
																														echo $lotno;
																													} ?>" readonly="readonly">
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="box-footer">
			<button type="submit" value="cari" class="btn btn-danger">Cari Data</button>
		</div>
	</div>
</form>


<?php
$idkk = isset($_REQUEST['idkk']) ? $_REQUEST['idkk'] : (isset($rcek['id']) ? $rcek['id'] : '');
$noitem = isset($_REQUEST['noitem']) ? $_REQUEST['noitem'] : (isset($rcek['no_item']) ? $rcek['no_item'] : '');
$nohanger = isset($_REQUEST['nohanger']) ? $_REQUEST['nohanger'] : (isset($rcek['no_hanger']) ? $rcek['no_hanger'] : '');
$act = $_GET['g'];
$data = mysqli_query($con, "SELECT a.*, b.*,
    CONCAT_WS(' ',a.fc_note, a.ph_note, a.abr_note, a.bas_note, a.dry_note, a.fla_note, a.fwe_note, a.fwi_note, a.burs_note, a.repp_note, a.wick_note, a.wick_note, a.absor_note, a.apper_note, a.fiber_note, a.pillb_note, a.pillm_note, a.pillr_note, a.thick_note, a.growth_note, a.recover_note, a.stretch_note, a.sns_note, a.snab_note, a.snam_note, a.snap_note, a.wash_note, a.water_note, a.acid_note, a.alkaline_note, a.crock_note, a.phenolic_note, a.cm_printing_note, a.cm_dye_note, a.light_note, a.light_pers_note, a.saliva_note, a.h_shrinkage_note, a.fibre_note, a.pilll_note, a.soil_note, a.bleeding_note, a.chlorin_note, a.dye_tf_note, a.humidity_note, a.odour_note, a.curling_note, a.nedle_note, b.wrinkle_note) AS note_g 
    FROM tbl_tq_test a
    LEFT JOIN tbl_tq_test_2 b ON a.id_nokk = b.id_nokk
    WHERE a.id_nokk='$idkk' 
    ORDER BY a.id DESC 
    LIMIT 1");
$rcek1 = mysqli_fetch_array($data);
$sqlCekR = mysqli_query($con, "SELECT *,
    CONCAT_WS(' ',rfc_note,rph_note, rabr_note, rbas_note, rdry_note, rfla_note, rfwe_note, rfwi_note, rburs_note,rrepp_note,rwick_note,rabsor_note,rapper_note,rfiber_note,rpillb_note,rpillm_note,rpillr_note,rthick_note,rgrowth_note,rrecover_note,rstretch_note,rsns_note,rsnab_note,rsnam_note,rsnap_note,rwash_note,rwater_note,racid_note,ralkaline_note,rcrock_note,rphenolic_note,rcm_printing_note,rcm_dye_note,rlight_note,rlight_pers_note,rsaliva_note,rh_shrinkage_note,rfibre_note,rpilll_note,rsoil_note,rapperss_note,rbleeding_note,rchlorin_note,rdye_tf_note,rhumidity_note,rodour_note) AS rnote_g FROM tbl_tq_randomtest WHERE no_item='$noitem' OR no_hanger='$nohanger'");
$rcekR = mysqli_fetch_array($sqlCekR);
$sqlCekD = mysqli_query($con, "SELECT *,
    CONCAT_WS(' ',dfc_note,dph_note, dabr_note, dbas_note, ddry_note, dfla_note, dfwe_note, dfwi_note, dburs_note,drepp_note,dwick_note,dabsor_note,dapper_note,dfiber_note,dpillb_note,dpillm_note,dpillr_note,dthick_note,dgrowth_note,drecover_note,dstretch_note,dsns_note,dsnab_note,dsnam_note,dsnap_note,dwash_note,dwater_note,dacid_note,dalkaline_note,dcrock_note,dphenolic_note,dcm_printing_note,dcm_dye_note,dlight_note,dlight_pers_note,dsaliva_note,dh_shrinkage_note,dfibre_note,dpilll_note,dsoil_note,dapperss_note,dbleeding_note,dchlorin_note,ddye_tf_note,dhumidity_note,dodour_note) AS dnote_g FROM tbl_tq_disptest WHERE id_nokk='$idkk' ORDER BY id DESC LIMIT 1");
$rcekD = mysqli_fetch_array($sqlCekD);
$data1 = mysqli_query($con, "SELECT nodemand,
                                    nokk,
                                    substring_index(pelanggan, '/', -1) as buyer,
                                    no_item,
                                    no_hanger,
                                    warna 
                                  FROM tbl_tq_nokk WHERE id='$idkk'");
$rd = mysqli_fetch_array($data1);
?>
<div class="box box-info" style="width: 98%;">
	<div class="box-header with-border">
	<div class="row no-print">
        <div class="col-xs-12">
          <a href="pages/cetak/cetak_result.php?idkk=<?php echo $rcek['id'];?>&noitem=<?php echo $rcek['no_item'];?>&nohanger=<?php echo $rcek['no_hanger'];?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>
  </div>
  <br>
		<table width="100%" border="0" style="font-size: 15px;">
			<tbody>
				<tr>
					<td colspan="1" align="left" valign="top">
						Buyer : <?php echo $rd['buyer']; ?>
					</td>
					<td>&nbsp;</td>
					<td colspan="1" align="right" valign="top">
						No Prod Order : <?php echo $rd['nokk']; ?>
					</td>
				</tr>
				<tr>
					<td colspan="1" align="left" valign="top">
						Item / Hanger : <?php echo trim($rd['no_item']); ?> / <?= $rd['no_hanger'] ?>
					</td>
					<td>&nbsp;</td>
					<td colspan="1" align="right" valign="top">
						Demand : <?php echo trim($rd['nodemand']); ?>
					</td>
				</tr>
				<tr>
					<td colspan="1" align="left">
						Warna : <?= $rd['warna'] ?>
					</td>
					<td>&nbsp;</td>
					<td colspan="1" align="right">
						<?= $rcek1['tgl_buat'] ?>
					</td>
				</tr>
				<tr>
					<td width="187" align="left" valign="top" style="height: 1.6in;">PHYSICAL
						<hr>
						<table class="table">
							<?php if ($rcek1['flamability'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="width:45%; font-size: 15px;">Flamability</th>
									<td colspan="6" style="font-size: 15px; <?= $rcek1['stat_fla'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fla'] == "RANDOM") {
											echo $rcekR['rflamability'];
										} else {
											echo $rcek1['flamability'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['fc_cott'] != "" or $rcek1['fc_poly'] != "" or $rcek1['fc_elastane'] != "") {
								if ($rcek1['fc_cott'] != "") {
									$cott = $rcek1['fc_cott'] . "% Cott";
								} else {
									$cott = "";
								}
								if ($rcek1['fc_poly'] != "") {
									$poly = $rcek1['fc_poly'] . "% Poly";
								} else {
									$poly = "";
								}
								if ($rcek1['fc_elastane'] != "") {
									$ela = $rcek1['fc_elastane'] . "% Ela";
								} else {
									$ela = "";
								}
							?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Fiber Content</th>
									<td colspan="6" style="font-size: 15; <?= $rcek1['stat_fib'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php echo $cott; ?>
										<?php echo $poly; ?>
										<?php echo $ela; ?>
									</td>
								</tr>
							<?php } ?>
								<!--<?php if ($rcek1['fibercontent'] != "" or $rcekR['rfibercontent'] != "" or $rcekD['dfibercontent'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Fiber Content</th>
									<td colspan="6" style="font-size: 15;">
									<?php if ($rcek1['stat_fib'] == "RANDOM") {
															echo $rcekR['rfibercontent'];
														} else {
															echo $rcek1['fibercontent'];
														} ?>
								</td>
								</tr>
								<?php } ?>-->
							<?php if ($rcek1['fc_wpi'] != "" or $rcek1['fc_cpi'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Fabric Count</th>
									<td colspan="6" style="font-size: 15px; <?= $rcek1['stat_fc'] == "FAIL" ? 'color: red;' : '' ?>">
										W:
										<?php if ($rcek1['stat_fc'] == "RANDOM") {
											echo $rcekR['rfc_wpi'];
										} else {
											echo $rcek1['fc_wpi'];
										} ?>
										C:
										<?php if ($rcek1['stat_fc'] == "RANDOM") {
											echo $rcekR['rfc_cpi'];
										} else {
											echo $rcek1['fc_cpi'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['f_weight'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Fabric Weight</th>
									<td colspan="6" style="font-size: 15px; <?= $rcek1['stat_fwss2'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss2'] == "RANDOM") {
											echo $rcekR['rf_weight']; ?> gr/m<sup>2</sup> =
											<?php echo round($rcekR['rf_weight'] / 33.906, 1); ?> oz/yd<sup>2</sup>
										<?php } ?>
										<!-- <?php if ($rcek1['stat_fwss2'] == "DISPOSISI") {
													echo $rcekD['df_weight']; ?> gr/m<sup>2</sup> = <?php echo round($rcekD['df_weight'] / 33.906, 1); ?> oz/yd<sup>2</sup> <?php } ?> -->
										<?php if ($rcek1['stat_fwss2'] != "DISPOSISI" or $rcek1['stat_fwss2'] != "RANDOM") {
											echo $rcek1['f_weight']; ?> gr/m<sup>2</sup> =
											<?php echo round($rcek1['f_weight'] / 33.906, 1); ?> oz/yd<sup>2</sup>
										<?php } ?>
										<!--<?php echo $rcek1['f_weight']; ?> gr/m<sup>2</sup> = <?php echo round($rcek1['f_weight'] / 33.906, 1); ?> oz/yd<sup>2</sup>-->
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['f_width'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Fabric Width</th>
									<td colspan="6" style="<?= $rcek1['stat_fwss3'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss3'] == "RANDOM") {
											echo $rcekR['rf_width'];
										} else {
											echo $rcek1['f_width'];
										} ?>''
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['bow'] != "" and $rcek1['skew'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Bow &amp; Skew(%)</th>
									<td colspan="6" style="font-size: 15px; <?= $stat_bsk['stat_curling'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_bsk'] == "RANDOM") {
											echo $rcekR['rbow'];
										} else {
											echo $rcek1['bow'];
										} ?> &amp;
										<?php if ($rcek1['stat_bsk'] == "RANDOM") {
											echo $rcekR['rskew'];
										} else {
											echo $rcek1['skew'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['shrinkage_l1'] != "" or $rcek1['shrinkage_l2'] != "" or $rcek1['shrinkage_l3'] != "" or $rcek1['shrinkage_l4'] != "" or $rcek1['shrinkage_l5'] != "" or $rcek1['shrinkage_l6'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Shrinkage Length(%)</th>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rshrinkage_l1'];
										} else {
											echo $rcek1['shrinkage_l1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rshrinkage_l2'];
										} else {
											echo $rcek1['shrinkage_l2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rshrinkage_l3'];
										} else {
											echo $rcek1['shrinkage_l3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rshrinkage_l4'];
										} else {
											echo $rcek1['shrinkage_l4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rshrinkage_l5'];
										} else {
											echo $rcek1['shrinkage_l5'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rshrinkage_l6'];
										} else {
											echo $rcek1['shrinkage_l6'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['shrinkage_w1'] != "" or $rcek1['shrinkage_w2'] != "" or $rcek1['shrinkage_w3'] != "" or $rcek1['shrinkage_w4'] != "" or $rcek1['shrinkage_w5'] != "" or $rcek1['shrinkage_w6'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Shrinkage Width(%)</th>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rshrinkage_w1'];
										} else {
											echo $rcek1['shrinkage_w1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rshrinkage_w2'];
										} else {
											echo $rcek1['shrinkage_w2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rshrinkage_w3'];
										} else {
											echo $rcek1['shrinkage_w3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rshrinkage_w4'];
										} else {
											echo $rcek1['shrinkage_w4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rshrinkage_w5'];
										} else {
											echo $rcek1['shrinkage_w5'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rshrinkage_w6'];
										} else {
											echo $rcek1['shrinkage_w6'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['spirality1'] != "" or $rcek1['spirality2'] != "" or $rcek1['spirality3'] != "" or $rcek1['spirality4'] != "" or $rcek1['spirality5'] != "" or $rcek1['spirality6'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Spirality(%)</th>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rspirality1'];
										} else {
											echo $rcek1['spirality1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rspirality2'];
										} else {
											echo $rcek1['spirality2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rspirality3'];
										} else {
											echo $rcek1['spirality3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rspirality4'];
										} else {
											echo $rcek1['spirality4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rspirality5'];
										} else {
											echo $rcek1['spirality5'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rspirality6'];
										} else {
											echo $rcek1['spirality6'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['apperss_ch1'] != "" or $rcek1['apperss_ch2'] != "" or $rcek1['apperss_ch3'] != "") { ?>
								<tr>
									<th style="font-size: 15px;" align="left">Apperance</th>
									<th style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rapperss_ch1'];
										} else {
											echo $rcek1['apperss_ch1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rapperss_ch2'];
										} else {
											echo $rcek1['apperss_ch2'];
										} ?>
									</td>
									<td colspan="4" style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rapperss_ch3'];
										} else {
											echo $rcek1['apperss_ch3'];
										} ?>
									</td>
								</tr>
								<tr>
									<th style="font-size: 15px;" align="left">Colorchange</th>
									<th style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rapperss_cc1'];
										} else {
											echo $rcek1['apperss_cc1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rapperss_cc2'];
										} else {
											echo $rcek1['apperss_cc2'];
										} ?>
									</td>
									<td colspan="4" style="font-size: 15px; <?= $rcek1['stat_fwss'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_fwss'] == "RANDOM") {
											echo $rcekR['rapperss_cc3'];
										} else {
											echo $rcek1['apperss_cc3'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['pm_f1'] != "" or $rcek1['pm_f2'] != "" or $rcek1['pm_f3'] != "" or $rcek1['pm_f4'] != "" or $rcek1['pm_f5'] != "") { ?>
								<tr>
									<th rowspan="2" align="left" style="font-size: 15px;">Pilling Martindle</th>
									<th style="font-size: 15px;">Face</th>
									<td style="font-size: 15px; <?= $rcek1['stat_pm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pm'] == "RANDOM") {
											echo $rcekR['rpm_f1'];
										} else {
											echo $rcek1['pm_f1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pm'] == "RANDOM") {
											echo $rcekR['rpm_f2'];
										} else {
											echo $rcek1['pm_f2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pm'] == "RANDOM") {
											echo $rcekR['rpm_f3'];
										} else {
											echo $rcek1['pm_f3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pm'] == "RANDOM") {
											echo $rcekR['rpm_f4'];
										} else {
											echo $rcek1['pm_f4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pm'] == "RANDOM") {
											echo $rcekR['rpm_f5'];
										} else {
											echo $rcek1['pm_f5'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['pm_b1'] != "" or $rcek1['pm_b2'] != "" or $rcek1['pm_b3'] != "" or $rcek1['pm_b4'] != "" or $rcek1['pm_b5'] != "" or $rcek1['pm_f1'] != "") { ?>
								<tr>
									<th style="font-size: 15px;">Back</th>
									<td style="font-size: 15px; <?= $rcek1['stat_pm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pm'] == "RANDOM") {
											echo $rcekR['rpm_b1'];
										} else {
											echo $rcek1['pm_b1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pm'] == "RANDOM") {
											echo $rcekR['rpm_b2'];
										} else {
											echo $rcek1['pm_b2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pm'] == "RANDOM") {
											echo $rcekR['rpm_b3'];
										} else {
											echo $rcek1['pm_b3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pm'] == "RANDOM") {
											echo $rcekR['rpm_b4'];
										} else {
											echo $rcek1['pm_b4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pm'] == "RANDOM") {
											echo $rcekR['rpm_b5'];
										} else {
											echo $rcek1['pm_b5'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['pl_f1'] != "" or $rcek1['pl_f2'] != "" or $rcek1['pl_f3'] != "" or $rcek1['pl_f4'] != "" or $rcek1['pl_f5'] != "") { ?>
								<tr>
									<th rowspan="2" align="left" style="font-size: 15px;">Pilling Locus</th>
									<th style="font-size: 15px;">Face</th>
									<td style="font-size: 15px; <?= $rcek1['stat_pl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pl'] == "RANDOM") {
											echo $rcekR['rpl_f1'];
										} else {
											echo $rcek1['pl_f1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pl'] == "RANDOM") {
											echo $rcekR['rpl_f2'];
										} else {
											echo $rcek1['pl_f2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pl'] == "RANDOM") {
											echo $rcekR['rpl_f3'];
										} else {
											echo $rcek1['pl_f3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pl'] == "RANDOM") {
											echo $rcekR['rpl_f4'];
										} else {
											echo $rcek1['pl_f4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pl'] == "RANDOM") {
											echo $rcekR['rpl_f5'];
										} else {
											echo $rcek1['pl_f5'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['pl_b1'] != "" or $rcek1['pl_b2'] != "" or $rcek1['pl_b3'] != "" or $rcek1['pl_b4'] != "" or $rcek1['pl_b5'] != "" or $rcek1['pl_f1'] != "") { ?>
								<tr>
									<th style="font-size: 15px;">Back</th>
									<td style="font-size: 15px; <?= $rcek1['stat_pl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pl'] == "RANDOM") {
											echo $rcekR['rpl_b1'];
										} else {
											echo $rcek1['pl_b1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pl'] == "RANDOM") {
											echo $rcekR['rpl_b2'];
										} else {
											echo $rcek1['pl_b2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pl'] == "RANDOM") {
											echo $rcekR['rpl_b3'];
										} else {
											echo $rcek1['pl_b3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pl'] == "RANDOM") {
											echo $rcekR['rpl_b4'];
										} else {
											echo $rcek1['pl_b4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pl'] == "RANDOM") {
											echo $rcekR['rpl_b5'];
										} else {
											echo $rcek1['pl_b5'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['pb_f1'] != "") { ?>
								<tr>
									<th rowspan="2" align="left" style="font-size: 15px;">Pilling Box</th>
									<th style="font-size: 15px;">Face</th>
									<td style="font-size: 15px; <?= $rcek1['stat_pb'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pb'] == "RANDOM") {
											echo $rcekR['rpb_f1'];
										} else {
											echo $rcek1['pb_f1'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['pb_b1'] != "") { ?>
								<tr>
									<th style="font-size: 15px;">Back</th>
									<td style="font-size: 15px; <?= $rcek1['stat_pb'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pb'] == "RANDOM") {
											echo $rcekR['rpb_b1'];
										} else {
											echo $rcek1['pb_b1'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['prt_f1'] != "" or $rcek1['prt_f2'] != "" or $rcek1['prt_f3'] != "" or $rcek1['prt_f4'] != "" or $rcek1['prt_f5'] != "" or $rcek1['prt_b1'] != "") { ?>
								<tr>
									<th rowspan="2" align="left" style="font-size: 15px;">Pilling Random Tumbler</th>
									<th style="font-size: 15px;">Face</th>
									<td style="font-size: 15px; <?= $rcek1['stat_prt'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_prt'] == "RANDOM") {
											echo $rcekR['rprt_f1'];
										} else {
											echo $rcek1['prt_f1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_prt'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_prt'] == "RANDOM") {
											echo $rcekR['rprt_f2'];
										} else {
											echo $rcek1['prt_f2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_prt'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_prt'] == "RANDOM") {
											echo $rcekR['rprt_f3'];
										} else {
											echo $rcek1['prt_f3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_prt'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_prt'] == "RANDOM") {
											echo $rcekR['rprt_f4'];
										} else {
											echo $rcek1['prt_f4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_prt'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_prt'] == "RANDOM") {
											echo $rcekR['rprt_f5'];
										} else {
											echo $rcek1['prt_f5'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['prt_b1'] != "" or $rcek1['prt_b2'] != "" or $rcek1['prt_b3'] != "" or $rcek1['prt_b4'] != "" or $rcek1['prt_b5'] != "") { ?>
								<tr>

									<th style="font-size: 15px;">Back</th>
									<td style="font-size: 15px; <?= $rcek1['stat_prt'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_prt'] == "RANDOM") {
											echo $rcekR['rprt_b1'];
										} else {
											echo $rcek1['prt_b1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_prt'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_prt'] == "RANDOM") {
											echo $rcekR['rprt_b2'];
										} else {
											echo $rcek1['prt_b2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_prt'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_prt'] == "RANDOM") {
											echo $rcekR['rprt_b3'];
										} else {
											echo $rcek1['prt_b3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_prt'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_prt'] == "RANDOM") {
											echo $rcekR['rprt_b4'];
										} else {
											echo $rcek1['prt_b4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_prt'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_prt'] == "RANDOM") {
											echo $rcekR['rprt_b5'];
										} else {
											echo $rcek1['prt_b5'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['abration'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Abration</th>
									<td colspan="6" style="font-size: 15px; <?= $rcek1['stat_abr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_abr'] == "RANDOM") {
											echo $rcekR['rabration'];
										} else {
											echo $rcek1['abration'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['sm_l1'] != "" or $rcek1['sm_l2'] != "" or $rcek1['sm_l3'] != "" or $rcek1['sm_l4'] != "") { ?>
								<tr>
									<th rowspan="2" align="left" style="font-size: 15px;">Snagging Mace</th>
									<th style="font-size: 15px;">Len</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sm'] == "RANDOM") {
											echo $rcekR['rsm_l1'];
										} else {
											echo $rcek1['sm_l1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sm'] == "RANDOM") {
											echo $rcekR['rsm_l2'];
										} else {
											echo $rcek1['sm_l2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sm'] == "RANDOM") {
											echo $rcekR['rsm_l3'];
										} else {
											echo $rcek1['sm_l3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sm'] == "RANDOM") {
											echo $rcekR['rsm_l4'];
										} else {
											echo $rcek1['sm_l4'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['sm_w1'] != "" or $rcek1['sm_w2'] != "" or $rcek1['sm_w3'] != "" or $rcek1['sm_w4'] != "") { ?>
								<tr>
									<th style="font-size: 15px;">Wid</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sm'] == "RANDOM") {
											echo $rcekR['rsm_w1'];
										} else {
											echo $rcek1['sm_w1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sm'] == "RANDOM") {
											echo $rcekR['rsm_w2'];
										} else {
											echo $rcek1['sm_w2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sm'] == "RANDOM") {
											echo $rcekR['rsm_w3'];
										} else {
											echo $rcek1['sm_w3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sm'] == "RANDOM") {
											echo $rcekR['rsm_w4'];
										} else {
											echo $rcek1['sm_w4'];
										} ?>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['sp_grdl1'] != "" or $rcek1['sp_clsl1'] != "" or $rcek1['sp_shol1'] != "" or $rcek1['sp_medl1'] != "" or $rcek1['sp_lonl1'] != "" or $rcek1['sp_grdl2'] != "" or $rcek1['sp_clsl2'] != "" or $rcek1['sp_shol2'] != "" or $rcek1['sp_medl2'] != "" or $rcek1['sp_lonl2'] != "" or $rcek1['sp_grdw1'] != "" or $rcek1['sp_clsw1'] != "" or $rcek1['sp_show1'] != "" or $rcek1['sp_medw1'] != "" or $rcek1['sp_lonw1'] != "" or $rcek1['sp_grdw2'] != "" or $rcek1['sp_clsw2'] != "" or $rcek1['sp_show2'] != "" or $rcek1['sp_medw2'] != "" or $rcek1['sp_lonw2'] != "") {
								if ($rcek1['sp_grdl1'] != "" or $rcek1['sp_clsl1'] != "" or $rcek1['sp_shol1'] != "" or $rcek1['sp_medl1'] != "" or $rcek1['sp_lonl1'] != "") {
									$rp1 = "1";
								} else {
									$rp1 = "0";
								}
								if ($rcek1['sp_grdl2'] != "" or $rcek1['sp_clsl2'] != "" or $rcek1['sp_shol2'] != "" or $rcek1['sp_medl2'] != "" or $rcek1['sp_lonl2'] != "") {
									$rp2 = "1";
								} else {
									$rp2 = "0";
								}
								if ($rcek1['sp_grdw1'] != "" or $rcek1['sp_clsw1'] != "" or $rcek1['sp_show1'] != "" or $rcek1['sp_medw1'] != "" or $rcek1['sp_lonw1'] != "") {
									$rp3 = "1";
								} else {
									$rp3 = "0";
								}
								if ($rcek1['sp_grdw2'] != "" or $rcek1['sp_clsw2'] != "" or $rcek1['sp_show2'] != "" or $rcek1['sp_medw2'] != "" or $rcek1['sp_lonw2'] != "") {
									$rp4 = "1";
								} else {
									$rp4 = "0";
								}
								$rowspan = $rp1 + $rp2 + $rp3 + $rp4 + 1; ?>
								<tr>
									<th rowspan="5" align="left" style="font-size: 15px;">Snagging POD</th>
									<th style="font-size: 15px;">SRT</th>
									<td style="font-size: 15px;"><strong>Grd</strong></td>
									<td style="font-size: 15px;"><strong>Cls</strong></td>
									<td style="font-size: 15px;"><strong>Sho</strong></td>
									<td style="font-size: 15px;"><strong>Med</strong></td>
									<td style="font-size: 15px;"><strong>Long</strong></td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['sp_grdl1'] != "" or $rcek1['sp_clsl1'] != "" or $rcek1['sp_shol1'] != "" or $rcek1['sp_medl1'] != "" or $rcek1['sp_lonl1'] != "") { ?>
								<tr>
									<th style="font-size: 15px;">L1</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_grdl1'];
										} else {
											echo $rcek1['sp_grdl1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_clsl1'];
										} else {
											echo $rcek1['sp_clsl1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_shol1'];
										} else {
											echo $rcek1['sp_shol1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_medl1'];
										} else {
											echo $rcek1['sp_medl1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_lonl1'];
										} else {
											echo $rcek1['sp_lonl1'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['sp_grdl2'] != "" or $rcek1['sp_clsl2'] != "" or $rcek1['sp_shol2'] != "" or $rcek1['sp_medl2'] != "" or $rcek1['sp_lonl2'] != "") { ?>
								<tr>
									<th style="font-size: 15px;">L2</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_grdl2'];
										} else {
											echo $rcek1['sp_grdl2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_clsl2'];
										} else {
											echo $rcek1['sp_clsl2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_shol2'];
										} else {
											echo $rcek1['sp_shol2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_medl2'];
										} else {
											echo $rcek1['sp_medl2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_lonl2'];
										} else {
											echo $rcek1['sp_lonl2'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['sp_grdw1'] != "" or $rcek1['sp_clsw1'] != "" or $rcek1['sp_show1'] != "" or $rcek1['sp_medw1'] != "" or $rcek1['sp_lonw1'] != "") { ?>
								<tr>
									<th style="font-size: 15px;">W1</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_grdw1'];
										} else {
											echo $rcek1['sp_grdw1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_clsw1'];
										} else {
											echo $rcek1['sp_clsw1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_show1'];
										} else {
											echo $rcek1['sp_show1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_medw1'];
										} else {
											echo $rcek1['sp_medw1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_lonw1'];
										} else {
											echo $rcek1['sp_lonw1'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['sp_grdw2'] != "" or $rcek1['sp_clsw2'] != "" or $rcek1['sp_show2'] != "" or $rcek1['sp_medw2'] != "" or $rcek1['sp_lonw2'] != "") { ?>
								<tr>
									<th style="font-size: 15px;">W2</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_grdw2'];
										} else {
											echo $rcek1['sp_grdw2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_clsw2'];
										} else {
											echo $rcek1['sp_clsw2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_show2'];
										} else {
											echo $rcek1['sp_show2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_medw2'];
										} else {
											echo $rcek1['sp_medw2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sp'] == "RANDOM") {
											echo $rcekR['rsp_lonw2'];
										} else {
											echo $rcek1['sp_lonw2'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['sb_l1'] != "") { ?>
								<tr>
									<th rowspan="2" align="left" style="font-size: 15px;">Bean Bag</th>
									<th style="font-size: 15px;">Len</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sb'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sb'] == "RANDOM") {
											echo $rcekR['rsb_l1'];
										} else {
											echo $rcek1['sb_l1'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['sb_w1'] != "") { ?>
								<tr>
									<th style="font-size: 15px;">Wid</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sb'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sb'] == "RANDOM") {
											echo $rcekR['rsb_w1'];
										} else {
											echo $rcek1['sb_w1'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['bs_instron'] != "" or $rcek1['bs_mullen'] != "" or $rcek1['bs_tru'] != "") { ?>
								<tr>
									<th align="left" style="font-size: 15px;">Bursting Strength</th>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px; <?= $rcek1['stat_bs'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_bs'] == "RANDOM") {
											echo $rcekR['rbs_instron'];
										} else {
											echo $rcek1['bs_instron'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_bs'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_bs'] == "RANDOM") {
											echo $rcekR['rbs_mullen'];
										} else {
											echo $rcek1['bs_mullen'];
										} ?>
									</td>
									<td colspan="4" style="font-size: 15px; <?= $rcek1['stat_bs'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_bs'] == "RANDOM") {
											echo $rcekR['rbs_tru'];
										} else {
											echo $rcek1['bs_tru'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['thick1'] != "" or $rcek1['thick1'] != "" or $rcek1['thick1'] != "" or $rcek1['thickav'] != "") { ?>
								<tr>
									<th align="left" style="font-size: 15px;">Thickness(mm)</th>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px; <?= $rcek1['stat_th'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_th'] == "RANDOM") {
											echo $rcekR['rthick1'];
										} else {
											echo $rcek1['thick1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_th'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_th'] == "RANDOM") {
											echo $rcekR['rthick2'];
										} else {
											echo $rcek1['thick2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_th'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_th'] == "RANDOM") {
											echo $rcekR['rthick3'];
										} else {
											echo $rcek1['thick3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_th'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_th'] == "RANDOM") {
											echo $rcekR['rthickav'];
										} else {
											echo $rcek1['thickav'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['stretch_l1'] != "" or $rcek1['stretch_l2'] != "" or $rcek1['stretch_l3'] != "" or $rcek1['stretch_l4'] != "" or $rcek1['stretch_l5'] != "" or $rcek1['stretch_w1'] != "" or $rcek1['stretch_w2'] != "" or $rcek1['stretch_w3'] != "" or $rcek1['stretch_w4'] != "" or $rcek1['stretch_w5'] != "") { ?>
								<tr>
									<th rowspan="3" align="left" style="font-size: 15px;">Stretch(%)</th>
									<th align="left" style="font-size: 15px;">Load</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rload_stretch'];
										} else {
											echo $rcek1['load_stretch'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Len</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rstretch_l1'];
										} else {
											echo $rcek1['stretch_l1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rstretch_l2'];
										} else {
											echo $rcek1['stretch_l2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rstretch_l3'];
										} else {
											echo $rcek1['stretch_l3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rstretch_l4'];
										} else {
											echo $rcek1['stretch_l4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rstretch_l5'];
										} else {
											echo $rcek1['stretch_l5'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Wid</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rstretch_w1'];
										} else {
											echo $rcek1['stretch_w1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rstretch_w2'];
										} else {
											echo $rcek1['stretch_w2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rstretch_w3'];
										} else {
											echo $rcek1['stretch_w3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rstretch_w4'];
										} else {
											echo $rcek1['stretch_w4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rstretch_w5'];
										} else {
											echo $rcek1['stretch_w5'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['recover_l1'] != "" or $rcek1['recover_l2'] != "" or $rcek1['recover_l3'] != "" or $rcek1['recover_l4'] != "" or $rcek1['recover_l5'] != "" or $rcek1['recover_w1'] != "" or $rcek1['recover_w2'] != "" or $rcek1['recover_w3'] != "" or $rcek1['recover_w4'] != "" or $rcek1['recover_w5'] != "") { ?>
								<tr>
									<th rowspan="2" align="left" style="font-size: 15px;">Recovery(%)</th>
									<th align="left" style="font-size: 15px;">Len</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rrecover_l1'];
										} else {
											echo $rcek1['recover_l1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rrecover_l2'];
										} else {
											echo $rcek1['recover_l2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rrecover_l3'];
										} else {
											echo $rcek1['recover_l3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rrecover_l4'];
										} else {
											echo $rcek1['recover_l4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rrecover_l5'];
										} else {
											echo $rcek1['recover_l5'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Wid</th>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rrecover_w1'];
										} else {
											echo $rcek1['recover_w1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rrecover_w2'];
										} else {
											echo $rcek1['recover_w2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rrecover_w3'];
										} else {
											echo $rcek1['recover_w3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rrecover_w4'];
										} else {
											echo $rcek1['recover_w4'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_sr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sr'] == "RANDOM") {
											echo $rcekR['rrecover_w5'];
										} else {
											echo $rcek1['recover_w5'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['growth_l1'] != "" or $rcek1['growth_l2'] != "") { ?>
								<tr>
									<th rowspan="2" align="left" style="font-size: 15px;">Growth(%)</th>
									<th align="left" style="font-size: 15px;">Len</th>
									<td style="font-size: 15px; <?= $rcek1['stat_gr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_gr'] == "RANDOM") {
											echo $rcekR['rgrowth_l1'];
										} else {
											echo $rcek1['growth_l1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_gr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_gr'] == "RANDOM") {
											echo $rcekR['rgrowth_l2'];
										} else {
											echo $rcek1['growth_l2'];
										} ?>
									</td>
									<td colspan="4" style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['growth_w1'] != "" or $rcek1['growth_w2'] != "") { ?>
								<tr>
									<th align="left" style="font-size: 15px;">Wid</th>
									<td style="font-size: 15px; <?= $rcek1['stat_gr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_gr'] == "RANDOM") {
											echo $rcekR['rgrowth_w1'];
										} else {
											echo $rcek1['growth_w1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_gr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_gr'] == "RANDOM") {
											echo $rcekR['rgrowth_w2'];
										} else {
											echo $rcek1['growth_w2'];
										} ?>
									</td>
									<td colspan="4" style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['rec_growth_l1'] != "" or $rcek1['rec_growth_l2'] != "") { ?>
								<tr>
									<th rowspan="2" align="left" style="font-size: 15px;">Recovery Growth</th>
									<th align="left" style="font-size: 15px;">Len</th>
									<td style="font-size: 15px; <?= $rcek1['stat_gr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_gr'] == "RANDOM") {
											echo $rcekR['rrec_growth_l1'];
										} else {
											echo $rcek1['rec_growth_l1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_gr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_gr'] == "RANDOM") {
											echo $rcekR['rrec_growth_l2'];
										} else {
											echo $rcek1['rec_growth_l2'];
										} ?>
									</td>
									<td colspan="4" style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Wid</th>
									<td style="font-size: 15px; <?= $rcek1['stat_gr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_gr'] == "RANDOM") {
											echo $rcekR['rrec_growth_w1'];
										} else {
											echo $rcek1['rec_growth_w1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_gr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_gr'] == "RANDOM") {
											echo $rcekR['rrec_growth_w2'];
										} else {
											echo $rcek1['rec_growth_w2'];
										} ?>
									</td>
									<td colspan="4" style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['apper_ch1'] != "" or $rcek1['apper_ch2'] != "" or $rcek1['apper_ch3'] != "" or $rcek1['apper_pf1'] != "" or $rcek1['apper_pf2'] != "" or $rcek1['apper_pb1'] != "" or $rcek1['apper_pb2'] != "" or $rcek1['apper_pb2'] != "" or $rcek1['apper_st'] != "" or $rcek1['apper_cc1'] != "" or $rcek1['apper_cc2'] != "" or $rcek1['apper_cc3'] != "") { ?>
								<tr>
									<th rowspan="7" align="left" style="font-size: 15px;">Appearance</th>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_ch1'];
										} else {
											echo $rcek1['apper_ch1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_ch2'];
										} else {
											echo $rcek1['apper_ch2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_ch3'];
										} else {
											echo $rcek1['apper_ch3'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_cc1'];
										} else {
											echo $rcek1['apper_cc1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['rapper_cc2'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_cc2'];
										} else {
											echo $rcek1['apper_cc2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_cc3'];
										} else {
											echo $rcek1['apper_cc3'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_st'];
										} else {
											echo $rcek1['apper_st'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_st2'];
										} else {
											echo $rcek1['apper_st2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_st3'];
										} else {
											echo $rcek1['apper_st3'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Face</th>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_pf1'];
										} else {
											echo $rcek1['apper_pf1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_pf2'];
										} else {
											echo $rcek1['apper_pf2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_pf3'];
										} else {
											echo $rcek1['apper_pf3'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Back</th>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_pb1'];
										} else {
											echo $rcek1['apper_pb1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_pb2'];
										} else {
											echo $rcek1['apper_pb2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_pb3'];
										} else {
											echo $rcek1['apper_pb3'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th>&nbsp;</th>
									<td><strong>Ace</strong></td>
									<td><strong>Cot</strong></td>
									<td><strong>Nyl</strong></td>
									<td><strong>Poly</strong></td>
									<td><strong>Acr</strong></td>
									<td><strong>Wool</strong></td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_acetate'];
										} else {
											echo $rcek1['apper_acetate'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_cotton'];
										} else {
											echo $rcek1['apper_cotton'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_nylon'];
										} else {
											echo $rcek1['apper_nylon'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_poly'];
										} else {
											echo $rcek1['apper_poly'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_acrylic'];
										} else {
											echo $rcek1['apper_acrylic'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ap'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ap'] == "RANDOM") {
											echo $rcekR['rapper_wool'];
										} else {
											echo $rcek1['apper_wool'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['h_shrinkage_l1'] != "" or $rcek1['h_shrinkage_w1'] != "" or $rcek1['h_shrinkage_grd'] != "") { ?>
								<tr>
									<th rowspan="3" align="left" style="font-size: 15px;">Heat Shrinkage</th>
									<th align="left" style="font-size: 15px;">Len</th>
									<td style="font-size: 15px; <?= $rcek1['stat_hs'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_hs'] == "RANDOM") {
											echo $rcekR['rh_shrinkage_l1'];
										} else {
											echo $rcek1['h_shrinkage_l1'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Wid</th>
									<td style="font-size: 15px; <?= $rcek1['stat_hs'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_hs'] == "RANDOM") {
											echo $rcekR['rh_shrinkage_w1'];
										} else {
											echo $rcek1['h_shrinkage_w1'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Grade</th>
									<td style="font-size: 15px; <?= $rcek1['stat_hs'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_hs'] == "RANDOM") {
											echo $rcekR['rh_shrinkage_grd'];
										} else {
											echo $rcek1['h_shrinkage_grd'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['fibre_transfer'] != "" or $rcek1['fibre_grade'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Fibre/Fuzz</th>
									<td style="font-size: 15px; <?= $rcek1['stat_ff'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ff'] == "RANDOM") {
											echo $rcekR['rfibre_transfer'];
										} else {
											echo $rcek1['fibre_transfer'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_ff'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ff'] == "RANDOM") {
											echo $rcekR['rfibre_grade'];
										} else {
											echo $rcek1['fibre_grade'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['odour'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Odour</th>
									<td colspan="6" style="font-size: 15px; <?= $rcek1['stat_odour'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_odour'] == "RANDOM") {
											echo $rcekR['rodour'];
										} else {
											echo $rcek1['odour'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['curling'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Curling</th>
									<td colspan="6" style="font-size: 15px; <?= $rcek1['stat_curling'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_curling'] == "RANDOM") {
											echo $rcekR['rcurling'];
										} else {
											echo $rcek1['curling'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['nedle'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Nedle</th>
									<td colspan="6" style="font-size: 15px; <?= $rcek1['stat_nedle'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_nedle'] == "RANDOM") {
											echo $rcekR['rnedle'];
										} else {
											echo $rcek1['nedle'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['wrinkle'] != "" || $rcek1['wrinkle1'] != "" || $rcek1['wrinkle2'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Wrinkle</th>
									<td colspan="6" style="font-size: 15px; <?= $rcek1['stat_wrinkle'] == "FAIL" ? 'color: red;' : '' ?>">
										<?= $rcek1['wrinkle']; ?>
									</td>
									<td colspan="6" style="font-size: 15px; <?= $rcek1['stat_wrinkle1'] == "FAIL" ? 'color: red;' : '' ?>">
										<?= $rcek1['wrinkle2'] ?? $rcek1['wrinkle1'] ?>
									</td>
								</tr>
							<?php } ?>
						</table>
					</td>
					<td width="187" align="left" valign="top" style="height: 1.6in;">FUNCTIONAL
						<hr>
						<table class="table">
							<?php if ($rcek1['wick_l1'] != "" or $rcek1['wick_l2'] != "" or $rcek1['wick_l3'] != "" or $rcek1['wick_w1'] != "" or $rcek1['wick_w2'] != "" or $rcek1['wick_w3'] != "") { ?>
								<tr>
									<th rowspan="4" align="left" style="width:45%; font-size: 15px;">Wicking(cm)</th>
									<th align="left" style="font-size: 15px;">Len</th>
									<th align="left" style="font-size: 15px;">Beforewash</th>
									<td style="font-size: 15px; <?= $rcek1['stat_wic'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wic'] == "RANDOM") {
											echo $rcekR['rwick_l1'];
										} else {
											echo $rcek1['wick_l1'];
										} ?>
									</td>
									<!--<td style="font-size: 15px;"><?php if ($rcek1['stat_wic'] == "RANDOM") {
																		echo $rcekR['rwick_l2'];
																	} else {
																		echo $rcek1['wick_l2'];
																	} ?></td>
            <td style="font-size: 15px;"><?php if ($rcek1['stat_wic'] == "RANDOM") {
											echo $rcekR['rwick_l3'];
										} else {
											echo $rcek1['wick_l3'];
										} ?></td>-->
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<th align="left" style="font-size: 15px;">Afterwash</th>
									<td style="font-size: 15px; <?= $rcek1['stat_wic2'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wic2'] == "RANDOM") {
											echo $rcekR['rwick_l2'];
										} else {
											echo $rcek1['wick_l2'];
										} ?>
									</td>
									<!--<td style="font-size: 15px;"><?php if ($rcek1['stat_wic'] == "RANDOM") {
																		echo $rcekR['rwick_w2'];
																	} else {
																		echo $rcek1['wick_w2'];
																	} ?></td>
            <td style="font-size: 15px;"><?php if ($rcek1['stat_wic'] == "RANDOM") {
											echo $rcekR['rwick_w3'];
										} else {
											echo $rcek1['wick_w3'];
										} ?></td>-->
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Wid</th>
									<th align="left" style="font-size: 15px;">Beforewash</th>
									<td style="font-size: 15px; <?= $rcek1['stat_wic1'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wic1'] == "RANDOM") {
											echo $rcekR['rwick_w1'];
										} else {
											echo $rcek1['wick_w1'];
										} ?>
									</td>
									<!--<td style="font-size: 15px;"><?php if ($rcek1['stat_wic'] == "RANDOM") {
																		echo $rcekR['rwick_l2'];
																	} else {
																		echo $rcek1['wick_l2'];
																	} ?></td>
            <td style="font-size: 15px;"><?php if ($rcek1['stat_wic'] == "RANDOM") {
											echo $rcekR['rwick_l3'];
										} else {
											echo $rcek1['wick_l3'];
										} ?></td>-->
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<th align="left" style="font-size: 15px;">Afterwash</th>
									<td style="font-size: 15px; <?= $rcek1['stat_wic3'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wic3'] == "RANDOM") {
											echo $rcekR['rwick_w2'];
										} else {
											echo $rcek1['wick_w2'];
										} ?>
									</td>
									<!--<td style="font-size: 15px;"><?php if ($rcek1['stat_wic'] == "RANDOM") {
																		echo $rcekR['rwick_w2'];
																	} else {
																		echo $rcek1['wick_w2'];
																	} ?></td>
            <td style="font-size: 15px;"><?php if ($rcek1['stat_wic'] == "RANDOM") {
											echo $rcekR['rwick_w3'];
										} else {
											echo $rcek1['wick_w3'];
										} ?></td>-->
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['absor_f1'] != "" or $rcek1['absor_f2'] != "" or $rcek1['absor_f3'] != "" or $rcek1['absor_b1'] != "" or $rcek1['absor_b2'] != "" or $rcek1['absor_b3'] != "") { ?>
								<tr>
									<th rowspan="4" align="left" style="font-size: 15px;">Absorbency(second/sec)</th>
									<th align="left" style="font-size: 15px;">Original</th>
									<th align="left" style="font-size: 15px; <?= $rcek1['stat_abs'] == "FAIL" ? 'color: red;' : '' ?>">Face</th>
									<!--<td style="font-size: 15;"><?php if ($rcek1['stat_abs'] == "RANDOM") {
																		echo $rcekR['rabsor_f1'];
																	} else {
																		echo $rcek1['absor_f1'];
																	} ?></td>-->
									<td style="font-size: 15; <?= $rcek1['stat_abs'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_abs'] == "RANDOM") {
											echo $rcekR['rabsor_f2'];
										} else {
											echo $rcek1['absor_f2'];
										} ?>
									</td>
									<!--<td style="font-size: 15;"><?php if ($rcek1['stat_abs'] == "RANDOM") {
																		echo $rcekR['rabsor_f3'];
																	} else {
																		echo $rcek1['absor_f3'];
																	} ?></td>-->
									<td style="font-size: 15;">&nbsp;</td>
									<td style="font-size: 15;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<th align="left" style="font-size: 15px;">Back</th>
									<td style="font-size: 15; <?= $rcek1['stat_abs'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_abs'] == "RANDOM") {
											echo $rcekR['rabsor_f1'];
										} else {
											echo $rcek1['absor_f1'];
										} ?>
									</td>
									<!--<td style="font-size: 15;"><?php if ($rcek1['stat_abs'] == "RANDOM") {
																		echo $rcekR['rabsor_b2'];
																	} else {
																		echo $rcek1['absor_b2'];
																	} ?></td>
          <td style="font-size: 15;"><?php if ($rcek1['stat_abs'] == "RANDOM") {
											echo $rcekR['rabsor_b3'];
										} else {
											echo $rcek1['absor_b3'];
										} ?></td>-->
									<td style="font-size: 15;">&nbsp;</td>
									<td style="font-size: 15;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Afterwash</th>
									<th align="left" style="font-size: 15px;">Face</th>
									<!--<td style="font-size: 15;"><?php if ($rcek1['stat_abs1'] == "RANDOM") {
																		echo $rcekR['rabsor_b2'];
																	} else {
																		echo $rcek1['absor_b2'];
																	} ?></td>-->
									<td style="font-size: 15; <?= $rcek1['stat_abs1'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_abs1'] == "RANDOM") {
											echo $rcekR['rabsor_b2'];
										} else {
											echo $rcek1['absor_b2'];
										} ?>
									</td>
									<!--<td style="font-size: 15;"><?php if ($rcek1['stat_abs'] == "RANDOM") {
																		echo $rcekR['rabsor_f3'];
																	} else {
																		echo $rcek1['absor_f3'];
																	} ?></td>-->
									<td style="font-size: 15;">&nbsp;</td>
									<td style="font-size: 15;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<th align="left" style="font-size: 15px;">Back</th>
									<td style="font-size: 15; <?= $rcek1['stat_abs1'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_abs1'] == "RANDOM") {
											echo $rcekR['rabsor_b1'];
										} else {
											echo $rcek1['absor_b1'];
										} ?>
									</td>
									<!--<td style="font-size: 15;"><?php if ($rcek1['stat_abs'] == "RANDOM") {
																		echo $rcekR['rabsor_b2'];
																	} else {
																		echo $rcek1['absor_b2'];
																	} ?></td>
          <td style="font-size: 15;"><?php if ($rcek1['stat_abs'] == "RANDOM") {
											echo $rcekR['rabsor_b3'];
										} else {
											echo $rcek1['absor_b3'];
										} ?></td>-->
									<td style="font-size: 15;">&nbsp;</td>
									<td style="font-size: 15;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['dry1'] != "" or $rcek1['dry2'] != "" or $rcek1['dry3'] != "" or $rcek1['dryaf1'] != "" or $rcek1['dryaf2'] != "" or $rcek1['dryaf3'] != "") { ?>
								<tr>
									<th rowspan="2" align="left" style="font-size: 15px;">Drying Time(%)</th>
									<th align="left" style="font-size: 15px;">Original</th>
									<td style="font-size: 15px; <?= $rcek1['stat_dry'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dry'] == "RANDOM") {
											echo $rcekR['rdry1'];
										} else {
											echo $rcek1['dry1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_dry'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dry'] == "RANDOM") {
											echo $rcekR['rdry2'];
										} else {
											echo $rcek1['dry2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_dry'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dry'] == "RANDOM") {
											echo $rcekR['rdry3'];
										} else {
											echo $rcek1['dry3'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Afterwash</th>
									<td style="font-size: 15px; <?= $rcek1['stat_dry1'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dry1'] == "RANDOM") {
											echo $rcekR['rdryaf1'];
										} else {
											echo $rcek1['dryaf1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_dry1'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dry1'] == "RANDOM") {
											echo $rcekR['rdryaf2'];
										} else {
											echo $rcek1['dryaf2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_dry1'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dry1'] == "RANDOM") {
											echo $rcekR['rdryaf3'];
										} else {
											echo $rcek1['dryaf3'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['repp1'] != "" or $rcek1['repp2'] != "" or $rcek1['repp3'] != "" or $rcek1['repp4'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Water Reppelent</th>
									<td style="font-size: 15px; <?= $rcek1['stat_wp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wp'] == "RANDOM") {
											echo $rcekR['rrepp1'];
										} else {
											echo $rcek1['repp1'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_wp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wp'] == "RANDOM") {
											echo $rcekR['rrepp2'];
										} else {
											echo $rcek1['repp2'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_wp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wp'] == "RANDOM") {
											echo $rcekR['rrepp3'];
										} else {
											echo $rcek1['repp3'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_wp'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wp'] == "RANDOM") {
											echo $rcekR['rrepp4'];
										} else {
											echo $rcek1['repp4'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['ph'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Ph</th>
									<td colspan="4" style="font-size: 15px; <?= $rcek1['stat_ph'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_ph'] == "RANDOM") {
											echo $rcekR['rph'];
										} else {
											echo $rcek1['ph'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['soil'] != "") { ?>
								<tr>
									<th colspan="2" align="left" style="font-size: 15px;">Soil Release</th>
									<td colspan="4" style="font-size: 15px; <?= $rcek1['stat_sor'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_sor'] == "RANDOM") {
											echo $rcekR['rsoil'];
										} else {
											echo $rcek1['soil'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
						</table>
					</td>
					<td width="187" align="left" valign="top" style="height: 1.6in;">COLORFASTNESS
						<hr>
						<table class="table">
							<?php if ($rcek1['wash_temp'] != "" or $rcek1['wash_colorchange'] != "" or $rcek1['wash_acetate'] != "" or $rcek1['wash_cotton'] != "" or $rcek1['wash_nylon'] != "" or $rcek1['wash_poly'] != "" or $rcek1['wash_acrylic'] != "" or $rcek1['wash_wool'] != "" or $rcek1['wash_staining'] != "") { ?>
								<tr>
									<th rowspan="5" align="left" style="font-size: 15px;">Washing</th>
									<th align="left" style="font-size: 15px;">Suhu</th>
									<td colspan="4" style="font-size: 15px; <?= $rcek1['stat_wf'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wf'] == "RANDOM") {
											echo $rcekR['rwash_temp'];
										} else {
											echo $rcek1['wash_temp'];
										} ?>&deg;
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px;"><strong>CC</strong></td>
									<td style="font-size: 15px;"><strong>Ace</strong></td>
									<td style="font-size: 15px;"><strong>Cot</strong></td>
									<td colspan="2" style="font-size: 15px;"><strong>Nyl</strong></td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px; <?= $rcek1['stat_wf'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wf'] == "RANDOM") {
											echo $rcekR['rwash_colorchange'];
										} else {
											echo $rcek1['wash_colorchange'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_wf'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wf'] == "RANDOM") {
											echo $rcekR['rwash_acetate'];
										} else {
											echo $rcek1['wash_acetate'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_wf'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wf'] == "RANDOM") {
											echo $rcekR['rwash_cotton'];
										} else {
											echo $rcek1['wash_cotton'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_wf'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wf'] == "RANDOM") {
											echo $rcekR['rwash_nylon'];
										} else {
											echo $rcek1['wash_nylon'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px;"><strong>Poly</strong></td>
									<td style="font-size: 15px;"><strong>Acr</strong></td>
									<td style="font-size: 15px;"><strong>Wool</strong></td>
									<td colspan="2" style="font-size: 15px;"><strong>Sta</strong></td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px; <?= $rcek1['stat_wf'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wf'] == "RANDOM") {
											echo $rcekR['rwash_poly'];
										} else {
											echo $rcek1['wash_poly'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_wf'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wf'] == "RANDOM") {
											echo $rcekR['rwash_acrylic'];
										} else {
											echo $rcek1['wash_acrylic'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_wf'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wf'] == "RANDOM") {
											echo $rcekR['rwash_wool'];
										} else {
											echo $rcek1['wash_wool'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_wf'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wf'] == "RANDOM") {
											echo $rcekR['rwash_staining'];
										} else {
											echo $rcek1['wash_staining'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['acid_colorchange'] != "" or $rcek1['acid_acetate'] != "" or $rcek1['acid_cotton'] != "" or $rcek1['acid_nylon'] != "" or $rcek1['acid_poly'] != "" or $rcek1['acid_acrylic'] != "" or $rcek1['acid_wool'] != "" or $rcek1['acid_staining'] != "") { ?>
								<tr>
									<th rowspan="4" align="left" style="font-size: 15px;">Perspiration Acid</th>
									<td style="font-size: 15px;"><strong>CC</strong></td>
									<td style="font-size: 15px;"><strong>Ace</strong></td>
									<td style="font-size: 15px;"><strong>Cot</strong></td>
									<td colspan="2" style="font-size: 15px;"><strong>Nyl</strong></td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px; <?= $rcek1['stat_pac'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pac'] == "RANDOM") {
											echo $rcekR['racid_colorchange'];
										} else {
											echo $rcek1['acid_colorchange'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pac'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pac'] == "RANDOM") {
											echo $rcekR['racid_acetate'];
										} else {
											echo $rcek1['acid_acetate'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pac'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pac'] == "RANDOM") {
											echo $rcekR['racid_cotton'];
										} else {
											echo $rcek1['acid_cotton'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_pac'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pac'] == "RANDOM") {
											echo $rcekR['racid_nylon'];
										} else {
											echo $rcek1['acid_nylon'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px;"><strong>Poly</strong></td>
									<td style="font-size: 15px;"><strong>Acr</strong></td>
									<td style="font-size: 15px;"><strong>Wool</strong></td>
									<td colspan="2" style="font-size: 15px;"><strong>Sta</strong></td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px; <?= $rcek1['stat_pac'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pac'] == "RANDOM") {
											echo $rcekR['racid_poly'];
										} else {
											echo $rcek1['acid_poly'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pac'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pac'] == "RANDOM") {
											echo $rcekR['racid_acrylic'];
										} else {
											echo $rcek1['acid_acrylic'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pac'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pac'] == "RANDOM") {
											echo $rcekR['racid_wool'];
										} else {
											echo $rcek1['acid_wool'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_pac'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pac'] == "RANDOM") {
											echo $rcekR['racid_staining'];
										} else {
											echo $rcek1['acid_staining'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<!--<td colspan="2"><?php echo $rcek1['acid_staining']; ?></td>-->
								</tr>
							<?php } ?>
							<?php if ($rcek1['alkaline_colorchange'] != "" or $rcek1['alkaline_acetate'] != "" or $rcek1['alkaline_cotton'] != "" or $rcek1['alkaline_nylon'] != "" or $rcek1['alkaline_poly'] != "" or $rcek1['alkaline_acrylic'] != "" or $rcek1['alkaline_wool'] != "" or $rcek1['alkaline_staining'] != "") { ?>
								<tr>
									<th rowspan="4" align="left" style="font-size: 15px;">Perspiration Alkaline</th>
									<td style="font-size: 15px;"><strong>CC</strong></td>
									<td style="font-size: 15px;"><strong>Ace</strong></td>
									<td style="font-size: 15px;"><strong>Cot</strong></td>
									<td colspan="2" style="font-size: 15px;"><strong>Nyl</strong></td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px; <?= $rcek1['stat_pal'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pal'] == "RANDOM") {
											echo $rcekR['ralkaline_colorchange'];
										} else {
											echo $rcek1['alkaline_colorchange'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pal'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pal'] == "RANDOM") {
											echo $rcekR['ralkaline_acetate'];
										} else {
											echo $rcek1['alkaline_acetate'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pal'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pal'] == "RANDOM") {
											echo $rcekR['ralkaline_cotton'];
										} else {
											echo $rcek1['alkaline_cotton'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_pal'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pal'] == "RANDOM") {
											echo $rcekR['ralkaline_nylon'];
										} else {
											echo $rcek1['alkaline_nylon'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px;"><strong>Poly</strong></td>
									<td style="font-size: 15px;"><strong>Acr</strong></td>
									<td style="font-size: 15px;"><strong>Wool</strong></td>
									<td colspan="2" style="font-size: 15px;"><strong>Sta</strong></td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px; <?= $rcek1['stat_pal'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pal'] == "RANDOM") {
											echo $rcekR['ralkaline_poly'];
										} else {
											echo $rcek1['alkaline_poly'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pal'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pal'] == "RANDOM") {
											echo $rcekR['ralkaline_acrylic'];
										} else {
											echo $rcek1['alkaline_acrylic'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_pal'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pal'] == "RANDOM") {
											echo $rcekR['ralkaline_wool'];
										} else {
											echo $rcek1['alkaline_wool'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_pal'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_pal'] == "RANDOM") {
											echo $rcekR['ralkaline_staining'];
										} else {
											echo $rcek1['alkaline_staining'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<!--<td colspan="2"><?php echo $rcek1['alkaline_staining']; ?></td>-->
								</tr>
							<?php } ?>
							<?php if ($rcek1['water_colorchange'] != "" or $rcek1['water_acetate'] != "" or $rcek1['water_cotton'] != "" or $rcek1['water_nylon'] != "" or $rcek1['water_poly'] != "" or $rcek1['water_acrylic'] != "" or $rcek1['water_wool'] != "" or $rcek1['water_staining'] != "") { ?>
								<tr>
									<th rowspan="4" align="left" style="font-size: 15px;">Water</th>
									<td style="font-size: 15px;"><strong>CC</strong></td>
									<td style="font-size: 15px;"><strong>Ace</strong></td>
									<td style="font-size: 15px;"><strong>Cot</strong></td>
									<td colspan="2" style="font-size: 15px;"><strong>Nyl</strong></td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px; <?= $rcek1['stat_wtr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wtr'] == "RANDOM") {
											echo $rcekR['rwater_colorchange'];
										} else {
											echo $rcek1['water_colorchange'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_wtr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wtr'] == "RANDOM") {
											echo $rcekR['rwater_acetate'];
										} else {
											echo $rcek1['water_acetate'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_wtr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wtr'] == "RANDOM") {
											echo $rcekR['rwater_cotton'];
										} else {
											echo $rcek1['water_cotton'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_wtr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wtr'] == "RANDOM") {
											echo $rcekR['rwater_nylon'];
										} else {
											echo $rcek1['water_nylon'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px;"><strong>Poly</strong></td>
									<td style="font-size: 15px;"><strong>Acr</strong></td>
									<td style="font-size: 15px;"><strong>Wool</strong></td>
									<td colspan="2" style="font-size: 15px;"><strong>Sta</strong></td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<td style="font-size: 15px; <?= $rcek1['stat_wtr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wtr'] == "RANDOM") {
											echo $rcekR['rwater_poly'];
										} else {
											echo $rcek1['water_poly'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_wtr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wtr'] == "RANDOM") {
											echo $rcekR['rwater_acrylic'];
										} else {
											echo $rcek1['water_acrylic'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_wtr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wtr'] == "RANDOM") {
											echo $rcekR['rwater_wool'];
										} else {
											echo $rcek1['water_wool'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_wtr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_wtr'] == "RANDOM") {
											echo $rcekR['rwater_staining'];
										} else {
											echo $rcek1['water_staining'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
									<!--<td><?php echo $rcek1['water_staining']; ?></td>-->
								</tr>
							<?php } ?>
							<?php if ($rcek1['crock_len1'] != "" or $rcek1['crock_wid1'] != "" or $rcek1['crock_len2'] != "" or $rcek1['crock_wid2'] != "") { ?>
								<tr>
									<th rowspan="3" align="left" style="font-size: 15px;">Crocking</th>
									<th align="left" style="font-size: 15px;">Srt</th>
									<th align="left" style="font-size: 15px;">Dry</th>
									<th align="left" style="font-size: 15px;">Wet</th>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Len</th>
									<td style="font-size: 15px; <?= $rcek1['stat_cr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_cr'] == "RANDOM") {
											echo $rcekR['rcrock_len1'];
										} else {
											echo $rcek1['crock_len1'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_cr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_cr'] == "RANDOM") {
											echo $rcekR['rcrock_len2'];
										} else {
											echo $rcek1['crock_len2'];
										} ?>
									</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Wid</th>
									<td style="font-size: 15px; <?= $rcek1['stat_cr'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_cr'] == "RANDOM") {
											echo $rcekR['rcrock_wid1'];
										} else {
											echo $rcek1['crock_wid1'];
										} ?>
									</td>
									<td colspan="3" style="font-size: 15px; <?= $rcek1['stat_cr'] == "FAIL" ? 'color: red;' : '' ?>">
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
									<th align="left" style="font-size: 15px;">Phenolic Yellowing</th>
									<th align="left" style="font-size: 15px;">CC</th>
									<td colspan="4" style="font-size: 15px; <?= $rcek1['stat_py'] == "FAIL" ? 'color: red;' : '' ?>">
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
									<th align="left" style="font-size: 15px;">Light</th>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px; <?= $rcek1['stat_lg'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_lg'] == "RANDOM") {
											echo $rcekR['rlight_rating1'];
										} else {
											echo $rcek1['light_rating1'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_lg'] == "FAIL" ? 'color: red;' : '' ?>">
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
									<th align="left" style="font-size: 15px;">Color Migration Oven</th>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td colspan="3" style="font-size: 15px; <?= $rcek1['stat_cmo'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_cmo'] == "RANDOM") {
											echo $rcekR['rcm_printing_colorchange'];
										} else {
											echo $rcek1['cm_printing_colorchange'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_cmo'] == "FAIL" ? 'color: red;' : '' ?>">
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
									<th rowspan="3" align="left" style="font-size: 15px;">Color Migration</th>
									<th align="left" style="font-size: 15px;">Suhu</th>
									<td colspan="4" style="font-size: 15px; <?= $rcek1['stat_cm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_cm'] == "RANDOM") {
											echo $rcekR['rcm_dye_temp'];
										} else {
											echo $rcek1['cm_dye_temp'];
										} ?>&deg;
									</td>
								</tr>
								<tr>
									<th style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px;"><strong>CC</strong></td>
									<td style="font-size: 15px;"><strong>Sta</strong></td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px; <?= $rcek1['stat_cm'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_cm'] == "RANDOM") {
											echo $rcekR['rcm_dye_colorchange'];
										} else {
											echo $rcek1['cm_dye_colorchange'];
										} ?>
									</td>
									<td colspan="4" style="font-size: 15px; <?= $rcek1['stat_cm'] == "FAIL" ? 'color: red;' : '' ?>">
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
									<th align="left" style="font-size: 15px;">Light Perspiration</th>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td colspan="4" style="font-size: 15px; <?= $rcek1['stat_lp'] == "FAIL" ? 'color: red;' : '' ?>">
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
									<th align="left" style="font-size: 15px;">Saliva</th>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_slv'] == "FAIL" ? 'color: red;' : '' ?>">
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
									<th align="left" style="font-size: 15px;">Bleeding</th>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_bld'] == "FAIL" ? 'color: red;' : '' ?>">
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
									<th align="left" style="font-size: 15px;">Chlorin</th>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_chl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_chl'] == "RANDOM") {
											echo $rcekR['rchlorin'];
										} else {
											echo $rcek1['chlorin'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">Non-Chlorin</th>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_nchl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_nchl'] == "RANDOM") {
											echo $rcekR['rnchlorin1'];
										} else {
											echo $rcek1['nchlorin1'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_nchl'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_nchl'] == "RANDOM") {
											echo $rcekR['rnchlorin2'];
										} else {
											echo $rcek1['nchlorin2'];
										} ?>
									</td>
								</tr>
							<?php } ?>
							<?php if ($rcek1['dye_tf_cstaining'] != "" or $rcek1['dye_tf_acetate'] != "" or $rcek1['dye_tf_cotton'] != "" or $rcek1['dye_tf_nylon'] != "" or $rcek1['dye_tf_poly'] != "" or $rcek1['dye_tf_acrylic'] != "" or $rcek1['dye_tf_wool'] != "" or $rcek1['dye_tf_sstaining'] != "") { ?>
								<tr>
									<th rowspan="4" colspan="2" align="left" style="font-size: 15px;">Dye Transfer</th>
									<td style="font-size: 15px;"><strong>Ace</strong></td>
									<td style="font-size: 15px;" colspan="2"><strong>Cot</strong></td>
									<td style="font-size: 15px;"><strong>Nyl</strong></td>
									<td colspan="2" style="font-size: 15px;"><strong>Poly</strong></td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px; <?= $rcek1['stat_dye'] == "FAIL" ? 'color: red;' : '' ?>">&nbsp;</th>
									<td style="font-size: 15px;">
										<?php if ($rcek1['stat_dye'] == "RANDOM") {
											echo $rcekR['rdye_tf_acetate'];
										} else {
											echo $rcek1['dye_tf_acetate'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_dye'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dye'] == "RANDOM") {
											echo $rcekR['rdye_tf_cotton'];
										} else {
											echo $rcek1['dye_tf_cotton'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_dye'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dye'] == "RANDOM") {
											echo $rcekR['rdye_tf_nylon'];
										} else {
											echo $rcek1['dye_tf_nylon'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_dye'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dye'] == "RANDOM") {
											echo $rcekR['rdye_tf_poly'];
										} else {
											echo $rcek1['dye_tf_poly'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px;"><strong>Acr</strong></td>
									<td colspan="2" style="font-size: 15px;"><strong>Wool</strong></td>
									<td style="font-size: 15px;"><strong>C.Sta</strong></td>
									<td colspan="2" style="font-size: 15px;"><strong>S.Sta</strong></td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
								<tr>
									<th align="left" style="font-size: 15px;">&nbsp;</th>
									<td style="font-size: 15px; <?= $rcek1['stat_dye'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dye'] == "RANDOM") {
											echo $rcekR['rdye_tf_acrylic'];
										} else {
											echo $rcek1['dye_tf_acrylic'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_dye'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dye'] == "RANDOM") {
											echo $rcekR['rdye_tf_wool'];
										} else {
											echo $rcek1['dye_tf_wool'];
										} ?>
									</td>
									<td style="font-size: 15px; <?= $rcek1['stat_dye'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dye'] == "RANDOM") {
											echo $rcekR['rdye_tf_cstaining'];
										} else {
											echo $rcek1['dye_tf_cstaining'];
										} ?>
									</td>
									<td colspan="2" style="font-size: 15px; <?= $rcek1['stat_dye'] == "FAIL" ? 'color: red;' : '' ?>">
										<?php if ($rcek1['stat_dye'] == "RANDOM") {
											echo $rcekR['rdye_tf_sstaining'];
										} else {
											echo $rcek1['dye_tf_sstaining'];
										} ?>
									</td>
									<td style="font-size: 15px;">&nbsp;</td>
								</tr>
							<?php } ?>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="3" align="left" valign="top" bgcolor="#ECE8E8">Note:
						<?php
						if ($rcek1['ss_cmt'] == '1') {
							echo trim($rcek1['note_g']);
						} else {
							// ketika ss_cmt tidak di checklist maka hilanhkan apperss_note
							echo str_replace($rcek1['apperss_note'], "", $rcek1['note_g']);
						}
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>