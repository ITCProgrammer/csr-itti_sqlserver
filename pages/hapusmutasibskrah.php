<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
    $modal=mysqli_query($con,"DELETE FROM mutasi_bs_krah WHERE id='$modal_id' ");
	$modal1=mysqli_query($con,"DELETE FROM mutasi_bs_krah_detail WHERE id_mutasi='$modal_id' ");
    if ($modal) {
        echo "<script>window.location='./MutasiBS';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='./MutasiBS';</script>";
    }
