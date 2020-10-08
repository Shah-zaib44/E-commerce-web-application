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
      $sel_customer = "select * from admin where customer_email='$customer_email' and customer_pass='$customer_pass'";

      $run_customer = sqlsrv_query($conn, $sel_customer);
      $login=sqlsrv_fetch_array($run_customer);
     

      
      $c=$login['customer_id'];
       
        
       $_SESSION['customer_email']=$customer_email;
        echo"<script>window.open('index.php?c_id=$c','_self')</script>";
      
     
    }
?>
<?php


require_once('../include/db.php');


?>








<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="../styles/styles/signin.css">
  <title>Bootstrap Theme</title>
</head>

<body>
  <!-- START HERE -->

  <div>
  <form action="null.php" method="post">

  <div class="container d-flex justify-content-center mt-5">
    <div class="row">
        <div class="">
            <h1 class="text-center login-title">Admin Login</h1>
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
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());
  </script>
</body>

</html>