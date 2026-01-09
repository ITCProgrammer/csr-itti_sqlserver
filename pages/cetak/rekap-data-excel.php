<?php
// Jika ekspor ke Excel
// Gunakan parameter awal dari GET untuk nama file agar tidak undefined
$awalParam = isset($_GET['awal']) ? $_GET['awal'] : date('Y-m-d');
$fnameDate  = date('Ymd', strtotime($awalParam));
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=Rekap-Data-{$fnameDate}.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF"; // UTF-8 BOM

ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";

    $Awal       = isset($_GET['awal']) ? mysqli_real_escape_string($con, $_GET['awal']) : '';
    $Akhir      = isset($_GET['akhir']) ? mysqli_real_escape_string($con, $_GET['akhir']) : '';
    $Order      = isset($_GET['no_order']) ? mysqli_real_escape_string($con, $_GET['no_order']) : '';
    $PO         = isset($_GET['no_po']) ? mysqli_real_escape_string($con, $_GET['no_po']) : '';
    $Item       = isset($_GET['item']) ? mysqli_real_escape_string($con, $_GET['item']) : '';
    $Warna      = isset($_GET['warna']) ? mysqli_real_escape_string($con, $_GET['warna']) : '';
    $Langganan  = isset($_GET['langganan']) ? mysqli_real_escape_string($con, $_GET['langganan']) : '';
    $Delay      = isset($_GET['delay']) ? mysqli_real_escape_string($con, $_GET['delay']) : '';
    $Demand     = isset($_GET['demand']) ? mysqli_real_escape_string($con, $_GET['demand']) : '';
    $Prodorder  = isset($_GET['prodorder']) ? mysqli_real_escape_string($con, $_GET['prodorder']) : '';
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

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Rekap Data</title>
    <style>
      table { border-collapse: collapse; table-layout: fixed; width: 100%; font: 12px Arial, sans-serif; }
      /* Excel HTML tidak mengenal 8-digit hex (#000000ff). Gunakan 6-digit */
      th, td { border: 1px solid #999; padding: 4px; vertical-align: middle; }
      thead th { background: #e8f0fe; text-align: center; }
      tbody tr:nth-child(even) { background: #fafafa; }
      .text-center{ text-align:center; vertical-align: middle; }
      .text-right{ text-align:right; }
      .wrap{ white-space: normal; word-wrap: break-word; }
      .text{ mso-number-format:"\@"; }
      .num { mso-number-format:"0"; }
      .num2{ mso-number-format:"0.00"; }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <!-- <th rowspan="2">Aksi</th> -->
            <th rowspan="2">No KK</th>
            <th rowspan="2">No Demand New Server</th>
            <th rowspan="2">Lot Legacy</th>
            <th rowspan="2">Buyer</th>
            <th rowspan="2">Order</th>
            <th rowspan="2">PO</th>
            <th rowspan="2">Qty Order</th>
            <th rowspan="2">Jml Bruto</th>
            <th rowspan="2">Hanger</th>
            <th rowspan="2">Item</th>
            <th rowspan="2">No Warna</th>
            <th rowspan="2">Warna</th>
            <th rowspan="2">Prod. Order/Lot</th>
            <th rowspan="2">L</th>
            <th rowspan="2">Grms</th>
            <th rowspan="2">Tgl Msk</th>
            <th rowspan="2">Roll</th>
            <th rowspan="2">Netto</th>
            <th rowspan="2">Panjang</th>
            <th rowspan="2">Sisa</th>
            <th rowspan="2">Cek Warna</th>
            <th rowspan="2">Masalah</th>
            <th colspan="2">FOC</th>
            <th colspan="2">Estimasi FOC</th>
            <th rowspan="2">No Demand Old Server</th>
            <th rowspan="2">Prod. Order Old Server</th>
            <th rowspan="2">Ket</th>
            <th rowspan="2">Availability</th>
        </tr>
        <tr>
            <th>KG</th>
            <th>Panjang</th>
            <th>KG</th>
            <th>Panjang</th>
        </tr>
    </thead>
    <tbody>
        <?php
        function get_nodemand($sql) {
            $nodemand = array();
            while($r=mysqli_fetch_array($sql)){
                $nodemand[]  =$r['nodemand'];
            }
            return $nodemand;
        }
        
        $no=1;
        // Initialize filters to avoid undefined notices
        $Where = '';
        $Dly   = '';
        if($Awal!=""){ $Where =" AND DATE_FORMAT( a.tgl_masuk, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
        if($Delay=="1"){ $Dly =" AND DATEDIFF(a.tgl_pack, a.tglcwarna)>=3 AND a.sts_nodelay='0'"; }
        if($Awal!="" or $Delay=="1" or $Order!="" or $Warna!="" or $Item!="" or $PO!="" or $Langganan!="" or $Demand!="" or $Prodorder!=""){
            $code = "SELECT a.*, b.berat_order_now, b.panjang_order_now FROM tbl_qcf a
            left join tbl_qcf_qty_order b on (a.id = b.id)
            WHERE a.no_order LIKE '$Order%' AND a.no_po LIKE '$PO%' AND a.no_hanger LIKE '$Item%' AND a.warna LIKE '$Warna%' AND a.pelanggan LIKE '$Langganan%' AND a.nodemand LIKE '%$Demand%' AND a.lot LIKE '%$Prodorder%' $Where $Dly";
            $sql=mysqli_query($con,$code);
        }else{
            $code = "SELECT a.*, b.berat_order_now, b.panjang_order_now FROM tbl_qcf a 
            left join tbl_qcf_qty_order b on (a.id = b.id)
            WHERE a.no_order LIKE '$Order' AND a.no_po LIKE '$PO' AND a.no_hanger LIKE '$Item' AND a.warna LIKE '$Warna' AND a.pelanggan LIKE '$Langganan' AND a.nodemand LIKE '$Demand' AND a.lot LIKE '$Prodorder' $Where $Dly";
            $sql=mysqli_query($con,$code);
        }
        $col=0;
        
        while($r=mysqli_fetch_array($sql)){
            if($r['tglcwarna']==NULL){
                $tgl_warna= new DateTime($r['tgl_pack']);
            }else{
                $tgl_warna= new DateTime($r['tglcwarna']);
            }
            $tgl_pack= new DateTime($r['tgl_pack']);
            $delay = $tgl_pack->diff($tgl_warna);
            
            // Style untuk baris
            $rowStyle = "background-color: white; border: 1px solid #000; padding: 4px; text-align: center; font-size: 10px;";
            $centerStyle = "text-align: center; border: 1px solid #000; padding: 4px;";
            $rightStyle = "text-align: right; border: 1px solid #000; padding: 4px;";
            $leftStyle = "text-align: left; border: 1px solid #000; padding: 4px;";
        ?>
        <tr style="<?= $rowStyle ?>">
            <td style="<?= $centerStyle ?>"><?= $no ?></td>
            <td style="<?= $centerStyle ?>">
                <?= $r['nokk'] ?> &nbsp;&nbsp;&nbsp;&nbsp;
                <?php if($tgl_warna>$tgl_pack): ?>
                    <span >OK</span>
                <?php elseif($delay->days>=3): ?>
                    <span>Delay <?= $delay->days ?> Hari</span>
                <?php else: ?>
                    <span>OK</span>
                <?php endif; ?>
            </td>
            <td style="<?= $centerStyle ?>"><?= $r['nodemand'] ?></td>
            <td style="<?= $centerStyle ?>"><?=  "'".$r['lot_legacy'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['pelanggan'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['no_order'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['no_po'] ?></td>
            <td style="<?= $rightStyle ?>">
                <?php
                if ($r['berat_order'] > 0 ) {
                    echo $r['berat_order']."x".$r['panjang_order']." ".$r['satuan_order'];
                } else {
                    echo $r['berat_order_now']."x".$r['panjang_order_now']." ".$r['satuan_order'];
                }
                ?>
            </td>
            <td style="<?= $centerStyle ?>"><?= $r['rol_bruto']."x".$r['berat_bruto'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['no_hanger'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['no_item'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['no_warna'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['warna'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['lot'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['lebar'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['gramasi'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['tgl_masuk'] ?></td>
            <td style="<?= $rightStyle ?>"><?= $r['rol'] ?></td>
            <td style="<?= $rightStyle ?>"><?= $r['netto'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['panjang']." ".$r['satuan'] ?></td>
            <td style="<?= $rightStyle ?>"><?= $r['sisa'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['cek_warna'] ?></td>
            <td style="<?= $leftStyle ?>"><?= $r['masalah'] ?></td>
            <td style="<?= $rightStyle ?>"><?= $r['berat_extra'] ?></td>
            <td style="<?= $rightStyle ?>"><?= $r['panjang_extra'] ?></td>
            <td style="<?= $rightStyle ?>"><?= $r['estimasi'] ?></td>
            <td style="<?= $rightStyle ?>"><?= $r['panjang_estimasi'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['demand'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['lot_erp_qcf'] ?></td>
            <td style="<?= $leftStyle ?>"><?= $r['ket'] ?></td>
            <td style="<?= $centerStyle ?>"><?= $r['availability'] ?></td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>

<style>
@keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
}
.blink_me {
    animation: blink 1s infinite;
}
</style>

</body>
</html>
