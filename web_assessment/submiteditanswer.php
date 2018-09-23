<?php
session_start();
if (isset($_SESSION["Token"])) {
	$AssToken = $_SESSION["Token"];
} else {
	die("Session not valid! Please restart assessment");
}

if (isset($_POST["newAnswer"])) {
	$newAnswer = $_POST["newAnswer"];
} else {
	die("No Answer send!");
}

if (isset($_POST["AnswerID"])) {
	$AnswerID = $_POST["AnswerID"];
} else {
	die("No AnswerID send!");
}

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

$sql="UPDATE answers SET `EditDate` = '".date("Y-m-d H:i:s")."', EditAnswer = '".$newAnswer."' WHERE id = ".$AnswerID;

echo $sql;
$result = $conn->query($sql);

?>