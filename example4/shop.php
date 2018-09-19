<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS
include '../web_templates/template_genUUID.php';				// Include function gen_uuid from ../web_templates/template_genUUID.php
include '../web_templates/template_getClientIP.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php
session_start();											// Start PHP Session handler (works by cookie, fully handeled by PHP) - We can use $_SESSION from now on

$file = '../log_example/access_example4_'.date("Y-m-d").'.log';	// Define Logfile location
$ip = getClientIP();										// Detect Client IP for writing into log later
$ClientBrowser = $_SERVER['HTTP_USER_AGENT'];
$ErrorMessage = "";											// Containing detected error message. If value="", no error occured.
$hiddenID1 = gen_uuid(); 
$hiddenID2 = gen_uuid(); 
$hiddenID3 = gen_uuid(); 
$hiddenID4 = gen_uuid(); 
$hiddenID5 = gen_uuid(); 
$hiddenID6 = gen_uuid(); 
$hiddenID7 = gen_uuid(); 
$hiddenID8 = gen_uuid(); 
$_SESSION["hiddenID1"] = $hiddenID1;
$_SESSION["hiddenID2"] = $hiddenID2;
$_SESSION["hiddenID3"] = $hiddenID3;
$_SESSION["hiddenID4"] = $hiddenID4;
$_SESSION["hiddenID5"] = $hiddenID5;
$_SESSION["hiddenID6"] = $hiddenID6;
$_SESSION["hiddenID7"] = $hiddenID7;
$_SESSION["hiddenID8"] = $hiddenID8;
$NextPageID = gen_uuid();									// Generate next page id now, but apply them to Session Parameter later after all checks are done


// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Checking all resquest mistakes between client and example 4 shop.php:

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $ErrorMessage = "Request for           shop.php ERROR 2.001 - Wrong HTML Method: '".$_SERVER['REQUEST_METHOD']."', should be 'GET'";
}
else if (!isset($_GET["sessionKey"])) {
	$ErrorMessage = "Request for           shop.php ERROR 2.002 - URL Parameter 'sessionKey' not defined";
}
else if (!isset($_GET["pageID"])) {
	$ErrorMessage = "Request for           shop.php ERROR 2.003 - URL Parameter 'pageID' not defined";
}
else if (!isset($_SESSION['sessionKey'])) {
	$ErrorMessage = "Request for           shop.php ERROR 2.004 - PHP Server-Session-Parameter 'sessionKey' not defined";
}
else if (!isset($_SESSION['pageID'])) {
	$ErrorMessage = "Request for           shop.php ERROR 2.005 - PHP Server-Session-Parameter 'pageID' not defined";
}
else if ($_GET["pageID"] != $_SESSION['pageID']) {
	$ErrorMessage = "Request for           shop.php ERROR 2.006 - Mismatch between PHP Server-Session-Parameter 'pageID'='".$_SESSION['pageID']."' and URL Parameter 'pageID'='".$_GET["pageID"]."', Next valid one will be '".$NextPageID."'";
}
else if ($_GET["sessionKey"] != $_SESSION['sessionKey'] ) {
	$ErrorMessage = "Request for           shop.php ERROR 2.007 - Mismatch between PHP Server-Session-Parameter 'sessionKey'='".$_SESSION['sessionKey']."' and URL Parameter 'sessionKey'='".$_GET["sessionKey"]."'";
} 
else {	
	//If no error was found in previous checks -> Write Successfull Message to Log
	$sessionKey = $_GET["sessionKey"];
	$SuccessMessage = date("Y-m-d H:i:s")." ".$ip;
	$SuccessMessage .= " Request for           shop.php Successfull - 'sessionKey'='".$sessionKey."', 'pageID'='".$_GET["pageID"]."', Next valid 'pageID'='".$NextPageID."', 'ClientBrowser'='".$ClientBrowser."' ";
	file_put_contents($file, $SuccessMessage . PHP_EOL, FILE_APPEND | LOCK_EX);
}

//If an error was found in previous checks -> Write ERROR Message to log
if ($ErrorMessage!="") {
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
echo "You succeed in opening page 'shop.php'. Great! Go on with shopping!!!<br><br>";

// Table definition for buyable objects and services 
echo "<table>";
echo	"<tr><td><b>Picture</b></td><td><b>Product Name</b></td><td><b>Price</b></td><td><b>Qtty</b></td><td><b>Buy Button</b></td></tr>";

if (!isset($_SESSION['Qtty1'])) {$Qtty1=0;} else {$Qtty1=$_SESSION['Qtty1'];}
echo 	'<tr>';
echo 		'<form action="cart.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'" method="post">';
echo 		'<td>TBD</td>';
echo 		'<td>LuP Basis Package</td>';
echo 		'<td>200000 $</td>';
echo 		'<td><input type="text" name="ctl_field27ID'.$hiddenID1.'" value="'.$Qtty1.'"></td>';
echo 		'<td>';
echo 			'<input type="hidden" name="ctl_field27ID_" value="'.$hiddenID1.'"></input>';
echo			'<input type="submit" value="Buy"></input>';
echo 		'</td>';
echo    	'</form>';
echo	'</tr>';

if (!isset($_SESSION['Qtty2'])) {$Qtty2=0;} else {$Qtty2=$_SESSION['Qtty2'];}
echo 	'<tr>';
echo 		'<form action="cart.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'" method="post">';
echo 		'<td>TBD</td>';
echo 		'<td>Cookies</td>';
echo		'<td>0.49 $</td>';
echo 		'<td><input type="text" name="ctl_field27ID'.$hiddenID2.'" value="'.$Qtty2.'"></td>';
echo 		'<td>';
echo 			'<input type="hidden" name="ctl_field27ID_" value="'.$hiddenID2.'"></input>';
echo			'<input type="submit" value="Buy"></input>';
echo 		'</td>';
echo    	'</form>';
echo 	'</tr>';

if (!isset($_SESSION['Qtty3'])) {$Qtty3=0;} else {$Qtty3=$_SESSION['Qtty3'];}
echo 	'<tr>';
echo 		'<form action="cart.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'" method="post">';
echo 		'<td>TBD</td>';
echo 		'<td>Loadgenerator (1 Device, one Day, full managed) rent</td>';
echo		'<td>49.99 $</td>';
echo 		'<td><input type="text" name="ctl_field27ID'.$hiddenID3.'" value="'.$Qtty3.'"></td>';
echo 		'<td>';
echo 			'<input type="hidden" name="ctl_field27ID_" value="'.$hiddenID3.'"></input>';
echo			'<input type="submit" value="Buy"></input>';
echo 		'</td>';
echo    	'</form>';
echo	'</tr>';

if (!isset($_SESSION['Qtty4'])) {$Qtty4=0;} else {$Qtty4=$_SESSION['Qtty4'];}
echo 	'<tr>';
echo 		'<form action="cart.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'" method="post">';
echo 		'<td>TBD</td>';
echo 		'<td>Loadgenerator (10 Device, one Day, full managed) rent</td>';
echo 		'<td>299,99 $</td>';
echo 		'<td><input type="text" name="ctl_field27ID'.$hiddenID4.'" value="'.$Qtty4.'"></td>';
echo 		'<td>';
echo 			'<input type="hidden" name="ctl_field27ID_" value="'.$hiddenID4.'"></input>';
echo			'<input type="submit" value="Buy"></input>';
echo 		'</td>';
echo    	'</form>';
echo	'</tr>';

if (!isset($_SESSION['Qtty5'])) {$Qtty5=0;} else {$Qtty5=$_SESSION['Qtty5'];}
echo 	'<tr>';
echo 		'<form action="cart.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'" method="post">';
echo 		'<td>TBD</td>';
echo 		'<td>Loadgenerator (1 Device, one Day, unmanaged) rent</td>';
echo 		'<td>14,99 $</td>';
echo 		'<td><input type="text" name="ctl_field27ID'.$hiddenID5.'" value="'.$Qtty5.'"></td>';
echo 		'<td>';
echo 			'<input type="hidden" name="ctl_field27ID_" value="'.$hiddenID5.'"></input>';
echo			'<input type="submit" value="Buy"></input>';
echo 		'</td>';
echo    	'</form>';
echo	'</tr>';

if (!isset($_SESSION['Qtty6'])) {$Qtty6=0;} else {$Qtty6=$_SESSION['Qtty6'];}
echo 	'<tr>';
echo 		'<form action="cart.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'" method="post">';
echo 		'<td>TBD</td>';
echo 		'<td>Loadgenerator (10 Device, one Day, unmanaged) rent</td>';
echo 		'<td>49,99 $</td>';
echo 		'<td><input type="text" name="ctl_field27ID'.$hiddenID6.'" value="'.$Qtty6.'"></td>';
echo 		'<td>';
echo 			'<input type="hidden" name="ctl_field27ID_" value="'.$hiddenID6.'"></input>';
echo			'<input type="submit" value="Buy"></input>';
echo 		'</td>';
echo    	'</form>';
echo	'</tr>';

if (!isset($_SESSION['Qtty7'])) {$Qtty7=0;} else {$Qtty7=$_SESSION['Qtty7'];}
echo 	'<tr>';
echo 		'<form action="cart.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'" method="post">';
echo 		'<td>TBD</td>';
echo 		'<td>1 pound of Coffee (to survive long coding nights)</td>';
echo 		'<td>6,66 $</td>';
echo 		'<td><input type="text" name="ctl_field27ID'.$hiddenID7.'" value="'.$Qtty7.'"></td>';
echo 		'<td>';
echo 			'<input type="hidden" name="ctl_field27ID_" value="'.$hiddenID7.'"></input>';
echo			'<input type="submit" value="Buy"></input>';
echo 		'</td>';
echo    	'</form>';
echo	'</tr>';

if (!isset($_SESSION['Qtty8'])) {$Qtty8=0;} else {$Qtty8=$_SESSION['Qtty8'];}
echo 	'<tr>';
echo 		'<form action="cart.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'" method="post">';
echo 		'<td>TBD</td>';
echo 		'<td>1 Can Energy Dring (for advanced Users Only)</td>';
echo 		'<td>2,99 $</td>';
echo 		'<td><input type="text" name="ctl_field27ID'.$hiddenID8.'" value="'.$Qtty8.'"></td>';
echo 		'<td>';
echo 			'<input type="hidden" name="ctl_field27ID_" value="'.$hiddenID8.'"></input>';
echo			'<input type="submit" value="Buy"></input>';
echo 		'</td>';
echo    	'</form>';
echo	'</tr>';

echo "</table>";

echo "</div>";

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>