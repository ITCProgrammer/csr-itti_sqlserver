<?PHP
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";

$update = mysqli_query($con,"UPDATE tbl_ganti_kain_now SET `status` = '$_POST[value]' where id = '$_POST[pk]'");

if($update){
    echo json_encode('success');
}
