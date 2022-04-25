<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Login.css">
    <link rel="stylesheet" href="css/navi.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="js/login.js"></script>
</head>


<body >
    <div class="container">
        <!-- HEADER -->
        <div class="heading">
            <img src="images/logo.png" alt="" />
            <!-- <form action="#" class="search">
                <input
                    type="text"
                    placeholder="Search.."
                    class="search-bar" />
                    <button type="submit"><i class="fa fa-search"></i></button>
            </form> -->

            <div class="form">
                <form action="index.php" method="post">
                    <input
                        type="text"
                        name=""
                        id=""
                        placeholder="Search.."
                        class="Search"
                    />
                    <span class="icon">
                        <i class="fas fa-search"></i>
                    </span>
                </form>
            </div>
            <!-- Navigation Bar -->

            <ul class="navbar">
                <li><a class="navigation" href="#home">HOME</a></li>
                <li><a href="Shop">SHOP</a></li>
                <li><a href="login">LOGIN</a></li>
                <li>
                    <a href="cart"
                        ><div class="cart">
                            <img src="images/cart.png" alt="icon" /></div
                    ></a>
                </li>
            </ul>
        </div>
   </div>

    <div class="container1">
        
    <div class="area">
        <h2>  Login </h2>
        <div id="errormsg">
    
        </div>
        <form name="myform" id="myform" action="" method="post"onsubmit="return validate()">
        <div class="input-field">
        <input type="text" placeholder="Username" name="name" id="name">
        </div>
        <div class="input-field">
        <input type="password" placeholder="Password" name="password" id="password">
        </div>
      
<div class="btn">
  <input type="submit" onsubmit="return submit()" >
</div>
    <div class="password">
       
    <div class="createacc">
        <a href="Register(Customer).php">Create Account</a>
    </div>
    </div>

    </div>
    
    </form>
    </div>
   
       
    </div>
    <div class="footer-cover">
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
    </div>

</body>
</html>