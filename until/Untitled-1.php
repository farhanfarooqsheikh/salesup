
'$productname[$i]'




'$orderid,'$productid,'$order_item_quantity[$i]','$order_item_price[$i]','$order_item_actual_amount[$i]','$order_item_tax1_rate[$i]','$order_item_tax1_amount[$i]',
'$order_item_tax2_rate[$i]','$order_item_tax2_amount[$i]','$order_item_final_amount[$i]'	

                   <!-- Post -->
                   <div class="post">
                      <div class="row">
                        <div class="col-md-12">
              <!-- <div class="card mb-3">
                <div class="card-body">
                  <div class="row"> -->
                  <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="width:100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Party Name</th>
                                                <th> Amount Received</th>
                                                <th>Dated</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php  $a=1;
                                                      foreach($fetchresultc as $r)
                                                      {
                                                        echo '<tr role="row" class="odd">';
                                                        echo'<td class="dtr-control sorting_1" tabindex="0">'.$a.'</td>';
                                                        echo '<td>'.$r['shopname'].'</td>';
                                                        echo '<td>'.$r['amountreceived'].'</td>';
                                                        $dts=$r['date'];
                                                        $dtf=strtotime($dts);
                                                        echo '<td>'.date("m-d-Y", $dtf).'</td>';
                                                     
                                                        echo' <td>';
                                                        echo '<a href="editcollection.php?cid='.$r['cid'].'" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i> </a>
                                                              </td>
                                                         </tr>';
                                                         $a=$a+1;
                                                      }
                                             
                                             
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                 <th>#</th>
                                                <th>Party Name</th>
                                                <th> Amount Received</th>
                                                <th>Dated</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>


                <!-- </div>
              </div>
                      </div> -->
                    </div>
                    <!-- /.post -->

                    <!-- /.post -->
                  </div>

                  </div> 

























                  
                  <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order No.</th>
                                                <th>Order Date</th>
                                                <th>Party Name</th>
                                                <th>Sales Person</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php  $a=1;
                                                      foreach($fetchresult as $r)
                                                      {
                                                        echo '<tr role="row" class="odd">';
                                                        echo'<td class="dtr-control sorting_1" tabindex="0">'.$a.'</td>';
                                                        echo '<td>'.$r['orderid'].'</td>';
                                                        echo '<td>'.$r['date'].'</td>';
                                                        echo '<td>'.$r['shopname'].'</td>';
                                                        echo '<td>'.$r['name'].'</td>';
                                                        echo '<td>'.$r['order_total_after_tax'].'</td>';
                                                        echo '<td>'.strtoupper($r['status']).'</td>';
                                                        echo' <td>';
                                                        echo '<a href="vieworder.php?id='.$r['orderid'].'" class="btn btn-primary btn-sm" style="padding: 3px 6px;">
                                                        <i class="fa fa-eye"></i> </a>
                                                        <a href="editorder.php?id='.$r['orderid'].'" class="btn btn-warning btn-sm" style="padding: 3px 6px;">
                                                        <i class="fa fa-edit"></i> </a>
                                                        <a href="printpdf.php?id='.$r['orderid'].'" class="btn btn-success btn-sm" style="padding: 3px 6px;" download>
                                                        <i class="fa fa-fw fa-download"></i> </a>

                                                         </td>
                                                         </tr>';
                                                         $a=$a+1;
                                                      }
                                             
                                             
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Order No.</th>
                                                <th>Order Date</th>
                                                <th>Party Name</th>
                                                <th>Sales Person</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>