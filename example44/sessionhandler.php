<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS
include '../web_templates/template_genUUID.php';			// Include function gen_uuid from ../web_templates/template_genUUID.php
include '../web_templates/template_getClientIP.php';		// Include function getClientIP from ../web_templates/template_getClientIP.php
session_start();											// Start PHP Session handler (works by cookie, fully handeled by PHP) - We can use $_SESSION from now on

$file = '../log_example/access_example44_'.date("Y-m-d").'.log';	// Define Logfile location
$ip = getClientIP();										// Detect Client IP for writing into log later
$pageID = gen_uuid();										// Generate a new dynamic uuid as pageID on each successfull request
$_SESSION["pageID"] = $pageID;								// Save dynamic uuid pageID to session parameter pageID
$purchID = gen_uuid();
$_SESSION["purchID"] = $purchID;								// Save dynamic uuid pageID to session parameter pageID
$ClientBrowser = $_SERVER['HTTP_USER_AGENT'];
$ErrorMessage = "";											// Containing detected error message. If value="", no error occured.

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Checking all resquest mistakes between client and example 4 sessionhandler.php:

// Check for wrong HPPT Request type (This page have to be requested by GET Method)
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $ErrorMessage = "ERROR (1.001) Request for sessionhandler.php with wrong HTML Method: '".$_SERVER['REQUEST_METHOD']."', should be 'GET'";
}
if (!isset($_GET['type'])) {
	$ErrorMessage = "ERROR (1.002) Request for sessionhandler.php without GET(url) Parameter 'type'";
}
if ($_GET['type'] != "new") {
	$ErrorMessage = "ERROR (1.003) Request for sessionhandler.php with GET(url) Parameter 'type', wrong value given '".$_GET['type']."', should be always 'new'";
}
if (isset($_GET['sessionKey'])) {
	$ErrorMessage = "CHEATER CHEATER CHEATER: Parameter 'sessionKey' received";
	file_put_contents($file, date("Y-m-d H:i:s")." ".$ip." ".$ErrorMessage . PHP_EOL, FILE_APPEND | LOCK_EX);
} 
if ($_GET['sessionKey']!=0) {
	$ErrorMessage = "CHEATER CHEATER CHEATER: Parameter 'sessionKey' received";
	file_put_contents($file, date("Y-m-d H:i:s")." ".$ip." ".$ErrorMessage . PHP_EOL, FILE_APPEND | LOCK_EX);
} 
if (!isset($_GET['sessionKek'])) {
	$ErrorMessage = "ERROR (1.004) Request for sessionhandler.php without GET(url) Parameter 'sessionKek'";
	file_put_contents($file, date("Y-m-d H:i:s")." ".$ip." ".$ErrorMessage . PHP_EOL, FILE_APPEND | LOCK_EX);
}


if ($_GET['sessionKek'] != $_SESSION["sessionKey"]) {
	$ErrorMessage = "ERROR (1.005) Request for sessionhandler.php with GET(url) Parameter 'sessionKek', wrong value given '".$_GET['sessionKek']."', should be '".$_SESSION["sessionKey"]."'";
} else {
	$sessionKey = $_GET['sessionKek'];
}
	
// If no error was found in previous checks -> Write Successfull Message to Log
if ($ErrorMessage=="") {
	$SuccessMessage = date("Y-m-d H:i:s")." ".$ip." Request for sessionhandler.php Successfull - 'sessionKek'='".$sessionKey."', Next valid 'pageID'='".$pageID."', 'ClientBrowser'='".$ClientBrowser."'";
	file_put_contents($file, $SuccessMessage . PHP_EOL, FILE_APPEND | LOCK_EX);
} else {
// If an error was found in previous checks -> Write ERROR Message to log
	echo "<img src='game-over.jpg'></img><br>ERROR<br>";
	file_put_contents($file, date("Y-m-d H:i:s")." ".$ip." ".$ErrorMessage . PHP_EOL, FILE_APPEND | LOCK_EX);
	die();
}

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Page Body (output content starts from here)

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php

/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea Div_deactive" style="top:120px;">';

	header('Location: shop.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'&purchID='.$purchID);

echo "</div>";

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>