<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HQ Payment</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/main.js" type="text/javascript"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    
   <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
        
            <div class="account-wall">
                
                <form class="form-signin">
                
                <fieldset class="scheduler-border">
    <legend class="scheduler-border">Order</legend>
                    <input type="text" class="form-control" id="price" placeholder="*Price" >
                    
                    <select class="form-control" id="crtype">
                        <option value="">*Currency type</option>
                    <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="THB">THB</option>
                        <option value="HKD">HKD</option>
                        <option value="SGD">SGD</option>
                        <option value="AUD">AUD</option>
                    </select>
                <input type="text" class="form-control" placeholder="*Full Name" id="full_name">    
                    </fieldset>
                    
                    <fieldset>
    <legend class="scheduler-border">Payment</legend>
<input type="text" class="form-control" placeholder="*Credit card holder first name" id="cchfname">    
<input type="text" class="form-control" placeholder="*Credit card holder Last name" id="cchlname">    
<input type="text" class="form-control" placeholder="*Credit card number" id="ccnumber">    

                        
                        <select class="form-control" id="exm">
                        <option value="">*Expiration month</option>
                        <script>
                            for(i=1; i<=12; i++){
                                document.write("<option value='"+i+"'>"+i+"</option>");
                            }
                            </script>
                        </select>
                        
                        
                        <select class="form-control" id="exy">
                        <option value="">*Expiration year</option>
                        <script>
                            for(i=2014; i<=2030; i++){
                                document.write("<option value='"+i+"'>"+i+"</option>");
                            }
                            </script>
                        </select>
                        
                        
                        
                        <input type="text" class="form-control" id="ccv" placeholder="*CCV">    
        
                    </fieldset>
                  <span id="msg"></span>  
                <button onclick="buynow()" class="btn btn-lg btn-primary btn-block" type="button">
                    Transaction
                    </button>
                    
                </form>
                <center><a href="viewtrs.php" style="text-align:center;">View Transactions</a></center>
            </div>
            
        </div>
    </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>
