<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aftersales NOW</title>
</head>
<body>
<?php
$Demand	= isset($_POST['demand']) ? $_POST['demand'] : '';
$Lot	= isset($_POST['lot']) ? $_POST['lot'] : '';
$Order	= isset($_POST['order']) ? $_POST['order'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';
$PO	= isset($_POST['po']) ? $_POST['po'] : '';	
$ArticleGrup	= isset($_POST['ag']) ? $_POST['ag'] : '';	
$ArticleCode	= isset($_POST['ac']) ? $_POST['ac'] : '';	
$Warna	= isset($_POST['warna']) ? $_POST['warna'] : '';	
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Aftersales NOW</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
    <div class="box-body">
      <div class="form-group">
        <div class="col-sm-2">
            <input name="demand" type="text" class="form-control pull-right" id="demand" placeholder="No Demand" value="<?php echo $Demand;  ?>"/>
          </div>
        <div class="col-sm-2">
            <input name="lot" type="text" class="form-control pull-right" id="lot" placeholder="No Lot" value="<?php echo $Lot;  ?>"/>
          </div>
        <div class="col-sm-2">
            <input name="langganan" type="text" class="form-control pull-right" id="langganan" placeholder="Langganan" value="<?php echo $Langganan;  ?>" />
          </div>
        <div class="col-sm-2">
            <input name="po" type="text" class="form-control pull-right" id="po" placeholder="No PO" value="<?php echo $PO;  ?>" />
          </div>
        <div class="col-sm-2">
            <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order" value="<?php echo $Order;  ?>" />
          </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-2">
            <input name="ag" type="text" class="form-control pull-right" id="ag" placeholder="Article Group" value="<?php echo $ArticleGrup;  ?>" />
          </div>
        <div class="col-sm-2">
            <input name="ac" type="text" class="form-control pull-right" id="ac" placeholder="Article Code" value="<?php echo $ArticleCode;  ?>" />
          </div>
        <div class="col-sm-2">
            <input name="warna" type="text" class="form-control pull-right" id="warna" placeholder="Warna" value="<?php echo $Warna;  ?>" />
          </div>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2">
        <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
      </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
            <h3 class="box-title">Data Aftersales NOW</h3><br>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th rowspan="2"><div align="center">No Demand</div></th>
              <th rowspan="2"><div align="center">No Production Order</div></th>
              <th rowspan="2"><div align="center">Langganan</div></th>
              <th rowspan="2"><div align="center">Buyer</div></th>
              <th rowspan="2"><div align="center">No PO</div></th>
              <th rowspan="2"><div align="center">No Order</div></th>
              <th rowspan="2"><div align="center">No Item</div></th>
              <th colspan="2"><div align="center">Hanger</div></th>
              <th rowspan="2"><div align="center">Jenis Kain</div></th>
              <th rowspan="2"><div align="center">Lebar</div></th>
              <th rowspan="2"><div align="center">Gramasi</div></th>
              <th rowspan="2"><div align="center">Warna</div></th>
              <th rowspan="2"><div align="center">No Warna</div></th>
              <th colspan="2"><div align="center">Qty Order</div></th>
              <th colspan="2"><div align="center">Inspect</div></th>
              <th colspan="4"><div align="center">Laporan Packing</div></th>
              <th colspan="3"><div align="center">FOC</div></th>
              <th rowspan="2"><div align="center">Salinan</div></th>
              <th rowspan="2"><div align="center">External Reference</div></th>
              <th rowspan="2"><div align="center">Internal Reference</div></th>
              <th rowspan="2"><div align="center">Original PD </div></th>
              <th rowspan="2"><div align="center">Departemen</div></th>
              <th rowspan="2"><div align="center">Defect Type</div></th>
              <th rowspan="2"><div align="center">Defect Note</div></th>
            </tr>
            <tr>
              <th><div align="center">Article Group</div></th>
              <th><div align="center">Article Code</div></th>
              <th><div align="center">KG</div></th>
              <th><div align="center">Panjang</div></th>
              <th><div align="center">Tgl</div></th>
              <th><div align="center">Catatan Inspect</div></th>
              <th><div align="center">Tgl</div></th>
              <th><div align="center">Roll</div></th>
              <th><div align="center">KG</div></th>
              <th><div align="center">YD/MTR</div></th>
              <th><div align="center">Roll</div></th>
              <th><div align="center">KG</div></th>
              <th><div align="center">YD/MTR</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($Demand!="" or $Lot!="" or $Order!="" or $Langganan!="" or $PO!="" or $ArticleGrup!="" or $ArticleCode!="" or $Warna!=""){
              $sqlDB2="SELECT
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
          WHERE D.CODE LIKE '%$Demand%' AND G.PRODUCTIONORDERCODE LIKE '%$Lot%' AND SALESORDERLINE.SALESORDERCODE LIKE '%$Order%' AND BUSINESSPARTNER.LEGALNAME1 LIKE '%$Langganan%' AND (SALESORDER.EXTERNALREFERENCE LIKE '%$PO%' OR SALESORDERLINE.EXTERNALREFERENCE LIKE '%$PO%') AND SALESORDERLINE.SUBCODE02 LIKE '%$ArticleGrup%' AND SALESORDERLINE.SUBCODE03 LIKE '%$ArticleCode%' AND A.WARNA LIKE '%$Warna%'
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
            }else{
              $sqlDB2="SELECT
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
          WHERE D.CODE LIKE '$Demand' AND G.PRODUCTIONORDERCODE LIKE '$Lot' AND SALESORDERLINE.SALESORDERCODE LIKE '$Order' AND BUSINESSPARTNER.LEGALNAME1 LIKE '$Langganan' AND (SALESORDER.EXTERNALREFERENCE LIKE '$PO' OR SALESORDERLINE.EXTERNALREFERENCE LIKE '$PO') AND TRIM(SALESORDERLINE.SUBCODE02) LIKE '$ArticleGrup' AND TRIM(SALESORDERLINE.SUBCODE03) LIKE '$ArticleCode' AND A.WARNA LIKE '$Warna' 
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
            }
                $stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
                while($row1=db2_fetch_assoc($stmt)){
                    $demand=$row1['DEMAND'];
              ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo $row1['DEMAND'];?></td>
            <td align="center"><?php echo $row1['PRODUCTIONORDERCODE'];?></td>
            <td align="center"><?php echo $row1['LANGGANAN'];?></td>
            <td align="center"><?php echo $row1['BUYER'];?></td>
            <td align="center"><?php echo $row1['PO_NUMBER'];?></td>
            <td align="center"><?php echo $row1['SALESORDERCODE'];?></td>
            <td align="center"><?php echo $row1['NO_ITEM'];?></td>
            <td align="center"><?php echo $row1['SUBCODE02'];?></td>
            <td align="center"><?php echo $row1['SUBCODE03'];?></td>
            <td align="center"><?php echo $row1['ITEMDESCRIPTION'];?></td>
            <td align="center"><?php echo $row1['LEBAR'];?></td>
            <td align="center"><?php echo $row1['GRAMASI'];?></td>
            <td align="center"><?php echo $row1['WARNA'];?></td>
            <td align="center"><?php echo $row1['NO_WARNA'];?></td>
            <td align="center"><?php echo $row1['QTY_ORDER'];?></td>
            <td align="center"><?php echo $row1['QTY_PANJANG_ORDER'];?></td>
            <td align="center"><?php echo $row1['TGL_INSPEK'];?></td>
            <td align="center"><?php echo $row1['COMMENT_INSPEK'];?></td>
            <td align="center"><?php echo $row1['TGL_PACKING'];?></td>
            <td align="center"><?php echo $row1['TOTAL_ROLL_PACKING'];?></td>
            <td align="center"><?php echo $row1['TOTAL_KG_PACKING'];?></td>
            <td align="center"><?php echo $row1['TOTAL_YARD_PACKING'];?></td>
            <td align="center"><?php echo $row1['TOTAL_ROLL_FOC'];?></td>
            <td align="center"><?php echo $row1['TOTAL_KG_FOC'];?></td>
            <td align="center"><?php echo $row1['TOTAL_YARD_FOC'];?></td>
            <td align="center"><?php echo $row1['SALINAN'];?></td>
            <td align="center"><?php echo $row1['EXTERNALREFERENCE'];?></td>
            <td align="center"><?php echo $row1['INTERNALREFERENCE'];?></td>
            <td align="center"><?php echo $row1['ORIGINALPD'];?></td>
            <td align="center"><?php echo $row1['DEPT'];?></td>
            <td align="center"><?php echo $row1['DEF'];?></td>
            <td align="center"><?php echo $row1['DEFNOTE'];?></td>
            </tr>
          <?php	$no++;  } ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_del" tabindex="-1" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete all data ?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div id="StsGKEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
<script type="text/javascript">
    function confirm_delete(delete_url)
    {
      $('#modal_del').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>	
<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});

	</script>
</body>
</html>
