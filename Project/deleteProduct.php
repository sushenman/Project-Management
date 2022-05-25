<?php 
    $idVal = $_GET['id'];
    echo $idVal;

    include('connection.php');
    // delete offer 
    $deleteOffer = "DELETE FROM OFFER WHERE FK1_PRODUCT_ID = $idVal";
    $executeOffer = oci_parse($conn,$deleteOffer);
    oci_execute($executeOffer);  
    // delete product               
    $deleteProduct = "DELETE FROM PRODUCT WHERE PRODUCT_ID = $idVal";
    $executeProduct = oci_parse($conn,$deleteProduct);
    oci_execute($executeProduct);
    echo 'deleted';                 
    header('Location:actualShop.php');
?>