<?php 
    session_start();
    // echo $_SESSION['customerId'];
    // when remove button is clicked session for cart is unset
    if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        unset($_SESSION['mycart'][$id]);
        header('location:cartDisplay.php');
    }

    // todays date in string
    $date = date("y-m-d");
    // get day from date
    $day = date("D",strtotime($date));
    if($day === 'Sun'){
        // adding days 
        $wedDate = strtotime($date."+ 3 days");
        $thursDate = strtotime($date."+ 4 days");
        $friDate = strtotime($date."+ 5 days");
    }else if($day == 'Mon'){
        $wedDate = strtotime($date."+ 2 days");
        $thursDate = strtotime($date."+ 3 days");
        $friDate = strtotime($date."+ 4 days");
    }else if($day == 'Tue'){
        $wedDate = strtotime($date."+ 1 days");
        $thursDate = strtotime($date."+ 2 days");
        $friDate = strtotime($date."+ 3 days");
    }else if($day == 'Wed'){
        $wedDate = strtotime($date."+ 1 days");
        $thursDate = strtotime($date."+ 2 days");
        $friDate = strtotime($date."+ 7 days");
    }else if($day == 'Thu'){
        $wedDate = strtotime($date."+ 1 days");
        $thursDate = strtotime($date."+ 6 days");
        $friDate = strtotime($date."+ 7 days");
    }else if($day == 'Fri'){
        $wedDate = strtotime($date."+ 5 days");
        $thursDate = strtotime($date."+ 6 days");
        $friDate = strtotime($date."+ 7 days");
    }else {
        $wedDate = strtotime($date."+ 4 days");
        $thursDate = strtotime($date."+ 5 days");
        $friDate = strtotime($date."+ 6 days");
    }

    $wednesday =  date("m-d-y",$wedDate);
    $thursday =  date("m-d-y",$thursDate);
    $friday = date("m-d-y",$friDate);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to cart</title>
    <link rel="stylesheet" href="style/cartdisplay.css">
    <!-- <link rel="stylesheet" href="style/index.css"> -->
</head>
<body>
    <div class=" cart-container">   
        <div class="cart-content">

            <div class="cartbody">
                <?php
                    if(!isset($_SESSION['mycart']) || count($_SESSION['mycart']) == 0){
                        echo "<h1 class='no-item'>No items in cart</h1>";
                        echo "<a href='shop.php' class='continue'>Continue Shopping</a>";
                    }else {
                        // if(isset($_SESSION['message'])){
                        //     echo "<span class= 'msg'>";
                        //         echo $_SESSION['message'];
                        //     echo "<span>";
                        // }
                        echo "<div class ='table-heading'>";
                            echo "<span class='heading'>Products</span>";
                            echo "<span class='heading'>Quantity</span>";
                            echo "<span class='heading'>Amount</span>";
                        echo "</div>";

                        $totalAmount = 0;
                        foreach($_SESSION['mycart'] as $key => $val){
                            include('connection.php');
                            $selectProduct = "SELECT *FROM PRODUCT WHERE PRODUCT_ID = $key";
                            $selectShop = oci_parse($conn,$selectProduct);
                            oci_execute($selectShop);    
                            while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {                           
                                $imgName = $row['IMAGE_NAME'];
                                $productName = $row['PRODUCT_NAME'];
                                $proId = $row['PRODUCT_ID'];
                                $price = $row['PRICE'];
                                $quant = $val['qty'];
                                $amount = $price*$quant;
                                $totalAmount = $totalAmount + $amount;
                               
                                echo "<div class='cart-items'>";                               
                                    echo "<div class='cart-items-image'>";
                                        echo "<img src='images/${imgName}' alt='cart-items'>";
                                    echo "</div>";
                                    echo "<span class='proName'>${productName}</span>";
                                    echo "<span class='price'>$${price}</span>";
                                    echo "<a href='cartDisplay.php?remove=${proId}' class='remove'>Remove</a>";
                                    echo "<span class='qty'>${quant}</span>";
                                    echo "<span class='amount'>$${amount}</span>";
                                echo "</div>";
                                    
                            } 
                                
                        }
                        $vat = 0.04;
                        $total = $totalAmount+ $vat*$totalAmount;
                        $_SESSION['amount'] = $total;
                        echo "<div class='total-slot'>";
                            echo '<div class="slot">';
                            
                                echo "<form action='collectionSlot.php?val=${wednesday}' method='POST'>";
                                    echo "<input type='submit' name='wed' class='time'value='Wednesday(10-13)' >";
                                echo "</form>";
                                echo "<form action='collectionSlot.php?val=${thursday}' method='POST'>";
                                    echo "<input type='submit' name='thurs' class='time' value='Thursday'>";
                                echo "</form>";
                                echo "<form action='collectionSlot.php?val=${friday}' method='POST'>";
                                    echo "<input type='submit' name= 'fri' class='time' value='Friday'>";
                                echo "</form>";
                            echo '</div>';
                            echo '<div class="total">';
                                echo "<div class='items'>";
                                    echo "<span>Sub-Total</span>";
                                    echo "<span>$${totalAmount}</span>";
                                echo "</div>";
                                echo "<div class='items'>";
                                    echo "<span>VAT</span>";
                                    echo "<span>${vat}</span>";
                                echo "</div>";
                                echo "<div class='items'>";
                                    echo "<span>Total</span>";
                                    echo "<span>$${total}</span>";
                                echo "</div>";

                            echo '</div>';
                        echo "</div";

                    }
                ?>
            </div>
        </div> 
        <div class="checkout">
            <!-- <a href="#" class="proceed-btn">Proceed</a> -->
        </div>            
    </div>
    <script src='javascript/disablebutton.js'></script>
</body>
</html>