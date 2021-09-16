<?php

include_once 'donate.php';

$conn =new mysqli("us-cdbr-east-04.cleardb.com","b9e4e2513341e1","d8e1a446","heroku_f8074740b1b3459");
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
