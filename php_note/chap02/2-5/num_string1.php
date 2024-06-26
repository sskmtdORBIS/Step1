<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>文字列を使った計算式</title>
</head>
<body>
<?php
$ninzu = "3人" + "2人";
$price = "500円" * $ninzu;
$price = $price * "0.85 割引率";
echo "料金{$price}円、{$ninzu}人";
?>
</body>
</html>
