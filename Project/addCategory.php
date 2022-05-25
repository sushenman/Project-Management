<!-- <h4><a href="addProductForm.php">Add Product</a></h4> -->
<?php

    include('connection.php');
    session_start();
    
    // echo $_SESSION['sPan'];
    if(isset($_POST['cat-submit'])){
    
        $cat = $_POST['category'];
        echo $cat;
        if($cat == 'fish'){
            $_SESSION['catId'] = 5001;
        }else if($cat == 'meat'){
            $_SESSION['catId'] = 5000;
        }else if($cat == 'deli'){
            $_SESSION['catId'] = 5002;
        }else if($cat == 'grocery'){
            $_SESSION['catId'] = 5003;
        }

        // echo $cat;

        header('location:addProductForm.php');  
    }
    // echo '<h4>Add Product</h4>'
    // include('addProductForm.php');
   // header('location:addProductForm.php');

?>