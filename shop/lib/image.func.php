<?php
/**
 * Created by PhpStorm.
 * User: zswki
 * Date: 2016/2/16 0016
 * Time: 11:46
 */
require_once 'string.func.php';

function verfyImage($sess_name = "verify", $type = 1,$length = 4, $pixel = 0,$line = 0)
{
    session_start();
//创建画布
    $width = 80;
    $height = 20;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
//填充画布
    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
    $chars = buildRandomString($type, $length);
    $_SESSION[$sess_name] = $chars;
    $fontfiles = array("msyh.ttc", "msyhbd.ttc", "msyhl.ttc", "simkai.ttf", "SIMLI.TTF", "simsun.ttc", "SIMYOU.TTF");
    for ($i = 0; $i < $length; $i++) {
        $size = mt_rand(14, 18);
        $angle = mt_rand(-15, 15);
        $x = 5 + $i * $size;
        $y = mt_rand(12, 20);
        $darkColor = imagecolorallocate($image, mt_rand(0, 120), mt_rand(0, 120), mt_rand(0, 120));
        $lightColor = imagecolorallocate($image, mt_rand(120, 255), mt_rand(120, 255), mt_rand(120, 255));
        $fontfile = "../fonts/" . $fontfiles[mt_rand(0, count($fontfiles) - 1)];
        $text = substr($chars, $i, 1);
        imagettftext($image, $size, $angle, $x, $y, $darkColor, $fontfile, $text);
    }
    if ($pixel) {
        for ($i = 0; $i < $pixel; $i++) {
            imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);
        }
    }
    if ($line) {
        for ($i = 1; $i < $line; $i++) {
            imageline($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), mt_rand(0, $width - 1), mt_rand(0, $height - 1), $darkColor);
        }
    }
    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}