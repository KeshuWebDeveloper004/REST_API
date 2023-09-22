<?php
require_once('dbconfig.php');

$food_name = $_GET['fname'];
$food_price = $_GET['fprice'];

$insertFood = "insert into `foods` (food_name,food_price) values ('$food_name','$food_price')";
$qry = mysqli_query($dbconn,$insertFood) or die(mysqli_error($dbconn));

if($qry)
{
    $response['status'] = true;
    $response['message'] = 'Insert Successfully';
}
else
{
	$response['status'] = false;
    $response['message'] = 'Insert Failed';
}
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($response);
?>