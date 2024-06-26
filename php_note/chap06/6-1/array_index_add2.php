<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列に値を追加していく</title>
</head>
<body>
<pre>
<?php
// 空の配列を用意する
$colors = [];
$colors[0] = "赤";
$colors[1] = "青";
$colors[5] = "黄";
$colors[] = "白";
// 確認する
print_r($colors);
?>
</pre>
</body>
</html>
