<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字クラス 範囲</title>
</head>
<body>
<pre>
<?php
// A1〜F9にマッチする
$pattern = "/[A-F][1-9]/u";
var_dump(preg_match($pattern, "B8"));
var_dump(preg_match($pattern, "G7"));
var_dump(preg_match($pattern, "D6"));
var_dump(preg_match($pattern, "a2"));
var_dump(preg_match($pattern, "1A"));
?>
</pre>
</body>
</html>
