<?php
	// activate PHP Session handling
	session_start();

	if (isset($_SESSION["uName"])) {
		echo "Here we are! You have a valid user session established and are inside our test application";
		echo "<br>";
		echo "Sadly there is no functionality inside this page, but login and logout should be enough for this first Example";
		echo "<br><br>";
		echo "<a href='logout.php'>Logout</a>";
	} else {
		echo "Please login before accessing this site.<br>";
		echo "<a href='login.php'>Login</a>";
	}

?>