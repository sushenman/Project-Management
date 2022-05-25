<?php 
    include('connection.php');
    session_start();
   // $_SESSION['shopCount'] = 0;
    // takes user to login form when not loged in
    // if(!isset($_SESSION['logedin']) || $_SESSION['logedin']!= true){
    //      header('Location:traderLoginForm.php');
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Shop Form</title>
    <link rel="stylesheet" href="style/selectshop.css">
</head>
<body>
    <div class="selectShop-container">
        <h2>Select shop</h2>
        <div class="form">
            <div id="errormsg"></div>
            <form action="selectShop.php" method="POST" id="shopform" name="shopform" onsubmit="return validation()">
                <div class="shop-error"></div>
                <div class="inputElement">
                    <label for="shop-name">Shop Name</label>
                    <input type="text" name="shop_name">
                </div>
                <div class="address-error"></div>
                <div class="inputElement">
                    <label for="shop-address">Shop Address</label>
                    <input type="text" name="shop_address">
                </div>
                <div class="contact-error"></div>
                <div class="inputElement">
                    <label for="contact">Contact Number</label>
                    <input type="text" name="contact">
                </div>
                
                <div class="inputElement">
                    <label for="pan">Pan Number</label>
                    <input type="text" name="pan">
                </div>
                
                <div class="inputElement">
                    <label for="fk">foreign key</label>
                    <input type="text" name="fk" value="<?php echo $_SESSION['traderPan']?>">
                </div>
                
                <div class="inputElement">
                    <input type="submit" value="Submit" name="submit" class="btn" onsubmit="return submit()">
                </div>
                
            </form>
        </div>
        <!-- <a href="trader.php">Add products</a> -->
        <!-- <div class="addProductForm">
            <form action="trader"></form>
        </div> -->
    </div>
    <script src="javascript/shopform.js"></script>
</body>
</html>