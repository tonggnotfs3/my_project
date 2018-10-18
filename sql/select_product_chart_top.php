<?php
//setting header to json
header('Content-Type: application/json');

include("connect.php");

//query to get data from the table
$sql="SELECT SUM(order_detail.qty) AS sumQTY,product.p_name FROM order_detail,product WHERE order_detail.p_id = product.p_id GROUP BY order_detail.p_id ORDER BY `sumQTY` DESC LIMIT 10";
$result=$conn->query($sql);

//execute query
$result=$conn->query($sql);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection


//now print the data
print json_encode($data);