<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>誤ったコード</title>
</head>
<body>
<?php
// 個数
$kosu = 2;

// 料金を計算する
function price(){
  $ryoukin = 250 * $kosu;
  echo "{$ryoukin}円です。";
}
// 実行する
echo "{$kosu}個で";
price();
?>
