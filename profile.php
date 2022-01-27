<?php
session_start();
if(!isset($_SESSION['loggedin']) ){

  header("location:login.php");
 

} 
elseif ($_SESSION['id']!="admin") {
header("location:user-dash.php");

}
require_once"connection.php";
$id=$_GET['id'];

require_once"top.php";
if(isset($_POST['upbtn'])){
   $password=$_POST['password'];
  $sql="UPDATE employees SET password='$password' where id='$id'";
  if(mysqli_query($con,$sql)){
    echo '<script>alert("Password Updated")</script>'; 
          echo "<script> document.location.href='employees.php';</script>"; 
          session_destroy();


      } else{
          echo "Failed to Update $sql. " . mysqli_error($con);
      }

  }



$result=mysqli_query($con,"Select * from employees where id=$id");

while ($r= mysqli_fetch_array($result)) {
    $name=$r['name'];
    $desg=$r['designation'];
    $email=$r['email'];
    $birthday=$r['birthday'];
    $gender=$r['gender'];
    $adress=$r['adress'];
    $fname=$r['fname'];
    $pnumber=$r['pnumber'];
    $empcode=$r['empcode'];
    $salary=$r['salary'];
    $doj=$r['doj'];
    $accnumber=$r['accnumber'];
    $accname=$r['accname'];
    $ifsccode=$r['ifsccode'];
    $bank=$r['bank'];
    $branch=$r['branch'];
    $pannumber=$r['pannumber'];
    $acces=$r['accesbility'];
    $resume=$r['resume'];
    $idproof=$r['idproof'];
    $adressproof=$r['adressproof'];
    $agreement=$r['agreement'];
    $img=$r['photo'];



  }
if (isset($_POST['delbtn'])) {

mysqli_query($con,"delete from employees where id='$id'");
 echo "<script>alert('Party Deleted')</script>";
 
  
}
//echo "delete from employees where id='$empcode'";
//echo "Select * from employees where id=2";]
// echo "Select * from employees where id=$id";
$fetch="SELECT * FROM orders JOIN employees   on employees.id = orders.salespersonid JOIN parties on orders.partyid=parties.partyid and orders.salespersonid='$id' order by orderid ";
$fetchresult=mysqli_query($con,$fetch);
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
        <input type="hidden" name="hid" value="<?php $partycode;?>">
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
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php  echo $img ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $name ; ?></h3>

                <p class="text-muted text-center"><?php echo strtoupper($desg) ; ?></p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Basic details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#company-details" data-toggle="tab">Company Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#banks-details" data-toggle="tab">Bank Account Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#docs" data-toggle="tab">Documents</a></li>
                  <li class="nav-item"><a class="nav-link" href="#logins" data-toggle="tab">Login Details</a></li>

                  <li class="navbar-nav ml-auto d-block "><a href="#myModal" class="trigger-btn d-block" data-toggle="modal"><button type="button" class=" d-block btn btn-danger float-right">Delete</button></a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="row">
                        <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($name) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($email) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($pnumber) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Birthday</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($birthday) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo strtoupper($gender) ; ?>
                    </div>
                  </div>
                  <hr>
                    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Father's Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($fname) ; ?>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
                      </div>
                    </div>
                    <!-- /.post -->

                    <!-- /.post -->
                  </div>

                  </div>
                  <!-- <div class="tab-pane" id="timeline">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>.....? -->
                  <div class="tab-pane" id="company-details">
                    <!-- Post -->
                    <div class="post">
                      <div class="row">
                        <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Emp Code:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($empcode) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Designation</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($desg) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Accessbilty</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($acces) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Total Salary</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($salary) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of Joining</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo strtoupper($doj) ; ?>
                    </div>
                  </div>

                  <hr>
                </div>
              </div>
                      </div>
                    </div>
                    <!-- /.post -->

                    <!-- /.post -->
                  </div>

                  </div>
                  <!-- second tabs ends/.tab-pane -->
                  <!-- thirds starts -->
                  <div class="tab-pane" id="banks-details">
                    <!-- Post -->
                    <div class="post">
                      <div class="row">
                        <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Account Name:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($accname) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Account Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($accnumber) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Bank</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($bank) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">IFSC</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($ifsccode) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">PAN NUMBER</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo strtoupper($pannumber) ; ?>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Branch</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo strtoupper($branch) ; ?>
                    </div>
                  </div>
                </div>
              </div>
                      </div>
                    </div>
                    <!-- /.post -->

                    <!-- /.post -->
                  </div>

                  </div>
                  <!--third ends -->
                   <!-- 4 starts -->
                   <div class="tab-pane" id="docs">
                    <!-- Post -->
                    <div class="post">
                      <div class="row">
                        <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Id Proof:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <a href="<?php echo $idproof ?>" download>Download/View Id Proof</a>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address Proof</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <a href="<?php echo $adressproof ?>" download>Download/View Address Proof</a>
                    </div>
                  </div>
                  <hr>
<!--                   <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Offer letter</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($bank) ; ?>
                    </div>
                  </div>
                  <hr> -->
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Agreement</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <a href="<?php echo $agreement ?>" download>Download/View Agreement</a>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Resume</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <a href="<?php echo $resume ?>" download>Download/View Resume</a>
                    </div>
                  </div>

                  <hr>

                </div>
              </div>
                      </div>
                    </div>
                    <!-- /.post -->

                    <!-- /.post -->
                  </div>

                  </div>
                  <!--third ends -->    
             <div class="tab-pane" id="logins">
                    <!-- Post -->
                    <div class="post">
                      <div class="row">
                        <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Email/Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($email) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Change Password</h6>
                    </div>
                    <form  method="POST">
                  <div class="form-group">
                    
                    <input type="password" name="password" class="form-control" id="" placeholder="Password">
                  </div>
                 <div class="card-footer">
                  <button type="submit"name="upbtn" class="btn btn-primary">Update</button>
                </div>
                  </form>
                  </div>
                  <hr>


                </div>
              </div>
                      </div>
                    </div>
                    <!-- /.post -->

                    <!-- /.post -->
                  </div>

                  </div>      
                  <!---orders--->
                  
<!--endorders-->
                  





                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2021 <a href="">Sales Up</a>.</strong> All rights reserved.
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
                "autoWidth": false
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
