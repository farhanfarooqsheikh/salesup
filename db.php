<?php
header('Content-Type: application/json');

require_once('connection.php');

$sqlQuery = "select date_format(date,'%M','%Y'),sum(order_total_after_tax)
from orders  group by month(date)
order by month(date)";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
// print_r($data);
// die;
mysqli_close($con);

echo json_encode($data);
?>