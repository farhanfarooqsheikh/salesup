<?php
session_start();
if(!isset($_SESSION['loggedin']) ){

   echo "<script> document.location.href='login.php';</script>";
} 
elseif ($_SESSION['id']!="admin") {
 echo "<script> document.location.href='user-dash.php';</script>";
}

// SELECT * FROM employees JOIN orders  on employees.id = orders.salesid where id=1
// SELECT * FROM orders JOIN employees   on employees.id = orders.salesid JOIN parties on orders.partyid=parties.partyid
require_once"connection.php";
require_once"top.php";


if(isset($_GET['btn'])){
    $salesid=$_GET['emp'];
    $sql="SELECT * FROM location where salesid='$salesid' order by lid desc limit 1";

    $data=mysqli_query($con,$sql);
    if (mysqli_num_rows($data) > 0) {
    
    while ($lr=mysqli_fetch_array($data)) {
         $lat=$lr['lat'];
      $lang=$lr['lang'];
        # code...
    }
 
   } 


}
    

?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>SalesMan location</h1>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Location</li>
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
      
         
            <div class="col-lg-8">
            <div class="form-group">
            <label>Select Sales Person</label>
            <select name="emp" id="emp" class="form-control select2bs4" required >
                 
                    <?php
                    $empdetails=mysqli_query($con,"Select * from employees");

                       while ($emp= mysqli_fetch_array($empdetails)) {
                             ?> 
                        
                        <option value='<?php echo $emp['id'];?>'> <?php echo $emp['name'] ?></option> 
                       <?php
                       }

                    ?>
                  </select>
                
            </div>
            </div>
            <div class="col-lg-4">
<div class="form-group">
     <button type="submit" class="btn btn-success" name="btn" >Submit</button>
     </div>
     <!-- </div>
            </div> -->
 </div>  
   </form> 


              </div>                

                                 <div class="card-body " id="lt">
                                    <div class="row">
                                        
                                            <div class="col-6">
                                                 <a href="https://www.openstreetmap.org/?mlat=<?php echo $lat;?>&mlon=<?php echo $lang;?>#map=14/<?php echo $lat;?>/<?php echo $lang;?>&layers=H">
                                    <button type="button" class="btn btn-success btn-lg">View On Open Street</button><br>
                                            </div>
                                   <div class="col-6">
                                                 <a href="http://maps.google.com/maps?z=12&t=m&q=loc:<?php echo $lat;?>+<?php echo $lang;?>">
                                    <button type="button" class="btn btn-success btn-lg">View On Google Maps</button><br>
                                            </div>

                                
                                    </div>
  
                                 </div>


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