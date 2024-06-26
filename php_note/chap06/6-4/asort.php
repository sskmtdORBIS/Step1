<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>連想配列を値でソートする</title>
</head>
<body>
<pre>
<?php
$data = ["S" => 23, "M" => 36, "L" => 29];
// 昇順にソートする
asort($data);
print_r($data);
?>
</pre>
</body>
</html>
