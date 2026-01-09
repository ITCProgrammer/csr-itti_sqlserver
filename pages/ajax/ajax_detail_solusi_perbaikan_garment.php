<?php
include "../../koneksi.php";

$id_nsp = $_POST['id_nsp'];
$pcs = strtoupper($_POST['pg_pcs']);
$format_amount = str_replace(['.', ','], '', $_POST['pg_amount']);
$amount = strtoupper($format_amount);
$currency = strtoupper($_POST['currency']);

$sqlData1 = mysqli_query($con, "INSERT INTO 
                                    tbl_perbaikan_garment 
                                SET 
                                    id_nsp='$id_nsp', 
                                    qty_pcs='$pcs', 
                                    amount='$amount', 
                                    currency='$currency'
");

if ($sqlData1) {
    echo json_encode([
        "status" => 201,
        "description" => "Created",
    ]);
} else {
    echo json_encode([
        "status" => 409,
        "description" => "Conflict",
        "message" => "Error: " . mysqli_error($con), // Tampilkan pesan kesalahan jika perintah SQL gagal
    ]);
}