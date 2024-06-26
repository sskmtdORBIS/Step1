<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>変数を{ }で囲って埋め込む</title>
</head>
<body>
<?php
$theSize = "M";
$thePrice = 1200;
$msg = "{$theSize}サイズ、{$thePrice}円";
echo $msg;
?>
</body>
</html>
