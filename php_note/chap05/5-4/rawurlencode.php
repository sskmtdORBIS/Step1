<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字列をURLエンコードする</title>
</head>
<body>
<?php
$page = "PHP 8サンプル.html";
$path = rawurlencode($page);
$url = "http://sample.com/{$path}";
echo $url;
?>
</body>
</html>
