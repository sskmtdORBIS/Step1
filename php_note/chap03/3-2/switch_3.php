<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>greenとredを同じ値段にする</title>
</head>
<body>
<?php
$color = "green";
switch ($color) {
  // "green"と"red"で同じ処理を行う
  case "green":
  case "red":
    $price = 140;
    break;
  case "blue":
    $price = 160;
    break;
  default:
    $price = 100;
    break;
}
echo "{$color}は{$price}円";
?>
</body>
</html>
