<?php
ini_set("error_reporting", 1);
session_start();
//include config
//require_once "waktu.php";
include("koneksi.php");
include("tgl_indo.php");
?>

<?php
date_default_timezone_set('Asia/Jakarta');
//set base constant
if( !isset($_SESSION['usrid'])) { ?>
<script>setTimeout("location.href='login'",500);</script>
<?php die( 'Illegal Access' ); }else if( !isset($_SESSION['pasid'])) { ?>
 <script>setTimeout("location.href='lockscreen'",500);</script>
<?php die( 'Illegal Access' );
}

//request page
$page = isset($_GET['p'])?$_GET['p']:'';
$act  = isset($_GET['act'])?$_GET['act']:'';
$id   = isset($_GET['id'])?$_GET['id']:'';
$page = strtolower($page);
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>QC-Final | <?php if($_GET['p']!=""){echo ucwords($_GET['p']);}else{echo "Home";}?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Signature -->
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">  
  <!-- toast CSS -->
  <link href="bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link href="bower_components/datatables.net-bs/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <!-- Sweet Alert -->
  <link href="bower_components/sweetalert/sweetalert2.css" rel="stylesheet" type="text/css">
  <!-- Sweet Alert -->
  <script type="text/javascript" src="bower_components/sweetalert/sweetalert2.min.js"></script>
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">	   
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">	
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css"> 	
  <!--  AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <?php if ($_GET['p'] == "Lap-GantiKain" OR $_GET['p'] == "Lap-Retur" OR $_GET['p'] == "Summary-Order" OR $_GET['p'] == "Lihat-Data-Cwarna-Dye-New" OR $_GET['p'] == "Lihat-Data-Cwarna-Fin-New" OR $_GET['p'] == "Lihat-Data-Jahit" OR $_GET['p']=="Lap-Potong" OR $_GET['p']=="Input-Sisa-Lap-Packing") : ?>
  <!-- X Editable -->
  <link href="bower_components/xeditable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  <?php endif; ?>

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
	.headline {
  color: #010101;
  text-shadow: 1px 3px 5px rgba(0, 0, 0, 0.5);
  font-weight: 300;
  -webkit-font-smoothing: antialiased !important;
  opacity: 0.9;
  margin: 0px 0 0px 0;
  font-size: 28px;
}  
  </style>
  <!-- Google Font -->
  <!--
  <link rel="stylesheet"
        href="dist/css/font/font.css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  -->
  <link rel="icon" type="image/png" href="dist/img/ITTI_Logo index.ico">
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

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini <?php if($_SESSION['lvl_id']!="TQ" and $_SESSION['lvl_id']!="LEADERTQ"){ ?> sidebar-collapse <?php }?> fixed"> 
<!--<body class="hold-transition skin-blue sidebar-mini">-->
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="Home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>QCF</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>QC</b>-Final</span>
    </a>
	<?php if($_SESSION['dept']=="QC"){ $Wdept=" ";}else{ $Wdept=" AND dept='$_SESSION[dept]' "; }?>
    <!-- Header Navbar -->
	  
    <nav class="navbar navbar-static-top" role="navigation">
	   	
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>	  	
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">		 
        <ul class="nav navbar-nav">
        <?php $qryNCP=mysqli_query($con,"SELECT COUNT(*) as jml from tbl_ncp_qcf WHERE ISNULL(tgl_rencana) $Wdept AND status='Belum OK'");
      $rNCP=mysqli_fetch_array($qryNCP);
            ?>

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo $rNCP['jml']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Ada <span class="label label-warning"><?php echo $rNCP['jml']; ?></span> NCP Baru</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
				<?php $qryNCP1=mysqli_query($con,"SELECT no_ncp FROM tbl_ncp_qcf WHERE ISNULL(tgl_rencana) $Wdept AND status='Belum OK'");
                while ($rNCP1=mysqli_fetch_array($qryNCP1)) {
                ?>
                  <li><!-- start notification -->
                    <a href="StatusNCP">
                      <i class="fa fa-file-text text-aqua"></i> <?php echo "No NCP: ".$rNCP1['no_ncp']; ?>
                    </a>
                  </li>
                  <!-- end notification -->
					<?php } ?>
                </ul>
              </li>
              <li class="footer"><a href="StatusNCP">Tampil Semua</a></li>
            </ul>
          </li>
			<?php $qryNCP2=mysqli_query($con,"SELECT COUNT(*) as jml from tbl_ncp_qcf 
			WHERE NOT ISNULL(tgl_rencana) 
			$Wdept 
			AND status='Belum OK'
			AND (penyelesaian='' OR ISNULL(penyelesaian))");
      $rNCP2=mysqli_fetch_array($qryNCP2);
            ?>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-info"><?php echo $rNCP2['jml'];?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Ada <span class="label label-primary"><?php echo $rNCP2['jml'];?></span> NCP sedang proses</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
				<?php $qryNCP3=mysqli_query($con,"SELECT no_ncp FROM tbl_ncp_qcf 
				WHERE NOT ISNULL(tgl_rencana) 
				$Wdept 
				AND status='Belum OK'
				AND (penyelesaian='' OR ISNULL(penyelesaian))
				");
                while ($rNCP3=mysqli_fetch_array($qryNCP3)) {
          ?>
                  <li><!-- Task item -->
                    <a href="StatusNCP">
                      <!-- Task title and progress text -->
                      <h3>
                        <?php echo "No NCP: ".$rNCP3['no_ncp'];?>
                        <small class="pull-right"><?php echo "50";?>%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar <?php if($prsn=="100"){echo"bg-green";}else if(51>50){echo"bg-aqua";} ?> " style="width: <?php echo "50";?>%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only"><?php echo "50";?>% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
				<?php } ?>
                </ul>
              </li>
              <li class="footer">
                <a href="StatusNCP">Tampil Semua</a>
              </li>
            </ul>
          </li>
		  <?php $qryNCP4=mysqli_query($con,"SELECT COUNT(*) as jml from tbl_ncp_qcf 
		  WHERE NOT ISNULL(tgl_rencana) 
		  $Wdept 
		  AND status='Belum OK'
		  AND Not penyelesaian=''");
      $rNCP4=mysqli_fetch_array($qryNCP4);
            ?>
           <!-- Revisi Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa  fa-flag-checkered"></i>
              <span class="label label-danger"><?php echo $rNCP4['jml'];?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Ada <span class="label label-danger"><?php echo $rNCP4['jml'];?></span> NCP yang Tunggu OK QCF</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
				<?php $qryNCP5=mysqli_query($con,"SELECT no_ncp FROM tbl_ncp_qcf 
				WHERE NOT ISNULL(tgl_rencana) 
				$Wdept 
				AND status='Belum OK'
				AND Not penyelesaian=''
				");
                while ($rNCP5=mysqli_fetch_array($qryNCP5)) {	?>
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        <?php echo "No NCP: ".$rNCP5['no_ncp']."";?>
                      </h3>
                    </a>
                  </li>
                  <!-- end task item -->
				<?php } ?>
                </ul>
              </li>
              <li class="footer">
                <a href="#">Tampil Semua</a>
              </li>
            </ul>
          </li>
			<!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/<?php echo $_SESSION['foto'].".png";?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo strtoupper($_SESSION['usrid']);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/<?php echo $_SESSION['foto'].".png";?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo strtoupper($_SESSION['usrid']);?> - <?php echo $_SESSION['jabatan']; ?>
                  <small>Member since <?php echo $_SESSION['mamber']; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="lockscreen" class="btn btn-default btn-flat">LockScreen</a>
                </div>
                <div class="pull-right">
                  <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
		
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/<?php echo $_SESSION['foto'].".png";?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper($_SESSION['usrid']);?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form (Optional) -->
      <!--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>-->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="<?php if($_GET['p']=="Home" or $_GET['p']==""){echo"active";} ?>"><a href="Home"><i class="fa fa-dashboard text-gray"></i> <span>DashBoard</span></a></li>
          <?php if($_SESSION['lvl_id']=="PACKING" or $_SESSION['lvl_id']=="MKT"){  ?>  
            <li class="treeview <?php if($_GET['p']=="Input-Data-New" or $_GET['p']=="Input-Data-KJ-New" or $_GET['p']=="Detail-Data" or $_GET['p']=="Label-QCF" or $_GET['p']=="Detail-Data-KJ" or $_GET['p']=="Rekap-Data" or $_GET['p']=="Rekap-Email" or $_GET['p']=="Rekap-Bon" or $_GET['p']=="Grafik"){echo"active";}?>">
              <a href="#"><i class="fa fa-cubes"></i> <span>QCF</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Input-Data-New" or $_GET['p']=="Detail-Data-New"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="InputDataNew"><i class="fa fa-calendar"></i> <span>Input-Data</span></a></li>
                <li class="<?php if($_GET['p']=="Input-Data-KJ-New" or $_GET['p']=="Detail-Data-KJ-New"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="InputDataKJNew"><i class="fa fa-calendar"></i> <span>Input-Data-KJ</span></a></li>
                <li class="<?php if($_GET['p']=="Label-QCF"){echo"active";} ?>"><a href="LabelQCF"><i class="fa fa-file-text-o"></i> <span>Label QCF</span></a></li>
                <!-- <li class="<?php if($_GET['p']=="Rekap-Data"){echo"active";} ?>"><a href="RekapData"><i class="fa fa-line-chart"></i> <span>Rekap-Data</span></a></li>
                <li class="<?php if($_GET['p']=="Rekap-Bon"){echo"active";} ?>"><a href="RekapBon"><i class="fa fa-line-chart"></i> <span>Rekap-Bon</span></a></li>
                <li class="<?php if($_GET['p']=="Grafik"){echo"active";} ?>"><a href="Grafik"><i class="fa fa-line-chart"></i> <span>Grafik</span></a></li>
                <li class="<?php if($_GET['p']=="Terima-KK"){echo"active";} ?>"><a href="TerimaKK"><i class="fa fa-line-chart"></i> <span>Terima KK</span></a></li>
                <li class="<?php if($_GET['p']=="Serah-Terima"){echo"active";} ?>"><a href="SerahTerima"><i class="fa fa-line-chart"></i> <span>Serah Terima KK</span></a></li> -->
              </ul>
            </li>
		      <?php } ?>
		      <!-- <?php if($_SESSION['lvl_id']=="TQ" or $_SESSION['lvl_id']=="LEADERTQ"){  ?>
		        <li class="treeview <?php if($_GET['p']=="Kain-Masuk-New" or $_GET['p']=="Result-New" or $_GET['p']=="Result-KK-New" or $_GET['p']=="Result-NoTest-New" or $_GET['p']=="Testing-New" or $_GET['p']=="Testing-NewNoTes" or $_GET['p']=="StatusTQ-New" or $_GET['p']=="SummaryTQ-New" or $_GET['p']=="SummaryTQ-Nokk-New" or $_GET['p']=="Report-New" or $_GET['p']=="Random" or $_GET['p']=="CetakRandom" or $_GET['p']=="Random-New" or $_GET['p']=="Randomh-New" or $_GET['p']=="EditTQ-New" or $_GET['p']=="Master-Data-New" or $_GET['p']=="Final-StatusTQ-New" or $_GET['p']=="MasterTest-New" or $_GET['p']=="Testing-Operan" or $_GET['p']=="Testing-OperanNoTes" or $_GET['p']=="Rumus-Hitung" or $_GET['p']=="Lihat-Grafik-DT" or $_GET['p']=="Report-FLLululemon" or $_GET['p']=="Report-FLLululemonNoTes" or $_GET['p']=="Master-Hangtag"){echo"active";}?>">
              <a href="#"><i class="fa fa-cube"></i> <span>Test Quality New</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
       		      <li class="<?php if($_GET['p']=="Kain-Masuk-New"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="KainInNew"><i class="fa fa-calendar text-aqua"></i> <span>Kain Masuk</span></a></li>		   
		   	        <li class="<?php if($_GET['p']=="Testing-New" or $_GET['p']=="Testing-NewNoTes"){echo"active";} ?>"><a href="TestingNew"><i class="fa fa-file-text text-aqua"></i> <span>Testing</span></a></li>
		   	        <li class="<?php if($_GET['p']=="Result-New" or $_GET['p']=="Result-KK-New" or $_GET['p']=="Result-NoTest-New"){echo"active";} ?>"><a href="ResultNew"><i class="fa fa-check-circle-o text-aqua"></i> <span>Result</span></a></li>
                <?php if($_SESSION['lvl_id']=="LEADERTQ"){?>
                  <li class="<?php if($_GET['p']=="EditTQ-New"){echo"active";} ?>"><a href="EditTQNew"><i class="fa fa-edit text-aqua"></i> <span>Edit Testing</span></a></li>
                  <li class="<?php if($_GET['p']=="StatusTQ-New"){echo"active";} ?>"><a href="StatusTQNew"><i class="fa fa-list-alt text-aqua"></i> <span>Status Test Quality</span>
                    <span class="pull-right-container">
                      <?php 
                        $delay = date('Y-m-d');
                        $sqldt= mysqli_query($con,"SELECT COUNT(*) as cnt FROM tbl_tq_nokk a
                        LEFT JOIN tbl_tq_test b ON a.id=b.id_nokk
                        WHERE (`status`='' or `status` IS NULL) and tgl_masuk between date_sub(now(),INTERVAL 30 DAY) and now() AND tgl_target < '$delay'
                        ORDER BY no_test DESC");
                        $row = mysqli_fetch_array($sqldt);
                      ?>
                      <small class="label pull-right bg-red"><?php echo $row['cnt'];?></small>
                    </span>
                  </a></li>
                  <li class="<?php if($_GET['p']=="Final-StatusTQ-New"){echo"active";} ?>"><a href="FinalStatusTQNew"><i class="fa fa-list text-aqua"></i> <span>Final Status Test Quality</span></a></li>
                  <li class="<?php if($_GET['p']=="SummaryTQ-New" OR $_GET['p']=="SummaryTQ-Nokk-New"){echo"active";} ?>"><a href="SummaryTQNew"><i class="fa fa-list text-aqua"></i> <span>Summary Test Quality</span></a></li>
                  <li class="<?php if($_GET['p']=="Random" or $_GET['p']=="CetakRandom" or $_GET['p']=="Random-New" or $_GET['p']=="Randomh-New"){echo"active";} ?>"><a href="Random"><i class="fa fa-random text-aqua"></i> <span>Random</span></a></li>
                  <li class="<?php if($_GET['p']=="Report-New"){echo"active";} ?>"><a href="ReportNew"><i class="fa fa-file-text-o text-aqua"></i> <span>Report</span></a></li>
                  <li class="<?php if($_GET['p']=="Report-FLLululemon" OR $_GET['p']=="Report-FLLululemonNoTes"){echo"active";} ?>"><a href="ReportFLLululemon"><i class="fa fa-file-text-o text-aqua"></i> <span>Report First Lot Lululemon</span></a></li>
                  <li class="<?php if($_GET['p']=="MasterTest-New"){echo"active";} ?>"><a href="MasterTestNew"><i class="fa fa-cube text-aqua"></i> <span>Master Test</span></a></li>
                  <li class="<?php if($_GET['p']=="Testing-Operan" OR $_GET['p']=="Testing-OperanNoTes"){echo"active";} ?>"><a href="TestingOperan"><i class="fa fa-file-text text-aqua"></i> <span>Testing Operan</span></a></li>
                  <li class="<?php if($_GET['p']=="Master-Hangtag"){echo"active";} ?>"><a href="MasterHangtag"><i class="fa fa-file-text text-aqua"></i> <span>Master Hangtag</span></a></li>
                <?php }?>
                <li class="<?php if($_GET['p']=="Rumus-Hitung" OR $_GET['p']=="Lihat-Grafik-DT"){echo"active";} ?>"><a href="RumusHitung"><i class="fa fa-gear text-aqua"></i> <span>Rumus Hitung</span></a></li>
			          <li class="<?php if($_GET['p']=="Master-Data-New"){echo"active";} ?>"><a href="MasterDataNew"><i class="fa fa-database text-aqua"></i> <span>Master Data</span></a></li>  
              </ul>
            </li>
		      <?php } ?> -->
          <?php if($_SESSION['lvl_id']=="SPVQC"){  ?>
            <li class="treeview <?php if($_GET['p']=="Input-Detail-Disposisi-Now" or $_GET['p']=="Disposisi-Now"){echo"active";}?>">
              <a href="#"><i class="fa fa-cubes"></i> <span>Report Disposisi NOW</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
       		      <li class="<?php if($_GET['p']=="Input-Detail-Disposisi-Now"){echo"active";} ?>"><a href="InputDisposisiDetail"><i class="fa fa-edit"></i> <span>Input Disposisi NOW</span></a></li>			 
                <li class="<?php if($_GET['p']=="Disposisi-Now"){echo"active";} ?>"><a href="DisposisiNOW"><i class="fa fa-bar-chart"></i> <span>Disposisi NOW</span></a></li>	
              </ul>
            </li>
            <li class="treeview <?php if($_GET['p']=="Aftersales-Now"){echo"active";}?>">
              <a href="#"><i class="fa fa-cubes"></i> <span>Report Aftersales NOW</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Aftersales-Now"){echo"active";} ?>"><a href="AftersalesNOW"><i class="fa fa-bar-chart"></i> <span>Aftersales NOW</span></a></li>	
              </ul>
            </li>
          <?php } ?>
		      <?php if($_SESSION['lvl_id']=="AFTERSALES"){  ?>
		        <li class="treeview <?php if($_GET['p']=="Input-KPE-New"){echo"active";}?>">
              <a href="#"><i class="fa fa-cubes"></i> <span>Data KPE</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
       		      <li class="<?php if($_GET['p']=="Input-KPE-New"){echo"active";} ?>"><a href="KPENew"><i class="fa fa-calendar"></i> <span>Input KPE</span></a></li>			 
              </ul>
            </li>
            <li class="treeview <?php if($_GET['p']=="Input-Detail-Disposisi-Now" or $_GET['p']=="Disposisi-Now"){echo"active";}?>">
              <a href="#"><i class="fa fa-cubes"></i> <span>Report Disposisi NOW</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
       		      <li class="<?php if($_GET['p']=="Input-Detail-Disposisi-Now"){echo"active";} ?>"><a href="InputDisposisiDetail"><i class="fa fa-edit"></i> <span>Input Disposisi NOW</span></a></li>			 
                <li class="<?php if($_GET['p']=="Disposisi-Now"){echo"active";} ?>"><a href="DisposisiNOW"><i class="fa fa-bar-chart"></i> <span>Disposisi NOW</span></a></li>	
              </ul>
            </li>
		        <li class="treeview <?php if($_GET['p']=="Lap-KPE" or $_GET['p']=="Form-LKPP" or $_GET['p']=="Lap-Disposisi" or $_GET['p']=="Lap-GantiKain" or $_GET['p']=="Lap-Retur" or $_GET['p']=="Lap-TPUKPE" or $_GET['p']=="Lap-ME" or $_GET['p']=="Lap-5Besar-KPE" or $_GET['p']=="Lap-5Besar-TPUKPE" or $_GET['p']=="Aftersales-Now"){echo"active";}?>">
              <a href="#"><i class="fa fa-file-o text-aqua"></i> <span>Reports KPE</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Aftersales-Now"){echo"active";} ?>"><a href="AftersalesNOW"><i class="fa fa-bar-chart"></i> <span>Aftersales NOW</span></a></li>	
                <li class="<?php if($_GET['p']=="Lap-KPE"){echo"active";} ?>"><a href="LapKPE"><i class="fa fa-calendar"></i> <span>Lap KPE</span></a></li>
                <li class="<?php if($_GET['p']=="Form-LKPP"){echo"active";} ?>"><a href="FormLKPP"><i class="fa fa-navicon"></i> <span>Lap KPP</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-Disposisi"){echo"active";} ?>"><a href="LapDisposisi"><i class="fa fa-sticky-note-o"></i> <span>Lap KPE Disposisi</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-GantiKain"){echo"active";} ?>"><a href="LapGantiKain"><i class="fa fa-exchange"></i> <span>Lap Ganti Kain</span></a></li>		   	  
                <li class="<?php if($_GET['p']=="Lap-Retur"){echo"active";} ?>"><a href="LapRetur"><i class="fa fa-tags"></i> <span>Lap Retur</span></a></li>		   	  
                <li class="<?php if($_GET['p']=="Lap-TPUKPE"){echo"active";} ?>"><a href="LapTPUKPE"><i class="fa fa-file"></i> <span>Lap TPUKPE</span></a></li>	
                <li class="<?php if($_GET['p']=="Lap-ME"){echo"active";} ?>"><a href="LapME"><i class="fa fa-file-text"></i> <span>Lap ME</span></a></li>		   	  
                <li class="<?php if($_GET['p']=="Lap-5Besar-KPE"){echo"active";} ?>"><a href="Lap5BesarKPE"><i class="fa fa-bar-chart"></i> <span>Lap 5 Besar KPE</span></a></li>		   	  
                <li class="<?php if($_GET['p']=="Lap-5Besar-TPUKPE"){echo"active";} ?>"><a href="Lap5BesarTPUKPE"><i class="fa fa-bar-chart"></i> <span>Lap 5 Besar TPUKPE</span></a></li>		   	  
              </ul>
            </li>
            <!-- <li class="treeview <?php if($_GET['p']=="Rekap-Data" or $_GET['p']=="Summary-Order" or $_GET['p']=="Lap-Inspeksi" or $_GET['p']=="Lap-Mutasi" or $_GET['p']=="Lihat-Data-Packing" or $_GET['p']=="Lihat-Data-Lap-Krah" or $_GET['p']=="Final-StatusTQ-New" or $_GET['p']=="SummaryTQ-Aftersales" or $_GET['p']=="SummaryTQ-AftersalesPO"){echo"active";}?>">
              <a href="#"><i class="fa fa-file-o text-green"></i> <span>Reports QC</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Rekap-Data"){echo"active";} ?>"><a href="RekapData"><i class="fa fa-line-chart"></i> <span>Rekap Data</span></a></li>
                <li class="<?php if($_GET['p']=="Summary-Order"){echo"active";} ?>"><a href="SummaryOrder"><i class="fa fa-check text-green"></i> <span>Bon Penghubung</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-Inspeksi"){echo"active";} ?>"><a href="LapInspeksi"><i class="fa fa-line-chart text-danger"></i> <span>Laporan Inspeksi</span></a></li>
                <li class="<?php if($_GET['p']=="Lihat-Data-Packing"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="LihatPacking"><i class="fa fa-file-text"></i> <span>Laporan Packing</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-Mutasi"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="LapMutasi"><i class="fa fa-file-text text-maroon"></i> <span>Laporan Mutasi</span></a></li>
                <li class="<?php if($_GET['p']=="Lihat-Data-Lap-Krah"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="LihatLapKrah"><i class="fa fa-file-text text-green"></i> <span>Laporan Krah</span></a></li>	  
                <li class="<?php if($_GET['p']=="Final-StatusTQ-New"){echo"active";} ?>"><a href="FinalStatusTQNew"><i class="fa fa-list text-aqua"></i> <span>Final Status Test Quality</span></a></li>
                <li class="<?php if($_GET['p']=="SummaryTQ-Aftersales" or $_GET['p']=="SummaryTQ-AftersalesPO"){echo"active";} ?>"><a href="index1.php?p=summarytq-aftersales"><i class="fa fa-list text-aqua"></i> <span>Summary Test Quality</span></a></li>
              </ul>
            </li> -->
            <!-- <li class="treeview <?php if($_GET['p']=="Lihat-Data-Jahit" or $_GET['p']=="Lihat-Data-Cwarna-Fin" or $_GET['p']=="Lap-NCP" or $_GET['p']=="Lap-NCP-CanDis"){echo"active";}?>">
              <a href="#"><i class="fa fa-file-o text-orange"></i> <span>Reports QC2</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Lihat-Data-Jahit"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="LihatJahit"><i class="fa fa-file-text text-orange"></i> <span>Laporan Jahit</span></a></li>
                <li class="<?php if($_GET['p']=="Lihat-Data-Cwarna-Fin"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="LihatCWarnaFin"><i class="fa fa-calendar"></i> <span>Laporan Cocok Warna Finishing</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-NCP"){echo"active";} ?>"><a href="LapNCP"><i class="fa fa-circle-o text-green"></i> <span>Laporan NCP</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-NCP-CanDis"){echo"active";} ?>"><a href="LapNCPCanDis"><i class="fa fa-circle-o text-orange"></i> <span>Laporan NCP Cancel / Disposisi</span></a></li>
              </ul>
            </li> -->
            <!-- <li class="treeview <?php if($_GET['p']=="Lap-Pengiriman" or $_GET['p']=="Lap-SJ" or $_GET['p']=="Lap-PKJ" or $_GET['p']=="Lap-Kain-Keluar"){echo"active";}?>">
              <a href="#"><i class="fa fa-file-o text-maroon"></i> <span>Reports PPC</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Lap-Pengiriman"){echo"active";} ?>"><a href="LapPengiriman"><i class="fa fa-circle-o text-red"></i> <span>Laporan Pengiriman</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-SJ"){echo"active";} ?>"><a href="LapSJ"><i class="fa fa-circle-o text-yellow"></i> <span>Laporan Surat Jalan</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-PKJ"){echo"active";} ?>"><a href="LapPKJ"><i class="fa fa-circle-o text-white"></i> <span>Laporan Persediaan Kain Jadi</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-Kain-Keluar"){echo"active";} ?>"><a href="LapKainKeluar"><i class="fa fa-circle-o text-white"></i> <span>Laporan Kain Keluar</span></a></li>
              </ul>
            </li>   -->
		      <?php } ?>
		      <!-- <?php if($_SESSION['lvl_id']=="PRODUKSI"){  ?>
		        <li class="treeview <?php if($_GET['p']=="Input-Proses"){echo"active";}?>">
              <a href="#"><i class="fa fa-gears"></i> <span>Data Kartu Kerja</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
       		      <li class="<?php if($_GET['p']=="Input-Proses"){echo"active";} ?>"><a href="KKPro"><i class="fa fa-calendar"></i> <span>Input Proses</span></a></li>		   	  
              </ul>
            </li>
		        <li class="treeview <?php if($_GET['p']=="Lap-Proses"){echo"active";}?>">
              <a href="#"><i class="fa fa-gears"></i> <span>Reports Proses</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
       		      <li class="<?php if($_GET['p']=="Lap-Proses"){echo"active";} ?>"><a href="LapPro"><i class="fa fa-calendar"></i> <span>Lap Proses</span></a></li>		   	  
              </ul>
            </li>  
		      <?php } ?>   -->
		      <?php if($_SESSION['lvl_id']=="NCP" or $_SESSION['lvl_id']=="PACKING"){  ?>
		        <li class="treeview <?php if($_GET['p']=="Input-NCP-New" or $_GET['p']=="Status-NCP-New" or $_GET['p']=="Input-Memo-NCP-New" or $_GET['p']=="Input-NSP-New"){echo"active";}?>">
              <a href="#"><i class="fa fa-cubes text-red"></i> <span>Data NCP</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if($_SESSION['dept']=="QC"){?>  
                  <li class="<?php if($_GET['p']=="Input-NCP-New"){echo"active";} ?>"><a href="NCPNew"><i class="fa fa-calendar-check-o text-green"></i> <span>Input NCP</span></a></li> 
                  <li class="<?php if($_GET['p']=="Input-Memo-NCP-New"){echo"active";} ?>"><a href="NCPMemoNew"><i class="fa fa-file-archive-o text-warning"></i> <span>Input Memo</span></a></li> 
                  <li class="<?php if($_GET['p']=="Input-NSP-New"){echo"active";} ?>"><a href="NSPNew"><i class="fa fa-file-archive-o text-purple"></i> <span>Input NSP</span></a></li>
                <?php } ?>  
			          <!-- <li class="<?php if($_GET['p']=="Status-NCP-New"){echo"active";} ?>"><a href="StatusNCPNew"><i class="fa fa-area-chart text-aqua"></i> <span>Status NCP</span></a></li>   -->
              </ul>
            </li>
		        <!-- <li class="treeview <?php if($_GET['p']=="Lap-NCP" or $_GET['p']=="Register-NCP" or $_GET['p']=="Lap-NCP-Lama" or $_GET['p']=="Lap-NCP-Memo" or $_GET['p']=="Lap-NSP" or $_GET['p']=="Lap-NCP-NSP" or $_GET['p']=="Lap-5Besar-NCP" or $_GET['p']=="Lap-NCP-CanDis" or $_GET['p']=="Grafik-NCP"){echo"active";}?>">
              <a href="#"><i class="fa fa-file-o text-blue"></i> <span>Reports NCP</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>  
		          <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Register-NCP"){echo"active";} ?>"><a href="RegisterNCP"><i class="fa fa-circle-o text-aqua"></i> <span>Register NCP</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-NCP"){echo"active";} ?>"><a href="LapNCP"><i class="fa fa-circle-o text-green"></i> <span>Laporan NCP</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-NCP-Lama"){echo"active";} ?>"><a href="LapNCPLama"><i class="fa fa-circle-o text-fuchsia"></i> <span>Laporan NCP Lama</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-NCP-Memo"){echo"active";} ?>"><a href="LapNCPMemo"><i class="fa fa-circle-o text-warning"></i> <span>Laporan Memo</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-NSP"){echo"active";} ?>"><a href="LapNSP"><i class="fa fa-circle-o text-purple"></i> <span>Laporan NSP</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-NCP-NSP"){echo"active";} ?>"><a href="LapNCPNSP"><i class="fa fa-circle-o text-gray"></i> <span>Laporan NCP/NSP</span></a></li>
                <li class="<?php if($_GET['p']=="Lap-QC-FINAL"){echo"active";} ?>"><a href="LapQCFinal"><i class="fa fa-circle-o text-red"></i> <span>Laporan QC Final</span></a></li>   
                <li class="<?php if($_GET['p']=="Lap-Pencapaian"){echo"active";} ?>"><a href="LapPencapaian"><i class="fa fa-circle-o text-warning"></i> <span>Laporan Pencapaian</span></a></li> 
                <li class="<?php if($_GET['p']=="Lap-5Besar-NCP"){echo"active";} ?>"><a href="Lap5BesarNCP"><i class="fa fa-circle-o text-orange"></i> <span>Laporan 5 Besar NCP</span></a></li> 
                <li class="<?php if($_GET['p']=="Lap-NCP-CanDis"){echo"active";} ?>"><a href="LapNCPCanDis"><i class="fa fa-circle-o text-green"></i> <span>Laporan NCP Cancel / Disposisi</span></a></li>
                <li class="<?php if($_GET['p']=="Grafik-NCP"){echo"active";} ?>"><a href="GrafikNCP"><i class="fa fa-circle-o text-purple"></i> <span>Grafik NCP</span></a></li>	  
              </ul>	
            </li>   -->
		      <?php } ?>  
		      <?php if($_SESSION['lvl_id']=="INSPEKSI"){  ?>
		        <li class="treeview <?php if($_GET['p']=="Schedule" or $_GET['p']=="Status-Mesin" or $_GET['p']=="Inspeksi-Kain" or $_GET['p']=="Line-News" or $_GET['p']=="Grafik-QCF" or $_GET['p']=="Lap-Inspektor" or $_GET['p']=="Lap-Inspeksi" or $_GET['p']=="Status-Mesin-Gabung" or $_GET['p']=="SummaryInspeksi" or $_GET['p']=="Input-Lap-Shading" or $_GET['p']=="Lihat-Data-Shading" or $_GET['p']=="Summary-Inspeksi" or $_GET['p']=="Summary-Inspect-Packing"){echo"active";}?>">
              <a href="#"><i class="fa fa-archive text-warning"></i> <span>Inspeksi</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
       		      <li class="<?php if($_GET['p']=="Schedule"){echo"active";} ?>"><a href="Schedule"><i class="fa fa-calendar text-success"></i> <span>Schedule</span></a></li>	
                <li class="<?php if($_GET['p']=="Summary-Inspeksi"){echo"active";} ?>"><a href="SummaryInspeksi"><i class="fa fa-line-chart text-success"></i> <span>Summary Inspeksi</span></a></li>
                <li class="<?php if($_GET['p']=="Summary-Inspect-Packing"){echo"active";} ?>"><a href="SummaryInspectPacking"><i class="fa fa-bar-chart-o text-success"></i> <span>Summary Inspect Packing</span></a></li>
                <!-- <li class="<?php if($_GET['p']=="Input-Lap-Shading" or $_GET['p']=="Lihat-Data-Shading"){echo"active";} ?>"><a href="InputLapShading"><i class="fa fa-gear text-teal"></i> <span>Lap-Shading</span></a></li>	  	   	   -->
           	    <!-- <li class="<?php if($_GET['p']=="Status-Mesin"){echo"active";} ?>"><a href="StatusMesin"><i class="fa fa-television text-primary"></i> <span>Status Mesin</span></a></li> -->
		            <!-- <li class="<?php if($_GET['p']=="Status-Mesin-Gabung"){echo"active";} ?>"><a href="StatusQCF"><i class="fa fa-television text-info"></i> <span>Status QCF</span></a></li>	   -->
                <!-- <li class="<?php if($_GET['p']=="Inspeksi-Kain"){echo"active";} ?>"><a href="InspeksiKain"><i class="fa fa-line-chart text-danger"></i> <span>Inspeksi Kain</span></a></li> -->
		            <!-- <li class="<?php if ($_GET['p']=="Line-News") { echo"active"; } ?>"><a href="LineNews"><i class="fa fa-newspaper-o text-warning"></i> <span>Line News</span></a></li> -->
		            <!-- <li class="<?php if ($_GET['p']=="Grafik-QCF") { echo"active"; } ?>"><a href="GrafikQCF"><i class="fa  fa-bar-chart-o text-info"></i> <span>Grafik</span></a></li>	   -->
                <!-- <li class="<?php if($_GET['p']=="Lap-Inspektor"){echo"active";} ?>"><a href="LapInspektor"><i class="fa fa-line-chart text-success"></i> <span>Lap-Inspektor</span></a></li> -->
                <!-- <li class="<?php if($_GET['p']=="Lap-Inspeksi"){echo"active";} ?>"><a href="LapInspeksi"><i class="fa fa-line-chart text-danger"></i> <span>Lap-Inspeksi</span></a></li>	   -->
              </ul>	  
            </li>
		      <?php } ?>
          <?php if($_SESSION['lvl_id']=="PACKING" OR $_SESSION['lvl_id']=="NCP"){  ?>  
            <li class="treeview <?php if($_GET['p']=="Input-Lap-Cwarna-Fin-New" or $_GET['p']=="Input-Lap-Cwarna-Dye-New" or $_GET['p']=="Lihat-Data-Cwarna-Dye-New" or $_GET['p']=="Lihat-Data-Cwarna-Fin-New"){echo"active";}?>">
              <a href="#"><i class="fa fa-cubes"></i> <span>Cocok Warna</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Input-Lap-Cwarna-Fin-New" or $_GET['p']=="Lihat-Data-Cwarna-Fin-New"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="CWarnaFinNew"><i class="fa fa-calendar"></i> <span>Lap Cocok Warna Finishing</span></a></li>
                <li class="<?php if($_GET['p']=="Input-Lap-Cwarna-Dye-New" or $_GET['p']=="Lihat-Data-Cwarna-Dye-New"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="CWarnaDyeNew"><i class="fa fa-calendar"></i> <span>Lap Cocok Warna Dyeing</span></a></li>
              </ul>
            </li>
            <li class="treeview <?php if($_GET['p']=="Input-Lap-Jahit-New" or $_GET['p']=="Lihat-Data-Jahit-New"){echo"active";}?>">
              <a href="#"><i class="fa fa-file-o"></i> <span>Laporan Jahit</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Input-Lap-Jahit-New" or $_GET['p']=="Lihat-Data-Jahit-New"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="LapJahitNew"><i class="fa fa-file-text text-orange"></i> <span>Lap Jahit</span></a></li>
              </ul>
            </li>
            <li class="treeview <?php if($_GET['p']=="Input-Lap-Krah-New" or $_GET['p']=="Lihat-Data-Lap-Krah-New"){echo"active";}?>">
              <a href="#"><i class="fa fa-folder"></i> <span>Krah</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Input-Lap-Krah-New" or $_GET['p']=="Lihat-Data-Lap-Krah-New"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="LapKrahNew"><i class="fa fa-file-text"></i> <span>Lap Krah</span></a></li>
              </ul>
            </li>
            <li class="treeview <?php if($_GET['p']=="Input-Lap-Packing-New" or $_GET['p']=="Lihat-Data-Lap-Packing" or $_GET['p']=="Input-Sisa-Lap-Packing"){echo"active";}?>">
              <a href="#"><i class="fa fa-gear"></i> <span>Packing</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Input-Lap-Packing-New" or $_GET['p']=="Lihat-Data-Lap-Packing"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="LapPackingNew"><i class="fa fa-file-text"></i> <span>Lap Packing</span></a></li>
                <li class="<?php if($_GET['p']=="Input-Sisa-Lap-Packing"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="SisaSiapPacking"><i class="fa fa-file-text"></i> <span>Sisa Siap Packing</span></a></li>
              </ul>
            </li>
            <li class="treeview <?php if($_GET['p']=="Input-Lap-FirstLot-New" or $_GET['p']=="Lihat-Data-Lap-FirstLot-New" or $_GET['p']=="Lap-Potong-New"){echo"active";}?>">
              <a href="#"><i class="fa fa-cube"></i> <span>First Lot</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Input-Lap-FirstLot-New" or $_GET['p']=="Lihat-Data-Lap-FirstLot-New"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="FirstLotNew"><i class="fa fa-file-text"></i> <span>Laporan First Lot</span>
                  <span class="pull-right-container">
                    <?php 
                    $today = date('Y-m-d');
                    $sqlrow= mysqli_query($con,"SELECT COUNT(*) as cnt FROM tbl_firstlot
                    WHERE tgl_expired < '$today' AND tgl_expired!='0000-00-00'");
                    $r = mysqli_fetch_array($sqlrow);
                    ?>
                  <small class="label pull-right bg-red"><?php echo $r['cnt'];?></small>
                  </span>
                </a></li>
                <li class="<?php if($_GET['p']=="Lap-Potong-New"){echo "active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="Lap-PotongNew"><i class="fa fa-file-text text-orange"></i> <span>Laporan Potong</span>
                  <span class="pull-right-container">
                    <?php 
                    $sqlr= mysqli_query($con,"SELECT COUNT(*) as cnt FROM tbl_potong");
                    $r1 = mysqli_fetch_array($sqlr);
                    ?>
                    <small class="label pull-right bg-red"><?php echo $r1['cnt'];?></small>
                  </span>
                </a></li>
              </ul>
            </li>
            <li class="treeview <?php if($_GET['p']=="Stiker_Custom"){echo"active";}?>">
              <a href="#"><i class="fa fa-tag"></i> <span>Sticker Custom</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($_GET['p']=="Stiker_Custom"){echo"active";} ?> <?php if($_SESSION['akses']=="biasa"){echo "hidden";} ?>"><a href="StikerCustom"><i class="fa fa-file-text"></i> <span>Stiker Custom</span></a></li>
              </ul>
            </li>
		      <?php } ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content container-fluid">
      <?php
          if(!empty($page) and !empty($act)){
            $files = 'pages/'.$page.'.'.$act.'.php';
          } else
          if(!empty($page)){
            $files = 'pages/'.$page.'.php';
          } else {
            $files = 'pages/home.php';
          }

          if(file_exists($files)){
            include ($files);
          } else {
            include ("blank.php");
          }
          ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      DIT
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="#">Indo Taichen Textile Industry</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <!--
  <aside class="control-sidebar control-sidebar-dark">

    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>

    <div class="tab-content">

      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>


        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>


      </div>

      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>

      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>

        </form>
      </div>

    </div>
  </aside>
  -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- Chart JS-->
<script type="text/javascript" src="pages/cetak/chartjs/Chart.js"></script>	
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Signature -->
<script src="bower_components/signature/jquery.signature.min.js"></script>
<script src="bower_components/signature/jquery.ui.touch-punch.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- start - This is for export functionality only -->
    <script src="bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/buttons.flash.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/jszip.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/pdfmake.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/vfs_fonts.js"></script>
    <script src="bower_components/datatables.net-bs/js/buttons.html5.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script src="bower_components/toast-master/js/jquery.toast.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<?php if ($_GET['p'] == "Lap-GantiKain" OR $_GET['p'] == "Lap-Retur" OR $_GET['p'] == "Summary-Order" OR $_GET['p'] == "Lihat-Data-Cwarna-Dye-New" OR $_GET['p'] == "Lihat-Data-Cwarna-Fin-New" OR $_GET['p'] == "Lihat-Data-Jahit" OR $_GET['p']=="Lap-Potong" OR $_GET['p']=="Input-Sisa-Lap-Packing") : ?>
  <script src="bower_components/xeditable/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<?php endif; ?>

<script>
//turn to popup mode
$.fn.editable.defaults.mode = 'inline';
    $(document).ready(function() {
      //Aftersales Ganti Kain
      $('.statusgk').editable({
        type: 'select',
        url: 'pages/editable/editable_status.php',
        showbuttons : false,
        source:[{value: "OK", text: "OK"}, {value: "BELUM OK", text: "BELUM OK"}]
      });
      $('.statusgk2').editable({
        type: 'select',
        url: 'pages/editable/editable_status.php',
        showbuttons : false,
        source:[{value: "On Progress", text: "On Progress"}, {value: "Closed", text: "Closed"}, {value: "Cancel", text: "Cancel"}]
      });
      $('.newordergk').editable({
        type: 'text',
        url: 'pages/editable/editable_neworder.php',
      });
      $('.status1').editable({
        type: 'text',
        url: 'pages/editable/editable_status1.php',
      });
      $('.status2').editable({
        type: 'text',
        url: 'pages/editable/editable_status2.php',
      });
      $('.status3').editable({
        type: 'text',
        url: 'pages/editable/editable_status3.php',
      });
      //Aftersales Retur
      $('.statusrt2').editable({
        type: 'select',
        url: 'pages/editable/editable_statusrt.php',
        showbuttons : false,
        source:[{value: "On Progress", text: "On Progress"}, {value: "Closed", text: "Closed"}, {value: "Cancel", text: "Cancel"}]
      });
      $('.neworderrt').editable({
        type: 'text',
        url: 'pages/editable/editable_neworderrt.php',
      });
      $('.status1rt').editable({
        type: 'text',
        url: 'pages/editable/editable_status1rt.php',
      });
      $('.status2rt').editable({
        type: 'text',
        url: 'pages/editable/editable_status2rt.php',
      });
      $('.status3rt').editable({
        type: 'text',
        url: 'pages/editable/editable_status3rt.php',
      });
      //Bon Penghubung
      $('.sts_aksi').editable({
        type: 'select',
        url: 'pages/editable/editable_stsaksi.php',
        showbuttons : false,
        disabled : false,
        source:[{value: "", text: ""}, {value: "Hold", text: "Hold"}, {value: "Tidak Proses", text: "Tidak Proses"}, {value: "Siapkan Greig", text: "Siapkan Greig"}]
      });
      $('.editor').editable({
        type: 'text',
        disabled : false,
        url: 'pages/editable/editable_editor.php',
      });
      $('.sts_ppc').editable({
        type: 'select',
        url: 'pages/editable/editable_stsppc.php',
        showbuttons : false,
        disabled : false,
        source:[{value: "", text: ""}, {value: "Yohana", text: "Yohana"}]
      });
      //Cocok Warna Dye
      $('.sts_warna').editable({
        type: 'select',
        url: 'pages/editable/editable_stswarna.php',
        showbuttons : false,
        disabled : false,
        source:[{value: "", text: ""}, {value: "OK", text: "OK"}, {value: "TOLAK BASAH", text: "TOLAK BASAH"}]
      });
      $('.colorist_qcf').editable({
        type: 'select',
        url: 'pages/editable/editable_colorist_qcf.php',
        disabled : false,
        showbuttons : false,
        source:[{value: "", text: ""}, {value: "AGUNG", text: "AGUNG"}, {value: "AGUS", text: "AGUS"}, {value: "ANDI", text: "ANDI"}, {value: "DEWI", text: "DEWI"}, {value: "RUDI", text: "RUDI"}]
      });
      $('.ket_cdye').editable({
        type: 'text',
        disabled : false,
        url: 'pages/editable/editable_ket_cdye.php',
      });
      $('.disposisi_cdye').editable({
        type: 'text',
        disabled : false,
        url: 'pages/editable/editable_disposisi_cdye.php',
      });
      //Cocok Warna Fin
      $('.sts_fin').editable({
        type: 'select',
        url: 'pages/editable/editable_stsfin.php',
        showbuttons : false,
        disabled : false,
        source:[{value: "", text: ""}, {value: "OK", text: "OK"}, {value: "BW", text: "BW"}, {value: "TBD", text: "TBD"}]
      });
      $('.code_proses').editable({
        type: 'select',
        url: 'pages/editable/editable_codeproses.php',
        showbuttons : false,
        disabled : false,
        source:[{value: "", text: ""}, {value: "Fin", text: "Fin"}, {value: "Fin 1X", text: "Fin 1X"}, {value: "Pdr", text: "Pdr"}, {value: "Oven", text: "Oven"}, {value: "Comp", text: "Comp"}, {value: "Setting", text: "Setting"}, {value: "AP", text: "AP"}, {value: "PB", text: "PB"}]
      });
      $('.ket_fin').editable({
        type: 'text',
        disabled : false,
        url: 'pages/editable/editable_ket_fin.php',
      });
      $('.colorist_qcf_fin').editable({
        type: 'select',
        url: 'pages/editable/editable_colorist_qcf_fin.php',
        disabled : false,
        showbuttons : false,
        source:[{value: "", text: ""}, {value: "AGUNG", text: "AGUNG"}, {value: "AGUS", text: "AGUS"}, {value: "ANDI", text: "ANDI"}, {value: "DEWI", text: "DEWI"}, {value: "RUDI", text: "RUDI"}]
      });
      $('.disposisi_fin').editable({
        type: 'text',
        disabled : false,
        url: 'pages/editable/editable_disposisi_fin.php',
      });
      //Lap Jahit
      $('.sts_jahit').editable({
        type: 'select',
        url: 'pages/editable/editable_stsjahit.php',
        showbuttons : false,
        disabled : false,
        source:[{value: "", text: ""}, {value: "OK", text: "OK"}, {value: "BEDA WARNA", text: "BEDA WARNA"}, {value: "BELUM OK", text: "BELUM OK"}]
      });
      $('.ket_jahit').editable({
        type: 'text',
        disabled : false,
        url: 'pages/editable/editable_ket_jahit.php',
      });
      $('.shift_jahit').editable({
        type: 'select',
        url: 'pages/editable/editable_shiftjahit.php',
        showbuttons : false,
        disabled : false,
        source:[{value: "", text: ""}, {value: "A", text: "A"}, {value: "B", text: "B"}, {value: "C", text: "C"}]
      });
      $('.lot_body').editable({
        type: 'text',
        disabled : false,
        url: 'pages/editable/editable_lot_body.php',
      });
      $('.colorist_qcf_jahit').editable({
        type: 'select',
        url: 'pages/editable/editable_colorist_qcf_jahit.php',
        disabled : false,
        showbuttons : false,
        source:[{value: "", text: ""}, {value: "AGUNG", text: "AGUNG"}, {value: "AGUS", text: "AGUS"}, {value: "ANDI", text: "ANDI"}, {value: "DEWI", text: "DEWI"}, {value: "RUDI", text: "RUDI"}]
      });
      $('.disposisi_jahit').editable({
        type: 'text',
        disabled : false,
        url: 'pages/editable/editable_disposisi_jahit.php',
      });
      //Lap Potong
      $('.cmtinternal').editable({
        type: 'text',
        url: 'pages/editable/editable_cmtinternal.php',
      });
      //Sisa Siap Packing
      $('.sisa_packing').editable({
        type: 'text',
        url: 'pages/editable/editable_sisapacking.php',
      });
    })
</script>
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
  //Date picker
  $('#datepicker4').datepicker({
      autoclose: true,
	  format: 'yyyy-mm-dd',
	  todayHighlight: true,
    }) 
</script>
<script type="text/javascript" >
        $(function() {
            $(".delcwarnafin").click(function() {
                var del_id = $(this).attr("id");
                var info = 'id=' + del_id;
                if (confirm("Sure you want to delete this data? This cannot be undone later.")) {
                    $.ajax({
                        type : "POST",
                        url : "pages/hapusdatacwarnafin.php", //URL to the delete php script
                        data : info,
                        success : function() {
                        }
                    });
                    $(this).parents(".record").animate("fast").animate({
                        opacity : "hide"
                    }, "slow");
                }
                return false;
            });
        });
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
  $('#example7').DataTable({
	  'scrollX'  : true,
	  'paging': true,

	})
  $('#example8').DataTable({
	 'scrollX'	: true,
	 dom: 'Bfrtip',
      buttons: [
            {extend : 'excel', footer: true },
	  {
        orientation: 'portrait',
        pageSize: 'LEGAL',
        extend: 'pdf',
        footer: true,
				},
        ]
	})
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
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
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
$(document).on('click', '.posisi_kktq', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/posisikktq.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#PosisiKKTQ").html(ajaxData);
         $("#PosisiKKTQ").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.edit_retur', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/retur_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#EditRetur").html(ajaxData);
         $("#EditRetur").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.edit_tpukpe', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/tpukpe_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#EditTPUKPE").html(ajaxData);
         $("#EditTPUKPE").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.edit_lkpp', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/lkpp_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#EditLKPP").html(ajaxData);
         $("#EditLKPP").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.stsgk_edit', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/stsgk_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StsGKEdit").html(ajaxData);
         $("#StsGKEdit").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.stsaksi_edit', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/stsaksi_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StsAksiEdit").html(ajaxData);
         $("#StsAksiEdit").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.stsaksippc_edit', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/stsaksippc_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StsAksiPPCEdit").html(ajaxData);
         $("#StsAksiPPCEdit").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.stsrt_edit', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/stsrt_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StsRTEdit").html(ajaxData);
         $("#StsRTEdit").modal('show',{backdrop: 'true'});
       }
     });
    });
$(document).on('click', '.cwarnafin_edit', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/cwarnafin_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#CWarnaFinEdit").html(ajaxData);
         $("#CWarnaFinEdit").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.cwarnadye_edit', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/cwarnadye_edit.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#CWarnaDyeEdit").html(ajaxData);
         $("#CWarnaDyeEdit").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.detail_mutasi', function (e) {
  var m = $(this).attr("id");
  var a = $(this).attr("tgl1");
  var b = $(this).attr("tgl2");
  var c = $(this).attr("shift");
  var d = $(this).attr("satuan");
    $.ajax({
       url: "pages/detail_mutasi.php",
       type: "GET",
       data : {id: m, tgl1: a, tgl2: b, shift: c, satuan: d,},
       success: function (ajaxData){
         $("#DetailMutasi").html(ajaxData);
         $("#DetailMutasi").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.detail_mutasi_p', function (e) {
  var m = $(this).attr("id");
  var a = $(this).attr("tgl1");
  var b = $(this).attr("tgl2");
  var c = $(this).attr("shift");
  var d = $(this).attr("satuan");
    $.ajax({
       url: "pages/detail_mutasi_p.php",
       type: "GET",
       data : {id: m, tgl1: a, tgl2: b, shift: c, satuan: d,},
       success: function (ajaxData){
         $("#DetailMutasiP").html(ajaxData);
         $("#DetailMutasiP").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.detail_mutasi_m', function (e) {
  var m = $(this).attr("id");
  var a = $(this).attr("tgl1");
  var b = $(this).attr("tgl2");
  var c = $(this).attr("shift");
  var d = $(this).attr("satuan");
    $.ajax({
       url: "pages/detail_mutasi_m.php",
       type: "GET",
       data : {id: m, tgl1: a, tgl2: b, shift: c, satuan: d,},
       success: function (ajaxData){
         $("#DetailMutasiM").html(ajaxData);
         $("#DetailMutasiM").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.update_spectro', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/update_spectro.php",
          type: "GET",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#UpdateSpectro").html(ajaxData);
            $("#UpdateSpectro").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });
$(document).on('click', '.detailpersediaankain', function (e) {
  var m = $(this).attr("id");
  var k = $(this).attr("ket");
    $.ajax({
       url: "pages/detailpersediaankain.php",
       type: "GET",
       data : {id: m, ket: k,},
       success: function (ajaxData){
         $("#DetailPersediaanKain").html(ajaxData);
         $("#DetailPersediaanKain").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.tambah_hangtag', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/tambah_hangtag.php",
          type: "POST",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#TambahHangtag").html(ajaxData);
            $("#TambahHangtag").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });
$(document).on('click', '.edit_hangtag', function(e) {
        var m = $(this).attr("id");
        $.ajax({
          url: "pages/edit_hangtag.php",
          type: "GET",
          data: {
            id: m,
          },
          success: function(ajaxData) {
            $("#EditHangtag").html(ajaxData);
            $("#EditHangtag").modal('show', {
              backdrop: 'true'
            });
          }
        });
      });
$(document).on('click', '.detailkeluarkain', function (e) {
  var m = $(this).attr("id");
  var k = $(this).attr("ket");
    $.ajax({
       url: "pages/detailkainkeluar.php",
       type: "GET",
       data : {id: m, ket: k,},
       success: function (ajaxData){
         $("#DetailKainKeluar").html(ajaxData);
         $("#DetailKainKeluar").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_fla', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_fla.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdFla").html(ajaxData);
         $("#StdFla").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_fib', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_fib.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdFib").html(ajaxData);
         $("#StdFib").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_hs', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_hs.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdHs").html(ajaxData);
         $("#StdHs").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_prt', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_prt.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdPrt").html(ajaxData);
         $("#StdPrt").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_ss', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_ss.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdSs").html(ajaxData);
         $("#StdSs").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_bs', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_bs.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdBs").html(ajaxData);
         $("#StdBs").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_fwe', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_fwe.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdFwe").html(ajaxData);
         $("#StdFwe").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_fwi', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_fwi.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdFwi").html(ajaxData);
         $("#StdFwi").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_sr', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_sr.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdSr").html(ajaxData);
         $("#StdSr").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_ff', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_ff.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdFf").html(ajaxData);
         $("#StdFf").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_sp', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_sp.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdSp").html(ajaxData);
         $("#StdSp").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_bb', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_bb.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdBb").html(ajaxData);
         $("#StdBb").modal('show',{backdrop: 'true'});
       }
     });
      });	
$(document).on('click', '.std_pm', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_pm.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdPm").html(ajaxData);
         $("#StdPm").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_ph', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_ph.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdPh").html(ajaxData);
         $("#StdPh").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_wash', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_wash.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdWash").html(ajaxData);
         $("#StdWash").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_pac', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_pac.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdPac").html(ajaxData);
         $("#StdPac").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_pal', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_pal.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdPal").html(ajaxData);
         $("#StdPal").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_wat', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_wat.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdWat").html(ajaxData);
         $("#StdWat").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_cr', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_cr.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdCr").html(ajaxData);
         $("#StdCr").modal('show',{backdrop: 'true'});
       }
     });
      });	
$(document).on('click', '.std_py', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_py.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdPy").html(ajaxData);
         $("#StdPy").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_lf', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_lf.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdLf").html(ajaxData);
         $("#StdLf").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_cm', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_cm.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdCm").html(ajaxData);
         $("#StdCm").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_lp', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_lp.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdLp").html(ajaxData);
         $("#StdLp").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_sl', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_sl.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdSl").html(ajaxData);
         $("#StdSl").modal('show',{backdrop: 'true'});
       }
     });
      });	
$(document).on('click', '.std_abs', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_abs.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdAbs").html(ajaxData);
         $("#StdAbs").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_wic', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_wic.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdWic").html(ajaxData);
         $("#StdWic").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_dry', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_dry.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdDry").html(ajaxData);
         $("#StdDry").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.std_wr', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/std_wr.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#StdWr").html(ajaxData);
         $("#StdWr").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.gambardisposisi', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/pic_disposisi.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#PicDisp").html(ajaxData);
         $("#PicDisp").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.gambardisposisi2', function (e) {
  var m = $(this).attr("id");
    $.ajax({
       url: "pages/pic_disposisi2.php",
       type: "GET",
       data : {id: m,},
       success: function (ajaxData){
         $("#PicDisp2").html(ajaxData);
         $("#PicDisp2").modal('show',{backdrop: 'true'});
       }
     });
      });									
</script>
       <script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- bootstrap time picker -->

<script src="dist/js/adminlte.min.js"></script>
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
<script type="text/javascript">
      $(function() {
        startTime();
        $(".center").center();
        $(window).resize(function() {
          $(".center").center();
        });
      });

      /*  */
      function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();

        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);

        //Check for PM and AM
        var day_or_night = (h > 11) ? "PM" : "AM";

        //Convert to 12 hours system
        if (h > 12)
          h -= 12;

        //Add time to the headline and update every 500 milliseconds
        $('#time').html(h + ":" + m + ":" + s + " " + day_or_night);
        setTimeout(function() {
          startTime()
        }, 500);
      }

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }

      /* CENTER ELEMENTS IN THE SCREEN */
      jQuery.fn.center = function() {
        this.css("position", "absolute");
        this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
          $(window).scrollTop()) - 30 + "px");
        this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
          $(window).scrollLeft()) + "px");
        return this;
      }

    </script>
    <script>
    $(document).ready(function() {
        "use strict";
        // toat popup js
        $.toast({
          heading: 'Selamat Datang',
          text: 'QC-Final Indo Taichen',
          position: 'bottom-right',
          loaderBg: '#2391e3',
          icon: 'success',
          hideAfter: 3500,
          stack: 6
        })


      });
    </script>
    
