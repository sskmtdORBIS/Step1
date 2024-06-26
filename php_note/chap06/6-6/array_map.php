<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列のすべての要素に関数を適用する</title>
</head>
<body>
<pre>
<?php
// 通貨換算するコールバック関数
function exchange($value){
  global $rate;
  if ($rate == 0) {
    $rate = 1;
  }
  // レート換算する
  $exPrice = $value/$rate;
  // 小数第２位に丸める
  $exPrice = round($exPrice, 2);
  return $exPrice;
}

// 円での値段
$priceYen = [2300, 1200, 4000];
// 円／ドルのレート
$rate = 112.50;
// ドル換算の値段
$priceDollar = array_map("exchange", $priceYen);
print_r($priceDollar);
?>
</pre>
</body>
</html>
