<script language="JavaScript">
	function LogoutAdmin() {
		// JavaScript function to logout user_error
		
		// Send AJAX Request to adminlogout.php to kill all session variables
		
		// End this function to follow html link towards index.php
	}
	
	function SurfTo(URL) {
		window.location.href = URL;
	}
	
	function CloseAssessment(URL) {
		var ConfirmMessage = confirm("CloseAssessment() - Function not yet implemented!");
		if (ConfirmMessage == true) {
			//
		}
	}
	
	function CreateNewAssessment(URL){
		var ConfirmMessage = confirm("CreateNewAssessment() - Function not yet implemented!");
		if (ConfirmMessage == true) {
			//
		}
	}
</script>

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
		echo '<h2>List of assessment tokens</h2>';
		$sql="SELECT * FROM `asslist` ORDER BY asslist.id DESC";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo '<div id="" style="position:relative;border:1px;background-color:#EEE99F;">';
					echo '<div id="QuestionBoxSubmitBtn" style="position:absolute;top:35px;width:160px;right:25px;height:80px;border:1px solid;text-align:center;font-size:12px;background-color:#DDDDDD;" >';
						echo '<b>Milestones</b><br><br>';
						$AssignToStartT = (strtotime($row["StartTime"]) - strtotime($row["AssignTime"]))/60;
						$StartToFinishT = (strtotime($row["FinishedTime"]) - strtotime($row["StartTime"]))/60;
						
						echo '<div id="" style="margin-left:5px;float:left">Candidate started: </div>';
							if (($row["MaxAttendTime"]-$AssignToStartT) >= 0 && ($row["Status"] == "In Progress" || $row["Status"] == "Finished" || $row["Status"] == "Closed") && $row["StartTime"] != "0000-00-00 00:00:00") {
								echo '<div id="" sytle="" ><font color="#33cc33"><b>Passed</b></font></div>';
							} else if( ($row["MaxAttendTime"]-$AssignToStartT) >= 0 && $row["Status"] == "Assigned") {
								echo '<div id="" sytle="" ><font color="orange">Pending</font></div>';
							} else {
								echo '<div id="" sytle="" ><font color="red">Fail</font></div>';
							}
						echo '<div id="" style="margin-left:5px;float:left">Candidate finished: </div>';
							if (($row["MaxQuestionnaireTime"]-$StartToFinishT) >= 0 && ($row["Status"] == "Finished" || $row["Status"] == "Closed")) {
								echo '<div id="" sytle="" ><font color="#33cc33"><b>Passed</b></font></div>';
							} else {
								echo '<div id="" sytle="" ><font color="red">Fail</font></div>';
							}
						echo '<div id="" style="margin-left:5px;float:left">Result published: </div>';
							if (1==2) {
								echo '<div id="" sytle="" ><font color="#33cc33"><b>Passed</b></font></div>';
							} else {
								echo '<div id="" sytle="" ><font color="red">Fail</font></div>';
							}
					echo '</div>';
					
					// Definition of menu buttons for each assessment in List/Database
					if ($row["Status"]=="Closed") {
						$URL = "adminreview.php?ReviewToken=".$row["Token"];
						echo "<div id='QuestionBoxSubmitBtn' style='position:absolute;top:5px;width:70px;right:5px;height:14px;border:1px solid;text-align:center;font-size:12px;background-color:#c6e2ff;' onClick=\"SurfTo('".$URL."');\">View Details</div>";
					} else if ($row["Status"]=="Finished") {
						$URL = "adminreview.php?ReviewToken=".$row["Token"];
						echo "<div id='QuestionBoxSubmitBtn' style='position:absolute;top:5px;width:70px;right:5px;height:14px;border:1px solid;text-align:center;font-size:12px;background-color:#c6e2ff;' onClick=\"SurfTo('".$URL."');\">Review</div>";
						$URL = "admin.php?ReviewToken=".$row["Token"];
						echo "<div id='QuestionBoxSubmitBtn' style='position:absolute;top:5px;width:70px;right:80px;height:14px;border:1px solid;text-align:center;font-size:12px;background-color:#c6e2ff;' onClick=\"CloseAssessment('".$URL."');\">Close</div>";
					} else if ($row["Status"]=="Assigned") {
						$URL = "adminreview.php?ReviewToken=".$row["Token"];
						echo "<div id='QuestionBoxSubmitBtn' style='position:absolute;top:5px;width:70px;right:5px;height:14px;border:1px solid;text-align:center;font-size:12px;background-color:#c6e2ff;' onClick=\"SurfTo('".$URL."');\">Reminder</div>";
					} else if ($row["Status"]=="In Progress") {
						$URL = "adminreview.php?ReviewToken=".$row["Token"];
						echo "<div id='QuestionBoxSubmitBtn' style='position:absolute;top:5px;width:70px;right:5px;height:14px;border:1px solid;text-align:center;font-size:12px;background-color:#c6e2ff;' onClick=\"SurfTo('".$URL."');\">Prolong</div>";
						$URL = "admin.php?ReviewToken=".$row["Token"];
						echo "<div id='QuestionBoxSubmitBtn' style='position:absolute;top:5px;width:70px;right:80px;height:14px;border:1px solid;text-align:center;font-size:12px;background-color:#c6e2ff;' onClick=\"CloseAssessment('".$URL."');\">Close</div>";
					} else {
						die ("Error 101: Trying to add menu buttons to an assessment in list but not able to detect 'Status' from database: ".$row["Status"]);
					}
					
					// Definition of information/data along each assessment in List/Database
					echo '<div><b>Status: </b>'.$row["Status"].' <b>Questions: </b>'.$row["QuestionCount"].' <b>Token: </b>'.$row["Token"].'</div><br>';
					echo '<div><b>Assigned by: </b>'.$row["AssignedBy"].' ('.$row["AssignedByMail"].')</div>';
					echo '<div><b>Assigned to: </b>'.$row["AssignedTo"].' ('.$row["AssignedToMail"].')</div><br>';
					echo '<div><b>AssignTime: </b>'.$row["AssignTime"].' <b>StartTime: </b>'.$row["StartTime"].' <b>FinishedTime: </b>'.$row["FinishedTime"].'</div>';
					echo '<div>';
						echo '<b>Assignment to Start (in Minutes): </b>'.$AssignToStartT;
						echo ' (max. '.$row["MaxAttendTime"].')';
						echo ' <b>Start to Finish (in minutes): </b>'.$StartToFinishT;
						echo ' (max '.$row["MaxQuestionnaireTime"].')';
					echo '</div>';
					
					
					
				echo '</div><br>';
			}
		}
		echo "<div id='QuestionBoxSubmitBtn' style='width:150px;height:20px;border:1px solid;text-align:center;font-size:16px;background-color:#c6e2ff;' onClick=\"CreateNewAssessment('".$URL."');\">Create new assessment</div>";
		echo '<br></div><br>';
		
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
echo '<a href="index.php" onClick="LogoutAdmin();">Go back to candidate token login</a>';
mysqli_close($conn);

echo '</div>';

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>