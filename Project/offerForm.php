<?php 
    include('connection.php');
    session_start();
    // echo $_SESSION['pan'];
    echo "som";
    $selectProdId = oci_parse($conn,'SELECT *FROM PRODUCT');
    $id = '';
    oci_execute($selectProdId);

    while (($row = oci_fetch_array($selectProdId, OCI_BOTH)) != false) {
        $id = $row['PRODUCT_ID'];

    }
    // echo $id;
    oci_commit($conn);
    oci_free_statement($selectProdId);
    oci_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offer Form</title>
    <link rel="stylesheet" href="style/offer.css">
</head>
<body>
    <div class="offer-container">
        <div class="form">
            <form action="offer.php" method="POST">
                <div class="input-container">
                    <label for="amount">Offer Amount</label>
                    <input type="text" name="amount">
                </div>
                <div class="input-container">
                    <label for="description">Offer description</label>
                    <input type="text" name="description">
                </div>
                <div class="input-container">
                    <label for="panNo">Trader Pan</label>
                    <input type="text" name="panNo" value="<?php echo $_SESSION['pan']?>">
                </div>
                <div class="input-container">
                    <label for="prodId">Product ID</label>
                    <input type="text" name="prodId" value="<?php echo $id ?>">
                </div>
                <input type="submit" name="submit" value="Add Offer" class="btn">

            </form>
        </div>
    </div>
</body>
</html>