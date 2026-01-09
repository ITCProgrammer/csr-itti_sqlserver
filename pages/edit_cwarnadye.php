<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
if ($_POST) {
    extract($_POST);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $no_po=str_replace("'","''",$_POST['no_po']);
    $ket=str_replace("'","''",$_POST['ket']);
    $no_order=str_replace("'","''",$_POST['no_order']);
    $disposisi=str_replace("'","''",$_POST['disposisi']);
    $colorist_qcf=str_replace("'","''",$_POST['colorist_qcf']);
    $status_warna=str_replace("'","''",$_POST['status_warna']);
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_lap_inspeksi` SET
	`no_po`='$no_po',
	`ket`='$ket',
	`no_order`='$no_order',
	`disposisi`='$disposisi',
    `status_warna`='$status_warna',
    `colorist_qcf`='$colorist_qcf',
    `tgl_update`=now()
	WHERE `id`='$id' LIMIT 1");
    echo "<script>swal({
      title: 'Data Telah diUbah',
      text: 'Klik Ok untuk melanjutkan',
      type: 'success',
      }).then((result) => {
      if (result.value) {
        window.location='LihatCWarnaDye';
      }
    });</script>";
}
