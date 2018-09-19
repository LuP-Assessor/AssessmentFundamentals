<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS
include '../web_templates/template_genUUID.php';			// Include function gen_uuid from ../web_templates/template_genUUID.php
include '../web_templates/template_getClientIP.php';		// Include function getClientIP from ../web_templates/template_getClientIP.php
session_start();											// Start PHP Session handler (works by cookie, fully handeled by PHP) - We can use $_SESSION from now on

$file = '../log_example/access_example444_'.date("Y-m-d").'.log';	// Define Logfile location
$ip = getClientIP();										// Detect Client IP for writing into log later
$ClientBrowser = $_SERVER['HTTP_USER_AGENT'];
$ErrorMessage = "";											// Containing detected error message. If value="", no error occured.
$ThisName = "regform.php";

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Checking all resquest mistakes between client and this php page

// Check for wrong HPPT Request type (This page have to be requested by GET Method)
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $ErrorMessage = "ERROR (1.001) Request for ".$ThisName." with wrong HTML Method: '".$_SERVER['REQUEST_METHOD']."', should be 'GET'";
}
if (!isset($_GET['pval'])) {
	$ErrorMessage = "ERROR (1.002) Request for ".$ThisName." without GET(url) Parameter 'pval'";
}
if ($_GET['pval'] != $_SESSION["pval1"]) {
	$ErrorMessage = "ERROR (1.003) Request for ".$ThisName." with GET(url) Parameter 'pval', wrong value given '".$_GET['pval']."', should be ".$_SESSION["pval1"];
}
if (!isset($_GET['type'])) {
	$ErrorMessage = "ERROR (1.004) Request for ".$ThisName." without GET(url) Parameter 'type'";
}
if ($_GET['type'] != "RegisterNew") {
	$ErrorMessage = "ERROR (1.005) Request for ".$ThisName." with GET(url) Parameter 'type', wrong value given '".$_GET['type']."', should always be 'RegisterNew'";
} 
	
// If no error was found in previous checks -> Write Successfull Message to Log
if ($ErrorMessage=="") {
	$SuccessMessage = date("Y-m-d H:i:s")." ".$ip." Request for ".$ThisName." Successfull - 'pval'='".$_GET['pval']."', 'type'='".$_GET['type']."', 'ClientBrowser'='".$ClientBrowser."', 'ClientIP'=".$ip."'";
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

	//header('Location: shop.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'&purchID='.$purchID);
	echo "<h1>LuP-Test example 444 Registration Process</h1>";
	echo '<form action="regform2.php" method="post">';
	echo "Register new User<br><br>";
	echo '<label for="Username">Username</label>';
	echo '<input name="Username" type="text"><br>';
	echo '<label for="Surname">Surname</label>';
	echo '<input name="Surname" type="text"><br>';
	echo 'Gender <input id="Gender1" type="radio" name="Gender" value="1">';
	echo '<label for="Gender1">Female</label>';
	echo '<input id="Gender2" type="radio" name="Gender" value="2">';
	echo '<label for="Gender2">Male</label>';
	echo '<input id="Gender3" type="radio" name="Gender" value="3">';
	echo '<label for="Gender3">Unsure</label>';
	echo '<input type="hidden" name="pval1" value="'.$_SESSION["pval1"].'">';
	echo '<input type="hidden" name="pval2" value="'.$_SESSION["pval2"].'">';
	echo '<br><br><br>';
	echo '<button type="submit">Submit</button>';
	echo '</form>';

echo "</div>";

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>