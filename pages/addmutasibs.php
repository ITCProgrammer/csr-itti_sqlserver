<?php
function no_urut(){
include"koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$format = "/QCF/MBL/".date("m/Y");
$sql=mysqli_query($con,"SELECT no_mutasi FROM mutasi_bs_krah WHERE substr(no_mutasi,4,16) like '%".$format."' ORDER BY no_mutasi DESC LIMIT 1 ") or die (mysqli_error());
$d=mysqli_num_rows($sql);
if($d>0){
$r=mysqli_fetch_array($sql);
$d=$r['no_mutasi'];
$str=substr($d,0,3);
$Urut = (int)$str;
}else{
$Urut = 0;
}
$Urut = $Urut + 1;
$Nol="";
$nilai=3-strlen($Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}
$nipbr =$Nol.$Urut.$format;
return $nipbr;
}
$nou=no_urut();
mysqli_query($con, "INSERT INTO mutasi_bs_krah (`no_mutasi`,`dept`,`tgl_buat`,`jam_penyerahan`) 
				VALUES ('$nou','QCF',now(),now())");
echo "<script type=\"text/javascript\">
            alert(\"Data Berhasil Ditambah\");
            window.location = \"MutasiBS\"
            </script>";
?>