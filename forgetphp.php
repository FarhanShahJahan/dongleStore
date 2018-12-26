<?php 
session_start();



function alerttt($a){
echo '<script>
alert("',$a,'");
history.go(-1);
    </script>';

}
$ans=filter_input(INPUT_POST, 'ans');
$email= $_SESSION['username'];


if(!empty($ans)){
 $host = "localhost";
 $dbusername="root";
 $dbpswd="root";
 $dbname="dongle";
    
//create connection  
$conn = new mysqli($host, $dbusername, $dbpswd, $dbname);
    
if(mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_errno() .')' . mysqli_connect_error());
}else{
    $sql = "SELECT * from user where email='".$email."'AND SecurityAnswer='".$ans."' limit 1";
   
      
  $result = $conn->query($sql);
    
    if($result->num_rows==1){
      header("Location: reset.php");
        exit();
    }
    else{
       alerttt("Incorrect Answer");
        exit();
    }

  $conn->close();
}
    
    
    
}
    else{
    alerttt("Enter Your Answer ");
    die();
    }


  
        

?>