<?php
session_start();
include ("fx.php");
error_reporting(0);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dongle | About Page</title>
        <link rel="icon" href="logos.jpg">
        <link rel="stylesheet" href=style.css>
    </head>
    <body>
        <header>
            <a href="index.php"><img src="logo.png" style="width: 150px; float:left"></a>
            <?php getLog(); ?>
            <div>
                <form method="get" action="result.php" enctype="multipart/form-data">
                    <input class="tf" type="text" name="user_query" placeholder="Search Donggle"/>
                    <input id="button" type="submit" name="search" value="Search">
                </form>  

            </div>

            <div class="menubar">
                <ul id="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cart.php">Shopping Cart </a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
            </div>
        </header>
        <section>
            <center>
                <table align="center" style="width: 50%">
                    <tr>
                        <td>
                            <img src="logos.jpg" style="width: 200px"><br>
                            <img src="logo.png" style="width: 200px">
                        </td>
                        <td align='center'>
                            <div id="media">
                                <h3>Our Media</h3><br>
                                <a href="https://www.facebook.com/" target="_blank"> <img src="img/facebook.png" style="width: 50px"></a>
                                <a href="https://twitter.com/hilmiazhad" target="_blank"><img src="img/twitter.png" style="width: 50px"></a>
                                <a href="https://www.instagram.com/azhaddhilmi/" target="_blank"> <img src="img/instagram.png" style="width: 50px"></a>
                                <a href="mailto: abdsyakur999@gmail.com"><img src="img/arroba.png" style="width: 50px"></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align='center' colspan="2"> 
                            <h3>Our Location</h3> <br> Blok Murni, UPM, Serdang <br>43400 Selangor<br><br>
                        </td>

  <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1969.3021985302369!2d101.71060598487064!3d2.9949466478974434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x24e9df4c2f47a826!2sBlok+Murni%2C+Kolej+Canselor!5e0!3m2!1sen!2smy!4v1544520102785" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></iframe>
    
    <iframe width="400" height="300" src="https://www.youtube.com/embed/skU8IvDqz94" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1969.3021985302369!2d101.71060598487064!3d2.9949466478974434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x24e9df4c2f47a826!2sBlok+Murni%2C+Kolej+Canselor!5e0!3m2!1sen!2smy!4v1544520102785" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></iframe>
                        </td>
                        <td>  
                            <iframe width="400" height="300" src="https://www.youtube.com/embed/skU8IvDqz94" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </td>
                    </tr>
                </table></center>
        </center>
    </section>
</body>
</html>
