<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
    $modal=sqlsrv_query($con,"DELETE FROM db_qc.tbl_qcf WHERE id='$modal_id' ");
    if ($modal) {
        echo 
        "<script>swal({
                title: 'Data Telah diHapus',
                text: 'Klik Ok untuk melanjutkan',
                type: 'success',
                }).then((result) => {
                if (result.value) {
                    window.location='./RekapData';
                }
                });
        </script>";
    } else {
        echo "<script>alert('Gagal Hapus');window.location='./RekapData';</script>";
    }
