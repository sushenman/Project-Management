// const msg = document.querySelector('.error-msg');
// const msgShop = document.querySelector('.shop-error');
// const msgAddress = document.querySelector('.address-error');
// const msgContact = document.querySelector('.contact-error');
// let errorMsg = '';
// let shopErrorMsg = '';
// let addressErrorMsg = '';
// let contactErrorMsg = '';

function validation()
{
    let shop_name= document.shopform.shop_name.value;

    let shop_address = document.shopform.shop_address.value;
   
    let shop_phone_no = document.shopform.contact.value;
  

    if(shop_name=="" && shop_address=="" &&  shop_phone_no=="")
    {
       
            document.getElementById("errormsg").innerHTML="Please enter all the values";
          document.shopform.focus();
          return false;
    }
    else if(shop_name.length < 4 || shop_name.length >15)
        {
            document.getElementById("errormsg").innerHTML="The shop name should be between 4 to 15";
            document.shopform.focus();
            return false;
        }
    else if(shop_address=="")
        {
            document.getElementById("errormsg").innerHTML="Please enter the shop address";
            document.shopform.focus();
            return false;
        }
    else if(shop_phone_no=="")
        {
            document.getElementById("errormsg").innerHTML="Please enter the phone number";
            document.shopform.focus();
            return false;
        }
    else if(shop_phone_no.length!=10)
        {
            document.getElementById("errormsg").innerHTML="The length of the phone number should be 10";
            document.shopform.focus();
            return false;
        }
        
    }
    
    

