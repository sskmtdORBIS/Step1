<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>値だけでなく型も比較する</title>
</head>
<body>
<pre>
<?php
$hantei1 = ("99" === 99);
$hantei2 = ("99" !== 99);
var_dump($hantei1);
var_dump($hantei2);
?>
</pre>
</body>
</html>
