<?php
require_once('interface_products.php');
require_once('class_computer.php');
require_once('class_mobile.php');
require_once('class_laptop.php');
require_once('class_tablet.php');
require_once('class_camera.php');
require_once('class_product_factory.php');

class ProductFactory {
    public function getProducts($productType){
   if($productType == null)
   {
      return null;    
   }		
   if($productType=="computer")
   {
      return new computer();
   }
   
   else if($productType=="mobile")
   {
      return new mobile();
   } 
   else if($productType=="laptop")
   {
      return new laptop();
   } 
   else if($productType=="camera")
   {
      return new camera();
   } 
   else if($productType=="tablet")
   {
      return new tablet();
   } 
   return null;  
    }
}
 


?>