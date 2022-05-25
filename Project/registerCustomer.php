<?php 
    include('connection.php');
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $password = md5($pass);
        $address = $_POST['address'];
        $Phone_No = $_POST['phone_no'];
        $Email = $_POST['email'];
        
        // echo $username;
        // insert into customer
        $stidNew = oci_parse($conn, 'INSERT INTO CUSTOMER (USERNAME,PASSWORD,CUSTOMER_ADDRESS,PHONE_NO,EMAIL) VALUES (:username,:password,:address,:phone,:email)');        
        oci_bind_by_name($stidNew, ':username', $username);
        oci_bind_by_name($stidNew, ':password', $password);
        oci_bind_by_name($stidNew, ':address', $address);
        oci_bind_by_name($stidNew, ':phone', $Phone_No);
        oci_bind_by_name($stidNew, ':email', $Email);

        oci_execute($stidNew, OCI_NO_AUTO_COMMIT);
        oci_commit($conn);
        oci_free_statement($stidNew);

        $customerID = '';
        $selectCustomer = "SELECT MAX(CUSTOMER_ID) FROM CUSTOMER";
        $executeCustomer = oci_parse($conn,$selectCustomer);
        oci_execute($executeCustomer);    
        while (($row = oci_fetch_array($executeCustomer, OCI_BOTH)) != false) {                           
            $customerID = $row['MAX(CUSTOMER_ID)'];
            // echo $customerID;
                
        }
        
        $date = date('d-m-y');
        // echo gettype($date);
        // echo '<pre>';
        //     echo ($date);
        // echo '</pre>';
        
       // insert into cart
        $cartStmt = oci_parse($conn, 'INSERT INTO CART (CART_CREATE_DATE,FK2_CUSTOMER_ID) VALUES (:cdate,:customerID)');        
        oci_bind_by_name($cartStmt, 'cdate', $date);
        // oci_bind_by_name($cartStmt, ':prodId', $prodId);
        oci_bind_by_name($cartStmt, ':customerID', $customerID);
        // oci_bind_by_name($cartStmt, ':phone', $Phone_No);
        // oci_bind_by_name($cartStmt, ':email', $Email);

        oci_execute($cartStmt, OCI_NO_AUTO_COMMIT);
        oci_commit($conn);
        oci_free_statement($cartStmt);
        oci_close($conn);
        
        // head towards customer login form
        header('location:customerLoginForm.php');
     } 
?>