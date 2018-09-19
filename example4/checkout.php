<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS
include '../web_templates/template_genUUID.php';				// Include function gen_uuid from ../web_templates/template_genUUID.php
include '../web_templates/template_getClientIP.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php
session_start();											// Start PHP Session handler (works by cookie, fully handeled by PHP) - We can use $_SESSION from now on

$file = '../log_example/access_example4_'.date("Y-m-d").'.log';	// Define Logfile location
$ip = getClientIP();										// Detect Client IP for writing into log later
$ClientBrowser = $_SERVER['HTTP_USER_AGENT'];
$NextPageID = gen_uuid();									// Generate next page id now, but apply them to Session Parameter later after all checks are done
$sessionKey = $_GET["sessionKey"];							// Use Session key that was initialy given by index.php on all further requests
$ErrorMessage = "";											// Containing detected error message. If value="", no error occured.

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Checking all resquest mistakes between client and example 4 checkout.php:

if (!isset($_GET["sessionKey"])) {
	$ErrorMessage = "ERROR (4.001) Request for checkout.php without URL Parameter 'sessionKey'";
}
if (!isset($_GET["pageID"])) {
	$ErrorMessage = "ERROR (4.002) Request for checkout.php without URL Parameter 'pageID'";
}
if (! isset($_SESSION['sessionKey'])) {
	$ErrorMessage = "ERROR (4.003) Request for checkout.php without having a php session with valid PHP Session Parameter 'sessionKey'";
}
if (! isset($_SESSION['pageID'])) {
	$ErrorMessage = "ERROR (4.004) Request for checkout.php without having a php session with valid PHP Session Parameter 'pageID'";
}
if ($_GET["pageID"] != $_SESSION['pageID']) {
	$ErrorMessage = "ERROR (4.005) Request for checkout.php with mismatch between Session Parameter pageID '".$_SESSION['pageID']."' and URL Parameter pageID '".$_GET["pageID"]."', Next valid one will be '".$NextPageID."'";
}
if ($_GET["sessionKey"] != $_SESSION['sessionKey'] ) {
	$ErrorMessage = "ERROR (4.006) Request for checkout.php with mismatch between PHP Session Parameter sessionKey '".$_SESSION['sessionKey']."' and URL Parameter sessionKey '".$_GET["sessionKey"]."'";
} else {
	$sessionKey = $_GET['sessionKey'];
}
// Check for wrong HPPT Request type (This page have to be requested by GET Method)
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $ErrorMessage = "ERROR (4.007) Request for checkout.php with wrong HTML Method: '".$_SERVER['REQUEST_METHOD']."', should be 'GET'";
}
if (!isset($_GET["checkout"])) {
	$ErrorMessage = "ERROR (4.008) Request for checkout.php without URL Parameter 'checkout'. This parama should contain actual timestamp (max. 60sec. old).";
}
if (($_GET["checkout"] + 60) <= time()) {
	$ErrorMessage = "ERROR (4.009) Request for checkout.php with outdated URL Parameter 'checkout'. Submitted value: '".$_GET["checkout"]."'. This parama should contain actual timestamp (max. 60sec. old).";
}

// If no error was found in previous checks -> Write Successfull Message to Log
if ($ErrorMessage=="") {
	$SuccessMessage = date("Y-m-d H:i:s")." ".$ip;
	$SuccessMessage .= " Request for       checkout.php Successfull - 'sessionKey'='".$sessionKey."', 'pageID'='".$_GET["pageID"]."', Next valid 'pageID'='".$NextPageID."', 'ClientBrowser'='".$ClientBrowser."' ";
	file_put_contents($file, $SuccessMessage . PHP_EOL, FILE_APPEND | LOCK_EX);
} else {
// If an error was found in previous checks -> Write ERROR Message to log
	echo "<img src='game-over.jpg'></img><br>ERROR<br>";
	file_put_contents($file, date("Y-m-d H:i:s")." ".$ip." ".$ErrorMessage . PHP_EOL, FILE_APPEND | LOCK_EX);
	die();
}

// Generate a new dynamic uuid as pageID on each successfull request
$pageID = $NextPageID;
$_SESSION["pageID"] = $NextPageID;


// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Page Body (output content starts from here)

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php

/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea Div_deactive" style="top:120px;">';

	echo "<H1>LuP-Test example 4 Webshop</h1>";
	echo "If you read this, you completed the entire usecase process, last request was 'checkout.php'. Great! You finished this example<br><br>";

	echo '<a href="index.php">Start a new Shopping tour</a>';

		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();
		
	echo "</div>";

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>