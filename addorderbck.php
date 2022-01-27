<?php
session_start();
if(!isset($_SESSION['loggedin']) ){

  header("location:login.php");
 

}
$salespid=$_SESSION["empcode"];
require_once"connection.php";
//date_default_timezone_set("Asia/Calcutta");
require_once"top.php";
$pquery="SELECT * from parties";
$pdetails=mysqli_query($con,$pquery);
$product=mysqli_query($con,"SELECT * from products where stock >0");
if (isset($_POST['sbtn'])) {
  //orderid salesid productid qnty  tax grandtotal  dos status  gstamount subtotal  rate  discountamt discountper ordernote
  $productid=$_POST['productname'];
  $partyid=$_POST['partyname'];
  $salesid=$salespid;
  $qnty=$_POST['qty'];
  $taxtype=$_POST['tax'];
  $grandtotal=$_POST['grandtotal'];
  $gstamount=$_POST['gsttax'];
  $subtotal=$_POST['subtotal'];
  $rate=$_POST['price'];
  $discountamt=$_POST['disamt'];
  $discountper=$_POST['discount'];
  $ordernote=$_POST['order_note'];
  $insert="INSERT INTO ORDERS (
   salesid,partyid,productid,qnty,tax,grandtotal,gstamount,subtotal,rate,discountamt,discountper,ordernote)values(
                   '$salesid',
                   '$partyid',
                '$productid',
                  '$qnty',
                '$taxtype',
                 '$grandtotal',
                 '$gstamount',
                 '$subtotal',
                 '$rate',
                 '$discountamt',
                 '$discountper',
                  '$ordernote'
            )";
                    if(mysqli_query($con, $insert)){
         
          echo '<script>alert("Order Added")</script>'; 
          echo "<script> document.location.href='orders.php';</script>"; 


      } else{
          echo "ERROR: Could not able to execute $insert. " . mysqli_error($con);
      }
  # code...
}
 


?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create order</h1>
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
                <h3 class="card-title">order</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body" >
                  <div class="form-group " id="alertDesignation">
                      <label for="partyname">Party Name</label>
                <select name="partyname" id="partyname" class="form-control select2bs4" >
                    <?php
                       while ($party= mysqli_fetch_array($pdetails)) {
                        echo "<option value='". $party['partyid'] ."'>" .$party['shopname'] ."</option>"; 
                       }

                    ?>
                  </select>
            
                      </div>
                  <div class="form-group">
                    <label for="bday">Order Date</label>
                    <input type="date"  class="form-control" id="" placeholder="" value="<?php echo date('Y-m-d'); ?>">
                  </div> 


                </div>
                <!-- /.card-body -->

  
            </div>
            <!-- /.card -->

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="row" id="mydiv">
              <div class="card-body">
 
                  <div class="form-group " id="alertDesignation">
                      <label for="productname">Select Product</label>
                      <select name="productname" class="form-control select2bs4" id="productname">
                        <option val="null">Search Product</option>
                        <?php
                       while ($products= mysqli_fetch_array($product)) {

                        echo "<option value='". $products['productid'] ."'>" .$products['productname'] ."</option>"; 
                       }

                    ?>
                      </select>
            
                      </div>
                
                  <div class="form-group">
                    <label for="price ">Rate </label>
                    <input type="text" name="price" class="form-control" id="price" placeholder=" " value="" >
                  </div>
                  <div class="form-group">
                    <label for="leaves ">Quantity  </label>
                    <input type="text"name="qty" class="form-control" id="quantity" placeholder=" " value=""
                     onkeyup="cal()">
                     
                  </div> 
                  <div class="form-group">
                    <label for="doj ">Amount  </label>
                    <input type="text" name="amount" class="form-control" id="total" placeholder=" " value="">
                  </div> 
                  <div class="form-group">
                    <button type="button"class="btn btn-success"  id=btn_attr>+</button>
                  </div> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
              <div id="attbr"></div>
            <!-- Input addon -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Total</h3>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label for="ahn ">Sub Total <small> exc Gst</small> </label>
                    <input type="text" name="subtotal" class="form-control" id="subtotal" value="">
                  </div> 

                  <div class="form-group">
                    <label for="tax ">Tax%  </label>
                    <input type="text"  class="form-control" name="tax" id="tax" Value= "">
                  </div> 

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <!-- <label for="taxtype ">Tax @ <strong> -->
                          <!-- <span id='tax'></span>%
                          </strong></label> -->
                          <input type="hidden" placeholder="gsttax" name="gsttax" value="" id="gsttax">
                          <label for="sgst">SGST</label> 
                        <input type="text" class="form-control"  name="sgst" id="sgst" value="" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>CGST</label>
                        <input type="text" class="form-control"  name="cgst"id="cgst" value="" >
                      </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <!-- <label for="taxtype ">Tax @ <strong> -->
                          <!-- <span id='tax'></span>%
                          </strong></label> -->
                          <label for="dis ">Discount % <small>Before GST</small></label>
                    <input type="text" class="form-control" name="discount" placeholder="Enter Discount %" id="discount" value="" 
                    onkeyup="myFunction()">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Discounted Amount</label>
                        <input type="text" class="form-control" readonly="" name="disamt"id="disamt" value="" >
                      </div>
                    </div>
                  </div>
<!--                   <div class="form-group">
                    <label for="ahn ">Discount % <small>Before GST</small></label>
                    <input type="text" class="form-control" name="discount" id="discount" value="" 
                    onkeyup="myFunction('<?php echo $taxtype;?>')">
                  </div>  -->
                  <div class="form-group">
                    <label for="ahn ">Grand total </label>
                    <input type="text" class="form-control" name="grandtotal" id="grandtotal" Value= "">
                  </div> 

              </div>
              <!-- /.card-body -->
            </div>


          </div>
          <!--/.col (left) -->
         
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">order notes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <textarea class="form-control ckeditor" rows="10" id="order_note" placeholder="Order Notes" name="order_note" cols="30"></textarea>

              </div>
              <div class="card-footer">
                  <button type="submit" name="sbtn"class="btn btn-primary">Submit</button>
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


<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script> 
</body>
</html>


<script>
  function cal()
  {   
       var tax=document.getElementById('tax').value;
      x=document.getElementById('price').value;
      y=document.getElementById('quantity').value;
      document.getElementById('total').value=x*y;
      z=document.getElementById('total').value;
      document.getElementById('grandtotal').value=x*y;
       
         
          sub=parseInt(z)*parseInt(tax)/(100+parseInt(tax));
          //alert(sub);
          sgst=sub/2;
          document.getElementById('sgst').value=sgst.toFixed(4);
          document.getElementById('cgst').value=sgst.toFixed(4);
           document.getElementById('gsttax').value=sub.toFixed(4);

          subtotal=parseInt(z)-sub;
          document.getElementById('subtotal').value=subtotal.toFixed(4);

         
       
      
  }
  //gst calculation after discount
  function myFunction(){
          var tax=document.getElementById('tax').value;
         
            var numVal1 = Number(document.getElementById("subtotal").value);
            var numVal2 = Number(document.getElementById("discount").value);
            var distamt=   numVal1 * numVal2 / 100;
            afterDiscount = numVal1 - (numVal1 * numVal2 / 100);
            // var gst=Number(document.getElementById("subtotal").value);
            //alert(afterDiscount);
            document.getElementById("subtotal").value = afterDiscount.toFixed(4);
            k=Number(document.getElementById("subtotal").value );
            gst=(parseInt(k)*parseInt(tax))/100;
            sub=parseInt(k)+parseInt(gst);
          
          sgst=parseInt(gst)/2;
          document.getElementById('sgst').value=sgst.toFixed(4);
          document.getElementById('cgst').value=sgst.toFixed(4);
          document.getElementById('disamt').value=distamt.toFixed(4);
          document.getElementById('gsttax').value=gst.toFixed(4);

          // subtotal=parseInt(z)-sub;
          //alert(k);
          document.getElementById('grandtotal').value=Number(sub);


  }
  function funcattr(){
    str="";
    str +="<input type='text' placeholder='Enter'>";
    //str +="<input type='text' placeholder='Enter'>";
    document.getElementById('attr').innerHTML=str;

  }
</script>
<script>
  $(document).ready(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });

</script>    
<script>
    $(document).ready(function() {
        $("#productname").change(function() {
                var id = $(this).val();
                var dataString = 'pid='+id;
                //alert(dataString);
                $.ajax({
                    url: 'fetch.php',
                    type: 'post',
                    data: dataString,
                    success: function(response) {
                       // alert( "Data Saved: " + response );
                        var obj = JSON.parse(response);
        //obj hold all values
      
                      // Parse the jSON that is returned
                        
                        // These are the inputs that will populate
                        $("#price").val(obj[0]);
                        $("#tax").val(obj[1]);
                         }
            });
        });
    });
</script>
<script type="text/javascript">
  
$("#btn_attr").click(function(){
   var body = $("body"); //Where is contained the object
   var obj = $("#mydiv"); //Object who will be cloned
   obj.clone(true).appendTo('#attbr');
   // $(e).find("input").each(function(){
   //     //ie: myInput0, myInput1 will be deleted
   //     if ($(this).attr("id") != 'myInput'){
   //        $(this).remove();
   //     }
   // });
});

</script>