<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>メタ文字 スタートエンド</title>
</head>
<body>
<pre>
<?php
// 山から始まり、子で終わる4文字の名前にマッチする
$pattern = "/^山..子$/u";
var_dump(preg_match($pattern, "山田智子"));
var_dump(preg_match($pattern, "山本あさ子"));
var_dump(preg_match($pattern, "山崎貴美"));
?>
</pre>
</body>
</html>
