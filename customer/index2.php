<?php
session_start();
$serverName = "DESKTOP-QD0QT2L\SQLEXPRESS";
$connectionInfo=array("Database"=>"myshop");
$conn=sqlsrv_connect($serverName,$connectionInfo);
$get_products="select * from products";
        
$run_products=sqlsrv_query($conn,$get_products);
$i=0;
while($row_products=sqlsrv_fetch_array($run_products)){

 $product_id = $row_products['product_id'];
 $product_category = $row_products['product_category'];
 $product_title = $row_products['product_title'];
 
 $product_price = $row_products['product_price'];
 
 $product_image = $row_products['product_image'];
 
 $image_src = "../upload/".$product_image;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>My Shop</title>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>



<?php
if(!isset($_SESSION['customer_email'])){

echo"<a href='checkout.php' style='color:#F93;'>Login</a>";
}
else {
    echo"<a href='logout.php' style='color:#F93;'>Logout</a>";
    
}


?>