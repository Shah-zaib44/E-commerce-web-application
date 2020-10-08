<?php
class computer implements products{
    
    public function show(){
       require_once('include/db.php');
 
  
       $get_products="select * from products where product_category='Computer'";
       
       $run_products=sqlsrv_query($conn,$get_products);
       $i=1;
       while($row_products=sqlsrv_fetch_array($run_products)){
         
        $product_id = $row_products['product_id'];
        $product_category = $row_products['product_category'];
        $product_title = $row_products['product_title'];
        
        $product_price = $row_products['product_price'];
        
        $product_image = $row_products['product_image'];
        
        $image_src = "upload/".$product_image;
       
     
        echo " <td>

        <form method='post' action='customer/index.php?action=add&id= $product_id'>
        <img id='image' src='$image_src'  alt='image'>
                         <div id='name'><b>$product_title</b></div> 
                            <div id='price'><small>Price:$product_price/-</small> </div> 
                            <input type='text' name='quantity' class='offset-5 col-2 text-center form-control mb-1' value='1'>
                            <input type='hidden' name='hidden_image' value='$image_src'>
                                     <input type='hidden' name='hidden_name' value='$product_title'>
                                     <input type='hidden' name='hidden_price' value='$product_price'>
                             <button class='btn btn-primary btn-sm addToCart' name='add'>Add to Cart</button>
                             </td> 
                           
                             </form>                 
                          
     ";
     if($i%3==0)
     {
         echo " </tr>";
        echo " <br> ";
        echo " <tr>";
     
     }
     $i++;
       }
    }
    }
    ?>