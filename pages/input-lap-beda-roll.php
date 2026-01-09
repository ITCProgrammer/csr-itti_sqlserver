<script type="text/javascript">
    function proses_nodemand(){
        var nodemand = document.getElementById("nodemand").value;

        if (nodemand == 0) {
            window.location.href='InputLapBedaRoll';
        }else{
            window.location.href='InputLapBedaRoll&'+nodemand;
        }
    }

    function proses_shift() {
        var nodemand    = document.getElementById("nodemand").value;
        var shift = document.getElementById("shift").value;

        if (nodemand == "") {
            swal({
                title: 'Nomor Demand tidak boleh kosong',   
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
                });
        }else if (shift == 0){
            swal({
                title: 'Shift tidak boleh kosong',   
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
                });
        } else {
            window.location.href='InputLapBedaRoll&'+nodemand+'&'+shift;
        }
    }
	function proses_gshift() {
        var nodemand    = document.getElementById("nodemand").value;
        var shift = document.getElementById("shift").value;
		var gshift = document.getElementById("gshift").value;

        if (nodemand == "") {
            swal({
                title: 'Nomor Demand tidak boleh kosong',   
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
                });
        }else if (shift == 0){
            swal({
                title: 'Shift tidak boleh kosong',   
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
                });
		}else if (gshift == 0){
            swal({
                title: 'Group Shift tidak boleh kosong',   
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
                });	
        } else {
            window.location.href='InputLapBedaRoll&'+nodemand+'&'+shift+'&'+gshift;
        }
    }
</script>
<?Php
if($_GET['nodemand']!=""){$nodemand=$_GET['nodemand'];}else{$nodemand=" ";}
if($_GET['shift']!=""){$shift=$_GET['shift'];}else{$shift=" ";}
if($_GET['gshift']!=""){$gshift=$_GET['gshift'];}else{$gshift=" ";}

//Data sudah disimpan di database mysqli
$msql=mysqli_query($con,"SELECT * FROM `tbl_lap_beda_roll` WHERE `nodemand`='$nodemand' and `shift`='$_GET[shift]' and `groupshift`='$_GET[gshift]' AND DATE_FORMAT(tgl_update, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d')");
$row=mysqli_fetch_array($msql);
$crow=mysqli_num_rows($msql);

//Data sudah disimpan di database mysqli
$msql1=mysqli_query($con,"SELECT * FROM `tbl_lap_beda_roll` WHERE `nodemand`='$nodemand' and `shift`='$_GET[shift]' and `groupshift`='$_GET[gshift]'");
$row1=mysqli_fetch_array($msql1);
$crow1=mysqli_num_rows($msql1);

//Data sudah disimpan di database mysqli
$qryfin=mysqli_query($con,"SELECT * FROM `tbl_lap_beda_roll` WHERE `nodemand`='$nodemand' ORDER BY id DESC");
$rfin=mysqli_fetch_array($qryfin);
$cekfin=mysqli_num_rows($qryfin);


$sqlDB2="SELECT A.CODE AS DEMANDNO, TRIM(B.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE, TRIM(E.LEGALNAME1) AS LEGALNAME1, TRIM(C.ORDERPARTNERBRANDCODE) AS ORDERPARTNERBRANDCODE, TRIM(C.BUYER) AS BUYER,
TRIM(C.SALESORDERCODE) AS SALESORDERCODE, TRIM(C.ITEMDESCRIPTION) AS ITEMDESCRIPTION, TRIM(A.SUBCODE05) AS NO_WARNA, TRIM(F.WARNA) AS WARNA,
TRIM(A.SUBCODE02) AS SUBCODE02, TRIM(A.SUBCODE03) AS SUBCODE03, TRIM(C.LONGDESCRIPTION) AS NO_ITEM,TRIM(C.PO_NUMBER) AS PO_NUMBER, TRIM(C.INTERNALREFERENCE) AS INTERNALREFERENCE, A.BASEPRIMARYQUANTITY AS QTY_NETTO, TRIM(A.BASEPRIMARYUOMCODE) AS BASEPRIMARYUOMCODE,
A.BASESECONDARYQUANTITY AS QTY_NETTO_YARD, TRIM(A.BASESECONDARYUOMCODE) AS BASESECONDARYUOMCODE, C.QTY_ORDER, TRIM(C.QTY_ORDER_UOM) AS QTY_ORDER_UOM, C.QTY_PANJANG_ORDER,
TRIM(C.QTY_PANJANG_ORDER_UOM) AS QTY_PANJANG_ORDER_UOM, G.USEDUSERPRIMARYQUANTITY AS QTY_BAGI_KAIN, C.DELIVERYDATE,D.NAMENAME,D.VALUEDECIMAL FROM PRODUCTIONDEMAND A 
LEFT JOIN 
	(SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE, PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE FROM 
	PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
	GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) B
ON A.CODE=B.PRODUCTIONDEMANDCODE
LEFT JOIN 
	(SELECT SALESORDER.ORDERPARTNERBRANDCODE, SALESORDERLINE.SALESORDERCODE, SALESORDERLINE.ORDERLINE, SALESORDERLINE.ITEMDESCRIPTION, SALESORDERLINE.SUBCODE03, SALESORDERLINE.SUBCODE05, SALESORDERLINE.BASEPRIMARYUOMCODE AS QTY_ORDER_UOM,
	CASE
        WHEN SALESORDER.EXTERNALREFERENCE IS NULL THEN SALESORDERLINE.EXTERNALREFERENCE
        ELSE SALESORDER.EXTERNALREFERENCE
    END AS PO_NUMBER,
    SALESORDERLINE.INTERNALREFERENCE, SUM(SALESORDERLINE.BASEPRIMARYQUANTITY) AS QTY_ORDER,SUM(SALESORDERLINE.BASESECONDARYQUANTITY) AS QTY_PANJANG_ORDER, 
	SALESORDERLINE.BASESECONDARYUOMCODE AS QTY_PANJANG_ORDER_UOM, SALESORDERDELIVERY.DELIVERYDATE,ORDERITEMORDERPARTNERLINK.LONGDESCRIPTION, ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER
	FROM SALESORDER SALESORDER
	LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESORDER.CODE=SALESORDERLINE.SALESORDERCODE 
	LEFT JOIN SALESORDERDELIVERY SALESORDERDELIVERY ON SALESORDERLINE.SALESORDERCODE=SALESORDERDELIVERY.SALESORDERLINESALESORDERCODE AND SALESORDERLINE.ORDERLINE=SALESORDERDELIVERY.SALESORDERLINEORDERLINE
	LEFT JOIN ORDERITEMORDERPARTNERLINK ORDERITEMORDERPARTNERLINK ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERITEMORDERPARTNERLINK.ORDPRNCUSTOMERSUPPLIERCODE AND SALESORDERLINE.ITEMTYPEAFICODE= ORDERITEMORDERPARTNERLINK.ITEMTYPEAFICODE AND 
	SALESORDERLINE.SUBCODE01 = ORDERITEMORDERPARTNERLINK.SUBCODE01 AND SALESORDERLINE.SUBCODE02 = ORDERITEMORDERPARTNERLINK.SUBCODE02 AND SALESORDERLINE.SUBCODE03 = ORDERITEMORDERPARTNERLINK.SUBCODE03 AND
	SALESORDERLINE.SUBCODE04 = ORDERITEMORDERPARTNERLINK.SUBCODE04 AND SALESORDERLINE.SUBCODE05 = ORDERITEMORDERPARTNERLINK.SUBCODE05 AND SALESORDERLINE.SUBCODE06 = ORDERITEMORDERPARTNERLINK.SUBCODE06 AND 
	SALESORDERLINE.SUBCODE07 = ORDERITEMORDERPARTNERLINK.SUBCODE07 AND SALESORDERLINE.SUBCODE08 = ORDERITEMORDERPARTNERLINK.SUBCODE08 AND SALESORDERLINE.SUBCODE09 = ORDERITEMORDERPARTNERLINK.SUBCODE09 AND 
	SALESORDERLINE.SUBCODE10 = ORDERITEMORDERPARTNERLINK.SUBCODE10
	LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE AND SALESORDER.ORDERPARTNERBRANDCODE=ORDERPARTNERBRAND.CODE 
	GROUP BY SALESORDER.ORDERPARTNERBRANDCODE, SALESORDERLINE.SALESORDERCODE, SALESORDERLINE.ORDERLINE, SALESORDERLINE.ITEMDESCRIPTION, SALESORDERLINE.SUBCODE03, SALESORDERLINE.SUBCODE05, SALESORDERLINE.BASEPRIMARYUOMCODE,SALESORDERLINE.BASESECONDARYUOMCODE, 
	SALESORDER.EXTERNALREFERENCE,SALESORDERLINE.EXTERNALREFERENCE,SALESORDERLINE.INTERNALREFERENCE, SALESORDERDELIVERY.DELIVERYDATE, ORDERITEMORDERPARTNERLINK.LONGDESCRIPTION, ORDERPARTNERBRAND.LONGDESCRIPTION) C
ON A.ORIGDLVSALORDLINESALORDERCODE = C.SALESORDERCODE AND A.ORIGDLVSALORDERLINEORDERLINE = C.ORDERLINE
LEFT JOIN
	(SELECT PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10,  
	LISTAGG(TRIM(ADSTORAGE.NAMENAME),',') WITHIN GROUP(ORDER BY ADSTORAGE.NAMENAME ASC) AS NAMENAME, 
	LISTAGG(ADSTORAGE.VALUEDECIMAL,',') WITHIN GROUP(ORDER BY ADSTORAGE.NAMENAME ASC) AS VALUEDECIMAL
	FROM PRODUCT PRODUCT LEFT JOIN ADSTORAGE ADSTORAGE ON PRODUCT.ABSUNIQUEID=ADSTORAGE.UNIQUEID
	GROUP BY PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06, PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10) D
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
	(SELECT BUSINESSPARTNER.LEGALNAME1,ORDERPARTNER.CUSTOMERSUPPLIERCODE FROM BUSINESSPARTNER BUSINESSPARTNER 
	LEFT JOIN ORDERPARTNER ORDERPARTNER ON BUSINESSPARTNER.NUMBERID=ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID) E
ON A.CUSTOMERCODE=E.CUSTOMERSUPPLIERCODE
LEFT JOIN (
    SELECT ITXVIEWCOLOR.ITEMTYPECODE, ITXVIEWCOLOR.SUBCODE01, ITXVIEWCOLOR.SUBCODE02,
    ITXVIEWCOLOR.SUBCODE03, ITXVIEWCOLOR.SUBCODE04, ITXVIEWCOLOR.SUBCODE05, ITXVIEWCOLOR.SUBCODE06, 
    ITXVIEWCOLOR.SUBCODE07, ITXVIEWCOLOR.SUBCODE08, ITXVIEWCOLOR.SUBCODE09, ITXVIEWCOLOR.SUBCODE10, 
    ITXVIEWCOLOR.WARNA FROM ITXVIEWCOLOR ITXVIEWCOLOR) F ON
    A.ITEMTYPEAFICODE = F.ITEMTYPECODE AND 
    A.SUBCODE01 = F.SUBCODE01 AND 
    A.SUBCODE02 = F.SUBCODE02 AND 
    A.SUBCODE03 = F.SUBCODE03 AND 
    A.SUBCODE04 = F.SUBCODE04 AND 
    A.SUBCODE05 = F.SUBCODE05 AND 
    A.SUBCODE06 = F.SUBCODE06 AND 
    A.SUBCODE07 = F.SUBCODE07 AND 
    A.SUBCODE08 = F.SUBCODE08 AND 
    A.SUBCODE09 = F.SUBCODE09 AND 
    A.SUBCODE10 = F.SUBCODE10
LEFT JOIN
	(SELECT PRODUCTIONRESERVATION.PRODUCTIONORDERCODE, PRODUCTIONRESERVATION.ITEMTYPEAFICODE, SUM(PRODUCTIONRESERVATION.USEDUSERPRIMARYQUANTITY) AS USEDUSERPRIMARYQUANTITY FROM PRODUCTIONRESERVATION 
	PRODUCTIONRESERVATION WHERE PRODUCTIONRESERVATION.ITEMTYPEAFICODE='KGF' GROUP BY PRODUCTIONRESERVATION.PRODUCTIONORDERCODE, PRODUCTIONRESERVATION.ITEMTYPEAFICODE) G
ON B.PRODUCTIONORDERCODE = G.PRODUCTIONORDERCODE
WHERE A.CODE='$nodemand'";
$stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
$rowdb2 = db2_fetch_assoc($stmt);
$ww=explode(",",$rowdb2['NAMENAME']);
$valueww=explode(",",$rowdb2['VALUEDECIMAL']);
//GRAMASI
if($ww[0]=="GSM"){ $gramasi=$valueww[0];}
else if($ww[1]=="GSM"){ $gramasi=$valueww[1];}
else if($ww[2]=="GSM"){ $gramasi=$valueww[2];}
else if($ww[3]=="GSM"){ $gramasi=$valueww[3];}
$posg=strpos($gramasi,".");
$valgramasi=substr($gramasi,0,$posg);
//WIDTH
if($ww[0]=="Width"){ $lebar=$valueww[0];}
else if($ww[1]=="Width"){ $lebar=$valueww[1];}
else if($ww[2]=="Width"){ $lebar=$valueww[2];}
else if($ww[3]=="Width"){ $lebar=$valueww[3];}
$posl=strpos($lebar,".");
$vallebar=substr($lebar,0,$posl);

$sqlroll="SELECT 
STOCKTRANSACTION.ORDERCODE,
COUNT(STOCKTRANSACTION.ITEMELEMENTCODE) AS JML_ROLL
FROM STOCKTRANSACTION STOCKTRANSACTION
WHERE STOCKTRANSACTION.ORDERCODE ='$rowdb2[PRODUCTIONORDERCODE]' AND STOCKTRANSACTION.TEMPLATECODE ='120'
AND STOCKTRANSACTION.ITEMTYPECODE ='KGF'
GROUP BY 
STOCKTRANSACTION.ORDERCODE";
$stmt1=db2_exec($conn1,$sqlroll, array('cursor'=>DB2_SCROLLABLE));
$rowr = db2_fetch_assoc($stmt1);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<div class="row">
    <div class="col-xs-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Input Data</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nodemand" class="col-sm-3 control-label">No Demand</label>
                        <div class="col-sm-4">
                            <input name="nokk" type="hidden" class="form-control" id="nokk" 
                            value="<?php echo $rowdb2['PRODUCTIONORDERCODE'];?>" >
                            <input name="nodemand" type="text" class="form-control" id="nodemand" 
                            onchange="proses_nodemand()" value="<?php echo $_GET['nodemand'];?>" placeholder="No Demand" required >
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="shift" class="col-sm-3 control-label">Shift</label>
                            <div class="col-sm-2">
                                <select class="form-control chosen-select" name="shift" required id="shift" onchange="proses_shift()">
                                    <option value="0">Pilih</option>
                                    <option value="1" <?php if($_GET['shift']=="1"){echo "SELECTED";}?>>1</option>
                                    <option value="2" <?php if($_GET['shift']=="2"){echo "SELECTED";}?>>2</option>
                                    <option value="3" <?php if($_GET['shift']=="3"){echo "SELECTED";}?>>3</option>
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="groupshift" class="col-sm-3 control-label">Group</label>
                            <div class="col-sm-3">
                            <?php if($crow>0){$grup=$row['groupshift'];}?>
                                <select class="form-control select2" name="groupshift" id="gshift" onChange="proses_gshift()">
                                    <option value="">Pilih</option>
                                    <option value="A" <?php if($_GET['gshift']=="A"){echo "SELECTED";}?>>A</option>
                                    <option value="B" <?php if($_GET['gshift']=="B"){echo "SELECTED";}?>>B</option>
                                    <option value="C" <?php if($_GET['gshift']=="C"){echo "SELECTED";}?>>C</option>
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="no_order" class="col-sm-3 control-label">No Order</label>
                        <div class="col-sm-4">
                            <input name="no_order" type="text" class="form-control" id="no_order" value="<?php if($crow>0){echo $row['no_order'];}else{echo $rowdb2['SALESORDERCODE'];} ?>" placeholder="No Order" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pelanggan" class="col-sm-3 control-label">Pelanggan</label>
                        <div class="col-sm-8">
                            <input name="pelanggan" type="text" class="form-control" id="pelanggan" 
                            value="<?php if($crow>0){echo $row['pelanggan'];}else{if($_GET['nodemand']!="" and $rowdb2['LEGALNAME1']!=""){echo $rowdb2['LEGALNAME1']."/".$rowdb2['ORDERPARTNERBRANDCODE'];}}?>" placeholder="Pelanggan" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_po" class="col-sm-3 control-label">PO</label>
                        <div class="col-sm-4">
                            <input name="no_po" type="text" class="form-control" id="no_po" value="<?php if($crow>0){echo $row['no_po'];}else{echo $rowdb2['PO_NUMBER'];} ?>" placeholder="No Order" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
                        <div class="col-sm-3">
                            <input name="no_hanger" type="text" class="form-control" id="no_hanger" 
                            value="<?php if($crow>0){echo $row['no_hanger'];}else{echo $rowdb2['SUBCODE02'].$rowdb2['SUBCODE03'];}?>" placeholder="No Hanger">  
                        </div>
                        <div class="col-sm-3">
                        <input name="no_item" type="text" class="form-control" id="no_item" 
                            value="<?php if($row['no_item']!=""){echo $row['no_item'];}else{echo $rowdb2['NO_ITEM'];}?>" placeholder="No Item">
                        </div>	
                    </div>
                    <div class="form-group">
                        <label for="jenis_kain" class="col-sm-3 control-label">Jenis Kain</label>
                        <div class="col-sm-8">
                            <textarea name="jenis_kain" class="form-control" id="jenis_kain" placeholder="Jenis Kain"><?php if($crow>0){echo $row['jenis_kain'];}else{echo stripslashes($rowdb2['ITEMDESCRIPTION']);}?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
                        <div class="col-sm-2">
                            <input name="lebar" type="text" class="form-control" id="lebar" 
                            value="<?php if($crow>0){echo $row['lebar'];}else{echo $vallebar;} ?>" placeholder="0" required>
                        </div>
                        <div class="col-sm-2">
                            <input name="gramasi" type="text" class="form-control" id="gramasi" 
                            value="<?php if($crow>0){echo $row['gramasi'];}else{echo $valgramasi;} ?>" placeholder="0" required>
                        </div>		
                    </div>
                    <div class="form-group">
                        <label for="warna" class="col-sm-3 control-label">Warna</label>
                        <div class="col-sm-8">
                            <textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($crow>0){echo $row['warna'];}else{echo stripslashes($rowdb2['WARNA']);}?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
                        <div class="col-sm-8">
                            <textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if($crow>0){echo $row['no_warna'];}else{echo stripslashes($rowdb2['NO_WARNA']);}?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lot" class="col-sm-3 control-label">Lot</label>
                        <div class="col-sm-2">
                            <input name="lot" class="form-control" type="text" id="lot" value="<?php if($cek>0){echo $rcek['lot'];}else{ echo $rowdb2['PRODUCTIONORDERCODE'];}?>" placeholder="Lot">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="qty_bruto" class="col-sm-3 control-label">Qty Bruto</label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input name="roll_bruto" type="text" class="form-control" id="roll_bruto" value="<?php if($crow > 0){echo $row['roll_bruto'];}else {if ($rowr['JML_ROLL'] != 0) {echo $rowr['JML_ROLL'];}}?>" placeholder="" required>
                                <span class="input-group-addon">Roll</span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input name="bruto" type="text" class="form-control" id="bruto" value="<?php if($crow>0){echo $row['bruto'];}else{echo round($rowdb2['QTY_BAGI_KAIN'],2);} ?>" placeholder="0.00" required>
                                <span class="input-group-addon">KGs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="roll_inspek" class="col-sm-3 control-label">Roll Cek Shading</label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input name="roll_inspek" type="text" class="form-control" id="roll_inspek" value="<?php if($crow>0){echo $row['roll_inspek'];}?>" placeholder="" required>
                                <span class="input-group-addon">Roll</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="operator" class="col-sm-3 control-label">Operator</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <select class="form-control select2" name="operator" id="operator">
                                        <option value="">Pilih</option>
                                        <?php 
                                        $qryo=mysqli_query($con,"SELECT nama FROM tbl_operator ORDER BY nama ASC");
                                        while($ro=mysqli_fetch_array($qryo)){
                                        ?>
                                        <option value="<?php echo $ro['nama'];?>" <?php if($row['operator']==$ro['nama']){echo "SELECTED";}?>><?php echo $ro['nama'];?></option>	
                                        <?php }?>
                                    </select>
                                    <span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataOperator"> ...</button></span>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="kk_legacy" class="col-sm-3 control-label">No KK Legacy</label>
                        <div class="col-sm-4">
                            <input name="kk_legacy" type="text" class="form-control" id="kk_legacy" value="<?php if($crow>0){echo $row['kk_legacy'];} ?>" placeholder="No KK Legacy" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lot_legacy" class="col-sm-3 control-label">Lot Legacy</label>
                        <div class="col-sm-4">
                            <input name="lot_legacy" type="text" class="form-control" id="lot_legacy" value="<?php if($crow>0){echo $row['lot_legacy'];} ?>" placeholder="Lot Legacy"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comment" class="col-sm-3 control-label">Comments</label>
                        <div class="col-sm-8">
                            <textarea name="comment" class="form-control" id="comment" placeholder="Comments"><?php echo $row['comment'];?></textarea>  
                        </div>				   
                    </div>
                </div>
            </div>
            <div class="box-footer">
                    <?php if($_GET['nodemand']!="" and $_GET['shift']!="" and $_GET['gshift']!="" and $cek==0){ ?>
                    <button type="submit" class="btn btn-primary pull-right" name="simpan" value="simpan"><i class="fa fa-save"></i> Simpan</button> 
                    <?php }else if($_GET['nodemand']!="" and $_GET['shift']!="" and $_GET['gshift']!="" and $cek>0){?>
                    <button type="submit" class="btn btn-primary pull-right" name="ubah" value="ubah"><i class="fa fa-edit"></i> Ubah</button>
                    <?php } ?>
                    <button type="button" class="btn btn-warning pull-left" name="lihat" value="lihat" onClick="window.location.href='LihatDataBedaRoll'"><i class="fa fa-search"></i> Lihat Data</button> 	   
            </div>
        </div>
    </div>
    <div class="col-xs-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Detail Inspeksi</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped" style="width: 100%;">
                        <thead class="bg-blue">
                            <tr>
                                <th width="5%"><div align="center">No</div></th>
                                <th width="10%"><div align="center">Roll Inspect</div></th>
                                <th width="5%"><div align="center">Red</div></th>
                                <th width="5%"><div align="center">Green</div></th>
                                <th width="5%"><div align="center">Blue</div></th>
                                <th width="5%"><div align="center">Yellow</div></th>
                                <th width="5%"><div align="center">Beda Roll</div></th>
                                <th width="5%"><div align="center">Ujung Beda</div></th>
                                <th width="5%"><div align="center">OK</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sqlInspek="SELECT ELEMENTSINSPECTION.ELEMENTCODE
                                FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
                                WHERE ELEMENTSINSPECTION.DEMANDCODE = '$nodemand' AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))= 11 ORDER BY ELEMENTSINSPECTION.ELEMENTCODE ASC";
                                $stmt=db2_exec($conn1,$sqlInspek, array('cursor'=>DB2_SCROLLABLE));
                                $no=1;
                                while($row1 = db2_fetch_assoc($stmt)){
                            ?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td align="center"><?php echo $no; ?></td>
                                <td align="center"><?php echo $row1['ELEMENTCODE'];?></td>
                                <td align="center"><input type="checkbox" name="cek1[<?php echo $no; ?>]" value="1"/></td>
                                <td align="center"><input type="checkbox" name="cek2[<?php echo $no; ?>]" value="1"/></td>
                                <td align="center"><input type="checkbox" name="cek3[<?php echo $no; ?>]" value="1"/></td>
                                <td align="center"><input type="checkbox" name="cek4[<?php echo $no; ?>]" value="1"/></td>
                                <td align="center"><input type="checkbox" name="cek5[<?php echo $no; ?>]" value="1"/></td>
                                <td align="center"><input type="checkbox" name="cek6[<?php echo $no; ?>]" value="1"/></td>
                                <td align="center"><input type="checkbox" name="cek7[<?php echo $no; ?>]" value="1"/></td>
                            </tr>
                            <?php $no++;} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
</form>
<?php
include"koneksi.php";
ini_set("error_reporting", 1);
if(isset($_POST['simpan']))
{
	$ceksql=mysqli_query($con,"SELECT * FROM `tbl_lap_beda_roll` WHERE `nodemand`='$_GET[nodemand]' and `shift`='$_POST[shift]' and `groupshift`='$_POST[groupshift]' AND DATE_FORMAT(tgl_update, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') LIMIT 1");
    $cek=mysqli_num_rows($ceksql);
	if($cek>0){
    $pelanggan=str_replace("'","''",$_POST['pelanggan']);
    $order=str_replace("'","''",$_POST['no_order']);
    $jns=str_replace("'","''",$_POST['jenis_kain']);
    $warna=str_replace("'","''",$_POST['warna']);
    $no_warna=str_replace("'","''",$_POST['no_warna']);
    $comment=str_replace("'","''",$_POST['comment']);
	$sql1=mysqli_query($con,"UPDATE`tbl_lap_beda_roll` SET
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
	`bruto`='$_POST[bruto]',
	`roll_inspek`='$_POST[roll_inspek]',
    `operator`='$_POST[operator]',
    `lebar`='$_POST[lebar]',
    `gramasi`='$_POST[gramasi]',
    `tgl_update`=now(),
    `ip`='$_SERVER[REMOTE_ADDR]',
    `comment`='$_POST[comment]',
    `lot_legacy`='$_POST[lot_legacy]',
    `kk_legacy`='$_POST[kk_legacy]'
	WHERE `nodemand`='$_POST[nodemand]' and `shift`='$_POST[shift]' and groupshift='$_POST[groupshift]'");
	if($sql1){
        //echo " <script>alert('Data has been updated!');</script>";
        echo "<script>swal({
            title: 'Data has been updated!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='InputLapBedaRoll&$_POST[nodemand]';
               
            }
          });</script>";
		}
		}
    else{
    $pelanggan=str_replace("'","''",$_POST['pelanggan']);
    $order=str_replace("'","''",$_POST['no_order']);
    $jns=str_replace("'","''",$_POST['jenis_kain']);
    $po=str_replace("'","''",$_POST['no_po']);
    $warna=str_replace("'","''",$_POST['warna']);
    $no_warna=str_replace("'","''",$_POST['no_warna']);
    $catatan=str_replace("'","''",$_POST['catatan']);
	$sql=mysqli_query($con,"INSERT INTO `tbl_lap_beda_roll` SET
	`nokk`='$_POST[nokk]',
    `nodemand`='$_POST[nodemand]',
	`no_order`='$order',
    `no_item`='$_POST[no_item]',
    `no_hanger`='$_POST[no_hanger]',
    `no_po`='$po',
	`pelanggan`='$pelanggan',
	`jenis_kain`='$jns',
	`warna`='$warna',
    `no_warna`='$no_warna',
	`lot`='$_POST[lot]',
    `shift`='$_POST[shift]',
	`groupshift`='$_POST[groupshift]',
	`bruto`='$_POST[bruto]',
	`roll_inspek`='$_POST[roll_inspek]',
    `operator`='$_POST[operator]',
    `lebar`='$_POST[lebar]',
    `gramasi`='$_POST[gramasi]',
    `comment`='$_POST[comment]',
    `lot_legacy`='$_POST[lot_legacy]',
    `kk_legacy`='$_POST[kk_legacy]',
    `tgl_update`=now(),
    `tgl_buat`=now(),
    `ip`='$_SERVER[REMOTE_ADDR]'");

        $sqlIn="SELECT ELEMENTSINSPECTION.ELEMENTCODE
        FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
        WHERE ELEMENTSINSPECTION.DEMANDCODE = '$nodemand' AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))= 11 ORDER BY ELEMENTSINSPECTION.ELEMENTCODE ASC";
        $stmt2=db2_exec($conn1,$sqlIn, array('cursor'=>DB2_SCROLLABLE));
        $no=1;
        while($rI = db2_fetch_assoc($stmt2)){
            $idcek1	= $_POST['cek1'][$no];
            $idcek2	= $_POST['cek2'][$no];
            $idcek3	= $_POST['cek3'][$no];
            $idcek4	= $_POST['cek4'][$no];
            $idcek5	= $_POST['cek5'][$no];
            $idcek6	= $_POST['cek6'][$no];
            $idcek7	= $_POST['cek7'][$no];
            if($idcek1!=""){	
                $element	= trim($rI['ELEMENTCODE']);
                $nodemand	= $_POST['nodemand'];
                $sqlInsert=mysqli_query($con,"INSERT INTO tbl_detail_beda_roll SET
                `element`='$element',
                `nodemand`='$nodemand',
                `red`='1',
                `green`='0',
                `blue`='0',
                `yellow`='0',
                `beda_roll`='0',
                `ujung_beda`='0',
                `ok`='0',
                `tgl_buat`=now()");
                }
            if($idcek2!=""){	
                    $element	= trim($rI['ELEMENTCODE']);
                    $nodemand	= $_POST['nodemand'];
                    $sqlInsert=mysqli_query($con,"INSERT INTO tbl_detail_beda_roll SET
                    `element`='$element',
                    `nodemand`='$nodemand',
                    `red`='0',
                    `green`='1',
                    `blue`='0',
                    `yellow`='0',
                    `beda_roll`='0',
                    `ujung_beda`='0',
                    `ok`='0',
                    `tgl_buat`=now()");
                }
            if($idcek3!=""){	
                    $element	= trim($rI['ELEMENTCODE']);
                    $nodemand	= $_POST['nodemand'];
                    $sqlInsert=mysqli_query($con,"INSERT INTO tbl_detail_beda_roll SET
                    `element`='$element',
                    `nodemand`='$nodemand',
                    `red`='0',
                    `green`='0',
                    `blue`='1',
                    `yellow`='0',
                    `beda_roll`='0',
                    `ujung_beda`='0',
                    `ok`='0',
                    `tgl_buat`=now()");
                }
            if($idcek4!=""){	
                    $element	= trim($rI['ELEMENTCODE']);
                    $nodemand	= $_POST['nodemand'];
                    $sqlInsert=mysqli_query($con,"INSERT INTO tbl_detail_beda_roll SET
                    `element`='$element',
                    `nodemand`='$nodemand',
                    `red`='0',
                    `green`='0',
                    `blue`='0',
                    `yellow`='1',
                    `beda_roll`='0',
                    `ujung_beda`='0',
                    `ok`='0',
                    `tgl_buat`=now()");
                }
            if($idcek5!=""){	
                    $element	= trim($rI['ELEMENTCODE']);
                    $nodemand	= $_POST['nodemand'];
                    $sqlInsert=mysqli_query($con,"INSERT INTO tbl_detail_beda_roll SET
                    `element`='$element',
                    `nodemand`='$nodemand',
                    `red`='0',
                    `green`='0',
                    `blue`='0',
                    `yellow`='0',
                    `beda_roll`='1',
                    `ujung_beda`='0',
                    `ok`='0',
                    `tgl_buat`=now()");
                }
            if($idcek6!=""){	
                    $element	= trim($rI['ELEMENTCODE']);
                    $nodemand	= $_POST['nodemand'];
                    $sqlInsert=mysqli_query($con,"INSERT INTO tbl_detail_beda_roll SET
                    `element`='$element',
                    `nodemand`='$nodemand',
                    `red`='0',
                    `green`='0',
                    `blue`='0',
                    `yellow`='0',
                    `beda_roll`='0',
                    `ujung_beda`='1',
                    `ok`='0',
                    `tgl_buat`=now()");
                }
            if($idcek7!=""){	
                    $element	= trim($rI['ELEMENTCODE']);
                    $nodemand	= $_POST['nodemand'];
                    $sqlInsert=mysqli_query($con,"INSERT INTO tbl_detail_beda_roll SET
                    `element`='$element',
                    `nodemand`='$nodemand',
                    `red`='0',
                    `green`='0',
                    `blue`='0',
                    `yellow`='0',
                    `beda_roll`='0',
                    `ujung_beda`='0',
                    `ok`='1',
                    `tgl_buat`=now()");
                }
            $no++;
        }
	if($sql){
            echo "<script>swal({
                title: 'Data has been saved!',   
                text: 'Klik Ok untuk input data kembali',
                type: 'success',
                }).then((result) => {
                if (result.value) {
                    window.location.href='InputLapBedaRoll&$_POST[nodemand]';
                
                }
            });</script>";
            
        }
	}
}
?>
<div class="modal fade" id="DataOperator">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
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
				<input type="submit" value="Simpan" name="simpan_operator" id="simpan_operator" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_operator']=="Simpan"){
	$nama=strtoupper($_POST['operator']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_operator SET 
		  nama='$nama'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='InputLapBedaRoll-$nodemand';
	 
  }
});</script>";
		}
}
?>
