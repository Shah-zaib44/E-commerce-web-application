<?php

class delete implements interface_delete{ 
 
  public function deleteProducts(){ 
    require_once('../include/db.php');
    global $conn;
    if(isset($_GET['delete_product'])){
            $delete_id= $_GET['delete_product'];
        
            $delete_product="delete from products where product_id='".$delete_id."'";
            $run_delete=sqlsrv_query($conn, $delete_product);
         
            if($run_delete)
        {
            echo "<script>alert('Product deleted successfully')</script>";
            echo "<script>window.open('index.php?view_products')</script>";
        } 
        } 
      }
}
?>