<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
if ($_POST) {
    extract($_POST);
    $id = mysqli_real_escape_string($con,$_POST['id']);
	if($_POST['tgl_buat']!=""){$tbuat=" `tgl_buat`='$_POST[tgl_buat]', "; }else{ $tbuat=" `tgl_buat`=null,";}
	$sqlupdate1=mysqli_query($con,"UPDATE `tbl_ncp_qcf` SET
				`tempat`='$_POST[tempat]',
				`tgl_update`=now()
				WHERE `id`='$id' ");
    $sqlupdate=mysqli_query($con,"INSERT INTO `tbl_qcf_ncp_tolak` SET
				$tbuat
				`id_qcf_ncp`='$_POST[id]',
				`tgl_update`=now()");
    //echo " <script>window.location='?p=Batas-Produksi';</script>";
    echo "<script>swal({
  title: 'Data Telah diTambah',
  text: 'Klik Ok untuk melanjutkan',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    window.location='./StatusNCP';
  }
});</script>";
}
