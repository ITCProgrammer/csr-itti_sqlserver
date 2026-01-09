<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$idnsp=$_POST['idnsp'];
if ($_POST) {
    extract($_POST);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $nm_prshn=str_replace("'","''",$_POST['nm_prshn']);
    $alamat=str_replace("'","''",$_POST['alamat']);
    $tgl_kunjungan=$_POST['tgl_kunjungan'];
    $tgl_kunjungan2=$_POST['tgl_kunjungan2'];
    $jenis_kunjungan=str_replace("'","''",$_POST['jenis_kunjungan']);
    $tujuan_kunjungan=str_replace("'","''",$_POST['tujuan_kunjungan']);
    $petugas=str_replace("'","''",$_POST['petugas']);
    $pejabat=str_replace("'","''",$_POST['pejabat']);
    $ket=str_replace("'","''",$_POST['ket']);
    //$korelasi=str_replace("'","''",$_POST['sts_korelasi']);
    if($_POST['sts_korelasi']=="1"){$korelasi="1";}else{ $korelasi="0";}
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_lkpp` SET
		`nm_prshn`='$nm_prshn',
		`alamat`='$alamat',
		`tgl_kunjungan`='$tgl_kunjungan',
    `tgl_kunjungan2`='$tgl_kunjungan2',
		`jenis_kunjungan`='$jenis_kunjungan',
        `tujuan_kunjungan`='$tujuan_kunjungan',
        `petugas`='$petugas',
        `pejabat`='$pejabat',
        `ket`='$ket',
        `sts_korelasi`='$korelasi',
        `tgl_update`=now()
				WHERE `id`='$id' LIMIT 1");
    echo "<script>swal({
      title: 'Data Telah diUbah',
      text: 'Klik Ok untuk melanjutkan',
      type: 'success',
      }).then((result) => {
      if (result.value) {
        window.location='FormLKPP';
      }
    });</script>";
}
