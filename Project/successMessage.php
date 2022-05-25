<?php
    include('connection.php');
    echo 'Paid Successfully';
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
    
    // select latest id from order
    $ordersId = 0;
    $selectOrder1 = "SELECT MAX(ORDER_ID) FROM ORDERS";
    $parseOrder1 = oci_parse($conn,$selectOrder1);
    oci_execute($parseOrder1);    
    while (($row = oci_fetch_array($parseOrder1, OCI_BOTH)) != false) {                           
        $ordersId =  $row['MAX(ORDER_ID)'];
    }




    // select order detail 
    $orderDetail = "SELECT *FROM ORDER_DETAIL WHERE FK2_ORDER_ID = $orderId";
    $parseDetail = oci_parse($conn,$orderDetail);
    oci_execute($parseDetail);    
    while (($row = oci_fetch_array($parseDetail, OCI_BOTH)) != false) {                           
        $proId = $row['FK1_PRODUCT_ID'];
        $orderQuant = $row['QUANTITY_ORDERED'];

        // select quantity from product
        $qty = 0;
        $selectProduct = "SELECT QUANTITY FROM PRODUCT WHERE PRODUCT_ID = $proId";
        $parseProduct = oci_parse($conn,$selectProduct);
        oci_execute($parseProduct);    
        while (($row = oci_fetch_array($parseProduct, OCI_BOTH)) != false) {                           
            $qty =  $row['QUANTITY'];
        }

        // update the quantity
        $update = "UPDATE PRODUCT SET QUANTITY = $qty - $orderQuant WHERE PRODUCT_ID = $proId";
        $parseUpdate = oci_parse($conn,$update);
        oci_execute($parseUpdate);    
        // while (($row = oci_fetch_array($parseUpdate, OCI_BOTH)) != false) {                           
        //     $ordersId =  $row['MAX(ORDER_ID)'];
        // }

        echo '<br>';
        echo $proId.'<br>';
        echo $orderQuant.'<br>';

    }

    oci_close($conn);
        // header('location:index.php');

?>