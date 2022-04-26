<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include('connection.php');
        session_start();
        if(isset($_POST["submit"])){
            $user = $_POST["username"];
            $pwd = $_POST["password"];
            echo $user;
            echo $pwd;

            $traderQuery = oci_parse($conn, "SELECT * FROM trader WHERE USERNAME ='$user' AND PASSWORD ='$pwd'");
            oci_execute($traderQuery);
        
            if (($row = oci_fetch_array($traderQuery, OCI_BOTH)) != false) {
            // Use the uppercase column names for the associative array indices
                // echo $row['USERNAME'];
                // echo $row['TRADER_PAN_NO'];
                $_SESSION['user'] = $user;
                $_SESSION['pan'] = $row['TRADER_PAN_NO'];
                // echo $row['TRADER']
                header('location:sessions.php');

            }else {
                $_SESSION['error'] = 'user not recognized';
                header('location:sessions.php');
            }

        }else {
            echo 'not submitted';
        }
    ?>
</body>
</html>