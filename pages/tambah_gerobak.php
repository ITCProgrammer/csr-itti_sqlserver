<?php
ini_set("error_reporting", 1);
include("../koneksi.php");
if($_POST){ 
	extract($_POST);
	$id = mysqli_real_escape_string($con,$_POST['id']);
	$id_schedule = mysqli_real_escape_string($con,$_POST['id_schedule']);
	$no_order = mysqli_real_escape_string($con,$_POST['no_order']);
	$jeniskain = mysqli_real_escape_string($con,$_POST['jenis_kain']);
	$catatan = mysqli_real_escape_string($con,$_POST['catatan']);
	$warna = mysqli_real_escape_string($con,$_POST['warna']);
	$lot = mysqli_real_escape_string($con,$_POST['lot']);
	$sts = mysqli_real_escape_string($con,$_POST['sts_pro']);
	$kd_sts = mysqli_real_escape_string($con,$_POST['kd_sts']);
	$gerobak1 = mysqli_real_escape_string($con,$_POST['gerobak1']);
	$gerobak2 = mysqli_real_escape_string($con,$_POST['gerobak2']);
	$gerobak3 = mysqli_real_escape_string($con,$_POST['gerobak3']);
	$gerobak4 = mysqli_real_escape_string($con,$_POST['gerobak4']);
	$gerobak5 = mysqli_real_escape_string($con,$_POST['gerobak5']);
	$gerobak6 = mysqli_real_escape_string($con,$_POST['gerobak6']);
	if($gerobak6!=""){ $tgl=" ,`no_gerobak1`='$gerobak1',`no_gerobak2`='$gerobak2',`no_gerobak3`='$gerobak3',`no_gerobak4`='$gerobak4',`no_gerobak5`='$gerobak5',`no_gerobak6`='$gerobak6',tgl_out6=now() ";}else
	if($gerobak5!=""){ $tgl=" ,`no_gerobak1`='$gerobak1',`no_gerobak2`='$gerobak2',`no_gerobak3`='$gerobak3',`no_gerobak4`='$gerobak4',`no_gerobak5`='$gerobak5',tgl_out5=now() ";}else
	if($gerobak4!=""){ $tgl=" ,`no_gerobak1`='$gerobak1',`no_gerobak2`='$gerobak2',`no_gerobak3`='$gerobak3',`no_gerobak4`='$gerobak4',tgl_out4=now() ";}else
	if($gerobak3!=""){ $tgl=" ,`no_gerobak1`='$gerobak1',`no_gerobak2`='$gerobak2',`no_gerobak3`='$gerobak3',tgl_out3=now() ";}else
	if($gerobak2!=""){ $tgl=" ,`no_gerobak1`='$gerobak1',`no_gerobak2`='$gerobak2',tgl_out2=now() ";}else
	if($gerobak1!=""){ $tgl=" ,`no_gerobak1`='$gerobak1',tgl_out1=now() ";}	
	if($id_schedule==""){
		$sqlupdate=mysqli_query($con,"INSERT INTO `tbl_gerobak` SET
				`id_schedule`='$id',
				`no_order`='$no_order',
				`jenis_kain`='$jeniskain',
				`warna`='$warna',
				`lot`='$lot',
				`kd_status`='$kd_sts',
				`catatan`='$catatan',
				`status_produk`='$sts'
				$tgl
				");
				
	}else{
		$sqlupdate=mysqli_query($con,"UPDATE `tbl_gerobak` SET		
				`catatan`='$catatan',
				`status_produk`='$sts'
				$tgl
				WHERE id='$id_schedule'
				");		
		
	}
				echo " <script>window.location='Schedule';</script>";
				
		}
		

?>
