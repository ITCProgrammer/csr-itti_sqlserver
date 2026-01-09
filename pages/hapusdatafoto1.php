<?php
    ini_set("error_reporting", 1);
    session_start();
    include("../koneksi.php");
    $modal_id=$_GET['id'];
    $filename=$_GET['filename'];
    //$file=glob("dist/pdf/".$filename);
    $file=unlink("dist/img-disposisinow/".$filename);
    $modal=mysqli_query($con,"UPDATE tbl_disposisi_now SET file_foto=NULL WHERE id='$modal_id' ");
    if ($modal) {
        echo "<script>window.location='./EditDisposisi-$_GET[id]';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='./EditDisposisi-$_GET[id]';</script>";
    }
