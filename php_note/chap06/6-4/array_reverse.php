<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列の値の並びを逆順にする</title>
</head>
<body>
<pre>
<?php
$nameList = ["田中", "鈴木", "佐藤", "杉山"];
// 並びを逆順にする
$result = array_reverse($nameList);
print_r($result);
?>
</pre>
</body>
</html>
