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
$error = null;
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
   if($name=="" && $password==""){
       $error = "Please enter your name and password";
   }
  
}
?>
    <?php
    echo $error;
    ?>
    <form action="" name="myform" method="post" onsubmit="return validate()">
    <input type="text" name="name" id="name">
    <input type="password" name="password" id="password" >
    <input type="submit" name="submit" value="submit">
    </form>


</body>
</html>