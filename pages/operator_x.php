<?php
include("../koneksi.php");

$sqlYard = "SELECT 
                SUM(LENGTHGROSS) AS LENGTHGROSS,
	            COUNT(LENGTHGROSS) AS ROLL
            FROM ELEMENTSINSPECTION
            WHERE DEMANDCODE ='$_GET[demand]' AND OPERATORCODE = '$_GET[selectedValue]' ";
$stmtYard = db2_exec($conn1, $sqlYard, array('cursor' => DB2_SCROLLABLE));
$rowYard = db2_fetch_assoc($stmtYard);

$sqlKonversi = "SELECT
                SECONDARYUNSTEADYCVSFACTOR
            FROM ITXVIEW_NETTO
            WHERE CODE ='$_GET[demand]' ";
$stmtKonversi = db2_exec($conn1, $sqlKonversi, array('cursor' => DB2_SCROLLABLE));
$rowKonversi = db2_fetch_assoc($stmtKonversi);

$KG = $rowYard['LENGTHGROSS'] / $rowKonversi['SECONDARYUNSTEADYCVSFACTOR'];

$response['yard'] = sprintf("%.2f", $rowYard['LENGTHGROSS']);
$response['kg'] = sprintf("%.2f", $KG);
$response['rol'] = $rowYard['ROLL'];

echo json_encode($response);

?>