<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>番号で色を決める</title>
</head>
<body>
<?php
$colorNumber = 1;
$colorName = match($colorNumber){
  0 => "青",
  1, 2 => "緑",
  3 => "黒",
  default => "白",
};
echo "{$colorNumber}番は{$colorName}色です。";
?>
</body>
</html>
