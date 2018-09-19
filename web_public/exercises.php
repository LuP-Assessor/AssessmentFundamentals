<script>
function ShowAnswerBox(AnswerID) {
    a_name = prompt('Your Name?', '');
	a_answer = prompt('Your Answer?', '');
	a_id = AnswerID;
	var xhr = new XMLHttpRequest();
	xhr.open("POST", 'sendAnswers.php', true)
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xhr.onreadystatechange = function() {//Call a function when the state changes.
		if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
			// Request finished. Do processing here.
		}
	}
	xhr.send("NameSender="+ a_name +"&AnswerFor="+ AnswerID +"&AnswerText="+ a_answer); 
}
</script>

<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Page Body (output content starts from here)

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php

/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea" style="top:120px; background-color:#FFFFFF; ">';

	echo'<div id="" class="" style="top:10px; right:0px; left:0px; background-color:#FFFCE5; ">';
?>
		<div style="text-color:black; font-size:180%;">
			<b>LuP-Test Exercise page</b>
		</div><br>
		
		<b>These exercises base on the following toolset:</b><br>
		* HP VuGen (version 12.53 or later)<br>
		* HP Analysis (version 12.53 or later)<br>
		* Notepad++ (version 7.3.3 or later)<br>
		* Sublime Text <br>
		* Microsoft Internet Explorer<br>
		* Mozilla Firefox<br>
		* Mozilla Firefox addon Firebug<br>
		
<?php
	echo'</div><br>';
	echo'<div id="" class="" style="top:10px; right:0px; left:0px; background-color:#FFFCE5; ">';
?>
		<div style="text-color:black; font-size:180%; margine:right;">
			<b>Exercise 1 - Setting up environment</b>
		</div><br>
		
		<b>Skill Level:</b> Blody beginner, and everyone who never used this toolset<br>
		<b>Description:</b> This exercises will cover setup process and basic usage of the involved toolchain.<br><br>
				
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 1 - Step 1 - HP VuGen setup</b><br>
			You will find HP VuGensetup files here: (TBD)<br>
			Find HP VuGen hotfixes and patches here: (TBD)<br>
			Task 1: Plesase contact your training responsible if you don't have access to setup files and/or patches<br>
			Task 2: Start Standalone Applicatio Setup on your local system<br>
			Task 3: Select "HP VuGen" from available components<br>
			Task 4: Follow install instructions and use recommended settings<br>
			Task 5: Install HP VuGen hotfixes and patches like descriped in individual setup instruction<br>
			Task 6: What version of VuGen did you installed <img src="../web_pics/send-message-icon.png" height="17px" onclick="ShowAnswerBox('01_01_06');"></img><br>
		</div><br>
			
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 1 - Step 2 - HP VuGen basic functionality</b><br>
			Task 1: See youtube video (LINK TBD) to get a basic understanding of the following functionality:<br>
			* Start HP VuGen Gui<br>
			* Close HP VuGen Gui <br>
			* Create new Projects <br>
			* Choose protocol of new projects <br>
			* Save projects <br>
			* Load projects <br>
			* Basic funtionality of GUI components: Menu Bar, Project Explorer, GUI arrangement of components<br>
		</div><br>	
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 1 - Step 3 - HP Analysis</b><br>
			Within the HP Standalone Applicatio Setup, you will a powerful tool for analysing loadtest results.
			Task 1: Start Standalone Applicatio Setup on your local system<br>
			Task 2: Select "HP Analysis" from available components<br>
			Task 3: Follow install instructions and use recommended settings<br>
		</div>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 1 - Step 4 - Notepad++ and/or Sublime Text setup</b><br>
			Converting testdata files from customers, short hand modifying scriptfiles, many task 
			during LuP-process require a strog but simple text editor tool. Notepad++ and sublime 
			Text are just two examples from a large amount of available products. Choose diferent
			aplication if you are aware about their functional requirements.<br>
			Task 1: Download Notepad++ from <a href='https://notepad-plus-plus.org/download'>authors website</a> <br>
			Task 2: Install Notepad++ with recommended settings<br>
			Task 3: Donwload Sublime Text from <a href='https://www.sublimetext.com/3'>authors website</a><br>
			Task 4: Install Sublime Text with recommended settings<br>
			Task 5: What version of Notepad++ did you installed? <img src="../web_pics/send-message-icon.png" height="17px" onclick="ShowAnswerBox('01_03_05');"></img><br>
			Task 6: What version of Sublime Text did you installed? <img src="../web_pics/send-message-icon.png" height="17px" onclick="ShowAnswerBox('01_03_06');"></img><br>
		</div><br>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 1 - Step 5 - Notepad++ and/or Sublime Text basic functionality</b><br>
			Advantages of Notepad++: * powerful compare function<br>
			Advanteage of Sublime Text:	* Can manage large files<br>
			Task 1: See youtube video https://www.youtube.com/watch?v=oQbCbTg2EfM to get a basic understanding of the following functionality of Notepad++:<br>
			* Text compare<br>
			* Seach&Replace<br>
			* Basic funtionality of GUI components: Menu Bar, Quick Icons<br>
			Task 2: See youtube video https://www.youtube.com/watch?v=zIkg3Oo1PVM to get a basic understanding of the following functionality of Sublime Text:<br>
			* Text compare<br>
			* Seach&Replace<br>
			* Basic funtionality of GUI components: Menu Bar, Quick Icons<br>
		</div><br>	
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 1 - Step 6 - Microsoft Internet Explorer</b><br>
			Microsoft Internet Explorer should be installed together with windows.<br>
			Task 1: What version of Microsoft Internet Explorer is installed on your system? <img src="../web_pics/send-message-icon.png" height="17px" onclick="ShowAnswerBox('01_05_01');"></img><br>
		</div><br>	
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 1 - Step 7 - Mozilla Firefox</b><br>
			At least one other Browser distrubution then MS Internet Explorer is highy recommended. 
			Sometimes you will find the need of comparing behaviors between diferent browser and 
			sometimes your object under test will be an application that is designed for an individual 
			browser.<br>
			Task 1: Download Mozilla Firefox from <a href='https://www.mozilla.org/de/firefox/'>authors website</a><br>
			Task 2: Install Mozilla Firefox with recommended settings<br>
			Task 3: What version of Mozilla Firefox did you installed? <img src="../web_pics/send-message-icon.png" height="17px" onclick="ShowAnswerBox('01_06_03');"></img><br>
		</div><br>	
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 1 - Step 8 - Firebug setup</b><br>
			Microsoft Internet Explorer has an own debug toolset included. Firefox has not, but there is an
			Add-On for Firefox available that delivers all functions we need.<br>
			Task 1: Open Mozilla Firefox and navigate to <a href='https://www.mozilla.org/de/firefox/'>Firebug Add-on page</a><br>
			Task 2: Click "Add to Firefox".<br>
			Task 3: Follow the process to install and activate the Add-On.<br>
			Task 4: Restart Firefox.<br>
			Task 5: What version of Firebug did you installed? <img src="../web_pics/send-message-icon.png" height="17px" onclick="ShowAnswerBox('01_07_05');"></img><br>
		</div><br>	
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 1 - Step 9 - Firebug basic functionality</b><br>
			A new Firebug Icon will be available inside the Firefox Menu bar.<br>
			Task 1: Click Firebug Icon to shop up Firebug screen.<br>
			Task 2: See youtube video (LINK TBD) to get a basic understanding of the following functionality:<br>
			* Log during brwoser action<br>
			* List of requested ressources<br>
			* Analyse Request Header<br>
			* Analyse Request Body<br>
			* Analyse Response Header<br>
			* Analyse Response Body<br>
		</div>
		
		
		
<?php
	echo'</div><br>';
	echo'<div id="" class="" style="top:10px; right:0px; left:0px; background-color:#FFFCE5; ">';
?>
		<div style="text-color:black; font-size:180%; margine:right;">
			<b>Exercise 2 - Theoretical loadtesting basics</b>
		</div><br>
		What is loadtesting in detail and what to you have to regard before you can start scripting?<br><br>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 2 - Step 1 - Definition of Loadtest, Performancetest</b><br>
			English "Loadtest" = German "Lasttest"<br>
			English "Performancetest" = German "Performanztest"<br>
			This is a good example for different meenings that are caused by such a direct translation.
			
		</div><br>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 2 - Step 2 - Diferent types of Load- and Performance tests.</b><br>
			There is no detailed definition available that shows the diferens types of test behind the 
			verding "Load- and Performancetest".<br>
		</div><br>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 2 - Step 3 - Communication protocols</b><br>
		</div><br>
<?php
	echo'</div><br>';
	echo'<div id="" class="" style="top:10px; right:0px; left:0px; background-color:#FFFCE5; ">';
?>
		<div style="text-color:black; font-size:180%; margine:right;">
			<b>Exercise 3 - First Loadtestscript, based on Example 0</b>
		</div><br>
		Now you should be able to write your first loadtest script.<br>
		Hint: You will find documentations about all required c-statements inside loadrunner help function 
		or on public ressources. Google is your friend!<br><br>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 3 - Step 1 - Create HP VuGen Project for Example 0</b><br>
			Task 1: Create a new VGen Project with name "Example0_[YourShortName]" (Protocol HTTP).<br>
			Task 2: Check VuGen Settings: Only one iteration sould be done by execution. 
			  Where do you find this option and what is its name? <img src="../web_pics/send-message-icon.png" height="17px" onclick="ShowAnswerBox('03_01_02');"></img><br>
			Task 3: Check VuGen Settings: Activate full logging during execution/debug. 
			  Where do you find this option and what is its name? <img src="../web_pics/send-message-icon.png" height="17px" onclick="ShowAnswerBox('03_01_03');"></img><br>
			Task 4: Check VuGen Settings: Define that timetimes are replayed like recorded. 
			  Where do you find this option and what is its name? <img src="../web_pics/send-message-icon.png" height="17px" onclick="ShowAnswerBox('03_01_04');"></img><br>
			Task 5: Create new action with name Action_coding in project explorer.<br>
			Task 6: Check VuGen Settings: Take care that ation "Action_coding" will be exectudes instead of default action "Action". 
			  Do not change init and end sequence. Where do you find this option and what is its name? <img src="../web_pics/send-message-icon.png" height="17px" onclick="ShowAnswerBox('03_01_06');"></img><br>
			Task 7: Check VuGen Settings: Disable all automatic generating of transactions. 
			  Where do you find this optiond and what are their name? <img src="../web_pics/send-message-icon.png" height="17px" onclick="ShowAnswerBox('03_01_07');"></img><br>
			Task 8: Check VuGen Settings: We like to have a fixed interval of 15 secounds between each iteration of the script. 
			  Where do you find this option and what is its name? <img src="../web_pics/send-message-icon.png" height="17px" onclick="ShowAnswerBox('03_01_08');"></img><br>
		</div><br>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 3 - Step 2 - Write code for Action "Action_coding" manually</b><br>
			Task 1: Find VuGen-C-function and individual parameter values to send a request to the first page (GET page1.html). <img src="../web_pics/send-message-icon.png" height="17px"></img><br>
			Task 2: Place first request into "Action_coding"<br>
			* Find the c-statement to request the secound page (page2.html, by HTTP-GET, no GET (url) Variables). <img src="../web_pics/send-message-icon.png" height="17px"></img><br>
			* Place secound request into "Action_coding".<br>
			* Find the c-statement to request the third page (page2.html, by HTTP-POST, empty body, no POST Variables, no GET (url) Variables).	<img src="../web_pics/send-message-icon.png" height="17px"></img><br>
			* Place third request into "Action_coding".<br>
			* What is the valid c-statement for a 1 secound thinktime. <img src="../web_pics/send-message-icon.png" height="17px"></img><br>
			* Pleace such a thinktime between request 1-2 and one between 2-3 inside your script "Action".<br>
			* Find c-statement for transaction start <img src="../web_pics/send-message-icon.png" height="17px"></img><br>
			* Find c-statement for transaction end. <img src="../web_pics/send-message-icon.png" height="17px"></img><br>
			* Define two transactions by c-statement. One around request 1 and 2, secount transaction just around request 3.<br>
		</div><br>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 3 - Step 3 - Execute (optional)</b><br>
			Please do not execute this execise on your own. Let your responsible review your steps to avoid impact to productive environment. <br>
			* Upload script to HP Alm Project (ask for the correct one).<br>
			* Create szenario for test execution.<br>
			- Vuser: max. 10<br>
			- Loadgenerators: max. 2<br>
			- Duration: max 30 min<br>
			* Execute Loadtest<br>
			* Create short HTML report of all measurements.<br>
		</div><br>

<?php
	echo'</div><br>';
	echo'<div id="" class="" style="top:10px; right:0px; left:0px; background-color:#FFFCE5; ">';
?>
		<div style="text-color:black; font-size:180%; margine:right;">
			<b>Exercise 4 - First Loadtestscript on login/logout application, based on Example 1</b>
		</div><br>
		bla bla <br>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 4 - Step 1 - Define UseCase</b><br>
			In productive projects you will often get usecases deivered from projexct responsibles. For this example no one delivered use such a textural usecase description, so you have to create it by your own.<br>
			* Define all steps/clicks that are needed to go through login and logout process like this:<br>
			Step 1: Open page http:// in browser<br>
			Step 2: On logout page, click button XY<br>
			Step 3: Close popup<br>
			* Add a column righ to your previously created list, that contains the expected outcome of every step/action. Something like: "Login form is visible" or "System shows following message: ..."<br>
			* Discuss your results with responsible before going on to further exercises.<br>
		</div><br>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 4 - Step 2 - Analyse Request-Response behavior</b><br>
			In productive projects you will often recognize that one step like defined in Exercise 1 will result in (1+n) requsts from client to the server. This example will show this behavior by some redirects from one page to another.<br>
			* Please find a working toolset to make requests visible during processing the usecase manually in any browser/client.<br>
			- Option 1: Mozilla Firefox with Addon Firebug<br>
			- Option 2: Internet Explorer with debug tools (F12)<br>
			- Option 3: Any regular browser running over Fiddler proxy - ... Any other toolset that fits our requirement<br>
			* Extend this list created in Exercise 1 by another column, that shows all php-files that are requested inside each step. Never mind any extra ressources like css, pictures or external scrips.<br>
			* Discuss your results with responsible before going on to further exercises. Please prepare to show and descripe the process you found for monitoring requests.<br>
		</div><br>	
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 4 - Step 3 - Create coded and recorded script</b><br>
			For efficient loadtesting we write scripts that simulate exactly one real user that is passing the usecase exactly one time. You created a fully qualified usecase description in Exercise 1 and 2 so you are ready to create such a script now. Gernerally most tools supports to ways of create such a script:<br>
			- Recording solution (Tool will record all handled requests in background while you are going manually throu the usebase in your browser)<br>
			- Pure scripting (Most tools ofters fnctions or librarys for all types of needed request)<br>
			You are generally free to decide what is the most effective way for yourself. For further steps keep in mind that "create script" is ment like "Create a script that contains the sequence of requestest php sites. Do not add an validation, measurement/transaction or anything else for now.<br>
			* Create a script manually<br>
			* Create a script by recording<br>
			* Discuss your results with responsible before going on to further exercises. Please prepare compare both scripts and the time you needed to create them.<br>
		</div><br>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 4 - Step 4 -</b><br>
			On executing the your script you will recognize that the server does not respond in the way he did before when we analysed the requests during manual process. Your tool may say that everything works fine but in a deeper analyse of responses, you will find difference in response bodys. This is mostly caused by dynamic variables that change its value during each deployment, execution or request. During recording and monitoring request you grabed values that have been valid in this situation. Sadly they are not valid anymore, now.<br>
			* Think about dynamic parameters and prepare to discuss why they are used in most web applications.<br>
			* Analyse the first request that fails inside your script and check what url this belongs to.<br>
			* Create three new recordings or monitorings/log during manual recording and compare all GET parameter and the request bodys of requests to the failing URL. You should close you browser at least one time during the 3 recordings/monitorings to ensure that a new user-session is used.<br>
			* Crete a list of all values that changed during the 3 recordings/monitoring.<br>
			* Find a technique to generate/grab actual valid values for dynamic parameters and use them inside your script.<br>
			* Discuss your results with responsible before going on to further exercises.<br>
		</div><br>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 4 - Step 5</b><br>
			* Example 1 will include the keyword "ERROR" inside any response body if your request ist not formated correctly.<br>
			Find a solution to make your script failing if this keyword is included into any resonse.<br>
			* Correlate all dynamic values inside your script. This task is not done before any check for keyword "ERROR" responds false.<br>
			* Find a strategy/parameterization to handle different user credentials during testrun. You have 3 credentials availabe and are propaply using just one of them.<br>
			* Find a strategy/parameterization to make it easy to change target server of your script.<br>
			* Discuss your results with responsible before going on to further exercises.<br>
		</div><br>
		
		<div id="" style="background-color:#FFF0D5;">
			<b>Exercise 4 - Step 6</b><br>
			Actually your script in working from the functional point of view. Each request will cause a realistic load, but what about the timing? Your script will execute each script directly after previous one finised.<br>
			* Add realistic thinktimes to your script (If not configured inside script by your toolchain you can descripe a concept for this. HP VuGen can use lrthinktime)<br>
			* Add realistic pacing to your script (If not configured inside script by your toolchain you can descripe a concept for this, HP VuGen can configure this inside runntime settings)<br>
			* Find a strategy to include a measurement of request-response times into your script. (HP Vugen offers "transactions" for this)<br>
			* Find smart solution to validate server-responses. Right now you only checked for keyword error. This will not recognized if testobject response with wrong content.<br>
			* Check if your script is commented to make it more easy to understand it.<br>
			* Discuss your final results with responsible (lesson learned)<br>
		</div><br>
<?php
	echo'</div><br>';
	echo "</div>"; 
	include '../web_templates/template_footer.php'; 
?>