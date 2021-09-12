<?php

include_once 'donate.php';

$conn =new mysqli("localhost","root","","donate");
if(!$conn)
{
	die("connection failed".mysqli_connect_error());
}
else
{
	$fullName =$_POST["FullName"];
	$email =$_POST["Email"];
    $phonenumber =$_POST["phonenumber"];
	$phonenumber =$_POST["Amount"];


$sql="INSERT INTO donate(FullName,Email,phonenumber,Amount)
    VALUES ('$fullName','$email','$phonenumber','$phonenumber')";

if(mysqli_query($conn,$sql))
{
	echo "Donation Successfull..";
	
}
else
{
	echo "Donation Successfull..";
}

}


?>
