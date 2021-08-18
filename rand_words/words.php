<?php
// 设置一下跨域
$origin = filter_input(INPUT_SERVER, 'HTTP_ORIGIN') ?? '';
$allow_origin = array(
    'http://a.biugle.cn',
    'https://a.biugle.cn',
);
if (in_array($origin, $allow_origin)) {
 header('Access-Control-Allow-Origin: ' . $origin);
}
// 如果需要允许其他所有域名访问：header("Access-Control-Allow-Origin: *");

// 设置响应 methods 类型
header('Access-Control-Allow-Methods: GET');
// 设置 content-type
header('Content-Type: text/plain; charset=UTF-8');

// 随机从我们准备的 txt 文本文件中读取一行出来
$file = "./lib/words.txt"; // 我们的 txt 文件位置
// 判断文件是否存在
$saying = "biugle.cn"; // 默认输出
if (file_exists($file)) {
  $data = file($file); // 将文件存放在一个数组中
  $rand = array_rand($data); // 随机取一条
  $saying = $data[$rand]; 
}
echo chop($saying); // 返回数据，并去除空格。
