<?php 

    include('connection.php');
    session_start();
    $shopPan = $_GET['id'];
    // echo $_GET['id'];
    $_SESSION['sPan'] = $shopPan;
    echo $_SESSION['sPan'];
    // ;
    // echo $_SESSION['panNum'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="style/addCategory.css">
</head>
<body>
    <div class="cat-container">
        <h4>Add Category</h4>
        <div class="cat-forms">
            <form action="addCategory.php" method="POST">
                <div class="inputElement">
                    <label for="category">Product Category</label>
                    <input type="text" name="category">
                </div>
                <!-- <a href="">ADD PRODUCT</a> -->
                <input type="submit" value="ADD" name="submit">
            </form>
        </div>
    </div>
</body>
</html>