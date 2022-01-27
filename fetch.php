<?php
require_once 'connection.php';
if (isset($_POST['drop_services'])) {

 	$id=$_POST['drop_services'];

 	$product=mysqli_query($con,"SELECT * from products where productid='$id'");

 	//echo "SELECT * from products where productid='$id'";
 	
    $service1 =  mysqli_fetch_assoc($product);
     $price=$service1['price'];
     $taxtype=$service1['taxtype'];
     $array = array($price,$taxtype );
 	echo json_encode($array);
  
          

 	

 	# code...
 }




?>