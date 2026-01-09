<?PHP
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";
set_time_limit(0);
?>
<?php
$Awal = isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir = isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Customer = isset($_POST['customer']) ? $_POST['customer'] : '';
$Buyer = isset($_POST['buyer']) ? $_POST['buyer'] : '';
$PO = isset($_POST['po']) ? $_POST['po'] : '';
$Item = isset($_POST['item']) ? $_POST['item'] : '';
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>

</head>

<body>
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Silahkan masukkan data yang ingin dicari</h3>
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
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal"
                value="<?php echo $Awal; ?>" autocomplete="off" />
            </div>
          </div>
          <div class="col-sm-2">
            <!-- <input name="customer" type="text" class="form-control" id="customer" placeholder="Customer" value="<?php echo $Customer; ?>" /> -->
            <select class="form-control select2" name="customer" id="customer">
              <option value="">Pilih Langganan</option>
              <?php
              $qryc = "SELECT ORDERPARTNER.CUSTOMERSUPPLIERCODE,
                  BUSINESSPARTNER.LEGALNAME1 
                  FROM ORDERPARTNER ORDERPARTNER
                  LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER
                  ON ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID = BUSINESSPARTNER.NUMBERID 
                  WHERE ORDERPARTNER.CUSTOMERSUPPLIERTYPE ='1'
                  ORDER BY BUSINESSPARTNER.LEGALNAME1 ASC";
              $stmt = db2_exec($conn1, $qryc, array('cursor' => DB2_SCROLLABLE));
              while ($rc = db2_fetch_assoc($stmt)) {
                ?>
                <option value="<?php echo $rc['LEGALNAME1']; ?>" <?php if ($Customer == $rc['LEGALNAME1']) {
                     echo "SELECTED";
                   } ?>>
                  <?php echo $rc['LEGALNAME1']; ?>
                </option>
              <?php } ?>
            </select>
          </div>
          <div class="col-sm-2">
            <select class="form-control select2" name="buyer" id="buyer">
              <option value="">Pilih Buyer</option>
              <?php
              $qryb = "SELECT 
                DISTINCT(ORDERPARTNERBRAND.LONGDESCRIPTION) AS BUYER
                FROM ORDERPARTNER ORDERPARTNER
                LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND
                ON ORDERPARTNER.CUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE
                WHERE ORDERPARTNER.CUSTOMERSUPPLIERTYPE ='1' AND ORDERPARTNERBRAND.LONGDESCRIPTION IS NOT NULL
                ORDER BY ORDERPARTNERBRAND.LONGDESCRIPTION ASC";
              $stmt1 = db2_exec($conn1, $qryb, array('cursor' => DB2_SCROLLABLE));
              while ($rb = db2_fetch_assoc($stmt1)) {
                ?>
                <option value="<?php echo $rb['BUYER']; ?>" <?php if ($Buyer == $rb['BUYER']) {
                     echo "SELECTED";
                   } ?>>
                  <?php echo $rb['BUYER']; ?>
                </option>
              <?php } ?>
            </select>
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="akhir" type="text" class="form-control pull-right" id="datepicker1"
                placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" autocomplete="off" />
            </div>
          </div>
          <div class="col-sm-2">
            <input name="po" type="text" class="form-control pull-right" placeholder="PO Number"
              value="<?php echo $PO; ?>" />
          </div>
          <div class="col-sm-2">
            <input name="item" type="text" class="form-control pull-right" placeholder="No Item"
              value="<?php echo $Item; ?>" />
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="pull-right">
            <button type="submit" class="btn btn-success" name="cari"><i class="fa fa-search"></i> Cari Data</button>
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
          <h3 class="box-title">Summary Inspection Report</h3><br>
          <b>Tanggal Inspeksi :
            <?php echo $_POST['awal']; ?> s.d.
            <?php echo $_POST['akhir']; ?>
          </b> <br><br>
          <?php if ($_POST['customer'] != '') { ?><b>Customer :
              <?php echo $_POST['customer']; ?>
            </b><br>
          <?php } ?>
          <?php if ($_POST['buyer'] != '') { ?><b>Buyer :
              <?php echo $_POST['buyer']; ?>
            </b><br>
          <?php } ?>
          <?php if ($_POST['item'] != '') { ?><b>No Item :
              <?php echo $_POST['item']; ?>
            </b>
          <?php } ?>
          <div class="pull-right">
            <a href="pages/cetak/excel_summary_inspek_langganan.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&buyer=<?php echo $_POST['buyer']; ?>"
              class="btn btn-success <?php if ($_POST['awal'] == "" or $_POST['buyer'] == "") {
                echo "disabled";
              } ?>" target="_blank">Excel Summary Langganan</a>
            <a href="pages/cetak/excel_summary_inspek_item.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&buyer=<?php echo $_POST['buyer']; ?>&item=<?php echo $_POST['item']; ?>"
              class="btn btn-success <?php if ($_POST['awal'] == "" or $_POST['buyer'] == "") {
                echo "disabled";
              } ?>" target="_blank">Excel Summary Item</a>
          </div>
        </div>
        <div class="box-body">
          <table id="example3" class="table table-bordered table-hover table-striped display nowrap" width="100%">
            <thead class="bg-blue">
              <tr>
                <th width="24">
                  <div align="center">No</div>
                </th>
                <th width="24">
                  <div align="center">UOM</div>
                </th>
                <th width="78">
                  <div align="center">No Demand</div>
                </th>
                <th width="78">
                  <div align="center">Buyer</div>
                </th>
                <th width="78">
                  <div align="center">Langganan</div>
                </th>
                <th width="78">
                  <div align="center">Hanger</div>
                </th>
                <th width="78">
                  <div align="center">Item</div>
                </th>
                <th width="100">
                  <div align="center">Description</div>
                </th>
                <th width="100">
                  <div align="center">Style/Season</div>
                </th>
                <th width="88">
                  <div align="center">Color</div>
                </th>
                <th width="90">
                  <div align="center">PO Number</div>
                </th>
                <th width="80">
                  <div align="center">Bon Order</div>
                </th>
                <th width="80">
                  <div align="center">LOT</div>
                </th>
                <th width="80">
                  <div align="center">Tgl Inspek</div>
                </th>
                <th width="80">
                  <div align="center">Roll</div>
                </th>
                <th width="80">
                  <div align="center">QTY</div>
                </th>
                <th width="80">
                  <div align="center">Yard</div>
                </th>
                <th width="80">
                  <div align="center">Lebar</div>
                </th>
                <th width="80">
                  <div align="center">Gramasi</div>
                </th>
                <th width="80">
                  <div align="center">Lebar Inspek</div>
                </th>
                <th width="80">
                  <div align="center">Gramasi Inspek</div>
                </th>
                <th width="25">
                  <div align="center">A Slub</div>
                </th>
                <th width="25">
                  <div align="center">A Barre</div>
                </th>
                <th width="25">
                  <div align="center">A Uneven</div>
                </th>
                <th width="25">
                  <div align="center">A YarnContam</div>
                </th>
                <th width="25">
                  <div align="center">A Neps</div>
                </th>
                <th width="25">
                  <div align="center">B Missing</div>
                </th>
                <th width="25">
                  <div align="center">B Holes</div>
                </th>
                <th width="25">
                  <div align="center">B Streak</div>
                </th>
                <th width="25">
                  <div align="center">B MissKnit</div>
                </th>
                <th width="25">
                  <div align="center">B Knot</div>
                </th>
                <th width="25">
                  <div align="center">B Oil</div>
                </th>
                <th width="25">
                  <div align="center">B Fly</div>
                </th>
                <th width="25">
                  <div align="center">C Hair</div>
                </th>
                <th width="25">
                  <div align="center">C Holes</div>
                </th>
                <th width="25">
                  <div align="center">C Color</div>
                </th>
                <th width="25">
                  <div align="center">C Abra</div>
                </th>
                <th width="25">
                  <div align="center">C Dye</div>
                </th>
                <th width="25">
                  <div align="center">C Wrink</div>
                </th>
                <th width="25">
                  <div align="center">C Bowing</div>
                </th>
                <th width="25">
                  <div align="center">C Pin</div>
                </th>
                <th width="25">
                  <div align="center">C Pick</div>
                </th>
                <th width="25">
                  <div align="center">C Knot</div>
                </th>
                <th width="25">
                  <div align="center">D Uneven</div>
                </th>
                <th width="25">
                  <div align="center">D Stains</div>
                </th>
                <th width="25">
                  <div align="center">D Oil</div>
                </th>
                <th width="25">
                  <div align="center">D Dirt</div>
                </th>
                <th width="25">
                  <div align="center">D Water</div>
                </th>
                <th width="25">
                  <div align="center">E Print</div>
                </th>
                <th width="25">
                  <div align="center">Total Point</div>
                </th>
                <th width="25">
                  <div align="center">Jml A</div>
                </th>
                <th width="25">
                  <div align="center">Kg A</div>
                </th>
                <th width="25">
                  <div align="center">Yd A</div>
                </th>
                <th width="25">
                  <div align="center">Jml B</div>
                </th>
                <th width="25">
                  <div align="center">Kg B</div>
                </th>
                <th width="25">
                  <div align="center">Yd B</div>
                </th>
                <th width="25">
                  <div align="center">Jml C/X</div>
                </th>
                <th width="25">
                  <div align="center">Kg C/X</div>
                </th>
                <th width="25">
                  <div align="center">Yd C/X</div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              if ($Awal != "") {
                $Where = " AND VARCHAR_FORMAT (B.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir' ";
              }
              if ($PO != "") {
                $ponumber = " AND (PO_HEADER = '$PO' OR PO_LINE= '$PO') ";
              } else {
                $ponumber = " ";
              }
              if ($Customer != "") {
                $cus = " AND D.LEGALNAME1 = '$Customer' ";
              } else {
                $cus = " ";
              }
              if ($Buyer != "") {
                $buy = " AND D.LONGDESCRIPTION = '$Buyer' ";
              } else {
                $buy = " ";
              }
              if ($Item != "") {
                $noitem = " AND D.SHORTDESCRIPTION = '$Item' ";
              } else {
                $noitem = " ";
              }
              if ($Awal != "" or $Customer != "" or $Buyer != "" or $PO != "") {
                $sql = "SELECT 
      A.CODE,
      LEFT(B.INSPECTIONSTARTDATETIME,10) AS TGL_INSPEK,
      SUM(C.POINTS) AS TOTAL_POIN,
      SUM(B.LENGTHGROSS) AS TOTAL_YARD,
      SUM(B.WEIGHTGROSS) AS TOTAL_QTY,
      D.CODE AS NO_ORDER,
      D.ORDERPARTNERBRANDCODE,
      D.LONGDESCRIPTION AS BUYER, 
      D.LEGALNAME1 AS LANGGANAN, 
      D.ITEMDESCRIPTION AS JENIS_KAIN,
      D.PO_HEADER AS PO_HEADER,
      D.PO_LINE AS PO_LINE,
      D.INTERNALREFERENCE AS STYLE_SEASON,
      D.ORDERLINE,
      D.SUBCODE02,
      D.SUBCODE03,
      D.SHORTDESCRIPTION AS NO_ITEM,
      TRIM(E.LONGDESCRIPTION) AS WARNA
    FROM PRODUCTIONDEMAND A 
    LEFT JOIN ELEMENTSINSPECTION B
    ON A.CODE = B.DEMANDCODE 
    LEFT JOIN 
    ELEMENTSINSPECTIONEVENT C 
    ON B.ELEMENTCODE = C.ELEMENTSINSPECTIONELEMENTCODE 
    LEFT JOIN
      (SELECT SALESORDER.CODE,SALESORDER.ORDERPARTNERBRANDCODE,ORDERPARTNERBRAND.LONGDESCRIPTION,BUSINESSPARTNER.LEGALNAME1,
      SALESORDER.EXTERNALREFERENCE AS PO_HEADER,SALESORDERLINE.EXTERNALREFERENCE AS PO_LINE,SALESORDERLINE.INTERNALREFERENCE, 
      SALESORDERLINE.ITEMDESCRIPTION, SALESORDERLINE.ORDERLINE, SALESORDERLINE.SUBCODE02,SALESORDERLINE.SUBCODE03,ORDERITEMORDERPARTNERLINK.SHORTDESCRIPTION 
      FROM SALESORDER SALESORDER
      LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESORDER.CODE = SALESORDERLINE.SALESORDERCODE
      LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE AND SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE
      LEFT JOIN ORDERPARTNER ORDERPARTNER ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNER.CUSTOMERSUPPLIERCODE
      LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER ON ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID = BUSINESSPARTNER.NUMBERID
      LEFT JOIN ORDERITEMORDERPARTNERLINK ORDERITEMORDERPARTNERLINK ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERITEMORDERPARTNERLINK.ORDPRNCUSTOMERSUPPLIERCODE AND SALESORDERLINE.ITEMTYPEAFICODE= ORDERITEMORDERPARTNERLINK.ITEMTYPEAFICODE AND 
      SALESORDERLINE.SUBCODE01 = ORDERITEMORDERPARTNERLINK.SUBCODE01 AND SALESORDERLINE.SUBCODE02 = ORDERITEMORDERPARTNERLINK.SUBCODE02 AND SALESORDERLINE.SUBCODE03 = ORDERITEMORDERPARTNERLINK.SUBCODE03 AND
      SALESORDERLINE.SUBCODE04 = ORDERITEMORDERPARTNERLINK.SUBCODE04 AND SALESORDERLINE.SUBCODE05 = ORDERITEMORDERPARTNERLINK.SUBCODE05 AND SALESORDERLINE.SUBCODE06 = ORDERITEMORDERPARTNERLINK.SUBCODE06 AND 
      SALESORDERLINE.SUBCODE07 = ORDERITEMORDERPARTNERLINK.SUBCODE07 AND SALESORDERLINE.SUBCODE08 = ORDERITEMORDERPARTNERLINK.SUBCODE08 AND SALESORDERLINE.SUBCODE09 = ORDERITEMORDERPARTNERLINK.SUBCODE09 AND 
      SALESORDERLINE.SUBCODE10 = ORDERITEMORDERPARTNERLINK.SUBCODE10
      GROUP BY SALESORDER.CODE,SALESORDER.ORDERPARTNERBRANDCODE,ORDERPARTNERBRAND.LONGDESCRIPTION,
      SALESORDER.EXTERNALREFERENCE,SALESORDERLINE.EXTERNALREFERENCE,SALESORDERLINE.ITEMDESCRIPTION,BUSINESSPARTNER.LEGALNAME1,SALESORDERLINE.INTERNALREFERENCE, SALESORDERLINE.ORDERLINE,SALESORDERLINE.SUBCODE02,SALESORDERLINE.SUBCODE03,ORDERITEMORDERPARTNERLINK.SHORTDESCRIPTION) D 
    ON A.PROJECTCODE = D.CODE AND A.ORIGDLVSALORDERLINEORDERLINE = D.ORDERLINE
    LEFT JOIN 
      (SELECT USERGENERICGROUP.CODE,USERGENERICGROUP.LONGDESCRIPTION FROM USERGENERICGROUP USERGENERICGROUP) E
    ON A.SUBCODE05 = E.CODE
    WHERE LENGTH(TRIM(B.ELEMENTCODE))=11 $Where $ponumber $cus $buy $noitem
    GROUP BY 
      A.CODE,
      LEFT(B.INSPECTIONSTARTDATETIME,10),
      D.CODE,
      D.ORDERPARTNERBRANDCODE,
      D.LONGDESCRIPTION, 
      D.LEGALNAME1, 
      D.ITEMDESCRIPTION,
      D.PO_HEADER,
      D.PO_LINE,
      D.SHORTDESCRIPTION,
      D.INTERNALREFERENCE,
      D.ORDERLINE,
      D.SUBCODE02,
      D.SUBCODE03,
      E.LONGDESCRIPTION";
                $stmt = db2_exec($conn1, $sql, array('cursor' => DB2_SCROLLABLE));
              } else {
              }
              $col = 0;
              while ($r = db2_fetch_assoc($stmt)) {
                $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
                $totalpoin = explode(".", $r['TOTAL_POIN']);
                //Query Total Roll & Lebar Inspek
                $sqlr = "SELECT 
    ELEMENTSINSPECTION.DEMANDCODE,
    COUNT(ELEMENTSINSPECTION.DEMANDCODE) AS TOTAL_ROLL,
    ELEMENTSINSPECTION.WIDTHNET
    FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
    WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 
    AND ELEMENTSINSPECTION.DEMANDCODE='$r[CODE]'
    GROUP BY
    ELEMENTSINSPECTION.DEMANDCODE,
    ELEMENTSINSPECTION.WIDTHNET";
                $stmt1 = db2_exec($conn1, $sqlr, array('cursor' => DB2_SCROLLABLE));
                $rr = db2_fetch_assoc($stmt1);
                $posWN = strpos($rr['WIDTHNET'], '.');
                $WidthNet = substr($rr['WIDTHNET'], 0, $posWN);

                //Query Gramasi Inspek
                $sqlgi = "SELECT
    ADSTORAGE.VALUEDECIMAL
    FROM ELEMENTS A
    LEFT JOIN ADSTORAGE ADSTORAGE 
    ON A.ABSUNIQUEID = ADSTORAGE.UNIQUEID 
    WHERE TRIM(ADSTORAGE.NAMENAME) ='GSM' AND A.ENTRYDOCUMENTNUMBER ='$r[CODE]' LIMIT 1";
                $stmt2 = db2_exec($conn1, $sqlgi, array('cursor' => DB2_SCROLLABLE));
                $rgi = db2_fetch_assoc($stmt2);
                $posGSM = strpos($rgi['VALUEDECIMAL'], '.');
                $Gramasi = substr($rgi['VALUEDECIMAL'], 0, $posGSM);

                //Query Gramasi Permintaan
                $sqlgp = "SELECT
    ADSTORAGE.VALUEDECIMAL
    FROM PRODUCTIONDEMAND PRODUCTIONDEMAND
    LEFT JOIN PRODUCT PRODUCT
    ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = PRODUCT.ITEMTYPECODE AND 
    PRODUCTIONDEMAND.SUBCODE01 = PRODUCT.SUBCODE01 AND
    PRODUCTIONDEMAND.SUBCODE02 = PRODUCT.SUBCODE02 AND
    PRODUCTIONDEMAND.SUBCODE03 = PRODUCT.SUBCODE03 AND
    PRODUCTIONDEMAND.SUBCODE04 = PRODUCT.SUBCODE04 AND
    PRODUCTIONDEMAND.SUBCODE05 = PRODUCT.SUBCODE05 AND
    PRODUCTIONDEMAND.SUBCODE06 = PRODUCT.SUBCODE06 AND
    PRODUCTIONDEMAND.SUBCODE07 = PRODUCT.SUBCODE07 AND
    PRODUCTIONDEMAND.SUBCODE08 = PRODUCT.SUBCODE08 AND
    PRODUCTIONDEMAND.SUBCODE09 = PRODUCT.SUBCODE09 AND
    PRODUCTIONDEMAND.SUBCODE10 = PRODUCT.SUBCODE10
    LEFT JOIN ADSTORAGE ADSTORAGE
    ON PRODUCT.ABSUNIQUEID = ADSTORAGE.UNIQUEID 
    WHERE PRODUCTIONDEMAND.CODE='$r[CODE]' AND ADSTORAGE.NAMENAME ='GSM'";
                $stmt3 = db2_exec($conn1, $sqlgp, array('cursor' => DB2_SCROLLABLE));
                $rgp = db2_fetch_assoc($stmt3);
                $posGSMP = strpos($rgp['VALUEDECIMAL'], '.');
                $GramasiPermintaan = substr($rgp['VALUEDECIMAL'], 0, $posGSMP);

                //Query Lebar Permintaan
                $sqllp = "SELECT
    ADSTORAGE.VALUEDECIMAL
    FROM PRODUCTIONDEMAND PRODUCTIONDEMAND
    LEFT JOIN PRODUCT PRODUCT
    ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = PRODUCT.ITEMTYPECODE AND 
    PRODUCTIONDEMAND.SUBCODE01 = PRODUCT.SUBCODE01 AND
    PRODUCTIONDEMAND.SUBCODE02 = PRODUCT.SUBCODE02 AND
    PRODUCTIONDEMAND.SUBCODE03 = PRODUCT.SUBCODE03 AND
    PRODUCTIONDEMAND.SUBCODE04 = PRODUCT.SUBCODE04 AND
    PRODUCTIONDEMAND.SUBCODE05 = PRODUCT.SUBCODE05 AND
    PRODUCTIONDEMAND.SUBCODE06 = PRODUCT.SUBCODE06 AND
    PRODUCTIONDEMAND.SUBCODE07 = PRODUCT.SUBCODE07 AND
    PRODUCTIONDEMAND.SUBCODE08 = PRODUCT.SUBCODE08 AND
    PRODUCTIONDEMAND.SUBCODE09 = PRODUCT.SUBCODE09 AND
    PRODUCTIONDEMAND.SUBCODE10 = PRODUCT.SUBCODE10
    LEFT JOIN ADSTORAGE ADSTORAGE
    ON PRODUCT.ABSUNIQUEID = ADSTORAGE.UNIQUEID 
    WHERE PRODUCTIONDEMAND.CODE='$r[CODE]' AND ADSTORAGE.NAMENAME ='Width'";
                $stmt4 = db2_exec($conn1, $sqllp, array('cursor' => DB2_SCROLLABLE));
                $rlp = db2_fetch_assoc($stmt4);
                $posLP = strpos($rlp['VALUEDECIMAL'], '.');
                $LebarPermintaan = substr($rlp['VALUEDECIMAL'], 0, $posLP);

                //QUERY DEFECT Y
                $sqlY = "SELECT 
        A.DEMANDCODE, B.POINTS_Y01, C.POINTS_Y02, D.POINTS_Y03, E.POINTS_Y04, F.POINTS_Y05 FROM
        ELEMENTSINSPECTION A
        LEFT JOIN
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_Y01
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'Y01'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) B
        ON A.DEMANDCODE = B.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_Y02
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'Y02'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) C
        ON A.DEMANDCODE = C.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_Y03
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'Y03'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) D
        ON A.DEMANDCODE = D.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_Y04
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'Y04'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) E
        ON A.DEMANDCODE = E.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_Y05
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'Y05'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) F
        ON A.DEMANDCODE = F.DEMANDCODE
        WHERE A.DEMANDCODE = '$r[CODE]'
        GROUP BY 
        A.DEMANDCODE, B.POINTS_Y01, C.POINTS_Y02, D.POINTS_Y03, E.POINTS_Y04, F.POINTS_Y05";
                $stmt5 = db2_exec($conn1, $sqlY, array('cursor' => DB2_SCROLLABLE));
                $rY = db2_fetch_assoc($stmt5);
                $ASLUB = explode(".", $rY['POINTS_Y01']);
                $ABARRE = explode(".", $rY['POINTS_Y02']);
                $AUNEVEN = explode(".", $rY['POINTS_Y03']);
                $AYARN = explode(".", $rY['POINTS_Y04']);
                $ANEPS = explode(".", $rY['POINTS_Y05']);

                //QUERY DEFECT T
                $sqlT = "SELECT 
        A.DEMANDCODE, B.POINTS_T01, C.POINTS_T02, D.POINTS_T03, E.POINTS_T04, F.POINTS_T05, G.POINTS_T06, H.POINTS_T07 FROM 
        ELEMENTSINSPECTION A
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_T01
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'T01'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) B
        ON A.DEMANDCODE = B.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_T02
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'T02'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) C
        ON A.DEMANDCODE = C.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_T03
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'T03'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) D
        ON A.DEMANDCODE = D.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_T04
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'T04'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) E
        ON A.DEMANDCODE = E.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_T05
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'T05'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) F
        ON A.DEMANDCODE = F.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_T06
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'T06'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) G
        ON A.DEMANDCODE = G.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_T07
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'T07'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) H
        ON A.DEMANDCODE = H.DEMANDCODE
        WHERE A.DEMANDCODE = '$r[CODE]'
        GROUP BY 
        A.DEMANDCODE, B.POINTS_T01, C.POINTS_T02, D.POINTS_T03, E.POINTS_T04, F.POINTS_T05, G.POINTS_T06, H.POINTS_T07";
                $stmt6 = db2_exec($conn1, $sqlT, array('cursor' => DB2_SCROLLABLE));
                $rT = db2_fetch_assoc($stmt6);
                $BMISSING = explode(".", $rT['POINTS_T01']);
                $BHOLES = explode(".", $rT['POINTS_T02']);
                $BSTREAK = explode(".", $rT['POINTS_T03']);
                $BMISSKNIT = explode(".", $rT['POINTS_T04']);
                $BKNOT = explode(".", $rT['POINTS_T05']);
                $BOIL = explode(".", $rT['POINTS_T06']);
                $BFLY = explode(".", $rT['POINTS_T07']);

                //QUERY DEFECT D
                $sqlD = "SELECT 
        A.DEMANDCODE, B.POINTS_D01, C.POINTS_D02, D.POINTS_D03, E.POINTS_D04, F.POINTS_D05, G.POINTS_D06, H.POINTS_D07, 
        I.POINTS_D08, J.POINTS_D09, K.POINTS_D10 FROM ELEMENTSINSPECTION A
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_D01
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'D01'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) B
        ON A.DEMANDCODE = B.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_D02
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'D02'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) C
        ON A.DEMANDCODE = C.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_D03
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'D03'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) D
        ON A.DEMANDCODE = D.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_D04
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'D04'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) E
        ON A.DEMANDCODE = E.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_D05
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'D05'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) F
        ON A.DEMANDCODE = F.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_D06
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'D06'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) G
        ON A.DEMANDCODE = G.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_D07
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'D07'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) H
        ON A.DEMANDCODE = H.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_D08
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'D08'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) I
        ON A.DEMANDCODE = I.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_D09
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'D09'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) J
        ON A.DEMANDCODE = J.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_D10
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'D10'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) K
        ON A.DEMANDCODE = K.DEMANDCODE
        WHERE A.DEMANDCODE = '$r[CODE]'
        GROUP BY 
        A.DEMANDCODE, B.POINTS_D01, C.POINTS_D02, D.POINTS_D03, E.POINTS_D04, F.POINTS_D05, G.POINTS_D06, H.POINTS_D07, 
        I.POINTS_D08, J.POINTS_D09, K.POINTS_D10";
                $stmt7 = db2_exec($conn1, $sqlD, array('cursor' => DB2_SCROLLABLE));
                $rD = db2_fetch_assoc($stmt7);
                $CHAIR = explode(".", $rD['POINTS_D01']);
                $CHOLES = explode(".", $rD['POINTS_D02']);
                $CCOLOR = explode(".", $rD['POINTS_D03']);
                $CABRA = explode(".", $rD['POINTS_D04']);
                $CDYE = explode(".", $rD['POINTS_D05']);
                $CWRINK = explode(".", $rD['POINTS_D06']);
                $CBOWING = explode(".", $rD['POINTS_D07']);
                $CPIN = explode(".", $rD['POINTS_D08']);
                $CPICK = explode(".", $rD['POINTS_D09']);
                $CKNOT = explode(".", $rD['POINTS_D10']);

                //QUERY DEFECT C
                $sqlC = "SELECT 
        A.DEMANDCODE, B.POINTS_C01, C.POINTS_C02, D.POINTS_C03, E.POINTS_C04, F.POINTS_C05 FROM
        ELEMENTSINSPECTION A
        LEFT JOIN
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_C01
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'C01'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) B
        ON A.DEMANDCODE = B.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_C02
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'C02'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) C
        ON A.DEMANDCODE = C.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_C03
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'C03'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) D
        ON A.DEMANDCODE = D.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_C04
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'C04'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) E
        ON A.DEMANDCODE = E.DEMANDCODE
        LEFT JOIN 
          (SELECT
          ELEMENTSINSPECTION.DEMANDCODE,
          SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS_C05
          FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
          LEFT JOIN
          ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
          ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
          WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]' 
          AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'C05'
          AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
          GROUP BY ELEMENTSINSPECTION.DEMANDCODE) F
        ON A.DEMANDCODE = F.DEMANDCODE
        WHERE A.DEMANDCODE = '$r[CODE]'
        GROUP BY 
        A.DEMANDCODE, B.POINTS_C01, C.POINTS_C02, D.POINTS_C03, E.POINTS_C04, F.POINTS_C05";
                $stmt8 = db2_exec($conn1, $sqlC, array('cursor' => DB2_SCROLLABLE));
                $rC = db2_fetch_assoc($stmt8);
                $DUNEVEN = explode(".", $rC['POINTS_C01']);
                $DSTAINS = explode(".", $rC['POINTS_C02']);
                $DOIL = explode(".", $rC['POINTS_C03']);
                $DDIRT = explode(".", $rC['POINTS_C04']);
                $DWATER = explode(".", $rC['POINTS_C05']);

                //QUERY DEFECT P
                $sqlP01 = "SELECT
    SUM(ELEMENTSINSPECTIONEVENT.POINTS) AS POINTS
    FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
    LEFT JOIN
    ELEMENTSINSPECTIONEVENT ELEMENTSINSPECTIONEVENT
    ON ELEMENTSINSPECTION.ELEMENTCODE = ELEMENTSINSPECTIONEVENT.ELEMENTSINSPECTIONELEMENTCODE 
    WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]'
    AND ELEMENTSINSPECTIONEVENT.CODEEVENTCODE = 'P01'
    AND VARCHAR_FORMAT(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'";
                $stmt9 = db2_exec($conn1, $sqlP01, array('cursor' => DB2_SCROLLABLE));
                $rP01 = db2_fetch_assoc($stmt9);
                $EPRINT = explode(".", $rP01['POINTS']);

                //QUERY JUMLAH GRADE A, KG A, YD A
                $sqlGA = "SELECT 
    ELEMENTSINSPECTION.DEMANDCODE,
    COUNT(ELEMENTSINSPECTION.ELEMENTCODE) AS JML_A,
    SUM(ELEMENTSINSPECTION.LENGTHGROSS) AS JML_YARD_A,
    SUM(ELEMENTSINSPECTION.WEIGHTNET) AS JML_KG_A
    FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
    WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 
    AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
    AND ELEMENTSINSPECTION.QUALITYCODE ='1' AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]'
    GROUP BY
    ELEMENTSINSPECTION.DEMANDCODE";
                $stmt10 = db2_exec($conn1, $sqlGA, array('cursor' => DB2_SCROLLABLE));
                $rGA = db2_fetch_assoc($stmt10);

                //QUERY JUMLAH GRADE B, KG B, YD B
                $sqlGB = "SELECT 
      ELEMENTSINSPECTION.DEMANDCODE,
      COUNT(ELEMENTSINSPECTION.ELEMENTCODE) AS JML_B,
      SUM(ELEMENTSINSPECTION.LENGTHGROSS) AS JML_YARD_B,
      SUM(ELEMENTSINSPECTION.WEIGHTNET) AS JML_KG_B
      FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
      WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 
      AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
      AND ELEMENTSINSPECTION.QUALITYCODE ='2' AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]'
      GROUP BY
      ELEMENTSINSPECTION.DEMANDCODE";
                $stmt11 = db2_exec($conn1, $sqlGB, array('cursor' => DB2_SCROLLABLE));
                $rGB = db2_fetch_assoc($stmt11);

                //QUERY JUMLAH GRADE C, KG C, YD C
                $sqlGC = "SELECT 
    ELEMENTSINSPECTION.DEMANDCODE,
    COUNT(ELEMENTSINSPECTION.ELEMENTCODE) AS JML_C,
    SUM(ELEMENTSINSPECTION.LENGTHGROSS) AS JML_YARD_C,
    SUM(ELEMENTSINSPECTION.WEIGHTNET) AS JML_KG_C
    FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
    WHERE LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 
    AND VARCHAR_FORMAT (ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ,'YYYY-MM-DD') BETWEEN '$Awal' AND '$Akhir'
    AND ELEMENTSINSPECTION.QUALITYCODE ='3' AND ELEMENTSINSPECTION.DEMANDCODE = '$r[CODE]'
    GROUP BY
    ELEMENTSINSPECTION.DEMANDCODE";
                $stmt12 = db2_exec($conn1, $sqlGC, array('cursor' => DB2_SCROLLABLE));
                $rGC = db2_fetch_assoc($stmt12);

                //QUERY NO PRODUCTION ORDER / NO LOT 
                $sqlLot = "SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE, PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
    WHERE PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE= '$r[CODE]' 
    GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE, PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE
    ORDER BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE DESC LIMIT 1";
                $stmt13 = db2_exec($conn1, $sqlLot, array('cursor' => DB2_SCROLLABLE));
                $rLot = db2_fetch_assoc($stmt13);

                ?>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                  <td align="center">
                    <?php echo $no; ?>
                  </td>
                  <td>
                    <?php echo number_format(($r['TOTAL_POIN'] * 100) / $r['TOTAL_YARD'], 2); ?>
                  </td>
                  <td>
                    <?php echo $r['CODE']; ?>
                  </td>
                  <td>
                    <?php echo $r['BUYER']; ?>
                  </td>
                  <td>
                    <?php echo $r['LANGGANAN']; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['SUBCODE02'] . $r['SUBCODE03']; ?>
                  </td>
                  <td align="center">
                    <?php if ($r['NO_ITEM'] != '') {
                      echo $r['NO_ITEM'];
                    } else {
                      echo $r['SUBCODE02'] . $r['SUBCODE03'];
                    } ?>
                  </td>
                  <td align="center">
                    <?php echo $r['JENIS_KAIN']; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['STYLE_SEASON']; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['WARNA']; ?>
                  </td>
                  <td align="center">
                    <?php if ($r['PO_HEADER'] == "") {
                      echo $r['PO_LINE'];
                    } else {
                      echo $r['PO_HEADER'];
                    } ?>
                  </td>
                  <td align="center">
                    <?php echo $r['NO_ORDER']; ?>
                  </td>
                  <td align="center">
                    <?php echo $rLot['PRODUCTIONORDERCODE']; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['TGL_INSPEK']; ?>
                  </td>
                  <td align="center">
                    <?php echo $rr['TOTAL_ROLL']; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['TOTAL_QTY']; ?>
                  </td>
                  <td align="center">
                    <?php echo $r['TOTAL_YARD']; ?>
                  </td>
                  <td align="center">
                    <?php echo $LebarPermintaan; ?>
                  </td>
                  <td align="center">
                    <?php echo $GramasiPermintaan; ?>
                  </td>
                  <td align="center">
                    <?php echo $WidthNet; ?>
                  </td>
                  <td align="center">
                    <?php echo $Gramasi; ?>
                  </td>
                  <td align="center">
                    <?php if ($rY['POINTS_Y01'] != '') {
                      echo $ASLUB[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rY['POINTS_Y02'] != '') {
                      echo $ABARRE[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rY['POINTS_Y03'] != '') {
                      echo $AUNEVEN[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rY['POINTS_Y04'] != '') {
                      echo $AYARN[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rY['POINTS_Y05'] != '') {
                      echo $ANEPS[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rT['POINTS_T01'] != '') {
                      echo $BMISSING[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rT['POINTS_T02'] != '') {
                      echo $BHOLES[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rT['POINTS_T03'] != '') {
                      echo $BSTREAK[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rT['POINTS_T04'] != '') {
                      echo $BMISSKNIT[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rT['POINTS_T05'] != '') {
                      echo $BKNOT[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rT['POINTS_T06'] != '') {
                      echo $BOIL[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rT['POINTS_T07'] != '') {
                      echo $BFLY[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rD['POINTS_D01'] != '') {
                      echo $CHAIR[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rD['POINTS_D02'] != '') {
                      echo $CHOLES[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rD['POINTS_D03'] != '') {
                      echo $CCOLOR[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rD['POINTS_D04'] != '') {
                      echo $CABRA[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rD['POINTS_D05'] != '') {
                      echo $CDYE[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rD['POINTS_D06'] != '') {
                      echo $CWRINK[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rD['POINTS_D07'] != '') {
                      echo $CBOWING[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rD['POINTS_D08'] != '') {
                      echo $CPIN[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rD['POINTS_D09'] != '') {
                      echo $CPICK[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rD['POINTS_D10'] != '') {
                      echo $CKNOT[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rC['POINTS_C01'] != '') {
                      echo $DUNEVEN[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rC['POINTS_C02'] != '') {
                      echo $DSTAINS[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rC['POINTS_C03'] != '') {
                      echo $DOIL[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rC['POINTS_C04'] != '') {
                      echo $DDIRT[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rC['POINTS_C05'] != '') {
                      echo $DWATER[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rP01['POINTS'] != '') {
                      echo $EPRINT[0];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php echo $totalpoin[0]; ?>
                  </td>
                  <td align="center">
                    <?php if ($rGA['JML_A'] != '') {
                      echo $rGA['JML_A'];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rGA['JML_KG_A'] != '') {
                      echo $rGA['JML_KG_A'];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rGA['JML_YARD_A'] != '') {
                      echo $rGA['JML_YARD_A'];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rGB['JML_B'] != '') {
                      echo $rGB['JML_B'];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rGB['JML_KG_B'] != '') {
                      echo $rGB['JML_KG_B'];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rGB['JML_YARD_B'] != '') {
                      echo $rGB['JML_YARD_B'];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rGC['JML_C'] != '') {
                      echo $rGC['JML_C'];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rGC['JML_KG_C'] != '') {
                      echo $rGC['JML_KG_C'];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                  <td align="center">
                    <?php if ($rGC['JML_YARD_C'] != '') {
                      echo $rGC['JML_YARD_C'];
                    } else {
                      echo "0";
                    } ?>
                  </td>
                </tr>
                <?php $no++;
              } ?>
            </tbody>
            <tfoot class="bg-blue">
              <tr>
                <td align="center">
                  <div align="center">No</div>
                </td>
                <td align="center">
                  <div align="center">UOM</div>
                </td>
                <td align="center">
                  <div align="center">No Demand</div>
                </td>
                <td align="center">
                  <div align="center">Buyer</div>
                </td>
                <td align="center">
                  <div align="center">Langganan</div>
                </td>
                <td align="center">
                  <div align="center">Hanger</div>
                </td>
                <td align="center">
                  <div align="center">Item</div>
                </td>
                <td align="center">
                  <div align="center">Description</div>
                </td>
                <td align="center">
                  <div align="center">Style/Season</div>
                </td>
                <td align="center">
                  <div align="center">Color</div>
                </td>
                <td align="center">
                  <div align="center">PO Number</div>
                </td>
                <td align="center">
                  <div align="center">Bon Order</div>
                </td>
                <td align="center">
                  <div align="center">LOT</div>
                </td>
                <td align="center">
                  <div align="center">Tgl Inspek</div>
                </td>
                <td align="center">
                  <div align="center">Roll</div>
                </td>
                <td align="center">
                  <div align="center">Qty</div>
                </td>
                <td align="center">
                  <div align="center">Yard</div>
                </td>
                <td align="center">
                  <div align="center">Lebar</div>
                </td>
                <td align="center">
                  <div align="center">Gramasi</div>
                </td>
                <td align="center">
                  <div align="center">Lebar Inspek</div>
                </td>
                <td align="center">
                  <div align="center">Gramasi Inspek</div>
                </td>
                <td align="center">
                  <div align="center">A Slub</div>
                </td>
                <td align="center">
                  <div align="center">A Barre</div>
                </td>
                <td align="center">
                  <div align="center">A Uneven</div>
                </td>
                <td align="center">
                  <div align="center">A YarnContam</div>
                </td>
                <td align="center">
                  <div align="center">A Neps</div>
                </td>
                <td align="center">
                  <div align="center">B Missing</div>
                </td>
                <td align="center">
                  <div align="center">B Holes</div>
                </td>
                <td align="center">
                  <div align="center">B Streak</div>
                </td>
                <td align="center">
                  <div align="center">B MissKnit</div>
                </td>
                <td align="center">
                  <div align="center">B Knot</div>
                </td>
                <td align="center">
                  <div align="center">B Oil</div>
                </td>
                <td align="center">
                  <div align="center">B Fly</div>
                </td>
                <td align="center">
                  <div align="center">C Hair</div>
                </td>
                <td align="center">
                  <div align="center">C Holes</div>
                </td>
                <td align="center">
                  <div align="center">C Color</div>
                </td>
                <td align="center">
                  <div align="center">C Abra</div>
                </td>
                <td align="center">
                  <div align="center">C Dye</div>
                </td>
                <td align="center">
                  <div align="center">C Wrink</div>
                </td>
                <td align="center">
                  <div align="center">C Bowing</div>
                </td>
                <td align="center">
                  <div align="center">C Pin</div>
                </td>
                <td align="center">
                  <div align="center">C Pick</div>
                </td>
                <td align="center">
                  <div align="center">C Knot</div>
                </td>
                <td align="center">
                  <div align="center">D Uneven</div>
                </td>
                <td align="center">
                  <div align="center">D Stains</div>
                </td>
                <td align="center">
                  <div align="center">D Oil</div>
                </td>
                <td align="center">
                  <div align="center">D Dirt</div>
                </td>
                <td align="center">
                  <div align="center">D Water</div>
                </td>
                <td align="center">
                  <div align="center">E Print</div>
                </td>
                <td align="center">
                  <div align="center">Total Point</div>
                </td>
                <td align="center">
                  <div align="center">Jml A</div>
                </td>
                <td align="center">
                  <div align="center">Kg A</div>
                </td>
                <td align="center">
                  <div align="center">Yd A</div>
                </td>
                <td align="center">
                  <div align="center">Jml B</div>
                </td>
                <td align="center">
                  <div align="center">Kg B</div>
                </td>
                <td align="center">
                  <div align="center">Yd B</div>
                </td>
                <td align="center">
                  <div align="center">Jml C/X</div>
                </td>
                <td align="center">
                  <div align="center">Kg C/X</div>
                </td>
                <td align="center">
                  <div align="center">Yd C/X</div>
                </td>
              </tr>
            </tfoot>
          </table>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div id="Detail" class="modal fade modal-rotate-from-bottom" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
  </div>
  <!-- Modal Popup untuk delete-->
  <div class="modal fade" id="modal_delete" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
  function confirm_delete(delete_url) {
    $('#modal_delete').modal('show', { backdrop: 'static' });
    document.getElementById('delete_link').setAttribute('href', delete_url);
  }

</script>

</html>