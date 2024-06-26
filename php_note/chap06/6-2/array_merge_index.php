<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列の連結 array_merge</title>
</head>
<body>
<pre>
<?php
$a = ["a", "b", "c"];
$b = ["d", "e", "f"];
$c = ["g", "h"];
// インデックス配列を連結する
$result = array_merge($a, $b, $c);
print_r($result);
?>
</pre>
</body>
</html>
