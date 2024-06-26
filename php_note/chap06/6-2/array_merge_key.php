<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列の連結 array_merge</title>
</head>
<body>
<pre>
<?php
$a = ["a"=>1, "b"=>2, "c"=>3];
$b = ["b"=>40, "d"=>50];
// 連想配列を連結する
$result = array_merge($a, $b);
print_r($result);
?>
</pre>
</body>
</html>
