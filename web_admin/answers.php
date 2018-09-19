<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS
include '../web_templates/template_showAnswers.php';				// Include function showAnswers from ../web_templates/template_showAnswers.php
?>



<?php
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Page Body (output content starts from here)

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php

/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea Div_deactive" style="top:120px; background-color:#EEEEEE;">';

	echo'<div id="" class="" style="top:10px; right:0px; left:0px; background-color:#FFFCE5; ">';
?>
		<div style="text-color:black; float:left; font-size:180%;">
			<b>Exercise 1 - Setting up environment</b>
		</div><br><br>
		
<?php
	echo'</div><br>';
	echo'<div id="" class="" style="top:10px; right:0px; left:0px; background-color:#FFFCE5; ">';
?>	
		<div style="text-color:black; float:left; font-size:180%;">
			<b>Exercise 2 - Theoretical loadtesting basics</b>
		</div><br><br>
		
<?php
	echo'</div><br>';
	echo'<div id="" class="" style="top:10px; right:0px; left:0px; background-color:#FFFCE5; ">';
?>
		<div style="text-color:black; float:left; font-size:180%;">
			<b>Exercise 3 - First Loadtestscript, based on Example 0</b>
		</div><br><br>
		
		<div id="" class="" style="background-color:#FFF0D5;">
			<b>Exercise 3 - Step 1 - Create HP VuGen Project for Example 0</b><br><br>
		
			* Create a new VGen Project with name "Example0_[YourShortName]" (Protocol HTTP).<br>
			<?php showAnswers("03_01_01"); ?>
			* Check VuGen Settings: Only one iteration sould be done by execution. Where do you find this option and what is its name?<br>
			<?php showAnswers("03_01_02"); ?>
			* Check VuGen Settings: Activate full logging during execution/debug. Where do you find this option and what is its name?<br>
			<?php showAnswers("03_01_03"); ?>
			* Check VuGen Settings: Define that timetimes are relayed like recorded. Where do you find this option and what is its name?<br>
			<?php showAnswers("03_01_04"); ?>
			* Create new action with name Action_coding in project explorer.<br>
			<?php showAnswers("03_01_05"); ?>
			* Check VuGen Settings: Take care that ation "Action_coding" will be exectudes instead of default action "Action". Do not touch init and end sequence. Where do you find this option and what is its name?<br>
			<?php showAnswers("03_01_06"); ?>
			* Check VuGen Settings: Disable all automatic generating of transactions. Where do you find this optiond and what are their name?<br>
			<?php showAnswers("03_01_07"); ?>
			* Check VuGen Settings: We like to have a fixed interval of 15 secounds between each iteration of the script. Where do you find this option and what is its name?<br>
			<?php showAnswers("03_01_08"); ?>
		</div><br>
		
		<div id="" class="" style="background-color:#FFF0D5;">
			<b>Exercise 3 - Step 2 - Write code for Action "Action_coding" manually</b><br><br>
			
			* Find the c-statement to request the first page (page1.html, by HTTP-GET, no GET (url) Variables).<br>
			<?php showAnswers("03_02_01"); ?>
			* place first request into "Action_coding"<br>
			<?php showAnswers("03_02_02"); ?>
			* Find the c-statement to request the secound page (page2.html, by HTTP-GET, no GET (url) Variables).<br>
			<?php showAnswers("03_02_03"); ?>
			* place secound request into "Action_coding".<br>
			<?php showAnswers("03_02_04"); ?>
			* Find the c-statement to request the third page (page2.html, by HTTP-POST, empty body, no POST Variables, no GET (url) Variables).<br>
			<?php showAnswers("03_02_05"); ?>
			* place third request into "Action_coding".<br>
			<?php showAnswers("03_02_06"); ?>
			* Find the c-statement for a 1 secound thinktime.<br>
			<?php showAnswers("03_02_07"); ?>
			* Pleace such a thinktime between request 1-2 and one between 2-3 inside your script "Action".<br>
			<?php showAnswers("03_02_08"); ?>
			* Find c-statement for transaction start and transaction end. <img src="../web_pics/send-message-icon.png" height="16px"></img><br>
			<?php showAnswers("03_02_09"); ?>
			* Define two transactions by c-statement. One around request 1 and 2, secount transaction just around request 3.<br>
			<?php showAnswers("03_02_10"); ?>
		</div>
<?php

	echo'</div><br>';
	

?>
<h2><a href="/example1/page1.php">Example 0</a> (3 websites that can be called sequentially for toolset training)</h2>
<br><b>Exercise 1 (HP VuGen based)</b><br><br>
* Create a new VGen Project with name "Example0_[YourShortName]", Protocol HTTP.<br>
<i>self explaining, Open VuGen -> Create New Projec -> Select name and Protocol.</i><br><br>
* Check that only one iteration is selectes for any execution (runtime settings).<br>
<i>runtime settings -> bla -> ADVANCED</i><br><br>
* Find the c-statement to request the first page (page1.html, by HTTP-GET, no GET (url) Variables).<br>
<i>web_custom_request("RequestName",...,"URL=bla", LAST);</i><br>
<?php
	$searchpath = "../logsanswer/Answer_*_00_01_03.txt";
	foreach (glob($searchpath) as $filename) {
		$senderName = substr($filename,21,-13);
		echo date ("Y-m-d H:i:s.", filemtime($filename))." Answer from <b>".$senderName."</b> recieved: <b>";
		$answerText="";
		$handle = fopen($filename, 'r');
		if ($handle) {
			while (($line = fgets($handle)) !== false) {
				$answerText=$answerText.$line;
			}
			fclose($handle);
		}
		echo $answerText."</b><br>";
	}
?>
* place first request into the action with name "Action" ("Action" is created by default by VuGen).<br>
* Find the c-statement to request the secound page (page2.html, by HTTP-GET, no GET (url) Variables).<br>
* place secound page request at the end of "Action".
* Find the c-statement to request the third page (page2.html, by HTTP-POST, empty body, no POST Variables, no GET (url) Variables).<br>
* place third page request at the end of your script "Action".<br>
* Find the c-statement for a 1 secound thinktime<br>
* Pleace a 1 secound thinktime between request 1-2 and one between 2-3 inside your script "Action".<br>
* Configure thinktimes in runtime setting to ensure the 1 secound for each thinktime statement on any execution.<br>
* Configure pacing in runtime settings. We like to have a fixed interval of 15 secounds between each iteration of the script.<br>
* Disable all automatic generating of transactions and define two transactions by c-statement. One around request 1 and 2, secount transaction just around request 3.<br>
<br><b>Exercise 2 Optional (HP VuGen based)</b><br>
Please do not execute this execise on your own. Let your responsible review your steps to avoid impact to productive environment.
* Upload script to HP Alm Project (ask for the correct one).<br>
* Create szenario for test execution.<br>
- Vuser: max. 10<br>
- Loadgenerators: max. 2<br>
- Duration: max 30 min<br>
* Execute Loadtest<br>
* Create short HTML report of all measurements.<br>

<?php echo "</div>"; ?>

<?php include '../web_templates/template_footer.php'; ?>