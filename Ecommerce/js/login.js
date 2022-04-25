function validate()
{
    var name = document.getElementById("name").value;
    var password = document.getElementById("password").value;

    if (name == "")
    {
    
        document.getElementById("errormsg").innerHTML = "Please enter your name";
        return false;
    }
    var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

    else if (password == "")
    {
        document.getElementById("errormsg").innerHTML = "Please enter your password";
        return false;
    }
    else if (password.match(decimal))
    {
        document.getElementById("errormsg").innerHTML = "Password should be 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character";
        return false;
    }
    else
    {
        return true;
    }
}