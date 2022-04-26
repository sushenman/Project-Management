<?php 
    session_start();
    if(isset($_SESSION['user'])){
        echo $_SESSION['pan'];
        // include('trader.php');
        include('selectShopForm.php');
    }else {
        echo $_SESSION['error'];
        include('traderLoginForm.html');
    }
?>