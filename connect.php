<?php
function alerttt($a){
echo '<script>
alert("Enter ',$a,'");
history.go(-1);
    </script>';

}


$fname=filter_input(INPUT_POST,'fname');
$lname=filter_input(INPUT_POST,'lname');
$email=filter_input(INPUT_POST,'email');
$pswd=filter_input(INPUT_POST,'pswd');
$q=$_POST['quest'];
$quest=(int)$q;
$ans=filter_input(INPUT_POST,'sq');
if(!empty($fname)){
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
    $sql = "INSERT INTO user(firstname, lastname,email,password,securityQuestion, SecurityAnswer,shipAdd, billAdd) values('$fname','$lname','$email','$pswd','$quest','$ans',' ',' ')";
      if ($conn->query($sql)){
    header("Location: login.php");
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
  $conn->close();
}
    
    
    
}
    else{
   alerttt("Password");
    die();
    }
   }else{
   alerttt("Email");
    die();
    }}
    else{
        alerttt("Name");
    die();
}
 

?>