<?php
$userList=array("name"=>"Kesavan","city"=>"Erode");
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($userList);
?>