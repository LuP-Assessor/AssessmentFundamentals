<?php
require_once("SimpleRest.php");
require_once("DomainClass_LuP.php");
		
class RestHandler_LuP extends SimpleRest {

	function getAllLuP_Services() {	

		$DomainClass_LuP = new DomainClass_LuP();
		$rawData = $DomainClass_LuP->getAllLuP_Services();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No service found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}
	
	public function encodeHtml($responseData) {
	
		$htmlResponse = "<table border='1'>";
		foreach($responseData as $key=>$value) {
    			$htmlResponse .= "<tr><td>". $key. "</td><td>". $value. "</td></tr>";
		}
		$htmlResponse .= "</table>";
		return $htmlResponse;		
	}
	
	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
	
	public function encodeXml($responseData) {
		// creating object of SimpleXMLElement
		$xml = new SimpleXMLElement('<?xml version="1.0"?><LuP_Service></LuP_Service>');
		foreach($responseData as $key=>$value) {
			$xml->addChild($key, $value);
		}
		return $xml->asXML();
	}
	
	public function getLuP_ServiceDetails($id) {
		
		if ($id > 0 && $id < 9) {
			$DomainClass_LuP = new DomainClass_LuP();
			$rawData = $DomainClass_LuP->getLuP_ServiceDetails_name($id);
			$rawData = $rawData + $DomainClass_LuP->getLuP_ServiceDetails_price($id+8);
		}
		
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No service found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}
}
?>