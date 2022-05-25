<?php 
    include('connection.php');
    // $count = 0;
    session_start();
    $tradePan = $_SESSION['traderPan'];

    if(isset($_POST["submit"])){
        $val = $_POST['shop_name'];
        echo $val;
        $shopname = $_POST['shop_name'];
        $address = $_POST['shop_address'];   
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
        // oci_close($conn);

        // $_SESSION['shopCount']++;
        // echo $_SESSION['shopCount'].'shopcount';

        $selectQry = "SELECT *FROM SHOP WHERE FK1_TRADER_PAN_NO = '${tradePan}'";
        $selectShop = oci_parse($conn,$selectQry);
        oci_execute($selectShop);
        
        $num = 0;
        
        while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
            // echo $row['SHOP_NAME'].'<br>';
            $num++;
            // $_SESSION['shopNumber'] = $num;
            
        //    echo $num;
        }
        echo $num;
        if($num < 2){
            if($num == 1){
                include('mailverification.php');
                echo $num;
                header('location:selectShopForm.php');
            }else {
                header('location:selectShopForm.php');
            }

        }else {
            header('location:traderLoginForm.php');

        }

    }else {
        echo 'not submitted';
    }


?>