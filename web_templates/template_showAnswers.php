<?php

	function showAnswers($QuestionID) {
	
		$countOfFoundAswers = 0;
	
		$searchpath = "../log_answers/Answer_*_".$QuestionID."_*.txt";
		// echo $searchpath."<br>";
		foreach (glob($searchpath) as $filename) {
			$countOfFoundAswers++;
			$senderName = substr($filename,22,-33);
			echo '<div style="background-color:#FFE7C3; margin:15px;font-size:80%;">';
			echo date("Y-m-d H:i:s", filemtime($filename));
			echo " <b>".$senderName."</b>:<br>";
			$answerText="";
			$handle = fopen($filename, 'r');
			if ($handle) {
				while (($line = fgets($handle)) !== false) {
					$answerText=$answerText.$line;
				}
				fclose($handle);
			}
			echo $answerText."<br>";
			echo "</div>";
		}
		
		if ($countOfFoundAswers == 0) {echo "<br>";}
	}
	
?>