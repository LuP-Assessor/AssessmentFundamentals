<?php

if (isset($_POST['NameSender']) && isset($_POST['AnswerFor']) && isset($_POST['AnswerText'])) {
	
	$file = '../log_answers/Answer_'.$_POST['NameSender'].'_'.$_POST['AnswerFor']."_".date("Y-m-d_H-i-s").".txt";
	$Message = $_POST['AnswerText'];
	
	file_put_contents($file, $Message . PHP_EOL, FILE_APPEND | LOCK_EX);
	
	header("Location: exercises.php?sucsubmittest=true&AnswerFor=".$_POST['AnswerFor']);
}
?>