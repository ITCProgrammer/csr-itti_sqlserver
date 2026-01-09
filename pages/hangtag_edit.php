<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
	$id = $_POST['id'];
	$no_item = str_replace("'","''",$_POST['no_item']);
    $hangtag = str_replace("'","''",$_POST['hangtag']);
		$sqlupdate="UPDATE tbl_master_hangtag SET 
		no_item='$no_item',
        hangtag='$hangtag'
		WHERE id='$id'";
		$result = mysqli_query($con,$sqlupdate) or die (mysqli_error());
		if($result){
			echo " <script>window.location='MasterHangtag';</script>";
		}else{
			echo "Update Data Gagal";
		}
?>
