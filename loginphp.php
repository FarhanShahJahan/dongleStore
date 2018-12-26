<?php

session_start();


function alerttt($a){
echo '<script>
alert("',$a,'");
history.go(-1);
    </script>';

}
$email=filter_input(INPUT_POST, 'email');
$_SESSION['username']=$email;
$pswd=filter_input(INPUT_POST,'pswd');

if(!empty($email)){
if(!empty($pswd)){
 $host = "localhost";
 $dbusername="root";
 $dbpswd="root";
 $dbname="dongle";
    
//create connection  
$conn = new mysqli($host, $dbusername, $dbpswd, $dbname);
    
if(mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_errno() .')' . mysqli_connect_error());
}else{
    $sql = "SELECT * from user where email='".$email."'AND password='".$pswd."' limit 1";
   
      
  $result = $conn->query($sql);
    
    if($result->num_rows==1){
       global $conn;
    
    $get_name = "select * from user where email='$email'";
    $run_name = mysqli_query($conn, $get_name);
    while($row_name = mysqli_fetch_array($run_name)){
        $name =$row_name['firstname'];

        
    }
      header("Location: index.php?user_name=$name");
        exit(); 
    }
    else{
       alerttt("Incorrect Password or Email");
        exit();
    }

  $conn->close();
}
    
    
    
}
    else{
    alerttt("Enter Password");
    die();
    }
   }else{
    alerttt("Enter Email");
    die();
    }


        

?>