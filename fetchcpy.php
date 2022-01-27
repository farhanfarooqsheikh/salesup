<?php
require_once 'connection.php';
if (isset($_POST['pid'])) {

 	$id=$_POST['pid'];

 	$product=mysqli_query($con,"SELECT * from products where productid='$id'");

 	//echo "SELECT * from products where productid='$id'";

 	while ($data=mysqli_fetch_array($product)) {
     
     $price=$data['price'];
     $taxtype=$data['taxtype'];
      $array = array($price,$taxtype );

     echo json_encode($array);
          

 	}

 	# code...
 }




?>