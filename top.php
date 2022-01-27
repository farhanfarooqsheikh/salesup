<?php  include_once "session.php"  




?>
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
  <!--own css-->
  <link rel="stylesheet" type="text/css" href="dist/css/style.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
<!--   <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
 -->  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

<link rel="stylesheet" href="plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
            <script>
            var x = document.getElementById("coordinates");

            function getLocation() {
              if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
                setInterval(getLocation, 60000);
              } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
              }
            }

            function showPosition(position) {
              var salesid = "<?php echo $_SESSION['empcode']; ?>";
            $.ajax({
                    url: "file.php",
                    type: "post",
                    data: { lat: position.coords.latitude, long: position.coords.longitude,salesid:salesid},
                    success: function (data) {
                      var dataParsed = JSON.parse(data);
                      console.log(dataParsed);
                    }
                  });
            }
            </script>
  <!-- Bootstrap4 Duallistbox -->
</head>
<body class="hold-transition layout-fixed" onload="getLocation()">
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
    <!-- <ul class="navbar-nav ml-auto"> -->
      <!-- Notification Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a> -->
        <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item"> -->
            <!-- Message Start -->
            <!-- <div class="media">
        
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
        </div> -->
      <!-- </li>
      
     </ul> -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="#" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sales Up</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item">
            <a href="livetracking.php" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                Live Tracking
                
              </p>
            </a>
          </li>       
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
           <li class="nav-item" <?php if ($_SESSION['id']!="admin"){ echo 'style="display:none;"'; } ?>>
            <a href="employees.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Employees
                
              </p>
            </a>
          </li>  
         <li class="nav-item">
            <a href="product.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Products
               
                
              </p>
            </a>

          </li>

          <li class="nav-item">
            <a href="parties.php" class="nav-link">
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
                <a href="orders.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addorder.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add orders</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item"<?php if ($_SESSION['id']!="admin"){ echo 'style="display:none;"'; } ?>>
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Suppliers
                 <i class="fas fa-angle-left right"></i>

              </p>

            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="purchase.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Add Purchase </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="purchaselist.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addsupplier.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Supplier</p>
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
                <a href="addcollection.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Collection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="collection.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cash Collection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pdc.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PDC</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="oustandings.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Outstanding List</p>
                </a>
              </li>

            </ul>
          </li>
          <!-- <li class="nav-item">
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
          </li> -->


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
              <i class="nav-icon fas fa-user"></i>
              <p>
                Salesman Reports
                <i class="right fas fa-angle-down"></i>
              </p>
            </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="attendancereport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salesmen Attendance</p>
                </a>
              </li>
              <li class="nav-item"<?php if ($_SESSION['id']!="admin"){ echo 'style="display:none;"'; } ?>>
                <a href="checkinreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Check In/Out  Reports</p>
                </a>
              </li>
                <li class="nav-item" <?php if ($_SESSION['id']=="admin"){ echo 'style="display:none;"'; } ?>>
                <a href="collectionreports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collection  Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salesman Reports </p>
                </a>
              </li>
            </ul>
            </li>
            <li class="nav-item" <?php if ($_SESSION['id']!="admin"){ echo 'style="display:none;"'; } ?>>
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Company Reports
                <i class="right fas fa-angle-down"></i>
              </p>
            </a>
                <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="monthlysalesreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Sales Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="salesreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Date Wise</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="dailysalesreport.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Sales Reports</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="collectionreports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collection  Reports</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="purchasereports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase  Reports</p>
                </a>
              </li>
            </ul>
          </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-volume-up"></i>
              <p>
                Logout
              </p>
            </a>
          </li>  
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- InputMask -->
