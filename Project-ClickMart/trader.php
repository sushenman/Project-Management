<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader</title>
    <link rel="stylesheet" href="trader.css">
</head>
<body>
    <?php
        include('connection.php');
        session_start();
    ?>
    <div class="container">
        <div class="header">
            <h1>Welcome <?php
                echo $_SESSION['user'];
            ?></h1>
            <img src="#" alt="#">
        </div>
        <div class="button"><a href="selectShopForm.php" class="btn">Add Products</a></div>
        <div class="content">
            <div class="heading">
                <span>Product</span>
                <span>Name</span>
                <span>Category</span>
                <span>Price</span>
                <span>Units</span>
                <span>Action</span>
                <span>Action</span>
            </div>
            <div class="description">
                <img src="#" alt="image">
                <span>Chicken</span>
                <span>Meat</span>
                <span>$100</span>
                <span>12</span>
                <span><a href="#" class="btn update">Update</a></span>
                <span><a href="#" class="btn delete">Delete</a></span>
            </div>
            <div class="description">
                <img src="#" alt="image">
                <span>Chicken</span>
                <span>Meat</span>
                <span>$100</span>
                <span>12</span>
                <span><a href="#" class="btn update">Update</a></span>
                <span><a href="#" class="btn delete">Delete</a></span>
            </div>
        </div>      

    </div>
</body>
</html>