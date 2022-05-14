<h4><a href="addProductForm.php">Add Product</a></h4>
<?php

    include('connection.php');
    // session_start();
    
    // echo $_SESSION['sPan'];
    if(isset($_POST['submit'])){
    
        $cat = $_POST['category'];
        echo $cat;
        $insertCategory = oci_parse($conn, 'INSERT INTO CATEGORY (CATEGORY_TYPE) VALUES (:cateGory)');
        oci_bind_by_name($insertCategory, ':cateGory', $cat); 
        oci_execute($insertCategory);
        oci_commit($conn);  // commits all new values: 1, 2, 3, 4, 5
        oci_free_statement($insertCategory);
        oci_close($conn);
        
    
    }
    // echo '<h4>Add Product</h4>'
    // include('addProductForm.php');
    header('location:addProductForm.php');






?>