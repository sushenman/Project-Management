<?php 
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/Login1.css">
    <link rel="stylesheet" href="style/index.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="customer-container">
        <div class="nav">
            <div class="overlay">
                <ul class="hidden-nav">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="shop.php">SHOP</a></li>
                    <li class="dropdown">
                        <span>LOGIN</span>
                        <div class="drop-menu">
                            <span><a href="customerLoginForm.php">Customer</a></span>
                            <span><a href="traderLoginForm.php">Trader</a></span>
                        </div>
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
                    <span>LOGIN</span>
                    <div class="drop-menu">
                            <span><a href="customerLoginForm.php">Customer</a></span>
                            <span><a href="traderLoginForm.php">Trader</a></span>
                    </div>
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
            <div class="hamburger">
                <div class="line-1"></div>
                <div class="line-2"></div>
                <div class="line-3"></div>
            </div>
        </div>
    <div class="container-login">  
        <div class="area">
            <h2>Trader  Login </h2>
            <div id="errormsg"> </div>
                <form name="myform" id="myform" action="traderLogin.php" method="POST" onsubmit="return validation()">
                    <div class="input-field">
                        <input type="text" placeholder="username" name="username">
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Password" name="password">
                    </div>
                
                    <div class="btn">
                        <input type="submit" name="submit" onsubmit="returnsubmit()" >
                    </div>
                    <div class="password">
                    
                    <div class="createacc">
                        <a href="registerTraderForm.php">Create Account</a>
                    </div>
                    </div>
                </form>
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
    <script src="javascript/script.js"></script>
    <script src="javascript/overlay.js"></script>
<!-- <script src="javascript/hamburger.js"></script> -->
</body>
</html>