<?php
  session_start();
  include_once 'Products/connection.php';

  if(isset($_POST["add"])){
    if(isset($_SESSION["shopping_cart"])){
      $item_array_id = array_column($_SESSION["shopping_cart"],"product_id");
        if(!in_array($_GET["id"],$item_array_id)){
          $count = count($_SESSION["shopping_cart"]);
          $item_array = array(
           'product_id' => $_GET["id"],
           'product_name' => $_POST["hidden_name"],
           'product_price' => $_POST["hidden_price"],
           'product_quantity' => $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
            echo '<script>window.location="cart.php"</script>';
            }else{
            echo '<script>alert("Product is already in  the cart")</script>';
            echo '<script>window.location="cart.php"</script>';
          }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'product_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'product_quantity' => $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }

    if(isset($_GET["action"])){
        if($_GET["action"] == "delete"){
            foreach($_SESSION["shopping_cart"] as $keys => $value){
                if($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Product has been removed")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
            }
        }
    }
?>
  
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--css files-->
<link rel="stylesheet" type="text/css" href="Products/ProductStyles.css">

<!--bootstrap-->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!--font style-->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Shopping Cart</title>
</head>
<body>
<!-------------------------------------Header---------------------------------------->
<div class="topnav" id="myTopnav">
  <a href="index.html">Home</a>
  <a href="Product.php">Products</a>
  <a href="events.html">Events</a>
  <a href="About us.html">About</a>
  <a href="Contact us.html">Contact</a>
  <a href="cart.php">Cart</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<!-----------------------------------Image slide------------------------------------->
<div class="content">
  <img class="mySlides" src="Products/Images\HeaderImages\image1.jpg">
  <img class="mySlides" src="Products/Images\HeaderImages\image2.jpg">
  <img class="mySlides" src="Products/Images\HeaderImages\image3.jpg">
  <img class="mySlides" src="Products/Images\HeaderImages\image4.jpg">
  <img class="mySlides" src="Products/Images\HeaderImages\image5.jpg">
</div>
<!-------------------------------------Products--------------------------------------> 
<h1 class="title">Products</h1>

<div class="pcontainer">
  <?php
    $query = "select * from product order by id asc";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
  ?>
  
  <div class="pro-con">
    <form method="post" action="Product.php?action=add&id=<?php echo $row["id"];?>">
      <div class="product">
        <img src="<?php echo $row["image"];?>" width="250px" height="auto" class="img-responsive">
        <h5 class="text-info"><?php echo $row["name"];?></h5>
        <h6><?php echo $row["description"];?></h6>
        <h5 class="text-danger">Rs. <?php echo $row["price"];?>/=</h5>

        <input type="text" name="quantity" class="form-control" value="1">
        <input type="hidden" name="hidden_name" value="<?php echo $row["name"];?>">
        <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
        <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to cart">
      </div>
    </form>
  </div> 
   
  <?php
      }
    }
  ?>
</div>

<footer>
    <div class="container">
        <div class="blue sec1" style="width: 40%;">
            <h1 style="color: white;">Join to Donate!<br></h1>
            <form action="footer.php" method="post">
                <input type="email" name="email" placeholder="  Email *" class="form">
                <strong><input type="submit" name="submit" id="submit"></strong>
            </form>
        </div>
        
        <div class=" green sec1">
            <h1 style="color: white;">CONNECT<br></h1>
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
                <a href="index.html"><img src="Products/Images/logo.png" height="70px" width="140px"></a>
            </div>
        </div>
        
        <div class="sec ourdetails">
            <div class="topic" style="margin-left: 0px;">Our Details</div>
            <div><a href="index.html" class="ma">Home</a></div>
            <div><a href="product.php" class="ma">Products</a></div>
            <div><a href="events.html">Events</a></div>
            <div><a href="About us.html" class="ma">About us</a></div>
            <div><a href="Contact us.html" class="ma">Contact us</a></div>
            <div><a href="donate.html">Donate</a></div>
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

<script>
  //script for the header
  function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<script>
  //script for the image slide
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
</body>
</html>