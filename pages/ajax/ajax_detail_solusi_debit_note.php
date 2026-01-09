<?php
include "../../koneksi.php";

$id_nsp = $_POST['id_nsp'];
// $dn_kg = $_POST['dn_kg'];
// $dn_yd = $_POST['dn_yd'];
// $format_amount = str_replace(['.', ','], '', $_POST['dn_amount']);
// $amount = strtoupper($format_amount);
// $currency = strtoupper($_POST['curreny']);
// Tambahan field baru
$total_kg      = isset($_POST['total_kg']) ? $_POST['total_kg'] : '';
$total_yard    = isset($_POST['total_yard']) ? $_POST['total_yard'] : '';
$harga_per_yard_raw = isset($_POST['harga_per_yard']) ? $_POST['harga_per_yard'] : '';
$total_harga_raw    = isset($_POST['total_harga']) ? $_POST['total_harga'] : '';
$ket           = isset($_POST['ket']) ? $_POST['ket'] : '';

// Normalisasi rupiah (hapus . dan ,)
$harga_per_yard = str_replace(['.', ','], '', $harga_per_yard_raw);
$total_harga    = str_replace(['.', ','], '', $total_harga_raw);

$sqlData1 = mysqli_query($con, "INSERT INTO 
                                    tbl_debit_note 
                                SET 
                                    id_nsp='".$id_nsp."', 
                                    total_kg='".$total_kg."',
                                    total_yard='".$total_yard."',
                                    harga_per_yard='".$harga_per_yard."',
                                    total_harga='".$total_harga."',
                                    ket='".$ket."'
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