<?php
$idm=$_GET['idm'];
mysqli_query($con, "INSERT INTO mutasi_bs_krah_detail (`id_mutasi`,`tgl_update`) 
				VALUES ('$idm',now())");
echo "<script type=\"text/javascript\">
            alert(\"Data Berhasil Ditambah\");
            window.location = \"MutasiBSDetail-$idm\"
            </script>";
?>