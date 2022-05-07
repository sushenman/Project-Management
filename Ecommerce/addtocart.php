<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to cart</title>
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>

<div class="yourcart">
        <h1>
            YOUR CART
        </h1>
       
    </div>
    <?php
    session_start();
     include "connection.php";
     if(isset($_POST['submit']))
     {
         $id = $_POST['Product_id'];
         //get the product id from the url
            $sql = "SELECT * FROM product where  Product_id = $id";
     $stid = oci_parse($conn, $sql);
     oci_execute($stid);
    ?>
    
    <div class="container-cart">
        
        <div class="cartbody">  
           <div class="cart">
            




            <?php
           
            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                echo "<div class='cart-items'>";
                echo "<div class='cart-items-image'>";
                echo "<img src='images/" . $row['IMAGE_NAME'] .  ".jpg' alt='cart-items'>";
                echo "</div>";
                echo "<div class='cart-details'>";
                echo "<div class='cart-items-name'>";
                echo "<p> Name: " . $row['PRODUCT_NAME'] . "</p>";
                echo "</div>";
                echo "<div class='cart-items-price'>";
                echo "<p> Price: " . $row['PRICE'] .  " </p>";
                echo "</div>";
               
                echo "<div class='cart-items-quantity'>";
                echo "<p> ";  
                echo 'Quantity <span><input type = "number" value = ' .$row['QUANTITY'] .'> </span>' ;
                echo  "</p>";
                echo "</div>";
                echo "</div>";
                echo "<div class='cart-remove-button'>";
                echo "<input type='submit' value='Remove' name = 'remove'>";
                echo "</div>";
                echo "</div>";
            }   
            
            ?>
           
        </div>
        <div class="cart">
            <div class="cart-checkout">
                <div class="cart-checkout2">
                <div class="cart-checkout-total">
                    <p>Total price </p>
                    <span>$ 
                        <?php 
                            //adding all the price displayed 
                            $sql = "SELECT * FROM product "; //get the product id from the url
                            $stid = oci_parse($conn, $sql);
                            oci_execute($stid);
                            $total = 0;
                            while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                $total = $total + ($row['PRICE'] * $row['QUANTITY']);
                            }
                            echo $total;

                            

                        ?>
                    </span>
                </div>
                <hr/>
                <div class="checkout-quantity">
                    <p>Total Items </p>
                   <span> 
                       <?php //adding all the quantity displayed
                        $sql = "SELECT * FROM product "; //get the product id from the url\
                        $stid = oci_parse($conn, $sql);
                        oci_execute($stid);
                        $total1 = 0;
                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                            $total1 = $total1 + $row['QUANTITY'];
                        }
                        echo $total1;

                        ?>
                    </span>
                </div>
 
                <div class="cart-checkout-button">
                   <input type="submit" value="Proceed to Checkout">
                </div>
                </div>
            </div>
            <?php
            }
            else{
                echo "No items in cart";
            }
            
            ?>  
        </div>
        </div>
        </div>
    </div>
    <?php
    $today = date('h-i-s, j-m-y'); 
    echo $today;
    ?>
</body>
</html>