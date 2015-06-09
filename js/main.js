function getcctype(ccnumber)
{

  //start without knowing the credit card type
  var result = "";

  //first check for MasterCard
  if (/^5[1-5]/.test(ccnumber))
  {
    result = "mastercard";
  }

  //then check for Visa
  else if (/^4/.test(ccnumber))
  {
    result = "visa";
  }

  //then check for AmEx
  else if (/^3[47]/.test(ccnumber))
  {
    result = "amex";
  }

  return result;
}



function getgetway(){
    
    price = $("#price").val();
    crtype = $("#crtype").val();
    full_name = $("#full_name").val();
    cchfname = $("#cchfname").val();
    cchlname = $("#cchlname").val();
    ccnumber = $("#ccnumber").val();
    exy = $("#exy").val();
    exm = $("#exm").val();
    ccv = $("#ccv").val();
    cctype = getcctype(ccnumber);
    getway = "";
    
    if(crtype=="USD" || crtype=="EUR" || crtype=="AUD" || cctype=="amex"){

    
        
        if(cctype=="amex" && crtype!="USD"){
        $( "#msg" ).append('<div class="alert alert-danger" role="alert">That AMEX is possible to use only for USD</div>'); 
    }else{
        getway="paypal"
    }
    
    
    
}else{
        getway="braintree"
}
    if(getway!=""){
        $( "#msg" ).append('<div class="alert alert-warning" role="alert"><b>Transaction in Process...</b></div>'); 
     
            $.post( "ajaxreq.php", {
                getway: getway,
                price: price,
                crtype: crtype,
                full_name: full_name,
                cchfname: cchfname,
                cchlname: cchlname,
                ccnumber: ccnumber,
                exy:exy,
                exm:exm,
                ccv:ccv,
                cctype:cctype
                
    } ,function( data ) {
    $( "#msg" ).html("");        
    $( "#msg" ).append('<div class="alert alert-success" role="alert">'+data+'</div>'); 
            

});
        
    }
    
    

    
    
}





function buynow(){
 $( "#msg" ).html("");   
    price = $("#price").val();
    crtype = $("#crtype").val();
    full_name = $("#full_name").val();
    cchfname = $("#cchfname").val();
    cchlname = $("#cchlname").val();
    ccnumber = $("#ccnumber").val();
    exy = $("#exy").val();
    exm = $("#exm").val();
    ccv = $("#ccv").val();
    
        if(price!=""){
            if(price>0){
            price = (price*1).toFixed(2);
                
     if(/(?:^\d{1,3}(?:\.?\d{3})*(?:,\d{2})?$)|(?:^\d{1,3}(?:,?\d{3})*(?:\.\d{2})?$)/.test(price)){
   
         if(crtype!=""){
          
             if(full_name!=""){
                 if(full_name.length>5){
                     
                     if(cchfname!=""){
                         if(cchlname!=""){
                             
                             
                             if(ccnumber!=""){
                                 
                                 if(getcctype(ccnumber)!=""){
                                     
                                     if(exm!=""){
                                         
                                         if(exy!=""){
     
                                             if(ccv!=""){
                                               
                    if(/^[0-9]{3,4}$/.test(ccv)){
                        getgetway();
                    }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Please enter valid CCV!</div>');                                                                                                                 
                    }                             
                                                 
                                             }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Please enter credit card CCV!</div>');                                                                                                                                      
                                             }
                                             
                                         }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Select credit card expiration year</div>');                                                                                                                 
                                         }
                                         
                                         
                                     }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Select credit card expiration month</div>');                                                                       
                                     }
                                     
                                     
                                     
                                 }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Credit card number is not valid</div>');                                  
                                 }
                                 
                                 
                             }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Enter Credit card number</div>');                                                        
                             }
                             
                             
                             
                         }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Enter Credit card holder last name</div>');                          
                         }
                         
                     }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Enter Credit card holder first name</div>');                                                            }
                     
                 }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Full name is too shot. at least 6 characters!</div>');                    
                 }
             }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Please enter full name!</div>');                }
             
         }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Please select currency type!</div>');          
         }
         
            }
            }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Price value must be grater then zero!</div>');                 }
                
        }else{
   $( "#msg" ).append('<div class="alert alert-danger" role="alert">Please enter price!</div>');
            }
            

}













