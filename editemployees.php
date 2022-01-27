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
    $resume=$r['resume'];
    $idproof=$r['idproof'];
    $adressproof=$r['adressproof'];
    $agreement=$r['agreement'];
  }
//update query
if(isset($_POST['update'])){

	if($_FILES['up']['size']!=0){
  $imgname=$_FILES['up']['name'];
  
  $source= $_FILES['up']['tmp_name'];
  $destination='uploads/users/profile'.rand(0,200).time().$imgname;
  move_uploaded_file($source, $destination);
}
else{
	$destination=$cimg;
}
   //for resume 
if($_FILES['resume']['size']!=0){
        $resumename=$_FILES['resume']['name'];
        $resumesource= $_FILES['resume']['tmp_name'];
        $resumedestination='uploads/users/resume/'.rand(0,2000).time().$resumename;
        move_uploaded_file($resumesource, $resumedestination);
    }
    else{
    	$resumedestination=$resume;
    }
        //for id proof
    if($_FILES['idproof']['size']!=0){
        $idproofname=$_FILES['idproof']['name'];
        $idsource= $_FILES['idproof']['tmp_name'];
        $iddestination='uploads/users/idproof/'.rand(0,2000).time().$idproofname;
        move_uploaded_file($idsource, $iddestination);
    }
    else{
    	$iddestination=$idproof;
    }
        //for address proof
    if($_FILES['adressproof']['size']!=0){
        $adressproof=$_FILES['adressproof']['name'];
        $adresssource= $_FILES['adressproof']['tmp_name'];
        $adressdestination='uploads/users/adressproof/'.rand(0,2000).time().$adressproof;
        move_uploaded_file($adresssource, $adressdestination);
    }
    else{
    	$adressdestination=$adressproof;
    }
        //for agreement
    if($_FILES['agreement']['size']!=0){
        $agreement=$_FILES['agreement']['name'];
        $agreementsource= $_FILES['agreement']['tmp_name'];
        $agreementdestination='uploads/users/agreement/'.rand(0,2000).time().$agreement;
        move_uploaded_file($agreementsource,$agreementdestination);
    }
    else{
    	$agreementdestination=$agreement;
    }

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
        empcode='$empcode',
        resume='$resumedestination',
        idproof='$iddestination',
        adressproof='$adressdestination',
        agreement='$agreementdestination'


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


if (isset($_POST['delbtn'])) {

mysqli_query($con,"delete from employees where id='$ids'");
  echo "<script>alert('Employee Deleted')</script>";
  echo "<script> document.location.href='employees.php';</script>"; 

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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Employee</h1>
            <a href="#myModal" class="trigger-btn ml-auto d-block" data-toggle="modal">
                    <button type="button" class=" d-block btn btn-danger float-right">Delete</button>
            </a>
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
