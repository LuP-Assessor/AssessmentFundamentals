<?php
require_once("RestHandler_LuP.php");

$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "all":
		// to handle REST Url /mobile/list/
		$RestHandler_LuP = new RestHandler_LuP();
		$RestHandler_LuP->getAllLuP_Services();
		break;
		
	case "single":
		// to handle REST Url /mobile/show/<id>/
		$RestHandler_LuP = new RestHandler_LuP();
		$RestHandler_LuP->getLuP_ServiceDetails($_GET["id"]);
		break;

	case "" :
		//404 - not found;
		break;
}
?>
