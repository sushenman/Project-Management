<?php 
    include('connection.php');
    session_start();
    $customId =  $_SESSION['customerId'];
    $slot = 0;
    include('connection.php');
    // select latest id from collect_slot table
    $selectSlot = "SELECT MAX(SLOT_ID) FROM COLLECT_SLOT";
    $parseSlot = oci_parse($conn,$selectSlot);
    oci_execute($parseSlot);    
    while (($row = oci_fetch_array($parseSlot, OCI_BOTH)) != false) {                           

           $slot =  $row['MAX(SLOT_ID)'];
    }
    // echo $slot;
    // date of placing order
    $date = date("d-m-y");
    // echo $date;

    // insert into orders table
    $insertOrder = oci_parse($conn, 'INSERT INTO ORDERS (ORDER_DATE,FK1_SLOT_ID,FK2_CUSTOMER_ID) VALUES (:odate,:slotId,:customId)');        
    oci_bind_by_name($insertOrder, ':odate', $date);
    oci_bind_by_name($insertOrder, ':slotId', $slot);
    oci_bind_by_name($insertOrder, ':customId', $customId);

    oci_execute($insertOrder, OCI_NO_AUTO_COMMIT);
    oci_commit($conn);
    oci_free_statement($insertOrder);

    // select lastest id from order table
    $orderId = 0;
    $selectOrder = "SELECT MAX(ORDER_ID) FROM ORDERS";
    $parseOrder = oci_parse($conn,$selectOrder);
    oci_execute($parseOrder);    
    while (($row = oci_fetch_array($parseOrder, OCI_BOTH)) != false) {                           
        $orderId =  $row['MAX(ORDER_ID)'];
    }

    echo $orderId;
    
    $cartValues = $_SESSION['mycart'];
    foreach($cartValues as $key =>$val){
        $productId = $key;
        $quantity = $val['qty'];
         //echo $quantity;

        // insert into order detail table
        $insertOrderDetail = oci_parse($conn, 'INSERT INTO ORDER_DETAIL (QUANTITY_ORDERED,FK1_PRODUCT_ID,FK2_ORDER_ID) VALUES (:qty,:productId,:orderId)');        
        oci_bind_by_name($insertOrderDetail, ':qty', $quantity);
        oci_bind_by_name($insertOrderDetail, ':productId', $productId);
        oci_bind_by_name($insertOrderDetail, ':orderId', $orderId);

        oci_execute($insertOrderDetail, OCI_NO_AUTO_COMMIT);
        oci_commit($conn);
        oci_free_statement($insertOrderDetail);
    }

    oci_close($conn);
    header('location:payment.php');
?>