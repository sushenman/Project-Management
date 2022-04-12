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


// Language: javascript
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


//categories
console.log("Hello");


