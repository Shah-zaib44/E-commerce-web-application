
<?php


require_once('../include/db.php');
if(isset($_GET['update_product'])){
    $update_id= $_GET['update_product'];
    
    $get_update="select * from products where product_id='".$update_id."'";
    $run_update=sqlsrv_query($conn, $get_update);
 
    $urow_products=sqlsrv_fetch_array($run_update);
    
    
  
   $uproduct_id = $urow_products['product_id'];
 
  
         $uproduct_category = $urow_products['product_category'];
         $uproduct_title = $urow_products['product_title'];
         
         $uproduct_price = $urow_products['product_price'];
         
         $uproduct_image = $urow_products['product_image'];

         
}
if(isset($_POST['update_product'])){
$get_products="select * from products";
                
                $run_products=sqlsrv_query($conn,$get_products);
               
                $row_products=sqlsrv_fetch_array($run_products);
                
                 $product_id = $row_products['product_id'];
            $product_category=$_POST['product_category'];
            $product_title=$_POST['product_title'];
            $product_price=$_POST['product_price'];
           
            
         
            $product_image = $_FILES['file']['name'];
            $target_dir = "../upload/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
          
            // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          
            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");
          
        //     if($product_category==''or$product_title==''or$product_price==''or$product_image=='')
        //     {
        // echo "<script>alert('Please fill all the fields')</script>";
        //     }
        //     else{
            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
                
               // Insert record
               
               $update_product="update products set product_category='".$product_category."',product_title='".$product_title."',product_price='".$product_price."',product_image='".$product_image."'  where product_id='".$product_id."'";
        $run_products=sqlsrv_query($conn,$update_product);
        if($run_products)
        {
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('view_products.php','_self')</script>";
        }
            
               // Upload file
               move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$product_image);
          
            }
        // }
}
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
</head>
<body>
<nav class="navbar  sticky-top navbar-expand-sm navbar-dark bg-dark   "> 
<div class="navbar-brand ml-3"><h1>E-commerce</h1></div>
        <div class="container ">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            
    <button class=" navbar-toggler" data-toggle="collapse" data-target="#navbarNav"> 
        <span class=" navbar-toggler-icon"></span></button>
           <div class="d-flex flex-column   collapse navbar-collapse" id="navbar"> 
    <ul class="navbar-nav  " id="menu" >
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">All Products</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="#">My Account</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="#">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="#">Shopping Cart</a>
                </li>
                <li class="nav-item" >
                    <a  class="nav-link" href="#">Contact Us</a>
                </li>
               
           
            <div id="form">
            <form method="get" action="results.php" class="form-inline ">
                    <input type="text" class="form-control ml-3 mr-2 " placeholder="Search">
                    <button class="btn btn-outline-light">Search</button>
                </form>
                </div>
                
                </ul>
        </div>
        </div>
    </nav>
    

<div id="wrapper" class="toggled " >

<div id="Left_sidebar">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="bg-dark ">
    <div class="wrapper">
    <div class="right">
        <ul class="sidebar-nav  text-center" id="cats">
            <li class="sidebar-brand ">
                <div id="sidebar_title">
                <button class="btn btn-outline-light">Admin</button>
               
                </div>
            </li>
            <li>
                <a href="index.php?insert_product" >Insert New Products</a>
            </li>
            <li>
                <a href="index.php?view_products">View All Products</a>
            </li>
            <li>
                <a href="index.php?update_product">Update Product</a>
            </li>
            <li>
                <a href="index.php?delete_product">Delete Product</a>
            </li>
            <li>
                <a href="index.php?view_orders">View All Orders</a>
            </li>
            <li>
                <a href="index.php?view_customers">View All Customers</a>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
            
        </ul>
        </div>
        <div class="left">
        <?php 
        /*
        include("include/db.php");
        if(isset($_GET['insert_product']))
        {
            include("insert_product.php");
        }
        */
        ?>
        </div>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    
    <!-- /#page-content-wrapper -->
    </div>
</div>
<!-- /#wrapper -->

<!-- Menu Toggle Script -->
<br><br>
<div class="container">
 <h1 class="offset-2 text-center">Update Product</h1>
<br>
<form method="post" action="update_product.php" enctype="multipart/form-data">
<div class="form-group  form-inline col-6 offset-4">
      <label for="sel1" class="col-4">Product Category</label>
      <select class="form-control" class="col-8"id="sel1"name="product_category">
        <option><?php echo $uproduct_category; ?></option>
        <option>Laptop</option>
        <option>Mobile</option>
        <option>Computer</option>
        <option>Camera</option>
        <option >Earphone</option>
        
      </select>
      </div>
  <div class="form-group  form-inline col-6 offset-4">
    <label for="exampleInputEmail1" class="col-4">Product Title</label>
    <input type="text" class="form-control col-8" name="product_title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Title " value="<?php echo $uproduct_title;   ?>" >
    
  </div>
  <div class="form-group  form-inline col-6 offset-4">
    <label for="exampleInputEmail1" class="col-4">Product Price</label>
    <input type="number" class="form-control col-8" name="product_price" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Price" value="<?php echo $uproduct_price; ?>" >
    
  </div>
  <div class="form-group   form-inline col-6 offset-4">
    <label for="exampleInputEmail1" class=" col-4 ">Product Image</label>
    <div class="form-group"> 
                
                <input class="form-control-file"type="file" id="file" name="file">
               
            </div>
            <div class="offset-4">
             <?php echo $uproduct_image; ?></div>   
    
  </div>
  
 
  
  <button type="submit" class="btn btn-primary col-6 offset-4" name="update_product">Update Product</button>

</form>

</div>

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
