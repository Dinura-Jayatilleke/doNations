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
</head> 
<body>

    <h1 class="title">Cart</h1>
    <div class="table-responsive" width="65%">
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
</body>
</html>