<?php





 
 
require_once('../include/db.php');

if(isset($_POST['insert_product']))
{
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
  
    if($product_category==''or$product_title==''or$product_price==''or$product_image=='')
    {
echo "<script>alert('Please fill all the fields')</script>";
    }
    else{
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
   
       // Insert record
       $insert_product="insert into products (product_category,product_title,product_price,product_image) values ('$product_category','$product_title','$product_price','$product_image')";
$run_products=sqlsrv_query($conn,$insert_product);
if($run_products)
{
    echo "<script>alert('Product inserted successfully')</script>";
   
}
    
       // Upload file
       move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$product_image);
  
    }
}
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
 <h1 class="offset-2 text-center">Insert New Product</h1>
<br>
<form method="post" action="index.php?insert_product" enctype="multipart/form-data">
<div class="form-group  form-inline col-6 offset-4">
      <label for="sel1" class="col-4">Product Category</label>
      <select class="form-control" class="col-8"id="sel1"name="product_category">
        <option>Laptop</option>
        <option>Mobile</option>
        <option>Computer</option>
        <option>Camera</option>
        <option >Earphone</option>
      </select>
      </div>
  <div class="form-group  form-inline col-6 offset-4">
    <label for="exampleInputEmail1" class="col-4">Product Title</label>
    <input type="text" class="form-control col-8" name="product_title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Title ">
    
  </div>
  <div class="form-group  form-inline col-6 offset-4">
    <label for="exampleInputEmail1" class="col-4">Product Price</label>
    <input type="number" class="form-control col-8" name="product_price" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Price">
    
  </div>
  <div class="form-group   form-inline col-6 offset-4">
    <label for="exampleInputEmail1" class=" col-4 ">Product Image</label>
    <div class="form-group"> 
                
                <input class="form-control-file"type="file" id="file" name="file">
               
            </div>
    
  </div>
  
 
  
  <button type="submit" class="btn btn-primary col-6 offset-4" name="insert_product">Insert New Product</button>

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
