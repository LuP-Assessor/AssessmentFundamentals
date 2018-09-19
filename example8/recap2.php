<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Set the content-type
header('Content-Type: image/png');

// Create the image
$im = imagecreatetruecolor(400, 100) or die("Can't create image!");
putenv('GDFONTPATH=' . realpath('.'));
// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $white);

// The text to draw
$text = 'Testing';
// Replace path by your own font path
$font = './Roboto-Black.ttf';

// Add some shadow to the text
//imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

// Add the text
//imagettftext($im, 20, 0, 10, 20, $black, 'arial.ttf', $text);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);
?>