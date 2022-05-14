<?php 
    include('connection.php');
    session_start();
    $pannNo = $_SESSION['pan'];
    // echo $_SESSION['pan'];
    $selectQry = "SELECT *FROM SHOP WHERE FK1_TRADER_PAN_NO = $pannNo";
    $selectShop = oci_parse($conn,$selectQry);
    oci_execute($selectShop);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actual Shop</title>
    <link rel="stylesheet" href="./style/actual.css">
</head>
<body>
    <div class="shop-container">
        <h1>Select Shop</h1>
        <div class="shops">
            <?php               
                while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
                    echo '<div class="content">';
                        $val = $row['PAN_NO'];
                        // $val = $_SESSION['shopPan'];
                        echo "<a href= 'trader.php?id=$val'>";
                        echo '<h1>';
                            echo $row['SHOP_NAME'];
                        echo '</h1>';
                        echo '</a>';
                    echo '</div>';
                }                      
            ?>
        </div>
    </div>
</body>
</html>