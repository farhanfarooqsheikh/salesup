<?php
include"connection.php";

session_start();
if(!isset($_SESSION['loggedin']) ){

    header("location:login.php");
   

} 
elseif ($_SESSION['id']!="admin") {
header("location:user-dash.php");

}
$ids=$_SESSION["id"]; 
require_once"top.php";
if (isset($_POST['sbtn'])) {

  
        $imgname=$_FILES['pimg']['name'];
        $source= $_FILES['pimg']['tmp_name'];
        $destination='uploads/products/'.rand(0,10000).time().$imgname;
        move_uploaded_file($source, $destination);
        $productname=$_POST['productname'];
        $brand=$_POST['brand'];
        //$categories=$_POST['categories'];
        $taxtype=$_POST['taxtype'];
        $mrp=$_POST['mrp'];
        $price=$_POST['price'];
        $units=$_POST['units'];
        $description=$_POST['description'];
        $status=$_POST['status'];
        $stock=$_POST['stock'];
        $sql="INSERT INTO products(productname,brand,taxtype,price,mrp,units,img,description,status,stock)
        values(

              '$productname','$brand','$taxtype','$price','$mrp','$units','$destination','$description','$status','$stock'
      )";
      //echo $sql;
        if(mysqli_query($con, $sql)){
         
          echo '<script>alert("Product Added")
          
          </script>'; 
          echo "<script> document.location.href='product.php';</script>"; 


      } else{
          echo "Product Failed . " . mysqli_error($con);
      }
}             

?>






  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Product</h1>
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
                    <input type="text"  name="productname" class="form-control" id="" placeholder="Enter Name">
                  </div> 
                

                  <div class="form-group">
                    <label for="exampleInputFile">Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="pimg" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="qty ">Product Stock </label>
                    <input type="number" name="stock" class="form-control" id="" placeholder="Qty ">
                  </div> 
                   <div class="form-group">
                    <label for="qty ">MRP </label>
                    <input type="number" class="form-control" id="" placeholder="MRP " name="mrp">
                  </div>                  
                  <div class="form-group">
                    <label for="qty ">Product Price <small>exc GST</small> </label>
                    <input type="number" class="form-control" id="" placeholder="Price " name="price">
                  </div> 
                  <div class="form-group " id="alertDesignation">
                      <label for="Tax Rate">Tax Rate</label>
                      <select name="taxtype" class="form-control select2 select2-hidden-accessible" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Tax Rate</option>
                        <option value="5">5%</option>
                        <option value="12">12%</option>
                        <option value="18">18%</option>
                        <option value="28">28%</option>


                      </select>                    
                </div>
                  <div class="form-group " id="alertDesignation">
                      <label for="Brand">Brand</label>
                      <select name="brand" class="form-control select2 select2-hidden-accessible" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Brand</option>
                        <option value="amul">Amul</option>
                        <option value="Pepsi">Pepsi co</option>
                        <option value="Haldiram">Haldiram</option>
    
                      </select>                    
                </div>  
                  <div class="form-group " id="alertDesignation">
                      <label for="units">Units</label>
                      <select name="units" class="form-control select2 select2-hidden-accessible" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Units</option>
                        <option value="pcs">Pcs</option>
                        <option value="case">Case</option>
    
                      </select>                    
                </div>    
                  <div class="form-group " id="alertDesignation">
                      <label for="Status">Status</label>
                      <select name="status" class="form-control select2bs4" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">In Active</option>
    
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
                <textarea name="description" id="summernote"cols="100">
                  Place <em>some</em> <u>Product Description Here</u> <strong>here</strong>
                </textarea>
              </div>

            </div>
          </div>
        <!-- /.col-->
      </div>

  
            </div>
             <div class="card-footer">
                  <button type="submit"  name="sbtn" class="btn btn-primary">Submit</button>
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
<?php require_once"footer.php";  ?>