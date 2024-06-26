<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>シングルクォートの中に変数を入れた場合</title>
</head>
<body>
<?php
$theSize = "M";
$thePrice = 1200;
$msg = '$theSize サイズ、$thePrice 円';
echo $msg;
?>
</body>
</html>
