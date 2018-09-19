<?php
	// activate PHP Session handling
	session_start();

	// check if session exists
	if (!isset($_SESSION["uName"])) {
		// No registered session found, redirecting to login page
		header('Location: login.php');
	} else {
		// Valid registered session found, redirecting to main page
		header('Location: main.php');
	}

?>