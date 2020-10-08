<?php
 require_once('include/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
        <link rel="stylesheet" href="styles/styles/left_sidebar.css">
    <title>Document</title>
    <style>
    

        img{
            height:100px;
            width:auto;
        }
    
        
       
       
       
    </style>
</head>
<body>

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    
    


                    
    <?php
    
 
  
   
  $get_products="Select * FROM products ORDER BY NEWID() ";
  
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

?>
    
                   
                    
                    
                    
    
                  
    
           
  
    <!-- /#page-content-wrapper -->
  
<!-- /#wrapper -->

<!-- Menu Toggle Script -->






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
        <script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>
</body>

</html>





