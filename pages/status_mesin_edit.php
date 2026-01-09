<?php
ini_set("error_reporting", 1);
include("../koneksi.php");
if($_POST){ 
	extract($_POST);
	//tangkap data array dari form
    $urut = $_POST['no_urut'];
	$personil = mysqli_real_escape_string($con,$_POST['personil']);
    //foreach
    foreach ($urut as $urut_key => $urut_value) {
    $query = "UPDATE `tbl_schedule` SET 
	`no_urut` =  '$urut_value',
	`personil`=  '$personil'
    WHERE `id` = '$urut_key' LIMIT 1 ;";
    $result = mysqli_query($con,$query);
    }
    if (!$result) {
        die ('cant update:' .mysqli_error());
    }else{
		echo " <script>window.location='Schedule';</script>";
	}
				
						
		}		

?>
