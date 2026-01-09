<?php
ini_set("error_reporting", 1);
include"koneksi.php";
$nodemand=$_GET['nodemand'];
$sqlDB2="SELECT 
	A.CODE AS DEMANDNO, 
	TRIM(B.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE, 
	TRIM(E.LEGALNAME1) AS LEGALNAME1, 
	TRIM(C.ORDERPARTNERBRANDCODE) AS ORDERPARTNERBRANDCODE, 
	TRIM(C.BUYER) AS BUYER,
	TRIM(C.SALESORDERCODE) AS SALESORDERCODE, 
	TRIM(C.ITEMDESCRIPTION) AS ITEMDESCRIPTION,
	TRIM(A.SUBCODE05) AS NO_WARNA, 
	TRIM(F.WARNA) AS WARNA, 
	H.JENIS_KAIN,
	TRIM(A.SUBCODE01) AS SUBCODE01,
	TRIM(A.SUBCODE02) AS SUBCODE02,
	TRIM(A.SUBCODE03) AS SUBCODE03,
	TRIM(A.SUBCODE04) AS SUBCODE04,
	TRIM(A.SUBCODE05) AS SUBCODE05,
	TRIM(A.SUBCODE06) AS SUBCODE06,
	TRIM(A.SUBCODE07) AS SUBCODE07,
	TRIM(A.SUBCODE08) AS SUBCODE08,
	TRIM(C.LONGDESCRIPTION) AS NO_ITEM,TRIM(C.PO_NUMBER) AS PO_NUMBER, 
	TRIM(C.INTERNALREFERENCE) AS INTERNALREFERENCE,
	A.BASEPRIMARYQUANTITY AS QTY_NETTO, 
	TRIM(A.BASEPRIMARYUOMCODE) AS BASEPRIMARYUOMCODE,
    A.BASESECONDARYQUANTITY AS QTY_NETTO_YARD, 
	TRIM(A.BASESECONDARYUOMCODE) AS BASESECONDARYUOMCODE, 
	C.QTY_ORDER, 
	TRIM(C.QTY_ORDER_UOM) AS QTY_ORDER_UOM,
	C.QTY_PANJANG_ORDER,
	TRIM(C.QTY_PANJANG_ORDER_UOM) AS QTY_PANJANG_ORDER_UOM, 
	G.USEDUSERPRIMARYQUANTITY AS QTY_BAGI_KAIN, 
	C.DELIVERYDATE,
	D.NAMENAME,
	D.VALUEDECIMAL,
	D.VALUEDECIMAL,
	C.AREALONGDESCRIPTION,
	A.DESCRIPTION
FROM PRODUCTIONDEMAND A 
LEFT JOIN --B
	(SELECT 
		PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE, 
		PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE 
		FROM 
		PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
		GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
		PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) B
	ON A.CODE=B.PRODUCTIONDEMANDCODE
LEFT JOIN  --C
	(SELECT 
	AREA.LONGDESCRIPTION AS AREALONGDESCRIPTION, 
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
	ITXVIEWORDERITEMLINKACTIVE.LONGDESCRIPTION,
	ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER
	FROM SALESORDER SALESORDER
	LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESORDER.CODE=SALESORDERLINE.SALESORDERCODE 
	LEFT JOIN SALESORDERDELIVERY SALESORDERDELIVERY ON SALESORDERLINE.SALESORDERCODE=SALESORDERDELIVERY.SALESORDERLINESALESORDERCODE AND SALESORDERLINE.ORDERLINE=SALESORDERDELIVERY.SALESORDERLINEORDERLINE
	LEFT JOIN ITXVIEWORDERITEMLINKACTIVE ITXVIEWORDERITEMLINKACTIVE ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ITXVIEWORDERITEMLINKACTIVE.ORDPRNCUSTOMERSUPPLIERCODE AND SALESORDERLINE.ITEMTYPEAFICODE= ITXVIEWORDERITEMLINKACTIVE.ITEMTYPEAFICODE AND 
	SALESORDERLINE.SUBCODE01 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE01 AND SALESORDERLINE.SUBCODE02 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE02 AND SALESORDERLINE.SUBCODE03 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE03 AND
	SALESORDERLINE.SUBCODE04 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE04 AND SALESORDERLINE.SUBCODE05 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE05 AND SALESORDERLINE.SUBCODE06 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE06 AND 
	SALESORDERLINE.SUBCODE07 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE07 AND SALESORDERLINE.SUBCODE08 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE08 AND SALESORDERLINE.SUBCODE09 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE09 AND 
	SALESORDERLINE.SUBCODE10 = ITXVIEWORDERITEMLINKACTIVE.SUBCODE10
	LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE AND SALESORDER.ORDERPARTNERBRANDCODE=ORDERPARTNERBRAND.CODE 
	LEFT JOIN AREA AREA ON SALESORDER.AREACODE = AREA.CODE 
	GROUP BY AREA.LONGDESCRIPTION,SALESORDER.ORDERPARTNERBRANDCODE, SALESORDERLINE.SALESORDERCODE, SALESORDERLINE.ORDERLINE, SALESORDERLINE.ITEMDESCRIPTION, SALESORDERLINE.SUBCODE03, SALESORDERLINE.SUBCODE05, SALESORDERLINE.BASEPRIMARYUOMCODE,SALESORDERLINE.BASESECONDARYUOMCODE, 
	SALESORDER.EXTERNALREFERENCE,SALESORDERLINE.EXTERNALREFERENCE,SALESORDERLINE.INTERNALREFERENCE, SALESORDERDELIVERY.DELIVERYDATE, ITXVIEWORDERITEMLINKACTIVE.LONGDESCRIPTION, ORDERPARTNERBRAND.LONGDESCRIPTION) C
ON A.ORIGDLVSALORDLINESALORDERCODE = C.SALESORDERCODE AND A.ORIGDLVSALORDERLINEORDERLINE = C.ORDERLINE
LEFT JOIN  --D
	(SELECT PRODUCT.SUBCODE01, 
	PRODUCT.SUBCODE02, 
	PRODUCT.SUBCODE03, 
	PRODUCT.SUBCODE04, 
	PRODUCT.SUBCODE05,
	PRODUCT.SUBCODE06, 
	PRODUCT.SUBCODE07, 
	PRODUCT.SUBCODE08, 
	PRODUCT.SUBCODE09, 
	PRODUCT.SUBCODE10,  
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
LEFT JOIN --E
	(SELECT BUSINESSPARTNER.LEGALNAME1,
	ORDERPARTNER.CUSTOMERSUPPLIERCODE 
	FROM BUSINESSPARTNER BUSINESSPARTNER 
	LEFT JOIN ORDERPARTNER ORDERPARTNER ON BUSINESSPARTNER.NUMBERID=ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID) E
ON A.CUSTOMERCODE=E.CUSTOMERSUPPLIERCODE
LEFT JOIN ( --F
    SELECT ITXVIEWCOLOR.ITEMTYPECODE, 
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
LEFT JOIN --G
	(SELECT PRODUCTIONRESERVATION.PRODUCTIONORDERCODE, PRODUCTIONRESERVATION.ITEMTYPEAFICODE, SUM(PRODUCTIONRESERVATION.USEDUSERPRIMARYQUANTITY) AS USEDUSERPRIMARYQUANTITY FROM PRODUCTIONRESERVATION 
	PRODUCTIONRESERVATION WHERE PRODUCTIONRESERVATION.ITEMTYPEAFICODE='KGF' GROUP BY PRODUCTIONRESERVATION.PRODUCTIONORDERCODE, PRODUCTIONRESERVATION.ITEMTYPEAFICODE) G
ON B.PRODUCTIONORDERCODE = G.PRODUCTIONORDERCODE
LEFT JOIN ( --H
    SELECT PRODUCT.ITEMTYPECODE, PRODUCT.SUBCODE01, PRODUCT.SUBCODE02,
    PRODUCT.SUBCODE03, PRODUCT.SUBCODE04, PRODUCT.SUBCODE05, PRODUCT.SUBCODE06, 
    PRODUCT.SUBCODE07, PRODUCT.SUBCODE08, PRODUCT.SUBCODE09, PRODUCT.SUBCODE10, 
    PRODUCT.LONGDESCRIPTION AS JENIS_KAIN FROM PRODUCT PRODUCT) H ON
    A.ITEMTYPEAFICODE = H.ITEMTYPECODE AND 
    A.SUBCODE01 = H.SUBCODE01 AND 
    A.SUBCODE02 = H.SUBCODE02 AND 
    A.SUBCODE03 = H.SUBCODE03 AND 
    A.SUBCODE04 = H.SUBCODE04 AND 
    A.SUBCODE05 = H.SUBCODE05 AND 
    A.SUBCODE06 = H.SUBCODE06 AND 
    A.SUBCODE07 = H.SUBCODE07 AND 
    A.SUBCODE08 = H.SUBCODE08 AND 
    A.SUBCODE09 = H.SUBCODE09 AND 
    A.SUBCODE10 = H.SUBCODE10
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

$sqlDB2QTY = "SELECT SUM(BASEPRIMARYQUANTITY) AS BERAT,COUNT(ITEMELEMENTCODE) AS ROL FROM STOCKTRANSACTION x
WHERE ORDERCODE = '$nodemand' ";
$stmtQTY=db2_exec($conn1,$sqlDB2QTY, array('cursor'=>DB2_SCROLLABLE));
$rowdb2QTY = db2_fetch_assoc($stmtQTY);
$valberat= round($rowdb2QTY['BERAT'],2);
$valrol= $rowdb2QTY['ROL'];

//penambahan suhu  (tes demand 00000122)

$sqlSuhu=" SELECT
	x.VALUEQUANTITY 
FROM
	DB2ADMIN.ITXVIEW_DETAIL_QA_DATA x
WHERE
	PRODUCTIONDEMANDCODE = '$nodemand' ";
$stmtSuhu=db2_exec($conn1,$sqlSuhu, array('cursor'=>DB2_SCROLLABLE));
$rowSuhu = db2_fetch_assoc($stmtSuhu);
$suhu_now =  $rowSuhu['VALUEQUANTITY'];

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
		PRODUCT.SUBCODE08='" . $rowdb2['SUBCODE08'] . "' 
	GROUP BY
		PRODUCT.SUBCODE01,
		PRODUCT.SUBCODE02,
		PRODUCT.SUBCODE03,
		PRODUCT.SUBCODE04,
		PRODUCT.SUBCODE05,
		PRODUCT.SUBCODE06,
		PRODUCT.SUBCODE07,
		PRODUCT.SUBCODE08
	";
$stmt1 = db2_exec($conn1, $sqlDB21, array('cursor' => DB2_SCROLLABLE));
$rowdb21 = db2_fetch_assoc($stmt1);

function autono_test()
{
	include"koneksi.php";
	date_default_timezone_set('Asia/Jakarta');
    $bln= date("Ym");
    $today= date("Ymd");
    $sqlnotes = mysqli_query($con,"SELECT no_test FROM tbl_tq_nokk WHERE substr(no_test,1,6) like '%".$bln."%' ORDER BY no_test DESC LIMIT 1") or die(mysqli_error());
    $dt=mysqli_num_rows($sqlnotes);
    if ($dt>0) {
        $rd=mysqli_fetch_array($sqlnotes);
        $dt=$rd['no_test'];
        $strd=substr($dt, 8, 4);
        $Urutd = (int)$strd;
    } else {
        $Urutd = 0;
    }
    $Urutd = $Urutd + 1;
    $Nold="";
    $nilaid=4-strlen($Urutd);
    for ($i=1;$i<=$nilaid;$i++) {
        $Nold= $Nold."0";
    }
    $no2 =$today.$Nold.$Urutd;
    //$no2 =$today.str_pad($Urutd, 4, "0",  STR_PAD_LEFT);
    return $no2;
}

$sqlCek=mysqli_query($con,"SELECT a.*,b.hangtag FROM tbl_tq_nokk a LEFT JOIN tbl_master_hangtag b ON a.no_item = b.no_item WHERE nodemand='$nodemand' ORDER BY id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$rcek=mysqli_fetch_array($sqlCek);
$no_tes=$rcek['no_test']+1;
$no_order= isset($_POST['no_order']) ? $_POST['no_order'] : '';
$pelanggan1= isset($_POST['pelanggan']) ? $_POST['pelanggan'] : '';
$no_po= isset($_POST['no_po']) ? $_POST['no_po'] : '';
$noitem= isset($_POST['no_item']) ? $_POST['no_item'] : '';
$nohanger= isset($_POST['no_hanger']) ? $_POST['no_hanger'] : '';
$jns_kain= isset($_POST['jns_kain']) ? $_POST['jns_kain'] : '';
$lebar= isset($_POST['lebar']) ? $_POST['lebar'] : '';
$grms= isset($_POST['grms']) ? $_POST['grms'] : '';
$rol= isset($_POST['rol']) ? $_POST['rol'] : '';
$berat= isset($_POST['berat']) ? $_POST['berat'] : '';
$warna= isset($_POST['warna']) ? $_POST['warna'] : '';
$no_warna= isset($_POST['no_warna']) ? $_POST['no_warna'] : '';
$lot= isset($_POST['lot']) ? $_POST['lot'] : '';
$proses= isset($_POST['proses']) ? $_POST['proses'] : '';
$suhu= isset($_POST['suhu']) ? $_POST['suhu'] : '';
$development= isset($_POST['development']) ? $_POST['development'] : '';
$Season		    = isset($_POST['season']) ? $_POST['season'] : '';
$kk_legacy= isset($_POST['kk_legacy']) ? $_POST['kk_legacy'] : '';
$lot_legacy= isset($_POST['lot_legacy']) ? $_POST['lot_legacy'] : '';
$area= isset($_POST['area']) ? $_POST['area'] : '';


//$con1=mysqli_connect("10.0.0.10","dit","4dm1n");
//$db1=mysqli_select_db("db_finishing",$con1)or die("Gagal Koneksi ke finishing");
//$qryFin=mysqli_query("SELECT * FROM tbl_produksi WHERE nokk='$nokk' ORDER BY id DESC LIMIT 1");
//$dtFin=mysqli_fetch_array($qryFin);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
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
					  <!-- <input name="nokk" type="hidden" class="form-control" id="nokk" 
						value="<?php echo $rowdb2['PRODUCTIONORDERCODE'];?>" > -->
					  <input name="nodemand" type="text" class="form-control" id="nodemand" 
						 onchange="window.location='KainInNew-'+this.value" value="<?php echo $_GET['nodemand'];?>" placeholder="No Demand" required >
						</div>
						<?php if($nodemand!="") { ?>
						 <div class="col-sm-4">
								<input value="<?php echo $_POST['no_demand_2'];?>" type="text" name="no_demand_2" class="form-control" placeholder="No Demand 2">
						 </div>
						<?php  } ?>

		</div>
		<div class="form-group">
			<label for="prod_order" class="col-sm-3 control-label">Production Order</label>
			<div class="col-sm-4">
				<input name="nokk" type="text" class="form-control" id="nokk" 
				value="<?php echo $rowdb2['PRODUCTIONORDERCODE'];?>" placeholder="Prod. Order" required>
			</div>
			<?php if($nodemand!="") { ?>
			<div class="col-sm-4">
								<input value="<?php echo $_POST['no_demand_3'];?>" type="text" name="no_demand_3" class="form-control" placeholder="No Demand 3">
			</div>
			<?php  } ?>
		</div>
		<div class="form-group">
			<label for="kk_legacy" class="col-sm-3 control-label">No KK Legacy</label>
			<div class="col-sm-4">
				<input name="kk_legacy" type="text" class="form-control" id="kk_legacy" 
				value="<?php if($cek>0){echo $rcek['kk_legacy'];}else if($_POST['kk_legacy']!=""){echo $kk_legacy;}?>" placeholder="No KK Legacy" required>
			</div>
			<?php if($nodemand!="") { ?>
			<div class="col-sm-4">
								<input value="<?php echo $_POST['no_demand_4'];?>" type="text" name="no_demand_4" class="form-control" placeholder="No Demand 4">
			</div>
			<?php  } ?>
		</div>
        <div class="form-group">
		  <label for="no_test" class="col-sm-3 control-label">No Test</label>
		  <div class="col-sm-4">
			<input name="no_test" type="text" class="form-control" id="no_test" placeholder="No Test" autocomplete="off" 
			value="<?php if($nodemand!=""){echo autono_test(); }else{} ?>" readonly="readonly" >
		  </div>
			<?php if($nodemand!="") { ?>
			<div class="col-sm-4">
								<input value="<?php echo $_POST['no_demand_5'];?>" type="text" name="no_demand_5" class="form-control" placeholder="No Demand 5">
			</div>
			<?php } ?>
			
		</div>
		<div class="form-group">
		  <label for="no_order" class="col-sm-3 control-label">No Order</label>
		  <div class="col-sm-4">
			<input name="no_order" type="text" class="form-control" id="no_order" 
			value="<?php if($cek>0){echo $rcek['no_order'];}else if($_POST['no_order']!=""){echo $no_order;}else{echo $rowdb2['SALESORDERCODE'];} ?>" placeholder="No Order" required>
		  </div>
		  <?php if($nodemand!="") { ?>
			<div class="col-sm-4">
								<input value="<?php echo $_POST['no_demand_6'];?>" type="text" name="no_demand_6" class="form-control" placeholder="No Demand 6">
			</div>
		  <?php } ?>
		</div>
		<div class="form-group">
		  <label for="no_po" class="col-sm-3 control-label">Pelanggan</label>
		  <div class="col-sm-8">
			<input name="pelanggan" type="text" class="form-control" id="no_po" 
			value="<?php if($cek>0){echo $rcek['pelanggan'];}else if($_POST['pelanggan']!=""){echo $pelanggan1;}else if($rowdb2['LEGALNAME1']!=""){echo $rowdb2['LEGALNAME1']."/".$rowdb2['BUYER'];}else{}?>" placeholder="Pelanggan" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_po" class="col-sm-3 control-label">PO</label>
		  <div class="col-sm-5">
			<input name="no_po" type="text" class="form-control" id="no_po" 
			value="<?php if($cek>0){echo $rcek['no_po'];}else if($_POST['no_po']!=""){echo $no_po;}else{echo $rowdb2['PO_NUMBER'];} ?>" placeholder="PO" >
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
		  <div class="col-sm-3">
			<input name="no_hanger" type="text" class="form-control" id="no_hanger" 
			value="<?php if($_POST['no_hanger']!=""){echo $nohanger;}else{echo trim($rowdb2['SUBCODE02']).trim($rowdb2['SUBCODE03']);}?>" placeholder="No Hanger">  
		  </div>
		  <div class="col-sm-3">
		  <input name="no_item" type="text" class="form-control" id="no_item" 
			value="<?php if($_POST['no_item']!=""){echo $noitem;}else{echo $rowdb2['NO_ITEM'];}?>" placeholder="No Item">
		  </div>	
		</div>
		<div class="form-group">
		  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
		  <div class="col-sm-8">
			  <textarea name="jns_kain" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cek>0){echo $rcek['jenis_kain'];}else if($_POST['jns_kain']!=""){echo $jns_kain;}else{echo $rowdb2['JENIS_KAIN'];}?></textarea>
			  </div>
		  </div>
		  <div class="form-group">
		  <label for="hangtag" class="col-sm-3 control-label">Hangtag</label>
		  <div class="col-sm-8">
			  <textarea name="hangtag" class="form-control" id="hangtag" placeholder="Hangtag" readonly><?php if($cek>0){echo $rcek['hangtag'];}?></textarea>
			  </div>
		  </div>	
		<div class="form-group">
		  <label for="no_po" class="col-sm-3 control-label">Area</label>
		  <div class="col-sm-8">
			<input name="area" type="text" class="form-control"  
			value="<?php if($_POST['area']!=""){echo $area;}else{echo $rowdb2['AREALONGDESCRIPTION'];} ?>" placeholder="Area" readonly >
		  </div>				   
		</div>	
		
	  </div>
	  		<!-- col --> 
	  <div class="col-md-6">
      <div class="form-group">
		  <label for="l_g" class="col-sm-3 control-label">Lebar X Gramasi</label>
		  <div class="col-sm-2">
			<input name="lebar" type="text" class="form-control" id="lebar" 
			value="<?php
			if($nodemand!=""){echo round($rowdb21['WIDTH']);}
			else if($_POST['lebar']!=""){echo $lebar;}
			else if($cek>0){echo $rcek['lebar'];}
			
			
			else{} ?>" placeholder="0" required>
		  </div>
		  <div class="col-sm-2">
			<input name="grms" type="text" class="form-control" id="grms" 
			value="<?php 
			if($_POST['grms']!=""){echo round($rowdb21['GSM']);}
			else if($cek>0){echo $rcek['gramasi'];}
			else if($nodemand!=""){echo $valgramasi;}else{} ?>" placeholder="0" required>
		  </div>		
		</div>	
		<div class="form-group">
		  <label for="rolkg" class="col-sm-3 control-label">Rol X KGs</label>
		  <div class="col-sm-2">
			<input name="rol" type="text" class="form-control" id="rol" 
			value="<?php if($cek>0){echo $rcek['rol'];}else if($_POST['rol']!=""){echo $rol;}else if($nodemand!=""){echo $valrol;}else{} ?>" placeholder="0" required>
		  </div>
		  <div class="col-sm-2">
			<input name="berat" type="text" class="form-control" id="berat" 
			value="<?php if($cek>0){echo $rcek['berat'];}else if($_POST['berat']!=""){echo $berat;}else if($nodemand!=""){echo $valberat;}else{} ?>" placeholder="0" required>
		  </div>		
		</div>  
		<div class="form-group">
		  <label for="warna" class="col-sm-3 control-label">Warna</label>
		  <div class="col-sm-8">
			<textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($cek>0){echo $rcek['warna'];}else if($_POST['warna']!=""){echo $warna;}else{echo $rowdb2['WARNA'];}?></textarea>
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="no_warna" class="col-sm-3 control-label">No Warna</label>
		  <div class="col-sm-8">
			<textarea name="no_warna" class="form-control" id="no_warna" placeholder="No Warna"><?php if($cek>0){echo $rcek['no_warna'];}else if($_POST['no_warna']!=""){echo $no_warna;}else{echo $rowdb2['NO_WARNA'];}?></textarea>
		  </div>				   
		</div>
		<div class="form-group">
		  <label for="lot" class="col-sm-3 control-label">Prod. Order / Lot</label>
		  <div class="col-sm-4">
			<input name="lot" type="text" class="form-control" id="lot" 
			value="<?php if($cek>0){echo $rcek['lot'];}else if($_POST['lot']!=""){echo $lot;}else{echo $rowdb2['PRODUCTIONORDERCODE'];} ?>" placeholder="Lot" >
		  </div>				   
		</div>
		<div class="form-group">
			<label for="lot_legacy" class="col-sm-3 control-label">No Lot Legacy</label>
			<div class="col-sm-4">
			<?php //backup  //if($cek>0){echo $rcek['lot_legacy'];}else if($_POST['lot_legacy']!=""){echo $lot_legacy;}?>
				<input name="lot_legacy" type="text" class="form-control"  
				value="<?php if($_POST['lot_legacy']!=""){echo $lot_legacy;}else{echo $rowdb2['DESCRIPTION'];} ?>" placeholder="No Lot Legacy" required>
			</div>
		</div>
		<!--  
		<div class="form-group">
		  <label for="kd_proses" class="col-sm-3 control-label">Kode Proses</label>
		  <div class="col-sm-2">
			<select name="kd_proses" class="form-control" id="kd_proses">
			<option value="Fin">Fin</option>
			<option value="Oven">Oven</option>
			<option value="Comp">Comp</option>
			<option value="AP">AP</option>
			<option value="PB">PB</option>	
			</select>
		  </div>				   
		</div>
 		-->
		<div class="form-group">
                  <label for="proses" class="col-sm-3 control-label">Proses</label>
                  <div class="col-sm-6">
                    <input name="proses" type="text" class="form-control" id="proses" 
                    value="<?php if($_POST['proses']!=""){echo $proses;} ?>" placeholder="Proses" required>
                  </div>				   
          </div>
		  <!--<div class="form-group">
        <label for="tgl_finishing" class="col-sm-3 control-label">Tgl. Finishing</label>
        <div class="col-sm-4">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="tgl_finishing" type="text" class="form-control pull-right" id="datepicker3" placeholder="0000-00-00" value="<?php echo $dtFin['tgl_proses_out']; ?>" required/>
          </div>
        </div>
	  </div> --> 
		<div class="form-group">
		  <label for="suhu" class="col-sm-3 control-label">Suhu</label>
		  	<div class="col-sm-3">
				<div class="input-group">  
					<input name="suhu" type="text" class="form-control" id="suhu" 
					value="<?php if($cek>0){echo $suhu_now;}else if($_POST['suhu']!=""){echo $suhu;}else{ echo $suhu_now ;} ?>" placeholder="Suhu" style="text-align: right;" required>
					<span class="input-group-addon">&deg;C</span>	
				</div>	
		  	</div>				   
		</div>
		<div class="form-group">
		  	<label for="development" class="col-sm-3 control-label">Kategori Test</label>
			<div class="col-sm-3">
				<div class="input-group">  
					<select name="development" id="development" class="form-control select2" required>
						<option selected="selected" value="">Pilih</option>
						<?php if($_POST['development']!=""){?>
						<option <?php if($_POST['development']!=""){?> selected=selected <?php };?> value="<?php echo $development;?>"><?php echo $development; ?></option>
						<?php }?>
						<option value="Development">Development</option>
						<option value="1st Bulk">1st Bulk</option>
						<option value="Reorder">Reorder</option>
						<option value="Additional">Additional</option>
						<option value="Labdip">Labdip</option>
						<option value="Mini Bulk">Mini Bulk</option>
						<option value="Request">Request</option>
					</select>
				</div>
			</div>				   
		</div>
		<div class="form-group">
			<?php
				// if ($cek > 0) {
				// 	$season_ = $rcek['season'];
				// } else {
					$noOrder = $no_order ?: $rowdb2['SALESORDERCODE'];
					$sqlDB2Season = "SELECT 
											TRIM(INTERNALREFERENCE) AS INTERNALREFERENCE
										FROM SALESORDER
										WHERE CODE = '$noOrder'
										LIMIT 1";
					$stmtSeason = db2_exec($conn1, $sqlDB2Season, array('cursor' => DB2_SCROLLABLE));
					$rowDB2Season = db2_fetch_assoc($stmtSeason);
					$season_ = $rowDB2Season['INTERNALREFERENCE'];
				// }
			?>
			<label for="season" class="col-sm-3 control-label">Season</label>
			<div class="col-sm-4">
				<div class="input-group">
				<input name="season" type="text" class="form-control" id="season"
						value="<?= $season_ ?? '' ?>" placeholder="Season" required readonly>
				</div>
		 	</div>			   
        </div>
	 </div>	
</div>	 
   <div class="box-footer">

   </div>
    <!-- /.box-footer -->
</div>

<?php
$noitem= isset($_POST['no_itemtest']) ? $_POST['no_itemtest'] : '';
$buyer= isset($_POST['buyer']) ? $_POST['buyer'] : '';
$sqlCek1=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',fc_note,ph_note, abr_note, bas_note, dry_note, fla_note, fwe_note, fwi_note, burs_note,repp_note,wick_note,wick_note,absor_note,apper_note,fiber_note,pillb_note,pillm_note,pillr_note,thick_note,growth_note,recover_note,stretch_note,sns_note,snab_note,snam_note,snap_note) AS note_g FROM tbl_tq_test WHERE id_nokk='$rcek[id]' ORDER BY id DESC LIMIT 1");
$cek1=mysqli_num_rows($sqlCek1);
$rcek1=mysqli_fetch_array($sqlCek1);

$sqlcekNoTes=mysqli_query($con,"SELECT * FROM tbl_tq_nokk WHERE no_test='$_POST[no_test]'");
$cekNoTes=mysqli_num_rows($sqlcekNoTes);
?>
<?php if($_GET['nodemand']!=""){ ?>
<div class="box box-success">
   <div class="box-header with-border">
    <h3 class="box-title">Detail Testing</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body"> 
  	<div class="col-md-12">
		<div class="form-group">
          	<label for="buyer" class="col-sm-2 control-label">Buyer</label>
          	<div class="col-sm-3">
			  	<input name="buyer" type="text" style="text-transform:uppercase" class="form-control" id="buyer" placeholder="Buyer"
			  	value="<?php echo $buyer; ?>" required>
		  	</div>
		</div>
		<!--<div class="form-group">
			<label for="no_itemtest" class="col-sm-2 control-label">No Item</label>
          	<div class="col-sm-3">
			  	<input name="no_itemtest" type="text" style="text-transform:uppercase" class="form-control" id="no_itemtest" placeholder="No Item"
			  	value="<?php if($rcek['no_item']!=""){echo $rcek['no_item'];}else if($_POST['no_item']!=""){echo $noitem;}else{echo $r['ProductCode'];}?>" required>
		  	</div>
    	</div>-->
		<div class="form-group">
			<label for="no_testmaster" class="col-sm-2 control-label">No Test</label>
          	<div class="col-sm-3">
			  	<input name="no_testmaster" type="text" style="text-transform:uppercase" class="form-control" id="no_testmaster" placeholder="No Test"
			  	value="<?php echo autono_test(); ?>" readonly>
		  	</div>
    	</div>
	</div>
<?php if($_POST['buyer']!=""){ ?>
<div class="col-md-12">
<!-- Custom Tabs -->
				<?php
					$qMB=mysqli_query($con,"SELECT * FROM tbl_masterbuyer_test WHERE buyer='$_POST[buyer]'");
					$cekMB=mysqli_num_rows($qMB);
					
                if($cekMB>0){
                    while($dMB=mysqli_fetch_array($qMB)){
                    $detail=explode(",",$dMB['physical']);
                    $detail1=explode(",",$dMB['functional']);
                    $detail2=explode(",",$dMB['colorfastness']);
				?>
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                     <div class="form-group">
                        <span class='badge bg-blue'><label for="physical" class="col-sm-2">PHYSICAL</label></span>
                     </div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="FLAMMABILITY" <?php if(in_array("FLAMMABILITY",$detail)){echo "checked";} ?>> Flammability &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FIBER CONTENT" <?php if(in_array("FIBER CONTENT",$detail)){echo "checked";} ?>> Fiber Content  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FABRIC COUNT" <?php if(in_array("FABRIC COUNT",$detail)){echo "checked";} ?>> Fabric Count
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="BOW & SKEW" <?php if(in_array("BOW & SKEW",$detail)){echo "checked";} ?>> Bow &amp; Skew &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING MARTINDLE" <?php if(in_array("PILLING MARTINDLE",$detail)){echo "checked";} ?>> Pilling Martindale &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FABRIC WEIGHT & SHRINKAGE & SPIRALITY" <?php if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail)){echo "checked";} ?>> Fabric Weight &amp; Shrinkage &amp; Spirality 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING BOX" <?php if(in_array("PILLING BOX",$detail)){echo "checked";} ?>> Pilling Box &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING RANDOM TUMBLER" <?php if(in_array("PILLING RANDOM TUMBLER",$detail)){echo "checked";} ?>> Pilling Random Tumbler  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="ABRATION" <?php if(in_array("ABRATION",$detail)){echo "checked";} ?>> Abration
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="SNAGGING MACE" <?php if(in_array("SNAGGING MACE",$detail)){echo "checked";} ?>> Snagging Mace &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="SNAGGING POD" <?php if(in_array("SNAGGING POD",$detail)){echo "checked";} ?>> Snagging Pod &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="BEAN BAG" <?php if(in_array("BEAN BAG",$detail)){echo "checked";} ?>> Bean Bag
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="BURSTING STRENGTH" <?php if(in_array("BURSTING STRENGTH",$detail)){echo "checked";} ?>> Bursting Strength &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="THICKNESS" <?php if(in_array("THICKNESS",$detail)){echo "checked";} ?>> Thickness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="STRETCH & RECOVERY" <?php if(in_array("STRETCH & RECOVERY",$detail)){echo "checked";} ?>> Stretch &amp; Recovery 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="GROWTH" <?php if(in_array("GROWTH",$detail)){echo "checked";} ?>> Growth &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="APPEARANCE" <?php if(in_array("APPEARANCE",$detail)){echo "checked";} ?>> Appearance &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="HEAT SHRINKAGE" <?php if(in_array("HEAT SHRINKAGE",$detail)){echo "checked";} ?>> Heat Shrinkage 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="FIBRE/FUZZ" <?php if(in_array("FIBRE/FUZZ",$detail)){echo "checked";} ?>> Fibre/Fuzz &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING LOCUS" <?php if(in_array("PILLING LOCUS",$detail)){echo "checked";} ?>> Pilling Locus &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="ODOUR" <?php if(in_array("ODOUR",$detail)){echo "checked";} ?>> Odour
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="CURLING" <?php if(in_array("CURLING",$detail)){echo "checked";} ?>> Curling &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="NEDLE" <?php if(in_array("NEDLE",$detail)){echo "checked";} ?>> Nedle Holes & Cracking &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
						</label>
					</div>
                    <div class="form-group">
                        <span class='badge bg-blue'><label for="functional" class="col-sm-2">FUNCTIONAL &amp; PH</label></span>
                     </div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="functional[]" value="WICKING" <?php if(in_array("WICKING",$detail1)){echo "checked";} ?>> Wicking &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="ABSORBENCY" <?php if(in_array("ABSORBENCY",$detail1)){echo "checked";} ?>> Absorbency &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="DRYING TIME" <?php if(in_array("DRYING TIME",$detail1)){echo "checked";} ?>> Drying Time
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="functional[]" value="WATER REPPELENT" <?php if(in_array("WATER REPPELENT",$detail1)){echo "checked";} ?>> Water Reppelent &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="PH" <?php if(in_array("PH",$detail1)){echo "checked";} ?>> PH &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="SOIL RELEASE" <?php if(in_array("SOIL RELEASE",$detail1)){echo "checked";} ?>> Soil Release 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="functional[]" value="HUMIDITY" <?php if(in_array("HUMIDITY",$detail1)){echo "checked";} ?>> Humidity &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
					</div>
                    <div class="form-group">
                        <span class='badge bg-blue'><label for="colorfastness" class="col-sm-2">COLORFASTNESS</label></span>
                     </div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WASHING" <?php if(in_array("WASHING",$detail2)){echo "checked";} ?>> Washing Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ACID" <?php if(in_array("PERSPIRATION ACID",$detail2)){echo "checked";} ?>> Perpiration Fastness Acid &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ALKALINE" <?php if(in_array("PERSPIRATION ALKALINE",$detail2)){echo "checked";} ?>> Perpiration Fastness Alkaline
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WATER" <?php if(in_array("WATER",$detail2)){echo "checked";} ?>> Water Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="CROCKING" <?php if(in_array("CROCKING",$detail2)){echo "checked";} ?>> Crocking Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PHENOLIC YELLOWING" <?php if(in_array("PHENOLIC YELLOWING",$detail2)){echo "checked";} ?>> Phenolic Yellowing 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT" <?php if(in_array("LIGHT",$detail2)){echo "checked";} ?>> Light Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION-OVEN TEST" <?php if(in_array("COLOR MIGRATION-OVEN TEST",$detail2)){echo "checked";} ?>> Color Migration - Oven Test &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION" <?php if(in_array("COLOR MIGRATION",$detail2)){echo "checked";} ?>> Color Migration Fastness
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT PERSPIRATION" <?php if(in_array("LIGHT PERSPIRATION",$detail2)){echo "checked";} ?>> Light Perspiration &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SALIVA" <?php if(in_array("SALIVA",$detail2)){echo "checked";} ?>> Saliva Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="BLEEDING" <?php if(in_array("BLEEDING",$detail2)){echo "checked";} ?>> Bleeding 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="CHLORIN & NON-CHLORIN" <?php if(in_array("CHLORIN & NON-CHLORIN",$detail2)){echo "checked";} ?>> Chlorin &amp; Non-Chlorin &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="DYE TRANSFER" <?php if(in_array("DYE TRANSFER",$detail2)){echo "checked";} ?>> Dye Transfer  &amp;  &nbsp;&nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SWEAT CONCEAL" <?php if(in_array("SWEAT CONCEAL",$detail2)){echo "checked";} ?>> Sweat Conceal  
						</label>
					</div>
                    <?php } ?>
				</form>
                
                <?php }else{ ?>
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                     <div class="form-group">
                        <span class='badge bg-blue'><label for="physical" class="col-sm-2">PHYSICAL</label></span>
                     </div>
					 <div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="FLAMMABILITY"> Flammability &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FIBER CONTENT"> Fiber Content  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FABRIC COUNT"> Fabric Count
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="BOW & SKEW"> Bow &amp; Skew &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING MARTINDLE"> Pilling Martindale &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="FABRIC WEIGHT & SHRINKAGE & SPIRALITY"> Fabric Weight &amp; Shrinkage &amp; Spirality 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING BOX"> Pilling Box &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING RANDOM TUMBLER"> Pilling Random Tumbler  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="ABRATION"> Abration
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="SNAGGING MACE"> Snagging Mace &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="SNAGGING POD"> Snagging Pod &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="BEAN BAG"> Bean Bag
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="BURSTING STRENGTH"> Bursting Strength &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="THICKNESS"> Thickness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="STRETCH & RECOVERY"> Stretch &amp; Recovery 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="GROWTH"> Growth &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="APPEARANCE"> Appearance &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="HEAT SHRINKAGE"> Heat Shrinkage 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="FIBRE/FUZZ"> Fibre/Fuzz &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="PILLING LOCUS"> Pilling Locus &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="ODOUR"> Odour
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="physical[]" value="CURLING"> Curling &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="physical[]" value="NEDLE"> Nedle Holes & Cracking &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
					</div>
                    <div class="form-group">
                        <span class='badge bg-blue'><label for="functional" class="col-sm-2">FUNCTIONAL &amp; PH</label></span>
                     </div>
					<div class="form-group">
					<label><input type="checkbox" class="minimal" name="functional[]" value="WICKING"> Wicking &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="ABSORBENCY"> Absorbency &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="DRYING TIME"> Drying Time
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="functional[]" value="WATER REPPELENT"> Water Reppelent &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="PH"> PH &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="functional[]" value="SOIL RELEASE"> Soil Release 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="functional[]" value="HUMIDITY"> Humidity &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
					</div>
                    <div class="form-group">
                        <span class='badge bg-blue'><label for="colorfastness" class="col-sm-2">COLORFASTNESS</label></span>
                     </div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WASHING"> Washing Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ACID"> Perpiration Fastness Acid &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PERSPIRATION ALKALINE"> Perpiration Fastness Alkaline
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="WATER"> Water Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="CROCKING"> Crocking Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="PHENOLIC YELLOWING"> Phenolic Yellowing 
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT"> Light Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION-OVEN TEST"> Color Migration - Oven Test &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="COLOR MIGRATION"> Color Migration Fastness
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="LIGHT PERSPIRATION"> Light Perspiration &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SALIVA"> Saliva Fastness &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="BLEEDING"> Bleeding
						</label>
					</div>
					<div class="form-group">
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="CHLORIN & NON-CHLORIN"> Chlorin &amp; Non-Chlorin &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="DYE TRANSFER"> Dye Transfer &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
						</label>
						<label><input type="checkbox" class="minimal" name="colorfastness[]" value="SWEAT CONCEAL"> Sweat Conceal &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						</label>
					</div>
				</form>
			<?php } ?>
</div>
<!-- /.col -->
<?php } ?>
</div>
  <div class="box-footer">
  <button type="submit" value="cari" class="btn btn-info">Cari Data</button>
  <?php if($_GET['nodemand']!=""){ ?> 	
   <button type="submit" class="btn btn-primary pull-left" <?php if($_POST['buyer']==""){echo "disabled";}?> name="save" value="save"><i class="fa fa-save"></i> Simpan</button> 
   <div class="btn-group pull-right">	
   <a href="pages/cetak/cetak_label_list_test.php?idkk=<?php echo $_GET['nodemand']; ?>" target="_blank" class="btn btn-warning">Cetak List Test</a> 	   
   <a href="pages/cetak/cetak_label_new.php?idkk=<?php echo $_GET['nodemand']; ?>&po=<?php echo $PO; ?>&item=<?php echo $Item; ?>&warna=<?php echo $Warna; ?>&buyer=<?php echo $Langganan; ?>" target="_blank" class="btn btn-danger ">Cetak</a> 
   </div>
   <?php } ?>
   </div>
    <!-- /.box-footer -->
</div>
<?php } ?>
</form>
						
                    </div>
                </div>
            </div>
        </div>
<?php

function no_demand_insert($no_demand_urutan,$sortby,$id_nokk) {
	if ($no_demand_urutan !='') {
		include"koneksi.php";
		$sql_no_demand =mysqli_query($con,"INSERT INTO tbl_tq_nokk_demand (id, id_nokk,nodemand,sort_by) VALUES (NULL, '$id_nokk','$no_demand_urutan','$sortby')");				
	}
}

/*
if($_POST['save']=="save") {
	
	$id_nokk = '999';
	no_demand_insert($_POST['no_demand_2'],2,$id_nokk);
	no_demand_insert($_POST['no_demand_3'],3,$id_nokk);
	no_demand_insert($_POST['no_demand_4'],4,$id_nokk);
	no_demand_insert($_POST['no_demand_5'],5,$id_nokk);
	no_demand_insert($_POST['no_demand_6'],6,$id_nokk);
	exit;	
}

$con = 1;
*/

if($_POST['save']=="save" AND $cekNoTes>0){
	echo "<script>swal({
		title: 'No Test Duplikat!',   
		text: 'Silahkan untuk input data kembali',
		type: 'info',
		}).then((result) => {
		if (result.value) {
		   window.location.href='KainInNew';
		   
		}
	  });</script>";
}else if($_POST['save']=="save" and $cekMB>0){
	//$con=mysqli_connect("localhost","root","");
	//$db=mysqli_select_db("db_qc",$con)or die("Gagal Koneksi");	
	//$con=mysqli_connect("10.0.0.10","dit","4dm1n");
    //$db=mysqli_select_db("db_qc",$con)or die("Gagal Koneksi");
function nourut()
{
	include"koneksi.php";
    $format = date("ym");
    $sql=mysqli_query($con,"SELECT no_id FROM tbl_tq_nokk WHERE substr(no_id,1,4) like '%".$format."%' ORDER BY no_id DESC LIMIT 1 ") or die(mysqli_error());
    $d=mysqli_num_rows($sql);
    if ($d>0) {
        $r=mysqli_fetch_array($sql);
        $d=$r['no_id'];
        $str=substr($d, 4, 4);
        $Urut = (int)$str;
    } else {
        $Urut = 0;
    }
    $Urut = $Urut + 1;
    $Nol="";
    $nilai=4-strlen($Urut);
    for ($i=1;$i<=$nilai;$i++) {
        $Nol= $Nol."0";
    }
    $no1 =$format.$Nol.$Urut;
    return $no1;
}

function autono_test_save()
{
	include"koneksi.php";
	date_default_timezone_set('Asia/Jakarta');
    $bln= date("Ym");
    $today= date("Ymd");
    $sqlnotes = mysqli_query($con,"SELECT no_test FROM tbl_tq_nokk WHERE substr(no_test,1,6) like '%".$bln."%' ORDER BY no_test DESC LIMIT 1") or die(mysqli_error());
    $dt=mysqli_num_rows($sqlnotes);
    if ($dt>0) {
        $rd=mysqli_fetch_array($sqlnotes);
        $dt=$rd['no_test'];
        $strd=substr($dt, 8, 4);
        $Urutd = (int)$strd;
    } else {
        $Urutd = 0;
    }
    $Urutd = $Urutd + 1;
    $Nold="";
    $nilaid=4-strlen($Urutd);
    for ($i=1;$i<=$nilaid;$i++) {
        $Nold= $Nold."0";
    }
    $no2 =$today.$Nold.$Urutd;
    //$no2 =$today.str_pad($Urutd, 4, "0",  STR_PAD_LEFT);
    return $no2;
}

$notest = autono_test_save();
$nourut=nourut();	
	  $warna=str_replace("'","''",$_POST['warna']);
	  $nowarna=str_replace("'","''",$_POST['no_warna']);	
	  $jns=str_replace("'","''",$_POST['jns_kain']);
	  $po=str_replace("'","''",$_POST['no_po']);
	  $season=str_replace("'","''",$_POST['season']);
	  $lot=trim($_POST['lot']);
      $checkbox1=$_POST['physical'];
      $checkbox2=$_POST['functional'];
      $checkbox3=$_POST['colorfastness'];
	  $buyer=strtoupper($_POST['buyer']);
	  $noitem=strtoupper($_POST['no_itemtest']);
	  $notestmaster=$_POST['no_testmaster'];
	  $ip= $_SERVER['REMOTE_ADDR'];
	  if($_POST['nokk']==''){$nokk=$_POST['nodemand'];}else{$nokk=$_POST['nokk'];}
	  $target = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')));
      $chkp="";
      $chkf="";
      $chkc="";   
		foreach($checkbox1 as $chk1)  
   		{  
      		$chkp .= $chk1.",";  
        }
        foreach($checkbox2 as $chk2)  
   		{  
      		$chkf .= $chk2.",";  
        } 
        foreach($checkbox3 as $chk3)  
   		{  
      		$chkc .= $chk3.",";  
   		}  
  	  $sqlData=mysqli_query($con,"INSERT INTO tbl_tq_nokk SET 
	  	  no_id='$nourut',	
		  nokk='$nokk',
		  nodemand='$_POST[nodemand]',
		  no_test='$notest',
		  pelanggan='$_POST[pelanggan]',
		  no_order='$_POST[no_order]',
		  no_hanger='$_POST[no_hanger]',
		  no_item='$_POST[no_item]',
		  no_po='$po',
		  jenis_kain='$jns',
		  lebar='$_POST[lebar]',
		  gramasi='$_POST[grms]',
		  berat='$_POST[berat]',
		  rol='$_POST[rol]',
		  lot='$lot',
		  warna='$warna',
		  no_warna='$nowarna',
		  tgl_fin=now(),
		  proses_fin='$_POST[proses]',
		  suhu='$_POST[suhu]',
		  tgl_masuk=now(),
          buyer='$buyer',
		  development='$_POST[development]',
		  tgl_target='$target',
		  season='$season',
		  kk_legacy='$_POST[kk_legacy]',
		  lot_legacy='$_POST[lot_legacy]',
		  ip='$ip',
		  tgl_update=now(),
		  area='$_POST[area]'");
			
			if ($sqlData) { // if no demand multiplw 
				$id_nokk = mysqli_insert_id($con);
				no_demand_insert($_POST['no_demand_2'],2,$id_nokk);
				no_demand_insert($_POST['no_demand_3'],3,$id_nokk);
				no_demand_insert($_POST['no_demand_4'],4,$id_nokk);
				no_demand_insert($_POST['no_demand_5'],5,$id_nokk);
				no_demand_insert($_POST['no_demand_6'],6,$id_nokk);
			
	
	
		$sqlData2=mysqli_query($con,"INSERT INTO tbl_master_test SET
			buyer='$buyer',
			no_testmaster='$notest',
			physical='$chkp',
			functional='$chkf',
			colorfastness='$chkc',
			tgl_update=now()");
		$sqlData3=mysqli_query($con,"UPDATE tbl_masterbuyer_test SET
			buyer='$buyer',
			physical='$chkp',
			functional='$chkf',
			colorfastness='$chkc',
			tgl_update=now()
			WHERE buyer='$buyer'");

		
			
			

			
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
     window.open('pages/cetak/cetak_label_new.php?idkk=$_GET[nodemand]','_blank');	
	 window.location.href='KainInNew';
	 
  }
});</script>";
	}
				
}else if($_POST['save']=="save" AND $_POST['physical']=="" AND $_POST['functional']=="" AND $_POST['colorfastness']==""){
	echo "<script>swal({
		title: 'Data Testing Tidak Boleh Kosong!',   
		text: 'Klik Ok untuk input data kembali',
		type: 'info',
		}).then((result) => {
		if (result.value) {
		   window.location.href='KainInNew';
		   
		}
	  });</script>";
 }else if($_POST['save']=="save"){
	function nourut()
	{
		include"koneksi.php";
		$format = date("ym");
		$sql=mysqli_query($con,"SELECT no_id FROM tbl_tq_nokk WHERE substr(no_id,1,4) like '%".$format."%' ORDER BY no_id DESC LIMIT 1 ") or die(mysqli_error());
		$d=mysqli_num_rows($sql);
		if ($d>0) {
			$r=mysqli_fetch_array($sql);
			$d=$r['no_id'];
			$str=substr($d, 4, 4);
			$Urut = (int)$str;
		} else {
			$Urut = 0;
		}
		$Urut = $Urut + 1;
		$Nol="";
		$nilai=4-strlen($Urut);
		for ($i=1;$i<=$nilai;$i++) {
			$Nol= $Nol."0";
		}
		$no1 =$format.$Nol.$Urut;
		return $no1;
	}
	
	function autono_test_save()
	{
		include"koneksi.php";
		date_default_timezone_set('Asia/Jakarta');
		$bln= date("Ym");
		$today= date("Ymd");
		$sqlnotes = mysqli_query($con,"SELECT no_test FROM tbl_tq_nokk WHERE substr(no_test,1,6) like '%".$bln."%' ORDER BY no_test DESC LIMIT 1") or die(mysqli_error());
		$dt=mysqli_num_rows($sqlnotes);
		if ($dt>0) {
			$rd=mysqli_fetch_array($sqlnotes);
			$dt=$rd['no_test'];
			$strd=substr($dt, 8, 4);
			$Urutd = (int)$strd;
		} else {
			$Urutd = 0;
		}
		$Urutd = $Urutd + 1;
		$Nold="";
		$nilaid=4-strlen($Urutd);
		for ($i=1;$i<=$nilaid;$i++) {
			$Nold= $Nold."0";
		}
		$no2 =$today.$Nold.$Urutd;
		//$no2 =$today.str_pad($Urutd, 4, "0",  STR_PAD_LEFT);
		return $no2;
	}
		
	  $nourut=nourut();	
	  $notest = autono_test_save();
	  $warna=str_replace("'","''",$_POST['warna']);
	  $nowarna=str_replace("'","''",$_POST['no_warna']);	
	  $jns=str_replace("'","''",$_POST['jns_kain']);
	  $po=str_replace("'","''",$_POST['no_po']);
	  $lot=trim($_POST['lot']);
	  $checkbox1=$_POST['physical'];
      $checkbox2=$_POST['functional'];
      $checkbox3=$_POST['colorfastness'];
	  $buyer=strtoupper($_POST['buyer']);
	  $noitem=strtoupper($_POST['no_itemtest']);
	  $notestmaster=$_POST['no_testmaster'];
	  $ip= $_SERVER['REMOTE_ADDR'];
	  $target = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')));
      $chkp="";
      $chkf="";
      $chkc="";   
		foreach($checkbox1 as $chk1)  
   		{  
      		$chkp .= $chk1.",";  
        }
        foreach($checkbox2 as $chk2)  
   		{  
      		$chkf .= $chk2.",";  
        } 
        foreach($checkbox3 as $chk3)  
   		{  
      		$chkc .= $chk3.",";  
   		}   
  	  $sqlData=mysqli_query($con,"INSERT INTO tbl_tq_nokk SET 
	  	  no_id='$nourut',	
		  nokk='$_POST[nokk]',
		  nodemand='$_POST[nodemand]',
		  no_test='$notest',
		  pelanggan='$_POST[pelanggan]',
		  no_order='$_POST[no_order]',
		  no_hanger='$_POST[no_hanger]',
		  no_item='$_POST[no_item]',
		  no_po='$po',
		  jenis_kain='$jns',
		  lebar='$_POST[lebar]',
		  gramasi='$_POST[grms]',
		  lot='$lot',
		  berat='$_POST[berat]',
		  rol='$_POST[rol]',
		  warna='$warna',
		  no_warna='$nowarna',
		  tgl_fin=now(),
		  proses_fin='$_POST[proses]',
		  suhu='$_POST[suhu]',
		  tgl_masuk=now(),
          buyer='$buyer',
		  development='$_POST[development]',
		  tgl_target='$target',
		  kk_legacy='$_POST[kk_legacy]',
		  lot_legacy='$_POST[lot_legacy]',
		  ip='$ip',
		  tgl_update=now()");
		$sqlData1=mysqli_query($con,"INSERT INTO tbl_masterbuyer_test SET
			buyer='$buyer',
			physical='$chkp',
            functional='$chkf',
            colorfastness='$chkc',
			tgl_update=now()
		");
		$sqlData2=mysqli_query($con,"INSERT INTO tbl_master_test SET
			buyer='$buyer',
			no_testmaster='$notest',
			physical='$chkp',
            functional='$chkf',
            colorfastness='$chkc',
			tgl_update=now()
		");	 	  
	  
		if($sqlData2){
			
			echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
     window.open('pages/cetak/cetak_label_new.php?idkk=$_GET[nodemand]','_blank');	
	 window.location.href='KainInNew';
	 
  }
});</script>";
		}
	}

?>

<div class="modal fade" id="DataSeason">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Season</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="nama" class="col-md-3 control-label">Nama Season</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="nama" name="nama" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_season" id="simpan_season" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_season']=="Simpan"){
	$nama=strtoupper($_POST['nama']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_season_validity SET 
		  nama='$nama'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='KainInNew-$nodemand';
	 
  }
});</script>";
		}
}
?>
