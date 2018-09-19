<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS
include '../web_templates/template_genUUID.php';				// Include function gen_uuid from ../web_templates/template_genUUID.php
include '../web_templates/template_getClientIP.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php
session_start();											// Start PHP Session handler (works by cookie, fully handeled by PHP) - We can use $_SESSION from now on

$file = '../log_example/access_example4_'.date("Y-m-d").'.log';	// Define Logfile location
$ip = getClientIP();										// Detect Client IP for writing into log later
$ClientBrowser = $_SERVER['HTTP_USER_AGENT'];
$hiddenID1 = $_SESSION["hiddenID1"] ;
$hiddenID2 = $_SESSION["hiddenID2"] ;
$hiddenID3 = $_SESSION["hiddenID3"] ;
$hiddenID4 = $_SESSION["hiddenID4"] ;
$hiddenID5 = $_SESSION["hiddenID5"] ;
$hiddenID6 = $_SESSION["hiddenID6"] ;
$hiddenID7 = $_SESSION["hiddenID7"] ;
$hiddenID8 = $_SESSION["hiddenID8"] ;
$NextPageID = gen_uuid();									// Generate next page id now, but apply them to Session Parameter later after all checks are done
$ErrorMessage = "";											// Containing detected error message. If value="", no error occured.

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Checking all resquest mistakes between client and example 4 cart.php:

if (!isset($_GET["sessionKey"])) {
	$ErrorMessage = "ERROR (3.001) Request for cart.php without URL Parameter 'sessionKey'";
}
if (!isset($_GET["pageID"])) {
	$ErrorMessage = "ERROR (3.002) Request for cart.php without URL Parameter 'pageID'";
}
if (! isset($_SESSION['sessionKey'])) {
	$ErrorMessage = "ERROR (3.003) Request for cart.php without having a php session with valid PHP Session Parameter 'sessionKey'";
}
if (! isset($_SESSION['pageID'])) {
	$ErrorMessage = "ERROR (3.004) Request for cart.php without having a php session with valid PHP Session Parameter 'pageID'";
}
if ($_GET["pageID"] != $_SESSION['pageID']) {
	$ErrorMessage = "ERROR (3.005) Request for cart.php with mismatch between Session Parameter pageID '".$_SESSION['pageID']."' and URL Parameter pageID '".$_GET["pageID"]."', Next valid one will be '".$NextPageID."'";
}
if ($_GET["sessionKey"] != $_SESSION['sessionKey'] ) {
	$ErrorMessage = "ERROR (3.006) Request for cart.php with mismatch between PHP Session Parameter sessionKey '".$_SESSION['sessionKey']."' and URL Parameter sessionKey '".$_GET["sessionKey"]."'";
} else {
	$sessionKey = $_GET['sessionKey'];
}
// Check for wrong HPPT Request type (This page have to be requested by POST Method)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $ErrorMessage = "ERROR (3.007) Request for cart.php with wrong HTML Method: '".$_SERVER['REQUEST_METHOD']."', should be 'POST'";
}
if (!isset($_POST['ctl_field27ID'.$hiddenID1]) && !isset($_POST['ctl_field27ID'.$hiddenID2]) && 
    !isset($_POST['ctl_field27ID'.$hiddenID3]) && !isset($_POST['ctl_field27ID'.$hiddenID4]) && 
	!isset($_POST['ctl_field27ID'.$hiddenID5]) && !isset($_POST['ctl_field27ID'.$hiddenID6]) && 
	!isset($_POST['ctl_field27ID'.$hiddenID7]) && !isset($_POST['ctl_field27ID'.$hiddenID8]) ) {
	$ErrorMessage = "ERROR (3.008) Request for cart.php without any POST Parameter 'ctl_field27ID[DYNAMIC ID]' , available Dynamic ID's: '".$hiddenID1."' '".$hiddenID2."' '".$hiddenID3."' '".$hiddenID4."' '".$hiddenID5."' '".$hiddenID6."' '".$hiddenID7."' '".$hiddenID8."'";
}
if (isset($_POST['ctl_field27ID'.$hiddenID1]) && $_POST['ctl_field27ID'.$hiddenID1] == 0) {
	$ErrorMessage = "ERROR (3.009) Request for cart.php with POST Parameter 'ctl_field27ID".$hiddenID1."', Value is 0 or not an Integer:'".$_POST['ctl_field27ID'.$hiddenID1]."'";
}
if (isset($_POST['ctl_field27ID'.$hiddenID2]) && $_POST['ctl_field27ID'.$hiddenID2] == 0 ) {
	$ErrorMessage = "ERROR (3.010) Request for cart.php with POST Parameter 'ctl_field27ID".$hiddenID2."', Value is 0 or not an Integer:'".$_POST['ctl_field27ID'.$hiddenID2]."'";
}
if (isset($_POST['ctl_field27ID'.$hiddenID3]) && $_POST['ctl_field27ID'.$hiddenID3] == 0 ) {
	$ErrorMessage = "ERROR (3.011) Request for cart.php with POST Parameter 'ctl_field27ID".$hiddenID3."', Value is 0 or not an Integer:'".$_POST['ctl_field27ID'.$hiddenID3]."'";
}
if (isset($_POST['ctl_field27ID'.$hiddenID4]) && $_POST['ctl_field27ID'.$hiddenID4] == 0 ) {
	$ErrorMessage = "ERROR (3.012) Request for cart.php with POST Parameter 'ctl_field27ID".$hiddenID4."', Value is 0 or not an Integer:'".$_POST['ctl_field27ID'.$hiddenID4]."'";
}
if (isset($_POST['ctl_field27ID'.$hiddenID5]) && $_POST['ctl_field27ID'.$hiddenID5] == 0 ) {
	$ErrorMessage = "ERROR (3.013) Request for cart.php with POST Parameter 'ctl_field27ID".$hiddenID5."', Value is 0 or not an Integer:'".$_POST['ctl_field27ID'.$hiddenID5]."'";
}
if (isset($_POST['ctl_field27ID'.$hiddenID6]) && $_POST['ctl_field27ID'.$hiddenID6] == 0 ) {
	$ErrorMessage = "ERROR (3.014) Request for cart.php with POST Parameter 'ctl_field27ID".$hiddenID6."', Value is 0 or not an Integer:'".$_POST['ctl_field27ID'.$hiddenID6]."'";
}
if (isset($_POST['ctl_field27ID'.$hiddenID7]) && $_POST['ctl_field27ID'.$hiddenID7] == 0 ) {
	$ErrorMessage = "ERROR (3.015) Request for cart.php with POST Parameter 'ctl_field27ID".$hiddenID7."', Value is 0 or not an Integer:'".$_POST['ctl_field27ID'.$hiddenID7]."'";
}
if (isset($_POST['ctl_field27ID'.$hiddenID8]) && $_POST['ctl_field27ID'.$hiddenID8] == 0 ) {
	$ErrorMessage = "ERROR (3.016) Request for cart.php with POST Parameter 'ctl_field27ID".$hiddenID8."', Value is 0 or not an Integer:'".$_POST['ctl_field27ID'.$hiddenID8]."'";
}

// If no error was found in previous checks -> Write Successfull Message to Log
if ($ErrorMessage=="") {
	$SuccessMessage = date("Y-m-d H:i:s")." ".$ip;
	$SuccessMessage .= " Request for           cart.php Successfull - 'sessionKey'='".$sessionKey."', 'pageID'='".$_GET["pageID"]."', Next valid 'pageID'='".$NextPageID."', 'ClientBrowser'='".$ClientBrowser."' ";
	
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

// Page Header for successfull requests (good choice for response validation)
echo "<H1>LuP-Test example 4 Webshop</h1>";
echo "You succeed to put objects into your shoping cart 'cart.php'. Great! Go on with shopping or proceed payment simulation!!!<br><br>";

if (isset($_POST['ctl_field27ID'.$hiddenID1])) {
	if (!isset($_SESSION['Qtty1'])) {$_SESSION['Qtty1'] = $_POST['ctl_field27ID'.$hiddenID1]; $SuccessMessage = $SuccessMessage."- Added LuP Basis Package, new amount: ". $_SESSION['Qtty1'];} 
	                           else {$_SESSION['Qtty1'] = $_POST['ctl_field27ID'.$hiddenID1]+$_SESSION['Qtty1']; $SuccessMessage = $SuccessMessage."- Added LuP Basis Package, new amount: ". $_SESSION['Qtty1'];} }
if (isset($_POST['ctl_field27ID'.$hiddenID2])) {
	if (!isset($_SESSION['Qtty2'])) {$_SESSION['Qtty2'] = $_POST['ctl_field27ID'.$hiddenID2]; $SuccessMessage = $SuccessMessage."- Added Cookies, new amount: ". $_SESSION['Qtty2'];} 
	                           else {$_SESSION['Qtty2'] = $_POST['ctl_field27ID'.$hiddenID2]+$_SESSION['Qtty2']; $SuccessMessage = $SuccessMessage."- Added Cookies, new amount: ". $_SESSION['Qtty2'];} }
if (isset($_POST['ctl_field27ID'.$hiddenID3])) {
	if (!isset($_SESSION['Qtty3'])) {$_SESSION['Qtty3'] = $_POST['ctl_field27ID'.$hiddenID3]; $SuccessMessage = $SuccessMessage."- Added managed LG, new amount: ". $_SESSION['Qtty3'];}
							   else {$_SESSION['Qtty3'] = $_POST['ctl_field27ID'.$hiddenID3]+$_SESSION['Qtty3']; $SuccessMessage = $SuccessMessage."- Added managed LG, new amount: ". $_SESSION['Qtty3'];} }
if (isset($_POST['ctl_field27ID'.$hiddenID4])) {
	if (!isset($_SESSION['Qtty4'])) {$_SESSION['Qtty4'] = $_POST['ctl_field27ID'.$hiddenID4]; $SuccessMessage = $SuccessMessage."- Added 10 manged LG's, new amount: ". $_SESSION['Qtty4'];}
		                       else {$_SESSION['Qtty4'] = $_POST['ctl_field27ID'.$hiddenID4]+$_SESSION['Qtty4']; $SuccessMessage = $SuccessMessage."- Added 10 manged LG's, new amount: ". $_SESSION['Qtty4'];} }
if (isset($_POST['ctl_field27ID'.$hiddenID5])) {
	if (!isset($_SESSION['Qtty5'])) {$_SESSION['Qtty5'] = $_POST['ctl_field27ID'.$hiddenID5]; $SuccessMessage = $SuccessMessage."- Added unmanged LG's, new amount: ". $_SESSION['Qtty5'];}
		                       else {$_SESSION['Qtty5'] = $_POST['ctl_field27ID'.$hiddenID5]+$_SESSION['Qtty5']; $SuccessMessage = $SuccessMessage."- Added unmanged LG's, new amount: ". $_SESSION['Qtty5'];} }
if (isset($_POST['ctl_field27ID'.$hiddenID6])) {
	if (!isset($_SESSION['Qtty6'])) {$_SESSION['Qtty6'] = $_POST['ctl_field27ID'.$hiddenID6]; $SuccessMessage = $SuccessMessage."- Added 10 unmanged LG's, new amount: ". $_SESSION['Qtty6'];}
		                       else {$_SESSION['Qtty6'] = $_POST['ctl_field27ID'.$hiddenID6]+$_SESSION['Qtty6']; $SuccessMessage = $SuccessMessage."- Added 10 unmanged LG's, new amount: ". $_SESSION['Qtty6'];} }
if (isset($_POST['ctl_field27ID'.$hiddenID7])) {
	if (!isset($_SESSION['Qtty7'])) {$_SESSION['Qtty7'] = $_POST['ctl_field27ID'.$hiddenID7]; $SuccessMessage = $SuccessMessage."- Added Coffee, new amount: ". $_SESSION['Qtty7'];}
		                       else {$_SESSION['Qtty7'] = $_POST['ctl_field27ID'.$hiddenID7]+$_SESSION['Qtty7']; $SuccessMessage = $SuccessMessage."- Added Coffee, new amount: ". $_SESSION['Qtty7'];} }
if (isset($_POST['ctl_field27ID'.$hiddenID8])) {
	if (!isset($_SESSION['Qtty8'])) {$_SESSION['Qtty8'] = $_POST['ctl_field27ID'.$hiddenID8]; $SuccessMessage = $SuccessMessage."- Added Energy Dring, new amount: ". $_SESSION['Qtty7'];}
		                       else {$_SESSION['Qtty8'] = $_POST['ctl_field27ID'.$hiddenID8]+$_SESSION['Qtty8']; $SuccessMessage = $SuccessMessage."- Added Energy Dring, new amount: ". $_SESSION['Qtty7'];} }

file_put_contents($file, $SuccessMessage . PHP_EOL, FILE_APPEND | LOCK_EX);

echo "<H2>Your shopping cart</H2>";
if (isset($_SESSION['Qtty1'])) {
	if ($_SESSION['Qtty1']>=1) {
		echo "* ".$_SESSION['Qtty1']."pcs LuP Basis Package - Price (".$_SESSION['Qtty1']." * 200000 $ = ".($_SESSION['Qtty1']*200000)." $)<br>";
	}
}
if (isset($_SESSION['Qtty2'])) {
	if ($_SESSION['Qtty2']>=1) {
		echo "* ".$_SESSION['Qtty2']."pcs Cookies - Price (".$_SESSION['Qtty2']." * 0.49 $ = ".($_SESSION['Qtty2']*0.49)." $)<br>";
	}
}
if (isset($_SESSION['Qtty3'])) {
	if ($_SESSION['Qtty3']>=1) {
		echo "* ".$_SESSION['Qtty3']."pcs Loadgenerator (1 Device, one Day, full managed) rent - Price (".$_SESSION['Qtty3']." * 49.99 $ = ".($_SESSION['Qtty3']*49.99)." $)<br>";
	}
}
if (isset($_SESSION['Qtty4'])) {
	if ($_SESSION['Qtty4']>=1) {
		echo "* ".$_SESSION['Qtty4']."pcs Loadgenerator (10 Device, one Day, full managed) rent - Price (".$_SESSION['Qtty4']." * 299.99 $ = ".($_SESSION['Qtty4']*299.99)." $)<br>";
	}
}
if (isset($_SESSION['Qtty5'])) {
	if ($_SESSION['Qtty5']>=1) {
		echo "* ".$_SESSION['Qtty5']."pcs Loadgenerator (1 Device, one Day, unmanaged) rent - Price (".$_SESSION['Qtty5']." * 14.99 $ = ".($_SESSION['Qtty5']*14.99)." $)<br>";
	}
}
if (isset($_SESSION['Qtty6'])) {
	if ($_SESSION['Qtty6']>=1) {
		echo "* ".$_SESSION['Qtty6']."pcs Loadgenerator (10 Device, one Day, unmanaged) rent - Price (".$_SESSION['Qtty6']." * 49.99 $ = ".($_SESSION['Qtty6']*49.99)." $)<br>";
	}
}
if (isset($_SESSION['Qtty7'])) {
	if ($_SESSION['Qtty7']>=1) {
		echo "* ".$_SESSION['Qtty7']."pcs 1 pound of Coffee (to survive long coding nights) - Price (".$_SESSION['Qtty7']." * 6.66 $ = ".($_SESSION['Qtty7']*6.66)." $)<br>";
	}
}
if (isset($_SESSION['Qtty8'])) {
	if ($_SESSION['Qtty8']>=1) {
		echo "* ".$_SESSION['Qtty8']."pcs 1 Can Energy Dring (for advanced Users Only) - Price (".$_SESSION['Qtty8']." * 2.99 $ = ".($_SESSION['Qtty8']*2.99)." $)<br>";
	}
}

// Calculate total amount of bill
$TotalShoppingPrice = 0;
if	(isset($_SESSION['Qtty1'])) {$TotalShoppingPrice=$TotalShoppingPrice+($_SESSION['Qtty1'] * 20000);}
if	(isset($_SESSION['Qtty2'])) {$TotalShoppingPrice=$TotalShoppingPrice+($_SESSION['Qtty2'] * 0.49);}
if	(isset($_SESSION['Qtty3'])) {$TotalShoppingPrice=$TotalShoppingPrice+($_SESSION['Qtty3'] * 49.99);}
if	(isset($_SESSION['Qtty4'])) {$TotalShoppingPrice=$TotalShoppingPrice+($_SESSION['Qtty4'] * 299.99);}
if	(isset($_SESSION['Qtty5'])) {$TotalShoppingPrice=$TotalShoppingPrice+($_SESSION['Qtty5'] * 14.99);}
if	(isset($_SESSION['Qtty6'])) {$TotalShoppingPrice=$TotalShoppingPrice+($_SESSION['Qtty6'] * 49.99);}
if	(isset($_SESSION['Qtty7'])) {$TotalShoppingPrice=$TotalShoppingPrice+($_SESSION['Qtty7'] * 6.66);}
if	(isset($_SESSION['Qtty8'])) {$TotalShoppingPrice=$TotalShoppingPrice+($_SESSION['Qtty8'] * 2.99);}
echo "<br><b>Total Price: ".$TotalShoppingPrice." $</b>";
						
echo '<br><br><a href="shop.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'">Continue shopping</a><br>';
echo '<a href="checkout.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'&checkout='.time().'">Checkout</a>';

echo "</div>";

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>