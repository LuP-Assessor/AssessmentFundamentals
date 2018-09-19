<?php
	// activate PHP Session handling
	session_start();

	if (!isset($_SESSION["uName"])) {
		$ErrorStatus = 0;

		if (isset($_SESSION["uName"])) {
			echo "Existing User Session detected. Please Logout before relogin.";
			$ErrorStatus++;
		} else{

			if (empty($_GET["I_uName"]) ) {

			 	echo "Error: No username submitted";
			 	$ErrorStatus++;
			 }

			 if (empty($_GET["I_uPass"]) ) {
			 	echo "Error: No password submitted";
			 	$ErrorStatus++;
			 }

			 if ($_GET["I_uName"]!= "LuPUser_001" && $_GET["I_uName"]!= "LuPUser_002" && $_GET["I_uName"]!= "LuPUser_003") {
			 	echo "Error: Username unknown";
			 	$ErrorStatus++;	
			 }

			 if ($_GET["I_uPass"] != "SuperSafe") {
			 	echo "Error: password unknown";
			 	$ErrorStatus++;		
			 }

		}


		if ($ErrorStatus>=1) {
			echo "<br>Login Failed";
			
			header('Location: login.php');
		} 
		else {
			echo "<br>Login Successful";
			$_SESSION["uName"] = "LuPUser";

			header('Location: main.php');

		}
	} else {
		echo "Can't process login, because you are already logged in.";
		echo "<br><br>";
		echo "<a href='logout.php'>Logout</a>";
	}

?>