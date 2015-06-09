<?php
require_once "config.php";
 require __DIR__ . '/paypal/autoload.php';
use \PayPal\Rest\ApiContext;
use \PayPal\Auth\OAuthTokenCredential;
use \PayPal\Api\CreditCard;
use \PayPal\Api\FundingInstrument;
use \PayPal\Api\Payer;
use \PayPal\Api\Amount;
use \PayPal\Api\Transaction;
use \PayPal\Api\Payment;


class getway_class{
    

    
  function paypal($price, $crtype, $cchfname, $cchlname, $ccnumber, $cctype, $exy, $exm, $ccv){
        
       

$sdkConfig = array(
	"mode" => "sandbox"
);

$cred = new OAuthTokenCredential("ATYkzIAfN-xz-Q189iOCMhfK6h4kaNw5Vnef2GQIk5dquVTikyu7frWO04rVcA7pzhVhvTLx8qHhOZxV",
"EFCFcY-5cCdW_1cx-HXjIzcdaSzMtpt3bZr1zOPBoTIWnDsEQhZts3g0tFm5EjbX9-KZoCLdjAD-ou2f", 
$sdkConfig
                                );

$apiContext = new ApiContext($cred, 'Request' . time());
$apiContext->setConfig($sdkConfig);

$card = new CreditCard();
$card->setType($cctype);
$card->setNumber($ccnumber);
$card->setExpiremonth($exm);
$card->setExpireyear($exy);
$card->setFirstname($cchfname);
$card->setLastname($cchlname);
$card->setCvv2($ccv);


$fundingInstrument = new FundingInstrument();
$fundingInstrument->setCreditcard($card);

$payer = new Payer();
$payer->setPaymentmethod("credit_card");
$payer->setFundinginstruments(array($fundingInstrument));

$amount = new Amount();
$amount->setCurrency($crtype);
$amount->setTotal($price);

$transaction = new Transaction();
$transaction->setAmount($amount);
$transaction->setDescription("creating a direct payment with credit card");

$payment = new Payment();
$payment->setIntent("sale");
$payment->setPayer($payer);
$payment->setTransactions(array($transaction));



$return = array();
      
try {
    $result = json_decode($payment->create($apiContext));
    $return["tid"] = $result->id;
    $return["tstatus"] = $result->status;    
    $return["rstatus"] = "ok";
    $return["getway"] = "paypal";
    $this->save_trs($return);        
    return $return;
    
}catch (\PayPal\Exception\PayPalConnectionException $ex) {
    
    $error  = json_decode($ex->getData());
    $return["tid"] = $error->name;
    $return["tstatus"] = $error->message;
    $return["rstatus"] = "error";
    $return["getway"] = "paypal";
    $this->save_trs($return);        
    return $return;
}
        
        
    }
    
    
    
    
    
    
    function braintree($price, $ccnumber, $exm, $exy){
        
        require_once 'braintree/lib/Braintree.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('n6b5jkq6qdb9gzpc');
Braintree_Configuration::publicKey('rzsvrfvs4vhjv4zd');
Braintree_Configuration::privateKey('0abf4e6c1c186aaa521db12ce26ee69b');

        $exp_date = $exm.'/'.$exy;
        
$result = Braintree_Transaction::sale(array(
    'amount' => $price,
    'creditCard' => array(
        'number' => $ccnumber,
        'expirationDate' => $exp_date
    ),
   
));
$return = array();
       
        if ($result->success) {
    
    $return["tid"] = $result->transaction->id;
    $return["tstatus"] = "Amount successfully paid!";
    $return["rstatus"] = "ok";
    $return["getway"] = "braintree";   
    $this->save_trs($return);        
    return $return;            
            
} else if ($result->transaction) {
            
    $return["tid"] = "Error processing transaction";
    $return["tstatus"] = $result->transaction->processorResponseText;
    $return["rstatus"] = "error";
    $return["getway"] = "braintree";
    $this->save_trs($return);        
    return $return;                    
} else {
            
    $return["tid"] = "Validation errors";
    $return["tstatus"] = "Validation errors";
    $return["rstatus"] = "error";
    $return["getway"] = "braintree"; 
    $this->save_trs($return);                
    return $return;                    
}


    }
    
    
    function save_trs($return){
    $t_id = $return["tid"];
    $t_status = $return["tstatus"];
    $r_status = $return["rstatus"];
    $getway = $return["getway"];
        
    mysql_query("insert into hqtab(t_id, t_status, getway) values('$t_id', '$t_status', '$getway')") or die("error in query");
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}