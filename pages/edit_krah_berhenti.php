<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
if($_POST){ 
	extract($_POST);
	$id = mysqli_real_escape_string($con,$_POST['id']);
	$catatan = mysqli_real_escape_string($con,$_POST['catatan']);
	$qty_netto = mysqli_real_escape_string($con,$_POST['qty_netto']);
	$rol_netto = mysqli_real_escape_string($con,$_POST['rol_netto']);
	$pcs_netto = mysqli_real_escape_string($con,$_POST['pcs_netto']);
		$sqlupdate1=mysqli_query($con,"UPDATE `tbl_schedule_krah` SET 
		`status`='selesai',
		`tgl_stop`=now(),
		`qty_netto`='$_POST[qty_netto]',
		`rol_netto`='$_POST[rol_netto]',
		`pcs_netto`='$_POST[pcs_netto]',
		`qty_sisa`='$_POST[qty_sisa]',
		`rol_sisa`='$_POST[rol_sisa]',
		`pcs_sisa`='$_POST[pcs_sisa]',
		`catatan`='$catatan'
		WHERE `id`='$id' LIMIT 1");
		echo " <script>window.location='ScheduleKrah';</script>";
						
		}
		

?>
