<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php
session_start();
include ("connection.php");
    $sql = "SELECT * FROM product"; //get the product id from the url  
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Product ID</th>";
    echo "<th>Product Name</th>";
    echo "<th>Product Price</th>";
    echo "<th>Product Offer</th>";
    echo "<th>Product Quantity</th>";
    echo "<th>Product Image</th>";
    echo "</tr>";
    
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        echo "<tr>";
        echo "<td>" . $row['PRODUCT_ID'] . "</td>";
        echo "<td>" . $row['PRODUCT_NAME'] . "</td>";
        echo "<td>" . $row['PRODUCT_DESCRIPTION'] . "</td>";
        echo "<td>" . $row['PRICE'] . "</td>";
        echo "<td>" . $row['QUANTITY'] . "</td>";
        echo "<td>" . $row['IMAGE_NAME'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    

 ?>
 <form action="addtocart.php" method="POST">
     <input type="submit" value="Add to cart" name="submit">
 </form>
 </body>
</html>