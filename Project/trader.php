<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader</title>
    <link rel="stylesheet" href="style/trader.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
</head>
<body>
    <?php
       session_start();
       $tPan = $_SESSION['pan'];
    ?>
    <div class="container">
        <div class="header">
            <?php 
                $value = $_GET['id'];
                echo $value;
            ?>
            <h1>Welcome <?php
                echo $_SESSION['user'];
            ?></h1>
            <?php
                echo "<span class='logout'><a href = 'logoutTrader.php?logout=1'>LOGOUT</></span>";
             ?>
            
            <span> <i class="fa fa-user"></i></span>
            <?php
                echo "<span><a href='editTrader.php?id=${tPan}'>Edit</a></span>";
            
            ?>
        </div>
        <div class="button"><a href="addCategoryForm.php?id=<?php echo $value?>" class="btn">Add Products</a></div>
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
            <?php 
                include('connection.php');
                $selectProduct =
                    "SELECT *FROM PRODUCT p , CATEGORY c
                    WHERE p.fk2_category_id = c.category_id
                    AND p.fk1_pan_no = $value";
                $selectShop = oci_parse($conn,$selectProduct);
                oci_execute($selectShop);                 
                while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
                    $imgName = $row['IMAGE_NAME'];
                    $productName = $row['PRODUCT_NAME'];
                    $category = $row['CATEGORY_TYPE'];
                    $proId = $row['PRODUCT_ID'];
                    $price = $row['PRICE'];
                    $qty = $row['QUANTITY'];
                    echo '<div class="description">';
                        echo "<div class='img-container'>";
                            echo "<img src='./images/${imgName}' alt='img'>";                              
                        echo "</div>";
                        echo "<span>${productName}</span>";
                        echo "<span>${category}</span>";
                        echo "<span>$${price}</span>";
                        echo "<span>${qty}</span>";
                        echo "<span><a href='updateProduct.php?id=${proId}' class='btn update'>Update</a></span>";
                        echo "<span><a href='deleteProduct.php?id=${proId}' class='btn delete'>Delete</a></span>";                        
                    echo '</div>';
                }            
            ?>
        </div>      
    </div>
</body>
</html>