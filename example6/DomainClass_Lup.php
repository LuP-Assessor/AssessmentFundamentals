<?php
/* A domain Class to demonstrate RESTful web services */
Class DomainClass_LuP {
	
	private $LuP_Services = array(
		1 => 'LuP Basis Package',  
		2 => 'Cookies',  
		3 => 'Loadgenerator (1 Device, one Day, full managed) rent',  			
		4 => 'Loadgenerator (10 Device, one Day, full managed) rent',  			
		5 => 'Loadgenerator (1 Device, one Day, unmanaged) rent',  
		6 => 'Loadgenerator (10 Device, one Day, unmanaged) rent',
		7 => '1 pound of Coffee (to survive long coding nights)',
		8 => '1 Can Energy Dring (for advanced Users Only)');
		
	private $LuP_Services_price = array(
		1 => '200000',  
		2 => '0.49',  
		3 => '49.99',  			
		4 => '299.99',  			
		5 => '14.99',  
		6 => '49.99',
		7 => '6.66',
		8 => '2.99');
	
	/*
		you should hookup the DAO here
	*/
	public function getAllLuP_Services(){
		return $this->LuP_Services;
	}
	
	public function getLuP_ServiceDetails_name($id){
		
		$LuP_Services = array($id => ($this->LuP_Services[$id]) ? $this->LuP_Services[$id] : $this->LuP_Services[1]);
		return $LuP_Services;
	}

	public function getLuP_ServiceDetails_price($id){
		
		$LuP_Services_price = array($id => ($this->LuP_Services_price[$id-8]) ? $this->LuP_Services_price[$id-8] : $this->LuP_Services_price[1]);
		return $LuP_Services_price;
	}	
}
?>