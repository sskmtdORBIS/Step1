<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>正規表現の基本</title>
</head>
<body>
<pre>
<?php
$filepath = "/goods/image/cat/";
// 区切り文字がスラッシュの場合
var_dump(preg_match("/\/image\//u", $filepath));
// 区切り文字が#の場合
var_dump(preg_match("#/image/#u", $filepath));
?>
</pre>
</body>
</html>
