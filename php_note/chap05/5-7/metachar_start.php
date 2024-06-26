<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>メタ文字 スタート</title>
</head>
<body>
<pre>
<?php
// 山から始まる名前にマッチする
$pattern = "/^山/u";
var_dump(preg_match($pattern, "山田建設"));
var_dump(preg_match($pattern, "山本接骨医院"));
var_dump(preg_match($pattern, "大山観光"));
var_dump(preg_match($pattern, "藤田商店, 山崎商店"));
?>
</pre>
</body>
</html>
