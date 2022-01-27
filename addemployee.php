<?php 
require_once"top.php";
if(!isset($_SESSION['loggedin']) ){

   echo "<script> document.location.href='login.php';</script>";
} 
elseif ($_SESSION['id']!="admin") {
 echo "<script> document.location.href='user-dash.php';</script>";
}

$name=$birthday=$gender= $fname=$pnumber=$email=$password=$designation=$adress=$city=$state=$salary=$accnumber=$bank= $accname=$ifsccode=$pannumber=$branch=$agreement=$idproof=$adressproof=$resume = $empcode='';

  if(isset($_POST['submit'])){

//for profile pic 
       $imgname=$_FILES['up']['name'];
        $source= $_FILES['up']['tmp_name'];
        $destination='uploads/users/profile/'.rand(0,2000).time().$imgname;
        move_uploaded_file($source, $destination);
        //for resume 
        $resumename=$_FILES['resume']['name'];
        $resumesource= $_FILES['resume']['tmp_name'];
        $resumedestination='uploads/users/resume/'.rand(0,2000).time().$resumename;
        move_uploaded_file($resumesource, $resumedestination);
        //for id proof
        $idproofname=$_FILES['idproof']['name'];
        $idsource= $_FILES['idproof']['tmp_name'];
        $iddestination='uploads/users/idproof/'.rand(0,2000).time().$idproofname;
        move_uploaded_file($idsource, $iddestination);
        //for address proof
        $adressproof=$_FILES['adressproof']['name'];
        $adresssource= $_FILES['adressproof']['tmp_name'];
        $adressdestination='uploads/users/adressproof/'.rand(0,2000).time().$adressproof;
        move_uploaded_file($adresssource, $adressdestination);
        //for agreement
        $agreement=$_FILES['agreement']['name'];
        $agreementsource= $_FILES['agreement']['tmp_name'];
        $agreementdestination='uploads/users/agreement/'.rand(0,2000).time().$agreement;
        move_uploaded_file($agreementsource,$agreementdestination);

              $con=mysqli_connect("localhost", "root", "", "salesup");

              $sql=" insert into employees(
               name,
               birthday,
               gender,
               fname,
               photo,
               pnumber,
               email,
               password,
               designation,
               adress,
               city,
               state,
               salary,
               accnumber,
               bank,
               accname,
               ifsccode,
               pannumber,
               branch,
               resume,
               empcode,
               idproof,
               adressproof,
               agreement

              
               ) values 
               ('".$_POST['name']."',
               '".$_POST['birthday']."',
              '".$_POST['gender']."',
              '".$_POST[ 'fname']."',
              '".$destination."',
              '".$_POST['pnumber']."',
              '".$_POST[ 'email']."',
             '". md5($_POST[ 'password'])."',
              '".$_POST[ 'designation']."',
             '". $_POST[ 'adress']."',
              '".$_POST[ 'city']."',
              '".$_POST[ 'state']."',
              '".$_POST[ 'salary']."',
             '".$_POST[  'accnumber']."',
             '". $_POST[ 'bank']."',
             '". $_POST['accname']."',
             '". $_POST[ 'ifsccode']."',
              '".$_POST[ 'pannumber']."',
              '".$_POST[ 'branch']."',
              '".$resumedestination."',
               '".$_POST[ 'empcode']."',
               '".$iddestination."',
               '".$adressdestination."',
               '".$agreementdestination."'

         
         
             )";
             			echo $sql;
            if(mysqli_query($con, $sql)){
         
          echo '<script>alert("Employees Added")</script>'; 
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
            <h1 class="m-0">Add Employee</h1>
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
                    <label for="Name">Name</label>
                    <input type="text" name="name"  class="form-control" value="<?php echo htmlspecialchars($name) ?>" id="" placeholder="Enter Name" required>
                  </div> 
                  <div class="form-group">
                    <label for="bday">Bith Date</label>
                    <input type="date" name="birthday" value="<?php echo htmlspecialchars($birthday) ?>"   min="1985-01-01" max="2003-12-31" class="form-control" id="" placeholder="" required>
                  </div> 
                  <div class="form-group">
                    <label for="gender">Gender</label>
                        <div class="form-check-inline">
                         <label class="form-check-label" for="gender">
                           <input type="radio"  class="form-check-input" id="male"<?php if (isset($gender) && $gender=="male") echo "checked";?> name="gender" value="male">Male
                          </label>
                         </div>
                        <div class="form-check-inline">
                         <label class="form-check-label" for="gender">
                           <input type="radio"  class="form-check-input" id="female" <?php if (isset($gender) && $gender=="female") echo "checked";?> name="gender" value="female" >Female
                          </label>
                         </div>
                  </div>                    
                  <div class="form-group">
                    <label for="fname">Father/Spouse Name</label>
                    <input type="text" value="<?php echo htmlspecialchars($fname) ?>" name="fname"  class="form-control" id="" placeholder="Enter Father/Spouse Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Upload  Profile </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="up" class="custom-file-input" id="dp" required >
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <!-- <input type="file" name="up" id="photo"> -->

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
                    <label for="Employeecode ">Employee Code </label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($empcode) ?>" name="empcode" id="" placeholder="Employee Code ">
                  </div> 
                  <div class="form-group " id="alertDesignation">
                      <label for="designation">Designation</label>
                      <select name="designation" class="form-control select2 " id="designation" required tabindex="-1" aria-hidden="true">
                        <option val="null">Select Designation</option>
                        <option value="admin">Admin</option>
                        <option value="area-sales-officer">Area Sales Officer</option>
                      </select>
            
                      </div>
                  <div class="form-group">
                    <label for="salary ">Salary </label>
                    <input type="text" value="<?php echo htmlspecialchars($salary) ?>" name="salary"class="form-control" required id="" placeholder="Salary ">
                  </div>

                  <div class="form-group">
                    <label for="doj ">Date of Joining  </label>
                    <input type="Date" required name="doj" class="form-control" id="" placeholder=" ">
                  </div> 

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Input addon -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Bank Account Details</h3>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label for="ahn ">Account Holder Name </label>
                    <input type="text" value="<?php echo htmlspecialchars($accname) ?>" name="accname" required class="form-control" id="" placeholder="Account Holder Name ">
                  </div> 
                  <div class="form-group">
                    <label for="ahn ">Account Number </label>
                    <input type="text" required value="<?php echo htmlspecialchars($accnumber) ?>" name="accnumber" class="form-control" id="" placeholder="Account Number ">
                  </div> 
                  <div class="form-group">
                    <label for="ahn ">Bank Name </label>
                    <input type="text" required value="<?php echo htmlspecialchars($bank) ?>" name="bank" class="form-control" id="" placeholder="Bank Name ">
                  </div> 
                  <div class="form-group">
                    <label for="ahn ">Bank Branch </label>
                    <input type="text" value="<?php echo htmlspecialchars($branch) ?>" name="branch" required class="form-control" id="" placeholder="Bank Branch ">
                  </div> 
                  <div class="form-group">
                    <label for="ifsc ">IFSC Code </label>
                    <input type="text" name="ifsccode" value="<?php echo htmlspecialchars($ifsccode) ?>" class="form-control" id="" placeholder="Ifsc ">                
                  </div> 
                  <div class="form-group">
                    <label for="pan">Pan Number </label>
                    <input type="text" name="pannumber" required class="form-control" id="" value="<?php echo htmlspecialchars($pannumber) ?> "placeholder="Pan Number ">
                  </div> 

              </div>
              <!-- /.card-body -->
            </div>


          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Account Login</h3>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label for="mobile ">Mobile Number </label>
                    <input type="text" name="pnumber" required value="<?php echo htmlspecialchars($pnumber) ?>" class="form-control" id="" placeholder="Mobile Number ">
                  </div>  
                  <div class="form-group">
                    <label for="email ">Email  </label>
                    <input type="email" name="email" required value="<?php echo htmlspecialchars($email) ?>" class="form-control" id="" placeholder="Enter Email Address">
                 
                  </div>  
                  <div class="form-group">
                    <label for="password ">Password </label>
                    <input type="password"  name="password" value="<?php echo htmlspecialchars($password) ?>" required class="form-control" id="" placeholder="Enter Password ">
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
                  <div class="form-group">
                    <label for="Address ">Permanant Address </label>
                    <input type="text" name="adress" class="form-control" name="address" id="" value="<?php echo htmlspecialchars($adress) ?>"placeholder="Enter Address " required>
                  </div>       
                   <div class="form-group-inline">
                    <label for="City ">City </label>
                    <input type="text" name="city" class="form-control" value="<?php echo htmlspecialchars($city) ?>" id="" placeholder="Enter City " required>
                  </div>            
                  <div class="form-group-inline">
                    <label for="state ">State </label>
                    <input type="text" name="state" class="form-control" id="" placeholder="Enter State" value="<?php echo htmlspecialchars($state) ?>" required>
                  </div>                                                  
                   <div class="form-group-inline">
                    <label for="Emergency ">Emergency Contact Number </label>
                    <input type="text" class="form-control" id="" placeholder="Enter Emergency Contact Number " required>
                  </div>                                                                   
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Documents</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <label for="resume ">Resume </label>
                    <div class="custom-file">

                      <input type="file"  name="resume" class="custom-file-input" id="">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                <label for="Adhaar ">Id Proof </label>
                    <div class="custom-file">

                      <input type="file" name="idproof" class="custom-file-input" id="">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                <label for="Pancard ">Address Proof</label>
                    <div class="custom-file">

                      <input type="file" name="adressproof"class="custom-file-input" id="">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                 <label for="agreement ">Contract/Offer Letter </label>
                    <div class="custom-file">

                      <input type="file" name="agreement" class="custom-file-input" id="">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

              </div>
              <div class="card-footer">
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
