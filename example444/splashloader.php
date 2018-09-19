<?php 
session_start();

if ($_GET['pval'] == "getApproval") {$_SESSION["finish"] = $_SESSION['pval4'];} else {echo("failed");}
?>