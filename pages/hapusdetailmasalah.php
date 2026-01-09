<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$qry=mysqli_query($con,"SELECT id_qcf FROM tbl_qcf_detail WHERE id='$modal_id'");
	$r=mysqli_fetch_array($qry);
	$id=$r['id_qcf'];
    $modal=mysqli_query($con,"DELETE FROM tbl_qcf_detail WHERE id='$modal_id' ");
    if ($modal) {
        echo "<script>window.location='./DetailDataKJ-$id';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='./DetailDataKJ-$id';</script>";
    }
