<?php 
    include('connection.php');
    session_start();
    if(isset($_POST['submit-cmnt'])){
        if(!isset($_SESSION['customerlogedin'])){
            // echo 'not loged in';
            $_SESSION['error'] = 'login in required to comment';
            // header('location:viewProduct.php');
            include('customerLoginForm.php');
           
        }else {
            $rating = $_POST['review'];
            $comment = $_POST['comment'];
            $adminId = 1;
            $customerId = $_SESSION['customerId'];
            $pId = $_SESSION['productsId'];
            echo $rating;
            echo $comment;
    
            // insert into review table
            $insertReview = oci_parse($conn, 'INSERT INTO REVIEW (RATING,DESCRIPTION,FK1_ADMIN_ID,FK2_CUSTOMER_ID,FK3_PRODUCT_ID) VALUES (:rate,:descpt,:adminId,:customId,:prodId)');        
            oci_bind_by_name($insertReview, ':rate', $rating);
            oci_bind_by_name($insertReview, ':descpt', $comment);
            oci_bind_by_name($insertReview, ':adminId', $adminId);
            oci_bind_by_name($insertReview, ':customId', $customerId);
            oci_bind_by_name($insertReview, ':prodId', $pId);
        
            oci_execute($insertReview, OCI_NO_AUTO_COMMIT);
            oci_commit($conn);
            oci_free_statement($insertReview);
            header('Location:index.php');
        }
    }

?>