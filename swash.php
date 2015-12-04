<?php

$font       = 'scriptin.ttf';
$text       = 'Ipsum';
$size       = 30;
$image      = imagecreatetruecolor(200, 200);
$fontColour = imagecolorallocate($image, hexdec('11'), hexdec('11'), hexdec('11'));
$bgColour   = imagecolorallocate($image, hexdec('CC'), hexdec('CC'), hexdec('CC'));

imagefilledrectangle($image, 0, 0, 200, 200, $bgColour);

$dimensions = imagettfbbox($size, 0, $font, $text);
imagefilledrectangle(
    $image,
    $dimensions[0] + 40,
    $dimensions[7] + 50,
    $dimensions[2] + 40,
    $dimensions[3] + 50,
    imagecolorallocate($image, mt_rand(1, 180), mt_rand(1, 180), mt_rand(1, 180))
);

imagettftext(
    $image,
    $size,
    0,
    40,
    50,
    $fontColour,
    $font,
    $text
);

header('Content-Type: image/png');
imagepng($image);