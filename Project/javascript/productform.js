function validation(){
    let product_name = document.productform.product_name.value;
   
    let productdescription = document.productform.description.value;
   
    let price = document.productform.price.value;

   var quantity = document.productform.qty.value;
 
    let imagename = document.productform.image_name.value;

    if(product_name =="" && productdescription=="" && price == "" && quantity=="" && imagename== "")
    {
        document.getElementById("errormsg").innerHTML="Please enter all the values";
          document.productform.focus();
          return false;  

    }
    else if(product_name == "")
    {
        document.getElementById("errormsg").innerHTML="Please enter all the values";
          document.productform.focus();
          return false;
    }
    else if(productdescription == "")
    {
        document.getElementById("errormsg").innerHTML="Please enter all the values";
        document.productform.focus();
        return false;
    }
    else if(price == "")
    {
        document.getElementById("errormsg").innerHTML="Please enter all the values";
        document.productform.focus();
        return false;
    }
    else if(isNaN(price))
    {
        document.getElementById("errormsg").innerHTML="Please enter all the values";
          document.productform.focus();
          return false;
    }
    else if(quantity =="" && quantity == 0)
    {
        document.getElementById("errormsg").innerHTML="Please enter all the values";
        document.productform.focus();
        return false;
    }
    else if(isNaN(quantity))
    {
        document.getElementById("errormsg").innerHTML="Please enter all the values";
        document.productform.focus();
        return false;
    }
    else if(imagename == "")
    {
        document.getElementById("errormsg").innerHTML="Please enter all the values";
        document.productform.focus();
        return false;
    }
  

}
