<?php
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $modal_id = intval($_GET['id']);
    $modal = mysqli_query($con, "DELETE FROM tbl_detail_retur_now WHERE id='$modal_id' ");
    if ($modal) {
        echo "<script>window.location='LapRetur';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='LapRetur';</script>";
    }
} else {
    echo "<script>alert('ID tidak valid!');window.location='LapRetur';</script>";
}
?>
