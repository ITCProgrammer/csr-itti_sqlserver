<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
if ($_POST) {
    extract($_POST);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $status =mysqli_real_escape_string($con,$_POST['status']);
    $orderretur =mysqli_real_escape_string($con,$_POST['order_returbaru']);
    $status1 =mysqli_real_escape_string($con,$_POST['status1']);
    $status2 =mysqli_real_escape_string($con,$_POST['status2']);
    $status3 =mysqli_real_escape_string($con,$_POST['status3']);
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_detail_retur` SET
				        `status`='$status',
                `order_returbaru`='$orderretur',
                `status1`='$status1',
                `status2`='$status2',
                `status3`='$status3',
				`tgl_update`=now()
				WHERE `id`='$id' LIMIT 1");
    echo "<script>swal({
  title: 'Data Telah diUbah',
  text: 'Klik Ok untuk melanjutkan',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    window.history.back();
  }
});</script>";
}
