<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$qcek=mysqli_query($con,"SELECT * FROM mutasi_bs_krah_detail WHERE id='$modal_id'");
	$rcek=mysqli_fetch_array($qcek);
	$idm=$rcek['id_mutasi'];
    $modal=mysqli_query($con,"DELETE FROM mutasi_bs_krah_detail WHERE id='$modal_id' ");
    if ($modal) {
        echo "<script>window.location='./MutasiBSDetail-$idm';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='./MutasiBSDetail-$idm';</script>";
    }
