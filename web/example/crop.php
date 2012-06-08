<?php
extract($_GET);

//$src1 = imagecreatefromjpeg("..".$file);
//$src = imagecreatetruecolor($cw, $ch);
$src1 = imagecreatefromjpeg("..".$file);
$src = imagecreatetruecolor($iw, $ih);

imagecopyresampled($src, $src1, 0, 0, 0, 0, $iw, $ih, imagesx($src1), imagesy($src1));

$dst = imagecreatetruecolor($cw, $ch);

//imagecopy($src, $src1, 0, 0, 0, 0, $iw, $ih);

//imagecopy($dst, $src, 0, 0, $x1, $y1, $w, $h);
// this is over 10 times slower, as we are only cropping we should use imagecopy
//imagecopyresized
//imagecopyresampled($dst, $src, 0, 0, $x1, $y1, $w, $h, $w, $h);

imagecopyresized($dst, $src, 0, 0, $cx, $cy, $iw, $ih, $iw, $ih);
header('Content-Type: image/jpeg');
imagejpeg($dst);