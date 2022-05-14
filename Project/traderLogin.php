<?php 
    include('connection.php');
    if(isset($_POST["submit"])){
        $user = $_POST["username"];
        $pwd = $_POST["password"];
        echo $user;

        // selecting trader from database whose username and password matches
        $selectTrader = "SELECT *FROM trader WHERE USERNAME ='$user' AND PASSWORD ='$pwd'";
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
            echo $_SESSION['pan'];
            // include('selectShopForm.php');
            echo $user;
        //    include('selectingShop.php'); 
        
            echo 'selectshop';
           // session_start();
            $pann = $_SESSION['pan'];
        
            echo $pann;
            $selectQry = "SELECT *FROM SHOP WHERE FK1_TRADER_PAN_NO = '$pann'";
            $selectShop = oci_parse($conn,$selectQry);
            oci_execute($selectShop);
            
            $num = 0;
            while (($row = oci_fetch_array($selectShop, OCI_BOTH)) != false) {
                // echo $row['SHOP_NAME'].'<br>';
            $num++;
            //    echo $num;
            }
            echo 'number of data is'.$num++;
            if($num <= 2){
                echo 'insert more shop';
                include('selectShopForm.php');
            }else {
                echo 'cannnot insert shop';
                // include('selectShopForm.php');
                header('Location:actualShop.php');
            }
           // header('Location:selectingShop.php');              
        }else {
            //session_start();
            // set error when trader count is not 1
            $_SESSION['error'] = 'user not recognized';
            include('traderLoginForm.php');               
        }
    }else {
        echo 'not submitted';
    }
?>
