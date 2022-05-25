<?php 
    include('connection.php');
    
    $val = $_GET['id'];
    $imgname = '';
    $prodname = '';
    $prices = '';
    $qty = '';
    $desc = '';
    $selectToUpdate = "SELECT PRODUCT_NAME, PRODUCT_DESCRIPTION, PRICE, QUANTITY, IMAGE_NAME FROM PRODUCT WHERE PRODUCT_ID = $val";
    $selectShop = oci_parse($conn,$selectToUpdate);
    oci_execute($selectShop);                 
    while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
        $imgname = $row['IMAGE_NAME'];
        $prodname = $row['PRODUCT_NAME'];
        $qty = $row['QUANTITY'];
        $prices = $row['PRICE'];
        $desc = $row['PRODUCT_DESCRIPTION'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Products</title>
    <link rel="stylesheet" href="style/update.css">
</head>
<body>
    <div class="main-container">
        <h3>Update Product Detail</h3>
        <div class="form-container">
            <form action="update.php" method="POST">
                <div class="input-grp">
                    <label for="product">Product Name</label>
                    <input type="text" name="product" value="<?php echo $prodname?>">
                </div>
                <div class="input-grp">
                    <label for="image">Image Name</label>
                    <input type="text" name="image" value="<?php echo $imgname?>">
                </div>
                <div class="input-grp">
                    <label for="price">Price</label>
                    <input type="text" name="price" value="<?php echo $prices?>">
                </div>
                <div class="input-grp">
                    <label for="qty">Quantity</label>
                    <input type="text" name="qty" value="<?php echo $qty?>">
                </div>
                <div class="input-grp">
                    <label for="desc">Description</label>
                    <input type="text" name="desc" value="<?php echo $desc?>">
                </div>
                <input type="text" value=<?php echo $val ?> name="hiden-proid">
                <input type="submit" value="UPDATE" class="update-btn" name="submit-update">
            </form>
        </div>
    </div>
</body>
</html>