<?php 
require_once"top.php";

$name=$birthday=$gender= $fname=$pnumber=$email=$password=$designation=$adress=$city=$state=$salary=$accnumber=$bank= $accname=$ifsccode=$pannumber=$branch=$agreement=$idproof=$adressproof=$resume = $empcode='';

  if(isset($_POST['submit'])){


              $con=mysqli_connect("localhost", "root", "", "salesup");
              	
              $sql=" insert into suppliers(
                companyname	,supcontactperson,cmobile,cemail,caddress,ccity,cstate,	comgst	

              
               ) values 
               ('".$_POST['name']."',
              '".$_POST[ 'fname']."',
              '".$_POST['pnumber']."',
              '".$_POST[ 'email']."',
             '". $_POST[ 'address']."',
              '".$_POST[ 'city']."',
              '".$_POST[ 'state']."',
              '".$_POST[ 'gstno']."'


         
         
             )";
             			echo $sql;
            if(mysqli_query($con, $sql)){
         
          echo '<script>alert("Supplier Added")</script>'; 
          echo "<script> document.location.href='employees.php';</script>"; 


      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
      }
                  } 


?>
<!--warning box starts-->


<!--warning box ends-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Supplier</h1>
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
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Basic Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">Company Name</label>
                    <input type="text" name="name"  class="form-control" value="<?php echo htmlspecialchars($name) ?>" id="" placeholder="Enter Company Name">
                  </div> 
                 
                  <div class="form-group">
                    <label for="fname">Contact Person Name</label>
                    <input type="text" value="<?php echo htmlspecialchars($fname) ?>" name="fname"  class="form-control" id="" placeholder="Contact Person Name">
                  </div>


                </div>
                <!-- /.card-body -->


              
            </div>
            <!-- /.card -->

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Company Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                   <div class="form-group">
                    <label for="gstno ">Gst No. </label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($empcode) ?>" name="gstno" id="" placeholder="GST  ">
                  </div> 

                  <div class="form-group">
                    <label for="salary ">Address </label>
                    <input type="text" value="<?php echo htmlspecialchars($salary) ?>" name="address"class="form-control" id="" placeholder="ADDRESS ">
                  </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Company Info</h3>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label for="mobile ">Mobile Number </label>
                    <input type="text" name="pnumber" value="<?php echo htmlspecialchars($pnumber) ?>" class="form-control" id="" placeholder="Mobile Number ">
                  </div>  
                  <div class="form-group">
                    <label for="email ">Email  </label>
                    <input type="email" name="email"  value="<?php echo htmlspecialchars($email) ?>" class="form-control" id="" placeholder="Enter Email Address">
                 
                  </div>  
                                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Address Details</h3>
              </div>
              <div class="card-body">
       
                   <div class="form-group-inline">
                    <label for="City ">City </label>
                    <input type="text" name="city" class="form-control" value="<?php echo htmlspecialchars($city) ?>" id="" placeholder="Enter City ">
                  </div>            
                  <div class="form-group-inline">
                    <label for="state ">State </label>
                    <input type="text" name="state" class="form-control" id="" placeholder="Enter State" value="<?php echo htmlspecialchars($state) ?>"">
                  </div>                                                  
                                                                      
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- general form elements disabled -->
            <div class="card card-warning">
 
              <div class="card-footer col-12">
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
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script> 
</body>
</html>
