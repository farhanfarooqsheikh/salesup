<?php

//load.php
include"connection.php";
if (isset($_POST['drop_services'])) {

  $id=$_POST['drop_services'];
$data = array();

$query = "SELECT * FROM attendance where emp_code='$id'";



$result = mysqli_query($con,$query);

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["emp_code"],
  'title'   => $row["pa"],
  'start'   =>  strtoupper($row["created"]),
  'checkin'=>  $row["check_in"]
//   'end'   => $row["end_event"]
 );
}

echo json_encode($data);
}
?>