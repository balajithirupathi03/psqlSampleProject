<html>
   <h1>Product Sell Form</h1>
<?php
    echo '<form method = "post">
    <table> 
    <tr><td>Product Name </td><td> <input type = "text" name = "productname" required></td></tr>
    <tr><td>Price </td><td> <input type = "text" name = "price" required></td></tr>
    <tr><td>Productcount </td><td> <input type = "text" name = "productcount" required></td></tr>
    <input type="hidden" name = "sellerid" required value="'.$_SESSION['userid'].'">
    <tr><td><input type="submit" name="SellProduct"></td><td></td></tr>
    </table>
    <form> ';
    ?>
</html>