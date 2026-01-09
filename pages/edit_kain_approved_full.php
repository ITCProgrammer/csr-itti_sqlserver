<?php
session_start();

$id = $_POST['id'];
$no_counter = $_POST['no_counter'];

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

$approved1 = str_replace("'", "''", $_POST['approved1']);
$approved2 = str_replace("'", "''", $_POST['approved2']);

mysqli_begin_transaction($conlab);

try {
	$sql_update = "UPDATE `tbl_test_qc` SET 
                    `sts_qc`='Hasil Test Full',
                    `sts_laborat`='Waiting Approval Full',
                    `tgl_approve_qc` = NOW(),
                    `approved_qc1` ='$approved1',
                    `approved_qc2` ='$approved2'
                    -- `terimakain_by`='{$_SESSION['usrid']}'
                    WHERE `id`='$id' LIMIT 1";

	$result_update = mysqli_query($conlab, $sql_update);

	if (!$result_update) {
		throw new Exception("Query UPDATE failed.");
	}

	$sql_insert_log = "INSERT INTO log_qc_test (no_counter, `status`, info, do_by, do_at, ip_address)
                        VALUES ('$no_counter', 'Waiting Approval Full', 'QC sudah approve full', '{$_SESSION['usrid']}', NOW(), '$ip_num')";

	$result_insert_log = mysqli_query($conlab, $sql_insert_log);

	if (!$result_insert_log) {
		throw new Exception("Query INSERT log failed.");
	}

	mysqli_commit($conlab);

	echo "<script>window.location='KainInLab';</script>";
} catch (Exception $e) {
	mysqli_rollback($conlab);

	echo "<script>swal({
	title: 'Gagal approve!!',
	text: 'Terjadi kesalahan,coba lagi nanti.',
	type: 'error',
	}).then((result) => {
	if (result.value) {
		window.history.back();
	}
	});</script>";
}
