<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style/index1.css">
    <link rel="stylesheet" href="style/searchpage.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
</head>
<body>
    <div class="container">
        <!-- Hidden Navigation -->
        <div class="nav">
            <div class="overlay">
                <ul class="hidden-nav">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="shop.php">SHOP</li>
                    <li class="dropdown">
                        <?php 
                            if(isset($_SESSION['customerlogedin'])){
                                echo "<span> <a href = 'logoutCustomer.php'>LOGOUT</></span>";
                            }else {
                                echo "<span>Jpt</span>";
                                echo "<div class='drop-menu'>";
                                    echo "<span> <a href = 'customerLoginForm.php'>Customer</></span>";
                                    echo "<span> <a href = 'traderLoginForm.php'>Trader</></span>";    
                                echo '<div>';
                            }
                        ?>
                    </li>
                    <li><a href="cartDisplay.php">
                        <i class="fa fa-shopping-cart"></i>
                        <?php
                            if(isset($_SESSION['mycart'])){
                                echo count($_SESSION['mycart']);
                            }else {
                                echo 'nothing';
                            }
                        ?>
                    </a></li>
                </ul>

            </div>
        </div>
        <!-- HEADER -->
        <div class="heading">
            <div class="logo-container">
                <a href="index.php">
                    <img src="logo/cmart.png" alt="logoimage"/></a>
            </div>
            <div class="form">
                <form action="searchPage.php" method="post">
                    <div class="search-bar">
                        <input type="text" name="search" id="search" placeholder="Search..">
                        <button type="submit" class="btn"name="submit-search">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <!-- Navigation Bar -->
            <ul class="navbar">
                <li class="cl"><a href="index.php">HOME</a></li>
                <li><a href="shop.php">SHOP</a></li>
                <li class="dropdown">
                    <?php 
                        if(isset($_SESSION['customerlogedin'])){
                            // echo 'something';
                            echo "<span><a href = 'logoutCustomer.php?logout=1'>LOGOUT</></span>";
                        }else {
                            // echo 'not loged in';
                            echo "<span>LOGIN</span>";
                            echo "<div class='drop-menu'>";
                                echo "<span> <a href = 'customerLoginForm.php'>Customer</></span>";
                                echo "<span> <a href = 'traderLoginForm.php'>Trader</></span>";    
                            echo '<div>';
                        }
                    ?>
                    <!-- <span>LOGIN</span>
                    <div class="drop-menu">
                            <span><a href="customerLoginForm.php">Customer</a></span>
                            <span><a href="traderLoginForm.php">Trader</a></span>
                    </div> -->
                </li>
                <li><a href="cartDisplay.php">
                    <i class="fa fa-shopping-cart"></i>
                    <?php
                        if(isset($_SESSION['mycart'])){
                            echo count($_SESSION['mycart']);
                        }else {
                            echo 'nothing';
                        }
                    ?>
                </a></li>
                <li>
                    <?php 
                        if(isset($_SESSION['customername'])){
                            echo '<span>';
                                echo $_SESSION['customername'];
                            echo '</span>';
                        }
                    ?>
                </li>
            </ul>
            <div class="hamburger">
                <div class="line-1"></div>
                <div class="line-2"></div>
                <div class="line-3"></div>
            </div>
        </div>
        <!-- Search Container -->
        <div class="search-container">
            <!-- Search Banner -->           
            <div class="search-banner">
               <h4>HOME/SEARCH</h4>
            </div>
            <!-- Content -->
            <div class="content">
                <!-- Best Seller -->
                <h3>Products</h3>
                <div class="card-container">
                    <?php
                        if((isset($_POST['submit-search']))){
                            $inputVal = htmlspecialchars($_POST['search']);
                            $lowerCase = strtolower($inputVal);
                            $errorMsg = '';
                            if(empty($lowerCase)){
                                $errorMsg = 'no-match-found';
                                echo $errorMsg;
                            }else {                               
                                include('connection.php');
                                $selectProd = "SELECT *FROM PRODUCT WHERE LOWER(PRODUCT_NAME) LIKE '%${lowerCase}%'";
                                $imgName = '';
                                $productName = '';
                                $proId = 0;
                                $price = 0;

                                $count = 0;
                                $offerVal = 0;
                                $selectItem = oci_parse($conn,$selectProd);
                                oci_execute($selectItem);                  
                                while (($row = oci_fetch_array($selectItem, OCI_BOTH)) != false) {                            
                                    $count++;
                                    $imgName = $row['IMAGE_NAME'];
                                    $productName = $row['PRODUCT_NAME'];
                                    $proId = $row['PRODUCT_ID'];
                                    $price = $row['PRICE'];

                                    // select offer

                                    $selectOffer = "SELECT *FROM OFFER WHERE FK1_PRODUCT_ID = $proId";
                                    $parseOffer = oci_parse($conn,$selectOffer);
                                    oci_execute($parseOffer);
                                    if (($row = oci_fetch_array($parseOffer, OCI_BOTH)) != false) {
                                        $offerVal =  $row['OFFER_AMOUNT'];
                                    }

                                }
                                if($count == 1){
                                    echo 'match found';
                                    echo "<form action='cart.php?action=add&id=${proId}' method='POST'>";
                                        echo '<div class="card">';
                                            echo "<img src='./images/${imgName}' alt='img'>";
                                            echo "<h3 class='offer'>$$offerVal Off</h3>";
                                            echo "<h3>${productName}</h3>";
                                            echo "<h3>$${price}</h3>";
                                            echo "<input type='number' name='quantity' placeholder='Add Quantity' class='quantity' value='1'>";
                                            echo "<input type='submit' value='Add To Cart' class='btn-addCart' name='submit'>";
                                        echo '</div>';
                                    echo '</form>';
                                }else {
                                    echo 'no-match found';
                                    echo  '<div class= "no_match"> </div>'; 
                                }
                            }
                        }
                    ?>
                </div>
    
            </div>

        </div>
        <!-- FOOTER -->  
        <div class="foot">
        <div class="footer">
                <div class="about">
                    <div class="aboutus">
                        <h3>About Us</h3>
                    </div>
                    <div class="aboutbody">
                         <p> We are online e-commerce 
                    Website located at Cleckhudderfax which allows costumer to directly buy goods or services from a seller over the Internet using a web browser or 
                    a mobile app.</p>
                    </div>
                    
                  
                </div>

                <!-- CONTACT DETAIL -->
                <div class="contact-detail">
                    <h3>Contact Info</h3>
                    <div class="location">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>CleckHudderFax, UK</p>
                    </div>
                    <div class="location">
                        <i class="fas fa-phone"></i>
                        <p>+44 908765548</p>
                    </div>
                    <div class="media">
                        <span class="social">
                            <a href="#" class="fab fa-facebook"></a>
                        </span>
                        <span class="social">
                            <a href="#" class="fab fa-twitter"></a>
                        </span>
                        <span class="social">
                            <a href="#" class="fab fa-instagram"></a>
                        </span>
                    </div>
                </div>
                <div class="link">
                    <div class="linkhead">
                         <h3>Quick links</h3>
                    </div>
                     <div class="linkclick">
                       <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="customerloginform.php">Login</a></li>
                    </ul>   
                     </div>
                   
                </div>
            </div>        
         <!-- COPY RIGHT -->
        <div class="copy">
            <p>All Rights Reserved</p>
        </div>
    </div>
    </div>
    <script src="javascript/script.js"></script>
    <script src="javascript/hamburger.js"></script> 
    <script src="javascript/dropdown.js"></script> 
    <script src="javascript/addCart.js"></script> 
</body>
</html>