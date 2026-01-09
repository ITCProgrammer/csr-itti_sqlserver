<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
    $modal=mysqli_query($con,"DELETE FROM tbl_inspection WHERE id='$modal_id' ");
    if ($modal) {
        echo "<script>window.location='LapInspeksi';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='LapInspeksi';</script>";
    }
