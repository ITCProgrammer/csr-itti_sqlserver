<?php
    ini_set("error_reporting", 1);
    session_start();
    include("../koneksi.php");
    $modal_id=$_POST['id'];
    $modal="DELETE FROM tbl_lap_inspeksi WHERE id='$modal_id' ";
    $result = mysqli_query($con,$modal) or die(mysqli_error());
    //if ($modal) {
    //    echo "<script>window.location='LihatCWarnaFin';</script>";
    //} else {
    //    echo "<script>alert('Gagal Hapus');window.location='LihatCWarnaFin';</script>";
    //}
?>
