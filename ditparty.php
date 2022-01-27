<?php
session_start();
if(!isset($_SESSION['loggedin']) ){

  header("location:login.php");
 

} 
elseif ($_SESSION['id']!="admin") {
header("location:user-dash.php");

}
$ids=$_GET['id'];

require_once"top.php";
require_once"connection.php";
$result=mysqli_query($con,"Select * from employees where id=$ids");
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
    $state=$r['state'];
    $city=$r['city'];
    $password=$r['password'];
    $dest=$r['designation'];
    $cimg=$r['photo'];
    $doj=$r['doj'];
  }
//update query
if(isset($_POST['update'])){
  $imgname=$_FILES['up']['name'];
  
  $source= $_FILES['up']['tmp_name'];
  $destination='uploads/'.rand().time().$imgname;
  move_uploaded_file($source, $destination);
  $name=$_POST['name'];
  $birthday=$_POST['birthday'];
  $gender=$_POST['gender'];
  $fname=$_POST['fname'];
  $pnumber=$_POST['pnumber'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $dest=$_POST['designation'];
  $adress=$_POST['adress'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $salary=$_POST['salary'];
  $accnumber=$_POST['accnumber'];
  $bank=$_POST['bank'];
  $pannumber=$_POST['pannumber'];
  $accname=$_POST['accname'];
  $ifsccode=$_POST['ifsccode'];
  $branch=$_POST['branch'];
  $empcode=$_POST['empcode'];
  
        //  mysqli_query($con, " update employees SET 
        //  name='$name,
        //  birthday='$birthday',
        //  gender='$gender',
        //  fname='$fname',
        //  photo='$destination',
        //  pnumber='$pnumber',
        //  email='$email',
        //  password='$password',
        //  designation='$dest',
        //  adress='$adress',
        //  city='$city',
        //  state='$state',
        //  salary='$salary',
        //  accnumber='$accnumber',
        //  bank='$bank',
        //  pannumber='$pannumber',
        //  accname='$accname',
        //  ifsccode='$ifsccode',
        //  branch='$branch',
        //  empcode='$empcode'
        //  where id='$ids' 



        // ");
        $sql=" update employees SET 
        name='$name',
        birthday='$birthday',
        gender='$gender',
        fname='$fname',
        photo='$destination',
        pnumber='$pnumber',
        email='$email',
        password='$password',
        designation='$dest',
        adress='$adress',
        city='$city',
        state='$state',
        salary='$salary',
        accnumber='$accnumber',
        bank='$bank',
        pannumber='$pannumber',
        accname='$accname',
        ifsccode='$ifsccode',
        branch='$branch',
        empcode='$empcode'
        where id='$ids' 



       ";
       $con=mysqli_connect("localhost", "root", "", "salesup");
        if(mysqli_query($con, $sql)){
         
          echo '<script>alert("Records Updated")
          
          </script>'; 

      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
      }
       
   
         
             } 
           
        //  echo"update employees SET 
        //      name='$name',
        //      birthday='$birthday',
        //      gender='$gender',
        //      fname='$fname',
        //      photo='$destination',
        //      pnumber='$pnumber',
        //      email='$email',
        //      password='$password',
        //      designation='$dest',
        //      adress='$adress',
        //      city='$city',
        //      state='$state',
        //      salary='$salary',
        //      accnumber='$accnumber',
        //      bank='$bank',
        //      pannumber='$pannumber',
        //      accname='$accname',
        //      ifsccode='$ifsccode',
        //      branch='$branch',
        //      empcode='$empcode'
        //      where id='$ids' ";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Employee</h1>
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
              <form method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name"  class="form-control" value="<?php echo htmlspecialchars($name) ?>" id="" placeholder="Enter Name">
                  </div> 
                  <div class="form-group">
                    <label for="bday">Bith Date</label>
                    <input type="date" name="birthday" value="<?php echo htmlspecialchars($birthday) ?>"   min="1985-01-01" max="2003-12-31" class="form-control" id="" placeholder="">
                  </div> 
                  <div class="form-group">
                    <label for="gender">Gender</label>
                        <div class="form-check-inline">
                         <label class="form-check-label" for="gender">
                           <input type="radio"  class="form-check-input" id="male"
                           <?php
                            if($gender=="male") {
                              echo "checked";}?> name="gender" value="male">Male
                          </label>
                         </div>
                        <div class="form-check-inline">
                         <label class="form-check-label"  for="gender">
                           <input type="radio"  class="form-check-input" id="female"<?php if($gender=="female") {echo "checked";}?> name="gender" value="female" >Female
                          </label>
                         </div>
                  </div>                    
                  <div class="form-group">
                    <label for="fname">Father/Spouse Name</label>
                    <input type="text" value="<?php echo htmlspecialchars($fname) ?>" name="fname"  class="form-control" id="" placeholder="Enter Father/Spouse Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Upload  Profile </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="up" class="custom-file-input" id="dp">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                    <div class="form-group">
                    <label for="exampleInputFile">Current  Profile </label>
                    <div class="input-group">
                    <img width="180px" height="180px" class=" img img-responsive" src="<?php echo $cimg ; ?> ">
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
                      <select name="designation" class="form-control select2 select2-hidden-accessible" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Designation</option>
                        <option <?php if($dest=="admin") echo 'selected="selected"'; ?> value="admin">Admin</option>
                        <option <?php if($dest=="sales officer") echo 'selected="selected"';?> value="sales officer">Area Sales Officer</option>
                      </select>
            
                      </div>
                  <div class="form-group">
                    <label for="salary ">Salary </label>
                    <input type="text" value="<?php echo htmlspecialchars($salary) ?>" name="salary"class="form-control" id="" placeholder="Salary ">
                  </div>

                  <div class="form-group">
                    <label for="doj ">Date of Joining  </label>
                    <input type="text" disabled name="doj" value="<?php echo htmlspecialchars($doj) ?>" class="form-control" id="" placeholder=" ">
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
                    <input type="text" value="<?php echo htmlspecialchars($accname) ?>" name="accname" class="form-control" id="" placeholder="Account Holder Name ">
                  </div> 
                  <div class="form-group">
                    <label for="ahn ">Account Number </label>
                    <input type="text" value="<?php echo htmlspecialchars($accnumber) ?>" name="accnumber" class="form-control" id="" placeholder="Account Number ">
                  </div> 
                  <div class="form-group">
                    <label for="ahn ">Bank Name </label>
                    <input type="text" value="<?php echo htmlspecialchars($bank) ?>" name="bank" class="form-control" id="" placeholder="Bank Name ">
                  </div> 
                  <div class="form-group">
                    <label for="ahn ">Bank Branch </label>
                    <input type="text" value="<?php echo htmlspecialchars($branch) ?>" name="branch" class="form-control" id="" placeholder="Bank Branch ">
                  </div> 
                  <div class="form-group">
                    <label for="ifsc ">IFSC Code </label>
                    <input type="text" name="ifsccode" value="<?php echo htmlspecialchars($ifsccode) ?>" class="form-control" id="" placeholder="Ifsc ">                
                  </div> 
                  <div class="form-group">
                    <label for="pan">Pan Number </label>
                    <input type="text" name="pannumber" class="form-control" id="" value="<?php echo htmlspecialchars($pannumber) ?> "placeholder="Pan Number ">
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
                    <input type="text" name="pnumber" value="<?php echo htmlspecialchars($pnumber) ?>" class="form-control" id="" placeholder="Mobile Number ">
                  </div>  
                  <div class="form-group">
                    <label for="email ">Email  </label>
                    <input type="email" name="email"  value="<?php echo htmlspecialchars($email) ?>" class="form-control" id="" placeholder="Enter Email Address">
                 
                  </div>  
                  <div class="form-group">
                    <label for="password ">Password </label>
                    <input type="password"  name="password" value="<?php echo htmlspecialchars($password) ?>" class="form-control" id="" placeholder="Enter Password ">
                  </div> 
                  <div class="form-group">
                    <label for="passwordcnf ">Confirm Password </label>
                    <input type="password" name="confirmpass"   value="<?php echo htmlspecialchars($password) ?>"     class="form-control" id="" placeholder="Confirm Password ">
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
                    <input type="text" name="adress" class="form-control" name="address" id="" value="<?php echo htmlspecialchars($adress) ?>"placeholder="Enter Address ">
                  </div>       
                   <div class="form-group-inline">
                    <label for="City ">City </label>
                    <input type="text" name="city" class="form-control" value="<?php echo htmlspecialchars($city) ?>" id="" placeholder="Enter City ">
                  </div>            
                  <div class="form-group-inline">
                    <label for="state ">State </label>
                    <input type="text" name="state" class="form-control" id="" placeholder="Enter State" value="<?php echo htmlspecialchars($state) ?>"">
                  </div>                                                  
                   <div class="form-group-inline">
                    <label for="Emergency ">Emergency Contact Number </label>
                    <input type="text" class="form-control" id="" placeholder="Enter Emergency Contact Number ">
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
                  <button  type="submit" name="update" class="btn btn-primary">Update</button>
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
