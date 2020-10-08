<?php

class adapter implements view_all_products{


    public function __construct() {


       
        
        if(isset($_POST['delete'])){
            $d=new delete();
            

          }
        }

        public function view_products() {


           
            
            if(isset($_POST['delete'])){

                $d=new delete();
                $d->deleteProducts();
              }


          }

    }

?>