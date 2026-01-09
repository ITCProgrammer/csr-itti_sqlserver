<?PHP
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";

mysqli_query($con,"UPDATE tbl_lap_shading SET `roll_gs3` = '$_POST[value]' where id = '$_POST[pk]'");

echo json_encode('success');
