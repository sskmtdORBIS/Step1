<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字クラスを使う</title>
</head>
<body>
<pre>
<?php
// 赤の玉、青の玉、緑の玉のどれかにマッチする
$pattern = "/[赤青緑]の玉/u";
var_dump(preg_match($pattern, "それは赤の玉です"));
var_dump(preg_match($pattern, "青の玉が２個です"));
var_dump(preg_match($pattern, "緑の玉でした"));
var_dump(preg_match($pattern, "緑の箱でした"));
?>
</pre>
</body>
</html>
