<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>可変変数を使って計算式の変数を入れ替える</title>
</head>
<body>
<?php
$unitPrice = 230;
$quantity = 5;
// 変数に変数名を入れる
$tanka = "unitPrice";
$kosu = "quantity";
// 入っている変数名の変数を使って計算する
$ryoukin = $$tanka * $$kosu;
echo $ryoukin . "円";
?>
</body>
</html>
