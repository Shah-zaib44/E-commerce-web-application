<?php
session_start();
include("../include/db.php");
echo $_SESSION['customer_email'];
//Getting customer ID
if(isset($_GET['c_id'])){

    $customer_id = $_GET['c_id'];
}

//Getting products price & number of items

      $total = 0;
      
    $sel_price = "select * from cart";

    $run_price=sqlsrv_query($conn, $sel_price, array(), array( "Scrollable" => 'static' ));

    $status = 'Pending';

    $invoice_no = mt_rand();

    $count_pro = sqlsrv_num_rows($run_price);

    while($record=sqlsrv_fetch_array($run_price)){
      $pro_id = $record['p_id'];
      $pro_price = "select * from products where product_id='$pro_id'";
      $run_pro_price = sqlsrv_query($conn,$pro_price);
      while($p_price=sqlsrv_fetch_array($run_pro_price)){
          $product_price = array($p_price['product_price']);
          $values = array_sum($product_price);
          $total +=$values;
        }


    }
//Getting quantity from the cart.

$get_cart = "select * from cart";

$run_cart = sqlsrv_query($conn, $get_cart);

$get_qty = sqlsrv_fetch_array($run_cart);

$qty = $get_qty['qty'];
$sub_total = $total*$qty;
// if($qty==0){

//   $qty=1;

//   $sub_total = $total;
//   }  
// else {

//   $qty=$qty;

//   $sub_total = $total*$qty;
//   }
echo $count_pro;
  $insert_order = "insert into customer_orders (customer_id, due_amount, invoice_no, total_products, order_date,order_status) 
  values('$customer_id','$sub_total','$invoice_no','$count_pro',GETDATE(),'$status')";

  $run_order = sqlsrv_query($conn, $insert_order);

    echo"<script>alert('Order successfully submitted, Thanks!')</script>";
   // echo"<script>window.open('customer/my_account.php','_self')</script>";


    $insert_to_pending_orders = "insert into pending_orders (customer_id, invoice_no, product_id, qty, order_status) 
    values ('$customer_id','$invoice_no','$pro_id','$qty','$status')";

    $run_pending_order = sqlsrv_query($conn, $insert_to_pending_orders);
  
    // $empty_cart = "delete from cart where ip_add='$ip_add'";
    // $run_emp = sqlsrv_query($conn, $empty_cart);




?>