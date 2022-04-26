function validation(){
    var name = document.myform.name.value;
    var email = document.myform.email.value;
    var address = document.myform.address.value;
      if(name=="" && email=="" && address ==""){
          document.getElementById("errormsg").innerHTML="Please input in all the fields";
          document.myform.focus();
          return false;
      }
      else if(name=="" ){
        document.getElementById("errormsg").innerHTML="Name is Required";
        document.myform.name.focus();
        return false;
      }
    
    else if(email==""){
        document.getElementById("errormsg").innerHTML="Email IS Required";
        document.myform.email.focus();
        return false;
      }
    
      else if(address==""){
          document.getElementById("errormsg").innerHTML="Address IS Required";
          document.myform.address.focus();
          return false;
        }
       
    return true;
    }