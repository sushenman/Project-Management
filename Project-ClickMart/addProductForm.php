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
                <div class="inputElement">
                    <label for="shop-name">Shop Name</label>
                    <input type="text" name="shop-name">
                </div>
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
                    <label for="image-name">ImageName</label>
                    <input type="text" name="image-name">
                </div>
                <div class="buttons">
    
                    <input type="submit" value="SUBMIT" class="btn">                
                    <a href="trader.php" class="back-btn">Get Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>