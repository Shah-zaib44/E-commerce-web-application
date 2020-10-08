<?php
session_start();
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
                <a href="index.php?view_orders">View All Orders</a>
            </li>
            <li>
                <a href="index.php?view_customers">View All Customers</a>
            </li>
            <li>
                <a href="logout.php">Admin Logout</a>
            </li>
            
        </ul>
        </div>
        
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div class="left">
        <?php 
        
        require_once('../include/db.php');
        if (isset($_SESSION['customer_email'])){
        if(isset($_GET['insert_product']))
        {
            require_once("insert_product.php");
        }
 if(isset($_GET['view_products']))
        {
            require_once("view_products.php");
        }
        if(isset($_GET['view_customers']))
        {
            require_once("view_customers.php");
        }

    }
       
        ?>
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