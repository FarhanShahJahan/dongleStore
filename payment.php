<?php
 session_start();
include ("fx.php");
 error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <title> Dongle | Home Page</title>
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
                <div id="sidetitle"><a href="?link=1" name="link1" style="color:black; text-decoration:none">Shopping Cart <img src="img/shopping-cart.png"></a></div>
                <?php 
         $email=$_SESSION['username'];
        $link=$_GET['link'];
        if($link=='1'){
                if(!empty($email)){
        echo"<script>window.open('cart.php','_self')</script>";
        }
        else{
            echo"<script>
            alert('You Need To Log-In First');
location.href= 'login.php';
         </script>";
        exit();
            
        }
        
        }
        ?>
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
            <div id="content">

                <div id="pro_box">
                    <h2>Your Item will be Shipped Soon!</h2>

                </div>

            </div>
            <?php 
        global $con;
         $email=$_SESSION['username'];
        $sql = "INSERT INTO ship(p_id,useremail,qty) SELECT p_id, useremail,qty FROM cart where useremail= '$email";
   
      
  $result = $con->query($sql);
    
    if($result->num_rows==1){
        
        
    }
        ?>
        </div>
    </section>


</body>
