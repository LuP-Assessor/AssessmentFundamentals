<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Page Body (output content starts from here)

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php

/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea" style="top:120px; background-color: rgba(255, 255, 255, 0.0);margin-top:4px;">';

	echo '<div id="" class="Div_DataAreaElement" style="">';
?>
		<div style="text-color:black; font-size:180%;">
			<b>LuP-Test Example pages</b>
		</div><br>
		
		This training system is designed to simulate a test object than can be used during loadtesting. 
		If offers varios kinds of web abplication that can be set under load for any kind of training purpose.
		Automated LuP-Training system does not have requirements to the toolset you use for testing. 
		Please take care, that your choosen client/tool meets all necessary reqirements of protocol and comunication standarts like TCP/IP, HTML, SSL, ... . 
		You will find further information about requirements inside the description of each Example.<br><br>

		<b>Please follow some rules when using this Training System:</b><br>
		* Examples are not designed for penetration testing purpuse. Security concept of the website is weak! Please do not use security leaks inside your script.<br>

<?php
	echo'</div>';
	echo'<div id="" class="Div_DataAreaElement" style="margin-top:10px;">';
?>
		<div style="text-color:black; float:left; font-size:180%;"><b>Linked Websites - Example 0</b></div>
		<div style="float: left;"><a href="../example0/page1.php" style="color:black; font-size:130%; padding-left:50px;">Jump to Base URL</a></div>
		<div style="position:absolute; right:10px; font-size:180%; color:#00FF00;margin-right:10px;">(Available)</div><br><br>
		<b>Description: </b>This is not a real application, this example offers just 3 websites that can be called sequentially for toolset training.<br>
		<b>Requirements for clients: </b>HTTP over TCP on Port 80<br>
		<b>Requirements for server: </b>Any Webserver, PHP (designed with 7 not testest with previous)<br>
		<b>Entry Point: </b><i>http://[SERVER IP or Name]/example0/page1.php </i>Any process, usecase, script, workflow or recording has to start with this URL.<br>
		<b>Authentication: </b>Not needed<br>
		<b>Details:</b><br>
		* This is no application, so we have just one static workflow/usecase available:<br>
		- Step 1 - Open page http://[SERVER IP or Name]/example0/page1.php in browser - Expected result: Browser will display page1.php that contains a link to page 2 - GET page1.php<br>
		- Step 2 - Click link to page 2 - Expected result: Browser will display page2.php that contains a link to page 3 - GET page2.php<br>
		- Step 3 - Click link to page 3 - Expected result: Browser will display page3.php that contains a link to restart procedure from page 1 - POST page3.php<br>
		
<?php
	echo'</div>';
	echo'<div id="" class="Div_DataAreaElement" style="margin-top:10px;">';
?>
		<div style="text-color:black; float:left; font-size:180%;"><b>Simple PHP session - Example 1</b></div>
		<div style="float: left;"><a href="../example1/index.php" style="color:black; font-size:130%; padding-left:50px;">Jump to Base URL</a></div>
		<div style="position:absolute; right:10px; font-size:180%; color:#00FF00;margin-right:10px;">(Available)</div><br><br>
		<b>Description:</b> This simple Website does not support any other functionality then login and logout. It is based on a very simple php session handling.<br>
		<b>Requirements for clients:</b> HTTP over TCP on Port 80<br>
		<b>Requirements for server:</b> Any Webserver, PHP (designed with 7 not testest with previous)<br>
		<b>Entry Point: </b>http://[SERVER IP or Name]/example1/index.php</i> as entry point. Any process, usecase, script, workflow or recording has to start with this URL.<br>
		<b>Authentication: </b><br>
		* Valid User credential names: <i>LuPUser_001</i>, <i>LuPUser_002</i> and <i>LuPUser_003</i><br>
		* Valid User credential passwort: <i>SuperSafe</i> (valid for all named users)<br>
		<b>Details:</b><br>
		* Pages of this example will not give valid HTTP Responsecodes on error. They will answer with HTTP-200 if error occur.<br>
		* There is only one logical usecase available: Open entry point page, Login, Logout.

<?php
	echo'</div>';
	echo'<div id="" class="Div_DataAreaElement" style="margin-top:10px;">';
?>
		<div style="text-color:black; float:left; font-size:180%;"><b>Example 2</b></div>
		<div style="float: left;"><a href="../example2/index.html" style="color:black; font-size:130%; padding-left:50px;">Jump to Base URL</a></div>
		<div style="position:absolute; right:10px; font-size:180%; color:#FF0000;margin-right:10px;">(not yet finished)</div><br><br>
		<b>Description:</b> This Website appear like the previous one and do also support nothing else then login and logout. Difference to previous site is the framework to controll session handling. This one uses Java instead of PHP.<br>
		<b>Requirements for clients:</b> HTTP over TCP on Port 80<br>
		<b>Requirements for server:</b> Any Webserver, PHP (designed with 7 not testest with previous), Java<br>
		<b>Details:</b><br>
		
<?php
	echo'</div>';
	echo'<div id="" class="Div_DataAreaElement" style="margin-top:10px;">';
?>
		<div style="text-color:black; float:left; font-size:180%;"><b>Example 3</b></div>
		<div style="float: left;"><a href="../example3/index.php" style="color:black; font-size:130%; padding-left:50px;">Jump to Base URL</a></div>
		<div style="position:absolute; right:10px; font-size:180%; color:#FF0000;margin-right:10px;">(not yet finished)</div><br><br>
		<b>Description:</b> Sometimes Java based session handing is a bit more tricky then discovered in example 2. This example is for demonstrating such a more complex java login-logout precedure. Please write a loadtest for the only imaginable UseCase: login and logout.<br>
		<b>Requirements for clients:</b> HTTP over TCP on Port 80, Java scrips client for browser<br>
		<b>Requirements for server:</b> Any Webserver, PHP (designed with 7 not testest with previous), Java<br>
		<b>Details:</b><br>
		
<?php
	echo'</div>';
	echo'<div id="" class="Div_DataAreaElement" style="margin-top:10px;">';
?>
		<div style="text-color:black; float:left; font-size:180%;"><b>Dynamic parameter correlation - Example 4</b></div>
		<div style="float: left;"><a href="../example4/index.php" style="color:black; font-size:130%; padding-left:50px;">Jump to Base URL</a></div>
		<div style="position:absolute; right:10px; font-size:180%; color:#00FF00;margin-right:10px;">(Available)</div><br><br>
		<b>Description:</b> Most of the customer in real time uses online web applications to shop the items to save time and energy. This Example helps you to shop available items from cart by performing simple steps like clicking buttons and entering Quantity etc. You will find some tricky correlations to be done to write a succesfull VuGen Script.<br>
		<b>Requirements for clients:</b> HTTP over TCP on Port 80, backup running on port 81<br>
		<b>Requirements for server:</b> Any Webserver, PHP (designed with PHP7 not testest with previous)<br>
		<b>Entry Point: </b>http://18.222.58.52/example4/index.php</i>. Any process, usecase, script, workflow or recording has to start from this URL.<br>
		<b>Authentication: </b>Login and logout is not required to proceed the usecase.<br>
		<b>Details:</b> In this Example there are 8 products with quoted price, Quantity should be in digits 0-9. One Item can be selected each time you shop. Total Price of the selected items will be displayed after you put items in cart. At the end either you can continue shopping or checkout from the application.<br>
		
<?php
	echo'</div>';
	echo'<div id="" class="Div_DataAreaElement" style="margin-top:10px;">';
?>
		<div style="text-color:black; float:left; font-size:180%;"><b>Dynamic parameter correlation - Example 44</b></div>
		<div style="float: left;"><a href="../example44/index.php" style="color:black; font-size:130%; padding-left:50px;">Jump to Base URL</a></div>
		<div style="position:absolute; right:10px; font-size:180%; color:#00FF00;margin-right:10px;">(Available)</div><br><br>
		<b>Description:</b> This example looks like the same simple webshop from example 4. Writing scripts for example 44 will show a different set of dynamic parameters inside it's communication.<br>
		<b>Requirements for clients:</b> HTTP over TCP on Port 80, backup running on port 81<br>
		<b>Requirements for server:</b> Any Webserver, PHP (designed with PHP7 not testest with previous)<br>
		<b>Entry Point: </b>http://18.222.58.52/example44/index.php</i>. Any process, usecase, script, workflow or recording has to start from this URL.<br>
		<b>Authentication: </b>Not needed<br>
		<b>Details:</b> Login and logout is not needed to proceed the usecase.<br>
		
<?php
	echo'</div>';
	echo'<div id="" class="Div_DataAreaElement" style="margin-top:10px;">';
?>
		<div style="text-color:black; float:left; font-size:180%;"><b>SOAP Webservice - Example 5</b></div>
		<div style="float: left;"><a href="../example5/index.php" style="color:black; font-size:130%; padding-left:50px;">Jump to Base URL</a></div>
		<div style="position:absolute; right:10px; font-size:180%; color:#FF0000;margin-right:10px;">(not yet finished)</div><br><br>
		<b>Description:</b> To be defined<br>
		<b>Requirements for clients:</b> To be defined<br>
		<b>Requirements for server:</b> To be defined<br>
		<b>Details:</b><br>
		
<?php
	echo'</div>';
	echo'<div id="" class="Div_DataAreaElement" style="margin-top:10px;">';
?>
		<div style="text-color:black; float:left; font-size:180%;"><b>RESTful Webservice - Example 6</b></div>
		<div style="float: left;"><a href="../example6/index.php" style="color:black; font-size:130%; padding-left:50px;">Jump to Base URL</a></div>
		<div style="position:absolute; right:10px; font-size:180%; color:#FF0000;margin-right:10px;">(not yet finished)</div><br><br>
		<b>Description:</b> Representational State Transfer<br>
		<b>Requirements for clients:</b> To be defined<br>
		<b>Requirements for server:</b> To be defined<br>
		<b>Details:</b><br>
		
<?php
	echo'</div>';
	echo'<div id="" class="Div_DataAreaElement" style="margin-top:10px;">';
?>
		<div style="text-color:black; float:left; font-size:180%;"><b>Example 7</b></div>
		<div style="float: left;"><a href="../example7/index.php" style="color:black; font-size:130%; padding-left:50px;">Jump to Base URL</a></div>
		<div style="position:absolute; right:10px; font-size:180%; color:#FF0000;margin-right:10px;">(not yet finished)</div><br><br>
		<b>Description:</b> To be defined<br>
		<b>Requirements for clients:</b> To be defined<br>
		<b>Requirements for server:</b> To be defined<br>
		<b>Details:</b><br>
		
<?php
	echo'</div>';
	echo'<div id="" class="Div_DataAreaElement" style="margin-top:10px;">';
?>
		<div style="text-color:black; float:left; font-size:180%;"><b>Recaptcha protection - Example 8</b></div>
		<div style="float: left;"><a href="../example8/index.php" style="color:black; font-size:130%; padding-left:50px;">Jump to Base URL</a></div>
		<div style="position:absolute; right:10px; font-size:180%; color:#FF0000;margin-right:10px;">(not yet finished)</div><br><br>
		<b>Description:</b> To be defined<br>
		<b>Requirements for clients:</b> To be defined<br>
		<b>Requirements for server:</b> To be defined<br>
		<b>Details:</b><br>
		
<?php
	echo'</div>';
echo'</div>';

include '../web_templates/template_footer.php'; 
?>