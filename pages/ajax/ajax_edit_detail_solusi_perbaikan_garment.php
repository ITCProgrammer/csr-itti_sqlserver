<?php
include "../../koneksi.php";

$id = $_POST['id'];
$id_nsp = $_POST['id_nsp'];
$pcs = strtoupper($_POST['pg_pcs']);
$format_amount = str_replace(['.', ','], '', $_POST['pg_amount']);
$amount = strtoupper($format_amount);
$currency = strtoupper($_POST['currency']);

$sqlData1 = mysqli_query($con, "UPDATE 
                                    tbl_perbaikan_garment 
                                SET 
                                    id_nsp='$id_nsp', 
                                    qty_pcs='$pcs', 
                                    amount='$amount', 
                                    currency='$currency' 
                                WHERE 
                                    id='$id'
");

if ($sqlData1) {
    echo json_encode([
        "status" => 204,
        "description" => "No Content",
    ]);
} else {
    echo json_encode([
        "status" => 409,
        "description" => "Conflict",
        "message" => "Error: " . mysqli_error($con), // Tampilkan pesan kesalahan jika perintah SQL gagal
    ]);
}