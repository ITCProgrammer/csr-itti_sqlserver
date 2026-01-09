<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$idnsp=$_POST['idnsp'];
if ($_POST) {
    extract($_POST);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $no_po=str_replace("'","''",$_POST['no_po']);
    $catatan=str_replace("'","''",$_POST['catatan']);
    $no_order=str_replace("'","''",$_POST['no_order']);
    $proses=str_replace("'","''",$_POST['proses']);
    $status=str_replace("'","''",$_POST['status']);
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_lap_inspeksi` SET
	`no_po`='$no_po',
	`catatan`='$catatan',
	`no_order`='$no_order',
	`proses`='$proses',
    `status`='$status'
	WHERE `id`='$id' LIMIT 1");
    echo "<script>swal({
      title: 'Data Telah diUbah',
      text: 'Klik Ok untuk melanjutkan',
      type: 'success',
      }).then((result) => {
      if (result.value) {
        window.location='LihatCWarnaFin';
      }
    });</script>";
}
