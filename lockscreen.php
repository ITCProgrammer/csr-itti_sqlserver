<?php
ini_set("error_reporting", 1);
session_start();
//include config
//require_once "waktu.php";
include_once ('koneksi.php');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!--alerts CSS -->
  <link href="bower_components/sweetalert/sweetalert2.css" rel="stylesheet" type="text/css">
  <!-- Sweet Alert -->
  <script type="text/javascript" src="bower_components/sweetalert/sweetalert2.min.js"></script>	
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!--<link rel="stylesheet"
        href="dist/css/font/font.css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
 <style>
	body{
		font-family: Calibri, "sans-serif", "Courier New";  /* "Calibri Light","serif" */
		font-style: normal;
	}	
 </style>	
 <link rel="icon" type="image/png" href="dist/img/logo.png">
</head>
<body class="hold-transition lockscreen ">
<?PHP
if($_POST){ //login user
	extract($_POST);
	    $username = $_SESSION['usrid'];    
		$password = mysqli_real_escape_string($con,$_POST['password']);
	$sql=mysqli_query($con,"SELECT * FROM user_login WHERE user='$username' AND password='$password' AND dept = 'QC' LIMIT 1");
	if(mysqli_num_rows($sql)>0)
	{
	$_SESSION['usrid']=$username;
	$_SESSION['pasid']=$password;
	$r = mysqli_fetch_array($sql);
	$_SESSION['lvl_id']=$r['level'];
	$_SESSION['status']=$r['status'];
	$_SESSION['foto']=$r['foto'];
	$_SESSION['ket']=$r['ket'];	
	//login_validate();
    //echo "<script>window.location='index1.php?p=Home';</script>";
    echo "<script>swal({
  title: 'Login Success!!',   
  text: 'Click Ok to continue',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    window.location='Home'; 
  }
});</script>";
	}else{
		echo "<script> swal({   
            title: 'Login Gagal!!',   
            text: ' Klik Ok untuk Login kembali',   
            type: 'warning'
        }, function(){   
            
        });</script>";
	}
}else{ 
	 
	  // echo "<script>alert('Login Gagal!! $username');window.location='index.php';</script>"; 
  	 
  
	unset($_SESSION['pasid']); }

?>
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="index1.php"><b>QC Final</b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo strtoupper($_SESSION['usrid']);?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="dist/img/<?php echo $_SESSION['foto'];?>.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post" enctype="multipart/form-data" name="form1" action="">
      <div class="input-group">
        <input type="password" name="password" class="form-control" placeholder="password">

        <div class="input-group-btn">
          <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="login">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2021 <b><a href="#" class="text-black">DIT</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
