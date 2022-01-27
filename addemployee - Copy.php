<?php 
require_once"top.php";

$name=$birthday=$gender= $fname=$pnumber=$email=$password=$designation=$adress=$city=$state=$salary=$accnumber=$bank= $accname=$ifsccode=$pannumber=$branch=$agreement=$idproof=$adressproof=$resume = $empcode='';
  $errors = array();


  if(isset($_POST['submit'])){


    // $nm=$_POST['up'];
    // echo '<script type="text/javascript">alert("'.$nm.'");</script>';
    
    // check email
    if(empty($_POST['email'])){
      $errors[] = 'An email is required';
    } else{
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Email must be a valid email address';
      }
    }

    // check name
    if(empty($_POST['name'])){
      $errors[] = 'Name is Required';
    } else{
      $name = $_POST['name'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
        $errors[] = 'Name must be letters and spaces only';
      }
    }
    // birthday
    if(empty($_POST['birthday'])){
      $errors[] = 'Enter Your Birthday';
    } else{
      $birthday = $_POST['birthday'];
    }
    // //check picture
     if(empty($_POST['up'])){
    $errors[] = 'Upload Your Picture';
      } else{
       // $source=isset($_FILES['up']['tmp_name']);
       // $dpname=$_FILES['up']['name'];
       // $ext=substr($dpname,strpos($dpname,"."));
       // $type= $_FILES['up']['type'];
       // $fuploads="uploads/";
       // $dp='fil'.rand(0,1000).$ext;
       // $user_image=$fuploads.$dp;
       // if($type== "image/jpeg" || $type=="image/jpg" || $type=="image/png")
       //  {
       //       move_uploaded_file($source,$user_image);
       //  }

        }

       $imgname=$_FILES['up']['name'];
        $source= $_FILES['up']['tmp_name'];
        $desination='uploads/'.rand().time().$imgname;
        move_uploaded_file($source, $desination);

     //check mobile number
    if(empty($_POST['pnumber'])){
      $errors[] = 'Mobile Number  is Required';
    } else{
      $pnumber = $_POST['pnumber'];
      if(!preg_match('/^[0-9]{10}+$/', $pnumber)){
        $errors[] = 'Enter Valid Mobile Number';
      }
    }
    //password checker
    $passworda=$_POST['password'];
    if(empty($_POST['password'])){
      $errors[] = 'Enter Password !';
      $passworda=$_POST['password'];
      
     
    }
      elseif(strlen($_POST["password"]) <= '8') {
        $errors[] = "Your Password Must Contain At Least 8 Characters!";
      }
      elseif(!preg_match("#[0-9]+#",$passworda)) {
        $errors[] = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$passworda)) {
      $errors[] = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$passworda)) {
      $errors[] = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }

    
    //check confirm password
    elseif (empty($_POST["confirmpass"])) {
      $errors[] = "Confirm Password is required";
    } 
    elseif ($_POST['confirmpass'] != $_POST['password']){
      $errors[] = "Confirmed Password is Not Matching ";
    }

    else {
      $password = $_POST["confirmpass"];
    }
  
        //check empcode
            if (empty($_POST["empcode"])) {
              $errors[] = "Emp Code is required";
            } else{
              $empcode = $_POST["empcode"];
            } 
        //desination check'
        if (empty($_POST["designation"])) {
          $errors[] = "Designation  is required";
        } else {
          $designation = $_POST["designation"];
        } 
        //salary check
        if (empty($_POST["salary"])) {
          $errors[] = "Salary  is required";
        } else {
          $salary = $_POST["salary"];
          if(!preg_match('/^[0-9]+$/', $salary)){
            $errors[] = 'Salary Must be Numbers';
          }
        } 
        //account name
        if(empty($_POST['accname'])){
          $errors[] = 'Account Holder Name is Required';
        } else{
            $accname = $_POST['accname'];
          if(!preg_match('/^[a-zA-Z\s]+$/', $accname)){
            $errors[] = 'Account Holder Name must be letters and spaces only';
          }
        }
        //account number
        if (empty($_POST["accnumber"])) {
          $errors[] = "Account Number  is required";
        } else {
          $accnumber = $_POST["accnumber"];
          if(!preg_match('/^[0-9]{16}+$/', $accnumber)){
            $errors[] = 'Enter Valid 16 Digit Account number';
          }
        }
            //check gender
            if (empty($_POST["gender"])) {
              $errors[] = "Gender is required";
            } else {
              $gender = $_POST["gender"];
            }
            //check bank name
            if(empty($_POST['bank'])){
              $errors[] = 'Bank Name is Required';
            } else{
              $bank = $_POST['bank'];
              if(!preg_match('/^[a-zA-Z\s]+$/', $bank)){
                $errors[] = 'Bank Name must be letters and spaces only';
              }
            }
            //check branch
            if(empty($_POST['branch'])){
              $errors[] = 'Branch Name is Required';
            } else{
              $branch = $_POST['branch'];
              if(!preg_match('/^[a-zA-Z\s]+$/', $branch)){
                $errors[] = 'Branch Name must be letters and spaces only';
              }
            }
            // check fathers name
            if(empty($_POST['fname'])){
              $errors[] = 'Enter Fathers Name';
            } else{
              $fname = $_POST['fname'];
              if(!preg_match('/^[a-zA-Z\s]+$/', $fname)){
                $errors[] = 'Title must be letters and spaces only';
              }
            }

            //ifsc code
            if(empty($_POST['ifsccode'])){
              $errors[] = 'Enter IFSC Code';
            } else{
              $ifsccode = $_POST['ifsccode'];
              
            }
            //pan card number
            if(empty($_POST['pannumber'])){
              $errors[] = 'Enter PAN';
            } else{
              $pannumber = $_POST['pannumber'];
              
            }
            //address
            if(empty($_POST['adress'])){
              $errors[] = 'Enter Adress';
            } else{
              $adress = $_POST['adress'];
              
            }
            //check city 
            if(empty($_POST['city'])){
              $errors[] = 'Enter City Name';
            } else{
              $city = $_POST['city'];
              
            }
            //check state
            if(empty($_POST['state'])){
              $errors[] = 'Enter State Name';
            } else{
              $state = $_POST['state'];
              
            }

            if(!$errors){
              // echo $_POST['name'];
              // //echo $_POST['photo'];
              // die();
              $con=mysqli_connect("localhost", "root", "", "salesup");
              if(mysqli_query($con, " insert into employees(
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
               agreement,
               idproof,
               adressproof,
               resume
               ) values 
               ('".$_POST['name']."',
               '".$_POST['birthday']."',
              '".$_POST['gender']."',
              '".$_POST[ 'fname']."',
              '".$destination."',
              '".$_POST['pnumber']."',
              '".$_POST[ 'email']."',
             '". $_POST[ 'password']."',
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
              '".$_POST[ 'agreement']."',
             '". $_POST[ 'idproof']."',
              '".$_POST[ 'adressproof']."',
             '". $_POST[ 'resume']."'
         
         
         
             )")){
              ?>
  <div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-6 ">
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                Employee Added
              </div>
        </div>
</div>
<?php
             }
             else{
              ?>
  <div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-6 ">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                Not Added
              </div>
        </div>
</div>
<?php
             }





         
           }
    
  } // end POST check
  

//insertion of data starts

//displaying errors 
if(!empty($errors)){ 
  ?>
  <div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-6 ">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                <?php    foreach($errors as $errorMessage){
                    echo $errorMessage . '<br>';
                 }?>
              </div>
        </div>
</div>
<?php
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
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
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
                    <input type="text" value="<?php echo htmlspecialchars($fname) ?>" name="fname"  class="form-control" id="" placeholder="Enter Father/Spouse Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Upload  Profile </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="up" class="custom-file-input" id="dp">
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
                      <select name="designation" class="form-control select2 select2-hidden-accessible" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Designation</option>
                        <option value="admin">Admin</option>
                        <option value="area-sales-officer">Area Sales Officer</option>
                      </select>
            
                      </div>
                  <div class="form-group">
                    <label for="salary ">Salary </label>
                    <input type="text" value="<?php echo htmlspecialchars($salary) ?>" name="salary"class="form-control" id="" placeholder="Salary ">
                  </div>

                  <div class="form-group">
                    <label for="doj ">Date of Joining  </label>
                    <input type="Date" name="doj" class="form-control" id="" placeholder=" ">
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
