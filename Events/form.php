<?php
	$server= "us-cdbr-east-04.cleardb.com";
	$username= "b9e4e2513341e1";
	$password= "d8e1a446";
	$dbname= "heroku_f8074740b1b3459";
	
	$con= mysqli_connect($server, $username, $password, $dbname);
	
	if(isset($_POST['submit'])){

		if(!empty($_POST['uname']) && !empty($_POST['addcomment'])){

			$name = $_POST['uname'];
			$comment = $_POST['addcomment'];

			$query = "INSERT INTO usercomments(name,comment) VALUES ('$name','$comment')";
			$run = mysqli_query($con,$query) or die(mysqli_error());
			
			if($run){
				echo "Form submitted successfully";
			}
			else{
				echo "Form not submitted";
			}
		
		}
		else{
			echo "All fields are required";
		}
		
	}

	mysqli_close($con);

?>
