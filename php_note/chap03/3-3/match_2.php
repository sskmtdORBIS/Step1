<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>番号で色を決める</title>
</head>
<body>
<?php
$colorNumber = 7;
$number = abs($colorNumber) % 4;
$colorName = match($number){
  0 => "青",
  1, 2 => "緑",
  3 => "黒",
};
echo "{$colorNumber}番は{$colorName}色です。";
?>
</body>
</html>
