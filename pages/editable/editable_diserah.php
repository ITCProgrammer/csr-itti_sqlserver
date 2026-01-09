<?PHP
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";

mysqli_query($con,"UPDATE mutasi_bs_krah SET `serah` = '$_POST[value]' where id = '$_POST[pk]'");

echo json_encode('success');
