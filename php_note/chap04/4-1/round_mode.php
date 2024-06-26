<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>数値を丸める（mode）</title>
</head>
<body>
<pre>
<?php
// 数値を丸める
$num1 = round(1.5, 0, PHP_ROUND_HALF_UP); //
$num2 = round(1.5, 0, PHP_ROUND_HALF_DOWN); //
$num3 = round(2.5, 0, PHP_ROUND_HALF_EVEN); //
$num4 = round(2.5, 0, PHP_ROUND_HALF_ODD); //
// 結果
var_dump($num1);
var_dump($num2);
var_dump($num3);
var_dump($num4);
?>
</pre>
</body>
</html>
