<?php

require_once "getway.class.php";


                $getways= $_POST["getway"];
                $price= $_POST["price"];
                $crtype= $_POST["crtype"];
                $full_name= $_POST["full_name"];
                $cchfname= $_POST["cchfname"];
                $cchlname= $_POST["cchlname"];
                $ccnumber= $_POST["ccnumber"];
                $exy=$_POST["exy"];
                $exm=$_POST["exm"];
                $ccv=$_POST["ccv"];
                $cctype=$_POST["cctype"];


$getway_class = new getway_class();

if($getways=="paypal"){
    
$result = $getway_class->paypal($price, $crtype, $cchfname, $cchlname, $ccnumber, $cctype, $exy, $exm, $ccv);
    
    if($result["rstatus"]=="ok"){
        print_r($result["tstatus"]);
    }elseif($result["rstatus"]=="error"){
        print_r($result["tstatus"]);
    }
    
    
}else if($getways=="braintree"){
    
    $result = $getway_class->braintree($price, $ccnumber, $exm, $exy);
 
    if($result["rstatus"]=="ok"){
        
        print_r($result["tstatus"]);
        
    }elseif($result["rstatus"]=="error"){
        print_r($result["tstatus"]);
    }
    
    
}

?>