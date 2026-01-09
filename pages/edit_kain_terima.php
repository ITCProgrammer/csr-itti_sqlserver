<?php
session_start();
include("../koneksi.php");

function get_client_ip()
{
	$ipaddress = '';
	if (isset($_SERVER['HTTP_CLIENT_IP']))
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if (isset($_SERVER['HTTP_X_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if (isset($_SERVER['HTTP_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if (isset($_SERVER['REMOTE_ADDR']))
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}

$ip_num = get_client_ip();

$id = mysqli_real_escape_string($conlab, $_POST['id']);
$sts = mysqli_real_escape_string($conlab, $_POST['sts']);
$no_counter = mysqli_real_escape_string($conlab, $_POST['no_counter']);
$penerima = mysqli_real_escape_string($conlab, $_POST['nama_penerima']);
$diterima = mysqli_real_escape_string($conlab, $_POST['diterima_oleh']);

$success = true;

mysqli_begin_transaction($conlab);

$sqlupdate = "UPDATE `tbl_test_qc` SET 
                `sts_qc`='$sts',
                `sts_laborat`='In Progress',
                `nama_penerima`='$penerima',
                `diterima_oleh`='$diterima',
                `tgl_terimakain`=now(),
                `terimakain_by`='{$_SESSION['usrid']}'
                WHERE `id`='$id' LIMIT 1";

$result_update = mysqli_query($conlab, $sqlupdate);

if (!$result_update) {
	$success = false;
}

$sql_log = "INSERT INTO log_qc_test (no_counter, `status`, info, do_by, do_at, ip_address)
            VALUES ('$no_counter', 'In Progress', 'Kain sudah diterima QC', '{$_SESSION['usrid']}', NOW(), '$ip_num')";

$result_log = mysqli_query($conlab, $sql_log);

if (!$result_log) {
	$success = false;
}

if ($success) {
	mysqli_commit($conlab);
	echo "<script>window.location='KainInLab';</script>";
} else {
	mysqli_rollback($conlab);
	echo "<script>swal({
	title: 'Gagal terima kain!!',
	text: 'Terjadi kesalahan,coba lagi nanti.',
	type: 'error',
	}).then((result) => {
	if (result.value) {
		window.history.back();
	}
	});</script>";
}
