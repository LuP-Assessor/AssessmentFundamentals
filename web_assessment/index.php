<?php
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php




/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea Div_deactive" style="top:120px;">';
echo '<p>Welcome to ALP Assessment Center</p>';
echo '<p>Access only with valid assessment token<p>';

echo '<form action="start.php" method="POST">';
echo '<label for="asstoken">Enter token here to start assessment: </label>';
echo '<input type="text" name="asstoken">';
echo '<input type="submit" value="Start">';
echo '</form><br>';
echo '<a href="admin.php">Assessment Administration Panel</a>';
echo '</div>';

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>