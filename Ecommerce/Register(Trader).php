<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/navi.css">
    <link rel="stylesheet" href="css/register.css">
  
</head>
<body>

    
    <div class="container">
     
        <div class="logo">
            <img src="images/logo.png" alt="" srcset="">
        </div>

        <div class="form">
            <form action="index.php" method="post">
                <input type="text" name="" id="" placeholder="Search..">
            </form>
        </div>
    
    <div class="navi">
        <ul>
            <li>Home</li>
            <li>Shop</li>
            <li>Login</li>
            <li>Contact</li>
        </ul>
    </div>
  
    
    </div>
    <div class="regi">
    <div class="accountlg">
            <img src="images/acc.png" id="photo">
           <input type="file"  id="file">
           <label for="file" id="upload">Choose Photo</label>
        </div>
                <div class="newacc">
           <h3>Create account </h3>
        </div>
     
            <form action="" method="POST">
                <input type="hidden" name="user_Type" id="TRADER" value = "TRADER">
                <div class="regi-form1">
            <div class="form-grp">
                <input type="text" name="username" placeholder="Username" class="form-type1">
            </div>
            <div class="form-grp">
                <input type="password" name="password" placeholder="Password" class="form-type1">
                </div>
                <div class="form-grp">
                <input type="text" name="Trader_Pan_No" placeholder="Pan_No" class="form-type1">
                </div>
                
               
                <div class="form-grp">
                <input type="text" name="Phone_No" placeholder="Phone Number" id="" class="form-type1">
                </div>
                <div class="form-grp">
                <input type="text" name="Email" placeholder="Email" id="" class="form-type1">
                </div>
                <div class="form-grp">
                    <input type="text" name="Shop_Pan_Np" id="" placeholder="shop pan no" >
                </div>
                <div class="form-grp">
                    <input type="text" name="Shop_Name" id="" placeholder="shop name" >
                </div>
                <div class="form-grp">
                    <input type="text" name="Shop_Address" id="" placeholder="shop address" >
                </div>
                <div class="form-grp">
                    <input type="text" name="Shop_Phone_No" id="" placeholder="shop phone no" >
                </div>

                <div class="form-grp">
                <input type="submit" name="submit" value="Register" class="submit-btn1">
                </div>
            </div>
            </form>
      
    
      </div>
   
    </div>
    <?php
    include "connection.php";
    if(isset($_POST['submit']))
    {




        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_Type = $_POST['user_Type'];
        $Trader_Pan_No = $_POST['Trader_Pan_No'];
       
        $Phone_No = $_POST['Phone_No'];
        $Email = $_POST['Email'];

        // $sql = "INSERT INTO USERSS(USERNAME,PASSWORD,USER_TYPE,TRADER_PAN_NO,PHONE_NO,EMAIL) VALUES ('$username','$password','$user_Type','$Trader_Pan_No','$Phone_No','$Email')";
        // $result = oci_parse($conn,$sql);
        // $SS  = oci_execute($result);
        // if($SS)
        // {
        //     echo "Successfully Inserted";
        // }
        // else
        // {
        //     echo "Error";
        // }
        

        // echo '<script>alert("'.$Trader.'")</script>';
        $stid = oci_parse($conn, 'INSERT INTO USERSS (USERNAME,PASSWORD,TRADER_PAN_NO,PHONE_NO,EMAIL,USER_TYPE) VALUES (:username, :password, :Trader_pan_no, :Phone_no, :Email,:user_Type)');
        
        echo'$stid';
        oci_bind_by_name($stid, ':username', $username);
        oci_bind_by_name($stid, ':password', $password);
        oci_bind_by_name($stid, ':Trader_pan_no', $Trader_pan_no);
        oci_bind_by_name($stid, ':user_Type', $user_Type);
        oci_bind_by_name($stid, ':Phone_No', $Phone_no);
        oci_bind_by_name($stid, ':Email', $Email);
      
        $to = "sushenman83@gmail.com";
        $subject = "HTML email";
        
        $message = "
        <html>
        <head>
        <title>HTML email</title>
        <style>
        body{
            background-color: #f1f1f1;
            
        }
        button{
            display:flex;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        </style>
        </head>
        <body>
        <form>
        <a href = 'localhost/OCI/Ecommerce/verify.php?email=$email'>OK </a>
        <?php
        
        
        </body>
        </html>
        ";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <bsushen20@tbc.edu.np>' . "\r\n";
        
        $headers .= 'Bcc: gvishwas20@tbc.edu.np' . "\r\n";
        
        if(mail($to,$subject,$message,$headers))
        {
            echo "Email sent";
        }
        else
        {
            echo "Email not sent";
        }
   
oci_execute($stid, OCI_NO_AUTO_COMMIT);  // use OCI_DEFAULT for PHP <= 5.3.1
oci_commit($conn);  // commits all new values: 1, 2, 3, 4, 5
oci_free_statement($stid);
oci_close($conn);
     }
   
    
    
    ?>
    <script src="js/register.js"></script>
</body>
</html>