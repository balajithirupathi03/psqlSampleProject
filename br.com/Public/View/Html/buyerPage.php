<html>
    <head>
    <link rel = "stylesheet" href = "../../Public/View/Css/homePage.css" type = "text/css">
    </head>
<body>
<h1>Buyer Page</h1>
<?php

while ($row = pg_fetch_assoc($message)) {
    echo '<form><table> 
    <form method = "post">
    Productname  = <input type = "text" name = "productname" readonly value="'.$row['productname'].'"><br>
    Price        = <input type = "text" name = "price" readonly value="'.$row['price'].'"><br>
    Productcount = <input type = "text" name = "productcount" readonly value="'.$row['productcount'].'"><br>
    <input type  = "hidden" name = "sellerid" readonly value="'.$row['sellerid'].'"><br><br><br>
    <form> 
    ';

    // foreach($row as $key => $value) {
        //echo'<tr> <td>'.$key.'</th> <td>'.$value.'</th> </tr>';
    // }
    echo '</table> </from>';
  }
?>
 
</body>
</html>



