<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="style/index1.css">
    <link rel="stylesheet" href="style/shop.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
</head>
<body>
    <div class="shop-container">
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
        <!-- SHOP BANNER -->
        <div class="path-banner">
            <h4>HOME/SHOP</h4>
        </div>

        <!-- SORTING -->
        <div class="select">
            <form action="shop.php" method="POST">
                <select name="select" id="sort">
                    <option value="0">Sort By</option>
                    <option value="1">Alphabetical</option>
                    <option value="2">Price(Ascending)</option>
                </select>
                <button type="submit" name="submit-select">Select</button>
            </form>
        </div>
        <!-- CONTENT -->
        <div class="shop-contents">
            <div class="category">
                <h4>Category</h4>
                <form action="shop.php" method="POST">
                    <div class="cat-input">
                        <input type="radio" name="category" value="fish" id="fish">
                        <label for="fish">Fish Monger</label>
                    </div>
                    <div class="cat-input">
                        <input type="radio" name="category" value="meat" id="meat">
                        <label for="meat">Meat</label>
                    </div>
                    <div class="cat-input">
                        <input type="radio" name="category" value="grocery" id="grocery">
                        <label for="grocery">Grocery</label>
                    </div>
                    <div class="cat-input">
                        <input type="radio" name="category" value="deli" id="deli">
                        <label for="deli">Delisacence</label>
                    </div>
                    <div class="enter">
                        <input type="submit" value="Select" name="submit-radio">
                    </div>
                </form>
            </div>
            <!-- MAIN-CONTENT -->
            <div class="main-content">
                <h4 class="product-heading">All Products</h4>
                <div class="product-container">
                    <?php
                        // Display values for category
                        if(isset($_POST['submit-radio'])){
                            $val = $_POST['category'];
                            echo $val;
                            if($val == 'meat'){
                                include('connection.php');
                                $selectProduct = 
                                    "SELECT p.product_id,p.image_name,p.product_name, p.price, c.category_type
                                        FROM PRODUCT p, CATEGORY c
                                        WHERE p.fk2_category_id = c.category_id
                                        AND c.category_type = 'meat'
                                    ";
                                $selectShop = oci_parse($conn,$selectProduct);
                                oci_execute($selectShop);                 
                                while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
                                    $imgName = $row['IMAGE_NAME'];
                                    $productName = $row['PRODUCT_NAME'];
                                    $proId = $row['PRODUCT_ID'];
                                    $price = $row['PRICE'];

                                    // select offer
                                    $offerVal = 0;
                                    $selectOffer = "SELECT *FROM OFFER WHERE FK1_PRODUCT_ID = $proId";
                                    $parseOffer = oci_parse($conn,$selectOffer);
                                    oci_execute($parseOffer);
                                    if (($row = oci_fetch_array($parseOffer, OCI_BOTH)) != false) {
                                        $offerVal =  $row['OFFER_AMOUNT'];
                                    }
                                    echo "<form action='cart.php?action=add&id=${proId}' method='POST'>";
                                        echo '<div class="card">';
                                            echo "<a href='viewProduct.php?id=${proId}'>";
                                                echo "<img src='./images/${imgName}' alt='img'>";                              
                                            echo "</a>";
                                            echo "<h3 class='offer'>$$offerVal Off</h3>";
                                            echo "<h3>${productName}</h3>";
                                            echo "<h3>$${price}</h3>";
                                            echo "<input type='number' name='quantity' placeholder='Add Quantity' class='quantity' value='1'>";
                                            echo "<input type='submit' value='Add To Cart' class='btn-addCart' name='submit'>";
                                        echo '</div>';
                                    echo '</form>';
                                }                                 
                            }else if($val == 'grocery'){
                                include('connection.php');
                                $selectProduct = 
                                    "SELECT p.product_id,p.image_name,p.product_name, p.price, c.category_type
                                        FROM PRODUCT p, CATEGORY c
                                        WHERE p.fk2_category_id = c.category_id
                                        AND c.category_type = 'grocery'
                                    ";
                                $selectShop = oci_parse($conn,$selectProduct);
                                oci_execute($selectShop);                 
                                while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
                                    $imgName = $row['IMAGE_NAME'];
                                    $productName = $row['PRODUCT_NAME'];
                                    $proId = $row['PRODUCT_ID'];
                                    $price = $row['PRICE'];

                                    // select offer
                                    $offerVal = 0;
                                    $selectOffer = "SELECT *FROM OFFER WHERE FK1_PRODUCT_ID = $proId";
                                    $parseOffer = oci_parse($conn,$selectOffer);
                                    oci_execute($parseOffer);
                                    if (($row = oci_fetch_array($parseOffer, OCI_BOTH)) != false) {
                                        $offerVal =  $row['OFFER_AMOUNT'];
                                    }
                                    echo "<form action='cart.php?action=add&id=${proId}' method='POST'>";
                                        echo '<div class="card">';
                                            echo "<a href='viewProduct.php?id=${proId}'>";
                                                echo "<img src='./images/${imgName}' alt='img'>";                              
                                            echo "</a>";
                                            echo "<h3 class='offer'>$$offerVal Off</h3>";
                                            echo "<h3>${productName}</h3>";
                                            echo "<h3>$${price}</h3>";
                                            echo "<input type='number' name='quantity' placeholder='Add Quantity' class='quantity' value='1'>";
                                            // echo "<input type='' value='${}' class='btn-addCart' name='submit'>";
                                            echo "<input type='submit' value='Add To Cart' class='btn-addCart' name='submit'>";
                                            echo "<input type='submit' value='Add To Cart' class='btn-addCart' name='submit'>";
                                        echo '</div>';
                                    echo '</form>';
                                }                                                                 
                            }else if($val == 'deli'){
                                include('connection.php');
                                $selectProduct = 
                                    "SELECT p.product_id,p.image_name,p.product_name, p.price, c.category_type
                                        FROM PRODUCT p, CATEGORY c
                                        WHERE p.fk2_category_id = c.category_id
                                        AND c.category_type = 'deliscancence'
                                    ";
                                $selectShop = oci_parse($conn,$selectProduct);
                                oci_execute($selectShop);                 
                                while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
                                    $imgName = $row['IMAGE_NAME'];
                                    $productName = $row['PRODUCT_NAME'];
                                    $proId = $row['PRODUCT_ID'];
                                    $price = $row['PRICE'];
                                    // select offer
                                    $offerVal = 0;
                                    $selectOffer = "SELECT *FROM OFFER WHERE FK1_PRODUCT_ID = $proId";
                                    $parseOffer = oci_parse($conn,$selectOffer);
                                    oci_execute($parseOffer);
                                    if (($row = oci_fetch_array($parseOffer, OCI_BOTH)) != false) {
                                        $offerVal =  $row['OFFER_AMOUNT'];
                                    }
                                    echo "<form action='cart.php?action=add&id=${proId}' method='POST'>";
                                        echo '<div class="card">';
                                            echo "<a href='viewProduct.php?id=${proId}'>";
                                                echo "<img src='./images/${imgName}' alt='img'>";                              
                                            echo "</a>";
                                            echo "<h3 class='offer'>$$offerVal Off</h3>";
                                            echo "<h3>${productName}</h3>";
                                            echo "<h3>$${price}</h3>";
                                            echo "<input type='number' name='quantity' placeholder='Add Quantity' class='quantity' value='1'>";
                                            echo "<input type='submit' value='Add To Cart' class='btn-addCart' name='submit'>";
                                        echo '</div>';
                                    echo '</form>';                               
                                }
                            }else if($val == 'fish'){
                                include('connection.php');
                                $selectProduct = 
                                    "SELECT p.product_id,p.image_name,p.product_name, p.price, c.category_type
                                        FROM PRODUCT p, CATEGORY c
                                        WHERE p.fk2_category_id = c.category_id
                                        AND c.category_type = 'fish'
                                    ";
                                $selectShop = oci_parse($conn,$selectProduct);
                                oci_execute($selectShop);                 
                                while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
                                    $imgName = $row['IMAGE_NAME'];
                                    $productName = $row['PRODUCT_NAME'];
                                    $proId = $row['PRODUCT_ID'];
                                    $price = $row['PRICE'];

                                    // select offer
                                    $offerVal = 0;
                                    $selectOffer = "SELECT *FROM OFFER WHERE FK1_PRODUCT_ID = $proId";
                                    $parseOffer = oci_parse($conn,$selectOffer);
                                    oci_execute($parseOffer);
                                    if (($row = oci_fetch_array($parseOffer, OCI_BOTH)) != false) {
                                        $offerVal =  $row['OFFER_AMOUNT'];
                                    }
                                    echo "<form action='cart.php?action=add&id=${proId}' method='POST'>";
                                        echo '<div class="card">';
                                            echo "<a href='viewProduct.php?id=${proId}'>";
                                                echo "<img src='./images/${imgName}' alt='img'>";                              
                                            echo "</a>";
                                            echo "<h3 class='offer'>$$offerVal Off</h3>";
                                            echo "<h3>${productName}</h3>";
                                            echo "<h3>$${price}</h3>";
                                            echo "<input type='number' name='quantity' placeholder='Add Quantity' class='quantity' value='1'>";
                                            echo "<input type='submit' value='Add To Cart' class='btn-addCart' name='submit'>";
                                        echo '</div>';
                                    echo '</form>';                               
                                }                                
                            }else {
                                echo 'Product Not Found';
                            }
                        }else if(isset($_POST['submit-select'])){ // display value while sorting
                            $value = $_POST['select'];
                            if($value == '1'){               // display value alphabetically
                                include('connection.php');
                                $selectProduct = "SELECT *FROM PRODUCT ORDER BY LOWER(PRODUCT_NAME)";
                                $selectShop = oci_parse($conn,$selectProduct);
                                oci_execute($selectShop);                 
                                while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
                                    $imgName = $row['IMAGE_NAME'];
                                    $productName = $row['PRODUCT_NAME'];
                                    $proId = $row['PRODUCT_ID'];
                                    $price = $row['PRICE'];

                                    // select offer
                                    $offerVal = 0;
                                    $selectOffer = "SELECT *FROM OFFER WHERE FK1_PRODUCT_ID = $proId";
                                    $parseOffer = oci_parse($conn,$selectOffer);
                                    oci_execute($parseOffer);
                                    if (($row = oci_fetch_array($parseOffer, OCI_BOTH)) != false) {
                                        $offerVal =  $row['OFFER_AMOUNT'];
                                    }
                                    echo "<form action='cart.php?action=add&id=${proId}' method='POST'>";
                                        echo '<div class="card">';
                                            echo "<a href='viewProduct.php?id=${proId}'>";
                                                echo "<img src='./images/${imgName}' alt='img'>";                              
                                            echo "</a>";
                                            echo "<h3 class='offer'>$$offerVal Off</h3>";
                                            echo "<h3>${productName}</h3>";
                                            echo "<h3>$${price}</h3>";
                                            echo "<input type='number' name='quantity' placeholder='Add Quantity' class='quantity' value='1'>";
                                            echo "<input type='submit' value='Add To Cart' class='btn-addCart' name='submit'>";
                                        echo '</div>';
                                    echo '</form>';
                                } 
                            }else {    // display value in ascending order
                                include('connection.php');
                                $selectProduct = "SELECT *FROM PRODUCT ORDER BY PRICE ASC";
                                $selectShop = oci_parse($conn,$selectProduct);
                                oci_execute($selectShop);                 
                                while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
                                    $imgName = $row['IMAGE_NAME'];
                                    $productName = $row['PRODUCT_NAME'];
                                    $proId = $row['PRODUCT_ID'];
                                    $price = $row['PRICE'];
                                    
                                    // select offer
                                    $offerVal = 0;
                                    $selectOffer = "SELECT *FROM OFFER WHERE FK1_PRODUCT_ID = $proId";
                                    $parseOffer = oci_parse($conn,$selectOffer);
                                    oci_execute($parseOffer);
                                    if (($row = oci_fetch_array($parseOffer, OCI_BOTH)) != false) {
                                        $offerVal =  $row['OFFER_AMOUNT'];
                                    }
                                    echo "<form action='cart.php?action=add&id=${proId}' method='POST'>";
                                        echo '<div class="card">';
                                            echo "<a href='viewProduct.php?id=${proId}'>";
                                                echo "<img src='./images/${imgName}' alt='img'>";                              
                                            echo "</a>";
                                            echo "<h3 class='offer'>$$offerVal Off</h3>";
                                            echo "<h3>${productName}</h3>";
                                            echo "<h3>$${price}</h3>";
                                            echo "<input type='number' name='quantity' placeholder='Add Quantity' class='quantity' value='1'>";
                                            echo "<input type='submit' value='Add To Cart' class='btn-addCart' name='submit'>";
                                        echo '</div>';
                                    echo '</form>';
                                } 

                            }

                        }else{      // display while going to shop page
                            include('connection.php');
                            // select product
                            $selectProduct = "SELECT *FROM PRODUCT";
                            $selectShop = oci_parse($conn,$selectProduct);
                            oci_execute($selectShop);
                            

                            while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
                                $imgName = $row['IMAGE_NAME'];
                                $productName = $row['PRODUCT_NAME'];
                                $proId = $row['PRODUCT_ID'];
                                $price = $row['PRICE'];
                                
                                // select offer
                                $offerVal = 0;
                                $selectOffer = "SELECT *FROM OFFER WHERE FK1_PRODUCT_ID = $proId";
                                $parseOffer = oci_parse($conn,$selectOffer);
                                oci_execute($parseOffer);
                                if (($row = oci_fetch_array($parseOffer, OCI_BOTH)) != false) {
                                    $offerVal =  $row['OFFER_AMOUNT'];
                                }

                                // if(isset($_SESSION['error-msg'])){
                                //     echo "<div class='message-error'>";
                                //         echo $_SESSION['error-msg'];
                                //     echo "</div>";
                                // }
                               
                                echo "<form action='cart.php?action=add&id=${proId}' method='POST'>";
                                    if(isset($_SESSION['pId'])){           
                                        if($proId == $_SESSION['pId']){
                                            echo "<div class='error'>";
                                                echo $_SESSION['error-msg'];
                                            echo "</div>";
                                            // unset($_SESSION['error-msg']);
                                            
                                        }
                                    }
                                    echo '<div class="card">';
                                        echo "<a href='viewProduct.php?id=${proId}'>";
                                            echo "<img src='./images/${imgName}' alt='img'>";                              
                                        echo "</a>";
                                        echo "<h3 class='offer'>$$offerVal Off</h3>";
                                        echo "<h3>${productName}</h3>";
                                        echo "<h3>$${price}</h3>";
                                        echo "<input type='number' name='quantity' placeholder='Add Quantity' class='quantity' value='1'>";
                                        // echo "<input type='text' value='${productName}' name='productName'>";
                                        // echo "<input type='text' value='${price}' name='price'>";
                                        echo "<input type='submit' value='Add To Cart' class='btn-addCart' name='submit'>";
                                    echo '</div>';
                                echo '</form>';
                            }                                   

                        }
                    ?>
                </div>

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
    <script src="javascript/overlay.js"></script>  
    <script src="javascript/offer.js"></script>
</body>
</html>