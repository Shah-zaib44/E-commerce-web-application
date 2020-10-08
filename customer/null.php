<?php
session_start();
    require_once('class_customer_factory.php');
    require_once('class_abstract_customer.php');
    require_once('class_real_customer.php');
    require_once('class_null_customer.php');
    if(isset($_POST['c_login'])){
        $customer1 = CustomerFactory::getCustomer($_POST['c_email'],$_POST['c_pass']);
       
       
       
      $a=$customer1->getEmailPass();
      $customer_email = $_POST['c_email'];
      $customer_pass = $_POST['c_pass'];
      $sel_customer = "select * from customers where customer_email='$customer_email' and customer_pass='$customer_pass'";

      $run_customer = sqlsrv_query($conn, $sel_customer);
      $login=sqlsrv_fetch_array($run_customer);
     

      
      $c=$login['customer_id'];
       
        
       $_SESSION['customer_email']=$customer_email;
        echo"<script>window.open('order.php?c_id=$c','_self')</script>";
      
     
    }
?>
<?php


require_once('include/db.php');


?>
<div>
  <form action="null.php" method="post">
  <div class="container d-flex justify-content-center">
    <div class="row">
        <div class="">
            <h1 class="text-center login-title">Customer Sign in</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                    <br>
                <form class="form-signin">
                <input type="text" name="c_email" class="form-control" placeholder="Email" required autofocus>
                <br>

                <input type="password" name="c_pass" class="form-control" placeholder="Password" required>
                <br>
                <button name="c_login" class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                
                </form>
            </div>
            <a href="index.php?customer_register" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>

  

  </form>
 

</div>







