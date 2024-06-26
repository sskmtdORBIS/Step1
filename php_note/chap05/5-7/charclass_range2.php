<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字クラス 範囲</title>
</head>
<body>
<pre>
<?php
// 大文字-数字-英数字にマッチする
$pattern = "/[A-F]-[0-9]-[0-9a-zA-Z]/u";
var_dump(preg_match($pattern, "A-5-5"));
var_dump(preg_match($pattern, "F-9-c"));
var_dump(preg_match($pattern, "G-17-10"));
var_dump(preg_match($pattern, "a-2-9"));
?>
</pre>
</body>
</html>
