function validation(){
    var name = document.registerform.username.value;
    var email = document.registerform.email.value;
    var password = document.registerform.password.value;
    var address = document.registerform.address.value;
    var phone_num = document.registerform.phone_no.value;
    let regpass="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$";
    let email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if(name=="" && email=="" && password==""&& address =="" && phone_num ==""){
          document.getElementById("errormsg").innerHTML="Please enter all the values";
          document.registerform.focus();
          return false;
      }
      else if(name==""){
        document.getElementById("errormsg").innerHTML="Name is Required";
        document.registerform.name.focus();
        return false;
      }
    
    else if(email==""){
        document.getElementById("errormsg").innerHTML="Email Is Required";
        document.registerform.email.focus();
        return false;
      }
      else if(!email_regex.test(email))
    {
        document.getElementById("errormsg").innerHTML="Please enter the valid email";
        document.registerform.address.focus();
        return false;
    }
      else if(password=="" )
      {
        document.getElementById("errormsg").innerHTML="Password IS Required";
        document.registerform.address.focus();
        return false;
      }
      else if(!password.match(regpass))
      {
        document.getElementById("errormsg").innerHTML="Password should contain at least 8 characters and one capital";
        document.registerform.address.focus();
        return false;
      }
      else if(address==""){
          document.getElementById("errormsg").innerHTML="Address IS Required";
          document.registerform.address.focus();
          return false;
        }
        else if(phone_num = ""){
            document.getElementById("errormsg").innerHTML="Phone number is required";
            document.registerform.address.focus();
            return false;
        }
       
    return true;
   
    }
    
