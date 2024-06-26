<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>defaultのケースを指定しない</title>
</head>
<body>
<?php
$color = "yellow";
$price = 100;
switch ($color) {
  case "green":
    $price = 120;
    break;
  case "red":
    $price = 140;
    break;
}
echo "{$color}は{$price}円";
?>
</body>
</html>
