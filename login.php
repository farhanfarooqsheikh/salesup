<?php
require_once"connection.php";
if(isset($_SESSION["loggedin"]) && !empty( $_SESSION["id"])){
    if ($_SESSION['id']==="admin") 
    {
        header("location: index.php");
    die();
    }
    else {
        header("location:user-dash.php");
        die();
    }
}

require_once"connection.php";// for db connection
   
if(isset($_POST['sbtn']))
    {
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $result=mysqli_query($con,"SELECT * from employees where email='$email' and password='$password'");
        //echo "SELECT * from employees where 'email'='$email' and 'password'='$password'";
        if(mysqli_num_rows($result)>0)
        {

            $data=mysqli_fetch_array($result);
            $id=$data['designation'];
            $empcode=$data['id'];
            session_start();
                                      
             // Store data in session variables 
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;//designation
              $_SESSION["empcode"]=$empcode;//id
              $crtdate=mysqli_query($con,"SELECT * FROM attendance where emp_code=$empcode");
              //echo "SELECT * FROM attendance where emp_code=$empcode";
              //die();
              if(mysqli_num_rows($crtdate)>0){
                while($dt=mysqli_fetch_array($crtdate)){
                  $date=$dt['created'];
                  $attendanceid=$dt['attendance_id'];
                  
                }
              }
             
             $curdate=date('Y-m-d');
          
                if($date!=$curdate){
         
                  
                   $sql="INSERT INTO attendance(emp_code,created,status,pa)values('$empcode','$curdate','checkedin','present')";
                       if( mysqli_query($con,$sql))
                       {
                         $last_id = mysqli_insert_id($con);
 
                         $_SESSION['attendance-id']=$last_id;
                        }

                }
                else{
                 $l="update attendance set status='checkedin',check_out=NULL where attendance_id='$attendanceid'";
                  if( mysqli_query($con,$l))
                       {
                    
 
                         $_SESSION['attendance-id']=$attendanceid;
                        }
                  
                }

            



              if($id=='admin'){
                  header("location:index.php");
                  die();

              }
              else{
              header("location:user-dash.php");
              die();
            }

 
        }
        else
      {
            echo "<script>alert('Incorrect Details');</script>";
       }



    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sales Up | Log in</title>

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
  <div class="login-logo">
    <a href="index.html"><b>Sales</b>Up</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign In</p>

      <form  id="quickForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
<!--           <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="sbtn" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        
      },
     
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        
      },
      
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>