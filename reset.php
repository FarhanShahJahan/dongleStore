<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <title> Dongle | Reset Password</title>
 <link rel="icon" href="logos.jpg">
<link rel="stylesheet" href=style.css>
</head>
<body>
<header>
      <a href="index.php"><img src="logo.png" style="width: 150px; float:left"></a> 
    <a href="signup.php"><button id="butlogin"> Sign Up</button></a>
</header>
<section>
     <form action="resetphp.php" method="post">
         <center><table>
            <h2>Reset Password</h2>
         <tr>
             <td>New Password:</td>
             <td><input class="tf" type="password" name="newpswd" placeholder="new password"/></td> 
        </tr><tr>
         <td>Re-Enter Password: </td>
         <td> <input class="tf" type="password" name="pswd" placeholder="new password"/></td>
        </tr>
             <td></td>
             <td><input type="submit" type="submit" value="Reset Password" style="color: white; background-color: #46b1b7 ; "/></td>
             
         </table></center>
         




 </form>

    
</section>


</body>