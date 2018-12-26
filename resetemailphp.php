<?php
session_start();
$email=filter_input(INPUT_POST, 'email');

$_SESSION['username']=$email;

if(!empty($email)){
 $host = "localhost";
 $dbusername="root";
 $dbpswd="root";
 $dbname="dongle";
    
//create connection  
$conn = new mysqli($host, $dbusername, $dbpswd, $dbname);
    
if(mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_errno() .')' . mysqli_connect_error());
}else{
    $sql = "SELECT * from user where email='".$email."' limit 1";
   
      
  $result = $conn->query($sql);
    
    if($result->num_rows==1){
      header("Location: forget.php");
        exit();
    }
    else{
       alerttt("Incorrect Email ");
        exit();
    }

  $conn->close();
}
    
    
    
}







?>