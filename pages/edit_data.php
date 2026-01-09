<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
if ($_POST) {
    extract($_POST);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $masalah =mysqli_real_escape_string($con,$_POST['masalah']);
    if($_POST['sts_nodelay']=="1"){$sts_nodelay="1";}else{ $sts_nodelay="0";}
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_qcf` SET
				`rol`='$_POST[rol]',
        `netto`='$_POST[netto]',
        `panjang`='$_POST[panjang]',
        `satuan`='$_POST[satuan]',
        `tgl_fin`='$_POST[tgl_fin]',
        `tgl_ins`='$_POST[tgl_inspek]',
        `tgl_pack`='$_POST[tgl_packing]',
        `tgl_masuk`='$_POST[tgl_masuk]',
        `ket`='$_POST[ket]',
        `sts_nodelay`='$sts_nodelay',
        `masalah`='$masalah'
				WHERE `id`='$id' LIMIT 1");
    //echo " <script>window.location='?p=Batas-Produksi';</script>";
    echo "<script>swal({
  title: 'Data Telah diUbah',
  text: 'Klik Ok untuk melanjutkan',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    window.location='./RekapData';
  }
});</script>";
}
