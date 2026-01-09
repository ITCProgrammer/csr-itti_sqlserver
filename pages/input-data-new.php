<style>
   
    #hiddenInputs {
      display: none;
    }
	</style>
	
	 <style>
   .newbonpenghubung {
     
      width: 100%;
      margin: 20px;
	  border:solid thin #ddd;
	 
    }

    .newbonpenghubung th, .newbonpenghubung td {
     
      padding: 6px;
      text-align: left;
    }

    .newbonpenghubung th {
      background-color: #4CAF50;
      color: white;
    }

    

    .newbonpenghubung input {
      width: 100%;
      box-sizing: border-box;
      padding: 5px; /* Lebih besar padding untuk input */
      margin: 5px 0;
      border: 1px solid #ccc; /* Warna border */
      border-radius: 4px; /* Sudut border membulat */
      transition: border-color 0.3s; /* Efek transisi warna border saat dihover */
    }

    .newbonpenghubung input:focus {
      border-color: #4CAF50; /* Warna border saat input di-focus */
      outline: none; /* Hilangkan outline bawaan browser saat di-focus */
    }
  </style>

<?php
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";  
$nodemand=$_GET['nodemand'];
/*$sqlDB2="SELECT ITXVIEWINPUTDATAADMQC.* FROM ITXVIEWINPUTDATAADMQC ITXVIEWINPUTDATAADMQC
		WHERE ITXVIEWINPUTDATAADMQC.DEMANDNO='$nodemand'";*/
$sqlDB2="SELECT
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
	p.DESCRIPTION,
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
$stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
$rowdb2 = db2_fetch_assoc($stmt);

//$sqlDB20=" 
//SELECT
//		a.CODE,
//		a2.ORDERLINE,
//		CASE
//		WHEN a.EXTERNALREFERENCE IS NULL THEN a2.EXTERNALREFERENCE
//		ELSE a.EXTERNALREFERENCE
//		END AS PO_NUMBER,
//		a2.ITEMDESCRIPTION,
//		a.ORDERPARTNERBRANDCODE ,
//		b.LONGDESCRIPTION AS BUYER,
//		c.LONGDESCRIPTION AS ITEM
//	FROM
//		SALESORDER a
//	LEFT OUTER JOIN SALESORDERLINE a2 ON
//		a.CODE = a2.SALESORDERCODE
//	LEFT OUTER JOIN ORDERPARTNERBRAND b ON
//		a.ORDERPARTNERBRANDCODE = b.CODE
//	LEFT OUTER JOIN ORDERITEMORDERPARTNERLINK c ON
//		a.ORDPRNCUSTOMERSUPPLIERCODE = c.ORDPRNCUSTOMERSUPPLIERCODE
//		AND a2.ITEMTYPEAFICODE = c.ITEMTYPEAFICODE
//		AND 
//	a2.SUBCODE01 = c.SUBCODE01
//		AND a2.SUBCODE02 = c.SUBCODE02
//		AND a2.SUBCODE03 = c.SUBCODE03
//		AND
//	a2.SUBCODE04 = c.SUBCODE04
//		AND a2.SUBCODE05 = c.SUBCODE05
//		AND a2.SUBCODE06 = c.SUBCODE06
//		AND 
//	a2.SUBCODE07 = c.SUBCODE07
//		AND a2.SUBCODE08 = c.SUBCODE08
//		AND a2.SUBCODE09 = c.SUBCODE09
//		AND 
//	a2.SUBCODE10 = c.SUBCODE10
//	WHERE a.CODE='".$rowdb2['PRO_ORDER']."' AND a2.ORDERLINE = '".$rowdb2['ORDERLINE']."' 
//	GROUP BY
//		a.CODE,
//		a.EXTERNALREFERENCE,
//		a2.ORDERLINE,
//		a2.EXTERNALREFERENCE,
//		a2.ITEMDESCRIPTION,
//		a.ORDERPARTNERBRANDCODE ,
//		b.LONGDESCRIPTION,
//		c.LONGDESCRIPTION
//";
//$stmt0=db2_exec($conn1,$sqlDB20, array('cursor'=>DB2_SCROLLABLE));
//$rowdb20 = db2_fetch_assoc($stmt0);

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

$sqlDB21=" 
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
	PRODUCT.SUBCODE01='".$rowdb2['SUBCODE01']."' AND
	PRODUCT.SUBCODE02='".$rowdb2['SUBCODE02']."' AND
	PRODUCT.SUBCODE03='".$rowdb2['SUBCODE03']."' AND
	PRODUCT.SUBCODE04='".$rowdb2['SUBCODE04']."' AND
	PRODUCT.SUBCODE05='".$rowdb2['SUBCODE05']."' AND
	PRODUCT.SUBCODE06='".$rowdb2['SUBCODE06']."' AND
	PRODUCT.SUBCODE07='".$rowdb2['SUBCODE07']."' AND
	PRODUCT.SUBCODE08='".$rowdb2['SUBCODE08']."' AND
	PRODUCT.SUBCODE09='".$rowdb2['SUBCODE09']."' AND
	PRODUCT.SUBCODE10='".$rowdb2['SUBCODE10']."'
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
$stmt1=db2_exec($conn1,$sqlDB21, array('cursor'=>DB2_SCROLLABLE));
$rowdb21 = db2_fetch_assoc($stmt1);

$sqlroll="SELECT
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
$stmt1=db2_exec($conn1,$sqlroll, array('cursor'=>DB2_SCROLLABLE));
$rowr = db2_fetch_assoc($stmt1);

$sqlkg="
SELECT
        PRODUCTIONRESERVATION.ORDERCODE,
        PRODUCTIONRESERVATION.ITEMTYPEAFICODE,
        SUM(PRODUCTIONRESERVATION.USERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY
    FROM
        PRODUCTIONRESERVATION PRODUCTIONRESERVATION
    WHERE
        PRODUCTIONRESERVATION.ITEMTYPEAFICODE = 'KGF' AND
        PRODUCTIONRESERVATION.PRODUCTIONORDERCODE = '$rowdb2[PRODUCTIONORDERCODE]'
    GROUP BY
        PRODUCTIONRESERVATION.ORDERCODE,
        PRODUCTIONRESERVATION.ITEMTYPEAFICODE";
$stmtkg1=db2_exec($conn1,$sqlkg, array('cursor'=>DB2_SCROLLABLE));
$rowkg = db2_fetch_assoc($stmtkg1);

$sqlwarna="
SELECT
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
    ITXVIEWCOLOR.SUBCODE01 = '".$rowdb2['SUBCODE01']."' AND 
    ITXVIEWCOLOR.SUBCODE02 = '".$rowdb2['SUBCODE02']."' AND 
    ITXVIEWCOLOR.SUBCODE03 = '".$rowdb2['SUBCODE03']."' AND 
    ITXVIEWCOLOR.SUBCODE04 = '".$rowdb2['SUBCODE04']."' AND 
    ITXVIEWCOLOR.SUBCODE05 = '".$rowdb2['SUBCODE05']."' AND 
    ITXVIEWCOLOR.SUBCODE06 = '".$rowdb2['SUBCODE06']."' AND 
    ITXVIEWCOLOR.SUBCODE07 = '".$rowdb2['SUBCODE07']."' AND 
    ITXVIEWCOLOR.SUBCODE08 = '".$rowdb2['SUBCODE08']."'
";
$stmtwarna1=db2_exec($conn1,$sqlwarna, array('cursor'=>DB2_SCROLLABLE));
$rowwarna = db2_fetch_assoc($stmtwarna1);

/*$sqlroll="SELECT 
STOCKTRANSACTION.ORDERCODE,
COUNT(STOCKTRANSACTION.ITEMELEMENTCODE) AS JML_ROLL
FROM STOCKTRANSACTION STOCKTRANSACTION
WHERE STOCKTRANSACTION.ORDERCODE ='$rowdb2[PRODUCTIONORDERCODE]' AND STOCKTRANSACTION.TEMPLATECODE ='120'
AND STOCKTRANSACTION.ITEMTYPECODE ='KGF'
GROUP BY 
STOCKTRANSACTION.ORDERCODE";
$stmt1=db2_exec($conn1,$sqlroll, array('cursor'=>DB2_SCROLLABLE));
$rowr = db2_fetch_assoc($stmt1);*/

$sqlpack=mysqli_query($con,"SELECT
	tgl_mulai,jam_mulai,jml_netto,netto,panjang,satuan
FROM
	`tbl_lap_inspeksi`
WHERE
	`nodemand` = '$nodemand'
AND `dept` = 'PACKING'
ORDER BY id DESC LIMIT 1");
			$sPack=mysqli_fetch_array($sqlpack);
		$sqlinsp=mysqli_query($con,"SELECT
	tgl_update,jam_mutasi,jml_netto,netto,panjang
FROM
	`tbl_lap_inspeksi`
WHERE
	`nodemand` = '$nodemand'
AND `dept` = 'INSPEK MEJA'
ORDER BY id DESC LIMIT 1");
			$sInsp=mysqli_fetch_array($sqlinsp);
$sqlwarna=mysqli_query($con,"SELECT
	tgl_update,jam_update,tgl_cwarna,`status`
FROM
	`tbl_lap_inspeksi`
WHERE
	`nodemand` = '$nodemand'
AND `dept` = 'QCF'
ORDER BY id DESC LIMIT 1");
			$sWarna=mysqli_fetch_array($sqlwarna);

$sqlCek=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE nodemand='$nodemand' LIMIT 1");
$cek=mysqli_num_rows($sqlCek);



$sqlManual=mysqli_query($con,"SELECT * FROM tbl_lap_inspeksi WHERE nodemand='$nodemand' LIMIT 1");
$cekM=mysqli_fetch_array($sqlManual);
$rcek=mysqli_fetch_array($sqlCek);
$sqlD=mysqli_query($con,"SELECT GROUP_CONCAT(CONCAT(persen, '%') SEPARATOR '; ') as persen, GROUP_CONCAT(dept SEPARATOR '; ') as dept FROM tbl_qcf_detail WHERE id_qcf='$rcek[id]'");
$rcekd=mysqli_fetch_array($sqlD);
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
				  	<input name="nodemand" type="text" class="form-control" id="nodemand" 
                     onchange="window.location='InputDataNew-'+this.value" value="<?php echo $_GET['nodemand'];?>" placeholder="No Demand" required >
		  		</div>
				  <input name="nokk" type="hidden" class="form-control" id="nokk" placeholder="No Prod. Order"
						value="<?php if($cek>0){echo $rcek['nokk'];}else{echo $rowdb2['PRODUCTIONORDERCODE'];} ?>" >
        </div>
	    <div class="form-group">
            <label for="no_order" class="col-sm-3 control-label">No Order</label>
                <div class="col-sm-4">
                    <input name="no_order" type="text" class="form-control" id="no_order" 
                    value="<?php if($cek>0){echo $rcek['no_order'];}else{if($rowdb2['PRO_ORDER']!=""){echo $rowdb2['PRO_ORDER'];}} ?>" placeholder="No Order" required>
                </div>				   
        </div>
	    <div class="form-group">
            <label for="no_po" class="col-sm-3 control-label">PO</label>
                <div class="col-sm-5">
                    <input name="no_po" type="text" class="form-control" id="no_po" 
                    value="<?php if($cek>0){echo $rcek['no_po'];}else{echo $rowdb20['PO_NUMBER'];} ?>" placeholder="PO" >
                </div>				   
        </div>
		<div class="form-group">
            <label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
                <div class="col-sm-3">
                    <input name="no_hanger" type="text" class="form-control" id="no_hanger" 
                    value="<?php if($cek>0){echo $rcek['no_hanger'];}else{if($rowdb2['ITEMNO']!=""){echo $rowdb2['ITEMNO'];}}?>" placeholder="No Hanger">  
                </div>
				<div class="col-sm-3">
				  	<input name="no_item" type="text" class="form-control" id="no_item" 
                    value="<?php if($rcek['no_item']!=""){echo $rcek['no_item'];}else if($rowdb20['NO_ITEM']!=""){echo $rowdb20['NO_ITEM'];} ?> " placeholder="No Item">
				</div>	
    	</div>
	            <div class="form-group">
                  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
                  <div class="col-sm-8">
					  <textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cek>0){echo $rcek['jenis_kain'];}else{echo stripslashes($rowdb20['ITEMDESCRIPTION']);}?></textarea>
					  </div>
                  </div>
		        <div class="form-group">
                  <label for="styl" class="col-sm-3 control-label">Style</label>
                  <div class="col-sm-8">
                    <input name="styl" type="text" class="form-control" id="styl" 
                    value="<?php if($cek>0){echo $rcek['styl'];}else{echo $rowdb20['DATA_STYLE'];} ?>" placeholder="Style">
                  </div>				   
                </div>
		    <div class="form-group">
                  <label for="qty_order" class="col-sm-3 control-label">Qty Order</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="qty1" type="text" class="form-control" id="qty1" 
                    value="<?php if($cek>0){echo $rcek['berat_order'];}else{echo round($rowdb20['QTY_ORDER'],2);} ?>" placeholder="0.00" required>
					  <span class="input-group-addon">KGs</span></div>  
                  </div>
				  <div class="col-sm-4">
					<div class="input-group">  
                    <input name="qty2" type="text" class="form-control" id="qty2" 
                    value="<?php if($cek>0){echo $rcek['panjang_order'];}else{echo round($rowdb20['QTY_PANJANG_ORDER'],2);}?>" placeholder="0.00" style="text-align: right;" required>
                    <span class="input-group-addon">
							  <select name="satuan1" style="font-size: 12px;">
								  <option value="Yard" <?php if($rowdb2['QTY_PANJANG_ORDER_UOM']=="yd"){ echo "SELECTED"; }?>>Yard</option>
								  <option value="Meter" <?php if($rowdb2['QTY_PANJANG_ORDER_UOM']=="m"){ echo "SELECTED"; }?>>Meter</option>
								  <option value="PCS" <?php if($rowdb2['QTY_PANJANG_ORDER_UOM']=="un"){ echo "SELECTED"; }?>>PCS</option>
							  </select>
					    </span>
					</div>	
                  </div>		
                </div>
		 		<div class="form-group">
                  <label for="jml_bruto" class="col-sm-3 control-label">Jml Bruto</label>
                  <div class="col-sm-2">
                    <input name="qty3" type="text" class="form-control" id="qty3" 
                    value="<?php if($cek>0){echo $rcek['rol_bruto'];}else{if ($rowr['JML_ROLL'] != 0) {echo $rowr['JML_ROLL'];}} ?>" placeholder="0.00" required>
                  </div>
				  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="qty4" type="text" class="form-control" id="qty4" 
                    value="<?php if($cek>0){echo $rcek['berat_bruto'];}else{echo number_format($rowkg['USERPRIMARYQUANTITY'],'2','.','');} ?>" placeholder="0.00" style="text-align: right;" required>
                    <span class="input-group-addon">KGs</span>
					</div>	
                  </div>		
                </div>
		 		<div class="form-group">
                  <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
                  <div class="col-sm-2">
                    <input name="lebar" type="text" class="form-control" id="lebar" 
                    value="<?php if($cek>0){echo $rcek['lebar'];}else{echo round($rowdb21['WIDTH']);} ?>" placeholder="0" required>
                  </div>
				  <div class="col-sm-2">
                    <input name="grms" type="text" class="form-control" id="grms" 
                    value="<?php if($cek>0){echo $rcek['gramasi'];}else{echo round($rowdb21['GSM']);} ?>" placeholder="0" required>
                  </div>		
                </div>
		 		<div class="form-group">
                  <label for="warna" class="col-sm-3 control-label">Warna</label>
                  <div class="col-sm-8">
                    <textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($cek>0){echo $rcek['warna'];}else{echo stripslashes($rowdb2['WARNA']);}?></textarea>
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
                  <div class="col-sm-8">
                    <textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if($cek>0){echo $rcek['no_warna'];}else{echo stripslashes($rowdb2['NO_WARNA']);}?></textarea>
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="lot" class="col-sm-3 control-label">Lot</label>
                  <div class="col-sm-3">
                    <input name="lot" type="text" class="form-control" id="lot" 
                    value="<?php if($cek>0){echo $rcek['lot'];}else{ echo $rowdb2['PRODUCTIONORDERCODE'];} ?>" placeholder="Lot" >
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="rol_mslh" class="col-sm-3 control-label">Rol</label>
                  <div class="col-sm-2">
                    <input name="rol" type="text" class="form-control" id="rol" 
                    value="<?php if($cek>0){echo $rcek['rol'];}else{ echo $rowdb2['TOTAL_ROLL_PACKING'];}?>" placeholder="0" >
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="netto" class="col-sm-3 control-label">Netto</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="netto" type="text" class="form-control" id="netto" 
                    value="<?php if($cek>0){echo $rcek['netto'];}else{ echo $rowdb2['TOTAL_KG_NETTO_PACKING'];} ?>" placeholder="0.00" style="text-align: right;" >
					<span class="input-group-addon">KG</span>
					</div>		
                  </div>				   
                </div>
		 		<div class="form-group">
                  <label for="panjang" class="col-sm-3 control-label">Panjang</label>
                  <div class="col-sm-4">
					  <div class="input-group">
                    <input name="panjang" type="text" class="form-control" id="panjang" 
                    value="<?php if($cek>0){echo $rcek['panjang'];}else{ echo $rowdb2['TOTAL_YARD_PACKING'];}?>" placeholder="0.00" style="text-align: right;" required>
						  <span class="input-group-addon">
							  <select name="satuan2" style="font-size: 12px;">
								  <option value="Yard" <?php if($rowdb2['LENGTHUOMCODE']=="yd"){ echo "SELECTED"; }?>>Yard</option>
								  <option value="Meter" <?php if($rowdb2['LENGTHUOMCODE']=="m"){ echo "SELECTED"; }?>>Meter</option>
								  <option value="PCS" <?php if($rowdb2['LENGTHUOMCODE']=="un"){ echo "SELECTED"; }?>>PCS</option>
							  </select>
					    </span></div>
					  </div>
                  </div>
				  
				  <!--
				  <div class="form-group">
                  <label for="sales" class="col-sm-3 control-label">Sales Person</label>
                  <div class="col-sm-8">
                    <input name="sales" type="text" class="form-control" id="sales" 
                    value="<?php if($cek>0 AND $rcek['sales']!=NULL){echo $rcek['sales'];}else if($rowdb20['CREATIONUSER']!=""){echo $rowdb20['CREATIONUSER'];} ?>" placeholder="Sales" readonly>
                  </div>				   
                </div>-->
	  </div>
	  		<!-- col --> 
	  <div class="col-md-6">
	 			 <div class="form-group">
                  	<label for="lot_legacy" class="col-sm-3 control-label">Lot legacy</label>
                	<div class="col-sm-3">
                    	<input name="lot_legacy" type="text" class="form-control" id="lot_legacy" value="<?php if($cek>0){echo $rcek['lot_legacy'];}else{ echo $rowdb2['DESCRIPTION'];} ?>" placeholder="Lot legacy" >
                  	</div>
				 </div>	
	  			<div class="form-group">
                  <label for="qty_mslh" class="col-sm-3 control-label">Sisa</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="sisa" type="text" class="form-control" id="sisa" 
                    value="<?php if($cek>0){echo $rcek['sisa'];}else{echo $rowdb2['TOTAL_KG_SISA'];}?>" placeholder="0.00" style="text-align: right;">
					<span class="input-group-addon">KG</span>
					</div>		
                  </div>				   
                </div>
				<!--
				<div class="form-group">
                  <label for="finl_g" class="col-sm-3 control-label">Fin Lebar X Gramasi</label>
                  <div class="col-sm-2">
                    <input name="finlebar" type="text" class="form-control" id="finlebar" 
                    value="<?php if($cek>0){echo $rcek['lebar_fin'];}else{echo round($rowdb21['WIDTH']);}?>" placeholder="0" readonly>
                  </div>
				  <div class="col-sm-2">
                    <input name="fingrms" type="text" class="form-control" id="fingrms" 
                    value="<?php if($cek>0){echo $rcek['gramasi_fin'];}else{echo round($rowdb21['GSM']);}?>" placeholder="0" readonly>
                  </div>		
                </div>
				
			<div class="form-group">
						  <label for="insl_g" class="col-sm-3 control-label">Ins Lebar X Gramasi</label>
						  <div class="col-sm-2">
							<input name="inslebar" type="text" class="form-control" id="inslebar" 
							value="<?php if($cek>0){echo $rcek['lebar_ins'];}else{echo round($rowdb21['WIDTH']);}?>" placeholder="0" readonly>
						  </div>
						  <div class="col-sm-2">
							<input name="insgrms" type="text" class="form-control" id="insgrms" 
							value="<?php if($cek>0){echo $rcek['gramasi_ins'];}else{echo round($rowdb21['GSM']);}?>" placeholder="0" readonly>
						  </div>		
			</div>	
					
	  <div class="form-group">
        <label for="tglfin" class="col-sm-3 control-label">Tgl Finishing</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglfin" type="text" class="form-control pull-right" id="datepicker_" placeholder="0000-00-00" value="<?php if($cek>0){echo $rcek['tgl_fin'];}else{echo $rowdb2['TGL_FIN'];}?>" readonly/>
          </div>
        </div>
      </div>
	
	  <div class="form-group">
        <label for="tglins" class="col-sm-3 control-label">Tgl Inspeksi</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglins" type="text" class="form-control pull-right" id="datepicker1_" placeholder="0000-00-00" value="<?php if($cek>0){echo $rcek['tgl_ins'];}else{echo $rowdb2['TGL_INS'];} ?>" readonly/>
          </div>
        </div>
	  </div> 
	  <div class="form-group">
        <label for="tglcwarna" class="col-sm-3 control-label">Tgl Cocok Warna</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglcwarna" type="text" class="form-control pull-right" id="datepicker4_" placeholder="0000-00-00" value="<?php if($cek>0){echo $rcek['tglcwarna'];}else{echo $rowdb2['TGL_CCK_WARNA'];}?>" readonly/>
          </div>
        </div>
		<div class="col-sm-2">
            <input name="jam_cwarna" type="text" class="form-control pull-right" placeholder="00:00" pattern="[0-9]{2}:[0-9]{2}$" title=" e.g 14:25" onkeyup="
		var time = this.value;
		if (time.match(/^\d{2}$/) !== null) {
			this.value = time + ':';
		} else if (time.match(/^\d{2}\:\d{2}$/) !== null) {
			this.value = time + '';
		}" value="<?php if($cek>0){echo $rcek['jam_cwarna'];}else{echo SUBSTR($rowdb2['JAM_CCK_WARNA'],0,5);}?>" readonly size="5" maxlength="5"/>
        </div>
		<font color="red">
		<?php
		$tgl_w=substr($sWarna['tgl_cwarna'],0,10);
		if($cek>0){
		$tgl_warna= new DateTime($rcek['tglcwarna']);
		$tgl_pack= new DateTime($rcek['tgl_pack']);}else{
			$tgl_warna= new DateTime($tgl_w);
			$tgl_pack= new DateTime($sPack['tgl_mulai']);
		}
		$delay = $tgl_warna->diff($tgl_pack); 
		if($delay->days>=3){?> <span class='badge bg-red blink_me'><?php echo "Delay "; echo $delay->days; echo " Hari";?></span> <?php } 
		?></font>
      </div> 
	  <div class="form-group">
        <label for="tglpk" class="col-sm-3 control-label">Tgl Packing</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglpk" type="text" class="form-control pull-right" id="datepicker2_" placeholder="0000-00-00" value="<?php if($cek>0){echo $rcek['tgl_pack'];}else{echo $rowdb2['TGL_PACK'];}?>" readonly/>
          </div>
        </div>
		<div class="col-sm-2">
            <input name="jam_pack" type="text" class="form-control pull-right" placeholder="00:00" pattern="[0-9]{2}:[0-9]{2}$" title=" e.g 14:25" onkeyup="
		var time = this.value;
		if (time.match(/^\d{2}$/) !== null) {
			this.value = time + ':';
		} else if (time.match(/^\d{2}\:\d{2}$/) !== null) {
			this.value = time + '';
		}" value="<?php if($cek>0){echo $rcek['jam_pack'];}else{echo SUBSTR($rowdb2['JAM_PACK'],0,5);}?>" readonly size="5" maxlength="5"/>
        </div>
      </div>-->	
	  <div class="form-group">
        <label for="tglmsk" class="col-sm-3 control-label">Tgl Masuk</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tglmsk" type="text" class="form-control pull-right" id="datepicker3" placeholder="0000-00-00" value="<?php if($cek>0){echo $rcek['tgl_masuk'];}?>" required/>
          </div>
        </div>
	  </div>
	  <!--<div class="form-group">
                  <label for="penyusutan" class="col-sm-3 control-label">Penyusutan</label>
                  <div class="col-sm-3">
					<div class="input-group" style="width: 68%;">  
                    <input name="pp" type="text" class="form-control" id="pp" 
                    value="<?php if($cek>0){echo $rcek['susut_p'];}?>" placeholder="P" style="text-align: right;" required>
					<span class="input-group-addon">%</span>	
					</div>	
                  </div>
				  <div class="col-sm-3">
					<div class="input-group" style="width: 68%;">  
                    <input name="pl" type="text" class="form-control" id="pl" 
                    value="<?php if($cek>0){echo $rcek['susut_l'];}?>" placeholder="L" style="text-align: right;" required>
					<span class="input-group-addon">%</span>
					</div>	
                  </div>
		  		  <div class="col-sm-3">
					<div class="input-group" style="width: 68%;">  
                    <input name="ps" type="text" class="form-control" id="ps" 
                    value="<?php if($cek>0){echo $rcek['susut_s'];}?>" placeholder="S" style="text-align: right;" required>
					<span class="input-group-addon">%</span>
					</div>
                  </div>	
      </div>-->
		  <div class="form-group">
                  <label for="cekwarna" class="col-sm-3 control-label">Cek Warna</label>
                  <div class="col-sm-8">
                    <textarea name="cekwarna" class="form-control" id="cekwarna" placeholder="Cek Warna"><?php if($cek>0){echo $rcek['cek_warna'];}else{echo $sWarna['status'];} ?></textarea>  
                  </div>				   
                </div>
		  <div class="form-group">
                  <label for="extra" class="col-sm-3 control-label">FOC</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="extra" type="text" class="form-control" id="extra" 
                    value="<?php if($cek>0){echo $rcek['berat_extra'];}?>" placeholder="0.00" style="text-align: right;" >
					<span class="input-group-addon">KG</span>
					</div>		
                  </div>	
				<div class="col-sm-4">
					  <div class="input-group">
                    <input name="extra_p" type="text" class="form-control" id="extra_p" 
                    value="<?php if($cek>0){echo $rcek['panjang_extra'];}?>" placeholder="0.00" style="text-align: right;" required>
						  <span class="input-group-addon">
							  <select name="satuan1" style="font-size: 12px;">
								  <option value="Yard" <?php if($sPack['satuan']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
								  <option value="Meter" <?php if($sPack['satuan']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
								  <option value="PCS" <?php if($sPack['satuan']=="PCS"){ echo "SELECTED"; }?>>PCS</option>
							  </select>
					    </span></div>
					  </div>
                </div>
				
		  <div class="form-group">
                  <label for="estimasi" class="col-sm-3 control-label">Estimasi FOC</label>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="estimasi" type="text" class="form-control" id="estimasi" 
                    value="<?php if($cek>0){echo $rcek['estimasi'];}?>" placeholder="0.00" style="text-align: right;" >
					<span class="input-group-addon">KG</span>
					</div>
                  </div>
			      <div class="col-sm-4">
					  <div class="input-group">
                    <input name="estimasi_p" type="text" class="form-control" id="estimasi_p" 
                    value="<?php if($cek>0){echo $rcek['panjang_estimasi'];}?>" placeholder="0.00" style="text-align: right;" required>
						  <span class="input-group-addon">
							  <select name="satuan_est" style="font-size: 12px;">
								  <option value="Yard" <?php if($sPack['satuan']=="Yard"){ echo "SELECTED"; }?>>Yard</option>
								  <option value="Meter" <?php if($sPack['satuan']=="Meter"){ echo "SELECTED"; }?>>Meter</option>
								  <option value="PCS" <?php if($sPack['satuan']=="PCS"){ echo "SELECTED"; }?>>PCS</option>
							  </select>
					    </span></div>
					  </div>
					  <?php if($cek>0){ ?>
						<!-- <a href="DetailData-<?php echo $rcek['id'];?>"><i class="btn btn-success">Detail</i> </a>  -->
						<?php } ?>
                </div>
			
				
				<!--
				<div class="form-group">
					<label for="t_jawab" class="col-sm-3 control-label">Dept. Tanggung Jawab</label>
					<div class="col-sm-8">
					<select class="form-control select2" multiple="multiple" data-placeholder="Dept. Tanggung Jawab" name="t_jawab[]" id="t_jawab">
						<?php
						$dtArr=$rcek['t_jawab'];	
						$data = explode(",",$dtArr);
						$qCek1=mysqli_query($con,"SELECT nama FROM tbl_dept ORDER BY nama ASC");
						$i=0;	
						while($dCek1=mysqli_fetch_array($qCek1)){ ?>
						<option value="<?php echo $dCek1['nama'];?>" <?php if($dCek1['nama']==$data[0] or $dCek1['nama']==$data[1] or $dCek1['nama']==$data[2] or $dCek1['nama']==$data[3] or $dCek1['nama']==$data[4] or $dCek1['nama']==$data[5]){echo "SELECTED";} ?>><?php echo $dCek1['nama'];?></option>
						<?php $i++;} ?>              
					</select>
					</div>
				</div>
				-->
				<!--
				<div class="form-group">
                  <label for="persen" class="col-sm-3 control-label">% Dept. Tanggung Jawab</label>
                  <div class="col-sm-8">
                    <input name="persen" type="text" class="form-control" id="persen" 
                    value="<?php if($cek>0){echo $rcek['persen'];} ?>" placeholder="Contoh: 50,30,20,...(Pemisah Koma dan Tanpa %)">
                  </div>				   
                </div>
				-->
				<!--
				<div class="form-group">
					<label for="sts_pbon" class="col-sm-3 control-label"></label>		  
					<div class="col-sm-4">
						<input type="checkbox" name="sts_pbon" id="sts_pbon" value="1" <?php  if($rcek['sts_pbon']=="1"){ echo "checked";} ?>>  
						<label> Bon Penghubung</label>
					</div>
				</div>
				<div class="form-group">
					<label for="sts_nodelay" class="col-sm-3 control-label"></label>		  
						<div class="col-sm-4">
						<input type="checkbox" name="sts_nodelay" id="sts_nodelay" value="1" <?php  if($rcek['sts_nodelay']=="1"){ echo "checked";} ?>>  
							<label> Tidak Delay</label>
						</div>
        		</div>
				<div class="form-group">
					<label for="sts_tembakdok" class="col-sm-3 control-label"></label>		  
						<div class="col-sm-4">
						<input type="checkbox" name="sts_tembakdok" id="sts_tembakdok" value="1" <?php  if($rcek['sts_tembakdok']=="1"){ echo "checked";} ?>>  
							<label> Tembak Dokumen</label>
						</div>
        		</div>
				-->
		  <!--<div class="form-group">
                  <label for="qty_mslh" class="col-sm-3 control-label">Rol &amp; Qty Masalah</label>
			  	  <div class="col-sm-2">
                    <input name="rol_mslh" type="text" class="form-control" id="rol_mslh" 
                    value="<?php if($cek>0){echo $rcek['rol_mslh'];}?>" placeholder="0" >
                  </div>
                  <div class="col-sm-3">
					<div class="input-group">  
                    <input name="qty_mslh" type="text" class="form-control" id="qty_mslh" 
                    value="<?php if($cek>0){echo $rcek['qty_mslh'];}?>" placeholder="0.00" style="text-align: right;" >
					<span class="input-group-addon">KG</span>
					</div>
				   
            </div>	
        </div>-->		  
	    <div class="form-group">
                  <label for="ket" class="col-sm-3 control-label">Ket</label>
                  <div class="col-sm-8">
                    <textarea name="ket" class="form-control" id="ket" placeholder="Keterangan"><?php if($cek>0){ echo $rcek['ket'];}?></textarea>  
                  </div>				   
          </div>
		  <div class="form-group">
                  <label for="masalah" class="col-sm-3 control-label">Masalah</label>
                  <div class="col-sm-7">
				  <textarea name="masalah" class="form-control" id="masalah" placeholder="Masalah"><?php if($cek>0){ echo $rcek['masalah'];}?></textarea>  
                  </div><?php if($cek>0){ ?>	
<!--				  
   <a href="#" data-toggle="modal" data-target="#myModal"><i class="btn btn-info pull-right">Send to Email</i> </a>
   -->
   <?php } ?>				   
          </div>
		  <input type="hidden" value="<?php if($cek>0){echo $rcek['pelanggan'];}else{echo $rowdb2['LANGGANAN']."/".$rowdb20['BUYER'];}?>" name="pelanggan">
		  <input type="hidden" value="<?php if($cek>0){echo $rcek['no_ko'];}else{echo $rKO['KONo'];}?>" name="no_ko">
		  <input type="hidden" value="<?php if($cek>0){echo $rcek['tgl_delivery'];}else{echo $rowdb2['DELIVERYDATE'];}?>" name="tgl_delivery">
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	
	 
	 
  
    

<?php if($cek>0){
	if ($rcek['penghubung_masalah'] !='' or  $rcek['penghubung_keterangan'] !='' or $rcek['penghubung_roll1'] !='' 
	   or $rcek['penghubung_roll2'] !='' or  $rcek['penghubung_roll3'] !=''      or $rcek['penghubung_roll4'] !='' 
	   or $rcek['penghubung_dep']   !='' or  $rcek['penghubung_dep_persen'] !=''
	) {
		$cek_penghubung = '1';
	} else {
		$cek_penghubung = '0';
	}
	
} ?>

<label>New Bon Penghubung</label>

<input type="radio" id="showInput0" onchange="toggleInputs(0)" name="show_input" value="0" >OFF
&nbsp;&nbsp;&nbsp;
 <input type="radio" id="showInput1" onchange="toggleInputs(1)" name="show_input" value="1" >
<?php if($cek_penghubung==1) {
	echo 'Ubah Bon Penghubung';
} else {
	echo '>=1';
}?>
 

<div id="hiddenInput1" class="hiddenContent" style="<?php echo $cek == '1' ? 'display:block;' : 'display:none;'; ?>">
	<?php include('penghubung1.php');?>
	<?php include('penghubung2.php');?>
	<?php include('penghubung3.php');?>
 </div>
 
  </div>

<script>
	// Set nilai default radio button dan sembunyikan kontennya
	var defaultRadioButton = document.getElementById('showInput0');
	defaultRadioButton.checked = true;

	var allHiddenInputs = document.querySelectorAll('.hiddenContent');
	allHiddenInputs.forEach(function (element) {
	element.style.display = 'none';
	});

	function toggleInputs(value) {
	// Menyembunyikan semua konten terlebih dahulu
	var allHiddenInputs = document.querySelectorAll('.hiddenContent');
	allHiddenInputs.forEach(function (element) {
	element.style.display = 'none';
	});

	// Menampilkan konten yang sesuai dengan nilai radio button yang dipilih
	if (value > 0) {
	var selectedInput = document.getElementById('hiddenInput' + value);
	if (selectedInput) {
	selectedInput.style.display = 'block';
	}
	}
	}
</script>

	
</div>	 
   <div class="box-footer">

   <?php if($cek>0){ ?>
		<button type="submit" class="btn btn-primary pull-right" name="update" value="update">Ubah <i class="fa fa-edit"></i></button>
   <?php }else{ ?>	   
   <button type="submit" class="btn btn-primary pull-right" name="save" value="save">Simpan <i class="fa fa-save"></i></button> 
   <?php } ?>
   
   </div>
    <!-- /.box-footer -->
  




</div>
</form>
<div class="modal fade modal-3d-slit" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 85%;">
				<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Email</h4>
						
                    </div>
                    <div class="modal-body">
			<div class="form-group">
                <input type="text" class="form-control" placeholder="Subject:" name="subjek" required>
			</div>
			<div class="form-group">				
                <input type="email"  class="form-control" name="untuk" placeholder="Email:">
			</div>
			<div class="form-group">
                <input type="email"  class="form-control" name="untuk1" placeholder="Email:">
			</div>
			<div class="form-group">
                <input type="email"  class="form-control" name="untuk2" placeholder="Email:">
			</div>			
			<div class="form-group">			
				<div class="checkbox">
                      <label>
                        <input type="checkbox" value="1" name="ckqc" checked required> Dept QC
                      </label>&nbsp;&nbsp;&nbsp;
            	      <label>
                        <input type="checkbox" value="1" name="ckfin"> Dept Fin
                      </label>&nbsp;&nbsp;&nbsp;
					  <label>
                        <input type="checkbox" value="1" name="ckbrs"> Dept Brs
                      </label>&nbsp;&nbsp;&nbsp;
					  <label>
                        <input type="checkbox" value="1" name="ckdye"> Dept Dye
                      </label>&nbsp;&nbsp;&nbsp;
					  <label>
                        <input type="checkbox" value="1" name="ckprt"> Dept Prt
                      </label>&nbsp;&nbsp;&nbsp;
					  <label>
                        <input type="checkbox" value="1" name="ckknt"> Dept Knt
                      </label>&nbsp;&nbsp;&nbsp;
					  <label>
                        <input type="checkbox" value="1" name="ckrmp"> Dept Rmp
                      </label>&nbsp;&nbsp;&nbsp;
					  <label>
                        <input type="checkbox" value="1" name="ckbun"> Bun Bun Team
                      </label>&nbsp;&nbsp;&nbsp;
					  <label>
                        <input type="checkbox" value="1" name="ckheri"> Heri Team
                      </label>&nbsp;&nbsp;&nbsp;
					  <!--<label>
                        <input type="checkbox" value="1" name="ckpolo"> Polo Team
                      </label>&nbsp;&nbsp;&nbsp;-->
					  <label>
                        <input type="checkbox" value="1" name="ckleading"> Nia Team
                      </label>&nbsp;&nbsp;&nbsp;
					  <label>
                        <input type="checkbox" value="1" name="cklulu"> Frans Team
                      </label>&nbsp;&nbsp;&nbsp;
					  <label>
                        <input type="checkbox" value="1" name="ckadidas1"> Adidas Team
                      </label>&nbsp;&nbsp;&nbsp;
					  <label>
                        <input name="ckadidas2" type="checkbox" value="1"> Adidas (Sample) Team
                      </label>&nbsp;&nbsp;&nbsp;
					  <!--<label>
                        <input name="ckadidas3" type="checkbox" disabled="disabled" value="1"> Adidas3 Team
                      </label>-->
					  	
            	</div>
			</div>				
			<div class="form-group">
                    <textarea id="editor1" name="editor1" rows="10" cols="80" class="form-control"><p>Dear mkt team,</p>
<p>Mohon di tindak lanjuti untuk  cek stock ataupun ganti kain dengan departement terkait </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Ditunggu feedbacknya segera </p>
<p>&nbsp;</p>
<table border="1" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="723" nowrap colspan="4" valign="bottom"><p align="center"><u>BON PENGHUBUNG LANGGANAN PT. INDO    TAICHEN</u></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>NO. BPP</p></td>
    <td width="723" nowrap valign="bottom"><p align="right"><?php echo $rcek['bpp'];?></p></td>
    <td width="723" nowrap valign="bottom"><p>LOT </p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['lot'];?></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>CUSTOMER</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['pelanggan'];?></p></td>
    <td width="723" nowrap valign="bottom"><p>UKURAN </p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['lebar']."X".$rcek['gramasi'];?></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>PO</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['no_po'];?></p></td>
    <td width="723" nowrap valign="bottom"><p>ROLL</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['rol_mslh'];?></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>ORDER</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['no_order'];?></p></td>
    <td width="723" nowrap valign="bottom"><p>QTY</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['qty_mslh'];?></p></td>
  </tr>
  <tr>
    <td width="723" valign="top" nowrap><p>JENIS KAIN</p></td>
    <td width="723" valign="top" nowrap><p><?php echo $rcek['jenis_kain'];?></p></td>
    <td width="723" nowrap valign="bottom"><p>PABRIK RAJUT</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['no_ko'];?></p></td>
  </tr>
  <tr>
    <td width="723" valign="top" nowrap>ITEM</td>
    <td width="723" valign="top" nowrap><?php echo $rcek['no_item'];?></td>
    <td width="723" nowrap valign="bottom"><p>DELIVERY KAIN    JADI</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['tgl_delivery'];?></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>WARNA</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['warna'];?></p></td>
    <td width="723" nowrap valign="bottom"><p>DEPT PENANGGUNG JWB</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcekd['dept'];?></p></td>
  </tr>
  <tr>
    <td width="723" nowrap valign="bottom"><p>NO WARNA</p></td>
    <td width="723" nowrap valign="bottom"><p><?php echo $rcek['no_warna'];?></p></td>
    <td nowrap valign="bottom">PERSENTASE</td>
    <td nowrap valign="bottom"><?php echo $rcekd['persen'];?></td>
  </tr>
  <tr>
    <td width="723" valign="top" nowrap><p>MASALAH KAIN</p>      <p>&nbsp;</p>      <p>&nbsp;</p>      <p>&nbsp;</p>      <p>&nbsp;</p>      <p align="center">&nbsp;</p>      <p align="center">&nbsp;</p></td>
    <td width="723" colspan="2" valign="top"><p align="center"><?php echo $rcek['masalah'];?></p></td>
    <td width="723" valign="top"><p align="center">&nbsp;</p>      <p align="center">&nbsp;</p>      <p align="center">&nbsp;</p>      <p>&nbsp;</p>      <p>&nbsp;</p>      <p align="center">&nbsp;</p>      <p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td nowrap colspan="4"><p>&nbsp;</p>      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td nowrap valign="bottom">FOC</td>
    <td colspan="3" valign="bottom" nowrap><?php if($rcek['berat_extra']!="0.00"){echo $rcek['berat_extra']." KG ";} if($rcek['panjang_extra']!="0.00"){echo $rcek['panjang_extra']." ".$rcek['satuan'];;} ?></td>
  </tr>
  <tr>
    <td nowrap valign="bottom">Estimasi</td>
    <td colspan="3" valign="bottom" nowrap><?php if($rcek['estimasi']!="0.00"){echo $rcek['estimasi']." KG ";}
	if($rcek['panjang_estimasi']!="0.00"){echo $rcek['panjang_estimasi']." ".$rcek['satuan'];} ?></td>
  </tr>
  <tr>
    <td nowrap colspan="4" valign="bottom"><p><strong>&nbsp;</strong></p>      <p>&nbsp;</p></td>
  </tr>
 
</table>
<p>&nbsp;</p>
<p><strong>Thanks &amp; b&rsquo;regards</strong><br>
  <strong>Tenny/aisyah</strong></p></textarea>
              </div>
					
					
					
					</div>
			
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                 <button type="submit" class="btn btn-success pull-right" name="send" value="send">Send <i class="fa fa-envelope-o"></i></button>
              </div>
             </div>
            <!-- /.box-footer -->
          </div>
					</form>
          <!-- /. box -->
	</div>	
        </div>    
						
                    </div>
                </div>
            </div>
        </div>
<?php
if($_POST['send']=="send"){
			$ket=str_replace("'","''",$_POST['ket']);

			//Load Composer's autoloader
			require 'PHPMailer/vendor/autoload.php';
			//Create an instance; passing `true` enables exceptions
			$mail = new PHPMailer(true);

			//require 'PHPMailer/PHPMailerAutoload.php';
			//$mail = new PHPMailer;
			// Konfigurasi SMTP
			$mail->isSMTP();
			$mail->Host 		= 'mail.indotaichen.com'; //mail.usmanas.web.id / mail.indotaichen.com
			$mail->SMTPAuth 	= true;
			$mail->Username 	= 'qcf.adm@indotaichen.com'; //usman@usmanas.web.id / dept.it@indotaichen.com
			$mail->Password 	= 'Final.1234567'; //fariz001 / D1t2017
			$mail->SMTPSecure 	= PHPMailer::ENCRYPTION_SMTPS;
			$mail->Port 		= 465;

			$mail->setFrom('qcf.adm@indotaichen.com', 'adm qcf');
			$mail->addReplyTo('qcf.adm@indotaichen.com', 'adm qcf');

			// Menambahkan penerima
			//$mail->addAddress($_POST['untuk']);

			// Menambahkan beberapa penerima
			//$mail->addAddress('penerima2@contoh.com');
			//$mail->addAddress('penerima3@contoh.com');
			// Menambahkan cc atau bcc 
			//$cc=str_replace("'","''",$_POST[cc]);		

			if($_POST['ckqc']=="1"){
				$mail->addAddress('qcf.adm@indotaichen.com');
				$mail->addCC('qcf.aftersale@indotaichen.com');
				$mail->addCC('qcf.clerk.aftersales@indotaichen.com');
				$mail->addCC('agung.cahyono@indotaichen.com');
				$mail->addCC('arif.efendi@indotaichen.com');
				$mail->addCC('ayen.qcf@indotaichen.com');
				$mail->addCC('yohana.hantari@indotaichen.com');
				$mail->addCC('putri.damayanti@indotaichen.com');
				$qc="[Team QC]";
			}else{$qc="";}
			if($_POST['ckfin']=="1"){
				$mail->addCC('yayan.tri.budi@indotaichen.com');
				$mail->addCC('indra.cahya@indotaichen.com');
				$fin="[Team FIN]";
			}else{$fin="";}	
			if($_POST['ckdye']=="1"){
				$mail->addCC('nyoman.parta@indotaichen.com');
				$mail->addCC('gusti.ketut@indotaichen.com');
				$mail->addCC('mucharom.mustofa@indotaichen.com');
				$dye="[Team DYE]";
			}else{$dye="";}
			if($_POST['ckprt']=="1"){
				$mail->addCC('produksi.printing@indotaichen.com');
				$mail->addCC('staff.printing@indotaichen.com');
				$mail->addCC('rujito.printing@indotaichen.com');
				$prt="[Team PRT]";
			}else{$prt="";}
			if($_POST['ckrmp']=="1"){
				$mail->addCC('angela@indotaichen.com');
				$mail->addCC('ikhsan.hidayat@indotaichen.com');
				$rmp="[Team RMP]";
			}else{$rmp="";}
			if($_POST['ckknt']=="1"){
				$mail->addCC('lucia.chen@indotaichen.com');
				$mail->addCC('prambudi.knt@indotaichen.com');
				$knt="[Team KNT]";
			}else{$knt="";}
			if($_POST['ckbrs']=="1"){
				$mail->addCC('brs.admin@indotaichen.com');
				$mail->addCC('edih.maulana@indotaichen.com');
				$mail->addCC('brs.staff@indotaichen.com');
				$mail->addCC('indra.brs@indotaichen.com');
				$brs="[Team Brushing]";
			}else{$brs="";}	
			//mkt	
			/*if($_POST['ckbun']=="1"){
				$mail->addCC('bunbun.kui@indotaichen.com');
				$mail->addCC('septian.saputra@indotaichen.com');	
				$mail->addCC('ronny.masroni@indotaichen.com');
				$bun="[Team Bun Bun]";
			}else{$bun="";}	*/
			if($_POST['ckheri']=="1"){
				$mail->addCC('heri.bahtiar@indotaichen.com');
				$mail->addCC('citrasari.andadari@indotaichen.com');
				$mail->addCC('septian.saputra@indotaichen.com');
				$heri="[Team Heri]";
			}else{$heri="";}
			if($_POST['ckpolo']=="1"){
				$mail->addCC('ronny.masroni@indotaichen.com');
				$mail->addCC('nia.wuri@indotaichen.com');
				$polo="[Team Polo]";
			}else{$polo="";}
			if($_POST['cklulu']=="1"){
				$mail->addCC('gilang.kurnia@indotaichen.com');
				$mail->addCC('frans.subrata@indotaichen.com');
				$mail->addCC('septian.saputra@indotaichen.com');
				$mail->addCC('darien.limarga@indotaichen.com');
				$mail->addCC('fransiska.amelia@indotaichen.com');
				$mail->addCC('bunbun.kui@indotaichen.com');
				$lulu="[Team Frans]";
			}else{$lulu="";}
			if($_POST['ckleading']=="1"){
				$mail->addCC('deden.wijaya@indotaichen.com');
				$mail->addCC('nia.wuri@indotaichen.com');
				$mail->addCC('aditya.rangga@indotaichen.com');
				/*$mail->addCC('didik.hermanto@indotaichen.com');*/
				$mail->addCC('septian.saputra@indotaichen.com');	
				$mail->addCC('ronny.masroni@indotaichen.com');
				$leading="[Team Nia]";
			}else{$leading="";}
			if($_POST['ckadidas1']=="1"){
				$mail->addCC('yohanes.pribadi@indotaichen.com');
				$mail->addCC('ahmad.fahrurrozi@indotaichen.com');
				$mail->addCC('ridwan.setiawan@indotaichen.com');
				$mail->addCC('budiman.mkt@indotaichen.com');
				$mail->addCC('richard.asi@indotaichen.com');
				$mail->addCC('didik.hermanto@indotaichen.com');
				$mail->addCC('suci.kurniawati@indotaichen.com');
				$mail->addCC('bambang.susiyanto@indotaichen.com');
				$mail->addCC('dennis.septian@indotaichen.com');
				$mail->addCC('levia.zhuang@indotaichen.com');
				$mail->addCC('kevin.noventin@indotaichen.com');
				$add1="[Team Addidas]";
			}else{$add1="";}
				if($_POST['ckadidas2']=="1"){
				$mail->addCC('yohanes.pribadi@indotaichen.com');
				$mail->addCC('richard.asi@indotaichen.com');
				$mail->addCC('didik.hermanto@indotaichen.com');	
				$mail->addCC('ridwan.setiawan@indotaichen.com');
				$mail->addCC('ikhsan.ikhwana@indotaichen.com');	
				$mail->addCC('levia.zhuang@indotaichen.com');
				$add2="[Team Addidas(Sample)]";	
				}else{$add2="";}
				
			$mail->addCC($_POST['untuk']);
			$mail->addCC($_POST['untuk1']);
			$mail->addCC($_POST['untuk2']);	
			//$mail->addBCC('usmanas.as@gmail.com');

			// Subjek email
			$mail->Subject = ''.$_POST['subjek'].'';

			// Mengatur format email ke HTML
			$mail->isHTML(true);

			// Konten/isi email
			$mailContent =''.$_POST['editor1'].'';
			$mail->Body = $mailContent;

			// Menambahakn lampiran
			//$mail->addAttachment('lmp/file1.pdf');
			//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

			// Kirim email
			if(!$mail->send()){
				//echo 'Pesan tidak dapat dikirim.';
				//echo 'Mailer Error: ' . $mail->ErrorInfo;
				echo "<script>swal({
			title: 'Mailer Error:',   
			text: 'Pesan tidak dapat dikirim',
			type: 'warning',
			}).then((result) => {
			if (result.value) {
				
				window.location.href='InputDataNew'; 
			}
			});</script>";
				
			}else{
				// echo 'Pesan telah terkirim';
				$isi=str_replace("'","''",$_POST['editor1']);
				$kirim=$qc.$rmp.$knt.$prt.$brs.$rmp.$dye.$fin.$bun.$heri.$polo.$leading.$lulu.$add1." ".$_POST['untuk']." ".$_POST['untuk1']." ".$_POST['untuk2'];
				$sqlmail=mysqli_query($con,"INSERT INTO tbl_email_bon SET
				no_bon='$rcek[bpp]',
				isi='$isi',
				kirim_ke='$kirim',
				tgl_kirim=now(),
				jam_kirim=now()");
			}
	}
function nobon(){
		include"koneksi.php";
		date_default_timezone_set("Asia/Jakarta");
		$format = date("y");
		$sql=mysqli_query($con,"SELECT bpp FROM tbl_qcf WHERE DATE_FORMAT(tgl_masuk,'%Y')=DATE_FORMAT(now(),'%Y')
		ORDER BY bpp DESC LIMIT 1") or die (mysqli_error());
		$d=mysqli_num_rows($sql);
		if($d>0){
			$r=mysqli_fetch_array($sql);
			$d=$r['bpp'];
			$str=substr($d,2,5);
			$Urut = (int)$str;
		}else{
			$Urut = 0;
		}
		$Urut = $Urut + 1;
		$Nol="";
		$nilai=5-strlen($Urut);
		for ($i=1;$i<=$nilai;$i++){
			$Nol= $Nol."0";
		}
		$nipbr =$format.$Nol.$Urut;
		return $nipbr;
}
$nou=nobon();


if($_POST['save']=="save"){
	
	  if($_POST['show_input']=='1') {
		  
		 // 1 
		$penghubung_masalah =  $_POST['penghubung_masalah'];
		$penghubung_keterangan =  $_POST['penghubung_keterangan'];
		$advice1 		  = $_POST['advice1'];
		$penghubung_roll1 =  $_POST['penghubung_roll1'];
		$penghubung_roll2 =  $_POST['penghubung_roll2'];
		$penghubung_roll3 =  $_POST['penghubung_roll3'];
		$penghubung_roll4 =  $_POST['penghubung_roll4'];
		
		$array_penghubung_dep=$_POST['penghubung_dep'];
		if (isset($array_penghubung_dep)) {
			$penghubung_dep="";
			$no_penghubung = 1;
			$count_penghubung = count($array_penghubung_dep);		
			foreach($array_penghubung_dep as $t_jawab1)  
			{  
				
				if ($no_penghubung==$count_penghubung) {
					$penghubung_dep .= $t_jawab1;
				} else {
					$penghubung_dep .= $t_jawab1.","; 
				}
				$no_penghubung++;
			};
		} else {
			$penghubung_dep = '';
		}
		$penghubung_dep_persen =  $_POST['penghubung_dep_persen'];
		
		/////////////////////////////////////////////////////////2
		$penghubung2_masalah =  $_POST['penghubung2_masalah'];
		$penghubung2_keterangan =  $_POST['penghubung2_keterangan'];
		$advice2 		   = $_POST['advice2'];
		$penghubung2_roll1 =  $_POST['penghubung2_roll1'];
		$penghubung2_roll2 =  $_POST['penghubung2_roll2'];
		$penghubung2_roll3 =  $_POST['penghubung2_roll3'];
		$penghubung2_roll4 =  $_POST['penghubung2_roll4'];
		
		$array_penghubung_dep2=$_POST['penghubung2_dep'];
		if (isset($array_penghubung_dep2)) {
			$penghubung2_dep="";
			$no_penghubung2 = 1;
			$count_penghubung2 = count($array_penghubung_dep2);		
			foreach($array_penghubung_dep2 as $t_jawab1)  
			{  
				
				if ($no_penghubung2==$count_penghubung2) {
					$penghubung2_dep .= $t_jawab1;
				} else {
					$penghubung2_dep .= $t_jawab1.","; 
				}
				$no_penghubung2++;
			};
		} else {
			$penghubung2_dep = '';
		}
		$penghubung2_dep_persen =  $_POST['penghubung2_dep_persen'];
		
		/////////////////////////////////////////////////////////3
		$penghubung3_masalah =  $_POST['penghubung3_masalah'];
		$penghubung3_keterangan =  $_POST['penghubung3_keterangan'];
		$advice3 		   = $_POST['advice3'];
		$penghubung3_roll1 =  $_POST['penghubung3_roll1'];
		$penghubung3_roll2 =  $_POST['penghubung3_roll2'];
		$penghubung3_roll3 =  $_POST['penghubung3_roll3'];
		$penghubung3_roll4 =  $_POST['penghubung3_roll4'];
		
		$array_penghubung_dep3=$_POST['penghubung3_dep'];
		if (isset($array_penghubung_dep3)) {
			$penghubung3_dep="";
			$no_penghubung3 = 1;
			$count_penghubung3 = count($array_penghubung_dep3);		
			foreach($array_penghubung_dep3 as $t_jawab1)  
			{  
				
				if ($no_penghubung3==$count_penghubung2) {
					$penghubung3_dep .= $t_jawab1;
				} else {
					$penghubung3_dep .= $t_jawab1.","; 
				}
				$no_penghubung3++;
			};
		} else {
			$penghubung3_dep = '';
		}
		$penghubung3_dep_persen =  $_POST['penghubung3_dep_persen'];
		
		require 'C:/xampp/htdocs/QC-Final-New/vendor/autoload.php';
		$mail = new PHPMailer\PHPMailer\PHPMailer();
		$mail->isSMTP();
		$mail->Host       = 'mail.indotaichen.com';
		$mail->SMTPAuth   = true;
		$mail->Username   = 'dept.it@indotaichen.com';
		$mail->Password   = 'Xr7PzUWoyPA';
		$mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port       = 587;

		$mail->setFrom('dept.it@indotaichen.com', 'DEPT IT');
		$mail->addAddress('qcf.adm@indotaichen.com', 'ADM QCF');
		// $mail->addAddress('adm.mkt@indotaichen.com', 'ADM MKT');
		// $mail->addAddress('arif.efendi@indotaichen.com', 'Arif Efendi');
		$mail->addAddress('tobias.sulistiyo@indotaichen.com', 'TOBIAS');

		$user_email = mysqli_query($con, "SELECT * FROM email_user_penghubung WHERE dept='MKT'");
		$listmail   = [];
		while ($data_email = mysqli_fetch_array($user_email)) {
			if (stripos($_POST['pelanggan'], $data_email['sales_detail']) !== false) {
				$listmail[] = $data_email;
				$mail->addAddress($data_email['email'], $data_email['user']);
			}
		}
		$mail->Subject = 'Approve Bon Penghubung QCF';
		$mail->isHTML(true);
		$mail->Body = "<p>Dear MKT Teams,</p>
						<p>Mohon ditindaklanjuti terkait Approval Bon Penghubung.</p>
						<p>&nbsp;</p>
						<p>&nbsp; Dengan detail masalah $penghubung_masalah - $penghubung_keterangan pada roll $penghubung_roll1 </p>
						<p>&nbsp;</p>";
						if (!empty($penghubung2_masalah)) {
							$mail->Body .= "<p>&nbsp; Dengan detail masalah $penghubung2_masalah - $penghubung2_keterangan pada roll $penghubung2_roll1 </p>
							<p>&nbsp;</p>";
						}
						if (!empty($penghubung3_masalah)) {
							$mail->Body .= "<p>&nbsp; Dengan detail masalah $penghubung3_masalah - $penghubung3_keterangan pada roll $penghubung3_roll1 </p>
							<p>&nbsp;</p>";
						}
						$mail->Body .= "<p>&nbsp;</p>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sebelum melakukan APPROVE, Mohon untuk login terlebih dahulu <a href='online.indotaichen.com/Qc-Final-New'>Login</a></p>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Anda dapat melakukan approval pada link berikut: <a href='online.indotaichen.com/Qc-Final-New/ApproveBonPenghubung-" . htmlspecialchars($_POST['nodemand']) . "'>Approve Bon Penghubung</a></p>
						<p>&nbsp;</p>";

		$emailList   = '';
		$salesDetail = '';
		foreach ($listmail as $det) {
			if ($emailList) {
				$emailList .= ',' . $det['email'];
			} else {
				$emailList .= $det['email'];
			}
			if ($salesDetail === '') {
				$salesDetail = $det['sales_detail'];
			}
		}
		$insert_to = mysqli_query($con, "INSERT INTO tbl_bonpenghubung_mail SET nodemand='$_POST[nodemand]', mail_to='$emailList', team='$salesDetail', status_approve=0, `status`=1");
		$mail->send();
	  } else {
		$penghubung_masalah    =  '';
		$penghubung_keterangan =  '';
		$advice1 				=  '';
		$penghubung_roll1      =  '';
		$penghubung_roll2      =  '';
		$penghubung_roll3      =  '';
		$penghubung_roll4      =  '';
		$penghubung_dep        =  '';
		$penghubung_dep_persen =  '';
		
		//2 
		$penghubung2_masalah    =  '';
		$penghubung2_keterangan =  '';
		$advice2 				=  '';
		$penghubung2_roll1      =  '';
		$penghubung2_roll2      =  '';
		$penghubung2_roll3      =  '';
		$penghubung2_roll4      =  '';
		$penghubung2_dep        =  '';
		$penghubung2_dep_persen =  '';
		
		//3 
		$penghubung3_masalah    =  '';
		$penghubung3_keterangan =  '';
		$advice3 				=  '';
		$penghubung3_roll1      =  '';
		$penghubung3_roll2      =  '';
		$penghubung3_roll3      =  '';
		$penghubung3_roll4      =  '';
		$penghubung3_dep        =  '';
		$penghubung3_dep_persen =  '';
	  } 
	 
	   
	   
	  $warna=str_replace("'","''",$_POST['warna']);
	  $nowarna=str_replace("'","''",$_POST['no_warna']);	
	  $jns=str_replace("'","''",$_POST['jns_kain']);
	  $styl=str_replace("'","''",$_POST['styl']);	
	  $sales=str_replace("'","''",trim($_POST['sales']));	
	  $po=str_replace("'","''",$_POST['no_po']);
	  $masalah=str_replace("'","''",$_POST['masalah']);
	  $cekwarna=str_replace("'","''",$_POST['cekwarna']);
	  $ket1=str_replace("'","''",$_POST['ket']);			
	  $lot=trim($_POST['lot']);
	  $t_jawab=$_POST['t_jawab'];
	  $multijawab="";
	  $persen=$_POST['persen'];
	  foreach($t_jawab as $t_jawab1)  
   		{  
      		$multijawab .= $t_jawab1.",";  
		}
	if($_POST['sts_pbon']=="1"){$sts_pbon="1";}else{ $sts_pbon="0";}
	if($_POST['sts_nodelay']=="1"){$sts_nodelay="1";}else{ $sts_nodelay="0";}
	if($_POST['sts_tembakdok']=="1"){$sts_tembakdok="1";}else{ $sts_tembakdok="0";}
  	  $sqlData=mysqli_query($con,"INSERT INTO tbl_qcf SET 
		  nokk='$_POST[nokk]',
		  nodemand='$_POST[nodemand]',
		  bpp='$nou',
		  pelanggan='$_POST[pelanggan]',
		  no_order='$_POST[no_order]',
		  no_hanger='$_POST[no_hanger]',
		  no_item='$_POST[no_item]',
		  no_po='$po',
		  no_ko='$_POST[no_ko]',
		  jenis_kain='$jns',
		  styl='$styl',
		  berat_order='$_POST[qty1]',
		  panjang_order='$_POST[qty2]',
		  satuan_order='$_POST[satuan1]',
		  rol_bruto='$_POST[qty3]',
		  berat_bruto='$_POST[qty4]',
		  lebar='$_POST[lebar]',
		  gramasi='$_POST[grms]',
		  lebar_ins='$_POST[inslebar]',
		  gramasi_ins='$_POST[insgrms]',
		  lebar_fin='$_POST[finlebar]',
		  gramasi_fin='$_POST[fingrms]',
		  susut_p='$_POST[pp]',
		  susut_l='$_POST[pl]',
		  susut_s='$_POST[ps]',
		  berat_extra='$_POST[extra]',
		  panjang_extra='$_POST[extra_p]',
		  estimasi='$_POST[estimasi]',
		  panjang_estimasi='$_POST[estimasi_p]',
		  lot='$lot',
		  rol='$_POST[rol]',
		  warna='$warna',
		  no_warna='$nowarna',
		  cek_warna='$cekwarna',
		  netto='$_POST[netto]',
		  panjang='$_POST[panjang]',
		  satuan='$_POST[satuan2]',
		  lot_legacy='$_POST[lot_legacy]',
		  sisa='$_POST[sisa]',
		  tgl_masuk='$_POST[tglmsk]',
		  tgl_pack='$_POST[tglpk]',
		  jam_pack='$_POST[jam_pack]',
		  tglcwarna='$_POST[tglcwarna]',
		  jam_cwarna='$_POST[jam_cwarna]',
		  tgl_ins='$_POST[tglins]',
		  tgl_fin='$_POST[tglfin]',
		  tgl_delivery='$_POST[tgl_delivery]',
		  qty_mslh='$_POST[qty_mslh]',
		  rol_mslh='$_POST[rol_mslh]',
		  t_jawab='$multijawab',
		  persen='$persen',
		  sts_pbon='$sts_pbon',
		  sts_nodelay='$sts_nodelay',
		  sts_tembakdok='$sts_tembakdok',
		  masalah='$masalah',
		  ket='$ket1',
		  sales='$sales',
		  tgl_update=now(),
		  penghubung_masalah = '$penghubung_masalah',
		  penghubung_keterangan = '$penghubung_keterangan',
		  advice1          = '$advice1',
		  penghubung_roll1 = '$penghubung_roll1',
		  penghubung_roll2 = '$penghubung_roll2',
		  penghubung_roll3 = '$penghubung_roll3',
		  penghubung_dep = '$penghubung_dep',
		  penghubung_dep_persen = '$penghubung_dep_persen',
		  
		  penghubung2_masalah = '$penghubung2_masalah',
		  penghubung2_keterangan = '$penghubung2_keterangan',
		  advice2           = '$advice2',
		  penghubung2_roll1 = '$penghubung2_roll1',
		  penghubung2_roll2 = '$penghubung2_roll2',
		  penghubung2_roll3 = '$penghubung2_roll3',
		  penghubung2_dep = '$penghubung2_dep',
		  penghubung2_dep_persen = '$penghubung2_dep_persen',
		  
		  penghubung3_masalah = '$penghubung3_masalah',
		  penghubung3_keterangan = '$penghubung3_keterangan',
		  advice3           = '$advice3',
		  penghubung3_roll1 = '$penghubung3_roll1',
		  penghubung3_roll2 = '$penghubung3_roll2',
		  penghubung3_roll3 = '$penghubung3_roll3',
		  penghubung3_dep = '$penghubung3_dep',
		  penghubung3_dep_persen = '$penghubung3_dep_persen'
		  
		 
		 
		  ");	 	  
	  
		if($sqlData){
			//echo "<script>alert('Data Tersimpan');</script>";
			
			//echo "<script>swal('Data Tersimpan', 'You clicked the button!', 'success');</script>";
			//echo "<script>window.location.href='?p=Input-Data';</script>";
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='InputDataNew'; 
  }
});</script>";
		}		
	}
if($_POST['update']=="update"){
	
	
		$penghubung_masalah =  $_POST['penghubung_masalah'];
		$penghubung_keterangan =  $_POST['penghubung_keterangan'];
		$advice1          = $_POST['advice1'];
		$penghubung_roll1 =  $_POST['penghubung_roll1'];
		$penghubung_roll2 =  $_POST['penghubung_roll2'];
		$penghubung_roll3 =  $_POST['penghubung_roll3'];
		
		$array_penghubung_dep=$_POST['penghubung_dep'];
		$penghubung_dep="";
		$no_penghubung = 1;
		
		if (isset($array_penghubung_dep)) {
			$count_p =  count($array_penghubung_dep);
		} else {
			$count_p =  0 ; 
		}
		$count_penghubung = $count_p ; 
		
		foreach($array_penghubung_dep as $t_jawab1)  
		{  
			
			if ($no_penghubung==$count_penghubung) {
				$penghubung_dep .= $t_jawab1;
			} else {
				$penghubung_dep .= $t_jawab1.","; 
			}
			$no_penghubung++;
		};
		
		$penghubung_dep_persen =  $_POST['penghubung_dep_persen'];
		
		// 2
		$penghubung2_masalah =  $_POST['penghubung2_masalah'];
		$penghubung2_keterangan =  $_POST['penghubung2_keterangan'];
		$advice2           = $_POST['advice2'];
		$penghubung2_roll1 =  $_POST['penghubung2_roll1'];
		$penghubung2_roll2 =  $_POST['penghubung2_roll2'];
		$penghubung2_roll3 =  $_POST['penghubung2_roll3'];
		
		$array_penghubung2_dep=$_POST['penghubung2_dep'];
		$penghubung2_dep="";
		$no_penghubung2 = 1;
		
		if (isset($array_penghubung2_dep)) {
			$count_p2 =  count($array_penghubung2_dep);
		} else {
			$count_p2 =  0 ; 
		}
		$count_penghubung2 = $count_p2 ; 
		
		foreach($array_penghubung2_dep as $t_jawab1)  
		{  
			
			if ($no_penghubung2==$count_penghubung2) {
				$penghubung2_dep .= $t_jawab1;
			} else {
				$penghubung2_dep .= $t_jawab1.","; 
			}
			$no_penghubung2++;
		};
		
		$penghubung2_dep_persen =  $_POST['penghubung2_dep_persen'];
		
		
		// 3
		$penghubung3_masalah =  $_POST['penghubung3_masalah'];
		$penghubung3_keterangan =  $_POST['penghubung3_keterangan'];
		$advice3           = $_POST['advice3'];
		$penghubung3_roll1 =  $_POST['penghubung3_roll1'];
		$penghubung3_roll2 =  $_POST['penghubung3_roll2'];
		$penghubung3_roll3 =  $_POST['penghubung3_roll3'];
		
		$array_penghubung3_dep=$_POST['penghubung3_dep'];
		$penghubung3_dep="";
		$no_penghubung3 = 1;
		
		if (isset($array_penghubung3_dep)) {
			$count_p3 =  count($array_penghubung3_dep);
		} else {
			$count_p3 =  0 ; 
		}
		$count_penghubung3 = $count_p2 ; 
		
		foreach($array_penghubung3_dep as $t_jawab1)  
		{  
			
			if ($no_penghubung3==$count_penghubung3) {
				$penghubung3_dep .= $t_jawab1;
			} else {
				$penghubung3_dep .= $t_jawab1.","; 
			}
			$no_penghubung3++;
		};
		
		$penghubung3_dep_persen =  $_POST['penghubung3_dep_persen'];
	
		
	  
	  $warna=str_replace("'","''",$_POST['warna']);
	  $nowarna=str_replace("'","''",$_POST['no_warna']);	
	  $jns=str_replace("'","''",$_POST['jns_kain']);
	  $styl=str_replace("'","''",$_POST['styl']);
	  $sales=str_replace("'","''",trim($_POST['sales']));	
	  $po=str_replace("'","''",$_POST['no_po']);
	  $masalah=str_replace("'","''",$_POST['masalah']);
	  $cekwarna=str_replace("'","''",$_POST['cekwarna']);
	  $ket1=str_replace("'","''",$_POST['ket']);
	  $lot=trim($_POST['lot']);
	  $t_jawab=$_POST['t_jawab'];
	  $multijawab="";
	  $persen=$_POST['persen'];
	  foreach($t_jawab as $t_jawab1)  
   		{  
      		$multijawab .= $t_jawab1.",";  
		}
	if($_POST['sts_pbon']=="1"){$sts_pbon="1";}else{ $sts_pbon="0";}
	if($_POST['sts_nodelay']=="1"){$sts_nodelay="1";}else{ $sts_nodelay="0";}
	if($_POST['sts_tembakdok']=="1"){$sts_tembakdok="1";}else{ $sts_tembakdok="0";}
  	  $sqlData=mysqli_query($con,"UPDATE tbl_qcf SET 
		  pelanggan='$_POST[pelanggan]',
		  no_order='$_POST[no_order]',
		  no_hanger='$_POST[no_hanger]',
		  no_item='$_POST[no_item]',
		  no_po='$po',
		  no_ko='$_POST[no_ko]',
		  jenis_kain='$jns',
		  styl='$styl',
		  berat_order='$_POST[qty1]',
		  panjang_order='$_POST[qty2]',
		  satuan_order='$_POST[satuan1]',
		  rol_bruto='$_POST[qty3]',
		  berat_bruto='$_POST[qty4]',
		  lebar='$_POST[lebar]',
		  gramasi='$_POST[grms]',
		  lebar_ins='$_POST[inslebar]',
		  gramasi_ins='$_POST[insgrms]',
		  lebar_fin='$_POST[finlebar]',
		  gramasi_fin='$_POST[fingrms]',
		  susut_p='$_POST[pp]',
		  susut_l='$_POST[pl]',
		  susut_s='$_POST[ps]',
		  berat_extra='$_POST[extra]',
		  panjang_extra='$_POST[extra_p]',
		  estimasi='$_POST[estimasi]',
		  panjang_estimasi='$_POST[estimasi_p]',
		  lot='$lot',
		  rol='$_POST[rol]',
		  warna='$warna',
		  no_warna='$nowarna',
		  cek_warna='$cekwarna',
		  netto='$_POST[netto]',
		  panjang='$_POST[panjang]',
		  satuan='$_POST[satuan2]',
		  sisa='$_POST[sisa]',
		  tgl_masuk='$_POST[tglmsk]',
		  tgl_pack='$_POST[tglpk]',
		  jam_pack='$_POST[jam_pack]',
		  tglcwarna='$_POST[tglcwarna]',
		  jam_cwarna='$_POST[jam_cwarna]',
		  tgl_ins='$_POST[tglins]',
		  tgl_fin='$_POST[tglfin]',
		  tgl_delivery='$_POST[tgl_delivery]',
		  qty_mslh='$_POST[qty_mslh]',
		  rol_mslh='$_POST[rol_mslh]',
		  t_jawab='$multijawab',
		  persen='$persen',
		  sts_pbon='$sts_pbon',
		  sts_nodelay='$sts_nodelay',
		  sts_tembakdok='$sts_tembakdok',
		  masalah='$masalah',
		  ket='$ket1',
		  sales='$sales',
		  tgl_update=now(),
		  penghubung_masalah = '$penghubung_masalah',
		  penghubung_keterangan = '$penghubung_keterangan',
		  advice1          = '$advice1',
		  penghubung_roll1 = '$penghubung_roll1',
		  penghubung_roll2 = '$penghubung_roll2',
		  penghubung_roll3 = '$penghubung_roll3',
		  penghubung_dep = '$penghubung_dep',
		  penghubung_dep_persen = '$penghubung_dep_persen',
		  
		  penghubung2_masalah = '$penghubung2_masalah',
		  penghubung2_keterangan = '$penghubung2_keterangan',
		  advice2           = '$advice2',
		  penghubung2_roll1 = '$penghubung2_roll1',
		  penghubung2_roll2 = '$penghubung2_roll2',
		  penghubung2_roll3 = '$penghubung2_roll3',
		  penghubung2_dep = '$penghubung2_dep',
		  penghubung2_dep_persen = '$penghubung2_dep_persen',
		  
		  penghubung3_masalah = '$penghubung3_masalah',
		  penghubung3_keterangan = '$penghubung3_keterangan',
		  advice3           = '$advice3',
		  penghubung3_roll1 = '$penghubung3_roll1',
		  penghubung3_roll2 = '$penghubung3_roll2',
		  penghubung3_roll3 = '$penghubung3_roll3',
		  penghubung3_dep = '$penghubung3_dep',
		  penghubung3_dep_persen = '$penghubung3_dep_persen'
		  
		  WHERE nodemand='$_POST[nodemand]' ");	 	  
	  
		if($sqlData){
		    // echo "<script>alert('Data Telah DiUbah');</script>";
			// echo "<script>swal('Data Telah DiUbah!', 'You clicked the button!', 'success');</script>";
			// echo "<script>window.location.href='?p=Input-Data';</script>";
			echo "<script>swal({
  title: 'Data Telah DiUbah',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='InputDataNew'; 
  }
});</script>";
			
		}

	}
?>