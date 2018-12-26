<?php


$con = mysqli_connect("localhost","root","root","dongle");

function totalitemShip(){
    global $con;
     $count_item=0;
    if(isset($_GET['addCart'])){
    if(!empty($_SESSION['username'])){
    $email=$_SESSION['username'];
    $get_item ="select * from ship where useremail='$email'";
        
    $run_item = mysqli_query($con, $get_item);
    $count_item = mysqli_num_rows($run_item);
        
        
    }
    }
    else{
    if(!empty($_SESSION['username'])){
    $email=$_SESSION['username'];
    $get_item ="select * from ship where useremail='$email'";
        
    $run_item = mysqli_query($con, $get_item);
    $count_item = mysqli_num_rows($run_item);
        
        
    }  
        }
    
    echo $count_item;
}


function getPrice(){
$total = 0;
global $con;
     if(isset($_GET['addCart'])){
    if(!empty($_SESSION['username'])){
    $email=$_SESSION['username'];
    $sel_price ="select * from cart where useremail='$email'";
        
    $run_price = mysqli_query($con, $sel_price);
   
        while($p_price= mysqli_fetch_array($run_price)){
            $pro_id =$p_price['p_id'];
            
            $pro_price ="select * from product where p_id ='$pro_id' ";
            $run_pro_price = mysqli_query($con, $pro_price);
            
            while($pp_price= mysqli_fetch_array($run_pro_price)){
                
                 $pro_price =array($pp_price['p_price']);
                
                $values= array_sum($pro_price); 
                
                $total += $values;
            }
            
        }
        
       
    }
         echo $total;
    }else{
             if(!empty($_SESSION['username'])){
    $email=$_SESSION['username'];
    $sel_price ="select * from cart where useremail='$email'";
        
    $run_price = mysqli_query($con, $sel_price);
   
        while($p_price= mysqli_fetch_array($run_price)){
            $pro_id =$p_price['p_id'];
            
            $pro_price ="select * from product where p_id ='$pro_id' ";
            $run_pro_price = mysqli_query($con, $pro_price);
            
            while($pp_price= mysqli_fetch_array($run_pro_price)){
                
                 $pro_price =array($pp_price['p_price']);
                
                $values= array_sum($pro_price); 
                
                $total += $values;
            }
            
        }
        
       
    }
       echo $total;  
         
         
     }
 
  
    
    
     
}

function totalitem(){
    global $con;
     $count_item=0;
    if(isset($_GET['addCart'])){
    if(!empty($_SESSION['username'])){
    $email=$_SESSION['username'];
    $get_item ="select * from cart where useremail='$email'";
        
    $run_item = mysqli_query($con, $get_item);
    $count_item = mysqli_num_rows($run_item);
        
        
    }
    }
    else{
    if(!empty($_SESSION['username'])){
    $email=$_SESSION['username'];
    $get_item ="select * from cart where useremail='$email'";
        
    $run_item = mysqli_query($con, $get_item);
    $count_item = mysqli_num_rows($run_item);
        
        
    }  
        }
    
    echo $count_item;
}

function cart(){
global $con;

    if(isset($_GET['addCart'])){
       if(!empty($_SESSION['username'])){
            $email=$_SESSION['username'];
           $pro_id =$_GET['addCart'];
           
           $insert_cart ="insert into cart (p_id,useremail,qty) values ('$pro_id','$email',1)";
           
           $run_pro = mysqli_query($con, $insert_cart);
           
           echo"<script>
           alert('One item added to cart');
         
           location.href= (history.go(-1));
            </script>";
           
           
           
           
       }
        else{
            echo"<script>
            alert('You Need To Log-In First');
location.href= 'login.php';
         </script>";
        exit();
        }
    }
}


function getLog(){
global $con;
    $email=$_SESSION['username'];
    if(!empty($email)){
     $getName="select * from user where email='$email'";
     $runName = mysqli_query($con,$getName);
    while($rowName= mysqli_fetch_array($runName)){
        $name = $rowName['firstname'];
        echo"
        <table align='right'><tr><td>
        <h3 style='float: right;
margin-right: 40px'>Welcome $name</h3>
</td><td><a href='logout.php'><button id='butlogin'>Log Out</button></a></td></tr></table>";
        
}}else{

          echo"  <a href='login.php'><button id='butlogin'>Sign In</button></a>";
}
}


//cate
function getCat(){
    global $con;
    
    $get_cats = "select * from categories";
    $run_cats = mysqli_query($con, $get_cats);
    while($row_cats = mysqli_fetch_array($run_cats)){
        $cat_id =$row_cats['c_id'];
        $cat_title =$row_cats['c_title'];
        
        echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
        
    }
    
}

function getPro(){
    
    if(!isset($_GET['cat'])){
    global $con;
    
    $get_pro = "select * from product order by RAND() LIMIT 0,6";
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
        
    }
    
}

}
function getProCat(){
    
    if(isset($_GET['cat'])){
        
        $cat_id =$_GET['cat'];
    global $con;
    
    $get_cat_pro = "select * from product where p_cat='$cat_id'";
    $run_cat_pro = mysqli_query($con, $get_cat_pro);
    
    while($row_cat_pro= mysqli_fetch_array($run_cat_pro)){
        $p_id = $row_cat_pro['p_id'];
        $p_cat = $row_cat_pro['p_cat'];
        $p_ty = $row_cat_pro['p_brand'];
        $p_title = $row_cat_pro['p_title'];
        $p_price = $row_cat_pro['p_price'];
        $p_desc = $row_cat_pro['p_desc'];
        $p_img = $row_cat_pro['p_image'];
        $p_key = $row_cat_pro['p_keyword'];
        
        echo "
        <div id='singlepro'>
        <h4> $p_title </h4>
        <img src ='img/$p_img' width ='180' height='180'/>
        <h5> RM $p_price.00 </h5>
              <a id=a href='details.php?pro_id=$p_id' style='float:left;text-decoration:none'>Details</a>
          <a href='index.php?addCart=$p_id'><button id=button style='float=right';>Add to Cart</button></a>
        </div>
        
        
        ";
        
    }
    
}

}


?>
