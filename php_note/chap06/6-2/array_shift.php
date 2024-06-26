<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列の先頭の要素を取り出す</title>
</head>
<body>
<pre>
<?php
// 元の配列
$myArray = ["a", "b", "c", "d"];
// 先頭の要素を取り出す
$removed = array_shift($myArray);
echo '実行後：$myArray', PHP_EOL;
print_r($myArray);
echo '戻り：$removed', PHP_EOL;
print_r($removed);
?>
</pre>
</body>
</html>
