 <?php

 session_start();

 if ($_POST['ReCap1'] == $_SESSION['ReCap1']) {

 	echo "Oleole";
 } else {
 	echo "Pampe";
 }
