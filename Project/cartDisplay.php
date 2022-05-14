<?php 
    echo "something";
    session_start();
    echo '<pre>';
        print_r($_SESSION['mycart']);
    echo '<pre/>';
?>