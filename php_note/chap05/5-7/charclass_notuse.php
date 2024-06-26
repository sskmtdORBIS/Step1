<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字クラスを使っていない正規表現</title>
</head>
<body>
<pre>
<?php
// 赤の玉にマッチする
$pattern = "/赤の玉/u";
var_dump(preg_match($pattern, "赤の玉です"));
var_dump(preg_match($pattern, "青の玉です"));
var_dump(preg_match($pattern, "赤の箱です"));
?>
</pre>
</body>
</html>
