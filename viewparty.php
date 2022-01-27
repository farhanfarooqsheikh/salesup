<?php
require_once"connection.php";
session_start();
if(!isset($_SESSION['loggedin']) ){

  header("location:login.php");
 

} 

$partycode=$_GET['id'];

require_once"top.php";


$result=mysqli_query($con,"Select * from parties where partyid=$partycode");
while ($r= mysqli_fetch_array($result)) {
    $name=$r['shopname'];
    $personname=$r['personname'];
    $email=$r['partyemail'];
    $img=$r['partyimg'];
    $adress=$r['partyadress'];
    $partytype=$r['partytype'];
    $mob=$r['partymob'];
    $gstno=$r['partygstno'];
    $pan=$r['partypan'];
    $city=$r['partycity'];
    $state=$r['partystate'];
    $bal=$r['bal'];
    $creditlimit=$r['creditlimit'];
    $salespid=$r['salespid'];
    $status=$r['status'];
    $doc=$r['doc'];
  }
if (isset($_POST['delbtn'])) {

mysqli_query($con,"delete from parties where partyid='$partycode'");
 echo "<script>alert('Party Deleted')</script>";
  header("location:parties.php");
 
  
}
//echo "delete from parties where partyid='$partycode'";
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
                  <img class="profile-user-img img-fluid img-square"
                       src="<?php echo $img; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo strtoupper($name); ?></h3>

                <p class="text-muted text-center"><?php echo strtoupper($personname) ; ?></p>

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
                  <li class="nav-item"><a class="nav-link" href="#company-details" data-toggle="tab">Business Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#banks-details" data-toggle="tab">Contact Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#docs" data-toggle="tab">Accounts Detail</a></li>
                  <li class="nav-item"><a class="nav-link" href="#logins" data-toggle="tab">Orders </a></li>
                   <li class="navbar-nav ml-auto d-block "><a href="editparty.php?id=<?php echo $partycode; ?>" class="trigger-btn d-block"><button type="button" class=" d-block btn btn-primary float-right">Edit</button></a></li>

                  <li class="navbar-nav ml-auto d-block "><a href="#myModal" class="trigger-btn d-block" data-toggle="modal"><button type="button" class=" d-block btn btn-danger float-right">Delete</button></a></li>

                </ul>
                 
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class=" active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="row">
                        <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Shop Name</h6>
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
                      <?php echo strtoupper($mob) ; ?>
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
                      <h6 class="mb-0"> Party Code:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($partycode) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Party Type</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($partytype) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gst No</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($gstno) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pan Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($pan) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of Creation</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo strtoupper($doc) ; ?>
                    </div>
                  </div>

                  <hr>
                 <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Created By</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo strtoupper($salespid) ; ?>
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
                      <h6 class="mb-0"> Adress:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($adress) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">City</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($city) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">State</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($state) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Contact Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($mob) ; ?>
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
                      <h6 class="mb-0"> Current Balance:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($bal) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Credit Limit</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($creditlimit) ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Status</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo strtoupper($status) ; ?>
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
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
