<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/registercustomer.css"> 
    <link rel="stylesheet" href="style/index1.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body> <div class="nav">
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
                    <img src="logo/cmart.png" alt="logoimage"/>                </a>
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
    <div class="container">
        <div class="regi">       
            <div class="accountlg">
                <img src="images/acc.png" id="photo">
            <input type="file"  id="file">
            <label for="file" id="upload">Choose Photo</label>
            </div>
            <div class="newacc">
                <p>Create new Account</p>
            </div>
            <div id="errormsg"></div>
            <div class="regi-form">
                <form action="registerCustomer.php" method="POST" name="registerform" id="registerform" onsubmit="return validation()">
                    <input type="text" name="username" placeholder="Username" class="form-type" id="username" value="">
                    <input type="password" name="password" placeholder="Password" class="form-type" id="password">
                    <input type="text" name="address" placeholder="Address"  class="form-type" id="Address" value="">
                    <input type="text" name="phone_no" placeholder="Phone Number"  class="form-type" id="Phone_Number" value="">
                    <input type="text" name="email" placeholder="Email"  class="form-type" >
                    <input type="hidden" name="status" value="deactive">
                    <input type="submit" value="Register" name = "submit" class="submit-btn" onsubmit="return submit()">
                </form>
            </div>
    </div> 
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
    <script src="javascript/customerReg.js"></script>
    <script src="javascript/script.js"></script>
    <script src="javascript/overlay.js"></script>
</body>
</html>