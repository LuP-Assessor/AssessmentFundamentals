<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS
include '../web_templates/template_genUUID.php';			// Include function gen_uuid from ../web_templates/template_genUUID.php
include '../web_templates/template_getClientIP.php';		// Include function getClientIP from ../web_templates/template_getClientIP.php
session_start();											// Start PHP Session handler (works by cookie, fully handeled by PHP) - We can use $_SESSION from now on

$file = '../log_example/access_example444_'.date("Y-m-d").'.log';	// Define Logfile location
$ip = getClientIP();										// Detect Client IP for writing into log later
$ClientBrowser = $_SERVER['HTTP_USER_AGENT'];
$ErrorMessage = "";											// Containing detected error message. If value="", no error occured.
$ThisName = "finish.php";

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Checking all resquest mistakes between client and example 4 sessionhandler.php:

// Check for wrong HPPT Request type (This page have to be requested by GET Method)
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $ErrorMessage = "ERROR (1.001) Request for ".$ThisName." with wrong HTML Method: '".$_SERVER['REQUEST_METHOD']."', should be 'GET'";
}
if ($_SESSION["finish"]!=$_SESSION['pval4']) {
	$ErrorMessage = "ERROR (1.002) Request for ".$ThisName." Session['finish'] not equal to Session['pval4'] (splashloader.php not executed corectly)";
}
if (!isset($_GET['pval'])) {
	$ErrorMessage = "ERROR (1.003) Request for ".$ThisName." without GET(url) Parameter 'pval'";
	if ($_GET['pval'] != $_SESSION['pval3']) {
		$ErrorMessage = "ERROR (1.004) Request for ".$ThisName." with GET(url) Parameter 'pval', wrong value given '".$_GET['pval']."', should be '".$_SESSION['pval3']."'";
	}
}
//if (!isset($_GET['sessionKey'])) {
//	$ErrorMessage = "ERROR (1.005) Request for ".$ThisName." without GET(url) Parameter 'sessionKey'";
//}
//if ($_GET['sessionKey'] != $_SESSION["sessionKey"]) {
//	$ErrorMessage = "ERROR (1.006) Request for ".$ThisName." with GET(url) Parameter 'sessionKey', wrong value given '".$_GET['sessionKey']."', should be '".$_SESSION["sessionKey"]."'";
//} else {
//	$sessionKey = $_GET['sessionKey'];
//}
	
// If no error was found in previous checks -> Write Successfull Message to Log
if ($ErrorMessage=="") {
	$SuccessMessage = date("Y-m-d H:i:s")." ".$ip." Request for regform.php Successfull - 'sessionKey'='".$sessionKey."', Next valid 'pageID'='".$pageID."', 'ClientBrowser'='".$ClientBrowser."'";
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
//echo '<div id="" class="Div_DataArea Div_deactive" onmouseover="alert(w)" style="top:120px;" >';
echo '<div id="" class="Div_DataArea Div_deactive" onmouseover="showHint()" style="top:120px;" >';

echo "<h1>LuP-Test example 444 Registration Process</h1>";
echo "<br>";

echo "PASSED";

echo "</div>";
/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>