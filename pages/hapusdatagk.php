<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
    $modal=mysqli_query($con,"DELETE FROM tbl_ganti_kain_now WHERE id='$modal_id' ");
    if ($modal) {
        echo "<script>window.location='./LapGantiKain';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='./LapGantiKain';</script>";
    }
