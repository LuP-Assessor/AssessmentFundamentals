<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS
include '../web_templates/template_genUUID.php';			// Include function gen_uuid from ../web_templates/template_genUUID.php
include '../web_templates/template_getClientIP.php';		// Include function getClientIP from ../web_templates/template_getClientIP.php
session_start();											// Start PHP Session handler (works by cookie, fully handeled by PHP) - We can use $_SESSION from now on

$file = '../log_example/access_example44_'.date("Y-m-d").'.log';	// Define Logfile location
$ip = getClientIP();										// Detect Client IP for writing into log later
$sessionKey = rand(111111,999999);							// Initial creation of a 'sessionKey'. Client will need to send this along all further requests to continue/identify his session.
$_SESSION["sessionKey"]=$sessionKey;						// Storing this sessionKey inside a serverside PHP session variable with name sessionKey
$ClientBrowser = $_SERVER['HTTP_USER_AGENT'];
$ErrorMessage = "";											// Containing detected error message. If value="", no error occured.

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Checking all resquest mistakes between client and example 4 index.php:

// Check for wrong HPPT Request type (This page have to be requested by GET Method)
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $ErrorMessage = "ERROR (0.001) Request for index.php with wrong HTML Method: '".$_SERVER['REQUEST_METHOD']."', should be 'GET', ClientBrowser: ".$ClientBrowser;
}

// If no error was found in previous checks -> Write Successfull Message to Log
if ($ErrorMessage=="") {
	$SuccessMessage = date("Y-m-d H:i:s")." ".$ip." Request for          index.php Successfull - 'sessionKey'='".$sessionKey."', 'ClientBrowser'='".$ClientBrowser."'";
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
	echo "<h1>LuP-Test example 44 Webshop</h1>";
	echo "<b>Pre Runtime settings:</b><br>
			* Create a new VuGen Project with name 'Example44_{YourName}_Exercise1'. Please replace {YourName} by the first 6 letters of your name.<br>
			* There is more than one VuGen protocol available, that is theoretically able to fulfill the recommendations, described in further exercises of this example. Please start your script with a comment about which protocol you decided, why you choose the protocol, and why you did not use any other protocol.<br>
			* Go to VuGen runtime settings and make sure that VuGen will use the following browser identification string within ALL requests of this project: 'VuGen_{YourName}'. Replace {YourName} by the first 6 letters of your name.<br>
		  <br>
		  <b>Exercise 1:</b><br>
		    * Write a VuGen script that simulates the following usecase:<br>
			Step1: Enter/Launch Base URL(Entry Point)<br>
			Step2: Click the Link Go Shopping<br>
			Step3: Enter the Qtty 5 for article '1 pound of Coffee...' and click on 'Buy' button.<br>
			Step4: After buying Coffee from the list, user should checkout from the application.<br>
			Note: when User checkout from the application he/she should be able to access the link 'Start a new Shopping tour' with the message: “If you read this, you completed the entire usecase process, last request was 'checkout.php'.<br>
			Great! You finished this example.”<br>
		  <br>
		  <b>Post Scripting:</b><br>
			1. Use proper validation to verify the presence of text string and image on a page during run time and also mention the reason of response validation in LoadRunner under comment.<br>
			2. Define useful delay between steps.<br>
			3. Correlate dynamic vaues when required.<br>
			4. Define transactions to measure the performance of the server.<br>
			5. Use Error Handling Functions and also specify how Vusers handles errors during script execution under comment.<br>
          <br>
		  <b>Exercise 2</b><br>
		    Write a new VuGen project with name 'Example44_{YourName}_Exercise2' that simulates the following usecase. Please replace {YourName} by the first 6 letters of your name.<br>
			Step1: Enter/Launch Base URL(Entry Point)<br>
			Step2: Click the Link Go Shopping<br>
			Step3: Enter random Qtty (any digit between 1 - 999) of randomly selected article and click on the Buy button behind selected article.<br>
			Step4: After buying first article from the list user should continue shopping for two more times. Note that you should be able to see a message like 'You succeed to put objects into your shopping cart'.<br>
			Step5: Checkout your shopping cart.<br>
			Note: When User checkout from the application he/she should be able to access the link 'Start a new Shopping tour' followed with the message: “If you read this, you completed the entire usecase process, last request was 'checkout.php'. Great! You finished this example.”<br>
		  <br>
		  <b>Post Scripting:</b><br>
			1. Determine if a Vuser reaches a certain point during script execution.<br>
			2. Use the statement to manipulate the date time stamp.<br>
			3. Describe how do you debug a LoadRunner script under comment.<br>
			4. Write total price of your purchase into Vugen log.<br><br>";

	echo "<a href='sessionhandler.php?type=new&sessionKey=".$sessionKey."'>Go shopping</a><br>";

echo "</div>";

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>