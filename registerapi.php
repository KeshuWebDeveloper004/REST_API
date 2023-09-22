<?php
require_once('dbconfig.php');

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email    = $_POST['email'];
$mobile   = $_POST['mobile'];

$error;
if(empty($fullname))
{
$error = "Fullname is required";
}
else if(empty($username))
{
$error = "username is required";
}
else if(empty($password))
{
$error = "password is required";
}
else if(empty($email))
{
$error = "emailId is required";
}
else if(empty($mobile))
{
$error = "mobileNumber is required";
}
else
{
  $alreadyExistVal = mysqli_query($dbconn, "SELECT * FROM `users` WHERE `mobile` = $mobile");

  if(mysqli_num_rows($alreadyExistVal)== 0)
  {
  $insertQry = "INSERT INTO `users`(`fullname`,`username`,`password`,`email`,`mobile`) VALUES ('$fullname','$username','$password','$email','$mobile')";
  
  $qry = mysqli_query($dbconn, $insertQry);

  if($qry)
  {
    $userId = mysqli_insert_id($dbconn);
    $response['status'] = true;
    $response['message'] = "Register Sucessfully";
    $response['userId'] = $userId;
  }
  else
  {
    $response['status'] = false;
    $response['message'] = "Register Failed"; 
  }
}
else
{
   $response['status'] = false;
   $response['message'] = "Already mobile number exist. Please do login";  
}

}
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($response);
?>