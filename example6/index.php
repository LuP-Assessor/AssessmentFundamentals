<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Page Body (output content starts from here)

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php

/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea Div_deactive" style="top:120px;">';
?>

<h1>LuP-Test example 6 - Representational State Transfer service (REST)</h1>
REST is not very common anymore but still a simple and stupid solution for machine to machine communication. This example does not focus on any authentication or identification issue. It just offers some public available information about the LuP-Service, that are still known from our LuP webshop (example 4).<br>
<br>
<b>BaseURL:</b> http://sundd.hopto.org/example6/<br>
<b>Available Services:</b><br>
* LuP_Services/list/ - Shows a list of all available LuP services.<br>
* LuP_Services/list/{id} - Shows detailed information about a service. Replace {id} by id from list of all available LuP services (int).<br>
<br>
<b>Exercise 1</b><br>
* Create a new VuGen Project with name 'Example6_{YourName}_Exercise1'. Please replace {YourName} by the first 6 letters of your name.<br>
* There is more than one VuGen protocol available, that is theoretically able to fullfill the recommendations, descriped in further exercises of this example. Please start your script with a comment about which protocol you decided, why you choose the protocol, and why you did not use any other protocol.<br>
* Go to VuGen runntime settings and make sure that VuGen will use the following browser identification string within ALL requests of this project: 'VuGen_{YourName}'. Please replace {YourName} by the first 6 letters of your name.<br>
* Write a VuGen script that simulates the following usecase:<br>
Step1: Enforce the REST-Service to send a list of all available LuP services in XML format.<br>
Step2: Enforce the REST-Service to send detailed information about service 'Cookies' in HTML format.<br>
Step3: Enforce the REST-Service to send detailed information about a rondom service in JSON format.<br>
* Export your VuGen project to a zip file (runtime files only) and send it to your supervisor by mail.<br>
<br>
<b>Exercise 2</b><br>
* Create a copy of the your VuGen project and rename it to 'Example6_{YourName}_Exercise2'. Please replace {YourName} by the first 6 letters of your name.<br>
* Define transactions to receive measurement about request-response time for all three requests.<br>
* Define thinktime between each request (5 sec).<br>
* Define pacing between each script iteration (10 sec).<br>
* Validate the format (XML, HTML, JSON) of each response.<br>
* Detect amount of services that are inside the first server response and write it into vugen log.<br>
* Validate that the response for your secound request contains data for service 'Cookies'<br>
* Detect price for service 'Cookies' from second response and write it into VuGen log.<br>
* Write randomy selected service name and price from last server response into GuGen log.<br>
* Comment your sourcecode!!!.<br>
* Export your VuGen project to a zip file (runtime files only) and send it to your supervisor by mail.<br>

<?php
echo "</div>";

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>