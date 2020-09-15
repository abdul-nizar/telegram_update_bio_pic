<?php

include 'rColor.php';

// WebService Time Zone
date_default_timezone_set('Europe/Paris');

// TIME as Text
$txt = date("H:i");

header('content-type: image/jpg');
$img=imagecreatefromjpeg('bg.jpg');


// FONT
$font1 = 'font/Lemiesz.ttf';
$font2 = 'font/FORTSSH.ttf';
$font3 = 'font/true-crimes.ttf';
$font4 = 'font/SEASRN.ttf';
$font5 = 'font/hetilica.ttf';
$font6 = 'font/BruntsfieldCFBlack-Regular.otf';

// Random Font
$font_arr = array($font1, $font2, $font3, $font4, $font5, $font6);
$ranFont = rand(0,5);
$font = $font_arr[$ranFont];

// Get real path of FONT
$font = realpath($font);

// Random Color
//$color = imagecolorallocate($img, 255, 255,255);
$colGen = rColor::generate(false);
$color = imagecolorallocate($img, $colGen[0], $colGen[1], $colGen[2]);


//$x = 70; 
//$y = 300;
list($x, $y) = ImageTTFCenter($img, $txt, $font, 140);

// Add some shadow to the text
//imagettftext($img, 102, 0, $x-2, $y, $white, $font, $txt);
//imagettftext($img, 102, 0, $x+2, $y, $white, $font, $txt);

// Text
imagettftext($img, 100, 0, $x, $y, $color, $font, $txt);

//
imagejpeg($img);



//--------------------------------------------------------------------------------
// Find the x & y for place the text in center
function ImageTTFCenter($image, $text, $font, $size, $angle = 45) 
{
    $xi = imagesx($image);
    $yi = imagesy($image);

    $box = imagettfbbox($size, $angle, $font, $text);

    $xr = abs(max($box[2], $box[4]));
    $yr = abs(max($box[5], $box[7]));

    $x = intval(($xi - $xr) / 2);
    $y = intval(($yi + $yr) / 2);

    return array($x, $y);
}

?>