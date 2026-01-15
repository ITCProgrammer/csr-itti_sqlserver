<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
if ($_POST) {
    extract($_POST);
    $id = $_POST['id'];
    $masalah = $_POST['masalah'];
    if($_POST['sts_nodelay']=="1"){$sts_nodelay="1";}else{ $sts_nodelay="0";}
    $sql = "UPDATE db_qc.tbl_qcf SET
        rol = ?,
        netto = ?,
        panjang = ?,
        satuan = ?,
        tgl_fin = ?,
        tgl_ins = ?,
        tgl_pack = ?,
        tgl_masuk = ?,
        ket = ?,
        sts_nodelay = ?,
        masalah = ?
      WHERE id = ?";
    $params = array(
        $_POST['rol'],
        $_POST['netto'],
        $_POST['panjang'],
        $_POST['satuan'],
        $_POST['tgl_fin'],
        $_POST['tgl_inspek'],
        $_POST['tgl_packing'],
        $_POST['tgl_masuk'],
        $_POST['ket'],
        $sts_nodelay,
        $masalah,
        $id,
    );
    $sqlupdate = sqlsrv_query($con, $sql, $params);
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
