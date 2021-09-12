<?php
  session_start();
  include_once 'connection.php';
  
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
    <link rel="stylesheet" type="text/css" href="ProductStyles.css">

    <!--bootstrap-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!--font style-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {
  background-image: url("Images\HeaderImages\image1.jpg");
  background-repeat: no-repeat;
}
</style>
</head>

<body>
<div class="topnav" id="myTopnav">
  <a href="#home">Home</a>
  <a href="Product.php">Products</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<h1 class="title">Cart</h1>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th width="50%">Product Name</th>
            <th width="5%">Quantity</th>
            <th width="15%">Price Details</th>
            <th width="15%">Total Price</th>
            <th width="15%">Remove Item</th>
        </tr>

        <?php
        if(!empty($_SESSION["shopping_cart"])){
            $total=0;
        foreach($_SESSION["shopping_cart"] as $key => $value){
        ?>
            
        <tr>
            <td><?php echo $value["product_name"];?></td>
            <td><?php echo $value["product_quantity"];?></td>
            <td><?php echo $value["product_price"];?></td>
            <td><?php echo number_format($value["product_quantity"]*$value["product_price"],2);?></td>   
            <td><a href="cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>
        </tr>

        <?php
        $total = $total + ($value["product_quantity"]*$value["product_price"]);
            }
        ?>

        <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right"><?php echo number_format($total,2);?></td>
            <td></td>
        </tr>
              
        <?php
            }
        ?>
    </table>
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
                <a href="index.html"><img src="Images/logo.png" height="70px" width="140px"></a>
            </div>
        </div>
        
        <div class="sec ourdetails">
            <div class="topic" style="margin-left: 0px;">Our Details</div>
            <div><a href="index.html" class="ma">Home</a></div>
            <div><a href="#" class="ma">Products</a></div>
            <div><a href="#" class="ma">Donors</a></div>
            <div><a href="About us.html" class="ma">About us</a></div>
            <div><a href="Contact us.html" class="ma">Contact us</a></div>
            <div><a href="#" class="ma">Donate</a></div>
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