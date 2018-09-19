<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS
include '../web_templates/template_genUUID.php';					// Include function gen_uuid from ../web_templates/template_genUUID.php
include '../web_templates/template_getClientIP.php';				// Include function getClientIP from ../web_templates/template_getClientIP.php
session_start();													// Start PHP Session handler (works by cookie, fully handeled by PHP) - We can use $_SESSION from now on

$file = '../log_example/access_example444_'.date("Y-m-d").'.log';	// Define Logfile location
$ip = getClientIP();												// Detect Client IP for writing into log later
$pval1 = rand(111111,999999);										// Generate random number for pval1
$pval2 = rand(111111,999999);										// Generate random number for pval2
$pval3 = rand(111111,999999);										// Generate random number for pval3
$pval4 = rand(111111,999999);										// Generate random number for pval4
$_SESSION["pval1"]=$pval1;											// Save pval1 into Session Parameter
$_SESSION["pval2"]=$pval2;											// Save pval2 into Session Parameter
$_SESSION["pval3"]=$pval3;											// Save pval3 into Session Parameter
$_SESSION["pval4"]=$pval4;											// Save pval4 into Session Parameter
$_SESSION["finish"]="";
$ClientBrowser = $_SERVER['HTTP_USER_AGENT'];
$ErrorMessage = "";													// Containing detected error message. If value="", no error occured.
$ThisName = "index.php";

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Checking all resquest mistakes between client and this php page

// Check for wrong HPPT Request type (This page have to be requested by GET Method)
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $ErrorMessage = "ERROR (0.001) Request for ".$ThisName." with wrong HTML Method: '".$_SERVER['REQUEST_METHOD']."', should be 'GET', ClientBrowser: ".$ClientBrowser;
}

// If no error was found in previous checks -> Write Successfull Message to Log
if ($ErrorMessage=="") {
	$SuccessMessage = date("Y-m-d H:i:s")." ".$ip." Request for ".$ThisName." Successfull - 'ClientBrowser'='".$ClientBrowser."', 'ClientIP'=".$ip."'";
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

	// Page Header for successfull requests (good choice for response validation)
	echo "<h1>LuP-Test example 444 Registration Process</h1>";
	echo "<br>";

	echo "<a href='regform.php?type=RegisterNew&pval=".$pval1."'>Register User</a><br>";
	
	echo '<div id="hideout" style="visibility: hidden;">';
	echo '<table>';
	echo '<tr><td>'.$pval1.'</td><td></td><td></td><td></td></tr>';
	echo '<tr><td></td><td>'.$pval2.'</td><td></td><td></td></tr>';
	echo '<tr><td></td><td></td><td>'.$pval3.'</td><td></td></tr>';
	echo '<tr><td></td><td></td><td></td><td>'.$pval4.'</td></tr>';
	echo '</table></div>';
echo "</div>";

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>