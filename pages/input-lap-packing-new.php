<script type="text/javascript">
    function proses_nodemand() {
        var nodemand = document.getElementById("nodemand").value;

        if (nodemand == 0) {
            window.location.href = 'LapPackingNew';
        } else {
            window.location.href = 'LapPackingNew&' + nodemand;
        }
    }

    function proses_shift() {
        var nodemand = document.getElementById("nodemand").value;
        var shift = document.getElementById("shift").value;

        if (nodemand == "") {
            swal({
                title: 'Nomor Demand tidak boleh kosong',
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
            });
        } else if (shift == 0) {
            swal({
                title: 'Shift tidak boleh kosong',
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
            });
        } else {
            window.location.href = 'LapPackingNew&' + nodemand + '&' + shift;
        }

    }

    function proses_operator() {
        var nodemand = document.getElementById("nodemand").value;
        var shift = document.getElementById("shift").value;
        var operator = document.getElementById("operator").value;

        if (nodemand == "") {
            swal({
                title: 'Nomor Demand tidak boleh kosong',
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
            });
        } else if (shift == 0) {
            swal({
                title: 'Shift tidak boleh kosong',
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
            });
        } else if (operator == "") {
            swal({
                title: 'Operator tidak boleh kosong',
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
            });
        } else {
            window.location.href = 'LapPackingNew&' + nodemand + '&' + shift + '&' + operator;
        }
    }
</script>
<?php
include "koneksi.php";
// ini_set("error_reporting", 1);


if ($_POST['simpan'] == "simpan") {
    // $ceksql = mysqli_query($con, "SELECT * FROM `tbl_lap_inspeksi` WHERE `nodemand`='$_GET[nodemand]' and `shift`='$_POST[shift]' AND DATE_FORMAT(tgl_update, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') AND `dept`='PACKING' LIMIT 1");
    $ceksql = mysqli_query($con, "SELECT * FROM `tbl_lap_inspeksi` WHERE `nodemand`='$_GET[nodemand]' and `shift`='$_POST[shift]' AND `dept`='PACKING' AND`operator`='$_GET[operator]'LIMIT 1");
    $cek = mysqli_num_rows($ceksql);
    if ($cek > 0) {
        $pelanggan = str_replace("'", "''", $_POST['pelanggan']);
        $order = str_replace("'", "''", $_POST['no_order']);
        $jns = str_replace("'", "''", $_POST['jenis_kain']);
		$noteloss = str_replace("'", "''", $_POST['note_loss']);
        $warna = str_replace("'", "''", $_POST['warna']);
        $catatan = str_replace("'", "''", $_POST['catatan']);
        if ($_POST['sts_gkg'] == "1") {
            $stKG = "1";
        } else {
            $stKG = "0";
        }
        $sql1 = mysqli_query($con, "UPDATE `tbl_lap_inspeksi` SET
	`no_order`='$order',
	`pelanggan`='$pelanggan',
	`jenis_kain`='$jns',
	`warna`='$warna',
	`tgl_pengiriman`='$_POST[awal]',
	`lot`='$_POST[lot]',
	`inspektor`='$_POST[inspektor]',
	`no_mc`='$_POST[no_mc]',
	`jml_roll`='$_POST[rol]',
	`bruto`='$_POST[bruto]',
	`jml_netto`='$_POST[rol_netto]',
	`netto`='$_POST[netto]',
    `mutasi`='$_POST[mutasi]',
	`jml_mutasi`='$_POST[rol_mutasi]',
	`kg_bs`='$_POST[kg_bs]',
	`jml_bs`='$_POST[rol_bs]',
	`kg_th`='$_POST[kg_th]',
	`jml_th`='$_POST[rol_th]',
	`panjang`='$_POST[panjang]',
	`satuan`='$_POST[satuan]',
	`proses`='$_POST[proses]',
	`status`='$_POST[status]',
	`no_grobak`='$_POST[no_grbk]',
	`tgl_mulai`='$_POST[tgl_mulai]',
	`tgl_selesai`='$_POST[tgl_selesai]',
	`jam_mulai`='$_POST[mulai]',
	`jam_selesai`='$_POST[selesai]',
	`istirahat`='$_POST[istirahat]',
	`catatan`='$catatan',
	`jam_mutasi`='$_POST[jam]',
	`sts_gkg`='$stKG',
	`tgl_update`='$_POST[tgl]',
    `operator`='$_POST[operator]',
    `lebar`='$_POST[lebar]',
    `gramasi`='$_POST[gramasi]',
	`qty_loss`='$_POST[qty_loss]',
	`note_loss`='$noteloss',
    `ket_qty`='$_POST[ket_qty]',
    ket_bs = '$_POST[ket_bs]',
    ket_dept_penyebab = '$_POST[ket_dept_penyebab]',
    qty_kq = '$_POST[qty_kq]',
    note_kq = '$_POST[note_kq]',
    qty_bq = '$_POST[qty_bq]',
    note_bq = '$_POST[note_bq]',
    qty_kf = '$_POST[qty_kf]',
    note_kf = '$_POST[note_kf]',
    qty_bf = '$_POST[qty_bf]',
    note_bf = '$_POST[note_bf]'
	WHERE `nodemand`='$_POST[nodemand]' and  `shift`='$_POST[shift]'");
        if ($sql1) {
            //echo " <script>alert('Data has been updated!');</script>";
            echo "<script>
                    swal({
                        title: 'Data has been updated!',   
                        text: 'Klik Ok untuk input data kembali',
                        type: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href='LapPackingNew&$_POST[nodemand]';
                        }
                    });
                </script>";
        }
    } else {
        $pelanggan = str_replace("'", "''", $_POST['pelanggan']);
        $order = str_replace("'", "''", $_POST['no_order']);
        $jns = str_replace("'", "''", $_POST['jenis_kain']);
		$noteloss = str_replace("'", "''", $_POST['note_loss']);
        $warna = str_replace("'", "''", $_POST['warna']);
        $catatan = str_replace("'", "''", $_POST['catatan']);
        if ($_POST['sts_gkg'] == "1") {
            $stKG = "1";
        } else {
            $stKG = "0";
        }
        $sql = mysqli_query($con, "INSERT INTO `tbl_lap_inspeksi` SET
	`nokk`='$_POST[nokk]',
    `nodemand`='$_POST[nodemand]',
	`no_order`='$order',
	`pelanggan`='$pelanggan',
	`jenis_kain`='$jns',
	`no_item`='$_POST[no_item]',
	`no_hanger`='$_POST[no_hanger]',
	`warna`='$warna',
	`tgl_pengiriman`='$_POST[awal]',
	`lot`='$_POST[lot]',
	`inspektor`='$_POST[inspektor]',
	`shift`='$_POST[shift]',
	`no_mc`='$_POST[no_mc]',
	`jml_roll`='$_POST[rol]',
	`bruto`='$_POST[bruto]',
	`netto`='$_POST[netto]',
	`jml_netto`='$_POST[rol_netto]',
    `mutasi`='$_POST[mutasi]',
	`jml_mutasi`='$_POST[rol_mutasi]',
	`kg_bs`='$_POST[kg_bs]',
	`jml_bs`='$_POST[rol_bs]',
	`kg_th`='$_POST[kg_th]',
	`jml_th`='$_POST[rol_th]',
	`panjang`='$_POST[panjang]',
	`satuan`='$_POST[satuan]',
	`proses`='$_POST[proses]',
	`status`='$_POST[status]',
	`no_grobak`='$_POST[no_grbk]',
	`tgl_mulai`='$_POST[tgl_mulai]',
	`tgl_selesai`='$_POST[tgl_selesai]',
	`jam_mulai`='$_POST[mulai]',
	`jam_selesai`='$_POST[selesai]',
	`istirahat`='$_POST[istirahat]',
	`catatan`='$catatan',
	`dept`='PACKING',
	`jam_mutasi`='$_POST[jam]',
	`sts_gkg`='$stKG',
	`tgl_update`='$_POST[tgl]',
	`jam_update`=now(),
    `operator`='$_POST[operator]',
    `lebar`='$_POST[lebar]',
    `gramasi`='$_POST[gramasi]',
	`qty_loss`='$_POST[qty_loss]',
	`note_loss`='$noteloss',
    `ket_qty`='$_POST[ket_qty]',
    `ket_bs` = '$_POST[ket_bs]',
    `ket_dept_penyebab` = '$_POST[ket_dept_penyebab]',
    qty_kq = '$_POST[qty_kq]',
    note_kq = '$_POST[note_kq]',
    qty_bq = '$_POST[qty_bq]',
    note_bq = '$_POST[note_bq]',
    qty_kf = '$_POST[qty_kf]',
    note_kf = '$_POST[note_kf]',
    qty_bf = '$_POST[qty_bf]',
    note_bf = '$_POST[note_bf]'
    ");
        if ($sql) {
            //echo " <script>alert('Data has been saved!');</script>";
            echo "<script>
                    swal({
                        title: 'Data has been saved!',   
                        text: 'Klik Ok untuk input data kembali',
                        type: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href='LapPackingNew&$_POST[nodemand]';
                        }
                    });
                </script>";
        }
    }
}
?>

<?Php
$nodemand = $_GET['nodemand'];
$operator = $_GET['operator'];
if ($_GET['shift'] != "") {
    $shift = $_GET['shift'];
} else {
    $shift = " ";
}

//Data sudah disimpan di database mysqli
$msql1 = mysqli_query($con, "SELECT * FROM `tbl_lap_inspeksi` WHERE `nodemand`='$nodemand' and `shift`='$_GET[shift]' AND DATE_FORMAT(tgl_update, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') AND `dept`='PACKING'");
$row1 = mysqli_fetch_array($msql1);
$crow1 = mysqli_num_rows($msql1);

//Data sudah disimpan di database mysqli
$msql = mysqli_query($con, "SELECT * FROM `tbl_lap_inspeksi` WHERE `nodemand`='$nodemand' and `shift`='$_GET[shift]' AND `dept`='PACKING' AND `operator`='$_GET[operator]' ");
$row = mysqli_fetch_array($msql);
$crow = mysqli_num_rows($msql);
//Data sudah disimpan di database mysqli
$qryfin = mysqli_query($con, "SELECT * FROM `tbl_lap_inspeksi` WHERE `nodemand`='$nodemand' AND `dept`='PACKING' ORDER BY id DESC");
$rfin = mysqli_fetch_array($qryfin);
$cekfin = mysqli_num_rows($qryfin);

//Ambil data tgl mulai
$qryM = mysqli_query($con, "SELECT * FROM `tmp_detail_kite` WHERE nokkKite='$nokk' ORDER BY id DESC LIMIT 1");
$rM = mysqli_fetch_array($qryM);

//Ambil data tgl selesai
$qryS = mysqli_query($con, "SELECT a.*, b.* FROM detail_pergerakan_stok a LEFT JOIN pergerakan_stok b 
ON a.id_stok=b.id WHERE a.nokk='$nokk' AND a.transtatus IS NULL ORDER BY a.id DESC LIMIT 1");
$rS = mysqli_fetch_array($qryS);

//Data belum disimpan di database mysqli
$sqlDB2 = " SELECT
	p.CODE AS DEMANDNO,
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
		PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
    ) ps
ON p.CODE = ps.PRODUCTIONDEMANDCODE
LEFT OUTER JOIN (
	SELECT
		BUSINESSPARTNER.LEGALNAME1,
		ORDERPARTNER.CUSTOMERSUPPLIERCODE
	FROM BUSINESSPARTNER BUSINESSPARTNER
	LEFT JOIN ORDERPARTNER ORDERPARTNER 
    ON BUSINESSPARTNER.NUMBERID = ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID
    ) E
ON p.CUSTOMERCODE = E.CUSTOMERSUPPLIERCODE
LEFT OUTER JOIN USERGENERICGROUP f
ON p.SUBCODE05 = f.CODE
LEFT OUTER JOIN PRODUCTIONDEMAND h
ON p.ORIGDLVSALORDLINESALORDERCODE = h.ORIGDLVSALORDLINESALORDERCODE
AND p.SUBCODE01 = h.SUBCODE01
AND p.SUBCODE02 = h.SUBCODE02
AND p.SUBCODE03 = h.SUBCODE03
AND p.SUBCODE04 = h.SUBCODE04
AND h.ITEMTYPEAFICODE = 'KGF'
WHERE p.CODE = '$nodemand'
";
$stmt = db2_exec($conn1, $sqlDB2, array('cursor' => DB2_SCROLLABLE));
$rowdb2 = db2_fetch_assoc($stmt);

$sqlDB20 = "SELECT
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
		ORDERPARTNERBRAND.LONGDESCRIPTION";
$stmt0 = db2_exec($conn1, $sqlDB20, array('cursor' => DB2_SCROLLABLE));
$rowdb20 = db2_fetch_assoc($stmt0);

$sqlDB21 = "SELECT
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
FROM STOCKTRANSACTION STOCKTRANSACTION
WHERE STOCKTRANSACTION.ORDERCODE ='$rowdb2[PRODUCTIONORDERCODE]' AND STOCKTRANSACTION.TEMPLATECODE ='120'
AND STOCKTRANSACTION.ITEMTYPECODE ='KGF'
GROUP BY 
STOCKTRANSACTION.ORDERCODE";
$stmt1 = db2_exec($conn1, $sqlroll, array('cursor' => DB2_SCROLLABLE));
$rowr = db2_fetch_assoc($stmt1);
$sqlbruto = "
SELECT
	PRODUCTIONRESERVATION.ORDERCODE,
	PRODUCTIONRESERVATION.ITEMTYPEAFICODE,
	SUM(PRODUCTIONRESERVATION.USEDBASEPRIMARYQUANTITY) AS QTY_BAGI_KAIN
FROM
	PRODUCTIONRESERVATION 
	PRODUCTIONRESERVATION
WHERE
	PRODUCTIONRESERVATION.ITEMTYPEAFICODE = 'KGF' AND PRODUCTIONRESERVATION.ORDERCODE='$nodemand'
GROUP BY
	PRODUCTIONRESERVATION.ORDERCODE,
	PRODUCTIONRESERVATION.ITEMTYPEAFICODE ";
$stmtbr = db2_exec($conn1, $sqlbruto, array('cursor' => DB2_SCROLLABLE));
$rowbr = db2_fetch_assoc($stmtbr);
$sqlto = "SELECT 
ELEMENTSINSPECTION.DEMANDCODE,
ELEMENTSINSPECTION.OPERATORCODE,
LISTAGG(DISTINCT TRIM(ELEMENTSINSPECTION.INSPECTIONSTATION), ',') AS INSPECTIONSTATION,
ELEMENTSINSPECTION.LENGTHUOMCODE,
A.TGL_AWAL_INSPEK,
A.JAM_AWAL_INSPEK,
B.TGL_AKHIR_INSPEK,
B.JAM_AKHIR_INSPEK,
COUNT(ELEMENTSINSPECTION.ELEMENTCODE) AS TOTAL_ROLL,
SUM(ELEMENTSINSPECTION.WEIGHTGROSS) AS TOTAL_KG,
SUM(ELEMENTSINSPECTION.LENGTHGROSS) AS TOTAL_YARD
FROM ELEMENTSINSPECTION ELEMENTSINSPECTION 
LEFT JOIN
	(SELECT
	ELEMENTSINSPECTION.DEMANDCODE,
	ELEMENTSINSPECTION.OPERATORCODE,
	LEFT(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,10) AS TGL_AWAL_INSPEK,
	SUBSTR(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,12,5) AS JAM_AWAL_INSPEK
	FROM ELEMENTSINSPECTION ELEMENTSINSPECTION 
	WHERE ELEMENTSINSPECTION.DEMANDCODE ='$_GET[nodemand]' AND ELEMENTSINSPECTION.OPERATORCODE ='$_GET[operator]'
	AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13
	ORDER BY ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ASC LIMIT 1) A
ON ELEMENTSINSPECTION.DEMANDCODE = A.DEMANDCODE AND 
ELEMENTSINSPECTION.OPERATORCODE = A.OPERATORCODE
LEFT JOIN
	(SELECT
	ELEMENTSINSPECTION.DEMANDCODE,
	ELEMENTSINSPECTION.OPERATORCODE,
	LEFT(ELEMENTSINSPECTION.INSPECTIONENDDATETIME,10) AS TGL_AKHIR_INSPEK,
	SUBSTR(ELEMENTSINSPECTION.INSPECTIONENDDATETIME,12,5) AS JAM_AKHIR_INSPEK
	FROM ELEMENTSINSPECTION ELEMENTSINSPECTION 
	WHERE ELEMENTSINSPECTION.DEMANDCODE ='$_GET[nodemand]' AND ELEMENTSINSPECTION.OPERATORCODE ='$_GET[operator]'
	AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13
	ORDER BY ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME DESC LIMIT 1) B
ON ELEMENTSINSPECTION.DEMANDCODE = B.DEMANDCODE AND 
ELEMENTSINSPECTION.OPERATORCODE = B.OPERATORCODE
WHERE ELEMENTSINSPECTION.DEMANDCODE ='$_GET[nodemand]' AND ELEMENTSINSPECTION.OPERATORCODE ='$_GET[operator]'
AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13	
GROUP BY 
ELEMENTSINSPECTION.DEMANDCODE,
ELEMENTSINSPECTION.OPERATORCODE,
--ELEMENTSINSPECTION.INSPECTIONSTATION,
ELEMENTSINSPECTION.LENGTHUOMCODE,
A.TGL_AWAL_INSPEK,
A.JAM_AWAL_INSPEK,
B.TGL_AKHIR_INSPEK,
B.JAM_AKHIR_INSPEK";
$stmt2 = db2_exec($conn1, $sqlto, array('cursor' => DB2_SCROLLABLE));
$rowto = db2_fetch_assoc($stmt2);

$sqltoTH = "SELECT 
ELEMENTSINSPECTION.DEMANDCODE,
ELEMENTSINSPECTION.OPERATORCODE,
ELEMENTSINSPECTION.INSPECTIONSTATION,
ELEMENTSINSPECTION.LENGTHUOMCODE,
A.TGL_AWAL_INSPEK,
A.JAM_AWAL_INSPEK,
B.TGL_AKHIR_INSPEK,
B.JAM_AKHIR_INSPEK,
COUNT(ELEMENTSINSPECTION.ELEMENTCODE) AS TH_ROLL,
SUM(ELEMENTSINSPECTION.WEIGHTGROSS) AS TH_KG,
SUM(ELEMENTSINSPECTION.LENGTHGROSS) AS TH_YARD
FROM ELEMENTSINSPECTION ELEMENTSINSPECTION 
LEFT JOIN
	(SELECT
	ELEMENTSINSPECTION.DEMANDCODE,
	ELEMENTSINSPECTION.OPERATORCODE,
	LEFT(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,10) AS TGL_AWAL_INSPEK,
	SUBSTR(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,12,5) AS JAM_AWAL_INSPEK
	FROM ELEMENTSINSPECTION ELEMENTSINSPECTION 
	WHERE ELEMENTSINSPECTION.DEMANDCODE ='$_GET[nodemand]' AND ELEMENTSINSPECTION.OPERATORCODE ='$_GET[operator]'
	AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13 AND 
(ELEMENTSINSPECTION.QUALITYREASONCODE IS NULL OR 
ELEMENTSINSPECTION.QUALITYREASONCODE ='SP' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='FOC')
	ORDER BY ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ASC LIMIT 1) A
ON ELEMENTSINSPECTION.DEMANDCODE = A.DEMANDCODE AND 
ELEMENTSINSPECTION.OPERATORCODE = A.OPERATORCODE
LEFT JOIN
	(SELECT
	ELEMENTSINSPECTION.DEMANDCODE,
	ELEMENTSINSPECTION.OPERATORCODE,
	LEFT(ELEMENTSINSPECTION.INSPECTIONENDDATETIME,10) AS TGL_AKHIR_INSPEK,
	SUBSTR(ELEMENTSINSPECTION.INSPECTIONENDDATETIME,12,5) AS JAM_AKHIR_INSPEK
	FROM ELEMENTSINSPECTION ELEMENTSINSPECTION 
	WHERE ELEMENTSINSPECTION.DEMANDCODE ='$_GET[nodemand]' AND ELEMENTSINSPECTION.OPERATORCODE ='$_GET[operator]'
	AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13
	ORDER BY ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME DESC LIMIT 1) B
ON ELEMENTSINSPECTION.DEMANDCODE = B.DEMANDCODE AND 
ELEMENTSINSPECTION.OPERATORCODE = B.OPERATORCODE
WHERE ELEMENTSINSPECTION.DEMANDCODE ='$_GET[nodemand]' AND ELEMENTSINSPECTION.OPERATORCODE ='$_GET[operator]'
AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13	AND 
(ELEMENTSINSPECTION.QUALITYREASONCODE ='011' OR 
ELEMENTSINSPECTION.QUALITYREASONCODE ='012' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='013' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='014' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='015' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='017' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='018' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='019' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='020' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='021' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='022' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='023' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='024' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='025' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='026' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='027' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='028' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='029' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='030' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='031' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='032')
GROUP BY 
ELEMENTSINSPECTION.DEMANDCODE,
ELEMENTSINSPECTION.OPERATORCODE,
ELEMENTSINSPECTION.INSPECTIONSTATION,
ELEMENTSINSPECTION.LENGTHUOMCODE,
A.TGL_AWAL_INSPEK,
A.JAM_AWAL_INSPEK,
B.TGL_AKHIR_INSPEK,
B.JAM_AKHIR_INSPEK";
$stmt2TH = db2_exec($conn1, $sqltoTH, array('cursor' => DB2_SCROLLABLE));
$rowtoTH = db2_fetch_assoc($stmt2TH);

$sqltoBS = "SELECT 
ELEMENTSINSPECTION.DEMANDCODE,
ELEMENTSINSPECTION.OPERATORCODE,
ELEMENTSINSPECTION.INSPECTIONSTATION,
ELEMENTSINSPECTION.LENGTHUOMCODE,
A.TGL_AWAL_INSPEK,
A.JAM_AWAL_INSPEK,
B.TGL_AKHIR_INSPEK,
B.JAM_AKHIR_INSPEK,
COUNT(ELEMENTSINSPECTION.ELEMENTCODE) AS BS_ROLL,
SUM(ELEMENTSINSPECTION.WEIGHTGROSS) AS BS_KG,
SUM(ELEMENTSINSPECTION.LENGTHGROSS) AS BS_YARD
FROM ELEMENTSINSPECTION ELEMENTSINSPECTION 
LEFT JOIN
	(SELECT
	ELEMENTSINSPECTION.DEMANDCODE,
	ELEMENTSINSPECTION.OPERATORCODE,
	LEFT(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,10) AS TGL_AWAL_INSPEK,
	SUBSTR(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,12,5) AS JAM_AWAL_INSPEK
	FROM ELEMENTSINSPECTION ELEMENTSINSPECTION 
	WHERE ELEMENTSINSPECTION.DEMANDCODE ='$_GET[nodemand]' AND ELEMENTSINSPECTION.OPERATORCODE ='$_GET[operator]'
	AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13
	ORDER BY ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ASC LIMIT 1) A
ON ELEMENTSINSPECTION.DEMANDCODE = A.DEMANDCODE AND 
ELEMENTSINSPECTION.OPERATORCODE = A.OPERATORCODE
LEFT JOIN
	(SELECT
	ELEMENTSINSPECTION.DEMANDCODE,
	ELEMENTSINSPECTION.OPERATORCODE,
	LEFT(ELEMENTSINSPECTION.INSPECTIONENDDATETIME,10) AS TGL_AKHIR_INSPEK,
	SUBSTR(ELEMENTSINSPECTION.INSPECTIONENDDATETIME,12,5) AS JAM_AKHIR_INSPEK
	FROM ELEMENTSINSPECTION ELEMENTSINSPECTION 
	WHERE ELEMENTSINSPECTION.DEMANDCODE ='$_GET[nodemand]' AND ELEMENTSINSPECTION.OPERATORCODE ='$_GET[operator]'
	AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13
	ORDER BY ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME DESC LIMIT 1) B
ON ELEMENTSINSPECTION.DEMANDCODE = B.DEMANDCODE AND 
ELEMENTSINSPECTION.OPERATORCODE = B.OPERATORCODE
WHERE ELEMENTSINSPECTION.DEMANDCODE ='$_GET[nodemand]' AND ELEMENTSINSPECTION.OPERATORCODE ='$_GET[operator]'
AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13	AND 
(ELEMENTSINSPECTION.QUALITYREASONCODE ='BSA' OR 
ELEMENTSINSPECTION.QUALITYREASONCODE ='BSC' OR
ELEMENTSINSPECTION.QUALITYREASONCODE ='BB')
GROUP BY 
ELEMENTSINSPECTION.DEMANDCODE,
ELEMENTSINSPECTION.OPERATORCODE,
ELEMENTSINSPECTION.INSPECTIONSTATION,
ELEMENTSINSPECTION.LENGTHUOMCODE,
A.TGL_AWAL_INSPEK,
A.JAM_AWAL_INSPEK,
B.TGL_AKHIR_INSPEK,
B.JAM_AKHIR_INSPEK";
$stmt2BS = db2_exec($conn1, $sqltoBS, array('cursor' => DB2_SCROLLABLE));
$rowtoBS = db2_fetch_assoc($stmt2BS);

?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Input Data</h3>
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
                            onchange="proses_nodemand()" value="<?php echo $_GET['nodemand']; ?>"
                            placeholder="No Demand" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="shift" class="col-sm-3 control-label">Shift</label>
                    <div class="col-sm-2">
                        <select class="form-control chosen-select" name="shift" required id="shift"
                            onchange="proses_shift()">
                            <option value="0">Pilih</option>
                            <option value="1" <?php if ($_GET['shift'] == "1") {
                                echo "SELECTED";
                            } ?>>1</option>
                            <option value="2" <?php if ($_GET['shift'] == "2") {
                                echo "SELECTED";
                            } ?>>2</option>
                            <option value="3" <?php if ($_GET['shift'] == "3") {
                                echo "SELECTED";
                            } ?>>3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pelanggan" class="col-sm-3 control-label">Pelanggan</label>
                    <div class="col-sm-8">
                        <input name="pelanggan" type="text" class="form-control" id="pelanggan" value="<?php if ($crow > 0) {
                            echo $row['pelanggan'];
                        } else {
                            if ($_GET['nodemand'] != "" and $rowdb2['LANGGANAN'] != "") {
                                echo $rowdb2['LANGGANAN'] . "/" . $rowdb20['ORDERPARTNERBRANDCODE'];
                            }
                        } ?>" placeholder="Pelanggan">
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_order" class="col-sm-3 control-label">No Order</label>
                    <div class="col-sm-4">
                        <input name="no_order" type="text" class="form-control" id="no_order" value="<?php if ($crow > 0) {
                            echo $row['no_order'];
                        } else {
                            if ($rowdb2['PRO_ORDER'] != "") {
                                echo $rowdb2['PRO_ORDER'];
                            }
                        } ?>" placeholder="No Order" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="jenis_kain" class="col-sm-3 control-label">Jenis Kain</label>
                    <div class="col-sm-8">
                        <textarea name="jenis_kain" class="form-control" id="jenis_kain" placeholder="Jenis Kain"><?php if ($crow > 0) {
                            echo $row['jenis_kain'];
                        } else {
                            if ($rowdb20['ITEMDESCRIPTION'] != "") {
                                echo $rowdb20['ITEMDESCRIPTION'];
                            }
                        } ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
                    <div class="col-sm-3">
                        <input name="no_hanger" type="text" class="form-control" id="no_hanger" value="<?php if ($crow > 0) {
                            echo $row['no_hanger'];
                        } else {
                            if ($rowdb2['ITEMNO'] != "") {
                                echo $rowdb2['ITEMNO'];
                            }
                        } ?>" placeholder="No Hanger">
                    </div>
                    <div class="col-sm-3">
                        <input name="no_item" type="text" class="form-control" id="no_item" value="<?php if ($row['no_item'] != "") {
                            echo $row['no_item'];
                        } else if ($rowdb20['NO_ITEM'] != "") {
                            echo $rowdb20['NO_ITEM'];
                        } ?>" placeholder="No Item">
                    </div>
                </div>
                <div class="form-group">
                    <label for="warna" class="col-sm-3 control-label">Warna</label>
                    <div class="col-sm-8">
                        <textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if ($crow > 0) {
                            echo $row['warna'];
                        } else {
                            echo stripslashes($rowdb2['WARNA']);
                        } ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="awal" class="col-sm-3 control-label">Tgl Pengiriman</label>
                    <div class="col-sm-4">
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                            <input name="awal" type="text" class="form-control pull-right" id="datepicker"
                                placeholder="0000-00-00" value="<?php if ($crow > 0) {
                                    echo $row['tgl_pengiriman'];
                                } else if ($_GET['nodemand'] != "" and $rowdb20['DELIVERYDATE'] != "") {
                                    echo date('Y-m-d', strtotime($rowdb20['DELIVERYDATE']));
                                } ?>" required />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tgl" class="col-sm-3 control-label">Tgl Update</label>
                    <div class="col-sm-4">
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                            <input name="tgl" type="text" class="form-control pull-right" id="datepicker1"
                                placeholder="0000-00-00" value="<?php if ($crow > 0) {
                                    echo $row['tgl_update'];
                                } ?>" required />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inspektor" class="col-sm-3 control-label">Group</label>
                    <div class="col-sm-3">
                        <?php if ($crow > 0) {
                            $grup = $row['inspektor'];
                        } else {
                            $grup = $rp['user_packing'];
                        } ?>
                        <select class="form-control select2" name="inspektor" required>
                            <option value="">Pilih</option>
                            <option value="PACKING A" <?php if ($grup == "PACKING A") {
                                echo "SELECTED";
                            } ?>>PACKING A
                            </option>
                            <option value="PACKING B" <?php if ($grup == "PACKING B") {
                                echo "SELECTED";
                            } ?>>PACKING B
                            </option>
                            <option value="PACKING C" <?php if ($grup == "PACKING C") {
                                echo "SELECTED";
                            } ?>>PACKING C
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lot" class="col-sm-3 control-label">Lot</label>
                    <div class="col-sm-2">
                        <input name="lot" class="form-control" type="text" id="lot"
                            value="<?php echo $rowdb2['PRODUCTIONORDERCODE']; ?>" placeholder="Lot">
                    </div>
                    <label for="mulai" class="col-sm-1 control-label">Jam Mulai</label>
                    <div class="col-sm-2">
                        <input name="mulai" class="form-control" type="text" id="mulai" placeholder="00.00"
                            pattern="[0-9]{2}:[0-9]{2}$" title=" e.g 14:25" onkeyup="
                    var time = this.value;
                    if (time.match(/^\d{2}$/) !== null) {
                        this.value = time + ':';
                    } else if (time.match(/^\d{2}\:\d{2}$/) !== null) {
                        this.value = time + '';
                    }" value="<?php if ($crow > 0) {
                        echo $row['jam_mulai'];
                    } else {
                        echo str_replace(".", ":", $rowto['JAM_AWAL_INSPEK']);
                    } ?>" maxlength="5" size="5">
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                            <input name="tgl_mulai" type="text" class="form-control pull-right" id="datepicker2"
                                placeholder="0000-00-00" value="<?php if ($crow > 0) {
                                    echo $row['tgl_mulai'];
                                } else {
                                    echo $rowto['TGL_AWAL_INSPEK'];
                                } ?>" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_mc" class="col-sm-3 control-label">No MC</label>
                    <div class="col-sm-2">
                        <input name="no_mc" class="form-control" type="text" id="no_mc" value="<?php if ($crow > 0) {
                            echo $row['no_mc'];
                        } else {
                            echo $rowto['INSPECTIONSTATION'];
                        } ?>" placeholder="No MC">
                    </div>
                    <label for="selesai" class="col-sm-1 control-label">Jam Selesai</label>
                    <div class="col-sm-2">
                        <input name="selesai" class="form-control" type="text" id="selesai" placeholder="00:00"
                            pattern="[0-9]{2}:[0-9]{2}$" title=" e.g 14:25" onkeyup="
                    var time = this.value;
                    if (time.match(/^\d{2}$/) !== null) {
                        this.value = time + ':';
                    } else if (time.match(/^\d{2}\:\d{2}$/) !== null) {
                        this.value = time + '';
                    }" value="<?php if ($crow > 0) {
                        echo $row['jam_selesai'];
                    } else {
                        echo str_replace(".", ":", $rowto['JAM_AKHIR_INSPEK']);
                    } ?>" maxlength="5" size="5">
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                            <input name="tgl_selesai" type="text" class="form-control pull-right" id="datepicker3"
                                placeholder="0000-00-00" value="<?php if ($crow > 0) {
                                    echo $row['tgl_selesai'];
                                } else {
                                    echo $rowto['TGL_AKHIR_INSPEK'];
                                } ?>" required />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="operator" class="col-sm-3 control-label">Operator</label>
                    <div class="col-sm-4">
                        <select class="form-control select2" name="operator" id="operator" required
                            onchange="proses_operator()">
                            <option value="">Pilih</option>
                            <?php
                            $sqlop = "SELECT 
                                DISTINCT(INITIALS.LONGDESCRIPTION) AS NAMA, ELEMENTSINSPECTION.OPERATORCODE FROM INITIALS INITIALS LEFT JOIN ELEMENTSINSPECTION ELEMENTSINSPECTION
                                ON INITIALS.CODE = ELEMENTSINSPECTION.OPERATORCODE 
                                WHERE ELEMENTSINSPECTION.DEMANDCODE ='$rowdb2[DEMANDNO]' AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13";
                            $stmt1 = db2_exec($conn1, $sqlop, array('cursor' => DB2_SCROLLABLE));
                            while ($rowop = db2_fetch_assoc($stmt1)) {
                                ?>
                                <option value="<?php echo trim($rowop['OPERATORCODE']); ?>" <?php
                                   if ($row['operator'] == $rowop['OPERATORCODE'] or $_GET['operator'] == $rowop['OPERATORCODE']) {
                                       echo "SELECTED";
                                    } ?>>
                                    <?php echo $rowop['NAMA']; ?>
                                    
                                </option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group"> 
                    <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
                    <div class="col-sm-2">
                        <input name="lebar" type="text" class="form-control" id="lebar" value="<?php if ($crow > 0) {
                            echo $row['lebar'];
                        } else {
                            echo round($rowdb21['WIDTH']);
                        } ?>" placeholder="0" required>
                    </div>
                    <div class="col-sm-2">
                        <input name="gramasi" type="text" class="form-control" id="gramasi" value="<?php if ($crow > 0) {
                            echo $row['gramasi'];
                        } else {
                            echo round($rowdb21['GSM']);
                        } ?>" placeholder="0" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="qty_bruto" class="col-sm-3 control-label">Qty Bruto</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="rol" type="text" class="form-control" id="rol" value="<?php if ($crow > 0) {
                                echo $row['jml_roll'];
                            } else {
                                if ($rowr['JML_ROLL'] != 0) {
                                    echo $rowr['JML_ROLL'];
                                }
                            } ?>" placeholder="" required>
                            <span class="input-group-addon">Roll</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="bruto" type="text" class="form-control" id="bruto" value="<?php if ($crow > 0) {
                                echo $row['bruto'];
                            } else {
                                echo round($rowbr['QTY_BAGI_KAIN'], 2);
                            } ?>" placeholder="0.00" required>
                            <span class="input-group-addon">KGs</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="istirahat" class="col-sm-3 control-label">Istirahat</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <select class="form-control chosen-select" name="istirahat" id="istirahat">
                                <option value="">Pilih</option>
                                <option value="30" <?php if ($row['istirahat'] == "30") {
                                    echo "SELECTED";
                                } ?>>30</option>
                                <option value="60" <?php if ($row['istirahat'] == "60") {
                                    echo "SELECTED";
                                } ?>>60</option>
                                <option value="90" <?php if ($row['istirahat'] == "90") {
                                    echo "SELECTED";
                                } ?>>90</option>
                            </select>
                            <span class="input-group-addon">Menit</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="qty_netto" class="col-sm-3 control-label">Qty Netto</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="rol_netto" type="text" class="form-control" id="rol_netto" value="<?php if ($crow > 0) {
                                echo $row['jml_netto'];
                            } else {
                                echo $rowto['TOTAL_ROLL'];
                            } ?>" placeholder="0" required>
                            <span class="input-group-addon">Roll</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="netto" type="text" class="form-control" id="netto" value="<?php if ($crow > 0) {
                                echo $row['netto'];
                            } else {
                                echo $rowto['TOTAL_KG'];
                            } ?>" placeholder="0.00" required>
                            <span class="input-group-addon">KGs</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="qty_bs" class="col-sm-3 control-label">Qty (BSA/BSC/BB)</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="rol_bs" type="text" class="form-control" id="rol_bs" value="<?php if ($crow > 0) {
                                echo $row['jml_bs'];
                            } else {
                                echo $rowtoBS['BS_ROLL'];
                            } ?>" placeholder="0">
                            <span class="input-group-addon">Roll</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="kg_bs" type="text" class="form-control" id="kg_bs" value="<?php if ($crow > 0) {
                                echo $row['kg_bs'];
                            } else {
                                echo $rowtoBS['BS_KG'];
                            } ?>" placeholder="0.00">
                            <span class="input-group-addon">KGs</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="qty_bs" class="col-sm-3 control-label"></label>
                    <div class="col-sm-3">

                        <div class="input-group">
                            <input name="ket_bs" type="text" class="form-control" id="ket_bs"
                                value="<?= ($crow > 0) ? $row['ket_bs'] : '' ?>" placeholder="Kategori BS">
                        </div>
                    </div>

                    <div class="col-sm-3">

                        <div class="input-group">
                            <input name="ket_dept_penyebab" type="text" class="form-control" id="ket_dept_penyebab"
                                value="<?= ($crow > 0) ? $row['ket_dept_penyebab'] : '' ?>"
                                placeholder="Department Penyebab">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="qty_th" class="col-sm-3 control-label">Qty Tahanan</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="rol_th" type="text" class="form-control" id="rol_th" value="<?php if ($crow > 0) {
                                echo $row['jml_th'];
                            } else {
                                echo $rowtoTH['TH_ROLL'];
                            } ?>" placeholder="0">
                            <span class="input-group-addon">Roll</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="kg_th" type="text" class="form-control" id="kg_th" value="<?php if ($crow > 0) {
                                echo $row['kg_th'];
                            } else {
                                echo $rowtoTH['TH_KG'];
                            } ?>" placeholder="0.00">
                            <span class="input-group-addon">KGs</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="qty_mutasi" class="col-sm-3 control-label">Qty Mutasi</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="rol_mutasi" type="text" class="form-control" id="rol_mutasi" value="<?php if ($crow > 0) {
                                echo $row['jml_mutasi'];
                            } else {
                                echo $rowto['TOTAL_ROLL']-($rowtoBS['BS_ROLL']+$rowtoTH['TH_ROLL']);
                            } ?>" placeholder="0" required>
                            <span class="input-group-addon">Roll</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="mutasi" type="text" class="form-control" id="mutasi" value="<?php if ($crow > 0) {
                                echo $row['mutasi'];
                            } else {
                                echo $rowto['TOTAL_KG']-($rowtoBS['BS_KG']+$rowtoTH['TH_KG']);
                            } ?>" placeholder="0.00" required>
                            <span class="input-group-addon">KGs</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="panjang" class="col-sm-3 control-label">Panjang</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input name="panjang" type="text" class="form-control" id="panjang" value="<?php if ($crow > 0) {
                                echo $row['panjang'];
                            } else {
                                echo $rowto['TOTAL_YARD'];
                            } ?>" placeholder="0.00" style="text-align: right;" required>
                            <span class="input-group-addon">
                                <?php if ($crow > 0) {
                                    $satuan = $row['satuan'];
                                } else {
                                    $satuan = $rowto['LENGTHUOMCODE'];
                                } ?>
                                <select name="satuan" style="font-size: 12px;" id="satuan">
                                    <option value="Yard" <?php if ($satuan == "yd") {
                                        echo "SELECTED";
                                    } ?>>Yard</option>
                                    <option value="Meter" <?php if ($satuan == "m") {
                                        echo "SELECTED";
                                    } ?>>Meter</option>
                                </select>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="proses" class="col-sm-3 control-label">Proses</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="proses">
                            <option value="F" <?php if ($row['proses'] == "F") {
                                echo "SELECTED";
                            } ?>>F</option>
                            <option value="O" <?php if ($row['proses'] == "O") {
                                echo "SELECTED";
                            } ?>>O</option>
                            <option value="T" <?php if ($row['proses'] == "T") {
                                echo "SELECTED";
                            } ?>>T</option>
                        </select>
                    </div>
                    <label for="ket_qty" class="col-sm-3 control-label">Ket. Qty</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="ket_qty" required>
                            <option value="Quantity Kecil" <?php if ($row['ket_qty'] == "Quantity Kecil") {
                                echo "SELECTED";
                            } ?>>Quantity Kecil</option>
                            <option value="Quantity Besar" <?php if ($row['ket_qty'] == "Quantity Besar") {
                                echo "SELECTED";
                            } ?>>Quantity Besar</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="status">
                            <option value="OK" <?php if ($row['status'] == "OK") {
                                echo "SELECTED";
                            } ?>>OK</option>
                            <option value="BS" <?php if ($row['status'] == "BS") {
                                echo "SELECTED";
                            } ?>>BS</option>
                            <option value="BW" <?php if ($row['status'] == "BW") {
                                echo "SELECTED";
                            } ?>>BW</option>
                            <option value="TCW" <?php if ($row['status'] == "TCW") {
                                echo "SELECTED";
                            } ?>>TCW</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jam" class="col-sm-3 control-label">Jam Mutasi</label>
                    <div class="col-sm-2">
                        <input name="jam" class="form-control" type="text" id="jam" placeholder="00:00:00"
                            title=" e.g 14:25:00 " pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}$" onkeyup="
                    var time = this.value;
                    if (time.match(/^\d{2}$/) !== null) {
                        this.value = time + ':';
                    } else if (time.match(/^\d{2}\:\d{2}$/) !== null) {
                        this.value = time + ':';
                    }" maxlength="8" size="10">
                    </div>
                    <div class="col-sm-4">
                        <input type="checkbox" name="sts_gkg" id="sts_gkg" value="1" <?php if ($rcek['sts_gkg'] == "1") {
                            echo "checked";
                        } ?>>
                        <label> Mutasi GKG</label>
                    </div>
                </div>
				<div class="form-group">
                    <label for="loss" class="col-sm-3 control-label">Loss</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <input name="qty_loss" type="text" class="form-control" id="qty_loss" value="<?php if ($crow > 0) {
                                echo $row['qty_loss'];
                            } ?>" placeholder="0.00" required>
                            <span class="input-group-addon">KGs</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input name="note_loss" type="text" class="form-control" id="note_loss" value="<?php if ($crow > 0) {
                                echo $row['note_loss'];
                            }?>" placeholder="Note Loss" required>
                            
                    </div>
                </div>
                <div class="form-group">
                    <label for="catatan" class="col-sm-3 control-label">Catatan</label>
                    <div class="col-sm-8">
                        <textarea name="catatan" class="form-control" id="catatan"
                            placeholder="Keterangan"><?php echo $row['catatan']; ?></textarea>
                    </div>
                </div>
				<div class="form-group">
                    <label for="qty_kq" class="col-sm-3 control-label">KQ</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <input name="qty_kq" type="text" class="form-control" id="qty_kq" value="<?php if ($crow > 0) {
                                echo $row['qty_kq'];
                            } ?>" placeholder="0.00" required>
                            <span class="input-group-addon">KGs</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input name="note_kq" type="text" class="form-control" id="note_kq" value="<?php if ($crow > 0) {
                                echo $row['note_kq'];
                            }?>" placeholder="Masalah" required>
                            
                    </div>
                </div>
				<div class="form-group">
                    <label for="qty_bq" class="col-sm-3 control-label">BQ</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <input name="qty_bq" type="text" class="form-control" id="qty_bq" value="<?php if ($crow > 0) {
                                echo $row['qty_bq'];
                            } ?>" placeholder="0.00" required>
                            <span class="input-group-addon">KGs</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input name="note_bq" type="text" class="form-control" id="note_bq" value="<?php if ($crow > 0) {
                                echo $row['note_bq'];
                            }?>" placeholder="Masalah" required>
                            
                    </div>
                </div>
				<div class="form-group">
                    <label for="qty_kf" class="col-sm-3 control-label">KF</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <input name="qty_kf" type="text" class="form-control" id="qty_kf" value="<?php if ($crow > 0) {
                                echo $row['qty_kf'];
                            } ?>" placeholder="0.00" required>
                            <span class="input-group-addon">KGs</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input name="note_kf" type="text" class="form-control" id="note_kf" value="<?php if ($crow > 0) {
                                echo $row['note_kf'];
                            }?>" placeholder="Masalah" required>
                            
                    </div>
                </div>
				<div class="form-group">
                    <label for="qty_bf" class="col-sm-3 control-label">BF</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <input name="qty_bf" type="text" class="form-control" id="qty_bf" value="<?php if ($crow > 0) {
                                echo $row['qty_bf'];
                            } ?>" placeholder="0.00" required>
                            <span class="input-group-addon">KGs</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input name="note_bf" type="text" class="form-control" id="note_bf" value="<?php if ($crow > 0) {
                                echo $row['note_bf'];
                            }?>" placeholder="Masalah" required>
                            
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <?php //if ($_GET['nodemand'] != "" and $_GET['shift'] != "" and $_GET['operator'] != "" and $cek == 0) { ?>

            <?php if ($_GET['nodemand'] != "" and $_GET['shift'] != "" and $cek == 0) { ?>
                <button type="submit" class="btn btn-primary pull-right" name="simpan" value="simpan"><i
                        class="fa fa-save"></i> Simpan</button>
            <?php } ?>
            <!--<button type="submit" class="btn btn-primary pull-right" name="ubah" value="ubah"><i class="fa fa-edit"></i> Ubah</button> -->

            <button type="button" class="btn btn-warning pull-left" name="lihat" value="lihat"
                onClick="window.location.href='LihatPacking'"><i class="fa fa-search"></i> Lihat Data</button>
        </div>
    </div>
</form>
<div class="modal fade" id="DataOperator">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action=""
                enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Operator</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="operator" class="col-md-3 control-label">Nama Operator</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="operator" name="operator" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" value="Simpan" name="simpan_operator" id="simpan_operator"
                        class="btn btn-primary pull-right">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php
if ($_POST['simpan_operator'] == "Simpan") {
    $nama = strtoupper($_POST['operator']);
    $sqlData1 = mysqli_query($con, "INSERT INTO tbl_operator SET nama='$nama'");
    if ($sqlData1) {
        echo "<script>
                swal({
                    title: 'Data Telah Tersimpan',   
                    text: 'Klik Ok untuk input data kembali',
                    type: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href='LapPackingNew-$nodemand';
                        }
                    });
            </script>";
    }
}
?>