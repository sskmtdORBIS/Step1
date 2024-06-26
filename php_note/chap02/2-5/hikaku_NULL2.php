<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>NULLだったときは初期値を代入する</title>
</head>
<body>
<pre>
<?php
$kosu = $kosu ?? 2;
$price = 250 * $kosu;
echo "{$price}円、{$kosu}個";
?>
</pre>
</body>
</html>
