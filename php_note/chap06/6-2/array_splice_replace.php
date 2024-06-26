<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列の要素を置換する</title>
</head>
<body>
<pre>
<?php
// 元の配列
$myArray = ["a", "b", "c", "d", "e"];
// 置換する配列
$replace = ["X", "Y", "Z"];
// 配列の要素を置換する
$removed = array_splice($myArray, 1, 3, $replace);
echo '実行後：$myArray', PHP_EOL;
print_r($myArray);
echo '戻り：$removed', PHP_EOL;
print_r($removed);
?>
</pre>
</body>
</html>
