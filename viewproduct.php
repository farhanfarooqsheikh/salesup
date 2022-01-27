<?php
include"connection.php";
    
session_start();
if(!isset($_SESSION['loggedin']) ){

    header("location:login.php");
} 
$ids=$_GET["id"]; 
require_once"top.php";
$result=mysqli_query($con,"Select * from products where productid=$ids");
while ($r= mysqli_fetch_array($result)) {
        $productname=$r['productname'];
        $brand=$r['brand'];
        //$categories=$_POST['categories'];
        $taxtype=$r['taxtype'];
        $mrp=$r['mrp'];
        $price=$r['price'];
        $units=$r['units'];
        $description=$r['description'];
        $status=$r['status'];
        $stock=$r['stock'];  
        $img=$r['img'];


}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Product</h1>
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Info</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="Productame"> Product Name</label>
                    <input type="text" disabled="disabled" name="productname" class="form-control" id="" placeholder="Enter Name" value="<?php echo htmlspecialchars($productname) ?>">
                  </div> 
   
                  <div class="form-group">
                    <label for="exampleInputFile">Current Image </label>
                    <div class="input-group">
                    <img width="180px" height="180px" class=" img img-responsive" src="<?php echo $img ; ?> ">
                            </div>
                    
                    </div>
                   <div class="form-group">
                    <label for="qty ">Product Stock </label>
                    <input type="number"  disabled="disabled" value="<?php echo htmlspecialchars($stock) ?>" name="stock" class="form-control" id="" placeholder="Qty ">
                  </div> 
                   <div class="form-group">
                    <label for="qty ">MRP </label>
                    <input type="number"  disabled="disabled" value="<?php echo htmlspecialchars($mrp) ?>"class="form-control" id="" placeholder="MRP " name="mrp">
                  </div>                  
                  <div class="form-group">
                    <label for="qty ">Product Price <small>inc GST</small> </label>
                    <input type="number"  disabled="disabled" class="form-control" id="" placeholder="Price " name="price" value="<?php echo htmlspecialchars($price) ?>">
                  </div> 
                  <div class="form-group " id="alertDesignation">
                      <label for="Tax Rate">Tax Rate</label>
                      <select name="taxtype"  disabled="disabled" class="form-control select2 " id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Tax Rate</option>
                        <option <?php if($taxtype=="5") echo 'selected="selected"'; ?> value="5">5%</option>
                        <option <?php if($taxtype=="12") echo 'selected="selected"'; ?> value="12">12%</option>
                        <option <?php if($taxtype=="18") echo 'selected="selected"'; ?> value="18">18%</option>
                        <option <?php if($taxtype=="28") echo 'selected="selected"'; ?> value="28">28%</option>


                      </select>                    
                </div>
                  <div class="form-group " id="alertDesignation">
                      <label for="Brand">Brand</label>
                      <select  disabled="disabled" name="brand" class="form-control select2" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Brand</option>
                        <option <?php if($brand=="amul") echo 'selected="selected"'; ?> value="amul">Amul</option>
                        <option <?php if($brand=="Pepsi") echo 'selected="selected"'; ?> value="Pepsi">Pepsi co</option>
                        <option <?php if($brand=="Haldiram") echo 'selected="selected"'; ?> value="Haldiram">Haldiram</option>
    
                      </select>                    
                </div>  
                  <div class="form-group " id="alertDesignation">
                      <label for="units">Units</label>
                      <select  disabled="disabled" name="units" class="form-control select2 " id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Units</option>
                        <option <?php if($units=="pcs") echo 'selected="selected"'; ?> value="pcs">Pcs</option>
                        <option <?php if($units=="case") echo 'selected="selected"'; ?> value="case">Case</option>
    
                      </select>                    
                </div>    
                  <div class="form-group " id="alertDesignation">
                      <label for="Status">Status</label>
                      <select   disabled="disabled" name="status" class="form-control select2 " id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Status</option>
                        <option <?php if($status=="active") echo 'selected="selected"'; ?> value="active">Active</option>
                        <option <?php if($status=="inactive") echo 'selected="selected"'; ?> value="inactive">In Active</option>
    
                      </select>                    
                </div>            
                <!-- /.card-body -->
                <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Description
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <textarea  disabled="disabled" name="description" id="summernote"cols="100" >
                  <?php echo htmlspecialchars($description) ;?>
                </textarea>
              </div>

            </div>
          </div>
        <!-- /.col-->
      </div>

  
            </div>
             <div class="card-footer">
                  <button type="submit"  disabled="disabled" name="upbtn" class="btn btn-primary">Submit</button>
                </div>
              </form>
            <!-- /.card -->



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

<script src="plugins/summernote/summernote-bs4.min.js"></script>
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
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script> 
</body>
</html>

