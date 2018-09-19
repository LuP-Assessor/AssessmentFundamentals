<?php
/* Include general CSS*/
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';

/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ */
/* Page Body (output content starts from here) */

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php

/*------------- Data Area ----------------*/
echo '<div id="" class="Div_DataArea Div_deactive" style="top:120px;">';
?>

<h1>Sorry, this example is not yet ready for using</h1>

Have a look at following Examples for preview purpose:<br>
* <a href="../example0/page1.php">Example 0</a><br>
* <a href="../example1/index.php">Example 1</a><br>
* <a href="../example4/index.php">Example 4</a><br>

<?php
echo "</div>";

/*------------- Page Footer ----------------*/
include '../web_templates/template_footer.php';
?>