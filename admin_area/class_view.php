<?php

class view implements view_all_products{ 
	
	public function view_products(){ 
		 
		
		if(isset($_POST['delete']))
		{
			$Adapter=new adapter();
			$Adapter->view_products();
		}
			
		}
		
	}

    ?>