<? php

$con = mysqli_connect("localhost","root","root","dongle");

funtion getpro(){
    global $con;
    
    $get_pro= "select * from item order by RAND() LIMIT 0,6 ";
    
    $run_pro= mysqli_query($con,$get_pro);
    
    while($row_pro=mysqli_fetch_array($run_pro)){
        $pro_id= $row_pro('ID');
        $pro_name= $row_pro('NAME');
        $pro_price= $row_pro('PRICE');
        $pro_cat= $row_pro('CATEGORY');
        $pro_color= $row_pro('COLOUR');
        $pro_quant= $row_pro('QUANTITY');
        $pro_desc= $row_pro('DESC');
        $pro_img= echo '<img src="data:image/jpeg;base64,'.base64_encode( $row_pro['IMAGE'] ).'"/>';
        
        echo "
        <div id='singlepro'>
         <h3>$pro_name</h3>
        
        </div>
        ";
    }
    
}
    
    
?>