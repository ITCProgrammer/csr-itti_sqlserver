<?php
include"koneksi.php";
ini_set("error_reporting", 1);
$demand=$_GET['demand'];
$sqlDB2="SELECT 
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
WHERE A.CODE='$demand'";
$stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
$cekdb2= db2_num_rows($stmt);
$rowdb2 = db2_fetch_assoc($stmt);
//GRAMASI
$posg=strpos($rowdb2['GRAMASI'],".");
$valgramasi=substr($rowdb2['GRAMASI'],0,$posg);
//LEBAR
$posl=strpos($rowdb2['LEBAR'],".");
$vallebar=substr($rowdb2['LEBAR'],0,$posl);

$sqlCek=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE nodemand='$nodemand' and no_ncp='$NCPNO' ORDER BY id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$rcek=mysqli_fetch_array($sqlCek);

?>
<div class="row">
	<div class="col-xs-12">
  		<div class="box box-info">
   			<div class="box-header with-border">
    			<h3 class="box-title">Stiker Custom</h3>
    			<div class="box-tools pull-right">
      				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    			</div>
  			</div>
			<form class="form-horizontal" action="pages/cetak/cetak-stiker-custom-full.php" method="post" enctype="multipart/form-data" name="form1" id="form1" target="_blank">
				<div class="box-body"> 
					<div class="col-md-12"> 
						<div class="form-group">
							<label for="demand" class="col-sm-2 control-label">No Demand</label>
							<div class="col-sm-2">
								<input name="demand" type="text" class="form-control" id="demand" 
								onchange="window.location='StikerCustomNew-'+this.value" value="<?php echo $_GET['demand'];?>" placeholder="No Demand" required>
							</div>
							<label for="lotcode" class="col-sm-2 control-label">No KK ERP (LOT)</label>
							
<div class="col-sm-2">
								<input name="lotcode" type="text" class="form-control" id="lotcode" 
								 value="<?php if($cekdb2>0){echo $rowdb2['PRODUCTIONORDERCODE'];}else{} ?>" placeholder="No KK ERP">
							</div>
						</div>
						<div class="form-group">
							<label for="pelanggan" class="col-sm-2 control-label">Pelanggan</label>
							<div class="col-sm-6">
								<input name="pelanggan" type="text" class="form-control" id="no_po" 
								value="<?php if($cekdb2>0){echo $rowdb2['LEGALNAME1']."/".$rowdb2['BUYER'];}else{}?>" placeholder="Pelanggan" >
							</div>				   
						</div>
						<div class="form-group">
							<label for="no_order" class="col-sm-2 control-label">No Order</label>
								<div class="col-sm-2">
								<input name="no_order" type="text" class="form-control" id="no_order" 
								value="<?php if($cekdb2>0){echo $rowdb2['SALESORDERCODE'];}else{} ?>" placeholder="No Order" required>
							</div>				   
						</div>
						<div class="form-group">
							<label for="no_po" class="col-sm-2 control-label">PO</label>
								<div class="col-sm-3">
									<input name="no_po" type="text" class="form-control" id="no_po" 
									value="<?php if($cekdb2>0){echo $rowdb2['PO_NUMBER'];}else{} ?>" placeholder="PO" >
								</div>				   
						</div>
						<div class="form-group">
							<label for="no_hanger" class="col-sm-2 control-label">No Hanger / No Item</label>
								<div class="col-sm-2">
									<input name="no_hanger" type="text" class="form-control" id="no_hanger" 
									value="<?php if($cekdb2>0){echo $rowdb2['SUBCODE02'].''.$rowdb2['SUBCODE03'];}else{}?>" placeholder="No Hanger">  
								</div>
								<div class="col-sm-2">
									<input name="no_item" type="text" class="form-control" id="no_item" 
									value="<?php if($cekdb2>0){echo $rowdb2['NO_ITEM'];}else{}?>" placeholder="No Item">
								</div>	
						</div>
						<div class="form-group">
							<label for="jns_kain" class="col-sm-2 control-label">Jenis Kain</label>
								<div class="col-sm-5">
									<textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cekdb2>0){echo $rowdb2['JENIS_KAIN'];} else{}?></textarea>
								</div>
						</div>	 		
						<div class="form-group">
							<label for="l_g" class="col-sm-2 control-label">Lebar X Gramasi</label>
							<div class="col-sm-1">
								<input name="lebar" type="text" class="form-control" id="lebar" 
								value="<?php if($cekdb2>0){echo $vallebar;} ?>" placeholder="0" required>
							</div>
							<div class="col-sm-1">
								<input name="grms" type="text" class="form-control" id="grms" 
								value="<?php if($cekdb2>0){echo $valgramasi;} ?>" placeholder="0" required>
							</div>		
						</div>
						<div class="form-group">
							<label for="warna" class="col-sm-2 control-label">Warna</label>
							<div class="col-sm-5">
								<textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($cekdb2>0){echo $rowdb2['WARNA'];}else{}?></textarea>
							</div>				   
						</div>
						<div class="form-group">
							<label for="no_warna" class="col-sm-2 control-label">No Warna</label>
							<div class="col-sm-5">
								<textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if($cekdb2>0){echo $rowdb2['NO_WARNA'];}else{}?></textarea>
							</div>				   
						</div>
						<div class="form-group">
							<label for="no_element" class="col-sm-2 control-label">No Element</label>
								<div class="col-sm-2">
								<input name="no_element" type="text" class="form-control" id="no_element" 
								value="" placeholder="No Element" required>
							</div>				   
						</div>
						<div class="form-group">
							<label for="grade" class="col-sm-2 control-label">Grade</label>
								<div class="col-sm-2">
								<input name="grade" type="text" class="form-control" id="grade" 
								value="" placeholder="Grade" required>
							</div>				   
						</div>
						<div class="form-group">
							<label for="pjng" class="col-sm-2 control-label">Length</label>
								<div class="col-sm-2">
								<input name="pjng" type="text" class="form-control" id="pjng" 
								value="" placeholder="Length" required>
							</div>				   
						</div>
						<div class="form-group">
							<label for="kg" class="col-sm-2 control-label">Weight</label>
								<div class="col-sm-2">
								<input name="kg" type="text" class="form-control" id="kg" 
								value="" placeholder="Weight" required>
							</div>				   
						</div>
					</div>
				</div>
				<div class="box-footer">
				<?php if($_GET['demand']!=""){ ?> 	
					<a href="pages/cetak/cetak-stiker-custom3.php?demand=<?php echo $_GET['demand']; ?>" class="btn btn-success <?php if($_GET['demand']=="") { echo "disabled"; }?>" target="_blank">Cetak Stiker</a>
					<div class="col-sm-1 pull-right">
					<button type="submit" class="form-control btn btn-danger ">Cetak Stiker Full</button>
					</div>	
				<?php } ?>	   
				</div>
					<!-- /.box-footer -->
			</form>
		</div>
	</div>
</div>	