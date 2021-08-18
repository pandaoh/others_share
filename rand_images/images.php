<?php
/**
 * 直接输出图片，稍微耗费性能。 
 */
function showImg($imgUrl) {
  $imgInfo = imagecreatefrompng($imgUrl);
  $imgWidth = imagesx($imgInfo);
  $imgHeight = imagesy($imgInfo);
  $simg = imagecreatetruecolor($imgWidth, $imgHeight);
  $bg = imagecolorallocatealpha($simg, 0, 0, 0, 127);
  imagefill($simg, 0, 0, $bg);
  imagesavealpha($simg, true);
  imagecopyresized($simg, $imgInfo, 0, 0, 0, 0, $imgWidth, $imgHeight, $imgWidth, $imgHeight);
  header("Content-Type: image/png");
  imagepng($simg);
  imagedestroy($imgInfo);
  imagedestroy($simg);
}
$origin = filter_input(INPUT_SERVER, 'HTTP_ORIGIN') ?? '';
$allow_origin = array(
    'http://a.biugle.cn',
    'https://a.biugle.cn',
);
if (in_array($origin, $allow_origin)) {
  header('Access-Control-Allow-Origin: ' . $origin);
}
return showImg('./images/' . mt_rand(1, 50) . '.png'); // 使用本地图片，不需要 txt，准备一个文件夹存放图片即可。
