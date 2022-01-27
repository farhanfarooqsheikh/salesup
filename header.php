<?php
require_once"header.php";



?>
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
            <a href="employees.php" class="nav-link">
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
              <li class="nav-item">
                <a href="oustandings.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Outstanding List</p>
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