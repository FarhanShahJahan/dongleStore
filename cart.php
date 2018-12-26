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
            <div id="content">
                <?php  cart(); ?>
                <div id="pro_box">
                    <form action="" method="post" enctype="multipart/form-data">
                        <center>
                            <table id="tablecart" border="1px">
                                <tr align="center">
                                    <td colspan="5">
                                        <h2>Shopping Cart</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Remove</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                                <?php 
                        $total = 0;
                        global $con;
       
                            if(!empty($_SESSION['username'])){
                            $email=$_SESSION['username'];
                            $sel_price ="select distinct * from cart where useremail='$email'";

                            $run_price = mysqli_query($con, $sel_price);

                                while($p_price= mysqli_fetch_array($run_price)){
                                    $pro_id =$p_price['p_id'];

                                    $pro_price ="select * from product where p_id ='$pro_id' ";
                                    $run_pro_price = mysqli_query($con, $pro_price);

                                    while($pp_price= mysqli_fetch_array($run_pro_price)){
                                                                        
                                        $p_title=$pp_price['p_title'];
                                        $p_img=$pp_price['p_image'];
                                        $single_price=$pp_price['p_price'];

                                   
                            $get_qty ="select * from cart where useremail='$email' AND p_id='$pro_id'";
        
                            $run_qty = mysqli_query($con, $get_qty);
                            $count_qty = mysqli_num_rows($run_qty);
                                    $single_price = $single_price * $count_qty;
                                      $total += $single_price;  
                                                    ?>

                                <tr align="center">
                                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
                                    <td>
                                        <h4>
                                            <?php echo $p_title ?>
                                        </h4> <br>
                                        <img src="img/<?php echo $p_img?>" width="60px" height="60px">
                                    </td>
                                    <td>
                                        <?php echo $count_qty ?>
                                    </td>
                                    <td>RM
                                        <?php echo $single_price ?>
                                    </td>
                                </tr>

                                <?php }} ?>
                                <tr align="right">
                                    <td colspan="3"> Sub Total:</td>
                                    <td align="center">RM
                                        <?php echo $total ?>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td><input type="submit" name="update_cart" value="Remove Item"></td>
                                    <td colspan="2"><input type="submit" name="continue" value="Continue Shopping"></td>
                                    <td><a href="checkout.php"><input type="button" value="Checkout"></a></td>
                                </tr>
                                <?php }?>
                            </table>
                        </center>
                    </form>
                    <?php
                    global $con;
                    $email= $_SESSION['username'];
                    
                    if(isset($_POST['update_cart'])){
                        foreach($_POST['remove']as $remove_id){
                            $delete_pro = "delete from cart where p_id='$remove_id' AND useremail='$email' ";
                            
                            $run_delete = mysqli_query($con,$delete_pro);
                            if($run_delete){
                                echo"<script>window.open('cart.php','_self')</script>";
                            }
                            
                        }
                        
                    }
                    if(isset($_POST['continue'])){
                         echo"<script>window.open('index.php','_self')</script>";
                        
                    }
                    
                    ?>                                        
                </div>

            </div>

        </div>
    </section>


</body>
