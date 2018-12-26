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
                <li><a href="cart.php" >Shopping Cart</a></li>

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
                    <li><a href="#">Total Items:
                            <?php  totalitem(); ?></a></li>
                    <li><a href="#"> </a></li>
                    <li><a href="#"> Total Price: RM <?php  getPrice(); ?> </a></li>
                    <li><a href="#"> </a></li>

                </ul>
   <div id="sidetitle">To Ship</div>
        <ul id="cats">
            <li><a href="#"> Total Items:   <?php  totalitemShip(); ?> </a></li>
            
        </ul>
            </div>
            <div id="content">
                <?php  cart(); ?>
                <div id="pro_box">
                    <?php  
    
    if(isset($_GET['search'])){
        
    $search_query =$_GET['user_query'];
        $get_pro = "select * from product where p_keyword like'%$search_query%' ";
    $run_pro = mysqli_query($con, $get_pro);
    
    while($row_pro= mysqli_fetch_array($run_pro)){
        $p_id = $row_pro['p_id'];
        $p_cat = $row_pro['p_cat'];
        $p_ty = $row_pro['p_brand'];
        $p_title = $row_pro['p_title'];
        $p_price = $row_pro['p_price'];
        $p_desc = $row_pro['p_desc'];
        $p_img = $row_pro['p_image'];
        $p_key = $row_pro['p_keyword'];
        
        echo "
        <div id='singlepro'>
        <h4> $p_title </h4>
        <img src ='img/$p_img' width ='180' height='180'/>
        <h5> RM $p_price.00 </h5>
              <a id=a href='details.php?pro_id=$p_id' style='float:left;text-decoration:none'>Details</a>
          <a href='index.php?addCart=$p_id'><button id=button style='float=right';>Add to Cart</button></a>
        </div>
        
        
        ";
        
    }} ?>
                </div>

            </div>

        </div>
    </section>


</body>
