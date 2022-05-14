<?php 

    include('connection.php');
    session_start();
    // $shopPan = $_GET['id'];
    // // echo $_GET['id'];
    $pan = $_SESSION['sPan'];

    $selectCatId = 'SELECT * FROM CATEGORY';
    $stid = oci_parse($conn, $selectCatId);
    oci_execute($stid);
    // echo $stid;

    $val = '';
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        // Use the uppercase column names for the associative array indices
        $val = $row['CATEGORY_ID'];

    }
    echo $val;
    
    oci_free_statement($stid);
    oci_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="addProduct.css">
</head>
<body>
    <div class="form-container">
        <h1>Product Form</h1>
        <div class="form">
            <form action="addProduct.php" method="POST">
                <!-- <div class="inputElement">
                    <label for="category">Product Category</label>
                    <input type="text" name="category">
                </div> -->
                <div class="inputElement">
                    <label for="product-name">ProductName</label>
                    <input type="text" name="product-name">
                </div>
                <div class="inputElement">
                    <label for="description">ProductDescription</label>
                    <input type="text" name="description">
                </div>
                <div class="inputElement">
                    <label for="price">Price</label>
                    <input type="text" name="price">
                </div>
                <div class="inputElement">
                    <label for="qty">Quantity</label>
                    <input type="text" name="qty">
                </div>
                <div class="inputElement">
                    <label for="image-name">ImageName</label>
                    <input type="text" name="image-name">
                </div>
                <div class="inputElement">
                    <label for="shopPan">Shop Pan</label>
                    <input type="text" name="shopPan" value="<?php echo $pan?>">
                </div>
                <div class="inputElement">
                    <label for="catId">Category ID</label>
                    <input type="text" name="catId" value="<?php echo $val?>">
                </div>
                <div class="buttons">
    
                    <input type="submit" name="submit" value="SUBMIT" class="btn">                
                    <a href="trader.php" class="back-btn">Get Back</a>
                </div>
            </form>
        </div>
        
    </div>
</body>
</html>