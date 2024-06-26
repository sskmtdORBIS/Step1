<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>小数第３位までを出力する</title>
</head>
<body>
<?php
// 円周率をそのまま出力する
echo M_PI;
echo "<br>", PHP_EOL; //改行
// フォーマット文字列を指定して出力する
$n = printf('%.3f', M_PI);
echo "<br>", PHP_EOL; //改行
echo "文字数 $n";
?>
</body>
</html>
