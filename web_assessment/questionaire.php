<script language="JavaScript">
	function CheckAnswer(){
		var oldstr = document.getElementById("Answer").value;
		var newstr = oldstr.replace("'","");
		document.getElementById("Answer").value = newstr;
	}
	
	function FinalSubmit(AssToken) {
		var ConfirmMessage = confirm("Do you really want to submit answers and quit assessment?");
		if (ConfirmMessage == true) {
			window.location.href = "final.php?Token=" + AssToken;
		}
	}
	
	function EditAnswer(Question,Answer,QType,AnswerID,QuestionID,AnswerA,AnswerB,AnswerC,AnswerD,AnswerE) {
		document.getElementById("QuestionBox").style.visibility = "visible";
		if(QType=="Free") {
			document.getElementById("QuestionBoxQDiv").innerHTML = Question;
			document.getElementById("QuestionBoxADivT").style.visibility = "visible";
			//document.getElementById("QuestionBoxADivText").style.visibility = "visible";
			document.getElementById("QuestionBoxADivM").style.visibility = "hidden";
			document.getElementById("QuestionBoxADivText").value = Answer;
		} else {
			//document.getElementById("QuestionBoxADivText").value = Answer;
			document.getElementById("QuestionBoxADivT").style.visibility = "hidden";
			//document.getElementById("QuestionBoxADivText").style.visibility = "hidden";
			document.getElementById("QuestionBoxADivM").style.visibility = "visible";
			var DynHTML = "";
			if (AnswerA != "") {
				if (AnswerA==Answer) {
					DynHTML = DynHTML + '<input type="radio" name="Answer" value="' + AnswerA + '" checked>' + AnswerA + '<br>';
				} else {
					DynHTML = DynHTML+'<input type="radio" name="Answer" value="'+AnswerA+'">'+AnswerA+'<br>';
				}
			}
			if (AnswerB != "") {
				if (AnswerB==Answer) {
					DynHTML = DynHTML + '<input type="radio" name="Answer" value="' + AnswerB + '" checked>' + AnswerB + '<br>';
				} else {
					DynHTML = DynHTML+'<input type="radio" name="Answer" value="'+AnswerB+'">'+AnswerB+'<br>';
				}
			}
			if (AnswerC != "") {
				if (AnswerC==Answer) {
					DynHTML = DynHTML + '<input type="radio" name="Answer" value="' + AnswerC + '" checked>' + AnswerC + '<br>';
				} else {
					DynHTML = DynHTML+'<input type="radio" name="Answer" value="'+AnswerC+'">'+AnswerC+'<br>';
				}
			}
			if (AnswerD != "") {
				if (AnswerD==Answer) {
					DynHTML = DynHTML + '<input type="radio" name="Answer" value="' + AnswerD + '" checked>' + AnswerD + '<br>';
				} else {
					DynHTML = DynHTML+'<input type="radio" name="Answer" value="'+AnswerD+'">'+AnswerD+'<br>';
				}
			}
			if (AnswerE != "") {
				if (AnswerE==Answer) {
					DynHTML = DynHTML + '<input type="radio" name="Answer" value="' + AnswerE + '" checked>' + AnswerE + '<br>';
				} else {
					DynHTML = DynHTML+'<input type="radio" name="Answer" value="'+AnswerE+'">'+AnswerE+'<br>';
				}
			}
			document.getElementById("QuestionBoxADivM").innerHTML = DynHTML;
		}
	}
	
	function CancelEditAnswer() {
		document.getElementById("QuestionBox").style.visibility = "hidden";
		//document.getElementById("QuestionBoxADivText").style.visibility = "hidden";
		document.getElementById("QuestionBoxADivT").style.visibility = "hidden";
		document.getElementById("QuestionBoxADivM").style.visibility = "hidden";
	}
</script>

<?php
session_start();
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php

/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea Div_deactive" style="top:120px;">';

if (isset($_SESSION['Token'])) {
	$AssToken = $_SESSION['Token'];
} else {
	die("This page can't be requested without valid token");
}
?>

<div id="QuestionBox" style="visibility:hidden;position:absolute;top:5%;right:5%;left:5%;height:500px;background-color:#FFF9AF;border:3px solid;">
<div id="QuestionBoxQHeadline" style="position:absolute;top:20px;left:20px;right:20px;height:40px;border:0px solid;text-align:center;font-size:25px;padding-top:5px;">Question</div>
<div id="QuestionBoxQDiv" style="position:absolute;top:66px;left:20px;right:20px;height:140px;border:1px solid;">text inside</div>
<div id="QuestionBoxAHeadline" style="position:absolute;top:220px;left:20px;right:20px;height:40px;border:0px solid;text-align:center;font-size:25px;padding-top:5px;">Answer</div>
<div id="QuestionBoxADiv" style="position:absolute;top:266px;left:20px;right:20px;height:145px;border:1px solid;">
<div id="QuestionBoxADivT" style="border:3px solid;position:absolute;left:0px;right:0px;height:100%">
<textarea id="QuestionBoxADivText" name="Answer" style="height:100%;width:100%;-moz-box-sizing: border-box;" ></textarea>
</div>
<div id="QuestionBoxADivM" style="visibility:hidden;position:absolute;">Multiple Choice</div>
</div>
<div id="QuestionBoxProgressDiv" style="position:absolute;top:423px;left:20px;right:20px;height:30px;border:1px solid;">Progress Bar</div>
<div id="QuestionBoxSubmitBtn" style="position:absolute;top:458px;left:20px;right:75%;height:22px;border:1px solid;text-align:center;font-size:20px;background-color:#c6e2ff;">Submit Answer</div>
<div id="QuestionBoxCancelBtn" style="position:absolute;top:458px;left:26%;right:45%;height:22px;border:1px solid;text-align:center;font-size:20px;background-color:#c6e2ff;" onClick="CancelEditAnswer()">Cancel</div>
<div id="QuestionBoxTestTimer" style="position:absolute;top:458px;left:60%;right:22%;height:22px;border:1px solid;font-size:10px;">Test Timer</div>
<div id="QuestionBoxQuestionTimer" style="position:absolute;top:458px;left:80%;right:20px;height:22px;border:1px solid;font-size:10px;">Question Timer</div>
</div>

<?php

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
$sql = "SELECT *, answers.id AS IDD FROM answers INNER JOIN questions ON answers.QuestionID = questions.id WHERE Token like '".$AssToken."' AND Answer = '' LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // We found assigned questions that are still not answered by candidate
    while($row = $result->fetch_assoc()) {
		$Question = $row["Question"];
		$Answer = $row["Answer"];
		$QType = $row["QType"];
		$AnswerID = $row["IDD"];
		$QuestionID = $row["id"];
		$AnswerA = $row["AnswerA"];
		$AnswerB = $row["AnswerB"];
		$AnswerC = $row["AnswerC"];
		$AnswerD = $row["AnswerD"];
		$AnswerE = $row["AnswerE"];

		echo '<form action="submitanswer.php" method="POST">';
		echo '<b>Question: </b>'. $Question .'<br>';
		echo '<input type="hidden" name="AnswerID" value='.$AnswerID.'>';
		echo '<b>Answer: </b><br>';
		if ($QType=="Free") {
			echo '<textarea id="Answer" name="Answer" cols="100" rows="20" ></textarea>';
		} else {
			if ($AnswerA != "") {
				echo '<input type="radio" name="Answer" value="'.$AnswerA.'">'.$AnswerA.'</input><br>';
			}
			if ($AnswerB != "") {
				echo '<input type="radio" name="Answer" value="'.$AnswerB.'">'.$AnswerB.'</input><br>';
			}
			if ($AnswerC != "") {
				echo '<input type="radio" name="Answer" value="'.$AnswerC.'">'.$AnswerC.'</input><br>';
			}
			if ($AnswerD != "") {
				echo '<input type="radio" name="Answer" value="'.$AnswerD.'">'.$AnswerD.'</input><br>';
			}
			if ($AnswerD != "") {
				echo '<input type="radio" name="Answer" value="'.$AnswerD.'">'.$AnswerE.'</input><br>';
			}
		}
		echo '<br><INPUT TYPE = "Submit" Name = "Submit" VALUE = "Submit answer"><br><br>';
		
    }
} else {
    echo "<h2>No questions left.<br>Please review your answers and finish assessment with the link at the bottom of this page.</h2><br>";
	$sql = "SELECT *, answers.id AS IDD FROM answers INNER JOIN questions ON answers.QuestionID = questions.id WHERE Token like '".$AssToken."' ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			
			echo '<b>Question: </b>'.$row["Question"].'<br>';
			echo '<b>Answer: </b>';
			echo $row["Answer"];
			echo "<div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick=\"EditAnswer('".$row["Question"]."','".$row["Answer"]."','".$row["QType"]."','".$row["IDD"]."','".$row["id"]."','".$row["AnswerA"]."','".$row["AnswerB"]."','".$row["AnswerC"]."','".$row["AnswerD"]."','".$row["AnswerE"]."')\">Edit answer</div>";
			echo '<br>';
		}
	}
	echo "<br>";
	echo "<div style='text-align:center;border:1px solid;width:400px;background-color:#c6e2ff;' onClick=\"FinalSubmit('".$AssToken."')\"><h2>Final submit and quit assessment</h2>";
	echo "</div><br>";
}
mysqli_close($conn);

echo '</div>';

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>