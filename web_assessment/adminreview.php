<script language="JavaScript">
	function SubmitReview(AssToken) {
		var PPoints=0;

		for (var i =0; i<=100; i++) {
			if (document.getElementById("demo_"+i)) {
				PPoints = PPoints + parseInt(document.getElementById("demo_"+i).innerHTML);
			}
		}

		var ConfirmMessage = confirm("Do you really want to submit review results?");
		if (ConfirmMessage == true) {
			window.location.href = "adminreview.php?ReviewToken=" + AssToken+ "&PPoints="+ PPoints;
		}
	}
	function CancelToAdmin() {
		var ConfirmMessage = confirm("Do you really want to quit to admin area without saving review results?");
		if (ConfirmMessage == true) {
			window.location.href = "admin.php";
		}
	}
	function CancelToLogin() {
		var ConfirmMessage = confirm("Do you really want to quit to assessment login without saving review results?");
		if (ConfirmMessage == true) {
			window.location.href = "index.php";
		}
	}
</script>
<?php
session_start();
?>
<style>
.slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 99%;
    height: 30px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}
</style>
<?php
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

/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea Div_deactive" style="top:120px;">';
echo '<p>Welcome to ALP Assessment Administration Panel</p>';


if ($_SESSION["AdminValidation"] != "VALID") {

	echo '<H1>Authentication error</h1>';
	echo '<a href="index.php">Go back to candidate token login</a>';
	echo '</div>';

	/*------------- Page Footer ----------------*/
	include '../web_templates/template_footer.php';
	die();
} else {

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo '<p>Assessment Review for Token: '.$_GET['ReviewToken']."</p><br>\n";
	
	$sql = "SELECT *, answers.id AS IDD FROM answers INNER JOIN questions ON answers.QuestionID = questions.id WHERE Token like '".$_GET['ReviewToken']."' ";

	$result = $conn->query($sql);
	$answercount=1;
	$intPos = 0;
	
	if ($result->num_rows > 0) {
		// We found assigned questions that are still not answered by candidate
		while($row = $result->fetch_assoc()) {
			echo "<div style='position:relative'>";
				echo "<div style='position:absolute; left:1%; width:10%; top:".$intPos."px; height:50px;'><b>Question: </b></div><div style='position:absolute; right:1%; width:85%; top:".$intPos."px; border:2px solid; height:50px;'>".$row["Question"]."</div>\n";
				$intPos = $intPos + 60;
				echo "<div style='position:absolute; left:1%; width:10%; top:".$intPos."px; height:50px;'><b>Answer:   </b></div>";
				echo "<div style='position:absolute; right:1%; width:85%; top:".$intPos."px; border:2px solid; height:50px;'>".$row["Answer"]."</div>\n";
				$intPos = $intPos + 60;
				if ($row["EditAnswer"]!="") {
					echo "<div style='position:absolute; left:1%; width:10%; top:".$intPos."px; height:50px;'><b>EditAnswer: </b></div>\n";
					echo "<div style='position:absolute; right:7%; width:79%; top:".$intPos."px; border:2px solid; height:50px;'>".$row["EditAnswer"]."</div>\n";
					echo "<div style='position:absolute; right:1%; width:5%; top:".$intPos."px; border:2px solid; height:24px;'>Edits</div>\n";
					$intPos = $intPos + 26;
					echo "<div style='position:absolute; right:1%; width:5%; top:".$intPos."px; border:2px solid; height:24px;'>????</div>\n";
					$intPos = $intPos + 32;
				}
				if ($row["CorrAnswer"]!="") {
					echo "<div style='position:absolute; left:1%; width:10%; top:".$intPos."px; height:50px;'><b>Suggested Answer: </b></div>";
					echo "<div style='position:absolute; right:1%; width:85%; top:".$intPos."px; border:2px solid; height:50px;'>".$row["CorrAnswer"]."</div>\n";
					$intPos = $intPos + 60;
				}
				echo "<div  style='position:absolute; left:0px; right:0px; top:".$intPos."px; ' >";
					echo "<div style='position:absolute; left:1%; width:10%; height:30px;'><b>Your rating:</b></div>";
					echo "<div style='position:absolute; right:7%; width:79%; border:2px solid; height:30px;'>";
						echo '<input class="slider" type="range" min="1" max="100" value="50" style="position:absolute;right:0px;left:0px;" id="myRange_'.$answercount.'" >';
					echo "</div>\n";
					echo "<div style='position:absolute; right:1%; width:5%; border:2px solid; height:14px;'>Value</div>\n";
					$intPos = $intPos + 15;
					echo "<div id='demo_".$answercount."' style='position:absolute; right:1%; width:5%; top:14px; border:2px solid; height:14px;'>".$answercount."</div>\n";
				echo "</div>\n";
				
				echo "<script>\n";
					echo 'document.getElementById("demo_'.$answercount.'").innerHTML = document.getElementById("myRange_'.$answercount.'").value;'."\n";
					echo 'document.getElementById("myRange_'.$answercount.'").oninput = function() {'."\n";
					echo 'document.getElementById("demo_'.$answercount.'").innerHTML = this.value;'."\n";
					echo '}'."\n";
				echo "</script>\n";
			echo "</div>";
			$answercount = $answercount + 1; 
			$intPos = $intPos +70;
		}
	}
	
	$intPos = $intPos +100;
	echo "<div style='position:absolute; text-align:center;top:".$intPos."px; border:1px solid;width:30%;background-color:#c6e2ff; left:1%;' onClick=\"SubmitReview('".$_GET['ReviewToken']."')\"><h2>Final submit review results</h2>";
	echo "</div>";
	echo "<div style='position:absolute; text-align:center;top:".$intPos."px; border:1px solid;width:30%;background-color:#c6e2ff; left:35%;' onClick=\"CancelToAdmin('".$_GET['ReviewToken']."')\"><h2>Go back to admin overview</h2>";
	echo "</div>";
	echo "<div style='position:absolute; text-align:center;top:".$intPos."px; border:1px solid;width:30%;background-color:#c6e2ff; right:1%;' onClick=\"CancelToLogin('".$_GET['ReviewToken']."')\"><h2>Go back to candidate token login</h2>";
	echo "</div>";
	
	mysqli_close($conn);

	echo '</div>';

	/*------------- Page Footer ----------------*/
	include '../web_templates/template_footer.php';
}
?>