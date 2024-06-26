<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>定数</title>
</head>
<body>
<?php
define("TAX", 0.08);
$price = 1250 * (1+TAX);
echo $price;
?>
</body>
</html>
