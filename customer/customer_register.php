<?php
session_start();

require_once('include/db.php');


?>
<div id="products_box">


</div>
<form action="customer_register.php" method="post" enctype="multipart/form-data">

<table width="750" align="center">
  <tr align="center">
    <td colspan="5"><h2>Create an Account</h2></td>
  </tr>

  <tr>
    <td align="right"><b>Customer Name:</b></td>
    <td><input type="text" name="c_name" required /> </td>
  </tr>

  <tr>
    <td align="right"><b>Customer Email:</b></td>
    <td><input type="text" name="c_email" required /></td>
  </tr>

  <tr>
    <td align="right"><b>Customer Password:</b></td>
    <td><input type="password" name="c_pass" required /></td>
  </tr>

  <tr>
    <td align="right"><b>Customer Country</b></td>
    <td>
    <select name="c_country" >
      <option>Select a country</option>
      <option>Afghanistan</option>
      <option>India</option>
      <option>Iran</option>
      <option>Japan</option>
      <option>China</option>
      <option>Pakistan</option>
      <option>Saudia Arabia</option>
      <option>United Arab Emirates</option>
      <option>United States</option>
      <option>United Kingdom</option>
      </select>


    </td>
  </tr>

  <tr>
    <td align="right"><b>Customer City:</b></td>
    <td><input type="text" name="c_city" required /></td>
  </tr>

  <tr>
    <td align="right"><b>Customer Mobile No:</b></td>
    <td><input type="text" name="c_contact" required /></td>
  </tr>

  <tr>
    <td align="right"><b>Customer Address:</b></td>
    <td><input type="text" name="c_address" required /></td>
  </tr>

  

<tr align="center">
   <td colspan="5"><input type="submit" name="register" value="Submit" /></td>
</tr>

<?php
// if(!isset($_SESSION['customer_email'])){

// echo "<a href='checkout.php' style='color:#F93;'>Login</a>";
// }
// else {
//     echo"<a href='logout.php' style='color:#F93;'>Logout</a>";
    
// }
?>

<?php
  if(isset($_POST['register'])){
   $c_name= $_POST['c_name'];
   $c_email= $_POST['c_email'];
   $c_pass= $_POST['c_pass'];
   $c_country= $_POST['c_country'];
   $c_city= $_POST['c_city'];
   $c_contact= $_POST['c_contact'];
   $c_address= $_POST['c_address'];
 
  

   $insert_customer="insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,
   customer_contact,customer_address) values('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact',
   '$c_address')";
   

   $run_customer = sqlsrv_query($conn,$insert_customer);
   /*
   $sel_cart = "select * from cart where ip_add='$c_ip'";

   $run_cart = sqlsrv_query($conn, $sel_cart);

   $check_cart = sqlsrv_num_rows($run_cart);

   if(($check_cart>0){
    $_SESSION['customer_email']=$c_email;
    echo"<script>alert('Account Created Successfully, Thank you!')</script>"; 
    echo "<script>window.open('checkout.php','_self')</script>";

   }
   else{
    $_SESSION['customer_email']=$c_email;
    echo"<script>alert('Account Created Successfully, Thank you!')</script>; 
    echo"<script>window.open('index.php','_self')</script>";






  }
  */

  }

?>
