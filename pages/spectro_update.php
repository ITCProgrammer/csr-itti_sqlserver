<?php
ini_set("error_reporting", 1);
include("../koneksi.php");
    $id = $_POST['id'];
    $file = $_FILES['spectro']['name'];
	// ambil data file
	$namaFile = $_FILES['spectro']['name'];
	$namaSementara = $_FILES['spectro']['tmp_name'];
	// tentukan lokasi file akan dipindahkan
	$dirUpload = "dist/pdf/";
	// pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
		$sqlupdate="UPDATE tbl_firstlot SET 
		spectro='$file'
		WHERE id='$id'";
		$result = mysqli_query($con,$sqlupdate) or die (mysqli_error());
		if($result){
			echo " <script>window.location='LihatFirstLot';</script>";
		}else{
			echo "Update Data Gagal";
		}
?>
