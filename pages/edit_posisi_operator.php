<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
if ($_POST) {
    extract($_POST);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $nama = mysqli_real_escape_string($con,strtoupper($_POST['nama']));
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_posisi_operator` SET
				`nama`='$nama',
				`tgl_update`=now()
				WHERE `id`='$id' LIMIT 1");
    //echo " <script>window.location='?p=Line-News';</script>";
    echo "<script>swal({
  title: 'Data Tersimpan',
  text: 'Klik Ok untuk melanjutkan',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    window.location='PosisiOperator';
  }
});</script>";
}
