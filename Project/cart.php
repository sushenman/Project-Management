<?php 
    include('connection.php');
    session_start();
    if(isset($_GET['action']) == "add"){
        $val = $_GET['id'];
        $qty = $_POST['quantity'];

        // Select From Product
        $actualQty = 0;
        $selectProduct = "SELECT QUANTITY FROM PRODUCT WHERE PRODUCT_ID = $val";
        $parseProduct = oci_parse($conn,$selectProduct);
        oci_execute($parseProduct);
        while (($row = oci_fetch_array($parseProduct, OCI_BOTH)) != false) {
             $actualQty =  $row['QUANTITY'];
        }

        echo $qty;
        if($qty > $actualQty ){
            $_SESSION['error-msg'] = 'Quantity of items exceeded';
            $_SESSION['pId'] = $val;
            header('location:shop.php');
            // echo 'cannot ';
        }else if($qty == 0){
            $_SESSION['error-msg'] = 'Out of Stock';
            $_SESSION['pId'] = $val;
            header('location:shop.php');

        }else {
            // converting value to integer
            // session_destroy();
            unset($_SESSION['pId']);
            $id = intval($val);
            if(isset($_SESSION['mycart'][$id])){
                $previous = $_SESSION['mycart'][$id]['qty'];
                // add quantity to the previous quantity if product already added
                $_SESSION['mycart'][$id] = array("pid"=>$id,"qty"=>$previous+$_POST['quantity']);
            }else {
                $_SESSION['mycart'][$id] = array("pid"=>$id,"qty"=>$_POST['quantity']);
            }
            header('location:shop.php');

        }
    }
    
?>