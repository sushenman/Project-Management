
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/invoice.css">
</head>
<body>
    <?php

    include('connection.php');
    session_start();
// get latest payment id
    $payId = 0;
    $cId = $_SESSION['customerId'];
    
    $selectPayment = "SELECT MAX(PAYMENT_ID) FROM PAYMENT";
    $parseOrder = oci_parse($conn,$selectPayment);
    oci_execute($parseOrder);    
    while (($row = oci_fetch_array($parseOrder, OCI_BOTH)) != false) {                           
        $payId =  $row['MAX(PAYMENT_ID)'];
        
    }
    //customer name
    $customerName = "";  
    $selectCustomer = "SELECT Username FROM Customer where CUSTOMER_ID = $cId  ";
    $parseCustomer = oci_parse($conn,$selectCustomer);
    oci_execute($parseCustomer);    
    while (($row = oci_fetch_array($parseCustomer, OCI_BOTH)) != false) {                           

          $customerName = $row ['USERNAME'];
    }
    
?>
<div class="invoice-container">
    <div class="invoice">
        <h1>
            INVOICE
        </h1>
    </div>

<div class="invoice-head">
    <div class="invoice-num">
        <p>
            Invoice : <?php echo $payId; ?>
        </p>
    </div>
   
</div>

<div class="invoice-date">
        <p>
            Date: <?php echo date('m/d/y');?>
        </p>       
</div>

<div class="billedto">
    <div class="billedtohead">
        <p>
            Billed To: <?php echo $customerName ?>
        </p>

    </div>
    <div class="billedto-info">
        <div class="billedto-name">
            <p>
                
            </p>
        </div>
    </div>
</div>


<table class="invoice-table">
<div class="tablehead">   
    <tr>
          
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Amount</th>
    </tr>
</div>
<?php

include('connection.php');
$totalAmount = 0; 
foreach($_SESSION['mycart'] as $key => $val){
   
    include('connection.php');
    $selectProduct = "SELECT *FROM PRODUCT WHERE PRODUCT_ID = $key";
    $selectShop = oci_parse($conn,$selectProduct);
    oci_execute($selectShop);    
    while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {                           
        $imgName = $row['IMAGE_NAME'];
        $productName = $row['PRODUCT_NAME'];
        $proId = $row['PRODUCT_ID'];
        $price = $row['PRICE'];
        $quant = $val['qty'];
        $amount = $price*$quant;
        $totalAmount = $totalAmount + $amount;
    
        echo "<div class='tables'>"; 
            echo "<tr>";  
            echo "<td>";                            
            echo "<span class='proName'>${productName}</span>";
            echo "</td>";
            echo "<td>"; 
            echo "<span class='price'>$${price}</span>";
            echo "</td>"; 
            echo "<td>"; 
            echo "<span class='qty'>${quant}</span>";
            echo "</td>"; 
            echo "<td>"; 
            echo "$ <span class='amount'>${amount}</span>";
            echo "</td>"; 
            echo "</tr>";
        echo "</div>";
            
    } 
        
}
?>
</table>

<div class="total-end">
    <table>
        <tr>
            <th>
                Total:
            </th>
            <td>
               $<?php echo  $totalAmount ?>
            </td>
        </tr>
    </table>
  
</div>
</div>
</body>
</html>