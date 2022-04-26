<?php 
    include('connection.php');
    $count = 0;
    session_start();

    if(isset($_POST["submit"])){
        $val = $_POST['shop-name'];
        echo $val;
        echo $_SESSION['pan'];
        // $_SESSION['shopStatus'] = true ;
        // echo 'submitted';
        // $count++;
        $shopname = $_POST['shop-name'];
        $address = $_POST['shop-address'];   
        $contactNo = $_POST['contact'];
        $foreignKey = $_POST['fk'];
        // if($count > 2){
        //     echo 'cannot select more than two shop';
        // }else {
        //     echo 'inserted';
           $qury=' 
            select count(fk1_trader_pan_no) from shop 
            group by fk1_trader_pan_no
            having count(fk1_trader_pan_no)<2';
                
             $insertShop = oci_parse($conn, 'INSERT INTO SHOP (SHOP_NAME,SHOP_ADDRESS,CONTACT_NO,FK1_TRADER_PAN_NO) VALUES (:sname,:saddress,:Phone_No,:fKey)');        
            // $input = oci_execute($insertShop);
            // echo 'rows';
            // echo oci_num_rows($insertShop);

            oci_bind_by_name($insertShop, ':sname', $shopname);
            oci_bind_by_name($insertShop, ':saddress', $address);
            // oci_bind_by_name($stid, ':user_Type', $user_Type);
            // oci_bind_by_name($insertShop, ':Trader_pan_no', $Trader_pan_no);
            oci_bind_by_name($insertShop, ':Phone_No', $contactNo);
            oci_bind_by_name($insertShop, ':fKey', $foreignKey);
    
            oci_execute($insertShop, OCI_NO_AUTO_COMMIT);  // use OCI_DEFAULT for PHP <= 5.3.1
            oci_commit($conn);
            // oci_commit($conn);  // commits all new values: 1, 2, 3, 4, 5
            oci_free_statement($insertShop);
            oci_close($conn);

        // }
        
    }else {
        echo 'not submitted';
    }


?>