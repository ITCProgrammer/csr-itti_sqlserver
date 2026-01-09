<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
	$id=$_GET['idr'];
    $modal=mysql_query($con,"DELETE FROM tbl_dept WHERE id='$modal_id' ");
    if ($modal) {
        echo "<script>window.location='./DetailData-$id';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='./DetailData-$id';</script>";
    }
