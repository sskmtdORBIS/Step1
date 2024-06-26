<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>フォーマット文字列を変数$formatで指定する</title>
</head>
<body>
<?php
$format = '最大値%.1f、最小値%.1f';
$a = 15.69;
$b = 11.32;
printf($format, $a, $b);
?>
</body>
</html>
