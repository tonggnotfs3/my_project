<?php
//setting header to json
header('Content-Type: application/json');

include("connect.php");

//query to get data from the table
$sql="SELECT p_name, p_orderamount FROM product ORDER BY p_id";
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