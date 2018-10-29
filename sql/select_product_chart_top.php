<?php
//setting header to json
header('Content-Type: application/json');

include("connect.php");
$datestart = $_GET['datestart'];
$dateend = $_GET['dateend'];
//query to get data from the table
$sql="SELECT SUM(order_detail.qty) AS sumQTY,product.p_name FROM order_detail,product,orders WHERE order_detail.p_id = product.p_id AND orders.OrderID = order_detail.OrderID AND orders.OrderDate BETWEEN '$datestart' AND '$dateend' GROUP BY order_detail.p_id ORDER BY `sumQTY` DESC LIMIT 10";
//echo $sql;
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