<?php
session_start();
if(!isset($_SESSION['loggedin']) ){

  header("location:login.php");
} 
elseif ($_SESSION['id']!="admin") {
header("location:user-dash.php");

}
$ids=$_GET['id'];
echo $ids;
require_once"top.php";
require_once"connection.php";
$tblorder="SELECT * FROM orders JOIN parties on parties.partyid = orders.partyid JOIN order_item on order_item.orderid=orders.orderid JOIN employees on employees.id =	orders.salespersonid JOIN products on products.productid=order_item.productid and orders.orderid=$ids ";
$order_result= mysqli_query($con,$tblorder);
while($r=mysqli_fetch_array($order_result)){

  $date=$r['date'];
  $shopname=$r['shopname'];
  $adress=$r['adress'];
  $city=$r['city'];
  $mob=$r['mob'];
  $email=$r['email'];
  $salespersonid=$r['name'];
  $subtotal=$r['order_total_before_tax'];
  $totaltax=$r['order_total_tax'];
  $grandtotal=$r['order_total_after_tax'];

  
}

?>
  <!-- Content Wrapper. Contains page content -->
  <?php
  $output.='<div class="content-wrapper">


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3" id="abc">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Sales Up
                    <small class="float-right">Dated:<strong><?php echo $date; ?></strong></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>ABC MUTIVENTURES</strong><br>
                    BEMINA<br>
                  SRINAGAR J&K<br>
                    Phone: 9906123123<br>
                    Email: info@abcmultiventures.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Billed TO
                  <address>
                    <strong><?php echo $shopname; ?></strong><br>
                    <?php echo $adress; ?><br>
                    <?php echo $city; ?><br>
                    Phone: <?php echo $mob; ?><br>
                    Email: <?php echo $email; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #<?php echo $ids; ?></b><br>
                  <br>
                  <b>Order ID:</b><?php echo $ids; ?><br>
                  <b>Sale Person:</b> <?php echo $salespersonid; ?><br>
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table  class="table table-striped">
                    <thead>
                    <tr>
                      <th>Sr No.</th>
                      <th>Item Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Actual Amt.</th>
                      <th ="12.5%" colspan="2">Tax1 (%)</th>
                      <th>Tax2 (%)</th>
                      <th></th>
                      <th>Total</th>
                      
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
      
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                      $count = 0;

                        foreach($order_result as $sub_row)
                                    {
                                    $count++;
                                    
                                      echo "<tr>";
                                      echo"<td>$count</td>";
                                      echo '<td>'.$sub_row['productname'].'</td>';
                                      echo'<td>'.$sub_row['order_item_quantity'].'</td>';
                                      echo'<td>'.$sub_row['order_item_price'].'</td>';
                                      echo'<td>'.$sub_row['order_item_actual_amount'].'</td>';
                                      echo'<td>'.$sub_row['order_item_tax1_rate'].'</td>';
                                      echo'<td>'.$sub_row['order_item_tax1_amount'].'</td>';
                                      echo'<td>'.$sub_row['order_item_tax2_rate'].'</td>';
                                      echo'<td>'.$sub_row['order_item_tax2_amount'].'</td>';
                                      echo'<td>'.$sub_row['order_item_final_amount'].'</td>';
                                      echo "</tr>";
                                   
                        }
                        ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="dist/img/credit/visa.png" alt="Visa">
                  <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="dist/img/credit/american-express.png" alt="American Express">
                  <img src="dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style=":50%">Subtotal:</th>
                        <td><?php echo $subtotal; ?></td>
                      </tr>
                      <tr>
                        <th>Tax </th>
                        <td><?php echo  $totaltax;?></td>
                      </tr>

                      <tr>
                        <th>Total:</th>
                        <td><?php echo  $grandtotal;?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->';
  $pdf = new Pdf();
 $file_name = 'Invoice.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));
  
  
  
  
  
  ?>