<?php

 class NullCustomer extends AbstractCustomer {
 
    public function getEmailPass() {
       echo "<script>alert('Email or Password is incorrect. TRY AGAIN!') </script>";
    }
   
    
    public function isNil() {
       return true;
    }
 }
 
?>
