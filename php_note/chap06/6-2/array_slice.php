<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列を切り出す</title>
</head>
<body>
<pre>
<?php
$myArray = ["a", "b", "c", "d", "e", "f"];
// トップ３
$slice1 = array_slice($myArray, 0, 3);
// ４番、5番
$slice2 = array_slice($myArray, 3, 2);
// ラスト３
$slice3 = array_slice($myArray, -3);
print_r($slice1);
print_r($slice2);
print_r($slice3);
?>
</pre>
</body>
</html>
