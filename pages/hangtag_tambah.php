<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $no_item = str_replace("'","''",$_POST['no_item']);
    $hangtag = str_replace("'","''",$_POST['hangtag']);
		$sqlinsert="INSERT INTO tbl_master_hangtag SET 
		no_item='$no_item',
        hangtag='$hangtag',
        tgl_buat=now()";
		$result = mysqli_query($con,$sqlinsert) or die (mysqli_error());
		if($result){
			echo " <script>window.location='MasterHangtag';</script>";
		}else{
			echo "Insert Data Gagal";
		}
?>
