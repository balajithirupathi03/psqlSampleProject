<html>
   <h1>Product Sell Form</h1>
<?php
    echo '<form method = "post"><table> 
    <form method = "post">
    Productname = <input type = "text" name = "productname" required><br>
    Price = <input type = "text" name = "price" required><br>
    Productcount = <input type = "text" name = "productcount" required><br>
    Sellerid =  <input type="hidden" name = "sellerid" required value="'.$_SESSION['userid'].'">
    <input type="submit" name="SellProduct"><br><br><br>
    <form> ';
    ?>
</html>