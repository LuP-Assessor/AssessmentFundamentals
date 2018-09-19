<?php
ini_set('memory_limit', '1024M'); // 4 GBs minus 1 MB
echo '<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" />';		// Include general CSS

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Page Body (output content starts from here)

/*------------- Head Banner ----------------*/
include '../web_templates/template_headBanner.php';			// Include function getClientIP from ../web_templates/template_getClientIP.php


/*------------- Example selection ----------------*/
if (!isset($_POST['action'])) {
	echo '<div id="Div_1" class="Div_active" style="left:10px; right:50.5%; top:120px; height:50px;">';
	echo '<font color="red">Select Example to analyse!</font>';
	$action="";
} else {
	echo '<div id="Div_1" class="Div_deactive" style="left:10px; right:50.5%; top:120px; height:50px;">';
	echo '<font color="grey">Selected Example in analyse</font>';
	$action=$_POST['action'];
}
echo '<form action="admin.php" method="POST">';
echo '<select name="example">';
foreach (glob("../example*/") as $foldername) {
	if (isset($_POST['example'])) {
		if ($_POST['example']==$foldername) {
			echo '<option value="'.$foldername.'" selected>'.$foldername.'</option>';
		} else {
			echo '<option value="'.$foldername.'">'.$foldername.'</option>';
		}
	} else { echo '<option value="'.$foldername.'">'.$foldername.'</option>'; }
}
echo "</select>";
echo '<input type="hidden" name="action" value="ExampleSelected"></input>';
echo '<input type="submit" value="Select"></input>';

echo "</select>";
echo "</form>";
echo '</div>';

/*------------- File selection ----------------*/
if ($action=="ExampleSelected") {
	echo '<div id="Div_1" class="Div_active" style="left:50.5%; right:10px; top:120px; height:50px;">';
 	echo '<div id="Div_1_Headline" style="background-color: #FFE7D3;">';
	echo '<font color="red">Please select a resultfile for analysing </font>';
	echo '</div>';
} else {
	echo '<div id="Div_1" class="Div_deactive" style="left:50.5%; right:10px; top:120px; height:50px;">';
	echo '<div id="Div_1_Headline" style="background-color: #FFFCE5;">';
if (isset($_POST['logfilename'])) {
	echo '<font color="grey">File opened: '.$_POST['logfilename'].'</font>';
} else {
	echo '<font color="grey">Select logfile to analyse!</font>';
}
	echo '</div>';
} 	

if (!isset($_POST['example'])) {
	$searchpath = "../log_example/*.log";
} else {
	// extraxt project name from ($_POST['example'])
	$example = substr($_POST['example'], 3, -1);  
	$searchpath = "../log_example/access_".$example."_*.log";
}

echo '<form action="admin.php" method="POST">';
	echo '<select name="logfilename">';
	foreach (glob($searchpath) as $filename) {
		if (isset($_POST['logfilename'])) {
			if ($_POST['logfilename']==$filename) {
				echo '<option value="'.$filename.'" selected>'.$filename.'</option>';
			} else {
				echo '<option value="'.$filename.'">'.$filename.'</option>';
			}
		} else {
			echo '<option value="'.$filename.'">'.$filename.'</option>';
		}
	}
	echo "</select>";
	if (isset($_POST['example'])){ echo '<input type="hidden" name="example" value="'.$_POST['example'].'"></input>';}
	echo '<input type="hidden" name="action" value="openLogFile"></input>';
	echo '<input type="submit" value="Open"></input>';
echo "</form>";
echo '</div>';
/*------------- Filter scource IP ----------------*/



if ($action=="openLogFile") {
	echo '<div id="" class="Div_active" style="left:10px; right:50.5%; top:190px; height:70px;">';
	echo '<font color="red">Filter by Source IP</font><br>';
} else {
	echo '<div id="" class="Div_deactive" style="left:10px; right:50.5%; top:190px; height:70px;">';
	echo '<font color="grey">Filter by Source IP</font><br>';
}

if (isset($_POST['logfilename'])) {
	$pattern = '/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/';
	$handle = fopen($_POST['logfilename'], 'r');
	if ($handle) {
		while (($line = fgets($handle)) !== false) {

			//preg_match_all($pattern, $text ,$treffer );
			preg_match_all($pattern, $line ,$treffer );
			foreach ($treffer as $IPS) {
				foreach ($IPS as $IP) {
					$ipadressen[] = $IP;
				}
			}
		
		}
		fclose($handle);
	}
}
$ipadressen = array_unique($ipadressen);

echo '<form action="admin.php" method="POST">';

if (isset($_POST['logfilename'])) {
	echo '<select name="FilterIP">';
	foreach ($ipadressen as $ipadresse) {
		if (isset($_POST['FilterIP'])) {
			if ($_POST['FilterIP'] == $ipadresse) {
				echo '<option value="'.$ipadresse.'" selected>'.$ipadresse.'</option>';
			} else {
				echo '<option value="'.$ipadresse.'">'.$ipadresse.'</option>';
			}
		} else {
			echo '<option value="'.$ipadresse.'">'.$ipadresse.'</option>';
		}
	}
	echo '</select>';
}

echo '<input type="hidden" name="action" value="FilterIP"></input>';
if (isset($_POST['example'])){ echo '<input type="hidden" name="example" value="'.$_POST['example'].'"></input>';}
if (isset($_POST['logfilename'])){ echo '<input type="hidden" name="logfilename" value="'.$_POST['logfilename'].'"></input>';}
echo '<input type="submit" value="Filter"></input>';
echo "</form>";
echo "</div>";
/*------------- Filter Timeframe ----------------*/
if ($action=="openLogFile") {
	echo '<div id="" class="Div_active" style="left:50.5%; right:10px; top:190px; height:70px;">';
	echo '<font color="red">Filter by Timeframe</font><br>';
} else {
	echo '<div id="" class="Div_deactive" style="left:50.5%; right:10px; top:190px; height:70px;">';
	echo '<font color="grey">Filter by Timeframe</font><br>';
}
echo '<form action="admin.php" method="POST">';
echo '<select name="logfilename"><option value="test1">Test1</option><option value="test2">Test2</option><option value="test3">Test3</option><option value="test4">Test4</option></select>';
echo '<input type="hidden" name="action" value="FilterTF"></input>';
if (isset($_POST['example'])){ echo '<input type="hidden" name="example" value="'.$_POST['example'].'"></input>';}
if (isset($_POST['logfilename'])){ echo '<input type="hidden" name="logfilename" value="'.$_POST['logfilename'].'"></input>';}
echo '<input type="submit" value="Filter"></input>';
echo "</form>";
echo "</div>";	
/*------------- Data Area ----------------*/
if ($action=="FilterIP" || $action=="FilterIP") {
	echo '<div id="" class="Div_DataArea Div_active" style="top:280px;">';
} else {
	echo '<div id="" class="Div_DataArea Div_deactive" style="top:280px;">';
	echo '<font color="grey">Data Area</font><br>';
}

if (isset($_POST['logfilename'])&& isset($_POST['FilterIP'])) {
	if ($_POST['logfilename']!="" && $_POST['FilterIP'] != ""){
		$pattern = str_replace(".", "\.", $_POST['FilterIP']);
		$pattern = '/(.|\n)+'.$pattern.'(.|\n)+/';
		//echo "Pattern: ".$pattern."<br>";
		$handle = fopen($_POST['logfilename'], 'r');
		if ($handle) {
			/* while (($line = fgets($handle)) !== false) {

				//preg_match_all($pattern, $text ,$treffer );
				preg_match_all($pattern, $line ,$treffer );
				foreach ($treffer as $IPS) {
					foreach ($IPS as $IP) {
						if (strlen($IP)>=5) {echo $IP.'<br>';}
					}
				}
		
			} */
			while(! feof($handle)){
				$line = fgets($handle);
				//preg_match_all($pattern, $text ,$treffer );
				/* preg_match_all($pattern, $line ,$treffer );
				foreach ($treffer as $IPS) {
					foreach ($IPS as $IP) {
						if (strlen($IP)>=5) {echo $IP.'<br>';}
					}
				} */
				echo $line . "<br>";
			}
			fclose($handle);
		}
		
	}
}

echo "</div>";

include '../web_templates/template_footer.php';
?>