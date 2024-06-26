<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字クラス 否定</title>
</head>
<body>
<pre>
<?php
// 青木または赤木ではないときにマッチする
$pattern = "/[^青赤]木/u";
var_dump(preg_match($pattern, "大木"));
var_dump(preg_match($pattern, "青木"));
var_dump(preg_match($pattern, "赤木"));
var_dump(preg_match($pattern, "赤木、白木"));
?>
</pre>
</body>
</html>
