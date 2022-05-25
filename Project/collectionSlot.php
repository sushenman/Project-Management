<?php
    include('connection.php');
    session_start();
    if(isset($_GET['val'])){
        if(isset($_SESSION['customerlogedin'])){
            echo 'loged in';
            $dateValue =  $_GET['val'];
        
            $insertSlot = oci_parse($conn, 'INSERT INTO COLLECT_SLOT (SLOT_DATE) VALUES (:slot)');        
            oci_bind_by_name($insertSlot, ':slot', $dateValue);
        
            oci_execute($insertSlot, OCI_NO_AUTO_COMMIT);  // use OCI_DEFAULT for PHP <= 5.3.1
            oci_commit($conn);
            // oci_commit($conn);  // commits all new values: 1, 2, 3, 4, 5
            oci_free_statement($insertSlot);
        
            oci_close($conn);

        }else {
            echo 'not loged in';
            $_SESSION['message'] = 'Login to Confirm Collection Slot';
            header('location:cartDisplay.php');
        }

    }


    // header('location:checkout.php');
?>
<?php 
    
    // todays date in string
    $date = date("y-m-d");
    // get day from date

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <link rel="stylesheet" href="style/collectionslot.css">
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

                        echo "<div class ='table-heading'>";
                            echo "<span class='heading'>Products</span>";
                            echo "<span class='heading'>Quantity</span>";
                            echo "<span class='heading'>Amount</span>";
                        echo "</div>";

                        $totalAmount = 0;
                        $totalQuant = 0;
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
                               
                                $totalQuant = $totalQuant + $quant; 

                                echo "<div class='cart-items'>";                               
                                    echo "<div class='cart-items-image'>";
                                        echo "<img src='images/${imgName}' alt='cart-items'>";
                                    echo "</div>";
                                    echo "<span class='proName'>${productName}</span>";
                                    echo "<span class='price'>$${price}</span>";
                                    echo "<span class='qty'>${quant}</span>";
                                    echo "<span class='amount'>$${amount}</span>";
                                echo "</div>";
                                    
                            } 
                                
                        }
                        $vat = 0.04;
                        $total = $totalAmount+ $vat*$totalAmount;
                        $_SESSION['amount'] = $total;                      
                        echo '<div class="total">';
                            echo '<div class="calc-content">';
                                echo "<div class='heading'>";
                                    echo "<span>Sub-Total</span>";
                                    echo "<span>VAT</span>";
                                    echo "<span>Total</span>";                               
                                echo "</div>";
                                echo "<div class='calc-items'>";
                                    echo "<span>$${totalAmount}</span>";
                                    echo "<span>${vat}</span>";
                                    echo "<span>$${total}</span>";
                                echo "</div>";
                            echo '</div>';
                        echo '</div>';
                       
                       
                        echo "<div class='checkout'>
           
                            <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='POST' id='buyCredits' name='buyCredits'>
                
                                <input type='hidden' name='business' value='sb-kjs3i16600330@business.example.com'/>
                                <input type='hidden' name='cmd' value='_xclick'/>
                                <input type='hidden' name='amount' value='${total}'/>
                                <input type = 'hidden' name='quantity' value ='1'/>
                                <input type='hidden' name='currency_code' value='USD'/>
                                <input type='hidden' name='return' value='https://localhost/Project/payment.php'/>
                                <input type='submit' value='Proceed' name='proceed' class='proceed'>
                            </form>
                            
                       
                    </div> ";
                    }
                ?>
            </div>
        </div> 
    </div>                
    
</body>
</html>
