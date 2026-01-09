<?php
ini_set("error_reporting", 1);
include("../koneksi.php");
if ($_POST) {
    extract($_POST);
    $shift = mysqli_real_escape_string(strtoupper($con,$_POST['shift']));
	$nama = mysqli_real_escape_string(strtoupper($con,$_POST['nama']));
	$mesin = mysqli_real_escape_string(strtoupper($con,$_POST['no_mc']));
        $sqlupdate=mysqli_query($con,"INSERT INTO `tbl_posisi_operator` SET
				`shift`='$shift',				
				`nama`='$nama',
				`no_mesin`='$mesin',
				`tgl_update`=now()
				");
        echo " <script>window.location='PosisiOperator';</script>";
    }