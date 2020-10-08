<?php
 require_once('view_categories/interface_products.php');
 require_once('view_categories/class_computer.php');
 require_once('view_categories/class_product_factory.php');

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
        <link rel="stylesheet" href="styles/styles/signin.css">
    <title>Document</title>
    <style>
        img{
            height:100px;
            width:auto;
        }
    </style>
</head>
<body>
<nav class="navbar  sticky-top navbar-expand-sm navbar-dark bg-dark   "> 
<div class="navbar-brand ml-3"><h1>E-commerce</h1></div>
        <div class="container mr-5">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            
    
           <div class="d-flex flex-column   collapse navbar-collapse" id="navbar"> 
           
    <ul class="navbar-nav " id="menu" >
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?view_products">All Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?index">Shopping Cart</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="index.php?customer_register">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="index.php?login">Sign in</a>
                </li>
                
               
           
            
                
                </ul>
        </div>
        </div>
    </nav>
    

<div id="wrapper" class="toggled " >
<div id="Left_sidebar">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="bg-dark ">
    
        <ul class="sidebar-nav  text-center" id="cats">
            <li class="sidebar-brand ">
                <div id="sidebar_title">
                <button class="btn btn-outline-light"> Categories</button>
                   
            
                </div>
            </li>
            <li>
                <a href="index.php?laptop">Laptop</a>
            </li>
            <li>
                <a href="index.php?mobile">Mobile</a>
            </li>
            <li>
                <a href="index.php?tablet">Tablet</a>
            </li>
            <li>
                <a href="index.php?computer">Computer</a>
            </li>
            <li>
                <a href="index.php?camera">Camera</a>
            </li>
            
            
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    
    <div class="product_box">
    
    <div id='single_product' class='text-center'>
    
<table class='table table-borderless'>

    
                <tbody id='tableBody'>
                
                    <tr  >

                    
    <?php
   
    $productfactory= new  ProductFactory();
if(isset($_GET['computer']))
{
    $computer = $productfactory->getProducts("computer");
    
    $computer->show();
}
elseif(isset($_GET['mobile']))
{
    $mobile = $productfactory->getProducts("mobile");
    
    $mobile->show();
}
elseif(isset($_GET['tablet']))
{
    $tablet = $productfactory->getProducts("tablet");
    
    $tablet->show();
}
elseif(isset($_GET['laptop']))
{
    $laptop = $productfactory->getProducts("laptop");
    
    $laptop->show();
}
elseif(isset($_GET['camera']))
{
    $camera = $productfactory->getProducts("camera");
    
    $camera->show();
}
if(isset($_GET['view_products']))
{
    require_once('customer/view_products.php');
}

if(isset($_GET['customer_register']))
{
    require_once('customer/customer_register.php');
}
if(isset($_GET['index']))
{
    require_once('customer/index.php');
}
if(isset($_GET['login']))
{
    require_once('customer/null.php');
}
?>
    
                   
                    </tbody>
                    </table>
                    </div>
    </div>
    
                    
    
           
  
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




