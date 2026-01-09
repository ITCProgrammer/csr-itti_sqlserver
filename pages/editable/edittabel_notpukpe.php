<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";

header('Content-Type: application/json');
if (!isset($_POST['pk'], $_POST['value'])) {
  http_response_code(400);
  echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
  exit;
}

// Ambil nilai mentah dan batasi maksimal 21 karakter
$pk   = (int)$_POST['pk'];
$raw  = isset($_POST['value']) ? trim($_POST['value']) : '';

// Validasi panjang input (maks 21 karakter)
if (function_exists('mb_strlen')) {
  if (mb_strlen($raw, 'UTF-8') > 21) {
    http_response_code(422);
    echo json_encode(['status' => 'error', 'message' => 'Maksimal 21 karakter']);
    exit;
  }
} else {
  if (strlen($raw) > 21) {
    http_response_code(422);
    echo json_encode(['status' => 'error', 'message' => 'Maksimal 21 karakter']);
    exit;
  }
}

$val = mysqli_real_escape_string($con, $raw);

$q = mysqli_query($con, "UPDATE tbl_detail_retur_now SET `notpukpe` = '$val' WHERE id = '$pk'");
if ($q) {
  echo json_encode(['status' => 'success']);
} else {
  http_response_code(500);
  echo json_encode(['status' => 'error', 'message' => mysqli_error($con)]);
}
