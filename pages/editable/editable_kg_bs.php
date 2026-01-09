<?PHP
// ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";

// mysqli_query($con,"UPDATE mutasi_bs_krah_detail SET `qty` = '$_POST[value]' where id = '$_POST[pk]'");

// echo json_encode('success');

$json = filter_input(INPUT_POST, 'json');
$json = json_decode($json);
$id = $json->id;
$idmutasi = $json->idmutasi;
$qty = $json->qty;


$query = mysqli_query($con, "SELECT * FROM mutasi_bs_krah_detail where id = '$id' and id_mutasi = '$idmutasi'");
$num = mysqli_num_rows($query);

if ($num > 0) {
    mysqli_query($con, "UPDATE mutasi_bs_krah_detail SET qty = '$qty' where id = '$id'");
    $response = array();
    $response['id'] = $id;

    echo json_encode($response);
} else {
    mysqli_query($con, "INSERT INTO mutasi_bs_krah_detail (id_mutasi, qty, tgl_update) VALUES ('$idmutasi', '$qty',now())");

    $response = array();
    $response['id'] = mysqli_insert_id($con);

    echo json_encode($response);
}