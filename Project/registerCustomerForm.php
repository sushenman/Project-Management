<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/registercustomer.css"> 
</head>
<body>
    <div class="container">
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
                <form action="registerCustomer.php" method="POST" name="registerform" id="registerform">
                    <input type="text" name="username" placeholder="Username" class="form-type" id="username">
                    <input type="password" name="password" placeholder="Password" class="form-type" id="password">
                    <input type="text" name="address" placeholder="Address"  class="form-type" id="Address">
                    <input type="text" name="phone_no" placeholder="Phone Number"  class="form-type" id="Phone_Number">
                    <input type="text" name="email" placeholder="Email"  class="form-type" >
                    <input type="hidden" name="status" value="deactive">
                    <input type="submit" value="register" name = "submit" class="submit-btn">
                </form>
            </div>
        </div> 
    <!-- <script src="js/register.js"></script> -->
</body>
</html>