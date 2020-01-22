<html>
    <head>
    <link rel = "stylesheet" href = "../../Public/View/Css/homePage.css" type = "text/css">
    </head>
<body>
<h1>Buyer Page</h1>
<?php

while ($row = pg_fetch_assoc($message)) {
    echo '<table> 
    <form method = "post">
    <tr><td>Productname </td><td> : <input type = "text" name = "productname" readonly value="'.$row['productname'].'"></td></tr>
    <tr><td>Price </td><td> : <input type = "text" name = "price" readonly value="'.$row['price'].'"></td></tr>
    <tr><td>Productcount  </td><td> : <input type = "text" name = "productcount" readonly value="'.$row['productcount'].'"></td></tr>
    <input type  = "hidden" name = "sellerid" readonly value="'.$row['sellerid'].'"></td></tr>
    <form> 
    </table><br>';
  }
?>
 
</body>
</html>



