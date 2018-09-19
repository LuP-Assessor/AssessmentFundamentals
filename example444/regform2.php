<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS
include '../web_templates/template_genUUID.php';			// Include function gen_uuid from ../web_templates/template_genUUID.php
include '../web_templates/template_getClientIP.php';		// Include function getClientIP from ../web_templates/template_getClientIP.php
session_start();											// Start PHP Session handler (works by cookie, fully handeled by PHP) - We can use $_SESSION from now on

$file = '../log_example/access_example444_'.date("Y-m-d").'.log';	// Define Logfile location
$ip = getClientIP();										// Detect Client IP for writing into log later
$ClientBrowser = $_SERVER['HTTP_USER_AGENT'];
$ErrorMessage = "";											// Containing detected error message. If value="", no error occured.
$ThisName = "regform2.php";

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Checking all resquest mistakes between client and this php page

// Check for wrong HPPT Request type (This page have to be requested by GET Method)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $ErrorMessage = "ERROR (1.001) Request for ".$ThisName." with wrong HTML Method: '".$_SERVER['REQUEST_METHOD']."', should be 'POST'";
}
if (!isset($_POST['pval1'])) {
	$ErrorMessage = "ERROR (1.002) Request for ".$ThisName." without POST Parameter 'pval1'";
	if ($_POST['pval1'] != $_SESSION['pval1']) {
		$ErrorMessage = "ERROR (1.003) Request for ".$ThisName." with POST Parameter 'pval1', wrong value given '".$_POST['pval1']."', should be always 'new'";
	}
}
if (!isset($_POST['pval2'])) {
	$ErrorMessage = "ERROR (1.004) Request for ".$ThisName." without POST Parameter 'pval2'";
	if ($_POST['pval2'] != $_SESSION['pval2']) {
		$ErrorMessage = "ERROR (1.005) Request for ".$ThisName." with POST Parameter 'pval2', wrong value given '".$_POST['pval2']."', should be always 'new'";
	}
}
if (!isset($_POST['Username'])) {
	$ErrorMessage = "ERROR (1.006) Request for ".$ThisName." without POST Parameter 'Username'";
	if ($_POST['Username'] == "") {
		$ErrorMessage = "ERROR (1.007) Request for ".$ThisName." with POST Parameter 'Username' with empty value";
	}
} 
if (!isset($_POST['Surname'])) {
	$ErrorMessage = "ERROR (1.008) Request for ".$ThisName." without POST Parameter 'Surname'";
	if ($_POST['Surname'] == "") {
		$ErrorMessage = "ERROR (1.009) Request for ".$ThisName." with POST Parameter 'Surname' with empty value";
	}
} 
if (!isset($_POST['Gender'])) {
	$ErrorMessage = "ERROR (1.010) Request for ".$ThisName." without POST Parameter 'Gender'";
	if ($_POST['Gender'] == "") {
		$ErrorMessage = "ERROR (1.011) Request for ".$ThisName." with POST Parameter 'Gender' with empty value";
	}
} 
	
// If no error was found in previous checks -> Write Successfull Message to Log
if ($ErrorMessage=="") {
	$SuccessMessage = date("Y-m-d H:i:s")." ".$ip." Request for regform.php Successfull - 'ClientBrowser'='".$ClientBrowser."'";
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
	echo '<form action="register.php" method="post">';
	
	echo "Additional Details<br><br>";
	echo '<table>';
	echo '<tr><td>Car</td><td><select name="cars">';
    echo '<option value="volvo">Volvo</option>';
    echo '<option value="saab">Saab</option>';
    echo '<option value="fiat">Fiat</option>';
    echo '<option value="audi">Audi</option>';
	echo '</select></td></tr>';
	echo '<tr><td>Type of User</td><td><select name="usertype">';
    echo '<option value="a">Internal Employer</option>';
    echo '<option value="b">External Employer</option>';
    echo '<option value="c">Customer</option>';
    echo '<option value="d">Partner</option>';
	echo '</select></td></tr>';
	echo '<tr><td>Payment method</td><td><select name="payment">';
    echo '<option value="1">Cash</option>';
    echo '<option value="2">American Express</option>';
    echo '<option value="3">Visa</option>';
    echo '<option value="4">MasterCard</option>';
	echo '</select></td></tr>';
	echo '</table>';
	echo '<input type="hidden" name="pval" value="'.$_SESSION["pval3"].'">';
	echo '<br><br>';
	echo '<button type="submit">Submit</button>';
	echo '</form>';

echo "</div>";

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>