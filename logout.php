<?php
include_once"connection.php";
session_start();
$attendanceid=$_SESSION['attendance-id'];
$date=date('Y-m-d H:i:s');
$sql="UPDATE attendance SET check_out='$date',status='checkedout' where attendance_id='$attendanceid'";
//  echo $sql;
// die();
mysqli_query($con,$sql);



session_destroy();
session_unset();
header("location:login.php");
exit;
?>