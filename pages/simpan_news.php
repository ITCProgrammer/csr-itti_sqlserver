<?php
ini_set("error_reporting", 1);
include("../koneksi.php");
if ($_POST) {
    extract($_POST);
    $pesan = mysqli_real_escape_string(strtoupper($con,$_POST['line_news']));
        $sqlupdate=mysqli_query($con,"INSERT INTO `tbl_news_line` SET
				`gedung`='LT 1',				
				`news_line`='$pesan',
				`tgl_update`=now()
				");
        echo " <script>window.location='LineNews';</script>";
    }