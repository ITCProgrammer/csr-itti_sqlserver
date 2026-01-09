<?php
	include "koneksi.php";
	ini_set("error_reporting", 1);
	$NCPNO		= isset($_POST['no_ncp']) ? $_POST['no_ncp'] : '';
	$REGNO		= isset($_POST['regno']) ? $_POST['regno'] : '';
	$Dept		= isset($_POST['dept']) ? $_POST['dept'] : '';
	$Revisi		= isset($_POST['revisi']) ? $_POST['revisi'] : '';
?>
<script>
	function aktif() {
		if (document.forms['form1']['newreg'].checked == true) {
			document.form1.regno.setAttribute("readonly", true);
			document.form1.regno.removeAttribute("required");
			document.form1.regno.value = "";
		} else {
			document.form1.regno.removeAttribute("readonly");
			document.form1.regno.setAttribute("required", true);
		}
	}

	function aktifE() {
		if (document.forms['form1']['editreg'].checked == true) {
			document.form1.regno.setAttribute("readonly", true);
			document.form1.regno.removeAttribute("required");
			document.form1.regno.value = "";
			document.form1.po_rajut.setAttribute("readonly", true);
			document.form1.po_rajut.removeAttribute("required");
			document.form1.po_rajut.value = "";
			document.form1.supp_rajut.setAttribute("readonly", true);
			document.form1.supp_rajut.removeAttribute("required");
			document.form1.supp_rajut.value = "";
		} else {
			document.form1.regno.removeAttribute("readonly");
			document.form1.regno.setAttribute("required", true);
			document.form1.po_rajut.removeAttribute("readonly");
			document.form1.po_rajut.setAttribute("required", true);
			document.form1.supp_rajut.removeAttribute("readonly");
			document.form1.supp_rajut.setAttribute("required", true);
		}
	}
</script>
<?php
$nodemand = $_GET['nodemand'];
$sqlDB2 = " SELECT
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

/*$sqlDB20=" 
	SELECT
		a.CODE,
		a2.ORDERLINE,
		CASE
		WHEN a.EXTERNALREFERENCE IS NULL THEN a2.EXTERNALREFERENCE
		ELSE a.EXTERNALREFERENCE
		END AS PO_NUMBER,
		a2.ITEMDESCRIPTION,
		a.ORDERPARTNERBRANDCODE ,
		b.LONGDESCRIPTION AS BUYER,
		c.LONGDESCRIPTION AS ITEM
	FROM
		SALESORDER a
	LEFT OUTER JOIN SALESORDERLINE a2 ON
		a.CODE = a2.SALESORDERCODE
	LEFT OUTER JOIN ORDERPARTNERBRAND b ON
		a.ORDERPARTNERBRANDCODE = b.CODE
	LEFT OUTER JOIN ORDERITEMORDERPARTNERLINK c ON
		a.ORDPRNCUSTOMERSUPPLIERCODE = c.ORDPRNCUSTOMERSUPPLIERCODE
		AND a2.ITEMTYPEAFICODE = c.ITEMTYPEAFICODE
		AND 
	a2.SUBCODE01 = c.SUBCODE01
		AND a2.SUBCODE02 = c.SUBCODE02
		AND a2.SUBCODE03 = c.SUBCODE03
		AND
	a2.SUBCODE04 = c.SUBCODE04
		AND a2.SUBCODE05 = c.SUBCODE05
		AND a2.SUBCODE06 = c.SUBCODE06
		AND 
	a2.SUBCODE07 = c.SUBCODE07
		AND a2.SUBCODE08 = c.SUBCODE08
		AND a2.SUBCODE09 = c.SUBCODE09
		AND 
	a2.SUBCODE10 = c.SUBCODE10
	WHERE a.CODE='".$rowdb2['PRO_ORDER']."' AND a2.ORDERLINE = '".$rowdb2['ORDERLINE']."' 
	GROUP BY
		a.CODE,
		a.EXTERNALREFERENCE,
		a2.ORDERLINE,
		a2.EXTERNALREFERENCE,
		a2.ITEMDESCRIPTION,
		a.ORDERPARTNERBRANDCODE ,
		b.LONGDESCRIPTION,
		c.LONGDESCRIPTION
";*/
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

$sqlDB21 = " 
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
$stmt1 = db2_exec($conn1, $sqlDB21, array('cursor' => DB2_SCROLLABLE));
$rowdb21 = db2_fetch_assoc($stmt1);


$sqlroll = "SELECT
				STOCKTRANSACTION.ORDERCODE,
				COUNT(STOCKTRANSACTION.ITEMELEMENTCODE) AS JML_ROLL
			FROM
				STOCKTRANSACTION STOCKTRANSACTION
			WHERE
				STOCKTRANSACTION.ORDERCODE = '$rowdb2[PRODUCTIONORDERCODE]'
				AND STOCKTRANSACTION.TEMPLATECODE = '120'
				AND STOCKTRANSACTION.ITEMTYPECODE = 'KGF'
			GROUP BY
				STOCKTRANSACTION.ORDERCODE";
$stmt1 = db2_exec($conn1, $sqlroll, array('cursor' => DB2_SCROLLABLE));
$rowr = db2_fetch_assoc($stmt1);

$sqlkg = "SELECT
		PRODUCTIONRESERVATION.PRODUCTIONORDERCODE,
		PRODUCTIONRESERVATION.ITEMTYPEAFICODE,
		SUM(PRODUCTIONRESERVATION.USEDUSERPRIMARYQUANTITY) as QTY_BAGI_KAIN
	FROM
		PRODUCTIONRESERVATION 
		PRODUCTIONRESERVATION
	WHERE
		PRODUCTIONRESERVATION.ITEMTYPEAFICODE = 'KGF' AND 
		PRODUCTIONRESERVATION.PRODUCTIONORDERCODE = '$rowdb2[PRODUCTIONORDERCODE]'
	GROUP BY
		PRODUCTIONRESERVATION.PRODUCTIONORDERCODE,
		PRODUCTIONRESERVATION.ITEMTYPEAFICODE";
$stmtkg1 = db2_exec($conn1, $sqlkg, array('cursor' => DB2_SCROLLABLE));
$rowkg = db2_fetch_assoc($stmtkg1);

$sqlwarna = "SELECT
			ITXVIEWCOLOR.ITEMTYPECODE,
			ITXVIEWCOLOR.SUBCODE01,
			ITXVIEWCOLOR.SUBCODE02,
			ITXVIEWCOLOR.SUBCODE03,
			ITXVIEWCOLOR.SUBCODE04,
			ITXVIEWCOLOR.SUBCODE05,
			ITXVIEWCOLOR.SUBCODE06,
			ITXVIEWCOLOR.SUBCODE07,
			ITXVIEWCOLOR.SUBCODE08,
			ITXVIEWCOLOR.SUBCODE09,
			ITXVIEWCOLOR.SUBCODE10,
			ITXVIEWCOLOR.WARNA
		FROM
			(
			SELECT
				ITEMTYPECODE,
				SUBCODE01,
				SUBCODE02,
				SUBCODE03,
				SUBCODE04,
				SUBCODE05,
				SUBCODE06,
				SUBCODE07,
				SUBCODE08,
				SUBCODE09,
				SUBCODE10,
				CASE
					WHEN WARNA = 'NULL' THEN WARNA_FKF
					ELSE WARNA
				END AS WARNA,
				WARNA_DASAR
			FROM
				(
				SELECT
					PRODUCT.ITEMTYPECODE AS ITEMTYPECODE,
					PRODUCT.SUBCODE01 AS SUBCODE01,
					PRODUCT.SUBCODE02 AS SUBCODE02,
					PRODUCT.SUBCODE03 AS SUBCODE03,
					PRODUCT.SUBCODE04 AS SUBCODE04,
					PRODUCT.SUBCODE05 AS SUBCODE05,
					PRODUCT.SUBCODE06 AS SUBCODE06,
					PRODUCT.SUBCODE07 AS SUBCODE07,
					PRODUCT.SUBCODE08 AS SUBCODE08,
					PRODUCT.SUBCODE09 AS SUBCODE09,
					PRODUCT.SUBCODE10 AS SUBCODE10,
					CASE
						WHEN PRODUCT.ITEMTYPECODE = 'KFF'
						AND PRODUCT.SUBCODE07 = '-' THEN A.LONGDESCRIPTION
						WHEN PRODUCT.ITEMTYPECODE = 'KFF'
						AND PRODUCT.SUBCODE07 <> '-'
						OR PRODUCT.SUBCODE07 <> '' THEN B.COLOR_PRT
						ELSE 'NULL'
					END AS WARNA,
					CASE
						WHEN PRODUCT.ITEMTYPECODE = 'FKF'
						AND LOCATE('-', PRODUCT.LONGDESCRIPTION) = 0 THEN PRODUCT.LONGDESCRIPTION
						WHEN PRODUCT.ITEMTYPECODE = 'FKF'
						AND LOCATE('-', PRODUCT.LONGDESCRIPTION) > 0 THEN SUBSTR(PRODUCT.LONGDESCRIPTION , 1, LOCATE('-', PRODUCT.LONGDESCRIPTION)-1)
						ELSE 'NULL'
					END AS WARNA_FKF,
					WARNA_DASAR
				FROM
					PRODUCT PRODUCT
				LEFT JOIN(
					SELECT
						CAST(SUBSTR(RECIPE.SUBCODE01, 1, LOCATE('/', RECIPE.SUBCODE01)-1) AS CHARACTER(10)) AS ARTIKEL,
						CAST(SUBSTR(RECIPE.SUBCODE01, LOCATE('/', RECIPE.SUBCODE01)+ 1, 7) AS CHARACTER(10)) AS NO_WARNA,
						SUBSTR(SUBSTR(RECIPE.SUBCODE01, LOCATE('/', RECIPE.SUBCODE01)+ 1), LOCATE('/', SUBSTR(RECIPE.SUBCODE01, LOCATE('/', RECIPE.SUBCODE01)+ 1))+ 1) AS CELUP,
						RECIPE.LONGDESCRIPTION,
						RECIPE.SHORTDESCRIPTION,
						RECIPE.SEARCHDESCRIPTION,
						RECIPE.NUMBERID,
						PRODUCT.SUBCODE03,
						PRODUCT.SUBCODE05,
						PRODUCT.LONGDESCRIPTION AS PRODUCT_LONG
					FROM
						RECIPE RECIPE
					LEFT JOIN PRODUCT PRODUCT ON
						SUBSTR(RECIPE.SUBCODE01, 1, LOCATE('/', RECIPE.SUBCODE01)-1) = PRODUCT.SUBCODE03
						AND SUBSTR(RECIPE.SUBCODE01, LOCATE('/', RECIPE.SUBCODE01)+ 1, 7) = PRODUCT.SUBCODE05
					WHERE
						RECIPE.ITEMTYPECODE = 'RFD'
						AND LOCATE('/', RECIPE.SUBCODE01) > 0
						AND RECIPE.SUFFIXCODE = '001'
						--            AND NOT RECIPE.SEARCHDESCRIPTION LIKE '%DELETE%' AND NOT RECIPE.SEARCHDESCRIPTION LIKE '%delete%'
					) A ON
					PRODUCT.SUBCODE03 = A.SUBCODE03
					AND PRODUCT.SUBCODE05 = A.SUBCODE05
				LEFT JOIN(
					SELECT
						DESIGN.SUBCODE01,
						DESIGNCOMPONENT.VARIANTCODE,
						DESIGNCOMPONENT.LONGDESCRIPTION AS COLOR_PRT,
						DESIGNCOMPONENT.SHORTDESCRIPTION AS WARNA_DASAR
					FROM
						DESIGN DESIGN
					LEFT JOIN DESIGNCOMPONENT DESIGNCOMPONENT ON
						DESIGN.NUMBERID = DESIGNCOMPONENT.DESIGNNUMBERID
						AND DESIGN.SUBCODE01 = DESIGNCOMPONENT.DESIGNSUBCODE01) B ON
					PRODUCT.SUBCODE07 = B.SUBCODE01
					AND PRODUCT.SUBCODE08 = B.VARIANTCODE
				WHERE
					(PRODUCT.ITEMTYPECODE = 'KFF'
						OR PRODUCT.ITEMTYPECODE = 'FKF')
				GROUP BY
					PRODUCT.ITEMTYPECODE,
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
					PRODUCT.LONGDESCRIPTION,
					A.LONGDESCRIPTION,
					B.COLOR_PRT,
					WARNA_DASAR,
					PRODUCT.SHORTDESCRIPTION)) ITXVIEWCOLOR
		WHERE 
			ITXVIEWCOLOR.ITEMTYPECODE = 'KFF' AND 
			ITXVIEWCOLOR.SUBCODE01 = '" . $rowdb2['SUBCODE01'] . "' AND 
			ITXVIEWCOLOR.SUBCODE02 = '" . $rowdb2['SUBCODE02'] . "' AND 
			ITXVIEWCOLOR.SUBCODE03 = '" . $rowdb2['SUBCODE03'] . "' AND 
			ITXVIEWCOLOR.SUBCODE04 = '" . $rowdb2['SUBCODE04'] . "' AND 
			ITXVIEWCOLOR.SUBCODE05 = '" . $rowdb2['SUBCODE05'] . "' AND 
			ITXVIEWCOLOR.SUBCODE06 = '" . $rowdb2['SUBCODE06'] . "' AND 
			ITXVIEWCOLOR.SUBCODE07 = '" . $rowdb2['SUBCODE07'] . "' AND 
			ITXVIEWCOLOR.SUBCODE08 = '" . $rowdb2['SUBCODE08'] . "'";
$stmtwarna1 = db2_exec($conn1, $sqlwarna, array('cursor' => DB2_SCROLLABLE));
$rowwarna = db2_fetch_assoc($stmtwarna1);

$sqlCek = mysqli_query($con, "SELECT * FROM tbl_ncp_qcf_now WHERE nodemand='$nodemand' and no_ncp_gabungan='$NCPNO' ORDER BY id DESC LIMIT 1");
$cek = mysqli_num_rows($sqlCek);
$rcek = mysqli_fetch_array($sqlCek);

$rev = substr($Revisi, -1, 1);
$ncpG = trim($CekSalinan);
/*$sqlCek = mysqli_query($con, "SELECT * FROM tbl_ncp_qcf_now WHERE reg_no='$REGNO' ORDER BY id DESC LIMIT 1");
$cek = mysqli_num_rows($sqlCek);
$rcek = mysqli_fetch_array($sqlCek);*/

$sqlCek0 = mysqli_query($con, "SELECT * FROM tbl_ncp_qcf_now WHERE nodemand='$nodemand' ORDER BY id DESC LIMIT 1");
$cek0 = mysqli_num_rows($sqlCek0);
$rcek0 = mysqli_fetch_array($sqlCek0);

if ($rowdb2['TGL_DELIV_GREIGE'] != "") {
	$awal  = date_create($rowdb2['TGL_DELIV_GREIGE']);
	$akhir = date_create(); // waktu sekarang
	$diff  = date_diff($awal, $akhir);
	$startTime = date("Y-m-d");
	if ($startTime > $rowdb2['TGL_DELIV_GREIGE']) {
		$tglTarget = date('Y-m-d', strtotime('+5 day', strtotime($startTime)));
	} else {
		if ($diff->d > 7) {
			$tglTarget = date('Y-m-d', strtotime('+7 day', strtotime($startTime)));
		} else {
			$tglTarget = $rowdb2['TGL_DELIV_GREIGE'];
		}
	}
	//echo 'Selisih hari: ';
	//echo $diff->d . ' hari ';
	//echo $startTime;	
}

$q_cocok_warna_dye	= mysqli_query($con, "SELECT * FROM tbl_cocok_warna_dye WHERE nodemand = '$nodemand' ");
$row_cocok_warna_dye = mysqli_fetch_assoc($q_cocok_warna_dye);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
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
						<input name="nodemand" type="text" class="form-control" id="nodemand" onchange="window.location='NCPNew-'+this.value" value="<?php echo $_GET['nodemand']; ?>" placeholder="No Demand" required>
					</div>
					<?php if ($_GET['nodemand']) { ?>
						<a href="#" class="btn btn-xs btn-warning detail_ncp" id="<?php echo $rcek0['reg_no']; ?>">Detail NCP</a>
					<?php } ?>
				</div>
				<div class="form-group">
					<label for="regno" class="col-sm-3 control-label">No Registrasi</label>
					<div class="col-sm-4">
						<input name="regno" type="text" class="form-control" id="regno" value="<?php if ($cek > 0) {
																									echo $rcek['reg_no'];
																								} else {
																									echo "";
																								} ?>" placeholder="Registrasi No" required>
					</div>
					<div class="col-sm-3">
						<input type="checkbox" name="newreg" id="newreg" onClick="aktif();"> New
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
																										} ?>" placeholder="No Order" required>
					</div>
				</div>
				<div class="form-group">
					<label for="pelanggan" class="col-sm-3 control-label">Pelanggan</label>
					<div class="col-sm-8">
						<input name="pelanggan" type="text" class="form-control" id="no_po" value="<?php if ($cek > 0) {
																										echo $rcek['langganan'];
																									} else {
																										echo $rowdb2['LANGGANAN'];
																									} ?>" placeholder="Pelanggan">
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
																											if ($rowdb2['ITEMNO'] != "") {
																												echo $rowdb2['ITEMNO'];
																											}
																										} ?>" placeholder="No Hanger">
					</div>
					<div class="col-sm-3">
						<input name="no_item" type="text" class="form-control" id="no_item" value="<?php if ($rcek['no_item'] != "") {
																										echo $rcek['no_item'];
																									} else if ($rowdb20['NO_ITEM'] != "") {
																										echo $rowdb20['NO_ITEM'];
																									} ?>" placeholder="No Item">
					</div>
				</div>
				<div class="form-group">
					<label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
					<div class="col-sm-8">
						<textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if ($cek > 0) {
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
																									echo round($rowdb21['WIDTH']);
																								} ?>" placeholder="0" required>
					</div>
					<div class="col-sm-2">
						<input name="grms" type="text" class="form-control" id="grms" value="<?php if ($cek > 0) {
																									echo $rcek['gramasi'];
																								} else {
																									echo round($rowdb21['GSM']);
																								} ?>" placeholder="0" required>
					</div>
				</div>
				<div class="form-group">
					<label for="warna" class="col-sm-3 control-label">Warna</label>
					<div class="col-sm-8">
						<textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if ($cek > 0) {
																										echo $rcek['warna'];
																									} else {
																										if ($rowdb2['WARNA'] != "") {
																											echo $rowdb2['WARNA'];
																										}
																									} ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="no_warna" class="col-sm-3 control-label">No Warna</label>
					<div class="col-sm-8">
						<textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if ($cek > 0) {
																												echo $rcek['no_warna'];
																											} else {
																												if ($rowdb2['NO_WARNA'] != "") {
																													echo $rowdb2['NO_WARNA'];
																												}
																											} ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="no_warna" class="col-sm-3 control-label">Status Warna</label>
					<div class="col-sm-6">
						<select class="form-control" name="status_warna" id="status_warna">
							<option value="-" <?php if($row_cocok_warna_dye['status_warna'] == null){ echo "SELECTED"; } ?>>...</option>
							<option value="OK" <?php if("OK" == $row_cocok_warna_dye['status_warna']){ echo "SELECTED"; } ?>>OK</option>
							<option value="TOLAK BASAH BEDA WARNA" <?php if("TOLAK BASAH BEDA WARNA" == $row_cocok_warna_dye['status_warna']){ echo "SELECTED"; } ?>>TOLAK BASAH BEDA WARNA</option>
							<option value="TOLAK BASAH LUNTUR" <?php if("TOLAK BASAH LUNTUR" == $row_cocok_warna_dye['status_warna']){ echo "SELECTED"; } ?>>TOLAK BASAH LUNTUR</option>
							<option value="TOLAK BASAH BEDA WARNA + LUNTUR" <?php if("TOLAK BASAH BEDA WARNA + LUNTUR" == $row_cocok_warna_dye['status_warna']){ echo "SELECTED"; } ?>>TOLAK BASAH BEDA WARNA + LUNTUR</option>
							<option value="DISPOSISI" <?php if("DISPOSISI" == $row_cocok_warna_dye['status_warna']){ echo "SELECTED"; } ?>>DISPOSISI</option>
						</select>
					</div>
					
				</div>
				<div class="form-group">
					<label for="no_warna" class="col-sm-3 control-label">Disposisi</label>
					<div class="col-sm-8">
						<input name="disposisi" type="text" class="form-control" id="disposisi" value="<?= $row_cocok_warna_dye['disposisi']; ?>" placeholder="<?php if($row_cocok_warna_dye['disposisi'] == null){ echo 'Data tidak tersedia..'; } ?>">
					</div>
				</div>
			</div>
			<!-- col -->
			<div class="col-md-6">
				<div class="form-group">
					<label for="no_ncp" class="col-sm-3 control-label">No NCP</label>
					<div class="col-sm-4">
						<div class="input-group">
							<select name="no_ncp" class="form-control" id="no_ncp" placeholder="No NCP" onChange="rd();">
								<option value=""></option>
								<?php $qCek = mysqli_query($con, "SELECT no_ncp_gabungan,masalah FROM tbl_ncp_qcf_now WHERE nodemand='$_GET[nodemand]' ORDER BY id DESC");
								while ($dCek = mysqli_fetch_array($qCek)) { ?>
									<option value="<?php echo $dCek['no_ncp_gabungan']; ?>" <?php if ($dCek['no_ncp_gabungan'] == $NCPNO) {
																								echo "SELECTED";
																							} ?>><?php echo $dCek['no_ncp_gabungan']; ?></option>
								<?php } ?>
							</select>
							<span class="input-group-btn"><button type="submit" class="btn btn-default" name="cek" id="cek" value="cek"> <span class="fa fa-search"></span></button></span>
						</div>
					</div>
					<div class="col-sm-4">
						<select class="form-control select2" name="dibuat_oleh" id="dibuat_oleh" required>
							<option value="">Dibuat Oleh</option>
							<option value="Agung C" <?php if ($rcek['dibuat_oleh'] == "Agung C") {
														echo "SELECTED";
													} ?>>Agung C</option>
							<option value="Agus S" <?php if ($rcek['dibuat_oleh'] == "Agus S") {
														echo "SELECTED";
													} ?>>Agus S</option>
							<option value="Alimulhakim" <?php if ($rcek['dibuat_oleh'] == "Alimulhakim") {
															echo "SELECTED";
														} ?>>Alimulhakim</option>
							<option value="Andi W" <?php if ($rcek['dibuat_oleh'] == "Andi W") {
														echo "SELECTED";
													} ?>>Andi W</option>
							<option value="Arif" <?php if ($rcek['dibuat_oleh'] == "Arif") {
														echo "SELECTED";
													} ?>>Arif</option>
							<option value="Dewi S" <?php if ($rcek['dibuat_oleh'] == "Dewi S") {
														echo "SELECTED";
													} ?>>Dewi S</option>
							<option value="Edwin" <?php if ($rcek['dibuat_oleh'] == "Edwin") {
														echo "SELECTED";
													} ?>>Edwin</option>
							<option value="Ely" <?php if ($rcek['dibuat_oleh'] == "Ely") {
													echo "SELECTED";
												} ?>>Ely</option>
							<option value="Ferry W" <?php if ($rcek['dibuat_oleh'] == "Ferry W") {
														echo "SELECTED";
													} ?>>Ferry W</option>
							<option value="Heru H" <?php if ($rcek['dibuat_oleh'] == "Heru H") {
														echo "SELECTED";
													} ?>>Heru H</option>
							<option value="Heryanto" <?php if ($rcek['dibuat_oleh'] == "Heryanto") {
															echo "SELECTED";
														} ?>>Heryanto</option>
							<option value="Janu" <?php if ($rcek['dibuat_oleh'] == "Janu") {
														echo "SELECTED";
													} ?>>Janu</option>
							<option value="Purnomo" <?php if ($rcek['dibuat_oleh'] == "Purnomo") {
														echo "SELECTED";
													} ?>>Purnomo</option>
							<option value="Rudi P" <?php if ($rcek['dibuat_oleh'] == "Rudi P") {
														echo "SELECTED";
													} ?>>Rudi P</option>
							<option value="Sopian" <?php if ($rcek['dibuat_oleh'] == "Sopian") {
														echo "SELECTED";
													} ?>>Sopian</option>
							<option value="Taufik R" <?php if ($rcek['dibuat_oleh'] == "Taufik R") {
															echo "SELECTED";
														} ?>>Taufik R</option>
							<option value="Tri S" <?php if ($rcek['dibuat_oleh'] == "Tri S") {
														echo "SELECTED";
													} ?>>Tri S</option>
							<option value="Vivik" <?php if ($rcek['dibuat_oleh'] == "Vivik") {
														echo "SELECTED";
													} ?>>Vivik</option>
							<option value="Yusuf Dwi K" <?php if ($rcek['dibuat_oleh'] == "Yusuf Dwi K") {
															echo "SELECTED";
														} ?>>Yusuf Dwi K</option>
							<option value="Dixih Wahyudin" <?php if ($rcek['dibuat_oleh'] == "Dixih Wahyudin") {
															echo "SELECTED";
														} ?>>Dixih Wahyudin</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="lot" class="col-sm-3 control-label">Lot/Prod. Order</label>
					<div class="col-sm-3">
						<input name="nokk" type="hidden" class="form-control" id="nokk" value="<?php if ($cek > 0) {
																									echo $rcek['nokk'];
																								} else {
																									echo $rowdb2['PRODUCTIONORDERCODE'];
																								} ?>">
						<input name="lot" type="text" class="form-control" id="lot" value="<?php if ($cek > 0) {
																								echo $rcek['lot'];
																							} else {
																								echo $rowdb2['PRODUCTIONORDERCODE'];
																							} ?>" placeholder="Lot/Prod. Order">
					</div>
					<div class="col-sm-3">
						<input type="checkbox" name="editreg" id="editreg" onClick="aktifE();"> Edit
					</div>
				</div>
				<div class="form-group">
					<label for="po_rajut" class="col-sm-3 control-label">PO Rajut</label>
					<div class="col-sm-3">
						<input name="po_rajut" type="text" class="form-control" id="po_rajut" value="<?php if ($cek > 0) {
																											echo $rcek['po_rajut'];
																										} else {
																											echo $rowdb2['PO_RAJUT'];
																										} ?>" placeholder="PO Rajut" required>
					</div>
					<div class="col-sm-5">
						<input name="supp_rajut" type="text" class="form-control" id="supp_rajut" value="<?php if ($cek > 0) {
																												echo $rcek['supp_rajut'];
																											} ?>" placeholder="Supplier Rajut">
					</div>
				</div>
				<div class="form-group">
					<label for="tgl_delivery" class="col-sm-3 control-label">Tgl Delivery</label>
					<div class="col-sm-3">
						<input name="tgl_delivery" type="text" class="form-control" id="tgl_delivery" value="<?php if ($cek > 0) {
																													echo $rcek['tgl_delivery'];
																												} else if ($rowdb2['TGL_DELIV_GREIGE'] != "") {
																													echo $rowdb2['TGL_DELIV_GREIGE'];
																												} else {
																												} ?>" placeholder="" autocomplete="off" readonly>
					</div>
					<div class="col-sm-4">
						<div class="input-group date">
							<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
							<input name="tgl_target" type="text" class="form-control pull-right" id="datepicker" placeholder="tgl Target" value="<?php if ($cek > 0) {
																																						echo $rcek['tgl_rencana'];
																																					} else {
																																						echo $tglTarget;
																																					} ?>" autocomplete="off" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="masalah_dominan" class="col-sm-3 control-label">Masalah Utama</label>
					<div class="col-sm-4">
						<div class="input-group">
							<select class="form-control select2" name="masalah_dominan" id="masalah_dominan">
								<option value="">Pilih</option>
								<?php
								$qrym = mysqli_query($con, "SELECT masalah FROM tbl_masalahutama_ncp ORDER BY masalah ASC");
								while ($rm = mysqli_fetch_array($qrym)) {
								?>
									<option value="<?php echo $rm['masalah']; ?>" <?php if ($rcek['masalah_dominan'] == $rm['masalah']) {
																						echo "SELECTED";
																					} ?>><?php echo $rm['masalah']; ?></option>
								<?php } ?>
							</select>
							<!-- <span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataMasalahDominan"> ...</button></span> -->
						</div>
					</div>
					<div class="col-sm-2">
						<select class="form-control select2" name="m_proses" id="m_proses">
							<option value="">Pilih</option>
							<option value="Oven" <?php if ($rcek['m_proses'] == "Oven") {
														echo "SELECTED";
													} ?>>Oven</option>
							<option value="Finish" <?php if ($rcek['m_proses'] == "Finish") {
														echo "SELECTED";
													} ?>>Finish</option>
						</select>
					</div>
					<div class="col-sm-2">
						<label for="ncp_hitung"><input type="checkbox" name="ncp_hitung" id="ncp_hitung" value="ya" <?php if ($rcek['ncp_hitung'] == "ya") {
																														echo "CHECKED";
																													} ?>> &nbsp;
							<em>NCP Dihitung</em></label>
					</div>
				</div>
				<div class="form-group">
					<label for="masalah_tambahan" class="col-sm-3 control-label">Masalah Tambahan</label>
					<div class="col-sm-6">
						<input name="masalah_tambahan" type="text" class="form-control" id="masalah_tambahan" value="<?php if ($cek > 0) {
																															echo $rcek['masalah_tambahan'];
																														} ?>" placeholder="Penyebab Tambahan">
					</div>

				</div>
				<div class="form-group">
					<label for="multi" class="col-sm-3 control-label">Analisa Kerusakan yg Terjadi</label>
					<div class="col-sm-8">
						<div class="input-group">
							<select class="form-control select2" multiple="multiple" data-placeholder="Jenis Masalah" name="rmp_benang[]" id="kerusakan" required>
								<?php
								$dtArr = $rcek['masalah'];
								$data = explode(",", $dtArr);
								$qCek1 = mysqli_query($con, "SELECT nama FROM tbl_masalah_ncp WHERE jenis='Masalah' ORDER BY nama ASC");
								$i = 0;
								while ($dCek1 = mysqli_fetch_array($qCek1)) { ?>
									<option value="<?php echo $dCek1['nama']; ?>" <?php if ($dCek1['nama'] == $data[0] or $dCek1['nama'] == $data[1] or $dCek1['nama'] == $data[2] or $dCek1['nama'] == $data[3] or $dCek1['nama'] == $data[4] or $dCek1['nama'] == $data[5]) {
																						echo "SELECTED";
																					} ?>><?php echo $dCek1['nama']; ?></option>
								<?php $i++;
								} ?>
							</select>
							<span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataMasalah"> ...</button></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="rol" class="col-sm-3 control-label">Rol</label>
					<div class="col-sm-2">
						<input name="rol" type="text" class="form-control" id="rol" value="<?php if ($cek > 0) {
																								echo $rcek['rol'];
																							} else {
																								if ($rowr['JML_ROLL'] != 0) {
																									echo $rowr['JML_ROLL'];
																								}
																							} ?>" placeholder="0.00" style="text-align: right;" required>
					</div>
				</div>
				<div class="form-group">
					<label for="berat" class="col-sm-3 control-label">Berat</label>
					<div class="col-sm-3">
						<div class="input-group">
							<input name="berat" type="text" class="form-control" id="berat" value="<?php if ($cek > 0) {
																										echo $rcek['berat'];
																									} else {
																										echo round($rowkg['QTY_BAGI_KAIN'], 2);
																									} ?>" placeholder="0.00" style="text-align: right;" required>
							<span class="input-group-addon">KGs</span>
						</div>
					</div>
					<label for="kain_gerobak"><input type="checkbox" name="kain_gerobak" id="ncp_hitung" value="ya" <?php if ($rcek['kain_gerobak'] == "ya") {
																														echo "CHECKED";
																													} ?>> &nbsp;
						<em>Kain di Gerobak</em></label>
				</div>
				<div class="form-group">
					<label for="dept" class="col-sm-3 control-label">Dept</label>
					<div class="col-sm-3">
						<select class="form-control select2" name="dept" id="dept" required>
							<option value="">Pilih</option>
							<option value="MKT" <?php if ($rcek['dept'] == "MKT") {
													echo "SELECTED";
												} ?>>MKT</option>
							<option value="FIN" <?php if ($rcek['dept'] == "FIN") {
													echo "SELECTED";
												} ?>>FIN</option>
							<option value="DYE" <?php if ($rcek['dept'] == "DYE") {
													echo "SELECTED";
												} ?>>DYE</option>
							<option value="KNT" <?php if ($rcek['dept'] == "KNT") {
													echo "SELECTED";
												} ?>>KNT</option>
							<option value="LAB" <?php if ($rcek['dept'] == "LAB") {
													echo "SELECTED";
												} ?>>LAB</option>
							<option value="PPC" <?php if ($rcek['dept'] == "PPC") {
													echo "SELECTED";
												} ?>>PPC</option>
							<option value="QCF" <?php if ($rcek['dept'] == "QCF") {
													echo "SELECTED";
												} ?>>QCF</option>
							<option value="CQA" <?php if ($rcek['dept'] == "CQA") {
													echo "SELECTED";
												} ?>>CQA</option>
							<option value="RMP" <?php if ($rcek['dept'] == "RMP") {
													echo "SELECTED";
												} ?>>RMP</option>
							<option value="KNK" <?php if ($rcek['dept'] == "KNK") {
													echo "SELECTED";
												} ?>>KNK</option>
							<option value="GKG" <?php if ($rcek['dept'] == "GKG") {
													echo "SELECTED";
												} ?>>GKG</option>
							<option value="GKJ" <?php if ($rcek['dept'] == "GKJ") {
													echo "SELECTED";
												} ?>>GKJ</option>
							<option value="BRS" <?php if ($rcek['dept'] == "BRS") {
													echo "SELECTED";
												} ?>>BRS</option>
							<option value="PRT" <?php if ($rcek['dept'] == "PRT") {
													echo "SELECTED";
												} ?>>PRT</option>
							<option value="TAS" <?php if ($rcek['dept'] == "TAS") {
													echo "SELECTED";
												} ?>>TAS</option>
							<option value="YND" <?php if ($rcek['dept'] == "YND") {
													echo "SELECTED";
												} ?>>YND</option>
							<option value="PRO" <?php if ($rcek['dept'] == "PRO") {
													echo "SELECTED";
												} ?>>PRO</option>
							<option value="GAS" <?php if ($rcek['dept'] == "GAS") {
													echo "SELECTED";
												} ?>>GAS</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="tempat" class="col-sm-3 control-label">Tempat Kain Diletakkan</label>
					<div class="col-sm-5">
						<input name="tempat" type="text" class="form-control" id="tempat" value="<?php if ($cek > 0) {
																										echo $rcek['tempat'];
																									} ?>" placeholder="Tempat Kain Diletakkan">
					</div>
				</div>
				<div class="form-group">
					<label for="peninjau_awal1" class="col-sm-3 control-label">Nama Peninjau Awal</label>
					<div class="col-sm-5">
						<input name="peninjau_awal1" type="text" class="form-control" id="peninjau_awal1" value="<?php if ($cek > 0) {
																														echo $rcek['peninjau_awal'];
																													} ?>" placeholder="Nama Peninjau Awal">
					</div>
				</div>

				<div class="form-group">
					<label for="ket" class="col-sm-3 control-label">Keterangan</label>
					<div class="col-sm-7">
						<textarea name="ket" rows="3" class="form-control" id="ket" placeholder="Keterangan"><?php if ($cek > 0) {
																													echo $rcek['ket'];
																												} ?></textarea>
					</div>
				</div>

				<input type="hidden" value="<?php if ($cek > 0) {
												echo $rcek['revisi'];
											} ?>" name="rev0">
				<input type="hidden" value="<?php echo $urutS; //if($cek0>0){ echo $rcek0['salin_urut']; } 
											?>" name="salin_urut">
				<input type="hidden" value="<?php if ($cek > 0) {
												echo $rcek['id'];
											} ?>" name="idncp">

			</div>

		</div>
		<div class="box-footer">
			<?php if ($_GET['nodemand'] != "") { ?>
				<?php if ($NCPNO != "") { ?>
					<input type="submit" value="Ubah" name="save" id="save" class="btn btn-primary pull-right">
				<?php } else { ?>
					<input type="submit" value="Simpan" name="save" id="save" class="btn btn-primary pull-right">
				<?php } ?>

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
function no_urut()
{
	include "koneksi.php";
	date_default_timezone_set("Asia/Jakarta");
	$format = date("y/m/");
	$sql = mysqli_query($con, "SELECT no_ncp FROM tbl_ncp_qcf_now WHERE substr(no_ncp,1,6) like '" . $format . "%' ORDER BY round(substr(no_ncp,7,4)) DESC LIMIT 1 ") or die(mysqli_error());
	$d = mysqli_num_rows($sql);
	if ($d > 0) {
		$r = mysqli_fetch_array($sql);
		$d = $r['no_ncp'];
		$str = substr($d, 6, 4);
		$Urut = (int)$str;
	} else {
		$Urut = 0;
	}
	$Urut = $Urut + 1;
	$Nol = "";
	$nilai = 4 - strlen($Urut);
	for ($i = 1; $i <= $nilai; $i++) {
		$Nol = $Nol . "0";
	}
	$nipbr = $format . $Nol . $Urut;
	return $nipbr;
}
$nou = no_urut();
function autono_reg()
{
	include "koneksi.php";
	date_default_timezone_set('Asia/Jakarta');
	$bln = date("ym");
	$today = date("ymd");
	$sqlnotes = mysqli_query($con, "SELECT reg_no FROM tbl_ncp_qcf_now WHERE substr(reg_no,1,6) like '%" . $today . "%' ORDER BY reg_no DESC LIMIT 1") or die(mysqli_error());
	$dt = mysqli_num_rows($sqlnotes);
	if ($dt > 0) {
		$rd = mysqli_fetch_array($sqlnotes);
		$dt = $rd['reg_no'];
		$strd = substr($dt, 6, 2);
		$Urutd = (int)$strd;
	} else {
		$Urutd = 0;
	}
	$Urutd = $Urutd + 1;
	$Nold = "";
	$nilaid = 2 - strlen($Urutd);
	for ($i = 1; $i <= $nilaid; $i++) {
		$Nold = $Nold . "0";
	}
	$no2 = $today . $Nold . $Urutd;
	//$no2 =$today.str_pad($Urutd, 4, "0",  STR_PAD_LEFT);
	return $no2;
}
if ($_POST['save'] == "Simpan") {
	$warna = str_replace("'", "''", $_POST['warna']);
	$nowarna = str_replace("'", "''", $_POST['no_warna']);
	$jns = str_replace("'", "''", $_POST['jns_kain']);
	$po = str_replace("'", "''", $_POST['no_po']);
	$ket = str_replace("'", "''", $_POST['ket']);
	$ncp = $nou;
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
	if ($_POST['ncp_hitung'] == "ya") {
		$hitung = "ya";
	} else {
		$hitung = "tidak";
	}
	if ($_POST['kain_gerobak'] == "ya") {
		$kaingerobak = "ya";
	} else {
		$kaingerobak = "tidak";
	}

	$sqlCk = mysqli_query($con, "SELECT no_ncp FROM tbl_ncp_qcf_now WHERE reg_no='$REGNO' ORDER BY id DESC LIMIT 1");
	$rck = mysqli_fetch_array($sqlCk);
	$sqlCk1 = mysqli_query($con, "SELECT revisi, no_ncp, dept FROM tbl_ncp_qcf_now WHERE reg_no='$REGNO' and dept='$_POST[dept]' ORDER BY revisi DESC LIMIT 1");
	$rck1 = mysqli_fetch_array($sqlCk1);	
	$rev1 = (int) $rck1['revisi'] + 1;
	if ($rck1['no_ncp'] != "" and $rck1['dept'] != "") {
		$ncp = $rck1['no_ncp'];
	} else if ($rck['no_ncp'] != "") {
		$ncp = $rck['no_ncp'];
		$sqlCk2 = mysqli_query($con, "SELECT revisi, no_ncp, dept FROM tbl_ncp_qcf_now WHERE no_ncp='$ncp' and dept='$_POST[dept]' ORDER BY revisi DESC LIMIT 1");
		$rck2 = mysqli_fetch_array($sqlCk2);
		$rev1 = (int) $rck2['revisi'] + 1;
	} else {
		$ncp = $nou;
	}
	$ncpgabung = $ncp . " " . $_POST['dept'] . "" . $rev1;


	if ($_POST['regno'] != "") {
		$rgno = $_POST['regno'];
	} else {
		$rgno = autono_reg();
	}
	$sqlData = mysqli_query($con, "INSERT INTO tbl_ncp_qcf_now SET 
												reg_no='$rgno',
												nodemand='$_POST[nodemand]',
												nokk='$_POST[nokk]',
												no_ncp='$ncp',
												langganan='$_POST[pelanggan]',
												buyer='$_POST[buyer]',
												no_order='$_POST[no_order]',
												no_hanger='$_POST[no_hanger]',
												no_item='$_POST[no_item]',
												prod_order='$_POST[lot]',
												po='$po',
												po_rajut='$_POST[po_rajut]',
												supp_rajut='$_POST[supp_rajut]',
												jenis_kain='$jns',
												lebar='$_POST[lebar]',
												gramasi='$_POST[grms]',
												lot='$_POST[lot]',
												rol='$_POST[rol]',
												warna='$warna',
												no_warna='$nowarna',
												masalah='$kt1',
												berat='$_POST[berat]',
												dept='$_POST[dept]',
												nsp='$_POST[nsp1]',
												nsp1='$_POST[nsp2]',
												nsp2='$_POST[nsp3]',
												peninjau_awal='$_POST[peninjau_awal1]',
												ket='$ket',
												tempat='$_POST[tempat]',
												masalah_tambahan='$_POST[masalah_tambahan]',
												masalah_dominan='$_POST[masalah_dominan]',
												dibuat_oleh='$_POST[dibuat_oleh]',
												revisi='$rev1',
												no_ncp_gabungan='$ncpgabung',
												ncp_hitung='$hitung',
												kain_gerobak='$kaingerobak',
												m_proses='$_POST[m_proses]',
												tgl_delivery='$_POST[tgl_delivery]',
												tgl_rencana='$_POST[tgl_target]',
												tgl_buat=now(),
												tgl_update=now(),
												status_warna = '$_POST[status_warna]',
												disposisi = '$_POST[disposisi]'");

	if ($sqlData) {

		echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
      window.open('pages/cetak/cetak_ncp_now.php?no_ncp_gabungan=$ncpgabung','_blank');
      window.location.href='NCPNew-$_GET[nodemand]';
	 
  }
});</script>";
	}
}
if ($_POST['save'] == "Ubah") {
	$sqlCk = mysqli_query($con, "SELECT revisi,dept,no_ncp FROM tbl_ncp_qcf_now WHERE id='$_POST[idncp]' ORDER BY id DESC LIMIT 1");
	$rck = mysqli_fetch_array($sqlCk);
	$ket = str_replace("'", "''", $_POST['ket']);
	$po = str_replace("'", "''", $_POST['no_po']);
	$lot = trim($_POST['lot']);
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
	if ($_POST['ncp_hitung'] == "ya") {
		$hitung = "ya";
	} else {
		$hitung = "tidak";
	}
	if ($_POST['kain_gerobak'] == "ya") {
		$kaingerobak = "ya";
	} else {
		$kaingerobak = "tidak";
	}
	if ($_POST['dept'] == $rck['dept']) {
		$rev1 = $rck['revisi'];

		$ncpgabung = $rck['no_ncp'] . " " . $_POST['dept'] . "" . $rev1;
	} else {
		$sqlCk1 = mysqli_query($con, "SELECT revisi, no_ncp FROM tbl_ncp_qcf_now WHERE nodemand='$nodemand' and dept='$_POST[dept]' ORDER BY id DESC LIMIT 1");
		$rck1 = mysqli_fetch_array($sqlCk1);
		$rev1 = $rck1['revisi'] + 1;
		$ncpgabung = $rck['no_ncp'] . " " . $_POST['dept'] . "" . $rev1;
	}
	$sqlData = mysqli_query($con, "UPDATE tbl_ncp_qcf_now SET 
		  rol='$_POST[rol]',
		  masalah='$kt1',
		  berat='$_POST[berat]',
		  nsp='$_POST[nsp1]',
		  nsp1='$_POST[nsp2]',
		  nsp2='$_POST[nsp3]',
		  po='$po',
		  lot='$lot',
		  revisi='$rev1',
		  dept='$_POST[dept]',
		  no_ncp_gabungan='$ncpgabung',
		  peninjau_awal='$_POST[peninjau_awal1]',
		  ket='$ket',
		  ncp_hitung='$hitung',
		  kain_gerobak='$kaingerobak',
		  masalah_tambahan='$_POST[masalah_tambahan]',
		  masalah_dominan='$_POST[masalah_dominan]',
		  dibuat_oleh='$_POST[dibuat_oleh]',
		  m_proses='$_POST[m_proses]',
		  tgl_update=now()
		  WHERE id='$_POST[idncp]' ");

	if ($sqlData) {
		echo "<script>swal({
  title: 'Data Telah diUbah',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
      window.open('pages/cetak/cetak_ncp_now.php?id=$_POST[idncp]','_blank');
      window.location.href='NCPNew-$nodemand';
	 
  }
});</script>";
	}
}
?>

<script language="javascript">
	function rd() {
		if (document.forms['form1']['no_ncp'].value != "") {
			//document.forms['form1']['save'].setAttribute("disabled",true);
			document.forms['form1']['save'].value = "Ubah";
			document.form1.rol.removeAttribute("required");
			document.form1.berat.removeAttribute("required");
			document.form1.dept.removeAttribute("required");
			document.form1.kerusakan.removeAttribute("required");
		} else {
			//document.forms['form1']['save'].removeAttribute("disabled");
			document.forms['form1']['save'].value = "Simpan";
			document.form1.rol.setAttribute("required", true);
			document.form1.berat.setAttribute("required", true);
			document.form1.dept.setAttribute("required", true);
			document.form1.kerusakan.setAttribute("required", true);

		}

	}
</script>
<div class="modal fade" id="DataMasalah">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Analisa Kerusakan yg Terjadi</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
						<label for="kerusakan" class="col-md-3 control-label">Jenis Kerusakan</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="kerusakan" name="kerusakan" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<input type="submit" value="Simpan" name="simpan_kerusakan" id="simpan_kerusakan" class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php
if ($_POST['simpan_kerusakan'] == "Simpan") {
	$sqlData1 = mysqli_query($con, "INSERT INTO tbl_masalah_ncp SET 
		  nama='$_POST[kerusakan]'");
	if ($sqlData1) {
		echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='NCPNew-$nodemand';
	 
  }
});</script>";
	}
}
?>

<div class="modal fade" id="DataMasalahDominan">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Masalah Utama</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
						<label for="masalah_dominan" class="col-md-3 control-label">Jenis Masalah</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="masalah_dominan" name="masalah_dominan" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<input type="submit" value="Simpan" name="simpan_masalah" id="simpan_masalah" class="btn btn-primary pull-right">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<div id="DetailNCP" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<?php
if ($_POST['simpan_masalah'] == "Simpan") {
	$masalah = strtoupper($_POST['masalah_dominan']);
	$sqlData1 = mysqli_query($con, "INSERT INTO tbl_masalahutama_ncp SET 
		  masalah='$masalah'");
	if ($sqlData1) {
		echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='NCPNew-$nodemand';
	 
  }
});</script>";
	}
}
?>