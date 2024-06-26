<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>数値を丸める（精度）</title>
</head>
<body>
<pre>
<?php
$value = 123.456;
// 数値を丸める
$num1 = round($value); // 初期値 0
$num2 = round($value, 2); // 小数点以下2位
$num3 = round($value, -1); // １の桁を丸める
// 結果
var_dump($num1);
var_dump($num2);
var_dump($num3);
?>
</pre>
</body>
</html>
