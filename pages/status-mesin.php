<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="refresh" content="180">
		<title>Status Mesin</title>
		<style>
			td {
				padding: 1px 0px;
			}
			p {
   				line-height: 4px;
				font-size: 10px;
			}
		</style>
		<style type="text/css">
			.teks-berjalan {
				background-color: #03165E;
				color: #F4F0F0;
				font-family: monospace;
				font-size: 24px;
				font-style: italic;
			}

		</style>
	</head>

	<body>
		
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Status Mesin QC Final ITTI</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<a href="pages/status-mesin-full.php" class="btn btn-xs" data-toggle="tooltip" data-html="true" data-placement="bottom" title="FullScreen"><i class="fa fa-expand"></i></a>
						</div>
					</div>
					<div class="box-body">
<?php
function NoMesin($mc)
{
	include"koneksi.php";
	$qMC=mysqli_query($con,"SELECT *,IF(DATEDIFF(now(),a.tgl_delivery) > 0,'Urgent',
IF(DATEDIFF(now(),a.tgl_delivery) > -4,'Potensi Delay','')) as `sts` FROM tbl_schedule a 
LEFT JOIN tbl_inspection b ON a.id=b.id_schedule
WHERE a.no_mesin='$mc' and (b.`status`='sedang jalan' or a.`status`='antri mesin') ORDER BY a.no_urut ASC");
	$dMC=mysqli_fetch_array($qMC);	
	$qLama=mysqli_query($con,"SELECT round(TIME_FORMAT(timediff(b.tgl_target,now()),'%H')) as lama FROM tbl_schedule a
LEFT JOIN tbl_inspection b ON a.id=b.id_schedule
WHERE a.no_mesin='$mc' AND b.status='sedang jalan' ORDER BY a.no_urut ASC");
	$dLama=mysqli_fetch_array($qLama);
	
		if($dMC['ket_status']=="Pisah Kain"){
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="btn-warning blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="btn-warning border-dashed";							
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="btn-warning blink_me";
			}else{ 
				$warnaMc="btn-warning";}
		}else if($dMC['ket_status']=="Cek Beda Rol + Obras Tailing"){
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="btn-primary blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="btn-primary border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="btn-primary blink_me";
			}else{ 
				$warnaMc="btn-primary";}			
		}else if($dMC['ket_status']=="Cek Gramasi Tiap Rol"){
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="bg-black blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="bg-black border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="bg-black blink_me";
			}else{ 
				$warnaMc="bg-black";}
		}else if($dMC['ket_status']=="Perbaikan Grade/Potong Buang"){
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="bg-abu blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="bg-abu border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="bg-abu blink_me";
			}else{ 
				$warnaMc="bg-abu";}
		}else if($dMC['ket_status']=="Tandain Defect"){
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="bg-navy blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="bg-navy border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="bg-navy blink_me";
			}else{ 
				$warnaMc="bg-navy";}
		}else if($dMC['ket_status']=="Cabut/Totol"){
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="bg-teal blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="bg-teal border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="bg-teal blink_me";
			}else{ 
				$warnaMc="bg-teal";}
		}else if($dMC['ket_status']=="Lukis"){
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="bg-maroon blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="bg-maroon border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="bg-maroon blink_me";
			}else{ 
				$warnaMc="bg-maroon";}
		}else if($dMC['ket_status']=="Lipat"){
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="bg-purple blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="bg-purple border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="bg-purple blink_me";
			}else{ 
				$warnaMc="bg-purple";}
		}else if($dMC['ket_status']=="Perbaikan grade"){	
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="btn-success blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="btn-success border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="btn-success blink_me";
			}else{ 
				$warnaMc="btn-success";}
		}else if($dMC['ket_status']=="Inspect Ulang"){
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="btn-danger blink_me1";	
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="btn-danger border-dashed";
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="btn-danger blink_me";
			}else{ 
				$warnaMc="btn-danger";}
		}else if($dMC['ket_status']=="Packing + Mutasi"){	
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="bg-kuning blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){

				$warnaMc="bg-kuning border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="bg-kuning blink_me";
			}else{ 
				$warnaMc="bg-kuning";}
		}else if($dMC['ket_status']=="First Lot"){	
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="bg-hijau blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="bg-hijau border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="bg-hijau blink_me";
			}else{ 
				$warnaMc="bg-hijau";}
		}else if($dMC['ket_status']=="Inspect Biasa"){
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="bg-fuchsia blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="bg-fuchsia border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="bg-fuchsia blink_me";
			}else{ 
				$warnaMc="bg-fuchsia";}
		}else if($dMC['ket_status']=="Packing BS"){
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="bg-lime blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="bg-lime border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="bg-lime blink_me";
			}else{ 
				$warnaMc="bg-lime";}
		}else if($dMC['ket_status']=="Cuci Mesin"){	
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="bg-violet blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="bg-violet border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="bg-violet blink_me";
			}else{ 
				$warnaMc="bg-violet";}	
		}else if($dMC['ket_status']=="Greige Delay"){	
			if($dLama['lama']<"1" and $dLama['lama']!=""){ 
				$warnaMc="btn-default blink_me1";
			}else if($dMC['sts']=="Potensi Delay"){
				$warnaMc="btn-default border-dashed";				
			}else if($dMC['sts']=="Urgent"){ 
				$warnaMc="btn-default blink_me";
			}else{ 
				$warnaMc="btn-default";}	
		}else{
		/*Tidak Ada PO*/ 
		$warnaMc="";
		}

    return $warnaMc;
}
function Rajut($mc)
{
	include"koneksi.php";
	$qMC=mysqli_query($con,"SELECT a.langganan,a.no_order,a.warna,a.proses FROM tbl_schedule a 
	LEFT JOIN tbl_inspection b ON a.id=b.id_schedule
	WHERE a.no_mesin='$mc' and b.`status`='sedang jalan' and a.`status`='sedang jalan'  ORDER BY a.no_urut ASC LIMIT 1");
	$dMC=mysqli_fetch_array($qMC);
    echo "<font size=+2><u>".$mc."</u></font> <br>".$dMC['no_order']."<br> ".$dMC['langganan']."<br>".$dMC['warna']."<br>".$dMC['proses'];	
}
		function Waktu($mc){
			include"koneksi.php";
			$qLama=mysqli_query($con,"SELECT TIME_FORMAT(timediff(b.tgl_target,now()),'%H:%i') as lama FROM tbl_schedule a
LEFT JOIN tbl_inspection b ON a.id=b.id_schedule
WHERE a.no_mesin='$mc' AND a.status='sedang jalan' AND (ISNULL(b.tgl_stop) or NOT ISNULL(b.tgl_mulai)) ORDER BY a.no_urut ASC");
			$dLama=mysqli_fetch_array($qLama);
			if($dLama['lama']!=""){echo $dLama['lama'];}else{echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";}
		}

/* Total Status Mesin */
    $sqlStatus=mysqli_query($con,"SELECT no_mesin FROM tbl_mesin");
    while ($rM=mysqli_fetch_array($sqlStatus)) {
        $sts=NoMesin($rM['no_mesin']);
        if ($sts=="btn-primary" or
           $sts=="btn-primary border-dashed" or
		   $sts=="btn-primary blink_me1" or	
           $sts=="btn-primary blink_me") {
            $CBR="1";
        } else {
            $CBR="0";
        }
		if ($sts=="bg-purple" or
           $sts=="bg-purple border-dashed" or
		   $sts=="bg-purple blink_me1" or	
           $sts=="bg-purple blink_me") {
            $SPT="1";
        } else {
            $SPT="0";
        }
        if ($sts=="btn-warning" or
           $sts=="btn-warning border-dashed" or
		   $sts=="btn-warning blink_me1" or	
           $sts=="btn-warning blink_me") {
            $PKn="1";
        } else {
            $PKn="0";
        }
        if ($sts=="btn-danger" or
           $sts=="btn-danger border-dashed" or
		   $sts=="btn-danger blink_me1" or	
           $sts=="btn-danger blink_me") {
            $PBK="1";
        } else {
            $PBK="0";
        }
        if ($sts=="btn-success" or
           $sts=="btn-success border-dashed" or
		   $sts=="btn-success blink_me1" or	
           $sts=="btn-success blink_me") {
            $GRG="1";
        } else {
            $GRG="0";
        }
        if ($sts=="btn-default" or
		   $sts=="btn-default border-dashed" or
		   $sts=="btn-default blink_me1" or	
           $sts=="btn-default blink_me") {
            $GD="1";
        } else {
            $GD="0";
        }
        if ($sts=="bg-kuning" or
           $sts=="bg-kuning border-dashed" or
		   $sts=="bg-kuning blink_me1" or	
           $sts=="bg-kuning blink_me") {
            $GPS="1";
        } else {
            $GPS="0";
        }
		if ($sts=="bg-hijau" or
           $sts=="bg-hijau border-dashed" or
		   $sts=="bg-hijau blink_me1" or	
           $sts=="bg-hijau blink_me") {
            $CYD="1";
        } else {
            $CYD="0";
        }
        if ($sts=="bg-black" or
           $sts=="bg-black border-dashed" or
		   $sts=="bg-black blink_me1" or	
           $sts=="bg-black blink_me") {
            $CGR="1";
        } else {
            $CGR="0";
        }
        if ($sts=="bg-abu" or
           $sts=="bg-abu border-dashed" or
		   $sts=="bg-abu blink_me1" or	
           $sts=="bg-abu blink_me") {
            $PGe="1";
        } else {
            $PGe="0";
        }
		if ($sts=="bg-teal" or
           $sts=="bg-teal border-dashed" or
		   $sts=="bg-teal blink_me1" or	
           $sts=="bg-teal blink_me") {
            $Cbt="1";
        } else {
            $Cbt="0";
        }
		if ($sts=="bg-fuchsia" or
           $sts=="bg-fuchsia border-dashed" or
		   $sts=="bg-fuchsia blink_me1" or	
           $sts=="bg-fuchsia blink_me") {
            $DTS="1";
        } else {
            $DTS="0";
        }
		if ($sts=="bg-lime" or
           $sts=="bg-lime border-dashed" or
		   $sts=="bg-lime blink_me1" or	
           $sts=="bg-lime blink_me") {
            $SMS="1";
        } else {
            $SMS="0";
        }
		if ($sts=="bg-violet" or
           $sts=="bg-violet border-dashed" or
		   $sts=="bg-violet blink_me1" or	
           $sts=="bg-violet blink_me") {
            $CMS="1";
        } else {
            $CMS="0";
        }
		if ($sts=="bg-navy" or
           $sts=="bg-navy border-dashed" or
		   $sts=="bg-navy blink_me1" or	
           $sts=="bg-navy blink_me") {
            $TDf="1";
        } else {
            $TDf="0";
        }
		if ($sts=="bg-maroon" or
           $sts=="bg-maroon border-dashed" or
		   $sts=="bg-maroon blink_me1" or	
           $sts=="bg-maroon blink_me") {
            $Lks="1";
        } else {
            $Lks="0";
        }
        if ($sts=="bg-abu border-dashed" or
           $sts=="bg-black border-dashed" or
           $sts=="bg-kuning border-dashed" or
		   $sts=="bg-hijau border-dashed" or	
           $sts=="btn-success border-dashed" or
           $sts=="btn-danger border-dashed" or
           $sts=="btn-warning border-dashed" or
           $sts=="btn-primary border-dashed" or
		   $sts=="bg-teal border-dashed" or
		   $sts=="bg-purple border-dashed" or	
		   $sts=="bg-fuchsia border-dashed" or
		   $sts=="bg-lime border-dashed" or	
		   $sts=="bg-violet border-dashed") {
            $PTD="1";
        } else {
            $PTD="0";
        }
        if ($sts=="bg-abu blink_me" or
           $sts=="bg-black blink_me" or
		   $sts=="bg-kuning blink_me" or
		   $sts=="bg-hijau blink_me" or	
           $sts=="btn-success blink_me" or
           $sts=="btn-danger blink_me" or
           $sts=="btn-warning blink_me" or
           $sts=="btn-primary blink_me" or
		   $sts=="bg-teal blink_me" or
		   $sts=="bg-fuchsia blink_me" or
		   $sts=="bg-lime blink_me" or	
		   $sts=="bg-purple blink_me" or
		   $sts=="bg-violet blink_me") {
            $URG="1";
        } else {
            $URG="0";
        }
		
        $totPKn=$totPKn+$PKn;
		$totCBR=$totCBR+$CBR;
		$totCGR=$totCGR+$CGR;
		$totPGe=$totPGe+$PGe;
		$totCbt=$totCbt+$Cbt;		
		$totTDf=$totTDf+$TDf;
		$totLks=$totLks+$Lks;
		
    }
    //$totMesin=$totTS+$totTPB+$totTBW+$totAM+$totTBS+$totTQ+$totPM+$totSJ+$totTAP;
						
?>


						<table width="100%" border="0">
							<tbody>
								<tr>
								  <td colspan="35" align="center" ></td>
							  </tr>
								<tr>
								  <td align="center" bgcolor="#E0DDDD"></td>
								  <td colspan="2" align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td colspan="2" align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
							  </tr>
								<tr>
								  <td align="center" bgcolor="#E0DDDD"></td>
								  <td colspan="2" align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td colspan="2" align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
							  </tr>
								<tr>
								  <td width="2%" align="center" bgcolor="#E0DDDD"></td>
									<td colspan="2" align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("Inspect Meja"); ?>" id="Inspect Meja" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("Inspect Meja"); ?>">Inspect Meja<p><?php echo Waktu("Inspect Meja"); ?></p></span></td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td colspan="2" align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("Kragh"); ?>" id="Kragh" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("Kragh"); ?>">Kragh<p><?php echo Waktu("Kragh"); ?></p></span></td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="2%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="2%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="1%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="1%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="2%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="2%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="2%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="2%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="2%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="2%" align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("Flat Pack"); ?>" id="Flat Pack" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("Flat Pack"); ?>">Flat Pack
									  <p><?php echo Waktu("Flat Pack"); ?></p>
									  </span></td>
									<td width="3%" align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("Roll 1"); ?>" id="Roll 1" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("Roll 1"); ?>">Roll 1
									  <p><?php echo Waktu("Roll 1"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
							  </tr>
								<tr>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="2%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="2%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td width="2%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td width="2%" align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("Roll 2"); ?>" id="Roll 2" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("Roll 2"); ?>">Roll 2
									  <p><?php echo Waktu("Roll 2"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
							  </tr>
								<tr>
								  <td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("01"); ?>" id="01" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("01"); ?>">01<p><?php echo Waktu("01"); ?></p></span></td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("17"); ?>" id="17" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("17"); ?>">17<p><?php echo Waktu("17"); ?></p></span></td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("16"); ?>" id="16" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("16"); ?>">16<p><?php echo Waktu("16"); ?></p></span></td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("18"); ?>" id="18" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("18"); ?>">18
									  <p><?php echo Waktu("18"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("02"); ?>" id="02" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("02"); ?>">02
									  <p><?php echo Waktu("02"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("03"); ?>" id="03" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("03"); ?>">03
									  <p><?php echo Waktu("03"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("04"); ?>" id="04" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("04"); ?>">04
									    <p><?php echo Waktu("04"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("05"); ?>" id="05" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("05"); ?>">05
									  <p><?php echo Waktu("05"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("06"); ?>" id="06" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("06"); ?>">06
									  <p><?php echo Waktu("06"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("07"); ?>" id="07" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("07"); ?>">07
									  <p><?php echo Waktu("07"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("08"); ?>" id="08" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("08"); ?>">08
									  <p><?php echo Waktu("08"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("Roll 3"); ?>" id="Roll 3" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("Roll 3"); ?>">Roll 3
									  <p><?php echo Waktu("Roll 3"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("Roll 4"); ?>" id="Roll 4" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("Roll 4"); ?>">Roll 4
									  <p><?php echo Waktu("Roll 4"); ?></p>
									  </span></td>
							  </tr>
								<tr>
								  <td bgcolor="#E0DDDD">&nbsp;</td>
									<td bgcolor="#E0DDDD">&nbsp;</td>
									<td bgcolor="#E0DDDD">&nbsp;</td>
									<td bgcolor="#ECE7E7">&nbsp;</td>
									<td bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("09"); ?>" id="09" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("09"); ?>">09
									  <p><?php echo Waktu("09"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("10"); ?>" id="10" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("10"); ?>">10
									    <p><?php echo Waktu("10"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("11"); ?>" id="11" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("11"); ?>">11
									  <p><?php echo Waktu("11"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("12"); ?>" id="12" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("12"); ?>">12
									  <p><?php echo Waktu("12"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("12A"); ?>" id="12A" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("12A"); ?>">12A
									  <p><?php echo Waktu("12A"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("14"); ?>" id="14" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("14"); ?>">14
									  <p><?php echo Waktu("14"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#E0DDDD"><span class="detail_status btn btn-sm <?php echo NoMesin("15"); ?>" id="15" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("15"); ?>">15
									  <p><?php echo Waktu("15"); ?></p>
									  </span></td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#ECE7E7">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
									<td align="center" bgcolor="#E0DDDD">&nbsp;</td>
							  </tr>
								<tr>
								  <td bgcolor="#E0DDDD">&nbsp;</td>
								  <td bgcolor="#E0DDDD">&nbsp;</td>
								  <td bgcolor="#E0DDDD">&nbsp;</td>
								  <td bgcolor="#ECE7E7">&nbsp;</td>
								  <td bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#ECE7E7">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
								  <td align="center" bgcolor="#E0DDDD">&nbsp;</td>
							  </tr>
								<tr>
								  <td colspan="3">Pisah Kain <span class="label label-warning">&nbsp;<?php echo $totPKn;?></span></td>
								  <td>&nbsp;</td>
								  <td colspan="5" rowspan="2" valign="top">Cek Beda Rol + <br>
								    Obras Tailing<span class="label label-primary">&nbsp;<?php echo $totCBR;?></span></td>
								  <td align="center">&nbsp;</td>
								  <td colspan="5">Cek Gramasi Tiap Rol <span class="label bg-black">&nbsp;<?php echo $totCGR;?></span></td>
								  <td>&nbsp;</td>
								  <td colspan="7" align="center">Perbaikan Grade/Potong Buang <span class="label bg-abu">&nbsp;<?php echo $totCGR;?></span></td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td colspan="4">Tandain Defect <span class="label bg-navy">&nbsp;<?php echo $totTDf;?></span></td>
								  <td>&nbsp;</td>
								  <td colspan="2">Cabut/Totol <span class="label bg-teal">&nbsp;<?php echo $totCbt;?></span></td>
								  <td>&nbsp;</td>
								  <td colspan="2">Lukis <span class="label bg-maroon">&nbsp;<?php echo $totLks;?></span></td>
							  </tr>
								<tr>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
							  </tr>
								<tr>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
							  </tr>
								<tr>
									<td colspan="35" style="padding: 5px;">
										<marquee class="teks-berjalan" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
											<?php
$news=mysqli_query($con,"SELECT GROUP_CONCAT(news_line SEPARATOR ' :: ') as news_line FROM tbl_news_line WHERE gedung='LT 1' AND status='Tampil'");
$rNews=mysqli_fetch_array($news);
$totMesin='0';
?>
											<?php echo $rNews['news_line'];?>
										</marquee>
									</td>
								</tr>								
								
								<!--
    <tr>
      <td colspan="26" style="padding: 5px;">&nbsp;</td>
    </tr> -->
							</tbody>
						</table>

				  </div>

				</div>

			</div>
		</div>
		<div class="row">
	
		</div>	
<div id="CekDetailStatus" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

	</body>
	<!-- Tooltips -->
	<script src="dist/js/tooltips.js"></script>
	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});

	</script>

</html>
