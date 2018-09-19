<?php
session_start();
if (isset($_SESSION["Token"])) {
	$AssToken = $_SESSION["Token"];
} else {
	die("Session not valid! Please restart assessment");
}

if (isset($_POST["Answer"])) {
	$AnswerText = $_POST["Answer"];
} else {
	die("No Answer send!");
}

if (isset($_POST["AnswerID"])) {
	$AnswerId = $_POST["AnswerID"];
} else {
	die("No AnswerID send!");
}

$servername = "localhost";
$username = "Lattesat";
$password = "Lattesat2018";
$dbname = "assessment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="UPDATE answers SET `SubmitDate` = '".date("Y-m-d H:i:s")."', Answer = '".$AnswerText."' WHERE id = ".$AnswerId;
//echo $sql;
$result = $conn->query($sql);

echo "Your Answer was saves successfully";

header('Location: questionaire.php');
?>