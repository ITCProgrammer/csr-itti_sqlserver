<?php
ini_set("error_reporting", 1);
include("../koneksi.php");
if ($_POST) {
    extract($_POST);        
	   		$nama = mysqli_real_escape_string($con,strtoupper($_POST['nama']));
			$file = $_FILES['file']['name'];
		   // ambil data file
			$namaFile = $_FILES['file']['name'];
	        $namaSementara = $_FILES['file']['tmp_name'];

			// tentukan lokasi file akan dipindahkan
			$dirUpload = "dist/img/gambar/";

			// pindahkan file
			$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
		   if ($terupload) { 
			$sqlupdate=mysqli_query($con,"INSERT INTO `tbl_gambar` SET
				`gambar`='$file',				
				`desc`='$nama',
				`tgl_update`=now()
				");   
			echo " <script>window.location='GrafikQCF';</script>";   
		   } else {
    			echo "Upload Gagal!".$file;
		   }
		   
	   
        
    }