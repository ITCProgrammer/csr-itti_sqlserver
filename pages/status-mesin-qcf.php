<?php
ini_set("error_reporting", 1);
session_start();
//include("../koneksi.php");
$con=mysqli_connect("10.0.0.10","dit","4dm1n","db_qc");
$sqlTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d')- INTERVAL 1 DAY as `start_date`, DATE_FORMAT(now(),'%Y-%m-%d') as `end_date`");
$rTgl=mysqli_fetch_array($sqlTgl);
$start_date=$rTgl['start_date']." 07:00";
$end_date=$rTgl['end_date']." 07:00";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="refresh" content="180">
		<title>Status Mesin</title>
		<!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">  
  <!-- toast CSS -->
  <link href="../bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link href="../bower_components/datatables.net-bs/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <!-- Sweet Alert -->
  <link href="../bower_components/sweetalert/sweetalert2.css" rel="stylesheet" type="text/css">
  <!-- Sweet Alert -->
  <script type="text/javascript" src="../bower_components/sweetalert/sweetalert2.min.js"></script>
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">	   
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">	
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css"> 	
  <!--  AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
	body{
		font-family: Calibri, "sans-serif", "Courier New";  /* "Calibri Light","serif" */
		font-style: normal;
	}	
  </style>
  <!-- Google Font -->
  <!--
  <link rel="stylesheet"
        href="dist/css/font/font.css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  -->
  <link rel="icon" type="image/png" href="../dist/img/index.ico">
<style>
.blink_me {
  animation: blinker 1s linear infinite;
}
.blink_me1 {
  animation: blinker 5s linear infinite;
}
.bulat{
  border-radius: 50%;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.border-dashed{
		border: 3px dashed #083255;
	}
@keyframes blinker {
  50% { opacity: 0; }
}
	body{
		font-family: Calibri, "sans-serif", "Courier New";  /* "Calibri Light","serif" */
		font-style: normal;
	}
</style>
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
			.tbl-berjalan {
				background-color: ;
				color: #F4F0F0;
				font-family: monospace;
				font-size: 14px;
				font-style: italic;
			}
		</style>
	</head>

	<body>
  <div class="row">
		<div class="col-xs-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Schedule Inspection QCF</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="10000">                
            <div class="carousel-inner">
              <?php 
                $qryGmbr=mysqli_query($con,"SELECT
                ceil(count(*)/4) as jumlah
                FROM
                tbl_schedule 
                WHERE
                NOT STATUS = 'selesai' ");
                $rG=mysqli_fetch_array($qryGmbr);
                $pages=$rG['jumlah'];
                for ($i=1; $i<=$pages ; $i++){
              ?>	
                <div class="item <?php if($i=="1"){echo "active";} ?>">
                    <!-- awal table --> 
                    <?php
                          $j=$i-1;
                          $bts=$j*4;
                          $data=mysqli_query($con,"SELECT
                            id,
                          no_mesin,
                          no_urut,
                          buyer,
                          langganan,
                          no_order,
                          nokk,
                          jenis_kain,
                          warna,
                          no_warna,
                          lot,
                          sum(rol) as rol,
                          sum(bruto) as bruto,
                          proses,
                          catatan,
                          ket_status,
                          tgl_delivery
                        FROM
                          tbl_schedule 
                        WHERE
                          NOT STATUS = 'selesai' 
                        GROUP BY
                          no_mesin,
                          no_urut 
                        ORDER BY
                          no_mesin ASC,no_urut ASC LIMIT $bts,4");
                    ?>
                    <div class="box-body table-responsive">
                      <table id="tblr21" class="table table-bordered table-hover table-striped" width="100%">
                        <thead class="bg-blue">
                          <tr>
                            <th width="45"><div align="center">Mesin</div></th>
                            <th width="24"><div align="center">No.</div></th>
                            <th width="162"><div align="center">Pelanggan</div></th>
                            <th width="118"><div align="center">No. Order</div></th>
                            <th width="182"><div align="center">Jenis Kain</div></th>
                            <th width="82"><div align="center">Warna</div></th>
                            <th width="93"><div align="center">No Warna</div></th>
                            <th width="34"><div align="center">Lot</div></th>
                            <th width="109"><div align="center">Keterangan</div></th>
                            <th width="62"><div align="center">Rol</div></th>
                            <th width="68"><div align="center">Kg</div></th>
                            <th width="71"><div align="center">Proses</div></th>
                            <th width="86"><div align="center">Delivery</div></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $col=0;
                          while($rowd=mysqli_fetch_array($data)){
                              $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
                              $qCek=mysqli_query($con,"SELECT `status` FROM tbl_inspection WHERE id_schedule='$rowd[id]' LIMIT 1");
                              $rCEk=mysqli_fetch_array($qCek);
                            ?>
                          <tr bgcolor="<?php echo $bgcolor; ?>">
                            <td align="center"><font size=""><a href="#" id='<?php echo $rowd['no_mesin'];?>' class="edit_status_mesin <?php if($_SESSION['lvl_id10']=="3"){echo "disabled"; } ?>"><?php echo $rowd['no_mesin'];?></a></font></td>
                            <td align="center"><font size=""><?php echo $rowd['no_urut'];?></font><br><?php if($rCEk['status']=="sedang jalan"){ echo "<span class='label label-success'>sedang jalan</span>";}else{ echo "<span class='label label-warning'>antrian</span>";} ?>
                            </td></td>
                            <td><font size="-1"><?php echo $rowd['langganan']."/".$rowd['buyer'];?></font></td>
                            <td align="center"><font size=""><?php echo $rowd['no_order'];?></font></td>
                            <td><font size="-1"><?php echo $rowd['jenis_kain'];?></font></td>
                            <td align="center"><font size=""><?php echo $rowd['warna'];?></font></td>
                            <td align="center"><font size=""><?php echo $rowd['no_warna'];?></font></td>
                            <td align="center"><font size=""><a href="#"><?php echo $rowd['lot'];?></a></font></td>
                            <td><font size=""><?php echo $rowd['ket_status'];?><br />
                              <i><?php echo $rowd['nokk'];?></i><br />
                              <i style="color:red;"><strong><?php echo $rowd['catatan'];?></strong></i><br />
                              <a href="#" id='<?php echo $rowd['id']; ?>' class="detail_kartu"><span class="label label-danger"><?php echo $rowd['ket_kartu'];?></span></a></font></td>
                            <td align="center"><font size=""><?php echo $rowd['rol'].$rowd['kk'];?></font></td>
                            <td align="center"><font size=""><?php echo $rowd['bruto'];?></font></td>
                            <td><font size=""><?php echo $rowd['proses'];?></font></td>
                            <td align="center"><font size=""><?php echo $rowd['tgl_delivery'];?></font></td>
                          </tr>
                          <?php
                          $no++;  } ?>
                        </tbody>	
                      </table>
                    </div>
                    <!-- akhir table -->
                  <div class="carousel-caption">
                      <?php $hal=$i; echo "Halaman ".$hal."/".($rG['jumlah']); ?>
                  </div>
                </div>
		          <?php } ?>	
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
              <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
              <span class="fa fa-angle-right"></span>
            </a>
          </div>
        </div>
            <!-- /.box-body -->
      </div>
    </div>
	</div>		
	<div class="row">
		<div class="col-xs-5 ">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Status Mesin QC Final ITTI</h3>						
				</div>
				<div class="box-body">
          <?php
            function NoMesin($mc)
            {
              $con=mysqli_connect("10.0.0.10","dit","4dm1n","db_qc");
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
                  $warnaMc="bg-kuning blink_me1";
                }else if($dMC['sts']=="Potensi Delay"){
                  $warnaMc="bg-kuning border-dashed";							
                }else if($dMC['sts']=="Urgent"){ 
                  $warnaMc="bg-kuning blink_me";
                }else{ 
                  $warnaMc="bg-kuning";}
                }else if($dMC['ket_status']=="Cek Beda Rol + Obras Tailing"){
                if($dLama['lama']<"1" and $dLama['lama']!=""){ 
                  $warnaMc="bg-abu blink_me1";
                }else if($dMC['sts']=="Potensi Delay"){
                  $warnaMc="bg-abu border-dashed";				
                }else if($dMC['sts']=="Urgent"){ 
                  $warnaMc="bg-abu blink_me";
                }else{ 
                  $warnaMc="bg-abu";}			
                }else if($dMC['ket_status']=="Cek Gramasi Tiap Rol"){
                if($dLama['lama']<"1" and $dLama['lama']!=""){ 
                        $warnaMc="bg-navy blink_me1";
                      }else if($dMC['sts']=="Potensi Delay"){
                        $warnaMc="bg-navy border-dashed";				
                      }else if($dMC['sts']=="Urgent"){ 
                        $warnaMc="bg-navy blink_me";
                      }else{ 
                        $warnaMc="bg-navy";}
                    }else if($dMC['ket_status']=="Perbaikan Grade/Potong Buang" or $dMC['ket_status']=="Perbaikan grade"){
                      if($dLama['lama']<"1" and $dLama['lama']!=""){ 
                        $warnaMc="btn-danger blink_me1";
                      }else if($dMC['sts']=="Potensi Delay"){
                        $warnaMc="btn-danger border-dashed";				
                      }else if($dMC['sts']=="Urgent"){ 
                        $warnaMc="btn-danger blink_me";
                      }else{ 
                        $warnaMc="btn-danger";}
                    }else if($dMC['ket_status']=="Tandain Defect"){
                      if($dLama['lama']<"1" and $dLama['lama']!=""){ 
                        $warnaMc="bg-lime blink_me1";
                      }else if($dMC['sts']=="Potensi Delay"){
                        $warnaMc="bg-lime border-dashed";				
                      }else if($dMC['sts']=="Urgent"){ 
                        $warnaMc="bg-lime blink_me";
                      }else{ 
                        $warnaMc="bg-lime";}
                    }else if($dMC['ket_status']=="Cabut/Totol"){
                      if($dLama['lama']<"1" and $dLama['lama']!=""){ 
                        $warnaMc="bg-purple blink_me1";
                      }else if($dMC['sts']=="Potensi Delay"){
                        $warnaMc="bg-purple border-dashed";				
                      }else if($dMC['sts']=="Urgent"){ 
                        $warnaMc="bg-purple blink_me";
                      }else{ 
                        $warnaMc="bg-purple";}
                    }else if($dMC['ket_status']=="Lukis"){
                      if($dLama['lama']<"1" and $dLama['lama']!=""){ 
                        $warnaMc="btn-info blink_me1";
                      }else if($dMC['sts']=="Potensi Delay"){
                        $warnaMc="btn-info border-dashed";				
                      }else if($dMC['sts']=="Urgent"){ 
                        $warnaMc="btn-info blink_me";
                      }else{ 
                        $warnaMc="btn-info";}
                    }else if($dMC['ket_status']=="Lipat"){
                      if($dLama['lama']<"1" and $dLama['lama']!=""){ 
                        $warnaMc="bg-fuchsia blink_me1";
                      }else if($dMC['sts']=="Potensi Delay"){
                        $warnaMc="bg-fuchsia border-dashed";				
                      }else if($dMC['sts']=="Urgent"){ 
                        $warnaMc="bg-fuchsia blink_me";
                      }else{ 
                        $warnaMc="bg-fuchsia";}
                    }else if($dMC['ket_status']=="Ukur Repeat Printing"){	
                      if($dLama['lama']<"1" and $dLama['lama']!=""){ 
                        $warnaMc="btn-primary blink_me1";
                      }else if($dMC['sts']=="Potensi Delay"){
                        $warnaMc="btn-primary border-dashed";				
                      }else if($dMC['sts']=="Urgent"){ 
                        $warnaMc="btn-primary blink_me";
                      }else{ 
                        $warnaMc="btn-primary";}
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
                        $warnaMc="bg-olive blink_me1";
                      }else if($dMC['sts']=="Potensi Delay"){

                        $warnaMc="bg-olive border-dashed";				
                      }else if($dMC['sts']=="Urgent"){ 
                        $warnaMc="bg-olive blink_me";
                      }else{ 
                        $warnaMc="bg-olive";}
                    }else if($dMC['ket_status']=="Cek Bowing"){	
                      if($dLama['lama']<"1" and $dLama['lama']!=""){ 
                        $warnaMc="bg-maroon blink_me1";
                      }else if($dMC['sts']=="Potensi Delay"){
                        $warnaMc="bg-maroon border-dashed";				
                      }else if($dMC['sts']=="Urgent"){ 
                        $warnaMc="bg-maroon blink_me";
                      }else{ 
                        $warnaMc="bg-maroon";}
                    }else if($dMC['ket_status']=="Inspect Biasa"){
                      if($dLama['lama']<"1" and $dLama['lama']!=""){ 
                        $warnaMc="btn-success blink_me1";
                      }else if($dMC['sts']=="Potensi Delay"){
                        $warnaMc="btn-success border-dashed";				
                      }else if($dMC['sts']=="Urgent"){ 
                        $warnaMc="btn-success blink_me";
                      }else{ 
                        $warnaMc="btn-success";}
                    }else if($dMC['ket_status']=="Packing BS"){
                      if($dLama['lama']<"1" and $dLama['lama']!=""){ 
                        $warnaMc="bg-black blink_me1";
                      }else if($dMC['sts']=="Potensi Delay"){
                        $warnaMc="bg-black border-dashed";				
                      }else if($dMC['sts']=="Urgent"){ 
                        $warnaMc="bg-black blink_me";
                      }else{ 
                        $warnaMc="bg-black";}
                    }else{
                    /*Tidak Ada PO*/ 
                    $warnaMc="";
                    }

                    return $warnaMc;
                }
                function Rajut($mc)
                {
                  $con=mysqli_connect("10.0.0.10","dit","4dm1n","db_qc");
                  $qMC=mysqli_query($con,"SELECT a.langganan,a.no_order,a.warna,a.proses FROM tbl_schedule a 
                  LEFT JOIN tbl_inspection b ON a.id=b.id_schedule
                  WHERE a.no_mesin='$mc' and b.`status`='sedang jalan' and a.`status`='sedang jalan'  ORDER BY a.no_urut ASC LIMIT 1");
                  $dMC=mysqli_fetch_array($qMC);
                    echo "<font size=+2><u>".$mc."</u></font> <br>".$dMC['no_order']."<br> ".$dMC['langganan']."<br>".$dMC['warna']."<br>".$dMC['proses'];	
                }
                    /*function Waktu($mc){
                      $qLama=mysql_query("SELECT TIME_FORMAT(timediff(b.tgl_target,now()),'%H:%i') as lama FROM tbl_schedule a
                LEFT JOIN tbl_inspection b ON a.id=b.id_schedule
                WHERE a.no_mesin='$mc' AND a.status='sedang jalan' AND (ISNULL(b.tgl_stop) or NOT ISNULL(b.tgl_mulai)) ORDER BY a.no_urut ASC");
                      $dLama=mysql_fetch_array($qLama);
                      if($dLama[lama]!=""){echo $dLama[lama];}else{echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";}
                    }*/
                function Nama($mc){
                  $con=mysqli_connect("10.0.0.10","dit","4dm1n","db_qc");
                  $qNama=mysqli_query($con,"SELECT b.personil FROM tbl_schedule a 
                LEFT JOIN tbl_inspection b ON a.id=b.id_schedule
                WHERE a.no_mesin='$mc' and (b.`status`='sedang jalan' or a.`status`='sedang jalan') ORDER BY a.no_urut ASC LIMIT 1");	
                      $dNama=mysqli_fetch_array($qNama);
                  $qUser=mysqli_query($con,"SELECT `user` FROM user_login WHERE nama='$dNama[personil]' and dept='QC' LIMIT 1");
                      $dUser=mysqli_fetch_array($qUser);
                      if($dUser['user']!=""){echo $dUser['user']."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}else{echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
                }						

                /* Total Status Mesin */
                    $sqlStatus=mysqli_query($con,"SELECT no_mesin FROM tbl_mesin");
                    while ($rM=mysqli_fetch_array($sqlStatus)) {
                        $sts=NoMesin($rM['no_mesin']);
                        if ($sts=="bg-abu" or
                          $sts=="bg-abu border-dashed" or
                      $sts=="bg-abu blink_me1" or	
                          $sts=="bg-abu blink_me") {
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
                        if ($sts=="bg-kuning" or
                          $sts=="bg-kuning border-dashed" or
                      $sts=="bg-kuning blink_me1" or	
                          $sts=="bg-kuning blink_me") {
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
                        if ($sts=="bg-navy" or
                          $sts=="bg-navy border-dashed" or
                      $sts=="bg-navy blink_me1" or	
                          $sts=="bg-navy blink_me") {
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
                    if ($sts=="bg-purple" or
                          $sts=="bg-purple border-dashed" or
                      $sts=="bg-purple blink_me1" or	
                          $sts=="bg-purple blink_me") {
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
                    if ($sts=="btn-warning" or
                          $sts=="btn-warning border-dashed" or
                      $sts=="btn-warning blink_me1" or	
                          $sts=="btn-warning blink_me") {
                            $TDf="1";
                        } else {
                            $TDf="0";
                        }
                    if ($sts=="btn-info" or
                          $sts=="btn-info border-dashed" or
                      $sts=="btn-info blink_me1" or	
                          $sts=="btn-info blink_me") {
                            $Lks="1";
                        } else {
                            $Lks="0";
                        } 
                    if ($sts=="btn-success" or
                          $sts=="btn-success border-dashed" or
                      $sts=="btn-success blink_me1" or	
                          $sts=="btn-success blink_me") {
                            $IBs="1";
                        } else {
                            $IBs="0";
                        }
                    if ($sts=="btn-danger" or
                          $sts=="btn-danger border-dashed" or
                      $sts=="btn-danger blink_me1" or	
                          $sts=="btn-danger blink_me") {
                            $PGB="1";
                        } else {
                            $PGB="0";
                        }
                    if ($sts=="btn-primary" or
                          $sts=="btn-primary border-dashed" or
                      $sts=="btn-primary blink_me1" or	
                          $sts=="btn-primary blink_me") {
                            $URP="1";
                        } else {
                            $URP="0";
                        }
                    if ($sts=="bg-fuchsia" or
                          $sts=="bg-fuchsia border-dashed" or
                      $sts=="bg-fuchsia blink_me1" or	
                          $sts=="bg-fuchsia blink_me") {
                            $Lpt="1";
                        } else {
                            $Lpt="0";
                        }
                    if ($sts=="bg-lime" or
                          $sts=="bg-lime border-dashed" or
                      $sts=="bg-lime blink_me1" or	
                          $sts=="bg-lime blink_me") {
                            $IUl="1";
                        } else {
                            $IUl="0";
                        }
                    if ($sts=="btn-primary" or
                          $sts=="btn-primary border-dashed" or
                      $sts=="btn-primary blink_me1" or	
                          $sts=="btn-primary blink_me") {
                            $URP="1";
                        } else {
                            $URP="0";
                        }
                    if ($sts=="bg-olive" or
                          $sts=="bg-olive border-dashed" or
                      $sts=="bg-olive blink_me1" or	
                          $sts=="bg-olive blink_me") {
                            $PMi="1";
                        } else {
                            $PMi="0";
                        }
                    if ($sts=="bg-maroon" or
                          $sts=="bg-maroon border-dashed" or
                      $sts=="bg-maroon blink_me1" or	
                          $sts=="bg-maroon blink_me") {
                            $CBw="1";
                        } else {
                            $CBw="0";
                        }
                    if ($sts=="bg-black" or
                          $sts=="bg-black border-dashed" or
                      $sts=="bg-black blink_me1" or	
                          $sts=="bg-black blink_me") {
                            $PBS="1";
                        } else {
                            $PBS="0";
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
                    $totIBs=$totIBs+$IBs;
                    $totPGB=$totPGB+$PGB;
                    $totLpt=$totLpt+$Lpt;
                    $totIUl=$totIUl+$IUl;
                    $totURP=$totURP+$URP;
                    $totCBw=$totCBw+$CBw;
                    $totPMi=$totPMi+$PMi;
                    $totPBS=$totPBS+$PBS;
                    }
                    //$totMesin=$totTS+$totTPB+$totTBW+$totAM+$totTBS+$totTQ+$totPM+$totSJ+$totTAP;
                            
                ?>
					<table width="100%" border="0">
						<tbody>
								<tr>
								  <td width="13%" align="center"><span class="detail_status btn  <?php echo NoMesin("01"); ?>" id="01" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("01"); ?>">01<p><?php echo Nama("01"); ?></p></span></td>
								  <td width="13%" align="center"><span class="detail_status btn  <?php echo NoMesin("17"); ?>" id="17" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("17"); ?>">17<p><?php echo Nama("17"); ?></p></span></td>
								  <td width="14%" align="center"><span class="detail_status btn  <?php echo NoMesin("16"); ?>" id="16" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("16"); ?>">16<p><?php echo Nama("16"); ?></p></span></td>
									<td width="14%" align="center"><span class="detail_status btn  <?php echo NoMesin("18"); ?>" id="18" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("18"); ?>">18
								    <p><?php echo Nama("18"); ?></p>
									  </span></td>
									<td width="16%" align="center"><span class="detail_status btn  <?php echo NoMesin("02"); ?>" id="02" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("02"); ?>">02
								    <p><?php echo Nama("02"); ?></p>
									  </span></td>
									<td width="14%" align="center"><span class="detail_status btn  <?php echo NoMesin("03"); ?>" id="03" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("03"); ?>">03
								    <p><?php echo Nama("03"); ?></p>
									  </span></td>
									<td width="16%" align="center"><span class="detail_status btn  <?php echo NoMesin("04"); ?>" id="04" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("04"); ?>">04
								    <p><?php echo Nama("04"); ?></p>
									  </span></td>
							  </tr>
								<tr>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("05"); ?>" id="05" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("05"); ?>">05
								    <p><?php echo Nama("05"); ?></p>
								    </span></td>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("06"); ?>" id="06" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("06"); ?>">06
							      <p><?php echo Nama("06"); ?></p>
								    </span></td>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("07"); ?>" id="07" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("07"); ?>">07
							      <p><?php echo Nama("07"); ?></p>
								    </span></td>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("08"); ?>" id="08" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("08"); ?>">08
							      <p><?php echo Nama("08"); ?></p>
								    </span></td>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("12A"); ?>" id="12A" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("12A"); ?>">12A
							      <p><?php echo Nama("12A"); ?></p>
								    </span></td>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("14"); ?>" id="14" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("14"); ?>">14
							      <p><?php echo Nama("14"); ?></p>
								    </span></td>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("15"); ?>" id="15" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("15"); ?>">15
							      <p><?php echo Nama("15"); ?></p>
								    </span></td>
							  </tr>
								<tr>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("09"); ?>" id="09" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("09"); ?>">09
								    <p><?php echo Nama("09"); ?></p>
								    </span></td>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("10"); ?>" id="10" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("10"); ?>">10
							      <p><?php echo Nama("10"); ?></p>
								    </span></td>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("11"); ?>" id="11" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("11"); ?>">11
							      <p><?php echo Nama("11"); ?></p>
								    </span></td>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("12"); ?>" id="12" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("12"); ?>">12
							      <p><?php echo Nama("12"); ?></p>
								    </span></td>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("19"); ?>" id="19" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("19"); ?>">19
							      <p><?php echo Nama("19"); ?></p>
								    </span></td>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("20"); ?>" id="20" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("20"); ?>">20
							      <p><?php echo Nama("20"); ?></p>
								    </span></td>
								  <td align="center"><span class="detail_status btn  <?php echo NoMesin("21"); ?>" id="21" data-toggle="tooltip" data-html="true" title="<?php echo Rajut("21"); ?>">21
							      <p><?php echo Nama("21"); ?></p>
								    </span></td>
							  </tr>
								<tr>
								  <td colspan="4">&nbsp;</td>
								  <td colspan="3" valign="top">&nbsp;</td>
							  </tr>
								<tr>
								  <td colspan="4">Pisah Kain <span class="label bg-kuning">&nbsp;<?php echo $totPKn;?></span><br />
							      Tandai Defect <span class="label label-warning">&nbsp;<?php echo $totTDf;?></span><br />
							      Cabut/Totol <span class="label bg-purple">&nbsp;<?php echo $totCbt;?></span>                                  <br />
							      Lukis <span class="label label-info">&nbsp;<?php echo $totLks;?></span><br />
							      Inspect Biasa <span class="label label-success">&nbsp;<?php echo $totIBs;?></span><br />
							      Inspect Ulang <span class="label bg-lime">&nbsp;<?php echo $totIUl;?></span><br />
							      Cek Bowing <span class="label bg-maroon">&nbsp;<?php echo $totCBw;?></span>							  </td>
								  <td colspan="3" valign="top">Cek Beda Rol + Obras Tailing <span class="label bg-abu">&nbsp;<?php echo $totCBR;?></span><br />
								    Cek Gramasi Tiap Rol <span class="label bg-navy">&nbsp;<?php echo $totCGR;?></span><br />
								    Perbaikan Grade/Potong Buang <span class="label label-danger">&nbsp;<?php echo $totPGB;?></span><br />
							      Ukur Repeat Printing <span class="label label-primary">&nbsp;<?php echo $totURP;?></span><br />
							      Lipat <span class="label bg-fuchsia">&nbsp;<?php echo $totLpt;?></span><br />
							      Packing + Mutasi <span class="label bg-olive">&nbsp;<?php echo $totPMi;?></span><br />
							      Packing BS <span class="label bg-black">&nbsp;<?php echo $totPBS;?></span>
                                    </td>
							  </tr>
								<tr>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
							  </tr>
								<tr>
									<td style="padding: 5px;">
										<?php $totMesin='0'; ?>
										
									</td>
									<td style="padding: 5px;">&nbsp;</td>
									<td style="padding: 5px;">&nbsp;</td>
									<td style="padding: 5px;">&nbsp;</td>
									<td style="padding: 5px;">&nbsp;</td>
									<td style="padding: 5px;">&nbsp;</td>
									<td style="padding: 5px;">&nbsp;</td>
								</tr>								
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-xs-7">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel" data-interval="12000">                
            <div class="carousel-inner">
              <?php 
                $ut=1;
                $qryGmbr=mysqli_query($con,"SELECT * FROM tbl_gambar WHERE tampil='ya' ORDER BY id ASC");
                while($rG=mysqli_fetch_array($qryGmbr)){
              ?>	
              <div class="item <?php if($ut=="1"){echo "active";} ?>">
                <img src="../dist/img/gambar/<?php echo $rG['gambar'];?>" alt="<?php echo $rG['gambar'];?>" style="width: 100%; height:400px;">
                  <div class="carousel-caption">
                    <?php echo $rG['desc'];?>
                  </div>
              </div>
				      <?php $ut++;} ?>	
            </div>
            <a class="left carousel-control" href="#carousel-example-generic1" data-slide="prev">
              <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic1" data-slide="next">
              <span class="fa fa-angle-right"></span>
            </a>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
	</div>
<div>
	<marquee class="teks-berjalan" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
    <?php
    $news=mysqli_query($con,"SELECT GROUP_CONCAT(news_line SEPARATOR ' :: ') as news_line FROM tbl_news_line WHERE gedung='LT 1' AND status='Tampil'");
    $rNews=mysqli_fetch_array($news);
    $totMesin='0';
    ?>
    <?php echo "<font size='+8'>".$rNews['news_line']."</font>";?>
	</marquee>		
</div>		
<div id="CekDetailStatus" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

	</body>
	<!-- Tooltips -->
	<script src="../dist/js/tooltips.js"></script>
	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});

	</script>

</html>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- start - This is for export functionality only -->
    <script src="../bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
    <script src="../bower_components/datatables.net-bs/js/buttons.flash.min.js"></script>
    <script src="../bower_components/datatables.net-bs/js/jszip.min.js"></script>
    <script src="../bower_components/datatables.net-bs/js/pdfmake.min.js"></script>
    <script src="../bower_components/datatables.net-bs/js/vfs_fonts.js"></script>
    <script src="../bower_components/datatables.net-bs/js/buttons.html5.min.js"></script>
    <script src="../bower_components/datatables.net-bs/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script src="../bower_components/toast-master/js/jquery.toast.js"></script>
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- AdminLTE App -->
<script>
    //Initialize Select2 Elements
	$('.select2').select2();
	$('.select3').select2();
    $('.select').select2();	
	$("select2").on("select3:select2", function (evt) {
  var element = evt.params.data.element;
  var $element = $(element);
  
  $element.detach();
  $(this).append($element);
  $(this).trigger("change");
});
	
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
	  format: 'yyyy-mm-dd',
	  todayHighlight: true,
    }),
	//Date picker
    $('#datepicker1').datepicker({
      autoclose: true,
	  format: 'yyyy-mm-dd',
	  todayHighlight: true,
    }),
	//Date picker
    $('#datepicker2').datepicker({
      autoclose: true,
	  format: 'yyyy-mm-dd',
	  todayHighlight: true,
    }),
	//Date picker
    $('#datepicker3').datepicker({
      autoclose: true,
	  format: 'yyyy-mm-dd',
	  todayHighlight: true,
    })
</script>
<script>
  $(function () {
	$('#tblr1').DataTable({'paging': false,'ordering': false,
        'info': false,'searching': false});
    $('#example1').DataTable({
	  'scrollX'  : true,
	  'paging': true,

	})
	$('#example2').DataTable()
    $('#example3').DataTable({
	 'scrollX'	: true,
	 dom: 'Bfrtip',
      buttons: [
            'excel',
	  {
        orientation: 'portrait',
        pageSize: 'LEGAL',
        extend: 'pdf',
        footer: true,
				},
        ]
	})
	$('#example4').DataTable({
	    'paging': false,
	})
	$('#example5').DataTable()
	$('#example6').DataTable() 
	$('#tblr1').DataTable()
	$('#tblr2').DataTable()
	$('#tblr3').DataTable()
	$('#tblr4').DataTable()
	$('#tblr5').DataTable()
	$('#tblr6').DataTable()
	$('#tblr7').DataTable()
	$('#tblr8').DataTable()
	$('#tblr9').DataTable()
	$('#tblr10').DataTable()
	$('#tblr11').DataTable()
	$('#tblr12').DataTable()
	$('#tblr13').DataTable()
	$('#tblr14').DataTable()
	$('#tblr15').DataTable()
	$('#tblr16').DataTable()
	$('#tblr17').DataTable()
	$('#tblr18').DataTable()
	$('#tblr19').DataTable()
	$('#tblr20').DataTable()
	$('#lookup').DataTable()  

  })
	
</script>
<!-- Javascript untuk popup modal Edit-->
<script type="text/javascript">
   $(document).ready(function () {
	//iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
	//Initialize Select2 Elements
    $('.select2').select2()   
	 });
	
</script>
<script type="text/javascript">
//            jika dipilih, BON akan masuk ke input dan modal di tutup
      $(document).on('click', '.pilih-kk', function(e) {
        document.getElementById("nokk").value = $(this).attr('data-kk');
        document.getElementById("nokk").focus();
        $('#myModal').modal('hide');
      });
      $(document).on('click', '.pilih-no_test', function(e) {
        document.getElementById("no_test").value = $(this).attr('data-no_test');
        document.getElementById("no_test").focus();
        $('#myModal1').modal('hide');
      });
$(document).on('click', '.detail_status', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/cek-status-mesin.php",
          type: "GET",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#CekDetailStatus").html(ajaxData);
            $("#CekDetailStatus").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });	
$(document).on('click', '.data_edit', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/data_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#DataEdit").html(ajaxData);
         $("#DataEdit").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.posisi_kk', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/posisikk.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#PosisiKK").html(ajaxData);
         $("#PosisiKK").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.gerobak_tambah', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/gerobak_tambah.php",
          type: "GET",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#GerobakTambah").html(ajaxData);
            $("#GerobakTambah").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });	
$(document).on('click', '.edit_status_mesin', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/edit-status-mesin.php",
          type: "GET",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#EditStatusMesin").html(ajaxData);
            $("#EditStatusMesin").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });	
$(document).on('click', '.edit_bon', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/bon_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#EditBon").html(ajaxData);
         $("#EditBon").modal('show',{backdrop: 'true'});
       }
     });
      });	
$(document).on('click', '.sts_edit', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/sts_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StsEdit").html(ajaxData);
         $("#StsEdit").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.penyelesaian_edit', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/penyelesaian_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#SelesaiEdit").html(ajaxData);
         $("#SelesaiEdit").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.ncp_lama', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/ncp_lama.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#NcpLama").html(ajaxData);
         $("#NcpLama").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.terima_ncp_lama', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/ncp_lama_terima.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#NcpLamaTerima").html(ajaxData);
         $("#NcpLamaTerima").modal('show',{backdrop: 'true'});
       }
     });
      });	
$(document).on('click', '.dtmail', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/detail_email.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#DtMail").html(ajaxData);
         $("#DtMail").modal('show',{backdrop: 'true'});
       }
     });
      });	
$(document).on('click', '.schedule_edit', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/schedule_edit.php",
          type: "GET",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#ScheduleEdit").html(ajaxData);
            $("#ScheduleEdit").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });
$(document).on('click', '.mesin_mulai_edit', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/mesin_mulai_edit.php",
          type: "GET",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#MesinMulaiEdit").html(ajaxData);
            $("#MesinMulaiEdit").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });	
$(document).on('click', '.mesin_berhenti_edit', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/mesin_berhenti_edit.php",
          type: "GET",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#MesinBerhentiEdit").html(ajaxData);
            $("#MesinBerhentiEdit").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });	
$(document).on('click', '.news_edit', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/news_edit.php",
          type: "GET",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#NewsEdit").html(ajaxData);
            $("#NewsEdit").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });
$(document).on('click', '.posisi_edit', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/posisi_edit.php",
          type: "GET",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#PosisiOEdit").html(ajaxData);
            $("#PosisiOEdit").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });	
$(document).on('click', '.resep', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/resep.php",
          type: "GET",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#Resep").html(ajaxData);
            $("#Resep").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });
$(document).on('click', '.update_jeniskain', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/update_jeniskain.php",
          type: "GET",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#UpdateJenisKain").html(ajaxData);
            $("#UpdateJenisKain").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });
</script>
       <script src="../bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- bootstrap time picker -->

<script src="../dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script type="text/javascript">
$(function () {	
//Timepicker
			
    $('.timepicker').timepicker({
                minuteStep: 1,
                showInputs: true,
                showMeridian: false,
                defaultTime: false	
	  	
    })
	$('.timepicker1').timepicker({
		showInputs: true,
		defaultTime: false
	})		
})	
</script>