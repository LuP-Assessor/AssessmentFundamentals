<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS
include '../web_templates/template_genUUID.php';			// Include function gen_uuid from ../web_templates/template_genUUID.php
include '../web_templates/template_getClientIP.php';		// Include function getClientIP from ../web_templates/template_getClientIP.php
session_start();											// Start PHP Session handler (works by cookie, fully handeled by PHP) - We can use $_SESSION from now on

$file = '../log_example/access_example444_'.date("Y-m-d").'.log';	// Define Logfile location
$ip = getClientIP();										// Detect Client IP for writing into log later
$ClientBrowser = $_SERVER['HTTP_USER_AGENT'];
$ErrorMessage = "";											// Containing detected error message. If value="", no error occured.
$ThisName = "register.php";
?>

<script>
// This function sends an AJAX request to splashloader.php
function showHint() {
	str="a";
    if (str.length == 0) { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Do Nothing! This is a fire and forget message!
            }
        };
        xmlhttp.open("GET", "splashloader.php?pval=getApproval" , true);
        xmlhttp.send();
    }
}
</script>

<?php
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Checking all resquest mistakes between client and this php page

// Check for wrong HPPT Request type (This page have to be requested by POST Method)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $ErrorMessage = "ERROR (1.001) Request for ".$ThisName." with wrong HTML Method: '".$_SERVER['REQUEST_METHOD']."', should be 'POST'";
}
if (!isset($_POST['cars'])) {
	$ErrorMessage = "ERROR (1.002) Request for ".$ThisName." without GET(url) Parameter 'type'";
	if ($_POST['cars'] == "") {
		$ErrorMessage = "ERROR (1.003) Request for ".$ThisName." with GET(url) Parameter 'type', wrong value given '".$_GET['type']."', should be always 'new'";
	}
}
if (!isset($_POST['payment'])) {
	$ErrorMessage = "ERROR (1.004) Request for ".$ThisName."p without GET(url) Parameter 'type'";
	if ($_POST['payment'] == "") {
		$ErrorMessage = "ERROR (1.005) Request for ".$ThisName." with GET(url) Parameter 'type', wrong value given '".$_GET['type']."', should be always 'new'";
	}
}
if (!isset($_POST['usertype'])) {
	$ErrorMessage = "ERROR (1.006) Request for ".$ThisName." without GET(url) Parameter 'type'";
	if ($_POST['usertype'] == "") {
		$ErrorMessage = "ERROR (1.007) Request for ".$ThisName." with GET(url) Parameter 'type', wrong value given '".$_GET['type']."', should be always 'new'";
	}
}
if (!isset($_POST['pval'])) {
	$ErrorMessage = "ERROR (1.008) Request for ".$ThisName." without GET(url) Parameter 'sessionKey'";
	if ($_POST['pval'] != $_SESSION["pval3"]) {
		$ErrorMessage = "ERROR (1.009) Request for ".$ThisName." with GET(url) Parameter 'sessionKey', wrong value given '".$_GET['sessionKey']."', should be '".$_SESSION["sessionKey"]."'";
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
//echo '<div id="" class="Div_DataArea Div_deactive" onmouseover="alert(w)" style="top:120px;" >';
echo '<div id="" class="Div_DataArea Div_deactive" onmouseover="showHint()" style="top:120px;" >';

	//header('Location: shop.php?sessionKey='.$sessionKey.'&pageID='.$pageID.'&purchID='.$purchID);
	echo "<h1>LuP-Test example 444 Registration Process</h1>";
	echo "<a href='finish.php?pval=".$_SESSION["pval3"]."'>Publish User</a><br>";

echo "</div>";

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>