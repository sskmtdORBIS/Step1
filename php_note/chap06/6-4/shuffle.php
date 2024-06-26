<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列の値の並びをシャッフルする</title>
</head>
<body>
<pre>
<?php
$nameList = ["田中", "鈴木", "佐藤", "杉山"];
// 並びをシャッフルする
shuffle($nameList);
print_r($nameList);
?>
</pre>
</body>
</html>
