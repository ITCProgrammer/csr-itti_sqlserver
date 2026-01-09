<?php
if(isset($_POST)){
	$sql = "UPDATE tbl_ganti_kain SET ".$_POST['name']."='".$_POST['value']."' WHERE id=".$_POST['pk'];
	$mysqli->query($sql);
	echo 'Update Data Berhasil.';
}
?>