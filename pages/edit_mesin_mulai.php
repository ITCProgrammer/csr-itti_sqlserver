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
	$personil = mysqli_real_escape_string($con,$_POST['personil']);
	$Qrycek=mysqli_query($con,"SELECT * FROM tbl_schedule WHERE id='$id' LIMIT 1");
	$rCek=mysqli_fetch_array($Qrycek);
	$target1=$rCek['target'];
				$sqlupdate=mysqli_query($con,"INSERT `tbl_inspection` SET 
				`id_schedule`='$rCek[id]',
				`nodemand`='$rCek[nodemand]',
				`nokk`='$rCek[nokk]',
				`status`='sedang jalan',
				`tgl_target`=ADDDATE(now(), INTERVAL '$target1' HOUR_MINUTE),
				`personil`='$personil',
				`tgl_buat`=now(),
				`tgl_update`=now()");
	
	$sqlupdate1=mysqli_query($con,"UPDATE `tbl_schedule` SET 
				`status`='sedang jalan',
				`tgl_mulai`=now()
				WHERE `id`='$id' LIMIT 1");
				/*$sqlupdate1=mysqli_query("UPDATE tbl_montemp SET 
				tgl_target= ADDDATE(tgl_buat, INTERVAL '$target1' HOUR_MINUTE) 
				WHERE id_schedule='$id' LIMIT 1");*/
				echo " <script>window.location='Schedule';</script>";
				
		}
		

?>
