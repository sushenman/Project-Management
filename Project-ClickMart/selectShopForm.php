<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Shop Form</title>
</head>
<body>
    <div class="select-container">
        <h2>Select shop</h2>
        <div class="form">
            <form action="selectShop.php" method="POST">
                <div class="inputElement">
                    <label for="shop-name">Shop Name</label>
                    <input type="text" name="shop-name">
                </div>
                <div class="inputElement">
                    <label for="shop-address">Shop Address</label>
                    <input type="text" name="shop-address">
                </div>
                <div class="inputElement">
                    <label for="contact">Contact Number</label>
                    <input type="text" name="contact">
                </div>
                <div class="inputElement">
                    <label for="fk">foreign key</label>
                    <input type="text" name="fk" value="<?php echo $_SESSION['pan']?>">
                </div>
                <input type="submit" value="Submit" name="submit">
                <!-- <div class="inputElement">
                    <label for="shop-name">Shop Name</label>
                    <input type="text" name="shop-name">
                </div> -->
                
            </form>
        </div>
        <a href="trader.php">Add products</a>
        <!-- <div class="addProductForm">
            <form action="trader"></form>
        </div> -->
    </div>
</body>
</html>