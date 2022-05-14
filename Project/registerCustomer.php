<?php 
    include('connection.php');
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $Phone_No = $_POST['phone_no'];
        $Email = $_POST['email'];
        
        echo $username;
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
        oci_close($conn);

        // insert into cart
        // $cartStmt = oci_parse($conn, 'INSERT INTO CART (USERNAME,PASSWORD,CUSTOMER_ADDRESS,PHONE_NO,EMAIL) VALUES (:username,:password,:address,:phone,:email)');        
        // oci_bind_by_name($cartStmt, ':username', $username);
        // oci_bind_by_name($cartStmt, ':password', $password);
        // oci_bind_by_name($cartStmt, ':address', $address);
        // oci_bind_by_name($cartStmt, ':phone', $Phone_No);
        // oci_bind_by_name($cartStmt, ':email', $Email);

        // oci_execute($cartStmt, OCI_NO_AUTO_COMMIT);
        // oci_commit($conn);
        // oci_free_statement($cartStmt);
        // oci_close($conn);
        
        // head towards customer login form
        header('location:customerLoginForm.php');
     } 
?>