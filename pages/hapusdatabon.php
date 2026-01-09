<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$qry=mysqli_query($con,"SELECT id_nsp FROM tbl_ganti_kain_now WHERE id='$modal_id'");
	$r=mysqli_fetch_array($qry);
	$id=$r['id_nsp'];
    $modal=mysqli_query($con,"DELETE FROM tbl_ganti_kain_now WHERE id='$modal_id' ");
    if ($modal) {
        echo "<script>window.location='TambahBon-$id';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='TambahBon-$id';</script>";
    }
