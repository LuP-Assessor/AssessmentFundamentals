<?php
// Die Methoden in dieser Klasse werden weiter unten als Soap Service bereit gestellt
require_once('MySoapClass.php');

// Den WSDL Cache abschalten
ini_set("soap.wsdl_cache_enabled", "0");
/*
Erzeugt eine neue SoapServer Instanz. Der erste Parameter (null) bedeutet, dass keine WSDL Datei verwendet werden soll.
Wenn keine WSDL Datei angegeben wird, muss die uri Option gesetzt sein.
*/
$server = new SoapServer(null, array('uri' => "http://localhost/example5/"));

/*
Bestimmt, dass alle öffentlichen Funktionen der Klasse MySoapClass für den Client erreichbar sein sollen
*/
$server->setClass("MySoapClass");

/*
Behandelt den Soap Request des Clients. Die Antwort wird in XML "verpackt" und an den Client zurückgeschickt
*/
$server->handle();?> 