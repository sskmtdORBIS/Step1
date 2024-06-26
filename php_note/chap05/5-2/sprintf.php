<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>フォーマット済みの文字列を変数に入れて扱う</title>
</head>
<body>
<?php
$year = 2016;
$seq = 539;
$type = "P7";
$id = sprintf('%04d%06d-%s', $year, $seq, $type);
echo "製品IDは", $id, "です。";
?>
</body>
</html>
