<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列の値を合計する</title>
</head>
<body>
<?php
$valuelist = [5, -3, 12, 6, 9];
$sum = 0;
// 配列から順に値を取り出す
foreach($valuelist as $value){
  // 正の値だけ合計する
  if ($value>0){
    $sum += $value;
  }
}
echo "正の値の合計は{$sum}です。";
?>
</body>
</html>
