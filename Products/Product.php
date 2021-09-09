<?php
  session_start();
  $db_name = "donations";
  $connection = mysqli_connect("localhost","root","",$db_name);

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

<title>Shopping Cart</title>
<style>
.mySlides {
  display:none;
}
</style>
</head>
<body>
<!-------------------------------------Header---------------------------------------->
<div class="topnav" id="myTopnav">
  <a href="#home">Home</a>
  <a href="#">Products</a>
  <a href="#">Events</a>
  <a href="#">About</a>
  <a href="#">Contact</a>
  <a href="cart.php">Cart</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<!-----------------------------------Image slide------------------------------------->
<div class="content">
  <img class="mySlides" src="Images\HeaderImages\image1.jpg">
  <img class="mySlides" src="Images\HeaderImages\image2.jpg">
  <img class="mySlides" src="Images\HeaderImages\image3.jpg">
  <img class="mySlides" src="Images\HeaderImages\image4.jpg">
  <img class="mySlides" src="Images\HeaderImages\image5.jpg">
</div>
<!-------------------------------------Products--------------------------------------> 
<h1 class="title">Products</h1>

<div class="pcontainer">
  <?php
    $query = "select * from product order by id asc";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
  ?>
  
  <div class="pro-con">
    <form method="post" action="nav bar.php?action=add&id=<?php echo $row["id"];?>">
      <div class="product">
        <img src="<?php echo $row["image"];?>" width="250px" height="auto" class="img-responsive">
        <h5 class="text-info"><?php echo $row["name"];?></h5>
        <h6><?php echo $row["description"];?></h6>
        <h5 class="text-danger">Rs. <?php echo $row["price"];?>/=</h5>
        <input type="text" name="quantity" class="form-control" value="1">
        <input type="hidden" name="hidden_name" value="<?php echo $row["description"];?>">
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