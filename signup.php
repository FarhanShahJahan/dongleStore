<?php
session_start();
?>
<html>
<head>
    <title> Dongle | Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logos.jpg">
</head>    
<body id="signupbody">
<script src="script.js"></script>
<header>
<div class="column">
    <div class="row">
   <a href="index.php"><img src="logo.png" style="width: 150px; float:left"></a> 
    <a href="login.php"><button id="butlogin">Login</button></a>
    </div>
    
    </div>
</header>
<section>
<form method="post" action="connect.php">
<center><table id="tablesign">
    <h2>Registration</h2>
    <tr>
    <td> First Name: </td>
    <td><input type=text name="fname" class="tf"></td>
    </tr>
    <tr>
    <td>Last Name: </td>
    <td><input class="tf" type="text" name="lname"></td>
    </tr>
    <tr>
    <td>Email: </td>
    <td><input class="tf" type=text name="email"></td>
    </tr>
    <tr>
    <td>Password: </td>
    <td><input class="tf" type="password" name="pswd"></td>
    </tr><tr>
    <td>Sequrity Question: </td>
    <td><select name="quest">
    <option value="1" selected>Name of your Hometown</option>
    <option value="2">Your Mother's Last Name</option>
    <option value="3" >Your Favorite TV show</option>
    <option value="4">Your pet's name</option>
        </select></td></tr>
    <td>Answer: </td>
    <td><input class="tf" type="answer" name="sq"></td>
    </table>
    
    
<br>
    <input id="button" type="submit" value="Sign Up" ></center>
</form>
</section>

</body>
</html>