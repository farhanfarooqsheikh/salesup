<?php
session_start();
if(!isset($_SESSION['loggedin']) ){

  header("location:login.php");
 }
// SELECT * FROM employees JOIN orders  on employees.id = orders.salesid where id=1
// SELECT * FROM orders JOIN employees   on employees.id = orders.salesid JOIN parties on orders.partyid=parties.partyid
require_once"connection.php";
//require_once"top.php";


$fetch="select date_format(date,'%M'),sum(order_total_after_tax)
from orders  group by month(date)
order by month(date)"; 
// $result = mysqli_query($con, "SELECT SUM(order_total_after_tax) AS value_sum FROM orders where date= '$curdate'"); 
// $row = mysqli_fetch_assoc($result); 
// $sum = $row['value_sum'];

//require_once"top.php";
$fetchresult=mysqli_query($con,$fetch);
 ?>
 <table width=100 border="1">
   <tr>
     <th>month</th>
     <th>sale</th>
   </tr>
   <?php
while($r=mysqli_fetch_array($fetchresult)){

  ?>
  <tr>

<td><?php echo $r["date_format(date,'%M')"]  ; ?>
</td>
<td><?php echo $r["sum(order_total_after_tax)"]; ?></td>
  </tr>
 
<?php


}
?>
 </table>