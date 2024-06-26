<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>4人で割り勘した場合の金額を求める</title>
</head>
<body>
<?php
$kingaku = 5470;
$amari = $kingaku % 4;
$hitori = ($kingaku - $amari)/4;
echo "１人{$hitori}円、不足{$amari}円";
?>
</body>
</html>
