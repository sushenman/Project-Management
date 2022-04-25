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
    <!-- <?php
    // $error = null;
    // if(isset($_POST['Register'])){
    //     $name=$_POST['username'];
    //     $password=$_POST['password'];
    //     $address = $_POST['Address'];
    //     $email = $_POST['Email'];
    //     $phone = $_POST['Phone_No'];

    //    if($name=="" && $password==""){
    //        $error = "Please enter your name and password";
    //    }
    //      else if($name==""){
    //           $error = "Please enter your name";
    //      }
    //      else if($password==""){
    //           $error = "Please enter your password";
    //      }
    //      else if($address==""){
    //           $error = "Please enter your address";
    //      }
    //      else if($email==""){
    //           $error = "Please enter your email";
    //      }
    //      else if($phone==""){
    //           $error = "Please enter your phone number";
    //      }
        
      
    // }
    ?> -->
    <div class="container">
        <!-- HEADER -->
        <div class="heading">
            <img src="images/logo.png" alt="" />
            <!-- <form action="#" class="search">
                <input
                    type="text"
                    placeholder="Search.."
                    class="search-bar" />
                    <button type="submit"><i class="fa fa-search"></i></button>
            </form> -->

            <div class="form">
                <form action="index.php" method="post">
                    <input
                        type="text"
                        name=""
                        id=""
                        placeholder="Search.."
                        class="Search"
                    />
                    <span class="icon">
                        <i class="fas fa-search"></i>
                    </span>
                </form>
            </div>
            <!-- Navigation Bar -->

            <ul class="navbar">
                <li><a class="navigation" href="#home">HOME</a></li>
                <li><a href="Shop">SHOP</a></li>
                <li><a href="login">LOGIN</a></li>
                <li>
                    <a href="cart"
                        ><div class="cart">
                            <img src="images/cart.png" alt="icon" /></div
                    ></a>
                </li>
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
            <p>Create new Account</p>
        </div>
     <div id="errormsg"></div>
        <div class="regi-form">
            <form action="" method="POST" name="registerform" id="registerform" onsubmit="return customervali()" >
                <input type="text" name="username" placeholder="Username" class="form-type" id="username">
                <input type="password" name="password" placeholder="Password" class="form-type" id="password">
                <input type="text" name="Address" placeholder="Address"  class="form-type" id="Address">
                <input type="text" name="Phone_No" placeholder="Phone Number"  class="form-type" id="Phone_Number">
                <input type="text" name="Email" placeholder="Email"  class="form-type" >
                <input type="hidden" name="status" value="deactive">
                <input type="submit" value="Register" name = "submit" class="submit-btn">
            </form>
        </div>
    </div> 
  
 

    <?php
    
    include('connection.php');
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone_No'];
        $status = $_POST['status'];
            $stid = oci_parse($conn, 'INSERT INTO USERSS(USERNAME,PASSWORD,PHONE_NO,EMAIL,status) VALUES(:username,:password,:Phone_no,:Email,:status)');
            oci_bind_by_name($stid, ':username', $username);
            oci_bind_by_name($stid, ':password', $password);
            oci_bind_by_name($stid, ':Phone_no', $Phone_no);
            oci_bind_by_name($stid, ':Email', $Email);
            oci_bind_by_name($stid, ':status', $status);
           
            
            oci_execute($stid);  // use OCI_DEFAULT for PHP <= 5.3.1
            oci_commit($conn);  // commits all new values: 1, 2, 3, 4, 5
            oci_free_statement($stid);
            oci_close($conn);
           

}
    ?>
    <script src="js/register.js"></script>
</body>
</html>