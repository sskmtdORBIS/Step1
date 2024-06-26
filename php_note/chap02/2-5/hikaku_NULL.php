<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>NULLだったときは代替値で計算する</title>
</head>
<body>
<pre>
<?php
$price = 250 * ($kosu ?? 2);
echo "{$price}円";
var_dump($kosu);
?>
</pre>
</body>
</html>
