<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PRODUCT DESCRIPTION</title>
        <link rel="stylesheet" href="css/product.css" />
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    </head>
    <body>
        <?php
        session_start();
        include "connection.php";
        $sql = "SELECT * FROM product"; //get the product id from the url
        $stid = oci_parse($conn, $sql);
        oci_execute($stid);
    $id= $_POST['Product_id'];
        ?>
        <div class="container">
            <!-- HEADER -->
            <div class="heading">
                <img src="logo/Logoblue.png" alt="" />

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
                    <li><a class="active navigation" href="#home">HOME</a></li>
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

            <!-- HEADER END -->

            <!-- BODY -->
            <div class="small-container">
                <div class="product-body">
                    <div class="col-2"> 
                      <!--- PRODUCT IMAGE -->
                        <?php
                        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                            echo "<div class='product-image'>";
                            echo "<img src='images/". $row['IMAGE_NAME'] . ".jpg' alt='product-image'  style='width:200px'>";
                            echo "</div>";
                      
                        ?>
                    </div>

                    <div class="product-heading">
                        <div class="product-title">
                            <h1>
                                <?php echo $row['PRODUCT_NAME']; ?>
                            </h1>
                        </div>
                        <div class="product-brand">
                            <p>
                                <!--Product Description-->
                                <?php echo $row['PRODUCT_DESCRIPTION']; ?> 
                                
                            </p>
                        </div>
                    </div>
                </div>
                <div class="product-content">
                    <div class="product-price">
                        <p class="price"><span>$ 
                            <?php
                           
                                echo $row['PRICE'];
                            }
                            ?>
                        </span></p>
                    </div>
                    <div class="product-rating">
                        <span>Rating: </span>
                        <input type="number" name="" id="">
                        <!-- <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i> -->
                        <!-- <i class="fas fa-star-half-alt"></i> -->
                        <span>4.7</span>
                    </div>

                    <div id="buttons">
                        <form action="" method="POST">
                         <input type="submit" value="Add to cart" name= "submit" class ="button button1">
                         </form>
                        <button class="button button2">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-comment">
            <h2>Comments question & answer</h2>
             <form action="/form/submit" method="POST">
      <textarea class="comment">Type your comment here.</textarea>
      <br>
      <input class="send" type="submit" name="submit" value="Send">
        </div>

        <div class="product-Review">
            <h3>Reviews</h>
            <h5>by Aabhash G</h5>
            <p>All good pieces, fresh also</p>
            <br />

            <hr />
            <h5>by Anish T.</h5>
            <p>good product.</p>
            <br />
            <hr />
            <h5>by Sushen B.</h5>
            <p>Fresh Product.</p>
        </div>

        <!-- FOOTER -->

        <div class="footer">
            <div class="about">
                <h3>About Us</h3>
                <p>
                    We are online e-commerce <br />
                    Website located at Cleckhudderfax
                </p>
            </div>

            <!-- CONTACT DETAIL -->

            <div class="contact-detail">
                <h3>Contact Info</h3>
                <p><i class="fas fa-map-marker-alt"></i>CleckHudderFax, UK.</p>

                <p><i class="fas fa-phone"></i>+44 908765548</p>

                <!-- <div class="media"> -->
                <a href="#" class="fab fa-youtube"></a>
                <a href="#" class="fab fa-facebook"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <!-- </div> -->
            </div>

            <div class="link">
                <h3>Quick links</h3>
                <a href="home">Home</a> <br />
                <a href="Shop">Shop</a> <br />
                <a href="login">Login</a> <br />
            </div>
        </div>

        <!-- COPY RIGHT -->
        <div class="copy">
            <p>All Rights Reserved</p>
        </div>
    </body>
</html>
