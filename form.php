<?php
	$server= "localhost";
	$username= "root";
	$password= "";
	$dbname= "commentsystem";
	
	$con= mysqli_connect($server, $username, $password, $dbname);
	
	if(isset($_POST['submit'])){

		if(!empty($_POST['uname']) && !empty($_POST['addcomment'])){

			$name = $_POST['uname'];
			$comment = $_POST['addcomment'];
