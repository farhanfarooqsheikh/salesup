<?php
session_start();
if(!isset($_SESSION['loggedin']) ){

  header("location:login.php");
} 

$ids=$_GET['id'];
require_once"top.php";
require_once"connection.php";
$result=mysqli_query($con,"Select * from parties where partyid=$ids");
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
//update query
if(isset($_POST['upbtn'])){
  if($_FILES['up']['size']!=0){
        $imgname=$_FILES['up']['name'];  
        $source= $_FILES['up']['tmp_name'];
        $destination='uploads/parties/'.rand().time().$imgname;
        move_uploaded_file($source, $destination);
}
else{
  $destination=$img;
}

    $name=$_POST['name'];
    $personname=$_POST['personname'];
    $partytype=$_POST['partytype'];
    $status=$_POST['status'];
    $gstno=$_POST['gstno'];
    $pan=$_POST['pan'];
    $mob=$_POST['mob'];
    $email=$_POST['email'];
    $adress=$_POST['adress'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $bal=$_POST['bal'];
    $creditlimit=$_POST['creditlimit'];
 


        $sql=" update parties SET 
        shopname='$name',
        personname='$personname',
        partyimg='$destination',
        partytype='$partytype',
        status='$status',
        partygstno='$gstno',
        partypan='$pan',
        partymob='$mob',
        partyemail='$email',
        partyadress='$adress',
        partycity='$city',
        partystate='$state',
        bal='$bal'
        where partyid='$ids'";
       $con=mysqli_connect("localhost", "root", "", "salesup");
        if(mysqli_query($con, $sql)){
         
          echo '<script>alert("Records Updated")</script>'; 

      } else{
          echo "ERROR: FAILED TO UPDATE $sql. " . mysqli_error($con);
      }
             } 
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Party</h1>
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
                    <label for="Name">Shop Name</label>
                    <input type="text" name="name"  class="form-control" value="<?php echo htmlspecialchars($name) ?>" id="" placeholder="Enter Name">
                  </div> 
                  <div class="form-group">
                    <label for="bday">Person Name</label>
                    <input type="text" name="personname" value="<?php echo htmlspecialchars($personname) ?>" class="form-control" id="" placeholder="">
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
                    <img width="180px" height="180px" class=" img img-responsive" src="<?php echo $img ; ?> ">
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
                      <select name="partytype"class="form-control select2 " id="" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Party Type</option>
                        <option <?php if($partytype=="retail") echo 'selected="selected"'; ?> value="retail">Retailer</option>
                        <option <?php if($partytype=="ws") echo 'selected="selected"'; ?>value="ws">Wholesaler</option>
                      </select>
            
                      </div>
                  <div class="form-group " id="alertDesignation">
                      <label for="status">Party Status</label>
                      <select name="status"class="form-control select2 " id="" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Party Status</option>
                        <option <?php if($status=="active") echo 'selected="selected"'; ?>  value="active">Active</option>
                        <option <?php if($status=="inactive") echo 'selected="selected"'; ?>  value="inactive">In Active</option>
                      </select>
            
                      </div>
                  <div class="form-group">
                    <label for="gst ">Gst Number </label>
                    <input type="text" name="gstno"class="form-control" id="" value="<?php echo htmlspecialchars($gstno) ?>" placeholder="GST ">
                  </div>
                  <div class="form-group">
                    <label for="pan ">Pan Number </label>
                    <input type="text" name="pan" class="form-control" id="" placeholder="Pan" value="<?php echo htmlspecialchars($pan) ?>">
                  </div> 
                  

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



          </div>
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
                    <input type="text" name="mob" class="form-control" id=""value="<?php echo htmlspecialchars($mob) ?>" placeholder="Mobile Number ">
                  </div>  
                  <div class="form-group">
                    <label for="email ">Email  </label>
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email) ?>" id="" placeholder="Enter Email Address">
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
                    <input type="text" name="adress" class="form-control" id=""value="<?php echo htmlspecialchars($adress) ?>" placeholder="Enter Address ">
                  </div>       
                   <div class="form-group-inline">
                    <label for="City ">City </label>
                    <input type="text" name="city" class="form-control" id="" value="<?php echo htmlspecialchars($city) ?>" placeholder="Enter City ">
                  </div>            
                  <div class="form-group-inline">
                    <label for="state ">State </label>
                    <input type="text" name="state" value="<?php echo htmlspecialchars($state) ?>" class="form-control" id="" placeholder="Enter State ">
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
                    <input type="text" name="bal"class="form-control" id="" value="<?php echo htmlspecialchars($bal) ?>"  placeholder="Enter Opening Balance ">
                  </div> 
                  <div class="form-group">
                    <label for="bal ">Credit Limit </label>
                    <input type="text" name="creditlimit" class="form-control" id="" value="<?php echo htmlspecialchars($creditlimit) ?>"placeholder="Enter Credit Limit">
                  </div>                   

              </div>
              <div class="card-footer">
                  <button type="submit"name="upbtn" class="btn btn-primary">Submit</button>
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
