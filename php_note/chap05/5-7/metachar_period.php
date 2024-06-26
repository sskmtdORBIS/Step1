<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>メタ文字 ピリオド</title>
</head>
<body>
<pre>
<?php
// 田中？？子にマッチする
$pattern = "/田中..子/u";
var_dump(preg_match($pattern, "田中佐知子"));
var_dump(preg_match($pattern, "田中亜希子"));
var_dump(preg_match($pattern, "田中幸子"));
var_dump(preg_match($pattern, "田中向日葵子"));
?>
</pre>
</body>
</html>
