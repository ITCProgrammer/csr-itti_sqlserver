<script type="text/javascript">
    function proses_demand() {
        var demand = document.getElementById("demand").value;

        if (demand == 0) {
            window.location.href = 'InputTempelBedaRoll';
        } else {
            window.location.href = 'InputTempelBedaRoll&' + demand;
        }
    }

    function proses_shift() {
        var demand = document.getElementById("demand").value;
        var shift = document.getElementById("shift").value;

        if (demand == "") {
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
            window.location.href = 'InputTempelBedaRoll&' + demand + '&' + shift;
        }
    }
</script>
<?php
include "koneksi.php";
ini_set("error_reporting", 1);
if ($_POST['simpan'] == "simpan") {
    $ceksql = mysqli_query($con, "SELECT * FROM `tbl_tempel_beda_roll` WHERE `nokk`='$_GET[nokk]' and `shift`='$_POST[shift]' AND DATE_FORMAT(tgl_update, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') LIMIT 1");
    $cek = mysqli_num_rows($ceksql);
    if ($cek > 0) {
        $pelanggan = str_replace("'", "''", $_POST['pelanggan']);
        $order = str_replace("'", "''", $_POST['no_order']);
        $jns = str_replace("'", "''", $_POST['jenis_kain']);
        $warna = str_replace("'", "''", $_POST['warna']);
        $no_warna = str_replace("'", "''", $_POST['no_warna']);
        $comment = str_replace("'", "''", $_POST['comment']);
        $sql1 = mysqli_query($con, "UPDATE`tbl_tempel_beda_roll` SET
    `nokk`='$_POST[demand]',
	`no_order`='$order',
    `no_item`='$_POST[no_item]',
    `no_hanger`='$_POST[no_hanger]',
    `no_po`='$_POST[no_po]',
	`pelanggan`='$pelanggan',
	`jenis_kain`='$jns',
	`warna`='$warna',
    `no_warna`='$no_warna',
	`lot`='$_POST[lot]',
	`groupshift`='$_POST[groupshift]',
	`roll_bruto`='$_POST[roll_bruto]',
	`bruto`='$_POST[bruto]',
	`roll_dikerjakan`='$_POST[roll_dikerjakan]',
	`ket_roll_dikerjakan`='$_POST[ket_roll_dikerjakan]',
    `operator`='$_POST[operator]',
    `lebar`='$_POST[lebar]',
    `gramasi`='$_POST[gramasi]',
    `tgl_update`=now(),
    `ip`='$_SERVER[REMOTE_ADDR]',
    `comment`='$_POST[comment]',
    `prod_order`='$_POST[prod_order]'
	WHERE `demand`='$_POST[demand]' and  `shift`='$_POST[shift]'");
        if ($sql1) {
            //echo " <script>alert('Data has been updated!');</script>";
            echo "<script>swal({
            title: 'Data has been updated!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='InputTempelBedaRoll&$_POST[demand]';

            }
        });</script>";
        }
    } else {
        $pelanggan = str_replace("'", "''", $_POST['pelanggan']);
        $order = str_replace("'", "''", $_POST['no_order']);
        $jns = str_replace("'", "''", $_POST['jenis_kain']);
        $warna = str_replace("'", "''", $_POST['warna']);
        $no_warna = str_replace("'", "''", $_POST['no_warna']);
        $catatan = str_replace("'", "''", $_POST['catatan']);
        $sql = mysqli_query($con, "INSERT INTO `tbl_tempel_beda_roll` SET
	`nokk`='$_POST[demand]',
	`no_order`='$order',
    `no_item`='$_POST[no_item]',
    `no_hanger`='$_POST[no_hanger]',
    `no_po`='$_POST[no_po]',
	`pelanggan`='$pelanggan',
	`jenis_kain`='$jns',
	`warna`='$warna',
    `no_warna`='$no_warna',
	`lot`='$_POST[lot]',
    `shift`='$_POST[shift]',
	`groupshift`='$_POST[groupshift]',
	`roll_bruto`='$_POST[roll_bruto]',
	`bruto`='$_POST[bruto]',
	`roll_dikerjakan`='$_POST[roll_dikerjakan]',
	`ket_roll_dikerjakan`='$_POST[ket_roll_dikerjakan]',
    `operator`='$_POST[operator]',
    `lebar`='$_POST[lebar]',
    `gramasi`='$_POST[gramasi]',
    `comment`='$_POST[comment]',
    `demand`='$_POST[demand]',
    `prod_order`='$_POST[prod_order]',
    `tgl_update`=now(),
    `tgl_buat`=now(),
    `ip`='$_SERVER[REMOTE_ADDR]'");
        if ($sql) {
            //echo " <script>alert('Data has been saved!');</script>";
            echo "<script>swal({
            title: 'Data has been saved!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='InputTempelBedaRoll&$_POST[demand]';

            }
          });</script>";
        }
    }
}
?>

<?Php
if ($_GET['nokk'] != "") {
    $demand = $_GET['nokk'];
} else {
    $demand = "";
}
if ($_GET['shift'] != "") {
    $shift = $_GET['shift'];
} else {
    $shift = "";
}

//Data belum disimpan di database mysqli
$sqlDB2 = "SELECT
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
            FROM PRODUCTIONDEMAND p
            LEFT OUTER JOIN (
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
            FROM
                BUSINESSPARTNER BUSINESSPARTNER
            LEFT JOIN ORDERPARTNER ORDERPARTNER ON
                BUSINESSPARTNER.NUMBERID = ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID
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
            WHERE p.CODE = '$demand'";
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
                PRODUCT.SUBCODE10";
$stmt1 = db2_exec($conn1, $sqlDB21, array('cursor' => DB2_SCROLLABLE));
$rowdb21 = db2_fetch_assoc($stmt1);

//Data sudah disimpan di database mysqli
$msql = mysqli_query($con, "SELECT * FROM `tbl_tempel_beda_roll` WHERE `demand`='$demand' and `shift`='$_GET[shift]' AND DATE_FORMAT(tgl_update, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d')");
$row = mysqli_fetch_array($msql);
$crow = mysqli_num_rows($msql);

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
                    <label for="demand" class="col-sm-3 control-label">No Demand</label>
                    <div class="col-sm-4">
                        <input name="demand" type="text" class="form-control" id="demand" onchange="proses_demand()"
                            value="<?php echo $demand; ?>" placeholder="No Demand" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="shift" class="col-sm-3 control-label">Shift</label>
                    <div class="col-sm-2">
                        <select class="form-control chosen-select" name="shift" required id="shift"
                            onchange="proses_shift()">
                            <option value="0">Pilih</option>
                            <option value="1" <?php if ($shift == "1") {
                                echo "SELECTED";
                            } ?>>1</option>
                            <option value="2" <?php if ($shift == "2") {
                                echo "SELECTED";
                            } ?>>2</option>
                            <option value="3" <?php if ($shift == "3") {
                                echo "SELECTED";
                            } ?>>3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="groupshift" class="col-sm-3 control-label">Group</label>
                    <div class="col-sm-3">
                        <?php if ($crow > 0) {
                            $grup = $row['groupshift'];
                        } ?>
                        <select class="form-control select2" name="groupshift" required>
                            <option value="">Pilih</option>
                            <option value="A" <?php if ($grup == "A") {
                                echo "SELECTED";
                            } ?>>A</option>
                            <option value="B" <?php if ($grup == "B") {
                                echo "SELECTED";
                            } ?>>B</option>
                            <option value="C" <?php if ($grup == "C") {
                                echo "SELECTED";
                            } ?>>C</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_order" class="col-sm-3 control-label">No Order</label>
                    <div class="col-sm-4">
                        <input name="no_order" type="text" class="form-control" id="no_order" value="<?php if ($crow > 0) {
                            echo $row['no_order'];
                        } else {
                            if ($shift != "") {
                                echo trim($rowdb2['PRO_ORDER']);
                            }
                        } ?>" placeholder="No Order" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="pelanggan" class="col-sm-3 control-label">Pelanggan</label>
                    <div class="col-sm-8">
                        <input name="pelanggan" type="text" class="form-control" id="pelanggan" value="<?php if ($crow > 0) {
                            echo $row['pelanggan'];
                        } else {
                            if ($shift != "") {
                                echo trim($rowdb2['LANGGANAN']);
                            }
                        } ?>" placeholder="Pelanggan">
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_po" class="col-sm-3 control-label">PO</label>
                    <div class="col-sm-4">
                        <input name="no_po" type="text" class="form-control" id="no_po" value="<?php if ($crow > 0) {
                            echo $row['no_po'];
                        } else {
                            if ($shift != "") {
                                echo trim($rowdb20['PO_NUMBER']);
                            }
                        } ?>" placeholder="No Order" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
                    <div class="col-sm-3">
                        <input name="no_hanger" type="text" class="form-control" id="no_hanger" value="<?php if ($crow > 0 && $row['no_hanger'] != "") {
                            echo $row['no_hanger'];
                        } else {
                            if ($shift != "") {
                                echo trim($rowdb2['ITEMNO']);
                            }
                        } ?>" placeholder="No Hanger">
                    </div>
                    <div class="col-sm-3">
                        <input name="no_item" type="text" class="form-control" id="no_item" value="<?php if ($crow > 0 && $row['no_item'] != "") {
                            echo $row['no_item'];
                        } else {
                            if ($shift != "") {
                                echo trim($rowdb20['NO_ITEM']);
                            }
                        } ?>" placeholder="No Item">
                    </div>
                </div>
                <div class="form-group">
                    <label for="jenis_kain" class="col-sm-3 control-label">Jenis Kain</label>
                    <div class="col-sm-8">
                        <textarea name="jenis_kain" class="form-control" id="jenis_kain" placeholder="Jenis Kain"><?php if ($crow > 0 && $row['jenis_kain'] != "") {
                            echo $row['jenis_kain'];
                        } else {
                            if ($shift != "") {
                                echo trim($rowdb20['ITEMDESCRIPTION']);
                            }
                        } ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
                    <div class="col-sm-2">
                        <input name="lebar" type="text" class="form-control" id="lebar" value="<?php if ($crow > 0 && $row['lebar'] != "" && $row['lebar'] > 0) {
                            echo $row['lebar'];
                        } else {
                            if ($shift != "") {
                                echo round($rowdb21['WIDTH']);
                            }
                        } ?>" placeholder="0" required>
                    </div>
                    <div class="col-sm-2">
                        <input name="gramasi" type="text" class="form-control" id="gramasi" value="<?php if ($crow > 0 && $row['gramasi'] != "" && $row['gramasi'] > 0) {
                            echo $row['gramasi'];
                        } else {
                            if ($shift != "") {
                                echo round($rowdb21['GSM']);
                            }
                        } ?>" placeholder="0" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="warna" class="col-sm-3 control-label">Warna</label>
                    <div class="col-sm-8">
                        <textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if ($crow > 0 && $row['warna'] != "") {
                            echo $row['warna'];
                        } else {
                            if ($shift != "") {
                                echo trim($rowdb2['WARNA']);
                            }
                        } ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
                    <div class="col-sm-8">
                        <textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if ($crow > 0 && $row['no_warna'] != "") {
                            echo $row['no_warna'];
                        } else {
                            if ($shift != "") {
                                echo trim($rowdb2['NO_WARNA']);
                            }
                        } ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lot" class="col-sm-3 control-label">Lot</label>
                    <div class="col-sm-2">
                        <input name="lot" class="form-control" type="text" id="lot" value="<?php if ($cek > 0 && $row['lot'] != "" && is_numeric($row['lot'])) {
                            echo $row['lot'];
                        } else {
                            if ($shift != "") {
                                echo trim($rowdb2['PRODUCTIONORDERCODE']);
                            }
                        } ?>" placeholder="Lot">
                    </div>
                </div>
                <div class="form-group">
                    <label for="qty_bruto" class="col-sm-3 control-label">Qty Bruto</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="roll_bruto" type="text" class="form-control" id="roll_bruto" value="<?php if ($crow > 0) {
                                echo $row['roll_bruto'];
                            } ?>" placeholder="0" required>
                            <span class="input-group-addon">Roll</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="bruto" type="text" class="form-control" id="bruto" value="<?php if ($crow > 0) {
                                echo $row['bruto'];
                            } ?>" placeholder="0" required>
                            <span class="input-group-addon">KGs</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="roll_dikerjakan" class="col-sm-3 control-label">Roll Dikerjakan</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="roll_dikerjakan" type="text" class="form-control" id="roll_dikerjakan" value="<?php if ($crow > 0) {
                                echo $row['roll_dikerjakan'];
                            } ?>" placeholder="0" required>
                            <span class="input-group-addon">Roll</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <input name="ket_roll_dikerjakan" type="text" class="form-control" id="ket_roll_dikerjakan"
                            value="<?php if ($crow > 0) {
                                echo $row['ket_roll_dikerjakan'];
                            } ?>" placeholder="Masukkan Roll" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="operator" class="col-sm-3 control-label">Operator</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <select class="form-control select2" name="operator" id="operator" required>
                                <option value="">Pilih</option>
                                <?php
                                $qryo = mysqli_query($con, "SELECT nama FROM tbl_operator ORDER BY nama ASC");
                                while ($ro = mysqli_fetch_array($qryo)) {
                                    ?>
                                    <option value="<?php echo $ro['nama']; ?>" <?php if ($row['operator'] == $ro['nama']) {
                                           echo "SELECTED";
                                       } ?>>
                                        <?php echo $ro['nama']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <span class="input-group-btn"><button type="button" class="btn btn-default"
                                    data-toggle="modal" data-target="#DataOperator"> ...</button></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="prod_order" class="col-sm-3 control-label">No Production Order</label>
                    <div class="col-sm-4">
                        <input name="prod_order" type="text" class="form-control" id="prod_order" value="<?php if ($crow > 0 && $row['prod_order'] != "") {
                            echo $row['prod_order'];
                        } else {
                            if ($shift != "") {
                                echo trim($rowdb2['PRODUCTIONORDERCODE']);
                            }
                        } ?>" placeholder="No Production Order" required />
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="demand" class="col-sm-3 control-label">No Demand</label>
                    <div class="col-sm-4">
                        <input name="demand" type="text" class="form-control" id="demand" value="<?php //if ($crow > 0) {
                        //echo $row['demand'];
                        //} ?>" placeholder="No Demand" required />
                    </div>
                </div> -->
                <div class="form-group">
                    <label for="comment" class="col-sm-3 control-label">Comments</label>
                    <div class="col-sm-8">
                        <textarea name="comment" class="form-control" id="comment"
                            placeholder="Comments"><?php echo $row['comment']; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <?php if ($demand != "" and $shift != "" and $cek == 0) { ?>
                <button type="submit" class="btn btn-primary pull-right" name="simpan" value="simpan"><i
                        class="fa fa-save"></i> Simpan</button>
            <?php } else if ($demand != "" and $shift != "" and $cek > 0) { ?>
                    <button type="submit" class="btn btn-primary pull-right" name="ubah" value="ubah"><i class="fa fa-edit"></i>
                        Ubah</button>
            <?php } ?>
            <button type="button" class="btn btn-warning pull-left" name="lihat" value="lihat"
                onClick="window.location.href='LihatTempelBedaRoll'"><i class="fa fa-search"></i> Lihat Data</button>
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
    $sqlData1 = mysqli_query($con, "INSERT INTO tbl_operator SET 
		  nama='$nama'");
    if ($sqlData1) {
        echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='InputTempelBedaRoll-$demand';

  }
});</script>";
    }
}
?>