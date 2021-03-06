<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sales Up | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notification Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
        
              <div class="media-body">

                <h3 class="dropdown-item-title">
                  Adnan
                  
                </h3>
                <p class="text-sm">Added order</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
       
            <div class="media">
              
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Sajid
                 
                </h3>
                <p class="text-sm">Received Payment</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          
          </a>
         
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      
     </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="#" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sales Up</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                Live Tracking
                
              </p>
            </a>
          </li>       
          <li class="nav-item menu-open">
            <a href="index.html" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
           <li class="nav-item">
            <a href="employees.html" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Employees
                
              </p>
            </a>
          </li>  
         <li class="nav-item">
            <a href="product.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Products
               
                
              </p>
            </a>

          </li>

          <li class="nav-item">
            <a href="parties.html" class="nav-link">
              <i class="nav-icon fas fa-user-secret"></i>
              <p>
                Parties
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Orders
                 <i class="fas fa-angle-left right"></i>

              </p>

            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="orders.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="zero-orders.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Zero orders</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="collection.html" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Collections
                 <i class="fas fa-angle-left right"></i>

              </p>

            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="oustandings.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Outstanding List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="collection.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cash Collection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pdc.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PDC</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-delicious"></i>
              <p>
                EXPENSES
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-volume-up"></i>
              <p>
                Annoucements
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salesman Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>order reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expenses Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collection Reports </p>
                </a>
              </li>
            </ul>
          </li>
          
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Employee</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Basic Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start here -->
              <form method="POST" id="quickform">
                <div class="card-body">
                  <!-- <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="Enter Name">
                  </div> 
                  <div class="form-group">
                    <label for="bday">Bith Date</label>
                    <input type="date" name="birthday" class="form-control" id="" placeholder="">
                  </div> 
                  <div class="form-group">
                    <label for="gender">Gender</label>
                        <div class="form-check-inline">
                         <label class="form-check-label" for="gender">
                           <input type="radio" class="form-check-input" id="gender" name="gender" value="male" checked>Male
                          </label>
                         </div>
                        <div class="form-check-inline">
                         <label class="form-check-label" for="gender">
                           <input type="radio" class="form-check-input" id="gender" name="gender" value="female" checked>Female
                          </label>
                         </div>
                  </div>                    
                  <div class="form-group">
                    <label for="fname">Father/Spouse Name</label>
                    <input type="text" name="fname" class="form-control" id="" placeholder="Enter Father/Spouse Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Upload PhotoGraph</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="photo"class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

  
            </div>
            <!-- /.card -->

            <!-- general form elements -->
            <!-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Company Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- <div class="card-body">
                   <div class="form-group">
                    <label for="Employeecode ">Employee Code </label>
                    <input type="text" class="form-control" id="" placeholder="Employee Code ">
                  </div> 
                  <div class="form-group " id="alertDesignation">
                      <label for="designation">Designation</label>
                      <select name="designation" class="form-control select2 select2-hidden-accessible" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Designation</option>
                        <option value="309">Admin</option>
                        <option value="349">Area Sales Officer</option>
                      </select>
            
                      </div>
                  <div class="form-group">
                    <label for="salary ">Salary </label>
                    <input type="text" name="salary"class="form-control" id="" placeholder="Salary ">
                  </div>

                  <div class="form-group">
                    <label for="doj ">Date of Joining  </label>
                    <input type="Date" name="doj" class="form-control" id="" placeholder=" ">
                  </div> 

              </div> -->
              <!-- /.card-body -->
            </div> -->
            <!-- /.card -->

            <!-- Input addon -->
            <!-- <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Bank Account Details</h3>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label for="ahn ">Account Holder Name </label>
                    <input type="text" name="accname" class="form-control" id="" placeholder="Account Holder Name ">
                  </div> 
                  <div class="form-group">
                    <label for="ahn ">Account Number </label>
                    <input type="text" name="accnumber" class="form-control" id="" placeholder="Account Number ">
                  </div> 
                  <div class="form-group">
                    <label for="ahn ">Bank Name </label>
                    <input type="text" name="bank" class="form-control" id="" placeholder="Bank Name ">
                  </div> 
                  <div class="form-group">
                    <label for="ahn ">Bank Branch </label>
                    <input type="text" name="branch" class="form-control" id="" placeholder="Bank Branch ">
                  </div> 
                  <div class="form-group">
                    <label for="ifsc ">IFSC Code </label>
                    <input type="text" name="ifscnumber" class="form-control" id="" placeholder="Ifsc ">                
                  </div> 
                  <div class="form-group">
                    <label for="pan">Pan Number </label>
                    <input type="text" name="pannumber" class="form-control" id="" placeholder="Pan Number ">
                  </div> 

              </div>
              <!-- /.card-body -->
            </div> -->


          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Account Login</h3>
              </div>
              <div class="card-body">
                  <!-- <div class="form-group">
                    <label for="mobile ">Mobile Number </label>
                    <input type="text" name="pnumber" class="form-control" id="" placeholder="Mobile Number ">
                  </div>   -->
                  <div class="form-group">
                    <label for="email ">Email  </label>
                    <input type="email" name="email" class="form-control" id="" placeholder="Enter Email Address">
                  </div>  
                  <div class="form-group">
                    <label for="password ">Password </label>
                    <input type="password"  name="password" class="form-control" id="" placeholder="Enter Password ">
                  </div> 
                  <!-- <div class="form-group">
                    <label for="passwordcnf ">Confirm Password </label>
                    <input type="password" class="form-control" id="" placeholder="Confirm Password ">
                  </div>                                -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Address Details</h3>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label for="Address ">Permanant Address </label>
                    <input type="text" name="adress" class="form-control" name="address" id="" placeholder="Enter Address ">
                  </div>       
                   <div class="form-group-inline">
                    <label for="City ">City </label>
                    <input type="text" name="city" class="form-control" id="" placeholder="Enter City ">
                  </div>            
                  <div class="form-group-inline">
                    <label for="state ">State </label>
                    <input type="text" name="state" class="form-control" id="" placeholder="Enter State ">
                  </div>                                                  
                   <div class="form-group-inline">
                    <label for="Emergency ">Emergency Contact Number </label>
                    <input type="text" class="form-control" id="" placeholder="Enter Emergency Contact Number ">
                  </div>                                                                   
              </div>
              /.card-body -->
            <!-- </div> -->
            <!-- /.card -->

            <!-- general form elements disabled -->
            <!-- <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Documents</h3> -->
              </div> -->
              <!-- /.card-header -->
              <!-- <div class="card-body">
                <label for="resume ">Resume </label>
                    <div class="custom-file">

                      <input type="file"  name="resume" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                <label for="Adhaar ">Id Proof </label>
                    <div class="custom-file">

                      <input type="file" name="idproof" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                <label for="Pancard ">Address Proof</label>
                    <div class="custom-file">

                      <input type="file" name="adressproof"class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                 <label for="agreement ">Contract/Offer Letter </label>
                    <div class="custom-file">

                      <input type="file" name="agreement" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

              </div> -->
              <div class="card-footer">
                  <button  type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->

            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">Sales Up App</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0 beta
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickform').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },

    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      
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

</body>
</html>
<?php 
  IF(isset($_POST['submit']))
  {
     $con=mysqli_connect("localhost", "root", "", "salesup");
     mysqli_query($con, " insert into employees(
      name,
      birthday,
      gender,
      fname,
      photo,
      pnumber,
      email,
      password,
      designation,
      adress,
      city,
      state,
      salary,
      accnumber,
      bank,
      accname,
      ifsccode,
      pannumber,
      branch,
      agreement,
      idproof,
      adressproof,
      resume
      ) values 
      ('".$_POST['name']."',
      '".$_POST['birthday']."',
      '".$_POST['gender']."',
     '".$_POST[ 'fname']."',
     '".$_POST[ 'photo']."',
     '". $_POST['pnumber']."',
     '".$_POST[ 'email']."',
    '". $_POST[ 'password']."',
     '".$_POST[ 'designation']."',
    '". $_POST[ 'adress']."',
     '".$_POST[ 'city']."',
     '".$_POST[ 'state']."',
     '".$_POST[ 'salary']."',
    '".$_POST[  'accnumber']."',
    '". $_POST[ 'bank']."',
    '". $_POST[ 'accname']."',
    '". $_POST[ 'ifscnumber']."',
     '".$_POST[ 'pannumber']."',
     '".$_POST[ 'branch']."',
     '".$_POST[ 'agreement']."',
    '". $_POST[ 'idproof']."',
     '".$_POST[ 'adressproof']."',
    '". $_POST[ 'resume']."'



    )");


  }


?>  