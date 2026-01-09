<?php
ini_set("error_reporting", 1);
include "koneksi.php";
$nodemand = $_GET['nodemand'];
// NOW
	$sql_ITXVIEWKK  = db2_exec($conn1, "SELECT
										TRIM(PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE,
										TRIM(DEAMAND) AS DEMAND,
										ORIGDLVSALORDERLINEORDERLINE,
										PROJECTCODE,
										ORDPRNCUSTOMERSUPPLIERCODE,
										TRIM(SUBCODE01) AS SUBCODE01, TRIM(SUBCODE02) AS SUBCODE02, TRIM(SUBCODE03) AS SUBCODE03, TRIM(SUBCODE04) AS SUBCODE04,
										TRIM(SUBCODE05) AS SUBCODE05, TRIM(SUBCODE06) AS SUBCODE06, TRIM(SUBCODE07) AS SUBCODE07, TRIM(SUBCODE08) AS SUBCODE08,
										TRIM(SUBCODE09) AS SUBCODE09, TRIM(SUBCODE10) AS SUBCODE10, 
										TRIM(ITEMTYPEAFICODE) AS ITEMTYPEAFICODE,
										TRIM(DSUBCODE05) AS NO_WARNA,
										TRIM(DSUBCODE02) || '-' || TRIM(DSUBCODE03)  AS NO_HANGER,
										TRIM(ITEMDESCRIPTION) AS ITEMDESCRIPTION,
										DELIVERYDATE,
										CREATIONUSER_SALESORDER,
										LOT,
										QTY_PACKING_KG,
										QTY_PACKING_YARD
										-- ABSUNIQUEID_DEMAND
										FROM 
										ITXVIEWKK 
										WHERE 
										DEAMAND = '$nodemand'");
	$dt_ITXVIEWKK	= db2_fetch_assoc($sql_ITXVIEWKK);

	$sql_pelanggan_buyer 	= db2_exec($conn1, "SELECT TRIM(LANGGANAN) AS PELANGGAN, TRIM(BUYER) AS BUYER FROM ITXVIEW_PELANGGAN 
														WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$dt_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' 
														AND CODE = '$dt_ITXVIEWKK[PROJECTCODE]'");
	$dt_pelanggan_buyer		= db2_fetch_assoc($sql_pelanggan_buyer);

	$sql_po			= db2_exec($conn1, "SELECT 
												TRIM(EXTERNALREFERENCE) AS NO_PO, 
												SUM(USERPRIMARYQUANTITY) AS QTY_BRUTO 
											FROM 
												ITXVIEW_KGBRUTO 
											WHERE 
												PROJECTCODE = '$dt_ITXVIEWKK[PROJECTCODE]' 	
												AND ORIGDLVSALORDERLINEORDERLINE = '$dt_ITXVIEWKK[ORIGDLVSALORDERLINEORDERLINE]'
											GROUP BY
											EXTERNALREFERENCE");
	$dt_po    		= db2_fetch_assoc($sql_po);

	$sql_noitem     = db2_exec($conn1, "SELECT * FROM ORDERITEMORDERPARTNERLINK WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$dt_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' 
											AND SUBCODE01 = '$dt_ITXVIEWKK[SUBCODE01]' AND SUBCODE02 = '$dt_ITXVIEWKK[SUBCODE02]' 
											AND SUBCODE03 = '$dt_ITXVIEWKK[SUBCODE03]' AND SUBCODE04 = '$dt_ITXVIEWKK[SUBCODE04]' 
											AND SUBCODE05 = '$dt_ITXVIEWKK[SUBCODE05]' AND SUBCODE06 = '$dt_ITXVIEWKK[SUBCODE06]'
											AND SUBCODE07 = '$dt_ITXVIEWKK[SUBCODE07]' AND SUBCODE08 ='$dt_ITXVIEWKK[SUBCODE08]'
											AND SUBCODE09 = '$dt_ITXVIEWKK[SUBCODE09]' AND SUBCODE10 ='$dt_ITXVIEWKK[SUBCODE10]'");
	$dt_item        = db2_fetch_assoc($sql_noitem);

	$sql_lebargramasi	= db2_exec($conn1, "SELECT i.LEBAR,
													CASE
														WHEN i2.GRAMASI_KFF IS NULL THEN i2.GRAMASI_FKF
														ELSE i2.GRAMASI_KFF
													END AS GRAMASI 
													FROM 
														ITXVIEWLEBAR i 
													LEFT JOIN ITXVIEWGRAMASI i2 ON i2.SALESORDERCODE = '$dt_ITXVIEWKK[PROJECTCODE]' AND i2.ORDERLINE = '$dt_ITXVIEWKK[ORIGDLVSALORDERLINEORDERLINE]'
													WHERE 
														i.SALESORDERCODE = '$dt_ITXVIEWKK[PROJECTCODE]' AND i.ORDERLINE = '$dt_ITXVIEWKK[ORIGDLVSALORDERLINEORDERLINE]'");
	$dt_lg				= db2_fetch_assoc($sql_lebargramasi);

	$sql_warna		= db2_exec($conn1, "SELECT DISTINCT TRIM(WARNA) AS WARNA FROM ITXVIEWCOLOR 
											WHERE ITEMTYPECODE = '$dt_ITXVIEWKK[ITEMTYPEAFICODE]' 
											AND SUBCODE01 = '$dt_ITXVIEWKK[SUBCODE01]' 
											AND SUBCODE02 = '$dt_ITXVIEWKK[SUBCODE02]'
											AND SUBCODE03 = '$dt_ITXVIEWKK[SUBCODE03]' 
											AND SUBCODE04 = '$dt_ITXVIEWKK[SUBCODE04]'
											AND SUBCODE05 = '$dt_ITXVIEWKK[SUBCODE05]' 
											AND SUBCODE06 = '$dt_ITXVIEWKK[SUBCODE06]'
											AND SUBCODE07 = '$dt_ITXVIEWKK[SUBCODE07]' 
											AND SUBCODE08 = '$dt_ITXVIEWKK[SUBCODE08]'
											AND SUBCODE09 = '$dt_ITXVIEWKK[SUBCODE09]' 
											AND SUBCODE10 = '$dt_ITXVIEWKK[SUBCODE10]'");
	$dt_warna		= db2_fetch_assoc($sql_warna);

	$sql_roll		= db2_exec($conn1, "SELECT count(*) AS ROLL, s2.PRODUCTIONORDERCODE
										FROM STOCKTRANSACTION s2 
										WHERE s2.ITEMTYPECODE ='KGF' AND s2.PRODUCTIONORDERCODE = '$dt_ITXVIEWKK[PRODUCTIONORDERCODE]'
										GROUP BY s2.PRODUCTIONORDERCODE");
	$dt_roll   		= db2_fetch_assoc($sql_roll);

	$sql_qtyorder   = db2_exec($conn1, "SELECT DISTINCT
												USEDUSERPRIMARYQUANTITY AS QTY_ORDER,
												USEDUSERSECONDARYQUANTITY AS QTY_ORDER_YARD,
											CASE
												WHEN TRIM(USERSECONDARYUOMCODE) = 'kg' THEN 'Kg'
												WHEN TRIM(USERSECONDARYUOMCODE) = 'yd' THEN 'Yard'
												WHEN TRIM(USERSECONDARYUOMCODE) = 'm' THEN 'Meter'
												ELSE 'PCS'
											END AS SATUAN_QTY
											FROM 
											ITXVIEW_RESERVATION_KK 
											WHERE 
											ORDERCODE = '$nodemand'");
	$dt_qtyorder    = db2_fetch_assoc($sql_qtyorder);

	$sql_netto		= db2_exec($conn1, "SELECT * FROM ITXVIEW_NETTO WHERE CODE = '$nodemand' AND SALESORDERLINESALESORDERCODE = '$dt_ITXVIEWKK[PROJECTCODE]'");
	$d_netto		= db2_fetch_assoc($sql_netto);
	
	$sql_element	= db2_exec($conn1, "SELECT e.ELEMENTCODE FROM DB2ADMIN.ELEMENTSINSPECTION AS e
										WHERE e.DEMANDCODE = '$nodemand' and e.ELEMENTITEMTYPECODE ='KFF'
										and LENGTH( TRIM(e.ELEMENTCODE)) > 11");
	$d_element		= db2_fetch_assoc($sql_element);
// NOW

// $sqlCek=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE nodemand='$nodemand' ORDER BY id DESC LIMIT 1");
// $cek=mysqli_num_rows($sqlCek);
// $rcek=mysqli_fetch_array($sqlCek);

$sqlCek1 = mysqli_query($con, "SELECT * FROM tbl_lbl_availability WHERE nodemand='$nodemand' ORDER BY id DESC LIMIT 1");
$cek1 = mysqli_num_rows($sqlCek1);
$rcek1 = mysqli_fetch_array($sqlCek1);

?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1" target="_blank">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Input Data Kartu Kerja</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="col-md-6">
				<div class="form-group">
					<label for="nodemand" class="col-sm-3 control-label">No Demand</label>
					<div class="col-sm-4">
						<input name="nodemand" type="text" class="form-control" id="nodemand" onchange="window.location='LabelQCF-'+this.value" value="<?php echo $_GET['nodemand']; ?>" placeholder="No Demand" required>
					</div>
				</div>
				<div class="form-group">
					<label for="nokk" class="col-sm-3 control-label">No Production Order</label>
					<div class="col-sm-8">
						<input name="nokk" type="text" class="form-control" id="nokk" value="<?php if ($cek1 > 0) {
																									echo $rcek1['nokk'];
																								} else {
																									echo $dt_ITXVIEWKK['PRODUCTIONORDERCODE'];
																								} ?>" placeholder="No Production Order">
					</div>
				</div>
				<div class="form-group">
					<label for="no_order" class="col-sm-3 control-label">No Order</label>
					<div class="col-sm-4">
						<input name="no_order" type="text" class="form-control" id="no_order" value="<?php if ($cek1 > 0) {
																											echo $rcek1['no_order'];
																										} else {
																											echo $dt_ITXVIEWKK['PROJECTCODE'];
																										} ?>" placeholder="No Order" required>
					</div>
				</div>
				<div class="form-group">
					<label for="pelanggan" class="col-sm-3 control-label">Pelanggan</label>
					<div class="col-sm-8">
						<input name="pelanggan" type="text" class="form-control" id="pelanggan" value="<?php if ($cek1 > 0) {
																											echo $rcek1['pelanggan'];
																										} else {
																											if ($dt_pelanggan_buyer['BUYER'] != '') {
																												echo $dt_pelanggan_buyer['PELANGGAN'] . "/" . $dt_pelanggan_buyer['BUYER'];
																											}
																										} ?>" placeholder="Pelanggan">
					</div>
				</div>
				<div class="form-group">
					<label for="no_po" class="col-sm-3 control-label">PO</label>
					<div class="col-sm-5">
						<input name="no_po" type="text" class="form-control" id="no_po" value="<?php if ($cek1 > 0) {
																									echo $rcek1['no_po'];
																								} else {
																									echo $dt_po['NO_PO'];
																								} ?>" placeholder="PO">
					</div>
				</div>
				<div class="form-group">
					<label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
					<div class="col-sm-3">
						<input name="no_hanger" type="text" class="form-control" id="no_hanger" value="<?php if ($cek1 > 0) {
																											echo $rcek1['no_hanger'];
																										} else {
																											if ($dt_ITXVIEWKK['NO_HANGER'] != "") {
																												echo trim($dt_ITXVIEWKK['NO_HANGER']);
																											}
																										} ?>" placeholder="No Hanger">
					</div>
					<div class="col-sm-3">
						<input name="no_item" type="text" class="form-control" id="no_item" value="<?php if ($rcek1['no_item'] != "") {
																										echo $rcek1['no_item'];
																									} else if ($dt_item['EXTERNALITEMCODE'] != "") {
																										echo $dt_item['EXTERNALITEMCODE'];
																									} ?>" placeholder="No Item">
					</div>
				</div>
				<div class="form-group">
					<label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
					<div class="col-sm-8">
						<textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if ($cek1 > 0) {
																													echo $rcek1['jenis_kain'];
																												} else {
																													if ($dt_ITXVIEWKK['ITEMDESCRIPTION'] != "") {
																														echo $dt_ITXVIEWKK['ITEMDESCRIPTION'];
																													}
																												} ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="qty_yard" class="col-sm-3 control-label">Qty Yard Packing</label>
					<div class="col-sm-4">
						<div class="input-group">
							<input name="qty_yard" type="text" class="form-control" id="qty_yard" value="<?php if ($cek1 > 0) {
																												echo $rcek1['qty_yard'];
																											} else {
																												echo round($dt_ITXVIEWKK['QTY_PACKING_YARD'], 2);
																											} ?>" placeholder="0.00" required>
							<span class="input-group-addon">Yard</span>
						</div>
					</div>
				</div>
			</div>
			<!-- col -->
			<div class="col-md-6">
				<div class="form-group">
					<label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
					<div class="col-sm-2">
						<input name="lebar" type="text" class="form-control" id="lebar" value="<?php if ($cek1 > 0) {
																									echo $rcek1['lebar'];
																								} else {
																									echo $dt_lg['LEBAR'];
																								} ?>" placeholder="0" required>
					</div>
					<div class="col-sm-2">
						<input name="grms" type="text" class="form-control" id="grms" value="<?php if ($cek1 > 0) {
																									echo $rcek1['gramasi'];
																								} else {
																									echo $dt_lg['GRAMASI'];
																								} ?>" placeholder="0" required>
					</div>
				</div>
				<div class="form-group">
					<label for="warna" class="col-sm-3 control-label">Warna</label>
					<div class="col-sm-8">
						<textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if ($cek1 > 0) {
																										echo $rcek1['warna'];
																									} else {
																										echo $dt_warna['WARNA'];
																									} ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="no_warna" class="col-sm-3 control-label">No Warna</label>
					<div class="col-sm-8">
						<textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if ($cek > 0) {
																												echo $rcek1['no_warna'];
																											} else {
																												echo $dt_ITXVIEWKK['NO_WARNA'];
																											} ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="season" class="col-sm-3 control-label">Season</label>
					<div class="col-sm-5">
						<input name="season" type="text" class="form-control" id="season" value="<?php if ($cek1 > 0) {
																										echo $rcek1['season'];
																									} else {
																										echo $rowdb2['SEASON'];
																									} ?>" placeholder="Season">
					</div>
				</div>
				<div class="form-group">
					<label for="lot" class="col-sm-3 control-label">Lot</label>
					<div class="col-sm-4">
						<input name="lot" type="text" class="form-control" id="lot" value="<?php if ($cek1 > 0) {
																								echo $rcek1['lot'];
																							} else {
																								echo $dt_ITXVIEWKK['LOT'];
																							} ?>" placeholder="Lot">
					</div>
				</div>
				<div class="form-group">
					<label for="availability" class="col-sm-3 control-label">Availability</label>
					<div class="col-sm-8">
						<select class="form-control select2" multiple="multiple" data-placeholder="Availability" name="availability[]" id="availability" required>
							<?php
							$dtArr = $rcek['availability'];
							$data = explode(",", $dtArr);
							$dtArr1 = $rcek1['availability'];
							$data1 = explode(",", $dtArr1);
							?>
							<option value="DL" <?php if ($data[0] == "DL" or $data[1] == "DL" or $data[2] == "DL" or $data1[0] == "DL" or $data1[1] == "DL" or $data1[2] == "DL") {
													echo "SELECTED";
												} ?>>DL</option>
							<option value="SP" <?php if ($data[0] == "SP" or $data[1] == "SP" or $data[2] == "SP" or $data1[0] == "SP" or $data1[1] == "SP" or $data1[2] == "SP") {
													echo "SELECTED";
												} ?>>SP</option>
							<option value="PL" <?php if ($data[0] == "PL" or $data[1] == "PL" or $data[2] == "PL" or $data1[0] == "PL" or $data1[1] == "PL" or $data1[2] == "PL") {
													echo "SELECTED";
												} ?>>PL</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="nokk_legacy" class="col-sm-3 control-label">No KK Legacy</label>
					<div class="col-sm-4">
						<input name="nokk_legacy" type="text" class="form-control" id="nokk_legacy" value="<?php if ($cek1 > 0) {
																												echo $rcek1['nokk_legacy'];
																											} ?>" placeholder="No KK Legacy">
					</div>
				</div>
				<div class="form-group">
					<label for="element" class="col-sm-3 control-label">No Element</label>
					<div class="col-sm-4">
						<select name="element" class="form-control select2">
						<option value="">Pilih</option>
						<?php
						$sql_element = db2_exec($conn1, "SELECT e.ELEMENTCODE 
														FROM DB2ADMIN.ELEMENTSINSPECTION AS e
														WHERE e.DEMANDCODE = '$nodemand' 
														AND e.ELEMENTITEMTYPECODE = 'KFF'
														AND LENGTH(TRIM(e.ELEMENTCODE)) > 11");

						while ($row = db2_fetch_assoc($sql_element)) {
							echo '<option value="' . htmlspecialchars($row['ELEMENTCODE']) . '">' . htmlspecialchars($row['ELEMENTCODE']) . '</option>';
						}
						?>
</select>

					</div>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<?php if ($cek1 > 0) { ?>
				<button type="submit" class="btn btn-primary pull-left" name="ubah" value="ubah"><i class="fa fa-edit"></i> Ubah</button>
			<?php } else if ($_GET['nodemand'] != "" and $cek1 == 0) { ?>
				<button type="submit" class="btn btn-primary pull-left" name="save" value="save"><i class="fa fa-save"></i> Simpan</button>
			<?php } ?>

			<!-- <button type="submit" class="btn btn-primary pull-left" name="save" value="save" <?php if (($cek > 0 and $rcek['availability'] != NULL) or $cek1 > 0) {
																										echo "disabled";
																									} ?>><i class="fa fa-save"></i> Simpan</button>  -->
			<?php if ($_GET['nodemand'] != "" and $cek1 > 0) { ?>
				<div class="pull-right">
					<?php if (strpos($rcek1['pelanggan'], 'LULU') !== false) { ?>
						<a href="pages/cetak/cetak_label_qcf_lulu.php?idkk=<?php echo $_GET['nodemand']; ?>" target="_blank" class="btn btn-danger pull-right">Cetak</a>
					<?php } else if (strpos($rcek1['pelanggan'], 'lulu') !== false) { ?>
						<a href="pages/cetak/cetak_label_qcf_lulu.php?idkk=<?php echo $_GET['nodemand']; ?>" target="_blank" class="btn btn-danger pull-right">Cetak</a>
					<?php } else if (strpos($rcek1['pelanggan'], 'ADIDAS') !== false) { ?>
						<a href="pages/cetak/cetak_label_qcf_ads.php?idkk=<?php echo $_GET['nodemand']; ?>" target="_blank" class="btn btn-danger pull-right">Cetak</a>
					<?php } else if (strpos($rcek1['pelanggan'], 'UNDER ARMOUR') !== false) { ?>
						<a href="pages/cetak/cetak_label_qcf_ua.php?idkk=<?php echo $_GET['nodemand']; ?>" target="_blank" class="btn btn-danger pull-right">Cetak</a>
					<?php } else { ?>
						<a href="pages/cetak/cetak_label_qcf_new.php?idkk=<?php echo $_GET['nodemand']; ?>&element=<?php echo $_POST['element']; ?>" target="_blank" class="btn btn-danger pull-right">Cetak</a>
				<?php }
				} ?>
				</div>
				<!--<input type="submit" value="Cetak" name="cetak" class="btn btn-danger pull-right">-->
		</div>
		<!-- /.box-footer -->
	</div>
</form>


</div>
</div>
</div>
</div>
<?php
if ($_POST['save'] == "save" and $cek > 0) {
	//   $con=mysqli_connect("10.0.0.10","dit","4dm1n");
	//   $db=mysqli_select_db("db_qc",$con)or die("Gagal Koneksi");		
	if (isset($_POST['availability'])) {
		// Retrieving each selected option 
		foreach ($_POST['availability'] as $index => $subject1) {
			if ($index > 0) {
				$av1 = $av1 . "," . $subject1;
			} else {
				$av1 = $subject1;
			}
		}
	}
	$sqlData = mysqli_query($con, "UPDATE tbl_qcf SET 
		  `availability`='$av1',
		  `tgl_update`=now()
		  WHERE nodemand='$_POST[nodemand]'");

	if ($sqlData) {

		echo "<script>swal({
  title: 'Data Terupdate',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
     window.open('pages/cetak/cetak_label_qcf_ads.php?idkk=$_GET[nodemand]','_blank');	
	 
	 
  }
});</script>";
	}
} else if ($_POST['save'] == "save" and $cek1 == 0) {
	// $con=mysqli_connect("10.0.0.10","dit","4dm1n");
	// $db=mysqli_select_db("db_qc",$con)or die("Gagal Koneksi");
	if (isset($_POST['availability'])) {
		// Retrieving each selected option 
		foreach ($_POST['availability'] as $index => $subject2) {
			if ($index > 0) {
				$av2 = $av2 . "," . $subject2;
			} else {
				$av2 = $subject2;
			}
		}
	}
	$no_order = mysqli_real_escape_string($con, $_POST['no_order']);
	$no_po = mysqli_real_escape_string($con, $_POST['no_po']);
	$no_hanger = mysqli_real_escape_string($con, $_POST['no_hanger']);
	$no_item = mysqli_real_escape_string($con, $_POST['no_item']);
	$pelanggan = mysqli_real_escape_string($con, $_POST['pelanggan']);
	$jenis_kain = mysqli_real_escape_string($con, $_POST['jns_kain']);
	$warna = mysqli_real_escape_string($con, $_POST['warna']);
	$no_warna = mysqli_real_escape_string($con, $_POST['no_warna']);
	$lot = mysqli_real_escape_string($con, $_POST['lot']);
	$sqlData1 = mysqli_query($con, "INSERT INTO tbl_lbl_availability SET 
			`nodemand`='$_POST[nodemand]',
			`nokk`='$_POST[nokk]',
			`no_order`='$no_order',
			`pelanggan`='$pelanggan',
			`no_po`='$no_po',
			`no_hanger`='$no_hanger',
			`no_item`='$no_item',
			`jenis_kain`='$jenis_kain',
			`lebar`='$_POST[lebar]',
			`gramasi`='$_POST[grms]',
			`warna`='$warna',
			`no_warna`='$no_warna',
			`lot`='$lot',
			`qty_yard`='$_POST[qty_yard]',
			`season`='$_POST[season]',
		  	`availability`='$av2',
			`element`='$_POST[element]',
			`nokk_legacy`='$_POST[nokk_legacy]',
		  	`tgl_update`=now()");

	if ($sqlData1) {

		echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
     window.open('pages/cetak/cetak_label_qcf_ads.php?idkk=$_GET[nodemand]','_blank');	
	 
  }
});</script>";
	}
} else if ($_POST['ubah'] == "ubah" and $cek1 > 0) {
	if (isset($_POST['availability'])) {
		// Retrieving each selected option 
		foreach ($_POST['availability'] as $index => $subject2) {
			if ($index > 0) {
				$av2 = $av2 . "," . $subject2;
			} else {
				$av2 = $subject2;
			}
		}
	}
	$ip = $_SERVER['REMOTE_ADDR'];
	$sqlUpdate1 = mysqli_query($con, "UPDATE tbl_lbl_availability SET 
			`nokk`='$_POST[nokk]',
			`lot`='$_POST[lot]',
			`no_hanger`='$_POST[no_hanger]',
			`no_item`='$_POST[no_item]',
			`lot`='$_POST[lot]',
			`season`='$_POST[season]',
			`nokk_legacy`='$_POST[nokk_legacy]',
			`availability`='$av2',
			`element`='$_POST[element]',
			`ip`= '$ip',
			`tgl_update`=now()
			WHERE `nodemand`='$_GET[nodemand]'");

	if ($sqlUpdate1) {

		echo "<script>swal({
  title: 'Data Demand Berhasil Diubah',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
	window.open('pages/cetak/cetak_label_qcf_ads.php?idkk=$_GET[nodemand]','_blank');
	 
  }
});</script>";
	}
}

?>