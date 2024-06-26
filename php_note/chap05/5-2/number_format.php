<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>数値を３桁区切りにする</title>
</head>
<body>
<?php
$price = 1980 * 2;
$kingaku = number_format($price);
echo $kingaku, "円";
?>
</body>
</html>
