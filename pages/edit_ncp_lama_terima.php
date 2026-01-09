<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
if ($_POST) {
    extract($_POST);
    $id = mysqli_real_escape_string($con,$_POST['id']);
	$note =mysqli_real_escape_string($con,$_POST['note']);
	if($_POST['tgl_terima']!=""){$ttrima=" `tgl_terima`='$_POST[tgl_terima]', "; }else{ $ttrima=" `tgl_terima`=null,";}
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_qcf_ncp_tolak` SET
				$ttrima
				`note`='$note',
				`tgl_update`=now()
				WHERE id='$id'");
    //echo " <script>window.location='?p=Batas-Produksi';</script>";
    echo "<script>swal({
  title: 'Data Telah diUbah',
  text: 'Klik Ok untuk melanjutkan',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    window.location='./StatusNCP';
  }
});</script>";
}
