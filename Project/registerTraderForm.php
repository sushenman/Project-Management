<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="navi.css"> -->
    <link rel="stylesheet" href="style/registerTraderForm.css">
    <link rel="stylesheet" href="style/index1.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
</head>
<body>
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
      
    <div class="regi">
        
        <div class="newacc">
            <h3>Create account </h3>
        </div>    
        <div id="errormsg"></div>
        <form action="registerTrader.php" method="POST" name="traderform" id="traderform" onsubmit="return validation()">
            <!-- <input type="hidden" name="user_Type" id="TRADER"> -->
            <div class="regi-form1">
                <div class="form-grp">
                    <input type="text" name="username" placeholder="Username" class="form-type1" value="">
                </div>
                <div class="form-grp">
                    <input type="password" name="password" placeholder="Password" class="form-type1" value="">
                </div>
                <div class="form-grp">
                    <input type="text" name="Trader_Pan_No" placeholder="Pan_No" class="form-type1" value="">
                </div>
                <div class="form-grp">
                    <input type="text" name="Phone_No" placeholder="Phone Number"  class="form-type1" value="">
                </div>
                <div class="form-grp">
                    <input type="text" name="Email" placeholder="Email"  class="form-type1" value="">
                </div> 
                <div class="form-grp">
                    <input type="submit" name="submit" value="Register" class="submit-btn1" onsubmit="return submit()">
                </div>
            </div>
        </form> 
           
    </div>  
    <div class="foot">
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
        </div>  
<script src="javascript/registertrader.js"></script>
</body>
</html>