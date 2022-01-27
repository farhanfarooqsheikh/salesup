<?php

include"connection.php";
    
session_start();
if(!isset($_SESSION['loggedin']) ){

    header("location:login.php");
   

} 

    require_once"top.php";
//Shop Name Person Name Mobile  Status  Action
$result=mysqli_query($con,"SELECT * from parties");
//$result= mysqli_query($con,"select * from test");
?>
  <div class="content-wrapper">



            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <div class="card">
                            
                                <div class=" ml-auto d-block" >
     
                                 <button class="btn btn-success"><a href="addparties.php"class="text-white"><i class="fa fa-plus"></i> Add Party</a></button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Party</th>
                                                <th>Address</th>
                                                <th>Mobile</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                    <?php  
                    while ($r= mysqli_fetch_array($result)) {
                      echo '<tr role="row" class="odd">';
                      echo'<td class="dtr-control sorting_1" tabindex="0">'.$r['partyid'].'</td>';
                      echo '<td>'.strtoupper($r['shopname']).'</td>';
                      echo '<td>'.strtoupper($r['partyadress']).'</td>';
                      echo '<td>'.strtoupper($r['partymob']).'</td>';
                      
                      echo '<td>'.strtoupper($r['status']).'</td>';
                    
                      echo' <td>';
                      echo '<a href="viewparty.php?id='.$r['partyid'].'" class="btn btn-success btn-sm" style="padding: 3px 6px;">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a href="editparty.php?id='.$r['partyid'].'" class="btn btn-warning btn-sm" style="padding: 3px 6px;">
                        <i class="fa fa-edit"></i>
                      </a>
                    </td>
                  </tr>';
                }
                  ?>
                  </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>#</th>
                                                <th>Party</th>
                                                <th>Address</th>
                                                <th>Mobile</th>
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
