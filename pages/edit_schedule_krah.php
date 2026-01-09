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
	$urut = mysqli_real_escape_string($con,$_POST['no_urut']);
	$personil = mysqli_real_escape_string($con,$_POST['personil']);
	$target = mysqli_real_escape_string($con,$_POST['target']);
	$catatan = mysqli_real_escape_string($con,$_POST['catatan']);
	$status = mysqli_real_escape_string($con,$_POST['status']);
	$target_lipat = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')));
	$target_cabut = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 3, date('Y')));
	$target_sulam = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 6, date('Y')));
	if($_POST['proses']=='Lipat'){$target=$target_lipat;}else if($_POST['proses']=='Cabut'){$target=$target_cabut;}else if($_POST['proses']=='Sulam'){$target=$target_sulam;}else{$target='';}
	if($status!=""){ $sts=", `status`='$status' ";}else{ $sts="";}
	$kapasitas=$rCek['kapasitas'];
				$sqlupdate=mysqli_query($con,"UPDATE `tbl_schedule_krah` SET 
				`target`='$target',
				`no_urut`='$urut',
				`proses`='$_POST[proses]',
				`no_sch`='$urut',
				`catatan`='$catatan',
				`personil`='$personil'
				$sts
				WHERE `id`='$id' LIMIT 1");
				echo " <script>window.location='ScheduleKrah';</script>";
				
		}
		

?>
