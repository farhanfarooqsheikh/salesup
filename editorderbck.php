<?php
session_start();
if(!isset($_SESSION['loggedin']) ){

  header("location:login.php");
}
$salespersonid=$_SESSION["empcode"];
require_once"connection.php";
//date_default_timezone_set("Asia/Calcutta");
require_once"top.php";
$orderid=$_GET['id'];
$pquery="SELECT * from parties";

$pdetails=mysqli_query($con,$pquery);
// while ($bl= mysqli_fetch_array($pdetails)) {
// $lastbalance=$bl['bal'];
// }

$order="Select * from orders join order_item on order_item.orderid=orders.orderid and orders.orderid=$orderid and order_item.orderid=$orderid";
// echo $order;
// die;
$order_result=mysqli_query($con,$order);
foreach($order_result as $odr){
$odrpartyid=$odr['partyid'];
$odrdate=$odr['date'];
$odrfinal=$odr["order_total_after_tax"]; 


}




$product=mysqli_query($con,"SELECT * from products where stock >0");

function fill_unit_select_box()
{ 
  include"connection.php";
 $output = '';
 $product=mysqli_query($con,"SELECT * from products where stock >0");
 foreach($product as $row)
 {
  $output .= '<option value="'.$row["productid"].'">'.$row["productname"].'</option>';
 }
 return $output;
}
if(isset($_POST["create_invoice"]))
  {
    $order_total_before_tax = 0;
    $order_total_tax1 = 0;
    $order_total_tax2 = 0;
    $order_total_tax3 = 0;
    $order_total_tax = 0;
    $order_total_after_tax = 0;
    
    
    for($count=0; $count<$_POST["total_item"]; $count++)
    {
      $order_total_before_tax = $order_total_before_tax + floatval(trim($_POST["order_item_actual_amount"][$count]));

      $order_total_tax1 = $order_total_tax1 + floatval(trim($_POST["order_item_tax1_amount"][$count]));

      $order_total_tax2 = $order_total_tax2 + floatval(trim($_POST["order_item_tax2_amount"][$count]));

      $order_total_tax3 = $order_total_tax3 + floatval(trim($_POST["order_item_tax3_amount"][$count]));

      $order_total_after_tax = $order_total_after_tax + floatval(trim($_POST["order_item_final_amount"][$count]));

    }
    $order_total_tax = $order_total_tax1 + $order_total_tax2 + $order_total_tax3;
    mysqli_query($con,"Delete from order_item where orderid='$orderid'");

    extract($_POST);
  
    $sql_insert ="update `orders` set `partyid`=$partyname, 
    `salespersonid`='$salespersonid', 
    `order_total_before_tax`='$order_total_before_tax' , 
    `order_total_tax1`= '$order_total_tax1',
     `order_total_tax2`= '$order_total_tax2',
     `order_total_tax`= '$order_total_tax', 
     `order_total_after_tax`='$order_total_after_tax' where orderid='$orderid'";
    //  echo $sql_insert;
    //  die();
     $res_insert = mysqli_query($con, $sql_insert);
     
     //UPDATE FOR BALANCE ++
     $pna=$_POST['partyname'];
     $partybal=mysqli_query($con,"SELECT * FROM PARTIES WHERE partyid='$pna'");
     while($bl=mysqli_fetch_array($partybal)){
      $lastbalance=$bl['bal'];
      $lastblu=$bl['lastbal'];
    }

     
     $totalbalance=$lastblu + $order_total_after_tax;
     $updbal="update parties set bal='$totalbalance' where partyid='$partyname'";
    //  echo $updbal;
    //  die();
     mysqli_query($con,$updbal);
     
    
     
    //  orderid	productid	order_item_quantity	order_item_price	order_item_actual_amount	
    //  order_item_tax1_rate	order_item_tax1_amount	order_item_tax2_rate	order_item_tax2_amount	order_item_final_amount	
     $service = count($_POST['productname']);
     for($i=0;$i<$service;$i++){   
       $sql_service = "insert into order_item(orderid,productid,order_item_quantity,order_item_price,order_item_actual_amount,order_item_tax1_rate,order_item_tax1_amount,order_item_tax2_rate,order_item_tax2_amount,order_item_final_amount	)
       values
       ('$orderid','$productname[$i]','$order_item_quantity[$i]','$order_item_price[$i]','$order_item_actual_amount[$i]','$order_item_tax1_rate[$i]','$order_item_tax1_amount[$i]',
       '$order_item_tax2_rate[$i]','$order_item_tax2_amount[$i]','$order_item_final_amount[$i]')"; 
       
       mysqli_query($con, $sql_service);
     }
     echo '<script>alert("Records Updated")
          
     </script>'; 

  }

?>
<style type="text/css">
  .hide{
    display: none;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Order</h1>
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
                      <form method="post" id="invoice_form">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td colspan="2" align="center"><h2 style="margin-top:10.5px">Edit Invoice</h2></td>
            </tr>
            <tr>
                <td colspan="2">
                  <div class="row">
                    <div class="col-md-8">
                      
                        <b>Party </b><br/>
                        <select name="partyname" id="partyname" class="form-control select2bs4" >
                    <?php
                       while ($party= mysqli_fetch_array($pdetails)) {
                         
                        
                        ?> 
                        
                        <option value='<?php echo $party['partyid'];?>'
                         <?php if($odrpartyid== $party['partyid'])
                         {echo 'selected';} ?>> <?php echo $party['shopname'] ?></option> 
                       <?php
                       }

                    ?>
                  </select>
            
                        <!-- <input type="text" name="order_receiver_name" id="order_receiver_name" class="form-control input-sm" placeholder="Enter Receiver Name" /><br>
                        <textarea name="order_receiver_address" id="order_receiver_address" class="form-control" placeholder="Enter Billing Address"></textarea> -->
                    </div>
                    <div class="col-md-4">
                     <div class="form-group">
                    <label for="bday">Order Date</label>
                    <input type="date"  class="form-control" id="" placeholder="" value="<?php echo $odrdate; ?>">
                  </div> 
                    
                    </div>
                  </div>
                  <br />
                  <table id="invoice-item-table" class="table table-bordered">
                  <tr>
                      <th width="7%">Sr No.</th>
                      <th width="20%">Item Name</th>
                      <th width="5%">Quantity</th>
                      <th width="8%">Price</th>
                      <th width="10%">Actual Amt.</th>
                      <th width="12.5%" colspan="2">Tax1 (%)</th>
                      <th width="12.5%" colspan="2">Tax2 (%)</th>
                      <th width="12.5%" colspan="2">Tax3 (%)</th>
                      <th width="12.5%" rowspan="2">Total</th>
                      <th width="3%" rowspan="2"></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Rate</th>
                      <th>Amt.</th>
                      <th>Rate</th>
                      <th>Amt.</th>
                      <th>Rate</th>
                      <th>Amt.</th>
                    </tr>
                    
                    <?php
                    $item_result=mysqli_query($con,"Select * from order_item where orderid=$orderid");
                    $m = 0;
                    foreach($item_result as $sub_row)
                    {
                      $m = $m + 1;
                    ?>
                    <div class="subdivs">
                    <tr class="abc">
                      <td><span id="sr_no"><?php echo $m; ?></span></td>

                      <td>

                          <select name="productname[]" class="form-control select2bs4 pdc" id="productname">
                          <option val="null">Search Product</option>
                          <?php
                          foreach ($product as $products) {
                            ?>
                            <option value="<?php echo $products['productid'] ?>" <?php  if($products['productid']==$sub_row["productid"]){echo 'selected';}   ?> >

                            <?php echo $products['productname']; ?></option>
                          <!-- echo "<option value='". $products['productid'] ."'>" .$products['productname'] ."</option>";  -->

                          <?php
                          }

                          ?>
                          </select>


                          <!-- <input type="text" name="item_name[]" id="item_name1" class="form-control input-sm" /> -->
                          </td>

                      <!-- <td><input type="text" name="item_name[]" id="item_name<?php echo $m; ?>" class="form-control input-sm" value="<?php echo $sub_row["productid"]; ?>" /></td> -->
                                          
                                           
                                        
                      <td><input type="text" name="order_item_quantity[]" id="order_item_quantity<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm order_item_quantity" value = "<?php echo $sub_row["order_item_quantity"]; ?>"/></td>
                      <td><input type="text" name="order_item_price[]" id="order_item_price<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_price" value="<?php echo $sub_row["order_item_price"]; ?>" /></td>
                      <td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm order_item_actual_amount" value="<?php echo $sub_row["order_item_actual_amount"];?>" readonly /></td>
                      <td><input type="text" name="order_item_tax1_rate[]" id="order_item_tax1_rate<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_tax1_rate" value="<?php echo $sub_row["order_item_tax1_rate"]; ?>" /></td>
                      <td><input type="text" name="order_item_tax1_amount[]" id="order_item_tax1_amount<?php echo $m; ?>" data-srno="<?php echo $m; ?>" readonly class="form-control input-sm order_item_tax1_amount" value="<?php echo $sub_row["order_item_tax1_amount"];?>" /></td>
                      <td><input type="text" name="order_item_tax2_rate[]" id="order_item_tax2_rate<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_tax2_rate" value="<?php echo $sub_row["order_item_tax2_rate"];?>" /></td>
                      <td><input type="text" name="order_item_tax2_amount[]" id="order_item_tax2_amount<?php echo $m; ?>" data-srno="<?php echo $m; ?>" readonly class="form-control input-sm order_item_tax2_amount" value="<?php echo $sub_row["order_item_tax2_amount"]; ?>" /></td>
                      <td><input type="text" name="order_item_tax3_rate[]" id="order_item_tax3_rate<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_tax3_rate" value="" /></td>
                      <td><input type="text" name="order_item_tax3_amount[]" id="order_item_tax3_amount<?php echo $m; ?>" data-srno="<?php echo $m; ?>" readonly class="form-control input-sm order_item_tax3_amount" value="" /></td>

                      <td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount<?php echo $m; ?>" data-srno="<?php echo $m; ?>" readonly class="form-control input-sm order_item_final_amount" value="<?php echo $sub_row["order_item_final_amount"]; ?>" /></td>
                      <!-- <td><button type="button" name="remove_row" id="DeleteButton" data-srno="<?php echo $m; ?>" class="btn btn-danger btn-xs remove_row">X</button></td> -->
                      <td></td>
                    </tr>
                    <?php
                    }
                    ?>
                  
                  </div>
                  </table>
                  <div align="center">
                    <button type="button" name="add_row" id="add_row" class="btn btn-success btn-md">+</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td align="right"><b>Total</td>
                <td align="right"><b><span id="final_total_amt"><?php echo $odrfinal; ?></span></b></td>
              </tr>
              <tr>
                <td colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2" align="center">

                <input type="hidden" name="total_item" id="total_item" value="<?php echo $m; ?>" />
                  <input type="submit" name="create_invoice" id="create_invoice" class="btn btn-info" value="Update" />
                </td>
              </tr>
          </table>
        </div>
      </form>

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
<!-- <script>
$("#invoice-item-table").on("click", "#DeleteButton", function() {
    var row_id = $(this).attr("id");
          var total_item_amount = $('#order_item_final_amount'+row_id).val();
          var final_amount = $('#final_total_amt').text();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
          $('#final_total_amt').text(result_amount);
   $(this).closest("tr").remove();
   count--;
          $('#total_item').val(count);
});




</script> -->
<script>
      $(document).ready(function(){
        var final_total_amt = $('#final_total_amt').text();
        var count = "<?php echo $m; ?>";
        
        
        $(document).on('click', '#add_row', function(){
          count++;
          $('#total_item').val(count);
          var html_code = '';
          html_code += '<tr class="abc" id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';
          html_code += '<td><select name="productname[]" id="productname'+count+'" class="form-control item_unit pdc "><option value="">Select Unit</option><?php echo fill_unit_select_box(); ?></select></td>';

          html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_quantity" /></td>';
          html_code += '<td><input type="text" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
          html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_actual_amount" readonly /></td>';
          
          html_code += '<td><input type="text" name="order_item_tax1_rate[]" id="order_item_tax1_rate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_tax1_rate" /></td>';
          html_code += '<td><input type="text" name="order_item_tax1_amount[]" id="order_item_tax1_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_tax1_amount" /></td>';
          html_code += '<td><input type="text" name="order_item_tax2_rate[]" id="order_item_tax2_rate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_tax2_rate" /></td>';
          html_code += '<td><input type="text" name="order_item_tax2_amount[]" id="order_item_tax2_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_tax2_amount" /></td>';
          html_code += '<td><input type="text" name="order_item_tax3_rate[]" id="order_item_tax3_rate'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_tax3_rate" /></td>';
          html_code += '<td><input type="text" name="order_item_tax3_amount[]" id="order_item_tax3_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_tax3_amount" /></td>';
          html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
          html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
          html_code += '</tr>';
          $('#invoice-item-table').append(html_code);
        });
        
        $(document).on('click', '.remove_row', function(){
          var row_id = $(this).attr("id");
          var total_item_amount = $('#order_item_final_amount'+row_id).val();
          var final_amount = $('#final_total_amt').text();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
          $('#final_total_amt').text(result_amount);
          $('#row_id_'+row_id).remove();
          count--;
          $('#total_item').val(count);
        });
        function cal_final_total(count)
        {
          var final_item_total = 0;
          for(j=1; j<=count; j++)
          {
            var quantity = 0;
            var price = 0;
            var actual_amount = 0;
            var tax1_rate = 0;
            var tax1_amount = 0;
            var tax2_rate = 0;
            var tax2_amount = 0;
            var tax3_rate = 0;
            var tax3_amount = 0;
            var item_total = 0;
            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0)
            {
              price = $('#order_item_price'+j).val();
              if(price > 0)
              {
                actual_amount = parseFloat(quantity) * parseFloat(price);
                $('#order_item_actual_amount'+j).val(actual_amount);
                tax1_rate = $('#order_item_tax1_rate'+j).val();
                if(tax1_rate > 0)
                {
                  tax1_amount = parseFloat(actual_amount)*parseFloat(tax1_rate)/100;
                  $('#order_item_tax1_amount'+j).val(tax1_amount);
                }
                tax2_rate = $('#order_item_tax2_rate'+j).val();
                if(tax2_rate > 0)
                {
                  tax2_amount = parseFloat(actual_amount)*parseFloat(tax2_rate)/100;
                  $('#order_item_tax2_amount'+j).val(tax2_amount);
                }
                tax3_rate = $('#order_item_tax3_rate'+j).val();
                if(tax3_rate > 0)
                {
                  tax3_amount = parseFloat(actual_amount)*parseFloat(tax3_rate)/100;
                  $('#order_item_tax3_amount'+j).val(tax3_amount);
                }
                item_total = parseFloat(actual_amount) + parseFloat(tax1_amount) + parseFloat(tax2_amount) + parseFloat(tax3_amount);
                final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                $('#order_item_final_amount'+j).val(item_total);
              }
            }
          }
          $('#final_total_amt').text(final_item_total);
        }

        $(document).on('blur', '.order_item_price', function(){
          cal_final_total(count);
        });

        $(document).on('blur', '.order_item_tax1_rate', function(){
          cal_final_total(count);
        });

        $(document).on('blur', '.order_item_tax2_rate', function(){
          cal_final_total(count);
        });

        $(document).on('blur', '.order_item_tax3_rate', function(){
          cal_final_total(count);
        });

        $('#create_invoice').click(function(){


         

          for(var no=1; no<=count; no++)
          {
           

            if($.trim($('#order_item_quantity'+no).val()).length == 0)
            {
              alert("Please Enter Quantity");
              $('#order_item_quantity'+no).focus();
              return false;
            }


          }

          $('#invoice_form').submit();

        });

      });
      </script>
     <script>
    $(document).ready(function() {
       
      $(document).on("change",'select[name^="productname"]', function(event){
             
               
        var currentRow=$(this).closest('.abc');
               
                 var drop_services= $(this).val();
                //alert(dataString);
                $.ajax({
                    url: 'fetch.php',
                    type: 'POST',
                    data : {drop_services:drop_services },
                                    success: function(data){
                                      var obj = JSON.parse(data);
                                      var sgst=obj[1]/2;
                    
                    currentRow.find('input[name^="order_item_price"]').val(obj[0]);
                    currentRow.find('input[name^="order_item_tax1_rate"]').val(sgst);
                    currentRow.find('input[name^="order_item_tax2_rate"]').val(sgst);

    


                }
            });
        });
    });
</script>
