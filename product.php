<?php

include"connection.php";
    
session_start();
if(!isset($_SESSION['loggedin']) ){

    header("location:login.php");
   
} 

    require_once"top.php";
//Shop Name Person Name Mobile  Status  Action
$result=mysqli_query($con,"SELECT * from products");
//$result= mysqli_query($con,"select * from test");
if (isset($_POST['delbtn'])) {

mysqli_query($con,"delete from products where productid='$ids'");
 echo "<script>alert('Product Deleted')</script>";
   echo "<script> document.location.href='product.php';</script>"; 

}           

?>
 <!-- Modal HTML -->
   <form method="post"> 
<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header flex-column">
        <div class="icon-box">
          <i class="fa fa-fw fa-power-off"></i>
        </div>            
        <h4 class="modal-title w-100">Are you sure?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete these records? This process cannot be undone.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
       
        <button type="submit"  name="delbtn" class="btn btn-danger">Delete </button>
        <!-- <input type="submit" name="delbtn"> -->
      </div>
    </div>
  </div>
</div>     
 </form>



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Product</li>
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
                            
                                <div class=" ml-auto d-block" >
     
                                 <button class="btn btn-success"><a href="addproduct.php"class="text-white"><i class="fa fa-plus"></i> Add Product</a></button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Qty Left</th>
                                                <th> Brand</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                                 <tbody>
                                                <?php  while ($r= mysqli_fetch_array($result)) {
                                                    echo '<tr role="row" class="odd">';
                                                    echo'<td class="dtr-control sorting_1" tabindex="0">'.$r['productid'].'</td>';
                                                    echo '<td>'.$r['productname'].'</td>';
                                                    echo '<td>'.$r['stock'].'</td>';
                                                    echo '<td>'.$r['brand'].'</td>';
                                                    echo '<td>'.$r['status'].'</td>';
                                                    echo' <td>';
                                                        echo '<a href="viewproduct.php?id='.$r['productid'].'" class="btn btn-success btn-sm" style="padding: 3px 6px;">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="editproduct.php?id='.$r['productid'].'" class="btn btn-warning btn-sm" style="padding: 3px 6px;">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="#myModal" class="trigger-btn btn btn-danger btn-sm" data-toggle="modal">
                                                                       
                                                        <i class="fa fa-trash-alt"></i>
                                                                         </a>
                                                        </td>
                                                    </tr>';
                                                    }
                                                ?>

                                                </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Qty Left</th>
                                                <th> Brand</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
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
            <strong>Copyright &copy; 2014-2020 <a href="">Sales Up</a>.</strong> All rights reserved.
        </footer>
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
