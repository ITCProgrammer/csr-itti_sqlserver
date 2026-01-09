<script>
    function tampil() {
        if (document.forms['form1']['status_warna'].value == "TOLAK BASAH") {
            $("#disposisi").css("display", ""); // To unhide
        } else {
            $("#disposisi").css("display", "none"); // To hide
        }
        if (document.forms['form1']['status_warna'].value == "") {
            $("#disposisi").css("display", "none"); // To hide
        }
        if (document.forms['form1']['status_warna'].value == "OK") {
            $("#disposisi").css("display", "none"); // To hide
        }
    }

    function proses_demand() {
        var nodemand = document.getElementById("nodemand").value;

        if (nodemand == 0) {
            window.location.href = 'CWarnaDyeNew';
        } else {
            window.location.href = 'CWarnaDyeNew&' + nodemand;
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
            window.location.href = 'CWarnaDyeNew&' + nodemand + '&' + shift;
        }
    }
</script>
<?php
    include "koneksi.php";
    ini_set("error_reporting", 1);
    if ($_POST['simpan'] == "simpan") {
        $ceksql = mysqli_query($con, "SELECT * FROM `tbl_cocok_warna_dye` WHERE `nodemand`='$_GET[nodemand]' and `shift`='$_POST[shift]' AND DATE_FORMAT(tgl_celup, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') AND `dept`='QCF' LIMIT 1");
        $cek = mysqli_num_rows($ceksql);
        if ($$cek > 0) {
            $pelanggan = str_replace("'", "''", $_POST['pelanggan']);
            $order = str_replace("'", "''", $_POST['no_order']);
            $po = str_replace("'", "''", $_POST['no_po']);
            $jns = str_replace("'", "''", $_POST['jenis_kain']);
            $warna = str_replace("'", "''", $_POST['warna']);
            $ket = str_replace("'", "''", $_POST['ket']);
            $colorist_dye = str_replace("'", "''", $_POST['colorist_dye']);
            $colorist_qcf = str_replace("'", "''", $_POST['colorist_qcf']);
            $sql1 = mysqli_query($con, "UPDATE `tbl_cocok_warna_dye` SET
                                                `no_order`='$order',
                                                `no_po`='$po',
                                                `pelanggan`='$pelanggan',
                                                `jenis_kain`='$jns',
                                                `no_item`='$_POST[no_item]',
                                                `warna`='$warna',
                                                `no_warna`='$_POST[no_warna]',
                                                `no_mesin`='$_POST[no_mesin]',
                                                `proses`='$_POST[proses_dye]',
                                                `colorist_dye`='$colorist_dye',
                                                `tgl_celup`='$_POST[tgl_celup]',
                                                `lot`='$_POST[lot]',
                                                `jml_roll`='$_POST[rol]',
                                                `bruto`='$_POST[bruto]',
                                                `status_warna`='$_POST[status_warna]',
                                                `disposisi`='$_POST[disposisi]',
                                                `colorist_qcf`='$colorist_qcf',
                                                `ket`='$ket',
                                                `tgl_update`=now()
                                                WHERE `nodemand`='$_POST[nodemand]'");
            if ($sql1) {
                //echo " <script>alert('Data has been updated!');</script>";
                echo "<script>swal({
                title: 'Data has been updated!',   
                text: 'Klik Ok untuk input data kembali',
                type: 'success',
                    }).then((result) => {
                    if (result.value) {
                        window.location.href='CWarnaDyeNew&$_POST[nodemand]';
                    
                    }
                });</script>";
            }
        } else {
            $pelanggan = str_replace("'", "''", $_POST['pelanggan']);
			$buyer = str_replace("'", "''", $_POST['buyer']);
            $order = str_replace("'", "''", $_POST['no_order']);
            $po = str_replace("'", "''", $_POST['no_po']);
            $jns = str_replace("'", "''", $_POST['jenis_kain']);
            $warna = str_replace("'", "''", $_POST['warna']);
            $ket = str_replace("'", "''", $_POST['ket']);
            $colorist_dye = str_replace("'", "''", $_POST['colorist_dye']);
            $colorist_qcf = str_replace("'", "''", $_POST['colorist_qcf']);
            $sql = mysqli_query($con, "INSERT INTO `tbl_cocok_warna_dye` SET
            `nokk`='$_POST[nokk]',
            `nodemand`='$_POST[nodemand]',
            `no_order`='$order',
            `no_po`='$po',
            `pelanggan`='$pelanggan',
			`buyer` = '$buyer',
            `jenis_kain`='$jns',
            `no_item`='$_POST[no_item]',
            `warna`='$warna',
            `no_warna`='$_POST[no_warna]',
            `no_mesin`='$_POST[no_mesin]',
            `proses`='$_POST[proses_dye]',
            `colorist_dye`='$colorist_dye',
            `tgl_celup`='$_POST[tgl_celup]',
            `lot`='$_POST[lot]',
            `shift`='$_POST[shift]',
                `dept`='QCF',
            `jml_roll`='$_POST[rol]',
            `bruto`='$_POST[bruto]',
            `status_warna`='$_POST[status_warna]',
            `disposisi`='$_POST[disposisi]',
                `colorist_qcf`='$colorist_qcf',
            `ket`='$ket',
            `tgl_update`=now()");
            if ($sql) {
                //echo " <script>alert('Data has been saved!');</script>";
                echo "<script>swal({
                    title: 'Data has been saved!',   
                    text: 'Klik Ok untuk input data kembali',
                    type: 'success',
                    }).then((result) => {
                    if (result.value) {
                        window.location.href='CWarnaDyeNew&$_POST[nodemand]';
                    }
                });</script>";
            }
        }
    }
?>

<?Php
    // if ($_GET['nodemand'] != "") {
        $nodemand = $_GET['nodemand'];
    // } else {
        // $nodemand = " ";
    // }

//Data sudah disimpan di database mysqli
$msql = mysqli_query($con, "SELECT * FROM `tbl_cocok_warna_dye` WHERE `nodemand` LIKE'%$nodemand%' and `shift`='$_GET[shift]' AND DATE_FORMAT(tgl_celup, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') AND `dept`='QCF' LIMIT 1");
$row = mysqli_fetch_array($msql);
$crow = mysqli_num_rows($msql);

// NOW
    // $sql_ITXVIEWKK  = db2_exec($conn1, "SELECT
    //                                         TRIM(PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE,
    //                                         TRIM(DEAMAND) AS DEMAND,
    //                                         ORIGDLVSALORDERLINEORDERLINE,
    //                                         PROJECTCODE,
    //                                         ORDPRNCUSTOMERSUPPLIERCODE,
    //                                         TRIM(SUBCODE01) AS SUBCODE01, TRIM(SUBCODE02) AS SUBCODE02, TRIM(SUBCODE03) AS SUBCODE03, TRIM(SUBCODE04) AS SUBCODE04,
    //                                         TRIM(SUBCODE05) AS SUBCODE05, TRIM(SUBCODE06) AS SUBCODE06, TRIM(SUBCODE07) AS SUBCODE07, TRIM(SUBCODE08) AS SUBCODE08,
    //                                         TRIM(SUBCODE09) AS SUBCODE09, TRIM(SUBCODE10) AS SUBCODE10, 
    //                                         TRIM(ITEMTYPEAFICODE) AS ITEMTYPEAFICODE,
    //                                         TRIM(DSUBCODE05) AS NO_WARNA,
    //                                         TRIM(DSUBCODE02) || '-' || TRIM(DSUBCODE03)  AS NO_HANGER,
    //                                         TRIM(ITEMDESCRIPTION) AS ITEMDESCRIPTION,
    //                                         DELIVERYDATE,
    //                                         CREATIONUSER_SALESORDER,
    //                                         LOT,
    //                                         QTY_PACKING_KG,
    //                                         QTY_PACKING_YARD
    //                                         -- ABSUNIQUEID_DEMAND
    //                                     FROM 
    //                                         ITXVIEWKK 
    //                                     WHERE 
    //                                         DEAMAND = '$nodemand'");
    // $dt_ITXVIEWKK	= db2_fetch_assoc($sql_ITXVIEWKK);

    // $sql_pelanggan_buyer 	= db2_exec($conn1, "SELECT TRIM(LANGGANAN) AS PELANGGAN, TRIM(BUYER) AS BUYER FROM ITXVIEW_PELANGGAN 
    //                                             WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$dt_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' 
    //                                             AND CODE = '$dt_ITXVIEWKK[PROJECTCODE]'");
    // $dt_pelanggan_buyer		= db2_fetch_assoc($sql_pelanggan_buyer);

    // $sql_po			= db2_exec($conn1, "SELECT 
    //                                         TRIM(EXTERNALREFERENCE) AS NO_PO, 
    //                                         SUM(USERPRIMARYQUANTITY) AS QTY_BRUTO 
    //                                     FROM 
    //                                         ITXVIEW_KGBRUTO 
    //                                     WHERE 
    //                                         PROJECTCODE = '$dt_ITXVIEWKK[PROJECTCODE]' 	
    //                                         AND ORIGDLVSALORDERLINEORDERLINE = '$dt_ITXVIEWKK[ORIGDLVSALORDERLINEORDERLINE]'
    //                                     GROUP BY
    //                                     EXTERNALREFERENCE");
    // $dt_po    		= db2_fetch_assoc($sql_po);

    // $sql_noitem     = db2_exec($conn1, "SELECT * FROM ORDERITEMORDERPARTNERLINK WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$dt_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' 
    //                                     AND SUBCODE01 = '$dt_ITXVIEWKK[SUBCODE01]' AND SUBCODE02 = '$dt_ITXVIEWKK[SUBCODE02]' 
    //                                     AND SUBCODE03 = '$dt_ITXVIEWKK[SUBCODE03]' AND SUBCODE04 = '$dt_ITXVIEWKK[SUBCODE04]' 
    //                                     AND SUBCODE05 = '$dt_ITXVIEWKK[SUBCODE05]' AND SUBCODE06 = '$dt_ITXVIEWKK[SUBCODE06]'
    //                                     AND SUBCODE07 = '$dt_ITXVIEWKK[SUBCODE07]' AND SUBCODE08 ='$dt_ITXVIEWKK[SUBCODE08]'
    //                                     AND SUBCODE09 = '$dt_ITXVIEWKK[SUBCODE09]' AND SUBCODE10 ='$dt_ITXVIEWKK[SUBCODE10]'");
    // $dt_item        = db2_fetch_assoc($sql_noitem);

    // $sql_lebargramasi	= db2_exec($conn1, "SELECT i.LEBAR,
    //                                             CASE
    //                                                 WHEN i2.GRAMASI_KFF IS NULL THEN i2.GRAMASI_FKF
    //                                                 ELSE i2.GRAMASI_KFF
    //                                             END AS GRAMASI 
    //                                             FROM 
    //                                                 ITXVIEWLEBAR i 
    //                                             LEFT JOIN ITXVIEWGRAMASI i2 ON i2.SALESORDERCODE = '$dt_ITXVIEWKK[PROJECTCODE]' AND i2.ORDERLINE = '$dt_ITXVIEWKK[ORIGDLVSALORDERLINEORDERLINE]'
    //                                             WHERE 
    //                                                 i.SALESORDERCODE = '$dt_ITXVIEWKK[PROJECTCODE]' AND i.ORDERLINE = '$dt_ITXVIEWKK[ORIGDLVSALORDERLINEORDERLINE]'");
    // $dt_lg				= db2_fetch_assoc($sql_lebargramasi);

    // $sql_warna		= db2_exec($conn1, "SELECT DISTINCT TRIM(WARNA) AS WARNA FROM ITXVIEWCOLOR 
    //                                     WHERE ITEMTYPECODE = '$dt_ITXVIEWKK[ITEMTYPEAFICODE]' 
    //                                     AND SUBCODE01 = '$dt_ITXVIEWKK[SUBCODE01]' 
    //                                     AND SUBCODE02 = '$dt_ITXVIEWKK[SUBCODE02]'
    //                                     AND SUBCODE03 = '$dt_ITXVIEWKK[SUBCODE03]' 
    //                                     AND SUBCODE04 = '$dt_ITXVIEWKK[SUBCODE04]'
    //                                     AND SUBCODE05 = '$dt_ITXVIEWKK[SUBCODE05]' 
    //                                     AND SUBCODE06 = '$dt_ITXVIEWKK[SUBCODE06]'
    //                                     AND SUBCODE07 = '$dt_ITXVIEWKK[SUBCODE07]' 
    //                                     AND SUBCODE08 = '$dt_ITXVIEWKK[SUBCODE08]'
    //                                     AND SUBCODE09 = '$dt_ITXVIEWKK[SUBCODE09]' 
    //                                     AND SUBCODE10 = '$dt_ITXVIEWKK[SUBCODE10]'");
    // $dt_warna		= db2_fetch_assoc($sql_warna);

    // $sql_roll		= db2_exec($conn1, "SELECT count(*) AS ROLL, s2.PRODUCTIONORDERCODE
    //                                     FROM STOCKTRANSACTION s2 
    //                                     WHERE s2.ITEMTYPECODE ='KGF' AND s2.PRODUCTIONORDERCODE = '$dt_ITXVIEWKK[PRODUCTIONORDERCODE]'
    //                                     GROUP BY s2.PRODUCTIONORDERCODE");
    // $dt_roll   		= db2_fetch_assoc($sql_roll);

    // $sql_qtyorder   = db2_exec($conn1, "SELECT DISTINCT
    //                                             USEDUSERPRIMARYQUANTITY AS QTY_ORDER,
    //                                             USEDUSERSECONDARYQUANTITY AS QTY_ORDER_YARD,
    //                                         CASE
    //                                             WHEN TRIM(USERSECONDARYUOMCODE) = 'kg' THEN 'Kg'
    //                                             WHEN TRIM(USERSECONDARYUOMCODE) = 'yd' THEN 'Yard'
    //                                             WHEN TRIM(USERSECONDARYUOMCODE) = 'm' THEN 'Meter'
    //                                             ELSE 'PCS'
    //                                         END AS SATUAN_QTY
    //                                         FROM 
    //                                         ITXVIEW_RESERVATION_KK 
    //                                         WHERE 
    //                                         ORDERCODE = '$nodemand'");
    // $dt_qtyorder    = db2_fetch_assoc($sql_qtyorder);

    // $sql_netto		= db2_exec($conn1, "SELECT * FROM ITXVIEW_NETTO WHERE CODE = '$nodemand' AND SALESORDERLINESALESORDERCODE = '$dt_ITXVIEWKK[PROJECTCODE]'");
    // $d_netto		= db2_fetch_assoc($sql_netto);
// NOW

$con1 = mysqli_connect("10.0.0.10", "dit", "4dm1n", "db_dying");
if(!empty($nodemand)){
    $qryDye1 = mysqli_query($con1, "SELECT 
                                        b.langganan,										
                                        b.buyer,
                                        b.po,
                                        b.no_order,
                                        b.jenis_kain,
                                        CASE
                                            WHEN b.no_item = '' OR b.no_item = null THEN b.no_hanger
                                            ELSE b.no_item 
                                        END AS no_item,
                                        b.warna,
                                        b.no_warna,
                                        b.no_mesin,
                                        c.colorist,
                                        a.tgl_buat,
                                        a.nokk,
                                        b.rol,
                                        b.bruto
                                    FROM
                                        tbl_hasilcelup a
                                        LEFT JOIN tbl_montemp c ON a.id_montemp = c.id
                                        LEFT JOIN tbl_schedule b ON c.id_schedule = b.id
                                    WHERE
                                        a.nodemand LIKE '%$nodemand%'
                                    ORDER BY 
	                                    a.id DESC LIMIT 1");
    $dtDyeing = mysqli_fetch_array($qryDye1);

    if (empty($dtDyeing)) {
        echo "<script>swal({
            title: 'Data tidak dapat ditemukan <br>di hasil celup dyeing!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'warning',
            }).then((result) => {
            if (result.value) {
                window.location.href='CWarnaDyeNew';
            }
        });</script>";
    }

    $qryDye2 = mysqli_query($con1, "SELECT
                                        sum( a.rol ) AS jml_roll,
                                        sum( a.bruto ) AS jml_kg,
                                        a.no_mesin,
                                        a.proses,
                                        b.colorist 
                                    FROM
                                        db_dying.tbl_schedule a
                                    LEFT JOIN db_dying.tbl_montemp b ON a.id = b.id_schedule 
                                    WHERE
                                        a.nokk = '$dtDyeing[nokk]' 
                                        AND a.STATUS = 'selesai'");
    $dtSch = mysqli_fetch_array($qryDye2);
}
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div class="box box-info">
        <div class="box-header with-border">
            <center><h3 class="box-title">INPUT DATA <br>COCOK WARNA DYEING. <br> Berdasarkan data yang di input dari Hasil Celup Dyeing.</h3></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nodemand" class="col-sm-3 control-label">No Demand</label>
                    <div class="col-sm-4">
                        <input name="nokk" type="hidden" class="form-control" id="nokk" value="<?php echo $rowdb2['PRODUCTIONORDERCODE']; ?>">
                        <input name="nodemand" type="text" class="form-control" id="nodemand" onchange="proses_demand()" value="<?php echo $_GET['nodemand']; ?>" placeholder="No Demand" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="shift" class="col-sm-3 control-label">Shift</label>
                    <div class="col-sm-2">
                        <select class="form-control select2" name="shift" required id="shift" onchange="proses_shift()">
                            <option value="0">Pilih</option>
                            <option value="A" <?php if ($_GET['shift'] == "A") {
                                                    echo "SELECTED";
                                                } ?>>A</option>
                            <option value="B" <?php if ($_GET['shift'] == "B") {
                                                    echo "SELECTED";
                                                } ?>>B</option>
                            <option value="C" <?php if ($_GET['shift'] == "C") {
                                                    echo "SELECTED";
                                                } ?>>C</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pelanggan" class="col-sm-3 control-label">Pelanggan</label>
                    <div class="col-sm-8">
                        <input name="pelanggan" type="text" class="form-control" id="pelanggan" value="<?= $dtDyeing['langganan']; ?>" placeholder="Pelanggan">
                    </div>
                </div>
				<div class="form-group">
                    <label for="buyer" class="col-sm-3 control-label">Buyer</label>
                    <div class="col-sm-8">
                        <input name="buyer" type="text" class="form-control" id="buyer" value="<?= $dtDyeing['buyer']; ?>" placeholder="Buyer">
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_po" class="col-sm-3 control-label">PO</label>
                    <div class="col-sm-5">
                        <input name="no_po" class="form-control" type="text" id="no_po" value="<?= $dtDyeing['po']; ?>" placeholder="PO" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_order" class="col-sm-3 control-label">No Order</label>
                    <div class="col-sm-4">
                        <input name="no_order" type="text" class="form-control" id="no_order" value="<?= $dtDyeing['no_order']; ?>" placeholder="No Order" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="jenis_kain" class="col-sm-3 control-label">Jenis Kain</label>
                    <div class="col-sm-8">
                        <textarea name="jenis_kain" class="form-control" id="jenis_kain" placeholder="Jenis Kain"><?= stripslashes($dtDyeing['jenis_kain']); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_item" class="col-sm-3 control-label">No Item</label>
                    <div class="col-sm-3">
                        <input name="no_item" type="text" class="form-control" id="no_item" value="<?= $dtDyeing['no_item']; ?>" placeholder="No Item">
                    </div>
                </div>
                <div class="form-group">
                    <label for="warna" class="col-sm-3 control-label">Warna</label>
                    <div class="col-sm-8">
                        <textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?= $dtDyeing['warna']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
                    <div class="col-sm-8">
                        <textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?= $dtDyeing['no_warna']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_mesin" class="col-sm-3 control-label">No MC</label>
                    <div class="col-sm-3">
                        <input name="no_mesin" type="text" class="form-control" id="no_mesin" value="<?= $dtDyeing['no_mesin']; ?>" placeholder="No MC">
                    </div>
                </div>
                <div class="form-group">
                    <label for="colorist_dye" class="col-sm-3 control-label">Colorist Dye</label>
                    <div class="col-sm-5">
                        <input name="colorist_dye" type="text" class="form-control" id="colorist_dye" value="<?= $dtSch['colorist']; ?><?= $dtDyeing['colorist']; ?>" placeholder="Colorist Dye">
                    </div>
                </div>
                <div class="form-group">
                    <label for="proses_dye" class="col-sm-3 control-label">Proses</label>
                    <div class="col-sm-5">
                        <input name="proses_dye" type="text" class="form-control" id="proses_dye" value="<?= $dtSch['proses']; ?>" placeholder="Colorist Dye">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tgl_celup" class="col-sm-3 control-label">Tgl Celup</label>
                    <div class="col-sm-4">
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                            <input name="tgl_celup" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php if ($crow > 0) {
                                                                                                                                                        echo $row['tgl_celup'];
                                                                                                                                                    } else {
                                                                                                                                                        if ($dtDyeing['tgl_buat'] != "") {
                                                                                                                                                            echo substr($dtDyeing['tgl_buat'], 0, 10);
                                                                                                                                                        }
                                                                                                                                                    } ?>" required />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lot" class="col-sm-3 control-label">Prod. Order/Lot</label>
                    <div class="col-sm-3">
                        <input name="lot" class="form-control" type="text" id="lot" value="<?= $dtDyeing['nokk']; ?>" placeholder="Lot">
                    </div>
                </div>
                <div class="form-group">
                    <label for="qty_bruto" class="col-sm-3 control-label">Qty Bruto</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="rol" type="text" class="form-control" id="rol" value="<?= $dtDyeing['rol']; ?>" placeholder="" required>
                            <span class="input-group-addon">Roll</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="bruto" type="text" class="form-control" id="bruto" value="<?= $dtDyeing['bruto']; ?>" placeholder="0.00" required>
                            <span class="input-group-addon">KGs</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status_warna" class="col-sm-3 control-label">Status Warna</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="status_warna" onChange="tampil();">
                            <option value="">Pilih</option>
                            <option value="OK">OK</option>
                            <option value="TOLAK BASAH BEDA WARNA">TOLAK BASAH BEDA WARNA</option>
                            <option value="TOLAK BASAH LUNTUR">TOLAK BASAH LUNTUR</option>
                            <option value="TOLAK BASAH BEDA WARNA + LUNTUR">TOLAK BASAH BEDA WARNA + LUNTUR</option>
                            <option value="DISPOSISI">DISPOSISI</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="colorist_qcf" class="col-sm-3 control-label">Colorist QCF</label>
                    <div class="col-sm-5">
                        <input name="colorist_qcf" class="form-control" type="text" id="colorist_qcf" value="<?php echo $row['colorist_qcf']; ?>" placeholder="Colorist QCF">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ket" class="col-sm-3 control-label">Keterangan</label>
                    <div class="col-sm-8">
                        <textarea name="ket" class="form-control" id="ket" placeholder="Keterangan"><?php echo $row['ket']; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <?php if ($cekcwarna > 0) { ?>
                <button type="submit" class="btn btn-primary pull-right" name="ubah" value="ubah"><i class="fa fa-edit"></i> Ubah</button>
            <?php } else if ($_GET['nodemand'] != "" and $_GET['shift'] != "" and $cekcwarna == 0) { ?>
                <button type="submit" class="btn btn-primary pull-right" name="simpan" value="simpan"><i class="fa fa-save"></i> Simpan</button>
            <?php } ?>

            <button type="button" class="btn btn-warning pull-left" name="lihat" value="lihat" onClick="window.location.href='LihatCWarnaDyeNew'"><i class="fa fa-search"></i> Lihat Data</button>
        </div>
    </div>
</form>