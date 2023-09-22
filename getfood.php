<?php
require_once('dbconfig.php');

$qry="select * from `foods`";
$sqlexec = mysqli_query($dbconn, $qry) or die(mysqli_error($dbconn));

if(mysqli_num_rows($sqlexec) > 0)
{

 $i=0;
 while ($val = mysqli_fetch_assoc($sqlexec))
{
    $food[$i]["id"] = $val['id'];
    $food[$i]["foodname"] = $val['food_name'];
    $food[$i]["foodprice"] = $val['food_price'];
    $i =$i+1;
 }
 $response['status']= true;
 $response['message']= "Success";
 $response['data']= $food;
}
else
{
 $response['status']= false;
 $response['message']= "Failed";
 // $response['data']= $food;
}
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($response);
?>