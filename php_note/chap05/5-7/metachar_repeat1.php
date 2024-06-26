<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>メタ文字 繰り返し</title>
</head>
<body>
<pre>
<?php
// 数字3桁-2桁にマッチする
$pattern = "/[0-9]{3}-[0-9]{2}/u";
var_dump(preg_match($pattern, "123-45"));
var_dump(preg_match($pattern, "090-88"));
var_dump(preg_match($pattern, "11-222"));
var_dump(preg_match($pattern, "abc-de"));
?>
</pre>
</body>
</html>
