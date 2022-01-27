
<?php
require_once"connection.php";
require_once"sendmail.php";
 $token=$_GET['token'];
 $email=$_GET['email'];
 $check=mysqli_query($con,"SELECT * from employees where email='$email' and token='$token'");
 //echo "SELECT * from employees where email='$email' and token='$token'";
 if(mysqli_num_rows($check)==0){
            echo "<script> alert('Invalid Token ');</script>";
         echo "<script> document.location.href='login.php';</script>";
        }

if(isset($_POST['sbtn'])){
  $password=md5($_POST['password']);
   $results=mysqli_query($con,"update employees set password='$password' where email='$email'");

   //echo" update employees set password='$password' where email='$email'";
    if(mysqli_affected_rows($con) >0 )
        {
           echo "<script> alert('Password Updated ');</script>";
         echo "<script> document.location.href='login.php';</script>";
        }
        }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SalesUp| Recover Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Sales</b>Up</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Enter New Password</p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="sbtn" class="btn btn-primary btn-block">Update</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
