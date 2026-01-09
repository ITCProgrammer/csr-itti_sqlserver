<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
if ($_POST) {
    extract($_POST);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $line = mysqli_real_escape_string($con,strtoupper($_POST['line_news']));
	$sts = mysqli_real_escape_string($con,$_POST['sts']);
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_news_line` SET
				`news_line`='$line',
				`status`='$sts',
				`tgl_update`=now()
				WHERE `id`='$id' LIMIT 1",$con);
    //echo " <script>window.location='?p=Line-News';</script>";
    echo "<script>swal({
  title: 'Data Tersimpan',
  text: 'Klik Ok untuk melanjutkan',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    window.location='LineNews';
  }
});</script>";
}
