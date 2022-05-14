<?php
    include('connection.php');
    $stid = oci_parse($conn, 'SELECT * FROM trader');
    oci_execute($stid);

    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    // Use the uppercase column names for the associative array indices
    echo $row['USERNAME'];
    echo $row['TRADER_PAN_NO'];
    // echo  $row['DNAME']. "\t";
    // echo  $row['LOC']. "<br>";
    }

?>