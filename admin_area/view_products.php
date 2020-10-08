<?php
require_once('interface_view_all_products.php');
require_once('interface_delete.php');    
require_once('class_delete.php');
require_once('class_view.php');
require_once('class_adapter.php');
require_once('../include/db.php');
 $View=new view();

    
    $View->view_products();


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
        <link rel="stylesheet" href="../styles/styles/left_sidebar.css">
    <title>Document</title>
    <style>
        img{
            height:50px;
            width:auto;
        }
        </style>
</head>
<body>

        
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <?php 
    // if (isset($_GET['view_products']))
    //     {
            ?>
    <table class='table table-striped'>
                <thead class='bg-dark text-light'>
                    <tr>
                    <th></th><th></th>
                    <th>Product No</th>
                    <th>Title</th>
                        <th>Image</th>
                         <th>Price</th>
                         
                         <th>Delete</th>
                         <th>Update</th>

                  </tr>
                   </thead>
    <?php 
        
        // include("../include/db.php");
        
        
        
         
        $get_products="select * from products   ";
        
        $run_products=sqlsrv_query($conn,$get_products);
        $i=0;
        while($row_products=sqlsrv_fetch_array($run_products)){
        
         $product_id = $row_products['product_id'];
         $product_category = $row_products['product_category'];
         $product_title = $row_products['product_title'];
         
         $product_price = $row_products['product_price'];
         
         $product_image = $row_products['product_image'];
         
         $image_src = "../upload/".$product_image;
         $i++;
         echo"
      
                   <tbody id='cartTableBody'>
                   <tr> 
                   <td></td><td></td>
                   <td>$i</td>
                   <td>$product_title</td>
                   <td ><img id='cartImage'  src='$image_src'></td>
                   <td>$product_price/-</td>
                   
                  
                   <td><form method='post' action='view_products.php?delete_product=$product_id'>
                   <button  type='submit'class='btn btn-danger' name='delete'>Delete</button>
                   </form></td>

                   <td> 
 <form method='post' action='update_product.php?update_product=$product_id'>
         <button  type='submit'class='btn btn-primary' name='update'>Update</button>
         </form</td>
                   
                   
        </tr>
                    </tbody>
             
             ";
        }
        
        
        ?>
        </table>
        <?php
        
        //  }
        // class_delete.php?delete_product=$product_id 

?>
<!-- <td> 
                   <form method='post' action='update_product.php?update_product=$product_id'>
                   <button  type='submit'class='btn btn-primary' name='update'>Update</button>
                   </form</td> -->
    <!-- /#page-content-wrapper -->
    </div>
</div>
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
