<?php
$dbconn = mysqli_connect("localhost:3307","root","","restaurant");
if($dbconn)
{
	// echo "connected succesfully";
}
else
{
	die("connection failed:".mysqli_connect_error());
}
?>