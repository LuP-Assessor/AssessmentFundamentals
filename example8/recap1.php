<?php

 session_start();

 $im = imagecreatetruecolor(100,30);
 $white = ImageColorAllocate($im,0xFF,0xFF,0xFF);
 $black = ImageColorAllocate($im,0x00,0x00,0x00);

 
 // Der zu zeichnende Text
$text = 'Testing...';
// Bei Bedarf ist der Pfad anzupassen
$font = 'ARIALBD.TTF';
// Füge etwas Schatten zum Text hinzu
imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);
// Füge den Text hinzu
imagettftext($im, 20, 0, 10, 20, $black, $font, $text);


 //ImageFilledRectangle($im,50,50,150,150,$black);
 //ImageString($im,5,50,160,"A Black Box",$black);
 //ImageString($im,5,10,10, $_SESSION['ReCap1'],$black);
 Header('Content-Type: image/png');
imagepng($im);
imagedestroy($im);

?>