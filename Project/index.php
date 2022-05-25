<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style/index.css">
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
                                echo '0';
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
                </li>
                <li><a href="cartDisplay.php">
                    <i class="fa fa-shopping-cart"></i>
                    <?php
                        if(isset($_SESSION['mycart'])){
                            echo count($_SESSION['mycart']);
                        }else {
                            echo '0';
                        }
                    ?>
                </a></li>
                <li>
                    <?php 
                        if(isset($_SESSION['customername'])){
                            echo '<span>';
                                echo $_SESSION['customername'];
                            echo '</span>';
                        }else {
                            echo '<span>';
                                echo'<i class="fa fa-user"></i>';
                            echo '<span>';
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
        <div class="hero-image">
            <!-- SLIDER -->           
            <div class="slide-container">
                <div class="banner">
                    <img name="slide">
                </div>
                <div class="slide-content">
                    <h2>Click and Shop</h2>
                    <div class="button">
                        <a href="shop.php">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="content">
            <!-- Best Seller -->
            <h3 class="underline">Best Seller</h3>
            <div class="card-container">
                <?php
                    include('connection.php');
                    $orderDetail = "SELECT 
                                p.product_id, SUM(QUANTITY_ORDERED)
                                FROM
                                product p
                                INNER JOIN
                                order_detail d ON d.fk1_product_id = p.product_id
                                GROUP BY d.fk1_product_id                
                                ORDER BY SUM(QUANTITY_ORDERED) DESC";
                    $executeDetail = oci_parse($conn,$orderDetail);
                    oci_execute($executeDetail); 
                    // array to hold best seller id                
                    $items = array();               
                    while (($row = (oci_fetch_array($executeDetail, OCI_BOTH))) != false) {
                        $value =  $row['PRODUCT_ID'];
                        array_push($items,$value);
                    }

                    for($i = 0; $i<4;$i++){
                        $selectPro = "SELECT *FROM PRODUCT WHERE PRODUCT_ID = $items[$i]";
                        $executeProduct = oci_parse($conn,$selectPro);
                        oci_execute($executeProduct);                 
                        if (($row = oci_fetch_array($executeProduct, OCI_BOTH)) != false) {
                            $imgName = $row['IMAGE_NAME'];
                            $productName = $row['PRODUCT_NAME'];
                            $proId = $row['PRODUCT_ID'];
                            $price = $row['PRICE'];
    
                            // offer
                            $offerVal = 0;
                            $selectOffer = "SELECT *FROM OFFER WHERE FK1_PRODUCT_ID = $items[$i]";
                            $parseOffer = oci_parse($conn,$selectOffer);
                            oci_execute($parseOffer);
                            if (($row = oci_fetch_array($parseOffer, OCI_BOTH)) != false) {
                                 $offerVal =  $row['OFFER_AMOUNT'];
                            }
                            echo '<div class="card">';
                                echo "<a href='viewProduct.php?id=${proId}'>";
                                    echo "<img src='./images/${imgName}' alt='img'>";                              
                                echo "</a>";
                                echo "<h3 class='offer'>$$offerVal Off</h3>";
                                echo "<h3>${productName}</h3>";
                                echo "<h3>$${price}</h3>"; 
                                echo "<a href='viewProduct.php?id=${proId}' class='view-btn'>";
                                    echo "View";
                                echo "</a>";
                            echo '</div>';
                        }   
                    }
                    
                                                  
                ?>
            </div>

            <!-- New Arrivals -->
            <h3 class="underline-1">Arrivals</h3>
            <div class="card-container">
                <?php
                    include('connection.php');
                    // product
                    $selectProduct = "SELECT *FROM PRODUCT";
                    $selectShop = oci_parse($conn,$selectProduct);
                    oci_execute($selectShop);                 
                    while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
                        $imgName = $row['IMAGE_NAME'];
                        $productName = $row['PRODUCT_NAME'];
                        $proId = $row['PRODUCT_ID'];
                        $price = $row['PRICE'];

                        // offer
                        $offerVal = 0;
                        $selectOffer = "SELECT *FROM OFFER WHERE FK1_PRODUCT_ID = $proId";
                        $parseOffer = oci_parse($conn,$selectOffer);
                        oci_execute($parseOffer);
                        if (($row = oci_fetch_array($parseOffer, OCI_BOTH)) != false) {
                             $offerVal =  $row['OFFER_AMOUNT'];
                        }
                        echo '<div class="card">';
                            echo "<a href='viewProduct.php?id=${proId}'>";
                                echo "<img src='./images/${imgName}' alt='img'>";                              
                            echo "</a>";
                            echo "<h3 class='offer'>$$offerVal Off</h3>";
                            echo "<h3>${productName}</h3>";
                            echo "<h3>$${price}</h3>"; 
                            echo "<a href='viewProduct.php?id=${proId}' class='view-btn'>";
                                echo "View";
                            echo "</a>";
                        echo '</div>';
                    }                                   
                ?>
            </div>
        </div>
       
       <!-- FOOTER -->
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
    <script src="javascript/slidescript.js"></script>
    <script src="javascript/overlay.js"></script>
    <script src="javascript/offer.js"></script>
</body>
</html>