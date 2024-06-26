<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>半角の英数記号文字、スペースを全角に変換する</title>
</head>
<body>
<?php
$msg = "Hello! PHP8をはじめよう。";
echo mb_convert_kana($msg, "AS");
?>
</body>
</html>
