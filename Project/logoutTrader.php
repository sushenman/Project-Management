<?php
    session_start();
    if(isset($_GET['logout'])){
        echo 'logout';
        session_destroy();
        // unset
    }
    header('Location:traderLoginForm.php');
?>