<?php

 class RealCustomer extends AbstractCustomer {
     function __construct($customer_email,$customer_pass) {
       $this->customer_email = $customer_email;	
       $this->customer_pass = $customer_pass;		
    }
      
    public function getEmailPass() {
       
      
  echo"<script>alert('YOU SUCCESSFULLY LOGGED IN, YOU CAN ORDER NOW!')</script>";
    }
    
       
    public function isNil() {
       return false;
    }
 }
 


?>
