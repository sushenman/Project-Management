<?php 
    session_start();
    $productId =  $_GET['id'];
    echo $productId;
    include('connection.php');
    $imgName = '';
    $productDesc = '';
    $price = '';
    $selectProduct = "SELECT *FROM PRODUCT WHERE PRODUCT_ID = $productId";
    $executeProd = oci_parse($conn,$selectProduct);
    oci_execute($executeProd);                 
    while (($row = oci_fetch_array($executeProd, OCI_BOTH)) != false) {
        $imgName = $row['IMAGE_NAME'];
        $productDesc = $row['PRODUCT_DESCRIPTION'];
        $price = $row['PRICE'];              
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/viewproduct.css">
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
        <!-- Content -->
        <div class="content-wrapper">
            <div class="main-content">
                <div class="img-container">
                    <div class='image'>
                        <?php echo "<img src='./images/${imgName}' alt='img'>"?>                                                      
                    </div> 
                </div>
                <div class="details">              
                    <div class="form">
                        <h1><?php echo $productDesc?></h1>
                        <form action="#" method="POST">
                            <div class="input-group">
                                <label for="review">Rating</label>
                                <input type="text" placeholder="1/5" name="review">
                            </div>
                            <div class="input-group">
                                <label for="comment">Review</label>
                                <input type="text" placeholder="Comment..." name="comment">
                            </div>
                            <input type="submit" value="Comment" name="submit-cmnt" class="comments">
                        </form>
                    </div>                   
                    <div class="cart-action">
                        <button>Add To Cart</button>
                    </div>
                </div>
            </div>
            <div class="review">
                <?php 
                    include('connection.php');
                                 
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
    <!-- <script src="javascript/menu.js"></script>  -->
    <!-- <script src="javascript/cart.js"></script>  -->
</body>
</html>