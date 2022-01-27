<?php

session_start();
$id=$_SESSION['id'];

include "connection.php";
if(isset($_POST['check_in']))
{
   
    $status=$_POST['check_in'];
    $sql="INSERT INTO attendance (emp_code,status)values('$id','$status')";
    mysqli_query($con,$sql);
     


}






?>