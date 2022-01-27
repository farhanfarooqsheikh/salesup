<?php
session_start();
require_once 'pdf.php';

$ids=$_GET['id'];

$output = '';
require_once"connection.php";
// require_once"top.php";
$tblorder="SELECT * FROM orders JOIN parties on parties.partyid = orders.partyid JOIN order_item on order_item.orderid=orders.orderid JOIN employees on employees.id =	orders.salespersonid JOIN products on products.productid=order_item.productid and orders.orderid=$ids ";
$order_result= mysqli_query($con,$tblorder);

foreach($order_result as $r)
 {
  $output .= '
  <table width="100%" border="1" cellpadding="5" cellspacing="0">
  <tr>
   <td colspan="2" align="center" style="font-size:18px"><b>Abc Multiventures</b><br>
        Main Road Bemina Srinagar J&K.<br>
        Contact:9906123123 Email:info@abcmultiventures.com<br>
        GST No: 01ABCABC26451ZK.
   
   
   
   
   </td>
  </tr>l
     <tr>
      <td width="65%">
      <div class="col-sm-4 invoice-col">
      Billed TO
      <address>
        <strong>'.$r["shopname"].'</strong><br>
        '.$r["partyadress"].'<br>
        <'.$r["partycity"].'<br>
        Phone: '.$r["partymob"].'<br>
        Email: '.$r["partyemail"].'<br>
        Gst:'.$r["partygstno"].'
      </address>
    </div>
      </td>
      <td width="35%">
       Invoice No. : '.$r["orderid"].'<br />
       Invoice Date :'.$r["date"].'<br />
       Sales Person :'.$r["name"].'<br/>
      </td>
     </tr>
    </table>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
     <tr>
      <th>Sr No.</th>
      <th>Item Name</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Actual Amt.</th>
      <th colspan="2">CGST (%)</th>
      <th colspan="2">SGST (%)</th>
     
      <th rowspan="2">Total</th>
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

 </tr>';
     $count = 0;

                        foreach($order_result as $sub_r)
                                    {
                                    $count++;
                                    $output .= '
                                      <tr>
                                      <td>'.$count.'</td>
                                      <td>'.$sub_r['productname'].'</td>
                                      <td>'.$sub_r['order_item_quantity'].''.$sub_r['units'].'</td>
                                      <td>'.$sub_r['order_item_price'].'</td
                                      <td>'.$sub_r['order_item_actual_amount'].'</td>
                                      <td>'.$sub_r['order_item_tax1_rate'].'%</td>
                                      <td>'.$sub_r['order_item_tax1_amount'].'</td>
                                      <td>'.$sub_r['order_item_tax2_rate'].'%</td>
                                      <td>'.$sub_r['order_item_tax2_amount'].'</td>
                                      <td>'.$sub_r['order_item_final_amount'].'</td>
                                      </tr>
                                      ';
                                   
                        }



                        $output .= '
                       
                        <tr>
                        <td align="right" colspan="9"><b>Total</b></td>
                        <td align="right"><b>'.$r["order_total_after_tax"].'</b></td>
                        </tr>
                        <tr>
                        <td colspan="9"><b>Total Amt. Before Tax :</b></td>
                        <td align="right">'.$r["order_total_before_tax"].'</td>
                        </tr>
                        <tr>
                        <td colspan="9">Add : CGST :</td>
                        <td align="right">'.$r["order_total_tax1"].'</td>
                        </tr>
                        <tr>
                        <td colspan="9">Add : SGST :</td>
                        <td align="right">'.$r["order_total_tax2"].'</td>
                        </tr>
                        
                        <tr>
                        <td colspan="9"><b>Total Tax Amt.  :</b></td>
                        <td align="right">'.$r["order_total_tax"].'</td>
                        </tr>
                        
                        <tr>
                        <td colspan="9"><b>Total Amt. After Tax :</b></td>
                        <td align="right">'.$r["order_total_after_tax"].'</td>
                        </tr>
                        
                        
                        ';

                        $output .= '
                        
                            </table>



                            </td>
</tr>
</table>';
}
$pdf = new Pdf();
 $file_name = 'Invoice-'.$r["orderid"].'.pdf';
 $pdf->loadHtml($output);
 $pdf->render();

 $pdf->stream($file_name, array("Attachment" => false));

 ?>