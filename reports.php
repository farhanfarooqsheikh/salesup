<?php
session_start();
if(!isset($_SESSION['loggedin']) ){

  header("location:login.php");
 }
// SELECT * FROM employees JOIN orders  on employees.id = orders.salesid where id=1
// SELECT * FROM orders JOIN employees   on employees.id = orders.salesid JOIN parties on orders.partyid=parties.partyid
require_once"connection.php";
require_once"top.php";
$sum='';

if ($_SESSION['id']!="admin"){
  $id=$_SESSION['empcode'];
  $where="where id=$id";
}
else{
  $where="where 1";
}

if(isset($_GET['start_date']) && isset($_GET['end_date'])&& isset($_GET['emp'])){
    $fetch="SELECT * FROM orders JOIN employees   on employees.id = orders.salespersonid JOIN parties on orders.partyid=parties.partyid 
    and orders.salespersonid= '{$_GET['emp']}'  and orders.date BETWEEN  '{$_GET['start_date']}' and '{$_GET['end_date']}'";
    //  echo $fetch;
    //  die;
 

 $result = mysqli_query($con, "SELECT SUM(order_total_after_tax) AS value_sum FROM orders WHERE date BETWEEN  '{$_GET['start_date']}' and '{$_GET['end_date']}' ORDER BY orders.orderid DESC"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
}


else {
 if ($_SESSION['id']!="admin"){

    $fetch="SELECT * FROM orders JOIN employees   on employees.id = orders.salespersonid JOIN parties on orders.partyid=parties.partyid and orders.salespersonid='$id' ORDER BY orders.orderid DESC ";
    $result = mysqli_query($con, "SELECT SUM(order_total_after_tax) AS value_sum FROM orders where salespersonid=$id"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
}
else{

    $fetch="SELECT * FROM orders JOIN employees   on employees.id = orders.salespersonid JOIN parties on orders.partyid=parties.partyid ORDER BY orders.orderid DESC ";
    
    $result = mysqli_query($con, "SELECT SUM(order_total_after_tax) AS value_sum FROM orders"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];


}
}
//require_once"top.php";
$fetchresult=mysqli_query($con,$fetch);

?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>SalesMan Sales Report </h1>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sales Report</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <div class="card">
                            <div class="card-header">
                            <form class="form-inline" role="form">
            <!-- <div class="row">
            <div class="col-lg-12"> -->
                <div class="col-lg-3">
            <div class="form-group">
                <label>Start Date</label>
                <input class="form-control"name="start_date" type="date" placeholder="Enter Date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : '' ?>" required>
                
            </div>
        </div>
            <div class="col-lg-3">
            <div class="form-group">
                <label>End Date</label>
                <input class="form-control"name="end_date"  value="<?php echo isset($_GET['end_date']) ? $_GET['start_date'] : '' ?>" type="date" placeholder="Enter Date" required>
                
            </div>
            </div>
            <div class="col-lg-4">
            <div class="form-group">
            <label>Select Sales Person</label>
            <select name="emp" id="emp" class="form-control select2bs4" required >
                 
                    <?php
                    $empdetails=mysqli_query($con,"Select * from employees $where");

                       while ($emp= mysqli_fetch_array($empdetails)) {
                             ?> 
                        
                        <option value='<?php echo $emp['id'];?>'> <?php echo $emp['name'] ?></option> 
                       <?php
                       }

                    ?>
                  </select>
                
            </div>
            </div>
            <div class="col-lg-2">
<div class="form-group">
     <button type="submit" class="btn btn-success" name="btn" >Submit</button>
     </div>
     <!-- </div>
            </div> -->
 </div>  
   </form> 


              </div>                
 
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order No.</th>
                                                <th>Order Date</th>
                                                <th>Party Name</th>
                                                <th>Sales Person</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php  $a=1;
                                                      foreach($fetchresult as $r)
                                                      {
                                                        echo '<tr role="row" class="odd">';
                                                        echo'<td class="dtr-control sorting_1" tabindex="0">'.$a.'</td>';
                                                        echo '<td>'.$r['orderid'].'</td>';
                                                        echo '<td>'.$r['date'].'</td>';
                                                        echo '<td>'.$r['shopname'].'</td>';
                                                        echo '<td>'.$r['name'].'</td>';
                                                        echo '<td>'.$r['order_total_after_tax'].'</td>';
                                                       echo' <td>';
                                                        echo '<a href="vieworder.php?id='.$r['orderid'].'" class="btn btn-primary btn-sm" style="padding: 3px 6px;">
                                                        <i class="fa fa-eye"></i> </a>
                                                        <a href="editorder.php?id='.$r['orderid'].'" class="btn btn-warning btn-sm" style="padding: 3px 6px;">
                                                        <i class="fa fa-edit"></i> </a>
                                                        <a href="printpdf.php?id='.$r['orderid'].'" class="btn btn-success btn-sm" style="padding: 3px 6px;" download>
                                                        <i class="fa fa-fw fa-download"></i> </a>

                                                         </td>
                                                        
                                                        
                                                         </tr>';
                                                         $a=$a+1;
                                                      }
                                             
                                             
                                            ?>
                                             
                                             <tr>
                                            <th>Total Sale</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                           
                                            <th><?php echo $sum;?></th>
                                            </tr>
                                        </tbody>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Order No.</th>
                                                <th>Order Date</th>
                                                <th>Party Name</th>
                                                <th>Sales Person</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                            <th>Total Sale By Date</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                           
                                            <th><?php// echo $sum;?></th>

                                            </tr>
                                        </tfoot> -->
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0-rc
            </div>
  <strong>Copyright &copy; 2021 <a href="#">Sales Up App</a>.</strong>
  All rights reserved.        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>