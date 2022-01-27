<?php

include"connection.php";
    
session_start();
if(!isset($_SESSION['loggedin']) ){

    header("location:login.php");
   

} 
elseif ($_SESSION['id']!="admin") {
header("location:user-dash.php");

}
    require_once"top.php";
  
$sl="SELECT * FROM orders JOIN employees   on employees.id = orders.salespersonid JOIN parties on orders.partyid=parties.partyid ORDER BY orderid DESC ";
$odresult=mysqli_query($con,$sl);
$count_orders=mysqli_num_rows ( $odresult );
$pdresult=mysqli_query($con,"SELECT * FROM products");
$count_prod=mysqli_num_rows ( $pdresult );
$empresult=mysqli_query($con,"SELECT * FROM employees");
$count_emp=mysqli_num_rows ( $empresult );
$parresult=mysqli_query($con,"SELECT * FROM parties");
$count_par=mysqli_num_rows ( $parresult );
$fetch="SELECT * FROM collections join parties on parties.partyid=collections.partyid join employees on employees.id=collections.salespid and collections.mode='cash' ORDER BY cid DESC";
// echo $fetch;
// die();
$fetchresult=mysqli_query($con,$fetch);


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $count_orders;?></h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="orders.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $count_par;?></h3>

                <p>Parties</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="parties.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $count_emp;?></h3>

                <p>Employees</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="employees.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $count_prod;?></h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="product.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Latest Orders</h3>
                      
              </div>
              
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Party Name</th>
                      <th>Amount</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php  
                  $a=1;
                      foreach($odresult as $r)
                        {
                         echo '<tr role="row" class="odd">';
                        echo'<td class="dtr-control sorting_1" tabindex="0">'.$a.'</td>';
                      echo '<td>'.$r['shopname'].'</td>';
                    echo '<td>'.$r['order_total_after_tax'].'</td>';
                    echo'</tr>';
                    $a=$a+1;
                  }?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </section>
          <!-- /.Left col -->
          
          <section class="col-lg-6 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Latest Collections</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Party Name</th>
                      <th>Amount</th>
                      <th>Mode</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php  $a=1;
                                                      foreach($fetchresult as $r)
                                                      {
                                                        echo '<tr role="row" class="odd">';
                                                        echo'<td class="dtr-control sorting_1" tabindex="0">'.$a.'</td>';
                                                        echo '<td>'.$r['shopname'].'</td>';
                                                        
                                                        echo '<td>'.$r['amountreceived'].'</td>';
                                                        
                                                        echo '<td>'.strtoupper($r['mode']).'</td>';
                                                       
                                                        echo '</tr>';
                                                         $a=$a+1;
                                                      }
                                             
                                             
                                            ?>                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
require_once("footer.php");

?>