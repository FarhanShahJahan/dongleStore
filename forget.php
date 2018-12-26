<?php
session_start();

$email=$_SESSION['username'];
 $host = "localhost";
 $dbusername="root";
 $dbpswd="root";
 $dbname="dongle";
$conn = new mysqli($host, $dbusername, $dbpswd, $dbname);
if(mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_errno() .')' . mysqli_connect_error());
}else{
    $sql = "SELECT * from user where email='".$email."' limit 1";
   
      
  $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     $sq= $row["securityQuestion"];
    }
} else {
    echo "0 results";
}

$conn->close();
    
}
?>
<!DOCTYPE html>
<html>
<head>

 <title> Dongle | Forget Password</title>
 <link rel="icon" href="logos.jpg">
<link rel="stylesheet" href=style.css>
</head>
<body>
<header>
      <a href="index.php"><img src="logo.png" style="width: 150px; float:left"></a> 
    <a href="login.php" ><button id="butlogin">Login</button></a>
</header>
<section>
     <form action="forgetphp.php" method="post">
         <center><table>
            <h2>Forget Password</h2>
         <tr>
             <td>Sequrity Question:</td>
             <td><h3 id="seq">Question</h3>
<script>
    
var q="";
if ('<?php echo $sq ?>'==1 ){
    q ="Name of your Hometown";
    
}else if('<?php echo $sq ?>'==2 ){
         q= "Your Mother's Last Name";
         }
else if('<?php echo $sq ?>'==3 ){
         q= "Your Favorite TV show";
         }
else if('<?php echo $sq ?>'==4 ){
         q= "Your pet's name";
         }
else{
    alert("You are not authorized");
history.go(-1);
}
   
    document.getElementById("seq").innerHTML = q; </script>
             </td> 
        </tr>
         <td>Answer: </td>
         <td> <input class="tf" type="answer" name="ans" placeholder="answer"/></td>
         </table>
          <input type="submit" type="submit" value="Submit" style="color: white; background-color: #46b1b7"/>
         </center>





 </form>

    
</section>


</body>