<?
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
    if($_POST['sts_aksippc']=="1"){$sts_aksippc="1";}else{ $sts_aksippc="0";}
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_qcf` SET
				`sts_aksippc`='$sts_aksippc',
				`verif_ppc`='$verif_ppc',
				`tgl_update`=now()
        WHERE `id`='$id' LIMIT 1");
    $sqlEdit=mysqli_query($con,"INSERT INTO `tbl_log_editpb` SET
        `user_login`='$_SESSION[nama1]',
		`nokk`='$nokk',
        `no_order`='$noorder',
        `no_po`='$po',
        `proses`='Edit Status menjadi $_POST[sts_aksippc] oleh $_POST[verif_ppc] pada $_POST[nokk]',
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
