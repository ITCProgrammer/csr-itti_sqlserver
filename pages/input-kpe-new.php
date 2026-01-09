<?php
include "koneksi.php";
// ini_set("error_reporting", 1);
$nodemand = $_GET['nodemand'];
 $sqlDB2 = "SELECT 
			A.CODE AS DEMANDNO, 
			TRIM(B.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE,
			TRIM(F.LEGALNAME1) AS LEGALNAME1, 
			TRIM(C.BUYER) AS BUYER,
			CASE
				WHEN C.PO_HEADER IS NULL THEN C.PO_LINE
				ELSE C.PO_HEADER
			END AS PO_NUMBER,
			CASE
				WHEN C.STYLE_HEADER IS NULL THEN C.STYLE_LINE
				ELSE C.STYLE_HEADER
			END AS DATA_STYLE,
			TRIM(C.SALESORDERCODE) AS SALESORDERCODE,
			C.QTY_ORDER,
			C.QTY_PANJANG_ORDER_UOM,
			C.QTY_PANJANG_ORDER,
			C.QTY_PANJANG_ORDER_SCND_UOM,
			TRIM(C.NO_ITEM) AS NO_ITEM,
			TRIM(A.SUBCODE02) AS SUBCODE02, 
			TRIM(A.SUBCODE03) AS SUBCODE03,
			TRIM(C.ITEMDESCRIPTION) AS ITEMDESCRIPTION, 
			PRODUCT.LONGDESCRIPTION AS JENIS_KAIN,
			D.VALUEDECIMAL AS GRAMASI,
			E.VALUEDECIMAL AS LEBAR,
			C.DELIVERYDATE, 
			C.ABSUNIQUEID,
			TRIM(A.SUBCODE05) AS NO_WARNA, 
			ITXVIEWCOLOR.WARNA,
			H.COLORPFD
			FROM PRODUCTIONDEMAND A 
			LEFT JOIN 
				(SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE, PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE FROM 
				PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
				GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) B
			ON A.CODE=B.PRODUCTIONDEMANDCODE
			LEFT JOIN 
				(SELECT SALESORDER.ORDERPARTNERBRANDCODE, SALESORDER.EXTERNALREFERENCE AS PO_HEADER, SALESORDER.INTERNALREFERENCE AS STYLE_HEADER, SALESORDERLINE.SALESORDERCODE, SALESORDERLINE.ORDERLINE, SALESORDERLINE.EXTERNALREFERENCE AS PO_LINE, SALESORDERLINE.INTERNALREFERENCE AS STYLE_LINE,
				SALESORDERLINE.ITEMDESCRIPTION, SALESORDERLINE.SUBCODE03, SALESORDERLINE.SUBCODE05, SUM(SALESORDERLINE.BASEPRIMARYQUANTITY) AS QTY_ORDER, SUM(SALESORDERLINE.BASESECONDARYQUANTITY) AS QTY_PANJANG_ORDER, SALESORDERLINE.BASEPRIMARYUOMCODE AS QTY_PANJANG_ORDER_UOM,
				SALESORDERLINE.BASESECONDARYUOMCODE AS QTY_PANJANG_ORDER_SCND_UOM, SALESORDERLINE.CREATIONUSER, SALESORDERDELIVERY.DELIVERYDATE, SALESORDERLINE.ABSUNIQUEID, ITXVIEWORDERITEMLINKACTIVE.LONGDESCRIPTION AS NO_ITEM, ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER
				FROM SALESORDER SALESORDER
				LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESORDER.CODE=SALESORDERLINE.SALESORDERCODE 
				LEFT JOIN SALESORDERDELIVERY SALESORDERDELIVERY ON SALESORDERLINE.SALESORDERCODE=SALESORDERDELIVERY.SALESORDERLINESALESORDERCODE AND SALESORDERLINE.ORDERLINE=SALESORDERDELIVERY.SALESORDERLINEORDERLINE
				LEFT JOIN ITXVIEWORDERITEMLINKACTIVE ITXVIEWORDERITEMLINKACTIVE ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ITXVIEWORDERITEMLINKACTIVE.ORDPRNCUSTOMERSUPPLIERCODE AND SALESORDERLINE.ITEMTYPEAFICODE= ITXVIEWORDERITEMLINKACTIVE.ITEMTYPEAFICODE AND 
				SALESORDERLINE.SUBCODE01 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE01 AND SALESORDERLINE.SUBCODE02 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE02 AND SALESORDERLINE.SUBCODE03 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE03 AND
				SALESORDERLINE.SUBCODE04 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE04 AND SALESORDERLINE.SUBCODE05 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE05 AND SALESORDERLINE.SUBCODE06 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE06 AND 
				SALESORDERLINE.SUBCODE07 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE07 AND SALESORDERLINE.SUBCODE08 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE08 AND SALESORDERLINE.SUBCODE09 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE09 AND 
				SALESORDERLINE.SUBCODE10 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE10
				LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND 
				ON SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE AND SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE 
				GROUP BY SALESORDER.ORDERPARTNERBRANDCODE, SALESORDER.EXTERNALREFERENCE, SALESORDER.INTERNALREFERENCE, SALESORDERLINE.SALESORDERCODE, SALESORDERLINE.ORDERLINE, SALESORDERLINE.EXTERNALREFERENCE, SALESORDERLINE.INTERNALREFERENCE, SALESORDERLINE.ITEMDESCRIPTION, SALESORDERLINE.SUBCODE03, SALESORDERLINE.SUBCODE05,
				SALESORDERLINE.BASEPRIMARYUOMCODE,SALESORDERLINE.BASESECONDARYUOMCODE, SALESORDERLINE.CREATIONUSER, SALESORDERDELIVERY.DELIVERYDATE, SALESORDERLINE.ABSUNIQUEID, ITXVIEWORDERITEMLINKACTIVE.LONGDESCRIPTION, ORDERPARTNERBRAND.LONGDESCRIPTION) C
			ON A.ORIGDLVSALORDLINESALORDERCODE = C.SALESORDERCODE AND A.SUBCODE03 = C.SUBCODE03 AND A.ORIGDLVSALORDERLINEORDERLINE = C.ORDERLINE
			LEFT JOIN
				(SELECT PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
				PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10,  
				ADSTORAGE.VALUEDECIMAL
				FROM PRODUCT PRODUCT LEFT JOIN ADSTORAGE ADSTORAGE ON PRODUCT.ABSUNIQUEID=ADSTORAGE.UNIQUEID
				WHERE ADSTORAGE.NAMENAME ='GSM'
				GROUP BY PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
				PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10, ADSTORAGE.VALUEDECIMAL) D
			ON A.SUBCODE01=D.SUBCODE01 AND
			A.SUBCODE02=D.SUBCODE02 AND
			A.SUBCODE03=D.SUBCODE03 AND 
			A.SUBCODE04=D.SUBCODE04 AND
			A.SUBCODE05=D.SUBCODE05 AND 
			A.SUBCODE06=D.SUBCODE06 AND 
			A.SUBCODE07=D.SUBCODE07 AND 
			A.SUBCODE08=D.SUBCODE08 AND 
			A.SUBCODE09=D.SUBCODE09 AND 
			A.SUBCODE10=D.SUBCODE10
			LEFT JOIN
				(SELECT PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
				PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10,  
				ADSTORAGE.VALUEDECIMAL
				FROM PRODUCT PRODUCT LEFT JOIN ADSTORAGE ADSTORAGE ON PRODUCT.ABSUNIQUEID=ADSTORAGE.UNIQUEID
				WHERE ADSTORAGE.NAMENAME ='Width'
				GROUP BY PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
				PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10,ADSTORAGE.VALUEDECIMAL) E
			ON A.SUBCODE01=E.SUBCODE01 AND
			A.SUBCODE02=E.SUBCODE02 AND
			A.SUBCODE03=E.SUBCODE03 AND 
			A.SUBCODE04=E.SUBCODE04 AND
			A.SUBCODE05=E.SUBCODE05 AND 
			A.SUBCODE06=E.SUBCODE06 AND 
			A.SUBCODE07=E.SUBCODE07 AND 
			A.SUBCODE08=E.SUBCODE08 AND 
			A.SUBCODE09=E.SUBCODE09 AND 
			A.SUBCODE10=E.SUBCODE10
			LEFT JOIN
				(SELECT BUSINESSPARTNER.LEGALNAME1,ORDERPARTNER.CUSTOMERSUPPLIERCODE FROM BUSINESSPARTNER BUSINESSPARTNER 
				LEFT JOIN ORDERPARTNER ORDERPARTNER ON BUSINESSPARTNER.NUMBERID=ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID) F
			ON A.CUSTOMERCODE=F.CUSTOMERSUPPLIERCODE
			LEFT JOIN ITXVIEWCOLOR ITXVIEWCOLOR ON 
			A.ITEMTYPEAFICODE = ITXVIEWCOLOR.ITEMTYPECODE AND 
			A.SUBCODE01=ITXVIEWCOLOR.SUBCODE01 AND
			A.SUBCODE02=ITXVIEWCOLOR.SUBCODE02 AND
			A.SUBCODE03=ITXVIEWCOLOR.SUBCODE03 AND 
			A.SUBCODE04=ITXVIEWCOLOR.SUBCODE04 AND
			A.SUBCODE05=ITXVIEWCOLOR.SUBCODE05 AND 
			A.SUBCODE06=ITXVIEWCOLOR.SUBCODE06 AND 
			A.SUBCODE07=ITXVIEWCOLOR.SUBCODE07 AND 
			A.SUBCODE08=ITXVIEWCOLOR.SUBCODE08 AND 
			A.SUBCODE09=ITXVIEWCOLOR.SUBCODE09 AND 
			A.SUBCODE10=ITXVIEWCOLOR.SUBCODE10
			LEFT JOIN 
				(SELECT ADSTORAGE.UNIQUEID, ADSTORAGE.VALUESTRING AS COLORPFD FROM ADSTORAGE ADSTORAGE WHERE TRIM(ADSTORAGE.NAMENAME)='ColorPFD') H 
			ON C.ABSUNIQUEID=H.UNIQUEID
			LEFT JOIN PRODUCT PRODUCT ON 
			A.ITEMTYPEAFICODE = PRODUCT.ITEMTYPECODE AND 
			A.SUBCODE01=PRODUCT.SUBCODE01 AND
			A.SUBCODE02=PRODUCT.SUBCODE02 AND
			A.SUBCODE03=PRODUCT.SUBCODE03 AND 
			A.SUBCODE04=PRODUCT.SUBCODE04 AND
			A.SUBCODE05=PRODUCT.SUBCODE05 AND 
			A.SUBCODE06=PRODUCT.SUBCODE06 AND 
			A.SUBCODE07=PRODUCT.SUBCODE07 AND 
			A.SUBCODE08=PRODUCT.SUBCODE08 AND 
			A.SUBCODE09=PRODUCT.SUBCODE09 AND 
			A.SUBCODE10=PRODUCT.SUBCODE10
			WHERE A.CODE='$nodemand'";
// echo $sqlDB2;
$stmt = db2_exec($conn1, $sqlDB2, array('cursor' => DB2_SCROLLABLE));
$rowdb2 = db2_fetch_assoc($stmt);
if(!empty($nodemand)){
	// Buat ambil PO BON ORDER
	 $qdb21 = "SELECT 
			* 
				FROM ITXVIEWBONORDER i 
			WHERE
				i.DEMAND ='$nodemand'";
	$stmt2 = db2_exec($conn1, $qdb21);
	$rowdb21 = db2_fetch_assoc($stmt2);

	// Buat Total KG & YDS
	// Cek apakah EXTERNALREFERENCE mengandung tanda kutip tunggal
	$externalReference = $rowdb21['EXTERNALREFERENCE'];
	if (strpos($externalReference, "'") !== false) {
		// Jika ada tanda kutip, gunakan pencarian LIKE tanpa tanda kutip
		$externalReferenceCondition = "i.EXTERNALREFERENCE LIKE '%" . str_replace("'", "''", $externalReference) . "%'";
	} else {
		// Jika tidak ada tanda kutip, gunakan pencarian sama persis
		$externalReferenceCondition = "i.EXTERNALREFERENCE = '" . $externalReference . "'";
	}

	 $qdb22 = "SELECT 
			* 
			FROM ITXVIEW_TOTAL_BONORDER_ITEM i 
			WHERE
				i.CODE ='" . $rowdb21['SALESORDERCODE'] . "'
				AND i.SUBCODE02 ='" . $rowdb21['SUBCODE02'] . "'
				AND i.SUBCODE03 ='" . $rowdb21['SUBCODE03'] . "'
				AND i.SUBCODE05 ='" . $rowdb21['SUBCODE05'] . "'
				AND $externalReferenceCondition
			";
	$stmt3 = db2_exec($conn1, $qdb22);
	$rowdb22 = db2_fetch_assoc($stmt3);

	$dt_penghubung = "SELECT 
					* 
					FROM tbl_qcf
					WHERE nodemand ='$nodemand'";
	$exec = mysqli_query($con,$dt_penghubung );
	$penghubung = mysqli_fetch_array($exec);
} else {
	'';
}

//GRAMASI
$posg = strpos($rowdb2['GRAMASI'], ".");
$valgramasi = substr($rowdb2['GRAMASI'], 0, $posg);
//LEBAR
$posl = strpos($rowdb2['LEBAR'], ".");
$vallebar = substr($rowdb2['LEBAR'], 0, $posl);

$sqlCek = mysqli_query($con, "SELECT a.*,
												GROUP_CONCAT( DISTINCT b.no_ncp SEPARATOR ', ' ) AS no_ncp,
												GROUP_CONCAT( DISTINCT b.masalah SEPARATOR ', ' ) AS masalah_ncp 
												FROM tbl_aftersales_now a LEFT JOIN tbl_ncp_qcf b ON a.nodemand=b.nodemand WHERE a.nodemand='$nodemand'
												GROUP BY a.nodemand
											ORDER BY a.id DESC LIMIT 1");
// if(!$sqlCek || mysqli_num_rows($sqlCek) == 0){
// 	$cek=mysqli_num_rows($sqlCek);
// }
$cek = mysqli_num_rows($sqlCek);
$rcek = mysqli_fetch_array($sqlCek);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Input Data Kartu </h3>
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
						<input name="nokk" type="hidden" class="form-control" id="nokk"
							value="<?php echo $rowdb2['PRODUCTIONORDERCODE']; ?>">
						<input name="nodemand" type="text" class="form-control" id="nodemand"
							onchange="window.location='KPENew-'+this.value" value="<?php echo $_GET['nodemand']; ?>"
							placeholder="No Demand" required>
					</div>
					<font color="red">
						<?php
						if ($cek > 0) {
							// echo "Sudah Input Pada Tgl: " . $rcek['tgl_buat'] . " | ";
							$qm = mysqli_query($con, "SELECT 
															group_concat(masalah_dominan) as masalah_dominan
														from tbl_aftersales_now
														where nodemand = '$_GET[nodemand]'
														group by nodemand");
							$riqm = mysqli_fetch_array($qm);
							echo "Sudah Input : (" . $riqm['masalah_dominan'] . ") | ";
						}
						if (!empty($rcek['no_ncp'])) {
							echo $rcek['no_ncp'];
						}
						?>
					</font>
				</div>
				<div class="form-group">
					<label for="no_order" class="col-sm-3 control-label">No Order</label>
					<div class="col-sm-4">
						<input name="no_order" type="text" class="form-control" id="no_order" value="<?php if ($cek > 0) {
							echo $rcek['no_order'];
						} else {
							echo $rowdb2['SALESORDERCODE'];
						} ?>" placeholder="No Order" required>
					</div>
					<font color="red">
						<?php if ($rcek['masalah_ncp'] != "") {
							echo "Analisa Kerusakan: " . $rcek['masalah_ncp'];
						} ?>
					</font>
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
									<input type="radio" name="status_penghubung" value="terima" required> Yes
								</label>
								&nbsp;&nbsp;&nbsp;
								<label>
									<input type="radio" name="status_penghubung" value="tolak" required> No
								</label>
								<br><br>
							</form>
						</div>
					</div>
				<?php }?>

				<div class="form-group">
					<label for="no_po" class="col-sm-3 control-label">Pelanggan</label>
					<div class="col-sm-6">
						<input name="pelanggan" type="text" class="form-control" id="no_po" value="<?php if ($cek > 0) {
							echo $rcek['langganan'];
						} else {
							if ($rowdb2['LEGALNAME1'] != "") {
								echo $rowdb2['LEGALNAME1'] . "/" . $rowdb2['BUYER'];
							}
						} ?>" placeholder="Pelanggan">
						<input name="pelanggan1" type="hidden" class="form-control" id="pelanggan1" value="<?php if ($cek > 0) {
							echo $rcek['pelanggan'];
						} else {
							if ($rowdb2['LEGALNAME1'] != "") {
								echo $rowdb2['LEGALNAME1'];
							}
						} ?>" placeholder="Pelanggan">
					</div>
				</div>
				<div class="form-group">
					<label for="no_po" class="col-sm-3 control-label">PO</label>
					<div class="col-sm-5">
						<input name="no_po" type="text" class="form-control" id="no_po" value="<?php if ($cek > 0) {
							echo $rcek['po'];
						} else {
							echo $rowdb2['PO_NUMBER'];
						} ?>" placeholder="PO">
					</div>
				</div>
				<div class="form-group">
					<label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
					<div class="col-sm-3">
						<input name="no_hanger" type="text" class="form-control" id="no_hanger" value="<?php if ($cek > 0) {
							echo $rcek['no_hanger'];
						} else {
							echo $rowdb2['SUBCODE02'] . $rowdb2['SUBCODE03'];
						} ?>" placeholder="No Hanger">
					</div>
					<div class="col-sm-3">
						<input name="no_item" type="text" class="form-control" id="no_item" value="<?php if ($rcek['no_item'] != "") {
							echo $rcek['no_item'];
						} else {
							echo $rowdb2['NO_ITEM'];
						} ?>" placeholder="No Item">
					</div>
				</div>
				<!-- <div class="form-group">
					<label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
					<div class="col-sm-8"> -->
				<input name="jns_kain" type="hidden" class="form-control" id="jns_kain" value="<?php if ($cek > 0 && $rcek['jenis_kain'] != "") {
					echo $rcek['jenis_kain'];
				} else {
					echo stripslashes($rowdb2['JENIS_KAIN']);
				} ?>" placeholder="Jenis Kain">
				<!-- </div>
				</div>
				<div class="form-group">
					<label for="styl" class="col-sm-3 control-label">Style</label>
					<div class="col-sm-8"> -->
				<input name="styl" type="hidden" class="form-control" id="styl" value="<?php if ($cek > 0 && $rcek['styl'] != "") {
					echo $rcek['styl'];
				} else {
					echo $rowdb2['DATA_STYLE'];
				} ?>" placeholder="Style">
				<!-- </div>
				</div> -->
				<div class="form-group">
					<label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
					<div class="col-sm-2">
						<input name="lebar" type="text" class="form-control" id="lebar" value="<?php if ($cek > 0) {
							echo $rcek['lebar'];
						} else {
							echo $vallebar;
						} ?>" placeholder="0" required>
					</div>
					<div class="col-sm-2">
						<input name="grms" type="text" class="form-control" id="grms" value="<?php if ($cek > 0) {
							echo $rcek['gramasi'];
						} else {
							echo $valgramasi;
						} ?>" placeholder="0" required>
					</div>
				</div>
				<div class="form-group">
					<label for="warna" class="col-sm-3 control-label">Warna / No Warna</label>
					<div class="col-sm-4">
						<input name="warna" type="text" class="form-control" id="warna" value="<?php if ($cek > 0) {
							echo $rcek['warna'];
						} else {
							if ($rowdb2['WARNA'] == "PFD") {
								echo stripslashes($rowdb2['WARNA']) . " (" . $rowdb2['COLORPFD'] . ")";
							} else {
								echo stripslashes($rowdb2['WARNA']);
							}
						} ?>" placeholder="Warna">
					</div>
					<div class="col-sm-4">
						<input name="no_warna" type="text" class="form-control" id="no_warna" value="<?php if ($cek > 0) {
							echo $rcek['no_warna'];
						} else {
							echo stripslashes($rowdb2['NO_WARNA']);
						} ?>" placeholder="No Warna">
					</div>
				</div>
				<div class="form-group">
					<label for="lot" class="col-sm-3 control-label">Lot</label>
					<div class="col-sm-3">
						<input name="lot" type="text" class="form-control" id="lot" value="<?php if ($cek > 0) {
							echo $rcek['lot'];
						} else {
							echo $rowdb2['PRODUCTIONORDERCODE'];
						} ?>" placeholder="Lot">
					</div>
				</div>
				<div class="form-group">
					<label for="proses" class="col-sm-3 control-label">Qty Order</label>
					<div class="col-sm-4">
						<div class="input-group">
							<input name="qty_order" type="text" class="form-control" id="qty_order" value="<?php if ($cek > 0) {
								echo number_format($rcek['qty_order'], 2);
							} else {
								echo number_format($rowdb22['TOTAL_PRIMARY'], 2);
							} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_o" style="font-size: 12px;" id="satuan1">
									<?php
									$units_o = ['KG', 'PCS']; // Define the units you want to check for
									
									foreach ($units_o as $unit_o) {
										$isSelected_o = ($rcek['satuan_o'] == $unit_o) || (strtolower($rowdb2['QTY_PANJANG_ORDER_UOM']) == strtolower($unit_o));
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
							<input name="qty_order2" type="text" class="form-control" id="qty_order2" value="<?php if ($cek > 0 && $rcek['qty_order2'] != "") {
								echo number_format($rcek['qty_order2'], 2);
							} else {
								echo number_format($rowdb22['TOTAL_SECONDARY'], 2);
							} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_o2" style="font-size: 12px;" id="satuan1">
									<?php
									$units_o = ['YD', 'MTR']; // Define the units you want to check for
									
									foreach ($units_o as $unit_o) {
										$isSelected_o = ($rcek['satuan_o2'] == $unit_o) || (strtolower($rowdb2['QTY_PANJANG_ORDER_UOM']) == strtolower($unit_o));
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
							//echo $rcek['qty_kirim'];
						} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_k" style="font-size: 12px;" id="satuan_k">
									<?php
									$units_k = ['KG', 'PCS']; // Define the units you want to check for
									
									foreach ($units_k as $unit_k) {
										$isSelected_k = ($rcek['satuan_k'] == $unit_k);
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
							//echo $rcek['qty_kirim'];
						} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_k2" style="font-size: 12px;" id="satuan_k2">
									<?php
									$units_k = ['YD', 'MTR']; // Define the units you want to check for
									
									foreach ($units_k as $unit_k) {
										$isSelected_k = ($rcek['satuan_k2'] == $unit_k);
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
							//echo $rcek['qty_claim'];
						} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_c" style="font-size: 12px;" id="satuan_c">
									<?php
									$units_c = ['KG', 'PCS']; // Define the units you want to check for
									
									foreach ($units_c as $unit_c) {
										$isSelected_c = ($rcek['satuan_c'] == $unit_c);
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
							//echo $rcek['qty_claim'];
						} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_c2" style="font-size: 12px;" id="satuan_c2">
									<?php
									$units_c = ['YD', 'MTR']; // Define the units you want to check for
									
									foreach ($units_c as $unit_c) {
										$isSelected_c = ($rcek['satuan_c2'] == $unit_c);
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
							//echo $rcek['qty_foc'];
						} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_f" style="font-size: 12px;" id="satuan_f">
									<?php
									$units_f = ['KG', 'PCS']; // Define the units you want to check for
									
									foreach ($units_f as $unit_f) {
										$isSelected_f = ($rcek['satuan_f'] == $unit_f);
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
							//echo $rcek['qty_foc'];
						} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">
								<select name="satuan_f2" style="font-size: 12px;" id="satuan_f2">
									<?php
									$units_f = ['YD', 'MTR']; // Define the units you want to check for
									
									foreach ($units_f as $unit_f) {
										$isSelected_f = ($rcek['satuan_f2'] == $unit_f);
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
							while ($dept = mysqli_fetch_array($qryDept)) {
								echo "<option value=\"{$dept['nama']}\">{$dept['nama']}</option>";
							}
							?>

						</select>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<input name="persen" type="text" class="form-control" id="persen" value="<?php if ($cek > 0) {
							//echo $rcek['persen'];
						} ?>" placeholder="0.00" style="text-align: right;">
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
							while ($dept1 = mysqli_fetch_array($qryDept)) {
								echo "<option value=\"{$dept1['nama']}\">{$dept1['nama']}</option>";
							}
							?>

						</select>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<input name="persen1" type="text" class="form-control" id="persen1" value="<?php if ($cek > 0) {
							//echo $rcek['persen1'];
						} ?>" placeholder="0.00" style="text-align: right;">
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
							$qryDept = mysqli_query($con, "SELECT * FROM filter_dept");
							while ($dept2 = mysqli_fetch_array($qryDept)) {
								echo "<option value=\"{$dept2['nama']}\">{$dept2['nama']}</option>";
							}
							?>

						</select>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<input name="persen2" type="text" class="form-control" id="persen2" value="<?php if ($cek > 0) {
							// echo $rcek['persen2'];
						} ?>" placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">%</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="masalah_dominan" class="col-sm-3 control-label">Masalah Dominan / Solusi</label>
					<div class="col-sm-4">
						<div class="input-group">
							<select class="form-control select2" name="masalah_dominan" id="masalah_dominan"
								onchange="masalah_dominan_solusi(this)">
								<option value="">Pilih</option>
								<?php
								$qryma = mysqli_query($con, "select
																	group_concat(masalah_dominan) as masalah_dominan
																from tbl_aftersales_now
																where nodemand = '$_GET[nodemand]'
																group by nodemand");
								$riQryma = mysqli_fetch_array($qryma);
								$qrym = mysqli_query($con, "SELECT masalah FROM tbl_masalah_aftersales ORDER BY masalah ASC");
								while ($rm = mysqli_fetch_array($qrym)) {

									$disabled = in_array($rm['masalah'], explode(',', $riQryma['masalah_dominan'])) ? "disabled" : '';
									?>
									<option value="<?= $rm['masalah']; ?>" <?= $disabled ?>>
										<?php echo $rm['masalah']; ?>
									</option>
								<?php } ?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default"
									data-toggle="modal" data-target="#DataMasalah"> ...</button></span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<select class="form-control select2" name="solusi" id="solusi">
								<option value="">Pilih</option>
								<?php
								$qrys = mysqli_query($con, "SELECT solusi FROM tbl_solusi ORDER BY solusi ASC");
								while ($rs = mysqli_fetch_array($qrys)) {
									?>
									<option value="<?php echo $rs['solusi']; ?>" <?php if ($rcek['solusi'] == $rs['solusi']) {
									   //echo "SELECTED";
							   	} ?>>
										<?php echo $rs['solusi']; ?>
									</option>
								<?php } ?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default"
									data-toggle="modal" data-target="#DataSolusi"> ...</button></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="masalah" class="col-sm-3 control-label">Masalah / Keterangan</label>
					<div class="col-sm-3">
						<input name="masalah" type="text" class="form-control" id="masalah" value="<?php if ($cek > 0) {
						//echo $rcek['masalah'];
					} ?>" placeholder="Masalah">
					</div>
					<div class="col-sm-3">
						<input name="ket" type="text" class="form-control" id="ket" value="<?php if ($cek > 0) {
						//echo $rcek['ket'];
					} ?>" placeholder="Keterangan">
					</div>
					<div class="col-sm-2">
						<input type="checkbox" name="sts_claim" id="sts_claim" value="1" <?php if ($rcek['sts_claim'] == "1") {
						//echo "checked";
					} ?>>
						<label> Claim</label>
					</div>
				</div>
				<div class="form-group">
					<!-- <div class="col-sm-3"> -->
						<!-- <input type="checkbox" name="sts_red" id="sts_red" value="1" onClick="aktif1();" <?php if ($rcek['sts_red'] == "1") {
						//echo "checked";
					} ?>> -->
						<!-- <label> Red Category Email</label> -->
					<!-- </div> -->
					<label for="leadtime_email" class="col-sm-3 control-label">Leadtime Email</label>
					<div class="col-sm-3">
						<select class="form-control select2" name="leadtime_email" required <?php if ($rcek['sts_red'] != "1") {
						//echo "disabled";
					} else {
						//echo "enabled";
					} ?>>
							<option value="">Pilih</option>
							<option value="1 Hari Kerja" <?php if ($rcek['leadtime_email'] == "1 Hari Kerja") {
							//echo "SELECTED";
						} ?>>1 Hari Kerja</option>
							<option value="2 Hari Kerja" <?php if ($rcek['leadtime_email'] == "2 Hari Kerja") {
							//echo "SELECTED";
						} ?>>2 Hari Kerja</option>
							<option value="3 Hari Kerja" <?php if ($rcek['leadtime_email'] == "3 Hari Kerja") {
							//echo "SELECTED";
						} ?>>3 Hari Kerja</option>
							<option value="4 Hari Kerja" <?php if ($rcek['leadtime_email'] == "4 Hari Kerja") {
							//echo "SELECTED";
						} ?>>4 Hari Kerja</option>
							<option value="5 Hari Kerja" <?php if ($rcek['leadtime_email'] == "5 Hari Kerja") {
							//echo "SELECTED";
						} ?>>5 Hari Kerja</option>
							<option value="6 Hari Kerja" <?php if ($rcek['leadtime_email'] == "6 Hari Kerja") {
							//echo "SELECTED";
						} ?>>6 Hari Kerja</option>
						</select>
					</div>

				<label for="klasifikasi" class="col-sm-2 control-label">Klasifikasi</label>
					<div class="col-sm-3">
					<?php 
                 $fil_penyebab = mysqli_query($con, "SELECT * 
				 									FROM tbl_penyebab 
													WHERE field_name = 'penyebab' ");
                 $dklasifikasi = mysqli_fetch_all($fil_penyebab, MYSQLI_ASSOC);?>
						<select class="form-control select2" name="klasifikasi" <?php if ($rcek['sts_red'] != "1") {
						//echo "disabled";
					} else {
						//echo "enabled";
					} ?>>
							<option value="">Pilih</option>
							<?php foreach ($dklasifikasi as $penyebab): ?>
                        <option value="<?php echo $penyebab['name']; ?>" <?php if ($rcek['klasifikasi'] == $penyebab['name']) { echo "SELECTED"; } ?>>
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
							//echo "SELECTED";
						} ?>>1 Hari Kerja</option>
							<option value="2 Hari Kerja" <?php if ($rcek['leadtime_update'] == "2 Hari Kerja") {
							//echo "SELECTED";
						} ?>>2 Hari Kerja</option>
							<option value="3 Hari Kerja" <?php if ($rcek['leadtime_update'] == "3 Hari Kerja") {
							//echo "SELECTED";
						} ?>>3 Hari Kerja</option>
							<option value="4 Hari Kerja" <?php if ($rcek['leadtime_update'] == "4 Hari Kerja") {
							//echo "SELECTED";
						} ?>>4 Hari Kerja</option>
							<option value="5 Hari Kerja" <?php if ($rcek['leadtime_update'] == "5 Hari Kerja") {
							//echo "SELECTED";
						} ?>>5 Hari Kerja</option>
							<option value="6 Hari Kerja" <?php if ($rcek['leadtime_update'] == "6 Hari Kerja") {
							//echo "SELECTED";
						} ?>>6 Hari Kerja</option>
						</select>
					</div>
					<div class="col-sm-3">
						<input type="checkbox" name="sts_disposisipro" id="sts_disposisipro" onClick="aktif3();"
							value="1" <?php if ($rcek['sts_disposisipro'] == "1") {
							//echo "checked";
						} ?> >
						<label> Disposisi Produksi</label>
					</div>
				</div>

				<div class="form-group">
					<label for="leadtime_email" class="col-sm-3 control-label">HOD / Tgl Solusi Akhir</label>

					<div class="col-sm-4">
						<div class="input-group date">
							<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
							<input name="hod" type="text" class="form-control pull-right" id="datepicker4"
								placeholder="0000-00-00" value="<?php if ($cek > 0) {
								//echo $rcek['hod'];
							} ?>" />
						</div>
					</div>

					<div class="col-sm-4">
						<div class="input-group date">
							<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
							<input name="tgl_solusi_akhir" type="text" class="form-control pull-right" id="datepicker2"
								placeholder="0000-00-00" value="<?php if ($cek > 0) {
								//echo $rcek['tgl_solusi_akhir'];
							} ?>" <?php if ($rcek['sts_red'] != "1") {
							 //echo "";
						 } else {
							 //echo "";
						 } ?> />
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
								//echo $rcek['tgl_email'];
							} ?>" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="tgl_email" class="col-sm-3 control-label">Tgl Email / Tgl Jawab</label>
					<div class="col-sm-4">
						<div class="input-group date">
							<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
							<input name="tgl_email" type="text" class="form-control pull-right" id="datepicker"
								placeholder="0000-00-00" value="<?php if ($cek > 0) {
								//echo $rcek['tgl_email'];
							} ?>" required />
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group date">
							<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
							<input name="tgl_jawab" type="text" class="form-control pull-right" id="datepicker1"
								placeholder="0000-00-00" value="<?php if ($cek > 0) {
								//echo $rcek['tgl_jawab'];
							} ?>" <?php if ($rcek['sts_red'] != "1") {
							 //echo "";
						 } else {
							 //echo "";
						 } ?> required />
						</div>
					</div>

				</div>

				<div class="form-group">
					<!-- <div class="col-sm-3">
						<input type="checkbox" name="sts" id="sts" value="1" onClick="aktif();" <?php if ($rcek['sts'] == "1") {
						//echo "checked";
					} ?> >
						<label> Lolos QC</label>
					</div> -->
					<!-- <div class="col-sm-3">
						<input type="checkbox" name="sts_disposisiqc" id="sts_disposisiqc" onClick="aktif2();" value="1"
							<?php if ($rcek['sts_disposisiqc'] == "1") {
							//echo "checked";
						} ?> >
						<label> Disposisi QC</label>
					</div> -->
					<!-- <div class="col-sm-3">
						<input type="checkbox" name="sts_disposisipro" id="sts_disposisipro" onClick="aktif3();"
							value="1" <?php if ($rcek['sts_disposisipro'] == "1") {
							//echo "checked";
						} ?> >
						<label> Disposisi Produksi</label>
					</div> -->
					<!-- <div class="col-sm-3">
						<input type="checkbox" name="sts_nego" id="sts_nego" onClick="aktif5();" value="1" <?php if ($rcek['sts_nego'] == "1") {
						//echo "checked";
					} ?>>
						<label> Nego Aftersales</label>
					</div> -->
				</div>
				<div class="form-group">
					<label for="kategori" class="col-sm-3 control-label">Route Cause</label>
					<div class="col-sm-3">
						<div class="input-group">
							<select class="form-control select2" name="kategori" id="kategori">
								<option value="">Pilih</option>
								<?php
								$qryk = mysqli_query($con, "SELECT kategori FROM tbl_kategori_aftersales ORDER BY kategori ASC");
								while ($rk = mysqli_fetch_array($qryk)) {
									?>
									<option value="<?php echo $rk['kategori']; ?>" <?php if ($rcek['kategori'] == $rk['kategori']) {
									   //echo "SELECTED";
							   	} ?>>
										<?php echo $rk['kategori']; ?>
									</option>
								<?php } ?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default"
									data-toggle="modal" data-target="#DataKategori"> ...</button></span>
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
							<input name="qty_lolos" type="text" class="form-control" id="qty_lolos"
								value="<?= ($cek > 0 && !is_null($rcek['qty_lolos']) && !empty($rcek['qty_lolos'])) ? number_format($rcek['qty_lolos'], 2) : '' ?>"
								placeholder="0.00" style="text-align: right;" disabled>
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
						<input type="checkbox" name="addpersonil" id="addpersonil" value="1" onClick="aktif6();" <?php if ($rcek['addpersonil'] == "1") {
						//echo "checked";
					} ?>>
						<label> > 2 Personil</label>
					</div> -->
				</div>
				<!-- <div class="form-group">
					<label for="personil" class="col-sm-3 control-label">Personil 1 / Personil 2</label>
					<div class="col-sm-4">
						<div class="input-group">
							<select class="form-control select2" name="personil" id="personil">
								<option value="">Pilih</option>
								<?php
								$qryp = mysqli_query($con, "SELECT nama FROM tbl_personil_aftersales WHERE jenis='personil' ORDER BY nama ASC");
								while ($rp = mysqli_fetch_array($qryp)) {
									?>
									<option value="<?php echo $rp['nama']; ?>" <?php if ($rcek['personil'] == $rp['nama']) {
									   //echo "SELECTED";
							   	} ?>>
										<?php echo $rp['nama']; ?>
									</option>
								<?php } ?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default"
									data-toggle="modal" data-target="#DataPersonil"> ...</button></span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<select class="form-control select2" name="personil2" id="personil2">
								<option value="">Pilih</option>
								<?php
								$qryp = mysqli_query($con, "SELECT nama FROM tbl_personil_aftersales WHERE jenis='personil' ORDER BY nama ASC");
								while ($rp = mysqli_fetch_array($qryp)) {
									?>
									<option value="<?php echo $rp['nama']; ?>" <?php if ($rcek['personil2'] == $rp['nama']) {
									   // echo "SELECTED";
							   	} ?>>
										<?php echo $rp['nama']; ?>
									</option>
								<?php } ?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default"
									data-toggle="modal" data-target="#DataPersonil"> ...</button></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="shift" class="col-sm-3 control-label">Shift / Shift2</label>
					<div class="col-sm-3">
						<select class="form-control select2" name="shift" id="shift">
							<option value="">Pilih</option>
							<option value="A" <?php if ($rcek['shift'] == "A") {
							//echo "SELECTED";
						} ?>>A</option>
							<option value="B" <?php if ($rcek['shift'] == "B") {
							//echo "SELECTED";
						} ?>>B</option>
							<option value="C" <?php if ($rcek['shift'] == "C") {
							//echo "SELECTED";
						} ?>>C</option>
							<option value="Non-Shift" <?php if ($rcek['shift'] == "Non-Shift") {
							//echo "SELECTED";
						} ?>>
								Non-Shift</option>
							<option value="QC2" <?php if ($rcek['shift'] == "QC2") {
							//echo "SELECTED";
						} ?>>QC2</option>
							<option value="Test Quality" <?php if ($rcek['shift'] == "Test Quality") {
							//echo "SELECTED";
						} ?>>
								Test Quality</option>
						</select>
					</div>
					<div class="col-sm-3">
						<select class="form-control select2" name="shift2" id="shift2">
							<option value="">Pilih</option>
							<option value="A" <?php if ($rcek['shift2'] == "A") {
							//echo "SELECTED";
						} ?>>A</option>
							<option value="B" <?php if ($rcek['shift2'] == "B") {
							//echo "SELECTED";
						} ?>>B</option>
							<option value="C" <?php if ($rcek['shift2'] == "C") {
							//echo "SELECTED";
						} ?>>C</option>
							<option value="Non-Shift" <?php if ($rcek['shift2'] == "Non-Shift") {
							//echo "SELECTED";
						} ?>>
								Non-Shift</option>
							<option value="QC2" <?php if ($rcek['shift2'] == "QC2") {
							//echo "SELECTED";
						} ?>>QC2</option>
							<option value="Test Quality" <?php if ($rcek['shift2'] == "Test Quality") {
							//echo "SELECTED";
						} ?>>
								Test Quality</option>
						</select>
					</div>
				</div> -->
				<div class="form-group" id="personil34" style="display:none;">
					<label for="personil3" class="col-sm-3 control-label">Personil 3 / Personil 4</label>
					<div class="col-sm-4">
						<div class="input-group">
							<select class="form-control select2" name="personil3" id="personil3">
								<option value="">Pilih</option>
								<?php
								$qryp = mysqli_query($con, "SELECT nama FROM tbl_personil_aftersales WHERE jenis='personil' ORDER BY nama ASC");
								while ($rp = mysqli_fetch_array($qryp)) {
									?>
									<option value="<?php echo $rp['nama']; ?>" <?php if ($rcek['personil3'] == $rp['nama']) {
									   //echo "SELECTED";
							   	} ?>>
										<?php echo $rp['nama']; ?>
									</option>
								<?php } ?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default"
									data-toggle="modal" data-target="#DataPersonil"> ...</button></span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<select class="form-control select2" name="personil4" id="personil4">
								<option value="">Pilih</option>
								<?php
								$qryp = mysqli_query($con, "SELECT nama FROM tbl_personil_aftersales WHERE jenis='personil' ORDER BY nama ASC");
								while ($rp = mysqli_fetch_array($qryp)) {
									?>
									<option value="<?php echo $rp['nama']; ?>" <?php if ($rcek['personil4'] == $rp['nama']) {
									   //echo "SELECTED";
							   	} ?>>
										<?php echo $rp['nama']; ?>
									</option>
								<?php } ?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default"
									data-toggle="modal" data-target="#DataPersonil"> ...</button></span>
						</div>
					</div>
				</div>
				<!-- <div class="form-group" id="shift34" style="display:none;">
					<label for="shift3" class="col-sm-3 control-label">Shift3 / Shift4</label>
					<div class="col-sm-3">
						<select class="form-control select2" name="shift3" id="shift3">
							<option value="">Pilih</option>
							<option value="A" <?php if ($rcek['shift3'] == "A") {
							//echo "SELECTED";
						} ?>>A</option>
							<option value="B" <?php if ($rcek['shift3'] == "B") {
							//echo "SELECTED";
						} ?>>B</option>
							<option value="C" <?php if ($rcek['shift3'] == "C") {
							//echo "SELECTED";
						} ?>>C</option>
							<option value="Non-Shift" <?php if ($rcek['shift3'] == "Non-Shift") {
							//echo "SELECTED";
						} ?>>
								Non-Shift</option>
							<option value="QC2" <?php if ($rcek['shift3'] == "QC2") {
							//echo "SELECTED";
						} ?>>QC2</option>
							<option value="Test Quality" <?php if ($rcek['shift3'] == "Test Quality") {
							//echo "SELECTED";
						} ?>>
								Test Quality</option>
						</select>
					</div>
					<div class="col-sm-3">
						<select class="form-control select2" name="shift4" id="shift4">
							<option value="">Pilih</option>
							<option value="A" <?php if ($rcek['shift4'] == "A") {
							//echo "SELECTED";
						} ?>>A</option>
							<option value="B" <?php if ($rcek['shift4'] == "B") {
							//echo "SELECTED";
						} ?>>B</option>
							<option value="C" <?php if ($rcek['shift4'] == "C") {
							//echo "SELECTED";
						} ?>>C</option>
							<option value="Non-Shift" <?php if ($rcek['shift4'] == "Non-Shift") {
							//echo "SELECTED";
						} ?>>
								Non-Shift</option>
							<option value="QC2" <?php if ($rcek['shift4'] == "QC2") {
							//echo "SELECTED";
						} ?>>QC2</option>
							<option value="Test Quality" <?php if ($rcek['shift4'] == "Test Quality") {
							//echo "SELECTED";
						} ?>>
								Test Quality</option>
						</select>
					</div>
				</div> -->
				<!-- <div class="form-group">
					<label for="subdept" class="col-sm-3 control-label">Sub Dept / Pejabat</label>
					<div class="col-sm-4">
						<select class="form-control select2" name="subdept" id="subdept" onChange="aktif4();" <?php if ($rcek['sts'] != "1" or $rcek['sts_disposisiqc'] != "1") {
						//echo "disabled";
					} else {
						//echo "enabled";
					} ?>>
							<option value="">Pilih</option>
							<option value="ADM" <?php if ($rcek['subdept'] == "ADM") {
							//echo "SELECTED";
						} ?>>ADM</option>
							<option value="AFTERSALES" <?php if ($rcek['subdept'] == "AFTERSALES") {
							//echo "SELECTED";
						} ?>>
								AFTERSALES</option>
							<option value="COLORIST" <?php if ($rcek['subdept'] == "COLORIST") {
							//echo "SELECTED";
						} ?>>COLORIST
							</option>
							<option value="INSPECTION" <?php if ($rcek['subdept'] == "INSPECTION") {
							//echo "SELECTED";
						} ?>>
								INSPECTION</option>
							<option value="KRAGH" <?php if ($rcek['subdept'] == "KRAGH") {
							//echo "SELECTED";
						} ?>>KRAGH
							</option>
							<option value="LEADER" <?php if ($rcek['subdept'] == "LEADER") {
							//echo "SELECTED";
						} ?>>LEADER
							</option>
							<option value="MANAGER/ASST.MANAGER" <?php if ($rcek['subdept'] == "MANAGER/ASST.MANAGER") {
							//echo "SELECTED";
						} ?>>MANAGER/ASST.MANAGER</option>
							<option value="PACKING" <?php if ($rcek['subdept'] == "PACKING") {
							//echo "SELECTED";
						} ?>>PACKING
							</option>
							<option value="SPV" <?php if ($rcek['subdept'] == "SPV") {
							//echo "SELECTED";
						} ?>>SPV</option>
							<option value="TEST QUALITY" <?php if ($rcek['subdept'] == "TEST QUALITY") {
							//echo "SELECTED";
						} ?>>
								TEST QUALITY</option>
						</select>
					</div>
					<div class="col-sm-4">
						<div class="input-group">
							<select class="form-control select2" name="pejabat" id="pejabat" <?php if ($rcek['sts_disposisiqc'] != "1") {
							//echo "disabled";
						} else {
							//echo "enabled";
						} ?>>
								<option value="">Pilih</option>
								<?php
								$qryp = mysqli_query($con, "SELECT nama FROM tbl_personil_aftersales WHERE jenis='pejabat' ORDER BY nama ASC");
								while ($rp = mysqli_fetch_array($qryp)) {
									?>
									<option value="<?php echo $rp['nama']; ?>" <?php if ($rcek['personil'] == $rp['nama']) {
									   //echo "SELECTED";
							   	} ?>>
										<?php echo $rp['nama']; ?>
									</option>
								<?php } ?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default"
									data-toggle="modal" data-target="#DataPejabat"> ...</button></span>
						</div>
					</div>
				</div> -->
				<div class="form-group">
					<label for="penyebab" class="col-sm-3 control-label">Penyebab</label>
					<div class="col-sm-6">
						<input name="penyebab" type="text" class="form-control" id="penyebab" value="<?php if ($cek > 0) {
						//echo $rcek['penyebab'];
					} ?>" placeholder="Penyebab" 
					<?php //if ($rcek['sts'] != "1" or $rcek['sts_disposisiqc'] != "1" or $rcek['sts_disposisipro'] != "1") 
					{
					 //echo "disabled";
				 } //else 
				 {
					 //echo "enabled";
				 } ?>>
					</div>
					<!-- <div class="col-sm-2">
						<select class="form-control select2" name="sts_check" <?php if ($rcek['sts'] != "1" or $rcek['sts_disposisiqc'] != "1") {
						//echo "disabled";
					} else {
						//echo "enabled";
					} ?>>
							<option value="">Pilih</option>
							<option value="Ceklis" <?php if ($rcek['sts_check'] == "Ceklis") {
							//echo "SELECTED";
						} ?>>&#10004;
							</option>
							<option value="Silang" <?php if ($rcek['sts_check'] == "Silang") {
							//echo "SELECTED";
						} ?>>X</option>
						</select>
					</div> -->
				</div>
				<div class="form-group" id="nego1">
					<label for="nama_nego" class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-3">
						<div class="input-group">
							<select class="form-control select2" name="nama_nego" id="nama_nego">
								<option value="">Pilih</option>
								<?php
								$qrynm = mysqli_query($con, "SELECT nama FROM tbl_nama_nego_aftersales ORDER BY nama ASC");
								while ($rnm = mysqli_fetch_array($qrynm)) {
									?>
									<option value="<?php echo $rnm['nama']; ?>" <?php if ($rcek['nama_nego'] == $rnm['nama']) {
									   //echo "SELECTED";
							   	} ?>>
										<?php echo $rnm['nama']; ?>
									</option>
								<?php } ?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default"
									data-toggle="modal" data-target="#DataNamaNego"> ...</button></span>
						</div>
					</div>
					<div class="col-sm-3">
						<select class="form-control select2" name="checknego">
							<option value="">Pilih</option>
							<option value="Ceklis" <?php if ($rcek['checknego'] == "Ceklis") {
							//echo "SELECTED";
						} ?>>&#10004;
							</option>
														<option value="Silang" <?php if ($rcek['checknego'] == "Silang") {
							//echo "SELECTED";
						} ?>>X</option>
						</select>
					</div>
					<div class="col-sm-2">
						<input type="checkbox" name="bprc" id="bprc" value="1" <?php if ($rcek['bprc'] == "1") {
						echo "checked";
					} ?>>
						<label>BPRC</label>
					</div>
				</div>
				<div class="form-group" id="nego2">
					<label for="hasil_nego" class="col-sm-3 control-label">Hasil Negosiasi</label>
					<div class="col-sm-8">
						<input name="hasil_nego" type="text" class="form-control" id="hasil_nego" value="<?php if ($cek > 0) {
						//echo $rcek['hasil_nego'];
					} ?>" placeholder="Hasil Negosiasi">
					</div>
				</div>
			</div>

		</div>
		<div class="box-footer">
			<?php if ($_GET['nodemand'] != "") { ?>
				<button type="submit" class="btn btn-primary pull-right" name="save" value="save" id="save"
					style="display: none"><i class="fa fa-save"></i>
					Simpan</button>
			<?php } ?>
		</div>
		<!-- /.box-footer -->
	</div>
</form>


</div>
</div>
</div>
</div>
<?php

// echo '<div style="padding-left:20em"><pre>';
// print_r($_POST);
// echo '</pre></div>';

if ($_POST['save'] == "save") {
	$nodemand = $_POST['nodemand'];
	$nokk = $_POST['nokk'];
	$masalah_dominan = $_POST['masalah_dominan'];

	// Check if data already exists
	$checkQuery = mysqli_query($con, "SELECT * FROM tbl_aftersales_now WHERE nodemand='$nodemand' AND nokk='$nokk' AND masalah_dominan='$masalah_dominan'");
	if (mysqli_num_rows($checkQuery) > 0) {
		echo "<script>swal({
			title: 'Data Sudah Ada',
			text: 'Data dengan No Demand, No KK, dan Masalah Dominan yang sama sudah ada.',
			type: 'warning',
		});</script>";
	} else {
		$warna = str_replace("'", "''", $_POST['warna']);
		$nowarna = str_replace("'", "''", $_POST['no_warna']);
		$jns = str_replace("'", "''", $_POST['jns_kain']);
		$po = str_replace("'", "''", $_POST['no_po']);
		$masalah = str_replace("'", "''", $_POST['masalah']);
		$ket = str_replace("'", "''", $_POST['ket']);
		$styl = str_replace("'", "''", $_POST['styl']);
		$lot = trim($_POST['lot']);
		$tgl_email = $_POST['tgl_email'];
		$tgl_jawab = $_POST['tgl_jawab'];
		$shift = $_POST['shift'];
		$pos = strpos($_POST['pelanggan'], "/");
		$posbuyer = substr($_POST['pelanggan'], $pos + 1, 50);
		$buyer = str_replace("'", "''", $posbuyer);
		$qty_order = str_replace(",", "", $_POST['qty_order']);
		$qty_order2 = str_replace(",", "", $_POST['qty_order2']);
		$bprc = $_POST['bprc'];
		//$multishift="";
		//foreach($shift as $shift1)  
		//{  
		//	$multishift .= $shift1.",";  
		//}
		if ($_POST['sts'] == "1") {
			$sts = "1";
		} else {
			$sts = "0";
		}
		if ($_POST['sts_red'] == "1") {
			$sts_red = "1";
		} else {
			$sts_red = "0";
		}
		if ($_POST['sts_claim'] == "1") {
			$sts_claim = "1";
		} else {
			$sts_claim = "0";
		}
		if ($_POST['sts_disposisiqc'] == "1") {
			$sts_disposisiqc = "1";
		} else {
			$sts_disposisiqc = "0";
		}
		if ($_POST['sts_disposisipro'] == "1") {
			$sts_disposisipro = "1";
		} else {
			$sts_disposisipro = "0";
		}
		if ($_POST['sts_nego'] == "1") {
			$sts_nego = "1";
		} else {
			$sts_nego = "0";
		}

		$sqlData = mysqli_query($con, "INSERT INTO tbl_aftersales_now SET 
			klasifikasi = '$_POST[klasifikasi]',
			leadtime_update='$_POST[leadtime_update]',
			tanggal_leadtime_update='$_POST[tgl_leadtime_update]',
			status_penghubung='$_POST[status_penghubung]',
			nokk='$nokk',
			nodemand='$nodemand',
			langganan='$_POST[pelanggan]',
			pelanggan='$_POST[pelanggan1]',
			buyer='$buyer',
			no_order='$_POST[no_order]',
			no_hanger='$_POST[no_hanger]',
			no_item='$_POST[no_item]',
			po='$po',
			jenis_kain='$jns',
			styl='$styl',
			lebar='$_POST[lebar]',
			gramasi='$_POST[grms]',
			lot='$lot',
			warna='$warna',
			no_warna='$nowarna',
			masalah='$masalah',
			masalah_dominan='$masalah_dominan',
			qty_order='$qty_order',
			qty_kirim='$_POST[qty_kirim]',
			qty_claim='$_POST[qty_claim]',
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
			penyebab='$_POST[penyebab]',
			subdept='$_POST[subdept]',
			sts='$sts',
			sts_red='$sts_red',
			sts_claim='$sts_claim',
			ket='$ket',
			tgl_email='$tgl_email',
			tgl_jawab='$tgl_jawab',
			tgl_solusi_akhir='$_POST[tgl_solusi_akhir]',
			leadtime_email='$_POST[leadtime_email]',
			solusi='$_POST[solusi]',
			sts_disposisiqc='$sts_disposisiqc',
			sts_disposisipro='$sts_disposisipro',
			sts_nego='$sts_nego',
			bprc='$bprc',
			sts_check='$_POST[sts_check]',
			personil2='$_POST[personil2]',
			pejabat='$_POST[pejabat]',
			nama_nego='$_POST[nama_nego]',
			hasil_nego='$_POST[hasil_nego]',
			kategori='$_POST[kategori]',
			addpersonil='$addpersonil',
			checknego='$_POST[checknego]',
			hod='$_POST[hod]',
			qty_kirim2 = '$_POST[qty_kirim2]',
			qty_claim2 = '$_POST[qty_claim2]',
			qty_order2 = '$qty_order2',
			qty_foc2 = '$_POST[qty_foc2]',
			satuan_k2 = '$_POST[satuan_k2]',
			satuan_c2 = '$_POST[satuan_c2]',
			satuan_o2 = '$_POST[satuan_o2]',
			satuan_f2 = '$_POST[satuan_f2]',
			tgl_buat=now(),
			tgl_update=now()");

		if ($sqlData) {

			echo "<script>swal({
		title: 'Data Tersimpan',   
		text: 'Klik Ok untuk input data kembali',
		type: 'success',
		}).then((result) => {
		if (result.value) {
		window.location.href='KPENew';
		
		}
		});</script>";
		}
	}
}

?>
<script>
	function aktif4() {
		if (document.forms['form1']['sts'].checked == true && (document.forms['form1']['subdept'].value == "TEST QUALITY" || document.forms['form1']['subdept'].value == "COLORIST")) {
			document.form1.personil.removeAttribute("disabled");
			document.form1.personil.removeAttribute("required");
			document.form1.personil2.removeAttribute("disabled");
			document.form1.shift.removeAttribute("disabled");
			document.form1.shift.setAttribute("required", true);
			document.form1.shift2.removeAttribute("disabled");
			document.form1.penyebab.removeAttribute("disabled");
			document.form1.penyebab.setAttribute("required", true);
			document.form1.subdept.removeAttribute("disabled");
			document.form1.subdept.setAttribute("required", true);
			document.form1.pejabat.removeAttribute("disabled");
			document.form1.pejabat.removeAttribute("required");
			document.form1.sts_disposisiqc.setAttribute("disabled", true);
			document.form1.sts_disposisipro.setAttribute("disabled", true);
			document.form1.sts_check.removeAttribute("disabled");
			document.form1.sts_check.setAttribute("required", true);
		}
	}
	// function aktif() {
	// 	if (document.forms['form1']['sts'].checked == true) {
	// 		//document.form1.personil.removeAttribute("disabled");
	// 		//document.form1.personil.setAttribute("required",true);
	// 		//document.form1.personil2.removeAttribute("disabled");
	// 		//document.form1.shift.removeAttribute("disabled");
	// 		//document.form1.shift.setAttribute("required",true);
	// 		//document.form1.shift2.removeAttribute("disabled");
	// 		document.form1.penyebab.removeAttribute("disabled");
	// 		document.form1.penyebab.setAttribute("required", true);
	// 		document.form1.subdept.removeAttribute("disabled");
	// 		document.form1.subdept.setAttribute("required", true);
	// 		document.form1.pejabat.removeAttribute("disabled");
	// 		document.form1.pejabat.removeAttribute("required");
	// 		document.form1.sts_disposisiqc.setAttribute("disabled", true);
	// 		document.form1.sts_disposisipro.setAttribute("disabled", true);
	// 		document.form1.sts_check.removeAttribute("disabled");
	// 		document.form1.sts_check.setAttribute("required", true);
	// 		document.form1.qty_lolos.removeAttribute("disabled");
	// 		document.form1.qty_lolos.setAttribute("required", true);
	// 		document.form1.satuan_l.removeAttribute("disabled");
	// 		document.form1.satuan_l.setAttribute("required", true);
	// 	} else {
	// 		//document.form1.personil.setAttribute("disabled",true);
	// 		//document.form1.personil.removeAttribute("required");
	// 		//document.form1.personil2.setAttribute("disabled",true);
	// 		//document.form1.shift.setAttribute("disabled",true);
	// 		//document.form1.shift.removeAttribute("required");
	// 		//document.form1.shift2.setAttribute("disabled",true);
	// 		document.form1.penyebab.setAttribute("disabled", true);
	// 		document.form1.penyebab.removeAttribute("required");
	// 		document.form1.subdept.setAttribute("disabled", true);
	// 		document.form1.subdept.removeAttribute("required");
	// 		document.form1.pejabat.setAttribute("disabled", true);
	// 		document.form1.pejabat.removeAttribute("required");
	// 		document.form1.sts.removeAttribute("disabled");
	// 		document.form1.sts_disposisipro.removeAttribute("disabled");
	// 		document.form1.sts_check.setAttribute("disabled", true);
	// 		document.form1.sts_check.removeAttribute("required");
	// 		document.form1.qty_lolos.setAttribute("disabled", true);
	// 		document.form1.qty_lolos.removeAttribute("required");
	// 		document.form1.satuan_l.setAttribute("disabled", true);
	// 		document.form1.satuan_l.removeAttribute("required");
	// 	}
	// }
	function aktif1() {
		if (document.forms['form1']['sts_red'].checked == true) {

			//document.form1.tgl_email.removeAttribute("disabled");
			//document.form1.tgl_jawab.removeAttribute("disabled");
			document.form1.leadtime_email.removeAttribute("disabled");
			document.form1.tgl_email.setAttribute("required", true);
			document.form1.tgl_jawab.setAttribute("required", true);
			document.form1.leadtime_email.setAttribute("required", true);

		} else {

			//document.form1.tgl_email.setAttribute("disabled",true);
			//document.form1.tgl_jawab.setAttribute("disabled",true);
			document.form1.leadtime_email.setAttribute("disabled", true);
			document.form1.tgl_email.removeAttribute("required");
			document.form1.tgl_jawab.removeAttribute("required");
			document.form1.leadtime_email.removeAttribute("required");
		}
	}
	// function aktif2() {
	// 	if (document.forms['form1']['sts_disposisiqc'].checked == true) {
	// 		//document.form1.shift.removeAttribute("disabled");
	// 		//document.form1.shift.setAttribute("required",true);
	// 		//document.form1.shift2.removeAttribute("disabled");
	// 		document.form1.pejabat.removeAttribute("disabled");
	// 		document.form1.penyebab.removeAttribute("disabled");
	// 		document.form1.subdept.removeAttribute("disabled");
	// 		document.form1.pejabat.setAttribute("required", true);
	// 		document.form1.penyebab.setAttribute("required", true);
	// 		document.form1.subdept.setAttribute("required", true);
	// 		document.form1.sts.setAttribute("disabled", true);
	// 		document.form1.sts_disposisipro.setAttribute("disabled", true);
	// 		document.form1.sts_check.removeAttribute("disabled");
	// 		document.form1.sts_check.setAttribute("required", true);
	// 		document.form1.qty_lolos.removeAttribute("disabled");
	// 		document.form1.qty_lolos.setAttribute("required", true);
	// 		document.form1.satuan_l.removeAttribute("disabled");
	// 		document.form1.satuan_l.setAttribute("required", true);
	// 	} else {
	// 		//document.form1.shift.setAttribute("disabled",true);
	// 		//document.form1.shift.removeAttribute("required");
	// 		//document.form1.shift2.setAttribute("disabled",true);
	// 		document.form1.pejabat.setAttribute("disabled", true);
	// 		document.form1.penyebab.setAttribute("disabled", true);
	// 		document.form1.subdept.setAttribute("disabled", true);
	// 		document.form1.pejabat.removeAttribute("required");
	// 		document.form1.penyebab.removeAttribute("required");
	// 		document.form1.subdept.removeAttribute("required");
	// 		document.form1.sts.removeAttribute("disabled");
	// 		document.form1.sts_disposisipro.removeAttribute("disabled");
	// 		document.form1.sts_check.setAttribute("disabled", true);
	// 		document.form1.sts_check.removeAttribute("required");
	// 		document.form1.qty_lolos.setAttribute("disabled", true);
	// 		document.form1.qty_lolos.removeAttribute("required");
	// 		document.form1.satuan_l.setAttribute("disabled", true);
	// 		document.form1.satuan_l.removeAttribute("required");
	// 	}
	// }
	// function aktif3() {
	// 	if (document.forms['form1']['sts_disposisipro'].checked == true) {
	// 		document.form1.penyebab.removeAttribute("disabled");
	// 		document.form1.penyebab.setAttribute("required", true);
	// 		document.form1.sts.setAttribute("disabled", true);
	// 		document.form1.sts_disposisiqc.setAttribute("disabled", true);
	// 		document.form1.pejabat.removeAttribute("disabled");
	// 	} else {
	// 		document.form1.penyebab.setAttribute("disabled", true);
	// 		document.form1.penyebab.removeAttribute("required");
	// 		document.form1.sts.removeAttribute("disabled");
	// 		document.form1.sts_disposisiqc.removeAttribute("disabled");
	// 		document.form1.pejabat.setAttribute("disabled", true);
	// 	}
	// }
	// function aktif5() {
	// 	if (document.forms['form1']['sts_nego'].checked == true) {
	// 		$("#nego1").css("display", "");  // To unhide
	// 		$("#nego2").css("display", "");  // To unhide
	// 		document.form1.nama_nego.setAttribute("required", true);
	// 		document.form1.hasil_nego.setAttribute("required", true);
	// 	} else {
	// 		$("#nego1").css("display", "none");  // To hide
	// 		$("#nego2").css("display", "none");  // To hide
	// 		document.form1.nama_nego.removeAttribute("required");
	// 		document.form1.hasil_nego.removeAttribute("required");
	// 	}
	// }
	function aktif6() {
		if (document.forms['form1']['addpersonil'].checked == true) {
			$("#personil34").css("display", "");  // To unhide
			$("#shift34").css("display", "");  // To unhide
			document.form1.personil3.setAttribute("required", true);
			document.form1.shift3.setAttribute("required", true);
		} else {
			$("#personil34").css("display", "none");  // To hide
			$("#shift34").css("display", "none");  // To hide
			document.form1.personil3.removeAttribute("required");
			document.form1.shift3.removeAttribute("required");
		}
	}

	function masalah_dominan_solusi(e) {
		if (e.value != "")
			document.getElementById('save').style.display = 'block';
		else
			document.getElementById('save').style.display = 'none';
	}
</script>
<div class="modal fade" id="DataMasalah">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action=""
				enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Masalah Dominan</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
						<label for="masalah_dominan" class="col-md-3 control-label">Jenis Masalah</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="masalah_dominan" name="masalah_dominan"
								required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<input type="submit" value="Simpan" name="simpan_masalah" id="simpan_masalah"
						class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php
if ($_POST['simpan_masalah'] == "Simpan") {
	$masalah = trim(strtoupper($_POST['masalah_dominan']));
	$sqlData1 = mysqli_query($con, "INSERT INTO tbl_masalah_aftersales SET 
		  masalah='$masalah'");
	if ($sqlData1) {
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
<div class="modal fade" id="DataSolusi">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action=""
				enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Solusi</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
						<label for="nama" class="col-md-3 control-label">Solusi</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="solusi" name="solusi" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<input type="submit" value="Simpan" name="simpan_solusi" id="simpan_solusi"
						class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php
if ($_POST['simpan_solusi'] == "Simpan") {
	$solusi = strtoupper($_POST['solusi']);
	$sqlData1 = mysqli_query($con, "INSERT INTO tbl_solusi SET 
		  solusi='$solusi'");
	if ($sqlData1) {
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
<div class="modal fade" id="DataPersonil">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action=""
				enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Personil</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
						<label for="nama" class="col-md-3 control-label">Nama Personil</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="nama" name="nama" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<input type="submit" value="Simpan" name="simpan_personil" id="simpan_personil"
						class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php
if ($_POST['simpan_personil'] == "Simpan") {
	$nama = strtoupper($_POST['nama']);
	$sqlData1 = mysqli_query($con, "INSERT INTO tbl_personil_aftersales SET 
		  nama='$nama',
		  jenis='personil'");
	if ($sqlData1) {
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
<div class="modal fade" id="DataPejabat">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action=""
				enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Pejabat</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
						<label for="nama" class="col-md-3 control-label">Nama Pejabat</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="nama" name="nama" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<input type="submit" value="Simpan" name="simpan_pejabat" id="simpan_pejabat"
						class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php
if ($_POST['simpan_pejabat'] == "Simpan") {
	$nama = strtoupper($_POST['nama']);
	$sqlData1 = mysqli_query($con, "INSERT INTO tbl_personil_aftersales SET 
		  nama='$nama',
		  jenis='pejabat'");
	if ($sqlData1) {
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
<div class="modal fade" id="DataNamaNego">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action=""
				enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Nama Nego</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
						<label for="nama" class="col-md-3 control-label">Nama Nego</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="nama" name="nama" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<input type="submit" value="Simpan" name="simpan_namanego" id="simpan_namanego"
						class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php
if ($_POST['simpan_namanego'] == "Simpan") {
	$nama = strtoupper($_POST['nama']);
	$sqlData1 = mysqli_query($con, "INSERT INTO tbl_nama_nego_aftersales SET 
		  nama='$nama'");
	if ($sqlData1) {
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
<div class="modal fade" id="DataKategori">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action=""
				enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Kategori Aftersales</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
						<label for="kategori" class="col-md-3 control-label">Kategori</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="kategori" name="kategori" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="keterangan" class="col-md-3 control-label">Keterangan</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="keterangan" name="keterangan" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<input type="submit" value="Simpan" name="simpan_kategori" id="simpan_kategori"
						class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php
if ($_POST['simpan_kategori'] == "Simpan") {
	$kategori = strtoupper($_POST['kategori']);
	$keterangan = strtoupper($_POST['keterangan']);
	$sqlData1 = mysqli_query($con, "INSERT INTO tbl_kategori_aftersales SET 
		  kategori='$kategori',
		  keterangan='$keterangan'");
	if ($sqlData1) {
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