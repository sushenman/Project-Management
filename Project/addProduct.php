<?php 
include('connection.php');
session_start();
echo $_SESSION['pan'];
if(isset($_POST["submit"])){
    $pName = $_POST['product-name'];
    $pDes = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['qty'];
    $name = $_POST['image-name'];
    $shopPan = $_POST['shopPan'];
    $cateGory = $_POST['catId'];


    $insertProduct = oci_parse($conn, 'INSERT INTO PRODUCT (PRODUCT_NAME,PRODUCT_DESCRIPTION,PRICE,QUANTITY,IMAGE_NAME,FK1_CATEGORY_ID,FK2_PAN_NO) VALUES (:pname,:pdes,:price,:qTy,:iname,:catId,:sPan)');        
    oci_bind_by_name($insertProduct, ':pname', $pName);
    oci_bind_by_name($insertProduct, ':pdes', $pDes);
    oci_bind_by_name($insertProduct, ':price', $price);
    oci_bind_by_name($insertProduct, ':qTy', $quantity);
    oci_bind_by_name($insertProduct, ':iname', $name);
    oci_bind_by_name($insertProduct, ':catId', $cateGory);
    oci_bind_by_name($insertProduct, ':sPan', $shopPan);

    oci_execute($insertProduct, OCI_NO_AUTO_COMMIT);  // use OCI_DEFAULT for PHP <= 5.3.1
    oci_commit($conn);
    // oci_commit($conn);  // commits all new values: 1, 2, 3, 4, 5
    oci_free_statement($insertProduct);
    oci_close($conn);
    header('location:offerDashboardForm.php');
}else {
    echo 'not submitted';
}

// header('location:offerDashboardForm.php');

?>