<?php 
    session_start();
    // if(!isset($_SESSION['customerlogedin']) || $_SESSION['customerlogedin']!= true){
    //     // header('Location:index.php');
    //     echo 'something';
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style/main.css">
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
        <div class="hero-image">
            <!-- SLIDER -->           
            <div class="slide-container">
                <div class="banner">
                    <img name="slide">
                </div>
                <div class="slide-content">
                    <h2>Click and Shop</h2>
                    <div class="button">
                        <a href="#shop">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="content">
            <!-- Best Seller -->
            <h3 class="underline">Best Seller</h3>
            <!-- <div class="card-container">
                <div class="card">
                    <img src="./second image/chicken.jpg" alt="">
                    <h3>Chicken</h3>
                    <h3>Price</h3>
                </div>   
                <div class="card">
                    <img src="./second image/chicken.jpg" alt="">
                    <h3>Chicken</h3>
                    <h3>Price</h3>
                </div>        
                <div class="card">
                    <img src="./second image/chicken.jpg" alt="">
                    <h3>Chicken</h3>
                    <h3>Price</h3>
                </div>            
                <div class="card">
                    <img src="./second image/chicken.jpg" alt="">
                    <h3>Chicken</h3>
                    <h3>Price</h3>
                </div>            
            </div> -->
            <!-- New Arrivals -->
            <h3 class="underline-1">Arrivals</h3>
            <div class="card-container">
                <?php
                    include('connection.php');
                    $selectProduct = "SELECT *FROM PRODUCT";
                    $selectShop = oci_parse($conn,$selectProduct);
                    oci_execute($selectShop);                 
                    while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
                        $imgName = $row['IMAGE_NAME'];
                        $productName = $row['PRODUCT_NAME'];
                        $proId = $row['PRODUCT_ID'];
                        $price = $row['PRICE'];
                            echo '<div class="card">';
                                echo "<a href='viewProduct.php?id=${proId}'>";
                                    echo "<img src='./images/${imgName}' alt='img'>";                              
                                echo "</a>";
                                echo "<h3>${productName}</h3>";
                                echo "<h3>${price}</h3>"; 
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
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi atque sequi perspiciatis laborum perferendis reiciendis architecto ratione quas magni, et officia. Exercitationem ducimus libero mollitia voluptate ea perspiciatis voluptatibus temporibus.
                </p>
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
                <h3>Quick links</h3>
                <ul>
                    <li><a href="home">Home</a></li>
                    <li><a href="home">Shop</a></li>
                    <li><a href="home">Login</a></li>
                </ul>
            </div>
        </div>         
         <!-- COPY RIGHT -->
        <div class="copy">
            <p>All Rights Reserved</p>
        </div>
    </div>
    <script src="javascript/slidescript.js"></script>
    <script src="javascript/overlay.js"></script> 
</body>
</html>