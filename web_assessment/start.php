<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php

/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea Div_deactive" style="top:120px;">';

// Check if this "AssToken" is available and in "Assigned" or "In Progress"
if (isset($_POST["asstoken"])) {
	$AssToken = $_POST["asstoken"];
} else {
	die("This page can't be requested without valid token");
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
$sql = "SELECT * from asslist WHERE Token like '".$AssToken."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$AssStart = date("Y-m-d H:i:s");
		$AssMaxEnd = date("Y-m-d H:i:s",(time() + (8 * 60 * 60)));
		$AssStatus = $row["Status"];
		$AssignedBy = $row["AssignedBy"];
		$AssignedByMail = $row["AssignedByMail"];
		$AssignedTo = $row["AssignedTo"];
		$AssignedToMail = $row["AssignedToMail"];
		$QuestionCount = $row["QuestionCount"];
    }
} else {
    die ("Invalid Token");
}

echo '<p><b>Hello Candidate,<br>Please check the following assessment data and report to responsible if anything is not correct.</b></p><br>';
echo '<b>Assessment token: </b>'.$AssToken.'<br>';
echo '<b>Assigned by </b>'.$AssignedBy.' ('.$AssignedByMail.')<br>';
echo '<b>Assigned to </b>'.$AssignedTo.' ('.$AssignedToMail.')<br>';
echo '<b>Start time: </b>'.$AssStart.' (local server time)<br>';
echo '<b>Assessment max end time: </b>'.$AssMaxEnd.' (local server time)<br>';
echo '<b>Count of assigned questions: </b>'.$QuestionCount.'<br>';

if ($AssStatus=="Assigned") {
	$QList[0] = 0;
	// Get count of available questions
	$result = mysql_query("SELECT * FROM questions", $conn);
	$AVQCount = mysql_num_rows($result);
	// Create list of random questions
	for ($QuestionNr=1; $QuestionNr <= $QuestionCount; $QuestionNr++) {
		do {
			$randQuestionID = rand(1,$AVQCount);
		} while (in_array($randQuestionID,$QList));
		$QList[$QuestionNr] = $randQuestionID;
		$sql = "INSERT INTO `answers` (`Token`, `QuestionID`) VALUES ('".$AssToken."', '".$QList[$QuestionNr]."');";
		$result = $conn->query($sql);
	}
	// Store start Date and set Assessment to "In Progress"
	echo '<b>Assessment status: </b>'.$AssStatus.' -> Set to "In Progress" now</p><br>';
	$sql="UPDATE asslist SET StartTime = '".$AssStart."', MaxEndTime = '".$AssMaxEnd."', Status = 'In Progress' WHERE Token like '".$AssToken."';";
	$result = $conn->query($sql);
	echo '<a href="questionaire.php">Start questionnaire from the beginning</a>';
} else if ($AssStatus=="In Progress") {
	echo '<b>Assessment status: </b>'.$AssStatus.'</p><br>';
	echo '<a href="questionaire.php">Continue already startet questionnaire</a>';
} else if ($AssStatus=="Finished") {
	echo '<br>This assessment is already finished and waiting for review. You will be informed once review is finished.';
} else {
	echo '<br>';
	die ("Assessment status (".$AssStatus.") unrecognized! Please contact responsible");
}

mysqli_close($conn);

session_start();
$_SESSION['Token'] = $AssToken;
$_SESSION['QuestionCount'] = $QuestionCount;

echo '</div>';

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>