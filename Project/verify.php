<?php
    include('connection.php'); 
    echo $_GET['id'];
    echo 'trader activated';
    $tradersId = $_GET['id'];
    
    // activate the traders
    $activateTrader = "UPDATE trader SET STATUS ='active' WHERE TRADER_PAN_NO = '${tradersId}'";
    $traderQuery = oci_parse($conn, $activateTrader);
    
    // execute query            
    oci_execute($traderQuery);

?>