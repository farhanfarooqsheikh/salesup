
$output .= '
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
';
?>
              <!-- Table row -->
              <div class="row">
                <div class="col-12">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Sr No.</th>
                      <th>Item Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Actual Amt.</th>
                      <th >CGST %</th>
                      <th>CGST Amount</th>
                      <th>SGST %</th>
                      <th>SGST Amount</th>
                      <th>Total</th>
                      
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
                    .Goods Once taken cannot be returned back.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                

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
                  <a href="#" rel="noopener" onclick="abc()" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
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
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->

</body>
</html>
    <!-- Page specific script -->
    <script>
    
    function abc(){


      window.addEventListener("load", window.print());


    }
    
    
    </script>
<?php