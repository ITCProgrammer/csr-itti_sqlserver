<?PHP
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

function sqlsrv_escape_string($value) {
	return str_replace("'", "''", $value);
}
function format_decimal_2($value) {
if ($value === null || $value === '') {
return '0.00';
}
if (is_numeric($value)) {
return number_format((float)$value, 2, '.', '');
}
return $value;
}

?>
<?php 
	
	
	
	function qty_order($nodemand) {
			global $conn1;
			$placeholders = "'" . implode("','", $nodemand) . "'";
			$query = "SELECT
              D.CODE AS DEMAND,
              G.PRODUCTIONORDERCODE,
              BUSINESSPARTNER.LEGALNAME1 AS LANGGANAN,
              ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER,
              CASE
                  WHEN SALESORDER.EXTERNALREFERENCE IS NULL THEN SALESORDERLINE.EXTERNALREFERENCE
                  ELSE SALESORDER.EXTERNALREFERENCE
              END AS PO_NUMBER,
              SALESORDERLINE.SALESORDERCODE,
              TRIM(H.NO_ITEM) AS NO_ITEM,
              TRIM(SALESORDERLINE.SUBCODE02) AS SUBCODE02,
              TRIM(SALESORDERLINE.SUBCODE03) AS SUBCODE03,
              SALESORDERLINE.ITEMDESCRIPTION,
              J.VALUEDECIMAL AS LEBAR,
              I.VALUEDECIMAL AS GRAMASI,
              A.WARNA,
              TRIM(SALESORDERLINE.SUBCODE05) AS NO_WARNA,
              SALESORDER.REQUIREDDUEDATE AS TGL_DELIVERY,
              SUM(SALESORDERLINE.USERPRIMARYQUANTITY) AS QTY_ORDER,
              SUM(SALESORDERLINE.USERSECONDARYQUANTITY) AS QTY_PANJANG_ORDER,
              SALESORDERLINE.USERSECONDARYUOMCODE AS UOM_ORDER_SECOND,
              F.QTY_BRUTO,
              O.TGL_INSPEK,
              P.COMMENT_INSPEK,
              M.TGL_PACKING,
              K.TOTAL_ROLL AS TOTAL_ROLL_PACKING,
              K.TOTAL_KG AS TOTAL_KG_PACKING,
              K.TOTAL_YARD AS TOTAL_YARD_PACKING,
              N.TOTAL_ROLL AS TOTAL_ROLL_FOC,
              N.TOTAL_KG AS TOTAL_KG_FOC,
              N.TOTAL_YARD AS TOTAL_YARD_FOC,
              CASE
                  WHEN D.TEMPLATECODE = '310' THEN 'KK SALINAN'
                  ELSE '-'
              END AS SALINAN,
              D.EXTERNALREFERENCE,
              D.INTERNALREFERENCE,
              D.ABSUNIQUEID,
              S.ORIGINALPD,
              T.DEPT,
              U.DEF,
              V.DEFNOTE
          FROM
              SALESORDER SALESORDER
          LEFT JOIN SALESORDERLINE SALESORDERLINE ON
              SALESORDER.CODE = SALESORDERLINE.SALESORDERCODE
          LEFT JOIN ORDERPARTNER ORDERPARTNER ON
              SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNER.CUSTOMERSUPPLIERCODE
          LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER ON
              ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID = BUSINESSPARTNER.NUMBERID
          LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON
              SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE
              AND SALESORDER.FNCORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE
          LEFT JOIN (
              SELECT ITXVIEWCOLOR.* FROM ITXVIEWCOLOR ITXVIEWCOLOR) A ON
              SALESORDERLINE.ITEMTYPEAFICODE = A.ITEMTYPECODE AND 
              SALESORDERLINE.SUBCODE01 = A.SUBCODE01 AND 
              SALESORDERLINE.SUBCODE02 = A.SUBCODE02 AND 
              SALESORDERLINE.SUBCODE03 = A.SUBCODE03 AND 
              SALESORDERLINE.SUBCODE04 = A.SUBCODE04 AND 
              SALESORDERLINE.SUBCODE05 = A.SUBCODE05 AND 
              SALESORDERLINE.SUBCODE06 = A.SUBCODE06 AND 
              SALESORDERLINE.SUBCODE07 = A.SUBCODE07 AND 
              SALESORDERLINE.SUBCODE08 = A.SUBCODE08 AND 
              SALESORDERLINE.SUBCODE09 = A.SUBCODE09 AND 
              SALESORDERLINE.SUBCODE10 = A.SUBCODE10
          LEFT JOIN (
              SELECT
                  PRODUCTIONDEMAND.CODE,
                  PRODUCTIONDEMAND.TEMPLATECODE,
                  PRODUCTIONDEMAND.EXTERNALREFERENCE,
                  PRODUCTIONDEMAND.INTERNALREFERENCE,
                  PRODUCTIONDEMAND.PROJECTCODE,
                  PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE,
                  PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE,
                  PRODUCTIONDEMAND.ABSUNIQUEID
              FROM
                  PRODUCTIONDEMAND PRODUCTIONDEMAND
              WHERE
                  PRODUCTIONDEMAND.ITEMTYPEAFICODE = 'KFF') D ON
              SALESORDERLINE.SALESORDERCODE = D.ORIGDLVSALORDLINESALORDERCODE
              AND SALESORDERLINE.ORDERLINE = D.ORIGDLVSALORDERLINEORDERLINE
          LEFT JOIN (
              SELECT
                  PRODUCTIONRESERVATION.ORDERCODE,
                  SUM(PRODUCTIONRESERVATION.USEDBASEPRIMARYQUANTITY) AS QTY_BRUTO,
                  PRODUCTIONRESERVATION.BASEPRIMARYUOMCODE AS UOM_BAGIKAIN_KG,
                  SUM(PRODUCTIONRESERVATION.USEDBASESECONDARYQUANTITY) AS QTY_BRUTO_SECOND,
                  PRODUCTIONRESERVATION.BASESECONDARYUOMCODE AS UOM_BAGIKAIN_SECOND
              FROM
                  PRODUCTIONRESERVATION PRODUCTIONRESERVATION
              WHERE
                  PRODUCTIONRESERVATION.ITEMTYPEAFICODE = 'KGF'
              GROUP BY
                  PRODUCTIONRESERVATION.ORDERCODE,
                  PRODUCTIONRESERVATION.BASEPRIMARYUOMCODE,
                  PRODUCTIONRESERVATION.BASESECONDARYUOMCODE) F ON
              D.CODE = F.ORDERCODE
          LEFT JOIN (
              SELECT
                  PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
                  PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
              FROM
                  PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
              WHERE
                  PRODUCTIONDEMANDSTEP.OPERATIONCODE = 'CNP1'
              GROUP BY
                  PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
                  PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) G ON
              D.CODE = G.PRODUCTIONDEMANDCODE
          LEFT JOIN (
              SELECT
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
                  ORDERITEMORDERPARTNERLINK.LONGDESCRIPTION AS NO_ITEM
              FROM
                  ORDERITEMORDERPARTNERLINK ORDERITEMORDERPARTNERLINK) H ON
              SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = H.ORDPRNCUSTOMERSUPPLIERCODE
              AND SALESORDERLINE.ITEMTYPEAFICODE = H.ITEMTYPEAFICODE
              AND SALESORDERLINE.SUBCODE01 = H.SUBCODE01
              AND SALESORDERLINE.SUBCODE02 = H.SUBCODE02
              AND SALESORDERLINE.SUBCODE03 = H.SUBCODE03
              AND SALESORDERLINE.SUBCODE04 = H.SUBCODE04
              AND SALESORDERLINE.SUBCODE05 = H.SUBCODE05
              AND SALESORDERLINE.SUBCODE06 = H.SUBCODE06
              AND SALESORDERLINE.SUBCODE07 = H.SUBCODE07
              AND SALESORDERLINE.SUBCODE08 = H.SUBCODE08
              AND SALESORDERLINE.SUBCODE09 = H.SUBCODE09
              AND SALESORDERLINE.SUBCODE10 = H.SUBCODE10
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
                  ADSTORAGE.VALUEDECIMAL) I ON
              SALESORDERLINE.SUBCODE01 = I.SUBCODE01
              AND SALESORDERLINE.SUBCODE02 = I.SUBCODE02
              AND SALESORDERLINE.SUBCODE03 = I.SUBCODE03
              AND SALESORDERLINE.SUBCODE04 = I.SUBCODE04
              AND SALESORDERLINE.SUBCODE05 = I.SUBCODE05
              AND SALESORDERLINE.SUBCODE06 = I.SUBCODE06
              AND SALESORDERLINE.SUBCODE07 = I.SUBCODE07
              AND SALESORDERLINE.SUBCODE08 = I.SUBCODE08
              AND SALESORDERLINE.SUBCODE09 = I.SUBCODE09
              AND SALESORDERLINE.SUBCODE10 = I.SUBCODE10
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
              SALESORDERLINE.SUBCODE01 = J.SUBCODE01
              AND SALESORDERLINE.SUBCODE02 = J.SUBCODE02
              AND SALESORDERLINE.SUBCODE03 = J.SUBCODE03
              AND SALESORDERLINE.SUBCODE04 = J.SUBCODE04
              AND SALESORDERLINE.SUBCODE05 = J.SUBCODE05
              AND SALESORDERLINE.SUBCODE06 = J.SUBCODE06
              AND SALESORDERLINE.SUBCODE07 = J.SUBCODE07
              AND SALESORDERLINE.SUBCODE08 = J.SUBCODE08
              AND SALESORDERLINE.SUBCODE09 = J.SUBCODE09
              AND SALESORDERLINE.SUBCODE10 = J.SUBCODE10
          LEFT JOIN (
              SELECT
                  ELEMENTSINSPECTION.DEMANDCODE,
                  COUNT(ELEMENTSINSPECTION.ELEMENTCODE) AS TOTAL_ROLL,
                  SUM(ELEMENTSINSPECTION.WEIGHTNET) AS TOTAL_KG,
                  SUM(ELEMENTSINSPECTION.LENGTHGROSS) AS TOTAL_YARD
              FROM
                  ELEMENTSINSPECTION ELEMENTSINSPECTION
              WHERE
                  LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))= 13
              GROUP BY
                  ELEMENTSINSPECTION.DEMANDCODE) K ON
              D.CODE = K.DEMANDCODE
          LEFT JOIN (
              SELECT
                  ELEMENTSINSPECTION.DEMANDCODE,
                  LISTAGG(DISTINCT(TRIM(LEFT(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME, 10))),
                  ',') AS TGL_PACKING
              FROM
                  ELEMENTSINSPECTION ELEMENTSINSPECTION
              WHERE
                  LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))= 13
              GROUP BY
                  ELEMENTSINSPECTION.DEMANDCODE) M ON
              D.CODE = M.DEMANDCODE
          LEFT JOIN (
              SELECT
                  ELEMENTSINSPECTION.DEMANDCODE,
                  COUNT(ELEMENTSINSPECTION.ELEMENTCODE) AS TOTAL_ROLL,
                  SUM(ELEMENTSINSPECTION.WEIGHTGROSS) AS TOTAL_KG,
                  SUM(ELEMENTSINSPECTION.LENGTHGROSS) AS TOTAL_YARD
              FROM
                  ELEMENTSINSPECTION ELEMENTSINSPECTION
              WHERE
                  LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))= 13
                      AND ELEMENTSINSPECTION.QUALITYREASONCODE = 'FOC'
                  GROUP BY
                      ELEMENTSINSPECTION.DEMANDCODE) N ON
              D.CODE = N.DEMANDCODE
          LEFT JOIN (
              SELECT
                  ELEMENTSINSPECTION.DEMANDCODE,
                  LISTAGG(DISTINCT(TRIM(LEFT(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME, 10))),
                  ',') AS TGL_INSPEK
              FROM
                  ELEMENTSINSPECTION ELEMENTSINSPECTION
              WHERE
                  LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))= 11
              GROUP BY
                  ELEMENTSINSPECTION.DEMANDCODE) O ON
              D.CODE = O.DEMANDCODE
          LEFT JOIN (
              SELECT
                  PRODUCTIONDEMANDSTEPCOMMENT.PRODEMANDSTEPPRODEMANDCODE,
                  CAST(PRODUCTIONDEMANDSTEPCOMMENT.COMMENTTEXT AS VARCHAR(5000)) AS COMMENT_INSPEK
              FROM
                  PRODUCTIONDEMANDSTEPCOMMENT PRODUCTIONDEMANDSTEPCOMMENT
              WHERE
                  PRODUCTIONDEMANDSTEPCOMMENT.PRODUCTIONDEMANDSTEPSTEPNUMBER = 600) P ON
              D.CODE = P.PRODEMANDSTEPPRODEMANDCODE
          LEFT JOIN (
              SELECT
                  ALLOCATION.LOTCODE,
                  COUNT(ALLOCATION.ITEMELEMENTCODE) AS TOTAL_ROLL,
                  SUM(ALLOCATION.USERPRIMARYQUANTITY) AS TOTAL_KG,
                  SUM(ALLOCATION.USERSECONDARYQUANTITY) AS TOTAL_YARD
              FROM
                  ALLOCATION ALLOCATION
              WHERE
                  LENGTH(TRIM(ALLOCATION.ITEMELEMENTCODE))= 13
                      AND ALLOCATION.TEMPLATECODE = '004'
                  GROUP BY
                      ALLOCATION.LOTCODE) R ON
              G.PRODUCTIONORDERCODE = R.LOTCODE
            LEFT JOIN (
                SELECT ADSTORAGE.UNIQUEID, ADSTORAGE.VALUESTRING AS ORIGINALPD
                FROM ADSTORAGE ADSTORAGE 
                WHERE ADSTORAGE.NAMENAME ='OriginalPDCode'
            ) S ON D.ABSUNIQUEID = S.UNIQUEID
            LEFT JOIN (
                SELECT ADSTORAGE.UNIQUEID, ADSTORAGE.VALUESTRING AS BAGIAN, DEPARTMENT.LONGDESCRIPTION AS DEPT
                FROM ADSTORAGE ADSTORAGE 
                LEFT JOIN DEPARTMENT DEPARTMENT
                ON ADSTORAGE.VALUESTRING = DEPARTMENT.CODE 
                WHERE ADSTORAGE.NAMENAME ='Bagian'
            ) T ON D.ABSUNIQUEID = T.UNIQUEID
            LEFT JOIN (
                SELECT ADSTORAGE.UNIQUEID, ADSTORAGE.VALUESTRING AS DEFTYPE, USERGENERICGROUP.LONGDESCRIPTION AS DEF
                FROM ADSTORAGE ADSTORAGE 
                LEFT JOIN USERGENERICGROUP USERGENERICGROUP 
                ON ADSTORAGE.VALUESTRING = USERGENERICGROUP.CODE 
                WHERE ADSTORAGE.NAMENAME ='DefectType'
            ) U ON D.ABSUNIQUEID = U.UNIQUEID
            LEFT JOIN (
                SELECT ADSTORAGE.UNIQUEID, ADSTORAGE.VALUESTRING AS DEFNOTE
                FROM ADSTORAGE ADSTORAGE 
                WHERE ADSTORAGE.NAMENAME ='DefectNote'
            ) V ON D.ABSUNIQUEID = V.UNIQUEID
          WHERE D.CODE IN ($placeholders) 
          GROUP BY
            D.CODE,
            G.PRODUCTIONORDERCODE,
            BUSINESSPARTNER.LEGALNAME1,
            ORDERPARTNERBRAND.LONGDESCRIPTION,
            SALESORDER.EXTERNALREFERENCE,
            SALESORDERLINE.EXTERNALREFERENCE,
            SALESORDERLINE.SALESORDERCODE,
            H.NO_ITEM,
            SALESORDERLINE.ITEMTYPEAFICODE,
            SALESORDERLINE.SUBCODE02,
            SALESORDERLINE.SUBCODE03,
            SALESORDERLINE.SUBCODE07,
            SALESORDERLINE.ITEMDESCRIPTION,
            I.VALUEDECIMAL,
            J.VALUEDECIMAL,
            A.WARNA,
            SALESORDERLINE.SUBCODE05,
            SALESORDER.REQUIREDDUEDATE,
            SALESORDERLINE.USERSECONDARYUOMCODE,
            F.QTY_BRUTO,
            O.TGL_INSPEK,
            P.COMMENT_INSPEK,
            M.TGL_PACKING,
            K.TOTAL_ROLL,
            K.TOTAL_KG,
            K.TOTAL_YARD,
            N.TOTAL_ROLL,
            N.TOTAL_KG,
            N.TOTAL_YARD,
            D.TEMPLATECODE,
            D.EXTERNALREFERENCE,
            D.INTERNALREFERENCE,
            D.ABSUNIQUEID,
            S.ORIGINALPD,
            T.DEPT,
            U.DEF,
            V.DEFNOTE,
            R.TOTAL_ROLL,
            R.TOTAL_KG,
            R.TOTAL_YARD";
	
	$stmt = db2_exec($conn1, $query,array('cursor'=>DB2_SCROLLABLE) );
	$output = [];
	if (db2_num_rows($stmt) > 0) {
		while ($row = db2_fetch_assoc($stmt)) {
			$stringWithSpaces = $row['DEMAND'];
			$stringWithoutSpaces = preg_replace('/\s+/', '', $stringWithSpaces);
			
			$output[$stringWithoutSpaces] = $row['QTY_ORDER'].'/'.$row['QTY_PANJANG_ORDER'];
		}
	}
	return $output ; 
	}
	
?>
<?php
    $Awal       = isset($_POST['awal']) ? sqlsrv_escape_string($_POST['awal']) : '';
    $Akhir      = isset($_POST['akhir']) ? sqlsrv_escape_string($_POST['akhir']) : '';
    $Order      = isset($_POST['no_order']) ? sqlsrv_escape_string($_POST['no_order']) : '';
    $PO         = isset($_POST['no_po']) ? sqlsrv_escape_string($_POST['no_po']) : '';
    $Item       = isset($_POST['item']) ? sqlsrv_escape_string($_POST['item']) : '';
    $Warna      = isset($_POST['warna']) ? sqlsrv_escape_string($_POST['warna']) : '';
    $Langganan  = isset($_POST['langganan']) ? sqlsrv_escape_string($_POST['langganan']) : '';
    $Delay      = isset($_POST['delay']) ? sqlsrv_escape_string($_POST['delay']) : '';
    $Demand     = isset($_POST['demand']) ? sqlsrv_escape_string($_POST['demand']) : '';
    $Prodorder  = isset($_POST['prodorder']) ? sqlsrv_escape_string($_POST['prodorder']) : '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

</head>
<body>
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Filter Rekap Data Kartu Kerja</h3>
    <div class="box-tools pull-right">
	  <form action="" method="post">
	  <?php 
		$bulanArray = array(
				'01' => 'January',
				'02' => 'February',
				'03' => 'March',
				'04' => 'April',
				'05' => 'May',
				'06' => 'June',
				'07' => 'July',
				'08' => 'August',
				'09' => 'September',
				'10' => 'October',
				'11' => 'November',
				'12' => 'December'
			);
			
			$year_now = date("Y");
			$year_before1 = $year_now-1;
			$year_before2 = $year_now-2;
			$tahun_array = [$year_now,$year_before1,$year_before2];
		
				  ?>
	  <select name="now_bulan" required>
		<option value=""></option>
		<?php foreach ($bulanArray as $bul_key=>$bul_name) {?>
		<option value=<?=$bul_key?> > <?=$bul_name?></option>
		<?php } ?>
	  </select>
	  <select name="now_tahun" required>
		<?php foreach ($tahun_array as $tahun_name) {?>
		<option value=<?=$tahun_name?> > <?=$tahun_name?></option>
		<?php } ?>
	  </select>
	  <button type="submit" name="update_qty_order">Update Qty Order Now</button>
	  </form>
	  
	  <?php 
	
	  
	  if (isset($_POST['update_qty_order'])) {
		    $period = $_POST['now_tahun'].'-'.$_POST['now_bulan'];
		      $code = "SELECT a.id, a.nodemand 
                      FROM db_qc.tbl_qcf a 
                      LEFT JOIN db_qc.tbl_qcf_qty_order b ON a.id = b.id 
                      WHERE a.tgl_masuk LIKE '%$period%' 
                      AND b.id IS NULL 
                      ORDER BY a.id DESC";
			$sql = sqlsrv_query($con,$code);
			if ($sql === false) {
				die(print_r(sqlsrv_errors(), true));
			}
			$array_demand = [] ; 
			while($r=sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)){ 
				$array_demand[$r['id']] = $r['nodemand'];
			}
			
			
			
			
			$qty_order =  qty_order($array_demand);
			//$qty_order = [];
			/*
			echo '<pre>';
				print_r($array_demand);
			echo '</pre>';
			*/
			
			foreach ($array_demand as $key=>$datas) { 
				
				$id = $key ; 
				$exp = explode("/",$qty_order[$datas]); 
				$qty_order1 =  $exp[0];
				$qty_order2 = $exp[1];
				
				/*
				  $sqlData=mysqli_query($con,"UPDATE tbl_qcf_backup SET 
					berat_order_now ='$qty_order1',
					panjang_order_now ='$qty_order2'
					WHERE id='$id'");	
				*/
				$sqlData=sqlsrv_query($con,"insert into db_qc.tbl_qcf_qty_order(id,nodemand,berat_order_now,panjang_order_now) values ('$id','$datas','$qty_order1','$qty_order2')");
				if ($sqlData === false) {
					die(print_r(sqlsrv_errors(), true));
				}					
					
			}
			
				
			//}
		  
		  
		 
	  }
	  
	  ?>
	  <!--
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	  -->
    </div>

  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
    <div class="box-body">
    <div class="form-group">
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
      <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
          </div>
        </div>
        <div class="col-sm-2">
             <input name="no_order" type="text" class="form-control" id="no_order" placeholder="No Order" value="<?php echo $Order; ?>" />
		</div>
		<div class="col-sm-2">
		<input name="no_po" type="text" class="form-control" id="no_po" placeholder="No PO" value="<?php echo $PO; ?>" />
		</div>
		<div class="col-sm-2">
		<input name="item" type="text" class="form-control" id="item" placeholder="Hanger" value="<?php echo $Item; ?>" />
		</div>
		<div class="col-sm-2">
		<input name="warna" type="text" class="form-control" id="warna" placeholder="Warna" value="<?php echo $Warna; ?>" />
        </div>
		<div class="col-sm-2">
		<input name="langganan" type="text" class="form-control" id="langganan" placeholder="Pelanggan" value="<?php echo $Langganan; ?>" />
        </div>  
        <!-- /.input group -->
      </div>
    <div class="form-group">
		  <label for="delay" class="col-sm-0 control-label"></label>		  
      <div class="col-sm-2">
		    <input name="demand" type="text" class="form-control" id="demand" placeholder="Demand" value="<?php echo $Demand; ?>" />
        </div>
        <div class="col-sm-2">
		    <input name="prodorder" type="text" class="form-control" id="prodorder" placeholder="Prod. Order" value="<?php echo $Prodorder; ?>" />
        </div>
        <div class="col-sm-3">
          <input type="checkbox" name="delay" id="delay" value="1" <?php  if($Delay=="1"){ echo "checked";} ?>>  
          <label> Delay > 3 Hari</label>
        </div>		  	
		</div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="pull-right">
        <button type="submit" class="btn btn-success" name="cari" ><i class="fa fa-search"></i> Cari Data</button>
      </div>
    </div>
    <!-- /.box-footer -->

</div>
</form>
	</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data Kartu Kerja</h3><br>
        <b>No Order: <?php echo $_POST['no_order']; ?>
        <div class="pull-right">
            <a href="pages/cetak/rekap-data-excel.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&order=<?php echo $Order; ?>&po=<?php echo $PO; ?>&item=<?php echo $Item; ?>&warna=<?php echo $Warna; ?>&buyer=<?php echo $Langganan; ?>" target="_blank"><span class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel</span></a>
            <a href="pages/cetak/rekap-data.php?order=<?php echo $Order; ?>&po=<?php echo $PO; ?>&item=<?php echo $Item; ?>&warna=<?php echo $Warna; ?>&buyer=<?php echo $Langganan; ?>" target="_blank"><span class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Cetak</span></a>
            <a href="pages/cetak/cetak_lapkkdelay.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>" class="btn btn-primary <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak Lap KK Delay</a> 
        </div>
		    
      </div>
<div class="box-body">
<table id="example3" class="table table-bordered table-hover table-striped display nowrap" width="100%">
<thead class="bg-red">
   <tr>
      <th width="24" rowspan="2"><div align="center">No</div></th>
      <th width="200" rowspan="2"><div align="center">Aksi_detail</div></th>
      <th width="78" rowspan="2"><div align="center">No KK</div></th>
      <th width="78" rowspan="2"><div align="center">No Demand New Server</div></th>
      <th width="70" rowspan="2"><div align="center">Lot Legacy</div></th>
      <th width="78" rowspan="2"><div align="center">Buyer</div></th>
      <th width="78" rowspan="2"><div align="center">Order</div></th>
      <th width="78" rowspan="2"><div align="center">PO</div></th>
      <th width="78" rowspan="2"><div align="center">Qty Order</div></th>
      <th width="88" rowspan="2"><div align="center">Jml Bruto</div></th>
      <th width="111" rowspan="2"><div align="center">Hanger</div></th>
      <th width="142" rowspan="2"><div align="center">Item</div></th>
      <th width="142" rowspan="2"><div align="center">No Warna</div></th>
      <th width="142" rowspan="2"><div align="center">Warna</div></th>
      <th width="155" rowspan="2"><div align="center">Prod. Order/Lot</div></th>
      <th width="155" rowspan="2"><div align="center">L</div></th>
      <th width="155" rowspan="2"><div align="center">Grms</div></th> 
      <th width="70" rowspan="2"><div align="center">Tgl Msk</div></th>
      <th width="70" rowspan="2"><div align="center">Roll</div></th>
      <th width="60" rowspan="2"><div align="center">Netto</div></th>
      <th width="102" rowspan="2"><div align="center">Panjang</div></th>
      <th width="70" rowspan="2"><div align="center">Sisa</div></th>
      <th width="70" rowspan="2"><div align="center">Cek Warna</div></th>
      <th width="70" rowspan="2"><div align="center">Masalah</div></th>
      <th colspan="2"><div align="center">FOC</div></th>
      <th colspan="2"><div align="center">Estimasi FOC</div></th>
      <th width="78" rowspan="2"><div align="center">No Demand Old Server</div></th>
      <th width="78" rowspan="2"><div align="center">Prod. Order Old Server</div></th>
      <th width="70" rowspan="2"><div align="center">Ket</div></th>
      <th width="70" rowspan="2"><div align="center">Availability</div></th>
      </tr>
   <tr>
     <th width="70"><div align="center">KG</div></th>
     <th width="70"><div align="center">Panjang</div></th>
     <th width="70"><div align="center">KG</div></th>
     <th width="70"><div align="center">Panjang</div></th>
     </tr>
</thead>
<tbody>
  <?php
  function get_nodemand($sql) {
	  $nodemand = array();
	  while($r=sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)){
		  $nodemand[]  =$r['nodemand'];
	  }
	  return $nodemand  ;
	  
  }
  
  $no=1;
  if($Awal!=""){ $Where =" AND CONVERT(date, a.tgl_masuk) BETWEEN '$Awal' AND '$Akhir' "; }
  if($Delay=="1"){ $Dly =" AND DATEDIFF(day, a.tglcwarna, a.tgl_pack)>=3 AND a.sts_nodelay='0'"; }
  if($Awal!="" or $Delay=="1" or $Order!="" or $Warna!="" or $Item!="" or $PO!="" or $Langganan!="" or $Demand!="" or $Prodorder!=""){
	  $code = "SELECT a.*, b.berat_order_now, b.panjang_order_now FROM db_qc.tbl_qcf a
	  left join db_qc.tbl_qcf_qty_order b on (a.id = b.id)
    WHERE a.no_order LIKE '$Order%' AND a.no_po LIKE '$PO%' AND a.no_hanger LIKE '$Item%' AND a.warna LIKE '$Warna%' AND a.pelanggan LIKE '$Langganan%' AND a.nodemand LIKE '%$Demand%' AND a.lot LIKE '%$Prodorder%' $Where $Dly";
  	$sql=sqlsrv_query($con,$code);
		if ($sql === false) {
			die(print_r(sqlsrv_errors(), true));
		}
	/*
	$code2 = "SELECT * FROM tbl_qcf
    WHERE no_order LIKE '$Order%' AND no_po LIKE '$PO%' AND no_hanger LIKE '$Item%' AND warna LIKE '$Warna%' AND pelanggan LIKE '$Langganan%' AND nodemand LIKE '%$Demand%' AND lot LIKE '%$Prodorder%' $Where $Dly";
  	$sql2=mysqli_query($con,$code2);*/
	
	
	}else{
		$code = "SELECT a.*, b.berat_order_now, b.panjang_order_now FROM db_qc.tbl_qcf a 
		left join db_qc.tbl_qcf_qty_order b on (a.id = b.id)
    WHERE a.no_order LIKE '$Order' AND a.no_po LIKE '$PO' AND a.no_hanger LIKE '$Item' AND a.warna LIKE '$Warna' AND a.pelanggan LIKE '$Langganan' AND a.nodemand LIKE '$Demand' AND a.lot LIKE '$Prodorder' $Where $Dly";
		$sql=sqlsrv_query($con,$code);
		if ($sql === false) {
			die(print_r(sqlsrv_errors(), true));
		}
		/*
		$code2 = "SELECT * FROM tbl_qcf 
    WHERE no_order LIKE '$Order' AND no_po LIKE '$PO' AND no_hanger LIKE '$Item' AND warna LIKE '$Warna' AND pelanggan LIKE '$Langganan' AND nodemand LIKE '$Demand' AND lot LIKE '$Prodorder' $Where $Dly";
		$sql2=mysqli_query($con,$code2); */
	}
	$col=0;
	
	
	
	//$get_nodemand = get_nodemand($sql2);
	//$nodemand = ['00190922','00000560','00000562','00000951'];
	//$qtyoutput = qty_order($get_nodemand );
	
	while($r=sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)){
    $tglMasuk = $r['tgl_masuk'];
    if ($tglMasuk instanceof DateTime) {
      $tglMasuk = $tglMasuk->format('Y-m-d');
    }
    $tglPackVal = $r['tgl_pack'];
    $tglPackObj = ($tglPackVal instanceof DateTime) ? $tglPackVal : new DateTime($tglPackVal);
    $tglCwarnaVal = $r['tglcwarna'];
    $tglCwarnaObj = null;
    if ($tglCwarnaVal instanceof DateTime) {
      $tglCwarnaObj = $tglCwarnaVal;
    } elseif ($tglCwarnaVal !== null && $tglCwarnaVal !== '') {
      $tglCwarnaObj = new DateTime($tglCwarnaVal);
    }
    $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
    if($tglCwarnaObj==NULL){
    $tgl_warna= $tglPackObj;}else{
      $tgl_warna= $tglCwarnaObj;
    }
    $tgl_pack= $tglPackObj;
    $delay = $tgl_pack->diff($tgl_warna);
	?>
   <tr bgcolor="<?php echo $bgcolor; ?>">
     <td align="center"><?php echo $no; ?></td>
     <td>
     <div class="btn-group">
     <a href="#" id="<?php echo $r['id'] ?>" class="btn btn-info btn-sm data_edit <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>"><i class="fa fa-edit"></i> </a>
     <a href="#" class="btn btn-danger btn-sm <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusData-<?php echo $r['id'] ?>');"><i class="fa fa-trash"></i> </a></div>
     </td>
     <td align="center"><?php echo $r['nokk'];?></br>
      <?php if($tgl_warna>$tgl_pack){ ?>
        <span class='badge bg-green'><?php echo "OK";?></span>
      <?php }elseif($delay->days>=3){ ?>
        <span class='badge bg-red blink_me'><?php echo "Delay "; echo $delay->days; echo " Hari";?></span>
      <?php }else{?>
        <span class='badge bg-green'><?php echo "OK";?></span>
      <?php } ?>
     </td>
     <td><?php echo $r['nodemand'];?></td> 
     <td><?php echo $r['lot_legacy']; ?></td>
     <td><?php echo $r['pelanggan'];?></td>
     <td><?php echo $r['no_order'];?></td>
     <td><?php echo $r['no_po'];?></td>
     <td align="right"><?php //echo $r['berat_order']."x".$r['panjang_order']." ".$r['satuan_order'];
	 /*
	 if (array_key_exists($r['nodemand'],$qtyoutput)) {
		 $exp = explode("/",$qtyoutput[$r['nodemand']]);
		 echo $exp[0]."x".$exp[1]." ".$r['satuan_order'];
	 } */
	 
	 if ($r['berat_order'] > 0 ) {
		 /*
		 if ($r['berat_order_now']==0 and $r['panjang_order_now']==0 ) {
			 
		 } else {
			  echo $r['berat_order_now']."x".$r['panjang_order_now']." ".$r['satuan_order'];
		 }
		 */
		 
		    echo $r['berat_order']."x".$r['panjang_order']." ".$r['satuan_order'];
		
	 } else {
		 echo $r['berat_order_now']."x".$r['panjang_order_now']." ".$r['satuan_order'];
	 }
	 
	 ?></td>
     <td align="center"><?php echo $r['rol_bruto']."x".$r['berat_bruto'];?></td>
     <td align="center"><?php echo $r['no_hanger'];?></td>
     <td align="center"><?php echo $r['no_item'];?></td>
     <td align="center"><?php echo $r['no_warna'];?></td>
     <td align="center"><?php echo $r['warna'];?></td>
     <td align="center"><?php echo $r['lot'];?></td>
     <td align="center"><?php echo $r['lebar'];?></td>
     <td align="center"><?php echo $r['gramasi'];?></td>
     <td align="center"><?php echo $tglMasuk;?></td>
     <td align="right"><?php echo $r['rol'];?></td>
     <td align="right"><?php echo $r['netto'];?></td>
     <td align="center"><?php echo $r['panjang']." ".$r['satuan'];?></td>
     <td align="right"><?php echo format_decimal_2($r['sisa']);?></td>
     <td><?php echo $r['cek_warna'];?></td>
     <td align="left"><?php echo $r['masalah'];?></td>
     <td align="right"><?php echo format_decimal_2($r['berat_extra']);?></td>
     <td align="right"><?php echo format_decimal_2($r['panjang_extra']);?></td>
     <td><?php echo format_decimal_2($r['estimasi']);?></td>
     <td><?php echo format_decimal_2($r['berat_estimasi']);?></td>
     <td><?php echo $r['demand'];?></td>
     <td><?php echo $r['lot_erp_qcf'];?></td>
     <td><?php echo $r['ket'];?></td>
     <td><?php echo $r['availability'];?></td>
     </tr>
   <?php $no++; } ?>
   </tbody>
</table>
</form>

      </div>
    </div>
  </div>
</div>
<div id="Detail" class="modal fade modal-rotate-from-bottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
  <!-- Modal Popup untuk delete-->
<div class="modal fade" id="modal_delete" tabindex="-1" >
    <div class="modal-dialog modal-sm" >
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
          <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
        </div>

        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
          <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Popup untuk Edit-->
  <div id="DataEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  </div>
</div>
</body>
<script type="text/javascript">
    function confirm_delete(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }

</script>
</html>
