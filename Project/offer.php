<?php 
    include('connection.php');
    session_start(); 
  //  echo 'loded in status'.$_SESSION['logedin'];
    
    if(isset($_POST['submit'])){
        // echo 'submitted';
        $offerAmt = $_POST['amount'];
        $offerDsc = $_POST['description'];
        $traderFk = $_POST['panNo'];
        $productId = $_POST['prodId'];
        
        echo $offerAmt;

        $insertOffer = oci_parse($conn, 'INSERT INTO OFFER (OFFER_AMOUNT,OFFER_DESCRIPTION,FK1_TRADER_PAN_NO,FK2_PRODUCT_ID) VALUES (:oAmount,:oDescription,:traderPan,:prodId)');        
        oci_bind_by_name($insertOffer, ':oAmount', $offerAmt);
        oci_bind_by_name($insertOffer, ':oDescription', $offerDsc);
        oci_bind_by_name($insertOffer, ':traderPan', $traderFk);
        oci_bind_by_name($insertOffer, ':prodId', $productId);

        oci_execute($insertOffer, OCI_NO_AUTO_COMMIT);  // use OCI_DEFAULT for PHP <= 5.3.1
        oci_commit($conn);
        // oci_commit($conn);  // commits all new values: 1, 2, 3, 4, 5
        oci_free_statement($insertOffer);
        oci_close($conn);
       // header('Location:selectShopForm.php');
        header('Location:selectingShop.php');
    }else {
        echo 'not submitted';
    }

?>