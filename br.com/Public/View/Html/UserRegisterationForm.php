<html>
<head>
<link rel = "stylesheet" href = "../../Public/View/Css/UserRegisterationForm.css" type = "text/css">
<script src = "../Public/View/JavaScript/UserRegisterationForm.js"></script>
</head>
<h1>User Registration Form</h1>
<body>
    <form method = "post">
        <input type = "text" name = "name" pattern = "^[A-Za-z]*\s*[A-Za-z]*$" placeholder = "Enter your Name" required><br>
        <input type="radio" name="gender" value="m" checked> Male<br>
        <input type="radio" name="gender" value="f"> Female<br>
        <input type="radio" name="gender" value="other"> Other  <br>
        <input type = "email" name = "mailid" placeholder = "Enter your Mail" required> <br>
        <input type = "text" name = "contactnumber" pattern = "[6-9][0-9]{9}"  placeholder = "+91" required><br>
        <input type="radio" name="AccountType" value="b" checked> Buyer
        <input type="radio" name="AccountType" value="s"> Seller <br> Country<br>
        <input type="radio" name="country" value="india"> India <br>
        <input type="radio" name="country" value="usa"> USA <br>
        <input type="radio" name="country" value="japan"> Japan <br>
        <input type="radio" name="country" value="uk"> UK <br>
        <input type="radio" name="country" value="malaysia"> Malaysia <br> 
        Password <input type = "password" name = "passsword" required ><br>
        <input type='submit' name='CreateAccount'><br>
    <form>
</body>
</html>
