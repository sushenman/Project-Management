<?php 
    $tradePan = $_SESSION['traderPan'];
   // echo 'verification request on process';
    //mail demo
    $to = "sushenman83@gmail.com";
    $subject = "HTML email";

    $message = "
    <html>
        <head>
            <title>Email Verification</title>
        </head>
        <body>
            <a href = 'localhost/Project/verify.php?id=${tradePan}'>OK </a>   
        </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
    $headers .= 'From: <bsushen20@tbc.edu.np>' . "\r\n";
    
    $headers .= 'Bcc: gvishwas20@tbc.edu.np' . "\r\n";
    
    if(mail($to,$subject,$message,$headers))
    {
        echo "Email sent";
    }
    else
    {
        echo "Email not sent";
    }
?>