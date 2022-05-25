function validation()
{
    var name= document.traderform.username.value;
    var password = document.traderform.password.value;
    var trader_pan_no = document.traderform.Trader_Pan_No.value;
    var phoneno = document.traderform.Phone_No.value;
    var email= document.traderform.Email.value;
    
    let email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(name=="" && password=="" && trader_pan_no=="" && phoneno=="" && email=="")
    {
        document.getElementById("errormsg").innerHTML="Please enter all the values";
        document.traderform.focus();
        return false;  
     
    }
    else if(name=="")
    {
        document.getElementById("errormsg").innerHTML="Please enter all the values";
          document.traderform.focus();
          return false;  
    }
    else if(password=="")
    {
        document.getElementById("errormsg").innerHTML="Please enter the password";
          document.traderform.focus();
          return false;  
    }
    else if(trader_pan_no=="")
    {
        document.getElementById("errormsg").innerHTML="Please enter trader pan number";
          document.traderform.focus();
          return false;  
    }
    //phone number should be exact 10 digits
    else if(phoneno=="" || phoneno.length!=10)
    {
        document.getElementById("errormsg").innerHTML="phone number should be exact 10 digits";
          document.traderform.focus();
          return false;  
    }
    else if(phoneno=="")
    {
        document.getElementById("errormsg").innerHTML="Please enter the phone number";
        document.traderform.focus();
        return false;  
    }
    //validate email using regex
   
    else if(!email_regex.test(email))
    {
        document.getElementById("errormsg").innerHTML="Please enter valid email";
        document.traderform.focus();
        return false;  
    }

    else if(email=="")
    {
        document.getElementById("errormsg").innerHTML="Please enter the email";
        document.traderform.focus();
        return false;  
    }

   
}

