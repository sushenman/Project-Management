<?php
    session_start();
    include('connection.php');
    $cId = $_SESSION['customerId'];
    $desc = 'Paid';
    $payDate = date("d-m-y");
    $amount = $_SESSION['amount'];
    echo $cId;
    // echo '<pre>';

    //  print_r($_SESSION['mycart']);
    // echo '</pre>';

    // insert into payment table
    $insertPayment = oci_parse($conn, 'INSERT INTO PAYMENT (PAYMENT_DESCRIPTION,AMOUNT,PAYMENT_DATE,FK1_CUSTOMER_ID) VALUES (:descript,:amt,:paydate,:customerid)');        
    oci_bind_by_name($insertPayment, ':descript', $desc);
    oci_bind_by_name($insertPayment, ':amt', $amount);
    oci_bind_by_name($insertPayment, ':paydate', $payDate);
    oci_bind_by_name($insertPayment, ':customerid', $cId);

    oci_execute($insertPayment, OCI_NO_AUTO_COMMIT);
    oci_commit($conn);
    oci_free_statement($insertPayment);

    // get latest payment id
    $payId = 0;
    $selectPayment = "SELECT MAX(PAYMENT_ID) FROM PAYMENT";
    $parseOrder = oci_parse($conn,$selectPayment);
    oci_execute($parseOrder);    
    while (($row = oci_fetch_array($parseOrder, OCI_BOTH)) != false) {                           
        $payId =  $row['MAX(PAYMENT_ID)'];
    }





   // oci_close($conn);


    //send mail 

    // $sql = 'UPDATE PRODUCTS SET  Quantity = Quantity-10 where id = $product_id';
    // $stid = oci_parse($conn, $sql);
    // oci_execute($stid); 
    // oci_commit($conn);  
    // oci_free_statement($stid);
    // oci_close($conn);


    $to = "gvishwas20@tbc.edu.np";
    $subject ="Test Email";
    $message = '<a href = https://localhost/Project/success.php> Check your invoice </a>';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    if(mail($to, $subject, $message,$headers))
    {
        echo "Email sent";
    }
    else
    {
        echo "Email not sent";
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="style/payment.css">
</head>
<body>
    <h1>Invoice Id: <?php echo $payId?></h1>
    <h2><?php 
            $dateVal = date('m:d:y');
            echo $dateVal;

        ?></h2>
        <table></table>
    <div class="heading">
        <h1>Product</h1>
        <h1>Price</h1>
        <h1>Quantity</h1>
        <h1>Amount</h1>
    </div>
    <?php 
        // select from product
      
    
        echo $totalAmount;
        header('Location:successMessage.php');
    ?>

</body>
</html>