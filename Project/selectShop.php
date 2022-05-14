<?php 
    include('connection.php');
    // $count = 0;
   session_start();

    if(isset($_POST["submit"])){
        $val = $_POST['shop-name'];
        echo $val;
        $shopname = $_POST['shop-name'];
        $address = $_POST['shop-address'];   
        $contactNo = $_POST['contact'];
        $foreignKey = $_POST['fk'];
        $panNo = $_POST['pan'];
        $_SESSION['PanNum'] = $panNo;
        echo $_SESSION['PanNum'];

        $insertShop = oci_parse($conn, 'INSERT INTO SHOP (SHOP_NAME,SHOP_ADDRESS,CONTACT_NO,PAN_NO,FK1_TRADER_PAN_NO) VALUES (:sname,:saddress,:Phone_No,:Pan,:fKey)');        
        oci_bind_by_name($insertShop, ':sname', $shopname);
        oci_bind_by_name($insertShop, ':saddress', $address);
        oci_bind_by_name($insertShop, ':Phone_No', $contactNo);
        oci_bind_by_name($insertShop, ':Pan', $panNo);
        oci_bind_by_name($insertShop, ':fKey', $foreignKey);

        oci_execute($insertShop, OCI_NO_AUTO_COMMIT);  // use OCI_DEFAULT for PHP <= 5.3.1
        oci_commit($conn);
        // oci_commit($conn);  // commits all new values: 1, 2, 3, 4, 5
        oci_free_statement($insertShop);
        oci_close($conn);
        header('location:trader.php');    
    }else {
        echo 'not submitted';
    }


?>