<?php 
    // include('connection.php');
    session_start();
    //session_destroy();
    if(isset($_GET['action']) == "add"){
        $val = $_GET['id'];
        // converting value to integer
        $id = intval($val);
        $_SESSION['mycart'][$id] = array("pid"=>$id);
        
        echo '<pre>';
            print_r($_SESSION['mycart']);
        echo '<pre/>';
        header('Location:shop.php');

    }
    // if(isset($_POST['submit'])){
    //     echo $_GET["id"];
    // }


?>