<?php
abstract class AbstractCustomer {
    protected $customer_email;
    protected $customer_pass;
    abstract   public  function isNil();
    abstract  public function getEmailPass();
    
 }
 

?>
