<?php 
    include('connection.php');
    if(isset($_POST['submit-update'])){
        $proName = $_POST['product'];
        $proDesc = $_POST['desc'];
        $proPrice = $_POST['price'];
        $proQty = $_POST['qty'];
        $imgName = $_POST['image'];
        $prodId = $_POST['hiden-proid'];

        // update query
        $updateProduct = "UPDATE PRODUCT SET 
                        PRODUCT_NAME = '$proName',
                        PRODUCT_DESCRIPTION = '$proDesc',
                        PRICE = $proPrice,
                        QUANTITY = $proQty,
                        IMAGE_NAME = '$imgName' 
                        WHERE PRODUCT_ID = $prodId";       

        $select = oci_parse($conn,$updateProduct);
        oci_execute($select);                 
        header('Location:actualShop.php');
    }

?>