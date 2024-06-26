<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列から正の値だけを抽出する</title>
</head>
<body>
<pre>
<?php
// コールバック関数
function isPlus($value) {
  return $value>0;
}

// 元の配列
$valueList = ["a"=>3, "b"=>0, "c"=>5, "d"=>-2, "e"=>4];
// 配列から正の値だけを抽出する
$filtered = array_filter($valueList, "isPlus");
print_r($filtered);
?>
</pre>
</body>
</html>
