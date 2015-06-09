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
    <?php
    require_once "config.php";
    ?>
</head>
<body>
  
   <div class="container">
       
    <table class="table table-striped">
 
        <thead>
            <tr ><td colspan=4><a href="index.php" style="text-align:center;"><h3>Make New Transaction</h3></a></td></tr>   
        <tr>
      
      <th>
      Pyament Getway
      </th>
      <th>
      Transaction ID
      </th>
      
      <th>
      Transaction Status
      </th>
      
      
      <th>
      Timestamp
      </th>
      
      
</tr>
      </thead>
        
        <tbody>
            <?php
            $query = mysql_query("select * from hqtab");
                while($row=mysql_fetch_assoc($query)){
                $t_id = $row["t_id"];
                $t_status = $row["t_status"];
                $getway = $row["getway"];
                $timestamp = $row["timestamp"];
            ?>
        <tr>
            <td><?php echo $getway ?></td>
            <td><?php echo $t_id ?></td>
            <td><?php echo $t_status ?></td>
            <td><?php echo $timestamp ?></td>
            </tr>    
            <?php    
            }
            ?>
            
        
        </tbody>
        
</table>
      
       </div>        

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>
