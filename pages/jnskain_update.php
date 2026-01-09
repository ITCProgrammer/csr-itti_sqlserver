<?php
include("../koneksi.php");
	$id = $_POST['id'];
	$jns_kain = strtoupper($_POST['jns_kain']);
		$sqlupdate="UPDATE tbl_tq_nokk SET 
		id='$id',
		jenis_kain='$jns_kain'
		WHERE id='$id'";
		$result = mysqli_query($con,$sqlupdate) or die (mysqli_error());
		if($result){
			echo " <script>window.location='FinalStatusTQNew';</script>";
		}else{
			echo "Update Data Gagal";
		}
?>
