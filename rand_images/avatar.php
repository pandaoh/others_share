<?php
$origin = filter_input(INPUT_SERVER, 'HTTP_ORIGIN') ?? '';
$allow_origin = array(
    'http://a.biugle.cn',
    'https://a.biugle.cn',
);
if (in_array($origin, $allow_origin)) {
 header('Access-Control-Allow-Origin: ' . $origin);
}
$file = "./lib/avatar.txt";
$avatarUrl = "http://a.biugle.cn/images/avatar.jpg";
if (file_exists($file)) {
  $data = file($file);
  $avatarUrl = $data[date("w", time())]; // 获取星期几
}
return header("Location: " . $avatarUrl); // 非直接输出图片，重定向到图片地址，节省性能。