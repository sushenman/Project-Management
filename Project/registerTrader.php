<?php
    include "connection.php";
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // $user_Type = $_POST['user_Type'];
        // $Trader_Pan_No = $_POST['Trader_Pan_No'];    
        $Phone_No = $_POST['Phone_No'];
        $Email = $_POST['Email'];
        $PanNo = $_POST['Trader_Pan_No'];

        echo $username;

        $stidNew = oci_parse($conn, 'INSERT INTO TRADER (USERNAME,PASSWORD,TRADER_PAN_NO,PHONE_NO,EMAIL) VALUES (:username,:password,:Pan,:Phone_No,:Email)');        
        oci_bind_by_name($stidNew, ':username', $username);
        oci_bind_by_name($stidNew, ':password', $password);
        oci_bind_by_name($stidNew, ':pan', $PanNo);
        // oci_bind_by_name($stidNew, ':Trader_pan_no', $Trader_pan_no);
        oci_bind_by_name($stidNew, ':Phone_No', $Phone_No);
        oci_bind_by_name($stidNew, ':Email', $Email);

        // mail demo
        // $to = "sushenman83@gmail.com";
        // $subject = "HTML email";

        // $message = "
        // <html>
        // <head>
        // <title>HTML email</title>
        // <style>
        // body{
        //     background-color: #f1f1f1;
            
        // }
        // button{
        //     display:flex;
        //     background-color: #4CAF50;
        //     color: white;
        //     padding: 14px 20px;
        //     margin: 8px 0;
        //     border: none;
        //     cursor: pointer;
        //     width: 100%;
        // }
        // </style>
        // </head>
        // <body>
        // <form>
        // <a href = 'localhost/OCI/Ecommerce/verify.php?email=$email'>OK </a>
        // <?php
        
        
        // </body>
        // </html>
        // ";

        // // Always set content-type when sending HTML email
        // $headers = "MIME-Version: 1.0" . "\r\n";
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // // More headers
        // $headers .= 'From: <bsushen20@tbc.edu.np>' . "\r\n";
        
        // $headers .= 'Bcc: gvishwas20@tbc.edu.np' . "\r\n";
        
        // if(mail($to,$subject,$message,$headers))
        // {
        //     echo "Email sent";
        // }
        // else
        // {
        //     echo "Email not sent";
        // }

        // display
        oci_execute($stidNew, OCI_NO_AUTO_COMMIT);
        oci_commit($conn);
        oci_free_statement($stidNew);
        oci_close($conn);
        header('location:traderLoginForm.php');
     }    
 ?>