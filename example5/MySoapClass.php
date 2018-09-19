<?php
/*
Testklasse mit einigen Funktionen, die über den Soap Client erreichbar sein sollen.

Die für den Soap Server bereitgestellte Klasse MySoapClass erzeugt ein Objekt vom Typ
MyAttributesClass. Dieses Objekt kann dann vom Client über die Funktion MySoapClass::getAttributesClass()
empfangen werden.
Mit der Funktion MySoapClass::provokeSoapFault() lässt sich ein Beispiel Soap Fehler erzeugen.
Der Fehler wird dann als Warnung im Client zu sehen sein.
*/

class MySoapClass {
public $myAttributesClass = null;

public function __construct() {

$this->myAttributesClass = new MyAttributesClass();
}

public function getAttributesClass() {
return $this->myAttributesClass;
}

public function putSomethingToServer($something) {
return new SoapFault('Info','Sie haben folgendes zum Soap Server geschickt: ' . $something);
}
}
class MyAttributesClass {
public $attrib1 = 'Inhalt 1';
public $attrib2 = 'Inhalt 2';
public $attrib3 = 'Inhalt 3';
public $attrib4 = 'Inhalt 4';
public $attrib5 = 'Inhalt 5';
}


/*
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hs="http://www.holidaywebservice.com/HolidayService_v2/">
 <soapenv:Body>
 <hs:getAttributesClass>
  </hs:getAttributesClass>
 </soapenv:Body>
</soapenv:Envelope>
*/
?> 