<?php
require_once"connection.php";
    
session_start();
if(!isset($_SESSION['loggedin']) ){

    header("location:login.php");
   

} 
$ids=$_SESSION["empcode"]; 
require_once"top.php";

if (isset($_POST['sbtn'])) {


        $imgname=$_FILES['img']['name'];
        $source= $_FILES['img']['tmp_name'];
        $destination='uploads/parties/'.rand().time().$imgname;
        move_uploaded_file($source, $destination);
        $shopname=$_POST['shopname'];
        $personname=$_POST['personname'];
        $img=$destination;
        $mob=$_POST['mob'];
        $email=$_POST['email'];
        $partytype=$_POST['partytype'];
        $gstno=$_POST['gstno'];
        $pan=$_POST['pan'];
        $adress=$_POST['adress'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $bal=$_POST['bal'];
        $creditlimit=$_POST['creditlimit'];
        $salespid =$ids;
        $status =$_POST['status'];
        $sql="INSERT INTO parties(shopname,personname,partyimg,partymob,partyemail,partytype,partygstno,partypan,partyadress,partycity,partystate,bal,creditlimit,salespid,status)
        values(

              '$shopname','$personname','$img','$mob','$email','$partytype','$gstno','$pan','$adress','$city','$state','$bal','$creditlimit','$salespid','$status'
      )";
             if(mysqli_query($con, $sql)){
         
          echo '<script>alert("Party Added")</script>'; 
          echo "<script> document.location.href='parties.php';</script>"; 


      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
      }
}

// echo "INSERT INTO parties(shopname,personname,img,mob,email,partytype,gstno,pan,adress,city,state,bal,creditlimit,salespid,status,)
//         values(

//               '$shopname','$personname','$img','$mob','$email','$partytype','$gstno','$pan','$adress','$city','$state','$bal','$creditlimit','$salespid','$status'
//       )";

?>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Party</h1>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Basic Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="shopname">Shop Name</label>
                    <input type="text" name="shopname" class="form-control" id="" placeholder="Enter Shop Name" required="">
                  </div> 

                    
                  <div class="form-group">
                    <label for="personname">Person Name</label>
                    <input type="text" name="personname" class="form-control" id="" placeholder="Person Name"required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                   
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

  
            </div>
            <!-- /.card -->

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Shop Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
 <!--                   <div class="form-group">
                    <label for="pcode ">Party Code </label>
                    <input type="text" class="form-control" id="" placeholder="Part Code ">
                  </div>  -->
                  <div class="form-group " id="alertDesignation">
                      <label for="type">Party Type</label>
                      <select name="partytype" required="" class="form-control select2bs4" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Party Type</option>
                        <option value="retail">Retailer</option>
                        <option value="ws">Wholesaler</option>
                      </select>
            
                      </div>
                  <div class="form-group " id="alertDesignation">
                      <label for="status">Party Status</label>
                      <select name="status" required="" class="form-control select2bs4" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Party Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">In Active</option>
                      </select>
            
                      </div>
                  <div class="form-group">
                    <label for="gst ">Gst Number </label>
                    <input type="text" name="gstno"class="form-control" id="" placeholder="GST ">
                  </div>
                  <div class="form-group">
                    <label for="pan ">Pan Number </label>
                    <input type="text" name="pan" class="form-control" id="" placeholder="Pan ">
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
                <h3 class="card-title">Contact Details</h3>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label for="mobile ">Mobile Number </label>
                    <input type="text" name="mob" class="form-control" id="" placeholder="Mobile Number " required="">
                  </div>  
                  <div class="form-group">
                    <label for="email ">Email  </label>
                    <input type="email" name="email" class="form-control" id="" placeholder="Enter Email Address">
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
                    <input type="text" name="adress" class="form-control" id="" placeholder="Enter Address " required="">
                  </div>       
                   <div class="form-group-inline">
                    <label for="City ">City </label>
                    <input type="text" name="city" class="form-control" id="" placeholder="Enter City " required="">
                  </div>            
                  <div class="form-group-inline">
                    <label for="state ">State </label>
                    <input type="text" name="state" class="form-control" id="" placeholder="Enter State " required="">
                  </div>                                                  
                                                                  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Acount Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="form-group">
                    <label for="bal ">Opening Balance </label>
                    <input type="text" name="bal"class="form-control" id="" placeholder="Enter Opening Balance ">
                  </div> 
                  <div class="form-group">
                    <label for="bal ">Credit Limit </label>
                    <input type="text" name="creditlimit" class="form-control" id="" placeholder="Enter Credit Limit">
                  </div>                   

              </div>
              <div class="card-footer">
                  <button type="submit"name="sbtn" class="btn btn-primary">Submit</button>
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
<?php   require_once "footer.php"; ?>