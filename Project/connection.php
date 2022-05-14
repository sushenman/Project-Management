<?php
$conn = oci_connect('clickmart', 'Bi$giri12', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    echo ' not connected';
}else {
    // echo 'connected';
}
?>