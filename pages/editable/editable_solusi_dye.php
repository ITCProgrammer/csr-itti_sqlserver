<?PHP
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";

mysqli_query($con,"UPDATE tbl_ncp_qcf_now SET `solusi_jangka_panjang_dye` = '$_POST[value]' where id = '$_POST[pk]'");

echo json_encode('success');
