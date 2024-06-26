<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列の連結（重複を防ぐ） array_unique</title>
</head>
<body>
<pre>
<?php
$a = ["green", "red", "blue"];
$b = ["blue", "pink", "yellow"];
$c = ["pink", "white"];
// 配列を連結する
$all = array_merge($a, $b, $c);
// 重複した値を取り除く
$unique = array_unique($all);
print_r($all);
print_r($unique);
?>
</pre>
</body>
</html>
