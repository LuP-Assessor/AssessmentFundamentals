<?php
session_start();
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php

/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea Div_deactive" style="top:120px;">';

$servername = "localhost";
$username = "Lattesat";
$password = "Lattesat2018";
$dbname = "assessment";

// Create connection to MQSQLC
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection to MQSQLC
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check for assigned questions that are not answered yet
$sql = "UPDATE asslist SET Status = 'Finished' , FinishedTime = '".date("Y-m-d H:i:s")."' WHERE `asslist`.`Token` LIKE '".$_GET['Token']."';";
$result = $conn->query($sql);
mysqli_close($conn);

echo "FINISHED";

echo '</div>';

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>