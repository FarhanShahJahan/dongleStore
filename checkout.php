<?php
 session_start();
include ("fx.php");
 //error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <title> Dongle | Checkout</title>
    <link rel="icon" href="logos.jpg">
    <link rel="stylesheet" href=style.css>

</head>

<body id="body">
    <header>
        <a href="index.php"><img src="logo.png" style="width: 150px; float:left"></a>
        <?php  getLog(); ?>
        <div>
            <form method="get" action="result.php" enctype="multipart/form-data">
                <input class="tf" type="text" name="user_query" placeholder="Search Donggle" />
                <input id="button" type="submit" name="search" value="Search">
            </form>

        </div>

        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="cart.php">Shopping Cart </a></li>

            </ul>
        </div>


    </header>

    <section>
        <div class="mainWrap">
            <div id="sidebar">
                <div id="sidetitle">Categories</div>
                <ul id="cats">
                    <?php getCat(); ?>

                </ul>
                <div id="sidetitle"><a href="cart.php" style="color:black; text-decoration:none">Shopping Cart <img src="img/shopping-cart.png"></a></div>
                <ul id="cats">
                    <li><a href="#"> Total Items:
                            <?php  totalitem(); ?> </a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"> Total Price: RM
                            <?php  getPrice(); ?> </a></li>
                    <li><a href="#"> </a></li>

                </ul>
                   <div id="sidetitle">To Ship</div>
        <ul id="cats">
            <li><a href="#"> Total Items:   <?php  totalitemShip(); ?> </a></li>
            
        </ul>
            </div>
            <?php 
        global $con;
        $sAdd="";
        $bAdd="";
         $email=$_SESSION['username'];
         $get_add = "select * from Address where useremail='$email'";
   $run_add = mysqli_query($con, $get_add);
      $result = $con->query($get_add);
    
    if($result->num_rows==1){
    while($row_add = mysqli_fetch_array($run_add)){
        $sAdd =$row_add['shipAdd'];
        $bAdd =$row_add['billAdd'];
    }
    }
        ?>

            <div id="content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div id="pro_box">
                        <h3>Insert Your Shipping and Billing Address</h3>
                        <center>
                            <table>
                                <tr>
                                    <td> Shipping Address:</td>
                                    <td><input size="40" type="text" name="ship" value="<?php echo $sAdd?>"></td>
                                </tr>
                                <tr>
                                    <td> Billing Address:</td>
                                    <td><input size="40" type="text" name="bill" value="<?php echo $bAdd?>"></td>
                                </tr>
                                <tr align="right">
                                    <td colspan="3"><input type="submit" value="Confirm Purchase" name="addAdd"></td>
                                </tr>
                            </table>
                        </center>

                    </div>
                </form>
                <?php
global $sAdd;
 $host = "localhost";
 $dbusername="root";
 $dbpswd="root";
 $dbname="dongle";
 $email=$_SESSION['username'];
//create connection  
$conn = new mysqli($host, $dbusername, $dbpswd, $dbname);
function alerttt($a){
echo '<script>
alert("',$a,'");
history.go(-1);
    </script>';
}
          if(!empty($sAdd)){         
                   
        if(isset($_POST['addAdd'])){
        $shipAdd=filter_input(INPUT_POST, 'ship');
        $billAdd=filter_input(INPUT_POST, 'bill');
        
        if(!empty($shipAdd)){
            if(!empty($billAdd)){
                $sql = "INSERT INTO Address(useremail,shipAdd,billAdd) values('$email','$shipAdd','$billAdd')";
      if ($conn->query($sql)){
  
  }   else{
             alerttt("SQL");}
                
                
            }else{
             alerttt("Insert Billing Address");
        exit();}
        }else{
    alerttt("Insert Shipping Address");
        exit();}
        }
                 //Addressssssssssssss ALT DEL
          }else{
        $delAdd = "DELETE FROM Address where useremail='$email'";
        if ($conn->query($delAdd)){
  } else{
             alerttt("SQLDEL");}     
                                 
        if(isset($_POST['addAdd'])){
        $shipAdd=filter_input(INPUT_POST, 'ship');
        $billAdd=filter_input(INPUT_POST, 'bill');
        
        if(!empty($shipAdd)){
            if(!empty($billAdd)){
                $sql = "INSERT INTO Address(useremail,shipAdd,billAdd) values('$email','$shipAdd','$billAdd')";
      if ($conn->query($sql)){
  
  }   else{
             alerttt("SQL");}
                
                
            }else{
             alerttt("Insert Billing Address");
        exit();}
        }else{
    alerttt("Insert Shipping Address");
        exit();}
       
          }}
              
              //Addressssssssssssssssssssssssssssssssssssss Endddddddddddd
              
            if(isset($_POST['addAdd'])){
        $email=$_SESSION['username'];
        $ssql = "INSERT INTO ship(p_id,useremail,qty) SELECT p_id, useremail,qty FROM cart where useremail= '$email'";
               if ($conn->query($ssql)){
                   
                  $sssql = "DELETE FROM cart where useremail='$email'";
               if ($conn->query($sssql)){
                   
 header("Location: payment.php");
  }   else{
             alerttt("SQL3");}  
                   

  }   else{
             alerttt("SQL2");}
                   

            }
        ?>
            </div>

        </div>
    </section>


</body>

</html>
