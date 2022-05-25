<?php 
    include('connection.php');
    if(isset($_POST["submit"])){
        $user = $_POST["username"];
        $pwd = $_POST["password"];
        // echo $user;

        // selecting trader from database whose username and password matches
        $selectTrader = "SELECT *FROM trader WHERE USERNAME ='$user' AND PASSWORD ='$pwd' AND STATUS = 'active'";
        $traderQuery = oci_parse($conn, $selectTrader);
        
        // execute query            
        oci_execute($traderQuery);
        
        $countTrader = 0;
        $pan = 0;
        // fetching trader to count number of trader
        if (($row = oci_fetch_array($traderQuery, OCI_BOTH)) != false) {
            $countTrader++;
            // fetch pan number of trader
            $pan = $row['TRADER_PAN_NO'];
        }
        // set session variables when number of trader is 1
        if($countTrader == 1){                       
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['logedin'] = true;
            $_SESSION['pan'] = $pan;
            header('location:actualShop.php');

        }else {
            //session_start();
            // set error when trader count is not 1
            $_SESSION['error'] = 'user not recognized and user is not verified';
            include('traderLoginForm.php');               
        }
    }else {
        echo 'not submitted';
    }
?>
