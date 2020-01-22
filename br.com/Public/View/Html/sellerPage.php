<html>
    <head>
    <link rel = "stylesheet" href = "../../Public/View/Css/homePage.css" type = "text/css">
    </head>
<body>
<h1>Seller Page</h1>
<a href="index.php/User/addProduct/">Sell a New Product</a><br><br>
<?php

while ($row = pg_fetch_assoc($message)) {
    echo '
    <form method = "post">
    <table> 
    <tr><td>Productid </td><td> : <input type = "text" name = "productid" readonly value="'.$row['productid'].'"></td></tr>
    <tr><td>Productname </td><td> : <input type = "text" name = "productname" readonly value="'.$row['productname'].'"></td></tr>
    <tr><td>Price </td><td> : <input type = "text" name = "price" readonly value="'.$row['price'].'"></td></tr>
    <tr><td>Productcount </td><td> : <input type = "text" name = "productcount" readonly value="'.$row['productcount'].'"><br>
    <input type = "hidden" name = "sellerid" readonly value="'.$row['sellerid'].'">
    </table>
    </form> 
    <br>';
  }
?>
 
</body>
</html>


