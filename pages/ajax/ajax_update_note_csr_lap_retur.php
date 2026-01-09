<?php
include "../../koneksi.php";

// Ambil data dari AJAX
$id     = isset($_POST['id']) ? intval($_POST['id']) : 0;
$note   = isset($_POST['note']) ? $con->real_escape_string($_POST['note']) : '';

// Validasi simple
if ($id <= 0 || empty($note)) {
    echo json_encode([
        "status" => "error",
        "message" => "ID atau Note tidak boleh kosong",
        "code" => 400,
    ]);
    exit;
}

$update = mysqli_query($con, "UPDATE tbl_detail_retur_now SET note_csr='$note' where id = '$id'");

if ($update) {
    echo json_encode([
        "status" => "success",
        "message" => "Note berhasil disimpan",
        "code" => 200,
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Error: " . $con->error,
        "code" => 400,

    ]);
}

$conn->close();
