<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列の差をチェックする</title>
</head>
<body>
<pre>
<?php
// チェックする配列
$checkID = ["a21", "d21", "d33", "e53"];
// 基準となる配列
$aList = ["a12", "b15", "d21"];
$bList = ["d13", "e53", "f10", "k12"];

// IDをチェックする
$diffID = array_diff($checkID, $aList, $bList);
foreach ($diffID as $value) {
  echo "{$value}は新規です。", PHP_EOL;
}
?>
</pre>
</body>
</html>
