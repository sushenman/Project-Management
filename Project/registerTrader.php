<?php
    include "connection.php";
    session_start();
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $pwd = $_POST['password'];  
        $password = md5($pwd);    
        $Phone_No = $_POST['Phone_No'];
        $Email = $_POST['Email'];
        $PanNo = $_POST['Trader_Pan_No'];
        $status = 'inactive';
        $_SESSION['traderPan'] = $PanNo;
        echo $username;

        $traderParse = oci_parse($conn, 'INSERT INTO TRADER (USERNAME,PASSWORD,TRADER_PAN_NO,PHONE_NO,EMAIL,STATUS) VALUES (:username,:password,:Pan,:Phone_No,:Email,:status)');        
        oci_bind_by_name($traderParse, ':username', $username);
        oci_bind_by_name($traderParse, ':password', $password);
        oci_bind_by_name($traderParse, ':pan', $PanNo);
        // oci_bind_by_name($traderParse, ':Trader_pan_no', $Trader_pan_no);
        oci_bind_by_name($traderParse, ':Phone_No', $Phone_No);
        oci_bind_by_name($traderParse, ':Email', $Email);
        oci_bind_by_name($traderParse, ':status', $status);

        // display
        oci_execute($traderParse, OCI_NO_AUTO_COMMIT);
        oci_commit($conn);
        oci_free_statement($traderParse);
        oci_close($conn);
        // header('location:traderLoginForm.php');
        header('location:selectShopForm.php');
     }    
 ?>