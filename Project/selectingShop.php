<?php 
    include('connection.php');
    echo 'selectshop';
    session_start();
    $pann = $_SESSION['pan'];

    echo $pann;
    $selectQry = "SELECT *FROM SHOP WHERE FK1_TRADER_PAN_NO = '$pann'";
    $selectShop = oci_parse($conn,$selectQry);
    oci_execute($selectShop);
    
    $num = 0;
    while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
        // echo $row['SHOP_NAME'].'<br>';
       $num++;
    //    echo $num;
    }
    echo 'number of data is'.$num++;
    if($num <= 2){
        echo 'insert more shop';
       include('selectShopForm.php');
    }else {
        echo 'cannnot insert shop';
        // include('selectShopForm.php');
        header('Location:actualShop.php');
    }

?>