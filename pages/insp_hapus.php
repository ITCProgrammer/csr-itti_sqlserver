<?php
    $modal_id=$_GET['id'];
    $modal1=mysql_query("DELETE FROM tbl_inspection WHERE id='$modal_id' ");
	//$modal1=mysql_query("UPDATE tbl_inspection SET id_schedule=null WHERE id='$modal_id' ");
    if ($modal1) {
        echo "<script>window.location='LapInspeksi';</script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='LapInspeksi';</script>";
    }
