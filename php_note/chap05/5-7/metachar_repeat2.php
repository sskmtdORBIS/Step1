<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>メタ文字 繰り返し</title>
</head>
<body>
<pre>
<?php
// 小文字の4〜8文字にマッチする
$pattern = "/[a-z]{4,8}/u";
var_dump(preg_match($pattern, "cycling"));
var_dump(preg_match($pattern, "marathon"));
var_dump(preg_match($pattern, "run"));
var_dump(preg_match($pattern, "SURF"));
?>
</pre>
</body>
</html>
