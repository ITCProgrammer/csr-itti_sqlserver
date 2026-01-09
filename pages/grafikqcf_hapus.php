<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$qry=mysqli_query($con,"SELECT gambar FROM tbl_gambar WHERE id='$modal_id'");
	$r=mysqli_fetch_array($qry);
	$gambar=$r['gambar'];
	$modal1=mysqli_query($con,"DELETE FROM tbl_gambar WHERE id='$modal_id' ");
    if ($modal1) {
		$file="dist/img/gambar/".$gambar;
		if(file_exists($file)){
			unlink($file);
		}
		echo "<script>window.location='GrafikQCF';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='GrafikQCF';</script>";
    }
