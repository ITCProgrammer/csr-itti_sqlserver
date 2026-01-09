<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
if($_POST){ 
	extract($_POST);
	$id = mysqli_real_escape_string($con,$_POST['id']);
	$catatan = mysqli_real_escape_string($con,$_POST['catatan']);
	$lfin = mysqli_real_escape_string($con,$_POST['lembap_fin']);
	$lqcf = mysqli_real_escape_string($con,$_POST['lembap_qcf']);
	$qty = mysqli_real_escape_string($con,$_POST['qty']);
	$qtyloss = mysqli_real_escape_string($con,$_POST['qty_loss']);
	$noteloss = mysqli_real_escape_string($con,$_POST['note_loss']);
	$yard = mysqli_real_escape_string($con,$_POST['yard']);
	$jml = mysqli_real_escape_string($con,$_POST['jml_rol']);
	$shift = mysqli_real_escape_string($con,$_POST['shift']);
	$gshift = mysqli_real_escape_string($con,$_POST['g_shift']);
	$istirahat = mysqli_real_escape_string($con,$_POST['istirahat']);
	$shading = mysqli_real_escape_string($con,$_POST['shading']);
	$demand_lgcy = mysqli_real_escape_string($con,$_POST['demand_lgcy']);
	$t_jawab = mysqli_real_escape_string($con,$_POST['t_jawab']);
	$t_jawab_buyer = mysqli_real_escape_string($con,$_POST['t_jawab_buyer']);
	$operator = mysqli_real_escape_string($con,$_POST['operator']);
	
	$Qrycek=mysqli_query($con,"SELECT * FROM tbl_schedule WHERE id='$id' LIMIT 1");
	$rCek=mysqli_fetch_array($Qrycek);
				$sqlupdate=mysqli_query($con,"UPDATE `tbl_inspection` SET 
				`catatan`='$catatan',
				`qty`='$qty',
				`yard`='$yard',
				`jml_rol`='$jml',
				`status`='selesai'
				WHERE `id_schedule`='$id' LIMIT 1");
	if($sqlupdate){
				$sqlupdate1=mysqli_query($con,"UPDATE `tbl_schedule` SET 
				`status`='selesai',
				`tgl_stop`=now(),
				`lembap_fin`='$lfin',
				`lembap_qcf`='$lqcf',
				`istirahat`='$istirahat',
				`shading`='$shading',
				`shift`='$shift',
				`demand_lgcy`='$demand_lgcy',
				`t_jawab`='$t_jawab',
				`t_jawab_buyer`='$t_jawab_buyer',
				`g_shift`='$gshift',
				`qty_loss`='$qtyloss',
				`note_loss`='$noteloss',
				`operator`='$operator'
				WHERE `id`='$id' LIMIT 1");
				$sqlUrut=mysqli_query($con,"UPDATE tbl_schedule 
		  		SET no_urut = no_urut - 1 
				WHERE no_mesin = '$rCek[no_mesin]' 
		  		AND `status` = 'antri mesin' AND not no_urut='1' ");	
				/*$sqlupdate1=mysqli_query("UPDATE tbl_montemp SET 
				tgl_target= ADDDATE(tgl_buat, INTERVAL '$target1' HOUR_MINUTE) 
				WHERE id_schedule='$id' LIMIT 1");*/
				echo " <script>window.location='Schedule';</script>";
			}			
		}
		

?>
