<?php 
session_start();



function alerttt($a){
echo '<script>
alert("',$a,'");
history.go(-1);
    </script>';

}
function alertt($a){
echo '<script>
alert("',$a,'");
    </script>';

}
$pswd=filter_input(INPUT_POST, 'newpswd');
$cpswd=filter_input(INPUT_POST, 'pswd');
$email= $_SESSION['username'];

if($pswd==$cpswd){
if(!empty($pswd)){
if(!empty($cpswd)){
 $host = "localhost";
 $dbusername="root";
 $dbpswd="root";
 $dbname="dongle";
    
//create connection  
$conn = new mysqli($host, $dbusername, $dbpswd, $dbname);
    
if(mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_errno() .')' . mysqli_connect_error());
}else{
    $sql = "UPDATE user SET password='".$pswd."' WHERE email='".$email."' ";
   
      
  $result = $conn->query($sql);
    alertt("The Password Succesfully Changed");
   
    header("Location: login.php");
        exit();
  
  $conn->close();
}
    
    
    
}
    else{
    alerttt("Enter New Password ");
    die();
    }
}
    else{
    alerttt("Enter New Password ");
    die();
    }
}else{
 alerttt("The password is not match");
    die();
}

  
        

?>