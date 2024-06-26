<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>フォーマット文字列の%を配列の値で置換する</title>
</head>
<body>
<?php
$max = 15.69;
$min = 11.32;
$ave = 13.218;
// 置換する配列
$data = array($max, $min, $ave);
// フォーマット文字列
$format = '最大値%.1f、最小値%.1f、平均値%.1f';
// 値を置換して表示する
vprintf($format, $data);
?>
</body>
</html>
