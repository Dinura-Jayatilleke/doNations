<?php

session_start();

require_once ('Products/php/connection.php');
require_once ('Products/php/component.php');


// create instance of Createdb class
//$database = new CreateDb("Productdb", "Producttb");

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('already added in the cart!')</script>";
            echo "<script>window.location = 'Product.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="Products/ProductStyles.css">
</head>
<body>

<header id="header">
    <nav class="navbar navbar-expand-lg">
        <a href="index.html">
            <img src="Products/logo.png" height="50px" width="100px">
        </a>

        <div class="navbar-nav" align-items="right">
                <a href="cart.php">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
    </nav>
</header>

<!-----------------------------------Image slide------------------------------------->
<div class="content">
  <img class="mySlides" src="Products/Images/HeaderImages/image1.jpg">
  <img class="mySlides" src="Products/Images/HeaderImages/image2.jpg">
  <img class="mySlides" src="Products/Images/HeaderImages/image3.jpg">
  <img class="mySlides" src="Products/Images/HeaderImages/image4.jpg">
  <img class="mySlides" src="Products/Images/HeaderImages/image5.jpg">
</div>

<!--script for image slider-->
<script>
  var myIndex = 0;
  carousel();

  function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
} 
</script>
<!-------------------------------------Products-------------------------------------->
<div class="Pcontainer">
        <div class="row text-center py-5">
            <?php
                $sql = "select * from Producttb";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0){
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        component($row['product_name'], $row['product_image'], $row['product_dis'], $row['product_price'], $row['id']);
                    }
                }
            ?>
        </div>
</div>
<!--------------------------------------Footer--------------------------------------->
<footer>
		<div>
			<div class="container">
				<div class="blue sec1" style="width: 40%;">
					<h1 style="color: white;">Join to Donate!<br></h1>
					<form action="footer.php" method="post">
							<tr>		
								<td  class="em" style="padding: 0px 8px 0px 0px;">
									<input type="email" name="email" placeholder="  Email *" class="form">
								</td>								
								<td   class="s"style="padding-right: 8px;">
									<strong><input type="submit" name="submit" id="submit"></strong>
								</td>	
							</tr>					
					</form>
				</div>
				<div class=" green sec1">
					<h2 style="color: white;">CONNECT<br></h2>
					<div style="border:none;">
						<a href="https://www.instagram.com/donationgrp03?r=nametag" class="media-iconsa"><i class='fab fa-instagram'></i></a>
						<a href="https://twitter.com/Donatio66123075" class="media-iconsa"><i class='fab fa-twitter'></i></a>
						<a href="https://www.linkedin.com/feed/?trk=onboarding-landing" class="media-iconsa"><i class='fab fa-linkedin-in'></i></a>
						<a href="https://www.facebook.com/Donations-102087662222457" class="media-iconsa"><i class="fab fa-facebook-f"></i></a>
					</div>
				</div>
		</div>
		<div class="container">
			<div class="sec Aboutus">
				<div class="topic">About us</div>
					<p class="p1">Donations is made in order to help reduce poverty in the world. So work with us to make a difference.</p>
				<div class="topic lowertopic">Contact us</div>
					<div class="email">
						<a href="mailto:donations.g03@gmail.com"><i id="i" class="fas fa-envelope">&nbsp;&nbsp;&nbsp;&nbsp;donations.g03@gmail.com</i></a>
					</div>
				<div class="sec2">
					<a href=""><img src="Products/logo.png" height="70px" width="140px"></a>
				</div>
			</div>
			<div class="sec ourdetails">
				<div class="topic" style="margin-left: 0px;">Our Details</div>
					<div><a href="index.html" class="ma">Home</a></div>
					<div><a href="Product.php" class="ma">Products</a></div>
					<div><a href="events.html" class="ma">Events</a></div>
					<div><a href="About us.html" class="ma">About us</a></div>
					<div><a href="Contact us.html" class="ma">Contact us</a></div>
					<div><a href="donate.html" class="ma">Donate</a></div>
			</div>
			<div class="sec ourpartners">
				<div class="topic">Our Partners</div>
					<div><a href="" class="ma">Aalya</a></div>
					<div><a href="" class="ma">eWorld</a></div>
					<div><a href="" class="ma">Collab</a></div>
					<div><a href="" class="ma">Felixa</a></div>
					<div><a href="" class="ma">Tomblyrive</a></div>
					<div><a href="" class="ma">Malarvi</a></div>
			</div>
		</div>
		<div class="bottom">
			<p>Copyright &#169; 2021 <a href="#" class="ba">donations. </a> All rights reserved</p>
		</div>
	</footer>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
