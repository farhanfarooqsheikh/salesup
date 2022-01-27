<?php
include"connection.php";
session_start();
if(!isset($_SESSION['loggedin']) ){

    header("location:login.php");
    die();

} 
elseif ($_SESSION['id']!="admin") {
header("location:user-dash.php");
   die();

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

if (isset($_POST['upbtn'])) {

  if($_FILES['pimg']['size']!=0){
        $imgname=$_FILES['pimg']['name'];
        $source= $_FILES['pimg']['tmp_name'];
        $destination='uploads/products/'.rand(0,10000).time().$imgname;
        move_uploaded_file($source, $destination);
      }
      else{
        $destination=$img;
      }
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
        $sql="update products SET 

        productname='$productname',
        brand='$brand',
        taxtype='$taxtype',
        price='$price',
        mrp='$mrp',
        units='$units',
        img='$destination',
        description='$description',
        status='$status',
        stock='$stock'
        where productid='$ids'  ";
echo $sql;
      if(mysqli_query($con, $sql)){
         
          echo '<script>alert("Product Updated")
          
          </script>'; 

      } else{
          echo "Product Failed . " . mysqli_error($con);
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
            <h1 class="m-0">Edit Product</h1>
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
                  <a href="#myModal" class="trigger-btn ml-auto d-block" data-toggle="modal">
                    <button type="button" class=" d-block btn btn-danger float-right">Delete</button>
                  </a>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="Productame"> Product Name</label>
                    <input type="text"  name="productname" class="form-control" id="" placeholder="Enter Name" value="<?php echo htmlspecialchars($productname) ?>">

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
                    <label for="exampleInputFile">Current Image </label>
                    <div class="input-group">
                    <img width="180px" height="180px" class=" img img-responsive" src="<?php echo $img ; ?> ">
                            </div>
                    
                    </div>
                   <div class="form-group">
                    <label for="qty ">Product Stock </label>
                    <input type="number"value="<?php echo htmlspecialchars($stock) ?>" name="stock" class="form-control" id="" placeholder="Qty ">
                  </div> 
                   <div class="form-group">
                    <label for="qty ">MRP </label>
                    <input type="number" value="<?php echo htmlspecialchars($mrp) ?>"class="form-control" id="" placeholder="MRP " name="mrp">
                  </div>                  
                  <div class="form-group">
                    <label for="qty ">Product Price <small>exc GST</small> </label>
                    <input type="number" class="form-control" id="" placeholder="Price " name="price" value="<?php echo htmlspecialchars($price) ?>">
                  </div> 
                  <div class="form-group " id="alertDesignation">
                      <label for="Tax Rate">Tax Rate</label>
                      <select name="taxtype" class="form-control select2 select2-hidden-accessible" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Tax Rate</option>
                        <option <?php if($taxtype=="5") echo 'selected="selected"'; ?> value="5">5%</option>
                        <option <?php if($taxtype=="12") echo 'selected="selected"'; ?> value="12">12%</option>
                        <option <?php if($taxtype=="18") echo 'selected="selected"'; ?> value="18">18%</option>
                        <option <?php if($taxtype=="28") echo 'selected="selected"'; ?> value="28">28%</option>


                      </select>                    
                </div>
                  <div class="form-group " id="alertDesignation">
                      <label for="Brand">Brand</label>
                      <select name="brand" class="form-control select2 select2-hidden-accessible" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Brand</option>
                        <option <?php if($brand=="amul") echo 'selected="selected"'; ?> value="amul">Amul</option>
                        <option <?php if($brand=="Pepsi") echo 'selected="selected"'; ?> value="Pepsi">Pepsi co</option>
                        <option <?php if($brand=="Haldiram") echo 'selected="selected"'; ?> value="Haldiram">Haldiram</option>
    
                      </select>                    
                </div>  
                  <div class="form-group " id="alertDesignation">
                      <label for="units">Units</label>
                      <select name="units" class="form-control select2 select2-hidden-accessible" id="designation" tabindex="-1" aria-hidden="true">
                        <option val="null">Select Units</option>
                        <option <?php if($units=="pcs") echo 'selected="selected"'; ?> value="pcs">Pcs</option>
                        <option <?php if($units=="case") echo 'selected="selected"'; ?> value="case">Case</option>
    
                      </select>                    
                </div>    
                  <div class="form-group " id="alertDesignation">
                      <label for="Status">Status</label>
                      <select name="status" class="form-control select2bs4" id="designation" tabindex="-1" aria-hidden="true">
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
                <textarea name="description" id="summernote"cols="100" >
                  <?php echo htmlspecialchars($description) ;?>
                </textarea>
              </div>

            </div>
          </div>
        <!-- /.col-->
      </div>

  
            </div>
             <div class="card-footer">
                  <button type="submit"  name="upbtn" class="btn btn-primary">Submit</button>
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
<?php require_once"footer.php";   ?>

