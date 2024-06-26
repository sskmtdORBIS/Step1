<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>var_dump()の出力</title>
</head>
<body>
<?php
$msg = "おはよう"; // 文字列
$colors = array("red", "blue", "green"); // 配列
$now = new DateTime(); // DateTimeオブジェクト
$tokuten = 45; // 整数
$isPass = ($tokuten>80); // 論理値
$userName; // 値なし
var_dump($msg);
var_dump($colors);
var_dump($now);
var_dump($tokuten);
var_dump($isPass);
var_dump($userName)
?>
</body>
</html>
