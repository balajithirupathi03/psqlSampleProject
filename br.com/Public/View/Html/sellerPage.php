<html>
    <head>
    <link rel = "stylesheet" href = "../../Public/View/Css/homePage.css" type = "text/css">
    </head>
<body>
<h1>Seller Page</h1>
<a href="index.php/User/addProduct/">Sell a New Product</a><br><br>
<?php

while ($row = pg_fetch_assoc($message)) {
    echo '<form><table> 
    <form method = "post">
    Productid = <input type = "text" name = "productid" readonly value="'.$row['productid'].'"><br>
    Productname = <input type = "text" name = "productname" readonly value="'.$row['productname'].'"><br>
    Price = <input type = "text" name = "price" readonly value="'.$row['price'].'"><br>
    Productcount = <input type = "text" name = "productcount" readonly value="'.$row['productcount'].'"><br>
    Sellerid =  <input type = "text" name = "sellerid" readonly value="'.$row['sellerid'].'"><br><br><br>
    <form> 
    </table> </from>';
  }
?>
 
</body>
</html>


