<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
 <title> Dongle | Login</title>
 <link rel="icon" href="logos.jpg">
<link rel="stylesheet" href=style.css>
</head>
<body>
<header>
      <a href="index.php"><img src="logo.png" style="width: 150px; float:left"></a> 
    <a href="signup.php"><button id="butlogin">Sign Up</button></a>
</header>
<section>
     <form action="loginphp.php" method="post">
         <center><table>
            <h2>Login</h2>
         <tr>
             <td>Email:</td>
             <td><input class="tf" type="text" name="email" placeholder="tom@email.com"/></td> 
        </tr><tr>
         <td>Password: </td>
         <td> <input class="tf" type="password" name="pswd" placeholder="password"/></td>
        </tr><tr>
          <div>
            <td></td>
            <td> <a href="resetemail.php" id="a">
            <u>Forget password</u></a></div>
             
             
             
        </tr> 
             <td></td>
             <td><input id="button" type="submit" type="submit" value="LOGIN"/></td>
             
         </table></center>
         




 </form>

    
</section>



</body>