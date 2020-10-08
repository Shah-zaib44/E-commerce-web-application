<?php
require_once('include/db.php');

 class CustomerFactory {
     
     public static function emailpass(){
        global $conn;
        $customer_email = $_POST['c_email'];
        $customer_pass = $_POST['c_pass'];
        $sel_customer = "select * from customers where customer_email='$customer_email' and customer_pass='$customer_pass'";

        $run_customer = sqlsrv_query($conn, $sel_customer);
        $login=sqlsrv_fetch_array($run_customer);
       

        
        $c=$login['customer_email'];
        $d=$login['customer_pass'];
       
       return array($c,$d);
     }
    

    public static function getCustomer($customer_email,$customer_pass){
      $a=self::emailpass();
      
            if ($a[0]==$customer_email and $a[1]==$customer_pass){
              
                return new RealCustomer($customer_email,$customer_pass);
             }   
            
        
        return new NullCustomer();
        }
             
     
    }
    
 
 



  
 
?>
