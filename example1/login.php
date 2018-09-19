<?php
	// activate PHP Session handling
	session_start();

	if (!isset($_SESSION["uName"])) {
		//!="LuPUser"
		echo "Welcom unidentified usery<br>Please Login to access system<br><br>";
		echo '<form action="proceedLogin.php">';
		echo '<label for="L_uName">Username: ';
			echo '<input id="I_uName" name="I_uName"> ';
		echo "</label> ";
		echo '<label for="L_uPass">Password:';
			echo '<input id="I_uPass" name="I_uPass"> </label>';
		echo '<input type="submit" value="Login">';
		echo "</form>";
		
	} 
	else {
		echo "Login not possible, because there is already a user-session running. Please Logout before relogin.";
		echo "<br><br>";
		echo "<a href='logout.php'>Logout</a>";
	}

?>




