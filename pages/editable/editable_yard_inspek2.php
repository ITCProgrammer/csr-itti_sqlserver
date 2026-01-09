<?PHP
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
// echo '$_POST[value]';
// echo '$_POST[pk]';
mysqli_query($con, "UPDATE tbl_schedule SET `pjng_order` = '$_POST[value]' where id = '$_POST[pk]'");

echo json_encode('success');
