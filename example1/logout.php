<?php
	// activate PHP Session handling
	session_start();

	// Check if there is an existing Session
	if (isset($_SESSION["uName"])) {
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy(); 

		echo "Logout successful";

		// Change Header for static redirecting to login.php
		header('Location: login.php');
	} else {
		echo "Logout failed";
	}

?>