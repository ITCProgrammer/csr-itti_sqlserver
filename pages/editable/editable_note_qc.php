<?php

/* 
--- INI CODE LAMA ---
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
$note_qc = str_replace("'", "''", $_POST[value]);
mysqli_query($conlab, "UPDATE tbl_test_qc SET `note_qc` = '$note_qc' where id = '$_POST[pk]'");

echo json_encode('success');
*/

// --- INI CODE BARU Update by ilham 21/06/2024 No Ticket BDIT240001517 ---
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";

mysqli_query($conlab, "UPDATE tbl_test_qc SET note_qc = '$_POST[value]' where id = '$_POST[pk]'");

echo json_encode('success');
