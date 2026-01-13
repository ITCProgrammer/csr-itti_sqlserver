<?php
ini_set("error_reporting", 1);
session_start();
//require_once "waktu.php";
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>CSR  | Log in</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!--alerts CSS -->
  <link href="bower_components/sweetalert/sweetalert2.css" rel="stylesheet" type="text/css">


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
  <link rel="icon" type="image/png" href="dist/img/ITTI_Logo index.ico">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <a href="index.php"><b>CSR ITTI</b></a>
    <img src="dist/img/ITTI_LogoShape.png" class="user-image" alt="User Image">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
	  <p class="login-box-msg">Sign in to start your session</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="UserName" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
         <div class="col-xs-8">
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->

      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->

</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- Sweet Alert -->
<script type="text/javascript" src="bower_components/sweetalert/sweetalert2.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
<?php
if($_POST){ //login user
  extract($_POST);
  $username = isset($_POST['username']) ? $_POST['username'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';
  $sql="SELECT TOP (1) * FROM db_qc.user_login WHERE [user]=? AND [password]=? AND (([dept] = 'QC') OR ([dept] = 'CSR' AND [level] = 'AFTERSALES'))";
  $query = sqlsrv_query($con, $sql, array($username, $password));
  if ($query === false) {
    die ("error: ".print_r(sqlsrv_errors(), true));
  }
  $r = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
  if($r)
  {
    $_SESSION['usrid']=$username;
    $_SESSION['pasid']=$password;
    $_SESSION['lvl_id']=$r['level'];
    $_SESSION['status']=$r['status'];
    $_SESSION['mamber']=$r['mamber'];
    $_SESSION['foto']=$r['foto'];
    $_SESSION['dept']=$r['dept'];
    $_SESSION['ket']=$r['ket'];
    $_SESSION['akses']=$r['akses'];
    $_SESSION['nama1']=$r['nama'];	  
    echo "<script>swal({
      title: 'Login Success!!',
      text: 'Click Ok to continue',
      type: 'success',
    }).then((result) => {
      if (result.value) {
        window.location='Home';
      }
    });</script>";
  } else {
    echo "<script> swal({
      title: 'Login Gagal!!',
      text: ' Klik Ok untuk Login kembali',
      type: 'warning'
        }, function(){
      window.location='login';
    });</script>";
  }
} else if($_GET['act']=="logout"){ //logout user
  unset($_SESSION['usrid']);
  echo "<script>swal({
    title: 'You are Logged out!!',
    text: 'Click Ok to redirect',
    type: 'success',
  }).then((result) => {
    if (result.value) {
      window.location='login';
    }
  });</script>";
}
?>
