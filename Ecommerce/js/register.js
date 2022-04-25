function customervali(){
    const c_username = document.registerform.username.value;
    const c_password = document.registerform.password.value;
    const c_address = document.registerform.Address.value;
    const c_phoneno = document.registerform.Phone_No.value;
    const c_email = document.registerform.Email.value;
     
    if(c_username=="" && c_email=="" && c_address == "" && c_phoneno == "" && c_password ==""){
      // alert("Please input in all the fields");
     document.getElementById("errormsg").innerHTML="Please input in all the fields";
  
      return false;
  }

    if(c_username=="" ){
    
    document.getElementById("errormsg").innerHTML="Name is Required";
    return false;
    }
    var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    if(c_password=="" ){
    //  alert("Password is Required");
    document.getElementById("errormsg").innerHTML="Password is Required";
    return false;
     
    }
  if( !c_password.match(decimal)){
    document.getElementById("errormsg").innerHTML="Password should be 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character";
    return false;
  }
    if(c_address=="" ){
    // alert("Address is Required");
    document.getElementById("errormsg").innerHTML="Address is Required";
    return false;
    
    }
    if(c_phoneno=="" ){
    // alert("Phone No is Required");
    document.getElementById("errormsg").innerHTML="Phone No is Required";
    return false;
     
    }
    if(c_email=="" ){
    // alert("Email is Required");
    document.getElementById("errormsg").innerHTML="Email is Required";
    return false;
     
    }

    
   
    return true;
  };
  
  
// Language: javascript
//choose photos
const imgDiv = document.querySelector('.accountlg');
const img = document.querySelector("#photo");
const file = document.querySelector("#file");
 const upload=  document.querySelector("#upload");

 imgDiv.addEventListener('mouseenter',function(){
   upload.style.display="block";
 });
 imgDiv.addEventListener('mouseleave',function(){
   upload.style.display="none";
 });
file.addEventListener('change',function(){
const chooseFile = this.files[0];
if(chooseFile)
{
  const reader = new FileReader();
  reader.addEventListener('load',function(){
    img.setAttribute('src',reader.result);
  });
  reader.readAsDataURL(chooseFile);
}
});
