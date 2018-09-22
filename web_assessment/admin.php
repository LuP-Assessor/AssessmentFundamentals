<?php
session_start();

echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php

//whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
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


/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea Div_deactive" style="top:120px;">';
echo '<p>Welcome to ALP Assessment Administration Panel</p>';

if (isset($_POST["UName"]) && isset($_POST["UPass"])) {
	if ($_POST["UName"] == "Admin" && $_POST["UPass"] == "Lattesat2018") {
		echo '<p>Thx for valid authentication!<p>';
		$_SESSION["AdminValidation"] = "VALID";
		$sql="INSERT INTO `reviewerlogins` (`Name`, `IP`) VALUES ('".$_POST["UName"]."', '".$ip_address."');";
		$result = $conn->query($sql);
	} else {
		echo '<p>Authentication failed!<p>';
	}
	
} 

if (isset($_SESSION["AdminValidation"])) {
	if ($_SESSION["AdminValidation"] == "VALID") {
		echo '<p>Welcome reviewer!<p>';
		
		echo '<div style="border:1px;background-color: #FFF9AF;">';
		echo '<h2>Last 10 admin logins</h2><br>';
		$sql="SELECT * FROM `reviewerlogins` ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo $row["Time"].' - '.$row["Name"].' - '.$row["IP"].'<br>';
			}
		}
		echo '</div><br>';
		
		echo '<div style="border:1px;background-color: #FFF9AF;">';
		echo '<h2>List of assessment tokens</h2><br>';
		$sql="SELECT * FROM `asslist` ";
		$result = $conn->query($sql);
		echo '<table>';
		echo '<tr>';
		echo '<td><b>Assigned by</b></td>';
		echo '<td><b>Assigned by mail</b></td>';
		echo '<td><b>Assigned to</b></td>';
		echo '<td><b>Assigned to mail</b></td>';
		echo '<td><b>StartTime</b></td>';
		echo '<td><b>FinishedTime</b></td>';
		echo '<td><b>Status</b></td>';
		echo '<td><b>Token</b></td>';
		echo '<td><b>Questions</b></td>';
		echo '</tr>';
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo '<td>'.$row["AssignedBy"].'</td>';
				echo '<td>'.$row["AssignedByMail"].'</td>';
				echo '<td>'.$row["AssignedTo"].'</td>';
				echo '<td>'.$row["AssignedToMail"].'</td>';
				echo '<td>'.$row["StartTime"].'</td>';
				echo '<td>'.$row["FinishedTime"].'</td>';
				echo '<td>'.$row["Status"].'</td>';
				echo '<td>'.$row["Token"].'</td>';
				echo '<td>'.$row["QuestionCount"].'</td>';
				echo '<td><a href="">Review</a></td>';
				echo '</tr>';
			}
		}
		echo '</table>';
		echo '<br><a href="">Create new assessment</a>';
		echo '</div><br>';
		
		echo '<div style="border:1px;background-color: #FFF9AF;">';
		echo '<h2>Questions</h2><br>';
		$sql="SELECT * FROM `questions` ";
		$result = $conn->query($sql);
		echo '<table>';
		echo '<tr>';
		echo '<td><b>id</b></td>';
		echo '<td><b>Question</b></td>';
		echo '<td><b>CreatedBy</b></td>';
		echo '<td><b>CreatedDate</b></td>';
		echo '</tr>';
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo '<td>'.$row["id"].'</td>';
				echo '<td>'.$row["Question"].'</td>';
				echo '<td>'.$row["CreatedBy"].'</td>';
				echo '<td>'.$row["CreatedDate"].'</td>';
				echo '<td><a href="">Edit</a></td>';
				echo '</tr>';
			}
		}
		echo '</table>';
		echo '<br><a href="">Create new question</a>';
		echo '</div><br>';
		
	} else {
	echo '<p>You are NOT authenticated as reviewer!<p>';
	echo '<form action="admin.php" method="POST">';
	echo '<label for="UName">Username </label>';
	echo '<input type="text" name="UName"><br>';
	echo '<label for="UPass">Password </label>';
	echo '<input type="text" name="UPass"><br>';
	echo '<input type="submit" value="Login">';
		echo '</form><br>';
	}
} else {
	echo '<p>You are NOT authenticated as reviewer!<p>';
	echo '<form action="admin.php" method="POST">';
	echo '<label for="UName">Username </label>';
	echo '<input type="text" name="UName"><br>';
	echo '<label for="UPass">Password </label>';
	echo '<input type="text" name="UPass"><br>';
	echo '<input type="submit" value="Login">';
		echo '</form><br>';
	}
echo '<a href="index.php">Go back to candidate token login</a>';
mysqli_close($conn);

echo '</div>';

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>