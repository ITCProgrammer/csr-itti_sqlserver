<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
function cekDesimal($angka){
	$bulat=round($angka);
	if($bulat>$angka){
		$jam=$bulat-1;
		$waktu=$jam.":30";
	}else{
		$jam=$bulat;
		$waktu=$jam.":00";
	}
	return $waktu;
}
if($_POST){ 
	extract($_POST);
	$id = mysqli_real_escape_string($con,$_POST['id']);
	$sqlupdate1=mysqli_query($con,"UPDATE `tbl_schedule_krah` SET 
				`status`='sedang jalan',
				`tgl_mulai`=now()
				WHERE `id`='$id' LIMIT 1");
				/*$sqlupdate1=mysqli_query("UPDATE tbl_montemp SET 
				tgl_target= ADDDATE(tgl_buat, INTERVAL '$target1' HOUR_MINUTE) 
				WHERE id_schedule='$id' LIMIT 1");*/
				echo " <script>window.location='ScheduleKrah';</script>";
				
		}
		

?>
