<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="navi.css"> -->
    <link rel="stylesheet" href="registerTraderForm.css"> 
</head>
<body>
    <div class="regi">
        <div class="accountlg">
            <!-- <img src="images/acc.png" id="photo">
           <input type="file"  id="file">
           <label for="file" id="upload">Choose Photo</label> -->
        </div>
        <div class="newacc">
            <h3>Create account </h3>
        </div>    
        <form action="registerTrader.php" method="POST">
            <!-- <input type="hidden" name="user_Type" id="TRADER"> -->
            <div class="regi-form1">
                <div class="form-grp">
                    <input type="text" name="username" placeholder="Username" class="form-type1">
                </div>
                <div class="form-grp">
                    <input type="password" name="password" placeholder="Password" class="form-type1">
                </div>
                <!-- <div class="form-grp">
                    <input type="text" name="Trader_Pan_No" placeholder="Pan_No" class="form-type1">
                </div>           -->
                <div class="form-grp">
                    <input type="text" name="Phone_No" placeholder="Phone Number" id="" class="form-type1">
                </div>
                <div class="form-grp">
                    <input type="text" name="Email" placeholder="Email" id="" class="form-type1">
                </div> 
                <!-- edited part -->
                <!-- <div class="form-grp"> -->
                    <!-- <label for="shops">Choose a Shop</label> -->
                    <!-- <select name="shops" id="shop">
                        <option value="grocery">Grocery</option>
                        <option value="meat">Meat</option>
                        <option value="Delascence">Delascence</option>
                        <option value="grocery">Grocery</option>
                    </select> -->
                <!-- </div> -->
                <div class="form-grp">
                    <input type="submit" name="submit" value="Register" class="submit-btn1">
                </div>
            </div>
        </form>    
    </div>    

    <!-- <script src="js/register.js"></script> -->
</body>
</html>