<script>
	function roundToTwo(num) {
		return +(Math.round(num + "e+2") + "e-2");
	}

	function angka(e) {
		if (!/^[0-9 .]+$/.test(e.value)) {
			e.value = e.value.substring(0, e.value.length - 1);
		}
	}
</script>
<?php
	// ini_set("error_reporting", 1);
	session_start();
	include "koneksi.php";
	function nourut()
	{
		include "koneksi.php";
		$format = date("ymd");
		$sql = mysqli_query($con, "SELECT nokk FROM tbl_schedule WHERE substr(nokk,1,6) like '%" . $format . "%' ORDER BY nokk DESC LIMIT 1 ") or die(mysqli_error($con));
		$d = mysqli_num_rows($sql);
		if ($d > 0) {
			$r = mysqli_fetch_array($sql);
			$d = $r['nokk'];
			$str = substr($d, 6, 2);
			$Urut = (int) $str;
		} else {
			$Urut = 0;
		}
		$Urut = $Urut + 1;
		$Nol = "";
		$nilai = 2 - strlen($Urut);
		for ($i = 1; $i <= $nilai; $i++) {
			$Nol = $Nol . "0";
		}
		$nipbr = $format . $Nol . $Urut;
		return $nipbr;
	}
	$nou = nourut();
	$nodemand = trim($_GET['nodemand']);
	$operation = $_GET['operation'];
	$sqlDB2 = "SELECT
		p.CODE,
		P.DESCRIPTION,
		p.SUBCODE01,
		p.SUBCODE02,
		p.SUBCODE03,
		p.SUBCODE04,
		p.SUBCODE05,
		p.SUBCODE06,
		p.SUBCODE07,
		p.SUBCODE08,
		p.SUBCODE09,
		p.SUBCODE10,
		CONCAT(TRIM(p.SUBCODE02), TRIM(p.SUBCODE03)) AS ITEMNO,
		p.ORIGDLVSALORDLINESALORDERCODE AS PRO_ORDER,
		p.ORIGDLVSALORDERLINEORDERLINE AS ORDERLINE,
		ps.PRODUCTIONORDERCODE,
		E.LEGALNAME1 AS LANGGANAN,
		TRIM(f.LONGDESCRIPTION) AS WARNA,
		TRIM(f.CODE) AS NO_WARNA,
		h.CODE AS PO_RAJUT,
		h.FINALPLANNEDDATE AS TGL_DELIV_GREIGE
	FROM
		PRODUCTIONDEMAND p
	LEFT OUTER JOIN 
		(
		SELECT
			PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
			PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
		FROM
			PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
		GROUP BY
			PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
			PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) ps
	ON
		p.CODE = ps.PRODUCTIONDEMANDCODE

	LEFT OUTER JOIN
		(
		SELECT
			BUSINESSPARTNER.LEGALNAME1,
			ORDERPARTNER.CUSTOMERSUPPLIERCODE
		FROM
			BUSINESSPARTNER BUSINESSPARTNER
		LEFT JOIN ORDERPARTNER ORDERPARTNER ON
			BUSINESSPARTNER.NUMBERID = ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID) E
	ON
		p.CUSTOMERCODE = E.CUSTOMERSUPPLIERCODE
	LEFT OUTER JOIN USERGENERICGROUP f
		ON
		p.SUBCODE05 = f.CODE
	LEFT OUTER JOIN PRODUCTIONDEMAND h
	ON
		p.ORIGDLVSALORDLINESALORDERCODE = h.ORIGDLVSALORDLINESALORDERCODE
		AND 
	p.SUBCODE01 = h.SUBCODE01
		AND 
	p.SUBCODE02 = h.SUBCODE02
		AND
	p.SUBCODE03 = h.SUBCODE03
		AND
	p.SUBCODE04 = h.SUBCODE04
		AND 
	h.ITEMTYPEAFICODE = 'KGF'
	WHERE
		p.CODE = '$nodemand'";
	$stmt = db2_exec($conn1, $sqlDB2, array('cursor' => DB2_SCROLLABLE));
	$rowdb2 = db2_fetch_assoc($stmt);

	$sqlDB20 = " SELECT
			SALESORDER.ORDERPARTNERBRANDCODE,
			SALESORDERLINE.SALESORDERCODE,
			SALESORDERLINE.ORDERLINE,
			SALESORDERLINE.ITEMDESCRIPTION,
			SALESORDERLINE.SUBCODE03,
			SALESORDERLINE.SUBCODE05,
			SALESORDERLINE.BASEPRIMARYUOMCODE AS QTY_ORDER_UOM,
			CASE
				WHEN SALESORDER.EXTERNALREFERENCE IS NULL THEN SALESORDERLINE.EXTERNALREFERENCE
				ELSE SALESORDER.EXTERNALREFERENCE
			END AS PO_NUMBER,
			SALESORDERLINE.INTERNALREFERENCE,
			SUM(SALESORDERLINE.BASEPRIMARYQUANTITY) AS QTY_ORDER,
			SUM(SALESORDERLINE.BASESECONDARYQUANTITY) AS QTY_PANJANG_ORDER,
			SALESORDERLINE.BASESECONDARYUOMCODE AS QTY_PANJANG_ORDER_UOM,
			SALESORDERDELIVERY.DELIVERYDATE,
			ITXVIEWORDERITEMLINKACTIVE.EXTERNALITEMCODE,
			CASE
				WHEN ITXVIEWORDERITEMLINKACTIVE.LONGDESCRIPTION IS NULL THEN CONCAT(TRIM(SALESORDERLINE.SUBCODE02),TRIM(SALESORDERLINE.SUBCODE03))
				ELSE ITXVIEWORDERITEMLINKACTIVE.LONGDESCRIPTION
			END AS NO_ITEM, 
			ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER
		FROM
			SALESORDER SALESORDER
		LEFT JOIN SALESORDERLINE SALESORDERLINE ON
			SALESORDER.CODE = SALESORDERLINE.SALESORDERCODE
		LEFT JOIN SALESORDERDELIVERY SALESORDERDELIVERY ON
			SALESORDERLINE.SALESORDERCODE = SALESORDERDELIVERY.SALESORDERLINESALESORDERCODE
			AND SALESORDERLINE.ORDERLINE = SALESORDERDELIVERY.SALESORDERLINEORDERLINE
		LEFT JOIN ITXVIEWORDERITEMLINKACTIVE ITXVIEWORDERITEMLINKACTIVE ON
			SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ITXVIEWORDERITEMLINKACTIVE.ORDPRNCUSTOMERSUPPLIERCODE
			AND SALESORDERLINE.ITEMTYPEAFICODE = ITXVIEWORDERITEMLINKACTIVE.ITEMTYPEAFICODE
			AND 
		SALESORDERLINE.SUBCODE01 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE01
			AND SALESORDERLINE.SUBCODE02 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE02
			AND SALESORDERLINE.SUBCODE03 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE03
			AND
		SALESORDERLINE.SUBCODE04 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE04
			AND SALESORDERLINE.SUBCODE05 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE05
			AND SALESORDERLINE.SUBCODE06 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE06
			AND 
		SALESORDERLINE.SUBCODE07 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE07
			AND SALESORDERLINE.SUBCODE08 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE08
			AND SALESORDERLINE.SUBCODE09 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE09
			AND 
		SALESORDERLINE.SUBCODE10 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE10
		LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON
			SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE
			AND SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE
		WHERE SALESORDERLINE.SALESORDERCODE ='" . $rowdb2['PRO_ORDER'] . "'
		AND SALESORDERLINE.ORDERLINE='" . $rowdb2['ORDERLINE'] . "'		
		GROUP BY
			SALESORDER.ORDERPARTNERBRANDCODE,
			SALESORDERLINE.SALESORDERCODE,
			SALESORDERLINE.ORDERLINE,
			SALESORDERLINE.ITEMDESCRIPTION,
			SALESORDERLINE.SUBCODE02,
			SALESORDERLINE.SUBCODE03,
			SALESORDERLINE.SUBCODE05,
			SALESORDERLINE.BASEPRIMARYUOMCODE,
			SALESORDERLINE.BASESECONDARYUOMCODE,
			SALESORDER.EXTERNALREFERENCE,
			SALESORDERLINE.EXTERNALREFERENCE,
			SALESORDERLINE.INTERNALREFERENCE,
			SALESORDERDELIVERY.DELIVERYDATE,
			ITXVIEWORDERITEMLINKACTIVE.EXTERNALITEMCODE,
			ITXVIEWORDERITEMLINKACTIVE.LONGDESCRIPTION,
			ORDERPARTNERBRAND.LONGDESCRIPTION ";
	$stmt0 = db2_exec($conn1, $sqlDB20, array('cursor' => DB2_SCROLLABLE));
	$rowdb20 = db2_fetch_assoc($stmt0);

	$sqlDB211 = " 
	SELECT
		PRODUCT.SUBCODE01,
		PRODUCT.SUBCODE02,
		PRODUCT.SUBCODE03,
		PRODUCT.SUBCODE04,
		PRODUCT.SUBCODE05,
		PRODUCT.SUBCODE06,
		PRODUCT.SUBCODE07,
		PRODUCT.SUBCODE08,
		PRODUCT.SUBCODE09,
		PRODUCT.SUBCODE10,  
		SUM(ADSTORAGE.VALUEDECIMAL) AS GSM,
		SUM(ADSTORAGE1.VALUEDECIMAL) AS WIDTH
	FROM
		PRODUCT PRODUCT
	LEFT JOIN ADSTORAGE ADSTORAGE ON
		PRODUCT.ABSUNIQUEID = ADSTORAGE.UNIQUEID AND ADSTORAGE.NAMENAME='GSM'
	LEFT JOIN ADSTORAGE ADSTORAGE1 ON
		PRODUCT.ABSUNIQUEID = ADSTORAGE1.UNIQUEID AND ADSTORAGE1.NAMENAME='Width'	
	WHERE 	
		PRODUCT.SUBCODE01='" . $rowdb2['SUBCODE01'] . "' AND
		PRODUCT.SUBCODE02='" . $rowdb2['SUBCODE02'] . "' AND
		PRODUCT.SUBCODE03='" . $rowdb2['SUBCODE03'] . "' AND
		PRODUCT.SUBCODE04='" . $rowdb2['SUBCODE04'] . "' AND
		PRODUCT.SUBCODE05='" . $rowdb2['SUBCODE05'] . "' AND
		PRODUCT.SUBCODE06='" . $rowdb2['SUBCODE06'] . "' AND
		PRODUCT.SUBCODE07='" . $rowdb2['SUBCODE07'] . "' AND
		PRODUCT.SUBCODE08='" . $rowdb2['SUBCODE08'] . "' AND
		PRODUCT.SUBCODE09='" . $rowdb2['SUBCODE09'] . "' AND
		PRODUCT.SUBCODE10='" . $rowdb2['SUBCODE10'] . "'
	GROUP BY
		PRODUCT.SUBCODE01,
		PRODUCT.SUBCODE02,
		PRODUCT.SUBCODE03,
		PRODUCT.SUBCODE04,
		PRODUCT.SUBCODE05,
		PRODUCT.SUBCODE06,
		PRODUCT.SUBCODE07,
		PRODUCT.SUBCODE08,
		PRODUCT.SUBCODE09,
		PRODUCT.SUBCODE10
	";
	$stmt211 = db2_exec($conn1, $sqlDB211, array('cursor' => DB2_SCROLLABLE));
	$rowdb211 = db2_fetch_assoc($stmt211);

	$sqlroll = "SELECT 
	STOCKTRANSACTION.ORDERCODE,
	COUNT(STOCKTRANSACTION.ITEMELEMENTCODE) AS JML_ROLL
	FROM STOCKTRANSACTION STOCKTRANSACTION
	WHERE STOCKTRANSACTION.ORDERCODE ='$rowdb2[PRODUCTIONORDERCODE]' AND STOCKTRANSACTION.TEMPLATECODE ='120'
	AND STOCKTRANSACTION.ITEMTYPECODE ='KGF'
	GROUP BY 
	STOCKTRANSACTION.ORDERCODE";
	$stmt1r = db2_exec($conn1, $sqlroll, array('cursor' => DB2_SCROLLABLE));
	$rowr = db2_fetch_assoc($stmt1r);

	$sqlCek = mysqli_query($con, "SELECT * FROM tbl_schedule WHERE nodemand='$nodemand' ORDER BY id DESC LIMIT 1");
	$cek = mysqli_num_rows($sqlCek);
	$rcek = mysqli_fetch_array($sqlCek);
	// echo "SELECT * FROM tbl_schedule WHERE nokk='$nodemand' ORDER BY id DESC LIMIT 1 ||";

	$sqlCek1 = mysqli_query($con, "SELECT * FROM tbl_schedule WHERE nodemand='$nodemand' AND not status='selesai' ORDER BY id DESC LIMIT 1");
	$cek1 = mysqli_num_rows($sqlCek1);


	$sqlDB21  = " SELECT DISTINCT 
					x.INITIALUSERPRIMARYQUANTITY AS KG_BAGIKAIN 
					FROM DB2ADMIN.ITXVIEW_RESERVATION x 
				WHERE x.PRODUCTIONORDERCODE='" . $rcek['nokk'] . "'";
	$stmt1   = db2_exec($conn1, $sqlDB21, array('cursor' => DB2_SCROLLABLE));
	$rowdb21 = db2_fetch_assoc($stmt1);
	// echo $sqlDB21;

	$sqlDB21S  = " SELECT 
						x.USEDUSERPRIMARYQUANTITY AS KG_BAGIKAIN,
						x.USERPRIMARYQUANTITY AS KG_BAGIKAIN1  FROM DB2ADMIN.PRODUCTIONRESERVATION x
					WHERE x.ORDERCODE = '" . $_GET['nodemand'] . "' ";
	$stmt1S   = db2_exec($conn1, $sqlDB21S, array('cursor' => DB2_SCROLLABLE));
	$rowdb21S = db2_fetch_assoc($stmt1S);
	// var_dump($sqlDB21S);
	if ($rowdb21['KG_BAGIKAIN'] > 0) {
		$KGBAGI = $rowdb21['KG_BAGIKAIN'];
	} else if ($rowdb21S['KG_BAGIKAIN1'] > 0) {
		$KGBAGI = $rowdb21S['KG_BAGIKAIN1'];
	}

?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Input Data Kartu Kerja</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
						class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="col-md-6">
				<div class="form-group">
					<label for="nodemand" class="col-sm-3 control-label">No Demand</label>
					<div class="col-sm-4">
						<input name="nodemand" type="text" class="form-control" id="nodemand"
							onchange="window.location='LaporanInspeksiStanter-'+this.value"
							value="<?php echo $_GET['nodemand']; ?>" placeholder="No Demand" required>
					</div>
				</div>
				<div class="form-group">
					<label for="nokk" class="col-sm-3 control-label">No Production Order</label>
					<div class="col-sm-8">
						<input name="nokk" type="text" class="form-control" id="nokk" value="<?php if ($cek > 0) {
																									echo $rcek['nokk'];
																								} else {
																									echo $rowdb2['PRODUCTIONORDERCODE'];
																								} ?>" placeholder="No Production Order">
					</div>
				</div>
				<div class="form-group">
					<label for="langganan" class="col-sm-3 control-label">Langganan</label>
					<div class="col-sm-8">
						<input name="langganan" type="text" class="form-control" id="langganan" value="<?php if ($cek > 0) {
																											echo $rcek['langganan'];
																										} else {
																											echo $rowdb2['LANGGANAN'];
																										} ?>" placeholder="Langganan">
					</div>
				</div>
				<div class="form-group">
					<label for="buyer" class="col-sm-3 control-label">Buyer</label>
					<div class="col-sm-8">
						<input name="buyer" type="text" class="form-control" id="buyer" value="<?php if ($cek > 0) {
																									echo $rcek['buyer'];
																								} else {
																									echo $rowdb20['ORDERPARTNERBRANDCODE'];
																								} ?>" placeholder="Buyer">
					</div>
				</div>
				<div class="form-group">
					<label for="no_order" class="col-sm-3 control-label">No Order</label>
					<div class="col-sm-4">
						<input name="no_order" type="text" class="form-control" id="no_order" value="<?php if ($cek > 0) {
																											echo $rcek['no_order'];
																										} else {
																											if ($rowdb2['PRO_ORDER'] != "") {
																												echo $rowdb2['PRO_ORDER'];
																											}
																										} ?>" placeholder="No Order">
					</div>
				</div>
				<div class="form-group">
					<label for="no_po" class="col-sm-3 control-label">PO</label>
					<div class="col-sm-5">
						<input name="no_po" type="text" class="form-control" id="no_po" value="<?php if ($cek > 0) {
																									echo $rcek['po'];
																								} else {
																									echo $rowdb20['PO_NUMBER'];
																								} ?>" placeholder="PO">
					</div>
				</div>
				<div class="form-group">
					<label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
					<div class="col-sm-3">
						<input name="no_hanger" type="text" class="form-control" id="no_hanger" value="<?php if ($cek > 0) {
																											echo $rcek['no_hanger'];
																										} else {
																											if ($rowdb2['SUBCODE02'] != "") {
																												echo trim($rowdb2['SUBCODE02']) . '-' . trim($rowdb2['SUBCODE03']);
																											}
																										} ?>" placeholder="No Hanger">
					</div>
					<div class="col-sm-3">
						<input name="no_item" type="text" class="form-control" id="no_item" value="<?php if ($rcek['no_item'] != "") {
																										echo $rcek['no_item'];
																									} else if ($rowdb20['NO_ITEM'] != "") {
																										echo $rowdb20['NO_ITEM'];
																									} else {
																										if ($rowdb2['SUBCODE02'] != "") {
																											echo trim($rowdb2['SUBCODE02']) . '-' . trim($rowdb2['SUBCODE03']);
																										}
																									} ?>" placeholder="No Item">
					</div>
				</div>
				<div class="form-group">
					<label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
					<div class="col-sm-8">
						<textarea name="jenis_kain" class="form-control" id="jenis_kain" placeholder="Jenis Kain"><?php if ($cek > 0) {
																													echo $rcek['jenis_kain'];
																												} else {
																													if ($rowdb20['ITEMDESCRIPTION'] != "") {
																														echo $rowdb20['ITEMDESCRIPTION'];
																													}
																												} ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
					<div class="col-sm-2">
						<input name="lebar" type="text" class="form-control" id="lebar" value="<?php if ($cek > 0) {
																									echo $rcek['lebar'];
																								} else {
																									echo round($rowdb211['WIDTH']);
																								}
																								?>" placeholder="0" required>
					</div>
					<div class="col-sm-2">
						<input name="gramasi" type="text" class="form-control" id="gramasi" value="<?php if ($cek > 0) {
																									echo $rcek['gramasi'];
																								} else {
																									echo round($rowdb211['GSM']);
																								} ?>" placeholder="0" required>
					</div>
				</div>
				<div class="form-group">
					<label for="warna" class="col-sm-3 control-label">Warna</label>
					<div class="col-sm-8">
						<input name="warna" type="text" class="form-control" id="warna" value="<?php if ($cek > 0) {
																									echo $rcek['warna'];
																								} else {
																									if ($rowdb2['WARNA'] != "") {
																										echo $rowdb2['WARNA'];
																									}
																								} ?>" placeholder="Warna">
					</div>
				</div>
				

			</div>
			<!-- col -->
			<div class="col-md-6">
				<div class="form-group">
					<label for="no_warna" class="col-sm-3 control-label">No Warna</label>
					<div class="col-sm-3">
						<input name="no_warna" type="text" class="form-control" id="no_warna" value="<?php if ($cek > 0) {
																											echo $rcek['no_warna'];
																										} else {
																											if ($rowdb2['NO_WARNA'] != "") {
																												echo $rowdb2['NO_WARNA'];
																											}
																										} ?>" placeholder="No Warna">
					</div>
				</div>

				<div class="form-group">
					<label for="jml_bruto" class="col-sm-3 control-label">Roll &amp; Qty</label>
					<div class="col-sm-2">
						<input name="roll" type="text" class="form-control" id="qty3" value="<?php if ($cek > 0) {
																									echo $rcek['rol'];
																								} else {
																									if ($rowr['JML_ROLL'] != 0) {
																										echo $rowr['JML_ROLL'];
																									}
																								} ?>" placeholder="0.00" required>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<input name="bruto" type="text" class="form-control" id="bruto" value="<?php if ($cek > 0) {
																										echo $rcek['bruto'];
																									} else {
																										echo round($KGBAGI, 2); //disini
																									} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">KGs</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="no_mc" class="col-sm-3 control-label">No MC</label>
					<div class="col-sm-3">
						<select name="no_mc" class="form-control" id="no_mc" required>
						<option value="">Pilih</option>
							<?php
							$qry1 = db2_exec($conn1, "SELECT
											CODE
										  FROM
											RESOURCES r
										  WHERE
											SUBSTR(CODE, 1,4) = 'P3ST'
										  ORDER BY 
											SUBSTR(CODE, 6,2) ASC");

							while ($r = db2_fetch_assoc($qry1)) {
								$selected = ($row_mesin['MESIN'] == $r['CODE']) ? 'SELECTED' : '';
								$stenterNumber = substr($r['CODE'], 5, 2); // Extract the number from the code
							?>
								<option value="<?= $r['CODE']; ?>" <?= $selected; ?>>
									<?= $r['CODE']; ?> - STENTER <?= $stenterNumber; ?>
								</option>
							<?php } ?>
						</select>
					</div>


				</div>
				<div class="form-group">
					<label for="multi" class="col-sm-3 control-label">Personil</label>
					<div class="col-sm-5">
						<div class="input-group">
							<select class="form-control select2" data-placeholder="Pilih Personil" name="operator" id="operator" required>
								<option value="" disabled selected>Pilih Personil</option>
								<?php
								$qCek1 = mysqli_query($con, "SELECT user FROM tbl_user_stenter ORDER BY user ASC");
								while ($dCek1 = mysqli_fetch_array($qCek1)) { ?>
									<option value="<?php echo $dCek1['user']; ?>"><?php echo $dCek1['user']; ?></option>
								<?php } ?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#data-user"> ...</button></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="ket" class="col-sm-3 control-label">Shift</label>
					<div class="col-sm-5">
						<select name="shift" class="form-control" id="shift" required>
							<option value="">Pilih</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="ket" class="col-sm-3 control-label">Proses</label>
					<div class="col-sm-5">
						<select name="proses" class="form-control" id="proses" required>
							<option value="">Pilih</option>
							<option value="Oven">Oven</option>
							<option value="Preset">Preset</option>
							<option value="Fin Jadi">Fin Jadi</option>
							<option value="Fin 1x">Fin 1x</option>
							<option value="Fin Ulang">Fin Ulang</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="ket" class="col-sm-3 control-label">Status</label>
					<div class="col-sm-5">
						<select name="status" class="form-control" id="status" required>
							<option value="">Pilih</option>
							<option value="OK">OK</option>
							<option value="Reject">Reject</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="catatan" class="col-sm-3 control-label">Catatan</label>
					<div class="col-sm-8">
						<textarea name="catatan" class="form-control" id="catatan" placeholder="catatan..."></textarea>
					</div>

				</div>

			</div>
		</div>
		<div class="box-footer">
			<button type="button" class="btn btn-default pull-left" name="back" value="kembali"
				onClick="window.location='LaporanInspeksiStanterReport'">Lihat Data <i class="fa fa-arrow-circle-o-left"></i></button>

			<button type="submit" class="btn btn-primary pull-right" name="save" value="save">Simpan <i
					class="fa fa-save"></i></button>
		</div>
		<!-- /.box-footer -->
	</div>
</form>

	<div class="modal fade" id="data-user">
		<div class="modal-dialog ">
			<div class="modal-content">
				<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Personil</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id" name="id">
						<div class="form-group">
							<label for="operator" class="col-md-3 control-label">Nama</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="user" name="user" required>
								<span class="help-block with-errors"></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<input type="submit" value="Simpan" name="simpan_operator" id="simpan_operator" class="btn btn-primary pull-right">
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	
	<?php
		if (isset($_POST['simpan_operator']) && $_POST['simpan_operator'] == "Simpan") {
			$sqlData1 = mysqli_query($con, "INSERT INTO tbl_user_stenter SET 
				user='$_POST[user]'");
			if ($sqlData1) {
				echo "<script>swal({
		title: 'Data Telah Tersimpan',   
		text: 'Klik Ok untuk input data kembali',
		type: 'success',
		}).then((result) => {
		if (result.value) {
				window.location.href='LaporanInspeksiStanter';
			
		}
		});</script>";
			}
		}
	?>

<?php
if (isset($_POST['save'])) {
    // Escape special characters in input data
    $nokk = mysqli_real_escape_string($con, $_POST['nokk']);
    $nodemand = mysqli_real_escape_string($con, $_POST['nodemand']);
    $langganan = mysqli_real_escape_string($con, $_POST['langganan']);
    $buyer = mysqli_real_escape_string($con, $_POST['buyer']);
    $no_order = mysqli_real_escape_string($con, $_POST['no_order']);
    $jenis_kain = mysqli_real_escape_string($con, $_POST['jenis_kain']);
    $warna = mysqli_real_escape_string($con, $_POST['warna']);
    $no_mc = mysqli_real_escape_string($con, $_POST['no_mc']);
    $bruto = mysqli_real_escape_string($con, $_POST['bruto']);
    $no_hanger = mysqli_real_escape_string($con, $_POST['no_hanger']);
    $no_item = mysqli_real_escape_string($con, $_POST['no_item']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $catatan = mysqli_real_escape_string($con, $_POST['catatan']);
    $no_po = mysqli_real_escape_string($con, $_POST['no_po']);
    $lebar = mysqli_real_escape_string($con, $_POST['lebar']);
    $gramasi = mysqli_real_escape_string($con, $_POST['gramasi']);
    $operator = mysqli_real_escape_string($con, $_POST['operator']);
    $roll = mysqli_real_escape_string($con, $_POST['roll']);
    $no_warna = mysqli_real_escape_string($con, $_POST['no_warna']);
    $shift = mysqli_real_escape_string($con, $_POST['shift']);
    $proses = mysqli_real_escape_string($con, $_POST['proses']);

    // Insert data into tbl_lap_stenter
    $sqlData = mysqli_query($con, "INSERT INTO tbl_lap_stenter SET
        nokk='$nokk',
        nodemand='$nodemand',
        langganan='$langganan',
        buyer='$buyer',
        no_order='$no_order',
        jenis_kain='$jenis_kain',
        warna='$warna',
        no_mc='$no_mc',
        bruto='$bruto',
        no_hanger='$no_hanger',
        no_item='$no_item',
        status='$status',
        catatan='$catatan',
        no_po='$no_po',
        lebar='$lebar',
        gramasi='$gramasi',
        operator='$operator',
        roll='$roll',
        no_warna='$no_warna',
        shift='$shift',
        proses='$proses',
        tanggal_buat=NOW()
    ");

    if ($sqlData) {
        echo "<script>swal({
            title: 'Data Tersimpan',
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
        }).then((result) => {
            if (result.value) {
                window.location.href='LaporanInspeksiStanter';
            }
        });</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data ke tbl_lap_stenter: " . mysqli_error($con) . "');</script>";
    }
}
?>
