<?php
    ini_set("error_reporting", 1);
    session_start();
    include("../koneksi.php");
    $modal_id=$_GET['id'];
    $filename=$_GET['filename'];
    //$file=glob("dist/pdf/".$filename);
    $file=unlink("dist/pdf/".$filename);
    $modal=mysqli_query($con,"UPDATE tbl_firstlot SET spectro=NULL WHERE id='$modal_id' ");
    if ($modal) {
        echo "<script>window.location='./LihatFirstLotNew';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='./LihatFirstLotNew';</script>";
    }
