<?php
session_start();
require_once('../include/db.php');
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
<div id="products_box">
<?php
if(!isset ($_SESSION['customer_email']))
{
   include("customer_login_1.php");

}
else {
    include("payment_options.php");
}
?>
</div>
<?php
if(!isset($_SESSION['customer_email'])){

echo"<a href='checkout.php' style='color:#F93;'>Login</a>";
}
else {
    echo"<a href='logout.php' style='color:#F93;'>Logout</a>";
    
}
?>