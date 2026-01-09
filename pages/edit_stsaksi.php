<?
//$nokk=$_POST['nokk'];
//$noorder=$_POST['no_order'];
//$po=$_POST['no_po'];
//$user=$_POST['user_login'];
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
if ($_POST) {
    extract($_POST);
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $sts_aksi =mysqli_real_escape_string($con,$_POST['sts_aksi']);
    $editor =mysqli_real_escape_string($con,$_POST['editor']);
    $nokk = mysqli_real_escape_string($con,$_POST['nokk']);
    $noorder = mysqli_real_escape_string($con,$_POST['no_order']);
    $po = mysqli_real_escape_string($con,$_POST['no_po']);
    //$user = mysqli_real_escape_string($_POST['user_login']);
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_qcf` SET
				`sts_aksi`='$sts_aksi',
				`editor`='$editor',
				`tgl_update`=now()
        WHERE `id`='$id' LIMIT 1");
    $sqlEdit=mysqli_query($con,"INSERT INTO `tbl_log_editpb` SET
        `user_login`='$_SESSION[nama1]',
				`nokk`='$nokk',
        `no_order`='$noorder',
        `no_po`='$po',
        `proses`='Edit Status menjadi $_POST[sts_aksi] oleh $_POST[editor] pada $_POST[nokk]',
        `ipaddress`='$_SERVER[REMOTE_ADDR]',
				`tgl_update`=now()");
    if($sqlupdate){
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
}
