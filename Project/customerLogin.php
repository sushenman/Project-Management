<?php 
    include('connection.php');
    if(isset($_POST["submit"])){
        $user = $_POST["username"];
        $pwd = $_POST["password"];
        echo $user;

        // selecting customer from database whose username and password matches
        $selectCustomer = "SELECT *FROM CUSTOMER WHERE USERNAME ='$user' AND PASSWORD ='$pwd'";
        $customerQuery = oci_parse($conn, $selectCustomer);
        
        // execute query            
        oci_execute($customerQuery);
        
        $countCustomer = 0;
        $customerId = 0;
        // fetching customer to count number of customer
        if (($row = oci_fetch_array($customerQuery, OCI_BOTH)) != false) {
            $countCustomer++;
            $customId = $row['CUSTOMER_ID'];

        }
       // echo $customId;
        // set session variables when number of trader is 1
        if($countCustomer == 1){                       
            session_start();
            $_SESSION['customername'] = $user;
            $_SESSION['customerId'] = $customId;
            $_SESSION['customerlogedin'] = true;
            // echo 'loged in';
            header('Location:index.php');
        }else {
            $_SESSION['error'] = 'user not recognized';
            include('customerLoginForm.php');               
        }
    }
?>
