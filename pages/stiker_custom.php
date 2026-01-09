<?php
include"koneksi.php";
ini_set("error_reporting", 1);
$lotcode=$_GET['lotcode'];
$sqlDB2="SELECT 
A.LOTCODE, 
C.PRODUCTIONDEMANDCODE AS DEMAND,
B.CODE AS NO_ORDER,
CASE
	WHEN B.PO_HEADER IS NULL THEN B.PO_LINE
	ELSE B.PO_HEADER
END AS PO_NUMBER,
B.ORDPRNCUSTOMERSUPPLIERCODE,
B.ORDERPARTNERBRANDCODE, 
B.LONGDESCRIPTION AS BUYER, 
B.LEGALNAME1 AS LANGGANAN, 
B.ITEMDESCRIPTION AS JENIS_KAIN,
G.NO_ITEM,
TRIM(A.DECOSUBCODE02) AS DECOSUBCODE02,
TRIM(A.DECOSUBCODE03) AS DECOSUBCODE03,
CASE
	WHEN B.STYLE_HEADER IS NULL THEN B.STYLE_LINE
	ELSE B.STYLE_HEADER
END AS STYL,
CASE
	WHEN A.DECOSUBCODE07 = '-' THEN D.COLOR
	WHEN A.DECOSUBCODE07 <> '-' OR A.DECOSUBCODE07 <> '' THEN E.COLOR_PRT
	WHEN A.ITEMTYPECODE = 'FKF' THEN F.COLOR_FKF
	ELSE ''
END AS WARNA,
TRIM(A.DECOSUBCODE05) AS NO_WARNA,
J.VALUEDECIMAL AS LEBAR,
I.VALUEDECIMAL AS GRAMASI
FROM STOCKTRANSACTION A 
LEFT JOIN 
(SELECT SALESORDER.CODE,SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE,SALESORDER.ORDERPARTNERBRANDCODE,ORDERPARTNERBRAND.LONGDESCRIPTION,BUSINESSPARTNER.LEGALNAME1,
SALESORDER.EXTERNALREFERENCE AS PO_HEADER,SALESORDERLINE.EXTERNALREFERENCE AS PO_LINE, 
SALESORDER.INTERNALREFERENCE AS STYLE_HEADER,SALESORDERLINE.INTERNALREFERENCE AS STYLE_LINE,
SALESORDERLINE.ITEMDESCRIPTION, 
SALESORDERLINE.ITEMTYPEAFICODE, SALESORDERLINE.SUBCODE01, SALESORDERLINE.SUBCODE02, SALESORDERLINE.SUBCODE03,
SALESORDERLINE.SUBCODE04, SALESORDERLINE.SUBCODE05, SALESORDERLINE.SUBCODE06, SALESORDERLINE.SUBCODE07,
SALESORDERLINE.SUBCODE08, SALESORDERLINE.SUBCODE09, SALESORDERLINE.SUBCODE10
FROM SALESORDER SALESORDER
LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESORDER.CODE = SALESORDERLINE.SALESORDERCODE
LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE AND SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE
LEFT JOIN ORDERPARTNER ORDERPARTNER ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNER.CUSTOMERSUPPLIERCODE
LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER ON ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID = BUSINESSPARTNER.NUMBERID
GROUP BY SALESORDER.CODE,SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE,SALESORDER.ORDERPARTNERBRANDCODE,ORDERPARTNERBRAND.LONGDESCRIPTION,
SALESORDER.EXTERNALREFERENCE,SALESORDER.INTERNALREFERENCE,SALESORDERLINE.EXTERNALREFERENCE,SALESORDERLINE.INTERNALREFERENCE,SALESORDERLINE.ITEMDESCRIPTION,BUSINESSPARTNER.LEGALNAME1,
SALESORDERLINE.ITEMTYPEAFICODE, SALESORDERLINE.SUBCODE01, SALESORDERLINE.SUBCODE02, SALESORDERLINE.SUBCODE03,
SALESORDERLINE.SUBCODE04, SALESORDERLINE.SUBCODE05, SALESORDERLINE.SUBCODE06, SALESORDERLINE.SUBCODE07,
SALESORDERLINE.SUBCODE08, SALESORDERLINE.SUBCODE09, SALESORDERLINE.SUBCODE10) B
ON A.PROJECTCODE = B.CODE AND 
A.ITEMTYPECODE = B.ITEMTYPEAFICODE AND 
A.DECOSUBCODE01 = B.SUBCODE01 AND
A.DECOSUBCODE02 = B.SUBCODE02 AND
A.DECOSUBCODE03 = B.SUBCODE03 AND
A.DECOSUBCODE04 = B.SUBCODE04 AND
A.DECOSUBCODE05 = B.SUBCODE05 AND
A.DECOSUBCODE06 = B.SUBCODE06 AND
A.DECOSUBCODE07 = B.SUBCODE07 AND
A.DECOSUBCODE08 = B.SUBCODE08 AND
A.DECOSUBCODE09 = B.SUBCODE09 AND
A.DECOSUBCODE10 = B.SUBCODE10
LEFT JOIN 
(SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE, PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE FROM 
PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) C
ON A.LOTCODE=C.PRODUCTIONORDERCODE
LEFT JOIN (
SELECT
	USERGENERICGROUP.CODE,
	USERGENERICGROUP.LONGDESCRIPTION AS COLOR
FROM
	USERGENERICGROUP USERGENERICGROUP
WHERE USERGENERICGROUP.USERGENERICGROUPTYPECODE='CL1') D ON
A.DECOSUBCODE05 = D.CODE
LEFT JOIN 
(SELECT DESIGN.SUBCODE01, DESIGNCOMPONENT.VARIANTCODE, DESIGNCOMPONENT.SHORTDESCRIPTION AS COLOR_PRT
FROM DESIGN DESIGN LEFT JOIN DESIGNCOMPONENT DESIGNCOMPONENT ON DESIGN.NUMBERID = DESIGNCOMPONENT.DESIGNNUMBERID AND 
DESIGN.SUBCODE01 = DESIGNCOMPONENT.DESIGNSUBCODE01) E
ON A.DECOSUBCODE07 = E.SUBCODE01 AND A.DECOSUBCODE08 = E.VARIANTCODE 
LEFT JOIN 
(SELECT PRODUCT.ITEMTYPECODE, PRODUCT.SUBCODE01, PRODUCT.SUBCODE02, PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05,
CASE 
	WHEN LOCATE('-', PRODUCT.SHORTDESCRIPTION) = 0 THEN ''
	WHEN LOCATE('-', PRODUCT.SHORTDESCRIPTION) > 0 THEN SUBSTR(PRODUCT.SHORTDESCRIPTION , 1, LOCATE('-', PRODUCT.SHORTDESCRIPTION)-1)
	ELSE ''
END AS COLOR_FKF
FROM PRODUCT PRODUCT WHERE PRODUCT.ITEMTYPECODE='FKF') F
ON A.ITEMTYPECODE = F.ITEMTYPECODE AND A.DECOSUBCODE01 = F.SUBCODE01 AND A.DECOSUBCODE02 = F.SUBCODE02 AND 
A.DECOSUBCODE03 = F.SUBCODE03 AND A.DECOSUBCODE04 = F.SUBCODE04 AND A.DECOSUBCODE05 = F.SUBCODE05
LEFT JOIN 
(SELECT 
ORDERITEMORDERPARTNERLINK.ORDPRNCUSTOMERSUPPLIERCODE,
ORDERITEMORDERPARTNERLINK.ITEMTYPEAFICODE,
ORDERITEMORDERPARTNERLINK.SUBCODE01,
ORDERITEMORDERPARTNERLINK.SUBCODE02,
ORDERITEMORDERPARTNERLINK.SUBCODE03,
ORDERITEMORDERPARTNERLINK.SUBCODE04,
ORDERITEMORDERPARTNERLINK.SUBCODE05,
ORDERITEMORDERPARTNERLINK.SUBCODE06,
ORDERITEMORDERPARTNERLINK.SUBCODE07,
ORDERITEMORDERPARTNERLINK.SUBCODE08,
ORDERITEMORDERPARTNERLINK.SUBCODE09,
ORDERITEMORDERPARTNERLINK.SUBCODE10,
ORDERITEMORDERPARTNERLINK.LONGDESCRIPTION AS NO_ITEM FROM ORDERITEMORDERPARTNERLINK ORDERITEMORDERPARTNERLINK) G 
ON B.ORDPRNCUSTOMERSUPPLIERCODE = G.ORDPRNCUSTOMERSUPPLIERCODE AND 
A.ITEMTYPECODE = G.ITEMTYPEAFICODE AND 
A.DECOSUBCODE01 = G.SUBCODE01 AND 
A.DECOSUBCODE02 = G.SUBCODE02 AND 
A.DECOSUBCODE03 = G.SUBCODE03 AND 
A.DECOSUBCODE04 = G.SUBCODE04 AND 
A.DECOSUBCODE05 = G.SUBCODE05 AND 
A.DECOSUBCODE06 = G.SUBCODE06 AND 
A.DECOSUBCODE07 = G.SUBCODE07 AND 
A.DECOSUBCODE08 = G.SUBCODE08 AND 
A.DECOSUBCODE09 = G.SUBCODE09 AND 
A.DECOSUBCODE10 = G.SUBCODE10
LEFT JOIN (
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
	ADSTORAGE.VALUEDECIMAL
FROM
	PRODUCT PRODUCT
LEFT JOIN ADSTORAGE ADSTORAGE ON
	PRODUCT.ABSUNIQUEID = ADSTORAGE.UNIQUEID
WHERE
	ADSTORAGE.NAMENAME = 'GSM'
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
	PRODUCT.SUBCODE10,
	ADSTORAGE.VALUEDECIMAL) I 
ON A.DECOSUBCODE01 = I.SUBCODE01 AND 
A.DECOSUBCODE02 = I.SUBCODE02 AND 
A.DECOSUBCODE03 = I.SUBCODE03 AND 
A.DECOSUBCODE04 = I.SUBCODE04 AND 
A.DECOSUBCODE05 = I.SUBCODE05 AND 
A.DECOSUBCODE06 = I.SUBCODE06 AND 
A.DECOSUBCODE07 = I.SUBCODE07 AND 
A.DECOSUBCODE08 = I.SUBCODE08 AND 
A.DECOSUBCODE09 = I.SUBCODE09 AND 
A.DECOSUBCODE10 = I.SUBCODE10
LEFT JOIN (
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
	ADSTORAGE.VALUEDECIMAL
FROM
	PRODUCT PRODUCT
LEFT JOIN ADSTORAGE ADSTORAGE ON
	PRODUCT.ABSUNIQUEID = ADSTORAGE.UNIQUEID
WHERE
	ADSTORAGE.NAMENAME = 'Width'
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
	PRODUCT.SUBCODE10,
	ADSTORAGE.VALUEDECIMAL) J ON 
A.DECOSUBCODE01 = J.SUBCODE01 AND 
A.DECOSUBCODE02 = J.SUBCODE02 AND 
A.DECOSUBCODE03 = J.SUBCODE03 AND 
A.DECOSUBCODE04 = J.SUBCODE04 AND 
A.DECOSUBCODE05 = J.SUBCODE05 AND 
A.DECOSUBCODE06 = J.SUBCODE06 AND 
A.DECOSUBCODE07 = J.SUBCODE07 AND 
A.DECOSUBCODE08 = J.SUBCODE08 AND 
A.DECOSUBCODE09 = J.SUBCODE09 AND 
A.DECOSUBCODE10 = J.SUBCODE10
WHERE TRIM(A.LOTCODE)='$lotcode' LIMIT 1";
$stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
$cekdb2= db2_num_rows($stmt);
$rowdb2 = db2_fetch_assoc($stmt);
$posg=strpos($rowdb2['GRAMASI'],".");
$valgramasi=substr($rowdb2['GRAMASI'],0,$posg);
$posl=strpos($rowdb2['LEBAR'],".");
$vallebar=substr($rowdb2['LEBAR'],0,$posl);

//$sqlCek=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE nodemand='$nodemand' and no_ncp='$NCPNO' ORDER BY id DESC LIMIT 1");
//$cek=mysqli_num_rows($sqlCek);
//$rcek=mysqli_fetch_array($sqlCek);

?>
<div class="row">
	<div class="col-xs-6">
  		<div class="box box-info">
   			<div class="box-header with-border">
    			<h3 class="box-title">Stiker Custom</h3>
    			<div class="box-tools pull-right">
      				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    			</div>
  			</div>
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div class="box-body"> 
					<div class="col-md-12"> 
						<div class="form-group">
							<label for="lotcode" class="col-sm-2 control-label">No KK ERP</label>
							<div class="col-sm-4">
								<input name="lotcode" type="text" class="form-control" id="lotcode" 
								onchange="window.location='StikerCustom-'+this.value" value="<?php echo $_GET['lotcode'];?>" placeholder="No KK ERP" required >
							</div>
							<label for="demand" class="col-sm-2 control-label">No Demand</label>
							<div class="col-sm-4">
								<input name="demand" type="text" class="form-control" id="demand" 
								value="<?php if($cekdb2>0){echo $rowdb2['DEMAND'];}else{} ?>" placeholder="No Demand" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="pelanggan" class="col-sm-2 control-label">Pelanggan</label>
							<div class="col-sm-8">
								<input name="pelanggan" type="text" class="form-control" id="no_po" 
								value="<?php if($cekdb2>0){echo $rowdb2['LANGGANAN']."/".$rowdb2['BUYER'];}else{}?>" placeholder="Pelanggan" >
							</div>				   
						</div>
						<div class="form-group">
							<label for="no_order" class="col-sm-2 control-label">No Order</label>
								<div class="col-sm-4">
								<input name="no_order" type="text" class="form-control" id="no_order" 
								value="<?php if($cekdb2>0){echo $rowdb2['NO_ORDER'];}else{} ?>" placeholder="No Order" required>
							</div>				   
						</div>
						<div class="form-group">
							<label for="no_po" class="col-sm-2 control-label">PO</label>
								<div class="col-sm-5">
									<input name="no_po" type="text" class="form-control" id="no_po" 
									value="<?php if($cekdb2>0){echo $rowdb2['PO_NUMBER'];}else{} ?>" placeholder="PO" >
								</div>				   
						</div>
						<div class="form-group">
							<label for="no_hanger" class="col-sm-2 control-label">No Hanger / No Item</label>
								<div class="col-sm-3">
									<input name="no_hanger" type="text" class="form-control" id="no_hanger" 
									value="<?php if($cekdb2>0){echo $rowdb2['DECOSUBCODE02'].''.$rowdb2['DECOSUBCODE03'];}else{}?>" placeholder="No Hanger">  
								</div>
								<div class="col-sm-3">
									<input name="no_item" type="text" class="form-control" id="no_item" 
									value="<?php if($cekdb2>0){echo $rowdb2['NO_ITEM'];}else{}?>" placeholder="No Item">
								</div>	
						</div>
						<div class="form-group">
							<label for="jns_kain" class="col-sm-2 control-label">Jenis Kain</label>
								<div class="col-sm-8">
									<textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cekdb2>0){echo $rowdb2['JENIS_KAIN'];} else{}?></textarea>
								</div>
						</div>	 		
						<div class="form-group">
							<label for="l_g" class="col-sm-2 control-label">Lebar X Gramasi</label>
							<div class="col-sm-2">
								<input name="lebar" type="text" class="form-control" id="lebar" 
								value="<?php if($cekdb2>0){echo $vallebar;} ?>" placeholder="0" required>
							</div>
							<div class="col-sm-2">
								<input name="grms" type="text" class="form-control" id="grms" 
								value="<?php if($cekdb2>0){echo $valgramasi;} ?>" placeholder="0" required>
							</div>		
						</div>
						<div class="form-group">
							<label for="warna" class="col-sm-2 control-label">Warna</label>
							<div class="col-sm-8">
								<textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($cekdb2>0){echo $rowdb2['WARNA'];}else{}?></textarea>
							</div>				   
						</div>
						<div class="form-group">
							<label for="no_warna" class="col-sm-2 control-label">No Warna</label>
							<div class="col-sm-8">
								<textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if($cekdb2>0){echo $rowdb2['NO_WARNA'];}else{}?></textarea>
							</div>				   
						</div>		 
					</div>
				</div>
				<div class="box-footer">
				<?php if($_GET['lotcode']!=""){ ?> 	
					
				<?php } ?>	   
				</div>
					<!-- /.box-footer -->
			</form>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="box box-info">
   			<div class="box-header with-border">
    			<h3 class="box-title">Elements</h3>
    			<div class="box-tools pull-right">
      				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    			</div>
  			</div>
			<div class="box-body">
				<table id="example5" width="100%" class="table table-sm table-bordered table-hover" style="font-size: 12px;">
					<thead class="btn-info">
					<tr>
						<th width="26%"><div align="center">SN</div></th>
						<th width="23%"><div align="center">Berat</div></th>
						<th width="21%"><div align="center">Panjang</div></th>
						<th width="16%"><div align="center">Tempat</div></th>
						<th width="16%"><div align="center">Aksi</div></th>
					</tr>
					</thead>
					<tbody>
					<?php
					$sqlBL 	= "SELECT 
							STOCKTRANSACTION.ITEMELEMENTCODE,
							STOCKTRANSACTION.BASEPRIMARYQUANTITY,
							STOCKTRANSACTION.BASEPRIMARYUOMCODE,
							STOCKTRANSACTION.BASESECONDARYQUANTITY,
							STOCKTRANSACTION.BASESECONDARYUOMCODE,
							STOCKTRANSACTION.WHSLOCATIONWAREHOUSEZONECODE,
							STOCKTRANSACTION.WAREHOUSELOCATIONCODE
						FROM STOCKTRANSACTION STOCKTRANSACTION 
						WHERE STOCKTRANSACTION.LOTCODE  ='$lotcode' AND STOCKTRANSACTION.DETAILTYPE ='0' AND STOCKTRANSACTION.LOGICALWAREHOUSECODE = 'M031' ORDER BY STOCKTRANSACTION.ITEMELEMENTCODE ASC";
					$stmt2=db2_exec($conn1,$sqlBL, array('cursor'=>DB2_SCROLLABLE));
					while($rowBL = db2_fetch_assoc($stmt2)){
							?>	
					<tr align="center">
						<td align="center"><?php echo $rowBL['ITEMELEMENTCODE'];?></td>
						<td align="center"><?php echo number_format($rowBL['BASEPRIMARYQUANTITY'],2)." ".$rowBL['BASEPRIMARYUOMCODE'];?></td>
						<td align="center"><?php echo number_format($rowBL['BASESECONDARYQUANTITY'],2)." ".$rowBL['BASESECONDARYUOMCODE'];?></td>
						<td><?php echo $rowBL['WHSLOCATIONWAREHOUSEZONECODE']."-".$rowBL['WAREHOUSELOCATIONCODE'];?></td>
						<td align="center">
							<?php if($_SESSION['lvl_id']!="AFTERSALES"){?><a href="pages/cetak/cetak-stiker-custom2.php?lotcode=<?php echo $_GET['lotcode']; ?>&elements=<?php echo $rowBL['ITEMELEMENTCODE']; ?>" class="btn btn-primary <?php if($_GET['lotcode']=="") { echo "disabled"; }?>" target="_blank">Cetak Stiker</a> <?php }?>
							<?php if($_SESSION['lvl_id']=="AFTERSALES"){?><a href="pages/cetak/cetak-stiker-custom3.php?lotcode=<?php echo $_GET['lotcode']; ?>&elements=<?php echo $rowBL['ITEMELEMENTCODE']; ?>" class="btn btn-success <?php if($_GET['lotcode']=="") { echo "disabled"; }?>" target="_blank">Cetak Stiker</a> <?php }?>
						</td>
					</tr>
					<?php 
					$toyard=$toyard+$rowBL['BASESECONDARYQUANTITY'];
					$toqty=$toqty+$rowBL['BASEPRIMARYQUANTITY'];
					$troll +=1;
					$no++;} ?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>	