<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
 <title> Dongle | Confirm Email </title>
 <link rel="icon" href="logos.jpg">
<link rel="stylesheet" href=style.css>
</head>
<body>
<header>
      <a href="index.php"><img src="logo.png" style="width: 150px; float:left"></a> 
    <a href="login.php"><button id="butlogin">Login</button></a>
</header>
<section>
     <form action="resetemailphp.php" method="post">
         <center><table>
            <h2>Enter Email</h2>

         <td>Email : </td>
         <td> <input class="tf" type="text" name="email" placeholder="tom@email.com"/></td>
         </table>
          <input id="button" type="submit" value="Submit" />
         </center>





 </form>

    
</section>


</body>